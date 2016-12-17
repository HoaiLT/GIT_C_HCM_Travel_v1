<?php
class Map_HCM_C extends CI_Controller{
     public function __construct()
{
    parent::__construct();
    $this->load->model('Load_GeoJson_M');
    $this->load->model('User_login_M');
    $this->load->helper('file');
    $this->load->database();
}
    function index(){
           $this->Load_GeoJson_M->get_geojson();
           $this->Load_GeoJson_M->tour_lienquan();
           $this->Load_GeoJson_M->get_khachsan();
           $this->Load_GeoJson_M->get_tramxangdau();
           $this->Load_GeoJson_M->get_tramyte();
           $this->Load_GeoJson_M->full_list_tour();
           $this->Load_GeoJson_M->loai_place();
           $this->Load_GeoJson_M->hinh_anh();
           $this->load->view('template/header');
           $this->load->view('template/footer');
       }

  function waypoint_map()
    {
        $this->load->view('template/waypoint_map');
        //$this->Load_GeoJson_M->get_khachsan($id);
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
        function c_tour(){
        $this->load->view('template/tour');
    }
    function c_detail_tour(){
        $this->load->view('template/detail_tour');
    }

        function page_tour_detail(){
        $ma = $this->input->get('ma_tour',TRUE);
        $data['t'] = $this->Load_GeoJson_M->detail_tour($ma);
//        foreach ($data as $key) {
//            echo $key['ma_tour'];
//        }
       $this->load->view('template/page_tour',$data);
    }

     function login(){
        // Include the facebook api php libraries
        include_once APPPATH."libraries/facebook.php";

        // Facebook API Configuration
        $appId = '1826563760920222';
        $appSecret = '07e829bda1cf442f906344fafac3c7eb';
        $redirectUrl =  base_url().'User_login_C';
        $fbPermissions = 'email';

        //Call Facebook API
        $facebook = new Facebook(array(
          'appId'  => $appId,
          'secret' => $appSecret

        ));
        $fbuser = $facebook->getUser();

        if ($fbuser) {
            $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
            // Insert or update user data
            $userID = $this->User_login_M->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
        $this->load->view('Template/facebook_login',$data);

    }

     function logout() {
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('#/Map_HCM_C');
    }
}
?>

