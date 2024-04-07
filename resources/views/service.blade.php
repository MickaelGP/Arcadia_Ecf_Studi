@extends('layouts.app')

@section('content')
    <div class="row ">
        <div class="col-6 px-0 d-none d-md-block">
                <img src="/img/hero.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 col-sm-12 pt-5 text-center"  id="divRestauration">
            <h1>{{$services[0]->nom}}</h1>
            <p>
                {{$services[0]->description }}
            </p>
            <i class="fa-solid fa-utensils icons"></i>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 col-sm-12 pt-5 text-center"  id="divVisite">
            <h1>{{$services[1]->nom}}</h1>
            <p>
                {{$services[1]->description}}
            </p>
            <i class="fa-solid fa-train icons"></i>
        </div>
        <div class="col-6 px-0 d-none d-md-block">
                <img src="/img/hero.jpg" class="img-fluid" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-6 px-0 d-none d-md-block">
             <img src="/img/hero.jpg" class="img-fluid " alt="">
        </div>
        <div class="col-md-6 col-sm-12 pt-5 text-center" id="divGuide">
            <h1>{{$services[2]->nom}}</h1>
            <p>
                {{$services[2]->description}}
            </p>
            <i class="fa-solid fa-signs-post icons"></i>  
        </div>
    </div>
@endsection