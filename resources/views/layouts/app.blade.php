<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('chunks.head')
<body>
<div id="app">
    @include('chunks.topnav')
    <main class="py-4">
        <div class="container" id="app">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
