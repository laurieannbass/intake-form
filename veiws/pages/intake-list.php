<?php
    require_once('controllers/general-controller.php');
?>

<!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <?php
            echo "<h2>Past entries</h2>";
            
            $fake_query_results=array(
                array("id"=>1, "name"=>"mr foo"),
                array("id"=>2, "name"=>"mrs foo")
            );
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