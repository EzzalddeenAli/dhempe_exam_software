<?php include_once('head.php'); ?>

<?php

	$stream=array(
		"ba_sub_"=>"BA",
		"bsc_sub_"=>"B.S.C.",
		"bsc_cmp_sci_sub_"=>"B.S.C (C.S)",
		/*"bcom_sub_"=>"B.COM"
		"bsc_biotech_sub_"=>"B.S.C.(Bio Technology)"*/
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
          <div class="page-heading">
           		<h3>Data entry</h3>
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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">									
		  	


			<div style="padding-top:100px;">	
			<?php $form_id=array('id'=>'myForm'); ?>
			<?php echo form_open('home/getSubject',$form_id); $js ='class="my_select"';?>
				
			Stream&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_dropdown('stream',$stream,$js,$js);?>     <?php //echo br(2); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  form_dropdown('semester',$semester,$js,$js) ?> 	<?php //echo br(2); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			<?php $j="class='my_button_submit'"; echo form_submit('submit','Get Subject',$j,$j);
			
					?>
					
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