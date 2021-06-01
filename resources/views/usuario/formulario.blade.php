@extends('plantilla.app')
@section('contenido')
<?php
if ($modo=='editar') {
  $operacion='Modificar'; 
  $estilo='warning';
}
else{
  $operacion='Agregar'; 
  $estilo='info';
}
?>
	<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
      Form Users
    </h1>
    <hr />
    <!-- <div>
      <div class="row">
        <div class="col">
          <a href="{{route ('allbooks')}}" class="badge badge-primary">All Books</a>
          <a href="{{route ('recientes')}}" class="badge badge-primary">Most Recent</a>
          <a href="{{route ('populares')}}" class="badge badge-primary">Most Popular</a>
          <a href="{{route ('freebooks')}}" class="badge badge-primary">Free Books</a>
        </div>
      </div>
    </div>
    <hr> -->
	<div class="col container">
		<form action="{{action ('UsuarioController@guardar')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="idusuario" value="{{$usuario->idusuario}}">
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre del usuario</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="nombre" class="form-control form-control-sm" id="colFormLabelSm" value="{{$usuario->nombre}}">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Apellido Paterno</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="apellido_p" class="form-control form-control-sm" id="colFormLabelSm" value="{{$usuario->apellido_p}}">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Apellido Materno</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="apellido_m" class="form-control form-control-sm" id="colFormLabelSm" value="{{$usuario->apellido_m}}">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Correo</label>
		    	<div class="col-sm-10">
		      		<input type="email" name="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$usuario->email}}">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Contraseña</label>
		    	<div class="col-sm-10">
		      		<input type="password" name="password" class="form-control form-control-sm" id="colFormLabelSm" >
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Rol</label>
		    	<div class="col-sm-10">
		      		<select name="idrol" class="form-control form-control-sm" id="colFormLabelSm">
					 	<option value="0">Selecciona un rol</option>
						@foreach($roles as $rol)
						  <?php
							  $select='';
							  if ($rol->idrol==$usuario->idrol) {
							    $select=' selected ';
							  }
						  ?>
						<option {{$select}} value="{{$rol->idrol}}">{{$rol->nomrol}}</option>
						@endforeach
					</select>
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Foto</label>
				<div class="col-sm-10">
		      		<input accept="image/*" type="file" name="foto" id="foto" value="">
		    	</div>
			</div><br>
			<input type="submit" name="operacion" class="btn btn-{{$estilo}}" value="{{$operacion}}">
			@if($modo=='editar')
			<input type="submit" name="operacion" class="btn btn-danger" value="Eliminar">
			@endif
			<input type="submit" name="operacion" class="btn btn-primary" value="Cancelar">
		</form>	
	</div>
@endsection