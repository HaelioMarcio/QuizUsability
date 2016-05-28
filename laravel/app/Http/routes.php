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

<<<<<<< HEAD
Route::group(['prefix' => 'projetos'], function(){
	Route::get('create', function(){
		return view('projetos.create');
	});
});
=======
Route::get('/projetos', 'ProjetosController@index');

Route::get('/projetos/{id}', 'ProjetosController@show');

Route::get('/projetos/{id}/questionarios', 'ProjetosController@findQuestionarios');
>>>>>>> b0426a8d39bc3486116b0309185d7ec4cd8a459f
