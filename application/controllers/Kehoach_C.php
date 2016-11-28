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
           $this->Load_GeoJson_M->kehoach_thamkhao();
           $this->Load_GeoJson_M->kehoach_thamkhao_chitiet();
            $this->Load_GeoJson_M->kehoach_thamkhao_chitiet_duongdi();
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
     function map_kehoach_detail()
    {

        $this->load->view('template/map_kehoach_detail');
    }
    function sidebar_kehoach_detail()
    {

        $this->load->view('template/sidebar_kehoach_detail');
    }
}
?>

