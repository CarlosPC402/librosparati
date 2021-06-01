@extends('plantilla.app')
@section('contenido')
	<header>
		<h1 style="color: #444c63; font-size: 33px;" class="mt-4">Perfil User</h1>
	</header>
    <hr />
	<div class="container">
		<div class="row">
	    	<div class="col">
	    		<figure id="foto_usuario">
	    			@if ($usuario->foto == '')
					    <img src="{{asset('estilos/img/user.jpg')}}" style="width: 400px;" class="img-responsive">
					@else
					    <img src="{{asset('storage').'/'.$usuario->foto}}" style="width: 400px;" class="img-responsive">
					@endif
	    		</figure>
	      		
			</div>
	    	<div class="col">
	      		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 150px">Nombre(s):</span>
					</div>
						<input name="nombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$usuario->nombre}}" readonly="">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 150px">Apellido Paterno:</span>
					</div>
						<input name="apellido_p" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$usuario->apellido_p}}" readonly="">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 150px">Apellido Materno:</span>
					</div>
						<input name="apellido_" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$usuario->apellido_m}}" readonly="">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 150px">Correo:</span>
					</div>
						<input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$usuario->email}}" readonly="">
				</div>
				<center>
					<a style="color: black;"  class="btn btn-info" href="{{action('UsuarioController@form_perfil',$usuario->idusuario) }}"><img width="30px" src="{{ asset('estilos/img/editar.png') }}">   Editar Perfil</a>
				</center>
	    	</div>
	  	</div>
	</div>
	
@endsection