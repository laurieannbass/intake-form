<?php

$unique=$params['unique'];
$veteran=$params['veteran'];
$Type=$params['Type'];
//$results=$params['results']; 
$from=$params['from'];
$to=$params['to'];

$query_results=$params['query_results'];
$query=$params['query'];
$totals=$params['totals'];
$items=$params['items'];

?><!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
    <?=snap::getStructure('head'); ?>
</head>
<body>
    <div style="text-align:left;padding:20px">
        <?=snap::getStructure('header');?>
        <h2>Search result</h2>
		
		<div class="row">
			<div class="six columns">
				<div  style="padding:0px 15px 15px 15px;">
					<h3>Totals for <?=$Type?><?php echo $unique?" unique students":"";?><?=($veteran?" as a veteran":"")?></h3>
					<h5><?=$from?> - <?=$to?></h5>
					
					<?php	
						
					?>
					<div style="padding:0px 15px 15px 15px;">
					<?php
						foreach($totals as $title=>$item){
							echo "<div class='row'><div class='one columns bottomborder'>".$item."</div><div class='eleven columns leftborder bottomborder'><strong>".$title."</strong></div></div>";
						}
					?>
					<hr/>
					<a href="<?=snap::url('search');?>" class="buttons">Restart Search</a> 
					</div>
				</div>
			</div>
			<div class="six columns checkbox leftborder">
				<div style="padding:0px 15px 15px 15px;">
				<h3>(<?=count($query_results)?>) Entries making up results </h3>
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
								<td><?=$row['id']?></td>
								<td><?=$row['uh_id']?></td>
								<td><?=$row['name']?></td>
								<td>
									<a href="#" class="veiw_record button">View totals</a>
									<div class="hidden_inline_record">
										<div class="inline_record">
										<?php
											$items_totals=$items[$row['id']];
											foreach($items_totals as $title=>$item){
												echo "<div class='row'><div class='one columns bottomborder'>".$item."</div><div class='eleven columns leftborder bottomborder'><strong>".$title."</strong></div></div>";
											}
										?>
										</div>
									</div>
									| <a href="<?=snap::url('intake/edit');?>?id=<?=$row['id']?>" class="veiw_record button">Edit</a>
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
		</div><hr/>		

		<h2>Ran query:</h2>
		<div>
			<p><strong><?=$query;?></strong></p>
		</div>
    </div>
</body>

</html>