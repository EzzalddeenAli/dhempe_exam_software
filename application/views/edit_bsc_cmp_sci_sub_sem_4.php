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
			$subj_3=$row->subj_3;
			$subj_4=$row->subj_5;
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
	$subject7=array(
		"3A"=>"e-Commerce",
		"3B"=>"Information System & IT Entrepreneurship"
		


	);
	if(!isset($subj_7)){
		$sel_Sub7="3A";
	}else{
		$sel_Sub7=$subj_7;
	}
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
           		<h3 align="center">Stream : B.S.C. (C.S) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semester : 4</h3>
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
				<?php echo form_open('home/editBscCmpStudentdetail',$form_data); $js ='class="my_select"'; ?>
		
		<input type="hidden" value="<?php echo  "bsc_cmp_sci_student_detail_sem_4"; ?>" name="tbl_name" />
				<input type="hidden" value="700" name="MaxaggMark" />
				<input type="hidden" value="<?php echo $pr;  ?>" name="pr" />
				<input type="hidden" value="<?php echo $seat;  ?>" name="seat_old" />
				<input type="hidden" value="<?php echo $type;  ?>" name="type_old" />
						
				<ol>
             		<li>
					
					<h4>Fresh <?php echo form_radio('type','0',$set_type); ?>
							Supplementary <?php echo form_radio('type','1',$set_type1); ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blocked:&nbsp;
							<?php if($block==1) 
							{echo '<input type="checkbox" name="block" id="block" value=1 checked>';}
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
								Physics - Mathematics - Computer Science <?php echo form_radio('subject1','','true'); ?>
							</div>
							<div style="float:left;">
								Foundation Course <?php echo form_dropdown('subject7',$subject7,$sel_Sub7,$js); ?>
							</div>
						</div>
					</li>
					<li>
			  		<div style="clear:both;">
						<div style="margin-top:20px;">
				<input style="margin-top:20px;" id="p" type="submit" value="Save" onclick="return check();" class="my_button_submit"/>
						<input id="refresh" type="button" value="Refresh" class="my_button_submit"/>
						<input id="back" type="button" value="Back" class="my_button_submit"/>
					</div>
				</div>
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