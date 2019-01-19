<?php include_once('head.php'); ?>


<div class="content">
	 <div class="gadget">
          <div class="titlebar vertsortable_head">
           		<h3 align="center">Select Subject</h3>
          </div>	
		    <div style="padding-top:100px;" align="center">
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

		  	<?php $form_id=array('id'=>'myForm'); 

			?>
		    <?php echo form_open('home/getPr',$form_id); ?>
			
			<input type="hidden" name="table_name" value="<?php echo $table_name; ?>" />
			<input type="hidden" name="stream1" value="<?php echo $stream1; ?>" />
			<input type="hidden" name="semester" value="<?php echo $sem; ?>" />
			<input type="hidden" name="connect" value="<?php echo $tbl_connect; ?>" />
			<input type="hidden" name="tbl_mark_connect" value="<?php echo $table_mark_name; ?>" />
			<br />
			<br />
			Subject
				<select name="subject_detail" style="width:300px;"class="my_select">
					<?php foreach($sub_name as $row){ ?>
					<option value="<?php echo $row->sub_id; ?>"><?php echo $row->sub_name_display; ?></option>
					<?php } ?>
				</select>
			
				<input type="submit" value="Get" id="Get" name="submit" class="my_button_submit" />
				<input type="button" value="Back" id="previous" class="my_button_submit" />
				
				<?php echo form_close(); ?>
				<div id="subject_structure"></div>
					<br />
			<br />	
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
	</div>
		</div>
</div>	
<?php include_once('foot.php'); ?>

<script type="text/javascript">
	$('#previous').click(function(){
		window.location='<?php echo base_url(); ?>index.php/home/dataentry';
	});
</script>