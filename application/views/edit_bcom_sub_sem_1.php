<?php include_once('head.php'); ?>


<?php 

	if(isset($studentdetail)){
		foreach($studentdetail as $row){
			$name=$row->name;
			$pr=$row->pr_number;
			$block=$row->block;
			$seat=$row->seat_number;
			$gen=$row->gender;
			$sports_cat=$row->sports_category;
			$sports_rew=$row->sports_rewards;
			$entitle_grace=$row->entitlement_grace_alloc;
			$sports_grace=$row->sports_grace_alloc;
			$name=$row->name;
			$pr=$row->pr_number;
			$subj_7=$row->subj_7;
			$type=$row->supplementary;
		}
	}
	
	if($gen =="M"){
		$set=true;
		$set1=false;
	}else{
		$set=false;
		$set1=true;
	}
	//supplementary
	if($type ==0){
		$set_type=true;
		$set_type1=false;
	}else{
		$set_type=false;
		$set_type1=true;
	}
	
	
	if($entitle_grace > 0){
		$ok=true;
	}
	else{
		$ok=false;
	}
	
		//name is set in database or note
	if(!isset($pr)){
		$reg_number=array(
			'name'=>'pr_number',
			'value'=>'',
			'class'=>'my_inp_form'
		);
	}else{
		$reg_number=array(
			'name'=>'pr_number',
			'value'=>$pr,
			'class'=>'my_inp_form'
		);
	}
	
	if(!isset($name)){
		$data=array(
			'name'=>'Name',
			'value'=>'',
			'class'=>'my_inp_form'
		);
	}else{
		$data=array(
			'name'=>'Name',
			'value'=>$name,
			'class'=>'my_inp_form'
		);
	}
	
	//get seat number from database
	if(!isset($seat)){
		$seat_data=array(
			'name'=>'Seat',
			'value'=>'',
			'id'=>'seat_test'
		);
	}else{
		$seat_data=array(
			'name'=>'Seat',
			'value'=>$seat,
			'id'=>'seat_test'
		);
	}
	
	$options=array(
		"A"=>"International Events",
		"B"=>"International events/Championships",
		"C"=>"National Events",
		"D1"=>"Inter-University Championships",
		"D2"=>"Zonal Inter-University Championships",
		"E"=>"Inter-Collegiate Tournaments"
	);
	
	$rewards=array(
		"participation"=>"Participation",
		"winner"=>"Winner",
		"runners_up"=>"Runners_up",
		"semi_finalist"=>"Semi_finalist"
	);
	
	
	//get sports data from database
	if($sports_cat != ""){
		$sel_option=$sports_cat;
		$tick_sports=true;
		$se_rew=$sports_rew;
		$sports_data=array(
			'name'=>'Sports_cat1',
			'id'=>'sports_test'
		);
	}else{
		$sel_option="A";
		$tick_sports=false;
		$se_rew="participation";
		$sports_data=array(
			'name'=>'Sports',
			'id'=>'sports_test'
		);
	}
	
	
	if(!isset($subj_7)){
		$sel_sub7='7A1';
	}else{
		$sel_sub7=$subj_7;
	}
	
	$subject7=array(
		"7A1"=>"Accounting-II",
		"7A2"=>"Marketing-II",
		"7A3"=>"Practical Banking-II",
		"7A4"=>"Cost Accounting-II",
		"7A5"=>"Principles & Practice of Insurance"
	);
	
?>

<script type="text/javascript">

		function check(){
			//PR Number
			var x=document.forms["myForm"]["pr_number"].value;
			if (x==null || x==""){
	  			alert("Enter PR Number");
	  			return false;
	  		} 
			var letters = /^[0-9]+$/;  
	   		if(x.match(letters))  {  
			}else{  
	     		alert("Enter Number Only / Don\'t Enter Characters");  
	     		return false;  
	     	}  
		
			//seat Number
			var x=document.forms["myForm"]["Seat"].value;
			if (x==null || x==""){
	  			alert("Enter Seat Number");
	  			return false;
	  		} 
			var letters = /^[0-9]+$/;  
	   		if(x.match(letters))  {  
			}else{  
	     		alert("Enter Number Only / Don\'t Enter Characters");  
	     		return false;  
	     	}  
		
			//Name
			var x=document.forms["myForm"]["Name"].value;
			if (x==null || x==""){
	  			alert("Enter Name");
	  			return false;
	  		} 
			var letters = /^[A-Za-z\s]+$/;  
	   		if(x.match(letters)){}  
	   		else{  
	     		alert("Enter Characters only for Name");  
	     		return false;  
	     	}  
		}
		
</script>
<div class="content">
	 	<div class="gadget">
          	<div class="titlebar vertsortable_head">
           		<h3 align="center">Stream : B.COM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semester : 1</h3>
         	</div>
		 	<div class="gadgetblock">
				<?php $form_data=array('name'=>"myForm","id"=>"formData"); ?>
				<?php echo form_open('home/editsaveBcomStudentDetail',$form_data);$js ='class="my_select"' ?>
				<input type="hidden" value="<?php echo  "bcom_student_detail_sem_1"; ?>" name="tbl_name" />
				<input type="hidden" value="750" name="MaxaggMark" />
				<input type="hidden" value="<?php echo $pr;  ?>" name="pr" />
				<input type="hidden" value="<?php echo $seat;  ?>" name="seat_old" />
				<input type="hidden" value="<?php echo $type;  ?>" name="type_old" />
				
				<ol>
             		<li>	
					
					
					<h4>Fresh <?php echo form_radio('type','0',$set_type); ?>
							Supplementary <?php echo form_radio('type','1',$set_type1); ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blocked:&nbsp;
							<?php if($block==1) {echo '<input type="checkbox" name="block" id="block" value=1 checked>';}
							else
							{echo '<input type="checkbox" name="block" id="block" value=1>';}

							?></h4>
						<div style="float:left;">
							<h4>Name <?php echo form_input($data); ?></h4>
						</div>
					
						<div style="float:left; margin-left:20px;">
							<h4>pr_number <?php echo form_input($reg_number); ?></h4>
						</div>
					
						<div style="float:left; margin-left:20px;">
							<h4>Seat_number <?php echo form_input($seat_data); ?></h4>
						</div>
						<div style="float: left; margin-left:50px;">
							<h4>Male <?php echo form_radio('gender','M',$set); ?>
							Female <?php echo form_radio('gender','F',$set1); ?></h4>
						</div>
					</li>
				
					<div style=" clear:both;margin-top:20px;">
					<h4>
						<div>
							NSS/NCC <?php echo form_checkbox('nss','1',$ok); ?>	
							Sports <?php echo form_checkbox('sports','1',$tick_sports); ?>
							Category<?php echo form_dropdown('cat',$options,$sel_option,$js); ?>
							Rewards<?php echo form_dropdown('rewards',$rewards,$se_rew,$js); ?>
						</div>
					</div>
					</h4>
				<li>	
					<h4>
			  			<div style="clear:both;"><div>
							<div style="float:left;"> 
								English<?php echo form_radio('subject1','1A','TRUE'); ?>
							</div>
							<div style="float:left;"> 
								Principles of Management - I<?php echo form_radio('subject2','2A','TRUE'); ?>
							</div>
							<div style="float:left;"> 
								Managerial Economics<?php echo form_radio('subject3','3A','TRUE'); ?>
							</div>
							<div style="float:left;"> 
								Mathematical Techniques<?php echo form_radio('subject4','4A','TRUE'); ?>
							</div>
							<div style="float:left;"> 
								Financial Accounting- I<?php echo form_radio('subject5','5A','TRUE'); ?>
							</div>
							<div style="float:left;"> 
								Information Technology<?php echo form_radio('subject6','6A','TRUE'); ?>
							</div>
							<div style="float:left;"> 
								Environmental Studies<?php echo form_radio('subject8','8A','TRUE'); ?>
							</div>
						</div>
					</li>
			 		<li>
					<h4>
			  			<div style="clear:both;margin-top:45px;">
							<div style="float:left;">
								Foundation Course <?php echo form_dropdown('subject7',$subject7,$sel_sub7,$js); ?>
							</div>
						</div>
					</h4>
					</li>
					<li>
			  		<div style="clear:both;">		
						<input style="margin-top:20px;" id="p" type="submit" value="Save" onclick="return check();" class="my_button_submit"/>
						<input id="refresh" type="button" value="Refresh"" class="my_button_submit"/>
						<input id="back" type="button" value="Back" class="my_button_submit"/>
					</div>
			</div>	
		</div>
	</div>
		<?php echo form_close(); ?>
<?php include('foot.php'); ?>

<script type="text/javascript">
	$('#refresh').click(function(){
		location.reload();
	});
	
	$('#back').click(function(){
		window.location='<?php echo base_url(); ?>index.php/home/editStudent';
	});
</script>