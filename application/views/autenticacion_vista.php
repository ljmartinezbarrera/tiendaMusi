<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/css/bootstrap.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/style.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/datatables.min.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/miCodi/css/miEstilo.css"); ?>>
    <link rel="icon" type="image/jpg" href=<?= base_url('componentes/ico/logo.jpg') ?>>
    <title>Document</title>
</head>
<body>
    









<!-- Modal para Iniciar sesión -->
<div class="modal fade" id="modalIniSecio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Iniciar sesión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
      
  
        <form method="post" id="subirIniSeci" enctype="multipart/form-data">
        
  
        <div class="container containerModal">
            
        <div class="row">
            
        <div class="col">
    

            <label for="nombreIniSeci">Nombre</label>
            <input type="text" name="" id="nombreIniSeci" class="form-control">
            
            <label for="contrasenaIniSeci" class="mt-3">Contraseña</label>
            <input type="password" name="" id="contrasenaIniSeci" class="form-control">
            
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="" id="checkVerContarIniSeci">
                <label class="form-check-label" for="checkVerContarIniSeci">
                  Ver contraseña
                </label>
            </div>

            <input type="submit" class="btn btn-primary btn-block mt-4" value="Iniciar">           
            <center class="mt-3">
            <a class="mt-1" style="cursor: pointer;" id="btnAbrirModRegis" data-dismiss="modal">Registrarse</a>
            </center>
            <br>

        </div>        
        </div>
        </div>

  
          </form>



        </div>
  
      </div>
    </div>
  </div>






<!-- Modal para Registrarse -->
<div class="modal fade" id="modalRegistr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    


      

      <div class="container containerModal">
          
      <div class="row">
          
      <div class="col">
  
<form action="" id="formRegistar">

          <label for="correoRegi">Correo</label>
          <input type="email" name="" id="correoRegi" class="form-control">

          <label for="nombreRegi" class="mt-2">Nombre</label>
          <input type="text" name="" id="nombreRegi" class="form-control">
 
          <label for="contrasenaRegi" class="mt-2">Contraseña</label>
          <input type="password" name="" id="contrasenaRegi" class="form-control">
          
          <label for="repeContrasenaRegi" class="mt-2">Repetir contraseña</label>
          <input type="password" name="" id="repeContrasenaRegi" class="form-control">

          <div class="form-check mt-2">
              <input class="form-check-input" type="checkbox" value="" id="checkVerContarRegi">
              <label class="form-check-label" for="checkVerContarRegi">
                Ver contraseña
              </label>
          </div>

        <div class="row">
         <div class="col">
           <input type="button" class="btn btn-dark btn-block mt-3 " value="Cancelar" data-dismiss="modal">
         </div> 
         <div class="col">
           <input type="submit" class="btn btn-primary btn-block mt-3" value="Guardar">
         </div>
        </div>
</form>
      </div>        
      </div>
      </div>
      





      </div>

    </div>
  </div>
</div>




























<script src=<?=  base_url("componentes/depen/datatables.min.js"); ?>></script>
<script src=<?=  base_url("componentes/miCodi/js/autenticacion.js"); ?>></script>


</body>
</html>