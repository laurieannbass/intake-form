<?php
$TRANSCRIPT_EVALUATIONS = generalform::get_model('transcript');
$transcript = isset($entry['transcript_object'])?$entry['transcript_object']:array();
?>




<div class='row'>
<div class='six columns'>

<div class="formTemplate">
<h3>Add a new Transcript Evaluation</h3>
	<label>Date of interaction:</label>
	<input type='date' name='transcript[9999][date]' data-end='+1d' />
	<input type='hidden' name='transcript[9999][remove]' class='remove' value=''/>
	</br>
	<?php
		foreach($TRANSCRIPT_EVALUATIONS as $key=>$type){
			$lable = $key;
			$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
			if($type == 'checkbox'){
				echo "<input type='checkbox' name='transcript[9999][${key}]' value='YES' /><lable>${lable}</label></br>";
			}elseif($type == 'number'){
				echo "<input type='text' name='transcript[9999][${key}]' style='width:35px;' placeholder='0' /><lable>${lable}</label></br>";
			}
		}	
	?>
</div>


</div>
<div class='six columns leftborder'>


<?php if(count($transcript)>0):?>
	<h3>Past transcript evaluation</h3>
	<div class="accordions">
        <?php
		foreach($transcript as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3>
			<div>";
			echo "<input type='hidden' name='transcript[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of interaction:<input type='date' data-end='+1d' name='transcript[{$id}][date]' value='{$event->date}' /></label></br>";	
			
			foreach($TRANSCRIPT_EVALUATIONS as $key=>$type){
				$lable = $key;
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
				$objProp = '$key';
				$value = isset($event->$key)?$event->$key:"";
				
				if($type == 'checkbox'){
					echo "<input type='checkbox' name='transcript[{$id}][${key}]' value='YES' ".($value=='YES'?"checked='checked'":"")." /><lable>${lable}</label></br>";
				}elseif($type == 'number'){
					echo "<input type='text' name='transcript[{$id}][${key}]' style='width:35px;' placeholder='0' value='".($value>0?$value:"")."' /><lable>${lable}</label></br>";
				}
			}
			
			echo "</div>";
		}
		?>
	</div>
<?php else: ?>
	<h3>Currently no past transcript evaluation for this individual</h3>
<?php endif; ?>


</div></div>