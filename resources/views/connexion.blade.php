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
                            id="inputUsername" name="username" placeholder="Email utilisateur" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control shadow @error('password') is-invalid @enderror"
                            id="inputPassword" name="password" placeholder="Mot de passe" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="pt-5">
                        <button type="submit" class="btn  shadow ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
