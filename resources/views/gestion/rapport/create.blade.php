@extends('layouts.gestion')


@section('content')
    <div class="container pb-3">
        <div class="container py-4 mt-5 shadow rounded">
            <h1 class="text-center">Ajouter un rapport</h1>
            <form method="POST" action="{{ route('gestion.rapports.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputDate" class="form-label">Date de passage</label>
                    <input type="date" class="form-control  @error('date') is-invalid @enderror" id="date"
                        name="date" required>
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDetail" class="form-label">Detail de l'etat de l'animal </label>
                    <input type="text" class="form-control  @error('detail') is-invalid @enderror" id="detail"
                        name="detail">
                    @error('detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
                    <label for="inputNourriture" class="form-label">Type de nourriture </label>
                    <input type="text" class="form-control  @error('nourriture') is-invalid @enderror" id="nourriture"
                        name="nourriture" required>
                    @error('nourriture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputquantite" class="form-label">Quantitée de nourriture en gramme</label>
                    <input type="number" class="form-control  @error('quantite') is-invalid @enderror" id="quantite"
                        name="quantite" required>
                    @error('quantite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" name="animal_id" id="animalSelect" aria-label="Default select example">
                        <option selected>Selectionner un animal</option>
                        @forelse ($animals as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->prenom }}
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
