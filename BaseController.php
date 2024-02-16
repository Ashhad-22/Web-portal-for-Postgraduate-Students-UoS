<?php
/**
 * Created by PhpStorm.
 * User: Kashif Shaikh
 * Date: 3/28/2022
 * Time: 9:12 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller
{

    public $HomeController = 'dashboard';
    public $SessionName = 'USER_LOGIN_FOR_JOB';
    public $file_size = 300;
    public $LoginController = "login";
    public $AdminLoginController = "AdminLogin";
	
	public $user_role	= 'ADMIN_ROLE';
    public function __construct()
    {
        parent::__construct();

    }
    public function view($view,$data){
        if(!isset($data['side_bar_values'])){
            $data['side_bar_values'] =$this->getSideBarValues();
        }
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['WEBSITE_NAME'] = $website_obj['DESCRIPTION']; 

        $about_data = $this->Configuration_model->getConfiguration('ABOUT');
        $data['ABOUT'] = $about_data['DESCRIPTION'];

        $director_message = $this->Configuration_model->getConfiguration('DIRECTOR_MESSAGE');
        $data['director_message'] = $director_message['DESCRIPTION'];

        $mission = $this->Configuration_model->getConfiguration('MISSION');
        $data['MISSION'] = $mission['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        // $logo = $this->Configuration_model->getConfiguration('LOGO');
        // $data['LOGO'] = $logo['LOGO']; 
        $this->load->view('include/header',$data);
        $this->load->view('include/preloder');
        $this->load->view('include/side_bar',$data);
        $this->load->view('include/nav',$data);
        $this->load->view($view,$data);
        $this->load->view('include/footer_area',$data);
        $this->load->view('include/footer',$data);

    }
    public function getSideBarValues(){
        $side_bar_values = array(
            array('is_submenu' => 0,
            'is_tab_base'=>'N',
            'value' => 'Dashboard',
            'link' => "dashboard",
            'class' =>'educate-icon educate-home icon-wrap'),array('is_submenu' => 0,
            'is_tab_base'=>'N',
            'value' => 'Profile',
            'link' => "profile",
            'class' =>'educate-icon educate-home icon-wrap'),array('is_submenu' => 0,
            'is_tab_base'=>'N',
            'value' => 'Available Jobs',
            'link' => "available_job",
            'class' =>'educate-icon educate-home icon-wrap'),array('is_submenu' => 0,
            'is_tab_base'=>'N',
            'value' => 'Logout',
            'link' => "logout",
            'class' =>'educate-icon educate-pages icon-wrap')
        );

        return $side_bar_values;

    }
    public function upload_image($index_name,$image_name,$max_size = 10000,$path = './uploads/',$con_array=array())
    {

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = $max_size;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['file_name']			= $image_name;
        $config['overwrite']			= true;

        if(isset($this->upload)){
            $this->upload =  null;
        }
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($index_name))
        {
            return array("STATUS"=>false,"MESSAGE"=> $config['upload_path'].$this->upload->display_errors());
        }
        else
        {
            $image_data = $this->upload->data();

            $image_path = $image_data['full_path'];

            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_path;
            $config['create_thumb'] = FALSE;
            if(!count($con_array)){
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 180;
                $config['height']       = 260;
            }
            else{
                if(isset($con_array['maintain_ratio'])){
                    $config['maintain_ratio']=$con_array['maintain_ratio'];
                }

                if(isset($con_array['width'])){
                    $config['width']=$con_array['width'];
                }

                if(isset($con_array['height'])){
                    $config['height']=$con_array['height'];
                }
            }

            if(isset($this->image_lib)){
                $this->image_lib =  null;
            }

            if(isset($con_array['resize'])){
                if($con_array['resize']===true){
                    $this->load->library('image_lib',$config);

                    $this->image_lib->resize();
                }
            }else{
                $this->load->library('image_lib',$config);

                $this->image_lib->resize();

            }



            // exit("YES");
            return array("STATUS"=>true,"IMAGE_NAME"=>$image_data['file_name']);

        }
    }
     public function getValidationArray(){
        $must_provide = "Must Be Provided";
        $must_select = "Must Be Provided";
        $must_upload = "Must Upload";
        $qualification =  array(2);
        $qualification_error_msg  = array("Matriculation information is missing. Please must add");

        $validation_array = array(
            "users_reg" =>array(
            "FIRST_NAME"=>array("regex"=>"[A-Za-z]{2}","error_msg"=>"Full Name $must_provide as per Matriculation"),
            "FNAME"=>array("regex"=>"[A-Za-z]{2}","error_msg"=>"Father $must_provide"),
            "GENDER"=>array("regex"=>"[A-Za-z]{1}","error_msg"=>"Gender $must_select"),
            "MOBILE_NO"=>array("regex"=>"[0-9]{10}","error_msg"=>"Mobile Number $must_provide"),
            "HOME_ADDRESS"=>array("regex"=>"[A-Za-z0-9\-\\,.]+","error_msg"=>"Home Address $must_provide"),
            "PERMANENT_ADDRESS"=>array("regex"=>"[A-Za-z0-9\-\\,.]+","error_msg"=>"Parmanent Address $must_provide"),
            "DATE_OF_BIRTH"=>array("regex"=>"[a-zA-Z]|\d|[^a-zA-Z\d]","error_msg"=>"Date of Birth $must_provide"),
            "MOBILE_CODE"=>array("regex"=>"[0-9]{4}","error_msg"=>"Mobile $must_select"),
            "COUNTRY_ID"=>array("regex"=>"[0-9]","error_msg"=>"Country $must_select"),
            "PROVINCE_ID"=>array("regex"=>"[0-9]","error_msg"=>"Province $must_select"),
            "DISTRICT_ID"=>array("regex"=>"[0-9]","error_msg"=>"District $must_select"),
            "PROFILE_IMAGE"=>array("regex"=>"[a-zA-Z]|\d|[^a-zA-Z\d]","error_msg"=>"Profile Image $must_upload"),
            "DOMICILE_IMAGE"=>array("regex"=>"[a-zA-Z]|\d|[^a-zA-Z\d]","error_msg"=>"Domicile Image $must_upload"),
            "DOMICILE_FORM_C_IMAGE"=>array("regex"=>"[a-zA-Z]|\d|[^a-zA-Z\d]","error_msg"=>"Domicile Form C Image $must_upload"),
            "EMAIL"=>array("regex"=>"^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$","error_msg"=>"Email $must_provide"),
            "RELIGION"=>array("regex"=>"[A-Za-z]{2}","error_msg"=>"Religion $must_provide"),
             "CNIC_NO"=>array("regex"=>"[0-9]{13}","error_msg"=>"CNIC No $must_provide"),
             "CNIC_FRONT_IMAGE"=>array("regex"=>"[a-zA-Z]|\d|[^a-zA-Z\d]","error_msg"=>"CNIC Front / B-Form Image $must_upload"),
                "CNIC_BACK_IMAGE"=>array("regex"=>"[a-zA-Z]|\d|[^a-zA-Z\d]","error_msg"=>"CNIC Back / B-Form  Image $must_upload"),

            ),
            "qualifications"=>array(
                "DEGREE_ID" =>$qualification,
                "DEGREE_ID_MSG" =>$qualification_error_msg
            ),

        );
        return $validation_array;
    }

    public function isValidProfileInformation($user_fulldata){
        //calling private method get validationArray
        $validation_array = $this->getValidationArray();

        $user_reg_validation = $validation_array['users_reg'];

        $qualifications_validation = $validation_array['qualifications'];

        $users_reg = $user_fulldata['users_reg'];
        $qualifications = $user_fulldata['qualifications'];
        $qualification_error_msg = $validation_array['qualifications']['DEGREE_ID_MSG'];

        $error = "";
        foreach($user_reg_validation as $column=>$value){


            if(preg_match("/".$value['regex']."/", $users_reg[$column])){

            }else{
                $error.="<div class='text-danger'>{$value['error_msg']}</div>";

            }
        }


        foreach($qualifications as $qual){

            foreach($qualifications_validation['DEGREE_ID'] as $k=>$val){
                if($qual['DEGREE_ID']==$val){
                    unset($qualifications_validation['DEGREE_ID'][$k]);
                    unset($qualification_error_msg[$k]);

                    break;
                }
            }
        }
        foreach ($qualification_error_msg as $error_msg){
            $error.="<div class='text-danger'>{$error_msg}</div>";
        }



        return $error;
        //prePrint($qualification_error_msg);

    }

    public  function isValidApplication($user_fulldata,$application){
        $error = $this->isValidProfileInformation($user_fulldata);
        if($error==""){
            $dob = $user_fulldata['users_reg']['DATE_OF_BIRTH'];
            $weight = $user_fulldata['users_reg']['WEIGHT'];
            $chest = $user_fulldata['users_reg']['CHEST'];
            $height = $user_fulldata['users_reg']['HEIGHT'];
            $any_disability = $user_fulldata['users_reg']['ANY_DISABILITY'];
            $is_govt_employee = $user_fulldata['users_reg']['IS_GOVT_EMPLOYEE'];

            $end_date = $application['END_DATE'];

            $diff = date_diff(date_create($dob), date_create($end_date));
            //prePrint(date_create($dob));
        //    prePrint(date_create($end_date));
         //   prePrint($diff);
            $age_year = $diff->format('%y');
            $day = $diff->format('%d');
            $month = $diff->format('%m');
            $max_age = MAX_AGE;
            
            $EMPLOYEE_QUOTA_CATEGORY = $application['EMPLOYEE_QUOTA_CATEGORY'];
            if($EMPLOYEE_QUOTA_CATEGORY=="CATEGORY_D_EMPLOYEE_QUOTA"){
                if (isValidData($application['DATE_OF_APPOINTMENT'])) {
                    $DATE_OF_APPOINTMENT = $application['DATE_OF_APPOINTMENT'];
                    if ($DATE_OF_APPOINTMENT > date('Y-m-d')) {
                        $error .= "<div class='text-danger'>Choose Valid Date Of Appointment</div>";
                    }
                } else {
                    $error .= "<div class='text-danger'>Choose Date Of Appointment</div>";
                }
                if (isValidData($application['DATE_OF_RETIREMENT'])) {
                    $DATE_OF_RETIREMENT = $application['DATE_OF_RETIREMENT'];
                    if ($DATE_OF_RETIREMENT > date('Y-m-d')) {
                        $error .= "<div class='text-danger'>Choose Valid Date Of Retirement</div>";
                    }
                } else {
                    $error .= "<div class='text-danger'>Choose Date Of Retirement</div>";
                }
                if (isValidData($application['DATE_OF_DEATH'])) {
                    $DATE_OF_DEATH = $application['DATE_OF_DEATH'];
                    if ($DATE_OF_DEATH > date('Y-m-d')) {
                        $error .= "<div class='text-danger'>Choose Valid Date Of Decease</div>";
                    }
                } else {
                    $error .= "<div class='text-danger'>Choose Date Of Decease</div>";
                }
                if(!isValidData($application['AFFIDAVIT_PATH'])){
                    $error .= "<div class='text-danger'>Please Upload Affidavit Category D Employee</div>";
                }
            }
            else if($EMPLOYEE_QUOTA_CATEGORY=="CATEGORY_E_EMPLOYEE_QUOTA"){
                if (isValidData($application['DATE_OF_APPOINTMENT'])) {
                    $DATE_OF_APPOINTMENT = $application['DATE_OF_APPOINTMENT'];
                    if ($DATE_OF_APPOINTMENT > date('Y-m-d')) {
                        $error .= "<div class='text-danger'>Choose Valid Date Of Appointment</div>";
                    }
                } else {
                    $error .= "<div class='text-danger'>Choose Date Of Appointment</div>";
                }
                if (isValidData($application['DATE_OF_RETIREMENT'])) {
                    $DATE_OF_RETIREMENT = $application['DATE_OF_RETIREMENT'];
                    if ($DATE_OF_RETIREMENT > date('Y-m-d')) {
                        $error .= "<div class='text-danger'>Choose Valid Date Of Retirement</div>";
                    }
                } else {
                    $error .= "<div class='text-danger'>Choose Date Of Retirement</div>";
                }
                if(!isValidData($application['AFFIDAVIT_PATH'])){
                    $error .= "<div class='text-danger'>Please Upload Affidavit Category E Employee</div>";
                }
            }
            else if($EMPLOYEE_QUOTA_CATEGORY=="CATEGORY_F_EMPLOYEE_QUOTA"){
                if (isValidData($application['DATE_OF_APPOINTMENT'])) {
                    $DATE_OF_APPOINTMENT = $application['DATE_OF_APPOINTMENT'];
                    if ($DATE_OF_APPOINTMENT > date('Y-m-d')) {
                        $error .= "<div class='text-danger'>Choose Valid Date Of Appointment</div>";
                    }
                } else {
                    $error .= "<div class='text-danger'>Choose Date Of Appointment</div>";
                }
                if(!isValidData($application['AFFIDAVIT_PATH'])){
                    $error .= "<div class='text-danger'>Please Upload Affidavit Category F Employee</div>";
                }
            }
            $msg="";
            if($is_govt_employee==1){
                $APPOINMENT_LETTER_PATH = $user_fulldata['users_reg']['APPOINMENT_LETTER_PATH'];
                $DATE_OF_JOINING = $user_fulldata['users_reg']['DATE_OF_JOINING'];
                if(!preg_match("/[a-zA-Z]|\d|[^a-zA-Z\d]/",$APPOINMENT_LETTER_PATH)){
                    $error.="<div class='text-danger'>Must Upload Appoinment Letter</div>";
                }
                $diff = date_diff(date_create($DATE_OF_JOINING), date_create($end_date));
                $service_year = $diff->format('%y');
                 
//                prePrint($DATE_OF_JOINING);
//                prePrint($service_year);
                if($service_year>=2){
                    //GOVT EMPLOYEE RELAXTION
                    $max_age = $max_age+10;
                }else{
                    $error.="<div class='text-danger'>Your service year is less then 2 year thats why you can not claim for age relaxtion (10) year</div>";
                }

            }
            else if($user_fulldata['users_reg']['RELIGION']!="ISLAM"){
                //NON MUSLIM RELAXTION
                $max_age = $max_age+3;
            }
            
            if($user_fulldata['users_reg']['DISTRICT_ID']!=131){
                //URBAN RURAL RELAXTION
                $max_age = $max_age+3;
            }
            if(162==$user_fulldata['users_reg']['DISTRICT_ID'] && !$EMPLOYEE_QUOTA_CATEGORY){
                  $error.="<div class='text-danger'>Your District is out of jurisdiction thats why you only eligible for employee qouta kindlly fill employee quota category.</div>";
            }
            // prePrint($age_year);
            // prePrint($max_age);
            // prePrint($d);
            // exit();
            if($age_year<MIN_AGE){
                $error.="<div class='text-danger'>Your age is below ".MIN_AGE." that's why you are not eligible.</div>";
            }else if($age_year>$max_age){
                $error.="<div class='text-danger'>Your age is above ".$max_age." that's why you are not eligible.</div>";
            }else if($age_year==$max_age &&($day>0 ||$month>0) ){
               $error.="<div class='text-danger'>Your age is above ".$max_age." that's why you are not eligible.</div>"; 
            }

            if($height<MIN_HEIGHT){
                $error.="<div class='text-danger'>Your Height is below ".MIN_HEIGHT." cm that's why you are not eligible.</div>";
            }
            if($chest<MIN_CHEST){
                $error.="<div class='text-danger'>Your Chest is below ".MIN_CHEST." inches that's why you are not eligible.</div>";
            }
            if($any_disability!=0){
                $error.="<div class='text-danger'>You are not eligible because disable person is not allowed for this post.</div>";
            }
            $h = pow(($height/100),2);
            if($h>0){
                $bmi = $weight /$h ;    
            }else{
                $bmi = 0;
            }
        
            if($bmi<MIN_BMI){
                $error.="<div class='text-danger'>Your BMI is $bmi and you are under weight thats why you are not eligible.</div>";
            }
            else if($bmi>MAX_BMI){
                $error.="<div class='text-danger'>Your BMI is $bmi and you are over weight thats why you are not eligible.</div>";
            }

        }
        return $error;
    }

    public function validateForm($user_fulldata,$application){

        $error = $this->isValidApplication($user_fulldata,$application);
        if(!isValidData($application['CHALLAN_IMAGE'])){
            $error.="<div class='text-danger'>Must Upload Processing Fee Challan </div>";
        }
        return $error;

    }


}