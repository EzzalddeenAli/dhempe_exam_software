<?php

	class revalController extends CI_Controller{
		
		//loads views
		function index(){
			$this->load->view('reval');
		}
		
		function getPr(){
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			
			$tbl_name=$stream.$semester;
			
			$this->load->model('home1');
			$prnumber['data']=$this->home1->getPrNumber($stream,$semester);
			$prnumber['tbl_name']=$tbl_name;
			$prnumber['stream1']=$stream;
			$prnumber['sem']=$semester;
			
			$this->load->view('select_pr_for_reval',$prnumber);
		}
		
		function getMarks(){
			$stream=$this->input->post('stream1');
			$semester=$this->input->post('semester');
			$counter=0;
			$table_name=$this->input->post('table_name');
			$pr_number=$this->input->post('prnumber');
			
			$this->load->model('home1');
			
			
			/* modified on 1 may 2013 starts here */
			
			$no_of_attempts = $this->input->post('attempt');
			$supple_seat_no = $this->input->post('supple_seat_number');
			
			/* modified on 1 may 2013 ends here */
			
			//get subject detail
			$subject_id=$this->home1->getSubjectDetail($table_name,$pr_number);
			
	
			
			foreach($subject_id as $row){
				$name=$row->name;
				$sub_id[]=$row->subj_1;
				$sub_id[]=$row->subj_2;
				$sub_id[]=$row->subj_3;
				$sub_id[]=$row->subj_4;
				$sub_id[]=$row->subj_5;
				$sub_id[]=$row->subj_6;
				$sub_id[]=$row->subj_7;
				if($row->subj_8 != ""){
					$sub_id[]=$row->subj_8;
				}	
			}
			
			$attempt_flag =0;
			
			if(($semester == "sem_1")||($semester == "sem_2")){
				$counter=8;
			}
			else if(($semester == "sem_3")||($semester == "sem_4")){
				$counter=7;
			}
			
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
				else if($stream == "bcom_student_detail_"){
					$table_new=" bcom_sub_".$semester;
					$table_marks="bcom_student_marks_".$semester;
					$reval_tbl="bcom_reval_marks_".$semester;
				}
			}
			else if($this->input->post('select_option') == 2){
				
				if($no_of_attempts != 2){
					$attempt_flag=1;
				}
				
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
				else if($stream == "bcom_student_detail_"){
					$table_new=" bcom_sub_".$semester;
					$table_marks="bcom_student_marks_".$semester;
					$reval_tbl="bcom_supple_marks_".$semester;
					$reval_tbl_retrive="bcom_reval_marks_".$semester;
				}
			}
			
			$use_old_grace=0;
			
			//get marks
			if($this->input->post('select_option') == 1){
				for($k=0;$k<count($sub_id);$k++){
					$marks[]=$this->home1->getStudentMarks($table_marks,$pr_number,$sub_id[$k]);
				}
			}else if($attempt_flag == 0){
				for($k=0;$k<count($sub_id);$k++){
					$use_old_grace=1;
					$marks[]=$this->home1->getStudentMarks($reval_tbl_retrive,$pr_number,$sub_id[$k]);
				}
				if(count($marks[0]) == 0 ){
					$use_old_grace=0;
					$marks=array();
					for($k=0;$k<count($sub_id);$k++){
						$marks[]=$this->home1->getStudentMarks($table_marks,$pr_number,$sub_id[$k]);
					}
				}
			}
			else{
				
			}
			
			
			if(count($marks) != $counter){
				echo "Marks are not  available for calculation";
				exit();
			}
			
			//get grace
			$grace=$this->home1->getRemainingGrace($stream.$semester,$pr_number);
			
			for($i=0;$i<$counter;$i++){
				$subject_details[]=$this->home1->getSubject($table_new,$sub_id[$i]);
			}
			
			$temp['mark_structures']=$subject_details;
			$temp['student_name']=$name;
			$temp['register_number']=$pr_number;
			$temp['marks_tbl']=$table_marks;
			$temp['stud_marks']=$marks;
			$temp['revaluation']=$reval_tbl;
			$temp['grace_detail']=$grace;
			$temp['sub_tbl']=$table_name;
			$temp['up_tbl']=$stream.$semester;
			$temp['option']=$this->input->post('select_option');
			$temp['old_grace']=$use_old_grace;
			$temp['no_of_attempt'] = $no_of_attempts;
			$temp['latest_seat_number'] = $supple_seat_no;
		
			$this->load->view('reval_marksheet',$temp);
		}
	}
?>