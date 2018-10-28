<?php

	class print_marksheet extends CI_Model{
		function __construct()
	{  
		parent::__construct();
		if($this->session->userdata('year') && $this->session->userdata('part'))// both are set
		{
		$new_db = $this->load->database($this->session->userdata('year').'_'.$this->session->userdata('part'), TRUE );
	    $this->db = $new_db; 
		}
	}
		function getUniqueSubId($tbl_name){
			$this->db->distinct();
			$this->db->select('pr_number');
			$q=$this->db->get($tbl_name);
			
			$data=array();
			
			if($q->result() > 0 ){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
	}
?>