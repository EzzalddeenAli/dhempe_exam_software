<?php include_once('head.php'); ?>


<?php if(isset($flagset)){ ?>
	<script type="text/javascript">
		alert("Added Sucessfully");
	</script>
<?php } ?>

<?php
	$stream=array(
		"ba_student_detail_"=>"BA",
		"bsc_student_detail_"=>"B.S.C.",
		"bsc_cmp_sci_student_detail_"=>"B.S.C.(C.S)"
	);
	
	$semester=array(
		"sem_1"=>"Sem 1",
		"sem_2"=>"Sem 2",
		"sem_3"=>"Sem 3",
		"sem_4"=>"Sem 4",
	);
	$namePage='Print Supplemantary Marksheets';
	if($type == 'now_eligible')
		$namePage='Newly Eligible Supplemantary Students Print Markheet';
?>

<div class="content">
	 <div class="gadget">
		 <div class="titlebar vertsortable_head">
           		<h3 align="center"><?php echo $namePage;?></h3>
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
		<?php 
		$typeSubmit='';// for all
		
		if($type == 'now_eligible')
			$typeSubmit='now_eligible';
		$form_id=array('id'=>'myForm','target'=>'_blank'); ?>
		<?php echo form_open('supplementary_marksheets/generate_marksheets/'.$typeSubmit,$form_id); $js ='class="my_select"'; $j ='class="my_button_submit"';?>
			<h4>
				Stream &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_dropdown('stream',$stream,'',$js);?>     
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  form_dropdown('semester',$semester,'',$js) ?> 	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo form_submit('submit','Generate',$j); ?>
			</h4>	
			
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
			</div>
			<div id="subject_structure">
			</div>
	</div>
</div>	
<?php include_once('foot.php'); ?>
			