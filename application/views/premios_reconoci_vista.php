<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/css/bootstrap.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/style.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/datatables.min.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/miCodi/css/miEstilo.css"); ?>>

<style>
#contePremioRecono{
        margin-left: 20px;
        margin-top: 20px;
}

#bordeNebuloso{
   position: absolute; 
   width: 100%;
   height: 50px;
   background: linear-gradient(rgba(255, 255, 255, 0.616),rgb(255, 255, 255));
   bottom: 0px;
   left: -20px;
   z-index: 3;
   filter: blur(20px);
   
}

.recogida{
    height: 300px;
    overflow: hidden;
    position: relative;
    transition: all 3s ease;
}

.extender{
    height: 100%;
}


</style>




</head>
<body>
   
    




<!-- modal para insertar -->
<div class="modal fade" id="modalInsertarPremiosReco" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Insertar premios y reconocimientos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>

            <div class="modal-body">
                <div class="container-fluid">
                    
<label for="fechaModalInsertar">Año</label>                    
<input style="width: 20%;" type="number" class="form-control" id="fechaModalInsertar">
<label for="conteniModalInser">Contenido</label>
<textarea class="form-control" id="conteniModalInser" cols="30" rows="10"></textarea>






                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="icon-cross"></span> Cerrar</button>
                <button type="button" class="btn btn-primary" id="botonGuardarInser"><span class="icon-floppy-disk"></span> Guardar</button>
            </div>
        </div>
    </div>
</div>










<!-- Modal Editar-->
<div class="modal fade" id="modalEditarPremiosReco" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Editar premios y reconocimientos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>

            <div class="modal-body">
                <div class="container-fluid">
                   
<label for="fechaModalEditar">Año</label>                    
<input style="width: 20%;" type="number" class="form-control" id="fechaModalEditar">
<label for="conteniModalEditar">Contenido</label>
<textarea class="form-control" id="conteniModalEditar" cols="30" rows="10"></textarea>


<input type="hidden" id="idOculEdiPremiReco">



                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="icon-cross"></span> Cerrar</button>
                <button type="button" class="btn btn-primary" id="botonGuarEdi"><samp class="icon-floppy-disk"></samp> Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal para eliminar -->
<div class="modal fade" id="elimiModalPremioReco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 400px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: rgb(194, 53, 53);">Precaución</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <p>Se eliminarán los premios y reconocimientos correspondientes</p>
            <input type="hidden" id="idTextOculBorrar">
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" id="botonBorrarPremi" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>














    <div class="container sombra" 
    style="background-color: #ffffff;
           width: 100%;
           height: auto;
           padding-bottom: 10px;">

<br>
<div class="row fila">
    

<div class="col">





    <h3 style="display: inline-block;" class="encabezados">Premios y reconocimientos</h3>   
    <button class="btn btn-primary btn-sm ml-2 vistaAdmin" hidden data-toggle="modal" data-target="#modalInsertarPremiosReco">
        <span class="icon-plus"></span>
    </button>

<div id="acortador" class="recogida">
    
<div id="contePremioRecono" style="padding-left: 200px; padding-right: 200px;">
<div id="bordeNebuloso"></div>

</div>

</div>

<center>
<button id="mostrarTodosPremios" class="btn btn-primary" 
style="position: relative; margin-top: -80px; z-index: 4;">
Ver todos
</button>
</center> 







</div>
</div>
</div>





    <script src=<?=  base_url("componentes/depen/datatables.min.js"); ?>></script>
    <script src=<?=  base_url("componentes/miCodi/js/premiosReconoci.js"); ?>></script>

<script>

var contenedor = document.getElementsByClassName("container");
 var anchoConte = contenedor[0].clientWidth;

if (anchoConte <= 720)
{
    $("#contePremioRecono").removeAttr("style");
}



</script>

    
</body>
</html>