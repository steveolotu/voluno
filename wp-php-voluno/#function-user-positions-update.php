<?

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-user-position-update.php (v1.1) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Allows developers to add, modify or remove the main user positions.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_userpositions_update['user_id'] = 1; //obligatory. Integer or 'current_user' to use current user.
				
				// To set up the function correctly, please look up the 'Technical feature: User positions'.
					$function_userpositions_update['position_pure'] = '';
					$function_userpositions_update['position_additional_information'] = '';
					$function_userpositions_update['appliation text'] = '';
						// Optional. Is automatically sanitized into "plain text with line breaks (biography)".
					$function_userpositions_update['new status'] = 'accepted';
						// Obligatory. 'accepted', 'pending' or 'delete' the latter deletes the entry.
				
			}
			#input (close)
			
			include('#function-user-positions-update.php');
			
			//no output
			
		}
		#function-user-position-update.php (v1.1) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.10.26, Steve
		## Last format and structure check: 2016.10.26, Steve
		## Last update of all instances this function is used: 2016.10.26, Steve
		
		# Retrieves user position and stores them in an array.
		# Assigns new positions to users and removes them.
		
		// Default input area + combining two inputs into one imploded variable ///1
		// Some preparations are conducted ///2
		// Then, the different positions are updated. ///3
		//
		// First, the three main types are distinguished.
		// Then, each individual position has a bracket.
		// After that, each possible action is treated separately.
		// In each possible action, there may only be one element (e.g. delete from database), but
		// it's also possible that there are several elements since some position updates can
		// affect several other positions, too.
		//
		// The function has no output.
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_userpositions_update['internal'] = $function_userpositions_update;
	
	$function_userpositions_update['internal']['position'] = implode(';',
		[
			$function_userpositions_update['internal']['position_pure'],
			$function_userpositions_update['internal']['position_additional_information']
		]
	);
	$function_userpositions_update['internal']['position'] = trim($function_userpositions_update['internal']['position'],';'); 
	
}
#input + var definitions (close)

#preparations: user id, current positions settings and application text (open)
if(1==1){ ///2
	// To find out the user positions of a specific user, the user id is required.
	// This section checks if the entered user id is a positive integer.
	// If not, the function is deactivated.
	
	#user id (open)
	if(1==1){
		
		#get current user id (open)
		if($function_userpositions_update['internal']['user_id'] == 'current_user'){
			
			$function_userpositions_update['internal']['user_id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
			
		}
		#get current user id (close)
		
		$function_userpositions_update['internal']['user_id'] = intval($function_userpositions_update['internal']['user_id']);
		
		#validate user id (open)
		if(is_int($function_userpositions_update['internal']['user_id']) AND $function_userpositions_update['internal']['user_id'] > 0){
			
			$function_userpositions_update['internal']['user id valid, continue executing function'] = 'yes';
			
		}
		#validate user id (close)
		
	}
	#user id (close)
	
	#function-user-positions-get.php (v1.2) (open)
	if(1==1){
		
		#documentation (open)
		if(1==1){
			
			// Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_userpositions_get['user id'] = $function_userpositions_update['internal']['user_id']; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
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
			#   $function_userpositions_get['unsorted list'][] = [
			#        position: specific position name, in some cases additional info is added, separated by ';', e.g. 'NGO Worker;4' with 4 being NGO id
			#        position_pure: specific position name without additional information
			#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
			#        status: "accepted", "pending"
			#        application_text: optional text, depending on position
			#        application_id: mysql data entry index
			#        application_date_created
			#        application_date_modified
			#    ];
			#
			# Method 2: sorted list
			#   $function_userpositions_get['sorted list'][SPECIFIC POSITION NAME] = [  //SPECIFIC POSITION NAME = name of the specific position (mind the spelling!)
			#        position_pure: specific position name without additional information
			#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
			#        status: "accepted", "pending"
			#        application_text: optional text, depending on position
			#        application_id: mysql data entry index
			#        application_date_created
			#        application_date_modified
			#    ];
			#
			# Method 3: Simple arrays
			#    $function_userpositions_get['output']['simple_array'][STATUS] = specific position name  //STATUS = pending or accepted
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
	#function-user-positions-get.php (v1.2) (close) 
	
	#application text (open)
	if(1==1){
		
		#find text (open)
		if(empty($function_userpositions_update['internal']['appliation text']) AND
		   !empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['application_text'])){
			// If no application text entered here but one entered before, when applying.
			
			$function_userpositions_update['internal']['appliation text']
			= $function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['application_text'];
			
		}elseif(empty($function_userpositions_update['internal']['appliation text'])){
			
			$function_userpositions_update['internal']['appliation text'] = ' ';
			
		}
		#find text (close)
		
		#function-sanitize-text.php (v1.0) (open)
		if(1==1){
			
			$function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory
			/*
				one line unformatted text (city, name, occupation, etc.)
				url readable text (url, user_nicename, etc.) (sanitize_title)
				email address
				plain text with line breaks (biography)
				code (php files)
			*/
			$function_sanitize_text__text = $function_userpositions_update['internal']['appliation text'];
			#$function_sanitize_text__reverse = “yes”; //only if you want to reverse the process. e.g. remove <br> to edit in form field
			include('#function-sanitize-text.php');
			$function_userpositions_update['internal']['appliation text'] = $function_sanitize_text__text_sanitized;
			
		}
		#function-sanitize-text.php (v1.0) (close)
		
	}
	#application text (close)
	
}
#preparations: user id, current positions settings and application text (close)

#positions (open)
if($function_userpositions_update['internal']['user id valid, continue executing function'] == 'yes'){ ///3
	
	#NGO positions (open)
	if(1==1){
		
		#NGO worker (open)
		if($function_userpositions_update['internal']['position_pure'] == 'NGO Worker' AND
		   $function_userpositions_get['sorted list']['NGO Administrator']['status'] != 'accepted'){
			// In the case of NGO worker, entries may only be made if the user is not NGO Admin.
			// Otherwise, that position needs to be modified first. Also, it's not possible that the user is NGO Worker (in database) while being
			// NGO Administrator, thus there is no need to delete that position.
			// Note: Being "NGO Administrator" means that the position "NGO Worker" gets created dynamically.
			
			#delete (open)
			if($function_userpositions_update['internal']['new status'] == 'delete'){
				
				#database query delete (open)
				if(1==1){
					
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_development_organizations_properties',
						array(
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure']
						),
						array(
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query delete (close)
				
			}
			#delete (close)
			
			#accepted (open)
			if($function_userpositions_update['internal']['new status'] == 'accepted'){
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_development_organizations_properties',
						array(
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'], //position name + additional info
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
							
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_date_created' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s',
							'%s','%s','%s',
							'%s','%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
					// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_development_organizations_properties',
						array( //updated content
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
				}
				#database query update (close)
				
			}
			#accepted (close)
			
			#pending (open)
			if($function_userpositions_update['internal']['new status'] == 'pending'){
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_development_organizations_properties',
						array(
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'], //position name + additional info
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
							
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_date_created' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s',
							'%s','%s','%s',
							'%s','%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'accepted'){
					// If not empty, the status must be 'accepted'. If it was 'pending', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_development_organizations_properties',
						array( //updated content
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
				}
				#database query update (close)
				
			}
			#pending (close)
			
		}
		#NGO worker (close)
		
		#NGO admin (open)
		if($function_userpositions_update['internal']['position_pure'] == 'NGO Administrator'){
			
			#delete (open)
			if($function_userpositions_update['internal']['new status'] == 'delete'){
				
				#database query delete (open)
				if(1==1){
					
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_development_organizations_properties',
						array(
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure']
						),
						array(
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query delete (close)
				
			}
			#delete (close)
			
			#accepted (open)
			if($function_userpositions_update['internal']['new status'] == 'accepted'){
				// Accept this and also delete any "NGO Worker" position.
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_development_organizations_properties',
						array(
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'], //position name + additional info
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
							
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_date_created' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s',
							'%s','%s','%s',
							'%s','%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
					// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_development_organizations_properties',
						array( //updated content
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
				}
				#database query update (close)
				
				#delete NGO Worker (open)
				if(1==1){
					
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_development_organizations_properties',
						array(
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => 'NGO Worker'
						),
						array(
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#delete NGO Worker (close)
				
			}
			#accepted (close)
			
			#pending (open)
			if($function_userpositions_update['internal']['new status'] == 'pending'){
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_development_organizations_properties',
						array(
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'], //position name + additional info
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
							
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_date_created' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s',
							'%s','%s','%s',
							'%s','%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'accepted'){
					// If not empty, the status must be 'accepted'. If it was 'pending', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_development_organizations_properties',
						array( //updated content
							'ngo_prop_type_status' => $function_userpositions_update['internal']['new status'],
							'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
							'ngo_prop_type_detail' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'ngo_prop_type_id' => $function_userpositions_update['internal']['user_id'], // user id
							'ngo_prop_ngo_id' => $function_userpositions_update['internal']['position_additional_information'], // ngo id
							
							'ngo_prop_type_general' => 'position',
							'ngo_prop_type_specific' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
				}
				#database query update (close)
				
			}
			#pending (close)
			
		}
		#NGO admin (close)
		
	}
	#NGO positions (close)
	
	#Voluno Staff Positions (open)
	if(1==1){
		
		#top Voluno Staff Member (open)
		if($function_userpositions_update['internal']['position_pure'] == 'Voluno Staff Member'){
			
			#delete (open)
			if($function_userpositions_update['internal']['new status'] == 'delete'){
				// Delete this an all other staff positions!
				
				#delete Voluno Staff Member (open)
				if(1==1){
					
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							
							'application_type_specific' => 'top',
							'application_type_id' => $function_userpositions_update['internal']['position_pure']
						),
						array(
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#delete Voluno Staff Member (close)
				
				#delete all other staff positions (open)
				if(1==1){
					
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							'application_type_specific' => 'Voluno Staff Member',
						),
						array(
							'%s','%s','%s'
						)
					);
					
				}
				#delete all other staff positions (close)
				
			}
			#delete (close)
			
			#accepted (open)
			if($function_userpositions_update['internal']['new status'] == 'accepted'){
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position_pure']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							'application_type_specific' => 'top',
							
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
							'application_text' => $function_userpositions_update['internal']['appliation text'],
							'application_status' => $function_userpositions_update['internal']['new status'],
							
							'application_date_created' => date("Y-m-d H:i:s"),
							'application_date_modified' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s','%s',
							'%s','%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
					// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
							'application_status' => $function_userpositions_update['internal']['new status'],
							'application_date_modified' => date("Y-m-d H:i:s"),
							'application_text' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_specific' => 'top',
							
							'application_type_general' => 'position',
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query update (close)
				
			}
			#accepted (close)
			
			#pending (open)
			if($function_userpositions_update['internal']['new status'] == 'pending'){
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							'application_type_specific' => 'top',
							
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
							'application_text' => $function_userpositions_update['internal']['appliation text'],
							'application_status' => $function_userpositions_update['internal']['new status'],
							
							'application_date_created' => date("Y-m-d H:i:s"),
							'application_date_modified' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s','%s',
							'%s','%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'accepted'){
					// If not empty, the status must be 'accepted'. If it was 'pending', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
							'application_status' => $function_userpositions_update['internal']['new status'],
							'application_date_modified' => date("Y-m-d H:i:s"),
							'application_text' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_specific' => 'top',
							
							'application_type_general' => 'position',
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
				}
				#database query update (close)
				
			}
			#pending (close)
			
		}
		#top Voluno Staff Member (close)
		
		#all other staff positions (open)
		if(in_array($function_userpositions_update['internal']['position_pure'],$function_userpositions_get['allowed_pure_positions_voluno_staff']) AND
		   $function_userpositions_get['sorted list']['Voluno Staff Member']['status'] == 'accepted'){
			// Changing staff positions is only allowed if the user is a staff member.
			
			#delete (open)
			if($function_userpositions_update['internal']['new status'] == 'delete'){
				
				#database query delete (open)
				if(1==1){
					
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							
							'application_type_specific' => 'Voluno Staff Member',
							'application_type_id' => $function_userpositions_update['internal']['position']
						),
						array(
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query delete (close)
				
			}
			#delete (close)
			
			#accepted (open)
			if($function_userpositions_update['internal']['new status'] == 'accepted'){
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							'application_type_specific' => 'Voluno Staff Member',
							
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
							'application_text' => $function_userpositions_update['internal']['appliation text'],
							'application_status' => $function_userpositions_update['internal']['new status'],
							
							'application_date_created' => date("Y-m-d H:i:s"),
							'application_date_modified' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s','%s',
							'%s','%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
					// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
							'application_status' => $function_userpositions_update['internal']['new status'],
							'application_date_modified' => date("Y-m-d H:i:s"),
							'application_text' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_specific' => 'Voluno Staff Member',
							
							'application_type_general' => 'position',
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query update (close)
				
			}
			#accepted (close)
			
			#pending (open)
			if($function_userpositions_update['internal']['new status'] == 'pending' AND 1==2){ //deactivated, since there are only assignments, no applications.
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							'application_type_specific' => 'Voluno Staff Member',
							
							'application_type_id' => $function_userpositions_update['internal']['position'],
							'application_text' => $function_userpositions_update['internal']['appliation text'],
							'application_status' => $function_userpositions_update['internal']['new status'],
							
							'application_date_created' => date("Y-m-d H:i:s"),
							'application_date_modified' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s','%s',
							'%s','%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'accepted'){
					// If not empty, the status must be 'accepted'. If it was 'pending', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
							'application_status' => $function_userpositions_update['internal']['new status'],
							'application_date_modified' => date("Y-m-d H:i:s"),
							'application_text' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_specific' => 'Voluno Staff Member',
							
							'application_type_general' => 'position',
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query update (close)
				
			}
			#pending (close)
			
		}
		#all other staff positions (close)
		
	}
	#Voluno Staff Positions (close)

	#Volunteer positions (open)
	if(in_array($function_userpositions_update['internal']['position_pure'],$function_userpositions_get['allowed_pure_positions'])){
		
		#agency (open)
		if(1==1){
			
			#general agent (open)
			if($function_userpositions_update['internal']['position'] == 'Agent'){
				
				#delete (open)
				if($function_userpositions_update['internal']['new status'] == 'delete'){
					// Delete this an all other staff positions!
					
					#delete general agent (open)
					if(1==1){
						
						$GLOBALS['wpdb']->delete(
							'fi4l3fg_voluno_applications',
							array(
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_general' => 'position',
								
								'application_type_specific' => 'Volunteer',
								'application_type_id' => $function_userpositions_update['internal']['position_pure']
							),
							array(
								'%s','%s',
								'%s','%s'
							)
						);
						
					}
					#delete general agent (close)
					
					#delete specific agents (open)
					if(1==1){
						
						$GLOBALS['wpdb']->delete(
							'fi4l3fg_voluno_applications',
							array(
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_general' => 'agency',
							),
							array(
								'%s','%s'
							)
						);
						
					}
					#delete specific agents (close)
					
				}
				#delete (close)
				
				#accepted (open)
				if($function_userpositions_update['internal']['new status'] == 'accepted'){
					
					#database query insert (open)
					if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position_pure']]['status'])){
						// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
						
						$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_applications',
							array(
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_general' => 'position',
								'application_type_specific' => 'Volunteer',
								
								'application_type_id' => $function_userpositions_update['internal']['position_pure'],
								'application_text' => $function_userpositions_update['internal']['appliation text'],
								'application_status' => $function_userpositions_update['internal']['new status'],
								
								'application_date_created' => date("Y-m-d H:i:s"),
								'application_date_modified' => date("Y-m-d H:i:s")
							),
							array(
								'%s','%s','%s',
								'%s','%s','%s',
								'%s','%s'
							)
						);
						
					}
					#database query insert (close)
					
					#database query update (open)
					elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
						// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
						
						$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_applications',
							array( //updated content
								'application_status' => $function_userpositions_update['internal']['new status'],
								'application_date_modified' => date("Y-m-d H:i:s"),
								'application_text' => $function_userpositions_update['internal']['appliation text'],
							),
							array( //location of updated content
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_specific' => 'Volunteer',
								
								'application_type_general' => 'position',
								'application_type_id' => $function_userpositions_update['internal']['position_pure'],
							),
							array( //format of updated content
								'%s','%s','%s'
							),
							array( //format of location of updated content
								'%s','%s',
								'%s','%s'
							)
						);
						
					}
					#database query update (close)
					
				}
				#accepted (close)
				
				#pending (open)
				if($function_userpositions_update['internal']['new status'] == 'pending'){
					
					#database query insert (open)
					if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
						// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
						
						$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_applications',
							array(
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_general' => 'position',
								'application_type_specific' => 'Volunteer',
								
								'application_type_id' => $function_userpositions_update['internal']['position_pure'],
								'application_text' => $function_userpositions_update['internal']['appliation text'],
								'application_status' => $function_userpositions_update['internal']['new status'],
								
								'application_date_created' => date("Y-m-d H:i:s"),
								'application_date_modified' => date("Y-m-d H:i:s")
							),
							array(
								'%s','%s','%s',
								'%s','%s','%s',
								'%s','%s'
							)
						);
						
					}
					#database query insert (close)
					
					#database query update (open)
					elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'accepted'){
						// If not empty, the status must be 'accepted'. If it was 'pending', there would be no need to do it again.
						
						$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_applications',
							array( //updated content
								'application_status' => $function_userpositions_update['internal']['new status'],
								'application_date_modified' => date("Y-m-d H:i:s"),
								'application_text' => $function_userpositions_update['internal']['appliation text'],
							),
							array( //location of updated content
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_specific' => 'Volunteer',
								
								'application_type_general' => 'position',
								'application_type_id' => $function_userpositions_update['internal']['position_pure'],
							),
							array( //format of updated content
								'%s','%s','%s'
							),
							array( //format of location of updated content
								'%s','%s',
								'%s','%s'
							)
						);
					}
					#database query update (close)
					
				}
				#pending (close)
				
			}
			#general agent (close)
			
			#specific agent (open)
			if($function_userpositions_update['internal']['position_pure'] == 'Agent' //user wants to add agent
			   AND in_array('Agent',$function_userpositions_get['simple array']['accepted']) //ensures that user is already general agent
			   AND !empty($function_userpositions_update['internal']['position_additional_information'])){ //general and specific agent have the same name, so this helps
				//... the system to understand that this is the specific and not the general agent.
				
				#delete (open)
				if($function_userpositions_update['internal']['new status'] == 'delete'){
					
					#delete (open)
					if(1==1){
						
						$GLOBALS['wpdb']->delete(
							'fi4l3fg_voluno_applications',
							array(
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_general' => 'agency',
								'application_type_id' => $function_userpositions_update['internal']['position_additional_information']
							),
							array(
								'%s','%s','%s'
							)
						);
						
					}
					#delete (close)
					
				}
				#delete (close)
				
				$function_userpositions_update['internal']['appliation text'] = explode(';',$function_userpositions_update['internal']['appliation text'],2);
				
				#accepted (open)
				if($function_userpositions_update['internal']['new status'] == 'accepted'){
					
					#database query insert (open)
					if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
						// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
						
						$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_applications',
							array(
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_general' => 'agency',
								'application_type_specific' => $function_userpositions_update['internal']['appliation text'][0],
								
								'application_type_id' => $function_userpositions_update['internal']['position_additional_information'],
								'application_text' => $function_userpositions_update['internal']['appliation text'][1],
								'application_status' => $function_userpositions_update['internal']['new status'],
								
								'application_date_created' => date("Y-m-d H:i:s"),
								'application_date_modified' => date("Y-m-d H:i:s")
							),
							array(
								'%s','%s','%s',
								'%s','%s','%s',
								'%s','%s'
							)
						);
						
					}
					#database query insert (close)
					
					#database query update (open)
					elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
						// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
						
						$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_applications',
							array( //updated content
								'application_status' => $function_userpositions_update['internal']['new status'],
								'application_date_modified' => date("Y-m-d H:i:s"),
								'application_text' => $function_userpositions_update['internal']['appliation text'][1],
							),
							array( //location of updated content
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_specific' => $function_userpositions_update['internal']['appliation text'][0],
								
								'application_type_general' => 'agency',
								'application_type_id' => $function_userpositions_update['internal']['position_additional_information'],
							),
							array( //format of updated content
								'%s','%s','%s'
							),
							array( //format of location of updated content
								'%s','%s',
								'%s','%s'
							)
						);
						
					}
					#database query update (close)
					
				}
				#accepted (close)
				
				#pending (open)
				if($function_userpositions_update['internal']['new status'] == 'pending'){
					
					#database query insert (open)
					if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
						// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
						
						$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_applications',
							array(
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_general' => 'agency',
								'application_type_specific' => $function_userpositions_update['internal']['appliation text'][0],
								
								'application_type_id' => $function_userpositions_update['internal']['position_additional_information'],
								'application_text' => $function_userpositions_update['internal']['appliation text'][1],
								'application_status' => $function_userpositions_update['internal']['new status'],
								
								'application_date_created' => date("Y-m-d H:i:s"),
								'application_date_modified' => date("Y-m-d H:i:s")
							),
							array(
								'%s','%s','%s',
								'%s','%s','%s',
								'%s','%s'
							)
						);
						
					}
					#database query insert (close)
					
					#database query update (open)
					elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
						// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
						
						$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_applications',
							array( //updated content
								'application_status' => $function_userpositions_update['internal']['new status'],
								'application_date_modified' => date("Y-m-d H:i:s"),
								'application_text' => $function_userpositions_update['internal']['appliation text'][1],
							),
							array( //location of updated content
								'application_user_id' => $function_userpositions_update['internal']['user_id'],
								'application_type_specific' => $function_userpositions_update['internal']['appliation text'][0],
								
								'application_type_general' => 'agency',
								'application_type_id' => $function_userpositions_update['internal']['position_additional_information'],
							),
							array( //format of updated content
								'%s','%s','%s'
							),
							array( //format of location of updated content
								'%s','%s',
								'%s','%s'
							)
						);
						
					}
					#database query update (close)
					
				}
				#pending (close)
				
			}
			#specific agent (close)
			
		}
		#agency (close)
		
		#all other volunteer positions (open)
		if(in_array($function_userpositions_update['internal']['position_pure'],['Volunteer Worker','Volunteer Trainer','Volunteer Advisor','Volunteer Recuiter','Volunteer Advisor'])){
			
			#delete (open)
			if($function_userpositions_update['internal']['new status'] == 'delete'){
				
				#database query delete (open)
				if(1==1){
					
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							
							'application_type_specific' => 'Volunteer',
							'application_type_id' => $function_userpositions_update['internal']['position_pure']
						),
						array(
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query delete (close)
				
			}
			#delete (close)
			
			#accepted (open)
			if($function_userpositions_update['internal']['new status'] == 'accepted'){
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							'application_type_specific' => 'Volunteer',
							
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
							'application_text' => $function_userpositions_update['internal']['appliation text'],
							'application_status' => $function_userpositions_update['internal']['new status'],
							
							'application_date_created' => date("Y-m-d H:i:s"),
							'application_date_modified' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s','%s',
							'%s','%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'pending'){
					// If not empty, the status must be 'pending'. If it was 'accepted', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
							'application_status' => $function_userpositions_update['internal']['new status'],
							'application_date_modified' => date("Y-m-d H:i:s"),
							'application_text' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_specific' => 'Volunteer',
							
							'application_type_general' => 'position',
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query update (close)
				
			}
			#accepted (close)
			
			#pending (open)
			if($function_userpositions_update['internal']['new status'] == 'pending'){ //irrelevant, since they are just activated.
				
				#database query insert (open)
				if(empty($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'])){
					// No status means it's not pending and not accepted, thus the entry doesn't exist yet. Then create it.
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_applications',
						array(
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_general' => 'position',
							'application_type_specific' => 'Volunteer',
							
							'application_type_id' => $function_userpositions_update['internal']['position'],
							'application_text' => $function_userpositions_update['internal']['appliation text'],
							'application_status' => $function_userpositions_update['internal']['new status'],
							
							'application_date_created' => date("Y-m-d H:i:s"),
							'application_date_modified' => date("Y-m-d H:i:s")
						),
						array(
							'%s','%s','%s',
							'%s','%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query insert (close)
				
				#database query update (open)
				elseif($function_userpositions_get['sorted list'][$function_userpositions_update['internal']['position']]['status'] == 'accepted'){
					// If not empty, the status must be 'accepted'. If it was 'pending', there would be no need to do it again.
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
							'application_status' => $function_userpositions_update['internal']['new status'],
							'application_date_modified' => date("Y-m-d H:i:s"),
							'application_text' => $function_userpositions_update['internal']['appliation text'],
						),
						array( //location of updated content
							'application_user_id' => $function_userpositions_update['internal']['user_id'],
							'application_type_specific' => 'Volunteer',
							
							'application_type_general' => 'position',
							'application_type_id' => $function_userpositions_update['internal']['position_pure'],
						),
						array( //format of updated content
							'%s','%s','%s'
						),
						array( //format of location of updated content
							'%s','%s',
							'%s','%s'
						)
					);
					
				}
				#database query update (close)
				
			}
			#pending (close)
			
		}
		#all other volunteer positions (close)
		
	}
	#Volunteer positions (close)
	
}else{
	echo 'WARNING: Invalid user position. Probaby you spelled the user id variable wrong.';
}
#positions (close)

?>