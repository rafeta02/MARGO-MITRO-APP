<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('user_alert_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-alerts.index') }}">
                                            {{ trans('cruds.userAlert.title') }}
                                        </a>
                                    @endcan
                                    @can('master_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.master.title') }}
                                        </a>
                                    @endcan
                                    @can('unit_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.units.index') }}">
                                            {{ trans('cruds.unit.title') }}
                                        </a>
                                    @endcan
                                    @can('brand_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.brands.index') }}">
                                            {{ trans('cruds.brand.title') }}
                                        </a>
                                    @endcan
                                    @can('city_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.cities.index') }}">
                                            {{ trans('cruds.city.title') }}
                                        </a>
                                    @endcan
                                    @can('category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.categories.index') }}">
                                            {{ trans('cruds.category.title') }}
                                        </a>
                                    @endcan
                                    @can('salesperson_access')
                                        <a class="dropdown-item" href="{{ route('frontend.salespeople.index') }}">
                                            {{ trans('cruds.salesperson.title') }}
                                        </a>
                                    @endcan
                                    @can('productionperson_access')
                                        <a class="dropdown-item" href="{{ route('frontend.productionpeople.index') }}">
                                            {{ trans('cruds.productionperson.title') }}
                                        </a>
                                    @endcan
                                    @can('product_access')
                                        <a class="dropdown-item" href="{{ route('frontend.products.index') }}">
                                            {{ trans('cruds.product.title') }}
                                        </a>
                                    @endcan
                                    @can('stock_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.stock.title') }}
                                        </a>
                                    @endcan
                                    @can('stock_adjustment_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.stock-adjustments.index') }}">
                                            {{ trans('cruds.stockAdjustment.title') }}
                                        </a>
                                    @endcan
                                    @can('stock_movement_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.stock-movements.index') }}">
                                            {{ trans('cruds.stockMovement.title') }}
                                        </a>
                                    @endcan
                                    @can('sales_order_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.salesOrder.title') }}
                                        </a>
                                    @endcan
                                    @can('order_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.orders.index') }}">
                                            {{ trans('cruds.order.title') }}
                                        </a>
                                    @endcan
                                    @can('order_detail_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.order-details.index') }}">
                                            {{ trans('cruds.orderDetail.title') }}
                                        </a>
                                    @endcan
                                    @can('invoice_menu_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.invoiceMenu.title') }}
                                        </a>
                                    @endcan
                                    @can('invoice_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.invoices.index') }}">
                                            {{ trans('cruds.invoice.title') }}
                                        </a>
                                    @endcan
                                    @can('invoice_detail_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.invoice-details.index') }}">
                                            {{ trans('cruds.invoiceDetail.title') }}
                                        </a>
                                    @endcan
                                    @can('tagihan_menu_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.tagihanMenu.title') }}
                                        </a>
                                    @endcan
                                    @can('tagihan_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.tagihans.index') }}">
                                            {{ trans('cruds.tagihan.title') }}
                                        </a>
                                    @endcan
                                    @can('tagihan_movement_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.tagihan-movements.index') }}">
                                            {{ trans('cruds.tagihanMovement.title') }}
                                        </a>
                                    @endcan
                                    @can('pembayaran_menu_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.pembayaranMenu.title') }}
                                        </a>
                                    @endcan
                                    @can('pembayaran_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.pembayarans.index') }}">
                                            {{ trans('cruds.pembayaran.title') }}
                                        </a>
                                    @endcan
                                    @can('production_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.production.title') }}
                                        </a>
                                    @endcan
                                    @can('production_order_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.production-orders.index') }}">
                                            {{ trans('cruds.productionOrder.title') }}
                                        </a>
                                    @endcan
                                    @can('production_order_detail_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.production-order-details.index') }}">
                                            {{ trans('cruds.productionOrderDetail.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>