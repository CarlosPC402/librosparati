<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Genero;
class GeneroController extends Controller
{
    public function home(){
    	$generos = DB::table('genero')->get();
    	$datos=array();
    	$datos['generos']=$generos;
		return view('genero/listado')->with($datos);
	}

	public function formulario(){
		$genero=new Genero();
		$datos=array();
		$datos['genero']=$genero;
		$datos['modo']='agregar';
		return view('genero/formulario')->with($datos);
	}

	public function formulario_get($id){
		$genero=Genero::find($id);
		$datos=array();
		$datos['genero']=$genero;
		$datos['modo']='editar';
		return view('genero/formulario')->with($datos);
	}

	public function guardar(Request $r){
		$info=$r->all();
		switch ($info['operacion']) {
			case 'Agregar':
				$genero=new Genero;
				$genero->genero=$info['genero'];
				
				//$genero->remember_token='';
				$genero->save();
			break;
			
			case 'Modificar':
				$genero=Genero::find($info['id_genero']);
				$genero->genero=$info['genero'];
				$genero->save();
			break;

			case 'Eliminar':
				Genero::where('id_genero',$info['id_genero'])->delete();

			break;
		}
			return redirect()->action('GeneroController@home');
	}
}
