<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-fulluseroverview.php (v1.0) (open)
		if(1==1){
			

			
		}
		#function-fulluseroverview.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2000.01.01, Steve
		## Last update of all instances this function is used: 2000.01.01, Steve
		
		# Here, add a short summary of what the function does.
		# This shouldn't be more than max. 10 lines.
		
		// Full documentation of this file with references to actual code (documentation number) which is then written behind
		// specific lines of code, above them or being the if(1==1){ code. For example ///1
		// These references should include three dashes and then an ascending integer. ///2
		// To find the next documentation number, see wiki article of the php file.
		// Note: Of course, not everything needs to be written in here, only the big picture. Small
		// or obvious things can be written into the code itself.
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_fulluseroverview['internal'] = $function_fulluseroverview;
	
	#user (open)
	if($function_fulluseroverview['internal']['user_id'] == 'current_user'){
		
		$function_fulluseroverview['internal']['user_id'] = $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'];
		
	}
	#user (close)
	
}
#input + var definitions (close)

#validation (open)
if(1==1){
	
	#user (open)
	if(!empty($function_fulluseroverview['internal']['user_id'])){
		
		$function_fulluseroverview['internal']['function_validated'] = 'yes';
		
	}
	#user (close)
	
}
#validation (close)

#xxx (open)
if($function_fulluseroverview['internal']['function_validated'] == 'yes'){
	
	#table lists (open)
	if(1==1){
		
		#applications (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['applications']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_applications
				WHERE application_user_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['applications']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['applications']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>applications ('.count($function_fulluseroverview['internal']['applications']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['applications']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['applications']['results'][$alv]->application_id.';
				</span>
				general: '.$function_fulluseroverview['internal']['applications']['results'][$alv]->application_type_general.
				'; specific: '.$function_fulluseroverview['internal']['applications']['results'][$alv]->application_type_specific.
				'; type_id: '.$function_fulluseroverview['internal']['applications']['results'][$alv]->application_type_id.
				'; type_id: '.$function_fulluseroverview['internal']['applications']['results'][$alv]->application_status;
				
			}
			
		}
		#applications (close)
		
		#ngo_properties (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['ngo_properties']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_development_organizations_properties
				WHERE ngo_prop_type_general = "position"
					AND ngo_prop_type_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['ngo_properties']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['ngo_properties']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>ngo_properties ('.count($function_fulluseroverview['internal']['ngo_properties']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['ngo_properties']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['ngo_properties']['results'][$alv]->ngo_prop_id.';
				</span>
				ngo id: '.$function_fulluseroverview['internal']['ngo_properties']['results'][$alv]->ngo_prop_ngo_id.
				'; type_id: '.$function_fulluseroverview['internal']['ngo_properties']['results'][$alv]->ngo_prop_type_id.
				'; general: '.$function_fulluseroverview['internal']['ngo_properties']['results'][$alv]->ngo_prop_type_general.
				'; specific: '.$function_fulluseroverview['internal']['ngo_properties']['results'][$alv]->ngo_prop_type_specific;
				
			}
			
		}
		#ngo_properties (close)
		
		#files (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['files']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_files
				WHERE vol_file_user_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['files']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['files']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>files ('.count($function_fulluseroverview['internal']['files']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['files']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['files']['results'][$alv]->vol_file_id.';
					USER: '.$function_fulluseroverview['internal']['files']['results'][$alv]->vol_file_user_id.'
				</span>
				name: '.$function_fulluseroverview['internal']['files']['results'][$alv]->vol_file_name.
				'; name original: '.$function_fulluseroverview['internal']['files']['results'][$alv]->vol_file_name_original.
				'; type general: '.$function_fulluseroverview['internal']['files']['results'][$alv]->vol_file_type_general.
				'; type specific: '.$function_fulluseroverview['internal']['files']['results'][$alv]->vol_file_type_specific;
				
			}
			
		}
		#files (close)
		
		#users_extended (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['users_extended']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_users_extended
				WHERE usersext_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['users_extended']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['users_extended']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>users_extended ('.count($function_fulluseroverview['internal']['users_extended']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['users_extended']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['users_extended']['results'][$alv]->usersext_id.';
				</span>
				user email: '.$function_fulluseroverview['internal']['users_extended']['results'][$alv]->usersext_userEmail.
				'; display name: '.$function_fulluseroverview['internal']['users_extended']['results'][$alv]->usersext_displayName;
				
			}
			
		}
		#users_extended (close)
		
		#personal_settings (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['personal_settings']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_personal_settings
				WHERE pers_settings_user_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['personal_settings']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['personal_settings']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>personal_settings ('.count($function_fulluseroverview['internal']['personal_settings']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['personal_settings']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['personal_settings']['results'][$alv]->pers_settings_id.';
					USER: '.$function_fulluseroverview['internal']['personal_settings']['results'][$alv]->pers_settings_user_id.'
				</span>
				value:'.$function_fulluseroverview['internal']['personal_settings']['results'][$alv]->pers_settings_value.
				'; general: '.$function_fulluseroverview['internal']['personal_settings']['results'][$alv]->pers_settings_general.
				'; specific: '.$function_fulluseroverview['internal']['personal_settings']['results'][$alv]->pers_settings_specific.
				'; content_text: '.$function_fulluseroverview['internal']['personal_settings']['results'][$alv]->pers_settings_content_text.
				'; content_var1000: '.$function_fulluseroverview['internal']['personal_settings']['results'][$alv]->pers_settings_content_varchar1000;
				
			}
			
		}
		#personal_settings (close)
		
		#cronjobs (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['cronjobs']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_cronjobs
				WHERE cronjob_identification_id = %s
					AND cronjob_identification_type = "user";'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['cronjobs']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['cronjobs']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>cronjobs ('.count($function_fulluseroverview['internal']['cronjobs']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['cronjobs']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['cronjobs']['results'][$alv]->cronjob_id.';
					USER: '.$function_fulluseroverview['internal']['cronjobs']['results'][$alv]->cronjob_identification_id.'
				</span>
				cronjob_name:'.$function_fulluseroverview['internal']['cronjobs']['results'][$alv]->cronjob_name;
				
			}
			
		}
		#cronjobs (close)
		
		#records (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['records']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_records
				WHERE record_user_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['records']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['records']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>records ('.count($function_fulluseroverview['internal']['records']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['records']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['records']['results'][$alv]->record_id.';
					USER: '.$function_fulluseroverview['internal']['records']['results'][$alv]->record_user_id.'
				</span>
				value:'.$function_fulluseroverview['internal']['records']['results'][$alv]->record_value.
				'; general: '.$function_fulluseroverview['internal']['records']['results'][$alv]->record_type_general.
				'; specific: '.$function_fulluseroverview['internal']['records']['results'][$alv]->record_type_specific.
				'; detail: '.$function_fulluseroverview['internal']['records']['results'][$alv]->record_type_detail;
				
			}
			
		}
		#records (close)
		
		#email_edit_subscription_codes (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['email_edit_subscription_codes']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_email_edit_subscription_codes
				WHERE unsubscribe_user = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['email_edit_subscription_codes']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['email_edit_subscription_codes']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>email_edit_subscription_codes ('.count($function_fulluseroverview['internal']['email_edit_subscription_codes']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['email_edit_subscription_codes']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['email_edit_subscription_codes']['results'][$alv]->unsubscribe_id.';
					USER: '.$function_fulluseroverview['internal']['email_edit_subscription_codes']['results'][$alv]->unsubscribe_user.'
				</span>
				value:'.$function_fulluseroverview['internal']['email_edit_subscription_codes']['results'][$alv]->unsubscribe_setting;
				
			}
			
		}
		#email_edit_subscription_codes (close)
		
		#ratings (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['ratings']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_ratings
				WHERE rating_user_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['ratings']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['ratings']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>ratings ('.count($function_fulluseroverview['internal']['ratings']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['ratings']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['ratings']['results'][$alv]->rating_id.';
					USER: '.$function_fulluseroverview['internal']['ratings']['results'][$alv]->rating_user_id.'
				</span>
				; general: '.$function_fulluseroverview['internal']['ratings']['results'][$alv]->rating_type_general.
				'; general id: '.$function_fulluseroverview['internal']['ratings']['results'][$alv]->rating_type_general_id.
				'; specific: '.$function_fulluseroverview['internal']['ratings']['results'][$alv]->rating_type_specific.
				'; specific id: '.$function_fulluseroverview['internal']['ratings']['results'][$alv]->rating_type_specific_id;
				
			}
			
		}
		#ratings (close)
		
		#password_reset_codes (open)
		if(1==2){ ###
			
			$function_fulluseroverview['internal']['password_reset_codes']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_password_reset_codes
				WHERE pers_settings_user_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['password_reset_codes']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['password_reset_codes']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>password_reset_codes ('.count($function_fulluseroverview['internal']['password_reset_codes']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['password_reset_codes']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['password_reset_codes']['results'][$alv]->pass_reset_id.';
					USER: '.$function_fulluseroverview['internal']['password_reset_codes']['results'][$alv]->pers_settings_user_id.'
				</span>
				value:'.$function_fulluseroverview['internal']['password_reset_codes']['results'][$alv]->pers_settings_value.
				'; general: '.$function_fulluseroverview['internal']['password_reset_codes']['results'][$alv]->pers_settings_general.
				'; specific: '.$function_fulluseroverview['internal']['password_reset_codes']['results'][$alv]->pers_settings_specific.
				'; content_text: '.$function_fulluseroverview['internal']['password_reset_codes']['results'][$alv]->pers_settings_content_text.
				'; content_var1000: '.$function_fulluseroverview['internal']['password_reset_codes']['results'][$alv]->pers_settings_content_varchar1000;
				
			}
			
		}
		#password_reset_codes (close)
		
		#discussions (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['discussions']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_forum_discussions
				WHERE voluno_for_dis_author = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['discussions']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['discussions']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>discussions ('.count($function_fulluseroverview['internal']['discussions']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['discussions']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['discussions']['results'][$alv]->voluno_for_dis_id.';
					USER: '.$function_fulluseroverview['internal']['discussions']['results'][$alv]->voluno_for_dis_author.'
				</span>
				; title: '.$function_fulluseroverview['internal']['discussions']['results'][$alv]->voluno_for_dis_title;
				
			}
			
		}
		#discussions (close)
		
		#forum_posts (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['forum_posts']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_forum_posts
				WHERE voluno_for_pos_author = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['forum_posts']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['forum_posts']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>forum_posts ('.count($function_fulluseroverview['internal']['forum_posts']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['forum_posts']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['forum_posts']['results'][$alv]->rating_id.';
					USER: '.$function_fulluseroverview['internal']['forum_posts']['results'][$alv]->voluno_for_pos_author.'
				</span>
				; content: '.sanitize_text_field (substr($function_fulluseroverview['internal']['forum_posts']['results'][$alv]->voluno_for_pos_content,0,200));
				
			}
			
		}
		#forum_posts (close)
		
		#tasks (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['tasks']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_items_tasks
				WHERE task_author_id = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['tasks']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['tasks']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>tasks ('.count($function_fulluseroverview['internal']['tasks']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['tasks']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['tasks']['results'][$alv]->task_id.';
					USER: '.$function_fulluseroverview['internal']['tasks']['results'][$alv]->task_author_id.'
				</span>
				; name: '.$function_fulluseroverview['internal']['tasks']['results'][$alv]->task_name;
				
			}
			
		}
		#tasks (close)
		
		#tasks_reports (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['tasks_reports']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_items_tasks_reports
				WHERE work_tasks_rep_author = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['tasks_reports']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['tasks_reports']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>tasks_reports ('.count($function_fulluseroverview['internal']['tasks_reports']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['tasks_reports']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['tasks_reports']['results'][$alv]->work_tasks_rep_id.';
					USER: '.$function_fulluseroverview['internal']['tasks_reports']['results'][$alv]->work_tasks_rep_author.'
				</span>
				; task id: '.$function_fulluseroverview['internal']['tasks_reports']['results'][$alv]->work_tasks_rep_task_id.
				'; content: '.sanitize_text_field(substr($function_fulluseroverview['internal']['tasks_reports']['results'][$alv]->work_tasks_rep_text,0,200));
				
			}
			
		}
		#tasks_reports (close)
		
		#messages (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['messages']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_message_system_messages
				WHERE messys_mes_author = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['messages']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['messages']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>messages ('.count($function_fulluseroverview['internal']['messages']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['messages']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['messages']['results'][$alv]->messys_mes_id.';
					USER: '.$function_fulluseroverview['internal']['messages']['results'][$alv]->messys_mes_author.'
				</span>
				; content: '.sanitize_text_field(substr($function_fulluseroverview['internal']['messages']['results'][$alv]->messys_mes_content,0,200)).
				'; conversation: '.$function_fulluseroverview['internal']['messages']['results'][$alv]->messys_mes_conversation;
				
			}
			
		}
		#messages (close)
		
		#conversations (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['conversations']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_message_system_conversations;'
			);
			$function_fulluseroverview['internal']['conversations']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['conversations']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>conversations (always displayed, total table includes '.count($function_fulluseroverview['internal']['conversations']['results']).' rows)</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['conversations']['results']);$alv++){
				
				if(in_array(
					$function_fulluseroverview['internal']['user_id'],
					explode(',',$function_fulluseroverview['internal']['conversations']['results'][$alv]->messys_con_code)
				)){ 
					
					$function_fulluseroverview['output']['content'] .= '
					<br>
					-
					<span style="color:grey">
						ID: '.$function_fulluseroverview['internal']['conversations']['results'][$alv]->messys_con_id.';
						USER: '.$function_fulluseroverview['internal']['conversations']['results'][$alv]->messys_con_code.'
					</span>';
					
				}
				
			}
			
		}
		#conversations (close)
		
		#partners (open)
		if(1==1){
			
			$function_fulluseroverview['internal']['partners']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_message_system_partners
				WHERE messys_par_user = %s;'
				,$function_fulluseroverview['internal']['user_id']
			);
			$function_fulluseroverview['internal']['partners']['results']
			= $GLOBALS['wpdb']->get_results($function_fulluseroverview['internal']['partners']['query']);
			
			$function_fulluseroverview['output']['content'] .= '<br><br><b>partners ('.count($function_fulluseroverview['internal']['partners']['results']).')</b>';
			
			for($alv=0;$alv<count($function_fulluseroverview['internal']['partners']['results']);$alv++){
				
				$function_fulluseroverview['output']['content'] .= '
				<br>
				-
				<span style="color:grey">
					ID: '.$function_fulluseroverview['internal']['partners']['results'][$alv]->messys_par_id.';
					USER: '.$function_fulluseroverview['internal']['partners']['results'][$alv]->messys_par_user.'
				</span>
				; conversation: '.$function_fulluseroverview['internal']['partners']['results'][$alv]->messys_par_conversation;
				
			}
			
		}
		#partners (close)
		
	}
	#table lists (close)
	
	#content (open)
	if(1==1){
        
		#function-profile-link.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
				// Provides complete link, link address, name, or link title.
				// Optionally displays image of user on hover of link.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_profileLink['id'] = $function_fulluseroverview['internal']['user_id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
				$function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
				
			}
			#input (close)
			
			include('#function-profile-link.php');
			
			#output (open)
			if(1==1){
				
				//output saved in:
				# $function_profileLink['link']
				# $function_profileLink['name_link']
				# $function_profileLink['name']
				# $function_profileLink['link_title']
				
				# $function_profileLink['status'] = 'deleted' or 'paused/suspended' or 'active'
				
			}
			#output (close)
			
		}
		#function-profile-link.php (v1.0) (close)
		
		$function_fulluseroverview['output']['content'] = '
		User ID: '.$function_profileLink['name_link'].' - '.$function_fulluseroverview['internal']['user_id'].'
		<br>
		'.$function_fulluseroverview['output']['content'];
		
	}
	#content (close)
	
}
#xxx (close)

#output (open)
if(1==1){
	
	$function_fulluseroverview = $function_fulluseroverview['output'];
	
}
#output (close)

?>