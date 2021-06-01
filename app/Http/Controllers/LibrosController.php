<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Libros;
use App\Autor;
use App\Editorial;
use App\Genero;

class LibrosController extends Controller
{
    public function home(){
    	$libros=DB::table('libro')
    			->select(
    				'id_libro',
    				'nom_libro',
    				'precio',
    				'editorial.nom_editorial',
                    'autor.nombre',
                    'autor.apellidos',
                    'genero.genero',
    				'review',
    				'calificacion',
    				'foto'
    			)
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
    			->get();
    	$datos=array();
    	$datos['libros']=$libros;
		return view('libros/listado')->with($datos);
	}

	public function formulario(){
		$autor= new Autor();
		$editorial= new Editorial();
		$libro=new libros();
		$genero=new Genero();
		$autores=Autor::all();
		$editoriales=Editorial::all();
		$generos=Genero::all();
		$datos=array();
		$datos['libro']=$libro;
		$datos['modo']='Agregar';
		$datos['autores']=$autores;
		$datos['editoriales']=$editoriales;
		$datos['generos']=$generos;
		//dd($datos);
		return view('libros/formulario')->with($datos);
	}

	public function formulario_get($id){
		$libro=libros::find($id);
		$autores=Autor::all();
		$editoriales=Editorial::all();
		$generos=Genero::all();
		$datos=array();
		$datos['libro']=$libro;
		$datos['modo']='editar';
		$datos['autores']=$autores;
		$datos['editoriales']=$editoriales;
		$datos['generos']=$generos;
		return view('libros/formulario')->with($datos);
	}

	public function ajax(Request $r){
		$info=$r->all();		
		// $datos=Usuario::whereRaw("CONCAT(nombres,' ',apellido) like '%".$info['q']."%'")->get();
		$datos=libros::all();
		$final=array();
		foreach($datos as $elemento){
			$tmp=new \StdClass();
			$tmp->id_libro=$elemento->id_libro;
			$tmp->nom_libro=$elemento->nom_libro;
			$final[]=$tmp;
		}
		return response()
            ->json($final);
	}

	public function buscar(Request $r){
    	if ($r->isMethod('post')) {
    		$context=$r->all();
    		$libros=DB::table('libro')
    			->select(
    				'id_libro',
    				'nom_libro',
    				'editorial.nom_editorial',
                    'autor.nombre',
                    'autor.apellidos',
                    'genero.genero',
    				'review',
    				'precio',
    				'calificacion',
    				'foto'
    			)
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
    			->whereRaw("nom_libro like '%".$context['criterio']."%'or id_libro like '%".$context['criterio']."%'")
    			->get();
    			$criterio=$context['criterio'];
    	}
    	else{
    		$libros=array();
    		$criterio='';
    	}
    	$datos=array();
        $datos['libros']=$libros;
        $datos['criterio']=$criterio;
    	return view("libros.listado")->with($datos);
    }

	public function guardar(Request $r){
		$info=$r->all();
		switch ($info['operacion']) {
			case 'Agregar':
				$libro=new libros;
				$libro->nom_libro=$info['nom_libro'];
				$libro->id_editorial=$info['id_editorial'];
				$libro->id_autor=$info['id_autor'];
				$libro->review=$info['review'];
				if ($info['precio']=='') {
					$libro->precio='0';
				}else{
					$libro->precio=$info['precio'];
				}
				$libro->id_genero=$info['id_genero'];
				$libro->calificacion=$info['calificacion'];
				if ($r->hasFile('foto')) {
					$libro->foto=$r->file('foto')->store('uploads','public');
				}else{
					$libro->foto="";	
				}
				$libro->save();
			break;
			
			case 'Modificar':
				$libro=libros::find($info['id_libro']);
				$libro->nom_libro=$info['nom_libro'];
				$libro->id_editorial=$info['id_editorial'];
				$libro->id_autor=$info['id_autor'];
				$libro->review=$info['review'];
				$libro->precio=$info['precio'];
				$libro->id_genero=$info['id_genero'];
				$libro->calificacion=$info['calificacion'];
				if ($r->hasFile('foto')) {
					storage::delete('public/'.$libro->foto);
					$libro->foto=$r->file('foto')->store('uploads','public');
				}else{
					$libro->foto=$libro->foto;
				}
				$libro->save();
			break;

			case 'Eliminar':
				$libro=libros::find($info['id_libro']);
				storage::delete('public/'.$libro->foto);
				libros::where('id_libro',$info['id_libro'])->delete();
			break;
		}
			return redirect()->action('LibrosController@home');
	}

}
