@extends('layouts.app')

@section('content')
    <section id="sectionContactTitre">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center pt-5">
                    <h1>Nous contacter</h1>
                </div>
                <div class="col-md-6 d-none d-sm-block pt-2">
                    <div class="container w-50 pb-2" id="imgContact">
                        <img src="/img/hero.jpg" class="shadow img-fluid" >
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sectionContactPhrase">
        <div class="text-center pt-2">
            <p>
                Contactez-nous<br>
                Une question sur Acradia?<br>
                Un renseignement ?<br>
                Envoyez nous votre demande.
            </p>
        </div>
    </section>
    <section id="sectionContactForm">
        <div class="text-center pt-3">
            <h1>Envoyez nous un message</h1>

        </div>
        <div class="container w-50 pt-3">
            <form action="{{ route('send') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control shadow  @error('titre') is-invalid @enderror" name="titre"
                        id="inputTitre" required placeholder="Titre">
                    @error('titre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control shadow @error('pseudo') is-invalid @enderror" name="pseudo"
                        id="inputPseudo" required placeholder="Pseudo">
                    @error('pseudo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control shadow @error('email') is-invalid @enderror" name="email"
                        id="inputMail" placeholder="Email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <textarea class="form-control shadow @error('description') is-invalid @enderror" name="description"
                        placeholder="Description" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-center pb-3">
                    <button type="submit" class="btn shadow ">Envoyer</button>
                </div>
            </form>
        </div>
        @if (session('success'))
            <div class="alert alert-success container w-50  text-center mt-5" id="alertSuccess">
                {{ session('success') }}
            </div>
        @endif
    </section>
@endsection
