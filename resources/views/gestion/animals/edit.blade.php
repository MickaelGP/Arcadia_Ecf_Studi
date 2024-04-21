@extends('layouts.gestion')

@section('content')
    <div class="container pb-3">
        <div class="container py-4 mt-5 shadow rounded">
            <h1 class="text-center">Modifier un animal</h1>
            <form method="POST" action="{{ route('gestion.animals.update', $animal) }}">
                @csrf
                @method('PATCH')

                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Description de l\'annimal',
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'value' => $animal->description,
                    'name' => 'description',
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'label' => 'Prénom',
                    'class' => 'mb-3',
                    'value' => $animal->prenom,
                    'name' => 'prenom',
                ])
                <div class="mb-3">
                    <select class="form-select" name="race_id" id="raceSelect" required aria-label="Default select example">
                        @foreach ($races as $race)
                            <option value="{{ $race->id }}" {{ $race->id == $animal->race_id ? 'selected' : '' }}>
                                {{ $race->label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="habitat_id" id="habitatSelect" required
                        aria-label="Default select example">
                        @foreach ($habitats as $habitat)
                            <option value="{{ $habitat->id }}" {{ $habitat->id == $animal->habitat_id ? 'selected' : '' }}>
                                {{ $habitat->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center pt-2">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
