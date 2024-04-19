@extends('layouts.gestion')

@section('content')
    <div class="container text-center mt-5">
        <h1>Gestion des habitats du zoo</h1>
    </div>
    @include('shared.flash')
    <div class="container pb-3 mt-5 text-center shadow py-4 rounded">
        @if ($user->role->label === 'administrateur')
            <div class="row mb-3">
                <div class="col-12">
                    <a class="btn btn-success rounded-5" href="{{ route('gestion.habitats.create') }}">Ajouter un habitat</a>
                </div>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($habitats as $habitat)
                    <tr>
                        <td>{{ $habitat->nom }}</td>
                        <td>{{ $habitat->description }}</td>
                        <td>{{ $habitat->commentaire }}</td>
                        <td>
                            @if ($user->role->label === 'administrateur')
                                <form action="{{ route('gestion.habitats.destroy', $habitat->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning rounded-5"
                                        href="{{ route('gestion.habitats.edit', $habitat->id) }}">Modifier</a>
                                    <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                                </form>
                            @else
                                <a class="btn btn-warning rounded-5"
                                    href="{{ route('gestion.habitats.edit', $habitat->id) }}">Modifier</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
