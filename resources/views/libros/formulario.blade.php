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
	<br><br>
	<div class="col container">
		<form action="{{action ('LibrosController@guardar')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="id_libro" value="{{$libro->id_libro}}">
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre del libro</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="nom_libro" class="form-control form-control-sm" id="colFormLabelSm" value="{{$libro->nom_libro}}">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Editorial</label>
		    	<div class="col-sm-10">
		      		<select name="id_editorial" class="form-control form-control-sm" id="colFormLabelSm">
					 	<option value="0">Selecciona una editorial</option>
						@foreach($editoriales as $editorial)
						  <?php
						  $select='';
						  if ($editorial->id_editorial==$libro->id_editorial) {
						    $select=' selected ';
						  }
						  ?>
						<option {{$select}} value="{{$editorial->id_editorial}}">{{$editorial->nom_editorial}}</option>
						@endforeach
					</select>
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Género</label>
		    	<div class="col-sm-10">
		      		<select name="id_genero" class="form-control form-control-sm" id="colFormLabelSm">
					 	<option value="0">Selecciona un género</option>
						@foreach($generos as $genero)
						  <?php
						  $select='';
						  if ($genero->id_genero==$libro->id_genero) {
						    $select=' selected ';
						  }
						  ?>
						<option {{$select}} value="{{$genero->id_genero}}">{{$genero->genero}}</option>
						@endforeach
					</select>
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Autor</label>
		    	<div class="col-sm-10">
		      		<select name="id_autor" class="form-control form-control-sm" id="colFormLabelSm">
					 	<option value="0">Selecciona un autor</option>
						@foreach($autores as $autor)
						  <?php
						  $select='';
						  if ($autor->id_autor==$libro->id_autor) {
						    $select=' selected ';
						  }
						  ?>
						<option {{$select}} value="{{$autor->id_autor}}">{{$autor->nombre}} {{$autor->apellidos}}</option>
						@endforeach
					</select>
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Calificación</label>
		    	<div class="col-sm-10">
		      		<select name="calificacion" class="form-control form-control-sm" id="colFormLabelSm">
					 	<option value="0">Selecciona una calificación</option>
						  <?php
							  $select='';
							  $select2='';
							  $select3='';
							  $select4='';
							  $select5='';
							  if ($libro->calificacion==1) {
							    $select=' selected ';
							  }elseif ($libro->calificacion==2) {
							  	$select2=' selected ';
							  }elseif ($libro->calificacion==3) {
							  	$select3=' selected ';
							  }elseif ($libro->calificacion==4) {
							  	$select4=' selected ';
							  }elseif ($libro->calificacion==5) {
							  	$select5=' selected ';
							  }
						  ?>
						<option {{$select}} value="1">1</option>
						<option {{$select2}} value="2">2</option>
						<option {{$select3}} value="3">3</option>
						<option {{$select4}} value="4">4</option>
						<option {{$select5}} value="5">5</option>
					</select>
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Reseña</label>
				<div class="col-sm-10">
		      		<textarea id="review" name="review" class="form-control " id="exampleFormControlTextarea2" rows="4" placeholder="Máximo 255 caracteres">{{$libro->review}}</textarea>
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Precio</label>
		    	<div class="col-sm-10">
		      		<div class="input-group mb-3">
						<div class="input-group-prepend">
					    	<span class="input-group-text">$</span>
						</div>
						<input type="text" name="precio" class="form-control" value="{{$libro->precio}}" aria-label="Amount (to the nearest dollar)">
						<div class="input-group-append">
					    	<span class="input-group-text">.00</span>
						</div>
					</div>
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