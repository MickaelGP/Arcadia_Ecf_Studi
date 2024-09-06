@extends('layouts.gestion')

@section('content')
    <div class="mb-5">
    @include('shared.flash')
        <div class="container pt-2">
            <div class="card shadow">
                <h1 class="text-center pt-5">Réinitialiser un mot de passe</h1>
                <div class="container w-50">  
                    <form method="POST" action="{{ route('update.comptes') }}">
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
                        <div class="row mb-5">
                            <div class="col-12 text-center">
                                <x-button type=" btn-primary shadow rounded-5 btn-sm">Réinitialiser</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

