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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'ListarProdutoController@index')->name('home');
Route::post('/produtos/salvar', 'StoreProdutoController@salvar')->name('produto.salvar');
Route::get('/produtos/editar/{id}', 'EditarProdutoController@editar')->name('produto.editar');
Route::get('/produtos/excluir/{id}', 'ExcluirProdutoController@excluir')->name('produto.excluir');
