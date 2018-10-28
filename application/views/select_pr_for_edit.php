<?php include_once('head.php'); ?>

<div class="content">
	 <div class="gadget">
		 <div class="titlebar vertsortable_head">
           		<h3 align="center">Search</h3>
         </div>
		 
		 
		 
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

		<?php $form_id=array('id'=>'myForm'); ?>
		<?php echo form_open('home/editSelectedPr',$form_id); $js ='class="my_select"'; ?>
			
		<input id="tbl_name_id" type="hidden" name="table_name" value="<?php echo $tbl_name; ?>" />
		<input id="stream03" type="hidden" name="stream1" value="<?php echo $stream1; ?>" />
		<input id="sem03" type="hidden" name="semester" value="<?php echo $sem; ?>" />
	
			
		<?php if($stream1 =="ba_student_detail_"){	$class="B.A."; } ?>
		<?php if($stream1 =="bcom_student_detail_"){	$class="B.COM"; } ?>
		<?php if($stream1 =="bsc_student_detail_"){	$class="B.S.C."; } ?>
		<?php if($stream1 =="bsc_cmp_sci_student_detail_"){	$class="B.S.C (C.S)"; } ?>
		<?php if($sem == "sem_1"){ $semester=1;} ?>
		<?php if($sem == "sem_2"){ $semester=2;} ?>
		<?php if($sem == "sem_3"){ $semester=3;} ?>
		<?php if($sem == "sem_4"){ $semester=4;} ?>
				
		<div align="center">
		<h3>Stream : <?php echo $class; ?> &nbsp;&nbsp;&nbsp;&nbsp;  Semester : <?php echo $semester; ?></h3>
		</div>
				
				
			
		Search By Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="search_box" id="search" value="Enter Name" class="my_inp_form" />
		&nbsp;&nbsp;&nbsp;&nbsp;			
		Search By PR Number
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="search_box" id="pr" value="Enter PR Number" class="my_inp_form" />
		&nbsp;&nbsp;&nbsp;&nbsp;			
		Search By Seat Number
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="search_box" id="seat" value="Enter Seat Number" class="my_inp_form"/>
		&nbsp;&nbsp;&nbsp;&nbsp;			
		<input type="button" value="Back" id="back" class="my_button_submit" />
		&nbsp;&nbsp;&nbsp;&nbsp;			
		<div id="searchdata"></div>
		<?php echo form_close(); ?>
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
	
		
		<div id="subject_structure"></div>
	</div>		
</div>	

<?php include_once('foot.php'); ?>
	
<script type="text/javascript">

	$('#back').click(function(){
		window.location='<?php echo base_url(); ?>index.php/home/editStudent';
	});
	
	$('#search').click(function(){
		$(this).val("");
		$('#pr').val("Enter PR Number");
		$('#seat').val("Enter Seat Number");
	});
	
	$('#pr').click(function(){
		$(this).val("");
		$('#seat').val("Enter Seat Number");
		$('#search').val("Enter Name");
	});
	
	$('#seat').click(function(){
		$(this).val("");
		$('#search').val("Enter Name");
		$('#pr').val("Enter PR Number");
	});
	
	$('#search').keyup(function(){
		if($('#search').val() == ""){	
		}
		else if(!isNaN($('#search').val())){
			alert('Dont enter number');
			$(this).val("");
			return false;
		}
		
		
		var url='<?php echo base_url()."/index.php/home/searchBox"; ?>';
		$.post(url,{funct:'name',searchdata:$('#search').val(),stream:$('#stream03').val(),sem:$('#sem03').val(),tbl:$('#tbl_name_id').val()},function(data){
			$('#searchdata').html(data);
		});
	});
	
	$('#pr').keyup(function(){
		if($('#pr').val() == ""){	
		}
		else if(isNaN($('#pr').val())){
			alert('Dont\'t Enter Character');
			$(this).val("");
		}
		
		var url='<?php echo base_url()."/index.php/home/searchBox"; ?>';
		$.post(url,{funct:'pr_number',searchdata:$('#pr').val(),stream:$('#stream03').val(),sem:$('#sem03').val(),tbl:$('#tbl_name_id').val()},function(data){
			$('#searchdata').html(data);
		});
	});
	
	
	$('#seat').keyup(function(){
		if($('#seat').val() == ""){	
		}
		else if(isNaN($('#seat').val())){
			alert('Dont\'t Enter Character');
			$(this).val("");
		}
		
		var url='<?php echo base_url()."/index.php/home/searchBox"; ?>';
		$.post(url,{funct:'seat_number',searchdata:$('#seat').val(),stream:$('#stream03').val(),sem:$('#sem03').val(),tbl:$('#tbl_name_id').val()},function(data){
			$('#searchdata').html(data);
		});
	});
</script>		