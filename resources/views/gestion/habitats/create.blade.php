@extends('layouts.gestion')


@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Ajouter un habitat</h1>
        <form method="POST" action="{{ route('gestion.habitats.store') }} " enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputNom" class="form-label">Nom</label>
                <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="nom" name="nom">
                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description"
                    name="description">
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label  @error('image_data') is-invalid @enderror">Image de
                    l'habitat</label>
                <input type="file" class="form-control" id="image" name="image_data">
                @error('image_data')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
