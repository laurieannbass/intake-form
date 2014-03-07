<?php
//maybe i should move this, ask jeremy how
  $actions = array(
  	"contacted"=>array( 'title'=>'New Employer’s contacted',
						'fields'=>array(
							'0'=>array('type'=>'date',
										'title'=>'Date',
										'id'=>'date'
								),
							'1'=>array('type'=>'text',
										'title'=>'Business Name',
										'id'=>'business_name'
								),
							'2'=>array('type'=>'select',
										'title'=>'Method of contact',
										'id'=>'business_name',
										'option'=>array('phone'=>'Phone','phone'=>'email','in_person'=>'in-Person')
								)
						)
					),
  	"event"=>array( 'title'=>'Events Completed',
						'fields'=>array(
							'0'=>array('type'=>'date',
										'title'=>'Date',
										'id'=>'date'
								),
							'1'=>array('type'=>'text',
										'title'=>'Title of event ',
										'id'=>'event_title'
								),
							'2'=>array('type'=>'radio',
										'title'=>'Location',
										'id'=>'location',
										'option'=>array('on_campus'=>'On Campus','off_campus'=>'Off Campus')
								),
							'3'=>array('type'=>'select',
										'title'=>'Staff Lead',
										'id'=>'staff_lead',
										'option'=>array('0'=>'Jan-Marie','1'=>'Joel','2'=>'Michele')
								)
						)
					),
	"placement"=>array( 'title'=>'New placement sites created',
						'fields'=>array(
							'0'=>array('type'=>'date',
										'title'=>'Date',
										'id'=>'date'
								),
							'1'=>array('type'=>'text',
										'title'=>'Business Name',
										'id'=>'business_name'
								)
						)
					),
	"presentations"=>array( 'title'=>'Class Room Presentations',
						'fields'=>array(
							'0'=>array('type'=>'date',
										'title'=>'Date',
										'id'=>'date'
								),
							'1'=>array('type'=>'text',
										'title'=>'Title of presentation',
										'id'=>'presentation_title'
								),
							'2'=>array('type'=>'select',
										'title'=>'Staff Lead',
										'id'=>'staff_lead',
										'option'=>array('0'=>'Jan-Marie','1'=>'Joel','2'=>'Michele')
								)
						)
					),
	"development"=>array( 'title'=>'PLA Program Development',
						'fields'=>array(
							'0'=>array('type'=>'date',
										'title'=>'Date',
										'id'=>'date'
								),
							'1'=>array('type'=>'text',
										'title'=>'Contact Name ',
										'id'=>'contact_name'
								),
							'2'=>array('type'=>'textarea',
										'title'=>'Topic',
										'id'=>'topic'
								),
						)
					),
	"marketing"=>array( 'title'=>'PLA Program Marketing / Recruiting',
						'fields'=>array(
							'0'=>array('type'=>'date',
										'title'=>'Date',
										'id'=>'date'
								),
							'1'=>array('type'=>'textarea',
										'title'=>'Marketed To ',
										'id'=>'marketed_to'
								),
							'2'=>array('type'=>'radio',
										'title'=>'Location',
										'id'=>'location',
										'option'=>array('marketing'=>'Marketing','recruiting'=>'Recruiting')
								),
							'3'=>array('type'=>'select',
										'title'=>'Staff Lead',
										'id'=>'staff_lead',
										'option'=>array('newspaper'=>'Newspaper','radio'=>'Radio','fliers'=>'Fliers')
								)
						)
					),
  );
	$entry=array();
?><!DOCTYPE html>
<html>
<head>
    <?php include_once('veiws/structure/head.php'); ?>
</head>
<body id="public">
    <div id="container" class="ltr">
        <?php include_once('veiws/structure/header.php'); ?>
        <form name='input' action='outreach.php' class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate>

        <h2>Outreach Actions</h2>       
        <?php 
            echo '<input type="hidden" value="'.(isset($_GET['id'])?$_GET['id']:"").'" name="id"/>';
        ?>
                
                <div id='action_choice' class='<?php echo isset($_GET['id'])? 'sudohidden':''; ?>'>
                    <h3>Choose Action</h3>
                    <ul>
                        <?php
                            foreach($actions as $k =>$v){
                                echo "<li><input type='radio' name='action_type' ".(isset($entry->action_type)&&$entry->action_type==$k?'checked':'')." value='".$k."' /> ".$v['title']."</li>";
                            }
                        ?>
                    </ul>
                </div>

			<?php
			$i=0;
                foreach($actions as $key =>$v){
		$usage = isset($entry->action_type) && $entry->action_type == $key ? '' : 'notused';
				?>
        			<ul id="<?php echo $key; ?>" class="fieldset <?php echo $usage; ?>">
                    <li><hr/><h3><?php echo $v['title']; ?></h3><hr/></li>
					<?php
					foreach($v['fields'] as $k =>$field){
					?>
                        <li id="foli<?php echo $i; ?>" class="complex notranslate"> 
                            <div>	
                                <span class="radio field"  style="margin-right:25px;" >
                                  <?php echo generalform::createFormField($key,$field,$entry); ?>
                                </span>	
                            </div>
                        </li>
                    <?php
					$i++;
					}
        			?>
                    <li><input type="submit" value="submit" /><input type="submit" value="cancel" name="endit" /></li>
                    </ul><?php
                }
            ?>
        </form>
    </div>
</body>

</html> 