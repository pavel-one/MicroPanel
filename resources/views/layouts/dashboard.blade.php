<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('chunks.head')
<body>
<div id="app">
    @include('chunks.topnav')
    <main class="py-4">
        <div class="container" id="app">

            <div class="row justify-content-center">

                <left-nav :route="'{{ Request::root().'/'.Request::route()->uri() }}'">
                </left-nav>
                <div class="col-md-10">
                    <message-dashboard v-if="message.text"
                                       :text="message.text"
                                       :error="message.error">

                    </message-dashboard>
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
