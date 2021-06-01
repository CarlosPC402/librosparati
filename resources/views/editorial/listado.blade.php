@extends('plantilla.app')
@section('contenido')
	<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
      Editoriales
    </h1>
    <hr />
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="{{action('EditorialController@formulario')}}" method="POST" style="display: inline-block;">
              		{{ csrf_field() }}
  		  			<input type="submit" value="Agregar Editorial" class="btn btn-info"><br><br>
  				</form>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
		      		<th scope="col">#</th>
		      		<th scope="col">Editorial</th>
              		<th scope="col">Editar</th>
		    	</tr>
			</thead>
			<tbody>
		    	@foreach($editoriales as $editorial)
					<tr>
						<td style="vertical-align: middle;">{{ $editorial->id_editorial }}</td>
						<td style="vertical-align: middle;">{{ $editorial->nom_editorial }}</td>
						<td style="vertical-align:middle; text-align: center;"><div><a href="{{action('EditorialController@formulario_get',$editorial->id_editorial) }}"><img width="30px" src="{{ asset('estilos/img/editar.png') }}"></a></div></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection