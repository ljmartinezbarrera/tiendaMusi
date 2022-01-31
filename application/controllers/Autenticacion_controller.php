<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacion_controller extends CI_Controller 
{
    function __construct()
    {
     parent::__construct(); 
     //$this->load->helper('form');
     $this->load->model('Autenticacion_Model');
     $this->load->helper('url');
    // $this->load->library(array('form_validation'));
     //PARA BOOSTRAP  
    // $this->load->view('EstilosBus_Vista');
    }



function guardarRegis()
{
$correoRegi = $_POST["correoRegi"];
$nombreRegi = $_POST["nombreRegi"];
$contrasenaRegi = $_POST["contrasenaRegi"];

$this->Autenticacion_Model->guardarRegis($correoRegi,$nombreRegi,$contrasenaRegi);
 
}


//iniciar sesión*******************************************

function iniciarSesion()
{
    $newdata = array('nombre' => $_POST['nombre'],
                    'contra' => $_POST['contrasena']);


    $datoRol = $this->Autenticacion_Model->verRol($newdata);

    if ($datoRol) 
    {   
        $this->session->set_userdata($newdata);

        $datoUsu = array('nombre' => $this->session->userdata('nombre'),
                        'rol' => $datoRol[0]->rol,
                        'existe' => "true");

        echo  json_encode($datoUsu);      
    }
    else
    {
        $datoUsu = array('existe' => "false");
        
        echo  json_encode($datoUsu);
    }
}



//* ver si es administrador ***********************************
function esAdmin()
{
     if ($this->session->userdata('nombre')) 
     {
        $newdata = array('nombre' => $this->session->userdata('nombre'));

        $datoRol = $this->Autenticacion_Model->verRol($newdata);

        if ($datoRol[0]->rol == 'Administrador') 
        {
            $res = array('esAdmin' => "si");
            echo  json_encode($res);
        }
        else
        {
            $res = array('esAdmin' => "no");
            echo  json_encode($res);
        }  
     }
     else
     {
        $res = array('esAdmin' => "no");
        echo  json_encode($res);
     } 
}





//* Obtener datos de la sección *************************************************
function datosSesion()
{
    $datosSesion = array('nombre' => $this->session->userdata('nombre'));
    echo json_encode($datosSesion);
}





}
?>    
