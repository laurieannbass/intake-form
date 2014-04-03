<?php

$notes = isset($entry['note_object'])?$entry['note_object']:array();
?>


<div class='row'>
<div class='six columns'>


<div class="formTemplate">
<h3>Notes</h3>
<label>Date of note:</label><br/>
<input type='date' name='note[9999][date]' data-end='+1d' /></br>
<label>Note:</label><br/>
<textarea name='note[9999][comment]' style='width:100%;height:250px;'></textarea>
</br><input type='hidden' name='note[9999][remove]' class='remove' value=''/>
</div>


</div>
<div class='six columns leftborder'>


<?php if(count($notes)>0):?>
	<h3>Past notes</h3>
	<div class="accordions">
        <?php
		foreach($notes as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3><div>";
			echo "<input type='hidden' name='note[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of note: </label><input type='hidden' name='note[{$id}][date]' class='remove' value='{$event->date}'/>{$event->date}</br>";	
			echo "<lable>Note:</label><input type='hidden' name='note[{$id}][comment]' class='remove' value='{$event->comment}'/><p>{$event->comment}</p></br>";	
			echo "</div>";
		}
		?>
	</div>
<?php else: ?>
	<h3>Currently no notes for this individual</h3>
<?php endif; ?>



</div></div>