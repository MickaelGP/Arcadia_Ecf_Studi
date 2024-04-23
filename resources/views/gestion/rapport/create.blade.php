@extends('layouts.gestion')


@section('content')
    <div class="container pb-3">
        <div class="container py-4 mt-5 shadow rounded">
            <h1 class="text-center">Ajouter un rapport</h1>
            <form method="POST" action="{{ route('gestion.rapports.store') }}">
                @csrf
                @include('shared.input',[
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Date de passage',
                    'type' => 'date',
                    'class' => 'mb-3',
                    'name' => 'date'
                ])
                @include('shared.input',[
                    'feedBack' => true,
                    'needLabel' => true,
                    'isRequired' => false,
                    'label' => 'Detail de l\'etat de l\'animal',
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'name' => 'detail'
                ])
                @include('shared.input',[
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Etat de l\'annimal',
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'name' => 'etat'
                ])
                @include('shared.input',[
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Type de nourriture',
                    'class' => 'mb-3',
                    'name' => 'nourriture'
                ])
                @include('shared.input',[
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Quantitée de nourriture en gramme',
                    'type' => 'number',
                    'class' => 'mb-3',
                    'name' => 'quantite'
                ])
                <div class="mb-3">
                    <select class="form-select" name="animal_id" id="animalSelect" aria-label="Default select example">
                        <option selected>Selectionner un animal</option>
                        @forelse ($animals as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->prenom }}
                            </option>
                        @empty
                            <h1>No Data</h1>
                        @endforelse
                    </select>
                </div>
                <div class="text-center pt-2">
                    <button type="submit" class="btn btn-primary rounded-5">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
