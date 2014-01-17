<div class="formTemplate">
<h3>Add a new Transcript Evaluation</h3>
<?php
	echo "<lable>Date of interaction:</label><input type='date' name='transcript[9999][date]' data-end='+1d' /><input type='hidden' name='transcript[9999][remove]' class='remove' value=''/></br>";	

	echo "<input type='checkbox' name='transcript[9999][pla_interviewed]' value='1' /><lable>Interviewed for PLA</label></br>";
	echo "<input type='checkbox' name='transcript[9999][pla_counseling]' value='1' /><lable>PLA Counseling</label></br>";
	echo "<input type='checkbox' name='transcript[9999][clep_exam]' value='1' /><lable>Took CLEP Exam</label></br>";
	echo "<input type='checkbox' name='transcript[9999][uexcel_exam]' value='1' /><lable>Took UExcel Exam</label></br>";
	echo "<input type='checkbox' name='transcript[9999][dsst_exam]' value='1' /><lable>Took DSST Exam</label></br>";	
	echo "<input type='checkbox' name='transcript[9999][credit_through_articulation]' value='1' /><lable>Credit through Articulation</label></br>";
	echo "<input type='checkbox' name='transcript[9999][portfolio_assessment]' value='1' /><lable>Portfolio Assessment</label></br>";
	echo "<input type='checkbox' name='transcript[9999][credit_by_intuitional_exam]' value='1' /><lable>Credit by Intuitional Exam</label></br>";
	echo "<input type='checkbox' name='transcript[9999][pla_workshop]' value='1' /><lable>Participated in a PLA workshop</label></br>";
	echo "<input type='checkbox' name='transcript[9999][earned_transfer_credits]' value='1' /><lable>Earned Transfer Credits</label></br>";	
	echo "<input type='checkbox' name='transcript[9999][earned_military_transfer_credits]' value='1' /><lable>Earned Military Transfer Credits</label></br>";		
		
?>
</div>
<h3>Past transcript evaluation</h3>
        <?php
	//var_dump($entry);
	if(isset($entry->transcript) && count($entry->transcript)>0){
		
		?>
        <div class="accordions">
        <?php
		foreach($entry->transcript as $id=>$event){
			echo "<h3><a href='#' class='deleteRecord buttons'>[x]</a>{$event->date}</h3><div>";
			echo "<input type='hidden' name='transcript[{$id}][remove]' class='remove' value=''/>";	
			echo "<lable>Date of interaction:</label><input type='date' data-end='+1d' name='transcript[{$id}][date]' value='{$event->date}' /></br>";	

			echo "<input type='checkbox' name='transcript[{$id}][pla_interviewed]' value='1' ".($event->pla_interviewed=='1'?"checked='checked'":"")." /><lable>Interviewed for PLA</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][pla_counseling]' value='1' ".($event->pla_counseling=='1'?"checked='checked'":"")." /><lable>PLA Counseling</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][clep_exam]' value='1' ".($event->clep_exam=='1'?"checked='checked'":"")." /><lable>Took CLEP Exam</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][uexcel_exam]' value='1' ".($event->uexcel_exam=='1'?"checked='checked'":"")." /><lable>Took UExcel Exam</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][dsst_exam]' value='1' ".($event->dsst_exam=='1'?"checked='checked'":"")." /><lable>Took DSST Exam</label></br>";	
			echo "<input type='checkbox' name='transcript[{$id}][credit_through_articulation]' value='1' ".($event->credit_through_articulation=='1'?"checked='checked'":"")." /><lable>Credit through Articulation</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][portfolio_assessment]' value='1' ".($event->portfolio_assessment=='1'?"checked='checked'":"")." /><lable>Portfolio Assessment</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][credit_by_intuitional_exam]' value='1' ".($event->credit_by_intuitional_exam=='1'?"checked='checked'":"")." /><lable>Credit by Intuitional Exam</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][pla_workshop]' value='1' ".($event->pla_workshop=='1'?"checked='checked'":"")." /><lable>Participated in a PLA workshop</label></br>";
			echo "<input type='checkbox' name='transcript[{$id}][earned_transfer_credits]' value='1' ".($event->earned_transfer_credits=='1'?"checked='checked'":"")." /><lable>Earned Transfer Credits</label></br>";	
			echo "<input type='checkbox' name='transcript[{$id}][earned_military_transfer_credits]' value='1' ".($event->earned_military_transfer_credits=='1'?"checked='checked'":"")." /><lable>Earned Military Transfer Credits</label></br>";	
		


			
			echo "</div>";
		}
		?>
        </div>
		<?php
	}
?>