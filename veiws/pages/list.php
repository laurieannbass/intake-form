<?php

	$db = generalform::getDb(DB_NAME);
	$table = 'formdata';
	if(!isset($_POST['searchOn'])){
		$query = "SELECT * FROM `".$table."`";
	}
	$result = $db->query($query) or die($db->error.__LINE__);

	if(!isset($_POST['download'])){
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
	}else{
		$file= date ('D-d-M-Y--H-i-s',strtotime("now")  ).'.csv';
		$list = array ();
		if($result->num_rows > 0) {
			$i=0;
			$forms = array();
			while($row = $result->fetch_assoc()) {
				$form = json_decode($row['form_object']);
				$form->creation_date=$row['creation_date'];
				
				unset($form->counseling);
				unset($form->internship);
				unset($form->transcript);
				unset($form->pla);
				unset($form->note);
				
				$forms[] = $form;
			}
			$headers=array();
			$default=array();			
			foreach($forms as $form_object) {
				foreach($form_object as $k=>$v){
					if( !in_array($k,$default) ){
						$default[$k] = "";
						$headers[$k] = ucwords( str_replace("_"," ", str_replace("-"," ",$k) ) );
					}
				}
			}
			$list[]=$headers;
			foreach($forms as $form) {
				$form_object = (object)array_merge((array)$default,(array)$form);
				$formvalue=array();
				foreach($form_object as $k=>$v){
					//var_dump($v);
					$value="";
					if(gettype($v)=="array"){
						$value='"';
						$i=0;
						foreach($v as $k=>$val){
							if(gettype($val)!="object"){
								$value.=($i>0?",":"").$val;
								$i++;
							}
						}
						$value.='"';
					}else{
						if(gettype($v)!="object"){$value=$v;}
					}
					$formvalue[]=$value;
				}
				$list[]=$formvalue;
			}
		}
		
		//$result = $db->query($query) or die($db->error.__LINE__);
	
		generalform::createCSV($file,$list);
	}






?><!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
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
		<br/>
		<form action="" enctype="multipart/form-data" method="post" novalidate>
			<input type="submit" name="download" value="Download List" class="buttons"/>
			<b>Note:</b> The absentace of a field is the absentace of any of the values
		</form>
        </div>
    </div>
</body>

</html>