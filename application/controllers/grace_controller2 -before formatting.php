<?php

    class grace_controller2 extends CI_Controller{
      
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
			
			$paramSet=0;
			$paramSet2=0;
			
			
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			$this->load->model('home1');
			
			//choose table to select marks
			if($stream.$semester == "ba_student_detail_".$semester){
				 $marks_table="ba_student_marks_".$semester;
				 $mark_struct="ba_sub_".$semester;
			}
			else if($stream.$semester =="bsc_cmp_sci_student_detail_".$semester){
				$marks_table="bsc_cmp_sci_student_marks_".$semester;
		        $mark_struct="bsc_cmp_sci_sub_".$semester;
				$paramSet2=1;
			}
			else if($stream.$semester =="bsc_student_detail_".$semester){
				$marks_table="bsc_student_marks_".$semester;
				$mark_struct="bsc_sub_".$semester;
				$paramSet=1;
			}
			else if($stream.$semester =="bcom_student_detail_".$semester){
				$marks_table="bcom_student_marks_".$semester;
				$mark_struct="bcom_sub_".$semester;
			}
			$this->load->model('dataentry');
			//update gen_symbol, activity_symbol, gen_the_symbol, gen_the_pract_sym, pass_status 
			$this->dataentry->updateColumn($marks_table);
			
			//update table choosen;
			$stream_tbl_name=$marks_table;
			
			//get all pr number w.r.t to selected stream and semester
			//$pr=$this->dataentry->getSemRelPr($stream.$semester);
			$pr=$this->dataentry->getSemRelPrIncludingBlocked($stream.$semester);
		
			/******************
			* Modified code Start on 17 April 2013
			*********************/
			
			$count_pr = count($pr);
			
			//echo $count_pr;
			$this->load->model('dataentry');
			$tbl_data_count = $this->dataentry->getCountofRows($stream_tbl_name);
			
			
			if(($semester == "sem_1")||($semester == "sem_2")){
				$count_pr *= 8;
			}
			else if(($semester == "sem_3")||($semester == "sem_4")){
				$count_pr *= 7;
			}
			
			if($count_pr != $tbl_data_count){
				//die("Note :- Enter All Student Marks");
			}
			
			/******************
			* Modified code Ends
			*********************/
			
			$data_delete = 0;//modified on 27 april 2013
		
			foreach($pr as $row){
				set_time_limit(0);
			
				$testing_flag = 0;	
				$studen_name=$row->name;
				$register_number=$row->pr_number;
				$nss_ncc=$row->entitlement_grace_alloc;
				$sports_grace=$row->sports_grace_alloc;
			

				$pr_marks=$this->dataentry->getPrRelMarks($row->pr_number,$marks_table);
				
			
				if(empty($pr_marks)){
						/* $flag['flag']=0;
						$this->load->view('select_stream_sem_cal'); */
						continue;
				}
				
				$j=0;
				

                unset($GLOBALS['subject']);
				global $subject;

				foreach($pr_marks as $row2){
					//get mark_structure of a particular paper
					$pr_marks_structure=$this->dataentry->getMarkStruct($mark_struct,$row2->sub_id);
					
					foreach($pr_marks_structure as $row4){
					
						$pract=$row2->practicle;
						$prct_marks=$row4->practical_marks;
						$min_pract=	$row4->min_practical;
				
						$subject[$j]["sub_id"]=$row2->sub_id;
						$subject[$j]["internal_marks"]=$row2->internal;
						$subject[$j]["Theory_marks"]=$row2->theory;
						$subject[$j]["Practcal_marks"]=$pract;
						/*changed by simone since total coming wrong*/
						$subject[$j]["Total_marks"]=$row2->internal+$row2->theory;
						$subject[$j]["Min_theory"]=$row4->minimum_theory;
						$subject[$j]["Min_practical"]=$min_pract;
						$subject[$j]["total"]=$row4->total;
						$subject[$j]["internal_pass"]=$row4->internal_marks;
						$subject[$j]["theory_pass"]=$row4->semester_marks;
						$subject[$j]["practicle_pass"]=	$prct_marks;
						$max_agg_marks=$row4->max_agg_marks;
						
						
					}
					$j++;
				}
				
				//general grace marks available
	            $total_grace_mark=round($max_agg_marks*2/100);
	            //echo "<br/>Total grace marks=".$total_grace_mark;
				
				//Maximum grace marks for entitlement available
				$max_grace_for_entitlement=$nss_ncc;
				
				$temporary_subject=$subject;
				
				//check if more than two subject require same grace marks are equal 
				$this->no_of_subject_pass_fail();
				
				if($testing_flag == 0){
					$testing_data=array_count_values($fail);
					foreach($testing_data as $key => $value){
						if(($key != 999)&&($value >= 2)){
							$this->home1->updateSpecialPriority($stream.$semester,$register_number);
						}
					}
				}
			
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
					"entitlement_grace_remain"=>$max_grace_for_entitlement,
					"sports_grace_remain"=>$sports_grace
				);
				$this->dataentry->updateStudGrace($stream.$semester,$updateGrace,$register_number);
				unset($pr[$data_delete]);//modified on 27 april 2013
				$data_delete++; //modified on 27 april 2013
			}
			$flag['flag']=1;
			
			$this->load->view('select_stream_sem_cal',$flag);
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
                   // if(($subject[$i]["Practcal_marks"] >= $subject[$i]["Min_practical"])&&( $sub_has_practicle >= $check)){
                    if(($subject[$i]["Practcal_marks"] >= $subject[$i]["Min_practical"])&&( $subject[$i]["Total_marks"] >= $check)){
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
                        /* if($sub_has_practicle < $check ){
                            $dummy=$check-$sub_has_practicle;
                            $grace+=$dummy;
                        }   */  
						/* echo '------'.$subject[$i]["Total_marks"];
						echo '------'.$check; */
						if($subject[$i]["Total_marks"] < $check ){
                            $dummy=$check-$subject[$i]["Total_marks"];
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
							
							/*added from here simone because split grace not happening*/
							$subject[$key]["sub_id"];
							$marks_per_sub_sp=$sports_grace;
							$marks_gen_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
							$dummy2=$subject[$key]["Total_marks"]+$marks_per_sub_sp+$marks_gen_per_sub;
							$dummy3=$sports_grace-$marks_per_sub_sp;
							/*till here*/		
							
                            $sports_eligibility=round($subject[$key]["Min_theory"]*50/100);
							
                            if(($sports_grace > 0) && ($grace_required>0) && ($sports_grace >= $grace_required)&& ($subject[$key]["Total_marks"] >= $sports_eligibility )){
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required;
                                $sports_grace-=$grace_required;   
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$grace_required.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                           
                            } 
							
							else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"]) && $marks_per_sub_sp>0){
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
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
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
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                            
						    }
                            
							/*added from here simone because split grace not happening*/
							else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"])  &&($grace_required_for_outer_head > 0)){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub_sp;
                                $sports_grace-=$marks_per_sub_sp;   
                              //  $max_grace_for_entitlement-=$marks_per_sub_sp;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub_sp.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                               
								$update_query+=$marks_per_sub_sp;
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub_sp.'#');
								//$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
						   }
						   /*till here*/
							
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
			  /* echo '<pre>';
			  print_r($fail);	 */
            for($i=0;$i<count($subject);$i++){
                if(!empty($fail)){
					$min_grace=min($fail);
				}
				
                foreach($fail as $key=>$value){ 
			   /* echo '<pre>';
			  print_r($subject[$key]);	 */ 
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
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
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
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                 $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
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
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateSportsMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$temp_value.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
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
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								
                      
                            }  
                           
                            //outer head
							
                           $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                           $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                           $marks_per_sub=round(($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"])*5/100);
							/* echo '<pre>';
							print_r($subject);
							echo $key; */
							
							/*added from here simone because split grace not happening*/
							$marks_per_sub_ent=$this->max_marks_entitlement($key,"total");
							$marks_gen_per_sub=$this->max_grace_outer_head($key,"internal_pass","theory_pass");
							$maximum_ent_possible=min($marks_per_sub_ent,$max_grace_for_entitlement);
							$dummy2=$subject[$key]["Total_marks"]+$maximum_ent_possible+$marks_gen_per_sub;
							$dummy3=$max_grace_for_entitlement-$marks_per_sub_ent;
							/*till here*/						
                            if(($max_grace_for_entitlement > 0) && ($grace_required_for_outer_head <= $marks_per_sub ) && ($max_grace_for_entitlement >= $grace_required_for_outer_head) &&($grace_required_for_outer_head > 0)){
							/*Can pass thru all nss*/	
							
                                $subject[$key]["Theory_marks"]=$subject[$key]["Theory_marks"]+$grace_required_for_outer_head;
                                $max_grace_for_entitlement-=$grace_required_for_outer_head;
                                $subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_for_outer_head;
                                $update_query+=$grace_required_for_outer_head;
								
							    $sub_priority=$subject[$key]["sub_id"];
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required_for_outer_head.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
                               
                            }
                           
						   /*added from here simone because split grace not happening*/
							//else if(($dummy3 >= 0) &&($dummy2 >= $subject[$key]["Min_theory"]) && $grace_required_for_outer_head > 0){
							else if(($maximum_ent_possible >= 0) &&($dummy2 >= $subject[$key]["Min_theory"]) && $grace_required_for_outer_head > 0){
						   		//echo "<br/>I AM IN CASE 2";
								//echo "<br/>Sub=".$subject[$key]["sub_id"];
								//echo $grace_required;
								

						   		//$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$marks_per_sub_ent;
						   		$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$maximum_ent_possible;
								
                               // $max_grace_for_entitlement-=$marks_per_sub_ent;   
                                $max_grace_for_entitlement-=$maximum_ent_possible;   
								
								$sub_priority=$subject[$key]["sub_id"];
								  
                               // $marks_update['symbol']=array('activity_symbol'=>'+ '.$marks_per_sub_ent.'#');
                                $marks_update['symbol']=array('activity_symbol'=>'+ '.$maximum_ent_possible.'#');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                               
								//$update_query+=$marks_per_sub_ent;
								$update_query+=$maximum_ent_possible;
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$marks_per_sub.'#');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update2,$stream_tbl_name);
								/* echo $this->db->last_query();
								exit; */
						   }
						   /*till here*/
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
			/* echo $register_number.'<pre>';
			print_r($fail); */
			//exit;
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
								
								
								
								$sub_priority=$subject[$key]["sub_id"];
								
                                $marks_update['symbol']=array('gen_symbol'=>'+ '.$grace_required.'$');
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
                                $this->home1->updateMarks($marks_update,$stream_tbl_name);
								
								$marks_update2['symbol']=array('gen_the_symbol'=>'+ '.$grace_required.'$');
								$marks_update2['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
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
								/*comment because dont add passed pracs to total*/
                                //$subject[$key]["Total_marks"]=$subject[$key]["Total_marks"]+$grace_required_inner_head;
                                $update_query+=$grace_required_inner_head;
									
													
								$sub_priority=$subject[$key]["sub_id"];
								
								$marks_update3['symbol']=array('gen_the_pract_sym'=>'+ '.$grace_required_inner_head.'$');
								$marks_update3['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
								$this->home1->updateMarkInnerHead($marks_update3,$stream_tbl_name);
                           
                             }
                             
                             //grace for outer head
							 /*-----------sdfsdfs*/
                             $cal=($subject[$key]["internal_pass"]+$subject[$key]["theory_pass"]);
                             //$grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["internal_marks"])+($subject[$key]["Theory_marks"])));
                             
                             $grace_required_for_outer_head=(($cal*40/100)-(($subject[$key]["Total_marks"])));
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
                                $marks_update['mark']=array('pr_number'=>$register_number,'sub_id'=>$sub_priority);
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
    }
	
    
?>

