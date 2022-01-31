<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }




    
function datosUsuarios()
{
    $datos = $this->db->query("SELECT id, nombre, correo, rol FROM usuarios");

    if ($datos->result()) 
        return $datos->result();
    else 
        return false;    
    
}






//* eliminar usuario *****************************************************

function eliminarUsuario($idUsu)
{
   $this->db->query("DELETE FROM usuarios WHERE id = '$idUsu'");
}





//* insertar usuario *******************************************************

function insertarUsuario($datoUsu)
{
    $this->db->insert("usuarios",array("correo"=>$datoUsu["inserCorreo"],
                                       "nombre"=>$datoUsu["inserNombre"],
                                       "contrase"=>$datoUsu["inserContrase"],
                                       "rol"=>$datoUsu["selecRol"],));
}





//* editar usuario *******************************************************

function editarUsuario($datoUsu)
{   
    if ($datoUsu["editContra"] != "")
    {
        $this->db->where("id",$datoUsu["editId"]); 
        $this->db->update("usuarios",array("contrase"=>$datoUsu["editContra"]));
    }

    $this->db->where("id",$datoUsu["editId"]); 
    $this->db->update("usuarios",array("correo"=>$datoUsu["editCorreo"],
                                       "nombre"=>$datoUsu["editNombre"],
                                       "rol"=>$datoUsu["editSelecRol"],));
}














}
?>