@extends('layouts.app')

@section('content')
    <section class="titre-habitats">
        <div class="text-center pt-3">
            <h1>Nos Habitats</h1>
        </div>
    </section>
    @include('shared.carouselImage',[
        'sectionId' => 'sectionHabitatsJungle',
        'carouselId' => 'carouselJungle',
        'titre' =>'La jungle',
        'idModal' => 'modalJungle',
        'options' => $habitats[0]->images
    ])
    @include('shared.carouselImage',[
        'sectionId' => 'sectionHabitatsSavane',
        'carouselId' => 'carouselSavane',
        'titre' =>'La savane',
        'idModal' => 'modalSavane',
        'options' => $habitats[0]->images
    ])
    @include('shared.carouselImage',[
        'sectionId' => 'sectionHabitatsMarais',
        'carouselId' => 'carouselMarais',
        'titre' =>'Le marais',
        'idModal' => 'modalMarais',
        'options' => $habitats[3]->images
    ])
    {{-- Modal Jungle --}}
    @include('shared.modal',[
        'idModal' => 'modalJungle',
        'titre' => $habitats[2]->nom,
        'description' => $habitats[2]->description,
        'options' => $habitats[2]->animals

    ])
    {{-- Modal Savane --}}
    @include('shared.modal',[
        'idModal' => 'modalSavane',
        'titre' => $habitats[0]->nom,
        'description' => $habitats[0]->description,
        'options' => $habitats[0]->animals

    ])
    {{-- Modal Marais --}}
    @include('shared.modal',[
        'idModal' => 'modalMarais',
        'titre' => $habitats[1]->nom,
        'description' => $habitats[1]->description,
        'options' => $habitats[1]->animals

    ])
@endsection
