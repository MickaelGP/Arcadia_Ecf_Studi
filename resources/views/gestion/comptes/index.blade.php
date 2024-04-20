@extends('layouts.gestion')

@section('content')
    <div class="mb-5">
    @include('shared.flash')
        <div class="container pt-2">
            <div class="card shadow">
                <h1 class="text-center pt-5">Création de compte utilisateurs</h1>
                <div class="container w-50">  
                    <form method="POST" action="{{ route('store.comptes') }}">
                        @csrf
                        <div class="row mb-3">
                            @include('shared.input',[
                                'feedBack' => true,
                                'needLabel' => true,
                                'class' => 'col',
                                'label' => 'Nom d\'utilisateur',
                                'placeholder' => 'employe@arcadia.fr',
                                'type' => 'email',
                                'id' => 'username',
                                'name' => 'username',
                            ])
                        </div>
                        <div class="row mb-3">
                            @include('shared.input',[
                                'feedBack' => true,
                                'needLabel' => true,
                                'class' => 'col',
                                'label' => 'Nom',
                                'placeholder' => 'Doe',
                                'id' => 'nom',
                                'name' => 'nom',
                            ])
                        </div>
                        <div class="row mb-3">
                            @include('shared.input',[
                                'feedBack' => true,
                                'needLabel' => true,
                                'class' => 'col',
                                'label' => 'Prénom',
                                'placeholder' => 'Jane',
                                'id' => 'prénom',
                                'name' => 'prenom',
                            ])
                        </div>
                        <div class="row mb-3">
                            @include('shared.input',[
                                'feedBack' => true,
                                'needLabel' => true,
                                'class' => 'col',
                                'label' => 'Mot de passe',
                                'placeholder' => '....',
                                'type' => 'password',
                                'id' => 'password',
                                'name' => 'password',
                            ])
                        </div>
                        <div class="row mb-3">
                            @include('shared.input',[
                                'needLabel' => true,
                                'class' => 'col',
                                'label' => 'Confirmation du mot de passe',
                                'messagePerso' => 'Le mot de passe ne correspond pas.',
                                'placeholder' => '...',
                                'type' => 'password',
                                'id' => 'password_confirmation',
                                'name' => 'password_confirmation',
                            ])
                        </div>
                        @include('shared.select',[
                            'class' => 'mb-3',
                            'id' => 'categorySelect',
                            'name' => 'role_id',
                            'options' => $roles,
                        ])
                        <div class="row mb-5">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-info rounded-5">
                                    Créer l'ustilisateur
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
