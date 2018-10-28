<?php include_once('head.php'); ?>


<?php if(isset($flag)){ ?>
	<?php if($flag == 1){ ?>
	
		<script type="text/javascript">
			alert('Sucessfully Calculated');
		</script>
	<?php }else { ?>
	
		<script type="text/javascript">
			alert('Data is Missing');
		</script>
	<?php } ?>
	
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
?>

<div class="content">
	 	<div class="gadget">
          	 <div class="page-heading" align="center">
           		<h3>Calculate Marks</h3>
         	</div>
			<div style="padding-top:100px;">

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
		<?php $form_id=array('id'=>'myForm'); $js ='class="my_select"'; ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo form_open('grace_controller2/each_sub_marks',$form_id); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
		Stream&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_dropdown('stream',$stream,$js,$js);?>     <?php //echo br(2); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
		Semester&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  form_dropdown('semester',$semester,$js,$js) ?> 	<?php //echo br(2); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
		<?php $j="class='my_button_submit'"; echo form_submit('submit','Calculate',$j,$j); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
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
		<div id="subject_structure"></div>
			<div class="clear"></div>
		</div>
	</div>	
<?php include_once('foot.php'); ?>
