<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <header id="header" class="info">
           <h2>Dashboard</h2>
        </header>
		<div class="dashboard">
			<div class="panel">
				<h3>Student intake</h3>
				<a href="form.php" class="buttons">Add new Entry</a><br/>
				<a href="list.php" class="buttons">Look up</a><br/>
				<a href="search.php" class="buttons">Run reports</a><br/>
				<br/>
			</div>
			</header>
			<div class="panel">
				<h3>Outreach</h3>
				<a href="outreach.php" class="buttons">Add new Entries</a><br/>
				<a href="list.php" class="buttons strike">Look up</a><br/>
				<a href="search.php" class="buttons strike">Run reports</a><br/>
				<b>COMING SOON</b>
			</div>
			<div class="panel">
				<h3>Busniess interactions</h3>
				<a href="form.php" class="buttons strike">Add new Entries</a><br/>
				<a href="list.php" class="buttons strike">Look up</a><br/>
				<a href="search.php" class="buttons strike">Run reports</a><br/>
				<b>COMING SOON</b>
			</div>
		</div>

    </div>
</body>

</html> 