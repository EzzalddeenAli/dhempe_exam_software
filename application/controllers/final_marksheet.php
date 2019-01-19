<?php

class final_marksheet extends CI_Controller
{
    //select stream and semester for generate final marksheet
    public function print_marksheet()
    {
        $data['type'] = 'all';
        $this->load->view('printmarksheet', $data);
    }
    public function now_eligible_print_marksheet()
    {
        $data['type'] = 'now_eligible';
        $this->load->view('printmarksheet', $data);
    }

    //select stream and semester for checklist
    public function check_list()
    {
        $data['type'] = 'all';
        $this->load->view('checklist', $data);
    }
    public function nowEligibleChecklist()
    {
        $data['type'] = 'now_eligible';
        $this->load->view('checklist', $data);
    }

    /*modified code on 29 april 2013 starts here*/
    public function supple_check_list()
    {
        $data['type'] = 'all';
        $this->load->view('supple_checklist', $data);
    }public function nowEligibleChecklistSupplementary()
    {
        $data['type'] = 'now_eligible';
        $this->load->view('supple_checklist', $data);
    }
    /*modified code on 29 april 2013 ends here*/

    /*Modified code on 18 April 2013*/

    public function checkISA()
    {
        $this->load->view('isa_checklist');
    }

    /* Modified code on 18 April 2013*/
    public function displayStudentISA()
    {
        require_once "Mpdf/Mpdf.php";
        require_once 'numtowords1.php';

        $mpdf = new mPDF('', 'A4', 0, '', 0, 0, 5, 10, 9, 9, 'L');

        $stream = $this->input->post('stream');
        $semester = $this->input->post('semester');

        $this->load->model('home1');

        //choose table to select marks
        if ($stream . $semester == "ba_student_detail_" . $semester) {
            $marks_table = "ba_student_marks_" . $semester;
            $mark_struct = "ba_sub_" . $semester;
            $folder = "final/BA";
            $stream_name = "B.A.";
        } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
            $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
            $mark_struct = "bsc_cmp_sci_sub_" . $semester;
            $folder = "final/BCS";
            $stream_name = "B.C.S.";
        } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
            $marks_table = "bsc_student_marks_" . $semester;
            $mark_struct = "bsc_sub_" . $semester;
            $folder = "final/BSC";
            $stream_name = "B.S.C.";
        } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
            $marks_table = "bcom_student_marks_" . $semester;
            $mark_struct = "bcom_sub_" . $semester;
            $folder = "final/BCOM";
            $stream_name = "B.COM.";
        }

        $stream_tbl_name = $marks_table;

        //get all pr number w.r.t to selected stream and semester
        $this->load->model('dataentry');
        $pr = $this->dataentry->getSemRelPr($stream . $semester);

        foreach ($pr as $row6) {
            $name[] = $row6->name;
            $seatnumber[] = $row6->seat_number;
        }

        $subject_id = $this->dataentry->getSubID($mark_struct);

        $j = 0;

        foreach ($subject_id as $row) {

            //increase execution time
            set_time_limit(0);

            //get all marks related to pr number and do calculation
            $pr_marks = $this->dataentry->getPrRelMarks1($row->sub_id, $marks_table);
            $j = 0;

            $mpdf->WriteHTML('<h3 style="text-align:center;"> Stream : ' . $stream_name . ' Semester : ' . str_replace('sem_', '', $semester) . '</h3>');

            $mpdf->WriteHTML(
                '<h3 style="text-align:center;">Subject : ' . $row->sub_name . '' . nbs(15) . 'I.S.A. :- ' . $row->internal_marks . '' . nbs(15) . '</h3>');

            $mpdf->WriteHTML('
					<table border="1" align="center" style="border-collapse:collapse; margin-left:0px;">
						<tr>
							<td>Pr Number</td>
							<td>Seat Number</td>
							<td>Name</td>
							<td>I.S.A.</td>
				');
            foreach ($pr_marks as $row2) {
                //get mark_structure of a particular paper
                $pr_marks_structure = $this->dataentry->getMarkStruct($mark_struct, $row2->sub_id);
                foreach ($pr_marks_structure as $row4) {

                    if ($row2->isa_abs == "A") {
                        $_13_internal_marks = $row2->isa_abs;
                    } else {
                        $_13_internal_marks = $row2->internal;
                    }
                    $mpdf->WriteHTML('
							<tr>
								<td>' . $row2->pr_number . '</td>
								<td>' . $seatnumber[$j] . '</td>
								<td>' . $name[$j] . '</td>
								<td>' . $_13_internal_marks . '</td>'
                    );
                    $mpdf->WriteHTML('</tr>');
                }
                $j++;
            }
            $mpdf->WriteHTML('</table>');
            $mpdf->AddPage();

        }
        $mpdf->Output();
    }

    //generating checklist for a selected stream and sem
    public function semester_checklist($typeOfGeneration = '')
    {

        require_once "Mpdf/Mpdf.php";

        $mpdf = new mPDF('', 'A3', 0, '', 0, 0, 5, 10, 9, 9, 'L');

        $stream = $this->input->post('stream');
        $semester = $this->input->post('semester');

        $this->load->model('home1');

        if ($semester == "sem_1") {
            $tempSem = 1;
        }if ($semester == "sem_2") {
            $tempSem = 2;
        }if ($semester == "sem_3") {
            $tempSem = 3;
        }if ($semester == "sem_4") {
            $tempSem = 4;
        }

        //choose table to select marks
        if ($stream . $semester == "ba_student_detail_" . $semester) {
            $marks_table = "ba_student_marks_" . $semester;
            $mark_struct = "ba_sub_" . $semester;
            $folder = "BA";
        } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
            $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
            $mark_struct = "bsc_cmp_sci_sub_" . $semester;
            $folder = "BCS";
            $paramset = 1;
        } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
            $marks_table = "bsc_student_marks_" . $semester;
            $mark_struct = "bsc_sub_" . $semester;
            $folder = "BSC";
            $paramset = 1;
        } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
            $marks_table = "bcom_student_marks_" . $semester;
            $mark_struct = "bcom_sub_" . $semester;
            $folder = "BCOM";
        }

        $stream_tbl_name = $marks_table;

        //get all pr number w.r.t to selected stream and semester
        $this->load->model('dataentry');
        if ($typeOfGeneration == '') {
            $pr = $this->dataentry->getSemRelPr_new($stream . $semester);
        } else if ($typeOfGeneration == 'now_eligible') {
            $pr = $this->dataentry->getSemRelPr_now_eligible($stream . $semester);
        }

        $image_path = base_url() . "/images/college_logo.jpg";

        //$mpdf->WriteHTML('<div sstyle="float:left;"><img src="'.$image_path.'" width="80" height="80" /></div>');

        $mpdf->WriteHTML('<div style="text-align: center; ">Dempo Charities Trusts</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:22px;">Dhempe College of Arts and Science</div>');
        $mpdf->WriteHTML('<div style="text-align: center;">Miramar, Panaji,Goa.</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:18px;">Re-Accredited At \'A\' Grade by NAAC</div>');

        $mpdf->WriteHTML('<div style=" padding-left:250px;"><img src="' . $image_path . '" width="80" height="80" /></div>');
        $mpdf->WriteHTML('<div style="text-align: center; padding-top:-60px;">ISO 9001 : 2008 Certified</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:18px;">(Affiliated to Goa University)</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:23px; padding-top:10px;">Provisional MarkSheet</div>');

        $mpdf->WriteHTML('<div style="text-align: center; font-size:18px; padding-bottom:20px;">Stream : ' . $folder . ' Semester : ' . $tempSem . '</div>');

        $counter = 0;

        foreach ($pr as $row) {
            //increase execution time
            set_time_limit(0);
            $counter++;
            $studen_name = $row->name;
            $register_number = $row->pr_number;
            $nss_ncc = $row->ncc_nss_grace_alloc;
            $sports_grace = $row->sports_grace_alloc;
            $result = 0;
            $result1 = 0;

            /*Edited by simone special priority tag removed*/
            /* $mpdf->WriteHTML('<div style="margin-left:20px;">P.R. Number : '.$register_number.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seat Number : '.$row->seat_number.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name : '.$studen_name.' '.$row->special_priority_tag.'</div>'); */
            $mpdf->WriteHTML('<div style="margin-left:20px;">P.R. Number : ' . $register_number . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seat Number : ' . $row->seat_number . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name : ' . $studen_name . ' </div>');
            //get total marks of all subject
            $final_total = $this->dataentry->getTotal($row->pr_number, $marks_table);
            $temp_final_total = 0;
            //pass or fail display
            $status = $this->dataentry->getStatus($row->pr_number, $marks_table);

            //get all marks related to pr number and do calculation
            $pr_marks = $this->dataentry->getPrRelMarks($row->pr_number, $marks_table);

            if (count($pr_marks) == $status) {
                $final_result = 'Pass';
            } else {
                $final_result = 'Fail';
            }

            $j = 0;

            $mpdf->WriteHTML('<table align="center" border="1" style="border-collapse:collapse; margin-left:20px; margin-right:20px;">');
            $mpdf->WriteHTML('<tr>');
            foreach ($pr_marks as $row2) {
                //increase execution time
                set_time_limit(0);

                //get mark_structure of a particular paper
                $pr_marks_structure = $this->dataentry->getMarkStruct($mark_struct, $row2->sub_id);

                //entitlement grace
                $symbolEntitle = $row2->activity_symbol;
                $trim1 = trim($symbolEntitle, '#');
                $trim2 = trim($symbolEntitle, '+');
                $result1 += intval($trim2);

                $grace1 = "";
                if ($sports_grace > 0) {
                    $grace1 = "+" . $sports_grace . "#";
                } else if ($nss_ncc > 0) {
                    $grace1 = "+" . $nss_ncc . "#";
                }

                if ($result1 == 0) {
                } else {
                    $temp_result = $result1;
                }

                //general grace
                $symbolAdd = $row2->gen_symbol;
                $trim1 = trim($symbolAdd, '$');
                $trim2 = trim($symbolAdd, '+');
                $result += intval($trim2);

                if ($result == 0) {
                    $grace = "";
                } else {
                    $grace = "+" . $result . "$";
                    $temp_result2 = $result;
                }

                foreach ($pr_marks_structure as $row4) {
                    if ($row2->practicle == -1) {
                        $mpdf->WriteHTML('<td colspan="3">' . $row4->sub_name_display . '</td>');
                    } else {
                        $mpdf->WriteHTML('<td colspan="4">' . $row4->sub_name_display . '</td>');
                    }
                }
            }
            $mpdf->WriteHTML('<td>Total</td>');
            $mpdf->WriteHTML('<td>Result</td>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<tr>');
            foreach ($pr_marks as $row2) {
                $mpdf->WriteHTML('
						<td>ISA</td>
						<td>SEE</td>
					');
                if ($row2->practicle != -1) {
                    $mpdf->WriteHTML('<td>Practical</td');
                }
                $mpdf->WriteHTML('<td>Total</td');
            }
            $mpdf->WriteHTML('</tr>');

            $mpdf->WriteHTML('<tr>');
            foreach ($pr_marks as $row2) {
                set_time_limit(0);
                //modified code 17 april 2013
                if ($row2->isa_abs == 'A') {
                    $_13internal_marks = $row2->isa_abs;
                }
                if ($row2->see_abs == 'A') {
                    $_13semester_marks = $row2->see_abs;
                }
                if ($row2->pract_abs == 'A') {
                    $_13practicle_marks = $row2->pract_abs;
                }

                if ($row2->isa_abs == 'A' && $row2->see_abs == 'A') {
                    $mpdf->WriteHTML('
							<td>A</td>
							<td>A</td>
						');
                    $total_temp = ' A';
                } else if ($row2->isa_abs == 'A' && $row2->see_abs != 'A') {
                    $mpdf->WriteHTML('
							<td>A</td>
							<td>' . $row2->theory . '</td>');
                    $total_temp = $row2->theory;
                } else if ($row2->isa_abs != 'A' && $row2->see_abs == 'A') {
                    $mpdf->WriteHTML('

							<td>' . $row2->internal . '</td>
							<td>A</td>
							');
                    $total_temp = $row2->internal;
                } else {
                    $mpdf->WriteHTML('
							<td>' . $row2->internal . '</td>
							<td>' . $row2->theory . '</td>
						');
                    $total_temp = $row2->internal + $row2->theory;

                }
                $temp_final_total += $row2->internal + $row2->theory;
                $display_theory_grace = "";
                if ($row2->gen_the_pract_sym == "") // no grace for pracs
                {
                    $display_theory_grace = $row2->activity_symbol . ' ' . $row2->gen_symbol;
                } else {
                    if ((strpos($row2->gen_the_pract_sym, '#') == true)) {
                        $show_cal = "";
                        $amt_recd = (preg_replace("/[^0-9]/", "", $row2->activity_symbol) - preg_replace("/[^0-9]/", "", $row2->gen_the_pract_sym));
                        if ($amt_recd > 0) {
                            $show_cal = ' + ' . $amt_recd . '#';
                        }

                        $display_theory_grace = $show_cal . $row2->gen_symbol;

                    }
                    if ((strpos($row2->gen_the_pract_sym, '$') == true)) {
                        $show_cal = "";
                        $amt_recd = (preg_replace("/[^0-9]/", "", $row2->gen_symbol) - preg_replace("/[^0-9]/", "", $row2->gen_the_pract_sym));
                        if ($amt_recd > 0) {
                            $show_cal = ' + ' . $amt_recd . '$';
                        }

                        $display_theory_grace = $row2->activity_symbol . $show_cal;

                    }

                }

                if ($row2->pract_abs == 'A') {
                    if ($row2->practicle != -1) {
                        $mpdf->WriteHTML('<td>A</td');
                        //$total_temp ='A';
                        $temp_final_total += 0;
                    }
                } else {
                    if ($row2->practicle != -1) {
                        $mpdf->WriteHTML('<td>' . $row2->practicle . '' . $row2->gen_the_pract_sym . '</td');
                        $total_temp = $row2->internal + $row2->theory + $row2->practicle;
                        $temp_final_total += $row2->practicle;
                    }
                }
                //$temp_final_total +=$row2->internal+$row2->theory+$row2->practicle;

                if ($row2->gen_the_pract_sym != "") {
                    $mpdf->WriteHTML('<td>' . $total_temp . ' ' . $display_theory_grace . '</td');
                } else {
                    $mpdf->WriteHTML('<td>' . $total_temp . ' ' . $display_theory_grace . '</td');
                }
            }
            $mpdf->WriteHTML('<td>' . $temp_final_total . ' ' . $grace1 . ' ' . $grace . '</td>');
            $mpdf->WriteHTML('<td>' . $final_result . '</td>');
            $mpdf->WriteHTML('</tr>');

            $mpdf->WriteHTML('</table><br/>');

            /*if(($counter%10) == 0){
            $mpdf->AddPage();
            }*/
            if (($mpdf->y) > 350) {
                $mpdf->AddPage();
            }

        }
        //exit;
        $mpdf->Output();

    }
    //**************************************************************sachin9****************************//

    public function gen_2012()
    {
        $number = $this->input->get_post('prnumber');
        $stream = $this->input->get_post('stream1');
        $semester = $this->input->get_post('semester');

        $option = 1;
        $this->gen_mar_2012($stream, $semester, $number, $option);

    }

    public function gen_mar_2012($stream, $semester, $number, $option)
    {
        require_once "Mpdf/Mpdf.php";
        require_once 'numtowords1.php';

        //$mpdf = new mPDF('','',0,'',0,0,5,10,9,9,'L');

        $this->load->model('home1');

        //Set semester subject available
        $sem1 = "sem_1";
        $sem2 = "sem_2";
        $sem3 = "sem_3";
        $sem4 = "sem_4";
        $paramSet = 0;

        if ($option == 1) {
            //choose table to select marks
            if ($stream . $semester == "ba_student_detail_" . $semester) {
                $marks_table = "ba_student_marks_" . $semester;
                $mark_struct = "ba_sub_" . $semester;
                $folder = "final/BA";
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.A. First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.A. Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.A. Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.A. Fourth Semester";
                }
            } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
                $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                $folder = "final/BCS";
                $paramSet = 1;
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.Sc First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.Sc Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.Sc Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.Sc Fourth Semester";
                }
            } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                $marks_table = "bsc_student_marks_" . $semester;
                $mark_struct = "bsc_sub_" . $semester;
                $folder = "final/BSC";
                $paramSet = 1;
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.Sc First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.Sc Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.Sc Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.Sc Fourth Semester";
                }
            } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                $marks_table = "bcom_student_marks_" . $semester;
                $mark_struct = "bcom_sub_" . $semester;
                $folder = "final/BCOM";
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.COM First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.COM  Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.COM  Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.COM  Fourth Semester";
                }
            }
        }

        //print reval marksheet
        else if ($option == 2) {
            if ($stream . $semester == "ba_student_detail_" . $semester) {
                $marks_table = "ba_reval_marks_" . $semester;
                $mark_struct = "ba_sub_" . $semester;
                $folder = "reval/BA";
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.A. First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.A. Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.A. Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.A. Fourth Semester";
                }
            } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                $marks_table = "bsc_cmp_sci_reval_marks_" . $semester;
                $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                $folder = "reval/BCS";
                $paramSet = 1;
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.Sc First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.Sc Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.Sc Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.Sc Fourth Semester";
                }
            } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                $marks_table = "bsc_reval_marks_" . $semester;
                $mark_struct = "bsc_sub_" . $semester;
                $folder = "reval/BSC";
                $paramSet = 1;
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.Sc First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.Sc Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.Sc Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.Sc Fourth Semester";
                }
            } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                $marks_table = "bcom_reval_marks_" . $semester;
                $mark_struct = "bcom_sub_" . $semester;
                $folder = "reval/BCOM";
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.COM First Semester";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.COM  Second Semester";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.COM  Third Semester";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.COM  Fourth Semester";
                }
            }
        }
        //supplementary marksheet
        else if ($option == 3) {
            if ($stream . $semester == "ba_student_detail_" . $semester) {
                $marks_table = "ba_supple_marks_" . $semester;
                $mark_struct = "ba_sub_" . $semester;
                $folder = "supplementary/BA";
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.A. First Semester Supplementary";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.A. Second Semester Supplementary";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.A. Third Semester Supplementary";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.A. Fourth Semester Supplementary";
                }
            } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                $marks_table = "bsc_cmp_sci_supple_marks_" . $semester;
                $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                $folder = "supplementary/BCS";
                $paramSet = 1;
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.Sc First Semester Supplementary";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.Sc Second Semester Supplementary";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.Sc Third Semester Supplementary";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.Sc Fourth Semester Supplementary";
                }
            } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                $marks_table = "bsc_supple_marks_" . $semester;
                $mark_struct = "bsc_sub_" . $semester;
                $folder = "supplementary/BSC";
                $paramSet = 1;
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.Sc First Semester Supplementary";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.Sc Second Semester Supplementary";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.Sc Third Semester Supplementary";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.Sc Fourth Semester Supplementary";
                }
            } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                $marks_table = "bcom_supple_marks_" . $semester;
                $mark_struct = "bcom_sub_" . $semester;
                $folder = "supplementary/BCOM";
                if ($semester == $sem1) {
                    $print_class_name = "F.Y.B.COM First Semester Supplementary";
                } else if ($semester == $sem2) {
                    $print_class_name = "F.Y.B.COM  Second Semester Supplementary";
                } else if ($semester == $sem3) {
                    $print_class_name = "S.Y.B.COM  Third Semester Supplementary";
                } else if ($semester == $sem4) {
                    $print_class_name = "S.Y.B.COM  Fourth Semester Supplementary";
                }
            }
        }

        $temp_result = 0;
        $temp_result2 = 0;
        $stream_tbl_name = $marks_table;
        //echo $stream_tbl_name;die();
        //get all pr number w.r.t to selected stream and semester
        $this->load->model('dataentry');
        $pr = $this->dataentry->getSemRelPrs($stream . $semester);

        $mpdf = new mPDF('', '', 0, '', 0, 0, 5, 10, 9, 9, 'L');

        foreach ($pr as $row) {

            if ($row->pr_number == $number) {
                //check How many subject he/she passthrough
                if ($option == 3) {
                    $no_of_sub_pass = $this->dataentry->getCount2s($row->pr_number, $stream_tbl_name, $row->seat_number);
                } else {
                    $no_of_sub_pass = $this->dataentry->getCounts($row->pr_number, $stream_tbl_name);
                }

                if ($sem1 == $semester) {
                    $totalSubj = 8;
                } else if ($sem2 == $semester) {
                    $totalSubj = 8;
                } else if ($sem3 == $semester) {
                    $totalSubj = 7;
                } else if ($sem4 == $semester) {
                    $totalSubj = 7;
                }

                //check pass in all subject
                $print_remark = "";
                if ($totalSubj == $no_of_sub_pass) {
                    $flag_seted = 1;
                    $print_remark = "Passes";
                } else {
                    $flag_seted = 0;
                    $print_remark = "Fail";
                }

                //increase execution time
                set_time_limit(0);
                $finalcal = 0;

                if ($row->gender == 'F') {
                    $studen_name = "/ " . $row->name;
                } else {
                    $studen_name = $row->name;
                }

                $register_number = $row->pr_number;
                $nss_ncc = $row->ncc_nss_grace_alloc;
                $sports_grace = $row->sports_grace_alloc;
                $seatno = $row->seat_number;

                //$date=date("F Y");
                //$date=date('F Y', strtotime(date('Y-m')." -1 month"));
                $date = "October 2017";
                /******************PDF**********************/
                //$mpdf = new mPDF('','',0,'',0,0,5,10,9,9,'L');
                $mpdf->WriteHTML('<br/><br/><br/><div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:3px;">Dempo Charities Trusts</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:0px; margin-top:2px;">Dhempe College of Arts and Science</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px;">Miramar,Panaji,Goa.</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px;">Re-Accredited At \'A\' Grade by NAAC</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:3px;">ISO 9001 : 2008 Certified</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:3px;">(Affiliated to Goa University)</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-size:10px; margin-top:3px;">STATEMENT OF MARKS</div>');

                $mpdf->WriteHTML(
                    '<div style="margin-top:5px;">
				<div style="margin-left:120px;">No.&nbsp;&nbsp;&nbsp;&nbsp; <u> ' . $seatno . ' </u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P.R. No.<u> ' . $register_number . ' </u></div>

			<div style="font-size:12px; margin-top:5px; margin-left:120px; font-family:\"Times New Roman\", Times, serif;">
				Certificate showing the marks obtained by
			</div>

			<div style="margin-left:120px; margin-top:3px;">SHRI/KUM:- ' . $studen_name . '</div>
			<div style="margin-left:120px; margin-top:3px;">At the ' . $print_class_name . ' Examination held in ' . $date . '</div>
			</div>
			'
                );

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

                /******************PDF**********************/

                //get all marks related to pr number and do calculation
                $pr_marks = $this->dataentry->getPrRelMarkss($row->pr_number, $marks_table);

                /*modified on 20 may 2013 starts */
                if ($option == 3) {
                    $pr_marks = $this->dataentry->getPrRelMarksSupplementarys($row->pr_number, $marks_table);
                }
                /*modified on 20 may 2013 ends */

                $j = 0;
                foreach ($pr_marks as $row2) {
                    $print_tag = "";
                    //get mark_structure of a particular paper
                    $pr_marks_structure = $this->dataentry->getMarkStructs($mark_struct, $row2->sub_id);

                    /*print '<pre>';
                    print_r($pr_marks_structure);
                    print '</pre>';die();
                     */
                    if ($option == 1) {
                        if (($row2->pass_status == 'P') && ($flag_seted == 0)) {
                            $print_tag = "E";
                            $resultStatus = "Fail";
                        } else if (($row2->pass_status == 'F') && ($flag_seted == 0)) {
                            $print_tag = "N";
                            $resultStatus = "Fail";
                        } else {
                            $resultStatus = "Passes";
                        }
                    } else {
                        if (($row2->pass_status == 'P') && ($flag_seted == 0)) {
                            $print_tag = "+";
                            $resultStatus = "Fail";
                        } else if (($row2->pass_status == 'F') && ($flag_seted == 0)) {
                            $print_tag = "N";
                            $resultStatus = "Fail";
                        } else {
                            $resultStatus = "Passes";
                        }
                    }

                    foreach ($pr_marks_structure as $row4) {
                        if ($row2->isa_abs == "") {$isa = $row2->internal;} else { $isa = "ABS";}
                        if ($row2->see_abs == "") {$see = $row2->theory;} else { $see = "ABS";}
                        if ($row2->pract_abs == "") {$pract = $row2->practicle;} else { $pract = "ABS";}

                        $mpdf->WriteHTML(
                            '<tr>
								<td>' . ($j + 1) . '</td>
								<td>' . ($row4->sub_name) . '</td>
								<td>ISA</td>
								<td>' . $row4->internal_marks . '</td>
								<td>NA</td>
								<td>' . $isa . '</td>
							</tr>

							<tr>
								<td></td>
								<td></td>
								<td>SEE</td>
								<td>' . $row4->semester_marks . '</td>
								<td>NA</td>
								<td>' . $see . '</td>
							</tr>

						');

                        if ($paramSet == 0) {
                            //echo "sdnasldnasd".$row4->practical_marks;die();
                            if ($row4->practical_marks != -1) {
                                $practTemp = $row4->practical_marks;
                                $mpdf->WriteHTML('
								<tr>
									<td></td>
									<td></td>
									<td>Practical</td>
									<td>' . $row4->practical_marks . '</td>
									<td>' . $row4->min_practical . '</td>
									<td>' . $pract . '</td>
								</tr>
							');
                            } else {
                                $practTemp = 0;
                            }
                        }

                        //entitlement grace
                        $symbolEntitle = $row2->activity_symbol;
                        $trim1 = trim($symbolEntitle, '#');
                        $trim2 = trim($symbolEntitle, '+');
                        $result1 += intval($trim2);

                        $grace1 = "";
                        if ($sports_grace > 0) {
                            $grace1 = "+" . $sports_grace . "#";
                            $temp_result = $sports_grace;
                        } else if ($nss_ncc > 0) {
                            $grace1 = "+" . $nss_ncc . "#";
                            $temp_result = $nss_ncc;
                        }

                        //general grace
                        $symbolAdd = $row2->gen_symbol;
                        $trim1 = trim($symbolAdd, '$');
                        $trim2 = trim($symbolAdd, '+');
                        $result += intval($trim2);

                        if ($result == 0) {
                            $grace = "";
                        } else {
                            $grace = "+" . $result . "$";
                            $temp_result2 = $result;
                        }
                        $finalcal += $row2->total;

                        if (($paramSet == 1) && ($row2->practicle != -1)) {
                            //echo "iam here";die();
                            if ($row4->practical_marks != -1) {
                                if ($paramSet == 1) {
                                    if (($isa + $see + $temp_result2 + $temp_result >= 30) && ($flag_seted != 1)) {
                                        $print_tag = 'E';
                                    } else if ($flag_seted != 1) {
                                        $print_tag = 'N';
                                    }
                                }
                            }
                        }

                        if (($isa == "ABS") && ($see == "ABS")) {
                            $mpdf->WriteHTML('
							<tr>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>' . ($row4->internal_marks + $row4->semester_marks + $practTemp) . '</td>
								<td>' . (($row4->internal_marks + $row4->semester_marks + $practTemp) * 40 / 100) . '</td>
								<td>ABS</td>
							</tr>');

                        } else {
                            $mpdf->WriteHTML('
							<tr>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>' . ($row4->internal_marks + $row4->semester_marks + $practTemp) . '</td>
								<td>' . (($row4->internal_marks + $row4->semester_marks + $practTemp) * 40 / 100) . '</td>
								<td>' . $row2->total . ' ' . $row2->activity_symbol . ' ' . $row2->gen_symbol . '</td>
							</tr>');
                        }

                        if (($paramSet == 1) && ($row2->practicle != -1)) {
                            if ($row4->practical_marks != -1) {

                                if (($row2->pract_total >= 20) && ($flag_seted != 1)) {
                                    //$ptag='E';
                                    $ptag = '';
                                } else if ($flag_seted != 1) {
                                    //$ptag='N';
                                    $ptag = '';
                                }

                                $mpdf->WriteHTML('
									<tr>
										<td></td>
										<td></td>
										<td>Practical</td>
										<td>50</td>
										<td>20</td>
										<td>' . $row2->practicle . ' ' . $ptag . '</td>
									</tr>
								');
                                $finalcal += $row2->practicle;
                            }
                        }

                    }
                    $j++;

                }
                unset($result1);
                unset($result);

                $mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Grand Total</td>
									<td></td>
									<td>' . $row4->max_agg_marks . '</td>
									<td>' . (($row4->max_agg_marks * 40) / 100) . '</td>
									<td>' . $finalcal . " " . $grace1 . " " . $grace . '</td>
								</tr>
							');

                $mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Total Marks in Words</td>
									<td colspan="3">' . convert_number_to_words($finalcal + $temp_result + $temp_result2) . '<td>
								</tr>
							');

                unset($temp_result);
                unset($temp_result2);

                $mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Remark</td>
									<td colspan="3">' . $print_remark . '<td>
								</tr>
							');

                $mpdf->WriteHTML('
									</table>');

                $mpdf->WriteHTML(
                    '<div style="margin-left:120px; margin-top:2px; font-size:12px;">ENTERED BY :  SN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHECKED BY : ____________
							'
                );

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:12px;">Date of declaration :- 25/11/13 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Issue :- 23/12/2013</div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:12px;">MEDIUM OF INSTRUCTION :- ENGLISH </div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:13px; font-size:12px;">' . nbs(145) . 'PRINCIPAL</div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:7px; ">ISA=Intra Semester Assessment.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEE= Semester End Examination.</div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:7px;">#= NSS/NCC/Sports/Cultural/Activities. 	$= Grace	ABS=Absent; 	E=Exemption;	N=No Exemption </div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:7px;">P=Pass 	F; Fails +: - Marks carried	NA-Not Applicable</div>
							');

                $mpdf->Addpage();
                //$mpdf->Output('marksheet/'.$folder.'/'.$semester.'/'.$studen_name.'.pdf','F');
                //    unset($mpdf);
            }
        } //if to check pr
        $mpdf->Output();
        //$marksheetflag['flag']=0;
        //$this->load->view('printmarksheet',$marksheetflag);

    }

    //Final/Reval/Supplementary marksheet generator
    public function generate_marksheet()
    {
        $year = $this->input->post('year');

        if ($year == '2012') //if 2012 is selected
        {
            $stream = $this->input->post('stream');
            $semester = $this->input->post('semester');

            $tbl_name = $stream . $semester;

            //$this->load->model('home1');
            //$prnumber['data']=$this->home1->getPrNumber($stream,$semester);
            $prnumber['tbl_name'] = $tbl_name;
            $prnumber['stream1'] = $stream;
            $prnumber['sem'] = $semester;

            $this->load->view('select_pr_for_edits', $prnumber);

        } else {
            require_once "Mpdf/Mpdf.php";
            require_once 'numtowords1.php';

            //$mpdf = new mPDF('','',0,'',0,0,5,10,9,9,'L');

            $stream = $this->input->post('stream');
            $semester = $this->input->post('semester');

            $this->load->model('home1');

            //Set semester subject available
            $sem1 = "sem_1";
            $sem2 = "sem_2";
            $sem3 = "sem_3";
            $sem4 = "sem_4";
            $paramSet = 0;

            if ($this->input->post('select_option') == 1) {
                //choose table to select marks
                if ($stream . $semester == "ba_student_detail_" . $semester) {
                    $marks_table = "ba_student_marks_" . $semester;
                    $mark_struct = "ba_sub_" . $semester;
                    $folder = "final/BA";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.A. First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.A. Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.A. Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.A. Fourth Semester";
                    }
                } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                    $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
                    $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                    $folder = "final/BCS";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Fourth Semester";
                    }
                } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                    $marks_table = "bsc_student_marks_" . $semester;
                    $mark_struct = "bsc_sub_" . $semester;
                    $folder = "final/BSC";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Fourth Semester";
                    }
                } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                    $marks_table = "bcom_student_marks_" . $semester;
                    $mark_struct = "bcom_sub_" . $semester;
                    $folder = "final/BCOM";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.COM First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.COM  Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.COM  Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.COM  Fourth Semester";
                    }
                }
            }

            //print reval marksheet
            else if ($this->input->post('select_option') == 2) {
                if ($stream . $semester == "ba_student_detail_" . $semester) {
                    $marks_table = "ba_reval_marks_" . $semester;
                    $mark_struct = "ba_sub_" . $semester;
                    $folder = "reval/BA";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.A. First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.A. Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.A. Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.A. Fourth Semester";
                    }
                } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                    $marks_table = "bsc_cmp_sci_reval_marks_" . $semester;
                    $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                    $folder = "reval/BCS";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Fourth Semester";
                    }
                } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                    $marks_table = "bsc_reval_marks_" . $semester;
                    $mark_struct = "bsc_sub_" . $semester;
                    $folder = "reval/BSC";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Fourth Semester";
                    }
                } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                    $marks_table = "bcom_reval_marks_" . $semester;
                    $mark_struct = "bcom_sub_" . $semester;
                    $folder = "reval/BCOM";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.COM First Semester";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.COM  Second Semester";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.COM  Third Semester";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.COM  Fourth Semester";
                    }
                }
            }
            //supplementary marksheet
            else if ($this->input->post('select_option') == 3) {
                if ($stream . $semester == "ba_student_detail_" . $semester) {
                    $marks_table = "ba_supple_marks_" . $semester;
                    $mark_struct = "ba_sub_" . $semester;
                    $folder = "supplementary/BA";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.A. First Semester Supplementary";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.A. Second Semester Supplementary";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.A. Third Semester Supplementary";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.A. Fourth Semester Supplementary";
                    }
                } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                    $marks_table = "bsc_cmp_sci_supple_marks_" . $semester;
                    $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                    $folder = "supplementary/BCS";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc First Semester Supplementary";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Second Semester Supplementary";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Third Semester Supplementary";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Fourth Semester Supplementary";
                    }
                } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                    $marks_table = "bsc_supple_marks_" . $semester;
                    $mark_struct = "bsc_sub_" . $semester;
                    $folder = "supplementary/BSC";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc First Semester Supplementary";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Second Semester Supplementary";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Third Semester Supplementary";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Fourth Semester Supplementary";
                    }
                } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                    $marks_table = "bcom_supple_marks_" . $semester;
                    $mark_struct = "bcom_sub_" . $semester;
                    $folder = "supplementary/BCOM";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.COM First Semester Supplementary";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.COM  Second Semester Supplementary";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.COM  Third Semester Supplementary";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.COM  Fourth Semester Supplementary";
                    }
                }
            }

            $temp_result = 0;
            $temp_result2 = 0;
            $stream_tbl_name = $marks_table;
            //echo $stream_tbl_name;die();
            //get all pr number w.r.t to selected stream and semester
            $this->load->model('dataentry');
            $pr = $this->dataentry->getSemRelPr($stream . $semester);

            $mpdf = new mPDF('', '', 0, '', 0, 0, 5, 10, 9, 9, 'L');

            foreach ($pr as $row) {
                //check How many subject he/she passthrough
                if ($this->input->post('select_option') == 3) {
                    $no_of_sub_pass = $this->dataentry->getCount2($row->pr_number, $stream_tbl_name, $row->seat_number);
                } else {
                    $no_of_sub_pass = $this->dataentry->getCount($row->pr_number, $stream_tbl_name);
                }

                if ($sem1 == $semester) {
                    $totalSubj = 8;
                } else if ($sem2 == $semester) {
                    $totalSubj = 8;
                } else if ($sem3 == $semester) {
                    $totalSubj = 7;
                } else if ($sem4 == $semester) {
                    $totalSubj = 7;
                }

                //check pass in all subject
                $print_remark = "";
                if ($totalSubj == $no_of_sub_pass) {
                    $flag_seted = 1;
                    $print_remark = "Passes";
                } else {
                    $flag_seted = 0;
                    $print_remark = "Fail";
                }

                //increase execution time
                set_time_limit(0);
                $finalcal = 0;

                if ($row->gender == 'F') {
                    $studen_name = "/ " . $row->name;
                } else {
                    $studen_name = $row->name;
                }

                $register_number = $row->pr_number;
                $nss_ncc = $row->ncc_nss_grace_alloc;
                $sports_grace = $row->sports_grace_alloc;
                $seatno = $row->seat_number;

                //$date=date("F Y");
                //$date=date('F Y', strtotime(date('Y-m')." -1 month"));
                $date = " April 2013";
                /******************PDF**********************/
                //$mpdf = new mPDF('','',0,'',0,0,5,10,9,9,'L');
                $mpdf->WriteHTML('<br/><br/><br/><div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:3px;">Dempo Charities Trusts</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:0px; margin-top:2px;">Dhempe College of Arts and Science</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px;">Miramar,Panaji,Goa.</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px;">Re-Accredited At \'A\' Grade by NAAC</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:3px;">ISO 9001 : 2008 Certified</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:3px;">(Affiliated to Goa University)</div>');

                $mpdf->WriteHTML('<div style="text-align:center;font-size:10px; margin-top:3px;">STATEMENT OF MARKS</div>');

                $mpdf->WriteHTML(
                    '<div style="margin-top:5px;">
				<div style="margin-left:120px;">No.&nbsp;&nbsp;&nbsp;&nbsp; <u> ' . $seatno . ' </u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P.R. No.<u> ' . $register_number . ' </u></div>

			<div style="font-size:12px; margin-top:5px; margin-left:120px; font-family:\"Times New Roman\", Times, serif;">
				Certificate showing the marks obtained by
			</div>

			<div style="margin-left:120px; margin-top:3px;">SHRI/KUM:- ' . $studen_name . '</div>
			<div style="margin-left:120px; margin-top:3px;">At the ' . $print_class_name . ' Examination held in ' . $date . '</div>
			</div>
			'
                );

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

                /******************PDF**********************/

                //get all marks related to pr number and do calculation
                $pr_marks = $this->dataentry->getPrRelMarks($row->pr_number, $marks_table);

                /*modified on 20 may 2013 starts */
                if ($this->input->post('select_option') == 3) {
                    $pr_marks = $this->dataentry->getPrRelMarksSupplementary($row->pr_number, $marks_table);
                }
                /*modified on 20 may 2013 ends */

                $j = 0;
                foreach ($pr_marks as $row2) {
                    $print_tag = "";
                    //get mark_structure of a particular paper
                    $pr_marks_structure = $this->dataentry->getMarkStruct($mark_struct, $row2->sub_id);

                    /*print '<pre>';
                    print_r($pr_marks_structure);
                    print '</pre>';die();
                     */
                    if ($this->input->post('select_option') == 1) {
                        if (($row2->pass_status == 'P') && ($flag_seted == 0)) {
                            $print_tag = "E";
                            $resultStatus = "Fail";
                        } else if (($row2->pass_status == 'F') && ($flag_seted == 0)) {
                            $print_tag = "N";
                            $resultStatus = "Fail";
                        } else {
                            $resultStatus = "Passes";
                        }
                    } else {
                        if (($row2->pass_status == 'P') && ($flag_seted == 0)) {
                            $print_tag = "+";
                            $resultStatus = "Fail";
                        } else if (($row2->pass_status == 'F') && ($flag_seted == 0)) {
                            $print_tag = "N";
                            $resultStatus = "Fail";
                        } else {
                            $resultStatus = "Passes";
                        }
                    }

                    foreach ($pr_marks_structure as $row4) {
                        if ($row2->isa_abs == "") {$isa = $row2->internal;} else { $isa = "ABS";}
                        if ($row2->see_abs == "") {$see = $row2->theory;} else { $see = "ABS";}
                        if ($row2->pract_abs == "") {$pract = $row2->practicle;} else { $pract = "ABS";}

                        $mpdf->WriteHTML(
                            '<tr>
								<td>' . ($j + 1) . '</td>
								<td>' . ($row4->sub_name) . '</td>
								<td>ISA</td>
								<td>' . $row4->internal_marks . '</td>
								<td>NA</td>
								<td>' . $isa . '</td>
							</tr>

							<tr>
								<td></td>
								<td></td>
								<td>SEE</td>
								<td>' . $row4->semester_marks . '</td>
								<td>NA</td>
								<td>' . $see . '</td>
							</tr>

						');

                        if ($paramSet == 0) {
                            //echo "sdnasldnasd".$row4->practical_marks;die();
                            if ($row4->practical_marks != -1) {
                                $practTemp = $row4->practical_marks;
                                $mpdf->WriteHTML('
								<tr>
									<td></td>
									<td></td>
									<td>Practical</td>
									<td>' . $row4->practical_marks . '</td>
									<td>' . $row4->min_practical . '</td>
									<td>' . $pract . '</td>
								</tr>
							');
                            } else {
                                $practTemp = 0;
                            }
                        }

                        //entitlement grace
                        $symbolEntitle = $row2->activity_symbol;
                        $trim1 = trim($symbolEntitle, '#');
                        $trim2 = trim($symbolEntitle, '+');
                        $result1 += intval($trim2);

                        $grace1 = "";
                        if ($sports_grace > 0) {
                            $grace1 = "+" . $sports_grace . "#";
                            $temp_result = $sports_grace;
                        } else if ($nss_ncc > 0) {
                            $grace1 = "+" . $nss_ncc . "#";
                            $temp_result = $nss_ncc;
                        }

                        //general grace
                        $symbolAdd = $row2->gen_symbol;
                        $trim1 = trim($symbolAdd, '$');
                        $trim2 = trim($symbolAdd, '+');
                        $result += intval($trim2);

                        if ($result == 0) {
                            $grace = "";
                        } else {
                            $grace = "+" . $result . "$";
                            $temp_result2 = $result;
                        }
                        $finalcal += $row2->total;

                        if (($paramSet == 1) && ($row2->practicle != -1)) {
                            //echo "iam here";die();
                            if ($row4->practical_marks != -1) {
                                if ($paramSet == 1) {
                                    if (($isa + $see + $temp_result2 + $temp_result >= 30) && ($flag_seted != 1)) {
                                        $print_tag = 'E';
                                    } else if ($flag_seted != 1) {
                                        $print_tag = 'N';
                                    }
                                }
                            }
                        }

                        if (($isa == "ABS") && ($see == "ABS")) {
                            $mpdf->WriteHTML('
							<tr>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>' . ($row4->internal_marks + $row4->semester_marks + $practTemp) . '</td>
								<td>' . (($row4->internal_marks + $row4->semester_marks + $practTemp) * 40 / 100) . '</td>
								<td>ABS</td>
							</tr>');

                        } else {
                            $mpdf->WriteHTML('
							<tr>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>' . ($row4->internal_marks + $row4->semester_marks + $practTemp) . '</td>
								<td>' . (($row4->internal_marks + $row4->semester_marks + $practTemp) * 40 / 100) . '</td>
								<td>' . $row2->total . ' ' . $row2->activity_symbol . ' ' . $row2->gen_symbol . '</td>
							</tr>');
                        }

                        if (($paramSet == 1) && ($row2->practicle != -1)) {
                            if ($row4->practical_marks != -1) {

                                if (($row2->pract_total >= 20) && ($flag_seted != 1)) {
                                    //$ptag='E';
                                    $ptag = '';
                                } else if ($flag_seted != 1) {
                                    //$ptag='N';
                                    $ptag = '';
                                }

                                $mpdf->WriteHTML('
									<tr>
										<td></td>
										<td></td>
										<td>Practical</td>
										<td>50</td>
										<td>20</td>
										<td>' . $row2->practicle . ' ' . $ptag . '</td>
									</tr>
								');
                                $finalcal += $row2->practicle;
                            }
                        }

                    }
                    $j++;

                }
                unset($result1);
                unset($result);

                $mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Grand Total</td>
									<td></td>
									<td>' . $row4->max_agg_marks . '</td>
									<td>' . (($row4->max_agg_marks * 40) / 100) . '</td>
									<td>' . $finalcal . " " . $grace1 . " " . $grace . '</td>
								</tr>
							');

                $mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Total Marks in Words</td>
									<td colspan="3">' . convert_number_to_words($finalcal + $temp_result + $temp_result2) . '<td>
								</tr>
							');

                unset($temp_result);
                unset($temp_result2);

                $mpdf->WriteHTML('
								<tr>
								    <td></td>
									<td>Remark</td>
									<td colspan="3">' . $print_remark . '<td>
								</tr>
							');

                $mpdf->WriteHTML('
									</table>');

                $mpdf->WriteHTML(
                    '<div style="margin-left:120px; margin-top:2px; font-size:12px;">ENTERED BY :  SN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHECKED BY : ____________
							'
                );

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:12px;">Date of declaration :- 25/11/13 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Issue :- 23/12/2013</div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:12px;">MEDIUM OF INSTRUCTION :- ENGLISH </div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:13px; font-size:12px;">' . nbs(145) . 'PRINCIPAL</div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:2px; font-size:7px; ">ISA=Intra Semester Assessment.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEE= Semester End Examination.</div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:7px;">#= NSS/NCC/Sports/Cultural/Activities. 	$= Grace	ABS=Absent; 	E=Exemption;	N=No Exemption </div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:120px; margin-top:1px; font-size:7px;">P=Pass 	F; Fails +: - Marks carried	NA-Not Applicable</div>
							');

                $mpdf->Addpage();
                //$mpdf->Output('marksheet/'.$folder.'/'.$semester.'/'.$studen_name.'.pdf','F');
                //    unset($mpdf);
            }
            $mpdf->Output();
            $marksheetflag['flag'] = 1;
            $this->load->view('printmarksheet', $marksheetflag);

        } //else bracket

    }

	//Final/Reval/Supplementary changed simone marksheet generator
	//vaibhav
    public function generate_marksheet_new($typeOfGeneration = '')
    {
        $year = $this->input->post('year');

        if ($year == '2012') //if 2012 is selected
        {
            $stream = $this->input->post('stream');
            $semester = $this->input->post('semester');

            $tbl_name = $stream . $semester;

            //$this->load->model('home1');
            //$prnumber['data']=$this->home1->getPrNumber($stream,$semester);
            $prnumber['tbl_name'] = $tbl_name;
            $prnumber['stream1'] = $stream;
            $prnumber['sem'] = $semester;

            $this->load->view('select_pr_for_edits', $prnumber);

        } else {
            require_once "Mpdf/Mpdf.php";
            require_once 'numtowords1.php';

            //$mpdf = new mPDF('','',0,'',0,0,5,10,9,9,'L');

            $stream = $this->input->post('stream');
            $semester = $this->input->post('semester');

            $this->load->model('home1');

            //Set semester subject available
            $sem1 = "sem_1";
            $sem2 = "sem_2";
            $sem3 = "sem_3";
            $sem4 = "sem_4";
            $paramSet = 0;

            if ($this->input->post('select_option') == 1) {
                //choose table to select marks
                if ($stream . $semester == "ba_student_detail_" . $semester) {
                    $marks_table = "ba_student_marks_" . $semester;
                    $mark_struct = "ba_sub_" . $semester;
                    $folder = "final/BA";
                    $totalSubj = 6;
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.A.";
                        $print_class_sem = "I";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.A.";
                        $print_class_sem = "II";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.A.";
                        $print_class_name = "S.Y.B.A.";
                        $print_class_sem = "III";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.A.";
                        $print_class_sem = "IV";
                    }
                } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                    $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
                    $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                    $folder = "final/BCS";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                    $marks_table = "bsc_student_marks_" . $semester;
                    $mark_struct = "bsc_sub_" . $semester;
                    $folder = "final/BSC";
                    $totalSubj = 5;
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "I";
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "II";
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "III";
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "IV";
                    }
                } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                    $marks_table = "bcom_student_marks_" . $semester;
                    $mark_struct = "bcom_sub_" . $semester;
                    $folder = "final/BCOM";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.COM";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.COM";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.COM";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.COM";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                }
            }

            //print reval marksheet
            else if ($this->input->post('select_option') == 2) {
                if ($stream . $semester == "ba_student_detail_" . $semester) {
                    $marks_table = "ba_reval_marks_" . $semester;
                    $mark_struct = "ba_sub_" . $semester;
                    $folder = "reval/BA";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.A.";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.A.";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.A.";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.A.";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                    $marks_table = "bsc_cmp_sci_reval_marks_" . $semester;
                    $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                    $folder = "reval/BCS";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                    $marks_table = "bsc_reval_marks_" . $semester;
                    $mark_struct = "bsc_sub_" . $semester;
                    $folder = "reval/BSC";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                    $marks_table = "bcom_reval_marks_" . $semester;
                    $mark_struct = "bcom_sub_" . $semester;
                    $folder = "reval/BCOM";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.COM";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.COM";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.COM";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.COM";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                }
            }
            //supplementary marksheet
            else if ($this->input->post('select_option') == 3) {
                if ($stream . $semester == "ba_student_detail_" . $semester) {
                    $marks_table = "ba_supple_marks_" . $semester;
                    $mark_struct = "ba_sub_" . $semester;
                    $folder = "supplementary/BA";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.A. Supplementary";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.A. Supplementary";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.A. Supplementary";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.A. Supplementary";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
                    $marks_table = "bsc_cmp_sci_supple_marks_" . $semester;
                    $mark_struct = "bsc_cmp_sci_sub_" . $semester;
                    $folder = "supplementary/BCS";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc Supplementary";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Supplementary";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Supplementary";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Supplementary";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
                    $marks_table = "bsc_supple_marks_" . $semester;
                    $mark_struct = "bsc_sub_" . $semester;
                    $folder = "supplementary/BSC";
                    $paramSet = 1;
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.Sc Supplementary";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.Sc Supplementary";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.Sc Supplementary";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.Sc Supplementary";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
                    $marks_table = "bcom_supple_marks_" . $semester;
                    $mark_struct = "bcom_sub_" . $semester;
                    $folder = "supplementary/BCOM";
                    if ($semester == $sem1) {
                        $print_class_name = "F.Y.B.COM Supplementary";
                        $print_class_sem = "I";
                        $totalSubj = 8;
                    } else if ($semester == $sem2) {
                        $print_class_name = "F.Y.B.COM Supplementary";
                        $print_class_sem = "II";
                        $totalSubj = 8;
                    } else if ($semester == $sem3) {
                        $print_class_name = "S.Y.B.COM Supplementary";
                        $print_class_sem = "III";
                        $totalSubj = 7;
                    } else if ($semester == $sem4) {
                        $print_class_name = "S.Y.B.COM Supplementary";
                        $print_class_sem = "IV";
                        $totalSubj = 7;
                    }
                }
            }

            $temp_result = 0;
            $stream_tbl_name = $marks_table;
            //echo $stream_tbl_name;die();
            //get all pr number w.r.t to selected stream and semester
            $this->load->model('dataentry');
            //$pr=$this->dataentry->getSemRelPr($stream.$semester);

            if ($typeOfGeneration == '') {
                $pr = $this->dataentry->getSemRelPr_new($stream . $semester);
            } else if ($typeOfGeneration == 'now_eligible') {
                $pr = $this->dataentry->getSemRelPr_now_eligible($stream . $semester);
            }

            $mpdf = new mPDF('', '', 0, '', 0, 0, 0, 10, 9, 9, 'L');

            foreach ($pr as $row) {
                //check How many subject he/she passthrough
                if ($this->input->post('select_option') == 3) {
                    $no_of_sub_pass = $this->dataentry->getCount2($row->pr_number, $stream_tbl_name, $row->seat_number);
                } else {
                    $no_of_sub_pass = $this->dataentry->getCount($row->pr_number, $stream_tbl_name);
                }

                // added in above checks.
                // if ($sem1 == $semester) {
                //     $totalSubj = 8;
                // } else if ($sem2 == $semester) {
                //     $totalSubj = 8;
                // } else if ($sem3 == $semester) {
                //     $totalSubj = 7;
                // } else if ($sem4 == $semester) {
                //     $totalSubj = 7;
                // }

                //check pass in all subject
                $print_remark = "";
                if ($totalSubj == $no_of_sub_pass) {
                    $flag_seted = 1;
                    $print_remark = "Passes";
                } else {
                    $flag_seted = 0;
                    $print_remark = "Fail";
                }

                //increase execution time
                set_time_limit(0);
                $finalcal = 0;
                $totalCourseCredits = 0;
                $subjectCredits = 0;

                if ($row->gender == 'F') {
                    $studen_name = "/ " . $row->name;
                } else {
                    $studen_name = $row->name;
                }

                $register_number = $row->pr_number;
                $nss_ncc = $row->ncc_nss_grace_alloc;
                $sports_grace = $row->sports_grace_alloc;
                $seatno = $row->seat_number;
                /**Dynamic Data*/
                $marksheet_data = $this->dataentry->get_marksheet_data();
                foreach ($marksheet_data as $md) {
                    $date = $md->exam_held_in;
                    $entered_by = $md->entered_by;
                    $date_of_declaration = implode('/', array_reverse(explode('-', $md->date_of_declaration)));
                    $date_of_issue = implode('/', array_reverse(explode('-', $md->date_of_issue)));
                }
                /******************PDF**********************/
                //$mpdf = new mPDF('','',0,'',0,0,5,10,9,9,'L');
                $mpdf->WriteHTML('<br/><br/><div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:1400px; margin-left:50%;">Dempo Charities Trusts</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:0px; margin-top:2px;">Dhempe College of Arts and Science</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px; margin-left:50%;">Miramar,Panaji,Goa.</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:2px; margin-left:50%;">Re-Accredited At \'A\' Grade by NAAC</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-family:"Times New Roman", Times, serif; font-size:8px; margin-top:3px; margin-left:50%;">ISO 9001 : 2008 Certified</div>');
                $mpdf->WriteHTML('<div style="text-align:center;font-weight:bold; font-size:15px; margin-top:3px;">(Affiliated to Goa University)</div>');

                $mpdf->WriteHTML('<div style="left:70px;width:720px;height:780px;border:1px solid #000;position:absolute;"></div>');
                $mpdf->WriteHTML('<div style="margin-top:-10px;">');
                $html= '<div style="margin-left:45px;"><p align="right" style="padding:45px;">P.R. No.<u> ' . $register_number . ' </u></p></div>';
                $mpdf->SetColumns(2, 'J');
                $mpdf->WriteHTML($html, 2);
                $mpdf->SetColumns(1, 'J');

                $mpdf->WriteHTML('<h1 align="center" style="margin-top:-10px; font-family:\"Times New Roman\", Times, serif; align:center; margin-left:50%;">GRADE CERTIFICATE</h1>');

                $mpdf->WriteHTML('<div style="left:85px;width:40mm;height:40mm;border:1px solid #000;position:absolute;"></div>');
                $studentDetailsTable = '<table align="left" style="margin-left:40%; margin-top: 10px;">';
                $studentDetailsTableData = '<td>Degree</td>';
                $studentDetailsTableData = $studentDetailsTableData . '<td style="padding-left:10px;">:'.$print_class_name.'</td>';
                $studentDetailsTable = $studentDetailsTable . '<tr>'.$studentDetailsTableData.'</tr>';

                $studentDetailsTableData = '<td>Semester</td>';
                $studentDetailsTableData = $studentDetailsTableData . '<td style="padding-left:10px;">:'.$print_class_sem.'</td>';
                $studentDetailsTable = $studentDetailsTable . '<tr>'.$studentDetailsTableData.'</tr>';

                $studentDetailsTableData = '<td>Month & Year Of Examination</td>';
                $studentDetailsTableData = $studentDetailsTableData . '<td style="padding-left:10px;">:'.$date.'</td>';
                $studentDetailsTable = $studentDetailsTable . '<tr>'.$studentDetailsTableData.'</tr>';

                $studentDetailsTableData = '<td>Name Of Candidate</td>';
                $studentDetailsTableData = $studentDetailsTableData . '<td style="padding-left:10px;">:'.$row->name .'</td>';
                $studentDetailsTable = $studentDetailsTable . '<tr>'.$studentDetailsTableData.'</tr>';

                $studentDetailsTableData = '<td>Seat No.</td>';
                $studentDetailsTableData = $studentDetailsTableData . '<td style="padding-left:10px;">:'.$seatno.'</td>';
                $studentDetailsTable = $studentDetailsTable . '<tr>'.$studentDetailsTableData.'</tr>';
                $studentDetailsTable = $studentDetailsTable . '</table>';
                $mpdf->WriteHTML($studentDetailsTable);



                ///// printing table start

                $marksTable = '<table border="1" style="border-collapse:collapse;margin-left:10%; margin-top:8%; text-align:center;width:94%; ">';
                $marksTableHeaderRow = '<tr>';
                $marksTableHeaderRow .= '<td>Sl. No.</td>';
                $marksTableHeaderRow .= '<td>Course Code</td>';
                $marksTableHeaderRow .= '<td>Subject - Paper</td>';
                $marksTableHeaderRow .= '<td>Max Marks</td>';
                $marksTableHeaderRow .= '<td>Min Marks</td>';
                $marksTableHeaderRow .= '<td>Marks Obtained</td>';
                $marksTableHeaderRow .= '<td>Grade Points</td>';
                $marksTableHeaderRow .= '<td>Letter Grade</td>';
                $marksTableHeaderRow .= '<td>Course Credits</td>';
                $marksTableHeaderRow .= '</tr>';
                $marksTableRowsArray = array();

                // $marksTableRow = '<tr>';
                // $marksTableRow .= '<td>Sl. No.</td>';
                // $marksTableRow .= '<td>Course Code</td>';
                // $marksTableRow .= '<td>Subject - Paper</td>';
                // $marksTableRow .= '<td>Max Marks</td>';
                // $marksTableRow .= '<td>Min Marks</td>';
                // $marksTableRow .= '<td>Marks Obtained</td>';
                // $marksTableRow .= '<td>Grade Points</td>';
                // $marksTableRow .= '<td>Letter Grade</td>';
                // $marksTableRow .= '</tr>';
                // array_push($marksTableRowsArray, $marksTableRow);

                $pr_marks = $this->dataentry->getPrRelMarks($row->pr_number, $marks_table);
                if ($this->input->post('select_option') == 3) {
                    $pr_marks = $this->dataentry->getPrRelMarksSupplementary($row->pr_number, $marks_table);
                }
                $totalGraceMarksUsed = 0;
                $j = 0;
                foreach ($pr_marks as $row2) {
                    $pr_marks_structure = $this->dataentry->getMarkStruct($mark_struct, $row2->sub_id);
                    if ($this->input->post('select_option') == 1) {

                        if (($row2->pass_status == 'P') && ($flag_seted == 0)) {
                            $resultStatus = "Fail";
                        } else if (($row2->pass_status == 'F') && ($flag_seted == 0)) {
                            $resultStatus = "Fail";
                        } else {
                            $resultStatus = "Passes";
                        }
                    } else {
                        if (($row2->pass_status == 'P') && ($flag_seted == 0)) {
                            $resultStatus = "Fail";
                        } else if (($row2->pass_status == 'F') && ($flag_seted == 0)) {
                            $resultStatus = "Fail";
                        } else {
                            $resultStatus = "Passes";
                        }
                    }

                    foreach ($pr_marks_structure as $row4) {
                        if ($row2->isa_abs == "") {$isa = $row2->internal;} else { $isa = "0";}
                        if ($row2->see_abs == "") {$see = $row2->theory;} else { $see = "0";}
                        if ($row2->pract_abs == "") {$pract = $row2->practicle;} else { $pract = "0";}
                        $pracsMaxMarks = 0;
                        $pracsMinMarks = 0;
                        $pracsObtainedMarks = 0;
                        $pracsSymbol = '';
                        if ($paramSet == 0) {
                            if ($row4->practical_marks != -1) {
                                $pracsMaxMarks = $row4->practical_marks;
                                $pracsMinMarks = $row4->min_practical;
                                $pracsObtainedMarks = $pract;
                            }
                        }
                        if (($paramSet == 1) && ($row2->practicle != -1) && $row4->practical_marks != -1) {
                            if ($row2->pract_abs == "") {$pract = $row2->practicle;} else { $pract = "ABS";}
                            $pracsMaxMarks = $row4->practical_marks;
                            $pracsMinMarks = $row4->min_practical;
                            $pracsObtainedMarks = $pract;
                            $pracsSymbol = $row2->gen_the_pract_sym;
                            $finalcal += $row2->practicle;
                        }

                        $symbolEntitle = $row2->activity_symbol;
                        $trim1 = trim($symbolEntitle, '#');
                        $trim2 = trim($symbolEntitle, '+');
                        $result1 += intval($trim2);
                        $grace1 = "";
                        if ($sports_grace > 0) {
                            $grace1 = "+" . $sports_grace . "#";
                            $temp_result = $sports_grace;
                        } else if ($nss_ncc > 0) {
                            $grace1 = "+" . $nss_ncc . "#";
                            $temp_result = $nss_ncc;
                        } else{
                            $grace1 = "";
                            $temp_result = 0;
                        }
                        $symbolAdd = $row2->gen_symbol;
                        $trim1 = trim($symbolAdd, '$');
                        $trim2 = trim($symbolAdd, '+');
                        $result += intval($trim2);
                        if ($result == 0) {
                            $grace = "";
                        } else {
                            $grace = "+" . $result . "$";
                        }
                        $finalcal += $row2->internal + $row2->theory;



                        if (($isa == "ABS") && ($see == "ABS")) {
                            $maxMarks = $row4->internal_marks+$row4->semester_marks+$pracsMaxMarks;
                            $minMarks = ($row4->internal_marks+$row4->semester_marks+$pracsMaxMarks) * 40 / 100;
                            $obtainedMarks = 'ABS';
                        } else{
                            $display_theory_grace = "";
                            if ($row2->gen_the_pract_sym == ""){
                                $display_theory_grace = $row2->activity_symbol . ' ' . $row2->gen_symbol;
                            } else{
                                if ((strpos($row2->gen_the_pract_sym, '#') == true)) {
                                    $show_cal = "";
                                    $amt_recd = (preg_replace("/[^0-9]/", "", $row2->activity_symbol) - preg_replace("/[^0-9]/", "", $row2->gen_the_pract_sym));
                                    if ($amt_recd > 0) {
                                        $show_cal = ' + ' . $amt_recd . '#';
                                    }
                                    $display_theory_grace = $show_cal . $row2->gen_symbol;
                                }
                                if ((strpos($row2->gen_the_pract_sym, '$') == true)) {
                                    $show_cal = "";
                                    $amt_recd = (preg_replace("/[^0-9]/", "", $row2->gen_symbol) - preg_replace("/[^0-9]/", "", $row2->gen_the_pract_sym));
                                    if ($amt_recd > 0) {
                                        $show_cal = ' + ' . $amt_recd . '$';
                                    }
                                    $display_theory_grace = $row2->activity_symbol . $show_cal;

                                }
                            }
                        }
                        $sub_total = $row2->internal + $row2->theory + $pracsObtainedMarks;
                        $maxMarks = $row4->internal_marks+$row4->semester_marks+$pracsMaxMarks;
                        $minMarks = ($row4->internal_marks+$row4->semester_marks+$pracsMaxMarks) * 40 / 100;
                        $obtainedMarks = $sub_total . ' ' . $display_theory_grace . $pracsSymbol;

                        $obtainedMarksToCalculateGradePoints = $sub_total + preg_replace("/[^0-9]/", "", $display_theory_grace);
                        $totalGraceMarksUsed += preg_replace("/[^0-9]/", "", $display_theory_grace);
                        // Calculations for Grade points, Letter Grade and Course Credits start
                        $gradePoints = 0;
                        $percentage = 0;
                        $letterGrade = "AB";
                        $courseCredits = ($maxMarks == 150 )? 6 : 4;
                        if(!is_nan($obtainedMarks)){
                            $percentage = ($obtainedMarksToCalculateGradePoints / $maxMarks) * 100;
                            if($percentage <= 100 && $percentage >= 85){
                                $gradePoints = 10;
                                $letterGrade = "O";
                            } else if($percentage < 85 && $percentage >= 75){
                                $gradePoints = 9;
                                $letterGrade = "A+";
                            } else if($percentage < 75 && $percentage >= 65){
                                $gradePoints = 8;
                                $letterGrade = "A";
                            } else if($percentage < 65 && $percentage >= 55){
                                $gradePoints = 7;
                                $letterGrade = "B+";
                            } else if($percentage < 55 && $percentage >= 50){
                                $gradePoints = 6;
                                $letterGrade = "B";
                            } else if($percentage < 50 && $percentage >= 45){
                                $gradePoints = 5;
                                $letterGrade = "C";
                            } else if($percentage < 45 && $percentage >= 40){
                                $gradePoints = 4;
                                $letterGrade = "P";
                            } else if($percentage < 40 && $percentage >= 0){
                                $gradePoints = 0;
                                $letterGrade = "F";
                            }
                        }
                        $totalCourseCredits = $totalCourseCredits + $courseCredits;
                        $subjectCredits = $subjectCredits + $gradePoints * $courseCredits;
                        // calculations for grad points, letter grade and course credits end

                        $marksTableRow = '<tr>';
                        $marksTableRow .= '<td>'.($j + 1).'</td>';//sl.no.
                        $marksTableRow .= '<td>'.($row4->subject_type).'</td>';//course code
                        $marksTableRow .= '<td>'.($row4->sub_name).'</td>';//sebject-paper
                        $marksTableRow .= '<td>'.$maxMarks.'</td>';//max marks
                        $marksTableRow .= '<td>'.$minMarks.'</td>';//min marks
                        $marksTableRow .= '<td>'.$obtainedMarks.'</td>';//marks obtained
                        $marksTableRow .= '<td>'.$gradePoints.'</td>';//grade points
                        $marksTableRow .= '<td>'.$letterGrade.'</td>';//letter grade
                        $marksTableRow .= '<td>'.$courseCredits.'</td>';//course Credits
                        $marksTableRow .= '</tr>';
                        array_push($marksTableRowsArray, $marksTableRow);
                    }
                    $j++;
                }
                // sgpa gradding and semester letter grade calculation start
                $sgpa =  $subjectCredits / $totalCourseCredits;
                $semesterLettergrade = "F";
                if($sgpa == 10){
                    $semesterLettergrade = "O";
                } else if($sgpa < 10.0  && $sgpa >= 9.0){
                    $semesterLettergrade = "A+";
                } else if($sgpa < 9.0  && $sgpa >= 8.0){
                    $semesterLettergrade = "A";
                } else if($sgpa < 8.0  && $sgpa >= 7.0){
                    $semesterLettergrade = "B+";
                } else if($sgpa < 7.0  && $sgpa >= 6.0){
                    $semesterLettergrade = "B";
                } else if($sgpa < 6.0  && $sgpa >= 5.0){
                    $semesterLettergrade = "C";
                } else if($sgpa < 5.0  && $sgpa >= 4.0){
                    $semesterLettergrade = "P";
                } else if($sgpa < 4.0){
                    $semesterLettergrade = "F";
                }

                // sgpa gradding and semester letter grade calculation end

                unset($result1);
                unset($result);

                $grandTotal = ($totalGraceMarksUsed == 0)?$finalcal:$finalcal.' +'.$temp_result.'#';
                $marksTableRow = '<tr>';
                $marksTableRow .= '<td>'.($j + 1).'</td>';//sl.no.
                $marksTableRow .= '<td></td>';//course code
                $marksTableRow .= '<td>Grand Total</td>';//sebject-paper
                $marksTableRow .= '<td>'.$row4->max_agg_marks.'</td>';//max marks
                $marksTableRow .= '<td>'.(($row4->max_agg_marks * 40) / 100).'</td>';//min marks
                $marksTableRow .= '<td>'.$grandTotal.'</td>';//marks obtained
                $marksTableRow .= '<td></td>';//grade points
                $marksTableRow .= '<td></td>';//letter grade
                $marksTableRow .= '<td>'.$totalCourseCredits.'</td>';//course Credits
                $marksTableRow .= '</tr>';
                array_push($marksTableRowsArray, $marksTableRow);



                $marksTableRow = '<tr>';
                $marksTableRow .= '<td colspan="3">Unused Entitlement Marks</td>';//sl.no.
                $marksTableRow .= '<td>'.($temp_result - $totalGraceMarksUsed).'</td>';//max marks
                $marksTableRow .= '<td></td>';//min marks
                $marksTableRow .= '<td></td>';//marks obtained
                $marksTableRow .= '<td></td>';//grade points
                $marksTableRow .= '<td></td>';//letter grade
                $marksTableRow .= '<td></td>';//course Credits
                $marksTableRow .= '</tr>';
                array_push($marksTableRowsArray, $marksTableRow);


                $marksTable .= $marksTableHeaderRow;
                foreach ($marksTableRowsArray as $marksTableRowsArrayEachRow) {
                    $marksTable .= $marksTableRowsArrayEachRow;
                }
                $marksTable .=  '</table>';
                $mpdf->WriteHTML($marksTable);
                ///// printing table end




                //// printing dummy table for SGPA,  CGPA, SLG, CLG, NOA

                $otherMarksDetails = '<table align="center" style="margin-top:2%;margin-left:15%;width:70%;">';
                $otherMarksDetails .= '<tr>';
                $otherMarksDetails .= '<td>';
                $otherMarksDetails .= 'SGPA : '.round($sgpa, 2);
                $otherMarksDetails .= '</td>';
                $otherMarksDetails .= '<td>';
                $otherMarksDetails .= 'Semester Letter Grade : '.$semesterLettergrade;
                $otherMarksDetails .= '</td>';
                $otherMarksDetails .= '<td>';
                $otherMarksDetails .= 'No. of attempts : 1';
                $otherMarksDetails .= '</td>';
                $otherMarksDetails .= '</tr>';
                $otherMarksDetails .= '<tr>';
                $otherMarksDetails .= '<td>';
                $otherMarksDetails .= 'Remark : '.$resultStatus;//removed CGPA
                $otherMarksDetails .= '</td>';
                $otherMarksDetails .= '<td>';
                $otherMarksDetails .= '';//cummulative letter grade removed
                $otherMarksDetails .= '</td>';
                $otherMarksDetails .= '</tr>';
                $otherMarksDetails .= '</table>';
                $mpdf->WriteHTML($otherMarksDetails);
                //// printing dummy table for SGPA,  CGPA, SLG, CLG, NOA END


                // printing dummy table for EB, CB, DOD, DOI
                $marksheetDeclarationDetials = '<table style="margin-left:45px;width:70%;margin-top:2%;margin-left:15%">';
                $marksheetDeclarationDetials .= '<tr>';
                $marksheetDeclarationDetials .= '<td>';
                $marksheetDeclarationDetials .= 'Entered By : '.$entered_by;
                $marksheetDeclarationDetials .= '</td>';
                $marksheetDeclarationDetials .= '<td>';
                $marksheetDeclarationDetials .= 'Checked By : ';
                $marksheetDeclarationDetials .= '</td>';
                $marksheetDeclarationDetials .= '</tr>';
                $marksheetDeclarationDetials .= '<tr>';
                $marksheetDeclarationDetials .= '<td>';
                $marksheetDeclarationDetials .= 'Date Of Declaration : '.$date_of_declaration;
                $marksheetDeclarationDetials .= '</td>';
                $marksheetDeclarationDetials .= '<td>';
                $marksheetDeclarationDetials .= 'Date Of Issue : '. $date_of_issue;
                $marksheetDeclarationDetials .= '</td>';
                $marksheetDeclarationDetials .= '</tr>';
                $marksheetDeclarationDetials .= '</table>';
                $mpdf->WriteHTML($marksheetDeclarationDetials);

                // printing dummy table for EB, CB, DOD, DOI END

                // printing medium of instruction
                $mediumOfInstruction = '<div style="margin-left:40px; margin-top:5%; margin-left:20%; font-size:15px;font-weight:bold;">MEDIUM OF INSTRUCTION :- ENGLISH </div>';
                $mpdf->WriteHTML($mediumOfInstruction);
                // printing principal
                $principal = '<div align="right" style="margin-top:3%;margin-right:10%; font-size:15px;">PRINCIPAL</div>';
                $mpdf->WriteHTML($principal);


                // $mpdf->WriteHTML('
				// 			<div style="margin-left:120px; margin-top:2px; font-size:12px;">NO. OF ATTEMPT :- 1 </div>
				// 			');
                // $mpdf->WriteHTML(
                //     '<div style="margin-left:120px; margin-top:2px; font-size:12px;">ENTERED BY :  ' . $entered_by . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHECKED BY : ____________
				// 			'
                // );

                // $mpdf->WriteHTML('
				// 			<div style="margin-left:120px; margin-top:2px; font-size:12px;">Date of declaration :- ' . $date_of_declaration . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Issue :- ' . $date_of_issue . '</div>
				// 			');

                // $mpdf->WriteHTML('
				// 			<div style="margin-left:120px; margin-top:2px; font-size:12px;">MEDIUM OF INSTRUCTION :- ENGLISH ' . nbs(80) . 'PRINCIPAL</div>
				// 			');

                $mpdf->WriteHTML('
							<div style="margin-left:75px; font-size:7px; ">ISA=Intra Semester Assessment.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEE= Semester End Examination.</div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:75px; margin-top:1px; font-size:7px;">#= NSS/NCC/Sports/Cultural/Activities. 	$= Grace	ABS=Absent; 	E=Exemption;	N=No Exemption </div>
							');

                $mpdf->WriteHTML('
							<div style="margin-left:75px; margin-top:1px; font-size:7px;">P=Pass 	F; Fails +: - Marks carried	NA-Not Applicable</div>
                            ');


                $mpdf->Addpage();
                //$mpdf->Output('marksheet/'.$folder.'/'.$semester.'/'.$studen_name.'.pdf','F');
                //    unset($mpdf);
            }
            //exit;
            $mpdf->Output();
            $marksheetflag['flag'] = 1;
            $this->load->view('printmarksheet', $marksheetflag);

        } //else bracket

    }

    //cross check dataentry view to select stream and semester
    public function check_dataentry()
    {
        $this->load->view('select_stream_dataentry_checklist');
    }

    //generate checklist using PDF
    public function dataentry_cross_check()
    {
        require_once "Mpdf/Mpdf.php";
        require_once 'numtowords1.php';

        $mpdf = new mPDF('', 'A4', 0, '', 0, 0, 5, 10, 9, 9, 'P');

        $stream = $this->input->post('stream');
        $semester = $this->input->post('semester');

        $dummy_toatal = 0; //24 april 2013
        $isa_total = 0;
        $see_total = 0;

        $this->load->model('home1');

        //choose table to select marks
        if ($stream . $semester == "ba_student_detail_" . $semester) {
            $marks_table = "ba_student_marks_" . $semester;
            $mark_struct = "ba_sub_" . $semester;
            $folder = "final/BA";
            $stream_name = "B.A.";
        } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
            $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
            $mark_struct = "bsc_cmp_sci_sub_" . $semester;
            $folder = "final/BCS";
            $stream_name = "B.C.S.";
        } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
            $marks_table = "bsc_student_marks_" . $semester;
            $mark_struct = "bsc_sub_" . $semester;
            $folder = "final/BSC";
            $stream_name = "B.S.C.";
        } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
            $marks_table = "bcom_student_marks_" . $semester;
            $mark_struct = "bcom_sub_" . $semester;
            $folder = "final/BCOM";
            $stream_name = "B.COM.";
        }

        $stream_tbl_name = $marks_table;

        //get all pr number w.r.t to selected stream and semester
        $this->load->model('dataentry');
        $pr = $this->dataentry->getSemRelPr($stream . $semester);

        foreach ($pr as $row6) {
            $name[] = $row6->name;
            $seatnumber[] = $row6->seat_number;
        }

        $subject_id = $this->dataentry->getSubID($mark_struct);

        $j = 0;

        foreach ($subject_id as $row) {

            //increase execution time
            set_time_limit(0);

            //get all marks related to pr number and do calculation
            $pr_marks = $this->dataentry->getPrRelMarks1($row->sub_id, $marks_table);
            $j = 0;

            $mpdf->WriteHTML('<h3 style="text-align:center;"> Stream : ' . $stream_name . ' Semester : ' . str_replace('sem_', '', $semester) . '</h3>');

            $mpdf->WriteHTML(
                '<h3 style="text-align:center;">Subject : ' . $row->sub_name . '' . nbs(15) . 'I.S.A. :- ' . $row->internal_marks . '' . nbs(15) . 'S.E.E. :- ' . $row->semester_marks . '</h3>');

            if ($row->practical_marks != -1) {
                $mpdf->WriteHTML('<h3 style="text-align:center;">Practical :- ' . $row->practical_marks . '</h3>');
            }

            $mpdf->WriteHTML('
					<table border="1" align="center" style="border-collapse:collapse; margin-left:0px;">
						<tr>
							<td>Pr Number</td>
							<td>Seat Number</td>
							<td>Name</td>
							<td>I.S.A.</td>
							<td>S.E.E</td>
				');
            if ($row->practical_marks != -1) {
                $mpdf->WriteHTML('<td>Practical</td>');
            }
            $mpdf->WriteHTML('
							<td>Total</td>
						</tr>
				');
            foreach ($pr_marks as $row2) {
                //get mark_structure of a particular paper
                $pr_marks_structure = $this->dataentry->getMarkStruct($mark_struct, $row2->sub_id);
                foreach ($pr_marks_structure as $row4) {

                    $mpdf->WriteHTML('
							<tr>
								<td>' . $row2->pr_number . '</td>
								<td>' . $seatnumber[$j] . '</td>
								<td>' . $name[$j] . '</td>
								<td>' . $row2->internal . '</td>
								<td>' . $row2->theory . '</td>'
                    );
                    $p = 0;
                    if ($row->practical_marks != -1) {
                        $mpdf->WriteHTML('<td>' . $row2->practicle . '</td>');
                        $p = $row2->practicle;
                    }
                    $dummy_toatal += $row2->internal + $row2->theory + $p; //
                    $isa_total += $row2->internal;
                    $see_total += $row2->theory;
                    $mpdf->WriteHTML('<td>' . ($row2->internal + $row2->theory + $p) . '</td></tr>');
                }
                $j++;
            }
            $mpdf->WriteHTML('<tr><td></td><td></td><td>Total</td><td>' . $isa_total . '</td><td>' . $see_total . '</td><td>' . $dummy_toatal . '</td></tr>');
            $mpdf->WriteHTML('</table>');
            $mpdf->AddPage();
        }
        $mpdf->Output();
    }

    /* Modified on 24 april 2013 start */

    public function bulk_dataentry()
    {
        $this->load->view('bulkData');
    }

    public function bulk_dataentry2()
    {
        $this->load->view('bulkData2');
    }

    public function bulk_dataDisplay()
    {
        require_once "Mpdf/Mpdf.php";
        //require_once('numtowords1.php');

        $mpdf = new mPDF('', 'A3', 0, '', 0, 0, 15, 10, 9, 9, 'L');
        //$mpdf = new mPDF('','A4',0,'',0,0,5,10,9,9,'P');
        $stream = $this->input->post('stream');
        $semester = $this->input->post('semester');

        //choose table to select marks
        if ($stream . $semester == "ba_student_detail_" . $semester) {
            $marks_table = "ba_student_marks_" . $semester;
            $mark_struct = "ba_sub_" . $semester;
            $folder = "final/BA";
            $stream_name = "B.A.";
        } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
            $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
            $mark_struct = "bsc_cmp_sci_sub_" . $semester;
            $folder = "final/BCS";
            $stream_name = "B.C.S.";
        } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
            $marks_table = "bsc_student_marks_" . $semester;
            $mark_struct = "bsc_sub_" . $semester;
            $folder = "final/BSC";
            $stream_name = "B.S.C.";
        } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
            $marks_table = "bcom_student_marks_" . $semester;
            $mark_struct = "bcom_sub_" . $semester;
            $folder = "final/BCOM";
            $stream_name = "B.COM.";
        }
        $stream_tbl_name = $marks_table;

        //echo $marks_table;die();

        /*Get all subject of a particular streams */
        $this->load->model('Bulk_Data');

        //$subject_list=array();
        //$subject_list = $this->Bulk_Data->getAllSubjectName($mark_struct);
        $mpdf->WriteHTML('<div style="text-align:center">Stream : ' . $stream_name . ' ' . str_replace('_', '', $semester) . '</div>');
        $mpdf->WriteHTML('<br/><div style="text-align:center">I.S.A Marks </div><br/>');
        $mpdf->WriteHTML('<table border=1 style="border-collapse:collapse;">');
        /*$mpdf->WriteHTML('<tr><td>Pr Number</td><td>Seat Number</td><td>Name</td>');
        for($s=0;$s<8;$s++){
        $mpdf->WriteHTML('<td>I.S.A</td><td>S.E.E</td>');
        }*/
        $mpdf->WriteHTML('</tr>');

        /* get all student of particular streams */
        $studentList = array();
        $studentList = $this->Bulk_Data->getAllStudent($stream . $semester);
        //$sub_cnt = $this->Bulk_Data->getAllSubjectNum($stream.$semester);
        $this->load->model('home1');
        $sub_cnt = $this->home1->getNumberSubjects($stream, $semester);
        //echo $this->db->last_query();
        //exit;
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td>PR Number</td>');
        $mpdf->WriteHTML('<td>Seat Number</td>');
        $mpdf->WriteHTML('<td>Name</td>');
        for ($s = 1; $s <= $sub_cnt; $s++) {
            $mpdf->WriteHTML('<td>Sub' . $s . '</td>');
            $mpdf->WriteHTML('<td>Mks' . $s . '</td>');
        }
        $mpdf->WriteHTML('<td>PR Number</td>');
        $mpdf->WriteHTML('<td>Seat Number</td>');
        $mpdf->WriteHTML('</tr>');

        for ($s = 0; $s < count($studentList); $s++) {
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["pr_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["seat_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["name"] . '</td>');

            /* First Subject Name */
            $subj_one = $this->Bulk_Data->getSubjectName($studentList[$s]["subj1"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_one . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj1"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                    $isa = 'A';
                } else {
                    $isa = $studentMarks[$p]["ISA"];
                }
            }
            $mpdf->WriteHTML('<td>' . $isa . '</td>');

            $subj_two = $this->Bulk_Data->getSubjectName($studentList[$s]["subj2"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_two . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj2"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                    $isa = 'A';
                } else {
                    $isa = $studentMarks[$p]["ISA"];
                }

            }
            $mpdf->WriteHTML('<td>' . $isa . '</td>');

            $subj_three = $this->Bulk_Data->getSubjectName($studentList[$s]["subj3"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_three . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj3"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                    $isa = 'A';
                } else {
                    $isa = $studentMarks[$p]["ISA"];
                }
            }
            $mpdf->WriteHTML('<td>' . $isa . '</td>');

            $subj_four = $this->Bulk_Data->getSubjectName($studentList[$s]["subj4"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_four . '</td>');
            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj4"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                    $isa = 'A';
                } else {
                    $isa = $studentMarks[$p]["ISA"];
                }
            }
            $mpdf->WriteHTML('<td>' . $isa . '</td>');
            if ($sub_cnt >= 5) {
                $subj_five = $this->Bulk_Data->getSubjectName($studentList[$s]["subj5"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_five . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj5"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                        $isa = 'A';
                    } else {
                        $isa = $studentMarks[$p]["ISA"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $isa . '</td>');
            }
            if ($sub_cnt >= 6) {
                $subj_six = $this->Bulk_Data->getSubjectName($studentList[$s]["subj6"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_six . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj6"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                        $isa = 'A';
                    } else {
                        $isa = $studentMarks[$p]["ISA"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $isa . '</td>');
            }
            if ($sub_cnt >= 7) {
                $subj_seven = $this->Bulk_Data->getSubjectName($studentList[$s]["subj7"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_seven . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj7"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                        $isa = 'A';
                    } else {
                        $isa = $studentMarks[$p]["ISA"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $isa . '</td>');
            }
            if ($sub_cnt == 8) {
                $subj_eight = $this->Bulk_Data->getSubjectName($studentList[$s]["subj8"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_eight . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj8"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["ISA_ABS"] == 'A') {
                        $isa = 'A';
                    } else {
                        $isa = $studentMarks[$p]["ISA"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $isa . '</td>');
            }
            $mpdf->WriteHTML('<td>' . $studentList[$s]["pr_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["seat_number"] . '</td>');
            $mpdf->WriteHTML('</tr>');
        }

        $mpdf->WriteHTML('</table>');
        $mpdf->Output();
    }

    public function bulk_dataDisplay2()
    {
        require_once "Mpdf/Mpdf.php";
        //require_once('numtowords1.php');

        $mpdf = new mPDF('', 'A3', 0, '', 0, 0, 15, 10, 9, 9, 'L');
        //$mpdf = new mPDF('','A4',0,'',0,0,5,10,9,9,'P');
        $stream = $this->input->post('stream');
        $semester = $this->input->post('semester');

        //choose table to select marks
        if ($stream . $semester == "ba_student_detail_" . $semester) {
            $marks_table = "ba_student_marks_" . $semester;
            $mark_struct = "ba_sub_" . $semester;
            $folder = "final/BA";
            $stream_name = "B.A.";
        } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
            $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
            $mark_struct = "bsc_cmp_sci_sub_" . $semester;
            $folder = "final/BCS";
            $stream_name = "B.C.S.";
        } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
            $marks_table = "bsc_student_marks_" . $semester;
            $mark_struct = "bsc_sub_" . $semester;
            $folder = "final/BSC";
            $stream_name = "B.S.C.";
        } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
            $marks_table = "bcom_student_marks_" . $semester;
            $mark_struct = "bcom_sub_" . $semester;
            $folder = "final/BCOM";
            $stream_name = "B.COM.";
        }
        $stream_tbl_name = $marks_table;

        /*Get all subject of a particular streams */
        $this->load->model('Bulk_Data');
        //$subject_list=array();
        //$subject_list = $this->Bulk_Data->getAllSubjectName($mark_struct);
        $mpdf->WriteHTML('<div style="text-align:center">Stream : ' . $stream_name . ' ' . str_replace('_', '', $semester) . '</div>');
        $mpdf->WriteHTML('<br/><div style="text-align:center">S.E.E Marks </div><br/>');
        $mpdf->WriteHTML('<table border=1 style="border-collapse:collapse;">');
        /*$mpdf->WriteHTML('<tr><td>Pr Number</td><td>Seat Number</td><td>Name</td>');
        for($s=0;$s<8;$s++){
        $mpdf->WriteHTML('<td>I.S.A</td><td>S.E.E</td>');
        }*/
        $mpdf->WriteHTML('</tr>');

        /* get all student of particular streams */
        $studentList = array();
        $studentList = $this->Bulk_Data->getAllStudent($stream . $semester);
        //$sub_cnt = $this->Bulk_Data->getAllSubjectNum($stream.$semester);
        $this->load->model('home1');
        $sub_cnt = $this->home1->getNumberSubjects($stream, $semester);
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td>PR Number</td>');
        $mpdf->WriteHTML('<td>Seat Number</td>');
        $mpdf->WriteHTML('<td>Name</td>');
        for ($s = 1; $s <= $sub_cnt; $s++) {
            $mpdf->WriteHTML('<td>Sub' . $s . '</td>');
            $mpdf->WriteHTML('<td>Mks' . $s . '</td>');
        }
        $mpdf->WriteHTML('<td>PR Number</td>');
        $mpdf->WriteHTML('<td>Seat Number</td>');
        $mpdf->WriteHTML('</tr>');

        for ($s = 0; $s < count($studentList); $s++) {
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["pr_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["seat_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["name"] . '</td>');

            /* First Subject Name */
            $subj_one = $this->Bulk_Data->getSubjectName($studentList[$s]["subj1"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_one . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj1"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                    $see = 'A';
                } else {
                    $see = $studentMarks[$p]["SEE"];
                }
            }
            $mpdf->WriteHTML('<td>' . $see . '</td>');

            $subj_two = $this->Bulk_Data->getSubjectName($studentList[$s]["subj2"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_two . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj2"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                    $see = 'A';
                } else {
                    $see = $studentMarks[$p]["SEE"];
                }
            }
            $mpdf->WriteHTML('<td>' . $see . '</td>');

            $subj_three = $this->Bulk_Data->getSubjectName($studentList[$s]["subj3"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_three . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj3"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                    $see = 'A';
                } else {
                    $see = $studentMarks[$p]["SEE"];
                }
            }
            $mpdf->WriteHTML('<td>' . $see . '</td>');

            $subj_four = $this->Bulk_Data->getSubjectName($studentList[$s]["subj4"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_four . '</td>');
            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj4"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                    $see = 'A';
                } else {
                    $see = $studentMarks[$p]["SEE"];
                }
            }
            $mpdf->WriteHTML('<td>' . $see . '</td>');
            if ($sub_cnt >= 5) {
                $subj_five = $this->Bulk_Data->getSubjectName($studentList[$s]["subj5"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_five . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj5"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                        $see = 'A';
                    } else {
                        $see = $studentMarks[$p]["SEE"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $see . '</td>');
            }
            if ($sub_cnt >= 6) {
                $subj_six = $this->Bulk_Data->getSubjectName($studentList[$s]["subj6"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_six . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj6"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                        $see = 'A';
                    } else {
                        $see = $studentMarks[$p]["SEE"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $see . '</td>');
            }
            if ($sub_cnt >= 7) {
                $subj_seven = $this->Bulk_Data->getSubjectName($studentList[$s]["subj7"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_seven . '</td>');

                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj7"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                        $see = 'A';
                    } else {
                        $see = $studentMarks[$p]["SEE"];
                    }
                }

                $mpdf->WriteHTML('<td>' . $see . '</td>');
            }
            if ($sub_cnt == 8) {
                $subj_eight = $this->Bulk_Data->getSubjectName($studentList[$s]["subj8"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_eight . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj8"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["SEE_ABS"] == 'A') {
                        $see = 'A';
                    } else {
                        $see = $studentMarks[$p]["SEE"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $see . '</td>');
            }
            $mpdf->WriteHTML('<td>' . $studentList[$s]["pr_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["seat_number"] . '</td>');
            $mpdf->WriteHTML('</tr>');
        }

        $mpdf->WriteHTML('</table>');
        $mpdf->Output();
    }
    public function supple_semester_checklist($typeOfGeneration = '')
    {
        require_once "Mpdf/Mpdf.php";

        $mpdf = new mPDF('', 'A3', 0, '', 0, 0, 5, 10, 9, 9, 'L');

        $stream = $this->input->post('stream');
        $semester = $this->input->post('semester');

        $this->load->model('home1');

        if ($semester == "sem_1") {
            $tempSem = 1;
        }if ($semester == "sem_2") {
            $tempSem = 2;
        }if ($semester == "sem_3") {
            $tempSem = 3;
        }if ($semester == "sem_4") {
            $tempSem = 4;
        }

        //choose table to select marks
        if ($stream . $semester == "ba_student_detail_" . $semester) {
            $marks_table = "ba_supple_marks_" . $semester;
            $mark_struct = "ba_sub_" . $semester;
            $folder = "BA";
        } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
            $marks_table = "bsc_cmp_sci_supple_marks_" . $semester;
            $mark_struct = "bsc_cmp_sci_sub_" . $semester;
            $folder = "BCS";
            $paramset = 1;
        } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
            $marks_table = "bsc_supple_marks_" . $semester;
            $mark_struct = "bsc_sub_" . $semester;
            $folder = "BSC";
            $paramset = 1;
        } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
            $marks_table = "bcom_student_marks_" . $semester;
            $mark_struct = "bcom_sub_" . $semester;
            $folder = "BCOM";
        }

        $stream_tbl_name = $marks_table;

        //get all pr number w.r.t to selected stream and semester
        $this->load->model('dataentry');

        if ($typeOfGeneration == '') {
            $pr = $this->dataentry->getSemRelPr2($stream . $semester);
        } else if ($typeOfGeneration == 'now_eligible') {
            $pr = $this->dataentry->getSemRelPr2_now_eligible($stream . $semester);
        }

        $image_path = base_url() . "/images/college_logo.jpg";

        $mpdf->WriteHTML('<div style="text-align: center;">Dempo Charities Trusts</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:22px;">Dhempe College of Arts and Science</div>');
        $mpdf->WriteHTML('<div style="text-align: center;">Miramar, Panaji,Goa.</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:18px;">Re-Accredited At \'A\' Grade by NAAC</div>');

        $mpdf->WriteHTML('<div style=" padding-left:250px;"><img src="' . $image_path . '" width="80" height="80" /></div>');
        $mpdf->WriteHTML('<div style="text-align: center; padding-top:-60px;">ISO 9001 : 2008 Certified</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:18px;">(Affiliated to Goa University)</div>');
        $mpdf->WriteHTML('<div style="text-align: center; font-size:23px; padding-top:10px;">Provisional MarkSheet</div>');

        $mpdf->WriteHTML('<div style="text-align: center; font-size:18px; padding-bottom:20px;">Stream : ' . $folder . ' Semester : ' . $tempSem . '</div>');

        foreach ($pr as $row) {
            //increase execution time
            set_time_limit(0);

            $studen_name = $row->name;
            $register_number = $row->pr_number;
            $nss_ncc = $row->ncc_nss_grace_alloc;
            $sports_grace = $row->sports_grace_alloc;
            $result = 0;
            $result1 = 0;

            /* $mpdf->WriteHTML('<div style="margin-left:20px;">P.R. Number : '.$register_number.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seat Number : '.$row->seat_number.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name : '.$studen_name.' '.$row->special_priority_tag.'</div>'); */
            $mpdf->WriteHTML('<div style="margin-left:20px;">P.R. Number : ' . $register_number . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seat Number : ' . $row->seat_number . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name : ' . $studen_name . ' </div>');
            //get total marks of all subject
            $final_total = $this->dataentry->getTotal($row->pr_number, $marks_table);
            $temp_final_total = 0;
            //pass or fail display
            $status = $this->dataentry->getStatus2($row->pr_number, $marks_table);

            //get all marks related to pr number and do calculation
            $pr_marks = $this->dataentry->getPrRelMarks2($row->pr_number, $marks_table);

            if (count($pr_marks) == $status) {
                $final_result = 'Pass';
            } else {
                $final_result = 'Fail';
            }

            $j = 0;

            $mpdf->WriteHTML('<table align="center" border="1" style="border-collapse:collapse; margin-left:20px; margin-right:20px;">');
            $mpdf->WriteHTML('<tr>');
            foreach ($pr_marks as $row2) {
                //increase execution time
                set_time_limit(0);

                //get mark_structure of a particular paper
                $pr_marks_structure = $this->dataentry->getMarkStruct($mark_struct, $row2->sub_id);

                //entitlement grace
                $symbolEntitle = $row2->activity_symbol;
                $trim1 = trim($symbolEntitle, '#');
                $trim2 = trim($symbolEntitle, '+');
                $result1 += intval($trim2);

                $grace1 = "";
                if ($sports_grace > 0) {
                    $grace1 = "+" . $sports_grace . "#";
                } else if ($nss_ncc > 0) {
                    $grace1 = "+" . $nss_ncc . "#";
                }

                if ($result1 == 0) {
                } else {
                    $temp_result = $result1;
                }

                //general grace
                $symbolAdd = $row2->gen_symbol;
                $trim1 = trim($symbolAdd, '$');
                $trim2 = trim($symbolAdd, '+');
                $result += intval($trim2);

                if ($result == 0) {
                    $grace = "";
                } else {
                    $grace = "+" . $result . "$";
                    $temp_result2 = $result;
                }

                foreach ($pr_marks_structure as $row4) {
                    if ($row2->practicle == -1) {
                        $mpdf->WriteHTML('<td colspan="3">' . $row4->sub_name_display . '</td>');
                    } else {
                        $mpdf->WriteHTML('<td colspan="4">' . $row4->sub_name_display . '</td>');
                    }
                }
            }
            $mpdf->WriteHTML('<td>Total</td>');
            $mpdf->WriteHTML('<td>Result</td>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<tr>');
            foreach ($pr_marks as $row2) {
                $mpdf->WriteHTML('
						<td>ISA</td>
						<td>SEE</td>
					');
                $mpdf->WriteHTML('<td>Total</td');
                if ($row2->practicle != -1) {
                    $mpdf->WriteHTML('<td>Practical</td');
                }
            }
            $mpdf->WriteHTML('</tr>');

            $mpdf->WriteHTML('<tr>');
            foreach ($pr_marks as $row2) {
                set_time_limit(0);
                //modified code 17 april 2013
                if ($row2->isa_abs == 'A') {
                    $_13internal_marks = $row2->isa_abs;
                }
                if ($row2->see_abs == 'A') {
                    $_13semester_marks = $row2->see_abs;
                }
                if ($row2->pract_abs == 'A') {
                    $_13practicle_marks = $row2->pract_abs;
                }

                //modified code 17 april 2013
                /*modifed by simone 22-11-2013
                if($row2->isa_abs == 'A'){
                $mpdf->WriteHTML('
                <td>A</td>
                <td>'.$row2->theory.'</td>
                ');
                //$total_temp =' A';
                $total_temp=$row2->internal+$row2->theory;
                $temp_final_total +=$row2->internal+$row2->theory;
                }*/

                if ($row2->isa_abs == 'A' && $row2->see_abs == 'A') {
                    $mpdf->WriteHTML('
							<td>A</td>
							<td>A</td>
						');
                    $total_temp = ' A';
                } else if ($row2->isa_abs == 'A' && $row2->see_abs != 'A') {
                    $mpdf->WriteHTML('
							<td>A</td>
							<td>' . $row2->theory . '</td>');
                    $total_temp = $row2->theory;
                } else if ($row2->isa_abs != 'A' && $row2->see_abs == 'A') {
                    $mpdf->WriteHTML('

							<td>' . $row2->internal . '</td>
							<td>A</td>
							');
                    $total_temp = $row2->internal;
                } else {
                    $mpdf->WriteHTML('
							<td>' . $row2->internal . '</td>
							<td>' . $row2->theory . '</td>
						');
                    $total_temp = $row2->internal + $row2->theory;
                    $temp_final_total += $row2->internal + $row2->theory;
                }

                //$mpdf->WriteHTML('<td>'.$total_temp.' '.$row2->activity_symbol.' '. $row2->gen_symbol.'</td');
                //new added by simone to calculate display of total grace mks theory
                $display_theory_grace = "";
                if ($row2->gen_the_pract_sym == "") // no grace for pracs
                {
                    $display_theory_grace = $row2->activity_symbol . ' ' . $row2->gen_symbol;
                } else {
                    $signToShowTheory = '';
                    if ((strpos($row2->gen_the_pract_sym, '#') == true)) // pracs has #
                    {
                        $show_cal = "";
                        $amt_recd = (preg_replace("/[^0-9]/", "", $row2->activity_symbol) - preg_replace("/[^0-9]/", "", $row2->gen_the_pract_sym));
                        if ($amt_recd > 0) {
                            $show_cal = ' + ' . $amt_recd . '#';
                        }

                        $display_theory_grace = $show_cal . $row2->gen_symbol;

                    }
                    if ((strpos($row2->gen_the_pract_sym, '$') == true)) // pracs has $
                    {
                        $show_cal = "";
                        $amt_recd = (preg_replace("/[^0-9]/", "", $row2->gen_symbol) - preg_replace("/[^0-9]/", "", $row2->gen_the_pract_sym));
                        if ($amt_recd > 0) {
                            $show_cal = ' + ' . $amt_recd . '$';
                        }

                        $display_theory_grace = $row2->activity_symbol . $show_cal;

                    }

                }
                //echo  '<br />'.$display_theory_grace;
                $sub_total = $row2->internal + $row2->theory;
                $mpdf->WriteHTML('<td>' . $sub_total . ' ' . $display_theory_grace . ' </td>');

                if ($row2->pract_abs == 'A') {
                    if ($row2->practicle != -1) {
                        $mpdf->WriteHTML('<td>A</td');
                        $total_temp = 'A';
                        $temp_final_total += 0;
                    }
                } else {
                    if ($row2->practicle != -1) {
                        //pdf->WriteHTML('<td>'.$row2->practicle.'</td');
                        $mpdf->WriteHTML('<td>' . $row2->practicle . $row2->gen_the_pract_sym . '  ' . $ptag . '</td>');
                        $total_temp = $row2->internal + $row2->theory + $row2->practicle;
                        $temp_final_total += $row2->practicle;
                    }
                }
                //$temp_final_total +=$row2->internal+$row2->theory+$row2->practicle;

            }
            $mpdf->WriteHTML('<td>' . $temp_final_total . ' ' . $grace1 . ' ' . $grace . '</td>');
            $mpdf->WriteHTML('<td>' . $final_result . '</td>');
            $mpdf->WriteHTML('</tr>');

            $mpdf->WriteHTML('</table><br/>');
            if (($mpdf->y) > 350) {
                $mpdf->AddPage();
            }
        }
        //exit;
        $mpdf->Output();
    }

    public function bulk_dataentry4()
    {
        $this->load->view('bulkData4');
    }

    public function bulk_dataDisplay4()
    {
        require_once "Mpdf/Mpdf.php";
        //require_once('numtowords1.php');

        $mpdf = new mPDF('', 'A3', 0, '', 0, 0, 15, 10, 9, 9, 'L');
        //$mpdf = new mPDF('','A4',0,'',0,0,5,10,9,9,'P');
        $stream = $this->input->post('stream');
        $semester = $this->input->post('semester');

        //choose table to select marks
        if ($stream . $semester == "ba_student_detail_" . $semester) {
            $marks_table = "ba_student_marks_" . $semester;
            $mark_struct = "ba_sub_" . $semester;
            $folder = "final/BA";
            $stream_name = "B.A.";
        } else if ($stream . $semester == "bsc_cmp_sci_student_detail_" . $semester) {
            $marks_table = "bsc_cmp_sci_student_marks_" . $semester;
            $mark_struct = "bsc_cmp_sci_sub_" . $semester;
            $folder = "final/BCS";
            $stream_name = "B.C.S.";
        } else if ($stream . $semester == "bsc_student_detail_" . $semester) {
            $marks_table = "bsc_student_marks_" . $semester;
            $mark_struct = "bsc_sub_" . $semester;
            $folder = "final/BSC";
            $stream_name = "B.S.C.";
        } else if ($stream . $semester == "bcom_student_detail_" . $semester) {
            $marks_table = "bcom_student_marks_" . $semester;
            $mark_struct = "bcom_sub_" . $semester;
            $folder = "final/BCOM";
            $stream_name = "B.COM.";
        }
        $stream_tbl_name = $marks_table;

        /*Get all subject of a particular streams */
        $this->load->model('Bulk_Data');
        //$subject_list=array();
        //$subject_list = $this->Bulk_Data->getAllSubjectName($mark_struct);
        $mpdf->WriteHTML('<div style="text-align:center">Stream : ' . $stream_name . ' ' . str_replace('_', '', $semester) . '</div>');
        $mpdf->WriteHTML('<br/><div style="text-align:center">Practical  Marks </div><br/>');
        $mpdf->WriteHTML('<table border=1 style="border-collapse:collapse;">');
        /*$mpdf->WriteHTML('<tr><td>Pr Number</td><td>Seat Number</td><td>Name</td>');
        for($s=0;$s<8;$s++){
        $mpdf->WriteHTML('<td>I.S.A</td><td>Practicle</td>');
        }*/
        $mpdf->WriteHTML('</tr>');

        /* get all student of particular streams */
        $studentList = array();
        $studentList = $this->Bulk_Data->getAllStudent($stream . $semester);
        //$sub_cnt = $this->Bulk_Data->getAllSubjectNum($stream.$semester);
        $this->load->model('home1');
        $sub_cnt = $this->home1->getNumberSubjects($stream, $semester);
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td>PR Number</td>');
        $mpdf->WriteHTML('<td>Seat Number</td>');
        $mpdf->WriteHTML('<td>Name</td>');
        for ($s = 1; $s <= $sub_cnt; $s++) {
            $mpdf->WriteHTML('<td>Sub' . $s . '</td>');
            $mpdf->WriteHTML('<td>Mks' . $s . '</td>');
        }
        $mpdf->WriteHTML('<td>PR Number</td>');
        $mpdf->WriteHTML('<td>Seat Number</td>');
        $mpdf->WriteHTML('</tr>');

        for ($s = 0; $s < count($studentList); $s++) {
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["pr_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["seat_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["name"] . '</td>');

            /* First Subject Name */
            $subj_one = $this->Bulk_Data->getSubjectName($studentList[$s]["subj1"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_one . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj1"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["PR_ABS"] == 'A') {
                    $practicle = 'A';
                } else if ($studentMarks[$p]["practicle"] == -1) {
                    $practicle = "NA";
                } else {
                    $practicle = $studentMarks[$p]["practicle"];
                }
            }
            $mpdf->WriteHTML('<td>' . $practicle . '</td>');

            $subj_two = $this->Bulk_Data->getSubjectName($studentList[$s]["subj2"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_two . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj2"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["PR_ABS"] == 'A') {
                    $practicle = 'A';
                } else if ($studentMarks[$p]["practicle"] == -1) {
                    $practicle = "NA";
                } else {
                    $practicle = $studentMarks[$p]["practicle"];
                }
            }
            $mpdf->WriteHTML('<td>' . $practicle . '</td>');

            $subj_three = $this->Bulk_Data->getSubjectName($studentList[$s]["subj3"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_three . '</td>');

            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj3"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["PR_ABS"] == 'A') {
                    $practicle = 'A';
                } else if ($studentMarks[$p]["practicle"] == -1) {
                    $practicle = "NA";
                } else {
                    $practicle = $studentMarks[$p]["practicle"];
                }
            }
            $mpdf->WriteHTML('<td>' . $practicle . '</td>');

            $subj_four = $this->Bulk_Data->getSubjectName($studentList[$s]["subj4"], $mark_struct);
            $mpdf->WriteHTML('<td>' . $subj_four . '</td>');
            /*Get ISA Marks*/
            $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj4"], $marks_table);
            for ($p = 0; $p < 1; $p++) {
                if ($studentMarks[$p]["PR_ABS"] == 'A') {
                    $practicle = 'A';
                } else if ($studentMarks[$p]["practicle"] == -1) {
                    $practicle = "NA";
                } else {
                    $practicle = $studentMarks[$p]["practicle"];
                }
            }
            $mpdf->WriteHTML('<td>' . $practicle . '</td>');
            if ($sub_cnt >= 5) {
                $subj_five = $this->Bulk_Data->getSubjectName($studentList[$s]["subj5"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_five . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj5"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["PR_ABS"] == 'A') {
                        $practicle = 'A';
                    } else if ($studentMarks[$p]["practicle"] == -1) {
                        $practicle = "NA";
                    } else {
                        $practicle = $studentMarks[$p]["practicle"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $practicle . '</td>');
            }
            if ($sub_cnt >= 6) {
                $subj_six = $this->Bulk_Data->getSubjectName($studentList[$s]["subj6"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_six . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj6"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["PR_ABS"] == 'A') {
                        $practicle = 'A';
                    } else if ($studentMarks[$p]["practicle"] == -1) {
                        $practicle = "NA";
                    } else {
                        $practicle = $studentMarks[$p]["practicle"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $practicle . '</td>');
            }
            if ($sub_cnt >= 7) {
                $subj_seven = $this->Bulk_Data->getSubjectName($studentList[$s]["subj7"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_seven . '</td>');

                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj7"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["PR_ABS"] == 'A') {
                        $practicle = 'A';
                    } else if ($studentMarks[$p]["practicle"] == -1) {
                        $practicle = "NA";
                    } else {
                        $practicle = $studentMarks[$p]["practicle"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $practicle . '</td>');
            }
            if ($sub_cnt == 8) {
                $subj_eight = $this->Bulk_Data->getSubjectName($studentList[$s]["subj8"], $mark_struct);
                $mpdf->WriteHTML('<td>' . $subj_eight . '</td>');
                /*Get ISA Marks*/
                $studentMarks = $this->Bulk_Data->getISAMarks($studentList[$s]["pr_number"], $studentList[$s]["subj8"], $marks_table);
                for ($p = 0; $p < 1; $p++) {
                    if ($studentMarks[$p]["PR_ABS"] == 'A') {
                        $practicle = 'A';
                    } else if ($studentMarks[$p]["practicle"] == -1) {
                        $practicle = "NA";
                    } else {
                        $practicle = $studentMarks[$p]["practicle"];
                    }
                }
                $mpdf->WriteHTML('<td>' . $practicle . '</td>');
            }
            $mpdf->WriteHTML('<td>' . $studentList[$s]["pr_number"] . '</td>');
            $mpdf->WriteHTML('<td>' . $studentList[$s]["seat_number"] . '</td>');
            $mpdf->WriteHTML('</tr>');
        }

        $mpdf->WriteHTML('</table>');
        $mpdf->Output();
    }
    /*modified code on 29 april 2013 ends*/
    public function edit_static_data()
    {
        $this->load->model('dataentry');
        $marksheet_data['data'] = $this->dataentry->get_marksheet_data();
        $marksheet_data['success'] = '';
        $this->load->view('edit_static_data', $marksheet_data);
    }
    public function update_static_data()
    {
        $exam_held_in = $this->input->post('exam_held_in');
        $entered_by = $this->input->post('entered_by');
        $date_of_declaration = $this->input->post('date_of_declaration');
        $date_of_issue = $this->input->post('date_of_issue');
        $this->load->model('dataentry');
        $this->dataentry->update_marksheet_data($exam_held_in, $entered_by, $date_of_declaration, $date_of_issue);
        $marksheet_data['data'] = $this->dataentry->get_marksheet_data();
        $marksheet_data['success'] = 'Updated Successfully';
        $this->load->view('edit_static_data', $marksheet_data);
    }
}
