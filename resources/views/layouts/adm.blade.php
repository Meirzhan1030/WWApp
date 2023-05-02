<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.4.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">{{__('messages.admpanel')}}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset(\Illuminate\Support\Facades\Auth::user()->ava)}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h6>
                        <span>{{__('messages.role')}}: {{Auth::user()->role->{'name_'.app()->getLocale()} }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
{{--                        <a class="dropdown-item d-flex align-items-center" href="{{ route('users.profile') }}">--}}
{{--                            <i class="bi bi-person"></i>--}}
{{--                            <span>{{__('messages.myprof')}}</span>--}}
{{--                        </a>--}}
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('forums.index')}}">
                            <i class="bi bi-circle"></i>
                            <span>{{__('messages.store')}}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{__('messages.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
{{--            <li class="nav-item dropdown pe-3">--}}
{{--                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">--}}
{{--                    {{ config('app.languages')[app()->getLocale()] }}--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                    @foreach(config('app.languages') as $ln => $lang)--}}
{{--                        <a class="dropdown-item" href="{{ route('switch.lang', $ln) }}">--}}
{{--                            {{$lang}}--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>{{__('messages.user_managment')}}</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('forums.index')}}">
                            <i class="bi bi-circle"></i><span>{{__('messages.store')}}</span>
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="{{route('adm.users.index')}}">--}}
{{--                            <i class="bi bi-circle"></i><span>{{__('messages.user_managment')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{route('adm.users.edit')}}">--}}
{{--                            <i class="bi bi-circle"></i><span>{{__('messages.role')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li><!-- End Components Nav -->
        @elseif(\Illuminate\Support\Facades\Auth::user()->role->name == 'moderator')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>{{__('messages.store_managment')}}</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('items.index')}}">
                            <i class="bi bi-circle"></i><span>{{__('messages.store')}}</span>
                        </a>
                    </li>
                    <li>
                        @can('create', App\Models\Item::class)
                            <a href="{{ route('items.create') }}">
                                <i class="bi bi-circle"></i><span>{{__('buttons.go_to_create')}}</span>
                            </a>
                        @endcan
                    </li>
                    <li>
                        <a href="{{route('adm.categories.index')}}">
                            <i class="bi bi-circle"></i><span>{{__('messages.catpage')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('adm.categories.create')}}">
                            <i class="bi bi-circle"></i><span>{{__('messages.ccpage')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('adm.comments.index')}}">
                            <i class="bi bi-circle"></i><span>{{__('messages.comms')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('adm.basket.index')}}">
                            <i class="bi bi-circle"></i><span>{{__('messages.basket')}}</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->
        @endif
    </ul>

</aside><!-- End Sidebar-->

<main class="py-4" id="main" class="main">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all()  as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="section dashboard">

        @yield('content')

    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
