@extends('plantilla.app')
@section('contenido')
	<header>
		<h1 style="color: #444c63; font-size: 33px;" class="mt-4">Browser Avaliable Books</h1>
	</header>
    <hr />
    <div>
      <div class="row">
        <div class="col">
          <a href="{{route ('allbooks')}}" class="badge badge-primary">All Books</a>
          <a href="{{route ('recientes')}}" class="badge badge-primary">Most Recent</a>
          <a href="{{route ('populares')}}" class="badge badge-primary">Most Popular</a>
          <a href="{{route ('freebooks')}}" class="badge badge-primary">Free Books</a>
        </div>
        <div class="col col-lg-5">
          <div class="input-group">
          	<form action="{{action('LibrosController@buscar')}}" method="POST" class="former">
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
	<table class="table table-bordered">
		<thead>
			<tr>
	      		<th scope="col">#</th>
	      		<th scope="col">Libro</th>
	      		<th scope="col">Editorial</th>
	      		<th scope="col">Genero</th>
	      		<th scope="col">Autor</th>
	      		<th scope="col">Review</th>
	      		<th scope="col">Precio</th>
	      		<th scope="col">Calificación</th>
	      		<th scope="col">Foto</th>
	      		<th scope="col">Editar</th>
	    	</tr>
		</thead>
		<tbody>
	    	@foreach($libros as $libro)
				<tr>
					<td style="vertical-align: middle;">{{ $libro->id_libro }}</td>
					<td style="vertical-align: middle;">{{ $libro->nom_libro }}</td>
					<td style="vertical-align: middle;">{{ $libro->nom_editorial }}</td>
					<td style="vertical-align: middle;">{{ $libro->genero }}</td>
					<td style="vertical-align: middle;">{{ $libro->nombre }} {{ $libro->apellidos }}</td>
					<td style="vertical-align: middle;">{{ $libro->review }}</td>
					<td style="vertical-align: middle;">{{ $libro->precio }}</td>
					<td style="vertical-align: middle;">{{ $libro->calificacion }}</td>
					@if ($libro->foto == '')
					    <td></td>
					@else
					    <td><img src="{{asset('storage').'/'.$libro->foto}}" width="100"></td>
					@endif
					
					<td style="vertical-align:middle; text-align: center;"><div><a href="{{action('LibrosController@formulario_get',$libro->id_libro) }}"><img width="30px" src="{{ asset('estilos/img/editar.png') }}"></a></div></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
@section('documentready')
$(document).ready(function(){
    


	 $('#busque').selectize({
	  valueField: 'id_libro',
	  labelField: 'nom_libro',
	  searchField: 'nom_libro',
	  placeholder: 'Enter Keywords',
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
	            url: '{{action('LibrosController@ajax')}}',
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