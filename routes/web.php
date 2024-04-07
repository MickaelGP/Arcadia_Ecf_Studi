<?php

use App\Http\Controllers\Gestion\AnimalController;
use App\Http\Controllers\Gestion\AlimentationController;
use App\Http\Controllers\Gestion\AviController;
use App\Http\Controllers\Gestion\ConsultationRapportController;
use App\Http\Controllers\Gestion\CreateUserController;
use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\CheckUserRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Gestion\GestionController;
use App\Http\Controllers\Gestion\GestionHabitatController;
use App\Http\Controllers\Gestion\GestionServicesController;
use App\Http\Controllers\Gestion\HoraireController;
use App\Http\Controllers\Gestion\RaceController;

//use App\Http\Middleware\GetUserInformation;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/nos-services',[HomeController::class,'showServices'])->name('service');
Route::get('/nos-habitats',[HomeController::class,'showHabitats'])->name('habitat');
Route::get('/contact',[HomeController::class,'showContact'])->name('contact');
Route::post('/avis',[AviController::class,'store'])->name('store');
Route::get('/connexion',[UserController::class,'connexion'])->name('connexion');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
//Route gestion
Route::get('/gestion',[GestionController::class,'index'])->name('gestion');
//Route gestion Compte
Route::get('/gestion/creation-de-compte',[CreateUserController::class,'index'])->name('create.comptes');
Route::post('/gestion/ajout-utilisateur',[CreateUserController::class,'store'])->name('store.comptes');
//Route gestion services
Route::get('/gestion/gestion-services', [GestionServicesController::class,'index'])->name('gestion.services');
Route::get('/gestion/gestion-services/create', [GestionServicesController::class,'create'])->name('gestion.services.create');
Route::get('/gestion/gestion-services/{service}/edit', [GestionServicesController::class,'edit'])->name('gestion.services.edit');
Route::patch('/gestion/gestion-services/{service}/update-service', [GestionServicesController::class,'update'])->name('gestion.services.update');
Route::post('/gestion/gestion-services/store', [GestionServicesController::class,'store'])->name('gestion.services.store');
Route::delete('/gestion/gestion-services/{service}', [GestionServicesController::class,'destroy'])->name('gestion.services.destroy');
//Route gestion Horaire
Route::get('/gestion/gestion-horaires', [HoraireController::class,'index'])->name('gestion.horaires');
Route::get('/gestion/gestion-horaires/create', [HoraireController::class,'create'])->name('gestion.horaires.create');
Route::get('/gestion/gestion-horaires/{horaire}/edit', [HoraireController::class,'edit'])->name('gestion.horaires.edit');
Route::post('/gestion/gestion-horaires/store', [HoraireController::class,'store'])->name('gestion.horaires.store');
Route::patch('/gestion/gestion-horaires/{horaire}/update-horaire', [HoraireController::class,'update'])->name('gestion.horaires.update');
// Route gestion Habitat
Route::get('/gestion/gestion-habitats', [GestionHabitatController::class,'index'])->name('gestion.habitats');
Route::get('/gestion/gestion-habitats/create', [GestionHabitatController::class,'create'])->name('gestion.habitats.create');
Route::get('/gestion/gestion-habitats/{habitat}/edit', [GestionHabitatController::class,'edit'])->name('gestion.habitats.edit');
Route::patch('/gestion/gestion-habitats/{habitat}/update-habitat', [GestionHabitatController::class,'update'])->name('gestion.habitats.update');
Route::post('/gestion/gestion-habitats/store', [GestionHabitatController::class,'store'])->name('gestion.habitats.store');
Route::delete('/gestion/gestion-habitats/{habitat}', [GestionHabitatController::class,'destroy'])->name('gestion.habitats.destroy');
//Route Gestion Animaux
Route::get('/gestion/gestion-animaux',[AnimalController::class,'index'])->name('gestion.animals');
Route::get('/gestion/gestion-animaux/create',[AnimalController::class,'create'])->name('gestion.animals.create');
Route::get('/gestion/gestion-animaux/{animal}/edit', [AnimalController::class,'edit'])->name('gestion.animals.edit');
Route::post('/gestion/gestion-animaux/store', [AnimalController::class,'store'])->name('gestion.animals.store');
Route::patch('/gestion/gestion-animaux/{animal}/update-animal', [AnimalController::class,'update'])->name('gestion.animals.update');
Route::delete('/gestion/gestion-animaux/{animal}', [AnimalController::class,'destroy'])->name('gestion.animals.destroy');
Route::get('/gestion/gestion-animaux-races/create',[RaceController::class,'create'])->name('gestion.races');
Route::post('/gestion/gestion-animaux-race/store', [RaceController::class,'store'])->name('gestion.races.store');

//Route Consultation comptes rendu veterinaire
Route::get('/gestion/rapports',[ConsultationRapportController::class,'index'])->name('gestion.rapports');
Route::get('gestion/rapports/search',[ConsultationRapportController::class,'search'])->name('gestion.rapports.search');
Route::get('/gestion/rapports/create', [ConsultationRapportController::class,'create'])->name('gestion.rapports.create');
Route::post('/gestion/rpports/store', [ConsultationRapportController::class,'store'])->name('gestion.rapports.store');
Route::get('/gestion/rapports/{id}/show', [ConsultationRapportController::class,'show'])->name('gestion.rapports.show');
//Route gestion employe
Route::get('/gestion/gestion-avis/{avi}/edit', [AviController::class,'edit'])->name('gestion.avis.edit');
Route::patch('/gestion/gestion-avis/{avi}/update-avi', [AviController::class,'update'])->name('gestion.avis.update');
Route::get('/gestion/gestion-alimentations', [AlimentationController::class,'index'])->name('gestion.alimentations');
Route::post('/gestion/gestion-alimentations/store', [AlimentationController::class,'store'])->name('gestion.alimentations.store');








