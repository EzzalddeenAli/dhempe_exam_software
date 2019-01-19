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

?>


<div class="content">
	 <div class="gadget">
          <div class="titlebar vertsortable_head">
           		<h3 align="center">Data Entry ISA Checklist</h3>
          </div>	
		   <div style="padding-top:100px;">
			<?php $form_id=array('id'=>'myForm', 'target'=>'_blank'); ?>
			<?php echo form_open('final_marksheet/displayStudentISA',$form_id); ?>
				
			Stream&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_dropdown('stream',$stream);?>     <?php //echo br(2); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
			Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  form_dropdown('semester',$semester) ?> 	<?php //echo br(2); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			<?php echo form_submit('submit','Generate'); ?>
					
			<?php echo form_close(); ?>
			<div class="clear"></div>
			</div>
	</div>	
</div>
<?php include('foot.php'); ?>
	
