<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagen_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function ImagenListar()
    {
        $data=$this->db->query("select * from imagen");

        return $data->result();
    }
    function insert($data)
    {
		$this->db->insert("imagen", $data);
        return true;
    }

    function eliminar($id)
    {
        $eliminar=$this->db->query("delete from imagen where id='".$id."'");
        return true;
    }
}