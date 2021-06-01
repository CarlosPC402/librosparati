@extends('plantilla.app')
@section('contenido')
	<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
      Browser Avaliable Books
    </h1>
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
          	<form action="{{action('InicioController@buscar')}}" method="POST" class="former">
	  			{{ csrf_field() }}
	  			<div class="buscador">
                    <div class="input-group">
                      <select style="width: 350px;" name="criterio" id="busque" class="buscador_libro"></select>
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" >
                          <i class="fas fa-search" style="color: white;"></i>
                        </button>
                      </div>
                    </div>
                </div>
	  		</form>
          </div>
        </div>
      </div>
    </div>
    <hr>

    <div class="container">
		<div class="row">
	    	<div class="col">
	    		@if ($libro->foto == '')
				    hola
				@else
					<center>
						<img src="{{asset('storage').'/'.$libro->foto}}" style="width: 250px;" class="img-responsive">	
					</center>
				@endif
	      		
			</div>
	    	<div class="col">
	    		<center>
	    			
    				<form id="frm_favorito" action="{{action ('InicioController@favorito')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;margin-right: 20px;">
    					{{ csrf_field() }}
    					<input type="hidden" name="id_libro" value="{{$libro->id_libro}}">

    					<!-- <input type="submit" name="operacion" value="Agregar"> -->
						@if (is_null($favorito))
							<a id="favorito" type="submit" name="operacion" value="Agregar" title="Agregar A Favoritos" >
								<i class="fas fa-heart" style="color: red; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Agregar">
						@else
							<a id="favorito" type="submit" name="operacion" value="Agregar" title="Eliminar De Favoritos" >
								<i class="fas fa-heart-broken" style="color: red; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Eliminar">
						@endif
					</form>

	    			<form id="frm_bookmarc" action="{{action ('InicioController@bookmarc')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;margin-right: 20px;">
	    				{{ csrf_field() }}
    					<input type="hidden" name="id_libro" value="{{$libro->id_libro}}">
						@if (is_null($bookmarc))
							<a id="bookmarc" type="submit" title="Empezar a leer ahora" >
								<i class="fas fa-book" style="color: black; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Agregar">
						@else
							<a id="bookmarc" type="submit" title="Quitar de leer ahora" >
								<i class="fas fa-book-open" style="color: black; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Eliminar">
						@endif
					</form>

					<form id="frm_deseo" action="{{action ('InicioController@deseo')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;margin-right: 20px;">
						{{ csrf_field() }}
    					<input type="hidden" name="id_libro" value="{{$libro->id_libro}}">
						@if (is_null($deseo))
							<a id="deseo" type="submit" title="Agregar A Mi Lista De Deseos">
								<i class="fas fa-plus" style="color: black; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Agregar">
						@else
							<a id="deseo" type="submit" title="Eliminar de mi lista de deseos" >
								<i class="fas fa-check" style="color: black; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Eliminar">
						@endif
					</form>

					<form id="frm_debe" action="{{action ('InicioController@debe')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;margin-right: 20px;">
						{{ csrf_field() }}
    					<input type="hidden" name="id_libro" value="{{$libro->id_libro}}">
						@if (is_null($debe))
							<a id="debe" type="submit" title="Guardar para leer más tarde">
								<i class="far fa-bookmark" style="color: black; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Agregar">
						@else
							<a id="debe" type="submit" title="Eliminar de leer más tarde" >
								<i class="fas fa-bookmark" style="color: black; font-size:25px;"></i>
							</a>
							<input type="hidden" name="operacion" value="Eliminar">
						@endif
					</form>
					
				</center>
	      		<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 90px">Libro:</span>
					</div>
						<input name="nom_libro" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$libro->nom_libro}}" readonly="">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 90px">Genero:</span>
					</div>
						<input name="genero" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$libro->genero}}" readonly="">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 90px">Editorial:</span>
					</div>
						<input name="editorial" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$libro->nom_editorial}}" readonly="">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 90px">Autor:</span>
					</div>
						<input name="editorial" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$libro->nombre}} {{$libro->apellidos}}" readonly="">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text label" id="inputGroup-sizing-default" style="width: 90px">Reseña:</span>
					</div>
						<textarea id="review" name="review" class="form-control " id="exampleFormControlTextarea2" rows="5" readonly="">{{$libro->review}}</textarea>
				</div>
	    	</div>
	  	</div>
	</div>

@endsection
@section('documentready')
	$(document).ready(function(){
		$("#favorito").bind('click',function(){
			$("#frm_favorito").submit();
		});

		$("#bookmarc").bind('click',function(){
			$("#frm_bookmarc").submit();
		});

		$("#deseo").bind('click',function(){
			$("#frm_deseo").submit();
		});

		$("#debe").bind('click',function(){
			$("#frm_debe").submit();
		});

	});

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
		            url: '{{action('InicioController@ajax')}}',
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

@endsection