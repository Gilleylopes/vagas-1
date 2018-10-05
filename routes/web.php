<?php

use App\Repositories\VagaRepository;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', 'WelcomeController@welcome');

Auth::routes();

// Route::get('/home', 'StatusVagasController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::patch('vagas/{id}', ['as' => 'vagas.updateCandidato', 'uses' => 'VagasController@updateCandidato']);

//Route::get('teste', 'StatusVagaController@index');
Route::resource('statusVaga', StatusVagaController::class);

Route::resource('statusCandidato', StatusCandidatosController::class);

Route::resource('vagas', VagasController::class);

Route::resource('candidatos', CandidatosController::class);


