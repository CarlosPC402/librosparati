<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Autor;

class AutorController extends Controller
{
    public function home(){
    	$autores = DB::table('autor')->get();
    	$datos=array();
    	$datos['autores']=$autores;
		return view('autor/listado')->with($datos);
	}

	public function formulario(){
		$autor=new Autor();
		$datos=array();
		$datos['autor']=$autor;
		$datos['modo']='agregar';
		return view('autor/formulario')->with($datos);
	}

	public function formulario_get($id){
		$autor=Autor::find($id);
		$datos=array();
		$datos['autor']=$autor;
		$datos['modo']='editar';
		return view('autor/formulario')->with($datos);
	}

	public function guardar(Request $r){
		$info=$r->all();
		switch ($info['operacion']) {
			case 'Agregar':
				$autor=new Autor;
				$autor->nombre=$info['nombre'];
				$autor->apellidos=$info['apellidos'];
				
				//$autor->remember_token='';
				$autor->save();
			break;
			
			case 'Modificar':
				$autor=Autor::find($info['id_autor']);
				$autor->nombre=$info['nombre'];
				$autor->apellidos=$info['apellidos'];
				$autor->save();
			break;

			case 'Eliminar':
				Autor::where('id_autor',$info['id_autor'])->delete();

			break;
		}
			return redirect()->action('AutorController@home');
	}
}
