@extends('plantilla.app')
@section('contenido')
	<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
      Browser Users
    </h1>
    <hr />
    <div>
      <div class="row">
        <div class="col">
          <!-- <a href="{{route ('allbooks')}}" class="badge badge-primary">All Books</a>
          <a href="{{route ('recientes')}}" class="badge badge-primary">Most Recent</a>
          <a href="{{route ('populares')}}" class="badge badge-primary">Most Popular</a>
          <a href="{{route ('freebooks')}}" class="badge badge-primary">Free Books</a> -->
        </div>
        <div class="col col-lg-5">
          <div class="input-group">
          	<form action="{{action('UsuarioController@buscar')}}" method="POST" class="former">
	  			{{ csrf_field() }}
	  			<div class="buscador">
                    <div class="input-group">
                      <select style="width: 350px;" name="criterio" id="busque" class="buscador_libro"></select>
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" >
                          Buscar
                        </button>
                      </div>
                    </div>
                </div>
	  		</form>
            <!-- <input class="form-control" type="text" placeholder="Enter Keyworks" aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <hr>
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="{{action('UsuarioController@formulario')}}" method="POST" style="display: inline-block;">
              		{{ csrf_field() }}
  		  			<input type="submit" value="Agregar Usuario" class="btn btn-info"><br><br>
  				</form>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
		      		<th scope="col">#</th>
		      		<th scope="col">Nombre</th>
		      		<th scope="col">Apellidos</th>
		      		<th scope="col">Correo</th>
		      		<th scope="col">Rol</th>
		      		<th scope="col">Foto</th>
		      		<th scope="col">Editar</th>
		    	</tr>
			</thead>
			<tbody>
		    	@foreach($usuarios as $usuario)
					<tr>
						<td style="vertical-align: middle;">{{ $usuario->idusuario }}</td>
						<td style="vertical-align: middle;">{{ $usuario->nombre }}</td>
						<td style="vertical-align: middle;">{{ $usuario->apellido_p }} {{ $usuario->apellido_m }}</td>
						<td style="vertical-align: middle;">{{ $usuario->email }}</td>
						<td style="vertical-align: middle;">{{ $usuario->nomrol }}</td>
						@if ($usuario->foto == '')
						    <td></td>
						@else
						    <td><img src="{{asset('storage').'/'.$usuario->foto}}" width="100"></td>
						@endif
						
						<td style="vertical-align:middle; text-align: center;"><div><a href="{{action('UsuarioController@formulario_get',$usuario->idusuario) }}"><img width="30px" src="{{ asset('estilos/img/editar.png') }}"></a></div></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
@section('documentready')
$(document).ready(function(){
    


     $('#busque').selectize({
      valueField: 'idusuario',
      labelField: 'nombre',
      searchField: 'nombre',
      placeholder: 'Buscar...',
      create:false, 
      onChange:function(value){         
        // tmp=value.split('_');
        // if(tmp[2]!=0)
        // {
        //  $("#ctrs").html(tmp[2]);
        // }
        // else{
        //   $("#ctrs").html('');   
        // }
        //console.log(value);
      return true;
      },            
      load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: '{{action('UsuarioController@ajax')}}',
                data: {
                q: query,              
                _token:"{{ csrf_token() }}"
                }, 
                type: 'POST',
                error: function(res) {
                    console.log(res.responseText);
                    callback();
                },
                success: function(res) { 
                    console.log(res);
                    callback(res);
                }
            });
        }
  });

  });
@endsection