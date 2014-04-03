<?php
$PRIOR_LEARNING_ASSESSMENT = generalform::get_model('pla');
$pla = isset($entry['pla_object'])?$entry['pla_object']:array();
?>

<div class='row'>
<div class='six columns'>

<div class="formTemplate">
	<h3>Add a new Assessment</h3>
	<label>Date of interaction:</label>
	<input type='date' name='pla[9999][date]' data-end='+1d' />
	<input type='hidden' name='pla[9999][remove]' class='remove' value=''/>
	</br>
	<?php
		foreach($PRIOR_LEARNING_ASSESSMENT as $key=>$type){
			$lable = $key;
			$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
			if($type == 'checkbox'){
				echo "<input type='checkbox' name='pla[9999][${key}]' value='YES' /><lable>${lable}</label></br>";
			}elseif($type == 'number'){
				echo "<input type='text' name='pla[9999][${key}]' style='width:35px;' placeholder='0' /><lable>${lable}</label></br>";
			}
		}	
	?>
</div>


</div>
<div class='six columns leftborder'>


<?php if(count($pla)>0):?>
	<h3>Prior Learning Assessment</h3>
	<div class="accordions">
        <?php
		foreach($pla as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3>
			<div>";
			echo "<input type='hidden' name='pla[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of interaction:<input type='date' data-end='+1d' name='pla[{$id}][date]' value='{$event->date}' /></label></br>";	
			
			foreach($PRIOR_LEARNING_ASSESSMENT as $key=>$type){
				$lable = $key;
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
				$objProp = '$key';
				$value = isset($event->$key)?$event->$key:"";
				
				if($type == 'checkbox'){
					echo "<input type='checkbox' name='pla[{$id}][${key}]' value='YES' ".($value=='YES'?"checked='checked'":"")." /><lable>${lable}</label></br>";
				}elseif($type == 'number'){
					echo "<input type='text' name='pla[{$id}][${key}]' style='width:35px;' placeholder='0' value='".($value>0?$value:"")."' /><lable>${lable}</label></br>";
				}
			}
			
			echo "</div>";
		}
		?>
	</div>
<?php else: ?>
	<h3>Currently no prior learning assessment for this individual</h3>
<?php endif; ?>


</div></div>