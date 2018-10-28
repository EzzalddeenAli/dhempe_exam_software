<?php include_once('head.php'); ?>


<?php if(isset($flagset)){ ?>
	<script type="text/javascript">
		alert("Added Sucessfully");
	</script>
<?php } ?>

<?php


if($stream=="bsc_sub_")
		{$stream_display="B.S.C";}
else if($stream=="ba_sub_")
		{$stream_display="B.A";}
else if($stream=="bsc_cmp_sci_sub_")
		{$stream_display="B.S.C(computer)";}

	if($semester=="sem_1")
		{$semester_display="Semester 1";}
else if($semester=="sem_2")
		{$semester_display="Semester 2";}
else if($semester=="sem_3")
		{$semester_display="Semester 3";}
else if($semester=="sem_4")
		{$semester_display="Semester 4";}


?>



<?php
	$options=array(
		"A"=>"International Events",
		"B"=>"International events/Championships",
		"C"=>"National Events",
		"D1"=>"Inter-University Championships",
		"D2"=>"Zonal Inter-University Championships",
		"E"=>"Inter-Collegiate Tournaments"
	);
	
	$rewards=array(
		"participation"=>"Participation",
		"winner"=>"Winner",
		"runners_up"=>"Runners_up",
		"semi_finalist"=>"Semi_finalist"
	);
	
	
?>

<?php
					
					
					$subject=$this->db->query("SELECT * FROM $stream$semester ORDER BY sub_name ASC;");
					$subjectDetailsArray=array();

					$subject_sort_array = array();
								$query_1=$this->db->query("SELECT distinct subject_type from subject_type_limit WHERE stream='". $stream. "' AND semester='". $semester. "' ORDER BY sort_order ;");

					//generate the limits of each subject type
					foreach ($query_1 ->result() as $row) 
					{					
						$subject_sort_array[]=$row->subject_type;
						
					}


								foreach ($subject->result() as $row)
									{
									        $subjectDetailsArray[$row->sub_id]=$row->sub_name;
									       $subject_type_array= (explode("_",$row->subject_type));
									       foreach($subject_type_array as $details){

									       	$all[$details][]=$row->sub_id;
									       }
									       
									   
									}

	$properOrderedArray = array_merge(array_flip($subject_sort_array), $all);

									
							
?>


<style type="text/css">
	
	#apnd div { 
     
        width: 30%x; 
       
        margin-left: 5px; 
        float: left; /*Here you can also use display: inline-block instead of float:left*/
        
}

table#t01{
border: 1px solid black;
    border-collapse: collapse;
}

table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
	 padding: 5px;
    background-color: black;
    color: white;
}

table#t01 td {
    padding: 5px;
    text-align: left;
}

</style>


<script type="text/javascript">
	
	function check(){
		var x=document.forms["myForm"]["pr_number"].value;
		if (x==null || x==""){
  			alert("Enter Pr number");
  			return false;
  		}
		 
		if(isNaN(x)){
			alert("Enter Number Only  for PR");
  			return false;
		}
		
		var letters = /^[0-9]+$/;  
   		if(x.match(letters))  {  
		}else{  
     		alert("Enter only decimal numbers");  
     		return false;  
     	} 
		 
		if(x < 0){
			alert('Dont\'t Enter Negative Number');
			return false;
		}
		
		var x=document.forms["myForm"]["seat_number"].value;
		if (x==null || x==""){
  			alert("Enter Seat Number");
  			return false;
  		}
		 
		var letters = /^[0-9]+$/;  
   		if(x.match(letters))  {  
		}else{  
     		alert("Enter only decimal numbers");  
     		return false;  
     	}  
		  
		if(isNaN(x)){
			alert("Enter Number Only  for Seat Number");
  			return false;
		}
		
		if(x < 0){
			alert('Dont\'t Enter Negative Number');
			return false;
		}
		
		var letters = /^[0-9]+$/;  
   		if(x.match(letters))  {  
		}else{  
     		alert("Enter only decimal numbers");  
     		return false;  
     	}  
		
		
		var x=document.forms["myForm"]["Name"].value;
		if (x==null || x==""){
  			alert("Enter Name");
  			return false;
  		}
		 
		var letters = /^[A-Za-z\s]+$/;  
   		if(x.match(letters)){}  
   		else{  
     		alert("Enter Characters only for Name");  
     		return false;  
     	}  
		 
		var x=document.forms["myForm"]["subject"].value;
		if (x==null || x=="")
 		 {
  			alert("Select Subject");
  			return false;
  		 }

	 	
  		}
	
</script>
 <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>
 <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
  
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<div class="content">
	 	<div class="gadget">
          	<div class="titlebar vertsortable_head">
           		<h3 align="center">Stream : <?php echo $stream_display; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $semester_display; ?></h3>
         	</div>
			<div class="gadgetblock">
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
				<?php $form_data=array('name'=>"myForm","id"=>"formData"); ?>
				<?php echo form_open('home/saveStudent_generic',$form_data); $js ='class="my_select"'; 
				 $stream_tbl= (explode("_",$stream));
				 $stream_table=$stream_tbl[0];
				 	?>
				<?php $tl_name=$stream_table.'_student_detail_'. $semester; ?>
				<input type="hidden" value="save_students_default.php" name="view_name" />
				<input type="hidden" value="<?php echo $tl_name; ?>" name="tbl_name" />

				<input type="hidden" value="<?php echo $stream; ?>" name="stream" />
				<input type="hidden" value="<?php echo $semester; ?>" name="semester" />

				<?php 


						

						$max_aggr=$this->db->query("SELECT * FROM $stream$semester LIMIT 1;");


						foreach ($max_aggr->result() as $row)
						{ $total_marks=$row->max_agg_marks;	}



				?>
				<input type="hidden" value="<?php echo $total_marks; ?>" name="MaxaggMark" />
				
				<ol>
					<li>
					<h4>Fresh <?php echo form_radio('type','0','true'); ?>
							Supplementary <?php echo form_radio('type','1'); ?></h4>
						<div style="float:left;">
							<?php $pr_number_id=array('name'=>"pr_number","id"=>"reg",'class'=>'my_inp_form'); ?>
							<h4>PR Number <?php echo form_input($pr_number_id); ?></h4>

						</div>
						
						<div style="float:left;  margin-left:50px;">
							<?php $seat_number_id=array('name'=>"seat_number","id"=>"seat_number",'class'=>'my_inp_form'); ?>
							<h4>Seat Number <?php echo form_input($seat_number_id); ?></h4>
						</div>
						
						<div style="float: left; margin-left:50px;">
							<?php $nameId=array('name'=>'Name','id'=>'name_test','class'=>'my_inp_form'); ?>
							<h4>Name <?php echo form_input($nameId); ?></h4>
						</div>
						<div style="float: left; margin-left:50px;">
							<h4>Male <?php echo form_radio('gender','M','true'); ?>
							Female <?php echo form_radio('gender','F'); ?></h4>
						</div>
					</li>
			
					<li>	
			  			<!-- <div style="clear:both;"><div><br><br>
						<div style="float:left;"> 
							<h4>NSS/NCC <?php //echo form_checkbox('nss','1'); ?></h4>	
						</div>
						<div style="float:left; margin-left:20px;">		
							<?php //$sportsID=array('name'=>'sports','id'=>'sports_id','value'=>'1'); ?>
							<h4>Sports <?php //echo form_checkbox($sportsID,''); ?><h4>
						</div>
			
						<div id="hideSports" style="display:none;">
							<div style="float:left; margin-left:20px; margin-top:-7px;">
								<h4>Category<?php //echo form_dropdown('cat',$options,"",$js); ?><h4>
							</div>
							<div style="float:left; margin-left:20px; margin-top:-7px;">
								<h4>Rewards<?php //echo form_dropdown('rewards',$rewards,"",$js); ?><h4>
							</div>
						</div> -->
						<BR/>
			  		</li> 		
					
					
			  			<h4>
			  			<div style="margin-top:20px; clear: both;">
							Select Subject
						</div>
					
						<div id="apnd" style="margin-top:20px;">
								<?php 


										$total=0;
										$i=0;
										$all_subject = array();

										foreach( $properOrderedArray as $type=>$val)
										{


											$query=$this->db->query("SELECT number from subject_type_limit WHERE stream='". $stream. "' AND subject_type='". $type. "' AND semester='". $semester. "';");

					//generate the limits of each subject type
					foreach ($query ->result() as $row) 
					{					
						$sub_limit= $row->number;
						$total=$total+$sub_limit;
						
					}

					/*?>
										<div class="question" data-max-answers=<?php echo $sub_limit ?>>
					<?php*/
										echo '<div class="question" data-max-answers='.$sub_limit.'>';	
										echo '<table id="t01">';
										echo '<th>';
										echo $type;

										//create subject type array
										
										$all_subject[$i]=$type;
										$i++;

										echo '</th>';
										echo '<th>';
										echo '</th>';	
										    foreach( $val as $subject )
										    {

										    	$sub_name=$subjectDetailsArray[$subject];
										    	echo '<tr>';
										        echo '<td>';
										        echo $sub_name;
										        echo '</td>';
										        echo '<td>';
										        $cb_data = array(
														'name'   => 'selected_subject_'.$type.'[]',
																 'id'  => $type,
																 'value'  => $subject,
																 'class' =>$type,
																 'data-max'=> $sub_limit,	 
																);

												echo form_checkbox($cb_data);
												

										        echo '</td>';
										        echo '</tr>';					
										   }
										    echo '</table>';
										    echo '</div>';
										    
							}
							 
										    $subj_types=implode("_",$all_subject);
										    echo form_hidden('all_subjects', $subj_types);	

												$total_data = array(
															        'type'  => 'hidden',
															        'id'  => 'total_limit',
																 'value'  => $total,
																 'class' =>'total_limit',
																 	 
															);

															echo form_input($total_data);



								?>
								

						</div>
						

					<li>
			  			<div style="clear:both;">
	<input style="margin-top:20px;" id="checkBtn" type="submit" value="Save" onclick="return check();" class="my_button_submit"/>

							<input id="back" type="reset" value="Reset" class="my_button_submit" />
							<input type="button" value="Back" id="previous_page" class="my_button_submit"/>
							
										    
						</div>
					</li>
					</h4>
				</ol>
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
<?php echo form_close(); ?>


<?php include_once('foot.php'); ?>
			
<script type="text/javascript">
	$('#back').click(function(){
		if($(this).is(':checked')){
			$('#hideSports').css('display','');
		}else{
			$('#hideSports').hide();
		}
	});
	
	$('#previous_page').click(function(){
		window.location='<?php echo base_url(); ?>index.php/home/addStudent';
	});

	$('#name_test').change(function(){
		var check=$('#reg').val();
		if(check == ""){
			alert('Enter Register number First');
			$('#name_test').val("");
		}
	});
	
	
	$('#sports_id').click(function(){
		if($(this).is(':checked')){
			$('#hideSports').css('display','');
		}else{
			$('#hideSports').hide();
		}
	});
	
$('#reg').change(function(){
		var url='<?php echo base_url()."/index.php/validation/checkpr"; ?>';
		$.post(url,{input:$('#reg').val(),stream2:$tl_name,type:$('input:radio[name=type]:checked').val()},function(data){
			//$('#status').html(data);
			var status=data;
			
			if(status == 0){
				$('#reg').css('border-color','#33CC33');
			}
			else{
				$('#reg').css('border-color','#FF0000');
				alert('Register Number already Exist For the Type Of Exam Selected');
				$('#reg').val("");
				return false;
			}
		});
	});
	
	$('input:radio[name=type]').click(function() {
		var url='<?php echo base_url()."/index.php/validation/checkpr"; ?>';
		$.post(url,{input:$('#reg').val(),stream2:$tl_name,type:$('input:radio[name=type]:checked').val()},function(data){
			//$('#status').html(data);
			var status=data;
			
			if(status == 0){
				$('#reg').css('border-color','#33CC33');
			}
			else{
				$('#reg').css('border-color','#FF0000');
				alert('Register Number already Exist For the Type Of Exam Selected');
				$('#reg').val("");
				return false;
			}
		});
	});





	</script>


<script type="text/javascript">
	
	$(document).ready(function () {
    $("input[type=checkbox]").click(function (e) {
        if ($(e.currentTarget).closest("div.question").length > 0) {
            disableInputs($(e.currentTarget).closest("div.question")[0]);        
        }
    });
});

function disableInputs(questionElement) {
    console.log(questionElement);
    if ($(questionElement).data('max-answers') == undefined) {
        return true;
    } else {
        maxAnswers = parseInt($(questionElement).data('max-answers'), 10); 
        if ($(questionElement).find(":checked").length >= maxAnswers) {
            $(questionElement).find(":not(:checked)").attr("disabled", true);
            //alert('Only '+ maxAnswers +' Subjects Allowed ');
            

        } 

        else {
            $(questionElement).find("input[type=checkbox]").attr("disabled", false);

        }
    }


}



/*$(':checkbox').on('change',function(){
 var th = $(this), name = th.prop('value'); 
 if(th.is(':checked')){
     $(':checkbox[value="'  + name + '"]').not($(this)).prop('checked',false); 
     $(':checkbox[value="'  + name + '"]').not($(this)).prop('disabled',true); 
 }
 else 
 {
 		//$(':checkbox[value="'  + name + '"]').not($(this)).prop('checked',true); 
     $(':checkbox[value="'  + name + '"]').not($(this)).prop('disabled',false); 


 }

  
});
*/
 
$('#checkBtn').click(function() {
        var checkbox = $('[name^="selected_subject_"]:checked').length;
        var total = $('#total_limit').val();
        if(checkbox<total)
        {
        	alert('Please select '+total+' Subjects');
        	return false;
       }

      
    				
    	});


</script>


 





