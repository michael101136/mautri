<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
		parent::__construct();
		$this->load->model("Imagen_Model");

	}
	public function Imagenes()
	{

		$listaImagen=$this->Imagen_Model->ImagenListar();

		$this->load->view('layout/admin/header');
		$this->load->view('admin/Imagenes/imagenes', ['listaImagen'=>$listaImagen]);
		$this->load->view('layout/admin/footer');
	}
	   public  function insertar()
   {
       if($_POST)
       {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);

            if ( ! $this->upload->do_upload('userfileImagenes'))
              {

                $error="ERROR NO SE CARGO LA IMAGEN";
                echo $error;
              }
              else
              {
                $descripcion=$this->input->post('Descripcionimegen');
                $datos = array(
                  "nombre" => $this->upload->file_name,
                  "descripcion" => $descripcion,
                  );
                  if($this->Imagen_Model->insert($datos) == true)
                  {
                    echo "SE REGISTRO LA IMAGEN";
                    redirect('Imagenes/Imagenes');
                  }
                  
                }
          }                 
               
                  
      $this->load->view('admin/Imagenes/insertar');
   }

	function eliminar()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id=$this->input->post('id');
            $this->Imagen_Model->eliminar($id);
            echo json_encode($Data);
        }
    }  
     function _load_layout($template)
    {
      $this->load->view('layout/admin/header');
      $this->load->view($template);
      $this->load->view('layout/admin/footer');
    }

}

