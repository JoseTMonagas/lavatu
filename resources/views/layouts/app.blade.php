<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="row">
            <div class="container">
                <div class="col-md">
                    <div class="card mt-4 static" style="z-index: 2">
                        <div class="card-body bg-dark rounded shadow d-flex flex-row justify-content-between align-items-baseline">
                            <div>
                                <vs-button type="line">Nosotros</vs-button>
                                <vs-button type="line">Nuestro Servicio</vs-button>
                                <vs-button type="line">Nuestros Clientes</vs-button>
                            </div>
                            <img class="img-fluid" alt="Logo lavatu" src="https://via.placeholder.com/300x120?text=Lavatu" style="position:absolute; margin: -3% 33% 0 36%;" />
                            <div>
                                <vs-button type="line">Contactanos</vs-button>
                                <vs-button type="line">Ubicanos</vs-button>
                                <vs-button type="line">Solicita una hora</vs-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
