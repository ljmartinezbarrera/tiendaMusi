<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=<?=  base_url("componentes/depen/css/bootstrap.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/style.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/datatables.min.css"); ?>>


    <link rel="stylesheet" href=<?=  base_url("componentes/miCodi/css/usuario.css"); ?>>
    <link rel="icon" type="image/jpg" href=<?= base_url('componentes/ico/logo.jpg') ?>>
    <title>Usuarios</title>
</head>
<body>
    












 <!-- Modal insertar -->
<div class="modal fade" id="modalInserUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

<form id="formuInserUsuario">

<div class="container">

<label for="inserCorreo">Correo</label>
<input type="email" id="inserCorreo" class="form-control" required>

<label for="inserNombre" class="mt-2">Nombre de usuario</label>
<input type="text" id="inserNombre" class="form-control" required>

<label for="inserConrase" class="mt-2">Contraseña</label>
<input type="password" id="inserContrase" class="form-control" required>

<label for="selecRol" class="mt-2">Rol</label>
<select id="selecRol" class="form-control">
<option value="Cliente">Cliente</option>
<option value="Administrador">Administrador</option>
</select>
<br>

</div>  



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="icon-cross"></span> Cerrar</button>
        <button type="submit" class="btn btn-primary"><span class="icon-floppy-disk"></span> Guardar</button>
      </div>
</form>

    </div>
  </div>
</div>












 <!-- Modal editar -->
 <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: rgb(180, 135, 0)">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form id="formuEditarUsuario">

    <div class="container">
          
          <label for="editCorreo">Correo</label>
          <input type="email" id="editCorreo" class="form-control" required>
          
          <label for="editNombre" class="mt-2">Nombre de usuario</label>
          <input type="text" id="editNombre" class="form-control" required>
          
          <label for="editContra" class="mt-2" style="position: relative;" id="labelContra">
            Cambiar contraseña <input type="checkbox" id="checkContar" style="position: absolute; top: 8px; margin-left: 5px;">
          </label>
          <input type="password" id="editContra" class="form-control" required>
          
          <label for="editSelecRol" class="mt-2">Rol</label>
          <select id="editSelecRol" class="form-control" required>
          <option value="Cliente">Cliente</option>
          <option value="Administrador">Administrador</option>
          </select>
          <br>
          
    </div>  
          
 <input type="hidden" id="editId">         
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="icon-cross"></span> Cerrar</button>
        <button type="submit" class="btn btn-primary"><span class="icon-floppy-disk"></span> Guardar</button>
      </div>
</form>



    </div>
  </div>
</div>











<!-- Modal para eliminar -->
<div class="modal fade" id="modalBorraUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: rgb(194, 53, 53);">Precaución</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <p>Se eliminará el usuario: <span id="nomUsuBorrar"></span></p>
          <p>Con id: <span id="idUsuBorrar"></span></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="icon-cross"></span> Cerrar</button>
        <button type="button" class="btn btn-danger" id="botonBorrUsu" data-dismiss="modal"><span class="icon-bin"></span> Borrar</button>
      </div>
    </div>
  </div>
</div>


















<div class="container mt-3 divConteTabla">

<table id="tablaUsuario" class="table table-hover table-striped" style="text-align: center;">  
<thead>
  <th>Id</th>
  <th>Nombre</th>
  <th>Correo</th>
  <th>Rol</th>
</thead>
<tbody>

</tbody>
</table>

</div>





<script src=<?=  base_url("componentes/depen/jquery-3.6.0.min.js"); ?>></script>
<script src=<?=  base_url("componentes/depen/popper.min.js"); ?>></script> 
<script src=<?=  base_url("componentes/depen/js/bootstrap.js"); ?>></script>
<script src=<?=  base_url("componentes/depen/datatables.min.js"); ?>></script>
<script src=<?=  base_url("componentes/depen/sweetalert2@11.js"); ?>></script>

<script src=<?=  base_url("componentes/miCodi/js/usuario.js"); ?>></script>

</body>
</html>