<?php
/**
 * Created by PhpStorm.
 * User: Kashif Shaikh
 * Date: 3/30/2022
 * Time: 12:28 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class AdminAuthentication extends BaseController
{
    private $script_name = "";
    private $SelfController = 'AdminLogin';
    public $side_bar_values = array();

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata($this->SessionName)) {
            redirect(base_url() . $this->AdminLoginController);
            exit();
        } else {

            $self = $_SERVER['PHP_SELF'];
            $self = explode('index.php/', $self);
            $this->script_name = $self[1];

            $this->user = $this->session->userdata($this->SessionName);
            $this->user = $this->User_model->getUserFullDetailById($this->user['USER_ID']);
            $this->user_role = $this->session->userdata($this->user_role);
            $user_id =$this->user['users_reg']['USER_ID'];
            $role_id = $this->user_role['ROLE_ID'];

            $privilages = $this->Configuration_model->get_privilages($user_id, $role_id);
            // prePrint($privilages);
            $bol = $this->verify_path($this->script_name, $privilages);
            $bol = true;

            if ($bol == true) {
                $this->side_bar_values = $this->get_side_bar_data($privilages);
            } else {
                redirect(base_url() . $this->SelfController);
                exit();
            }

        }
    }


    private function verify_path($path, $privilages)
    {
         if ($path == null) {
                $self = $_SERVER['PHP_SELF'];
                $path = explode('index.php/', $self);
            }
        
        foreach ($privilages as $p) {
           
            if ($p['LINK'] == $path) {
                return true;
            }else{
                $index = strpos($p['LINK'],'/?');
                
                if($index!==false){
                    $new_link = str_replace("/?","",$p['LINK']);
                    $index = strpos($path,$new_link);
                  //  var_dump($index);
                //    prePrint($new_link);
                 //     prePrint($new_link);
                  //  exit();
                  
                    if($index!==false){
                      //  
                        //prePrint($path);
                    //    prePrint($new_link);
                     //   exit();
                       return true;  
                    }
                }
            }
        }
        exit("<h2>Access Prohibited</h2>");
    }

    private function get_side_bar_data($rows)
    {
        //$rows = $this->get_privilages($user_id,$role_id);
        $dummy = array();
        foreach ($rows as $p) {
            if ($p['IS_PARENT'] == 'Y' && $p['IS_DASHBOARD_ITEM'] == 1) {
                $sub_item = array();
                foreach ($rows as $k) {
                    if ($p['PRIVILAGE_ID'] == $k['PARENT_ID']) {
                        $sub_item[] = array(
                            'is_tab_base' => $p['IS_TAB_BASE'],
                            'value' => $k['NAME'],
                            'link' => $k['LINK']);
                    }
                }

                $dum = array('is_submenu' => 1,
                    'is_tab_base' => $p['IS_TAB_BASE'],
                    'value' => $p['NAME'],
                    'link' => $p['LINK'],
                    'class' => $p['SIDE_ICON'],
                    'sub_menu' => $sub_item);
                $dummy[] = $dum;
            } else if ($p['PARENT_ID'] == '0' && $p['IS_DASHBOARD_ITEM'] == 1) {

                $dum = array('is_submenu' => 0,
                    'is_tab_base' => $p['IS_TAB_BASE'],
                    'value' => $p['NAME'],
                    'link' => $p['LINK'],
                    'class' => $p['SIDE_ICON']);
                $dummy[] = $dum;
            }

        }
        array_push($dummy,array('is_submenu' => 0,
            'is_tab_base'=>'N',
            'value' => 'Logout',
            'link' => "logout",
            'class' =>'educate-icon educate-pages icon-wrap'));
        return $dummy;
    }
}