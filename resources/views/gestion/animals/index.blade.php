@extends('layouts.gestion')

@section('content')
    @include('shared.flash')
    <div class="container  mt-3 text-center shadow py-4 rounded">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('gestion.animals.create') }}" class="btn btn-success rounded-5">Ajouter un animal</a>
                <a href="{{ route('gestion.races') }}" class="btn btn-success rounded-5">Ajouter une race</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Prenom</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animals as $animal)
                    <tr>
                        <td>{{ $animal->prenom }}</td>
                        <td>
                            <form action="{{ route('gestion.animals.destroy', $animal->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning rounded-5"
                                    href="{{ route('gestion.animals.edit', $animal->id) }}">Modifier</a>
                                    <x-button type=" btn-danger shadow rounded-5">Supprimer</x-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
