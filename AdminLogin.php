<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";

class AdminLogin extends BaseController {
    
	private $SelfController = 'AdminLogin';
	public $HomeController = 'AdminPanel/dashboard';
    
    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        // echo  cryptPassowrd("itsc123");
       // exit();
     $this->load->view('include/login_header');
     $this->load->view('include/preloder');
     $this->load->view('include/login_nav');
     $this->load->view('admin_login');
      $this->load->view('include/login_footer');
  }

    function admin_register(){
    //     echo  cryptPassowrd("itsc123");
    //    exit();
     $this->load->view('include/login_header');
     $this->load->view('include/preloder');
     $this->load->view('include/login_nav');
     $this->load->view('admin_register');
      $this->load->view('include/login_footer');
    }
    
    function adminRegisterHandler(){


        //validation of Registertion form 
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Mail', 'required');
        $this->form_validation->set_rules('cnic', 'CNIC', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    
        if ($this->form_validation->run()) {
    
            $data = [
    
                'FIRST_NAME' => $this->input->post('name'),
                'EMAIL' => $this->input->post('email'),
                'CNIC_NO' => $this->input->post('cnic'),
                'PASSWORD' => $this->input->post('password'),
            ];
    
            $result = $this->User_model->insert_admin($data);
            if ($result == true) {
                echo "<script>alert('Registerd Successfully');</script>";
            } else {
                echo "<script>alert('Not Registerd');</script>";
            }
        } else {
            if ($this->form_validation->run() == false) {
                echo validation_errors();
            }
        }
    }

	function set_admission_role ($user_admission_role)
	{
		$this->session->set_userdata($this->user_role, $user_admission_role[0]);
	}
    function adminLoginHandler(){

        $this->load->model('User_model');

        if(isset($_POST['login'])
            &&isset($_POST['password'])
            &&isset($_POST['cnic'])){

            $cnic =isValidData($this->input->post('cnic',TRUE));
            $password = isValidData($this->input->post('password',TRUE));

            $hashpassword = cryptPassowrd($password);
            // echo $hashpassword;
            // exit();
            if($cnic&&$password){

                $user = $this->User_model->getUserByCnic($cnic);
				
                if($user){
                    if(strcmp($hashpassword,$user['PASSWORD'])===0){
						$userId=$user['USER_ID']; // recieved user_id, now pass this id to get and verify user_role.
                        //$user_role_object = $this->User_model->getUserRoleByUserId($userId);
                        $user_admission_role = $this->User_model->getUserAdmissionRoleByUserId($userId);
						
						if($user_admission_role!=null || !(empty($user_admission_role))){
									
                            $session_data=$this->getSessionData($user_admission_role[0],$user);
                            
							$this->session->set_userdata($this->SessionName, $session_data);
                            $this->set_admission_role($user_admission_role);
                           
								redirect(base_url().$this->HomeController);    
                            
                        }else{
                            $error =array('TYPE'=>'ERROR','MSG'=>'Your are un-authorized person, please stay away');
                            $this->session->set_flashdata('ALERT_MSG', $error);
                            redirect(base_url().$this->SelfController);
                            //UN-AUTHORIZED USER
                        }
                    }else{
                        $error =array('TYPE'=>'ERROR','MSG'=>'Invalid Password');
                        $this->session->set_flashdata('ALERT_MSG', $error);
                        redirect(base_url().$this->SelfController);
                        //invalid password
                    }
                }else{
                    $error =array('TYPE'=>'ERROR','MSG'=>'Invalid Cnic No');
                    $this->session->set_flashdata('ALERT_MSG', $error);
                    redirect(base_url().$this->SelfController);
                    //invalid Cnic
                }
            }
            else{
                $error =array('TYPE'=>'ERROR','MSG'=>'Invalid Request Please Must Enter Cnic And Password ');
                $this->session->set_flashdata('ALERT_MSG', $error);
                redirect(base_url().$this->SelfController);
            }
        }else{
            $error =array('TYPE'=>'ERROR','MSG'=>'Invalid Form Request ');
            $this->session->set_flashdata('ALERT_MSG', $error);
            redirect(base_url().$this->SelfController);
        }
    }

    private function getSessionData($user,$user_profile)
	{
        $session_data =array('USER_ID'=>$user['USER_ID'],'ROLE_NAME'=>$user['ROLE_NAME'],'KEYWORD'=>$user['KEYWORD'],'ACTIVE'=>$user['ACTIVE'],'FIRST_NAME'=>$user_profile['FIRST_NAME'],'LAST_NAME'=>$user_profile['LAST_NAME'],'EMAIL'=>$user_profile['EMAIL'],'CNIC_NO'=>$user_profile['CNIC_NO'],'PROFILE_IMAGE'=>$user_profile['PROFILE_IMAGE'],'PROFILE'=>$user_profile);
        return $session_data;
    }

    protected function verify_login()
	{
		if((!$this->session->has_userdata($this->SessionName))){
			redirect(base_url().$this->SelfController);
			exit();
		}
	}
	
	
	protected function verify_path ($path,$side_bar_data)
	{
			foreach ($side_bar_data as $p){
				if ($path == null)
				{
					$self = $_SERVER['PHP_SELF'];
					$path = explode('index.php/',$self);
				}
				if ($p['link'] == $path)
				{
					return true;
				}
			}
			exit("<h2>Access Prohibited</h2>");
	}
	

	
}//class
