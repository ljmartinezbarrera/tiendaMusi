<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_Model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


 
function inserMusi($nom, $ruta, $precio)
{
   $this->db->insert('canciones',array('nombre'=>$nom,
                                       'nom_encriptado'=>$ruta,
                                       'precio'=>$precio));
}









function idSeleccionados($a)
{
$resultado = "";

    for ($i=0; $i < count($a)-1; $i++) { 
        $resultado .= "id = '".$a[$i]."' OR ";
    }

$resultado .= "id = '".$a[count($a)-1]."'";

return $resultado;
}





function mostrarCancion()
{





    $tabla=$this->db->query("SELECT * FROM canciones");
    if($tabla->result())
     return $tabla->result();
    else
     return false; 
}






function idTabaCancion()
{
    
  $id = $this->db->query("SELECT id FROM canciones");

  $re = array($id->result_array(),$id->num_rows());

  if($id->result())
  return $re;  
 else
  return false; 
  
}






function carroCompras($a)
{

if (count($a)==0) 
{
    return false;
}
else
{
    $idSel = $this->idSeleccionados($a);

    $tabla=$this->db->query("SELECT * FROM canciones WHERE $idSel");

    if($tabla->result())
     return $tabla->result();
    else
     return false; 
}

}

// cantidad total de pedidos en el carrito******************************************
function notifiCarrito($a)
{
   // $a = array(1,2);
    $idSel = $this->idSeleccionados($a);

    $tabla=$this->db->query("SELECT * FROM canciones WHERE $idSel");

    if($tabla->result())
     return $tabla->num_rows();
    else
     return false; 

}


//Editar tabla canciones ************************************************************

function direccioAntiga($id)
{
   $dato = $this->db->query("SELECT nom_encriptado FROM canciones WHERE id = '$id'");
   if ($dato->result()) 
       return $dato->result();
   else 
       return false;     
}

function ediMusi($nombre, $ruta, $precio, $id)
{
   $this->db->where("id", $id);
   $this->db->update("canciones",array("nombre"=>$nombre,
                                       "nom_encriptado"=>$ruta,
                                       "precio"=>$precio));
}

function editarTodoMenosCancion($precio, $id, $nombre)
{
    $this->db->where("id", $id);
    $this->db->update("canciones",array("precio"=>$precio, "nombre"=>$nombre));
}

    

//borrar cancion ************************************************************************

public function borrarCancion($id)
{
    $this->db->query("DELETE FROM canciones WHERE id = '$id'");
}




}
?>