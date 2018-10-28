<?php

    class supplementary_grace_update extends CI_Controller{
      
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
            echo '<pre>';
			print_r($subject);
			echo $subject[$key][$value];
            echo '<br />--max_mark_per_sub'.$max_mark_per_sub=round($subject[$key][$value]*5/100);
            echo '<br />--max_mark_per_sub1'.$max_mark_per_sub1=round($max_agg_marks*1/100);
            
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
			
				if($isa_abs == "")
					$subject[$i]["internal_marks"]=$this->input->post('isa'.$subject_code[$i].'');
				else
					$subject[$i]["internal_marks"] = 0;
				
				if($see_abs =="")
					$subject[$i]["Theory_marks"]=$this->input->post('see'.$subject_code[$i].'');
				else	
					$subject[$i]["Theory_marks"] = 0;
					
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
				
			}
			else if($nss_ncc > 0){
				//echo "m in nss";exit();
				$this->entitlement_marks();
				
			}
			else{
				$this->marks();
				
			}	
				
				//Update Grace marks of a particular student
				$updateGrace=array(
					"gen_grace_remain"=>$total_grace_mark,
					"nss_grace_remain"=>$max_grace_for_entitlement,
					"sports_grace_remain"=>$sports_grace
				);
				
				$this->supplementary->updateStudGrace($marks_table,$updateGrace,$register_number,$this->input->post('no_of_attempt'));
			
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
				echo $prac_symbol="+ ".$subj_gen_pracs."$";
				
				
				
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
				$prac_symbol="+ ".$subj_act_total."#";
			
				$activity_symbol="";
				
				$subj_act_total=0;
				$subj_act_pracs=0;
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
				$prac_symbol="+ ".$subj_act_total."#";
				
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
				
			
			$flag['flag']=1;
			$this->load->view('supplementary_enter_marks',$flag);
        }
       
	   
	   
        //number of subject pass and fail
        function no_of_subject_pass_fail(){
		
            global $numberOfSubject;	global $stream_tbl_name;
            global $subject;            global $pass;
            global $fail;               global $sub_has_practicle;
            global $register_number;
			global $no_of_attempt; 
			$fail=array();
			echo '<br>----------------------'.count($subject);
            for($i=0;$i<count($subject);$i++){   
                if($subject[$i]["Practcal_marks"] == -1 ){
                    if($subject[$i]["Total_marks"] < $subject[$i]["Min_theory"]){
                        $fail[$i]=$subject[$i]["Min_theory"]-$subject[$i]["Total_marks"];
						//student pass than update pass status
						$this->home1->passStatus_issue($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'F',$no_of_attempt);
                    }
                    else{
						//student pass than update pass status
						$this->home1->passStatus_issue($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'P',$no_of_attempt);
						
						$fail[]=999;
                        $pass[$i]=$subject[$i]["Total_marks"];
                    }
                }
                else{
                    //$sub_has_practicle=(($subject[$i]["internal_marks"])+($subject[$i]["Theory_marks"]));
                    $sub_has_practicle=($subject[$i]["Total_marks"]);
                    $check=((($subject[$i]["internal_pass"])+($subject[$i]["theory_pass"]))*40/100);    
                    if(($subject[$i]["Practcal_marks"] >= $subject[$i]["Min_practical"])&&( $sub_has_practicle >= $check)){
                        $fail[]=999;
						//student pass than update pass status
						$this->home1->passStatus_issue($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'P',$no_of_attempt);
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
						$this->home1->passStatus_issue($subject[$i]["sub_id"],$register_number,$stream_tbl_name,'F',$no_of_attempt);
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
			global $no_of_attempt;
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
							/*added from here simone because split grace not happening*/
							$subject[$key]["sub_id"];
							$marks_per_sub_sp=$sports_grace;
							$marks_gen_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
							$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub_sp+$marks_gen_per_sub;
							$dummy3=$sports_grace-$marks_per_sub_sp;
							/*till here*/
                            $sports_eligibility=round($subject[$key]["Min_theory"]*50/100);
                            if(($sports_grace > 0) && ($sports_grace >= $grace_required)&& ($subject[$key]["Total_marks"] >= $sports_eligibility )){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $sports_grace-=$grace_required;   
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$grace_required.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                           
                            } 
                            
							else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"])){
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
                            if(($sports_grace > 0) && ($sports_grace >= $grace_required_inner_head) &&($grace_required_inner_head > 0) && ($subject[$key]["Total_marks"] >= $sports_eligibility )){
                                $subject[$key]["Practcal_marks"]=$subject[$key]["Practcal_marks"]+$grace_required_inner_head;
                                $sports_grace-=$grace_required_inner_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_inner_head;
                                $update_query+=$grace_required_inner_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_pract_sym'=>'+ '.$grace_required_inner_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
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
                            if(($sports_grace > 0)&& ($sports_grace >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0) && ($subject[$key]["Total_marks"] >= $sports_eligibility )){
                                $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                                $sports_grace-=$grace_required_for_outer_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                                $update_query+=$grace_required_for_outer_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                            
						    }
/*added from here simone because split grace not happening*/
							else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"])){
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
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
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
           global $no_of_attempt;
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
							
							if(($dummy >= 0)&&($max_grace_for_entitlement >= 0)&&($grace_required <= $marks_per_sub )){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $max_grace_for_entitlement-=$grace_required;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$grace_required.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                                	
                           } 
						   
						   else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"])){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub;
                                $max_grace_for_entitlement-=$marks_per_sub;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
                                 $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
						   }
						   
						   else if(($max_grace_for_entitlement > 0)&&($max_grace_for_entitlement < 5)&&($dummy4 >=$subject[$key]["Min_theory"])){
						 
								//echo "<br/>I AM IN CASE 3";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$max_grace_for_entitlement;
                                $temp_value=$max_grace_for_entitlement;
								$max_grace_for_entitlement-=$max_grace_for_entitlement;
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$temp_value.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$temp_value.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
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
                            if(($max_grace_for_entitlement > 0) && ($grace_required_inner_head <= $marks_per_sub ) && ($max_grace_for_entitlement >= $grace_required_inner_head) &&($grace_required_inner_head > 0)){
                                $subject[$key]["Practcal_marks"]=$subject[$key]["Practcal_marks"]+$grace_required_inner_head;
                               
							   
							    $max_grace_for_entitlement-=$grace_required_inner_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_inner_head;
                                $update_query+=$grace_required_inner_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_pract_sym'=>'+ '.$grace_required_inner_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                      
                            }  
                            
                            //outer head
                            $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                            $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                            $marks_per_sub=round(($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"])*5/100); 
/*added from here simone because split grace not happening*/
							$marks_per_sub_ent=$this->max_marks_entitlement($key,"total");
							
							$marks_gen_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
							$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub_ent+$marks_gen_per_sub;
							$dummy3=$max_grace_for_entitlement-$marks_per_sub_ent;
							/*till here*/								
                            if(($max_grace_for_entitlement > 0) && ($grace_required_for_outer_head <= $marks_per_sub ) && ($max_grace_for_entitlement >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0)){
                                $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                                $max_grace_for_entitlement-=$grace_required_for_outer_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                                $update_query+=$grace_required_for_outer_head;
								
							    $sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                               
                            }
							/*added from here simone because split grace not happening*/
							else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"])){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								

						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub_ent;
								
                                $max_grace_for_entitlement-=$marks_per_sub_ent;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub_ent.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                               
								$update_query+=$marks_per_sub_ent;
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
						   }
						   /*till here*/
                            if($update_query != 0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$update_query.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
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
		 global $no_of_attempt;
			$this->no_of_subject_pass_fail();
			 echo 'newwwwww<pre>';
			print_r($subject); 
            for($i=0;$i<count($subject);$i++){
                $min_grace=min($fail);
				echo '<pre>';
			    print_r($fail);
                foreach($fail as $key=>$value){
                    //no practicle exam than no inner head
                    if($min_grace == $value){                                     
                        if($subject[$key]["Practcal_marks"] == -1){
						echo '<br/ >attempt'.$no_of_attempt;
                             echo '<br>mk/sub:'.$marks_per_sub=$this->max_grace_subject($key,"total");
                             echo '<br>min:'.$min_value=$subject[$key]["Min_theory"]-$marks_per_sub;
                             echo '<br>grace:'.$grace_required=$min_grace;
                             echo '<br>tot grace:'.$total_grace_mark;
							 
                             if(($total_grace_mark > 0)&&($min_value <= $subject[$key]["Total_marks"]) && ($total_grace_mark >= $grace_required)){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $total_grace_mark-=$grace_required;     
								
								
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('gen_symbol'=>'+ '.$grace_required.'$');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
                                $this->home1->updateMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'$');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
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

                             if(($total_grace_mark > 0) && ($grace_required_inner_head <= $marks_per_sub ) && ($total_grace_mark >= $grace_required_inner_head) &&($grace_required_inner_head > 0)){
                            $subject[$key]["Practcal_marks"]=$subject[$key]["Practcal_marks"]+$grace_required_inner_head;
                                $total_grace_mark-=$grace_required_inner_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_inner_head;
                                $update_query+=$grace_required_inner_head;
									
													
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update3['symbol']=array('gen_the_pract_sym'=>'+ '.$grace_required_inner_head.'$');
								$marks_update3['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
								$this->home1->updateMarkInnerHead($marks_update3,$stream_tbl_name);
                           
                             }
                             
                             //grace for outer head
                             $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                             $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                    
                             $marks_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
         
                             if(($total_grace_mark > 0) && ($grace_required_for_outer_head <= $marks_per_sub ) && ($total_grace_mark >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0)){
                              
                            $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                            $total_grace_mark-=$grace_required_for_outer_head;
                            $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                            $update_query+=$grace_required_for_outer_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
							$marks_update4['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'$');
							$marks_update4['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
							$this->home1->updateMarkInnerHead($marks_update4,$stream_tbl_name);
			
                            }
                            unset($fail[$key]);
                            if($update_query !=0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('gen_symbol'=>'+ '.$update_query.'$');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority,'no_of_attempts'=>$no_of_attempt);
                                $this->home1->updateMarks($marks_update,$stream_tbl_name);  
                            }
                            break;
                       }
                   }
                }
            }
			$fail=array();
			$this->no_of_subject_pass_fail();
        }       
 /*added by simone to solve grace updation issue*/   
		function update_proper_grace(){
		
		$all_supp_streams=array('ba||sem_1','ba||sem_2','ba||sem_3','ba||sem_4','bsc||sem_1','bsc||sem_2','bsc||sem_3','bsc||sem_4','bsc_cmp_sci||sem_1','bsc_cmp_sci||sem_2','bsc_cmp_sci||sem_3','bsc_cmp_sci||sem_4');
		//$all_supp_streams=array('ba||sem_1');
		foreach($all_supp_streams as $class)
			{
			$class_detail=explode('||',$class);
			$stream=$class_detail[0];
			$sem=$class_detail[1];
			$student_tbl_detail=$stream.'_student_detail_'.$sem;
			$marks_table=$stream.'_supple_marks_'.$sem;
			$subject_table=$stream.'_sub_'.$sem;
			//update all current attempt grace to empty
			$u=$this->db->query("update ".$marks_table." a ,(select min(no_of_attempts) as min_attempt,min(no_of_attempts)+1,
             COUNT(DISTINCT no_of_attempts) as distinct_count , GROUP_CONCAT(no_of_attempts),pr_number  from ".$marks_table." GROUP BY pr_number)b set gen_symbol='',gen_the_pract_sym='',activity_symbol='',gen_the_symbol='' where a.pr_number=b.pr_number and b.distinct_count=2 and no_of_attempts=min_attempt+1");
			 echo '<br >'.$this->db->last_query();;
			$q=$this->db->query('select * from '.$student_tbl_detail.' where supplementary=1 and block=0');
			 echo '<br >'.$this->db->last_query();;
			$data=array();
			
			if($q->result_array() > 0)
			{	foreach($q->result_array() as $row)
				{
					$data [] = $row; 
				}
			}
			
			/* echo '<pre>';
			print_r($data); */
			foreach($data as $student)
			{
			  // adding used grace
			 $q=$this->db->query('select * from '.$marks_table.' where pr_number='.$student['pr_number'].' ');
			$marks_data=array();
			
			if($q->result_array() > 0)
			{	foreach($q->result_array() as $row)
				{
					$marks_data [] = $row; 
				}
			}
			/* echo '<pre>';
			print_r($marks_data); */
			$nss=0;$sports=0;
			if($student['entitlement_grace_alloc'] > 0)
			{$nss=1;}
			if($student['sports_grace_alloc'] > 0)
			{$nss=0;$sports=1;}
           $gen_grace_used=0;
           $nss_grace_used=0;
           $sports_grace_used=0;
			foreach($marks_data as $current_sub_details)
			{
			$gen_grace_theory=0;
			$gen_grace_pracs=0;
			$nssgrace_theory=0;
			$nssgrace_pracs=0;
			$sports_grace_theory=0;
			$sports_grace_pracs=0;
			if($current_sub_details['gen_the_pract_sym']!="" && (strpos($current_sub_details['gen_the_pract_sym'],'$') == true))//gen grace allocated and pracs have gen grace
			{
			$gen_grace_pracs=preg_replace("/[^0-9]/","",$current_sub_details['gen_the_pract_sym']);
			$gen_grace_theory=preg_replace("/[^0-9]/","",$current_sub_details['gen_symbol'])-preg_replace("/[^0-9]/","",$current_sub_details['gen_the_pract_sym']);
			if($gen_grace_theory<=0)$gen_grace_theory=0;
			}
			else if($current_sub_details['gen_symbol']!="")//no prac gen grace but theory there
			{
			$gen_grace_theory=preg_replace("/[^0-9]/","",$current_sub_details['gen_symbol']);
			}
			$nssgrace_pracs=0;
			$nssgrace_theory=0;
			if($nss==1)//nss_gr
			{
			if($current_sub_details['gen_the_pract_sym']!="" && (strpos($current_sub_details['gen_the_pract_sym'],'#') == true) )//pracs nss grace allocated
			{
			$nssgrace_pracs=preg_replace("/[^0-9]/","",$current_sub_details['gen_the_pract_sym']);
			$nssgrace_theory=preg_replace("/[^0-9]/","",$current_sub_details['activity_symbol'])-preg_replace("/[^0-9]/","",$current_sub_details['gen_the_pract_sym']);
			if($nssgrace_theory==0)$nssgrace_theory=0;
			}
			else if($current_sub_details['activity_symbol']!="")
			{
			$nssgrace_theory=preg_replace("/[^0-9]/","",$current_sub_details['activity_symbol']);
			}
				
			$sportsgrace=0;
			}
			$sports_grace_theory=0;
			$sports_grace_pracs=0;
			if($sports==1)//sp_gr
			{
			if($current_sub_details['gen_the_pract_sym']!="" && (strpos($current_sub_details['gen_the_pract_sym'],'#') == true) )//pracs sp grace allocated
			{
			$sports_grace_pracs=preg_replace("/[^0-9]/","",$current_sub_details['gen_the_pract_sym']);
			$sports_grace_theory=preg_replace("/[^0-9]/","",$current_sub_details['activity_symbol'])-preg_replace("/[^0-9]/","",$current_sub_details['gen_the_pract_sym']);
			if($sports_grace_theory<=0)
			$sports_grace_theory=0;
			}
			else if($current_sub_details['activity_symbol']!="")
			{
			$sports_grace_theory=preg_replace("/[^0-9]/","",$current_sub_details['activity_symbol']);
			}
			}
			
		$gen_grace_used+=$gen_grace_theory+$gen_grace_pracs;	
		$nss_grace_used+=$nssgrace_theory+$nssgrace_pracs;	
		$sports_grace_used+=$sports_grace_theory+$sports_grace_pracs;	
			}
			echo '<br>gen used----'.$gen_grace_used;	
			echo '<br>nss used----'.$nss_grace_used;	
			echo '<br>sports used----'.$sports_grace_used;	
			
			 
			 $this->db->query('update '.$student_tbl_detail.' set '.$student_tbl_detail.' .gen_grace_remain=gen_grace_alloc-'.$gen_grace_used.','.$student_tbl_detail.' .sports_grace_remain='.$student_tbl_detail.'.sports_grace_alloc-'.$sports_grace_used.','.$student_tbl_detail.' .entitlement_grace_remain='.$student_tbl_detail.' .entitlement_grace_alloc-'.$nss_grace_used.' where pr_number='.$student["pr_number"].' and supplementary=1 ');
			//echo '<br>'.$this->db->last_query('');
			$this->db->query('update '.$marks_table.' as supp,(SELECT '.$student_tbl_detail.'.gen_grace_remain,'.$student_tbl_detail.'.sports_grace_remain,'.$student_tbl_detail.'.entitlement_grace_remain from '.$student_tbl_detail.' where pr_number='.$student["pr_number"].' ) main  set supp.gen_grace_remain=main.gen_grace_remain,supp.sports_grace_remain=main.sports_grace_remain,supp.nss_grace_remain=main.entitlement_grace_remain where pr_number='.$student["pr_number"].'');
			 
			 
			 //updating current attempt pass_status
			 $p=$this->db->query("select max(no_of_attempts) as max_attempt,
             COUNT(DISTINCT no_of_attempts) as distinct_count , GROUP_CONCAT(no_of_attempts),pr_number  from ".$marks_table." where pr_number=".$student["pr_number"]."");
			 
			
			 $result1=array();
			
			if($p->result_array() > 0)
			{	
			  foreach($p->result_array() as $row)
				{
					$max_attempt = $row['max_attempt']; 
					$distinct_count = $row['distinct_count']; 
				}
			}
			echo '<br />distinct_count==='.$distinct_count;
			echo '<br />max_attempt==='.$max_attempt;
			$prev=$max_attempt-1;
			if($distinct_count>2)echo '<br>Alert-------------->'.$student["pr_number"].'<br />';
			if($distinct_count==2)
			{
			  $l=$this->db->query("update ".$marks_table." a ,(SELECT *
FROM (".$marks_table.")  WHERE `pr_number` =  ".$student["pr_number"]."
AND `no_of_attempts` =  ".$prev.")b set  a.pass_status=b.pass_status where a.pr_number=".$student["pr_number"]." and a.sub_id=b.sub_id and a.no_of_attempts=".$max_attempt."");
echo '<br />'.$this->db->last_query();
$l=$this->db->query("update ".$marks_table." a ,(SELECT *
FROM (".$marks_table.")  WHERE `pr_number` =  ".$student["pr_number"]."
AND `no_of_attempts` =  ".$prev." and pass_status='P')b set  a.gen_symbol=b.gen_symbol,a.gen_the_pract_sym=b.gen_the_pract_sym,a.activity_symbol=b.activity_symbol,a.gen_the_symbol=b.gen_the_symbol where a.pr_number=".$student["pr_number"]." and a.sub_id=b.sub_id and a.no_of_attempts=".$max_attempt."");

echo $this->db->last_query();
			
			 $m=$this->db->query("SELECT ".$marks_table.".*,minimum_theory,min_practical,max_agg_marks,internal_marks,semester_marks,practical_marks,".$subject_table.".total as subject_total from ".$marks_table." INNER JOIN ".$subject_table." on ".$marks_table.".sub_id=".$subject_table.".sub_id where no_of_attempts=".$max_attempt." and  pr_number=".$student["pr_number"]."");
			 echo $this->db->last_query();
			  $new_attempt_data=array();
			 if($m->result_array() > 0)
			{	
			  foreach($m->result_array() as $row)
				{
					$new_attempt_data[] = $row; 
					
				}
			}
			echo '<pre>';
			print_r($new_attempt_data);
			
			$this->load->model('supplementary');
			 global $subject;                  global $max_agg_marks;
            global $total_grace_mark;         global $numberOfSubject;
            global $sports_category;          global $nss_ncc;
            global $sports;                   global $max_grace_for_entitlement;
            global $sports_marks;             global $studen_name;
            global $register_number;          global $sports_grace;
            global $temporary_subject;		  global $stream;
			global $semester_stream;		  global $stream_tbl_name;
            global $fail; 
            global $no_of_attempt; 
			
            $i=0;
			
			foreach($new_attempt_data as $new_subject)		{
			//ECHO $new_subject["pass_status"];
			//EXIT;
			 if($new_subject["pass_status"]=='F')
			 {
				$subject[$i]["sub_id"]=$new_subject["sub_id"];
				$no_of_attempt=$new_subject["no_of_attempts"];
				$subject[$i]["pass_status"]=$new_subject["pass_status"];
				
				
				
				$isa_abs ="";
				$see_abs ="";
				$practicle_abs ="";
				
				if(strtoupper($new_subject["isa_abs"]) == 'A')
					$isa_abs = 'A';
					
				if(strtoupper($new_subject["see_abs"]) =='A')
					$see_abs = 'A';
				if(strtoupper($new_subject["pract_abs"]) =='A')	
					$practicle_abs='A';
					
				
			
				if($isa_abs == "")
					$subject[$i]["internal_marks"]=$new_subject['internal'];
				else
					$subject[$i]["internal_marks"] = 0;
				
				if($see_abs =="")
					$subject[$i]["Theory_marks"]=$new_subject['theory'];
				else	
					$subject[$i]["Theory_marks"] = 0;
					
				if($new_subject['practicle'] != -1){
					if($practicle_abs == "")
						$subject[$i]["Practcal_marks"]=$new_subject['practicle'];
					else
						$subject[$i]["Practcal_marks"] = 0;
				}else{
					$subject[$i]["Practcal_marks"]=-1;
				}
			
			
				$subject[$i]["Total_marks"]=$new_subject['total'];
				$subject[$i]["Min_theory"]=$new_subject['minimum_theory'];
				$subject[$i]["Min_practical"]=$new_subject['min_practical'];
				//$subject[$i]["total"]=$new_subject['minimum_theory'];
				$subject[$i]["total"]=$new_subject['subject_total'];
				
				$subject[$i]["internal_pass"]=$new_subject['internal_marks'];
				$subject[$i]["theory_pass"]=$new_subject['semester_marks'];
				$subject[$i]["practicle_pass"]=	$new_subject['practical_marks'];
				$max_agg_marks=$new_subject['max_agg_marks'];
				
				
				//$this->supplementary->updatePostedMarks($subject_code[$i],$this->input->post('pr_number'),$this->input->post('no_of_attempt'),$this->input->post('isa'.$subject_code[$i].''),$this->input->post('see'.$subject_code[$i].''),$subject[$i]["Practcal_marks"],$this->input->post('total'.$subject_code[$i].''),$marks_table,$isa_abs,$see_abs,$practicle_abs);
				//echo '<br>'.$this->db->last_query();
				/* echo '<br>'.$subject[$i]["pass_status"].$i;
				if($subject[$i]["pass_status"]=='P')
				{
				
				unset($subject[$i]);
				echo 'unset'.$i;
				}
				else{$i++;} */
				$i++;
				}
			}
			for($j=$i;$j<=8;$j++)
			{UNSET($subject[$j]);
			}
			/* echo '<pre>';
			print_r($subject);
			
	echo 'size---=='.sizeof($subject); */
			//update table choosen;
			$stream_tbl_name=$marks_table;
		
			//get remaining grace marks
			$this->load->model('supplementary');
			$this->load->model('home1');
			$register_number=$student["pr_number"];
			
			//if($this->input->post('no_of_attempt') == 2){
			if($new_subject["no_of_attempts"] == 0){
				$grace_details = $this->supplementary->getRemainingGrace($register_number,$student_tbl_detail);
				foreach($grace_details as $row){
					$general_grace_remain = $row->gen_grace_remain;
					$nss_ncc=$row->entitlement_grace_remain;
					$sports_grace=$row->sports_grace_remain;
				}	
			}
			
			else{
				$a= $new_subject["no_of_attempts"]+1;
				$a -=1;
				$grace_details = $this->supplementary->getRemainingGrace2($register_number,$a,$marks_table);
				echo '<br >---'.$this->db->last_query();
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
//echo '<br>passfail'.$this->db->last_query();
			//echo "M in sports";exit();
			
				$this->sports();
				
				echo '<br>sports'.$this->db->last_query();
			}
			else if($nss_ncc > 0){
				//echo "m in nss";exit();
				$this->entitlement_marks();
				echo '<br>nss'.$this->db->last_query();
			}
			else{
			
				$this->marks();
				
				echo '<br>mks'.$this->db->last_query();
			}	
				
				//Update Grace marks of a particular student
				$updateGrace=array(
					"gen_grace_remain"=>$total_grace_mark,
					"nss_grace_remain"=>$max_grace_for_entitlement,
					"sports_grace_remain"=>$sports_grace
				);
				
				$this->supplementary->updateStudGrace($marks_table,$updateGrace,$register_number,$no_of_attempt);
				echo $this->db->last_query();
				
             }  
					 
			}
			 
			 
			 
			 
			 
			 
			}
		}
   }
	
    
?>
