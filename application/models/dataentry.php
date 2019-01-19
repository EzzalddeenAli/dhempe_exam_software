<?php

	class dataentry extends CI_Model{
		
		function __construct()
	{  
		parent::__construct();
		if($this->session->userdata('year') && $this->session->userdata('part'))// both are set
		{
		$new_db = $this->load->database($this->session->userdata('year').'_'.$this->session->userdata('part'), TRUE );
	    $this->db = $new_db; 
		}
	}
		//update remaining grace marks
		function updateStudGrace($tbl_name,$data,$pr_number){
			$this->db->where('pr_number',$pr_number);
			$this->db->update($tbl_name,$data);
		}
		
		
		//get sub_rel_id mark structure
		function getMarkStruct($tbl_name,$sub_id){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('sub_id',$sub_id);
			$this->db->order_by('paper_type');
			$q=$this->db->get();
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		
		//get status of pass or fail
		function getStatus2($pr_number,$tbl_name){
			$q = $this->db->query('SELECT pass_status FROM '.$tbl_name.' where pass_status=\'P\' and pr_number='.$pr_number.' and no_of_attempts=(select max(no_of_attempts) from '.$tbl_name.' where pr_number='.$pr_number.')');
			/*$this->db->select('pass_status');
			$this->db->from($marks_table);
			$this->db->where('pr_number',$pr_number);
			$this->db->where('pass_status','P');
			$q=$this->db->get();
			*/
			$number = $q->num_rows();
			return $number;
		}
		
		function getPrRelMarks2($pr_number,$tbl_name){
			$q = $this->db->query('SELECT * FROM '.$tbl_name.' where pr_number='.$pr_number.' and no_of_attempts=(select max(no_of_attempts) from '.$tbl_name.' where pr_number='.$pr_number.')');
			/*$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q=$this->db->get();
			*/
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		
		//get student marks obtained for a particular choosen Pr
		function getPrRelMarks($pr_number,$tbl_name){
		/*Changes made by simone to order in mksheet n checklist*/
		$namearr=explode('_',$tbl_name);
		$size=sizeof($namearr);
		$size=$size-1;
		
		if($namearr[1]=='cmp')
		$namearr[0]='bsc_cmp_sci';
		$subject_table=$namearr[0].'_sub_sem_'.$namearr[$size];
		
			$this->db->select($tbl_name.'.*,paper_type');
			$this->db->from($tbl_name);
			$this->db->join($subject_table,$tbl_name.'.sub_id='.$subject_table.'.sub_id');
			$this->db->where('pr_number',$pr_number);
			$this->db->order_by('paper_type');
			$q=$this->db->get();
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		function getPrRelMarksSupplementary($pr_number,$tbl_name){
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
			$this->db->where(array('pr_number'=>$pr_number,'no_of_attempts'=>$attempts));
			$q2 = $this->db->get();
			
			$data=array();
			
			foreach($q2->result() as $row2)
			{
				$data[]=$row2;	
			}
			
			return $data;
			
			/*$q = $this->db->query("SELECT * FROM ".$tbl_name." WHERE pr_number=".$pr_number." AND no_of_attempts=(SELECT MAX(no_of_attempts) from ".$tbl_name." WHERE pr_number=".$pr_number.")");
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
			*/
		}
		
		//get total marks obtained
		function getTotal($pr_number,$tbl_name){
			$this->db->select_sum('total');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q=$this->db->get();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data=$row->total;
				}
			}
			return $data;
		}
		
		//get status of pass or fail
		function getStatus($pr_number,$marks_table){
			$this->db->select('pass_status');
			$this->db->from($marks_table);
			$this->db->where('pr_number',$pr_number);
			$this->db->where('pass_status','P');
			$q=$this->db->get();
			
			$number = $q->num_rows();
			return $number;
		}
		
		//get student marks obtained for a particular choosen subject id
		function getPrRelMarks1($sub_id,$tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('sub_id',$sub_id);
			$q=$this->db->get();
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		
		//get stream and semester related pr number
		function getSemRelPr($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('block','0');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			//echo $this->db->last_query();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		function getSemRelPrIncludingBlocked($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			//$this->db->where('block','0');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			//echo $this->db->last_query();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		//to get only fresh students
		function getSemRelPr_new($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('block','0');
			$this->db->where('supplementary','0');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			//echo $this->db->last_query();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		function  getSemRelPr_now_eligible($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('block','1');
			$this->db->where('supplementary','0');
			$this->db->where('now_eligible','1');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			//echo $this->db->last_query();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		
		//**************************************sachin9*******************************//
		function getSemRelPrs($tbl_name){
			/* $this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('block','0');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			echo $this->db->last_query(); */
			$data=array();
			$q=$this->db->query('select * from exam_software.'.$tbl_name.' where block=0 order by seat_number');
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		
		function getCounts($pr_number,$tbl_name){
			/* $where=array('pr_number'=>$pr_number,'pass_status'=>'P');
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where($where);
			$q=$this->db->get(); */
			$q=$this->db->query('select * from exam_software.'.$tbl_name.' where pr_number="'.$pr_number.'" and pass_status="P"');
			
			$number=$q->num_rows();
			return $number;
		}
		
		//modified on 21 may 2013
		function getCount2s($pr_number,$tbl_name,$seat_number){
		//echo $seat_number;die();
			/* $where=array('pr_number'=>$pr_number,'pass_status'=>'P','supple_seat_number'=>$seat_number);
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where($where);
			$q=$this->db->get(); */
			
			$q=$this->db->query('select * from exam_software.'.$tbl_name.' where pr_number="'.$pr_number.'",pass_status="P" and supple_seat_number="'.$seat_number.'"');
			
			
			
			$number=$q->num_rows();
			return $number;
		}
		
		function getPrRelMarkss($pr_number,$tbl_name){
			/* $this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q=$this->db->get(); */
			$q=$this->db->query('select * from exam_software.'.$tbl_name.' where pr_number="'.$pr_number.'"');
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		
		function getPrRelMarksSupplementarys($pr_number,$tbl_name){
			/* $this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q = $this->db->get(); */
			$q=$this->db->query('select max(no_of_attempts) from exam_software.'.$tbl_name.' where pr_number="'.$pr_number.'"');
			foreach($q->result() as $row)
			{
				$attempts = $row->no_of_attempts;	
			}
			
			/* $this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where(array('pr_number'=>$pr_number,'no_of_attempts'=>$attempts));
			$q2 = $this->db->get();*/
			$q2= $this->db->query("SELECT * FROM exam_software.".$tbl_name." WHERE pr_number=".$pr_number." AND no_of_attempts=(SELECT MAX(no_of_attempts)");

			
			$data=array();
			
			foreach($q2->result() as $row2)
			{
				$data[]=$row2;	
			}
			
			return $data;
			
			/*$q = $this->db->query("SELECT * FROM ".$tbl_name." WHERE pr_number=".$pr_number." AND no_of_attempts=(SELECT MAX(no_of_attempts) from ".$tbl_name." WHERE pr_number=".$pr_number.")");
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
			*/
		}
		
		
		function getMarkStructs($tbl_name,$sub_id){
			/* $this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('sub_id',$sub_id);
			$this->db->order_by('paper_type');
			$q=$this->db->get(); */
			$q=$this->db->query('select * from exam_software.'.$tbl_name.' where sub_id="'.$sub_id.'" order by paper_type');
			
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		//******************************************************************************************************//
		
		
		
		
		
		//get stream and semester related pr number
		function getSemRelPr2($tbl_name){
			$this->db->select('*');
			//$this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('block','0');
			$this->db->where('supplementary','1');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		function getSemRelPr2_now_eligible($tbl_name){
			$this->db->select('*');
			//$this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('block','1');
			$this->db->where('supplementary','1');
			$this->db->where('now_eligible','1');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
	/*	function getSemRelPr2($tbl_name){
			echo "iam here";die();
			//$this->db->select('*');
			$this->db->select_max('no_of_attempts');
			$this->db->from($tbl_name);
			$this->db->where('block','0');
			$this->db->where('supplementary','1');
			$this->db->order_by('seat_number');
			$q=$this->db->get();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}*/
		
		//get subject detail
		function getSubjectDetail($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->order_by('sub_name');
			$this->db->group_by('sub_name_display');
			$q=$this->db->get();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
				return $data;
			}
		}
		
		//get subject related pr number
		
		function getSubjrelPrNum($tbl_connect,$subject){
			/* $this->db->select('*');
			$this->db->from($tbl_connect);
			$this->db->or_where('subj_1',$subject);
			$this->db->or_where('subj_2',$subject);
			$this->db->or_where('subj_3',$subject);
			$this->db->or_where('subj_4',$subject);
			$this->db->or_where('subj_5',$subject);
			$this->db->or_where('subj_6',$subject);
			$this->db->or_where('subj_7',$subject);
			$this->db->or_where('subj_8',$subject);
		
			$this->db->order_by('seat_number','ASC'); */
			$q=$this->db->query("select * from ".$tbl_connect." where (subj_1='".$subject."' or subj_2='".$subject."' or subj_3='".$subject."' or subj_4='".$subject."' or subj_5='".$subject."' or subj_6='".$subject."' or subj_7='".$subject."' or subj_8='".$subject."') and (supplementary=0) order by seat_number");
			
			//echo $this->db->last_query();
			$data=array();
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}	
			}
			return $data;
		}
		
		
		//get subject structure for entering dataentry
		function getSubjectmarks($sub_id,$tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('sub_id',$sub_id);
			$q=$this->db->get();
			$data=array();
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}	
			}
			return $data;
		}
		
		//insert subject marks (data entry)
		function insertDataSubj($tbl_name,$data){
			$this->db->insert($tbl_name,$data);
		}
		
		//delete existing student before inserting
		function deleteExist($tbl_name,$pr_number,$subID){
			$cnd=array('pr_number'=>$pr_number,'sub_id'=>$subID);
			$this->db->delete($tbl_name,$cnd);
		}
		
		//get student marks which is related to subject id and pr number
		function getstudentMarks($sub_id,$tbl_name){
			/* BA */
			if($tbl_name == "ba_student_marks_sem_2"){
				$join_tbl = "ba_student_detail_sem_2";
			}	
			else if($tbl_name == "ba_student_marks_sem_1"){
				$join_tbl = "ba_student_detail_sem_1";
			}
			else if($tbl_name == "ba_student_marks_sem_3"){
				$join_tbl = "ba_student_detail_sem_3";
			}
			else if($tbl_name == "ba_student_marks_sem_4"){
				$join_tbl = "ba_student_detail_sem_4";
			}
			
			/*BSC */
			else if($tbl_name == "bsc_student_marks_sem_1"){
				$join_tbl = "bsc_student_detail_sem_1";
			}
			else if($tbl_name == "bsc_student_marks_sem_2"){
				$join_tbl = "bsc_student_detail_sem_2";
			}
			else if($tbl_name == "bsc_student_marks_sem_3"){
				$join_tbl = "bsc_student_detail_sem_3";
			}
			else if($tbl_name == "bsc_student_marks_sem_4"){
				$join_tbl = "bsc_student_detail_sem_4";
			}
			
			/*BSC CMPSCI*/
			else if($tbl_name == "bsc_cmp_sci_student_marks_sem_1"){
				$join_tbl = "bsc_cmp_sci_student_detail_sem_1";
			}
			else if($tbl_name == "bsc_cmp_sci_student_marks_sem_2"){
				$join_tbl = "bsc_cmp_sci_student_detail_sem_2";
			}
			else if($tbl_name == "bsc_cmp_sci_student_marks_sem_3"){
				$join_tbl = "bsc_cmp_sci_student_detail_sem_3";
			}
			else if($tbl_name == "bsc_cmp_sci_student_marks_sem_4"){
				$join_tbl = "bsc_cmp_sci_student_detail_sem_4";
			}
			
			
			//$this->db->select('*');
			//$this->db->from('"'.$tbl_name.'" as a');
			//$this->db->join('"'.$join_tbl.'" as b','a.pr_number=b.pr_number');
			//$this->db->where('sub_id',$sub_id);
			//$q=$this->db->get();
			$q= $this->db->query('SELECT * FROM '.$tbl_name.' AS a JOIN '.$join_tbl.' AS b ON a.pr_number = b.pr_number where sub_id='."'".$sub_id."'".' and supplementary=0 order by seat_number asc');
			//echo $this->db->last_query();
			$data=array();
			
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			
			return $data;
		}
		
		//get subject id
		function getSubID($tbl_name){
			$data=array();
			$q=$this->db->get($tbl_name);
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}
		
		//get student count 
		function getCount($pr_number,$tbl_name){
			$where=array('pr_number'=>$pr_number,'pass_status'=>'P');
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where($where);
			$q=$this->db->get();
			
			$number=$q->num_rows();
			return $number;
		}
		
		//modified on 21 may 2013
		function getCount2($pr_number,$tbl_name,$seat_number){
		//echo $seat_number;die();
			$where=array('pr_number'=>$pr_number,'pass_status'=>'P','supple_seat_number'=>$seat_number);
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where($where);
			$q=$this->db->get();
			
			$number=$q->num_rows();
			return $number;
		}
		
		//update gen_symbol, activity_symbol, gen_the_symbol, gen_the_pract_sym, pass_status 
		function updateColumn($tbl_name){
			$data=array('gen_symbol'=>'','activity_symbol'=>'','gen_the_symbol'=>'','pass_status'=>'');
			$this->db->update($tbl_name,$data);
		}
		
		//get count of marks 17 april 2013 modified code
		function getCountofRows($tbl_name){
			return $this->db->count_all($tbl_name);
		}
		
		function checkMarksStatus($tbl_name){
			$this->db->select('pass_status');
			$this->db->from($tbl_name);
			$q = $this->db->get();
			
			$pass_status_flag = 1;
			
			foreach($q->result() as $row){
				if($row->pass_status == ""){
					$pass_status_flag = 0;
				}
			}
			return $pass_status_flag;
		
		}
		
		function get_marksheet_data()
		{
		$this->db->select('*');
			$this->db->from('exam_marksheet_details');
			$q=$this->db->get();
			$data=array();
			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}	
			}
			return $data;
		}
		 function update_marksheet_data($exam_held_in,$entered_by,$date_of_declaration,$date_of_issue)
		 {
		 $count=$this->db->count_all('exam_marksheet_details');
		 
		 if($count>0)
		 $this->db->query("update exam_marksheet_details set exam_held_in ='".$exam_held_in."',
		 entered_by='".$entered_by."',date_of_declaration='".$date_of_declaration."',date_of_issue='".$date_of_issue."'");
		 else
		 $this->db->insert("exam_marksheet_details", array('exam_held_in'=>$exam_held_in,'entered_by'=>$entered_by,'date_of_declaration'=>$date_of_declaration,'date_of_issue'=>$date_of_issue));
		 }
	}
?>