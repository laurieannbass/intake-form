<?php
    foreach($params as $key=>$value){
		$$key=$value;
    }

?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
    <?=generalform::getStructure('head'); ?>
</head>
<body>
    <div style="text-align:left;padding:20px">
        <?=generalform::getStructure('header');?>
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
                        	<a href="<?=generalform::url('intake/edit');?>?id=<?php echo $row['id']?>" class="button">Edit</a> | 
                            <a href="<?=generalform::url('print_case_notes');?>?id=<?php echo $row['id']?>" class="button" target="_blank">Print Case Notes</a>
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