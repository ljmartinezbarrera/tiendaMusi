<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarBiografia_Model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }




 //*   
function mostrarText()
{
    $dato = $this->db->query("SELECT biografia FROM biografia WHERE id = '1'");
    if($dato->result())
        return $dato->result();
    else
        return false;
}




//* guardar biografiá *******************************************************************

function guardarBiografia($biog)
{
   $this->db->where("id",'1');
   $this->db->update("biografia", array("biografia"=>$biog));
}


} 
?>   