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
      Formulario Editoriales
    </h1>
    <hr />
	<div class="col container">
		<form action="{{action ('EditorialController@guardar')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="id_editorial" value="{{$editorial->id_editorial}}">
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Género</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="nom_editorial" class="form-control form-control-sm" id="colFormLabelSm" value="{{$editorial->nom_editorial}}">
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