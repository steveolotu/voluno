<?php

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
        
        echo $function_myOfficeArm['tab_menu']; // Tab menu.
        
        # $function_myOfficeArm['owner_user_id'] //id of the owner of the user profile
        # $function_myOfficeArm['owner_user_object']  //display name of owner of the user profile
        
        # var_dump($function_myOfficeArm['role_array']); // array of user roles
        # roles:
        # - 'owner' (the current user is the one the pages belong to)
        # - 'agent' (the current user is the agent of the owner)
        # - 'blocked' (the current user is a blocked contact of the owner)
        # - 'web_developer_or_human_resources_officer' (the current user can see everything)
        # - 'visitor' (the current user has no relationship to the current user but also has no special rights)
        
        # $function_myOfficeArm['error']['owner_doesnt_exist'];
        # $function_myOfficeArm['owner_user_status'];
        
    }
    #output (close)
    
}
#function-my-office-arm.php (v1.0) (close)

#mysql (open)
if(1==1){
	
}
#mysql (close)

#jquery (open)
if(1==1){
	
	echo '
	<script>
		jQuery(document).ready(function(){';
		
		#update browser title (my profile -> name) (open)
		if($profile_page_owner == "no"){
			
			echo '
			jQuery(document).attr("title", "Voluno | '.$profile_page_owner_row->usersext_displayName.'");';
			
		}
		#update browser title (my profile -> name) (close)
		
		echo '
		});
	</script>';
	
}
#jquery (close)

#content (open)
if(1==1){
	
	#agents and developers (open)
	if(
		array_intersect(
			
			['Voluno Web Developer','Voluno Human Resources Officer'],
			$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['accepted']
		)
	){
		
		#mysql (open)
		if(1==1){
			
			#update (open)
			if(!empty($_POST)){
				
				$post_data = $_POST;
				
				#validation and sanitization (open)
				if(1==1){
					
					$valid_user_status_array = [
						'active',
						'draft',
						'paused',
						'locked',
						'deleted'
					];
					
				}
				#validation and sanitization (close)
				
				#user status (open)
				if(in_array($post_data['user_status'],$valid_user_status_array)){
					
					#database query update (open)
					if(1==1){
					   
						$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_status' => $post_data['user_status'],
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_id']
							),
							array( //format of updated content
								'%s'
							),
							array( //format of location of updated content
								'%d'
							)
						);
						
					}
					#database query update (close)
					
				}
				#user status (close)
				
			}
			#update (close)
			
		}
		#mysql (close)
		
		#content (open)
		if(1==1){
			
			var_dump($_POST);
			$user_status_content = '
			<form method="post" action="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_id'].'">
				Status:
				<br>
				<select name="user_status">
					<option value="active">
						Active - User account is fully functional and ready for use
					</option>
					<option value="draft">
						Inactive - User account is not yet ready and disconnected from the system
					</option>
					<option value="paused">
						Paused - The user has temporarily deactivated his or her account
					</option>
					<option value="blocked">
						Locked - User account is currently being reviewed by Voluno staff for possible violation of terms and conditions
					</option>
					<option value="deleted">
						Deleted - User account is currently pending deletion
					</option>
				</select>
				<br>
				<input type="submit">
			</form>';
			
			$function_accordion['array'][] = [
				'title' => 'User status',
				'content' => $user_status_content
			];
			
		}
		#content (close)
		
	}
	#agents and developers (close)
	
	#developers only (open)
	if(
		array_intersect(
			['Voluno Web Developer','Voluno Human Resources Officer'],
			$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['accepted']
		)
	){
		
		#mysql update (open)
		if(1==1){
			
			#update status (open)
			if(!empty($_POST['user_options_status'])){
				
				#database query update (open)
				if(in_array($_POST['user_options_status'],['active','draft','paused','locked'])){
				   
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_users_extended',
						array( //updated content
							'usersext_status' => $_POST['user_options_status'],
						),
						array( //location of updated content
							'usersext_id' => $function_myOfficeArm['owner_user_id']
						),
						array( //format of updated content
							'%s'
						),
						array( //format of location of updated content
							'%s'
						)
					);
					
					$refresh_page = 'yes';
					
				}
				#database query update (close)
				
				#delete user (open)
				elseif($_POST['user_options_status'] == 'deleted' AND $function_myOfficeArm['owner_user_object']->usersext_status != 'deleted'){
					
					#function-user-delete.php (v1.0) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_userdelete['type'] = 'preliminary';// 'permanent','preliminary' (default). Preliminary only changes the status and creates a
							$function_userdelete['user'] = $function_myOfficeArm['owner_user_id'];
							// cronjob for final deletion.
							
						}
						#input (close)
						
						include('#function-user-delete.php');
						
						#output (open)
						if(1==1){
							
							#echo $function_cronjobs['xxx']; // Explanation of the output variable.
							
						}
						#output (close)
						
					}
					#function-user-delete.php (v1.0) (close) 
					
				}
				#delete user (close)
				
			}
			#update status (close)
			
			#function-redirect.php (v1.0) (open)
			if($refresh_page == 'yes'){
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					// This prevents hackers from stopping the redirect by disabling javascript.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_redirect['redirect_url'] = get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida;// url to redirect to. If none is given, homepage is used.
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close) 
			
		}
		#mysql update (close)
		
		#status (open)
		if(1==1){
			
			#select options (open)
			if(1==1){
				
				#status (open)
				if(1==1){
					
					$user_status_array = [
						'status'=>['active','draft','paused','locked','deleted'],
						'display'=>['active','draft','paused','locked','deleted (please "undelete" manually)']
					];
					
					unset($user_status_select_options);
					
					#loop to find selected option (open)
					for($amj=0;$amj<count($user_status_array['status']);$amj++){
						
						#
						if($function_myOfficeArm['owner_user_object']->usersext_status == $user_status_array['status'][$amj]){
							
							$user_status_select_options_selected['option_tag'] = 'selected';
							$user_status_select_options_selected['text'] = ' (selected)';
							
						}else{
							
							unset($user_status_select_options_selected);
							
						}
						#
						
						$user_status_select_options .= '
						<option value="'.$user_status_array['status'][$amj].'" '.$user_status_select_options_selected['option_tag'].'>
							'.$user_status_array['display'][$amj].$user_status_select_options_selected['text'].'
						</option>';
						
					}
					#loop to find selected loop (close)
					
				}
				#status (close)
				
				#current positions (open)
				if(1==1){
					
					#function-user-positions-get.php (v1.7) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_userpositions_get['user id'] = $function_myOfficeArm['owner_user_id']; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
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
							#       $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
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
					#function-user-positions-get.php (v1.7) (close) 
					
					unset($current_positions_options);
					
					#loop (open)
					for($amj=0;$amj<count($function_userpositions_get['unsorted list']);$amj++){
						
						$current_positions_options .= '
						<option value="'.$function_userpositions_get['unsorted list'][$amj]['application_id'].'">
							'.$function_userpositions_get['unsorted list'][$amj]['position'].'
						</option>';
						
					}
					#loop (close)
					
				}
				#current positions (close)
				
				#NGO ID (open)
				if(1==1){
					
					#query (open)
					if(1==1){
						
						$ngos_for_position_update['query'] = $GLOBALS['wpdb']->prepare(
							'SELECT *
							FROM fi4l3fg_voluno_development_organizations
							ORDER BY ngo_name ASC;'
						);
						
						$ngos_for_position_update['results'] = $GLOBALS['wpdb']->get_results($ngos_for_position_update['query']);
						
					}
					#query (close)
					
					unset($ngos_for_position_update['select']);
					
					#loop (open)
					for($amj=0;$amj<count($ngos_for_position_update['results']);$amj++){
						
						$ngos_for_position_update['select'] .= '
						<option value="'.$ngos_for_position_update['results'][$amj]->ngo_id.'">
							'.$ngos_for_position_update['results'][$amj]->ngo_name.'
						</option>';
						
					}
					#loop (close)
					
				}
				#NGO ID (close)
				
				#user_id (open)
				if(1==1){
					
					#query (open)
					if(1==1){
						
						$userids_for_position_update['query'] = $GLOBALS['wpdb']->prepare(
							'SELECT *
							FROM fi4l3fg_voluno_users_extended
							ORDER BY usersext_displayName ASC;'
						);
						
						$userids_for_position_update['results'] = $GLOBALS['wpdb']->get_results($userids_for_position_update['query']);
						
					}
					#query (close)
					
					unset($userids_for_position_update['select']);
					
					#loop (open)
					for($amj=0;$amj<count($userids_for_position_update['results']);$amj++){
						
						$userids_for_position_update['select'] .= '
						<option value="'.$userids_for_position_update['results'][$amj]->usersext_id.'">
							'.$userids_for_position_update['results'][$amj]->usersext_displayName.'
						</option>';
						
					}
					#loop (close)
					
				}
				#user_id (close)
				
			}
			#select options (close)
			
			$developers_only_content .= '
			<div style="border:1px solid black;border-radius:20px;padding:10px;margin:20px;">
				<h4>
					Edit user positions
				</h4>
				<form
					method="post"
					action="'.get_permalink().'"
					autocomplete="off"
				>
					
					<div>
						Status:
						<select name="user_options_status">
							'.$user_status_select_options.'
						</select>
					</div>
					<div>
						Remove position:
						<select name="user_options_status">
							'.$current_positions_options.'
						</select>
					</div>
					'./*
					
					<div>
						Add position:
						<select name="user_options_addPosition">
							'.'
						</select>
						
						<div class="user_options_addPosition_NgoId">
							If NGO position, add NGO ID
							<select name="user_options_addPosition_NgoId">
								'.$ngos_for_position_update['select'].'
							</select>
						</div>
						
						<div class="user_options_addPosition_UserId">
							If specific agent, add user ID
							<select name="user_options_addPosition_UserId">
								'.$userids_for_position_update['select'].'
							</select>
						</div>
					</div>
					*/'
					<input type="submit" value="Submit">
				</form>
			</div>';
			
		}
		#status (close)
		
		#function-fulluseroverview.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_fulluseroverview['user_id'] = $function_myOfficeArm['owner_user_id']; // User id or 'current_user' (default). The user who's information will be displayed.
				echo $function_myOfficeArm['owner_user_id'];
			}
			#input (close)
			
			include('#function-fulluseroverview.php');
			
			#output (open)
			if(1==1){
				
				$developers_only_content .= $function_fulluseroverview['content']; // Entire output.
				
			}
			#output (close)
			
		}
		#function-fulluseroverview.php (v1.0) (close)
		
		$function_accordion['array'][] = [
			'title' => 'Developers and HR only section',
			'content' => $developers_only_content
		];
		
	}
	#developers only (close)
	
	#function-accordion.php (v1.1) (open)
	if(1==1){
		
		#documentation (open)
		if(1==1){
			
			// Classical accordion function. Hides text paragraphs and shows only headings,
			// which make the whole page structure very clear and allows the user what to read first.
			// By clicking on the different headings, the user can extend the text beneath it.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			// Add one entry for every section you want to use.
			
			//Content is created before this function, see above.
			
		}
		#input (close)
		
		include('#function-accordion.php');
		
		#output (open)
		if(1==1){
			
			echo $function_accordion['content'];
			
		}
		#output (close)
		
	}
	#function-accordion.php (v1.1) (close)
	
}
#content (close)

?>