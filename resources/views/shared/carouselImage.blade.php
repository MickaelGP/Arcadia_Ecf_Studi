@php

@endphp
<section id="{{$sectionId}}">
    <div class="text-center">
        <div class="pt-2">
            <h3>{{$titre}}</h3>
        </div>
        <div class="container pt-3 w-50">
            <div id="{{$carouselId}}" class="carousel slide pb-2">
                <div class="carousel-inner rounded">
                    @foreach ($options as $item)
                    <div class="carousel-item active">
                        <img src="/storage/{{$item->image_data}}"class="d-block w-100" alt="Zoo Arcadia">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#{{$carouselId}}"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#{{$carouselId}}"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="pb-3">
            <button class="btn shadow rounded-5" data-bs-toggle="modal" data-bs-target="#{{$idModal}}">En savoir plus</button>
        </div>
    </div>
</section>