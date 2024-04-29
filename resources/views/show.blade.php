@extends('layouts.app')
@section('title', $animal->prenom)
@section('content')
<section>
    <div class="container text-center">
        <h1>{{$animal->prenom}}</h1>
    </div>
    <div class="container text-center">
        <p>{{$animal->description}}</p>
    </div>
</section>
    
@endsection