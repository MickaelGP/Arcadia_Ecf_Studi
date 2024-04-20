
@foreach ($options as $service)
@if($service->id % 2 === 1)
<div class="row">
    <div class="col-6 px-0 d-none d-lg-block">
        <img src="/img/hero.jpg" class="img-fluid" alt="{{$service->nom}}">
    </div>
    <div class="col-lg-6 col-md-12 pt-5 text-center">
        <h1>{{ $service->nom }}</h1>
        <p>
            {{ $service->description }}
        </p>
        
        <i class="{{$icons}}"></i>
    </div>
</div>
@else
<div class="row">
    <div class="col-lg-6 col-md-12 pt-5 text-center">
        <h1>{{ $service->nom }}</h1>
        <p>
            {{ $service->description }}
        </p>
        {{$icons}}

        {{-- <i class="fa-solid fa-train icons"></i> --}}
    </div>
    <div class="col-6 px-0 d-none d-lg-block">
        <img src="/img/hero.jpg" class="img-fluid" alt="Visite en petit train">
    </div>
</div>
@endif
@endforeach

   