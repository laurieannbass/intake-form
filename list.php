<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Title of the document</title>

	<!-- CSS -->
	<link href="css/structure.css" rel="stylesheet">
	<link href="css/form.css" rel="stylesheet">
	<style>
	.block_header{border-bottom:1px solid #494949}
	.colored_padding{background: yellow;
		padding: 20px 20px 20px 80px;}
	.verticalLine {
       border-left: thin solid #494949;
      }	
	</style>
	   

	<!-- JavaScript -->
	<script src="scripts/wufoo.js"></script>

	<!--[if lt IE 10]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head> 



<body id="public">
<div id="container" class="ltr">


<?php
include_once('menu.php'); 
echo "<h2>Past entries</h2>";

$fake_query_results=array(
	array("id"=>1, "name"=>"mr foo"),
	array("id"=>2, "name"=>"mrs foo")
);






?>


<table>
<thead>
<tr>
<td>id</td>
<td>name</td>
<td>action</td>
</tr>
</thead>
<tbody>

<?php
foreach($fake_query_results as $row){
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