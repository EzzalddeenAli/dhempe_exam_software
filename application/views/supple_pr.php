<?php include_once('head.php'); ?>



<div class="content">
	 	<div class="gadget">
          	<div class="titlebar vertsortable_head">
           		<h3 align="center">Select Pr Number</h3>
         	</div>	
			<?php $form_id=array('id'=>'myForm'); ?>
			<?php echo form_open('suppleController/getMarks',$form_id); ?>
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
			<input type="hidden" name="table_name" value="<?php echo $tbl_name; ?>" />
			<input type="hidden" name="stream1" value="<?php echo $stream1; ?>" />
			<input type="hidden" name="semester" value="<?php echo $sem; ?>" />
			
			
			<div style="float:left;">
				Select PR
				<select name="prnumber" id="pr" class="my_select">
					<option value="">Select</option>
					<?php foreach ($data as $row){ ?>
					<option value="<?php echo $row->pr_number; ?>"><?php echo $row->pr_number ?></option>
					<?php } ?>
				</select>	
						
				<select name="select_option" id="supple_options" class="my_select">
					<!--<option value="1">Re-valuation</option>-->
					<option value="2">Supplementary</option>
				</select>
			</div>
			
			<div style="float:left; margin-left:20px; " id="no_of_attempt">
				Attempt Number
				<select name="attempt" class="my_select">
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
			</div>
			<div style="float:left;margin-left:20px;" id="supple_seat">
				Supplementary Seat Number &nbsp;&nbsp;&nbsp;<input type="text" name="supple_seat_number" id="one" class="my_inp_form"/>
			</div>	
			
			<br />
			<br /><br />
			<br /><br />
			
			
			<input type="submit" name="Get marks" value="Enter Marks" id="check" class="my_button_submit" />	
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
			
			<?php echo form_close(); ?>
			<div id="subject_structure"></div>
		<div class="clear"></div>
	</div>
</div>	
<?php include_once('foot.php'); ?>

<script type="text/javascript">
	$('#supple_options').change(function(){
		if($(this).val() == 2){
			$('#supple_seat').show();
			$('#no_of_attempt').show();
		}else{
			$('#supple_seat').hide();
			$('#no_of_attempt').hide();
		}
	});
</script>
	
<script type="text/javascript">
	$('#check').click(function(){
		var c = $('#pr').val();
		if(c == ""){
			alert('Select PR Number');
			return false;
		}
		
		var d= $('#one').val();
		if($('#supple_options').val() == 2){
			if(d == ''){
				alert('Enter Seat Number');
				return false;
			}	
		}
	});
</script>
