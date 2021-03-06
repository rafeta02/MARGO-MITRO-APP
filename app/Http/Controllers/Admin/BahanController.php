<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Models\StockMovement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Excel;
use App\Imports\BahanImport;
use Alert;

class BahanController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Product::where('category_id', 2)->with(['category', 'brand', 'unit'])->select(sprintf('%s.*', (new Product())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'product_show';
                $editGate = 'product_edit';
                $deleteGate = 'product_delete';
                $crudRoutePart = 'bahan';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('hpp', function ($row) {
                return $row->hpp ? 'Rp '. number_format($row->hpp, 0, ',', '.') : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? 'Rp '. number_format($row->price, 0, ',', '.') : '';
            });
            $table->editColumn('stock', function ($row) {
                return $row->stock. ' '. $row->unit->name;
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.bahan.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $units = Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bahan.create', compact('units'));
    }

    public function store(StoreProductRequest $request)
    {
        $request->request->add(['status' => 1]);
        $request->request->add(['category_id' => 2]);
        $product = Product::create($request->all());

        foreach ($request->input('foto', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('foto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        Alert::success('Success', 'Bahan berhasil disimpan');

        return redirect()->route('admin.bahan.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $units = Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('unit');

        return view('admin.bahan.edit', compact('product', 'units'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $request->request->add(['slug' => SlugService::createSlug(Product::class, 'slug', $request->name)]);
        $product->update($request->all());

        if (count($product->foto) > 0) {
            foreach ($product->foto as $media) {
                if (!in_array($media->file_name, $request->input('foto', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->foto->pluck('file_name')->toArray();
        foreach ($request->input('foto', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('foto');
            }
        }

        Alert::success('Success', 'Bahan berhasil disimpan');

        return redirect()->route('admin.bahan.index');
    }

    public function show($id)
    {
        $product = Product::find($id);
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('unit');

        $stockMovements = StockMovement::with(['product'])->where('product_id', $product->id)->orderBy('created_at', 'DESC')->get();

        return view('admin.bahan.show', compact('product', 'stockMovements'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        Alert::success('Success', 'Bahan berhasil dihapus');
        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function import(Request $request)
    {
        $file = $request->file('import_file');
        $request->validate([
            'import_file' => 'mimes:csv,txt,xls,xlsx',
        ]);

        Excel::import(new BahanImport(), $file);

        Alert::success('Success', 'Bahan berhasil di import');
        return redirect()->back();
    }
}
