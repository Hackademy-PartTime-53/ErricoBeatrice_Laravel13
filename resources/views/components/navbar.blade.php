<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Blog di Cucina con il link principale -->
        <a class="navbar-brand" href="/">🍽 Blog di Cucina</a>

        <!-- Se l'utente è loggato, aggiungi il link "Aggiungi ricetta" accanto -->
        @auth
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ricette.create') }}">Aggiungi ricetta</a>
                </li>
            </ul>
        @endauth

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Link per tutte le ricette -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ricette.index') }}">Tutte le ricette</a>
                </li>
            </ul>
        </div>

        @if(auth()->check() && auth()->user()->is_admin)
        <li class="dropdown">
        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Admin </button>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{ route('utenti.lista') }}">Lista Utenti/Modifica/Elimina</a></li>
        
        <li><a class="dropdown-item" href="{{ route('utenti.nuovo') }}">Crea Utente</a></li>
        </ul>
        </li>
        @endif      


        <!-- Dropdown per login, logout, registrazione -->
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- Se l'utente è loggato, mostra il nome dell'utente, altrimenti mostra il menu login -->
                @guest
                    Menu
                @else
                    {{ Auth::user()->name }}
                @endguest
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ url('/') }}">Home</a></li>

                @guest
                    <!-- Link per registrazione e login -->
                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                @else
                    <!-- Logout link -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item btn btn-link" style="display: inline; padding: 0;">
                                Logout ({{ Auth::user()->name }})
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

