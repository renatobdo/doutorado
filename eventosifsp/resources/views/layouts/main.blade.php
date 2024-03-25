<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- css do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- css do google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- css da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/script.js"></script>

    <script src="/js/consultaCep.js"></script>
    
    @include('layouts.header')

</head>

<body>
    
    <!--<header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="img/logo-ifsp-removebg.png" alt="ifsp eventos">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link"> Eventos </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link"> Criar eventos </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link"> Entrar </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link"> Cadastrar </a>
                    </li>
                </ul>
            </div>
        </nav>
</header> -->
    
    
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{ session('msg')}}</p>
                @endif
            </div>
        </div>
    </main>
    
    @yield('content')
    @include('layouts.footer')



</body>

</html>