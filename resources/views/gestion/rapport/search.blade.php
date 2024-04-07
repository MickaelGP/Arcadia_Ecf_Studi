@if ($rapports->count() > 0)
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h2>Résultat de la recherche :</h2>
                </div>
                <div class="card-body">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Animals</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rapports as $rapport)
                                <tr>
                                    <td>{{ $rapport->date }}</td>
                                    <td>{{ $rapport->detail }}</td>
                                    <td>{{ $rapport->animal->prenom }}</td>
                                    <td>
                                        <a href="{{ route('gestion.rapports.show', $rapport->id) }}"
                                            class="btn btn-info">Voir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container w-50 alert alert-danger">
        <p>Aucun résultats</p>
    </div>
@endif
