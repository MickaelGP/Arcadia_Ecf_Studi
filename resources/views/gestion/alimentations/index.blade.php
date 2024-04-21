@extends('layouts.gestion')

@section('content')
    @include('shared.flash')
    <div class="container pb-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Ajouter Alimentation</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('gestion.alimentations.store') }}">
                            @csrf

                            @include('shared.input', [
                                'feedBack' => true,
                                'needLabel' => true,
                                'label' => 'Date alimentation',
                                'type' => 'date',
                                'class' => 'mb-3',
                                'name' => 'date_alimentation',
                            ])
                            @include('shared.input', [
                                'feedBack' => true,
                                'needLabel' => true,
                                'label' => 'Heure alimentation',
                                'type' => 'time',
                                'class' => 'mb-3',
                                'name' => 'heure_alimentation',
                            ])
                            @include('shared.input', [
                                'feedBack' => true,
                                'needLabel' => true,
                                'label' => 'Nourriture donnée',
                                'class' => 'mb-3',
                                'name' => 'nourriture',
                            ])
                            @include('shared.input', [
                                'feedBack' => true,
                                'needLabel' => true,
                                'label' => 'Quantitée en grammes',
                                'type' => 'number',
                                'class' => 'mb-3',
                                'name' => 'quantite',
                            ])
                            <div class="mb-3">
                                <select class="form-select" name="animal_id" id="animalSelect"
                                    aria-label="Default select example">
                                    <option selected>Selectionner un animal</option>
                                    @forelse ($animals as $animal)
                                        <option value="{{ $animal->id }}">{{ $animal->prenom }}
                                        </option>
                                    @empty
                                        <h1>Aucune données</h1>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ajouter Alimentation
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
