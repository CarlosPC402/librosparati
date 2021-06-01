@extends('plantilla.app')
@section('contenido')
	<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
      Generos
    </h1>
    <hr />
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="{{action('GeneroController@formulario')}}" method="POST" style="display: inline-block;">
              		{{ csrf_field() }}
  		  			<input type="submit" value="Agregar Género" class="btn btn-info"><br><br>
  				</form>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
		      		<th scope="col">#</th>
		      		<th scope="col">Genero</th>
              		<th scope="col">Editar</th>
		    	</tr>
			</thead>
			<tbody>
		    	@foreach($generos as $genero)
					<tr>
						<td style="vertical-align: middle;">{{ $genero->id_genero }}</td>
						<td style="vertical-align: middle;">{{ $genero->genero }}</td>
						<td style="vertical-align:middle; text-align: center;"><div><a href="{{action('GeneroController@formulario_get',$genero->id_genero) }}"><img width="30px" src="{{ asset('estilos/img/editar.png') }}"></a></div></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection