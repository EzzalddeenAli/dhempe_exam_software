<?php

    class reval_grace_controller extends CI_Controller{
      
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
            
           	$paramSet=0;
		    $paramSet2=0;
			
			 $studen_name=$this->input->post('uName');
			 $register_number=$this->input->post('regNumber');
			 
			 $table_to_enter_detail=$this->input->post('tbl_marks');
			 
			
			 //bsc science
			 if(($table_to_enter_detail == "bsc_student_marks_sem_1")||($table_to_enter_detail == "bsc_student_marks_sem_2")||($table_to_enter_detail == "bsc_student_marks_sem_3")||($table_to_enter_detail == "bsc_student_marks_sem_4")){
			 	$paramSet=1;
				
			 }
			 
			 //bsc computer science
			 if(($table_to_enter_detail == "bsc_cmp_sci_student_marks_sem_1")||($table_to_enter_detail == "bsc_cmp_sci_student_marks_sem_2")||($table_to_enter_detail == "bsc_cmp_sci_student_marks_sem_3")||($table_to_enter_detail == "bsc_cmp_sci_student_marks_sem_4")){
			 	$paramSet2=1;
				
			 }
			 
			 
		
			$stream_tbl_name=$this->input->post('reval_tbl_name');
			
			$max_agg_marks=$this->input->post('aggregate_marks');
			
			
			if($this->input->post('option') == 1){
				//general grace marks available
           		 $total_grace_mark=round($max_agg_marks*2/100);
        
				//Maximum grace marks for entitlement available
				$max_grace_for_entitlement=$this->input->post('entitlement_grace');
			
				//sports grace
				$sports_grace=$this->input->post('sports_grace');
			}
			else{	
					if($this->input->post('old_grace') == 1){
						//general grace marks available
	           			 $total_grace_mark=$this->input->post('gen_grace_remain');
	            	
						//Maximum grace marks for entitlement available
						$max_grace_for_entitlement=$this->input->post('entitlement_grace_remain');
				
						//sports grace
						$sports_grace=$this->input->post('sports_grace_remain');
					}else{
						//general grace marks available
		           		 $total_grace_mark=round($max_agg_marks*2/100);
		        
						//Maximum grace marks for entitlement available
						$max_grace_for_entitlement=$this->input->post('entitlement_grace');
					
						//sports grace
						$sports_grace=$this->input->post('sports_grace');
					}
					
			}
			
			//Get old marks for comaprison
			$this->load->model('home1');
			
			$subject_id=$this->home1->getSubjectDetail($this->input->post('stu_sub_tbl'),$register_number);
			
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
			
			
			//$old_sub=$this->home1->getSubMark($table_to_enter_detail,$register_number);
			for($k=0;$k<count($sub_id);$k++){
					$old_sub[]=$this->home1->getStudentMarks($table_to_enter_detail,$register_number,$sub_id[$k]);
			}
			
			
			$i=0;
			foreach($old_sub as $row){
				$old_sub_marks[$i]["internal"]=$row->internal;
				$old_sub_marks[$i]["theory"]=$row->theory;
				$old_sub_marks[$i]["practicle"]=$row->practicle;
				$old_sub_marks[$i]["total"]=$row->total;
				$i++;
			}
			
            for($j=0;$j<$this->input->post('sub_counter');$j++){
                for($i=0;$i<1;$i++){   
					$subject[$j]["sub_id"]=$this->input->post('sub'.$j.'');
					
					if($old_sub_marks[$j]["internal"] < $this->input->post('subject'.$j.'internal')){
						$subject[$j]["internal_marks"]=$this->input->post('subject'.$j.'internal');
					}
					else{
						$subject[$j]["internal_marks"]=$old_sub_marks[$j]["internal"];
					}
                    
                 
				 	if($old_sub_marks[$j]["theory"] < $this->input->post('subject'.$j.'theory')){
						$subject[$j]["Theory_marks"]=$this->input->post('subject'.$j.'theory');
					}
					else{
						$subject[$j]["Theory_marks"]=$old_sub_marks[$j]["theory"];
					}
                    
                   	if($old_sub_marks[$j]["practicle"] < $this->input->post('subject'.$j.'practicle') ){
						 $subject[$j]["Practcal_marks"]=$this->input->post('subject'.$j.'practicle');
					}
					else{
						$subject[$j]["Practcal_marks"]=$old_sub_marks[$j]["practicle"];
					}	
					
					if($old_sub_marks[$j]["total"] < $this->input->post('subject'.$j.'total')){
						 $subject[$j]["Total_marks"]=$this->input->post('subject'.$j.'total');
					}
					else{
						 $subject[$j]["Total_marks"]=$old_sub_marks[$j]["total"];
					}
                   
                    
                      
                    
                    $subject[$j]["Min_theory"]=$this->input->post('min_theory'.$j);
                    
                    $subject[$j]["Min_practical"]=$this->input->post('min_pract'.$j);
                    
                    $subject[$j]["total"]=$this->input->post('total'.$j);
                    
                    $subject[$j]["internal_pass"]=$this->input->post('internal_passing'.$j);
                    
                    $subject[$j]["theory_pass"]=$this->input->post('theory_passing'.$j);
                    
                    $subject[$j]["practicle_pass"]=$this->input->post('practicle_passing'.$j);
                }
            }   
			
			//delete code if student already exist in database
			$this->home1->deleteExistingStudent($stream_tbl_name,$register_number);
			
			
			//***********************Code changing ***********8
			//print structure
			
			
			//bsc science
			if($paramSet == 1){
				$prct_marks=50;
				$min_pract=20;
				$j=0;
				foreach($subject as $key=>$value){
					if(($subject[$key]["sub_id"] == "1A1")||($subject[$key]["sub_id"] == "1A2")||($subject[$key]["sub_id"] == "1A4")||($subject[$key]["sub_id"] == "1A5")||($subject[$key]["sub_id"] == "1A6")){
						$tempStore[$j]["sub_id"]=$subject[$key]["sub_id"];
						$tempStore[$j]["old_pract_marks"]=$subject[$key]["Practcal_marks"];
						$tempStore[$j]["lukfor"]=substr_replace($subject[$key]["sub_id"],2,0,1);
						$tempStore2[$j]["sub_id"]="";
						$tempStore2[$j]["old_pract_marks"]="";
						//$subject[$key]["Practcal_marks"]=-1;
						$subject[$key]["practicle_pass"]=0;
						$subject[$key]["Total_marks"]=$subject[$key]["internal_marks"]+$subject[$key]["Theory_marks"];
						
					}
					if(($subject[$key]["sub_id"] == "2A1")||($subject[$key]["sub_id"] == "2A2")||($subject[$key]["sub_id"] == "2A4")||($subject[$key]["sub_id"] == "2A5")||($subject[$key]["sub_id"] == "2A6")){
						$tempStore2[$j]["sub_id"]=$subject[$key]["sub_id"] ;
						$tempStore2[$j]["old_pract_marks"]=$subject[$key]["Practcal_marks"];
									
						$tempStore[$j]["sub_id"]="";
						$tempStore[$j]["old_pract_marks"]="";
						$tempStore[$j]["lukfor"]="";
						//$subject[$key]["Practcal_marks"]=$prct_marks;
						$subject[$key]["Min_practical"]=$min_pract;
						$subject[$key]["practicle_pass"]=$prct_marks;
						$subject[$key]["Total_marks"]=$subject[$key]["internal_marks"]+$subject[$key]["Theory_marks"];
						
					}
					$j++;
				}
			}
			
			//bsc computer science
			if($paramSet2 == 1){
				$prct_marks=50;
				$min_pract=20;
				$j=0;
				foreach($subject as $key=>$value){
					if(($subject[$key]["sub_id"] == "1A1")||($subject[$key]["sub_id"] == "1A3")){
						$tempStore[$j]["sub_id"]=$subject[$key]["sub_id"];
						$tempStore[$j]["old_pract_marks"]=$subject[$key]["Practcal_marks"];
						$tempStore[$j]["lukfor"]=substr_replace($subject[$key]["sub_id"],2,0,1);
						$tempStore2[$j]["sub_id"]="";
						$tempStore2[$j]["old_pract_marks"]="";
						//$subject[$key]["Practcal_marks"]=-1;
						$subject[$key]["practicle_pass"]=0;
						$subject[$key]["Total_marks"]=$subject[$key]["internal_marks"]+$subject[$key]["Theory_marks"];
						
					}
					if(($subject[$key]["sub_id"] == "2A1")||($subject[$key]["sub_id"] == "2A3")){
						$tempStore2[$j]["sub_id"]=$subject[$key]["sub_id"] ;
						$tempStore2[$j]["old_pract_marks"]=$subject[$key]["Practcal_marks"];
									
						$tempStore[$j]["sub_id"]="";
						$tempStore[$j]["old_pract_marks"]="";
						$tempStore[$j]["lukfor"]="";
						//$subject[$key]["Practcal_marks"]=$prct_marks;
						$subject[$key]["Min_practical"]=$min_pract;
						$subject[$key]["practicle_pass"]=$prct_marks;
						$subject[$key]["Total_marks"]=$subject[$key]["internal_marks"]+$subject[$key]["Theory_marks"];
						
					}
					$j++;
				}
			}
			//insert all student marks w.r.t their stream and semester
			for($i=0;$i<count($subject);$i++){
				$temporaryData=array(
                    "sub_id"=>$subject[$i]["sub_id"],
                    "pr_number"=>$register_number,
                    "internal"=>$subject[$i]["internal_marks"],
                    "theory"=>$subject[$i]["Theory_marks"],
                    "practicle"=>$subject[$i]["Practcal_marks"],
                    "total"=>$subject[$i]["Total_marks"]
            	);
				$this->home1->insertStudentDetail($stream_tbl_name,$temporaryData);
			}
			
			//bsc science
			if($paramSet == 1){
					$k=0;
					foreach($tempStore as $key=>$value){
						foreach($tempStore2 as $key2=>$value1){
							if($tempStore[$key]["lukfor"] == $tempStore2[$key2]["sub_id"]){
								$final_pract[$k]["total_marks"]=$tempStore[$key]["old_pract_marks"]+$tempStore2[$key2]["old_pract_marks"];
								$final_pract[$k]["sub_id"]=$tempStore[$key]["lukfor"];
								
								unset($tempStore2[$key2]);	
							}	
						}
						$k++;
					}
				}
			
				if($paramSet == 1){
					foreach($final_pract as $key=>$value){
						foreach($subject as $key1=>$value){
							if($final_pract[$key]["sub_id"] == $subject[$key1]["sub_id"]){
								$subject[$key1]["Practcal_marks"]=$final_pract[$key]["total_marks"];
			$this->home1->addPractTotal($subject[$key1]["sub_id"],$register_number,$stream_tbl_name,$final_pract[$key]["total_marks"]);
							}
						}
					}
				}
			
				//bsc computer science
				if($paramSet2 == 1){
					$k=0;
					foreach($tempStore as $key=>$value){
						foreach($tempStore2 as $key2=>$value1){
							if($tempStore[$key]["lukfor"] == $tempStore2[$key2]["sub_id"]){
								$final_pract[$k]["total_marks"]=$tempStore[$key]["old_pract_marks"]+$tempStore2[$key2]["old_pract_marks"];
								$final_pract[$k]["sub_id"]=$tempStore[$key]["lukfor"];
								
								unset($tempStore2[$key2]);	
							}	
						}
						$k++;
					}
				}
			
				if($paramSet2 == 1){
					foreach($final_pract as $key=>$value){
						foreach($subject as $key1=>$value){
							if($final_pract[$key]["sub_id"] == $subject[$key1]["sub_id"]){
								$subject[$key1]["Practcal_marks"]=$final_pract[$key]["total_marks"];
			$this->home1->addPractTotal($subject[$key1]["sub_id"],$register_number,$stream_tbl_name,$final_pract[$key]["total_marks"]);
							}
						}
					}
				}
				
			//***********************Code changing ***********8
			
			$temporary_subject=$subject;
			
			if($sports_grace > 0){	
				$this->sports();
			}
			else if($max_grace_for_entitlement > 0){
				$this->entitlement_marks();
			}
			else{
				$this->marks();
			}
			
			$updateGrace=array(
					"gen_grace_remain"=>$total_grace_mark,
					"entitlement_grace_remain"=>$max_grace_for_entitlement,
					"sports_grace_remain"=>$sports_grace
			);
			$this->load->model('dataentry');
			$this->dataentry->updateStudGrace($this->input->post('up_tbl'),$updateGrace,$register_number);
			
			$p['result']=1;
            $this->load->view('reval',$p);
        }
        
        
        //number of subject pass and fail
        function no_of_subject_pass_fail(){
            global $numberOfSubject;    global $register_number;
            global $subject;            global $pass;
            global $fail;               global $sub_has_practicle;
			global $stream_tbl_name;
            
            for($i=0;$i<count($subject);$i++){   
                if($subject[$i]["Practcal_marks"] == -1){
                    if($subject[$i]["Total_marks"] < $subject[$i]["Min_theory"]){
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
                    $sub_has_practicle=(($subject[$i]["internal_marks"])+($subject[$i]["Theory_marks"]));
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
                //$min_grace=min($fail);
                foreach($fail as $key=>$value){
                    //no practicle exam than no inner head
                   // if($min_grace == $value){                                     
                        if($subject[$key]["Practcal_marks"] == -1){
                            //$grace_required=$min_grace;
							$grace_required=$value;
							
                            $sports_eligibility=round($subject[$key]["Min_theory"]*50/100);
                            if(($sports_grace > 0) && ($sports_grace >= $grace_required)&& ($subject[$key]["Total_marks"] >= $sports_eligibility )){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $sports_grace-=$grace_required;   
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$grace_required.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                                //echo "<br/>Key=".($key+1)." Sports grace Remain ".$sports_grace;
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
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                               // echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Sports grace Remain ".$sports_grace;
                            }
                            
                            //outer head
                            $sports_eligibility=round($subject[$key]["Min_theory"]*50/100);
                            $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                            $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                   
                            if(($sports_grace > 0)&& ($sports_grace >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0) && ($subject[$key]["Total_marks"] >= $sports_eligibility )){
                                $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                                $sports_grace-=$grace_required_for_outer_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                                $update_query+=$grace_required_for_outer_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                            
							    //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Sports grace Remain ".$sports_grace;
                            }
                            if($update_query != 0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$update_query.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                           		$this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
                            }
                            unset($fail[$key]);
                            break;
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

			foreach($fail as $key=>$value){
				if($value == 999){
					unset($fail[$key]);
				}
			}
			
            for($i=0;$i<count($subject);$i++){
                //$min_grace=min($fail);
                foreach($fail as $key=>$value){
                    //no practicle exam than no inner head
                   // if($min_grace == $value){                                     
                        if($subject[$key]["Practcal_marks"] == -1){
                            $marks_per_sub=$this->max_marks_entitlement($key,"total");
                            $min_value=$subject[$key]["Min_theory"]-$marks_per_sub;
                            //$grace_required=$min_grace;
							$grace_required=$value;
							
							$dummy=$max_grace_for_entitlement-$grace_required;
							
							$dummy2=$subject[$key]["Total_marks"]+10;//$subject[$key]["Min_theory"]
							
							$dummy3=$max_grace_for_entitlement-$marks_per_sub;
							
							
							$dummy4=$subject[$key]["Total_marks"]+$max_grace_for_entitlement+5;
							
							$dummy5=($subject[$key]["Min_theory"]-$subject[$key]["Total_marks"]);
							
							$dummy7=$dummy5-$max_grace_for_entitlement;
							
							if(($dummy >= 0)&&($max_grace_for_entitlement >= 0)&&($grace_required <= $marks_per_sub )){
								
                            /*if(($max_grace_for_entitlement > 0)&&($min_value <= $subject[$key]["Total_marks"]) && ($max_grace_for_entitlement >= $grace_required)){*/
								//echo "I AM IN CASE 1";
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $max_grace_for_entitlement-=$grace_required;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$grace_required.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                                //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Entitlement grace remain ".$max_grace_for_entitlement;			
                           } 
						   
						   else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"])){
						   		echo "I AM IN CASE 2";
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub;
                                $max_grace_for_entitlement-=$marks_per_sub;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                 $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                                //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Entitlement grace remain ".$max_grace_for_entitlement;
								
						   }
						   
						   else if(($max_grace_for_entitlement > 0)&&($max_grace_for_entitlement < 5)&&($dummy4 >=$subject[$key]["Min_theory"])){
						   	 	//$dummy6=$dummy5-$max_grace_for_entitlement;
								//echo "I AM IN CASE 3";
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$max_grace_for_entitlement;
                                $temp_value=$max_grace_for_entitlement;
								$max_grace_for_entitlement-=$max_grace_for_entitlement;
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$temp_value.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$temp_value.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                               // echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Entitlement grace remain ".$max_grace_for_entitlement;
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
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                                //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Entitlement grace remain ".$max_grace_for_entitlement;
                            }  
                            
                            //outer head
                            $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                            $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                            $marks_per_sub=round(($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"])*5/100);   
                            if(($max_grace_for_entitlement > 0) && ($grace_required_for_outer_head <= $marks_per_sub ) && ($max_grace_for_entitlement >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0)){
                                $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                                $max_grace_for_entitlement-=$grace_required_for_outer_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                                $update_query+=$grace_required_for_outer_head;
								
							    $sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                                //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." Entitlement grace remain ".$max_grace_for_entitlement;
                            }
                            if($update_query != 0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$update_query.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
                            }
                            unset($fail[$key]);
                            break;
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
                             if(($total_grace_mark > 0)&&($min_value <= $subject[$key]["Total_marks"]) && ($total_grace_mark >= $grace_required)){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $total_grace_mark-=$grace_required;     
								
								 //echo "<br/> Key=".($key+1)." general grace remain ".$total_grace_mark;
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('gen_symbol'=>'+ '.$grace_required.'$');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'$');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                           // echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." General grace remain ".$total_grace_mark;
								
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
								$marks_update3['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update3,$stream_tbl_name);
                           // echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." general grace remain ".$total_grace_mark;
								
								 //echo "<br/> Key=".($key+1)." general grace remain ".$total_grace_mark;
                             }
                             
                             //grace for outer head
                             $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                             $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                    
                             $marks_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
         
                             if(($total_grace_mark > 0) && ($grace_required_for_outer_head <= $marks_per_sub ) && ($total_grace_mark >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0)){
                                //echo "outer head graced applied";
                            $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                            $total_grace_mark-=$grace_required_for_outer_head;
                            $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                            $update_query+=$grace_required_for_outer_head;
								
								$sub_priority=$subject[$key]["sub_id"];
								
							$marks_update4['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'$');
							$marks_update4['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
							$this->home1->updateMarkInnerHead($marks_update4,$stream_tbl_name);
								
                           // echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Key=".($key+1)." general grace remain ".$total_grace_mark;
								
                            //echo "<br/> Key=".($key+1)." general grace remain ".$total_grace_mark;
                            }
                            unset($fail[$key]);
                            if($update_query !=0){
								$sub_priority=$subject[$key]["sub_id"];
                                $marks_update['symbol']=array('gen_symbol'=>'+ '.$update_query.'$');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateMarks($marks_update,$stream_tbl_name);  
                            }
                            break;
                       }
                   }
                }
            }
			
			//echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;General grace remain=".$total_grace_mark;   
            //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Entitlement marks remain=".$max_grace_for_entitlement;
            //echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;Sports grace remaining=".$sports_grace;
			/*
			//update temporary prioority
			$this->grace_model->updatePriority($semester_stream);
			
            $update_grace_mark=array(
                            "gen_remain"=>$total_grace_mark,
                            "nss_remain"=>$max_grace_for_entitlement,
                            "sport_remain"=>$sports_grace
            );
            
            $this->grace_model->updateStudentDetail($update_grace_mark,$register_number);
            
            $marks_symbol['grace_symbols']=$this->grace_model->getStudentGraceDetail($register_number); 
           
            $p['marks']=$temporary_subject;
            $p['symbols']=$marks_symbol;
            $fail=array();
            
			
			$this->no_of_subject_pass_fail();
			
			foreach($fail as $key=>$value){
				if($value != 999){
					$this->grace_model->updateresultstatus($subject[$key]["sub_id"],$register_number,0);
				}
			}
            
			*/
			$fail=array();
			$this->no_of_subject_pass_fail();
        }       
    }
	
    
?>
