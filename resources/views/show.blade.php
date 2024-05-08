@extends('layouts.app')
@section('title', $animal->prenom)
@section('content')
<section>
    <div class="container text-center mt-5">
        <h1>{{$animal->prenom}}</h1>
       <p>
        Appartient à la race des {{ $animal->race->label }}
       </p>
    </div>
    <div class="container text-center">
        <p>
           C'est {{$animal->description}}
        </p>
    </div>
    <div class="container text-center">
        <p>
           L'habitat de {{ $animal->prenom }} est {{ $animal->habitat->nom }}.
        </p>
    </div>
</section>
    
@endsection