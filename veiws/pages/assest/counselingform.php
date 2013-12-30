<div class="formTemplate">
<h3>Add a new counseling session</h3>
<?php
	echo "<lable>Date of interaction:</label><input type='date' name='counseling[9999][date]' data-end='+1d' /></br>";	
	echo "<lable>Received Mock Interviews:</label><input type='checkbox' name='counseling[9999][mock_interviews]' value='1' /></br>";	
	echo "<lable>Received career counseling:</label><input type='checkbox'  name='counseling[9999][career_counseling]' value='1' /></br>";		
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
			
			
			
			echo "<lable>Received Mock Interviews:</label><input type='checkbox' ".($event->mock_interviews=='1'?"checked='checked'":"")." name='counseling[{$id}][mock_interviews]' value='1' /></br>";	
			echo "<lable>Received career counseling:</label><input type='checkbox' ".($event->career_counseling=='1'?"checked='checked'":"")." name='counseling[{$id}][career_counseling]' value='1' /></br>";	
			
			
			echo "</div>";
		}
		?>
        </div>
		<?php
	}
?>