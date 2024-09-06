@extends('layouts.gestion')

@section('content')
    @include('shared.flash')
    <div class="container  mt-3 text-center shadow py-4 rounded">
        <div class="my-3">
            <h1>Supprimer un compte</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Utilisateurs</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->username }}</td>
                            <td>{{ $profile->role->label }}</td>
                            <td>
                                @if ($profile->id != $user->id)
                                    <form action="{{ route('delete.user.comptes', $profile->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button type=" btn-danger shadow rounded-5">Supprimer</x-button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
