<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Libros;
use App\Autor;
use App\Editorial;
use App\Favorito;
use App\Bookmarc;
use App\Deseo;
use App\Debe;
use App\History;

class InicioController extends Controller
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
		return view('inicio/listado')->with($datos);
	}

    public function formulario_get($id){
        $libro=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("id_libro", $id)
                ->first();
        $favorito=DB::table('favorito')
                ->select('id_usuario','id_libro','favorito')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $bookmarc=DB::table('bookmarc')
                ->select('id_usuario','id_libro','bookmarc')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $deseo=DB::table('deseo')
                ->select('id_usuario','id_libro','deseo')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $debe=DB::table('debe')
                ->select('id_usuario','id_libro','debe')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        //dd($deseo);
        $datos=array();
        $datos['libro']=$libro;
        $datos['favorito']=$favorito;
        $datos['bookmarc']=$bookmarc;
        $datos['deseo']=$deseo;
        $datos['debe']=$debe;

        $historial=DB::table('historial')
                ->select('id_usuario','id_libro')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        //dd($historial);
        if (is_null($historial)) {
            $historial=new History;
            $historial->id_usuario=Auth::user()->idusuario;
            $historial->id_libro=$id;
            $historial->save();
        }else{
            $historial=DB::table('historial')
                ->select('id_usuario','id_libro')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->delete();

            $historial=new History;
            $historial->id_usuario=Auth::user()->idusuario;
            $historial->id_libro=$id;
            $historial->save();
        }
        

        return view('inicio/formulario')->with($datos);
    }

    public function favorito(Request $r){
        $info=$r->all();
        $id=$info['id_libro'];
        switch ($info['operacion']) {
            case 'Agregar':
                $favorito=new Favorito;
                $favorito->id_usuario=Auth::user()->idusuario;
                $favorito->id_libro=$info['id_libro'];
                $favorito->favorito=1;
                $favorito->save();

                $libro=libros::find($info['id_libro']);
                $contador=$libro->contador;
                $libro->contador=$contador+1;
                $libro->save();

            break;

            case 'Eliminar':
                $favorito = DB::table('favorito')
                    ->where('id_usuario', Auth::user()->idusuario)
                    ->Where('id_libro', $info['id_libro'])
                    ->delete();

                $libro=libros::find($info['id_libro']);
                $contador=$libro->contador;
                $libro->contador=$contador-1;
                $libro->save();

            break;
        }
             $libro=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("id_libro", $id)
                ->first();
        $favorito=DB::table('favorito')
                ->select('id_usuario','id_libro','favorito')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $bookmarc=DB::table('bookmarc')
                ->select('id_usuario','id_libro','bookmarc')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $deseo=DB::table('deseo')
                ->select('id_usuario','id_libro','deseo')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $debe=DB::table('debe')
                ->select('id_usuario','id_libro','debe')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        //dd($bookmarc);
        $datos=array();
        $datos['libro']=$libro;
        $datos['favorito']=$favorito;
        $datos['bookmarc']=$bookmarc;
        $datos['deseo']=$deseo;
        $datos['debe']=$debe;
        return view('inicio/formulario')->with($datos);
    }

    public function bookmarc(Request $r){
        $info=$r->all();
        $id=$info['id_libro'];
        switch ($info['operacion']) {
            case 'Agregar':
                $bookmarc=new Bookmarc;
                $bookmarc->id_usuario=Auth::user()->idusuario;
                $bookmarc->id_libro=$info['id_libro'];
                $bookmarc->bookmarc=1;
                $bookmarc->save();
            break;

            case 'Eliminar':
                $bookmarc = DB::table('bookmarc')
                    ->where('id_usuario', Auth::user()->idusuario)
                    ->Where('id_libro', $info['id_libro'])
                    ->delete();
            break;
        }
        $libro=DB::table('libro')
            ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
            ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
            ->join('autor','autor.id_autor','=','libro.id_autor')
            ->join('genero','genero.id_genero','=','libro.id_genero')
            ->where("id_libro", $id)
            ->first();
        $favorito=DB::table('favorito')
                ->select('id_usuario','id_libro','favorito')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $bookmarc=DB::table('bookmarc')
                ->select('id_usuario','id_libro','bookmarc')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $deseo=DB::table('deseo')
                ->select('id_usuario','id_libro','deseo')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $debe=DB::table('debe')
                ->select('id_usuario','id_libro','debe')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        //dd($bookmarc);
        $datos=array();
        $datos['libro']=$libro;
        $datos['favorito']=$favorito;
        $datos['bookmarc']=$bookmarc;
        $datos['deseo']=$deseo;
        $datos['debe']=$debe;
        return view('inicio/formulario')->with($datos);
    }

    public function deseo(Request $r){
        $info=$r->all();
        $id=$info['id_libro'];
        switch ($info['operacion']) {
            case 'Agregar':
                $deseo=new Deseo;
                $deseo->id_usuario=Auth::user()->idusuario;
                $deseo->id_libro=$info['id_libro'];
                $deseo->deseo=1;
                $deseo->save();
            break;

            case 'Eliminar':
                $deseo = DB::table('deseo')
                    ->where('id_usuario', Auth::user()->idusuario)
                    ->Where('id_libro', $info['id_libro'])
                    ->delete();
            break;
        }
        $libro=DB::table('libro')
            ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
            ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
            ->join('autor','autor.id_autor','=','libro.id_autor')
            ->join('genero','genero.id_genero','=','libro.id_genero')
            ->where("id_libro", $id)
            ->first();
        $favorito=DB::table('favorito')
                ->select('id_usuario','id_libro','favorito')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $bookmarc=DB::table('bookmarc')
                ->select('id_usuario','id_libro','bookmarc')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $deseo=DB::table('deseo')
                ->select('id_usuario','id_libro','deseo')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $debe=DB::table('debe')
                ->select('id_usuario','id_libro','debe')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        //dd($bookmarc);
        $datos=array();
        $datos['libro']=$libro;
        $datos['favorito']=$favorito;
        $datos['bookmarc']=$bookmarc;
        $datos['deseo']=$deseo;
        $datos['debe']=$debe;
        return view('inicio/formulario')->with($datos);
    }

    public function debe(Request $r){
        $info=$r->all();
        $id=$info['id_libro'];
        switch ($info['operacion']) {
            case 'Agregar':
                $debe=new Debe;
                $debe->id_usuario=Auth::user()->idusuario;
                $debe->id_libro=$info['id_libro'];
                $debe->debe=1;
                $debe->save();
            break;

            case 'Eliminar':
                $debe = DB::table('debe')
                    ->where('id_usuario', Auth::user()->idusuario)
                    ->Where('id_libro', $info['id_libro'])
                    ->delete();
            break;
        }
        $libro=DB::table('libro')
            ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
            ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
            ->join('autor','autor.id_autor','=','libro.id_autor')
            ->join('genero','genero.id_genero','=','libro.id_genero')
            ->where("id_libro", $id)
            ->first();
        $favorito=DB::table('favorito')
                ->select('id_usuario','id_libro','favorito')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $bookmarc=DB::table('bookmarc')
                ->select('id_usuario','id_libro','bookmarc')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $deseo=DB::table('deseo')
                ->select('id_usuario','id_libro','deseo')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        $debe=DB::table('debe')
                ->select('id_usuario','id_libro','debe')
                ->where("id_usuario", Auth::user()->idusuario)
                ->where("id_libro", $id)
                ->first();
        //dd($bookmarc);
        $datos=array();
        $datos['libro']=$libro;
        $datos['favorito']=$favorito;
        $datos['bookmarc']=$bookmarc;
        $datos['deseo']=$deseo;
        $datos['debe']=$debe;
        return view('inicio/formulario')->with($datos);
    }

    public function freebooks(){
        $libros=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("precio", '0')
                ->get();
        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function novelsbooks(){
        $libros=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("genero", 'Novela Clásica')
                ->get();
        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function fictionsbooks(){
        $libros=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("genero", 'No Ficción')
                ->get();
        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
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
        return view("inicio.listado")->with($datos);
    }

    public function favoritos(){
        $libros=DB::table('favorito')
                ->select('libro.id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','libro.review','libro.calificacion','libro.foto')
                ->join('libro','libro.id_libro','=','favorito.id_libro')
                ->join('usuario','usuario.idusuario','=','favorito.id_usuario')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("favorito.id_usuario", Auth::user()->idusuario)
                ->get();

        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function deseos(){
        $libros=DB::table('deseo')
                ->select('libro.id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','libro.review','libro.calificacion','libro.foto')
                ->join('libro','libro.id_libro','=','deseo.id_libro')
                ->join('usuario','usuario.idusuario','=','deseo.id_usuario')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("deseo.id_usuario", Auth::user()->idusuario)
                ->get();

        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function bookmarcs(){
        $libros=DB::table('bookmarc')
                ->select('libro.id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','libro.review','libro.calificacion','libro.foto')
                ->join('libro','libro.id_libro','=','bookmarc.id_libro')
                ->join('usuario','usuario.idusuario','=','bookmarc.id_usuario')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("bookmarc.id_usuario", Auth::user()->idusuario)
                ->get();

        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function deberia_leer(){
        $libros=DB::table('debe')
                ->select('libro.id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','libro.review','libro.calificacion','libro.foto')
                ->join('libro','libro.id_libro','=','debe.id_libro')
                ->join('usuario','usuario.idusuario','=','debe.id_usuario')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("debe.id_usuario", Auth::user()->idusuario)
                ->get();

        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function mejor(){
        $libros=DB::table('favorito')
                ->select('libro.id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','libro.review','libro.calificacion','libro.foto')
                ->join('libro','libro.id_libro','=','favorito.id_libro')
                ->join('usuario','usuario.idusuario','=','favorito.id_usuario')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("favorito.id_usuario", Auth::user()->idusuario)
                ->where("libro.calificacion", '5')
                ->get();

        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function historial(){
        $libros=DB::table('historial')
                ->select('libro.id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','libro.review','libro.calificacion','libro.foto')
                ->join('libro','libro.id_libro','=','historial.id_libro')
                ->join('usuario','usuario.idusuario','=','historial.id_usuario')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("historial.id_usuario", Auth::user()->idusuario)
                ->orderBy('historial.created_at', 'DESC')
                ->limit(5)
                ->get();

        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function comprar(){
        $libros=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->where("precio","<>", '0')
                ->get();
        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function populares(){
        $libros=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto','contador')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->orderBy('contador', 'DESC')
                ->limit(5)
                ->get();
        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function recientes(){
        $libros=DB::table('libro')
                ->select('id_libro','nom_libro','precio','editorial.nom_editorial','autor.nombre','autor.apellidos','genero.genero','review','calificacion','foto','contador')
                ->join('editorial','editorial.id_editorial','=','libro.id_editorial')
                ->join('autor','autor.id_autor','=','libro.id_autor')
                ->join('genero','genero.id_genero','=','libro.id_genero')
                ->orderBy('created_at', 'DESC')
                ->limit(5)
                ->get();
        $datos=array();
        $datos['libros']=$libros;
        return view('inicio/listado')->with($datos);
    }

    public function help(){
        return view('inicio/help');
    }

    public function support(){
        return view('inicio/support');
    }

    public function out_help(){
        return view('inicio/out_help');
    }

    public function out_support(){
        return view('inicio/out_support');
    }


}
