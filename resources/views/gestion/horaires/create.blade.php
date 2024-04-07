@extends('layouts.gestion')


@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Ajouter un horaire</h1>
        <form method="POST" action="{{ route('gestion.horaires.store') }}">
            @csrf
            <div class="mb-3">
                <label for="inputOuvertureMatin" class="form-label">Horaire d'ouverture du matin</label>
                <input type="text" class="form-control  @error('ouverture_matin') is-invalid @enderror" id="ouverture_matin"
                    name="ouverture_matin" required>
                @error('ouverture_matin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputFermetureMatin" class="form-label">Horaire de fermeture du matin</label>
                <input type="text" class="form-control  @error('fermeture_matin') is-invalid @enderror"
                    id="fermeture_matin" name="fermeture_matin">
                @error('fermeture_matin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputOuvertureSoir" class="form-label">Horaire d'ouverture du soir</label>
                <input type="text" class="form-control  @error('ouverture_soir') is-invalid @enderror"
                    id="ouverture_soir" name="ouverture_soir">
                @error('ouverture_soir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputFermetureSoir" class="form-label">Horaire de fermetur du soir</label>
                <input type="text" class="form-control  @error('fermeture_soir') is-invalid @enderror"
                    id="fermeture_soir" name="fermeture_soir" required>
                @error('fermeture_soir')
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
