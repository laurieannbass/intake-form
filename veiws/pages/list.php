<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <?php
			$db = generalform::getDb(DB_NAME);
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
						'uh_id'=>$row['uh_id'],
						'name'=>"{$row['last_name']}, {$row['first_name']}"
					);
				}
			}
        ?>
        <header id="header" class="info">
           <h2>Past entries</h2>
           <div>If the user is already been entered then you will find them here ready to edit.</div>
        </header>
        <div style="padding:0px 15px 15px 15px;">
        <table class="datagrid">
            <thead>
                <tr>
                    <th width="75px" align="center">id</th>
                    <th width="175px" align="center">UH id</th>
                    <th>Name</th>
                    <th width="175px">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($query_results as $row){
                ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['uh_id']?></td>
                        <td><?php echo $row['name']?></td>
                        <td>
                        	<a href="form.php?id=<?php echo $row['id']?>" class="button">Edit</a> | 
                            <a href="print_case_notes.php?id=<?php echo $row['id']?>" class="button" target="_blank">Print Case Notes</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>UH id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</body>

</html>