@extends('layouts.gestion')

@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Modifier un Horaire</h1>
        <form method="POST" action="{{ route('gestion.horaires.update', $horaire) }}">
            @csrf
            @method('PATCH')

            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'class' => 'mb-3',
                'type' => 'time',
                'label' => 'Horaire d\'ouverture du matin',
                'name' => 'ouverture_matin',
                'id' => 'ouverture_matin',
                'value' => $horaire->ouverture_matin
            ])
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'isRequired' => false,
                'class' => 'mb-3',
                'type' => 'time',
                'label' => 'Horaire de fermeture du matin',
                'name' => 'fermeture_matin',
                'id' => 'fermeture_matin',
                'value' => $horaire->fermeture_matin
            ])
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'isRequired' => false,
                'class' => 'mb-3',
                'type' => 'time',
                'label' => 'Horaire d\'ouverture du soir',
                'name' => 'ouverture_soir',
                'id' => 'ouverture_soir',
                'value' => $horaire->ouverture_soir
            ])
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'class' => 'mb-3',
                'type' => 'time',
                'label' => 'Horaire de fermetur du soir',
                'name' => 'fermeture_soir',
                'id' => 'fermeture_soir',
                'value' => $horaire->fermeture_soir
            ])
            <div class="text-center">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </div>
        </form>
    </div>
@endsection
