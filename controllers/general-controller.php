<?php

if (!class_exists('generalform')) {
	require_once('config.php');
	require_once('helpers/html_blocks.php');

	class generalform {
		
		
		public function __construct() {
			@session_start();
			$GLOBALS['params']=array_merge($_POST,$_GET);
			self::router();
		}
		
		
		
		
		
		protected static function router(){
			global $params;
			
			$REQUEST_URI = str_replace('/'.trim(BASE_FOLDER,'/').'/','',$_SERVER['REQUEST_URI']);
			$SCRIPT_NAME = str_replace('/'.trim(BASE_FOLDER,'/').'/','',$_SERVER['SCRIPT_NAME']);
			
			$requestURI = explode('/', $REQUEST_URI);
			$scriptName = explode('/', $SCRIPT_NAME);

			for($i= 0;$i < sizeof($scriptName);$i++) {
				if ($requestURI[$i] == $scriptName[$i]) {
					unset($requestURI[$i]);
				}
			}
			$action=false;
			$command = array_values($requestURI);

			if( !isset($command[0]) || empty($command[0]) ){
				$pagename = "dashboard";
			}else{
				if(strpos($command[0],'?')!==false){
					$basepage=explode('?',$command[0]);
					$pagename = $basepage[0];
				}else{
					$pagename = $command[0];
				}
			
				if( isset($command[1]) && !empty($command[1]) ){
					if(strpos($command[1],'?')!==false){
						$baseaction=explode('?',$command[1]);
						$action = $baseaction[0];
					}else{
						$action = $command[1];
					}
					$params['action'] = $action;
				}
			}	
				
			$controller = BASEDIR.'/controllers/'.$pagename.'-action-controller.php';
			if(file_exists($controller)){
				include_once($controller);
				if($action){
					if(method_exists($pagename.'_controller', $action."_Action")){
						call_user_func(array($pagename.'_controller', $action."_Action"));	
						return;
					}else{
						self::getPage('404'); 
					}
				}
				return;
			}
			self::getPage($pagename,$params); 
		}


		
		
		
		
		/* would go to the theme templating later 
		* will start new name pratice /systempath/views/[page/[se]|structure/filename].php
		*/
		protected static function includeFile($included,$param=array()){
			global $params;
			$params = array_merge($params,$param);

			$file = BASEDIR.'/'.trim($included,'/').'.php';
			if(file_exists($file)){
				foreach($params as $key=>$value){
					$$key=$value;
				}
				ob_start();
				include_once($file);
				$file = ob_get_contents();
				ob_end_clean();
				return $file;
			}else{
				self::setMessage("failed to load ".$file,"err");
			}
		}
		public static function getPage($page,$params=array()){
			$file = '/veiws/pages/'.trim($page,'/');
			if(file_exists(BASEDIR.$file.'.php')){
				echo self::includeFile($file,$params);
			}else{
				echo self::getPage('404');
			}
		}
		public static function getStructure($included,$params=array()){
			$file = '/veiws/structure/'.trim($included,'/');
			
			return self::includeFile($file,$params);
		}

		public static function getPageSection($included,$params=array()){
			$file = '/veiws/pages/sections/'.trim($included,'/');
			return self::includeFile($file,$params);
		}
		
		public static function baseUrl(){
		  return defined ('BASEURL')? BASEURL : sprintf(
			"%s://%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['HTTP_HOST']
		  );
		}
		
		public static function url($path){
		  return sprintf( "%s/%s", self::baseUrl(), trim($path,'/') );
		}
		
		
		
		/* form part should be moved to a form class */
		public static $connection = null;
		public static function validatePOST($required=array()){
			$valid=true;
			foreach($required as $watch){
				if(!isset($_POST[$watch]) || (isset($_POST[$watch]) && empty($_POST[$watch])) ){
				   $valid=false; 
				}
			}
			return $valid;
		}
	

	
		public static function redirect($location,$arg=array()){
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$location= trim($location,'/');
			
			$params=""; $i=0;
			if(count($arg)>0){
				foreach($arg as $key=>$val){
					$params.=($i>0?"&":"?")."{$key}={$val}";	
					$i++;
				}
			}
			$url = "http://$host$uri/$location$params";
			header("Location: $url");
			exit();
		}
	

		/* messaging */
		public static function setMessage($message,$level="warn"){
			switch($level) {
				case "warn":
					$_SESSION['warnings'][]=$message;
					break;
				case "err":
					$_SESSION['errors'][]=$message;
					break;    
				case "success":
					$_SESSION['success'][]=$message;
					break;
			}
		}
		public static function getMessage(){
			if(!empty($_SESSION['errors'])){
				echo '<div class="ui-widget"> <div class="ui-state-error ui-corner-all" style="padding: 0px 0.7em; margin-top: 20px;">
						<h3 class="error"><span class="ui-icon ui-icon-info" style="margin-right: 0.3em; float: left;"></span>'.implode('<br/>',$_SESSION['errors']).'</h3>
					</div> </div>';
				$_SESSION['errors']=array();
			}
			if(!empty($_SESSION['warnings'])){
				echo '<div class="ui-widget"> <div class="ui-state-highlight ui-corner-all" style="padding: 0px 0.7em; margin-top: 20px;">
						<h3 class="warning"><span class="ui-icon ui-icon-info" style="margin-right: 0.3em; float: left;"></span>'.implode('<br/>',$_SESSION['warnings']).'</h3>
					</div> </div>';
				$_SESSION['warnings']=array();
			}
			if(!empty($_SESSION['success'])){
				echo '<div class="ui-widget"> <div class="ui-state-highlight success ui-corner-all" style="padding: 0px 0.7em; margin-top: 20px;">
						<h3 class="success"><span class="ui-icon ui-icon-check" style="margin-right: 0.3em; float: left;"></span>'.implode('<br/>',$_SESSION['success']).'</h3>
					</div> </div>';
				$_SESSION['success']=array();
			}
		}
	
	
	
		public static function makeDbConnection($db=null){
			self::$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, ($db==null?DB_NAME:$db));
			if (!self::$connection) {
			   die('Could not connect: ' . mysqli_connect_error());
			}
			return self::$connection;
		}
		public static function closeDbConnection(){
			mysqli_close(self::$connection);
		}
	
		public static function getDb($db=null){
			if(self::$connection==null){
			   self::$connection = self::makeDbConnection($db==null?DB_NAME:$db);
			}
			return self::$connection;
		}
	
	
		public static function getEntry($id){
		
			$db = generalform::getDb(DB_NAME);
			$table = 'formdata';
			if(!isset($_POST['searchOn']) && $id>0){
				$query = "SELECT * FROM `".$table."` WHERE ".sprintf(" `id`='%s' ",$id);
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
	
	
		public static function createCSV($file,$dataObj,$saveFile=false){
			$fp = fopen($file, 'w');
			foreach ($dataObj as $fields) {
				fputcsv($fp, $fields);
			}
	
			fclose($fp);
			header('Pragma: public');  // required
			header('Expires: 0');  // no cache
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			
			header('Cache-Control: private', false);
			header('Content-Type: application/csv');
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($file)) . ' GMT');
			header('Content-disposition: attachment; filename=' . $file . '');
			header("Content-Transfer-Encoding:  binary");
			header('Content-Length: ' . filesize($file)); // provide file size
			header('Connection: close');
			readfile($file);
			if(!$saveFile){
				unlink($file);
			}
			exit();
		}
		public static function testdate($date,$from,$to){
			$result=true;
			$TestDate = date( 'Y-m-d', strtotime($date) );
			$Begin = date( 'Y-m-d', strtotime($from) );
			$End = date( 'Y-m-d', strtotime($to) );
			$result = ($TestDate >= $Begin && $TestDate <= $End);
			return $result;	
		}
	
		/* HTML generation */
		//may need to change this, but used in the sub sections of the intake so keep for now
		public static function createFormField($key,$field,$entry){
			$name=$key.'_'.$field['id'];
			$value=isset($entry->$name)?$entry->$name:'';
			$html="";
			switch ($field['type']) {
				case 'date':
					$html .= "<label>".$field['title'].": <br/>";
					$html .= "<input type='date' name='".$name."' value='".$value."' /></label>";
					break;
				case 'text':
					$html .= "<label>".$field['title'].": <br/>";
					$html .= "<input type='text' name='".$name."' value='".$value."' /></label>";
					break;
				case 'radio':
					$html .= "<label>".$field['title'].": <br/>";
					foreach($field['option'] as $k =>$v){
						$html .= "<input type='radio' name='".$name."' ". ($value==$k ?"checked":"")." value='".$k."' /> ".$v."</label>";
					}
					break;
				case 'select':
					$html .= "<label>".$field['title'].": <br/>";
					$html .= "<select name='".$name."'>";
					foreach($field['option'] as $k =>$v){
						$html .= "<option ". ($value==$k ?"selected":"")." value='".$k."' > ".$v."</option>";
					}
					$html .= "</select></label>";
					break;
				case 'textarea':
					$html .= "<label>".$field['title'].": <br/>";
					$html .= "<textarea name='".$name."'>".$value."</textarea></label>";
					break;
					break;
			}
			return $html;
		}






		/* NOTE: at this point it may be worth really creating a model in this suco MVC*/
		public static function get_model($model=null){
			
			
			
			
			
			$INTERNSHIP = array(
				"applied" =>array(
					"lable"=> 'Did student applied for internship program',
					"type"=>'checkbox'
				),
				"placed" =>array(
					"lable"=> 'Is student placed in internship',
					"type"=>'checkbox'
				),
				"attend_workshop" =>array(
					"lable"=> 'Did student attend workshop',
					"type"=>'checkbox'
				),
			);	
			
			$COUNSELING = array(
				"career_counseling" =>array(
					"lable"=> 'Did the student get career counseling',
					"type"=>'checkbox'
				),
				"referred_employment" =>array(
					"lable"=> 'Did the student get referred for employment',
					"type"=>'checkbox'
				),
				"employed" =>array(
					"lable"=> 'Did the student get employed',
					"type"=>'checkbox'
				),
				"resume_cover_letter_training" =>array(
					"lable"=> 'Did the student received resume or cover letter training',
					"type"=>'checkbox'
				),	
				"mock_interview" =>array(
					"lable"=> 'Did the student complete mock interview',
					"type"=>'checkbox'
				),
			);	
			
			$TRANSCRIPT_EVALUATIONS = array(
				"foreign" =>array(
					"lable"=> 'Foreign institution Transcript Evaluation Completed',
					"type"=>'checkbox'
				),
				"military" =>array(
					"lable"=> 'Military Transcript Evaluation Completed',
					"type"=>'checkbox'
				),
				"non_uh" =>array(
					"lable"=> 'Non-UH Institution Transcript Evaluation Completed',
					"type"=>'checkbox'
				),
				"uh" =>array(
					"lable"=> 'UH Institution Transcript Evaluation Completed',
					"type"=>'checkbox'
				),
				"earned_credit_foreign" =>array(
					"lable"=> 'Earned Transfer Credit from Foreign institution Transcript',
					"type"=>'checkbox'
				),
				"earned_credit_military" =>array(
					"lable"=> 'Earned Transfer Credit from Military Transcript',
					"type"=>'checkbox'
				),
				"earned_credit_non_uh" =>array(
					"lable"=> 'Earned Transfer Credit from Non-UH Institution Transcript',
					"type"=>'checkbox'
				),
				"earned_credit_uh" =>array(
					"lable"=> 'Earned Transfer Credit from UH Institution Transcript',
					"type"=>'checkbox'
				),
				
				"credits_earned_foreign" =>array(
					"lable"=> 'Number of Credits Earned from Foreign institution Transcript',
					"type"=>'number'
				),
				"credits_earned_military" =>array(
					"lable"=> 'Number of Credits Earned from Military Transcript',
					"type"=>'number'
				),
				"credits_earned_non_uh" =>array(
					"lable"=> 'Number of Credits Earned from Non-UH Institution Transcript',
					"type"=>'number'
				),
				"credits_earned_uh" =>array(
					"lable"=> 'Number of Credits Earned from UH Institution Transcript',
					"type"=>'number'
				),
			);	
			
			$PRIOR_LEARNING_ASSESSMENT = array(
				"expressed_interest_in_pla" =>array(
					"lable"=> 'Expressed Interest in PLA',
					"type"=>'checkbox'
				),
				"participated_in_pla" =>array(
					"lable"=> 'Participated in PLA Information Session',
					"type"=>'checkbox'
				),
				"participated_in_pla_workshop" =>array(
					"lable"=> 'Participated in PLA Workshop',
					"type"=>'checkbox'
				),
				"received_pla_counseling" =>array(
					"lable"=> 'Received PLA Counseling',
					"type"=>'checkbox'
				),
				"participated_in_portfolio_development" =>array(
					"lable"=> 'Participated in Portfolio Development Workshop',
					"type"=>'checkbox'
				),
				"took_credit_by_institutional" =>array(
					"lable"=> 'Took Credit by Institutional Exam',
					"type"=>'checkbox'
				),
				"took_clep" =>array(
					"lable"=> 'Took CLEP Exam',
					"type"=>'checkbox'
				),
				"took_uexcel" =>array(
					"lable"=> 'Took UExcel Exam',
					"type"=>'checkbox'
				),
				"took_dsst" =>array(
					"lable"=> 'Took DSST Exam',
					"type"=>'checkbox'
				),
				"earned_credit_articulation_agreement" =>array(
					"lable"=> 'Earned Credit through Articulation Agreement',
					"type"=>'checkbox'
				),
				"earned_credit_portfolio_assessment" =>array(
					"lable"=> 'Earned Credit through Portfolio Assessment',
					"type"=>'checkbox'
				),
				"earned_credit_credit_institutional" =>array(
					"lable"=> 'Earned Credit through Credit by Institutional Exam',
					"type"=>'checkbox'
				),
				"earned_credit_through_clep" =>array(
					"lable"=> 'Earned Credit through CLEP Exam',
					"type"=>'checkbox'
				),
				"earned_credit_uexcel" =>array(
					"lable"=> 'Earned Credit through UExcel Exam',
					"type"=>'checkbox'
				),
				"earned_credit_dsst" =>array(
					"lable"=> 'Earned Credit through DSST Exam',
					"type"=>'checkbox'
				),

				"credits_earned_articulation_agreement" =>array(
					"lable"=> 'Number of Credits Earned from Articulation Agreement',
					"type"=>'number'
				),
				"credits_earned_portfolio_assessment" =>array(
					"lable"=> 'Number of Credits Earned from Portfolio Assessment',
					"type"=>'number'
				),
				"credits_earned_credit_institutional" =>array(
					"lable"=> 'Number of Credits Earned from Credit by Institutional Exam',
					"type"=>'number'
				),
				"credits_earned_clep" =>array(
					"lable"=> 'Number of Credits Earned from CLEP Exam',
					"type"=>'number'
				),
				"credits_earned_exam" =>array(
					"lable"=> 'Number of Credits Earned from UExcel Exam',
					"type"=>'number'
				),
				"credits_earned_dsst" =>array(
					"lable"=> "Number of Credits Earned from DSST Exam",
					"type"=>'number'
				)
			);	
			
				
			switch ($model) {
				case 'form':
					$model = array();
					break;
				case 'internship':
					$model = $INTERNSHIP;
					break;
				case 'counseling':
					$model = $COUNSELING;
					break;
				case 'transcript':
					$model = $TRANSCRIPT_EVALUATIONS;
					break;
				case 'pla':
					$model = $PRIOR_LEARNING_ASSESSMENT;
					break;
				case 'note':
					$model = $PRIOR_LEARNING_ASSESSMENT;
					break;
			}
			
			return $model;
		}

















	
		/* NOTE: at this point it may be worth really creating a model in this suco MVC*/
		public static function get_INTERNSHIP(){
			$INTERNSHIP = array(
				"Did student applied for internship program" => 'checkbox',
				"Is student placed in internship" => 'checkbox',
				"Did student attend workshop" => 'checkbox',
			);	
			return $INTERNSHIP;
		}
	
	
		/* NOTE: at this point it may be worth really creating a model in this suco MVC*/
		public static function get_COUNSELING(){
			$COUNSELING = array(
				"Did the student get career counseling" => 'checkbox',
				"Did the student get referred for employment" => 'checkbox',
				"Did the student get employed" => 'checkbox',
				"Did the student received resume or cover letter training" => 'checkbox',	
				"Did the student complete mock interview" => 'checkbox',
			);	
			return $COUNSELING;
		}
	
		/* NOTE: at this point it may be worth really creating a model in this suco MVC*/
		public static function get_TRANSCRIPT_EVALUATIONS(){
			$TRANSCRIPT_EVALUATIONS = array(
				"Foreign institution Transcript Evaluation Completed" => 'checkbox',
				"Military Transcript Evaluation Completed" => 'checkbox',
				"Non-UH Institution Transcript Evaluation Completed" => 'checkbox',
				"UH Institution Transcript Evaluation Completed" => 'checkbox',
				"Earned Transfer Credit from Foreign institution Transcript" => 'checkbox',
				"Earned Transfer Credit from Military Transcript" => 'checkbox',
				"Earned Transfer Credit from Non-UH Institution Transcript" => 'checkbox',
				"Earned Transfer Credit from UH Institution Transcript" => 'checkbox',
				
				"Number of Credits Earned from Foreign institution Transcript" => 'number',
				"Number of Credits Earned from Military Transcript" => 'number',
				"Number of Credits Earned from Non-UH Institution Transcript" => 'number',
				"Number of Credits Earned from UH Institution Transcript" => 'number'
			);	
			return $TRANSCRIPT_EVALUATIONS;
		}
		/* NOTE: at this point it may be worth really creating a model in this suco MVC*/
		public static function get_PRIOR_LEARNING_ASSESSMENT(){		
			$PRIOR_LEARNING_ASSESSMENT = array(
				"Expressed Interest in PLA" => 'checkbox',
				"Participated in PLA Information Session" => 'checkbox',
				"Participated in PLA Workshop" => 'checkbox',
				"Received PLA Counseling" => 'checkbox',
				"Participated in Portfolio Development Workshop" => 'checkbox',
				"Took Credit by Institutional Exam" => 'checkbox',
				"Took CLEP Exam" => 'checkbox',
				"Took UExcel Exam" => 'checkbox',
				"Took DSST Exam" => 'checkbox',
				"Earned Credit through Articulation Agreement" => 'checkbox',
				"Earned Credit through Portfolio Assessment" => 'checkbox',
				"Earned Credit through Credit by Institutional Exam" => 'checkbox',
				"Earned Credit through CLEP Exam" => 'checkbox',
				"Earned Credit through UExcel Exam" => 'checkbox',
				"Earned Credit through DSST Exam" => 'checkbox',
				
				"Number of Credits Earned from Articulation Agreement" => 'number',
				"Number of Credits Earned from Portfolio Assessment" => 'number',
				"Number of Credits Earned from Credit by Institutional Exam" => 'number',
				"Number of Credits Earned from CLEP Exam" => 'number',
				"Number of Credits Earned from UExcel Exam" => 'number',
				"Number of Credits Earned from DSST Exam" => 'number'
			);	
			return $PRIOR_LEARNING_ASSESSMENT;
		}




	
	}


}


?>