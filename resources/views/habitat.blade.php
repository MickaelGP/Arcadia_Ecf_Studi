@extends('layouts.app')

@section('content')
    <div class="text-center"  id="frontHabitats">
        <h1>Nos Habitats</h1>
        <div class="text-center"  id="divJungle">
            <div class="pt-5">
                <h3>La jungle</h3>
            </div>
            <div class="container w-50 ">
                <div id="carouselJungle" class="carousel  slide pt-3">
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/200/140"class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="https://picsum.photos/200/140" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="https://picsum.photos/200/140" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselJungle"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselJungle"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="pt-5">
                <button class="btn shadow">En savoir plus</button>
            </div>
        </div>
        <div class="text-center"  id="divSavane">
            <div class="pt-5">
                <h3>La savane</h3>
            </div>
            <div class="container w-50">
                <div id="carouselSavane" class="carousel slide pt-3">
                    <div class="carousel-inner">
                        <div class="carousel-item active rounded">
                            <img src="https://picsum.photos/200/140"class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="https://picsum.photos/200/140" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="https://picsum.photos/200/140" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselSavane"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselSavane"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="pt-5">
                <button class="btn shadow">En savoir plus</button>
            </div>
        </div>
        <div class="text-center"  id="divMarais">
            <div class="pt-5">
                <h3>Le marais</h3>
            </div>
            <div class="container w-50">
                <div id="carouselMarais" class="carousel slide pt-3">
                    <div class="carousel-inner">
                        <div class="carousel-item active rounded">
                            <img src="https://picsum.photos/200/140"class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="https://picsum.photos/200/140" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="https://picsum.photos/200/140" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMarais"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselMarais"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="pt-5">
                <button class="btn">En savoir plus</button>
            </div>
        </div>
    </div>
@endsection
