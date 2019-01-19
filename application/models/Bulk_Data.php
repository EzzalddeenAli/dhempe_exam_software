<?php


class Bulk_Data extends CI_Model{
	
	function __construct()
	{  
		parent::__construct();
		if($this->session->userdata('year') && $this->session->userdata('part'))// both are set
		{
		$new_db = $this->load->database($this->session->userdata('year').'_'.$this->session->userdata('part'), TRUE );
	    $this->db = $new_db; 
		}
	}
	function getAllSubjectName($tbl_name){
		$this->db->select(array('sub_id','sub_name'));
		$this->db->from($tbl_name);
		$this->db->order_by('paper_type');
		$q=$this->db->get();
		
		$data =array(array());
		$s=0;
		foreach($q->result() as $row){
			$data[$s]["subject_name"]	= $row->sub_name;
			$data[$s]["subject_id"]   = $row->sub_id;
			$s++;
		}
		return $data;
	}
	
	function getAllStudent($tbl_name){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->where(array('supplementary'=>'0','block'=>'0'));
		$this->db->order_by('seat_number');
		$q = $this->db->get();
		
		$data =array(array());
		$s=0;
		foreach($q->result() as $row){
			$data[$s]["pr_number"]=$row->pr_number;
			$data[$s]["seat_number"]=$row->seat_number;
			$data[$s]["name"]=$row->name;
			$data[$s]["subj1"]=$row->subj_1;
			$data[$s]["subj2"]=$row->subj_2;
			$data[$s]["subj3"]=$row->subj_3;
			$data[$s]["subj4"]=$row->subj_4;
			$data[$s]["subj5"]=$row->subj_5;
			$data[$s]["subj6"]=$row->subj_6;
			$data[$s]["subj7"]=$row->subj_7;
			$data[$s]["subj8"]=$row->subj_8;
			$s++;
		}
		return $data;
	}
	
	//added by simone to get number of subjects
	function getAllSubjectNum($tbl_name){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->where('subj_1 != ',"");
		
		$this->db->limit('1');
		$q = $this->db->get();
		
		$data =array(array());
		$s=0;
		$sub_cnt=0;
		foreach($q->result() as $row){
			
			if($row->subj_1 !="")$sub_cnt++;
			if($row->subj_2 !="")$sub_cnt++;
			if($row->subj_3 !="")$sub_cnt++;
			if($row->subj_4 !="")$sub_cnt++;
			if($row->subj_5 !="")$sub_cnt++;
			if($row->subj_6 !="")$sub_cnt++;
			if($row->subj_7 !="")$sub_cnt++;
			if($row->subj_8 !="")$sub_cnt++;
			
			
		}
		return $sub_cnt;
	}
	
	function getSubjectName($subject_id,$tbl_name){
		$this->db->select('sub_name');
		$this->db->from($tbl_name);
		$this->db->where('sub_id',$subject_id);
		$q=$this->db->get();
		
		$data = "";
		foreach($q->result() as $row){
			$data =$row->sub_name;
		}
		return $data;
	}
	
	function getISAMarks($pr,$subj_id,$tbl_name){
		$this->db->select(array('isa_abs','see_abs','pract_abs','internal','theory','practicle','total'));
		$this->db->from($tbl_name);
		$this->db->where(array("pr_number"=>$pr,"sub_id"=>$subj_id));
		$q=$this->db->get();
		
		$data =array();
		$s=0;
		foreach($q->result() as $row){
			$data [$s]["ISA_ABS"] = $row->isa_abs;
			$data [$s]["SEE_ABS"] = $row->see_abs;
			$data [$s]["PR_ABS"] = $row->pract_abs;
			
			$data [$s]["ISA"] = $row->internal;
			$data [$s]["SEE"] = $row->theory;
			$data [$s]["practicle"] = $row->practicle;
			$data [$s]["total"] = $row->total;
			$s++;
		}
		return $data;
	}
}
?>