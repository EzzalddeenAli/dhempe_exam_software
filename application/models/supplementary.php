<?php

	class supplementary extends CI_Model
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
		function getFreshMarks($pr,$tbl)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where('pr_number',$pr);
			$q = $this->db->get();
			
			$data=array();
			
			if($q->result() > 0)
			{
				foreach($q->result() as $row)
				{
					$data [] = $row; 
				}
			}
			return $data;
		}
		
		function insertFreshMarks($data,$tbl,$attempt,$seat_number,$pr)
		{
			/*if data already exist with same attempt and pr than delete it*/
			$this->db->delete($tbl,array('no_of_attempts'=>$attempt,'pr_number'=>$pr));
			
			/* else insert data*/
			foreach($data as $row)
			{
				$insertData=array();
				
				$insertData=array(
					"sub_id" => $row->sub_id,
					"pr_number" => $row->pr_number,
					"supple_seat_number" => $seat_number,
					"no_of_attempts" => $attempt,
					"isa_abs" => $row->isa_abs,
					"see_abs" => $row->see_abs,
					"pract_abs" => $row->pract_abs,
					"internal" => $row->internal,
					"theory" => $row->theory,
					"practicle" => $row->practicle,
					"total" => $row->total,
					"gen_symbol" => $row->gen_symbol,
					"activity_symbol" => $row->activity_symbol,
					"gen_the_symbol" => $row->gen_the_symbol,
					"gen_the_pract_sym" => $row->gen_the_pract_sym,
					"pass_status" => $row->pass_status,
				);	
				$this->db->insert($tbl,$insertData);
			}
		}
		
		function getAttemptMarks($pr,$tbl,$attempt)
		{
			$attempt = $attempt-1;
			
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where(array("pr_number"=>$pr,"no_of_attempts"=>$attempt));
			$q = $this->db->get();
			
			$data=array();
			
			if($q->result() > 0)
			{
				foreach($q->result() as $row)
				{
					$data [] = $row; 
				}
			}
			return $data;
		}
		
		
		function getAttemptMarksPrev($pr,$tbl,$attempt,$sub_id)
		{
			
			
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where(array("pr_number"=>$pr,"no_of_attempts"=>$attempt,'sub_id'=>$sub_id));
			$q = $this->db->get();
			//echo '<br>'.$this->db->last_query();
			$data=array();
			
			if($q->result() > 0)
			{
				foreach($q->result_array() as $row)
				{
					$data [] = $row; 
				}
			}
			if(sizeof($data)==0)//no records present
			{$data[]=array('sub_id'=>'','isa_abs'=>'','internal'=>'','see_abs'=>'','theory'=>'','pract_abs'=>'','practicle'=>'','total'=>0,'gen_symbol'=>'+ $','activity_symbol'=>'+ #','gen_the_pract_sym'=>'+ $','pass_status'=>'P');
			}
			return $data;
		}
		
		
		function insertAttemptMarks($data,$tbl,$attempt,$seat_number,$pr)
		{
			/*if data already exist with same attempt and pr than delete it*/
			$this->db->delete($tbl,array('no_of_attempts'=>$attempt,'pr_number'=>$pr));
			
			/* else insert data*/
			foreach($data as $row)
			{
				$insertData=array();
				
				$insertData=array(
					"sub_id" => $row->sub_id,
					"pr_number" => $row->pr_number,
					"supple_seat_number" => $seat_number,
					"no_of_attempts" => $attempt,
					"isa_abs" => $row->isa_abs,
					"see_abs" => $row->see_abs,
					"pract_abs" => $row->pract_abs,
					"internal" => $row->internal,
					"theory" => $row->theory,
					"practicle" => $row->practicle,
					"total" => $row->total,
					"gen_symbol" => $row->gen_symbol,
					"activity_symbol" => $row->activity_symbol,
					"gen_the_symbol" => $row->gen_the_symbol,
					"gen_the_pract_sym" => $row->gen_the_pract_sym,
					"pass_status" => $row->pass_status,
				);	
				$this->db->insert($tbl,$insertData);
			}
		}
		
		/*simone*/
		function insertPrevAttemptMarks($data,$tbl,$attempt,$seat_number,$pr)
		{
	
			/*if data already exist with same attempt and pr than delete it*/
			$this->db->delete($tbl,array('no_of_attempts'=>$attempt,'pr_number'=>$pr));

			
		
			/* else insert data*/
			foreach($data as $row)
			{
				$insertData=array();
				
				$insertData=array(
					"sub_id" => $row['sub_id'],
					"pr_number" => $row['pr_number'],
					"supple_seat_number" => $seat_number,
					"no_of_attempts" => $attempt,
					"isa_abs" => $row['isa_abs'],
					"see_abs" => $row['see_abs'],
					"pract_abs" => $row['pract_abs'],
					"internal" => $row['internal'],
					"theory" => $row['theory'],
					"practicle" => $row['practicle'],
					"total" => $row['total'],
					"gen_symbol" => $row['gen_symbol'],
					"activity_symbol" => $row['activity_symbol'],
					"gen_the_symbol" => $row['gen_the_symbol'],
					"gen_the_pract_sym" => $row['gen_the_pract_sym'],
					"pass_status" => $row['pass_status'],
				);	
				$this->db->insert($tbl,$insertData);
						
			}
		}
		
		function getSubName($sub_id,$tbl_name)
		{
			$this->db->select('*');
			$this->db->from($tbl_name);			
			$this->db->where('sub_id',$sub_id);	
			$q=$this->db->get();
			
			$subject_details=array();
			
			if($q->result() > 0)
			{
				foreach($q->result() as $row)
				{
					$subject_details = $row;
				}
			}		
			return $subject_details;
		}
		
		/*simone*/
		function getSubName_entry($sub_id,$tbl_name)
		{
			$this->db->select('*');
			$this->db->from($tbl_name);			
			$this->db->where('sub_id',$sub_id);	
			$q=$this->db->get();
			
			$subject_details=array();
			
			if($q->result() > 0)
			{
				foreach($q->result_array() as $row)
				{
					$subject_details = $row;
				}
			}		
			return $subject_details;
		}
		
		function getRemainingGrace($pr,$tbl)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where('pr_number',$pr);
			$q=$this->db->get();
			
			$data=array();
			
			if($q->result() > 0)
			{
				foreach($q->result() as $row)
				{
					$data [] =$row;	
				}
			}
			return $data;
		}
		
		/* get remaining grace marks */
		function getGrace($pr,$tbl)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where('pr_number',$pr);
			$q = $this->db->get();
			
			$data=array();
			
			if($q->result() > 0)
			{
				foreach($q->result() as $row)
				{
					$data[]=$row;
				}
			}
			return $data;	
		}
		
		/*update grace marks*/
		function updateGrace($general,$nss,$sports,$tbl,$pr,$attempt)
		{
			$data=array(
				"gen_grace_remain"=>$general,
				"nss_grace_remain"=>$nss,
				"sports_grace_remain"=>$sports
			);
			
			$this->db->where(array('pr_number'=>$pr,'no_of_attempts'=>$attempt));
			$this->db->update($tbl,$data);
		}
		
		/*update latest marks*/
		function updatePostedMarks($subj_id,$pr,$attempt,$isa,$see,$pract,$total,$tbl,$isa_abs,$see_abs,$pract_abs)
		{
			$data=array(
				"isa_abs"=>$isa_abs,
				"see_abs"=>$see_abs,
				"pract_abs"=>$pract_abs,
				"internal"=>$isa,
				"theory"=>$see,
				"practicle"=>$pract,
				"total"=>$total
			);
			
			$this->db->where(array('sub_id'=>$subj_id,'pr_number'=>$pr,'no_of_attempts'=>$attempt));	
			$this->db->update($tbl,$data);
		}
		
		/* updae grace marks*/
		function updateStudGrace($tbl,$data,$pr,$attempt)
		{
			$this->db->where(array('pr_number'=>$pr,'no_of_attempts'=>$attempt));	
			$this->db->update($tbl,$data);
		}
		
		function updateStudGrace_main($tbl,$data,$pr,$type)
		{
			$this->db->where(array('pr_number'=>$pr,'supplementary'=>$type));	
			$this->db->update($tbl,$data);
		}
		
		/* update grace marks subtract*/
		
		function updateStudGraceSubtract($marks_table,$student_tbl_detail,$gen_grace_used,$sports_grace_used,$nss_grace_used,$pr,$attempt)
		{
			$this->db->where(array('pr_number'=>$pr,'no_of_attempts'=>$attempt));	
			$this->db->query('update '.$student_tbl_detail.' set '.$student_tbl_detail.' .gen_grace_remain=gen_grace_alloc-'.$gen_grace_used.','.$student_tbl_detail.' .sports_grace_remain='.$student_tbl_detail.'.sports_grace_alloc-'.$sports_grace_used.','.$student_tbl_detail.' .entitlement_grace_remain='.$student_tbl_detail.' .entitlement_grace_alloc-'.$nss_grace_used.' where pr_number='.$pr.' ');
			//echo '<br>'.$this->db->last_query('');
			$this->db->query('update '.$marks_table.' as supp,(SELECT '.$student_tbl_detail.'.gen_grace_remain,'.$student_tbl_detail.'.sports_grace_remain,'.$student_tbl_detail.'.entitlement_grace_remain from '.$student_tbl_detail.' where pr_number='.$pr.' ) main  set supp.gen_grace_remain=main.gen_grace_remain,supp.sports_grace_remain=main.sports_grace_remain,supp.nss_grace_remain=main.entitlement_grace_remain where pr_number='.$pr.' and no_of_attempts='.$attempt.'');
			//echo '<br>'.$this->db->last_query('');
		}
		
		function getGrace2($pr,$attempt,$tbl)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where(array('pr_number'=>$pr,'no_of_attempts'=>$attempt));
			$this->db->limit(1);
			$q = $this->db->get();
			
			$data=array();
			
			if($q->result() > 0)
			{
				foreach($q->result() as $row)
				{
					$data[]=$row;
				}
			}
			return $data;	
		}
		
		function getRemainingGrace2($pr,$attempt,$tbl)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where(array('pr_number'=>$pr,'no_of_attempts'=>$attempt));
			$this->db->limit(1);
			$q=$this->db->get();
			
			$data=array();
			
			if($q->result() > 0)
			{
				foreach($q->result() as $row)
				{
					$data [] =$row;	
				}
			}
			return $data;
		}
	
	/*simone*/
	   function getStudentSubjects($pr_number,$student_datail_table,$sub_table){
			$this->db->select('*');
			$this->db->from($student_datail_table);
			$this->db->where('pr_number',$pr_number);
			$this->db->where('supplementary',1);
			$q=$this->db->get();
			
			//$data=array();
			
			if($q->result() > 0){
				foreach($q->result_array() as $row){
					$data[]=$row;
				}
				return $data;
			}
		}
	function updateSeatNumber($seat_number,$pr_number,$student_tbl_detail){
			$data=array(
				"seat_number"=>$seat_number
				
			);
			
			$this->db->where(array('pr_number'=>$pr_number));
			$this->db->update($student_tbl_detail,$data);
	}
	}
?>