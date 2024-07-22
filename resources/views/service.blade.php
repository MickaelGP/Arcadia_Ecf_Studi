@extends('layouts.app')
@section('title', 'Nos-services')
@section('content')
    @foreach ($services as $service)
        @if ($service->id % 2 === 0)
            <section class="sectionServicesPair">
                <div class="row mx-0">
                    <div class="col-lg-6 col-md-12 pt-5 text-center">
                        <h1>{{ $service->nom }}</h1>
                        <p>
                            {{ $service->description }}
                        </p>
                        <i class="fa-solid fa-train icons"></i>
                    </div>
                    <div class="col-6 px-0 d-none d-lg-block">
                        <img src="/img/hero.jpg" class="img-fluid" alt="Visite en petit train">
                    </div>
                </div>
            </section>
        @else
            <section class="sectionServicesImpair">
                <div class="row mx-0">
                    <div class="col-6 px-0 d-none d-lg-block">
                        <img src="/img/hero.jpg" class="img-fluid" alt="Restauration du parc">
                    </div>
                    <div class="col-lg-6 col-md-12 pt-5 text-center">
                        <h1>{{ $service->nom }}</h1>
                        <p>
                            {{ $service->description }}
                        </p>
                        <i class="fa-solid fa-utensils icons"></i>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    {{-- <section id="sectionServicesRestauration">
        <div class="row">
            <div class="col-6 px-0 d-none d-lg-block">
                <img src="/img/hero.jpg" class="img-fluid" alt="Restauration du parc">
            </div>
            <div class="col-lg-6 col-md-12 pt-5 text-center">
                <h1>{{ $services[0]->nom }}</h1>
                <p>
                    {{ $services[0]->description }}
                </p>
                <i class="fa-solid fa-utensils icons"></i>
            </div>
        </div>
    </section>
    <section id="sectionServicesTrain">
        <div class="row">
            <div class="col-lg-6 col-md-12 pt-5 text-center">
                <h1>{{ $services[1]->nom }}</h1>
                <p>
                    {{ $services[1]->description }}
                </p>
                <i class="fa-solid fa-train icons"></i>
            </div>
            <div class="col-6 px-0 d-none d-lg-block">
                <img src="/img/hero.jpg" class="img-fluid" alt="Visite en petit train">
            </div>
        </div>
    </section>
    <section id="sectionServicesHabitats">
        <div class="row">
            <div class="col-6 px-0 d-none d-lg-block">
                <img src="/img/hero.jpg" class="img-fluid " alt="Visite des habitats">
            </div>
            <div class="col-lg-6 col-md-12 pt-5 text-center">
                <h1>{{ $services[2]->nom }}</h1>
                <p>
                    {{ $services[2]->description }}
                </p>
                <i class="fa-solid fa-signs-post icons"></i>
            </div>
        </div>
    </section> --}}
@endsection
