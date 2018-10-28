<?php

	class suppleController extends CI_Controller
	{
		function index()
		{
			$this->load->view('supplementary');
		}
		
		function index_enter_marks()
		{
			$this->load->view('supplementary_enter_marks');
		}
		
		function getPr(){
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			
			$tbl_name=$stream.$semester;
			
			$this->load->model('home1');
			$prnumber['data']=$this->home1->getPrNumber_supp($stream,$semester);
			$prnumber['tbl_name']=$tbl_name;
			$prnumber['stream1']=$stream;
			$prnumber['sem']=$semester;
			
			$this->load->view('supple_pr',$prnumber);
		}
		
		function getPr_enter_marks(){
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			
			$tbl_name=$stream.$semester;
			
			$this->load->model('home1');
			$prnumber['data']=$this->home1->getPrNumber_supp($stream,$semester);
			$prnumber['tbl_name']=$tbl_name;
			$prnumber['stream1']=$stream;
			$prnumber['sem']=$semester;
			
			$this->load->view('supple_pr_enter_marks',$prnumber);
		}
		
		
		function getMarks()
		{
			$stream=$this->input->post('stream1');
			$semester=$this->input->post('semester');
			
			$table_name=$this->input->post('table_name');
			$pr_number=$this->input->post('prnumber');
				
			if($this->input->post('select_option') == 1){
				if($stream == "ba_student_detail_"){
					$table_new="ba_sub_".$semester;
					$table_marks="ba_student_marks_".$semester;
					$reval_tbl="ba_reval_marks_".$semester;
				}
				else if($stream == "bsc_cmp_sci_student_detail_"){
					$table_new="bsc_cmp_sci_sub_".$semester;
					$table_marks="bsc_cmp_sci_student_marks_".$semester;
					$reval_tbl="bsc_cmp_sci_reval_marks_".$semester;
				}
				else if($stream == "bsc_student_detail_"){
					$table_new=" bsc_sub_".$semester;
					$table_marks="bsc_student_marks_".$semester;
					$reval_tbl="bsc_reval_marks_".$semester;
				}
			}
			else if($this->input->post('select_option') == 2){
				if($stream == "ba_student_detail_"){
					$table_new="ba_sub_".$semester;
					$table_marks="ba_student_marks_".$semester;
					$reval_tbl="ba_supple_marks_".$semester;
					$reval_tbl_retrive="ba_reval_marks_".$semester;
				}
				else if($stream == "bsc_cmp_sci_student_detail_"){
					$table_new="bsc_cmp_sci_sub_".$semester;
					$table_marks="bsc_cmp_sci_student_marks_".$semester;
					$reval_tbl="bsc_cmp_sci_supple_marks_".$semester;
					$reval_tbl_retrive="bsc_cmp_sci_reval_marks_".$semester;
				}
				else if($stream == "bsc_student_detail_"){
					$table_new=" bsc_sub_".$semester;
					$table_marks="bsc_student_marks_".$semester;
					$reval_tbl="bsc_supple_marks_".$semester;
					$reval_tbl_retrive="bsc_reval_marks_".$semester;
				}
			}
			
			$this->load->model('supplementary');
			//changed by simone on 3rd oct since not taking marks from fresh table
			//if($this->input->post('attempt') == 2)
			if($this->input->post('attempt') == 0)
			{
				/*get fresh semester marks and insert into supplementary*/
				$student_marks = $this->supplementary->getFreshMarks($pr_number,$table_marks);
				
				/*insert retrive data into supplementary table with attempt number and new seat number
*/
				$this->supplementary->insertFreshMarks($student_marks,$reval_tbl,$this->input->post('attempt'),$this->input->post('supple_seat_number'),$pr_number);
			
			
				/*Get remaining grace marks*/
				$gracemarks = $this->supplementary->getGrace($pr_number,$stream.$semester);
					
				foreach($gracemarks as $row)
				{
					$generalGrace = $row->gen_grace_remain;
					$nssGrace     = $row->entitlement_grace_remain; 
					$sportsGrace  = $row->sports_grace_remain;
				}	
				
				/* update grace marks in table*/
				$this->supplementary->updateGrace($generalGrace,$nssGrace,$sportsGrace,$reval_tbl,$pr_number,$this->input->post('attempt'));
			}
			else
			{
				/*get semester marks from 1 previous attempt from supplementary*/
				$student_marks = $this->supplementary->getAttemptMarks($pr_number,$reval_tbl,$this->input->post('attempt'));
				
				if(empty($student_marks)){
					die("NO Previous record Found..");
				}
			
				/*insert retrive data into supplementary table with attempt number and new seat number*/
				$this->supplementary->insertAttemptMarks($student_marks,$reval_tbl,$this->input->post('attempt'),$this->input->post('supple_seat_number'),$pr_number);
				
				/*Get remaining grace marks*/
				$a=$this->input->post('attempt');
				$a -=1;
				$gracemarks = $this->supplementary->getGrace2($pr_number,$a,$reval_tbl);
					
				foreach($gracemarks as $row)
				{
					$generalGrace = $row->gen_grace_remain;
					$nssGrace     = $row->nss_grace_remain; 
					$sportsGrace  = $row->sports_grace_remain;
				}	
				
				/* update grace marks in table*/
				$this->supplementary->updateGrace($generalGrace,$nssGrace,$sportsGrace,$reval_tbl,$pr_number,$this->input->post('attempt'));
				
			}
			
			
			
			/*display data*/
			$s=0;
			$subject_details=array();
			$final_marks=array();
			foreach($student_marks as $row)
			{
				if($row->pass_status =='P')
					unset($student_marks[$s]);
				else
				{
					/*get subject details*/
					$subject_details[] = $this->supplementary->getSubName($row->sub_id,$table_new);
					$final_marks [$row->sub_id] = $row;
				}
				$s++;
			}
			
			/*generate final structure*/
			$display_marks["subject_structure"] = $subject_details;
			$display_marks["marks"] = $final_marks;
			$display_marks["pr_number"] = $pr_number;
			$display_marks["no_of_attempt"]=$this->input->post('attempt');
			$display_marks["seat_number"]=$this->input->post('supple_seat_number');
			$display_marks["stream"]=$stream;
			$display_marks["semester"]=$semester;
			
				
			$this->load->view('supple_marksheet',$display_marks);
		}
	    function enter_marks()
		{
			$stream=$this->input->post('stream1');
			$semester=$this->input->post('semester');
			
			$table_name=$this->input->post('table_name');
			$pr_number=$this->input->post('prnumber');
				
			if($this->input->post('select_option') == 1){
			
			}
			else if($this->input->post('select_option') == 2){
				if($stream == "ba_student_detail_"){
					$table_new="ba_sub_".$semester;
					 
				}
				else if($stream == "bsc_cmp_sci_student_detail_"){
					$table_new="bsc_cmp_sci_sub_".$semester;
					
				}
				else if($stream == "bsc_student_detail_"){
					$table_new=" bsc_sub_".$semester;
					
				}
			}
			
			$this->load->model('supplementary');
			
			if($this->input->post('attempt'))
			{
			
			$studentSubjects=$this->supplementary->getStudentSubjects($pr_number,$stream.$semester,$table_new);
			
			}
			
			
			
			/*display data*/
			$s=0;
			$subject_details=array();
			
			foreach($studentSubjects as $row)
			{
			$display_marks["total_gen_grace_alloc"]=$row['gen_grace_alloc'];
			$display_marks["total_sports_grace_alloc"]=$row['sports_grace_alloc'];
			$display_marks["total_nss_grace_alloc"]=$row['entitlement_grace_alloc'];
			if($row['sports_grace_alloc']>0)
			$display_marks["sports_priority"]=1;
			else 
			$display_marks["sports_priority"]=0;
			
			if($row['entitlement_grace_alloc']>0)
			$display_marks["nss_priority"]=1;
			else 
			$display_marks["nss_priority"]=0;
		
			$stud_detail_arr=explode('student',$stream);
			
					/*get subject details*/
					for($i=1;$i<=8;$i++)
					{
					if($row['subj_'.$i]!="")
						{
						$subject_details[] = $this->supplementary->getSubName_entry($row['subj_'.$i],$table_new);
						
						$final_marks [$row['subj_'.$i]] = $this->supplementary->getAttemptMarksPrev($pr_number,$stud_detail_arr[0].'supple_marks_'.$semester,$this->input->post('attempt'),$row['subj_'.$i]) ;
						}
				    }
				$s++;
			}
			$display_marks["gen_grace_alloc"]=0;
			$display_marks["sports_grace_alloc"]=0;
			$display_marks["nss_grace_alloc"]=0;
			/*generate final structure*/
			$display_marks["subject_structure"] = $subject_details;
			$display_marks["marks"] = $final_marks;
			$display_marks["pr_number"] = $pr_number;
			$display_marks["supple_seat_number"] =$this->input->post('supple_seat_number');
			$display_marks["no_of_attempt"]=$this->input->post('attempt');
			$display_marks["stream"]=$stream;
			$display_marks["semester"]=$semester;
			 /*  echo '<pre>';
				print_r($display_marks);   */ 
			
			$this->load->view('supple_marksheet_enter_marks',$display_marks);
		}
	   
	   function freshToSupplementary()
	   {
	   if($this->input->post('convert'))
	   {
	   $main_table=$this->input->post('stream').'_student_detail_sem_'.$this->input->post('semester');
	   $supplementary_table=$this->input->post('stream').'_supple_marks_sem_'.$this->input->post('semester');
	   $fresh_marks_table=$this->input->post('stream').'_student_marks_sem_'.$this->input->post('semester');
	   $this->load->model('home1');
	   $this->home1->convert_fresh_to_supplementary($main_table,$supplementary_table,$fresh_marks_table,$this->input->post('students'));

	   }
	   $this->load->view('freshToSupplementary');
	   }
	   
	   function get_fresh_students()
	   {
	   $this->load->model('home1');
	   $tbl_name=$this->input->get('stream').'_student_detail_sem_'.$this->input->get('semester');
		$data=$this->home1->get_fresh_students($tbl_name);
			
	   echo '<br /><br /><br /><table class="main_table" border=1 width=50%;> <thead><tr >
					<th class="table-header-repeat line-left minwidth-1">Select</th>
					<th class="table-header-repeat line-left minwidth-1">PR Number</th>
					<th class="table-header-repeat line-left minwidth-1">Name</th>
					
						</tr>';
			
						foreach($data as $row){
						
						echo '<tr> 
								<td><input type="checkbox" value="'.$row->pr_number.'" name="students[]" /></td>
								<td>'.$row->pr_number.'</td>
								
								<td>'.$row->name.'</td>
								
							</tr>';
						}	
						if(sizeof($data)==0)
						{
						echo '<tr> 
								<td colspan="3">No Student Found</td>
								</tr>';
						}
						echo "</table><br /><br />
						<input type='submit' class='my_button_submit' value='Convert' name='convert' onclick='return validate_convert();' />
						
						";
	   }
	
		function freshToSupplementaryPrevious()
	   {
	   if($this->input->post('convert'))
	   {
	   $main_table=$this->input->post('stream').'_student_detail_sem_'.$this->input->post('semester');
	   $supplementary_table=$this->input->post('stream').'_supple_marks_sem_'.$this->input->post('semester');
	   $fresh_marks_table=$this->input->post('stream').'_student_marks_sem_'.$this->input->post('semester');
	   $this->load->model('home1');
	   $this->home1->convert_fresh_to_supplementary_previous($main_table,$supplementary_table,$fresh_marks_table,$this->input->post('students'));

	   }
	   $this->load->view('freshToSupplementaryPrevious');
	   }
	   
	   function get_fresh_students_previous()
	   {
	   $this->load->model('home1');
	   $tbl_name=$this->input->get('stream').'_student_detail_sem_'.$this->input->get('semester');
	   $supplementary_table=$this->input->get('stream').'_supple_marks_sem_'.$this->input->get('semester');
	   $fresh_table=$this->input->get('stream').'_student_marks_sem_'.$this->input->get('semester');
	   $data=$this->home1->get_fresh_students_previous($tbl_name,$supplementary_table,$fresh_table);
		
	   echo '<br /><br /><br /><table class="main_table" border=1 width=50%;> <thead><tr >
					<th class="table-header-repeat line-left minwidth-1">Select</th>
					<th class="table-header-repeat line-left minwidth-1">PR Number</th>
					<th class="table-header-repeat line-left minwidth-1">Exam Type</th>
					<th class="table-header-repeat line-left minwidth-1">Name</th>
					
						</tr>';
			
						foreach($data as $row){
						$type='Fresh';
						if($row->supplementary==1)
							$type='Supplementary';
						echo '<tr> 
								<td><input type="checkbox" value="'.$row->pr_number.'_'.$row->supplementary.'" name="students[]" /></td>
								<td>'.$row->pr_number.'</td>
								<td>'.$type.'</td>
								
								<td>'.$row->name.'</td>
								
							</tr>';
						}	
						if(sizeof($data)==0)
						{
						echo '<tr> 
								<td colspan="3">No Student Found</td>
								</tr>';
						}
						echo "</table><br /><br />
						<input type='submit' class='my_button_submit' value='Convert' name='convert' onclick='return validate_convert();' />
						
						";
	   }
	
	}
?>