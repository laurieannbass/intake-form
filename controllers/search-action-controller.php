<?php
    require_once('controllers/general-controller.php');
	//make your db connection then
	// Create connection
	$db = generalform::getDb(DB_NAME);
	$where_query="";
	$from="1/1/1900";
	$to="1/1/2100"; 

    $table = 'formdata';
	if(isset($_POST['all'])){
		$query = "SELECT * FROM `".$table."`";
	}else{}
		$query = "SELECT * FROM `".$table."` WHERE ";


		
		if(		isset($_POST['fromdate'])
			&& !empty($_POST['fromdate'])
			&& isset($_POST['todate'])
			&& !empty($_POST['todate'])
		){
			$from = mysqli_real_escape_string($db, $_POST['fromdate']);
			$to = mysqli_real_escape_string($db, $_POST['todate']);
			if(!isset($_POST['by_area']) ){
				$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `creation_date`>'%s' ",$from);
				$where_query .= (($where_query!="")?" AND ":"" ).sprintf(" `creation_date`<'%s' ",$to );
			}
		}
		
		if(isset($_POST['by_area']) && $_POST['by_area']!=""){
			if($_POST['by_area']=="counseling")$where_query .=  (($where_query!="")?" AND ":"" )." `form_object` NOT LIKE '%\"counseling\":[]%' ";
			if($_POST['by_area']=="internship")$where_query .=  (($where_query!="")?" AND ":"" )." `form_object` NOT LIKE '%\"internship\":[]%' ";
			if($_POST['by_area']=="transcript")$where_query .=  (($where_query!="")?" AND ":"" )." `form_object` NOT LIKE '%\"transcript\":[]%' ";
			if($_POST['by_area']=="pla")$where_query .=  (($where_query!="")?" AND ":"" )." `form_object` NOT LIKE '%\"pla\":[]%' ";
		}
		$veteran=false;
		if(isset($_POST['veterans']) && $_POST['veterans']==1){
			$veteran=true;
			$where_query .= (($where_query!="")?" AND  (":"(" );
			$where_query .=  " `form_object` LIKE '%\"military\":\"Yes\"%' ";
			$where_query .=  " OR (`form_object` LIKE '%\"military_spouse\":\"Yes\"%' AND `form_object` LIKE '%\"va_status\":\"Eligible Spouse\"%') ";
			$where_query .= ")" ;
		}
	
	$query = $query.$where_query;
	//var_dump($query);//die();
	//echo $query;
	$result = $db->query($query) or die($db->error.__LINE__);
	/*$file= date ('D-d-M-Y--H-i-s',strtotime("now")  ).'.csv';

	$list = array ();
	if($result->num_rows > 0) {
		$i=0;
		while($row = $result->fetch_assoc()) {
		$form_object = json_decode($row['form_object']);
		if($i==0){
			$headers=array();
			foreach($form_object as $k=>$v){
				$headers[] = ucwords( str_replace("_"," ", str_replace("-"," ",$k) ) );
			}
			$headers[]="creation_date";
			$list[]=$headers;
		}
		
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
		$formvalue[]=$row['creation_date'];
		$list[]=$formvalue;
		
		
		$creation_date = $row['creation_date'];

		$i++;
		}
	}*/
	
	//$result = $db->query($query) or die($db->error.__LINE__);

	$query_results = array ();
	$fullquery_results = array ();
	if($result->num_rows > 0) {
		$i=0;
		while($row = $result->fetch_assoc()) {

			$fullquery_results[] = json_decode($row['form_object']);
			
			$query_results[]=array(
				'id'=>$row['id'],
				'uh_id'=>$row['uh_id'],
				'name'=>"{$row['last_name']}, {$row['first_name']}"
			);
		}
	}
	
	
	/* else {
		echo 'NO RESULTS';	
	}

$fp = fopen($file, 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}



fclose($fp);


header('Pragma: public');  // required
header('Expires: 0');  // no cache
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

header('Cache-Control: private', false);
header('Content-Type: application/csv');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($file)) . ' GMT');
header('Content-disposition: attachment; filename=' . $file . '');
header("Content-Transfer-Encoding:  binary");
header('Content-Length: ' . filesize($file)); // provide file size
header('Connection: close');
readfile($file);
exit();
*/
/*

	echo "<h2>The CSV</h2>".file_get_contents($file);
	*/
	//echo $results;
	/*while ($row=mysqli_fetch_arry($result)){
		echo $row['id']."". $row['last_name']."".$row['first_name'] ."|". $row['birth_date']."|".$row['address'] ."|". $row['city']."|".$row['state'] ."|". $row['zip']."|".$row['form_object'] ."|". $row['creation_date'];
		echo "<br/>";
   }*/
	
	mysqli_close($db);
	
	
?><!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <header id="header" class="info">
           <h2>Search result</h2>
        </header>
		
		
		<div  style="padding:0px 15px 15px 15px;">
			<?php
				$unique=false;
				if(isset($_POST['unique_students']))$unique=true;
				if($_POST['by_area']=="counseling")$Type = 'COUNSELING';
				if($_POST['by_area']=="internship")$Type = 'INTERNSHIP';
				if($_POST['by_area']=="transcript")$Type = 'TRANSCRIPT EVALUATION';	
				if($_POST['by_area']=="pla")$Type = 'PLA';	
			?>
			<h3>Totals for <?=$Type?><?php echo $unique?" unique students":"";?><?php echo $veteran?" as a veteran":"";?></h3>
			
			<?php	
				$totals=array();
				$totals_sub=array();
				
				
				if($_POST['by_area']=="counseling"){
					$totals=array('Received career counseling'=>0,'Employment Referrals'=>0,'Students Employed'=>0,
									'Students received Resume building & Cover Letter'=>0,'Received Mock Interviews'=>0);
				}

				if($_POST['by_area']=="internship"){
					$totals=array('Applied for Internship'=>0,'Placed in Internship'=>0,'Attended Workshop'=>0);
				}

				if($_POST['by_area']=="transcript"){
					$TRANSCRIPT_EVALUATIONS = generalform::get_TRANSCRIPT_EVALUATIONS();				
					foreach($TRANSCRIPT_EVALUATIONS as $key=>$type){	
						//$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
						$totals[$key]=0;
					}
				}
				if($_POST['by_area']=="pla"){
					$PRIOR_LEARNING_ASSESSMENT = generalform::get_PRIOR_LEARNING_ASSESSMENT();			
					foreach($PRIOR_LEARNING_ASSESSMENT as $key=>$type){	
						//$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
						$totals[$key]=0;
					}
				}

				function testdate($date,$from,$to){
					$result=true;
					$TestDate = date( 'Y-m-d', strtotime($date) );
					$Begin = date( 'Y-m-d', strtotime($from) );
					$End = date( 'Y-m-d', strtotime($to) );
					$result = ($TestDate >= $Begin && $TestDate <= $End);
					return $result;	
				}



				foreach($fullquery_results as $item){
					
					//section out the user entry totals
					if($_POST['by_area']=="counseling"){
						$totals_sub=array('Received career counseling'=>0,'Employment Referrals'=>0,'Students Employed'=>0,
									'Students received Resume building & Cover Letter'=>0,'Received Mock Interviews'=>0);
						foreach($item->counseling as $citem){
							if(testdate($citem->date,$from,$to)){
								if( $citem->got_counseling>0 && ( !$unique || $totals_sub['Received career counseling']<1) )$totals_sub['Received career counseling']++;
								if( $citem->got_referred>0 && ( !$unique || $totals_sub['Employment Referrals']<1) )$totals_sub['Employment Referrals']++;
								if( $citem->got_employed>0 && ( !$unique || $totals_sub['Students Employed']<1) )$totals_sub['Students Employed']++;
								if( $citem->resume_training>0 && ( !$unique || $totals_sub['Students received Resume building & Cover Letter']<1) )$totals_sub['Students received Resume building & Cover Letter']++;
								if( $citem->mock_interviews>0 && ( !$unique || $totals_sub['Received Mock Interviews']<1) )$totals_sub['Received Mock Interviews']++;
							}
						}
					}

					if($_POST['by_area']=="internship"){
						$totals_sub=array('Applied for Internship'=>0,'Placed in Internship'=>0,'Attended Workshop'=>0);
						foreach($item->internship as $citem){
							if(testdate($citem->date,$from,$to)){
								if( $citem->applied_internship>0 && ( !$unique || $totals_sub['Applied for Internship']<1) )$totals_sub['Applied for Internship']++;
								if( $citem->placed>0 && ( !$unique || $totals_sub['Placed in Internship']<1) )$totals_sub['Placed in Internship']++;
								if( $citem->attended_workshop>0 && ( !$unique || $totals_sub['Attended Workshop']<1) )$totals_sub['Attended Workshop']++;
							}
						}
					}
	
					if($_POST['by_area']=="transcript"){
						$TRANSCRIPT_EVALUATIONS = generalform::get_TRANSCRIPT_EVALUATIONS();				
						$totals_sub=array();
						foreach($TRANSCRIPT_EVALUATIONS as $key=>$type){	
							//$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
							$totals_sub[$key]=0;
						}
						if(isset($item->transcript)){
							foreach($item->transcript as $citem){
								if(testdate($citem->date,$from,$to)){
									foreach($TRANSCRIPT_EVALUATIONS as $key=>$type){	
										$lable = $key;
										$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
										$objProp = '$key';
										
										$value = isset($citem->$key)?$citem->$key:0;
										
										if($type == 'checkbox'){
											$value = ($value=='YES'?1:0);
											if( $value>0 && ( !$unique || $totals_sub[$lable]<1) )$totals_sub[$lable]++;
										}elseif($type == 'number'){
											if( $value>0 && ( !$unique || $totals_sub[$lable]<1) ) $totals_sub[$lable]+=$value;
										}
									}
								}
							}
						}
					}
					
					if($_POST['by_area']=="pla"){
						$PRIOR_LEARNING_ASSESSMENT = generalform::get_PRIOR_LEARNING_ASSESSMENT();		
						$totals_sub=array();
						foreach($PRIOR_LEARNING_ASSESSMENT as $key=>$type){	
							//$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
							$totals_sub[$key]=0;
						}
						if(isset($item->pla)){
							foreach($item->pla as $citem){
								if(testdate($citem->date,$from,$to)){
									foreach($PRIOR_LEARNING_ASSESSMENT as $key=>$type){	
										$lable = $key;
										$key = strtolower(str_replace('-','_',str_replace(' ','_',$key)));
										$objProp = '$key';
										
										$value = isset($citem->$key)?$citem->$key:0;
										
										if($type == 'checkbox'){
											$value = ($value=='YES'?1:0);
											if( $value>0 && ( !$unique || $totals_sub[$lable]<1) )$totals_sub[$lable]++;
										}elseif($type == 'number'){
											if( $value>0 && ( !$unique || $totals_sub[$lable]<1) ) $totals_sub[$lable]+=$value;
										}
									}
								}
							}
						}
					}					
					
					
					
					
					
					//put the totals back together
					foreach($totals as $key=>$Titem){
						$totals[$key]=$totals[$key]+$totals_sub[$key];
					}
				}
			?>
			<div style="padding:0px 15px 15px 15px;">
			<?php
				foreach($totals as $title=>$item){
					echo "<strong>".$title."</strong>: ".$item.' <br/>';
				}
			?>
			<hr/>
			<a href="search.php" class="buttons">Restart Search</a> 
			</div>
		</div>

        <div style="padding:0px 15px 15px 15px;">
		<h3>Entries making up results</h3>
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
        <header id="header" class="info">
           <h2>Queried entries</h2>
           <div>
		   <p>Ran query: <strong><?=$query;?></strong></p>
		   
		   </div>
        </header>
    </div>
</body>

</html>