<?php
class Kehoach_C extends CI_Controller{
     public function __construct()
{
    parent::__construct();
    $this->load->model('Load_GeoJson_M');
    $this->load->helper('file');
    $this->load->database();
}
    function index(){
           $this->Load_GeoJson_M->get_geojson();
//           $this->Load_GeoJson_M->get_khachsan();
//           $this->Load_GeoJson_M->get_tramxangdau();
//           $this->Load_GeoJson_M->get_tramyte();
           $this->Load_GeoJson_M->kehoach_thamkhao();
           $this->Load_GeoJson_M->kehoach_thamkhao_chitiet();
           $this->load->view('template/lapkehoach');
           $this->load->view('template/footer');    
       }

            function map_kehoach()
    {
       
        $this->load->view('template/map_kehoach');
    }
            function sidebar_kehoach()
    {
       
        $this->load->view('template/sidebar_kehoach');
    }
}
?>

