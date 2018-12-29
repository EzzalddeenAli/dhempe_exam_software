<?php

	class home1 extends CI_Model{


	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('year') && $this->session->userdata('part'))// both are set
		{
			echo "called when year is set";
			//$new_db = $this->load->database('dhempe_exam_2017_2',TRUE);
			$new_db = $this->load->database($this->session->userdata('year').'_'.$this->session->userdata('part'), TRUE );
			echo "this is happening";
	    $this->db = $new_db;

		}
	}

		//Add student to a particular stream and semester
		function addStudentDetail($tbl_name,$data){
			$this->db->insert($tbl_name,$data);
		}

		//function get search data by name
		function getSearchdata($clm_nme,$searchData,$tbl_name){
			$data=array();
			if($searchData != ""){
				$this->db->like($clm_nme,$searchData,'after');
				$q=$this->db->get($tbl_name);

				if($q->num_rows() > 0){
					foreach($q->result() as $row){
						$data[]=$row;
					}
				}
			}
			return $data;
		}
		//***************************************
function getSearchdatas($clm_nme,$searchData,$tbl_name){
			$data=array();
			if($searchData != ""){
				//$this->db->like($clm_nme,$searchData,'after');
				//$q=$this->db->get($tbl_name);
				//echo $this->db->last_query();

				$q=$this->db->query('select * from exam_software.'.$tbl_name.' where '.$clm_nme.' like "'.$searchData.'%"');

				if($q->num_rows() > 0){
					foreach($q->result() as $row){
						$data[]=$row;
					}
				}
			}
			return $data;
		}

//******************************************

		//update  student detail
		function updateStudentDetail($table_name,$data,$pr_number){
			$this->db->where('pr_number',$pr_number);
			$this->db->update($table_name,$data);
		}
		//update  student detail new
		function updateStudentDetailNew($table_name,$data,$array){
			$this->db->where($array);
			$this->db->update($table_name,$data);
		}
		function updateStudentDetailBlocked($pr_number,$supplementary,$block,$now_eligible,$table){
			$array=array('pr_number'=>$pr_number,'supplementary'=>$supplementary);
			$data=array('block'=>$block);
			$this->db->where($array);
			$this->db->update($table,$data);
		}

		//get register number of a student from a particular table name
		function getPrNumber($stream,$semester){
			$data=array();
			$this->db->select('*');
			$this->db->from($stream.$semester);
			$q=$this->db->get();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}


		//get register number of a student from a particular table name
		function getPrNumber_supp($stream,$semester){
			$data=array();
			$this->db->select('*');
			$this->db->from($stream.$semester);
			$this->db->where('supplementary',1);
			$q=$this->db->get();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}

		//get subject id to generate marksheet for a particular student
		function getSubjectDetail($table_name,$pr_number){
			$this->db->select('*');
			$this->db->from($table_name);
			$this->db->where('pr_number',$pr_number);
			$q=$this->db->get();

			//$data=array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
				return $data;
			}
		}

		//get subject related to subject id
		function getSubject($table_new,$sub_id){
			$this->db->select('*');
			$this->db->from($table_new);
			$this->db->where('sub_id',$sub_id);
			$q=$this->db->get();

			$data=null;

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data=$row;
				}
			}
			return $data;
		}

		//get sports grace marks allocation according to category and rewards
		function getSportsMarks($sports_category,$rewards){
			$this->db->select('*');
			$this->db->from('sports_marks');
			$this->db->where('category',$sports_category);
			$q=$this->db->get();
			$data=array();
			foreach($q->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
		//get sports grace marks allocation according to category and rewards
		function getNccNssMarks($ncc_nss_category){
			$categories = explode(',', $ncc_nss_category);
			$sum = 0;
			foreach($categories as $category) {
				$category = trim($category);
				$this->db->select('*');
				$this->db->from('ncc_nss_marks');
				$this->db->where('category',$category);
				$q=$this->db->get();
				foreach($q->result() as $row){
					$sum =$sum + $row->marks;
				}
			}
			return $sum;
		}

		//check is student data exist is exist than delete Iterator
		function deleteExistingStudent($tbl_name,$register_number){
			$this->db->where('pr_number',$register_number);
			$this->db->delete($tbl_name);
		}

		//insert student data into a particular table
		function insertStudentDetail($tbl_name,$data){
			$this->db->insert($tbl_name,$data);
		}

		//update marks Inserting symbols for grace
        function updateMarks($marks_update,$tbl_name){
            $symbol_marks=$marks_update['symbol'];
            $marks=$marks_update['mark'];
            $this->db->where($marks);
            $this->db->update($tbl_name,$symbol_marks);
        }

		//update general marks
		function updateMarkInnerHead($marks_update,$tbl_name){
			$symbol_marks=$marks_update['symbol'];
            $marks=$marks_update['mark'];
            $this->db->where($marks);
            $this->db->update($tbl_name,$symbol_marks);
		}

		//update marks inserting symbols for grace
        function updateSportsMarks($marks_update,$tbl_name){
            $symbol_marks=$marks_update['symbol'];
            $marks=$marks_update['mark'];
            $this->db->where($marks);
            $this->db->update($tbl_name,$symbol_marks);
        }

		//get Student marks
		function getStudentMarks($tbl_name,$pr_number,$sub_id){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$this->db->where('sub_id',$sub_id);
			$q=$this->db->get();

			$data=array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data=$row;
				}
			}
			return $data;
		}

		//get grace marks
		function getRemainingGrace($tbl_name,$pr_number){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q=$this->db->get();

			$data=array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}

		function getSubMark($tbl_name,$register_number){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$register_number);
			$q=$this->db->get();

			$data=array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}

		//get detail of selected student PR
		function getDetailOfPr($tbl_name,$pr_number,$type){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$this->db->where('supplementary',$type);
			$q=$this->db->get();

			$data=array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[]=$row;
				}
			}
			return $data;
		}

		//delete student if exist in database
		function deleteExistStud($pr_number,$table_name,$type){
			$this->db->select('*');
			$this->db->from($table_name);
			$this->db->where('pr_number',$pr_number);
			$this->db->where('supplementary',$type);
			$q=$this->db->get();

			if($q->num_rows() > 0){
				echo "PR Number-Exam Type already Exist";
				unset($q);
				die();
			}
		}

		//Check PR
		function checkPR($pr_number,$tbl_name,$data,$old_pr){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$q=$this->db->get();
			//echo $this->db->last_query();
			if($q->num_rows() > 0){
				echo "PR Number already Exist";
				unset($q);
				die();
			}
			//delete data with old PR
			$this->db->where('pr_number',$old_pr);
			$this->db->delete($tbl_name);
			//echo $this->db->last_query();
			//insert data with new pr
			$this->db->insert($tbl_name,$data);
			//echo '<br>'.$this->db->last_query();
			//additional by simone to update in other tables
			if($this->input->post('pr') != $this->input->post('pr_number'))
				{$splitarr=explode('_student_detail_',$tbl_name);
				$stream=$splitarr[0];
				$sem=$splitarr[1];

				$old=$this->input->post('pr');
				$new=$this->input->post('pr_number');
				if($this->input->post('type')==0)//fresh
				{$other_table=$stream.'_student_marks_'.$sem;}
				else
				{$other_table=$stream.'_supple_marks_'.$sem;}
				$this->updatePRno($old,$new,$other_table);
				}
			if($this->input->post('Seat') != $this->input->post('seat_old'))
				{$splitarr=explode('_student_detail_',$tbl_name);
				$stream=$splitarr[0];
				$sem=$splitarr[1];

				$old=$this->input->post('seat_old');
				$new=$this->input->post('Seat');
				if($this->input->post('type')==1)//supp
				{$other_table=$stream.'_supple_marks_'.$sem;}
				//update seat not required in supp table
				//$this->updateSeatno($old,$new,$other_table);
				}
		}
		function checkPRNew($pr_number,$tbl_name,$data,$old_pr,$old_type,$type){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('pr_number',$pr_number);
			$this->db->where('supplementary',$type);
			$q=$this->db->get();
			//echo $this->db->last_query();
			if($q->num_rows() > 0){
				echo "PR Number for The Selected Exam Type already Exists";
				unset($q);
				die();
			}
			//delete data with old PR and type
			$this->db->where('pr_number',$old_pr);
			$this->db->where('supplementary',$old_type);
			$this->db->delete($tbl_name);
			//echo $this->db->last_query();
			//insert data with new pr
			$this->db->insert($tbl_name,$data);
			//echo '<br>'.$this->db->last_query();
			//additional by simone to update in other tables
			if($this->input->post('pr') != $this->input->post('pr_number'))
				{$splitarr=explode('_student_detail_',$tbl_name);
				$stream=$splitarr[0];
				$sem=$splitarr[1];

				$old=$this->input->post('pr');
				$new=$this->input->post('pr_number');
				if($this->input->post('type')==0)//fresh
				{$other_table=$stream.'_student_marks_'.$sem;}
				else
				{$other_table=$stream.'_supple_marks_'.$sem;}
				$this->updatePRno($old,$new,$other_table);
				}
			if($this->input->post('Seat') != $this->input->post('seat_old'))
				{$splitarr=explode('_student_detail_',$tbl_name);
				$stream=$splitarr[0];
				$sem=$splitarr[1];

				$old=$this->input->post('seat_old');
				$new=$this->input->post('Seat');
				if($this->input->post('type')==1)//supp
				{$other_table=$stream.'_supple_marks_'.$sem;}
				//update seat not required in supp table
				//$this->updateSeatno($old,$new,$other_table);
				}
		}


		function updatePRno($old,$new,$other_table)
		{
		$this->db->update($other_table,array('pr_number'=>$new),array('pr_number'=>$old));
		//echo '<br>'.$this->db->last_query();
		//exit;
		}
		function updateSeatno($old,$new,$other_table)
		{
		$this->db->update($other_table,array('supple_seat_number'=>$new),array('supple_seat_number'=>$old));
		//echo '<br>'.$this->db->last_query();
		//exit;
		}
		//update pass status in database
		function passStatus($subject_id,$pr_number,$tbl_name,$result){

			$data=array('pass_status'=>$result);
			$this->db->where('sub_id',$subject_id);
			$this->db->where('pr_number',$pr_number);
			//added by simone only for supplementary
			if($this->input->post('no_of_attempt'))
			$this->db->where('no_of_attempts',$this->input->post('no_of_attempt'));
			$this->db->update($tbl_name,$data);
		}

		//update pass status in database for issue in supplementary
		function passStatus_issue($subject_id,$pr_number,$tbl_name,$result,$no_of_attempt){

			$data=array('pass_status'=>$result);
			$this->db->where('sub_id',$subject_id);
			$this->db->where('pr_number',$pr_number);
			//added by simone only for supplementary
			$this->db->where('no_of_attempts',$no_of_attempt);
			$this->db->update($tbl_name,$data);
			echo '<br>'.$this->db->last_query();
		}

		//update add total
		function addPractTotal($sub_id,$pr_num,$tbl_name,$marks){
			$data=array('pract_total'=>$marks);
			$this->db->where('sub_id',$sub_id);
			$this->db->where('pr_number',$pr_num);
			$this->db->update($tbl_name,$data);
		}

		//update special priority tag
		function updateSpecialPriority($tbl_name,$register_number){
			$data=array('special_priority_tag'=>'*');
			$this->db->where('pr_number',$register_number);
			$this->db->update($tbl_name,$data);
		}

		//check marks calculated or notes_body
		function checkmarks($tbl_name){
			$this->db->select('pass_status');
			$this->db->from($tbl_name);
		}

		//modified on 18 April 13
		function getStudentData($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->order_by('seat_number','ASC');
			$q = $this->db->get();

			$data =array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[] = $row;
				}
			}

			return $data;
		}
		function getStudentDataBlocked($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('block',1);
			$this->db->order_by('seat_number','ASC');
			$q = $this->db->get();

			$data =array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[] = $row;
				}
			}

			return $data;
		}
		function getStudentDataToBlock($tbl_name){
			$this->db->select('*');
			$this->db->from($tbl_name);
			$this->db->where('block',0);
			$this->db->order_by('seat_number','ASC');
			$q = $this->db->get();

			$data =array();

			if($q->result() > 0){
				foreach($q->result() as $row){
					$data[] = $row;
				}
			}

			return $data;
		}

		//modified on 18 april 13
		function getSubjname($subj_code,$tbl_name){
			$this->db->select('sub_name');
			$this->db->from($tbl_name);
			$this->db->where("sub_id",$subj_code);
			$q = $this->db->get();

			$sub_name = "";

			foreach($q->result() as $row){
				$sub_name = $row->sub_name;
			}

			return $sub_name;
		}
		function get_fresh_students($table)
			{
			$data=array();

			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('supplementary',0);
			$this->db->order_by('pr_number');
				$q=$this->db->get();

				if($q->num_rows() > 0){
					foreach($q->result() as $row){
						$data[]=$row;
					}
				}

			return $data;
		}

		function convert_fresh_to_supplementary($main_table,$supplementary_table,$fresh_marks_table,$students)
		{
		  foreach($students as $pr_number)
		   {
		   $this->db->query("delete from  ".$main_table."  where pr_number='".$pr_number."' and supplementary=1");// check if entry exists--> delete
		   $this->db->query("insert into ".$main_table." (pr_number,seat_number,name,gender,sports_category,sports_rewards,gen_grace_alloc,entitlement_grace_alloc,sports_grace_alloc,gen_grace_remain,entitlement_grace_remain,sports_grace_remain,subj_1,subj_2,subj_3,subj_4,subj_5,subj_6,subj_7,subj_8,special_priority_tag,date,block,supplementary)  (select pr_number,seat_number,name,gender,sports_category,sports_rewards,gen_grace_alloc,entitlement_grace_alloc,sports_grace_alloc,gen_grace_remain,entitlement_grace_remain,sports_grace_remain,subj_1,subj_2,subj_3,subj_4,subj_5,subj_6,subj_7,subj_8,special_priority_tag,date,block,1 from ".$main_table."  where pr_number='".$pr_number."')");
		   $this->db->query("delete from  ".$supplementary_table."  where pr_number='".$pr_number."' and no_of_attempts=1");// check if entry exists--> delete
		   $this->db->query("insert into ".$supplementary_table." (sub_id,pr_number,supple_seat_number,no_of_attempts,isa_abs,see_abs,pract_abs,internal,theory,practicle,total,gen_symbol,activity_symbol,gen_the_symbol,gen_the_pract_sym,gen_grace_remain,nss_grace_remain,sports_grace_remain,pass_status) (select sub_id,".$main_table.".pr_number,seat_number,1,isa_abs,see_abs,pract_abs,internal,theory,practicle,total,gen_symbol,activity_symbol,gen_the_symbol,gen_the_pract_sym,gen_grace_remain,entitlement_grace_remain,sports_grace_remain,pass_status from ".$fresh_marks_table." INNER JOIN ".$main_table." on ".$fresh_marks_table.".pr_number=".$main_table.".pr_number where ".$main_table.".pr_number='".$pr_number."' and supplementary=0)");

		   }
		  }
		function get_fresh_students_previous($tbl_name,$supplementary_table,$fresh_table)
			{
			$data=array();
			$dbArr=explode('_',$this->db->database);
			$year=$dbArr[sizeof($dbArr)-2];
			$part=$dbArr[sizeof($dbArr)-1];

			if($part==1)// 1st part=> prev year
				{$year=$year-1;$part=$part+1;}
			else // 2nd part-> prev part
				$part=$part-1;

			$prev = $this->load->database($year.'_'.$part, TRUE);
			$q=$prev->query('select name,'.$tbl_name.'.pr_number,supplementary,pass_status from '.$tbl_name.' INNER JOIN '.$fresh_table.' on '.$tbl_name.'.pr_number='.$fresh_table.'.pr_number where supplementary=0 and '.$tbl_name.'.pr_number not in(select pr_number from '.$tbl_name.' where supplementary=1) and pass_status="F" GROUP BY '.$tbl_name.'.pr_number	');// fresh students who have failed in atleast 1
			//echo $prev->last_query();

				if($q->num_rows() > 0){
					foreach($q->result() as $row){
						$data[]=$row;
					}
				}

			//$q=$prev->query('SELECT * FROM (select * from '.$table.' order by supplementary desc ) x GROUP BY pr_number ORDER BY `pr_number`');
			$q=$prev->query('select name,pr_number,supplementary from '.$tbl_name.' where pr_number in(select a.pr_number from '.$supplementary_table.' a INNER JOIN (SELECT max(no_of_attempts)as no_of_attempts,pr_number from '.$supplementary_table.'   GROUP BY pr_number) b where a.pr_number=b.pr_number and a.no_of_attempts=b.no_of_attempts and a.pass_status="F" GROUP BY a.pr_number)  and supplementary=1');// supplementary students who have failed in atleast 1
			//echo $prev->last_query();

				if($q->num_rows() > 0){
					foreach($q->result() as $row){
						$data[]=$row;
					}
				}

			/* echo '<pre>';
			print_r($data); */
			return $data;
		}

		function convert_fresh_to_supplementary_previous($main_table,$supplementary_table,$fresh_marks_table,$students)
		{

		$dbArr=explode('_',$this->db->database);

			$year=$dbArr[sizeof($dbArr)-2];
			$part=$dbArr[sizeof($dbArr)-1];

			if($part==1)// 1st part=> prev year
				{$year=$year-1;$part=$part+1;}
			else // 2nd part-> prev part
				$part=$part-1;
			//echo $year.'_'.$part;

			$prev   = $this->load->database($year.'_'.$part, TRUE);
			$current = $this->load->database('default', TRUE);

		  foreach($students as $pr_number_type)
		   {
		   $stud_Arr=explode('_',$pr_number_type);
		   $pr_number=$stud_Arr[0];

		   $current->query("delete from  ".$main_table."  where pr_number='".$pr_number."' and supplementary='1'");// check if entry exists--> delete

		   $q=$prev->query("select pr_number,seat_number,name,gender,sports_category,sports_rewards,gen_grace_alloc,entitlement_grace_alloc,sports_grace_alloc,gen_grace_remain,entitlement_grace_remain,sports_grace_remain,subj_1,subj_2,subj_3,subj_4,subj_5,subj_6,subj_7,subj_8,special_priority_tag,date,block,1 as supplementary from ".$main_table."  where pr_number='".$pr_number."' and supplementary=".$stud_Arr[1]."");
		   $data=array();
		   if($q->num_rows() > 0){
					foreach($q->result_array() as $row){

						$current->insert($main_table,$row);
					}
				}



		   $current->query("delete from  ".$supplementary_table."  where pr_number='".$pr_number."' ");// check if entry exists--> delete
		   $marks_table=$supplementary_table;
		   if($stud_Arr[1]==0)// fresh to supp
		   {
		   $marks_table=$fresh_marks_table;
		   $q=$prev->query("select sub_id,".$main_table.".pr_number,seat_number as supple_seat_number,1 as no_of_attempts,isa_abs,see_abs,pract_abs,internal,theory,practicle,total,gen_symbol,activity_symbol,gen_the_symbol,gen_the_pract_sym,gen_grace_remain,entitlement_grace_remain as nss_grace_remain,sports_grace_remain,pass_status from ".$marks_table." INNER JOIN ".$main_table." on ".$marks_table.".pr_number=".$main_table.".pr_number where ".$main_table.".pr_number='".$pr_number."' and supplementary=0");
		   }
		   else{

		   $q=$prev->query("select sub_id,".$main_table.".pr_number,supple_seat_number, no_of_attempts,isa_abs,see_abs,pract_abs,internal,theory,practicle,total,gen_symbol,activity_symbol,gen_the_symbol,gen_the_pract_sym,".$main_table.".gen_grace_remain,".$main_table.".entitlement_grace_remain as nss_grace_remain,".$main_table.".sports_grace_remain,pass_status from ".$marks_table." INNER JOIN ".$main_table." on ".$marks_table.".pr_number=".$main_table.".pr_number where ".$main_table.".pr_number='".$pr_number."' and supplementary=1 and no_of_attempts = (SELECT max(no_of_attempts) as no_of_attempts from ".$marks_table." where pr_number='".$pr_number."')");
		   }
		   $data=array();
		   if($q->num_rows() > 0){
					foreach($q->result_array() as $row){

						$current->insert($supplementary_table,$row);
					}
				}


		   }
		  }
		  function getNumberSubjects($stream,$semester){
			$stream_details=explode('_',$stream);
			$stream=$stream_details[0].'_sub_';
			$q=$this->db->query("select sum(number) as num_subjects from subject_type_limit where stream='".$stream."' and semester='".$semester."'");

		   $num_subjects=0;
		   if($q->num_rows() > 0){
					foreach($q->result_array() as $row){
						$num_subjects=$row['num_subjects'];
					}
				}
			return $num_subjects;
		}


	}
?>
