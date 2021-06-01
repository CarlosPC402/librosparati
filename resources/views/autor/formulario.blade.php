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
      Formulario Autores
    </h1>
    <hr />
	<div class="col container">
		<form action="{{action ('AutorController@guardar')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="id_autor" value="{{$autor->id_autor}}">
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre del autor</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="nombre" class="form-control form-control-sm" id="colFormLabelSm" value="{{$autor->nombre}}">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Apellido Paterno</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="apellidos" class="form-control form-control-sm" id="colFormLabelSm" value="{{$autor->apellidos}}">
		    	</div>
			</div>
			<input type="submit" name="operacion" class="btn btn-{{$estilo}}" value="{{$operacion}}">
			@if($modo=='editar')
			<input type="submit" name="operacion" class="btn btn-danger" value="Eliminar">
			@endif
			<input type="submit" name="operacion" class="btn btn-primary" value="Cancelar">
		</form>	
	</div>
@endsection