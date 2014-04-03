<!doctype html>
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
        <?=generalform::getStructure('header'); ?>
		
		<?=html_blocks::startForm(array(
			"action" => 'biz',
			"edit_header" => "<h4>Editing Biz</h4>",
			"new_header" => "<h4>Adding a new Biz entry</h4>",
			"class"=>""
		));
		$entry = isset($entry) ? $entry : null;
		?>



		<h2>Hawai'i Community College</h2>
		<p>The following questionnaire will allow Hawaii Community College to provide training specific to your workforce needs. We are also looking to expand our Internship program and are seeking partners for placement sites.</p>
		<p>We appreciate the time you are taking and want to thank you for your continued support.</p>

		<?=html_blocks::formSubmitBlock();?>
            <div class="uitabs">
                <ul>
                    <li><a href="#contact">Contact Information</a></li>
                    <li><a href="#training">Training</a></li>
					<li><a href="#resources">Resources</a></li>
					<li><a href="#other">Other</a></li>
                </ul>
                <div id="contact">
					<h3>Contact Information</h3>

					<?php //your setting this up ready for models ?>
					<div class="row">
						<div class="twelve columns"><?=html_blocks::formField(array('type'=>'text','name'=>"organization_name",'label'=>"Organization Name","required"=>true),$entry)?></div>
					</div>
					
					<div class="row">
						<div class="four columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"main_contact",'label'=>"Contact Name","required"=>true),$entry)?> 
						</div>
						<div class="four columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"department",'label'=>"Department"),$entry)?> 
						</div>
						<div class="four columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"main_phone_number",'label'=>"Main Phone Number","required"=>true),$entry)?>
						</div>
					</div><hr/>

					
					<h4>Mailing Address</h4>
					<div class="row">
						<div class="twelve columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"mailing_address_street",'label'=>"Street"),$entry)?>
							<?=html_blocks::formField(array('type'=>'text','name'=>"mailing_address_street2",'label'=>""),$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="three columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"mailing_address_city",'label'=>"City"),$entry)?> 
						</div>
						<div class="three columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"mailing_address_zip",'label'=>"Zip Code"),$entry)?>
						</div>
						<div class="six columns">
						</div>
					</div><hr/>

					
					<h4>General</h4>
					<div class="row">
						<div class="four columns"><?=html_blocks::formField(array('type'=>'text','name'=>"email",'label'=>"Email Address","required"=>true),$entry)?></div>
						<div class="four columns"><?=html_blocks::formField(array('type'=>'text','name'=>"website",'label'=>"Website"),$entry)?></div>
						<div class="four columns"><?=html_blocks::formField(array('type'=>'text','name'=>"fax",'label'=>"Fax Number"),$entry)?></div>	
					</div>
					<div class="row">
						<div class="four columns">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"contact_method", 'label'=>"Method of Contact :",
									'options'=>array('in-person','email','phone','other'),
									'option_labels'=>array('In-Person','Email','Phone','Other')
							),$entry)?>
						</div>
						<div class="three columns">
							<?=html_blocks::formField(array('type'=>'date','name'=>"contact_date",'label'=>"Date of Contact"),$entry)?>
						</div>
						<div class="five columns">
						</div>
					</div><hr/>

					
					<h3>Site Profile</h3>
					<div class="row">
						<div class="six columns">					
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"organization_age", 'label'=>"Age of Organization ",
									'options'=>array('<1','1-5','6-15','>15','unsure','other'),
									'option_labels'=>array('Less than 1 year','1 - 5 years','6 - 15 years','Over 15 years','Not Sure','Other')
							),$entry)?>
						</div>
						<div class="six columns">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"employee__all_count", 'label'=>"Number of Employees",
									'options'=>array('0','1-5','6-9','10-25','26-49','>50','other'),
									'option_labels'=>array('0','1-5','6-9','10-25','26-49','Over 50','Other')
							),$entry)?>
						</div>
					</div>				
					<div class="row has_emp">
						<div class="six columns">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"employee__ft_employee_count", 'label'=>"Number of Full-time Employees",
									'options'=>array('0','1-5','6-9','10-25','26-49','>50','other'),
									'option_labels'=>array('0','1-5','6-9','10-25','26-49','Over 50','Other')
							),$entry)?>
						</div>
						<div class="six columns">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"employee__pt_count", 'label'=>"Number of Part-time Employees",
									'options'=>array('0','1-5','6-9','10-25','26-49','>50','other'),
									'option_labels'=>array('0','1-5','6-9','10-25','26-49','Over 50','Other')
							),$entry)?>
						</div>
					</div><hr/>

					
					<h4>Position Information</h4>
					<div class="row">
						<div class="six columns">				
							<?=html_blocks::formField(array('type'=>'textarea','name'=>"openings__frequent",'label'=>"For which position(s) do you have the most frequent openings?"),$entry)?>
						</div>
						<div class="six columns">
							<?=html_blocks::formField(array('type'=>'textarea','name'=>"openings__difficult",'label'=>"Which position(s) are the most difficult to fill?"),$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="six columns">					
							<?=html_blocks::formField(array('type'=>'textarea','name'=>"openings__first_difficult",'label'=>"If more than 1, begin with the most difficult to fill position"),$entry)?>
						</div>
						<div class="six columns">
							<?=html_blocks::formField(array('type'=>'textarea','name'=>"new_position",'label'=>"What new jobs do you foresee emerging in the next 1 to 3 years in your organization?"),$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="six columns">
							<?=html_blocks::formField(array('type'=>'textarea','name'=>"new_position_long_term",'label'=>"What new jobs do you foresee emerging during the next 3 to 5 years in your organization? "),$entry)?>
						</div>
						<div class="six columns"></div>
					</div>
				
                </div>		
                <div id="training">
					<h3>Training Funds</h3>
					<p>Have you taken advantage of Department of Labor Employment and Training Funds (ETF)? The ETF Program has been very successful over the years. From its inception in 1991, ETF has helped employers train over thousands workers to learn invaluable new skills for their jobs. With these new skills, employees are now able to better perform in their jobs and seek out increased pay or promotions. Currently, there are two types of ETF funding sources. ETF Macro ETF Macro provides grants for industry specific training for critical skill shortages in high growth occupational or industry areas. These funds are used as “seed” money to develop “cutting edge” education and training curricula and program design and activities where none exist in the state. ETF Macro grants are offered based on availability of funds. As of January 2013, ETF Macro funding is currently unavailable at this time. ETF Micro The ETF Micro program is most popular among individual businesses that need to upgrade the job skills of their employees. Available training courses include, but are not limited to: computer, business, management, health, medical training, or soft skills training. Employers are eligible to receive up to 50% (maximum $250 tuition cap) of tuition costs provided by approved vendors. For general inquiries specific to the ETF Macro &amp; Micro program, please contact Lance Kimura at 808-586-8818 or lance.a.kimura@hawaii.gov. <a href="http://labor.hawaii.gov/wdd/home/employers/etf/">Visit the website</a></p>
		<hr/>

					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__whos",
									'before'=> "<strong>Who is being trained</strong>?<br/><em>Check all that apply</em><br/>",
									'options'=>array('New Employees','Seasoned / Existing Employees','Supervisors or Upper Management','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<div class="row">
								<div class="six columns checkbox">
									<?=html_blocks::formField(array(
											'type'=>'select', 'name'=>"training__within_year", 'label'=> "Within the past 12 months how much did you spend on training?",
											'options'=>array('0','1-999','1000-4999','Other'),
											'option_labels'=>array('$0','$1 - $999','$1,000 - $4,999','Other')
									),$entry)?>
								</div>
								<div class="six columns checkbox leftborder">
									<?=html_blocks::formField(array(
											'type'=>'select', 'name'=>"training__current_budget", 'label'=> "What is your training budget for the upcoming year 2014?",
											'options'=>array('0','1-999','1000-4999','unsure','Other'),
											'option_labels'=>array('$0','$1 - $999','$1,000 - $4,999','Unsure, based on value','Other')
									),$entry)?>
								</div>
							</div>
						</div>
					</div><hr/>

					<div class="row">
						<div class="twelve columns checkbox">
							<?=html_blocks::formField(array(
								'type'=>'checkbox', 'name'=>"training__reimbursement",
								'before'=> "<strong>What type of support are you willing to provide for training?</strong><br/><em>Check all that apply</em><br/>",
								'options'=>array('class_cost','materials','time','online_cost','none','other'),
								'option_labels'=>array('Tuition reimbursement for classes taken on employee’s own time',
														'Pay for textbooks or other class materials',
														'Pay for employees\' time while at training',
														'Pay cost of on-site training',
														'None',
														'Other')
							),$entry)?>
						</div>
					</div><hr/>

			<h3>Training Delivery</h3>
			
			
					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__delivery",
									'before'=> "<strong>What are your preferred methods of training delivery?</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('online','online_video','campus_class','confrence_training','hybrid_online_training','panel-discussions','round-table','hands-on','field-trips','on-the-job','other'),
									'option_labels'=>array('Online or E-learning; Requires Computer and Internet Connectivity',
															'Recorded online; Streaming video and completion determined by student',
															'Classroom or Instructor-Led Training on campus',
															'Poly-com or Distance Learning; Requires access to appropriate audio/visual resources',
															'Hybrid model; Requires Computer &amp; Internet Connectivity, and access to audio/visual resources',
															'Panel Discussions',
															'Round table',
															'Hands-on Training',
															'Field Trips',
															'On-the-job site',
															'Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__course_days",
									'before'=> "<strong>What are the best training DAYS?</strong> <br/><em>Check all that apply</em><br/>",
									'options'=>array('any_weekday','no_weekends','weekends_only','monday','tuesday','wednesday','thursday','friday','saturday','sunday','other'),
									'option_labels'=>array('Any Weekday','NO Weekends','Weekends ONLY','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday','Other')
							),$entry)?>
						</div>
					</div><hr/>

				
				
				

					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__course_times",
									'before'=> "<strong>What are the best training TIMES?</strong> <br/><em>Check all that apply</em><br/>",
									'options'=>array('<8:00AM','8:00AM-12:00PM','12:00PM-5:00PM','5:00PM-8:00PM','other'),
									'option_labels'=>array('Early Morning (before 8:00AM)','Morning (8:00A - 12:00PM)','Afternoon (12:00PM - 5:00PM)','Evening (5:00PM - 8:00PM)','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"training__course_length", 'label'=> "How long would you like courses to run?",
									'options'=>array('<1w','1-4w','4-16w','full','Other'),
									'option_labels'=>array('Less than seven days','Between 1 to 4 weeks','Between 4 to 16 weeks','Full Semester','Other')
							),$entry)?><br/>
							
							
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"training__obstacles", 'label'=> "What are some obstacles to pursue training?  ",
									'options'=>array('accessibility','affordability','determining_need','Other'),
									'option_labels'=>array('Accessibility (Timing, Location, etc.)','Affordability','Determining specific type of training needed','Other')
							),$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
								'type'=>'checkbox', 'name'=>"training__desiered_value",
								'before'=> "<strong>In the past, what was the most valuable part of training?</strong> <br/><em>Check all that apply</em><br/>",
								'options'=>array('specific_to_organization','new_content','presenter','relationships','presenter_interaction',
												'peer_knowledge','action_plan','other'),
								'option_labels'=>array('Left with information and ideas specific to my organization','Interesting new content',
														'Knowledgeable presenter','Created relationships','High-level of interaction between presenter and learners',
														'Opportunity to find out what other companies are doing in the industry','Left with clear action plan','Other')
								),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"training__course_length", 'label'=> "How long would you like courses to run?",
									'options'=>array('<1w','1-4w','4-16w','full','Other'),
									'option_labels'=>array('Less than seven days','Between 1 to 4 weeks','Between 4 to 16 weeks','Full Semester','Other')
							),$entry)?>
							<br/>
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"training__obstacles", 'label'=> "What are some obstacles to pursue training?  ",
									'options'=>array('accessibility','affordability','determining_need','Other'),
									'option_labels'=>array('Accessibility (Timing, Location, etc.)','Affordability','Determining specific type of training needed','Other')
							),$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
								'type'=>'checkbox', 'name'=>"training__roi",
								'before'=> "<strong>If the organization pays for training, the training must be:</strong><br/><em>Check all that apply</em><br/>",
								'options'=>array('relevant_to_organization','implementable','results_oriented','informative','measurable_value',
												'exclusive','local','accessible','specific','other'),
								'option_labels'=>array('Relevant to the organizations needs','Implementable','Results-oriented','Informative',
													'Worthwhile (measurable value)','Unavailable elsewhere','Locally run','Accessible','Specific to needs','Other')
						),$entry)?>
						</div>
						<div class="six columns checkbox leftborder"></div>
					</div><hr/>

			</div>
			<div id="resources">
				<h3>On-Site Resources</h3>


					<div class="row">
						<div class="four columns">
							<?=html_blocks::formField(array(
									'type'=>'select',
									'name'=>"resources__has_class", 
									'label'=> "We would like to look at providing training that is convenient and cost-effective,Do you have a classroom?",
									'options'=>array('yes','no'),
									'option_labels'=>array('Yes','No')
							),$entry)?>
						</div>
						<div class="four columns">
							<?=html_blocks::formField(array(
									'type'=>'select',
									'name'=>"resources__class_size",
									'label'=> "How many people does your classroom hold?",
									'options'=>array('<5','5-10','other'),
									'option_labels'=>array('Less than 5','Up to 10','Other')
							),$entry)?>
						</div>
						<div class="four columns">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"resources__has_computer",
									'label'=> "How many computers do you have on-site? ",
									'options'=>array('0','1','2','3','4','>5','other'),
									'option_labels'=>array('None','1','2','3','4','5+','Other')
							),$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="twelve columns checkbox">			
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"resources__other",
									'before'=> "<strong>What other resources do you have on-site?</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('internet','printer','projector','video_conferencing','dvd_player','television','other'),
									'option_labels'=>array('Internet','Printer','Projector','Video Conferencing','DVD player','Television','Other')
							),$entry)?>
						</div>
					</div><hr/>
		
		
		
				<h2>Training Needs</h2>
				<p>We would like your help in identifying classes and courses that meet your needs. A representative will be contacting you for follow-up.</p>
				
				<h3>Greening Your Business Operations </h3>
		
					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi",
									'before'=> "<strong>What other resources do you have on-site?</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('internet','printer','projector','video_conferencing','dvd_player','television','other'),
									'option_labels'=>array('Internet','Printer','Projector','Video Conferencing','DVD player','Television','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?php // just a reminder this will be gone as it should repersent a model entry ?>
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi",
									'before'=> "<strong>Which of the following is your business interested in exploring?</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('energy_audit',
														'post_consumer',
														'bulk_cooperative_purchasing',
														'zero_waste_audits',
														'energy_efficiency_technologies',
														'purchasing_power_from_alt_source',
														'installing_altenergy_technologies',
														'green_event_planning',
														'alternative_energy_vehicle',
														'green_construction',
														'non_toxic_industrial_products',
														'organic_landscape_care',
														'non_toxic_cleaning_products',
														'socially_responsible_investments','other'),
									'option_labels'=>array('Energy Audit(s)',
															'Post-Consumer / Recycled Business Supplies',
															'Bulk / Cooperative Purchasing',
															'Zero Waste Audits (e.g., composting, recycling)',
															'Energy Efficiency Technologies',
															'Purchasing Power from Alternative Sources (e.g., Solar, Wind)',
															'Installing Alternative Energy Technologies (e.g., Photovoltaics, Solar Hot Water) at your facility.',
															'Green Event Planning',
															'Alternative Energy Vehicle(s) (e.g., Electric, Biodiesel, Plug-In Hybrid)',
															'Green Construction / Remodeling',
															'Non-Toxic Industrial Products',
															'Organic Landscape Care',
															'Non-Toxic Cleaning Products',
															'Socially Responsible Investments',
															'Other')
							),$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi",
									'before'=> "<strong>Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('new_skills','better_workplace_techniques','safety','fair_and_equal_workplace','customer_service','improving_supervisors','sector-specific_training','project_supervisory_and_general_management','general_and_social_media_marketing','technology','team_building','unsure','none_of_the_above','other'),
									'option_labels'=>array('New skills','Better workplace techniques','Safety','Fair and Equal workplace','Customer Service; Customer Relations','Improving Supervisors','Sector-Specific training','Project Supervisory and General Management','General and Social Media Marketing','Technology','Team building','Unsure','None of the above','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi",
									'before'=> "<strong>Which of the following does your company find difficult to manage?</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('planning_for_growth','human_resources','recruitment','customer_service','hiring','firing','turnover',
													'training','accessing_new_markets','promotion_advertising','market_research','teamwork',
													'succession_planning','social_media','other'),
									'option_labels'=>array('Planning for growth','Human resources','Recruitment','Customer Service','Hiring','Firing',
													'Turnover','Training','Accessing new markets','Promotion & Advertising','Market research','Teamwork',
													'Succession Planning','Social media','Other')
							),$entry)?>
						</div>
					</div><hr/>
			 
					<div class="row">
						<div class="six columns checkbox">			 
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi",
									'before'=> "<strong>Communication Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('not_needed','effective_efficient_meetings','listening_skills','understanding_communication_styles',
													'working_with_media','powerful_presentations','sharpen_business_writing','effective_phone_skills',
													'grammar_review','report_writing','elevator_speech','communication_skills_benifits','other'),
									'option_labels'=>array('Not needed at this time ','Conducting effective and efficient meetings ','Listening Skills ',
													'Understanding Communication Styles ','Working with Media ','Powerful Presentations ',
													'Sharpen Business Writing ','Effective Phone Skills ','Grammar Review ','Report Writing ','Elevator Speech ',
													'Understanding how communication skills create rapport and trust','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi",
									'before'=> "<strong>People Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('not_needed','conducting_meetings','positive_performance_reviews','teamwork_collaboration','constructively_criticism','understandingpersonality','myers-briggs_inventory','other'),
									'option_labels'=>array('Not needed at this time','Conducting Meetings','Conducting positive Performance Reviews','Teamwork & Collaboration to achieve objectives','Constructively giving and receiving criticism and suggestions','Understanding different personality styles','Myers-Briggs Inventory','Other')
							),$entry)?>
						</div>
					</div><hr/>
			 
					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi", 'before'=> "<strong>Leadership Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('not_needed','effectively_feedback_for_goals','leading_allocating_for_goals','appreciative_inquiry','motivating_others','improving_work_culture','effective_coaching','team_based_planning','effective_project_management','managing_diversity','advanced_industrial_relations','other'),
									'option_labels'=>array('Not needed at this time','How to effectively give constructive feedback to achieve goals','Leading people and allocating tasks to achieve goals','Appreciative Inquiry','Motivating others','Improving Work Culture','Effective Coaching','Team-based planning','Effective Project Management','Managing Diversity','Advanced Industrial Relations','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi", 'before'=> "<strong>Customer Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('understanding customer','satisfy_customer_needs','difficult_people','customer_satisfaction','phone_effectiveness','other'),
									'option_labels'=>array('Understanding who the customer is and communicate that priority consistently','Becoming more effective in satisfying customer needs','How to deal with Difficult People','Managing Customer Satisfaction','Phone Power; Increase Effectiveness','Other')
							),$entry)?>
						</div>
					</div><hr/>
			 
					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi", 'before'=> "<strong>Business Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('aligning_resources','understanding_costs','big_picture','anticipating_market','other'),
									'option_labels'=>array('Aligning Resources to meet business needs','Understanding costs, profits, markets and added value','How to look at the "big" picture','Anticipating marketplace opportunities; Speed to market','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi", 'before'=> "<strong>Analytical and Finance Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('analysis_techniques','interpreting_data','auditing_services','accounting_basics','budgets','financial_forecast','public_accounting_principles','financial_statements','state_budgeting_process','strategic_business_plan','other'),
									'option_labels'=>array('Selecting the appropriate techniques for analysis','Interpreting financial data, reports, balance sheets, and cash flow','Auditing and Assurance Services','Accounting Basics','Plan and Manage Budgets','Prepare Financial Forecast','Public Accounting Principles','Read and Interpret Financial Statements','State Budgeting Process','Writing an up-to-date strategic-business plan','Other')
							),$entry)?>
						</div>
					</div><hr/>
			 
					<div class="row">
						<div class="six columns checkbox">
							<?=html_blocks::formField(array(
									'type'=>'checkbox', 'name'=>"training__roi", 'before'=> "<strong>Health and Safety Skills</strong><br/><em>Check all that apply</em><br/>",
									'options'=>array('accident_investigation','back_injury_prevention','cpr_first_aid','ergonomics','hazard_health_safety','managing_stress','preventing_violence','sexual_harassment_prevention','wellness_program','pesticide_applicator','other'),
									'option_labels'=>array('Accident Investigation','Back Injury Prevention','CPR/ First Aid','Ergonomics','Hazard/ Health &amp; Safety in the Office','Personal Strategies for Managing Stress','Preventing Violence in the Workplace','Sexual Harassment Prevention','Start a Wellness program','Pesticide Applicator Training','Other')
							),$entry)?>
						</div>
						<div class="six columns checkbox">
						</div>
					</div>		
			<hr/>
			<h3>Certification </h3>
			<div class="row">
				<div class="twelve columns">
					<?=html_blocks::formField(array('type'=>'textarea','name'=>"certification__wanted",'label'=>"Please list any certifications that you would like us to offer to meet your needs"),$entry)?>
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					<?=html_blocks::formField(array(
						'type'=>'checkbox', 'name'=>"training__roi", 'before'=> "<strong>Technology and Software Skills</strong><br/><em>Check all that apply</em><br/>",
						'options'=>array('adobe','health_information_technology','microsoft_access','microsoft_excel','microsoft_word','microsoft_powerpoint','geographic_information_systems','computer-assisted_design','spss_statistics_software','computer_programming','other'),
						'option_labels'=>array('Adobe','Health Information Technology','Microsoft Access','Microsoft Excel','Microsoft Word','Microsoft PowerPoint','Geographic Information Systems (e.g., ArcGIS)','Computer-Assisted Design (e.g., AutoCAD)','SPSS Statistics Software','Computer Programming (e.g., HTML)','Other')
				),$entry)?>
				</div>
			</div>

		</div>
		<div id="other">
			<h3>What would you like to see offered at Hawaii Community College?<br/>
			Other; Tell us what you want! </h3>
			<div class="row">
				<div class="twelve columns"><?=html_blocks::formField(array('type'=>'textarea','name'=>"wanted_service",'label'=>"Training, certifications, services, etc"),$entry)?></div>
			</div>
			
			<h3>Internships</h3>
			<p>We would like to place our students in local businesses to gain work experience, build their resumes and increase their chances at employment.</p>
			
				<div class="row">
					<div class="four columns">
						<?=html_blocks::formField(array(
								'type'=>'select', 'name'=>"internship__opportunities", 'label'=> "Do you currently offer Internship Opportunities?",
								'options'=>array('yes','no'),
								'option_labels'=>array('Yes','No')
						),$entry)?>
					</div>
					<div class="four columns">
						<?=html_blocks::formField(array(
								'type'=>'select', 'name'=>"internship__opportunities", 'label'=> "Internships",
								'options'=>array('1-2','3-5','>5','other'),
								'option_labels'=>array('1 - 2','3 - 5','More than 5','Other')
						),$entry)?>
					</div>
					<div class="four columns">
						<?=html_blocks::formField(array('type'=>'text','name'=>"postions_internship",'label'=>"What type of internship postions do you offer?"),$entry)?>
					</div>
				</div>	

				<div class="row">
					<div class="four columns">
						<?=html_blocks::formField(array('type'=>'text','name'=>"postions_title",'label'=>"Title of position"),$entry)?>
					</div>
					<div class="four columns">
						<?=html_blocks::formField(array(
								'type'=>'select', 'name'=>"internship__opportunities", 'label'=> "Is the internship position paid?",
								'options'=>array('yes','no','varies','other'),
								'option_labels'=>array('Yes','No','Varies on position','Other')
						),$entry)?>
					</div>
					<div class="four columns"></div>
				</div>	

				<h3>Become an Internship site!</h3>
				<p>We offer training for our internship students prior to placement and have created informative orientation sessions for employers on how to start and maintain an internship program. We can assist with providing generic position descriptions that relate to general office, sales, etc. positions. We will have our Internship Coordinator contact you on setting up an internship at your organization.</p>
			
			
					<div class="row">
						<div class="twelve columns">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"internship__opportunities", 'label'=> "Would you like our Internship Coordinator to contact you? ",
									'options'=>array('yes','no','other'),
									'option_labels'=>array('Yes','Not at this time','Other')
							),$entry)?>
						</div>
					</div>			

				<h3>Whom may we contact to discuss internships?</h3>
					<div class="row">
						<div class="six columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"contact_name",'label'=>"Name of Contact"),$entry)?>
						</div>
						<div class="six columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"contact_title",'label'=>"Title"),$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="six columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"contact_phone",'label'=>"Phone Number"),$entry)?>
						</div>
						<div class="six columns">
							<?=html_blocks::formField(array('type'=>'text','name'=>"contact_email",'label'=>"Email"),$entry)?>
						</div>
					</div>			

					<div class="row">
						<div class="twelve columns">
							<?=html_blocks::formField(array(
									'type'=>'select', 'name'=>"internship__opportunities", 'label'=> "Would you like to provide more information on possible internship positions? ",
									'options'=>array('yes','no'),
									'option_labels'=>array('Yes','Not at this time')
							),$entry)?>
						</div>
					</div>	

			<h3>Internships</h3>
			<p>By answering the following questions we will better prepare for our discussion</p>
			
				<?=html_blocks::formField(array(
						'type'=>'select', 'name'=>"internship__opportunities", 'label'=> "How many interns would you like to have?",
						'options'=>array('1','2-3','3-5','>6','other'),
						'option_labels'=>array('1','2-3','3-5','6 or more','Other')
				),$entry)?><br/> 
			
				<?=html_blocks::formField(array('type'=>'textarea','name'=>"wanted_service",'label'=>"What types of positions would you like to provide? <br/><em>Provide any other details such as position titles or duties</em>"),$entry)?><br/>
			
			
				<?=html_blocks::formField(array(
						'type'=>'select', 'name'=>"internship__opportunities", 'label'=> "What months work best for providing internships? <br/><em>We will be placing students based on school semesters. Please choose all that apply.</em>",
						'options'=>array('spring','summer','fall'),
						'option_labels'=>array('January - April (Spring)','May - July (Summer)','August - November (Fall)')
				),$entry)?><br/> 

				<br/><br/>
				
			</div>
		</div>
		<?=html_blocks::formSubmitBlock();?>
        <?=html_blocks::endForm();?>
    </div>
</body>

</html> 