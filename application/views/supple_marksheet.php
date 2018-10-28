<?php include_once('head.php'); ?>

<?php


?>

<head>


<script type="text/ecmascript">
/*	function markABS(id){
		alert(id);
		alert(substr(id,0,1));
		return false;
	}
*/
</script>


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

<script type="text/javascript">

	function add(id){
		var isa   = $('#I'+id).val();
		var see   = $('#S'+id).val();
		var pract = $('#P'+id).val();
		
if(((isNaN(parseInt(isa)) || (isNaN(isa))) && isa!="")||isa<0)
		{
		alert('Please Enter only Positive numbers');
		$('#I'+id).val("");
		
		}
		
		if((Number(isa) > Number($('#isa_pass'+id).val())) && isa!="A" )
		{
		alert('ISA Marks cannot be greater than Maximum ISA Marks('+$('#isa_pass'+id).val()+')');
		$('#I'+id).val("");
		
		}
		if((isNaN(parseInt(see)) && see!="")||see<0)
		{
		alert('Please Enter only Positive numbers');
		$('#S'+id).val("");
		
		}
		
		if(Number(see)> Number($('#see_pass'+id).val()) && see!="A" )
		{
		alert('SEE Marks cannot be greater than Maximum SEE Marks('+$('#see_pass'+id).val()+')');
		$('#S'+id).val("");
		
		}
		if((isNaN(parseInt(pract)) && pract!="" && pract!="N.A.")||pract<0)
		{
		alert('Please Enter only Positive numbers');
		$('#P'+id).val("");
		
		}
		if(Number(pract)> Number($('#pra_pass'+id).val()) && pract!="N.A.")
		{
		alert('Practical Marks cannot be greater than Maximum Practical Marks('+$('#pra_pass'+id).val()+')');
		$('#P'+id).val("");
		
		}
		var isa   = $('#I'+id).val();
		var see   = $('#S'+id).val();
		var pract = $('#P'+id).val();
		if(isa == 'A')
			i = 0;
		else
			i = parseInt($('#I'+id).val());
		if(see == 'A')
			s  = 0;
		else 
			s = parseInt($('#S'+id).val());
		if((pract == 'A')||(pract == "N.A."))
			p = 0;	
		else
			p = parseInt($('#P'+id).val());		
		//var total = i+s+p;
		var total = i+s;
		
		$('#t'+id).val(total);
	}
	
	function markABS(id){
		if($('#'+id).val() == 'A')
			$('#'+id).val("");
		else	
			$('#'+id).val('A');
		var sub_id = id.slice(1);	// remove 1st char
		var isa   = $('#I'+sub_id).val();
		var see   = $('#S'+sub_id).val();
		var pract = $('#P'+sub_id).val();
		if(isa == 'A' ||isa == '')
			i = 0;
		else
			i = parseInt($('#I'+sub_id).val());
		if(see == 'A' ||see == '')
			s  = 0;
		else 
			s = parseInt($('#S'+sub_id).val());
		if((pract == 'A')||(pract == "N.A.")||pract == '')
			p = 0;	
		else
			p = parseInt($('#P'+sub_id).val());		
		//var total = i+s+p;
		var total = i+s;
		$('#t'+sub_id).val(total);
		return false
	}
</script>


</head>
<body>
	
		<div align="center" id="dashboard-buttons">
			<?php echo form_open('supple_grace_controller/each_sub_marks'); ?>
				<br />
					<br />
					<br />
					<br />
					<b>PR Number: <?php echo $pr_number; ?></b>
					<br />
					<br />
				<?php if(sizeof($subject_structure)==0)
				{echo '<tr><b>No Failed Records Found</b></tr><br />';
				echo "<input type='button' value='Back' class='my_button_submit' onclick='window.history.back()'/>;"; ?>
			<?php form_close(); 
				}
				else
				{
				
				?>	
			<table class="main_table" border=1 width=100%; style="border: none;"> <thead><tr >
					<th class="table-header-repeat line-left minwidth-2">Subject Name</th>
				<th class="table-header-repeat line-left minwidth-2">I.S.A.</th>
				<th class="table-header-repeat line-left minwidth-2">S.E.E.</th>
				<th class="table-header-repeat line-left minwidth-2">Practicle</th>
				<th class="table-header-repeat line-left minwidth-2">Total</th>
			
					<td style="border:none;"></td>
					<td  style="border:none;"></td>
					<td  style="border:none;"></td>
				</tr>
				<?php $s=0; ?>
				<?php 
				
				
				foreach($subject_structure as $subj_details){ ?>
					<?php
						foreach($marks as $row)
						{
							if($row->sub_id == $subj_details->sub_id )
							{
								$total =0;
								
								if($row->isa_abs == 'A'){
									$isa = "A";
									$total += 0;
								}	
								else{
									$isa = $row->internal;
									$total += $row->internal;
								}
								if($row->see_abs == 'A'){
									$see = "A";
									$total += 0;
								}
								else{
									$see = $row->theory;
									$total += $row->theory;
								}
									
								if(($row->pract_abs == "A")||($row->practicle == -1)){
									$pract ="A";
									$total +=0;
								}
								else{
									$pract = $row->practicle;
									//$total += $row->practicle;
								}
							}
						}
					?>
				<tr>
					<td><?php echo $subj_details->sub_name; ?></td>
					<td><input type="text" id="<?php echo "I".$subj_details->sub_id; ?>" name="<?php echo "isa".$subj_details->sub_id; ?>" value="<?php echo $isa;  ?>" style="padding-left: 10px;width: 50px;" class="my_inp_form" onchange="add('<?php echo $subj_details->sub_id; ?>');" /></td>
					
					<td><input type="text" id="<?php echo "S".$subj_details->sub_id; ?>" name="<?php echo "see".$subj_details->sub_id; ?>" value="<?php echo $see; ?>" style="padding-left: 10px;width: 50px;" class="my_inp_form" onchange="add('<?php echo $subj_details->sub_id; ?>');" /></td>
					
					<?php if($subj_details->practical_marks != -1){ ?>
						<td><input type="text" id="<?php echo "P".$subj_details->sub_id; ?>"  name="<?php echo "pract".$subj_details->sub_id; ?>" style="padding-left: 10px;width: 50px;" class="my_inp_form" value="<?php echo  $pract; ?>" onchange="add('<?php echo $subj_details->sub_id; ?>');"  /></td>
					<?php }else{ ?>
						<td><input type="text" id="<?php echo "P".$subj_details->sub_id; ?>" name="<?php echo "pract".$subj_details->sub_id; ?>" style="padding-left: 10px;width: 50px;" class="my_inp_form" value="<?php echo "N.A."; ?>" readonly="readonly" onchange="add('<?php echo $subj_details->sub_id; ?>');" /></td>
					<?php } ?>
					<td><input type="text" id="<?php echo "t".$subj_details->sub_id; ?>" style="padding-left: 10px;width: 50px;" class="my_inp_form" name="<?php echo "total".$subj_details->sub_id; ?>" value="<?php echo $total; ?>" /></td>

<td  style="border:none;"><a  id="<?php echo "I2".$subj_details->sub_id; ?>" onclick="markABS('<?php echo "I".$subj_details->sub_id; ?>')">I.S.A ABS</a></td>
<td  style="border:none;"><a  id="<?php echo "S2".$subj_details->sub_id; ?>"  onclick="markABS('<?php echo "S".$subj_details->sub_id; ?>')">S.E.E ABS</a></td>
<?php if($subj_details->practical_marks != -1){ ?>
<td  style="border:none;"><a  id="<?php echo "P2".$subj_details->sub_id; ?>"  onclick="markABS('<?php echo "P".$subj_details->sub_id; ?>')">PRACT ABS</a></td>
<?php } ?>
				</tr>
				<input type="hidden" name="subjid[]" value="<?php echo $subj_details->sub_id; ?>" />
				<input type="hidden" name="<?php echo "isa_pass".$subj_details->sub_id; ?>" value="<?php echo $subj_details->internal_marks; ?>"/>
				<input type="hidden" name="<?php echo "see_pass".$subj_details->sub_id; ?>" value="<?php echo $subj_details->semester_marks; ?>"/>
				<input type="hidden" name="<?php echo "pra_pass".$subj_details->sub_id; ?>" value="<?php echo $subj_details->practical_marks; ?>"/>
				
				<input type="hidden" name="<?php echo "min_theory".$subj_details->sub_id; ?>" value="<?php echo $subj_details->minimum_theory ; ?>"/>
				<input type="hidden" name="<?php echo "min_pract".$subj_details->sub_id; ?>" value="<?php echo $subj_details->min_practical; ?>"/>
				
				<input type="hidden" name="<?php echo "min_total".$subj_details->sub_id; ?>" value="<?php echo $subj_details->total; ?>"/>
				<input type="hidden" name="<?php echo "max_agg".$subj_details->sub_id; ?>" value="<?php echo $subj_details->max_agg_marks; ?>"/>
				
				<?php $s++; } ?>
			</table>
			
			
			<input type="hidden" name="pr_number" value="<?php echo $pr_number; ?>"/>
			<input type="hidden" name="seat_number" value="<?php echo $seat_number; ?>"/>
			<input type="hidden" name="no_of_attempt" value="<?php echo $no_of_attempt; ?>"/>
			<input type="hidden" name="stream" value="<?php echo $stream; ?>"/>
			<input type="hidden" name="semester" value="<?php echo $semester; ?>"/>
			
			<?php echo form_submit('submit','Calculate','class="my_button_submit"'); ?>
			<?php form_close(); ?>
			<?php
			}
			?>
		</div>
		
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	</body>
	
<?php include_once('foot.php'); 
?>