<?php
	
	function tipo_usuario(){
		$usuario = DB::table('usuario')
               ->select(
                        "rol.nomrol"
                       )
                ->join("rol", "rol.idrol","=","usuario.idrol")
                ->where("rol.idrol", Auth::user()->idrol)
                ->get();
        return $usuario;

	}
?>