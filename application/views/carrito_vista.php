<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/css/bootstrap.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/style.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/depen/datatables.min.css"); ?>>
    <link rel="stylesheet" href=<?=  base_url("componentes/miCodi/css/miEstilo.css"); ?>>
    <title>Document</title>





</head>


<body class="img-fluid" style="background-image: url('http://localhost/tienda-musi/componentes/img/fondo_gitarra.jpg');">
    
<div style="position: absolute; background-color: rgba(255, 255, 255, 0.685); width: 100%; height: 150%;"></div>    

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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form method="post" id="formuSubi" enctype="multipart/form-data">
      
      
     <input type="file" id="fileMusi" name="fileMusi">      
      




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="botonSubir">Save changes</button>
     </div>

        </form>


    </div>
  </div>
</div>

































<!-- barra de navegacion -->
<nav class="navbar navbar-expand-md bg-light">

<a href="" class="navbar-brand">
  Tú música
</a>

     <ul class="navbar-nav ml-auto">
         <li class="nav-item"><a href="" class="nav-link">Iniciar sesión</a></li>
         <li class="nav-item"><a class="nav-link">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Msubi">
            subir
            </button>
         </a></li>
         <li class="nav-item"><a class="nav-link">
            <button type="button" class="btn btn-light" id="carritoCom">
                <span class="icon-cart"></span>
                <span class="badge badge-primary badge-pill">2</span>
                </button>
         </a></li>
     </ul>

</nav>



<!-- carrusel -->
<div class="container sombra" style="background-color: white; height: 200px; padding: 0px;">
    

    <div id="carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
           <img src=<?=  base_url("componentes/img/1.jpg"); ?> alt="" width="1920" height="200">
        </div>
        <div class="carousel-item">
           <img src=<?=  base_url("componentes/img/2.jpg"); ?> alt="" width="1920" height="200">
        </div>
        <div class="carousel-item">
           <img src=<?=  base_url("componentes/img/3.jpg"); ?> alt="" width="1920" height="200">
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


<div class="container sombra" style="background-image: url('http://localhost/tienda-musi/componentes/img/fondo_gitarra.jpg'); width: 100%; height: 600px;">
    <br>
    <br>

<div class="row">
    

<div class="col">
    













    <table id="tabCancio" class="table table-responsive table-bordered">
        <thead>
            <th>id</th>
            <th>canción</th>
            <th>descarga</th>
            <th>Marcar</th>
        </thead>
        <tbody>

        </tbody>
    </table>









</div>


</div>





</div>




<table id="tabCarritoDeComp" class="table table-responsive table-bordered">
    <thead>
        <th>id</th>
        <th>canción</th>
        <th>descarga</th>
        <th>Marcar</th>
    </thead>
    <tbody>

    </tbody>
</table>







    <script src=<?=  base_url("componentes/depen/datatables.min.js"); ?>></script>
    <script src=<?=  base_url("componentes/miCodi/js/principal.js"); ?>></script>





</body>
</html>