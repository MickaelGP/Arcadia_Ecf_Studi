<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Gestion\Avi\AviController;
use App\Http\Controllers\Gestion\Animal\AnimalController;
use App\Http\Controllers\Gestion\GestionController;
use App\Http\Controllers\Gestion\Horaire\HoraireController;
use App\Http\Controllers\Gestion\Compte\CreateUserController;
use App\Http\Controllers\Gestion\Alimentation\AlimentationController;
use App\Http\Controllers\Gestion\Habitat\GestionHabitatController;
use App\Http\Controllers\Gestion\Service\GestionServicesController;
use App\Http\Controllers\Gestion\Rapport\ConsultationRapportController;
use App\Http\Controllers\Gestion\Race\RaceController;

//use App\Http\Middleware\GetUserInformation;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/nos-services',[HomeController::class,'showServices'])->name('service');
Route::get('/nos-habitats',[HomeController::class,'showHabitats'])->name('habitat');
Route::get('/contact',[HomeController::class,'showContact'])->name('contact');
Route::post('/contact',[EmailController::class,'send'])->name('send');
Route::post('/avis',[AviController::class,'store'])->name('store');
Route::get('/connexion',[UserController::class,'connexion'])->name('connexion');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
//Route gestion
Route::get('/gestion', [GestionController::class, 'index'])->name('gestion')->middleware('auth');

//Gestion admin
Route::middleware('role:administrateur')->group(function () {
    //Route creation de compte
    Route::controller(CreateUserController::class)->prefix('/gestion')->group(function (){
        Route::get('/creation-de-compte', 'index')->name('create.comptes');
        Route::post('/ajout-utilisateur', 'store')->name('store.comptes');
    });
    //Route gestion services
    Route::controller(GestionServicesController::class)->prefix('/gestion')->group(function(){
        Route::get('/gestion-services/create', 'create')->name('gestion.services.create');
        Route::post('/gestion-services/store', 'store')->name('gestion.services.store');
        Route::delete('/gestion/gestion-services/{service}', 'destroy')->name('gestion.services.destroy');
    });
    //Route gestion Horaire
    Route::controller(HoraireController::class)->prefix('/gestion')->group(function(){
        Route::get('/gestion-horaires', 'index')->name('gestion.horaires');
        Route::get('/gestion-horaires/create',  'create')->name('gestion.horaires.create');
        Route::get('/gestion-horaires/{horaire}/edit', 'edit')->name('gestion.horaires.edit');
        Route::post('/gestion-horaires/store', 'store')->name('gestion.horaires.store');
        Route::patch('/gestion-horaires/{horaire}/update-horaire', 'update')->name('gestion.horaires.update');
    });
   
    // Route gestion Habitat
    Route::controller(GestionHabitatController::class)->prefix('/gestion')->group(function(){
        Route::get('/gestion-habitats/create', 'create')->name('gestion.habitats.create');
        Route::post('/gestion-habitats/store', 'store')->name('gestion.habitats.store');
        Route::delete('/gestion-habitats/{habitat}', 'destroy')->name('gestion.habitats.destroy');
    });      
   
    //Route Gestion Animaux
    Route::controller(AnimalController::class)->prefix('/gestion')->group(function(){
        Route::get('/gestion-animaux', 'index')->name('gestion.animals');
        Route::get('/gestion-animaux/create', 'create')->name('gestion.animals.create');
        Route::get('/gestion-animaux/{animal}/edit', 'edit')->name('gestion.animals.edit');
        Route::post('/gestion-animaux/store', 'store')->name('gestion.animals.store');
        Route::patch('/gestion-animaux/{animal}/update-animal', 'update')->name('gestion.animals.update');
        Route::delete('/gestion-animaux/{animal}', 'destroy')->name('gestion.animals.destroy');
    });
    Route::controller(RaceController::class)->prefix('/gestion')->group(function (){
        Route::get('/gestion-animaux-races/create', 'create')->name('gestion.races');
        Route::post('/gestion-animaux-race/store', 'store')->name('gestion.races.store');
    });

});

//Gestion employe
Route::middleware('role:employé')->group(function () {
    Route::get('/gestion/gestion-avis/{avi}/edit', [AviController::class, 'edit'])->name('gestion.avis.edit');
    Route::patch('/gestion/gestion-avis/{avi}/update-avi', [AviController::class, 'update'])->name('gestion.avis.update');
    Route::get('/gestion/gestion-alimentations', [AlimentationController::class, 'index'])->name('gestion.alimentations');
    Route::post('/gestion/gestion-alimentations/store', [AlimentationController::class, 'store'])->name('gestion.alimentations.store');
});

//Gestion veterinaire
Route::middleware('role:vétérinaire')->group(function () {
    Route::controller(ConsultationRapportController::class)->prefix('/gestion')->group(function(){
        Route::get('/rapports/create', 'create')->name('gestion.rapports.create');
        Route::post('/rpports/store', 'store')->name('gestion.rapports.store');
    });
});

//admin et employé
Route::middleware('role:administrateur,employé')->group(function(){
    Route::controller(GestionServicesController::class)->prefix('/gestion')->group(function(){
        Route::get('/gestion-services', 'index')->name('gestion.services');
        Route::get('/gestion-services/{service}/edit', 'edit')->name('gestion.services.edit');
        Route::patch('/gestion-services/{service}/update-service', 'update')->name('gestion.services.update');
    });
});

//admin et veterinaire
Route::middleware('role:administrateur,vétérinaire')->group(function () {
    Route::get('/gestion/gestion-habitats', [GestionHabitatController::class, 'index'])->name('gestion.habitats');
    Route::get('/gestion/gestion-habitats/{habitat}/edit', [GestionHabitatController::class, 'edit'])->name('gestion.habitats.edit');
    Route::patch('/gestion/gestion-habitats/{habitat}/update-habitat', [GestionHabitatController::class, 'update'])->name('gestion.habitats.update');
    Route::get('/gestion/rapports', [ConsultationRapportController::class, 'index'])->name('gestion.rapports');
    Route::get('gestion/rapports/search', [ConsultationRapportController::class, 'search'])->name('gestion.rapports.search');
    Route::get('/gestion/rapports/{id}/show', [ConsultationRapportController::class, 'show'])->name('gestion.rapports.show');
});







