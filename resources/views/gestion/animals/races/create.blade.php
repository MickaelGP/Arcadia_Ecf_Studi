@extends('layouts.gestion')

@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Ajouter une race</h1>
        <form method="POST" action="{{ route('gestion.races.store') }}">
            @csrf
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'label' => 'Type',
                'class' => 'mb-3',
                'name' => 'label',
                'placeholder' => 'Porcine'
            ])
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
