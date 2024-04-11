@extends('layouts.app')

@section('content')
<section id="sectionConnexionForm">
    <div class="text-center pt-5">
        <h1>Espace Employés</h1>
    </div>
    <div class="container">
        <div class="container text-center w-50 pt-5">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="email" class="form-control shadow" id="inputUsername" name="username" placeholder="Email utilisateur" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control shadow" id="inputPassword" name="password" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="btn  shadow mb-3">Submit</button>
              </form>
        </div>
    </div>
</section>


@endsection