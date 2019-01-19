<?php include_once 'head.php';?>

<?php

$stream_tbl = (explode("_", $stream));

$stream_table = $stream_tbl[0];
$table_name = $stream_table . '_sub_' . $semester;

if ($stream == "bsc_student_detail_") {$stream_display = "B.S.C";} else if ($stream == "ba_student_detail_") {$stream_display = "B.A";} else if ($stream == "bsc_cmp_sci_sub_") {$stream_display = "B.S.C(computer)";}

if ($semester == "sem_1") {$semester_display = "Semester 1";} else if ($semester == "sem_2") {$semester_display = "Semester 2";} else if ($semester == "sem_3") {$semester_display = "Semester 3";} else if ($semester == "sem_4") {$semester_display = "Semester 4";}

$sort_stream = $stream_table . '_sub_';

?>



<?php

$subject = $this->db->query("SELECT * FROM $table_name ORDER BY sub_name ASC;");
$subjectDetailsArray = array();

$subject_sort_array = array();

$query_1 = $this->db->query("SELECT distinct subject_type from subject_type_limit WHERE stream='" . $sort_stream . "' AND semester='" . $semester . "' ORDER BY sort_order ;");

//generate the limits of each subject type
foreach ($query_1->result() as $row) {
    $subject_sort_array[] = $row->subject_type;

}

foreach ($subject->result() as $row) {
    $subjectDetailsArray[$row->sub_id] = $row->sub_name;
    $subject_type_array = (explode("_", $row->subject_type));
    foreach ($subject_type_array as $details) {

        $all[$details][] = $row->sub_id;
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


<?php
if (isset($studentdetail)) {
    foreach ($studentdetail as $row) {
        $name = $row->name;
        $pr = $row->pr_number;
        $block = $row->block;
        $seat = $row->seat_number;
        $gen = $row->gender;
        $sports_cat = $row->sports_category;
        $ncc_nss_cat =  $row->ncc_nss_category;
        $sports_rew = $row->sports_rewards;
        $entitle_grace = $row->entitlement_grace_alloc; // TODO: ncc_nss_grace_alloc
        $sports_grace = $row->sports_grace_alloc;
        $subj_1 = $row->subj_1;
        $subj_1 .= "/" . $row->subj_3 . "/" . $row->subj_5;
        $type = $row->supplementary;
        $subject_details = (array) json_decode($row->subj_details);

    }
}

if ($gen == "M") {
    $set = true;
    $set1 = false;
} else {
    $set = false;
    $set1 = true;
}
//supplementary
if ($type == 0) {
    $set_type = true;
    $set_type1 = false;
} else {
    $set_type = false;
    $set_type1 = true;
}
if ($entitle_grace > 0) {
    $ok = true;
} else {
    $ok = false;
}

//name is set in database or note
if (!isset($pr)) {
    $reg_number = array(
        'name' => 'pr_number',
        'value' => '',
        'class' => 'my_inp_form',
    );
} else {
    $reg_number = array(
        'name' => 'pr_number',
        'value' => $pr,
        'class' => 'my_inp_form',
    );
}

if (!isset($name)) {
    $data = array(
        'name' => 'Name',
        'value' => '',
        'class' => 'my_inp_form',
    );
} else {
    $data = array(
        'name' => 'Name',
        'value' => $name,
        'class' => 'my_inp_form',
    );
}

//get seat number from database
if (!isset($seat)) {
    $seat_data = array(
        'name' => 'Seat',
        'value' => '',
        'id' => 'seat_test',
        'class' => 'my_inp_form',
    );
} else {
    $seat_data = array(
        'name' => 'Seat',
        'value' => $seat,
        'id' => 'seat_test',
        'class' => 'my_inp_form',
    );
}

//get sports data from database
if ($sports_cat != "") {
    $sel_option = $sports_cat;
    $tick_sports = true;
    $se_rew = $sports_rew;
    $sports_data = array(
        'name' => 'Sports_cat1',
        'id' => 'sports_test',
    );
} else {
    $sel_option = "A";
    $tick_sports = false;
    $se_rew = "participation";
    $sports_data = array(
        'name' => 'Sports',
        'id' => 'sports_test',
    );
}

//get ncc_nss data from database
if ($ncc_nss_cat != "") {
    $sel_option_ncc_nss = $ncc_nss_cat;
} else {
    $sel_option_ncc_nss = "A";
}


$options = array(
    "A" => "World/International",
    "B" => "World/International/Asian",
    "C" => "Nationals",
    "D1" => "National Inter University",
    "D2" => "Zonal Inter University",
    "E" => "inter univerity state level"
);

$NCC_NSS_options = array(
    "A" => "Regular Participation",
    "B" => "ATC",
    "C" => "NIC(National Integration Camp 10 Days)",
    "D" => "Independence Day Camp",
    "E" => "Tal Sena Camp(Group)",
    "F" => "B Certificate",
    "G" => "C Certificate",
    "H" => "Pre-RD(Group)(10 days)",
    "I" => "Pre-RD(Directorate)(10 days)",
    "J" => "RD Parade New Delhi",
    "K" => "Youth Exchange Programme(YEP at International Level in addition to RD parade marks)",
    "L" => "Any camp attended outside Goa(Group level)",
    "M" => "Any camp attended outside Goa(Directorate level)",
    "N" => "Any Camp That is of Inter Group Competition(IGC)"
);

$rewards = array(
    "participation" => "Participation",
    "winner" => "Gold",
    "runners_up" => "Bronze",
    "semi_finalist" => "Silver"
);

?>



<script type="text/javascript">

	function check(){
		//PR Number
		var x=document.forms["myForm"]["pr_number"].value;
		if (x==null || x==""){
  			alert("Enter PR Number");
  			return false;
  		}
		var letters = /^[0-9]+$/;
   		if(x.match(letters))  {
		}else{
     		alert("Enter Number Only / Don\'t Enter Characters");
     		return false;
     	}

		//seat Number
		var x=document.forms["myForm"]["Seat"].value;
		if (x==null || x==""){
  			alert("Enter Seat Number");
  			return false;
  		}
		var letters = /^[0-9]+$/;
   		if(x.match(letters))  {
		}else{
     		alert("Enter Number Only / Don\'t Enter Characters");
     		return false;
     	}

		//Name
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
	}

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/1.7.2/jquery.min.js"></script>


<div class="content">
	 	<div class="gadget">
          	<div class="titlebar vertsortable_head">
           		<h3 align="center">Stream : <?php echo $stream_display; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $semester_display; ?></h3>
         	</div>
		 	<div class="gadgetblock">
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>assets/images/shared/side_shadowleft.jpg" width="20" height="150" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>assets/images/shared/side_shadowright.jpg" width="20" height="150" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<div id="content-table-inner">

			<!--  start table-content  -->
			<div id="table-content">


				<?php $form_data = array('name' => "myForm", "id" => "formData");?>
				<?php echo form_open('home/editStudent_generic', $form_data);
					$js = 'class="my_select"'; ?>

				<?php $tl_name = $stream_table . '_student_detail_' . $semester;?>
				<input type="hidden" value="<?php echo $tl_name; ?>" name="tbl_name" />

				<?php

$max_aggr = $this->db->query("SELECT * FROM $table_name LIMIT 1;");

foreach ($max_aggr->result() as $row) {$total_marks = $row->max_agg_marks;}
?>
				<input type="hidden" value="<?php echo $total_marks; ?>" name="MaxaggMark" />

				<input type="hidden" value="<?php echo $pr; ?>" name="pr" />
				<input type="hidden" value="<?php echo $seat; ?>" name="seat_old" />
				<input style="display:none;" value="<?php echo $type; ?>" name="type_old" />
				<ol>
             		<li>

					<h4>Fresh <?php echo form_radio('type', '0', $set_type); ?>
							Supplementary <?php echo form_radio('type', '1', $set_type1); ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blocked:&nbsp;
							<?php if ($block == 1) {echo '<input type="checkbox" name="block" id="block" value=1 checked>';} else {echo '<input type="checkbox" name="block" id="block" value=1>';}

?></h4><br><br>
						<div style="float:left;">
							<h4>Name <?php echo form_input($data); ?></h4>
						</div>

						<div style="float:left; margin-left:20px;">
							<h4>pr_number <?php echo form_input($reg_number); ?></h4>
						</div>

						<div style="float:left; margin-left:20px;">
							<h4>Seat_number <?php echo form_input($seat_data); ?></h4>
						</div>
						<div style="float: left; margin-left:50px;">
							<h4>Male <?php echo form_radio('gender', 'M', $set); ?>
							Female <?php echo form_radio('gender', 'F', $set1); ?></h4>
						</div>
					</li>


					<li>
					<h4>
			  			<div style="clear:both;">
			  				<div><br><br>
							NSS/NCC <?php echo form_checkbox('nss', '1', $ok); ?>
                            Category<?php echo buildCheckboxList('ncc_nss_cat',$NCC_NSS_options, $sel_option_ncc_nss);?>
                            <br/><br/>
							Sports <?php echo form_checkbox('sports', '1', $tick_sports); ?>
							Category<?php echo form_dropdown('cat', $options, $sel_option, $js); ?>
							Rewards<?php echo form_dropdown('rewards', $rewards, $se_rew, $js); ?>
						</div>
						</div>
					</h4>
					</li>


			  			<h4>
			  			<div style="margin-top:20px; clear: both;">
							Selected Subject
						</div>

							<div id="apnd" style="margin-top:20px;">
								<?php
$checked_sub = array();

$checked_sub = array_keys($subject_details);
$total = 0;
$i = 0;
$all_subject = array();
foreach ($properOrderedArray as $type => $val) {

    $stream_name = $stream_table . '_sub_';
    $query = $this->db->query("SELECT number from subject_type_limit WHERE stream='" . $stream_name . "' AND subject_type='" . $type . "' AND semester='" . $semester . "';");

    //generate the limits of each subject type
    foreach ($query->result() as $row) {
        $sub_limit = $row->number;

        $total = $total + $sub_limit;

    }

    echo '<div class="question" data-max-answers=' . $sub_limit . '>';
    echo '<table id="t01">';
    echo '<th>';
    echo $type;

    //create subject type array

    $all_subject[$i] = $type;
    $i++;

    echo '</th>';
    echo '<th>';
    echo '</th>';
    $this_type_count = 0;
    $disabled_val = 'enabled';
    foreach ($val as $subject) {

        if ($this_type_count >= $sub_limit) {
            $disabled_val = 'disabled';
        }

        if (in_array($subject, $checked_sub)) {
            $this_type_count++;
        }

    }
    foreach ($val as $subject) {

        $sub_name = $subjectDetailsArray[$subject];
        echo '<tr>';
        echo '<td>';
        echo $sub_name;
        echo '</td>';
        echo '<td>';

        /*     echo '<pre>';
        ECHO $type;
        echo $sub_name;
        echo '<br>';
        print_r($checked_sub);
        print_r($subject_details) ;
        echo $subject ;

        exit();
         */

        if (in_array($subject, $checked_sub)) {

            $cb_data = array(
                'name' => 'selected_subject_' . $type . '[]',
                'id' => $type,
                'value' => $subject,
                'class' => $type,
                'data-max' => $sub_limit,
                'checked' => true,
            );

            echo form_checkbox($cb_data);

        } else {
            $cb_data = array(
                'name' => 'selected_subject_' . $type . '[]',
                'id' => $type,
                'value' => $subject,
                'class' => $type,
                'data-max' => $sub_limit,
                'checked' => false,
                $disabled_val => $disabled_val,
            );

            echo form_checkbox($cb_data);

        }

        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';

}

$subj_types = implode("_", $all_subject);
echo form_hidden('all_subjects', $subj_types);

$total_data = array(
    'type' => 'hidden',
    'id' => 'total_limit',
    'value' => $total,
    'class' => 'total_limit',

);

echo form_input($total_data);

?>


						</div>

			 		<li>
			  		<div style="clear:both;">
				<input style="margin-top:20px;" id="p" type="submit" value="Save" onclick="return check();" class="my_button_submit"/>
						<input id="refresh" type="button" value="Refresh" class="my_button_submit"/>
						<input id="back" type="button" value="Back" class="my_button_submit"/>
					</div>
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
<?php echo form_close(); ?>
<?php include 'foot.php';?>

<script type="text/javascript">
	$('#refresh').click(function(){
		location.reload();
	});

	$('#back').click(function(){
		window.location='<?php echo base_url(); ?>index.php/home/editStudent';
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




/*
$(':checkbox').on('change',function(){
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


$('#p').click(function() {
        var checkbox = $('[name^="selected_subject_"]:checked').length;
        var total = $('#total_limit').val();

        if(checkbox<total)
        {
        	alert('Please select '+total+' Subjects');
        	return false;
       }
       else if(checkbox>total)
       {
       		var diff=checkbox-total;
       	alert('Extra '+diff+' Subjects');
        	return false;

       }




    	});


</script>
