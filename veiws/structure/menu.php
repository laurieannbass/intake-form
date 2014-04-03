<div class="row navbar" id="nav1"> 
	<!-- Toggle for mobile navigation, targeting the <ul> --> 
	<a class="toggle" gumby-trigger="#nav1 > ul" href="#"><i class="icon-menu"></i></a>
	<ul class="eight columns">
		<li><a href="<?=generalform::url('dashboard');?>">Dashboard</a></li>
		<li> <a href="<?=generalform::url('intake/list');?>">Intake</a>
			<div class="dropdown">
				<ul>
					<li><a href="<?=generalform::url('intake/new');?>">Add new Entry</a></li>
					<li><a href="<?=generalform::url('intake/list');?>">Past Entries</a></li>
					<li><a href="<?=generalform::url('search');?>">Report</a></li>
				</ul>
			</div>
		</li>
		<li><a href="<?=generalform::url('outreach');?>">Outreach</a></li>
		<li><a href="biz">CRM</a>
			<div class="dropdown">
				<ul>
					<li><a href="<?=generalform::url('biz');?>">Add new Entry</a></li>
					<li><a href="#"><h6 style="display:inline-block"></h6>Past Entries<em> (coming soon)</em></a></li>
					<li><a href="#"><h6 style="display:inline-block"></h6>Report<em> (coming soon)</em></a></li>
				</ul>
			</div>
		</li>
	</ul>
	<div class="four columns"> </div>
</div>
