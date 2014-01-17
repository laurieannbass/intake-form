<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
	<div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <?php
			$id = $_REQUEST['id'];
			$dbname = 'Intake';
			$db = generalform::getDb($dbname);
			$table = 'formdata';
			if(!isset($_POST['searchOn'])){
				$query = "SELECT * FROM `".$table."`  WHERE ".sprintf(" `id`='%d' ",$id);
			}
			$result = $db->query($query) or die($db->error.__LINE__);
		
			$query_results = array ();
			if($result->num_rows > 0) {
				$i=0;
				while($row = $result->fetch_assoc()) {
					$query_results[]=array(
						'id'=>$row['id'],
						'uh_id'=>$row['uh_id'],
						'name'=>"{$row['last_name']}, {$row['first_name']}",
						'form_object'=>$row['form_object'],
					);
				}
				$entry = json_decode($query_results[0]['form_object']);
			}
			
        ?>
			<header id="header" class="info">
			   <h2>Case Notes for: <?php echo $query_results[0]['name']; ?></h2>
			</header>
            <div style="padding:15px;">
        <?php
			//var_dump($entry);
			if(isset($entry) && isset($entry->note) && count($entry->note)>0){
				foreach($entry->note as $id=>$event){
					echo "<div>";	
					echo "<lable>Date: {$event->date}</label><br/>";	
					echo "<lable>Note:</label><br/><p>{$event->comment}</p><hr/>";	
					echo "</div>";
				}
			}
		?>
			</div>
	</div>
</body>
</html>