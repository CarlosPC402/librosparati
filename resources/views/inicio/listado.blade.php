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
	@foreach($libros as $libro)
		<div class="col-lg-2 col-md-2 col-4" style="padding:0%; padding-bottom: 2%; display: inline-block; margin-right: 30px;">
			<div class="card-group">
				<div class="card">
					<img class="" src="{{asset('storage').'/'.$libro->foto}}" style="height:200px;" alt="Card image cap">
					<div class="card-footer" style="padding: 3%;">
						<div class="col-sm-12">
							<small class="text-muted">{{$libro->nom_libro}}</small>
						</div>
						<div class="col-sm-12">
							<small class="text-muted">By {{$libro->nombre}} {{$libro->apellidos}}</small>
						</div>
						<div class="col-sm-12">
							@if($libro->precio == 0)
								<small class="text-muted">Gratis</small>
							@else
								<small class="text-muted">Precio: {{$libro->precio}}</small>
								<a title="Agregar al carrito" type="submit">
									<i class="fas fa-shopping-cart" style="color: grey; font-size:25px;"></i>
								</a>
							@endif
						</div>
						<div class="col-sm-12">
							@for ($i=0; $i<$libro->calificacion; $i++)
								<i class="fas fa-star" style="color: #ffab00;" ></i>
							@endfor
							<?php
								$resto=5-$libro->calificacion;
							?>
							@for ($i=0; $i<$resto; $i++)
								<i class="far fa-star" style="color: #ffab00;" ></i>
							@endfor
						</div>
						<div class="col-sm-12">
							<a href="{{action('InicioController@formulario_get',$libro->id_libro) }}">Ver más <i class="far fa-eye" ></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach

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

  });
@endsection