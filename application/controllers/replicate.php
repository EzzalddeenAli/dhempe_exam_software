<?php
	class replicate extends CI_Controller{
	
		function __construct()
	{ 
		parent::__construct();
		
		$this->load->model('repli');
		
		
	}

	
	
		function index(){
		
			$this->load->view('home');
		}
		
		
		function create(){
		$a['m']='';
		$this->load->view('add_year',$a);
		}
		
		function create_year()
		{
		$var=$this->input->post('year');
		$part=$this->input->post('part');
		 $sql='CREATE DATABASE dhempe_exam_'.$var.'_'.$part;
		$this->db->query($sql); 
		$this->repli->year($var,$part);
		$a['m']="Database created sucessfully";
		$this->load->view('add_year',$a);
		}
		
}