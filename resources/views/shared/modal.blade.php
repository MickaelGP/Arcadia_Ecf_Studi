<div class="modal fade" id="{{$idModal}}" tabindex="-1" aria-labelledby="{{$idModal}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $titre }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Description :</h3>
                <p>{{ $description }}</p>
                <h3>Les animaux :</h3>
                <ul class="list-group">
                    @foreach ($options as $animal)
                        <li class="list-group-item">{{ $animal->prenom }} : <a href="{{route('show', $animal->id)}}">En savoir plus</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>