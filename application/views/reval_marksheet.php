<?php include_once('head.php'); ?>


<?php

	$max_agg_marks=0;
	
	foreach($mark_structures as $row){
		$sub_id[]=$row->sub_id;
		$semester[]=$row->semester;
		$sub_name[]=$row->sub_name;
		$internal_marks[]=$row->internal_marks;
		$semester_marks[]=$row->semester_marks;
		$practical_marks[]=$row->practical_marks;
		$minimum_theory_marks[]=$row->minimum_theory;
		$minimum_practical_marks[]=$row->min_practical;
		$subject_total_marks[]=$row->total;
		$max_agg_marks=$max_agg_marks+$row->total;
	}

	if(isset($stud_marks)){
		foreach($stud_marks as $row){
			if(!empty($row)){
					$internal_scored[]=$row->internal;
					$theory_scored[]=$row->theory;
					$practicle_scored[]=$row->practicle;
					if($row->practicle != -1){
							$total_scored[]=$row->internal+$row->theory+$row->practicle;
					}else{
						$total_scored[]=$row->internal+$row->theory;
					}	
			}
		}
	}
	
	foreach($grace_detail as $row){
		$gen_grace=$row->gen_grace_alloc;
		$entitlement_grace=$row->entitlement_grace_alloc;
		$sports_grace=$row->sports_grace_alloc;
		
		$gen_grace_remain=$row->gen_grace_remain;
		$entitlement_grace_remain=$row->entitlement_grace_remain;
		$sports_grace_remain=$row->sports_grace_remain;
		
	}
?>


		<?php echo form_open('reval_grace_controller/each_sub_marks'); ?>
		<div id="page-content-wrapper">
			<div align="center" id="dashboard-buttons">
			Student Name <input type="text" value="<?php echo $student_name; ?>" readonly="readonly" />
			PR Number  <input type="text" value="<?php echo $register_number ?>" readonly="readonly" />
			<input type="hidden" value="<?php echo $sports_grace; ?>" name="sports_grace" />
			<input type="hidden" value="<?php echo $entitlement_grace; ?>" name="entitlement_grace" />
			<input type="hidden" value="<?php echo count($mark_structures); ?>" name="sub_counter" />
			<input type="hidden" value="<?php echo $sub_tbl; ?>" name="stu_sub_tbl" />
			<input type="hidden" value="<?php echo $up_tbl; ?>" name="up_tbl" />
			
			
			<input type="hidden" value="<?php echo $gen_grace_remain; ?>" name="gen_grace_remain" />
	<input type="hidden" value="<?php echo $entitlement_grace_remain; ?>" name="entitlement_grace_remain" />
			<input type="hidden" value="<?php echo $sports_grace_remain; ?>" name="sports_grace_remain" />
			<input type="hidden" value="<?php echo $option; ?>" name="option" />
			<input type="hidden" value="<?php echo $old_grace; ?>" name="old_grace" />
			
			<input type="hidden" name="seat_number" value="<?php echo $latest_seat_number; ?>"/>
			<input type="hidden" name="attempt_no" value="<?php echo $no_of_attempt; ?>"/>
			<!--
			NSS/NCC <?php echo form_checkbox('nss','1'); ?>
			Sports <?php echo form_checkbox('Sports','1'); ?>
			Category <?php echo form_dropdown('sports_category',$category); ?>
			Rewards <?php echo form_dropdown('sports_result',$category_marks); ?>
			-->
			
			<input name="uName" type="hidden" value="<?php echo $student_name; ?>" />
			<input name="regNumber" type="hidden" value="<?php echo $register_number ?>" />
			<input name="aggregate_marks" type="hidden" value="<?php echo $max_agg_marks; ?>" />
			<input name="tbl_marks" type="hidden" value="<?php echo $marks_tbl; ?>" />
			<input type="hidden" value="<?php echo $revaluation ?>" name="reval_tbl_name" />		
			<table>
					<col width="130">
	  				<col width="130">	
					<col width="130">
	  				<col width="130">
					<col width="130">
	  				<col width="130">
				<tr>
					<td>Sr.No</td>
					<td>Subject</td>
					<td></td>
					<td>Max Marks</td>
					<td>Min Marks</td>
					<td>Marks Obtained</td>
				</tr>
				<?php for($i=0;$i<count($mark_structures);$i++){ ?>
		<input name="<?php echo "sub".$i; ?>" type="hidden" value="<?php echo $sub_id[$i]; ?>" />
		<input name="<?php echo "min_theory".$i; ?>" type="hidden" value="<?php echo $minimum_theory_marks[$i]; ?>" />
		<input name="<?php echo "min_pract".$i; ?>" type="hidden" value="<?php echo $minimum_practical_marks[$i]; ?>" />
		<input name="<?php echo "total".$i; ?>" type="hidden" value="<?php echo $subject_total_marks[$i]; ?>" />
		
		<input name="<?php echo "internal_passing".$i; ?>" type="hidden" value="<?php echo $internal_marks[$i]; ?>" />
		<input name="<?php echo "theory_passing".$i; ?>" type="hidden" value="<?php echo $semester_marks[$i]; ?>" />
		<?php if($practical_marks[$i] == -1) { ?>
		<input name="<?php echo "practicle_passing".$i; ?>" type="hidden" value="<?php echo 0; ?>" />
		<?php }else {  ?>
		<input name="<?php echo "practicle_passing".$i; ?>" type="hidden" value="<?php echo $practical_marks[$i]; ?>" />
		<?php } ?>
		
			
				<tr>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $sub_name[$i]; ?></td>
					<td>ISA</td>
					<td><?php echo $internal_marks[$i]; ?></td>
					<td>N.A</td>
					<td><input id="text1<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."internal"; ?>"   onchange="modifyText<?php echo $i; ?>();" value="<?php if(isset($internal_scored[$i])){ echo $internal_scored[$i]; } ?>" class="required" /></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td>SEE</td>
					<td><?php echo $semester_marks[$i]; ?></td>
					<td>N.A</td>
					<td><input id="text2<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."theory"; ?>"        onchange="modifyText<?php echo $i; ?>();" value="<?php if(isset($theory_scored[$i])){ echo $theory_scored[$i]; } ?>" /></td>
				</tr>
				
				<?php if($practical_marks[$i] != -1) { ?>
				<tr>
					<td></td>
					<td></td>
					<td>Practical</td>
					<td><?php echo $practical_marks[$i]; ?></td>
					<td>10</td>
					<td><input id="text3<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."practicle"; ?>"     onchange="modifyText<?php echo $i; ?>();" value="<?php if(isset($practicle_scored[$i])){ echo $practicle_scored[$i]; } ?>" /></td>
				</tr>
				<?php } ?>
				
				<?php if($practical_marks[$i] == -1){ ?>
<input id="text3<?php echo $i; ?>" type="hidden" value="-1" name="<?php echo "subject".$i."practicle"; ?>" onchange="modifyText<?php echo $i; ?>();" />
				<?php } ?>
				
				<tr>
					<td></td>
					<td></td>
					<td>Total</td>
					<td><?php echo $subject_total_marks[$i]; ?></td>
					<td><?php ?></td>
					<td><input id="text4<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."total"; ?>" readonly="readonly" value="<?php if(isset($total_scored[$i])) {  echo $total_scored[$i]; } ?>" /></td>
				</tr>
				<?php } ?>
			</table>
			<?php echo form_submit('submit','Calculate'); ?>
			<div class="clear"></div>
		</div>
		
		<?php echo form_close(); ?>
<?php include_once('foot.php'); ?>
			


<script type="text/javascript">
	//Internal Marks
	<?php for($k=0;$k<count($mark_structures);$k++){ ?>
		$('#text1'+<?php echo $k; ?>).change(function(){
			var check=$('#text1'+<?php echo $k; ?>).val();
			if(check > <?php echo $internal_marks[$k]; ?>){
				alert('U cant enter more than Internal marks');
				$(this).val('<?php echo $internal_scored[$k]; ?>');
				$('#text4'+<?php echo $k; ?>).val('<?php echo $total_scored[$k]; ?>');
				$('#text2'+<?php echo $k; ?>).val('<?php echo $theory_scored[$k]; ?>');
				$('#text3'+<?php echo $k; ?>).val('<?php echo $practicle_scored[$k]; ?>');
			}
			
			if(isNaN(check)){
				alert('dont enter character');
				$(this).val('<?php echo $internal_scored[$k]; ?>');
				$('#text4'+<?php echo $k; ?>).val('<?php echo $total_scored[$k]; ?>');
				$('#text2'+<?php echo $k; ?>).val('<?php echo $theory_scored[$k]; ?>');
				$('#text3'+<?php echo $k; ?>).val('<?php echo $practicle_scored[$k]; ?>');
			}
		});
	
	
	//Semester Marks
		$('#text2'+<?php echo $k; ?>).change(function(){
			var check=$('#text2'+<?php echo $k; ?>).val();
			if(check > <?php echo $semester_marks[$k]; ?>){
				alert('U cant enter more than Semester marks');
				$(this).val('<?php echo $theory_scored[$k]; ?>');
				$('#text4'+<?php echo $k; ?>).val('<?php echo $total_scored[$k]; ?>');
				$('#text1'+<?php echo $k; ?>).val('<?php echo $internal_scored[$k]; ?>');
				$('#text3'+<?php echo $k; ?>).val('<?php echo $practicle_scored[$k]; ?>');
			}
			
			if(isNaN(check)){
				alert('dont enter character');
				$(this).val('<?php echo $theory_scored[$k]; ?>');
				$('#text4'+<?php echo $k; ?>).val('<?php echo $total_scored[$k]; ?>');
				$('#text1'+<?php echo $k; ?>).val('<?php echo $internal_scored[$k]; ?>');
				$('#text3'+<?php echo $k; ?>).val('<?php echo $practicle_scored[$k]; ?>');
			}
		});
		
	//Practical Marks
		$('#text3'+<?php echo $k; ?>).change(function(){
			var check=$('#text3'+<?php echo $k; ?>).val();
			if(check > <?php echo $practical_marks[$k]; ?>){
				alert('U cant enter more than practical marks');
				$(this).val('<?php echo $practicle_scored[$k]; ?>');
				$('#text4'+<?php echo $k; ?>).val('<?php echo $total_scored[$k]; ?>');
				$('#text1'+<?php echo $k; ?>).val('<?php echo $internal_scored[$k]; ?>');
				$('#text2'+<?php echo $k; ?>).val('<?php echo $theory_scored[$k]; ?>');
			}
			
			if(isNaN(check)){
				alert('dont enter character');
				$(this).val('<?php echo $practicle_scored[$k]; ?>');
				$('#text4'+<?php echo $k; ?>).val('<?php echo $total_scored[$k]; ?>');
				$('#text1'+<?php echo $k; ?>).val('<?php echo $internal_scored[$k]; ?>');
				$('#text2'+<?php echo $k; ?>).val('<?php echo $theory_scored[$k]; ?>');
			}
		});
	<?php } ?>
</script>