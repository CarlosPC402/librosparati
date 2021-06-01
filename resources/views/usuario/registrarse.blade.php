@extends('plantilla.app_home')

@section('contenido')
	<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
      Register User
    </h1>
    <hr />

    <div class="col container">
		<form action="{{action ('UsuarioController@out_register')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre del usuario</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="nombre" class="form-control form-control-sm" id="colFormLabelSm" value="" required="">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Apellido Paterno</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="apellido_p" class="form-control form-control-sm" id="colFormLabelSm" value="" required="">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Apellido Materno</label>
		    	<div class="col-sm-10">
		      		<input type="text" name="apellido_m" class="form-control form-control-sm" id="colFormLabelSm" value="" required="">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Correo</label>
		    	<div class="col-sm-10">
		      		<input type="email" name="email" class="form-control form-control-sm" id="colFormLabelSm" value="" required="">
		    	</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Contraseña</label>
		    	<div class="col-sm-10">
		      		<input type="password" name="password" class="form-control form-control-sm" id="colFormLabelSm"  required="">
		    	</div>
			</div><br>
			<input type="submit" name="operacion" class="btn btn-info" value="Registrarme">
		</form>	
	</div>

@endsection