@extends('layouts.gestion')

@section('content')
    <div class="">
        <div class="pt-2 text-center">
            <h1>Valider ou invalider un avis </h1>
        </div>
        <div class="conatiner  pt-5 ">
            <div class="container pb-5">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{route('gestion.avis.update', $avi)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <input type="text" class="form-control" id="inputPseudo" name="pseudo" value="{{$avi->pseudo}}"disabled>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="commentaire" placeholder="{{$avi->commentaire}}" disabled></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isValide" value="1" id="isValide">
                                <label class="form-check-label" for="isValide">
                                 Validé
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="isValide" value="0" id="isValide2" checked>
                                <label class="form-check-label" for="isValide2">
                                  Invalidé
                                </label>
                              </div>
                            <div class="text-center">
                                <x-button type=" btn-warning shadow rounded-5">Modifier</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
