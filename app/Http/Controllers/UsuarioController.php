<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//nuevas
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Usuario;
use App\Rol;
//

class UsuarioController extends Controller
{
	public function perfil(){
    	$usuario = Usuario::find(Auth::user()->idusuario);
    	$datos=array();
    	$datos['usuario']=$usuario;
		return view('usuario/perfil')->with($datos);
	}

    public function home(){
    	$usuarios = DB::table('usuario')
    				->select('usuario.idusuario','nombre','apellido_p','apellido_m','nomrol','email','password','foto')
    				->join('rol','rol.idrol','=','usuario.idrol')
    				->get();
    	$datos=array();
    	$datos['usuarios']=$usuarios;
		return view('usuario/listado')->with($datos);
	}

	public function formulario(){
		$usuario=new Usuario();
		$rol=new Rol();
		$roles=Rol::all();
		$datos=array();
		$datos['usuario']=$usuario;
		$datos['roles']=$roles;
		$datos['modo']='agregar';
		return view('usuario/formulario')->with($datos);
	}

	public function formulario_get($id){
		$usuario=Usuario::find($id);
		$roles=Rol::all();
		$datos=array();
		$datos['usuario']=$usuario;
		$datos['roles']=$roles;
		$datos['modo']='editar';
		return view('usuario/formulario')->with($datos);
	}

	public function ajax(Request $r){
		$info=$r->all();		
		// $datos=Usuario::whereRaw("CONCAT(nombres,' ',apellido) like '%".$info['q']."%'")->get();
		$datos=Usuario::all();
		$final=array();
		foreach($datos as $elemento){
			$tmp=new \StdClass();
			$tmp->idusuario=$elemento->idusuario;
			$tmp->nombre=$elemento->nombre.' '.$elemento->apellido_p.' '.$elemento->apellido_m;
			$final[]=$tmp;
		}
		return response()
            ->json($final);
	}

	function buscar(Request $r){
    	if ($r->isMethod('post')) {
    		$context=$r->all();
    		$usuarios = DB::table('usuario')
				->select('usuario.idusuario','nombre','apellido_p','apellido_m','nomrol','email','password','foto')
				->join('rol','rol.idrol','=','usuario.idrol')
    			->whereRaw("nombre like '%".$context['criterio']."%' or apellido_p like '%".$context['criterio']."%' or apellido_m like '%".$context['criterio']."%' or idusuario like '%".$context['criterio']."%'")
    			->get();
    			$criterio=$context['criterio'];
    	}
    	else{
    		$usuarios=array();
    		$criterio='';
    	}
    	$datos=array();
        $datos['usuarios']=$usuarios;
        $datos['criterio']=$criterio;
    	return view("usuario.listado")->with($datos);
    }

	public function guardar(Request $r){
		$info=$r->all();
		switch ($info['operacion']) {
			case 'Agregar':
				$usuario=new Usuario;
				$usuario->nombre=$info['nombre'];
				$usuario->apellido_p=$info['apellido_p'];
				$usuario->apellido_m=$info['apellido_m'];
				$usuario->idrol=$info['idrol'];
				$usuario->email=$info['email'];
				$usuario->password=bcrypt($info['password']);
				if ($r->hasFile('foto')) {
					$usuario->foto=$r->file('foto')->store('uploads','public');
				}else{
					$usuario->foto="";	
				}
				
				//$usuario->remember_token='';
				$usuario->save();
			break;
			
			case 'Modificar':
				$usuario=Usuario::find($info['idusuario']);
				$usuario->nombre=$info['nombre'];
				$usuario->apellido_p=$info['apellido_p'];
				$usuario->apellido_m=$info['apellido_m'];
				$usuario->idrol=$info['idrol'];
				$usuario->email=$info['email'];
				//$usuario->remember_token='';
				echo $usuario->foto;
				if ($r->hasFile('foto')) {
					storage::delete('public/'.$usuario->foto);
					$usuario->foto=$r->file('foto')->store('uploads','public');
				}else{
					$usuario->foto=$usuario->foto;
				}

				if ($info['password']=='') {}
				else{$usuario->password=bcrypt($info['password']);}
				$usuario->save();
			break;

			case 'Eliminar':
				$usuario=Usuario::find($info['idusuario']);
				storage::delete('public/'.$usuario->foto);
				Usuario::where('idusuario',$info['idusuario'])->delete();

			break;
		}
			return redirect()->action('UsuarioController@home');
	}

	public function form_perfil($id){
		$usuario=Usuario::find($id);
		$roles=Rol::all();
		$datos=array();
		$datos['usuario']=$usuario;
		$datos['roles']=$roles;
		return view('usuario/formulario_perfil')->with($datos);
	}

	public function save_perfil(Request $r){
		$info=$r->all();
		$usuario=Usuario::find($info['idusuario']);
		$usuario->nombre=$info['nombre'];
		$usuario->apellido_p=$info['apellido_p'];
		$usuario->apellido_m=$info['apellido_m'];
		//$usuario->idrol=$usuario->idrol;
		$usuario->email=$info['email'];
		//$usuario->remember_token='';
		//echo $usuario->foto;
		if ($r->hasFile('foto')) {
			storage::delete('public/'.$usuario->foto);
			$usuario->foto=$r->file('foto')->store('uploads','public');
		}else{
			$usuario->foto=$usuario->foto;
		}

		if ($info['password']=='') {}
		else{$usuario->password=bcrypt($info['password']);}
		$usuario->save();

		$usuario = Usuario::find(Auth::user()->idusuario);
    	$datos=array();
    	$datos['usuario']=$usuario;
		return view('usuario/perfil')->with($datos);
	}

	public function registrarse(){
		return view('usuario/registrarse');
	}

	public function out_register(Request $r){
		$info=$r->all();

		$insertGetId=DB::table('usuario')
        ->insertGetId([                                        
                       "nombre"=>$info['nombre']
                       ,"apellido_p"=>$info['apellido_p']
                       ,"apellido_m"=>$info['apellido_m']
                       ,"email"=>$info['email']
                       ,"password"=>bcrypt($info['password'])
                       ,"idrol"=>2
                       ,"foto"=>''
                    ]);

        Auth::loginUsingId($insertGetId);
        return redirect()->action('InicioController@home');
	}

}
