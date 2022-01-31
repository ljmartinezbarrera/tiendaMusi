<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller 
{
    function __construct()
    {
     parent::__construct(); 
     $this->load->helper('form');
     $this->load->model('Usuario_Model');
     $this->load->helper('url');
    }



function vistaUsuario()
{
   $this->load->view('Usuario_vista');
}

// devuelve los datos de usuarios para data tabla ******************************************************
function datosUsuarios()
{
    $data = $this->Usuario_Model->datosUsuarios();

    echo '{"data":'.json_encode($data).'}';
}




//* eliminar usuario ************************************************************

function eliminarUsuario()
{
    $idUsu = $_POST["idUsu"];
    $this->Usuario_Model->eliminarUsuario($idUsu);
}





//* insertar usuario ***************************************************************

function insertarUsuario()
{
    $datoUsu = array("inserCorreo" => $_POST["inserCorreo"],
                     "inserNombre" => $_POST["inserNombre"],
                     "inserContrase" => $_POST["inserContrase"],
                     "selecRol" => $_POST["selecRol"],);
                     
    $this->Usuario_Model->insertarUsuario($datoUsu);
}




//* editar usuario *****************************************************************
function editarUsuario()
{
    $datoUsu = array("editId" => $_POST["editId"],
                     "editNombre" => $_POST["editNombre"],
                     "editCorreo" => $_POST["editCorreo"],
                     "editContra" => $_POST["editContra"],
                     "editSelecRol" => $_POST["editSelecRol"]);
                     
    $this->Usuario_Model->editarUsuario($datoUsu);
}


















}
?>    

