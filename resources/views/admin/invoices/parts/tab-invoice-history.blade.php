<div class="order-faktur pt-3">
    <div class="row align-items-center mb-2">
        <div class="col">
            <h5 class="mb-0">Riwayat Faktur</h5>
        </div>
    </div>

    <table class="table table-bordered table-invoice">
        <thead>
            <tr>
                <th rowspan="2" width="1%">No.</th>
                <th rowspan="2">No. Surat Jalan</th>
                <th rowspan="2">No. Invoice</th>
                <th rowspan="2" width="120">Tanggal</th>
                <th rowspan="2" width="120">Masuk/Keluar</th>
                <th colspan="3" class="text-center py-2">Produk</th>
                <th rowspan="2" class="text-center" width="1%">Total</th>
            </tr>

            <tr>
                <th class="pt-2">Nama</th>
                <th class="text-center pt-2" width="1%">Qty</th>
                <th class="text-center pt-2" width="1%">Subtotal</th>
            </tr>
        </thead>

        @if ($order && count($order->invoices))
            @foreach ($order->invoices as $row)
                <tbody>
                    @php
                    $rowspan = $row->invoice_details->count();
                    $link = route('admin.invoices.edit', $row->id);
                    $print = function($type) use ($row) {
                        return route('admin.invoices.show', ['invoice' => $row->id, 'print' => $type]);
                    };
                    $is_out = 0 < $row->nominal;
                    @endphp

                    @foreach ($row->invoice_details as $detail)
                        <tr>
                            @if ($loop->first)
                                <td rowspan="{{ $rowspan }}">{{ $loop->iteration }}</td>
                                <td rowspan="{{ $rowspan }}">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 pr-2">
                                            <a href="{{ $link }}">{{ $row->no_suratjalan }}</a>
                                        </div>

                                        <div>
                                            <a href="{{ $print('sj') }}" target="_blank">
                                                <i class="fa fa-print text-dark"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td rowspan="{{ $rowspan }}">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 pr-2">
                                            <a href="{{ $link }}">{{ $row->no_invoice }}</a>
                                        </div>

                                        <div>
                                            <a href="{{ $print('inv') }}" target="_blank">
                                                <i class="fa fa-print text-dark"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td rowspan="{{ $rowspan }}">{{ $row->date }}</td>
                                <td rowspan="{{ $rowspan }}" class="{{ $is_out ? 'text-warning' : 'text-info' }}">
                                    {{ $is_out ? 'Keluar' : 'Masuk' }}
                                </td>
                            @endif

                            <td>
                                @if ($product = $detail->product)
                                    <p class="m-0">
                                        <span>{{ $product->name }}</span>
                                        <br />
                                        <span class="text-xs text-muted">@money($detail->price)</span>
                                    </p>
                                @else
                                    <p class="m-0">Produk</p>
                                @endif
                            </td>
                            <td class="text-center">{{ abs($detail->quantity) }}</td>
                            <td class="text-right">@money(abs($detail->total))</td>
                            
                            @if ($loop->first)
                                <td rowspan="{{ $rowspan }}" class="text-right">@money(abs($row->nominal))</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        @else
            <tbody>
                <tr>
                    <td colspan="8" class="text-center">
                        <p class="mb-0">Belum ada riwayat faktur</p>
                    </td>
                </tr>
            </tbody>
        @endforelse
    </table>

    <div class="row mt-4">
        <div class="col">
            <a href="#order-1" class="btn btn-default border invoiceTabs-nav">Sebelumnya</a>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function($, numeral) {
    $(function() {
        var form = $('#invoiceForm');

    });
})(jQuery, window.numeral);
</script>
@endpush
