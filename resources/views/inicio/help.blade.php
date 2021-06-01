@extends('plantilla.app')
@section('contenido')
  <h1 style="color: #444c63; font-size: 33px;" class="mt-4">
    Help Center
  </h1>
  <hr />
  <div class="container">
    <div class="row">
        <section id="FAQS">
          <h4>¿Cómo puedo cambiar mi foto de perfil?</h4>
          R= En la parte superior derecha haga click en su nombre, después en ver perfil, seguidamente será redireccionado al formulario donde podrá hacer los cambios necesarios a su perfil. 
          <h4>¿Cualquiera puede ver mis marcadores (favoritos, lista de deseos etc)?</h4>
          R= No, solo el usuario que haya iniciado sesión podrá ver sus propios marcadores.
          <h4>¿Cómo se calculan los más libros más populares?</h4>
          R= El sistema registra el número de veces que el libro ha sido agregado a favoritos, con base a ello, se obtiene el top 3.
          NOTA: Cada vez que un usuario elimine de su favorito un libro éste tambien le resta popularidad al libro.
          <h4>Mi lista de favoritos/ lista de deseos etc no me muestra nada</h4>
          R= Asegurese de tener al menos un libro agregado a la lista para ello haga click en el hipervínculo ver más que se encuentra en la descripción del libro y verifique el mensaje que le muestra al pasar el mouse encima del ícono correspondiente
          <h4>¿Cómo puedo agregar a mis favoritos un libro?</h4>
          R= En la decripción del libro haga click en el hipervínculo "ver más" seguidamente haga click en el ícono para agregarlo a sus favoritos.
        </section>
    </div>
  </div>
	
@endsection