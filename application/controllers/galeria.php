<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class galeria extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();

	}

	public function index()
  	{
		$this->load->view('layout/Principal/header');
     	$this->load->view('front/galeria');
     	$this->load->view('layout/Principal/footer');
	}

	function _load_layout($template)
    {
      $this->load->view('layout/Principal/header');
      $this->load->view($template);
      $this->load->view('layout/Principal/footer');
    }

}
