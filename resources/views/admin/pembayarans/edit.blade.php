@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pembayaran.title_singular') }}
    </div>

    <div class="card-body">
        @if (session()->has('error-message'))
            <p class="text-danger">
                {{session()->get('error-message')}}
            </p>
        @endif

        <form method="POST" action="{{ !$pembayaran->id ? route('admin.pembayarans.store') : route("admin.pembayarans.update", [$pembayaran->id]) }}" enctype="multipart/form-data" id="pembayaranForm">
            @method(!$pembayaran->id ? 'POST' : 'PUT')
            @csrf

            @php
            $tabs = [
                [ 'label' => 'Pembayaran', 'enabled' => true ],
                [ 'label' => 'Riwayat', 'enabled' => !!$tagihan->id ],
            ];
            @endphp
            <ul class="nav nav-tabs" id="modelTabs" role="tablist">
                @foreach ($tabs as $tab)
                    @php
                    $classes = $loop->first ? ' active' : '';

                    if (!$tab['enabled']) {
                        $classes .= ' disabled';
                    }
                    @endphp
                    <li class="nav-item" role="presentation">
                        <a class="nav-link{{ $classes }}" id="order-tab-{{ $loop->iteration }}" data-toggle="tab" href="#order-{{ $loop->iteration }}" role="tab">
                            {{ $loop->iteration . '. ' . $tab['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content" id="modelTabsContent">
                <div class="tab-pane fade show active" id="order-1" role="tabpanel">
                    @include('admin.pembayarans.parts.tab-pembayaran')
                </div>

                <div class="tab-pane fade" id="order-2" role="tabpanel">
                    @include('admin.pembayarans.parts.tab-pembayaran-history')
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function($) {
    $(function() {
        var form = $('#pembayaranForm');
        var tabs = form.find('#modelTabs');
        var tabsContent = form.find('#modelTabsContent');
        var tabsNavs = form.find('.modelTabs-nav');

        tabsNavs.on('click', function(e) {
            e.preventDefault();

            tabs.find('[href="'+$(e.currentTarget).attr('href')+'"]').filter(':not(.disabled)').tab('show');
        });
    });
})(jQuery);
</script>
@endpush
