<?php include_once('head.php'); 
$exam_held_in= '';
				$entered_by= '';
				$date_of_declaration = '';
				$date_of_issue = '';
foreach($data as $md)
				{
				$exam_held_in= $md->exam_held_in;
				$entered_by= $md->entered_by;
				$date_of_declaration = $md->date_of_declaration;
				$date_of_issue = $md->date_of_issue;
				}
?>
<!--  date picker script -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/datePicker.css" type="text/css" />
<script src="<?php echo base_url();?>assets/js/jquery/date.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">

var j= jQuery.noConflict();
        j(function()
{
var today=new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
// initialise the "Select date" link
j('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2013',
			endDate:'31/12/2025',
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			//updateSelects(j(this).dpGetSelected()[0]);
			j(this).dpDisplay();
			return false; 
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{

	var selectedDate = new Date(selectedDate);
	if(selectedDate=='Invalid Date') selectedDate=new Date();
   var mon=("0" + (selectedDate.getMonth() + 1)).slice(-2)
   j('#date_of_declaration').val(selectedDate.getFullYear()+'-'+ mon +'-'+("0" + selectedDate.getDate()).slice(-2));
}
//2nd date cal
// initialise the "Select date" link
j('#date-pick1')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2013',
			endDate:'01/01/2025',
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			//updateSelects1(j(this).dpGetSelected()[0]);
			j(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects1(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects1(selected[0]);
		}
	);
	
var updateSelects1 = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	if(selectedDate=='Invalid Date') selectedDate=new Date();
   var mon=("0" + (selectedDate.getMonth() + 1)).slice(-2)
   j('#date_of_issue').val(selectedDate.getFullYear()+'-'+ mon +'-'+("0" + selectedDate.getDate()).slice(-2));
}

});
</script>
<div id="content-outer">
	 <div id="content">
		 <div class="page-heading" align="center">
           		<h3>Edit Static Marksheet Data</h3>
         	</div>
			
			<div class="page-heading" align="center">
           		<h2><?php if($success!=''){ echo $success;}?></h2>
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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">									

		 
		 
		 
		 <div style="padding-top:50px;">
		<?php $form_id=array('id'=>'myForm'); ?>
		
		<?php echo form_open('final_marksheet/update_static_data',$form_id);
		$js ='id="exam_held_in" class="my_inp_form" style="width:200px;"';
		?>
			<h4>
				Exam Held In: &nbsp;&nbsp;<?php echo form_input('exam_held_in',$exam_held_in,$js);?>     
				
				&nbsp;&nbsp;&nbsp;&nbsp;		
		        Entered By:&nbsp;&nbsp;&nbsp;&nbsp;<?php 
				$js ='id="entered_by" class="my_inp_form" style="width:80px;"';
				
				echo form_input('entered_by',$entered_by,$js);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
						
		        Date of Declaration:&nbsp;&nbsp;&nbsp;&nbsp;<?php 
				$js ='id="date_of_declaration" class="my_inp_form" readonly style="width:80px;"';
				
				echo form_input('date_of_declaration',$date_of_declaration,$js);?> <a href=""  id="date-pick"><img id="cal"  src="<?php echo base_url();?>assets/images/forms/icon_calendar.jpg"   alt="" /></a>&nbsp;
							
		        Date of Issue:&nbsp;&nbsp;&nbsp;&nbsp;<?php 
				$js ='id="date_of_issue" class="my_inp_form"  readonly style="width:80px;"';
				
				echo form_input('date_of_issue',$date_of_issue,$js);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<a href=""  id="date-pick1"><img id="cal1"  src="<?php echo base_url();?>assets/images/forms/icon_calendar.jpg"   alt="" /></a><br /><br />
				<?php

				$j="class='my_button_submit' ";
				echo form_submit('button','Save',$j,$j); ?>
			</h4>	
			
			<?php echo form_close(); ?>
			</div></div>
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
			<div id="subject_structure">
			</div>
			</div>
	</div>
</div>
	</div>

	</div>
</div><br><br><br><br><br><br><br><br>	
<?php include_once('foot.php'); ?>
			