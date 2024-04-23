@extends('layouts.gestion')

@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Modifier un service</h1>
        <form method="POST" action="{{ route('gestion.services.update', $service) }}">
            @csrf
            @method('PATCH')

            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'class' => 'mb-3',
                'name' => 'nom',
                'id' => 'nom',
                'value' => $service->nom
            ])
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'type' => 'textarea',
                'class' => 'mb-3',
                'name' => 'description',
                'id' => 'description',
                'value' => $service->description
            ])
            <div class="text-center">
                <button type="submit" class="btn btn-warning rounded-5">Modifier</button>
            </div>
        </form>
    </div>
@endsection
