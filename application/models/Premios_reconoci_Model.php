<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premios_reconoci_Model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


function mostrarPremiosReconoci()
{
    $datos = $this->db->query("SELECT * FROM premios_y_reconocimientos ORDER BY id DESC");
    if ($datos->result()) 
      return $datos->result();
    else
      return false;  
}


function insertarPremiosRecono($fechaInsertada,$contenidoInsertado)
{
  $this->db->insert("premios_y_reconocimientos", array("fecha"=>$fechaInsertada,
                                                       "contenido"=>$contenidoInsertado));
}



function editarPremiosRecono($fechaEditada,$contenidoEditado,$idParaEditar)
{
  $this->db->where("id", $idParaEditar);
  $this->db->update("premios_y_reconocimientos",array("fecha"=>$fechaEditada,
                                                      "contenido"=>$contenidoEditado));
}


function borrarPremiosRecono($id)
{
  $this->db->query("DELETE FROM premios_y_reconocimientos WHERE id = '$id'");
}



}?>