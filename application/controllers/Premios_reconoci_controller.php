<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premios_reconoci_controller extends CI_Controller 
{
    function __construct()
    {
     parent::__construct(); 
     $this->load->helper('form');
     $this->load->model('Premios_reconoci_Model');
     $this->load->helper('url');
    }



function mostrarPremiosReconoci()
{
  $datos = $this->Premios_reconoci_Model->mostrarPremiosReconoci();
  $datosJson = json_encode($datos);
  echo $datosJson;
}


function insertarPremiosRecono()
{
   $fechaInsertada = $_POST["fechaInsertada"];
   $contenidoInsertado = $_POST["contenidoInsertado"];

   $this->Premios_reconoci_Model->insertarPremiosRecono($fechaInsertada,$contenidoInsertado);
}



function editarPremiosRecono()
{
  $fechaEditada = $_POST["fechaEditada"];
  $contenidoEditado = $_POST["contenidoEditado"];
  $idParaEditar = $_POST["idParaEditar"];

 $this->Premios_reconoci_Model->editarPremiosRecono($fechaEditada,$contenidoEditado,$idParaEditar);
}


function borrarPremiosRecono()
{
  $id = $_POST["idParaBorrar"];
  $this->Premios_reconoci_Model->borrarPremiosRecono($id);
}





}?>    