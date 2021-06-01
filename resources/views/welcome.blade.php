@extends('plantilla.app_home')
@section('contenido')
	<center>
		<h1 style="color: #444c63; font-size: 33px;" class="mt-4">
    		Solo por hoy regístrate completamente gratis!!
  		</h1>		
	</center>
  
  <hr />
<div class="container">
    <div class="row" style="padding-left: 220px; padding-top: 50px">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        	<ol class="carousel-indicators"> 
        		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> 
	        	<li data-target="#carouselExampleIndicators" data-slide-to="1">	</li> 
	        	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li> 
        	</ol> 
        	<div class="carousel-inner"> 
        		<div class="carousel-item active"> 
        			<!-- Por defecto w- estaba en 100 -->
        			<img class="d-block w-10" src="{{ asset('estilos/img/slide2.jpg') }}" alt="First slide"> 
        		</div> 
        		<div class="carousel-item"> 
        			<img class="d-block w-10" src="{{ asset('estilos/img/slide1.jpg') }}" alt="Second slide"> 
        		</div> 
        		<div class="carousel-item"> 
        			<img class="d-block w-10" src="{{ asset('estilos/img/slide3.jpg') }}" alt="Third slide"> 
        		</div> 
        	</div> 
        	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> 
        		<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
        		<span class="sr-only">Previous</span> 
        	</a> 
        	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> 
        		<span class="carousel-control-next-icon" aria-hidden="true"></span> 
        		<span class="sr-only">Next</span> 
        	</a> 
    	</div>

    	<div class="content">
    		<br><br>
            <div class="links">
                <a class="boton" href="#">Novelas</a>
                <a class="boton" href="#">Romance</a>
                <a class="boton" href="#">Comedia</a>
                <a class="boton" href="#">Terror</a>
                <a class="boton" href="#">y mucho más...</a>
            </div>
        </div>
    </div>

    <!-- <div class="col-lg-2 col-md-2 col-4" style="padding:0%; padding-bottom: 2%; display: inline-block; margin-right: 30px;">
        <div class="card-group">
            <div class="card">
                <img class="" src="{{ asset('estilos/img/cover.jpg') }}" style="height:200px;" alt="Card image cap">
                <div class="card-footer" style="padding: 3%;">
                    <div class="col-sm-12">
                        <small class="text-muted">hola</small>
                    </div>
                    <div class="col-sm-12">
                        <a href="">Ver más <i class="far fa-eye" ></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div>
    
@endsection
@section('documentready')
	$(document).ready(function(){
		$(".boton").bind('click',function(){
			alert('Registrate para ver todo el contenido disponible. Es gratis!!');
		});

	});

@endsection