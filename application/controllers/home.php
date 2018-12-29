<?php
	class home extends CI_Controller{

		//Dashboard page
		function index(){
			$this->load->view('home');
		}

		//function display stream and semester
		function addStudent(){
			$this->load->view('add_student');
		}

		//view edit student function
		function editStudent(){
			$this->load->view('edit_student');
		}


		// Modified on 18 April newly added function
		function studentData(){
			$this->load->view('studentData');
		}

		//modified on 18 April newly added function
		function displayStudentData(){
			$stream   = $this->input->post('stream');
			$semester = $this->input->post('semester');
			$Load_Student = "";

			if($stream == "ba_student_detail_"){
				$Load_Student = $stream.$semester;
				$Load_sub     = "ba_sub_".$semester;
			}
			if($stream == "bsc_student_detail_"){
				$Load_Student = $stream.$semester;
				$Load_sub     = "bsc_sub_".$semester;
			}
			if($stream == "bsc_cmp_sci_student_detail_"){
				$Load_Student = $stream.$semester;
				$Load_sub     = " bsc_cmp_sci_sub_".$semester;
			}
			if($stream == "bcom_student_detail_"){
				$Load_Student = $stream.$semester;
				$Load_sub     = "bcom_sub_".$semester;
			}

			/* retrive student data*/
			$this->load->model('home1');
			$student_details = $this->home1->getStudentData($Load_Student);
			$sub_num = $this->home1->getNumberSubjects($stream,$semester);

			$display_data=array(array());

			$i = 0;
			foreach($student_details as $row){
				$display_data ["student_details"][$i]["name"]        = $row->name;
				$display_data ["student_details"][$i]["pr_number"]   = $row->pr_number;
				$display_data ["student_details"][$i]["seat_number"] = $row->seat_number;

				/*get the name of subject*/

				$display_data ["student_details"][$i]["subject1"]    = $this->home1->getSubjname($row->subj_1,$Load_sub);
				$display_data ["student_details"][$i]["subject2"]    = $this->home1->getSubjname($row->subj_2,$Load_sub);
				$display_data ["student_details"][$i]["subject3"]    = $this->home1->getSubjname($row->subj_3,$Load_sub);
				$display_data ["student_details"][$i]["subject4"]    = $this->home1->getSubjname($row->subj_4,$Load_sub);
				if($sub_num >=5)
				$display_data ["student_details"][$i]["subject5"]    = $this->home1->getSubjname($row->subj_5,$Load_sub);
				if($sub_num >=6)
				$display_data ["student_details"][$i]["subject6"]    = $this->home1->getSubjname($row->subj_6,$Load_sub);
				if($sub_num >=7)
				$display_data ["student_details"][$i]["subject7"]    = $this->home1->getSubjname($row->subj_7,$Load_sub);
				if($sub_num >=8)
				$display_data ["student_details"][$i]["subject8"]    = $this->home1->getSubjname($row->subj_8,$Load_sub);
				$i++;
			}
			$display_data ['sub_num']=$sub_num;
			$this->load->view('studentDataDisplay',$display_data);
		}


		//get permanent register number for editing student
		function editStudentDetail(){
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');

			$tbl_name=$stream.$semester;

			$this->load->model('home1');
			$prnumber['data']=$this->home1->getPrNumber($stream,$semester);
			$prnumber['tbl_name']=$tbl_name;
			$prnumber['stream1']=$stream;
			$prnumber['sem']=$semester;

			$this->load->view('select_pr_for_edit',$prnumber);
		}

		//edit student detail for a selected register number_format
		function editSelectedPr(){
			$pr_number=$this->input->get_post('prnumber');
			$stream=$this->input->get_post('stream1');
			$semester=$this->input->get_post('semester');
			$type=$this->input->get_post('type');

			$this->load->model('home1');
			$studentdetailData['studentdetail']=$this->home1->getDetailOfPr($stream.$semester,$pr_number,$type);
			$studentdetailData['stream']=$stream;
			$studentdetailData['semester']=$semester;

			/*if($stream == "ba_student_detail_"){
				$subj_view="edit_ba_sub_".$semester;
			}
			if($stream == "bsc_student_detail_"){
				$subj_view="edit_bsc_sub_".$semester;
			}
			if($stream == "bsc_cmp_sci_student_detail_"){
				$subj_view="edit_bsc_cmp_sci_sub_".$semester;
			}
			if($stream == "bcom_student_detail_"){
				$subj_view="edit_bcom_sub_".$semester;
			}*/

			/*
			*  Start Modified code on 17 April 2013
			*/

			/*
			* End Modified code
			*/
			$subj_view="edit_student_generic";
			$this->load->view($subj_view,$studentdetailData);
		}

		//display subject according to stream and semester
		/*function addStudentSubjectData(){
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			$this->load->view($stream.$semester);
		}*/
		function addStudentSubjectData(){
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			$data = array(
			        'stream' => $stream,
			        'semester' => $semester,
					);

			$this->load->view('save_students_default', $data);
		}

		//student detail is saved in a particular table 2nd year
		function saveStudentDetail2(){
			$table_name=$this->input->post('tbl_name');
			$subj2=$this->input->post('subject2');
			$temp=$subj2;

			$subj21=substr($subj2,0,3);
			$subj22=substr($subj2,4,6);

			$entitleGrace=0;
			$sports_reward=0;


			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;
			$cat="";
			$rew="";

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$this->input->post('subject1'),
				"subj_2"=>$subj21,
				"subj_3"=>$subj22,
				"subj_4"=>$this->input->post('subject4'),
				"subj_5"=>$this->input->post('subject5'),
				"subj_6"=>$this->input->post('subject6'),
				"subj_7"=>$this->input->post('subject7'),
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);

			//delete student if exist
			$this->load->model('home1');
			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);
			$this->load->view($this->input->post('view_name'),$flag);
		}



		//student detail is saved in a particular table 1st year
		function saveStudentDetail(){
			$table_name=$this->input->post('tbl_name');
			$subj3=$this->input->post('subject3');
			$temp=$subj3;
			//$subj33=str_replace(1,2,$temp);

			$subj31=substr($subj3,0,3);
			$subj32=substr($subj3,4,6);

			$entitleGrace=0;
			$sports_reward=0;

			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;
			$cat="";
			$rew="";

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}
			/*3 MORE fields added in DB by simone remaining grace fields*/
			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$this->input->post('subject1'),
				"subj_2"=>$this->input->post('subject2'),
				"subj_3"=>$subj31,
				"subj_4"=>$subj32,
				"subj_5"=>$this->input->post('subject4'),
				"subj_6"=>$this->input->post('subject6'),
				"subj_7"=>$this->input->post('subject7'),
				"subj_8"=>$this->input->post('subject8'),
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);

			//delete student if exist
			$this->load->model('home1');
			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);

			//$this->load->view('add_student',$flag);
			$this->load->view($this->input->post('view_name'),$flag);
		}

		//student detail is saved in a particular table 1st year
		function saveBcomStudentDetail(){
			$table_name=$this->input->post('tbl_name');
			$entitleGrace=0;
			$sports_reward=0;
			$sports_grace=0;
			$cat="";
			$rew="";
			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$this->input->post('subject1'),
				"subj_2"=>$this->input->post('subject2'),
				"subj_3"=>$this->input->post('subject3'),
				"subj_4"=>$this->input->post('subject4'),
				"subj_5"=>$this->input->post('subject5'),
				"subj_6"=>$this->input->post('subject6'),
				"subj_7"=>$this->input->post('subject7'),
				"subj_8"=>$this->input->post('subject8'),
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()',
			);

			//delete student if exist
			$this->load->model('home1');
			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);
			$this->load->view($this->input->post('view_name'),$flag);
		}




		//Enter Marks For a particular stream and student
		function selectStudentToEnterMarksheet(){
			$this->load->view('select_student_to_enter_marks');
		}

		//select pr number for a particular stream and semester
		function selectRegisterNumber(){
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');
			$tbl_name=$stream.$semester;
			$this->load->model('home1');
			$prnumber['data']=$this->home1->getPrNumber($stream,$semester);
			$prnumber['tbl_name']=$tbl_name;
			$prnumber['stream1']=$stream;
			$prnumber['sem']=$semester;

			$this->load->view('select_pr_to_enter_marks',$prnumber);
		}

		//load marksheet according to register number and student
		function loadMarksheet(){
			$stream=$this->input->post('stream1');
			$semester=$this->input->post('semester');
			$counter=0;
			$table_name=$this->input->post('table_name');
			$pr_number=$this->input->post('prnumber');

			$this->load->model('home1');
			$subject_id=$this->home1->getSubjectDetail($table_name,$pr_number);

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

			if(($semester == "sem_1")||($semester == "sem_2")){
				$counter=8;
			}
			else if(($semester == "sem_3")||($semester == "sem_4")){
				$counter=7;
			}



			if($stream == "ba_student_detail_"){
				$table_new="ba_sub_".$semester;
				$table_marks="ba_student_marks_".$semester;
			}
			else if($stream == "bsc_cmp_sci_student_detail_"){
				$table_new="bsc_cmp_sci_sub_".$semester;
				$table_marks="bsc_cmp_sci_student_marks_".$semester;
			}
			else if($stream == "bsc_student_detail_"){
				$table_new=" bsc_sub_".$semester;
				$table_marks="bsc_student_marks_".$semester;
			}
			else if($stream == "bcom_student_detail_"){
				$table_new=" bcom_sub_".$semester;
				$table_marks="bcom_student_marks_".$semester;
			}


			for($i=0;$i<$counter;$i++){
				$subject_details[]=$this->home1->getSubject($table_new,$sub_id[$i]);
			}

			//get marks
			for($k=0;$k<count($sub_id);$k++){
					$marks[]=$this->home1->getStudentMarks($table_marks,$pr_number,$sub_id[$k]);
			}

			//get grace
			$grace=$this->home1->getRemainingGrace($stream.$semester,$pr_number);

			$temp['mark_structures']=$subject_details;
			$temp['student_name']=$name;
			$temp['register_number']=$pr_number;
			$temp['marks_tbl']=$table_marks;
			$temp['stud_marks']=$marks;
			$temp['grace_detail']=$grace;
			$temp['final_up_tbl']=$stream.$semester;

			$this->load->view('marksheet',$temp);
		}

		//data entry code starts here
		function dataentry(){
			$this->load->view('select_stream_sem_for_data_entry');
		}

		//getSubject
		//passing parameter to load intermediate view
		//function getSubject(){
		function getSubject($tbl_name_old=""){
			if($tbl_name_old=="")//come thru usual route 1st time
			{
			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');

			}
			else //come after entering marks
			{ //bsc_cmp_sci_student_marks_sem_2
			$table_arr=explode('student_marks_',$tbl_name_old);
			$stream=$table_arr[0].'sub_';
			$semester=$table_arr[1];
			}
			$tbl_name=$stream.$semester;
			if($stream == "ba_sub_"){
				$table_new="ba_student_detail_".$semester;
				$table_marks="ba_student_marks_".$semester;
			}
			else if($stream == "bsc_cmp_sci_sub_"){
				$table_new=" bsc_cmp_sci_student_detail_".$semester;
				$table_marks="bsc_cmp_sci_student_marks_".$semester;
			}
			else if($stream == "bsc_sub_"){
				$table_new="bsc_student_detail_".$semester;
				$table_marks="bsc_student_marks_".$semester;
			}
			else if($stream == "bcom_sub_"){
				$table_new="bcom_student_detail_".$semester;
				$table_marks="bcom_student_marks_".$semester;
			}

			$this->load->model('dataentry');
			$subject_name['sub_name']=$this->dataentry->getSubjectDetail($tbl_name);


			$subject_name['stream1']=$stream;
			$subject_name['sem']=$semester;

			$subject_name['table_name']=$tbl_name;
			$subject_name['tbl_connect']=$table_new;
			$subject_name['table_mark_name']=$table_marks;
			$this->load->view('subject_detail',$subject_name);
		}

		function getPr(){
			$tbl_connect=$this->input->post('connect');
			$subject=$this->input->post('subject_detail');
			$tbl_marks_name=$this->input->post('table_name');
			$tbl_marks_enter=$this->input->post('tbl_mark_connect');


			$this->load->model('dataentry');

			//get marks which is already enter in database
			$pr_number['stud_marks']=$this->dataentry->getstudentMarks($subject,$tbl_marks_enter);

			//check subject have practical or not
			$pr_number['mark_structure']=$this->dataentry->getSubjectmarks($subject,$tbl_marks_name);
			$pr_number['number']=$this->dataentry->getSubjrelPrNum($tbl_connect,$subject);
			$pr_number['sub_id']=$subject;
			$pr_number['tbl_marks_enter']=$tbl_marks_enter;

			$this->load->view('enter_subj_marks',$pr_number);
		}

		function finalCalculation(){
			$this->load->view('select_stream_sem_cal');
		}

		//edit B.A. student detail (Semester 1 and 2)
		function editSaveStudentDetail(){
			$table_name=$this->input->post('tbl_name');
			$subj3=$this->input->post('subject3');
			$temp=$subj3;
			$subj31=substr($subj3,0,3);
			$subj32=substr($subj3,4,6);

			$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}


			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"block"=>$this->input->get_post('block'),
				"name"=>$this->input->post('Name'),
				"seat_number"=>$this->input->post('Seat'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$nss_marks_alloc,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$nss_marks_alloc,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$this->input->post('subject1'),
				"subj_2"=>$this->input->post('subject2'),
				"subj_3"=>$subj31,
				"subj_4"=>$subj32,
				"subj_5"=>$this->input->post('subject4'),
				"subj_6"=>$this->input->post('subject6'),
				"subj_7"=>$this->input->post('subject7'),
				"subj_8"=>$this->input->post('subject8'),
				"supplementary"=>$this->input->post('type'),
			);

			$this->load->model('home1');
			// check if both primary keys same

			if($this->input->post('pr') == $this->input->post('pr_number') && $this->input->post('type_old')  ==  $this->input->post('type')){
				$this->home1->updateStudentDetailNew($table_name,$data,array('pr_number'=>$this->input->post('pr'),'supplementary'=>$this->input->post('type')));
			}
			else{
		     $this->home1->checkPRNew($this->input->post('pr_number'),$table_name,$data,$this->input->post('pr'),$this->input->post('type_old') ,  $this->input->post('type'));
			}

			$flag['flagset']=1;
			//$this->home1->updateStudentDetail($table_name,$data,$this->input->post('pr_number'));
			$this->load->view('edit_student',$flag);
		}

		//edit B.A. student detail (Semester 3 and 4)
		function editSaveStudentDetail2(){

			$table_name=$this->input->post('tbl_name');
			$subj2=$this->input->post('subject2');
			$temp=$subj2;
			$subj21=substr($subj2,0,3);
			$subj22=substr($subj2,4,6);

			$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"block"=>$this->input->post('block'),
				"seat_number"=>$this->input->post('Seat'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$nss_marks_alloc,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$nss_marks_alloc,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$this->input->post('subject1'),
				"subj_2"=>$subj21,
				"subj_3"=>$subj22,
				"subj_4"=>$this->input->post('subject4'),
				"subj_5"=>$this->input->post('subject5'),
				"subj_6"=>$this->input->post('subject6'),
				"subj_7"=>$this->input->post('subject7'),
				"supplementary"=>$this->input->post('type'),
			);

			$this->load->model('home1');
			// check if both primary keys same
			if($this->input->post('pr') == $this->input->post('pr_number') && $this->input->post('type_old')  ==  $this->input->post('type')){
				$this->home1->updateStudentDetailNew($table_name,$data,array('pr_number'=>$this->input->post('pr'),'supplementary'=>$this->input->post('type')));
			}
			else{
		     $this->home1->checkPRNew($this->input->post('pr_number'),$table_name,$data,$this->input->post('pr'),$this->input->post('type_old') ,  $this->input->post('type'));
			}

			$flag['flagset']=1;

			//$this->home1->updateStudentDetail($table_name,$data,$this->input->post('pr_number'));
			$this->load->view('edit_student',$flag);
		}

		function editsaveBcomStudentDetail(){
			$table_name=$this->input->post('tbl_name');

			$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"seat_number"=>$this->input->post('Seat'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$nss_marks_alloc,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$nss_marks_alloc,
				"sports_grace_remain"=>$sports_grace,
				"subj_2"=>$this->input->post('subject2'),
				"subj_3"=>$this->input->post('subject3'),
				"subj_4"=>$this->input->post('subject4'),
				"subj_5"=>$this->input->post('subject5'),
				"subj_6"=>$this->input->post('subject6'),
				"subj_7"=>$this->input->post('subject7'),
				"subj_8"=>$this->input->post('subject8'),
				"supplementary"=>$this->input->post('type'),
			);

			$this->load->model('home1');
			// check if both primary keys same
			if($this->input->post('pr') == $this->input->post('pr_number') && $this->input->post('type_old')  ==  $this->input->post('type')){
				$this->home1->updateStudentDetailNew($table_name,$data,array('pr_number'=>$this->input->post('pr'),'supplementary'=>$this->input->post('type')));
			}
			else{
		     $this->home1->checkPRNew($this->input->post('pr_number'),$table_name,$data,$this->input->post('pr'),$this->input->post('type_old') ,  $this->input->post('type'));
			}

			$flag['flagset']=1;

			//$this->home1->updateStudentDetail($table_name,$data,$this->input->post('pr_number'));
			$this->load->view('edit_student',$flag);
		}
		function saveStudent_generic(){
			$table_name=$this->input->post('tbl_name');

			$entitleGrace=0;
			$sports_reward=0;
			$cat="";
			$rew="";

			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}
	//Retrieve data from checkbox and assign to variables $sub1,$sub2 etc.

			$selected_subject=$this->input->post('selected_subject');
     		for($i=1,$j=0;$i<(count($selected_subject)+1);$i++,$j++)
     		{

     				${'sub' . $i} =$selected_subject[$j];
     		}

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);
/*
			"subj_1"=>$sub1,
				"subj_2"=>$sub2,
				"subj_3"=>$sub3,
				"subj_4"=>$sub4,
				"subj_5"=>$sub5,
				"subj_6"=>$sub6,
				"subj_7"=>"3A",
				"subj_8"=>"4A",

					$all_subjects=$this->input->post('all_subject');



     		for($i=1,$j=0;$i<(count($)+1);$i++,$j++)
     		{


     				${'sub' . $i} =$selected_subject[$j];
     		}*/

     		$all_subject=$this->input->post('all_subjects');
     		$each_subject=(explode("_",$all_subject));

     		$subject_detail_table = [];

     		$j=1;
     		foreach($each_subject as $type)
     		{
     				$subject_type=$this->input->post('selected_subject_'.$type.'');



     				for($i=0;$i<count($subject_type);$i++,$j++)
     				{
     					$data['subj_' . $j]=$subject_type[$i];


                $subject_detail_table[$subject_type[$i]] = $type;

     				}



     		}
     		$data['subj_details']=json_encode($subject_detail_table);

			//delete student if exist
			$this->load->model('home1');
			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);

			$stream=$this->input->post('stream');
			$semester=$this->input->post('semester');

			$flag = array(
			        'stream' => $stream,
			        'semester' => $semester,
			        'flagset'=>'1'

					);
			$view = $this->input->post('view_name');
		//	$this->load->view('$view',$flag,$stse);
			//$this->load->view($view, $stse,$flag);
			$this->load->view($this->input->post('view_name'),$flag);
		}

function editStudent_generic(){
			$table_name=$this->input->post('tbl_name');

			$entitleGrace=0;
			$sports_reward=0;
			$cat="";
			$rew="";
			$ncc_nss_cat = "";
			$ncc_nss_grace_alloc = 0;

			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$ncc_nss_category=$this->input->post('ncc_nss_cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
				$ncc_nss_cat = $ncc_nss_category;
				$this->load->model('home1');
				$ncc_nss_grace_alloc=$this->home1->getNccNssMarks($ncc_nss_category);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}
			
	//Retrieve data from checkbox and assign to variables $sub1,$sub2 etc.



			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"ncc_nss_category"=>$ncc_nss_cat,
				"ncc_nss_grace_alloc"=>$ncc_nss_grace_alloc,
				"ncc_nss_grace_remain"=>$ncc_nss_grace_alloc,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('Seat'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);
			//print_r($data);
/*
			"subj_1"=>$sub1,
				"subj_2"=>$sub2,
				"subj_3"=>$sub3,
				"subj_4"=>$sub4,
				"subj_5"=>$sub5,
				"subj_6"=>$sub6,
				"subj_7"=>"3A",
				"subj_8"=>"4A",

					$all_subjects=$this->input->post('all_subject');

     		for($i=1,$j=0;$i<(count($)+1);$i++,$j++)
     		{


     				${'sub' . $i} =$selected_subject[$j];
     		}*/

     		$all_subject=$this->input->post('all_subjects');
     		$each_subject=(explode("_",$all_subject));

     		$subject_detail_table = [];

     		$j=1;
     		foreach($each_subject as $type)
     		{
     				$subject_type=$this->input->post('selected_subject_'.$type.'');



     				for($i=0;$i<count($subject_type);$i++,$j++)
     				{
     					$data['subj_' . $j]=$subject_type[$i];


                $subject_detail_table[$subject_type[$i]] = $type;

     				}



     		}
     		$data['subj_details']=json_encode($subject_detail_table);

			//delete student if exist
		$this->load->model('home1');
			// check if both primary keys same
			if($this->input->post('pr') == $this->input->post('pr_number') && $this->input->post('type_old')  ==  $this->input->post('type')){
				$this->home1->updateStudentDetailNew($table_name,$data,array('pr_number'=>$this->input->post('pr'),'supplementary'=>$this->input->post('type')));
			}
			else{
		     $this->home1->checkPRNew($this->input->post('pr_number'),$table_name,$data,$this->input->post('pr'),$this->input->post('type_old') ,  $this->input->post('type'));
			}
			$flag['flagset']=1;
			//$this->load->model('home1');
			//$this->home1->updateStudentDetail($table_name,$data,$this->input->post('pr_number'));
			$this->load->view('edit_student',$flag);
		}

		function saveBscCmpStudentDetail(){
			$table_name=$this->input->post('tbl_name');

			$entitleGrace=0;
			$sports_reward=0;
			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;
			$cat="";
			$rew="";

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;
				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>"1A1",
				"subj_2"=>"2A1",
				"subj_3"=>"1A2",
				"subj_4"=>"2A2",
				"subj_5"=>"1A3",
				"subj_6"=>"2A3",
				"subj_7"=>"3A",
				"subj_8"=>"4A",
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);

			//delete student if exist
			$this->load->model('home1');

			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);

			$this->load->view($this->input->post('view_name'),$flag);
		}

		function saveBscCmpStudentDetail2(){
			$table_name=$this->input->post('tbl_name');

			$entitleGrace=0;
			$sports_reward=0;


			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;
			$cat="";
			$rew="";

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>"1A1",
				"subj_2"=>"2A1",
				"subj_3"=>"1A2",
				"subj_4"=>"2A2",
				"subj_5"=>"1A3",
				"subj_6"=>"2A3",
				"subj_7"=>$this->input->post('subject7'),
				"subj_8"=>"",
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);

			//delete student if exist
			$this->load->model('home1');
			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);
			$this->load->view($this->input->post('view_name'),$flag);
		}

		//edit bsc student detail semester 1 to 4
		function editBscCmpStudentdetail(){
			$table_name=$this->input->post('tbl_name');
			$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}
			$table_arr=explode('_student_detail_',$table_name);
			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"block"=>$this->input->post('block'),
				"seat_number"=>$this->input->post('Seat'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$nss_marks_alloc,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$nss_marks_alloc,
				"sports_grace_remain"=>$sports_grace,
				"supplementary"=>$this->input->post('type'),

			);
			if($table_arr[1]=='sem_1' ||$table_arr[1]=='sem_2')
			{
			$data["subj_1"]="1A1";
			$data["subj_2"]="2A1";
			$data["subj_3"]="1A2";
			$data["subj_4"]="2A2";
			$data["subj_5"]="1A3";
			$data["subj_6"]="2A3";
			$data["subj_7"]="3A";
			$data["subj_8"]="4A";
			}
			else{
			$data["subj_1"]="1A1";
			$data["subj_2"]="2A1";
			$data["subj_3"]="1A2";
			$data["subj_4"]="2A2";
			$data["subj_5"]="1A3";
			$data["subj_6"]="2A3";
			$data["subj_7"]=$this->input->post('subject7');

			}

			$this->load->model('home1');
			// check if both primary keys same
			if($this->input->post('pr') == $this->input->post('pr_number') && $this->input->post('type_old')  ==  $this->input->post('type')){
				$this->home1->updateStudentDetailNew($table_name,$data,array('pr_number'=>$this->input->post('pr'),'supplementary'=>$this->input->post('type')));
			}
			else{
		     $this->home1->checkPRNew($this->input->post('pr_number'),$table_name,$data,$this->input->post('pr'),$this->input->post('type_old') ,  $this->input->post('type'));
			}
			$flag['flagset']=1;
			//$this->load->model('home1');
			//$this->home1->updateStudentDetail($table_name,$data,$this->input->post('pr_number'));
			$this->load->view('edit_student',$flag);
		}

		function saveBscStudent(){
			$table_name=$this->input->post('tbl_name');

			$entitleGrace=0;
			$sports_reward=0;
			$cat="";
			$rew="";

			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}

			$selected_subject=$this->input->post('subject');
			if($selected_subject == "1A1/1A2/1A3"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";       $sub4="2A2";
				$sub5="1A3";       $sub6="2A3";
			}
			else if($selected_subject == "1A1/1A2/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A5";       $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A2/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A6";       $sub6="2A6";
			}
			else if($selected_subject == "1A1/1A4/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";       $sub4="2A4";
				$sub5="1A5";        $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A4/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A6";       $sub6="2A6";
			}
			/* code modified on 21 april 2013 */
			else if($selected_subject == "1A1/1A5/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A5";        $sub4="2A5";
				$sub5="1A7";       $sub6="2A7";
			}
			else if($selected_subject == "1A1/1A4/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A7";       $sub6="2A7";
			}
			/* code modified ends here */

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$sub1,
				"subj_2"=>$sub2,
				"subj_3"=>$sub3,
				"subj_4"=>$sub4,
				"subj_5"=>$sub5,
				"subj_6"=>$sub6,
				"subj_7"=>"3A",
				"subj_8"=>"4A",
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);

			//delete student if exist
			$this->load->model('home1');
			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);
			$this->load->view($this->input->post('view_name'),$flag);
		}

		function saveBscStudent2(){
			$table_name=$this->input->post('tbl_name');

			$entitleGrace=0;
			$sports_reward=0;
			$cat="";
			$rew="";

			//get maximum aggregate marks
			$maxAggMark=$this->input->post('MaxaggMark');

			$gen_grace=round($maxAggMark*2/100);

			$nss=$this->input->post('nss');
			$sports=$this->input->post('sports');
			$sports_cat=$this->input->post('cat');
			$sports_reward=$this->input->post('rewards');
			$sports_grace=0;

			if($nss == 1){
				$entitleGrace=round($maxAggMark*1/100);
			}
			if($sports == 1){
				$cat=$sports_cat;
				$rew=$sports_reward;

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($sports_cat,$sports_reward);

				foreach($temp as $row){
					$sports_grace=$row->$sports_reward;
				}
			}


			$selected_subject=$this->input->post('subject');
			if($selected_subject == "1A1/1A2/1A3"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";       $sub4="2A2";
				$sub5="1A3";       $sub6="2A3";
			}
			else if($selected_subject == "1A1/1A2/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A5";       $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A2/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A6";       $sub6="2A6";
			}
			else if($selected_subject == "1A1/1A4/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";       $sub4="2A4";
				$sub5="1A5";        $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A4/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A6";       $sub6="2A6";
			}
			/* code modified on 21 april 2013 */
			else if($selected_subject == "1A1/1A5/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A5";        $sub4="2A5";
				$sub5="1A7";       $sub6="2A7";
			}
			else if($selected_subject == "1A1/1A4/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A7";       $sub6="2A7";
			}
			/* code modified ends here */

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"seat_number"=>$this->input->post('seat_number'),
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$entitleGrace,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$entitleGrace,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$sub1,
				"subj_2"=>$sub2,
				"subj_3"=>$sub3,
				"subj_4"=>$sub4,
				"subj_5"=>$sub5,
				"subj_6"=>$sub6,
				"subj_7"=>"3A",
				"subj_8"=>"",
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);
			//delete student if exist
			$this->load->model('home1');
			$this->home1->deleteExistStud($this->input->post('pr_number'),$table_name,$this->input->post('type'));

			$flag['flagset']=1;
			$this->home1->addStudentDetail($table_name,$data);
			$this->load->view($this->input->post('view_name'),$flag);
		}



		function editsaveBscStudent(){
			$table_name=$this->input->post('tbl_name');
			$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}


			$selected_subject=$this->input->post('subject');
			//echo "selected subject".$selected_subject;exit();
			if($selected_subject == "1A1/1A2/1A3"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";       $sub4="2A2";
				$sub5="1A3";       $sub6="2A3";
			}
			else if($selected_subject == "1A1/1A2/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A5";       $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A2/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A6";       $sub6="2A6";
			}
			else if($selected_subject == "1A1/1A4/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";       $sub4="2A4";
				$sub5="1A5";        $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A4/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A6";       $sub6="2A6";
			}
			/* code modified on 21 april 2013 */
			else if($selected_subject == "1A1/1A5/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A5";        $sub4="2A5";
				$sub5="1A7";       $sub6="2A7";
			}
			else if($selected_subject == "1A1/1A4/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A7";       $sub6="2A7";
			}
			/* code modified ends here */

			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"block"=>$this->input->post('block'),
				"seat_number"=>$this->input->post('Seat'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$nss_marks_alloc,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$nss_marks_alloc,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$sub1,
				"subj_2"=>$sub2,
				"subj_3"=>$sub3,
				"subj_4"=>$sub4,
				"subj_5"=>$sub5,
				"subj_6"=>$sub6,
				"subj_7"=>"3A",
				"subj_8"=>"4A",
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);

			$this->load->model('home1');
			// check if both primary keys same
			if($this->input->post('pr') == $this->input->post('pr_number') && $this->input->post('type_old')  ==  $this->input->post('type')){
				$this->home1->updateStudentDetailNew($table_name,$data,array('pr_number'=>$this->input->post('pr'),'supplementary'=>$this->input->post('type')));
			}
			else{
		     $this->home1->checkPRNew($this->input->post('pr_number'),$table_name,$data,$this->input->post('pr'),$this->input->post('type_old') ,  $this->input->post('type'));
			}

			$flag['flagset']=1;
			//$this->load->model('home1');
			//$this->home1->updateStudentDetail($table_name,$data,$this->input->post('pr_number'));
			$this->load->view('edit_student',$flag);
		}


		function editsaveBscStudent2(){
			$table_name=$this->input->post('tbl_name');
			$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}$nss=$this->input->post('nss');

			$gen_grace=round($this->input->post('MaxaggMark')*2/100);

			if($nss != 1){
				$nss_marks_alloc=0;
			}
			else{
				$nss_marks_alloc=round($this->input->post('MaxaggMark')*1/100);
			}

			if($this->input->post('sports') == 1){
				$cat=$this->input->post('cat');
				$rew=$this->input->post('rewards');

				$this->load->model('home1');
				$temp=$this->home1->getSportsMarks($cat,$rew);

				foreach($temp as $row){
					$sports_grace=$row->$rew;
				}
			}else{
				$sports_grace=0;
				$cat="";
				$rew="";
			}


			$selected_subject=$this->input->post('subject');
			if($selected_subject == "1A1/1A2/1A3"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";       $sub4="2A2";
				$sub5="1A3";       $sub6="2A3";
			}
			else if($selected_subject == "1A1/1A2/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A5";       $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A2/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A2";        $sub4="2A2";
				$sub5="1A6";       $sub6="2A6";
			}
			else if($selected_subject == "1A1/1A4/1A5"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";       $sub4="2A4";
				$sub5="1A5";        $sub6="2A5";
			}
			else if($selected_subject == "1A1/1A4/1A6"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A6";       $sub6="2A6";
			}
			/* code modified on 21 april 2013 */
			else if($selected_subject == "1A1/1A5/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A5";        $sub4="2A5";
				$sub5="1A7";       $sub6="2A7";
			}
			else if($selected_subject == "1A1/1A4/1A7"){
				$sub1="1A1";       $sub2="2A1";
				$sub3="1A4";        $sub4="2A4";
				$sub5="1A7";       $sub6="2A7";
			}
			/* code modified ends here */
			$data=array(
				"pr_number"=>$this->input->post('pr_number'),
				"name"=>$this->input->post('Name'),
				"block"=>$this->input->post('block'),
				"seat_number"=>$this->input->post('Seat'),
				"gender"=>$this->input->post('gender'),
				"sports_category"=>$cat,
				"sports_rewards"=>$rew,
				"gen_grace_alloc"=>$gen_grace,
				"entitlement_grace_alloc"=>$nss_marks_alloc,
				"sports_grace_alloc"=>$sports_grace,
				"gen_grace_remain"=>$gen_grace,
				"entitlement_grace_remain"=>$nss_marks_alloc,
				"sports_grace_remain"=>$sports_grace,
				"subj_1"=>$sub1,
				"subj_2"=>$sub2,
				"subj_3"=>$sub3,
				"subj_4"=>$sub4,
				"subj_5"=>$sub5,
				"subj_6"=>$sub6,
				"subj_7"=>"3A",
				"subj_8"=>"",
				"supplementary"=>$this->input->post('type'),
				"date"=>'curdate()'
			);

			$this->load->model('home1');
			// check if both primary keys same
			if($this->input->post('pr') == $this->input->post('pr_number') && $this->input->post('type_old')  ==  $this->input->post('type')){
				$this->home1->updateStudentDetailNew($table_name,$data,array('pr_number'=>$this->input->post('pr'),'supplementary'=>$this->input->post('type')));
			}
			else{
		     $this->home1->checkPRNew($this->input->post('pr_number'),$table_name,$data,$this->input->post('pr'),$this->input->post('type_old') ,  $this->input->post('type'));
			}
			$flag['flagset']=1;
			//$this->load->model('home1');
			//$this->home1->updateStudentDetail($table_name,$data,$this->input->post('pr_number'));
			$this->load->view('edit_student',$flag);
		}

		//function for search box
		function searchBox(){
			$searchData=$this->input->post('searchdata');
			$stream=$this->input->post('stream');
			$semester=$this->input->post('sem');
			$tbl_name=$this->input->post('tbl');
			$clm_nme=$this->input->post('funct');

			$this->load->model('home1');
			$data=$this->home1->getSearchdata($clm_nme,$searchData,$tbl_name);

			if($searchData != ""){
				if(isset($data)){
					echo
							'
							<br /><br /><div class="content">
						<table class="main_table" border=1 width=50%;> <thead><tr >
					<th class="table-header-repeat line-left minwidth-1">PR Number</th>
					<th class="table-header-repeat line-left minwidth-1">Seat Number</th>
					<th class="table-header-repeat line-left minwidth-1">Name</th>
					<th class="table-header-repeat line-left minwidth-1">Exam Type</th>
					<th class="table-header-repeat line-left minwidth-1">Edit</th>
						</tr>';

						foreach($data as $row){
						$type="Fresh";
						if($row->supplementary==1)
						$type="Supplementary";
						echo '<tr>
								<td>'.$row->pr_number.'</td>
								<td>'.$row->seat_number.'</td>
								<td>'.$row->name.'</td>
								<td>'.$type.'</td>
								<td><a href="'.base_url().'/index.php/home/editSelectedPr?prnumber='.$row->pr_number.'&stream1='.$stream.'&semester='.$semester.'&type='.$row->supplementary.'">Edit</a></td>
							</tr>';
						}
						if(sizeof($data)==0)
						{
						echo '<tr>
								<td colspan="5">No Student Found</td>
								</tr>';
						}
						echo "</table></div>";
				}
			}
		}


		function searchBoxs(){
			$searchData=$this->input->post('searchdata');
			$stream=$this->input->post('stream');
			$semester=$this->input->post('sem');
			$tbl_name=$this->input->post('tbl');
			$clm_nme=$this->input->post('funct');

			$this->load->model('home1');
			$data=$this->home1->getSearchdatas($clm_nme,$searchData,$tbl_name);

			if($searchData != ""){
				if(isset($data)){
					echo
						"<table>
							<tr>
								<td>PR Number</td>
								<td>Seat Number</td>
								<td>Name</td>
								<td></td>
							</tr>
						";

						foreach($data as $row){
						echo '<tr>
								<td>'.$row->pr_number.'</td>
								<td>'.$row->seat_number.'</td>
								<td>'.$row->name.'</td>
								<td><a href="'.base_url().'index.php/final_marksheet/gen_2012?prnumber='.$row->pr_number.'&stream1='.$stream.'&semester='.$semester.'">Generate</a></td>
							</tr>';
						}
						echo "</table>";
				}
			}
		}







		function insertStuDataSubject(){
			$counter=$this->input->post('counter');
			$sub_id=$this->input->post('subject_id');
			$tbl_name=$this->input->post('tbl_marks_enter');
			$flag=0;

			if(($tbl_name == "bsc_student_marks_sem_2")||($tbl_name == "bsc_student_marks_sem_1")||($tbl_name == "bsc_student_marks_sem_3")||($tbl_name == "bsc_student_marks_sem_4")){
				$flag=1;
			}
			if(($tbl_name == "bsc_cmp_sci_student_marks_sem_1")||($tbl_name == "bsc_cmp_sci_student_marks_sem_2")||($tbl_name == "bsc_cmp_sci_student_marks_sem_3")||($tbl_name == "bsc_cmp_sci_student_marks_sem_4")){
				$flag=1;
			}

			for($i=1;$i<=$counter;$i++){
				$pract=$this->input->post('pract'.$i);
				$isa=$this->input->post('isa'.$i);
				$see=$this->input->post('see'.$i);

				if($see == "A"){
					$see_set="A";
				}else{
					$see_set="";
				}

				if($isa == 'A'){
					$isa_set='A';
				}else{
					$isa_set="";
				}

				if($pract == 'A'){
					$pract_set="A";
				}else{
					$pract_set="";
				}

				if($flag == 1){
					$pract_marks_temp=0;
					$pract_marks=$pract;
				}
				else{
					if($pract == -1){
						$pract_marks=-1;
						$pract_marks_temp=0;
					}
					else{
						$pract_marks=$pract;
						$pract_marks_temp=$pract;
					}
				}


				$data=array(
					"sub_id"=>$sub_id,
					"pr_number"=>$this->input->post('pr_number'.$i),
					"isa_abs"=>$isa_set,
					"see_abs"=>$see_set,
					"pract_abs"=>$pract_set,
					"internal"=>$this->input->post('isa'.$i),
					"theory"=>$this->input->post('see'.$i),
					"practicle"=>$pract_marks,
					"total"=>$this->input->post('isa'.$i)+$this->input->post('see'.$i)+$pract_marks_temp
				);

				//delete if already data exist
				$this->load->model('dataentry');
				$this->load->model('dataentry');
				$this->dataentry->deleteExist($tbl_name,$this->input->post('pr_number'.$i),$sub_id);

				//insert query code
				$this->dataentry->insertDataSubj($tbl_name,$data);
			}
			//load view

				/*instead of going back to 1st view comt to intermediate*/
				//$this->dataentry();
				$this->getSubject($tbl_name);

		}
	function blockedStudents(){
			$this->load->view('blockedStudents');
		}


	function displayBlockedStudents(){
				$stream   = $this->input->post('stream');
				$semester = $this->input->post('semester');
				$Load_Student = "";

				if($stream == "ba_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = "ba_sub_".$semester;
				}
				if($stream == "bsc_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = "bsc_sub_".$semester;
				}
				if($stream == "bsc_cmp_sci_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = " bsc_cmp_sci_sub_".$semester;
				}
				if($stream == "bcom_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = "bcom_sub_".$semester;
				}

				/* retrive student data*/
				$this->load->model('home1');
				$student_details = $this->home1->getStudentDataBlocked($Load_Student);

				$display_data=array(array());

				$i = 0;
				foreach($student_details as $row){
					$display_data ["student_details"][$i]["name"]        = $row->name;
					$display_data ["student_details"][$i]["pr_number"]   = $row->pr_number;
					$display_data ["student_details"][$i]["seat_number"] = $row->seat_number;
					$display_data ["student_details"][$i]["block"] = $row->block;
					$display_data ["student_details"][$i]["now_eligible"] = $row->now_eligible;
					$display_data ["student_details"][$i]["supplementary"] = $row->supplementary;


					$i++;
				}
				$display_data['table']=$Load_Student;
				$this->load->view('blockedStudentDataDisplay',$display_data);
			}
		function saveBlockedDetails(){
			$this->load->model('home1');
			for($i=0;$i<$_POST['number_of_students'];$i++){
				$block=$now_eligible=0;
				$pr_number=$_POST['pr_number_'.$i];
				$supplementary=$_POST['supplementary_'.$i];
				$table=$_POST['table'];
				if(isset($_POST['blocked_'.$i]) && $_POST['blocked_'.$i]=='on'){ // still blocked
					$block=1;
					if(isset($_POST['now_eligible_'.$i]) && $_POST['now_eligible_'.$i]=='on'){ // blocked and nw eligible
					$block=1;$now_eligible=1;
					}
				}
				else{// now unblocked

				}
				$this->home1->updateStudentDetailBlocked($pr_number,$supplementary,$block,$now_eligible,$table);
			}
			redirect('home/blockedStudents');
		}
		function blockStudents(){
			$this->load->view('blockStudents');
		}


	function displayStudentsToBlock(){
				$stream   = $this->input->post('stream');
				$semester = $this->input->post('semester');
				$Load_Student = "";

				if($stream == "ba_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = "ba_sub_".$semester;
				}
				if($stream == "bsc_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = "bsc_sub_".$semester;
				}
				if($stream == "bsc_cmp_sci_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = " bsc_cmp_sci_sub_".$semester;
				}
				if($stream == "bcom_student_detail_"){
					$Load_Student = $stream.$semester;
					$Load_sub     = "bcom_sub_".$semester;
				}

				/* retrive student data*/
				$this->load->model('home1');
				$student_details = $this->home1->getStudentDataToBlock($Load_Student);

				$display_data=array(array());

				$i = 0;
				foreach($student_details as $row){
					$display_data ["student_details"][$i]["name"]        = $row->name;
					$display_data ["student_details"][$i]["pr_number"]   = $row->pr_number;
					$display_data ["student_details"][$i]["seat_number"] = $row->seat_number;
					$display_data ["student_details"][$i]["block"] = $row->block;
					$display_data ["student_details"][$i]["now_eligible"] = $row->now_eligible;
					$display_data ["student_details"][$i]["supplementary"] = $row->supplementary;


					$i++;
				}
				$display_data['table']=$Load_Student;
				$this->load->view('studentDataDisplayToBlock',$display_data);
			}
		function saveToBlockDetails(){

			$this->load->model('home1');
			for($i=0;$i<$_POST['number_of_students'];$i++){
				$block=$now_eligible=0;
				$pr_number=$_POST['pr_number_'.$i];
				$supplementary=$_POST['supplementary_'.$i];
				$table=$_POST['table'];
				if(isset($_POST['blocked_'.$i]) && $_POST['blocked_'.$i]=='on'){ // still blocked
					$block=1;

				}
				else{// now unblocked

				}
				$this->home1->updateStudentDetailBlocked($pr_number,$supplementary,$block,$now_eligible,$table);
			}
			redirect('home/blockStudents');
		}

		}
?>
