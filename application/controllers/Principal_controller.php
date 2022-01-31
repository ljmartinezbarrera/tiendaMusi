<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_controller extends CI_Controller 
{
    function __construct()
    {
     parent::__construct(); 
     $this->load->helper('form');
     $this->load->model('Principal_Model');
     $this->load->helper('url');
    }

    
function index()
{
    $this->load->view('principal_vista');
    $this->load->view('premios_reconoci_vista');
    $this->load->view('pie_vista');
    $this->load->view('autenticacion_vista');
}







//* Guarda la música *********************************************** 
function subirMusica()
{
    $audio = $_FILES["fileMusi"];
    $precio = $_POST["precio"];


    $nomb_encript = md5($audio["tmp_name"]).".mp3";
    $ruta = "./canciones/".$nomb_encript;
    move_uploaded_file($audio["tmp_name"],$ruta);
     
     
//*comprueba que el checkbox esta marcado,
//? ya que si no lo está, da un error, porque el valor del name no existe
//? por eso se tiene que verificar con isset()
    if (isset($_POST["nombreFichero"])) 
    {
      $this->Principal_Model->inserMusi($audio['name'], $ruta, $precio);
    }
    else
    {
      $nomFich = $_POST["nombreCancion"];
      $this->Principal_Model->inserMusi($nomFich, $ruta, $precio);
    }
//}
}







function mostrarCancion()
{
  $dato=$this->Principal_Model->mostrarCancion();
  $datoJson=json_encode($dato);
  $datoFormatoDatTabl='{"data":'.$datoJson.'}';
  echo $datoFormatoDatTabl;
}













function idTabaCancion()
{
  $id = $this->Principal_Model->idTabaCancion();


  $taba = $id[0];
  $cantidadTotal = $id[1];

 $resultado = array();

  for ($i=0; $i < $cantidadTotal ; $i++) { 
  
    $resultado[count($resultado)] = $taba[$i]['id'];

  }


  echo json_encode($resultado);

}





function DatosCarroCompras()
{



$a = json_decode($_POST["arregloMar"]);


$tabla = $this->Principal_Model->carroCompras($a);


if ($tabla) 
{
$tablaC = json_encode($tabla);

$tablaCarri = '{"data":'.$tablaC.'}';

echo $tablaCarri;
}
else
{
  echo '{"data":[]}';
}




}




// cantidad total de pedidos en el carrito******************************************


function notifiCarrito()
{
  $a = json_decode($_POST["arregloMar"]);

  $notifi = $this->Principal_Model->notifiCarrito($a);

  echo $notifi;
}



function editarCancion()
{
  $id = $_POST["idOculEdi"];
  $pre = $_POST["ediPrecio"];
  $audio = $_FILES["ediFileMusi"];

  $dirAntig = $this->Principal_Model->direccioAntiga($id);
  unlink($dirAntig[0]->nom_encriptado);

  $nomb_encript = md5($audio["tmp_name"]).".mp3";
  $ruta = "./canciones/".$nomb_encript;
  move_uploaded_file($audio["tmp_name"],$ruta);




  if (isset($_POST["EdiNombreFichero"])) 
  {
    $this->Principal_Model->ediMusi($audio['name'], $ruta, $pre, $id);
  }
  else
  {
    $nomCan = $_POST["EdiNombCancion"];
    $this->Principal_Model->ediMusi($nomCan, $ruta, $pre, $id);
  }


}

function editarTodoMenosCancion()
{
  $id = $_POST["idOculEdi"];
  $pre = $_POST["ediPrecio"];
  $nombre = $_POST["EdiNombCancion"];
  $this->Principal_Model->editarTodoMenosCancion($pre, $id, $nombre);
}



//Borrar cancion*********************************************************************

function borrarCancion()
{
   $id = $_POST["idBorrar"];

   $dirAntig = $this->Principal_Model->direccioAntiga($id);
   unlink($dirAntig[0]->nom_encriptado);
   
   $this->Principal_Model->borrarCancion($id);

}



























}

?>