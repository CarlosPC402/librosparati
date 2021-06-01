<!DOCTYPE html>
<html lang="en">

<head>
	<title>Libros Para Ti</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="{{ asset('estilos/css/plantilla.css') }}" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{ asset('estilos/css/bootstrap.min.css') }}" id="bootstrap-css"/>
	<link rel="stylesheet" href="{{ asset('estilos/css/sb-admin-2.css') }}" />
	<link href="{{ asset('estilos/selectize/selectize.bootstrap4.css') }}" rel="stylesheet" />
	<link href="{{ asset('estilos/css/jquery.minicolors.css') }}" rel="stylesheet" type="text/css" />	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
</head>

<body id="page-top">

  <!-- Page Wrapper -->
	<div id="wrapper">
    	<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" >

		  <!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
		    	<div class="sidebar-brand-icon">
		    		<!--<img src="{{ asset('estilos/img/Logo.png') }}" class="logo">!-->
		    		<p style="font-family: arial">Libros para ti</p>
		    	</div>
		    	<!--<img src="{{ asset('estilos/img/Letra.png') }}" class="sidebar-brand-text mx-2 letra">!-->
			</a>
		  <!-- Divider -->
			<div style="height: 10px; background-color: #19202e;"></div>
			<?php
				$tipo_usuario=tipo_usuario();
				//dd($tipo_usuario);
			?>
			@if ($tipo_usuario->nomrol == 'Administrador' )
				<li class="nav-item">
					<br>
					<center>
						<form action="{{action('LibrosController@formulario')}}" method="POST" style="display: inline-block;">
	              			{{ csrf_field() }}
	  		  				
	  		  				<a type="submit" class="nav-link btn" href="{{action ('LibrosController@formulario')}}" style="background-color: #f2795a; width: 140px; padding: 10px 0px 10px 5px">
				    			<i style="margin-right: 5px;" class="fas fa-plus"></i><span>ADD A BOOK</span>
							</a>
	  					</form>
					</center><br>
				</li>
				<div style="height: 10px; background-color: #19202e;"></div>
			@endif

		  <!-- Heading -->
			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('bookmarc')}}">
                  	<i style="color: white;" class="fas fa-book"></i>
                	Now Reading
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('allbooks')}}">
                  	<i style="color: white;" class="fas fa-globe-americas"></i>
                	Browse
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('comprar')}}">
                  	<i style="color: white;" class="fas fa-shopping-cart"></i>
                	Buy Books
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('favoritos')}}">
                  	<i style="color: white;" class="fas fa-star"></i>
                	Favorite Books
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('deseos')}}">
                  	<i style="color: white;" class="fas fa-th-list"></i>
                	Wishlist
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('historial')}}">
                  	<i style="color: white;" class="fas fa-history"></i>
                	History
				</a>
			</li>

		  <!-- Divider -->
			<div style="height: 10px; background-color: #19202e;"></div>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('deberia_leer')}}">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #E64C66;" class="fas fa-circle"></i>
                	Must Read Titles
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('mejor')}}">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #FFAB00;" class="fas fa-circle"></i>
                	Best Of List
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('novelsbooks')}}">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #00BFDD;" class="fas fa-circle"></i>
                	Classics Novels
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="{{route ('fictionsbooks')}}">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #7874CF;" class="fas fa-circle"></i>
                	Non Fiction
				</a>
			</li>

			<div style="height: 10px; background-color: #19202e;"></div>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="color: white;" class="fas fa-history"></i>
                	<span style="font-size: 10px;">
                		You added Fight Club by Chuck Palahniuk to your Must Read Titles<br>
                		24 minutes ago
                	</span> 
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="color: white;" class="fas fa-history"></i>
                	<span style="font-size: 10px;">
                		You added The Trial by Franz Krafa to your Must Read Titles<br>
                		48 minutes ago
                	</span> 
				</a>
			</li>

			<!-- <div style="height: 10px; background-color: #19202e;"></div> -->

		  <!-- Sidebar Toggler (Sidebar) -->
			<!-- <div class="text-center d-none d-md-inline">
		    	<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div> -->
		</ul>
    	<!-- End of Sidebar -->

	    <!-- Content Wrapper -->
	    <div id="content-wrapper" class="d-flex flex-column">

	      <!-- Main Content -->
	    	<div id="content">
		        <!-- Topbar -->
		        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			    	<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
			    	@if ($tipo_usuario->nomrol == 'Administrador' )
			     		<a class="nav-link" style="color: #69738C" href="{{route ('listado_libros') }}">Libros</a>
			     		<a class="nav-link" style="color: #69738C" href="{{route ('listado_autores') }}">Autores</a>
			     		<a class="nav-link" style="color: #69738C" href="{{route ('listado_generos') }}">Generos</a>
			     		<a class="nav-link" style="color: #69738C" href="{{route ('listado_editoriales') }}">Editoriales</a>
			     		<a class="nav-link" style="color: #69738C" href="{{route ('listado_usuarios') }}">Usuarios</a>
			     	@else
			     		<a class="nav-link" style="color: #69738C" href="{{route ('help') }}">Help Center</a>
			     		<a class="nav-link" style="color: #69738C" href="{{route ('support') }}">Our Support</a>
					@endif
			      <!-- Navbar-->
			    	<ul style="    padding: 8px; background-color: #15A4FA; left: 16px;position: relative;" class="navbar-nav ml-auto ml-md-0">
			    		@if(Auth::user()->foto == '')
			    			<img height="23" style="margin-top: 8px;" src="{{ asset('estilos/img/user.jpg') }}" class="rounded float-left" alt="...">
			    		@else
			    			<img height="23" style="margin-top: 8px;" src="{{asset('storage').'/'.Auth::user()->foto}}" class="rounded float-left" alt="...">
			    		@endif
			        	
				        <li class="nav-item dropdown">
				            <a style="color:white;" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link" href="charts.html"
				            >
				            	<div class="sb-nav-link-icon"></div>
				            	{{ Auth::user()->nombre }} {{ Auth::user()->apellido_p }}<i style="margin-left: 10px;" class="fas fa-chevron-circle-down"></i>
				        	</a>
				            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            	<a class="dropdown-item" href="{{route ('perfil') }}">Ver Perfil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
				        </li>
			    	</ul>
			    </nav>
	        <!-- End of Topbar -->

		        <!-- Begin Page Content -->
		        <div class="container-fluid">
		        	@yield('contenido') 
		        </div>

		        <!-- /.container-fluid -->
	    	</div>
	      <!-- End of Main Content -->

	      <!-- Footer -->
	    	<!-- <footer class="sticky-footer bg-white">
	        	<div class="container my-auto">
	          		<div class="copyright text-center my-auto">
	            		<span>Copyright &copy; Your Website 2019</span>
	        		</div>
	        	</div>
	    	</footer> -->
	      <!-- End of Footer -->
	    </div>
	    <!-- End of Content Wrapper -->
	</div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-white">
    	<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    		<ul  class="navbar-nav ml-auto ml-md-0">
        		<li class="fas fa-question-circle" style="padding: 15px; background-color: #1f2637; color: white; left: -28px;position: relative"></li>
        		<li class="fas fa-cog" style="padding: 15px; background-color: #15A4FA; color: white; left: -28px;position: relative"></li>
    		</ul>
    	</div>
    </nav>
	<a class="scroll-to-top rounded" href="#page-top">
		^
	</a>


  <!-- Bootstrap core JavaScript-->

  <script src="{{ asset('estilos/js/jquery-3.4.1.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{ asset('estilos/js/bootstrap.min.js') }}"></script> 
  <script src="{{ asset('estilos/js/sb-admin-2.min.js') }}"></script> 
  <script src="{{ asset('estilos/js/jquery.minicolors.js') }}"></script>
  <script src="{{ asset('estilos/selectize/selectize.min.js') }}"></script> 

	@yield('scripts')


 	<script type="text/javascript">

	@yield('documentready')
	  

	</script>

</body>

</html>
