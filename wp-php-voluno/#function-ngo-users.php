<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-ngo-users.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Generates a multidimensional array of NGO staff members and agents of a specific NGO.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_ngoUsers['ngo id'] = ngoid;// Obligatory. The id of the NGO.
				#$function_ngoUsers['developer info'] = 'yes';// Information for developers on what the function will output.
				
			}
			#input (close)
			
			include('#function-ngo-users.php');
			
			#output (open)
			if(1==1){
				
				# The function outputs the following array:
				#
				# 	$function_ngoUsers['output array']
				#
				# array(5) { //for each member. If a member has more than one position, the positions are imploded into one long string.
				#	[0]=> array(4) {
				#		["user_position_nice_display"]=>  "NGO Worker"
				#		["user_position_nice_display_title"]=> "NGO Workers can use Voluno's NGO services."
				#		["user_display_name"]=> "Example User"
				#		["user_id"]=> "123"
				#	}
				#	...
				# }
				
			}
			#output (close)
			
		}
		#function-ngo-users.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.10.26, Steve
		## Last format and structure check: 2016.10.26, Steve
		## Last update of all instances this function is used: 2016.10.26, Steve
		
		# Generates a multidimensional array of NGO staff members and agents of a specific NGO.
		
		// Regular input area ///1
		//
		// Then, first, staff members are loaded ///2
		// And stored into an array ///3
		// Further arrays are created which are required to get agents. ///4
		//
		// Next, agents are loaded. To do this, the index needs to be continued. ///5
		// For each NGO member, there might be an agent. ///6
		//
		// Finally, the array is checked for duplicated. ///7
		// To prevent duplicates, the array is recreated to contain one entry for each user. ///8
		// Then, the array is transformed into an array with default keys. Double names are replaced, other entries are imploded into one long string. ///9
		//
		// At the end, there is the regular output section ///10
		// And a developer info section ///11
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(!empty($function_ngoUsers['ngo id'])){ ///1
	
	$function_ngoUsers['internal'] = $function_ngoUsers;
	
	$function_ngoUsers['internal']['terminate function'] = 'no';
	
}
#input + var definitions (close)

#query and array creation (open)
if($function_ngoUsers['internal']['terminate function'] == 'no'){
	
	#staff members (open)
	if(1==1){
		
		#query (open)
		if(1==1){ ///2
			
			$function_ngoUsers['internal']['staff query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_development_organizations_properties
				
				LEFT JOIN fi4l3fg_voluno_users_extended
				ON ngo_prop_type_id = usersext_id
				
				WHERE ngo_prop_ngo_id = %d
					AND ngo_prop_type_general = "position"
					AND ngo_prop_type_status = "accepted";'
				,$function_ngoUsers['internal']['ngo id']
			);
			$function_ngoUsers['internal']['staff results'] = $GLOBALS['wpdb']->get_results($function_ngoUsers['internal']['staff query']);
			
		}
		#query (close)
		
		#loop (open)
		for($alf=0;$alf<count($function_ngoUsers['internal']['staff results']);$alf++){
			
			#create array of staff members (open)
			if(1==1){///3
				
				#display name
				$function_ngoUsers['output']['output array'][$alf]['user_display_name']
				= $function_ngoUsers['internal']['staff results'][$alf]->usersext_displayName;
				
				#user id
				$function_ngoUsers['output']['output array'][$alf]['user_id']
				= $function_ngoUsers['internal']['staff results'][$alf]->usersext_id;
				
				#user_position (open)
				if($function_ngoUsers['internal']['staff results'][$alf]->ngo_prop_type_detail == 'admin' ){
					
					$function_ngoUsers['output']['output array'][$alf]['user_position_nice_display'] = 'NGO Administrator';
					
					$function_ngoUsers['output']['output array'][$alf]['user_position_nice_display_title'] =
					'NGO Administrators can use Voluno\'s NGO services and manage the NGO\'s account.';
					
				}else{
					
					$function_ngoUsers['output']['output array'][$alf]['user_position_nice_display'] = 'NGO Worker';
					
					$function_ngoUsers['output']['output array'][$alf]['user_position_nice_display_title'] =
					'NGO Workers can use Voluno\'s NGO services.';
					
				}
				#user_position (close)
				
			}
			#create array of staff members (close)
			
			#create array for array of agents (open)
			if(1==1){ ///4
				
				$function_ngoUsers['internal']['ids of staff members'][] 
				= $function_ngoUsers['internal']['staff results'][$alf]->usersext_id;
				
				$function_ngoUsers['internal']['ids of all users'][]
				= $function_ngoUsers['internal']['staff results'][$alf]->usersext_id;
				
				#agent type (open)
				if($function_ngoUsers['internal']['staff results'][$alf]->ngo_prop_type_detail == 'admin' ){
					
					#$function_ngoUsers['internal']['agent types part'][] = 'NGO Administrator';
					$function_ngoUsers['internal']['agent types nice display'][] = 'Agent (NGO Administrator)';
					$function_ngoUsers['internal']['agent types title'][] =
					'Agents of NGO Administrators can use Voluno\'s NGO services and manage the NGO\'s account.';
					
				}else{
					
					#$function_ngoUsers['internal']['agent types part'][] = 'NGO Worker';
					$function_ngoUsers['internal']['agent types nice display'][] = 'Agent (NGO Worker)';
					$function_ngoUsers['internal']['agent types title'][] =
					'Agent of NGO Workers can use Voluno\'s NGO services.';
					
				}
				#agent type (close)
				
			}
			#create array for array of agents (close)
			
		}
		#loop (close)
		
	}
	#staff members (close)
	
	#agents (open)
	if(1==1){
		
		$function_ngoUsers['internal']['agent index'] = count($function_ngoUsers['output']['output array']); ///5
		
		#loop (open)
		for($alf=0;$alf<count($function_ngoUsers['internal']['ids of staff members']);$alf++){ ///6
			
			#query (open)
			if(1==1){
				
				$function_ngoUsers['internal']['agent query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_applications
					
					LEFT JOIN fi4l3fg_voluno_users_extended
					ON application_user_id = usersext_id
					
					WHERE application_type_general = "agency"
						AND application_type_id = %s;'
					,$function_ngoUsers['internal']['ids of staff members'][$alf]
				);
				$function_ngoUsers['internal']['agent results'] = $GLOBALS['wpdb']->get_results($function_ngoUsers['internal']['agent query']);
				
			}
			#query (close)
			
			#array creation (open)
			for($alj=0;$alj<count($function_ngoUsers['internal']['agent results']);$alj++){ ///
				
				#array data entries (open)
				if(1==1){
					
					#display name
					$function_ngoUsers['output']['output array'][
						$function_ngoUsers['internal']['agent index']
					]['user_display_name']
					= $function_ngoUsers['internal']['agent results'][$alj]->usersext_displayName;
					
					#user id
					$function_ngoUsers['output']['output array'][
						$function_ngoUsers['internal']['agent index']
					]['user_id']
					= $function_ngoUsers['internal']['agent results'][$alj]->usersext_id;
					
					#position: nice display
					$function_ngoUsers['output']['output array'][
						$function_ngoUsers['internal']['agent index']
					]['user_position_nice_display']
					= $function_ngoUsers['internal']['agent types nice display'][$alj];
					
					#title
					$function_ngoUsers['output']['output array'][
						$function_ngoUsers['internal']['agent index']
					]['user_position_nice_display_title']
					= $function_ngoUsers['internal']['agent types title'][$alj];
					
				}
				#array data entries (close)
				
				$function_ngoUsers['internal']['agent index']++;
				
				$function_ngoUsers['internal']['ids of all users'][]
				= $function_ngoUsers['internal']['agent results'][$alj]->usersext_id;
				
			}
			#array creation (close)
			
		}
		#loop (close)
		
	}
	#agents (close)
	
	#merging entries in the array into one (open)
	if(1==1){ ///7
		
		$function_ngoUsers['internal']['ids of all users unique'] = array_unique($function_ngoUsers['internal']['ids of all users']);
		#$function_ngoUsers['internal']['ids of all users already added'] = '';
		
		#save all into subarrays for each id (open)
		for($alk=0;$alk<count($function_ngoUsers['internal']['ids of all users']);$alk++){ ///8
			
			#nice display
			$function_ngoUsers['internal']['subarrays_for_each_id'][
				$function_ngoUsers['internal']['ids of all users'][$alk]
			]['nice_display'][]
			= $function_ngoUsers['output']['output array'][$alk]['user_position_nice_display'];
			
			#nice display title
			$function_ngoUsers['internal']['subarrays_for_each_id'][
				$function_ngoUsers['internal']['ids of all users'][$alk]
			]['user_position_nice_display_title'][]
			= $function_ngoUsers['output']['output array'][$alk]['user_position_nice_display_title'];
			
			
			#display name
			$function_ngoUsers['internal']['subarrays_for_each_id'][
				$function_ngoUsers['internal']['ids of all users'][$alk]
			]['user_display_name']
			= $function_ngoUsers['output']['output array'][$alk]['user_display_name'];
			
			#user id
			$function_ngoUsers['internal']['subarrays_for_each_id'][
				$function_ngoUsers['internal']['ids of all users'][$alk]
			]['user_id']
			= $function_ngoUsers['output']['output array'][$alk]['user_id'];
			
		}
		#save all into subarrays for each id (close)
		
		#unique array (open)
		for($alk=0;$alk<count($function_ngoUsers['internal']['ids of all users unique']);$alk++){ ///9
			
			#nice display (open)
			if(1==1){
				
				$function_ngoUsers['internal']['temp'] =
				$function_ngoUsers['internal']['subarrays_for_each_id'][
					$function_ngoUsers['internal']['ids of all users unique'][$alk]
				]['nice_display'];
				
				sort($function_ngoUsers['internal']['temp']);
				$function_ngoUsers['internal']['temp'] = array_unique($function_ngoUsers['internal']['temp']);
				$function_ngoUsers['internal']['temp'] = implode('; ',$function_ngoUsers['internal']['temp']);
				
				$function_ngoUsers['internal']['output array unique'][$alk]['user_position_nice_display']
				= $function_ngoUsers['internal']['temp'];
				
			}
			#nice display (close)
			
			#nice display title (open)
			if(1==1){
				
				$function_ngoUsers['internal']['temp'] =
				$function_ngoUsers['internal']['subarrays_for_each_id'][
					$function_ngoUsers['internal']['ids of all users unique'][$alk]
				]['user_position_nice_display_title'];
				
				sort($function_ngoUsers['internal']['temp']);
				$function_ngoUsers['internal']['temp'] = array_unique($function_ngoUsers['internal']['temp']);
				$function_ngoUsers['internal']['temp'] = implode('&#13;',$function_ngoUsers['internal']['temp']);
				
				$function_ngoUsers['internal']['output array unique'][$alk]['user_position_nice_display_title']
				= $function_ngoUsers['internal']['temp'];
				
			}
			#nice display title (close)
			
			
			#display name
			$function_ngoUsers['internal']['output array unique'][$alk]['user_display_name']
			= $function_ngoUsers['internal']['subarrays_for_each_id'][
				$function_ngoUsers['internal']['ids of all users unique'][$alk]
			]['user_display_name'];
			
			#user id
			$function_ngoUsers['internal']['output array unique'][$alk]['user_id']
			= $function_ngoUsers['internal']['subarrays_for_each_id'][
				$function_ngoUsers['internal']['ids of all users unique'][$alk]
			]['user_id'];
			
		}
		#unique array (close)
		
		$function_ngoUsers['output']['output array'] = $function_ngoUsers['internal']['output array unique'];
		
	}
	#merging entries in the array into one (close)
	
}
#query and array creation (close)

#output (open)
if($function_ngoUsers['internal']['terminate function'] == 'no'){ ///10
	
	#developer info (open)
	if($function_ngoUsers['internal']['developer info'] == 'yes'){ ///11
		
		echo '
		<div
			style="
				padding:10px;
				border:15px solid #006F00;
			"
		>
			<div style="color:blue;">
				["user_position_nice_display"]=> "NGO Worker"
				<br>
				["user_position_nice_display_title"]=> "NGO Workers can use Voluno\'s NGO services."
				<br>
				["user_display_name"]=> "Example User"
				<br>
				["user_id"]=> "123"
			</div>
			<br>';
			var_dump($function_ngoUsers['output']['output array']);
		echo '
		</div>';
		
	}
	#developer info (close)
	
	$function_ngoUsers = $function_ngoUsers['output'];
	
}
#output (close)

?>