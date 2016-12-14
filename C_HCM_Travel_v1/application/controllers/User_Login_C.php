<?php 
class User_Login_C extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('User_login_M');
    }
    
     function index(){
		// Include the facebook api php libraries
		include_once APPPATH."libraries/facebook.php";
		
		// Facebook API Configuration
		$appId = '1826563760920222';
		$appSecret = '07e829bda1cf442f906344fafac3c7eb';
		$redirectUrl = base_url().'User_Login_C/';
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
		 redirect('#/Map_HCM_C');
    }
}
