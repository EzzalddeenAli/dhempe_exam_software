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
	
	$subject=array(
		""=>"Select",
		"1A1/1A2/1A3"=>"Chemistry-Physics-Mathematics",
		"1A1/1A2/1A5"=>"Chemistry-Physics-Zoology",
		"1A1/1A2/1A6"=>"Chemistry-Physics-Geology",
		"1A1/1A4/1A5"=>"Chemistry-Botany-Zoology",
		"1A1/1A4/1A6"=>"Chemistry-Botany-Geology",
		"1A1/1A5/1A7"=>"Chemistry-Zoology-Biotechnology",
		"1A1/1A4/1A7"=>"Chemistry-Botany-Biotechnology"
	);
	
?>


<script type="text/javascript">
	
	function check(){
		var x=document.forms["myForm"]["pr_number"].value;
		if (x==null || x==""){
  			alert("Enter Pr number");
  			return false;
  		}
		 
		if(isNaN(x)){
			alert("Enter Number Only  for PR");
  			return false;
		}
		
		var letters = /^[0-9]+$/;  
   		if(x.match(letters))  {  
		}else{  
     		alert("Enter only decimal numbers");  
     		return false;  
     	} 
		 
		if(x < 0){
			alert('Dont\'t Enter Negative Number');
			return false;
		}
		
		var x=document.forms["myForm"]["seat_number"].value;
		if (x==null || x==""){
  			alert("Enter Seat Number");
  			return false;
  		}
		 
		var letters = /^[0-9]+$/;  
   		if(x.match(letters))  {  
		}else{  
     		alert("Enter only decimal numbers");  
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
		 
		var x=document.forms["myForm"]["subject"].value;
		if (x==null || x=="")
 		 {
  			alert("Select Subject");
  			return false;
  		 }
	}
	
</script>
<div class="content">
	 	<div class="gadget">
          	<div class="titlebar vertsortable_head">
           		<h3 align="center">Stream : B.S.C.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semester : 2</h3>
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
			<?php echo form_open('home/saveBscStudent',$form_data); $js ='class="my_select"'; ?>
			
			<input type="hidden" value="<?php echo "bsc_sub_sem_2" ?>" name="view_name" />
			<input type="hidden" value="<?php echo  "bsc_student_detail_sem_2"; ?>" name="tbl_name" />
			<input type="hidden" value="750" name="MaxaggMark" />
				
			<ol>
				<li>
				<h4>Fresh <?php echo form_radio('type','0','true'); ?>
							Supplementary <?php echo form_radio('type','1'); ?></h4>
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
							<h4>Male <?php echo form_radio('gender','M','true'); ?>
							Female <?php echo form_radio('gender','F'); ?></h4>
					</div>
				</li>
				
				<li>	
			  		<div style="clear:both;"><div><br><br>
					<div style="float:left;"> 
						<h4>NSS/NCC <?php echo form_checkbox('nss','1'); ?></h4>	
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
							Major 1, 2 & 3 <?php echo form_dropdown('subject',$subject,"",$js); ?>
						</div>
					</div>
					<div style="clear:both;margin-top:65px;">
						<div style="float:left;">
							Information Technology&nbsp;&nbsp;<?php echo form_radio('subject7','3A','true'); ?>
						</div>
						<div style="float:left; margin-left:20px;">
							Environmental Education&nbsp;&nbsp;<?php echo form_radio('subject8','4A','true'); ?>
						</div>
					</div>
				</li>
				<li>
			  		<div style="clear:both;">
					<input style="margin-top:20px;" type="submit" value="Save" onclick="return check();" class="my_button_submit" />
					<input id="back" type="reset" value="Reset" class="my_button_submit" />
					<input type="button" value="Back" id="previous_page" class="my_button_submit" />
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
	$('#name_test').change(function(){
		var check=$('#reg').val();
		if(check == ""){
			alert('Enter Register number First');
			$('#name_test').val("");
		}
	});
	
	$('#sports_id').click(function(){
		if($(this).is(':checked')){
			$('#hideSports').css('display','');
		}else{
			$('#hideSports').hide();
		}
	});
	
	$('#reg').change(function(){
		var url='<?php echo base_url()."/index.php/validation/checkpr"; ?>';
		$.post(url,{input:$('#reg').val(),stream2:'bsc_student_detail_sem_2',type:$('input:radio[name=type]:checked').val()},function(data){
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
		$.post(url,{input:$('#reg').val(),stream2:'bsc_student_detail_sem_2',type:$('input:radio[name=type]:checked').val()},function(data){
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