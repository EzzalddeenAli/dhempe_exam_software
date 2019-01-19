<?php

	class check_login extends CI_Model{
		
		function check($user,$pwd){
			$where=array(
				'username'=>$user,
				'password'=>md5($pwd)
			);
			
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($where);
			$q=$this->db->get();
			
			if($q -> num_rows() == 1){
				return $flag=1;
			}
			else{
				return $flag=0;
			}
		} 
	}
?>