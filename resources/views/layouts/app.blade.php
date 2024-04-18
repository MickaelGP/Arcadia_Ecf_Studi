<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/front.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand  {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}"><img src="/img/logo.png" alt="Logo arcadia" class="img-fluid w-50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('home') }}">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}"
                                href="{{ route('service') }}">Nos services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('habitat') ? 'active' : '' }}"
                                href="{{ route('habitat') }}">Les habitats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('connexion') ? 'active' : '' }}"
                                href="{{ route('connexion') }}">Connexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main id="pageBody">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mt-3">
                        <li><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">Acceuil</a></li>
                        <li><a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}"
                                href="{{ route('service') }}">Nos service</a></li>
                        <li><a class="nav-link {{ request()->routeIs('habitat') ? 'active' : '' }}"
                                href="{{ route('habitat') }}">Les Habitats</a></li>
                        <li><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">Contact</a></li>
                        <li><a class="nav-link {{ request()->routeIs('connexion') ? 'active' : '' }}"
                                href="{{ route('connexion') }}">Connexion</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mt-5">
                    <ul class="list-unstyled mt-3 text-center">
                        <li>Adresse : 123 route du zoo brocéliande</li>
                        <li>Telephone : 00.00.00.00.00</li>
                        <li>Mail : contact@arcadia.fr</li>
                    </ul>
                </div>
                <div class="col-md-3 mt-3 text-center">
                    <ul class="list-unstyled mt-3">
                        <li>Du lundi au vendredi : </li>
                        <li>De {{ $horaires[0]->ouverture_matin }}H à {{ $horaires[0]->fermeture_soir }}H</li>
                        <li>Le samedi :</li>
                        <li> De {{ $horaires[1]->ouverture_matin }}H à {{ $horaires[1]->fermeture_soir }}H</li>
                        <li>Le dimanche :</li>
                        <li> Fermé</li>
                    </ul>
                </div>
                <div class="col-md-3 text-center">
                    <h5><img src="/img/logo.png" alt="Logo arcadia" class="img-fluid w-50 "></h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">© 2024 Arcadia. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @if (Request::is('connexion'))
        <script src="/js/animationConnexion.js"></script>
    @endif
    @if (Request::is('contact') || Request::is('/'))
        <script src="/js/animationForm.js"></script>
    @endif
    <script src="/js/animation.js"></script>

</body>

</html>
