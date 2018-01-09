<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', 'InitialController@index')->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/*
//Auth::routes();

Route::get('/home', 'HomeController@index');
*/

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::get('profiles/personal-profile', 'ProfileController@personalProfile')->name('profiles.personal-profile');
Route::post('profiles/personal-profile', 'ProfileController@personalProfile');
Route::patch('profiles/update-personal-profile/{id}', 'ProfileController@updatePersonalProfile')->name('profiles.update-personal-profile');

Route::resource('profiles', 'ProfileController');


Route::resource('empresas', 'empresasController');

Route::resource('pais', 'PaisController');

Route::get('comunas/{comuna}/restore', 'ComunaController@restore')->name('comunas.restore');
Route::post('comunas/search', 'ComunaController@search')->name('comunas.search');
Route::get('comunas/deleted', 'ComunaController@deleted')->name('comunas.deleted');
Route::resource('comunas', 'ComunaController');

/*
Route::get('provincias/{provincia}/restore', 'ProvinciaController@restore')->name('provincias.restore');
Route::post('provincias/search', 'ProvinciaController@search')->name('provincias.search');
Route::get('provincias/deleted', 'ProvinciaController@deleted')->name('provincias.deleted');
Route::resource('provincias', 'ProvinciaController');
*/

Route::resource('regiones', 'RegionController');