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

Route::get('/', function () {
    return view('agendamentoInfoCliente');
});

/*Route::get('/inicio',function(){
	return view('inicio');
});*/

Route::get('/inicio/{id?}','PruebaController@index');

Route::post('/prelogin','Auth\LoginController@prelogin')->name('prelogin');//AGREGAR
Route::post('/loginAjax','Auth\LoginController@loginAjax')->name('loginAjax');//AGREGAR
Auth::routes();

Route::group(['middleware' => ['btnBackLogin','auth']], function () {
	Route::get('/home', 'HomeController@index')->name('home');	
});

Route::group(['middleware' => ['auth']], function () {
	Route::resource('usuario','UsuarioController');
	Route::post('/usuario/showTable','UsuarioController@showTable')->name('usuario.showTable');
});

Route::group(['middleware' => ['auth']], function () {
	Route::resource('servico','ServicoController');
	Route::post('/servico/showTable','ServicoController@showTable')->name('servico.showTable');
});

Route::group(['middleware' => ['auth']], function () {
	Route::resource('cliente','ClienteController');
	Route::post('/cliente/showTable','ClienteController@showTable')->name('cliente.showTable');
});

