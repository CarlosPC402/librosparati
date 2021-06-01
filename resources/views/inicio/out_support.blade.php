@extends('plantilla.app_home')
@section('contenido')
  <h1 style="color: #444c63; font-size: 33px;" class="mt-4">
    Our Support
  </h1>
  <hr />
  <div class="container">
    <div class="row">
        <div class="col">
          <figure>
            <img src="{{asset('estilos/img/support.svg')}}" style="width: 400px;" class="img-responsive">    
          </figure>
      </div>
        <div class="col"><br><br><br>
            <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text label" id="inputGroup-sizing-default" style="width: 120px;">Correo:</span>
          </div>
            <input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text label" id="inputGroup-sizing-default" style="width: 120px;">Asunto:</span>
          </div>
            <input name="apellido_p" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text label" id="inputGroup-sizing-default" style="width: 120px;">Mensaje:</span>
          </div>
            <textarea name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" rows="4" placeholder="Máximo 255 Caracteres"></textarea>
        </div>
        <center>
          <a style="color: black;"  class="btn btn-info" href="#">Enviar <i class="fas fa-paper-plane" style="color: black;"></i></a>
        </center>
        </div>
      </div>
  </div>
  
@endsection