<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Exam Software</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/screen.css" type="text/css" media="screen" title="default" />
	
	<link href="<?php echo base_url();?>css_1/ui/ui.base.css" rel="stylesheet" media="all" />

	<link href="<?php echo base_url();?>css_1/ui/ui.login.css" rel="stylesheet" media="all" />

	<link href="<?php echo base_url();?>css_1/themes/black_rose/ui.css" rel="stylesheet" media="all" />

	<link href="<?php echo base_url();?>css/themes/black_rose/ui.css" rel="stylesheet" title="style" media="all" />

	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* Fix IE6 Transparent PNG */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');

	</script>
	<![endif]-->
	<!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
</head>
<body id="login-bg">
	<div id="page_wrapper">
		<div id="page-header">

	</div>
<script>
function show_prev()
{
document.getElementById('previous').style.display="";
document.getElementById('previous_button').style.display="none";
}
function hide_prev()
{
document.getElementById('year').value="";
document.getElementById('part').value="";
document.getElementById('previous').style.display="none";
document.getElementById('previous_button').style.display="";
}
function validate()
{
	if(document.getElementById('email').value=="")
	{
	alert("Please Enter Username");
	return false;
	}
	if(document.getElementById('password').value=="")
	{
	alert("Please Enter password");
	return false;
	}
	if((document.getElementById('year').value!="" && document.getElementById('part').value==""))
	{
	alert("Please Enter Part to access");
	return false;
	}
	if((document.getElementById('part').value!="" && document.getElementById('year').value==""))
	{
	alert("Please Enter Year to access");
	return false;
	}

}
</script>
		<div id="sub-nav" style="padding-top: 80px;">
			
				<!--<h1>Login Area</h1>-->
				<img style="margin-left:10px;" src="<?php echo base_url()."images/college_logo.jpg" ?>" width="90" height="90" alt="LOGO" />
<?php
	$year=array(
	     ''=>'',
		"2013"=>"2013",
		"2014"=>"2014",
		"2015"=>"2015",
		"2016"=>"2016",
		"2017"=>"2017",
		"2018"=>"2018",
		"2019"=>"2019",
		"2020"=>"2020",
		"2021"=>"2021",
		"2022"=>"2022",
		"2023"=>"2023",
		"2024"=>"2024",
		"2025"=>"2025",
		
		
	);
	
	$part=array(
	  ''=>'',
		"1"=>"1",
		"2"=>"2",
	);
?>			

		<div class="clear"></div>
		<div id="page-layout">
			<div id="page-content">
				

				<div id="tabs">
					<div id="loginbox">
					<div id="login-inner"> 
						<?php echo form_open('login/check'); ?>
							<table border="0" cellpadding="0" cellspacing="0">
<tr>
								
									<th>
										<b>User Name:</b>
									</th>
									<td  style="border: none;">
										<input type="text" tabindex="1" maxlength="255" value="" class="login-inp" name="email" id="email" />
									</td>
									</tr><tr>
								
							<th>
										<b>Password:</b>
									</th>
				
									<td  style="border: none;">
										<input type="password" tabindex="1" maxlength="255" value="" class="login-inp" name="password" id="password" />
									</td>
										</tr>
										<tr >
										<div id="previous" style="display:none;"> 
										<b>Year:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
										$js ='id="year" class="my_inp_form" style="width:100px;background-color: #383636;color: white;"';
										
										echo form_dropdown('year',$year,"",$js);?>     
												
										<b>Part</b>&nbsp;&nbsp;<?php 
				$js ='id="part" class="my_inp_form" style="width: 40px;background-color: #383636;color: white;"';
				
				echo form_dropdown('part',$part,'',$js);?> &nbsp;&nbsp;&nbsp;<input readonly  onclick="hide_prev();" value="X" style="border-radius: 5px;height: 19px;padding-left: 2px;background-color: rgb(7, 7, 7);color: white;cursor: pointer;width: 15px;font-weight: bolder;" />  
			<br /><br /></div>
			<div id="previous_button" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input readonly  onclick="show_prev();" value="Access Previous Data" style=" border-radius: 5px;height: 21px;padding-left: 9px;background-color: rgb(78, 131, 167);color: white; cursor: pointer;" /> 
			<br /><br /></div>
					</tr>
								<tr><td  style="border: none;"></td><td style="border: none;">
										<button style="margin-right: 161px;
margin-top: 20px;" class="submit-login" onclick="return validate();" type="submit" >Go to dashboard</button>
									</td></tr>
						</form>
					</div>
		
				</div>
				</div>

				
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
</html>
