<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

	if(isset($_SESSION['username'])){
	}
	else{
		session_start();
		if(!isset($_SESSION['username'])){
			echo "Page expired";
			exit();
		}
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Examination Software</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/autoTotalCal.js"></script>
	<link href="<?php echo base_url(); ?>css/ui/ui.base.css" rel="stylesheet" media="all" />

	<link href="<?php echo base_url(); ?>css/themes/black_rose/ui.css" rel="stylesheet" title="style" media="all" />

	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* Fix IE6 Transparent PNG */
	  DD_belatedPNG.fix('.logo, ul#dashboard-buttons li a, .response-msg, #search-bar input');

	</script>
	<![endif]-->
</head>
<body>
	<div id="page_wrapper">
		<div id="page-header">
			<div id="page-header-wrapper">
				<div id="top">
					<div class="welcome">
						<span class="note"><b>Welcome</b>, <a href="#" title="Admin">Admin</a></span>
						
						<a class="btn ui-state-default ui-corner-all" href="<?php echo base_url().'index.php/login/logout'; ?>">
							<span class="ui-icon ui-icon-power"></span>
							Logout
						</a>						
					</div>
				</div>
				<ul id="navigation">
					<li>
						<a href="<?php echo base_url().'index.php/home' ?>" class="sf-with-ul">Dashboard</a>
					</li>
					
					<li>
						<?php echo anchor('home/addStudent','Add Student'); ?>
					</li>
					
					<li>
						    <?php echo anchor('home/editStudent','Edit Student'); ?>
					</li>
					
					<li>
							<?php echo anchor('home/dataentry','Data Entry'); ?>
					</li>
					
					<li>
							<?php echo anchor('final_marksheet/check_dataentry','Check Data Entry'); ?>
					</li>
					
					<?php //session_start(); ?>
					<?php if($_SESSION['username'] == "param"){ ?>
					<li>
							<?php echo anchor('home/finalCalculation','Calculate'); ?>
					</li>
					
					<li>
							<?php echo anchor('dataentryController/select_stream_sem_cal','Enter Marks'); ?>
					</li>
					
					
					<li>
							<?php echo anchor('revalController/index','Re-Valuation/Supplementary'); ?>
					</li>
					
					<li>
						<?php echo anchor('final_marksheet/check_list','Check List'); ?>
					</li>
					
					<li>
						<?php echo anchor('final_marksheet/print_marksheet','Print Marksheet'); ?>
					</li>
					
					<?php } ?>
				</ul>
				
			</div>
		</div>