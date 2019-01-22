<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-user-add.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// This function has two parts:
				//    - The mysql update part
				//    - The content part (including jquery)
				// It must be included twice, once in the update section and once in the content (since, sometimes, the update isn't always called).
				// The MySQL update only happens if the form has been submitted.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_useradd['user_data'] = [ //all of the following output is being sanitized.
					'user_pass' => "1234",
					'is_pass_hashed?' => 'no', //'yes', 'no' (default). If no, a preliminary password is used to register and then replaced by hashed password.
					'user_email' => 'EMAIL',
					'first_name' => 'NELSON',
					'last_name' => 'MANDELA',
					'country' => 8233333333333333333333333333333333, // country ID
					'status' => 'active' // 'active' (default), 'draft', 'paused', 'locked', 'deleted'. Only web developers and agents.
				];
				$function_useradd['redirect to ngo profile'] = 'no'; //optional, 'yes' (default) or 'no'
				
			}
			#input (close)
			
			include('#function-user-add.php');
			#no output
			
		}
		#function-user-add.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		##//// Last documentation check: 2016.10.29, Steve
		##//// Last format and structure check: 2016.10.29, Steve
		##//// Last update of all instances this function is used: 2016.10.29, Steve
		
		# Add NGOs and the NGO admin.
		# The function consists of two parts: An extended form (including MySQL and jQuery) and an MSQ update part, both of which interact.
		
		// Default input. ///1
		//
		// MySQL update section ///2
		// Input sanitization and validation ///3
		// Actual updating of database (what the whole function is about) ///4
		// Redirect to new NGO profile ///5
		//
		// Form section ///10
		// Get list of existing NGOs for dropdown ///11
		// Jquery ///12
		// Form ///13
		// Default output ///14
		
	}
	##file info (close)
	
}
#documentation (close)

#input (open)
if(1==1){ ///1
	
	$function_useradd['internal'] = $function_useradd;
	
}
#input (close)

#section: mysql update (open)
if(!empty($function_useradd['internal']['user_data'])){ ///2
	
	#new user (open)
	if(1==1){
		
		#sanitization (open)
		if(1==1){
			
			#email (open)
			if(1==1){
				
				#function-sanitize-text.php (v1.0) (open)
				if(1==1){ ///3
					
					$function_sanitize_text__type = "email address"; //obligatory
					/*
						one line unformatted text (city, name, occupation, etc.)
						url readable text (url, user_nicename, etc.) (sanitize_title)
						email address
						plain text with line breaks (biography)
					*/
					$function_sanitize_text__text = $function_useradd['internal']['user_data']['user_email'];
					include('#function-sanitize-text.php');
					$function_useradd['internal']['user_data']['user_email'] = $function_sanitize_text__text_sanitized;
					
				}
				#function-sanitize-text.php (v1.0) (close)
				
			}
			#email (close)
			
			#names (open)
			if(1==1){
				
				#function-sanitize-text.php (v1.0) (open)
				if(1==1){ ///3
					
					$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
					/*
						one line unformatted text (city, name, occupation, etc.)
						url readable text (url, user_nicename, etc.) (sanitize_title)
						email address
						plain text with line breaks (biography)
					*/
					$function_sanitize_text__text = $function_useradd['internal']['user_data']['first_name'];
					include('#function-sanitize-text.php');
					$function_useradd['internal']['user_data']['first_name'] = $function_sanitize_text__text_sanitized;
					
				}
				#function-sanitize-text.php (v1.0) (close)
				
				#function-sanitize-text.php (v1.0) (open)
				if(1==1){ ///3
					
					$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
					/*
						one line unformatted text (city, name, occupation, etc.)
						url readable text (url, user_nicename, etc.) (sanitize_title)
						email address
						plain text with line breaks (biography)
					*/
					$function_sanitize_text__text = $function_useradd['internal']['user_data']['last_name'];
					include('#function-sanitize-text.php');
					$function_useradd['internal']['user_data']['last_name'] = $function_sanitize_text__text_sanitized;
					
				}
				#function-sanitize-text.php (v1.0) (close)
				
			}
			#names (close)
			
			#status (open)
			if(1==1){
				
				$function_useradd['internal']['status_array'] = ['active','draft','paused','locked','deleted'];
				
				#check (open)
				if(
					!in_array($function_useradd['internal']['user_data']['status'],$function_useradd['internal']['status_array'])
					OR
					!array_intersect($GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['STATUS'],['Agent','Voluno Web Developer'])
				){
					
					$function_useradd['internal']['user_data']['status'] = 'active';
					
				}
				#check (close)
				
			}
			#status (close)
			
		}
		#sanitization (close)
		
		#validation - check if email already exists (open)
		if(1==1){ ///3
			
			$function_useradd['internal']['email is still available']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_users_extended
				WHERE usersext_userEmail = %s;',
				$function_useradd['internal']['user_data']['user_email']
			);
			$function_useradd['internal']['email is still available']['row']
			= $GLOBALS['wpdb']->get_row($function_useradd['internal']['email is still available']['query']);
			
			#check (open)
			if(empty($function_useradd['internal']['email is still available']['row'])){
				
				$function_useradd['internal']['email is still available'] = "yes";
				
			}else{
				
				$function_useradd['internal']['email is still available'] = "no";
				
			}
			#check (close)
			
		}
		#validation - check if email already exists (open)
		
		#validation execution (open)
		if($function_useradd['internal']['email is still available'] == "yes"){
			
			#database updates (open)
			if(1==1){ ///4
				
				#wp users (open)
				if(1==1){
					
					#insert user (open)
					if(1==1){
						
						$function_useradd['internal']['user_data']['display_name']
						= $function_useradd['internal']['user_data']['first_name'].' '.$function_useradd['internal']['user_data']['last_name'];
						
						$function_useradd['internal']['user_data']['wp_insert_user_array'] = array(
							'user_pass'       => $function_useradd['internal']['user_data']['user_pass'],
							'user_login'      => $function_useradd['internal']['user_data']['user_email'],
							'user_nicename'   => sanitize_title($check_code_row->register_first_name.'-'.$check_code_row->register_last_name),
							'user_url'        => '',
							'user_email'      => $function_useradd['internal']['user_data']['user_email'],
							'display_name'    => $function_useradd['internal']['user_data']['display_name'],
							'first_name'      => $function_useradd['internal']['user_data']['first_name'],
							'last_name'       => $function_useradd['internal']['user_data']['last_name']
						);
						
						$function_useradd['internal']['user_id_pure'] = wp_insert_user($function_useradd['internal']['user_data']['wp_insert_user_array']);
						$function_useradd['internal']['user_id'] = 'usersext_id_'.$function_useradd['internal']['user_id_pure'];
						
					}
					#insert user (close)
					
					#update password (was saved previously and already hashed, thus may not be hashed again) (open)
					if($function_useradd['internal']['user_data']['is_pass_hashed?'] == 'yes'){
						
						$GLOBALS['wpdb']->update( 
							'4df5ukbnn5p3t817_users',
							array( //updated content
								'user_pass' => $function_useradd['internal']['user_data']['user_pass']
							),
							array( //location of updated content
								'ID' => preg_replace("/[^0-9]/","",$function_useradd['internal']['user_id_pure'])
							),
							array( //format of updated content
								'%s'
							),
							array( //format of location of updated content
								'%d'
							)
						);
						
					}
					#update password (was saved previously and already hashed, thus may not be hashed again) (close)
					
				}
				#wp users (close)
				
				#wp users extended (open)
				if(1==1){
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_users_extended', 
						array(
							'usersext_userEmail' => $function_useradd['internal']['user_data']['user_email'],
							'usersext_displayName' => $function_useradd['internal']['user_data']['display_name'],
							'usersext_firstName' => $function_useradd['internal']['user_data']['first_name'],
							'usersext_lastName' => $function_useradd['internal']['user_data']['last_name'],
							
							'usersext_country' => $function_useradd['internal']['user_data']['country'],
							'usersext_timezone_offset' => 1,
							'usersext_userRegistered' => date("Y-m-d H:i:s"),
							'usersext_status' => $function_useradd['internal']['user_data']['status'],
							
							'usersext_id' => $function_useradd['internal']['user_id'],
							'usersext_ida' => $function_useradd['internal']['user_id_pure']
						),
						array(
							'%s','%s','%s','%s',
							'%d','%d','%s','%s',
							'%s','%d'
						)
					);
					var_dump($function_useradd['internal']);
				}
				#wp users extended (close)
				
			}
			#database updates (close)
			
			#redirect (open)
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
						
						$function_profileLink['id'] = $function_useradd['internal']['user_id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
						#$function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
						
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
				
				#function-redirect.php (v1.0) (open)
				if($function_useradd['internal']['redirect to user profile'] == 'yes'){ //redirect to new ngo ///5
					
					#documentation (open)
					if(1==1){
						
						// Redirects to another page. Prevents further loading of content.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_redirect['redirect_url'] = $function_profileLink['link']; // url to redirect to. If none is given, homepage is used.
						
					}
					#input (close)
					
					include('#function-redirect.php');
					
					#no output
					
				}
				#function-redirect.php (v1.0) (close)
				
			}
			#redirect (close)
			
		}
		#validation execution (close)
		
	}
	#new user (close)
	
	//unset everything
	unset($function_useradd);
	
}
#section: mysql update (close)

?>