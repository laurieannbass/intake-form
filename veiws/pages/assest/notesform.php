<div class="formTemplate">
<h3>Notes</h3>
<?php
	echo "<lable>Date of note:</label><br/><input type='date' name='note[9999][date]' data-end='+1d' /></br>";	
	echo "<lable>Note:</label><br/><textarea name='note[9999][comment]' style='width:300px;'></textarea></br><input type='hidden' name='note[9999][remove]' class='remove' value=''/>";	
?>
</div>
<h3>Past notes</h3>
        <?php
	//var_dump($entry);
	if(isset($entry->note) && count($entry->note)>0){
		
		?>
        <div class="accordions">
        <?php
		foreach($entry->note as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3><div>";
			echo "<input type='hidden' name='note[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of note:</label><br/><input type='date' data-end='+1d' name='note[{$id}][date]' value='{$event->date}' /></br>";	
			echo "<lable>Note:</label> <p>{$event->comment}</p></br>";	
			echo "</div>";
		}
		?>
        </div>
		<?php
	}
?>