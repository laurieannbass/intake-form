<?php

define('CRM_TABLE', "crm_data");
class crm_model{
	public function __construct() {
		//load models
		//set action
	}

	public static function getEntry($id){
		$db = snap::getDb(DB_NAME);
		if($id>0){
			$query = "SELECT * FROM `".CRM_TABLE."` WHERE ".sprintf(" `id`='%s' ",$id);
		}
		$result = $db->query($query) or die($db->error.__LINE__);
	
		$query_results = array ();
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$query_results=$row;
			}
		}
		return $query_results;
	}	
	
	public static function get_models(){
		return array(
					"contact__organization_name" => array( "type"=>"text", "label"=>"Organization Name","required"=>true),
					"contact__main_contact" => array( "type"=>"text", "label"=>"Contact Name","required"=>true),
					"contact__department" => array( "type"=>"text", "label"=>"Department"),
					"contact__main_phone_number" => array( "type"=>"text", "label"=>"Main Phone Number","required"=>true),
					"contact__mailing_address_street" => array( "type"=>"text", "label"=>"Street"),
					"contact__mailing_address_street2" => array( "type"=>"text", "label"=>""),
					"contact__mailing_address_city" => array( "type"=>"text", "label"=>"City"),
					"contact__mailing_address_zip" => array( "type"=>"text", "label"=>"Zip Code"),
					"contact__email" => array( "type"=>"text", "label"=>"Email Address","required"=>true),
					"contact__website" => array( "type"=>"text", "label"=>"Website"),
					"contact__fax" => array( "type"=>"text", "label"=>"Fax Number"),
					"contact__desired_method" => array( "type"=>"select", "label"=>"Method of Contact :",
														"options"=>array("in-person", "email", "phone", "other"),
														"option_labels"=>array("In-Person", "Email", "Phone", "Other")
												),
					"contact__desired_date" => array( "type"=>"date", "label"=>"Date of Contact"),
					"bis__organization_age" => array( "type"=>"select", "label"=>"Age of Organization ",
														"options"=>array("<1", "1-5", "6-15", ">15", "unsure", "other"),
														"option_labels"=>array("Less than 1 year", "1 - 5 years", "6 - 15 years", "Over 15 years", "Not Sure", "Other")
												),
					"bis__employee_all_count" => array( "type"=>"select", "label"=>"Number of Employees",
														"options"=>array("0", "1-5", "6-9", "10-25", "26-49", ">50", "other"),
														"option_labels"=>array("0", "1-5", "6-9", "10-25", "26-49", "Over 50", "Other")
												),
					"bis__employee_ft_employee_count" => array( "type"=>"select", "label"=>"Number of Full-time Employees",
														"options"=>array("0", "1-5", "6-9", "10-25", "26-49", ">50", "other"),
														"option_labels"=>array("0", "1-5", "6-9", "10-25", "26-49", "Over 50", "Other")
												),
					"bis__employee_pt_count" => array( "type"=>"select", "label"=>"Number of Part-time Employees",
														"options"=>array("0", "1-5", "6-9", "10-25", "26-49", ">50", "other"),
														"option_labels"=>array("0", "1-5", "6-9", "10-25", "26-49", "Over 50", "Other")
												),
					"position__openings_frequent" => array( "type"=>"textarea", "label"=>"For which position(s) do you have the most frequent openings?"),
					"position__openings_difficult" => array( "type"=>"textarea", "label"=>"Which position(s) are the most difficult to fill?"),
					"openings__first_difficult" => array( "type"=>"textarea", "label"=>"If more than 1, begin with the most difficult to fill position"),
					"position__new" => array( "type"=>"textarea", "label"=>"What new jobs do you foresee emerging in the next 1 to 3 years in your organization?"),
					"position__new_long_term" => array( "type"=>"textarea", "label"=>"What new jobs do you foresee emerging during the next 3 to 5 years in your organization? "),
					"training__whos" => array( "type"=>"checkbox", "before"=> "<strong>Who is being trained</strong>?<br/><em>Check all that apply</em><br/>",
														"options"=>array("New Employees", "Seasoned / Existing Employees", "Supervisors or Upper Management", "Other")
												),
					"training__within_year" => array( "type"=>"select", "label"=> "Within the past 12 months how much did you spend on training?",
																"options"=>array("0", "1-999", "1000-4999", "Other"),
																"option_labels"=>array("$0", "$1 - $999", "$1,000 - $4,999", "Other")
														),
					"training__current_budget" => array( "type"=>"select", "label"=> "What is your training budget for the upcoming year 2014?",
																"options"=>array("0", "1-999", "1000-4999", "unsure", "Other"),
																"option_labels"=>array("$0", "$1 - $999", "$1,000 - $4,999", "Unsure, based on value", "Other")
														),
					"training__reimbursement" => array( "type"=>"checkbox", "before"=> "<strong>What type of support are you willing to provide for training?</strong><br/><em>Check all that apply</em><br/>",
													"options"=>array("class_cost", "materials", "time", "online_cost", "none", "other"),
													"option_labels"=>array("Tuition reimbursement for classes taken on employee’s own time", "Pay for textbooks or other class materials", "Pay for employees\" time while at training", "Pay cost of on-site training", "None", "Other")
												),
					"training__delivery" => array( "type"=>"checkbox", "before"=> "<strong>What are your preferred methods of training delivery?</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("online", "online_video", "campus_class", "confrence_training", "hybrid_online_training", "panel-discussions", "round-table", "hands-on", "field-trips", "on-the-job", "other"),
														"option_labels"=>array("Online or E-learning; Requires Computer and Internet Connectivity", "Recorded online; Streaming video and completion determined by student", "Classroom or Instructor-Led Training on campus", "Poly-com or Distance Learning; Requires access to appropriate audio/visual resources", "Hybrid model; Requires Computer &amp; Internet Connectivity, and access to audio/visual resources", "Panel Discussions", "Round table", "Hands-on Training", "Field Trips", "On-the-job site", "Other")
												),
					"training__course_days" => array( "type"=>"checkbox", "before"=> "<strong>What are the best training DAYS?</strong> <br/><em>Check all that apply</em><br/>",
														"options"=>array("any_weekday", "no_weekends", "weekends_only", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday", "other"),
														"option_labels"=>array("Any Weekday", "NO Weekends", "Weekends ONLY", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday", "Other")
												),
					"training__course_times" => array( "type"=>"checkbox", "before"=> "<strong>What are the best training TIMES?</strong> <br/><em>Check all that apply</em><br/>",
														"options"=>array("<8:00AM", "8:00AM-12:00PM", "12:00PM-5:00PM", "5:00PM-8:00PM", "other"),
														"option_labels"=>array("Early Morning (before 8:00AM)", "Morning (8:00A - 12:00PM)", "Afternoon (12:00PM - 5:00PM)", "Evening (5:00PM - 8:00PM)", "Other")
												),
					"training__course_length" => array( "type"=>"select", "label"=> "How long would you like courses to run?",
														"options"=>array("<1w", "1-4w", "4-16w", "full", "Other"),
														"option_labels"=>array("Less than seven days", "Between 1 to 4 weeks", "Between 4 to 16 weeks", "Full Semester", "Other")
												),
					"training__obstacles" => array( "type"=>"select", "label"=> "What are some obstacles to pursue training?  ",
														"options"=>array("accessibility", "affordability", "determining_need", "Other"),
														"option_labels"=>array("Accessibility (Timing, Location, etc.)", "Affordability", "Determining specific type of training needed", "Other")
												),
					"training__desiered_value" => array( "type"=>"checkbox", "before"=> "<strong>In the past, what was the most valuable part of training?</strong> <br/><em>Check all that apply</em><br/>",
													"options"=>array("specific_to_organization", "new_content", "presenter", "relationships", "presenter_interaction", "peer_knowledge", "action_plan", "other"),
													"option_labels"=>array("Left with information and ideas specific to my organization", "Interesting new content", "Knowledgeable presenter", "Created relationships", "High-level of interaction between presenter and learners", "Opportunity to find out what other companies are doing in the industry", "Left with clear action plan", "Other")
													),
					"training__course_length" => array( "type"=>"select", "label"=> "How long would you like courses to run?",
														"options"=>array("<1w", "1-4w", "4-16w", "full", "Other"),
														"option_labels"=>array("Less than seven days", "Between 1 to 4 weeks", "Between 4 to 16 weeks", "Full Semester", "Other")
												),
					"training__obstacles" => array( "type"=>"select", "label"=> "What are some obstacles to pursue training?  ",
														"options"=>array("accessibility", "affordability", "determining_need", "Other"),
														"option_labels"=>array("Accessibility (Timing, Location, etc.)", "Affordability", "Determining specific type of training needed", "Other")
												),
					"training__roi" => array( "type"=>"checkbox", "before"=> "<strong>If the organization pays for training, the training must be:</strong><br/><em>Check all that apply</em><br/>",
													"options"=>array("relevant_to_organization", "implementable", "results_oriented", "informative", "measurable_value", "exclusive", "local", "accessible", "specific", "other"),
													"option_labels"=>array("Relevant to the organizations needs", "Implementable", "Results-oriented", "Informative", "Worthwhile (measurable value)", "Unavailable elsewhere", "Locally run", "Accessible", "Specific to needs", "Other")
											),
					"resources__has_class" => array( "type"=>"select", "label"=> "We would like to look at providing training that is convenient and cost-effective,Do you have a classroom?",
														"options"=>array("yes", "no"),
														"option_labels"=>array("Yes", "No")
												),
					"resources__class_size" => array( "type"=>"select", "label"=> "How many people does your classroom hold?",
														"options"=>array("<5", "5-10", "other"),
														"option_labels"=>array("Less than 5", "Up to 10", "Other")
												),
					"resources__has_computer" => array( "type"=>"select", "label"=> "How many computers do you have on-site? ",
														"options"=>array("0", "1", "2", "3", "4", ">5", "other"),
														"option_labels"=>array("None", "1", "2", "3", "4", "5+", "Other")
												),
					"resources__on_site_other" => array( "type"=>"checkbox", "before"=> "<strong>What other resources do you have on-site?</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("internet", "printer", "projector", "video_conferencing", "dvd_player", "television", "other"),
														"option_labels"=>array("Internet", "Printer", "Projector", "Video Conferencing", "DVD player", "Television", "Other")
												),
					"training__interest" => array( "type"=>"checkbox", "before"=> "<strong>Which of the following is your business interested in exploring?</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("energy_audit", "post_consumer", "bulk_cooperative_purchasing", "zero_waste_audits", "energy_efficiency_technologies", "purchasing_power_from_alt_source", "installing_altenergy_technologies", "green_event_planning", "alternative_energy_vehicle", "green_construction", "non_toxic_industrial_products", "organic_landscape_care", "non_toxic_cleaning_products", "socially_responsible_investments", "other"),
														"option_labels"=>array("Energy Audit(s)", "Post-Consumer / Recycled Business Supplies", "Bulk / Cooperative Purchasing", "Zero Waste Audits (e.g., composting, recycling)", "Energy Efficiency Technologies", "Purchasing Power from Alternative Sources (e.g., Solar, Wind)", "Installing Alternative Energy Technologies (e.g., Photovoltaics, Solar Hot Water) at your facility.", "Green Event Planning", "Alternative Energy Vehicle(s) (e.g., Electric, Biodiesel, Plug-In Hybrid)", "Green Construction / Remodeling", "Non-Toxic Industrial Products", "Organic Landscape Care", "Non-Toxic Cleaning Products", "Socially Responsible Investments", "Other")
												),
					"training__Skills" => array( "type"=>"checkbox", "before"=> "<strong>Skills</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("new_skills", "better_workplace_techniques", "safety", "fair_and_equal_workplace", "customer_service", "improving_supervisors", "sector-specific_training", "project_supervisory_and_general_management", "general_and_social_media_marketing", "technology", "team_building", "unsure", "none_of_the_above", "other"),
														"option_labels"=>array("New skills", "Better workplace techniques", "Safety", "Fair and Equal workplace", "Customer Service; Customer Relations", "Improving Supervisors", "Sector-Specific training", "Project Supervisory and General Management", "General and Social Media Marketing", "Technology", "Team building", "Unsure", "None of the above", "Other")
												),
					"training__difficult_to_manage" => array( "type"=>"checkbox", "before"=> "<strong>Which of the following does your company find difficult to manage?</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("planning_for_growth", "human_resources", "recruitment", "customer_service", "hiring", "firing", "turnover", "training", "accessing_new_markets", "promotion_advertising", "market_research", "teamwork", "succession_planning", "social_media", "other"),
														"option_labels"=>array("Planning for growth", "Human resources", "Recruitment", "Customer Service", "Hiring", "Firing", "Turnover", "Training", "Accessing new markets", "Promotion & Advertising", "Market research", "Teamwork", "Succession Planning", "Social media", "Other")
												),
					"training__communication_skills" => array( "type"=>"checkbox", "before"=> "<strong>Communication Skills</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("not_needed", "effective_efficient_meetings", "listening_skills", "understanding_communication_styles", "working_with_media", "powerful_presentations", "sharpen_business_writing", "effective_phone_skills", "grammar_review", "report_writing", "elevator_speech", "communication_skills_benifits", "other"),
														"option_labels"=>array("Not needed at this time ", "Conducting effective and efficient meetings ", "Listening Skills ", "Understanding Communication Styles ", "Working with Media ", "Powerful Presentations ", "Sharpen Business Writing ", "Effective Phone Skills ", "Grammar Review ", "Report Writing ", "Elevator Speech ", "Understanding how communication skills create rapport and trust", "Other")
												),
					"training__people_skills" => array( "type"=>"checkbox", "before"=> "<strong>People Skills</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("not_needed", "conducting_meetings", "positive_performance_reviews", "teamwork_collaboration", "constructively_criticism", "understandingpersonality", "myers-briggs_inventory", "other"),
														"option_labels"=>array("Not needed at this time", "Conducting Meetings", "Conducting positive Performance Reviews", "Teamwork & Collaboration to achieve objectives", "Constructively giving and receiving criticism and suggestions", "Understanding different personality styles", "Myers-Briggs Inventory", "Other")
												),
					"training__leadership_skills" => array( "type"=>"checkbox", "before"=> "<strong>Leadership Skills</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("not_needed", "effectively_feedback_for_goals", "leading_allocating_for_goals", "appreciative_inquiry", "motivating_others", "improving_work_culture", "effective_coaching", "team_based_planning", "effective_project_management", "managing_diversity", "advanced_industrial_relations", "other"),
														"option_labels"=>array("Not needed at this time", "How to effectively give constructive feedback to achieve goals", "Leading people and allocating tasks to achieve goals", "Appreciative Inquiry", "Motivating others", "Improving Work Culture", "Effective Coaching", "Team-based planning", "Effective Project Management", "Managing Diversity", "Advanced Industrial Relations", "Other")
												),
					"training__customer_skills" => array( "type"=>"checkbox", "before"=> "<strong>Customer Skills</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("understanding customer", "satisfy_customer_needs", "difficult_people", "customer_satisfaction", "phone_effectiveness", "other"),
														"option_labels"=>array("Understanding who the customer is and communicate that priority consistently", "Becoming more effective in satisfying customer needs", "How to deal with Difficult People", "Managing Customer Satisfaction", "Phone Power; Increase Effectiveness", "Other")
												),
					"training__business_skills" => array( "type"=>"checkbox", "before"=> "<strong>Business Skills</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("aligning_resources", "understanding_costs", "big_picture", "anticipating_market", "other"),
														"option_labels"=>array("Aligning Resources to meet business needs", "Understanding costs, profits, markets and added value", "How to look at the \"big\" picture", "Anticipating marketplace opportunities; Speed to market", "Other")
												),
					"training__finance_skills" => array( "type"=>"checkbox", "before"=> "<strong>Analytical and Finance Skills</strong><br/><em>Check all that apply</em><br/>",
														"options"=>array("analysis_techniques", "interpreting_data", "auditing_services", "accounting_basics", "budgets", "financial_forecast", "public_accounting_principles", "financial_statements", "state_budgeting_process", "strategic_business_plan", "other"),
														"option_labels"=>array("Selecting the appropriate techniques for analysis", "Interpreting financial data, reports, balance sheets, and cash flow", "Auditing and Assurance Services", "Accounting Basics", "Plan and Manage Budgets", "Prepare Financial Forecast", "Public Accounting Principles", "Read and Interpret Financial Statements", "State Budgeting Process", "Writing an up-to-date strategic-business plan", "Other")
												),
					"training__safety_skills"=>array( 'type'=>'checkbox', 'before'=> "<strong>Health and Safety Skills</strong><br/><em>Check all that apply</em><br/>",
														'options'=>array('accident_investigation','back_injury_prevention','cpr_first_aid','ergonomics',
																		'hazard_health_safety','managing_stress','preventing_violence','sexual_harassment_prevention',
																		'wellness_program','pesticide_applicator','other'),
														'option_labels'=>array('Accident Investigation','Back Injury Prevention','CPR/ First Aid','Ergonomics',
																				'Hazard/ Health &amp; Safety in the Office','Personal Strategies for Managing Stress',
																				'Preventing Violence in the Workplace','Sexual Harassment Prevention',
																				'Start a Wellness program','Pesticide Applicator Training','Other')
												),
					"training__certification_wanted" => array( "type"=>"textarea", "label"=>"Please list any certifications that you would like us to offer to meet your needs"),
					"training__tech_skills" => array( "type"=>"checkbox", "before"=> "<strong>Technology and Software Skills</strong><br/><em>Check all that apply</em><br/>",
											"options"=>array("adobe", "health_information_technology", "microsoft_access", "microsoft_excel", "microsoft_word", 
															"microsoft_powerpoint", "geographic_information_systems", "computer-assisted_design", "spss_statistics_software", "computer_programming", "other"),
											"option_labels"=>array("Adobe", "Health Information Technology", "Microsoft Access", "Microsoft Excel", "Microsoft Word", "Microsoft PowerPoint", "Geographic Information Systems (e.g., ArcGIS)", "Computer-Assisted Design (e.g., AutoCAD)", "SPSS Statistics Software", "Computer Programming (e.g., HTML)", "Other")
									),
					"wanted_uh_service" => array( "type"=>"textarea", "label"=>"Training, certifications, services, etc"),
					"internship__opportunities_has" => array( "type"=>"select", "label"=> "Do you currently offer Internship Opportunities?",
													"options"=>array("yes", "no"),
													"option_labels"=>array("Yes", "No")
											),
					"internship__opportunities_count" => array( "type"=>"select", "label"=> "Internships",
													"options"=>array("1-2", "3-5", ">5", "other"),
													"option_labels"=>array("1 - 2", "3 - 5", "More than 5", "Other")
											),
					"internship__postions" => array( "type"=>"text", "label"=>"What type of internship postions do you offer?"),
					"internship__postions_title" => array( "type"=>"text", "label"=>"Title of position"),
					"internship__postions_paid" => array( "type"=>"select", "label"=> "Is the internship position paid?",
													"options"=>array("yes", "no", "varies", "other"),
													"option_labels"=>array("Yes", "No", "Varies on position", "Other")
											),
					"internship__desires_contact" => array( "type"=>"select", "label"=> "Would you like our Internship Coordinator to contact you? ",
														"options"=>array("yes", "no", "other"),
														"option_labels"=>array("Yes", "Not at this time", "Other")
												),
					"internship__contact_name" => array( "type"=>"text", "label"=>"Name of Contact"),
					"internship__contact_title" => array( "type"=>"text", "label"=>"Title"),
					"internship__contact_phone" => array( "type"=>"text", "label"=>"Phone Number"),
					"internship__contact_email" => array( "type"=>"text", "label"=>"Email"),
					"internship__info_possible_positions" => array( "type"=>"select", "label"=> "Would you like to provide more information on possible internship positions? ",
														"options"=>array("yes", "no"),
														"option_labels"=>array("Yes", "Not at this time")
												),
					"internship__intern_count" => array( "type"=>"select", "label"=> "How many interns would you like to have?",
											"options"=>array("1", "2-3", "3-5", ">6", "other"),
											"option_labels"=>array("1", "2-3", "3-5", "6 or more", "Other")
									),
					"internship__wanted_service" => array( "type"=>"textarea", "label"=>"What types of positions would you like to provide? <br/><em>Provide any other details such as position titles or duties</em>"),
					"internship__ideal_months" => array( "type"=>"select", "label"=> "What months work best for providing internships? <br/><em>We will be placing students based on school semesters. Please choose all that apply.</em>",
											"options"=>array("spring", "summer", "fall"),
											"option_labels"=>array("January - April (Spring)", "May - July (Summer)", "August - November (Fall)")
									)
		);
	}
	
	public static function get_htmlField($alias,$entry){
		$model = self::get_models();
		$modeledField = $model[$alias];
		$modeledField['name']=$alias;

		return html_blocks::formField($modeledField,$entry);
	}

	
}
	
	
