<div class="formTemplate">
<h3>Add a new counseling session</h3>
<?php
	echo "<lable>Date of interaction:</label><input type='date' name='counseling[9999][date]' data-end='+1d' /></br>";	


                       
	echo "<input type='checkbox' name='counseling[9999][got_counseling]' value='1' /><lable>Did the student get career counseling:</label></br>";   
	echo "<input type='checkbox' name='counseling[9999][got_referred]' value='1' /><lable>Did the student get referred for employment:</label></br>";	
	echo "<input type='checkbox' name='counseling[9999][got_employed]' value='1' /><lable>Did the student get employed:</label></br>";	
	echo "<input type='checkbox' name='counseling[9999][resume_training]' value='1' /><lable>Did the student received resume/cover letter training:</label></br>";	
	echo "<input type='checkbox'  name='counseling[9999][career_counseling]' value='1' /><lable>Received career counseling:</label></br>";
	echo "<input type='checkbox' name='counseling[9999][mock_interviews]' value='1' /><lable>Did the student complete mock interview:</label></br>";
		
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
			
			echo "<input type='checkbox' ".($event->got_counseling=='1'?"checked='checked'":"")." name='counseling[{$id}][got_counseling]' value='1' /><lable>Did the student get career counseling:</label></br>";
			echo "<input type='checkbox' ".($event->got_referred=='1'?"checked='checked'":"")." name='counseling[{$id}][got_referred]' value='1' /><lable>Did the student get referred for employment:</label></br>";
			echo "<input type='checkbox' ".($event->got_employed=='1'?"checked='checked'":"")." name='counseling[{$id}][got_employed]' value='1' /><lable>Did the student get employed:</label></br>";
			echo "<input type='checkbox' ".($event->resume_training=='1'?"checked='checked'":"")." name='counseling[{$id}][resume_training]' value='1' /><lable>Did the student received resume/cover letter training:</label></br>";
			echo "<input type='checkbox' ".($event->career_counseling=='1'?"checked='checked'":"")." name='counseling[{$id}][career_counseling]' value='1' /><lable>Received career counseling:</label></br>";
			echo "<input type='checkbox' ".($event->mock_interviews=='1'?"checked='checked'":"")." name='counseling[{$id}][mock_interviews]' value='1' /><lable>Received Mock Interviews:</label></br>";
			
			echo "</div>";
		}
		?>
        </div>
		<?php
	}
?>