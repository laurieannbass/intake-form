<div class="formTemplate">
<h3>Add a new internship </h3>
<?php
	echo "<lable>Date of interaction:</label><input type='date' name='internship[9999][date]' data-end='+1d' /></br>";	

	echo "<input type='checkbox' name='internship[9999][applied_internship]'  value='1' /><lable>Did student applied for internship program</label><br/>";
	echo "<input type='checkbox' name='internship[9999][placed]'  value='1' /><lable>Is student placed in internship</label><br/>";	
	echo "<input type='checkbox' name='internship[9999][attended_workshop]'  value='1' /><lable>Did student attend workshop</label><br/>";	
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
			echo "<input type='date' data-end='+1d' name='internship[{$id}][date]' value='{$event->date}' /><lable>Date of interaction</label></br>";	
			
			echo "<input type='checkbox' ".($event->applied_internship=='1'?"checked='checked'":"")."  name='internship[{$id}][applied_internship]' value='1' /><lable>Did student applied for internship program :</label><br/>";	
			echo "<input type='checkbox' ".($event->placed=='1'?"checked='checked'":"")."  name='internship[{$id}][placed]' value='1' /><lable>Is student placed in internship</label></br>";	
			echo "<input type='checkbox' ".($event->attended_workshop=='1'?"checked='checked'":"")."  name='internship[{$id}][attended_workshop]' value='1' /><lable>Did student attend workshop</label></br>";	
			
			echo "</div>";
		}
		?>
        </div>
		<?php
	}
?>