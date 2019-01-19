<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Home</title>
		<link href="<?php echo base_url(); ?>/style.css" rel="stylesheet" type="text/css" />
		<!--[if lt IE 8]>
		<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
		<![endif]-->
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-1.4.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/clock.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/js.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/autoTotalCal.js"></script>
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url(); ?>/css/datepicker.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/datepicker.js"></script>

	</head>
	<body>
		<div class="container">
		  <!-- HEADER -->
		  <div class="header">
		    <div class="header_logo">
			<div style=" padding-bottom:10px;"></div>
		      <div style="margin-left:20px; padding-bottom:10px;min-height:50px;"><a href="#"><img src="<?php echo base_url(); ?>/images/college_logo.jpg" width="98" height="104" alt="Logo" class="logo" /></a></div>
		     <div style="margin-left:20px; float: left; font-size:35px;">Dhempe College of Arts & Science</div>
			  <div class="right">
		        <ul class="light">
		          <li><a href="#"><img src="<?php echo base_url(); ?>images/icon_logout.gif" alt="picture" width="16" height="16" class="logout" /></a><a href="<?php echo base_url(); ?>">logout</a></li>
		        </ul>
		        <p>Logged in as <a href="#">Admin</a></p>
		      </div>
		      <div class="clr"></div>
		    </div>
		    <div class="menu">
		      <ul>
		        <li class="first"><a href="<?php echo base_url()."index.php/login/home"; ?>" class="active"><span><span><span>Home</span></span></span></a></li>
		        <li><a href="#"><span><span><span>Student Data<img src="<?php echo base_url(); ?>/images/dropdown_arrow.gif" alt="picture" width="8" height="7" /></span></span></span></a>
		          <ul>
		            <li><?php echo anchor('home/addStudent','Add Student'); ?></li>
		            <li><?php echo anchor('home/editStudent','Edit Student'); ?></li>
					<li><?php echo anchor('home/studentData','Student Data'); ?></li>
		            <li><?php echo anchor('home/dataentry','Data Entry'); ?></li>
		            <li><?php echo anchor('final_marksheet/checkISA','Check ISA Data'); ?></li>
					<li><?php echo anchor('final_marksheet/check_dataentry','Check Data Entry'); ?></li>
					<li><?php echo anchor('final_marksheet/bulk_dataentry','Bulk Data ISA'); ?></li>
					<li><?php echo anchor('final_marksheet/bulk_dataentry2','Bulk Data SEE'); ?></li>
					<li><?php echo anchor('final_marksheet/bulk_dataentry4','Bulk Data Practicle'); ?></li>
		          </ul>
		        </li>
				<li><a href="#"><span><span><span>Calculate<img src="<?php echo base_url(); ?>/images/dropdown_arrow.gif" alt="picture" width="8" height="7" /></span></span></span></a>
					<ul>
						<li><?php echo anchor('home/finalCalculation','Calculate Marks'); ?></li>
						<li><?php echo anchor('final_marksheet/check_list','Check List'); ?></li>
					</ul>
				<li>

				<li><a href="#"><span><span><span>Priority / Re-Val / Supplementary<img src="<?php echo base_url(); ?>/images/dropdown_arrow.gif" alt="picture" width="8" height="7" /></span></span></span></a>
					<ul>
						<li><?php echo anchor('dataentryController/select_stream_sem_cal','Enter Marks'); ?></li>
						<li><?php echo anchor('suppleController/index','Enter Supplementary'); ?></li>
						<li><?php echo anchor('revalController/index','Re-Val / Supplementary'); ?></li>
						<li><?php echo anchor('final_marksheet/supple_check_list','Supplementary Check List'); ?></li>
						<li><?php echo anchor('final_marksheet/reval_check_list','Reval Check List'); ?></li>
					</ul>
				<li>	
				<li><a href="#"><span><span><span>Print<img src="<?php echo base_url(); ?>/images/dropdown_arrow.gif" alt="picture" width="8" height="7" /></span></span></span></a>
					<ul>
						<li><?php echo anchor('final_marksheet/print_marksheet','Marksheet'); ?></li>
						<li><?php echo anchor('supplementary_marksheets/index','Supplementary'); ?></li>
					</ul>
				<li>	
		      </ul>
		      <div class="clr"></div>
		    </div>
		  </div>