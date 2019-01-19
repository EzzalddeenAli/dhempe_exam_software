<?php include_once('head.php'); ?>

	<style>
	.main_table td {padding: 4px 0px 10px 10px !important;}
	.main_table {
margin-bottom: 20px;
border: none;
}
a {font-size: 11px;}
td {font-size: 13px;}
</style>	

				
			<?php echo form_open('supple_grace_controller/each_sub_marks_prev'); ?>
			<?php 
					$displaynss="display:none;";
					$displaysports="display:none;";
					
					if($sports_priority==0) 
					{
					  if($nss_priority==1)
					  {$displaynss="";
					  }
					}
					else 
					{$displaysports="";
					
					}
					?>
					<br />
					<br />
					<br />
					<br />
					<b>PR Number: <?php echo $pr_number; ?></b>
					<br />
					<br />
					
			<table class="main_table" border=1 width=100%;> <thead><tr >
				
				<th class="table-header-repeat line-left minwidth-2">Subject Name</th>
				<th class="table-header-repeat line-left minwidth-2">I.S.A.</th>
				<th class="table-header-repeat line-left minwidth-2">S.E.E.</th>
				<th class="table-header-repeat line-left minwidth-1">General Grace(T)</th>
				<th class="table-header-repeat line-left minwidth-1" style="<?php echo $displaysports; ?>">Sports Grace(T)</th>
				<th class="table-header-repeat line-left minwidth-1" style="<?php echo $displaynss; ?>">NSS Grace(T)</th>
				<th class="table-header-repeat line-left minwidth-1">Practicle</th>
				<th class="table-header-repeat line-left minwidth-1">General Grace(P)</th>
				<th class="table-header-repeat line-left minwidth-1" style="<?php echo $displaysports; ?>">Sports Grace(P)</th>
				<th class="table-header-repeat line-left minwidth-2" style="<?php echo $displaynss; ?>">NSS Grace(P)</th>
				<th class="table-header-repeat line-left minwidth-2">Total</th>
				

					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
				</tr>
				<?php $s=0; ?>
				
				<?php 
				
				
				foreach($subject_structure as $subj_details){ ?>
					<?php
						
						$sportsgrace=$nssgrace='';
						$total =0;
				$gen_grace_theory="";
				$gen_grace_pracs="";
				
						if($marks[$subj_details['sub_id']][0]['gen_the_pract_sym']!="" && (strpos($marks[$subj_details['sub_id']][0]['gen_the_pract_sym'],'$') == true))//gen grace allocated and pracs have gen grace
						{
						$gen_grace_pracs=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_the_pract_sym']);
						$gen_grace_theory=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_symbol'])-preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_the_pract_sym']);
						if($gen_grace_theory<=0)$gen_grace_theory="";
						}
						else if($marks[$subj_details['sub_id']][0]['gen_symbol']!="")//no prac gen grace but theory there
						{
						$gen_grace_theory=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_symbol']);
						}
					$nssgrace_pracs="";
						$nssgrace_theory="";
				if($displaynss=="")//nss_gr
				{
						if($marks[$subj_details['sub_id']][0]['gen_the_pract_sym']!="" && (strpos($marks[$subj_details['sub_id']][0]['gen_the_pract_sym'],'#') == true) )//pracs nss grace allocated
						{
						$nssgrace_pracs=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_the_pract_sym']);
						$nssgrace_theory=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['activity_symbol'])-preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_the_pract_sym']);
						if($nssgrace_theory==0)$nssgrace_theory="";
						}
						else if($marks[$subj_details['sub_id']][0]['activity_symbol']!="")
						{
						$nssgrace_theory=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['activity_symbol']);
						}
				
				$sportsgrace='';
					}
					$sports_grace_theory="";
				$sports_grace_pracs="";
					if($displaysports=="")//sp_gr
				{
				
						if($marks[$subj_details['sub_id']][0]['gen_the_pract_sym']!="" && (strpos($marks[$subj_details['sub_id']][0]['gen_the_pract_sym'],'#') == true) )//pracs sp grace allocated
						{
						$sports_grace_pracs=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_the_pract_sym']);
						$sports_grace_theory=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['activity_symbol'])-preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['gen_the_pract_sym']);
						if($sports_grace_theory<=0)
						$sports_grace_theory="";
						}
						else if($marks[$subj_details['sub_id']][0]['activity_symbol']!="")
						{
						$sports_grace_theory=preg_replace("/[^0-9]/","",$marks[$subj_details['sub_id']][0]['activity_symbol']);
						}
				}
				
				
								
					
					?>
					

				<tr>
					<td><?php echo $subj_details['sub_name']; ?></td>
					<td><input align="center" style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "I".$subj_details['sub_id']; ?>" name="<?php echo "isa".$subj_details['sub_id']; ?>" value="<?php if ($marks[$subj_details['sub_id']][0]['isa_abs']=='A')echo 'A'; else echo $marks[$subj_details['sub_id']][0]['internal'];?>" onchange="add('<?php echo $subj_details['sub_id']; ?>');" class="my_inp_form" /></td>
					
						
					
					<td><input style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "S".$subj_details['sub_id']; ?>" name="<?php echo "see".$subj_details['sub_id']; ?>" value="<?php if ($marks[$subj_details['sub_id']][0]['see_abs']=='A')echo 'A'; else echo $marks[$subj_details['sub_id']][0]['theory'];?>" onchange="add('<?php echo $subj_details['sub_id']; ?>');" class="my_inp_form" /></td>
						<td style="padding-left: 10px;"><input style="padding-left: 10px;width: 50px;" onchange="validate_gen('<?php echo $subj_details['sub_id']; ?>','T');" type="text" id="<?php echo "gen_graceT".$subj_details['sub_id']; ?>" name="<?php echo "gen_graceT".$subj_details['sub_id']; ?>" value="<?php  echo $gen_grace_theory;?>" class="my_inp_form" /> $</td>
					
					
					<td style="<?php echo $displaysports; ?>"><input style="padding-left: 10px;width: 50px;" type="text" onchange="validate_sports('<?php echo $subj_details['sub_id']; ?>','T');" id="<?php echo "sports_graceT".$subj_details['sub_id']; ?>" name="<?php echo "sports_graceT".$subj_details['sub_id']; ?>" value="<?php echo $sports_grace_theory?>" class="my_inp_form" /> #</td>
					
					<td style="<?php echo $displaynss; ?>"><input onchange="validate_nss('<?php echo $subj_details['sub_id']; ?>','T');" style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "nss_graceT".$subj_details['sub_id']; ?>" name="<?php echo "nss_graceT".$subj_details['sub_id']; ?>" value="<?php echo $nssgrace_theory?>" class="my_inp_form" /> #</td>
					<?php if($subj_details['practical_marks'] != -1){ ?>
						<td><input style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "P".$subj_details['sub_id']; ?>"  name="<?php echo "pract".$subj_details['sub_id']; ?>" value="<?php if ($marks[$subj_details['sub_id']][0]['pract_abs']=='A')echo 'A'; else echo $marks[$subj_details['sub_id']][0]['practicle'];?>" onchange="add('<?php echo $subj_details['sub_id']; ?>');" class="my_inp_form" /></td>
							<td style="padding-left: 10px;"><input style="padding-left: 10px;width: 50px;" onchange="validate_gen('<?php echo $subj_details['sub_id']; ?>','P');" type="text" id="<?php echo "gen_graceP".$subj_details['sub_id']; ?>" name="<?php echo "gen_graceP".$subj_details['sub_id']; ?>" value="<?php  echo $gen_grace_pracs;?>" class="my_inp_form" /> $</td>
					
					
					<td style="<?php echo $displaysports; ?>"><input style="padding-left: 10px;width: 50px;" type="text" onchange="validate_sports('<?php echo $subj_details['sub_id']; ?>','P');" id="<?php echo "sports_graceP".$subj_details['sub_id']; ?>" name="<?php echo "sports_graceP".$subj_details['sub_id']; ?>" value="<?php echo $sports_grace_pracs;?>" class="my_inp_form" /> #</td>
				
					
					<td style="<?php echo $displaynss; ?>"><input onchange="validate_nss('<?php echo $subj_details['sub_id']; ?>','P');" style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "nss_graceP".$subj_details['sub_id']; ?>" name="<?php echo "nss_graceP".$subj_details['sub_id']; ?>" value="<?php echo $nssgrace_pracs?>" class="my_inp_form" /> #</td>
					
					<?php }else{ ?>
						<td><input style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "P".$subj_details['sub_id']; ?>" name="<?php echo "pract".$subj_details['sub_id']; ?>" value="<?php echo "N.A."; ?>" readonly="readonly" onchange="add('<?php echo $subj_details['sub_id']; ?>');" class="my_inp_form" /></td>
							<td style="padding-left: 10px;"><input readonly style="padding-left: 10px;width: 50px;" onchange="validate_gen('<?php echo $subj_details['sub_id']; ?>','P');" type="text" id="<?php echo "gen_graceP".$subj_details['sub_id']; ?>" name="<?php echo "gen_graceP".$subj_details['sub_id']; ?>" value="N.A." class="my_inp_form" /></td>
					
					
					<td style="<?php echo $displaysports; ?>"><input readonly style="padding-left: 10px;width: 50px;" type="text" onchange="validate_sports('<?php echo $subj_details['sub_id']; ?>','P');" id="<?php echo "sports_graceP".$subj_details['sub_id']; ?>" name="<?php echo "sports_graceP".$subj_details['sub_id']; ?>" value="N.A." class="my_inp_form" /></td>
					
					<td style="<?php echo $displaynss; ?>"><input readonly onchange="validate_nss('<?php echo $subj_details['sub_id']; ?>','P');" style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "nss_graceP".$subj_details['sub_id']; ?>" name="<?php echo "nss_graceP".$subj_details['sub_id']; ?>" value="N.A." class="my_inp_form" /></td>
						
					<?php } ?>
					<td><input style="padding-left: 10px;width: 50px;" type="text" id="<?php echo "t".$subj_details['sub_id']; ?>" name="<?php echo "total".$subj_details['sub_id']; ?>" value="<?php  echo $marks[$subj_details['sub_id']][0]['total'];?>"  class="my_inp_form" /></td>
				
					
					

<td style="border: none;"><a style= "color: black;"  id="<?php echo "I2".$subj_details['sub_id']; ?>" onclick="markABS('<?php echo "I".$subj_details['sub_id']; ?>')">I.S.A ABS</a></td>
<td style="border: none;"><a style= "color: black;"  id="<?php echo "S2".$subj_details['sub_id']; ?>"  onclick="markABS('<?php echo "S".$subj_details['sub_id']; ?>')">S.E.E ABS</a></td>
<?php if($subj_details['practical_marks'] != -1){ ?>
<td style="border: none;"><a style= "color: black;"  id="<?php echo "P2".$subj_details['sub_id']; ?>"  onclick="markABS('<?php echo "P".$subj_details['sub_id']; ?>')">PRACT ABS</a></td>
<?php }
else {echo '<td style="border: none;"></td>';}
?>

				</tr>
				<input type="hidden" name="subjid[]" value="<?php echo $subj_details['sub_id']; ?>" />
				<input type="hidden" name="<?php echo "isa_pass".$subj_details['sub_id']; ?>" id="<?php echo "isa_pass".$subj_details['sub_id']; ?>" value="<?php echo $subj_details['internal_marks']; ?>"/>
				<input type="hidden" name="<?php echo "see_pass".$subj_details['sub_id']; ?>" id="<?php echo "see_pass".$subj_details['sub_id']; ?>" value="<?php echo $subj_details['semester_marks']; ?>"/>
				<input type="hidden" name="<?php echo "pra_pass".$subj_details['sub_id']; ?>" id="<?php echo "pra_pass".$subj_details['sub_id']; ?>" value="<?php echo $subj_details['practical_marks']; ?>"/>
				
				<input type="hidden" name="<?php echo "min_theory".$subj_details['sub_id']; ?>" value="<?php echo $subj_details['minimum_theory'] ; ?>"/>
				<input type="hidden" name="<?php echo "min_pract".$subj_details['sub_id']; ?>" value="<?php echo $subj_details['min_practical']; ?>"/>
				
				<input type="hidden" name="<?php echo "min_total".$subj_details['sub_id']; ?>" value="<?php echo $subj_details['total']; ?>"/>
				<input type="hidden" name="<?php echo "max_agg".$subj_details['sub_id']; ?>" value="<?php echo $subj_details['max_agg_marks']; ?>"/>
				
				
				
				<?php $s++; } ?>
				<input type="hidden" name="max_gen"  id="max_gen" value="<?php echo $total_gen_grace_alloc; ?>"/>
				<input type="hidden" name="max_sports"  id="max_sports" value="<?php echo $total_sports_grace_alloc; ?>"/>
				<input type="hidden" name="max_nss"  id="max_nss" value="<?php echo $total_nss_grace_alloc; ?>"/>
				<input type="hidden" name="alloc_gen"  id="alloc_gen" value="<?php echo $gen_grace_alloc; ?>"/>
				<input type="hidden" name="alloc_sports"  id="alloc_sports" value="<?php echo $sports_grace_alloc; ?>"/>
				<input type="hidden" name="alloc_nss"  id="alloc_nss" value="<?php echo $nss_grace_alloc; ?>"/>
			</table>
			<input type="hidden" name="pr_number" value="<?php echo $pr_number; ?>"/>
			<input type="hidden" name="supple_seat_number" value="<?php echo $supple_seat_number; ?>"/>
			<input type="hidden" name="no_of_attempt" value="<?php echo $no_of_attempt; ?>"/>
			<input type="hidden" name="stream" value="<?php echo $stream; ?>"/>
			<input type="hidden" name="semester" value="<?php echo $semester; ?>"/>
			
			<?php echo form_submit('submit','Enter Marks','onClick="return validate()" class="my_button_submit"'); ?>
			<?php form_close(); ?>
			<br/><br/>
<?php include_once('foot.php'); ?>
			


<script type="text/ecmascript">
/*	function markABS(id){
		alert(id);
		alert(substr(id,0,1));
		return false;
	}
*/
</script>



<script type="text/javascript">

	function add(id){
		var isa   = $('#I'+id).val();
		var see   = $('#S'+id).val();
		var pract = $('#P'+id).val();

		if(((isNaN(parseInt(isa)) || (isNaN(isa))) && isa!="")||isa<0)
		{
		alert('Please Enter only Positive numbers');
		$('#I'+id).val("");
		
		}
		
		if((Number(isa) > Number($('#isa_pass'+id).val())) && isa!="A" )
		{
		alert('ISA Marks cannot be greater than Maximum ISA Marks('+$('#isa_pass'+id).val()+')');
		$('#I'+id).val("");
		
		}
		if(((isNaN(parseInt(see)) || (isNaN(see))) && see!="")||see<0)
		{
		alert('Please Enter only Positive numbers');
		$('#S'+id).val("");
		
		}
		
		if(Number(see)> Number($('#see_pass'+id).val()) && see!="A" )
		{
		alert('SEE Marks cannot be greater than Maximum SEE Marks('+$('#see_pass'+id).val()+')');
		$('#S'+id).val("");
		
		}
		if(((isNaN(parseInt(pract)) || (isNaN(pract))) && pract!="" && pract!="N.A.")||pract<0)
		{
		alert('Please Enter only Positive numbers');
		$('#P'+id).val("");
		
		}
		if(Number(pract)> Number($('#pra_pass'+id).val()) && pract!="N.A.")
		{
		alert('Practical Marks cannot be greater than Maximum Practical Marks('+$('#pra_pass'+id).val()+')');
		$('#P'+id).val("");
		
		}
		isa   = $('#I'+id).val();
		see   = $('#S'+id).val();
		pract = $('#P'+id).val();
		if(isa == 'A' || isa=='' ||isNaN(isa) )
			i = 0;
		else
			i = parseInt($('#I'+id).val());
		if(see == 'A' || see=='' ||isNaN(see) )
			s  = 0;
		else 
			s = parseInt($('#S'+id).val());
		if((pract == 'A')||(pract == "N.A.") || pract==''  ||isNaN(pract) )
			p = 0;	
		else
			p = parseInt($('#P'+id).val());	
		
		var total = i+s+p;
		//alert(total);
		$('#t'+id).val(total);
	}
	
	function validate_gen(id,type){
		var gen_grace   = $('#gen_grace'+type+id).val();
		
		if((((isNaN(parseInt(gen_grace)) || (isNaN(gen_grace)))) && gen_grace!="")||gen_grace<0)
		{
		alert('Please Enter only Positive numbers');
		$('#gen_grace'+type+id).val("");
		
		}
		var proper=1;
		if(Number(gen_grace) + Number($('#alloc_gen').val())> Number($('#max_gen').val()))
		{
		alert('General Grace Marks cannot be greater than Allocated General Grace Marks('+$('#max_gen').val()+')');
		$('#gen_grace'+type+id).val("");
		proper=0;
		}
		if(proper==1)
		{
		var used=0;
		<?php foreach($subject_structure as $subj_details)
		{ ?>
		
		if(type=='T')
		{
			if($('<?php echo '#gen_graceT'.$subj_details['sub_id']; ?>').val()!="")
			used=used+Number($('<?php echo '#gen_graceT'.$subj_details['sub_id']; ?>').val());
			}
			
			if(type=='P')
		{
			if($('<?php echo '#gen_graceP'.$subj_details['sub_id']; ?>').val()!="")
			used=used+Number($('<?php echo '#gen_graceP'.$subj_details['sub_id']; ?>').val());
			}
			<?php } ?>
			
		$('#alloc_gen').val(used);
			}
			
		
	
	
	
		}
	
	function validate_sports(id,type){
		var sports_grace   = $('#sports_grace'+type+id).val();
		
		if((((isNaN(parseInt(sports_grace)) || (isNaN(sports_grace)))) && sports_grace!="")||sports_grace<0)
		{
		alert('Please Enter only Positive numbers');
		$('#sports_grace'+type+id).val("");
		
		}
		var proper=1;
		if(Number(sports_grace) + Number($('#alloc_sports').val())> Number($('#max_sports').val()))
		{
		alert('Sports Grace Marks cannot be greater than Allocated Sports Grace Marks('+$('#max_sports').val()+')');
		$('#sports_grace'+type+id).val("");
		proper=0;
		}
		if(proper==1)
		{
		var used=0;
		<?php foreach($subject_structure as $subj_details)
		{ ?>
		
		
			
			if(type=='T')
		{
			if($('<?php echo '#sports_graceT'.$subj_details['sub_id']; ?>').val()!="")
			used=used+Number($('<?php echo '#sports_graceT'.$subj_details['sub_id']; ?>').val());
			}
			
			if(type=='P')
		{
			if($('<?php echo '#sports_graceP'.$subj_details['sub_id']; ?>').val()!="")
			used=used+Number($('<?php echo '#sports_graceP'.$subj_details['sub_id']; ?>').val());
			}
			
			<?php } ?>
			
		$('#alloc_sports').val(used);
			}
			
		
	
	
	
		}
	
	function validate_nss(id,type){
		var nss_grace   = $('#nss_grace'+type+id).val();
		
		if((((isNaN(parseInt(nss_grace)) || (isNaN(nss_grace)))) && nss_grace!="")||nss_grace<0)
		{
		alert('Please Enter only Positive numbers');
		$('#nss_grace'+type+id).val("");

		}
		var proper=1;
		if(Number(nss_grace) + Number($('#alloc_nss').val())> Number($('#max_nss').val()))
		{
		alert('Sports Grace Marks cannot be greater than Allocated Sports Grace Marks('+$('#max_nss').val()+')');
		$('#nss_grace'+type+id).val("");
		proper=0;
		}
		if(proper==1)
		{
		var used=0;
		<?php foreach($subject_structure as $subj_details)
		{ ?>
		
			
				if(type=='T')
		{
			if($('<?php echo '#nss_graceT'.$subj_details['sub_id']; ?>').val()!="")
			used=used+Number($('<?php echo '#nss_graceT'.$subj_details['sub_id']; ?>').val());
			}
			
			if(type=='P')
		{
			if($('<?php echo '#nss_graceP'.$subj_details['sub_id']; ?>').val()!="")
			used=used+Number($('<?php echo '#nss_graceP'.$subj_details['sub_id']; ?>').val());
			}
			
			<?php } ?>
			
		$('#alloc_nss').val(used);
			}
			
		
	
	
	
		}
	
	function validate(){
		<?php foreach($subject_structure as $subj_details)
		{ ?>
		
		
			if($('<?php echo '#I'.$subj_details['sub_id']; ?>').val()==""||$('<?php echo '#S'.$subj_details['sub_id']; ?>').val()==""||$('<?php echo '#P'.$subj_details['sub_id']; ?>').val()=="")
			{
			alert('Please Enter Marks For All Subjects Or Choose Absent if Student is Absent');
			return false;
			}
			
			<?php } ?>
	
		}
	
	function markABS(id){
		if($('#'+id).val() == 'A')
			{$('#'+id).val("");
			$("#"+id).attr('readonly','');
			}
		else	
		{
			$('#'+id).val('A');
			$("#"+id).attr('readonly','readonly');
			}
				
		var sub_id = id.slice(1);	// remove 1st char
		var isa   = $('#I'+sub_id).val();
		var see   = $('#S'+sub_id).val();
		var pract = $('#P'+sub_id).val();
		if(isa == 'A' ||isa == '')
			i = 0;
		else
			i = parseInt($('#I'+sub_id).val());
		if(see == 'A' ||see == '')
			s  = 0;
		else 
			s = parseInt($('#S'+sub_id).val());
		if((pract == 'A')||(pract == "N.A.")||pract == '')
			p = 0;	
		else
			p = parseInt($('#P'+sub_id).val());		
		//var total = i+s+p;
		var total = i+s;
		$('#t'+sub_id).val(total);
		return false;
	}
</script>
