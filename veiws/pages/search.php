<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
	<div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
		<form name='input' action='search.php' class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate>
			<header id="header" class="info">
			   <h2>Run Reports</h2>
			</header>

			<ul>
            
				<li>
                	<label>Choose an area (optional):</label>
					<select name="by_area">
                    	<option value='' selected>Any</option>
                    	<option value='counseling'>Counseling</option>
                        <option value='internship'>Internship</option>
                        <option value='transcript'>Transcript Evaluation /PLA</option>
                    </select>
					<hr/>
				</li>
 				<li>
                	<label>Date Range:</label>
					<input type='date' data-end='+1d' name='fromdate' value='' />
                    to:
                    <input type='date' data-end='+1d' name='todate' value='' />
					<hr/>
				</li>           
            
				<li>
                	<label>Limit to unique students:</label>
					<input type='checkbox' value='1' name="unique_students" />
					<hr/>
				</li>        
				<li>
                	<label>Limit to veterans:</label>
					<input type='checkbox' value='1' name="veterans" />
					<hr/>
				</li>      
				<li>
					<input type='submit' value='Run report' name="all" />
					<hr/>
				</li>
			</ul>
		</form>
	</div>
</body>
</html>