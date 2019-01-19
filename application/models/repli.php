<?php

	class repli extends CI_Model{
	
	function __construct()
	{ 
		parent::__construct();
	}
		
		function year($var,$semester_part)
		{   include(APPPATH.'config/database'.EXT);
		    
			
			$sql='SHOW TABLES FROM '.$db["default"]["database"].'';//take names of all tables from database
			$sql2=$this->db->query($sql);
			$dbnamearr=explode('_',$db["default"]["database"]);
			$main_name=$dbnamearr[0].'_'.$dbnamearr[1];
			foreach($sql2->result_array() as $row){
						
						$sql1= 'CREATE TABLE '.$main_name.'_'.$var.'_'.$semester_part.'.'.$row['Tables_in_'.$db["default"]["database"].''].' like '.$db["default"]["database"].'.'.$row['Tables_in_'.$db["default"]["database"].''].'';
						
							$this->db->query($sql1);//create all duplicate tables
						
							for($i=1;$i<=4;$i++)
							{
								$part=stristr($row['Tables_in_'.$db["default"]["database"].''],'sub_sem_'.$i.'',true); //copy data of tables required %sub_sem_%
								if($part!="")
								{
									$sql3='insert into '.$main_name.'_'.$var.'_'.$semester_part.'.'.$part.'sub_sem_'.$i.' SELECT * FROM '.$db["default"]["database"].'.'.$part.'sub_sem_'.$i.'';
									$this->db->query($sql3);
								}
							}
					}
				foreach($sql2->result_array() as $row){	
					for($i=1;$i<=3;$i++)
							{
							 $next_sem=$i+1;
								$part=stristr($row['Tables_in_'.$db["default"]["database"].''],'_student_detail_sem_'.$i.'',true); //copy data of tables required %_student_detail_sem_%
								if($part!="")
								{
									$sql3='insert into '.$main_name.'_'.$var.'_'.$semester_part.'.'.$part.'_student_detail_sem_'.$next_sem.' (`pr_number`, `seat_number`, `gender`, `name`, `sports_category`, `sports_rewards`, `gen_grace_alloc`, `entitlement_grace_alloc`, `sports_grace_alloc`, `gen_grace_remain`, `entitlement_grace_remain`, `sports_grace_remain`, `subj_1`, `subj_2`, `subj_3`, `subj_4`, `subj_5`, `subj_6`, `subj_7`, `subj_8`, `date`, `special_priority_tag`, `supplementary`, `block`) (SELECT  pr_number,seat_number,gender,name,"","",0,0,0,0,0,0,"","","","","","","","","0000-00-00","",supplementary,0  FROM '.$db["default"]["database"].'.'.$part.'_student_detail_sem_'.$i.' where supplementary=0)';
									$this->db->query($sql3);
								}
							}
						
				}
					
				$sql4='insert into '.$main_name.'_'.$var.'_'.$semester_part.'.users SELECT * FROM '.$db["default"]["database"].'.users';	
				$sql5='insert into '.$main_name.'_'.$var.'_'.$semester_part.'.sports_marks SELECT * FROM '.$db["default"]["database"].'.sports_marks';	
				$this->db->query($sql4);$this->db->query($sql5);
					
		
		}
		
}		