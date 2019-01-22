<?

#documentation (open)
if(0!=0){
	
	##manual (open)
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
				
				$function_userpositions_get['user id'] = 123; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
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
				#   $function_userpositions_get['unsorted list'][...][PROPERTY] = PROPERTY VALUE
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
				#		SPECIFIC POSITION NAME = name of the specific position (mind the spelling!)
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
				#	 Example usage:
				#       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
				#
				# Method 4: Simple pure arrays
				#    $function_userpositions_get['simple_pure_array'][STATUS][INDEX] = SPECIFIC PURE POSITION NAME   //STATUS = pending or accepted
				#
				# Method 5:
				#    $function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
				#		full -> NGO name (user position)
				#		position -> pure position
				#		status -> "accepted" or "pending"
				#		ngo_name -> NGO name
				#		ngo_id -> NGO id
				#
				# Global variables:
				#    Function get's called in the top right sidebar for the current user, so these global variables are always available. 
				#		$GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
				#		$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
				#       $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['STATUS'][] = POSITION NAME
				#		$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['STATUS'][] = POSITION NAME;ADDITIONAL INFO
				#    Example usage:
				#		in_array(POSITION NAME,$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])
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
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.11.26, Steve
		## Last format and structure check: 2016.11.26, Steve
		## Last update of all instances this function is used: 2016.11.26, Steve
		
		# Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
		
		// Default input area ///1
		// Get and validate user id ///2
		//
		// Then, actually get and work with positions ///3
		// First, get data via several queries ///4
		// Then store it into a preliminary array, thereby creating additional conditional positions ///5
		// Validate and filter out invalid positions ///6
		// Store final positions into different arrays, so that the user can choose between them ///7
		//
		// There is a developer info output ///8
		// If the input user id is invalid, a warning message is displayed ///9
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_userpositions_get['internal'] = $function_userpositions_get;
	unset($function_userpositions_get['output']);
	
}
#input + var definitions (close)

#get and validate user id (open)
if(1==1){ ///2
	// To find out the user positions of a specific user, the user id is required.
	// This section checks if the entered user id is a positive integer.
	// If not, an error message is displayed.
	// The output is stored in:
	//     #$function_userpositions_get['internal']['user id']
	
    #get current user id (open)
	if($function_userpositions_get['internal']['user id'] == 'current_user' AND is_user_logged_in()){
		
		#wp user object (open)
		if(1==1){
			
			$function_userpositions_get['internal']['current_user_extended']['wp_user_object'] = wp_get_current_user();
			
		}
		#wp user object (close)
		
		#users extended query and global var definition (open)
		if(1==1){
			
			$function_userpositions_get['internal']['current_user_extended']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_users_extended
				WHERE usersext_userEmail = %s;'
				,$function_userpositions_get['internal']['current_user_extended']['wp_user_object']->user_email
			);
			$GLOBALS['voluno_variables']['current_user_extended']
			= $GLOBALS['wpdb']->get_row($function_userpositions_get['internal']['current_user_extended']['query']);
			
		}
		#users extended query and global var definition (close)
		
		$function_userpositions_get['internal']['user id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
		
    }
    #get current user id (close)
	
	#validate user id (open)
	if(is_int(intval(preg_replace("/[^0-9]/","",$function_userpositions_get['internal']['user id'])))
	AND preg_replace("/[^0-9]/","",$function_userpositions_get['internal']['user id']) > 0){
		
		$function_userpositions_get['internal']['user id valid, continue executing function'] = 'yes';
		
	}
	#validate user id (close)
	
}
#get and validate user id (close)

#positions (open)
if($function_userpositions_get['internal']['user id valid, continue executing function'] == 'yes'){ ///3
	
	#query and preliminary array with all positions in the database (open)
	if(1==1){
		// Get data from different database and combine and store it into one big preliminary array.
		
		#mysql queries (open)
		if(1==1){ ///4
			
			#NGO query (open)
			if(1==1){
				
				$function_userpositions_get['internal']['positions_query_ngo'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_development_organizations_properties
					WHERE ngo_prop_type_id = %s
						AND ngo_prop_type_general = "position";'
					,$function_userpositions_get['internal']['user id']
				);
				$function_userpositions_get['internal']['positions_results_ngo']
				= $GLOBALS['wpdb']->get_results($function_userpositions_get['internal']['positions_query_ngo']);
				
			}
			#NGO query (close)
			
			#specific agents query (open)
			if(1==1){
				
				$function_userpositions_get['internal']['positions query agency'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_applications
					
					WHERE application_user_id = %s
						AND application_type_general = "agency";'
					,$function_userpositions_get['internal']['user id']
				);
				$function_userpositions_get['internal']['positions results agency']
				= $GLOBALS['wpdb']->get_results($function_userpositions_get['internal']['positions query agency']);
				
			}
			#specific agents query (close)
			
			#Others query (open)
			if(1==1){
				
				$function_userpositions_get['internal']['positions query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_applications
					
					WHERE application_user_id = %s
						AND application_type_general = "position"
						AND abs(application_type_id) = 0;'#REGEXP "^-?[0-9]+$";'
					,$function_userpositions_get['internal']['user id']
				);
				$function_userpositions_get['internal']['positions results'] = $GLOBALS['wpdb']->get_results($function_userpositions_get['internal']['positions query']);
				
			}
			#Others query (close)
			
		}
		#mysql queries (close)
		
		#storing all positions (including invalid ones) into preliminary array (open)
		if(1==1){ ///5
			
			#NGO (open)
			for($akk=0;$akk<count($function_userpositions_get['internal']['positions_results_ngo']);$akk++){
				
				#
				if(1==1){
					
					$function_userpositions_get['internal']['positions_query_ngo_organization'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_development_organizations
						WHERE ngo_id = %d;'
						,$function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_ngo_id
					);
					$function_userpositions_get['internal']['positions_results_ngo_organization']
					= $GLOBALS['wpdb']->get_results($function_userpositions_get['internal']['positions_query_ngo_organization']);
					
				}
				#
				
				$function_userpositions_get['internal']['data array preliminary'][] = [
					'position_type' => "NGO Member",
					'position' =>
						$function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_specific.
						';'.$function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_ngo_id,
					'position_pure' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_specific,
					'application_text' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_detail,
					'status' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_status,
					'ngo_id' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_ngo_id,
					'ngo_name' => $function_userpositions_get['internal']['positions_results_ngo_organization'][0]->ngo_name,
					'entry_id' => 'ngo_prop_id_'.$function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_id,
					'date_created' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_date_created,
					'date_modified' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_date_modified
				];
				
				#automated NGO positions (open)
				if(1==1){
					
					#NGO member top position (open)
					if(
					   $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_status == "accepted"
					   AND
					   !in_array($function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_ngo_id,
							$function_userpositions_get['internal']['NGO member position already added'])
					){
						// If any ngo position is accepted, accept this.
						
						$function_userpositions_get['internal']['data array preliminary'][] = [
							'position_type' => 'top',
							'position' => 'NGO Member;'.$function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_ngo_id,
							'position_pure' => 'NGO Member',
							'status' => 'accepted',
							'ngo_id' => $function_userpositions_get['internal']['positions_results_ngo_organization'][0]->ngo_id,
							'ngo_name' => $function_userpositions_get['internal']['positions_results_ngo_organization'][0]->ngo_name
						];
						
					}
					#NGO member top position (open)
					
					#
					if(1==2){###
						
						#NGO worker (open)
						if(
						   $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_specific == "NGO Administrator"
						   AND
						   $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_status == "accepted"
						){
							// If NGO admin, then also activate worker.
							
							$function_userpositions_get['internal']['data array preliminary'][] = [
								'position_type' => "NGO Member",
								'position' => 'NGO Worker;'.$function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_ngo_id,
								'position_pure' => 'NGO Worker',
								'application_text' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_detail,
								'status' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_type_status,
								'entry_id' => 'ngo_prop_id_'.$function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_id,
								'date_created' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_date_created,
								'date_modified' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_prop_date_modified,
								'ngo_id' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_id,
								'ngo_name' => $function_userpositions_get['internal']['positions_results_ngo'][$akk]->ngo_name
							];
							
						}
						#NGO worker (open)
						
					}
					#
					
				}
				#automated NGO positions (close)
				
			}
			#NGO (close)
			
			#specific agents (open)
			for($aki=0;$aki<count($function_userpositions_get['internal']['positions results agency']);$aki++){
				
				$function_userpositions_get['internal']['data array preliminary'][] = [
					'position_type' => 'Volunteer',
					'position' => 'Agent;'.$function_userpositions_get['internal']['positions results agency'][$aki]->application_type_id,
					'position_pure' => 'Agent',
					
					'application_text' => 
						$function_userpositions_get['internal']['positions results agency'][$aki]->application_type_specific.';'.
						$function_userpositions_get['internal']['positions results agency'][$aki]->application_text,
					'status' => $function_userpositions_get['internal']['positions results agency'][$aki]->application_status,
					'entry_id' => $function_userpositions_get['internal']['positions results agency'][$aki]->application_id,
					
					'date_created' => $function_userpositions_get['internal']['positions results agency'][$aki]->application_date_created,
					'date_modified' => $function_userpositions_get['internal']['positions results agency'][$aki]->application_date_modified
				];
				
			}
			#specific agents (close)
			
			#Others (open)
			for($aki=0;$aki<count($function_userpositions_get['internal']['positions results']);$aki++){
				
				$function_userpositions_get['internal']['data array preliminary'][] = [
					'position_type' => $function_userpositions_get['internal']['positions results'][$aki]->application_type_specific,
					'position' => $function_userpositions_get['internal']['positions results'][$aki]->application_type_id,
					'position_pure' => $function_userpositions_get['internal']['positions results'][$aki]->application_type_id,
					
					'application_text' => $function_userpositions_get['internal']['positions results'][$aki]->application_text,
					'status' => $function_userpositions_get['internal']['positions results'][$aki]->application_status,
					'entry_id' => $function_userpositions_get['internal']['positions results'][$aki]->application_id,
					
					'date_created' => $function_userpositions_get['internal']['positions results'][$aki]->application_date_created,
					'date_modified' => $function_userpositions_get['internal']['positions results'][$aki]->application_date_modified
				];
				
				#Specific Voluno Staff Positions (open)
				if(
				   $function_userpositions_get['internal']['positions results'][$aki]->application_type_id == 'Voluno Staff Member'
				   AND
				   $function_userpositions_get['internal']['positions results'][$aki]->application_status == "accepted"
				){
					
					$function_userpositions_get['internal']['user is Voluno Staff Member'] = 'yes';
					
				}
				#Specific Voluno Staff Positions (close)
				
				#Volunteer (open)
				if(
				   $function_userpositions_get['internal']['positions results'][$aki]->application_type_specific == 'Volunteer'
				   AND
				   $function_userpositions_get['internal']['positions results'][$aki]->application_status == 'accepted'
				){
					
					$function_userpositions_get['internal']['user is Volunteer'] = 'yes';
					
				}
				#Volunteer (close)
				
			}
			#Others (close)
			
			#var_dump($function_userpositions_get['internal']['data array preliminary']);###
			
			#Volunteer top position (open)
			if($function_userpositions_get['internal']['user is Volunteer'] == 'yes'){
				
				$function_userpositions_get['internal']['data array preliminary'][] = [
					'position_type' => "top",
					'position' => 'Volunteer',
					'position_pure' => 'Volunteer',
					'status' => 'accepted'
				];
				
			}
			#Volunteer top position (open)
			
		}
		#storing all positions (including invalid ones) into preliminary array (close)
		
	}
	#query and preliminary array with all positions in the database (close)
    
	#validation (open)
	if(1==1){ ///6
		
		#lists of user positions (open)
		if(1==1){
			
			#all existing positions (open)
			if(1==1){
				
				$function_userpositions_get['internal']['all_pure_positions'] = [
					'Volunteer', //0
					'NGO Administrator', //1
					'NGO Worker', //2
					'NGO Member', //3
					'Voluno Staff Member', //4
					'Voluno Human Resources Officer', //5
					'Voluno Finance Officer', //6
					'Voluno Coordinator', //7
					'Agent', //8
					'Volunteer Worker', //9
					'Volunteer Trainer', //10
					'Volunteer Advisor', //11
					'Volunteer Recruiter', //12
					'Voluno Web Developer', //13
					'Voluno Moderator' //14
				];
				
			}
			#all existing positions (close)
			
			#allowed positions (open)
			if(1==1){
				// See bracket: #all existing positions
				
				#Unconditional positions (open)
				if(1==1){
					
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][0];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][1];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][2];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][3];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][4];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][8];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][9];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][10];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][11];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][12];
					
				}
				#Unconditional positions (close)
				
				#Voluno Staff Positions (open)
				if($function_userpositions_get['internal']['user is Voluno Staff Member'] == 'yes'){
					
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][5];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][6];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][7];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][13];
					$function_userpositions_get['output']['allowed_pure_positions'][]
						= $function_userpositions_get['internal']['all_pure_positions'][14];
					
					$function_userpositions_get['output']['allowed_pure_positions_voluno_staff'][]
						= $function_userpositions_get['internal']['all_pure_positions'][5];
					$function_userpositions_get['output']['allowed_pure_positions_voluno_staff'][]
						= $function_userpositions_get['internal']['all_pure_positions'][6];
					$function_userpositions_get['output']['allowed_pure_positions_voluno_staff'][]
						= $function_userpositions_get['internal']['all_pure_positions'][7];
					$function_userpositions_get['output']['allowed_pure_positions_voluno_staff'][]
						= $function_userpositions_get['internal']['all_pure_positions'][13];
					$function_userpositions_get['output']['allowed_pure_positions_voluno_staff'][]
						= $function_userpositions_get['internal']['all_pure_positions'][14];
					
				}
				#Voluno Staff Positions (close)
				
			}
			#allowed positions (close)
			
		}
		#lists of user positions (close)
		
		#positions without conditions (open)
		for($alh=0;$alh<count($function_userpositions_get['internal']['data array preliminary']);$alh++){
			
			#
			if(in_array($function_userpositions_get['internal']['data array preliminary'][$alh]['position_pure']
						,$function_userpositions_get['output']['allowed_pure_positions'])){
				
				$function_userpositions_get['internal']['data array'][] = $function_userpositions_get['internal']['data array preliminary'][$alh];
				
			}
			#
			
		}
		#positions without conditions (close)
		
	}
	#validation (close)
	
	#store positions in array (open)
    for($aki=0;$aki<count($function_userpositions_get['internal']['data array']);$aki++){ ///7
		
		#method 1: unsorted array with all information (open)
		if(1==1){
			
			$function_userpositions_get['output']['unsorted list'][] = [
				'position' 					=> $function_userpositions_get['internal']['data array'][$aki]['position'],
				'position_pure' 			=> $function_userpositions_get['internal']['data array'][$aki]['position_pure'],
				'type' 						=> $function_userpositions_get['internal']['data array'][$aki]['position_type'],
				
				'status' 					=> $function_userpositions_get['internal']['data array'][$aki]['status'],
				'application_text' 			=> $function_userpositions_get['internal']['data array'][$aki]['application_text'],
				'application_id' 			=> $function_userpositions_get['internal']['data array'][$aki]['entry_id'],
				
				'application_date_created' 	=> $function_userpositions_get['internal']['data array'][$aki]['date_created'],
				'application_date_modified' => $function_userpositions_get['internal']['data array'][$aki]['date_modified']
			];
			
		}
		#method 1: unsorted array with all information (close)
		
		#method 2: sorted array where keys are position names (open)
		if(1==1){
			
			$function_userpositions_get['output']['sorted list'][$function_userpositions_get['internal']['data array'][$aki]['position']] = [
				
				'position_pure' 			=> $function_userpositions_get['internal']['data array'][$aki]['position_pure'],
				'type' 						=> $function_userpositions_get['internal']['data array'][$aki]['position_type'],
				'status' 					=> $function_userpositions_get['internal']['data array'][$aki]['status'],
				
				'application_text' 			=> $function_userpositions_get['internal']['data array'][$aki]['application_text'],
				'application_id' 			=> $function_userpositions_get['internal']['data array'][$aki]['entry_id'],
				
				'application_date_created' 	=> $function_userpositions_get['internal']['data array'][$aki]['date_created'],
				'application_date_modified' => $function_userpositions_get['internal']['data array'][$aki]['date_modified']
			];
			
		}
		#method 2: sorted array where keys are position names (close)
		
		#method 3: simple array (open)
		if(1==1){
			
			$function_userpositions_get['output']['simple array'][
				$function_userpositions_get['internal']['data array'][$aki]['status']
			][]
			= $function_userpositions_get['internal']['data array'][$aki]['position'];
			
			$function_userpositions_get['internal']['developer']['simple array status list'][]
			= $function_userpositions_get['internal']['data array'][$aki]['status'];
			
			$function_userpositions_get['internal']['developer']['simple array status list']
			= array_values(array_unique($function_userpositions_get['internal']['developer']['simple array status list']));
			
			$function_userpositions_get['output']['simple array']['accepted']
			= array_values(array_unique($function_userpositions_get['output']['simple array']['accepted']));
			$function_userpositions_get['output']['simple array']['pending']
			= array_values(array_unique($function_userpositions_get['output']['simple array']['pending']));
			
			sort($function_userpositions_get['output']['simple array']['accepted']);
			sort($function_userpositions_get['output']['simple array']['pending']);
			
		}
		#method 3: simple array (close)
		
		#method 4: simple pure array (open)
		if(1==1){
			
			$function_userpositions_get['output']['simple_pure_array'][
				$function_userpositions_get['internal']['data array'][$aki]['status']
			][]
			= $function_userpositions_get['internal']['data array'][$aki]['position_pure'];
			
			$function_userpositions_get['internal']['developer']['simple pure array status list'][]
			= $function_userpositions_get['internal']['data array'][$aki]['status'];
			
			$function_userpositions_get['internal']['developer']['simple pure array status list']
			= array_values(array_unique($function_userpositions_get['internal']['developer']['simple pure array status list']));
			
			$function_userpositions_get['output']['simple_pure_array']['accepted']
			= array_values(array_unique($function_userpositions_get['output']['simple_pure_array']['accepted']));
			$function_userpositions_get['output']['simple_pure_array']['pending']
			= array_values(array_unique($function_userpositions_get['output']['simple_pure_array']['pending']));
			
			sort($function_userpositions_get['output']['simple_pure_array']['accepted']);
			sort($function_userpositions_get['output']['simple_pure_array']['pending']);
			
		}
		#method 4: simple pure array (close)
		
		#method 5: ngo array (open)
		if(in_array($function_userpositions_get['internal']['data array'][$aki]['position_pure'],['NGO Worker','NGO Administrator'])){
			
			#sorted (open)
			if(1==1){
				
				//array for all status
				$function_userpositions_get['output']['ngo_array_sorted']['all'][
					$function_userpositions_get['internal']['data array'][$aki]['ngo_id']
				]
				= [
					'full' =>
						$function_userpositions_get['internal']['data array'][$aki]['ngo_name'].
						' ('.
						$function_userpositions_get['internal']['data array'][$aki]['position_pure']
						.')',
					'position' => $function_userpositions_get['internal']['data array'][$aki]['position_pure'],
					'status' => $function_userpositions_get['internal']['data array'][$aki]['status'],
					'ngo_name' => $function_userpositions_get['internal']['data array'][$aki]['ngo_name'],
					'ngo_id' => $function_userpositions_get['internal']['data array'][$aki]['ngo_id']
				];
				
				//separate array for the specific status
				$function_userpositions_get['output']['ngo_array_sorted'][
					$function_userpositions_get['internal']['data array'][$aki]['status']
				][
					$function_userpositions_get['internal']['data array'][$aki]['ngo_id']
				]
				= $function_userpositions_get['output']['ngo_array_sorted']['all'][
					$function_userpositions_get['internal']['data array'][$aki]['ngo_id']
				];
				
			}
			#sorted (close)
			
			#unsorted (open)
			if(1==1){
				
				//array for all status
				$function_userpositions_get['output']['ngo_array_unsorted']['all'][]
				= [
					'full' =>
						$function_userpositions_get['internal']['data array'][$aki]['ngo_name'].
						' ('.
						$function_userpositions_get['internal']['data array'][$aki]['position_pure']
						.')',
					'position' => $function_userpositions_get['internal']['data array'][$aki]['position_pure'],
					'status' => $function_userpositions_get['internal']['data array'][$aki]['status'],
					'ngo_name' => $function_userpositions_get['internal']['data array'][$aki]['ngo_name'],
					'ngo_id' => $function_userpositions_get['internal']['data array'][$aki]['ngo_id']
				];
				
				//separate array for the specific status
				$function_userpositions_get['output']['ngo_array_unsorted'][
					$function_userpositions_get['internal']['data array'][$aki]['status']
				][]
				= $function_userpositions_get['output']['ngo_array_sorted']['all'][
					$function_userpositions_get['internal']['data array'][$aki]['ngo_id']
				];
				
			}
			#unsorted (close)
			
		}
		#method 5: ngo array (close)
		
		#global variables (open)
		if($function_userpositions_get['internal']['user id'] == $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
			
			$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id']
			= $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
			
			$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array'] =
			$function_userpositions_get['output']['simple_pure_array'];
			
			$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array'] =
			$function_userpositions_get['output']['simple array'];
			
		}
		#global variables (close)
		
	}
	#store positions in array (close)
	
}
#positions (close)

#output (open)
if($function_userpositions_get['internal']['user id valid, continue executing function'] == 'yes'){
	
	#display positions for developers (open)
	if($function_userpositions_get['internal']['display all positions for developers'] == 'yes'){ ///8
		// This section only has the purpose of showing developers the current positions of a user in a clear way.
		// Thus, nothing "essential" is stored here.
		
		#style (open)
		if(1==1){
			
			echo '
			<style>
				
				.voluno_function_userPositionsGet_developerInfo_td > tbody > tr{
					padding:10px;
					border:15px solid #006F00 !important;
				}
				
				.voluno_function_userPositionsGet_developerInfo_explanation{
					color:grey;
					font-style:italic;
				}
				
			</style>';
			
		}
		#style (close)
		
        #preparation (open)
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
					
					$function_profileLink['id'] = $function_userpositions_get['internal']['user id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
            
			#rows for table to list actual user positions (open)
			if(1==1){
				
				$function_userpositions_get['internal']['position attributes'] = [
					'position',
					'type',
					'status',
					'application_text',
					'application_id',
					'application_date_created',
					'application_date_modified'
				];
				
				#loop for each position (open)
				for($akf=-1;$akf<count($function_userpositions_get['output']['unsorted list']);$akf++){
					
					$function_userpositions_get['internal']['long_array'] .= '
					<tr>';
						
						#loop for each attribute (open)
						for($akg=-1;$akg<count($function_userpositions_get['internal']['position attributes']);$akg++){
							
							#headings (open)
							if($akf == -1){
								
								$function_userpositions_get['internal']['long_array'] .= '
								<td style="border:1px solid grey;vertical-align:center;text-align:center;padding:5px;">
									<div style="font-weight:bold;">
										'.$function_userpositions_get['internal']['position attributes'][$akg].'
									</div>
								</td>';
								
								
								
							}
							#headings (close)
							
							#content (open)
							else{
								
								#numbering (open)
								if($akg == -1 AND $akf >= 0){
									$function_userpositions_get['output']['unsorted list'][$akf][$function_userpositions_get['internal']['position attributes'][$akg]] = $akf+1;
								}
								#numbering (close)
								
								#add pure position (open)
								if($akg == 0){
									
									$function_userpositions_get['internal']['pure_position']
									= '
									<div style="color:grey;">
										('.$function_userpositions_get['output']['unsorted list'][$akf]['position_pure'].')
									</div>';
									
								}else{
									
									unset($function_userpositions_get['internal']['pure_position']);
									
								}
								#add pure position (close)
								
								$function_userpositions_get['internal']['long_array'] .= '
								<td style="border:1px solid grey;vertical-align:center;text-align:center;padding:5px;">
									'.$function_userpositions_get['output']['unsorted list'][$akf][$function_userpositions_get['internal']['position attributes'][$akg]].'
									'.$function_userpositions_get['internal']['pure_position'].'
								</td>';
								
							}
							#content (close)
							
						}
						#loop for each attribute (close)
						
					$function_userpositions_get['internal']['long_array'] .= '
					</tr>';
					
				}
				#loop for each position (close)
				
			}
			#rows for table to list actual user positions (close)
			
        }
        #preparation (close)
        
        #final content (open)
        if(1==1){
            
            echo '
            <table
                style="
                    margin:20px;
                    background-color:#fff;
                    display:inline-block;
                "
				class="voluno_function_userPositionsGet_developerInfo_td"
            >
                <tr>
					<td style="text-align:center;font-weight:bold;">
						INFORMATION FOR DEVELOPERS
					</td>
				</tr>';
				
				#method 1 (open)
				if(1==1){
					
					echo '
					<tr>
						<td>
							<h5>
								Method 1: 
							</h5>';
							
							#structure of output array (open)
							if(1==1){
								
								echo '
								This is how the variable is outputted:
								<div style="padding:30px;color:blue;">
									$function_userpositions_get[\'unsorted list\'][] = [
										<div style="margin-left:20px;">
											position:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												specific position name (without additional information)
											</span>
											<br>
											position_pure:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												specific position name, including additional information
											</span>
											<br>
											type:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												"top", "Volunteer", "NGO Member" or "Voluno Staff Member"
											</span>
											<br>
											status:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												"accepted", "pending"
											</span>
											<br>
											application_text: 
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												optional text, depending on position
											</span>
											<br>
											application_id:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												mysql data entry index
											</span>
											<br>
											application_date_created
											<br>
											application_date_modified
										</div>
									];
								</div>';
								
							}
							#structure of output array (close)
							
							echo '
							The user '.$function_profileLink['name_link'].' has the following positions:
							'.$function_userpositions_get['internal']['unsorted_array'].'
							<table>
								<tr>
									<td
										colspan="'.(count($function_userpositions_get['internal']['position attributes'])+1).'"
										style="border:1px solid grey;vertical-align:center;text-align:center;padding:5px;font-weight:bold;"
									>
										Unsorted array
									</td>
								</tr>
								'.$function_userpositions_get['internal']['long_array'].'
							</table>
							Here\'s the dumped variable:
							<br>';
							
							var_dump($function_userpositions_get['output']['unsorted list']);
							
							echo '
							<br>
						</td>
					</tr>';
					
				}
				#method 1 (close)
				
				#method 2 (open)
				if(1==1){
					
					echo '
					<tr>
						<td>
							<h5>
								Method 2: Sorted array
							</h5>';
							
							#array structure (open)
							if(1==1){
								
								echo '
								This is how the variable is outputted:
								<div style="padding:30px;color:blue;">
									$function_userpositions_get[\'sorted list\'][<span style="color:red;">specific position name</span>] = [
										<div style="margin-left:20px;">
											position_pure:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												specific position name, including additional information
											</span>
											<br>
											type:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												"top", "Volunteer", "NGO Member" or "Voluno Staff Member"
											</span>
											<br>
											status:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												"accepted", "pending"
											</span>
											<br>
											application_text: 
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												optional text, depending on position
											</span>
											<br>
											application_id:
											<span class="voluno_function_userPositionsGet_developerInfo_explanation">
												mysql data entry index
											</span>
											<br>
											application_date_created
											<br>
											application_date_modified
										</div>
									];
								</div>';
								
							}
							#array structure (close)
							
							echo '
							The user '.$function_profileLink['name_link'].' has the following positions:
							<br>
							<table>
								<tr>
									<td
										colspan="'.(count($function_userpositions_get['internal']['position attributes'])+1).'"
										style="border:1px solid grey;vertical-align:center;text-align:center;padding:5px;font-weight:bold;"
									>
										Sorted array (rows keys are position name)
									</td>
								</tr>
								'.$function_userpositions_get['internal']['long_array'].'
							</table>
							Here\'s the dumped variable:<br>';
							
							var_dump($function_userpositions_get['output']['sorted list']);
							
						echo '
						</td>
					</tr>';
					
				}
				#method 2 (close)
				
				#method 3 - simple array (open)
				if(1==1){
					
					#prepare (open)
					if(1==1){
						
						#loop for each status (open)
						for($akh=0;$akh<count($function_userpositions_get['internal']['developer']['simple array status list']);$akh++){
							
							$function_userpositions_get['internal']['developer']['simple array'] .= '
							<li>
								'.$function_userpositions_get['internal']['developer']['simple array status list'][$akh].'
								<ul>';
									
									#loop for each position (open)
									for($akf=0;$akf<count($function_userpositions_get['output']['simple array'][
										$function_userpositions_get['internal']['developer']['simple array status list'][$akh]
									]);$akf++){
										
										#only the current status (open)
										if(!empty($function_userpositions_get['output']['simple array'][
											$function_userpositions_get['internal']['developer']['simple array status list'][$akh]
										])){
											
											$function_userpositions_get['internal']['developer']['simple array'] .= '
											<li>
												'.$function_userpositions_get['output']['simple array'][
													$function_userpositions_get['internal']['developer']['simple array status list'][$akh]
												][$akf].'
											</li>';
											
										}
										#only the current status (close)
										
									}
									#loop for each position (close)
									
								$function_userpositions_get['internal']['developer']['simple array'] .= '
								</ul>
							</li>';
							
						}
						#loop for each status (close)
						
						$function_userpositions_get['internal']['developer']['simple array'] = '
						<table style="margin:20px;">
							<tr>
								<td style="border:1px solid grey;padding:5px;">
									<ul>
										'.$function_userpositions_get['internal']['developer']['simple array'].'
									</ul>
								</td>
							</tr>
						</table>';
						
					}
					#prepare (close)
					
					#content (open)
					if(1==1){
						
						echo '
						<tr>
							<td>
								<h5>
									Method 3: Simple array
								</h5>';
								
								#array structure (open)
								if(1==1){
									
									echo '
									This is how the variable is outputted:
									<div style="padding:30px;color:blue;">
										$function_userpositions_get[\'simple array\']
										[<span style="color:red;">status</span>]
										[<span style="color:red;">index</span>]=
										<span class="voluno_function_userPositionsGet_developerInfo_explanation">
											specific position name
										</span>
										//STATUS = pending or accepted
									</div>';
									
								}
								#array structure (close)
								
								echo '
								<br>
								The user '.$function_profileLink['name_link'].' has the following positions:
								'.$function_userpositions_get['internal']['developer']['simple array'].'
								Here\'s the dumped variable:<br>';
								var_dump($function_userpositions_get['output']['simple array']);
							echo '
							</td>
						</tr>';
						
					}
					#content (close)
					
				}
				#method 3 - simple array (close)
				
				#method 4 - simple pure array (open)
				if(1==1){
					
					#prepare (open)
					if(1==1){
						
						#loop for each status (open)
						for($akh=0;$akh<count($function_userpositions_get['internal']['developer']['simple pure array status list']);$akh++){
							
							$function_userpositions_get['internal']['developer']['simple_pure_array'] .= '
							<li>
								'.$function_userpositions_get['internal']['developer']['simple pure array status list'][$akh].'
								<ul>';
									
									#loop for each position (open)
									for($akf=0;$akf<count($function_userpositions_get['output']['simple_pure_array'][
										$function_userpositions_get['internal']['developer']['simple pure array status list'][$akh]
									]);$akf++){
										
										#only the current status (open)
										if(!empty($function_userpositions_get['output']['simple_pure_array'][
											$function_userpositions_get['internal']['developer']['simple pure array status list'][$akh]
										])){
											
											$function_userpositions_get['internal']['developer']['simple_pure_array'] .= '
											<li>
												'.$function_userpositions_get['output']['simple_pure_array'][
													$function_userpositions_get['internal']['developer']['simple pure array status list'][$akh]
												][$akf].'
											</li>';
											
										}
										#only the current status (close)
										
									}
									#loop for each position (close)
									
								$function_userpositions_get['internal']['developer']['simple_pure_array'] .= '
								</ul>
							</li>';
							
						}
						#loop for each status (close)
						
						$function_userpositions_get['internal']['developer']['simple_pure_array'] = '
						<table style="margin:20px;">
							<tr>
								<td style="border:1px solid grey;padding:5px;">
									<ul>
										'.$function_userpositions_get['internal']['developer']['simple_pure_array'].'
									</ul>
								</td>
							</tr>
						</table>';
						
					}
					#prepare (close)
					
					#content (open)
					if(1==1){
						
						echo '
						<tr>
							<td>
								<h5>
									Method 4: Simple pure array
								</h5>';
								
								#array structure (open)
								if(1==1){
									
									echo '
									This is how the variable is outputted:
									<div style="padding:30px;color:blue;">
										$function_userpositions_get[\'simple pure array\']
										[<span style="color:red;">status</span>]
										[<span style="color:red;">index</span>]=
										<span class="voluno_function_userPositionsGet_developerInfo_explanation">
											specific position name
										</span>
										//STATUS = pending or accepted
									</div>';
									
								}
								#array structure (close)
								
								echo '
								<br>
								The user '.$function_profileLink['name_link'].' has the following positions:
								'.$function_userpositions_get['internal']['developer']['simple_pure_array'].'
								Here\'s the dumped variable:<br>';
								var_dump($function_userpositions_get['output']['simple_pure_array']);
							echo '
							</td>
						</tr>';
						
					}
					#content (close)
					
				}
				#method 4 - simple pure array (close)
				
				#method 5 - ngo array (open)
				if(1==1){
					
					#content (open)
					if(1==1){
						
						echo '
						<tr>
							<td>
								<h5>
									Method 5: NGO array
								</h5>';
								
								#structure of output array (open)
								if(1==1){
									
									echo '
									This is how the variable is outputted:
									<div style="padding:30px;color:blue;">
										$function_userpositions_get[\'output\'][\'ngo_array_sorted\'][\'all\']['.
											'<span style="color:red">'.
												'position'.
											'</span>'.
										'] = ...
										<br>
										<br>
										$function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
										<br>
										$function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'accepted\'][] = [
										<br>
										$function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'pending\'][] = [
											<div style="margin-left:20px;">
												full:
												<span class="voluno_function_userPositionsGet_developerInfo_explanation">
													"NGO name" ("user position")
												</span>
												<br>
												position:
												<span class="voluno_function_userPositionsGet_developerInfo_explanation">
													"NGO Administrator" or "NGO Worker", not "NGO Member"
												</span>
												<br>
												status:
												<span class="voluno_function_userPositionsGet_developerInfo_explanation">
													"accepted", "pending"
												</span>
												<br>
												ngo_name:
												<span class="voluno_function_userPositionsGet_developerInfo_explanation">
													NGO name
												</span>
												<br>
												ngo_id: 
												<span class="voluno_function_userPositionsGet_developerInfo_explanation">
													NGO id
												</span>
											</div>
										];
									</div>';
									
								}
								#structure of output array (close)
								
								echo '
								<br>
								'.#The user '.$function_profileLink['name_link'].' has the following positions:
								#'.$function_userpositions_get['internal']['developer']['simple_pure_array'].'
								'Here\'s the dumped variable:<br>';
								var_dump($function_userpositions_get['output']['ngo_array_unsorted']['all']);
							echo '
							</td>
						</tr>';
						
					}
					#content (close)
					
				}
				#method 5 - ngo array (close)
				
			echo '
			</table>';
			
        }
        #final content (close)
		
	}
	#display positions for developers (close)
	
	$function_userpositions_get = $function_userpositions_get['output'];
	
}else{
	
	///9
	echo '
	<div style="color:red;border:4px solid red;padding:10px;margin:10px;display:inline-block;">
		Invalid user ID: '.$function_userpositions_get['internal']['user id'].'
		<br>
		Please inform the website administrator that and where this error message occured.
		<br>
		Thanks and sorry for the inconvenience!
	</div>';
	
}
#output (close)

?>