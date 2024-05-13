@extends('layouts.gestion')

@section('content')
    <div class="container text-center mt-2">
        <h1>Compte rendus</h1>
    </div>
    @include('shared.flash')
    <div class="container">
        <div class="row">
            <div class="container col-12 text-center mt-3">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header text-center">
                                <h2>Rechercher un compte rendu</h2>
                            </div>
                            <div class="card-body">
                                <form id="searchForm">
                                    <div class="mb-3">
                                        <select class="form-select" name="date" id="dateSelect"
                                            aria-label="Default select example">
                                            <option selected>Rechercher par dates</option>
                                            @forelse ($rapports->unique('date') as $rapport)
                                                <option value="{{ $rapport->date }}">{{ $rapport->date }}
                                                </option>
                                            @empty
                                                <h1>No Data</h1>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="animal_id" id="animalSelect"
                                            aria-label="Default select example">
                                            <option selected>Rechercher par animal</option>
                                            @forelse ($rapports->unique('animal_id') as $rapport)
                                                <option value="{{ $rapport->animal_id }}">{{ $rapport->animal->prenom }}
                                                </option>
                                            @empty
                                                <h1>No Data</h1>
                                            @endforelse
                                        </select>
                                    </div>
                                    <x-button type=" btn-primary shadow rounded-5">Rechercher</x-button>
                                    @if ($user->role->label === 'vétérinaire')
                                        <a href="{{ route('gestion.rapports.create') }}"
                                            class="btn btn-success pr-3 rounded-5">Ajouter un compte rendu</a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-12 text-center mt-3" id="searchResults"></div>
        </div>
    </div>
@endsection
