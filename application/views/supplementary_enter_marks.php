<?php include_once('head.php'); ?>



<?php if(isset($result)){ ?>
	<script type="text/javascript">
		alert('Reval Marks Successfully Calculated');
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
	
	
	$js ='class="my_select"';
?>

<div class="content">
	 	<div class="gadget">
          	<div class="titlebar vertsortable_head">
           		<h3 align="center">Reval / Supplementary </h3>
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
			<?php echo form_open('suppleController/getPr_enter_marks',$form_id); ?>
					
			Stream<?php echo form_dropdown('stream',$stream,'',$js);?>    
						
			Semester<?php echo  form_dropdown('semester',$semester,'',$js) ?> 	
							
			<?php echo form_submit('submit','GET PR','class="my_button_submit"'); ?>
							
			<?php echo form_close(); ?>
			
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
			<div class="clear"></div>
		</div>
</div>	
<?php include_once('foot.php'); ?>
			