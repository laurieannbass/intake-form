<?php
$COUNSELING = generalform::get_COUNSELING();
?>
<div class="formTemplate">
<h3>Add a new counseling session</h3>
<?php
	echo "<lable>Date of interaction:</label><input type='date' name='counseling[9999][date]' data-end='+1d' /><input type='hidden' name='counseling[9999][remove]' class='remove' value=''/></br>";	

foreach($COUNSELING as $key=>$type){
	$lable = $key;
	$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
	if($type == 'checkbox'){
		echo "<input type='checkbox' name='counseling[9999][${key}]' value='YES' /><lable>${lable}</label></br>";
	}elseif($type == 'number'){
		echo "<input type='text' name='counseling[9999][${key}]' style='width:35px;' placeholder='0' /><lable>${lable}</label></br>";
	}
}	
?>
</div>
<h3>Past counseling sessions</h3>
        <?php
	//var_dump($entry);
	if(isset($entry->counseling) && count($entry->counseling)>0){
		
		?>
        <div class="accordions">
        <?php
		foreach($entry->counseling as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3><div>";
			echo "<input type='hidden' name='counseling[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of interaction:</label><input type='date' data-end='+1d' name='counseling[{$id}][date]' value='{$event->date}' /></br>";	

			foreach($COUNSELING as $key=>$type){
				$lable = $key;
				$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
				$objProp = '$key';
				$value = isset($event->$key)?$event->$key:"";
				
				if($type == 'checkbox'){
					echo "<input type='checkbox' name='counseling[{$id}][${key}]' value='YES' ".($value=='YES'?"checked='checked'":"")." /><lable>${lable}</label></br>";
				}elseif($type == 'number'){
					echo "<input type='text' name='counseling[{$id}][${key}]' style='width:35px;' placeholder='0' value='".($value>0?$value:"")."' /><lable>${lable}</label></br>";
				}
			}
			echo "</div>";
		}
		?>
        </div>
		<?php
	}
?>