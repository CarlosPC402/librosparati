<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Permiso;
use App\Rolxpermiso;
use App\Rol;


use Closure;

class candado2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $idrol = Auth::user()->idrol;
        $action=$request->route()->getAction();
        $accion=$action["controller"];
        $accion=str_replace("App\\Http\\Controllers\\", "", $accion);
        $permiso=Permiso::where('accion',$accion)->first();
        $rolxpermiso=Rolxpermiso::where('idrol',$idrol)->where('idpermiso',$permiso->idpermiso)->first();
        $rolxpermiso2=Rolxpermiso::where('idrol',$idrol)->where('idpermiso',$permiso->idpermiso)->first();
        if ($rolxpermiso) {
            return $next($request);
        } else {
            return redirect()->action('PermisoController@sinpermiso');
        }
     }
        
        
        
}
