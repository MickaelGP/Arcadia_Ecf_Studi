@extends('layouts.gestion')

@section('content')
    <div class="container pb-3">
        <div class="container py-4 mt-5 shadow rounded">
            <h1 class="text-center">Ajouter un animal</h1>
            <form method="POST" action="{{ route('gestion.animals.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputEtat" class="form-label">Etat de l'annimal </label>
                    <input type="text" class="form-control  @error('etat') is-invalid @enderror" id="etat"
                        name="etat" required>
                    @error('etat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPrenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control  @error('prenom') is-invalid @enderror" id="prenom"
                        name="prenom" required>
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" name="race_id" id="raceSelect" aria-label="Default select example">
                        <option selected>Selectionner une race</option>
                        @forelse ($races as $race)
                            <option value="{{ $race->id }}">{{ $race->label }}
                            </option>
                        @empty
                            <h1>No Data</h1>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="habitat_id" id="habitatSelect" aria-label="Default select example">
                        <option selected>Selectionner un habitat</option>
                        @forelse ($habitats as $habitat)
                            <option value="{{ $habitat->id }}">{{ $habitat->nom }}
                            </option>
                        @empty
                            <h1>No Data</h1>
                        @endforelse
                    </select>
                </div>
                <div class="text-center pt-2">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
