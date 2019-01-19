<?php include_once('head.php'); ?>

<?php if(isset($flagset)){ ?>
	<script type="text/javascript">
		alert("Added Sucessfully");
	</script>
<?php } ?>

<?php 

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
	
	
	//subject name and their code
	$subject2=array(
		""=>"select",
		"2A"=>"Konkani",
		"2B"=>"Marathi",
		"2C"=>"Hindi",
		"2D"=>"French",
		"2E"=>"History",
		"2F"=>"Portuguese",
		"2G"=>"Philosophy"
	);
	
	$subject3=array(
		""=>"select",
		"3A1/3B1"=>"Economics & History",
		"3A1/3C1"=>"Economics and Philosophy",
		"3D1/3B1"=>"English and History",
		"3D1/3C1"=>"English and philosophy"
	);
	
	$subject4=array(
		""=>"select",
		"4A"=>"Hindi",
		"4B"=>"Konkani",
		"4C"=>"Marathi",
		"4D"=>"Psychology",
		"4E"=>"Political science"
	);

?>
	<div class="content">
	 	<div class="gadget">
          	<div class="titlebar vertsortable_head">
           		<h3>Stream : B.A.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semester : 1</h3>
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
				<?php echo form_open('home/saveStudentDetail',$form_data); $js ='class="my_select"'; ?>
			
				<input type="hidden" value="<?php echo  "ba_student_detail_sem_1"; ?>" name="tbl_name" />
				<input type="hidden" value="<?php echo  "ba_sub_sem_1"; ?>" name="view_name" />
				<input type="hidden" value="750" name="MaxaggMark" />
			
				<ol>
             		<li>
				
							<h4>Fresh&nbsp;&nbsp; <?php echo form_radio('type','0','true'); ?>
							Supplementary&nbsp;&nbsp; <?php echo form_radio('type','1'); ?></h4>
						<br>
					
               			<div style="float:left;">
							<?php $pr_number_id=array('name'=>"pr_number","id"=>"reg",'class'=>'my_inp_form'); ?>
							<h4>PR Number <?php echo form_input($pr_number_id); ?></h4>
						</div>
					
			  			<div style="float:left;  margin-left:50px;">
							<?php $seat_number_id=array('name'=>"seat_number","id"=>"seat_number",'class'=>'my_inp_form'); ?>
							<h4>Seat Number <?php echo form_input($seat_number_id); ?></h4>
						</div>
					
						<div style="float: left; margin-left:50px;">
							<?php $nameId=array('name'=>'Name','id'=>'name_test','class'=>'my_inp_form'); ?>
							<h4>Name <?php echo form_input($nameId); ?></h4>
						</div>
					
						<div style="float: left; margin-left:50px;">
							<h4>Male&nbsp;&nbsp;&nbsp; <?php echo form_radio('gender','M'); ?>
							Female&nbsp;&nbsp;&nbsp; <?php echo form_radio('gender','F',true); ?></h4>
						</div>
              		</li>  
			  		<li>	
			  			<div style="clear:both;"><div><br><br>
						<div style="float:left;"> 
							<h4>NSS/NCC <?php echo form_checkbox('nss','1'); ?></h4>	<br><br>
						</div>
						<div style="float:left; margin-left:20px;">		
							<?php $sportsID=array('name'=>'sports','id'=>'sports_id','value'=>'1'); ?>
							<h4>Sports <?php echo form_checkbox($sportsID,''); ?><h4>
						</div>
			
						<div id="hideSports" style="display:none;">
							<div style="float:left; margin-left:20px; margin-top:-7px;">
								<h4>Category<?php echo form_dropdown('cat',$options,"",$js); ?><h4>
							</div>
							<div style="float:left; margin-left:20px; margin-top:-7px;">
								<h4>Rewards<?php echo form_dropdown('rewards',$rewards,"",$js); ?><h4>
							</div>
						</div>
			  		</li> 
			 		<li>
			  			<h4>
			  			<div style="margin-top:20px; clear: both;">
							Select Subject
						</div>
					
						<div style="margin-top:20px;">
							<div style="float:left;">
								Spoken English&nbsp;&nbsp;&nbsp;<?php echo form_radio('subject1','1A','TRUE'); ?>
							</div>
							<div style="float:left; margin-left:20px;">
								Environmental Education&nbsp;&nbsp;&nbsp;<?php echo form_radio('subject8','7A','TRUE'); ?>
							</div>
							<div style="float:left; margin-left:20px;">
								Foundation Course&nbsp;&nbsp;&nbsp;<?php echo form_radio('subject7','6A','TRUE'); ?>
							</div>
							<div style="float:left; margin-left:20px;">
								Information Technology&nbsp;&nbsp;&nbsp;<?php echo form_radio('subject6','5A','TRUE'); ?>
							</div>
						</div>
					
						<div style="clear:both;margin-top:65px;">
							<div style="float:left;">
								Another Language Paper  <?php echo form_dropdown('subject2',$subject2,"",$js); ?>
							</div>	
							<div style="float:left; margin-left:20px;">
								Major 1 & Major2 <?php echo form_dropdown('subject3',$subject3,"",$js); ?>
							</div>
							<div style="float:left; margin-left:20px;">
								Major 3 <?php echo form_dropdown('subject4',$subject4,"",$js); ?>
							</div>
						</div>
			  		</li>
			 		<li>
			  		<div style="clear:both;">
			<input style="margin-top:20px;" id="p" type="submit" value="Save" onclick="return check();" class="my_button_submit" />
						<input id="back" type="reset" value="Reset" class="my_button_submit" />
						<input type="button" value="Back" id="previous_page" class="my_button_submit" />
					</div>
			 		</li>
			  	</h4>
			</ol>
		
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
</div></div>
	
</div>
<?php echo form_close(); ?>
<?php include_once('foot.php'); ?>

<script type="text/javascript">

	$('#back').click(function(){
		if($(this).is(':checked')){
			$('#hideSports').css('display','');
		}else{
			$('#hideSports').hide();
		}
	});
	
	$('#previous_page').click(function(){
		window.location='<?php echo base_url(); ?>index.php/home/addStudent';
	});
	
	
	$('#sports_id').click(function(){
		if($(this).is(':checked')){
			$('#hideSports').css('display','');
		}else{
			$('#hideSports').hide();
		}
	});
	
	$('#name_test').change(function(){
		var check=$('#reg').val();
		if(check == ""){
			alert('Enter Register number First');
			$('#name_test').val("");
		}
	});
	
	
	$('#reg').change(function(){
		var url='<?php echo base_url()."/index.php/validation/checkpr"; ?>';
		$.post(url,{input:$('#reg').val(),stream2:'ba_student_detail_sem_1',type:$('input:radio[name=type]:checked').val()},function(data){
			//$('#status').html(data);
			var status=data;
			
			if(status == 0){
				$('#reg').css('border-color','#33CC33');
			}
			else{
				$('#reg').css('border-color','#FF0000');
				alert('Register Number already Exist For the Type Of Exam Selected');
				$('#reg').val("");
				return false;
			}
		});
	});
	$('input:radio[name=type]').click(function() {
		var url='<?php echo base_url()."/index.php/validation/checkpr"; ?>';
		$.post(url,{input:$('#reg').val(),stream2:'ba_student_detail_sem_1',type:$('input:radio[name=type]:checked').val()},function(data){
			//$('#status').html(data);
			var status=data;
			
			if(status == 0){
				$('#reg').css('border-color','#33CC33');
			}
			else{
				$('#reg').css('border-color','#FF0000');
				alert('Register Number already Exist For the Type Of Exam Selected');
				$('#reg').val("");
				return false;
			}
		});
	});

</script>


<script type="text/javascript">
	
	function check(){
		//Register number or Pr number
		var x=document.forms["myForm"]["pr_number"].value;
		if (x==null || x==""){
  			alert("Enter Pr number");
  			return false;
  		}
		 
		if(isNaN(x)){
			alert("Enter Number Only  for PR");
  			return false;
		}
		
		if(x < 0){
			alert('Dont\'t Enter Negative Number');
			return false;
		}
		
		var letters = /^[0-9]+$/;  
   		if(x.match(letters))  {  
		}else{  
     		alert("Enter only decimal numbers");  
     		return false;  
     	}  
		
		
		//Seat number
		var x=document.forms["myForm"]["seat_number"].value;
		if (x==null || x==""){
  			alert("Enter Seat Number");
  			return false;
  		}
		 
		if(isNaN(x)){
			alert("Enter Number Only  for Seat Number");
  			return false;
		}
		
		if(x < 0){
			alert('Dont\'t Enter Negative Number');
			return false;
		}
	
		var letters = /^[0-9]+$/;  
   		if(x.match(letters))  {  
		}else{  
     		alert("Enter only decimal numbers");  
     		return false;  
     	}  
		
		
		//Name
		var x=document.forms["myForm"]["Name"].value;
		if (x==null || x==""){
  			alert("Enter Name");
  			return false;
  		}
		 
		var letters = /^[A-Za-z\s]+$/;  
   		if(x.match(letters)){  }  
   		else{  
     		alert("Enter Characters only for Name");  
     		return false;  
     	}  
		
		var x=document.forms["myForm"]["subject4"].value;
		if (x==null || x==""){
  			alert("Select Subject");
  			return false;
  		}
		 
		var x=document.forms["myForm"]["subject2"].value;
		if (x==null || x==""){
  			alert("Select Subject");
  			return false;
  		} 
		 
		var x=document.forms["myForm"]["subject3"].value;
		if (x==null || x==""){
  			alert("Select Subject");
  			return false;
  		}
	}
	
</script>
