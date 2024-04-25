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
    <link rel="stylesheet" href="/css/front.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Arcadia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gestion') ? 'active' : '' }}"
                            href="{{ route('gestion') }}">Dashboard</a>
                    </li>
                    @if ($user->role->label === 'administrateur')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('gestion.rapports') ? 'active' : '' }}"
                                href="{{ route('gestion.rapports') }}">Consulter les comptes rendus vétérinaire</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Gestion Zoo
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ request()->routeIs('gestion.services') ? 'active' : '' }}"
                                        href="{{ route('gestion.services') }}">Services</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('gestion.habitats') ? 'active' : '' }}"
                                        href="{{ route('gestion.habitats') }}">Habitats</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('gestion.horaires') ? 'active' : '' }}"
                                        href="{{ route('gestion.horaires') }}">Horaires</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('gestion.animals') ? 'active' : '' }}"
                                        href="{{ route('gestion.animals') }}">Animaux</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('create.comptes') ? 'active' : '' }}"
                                        href="{{ route('create.comptes') }}">Création de comptes</a></li>
                            </ul>
                        </li>
                    @endif
                    @if ($user->role->label === 'vétérinaire')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('gestion.rapports') ? 'active' : '' }}"
                                href="{{ route('gestion.rapports') }}">Comptes rendus</a>
                        </li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('gestion.habitats') ? 'active' : '' }}"
                                href="{{ route('gestion.habitats') }}">Habitats</a></li>
                    @endif
                    @if ($user->role->label === 'employé')
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('gestion.services') ? 'active' : '' }}"
                                href="{{ route('gestion.services') }}">Services</a></li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('gestion.alimentations') ? 'active' : '' }}"
                                href="{{ route('gestion.alimentations') }}">Alimentation</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i
                                class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main id="pageBody">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @yield('script')
    @if(Request::route()->getName() == 'gestion.rapports')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Capture l'événement de soumission du formulaire
            document.getElementById('searchForm').addEventListener('submit', function(e) {
                e.preventDefault(); // Empêche la soumission du formulaire par défaut

                // Récupère les valeurs des champs
                var dateSelect = document.getElementById('dateSelect').value;
                var animal_id = document.getElementById('animalSelect').value;

                // Construit les paramètres de la requête
                var params = new URLSearchParams();
                params.append('date', dateSelect);
                params.append('animal_id', animal_id);

                // Envoie une requête fetch au serveur
                fetch('{{ route('gestion.rapports.search') }}?' + params, {
                        method: 'GET',
                        headers: {
                            'Accept': 'text/html',
                        },
                    })
                    .then(response => response.text())
                    .then(data => {
                        // Met à jour la section des résultats avec les données de la réponse
                        document.getElementById('searchResults').innerHTML = data;

                    })
                    .catch(error => console.error('Error in fetch request:', error));

                document.getElementById('dateSelect').value = "Rechercher par dates";
                document.getElementById('animalSelect').value = "Rechercher par animal";
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            let alertSuccess = document.querySelector('.alert');
            if (alertSuccess) {
                setTimeout(() => {
                    alertSuccess.remove();
                }, 3000);
            }
        });
    </script>
@endif
<script src="/js/gestion/deleteSuccess.js"></script>
</body>

</html>
