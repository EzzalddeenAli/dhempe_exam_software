<?php

	class supplement_marksheets extends CI_Model
	{
	
	 function __construct()
	{  
		parent::__construct();
		if($this->session->userdata('year') && $this->session->userdata('part'))// both are set
		{
		$new_db = $this->load->database($this->session->userdata('year').'_'.$this->session->userdata('part'), TRUE );
	    $this->db = $new_db; 
		}
	}
		//get only supplementary student	
		function getStudentDetails($tbl_name)
		{
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where(array('supplementary'=>'1','block'=>'0'));
			$q = $this->db->get(); 
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row)
				{
					$data[]=$row;			
				}
			}
			return $data;
		}
		function getStudentDetails_now_eligible($tbl_name)
		{
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where(array('supplementary'=>'1','block'=>'1','now_eligible'=>'1'));
			$q = $this->db->get(); 
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row)
				{
					$data[]=$row;			
				}
			}
			return $data;
		}
		
		//get subject marks stucture
		function getSubMarkStructure($tbl_name,$subj1,$subj2,$subj3,$subj4,$subj5,$subj6,$subj7,$subj8)
		{
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('`sub_id` IN ("'.$subj1.'","'.$subj2.'","'.$subj3.'","'.$subj4.'","'.$subj5.'","'.$subj6.'","'.$subj7.'","'.$subj8.'")');
			
			$this->db->order_by('paper_type');
			$q = $this->db->get();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row)
				{
					$data[]=$row;			
				}
			}
			return $data;
		}
		
		//get first attempt marks
		function getFirstAttemptMarks($pr_number,$tbl_name,$subject_id)
		{ 
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where(array('pr_number'=>$pr_number,'sub_id'=>$subject_id));
			$q = $this->db->get();
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row)
				{
					$data[]=$row;			
				}
			}
			return $data;
		}	
		
		//get Prev attempt marks
		function getPrevAttemptMarks($pr_number,$tbl_name,$subject_id)
		{ 
		    $this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q = $this->db->get();
			
			foreach($q->result() as $row)
			{
				$attempts = $row->no_of_attempts;	
			}
			$attempts=$attempts-1;
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where(array('pr_number'=>$pr_number,'sub_id'=>$subject_id,'no_of_attempts'=>$attempts));
			$q = $this->db->get();
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row)
				{
					$data[]=$row;			
				}
			}
			return $data;
		}	
		
		
		//get current attempt marks
		function getCurrentAttemptMarks($pr_number,$tbl_name,$subject_id)
		{
			$this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q = $this->db->get();
			
			foreach($q->result() as $row)
			{
				$attempts = $row->no_of_attempts;	
			}
			
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where(array('pr_number'=>$pr_number,'no_of_attempts'=>$attempts,'sub_id'=>$subject_id));
			$q2 = $this->db->get();
			
			$data=array();
			
			foreach($q2->result() as $row2)
			{
				$data[]=$row2;	
			}
			
			return $data;
		}
		
		function getRemark($pr_number,$tbl_name,$subject_id)
		{
			$this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q = $this->db->get();
			
			foreach($q->result() as $row)
			{
				$attempts = $row->no_of_attempts;	
			}
			
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where(array('pr_number'=>$pr_number,'no_of_attempts'=>$attempts,'pass_status'=>'F'));
			$q2 = $this->db->get();
			
			$data=array();
			
			foreach($q2->result() as $row2)
			{
				$data[]=$row2;	
			}
			
			return $data;
		}
		function getCurrentAttempt($pr_number,$tbl_name)
		{
			$this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q = $this->db->get();
			
			foreach($q->result() as $row)
			{
				$attempts = $row->no_of_attempts;	
			}
		return $attempts;
		}	
	}
?>