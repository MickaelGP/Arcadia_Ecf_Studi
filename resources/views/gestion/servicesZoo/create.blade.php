@extends('layouts.gestion')


@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Ajouter un service</h1>
        <form method="POST" action="{{ route('gestion.services.store') }}">
            @csrf
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'class' => 'mb-3',
                'name' => 'nom',
                'id' => 'nom',
            ])
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'type' => 'textarea',
                'class' => 'mb-3',
                'name' => 'description',
                'id' => 'description',
            ])
            <div class="text-center">
                <x-button type=" btn-primary shadow rounded-5">Ajouter</x-button>
            </div>
        </form>
    </div>
@endsection
