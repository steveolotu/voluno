<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-user-relationships-and-status.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Provides arrays of user ids which are sorted according to their user status and their relationship to the current user (if provided).
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_userRelSta['array'] = [1,2,3]; // Optional. Default is an array of all users. Must be an array ( -> [...] <-).
				$function_userRelSta['user'] = ['user_id' => 'current_user', 'include_user_in_output' => 'yes']; //Must be an array ( -> [...] <-).
				// user_id: Optional. User id or 'current_user'. include_user_in_output
				// include_user_in_output: If user_id is given, then 'yes' or 'no' (default). Includes the selected user id in the output arrays
				$function_userRelSta['add_users_extended_arrays'] = 'no'; //'yes','no' (default).
				
			}
			#input (close)
			
			include('#function-user-relationships-and-status.php');
			
			#output (open)
			if(1==1){
				
				# $function_userRelSta['all'] //all users registered at Voluno.
				#
				# $function_userRelSta['active'] //users which have the status "active".
				# $function_userRelSta['inactive'] //users which do not have the status "active": "draft", "paused", "locked" or "deleted"
				# 	$function_userRelSta['draft']
				# 	$function_userRelSta['paused']
				# 	$function_userRelSta['locked']
				# 	$function_userRelSta['deleted']
				#
				# $function_userRelSta['contacts'] // All not blocked contacts
				# $function_userRelSta['blocked'] // All blocked contacts
				# 	not yet programmed: $function_userRelSta['blocked_by_this_user']
				# 	not yet programmed: $function_userRelSta['blocked_by_other_user']
				#
				# Example:
				#   all active, not blocked users:
				#   -> array_diff($function_userRelSta['active'],$function_userRelSta['blocked'])
				#
				# If activated, for each of the above arrays ($function_userRelSta[...]), there is also one array of the form
				#    $function_userRelSta['users_extended'][...]
				# which includes the pure results from users_extended. For example:
				#    $function_userRelSta['users_extended']['active'][0]->usersext_id
				
			}
			#output (close)
			
		}
		#function-user-relationships-and-status.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.12.11, Steve
		## Last format and structure check: 2016.12.11, Steve
		## Last update of all instances this function is used: 2016.12.11, Steve
		
		# Provides arrays of user ids which are sorted according to their user status and their relationship to the current user (if provided).
		
		// Standard var definition. ///1
		// Standard output. ///2
		// User id is optional, but if 'current_user', find the id. ///3
		// Get all users / contacts and create arrays of: ///4
		//    - all users ///5
		//    - their statuses ///6
		//    - their relation to the given user, if given ///7
		// Filter out unwanted id. ///8
		//    - all users or only specified users? ///9
		//    - include given user (if given)? ///10
		//    -> actual filter process ///11
		//    -> create additional arrays with object properties from mysql table users_extended ///12
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_userRelSta['internal'] = $function_userRelSta;
	
}
#input + var definitions (close)

#array preparation, creation and filtering (open)
if(1==1){
	
	#get user id (open)
	if($function_userRelSta['internal']['user']['user_id'] == 'current_user'){ ///3
		
		$function_userRelSta['internal']['user']['user_id'] = $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'];
		
	}
	#get user id (close)
	
    #array creation (open)
    if(1==1){ ///4
		
		#all users (open)
		if(1==1){ ///5
			
			#query (open)
			if(1==1){
				
				$function_userRelSta['internal']['output_arrays']['all']['query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_users_extended;'
				);
				
				$function_userRelSta['internal']['output_arrays']['all']['results']
				= $GLOBALS['wpdb']->get_results($function_userRelSta['internal']['output_arrays']['all']['query']);
				
			}
			#query (close)
			
			#extract data into array (open)
			for($amd=0;$amd<count($function_userRelSta['internal']['output_arrays']['all']['results']);$amd++){
				
				$function_userRelSta['output']['all'][] = $function_userRelSta['internal']['output_arrays']['all']['results'][$amd]->usersext_id;
				
			}
			#extract data into array (close)
			
		}
		#all users (close)
		
		#statuses (open)
		if(1==1){ ///6
			
			#extract data into array (open)
			for($amd=0;$amd<count($function_userRelSta['internal']['output_arrays']['all']['results']);$amd++){
				
				#active (open)
				if($function_userRelSta['internal']['output_arrays']['all']['results'][$amd]->usersext_status == 'active'){
					
					$function_userRelSta['output']['active'][] = $function_userRelSta['internal']['output_arrays']['all']['results'][$amd]->usersext_id;
					
				}
				#active (close)
				
				#inactive (open)
				else{
					
					$function_userRelSta['output']['inactive'] = $function_userRelSta['internal']['output_arrays']['all']['results'][$amd]->usersext_id;
					
					//all other statuses than active
					$function_userRelSta['output'][
						$function_userRelSta['internal']['output_arrays']['all']['results'][$amd]->usersext_status
					][] = $function_userRelSta['internal']['output_arrays']['all']['results'][$amd]->usersext_id;
					
				}
				#inactive (close)
				
			}
			#extract data into array (close)
			
		}
		#statuses (close)
		
		#contacts (open)
		if(!empty($function_userRelSta['internal']['user']['user_id'])){ ///7
			
			#query (open)
			if(1==1){
				
				$function_userRelSta['internal']['output_arrays']['all_contacts']['query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_personal_settings
					WHERE pers_settings_user_id = %s
						AND pers_settings_general = "contact";',
					$function_userRelSta['internal']['user']['user_id']
				);
				
				$function_userRelSta['internal']['output_arrays']['all_contacts']['results']
				= $GLOBALS['wpdb']->get_results($function_userRelSta['internal']['output_arrays']['all_contacts']['query']);
				
			}
			#query (close)
			
			#extract data into array (open)
			for($amd=0;$amd<count($function_userRelSta['internal']['output_arrays']['all_contacts']['results']);$amd++){
				
				#not blocked contacts (open)
				if($function_userRelSta['internal']['output_arrays']['all_contacts']['results'][$amd]->pers_settings_specific == 'active'){
					
					$function_userRelSta['output']['contacts'][]
					= $function_userRelSta['internal']['output_arrays']['all_contacts']['results'][$amd]->pers_settings_value;
					
				}
				#not blocked contacts (close)
				
				#blocked contacts (open)
				if($function_userRelSta['internal']['output_arrays']['all_contacts']['results'][$amd]->pers_settings_specific == 'blocked'){
					
					$function_userRelSta['output']['blocked'][]
					= $function_userRelSta['internal']['output_arrays']['all_contacts']['results'][$amd]->pers_settings_value;
					
				}
				#blocked contacts (close)
				
			}
			#extract data into array (close)
			
		}
		#contacts (close)
		
	}
	#array creation (close)
	
	#filter out all unwanted ids (open)
	if(1==1){ ///8
		
		#all users or just a selection? (open) ///9
		if(empty($function_userRelSta['internal']['array'])){
			
			$function_userRelSta['internal']['all_allowed_id'] = $function_userRelSta['output']['all'];
			
		}else{
			
			$function_userRelSta['internal']['all_allowed_id'] = $function_userRelSta['internal']['array'];
			
		}
		#all users or just a selection? (close)
		
		#exclude given user? (open) ///10
		if(!empty($function_userRelSta['internal']['user']['user_id']) AND $function_userRelSta['internal']['user']['include_user_in_output'] != 'yes'){
			
			$function_userRelSta['internal']['all_allowed_id'] = array_diff(
				$function_userRelSta['internal']['all_allowed_id'],
				[$function_userRelSta['internal']['user']['user_id']]
			);
			
		}
		#exclude given user? (close)
		
		#filter (open)
		if(1==1){ ///11
			
			$function_userRelSta['internal']['array_names'] = ['all','active','inactive','paused','locked','deleted'];
			
			#contacts require a given user id (open)
			if(!empty($function_userRelSta['internal']['user']['user_id'])){
				
				$function_userRelSta['internal']['array_names'][] = 'contacts';
				$function_userRelSta['internal']['array_names'][] = 'blocked';
				
			}
			#contacts require a given user id (close)
			
			#loop (open)
			for($amf=0;$amf<count($function_userRelSta['internal']['array_names']);$amf++){
				
				$function_userRelSta['output'][ $function_userRelSta['internal']['array_names'][$amf] ] = array_intersect(
					$function_userRelSta['output'][ $function_userRelSta['internal']['array_names'][$amf] ],
					$function_userRelSta['internal']['all_allowed_id']
				);
				
				#create additional array matching ids with users_extended entries (open)
				if(1==1){ ///12
					
					#loop through all users (open)
					for($amd=0;$amd<count($function_userRelSta['internal']['output_arrays']['all']['results']);$amd++){
						
						#if id ob object entry is part of array, add to new output array (open)
						if(in_array(
							$function_userRelSta['internal']['output_arrays']['all']['results'][$amd]->usersext_id,
							$function_userRelSta['output'][ $function_userRelSta['internal']['array_names'][$amf] ]
						)){
							
							$function_userRelSta['output']['users_extended'][
								$function_userRelSta['internal']['array_names'][$amf]
							][] = $function_userRelSta['internal']['output_arrays']['all']['results'][$amd];
							
						}
						#if id ob object entry is part of array, add to new output array (close)
						
					}
					#loop through all users (close)
					
				}
				#create additional array matching ids with users_extended entries (close)
				
			}
			#loop (close)
			
		}
		#filter (close)
		
	}
	#filter out all unwanted ids (close)
	
}
#array preparation, creation and filtering (close)

#output (open)
if(1==1){ ///2
	
	$function_userRelSta = $function_userRelSta['output'];
	
}
#output (close)

?>