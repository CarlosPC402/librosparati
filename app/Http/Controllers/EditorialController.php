<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Editorial;

class EditorialController extends Controller
{
    public function home(){
    	$editoriales = DB::table('editorial')->get();
    	$datos=array();
    	$datos['editoriales']=$editoriales;
		return view('editorial/listado')->with($datos);
	}

	public function formulario(){
		$editorial=new Editorial();
		$datos=array();
		$datos['editorial']=$editorial;
		$datos['modo']='agregar';
		return view('editorial/formulario')->with($datos);
	}

	public function formulario_get($id){
		$editorial=Editorial::find($id);
		$datos=array();
		$datos['editorial']=$editorial;
		$datos['modo']='editar';
		return view('editorial/formulario')->with($datos);
	}

	public function guardar(Request $r){
		$info=$r->all();
		switch ($info['operacion']) {
			case 'Agregar':
				$editorial=new Editorial;
				$editorial->nom_editorial=$info['nom_editorial'];
				
				//$editorial->remember_token='';
				$editorial->save();
			break;
			
			case 'Modificar':
				$editorial=Editorial::find($info['id_editorial']);
				$editorial->nom_editorial=$info['nom_editorial'];
				$editorial->save();
			break;

			case 'Eliminar':
				Editorial::where('id_editorial',$info['id_editorial'])->delete();

			break;
		}
			return redirect()->action('EditorialController@home');
	}
}
