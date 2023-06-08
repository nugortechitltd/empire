
<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">


<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/dashboards_ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 13:28:16 GMT -->
<head>
    @php
        $web = App\Models\Setting::where('status', 1)->get();
    @endphp
    @if (App\Models\Setting::exists())
    <title>{{!empty($web->first()->title) ? $web->first()->title : 'website title'}}</title>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (App\Models\Setting::exists())
    <meta name="description" content="{{!empty($web->first()->description) ? $web->first()->description : 'website description'}}">
    <meta name="keywords" content="{{!empty($web->first()->keywords) ? $web->first()->keywords : 'website keywords'}}">
    @endif
    {{-- <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard"> --}}
    <meta name="author" content="Codedthemes" />
    @if (App\Models\Setting::exists())
    @if (empty($web->first()->favicon))
        <link rel="icon" type="image/x-icon" href="{{asset('backend/img/favicon.ico')}}">
        @else
        <link rel="icon" type="image/x-icon" href="{{asset('uploads/settings/favicon')}}/{{$web->first()->favicon}}">
    @endif
    @endif

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{asset('backend/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/open-iconic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/feather.css')}}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/uikit.css')}}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/flot/flot.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/datatables/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/pages/users.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-sweetalert/bootstrap-sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/timepicker/timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/minicolors/minicolors.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    
                    <a href="{{route('site')}}" target="_" class="app-brand-text demo sidenav-text font-weight-normal ml-2">
                        <span class="app-brand-logo demo">
                            @if (App\Models\Setting::exists())
                            @if (empty($web->first()->logo))
                                <img src="{{asset('backend/img/logo.png')}}" alt="Brand Logo" class="img-fluid">
                            @else 
                                <img src="{{asset('uploads/settings/logo')}}/{{$web->first()->logo}}" alt="Brand Logo" class="img-fluid" style="width: 150px";>
                            @endif
                            @endif
                        </span>
                    </a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">

                    <!-- Dashboards -->
                    {{-- <li class="sidenav-item active open">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>
                            <div class="pl-1 ml-auto">
                                <div class="badge badge-danger">Hot</div>
                            </div>
                        </a>
                    </li> --}}
                    <li class="sidenav-item {{ Request::is('home') ? 'active open' : '' }}">
                        <a href="{{route('home')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="{{route('site')}}" target="_" class="sidenav-link">
                            <i class="sidenav-icon feather icon-globe"></i>
                            <div>Website</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('user*') ? 'active open' : '' }}" >
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-users"></i>
                            <div>Users</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('user/list') ? 'active' : '' }}">
                                <a href="{{route('users')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('user/profile') ? 'active' : '' }}">
                                <a href="{{route('profile')}}" class="sidenav-link">
                                    <div>Account settings</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="sidenav-item">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-grid"></i>
                            <div>Catalog</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="{{route('users')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="{{route('profile')}}" class="sidenav-link">
                                    <div>Account settings</div>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="sidenav-item {{ Request::is('category*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-grid"></i>
                            <div>Category</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('category/add') ? 'active' : '' }}">
                                <a href="{{route('category.add')}}" class="sidenav-link">
                                    <div>Add</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('category/list') ? 'active' : '' }}">
                                <a href="{{route('category.list')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('color*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon fas fa-palette"></i>
                            <div>Color</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('color/add') ? 'active' : '' }}">
                                <a href="{{route('color.add')}}" class="sidenav-link">
                                    <div>Add</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('color/list') ? 'active' : '' }}">
                                <a href="{{route('color.list')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('size*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon ion ion-md-list"></i>
                            <div>Size</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('size/add') ? 'active' : '' }}">
                                <a href="{{route('size.add')}}" class="sidenav-link">
                                    <div>Add</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('size/list') ? 'active' : '' }}">
                                <a href="{{route('size.list')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('brand*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon oi oi-bookmark"></i>
                            <div>Brand</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('brand/add') ? 'active' : '' }}">
                                <a href="{{route('brand.add')}}" class="sidenav-link">
                                    <div>Add</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('brand/list') ? 'active' : '' }}">
                                <a href="{{route('brand.list')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('product*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon ion ion-md-basket"></i>
                            <div>Product</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('product/add') ? 'active' : '' }}">
                                <a href="{{route('product.add')}}" class="sidenav-link">
                                    <div>Add</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('product/list') ? 'active' : '' }}">
                                <a href="{{route('product.list')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidenav-item {{ Request::is('coupon*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon lnr lnr-paperclip"></i>
                            <div>Coupon</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('coupon/add') ? 'active' : '' }}">
                                <a href="{{route('coupon.add')}}" class="sidenav-link">
                                    <div>Add</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('coupon/list') ? 'active' : '' }}">
                                <a href="{{route('coupon.list')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('contact*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-users"></i>
                            <div>Contact</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('contact/info') ? 'active' : '' }}">
                                <a href="{{route('contact.info')}}" class="sidenav-link">
                                    <div>Info</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('contact/info/list') ? 'active' : '' }}">
                                <a href="{{route('contact.info.list')}}" class="sidenav-link">
                                    <div>Info list</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('contact/list') ? 'active' : '' }}">
                                <a href="{{route('contact.list')}}" class="sidenav-link">
                                    <div>Messages</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('setting*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-settings"></i>
                            <div>Settings</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('setting/info') ? 'active' : '' }}">
                                <a href="{{route('setting.info')}}" class="sidenav-link">
                                    <div>Info</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('setting/info/list') ? 'active' : '' }}">
                                <a href="{{route('setting.info.list')}}" class="sidenav-link">
                                    <div>List</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('setting/socials') ? 'active' : '' }}">
                                <a href="{{route('socials')}}" class="sidenav-link">
                                    <div>Socials</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('page*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-book"></i>
                            <div>Pages</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('page/index') ? 'active' : '' }}">
                                <a href="{{route('index.page')}}" class="sidenav-link">
                                    <div>Index page</div>
                                </a>
                            </li> 
                            <li class="sidenav-item" {{ Request::is('page/offer') ? 'active' : '' }}>
                                <a href="{{route('offer.page')}}" class="sidenav-link">
                                    <div>Offer page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/campaign') ? 'active' : '' }}>
                                <a href="{{route('campaign.page')}}" class="sidenav-link">
                                    <div>Campaign page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/discount') ? 'active' : '' }}>
                                <a href="{{route('discount.page')}}" class="sidenav-link">
                                    <div>Validity page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/privacy') ? 'active' : '' }}>
                                <a href="{{route('privacy.page')}}" class="sidenav-link">
                                    <div>Privacy & policy page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/help') ? 'active' : '' }}>
                                <a href="{{route('help.page')}}" class="sidenav-link">
                                    <div>Help page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/terms') ? 'active' : '' }}>
                                <a href="{{route('terms.page')}}" class="sidenav-link">
                                    <div>Terms page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/refund') ? 'active' : '' }}>
                                <a href="{{route('refund.page')}}" class="sidenav-link">
                                    <div>Refund page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/website') ? 'active' : '' }}>
                                <a href="{{route('website.page')}}" class="sidenav-link">
                                    <div>About site page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/payment') ? 'active' : '' }}>
                                <a href="{{route('payments.page')}}" class="sidenav-link">
                                    <div>Payment page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/shipping') ? 'active' : '' }}>
                                <a href="{{route('shipping.page')}}" class="sidenav-link">
                                    <div>Shipping page</div>
                                </a>
                            </li>
                            <li class="sidenav-item" {{ Request::is('page/map') ? 'active' : '' }}>
                                <a href="{{route('map.page')}}" class="sidenav-link">
                                    <div>Map page</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('transaction*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon fas fa-truck"></i>
                            <div>Transaction</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('transaction/info') ? 'active' : '' }}">
                                <a href="{{route('transaction.info')}}" class="sidenav-link">
                                    <div>Transaction info</div>
                                </a>
                            </li> 
                            <li class="sidenav-item {{ Request::is('transaction/list') ? 'active' : '' }}">
                                <a href="{{route('transaction.list')}}" class="sidenav-link">
                                    <div>Transactions</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('subscribe*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon ion ion-ios-contacts"></i>
                            <div>Subscriber</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('subscribe/list') ? 'active' : '' }}">
                                <a href="{{route('subscribe.list')}}" class="sidenav-link">
                                    <div>Subscriber list</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('faq*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon ion ion-ios-contacts"></i>
                            <div>Faq</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item {{ Request::is('faq/info') ? 'active' : '' }}">
                                <a href="{{route('faq.info')}}" class="sidenav-link">
                                    <div>Add</div>
                                </a>
                            </li>
                            {{-- <li class="sidenav-item {{ Request::is('faq/list') ? 'active' : '' }}">
                                <a href="{{route('faq.list')}}" class="sidenav-link">
                                    <div>Faq list</div>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x" id="layout-navbar">

                    <!-- Brand demo (see assets/css/demo/demo.css) -->
                    <a href="{{route('site')}}" target="_" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        @if (App\Models\Setting::exists())
                        @if (empty($web->first()->logo))
                            <img src="{{asset('backend/img/logo.png')}}" alt="Brand Logo" class="img-fluid">
                        @else 
                            <img src="{{asset('uploads/settings/logo')}}/{{$web->first()->logo}}" alt="Brand Logo" class="img-fluid" style="width: 150px";>
                        @endif
                        @endif
                        {{-- <span class="app-brand-logo demo">
                            <img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                        </span>
                        <span class="app-brand-text demo font-weight-normal ml-2">Empire</span> --}}
                    </a>

                    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">

                        <div class="navbar-nav align-items-lg-center">
                            <!-- Search -->
                            {{-- <label class="nav-item navbar-text navbar-search-box p-0 active">
                                <i class="feather icon-search navbar-icon align-middle"></i>
                                <span class="navbar-search-input pl-2">
                                  <input type="text" class="form-control navbar-text mx-2" placeholder="Search...">
                                </span>
                            </label> --}}
                        </div>

                        <div class="navbar-nav align-items-lg-center ml-auto">
                            <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                                    <i class="feather icon-bell navbar-icon align-middle"></i>
                                    <span class="badge badge-danger badge-dot indicator"></span>
                                    <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                                        4 New Notifications
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div class="ui-icon ui-icon-sm feather icon-home bg-secondary border-0 text-white"></div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">Login from 192.168.1.1</div>
                                                <div class="text-light small mt-1">
                                                    Aliquam ex eros, imperdiet vulputate hendrerit et.
                                                </div>
                                                <div class="text-light small mt-1">12h ago</div>
                                            </div>
                                        </a>

                                        <a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div class="ui-icon ui-icon-sm feather icon-user-plus bg-info border-0 text-white"></div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">You have
                                                    <strong>4</strong> new followers</div>
                                                <div class="text-light small mt-1">
                                                    Phasellus nunc nisl, posuere cursus pretium nec, dictum vehicula tellus.
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div class="ui-icon ui-icon-sm feather icon-power bg-danger border-0 text-white"></div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">Server restarted</div>
                                                <div class="text-light small mt-1">
                                                    19h ago
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div class="ui-icon ui-icon-sm feather icon-alert-triangle bg-warning border-0 text-dark"></div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">99% server load</div>
                                                <div class="text-light small mt-1">
                                                    Etiam nec fringilla magna. Donec mi metus.
                                                </div>
                                                <div class="text-light small mt-1">
                                                    20h ago
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:" class="d-block text-center text-light small p-2 my-1">Show all notifications</a>
                                </div>
                            </div>

                            <div class="demo-navbar-messages nav-item dropdown mr-lg-3">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                                    <i class="feather icon-mail navbar-icon align-middle"></i>
                                    <span class="badge badge-success badge-dot indicator"></span>
                                    <span class="d-lg-none align-middle">&nbsp; Messages</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                                        {{App\Models\Contact::where('status', '0')->count()}} New Messages
                                    </div>
                                    <div class="list-group list-group-flush">
                                        @foreach (App\Models\Contact::latest()->take(5)->get() as $contact)
                                            
                                        
                                        <a href="{{route('contact.list')}}" class="list-group-item list-group-item-action media d-flex align-items-center"  style="background:{{$contact->status == 0 ? 'rgba(96, 108, 114, 0.1)': 'r'}}">
                                            {{-- <img src="assets/img/avatars/6-small.png" class="d-block ui-w-40 rounded-circle" alt> --}}
                                            <div class="media-body ml-3">
                                                <div class="text-dark line-height-condenced">{{$contact->message}}</div>
                                                <div class="text-light small mt-1">
                                                    {{$contact->name}} &nbsp;·&nbsp; {{ $contact->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>

                                    <a href="{{route('contact.list')}}" class="d-block text-center text-light small p-2 my-1">Show all messages</a>
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        
                                        @if (Auth::user()->image == null) 
                                        <img src="{{Avatar::create(Auth::user()->name)->toBase64()}}" class="d-block ui-w-30 rounded-circle" alt="">
                                        @else
                                            <img src="{{asset('uploads/user')}}/{{Auth::user()->image}}" alt class="d-block ui-w-30 rounded-circle">
                                        @endif
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{Auth::user()->name}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('profile')}}" class="dropdown-item">
                                        <i class="feather icon-user text-muted"></i> &nbsp; My profile</a>
                                    {{-- <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-mail text-muted"></i> &nbsp; Messages</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-settings text-muted"></i> &nbsp; Account settings</a>
                                    <div class="dropdown-divider"></div> --}}
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    @yield('content')
                    
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    
                    <!-- [ Layout footer ] End -->

                </div>
                {{-- <nav class="layout-footer footer footer-light">
                    <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
                        <div class="pt-3">
                            <span class="float-md-right d-none d-lg-block">&copy; Exclusive on Themeforest | Hand-crafted &amp; Made with <i class="fas fa-heart text-danger mr-2"></i></span>
                        </div>
                        <div>
                            <a href="javascript:" class="footer-link pt-3">About Us</a>
                            <a href="javascript:" class="footer-link pt-3 ml-4">Help</a>
                            <a href="javascript:" class="footer-link pt-3 ml-4">Contact</a>
                            <a href="javascript:" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </nav> --}}
                <!-- [ Layout content ] Start -->

            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <!-- Core scripts -->
    <script src="{{asset('backend/js/pace.js')}}"></script>
    {{-- <script src="{{asset('backend/js/jquery-3.3.1.min.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{asset('backend/libs/popper/popper.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/js/sidenav.js')}}"></script>
    <script src="{{asset('backend/js/layout-helpers.js')}}"></script>
    <script src="{{asset('backend/js/material-ripple.js')}}"></script>

    <!-- Libs -->
    <script src="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('backend/libs/eve/eve.js')}}"></script>
    <script src="{{asset('backend/libs/flot/flot.js')}}"></script>
    <script src="{{asset('backend/libs/flot/curvedLines.js')}}"></script>
    <script src="{{asset('backend/libs/chart-am4/core.js')}}"></script>
    <script src="{{asset('backend/libs/chart-am4/charts.js')}}"></script>
    <script src="{{asset('backend/libs/chart-am4/animated.js')}}"></script>
    <script src="{{asset('backend/libs/raphael/raphael.js')}}"></script>
    <script src="{{asset('backend/libs/morris/morris.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('backend/libs/moment/moment.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
    <script src="{{asset('backend/libs/datatables/datatables.js')}}"></script>
    <script src="{{asset('backend/libs/bootbox/bootbox.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-sweetalert/bootstrap-sweetalert.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('backend/libs/timepicker/timepicker.js')}}"></script>
    <script src="{{asset('backend/libs/minicolors/minicolors.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>



    @yield('footer_script')
    @if(session('success')) {
    <script>
        
            const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '{{ session('success' )}}'
        })
        </script>
    }
    @endif
    @if(session('error')) {
    <script>
        
            const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'error',
        title: '{{ session('error' )}}'
        })
        </script>
    }
    @endif

    <!-- Demo -->
    {{-- <script src="{{asset('backend/js/demo.js"></script> --}}
    <script src="{{asset('backend/js/analytics.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboards_ecommerce.js')}}"></script>
    <script src="{{asset('backend/js/demo.js')}}"></script>
    <script src="{{asset('backend/js/pages/ui_modals.js')}}"></script>
    <script src="{{asset('backend/js/pages/forms_pickers.js')}}"></script>

    <script>
        // DataTable start
        $('#report-table').DataTable();
        // DataTable end
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'description',
                tabsize: 2,
                height: 200
            });
        });
    </script>

        
    </body>


<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/dashboards_ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 13:28:24 GMT -->
</html>
