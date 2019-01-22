<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-my-office-arm.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// My Office (the area in which the user can view his or her own pages: messages, settings, profile, etc) requires a complex user's rights management,
				// since there are several pages and different roles and elements. To make it easier to keep everything up to date, this function was created.
				// Redirects if no access is granted.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_myOfficeArm['user'] = $_GET['user_id']; //pure id of user who's pages will be displayed. Default: current user. The observer is always the current user.
				//current page id is used to determine which menu item it is.
				
			}
			#input (close)
			
			include('#function-my-office-arm.php');
			
			#output (open)
			if(1==1){
				
				# $function_myOfficeArm['tab_menu'] // Tab menu.
				
				# $function_myOfficeArm['owner_user_id'] //id of the owner of the user profile
				# $function_myOfficeArm['owner_user_object'] //table row, can be accessed like this:via ...->usersext_displayName
				
				# var_dump($function_myOfficeArm['role_array']); // array of user roles
				# roles:
				# - 'owner' (the current user is the one the pages belong to)
				# - 'agent' (the current user is the agent of the owner)
				# - 'blocked' (the current user is a blocked contact of the owner) -> automatic redirect to own profile, except when user is web developer or hr officer
				# - 'web_developer_or_human_resources_officer' (the current user can see everything)
				# - 'visitor' (the current user has no relationship to the current user but also has no special rights)
				
				# $function_myOfficeArm['error']['owner_doesnt_exist'];
				# $function_myOfficeArm['owner_user_status'];
				
			}
			#output (close)
			
		}
		#function-my-office-arm.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.12.29, Steve
		## Last format and structure check: 2016.12.29, Steve
		## Last update of all instances this function is used: 2016.12.29, Steve
		
		# Handles the ARM for all pages of the user's office. Also handles the different tab menus.
		
		// Default var input ///1
		// Get profile owner ///2
		// - get user data ///3
		// - validate user ///4
		// find out user roles of the current user (is he owner? agent? blocked, etc.) ///5
		// create specific tab menu ///6
		// redirect if user is not allowed to view page ///7
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_myOfficeArm['internal'] = $function_myOfficeArm;
	
}
#input + var definitions (close)

#processes (open)
if(1==1){
	
	#profile owner id and status (open)
	if(1==1){ ///2
		
		#get owner_user_id (open) ///3
		if(empty($function_myOfficeArm['internal']['user'])){
			
			$function_myOfficeArm['output']['owner_user_id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
			$function_myOfficeArm['output']['owner_user_object'] = $GLOBALS['voluno_variables']['current_user_extended'];
		   
		}else{
			
			#query (open)
			if(1==1){
				
				$function_myOfficeArm['internal']['owner']['query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_users_extended
					WHERE usersext_id = %s;',
					'usersext_id_'.$function_myOfficeArm['internal']['user']
				);
				$function_myOfficeArm['internal']['owner']['row'] = $GLOBALS['wpdb']->get_row($function_myOfficeArm['internal']['owner']['query']);
				
			}
			#query (close)
			
			$function_myOfficeArm['output']['owner_user_id'] = 'usersext_id_'.$function_myOfficeArm['internal']['user'];
			$function_myOfficeArm['output']['owner_user_object'] = $function_myOfficeArm['internal']['owner']['row'];
			
		}
		#get owner_user_id (close)
		
		#validation: is user active and existent?
		if(1==1){ ///4
			
			#mysql (open)
			if(1==1){
				
				$function_myOfficeArm['internal']['validation_of_user']['query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_users_extended
					WHERE usersext_id = %s;',
					$function_myOfficeArm['output']['owner_user_id']
				);
				$function_myOfficeArm['internal']['validation_of_user']['row'] = $GLOBALS['wpdb']->get_row($function_myOfficeArm['internal']['validation_of_user']['query']);
				
			}
			#mysql (close)
			
			#user doesn't exist (open)
			if(empty($function_myOfficeArm['internal']['validation_of_user']['row'])){
				
				$function_myOfficeArm['internal']['redirect_to_current_user_profile'] = 'yes';
				
			}
			#user doesn't exist (close)
			
			#user status (open)
			else{
				
				$function_myOfficeArm['output']['owner_user_status'] = $function_myOfficeArm['internal']['validation_of_user']['row']->usersext_status;
				
			}
			#user status (close)
			
		}
		#validation: is user active and existent?
		
	}
	#profile owner id and status (close)
	
	#user roles (open)
	if(1==1){ ///5
		
		#owner (open)
		if($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $function_myOfficeArm['output']['owner_user_id']){
			
			$function_myOfficeArm['output']['role_array'][] = 'owner';
			
		}
		#owner (close)
		
		#web_developer_or_human_resources_officer (open)
		if(1==1){
			
			#
			if(array_intersect(
				['Voluno Web Developer','Voluno Human Resources Officer'],
				$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['accepted']
			)){
				
				$function_myOfficeArm['output']['role_array'][] = 'web_developer_or_human_resources_officer';
			   
			}
			#
			
		}
		#web_developer_or_human_resources_officer (close)
		
		#agent (open)
		if(1==1){
			
			#
			if(in_array(
				'Agent;'.$function_myOfficeArm['output']['owner_user_id'],
				$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['accepted']
			)){
				
				$function_myOfficeArm['output']['role_array'][] = 'agent';
			   
			}
			#
			
		}
		#agent (close)
		
		#blocked (open)
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
					
					$function_userRelSta['array'] = [$function_myOfficeArm['output']['owner_user_id']]; // Optional. Default is an array of all users. Must be an array ( -> [...] <-).
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
					#     $function_userRelSta['draft']
					#     $function_userRelSta['paused']
					#     $function_userRelSta['locked']
					#     $function_userRelSta['deleted']
					#
					# $function_userRelSta['contacts'] // All not blocked contacts
					# $function_userRelSta['blocked'] // All blocked contacts
					#     not yet programmed: $function_userRelSta['blocked_by_this_user']
					#     not yet programmed: $function_userRelSta['blocked_by_other_user']
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
			
			#check (open)
			if(in_array($function_myOfficeArm['output']['owner_user_id'],$function_userRelSta['blocked'])){
				
				$function_myOfficeArm['output']['role_array'][] = 'blocked';
				
				#
				if(!in_array('web_developer_or_human_resources_officer',$function_myOfficeArm['output']['role_array'])){
					// only web developers and HR officers are immune to blocking.
					
					$function_myOfficeArm['internal']['redirect_to_current_user_profile'] = 'yes';
					
				}
				#
				
			}
			#check (close)
			
		}
		#blocked (close)
		
		#visitor (open)
		if(empty($function_myOfficeArm['output']['role_array'])){
			
			$function_myOfficeArm['output']['role_array'][] = 'visitor';
		   
		}
		#visitor (close)
		
	}
	#user roles (close)
	
	#top page menu (open)
	if(1==1){ ///6
		
		#function-tabs.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_tabs['tab_set_id'] = 1;// Either use a stored preset of menu items (see php file) or add the items here.
				
				#user is owner (open)
				if($function_myOfficeArm['output']['owner_user_id'] == $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id']){
					
					#$function_tabs['tabs_array'][] = [
					#	'link' => get_permalink(814).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
					#	'display' => "Overview",
					#	'title' => "My office overview"
					#];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(696).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "My Messages",
						'title' => "View all of your messages"
					];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(686).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "My Profile",
						'title' => "View and edit your profile"
					];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(748).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "My Contacts",
						'title' => "View all of your contacts"
					];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(756).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "My Positions",
						'title' => "View your current positions"
					];
					#$function_tabs['tabs_array'][] = [
					#	'link' => get_permalink(806).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
					#	'display' => "My Ratings",
					#	'title' => "Give us your feedback"
					#];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(770).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "My Settings",
						'title' => "Adjust your personal settings"
					];
					
				}
				#user is owner (close)
				
				#other (open)
				elseif( // If user is agent (1) or hr-person (2) or webside-developer (3)
					array_intersect(
						$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['accepted'],
						['Agent;'.$function_myOfficeArm['output']['owner_user_id'],'Voluno Human Resources Officer', 'Voluno Web Developer']
					)
				){
					
					#$function_tabs['tabs_array'][] = [
					#	'link' => get_permalink(814).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
					#	'display' => "Overview",
					#	'title' => "My office overview"
					#];
					#$function_tabs['tabs_array'][] = [
					#	'link' => get_permalink(696).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
					#	'display' => "My Messages",
					#	'title' => "View all of your messages"
					#];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(686).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "User Profile",
						'title' => "View user profile"
					];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(748).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "User Contacts",
						'title' => "View all contacts of the user"
					];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(756).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "User Positions",
						'title' => "View positions of the user"
					];
					#$function_tabs['tabs_array'][] = [
					#	'link' => get_permalink(806).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
					#	'display' => "My Ratings",
					#	'title' => "Give us your feedback"
					#];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(770).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "User Settings",
						'title' => "Adjust the user's personal settings"
					];
					$function_tabs['tabs_array'][] = [
						'link' => get_permalink(5079).'?user_id='.substr($function_myOfficeArm['output']['owner_user_id'],strlen('usersext_id_')),
						'display' => "Agent Workspace",
						'title' => "Information and options for agents"
					];
					
				}
				#other (close)
				
				#get active tab (open)
				for($amk=0;$amk<count($function_tabs['tabs_array']);$amk++){
					
					#
					if(get_the_ID() == url_to_postid($function_tabs['tabs_array'][$amk]['link'])){
						
						$function_tabs['active_tab'] = $function_tabs['tabs_array'][$amk]['display'];
						
					}
					#
					
				}
				#get active tab (close)
				
			}
			#input (close)
			
			include('#function-tabs.php');
			
			#output (open)
			if(1==1){
				
				$function_myOfficeArm['output']['tab_menu'] = $function_tabs['tabs'];
				
			}
			#output (close)
			
		}
		#function-tabs.php (v1.0) (close)
		
	}
	#top page menu (close)
	
	#function-redirect.php (v1.0) (open) ///7
	if($function_myOfficeArm['internal']['redirect_to_current_user_profile'] == 'yes'){
		
		#documentation (open)
		if(1==1){
			
			// Redirects to another page. Prevents further loading of content.
			// This prevents hackers from stopping the redirect by disabling javascript.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_redirect['redirect_url'] = get_permalink(686);// url to redirect to. If none is given, homepage is used.
			
		}
		#input (close)
		
		include('#function-redirect.php');
		
		#no output
		
	}
	#function-redirect.php (v1.0) (close)
	
}
#processes (close)

#output (open)
if(1==1){
	
	$function_myOfficeArm = $function_myOfficeArm['output'];
	
}
#output (close)

?>