@extends('layouts.gestion')

@section('content')
    <div class="container py-4 mt-5 shadow rounded">
        <h1 class="text-center">Modifier un habitat</h1>
        <form method="POST" action="{{ route('gestion.habitats.update', $habitat) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @if ($user->role->label === 'administrateur')
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'class' => 'mb-3',
                    'name' => 'nom',
                    'value' => $habitat->nom,
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'name' => 'description',
                    'value' => $habitat->description,
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'isRequired' => false,
                    'class' => 'mb-3',
                    'name' => 'commentaire',
                    'value' => $habitat->commentaire,
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'type' => 'file',
                    'class' => 'mb-3',
                    'label' => 'Image de l\'habitat',
                    'name' => 'image_data',
                ])
            @else
            @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'isRequired' => false,
                    'isDisabled' => true,
                    'class' => 'mb-3',
                    'name' => 'nom',
                    'value' => $habitat->nom,
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'isRequired' => false,
                    'isDisabled' => true,
                    'type' => 'textarea',
                    'class' => 'mb-3',
                    'name' => 'description',
                    'value' => $habitat->description,
                ])
                @include('shared.input', [
                    'feedBack' => true,
                    'needLabel' => true,
                    'isRequired' => false,
                    'class' => 'mb-3',
                    'name' => 'commentaire',
                    'value' => $habitat->commentaire,
                ])
            @endif
            <div class="text-center">
                <button type="submit" class="btn btn-warning rounded-5">Modifier</button>
            </div>
        </form>
    </div>
@endsection
