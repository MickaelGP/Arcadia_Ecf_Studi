@extends('layouts.app')
@section('title', 'Contact')

@section('content')
    <section id="sectionContactTitre">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center pt-5">
                    <h1>Nous contacter</h1>
                </div>
                <div class="col-md-6 d-none d-sm-block pt-2">
                    <div class="container w-50 pb-2" id="imgContact">
                        <img src="/img/hero.jpg" class="shadow img-fluid">
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
        <div class="text-center pt-5">
            <h1>Envoyez nous un message</h1>

        </div>
        <div class="container w-50 pt-5">
            <form action="{{ route('send') }}" method="POST">
                @csrf
                @include('shared.input', [
                    'class' => 'mb-3',
                    'name' => 'titre',
                    'id' => 'inputTitre',
                    'feedBack' => true,
                ])
                @include('shared.input', [
                    'class' => 'mb-3',
                    'name' => 'pseudo',
                    'id' => 'inputPseudo',
                    'feedBack' => true,
                ])
                @include('shared.input', [
                    'type' => 'email',
                    'class' => 'mb-3',
                    'name' => 'email',
                    'id' => 'inputMail',
                    'feedBack' => true,
                ])
                @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'name' => 'description',
                    'feedBack' => true,
                ])
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" name="consent" value="1" id="consent">
                    <label class="form-check-label" for="consent">
                        J'accepte que mes données personnelles soient traitées conformément à la <a href="{{route('mentions-legales')}}">politique de confidentialité</a>.
                    </label>
                </div>
                <div class="text-center pb-3">
                    <x-button type=" shadow rounded-5">Envoyer</x-button>
                </div>
            </form>
        </div>
        @include('shared.flash')
    </section>
@endsection
