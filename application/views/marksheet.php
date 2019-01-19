<?php include_once('head.php'); ?>


<?php
	$category=array(
                    "A" => "A",
                    "B" => "B",
                    "C" => "C",
                    "D1" => "D1",
                    "D2" => "D2",
                    "E" => "E"
    );
    
    $category_marks=array(
                        "participation" => "participation",
                        "winner" => "winner/Gold",
                        "runners_up" => "Runners up/Silver",
                        "semi_finalist" => "Semi Finalist/Bronze"
    );
	
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
	
	foreach($grace_detail as $row){
		$gen_grace=$row->gen_grace_alloc;
		$entitlement_grace=$row->entitlement_grace_alloc;
		$sports_grace=$row->sports_grace_alloc;
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
	
?>

		<?php echo form_open('grace_controller/each_sub_marks'); ?>
		<div id="page-content-wrapper">
			<div align="center" id="dashboard-buttons">
			Student Name <input type="text" value="<?php echo $student_name; ?>" readonly="readonly" />
			PR Number  <input type="text" value="<?php echo $register_number ?>" readonly="readonly" />
			
			<input type="hidden" value="<?php echo $sports_grace; ?>" name="sports_grace" />
			<input type="hidden" value="<?php echo $entitlement_grace; ?>" name="entitlement_grace" />
			<input type="hidden" value="<?php echo count($mark_structures); ?>" name="sub_counter" />
			<input type="hidden" value="<?php echo $final_up_tbl; ?>" name="upd_stud_tbl" />
			
			
			<input id="change" type="button" value="Change Priority" />
			<input id="done" type="button" value="Save" style="display:none;" />
			
			<input name="uName" type="hidden" value="<?php echo $student_name; ?>" />
			<input name="regNumber" type="hidden" value="<?php echo $register_number ?>" />
			<input name="aggregate_marks" type="hidden" value="<?php echo $max_agg_marks; ?>" />
			<input name="tbl_marks" type="hidden" value="<?php echo $marks_tbl; ?>" />
			<input name="counter" type="hidden" value="<?php echo count($mark_structures); ?>" />
			
			<div id="priority" style="display: none">
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
						<td>Priority</td>
					</tr>
					<?php for($j=0;$j<count($mark_structures);$j++){ ?>
						<tr>
							<td><?php echo $j+1; ?></td>
							<td><?php echo $sub_name[$j]; ?></td>
							<td><input type="text" value="<?php echo $j; ?>" name="<?php echo "priority".$j; ?>"
							 id="<?php echo "priority".$j; ?>" /></td>
						</tr>			
					<?php } ?>
				</table>		
			</div>
			
			
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
					<td><input id="text1<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."internal"; ?>"  value="<?php if(isset($internal_scored[$i])) { echo $internal_scored[$i]; } ?>"     onchange="modifyText<?php echo $i; ?>();" class="required" /></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td>SEE</td>
					<td><?php echo $semester_marks[$i]; ?></td>
					<td>N.A</td>
					<td><input id="text2<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."theory"; ?>"  value="<?php if(isset($theory_scored[$i])) {  echo $theory_scored[$i]; } ?>"        onchange="modifyText<?php echo $i; ?>();" /></td>
				</tr>
				
				<?php if($practical_marks[$i] != -1) { ?>
				<tr>
					<td></td>
					<td></td>
					<td>Practical</td>
					<td><?php echo $practical_marks[$i]; ?></td>
					<td>10</td>
					<td><input id="text3<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."practicle"; ?>" value="<?php if(isset($practicle_scored[$i])) { echo $practicle_scored[$i]; } ?>"     onchange="modifyText<?php echo $i; ?>();" /></td>
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
					<td><input id="text4<?php echo $i; ?>" type="text" name="<?php echo "subject".$i."total"; ?>" readonly="readonly" value="<?php if(isset($total_scored[$i])) { echo $total_scored[$i]; } ?>" /></td>
				</tr>
				<?php } ?>
			</table>
			<?php //echo form_submit('submit','Calculate'); ?>
			<input type="submit" value="Calculate" id="p" />
			<div class="clear"></div>
		</div>
		
		<?php echo form_close(); ?>
<?php include_once('foot.php'); ?>


<script type="text/javascript">
	//priority checking 
	<?php for($j=0;$j<count($mark_structures);$j++){ ?>
		$('#priority'+<?php echo $j; ?>).change(function(){
			var value1=$('#priority'+<?php echo $j; ?>).val();
			if(  value1 > <?php echo count($mark_structures)-1; ?>){
				alert('Priority should be less than '+<?php echo count($mark_structures); ?>);
				$('#priority'+<?php echo $j; ?>).val('');
			}
		});
	<?php } ?>
	
	
	$(':submit').click(function(){
		var myPriority = new Array();
		var l;
		
		<?php for($l=0;$l<count($mark_structures);$l++){ ?>
			myPriority[<?php echo $l; ?>] = $('#priority'+<?php echo $l; ?>).val();	
		<?php } ?>
		
		<?php for($k=0;$k<count($mark_structures)-1;$k++){  ?>
				<?php for($l=$k+1;$l<count($mark_structures);$l++){ ?>
					if(myPriority[<?php echo $k; ?>] == myPriority[<?php echo $l; ?>] ){
						alert('Remove Duplicates From priority');
						return false;
					}
				<?php } ?>
		<?php } ?>
	});
	
</script>

<script type="text/javascript">

	$('#p').click(function(){
		<?php for($k=0;$k<count($mark_structures);$k++){ ?>
			var c=$('#text1'+<?php echo $k; ?>).val();
			if(c == ""){
				alert('Enter Marks');
				return false;
			}
			
			var c1=$('#text2'+<?php echo $k; ?>).val();
			if(c1 == ""){
				alert('Enter Marks');
				return false;
			}
			
			var c13=$('#text3'+<?php echo $k; ?>).val();
			if(c1 == ""){
				alert('Enter Marks');
				return false;
			}
			
		<?php } ?>
	});
</script>

<script type="text/javascript">
	<?php for($k=0;$k<count($mark_structures);$k++){ ?>
		$('#text1'+<?php echo $k; ?>).change(function(){
			var check=$('#text1'+<?php echo $k; ?>).val();
			if(check > <?php echo $internal_marks[$k]; ?>){
				alert('U cant enter more than Maximum Internal marks');
				$('#text1'+<?php echo $k; ?>).val("");
			}
			if(isNaN(check)){
				alert('dont enter character');
				$('#text1'+<?php echo $k; ?>).val("");
			}
			if(check == ""){
				alert('Enter Marks');
				$('#text1'+<?php echo $k; ?>).val("");
				return false;
			}
			
		});
		
		$('#text2'+<?php echo $k; ?>).change(function(){
			var check=$('#text2'+<?php echo $k; ?>).val();
			if(check > <?php echo $semester_marks[$k]; ?>){
				alert('U cant enter more than Maximum semester marks');
				$('#text2'+<?php echo $k; ?>).val("");
			}
			if(isNaN(check)){
				alert('dont enter character');
				$('#text2'+<?php echo $k; ?>).val("");
			}
			if(check == ""){
				alert('Enter Marks');
				$('#text2'+<?php echo $k; ?>).val("");
				return false;
			}
		});
		
		<?php if($practical_marks[$k] != -1){ ?>
			$('#text3'+<?php echo $k; ?>).change(function(){
				var check=$('#text3'+<?php echo $k; ?>).val();
				if(check > <?php echo $practical_marks[$k]; ?>){
					alert('U cant enter more than Maximum Practical marks');
					$('#text3'+<?php echo $k; ?>).val("");
				}
				if(isNaN(check)){
					alert('dont enter character');
					$('#text3'+<?php echo $k; ?>).val("");
				}
				if(check == ""){
					alert('Enter Marks');
					$('#text3'+<?php echo $k; ?>).val("");
					return false;
				}
			});
		<?php } ?>
		
	<?php } ?>
</script>

<script type="text/javascript">
	$('#change').click(function(){
		$('#priority').css('display','');
		$('#change').hide();
		$('#done').show();
	});
	
	$('#done').click(function(){
		$('#change').show();
		$('#done').css('display','none');
		$('#priority').css('display','none');
	});
</script>


