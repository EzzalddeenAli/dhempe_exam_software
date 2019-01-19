<?php
	
	class supplementary_marksheets extends CI_Controller
	{
		function index()
		{
			$data['type']='all';
			$this->load->view('supplementary_marksheets',$data);
		}
		function now_eligible_index()
		{
			$data['type']='now_eligible';
			$this->load->view('supplementary_marksheets',$data);
		}
		
		function generate_marksheets($typeOfGeneration='')
		{
			require_once("Mpdf/Mpdf.php");
			require_once('numtowords1.php');
			
			$mpdf = new mPDF('','',0,'',0,0,5,10,9,9,'L');
			
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			
			$sem1="sem_1";
			$sem2="sem_2";
			$sem3="sem_3";
			$sem4="sem_4";
				
			if($stream.$semester == "ba_student_detail_".$semester){
				$marks_table="ba_supple_marks_".$semester;
		     	$mark_struct="ba_sub_".$semester;
				$first_attempt_table = "ba_student_marks_".$semester;
				
			    $folder="supplementary/BA";
				$paramSet=1;
				if($semester == $sem1){
					$max_marks_total = 750;
					$min_marks_total = 300;
					
					$print_class_name="F.Y.B.A. First Semester Supplementary";
				}
				else if($semester == $sem2){
					$max_marks_total = 750;
					$min_marks_total = 300;
					
					$print_class_name="F.Y.B.A. Second Semester Supplementary";
				}
				else if($semester == $sem3){
					$max_marks_total = 700;
					$min_marks_total = 280;
					
					$print_class_name="S.Y.B.A. Third Semester Supplementary";
				}
				else if($semester == $sem4){
					$max_marks_total = 700;
					$min_marks_total = 280;
					
					$print_class_name="S.Y.B.A. Fourth Semester Supplementary";
				}
			}
			else if($stream.$semester =="bsc_cmp_sci_student_detail_".$semester){
				$marks_table="bsc_cmp_sci_supple_marks_".$semester;
			    $mark_struct="bsc_cmp_sci_sub_".$semester;
				$first_attempt_table = "bsc_cmp_sci_student_marks_".$semester;
				
				$folder="supplementary/BCS";
				$paramSet=1;
				if($semester == $sem1){
					$max_marks_total = 750;
					$min_marks_total = 300;
					
					$print_class_name="F.Y.B.Sc First Semester Supplementary";
				}
				else if($semester == $sem2){
					$max_marks_total = 750;
					$min_marks_total = 300;
					
					$print_class_name="F.Y.B.Sc Second Semester Supplementary";
				}
				else if($semester == $sem3){
					$max_marks_total = 700;
					$min_marks_total = 280;
					
					$print_class_name="S.Y.B.Sc Third Semester Supplementary";
				}
				else if($semester == $sem4){
					$max_marks_total = 700;
					$min_marks_total = 280;
					
					$print_class_name="S.Y.B.Sc Fourth Semester Supplementary";
				}
			}
			else if($stream.$semester =="bsc_student_detail_".$semester){
				$marks_table="bsc_supple_marks_".$semester;
				$mark_struct="bsc_sub_".$semester;
				$first_attempt_table = "bsc_student_marks_".$semester;
				
				$folder="supplementary/BSC";
				$paramSet=1;
				if($semester == $sem1){
					$max_marks_total = 750;
					$min_marks_total = 300;
					
					$print_class_name="F.Y.B.Sc First Semester Supplementary";
				}
				else if($semester == $sem2){
					$max_marks_total = 750;
					$min_marks_total = 300;
					
					$print_class_name="F.Y.B.Sc Second Semester Supplementary";
				}
				else if($semester == $sem3){
					$max_marks_total = 700;
					$min_marks_total = 280;
					
					$print_class_name="S.Y.B.Sc Third Semester Supplementary";
				}
				else if($semester == $sem4){
					$max_marks_total = 700;
					$min_marks_total = 280;
					
					$print_class_name="S.Y.B.Sc Fourth Semester Supplementary";
				}
			}
			else if($stream.$semester =="bcom_student_detail_".$semester){
				$marks_table="bcom_supple_marks_".$semester;
				$mark_struct="bcom_sub_".$semester;
				$folder="supplementary/BCOM";
				if($semester == $sem1){
					$print_class_name="F.Y.B.COM First Semester Supplementary";
				}
				else if($semester == $sem2){
					$print_class_name="F.Y.B.COM  Second Semester Supplementary";
				}
				else if($semester == $sem3){
					$print_class_name="S.Y.B.COM  Third Semester Supplementary";
				}
				else if($semester == $sem4){
					$print_class_name="S.Y.B.COM  Fourth Semester Supplementary";
				}
			}
			
			//get student details
			$this->load->model('supplement_marksheets');
			
			if($typeOfGeneration == '')
					$student_details = $this->supplement_marksheets->getStudentDetails($stream.$semester);
			 else if($typeOfGeneration == 'now_eligible')
					$student_details = $this->supplement_marksheets->getStudentDetails_now_eligible($stream.$semester);
			    /**Dynamic Data*/
				$this->load->model('dataentry');
			    $marksheet_data=$this->dataentry->get_marksheet_data();
				foreach($marksheet_data as $md)
				{
				$date= $md->exam_held_in;
				$entered_by= $md->entered_by;
				$date_of_declaration = implode( '/', array_reverse(explode('-',$md->date_of_declaration)));
				$date_of_issue = implode( '/', array_reverse(explode('-',$md->date_of_issue)));
				}
			foreach($student_details as $supplementary_Student)
			{
				$register_number = $supplementary_Student->pr_number;
				$seatno          = $supplementary_Student->seat_number;
				
				$display_grace = "";
				
				$gen_grace_utilise = $supplementary_Student->gen_grace_alloc-$supplementary_Student->gen_grace_remain;
				if($gen_grace_utilise == 0)
					$gen_grace_utilise = "";
				
				
				if(($supplementary_Student->entitlement_grace_alloc != 0)&&($supplementary_Student->sports_grace_alloc ==0)){
					$display_grace = $supplementary_Student->entitlement_grace_alloc;
				}
				if($supplementary_Student->sports_grace_alloc != 0){
					$display_grace = $supplementary_Student->sports_grace_alloc;
				}
				
				$entitlement ="";
				
				if($display_grace != "")
				{
					$entitlement = "+ ".$display_grace." # ";
				}
			
				$subj1 = $supplementary_Student->subj_1;
				$subj2 = $supplementary_Student->subj_2;
				$subj3 = $supplementary_Student->subj_3;
				$subj4 = $supplementary_Student->subj_4;
				$subj5 = $supplementary_Student->subj_5;
				$subj6 = $supplementary_Student->subj_6;
				$subj7 = $supplementary_Student->subj_7;
				$subj8 = $supplementary_Student->subj_8;
				
$studen_name = ($supplementary_Student->gender == 'F' ? '/'.$supplementary_Student->name : $supplementary_Student->name); 
				/******************PDF**********************/
				$mpdf->WriteHTML('<br/><br/><br/><div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:3px;">Dempo Charities Trusts</div>');
				$mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:0px; margin-top:2px;">Dhempe College of Arts and Science</div>');
				$mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px;">Miramar,Panaji,Goa.</div>');
				
				$mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px;">Re-Accredited At \'A\' Grade by NAAC</div>');
		
				$mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:3px;">ISO 9001 : 2008 Certified</div>');
				
				$mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:3px;">(Affiliated to Goa University)</div>');
				
				$mpdf->WriteHTML('<div style="text-align:center;font-size:10px; margin-top:3px;">STATEMENT OF MARKS</div>');
				
				$mpdf->WriteHTML(
				'<div style="margin-top:5px;">
					<div style="margin-left:120px;">No.&nbsp;&nbsp;&nbsp;&nbsp; <u> '.$seatno.' </u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P.R. No.<u> '.$register_number.' </u></div>
				
				<div style="font-size:12px; margin-top:5px; margin-left:120px; font-family:\"Times New Roman\", Times, serif;">
					Certificate showing the marks obtained by
				</div>
				
				<div style="margin-left:120px; margin-top:3px;">SHRI/KUM:- '.$studen_name.'</div>
				<div style="margin-left:120px; margin-top:3px;">At the '.$print_class_name.' Examination held in '.$date.'</div>
				</div>
				'
				);
				
				
				//get mark structure
				$subject_structure=array();
				
				$subject_structure = $this->supplement_marksheets->getSubMarkStructure($mark_struct,$subj1,$subj2,$subj3,$subj4,$subj5,$subj6,$subj7,$subj8);
				
				
				//print '<pre>';
				//print_r($subject_structure);
				//print '</pre>';
				
				/*Table structure*/
				$mpdf->WriteHTML(
			'<table width="90%" border="1" style="border-collapse:collapse;margin-left:120px; margin-top:2px ;text-align:center; ">
				<tr>
					<td>Sr.No</td>
					<td>SUBJECT</td>
					<td></td>
					<td>Max Marks</td>
					<td>Min Marks</td>
					<td>Marks Obtained</td>
				</tr>');
				
				
				$j = 0;
				$final_total = 0;
				$fail_flag_set = 0;
				$result1 = 0;
				$result2 = 0;
				$result3 = 0;
				$CurrentAttemptNumber = $this->supplement_marksheets->getCurrentAttempt($register_number,$marks_table);
				foreach($subject_structure as $subject_details)
				{			
					/* get first attempt marks */
					//$first_attempt = $this->supplement_marksheets->getFirstAttemptMarks($register_number,$first_attempt_table,$subject_details->sub_id);
					$first_attempt = $this->supplement_marksheets->getPrevAttemptMarks($register_number,$marks_table,$subject_details->sub_id);
					
					foreach($first_attempt as $marks)
					{
						$first_internal  = $marks->internal;
						$first_theory    = $marks->theory;
						$first_practicle = $marks->practicle;
					}
					
					
					/* get current supplementary marks */
					$current_supplement_attempt = $this->supplement_marksheets->getCurrentAttemptMarks($register_number,$marks_table,$subject_details->sub_id);
					
					//get remark pass or fail
					$remark_status =array();
					$remark_status = $this->supplement_marksheets->getRemark($register_number,$marks_table,$subject_details->sub_id);
					
					$total_print_tag = "";
					if(count($remark_status) > 0)
					{
						$display_remark = "Fail";
						$fail_flag_set = 1;
					}
					else
					{
						$display_remark = "Passes";
					}
					
					
					foreach($current_supplement_attempt as $marks2)
					{
					
						$current_internal_abs = $marks2->isa_abs;
						$current_see_abs = $marks2->see_abs;
						$current_practicle_abs = $marks2->pract_abs;
						
						$absent_flag = 0;
						
						/* internal absent */
						if($current_internal_abs == 'A'){
							$current_internal = "ABS";
							$current_internal_total = 0;
							$absent_flag++;
							
						}else{
							$current_internal  = $marks2->internal;
							$current_internal_total =  $marks2->internal;
						}
						
						/* see absent */
						if($current_see_abs == 'A'){
							$current_theory = "ABS";
							$current_theory_total = 0;
							$absent_flag++;
						}else{
							$current_theory    = $marks2->theory;
							$current_theory_total = $marks2->theory;
						}
						
						/* practicle absent */
						if($current_practicle_abs == 'A'){
							$current_practicle = "ABS";
							$current_practicle_total = 0;
							
						}else{
							$current_practicle = $marks2->practicle;
							$current_practicle_total = $marks2->practicle;
						}
						
						$gen_the_symbol = $marks2->gen_the_symbol;// used for activity pracs
						$gen_symbol = $marks2->gen_symbol;
						$nss_symbol = $marks2->activity_symbol;
						$pract_symbol = $marks2->gen_the_pract_sym;
						
						$print_tag ="";
						if($fail_flag_set == 1)
						{
							if($marks2->pass_status == 'F')
							{
								$print_tag = 'N';
							}
							else
							{
								$print_tag = 'E';
							}
						}
						
						//grand total grace
						$trim1=trim($gen_symbol,'#');
						$trim2=trim($trim1,'+');
						$result1 +=intval($trim2);
						
						$trim1=trim($nss_symbol,'#');
						$trim2=trim($trim1,'+');
						$result2 +=intval($trim2);
						
						$trim1=trim($pract_symbol,'#');
						$trim2=trim($trim1,'+');
						$result3 +=intval($trim2);
						//new added by simone to calculate display of total grace mks theory
						$display_theory_grace="";
						if($marks2->gen_the_pract_sym=="")// no grace for pracs
						$display_theory_grace=$marks2->activity_symbol.' '.$marks2->gen_symbol;
						else
						{
						if((strpos($marks2->gen_the_pract_sym,'#') == true) )
						 {
						 $show_cal="";
						 $amt_recd=(preg_replace("/[^0-9]/","",$marks2->activity_symbol)-preg_replace("/[^0-9]/","",$marks2->gen_the_pract_sym));
						 if($amt_recd >0 )  $show_cal=' + '.$amt_recd.'#';
						 $display_theory_grace=$show_cal.$marks2->gen_symbol;
						 
						 }
						 if((strpos($marks2->gen_the_pract_sym,'$') == true) )
						 {
						 $show_cal="";
						 $amt_recd=(preg_replace("/[^0-9]/","",$marks2->gen_symbol)-preg_replace("/[^0-9]/","",$marks2->gen_the_pract_sym));
						 if($amt_recd >0 )$show_cal=' + '.$amt_recd.'$';
						 $display_theory_grace=$marks2->activity_symbol.$show_cal;
						 
						 }
						
						}
						
						
						
						
						
						
					}
					
					if($result1 != 0 ){ $result1 .=" $"; $general= "+ ".$result1;  }else{ $general=""; }
					if($result2 != 0 ){ $nss = "+ ".$result2." #";  }else{ $nss=""; }
					
					$isa_marks_carried   = "";
					$see_marks_carried   = "";
					$pract_marks_carried = "";
					 
					if($first_internal == $current_internal)
					{
						$isa_marks_carried = '+';		
					}
					if($first_theory == $current_theory)
					{
						$see_marks_carried = '+';		
					}
					if($first_practicle == $current_practicle)
					{
						$pract_marks_carried = '+';		
					}
					
					
					$mpdf->WriteHTML(	
							'<tr>
								<td>'.($j+1).'</td>
								<td>'.($subject_details->sub_name).'</td>
								<td>ISA</td>
								<td>'.$subject_details->internal_marks.'</td>
								<td>NA</td>
								<td>'.$current_internal.' '.$isa_marks_carried.'</td>
							</tr>
				
							<tr>
								<td></td>
								<td></td>
								<td>SEE</td>
								<td>'.$subject_details->semester_marks.'</td>
								<td>NA</td>
								<td>'.$current_theory.' '.$see_marks_carried.'</td>
							</tr>
						
					');
					
					
					$total = $current_internal_total + $current_theory_total;
					$final_total += $total;
					
					if($subject_details->practical_marks != -1 )
					{
						$mpdf->WriteHTML('
							<tr>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>'.$subject_details->total.'</td>
								<td>'.$subject_details->minimum_theory.'</td>
								<td>'.$total.' '.$display_theory_grace.'</td>
							</tr>
						');
						
						$mpdf->WriteHTML('
							<tr>
								<td></td>
								<td></td>
								<td>Practical</td>
								<td>'.$subject_details->practical_marks.'</td>
								<td>'.$subject_details->min_practical.'</td>
								<td>'.$current_practicle.' '.$pract_symbol.' '.$pract_marks_carried.'</td>
							</tr>
						');
						
						$final_total += $current_practicle_total;
					}
					else
					{
						if($absent_flag == 2)
						{
							$mpdf->WriteHTML('
								<tr>
									<td></td>
									<td></td>
									<td>Total</td>
									<td>'.$subject_details->total.'</td>
									<td>'.$subject_details->minimum_theory.'</td>
									<td>ABS</td>
								</tr>
							');
						}
						else
						{
							$mpdf->WriteHTML('
								<tr>
									<td></td>
									<td></td>
									<td>Total</td>
									<td>'.$subject_details->total.'</td>
									<td>'.$subject_details->minimum_theory.'</td>
									<td>'.$total.' '.$nss_symbol.' '.$gen_symbol.'</td>
								</tr>
							');	
						}
					}
					
					$j++;
				}
				$mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Grand Total</td>
									<td></td>
									<td>'.$max_marks_total.'</td>
									<td>'.$min_marks_total.'</td>
									<td>'.$final_total.' '.$entitlement.' '.$general.'</td>
								</tr>
				');
				$entitlement_total=0;
				$gen_total=0;$total_words=0;
				
				$final_total;
				$entitlement_total=preg_replace("/[^0-9]/","",$entitlement);
				$gen_total=preg_replace("/[^0-9]/","",$general);
				$total_words=$final_total+$entitlement_total+$gen_total;
				
				$mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Total Marks in Words</td>
									<td colspan="3">'.convert_number_to_words($total_words).'<td>
								</tr>
				');
				
				$mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Remark</td>
									<td colspan="3">'.$display_remark.'<td>
								</tr>
							');
						
				$mpdf->WriteHTML('	
									</table>');
			$mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:12px;">NO. OF ATTEMPT :- '.$CurrentAttemptNumber.' </div>
							');
							$mpdf->WriteHTML(
							'<div style="margin-left:120px; margin-top:2px; font-size:12px;">ENTERED BY :  '.$entered_by.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHECKED BY : ____________
							'
							);
							
							$mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:12px;">Date of declaration :- '.$date_of_declaration.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Issue :-  '.$date_of_issue.'</div>
							');
							
							$mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:12px;">MEDIUM OF INSTRUCTION :- ENGLISH '.nbs(80).'PRINCIPAL</div>
							');
						
						 /* $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:13px; font-size:12px;">'.nbs(145).'PRINCIPAL</div>
							');
							 */
						     $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:7px; ">ISA=Intra Semester Assessment.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEE= Semester End Examination.</div>
							');
							
							$mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:7px;">#= NSS/NCC/Sports/Cultural/Activities. 	$= Grace	ABS=Absent; 	E=Exemption;	N=No Exemption </div>
							');
							
							$mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:7px;">P=Pass 	F; Fails +: - Marks carried	NA-Not Applicable</div>
							');
							
				$mpdf->AddPage();
			//exit;
			}
			$mpdf->Output();
			
		}
		// generate marksheets function ends here 
	}
	
	
?>