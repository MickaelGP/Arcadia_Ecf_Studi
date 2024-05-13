@extends('layouts.gestion')

@section('content')
    <div class="container pb-3">
        <div class="container py-4 mt-5 shadow rounded">
            <h1 class="text-center">Ajouter un animal</h1>
            <form method="POST" action="{{ route('gestion.animals.store') }}">
                @csrf
                
                @include('shared.input',[
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Description de l\'annimal',
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'name' => 'description'
                ])
                @include('shared.input',[
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Prénom',
                    'class' => 'mb-3',
                    'name' => 'prenom'
                ])
                @include('shared.select',[
                    'class' => 'mb-3',
                    'name' => 'race_id',
                    'options' => $races,
                    'message' => 'Sélectionner une race'
                ])
                <div class="mb-3">
                    <select class="form-select" name="habitat_id" id="habitatSelect" aria-label="Default select example">
                        <option selected>Selectionner un habitat</option>
                        @forelse ($habitats as $habitat)
                            <option value="{{ $habitat->id }}">{{ $habitat->nom }}
                            </option>
                        @empty
                            <h1>No Data</h1>
                        @endforelse
                    </select>
                </div>
                <div class="text-center pt-2">
                    <x-button type=" btn-primary shadow rounded-5">Ajouter</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
