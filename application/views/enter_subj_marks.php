<?php include_once('head.php'); ?>

<?php 
	foreach($stud_marks as $row){
		//$dummy_pr_number [] = $row->pr_number;
		if($row->isa_abs == ""){
			$internal_student_marks[$row->pr_number]=$row->internal;
		}else{
			$internal_student_marks[$row->pr_number]="A";
		}
		if($row->see_abs == ""){
			$theory_student_marks[$row->pr_number]=$row->theory;
		}else{
			$theory_student_marks[$row->pr_number]="A";
		}
		if($row->pract_abs == ""){
			$practical[$row->pr_number]=$row->practicle;
		}else{
			$practical[$row->pr_number]="A";
		}
	}
	
	foreach($mark_structure as $row){
		$internal_marks=$row->internal_marks;
		$see_marks=$row->semester_marks;
		$practical_status=$row->practical_marks;
	}
?>

<div class="content">
	 <div class="gadget">
          <div class="titlebar vertsortable_head">
           		<h3 align="center">Enter Marks</h3>
          </div>	
			<?php $counter=count($number); ?>
			<?php $formID=array('id'=>'myForm'); ?>
			<?php echo form_open('home/insertStuDataSubject',$formID); ?>
			
			
			<input type="hidden" name="counter" value="<?php echo $counter; ?>" />
			<input  type="hidden" name="subject_id" value="<?php echo $sub_id; ?>"/>
			<input  type="hidden" name="tbl_marks_enter" value="<?php echo $tbl_marks_enter; ?>"/>
			
			<table class="main_table" border=1 width=100%;> <thead><tr >
				<col width="130">
  				<col width="130">	
				<col width="130">
  				<col width="130">
				<col width="130">
  				<col width="130">
  				<col width="130">
				<tr>
					<th class="table-header-repeat line-left minwidth-2">PR Number</th>
					<th class="table-header-repeat line-left minwidth-2"> Name</th>
					<th class="table-header-repeat line-left minwidth-1">Seat Number</th>
					<th class="table-header-repeat line-left minwidth-1">I.S.A. Marks (Max: <?php echo " ".$internal_marks; ?>)</th>
					<th class="table-header-repeat line-left minwidth-1">S.E.E. Marks (Max: <?php echo " ".$see_marks; ?>)</th>
					<?php if($practical_status != -1){ ?>
					<th class="table-header-repeat line-left minwidth-1">Practical Marks (Max: <?php echo " ".$practical_status; ?>)</th>
					<?php } ?>
					<th class="table-header-repeat line-left minwidth-1">I.S.A. Absent</th>
					<th class="table-header-repeat line-left minwidth-1">S.E.E. Absent</th>
					<?php if($practical_status != -1){ ?>
					<th class="table-header-repeat line-left minwidth-1">Practical Absent</th>
					<?php } ?>
					
					
					
				</tr>
				
				<?php $i=1; ?>
					
				<?php foreach($number as $row){ ?>
				<col width="130">
  				<col width="130">	
  				<col width="130">	
				<col width="130">
  				<col width="130">
				<col width="130">
  				<col width="130">
  				<col width="130">
				<tr>
					<td><?php echo $row->pr_number; ?></td>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->seat_number; ?></td>
				<?php 
				
				/* modified code 22 april 2013 start */
				// if($row->pr_number)
				/* modified code 22 april 2013 ends */
				?>
					<td><input type="text" name="<?php echo "isa".$i; ?>" id="<?php echo "i".$i; ?>" class="required" value="<?php if(isset($internal_student_marks[$row->pr_number])){ echo $internal_student_marks[$row->pr_number]; } ?>" /></td>
					
					
					<td><input type="text" name="<?php echo "see".$i; ?>" id="<?php echo "s".$i; ?>" class="required" value="<?php if(isset($theory_student_marks[$row->pr_number])){ echo $theory_student_marks[$row->pr_number]; } ?>" /></td>
					
					<?php if($practical_status != -1){ ?>
					<td><input type="text" name="<?php echo "pract".$i; ?>" id="<?php echo "p".$i; ?>" class="required" value="<?php if(isset($practical[$row->pr_number])){ echo $practical[$row->pr_number]; } ?>" /></td>
					<?php } else { ?>
					<input type="hidden" name="<?php echo 'pract'.$i; ?>" value="-1" />
					<?php } ?>
					<td id=<?php echo "A".$i; ?>>ISA Absent</td>
					<td id=<?php echo "S".$i; ?>>SEE Absent</td>
					<?php if($practical_status != -1){ ?>
						<td id=<?php echo "P".$i; ?>>PRCT Absent</td>
					<?php  } ?>
				</tr>
				
				
				<input type="hidden" name="<?php echo 'pr_number'.$i; ?>" value="<?php echo $row->pr_number; ?>" />
				<?php $i++; } ?>
			</table>
			
			<?php if($i > 1) { ?>
			<input type="submit" class="my_button_submit" value="ADD" id="p" onchange="return check()" />
			<?php } ?>
			
		<?php echo form_close(); ?>
		</div>
</div>	
<?php include_once('foot.php'); ?>

<script type="text/javascript">


	<?php for($i=1;$i<=count($number);$i++){ ?>
	
		$('#A'+<?php echo $i; ?>).mouseover(function(){
			$('#A'+<?php echo $i; ?>).css( 'cursor', 'pointer' );
		});
		
		
		var flagSet=0;
		$('#A'+<?php echo $i; ?>).click(function(){
			if(flagSet == 0){
				$('#i'+<?php echo $i; ?>).val('A');
				$('#i'+<?php echo $i; ?>).attr('readonly', true);
				flagSet=1;
			}else{
				$('#i'+<?php echo $i; ?>).val('');
				$('#i'+<?php echo $i; ?>).attr('readonly', false);
				flagSet=0;
			}	
		});
	<?php } ?>
	
	<?php for($i=1;$i<=count($number);$i++){ ?>
	
		$('#S'+<?php echo $i; ?>).mouseover(function(){
			$('#S'+<?php echo $i; ?>).css( 'cursor', 'pointer' );
		});
		
		var flagSet1=0;
		$('#S'+<?php echo $i; ?>).click(function(){
			if(flagSet1 == 0){
				$('#s'+<?php echo $i; ?>).val('A');
				$('#s'+<?php echo $i; ?>).attr('readonly', true);
				flagSet1=1;
			}else{
				$('#s'+<?php echo $i; ?>).val('');
				$('#s'+<?php echo $i; ?>).attr('readonly', false);
				flagSet1=0;
			}	
		});
	<?php } ?>
	
	<?php for($i=1;$i<=count($number);$i++){ ?>
		$('#P'+<?php echo $i; ?>).mouseover(function(){
			$('#P'+<?php echo $i; ?>).css( 'cursor', 'pointer' );
		});
		
		var flagSet2=0;
		$('#P'+<?php echo $i; ?>).click(function(){
			if(flagSet2 == 0){
				var sem=$('#P'+<?php echo $i; ?>).val();
				$('#p'+<?php echo $i; ?>).val('A');
				$('#p'+<?php echo $i; ?>).attr('readonly', true);
				flagSet2=1;
			}else{
				$('#p'+<?php echo $i; ?>).val('');
				$('#p'+<?php echo $i; ?>).attr('readonly', false);
				flagSet2=0;
			}	
		});
	<?php } ?>
	
</script>

<script type="text/javascript"> 

	<?php for($i=1;$i<=count($number);$i++){ ?>
		$('#i'+<?php echo $i; ?>).change(function(){
			var checkvalue=$('#i'+<?php echo $i; ?>).val();
			if((checkvalue > <?php echo $internal_marks; ?>)){
				alert('U can\'t add more than Internal Marks ('+(<?php echo $internal_marks; ?>)+')');
				$(this).val("");
			}
			
			var letters = /^[0-9]+$/;  
	   		if(checkvalue.match(letters))  {  
			}else{  
	     		alert("Enter only positive Number");  
				$(this).val('');
	     		return false;  
	     	}  
			
			if(isNaN(checkvalue)){
				alert('dont enter character');
				$(this).val("");
			}
		});
	<?php } ?>
	
	
	<?php for($i=1;$i<=count($number);$i++){ ?>
		$('#s'+<?php echo $i; ?>).change(function(){
			var checkvalue=$('#s'+<?php echo $i; ?>).val();
			if(checkvalue > <?php echo $see_marks; ?>){
				alert('U cant add more than Semester Marks ('+(<?php echo $see_marks; ?>)+')');
				$('#s'+<?php echo $i; ?>).val("");
			}
			
			var letters = /^[0-9]+$/;  
	   		if(checkvalue.match(letters))  {  
			}else{  
	     		alert("Enter only positive Number");  
				$(this).val(''); 
	     		return false;  
	     	}  
			
			if(isNaN(checkvalue)){
				alert('dont enter character');
				$(this).val("");
			}
		});
	<?php } ?>
			
	<?php for($i=1;$i<=count($number);$i++){ ?>
		$('#p'+<?php echo $i; ?>).change(function(){
			var checkvalue=$('#p'+<?php echo $i; ?>).val();
			if(checkvalue > <?php echo $practical_status; ?>){
				alert('U cant add more than Practical Marks ('+(<?php echo $practical_status; ?>)+')');
				$('#p'+<?php echo $i; ?>).val("");
			}
			
			var letters = /^[0-9]+$/;  
	   		if(checkvalue.match(letters))  {  
			}else{  
	     		alert("Enter only positive Number"); 
				$(this).val('');
	     		return false;  
	     	}  
			
			if(isNaN(checkvalue)){
				alert("dont enter character");
				$(this).val("");
			}
		});
	<?php } ?>
	
</script>
	
	