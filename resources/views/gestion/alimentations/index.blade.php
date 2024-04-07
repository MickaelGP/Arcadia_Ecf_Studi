@extends('layouts.gestion')

@section('content')
    <div class="container pb-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Ajouter Alimentation</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('gestion.alimentations.store') }}">
                            @csrf

                            <div class="form-group row mb-3 ">
                                <label for="date_alimentation" class="col-md-4 col-form-label text-md-right">Date
                                    Alimentation</label>

                                <div class="col-md-6">
                                    <input id="date_alimentation" type="date" class="form-control"
                                        name="date_alimentation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="heure_alimentation" class="col-md-4 col-form-label text-md-right">Heure
                                    Alimentation</label>

                                <div class="col-md-6">
                                    <input id="heure_alimentation" type="time" class="form-control"
                                        name="heure_alimentation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="nourriture" class="col-md-4 col-form-label text-md-right">Nourriture
                                    Donnée</label>

                                <div class="col-md-6">
                                    <input id="nourriture" type="text" class="form-control" name="nourriture" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="quantite" class="col-md-4 col-form-label text-md-right">Quantité en
                                    grammes</label>

                                <div class="col-md-6">
                                    <input id="quantite" type="number" step="0.01" class="form-control" name="quantite"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="animal_id" class="col-md-4 col-form-label text-md-right">Animal</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="animal_id" id="animalSelect"
                                    aria-label="Default select example">
                                    <option selected>Selectionner un animal</option>
                                    @forelse ($animals as $animal)
                                        <option value="{{ $animal->id }}">{{ $animal->prenom }}
                                        </option>
                                    @empty
                                        <h1>No Data</h1>
                                    @endforelse 
                                </select>
                                </div>
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
