@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="container" id="titreHero">
            <h1>Arcadia</h1>
        </div>
        <p id="textHero">Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960.</p>
    </div>
    <section id="homeSectionServices">
        <div class="text-center pb-5">
            <div class="pt-3">
                <h1>Nos services</h1>
            </div>
            <div class="container pt-3 reveal">
                <div class="row">
                    <div class="col-4 ">
                        <div class="card service shadow reveal-2">
                            <div class="card-body">
                                <i class="fa-solid fa-utensils icons"></i>
                                <p>Snack, restaurant</p>
                                <a class="btn shadow" href="{{ route('service') }}">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card service shadow reveal-3">
                            <div class="card-body">
                                <i class="fa-solid fa-train icons"></i>
                                <p>Visite en petit train</p>
                                <a class="btn shadow" href="{{ route('service') }}">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card service shadow reveal-4">
                            <div class="card-body">
                                <i class="fa-solid fa-signs-post icons"></i>
                                <p>Visite des habitats</p>
                                <a class="btn shadow" href="{{ route('service') }}">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sectionHomeHabitats">
        <div class="text-center pb-5">
            <div class="pt-3">
                <h1>Nos Habitats</h1>
            </div>
            <div class="container pt-2 reveal">
                <div class="row">
                    <div class="col-md-4 col-sm-6 pt-2">
                        <div class="card habitat shadow reveal-2">
                            <img src="https://picsum.photos/200/140" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Savane</h5>
                                <p>Écosystème captivant, animaux majestueux, paysage authentique,</br> expérience immersive.
                                </p>
                                <a class="btn shadow" href="{{ route('habitat') }}">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 pt-2">
                        <div class="card habitat shadow reveal-3">
                            <img src="https://picsum.photos/200/140" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Jungle</h5>
                                <p>Mystères luxuriants, créatures exotiques, aventures épiques, exploration fascinante,
                                    ambiance
                                    envoûtante.</p>
                                <a class="btn shadow" href="{{ route('habitat') }}">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 pt-2">
                        <div class="card habitat shadow reveal-4">
                            <img src="https://picsum.photos/200/140" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Marais</h5>
                                <p>Écosystème unique, faune fascinante, mystères aquatiques, biodiversité préservée,
                                    expériences
                                    captivantes.</p>
                                <a class="btn shadow" href="{{ route('habitat') }}">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sectionHomeAvis">
        <div class="avis text-center pb-5">
            <div class="pt-3">
                <h1>Les avis</h1>
            </div>
            <div class="conatiner pt-2 ">
                <div class="row reveal">
                    <div class="col-sm-12 col-md-6">
                        <div class="card avi shadow reveal-2">
                            <div class="card-title pt-5">
                                <h1>Laissez nous votre avis</h1>
                            </div>
                            <i class="fa-regular fa-comment icons"></i>
                            <div class="card-body">
                                <form action="{{ route('store') }}" id="formAvis" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control shadow" id="inputPseudo" name="pseudo"
                                            placeholder="pseudo" required>
                                            <span class="invalid-feedback">
                                                <strong>Le pseudo doit avoir au moins 4 caractères </strong>
                                            </span>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control shadow" name="commentaire" id="commentaireArea" placeholder="Description" required></textarea>
                                    </div>
                                    <button type="submit" class="btn shadow" id="btnValidation">Envoyer</button>
                                </form>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success container w-50  text-center mt-3" id="alertSuccess">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h2 class="pt-2">Les avis des visiteurs</h2>
                        <div id="carouselAvis" class="carousel slide pt-3 reveal-3">
                            <div class="carousel-inner">
                                @foreach ($avis as $key => $avi)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} rounded">
                                        <h5>{{ $avi->pseudo }}</h5>
                                        <p>{{ $avi->commentaire }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAvis"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselAvis"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
