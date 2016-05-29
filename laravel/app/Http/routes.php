<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/heuristicas', 'HeuristicasController@listAll');
Route::get('/heuristicas/{id}', 'HeuristicasController@show');
Route::get('/avaliacao/{token}', 'AvaliacaoController@listAll');
//Route::group(['middleware' => 'auth'], function (){
//    Route::resource('projetos', 'ProjetosController');
//});
Route::resource('projetos', 'ProjetosController');

