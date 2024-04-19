@extends('layouts.gestion')


@section('content')
    <div class="container w-50 py-4 mt-5 shadow rounded">
        <h1 class="text-center">Ajouter un horaire</h1>
        
        <div class="container w-50">
            <form method="POST" action="{{ route('gestion.horaires.store') }}">
                @csrf
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'class' => 'mb-3',
                    'label' => 'Horaire d\'ouverture du matin',
                    'type' => 'time',
                    'id' => 'ouverture_matin',
                    'name' => 'ouverture_matin',
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'class' => 'mb-3',
                    'label' => 'Horaire de fermeture du matin',
                    'type' => 'time',
                    'id' => 'fermeture_matin',
                    'name' => 'fermeture_matin',
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'class' => 'mb-3',
                    'label' => 'Horaire d\'ouverture du soir',
                    'type' => 'time',
                    'id' => 'ouverture_soir',
                    'name' => 'ouverture_soir',
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'class' => 'mb-3',
                    'label' => 'Horaire de fermetur du soir',
                    'type' => 'time',
                    'id' => 'fermeture_soir',
                    'name' => 'fermeture_soir',
                ])
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
