<?php include_once('head.php'); ?>


<?php if(isset($flag)){ ?>
	<script type="text/javascript">
		alert('Marksheets are generated Sucessfully');
	</script>
<?php } ?>

<?php
	$stream=array(
		"ba_student_detail_"=>"BA",
		"bsc_student_detail_"=>"B.S.C.",
		"bsc_cmp_sci_student_detail_"=>"B.S.C (C.S)",
		/*"bcom_student_detail_"=>"B.COM"
		"bsc_biotech_student_detail_"=>"B.S.C.(Bio Technology)"*/
	);
	
	$semester=array(
		"sem_1"=>"Sem 1",
		"sem_2"=>"Sem 2",
		"sem_3"=>"Sem 3",
		"sem_4"=>"Sem 4",
	);
	
	
	$option=array(
		"1"=>"Final-Marksheet",
		//,"2"=>"Reval-Marksheet",
		//"3"=>"Supplementary-Marksheet"
		"4"=>"Head Count",
		"5"=>"Filtered Final-Marksheet"
	);
	
	$js ='class="my_select"';
	$namePage='Print Markheet';
	if($type == 'now_eligible')
		$namePage='Newly Eligible Fresh Students Print Markheet';
?>


<div class="content">
	<div class="gadget">
		<div class="titlebar vertsortable_head">
           		<h3 align="center"><?php echo $namePage;?></h3>
    	</div>
	</div>
	
	<?php 
	$typeSubmit='';// for all
		
		if($type == 'now_eligible')
			$typeSubmit='now_eligible';
	$form_id=array('id'=>'myForm','target'=>'_blank'); ?>
	<?php echo form_open('final_marksheet/generate_marksheet_new/'.$typeSubmit,$form_id); ?>
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

   <!-- 
	Academic Year &nbsp;&nbsp;<select name="year" class="my_select">
	<option value=2012>2012</option>
	<option value=2013 selected>2013</option>
	<!--<option value=2014>2014</option>
	<option value=2015>2015</option>
	
	</select>-->
			
	&nbsp;&nbsp;&nbsp;&nbsp;Stream&nbsp;&nbsp;<?php $j ='class="my_button_submit"'; echo form_dropdown('stream',$stream,'',$js);?>  
	
	&nbsp;&nbsp;&nbsp;&nbsp;Semester&nbsp;&nbsp;<?php echo  form_dropdown('semester',$semester,'',$js) ?> 	<?php //echo br(2); ?>
					
	<?php echo form_dropdown('select_option',$option,'',$js); ?>
					
	<?php echo form_submit('submit','Generate',$j); ?>
					
	<?php echo form_close(); ?>
		
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
<?php include('foot.php'); ?></div>
	
