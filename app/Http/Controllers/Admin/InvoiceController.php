<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Invoice::with(['order'])->select(sprintf('%s.*', (new Invoice())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'invoice_show';
                $editGate = 'invoice_edit';
                $deleteGate = 'invoice_delete';
                $crudRoutePart = 'invoices';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('no_suratjalan', function ($row) {
                return $row->no_suratjalan ? $row->no_suratjalan : '';
            });
            $table->editColumn('no_invoice', function ($row) {
                return $row->no_invoice ? $row->no_invoice : '';
            });
            $table->addColumn('order_date', function ($row) {
                return $row->order ? $row->order->date : '';
            });

            $table->editColumn('nominal', function ($row) {
                return $row->nominal ? $row->nominal : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'order']);

            return $table->make(true);
        }

        return view('admin.invoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::get()->mapWithKeys(function($item) {
            return [$item->id => $item->no_order];
        })->prepend(trans('global.pleaseSelect'), '');
        $order_details = OrderDetail::with(['product', 'product.media'])
            ->whereHas('product')
            ->get();

        $invoice = new Invoice();
        $order = null;

        if ($order_id = request('order_id')) {
            $order = Order::with('invoices', 'tagihan')->findOrFail($order_id);
            $order_details = $order_details->where('order_id', $order_id);
        }

        return view('admin.invoices.create', compact('orders', 'order_details', 'invoice', 'order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'order_id' => 'required|exists:orders,id',
            'products' => 'required|array|min:1',
        ]);

        $order = Order::findOrFail($request->order_id);

        DB::beginTransaction();
        try {
            $invoice = Invoice::create([
                'no_suratjalan' => Invoice::generateNoSJ(),
                'no_invoice' => Invoice::generateNoInvoice(),
                'date' => $request->date,
                'nominal' => $request->nominal,
                'order_id' => $request->order_id,
            ]);

            $products = Product::whereIn('id', array_keys($request->products))->get()->map(function($item) use ($invoice, $order, $request) {
                $qty = (int) $request->products[$item->id]['qty'] ?: 0;
                $price = (float) $request->products[$item->id]['price'] ?: 0;

                // $item->stock_movements()->create([
                //     'reference' => $invoice->id,
                //     'type' => 'faktur',
                //     'quantity' => -1 * $qty,
                //     'product_id' => $item->id,
                // ]);
                // $item->update([ 'stock' => $item->stock - $qty ]);

                $order->order_details()->where('product_id', $item->id)->update([
                    'moved' => DB::raw("order_details.moved + $qty"),
                ]);

                return [
                    'product_id' => $item->id,
                    'invoice_id' => $invoice->id,
                    'quantity' => $qty,
                    'price' => $price,
                    'total' => $qty * $price,
                ];
            })->where('quantity', '>', 0);

            $invoice->invoice_details()->createMany($products->all());

            DB::commit();

            return redirect()->route('admin.invoices.edit', $invoice->id);
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error-message', $e->getMessage())->withInput();
        }

        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::get()->mapWithKeys(function($item) {
            return [$item->id => $item->no_order];
        })->prepend(trans('global.pleaseSelect'), '');
        $order_details = OrderDetail::with(['product', 'product.media'])
            ->whereHas('product')
            ->get();

        $invoice->load('invoice_details', 'order', 'order.invoices', 'order.invoices.invoice_details', 'order.tagihan');

        $order = null;
        if ($order = $invoice->order) {
            $order_details = $order_details->where('order_id', $order->id);
        }

        $invoice->invoice_details->transform(function($item) use ($order_details) {
            $item->order_detail = $order_details->where('product_id', $item->product_id);

            return $item;
        });

        return view('admin.invoices.edit', compact('orders', 'order_details', 'invoice', 'order'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return redirect()->route('admin.invoices.index');
    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->load('order');

        return view('admin.invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        Invoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
