<?php
/**
 * Created by PhpStorm.
 * User: Kashif Shaikh
 * Date: 7/10/2020
 * Time: 10:54 PM
 */

class User_model extends CI_model
{
    function __construct()
    {
        parent::__construct();


    }

    public function insert_admin($data)
    {
        $sql = $this->db->insert('users_reg', $data);
        return $sql;
    }

    function getUserFullDetailById($user_id){
        $user_reg  = $this->getUserById($user_id);
        return array('users_reg'=>$user_reg);
       

    }

    function getUserByCnicAndPassword($cnic,$password){
        $this->db->where('CNIC_NO',$cnic);
        $this->db->where('PASSWORD',$password);
        $user = $this->db->get('users_reg')->row_array();
        return $user;

    }
    function getUserByPassportAndPassword($passport,$password){
        $this->db->where('PASSPORT_NO',$passport);
        $this->db->where('PASSWORD',$password);
        $user = $this->db->get('users_reg')->row_array();
        return $user;

    }
    function getUserByCnic($cnic){
        $this->db->where('CNIC_NO',$cnic);
        $user = $this->db->get('users_reg')->row_array();
        return $user;

    }
    function getUserByCnicLegacyDb($cnic){
        $this->db->where('CNIC_NO',$cnic);
        $user = $this->db->get('users_reg')->row_array();
        return $user;

    }
    function getUserByUserIdLegacyDb($user_id){
        $this->db->where('USER_ID',$user_id);
        $user = $this->db->get('users_reg')->row_array();
        return $user;

    }
    function getUserByPassportNo($passport_no){
        $this->db->where('PASSPORT_NO',$passport_no);
        $user = $this->db->get('users_reg')->row_array();
        return $user;

    }
    /*	function getUserById($user_id){
            $this->db->select("*,ur.REMARKS");
            $this->db->from("users_reg ur");
            $this->db->join('districts AS d', 'ur.DISTRICT_ID = d.DISTRICT_ID');
            $this->db->where('USER_ID',$user_id);

            $user = $this->db->get()->row_array();
            return $user;

        }

    */
//this is method updated 5-nov-2020
    function getUserById($user_id){
        $this->db->select("*,ur.REMARKS");
        $this->db->from("users_reg ur");
        $this->db->where('USER_ID',$user_id);

        $user = $this->db->get()->row_array();
        return $user;

    }
    function getUserByIdForAdmin($user_id){
        $this->db->select("*,ur.REMARKS");
        $this->db->from("users_reg ur");
        $this->db->where('USER_ID',$user_id);

        $user = $this->db->get()->row_array();
        return $user;

    }
    function getUserByIdWithProfilePhoto($user_id){
        $this->db->select("*,ur.REMARKS");
        $this->db->from("users_reg ur");

        $this->db->where('ur.USER_ID',$user_id);

        $user = $this->db->get()->row_array();
        //echo $this->db->last_query();
        //exit();
        return $user;

    }
    // JOIN QUERY TO GET USER ROLE FROM ROLE AND ROLE_RELATION TABLE
    // SELECT r.`ROLE_NAME`,r.`ACTIVE`, rr.`USER_ID`, r.`KEYWORD` from role r, role_relation rr where rr.USER_ID=93774 AND r.ROLE_ID=rr.ROLE_ID
    function getUserRoleByUserId($user_id){
        $this->db->select('r.`ROLE_NAME`,r.`ACTIVE`, rr.`USER_ID`, r.`KEYWORD`');
        $this->db->from('role_relation rr');
        $this->db->join('role AS r', 'rr.ROLE_ID = r.ROLE_ID');
        $this->db->where('rr.USER_ID',$user_id);
        $this->db->where('r.KEYWORD','UG_A');
        $this->db->where('r.ACTIVE','1');
        $user = $this->db->get()->row_array();
        return $user;

        //echo $this->db->last_query();
//        return $user;

    }

    function getUserAdmissionRoleByUserId($user_id){

        $this->db->select('r.ROLE_ID, rr.R_R_ID, r.`ROLE_NAME`,r.`ACTIVE`, rr.`USER_ID`, r.`KEYWORD`');
        $this->db->from('role_relation rr');
        $this->db->join('role AS r', 'rr.ROLE_ID = r.ROLE_ID');
        $this->db->where('rr.USER_ID',$user_id);
//		$this->db->where('r.KEYWORD','UG_A');
        $this->db->where('r.ACTIVE','1');
        $user = $this->db->get()->result_array();
        return $user;
    }

    


}