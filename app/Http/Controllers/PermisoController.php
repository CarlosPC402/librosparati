<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Rol;
use App\Permiso;

class PermisoController extends Controller
{
    public function sinpermiso(){
		return view('permiso/sinpermiso');
	}

	public function comprobacion(){

			$usuario = DB::table('usuario')
    	                       ->select(
    	                       	        "usuario.idrol"
    	                       	       ,"rol.nomrol"
    	                               )
    	                        ->join("rol", "rol.idrol","=","usuario.idrol")
    							->where("idusuario", Auth::user()->idusuario)
    							->groupby("usuario.idrol")
    							->groupby("rol.nomrol")
    							->first();
		if($usuario->nomrol=='Administrador'){
			return redirect()->action('LibrosController@home');
		}
		else if($usuario->nomrol=='Usuario'){
			return redirect()->action('InicioController@home');
			
		}
		

	}

}
