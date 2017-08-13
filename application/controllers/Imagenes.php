<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

  public function __construct(){
      parent::__construct();
      //$this->load->model("Cuartel_model");

  }

  public function Imagenes()
  {

     //$listarCurteles = $this->Cuartel_model->get_cuartel();
     
      $this->load->view('layout/admin/header');
      $this->load->view('admin/Imagenes/imagenes');
      $this->load->view('layout/admin/footer');
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
