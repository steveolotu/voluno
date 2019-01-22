<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-developer-warnings.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Displays one or more warnings for developers.
				// Displays warnings to developers only.
				// Handles all warnings for developer.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_devwarnings['selection'] = 'all';// 'all', number. Obligatory. Which warning do you want to display?
				
			}
			#input (close)
			
			include('#function-developer-warnings.php');
			
			#output (open)
			if(1==1){
				
				echo $function_devwarnings['warnings']; // Warnings.
				
			}
			#output (close)
			
		}
		#function-developer-warnings.php (v1.0) (close)
		
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
	
	$function_devwarnings['internal'] = $function_devwarnings;
	
}
#input + var definitions (close)

#content (open)
if(1==1){
	
	#warnings (open)
	if(1==1){
		
		//next warning: 9
		
		#user: 1 (open)
		if(1==1){
			
			#user: 1.1 (#1) - user id's are inconsistent in the two user tables (open)
			if(1==1){
				
				#mysql (open)
				if(1==1){
					
					$function_devwarnings['internal']['users_extended']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_users_extended
						ORDER BY usersext_displayName ASC;'
					);
					$function_devwarnings['internal']['users_extended']['results']
					= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['users_extended']['query']);
					
					$function_devwarnings['internal']['users']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM 4df5ukbnn5p3t817_users
						ORDER BY display_name ASC;'
					);
					$function_devwarnings['internal']['users']['results']
					= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['users']['query']);
					
				}
				#mysql (close)
				
				#comparison (open)
				if(1==1){
					
					#all users in table (open)
					if(1==1){
						
						#users_extended table (open)
						for($amh=0;$amh<count($function_devwarnings['internal']['users_extended']['results']);$amh++){
							
							$function_devwarnings['internal']['users_extended']['results_array_IDs'][]
							= $function_devwarnings['internal']['users_extended']['results'][$amh]->usersext_ida;
							
							$function_devwarnings['internal']['users_extended']['results_array_emails'][]
							= $function_devwarnings['internal']['users_extended']['results'][$amh]->usersext_userEmail;
							
						}
						#users_extended table (close)
						
						#users (open)
						for($amh=0;$amh<count($function_devwarnings['internal']['users']['results']);$amh++){
							
							$function_devwarnings['internal']['users']['results_array_IDs'][]
							= $function_devwarnings['internal']['users']['results'][$amh]->ID;
							
							$function_devwarnings['internal']['users']['results_array_emails'][]
							= $function_devwarnings['internal']['users']['results'][$amh]->user_email;
							
						}
						#users (close)
						
					}
					#all users in table (close)
					
					#mismatches (open)
					if(1==1){
						
						#users extended (open)
						for($alp=0;$alp<count($function_devwarnings['internal']['users_extended']['results']);$alp++){
							
							#check if user numbers don't match (open)
							if(!in_array(
								$function_devwarnings['internal']['users_extended']['results'][$alp]->usersext_userEmail,$function_devwarnings['internal']['users']['results_array_emails'])
								OR
								!in_array($function_devwarnings['internal']['users_extended']['results'][$alp]->usersext_ida,$function_devwarnings['internal']['users']['results_array_IDs'])
							){
								
								$function_devwarnings['internal']['warning1']['inconsistent id pairs'] .= '
								<li>
									users_extended: '.$function_devwarnings['internal']['users_extended']['results'][$alp]->usersext_displayName.
									' ('.
									$function_devwarnings['internal']['users_extended']['results'][$alp]->usersext_id.
									', '.
									$function_devwarnings['internal']['users_extended']['results'][$alp]->usersext_userEmail.
									')
								</li>';
								
							}
							#check if user numbers don't match (close)
							
						}
						#users extended (close)
						
						#users (open)
						for($alp=0;$alp<count($function_devwarnings['internal']['users']['results']);$alp++){
							
							#check if user numbers don't match (open)
							if(
								!in_array($function_devwarnings['internal']['users']['results'][$alp]->user_email,$function_devwarnings['internal']['users_extended']['results_array_emails'])
								OR
								!in_array($function_devwarnings['internal']['users']['results'][$alp]->ID,$function_devwarnings['internal']['users_extended']['results_array_IDs'])
							){
								
								$function_devwarnings['internal']['warning1']['inconsistent id pairs'] .= '
								<li>
									users: '.$function_devwarnings['internal']['users']['results'][$alp]->display_name.
									' ('.
									$function_devwarnings['internal']['users']['results'][$alp]->ID.
									', '.
									$function_devwarnings['internal']['users']['results'][$alp]->user_email.
									')
								</li>';
								
							}
							#check if user numbers don't match (close)
							
						}
						#users (close)
						
					}
					#mismatches (close)
					
				}
				#comparison (close)
				
				#final warning message (open)
				if(!empty($function_devwarnings['internal']['warning1']['inconsistent id pairs'])){
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 1, //id of warning
						'title' => 'Users: Inconsistent user ids',
						'content' => '
						The following ID or emial address pairs don\'t match in
						<a href="'.get_permalink(1030).'">
							users_extended
						</a>
						and
						<a href="'.get_permalink(1030).'">
							user'.
						'</a>:
						<ol>
							'.$function_devwarnings['internal']['warning1']['inconsistent id pairs'].'
						</ol>'
					];
					
				}
				#final warning message (close)
				
			}
			#user: 1.1 (#1) - user id's are inconsistent in the two user tables (close)
			
			#user: 1.2 (#2) - user in wp_user table that is not in wp_extended table (open)
			if(1==2){ //no longer needed, since #1 already takes care of this.
				
				#mysql (open)
				if(1==1){
					
					$function_devwarnings['internal']['users_extended']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_users_extended
						ORDER BY usersext_id ASC;'
					);
					$function_devwarnings['internal']['users_extended']['results']
					= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['users_extended']['query']);
					
					#array (open)
					for($alw=0;$alw<count($function_devwarnings['internal']['users_extended']['results']);$alw++){
						
						#
						if($alw==0){
							unset($function_devwarnings['internal']['mail_addresses_in_users_extended_array']); //just to be safe
						}
						#
						
						$function_devwarnings['internal']['mail_addresses_in_users_extended_array'][]
						= $function_devwarnings['internal']['users_extended']['results'][$alw]->usersext_userEmail;
						
					}
					#array (close)
					
					$function_devwarnings['internal']['users']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM 4df5ukbnn5p3t817_users
						ORDER BY ID ASC;'
					);
					$function_devwarnings['internal']['users']['results']
					= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['users']['query']);
					
				}
				#mysql (close)
				
				#loop (open)
				for($alp=0;$alp<count($function_devwarnings['internal']['users']['results']);$alp++){
					
					#check if user numbers don't match (open)
					if(!in_array(
						$function_devwarnings['internal']['users_extended']['results'][$alp]->usersext_userEmail,
						$function_devwarnings['internal']['mail_addresses_in_users_extended_array']
					)){
						
						$function_devwarnings['internal']['warning2']['users only in users table, not users extended table'][]
						= $function_devwarnings['internal']['users']['results'][$alp]->display_name.
						' ('.
						$function_devwarnings['internal']['users']['results'][$alp]->ID.
						')';
						
					}
					#check if user numbers don't match (close)
					
				}
				#loop (close)
				
				#final warning message (open)
				if(!empty($function_devwarnings['internal']['warning2']['users only in users table, not users extended table'])){
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 2, //id of warning
						'title' => 'Users: Users only in user table, not user extended table',
						'content' => '
						The following users are only in the
						<a href="'.get_permalink(1030).'">
							users table'.
						'</a>, but not in the
						<a href="'.get_permalink(1030).'">
							users_extended table'.
						'</a>: '.implode('; ',$function_devwarnings['internal']['warning2']['users only in users table, not users extended table'])
					];
					
				}
				#final warning message (close)
				
			}
			#user: 1.2 (#2) - user in wp_user table that is not in wp_extended table (close)
			
			#user: 1.3 (#3) - database entries with invalid user ids (open)
			if(1==1){
				
				#preparation (open)
				if(1==1){
					
					#array of valid_user_ids (open)
					if(1==1){
						
						#mysql (open)
						if(1==1){
							
							$function_devwarnings['internal']['warning_3']['users_extended']['query'] = $GLOBALS['wpdb']->prepare(
								'SELECT *
								FROM fi4l3fg_voluno_users_extended
								ORDER BY usersext_id ASC;'
							);
							$function_devwarnings['internal']['warning_3']['users_extended']['results']
							= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['warning_3']['users_extended']['query']);
							
						}
						#mysql (close)
						
						#array (open)
						for($alw=0;$alw<count($function_devwarnings['internal']['warning_3']['users_extended']['results']);$alw++){
							
							$function_devwarnings['internal']['warning_3']['valid_user_ids'][]
							= $function_devwarnings['internal']['warning_3']['users_extended']['results'][$alw]->usersext_id;
							
						}
						#array (close)
						
					}
					#array of valid_user_ids (close)
					
					#array of tables with user ids (open)
					if(1==1){
						
						$function_devwarnings['internal']['warning_3']['big_input_array'][] = [
							'db_name' => 'fi4l3fg_voluno_applications',
							'column_with_user_id' => 'application_user_id',
							'column_with_index_id' => 'application_id',
							'columns_to_display' => ['application_type_general','application_type_specific','application_type_id'], //array
							#'where_phrase' => 'WHERE ' // e.g. 'WHERE type = example'
						];
						
						
						$function_devwarnings['internal']['warning_3']['big_input_array'][] = [
							'db_name' => 'fi4l3fg_voluno_personal_settings',
							'column_with_user_id' => 'pers_settings_user_id',
							'column_with_index_id' => 'pers_settings_id',
							'columns_to_display' => ['pers_settings_value','pers_settings_general','pers_settings_specific'], //array
							#'where_phrase' => 'WHERE ' // e.g. 'WHERE type = example'
						];
						
					}
					#array of tables with user ids (close)
					
					#loop (open)
					for($alx=0;$alx<count($function_devwarnings['internal']['warning_3']['big_input_array']);$alx++){
						
						#query (open)
						if(1==1){
							
							$function_devwarnings['internal']['db_table_'.$alx]['query'] = $GLOBALS['wpdb']->prepare(
								'SELECT *
								FROM '.$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['db_name'].
								$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['where_phrase'].
								';'
							);
							$function_devwarnings['internal']['db_table_'.$alx]['results']
							= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['db_table_'.$alx]['query']);
							
						}
						#query (close)
						
						#loop (open)
						for($alp=0;$alp<count($function_devwarnings['internal']['db_table_'.$alx]['results']);$alp++){
							
							#check if user numbers don't match (open)
							if(!in_array(
								$function_devwarnings['internal']['db_table_'.$alx]['results'][$alp]->{$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['column_with_user_id']},
								$function_devwarnings['internal']['warning_3']['valid_user_ids']
							)){
								
								$function_devwarnings['internal']['warning_3']['counter_of_problems']++;
								
								#case 1: display entries; case 2: delete entries (open)
								if(empty($_POST['function_developerwarnings_warning3deleteinvalidentries_field'])){
									
									#loop of things to display in this table (open)
									for($aly=0;$aly<count($function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['columns_to_display']);$aly++){
										
										#unset (open)
										if($aly == 0){
											
											unset($function_devwarnings['internal']['warning_3']['output_column_array'][$alx]);
											
										}
										#unset (close)
										
										$function_devwarnings['internal']['warning_3']['output_column_array'][$alx] .=
										'<span style="font-style:italic;color:grey;">'.
											$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['columns_to_display'][$aly].
											':
										</span>'.
										$function_devwarnings['internal']['db_table_'.$alx]['results'][$alp]->{
											$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['columns_to_display'][$aly]
										}.
										'; ';
										
										#$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['columns_to_display'];
										
									}
									#loop of things to display in this table (close)
									
									#title for each table (open)
									if(1==1){
										
										#open (open)
										if($alp == 0){
											
											$function_devwarnings['internal']['warning_3']['temp_var'][0] =
											'<div style="font-weight:bold;">'.
												$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['db_name'].
											'</div>
											<ul>';
											
										}else{
											
											unset($function_devwarnings['internal']['warning_3']['temp_var'][0]);
											
										}
										#open (close)
										
										#close (open)
										if($aly + 1 == count($function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['columns_to_display'])){
											
											$function_devwarnings['internal']['warning_3']['temp_var'][1] =
											'</ul>';
											
										}else{
											
											unset($function_devwarnings['internal']['warning_3']['temp_var'][1]);
											
										}
										#close (close)
										
									}
									#title for each table (close)
									
									#display of entry with the invalid user id (open)
									if(1==1){
										
										$function_devwarnings['internal']['warning_3']['output_array'][]
										= $function_devwarnings['internal']['warning_3']['temp_var'][0].
											'<li
												style="
													display:list-item;
													list-style-type:square;
													margin-left:10px;
												"
											>
												<b>
													index '.
													$function_devwarnings['internal']['db_table_'.$alx]['results'][$alp]->{
														$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['column_with_index_id']
													}.
													', user '.
													$function_devwarnings['internal']['db_table_'.$alx]['results'][$alp]->{
														$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['column_with_user_id']
													}.'
												</b>'.
												$function_devwarnings['internal']['warning_3']['output_column_array'][$alx].
											'</li>'.
										$function_devwarnings['internal']['warning_3']['temp_var'][1];
										
									}
									#display of entry with the invalid user id (close)
									
								}
								else{
									
									$GLOBALS['wpdb']->delete(
										$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['db_name'],
										array( //location of row to delete
											$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['column_with_index_id'] =>
											$function_devwarnings['internal']['db_table_'.$alx]['results'][$alp]->{
												$function_devwarnings['internal']['warning_3']['big_input_array'][$alx]['column_with_index_id']
											}
										),
										array( //format of location of row to delete
											'%s'
										)
									);
									
								}
								#case 1: display entries; case 2: delete entries (close)
								
							}
							#check if user numbers don't match (close)
							
						}
						#loop (close)
						
					}
					#loop (close)
					
				}
				#preparation (close)
				
				#final warning message (open)
				if(!empty($function_devwarnings['internal']['warning_3']['output_array']) OR !empty($_POST['function_developerwarnings_warning3deleteinvalidentries_field'])){
					
					#content (open)
					if(empty($_POST['function_developerwarnings_warning3deleteinvalidentries_field'])){
						
						$function_devwarnings['internal']['warning_3']['content'] = '
						The following tables have entries for invalid users.
						<br>
						<div class="voluno_button voluno_function-developer-warnings_delete-invalid-entries">
							Delete all of these entries
							<form method="post" action="'.get_permalink().'" class="function_developerwarnings_warning3deleteinvalidentries_form">
								<input type="hidden" value="yes" name="function_developerwarnings_warning3deleteinvalidentries_field">
							</form>
						</div>
						'.implode($function_devwarnings['internal']['warning_3']['output_array']);
						
					}else{
						
						$function_devwarnings['internal']['warning_3']['content'] = '
						All '.$function_devwarnings['internal']['warning_3']['counter_of_problems'].' entries with invalid user ids were deleted successfully.';
						
					}
					#content (close)
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 3, //id of warning
						'title' => 'Users: Entries in db tables with invalid user ids ('.
							$function_devwarnings['internal']['warning_3']['counter_of_problems'].')',
						'content' => $function_devwarnings['internal']['warning_3']['content']
					];
					
				}
				#final warning message (close)
				
			}
			#user: 1.3 (#3) - database entries with invalid user ids (close)
			
			#user: 1.5 (#5) - one user has two entries in mysql table social users (open)
			if(1==1){
				
				#mysql (open)
				if(1==1){
					
					$function_devwarnings['internal']['warning_5']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM 4df5ukbnn5p3t817_social_users
						ORDER BY ID ASC;'
					);
					$function_devwarnings['internal']['warning_5']['results']
					= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['warning_5']['query']);
					
				}
				#mysql (close)
				
				#check if there are identical IDs (open)
				if(1==1){
					
					#loop (open)
					for($ama=0;$ama<count($function_devwarnings['internal']['warning_5']['results']);$ama++){
						
						$function_devwarnings['internal']['warning_5']['array_full'][] = $function_devwarnings['internal']['warning_5']['results'][$ama]->ID;
						
					}
					#loop (close)
					
					$function_devwarnings['internal']['warning_5']['array_unique'] = array_unique($function_devwarnings['internal']['warning_5']['array_full']);
					
					/* if you ever figure out why the following doesn't work, please let me know. no idea why.
					$function_devwarnings['internal']['warning_5']['array_diff']
					= array_merge(
						array_diff($function_devwarnings['internal']['warning_5']['array_full'],$function_devwarnings['internal']['warning_5']['array_unique']),
						array_diff($function_devwarnings['internal']['warning_5']['array_unique'],$function_devwarnings['internal']['warning_5']['array_full'])
					);
					*/
					/*so, since it doesn't work, here's the workaround*/
					#array difference (open)
					for($amb=0;$amb<count($function_devwarnings['internal']['warning_5']['array_full']);$amb++){
						
						#douplicates (open)
						if(empty($function_devwarnings['internal']['warning_5']['array_unique'][$amb])){
							
							#add one more id, since otherwise the first instance isn't added to the list (open)
							if(!in_array($function_devwarnings['internal']['warning_5']['array_full'][$amb],$function_devwarnings['internal']['warning_5']['array_diff'])){
								
								$function_devwarnings['internal']['warning_5']['array_diff'][] = $function_devwarnings['internal']['warning_5']['array_full'][$amb];
								
							}
							#add one more id, since otherwise the first instance isn't added to the list (close)
							
							$function_devwarnings['internal']['warning_5']['array_diff'][] = $function_devwarnings['internal']['warning_5']['array_full'][$amb];
							
						}
						#douplicates (close)
						
					}
					#array difference (close)
					
					$function_devwarnings['internal']['warning_5']['array_count_values'] = array_count_values($function_devwarnings['internal']['warning_5']['array_diff']);
					
					$function_devwarnings['internal']['warning_5']['array_diff_unique'] = array_values(array_unique($function_devwarnings['internal']['warning_5']['array_diff']));
					
					#output preparation (open)
					for($amc=0;$amc<count($function_devwarnings['internal']['warning_5']['array_diff_unique']);$amc++){
						
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
								
								$function_profileLink['id'] = $function_devwarnings['internal']['warning_5']['array_diff_unique'][$amc]; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
						
						$function_devwarnings['internal']['warning_5']['output'][] =
						$function_profileLink['name_link'].
						' ('.
							$function_devwarnings['internal']['warning_5']['array_diff_unique'][$amc].
						', '.
						$function_devwarnings['internal']['warning_5']['array_count_values'][$function_devwarnings['internal']['warning_5']['array_diff_unique'][$amc]]
						.' times)';
						
					}
					#output preparation (close)
					
				}
				#check if there are identical IDs (close)
				
				#final warning message (open)
				if(!empty($function_devwarnings['internal']['warning_5']['output'])){
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 5, //id of warning
						'title' => 'Users: Multiple entry in mysql table social logins',
						'content' => '
						The following ID pairs exist multiple times in
						<a href="'.get_permalink(1084).'">
							MySQL table: social_users'.
						'</a>:
						<br>
						'.implode('; ',$function_devwarnings['internal']['warning_5']['output'])
					];
					
				}
				#final warning message (close)
				
			}
			#user: 1.5 (#5) - one user has two entries in mysql table social users (close)
			
		}
		#user: 1 (close)
		
		#wiki: 2 (open)
		if(1==1){
			
			#wiki: 2.1 (#4) - files without wiki article or wiki file article without file (open)
			if(1==2){
				
				#mysql (open)
				if(1==1){
					
					#variable definitions + get file list (open)
					if(1==1){
						
						$function_devwarnings['internal']['warning4']['file_list_php_folder'] =
						array_values(array_diff(scandir('wp-content/wp-php-voluno/'), array('.','..','error_log','wp-php-voluno')));
						
						$function_devwarnings['internal']['warning4']['file_list_child_theme'] =
						array_values(array_diff(scandir('wp-content/themes/tempera-child'), array('.','..','error_log','tempera-child')));
						
						$function_devwarnings['internal']['warning4']['file_list_all_files'] = array_values(array_merge(
							$function_devwarnings['internal']['warning4']['file_list_php_folder'],
							$function_devwarnings['internal']['warning4']['file_list_child_theme']
						));
						
						#remove non-php files from array (open)
						for($ait=0;$ait<count($function_devwarnings['internal']['warning4']['file_list_all_files']);$ait++){
							
							#
							if(substr(
								$function_devwarnings['internal']['warning4']['file_list_all_files'][$ait],
								strlen($function_devwarnings['internal']['warning4']['file_list_all_files'][$ait])-4,
								4
							) == ".php"){
								
								$function_devwarnings['internal']['warning4']['file_list'][] = $function_devwarnings['internal']['warning4']['file_list_all_files'][$ait];
								
							}
							#
							
						}
						#remove non-php files from array (open)
						
					}
					#variable definitions + get file list (close)
					
					#mysql (open)
					if(1==1){
						
						#query (open)
						if(1==1){
							
							$function_devwarnings['internal']['warning4']['posts_query'] = $GLOBALS['wpdb']->prepare(
								'SELECT *
								FROM 4df5ukbnn5p3t817_term_relationships
									
									LEFT JOIN (
										SELECT * 
										FROM 4df5ukbnn5p3t817_posts
										WHERE post_type = "wiki-page"
									) AS posts
									ON object_id = ID 
									
								WHERE term_taxonomy_id = 410
									AND post_status = "publish"
								ORDER BY post_title ASC;'
							);
							$function_devwarnings['internal']['warning4']['posts_results'] = $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['warning4']['posts_query']);
							
						}
						#query (close)
						
					}
					#mysql (close)
					
					#content (open)
					if(1==1){
						
						#prepare (open)
						if(1==1){
							
							#compare posts and files (open)
							if(1==1){
								
								#create array from query (open)
								for($afw=0;$afw<count($function_devwarnings['internal']['warning4']['posts_results']);$afw++){
									
									$function_devwarnings['internal']['warning4']['posts_array'][]
									= substr($function_devwarnings['internal']['warning4']['posts_results'][$afw]->post_title,strlen("PHP file: "));
									
									$function_devwarnings['internal']['warning4']['posts_array_post_ids'][] =
									$function_devwarnings['internal']['warning4']['posts_results'][$afw]->ID;
									
								}
								#create array from query (close)
								
								#loop (open)
								for($afw=0;$afw<count($function_devwarnings['internal']['warning4']['posts_array']);$afw++){
									
									#posts + files (open)
									if(in_array($function_devwarnings['internal']['warning4']['posts_array'][$afw],$function_devwarnings['internal']['warning4']['file_list'])){
										
										$function_devwarnings['internal']['warning4']['in_posts_and_in_files'][] = $function_devwarnings['internal']['warning4']['posts_array'][$afw];
										
									}
									#posts + files (close)
									
									#posts only (open)
									else{
										
										$function_devwarnings['internal']['warning4']['in_posts_only'][] =
										$function_devwarnings['internal']['warning4']['posts_array'][$afw];
										
										$function_devwarnings['internal']['warning4']['in_posts_only_post_ids'][] =
										$function_devwarnings['internal']['warning4']['posts_array_post_ids'][$afw];
										
									}
									#posts only (close)
									
								}
								#loop (close)
								
								$function_devwarnings['internal']['warning4']['in_files_only'] = array_values(
									array_diff($function_devwarnings['internal']['warning4']['file_list'],
									$function_devwarnings['internal']['warning4']['in_posts_and_in_files']
								));
								
							}
							#compare posts and files (open)
							
						}
						#prepare (close)
						
						#warnings (open)
						if(1==1){
							
							$function_devwarnings['internal']['warning4']['output'] .= '
							<div>
								<ol>';
									
									#page only (open)
									for($aij=0;$aij<count($function_devwarnings['internal']['warning4']['in_posts_only']);$aij++){
										
										$function_devwarnings['internal']['warning4']['output'] .= '
										<li>
											<span style="color:red;">
												File no longer exists!
											</span>
											<a href="'.get_permalink($function_devwarnings['internal']['warning4']['in_posts_only_post_ids'][$aij]).'">
												'.$function_devwarnings['internal']['warning4']['in_posts_only'][$aij].'
											</a>
										</li>';
										
									}
									#page only  (open)
									
									#file only (open)
									for($aij=0;$aij<count($function_devwarnings['internal']['warning4']['in_files_only']);$aij++){
										
										$function_devwarnings['internal']['warning4']['output'] .= '
										<li>
											<span style="color:red;">
												There is no page for this file yet!
											</span>
											'.$function_devwarnings['internal']['warning4']['in_files_only'][$aij].' - 
											<a href="'.get_site_url().'/wp-admin/post-new.php?post_type=wiki-page">
												create it'.
											'</a>.
										</li>';
										
									}
									#file only  (open)
									
								$function_devwarnings['internal']['warning4']['output'] .= '
								</ol>
							</div>';
							
						}
						#warnings (close)
						
					}
					#content (close)
					
				}
				#mysql (close)
				
				#final warning message (open)
				if(count($function_devwarnings['internal']['warning4']['in_files_only'])+count($function_devwarnings['internal']['warning4']['in_posts_only'])>0){
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 4, //id of warning
						'title' => 'Wiki: files without wiki article or wiki file article without file',
						'content' => '
						The following entries are incomplete in one way or the other. Please
						<ul>
							<li>
								delete old wiki articles (after making sure that the file/article isn\'t linked anywhere)
							</li>
							<li>
								add an entry (category "php file"; title is "PHP file: " + file name; copy automated content from
								<a href="'.get_permalink(973).'#voluno_wiki_heading_8">here</a>)
							</li>
						</ul>
						To go to the file overview, click <a href="'.get_permalink(1410).'">here</a>.
						'.$function_devwarnings['internal']['warning4']['output']
					];
					
				}
				#final warning message (close)
				
			}
			#wiki: 2.1 (#4) - files without wiki article or wiki file article without file (close)
			
		}
		#wiki: 2 (close)
		
		#Duplicates or missing parts: 3 (open)
		if(1==1){
			
			#Duplicates or missing parts: 3.1 (#6) - identical contact entries (open)
			if(1==1){
				
				#mysql (open)
				if(1==1){
					
					$function_devwarnings['internal']['warning6']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_personal_settings
						WHERE pers_settings_general = "contact";'
					);
					
					$function_devwarnings['internal']['warning6']['results']
					= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['warning6']['query']);
					
					
				}
				#mysql (close)
				
				#check if there are identical IDs (open)
				if(1==1){
					
					#loop (open)
					for($ama=0;$ama<count($function_devwarnings['internal']['warning6']['results']);$ama++){
						
						$function_devwarnings['internal']['warning6']['array_full'][]
						= $function_devwarnings['internal']['warning6']['results'][$ama]->pers_settings_user_id.
						'-'.
						$function_devwarnings['internal']['warning6']['results'][$ama]->pers_settings_value;
						
					}
					#loop (close)
					
					$function_devwarnings['internal']['warning6']['array_unique'] = array_unique($function_devwarnings['internal']['warning6']['array_full']);
					
					#array difference (open)
					for($amb=0;$amb<count($function_devwarnings['internal']['warning6']['array_full']);$amb++){
						
						#douplicates (open)
						if(empty($function_devwarnings['internal']['warning6']['array_unique'][$amb])){
							
							#add one more id, since otherwise the first instance isn't added to the list (open)
							if(!in_array($function_devwarnings['internal']['warning6']['array_full'][$amb],$function_devwarnings['internal']['warning6']['array_diff'])){
								
								$function_devwarnings['internal']['warning6']['array_diff'][] = $function_devwarnings['internal']['warning6']['array_full'][$amb];
								
							}
							#add one more id, since otherwise the first instance isn't added to the list (close)
							
							$function_devwarnings['internal']['warning6']['array_diff'][] = $function_devwarnings['internal']['warning6']['array_full'][$amb];
							
						}
						#douplicates (close)
						
					}
					#array difference (close)
					
					$function_devwarnings['internal']['warning6']['array_count_values'] = array_count_values($function_devwarnings['internal']['warning6']['array_diff']);
					
					$function_devwarnings['internal']['warning6']['array_diff_unique'] = array_values(array_unique($function_devwarnings['internal']['warning6']['array_diff']));
					
					#output preparation (open)
					for($amc=0;$amc<count($function_devwarnings['internal']['warning6']['array_diff_unique']);$amc++){
						
						$function_devwarnings['internal']['warning6']['temp_var'] = explode('-',$function_devwarnings['internal']['warning6']['array_diff_unique'][$amc]);
						
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
								
								$function_profileLink['id'] = $function_devwarnings['internal']['warning6']['temp_var'][0]; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
						
						$function_devwarnings['internal']['warning6']['output'] .=
						'<li>'.
							$function_profileLink['name_link'].
							' ('.
								$function_devwarnings['internal']['warning6']['array_diff_unique'][$amc].
							', '.
							$function_devwarnings['internal']['warning6']['array_count_values'][$function_devwarnings['internal']['warning6']['array_diff_unique'][$amc]]
							.' times)
						</li>';
						
					}
					#output preparation (close)
					
				}
				#check if there are identical IDs (close)
				
				#final warning message (open)
				if(!empty($function_devwarnings['internal']['warning6']['output'])){
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 6, //id of warning
						'title' => 'Duplicates or missing parts: Identical contact entries',
						'content' => '
						The following entries should only exist once, not twice. Please fix this in <a href="'.get_permalink(1073).'">MySQL table: voluno_personal_settings</a>:
						<ol>
							'.$function_devwarnings['internal']['warning6']['output'].'
						</ol>'
					];
					
				}
				#final warning message (close)
				
			}
			#Duplicates or missing parts: 3.1 (#6) - identical contact entries (close)
			
			#Duplicates or missing parts: 3.1 (#8) - identical contact entries (open)
			if(1==1){
				
				#lists (open)
				if(1==1){
					
					$function_devwarnings['internal']['warning8']['db']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_files2;'
					);
					$function_devwarnings['internal']['warning8']['db']['results']
					= $GLOBALS['wpdb']->get_results($function_devwarnings['internal']['warning8']['db']['query']);
					
					$function_devwarnings['internal']['warning8']['folder']['results_array_hashnames'] =
					array_values(array_diff(scandir(wp_upload_dir()['path'].'/storage_5ougou8rlaxlacroaxo1c7iaspleki/'), array('.', '..')));
					
				}
				#lists (close)
				
				#comparison (open)
				if(1==1){
					
					#all files in folder and db (open)
					if(1==1){
						
						#db (open)
						for($amh=0;$amh<count($function_devwarnings['internal']['warning8']['db']['results']);$amh++){
							
							$function_devwarnings['internal']['warning8']['db']['results_array_hashnames'][]
							= $function_devwarnings['internal']['warning8']['db']['results'][$amh]->vol_file_hashname;
							
							$function_devwarnings['internal']['warning8']['db']['results_array_fileids'][]
							= $function_devwarnings['internal']['warning8']['db']['results'][$amh]->vol_file_id;
							
						}
						#db (close)
						
					}
					#all files in folder and db (close)
					
					#mismatches (open)
					if(1==1){
						
						#in db but not in folder (open)
						for($alp=0;$alp<count($function_devwarnings['internal']['warning8']['db']['results_array_hashnames']);$alp++){
							
							#check (open)
							if(
								!in_array(
									$function_devwarnings['internal']['warning8']['db']['results_array_hashnames'][$alp],
									$function_devwarnings['internal']['warning8']['folder']['results_array_hashnames']
								)
							){
								
								$function_devwarnings['internal']['warning8']['inconsistencies'] .= '
								<li>
									in db but not in folder: '.$function_devwarnings['internal']['warning8']['db']['results_array_hashnames'][$alp].
									' ('.
									$function_devwarnings['internal']['warning8']['db']['results_array_fileids'][$alp].
									')
								</li>';
								
							}
							#check (close)
							
						}
						#in db but not in folder (close)
						
						#in folder but not in db (open)
						for($alp=0;$alp<count($function_devwarnings['internal']['warning8']['folder']['results_array_hashnames']);$alp++){
							
							#check (open)
							if(
								!in_array(
									$function_devwarnings['internal']['warning8']['folder']['results_array_hashnames'][$alp],
									$function_devwarnings['internal']['warning8']['db']['results_array_hashnames']
								)
							){
								
								#warn or delete?
								if($_POST['function_developer_warnings_delete_lonely_files'] == 'delete_lonely_files'){
									//delete
									
									unlink(
										wp_upload_dir()['path'].'/storage_5ougou8rlaxlacroaxo1c7iaspleki/'.
										$function_devwarnings['internal']['warning8']['folder']['results_array_hashnames'][$alp]
									);
									
								}else{
									//warn
									
									$function_devwarnings['internal']['warning8']['inconsistencies'] .= '
									<li>
										in folder but not in db: '.$function_devwarnings['internal']['warning8']['folder']['results_array_hashnames'][$alp].'
									</li>';
									
									$function_devwarnings['internal']['warning8']['delete_lonely_files_form'] = '
									<form action="'.get_permalink().'" method="post">
										<input type="hidden" name="function_developer_warnings_delete_lonely_files" value="delete_lonely_files">
										<input type="submit" value="Delete disconnected files (ONLY IF YOU ARE 100% SURE)">
									</form>
									';
									
								}
								#warn or delete?
								
							}
							#check (close)
							
						}
						#in folder but not in db (close)
						
					}
					#mismatches (close)
					
				}
				#comparison (close)
				
				#final warning message (open)
				if(!empty($function_devwarnings['internal']['warning8']['inconsistencies'])){
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 8, //id of warning
						'title' => 'The files and database entries for files are out of sync',
						'content' => '
						Please fix this. For reference, see <a href="'.get_permalink(1041).'">MySQL table: voluno_files</a>:
						<ol>
							'.$function_devwarnings['internal']['warning8']['inconsistencies'].
							$function_devwarnings['internal']['warning8']['delete_lonely_files_form'].'
						</ol>'
					];
					
				}
				#final warning message (close)
				
			}
			#Duplicates or missing parts: 3.1 (#8) - identical contact entries (close)
			
		}
		#Duplicates or missing parts: 3 (close)
		
		#Documentation and coding standards: 4 (open)
		if(1==1){
			
			#No or old documentation section inside of files: 4.1 (#7) (open)
			if(1==2){
				
				#general overview lists (open)
				if(1==1){
					
					#variable definitions + get file list (open)
					if(1==1){
						
						$file_list_php_folder = array_values(array_diff(scandir('wp-content/wp-php-voluno/'), array('.','..','error_log','wp-php-voluno')));
						
						$file_list_child_theme = array_values(array_diff(scandir('wp-content/themes/tempera-child'), array('.','..','error_log','tempera-child')));
						
						$file_list_all_files = array_values(array_merge($file_list_php_folder,$file_list_child_theme));
						
						unset($file_list);
						
						#remove non-php files from array (open)
						for($ait=0;$ait<count($file_list_all_files);$ait++){
							if(substr($file_list_all_files[$ait],strlen($file_list_all_files[$ait])-4,4) == ".php"){
								$file_list[] = $file_list_all_files[$ait];
							}
						}
						#remove non-php files from array (open)
						
					}
					#variable definitions + get file list (close)
					
					#mysql (open)
					if(1==1){
						
						#query (open)
						if(1==1){
							$posts_query = $GLOBALS['wpdb']->prepare('
														SELECT *
														FROM 4df5ukbnn5p3t817_term_relationships
															
															LEFT JOIN (
																SELECT * 
																FROM 4df5ukbnn5p3t817_posts
																WHERE post_type = "wiki-page"
															) AS posts
															ON object_id = ID 
															
														WHERE term_taxonomy_id = 410
															AND post_status = "publish"
														ORDER BY post_title ASC;');
							$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
						}
						#query (close)
						
					}
					#mysql (close)
					
					#content (open)
					if(1==1){
						
						#prepare (open)
						if(1==1){
							
							#compare posts and files (open)
							if(1==1){
								
								#create array from query (open)
								for($afw=0;$afw<count($posts_results);$afw++){
									
									$posts_array[] = substr($posts_results[$afw]->post_title,strlen("PHP file: "));
									$posts_array_post_ids[] = $posts_results[$afw]->ID;
									
								}
								#create array from query (close)
								
								#loop (open)
								for($afw=0;$afw<count($posts_array);$afw++){
									
									#posts + files (open)
									if(in_array($posts_array[$afw],$file_list)){
										$in_posts_and_in_files[] = $posts_array[$afw];
										$in_posts_and_in_files_post_ids[] = $posts_array_post_ids[$afw];
									}
									#posts + files (close)
									
									#posts only (open)
									else{
										$in_posts_only[] = $posts_array[$afw];
										$in_posts_only_post_ids[] = $posts_array_post_ids[$afw];
									}
									#posts only (close)
									
								}
								#loop (close)
								
								$in_files_only = array_values(array_diff($file_list,$in_posts_and_in_files));
								
							}
							#compare posts and files (open)
							
							#function-table.php (v1.0) (open)
							if(1==1){
								
								#Documentation (open)
								if(0!=0){
									
									// This function creates automatically formatted and sortable tables with pagination features and various other options.
									
									// Each table requires three types of data:
									//
									// - Raw data: Each row and each column requires data. Basically, you need to enter an arry for each column.
									//   You can then easily access this data across the entire table and do something with it.
									//   You can also sort rows according to this data.
									//
									// - Table options: There is a wide array of options for each table.
									//
									// - Table design: Finally, you What should happen to the data in each column? How should it be displayed?
									//   This data is different for each column, but identical for each row
									//   (unless you specify it otherwise with if conditions).
									//
									// Example:
									//   Raw data: You can store the first name in column one. The column can be sorted according to the first name.
									//   Table design: You can display the first name bold, add a line break and display the respective year of birth in
									//   brackets in the next line within the same row.
									
									// Note: For technical reasons, this function has two different input areas and two execution areas. Please make sure not to change
									// important elements, especially those maked with the comment: ' //Don't touch this. ' ;-)
									
								}
								#Documentation (close)
								
								#Input: Raw data + Table options (open)
								if(1==1){
									
									#Raw data (open)
									if(1==1){
										
										#data preparation and creation (open)
										if(1==1){
											
											// To include data, you need to get raw data first. You can do that here by modifying the query below.
											// Alternatively, you can get the raw data in any other way in here. Just do whatever you want in this bracket.
											// If you prefer getting and preparing the raw data outside of this Voluno function, you can also just delete this
											// entire bracket altogether.
											
											$file_types = [
												'prefixes' => [
													"#function-",
													"website-",
													"developer-page-",
													"staff-net-",
													"members-net-"
												],
												'names' => [
													'1,Voluno functions',
													'2,Website page files',
													'2,Developer page files',
													'2,Staff net files',
													'2,Members net files'
												]
											];
											
										}
										#data preparation and creation (close)
										
										#inserting the data into the data array (open)
										for($ajl=0;$ajl<count($in_posts_and_in_files);$ajl++){ // <- Please modify the total amount of rows to include in your table.
											
											// This loop iterates through each row of data.
											// If you didn't use the default query, please modify the amount of rows in the above loop.
											
											// In the following brackets, please add one line for each column that you want to add to the mysql table.
											// In the following example, user data is inserted (column names are imaginary, just to illustrate).
											
											#find out file type (open)
											if(1==1){
												
												unset($file_type);
												
												#loop prefixes (open)
												for($aij=0;$aij<count($file_types['prefixes']);$aij++){
													//check if file has a prefix
													
													$file_type_test = $file_types['prefixes'][$aij];
													
													if(substr($in_posts_and_in_files[$ajl],0,strlen($file_type_test)) == $file_type_test){
														
														$file_type = $file_types['names'][$aij];
														
													}
													
												}
												#loop prefixes (close)
												
												#is it a child theme file? (open)
												if(in_array($in_posts_and_in_files[$ajl],$file_list_child_theme)){
													
													$file_type = '3,Child theme files';
													
												}
												#is it a child theme file? (close)
												
												#other (open)
												if(empty($file_type)){
													
													$file_type = "4,Other";
													
												}
												#other (close)
												
												$file_type = explode(',',$file_type);
												
											}
											#find out file type (close)
											
											#file content (open)
											if(1==1){
												
												#variable definitions (open)
												if(1==1){
													
													$current_directory = 'wp-content/wp-php-voluno/';
													$filename = $in_posts_and_in_files[$ajl];
													$filename_full = $current_directory.$filename;
													
													#regular php folder or child-theme folder? (open)
													if(!file_exists($filename_full)){
														
														$current_directory = 'wp-content/themes/tempera-child/';
														$filename_full = $current_directory.$filename;
														
													}
													#regular php folder or child-theme folder? (close)
													
												}
												#variable definitions (close)
												
												#function-sanitize-text.php (v1.0) (open)
												if(1==1){
													
													$function_sanitize_text__type = "code (php files with whitespaces)"; //obligatory
													/*
													one line unformatted text (city, name, occupation, etc.)
													url readable text (url, user_nicename, etc.) (sanitize_title)
													email address
													plain text with line breaks (biography)
													*/
													$function_sanitize_text__text = file_get_contents($filename_full);
													include('#function-sanitize-text.php');
													#output: $function_sanitize_text__text_sanitized;
													
													$file_content_array = explode("<br>",$function_sanitize_text__text_sanitized);
													
												}
												#function-sanitize-text.php (v1.0) (close)
												
												#function-sanitize-text.php (v1.0) (open)
												if(1==1){
													
													$function_sanitize_text__type = "code (php files)"; //obligatory
													/*
													one line unformatted text (city, name, occupation, etc.)
													url readable text (url, user_nicename, etc.) (sanitize_title)
													email address
													plain text with line breaks (biography)
													*/
													$function_sanitize_text__text = file_get_contents($filename_full);
													include('#function-sanitize-text.php');
													#output: $function_sanitize_text__text_sanitized;
													
													$file_content_array_without_whitespaces = explode("<br>",$function_sanitize_text__text_sanitized);
													
												}
												#function-sanitize-text.php (v1.0) (close)
												
												unset($last_complete_developer_check,$manual,$file_info_for_table);
												
												#find file info (open)
												for($akd=0;$akd<count($file_content_array);$akd++){
													
													$array_of_special_lines = [
														0 => '#'.'# Last documentation check: ',
														1 => '#'.'# Last format and structure check: ',
														2 => '#'.'# Last update of all instances this function is used: ',
														'manual open' => '#'.'#manual (open)',
														'manual close' => '#'.'#manual (close)'
													];
													
													#finding the specific line (open)
													for($ake=0;$ake<4;$ake++){
														
														#finding the specific line (open)
														if(strpos($file_content_array[$akd],$array_of_special_lines[$ake])){
															
															$file_info_for_table[$ake] = substr(trim($file_content_array_without_whitespaces[$akd]),strlen($array_of_special_lines[$ake]));
															
														}
														#finding the specific line (close)
														
													}
													#file info loop (close)
													
													#manual (open)
													if(1==1){
														
														#get documentation content (open)
														if(1==1){
															
															#start (open)
															if(strpos($file_content_array[$akd-3],$array_of_special_lines['manual open'])){
																
																$manual['start'] = $akd;
																
															}
															#start (close)
															
															#content (open)
															if(!empty($manual['start']) AND empty($manual['end'])){
																
																$manual['content'][] = substr($file_content_array[$akd],strlen('&nbsp;')*8+1);
																
															}
															#content (close)
															
															#end (open)
															if(strpos($file_content_array[$akd+3],$array_of_special_lines['manual close'])){
																
																$manual['end'] = $akd;
																
															}
															#end (close)
															
														}
														#get documentation content (close)
														
														
													}
													#manual (close)
													
												}
												#find file info (close)
												
											}
											#file content (close)
											
											#columns (open)
											if(1==1){
												
												$function_table['data'][$ajl]['post_id'] = $in_posts_and_in_files_post_ids[$ajl];
												$function_table['data'][$ajl]['file name'] = $in_posts_and_in_files[$ajl];
												$function_table['data'][$ajl]['file type'] = $file_type[1];
												$function_table['data'][$ajl]['file type order'] = $file_type[0].$in_posts_and_in_files[$ajl];
												
												$function_table['data'][$ajl]['last modified'] = filemtime($filename_full);
												$function_table['data'][$ajl]['manual'] = implode('<br>',$manual['content']);
												
												$table_input = $file_info_for_table[0];
												#check if value is empty (open)
												if(!empty($table_input)){
													$function_table['data'][$ajl]['file_info last_documentation'] = $table_input;
													$function_table['data'][$ajl]['file_info last_documentation order'] = strtotime(
																															str_replace('.','-',
																																substr($table_input,0,strlen('0000.00.00'))
																															).' 00:00:00'
																														);
												}
												#check if value is empty (close)
												
												$table_input = $file_info_for_table[1];
												#check if value is empty (open)
												if(!empty($table_input)){
													$function_table['data'][$ajl]['file_info format_structure'] = $table_input;
													$function_table['data'][$ajl]['file_info format_structure order'] = strtotime(
																															str_replace('.','-',
																																substr($table_input,0,strlen('0000.00.00'))
																															).' 00:00:00'
																														);
												}
												#check if value is empty (close)
												
												$table_input = $file_info_for_table[2];
												#check if value is empty (open)
												if(!empty($table_input)){
													$function_table['data'][$ajl]['file_info version_update'] = $table_input;
													$function_table['data'][$ajl]['file_info version_update order'] = strtotime(
																															str_replace('.','-',
																																substr($table_input,0,strlen('0000.00.00'))
																															).' 00:00:00'
																														);
												}
												#check if value is empty (close)
												
												unset($file_info_for_table,$table_input);
												
												// To add new lines, just copy the above. Each line requires an individual column name (last bracket) and a value.
												
												// Keep the column names in mind, these will be used later on a lot.
												
											}
											#columns (close)
											
											#filter out files with recent / existing documentation (open)
											if(!empty($function_table['data'][$ajl]['file_info last_documentation'])){
												
												unset($function_table['data'][$ajl]);
												
											}
											#filter out files with recent / existing documentation (close)
											
										}
										#inserting the data into the data array (close)
										
									}
									#Raw data (close)
									
									#Table options (open)
									if(1==1){
										
										$function_table['unique id'] = 'function_wiki_file_list_feigbfgiebigbefwigas';
										// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
										
										#Options connected to the title (open)
										if(1==1){
											
											$function_table['display title'] = 'List of PHP files';
											// The title of the table which is displayed above the table. To hide title, leave empty.
											
											#$function_table['show on load'] = 'no';
											// 'no' or 'yes' (default). If there's no title, this is automatically set to yes, since there is nothing to show.
											
											#$function_table['title format'] = array('<h1>','</h1>');
											// Opening and closing css tags for the title. Default: array('<h4>','</h4>')
											
											#$function_table['display number of results'] = 'no';
											// Displays the full amount of content rows in brackets behind the table title. 'no' or empty (default).
											
										}
										#Options connected to the title (close)
										
										#Headings and sorting (open)
										if(1==1){
											
											#$function_table['hide column headings'] = 'yes';
											// Hides headings of table. 'yes' or empty (default).
											
											// The following multi-dimensional array has the following structure:
											// - heading = The heading that will be displayed above the respective column.
											// - width = Optional. With of the respective column. You can either use % or pt.
											// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
											//                    columns names that you used in the 'Raw data' section.
											//                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were 'email' and 'id'.
											$function_table['column headings'] 
											= array(
												array( // In almost all cases, the first column should be the row numbering. If you want to keep it, just leave it as it is.
													'heading'		 => '#', // See 1 row above.
													'width'			 => '4%' // See 2 rows above.
												),
												array(
													'heading'		 => 'Type',
													'width'			 => '15%',
													'sorting option' => 'file type'
												),
												array(
													'heading'		 => 'File name',
													'width'			 => '32%',
													'sorting option' => 'file name'
												),
												array(
													'heading'		 => 'Documentation',
													'width'			 => '14%',
													'sorting option' => 'file_info last_documentation order'
												),
												array(
													'heading'		 => 'Structural check',
													'width'			 => '14%',
													'sorting option' => 'file_info format_structure order'
												),
												array(
													'heading'		 => 'Version check',
													'width'			 => '14%',
													'sorting option' => 'file_info version_update order'
												),
												array(
													'heading'		 => 'Last modified',
													'width'			 => '14%',
													'sorting option' => 'last modified'
												)
											);
											
											//Optionally, you can choose one of the above columns to be the default sorting option.
											// If you don't want this, please delete or hide the entire array.
											$function_table['default ordering']
											= array(
												'column' => 'file type order', // Colum name. In the example, 'email' or 'id'.
												'direction' => 'ASC' // ASC or DESC
											);
											
										}
										#Headings and sorting (close)
										
										#Pagination (open)
										if(1==1){
											
											// If the table doesn't have a lot of space, you can make the pagination 'thin'. Then, the 'first page', 'previous page', 'items per page',
											// 'next page' and 'last page' buttons will aligned vertically, instead of horizontally -> they will be slimmer.
											#$function_table['thin_pagination'] = 'yes'; // 'yes' or 'no' (default)
										}
										#Pagination (close)
										
										#Display a message if no data available (open)
										if(1==1){
											
											// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
											// Here, you can modify this message.
											
											#$function_table['no_items_available_message'] = array(
											#    'lines' => 'no' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
											#    ,'content' => 'none' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
											#);
											
										}
										#Display a message if no data available (close)
										
									}
									#Table options (close)
									
								}
								#Input: Raw data + Table options (close)
								
								$function_table['part'] = 1; //Don't touch this. 
								include('#function-table.php'); //Don't touch this. 
								
								#design (open)
								if(1==1){
									
									#documentation (open)
									if(1==1){
										
										// In this section, the actual content of the table needs to be created.
										// You already created the raw data, now you need to decide what to do with it / how to display it.
										
										// You only need to create one row, it will then be looped to fill the whole table.
										// Thus, by populating one cell, you automatically create the entire respective column.
										
										// Please use the template inside the following loop to created cells/columns.
										// You can add or delete as many columns as you want. However, the amount of cells you add should match
										// the amount of column headings you added in 'Table options'.
										// Please be sure not to change anything else.
										
									}
									#documentation (close)
									
									#Cells/Columns (open)
									for($abs=$function_table['pagination_lower_limit'];$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));$abs++){ //Don't touch this.
										$function_table['table rows'] .= $function_table['row open']; //Don't touch this.
										
										//#1 template (open) <- column number, short description of column
										if(1==1){ //Don't touch this.
											
											// Write the content here. To use the table data, use the variable:
											// $function_table['data'][$abs]['column name'] and replace 'column name' with the name of the respective column, as entered in the section 'raw data'.
											// In the given example, the column names were 'email' or 'id'.
											
										}
										//#1 template (close) <- column number (add +1 for each new column you add), short description of column
										
										#1 counter (open)
										if(1==1){
											
											// If you want to use a row counter, please don't touch this cell as it is.
											
											$function_table['table rows'] .= '
											<td>
												'.number_format(($abs+1),0,'.',' ').'
											</td>
											';
											
										}
										#1 counter (close)
										
										#2 file type (open)
										if(1==1){
											
											$function_table['table rows'] .= '
											<td style="text-align:left;">
												'.$function_table['data'][$abs]['file type'].'
											</td>
											';
											
										}
										#2 file type (close)
										
										#3 name (open)
										if(1==1){
											
											$function_table['table rows'] .= '
											<td style="text-align:left;">
												'.$function_table['data'][$abs]['file name'].'
												<a href="'.get_permalink($function_table['data'][$abs]['post_id']).'">
													(link)
												</a>';
												
												#manual (open)
												if(!empty($function_table['data'][$abs]['manual'])){
													
													$function_table['table rows'] .= '
													<a class="voluno_manual_link">
													(manual)
													</a>
													<div
														class="voluno_manual"
														style="
															position:absolute;
															background-color:#fff;
															border:1px solid black;
															padding:10px;
															border-radius:10px;
															width:50%;
															left:25%;
															display:none;
															font-size:70%;
														"
													>
														'.$function_table['data'][$abs]['manual'].'
													</div>';
													
												}
												#manual (close)
												
											$function_table['table rows'] .= '
											</td>
											';
											
										}
										#3 name (close)
										
										#4 Documentation (open)
										if(1==1){
											
											$var_name = 'file_info last_documentation';
											
											$var = $function_table['data'][$abs][$var_name];
											
											$var = explode(', ',$var);
											
											#function-timezone.php (v1.0) (open)
											if(1==1){
												
												$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs][$var_name.' order']);
												#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
												#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
												$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
												//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
												//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
												include('#function-timezone.php');
												
												$date = $function_timezone;
												
											}
											#function-timezone.php (v1.0) (close)
											
											$function_table['table rows'] .= '
											<td>';
												
												#show content only if there is something to show (open)
												if(!empty($function_table['data'][$abs][$var_name])){
													
													$function_table['table rows'] .= '
													'.$date.'
													<div style="color:grey;">
														'.$var[1].'
													</div>';
													
												}
												#show content only if there is something to show (close)
												
											$function_table['table rows'] .= '
											</td>
											';
											
										}
										#4 Documentation (close)
										
										#5 Structural check (open)
										if(1==1){
											
											$var_name = 'file_info format_structure';
											
											$var = $function_table['data'][$abs][$var_name];
											
											$var = explode(', ',$var);
											
											#function-timezone.php (v1.0) (open)
											if(1==1){
												
												$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs][$var_name.' order']);
												#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
												#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
												$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
												//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
												//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
												include('#function-timezone.php');
												
												$date = $function_timezone;
												
											}
											#function-timezone.php (v1.0) (close)
											
											$function_table['table rows'] .= '
											<td>';
												
												#show content only if there is something to show (open)
												if(!empty($function_table['data'][$abs][$var_name])){
													
													$function_table['table rows'] .= '
													'.$date.'
													<div style="color:grey;">
														'.$var[1].'
													</div>';
													
												}
												#show content only if there is something to show (close)
												
											$function_table['table rows'] .= '
											</td>
											';
											
										}
										#5 Structural check (close)
										
										#6 Version check (open)
										if(1==1){
											
											$var_name = 'file_info version_update';
											
											$var = $function_table['data'][$abs][$var_name];
											
											$var = explode(', ',$var);
											
											#function-timezone.php (v1.0) (open)
											if(1==1){
												
												$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs][$var_name.' order']);
												#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
												#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
												$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
												//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
												//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
												include('#function-timezone.php');
												
												$date = $function_timezone;
												
											}
											#function-timezone.php (v1.0) (close)
											
											$function_table['table rows'] .= '
											<td>';
												
												#show content only if there is something to show (open)
												if(!empty($function_table['data'][$abs][$var_name])){
													
													$function_table['table rows'] .= '
													'.$date.'
													<div style="color:grey;">
														'.$var[1].'
													</div>';
													
												}
												#show content only if there is something to show (close)
												
											$function_table['table rows'] .= '
											</td>
											';
											
										}
										#6 Version check (close)
										
										#7 last modified (open)
										if(1==1){
											
											#function-timezone.php (v1.0) (open)
											if(1==1){
												$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs]['last modified']);
												#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
												#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
												$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
												//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
												//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
												include('#function-timezone.php');
											}
											#function-timezone.php (v1.0) (close)
											
											$function_table['table rows'] .= '
											<td>
												'.$function_timezone.'
											</td>
											';
											
										}
										#7 last modified (close)
										
										$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
									} //Don't touch this. 
									#Cells/Columns (close)
									
								}
								#design (close)
								
								$function_table['part'] = 2; //Don't touch this. 
								include('#function-table.php'); //Don't touch this. 
								
								#output
								//the entire output is stored in the following variable:
								#echo $function_table['output table'];
								
							}
							#function-table.php (v1.0) (close)
							
						}
						#prepare (close)
						
						#file and page exist (open)
						if(1==1){
							
							$function_devwarnings['internal']['warning7']['output'] = $function_table['output table'];
							
						}
						#file and page exist (open)
						
					}
					#content (close)
					
				}
				#general overview lists (close)
				
				#final warning message (open)
				if(!empty($function_devwarnings['internal']['warning7']['output'])){
					
					$function_devwarnings['internal']['warnings_array'][]
					= [
						'id' => 7, //id of warning
						'title' => 'No or old documentation section inside of files',
						'content' => '
						The formalized documentation doesn\'t exist yet or hasn\'t been updated in a very long time for the following files:
						'.$function_devwarnings['internal']['warning7']['output']
					];
					
				}
				#final warning message (close)
				
			}
			#No or old documentation section inside of files: 4.1 (#7) (close)
			
		}
		#Documentation and coding standards: 4 (close)
		
		#Disabled warnings: X (open)
		if(1==2){ ###
			
			#final warning message (open)
			if(1==1){
				
				$function_devwarnings['internal']['warnings_array'][]
				= [
					'id' => 9999, //id of warning
					'title' => 'Don\'t forget to reactivate the temporarily disabled warnings',
					'content' => 'Warning 4 and 7 are temporarily disabled.'
				];
				
			}
			#final warning message (close)
			
		}
		#Disabled warnings: X (close)
		
	}
	#warnings (close)
	
}
#content (close)

#jquery (open)
if(1==1){
	
	$function_devwarnings['output']['warnings'] = '
	<script>
		jQuery(document).ready(function(){
			
			'./*Warning 3: submit form to delete entries in db with invalid user ids*/'
			jQuery(".voluno_function-developer-warnings_delete-invalid-entries").click(function(){
				var voluno_fuctionDeveloperWarnings_confirmDelete = confirm("Are you sure you want to delete all of these entries?");
				if(voluno_fuctionDeveloperWarnings_confirmDelete == true){
					jQuery(".function_developerwarnings_warning3deleteinvalidentries_form").submit();
				}
			});
			
		});
	</script>
	';
	
}
#jquery (close)

#output (open)
if(1==1){
	
	#output loop (open)
	for($alo=0;$alo<count($function_devwarnings['internal']['warnings_array']);$alo++){
		
		$function_devwarnings['output']['warnings'] .= '
		<div style="border:5px solid red;padding:10px;margin:3px;">
			<b>
				Warning: "'.
				$function_devwarnings['internal']['warnings_array'][$alo]['id'].
				' - '.
				$function_devwarnings['internal']['warnings_array'][$alo]['title'].
				'":
			</b><br>
			'.$function_devwarnings['internal']['warnings_array'][$alo]['content'].'
		</div>';
		
		#margin (open)
		if($alo+1 == count($function_devwarnings['internal']['warnings_array'])){
			
			$function_devwarnings['output']['warnings'] =
			'<div style="margin-bottom:70px;">
				'.$function_devwarnings['output']['warnings'].'
			</div>';
			
		}
		#margin (close)
		
	}
	#output loop (close)
	
	$function_devwarnings = $function_devwarnings['output'];
	
}
#output (close)

?>