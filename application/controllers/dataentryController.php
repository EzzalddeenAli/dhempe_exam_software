<?php

	class dataentryController extends CI_Controller{
		
		//insert data entry marks to a selected table
		function insertStuDataSubject(){
			$counter=$this->input->post('counter');
			$sub_id=$this->input->post('subject_id');
			$tbl_name=$this->input->post('tbl_marks_enter');
			$flag=0;
			
			if(($tbl_name == "bsc_student_marks_sem_2")||($tbl_name == "bsc_student_marks_sem_1")||($tbl_name == "bsc_student_marks_sem_3")||($tbl_name == "bsc_student_marks_sem_4")){
				$flag=1;
			}
			if(($tbl_name == "bsc_cmp_sci_student_marks_sem_1")||($tbl_name == "bsc_cmp_sci_student_marks_sem_2")||($tbl_name == "bsc_cmp_sci_student_marks_sem_3")||($tbl_name == "bsc_cmp_sci_student_marks_sem_4")){
				$flag=1;
			}
		
			for($i=1;$i<=$counter;$i++){
				$pract=$this->input->post('pract'.$i);
				$isa=$this->input->post('isa'.$i);
				$see=$this->input->post('see'.$i);
				
				if($see == "A"){
					$see_set="A";
				}else{
					$see_set="";
				}
				
				if($isa == 'A'){
					$isa_set='A';
				}else{
					$isa_set="";
				}
				
				if($pract == 'A'){
					$pract_set="A";
				}else{
					$pract_set="";
				}
				
				if($flag == 1){
					$pract_marks_temp=0;
					$pract_marks=$pract;
				}
				else{
					if($pract == -1){
						$pract_marks=-1;
						$pract_marks_temp=0;
					}
					else{
						$pract_marks=$pract;
						$pract_marks_temp=$pract;
					}
				}
				
				
				$data=array(
					"sub_id"=>$sub_id,
					"pr_number"=>$this->input->post('pr_number'.$i),
					"isa_abs"=>$isa_set,
					"see_abs"=>$see_set,
					"pract_abs"=>$pract_set,
					"internal"=>$this->input->post('isa'.$i),
					"theory"=>$this->input->post('see'.$i),
					"practicle"=>$pract_marks,
					"total"=>$this->input->post('isa'.$i)+$this->input->post('see'.$i)+$pract_marks_temp
				);
				
				//delete if already data exist
				$this->load->model('dataentry');
				$this->dataentry->deleteExist($tbl_name,$this->input->post('pr_number'.$i),$sub_id);
				
				//insert query code
				$this->dataentry->insertDataSubj($tbl_name,$data);
				
				//load view
				$this->load->view('select_stream_sem_for_data_entry');

			}	
		}
		
		function select_stream_sem_cal(){
			$this->load->view('select_student_to_enter_marks');
		}
	
	}
?>