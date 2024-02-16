<?php
/**
 * Created by PhpStorm.
 * User: Kashif Shaikh
 * Date: 7/13/2020
 * Time: 12:42 PM
 */

class Configuration_model extends CI_Model
{

	function get_privilages($user_id,$role_id){

		//$this->legacy_db = $this->load->database('admission_db',true);
		$this->db->select("p.*");
		$this->db->from("privilages p");
		
		$this->db->join("privilage_relation pr","p.PRIVILAGE_ID=pr.PRIVILAGE_ID AND (pr.USER_ID={$user_id} OR pr.ROLE IN ($role_id) OR pr.ROLE=7) ORDER BY ORD","INNER");
		return($this->db->get()->result_array());

	}
	function getConfiguration($title){
		$this->db->select("*");
		$this->db->from("configuration c");
		$this->db->where("ACTIVE",1);
		$this->db->where("TITLE",$title,);
		return $this->db->get()->row_array();
	}

	function updateConfiguration($title,$description){
		$this->db->where('TITLE',$title);
		$data['DESCRIPTION'] =$description;
		$this->db->update('configuration',$data);
	}
			
	
}

