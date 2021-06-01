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

	<style type="text/css">
		.content {
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 20px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
	</style>
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
		  <!-- Heading -->
		  	<br>
		  	<div class="sidebar-heading" style="text-align: center; font-size: 15px;">
	        	Social Media
	    	</div>
			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="color: white;" class="fab fa-facebook-f"></i>
                	Facebook
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="color: white;" class="fas fa-globe-americas"></i>
                	Web
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="color: white;" class="fab fa-twitter"></i>
                	Twitter
				</a>
			</li>

		  <!-- Divider -->
			<div style="height: 10px; background-color: #19202e;"></div>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #E64C66;" class="fas fa-circle"></i>
                	Más de 100,000 libros disponibles
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #FFAB00;" class="fas fa-circle"></i>
                	Ofertas semanales
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #00BFDD;" class="fas fa-circle"></i>
                	Envíos gratuitos al interior del estado 
				</a>
			</li>

			<li class="nav-item">
		    	<a class="nav-link" href="#">
                  	<i style="font-size: 8px; margin-bottom: 2px;color: #7874CF;" class="fas fa-circle"></i>
                	Cada semana se agregan nuevos libros
				</a>
			</li>
		  <!-- Sidebar Toggler (Sidebar) -->
			<!-- <div class="text-center d-none d-md-inline">
		    	<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div> -->
		</ul>
    	<!-- End of Sidebar -->

	    <!-- Content Wrapper -->
	    <div id="content-wrapper" class="d-flex flex-column"  style="background-color: #eef1f7;">

	      <!-- Main Content -->
	    	<div id="content">
		        <!-- Topbar -->
		        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			    	<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
					<a class="nav-link" style="color: #69738C" href="{{route ('out_help') }}">Help Center</a>
			     	<a class="nav-link" style="color: #69738C" href="{{route ('out_support') }}">Our Support</a>
			     	<a class="nav-link" style="color: #69738C" href="{{ route('login') }}">Login</a>
			     	<a class="nav-link" style="color: #69738C" href="{{ route('registrarse') }}">Register</a>
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
