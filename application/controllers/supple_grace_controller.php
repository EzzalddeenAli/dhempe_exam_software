<?php

    class supple_grace_controller extends CI_Controller{
      
        //global variables declaration 
        public $subject=array();                public $inner_head_flag=0;
        public $total_grace_mark=0;             public $fail=array();
        public $pass=array();                   public $sub_has_practicle=array();
        public $head_priority=array();          public $max_agg_marks;
        public $numberOfSubject;                public $temp=0;
        public $fail_inner_head;                public $fail_outer_head;
        public $max_grace_for_entitlement=0;    public $sports_category;
        public $nss_ncc;                        public $sports;
        public $sports_marks;                   public $studen_name;
        public $register_number;                public $sports_grace=0;
        public $temporary_subject=array();		public $value_priority;
		public $stream;							public $stream_tbl_name;
		public $semester_stream;			
		
	
        //Rule 2 for inner head and total marks
        function max_grace_subject($key,$value){
            global $subject;
            global $max_agg_marks;
            
            $max_mark_per_sub=round($subject[$key][$value]*5/100);
            $max_mark_per_sub1=round($max_agg_marks*1/100);
            
            if($max_mark_per_sub < $max_mark_per_sub1){
                 $marks_per_sub=$max_mark_per_sub;
            }
            else{
                $marks_per_sub=$max_mark_per_sub1;
            }
            return $marks_per_sub;
        }
        
        //Rule 2 for outer head and internal and theory practicle
        function max_grace_outer_head($key,$value1,$value2){
            global $subject;
            global $max_agg_marks;
            
            $max_mark_per_sub=round(($subject[$key][$value1]+$subject[$key][$value2])*5/100);
            $max_mark_per_sub1=round($max_agg_marks*1/100);

            if($max_mark_per_sub < $max_mark_per_sub1){
                 $marks_per_sub=$max_mark_per_sub;
            }
            else{
                 $marks_per_sub=$max_mark_per_sub1;
            }
            return $marks_per_sub;
        }
        
        
        //Each student data and their marks for each subject
        function each_sub_marks(){
            global $subject;                  global $max_agg_marks;
            global $total_grace_mark;         global $numberOfSubject;
            global $sports_category;          global $nss_ncc;
            global $sports;                   global $max_grace_for_entitlement;
            global $sports_marks;             global $studen_name;
            global $register_number;          global $sports_grace;
            global $temporary_subject;		  global $stream;
			global $semester_stream;		  global $stream_tbl_name;
            global $fail;
			
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			$seat_number=$this->input->post('seat_number');
			
			//get all subjects
			$subject_code =$_POST['subjid'];
			
			//choose table to select marks
			if($stream.$semester == "ba_student_detail_".$semester){
				 $marks_table="ba_supple_marks_".$semester;
				 $student_tbl_detail = "ba_student_detail_".$semester;
			}
			else if($stream.$semester =="bsc_cmp_sci_student_detail_".$semester){
				$marks_table="bsc_cmp_sci_supple_marks_".$semester;
				$student_tbl_detail = "bsc_cmp_sci_student_detail_".$semester;
			}
			else if($stream.$semester =="bsc_student_detail_".$semester){
				$marks_table="bsc_supple_marks_".$semester;
				$student_tbl_detail = "bsc_student_detail_".$semester;
			}
			
			$this->load->model('supplementary');
			$this->supplementary->updateSeatNumber($seat_number,$this->input->post('pr_number'),$student_tbl_detail);
			for($i=0;$i<count($subject_code);$i++)
			{
				$subject[$i]["sub_id"]=$subject_code[$i];
				
				/* check if any ABS */
				
				$isa_abs ="";
				$see_abs ="";
				$practicle_abs ="";
				
				if(strtoupper($this->input->post('isa'.$subject_code[$i].'')) == 'A')
					$isa_abs = 'A';
					
				if(strtoupper($this->input->post('see'.$subject_code[$i].'')) =='A')
					$see_abs = 'A';
					
				if(strtoupper($this->input->post('pract'.$subject_code[$i].'')) =='A')	
					$practicle_abs='A';
					
				/* check if any ABS */
				$subject[$i]["internal_abs"]='';
				$subject[$i]["see_abs"]='';
				if($isa_abs == "")
					$subject[$i]["internal_marks"]=$this->input->post('isa'.$subject_code[$i].'');
				else
					{
					$subject[$i]["internal_marks"] = 0;
					$subject[$i]["internal_abs"]='A';
					}
				
				if($see_abs =="")
					$subject[$i]["Theory_marks"]=$this->input->post('see'.$subject_code[$i].'');
				else	
					{$subject[$i]["Theory_marks"] = 0;
					$subject[$i]["see_abs"]='A';
					}
					
				if($this->input->post('pract'.$subject_code[$i].'') !="N.A."){
					if($practicle_abs == "")
						$subject[$i]["Practcal_marks"]=$this->input->post('pract'.$subject_code[$i].'');
					else
						$subject[$i]["Practcal_marks"] = 0;
				}else{
					$subject[$i]["Practcal_marks"]=-1;
				}
			
			
				$subject[$i]["Total_marks"]=$this->input->post('total'.$subject_code[$i].'');
				$subject[$i]["Min_theory"]=$this->input->post('min_theory'.$subject_code[$i].'');
				$subject[$i]["Min_practical"]=$this->input->post('min_pract'.$subject_code[$i].'');
				$subject[$i]["total"]= $this->input->post('min_total'.$subject_code[$i].'');
				$subject[$i]["internal_pass"]=$this->input->post('isa_pass'.$subject_code[$i].'');
				$subject[$i]["theory_pass"]=$this->input->post('see_pass'.$subject_code[$i].'');
				$subject[$i]["practicle_pass"]=	$this->input->post('pra_pass'.$subject_code[$i].'');
				
				$max_agg_marks=$this->input->post('max_agg'.$subject_code[$i].'');
				
				/* update student marks */
				$this->supplementary->updatePostedMarks($subject_code[$i],$this->input->post('pr_number'),$this->input->post('no_of_attempt'),$this->input->post('isa'.$subject_code[$i].''),$this->input->post('see'.$subject_code[$i].''),$subject[$i]["Practcal_marks"],$this->input->post('total'.$subject_code[$i].''),$marks_table,$isa_abs,$see_abs,$practicle_abs);
				//echo '<br>'.$this->db->last_query();
			}
	
			//update table choosen;
			$stream_tbl_name=$marks_table;
		
			//get remaining grace marks
			$this->load->model('supplementary');
			$this->load->model('home1');
			$register_number=$this->input->post('pr_number');
			
			//if($this->input->post('no_of_attempt') == 2){
			if($this->input->post('no_of_attempt') == 0){
				$grace_details = $this->supplementary->getRemainingGrace($register_number,$student_tbl_detail);
				foreach($grace_details as $row){
					$general_grace_remain = $row->gen_grace_remain;
					$nss_ncc=$row->entitlement_grace_remain;
					$sports_grace=$row->sports_grace_remain;
				}	
			}else{
				$a= $this->input->post('no_of_attempt');
				$a -=1;
				$grace_details = $this->supplementary->getRemainingGrace2($register_number,$a,$marks_table);
				
				foreach($grace_details as $row){
					$general_grace_remain = $row->gen_grace_remain;
					$nss_ncc=$row->nss_grace_remain;
					$sports_grace=$row->sports_grace_remain;
				}	
			}
			//general grace marks available
	        $total_grace_mark=$general_grace_remain;
	            
			//Maximum grace marks for entitlement available
			$max_grace_for_entitlement=$nss_ncc;
				
			$temporary_subject=$subject;
				
			//check if more than two subject require same grace marks are equal 
			$this->no_of_subject_pass_fail();	

			if($sports_grace > 0){
			//echo "M in sports";exit();
				$this->sports();
				//echo '<br>sports'.$this->db->last_query();
			}
			else if($nss_ncc > 0){
				//echo "m in nss";exit();
				$this->entitlement_marks();
				//echo '<br>'.$this->db->last_query();
			}
			else{
				$this->marks();
				//echo '<br>'.$this->db->last_query();
			}	
				
				//Update Grace marks of a particular student
				$updateGrace=array(
					"gen_grace_remain"=>$total_grace_mark,
					"nss_grace_remain"=>$max_grace_for_entitlement,
					"sports_grace_remain"=>$sports_grace
				);
				
				$updateGrace_main=array(
					"gen_grace_remain"=>$total_grace_mark,
					"entitlement_grace_remain"=>$max_grace_for_entitlement,
					"sports_grace_remain"=>$sports_grace
				);
				$this->supplementary->updateStudGrace($marks_table,$updateGrace,$register_number,$this->input->post('no_of_attempt'));
				$this->supplementary->updateStudGrace_main($stream.$semester,$updateGrace_main,$register_number,1);
			$flag['flag']=1;
			$this->load->view('supplementary',$flag);
        }
       
	    
		 //Each student data and their marks for each subject
        function each_sub_marks_prev(){
            global $subject;                  global $max_agg_marks;
            global $total_grace_mark;         global $numberOfSubject;
            global $sports_category;          global $nss_ncc;
            global $sports;                   global $max_grace_for_entitlement;
            global $sports_marks;             global $studen_name;
            global $register_number;          global $sports_grace;
            global $temporary_subject;		  global $stream;
			global $semester_stream;		  global $stream_tbl_name;
            global $fail;
			
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			
			//get all subjects
			$subject_code =$_POST['subjid'];
			
			//choose table to select marks
			if($stream.$semester == "ba_student_detail_".$semester){
				 $marks_table="ba_supple_marks_".$semester;
				 $student_tbl_detail = "ba_student_detail_".$semester;
			}
			else if($stream.$semester =="bsc_cmp_sci_student_detail_".$semester){
				$marks_table="bsc_cmp_sci_supple_marks_".$semester;
				$student_tbl_detail = "bsc_cmp_sci_student_detail_".$semester;
			}
			else if($stream.$semester =="bsc_student_detail_".$semester){
				$marks_table="bsc_supple_marks_".$semester;
				$student_tbl_detail = "bsc_student_detail_".$semester;
			}
			
			$this->load->model('supplementary');
			$gen_grace_used=0;
			$nss_grace_used=0;
			$sports_grace_used=0;
			/* echo '<pre>';
			print_r($_POST); */
			for($i=0;$i<count($subject_code);$i++)
			{
			
			
				$subject[$i]["sub_id"]=$subject_code[$i];
				$abs_fail=0;
				if($this->input->post('isa'.$subject_code[$i])=='A')
				{
				$abs_fail=1;
				$isa_abs='A';
				$internal=0;
				}
				else 
				{$isa_abs="";
				$internal=$this->input->post('isa'.$subject_code[$i]);
				}
				if($this->input->post('see'.$subject_code[$i])=='A')
				{
				$abs_fail=1;
				$see_abs='A';
				$theory=0;
				}
				else 
				{$see_abs="";
				$theory=$this->input->post('see'.$subject_code[$i]);
				}
				if($this->input->post('pract'.$subject_code[$i])=='A')
				{
				$abs_fail=1;
				$pract_abs='A';
				$practicle=0;
				}
				else if($this->input->post('pract'.$subject_code[$i])=='N.A.')
				{
				$pract_abs="";
				$practicle=-1;
				}
				else 
				{$pract_abs="";
				$practicle=$this->input->post('pract'.$subject_code[$i]);
				}
				$gen_symbol="";
				$activity_symbol="";
				$prac_symbol="";
				$subj_gen_total=0;
				$subj_gen_pracs=0;
				if($this->input->post('gen_graceT'.$subject_code[$i])!="")
				{
				$gen_grace_used+=$this->input->post('gen_graceT'.$subject_code[$i]);
				$subj_gen_total=$this->input->post('gen_graceT'.$subject_code[$i]);
				}
				if($this->input->post('gen_graceP'.$subject_code[$i])!="")
				{
				$gen_grace_used+=$this->input->post('gen_graceP'.$subject_code[$i]);
				$subj_gen_total+=$this->input->post('gen_graceP'.$subject_code[$i]);
				$subj_gen_pracs=$this->input->post('gen_graceP'.$subject_code[$i]);
				}
				if($subj_gen_total>0)
				$gen_symbol="+ ".$subj_gen_total."$";
				if($subj_gen_pracs>0)
				$prac_symbol="+ ".$subj_gen_pracs."$";
				
				
				
				$done=0;
				$activity_symbol="";
				
				$subj_act_total=0;
				$subj_act_pracs=0;
				if($this->input->post('sports_graceT'.$subject_code[$i])!="")
				{
				
				$sports_grace_used+=$this->input->post('sports_graceT'.$subject_code[$i]);
				$subj_act_total=$this->input->post('sports_graceT'.$subject_code[$i]);		
				
				}
				if($this->input->post('sports_graceP'.$subject_code[$i])!="")
				{
				if($prac_symbol!="")
				$prac_symbol="";
				$sports_grace_used+=$this->input->post('sports_graceP'.$subject_code[$i]);
				$subj_act_total+=$this->input->post('sports_graceP'.$subject_code[$i]);	
				$subj_act_pracs=$this->input->post('sports_graceP'.$subject_code[$i]);				
				
				}
				if($subj_act_total>0)
				$activity_symbol="+ ".$subj_act_total."#";
				if($subj_act_pracs>0)
				$prac_symbol="+ ".$subj_act_pracs."#";
			
				$activity_symbol="";
				
				
				if($this->input->post('nss_graceT'.$subject_code[$i])!="")
				{
				if($prac_symbol!="")
				$prac_symbol="";
				$nss_grace_used+=$this->input->post('nss_graceT'.$subject_code[$i]);
				$subj_act_total=$this->input->post('nss_graceT'.$subject_code[$i]);		
				
				}
				if($this->input->post('nss_graceP'.$subject_code[$i])!="")
				{
				
				$nss_grace_used+=$this->input->post('nss_graceP'.$subject_code[$i]);
				$subj_act_total+=$this->input->post('nss_graceP'.$subject_code[$i]);	
				$subj_act_pracs=$this->input->post('nss_graceP'.$subject_code[$i]);				
				
				}
				//echo '<br>'.$subj_act_total;
				if($subj_act_total>0)
				$activity_symbol="+ ".$subj_act_total."#";
				if($subj_act_pracs>0)
				$prac_symbol="+ ".$subj_act_pracs."#";
				
				$theory_grace=0;
				if($this->input->post('gen_graceT'.$subject_code[$i])!="")
				$theory_grace+=$this->input->post('gen_graceT'.$subject_code[$i]);
				if($this->input->post('sports_graceT'.$subject_code[$i])!="")
				$theory_grace+=$this->input->post('sports_graceT'.$subject_code[$i]);
				if($this->input->post('nss_graceT'.$subject_code[$i])!="")
				$theory_grace+=$this->input->post('nss_graceT'.$subject_code[$i]);
				
				$prac_grace=0;
				if($this->input->post('gen_graceP'.$subject_code[$i])!="")
				$prac_grace+=$this->input->post('gen_graceP'.$subject_code[$i]);
				if($this->input->post('sports_graceP'.$subject_code[$i])!="")
				$prac_grace+=$this->input->post('sports_graceP'.$subject_code[$i]);
				if($this->input->post('nss_graceP'.$subject_code[$i])!="")
				$prac_grace+=$this->input->post('nss_graceP'.$subject_code[$i]);
				if($practicle!=-1)//pracs there
				{
                    if($abs_fail==1) // if abs in any 1 fail
				     $passed_status='F';	
					else if((($internal+$theory)>=(40/100*(
					$this->input->post('isa_pass'.$subject_code[$i])+$this->input->post('see_pass'.$subject_code[$i])))) && ($practicle>= (40/100*$this->input->post('pra_pass'.$subject_code[$i]))))
					  {
					  
					  $passed_status='P';//normal pass
					  
					  }
					else if((($internal+$theory+$theory_grace)>=(40/100*(
					$this->input->post('isa_pass'.$subject_code[$i])+$this->input->post('see_pass'.$subject_code[$i])))) && ($practicle+$prac_grace>= (40/100*$this->input->post('pra_pass'.$subject_code[$i]))))
					  $passed_status='P';//grace pass
					else
						$passed_status='F';	
					  
				
				
				}
				else //no pracs
				{
				 if($abs_fail==1) // if abs in any 1 fail
				     $passed_status='F';	
					else if((($internal+$theory)>=((40/100)*(
					$this->input->post('isa_pass'.$subject_code[$i])+$this->input->post('see_pass'.$subject_code[$i])))) )
					{
					  $passed_status='P';//normal pass
					  }
					else if((($internal+$theory+$theory_grace)>=(40/100*(
					$this->input->post('isa_pass'.$subject_code[$i])+$this->input->post('see_pass'.$subject_code[$i])))) )
					{
					  $passed_status='P';//grace pass
					  }
					else
						$passed_status='F';	
				
				}
				
				
				
				/* $passed_status='P';
				if(!($this->input->post('pass'.$subject_code[$i])))
				$passed_status='F'; */
				
				$dataarr[$subject_code[$i]]=array("sub_id"=>$subject_code[$i],
					"pr_number" => $this->input->post('pr_number'),
					"supple_seat_number" => $this->input->post('supple_seat_number'),
					"no_of_attempts" => $this->input->post('no_of_attempt'),
					"isa_abs" => $isa_abs,
					"see_abs" => $see_abs,
					"pract_abs" => $pract_abs,
					"internal" => $internal,
					"theory" => $theory,
					"practicle" => $practicle,
					"total" => $this->input->post('total'.$subject_code[$i]),
					"gen_symbol" => $gen_symbol,
					"activity_symbol" => $activity_symbol,
					"gen_the_symbol" => $gen_symbol,
					"gen_the_pract_sym" => $prac_symbol,
					"pass_status" => $passed_status,);
				/* check if any ABS */
				
				
			}
	
			//update table choosen;
			$stream_tbl_name=$marks_table;
		    $this->supplementary->insertPrevAttemptMarks($dataarr,$stream_tbl_name,$this->input->post('no_of_attempt'),$this->input->post('supple_seat_number'),$this->input->post('pr_number'));
			//get remaining grace marks
			
		
			$register_number=$this->input->post('pr_number'); 		
				$this->supplementary->updateStudGraceSubtract($marks_table,$student_tbl_detail,$gen_grace_used,$sports_grace_used,$nss_grace_used,$register_number,$this->input->post('no_of_attempt'));
				
			//exit;
			$flag['flag']=1;
			$this->load->view('supplementary_enter_marks',$flag);
        }
       
	   
	   
        //number of subject pass and fail
        function no_of_subject_pass_fail(){
		
            global $numberOfSubject;	global $stream_tbl_name;
            global $subject;            global $pass;
            global $fail;               global $sub_has_practicle;
            global $register_number;
			
			$fail=array();
			
            for($i=0;$i<count($subject);$i++){   
                if($subject[$i]["Practcal_marks"] == -1){
				
                    if($subject[$i]["Total_marks"] < $subject[$i]["Min_theory"] || $subject[$i]["internal_abs"]=='A' || $subject[$i]["see_abs"]=='A'){
					 $fail[$i]=$subject[$i]["Min_theory"]-$subject[$i]["Total_marks"];
						//student pass than update pass status
						$this->home1->passStatus($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'F');
					}
                    else{
						//student pass than update pass status
						$this->home1->passStatus($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'P');
						
						$fail[]=999;
                        $pass[$i]=$subject[$i]["Total_marks"];
                    }
                }
                else{
                 //   $sub_has_practicle=(($subject[$i]["internal_marks"])+($subject[$i]["Theory_marks"]));
                 $sub_has_practicle=($subject[$i]["Total_marks"]);
                    $check=((($subject[$i]["internal_pass"])+($subject[$i]["theory_pass"]))*40/100);    
                    if(($subject[$i]["Practcal_marks"] >= $subject[$i]["Min_practical"])&&( $sub_has_practicle >= $check)){
                        $fail[]=999;
						//student pass than update pass status
						$this->home1->passStatus($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'P');
                    }
                    else{ 
                        $grace=0;
                        if($subject[$i]["Practcal_marks"] < $subject[$i]["Min_practical"]){
                            $dummy=$subject[$i]["Min_practical"]-$subject[$i]["Practcal_marks"];
                            $grace+=$dummy;
                        }
                        if($sub_has_practicle < $check ){
                            $dummy=$check-$sub_has_practicle;
                            $grace+=$dummy;
                        }    
                        $fail[]=$grace;
						
						//student pass than update pass status
						$this->home1->passStatus($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'F');
                    }
                }
            }

		
        }
        
        //maximum marks inner  head of passing
        function max_marks_entitlement($key,$value){
            global $subject;
            
            $max_mark_per_sub=round($subject[$key][$value]*5/100);
            return $max_mark_per_sub;
        }
         
        //sports marks 
        function sports(){
            global $subject;                global $sports_category;
            global $sports_marks;           global $sports_grace;
            global $fail;                   global $register_number; 
            global $stream_tbl_name;
			
           $this->no_of_subject_pass_fail();
           
		   foreach($fail as $key=>$value){
		   		if($value == 999){
					unset($fail[$key]);
				}
		   }
		   
            for($i=0;$i<count($subject);$i++){
               if(!empty($fail)){
					$min_grace=min($fail);
				}
                foreach($fail as $key=>$value){
                    //no practicle exam than no inner head
                    if($min_grace == $value){                                     
                        if($subject[$key]["Practcal_marks"] == -1){
                            //$grace_required=$min_grace;
							$grace_required=$value;
							/*add from here to solve issue*/
							$marks_per_sub_sp=$sports_grace;
							$marks_gen_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
							$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub_sp+$marks_gen_per_sub;
							$dummy3=$sports_grace-$marks_per_sub_sp;
							/*add till here to solve issue*/
                            $sports_eligibility=round($subject[$key]["Min_theory"]*50/100);
                            if(($sports_grace > 0) && ($sports_grace >= $grace_required)&& ($subject[$key]["Total_marks"] >= $sports_eligibility )&& ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $sports_grace-=$grace_required;   
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$grace_required.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                           
                            } 
								else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"]) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub_sp;
                                 $sports_grace-=$marks_per_sub_sp;     
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub_sp.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                 $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub_sp.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
						   }
							                           

						   unset($fail[$key]);
                            break;
                        }
                        else{
                            $update_query=0;
                            //inner head
                            $sports_eligibility=round($subject[$key]["Min_theory"]*50/100);
                            $grace_required_inner_head=$subject[$key]["Min_practical"]-$subject[$key]["Practcal_marks"];
                            if(($sports_grace > 0) && ($sports_grace >= $grace_required_inner_head) &&($grace_required_inner_head > 0) && ($subject[$key]["Total_marks"] >= $sports_eligibility ) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                                $subject[$key]["Practcal_marks"]=$subject[$key]["Practcal_marks"]+$grace_required_inner_head;
                                $sports_grace-=$grace_required_inner_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_inner_head;
                                $update_query+=$grace_required_inner_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_pract_sym'=>'+ '.$grace_required_inner_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                                //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Sports grace Remain ".$sports_grace;
                            }
                            
                            //outer head
                            $sports_eligibility=round($subject[$key]["Min_theory"]*50/100);
                            $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                            $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                   /*added from here simone because split grace not happening*/
							$marks_per_sub_sp=$sports_grace;
							$marks_gen_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
							$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub_sp+$marks_gen_per_sub;
							$dummy3=$sports_grace-$marks_per_sub_sp;
							/*till here*/
                            if(($sports_grace > 0)&& ($sports_grace >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0) && ($subject[$key]["Total_marks"] >= $sports_eligibility ) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                                $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                                $sports_grace-=$grace_required_for_outer_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                                $update_query+=$grace_required_for_outer_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                            
						    }
							/*added from here simone because split grace not happening*/
							else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"]) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub_sp;
                                $max_grace_for_entitlement-=$marks_per_sub_sp;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub_sp.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                               
								$update_query+=$marks_per_sub_sp;
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
						   }
						   /*till here*/
                            if($update_query != 0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$update_query.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                           		$this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
                            }
                            unset($fail[$key]);
                            break;
                        }
					}
                }
            }
            $fail=array();
            $this->marks(); 
        }
        
		
		
        // NCC / NSS / Cultural Events
        function entitlement_marks(){
            global $max_agg_marks;              global $subject;
            global $fail;                       global $register_number; 
            global $max_grace_for_entitlement;  global $stream_tbl_name;                   
           
            $this->no_of_subject_pass_fail();
/* 			echo '<pre>';
			print_r($fail);
 */			foreach($fail as $key=>$value){
				if($value == 999){
					unset($fail[$key]);
				}
			}
				
            for($i=0;$i<count($subject);$i++){
                if(!empty($fail)){
					$min_grace=min($fail);
				}
                foreach($fail as $key=>$value){  
					 if($min_grace == $value){                           
                        if($subject[$key]["Practcal_marks"] == -1){
                            $marks_per_sub=$this->max_marks_entitlement($key,"total");
							$marks_gen_per_sub=$this->max_grace_subject($key,"total");
                            $min_value=$subject[$key]["Min_theory"]-$marks_per_sub;
                            //$grace_required=$min_grace;
							$grace_required=$value;
							
							$dummy=$max_grace_for_entitlement-$grace_required;
							
							/*Changed by simone on 8th november because i think hardcoded 10*/	
						//$dummy2=$subject[$key]["Total_marks"]+10;
						$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub+$marks_gen_per_sub;//$subject[$key]["Min_theory"]
							$dummy3=$max_grace_for_entitlement-$marks_per_sub;
							
							
							/*Changed by simone on 8th november because i think hardcoded 5*/	
							//$dummy4=$subject[$key]["Total_marks"]+$max_grace_for_entitlement+5;
							$dummy4=$subject[$key]["Total_marks"]+$max_grace_for_entitlement+$marks_gen_per_sub;
							
							$dummy5=($subject[$key]["Min_theory"]-$subject[$key]["Total_marks"]);
							
							$dummy7=$dummy5-$max_grace_for_entitlement;
							
							if(($dummy >= 0)&&($max_grace_for_entitlement >= 0)&&($grace_required <= $marks_per_sub ) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $max_grace_for_entitlement-=$grace_required;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$grace_required.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                                	
                           } 
						   
						   else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"]) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub;
                                $max_grace_for_entitlement-=$marks_per_sub;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                 $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
						   }
						   
						   else if(($max_grace_for_entitlement > 0)&&($max_grace_for_entitlement < 5)&&($dummy4 >=$subject[$key]["Min_theory"]) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
						 
								//echo "<br/>I AM IN CASE 3";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$max_grace_for_entitlement;
                                $temp_value=$max_grace_for_entitlement;
								$max_grace_for_entitlement-=$max_grace_for_entitlement;
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$temp_value.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$temp_value.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                               
						   }
                           unset($fail[$key]);
                           break;
                        }
                        else{
                            $update_query=0;
                            //inner head
                            $grace_required_inner_head=$subject[$key]["Min_practical"]-$subject[$key]["Practcal_marks"];
							
                            $marks_per_sub=$this->max_marks_entitlement($key,"practicle_pass");
							
                            if(($max_grace_for_entitlement > 0) && ($grace_required_inner_head <= $marks_per_sub ) && ($max_grace_for_entitlement >= $grace_required_inner_head) &&($grace_required_inner_head > 0) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
							
                                $subject[$key]["Practcal_marks"]=$subject[$key]["Practcal_marks"]+$grace_required_inner_head;
                               
							   
							    $max_grace_for_entitlement-=$grace_required_inner_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_inner_head;
                                $update_query+=$grace_required_inner_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_pract_sym'=>'+ '.$grace_required_inner_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                      
                            }  
                            
                            //outer head
                            $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                            $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
							
                            $marks_per_sub=round(($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"])*5/100); 
/*added from here simone because split grace not happening*/
							$marks_per_sub_ent=$this->max_marks_entitlement($key,"total");
							
							$marks_gen_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
							
							//$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub_ent+$marks_gen_per_sub;
							$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub_ent+$marks_gen_per_sub;
							$dummy3=$max_grace_for_entitlement-$marks_per_sub_ent;
							$dummy4=$subject[$key]["Total_marks"]+$max_grace_for_entitlement+$marks_gen_per_sub;
							
							/*till here*/								
                            if(($max_grace_for_entitlement > 0) && ($grace_required_for_outer_head <= $marks_per_sub ) && ($max_grace_for_entitlement >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                                $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                                $max_grace_for_entitlement-=$grace_required_for_outer_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                                $update_query+=$grace_required_for_outer_head;
								
							    $sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                               
                            }
                            
							/*added from here simone because split grace not happening*/
							else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"]) &&($grace_required_for_outer_head > 0) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								 $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$marks_per_sub_ent;

						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub_ent;
								
                                $max_grace_for_entitlement-=$marks_per_sub_ent;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub_ent.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                               
								$update_query+=$marks_per_sub_ent;
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								  echo '<pre>';
							print_r($subject[$key]);
						   }
							else if(($max_grace_for_entitlement > 0)&&($max_grace_for_entitlement < 5)&&($dummy4 >=$subject[$key]["Min_theory"]) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
						 
								//echo "<br/>I AM IN CASE 3";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$max_grace_for_entitlement;
                                $temp_value=$max_grace_for_entitlement;
								$max_grace_for_entitlement-=$max_grace_for_entitlement;
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$temp_value.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$temp_value.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                               
						   }
			//exit;
						   /*till here*/
							if($update_query != 0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$update_query.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
                            }
                            unset($fail[$key]);
                            break;
                        }
					}
                }
            }
			
			$fail=array();
            $this->marks(); 
        }
        
        //General grace marks calculation 
        function marks(){
            global $subject;                global $max_grace_for_entitlement;
            global $fail;                   global $total_grace_mark;
            global $nss_ncc;                global $register_number;
            global $temporary_subject;      global $sports;  
            global $studen_name;            global $sports_grace;
         	global $semester_stream;		global $stream_tbl_name;
		 
			$this->no_of_subject_pass_fail();
			
            for($i=0;$i<count($subject);$i++){
                $min_grace=min($fail);
                foreach($fail as $key=>$value){
                    //no practicle exam than no inner head
                    if($min_grace == $value){                                     
                        if($subject[$key]["Practcal_marks"] == -1){
                             $marks_per_sub=$this->max_grace_subject($key,"total");
                             $min_value=$subject[$key]["Min_theory"]-$marks_per_sub;
                             $grace_required=$min_grace;
                             if(($total_grace_mark > 0)&&($min_value <= $subject[$key]["Total_marks"]) && ($total_grace_mark >= $grace_required) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
								
                                $total_grace_mark-=$grace_required;     
								
								
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('gen_symbol'=>'+ '.$grace_required.'$');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                $this->home1->updateMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'$');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                          	
                             } 
                             unset($fail[$key]);
                             break;
                        }
                        //inner head is available
                        else{
                             $update_query=0;
                            //grace for inner head
                             $grace_required_inner_head=$subject[$key]["Min_practical"]-$subject[$key]["Practcal_marks"]; 
                             $marks_per_sub=$this->max_grace_subject($key,"practicle_pass");
 
                             if(($total_grace_mark > 0) && ($grace_required_inner_head <= $marks_per_sub ) && ($total_grace_mark >= $grace_required_inner_head) &&($grace_required_inner_head > 0) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                            $subject[$key]["Practcal_marks"]=$subject[$key]["Practcal_marks"]+$grace_required_inner_head;
                                $total_grace_mark-=$grace_required_inner_head;
								/*comment because dont add passed pracs to total*/
                                //$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_inner_head;
                                $update_query+=$grace_required_inner_head;
									
													
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update3['symbol']=array('gen_the_pract_sym'=>'+ '.$grace_required_inner_head.'$');
								$marks_update3['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
								$this->home1->updateMarkInnerHead($marks_update3,$stream_tbl_name);
                           
                             }
                             
                             //grace for outer head
							/*  echo '<pre>';
							 print_r($subject[$key]); */
							 
                             $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
							// $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
							 $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["Total_marks"])));
                    
                            $marks_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
						
                             if(($total_grace_mark > 0) && ($grace_required_for_outer_head <= $marks_per_sub ) && ($total_grace_mark >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0) && ( $subject[$key]["internal_abs"]!='A' && $subject[$key]["see_abs"]!='A')){
                           
                            $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                            $total_grace_mark-=$grace_required_for_outer_head;
                            $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                            $update_query+=$grace_required_for_outer_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
							$marks_update4['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'$');
							$marks_update4['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
							$this->home1->updateMarkInnerHead($marks_update4,$stream_tbl_name);
							/* echo '<pre>';
							print_r($marks_update4);
							exit; */
                            }
                            unset($fail[$key]);
                            if($update_query !=0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('gen_symbol'=>'+ '.$update_query.'$');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$this->input->post('no_of_attempt'));
                                $this->home1->updateMarks($marks_update,$stream_tbl_name);  
                            }
                            break;
                       }
                   }
                }
            }
			
			//exit;
			$fail=array();
			$this->no_of_subject_pass_fail();
			//EXIT;
        }       
    }
	
    
?>
