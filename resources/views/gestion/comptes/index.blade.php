@extends('layouts.gestion')

@section('content')
    <div class="mb-5">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container pt-2">
            <div class="card shadow">
                <h1 class="text-center pt-5">Création de compte utilisateurs</h1>

                <div class="card-body">

                    <form method="POST" action="{{ route('store.comptes') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">Email de l'utilisateur</label>

                            <div class="col-md-6">
                                <input id="username" type="email"
                                    class="form-control @error('username') is-invalid @enderror" name="username" required>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">Nom de l'utilisateur</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                    name="nom" required>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">Prénom de
                                l'utilisateur</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text"
                                    class="form-control @error('prenom') is-invalid @enderror" name="prenom" required>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">Confirmation du
                                mot de passe</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" required>

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="container w-50 text-center mb-3">
                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id"
                                id="categorySelect" aria-label="Default select example" required>
                                <option selected>Sélectionner un rôle</option>
                                @forelse ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->label }}</option>
                                @empty
                                    <h1>No Data</h1>
                                @endforelse
                            </select>
                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-info rounded-5">
                                    Créer l'ustilisateur
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
