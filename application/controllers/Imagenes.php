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

	function eliminar()
    {
        if ($this->input->is_ajax_request()) 
        {
            $id=$this->input->post('id');
            $this->Imagen_Model->eliminar($id);
            echo json_encode($Data);
        }
    }  
	public  function insertar()
	{
/*if($_POST)
{
$hdIdcategoria = $this->input->post('hdIdcategoria');
$hdIdPasaje      = $this->input->post('hdIdPasaje');
$nombre_cuartel  = $this->input->post('Cuartel');
for ($i=0; $i <count($hdIdcategoria) ; $i++) { 
$datas = array(
"nombre_cuartel" =>$nombre_cuartel[$i],
"id_categoria" =>$hdIdcategoria[$i],
"id_pasaje" => $hdIdPasaje[$i],     
);
$this->Cuartel_model->AddCuartel($datas);
}
echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'nombre_cuartel' => $nombre_cuartel]);exit;
}
$categoria= $this->Cuartel_model->Get_Categoria();
$pasajes= $this->Cuartel_model->Get_pasaje();
//var_dump($pasajes);exit();
$this->load->view('admin/Cuartel/insertar',['categoria' => $categoria ,'pasajes' => $pasajes]);*/
}

function _load_layout($template)
{
	$this->load->view('layout/admin/header');
	$this->load->view($template);
	$this->load->view('layout/admin/footer');
}

}
