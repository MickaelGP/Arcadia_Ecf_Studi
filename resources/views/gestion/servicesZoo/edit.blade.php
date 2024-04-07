@extends('layouts.gestion')

@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Modifier un service</h1>
        <form method="POST" action="{{ route('gestion.services.update', $service) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputNom" class="form-label">Nom</label>
                <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="nom" name="nom"
                    value="{{ $service->nom }}" required>
                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description"
                    name="description" value="{{ $service->description }}" required>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </div>
        </form>
    </div>
@endsection
