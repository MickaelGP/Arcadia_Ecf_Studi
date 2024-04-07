@extends('layouts.gestion')

@section('content')
    <div class="container text-center">
        <h1>{{ $rapport->animal->prenom }}</h1>
        <p>Rapport du {{ $rapport->date }} :</p>
        @if ($rapport->detail)
            <p>
                Détail :<br>
                {{ $rapport->detail }}
            </p>
        @endif
        <p>
            {{ $rapport->animal->prenom }} à mangé {{ $rapport->quantite }}G de {{ $rapport->nourriture }}.
        </p>
        <p>
            L'état de {{ $rapport->animal->prenom }} est {{ $rapport->etat }} .
        </p>
    </div>
@endsection
