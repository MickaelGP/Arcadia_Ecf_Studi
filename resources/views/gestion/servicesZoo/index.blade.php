@extends('layouts.gestion')

@section('content')
    <div class="container text-center mt-3">
        <h1>Gestion des Services du zoo</h1>
    </div>
    @include('shared.flash')
    <div class="container  mt-3 text-center shadow py-4 rounded">
        @if ($user->role->label === 'administrateur')
            <div class="row mb-3">
                <div class="col-12">
                    <a class="btn btn-success rounded-5" href="{{ route('gestion.services.create') }}">Ajouter un service</a>
                </div>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->nom }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            @if ($user->role->label === 'administrateur')
                                <form action="{{ route('gestion.services.destroy', $service->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning mb-2 rounded-5"
                                        href="{{ route('gestion.services.edit', $service->id) }}">Modifier</a>
                                    <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                                </form>
                            @else
                                <a class="btn btn-warning rounded-5"
                                    href="{{ route('gestion.services.edit', $service->id) }}">Modifier</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
