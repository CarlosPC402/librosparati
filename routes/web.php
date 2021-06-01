<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Route::group(['middleware'=>['auth','candado2']],
	function(){
		//Exclusivo ADMIN
		Route::get('/libros/listado', 'LibrosController@home')->name('listado_libros');
		Route::get('/libros/formulario', 'LibrosController@formulario');
		Route::get('/libros/formulario/{id}','LibrosController@formulario_get');
		Route::post('/libros/save','LibrosController@guardar');
		Route::post('/libros/ajax','LibrosController@ajax');
		Route::post('/buscador','LibrosController@buscar');
		Route::get('/buscador','LibrosController@buscar');
		//

		Route::get('/inicio/listado', 'InicioController@home')->name('allbooks');

		Route::get('/inicio/gratis', 'InicioController@freebooks')->name('freebooks');
		Route::get('/inicio/novels', 'InicioController@novelsbooks')->name('novelsbooks');
		Route::get('/inicio/fictions', 'InicioController@fictionsbooks')->name('fictionsbooks');
		Route::get('/inicio/ver_mas/{id}', 'InicioController@formulario_get');
		//Excluisvo ADMIN
		Route::post('/inicio/ver_mas/save', 'InicioController@favorito');
		Route::post('/inicio/ver_mas/bookmarc', 'InicioController@bookmarc');
		Route::post('/inicio/ver_mas/deseo', 'InicioController@deseo');
		Route::post('/inicio/ver_mas/debe', 'InicioController@debe');
		Route::post('/inicio/ajax','InicioController@ajax');
		Route::post('/inicio/buscador','InicioController@buscar');
		Route::get('/inicio/buscador','InicioController@buscar');
		//

		Route::get('/inicio/favoritos','InicioController@favoritos')->name('favoritos');
		Route::get('/inicio/deseos','InicioController@deseos')->name('deseos');
		Route::get('/inicio/bookmarc','InicioController@bookmarcs')->name('bookmarc');
		Route::get('/inicio/deberia_leer','InicioController@deberia_leer')->name('deberia_leer');
		Route::get('/inicio/lo_mejor','InicioController@mejor')->name('mejor');
		Route::get('/inicio/comprar','InicioController@comprar')->name('comprar');
		Route::get('/inicio/populares','InicioController@populares')->name('populares');
		Route::get('/inicio/recientes','InicioController@recientes')->name('recientes');

		Route::get('/inicio/historial','InicioController@historial')->name('historial');

		Route::get('/usuario/perfil', 'UsuarioController@perfil')->name('perfil');

		//Exclusivo ADMIN
		Route::get('/usuario/listado', 'UsuarioController@home')->name('listado_usuarios');
		Route::post('/usuario/formulario', 'UsuarioController@formulario');
		Route::get('/usuario/formulario/{id}','UsuarioController@formulario_get');
		//

		Route::get('/usuario/formulario_perfil/{id}','UsuarioController@form_perfil');
		Route::post('/usuario/perfil/save','UsuarioController@save_perfil');

		//Exclusivo ADMIN
		Route::post('/usuario/save','UsuarioController@guardar');
		Route::post('/usuario/ajax','UsuarioController@ajax');
		Route::post('/usuario/buscador','UsuarioController@buscar');
		Route::get('/usuario/buscador','UsuarioController@buscar');
		//

		Route::get('/inicio/help','InicioController@help')->name('help');
		Route::get('/inicio/support','InicioController@support')->name('support');
		Route::get('/sinpermiso','PermisoController@sinpermiso');		
		Route::get('/comprobacion','PermisoController@comprobacion');

		Route::get('/autores/listado', 'AutorController@home')->name('listado_autores');
		Route::post('/autores/formulario', 'AutorController@formulario');
		Route::get('/autores/formulario/{id}','AutorController@formulario_get');
		Route::post('/autores/save','AutorController@guardar');

		Route::get('/generos/listado', 'GeneroController@home')->name('listado_generos');
		Route::post('/generos/formulario', 'GeneroController@formulario');
		Route::get('/generos/formulario/{id}','GeneroController@formulario_get');
		Route::post('/generos/save','GeneroController@guardar');

		Route::get('/editoriales/listado', 'EditorialController@home')->name('listado_editoriales');
		Route::post('/editoriales/formulario', 'EditorialController@formulario');
		Route::get('/editoriales/formulario/{id}','EditorialController@formulario_get');
		Route::post('/editoriales/save','EditorialController@guardar');

	});

//sin proteger
Route::get('/registrarse', 'UsuarioController@registrarse')->name('registrarse');
Route::post('/registrarse/save', 'UsuarioController@out_register');
Route::get('/inicio/out_help','InicioController@out_help')->name('out_help');
Route::get('/inicio/out_support','InicioController@out_support')->name('out_support');




