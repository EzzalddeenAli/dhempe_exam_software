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
			$subj_2=$row->subj_2;
			$subj_2.='/'.$row->subj_3;
			$subj_3=$row->subj_4;
			$subj_4=$row->subj_5;
			$subj_5=$row->subj_6;
			$subj_6=$row->subj_7;
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
			'id'=>'seat_test',
			'class'=>'my_inp_form'
		);
	}else{
		$seat_data=array(
			'name'=>'Seat',
			'value'=>$seat,
			'id'=>'seat_test',
			'class'=>'my_inp_form'
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
	

	if(!isset($subj_2)){
		$sel_Sub2="2A1";
	}else{
		$sel_Sub2=$subj_2;
	}
	
	$subject2=array(
		""=>"Select",
		"2A1/2A2"=>"Economics & History",
		"2A1/2A3"=>"Economics & Philosophy",
		"2A4/2A2"=>"English and History",
		"2A4/2A3"=>"English and philosophy"
	);
	
	
	if(!isset($subj_3)){
		$sel_sub4="3A1";	
	}else{
		$sel_sub4=$subj_3;
	}
	
	$subject4=array(
		"3A1"=>"Hindi",
		"3A2"=>"Konkani",
		"3A3"=>"Marathi",
		"3A4"=>"Psychology",
		"3A5"=>"Political science"
	);
	
	
	if(!isset($subj_4)){
		$sel_Sub5="4A1";
	}else{
		$sel_Sub5=$subj_4;
	}
	
	$subject5=array(
		"4A1"=>"translation Studies",
		"4A2"=>"Industrial Welfare & Labour Relations -II",
		"4A3"=>"History of Ecology & Environment : Goa II",
		"4A4"=>"Philosophy of value Education II",
		"4A5"=>"Child Psychology",
		"4A6"=>"Women issues in India",
		"4A7"=>"Commercial konkani Theatre II",
		"4A8"=>"joy of Reading",
		"4A9"=>"Mass communication - Electronic Media",
		"4A10"=>"American studies",
		"4A11"=>"Psychology of Adjustment",
		"4A12"=>"Research Methodology"
	);
	
	
	if(!isset($subj_5)){
		$sel_Sub6="5A1";
	}else{
		$sel_Sub6=$subj_5;
	}
	$subject6=array(
		"5A1"=>"Logic",
		"5A2"=>"Environmental Ethics",
		"5A3"=>"Journalism(with Practical)",
		"5A4"=>"History of Indias freedom Struggle",
		"5A5"=>"Journalism(without Practical)",
	);
	
	if(!isset($subj_6)){
		$sel_Sub7="7A1";
	}else{
		$sel_Sub7=$subj_6;
	}
	
	$subject7=array(
		"7A1"=>"Goan Heritage",
		"7A2"=>"Self Development"
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
			
           		<h3 align="center">Stream : B.A. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semester : 4</h3>
         	</div>
		 	<div class="gadgetblock">
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo base_url();?>assets/images/shared/side_shadowleft.jpg" width="20" height="150" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo base_url();?>assets/images/shared/side_shadowright.jpg" width="20" height="150" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">									

				<?php $form_data=array('name'=>"myForm","id"=>"formData"); ?>
				<?php echo form_open('home/editSaveStudentDetail2',$form_data);$js ='class="my_select"'; ?>
		
				<input type="hidden" value="<?php echo  "ba_student_detail_sem_4"; ?>" name="tbl_name" />
				<input type="hidden" value="700" name="MaxaggMark" />
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

							?>
							
							</h4><br><br>
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
				
					<li>
					<h4>
					<div style="clear:both;"><div><br><br>
						<div>
							NSS/NCC <?php echo form_checkbox('nss','1',$ok); ?>	
							Sports <?php echo form_checkbox('sports','1',$tick_sports); ?>
							Category<?php echo form_dropdown('cat',$options,$sel_option,$js); ?>
							Rewards<?php echo form_dropdown('rewards',$rewards,$se_rew,$js); ?>
						</div>
					</div>
					</h4>
					</li>
					
					<li>
			  			<h4>
			  			<div style="margin-top:20px; clear: both;">
							Selected Subject
						</div>
					
						<div style="margin-top:20px;">
							<div style="float:left;">
								<?php echo form_radio('subject1','1A','TRUE'); ?>English (Compulsory)
							</div>
						</div>
						</h4>
					</li>
					<li>
						<h4>
							<div style="clear:both;margin-top:40px;">
								<div style="float:left;">
									Major 1 & 2<?php echo form_dropdown('subject2',$subject2,$sel_Sub2,$js); ?>
								</div>
								<div style="float:left; margin-left:20px;">
									 Major 3<?php echo form_dropdown('subject4',$subject4,$sel_sub4,$js); ?>
								</div>
					
								<div style="float:left; margin-left:20px;">
									Allied Paper related to Major <?php echo form_dropdown('subject5',$subject5,$sel_Sub5,$js); ?>
								</div>
								<div style="float:left; margin-left:20px;">
									Foundation Course Paper <?php echo form_dropdown('subject6',$subject6,$sel_Sub6,$js); ?>
								</div>
								<div style="float:left; margin-left:20px;">
									Population Studies/Human Rights <?php echo form_dropdown('subject7',$subject7,$sel_Sub7,$js); ?>
								</div>
						</div>
						</h4>
					</li>
			 		<li>
					<h4>
			  		<div style="clear:both;">	
			<input style="margin-top:20px;" id="p" type="submit" value="Save" onclick="return check();" class="my_button_submit"/>
						<input id="refresh" type="button" value="Refresh" class="my_button_submit"/>
						<input id="back" type="button" value="Back" class="my_button_submit"/>
					</div>
				</li>
			  	</h4>
			</ol>
			</div>
			</td>
		<td id="tbl-border-right"></td>
		</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
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