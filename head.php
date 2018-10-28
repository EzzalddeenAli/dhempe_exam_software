<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Home</title>
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/screen.css" type="text/css" media="screen" title="default" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu_new.css" type="text/css" media="screen" title="default" />
		
		<!--[if lt IE 8]>
		<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
		<![endif]-->
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-1.4.1.js"></script>
		
		

	</head>
	<body>
		<div class="container">
		  <!-- HEADER -->
		  <div class="main_header">
		  <div id="page-top-outer">  
		    <div id="page-top">
			<div style=" padding-bottom:10px;"></div>
		      <div style="margin-left:20px; padding-bottom:10px;min-height:50px;"><a href="#"><img src="<?php echo base_url(); ?>/images/college_logo.jpg" width="98" height="104" alt="Logo" class="logo" /></a><div style="margin-right:730px; float: right; font-size:25px; color:#ffffff;">Dhempe College of Arts & Science</div>
			  

</div>
		     <div id="nav-right">
		        <br>
		          <a href="<?php echo base_url(); ?>">
				  <img src="<?php echo base_url();?>assets/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
		        
		       
		      </div>
		      <div class="clr"></div>
		    </div>
			</div>
			<div class="nav-outer-repeat"> 
			<div class="nav-outer"> 
		    <div class="nav">
			<div class="table">
		      <ul id="menu">
		       <!--  <li class="first"><a href="<?php echo base_url()."index.php/login/home"; ?>" class="active">Home</a></li>-->
		        <li><a href="#"><b>Student Data</b></a>
		          <ul>
		            <li><?php echo anchor('home/addStudent','Add Student'); ?></li>
		            <li><?php echo anchor('home/editStudent','Edit Student'); ?></li>
		            <li><?php echo anchor('home/blockStudents','Block Students'); ?></li>
		            <li><?php echo anchor('home/blockedStudents','Current Blocked Students'); ?></li>
					<li><?php echo anchor('home/studentData','Student Data'); ?></li>
		            <li><?php echo anchor('home/dataentry','Data Entry'); ?></li>
		           <!-- <li><?php echo anchor('final_marksheet/checkISA','Check ISA Data'); ?></li>
					<li><?php echo anchor('final_marksheet/check_dataentry','Check Data Entry'); ?></li>-->
					<li><?php echo anchor('final_marksheet/bulk_dataentry','Bulk Data ISA'); ?></li>
					<li><?php echo anchor('final_marksheet/bulk_dataentry2','Bulk Data SEE'); ?></li>
					<li><?php echo anchor('final_marksheet/bulk_dataentry4','Bulk Data Practicle'); ?></li>
		          </ul>
		        </li>
				<li><a href="#">Calculate</a>
					<ul>
						<li><?php echo anchor('home/finalCalculation','Calculate Marks'); ?></li>
						<li><?php echo anchor('final_marksheet/check_list','Check List'); ?></li>
						<li><?php echo anchor('final_marksheet/nowEligibleChecklist','Newly Eligible Fresh Students Check List'); ?></li>
					</ul>
				<li>

				<li><a href="#"> Supplementary</a>
					<ul>
						<!--<li><?php echo anchor('dataentryController/select_stream_sem_cal','Enter Marks'); ?></li>-->
						<li><?php echo anchor('suppleController/index_enter_marks','Enter Previous Attempt marks'); ?></li>
						<li><?php echo anchor('suppleController/freshToSupplementaryPrevious','Convert Previous Year to Supplementary'); ?></li>
						<li><?php echo anchor('suppleController/freshToSupplementary','Convert Current Year Fresh to Supplementary'); ?></li>
						<li><?php echo anchor('suppleController/index','Enter Supplementary'); ?></li>
						<!-- To Enter Prev Attempt Marks -->
						
						<!--<li><?php echo anchor('revalController/index','Re-Val / Supplementary'); ?></li>-->
						<li><?php echo anchor('final_marksheet/supple_check_list','Supplementary Check List'); ?></li>
						<li><?php echo anchor('final_marksheet/nowEligibleChecklistSupplementary','Newly Eligible Supplementary Students Check List'); ?></li>
						<!--<li><?php echo anchor('final_marksheet/reval_check_list','Reval Check List'); ?></li>-->
					</ul>
				<li>	
				<li><a href="#">Print</a>
					<ul>
						<li><?php echo anchor('final_marksheet/print_marksheet','Fresh Marksheet'); ?></li>
						<li><?php echo anchor('final_marksheet/now_eligible_print_marksheet','Newly Eligible Fresh Marksheet'); ?></li>
						<li><?php echo anchor('supplementary_marksheets/index','Supplementary Marksheet'); ?></li>
						<li><?php echo anchor('supplementary_marksheets/now_eligible_index','Newly Eligible Supplementary Marksheet'); ?></li>
						<li><?php echo anchor('final_marksheet/edit_static_data','Edit Static Marksheet Data'); ?></li>
					</ul>
				</li>
					<li><a href="#">New Academic Year</a>
					<ul>
						<li><?php echo anchor('replicate/create','Create'); ?></li>
					</ul>
					</li>
		      </ul>
		      <div class="clr"></div>
		    </div>
			</div>
			</div>
			</div>
		  </div>