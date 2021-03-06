@php
/**
 * Item Product
 * 
 * @var $detail App\Models\InvoiceDetail
 */

$product = $detail->product ?: new App\Models\Product;
$category = $product->category;

$order_detail = $detail->order_detail ?: null;
$qtyMax = !$order_detail ? $product->stock : $order_detail->quantity;

$foto = !$product->foto ? null : $product->foto->first();

$modal = !isset($modal) ? '#productModal' : $modal;
$name = !isset($name) ? 'products' : $name;
@endphp
<div class="item-product row" data-id="{{ $product->id }}" data-price="{{ $detail->price }}" data-moved="{{ $order_detail->moved ?? 0 }}" data-max="{{ $qtyMax }}" data-qty="{{ $detail->quantity }}" data-stock="{{ $product->stock }}" data-name="{{ $name }}">
    <div class="col-5 row">
        <div class="col-auto" style="display: {{ (!$product->id || !$foto) ? 'none' : 'block' }}">
            @if ($foto)
                <img src="{{ $foto->getUrl('thumb') }}" class="product-img" />
            @elseif (!$product->id)
                <img src="" class="product-img" />
            @endif
        </div>

        <div class="col product-col-main {{ !$product->id ? 'align-self-center' : '' }}">
            @if ($product->id)
                <div class="product-content">
                    <h6 class="text-sm product-name mb-1">{{ $product->name }}</h6>

                    <p class="mb-0 text-sm">
                        Order Qty: <span class="product-qty-max">{{ $order_detail->quantity ?? '' }}</span>
                    </p>

                    <p class="mb-0 text-sm">
                        Stock: <span class="product-stock">{{ $product->stock }}</span>
                    </p>

                    <p class="mb-0 text-sm">
                        Terkirim: <span class="product-moved">{{ $order_detail->moved ?? '' }}</span>
                    </p>
                </div>
            @else
                <button type="button" class="btn py-1 border product-pick" data-toggle="modal" data-target="{{ $modal }}">
                    <span class="text-sm">Pilih Produk</span>

                    <i class="fa fa-chevron-down text-xs ml-4"></i>
                </button>
            @endif
        </div>
    </div>

    <div class="col product-col-content row align-items-end align-self-center">
        <div class="col" style="max-width: 120px">
            <p class="mb-0 text-sm">Qty Kirim</p>

            <x-admin.form-group
                type="number"
                id="fieldQty-{{ $product->id }}"
                :name="!$product->id ? null : $name.'['.($product->id ?: 0).'][qty]'"
                containerClass=" m-0"
                boxClass=" p-0"
                class="form-control-sm hide-arrows text-center product-qty product-qty1"
                value="{{ abs($detail->quantity) }}"
                :min="!$product->id ? 0 : 1"
                max="{{ $qtyMax }}"
            >
                <x-slot name="left">
                    <button type="button" class="btn btn-sm border-0 px-2 product-qty-act" data-target=".product-qty1" data-action="-">
                        &minus;
                    </button>
                </x-slot>

                <x-slot name="right">
                    <button type="button" class="btn btn-sm border-0 px-2 product-qty-act" data-target=".product-qty1" data-action="+">
                        &plus;
                    </button>
                </x-slot>
            </x-admin.form-group>
        </div>

        <div class="col" style="max-width: 240px">
            <p class="mb-0 text-sm">Harga</p>

            <x-admin.form-group
                type="number"
                id="fieldPrice-{{ $product->id }}"
                :name="!$product->id ? null : $name.'['.($product->id ?: 0).'][price]'"
                containerClass=" m-0"
                boxClass=" px-2 py-0"
                class="form-control-sm product-price"
                value="{{ $detail->price ?: 0 }}"
                :min="!$product->id ? 0 : 1"
                readonly
            >
                <x-slot name="left">
                    <span class="text-sm mr-1">Rp</span>
                </x-slot>
            </x-admin.form-group>
        </div>

        <div class="col text-right">
            <p class="text-sm mb-0">Subtotal</p>
            <p class="m-0 product-subtotal">@money($detail->total)</p>
        </div>

        @if (!$detail->id)
            <div class="col-auto pl-5 item-product-action">
                <a href="#" class="btn btn-danger btn-sm product-delete">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        @endif
    </div>
</div>
