<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/debut', function () {
    return view('home');
});

Route::get('/', 'App\Http\Controllers\VisiteurController@getLogin');

Route::get('/formLogin', 'App\Http\Controllers\VisiteurController@getLogin');

Route::post('/Login', 'App\Http\Controllers\VisiteurController@signIn');

Route::get('/getLogin', 'App\Http\Controllers\VisiteurController@signOut');

Route::get('/getListeFrais', 'App\Http\Controllers\FraisController@getFraisVisiteur');

Route::get('/modifierFrais/{id}', 'App\Http\Controllers\FraisController@updateFrais');

Route::post('validateFrais', 'App\Http\Controllers\FraisController@validateFrais');







Route::get('/rechercher', 'App\Http\Controllers\VisiteurController@index');

Route::get('inviter', 'App\Http\Controllers\PraticienController@listePraticiens');

Route::get('inviter/form/{id}', 'App\Http\Controllers\PraticienController@showInvitationForm');

Route::post('inviter/store', 'App\Http\Controllers\PraticienController@storeInvitation');




// Routes pour la gestion des activités
Route::get('activite', 'App\Http\Controllers\ActiviteController@listeActivites'); // Liste toutes les activités

Route::get('activite/form', 'App\Http\Controllers\ActiviteController@showActiviteForm'); // Affiche le formulaire de création

Route::get('activite/form/{id}', 'App\Http\Controllers\ActiviteController@showActiviteForm'); // Affiche le formulaire de modification

Route::post('activite/store', 'App\Http\Controllers\ActiviteController@storeActivite'); // Enregistre une nouvelle activité

Route::post('activite/update/{id}', 'App\Http\Controllers\ActiviteController@updateActivite'); // Met à jour une activité existante

Route::get('activite/delete/{id}', 'App\Http\Controllers\ActiviteController@deleteActivite'); // Supprime une activité





Route::get('/removeFrais/{id}', 'App\Http\Controllers\FraisController@removeFrais');

Route::get('/getListeFraisHF/{id}', 'App\Http\Controllers\FraisHFController@getFraisHF');

Route::get('/modifierFraisHF/{id}', 'App\Http\Controllers\FraisHFController@updateFraisHF');

Route::post('validateFraisHF', 'App\Http\Controllers\FraisHFController@validateFraisHF');


