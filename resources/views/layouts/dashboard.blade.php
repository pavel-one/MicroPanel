<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('chunks.head')
<body>
<div id="app">
    <left-nav :route="'{{ Request::root().'/'.Request::route()->uri() }}'">
    </left-nav>

    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Form -->
                <form @submit.prevent="" class="navbar-search navbar-search-light form-inline mr-sm-3">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Поиск" type="text">
                        </div>
                    </div>
                </form>
                <!-- User -->
                <user-menu></user-menu>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="container-fluid breadcrumbs">
                        <div class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">@yield('title')</div>
                    </div>
                    @yield('header')
                </div>
            </div>
        </div>
        <div class="container-fluid mt--7">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
