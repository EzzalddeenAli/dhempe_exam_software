<?php include_once('head.php'); ?>

<div class="content">
	 <div class="gadget">
		<div class="titlebar vertsortable_head">
           		<h3 align="center">Student Details</h3>
        </div>
			<?php if(!empty($student_details)){ ?>
				<table class="main_table" border=1 width=100%;> <thead><tr >
					<th class="table-header-repeat line-left minwidth-2">PR Number</th>
					<th class="table-header-repeat line-left minwidth-1">Seat Number</th>
					<th class="table-header-repeat line-left minwidth-2">Name</th>
					<th class="table-header-repeat line-left minwidth-2">Subject 1</th>
					<th class="table-header-repeat line-left minwidth-2">Subject 2</th>
					<th class="table-header-repeat line-left minwidth-2">Subject 3</th>
					<th class="table-header-repeat line-left minwidth-2">Subject 4</th>
					<?php if($sub_num >=5) {?>
					<th class="table-header-repeat line-left minwidth-2">Subject 5</th>
					<?php }if($sub_num >=6){?>
					<th class="table-header-repeat line-left minwidth-2">Subject 6</th>
					<?php } if($sub_num >=7) {?>
					<th class="table-header-repeat line-left minwidth-2">Subject 7</th>
					<?php } if($sub_num >=8) {?>
					<th class="table-header-repeat line-left minwidth-2">Subject 8</th>
					<?php  }?>
					
					</tr>

					<?php foreach($student_details as $row){ ?>				
					<tr>
						<td><?php echo $row['pr_number']; ?></td>
						<td><?php echo $row['seat_number']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['subject1']; ?></td>
						<td><?php echo $row['subject2']; ?></td>
						<td><?php echo $row['subject3']; ?></td>
						<td><?php echo $row['subject4']; ?></td>
						<?php if($sub_num >=5) {?>
						<td><?php echo $row['subject5']; ?></td>
						<?php }if($sub_num >=6){?>
						<td><?php echo $row['subject6']; ?></td>
						<?php }if($sub_num >=7){?>
						<td><?php echo $row['subject7']; ?></td>
						<?php }if($sub_num >=8){?>
						<td><?php echo $row['subject8']; ?></td>
						<?php  }?>
					</tr>
					<?php } ?>
				</table>
			<?php }else { ?>
			<table border="0" style="border-collapse:collapse; margin-left:50px;">
					<tr><td>No Student Found</td></tr>
			</table>
			<?php } ?>
	</div>
</div>	
<?php include_once('foot.php'); ?>
			