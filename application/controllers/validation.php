<?php

	class validation extends CI_Controller{
		
		function checkpr(){
			$id=$this->input->post('input');
			$stream=$this->input->post('stream2');
			$type=$this->input->post('type');
				
			$this->load->model('home1');
			$status=$this->home1->getDetailOfPr($stream,$id,$type);
			
			if(empty($status)){
				echo 0;
			}else{
				echo 1;
			}
		}
	}
?>