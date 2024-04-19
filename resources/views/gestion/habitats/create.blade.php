@extends('layouts.gestion')


@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Ajouter un habitat</h1>
        <form method="POST" action="{{ route('gestion.habitats.store') }} " enctype="multipart/form-data">
            @csrf
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'class' => 'mb-3',
                'name' => 'nom'
            ])
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'type' => 'textarea',
                'class' => 'mb-3',
                'name' => 'description'
            ])
            @include('shared.input',[
                'feedBack' => true,
                'needLabel' => true,
                'type' => 'file',
                'class' => 'mb-3',
                'label' => 'Image de l\'habitat',
                'name' => 'image_data'
            ])
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
