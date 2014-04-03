<?php
$COUNSELING = generalform::get_model('counseling');
$counseling = isset($entry['counseling_object'])?$entry['counseling_object']:array();
?>
<div class='row'>
<div class='six columns'>

<div class="formTemplate">
	<h3>Add a new counseling session</h3>
	<label>Date of interaction:</label>
	<input type='date' name='counseling[9999][date]' data-end='+1d' />
	<input type='hidden' name='counseling[9999][remove]' class='remove' value=''/>
	</br>
	<?php
		foreach($COUNSELING as $key=>$item){
			if($item['type'] == 'checkbox'){
				echo "<input type='checkbox' name='counseling[9999][${key}]' value='YES' /><lable>${item['lable']}</label></br>";
			}elseif($item['type'] == 'number'){
				echo "<input type='text' name='counseling[9999][${key}]' style='width:35px;' placeholder='0' /><lable>${item['lable']}</label></br>";
			}
		}	
	?>
</div>


</div>
<div class='six columns leftborder'>


<?php if(count($counseling)>0):?>
	<h3>Past counseling sessions</h3>
	<div class="accordions">
		<?php
		foreach($counseling as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3><div>";
			echo "<input type='hidden' name='counseling[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of interaction:</label><input type='date' data-end='+1d' name='counseling[{$id}][date]' value='{$event->date}' /></br>";	
	
			foreach($COUNSELING as $key=>$item){
				$objProp = '$key';
				$value = isset($event->$key)?$event->$key:"";
				
				if($item['type'] == 'checkbox'){
					echo "<input type='checkbox' name='counseling[{$id}][${key}]' value='YES' ".($value=='YES'?"checked='checked'":"")." /><lable>${item['lable']}</label></br>";
				}elseif($item['type'] == 'number'){
					echo "<input type='text' name='counseling[{$id}][${key}]' style='width:35px;' placeholder='0' value='".($value>0?$value:"")."' /><lable>${item['lable']}</label></br>";
				}
			}
			echo "</div>";
		}?>
	
	</div>
<?php else: ?>
	<h3>Currently no past sessions for this individual</h3>
<?php endif; ?>


</div></div>