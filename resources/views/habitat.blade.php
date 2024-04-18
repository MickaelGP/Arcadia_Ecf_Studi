@extends('layouts.app')

@section('content')
    <section class="titre-habitats">
        <div class="text-center pt-3">
            <h1>Nos Habitats</h1>
        </div>
    </section>
    <section id="sectionHabitatsJungle">
        <div class="text-center pt-2">
            <div class="">
                <h3>La jungle</h3>
            </div>
            <div class="container pt-3 w-50">
                <div id="carouselJungle" class="carousel  slide pb-2">
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
            <div class="pb-3">
                <button class="btn shadow" data-bs-toggle="modal" data-bs-target="#modalJungle">En savoir plus</button>
            </div>
        </div>
    </section>
    <section id="sectionHabitatsSavane">
        <div class="text-center">
            <div class="pt-2">
                <h3>La savane</h3>
            </div>
            <div class="container pt-3 w-50">
                <div id="carouselSavane" class="carousel slide pb-2">
                    <div class="carousel-inner rounded">
                        @foreach ($habitats[0]->images as $item)
                        <div class="carousel-item active">
                            <img src="/storage/{{$item->image_data}}"class="d-block w-100" alt="...">
                        </div>
                        @endforeach
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
            <div class="pb-3">
                <button class="btn shadow" data-bs-toggle="modal" data-bs-target="#modalSavane">En savoir plus</button>
            </div>
        </div>
    </section>
    <section id="sectionHabitatsMarais">
        <div class="text-center" id="divMarais">
            <div class="pt-2">
                <h3>Le marais</h3>
            </div>
            
            <div class="container pt-3 w-50">
                <div id="carouselMarais" class="carousel slide pb-2">
                    <div class="carousel-inner rounded">
                        @foreach ($habitats[3]->images as $item)
                        <div class="carousel-item active">
                            <img src="/storage/{{$item->image_data}}"class="d-block w-100" alt="...">
                        </div>
                        @endforeach
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
            <div class="pb-3">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modalMarais">En savoir plus</button>
            </div>
        </div>
    </section>
    {{-- Modal Jungle --}}
    <div class="modal fade" id="modalJungle" tabindex="-1" aria-labelledby="jungleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ $habitats[2]->nom }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Description :</h3>
                    <p>{{ $habitats[2]->description }}</p>
                    <h3>Les animaux :</h3>
                    <ul class="list-group">
                        @foreach ($habitats[2]->animals as $animal)
                            <li class="list-group-item">{{ $animal->prenom }} : <a href="{{route('show', $animal->id)}}">En savoir plus</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Savane --}}
    <div class="modal fade" id="modalSavane" tabindex="-1" aria-labelledby="savaneModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ $habitats[0]->nom }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Description :</h3>
                    <p>{{ $habitats[0]->description }}</p>
                    <h3>Les animaux :</h3>
                    <ul class="list-group">
                        @foreach ($habitats[0]->animals as $animal)
                            <li class="list-group-item">{{ $animal->prenom }} : <a href="{{route('show', $animal->id)}}">En savoir plus</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Marais --}}
    <div class="modal fade" id="modalMarais" tabindex="-1" aria-labelledby="maraisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ $habitats[1]->nom }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Description :</h3>
                    <p>{{ $habitats[1]->description }}</p>
                    <h3>Les animaux :</h3>
                    <ul class="list-group">
                        @foreach ($habitats[1]->animals as $animal)
                            <li class="list-group-item">{{ $animal->prenom }} : <a href="{{route('show', $animal->id)}}">En savoir plus</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
