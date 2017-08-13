<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();

    $this->load->model("Imagen_Model");

	}

	public function inicio()
  {
      $listaImagen=$this->Imagen_Model->ImagenListar();
		  $this->load->view('layout/Principal/header');
     	$this->load->view('front/inicio', ['listaImagen'=>$listaImagen]);
     	$this->load->view('layout/Principal/footer');

	}

	function _load_layout($template)
    {
      $this->load->view('layout/Principal/header');
      $this->load->view($template);
      $this->load->view('layout/Principal/footer');
    }

}
