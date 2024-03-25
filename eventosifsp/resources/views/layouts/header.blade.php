<header>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <!--<img src="/img/logo-ifsp-removebg.png" alt="ifsp eventos" class="header-image ml-0">-->
                <img src="/img/eventosUsp.png" alt="ifsp eventos" class="header-image ml-0">
                
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link mx-2">Focos da dengue</a>
                    </li>
                    <li class="nav-item">
                        <a href="events/create" class="nav-link mx-2">Identificar foco</a>
                    </li>
                    <li class="nav-item">
                        <a href="/catalogo" class="nav-link mx-2">Catálogo de dados</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link mx-2">Meus focos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link mx-2">Gerir dados</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Sair
                        </a>
                        </form>
                    </li>
                    @endauth
                    
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link mx-2">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link mx-2">Cadastrar</a>
                    </li>
                    @endguest
                   
                </ul>
            </div>
        </div>
    </nav>

</header>