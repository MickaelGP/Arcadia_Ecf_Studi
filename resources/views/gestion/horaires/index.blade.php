@extends('layouts.gestion')

@section('content')
    <div class="container text-center mt-3">
        <h1>Gestion des horaires du zoo</h1>
    </div>
    @if (session('success'))
        <div class="container w-50 text-center alert alert-success" id="alert">
            <h1>{{ session('success') }}</h1>
        </div>
    @endif
    <div class="container  mt-3 text-center shadow py-4 rounded">

        <div class="row mb-3">
            <div class="col-12">
                <a class="btn btn-success rounded-5" href="{{ route('gestion.horaires.create') }}">Ajouter un horaire</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Ouverture matin</th>
                    <th scope="col">Fermeture matin</th>
                    <th scope="col">Overture soir</th>
                    <th scope="col">Fermeture soir</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horaires as $horaire)
                    <tr>
                        <td>{{ $horaire->ouverture_matin }}</td>
                        <td>{{ $horaire->fermeture_matin }}</td>
                        <td>{{ $horaire->ouverture_soir }}</td>
                        <td>{{ $horaire->fermeture_soir }}</td>
                        <td>
                            <form action="{{ route('gestion.horaires.destroy', $horaire->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                            </form>
                            <a class="btn btn-warning mt-2 rounded-5"
                                href="{{ route('gestion.horaires.edit', $horaire->id) }}">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
