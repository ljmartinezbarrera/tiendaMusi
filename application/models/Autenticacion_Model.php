<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacion_Model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


// Insertar Usuario
function guardarRegis($correoRegi, $nombreRegi, $contrasenaRegi)
{   
$this->db->insert("usuarios", array("correo"=>$correoRegi,
                                    "nombre"=>$nombreRegi,
                                    "contrase"=>$contrasenaRegi,
                                    "rol"=>'Cliente'));
}



//* ver el rol ***********************
function verRol($datos)
{
    $nombre = $datos['nombre'];
    $dato = $this->db->query("SELECT rol FROM usuarios WHERE nombre = '$nombre'");

    if ($dato->result())
      return $dato->result();
    else 
      return false;  
}


}
?>