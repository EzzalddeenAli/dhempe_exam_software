<?php include_once('head.php'); ?>

<div class="content">
	 <div class="gadget">
		<div class="titlebar vertsortable_head">
           		<h3 align="center">Student Details</h3>
        </div>
		
		<?php $form_id=array('id'=>'myForm'); ?>
		<?php echo form_open('home/saveToBlockDetails',$form_id);
		$js ='class="my_select"';
		$j="class='my_button_submit'";

		?>
			<?php if(!empty($student_details)){ ?>
				<table class="main_table" border=1 width=100%;> <thead><tr >
					<th class="table-header-repeat line-left minwidth-2">PR Number</th>
					<th class="table-header-repeat line-left minwidth-1">Seat Number</th>
					<th class="table-header-repeat line-left minwidth-2">Name</th>
					<th class="table-header-repeat line-left minwidth-2">Type</th>
					<th class="table-header-repeat line-left minwidth-2">Blocked</th>
					
					
					
					</tr>

					<?php 
					$i=0;
					foreach($student_details as $row){ 
					$nowEligibleChecked=" " ;
					$type="Fresh";
					if($row['supplementary'] == 1)
						$type="Supplementary";
					
					?>				
					<tr>
						<td><?php echo '<input type="hidden"  name="pr_number_'.$i.'" value="'.$row['pr_number'].'" /><input type="hidden"  name="supplementary_'.$i.'" value="'.$row['supplementary'].'" />'.$row['pr_number']; ?></td>
						<td><?php echo $row['seat_number']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $type; ?></td>
						<td><?php echo '<input type="checkbox"  name="blocked_'.$i.'"  />'; ?></td>
						
						
					</tr>
					<?php $i++;} ?>
				</table>
				<h4>
				
				<div style="clear:both;">
			<input style="margin-top:20px;" id="p" type="submit" value="Save"  class="my_button_submit" />
						<input id="back" type="reset" value="Reset" class="my_button_submit" />
						<input type="button" value="Back" id="previous_page" class="my_button_submit" />
					</div>
					<br />
			</h4>	
			
			<?php echo '<input type="hidden" name="number_of_students" value="'.sizeof($student_details).'"/><input type="hidden" name="table" value="'.$table.'"/>'; echo form_close(); ?>
			<?php 
			
			}else { ?>
			<table border="0" style="border-collapse:collapse; margin-left:50px;">
					<tr><td>No Student Found</td></tr>
			</table>
			<?php } ?>
	</div>
</div>	
<?php include_once('foot.php'); ?>
<script type="text/javascript">

	$('#previous_page').click(function(){
		window.location='<?php echo base_url(); ?>index.php/home/blockedStudents';
	});
	function checkBlock(element,index){
		if($(element).is(':checked')){
			$('#now_eligible_'+index).show();
		}
		else{
			//.prop('checked',false);
			$('#now_eligible_'+index).attr("checked", false);
			$('#now_eligible_'+index).hide();
		}
		
	}
</script>			