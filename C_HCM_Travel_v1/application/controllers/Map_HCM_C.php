<?php
class Map_HCM_C extends CI_Controller{
     public function __construct()
{
    parent::__construct();
    $this->load->model('Load_GeoJson_M');
    $this->load->helper('file');
    $this->load->database();
}
    function index(){
           $this->Load_GeoJson_M->get_geojson();
           $this->Load_GeoJson_M->tour_lienquan();
           $this->Load_GeoJson_M->get_khachsan();
           $this->Load_GeoJson_M->get_tramxangdau();
           $this->Load_GeoJson_M->get_tramyte();
           $this->load->view('template/header');
           $this->load->view('template/footer');    
       }
        function sidebar()
    {
        $this->load->view('template/sidebar');
    }
  function detail()
    {
        $this->load->view('template/detail');
        //$this->Load_GeoJson_M->get_khachsan($id);    
    }
    
    function map()
    {
        $this->load->view('template/map');
    }
//     function location()
//    {
//       
//        $this->load->view('template/map_location');
//    }
         function map_detail()
    {
       
        $this->load->view('template/map_detail');
    }
         function map_directions()
    {
       
        $this->load->view('template/google_directions');
    }
            function map_kehoach()
    {
       
        $this->load->view('template/map_kehoach');
    }
            function sidebar_kehoach()
    {
       
        $this->load->view('template/sidebar_kehoach');
    }
             function lapkehoach()
    {
       
        $this->load->view('template/lapkehoach');
    }
    
      function detail_directions()
    {
        $this->load->view('template/detail_directions');
        
    }
}
?>

