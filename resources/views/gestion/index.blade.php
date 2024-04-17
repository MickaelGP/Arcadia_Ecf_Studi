@extends('layouts.gestion')

@section('content')
    <div class="container text-center mt-3">
        <h1>Bienvenu sur votre espace {{ $user->prenom }}</h1>
    </div>
    @if (session('success'))
        <div class="container w-50 text-center alert alert-success" id="alert">
            <h1>{{ session('success') }}</h1>
        </div>
    @endif
    @if ($user->role->label === 'administrateur')
        <div class="container text-center w-50">
            <ul class="list-group">
                @forelse ($animalTrends as $trend)
                    <li class="list-group-item">{{ $trend->nom }} à été consulté :{{ $trend->nombreDeVue }} fois</li>
                @empty
                    <h1>Aucune données</h1>
                @endforelse
            </ul>
        </div>
    @endif
    @if ($user->role->label === 'vétérinaire')
        <div class="container mt-3">
            <div class="row justify-content-center pb-5">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h2>Alimentation par animal</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Animal</th>
                                        <th scope="col">Alimentation</th>
                                        <th scope="col">Quantitées</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alimentations as $alimentation)
                                        <tr>
                                            <td>
                                                @if ($alimentation->animal)
                                                    {{ $alimentation->animal->prenom }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $alimentation->nourriture }}</td>
                                            <td>{{ $alimentation->quantite }} G</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($user->role->label === 'employé')
        <div class="container mt-3">
            <div class="row justify-content-center pb-5">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h2>Avis à valider</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Pseudo</th>
                                        <th scope="col">Commentaire</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($avis as $avi)
                                        <tr>
                                            <td>{{ $avi->pseudo }}</td>
                                            <td>{{ $avi->commentaire }}</td>
                                            <td>
                                                <a href="{{ route('gestion.avis.edit', $avi->id) }}"
                                                    class="btn btn-info">Voir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
