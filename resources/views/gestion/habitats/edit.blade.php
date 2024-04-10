@extends('layouts.gestion')

@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Modifier un habitat</h1>
        <form method="POST" action="{{ route('gestion.habitats.update', $habitat) }}">
            @csrf
            @method('PATCH')
            @if ($user->role->label === 'administrateur')
                <div class="mb-3">
                    <label for="inputNom" class="form-label">Nom</label>
                    <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="nom"
                        name="nom" value="{{ $habitat->nom }}" required>
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDescription" class="form-label">Description</label>
                    <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description"
                        name="description" value="{{ $habitat->description }}" required>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputCommentaire" class="form-label">Commentaire</label>
                    <input type="text" class="form-control  @error('commentaire') is-invalid @enderror" id="commentaire"
                        name="commentaire" value="{{ $habitat->commentaire }}">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @else
                <div class="mb-3">
                    <label for="inputNom" class="form-label">Nom</label>
                    <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="nom"
                        name="nom" value="{{ $habitat->nom }}" disabled>
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDescription" class="form-label">Description</label>
                    <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description"
                        name="description" value="{{ $habitat->description }}" disabled>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputCommentaire" class="form-label">Commentaire</label>
                    <input type="text" class="form-control  @error('commentaire') is-invalid @enderror" id="commentaire"
                        name="commentaire" value="{{ $habitat->commentaire }}">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endif
            <div class="text-center">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </div>
        </form>
    </div>
@endsection
