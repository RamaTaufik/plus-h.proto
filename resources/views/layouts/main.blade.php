<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <link rel="icon" type="image/png" href="{{ url('favicon.ico') }}">
        @yield('title')
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ url('assets/sbadmin/css/styles.css') }}" rel="stylesheet" />

        <!-- Fonts -->
        <link href="{{ url('assets/css/font.css') }}" rel="stylesheet" />
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Font Awesome -->
        <script src="{{ url('assets/js/font-awesome.js') }}" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">

        <!-- Astro - Loading CSS -->
        <link id="pagestyle" href="{{ url('assets/css/loading-dot.css') }}" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed" style="background-image:url({{ url('assets/img/background.png') }});background-attachment:fixed;background-size:50%;">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-sec shadow-sm" style="padding-left:100px; padding-right:100px;">
            <div style="max-width:25px;">
                <img src="{{ url('icon.png') }}" class="img-fluid border-radius-sm" alt="Responsive image">
            </div>
            <div class="text-white">
                {{ __('PLUS-H') }}
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="{{ url('assets/img/default-user.jpg') }}" alt="" class="pfp">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" class="bg-light">
                <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <button class="btn-warning m-3">
                            <a class="lead text-decoration-none text-dark" href="{{ route('home') }}">
                                &larr; KEMBALI
                            </a>
                        </button>
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Aksi</div>
                            <a class="nav-link text-dark" href="{{ route('admin') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link text-dark collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Edit <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" id="child-edit">
                                    <a class="nav-link text-dark collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-edit-place">
                                        Place <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" data-bs-parent="#child-edit" id="collapse-edit-place">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Country') }}">Country</a>
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='City') }}">City</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link text-dark collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-edit-supplier">
                                        Supplier <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" data-bs-parent="#child-edit" id="collapse-edit-supplier">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Supplier') }}">Supplier</a>
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Supplier_Country') }}">Supplier_Country</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link text-dark collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-edit-product">
                                        Product <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" data-bs-parent="#child-edit" id="collapse-edit-product">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Product') }}">Product</a>
                                            <a class="nav-link text-dark collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-edit-product-tag">
                                                Tag <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                            </a>
                                            <div class="collapse" id="collapse-edit-product-tag">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link text-dark" href="{{ route('admin.data', $class='Tag') }}">Tag</a>
                                                    <a class="nav-link text-dark" href="{{ route('admin.data', $class='Product_Tag') }}">Product_tag</a>
                                                </nav>
                                            </div>
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Image') }}">Image</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link text-dark collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-edit-order">
                                        Order <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" data-bs-parent="#child-edit" id="collapse-edit-order">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Payment_Method') }}">Payment_Method</a>
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Shipping') }}">Shipping</a>
                                            <a class="nav-link text-dark collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-edit-order-type">
                                                Type <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                            </a>
                                            <div class="collapse" id="collapse-edit-order-type">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link text-dark" href="{{ route('admin.data', $class='Type') }}">Type</a>
                                                    <a class="nav-link text-dark" href="{{ route('admin.data', $class='Shipping_Type') }}">Shipping_Type</a>
                                                </nav>
                                            </div>
                                            <a class="nav-link text-dark" href="{{ route('admin.data', $class='Orders') }}">Order</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link text-dark" href="{{ route('admin.data', $class='Review') }}">Review</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @if(session('success'))
                        <div class="container">
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                                {{session('success')}}
                            </div>
                        </div>
                        @endif
                        @yield('content')
                    </div>
                    @include('layouts.footer')
                </main>
            </div>
        </div>
        @yield('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>
