<?php
class Kehoach_C extends CI_Controller{
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
            $this->Load_GeoJson_M->diadiem_kehoach();
           $this->Load_GeoJson_M->kehoach_thamkhao();
           $this->Load_GeoJson_M->kehoach_thamkhao_chitiet();
            $this->Load_GeoJson_M->kehoach_thamkhao_chitiet_duongdi();
            $this->Load_GeoJson_M->diem_dau();
             $this->Load_GeoJson_M->diem_cuoi();
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
     function login(){
        // Include the facebook api php libraries
        include_once APPPATH."libraries/facebook.php";
        // Facebook API Configuration
        $appId = '1826563760920222';
        $appSecret = '07e829bda1cf442f906344fafac3c7eb';
        $redirectUrl =  base_url().'User_login1_C';
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
        redirect('Kehoach_C#/Kehoach_C');
    }
}
?>

