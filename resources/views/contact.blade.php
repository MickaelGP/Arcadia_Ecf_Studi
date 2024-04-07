@extends('layouts.app')

@section('content')
    <div>
        <div id="pageContact">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h1>Nous contacter</h1>
                    </div>
                    <div class="col-6">
                        <img src="https://picsum.photos/200/140" class="rounded">
                    </div>
                </div>
            </div>
        </div>
        <div id="contactPhrase">
            <p>
                Contactez-nous<br>
                Une question sur Acradia?<br>
                Un renseignement ?<br>
                Envoyez nous votre demande.
            </p>
        </div>
        <div id="formContact">
            <div class="conatiner text-center">
                <h1>Envoyez nous un message</h1>
                <div class="container w-50 pt-5">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control shadow" name="pseudo" id="textInput" required
                                placeholder="Pseudo">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control shadow" name="email" id="eemailInput"
                                placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control shadow" name="description" placeholder="Description" required></textarea>
                        </div>
                        <button type="submit" class="btn shadow">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
