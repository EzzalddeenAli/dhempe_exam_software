<?php include_once('head.php'); ?>


<div class="content">
	<div class="gadget">
		<div class="titlebar vertsortable_head">
           		<h3 align="center">Select PR</h3>
    	</div>
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
	
	<?php $form_id=array('id'=>'myForm','name'=>'myForm'); ?>
	<?php echo form_open('home/loadMarksheet',$form_id);  $js ='class="my_select"'; ?>
			
	<input type="hidden" name="table_name" value="<?php echo $tbl_name; ?>" />
	<input type="hidden" name="stream1" value="<?php echo $stream1; ?>" />
	<input type="hidden" name="semester" value="<?php echo $sem; ?>" />
			
				
	Select PR
	<select name="prnumber" id="pr" class="my_select">
		<option value="">Select</option>
		<?php foreach ($data as $row){ ?>
		<option value="<?php echo $row->pr_number; ?>"><?php echo $row->pr_number ?></option>
		<?php } ?>
	</select>	
					
		<input type="submit" value="Enter Marks" id="check" onclick="return check()" class="my_button_submit" />
					
		<?php echo form_close(); ?>
		<div id="subject_structure"></div>
		<div class="clear"></div>
	</div>
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
<?php include_once('foot.php'); ?>
	
<script type="text/javascript">
	$('#check').click(function(){
		var c = $('#pr').val();
		if(c == ""){
			alert('Select PR Number');
			return false;
		}
	});
</script>