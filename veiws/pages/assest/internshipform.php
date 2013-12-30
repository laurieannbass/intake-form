<div class="formTemplate">
<h3>Add a new internship </h3>
<?php
	echo "<lable>Date of interaction:</label><input type='date' name='internship[9999][date]' data-end='+1d' /></br>";	
	echo "<lable>Was placed:</label><input type='checkbox' name='internship[9999][placed]' /></br><input type='hidden' name='internship[9999][remove]' class='remove' value=''/>";	
?>
</div>
<h3>Past internship interactions</h3>
        <?php
	//var_dump($entry);
	if(isset($entry->internship) && count($entry->internship)>0){
		
		?>
        <div class="accordions">
        <?php
		foreach($entry->internship as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3><div>";
			echo "<input type='hidden' name='internship[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of interaction:</label><input type='date' data-end='+1d' name='internship[{$id}][date]' value='{$event->date}' /></br>";	
			echo "<lable>Was placed:</label><input type='checkbox' checked name='internship[{$id}][placed]' value='1' /></br>";	
			echo "</div>";
		}
		?>
        </div>
		<?php
	}
?>