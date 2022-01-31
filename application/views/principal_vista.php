<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/css/bootstrap.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/style.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/datatables.min.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/miCodi/css/miEstilo.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/miCodi/css/barraNavega.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/miCodi/css/loadMusi.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/miBiblioteca/reproducAudio/reproducAudio.css"); ?>>
    <link rel="icon" type="image/jpg" href=<?= base_url('componentes/ico/logo.jpg') ?>>
    <title>Pedro Yair</title>





<style>

.imagenCarru{
margin-left: 3px;
}





</style>




</head>

<body>
 

<?php
/*
function idSeleccionados($a)
{
$resultado = "";

    for ($i=0; $i < count($a)-1; $i++) { 
        $resultado .= "id = '".$a[$i]."' OR ";
    }

$resultado .= "id = '".$a[count($a)-1]."'";

return $resultado;
}

$arr = array('2','3','100');


echo idSeleccionados($arr);

*/
?>








<!-- Modal para subir mucica -->
<div class="modal fade" id="Msubi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir canción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">

    

      <form method="post" id="formuSubi" enctype="multipart/form-data">
         
      <b>Precio:</b>
      <input type="text" name="precio" class="form-control" id="precio" 
      pattern="^\d*(\.\d+)?$" style="width: 20%; display: inline-block;" required>
      $
      <br><br>
      <b>Nombre:</b> <br>
      <input type="text" class="form-control" name="nombreCancion" id="nombreCancion">  
       
      <input type="checkbox" name="nombreFichero" id="nombreFichero"> Nombre del fichero <br>  <br>
      <b>Canción:</b><br>  
      <input type="file" id="fileMusi" name="fileMusi" accept="audio/mp3" required>
    </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="botonSubir"><span class="icon-floppy-disk"></span> Guardar</button>
     </div>

        </form>


    </div>
  </div>
</div>





<!-- Modal para Editar música -->
<div class="modal fade" id="modEdiMicic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar datos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
  <span id="recarForm">    
  
        <form method="post" id="formEdiMuci" enctype="multipart/form-data">

     <input type="hidden" name="idOculEdi" id="idOculEdi">

    <label for=""><b>Precio:</b></label>     
      <input type="text" name="ediPrecio" class="form-control" pattern="^\d*(\.\d+)?$" id="ediPrecio" style="width: 20%; display: inline-block;">
      $    

     <br><br>
     <b>Nombre:</b> <br>
     <input type="text" class="form-control" name="EdiNombCancion" id="EdiNombCancion"> 

     <input type="checkbox" name="EdiNombreFichero" id="EdiNombreFichero" disabled>
     <span id="spanNomNomFich" style="color:rgba(0, 0, 0, 0.6)">Nombre del fichero</span>  
     <br><br>

       <label for="ediFileMusi"><b>Deseas cambiar la canción</b></label>
       <input type="checkbox" name="" id="chekPermCambiCancion" style="width: 16px; height: 16px; transform: translate(0px,3px);"><br>  
       <input type="file" id="ediFileMusi" name="ediFileMusi" disabled="false" accept="audio/mp3">
       <br>


  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="guardarCancEdi"><span class="icon-floppy-disk"></span> Guardar</button>
       </div>
  
          </form>
        </span>
  
      </div>
    </div>
  </div>





<!-- Modal para eliminar -->
<div class="modal fade" id="modBorraMucic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 400px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: rgb(194, 53, 53);">Precaución</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <p>Se eliminarán la canción:</p>
            <p id="mostrarCanciEnParrafoBorrar"></p>
            <input type="hidden" name="" id="oculIdBorrar">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" id="botonBorrarCancion" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>













<!-- encabezado -->
<div class="container sombra" style="background-color: #ffffff; padding: 3px 3px 3px 3px;">

    <img class="img-fluid" style="width: 100%;" src=<?=  base_url("componentes/img/IMG-20210606-WA0000.jpg"); ?> alt="">
</div>

<!-- carrusel -->
<div class="container sombra" style="background-color: white; padding: 0px;">
    

    <div id="carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner imagenCarru">
        <div class="carousel-item active">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0016.jpg"); ?> alt="">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0017.jpg"); ?> alt="">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0018.jpg"); ?> alt="">
        </div>
        <div class="carousel-item">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0012.jpg"); ?> alt="">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0013.jpg"); ?> alt="">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0015.jpg"); ?> alt="">
        </div>
        <div class="carousel-item">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0006.jpg"); ?> alt="">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0008.jpg"); ?> alt="">
           <img src=<?=  base_url("componentes/img/IMG-20210415-WA0010.jpg"); ?> alt="">
        </div>
        </div>
        
        <!--Controles NEXT y PREV-->
        <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--Controles de indicadores-->
        <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel1" data-slide-to="1"></li>
            <li data-target="#carousel1" data-slide-to="2"></li>
        </ol>
        
    </div>

</div>
















<!-- barra de navegación -->
<nav class="sticky-top container navbar navbar-expand bg-light">

    <a href="" class="navbar-brand encabezNavega">
      Tú música
    </a>
    
        <ul class="navbar-nav ml-auto responUlNav">



          <li class="nav-item dropdown vistaAdmin" hidden>
            <button type="button" data-toggle="dropdown" class="nav-link btn btn-light subirBtn"
                    style="padding: 6px 12px 6px 12px;">
              <span class="icon-cog"></span>
             </button> 
            <div class="dropdown-menu">
               <a href=<?=  base_url("Usuario_controller/vistaUsuario"); ?> class="dropdown-item"><span class="icon-users"></span> Usuarios</a>
               <a href="" class="dropdown-item"><span class="icon-history"></span> Historial</a>
            </div>

          </li>


             <li class="nav-item">
               <a class="nav-link" href="#linkParaUbicar">
                  <button type="button" class="btn btn-light" id="carritoCom" style="position: relative;">
                      <span class="icon-cart"></span>
                      <span class="badge badge-primary badge-pill" id="notifCarriComp" 
                      style="position: absolute; right: -1px; top: -4px;"></span>
                  </button>
               </a>
            </li>

            <li class="nav-item">
              <a class="nav-link">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalIniSecio">
                  <span id="nombreUsuBarraNave"></span>  
                    <span class="icon-user"></span>
                </button>    
              </a>
            </li>



         </ul>
    </nav>






















<div class="container sombra" 
     style="background-color: #ffffff;
            width: 100%;
            height: auto;
            padding-bottom: 10px;">
<br>
<div class="row">
    

<div class="col">
    

  


  <span id="linkParaUbicar" style="position: absolute; top: -70px;"></span>
  <h3 id="encabeCarritoTienda" class="encabezados" style="margin-bottom: 15px;">Tienda</h3>


<div id="divTabTienda">
    <table class="table-striped table-hover table" 
             id="tabCancio" 
             style="margin-left: -15px; background-color: rgba(255, 255, 255, 0.726);"
             align='center'>
        <thead style="text-align: center;">
            <th>Canción</th>
            <th style="width: 20%">Precio</th>
            <th style="width: 20%">Marcar</th>
        </thead>
        <tbody style="text-align: center;">

        </tbody>
    </table>
</div>


    <div id="recarCarrito">
    <table class="table-striped table-hover table" 
           id="tabCarritoDeComp" 
           style="width: 100%; margin: 0px; background-color: rgba(255, 255, 255, 0.726);"
           align='center'>
        <thead style="text-align: center;">
          <th>Canción</th>
          <th style="width: 40%">Precio</th>

        </thead>
        <tbody>
    
        </tbody>
    </table>
    <div style="background-color: #e4e4e4; padding: 20px; float: right;">
      Precio total: <span id="preciTotal">0.00</span> <span>$</span>
    </div>
</div> 




<input type="text" id="campoTexOculTotalPrec" value="0.00" hidden>


</div>


</div>

<br>



<a id="editarBiblio" class="btn btn-warning vistaAdmin" hidden 
href=<?=  base_url("EditarBiografia_controller/VistaEditarBiografia"); ?>>
<span class="icon-pencil"></span> Editar</a>

<hr>

<p id="biografia" style="float: left">
    <img style="height: 40%; width: 40%; float: left; margin-right: 15px;"
     src=<?= base_url("componentes/img/IMG-20210606-WA0001.jpg"); ?> alt="">
    <span id="biografia2">
    <span id="tituloBiogra" class="encabezados" style="font-weight: 500;">Biografía y trayectoria</span> <br>
    <span id="textBiobra" style="text-align: justify;">

    </span>
  

  <span id = "mostraBiogra" style = "cursor: pointer; color: blue;">Mostrar más</span>
  <span id = "oculBiogra" style = "cursor: pointer; color: blue">Ocultar</span>

  </span>
</p>


    <h3 class="encabezados">Algunos temas de su autoría</h3> 
    <div style="background-color: #422626; border-radius: 6px; padding: 10px 10px 1px 10px;">
    <p style="text-align: justify;">
      <i style="color: #ffffff;">  
    Busco Mi Sitio (pop) - Fue Casualidad (Fusión) - Solo intento darte Amor (Cumbia) -OriSha (Son) - Busco un Nuevo Amor 
    (Son) - La Carta (pop) - Perdido En Ti (pop) - Dime lo que Sientes (pop Rock) - Una Razón (Bachata) - Ilusionado (Pop 
    Rock) - Latidos de tu Corazón (Pop Rock) - Mi Guitarra (Balada) - Eres Especial (Balada) -Sígueme (Pop) - Mala (Fusión)
    - La Cola (Fusión) - Arroyando (Conga) 
     </i>
   </p>
   </div>





   </div>











 <script src=<?=  base_url("componentes/depen/jquery-3.6.0.min.js"); ?>></script>
    <script src=<?=  base_url("componentes/depen/popper.min.js"); ?>></script> 
    <script src=<?=  base_url("componentes/depen/js/bootstrap.js"); ?>></script>
    <script src=<?=  base_url("componentes/depen/datatables.min.js"); ?>></script> 
    <script src=<?=  base_url("componentes/miBiblioteca/reproducAudio/reproducAudio.js"); ?>></script>
    <script src=<?=  base_url("componentes/miCodi/js/principal.js"); ?>></script>
    <!-- <script src=<?=  base_url("componentes/miCodi/js/fondoDegradAnim.js"); ?>></script> -->
<script>

  var contenedor = document.getElementsByClassName("container");
  var anchoConte = contenedor[0].clientWidth;
  var anchoImagenCarru = anchoConte/3-5;


  $(".imagenCarru img").css({"height": anchoImagenCarru+"px",
                              "width": anchoImagenCarru+"px"});




  var tabalaMusi = document.getElementById("tabCancio");

  tabalaMusi.style.width = anchoConte+"px";

</script>


</body>
</html>