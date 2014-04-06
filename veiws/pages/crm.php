<!doctype html>
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
        <?=snap::getStructure('header'); ?>
		
		<?=html_blocks::startForm(array(
			"action" => snap::url('crm/save'),
			"edit_header" => "<h4>Editing crm</h4>",
			"new_header" => "<h4>Adding a new crm entry</h4>",
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
						<div class="twelve columns"><?=crm_model::get_htmlField("contact__organization_name",$entry)?></div>
					</div>
					
					<div class="row">
						<div class="four columns">
							<?=crm_model::get_htmlField("contact__main_contact",$entry)?> 
						</div>
						<div class="four columns">
							<?=crm_model::get_htmlField("contact__department",$entry)?> 
						</div>
						<div class="four columns">
							<?=crm_model::get_htmlField("contact__main_phone_number",$entry)?>
						</div>
					</div><hr/>

					
					<h4>Mailing Address</h4>
					<div class="row">
						<div class="twelve columns">
							<?=crm_model::get_htmlField("contact__mailing_address_street",$entry)?>
							<?=crm_model::get_htmlField("contact__mailing_address_street2",$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="three columns">
							<?=crm_model::get_htmlField("contact__mailing_address_city",$entry)?> 
						</div>
						<div class="three columns">
							<?=crm_model::get_htmlField("contact__mailing_address_zip",$entry)?>
						</div>
						<div class="six columns">
						</div>
					</div><hr/>

					
					<h4>General</h4>
					<div class="row">
						<div class="four columns"><?=crm_model::get_htmlField("contact__email",$entry)?></div>
						<div class="four columns"><?=crm_model::get_htmlField("contact__website",$entry)?></div>
						<div class="four columns"><?=crm_model::get_htmlField("contact__fax",$entry)?></div>	
					</div>
					<div class="row">
						<div class="four columns">
							<?=crm_model::get_htmlField("contact__desired_method",$entry)?>
						</div>
						<div class="three columns">
							<?=crm_model::get_htmlField("contact__desired_date",$entry)?>
						</div>
						<div class="five columns">
						</div>
					</div><hr/>

					
					<h3>Site Profile</h3>
					<div class="row">
						<div class="six columns">					
							<?=crm_model::get_htmlField("bis__organization_age",$entry)?>
						</div>
						<div class="six columns">
							<?=crm_model::get_htmlField("bis__employee_all_count",$entry)?>
						</div>
					</div>				
					<div class="row has_emp">
						<div class="six columns">
							<?=crm_model::get_htmlField("bis__employee_ft_employee_count",$entry)?>
						</div>
						<div class="six columns">
							<?=crm_model::get_htmlField("bis__employee_pt_count",$entry)?>
						</div>
					</div><hr/>

					
					<h4>Position Information</h4>
					<div class="row">
						<div class="six columns">				
							<?=crm_model::get_htmlField("position__openings_frequent",$entry)?>
						</div>
						<div class="six columns">
							<?=crm_model::get_htmlField("position__openings_difficult",$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="six columns">					
							<?=crm_model::get_htmlField("openings__first_difficult",$entry)?>
						</div>
						<div class="six columns">
							<?=crm_model::get_htmlField("position__new",$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="six columns">
							<?=crm_model::get_htmlField("position__new_long_term",$entry)?>
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
							<?=crm_model::get_htmlField("training__whos",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<div class="row">
								<div class="six columns checkbox">
									<?=crm_model::get_htmlField("training__within_year",$entry)?>
								</div>
								<div class="six columns checkbox leftborder">
									<?=crm_model::get_htmlField("training__current_budget",$entry)?>
								</div>
							</div>
						</div>
					</div><hr/>

					<div class="row">
						<div class="twelve columns checkbox">
							<?=crm_model::get_htmlField("training__reimbursement",$entry)?>
						</div>
					</div><hr/>

			<h3>Training Delivery</h3>
			
					<div class="row">
						<div class="six columns checkbox">
							<?=crm_model::get_htmlField("training__delivery",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__course_days",$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="six columns checkbox">
							<?=crm_model::get_htmlField("training__course_times",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__course_length",$entry)?><br/>
							
							
							<?=crm_model::get_htmlField("training__obstacles",$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="six columns checkbox">
							<?=crm_model::get_htmlField("training__desiered_value",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__roi",$entry)?>
						</div>
					</div><hr/>
					
			</div>
			<div id="resources">
				<h3>On-Site Resources</h3>


					<div class="row">
						<div class="four columns">
							<?=crm_model::get_htmlField("resources__has_class",$entry)?>
						</div>
						<div class="four columns">
							<?=crm_model::get_htmlField("resources__class_size",$entry)?>
						</div>
						<div class="four columns">
							<?=crm_model::get_htmlField("resources__has_computer",$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="twelve columns checkbox">			
							<?=crm_model::get_htmlField("resources__on_site_other",$entry)?>
						</div>
					</div><hr/>
		
		
		
				<h2>Training Needs</h2>
				<p>We would like your help in identifying classes and courses that meet your needs. A representative will be contacting you for follow-up.</p>
				
				<h3>Greening Your Business Operations </h3>
		
					<div class="row">
						<div class="six columns checkbox">
							<?=crm_model::get_htmlField("training__interest",$entry)?>

						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__difficult_to_manage",$entry)?>
						</div>
					</div><hr/>

					<div class="row">
						<div class="six columns checkbox">
							<?=crm_model::get_htmlField("training__Skills",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__communication_skills",$entry)?>
						</div>
					</div><hr/>
			 
					<div class="row">
						<div class="six columns checkbox">			 
							<?=crm_model::get_htmlField("training__safety_skills",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__people_skills",$entry)?>
						</div>
					</div><hr/>
			 
					<div class="row">
						<div class="six columns checkbox">
							<?=crm_model::get_htmlField("training__business_skills",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__customer_skills",$entry)?>
						</div>
					</div><hr/>
			 
					<div class="row">
						<div class="six columns checkbox">
							<?=crm_model::get_htmlField("training__leadership_skills",$entry)?>
						</div>
						<div class="six columns checkbox leftborder">
							<?=crm_model::get_htmlField("training__finance_skills",$entry)?>
						</div>
					</div><hr/>

			<hr/>
			<h3>Certification </h3>
			<div class="row">
				<div class="twelve columns">
					<?=crm_model::get_htmlField("training__certification_wanted",$entry)?>
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					<?=crm_model::get_htmlField("training__tech_skills",$entry)?>
				</div>
			</div>

		</div>
		<div id="other">
			<h3>What would you like to see offered at Hawaii Community College?<br/>
			Other; Tell us what you want! </h3>
			<div class="row">
				<div class="twelve columns"><?=crm_model::get_htmlField("wanted_uh_service",$entry)?></div>
			</div>	<hr/>
			
			<h3>Internships</h3>
			<p>We would like to place our students in local businesses to gain work experience, build their resumes and increase their chances at employment.</p>
			
				<div class="row">
					<div class="four columns">
						<?=crm_model::get_htmlField("internship__opportunities_has",$entry)?>
					</div>
					<div class="four columns">
						<?=crm_model::get_htmlField("internship__opportunities_count",$entry)?>
					</div>
					<div class="four columns">
						<?=crm_model::get_htmlField("internship__postions",$entry)?>
					</div>
				</div>

				<div class="row">
					<div class="four columns">
						<?=crm_model::get_htmlField("internship__postions_title",$entry)?>
					</div>
					<div class="four columns">
						<?=crm_model::get_htmlField("internship__postions_paid",$entry)?>
					</div>
					<div class="four columns"></div>
				</div>	<hr/>

				<h3>Become an Internship site!</h3>
				<p>We offer training for our internship students prior to placement and have created informative orientation sessions for employers on how to start and maintain an internship program. We can assist with providing generic position descriptions that relate to general office, sales, etc. positions. We will have our Internship Coordinator contact you on setting up an internship at your organization.</p>
			
			
					<div class="row">
						<div class="twelve columns">
							<?=crm_model::get_htmlField("internship__desires_contact",$entry)?>
						</div>
					</div>	<hr/>		

				<h3>Whom may we contact to discuss internships?</h3>
					<div class="row">
						<div class="six columns">
							<?=crm_model::get_htmlField("internship__contact_name",$entry)?>
						</div>
						<div class="six columns">
							<?=crm_model::get_htmlField("internship__contact_title",$entry)?>
						</div>
					</div>
					<div class="row">
						<div class="six columns">
							<?=crm_model::get_htmlField("internship__contact_phone",$entry)?>
						</div>
						<div class="six columns">
							<?=crm_model::get_htmlField("internship__contact_email",$entry)?>
						</div>
					</div>			

					<div class="row">
						<div class="twelve columns">
							<?=crm_model::get_htmlField("internship__info_possible_positions",$entry)?>
						</div>
					</div>	<hr/>

			<h3>Internships</h3>
			<p>By answering the following questions we will better prepare for our discussion</p>
					<div class="row">
						<div class="twelve columns checkbox">			
							<?=crm_model::get_htmlField("internship__intern_count",$entry)?><br/> 
						
							<?=crm_model::get_htmlField("internship__wanted_service",$entry)?><br/>
			
							<?=crm_model::get_htmlField("internship__ideal_months",$entry)?><br/> 
						</div>
					</div><hr/>			


				<br/><br/>
				
			</div>
		</div>
		<?=html_blocks::formSubmitBlock();?>
        <?=html_blocks::endForm();?>
    </div>
</body>

</html> 
