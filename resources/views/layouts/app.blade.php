<!doctype html>
<html lang="{{ App::getLocale() }}">
    <head>
        <title>@yield('title') - Account managment</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" async></script>
    </head>

    <body>
        <main role="main" class="container">
            <div class="row">
                <div class="col-md-12 main-content">

                    {{-- Page header --}}
                    <h1 class="display-3">
                        @yield('title')
                    </h1>

                    {{-- Status of some actions --}}
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>
    </body>
</html>
