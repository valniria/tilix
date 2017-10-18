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

Route::get('/', 'UsuarioController@lista');

Route::get('/usuarios/header/{id}', 'UsuarioController@header');

// Route::get('/usuarios/editar', 'UsuarioController@editar');

Route::any('/usuarios/editar/{id}', 'UsuarioController@editar');

// Route::get('/usuarios/enviar', 'UsuarioController@enviarTitulo');

Route::get('/usuarios/enviar/{id}', 'UsuarioController@enviarTitulo');


Route::post('/usuarios/salvarEnvio/', 'UsuarioController@salvarEnvio');

Route::get('/usuarios/excluir/{id}', 'UsuarioController@excluir');