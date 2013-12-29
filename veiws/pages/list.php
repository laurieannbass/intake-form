<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <?php

			$dbname = 'Intake';
			$db = generalform::getDb($dbname);
			$table = 'formdata';
			if(!isset($_POST['searchOn'])){
				$query = "SELECT * FROM `".$table."`";
			}/*
			do this later
			else{
				$query = "SELECT * FROM `".$table."` WHERE ";
				$where_query="";
				if(isset($_POST['uh-id'])&&!empty($_POST['uh_id'])){
					$uh_id = mysqli_real_escape_string($db, $_POST['uh_id']);
					$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `uh_id`='%s' ",$uh_id);
				}
		
				$query = $query.$where_query;
			}*/
			//echo $query;
			$result = $db->query($query) or die($db->error.__LINE__);
		
			$query_results = array ();
			if($result->num_rows > 0) {
				$i=0;
				while($row = $result->fetch_assoc()) {
					$query_results[]=array(
						'id'=>$row['id'],
						'name'=>"{$row['last_name']}, {$row['first_name']}"
					);
				}
			}
        ?>
        <header id="header" class="info">
           <h2>Past entries</h2>
           <div>If the user is already been entered then you will find them here ready to edit.</div>
        </header>
        <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>action</td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>action</td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                foreach($query_results as $row){
                ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><a href="form.php?id=<?php echo $row['id']?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>