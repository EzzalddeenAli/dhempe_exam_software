<?php

	class login extends CI_Controller{
		
		function index(){
			$this->load->view('login_page');
		}
	
		function home(){
			$this->load->view('home');
		}
		
		function check(){
			$username=$this->input->post('email');
			$password=$this->input->post('password');
			
			$this->load->model('check_login');
			$result=$this->check_login->check($username,$password);
			
			//if($result == 1){
			$flag=1;
			   if($this->input->post('year') && $this->input->post('part'))// both are set
				{
				$this->load->dbutil();
				if ( !($this->dbutil->database_exists('dhempe_exam_'.$this->input->post('year').'_'.$this->input->post('part'))))//database does not exit
					{
					   echo '<span style="font-size:20px;color:white;">Invalid Year/Part Selection</span>';
					   $flag=0;
					   
					   $this->logout();
					}
					
				} 
				if($flag==1)
				{
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['password']=$password;
				$_SESSION['year']=$this->input->post('year');
				$_SESSION['part']=$this->input->post('part'); 
				$sessiondata=array('year'=>$this->input->post('year'),'part'=>$this->input->post('part'));
				$this->session->set_userdata($sessiondata);
				$this->load->view('home');
				}
			//}
			else{
				$this->load->view('login_page');
			}
		}
		
		function logout(){
			session_start();
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			$this->load->view('login_page');
		}
	}
?>