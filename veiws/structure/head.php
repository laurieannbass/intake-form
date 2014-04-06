	<meta charset='UTF-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content='True' name='HandheldFriendly' />
	<meta content='width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	
	<title>Intake</title>

	<!--[if lt IE 10]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<style type="text/css" title="currentStyle">
		@import "https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables_themeroller.css";
		@import "https://ajax.aspnetcdn.com/ajax/jquery.ui/1.9.1/themes/cupertino/jquery-ui.css";
	</style>

	<link type='text/css' rel='stylesheet'href='https://code.jquery.com/ui/1.10.4/themes/redmond/jquery-ui.css' media='screen' />
	
	<link type='text/css' rel="stylesheet" href="<?=snap::url('/css/gumby.css');?>">
	<link type='text/css' rel="stylesheet" href="<?=snap::url('/css/structure.css');?>">
	<link type='text/css' rel="stylesheet" href="<?=snap::url('/css/form.css');?>">
	<link type='text/css' rel="stylesheet" href="<?=snap::url('/css/style.css');?>">	

	<script type="text/javascript" src="<?=snap::url('/js/libs/modernizr-2.6.2.min.js');?>"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
	
	
	<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?=snap::url('/js/jquery.maskedinput.js');?>"></script>
	
	<!--
	Include gumby.js followed by UI modules followed by gumby.init.js
	Or concatenate and minify into a single file -->
	<script type="text/javascript" gumby-touch="<?=snap::url('/js/libs');?>" src="<?=snap::url('/js/libs/gumby.js');?>"></script>
	<script type="text/javascript" src="<?=snap::url('/js/libs/ui/gumby.retina.js');?>"></script>
	<script type="text/javascript" src="<?=snap::url('/js/libs/ui/gumby.fixed.js');?>"></script>
	<script type="text/javascript" src="<?=snap::url('/js/libs/ui/gumby.skiplink.js');?>"></script>
	<script type="text/javascript" src="<?=snap::url('/js/libs/ui/gumby.toggleswitch.js');?>"></script>
	<!--<scrip type="text/javascript"t src="js/libs/ui/gumby.checkbox.js"></script>
	<script type="text/javascript" src="js/libs/ui/gumby.radiobtn.js"></script>
	<script type="text/javascript" src="js/libs/ui/gumby.tabs.js"></script>-->
	<script type="text/javascript" src="<?=snap::url('/js/libs/ui/gumby.navbar.js');?>"></script>
	<script type="text/javascript" src="<?=snap::url('/js/libs/ui/jquery.validation.js');?>"></script>
	<script type="text/javascript" src="<?=snap::url('/js/libs/gumby.init.js');?>"></script>
	<script type="text/javascript" src="<?=snap::url('/js/init.js');?>"></script>