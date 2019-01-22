<?php

#get page section (open)
if(1==1){
    
    if($_GET['delete'] == 5405457426157613457946583267832){
	
	$page_section = "delete_account";
	
	if($_GET['execute_deletion'] == 1){
	    $execute_deletion = "yes";
	}
	
    }else{
	
	$page_section = "main part";
	
    }
    
}
#get page section (close)

#main page section (open)
if($page_section == "main part"){
    
    #general preparation (open)
    if(1==1){
		
		#function-user-positions-get.php (v1.8) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_userpositions_get['user id'] = 'current_user'; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
				#$function_userpositions_get['display all positions for developers'] = 'yes'; // 'yes', 'yes, long' or 'no' (default).
				// Shows all positions the user has. 'yes, long' prints the entire output in a nice way.
				
			}
			#input (close)
			
			include('#function-user-positions-get.php');
			
			#output (open)
			if(1==1){
				
				# The function produces three arrays:
				#
				# Method 1: unsorted list
				#   $function_userpositions_get['unsorted list'][PROPERTY] = PROPERTY VALUE
				#        position: specific position name, in some cases additional info is added, separated by ';', e.g. 'NGO Worker;4' with 4 being NGO id
				#        position_pure: specific position name without additional information
				#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
				#        status: "accepted", "pending"
				#        application_text: optional text, depending on position
				#        application_id: mysql data entry index
				#        application_date_created
				#        application_date_modified
				#
				# Method 2: sorted list
				#   $function_userpositions_get['sorted list'][SPECIFIC POSITION NAME][PROPERTY] = PROPERTY VALUE
				#        SPECIFIC POSITION NAME = name of the specific position (mind the spelling!)
				#        position_pure: specific position name without additional information
				#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
				#        status: "accepted", "pending"
				#        application_text: optional text, depending on position
				#        application_id: mysql data entry index
				#        application_date_created
				#        application_date_modified
				#
				# Method 3: Simple arrays
				#    $function_userpositions_get['simple array'][STATUS][INDEX] = SPECIFIC POSITION NAME   //STATUS = pending or accepted
				#     Example usage:
				#       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
				#
				# Method 4: Simple pure arrays
				#    $function_userpositions_get['simple_pure_array'][STATUS][INDEX] = SPECIFIC PURE POSITION NAME   //STATUS = pending or accepted
				#
				# Method 5:
				#    $function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
				#        full -> NGO name (user position)
				#        position -> pure position
				#        status -> "accepted" or "pending"
				#        ngo_name -> NGO name
				#        ngo_id -> NGO id
				#
				# Global variables:
				#    Function get's called in the top right sidebar for the current user, so these global variables are always available.
				#        $GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
				#        $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
				#       $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['STATUS'][] = POSITION NAME
				#    Example usage:
				#        in_array(POSITION NAME,$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])
				#
				# Note:
				# The function also outputs a list of "allowed positions". E.g. the user may not take up Voluno Staff positions without becoming a staff member first.
				#       $function_userpositions_get['allowed_pure_positions']
				# Additionally, it outputs an array of staff positions:
				#       $function_userpositions_get['allowed_pure_positions_voluno_staff']
				# But this functionality is only required for the function to edit existing user positions and not intended for regular use.
				
			}
			#output (close)
			
		}
		#function-user-positions-get.php (v1.8) (close)
		
		#arrays for automatic table (open)
		if(1==1){
			
			#General (open)
			if(1==1){
			
			#divs + containers array (close) #modified
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'General'
				,'div_id' => 'general_settings'
				);
				$containers_array[] = array(
				'div_id' => 'general_settings'
				,'container_title' => 'Email notifications'
				,'container_id' => 'email_general'
				);
				$containers_array[] = array(
				'div_id' => 'general_settings'
				,'container_title' => 'Privacy'
				,'container_id' => 'privacy_general'
				);
				$containers_array[] = array(
				'div_id' => 'general_settings'
				,'container_title' => 'Miscellaneous'
				,'container_id' => 'miscellaneous_general'
				);/*
				$containers_array[] = array(
				'div_id' => 'general_settings'
				,'container_title' => 'Account'
				,'container_id' => 'account_general'
				);*/
			}
			#divs + containers array (close) #modified
			
			#contents array (open)
			if(1==1){
				
				#email (open) #modified
				if(1==1){/*
				$items_array[] = array(
					'container_id' => 'email_general'
					,'text' => 'I receive a new message'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'new_message_from_internal_voluno_messaging_system'
					,'status' => 'working'
				);
				$items_array[] = array(
					'container_id' => 'email_general'
					,'text' => 'Someone responds to my forum post or writes in a discussion or thread that I subscribed to.'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'send_email_when_forum_activity_in_my_subscriptions'
					,'status' => 'not_working_yet'
				);*/
				$items_array[] = array(
					'container_id' => 'email_general'
					,'text' => 'Disable ALL regular email notifications. You will only receive important emails from Voluno. '.
						'If checked, this setting overrides all of the above email settings. It is not recommended.'
					,'type' => 'checkbox'
					,'default' => 'no'
					,'mysql' => 'disable_all_regular_emails'
					,'status' => 'not_working_yet'
				);
				}
				#email (close) #modified
				
				#privacy (open)
				if(1==1){
				$items_array[] = array(
					'container_id' => 'privacy_general'
					,'text' => 'On the page
						"<a href="'.get_permalink(689).'" title="Go to page">All Voluno Members</a>",
						all other Voluno members can find my profile.'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'show_me_in_all_voluno_members_page'
					,'status' => 'not working'
				);/*
				$items_array[] = array(
					'container_id' => 'privacy_general'
					,'text' => 'If I have uploaded a CV to my profile: Allow all member to view it.'
					,'type' => 'checkbox'
					,'default' => 'no'
					,'mysql' => 'publish_cv_to_all_members'
					,'status' => 'not working'
				);
				$items_array[] = array(
					'container_id' => 'privacy_general'
					,'text' => 'Show contact information in profile (phone, email, skype, etc.) to all Voluno members.
						If disabled, other members, will only be able to directly contact you through the Voluno message function.'
					,'type' => 'checkbox'
					,'default' => 'no'
					,'mysql' => 'publish_cv_to_all_members'
					,'status' => 'not working'
				);*/
				}
				#privacy (close)
				
				#miscellaneous (open) #modified
				if(1==1){
				
				$items_array[] = array(
					'container_id' => 'miscellaneous_general'
					,'text' => 'When I receive or send a message, add the conversation partner(s) to my contacts, '.
						'unless I previously removed them from my contacts.'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'automatically_add_member_to_my_contacts_after_internal_message'
					,'status' => 'working'
				);
				$items_array[] = array(
					'container_id' => 'miscellaneous_general'
					,'text' => 'When a member adds me as a contact, also add that member to my contacts, '.
						'unless I previously removed him or her from my contacts.'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'automatically_add_member_to_my_contacts_after_i_am_added'
					,'status' => 'working'
				);/*
				$items_array[] = array(
					'container_id' => 'miscellaneous_general'
					,'text' => 'Automatically subscribe to forum discussions after posting something.'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'automatically_subscribe_to_focum_discussion_after_posting'
					,'status' => 'not_working_yet'
				);*/
				
				}
				#miscellaneous (close) #modified
				
				#account (open) #modified
				if(1==1){/*
				$items_array[] = array(
					'container_id' => 'account_general'
					,'text' => 'Pause my account.'
					,'type' => 'checkbox'
					,'default' => 'no'
					,'mysql' => 'account_sleep_mode'
					,'status' => 'not working'
				);
				$items_array[] = array(
					'container_id' => 'account_general'
					,'text' => 'Delete account'
					,'type' => 'special'
					,'default' => 'no'
					,'mysql' => 'delete_account'
					,'status' => 'not working'
				);*/
				}
				#account (close) #modified
				
			}
			#contents array (close)
			
			}
			#General (close)
			
			#Volunteer (open) #modified
			if(in_array('Volunteer',$function_userpositions_get['simple_pure_array']['accepted'])){/*
			
			#divs + containers array (close)
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'Volunteer settings'
				,'div_id' => 'volunteer_settings'
				,'position_id' => 1
				);
				$containers_array[] = array(
				'div_id' => 'volunteer_settings'
				,'container_title' => 'Email notifications'
				,'container_text' => 'Send email if'
				,'container_id' => 'email_volunteer'
				);
				$containers_array[] = array(
				'div_id' => 'volunteer_settings'
				,'container_title' => 'Privacy'
				,'container_text' => ''
				,'container_id' => 'privacy_volunteer'
				);
			}
			#divs + containers array (close)
			
			#contents array (open)
			if(1==1){
				
				#email (open)
				if(1==1){
				$items_array[] = array(
					'container_id' => 'email_volunteer'
					,'text' => 'Task application is accepted'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'task_application_accepted_mail_notification'
					,'status' => 'not working'
				);
				$items_array[] = array(
					'container_id' => 'email_volunteer'
					,'text' => 'Task application is rejected'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'task_application_rejected_mail_notification'
					,'status' => 'not working'
				);
				$items_array[] = array(
					'container_id' => 'email_volunteer'
					,'text' => 'A new task is available that fits your search criteria'
					,'type' => 'checkbox'
					,'default' => 'yes'
					,'mysql' => 'new_task_available_mail_notification'
					,'status' => 'not working'
				);
				}
				#email (close)
				
				#privacy (open)
				if(1==1){
				$items_array[] = array(
					'container_id' => 'privacy_volunteer'
					,'text' => 'Show CV to all development workers who visit my profile.'
					,'type' => 'checkbox'
					,'default' => 'no'
					,'mysql' => 'publish_cv_to_ngos'
					,'status' => 'not working'
				);
				}
				#privacy (close)
				
			}
			#contents array (close)
			
			}
			#Volunteer (close)
			
			#Development worker (open)
			if(in_array('NGO Member',$function_userpositions_get['simple_pure_array']['accepted'])){
			
			#divs + containers array (close)
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'Development worker settings'
				,'div_id' => 'ngo_settings'
				,'position_id' => 2
				);
				$containers_array[] = array(
				'div_id' => 'ngo_settings'
				,'container_title' => 'Email notifications'
				,'container_id' => 'email_ngo'
				);
			}
			#divs + containers array (close)
			
			#contents array (open)
			if(1==1){
				$items_array[] = array(
				'container_id' => 'email_ngo'
				,'text' => '33'
				,'type' => 343
				,'default' => 'yes'
				,'mysql' => 'dsfdsjfo'
				,'status' => 'not working'
				);
			}
			#contents array (close)
			
			}
			#Development worker (close)
			
			#Agent (open)
			if(1==2 AND in_array('AGENT!??!?!?',$function_userpositions_get['simple_pure_array']['accepted'])){ ###
			
			#divs + containers array (close)
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'Agent settings'
				,'div_id' => 'agent_settings'
				,'position_id' => 3
				);
				$containers_array[] = array(
				'div_id' => 'agent_settings'
				,'container_title' => 'Email notifications'
				,'container_id' => 'email_agent'
				);
			}
			#divs + containers array (close)
			
			#contents array (open)
			if(1==1){
				$items_array[] = array(
				'container_id' => 'email_agent'
				,'text' => '33'
				,'type' => 343
				,'default' => 'yes'
				,'mysql' => 'dsfdsjfo'
				,'status' => 'not working'
				);
			}
			#contents array (close)
			
			}
			#Agent (close)
			
			#Trainer (open)
			if(1==2 AND in_array('Volunteer Trainer',$function_userpositions_get['simple_pure_array']['accepted'])){ ###
			
			#divs + containers array (close)
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'Trainer settings'
				,'div_id' => 'trainer_settings'
				,'position_id' => 4
				);
				$containers_array[] = array(
				'div_id' => 'trainer_settings'
				,'container_title' => 'Email notifications'
				,'container_id' => 'email_trainer'
				);
			}
			#divs + containers array (close)
			
			#contents array (open)
			if(1==1){
				$items_array[] = array(
				'container_id' => 'email_trainer'
				,'text' => '33'
				,'type' => 343
				,'default' => 'yes'
				,'mysql' => 'dsfdsjfo'
				,'status' => 'not working'
				);
			}
			#contents array (close)
			
			}
			#Trainer (close)
			
			#Advisor (open)
			if(1==2 AND in_array('Volunteer Advisor',$function_userpositions_get['simple_pure_array']['accepted'])){ ###
			
			#divs + containers array (close)
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'Advisor settings'
				,'div_id' => 'advisor_settings'
				,'position_id' => 5
				);
				$containers_array[] = array(
				'div_id' => 'advisor_settings'
				,'container_title' => 'Email notifications'
				,'container_id' => 'email_advisor'
				);
			}
			#divs + containers array (close)
			
			#contents array (open)
			if(1==1){
				$items_array[] = array(
				'container_id' => 'email_advisor'
				,'text' => '33'
				,'type' => 343
				,'default' => 'yes'
				,'mysql' => 'dsfdsjfo'
				,'status' => 'not working'
				);
			}
			#contents array (close)
			
			}
			#Advisor (close)
			
			#Recruiter (open)
			if(1==2 AND in_array('Volunteer Recruiter',$function_userpositions_get['simple_pure_array']['accepted'])){ ###
			
			#divs + containers array (close)
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'Recruiter settings'
				,'div_id' => 'recruiter_settings'
				,'position_id' => 6
				);
				$containers_array[] = array(
				'div_id' => 'recruiter_settings'
				,'container_title' => 'Email notifications'
				,'container_id' => 'email_recruiter'
				);
			}
			#divs + containers array (close)
			
			#contents array (open)
			if(1==1){
				$items_array[] = array(
				'container_id' => 'email_recruiter'
				,'text' => '33'
				,'type' => 343
				,'default' => 'yes'
				,'mysql' => 'dsfdsjfo'
				,'status' => 'not working'
				);
			}
			#contents array (close)
			
			}
			#Recruiter (close)
			
			#Staff member (open)
			if(in_array('Voluno Staff Member',$function_userpositions_get['simple_pure_array']['accepted'])){
			
			#divs + containers array (close)
			if(1==1){
				$divs_array[] = array(
				'div_title' => 'Staff member settings'
				,'div_id' => 'staff_member_settings'
				,'position_id' => 7
				);
				$containers_array[] = array(
				'div_id' => 'staff_member_settings'
				,'container_title' => 'Email notifications'
				,'container_id' => 'email_staff_member'
				);
			}
			#divs + containers array (close)
			
			#contents array (open)
			if(1==1){
				$items_array[] = array(
				'container_id' => 'email_staff_member'
				,'text' => '33'
				,'type' => 343
				,'default' => 'yes'
				,'mysql' => 'dsfdsjfo'
				,'status' => 'not working'
				);
			}
			#contents array (close)
			
			*/}
			#Staff member (close) #modified
			
		}
		#arrays for automatic table (close)
		
    }
    #general preparation (close)
    
    #mysql (open)
    if(1==1){
	
	#update (open)
	if(isset($_POST['save_settings_button'])){
	    
	    #update default settings if admin (open)
	    if(in_array('Voluno Web Developer',$function_userpositions_get['simple_pure_array']['accepted'])){
		
		#delete old values (open)
		if(1==1){
		    $wpdb->delete(
				    'fi4l3fg_voluno_personal_settings',
			    array( //location of row to delete
				    'pers_settings_general' => "my settings",
				    'pers_settings_user_id' => 0
			    ),
			    array( //format of location of row to delete
				    '%s',
				    '%s'
			    ));
		}
		#delete old values (close)
		
		#insert new values (open)
		for($adi=0;$adi<count($items_array);$adi++){
		    $wpdb->insert(
				    'fi4l3fg_voluno_personal_settings',
			    array( //updated content
				    'pers_settings_value' => $items_array[$adi]['default'],
				    'pers_settings_user_id' => 0,
				    'pers_settings_general' => "my settings",
				    'pers_settings_specific' => $items_array[$adi]['container_id'].'__'.$items_array[$adi]['mysql']
			    ),
			    array( //format of updated content
				    '%s',
				    '%s',
				    '%s',
				    '%s'
				));
		}
		#insert new values (close)
		
	    }
	    #update default settings if admin (close)    
	    
	    #delete old (open)
	    if(1==1){
		$wpdb->delete(
				'fi4l3fg_voluno_personal_settings',
			array( //location of row to delete
				'pers_settings_general' => "my settings",
				'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
			),
			array( //format of location of row to delete
				'%s',
				'%s'
			));
	    }
	    #delete old (close)
	    
	    #insert new (open)
	    if($_POST['reset_setting'] != "reset"){ //reset all options to default
		for($adg=0;$adg<count($items_array);$adg++){
		    
		    if($_POST[$items_array[$adg]['container_id'].'__'.$items_array[$adg]['mysql']] == 1){
			$settings_value = "yes";
		    }else{
			$settings_value = "no";
		    }
		    
		    $wpdb->insert(
				    'fi4l3fg_voluno_personal_settings',
			    array( //updated content
				    'pers_settings_value' => $settings_value,
				    'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
				    'pers_settings_general' => "my settings",
				    'pers_settings_specific' => $items_array[$adg]['container_id'].'__'.$items_array[$adg]['mysql']
			    ),
			    array( //format of updated content
				    '%s',
				    '%s',
				    '%s',
				    '%s'
				));
		}
	    }
	    #insert new (close)
	    
	}
	#update (close)    
	
	#get (open)
	if(1==1){
	    
	    $user_and_default_settings_query = $wpdb->prepare('SELECT *
							    FROM fi4l3fg_voluno_personal_settings
							    WHERE pers_settings_general = "my settings"
								AND pers_settings_user_id IN (0,%s);'
							    ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
	    $user_and_default_settings_results = $wpdb->get_results($user_and_default_settings_query);
	    
	    #get values into sorted array (open)
	    for($adh=0;$adh<count($user_and_default_settings_results);$adh++){
		
		#default value (open)
		if($user_and_default_settings_results[$adh]->pers_settings_user_id == 0){
		    $my_settings_values_array[$user_and_default_settings_results[$adh]->pers_settings_specific]['default']
			= $user_and_default_settings_results[$adh]->pers_settings_value;
		}
		#default value (close)
		
		#user defined value (open)
		if($user_and_default_settings_results[$adh]->pers_settings_user_id == $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
		    $my_settings_values_array[$user_and_default_settings_results[$adh]->pers_settings_specific]['user_defined']
			= $user_and_default_settings_results[$adh]->pers_settings_value;
		}
		#user defined value (close)
		
	    }
	    #get values into sorted array (close)
	    
	}
	#get (close) 
	
    }
    #mysql (close)
    
    #jquery (open)
    if(1==1){
	echo '
	<script>
	    jQuery(document).ready(function(){';
		
		#options colors change (open)
		if(1==1){
		    echo '
		    jQuery(".option_class").hover(function(){
			jQuery(this).css("background-color","#FFC977");
		    },function(){
			jQuery(this).css("background-color","");
		    });';
		}
		#options colors change (close)
		
		#slideToggle content div title (open)
		if(1==1){
		    
		    echo '
		    jQuery(".content_div_title").click(function(){
			if(jQuery(this).closest(".content_div").find(".content_div_slidetoggle").is(":hidden")){
			    jQuery(".content_div_slidetoggle").slideUp(300);
			    jQuery(this).closest(".content_div").find(".content_div_slidetoggle").slideDown(300);
			}else{
			    jQuery(".content_div_slidetoggle").slideUp(300);
			}
		    });
		    ';
		    
		}
		#slideToggle content div title (close)
		
		#hover container color change (open)
		if(1==1){
		    
		    echo '
		    jQuery(".content_div").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
			jQuery(this).find(".content_div_container_title").css("background-color","#FFD87D");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
			jQuery(this).find(".content_div_container_title").css("background-color","#FFEAB9");
		    });
		    jQuery(".content_div_container").hover(function(){
			jQuery(this).css("background-color","#FFA461 ");
			jQuery(this).find(".content_div_container_title").css("background-color","#FFA461 ");
		    },function(){
			jQuery(this).css("background-color","");
			jQuery(this).find(".content_div_container_title").css("background-color","#FFD87D");
		    });
		    ';
		    
		}
		#hover container color change (close)
		
		#submit form (open)
		if(1==1){
		    
		    echo '
		    jQuery(".save_settings_button").click(function(){
			jQuery(".settings_form").submit();
		    });
		    jQuery(".reset_setting_button").click(function(){
			jQuery(".reset_setting").val("reset");
			jQuery(".settings_form").submit();
		    });
		    ';
		    
		}
		#submit form (close)
		
	    echo '
	    });
	</script>';
    }
    #jquery (close)
    
    #style (open)
    if(1==1){
	echo '
	<style>
	    
	    .content_div{
		margin:20px 0px;
		padding:10px;
		border-radius:20px;
		background-color:#FFEAB9;
		text-align:center;
	    }
	    .content_div_title{
	       padding:10px;
	       cursor:pointer;
	    }
	    .content_div label,.content_div input{
		cursor:pointer;
	    }
	    
	    .content_div_container{
		display:inline-block;
		width:45%;
		border:1px solid black;
		border-radius:10px;
		padding:10px;
		margin:10px;
	    }
	    .content_div_container_title{
		background-color:#FFEAB9;
		display:inline-block;
		border-radius:100px;
		padding:0px 10px;
	    }
	    
	    .content_div_slidetoggle{
		display:none;
	    }
	    
	    .not_working_yet{
		color:orange;
		font-style:italic;
	    }
	    
	    .checkbox_cell{
		vertical-align:middle;
		width:20px;
	    }
	    
	    .checkbox_text_cell{
		vertical-align:middle;
		padding:0px 0px;
		font-weight:bold;
		text-align:justify;
	    }
	    
	</style>';
    }
    #style (close)
    
    #visible content (open)
    if(1==1){
	
	#pers pages + img + title (open)
	if(1==1){
	    
	    #preparation (open)
	    if(1==1){
		
		#function-personal-pages.php (open)
		if(1==1){
		    $function_pers_pages_id = 1;
		    $function_pers_pages_active_page = "My settings";
		    include("#function-personal-pages.php");
		    echo $function_pers_pages;
		}
		#function-personal-pages.php (close)
		
		#function-image-processing (open)
		if(1==1){
		    #thematic only
			$function_propic__type = "thematic";
			$function_propic__original_img_name = "settings.jpg";
		    #all
			$function_propic__geometry = array(300,300); //optional, if e.g. only width: 300, NULL; vice versa
		    include('#function-image-processing.php');
		    # $function_propic;
		    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
		}
		#function-image-processing (close)
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<div style="overflow:hidden;">
		    <img src="'.$function_propic.'" class="voluno_header_picture">
		    <div style="text-align:center;margin:30px;">
			<h1>
			    My settings
			</h1>
		    </div>
		</div>';
		
	    }
	    #content (close)
	    
	}
	#pers pages + img + title (close)
	
	#div loop (open)
	for($acp=0;$acp<count($divs_array);$acp++){
	    
	    #only once - loop start (open)
	    if($acp == 0){
		
		#form part I/II (open)
		if(1==1){
		    echo '
		    <form method="post" action="'.get_permalink().'" class="settings_form">
			<input type="hidden" value="1" name="save_settings_button">
			<input type="hidden" name="reset_setting" class="reset_setting">';
		}
		#form part I/II (close)
		
	    }
	    #only once - loop start (close)
	    
	    echo '
	    <div class="content_div">
		<div class="content_div_title">
		    <h4 style="display:inline;">
			<a>
			    '.$divs_array[$acp]['div_title'].'
			</a>
		    </h4>
		</div>
		<div class="content_div_slidetoggle">';
		    
		    #container loop (open)
		    for($acq=0;$acq<count($containers_array);$acq++){
			if($containers_array[$acq]['div_id'] == $divs_array[$acp]['div_id']){
			    
			    echo '
			    <div class="content_div_container">
				<div style="margin-top:-45px;">
				    <h5 class="content_div_container_title">
					'.$containers_array[$acq]['container_title'].'
				    </h5>
				</div>
				<p>
				    '.$containers_array[$acq]['container_text'].'
				</p>
				<table>';
				    
				    #item loop (open)
				    for($acr=0;$acr<count($items_array);$acr++){
					if($items_array[$acr]['container_id'] == $containers_array[$acq]['container_id']){
					    echo '
					    <tr>';
						
						#checkbox (open)
						if($items_array[$acr]['type'] == "checkbox"){
						    
						    #preparation (open)
						    if(1==1){
							
							$input_id = 'id_'.$acq.$acr;
							
							$item_name = $items_array[$acr]['container_id'].'__'.$items_array[$acr]['mysql'];
							
							#selected (open)
							if(1==1){
							    
							    #get value (open)
							    if(empty($my_settings_values_array[$item_name]['user_defined'])){
								$selected_setting = $my_settings_values_array[$item_name]['default'];
							    }else{
								$selected_setting = $my_settings_values_array[$item_name]['user_defined'];
							    }
							    #get value (close)
							    
							    #set selected (open)
							    if($selected_setting == "yes"){
								$checked = 'checked="checked"';
							    }else{
								unset($checked);
							    }
							    #set selected (close)
							    
							}
							#selected (close)
							
						    }
						    #preparation (close)
						    
						    #content (open)
						    if(1==1){
							
							echo '
							<td style="width:20px;text-align:center;">
							    <input
								id="'.$input_id.'"
								type="checkbox"
								name="'.$item_name.'"
								style="margin-top:2px;"
								value=1
								'.$checked.'
							    >
							</td>
							<td>
							    <label for="'.$input_id.'">
								<p>
								    '.$items_array[$acr]['text'].'
								</p>
							    </label>
							</td>';
							
						    }
						    #content (close)
						    
						}
						#checkbox (close)
						
					    echo '
					    </tr>';
					}
				    }
				    #item loop (close)
				    
				echo '
				</table>
			    </div>';
			    
			}
		    }
		    #container loop (close)
		    
		echo '
		    <div>
			<div class="voluno_button save_settings_button" style="margin:10px;">
			    Save all settings
			</div>
		    </div>
		</div>
	    </div>';
	    
	    #only once - loop end (open)
	    if($acp + 1 == count($divs_array)){
		
		#form part I/II (open)
		if(1==1){
		    echo '
		    <div style="text-align:center;">
			<div class="voluno_button reset_setting_button" style="margin:30px auto;">
			    Reset all settings
			</div>
		    </div>
		    </form>';
		}
		#form part I/II (close)
		
	    }
	    #only once - loop end (close)
	    
	}
	#div loop (close)
	
	#
	if(1==1){
	/*

	    
	    #loop (open)
	    for($x=0;$x<count($settings_array);$x++){
		
		#title (open)
		if($settings_array[$x][0]=="title"){
		    echo '
		    <tr>
			<td colspan="2">
			    <h2>
				'.$settings_array[$x][4].'
			    </h2>
			<td>
		    </tr>';
		}
		#title (close)
		
		#just text (open)
		elseif($settings_array[$x][0]=="just text"){
		    echo '
		    <tr>
			<td colspan="2" class="checkbox_text_cell">
			    '.$settings_array[$x][4].'
			</td>
		    </tr>';
		}
		#just text (close)
		
		#checkbox (open)
		elseif($settings_array[$x][0]=="checkbox"){
		    $my_settings_query = $wpdb->prepare('SELECT *
						FROM fi4l3fg_voluno_personal_settings
						WHERE (pers_settings_user_id = %s OR pers_settings_user_id = "default")
						AND pers_settings_general = "my settings"
						AND pers_settings_specific = %s
						ORDER BY pers_settings_user_id DESC;', // user id "default" always comes first before number
						$GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
						$settings_array[$x][2]
						);
		    $my_settings_results = $wpdb->get_results($my_settings_query);
		    
		    #if no user value, use default value (open)
			if(empty($my_settings_results[1]->pers_settings_value)){
			    $use_either_pers_settings_or_default_value = $my_settings_results[0]->pers_settings_value; //take default value
			}else{
			    $use_either_pers_settings_or_default_value = $my_settings_results[1]->pers_settings_value; //take user defined value
			}
		    #if no user value, use default value (close)
		    
		    if($use_either_pers_settings_or_default_value == "yes"){
			$checked = 'checked="checked"';
		    }else{
			$checked = '';
		    }
		    echo '
		    <tr class="'.$settings_array[$x][1].'">
			<td class="checkbox_text_cell">
			    <div style="border-radius:10px;cursor:pointer;" class="option_class">
				<table>
				    <tr>
					<td style="width:1px;padding:10px 0px 10px 10px;">
					    <input
						style="margin-top:3px;"
						type="checkbox"
						'.$checked.'
						value="1"
						name="'.str_replace(" ","_",$settings_array[$x][2]).'"
					</td>
					<td style="padding:10px;">
					    <span>
						'.$settings_array[$x][4].'
					    </span>
					</td>
				    </tr>
				</table>
			    </div>
			</td>
		    </tr>';
		}
		#checkbox (close)
		
	    }
	    #loop (close)
	    
	    #delete account (open)
	    if(1==1){
		echo '
		<tr>
		    <td class="checkbox_text_cell">
			<div style="border-radius:10px;cursor:pointer;" class="option_class">
			    <table>
				<tr>
				    <td style="width:1px;padding:10px 0px 10px 10px;">
				    </td>
				    <td style="padding:10px;">
					<a class="delete_account" href="'.get_permalink().'?delete=5405457426157613457946583267832">
					    Delete my account (not working yet)
					</a>
				    </td>
				</tr>
			    </table>
			</div>
		    </td>
		</tr>
		<script>
		    jQuery(document).ready(function(){
			jQuery(".delete_account").click(function(){
			    deleteAccount = confirm("Are you sure that you want to delete your account? Any data associated with'.
			    ' your account will irreversibly be lost.\nDelete account?")
			    if(deleteAccount == false){
				return false;
			    }
			});
		    });
		</script>';
	    }
	    #delete account (close)
	    
	    #submit (open)
	    if(1==1){
		echo '
		<tr>
		    <td style="text-align:center;" colspan="2">
			<input type="submit" name="submit_my_settings" value="Update settings">
		    </td>
		</tr>';
	    }
	    #submit (close)
	    
	#form part II/II (open)
	if(1==1){
		echo '
		</table>
	    </form>';
	}
	#form part II/II (close)
	*/
	}
	#
    }
    #visible content (close)

}
#main page section (close)

#delete account (open)
elseif($page_section == "delete_account"){
    
    #mysql (open)
    if(1==1){
	
	#execute deletion (open)
	if($execute_deletion == "yes"){
	    
	    #function-user-delete.php (v1.0) (open)
	    if(1==1){
		$function_user_delete['user'] = "current user"; //user id OR "current user". obligatory, or exit();
		include('#function-scroll-to.php');
	    }
	    #function-user-delete.php (v1.0) (close)
	    
	}
	#execute deletion (close)
    }
    #mysql (close)
    
    #jquery (open)
    if(1==1){
	echo '
	<script>
	    jQuery(document).ready(function(){
		
		jQuery(".submit_feedback_form_button").click(function(){
		    jQuery(".submit_feedback_form").submit();
		});
		
	    });
	</script>';
    }
    #jquery (close)
    
    #visible (open)
    if(1==1){
	
	#function-image-processing
	    #thematic only
	      $function_propic__type = "thematic";
	      $function_propic__original_img_name = "exit.png";
	   #all
	     $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
	   include('#function-image-processing.php');
	
	echo '
	<img src="'.$function_propic.'" class="voluno_header_picture">';
	
	if($execute_deletion != "yes"){
	    echo '
	    <h1 style="display:inline;">
		Thanks for giving Voluno a try!
	    </h1>
	    <p>
	    <br>
	    Not interested in Voluno any more? Well, we want to say a loud thank you for trying in the first place.
	    <br>
	    <br>
	    Of course, you are always welcome back at any time.
	    <br>
	    If you have any suggestions on how we could improve our work, kindly let us know.
	    <br>
	    In any case: Good bye and have a nice day!
	    </p>
	    <form action="'.add_query_arg(NULL,NULL).'&execute_deletion=1" method="post" class="submit_feedback_form" name="submit_feedback_form">
		<select name="reason_for_delete_select">';
		    $reasons_for_delete_array = array(
			    array(  "title",    "Volunteer"),
			    array(  "text",     "I did not feel valued and respected"),
			    array(  "text",     "I did not feel helpful"),
			    array(  "text",     "I don't like working on my computer alone"),
			    array(  "text",     "Development topics make me sad or frustrated"),
			    array(  "text",     "I don't feel that the work I'm doing here changes anything")
			);
		    for($x=0;$x<count($reasons_for_delete_array);$x++){
			echo '
			<option value="'.$x.'">
			    '.$reasons_for_delete_array[$x][1].'
			</option>';
		    }
		echo '
		</select>
		<input type="text" value="reason_for_delete_text">
		<textarea name="improvement_suggestion" style="height:5em;width:80%"></textarea>
	    </form>
	    <div style="width:150px;margin:20px auto 0 auto;" class="voluno_button submit_feedback_form_button">
		Submit feedback & delete account
	    </div>
	    ';
	}else{
	    echo '
	    <h1 style="display:inline;">
		Your account has been deleted successfully!
	    </h1>
	    <br>
	    <br>
	    <br>
	    <br>
	    <p>
		Again, thank you for your time spent on Voluno.
		<br>
		<br>
		The Voluno Team wishes you all the best in your future endeavours!
	    </p>';
	}
    }
    #visible (close)
    
}
#delete account (open)

?>
