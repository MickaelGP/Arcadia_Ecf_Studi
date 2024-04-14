@extends('layouts.gestion')

@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Ajouter une race</h1>
        <form method="POST" action="{{ route('gestion.races.store') }}">
            @csrf
            <div class="mb-3">
                <label for="inputType" class="form-label">Type</label>
                <input type="text" class="form-control  @error('label') is-invalid @enderror" id="label" name="label"
                    required placeholder="Oiseaux">
                @error('label')
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
