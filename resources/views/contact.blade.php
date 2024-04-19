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
                @include('shared.input',[
                    'class' => 'mb-3',
                    'name' => 'titre',
                    'id' => 'inputTitre',
                    'feedBack' => true
                ])
                @include('shared.input',[
                    'class' => 'mb-3',
                    'name' => 'pseudo',
                    'id' => 'inputPseudo',
                    'feedBack' => true
                ])
                @include('shared.input',[
                    'type' => 'email',
                    'class' => 'mb-3',
                    'name' => 'email',
                    'id' => 'inputMail',
                    'feedBack' => true
                ])
                @include('shared.input',[
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'name' => 'description',
                    'feedBack' => true
                ])
                <div class="text-center pb-3">
                    <button type="submit" class="btn shadow ">Envoyer</button>
                </div>
            </form>
        </div>
        @include('shared.flash')
    </section>
@endsection
