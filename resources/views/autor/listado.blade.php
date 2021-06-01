@extends('plantilla.app')
@section('contenido')
	<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
      Autores
    </h1>
    <hr />
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="{{action('AutorController@formulario')}}" method="POST" style="display: inline-block;">
              		{{ csrf_field() }}
  		  			<input type="submit" value="Agregar Autor" class="btn btn-info"><br><br>
  				</form>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
		      		<th scope="col">#</th>
		      		<th scope="col">Nombre</th>
		      		<th scope="col">Apellidos</th>
              <th scope="col">Editar</th>
		    	</tr>
			</thead>
			<tbody>
		    	@foreach($autores as $autor)
					<tr>
						<td style="vertical-align: middle;">{{ $autor->id_autor }}</td>
						<td style="vertical-align: middle;">{{ $autor->nombre }}</td>
						<td style="vertical-align: middle;">{{ $autor->apellidos }}</td>
						<td style="vertical-align:middle; text-align: center;"><div><a href="{{action('AutorController@formulario_get',$autor->id_autor) }}"><img width="30px" src="{{ asset('estilos/img/editar.png') }}"></a></div></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection