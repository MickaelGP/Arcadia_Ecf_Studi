@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="container" id="titreHero">
            <h1>Arcadia</h1>
        </div>
        <p id="textHero">Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960.</p>

    </div>
    <div class="text-center services">
        <div class="pt-3"> 
             <h1>Nos services</h1>
        </div>
        <div class="container pt-3">
        <div class="row">
            <div class="col-4 ">
                <div class="card service shadow">
                    <div class="card-body">
                        <i class="fa-solid fa-utensils icons"></i>
                        <p>Snack, restaurant etc</p>
                        <a class="btn shadow" href="{{route('service')}}">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card service shadow">
                    <div class="card-body">
                        <i class="fa-solid fa-train icons"></i>
                        <p>Visite du zoo en petit train</p>
                        <a class="btn shadow" href="{{route('service')}}">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card service shadow">
                    <div class="card-body">
                        <i class="fa-solid fa-signs-post icons"></i>
                        <p>Visite des habitats avec un guide</p>
                        <a class="btn shadow" href="{{route('service')}}">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="text-center habitats">
        <div class="pt-5">
            <h1>Nos Habitats</h1>
        </div>
        <div class="container pt-3">
            <div class="row">
                <div class="col-4">
                    <div class="card habitat shadow">
                        <img src="https://picsum.photos/200/140" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Savane</h5>
                            <p>Écosystème captivant, animaux majestueux, paysage authentique,</br> expérience immersive.</p>
                            <a class="btn shadow" href="{{route('habitat')}}">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card habitat shadow">
                        <img src="https://picsum.photos/200/140" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Jungle</h5>
                            <p>Mystères luxuriants, créatures exotiques, aventures épiques, exploration fascinante, ambiance
                                envoûtante.</p>
                                <a class="btn shadow" href="{{route('habitat')}}">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card habitat shadow">
                        <img src="https://picsum.photos/200/140" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Marais</h5>
                            <p>Écosystème unique, faune fascinante, mystères aquatiques, biodiversité préservée, expériences
                                captivantes.</p>
                                <a class="btn shadow" href="{{route('habitat')}}">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="avis text-center">
        <div class="pt-2"><h1>Les avis</h1></div>
        <div class="conatiner pt-5 ">
            <div class="row">
                <div class="col-6">
                    <div class="container">
                        <div class="card avi shadow">
                            <div class="card-title pt-5">
                                <h1>Laissez nous votre avis</h1>
                            </div>
                                <i class="fa-regular fa-comment" ></i>

                            <div class="card-body">
                                <form action="{{route('store')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                      <input type="text" class="form-control shadow" id="inputPseudo" name="pseudo" placeholder="pseudo" required>
                                    </div>
                                    <div class="mb-3">
                                      <textarea class="form-control shadow" name="commentaire" placeholder="Description" required></textarea>
                                    </div>
                                    <button type="submit" class="btn shadow">Envoyer</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="container pt-5 ">
                        <h4>Avis de Test User</h4>
                        <p>Super Zoo </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
@endsection
