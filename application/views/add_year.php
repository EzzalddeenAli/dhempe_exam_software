<?php include_once('head.php'); ?>


	<script type="text/javascript">


		function ch()
		{
		if($('#year').val()=="")
			{ alert('please Choose year');
			return false;
			}
			else if($('#part').val()=="")
			{ alert('please Choose Part');
			return false;
			}
			else
			{$('#myForm').submit();}
		}



	</script>

<?php
	$year=array(
		"2013"=>"2013",
		"2014"=>"2014",
		"2015"=>"2015",
		"2016"=>"2016",
		"2017"=>"2017",
		"2018"=>"2018",
		"2019"=>"2019",
		"2020"=>"2020",


	);

	$part=array(
		"1"=>"1",
		"2"=>"2",
	);
?>

<div id="content-outer">
	 <div id="content">
		 <div class="page-heading" align="center">
           		<h3>Create New Academic Year</h3>
         	</div>

			<div class="page-heading" align="center">
           		<h2><?php if($m!=''){ echo $m;}?></h2>
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
		<b>Note: Input Year will be 2014 for Academic Year 2014-15 and part will be 1 for 1st semester and 2 for 2nd semester</b>
		<br /><br /><br />
		<?php echo form_open('replicate/create_year',$form_id);
		$js ='id="year" class="my_inp_form" style="width:100px;"';
		?>
			<h4>
				Input year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_dropdown('year',$year,"",$js);?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        Part&nbsp;&nbsp;&nbsp;&nbsp;<?php
				$js ='id="part" class="my_inp_form" style="width: 40px;"';

				echo form_dropdown('part',$part,'',$js);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	    <?php //echo br(2); ?>
				<?php

				$j="class='my_button_submit' onclick='ch()'";
				echo form_button('button','ADD',$j,$j); ?>
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
