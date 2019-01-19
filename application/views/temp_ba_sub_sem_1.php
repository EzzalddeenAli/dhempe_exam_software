<?php include_once('header.php'); ?>

<?php 

	$options=array(
		"A"=>"A",
		"B"=>"B",
		"C"=>"C",
		"D1"=>"D1",
		"D2"=>"D2",
		"E"=>"E"
	);
	
	$rewards=array(
		"participation"=>"Participation",
		"winner"=>"Winner",
		"runners_up"=>"Runners_up",
		"semi_finalist"=>"Semi_finalist"
	);
	
	$subject2=array(
		"2A"=>"Konkani",
		"2B"=>"Marathi",
		"2C"=>"Hindi",
		"2D"=>"French"
	);
	
	$subject3=array(
		"3A1"=>"Economics & History",
		"3B1"=>"Economics and Philosophy",
		"3C1"=>"English and History",
		"3D1"=>"English and philosophy"
	);

?>

<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php echo form_open('home/saveStudentDetail'); ?>
		<div id="page-content-wrapper">
			<div id="dashboard-buttons">
				<input type="hidden" value="<?php echo  "ba_student_detail_sem_1"; ?>" name="tbl_name" />
				<input type="hidden" value="750" name="MaxaggMark" />
					<ul>
						<li>
							PR Number <?php echo form_input('pr_number'); ?>
						</li>
					</ul>
					<div class="clear"></div>
					
					<ul>
						<li>
							Name <?php echo form_input('Name'); ?>
						</li>
					</ul>
					<div class="clear"></div>
					
					<ul>
						<li>
							NSS/NCC <?php echo form_checkbox('nss','1',''); ?>
						</li>
					</ul>
					<div class="clear"></div>
					
					<ul>
						<li>
							Sports <?php echo form_checkbox('sports','1',''); ?>
						</li>
						
						<li>
							Category<?php echo form_dropdown('cat',$options); ?>
						</li>
						<li>
							Rewards<?php echo form_dropdown('rewards',$rewards); ?>
						</li>
					</ul>
					<div class="clear"></div>
					
					
					<ul>
						<li>
							Spoken English<?php echo form_radio('subject1','1A','TRUE'); ?>
						</li>
					</ul>
					<div class="clear"></div>
					
					<ul>
						<li>
							Another Language Paper  <?php echo form_dropdown('subject2',$subject2); ?>
						</li>
					<!--
						<li>
							Konkani<?php echo form_radio('subject2','2A','TRUE'); ?>
						</li>
						
						<li>
							Marathi<?php echo form_radio('subject2','2B','TRUE'); ?>
						</li>
						
						<li>
							Hindi <?php echo form_radio('subject2','2C','TRUE'); ?>
						</li>
						
						<li>
							French <?php echo form_radio('subject2','2D','TRUE'); ?>
						</li>
						-->
					</ul>
					<div class="clear"></div>
					
					<ul>
						<li>
							Major 1 & Major2 <?php echo form_dropdown('subject3',$subject3); ?>
						</li>
					<!--
						<li>
							group 1 (Economics and History)<?php echo form_radio('subject3','3A1','TRUE'); ?>
						</li>
					</ul>
					
					<ul>
						<li>
							group 2 (Economics and Philosophy) <?php echo form_radio('subject3','3B1','TRUE'); ?>
						</li>
					</ul>
					
					<ul>
						<li>
							group 3 (English and History)<?php echo form_radio('subject3','3C1','TRUE'); ?>
						</li>
					</ul>
					
					<ul>
						<li>
							group 4 (English and philosophy)<?php echo form_radio('subject3','3D1','TRUE'); ?>
						</li>
					</ul>
					-->
				<div class="clear"></div>
				
				<ul>
					<li>
						Hindi<?php echo form_radio('subject4','4A','TRUE'); ?>
					</li>
					
					<li>
						Konkani<?php echo form_radio('subject4','4B','TRUE'); ?>
					</li>
					
					<li>
						Marathi<?php echo form_radio('subject4','4C','TRUE'); ?>
					</li>
					
					<li>
						Psychology<?php echo form_radio('subject4','4D','TRUE'); ?>
					</li>
					
					<li>
						Political science<?php echo form_radio('subject4','4E','TRUE'); ?>
					</li>
				</ul>
				<div class="clear"></div>
				
				<ul>
					<li>
						Information Technology<?php echo form_radio('subject6','5A','TRUE'); ?>
					</li>
				</ul>
				<div class="clear"></div>
				
				<ul>
					<li>
						Foundation Course<?php echo form_radio('subject7','6A','TRUE'); ?>
					</li>
				</ul>
				<div class="clear"></div>
				
				<ul>
					<li>
						Environmental Education<?php echo form_radio('subject8','7A','TRUE'); ?>
					</li>
				</ul>
				<div class="clear"></div>
				
				<ul>
					<li>
						<?php echo form_submit('submit','Save'); ?>
					</li>
				</ul>
				<div class="clear"></div>
			</div>	
		</div>
		<?php echo form_close(); ?>
	</body>
</html>	
