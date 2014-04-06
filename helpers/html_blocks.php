<?php
class html_blocks {

	public static function formField($params=array(),$entry=array()){
		$defaults = array(
			"type" => null,
			"label" => null,
			"name"=> null,
			"class"=>false,
			"style"=>false,
			"field_attr"=>false,
			"required" => false,									// bool
			"required_html" => "<em class='req'>*</em>",			// string
			"options" => array(),
			"option_labels" => array(),
			"options_newline"=>"<br/>",								// (false|string) html/text value when true else false
			"before"=>"",
			"after"=>""
		);
		$params = array_merge($defaults,$params);
		if($params['type']==null || $params['name']==null)die('failed to proived the form type data');
		$html="";
		$html.=$params['before'];

		$checkable = ($params['type']=="radio" || $params['type']=="checkbox");
		$selectable = ($params['type']=="select" || $params['type']=="multiple_select");

		if($params['label']!=null && !$checkable){
			$html .= "<label><strong>${params['label']}".($params['required']?" ${params['required_html']} ":"")."</strong><br/>";
		}
		
		
		

		$attr="";
		
		$attr .= $params['field_attr']? " ${params['field_attr']} ":"";
		$attr .= $params['required']? " required ":"";
		$attr .= $params['class']? " class='${params['class']}' ":"";
		$attr .= $params['style']? " style='${params['style']}' ":"";

		$name=$params['name'];

		$value=isset($entry->$name)? $entry->$name : '';
		$hasOther=false;
		
		
		

		
		
		switch ($params['type']) {

			case 'date':
			case 'text':
				$html .= "<input type='${params['type']}' rel='${params['type']}' name='${name}' value='${value}' ${attr}/>";
				break;
				
			case 'textarea':
				$html .= "<textarea name='${name}' ${attr}>${value}</textarea>";
				break;
				
			case 'select':	
			case 'multiple_select':
				$value=isset($entry->$name)? (array)$entry->$name : array();
				
				$name .= $params['type']=='multiple_select'?'[]':'';
				$attr .= $params['type']=='multiple_select'?' multiple ':'';
				
				$html .= "<select name='${name}' ${attr}>";
				$i=0;

				
				foreach($params['options'] as $option){
					$option_label = isset($params['option_labels'][$i]) ? $params['option_labels'][$i] : $option;
					$selected = (in_array($option,$value)) ? " selected ":"";
					$html .= "<option value='${option}' ${selected} >${option_label}</option>";
					$i++;
					if(strtolower($option)=="other"){
						$hasOther=true;	
					}
				}
				$html .= "</select>";
				if($hasOther){
					$html .= "</label>";
					$other_name=trim($name,'[]')."_other";
					$other_value=isset($entry->$other_name)? $entry->$other_name :'';
					$html .="<label class='other ".($other_value!=''?"active":"")."'><br/>Other:<input type='text' name='${other_name}' value='${other_value}'/><br/></label>";	
				}
				break;
				
			case 'radio':
			case 'checkbox':
				$newline = $params['options_newline'] ? $params['options_newline'] : "";
				$value=isset($entry->$name)? (array)$entry->$name : array();
				
				$name .= $params['type']=='checkbox'?'[]':'';
				
				$i=0;
				$hasOther=false;
				foreach($params['options'] as $option){
					$option_label = isset($params['option_labels'][$i]) ? $params['option_labels'][$i] : $option;
					$checked = (in_array($option,$value)) ? " checked ":"";
					$html .= "<label>";
					$html .= "<input type='${params['type']}'  name='${name}'  value='${option}' ${checked} ${attr} />${option_label} ${newline}";
					$html .= "</label>";
					$i++;
					if(strtolower($option)=="other"){
						$hasOther=true;	
					}
				}
				if($hasOther){
					$other_name=trim($name,'[]')."_other";
					$other_value=isset($entry->$other_name)? $entry->$other_name :'';
					$html .="<label class='other ".($other_value!=''?"active":"")."'><br/>Other:<input type='text' name='${other_name}' value='${other_value}' /><br/></label>";	
				}
				
				break;
				break;
		}
		
		if($params['label']!=null && !$checkable && !$hasOther){
			 $html .= "</label>";
		}
		$html.=$params['after'];

		return $html;
	}


	public static function startForm($params=array()){
		$defaults = array(
			"method" => 'post',	//false to remove or string to replace default
			"enctype" => 'multipart/form-data',	//false to remove or string to replace default
			"action" => null,
			"name"=>false,

			"class"=>false,
			"style"=>false,
			"form_attr"=>"autocomplete='off' novalidate",	//false to remove or string to replace default
			
			"edit_header" => "<h4>Editing</h4>",
			"new_header" => "<h4>Adding a new entry</h4>",
			//the name of the entry id column
			"entry_id_name"=>"id"
		);
		$params = array_merge($defaults,$params);
		if($params['action']==null)die('failed to proived the form data');


		$attr = $params['name']? " name='${params['name']}'":"";

		$attr .= $params['enctype']? " enctype='${params['enctype']}' ":"";
		$attr .= $params['method']? " method='${params['method']}' ":"";
		
		$attr .= $params['class']? " class='${params['class']}' ":"";
		$attr .= $params['style']? " style='${params['style']}' ":"";
		$attr .= $params['form_attr']? " ${params['form_attr']} ":"";

		$entryHeader = isset($_GET['id']) ? $params['edit_header'] : $params['new_header']; 

		echo "
		<form action='${params['action']}' {$attr} >
		<input type='hidden' value='".(isset($_REQUEST['id'])?$_REQUEST['id']:"")."' name='${params['entry_id_name']}'/>
		${entryHeader}
		";
	}

	public static function formSubmitBlock($params=array()){
		$class="medium metro rounded btn";
		echo "<div class='row action_submits'>
			<div class='two columns ${class} success'>
				<input type='submit' name='submit' class=' ' value='Save & Exit' />
			</div>
			<div class='two columns ${class} primary '>
				<input type='submit' name='save' class='' value='Save' />
			</div>
			<div class='two columns ${class} danger'>
				<input type='submit' value='Cancel' name='endit' class='' />
			</div>
			<div class='six columns'></div>
		</div><hr/>";
	}

	public static function endForm($params=array()){
		echo "</form>";
	}
}