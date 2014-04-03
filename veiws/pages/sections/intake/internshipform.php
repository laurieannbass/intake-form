<?php
$INTERNSHIP = generalform::get_model('internship');
$internship = isset($entry['internship_object'])?$entry['internship_object']:array();
?>


<div class='row'>
<div class='six columns'>

<div class="formTemplate">
	<h3>Add a new internship </h3>
	<label>Date of interaction:</label>
	<input type='date' name='internship[9999][date]' data-end='+1d' />
	<input type='hidden' name='internship[9999][remove]' class='remove' value=''/>
	</br>
	<?php
		foreach($INTERNSHIP as $key=>$type){
			$lable = $key;
			$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
			if($type == 'checkbox'){
				echo "<input type='checkbox' name='internship[9999][${key}]' value='YES' /><lable>${lable}</label></br>";
			}elseif($type == 'number'){
				echo "<input type='text' name='internship[9999][${key}]' style='width:35px;' placeholder='0' /><lable>${lable}</label></br>";
			}
		}	
	?>
</div>


</div>
<div class='six columns leftborder'>


<?php if(count($internship)>0):?>
	<h3>Past internship interactions</h3>
	<div class="accordions">
        <?php
		foreach($internship as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3><div>";
			echo "<input type='hidden' name='internship[{$id}][remove]' class='remove' value=''/>";	
			echo "<input type='date' data-end='+1d' name='internship[{$id}][date]' value='{$event->date}' /><lable>Date of interaction</label></br>";	
			
			foreach($INTERNSHIP as $key=>$type){
				$lable = $key;
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
				$objProp = '$key';
				$value = isset($event->$key)?$event->$key:"";
				
				if($type == 'checkbox'){
					echo "<input type='checkbox' name='internship[{$id}][${key}]' value='YES' ".($value=='YES'?"checked='checked'":"")." /><lable>${lable}</label></br>";
				}elseif($type == 'number'){
					echo "<input type='text' name='internship[{$id}][${key}]' style='width:35px;' placeholder='0' value='".($value>0?$value:"")."' /><lable>${lable}</label></br>";
				}
			}
			
			echo "</div>";
		}
		?>
	</div>
<?php else: ?>
	<h3>Currently no past sessions for this individual</h3>
<?php endif; ?>


</div></div>