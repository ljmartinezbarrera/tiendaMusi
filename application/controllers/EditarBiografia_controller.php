<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarBiografia_controller extends CI_Controller 
{
    function __construct()
    {
     parent::__construct(); 
     $this->load->helper('form');
     $this->load->model('EditarBiografia_Model');
     $this->load->helper('url');
    }





function VistaEditarBiografia()
{
    $this->load->view("EditarBiografia_vista");
}


//* Mostrar Texto *************************************
function mostrarText()
{
  $dato = $this->EditarBiografia_Model->mostrarText();
  echo $dato[0]->biografia;


}



//* guardar biografía *********************************

function guardarBiografia()
{
  $biog = $_POST["biografia"];

  $this->EditarBiografia_Model->guardarBiografia($biog); 
}










}
?>