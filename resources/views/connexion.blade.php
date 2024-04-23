@extends('layouts.app')

@section('content')
    <section id="sectionConnexionForm">
        <div class="text-center pt-5">
            <h1 class="pt-5">Espace Employés</h1>
        </div>
        <div class="container pt-5">
            <div class="container text-center w-50 pt-5">
                <form action="{{ route('login') }}" method="POST" class="pt-5">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control shadow @error('username') is-invalid @enderror"
                            id="inputEmail" name="username" placeholder="Email utilisateur" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control shadow @error('password') is-invalid @enderror"
                            id="inputPassword" name="password" placeholder="Mot de passe" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                Le mot de passe n'est pas valide : Au moins 8 carractères,
                                comprenant au moins 1 lettre majuscule, 1 minuscule, 1 chiffre,
                                1 carractère special.
                            </strong>
                        </span>
                    </div>
                    <div class="pt-5">
                        <button type="submit" class="btn  shadow rounded-5 ">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
