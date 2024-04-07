@extends('layouts.gestion')

@section('content')
    <div class="container  mt-3 text-center shadow py-4 rounded">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{route('gestion.animals.create')}}" class="btn btn-success">Ajouter un animal</a>
                <a href="{{route('gestion.races')}}" class="btn btn-success">Ajouter une race</a>
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
                        <td>{{$animal->prenom}}</td>
                        <td>
                            <form action="{{route('gestion.animals.destroy',$animal->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning rounded-5" href="{{route('gestion.animals.edit', $animal->id)}}">Modifier</a>
                                <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                 @endforeach 
            </tbody>
        </table>
    </div>
@endsection