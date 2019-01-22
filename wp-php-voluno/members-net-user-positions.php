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
        # $function_myOfficeArm['owner_user_displayName'] //display name of owner of the user profile
        
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
	
	#get before update (open)
	if(1==1){
		
		#function-user-positions-get.php (v1.3) (open)
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
		#function-user-positions-get.php (v1.3) (close) 
		
	}
	#get after update (close)
	
	#update (open)
	if(!empty($_POST)){
		
		$volunteer_position_mysql_update['position_name'] = $_POST['form_volunteer_position'];
		$volunteer_position_mysql_update['action'] = $_POST['form_volunteer_action'];
		
		#volunteer (open)
		if(1==1){
			
			#activation positions (open)
			if(in_array($volunteer_position_mysql_update['position_name'],['Volunteer Worker','Volunteer Trainer','Volunteer Advisor','Volunteer Recruiter'])){
				
				#activate position(open)
				if($volunteer_position_mysql_update['action'] == 'activate'){
					
					#function-user-position-update.php (v1.1) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Allows developers to add, modify or remove the main user positions.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_userpositions_update['user_id'] = 'current_user'; //obligatory. Integer or 'current_user' to use current user.
							
							// To set up the function correctly, please look up the 'Technical feature: User positions'.
								$function_userpositions_update['position_pure'] = $volunteer_position_mysql_update['position_name'];
								#$function_userpositions_update['position_additional_information'] = '';
								#$function_userpositions_update['appliation text'] = '';
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
				#activate position (close)
				
				#deactivate position (open)
				elseif($volunteer_position_mysql_update['action'] == 'deactivate'){
					
					#function-user-position-update.php (v1.1) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Allows developers to add, modify or remove the main user positions.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_userpositions_update['user_id'] = 'current_user'; //obligatory. Integer or 'current_user' to use current user.
							
							// To set up the function correctly, please look up the 'Technical feature: User positions'.
								$function_userpositions_update['position_pure'] = $volunteer_position_mysql_update['position_name'];
								#$function_userpositions_update['position_additional_information'] = '';
								#$function_userpositions_update['appliation text'] = '';
									// Optional. Is automatically sanitized into "plain text with line breaks (biography)".
								$function_userpositions_update['new status'] = 'delete';
									// Obligatory. 'accepted', 'pending' or 'delete' the latter deletes the entry.
							
						}
						#input (close)
						
						include('#function-user-positions-update.php');
						
						//no output
						
					}
					#function-user-position-update.php (v1.1) (close) 
					
				}
				#deactivate position (close)
				
			}
			#activation positions (close)
			
			#application positions (open)
			if(1==2){ #in_array($volunteer_position_mysql_update['position_name'],['Volunteer Worker','Volunteer Trainer','Volunteer Advisor','Volunteer Recruiter'])){
				###
				#activate position(open)
				if($volunteer_position_mysql_update['action'] == 'activate'){
					
					#function-user-position-update.php (v1.1) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Allows developers to add, modify or remove the main user positions.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_userpositions_update['user_id'] = 'current_user'; //obligatory. Integer or 'current_user' to use current user.
							
							// To set up the function correctly, please look up the 'Technical feature: User positions'.
								$function_userpositions_update['position_pure'] = $volunteer_position_mysql_update['position_name'];
								#$function_userpositions_update['position_additional_information'] = '';
								#$function_userpositions_update['appliation text'] = '';
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
				#activate position (close)
				
				#deactivate position (open)
				elseif($volunteer_position_mysql_update['action'] == 'deactivate'){
					
					#function-user-position-update.php (v1.1) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Allows developers to add, modify or remove the main user positions.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_userpositions_update['user_id'] = 'current_user'; //obligatory. Integer or 'current_user' to use current user.
							
							// To set up the function correctly, please look up the 'Technical feature: User positions'.
								$function_userpositions_update['position_pure'] = $volunteer_position_mysql_update['position_name'];
								#$function_userpositions_update['position_additional_information'] = '';
								#$function_userpositions_update['appliation text'] = '';
									// Optional. Is automatically sanitized into "plain text with line breaks (biography)".
								$function_userpositions_update['new status'] = 'delete';
									// Obligatory. 'accepted', 'pending' or 'delete' the latter deletes the entry.
							
						}
						#input (close)
						
						include('#function-user-positions-update.php');
						
						//no output
						
					}
					#function-user-position-update.php (v1.1) (close) 
					
				}
				#deactivate position (close)
				
			}
			#application positions (close)
			
		}
		#volunteer (close)
		
		#NGO worker (open)
		if(1==1){
			
			#function-ngo-add.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// This function has two parts:
					//    - The mysql update part
					//    - The content part (including jquery)
					// It must be included twice, once in the update section and once in the content (since, sometimes, the update isn't always called).
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_ngoadd['section'] = 'mysql update';  //'mysql update' or 'form'. If not given, function is deactivated.
					
					# Only relevant for 'mysql update' section:
						#$function_ngoadd['ngo admin user id'] = ; // Default: current user id. User who will become admin of the NGO.
							#todolist: this feature doesn't work yet since it needs to be in the
							#post and we need a function which prevents post data manipulation.
							# Currently, it's always the current user.
						$function_ngoadd['redirect to ngo profile'] = 'no'; //optional, 'yes' (default) or 'no'
					
					include('#function-ngo-add.php');
					
					#output
					#$function_ngoadd['content']; // Only if the section is 'form'.
					
				}
				#input (close)
				
			}
			#function-ngo-add.php (v1.0) (close) 
			
		}
		#NGO worker (close)
		
		#staff (open)
		if(1==1){
			
			#staff member -> end staff status (open)
			if(
			   $function_userpositions_get['sorted list']['Voluno Staff Member']['status'] == 'accepted'
			   AND
			   $_POST['staff_application_apply_mysql_delete'] == 1
			){
				
				#function-user-position-update.php (v1.1) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Allows developers to add, modify or remove the main user positions.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_userpositions_update['user_id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id; //obligatory. Integer or 'current_user' to use current user.
						
						// To set up the function correctly, please look up the 'Technical feature: User positions'.
							$function_userpositions_update['position_pure'] = 'Voluno Staff Member';
							#$function_userpositions_update['position_additional_information'] = '';
							#$function_userpositions_update['appliation text'] = '';
								// Optional. Is automatically sanitized into "plain text with line breaks (biography)".
							$function_userpositions_update['new status'] = 'delete';
								// Obligatory. 'accepted', 'pending' or 'delete' the latter deletes the entry.
						
					}
					#input (close)
					
					include('#function-user-positions-update.php');
					
					//no output
					
				}
				#function-user-position-update.php (v1.1) (close) 
				
			}
			#staff member -> end staff status (close)
			
			#application pending -> withdraw application (open)
			elseif(
			   $function_userpositions_get['sorted list']['Voluno Staff Member']['status'] == 'pending'
			   AND
			   $_POST['staff_application_apply_mysql_withdraw'] == 1
			){
				
				#function-user-position-update.php (v1.1) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Allows developers to add, modify or remove the main user positions.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_userpositions_update['user_id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id; //obligatory. Integer or 'current_user' to use current user.
						
						// To set up the function correctly, please look up the 'Technical feature: User positions'.
							$function_userpositions_update['position_pure'] = 'Voluno Staff Member';
							#$function_userpositions_update['position_additional_information'] = '';
							#$function_userpositions_update['appliation text'] = '';
								// Optional. Is automatically sanitized into "plain text with line breaks (biography)".
							$function_userpositions_update['new status'] = 'delete';
								// Obligatory. 'accepted', 'pending' or 'delete' the latter deletes the entry.
						
					}
					#input (close)
					
					include('#function-user-positions-update.php');
					
					//no output
					
				}
				#function-user-position-update.php (v1.1) (close) 
				
			}
			#application pending -> withdraw application (close)
			
			#no application yet -> apply (open)
			elseif($_POST['staff_application_apply_mysql_activation'] == 1){
				
				#function-user-position-update.php (v1.1) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Allows developers to add, modify or remove the main user positions.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_userpositions_update['user_id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id; //obligatory. Integer or 'current_user' to use current user.
						
						// To set up the function correctly, please look up the 'Technical feature: User positions'.
							$function_userpositions_update['position_pure'] = 'Voluno Staff Member';
							#$function_userpositions_update['position_additional_information'] = '';
							$function_userpositions_update['appliation text']
								= $_POST['staff_application_apply_text_intro_motivation_background'].
								' - '.$_POST['staff_application_apply_text_contact_details_and_time_suggestions'];;
								// Optional. Is automatically sanitized into "plain text with line breaks (biography)".
							$function_userpositions_update['new status'] = 'pending';
								// Obligatory. 'accepted', 'pending' or 'delete' the latter deletes the entry.
						
					}
					#input (close)
					
					include('#function-user-positions-update.php');
					
					//no output
					
				}
				#function-user-position-update.php (v1.1) (close) 
				
				#function-add-new-message.php (v1.0) (open)
				if(1==1){
					
					#todolist: check the function as such and this speciifc use of the function.
					#conversation id – add all conversation partners to the array, gets ordered
						$function_add_new_message__partner_id_array = '1';
						#$function_add_new_message__messsage_author_id = '154'; //yesha //default (empty): current user (id loaded automatically)
						#$function_add_new_message__max_recipients = 10; //default:10, max number or recipients. number or “unlimited”
					#message data – all will be sanitized
						#$function_add_new_message__message_sanitization = “”; //sanitization code or “none”, default (empty): “plain text with line breaks (biography)”
						$function_add_new_message__message_content = 'Someone just applied to become a Voluno staff member! Please attend!';
						#$function_add_new_message__attachments = ; //default: empty, array of attachment filenames
					include('#function-add-new-message.php');
					
					#output:
						#$function_add_new_message['conversation_id']
					
				}
				#function-add-new-message.php (v1.0) (close)
				
			}
			#no application yet -> apply (close)
			
		}
		#staff (close)
		
		$update_occured = 'yes';
		
	}
	#update (close)
	
	#get after update (open)
	if($update_occured == 'yes'){
		
		#function-user-positions-get.php (v1.3) (open)
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
		#function-user-positions-get.php (v1.3) (close) 
		
	}
	#get after update (close)
	
}
#mysql (close)

#content (open)
if(1==1){
	
	#pers pages + img + title + introduction text + link to orientation guide (open)
	if(1==1){
		
		#function-image-processing.php (v1.0) (open)
		if(1==1){
			
			#thematic only
				$function_propic__type = 'thematic';
				$function_propic__original_img_name = 'positions.jpg';
				$function_propic__cropping = 'yes'; //yes or empty (default)
				
			#profile picture
				#$function_propic__type = 'profile picture';
				#$function_propic__user_id = $profile_page_owner_row->usersext_id;
				
			#ngo logo
				#$function_propic__type = 'ngo logo';
				#$function_propic__ngo_id = 4;
				
			#all
				$function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
				#$function_propic__rotate = 180; //optional, default: 0
				
			include('#function-image-processing.php');
			
			# $function_propic;
			#$function_propic__image_available <- is set to yes or no
			
		}
		#function-image-processing.php (v1.0) (close)
		
		echo '
		<div style="height:240px;">
			<img class="voluno_header_picture" src="'.$function_propic.'">
			<div style="text-align:center;margin-bottom:30px;">
				<h1 style="display:inline;">
					My positions
				</h1>
			</div>
			<p>
				On this page, you can see all available positions and which positions you have.'.
				#<br>
				#<br>
				#There are several different positons in Voluno.
				#Click
				#<a
				#href="'.get_permalink(794).'?subsection=4"
				#title="Click to visit Orientation Guide page on Voluno positions"
				#>
				#here
				#</a>
				#for a comprehensive overview and explanation.
				'
			</p>
		</div>';
		
	}
	#pers pages + img + title + introduction text + link to orientation guide (close)

	#preparation (open)
	if(1==1){
		
		#top positions array (open)
		if(1==1){
			
			// The array fields used are:
			//  position: Display name of position
			
			#Volunteer (open)
			if(1==1){
				
				#expansion area (open)
				if(1==1){
					
					#Volunteer Worker (open)
					if(1==1){
						
						#var_dump($function_userpositions_get['sorted list']['Volunteer Worker']); ###
						
						$volunteer_positions_form_array[] = [
							'name' => 'Volunteer Worker',
							'text' => 'Donate your time and skills to development organizations by working on tasks.',
							'type' => 'activation',
							'status' => $function_userpositions_get['sorted list']['Volunteer Worker']['status'] 
						]; 
						
					}
					#Volunteer Worker (close)
					
					#Volunteer Trainer (open)
					if(1==2){
						
						$volunteer_positions_form_array[] = [
							'name' => 'Volunteer Trainer',
							'type' => 'activation',
							'status' => $function_userpositions_get['sorted list']['Volunteer Trainer']['status'] 
						]; 
						
					}
					#Volunteer Trainer (close)
					
					#Volunteer Advisor (open)
					if(1==2){
						
						$volunteer_positions_form_array[] = [
							'name' => 'Volunteer Advisor',
							'type' => 'activation',
							'status' => $function_userpositions_get['sorted list']['Volunteer Advisor']['status'] 
						]; 
						
					}
					#Volunteer Advisor (close)
					
					#Volunteer Recruiter (open)
					if(1==2){
						
						$volunteer_positions_form_array[] = [
							'name' => 'Volunteer Recruiter',
							'type' => 'activation',
							'status' => $function_userpositions_get['sorted list']['Volunteer Recruiter']['status'] 
						]; 
						
					}
					#Volunteer Recruiter (close)
					
					#Agent (open)
					if(1==2){
						
						#var_dump($function_userpositions_get['sorted list']['Volunteer Worker']); ###
						
						$volunteer_positions_form_array[] = [
							'name' => 'Agent',
							'type' => 'application',
							'status' => $function_userpositions_get['sorted list']['Agent']['status'] 
						]; 
						
					}
					#Agent (close)
					
					#loop (open)
					for($alm=0;$alm<count($volunteer_positions_form_array);$alm++){
						
						#application and activation (open)
						if(1==1){
							
							#activation (open)
							if($volunteer_positions_form_array[$alm]['type'] == 'activation'){
								
								#status: active (open)
								if($volunteer_positions_form_array[$alm]['status'] == 'accepted'){
									
									$volunteer_position_status_array['form'] = '
									<div class="voluno_form_positions_button voluno_button">
										Deactivate position
										<form action="'.get_permalink().'" method="post" class="voluno_form_positions_form">
											<input type="hidden" name="form_volunteer_position" value="'.$volunteer_positions_form_array[$alm]['name'].'">
											<input type="hidden" name="form_volunteer_action" value="deactivate">
										</form>
									</div>';
									
								}
								#status: active (close)
								
								#status: inactive (open)
								if(empty($volunteer_positions_form_array[$alm]['status'])){
									
									$volunteer_position_status_array['form'] = '
									<div class="voluno_form_positions_button voluno_button">
										Activate position
										<form action="'.get_permalink().'" method="post" class="voluno_form_positions_form">
											<input type="hidden" name="form_volunteer_position" value="'.$volunteer_positions_form_array[$alm]['name'].'">
											<input type="hidden" name="form_volunteer_action" value="activate">
										</form>
									</div>';
									
								}
								#status: inactive (close)
								
							}
							#activation (close)
							
							#application (open)
							if($volunteer_positions_form_array[$alm]['type'] == 'application'){
								
								$volunteer_position_status_array =
								[
									'status' => '
									apply.
									'#$volunteer_positions_form_array[$alm]['status']
								];
								
							}
							#application (close)
							
						}
						#application and activation (open)
						
						#colors and status (open)
						if($volunteer_positions_form_array[$alm]['status'] == 'accepted'){
							
							$volunteer_position_status_array['color'] = '#FFEAB9';
							$volunteer_position_status_array['status'] = 'active';
							$volunteer_position_status_array['status-color'] = '#006F00';
							
						}elseif($volunteer_positions_form_array[$alm]['status'] == 'pending'){
							
							$volunteer_position_status_array['color'] = '#FF9B51';
							$volunteer_position_status_array['status'] = 'pending';
							$volunteer_position_status_array['status-color'] = '#8B0000';
							
						}else{
							
							$volunteer_position_status_array['color'] = '#DBDBDB';
							$volunteer_position_status_array['status'] = 'inactive';
							$volunteer_position_status_array['status-color'] = '#000';
							
						}
						#colors and status (close)
						
						$expansion_area['volunteer'] .= '
						<tr style="background-color:'.$volunteer_position_status_array['color'].';">
							<td style="vertical-align:middle;padding-left:10px;">
								<b>
									'.$volunteer_positions_form_array[$alm]['name'].'
									('.
									'<span style="color:'.$volunteer_position_status_array['status-color'].'">'.
										$volunteer_position_status_array['status'].
									'</span>'.
									')
								</b>
								<br>
								'.$volunteer_positions_form_array[$alm]['text'].'
							</td>
							<td>
								'.$volunteer_position_status_array['form'].'
							</td>
						</tr>
						';
						
					}
					#loop (close)
					
					#var_dump($volunteer_positions_form_array);###
					
				}
				#expansion area (close)
				
				$top_positions_array[] = [
					'position' => 'Volunteer',
					'button_class' => 'volunteer_toppositions_button',
					'extension_area' => '<table>'.$expansion_area['volunteer'].'</table>',
					'button active' => 'Deactivate',
					'button inactive' => 'Click to activate'
				];
				
			}
			#Volunteer (close)
			
			#NGO worker (open)
			if(1==1){
				
				#expansion area (open)
				if(1==1){
					
					#function-ngo-add.php (v1.0) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// This function has two parts:
							//    - The mysql update part
							//    - The content part (including jquery)
							// It must be included twice, once in the update section and once in the content (since, sometimes, the update isn't always called).
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_ngoadd['section'] = 'form';  //'mysql update' or 'form'. If not given, function is deactivated.
							
							# Only relevant for 'mysql update' section:
								#$function_ngoadd['ngo admin user id'] = ; // Default: current user id. User who will become admin of the NGO.
									#todolist: this feature doesn't work yet since it needs to be in the
									#post and we need a function which prevents post data manipulation.
									# Currently, it's always the current user.
								#$function_ngoadd['redirect to ngo profile'] = 'no'; //optional, 'yes' (default) or 'no'
							
							# Only relevant for 'form' section:
								$function_ngoadd['p_style'] = 'text-align:center;'; //Optional, default: empty. Example: text-align:center;
							
							include('#function-ngo-add.php');
							
							#output
							$expansion_area['ngo worker'] = $function_ngoadd['form'];
							
						}
						#input (close)
						
					}
					#function-ngo-add.php (v1.0) (close) 
					
				}
				#expansion area (close)
				
				$top_positions_array[] = [
					'position' => 'NGO Member',
					'button_class' => 'ngo_worker_toplevel_button',
					'extension_area' => $expansion_area['ngo worker'],
					'button active' => 'Deactivate',
					'button inactive' => 'Click to activate'
				];
				
			}
			#NGO worker (close)
			
			#Staff (open)
			if(1==1){
				
				#expansion area (open)
				if(1==1){
					
					#already staff member (open)
					if($function_userpositions_get['sorted list']['Voluno Staff Member']['status'] == 'accepted'){
						
						#text and form (open)
						if(1==1){
							
							#function-timezone.php (v1.0) (open)
							if(1==1){
								$function_timezone = $function_userpositions_get['sorted list']['Voluno Staff Member']['application_date_modified'];
								#$function_timezone_reference = “”; //reference time, default:empty, only relevant for time difference
								#$function_timezone_wording = “left”; //default: “in x days”, left: “x days left”, only relevant for time difference
								$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
								//”datetime (weekday long hour min sec)”,”date (long)”,”date (short)”,”date (weekday long)”,
								//”date (weekday short)”,”time (hour min sec)”,”time (hour min)”, “time difference (short)”
								include('#function-timezone.php');
								#output:
								#$function_timezone
							}
							#function-timezone.php (v1.0) (close)
							
							$expansion_area['staff'] = '
							<form method="post" class="form_staff_application_delete">
								<p>
									Your application to become a Voluno Staff Member was accepted '.$function_timezone.'.
								</p>
								<p>
									If you no longer wish to be a staff member, you can end your staff membership with the button below.
									<br>
									This means that you will loose all your staff positions. However, this will not influence
									your other Voluno positions (like Volunteer or NGO Worker), if you have any.
								<br>
								<div class="voluno_button voluno_submit_staff_application_delete">
									End staff membership
								</div>
								<input type="hidden" value="1" name="staff_application_apply_mysql_delete">
							</form>
							';
							
						}
						#text and form (close)
						
					}
					#already staff member (close)
					
					#application pending (open)
					elseif($function_userpositions_get['sorted list']['Voluno Staff Member']['status'] == 'pending'){
						
						#text and form (open)
						if(1==1){
							
							#application text (open)
							if(!empty($function_userpositions_get['sorted list']['Voluno Staff Member']['application_text'])){
								
								$application_text = ['Here is the application text you wrote:',
								'<div
									style="
										padding:10px;
										margin:20px;
										background-color:#f7f7f7;
										cursor:not-allowed;
									"
								>
									'.$function_userpositions_get['sorted list']['Voluno Staff Member']['application_text'].'
								</div>
								'];
								
							}
							#application text (close)
							
							$expansion_area['staff'] = '
							<form method="post" class="form_staff_application_withdraw">
								<p>
									Your application to become a Voluno Staff Member is currently being processed.
									We will inform you as soon as we haved looked at it.
									'.$application_text[0].'
								</p>
								'.$application_text[1].'
								<p>
									If you no longer want this position, you can withdraw your application.
								</p>
								<br>
								<div class="voluno_button voluno_submit_staff_application_withdraw">
									Withdraw application
								</div>
								<input type="hidden" value="1" name="staff_application_apply_mysql_withdraw">
							</form>
							';
							
						}
						#text and form (close)
						
					}
					#application pending (close)
					
					#no application yet (open)
					else{
						
						#contact detail check (open)
						if(1==1){
							
							#none given (open)
							if(empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_phone) AND empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_skype)){
								
								$contact_details = 'Please provide your Skype name or your phone number, preferably both.
								If possible, however, we would prefer to talk via Skype.';
								
							}
							#none given (close)
							
							#only skype (open)
							elseif(empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_phone) AND !empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_skype)){
								
								$contact_details = 'Your Skype name is <b>'.$GLOBALS['voluno_variables']['current_user_extended']->usersext_skype.'<b>, right?
								Are you also reachable via phone, just in case? If so, what is your number?';
								
							}
							#only skype (close)
							
							#only phone (open)
							elseif(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_phone) AND empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_skype)){
								
								$contact_details = 'Your phone name is <b>'.$GLOBALS['voluno_variables']['current_user_extended']->usersext_phone.'<b>, right?
								If possible, we would prefer to talk via Skype. Do you also have a Skype name?';
								
							}
							#only phone (close)
							
							#both (open)
							elseif(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_phone) AND !empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_skype)){
								
								$contact_details = 'Your phone number is <b>'.$GLOBALS['voluno_variables']['current_user_extended']->usersext_phone.'</b>
								and your Skype name is <b>'.$GLOBALS['voluno_variables']['current_user_extended']->usersext_skype.'</b> -
								is this correct? If not, please provide correct contact information.
								We would prefer to talk via Skype, but phone is also
								possible.';
								
							}
							#both (close)
							
						}
						#contact detail check (close)
						
						#text and form (open)
						if(1==1){
							
							$expansion_area['staff'] = '
							<form method="post" class="form_staff_application_apply">
								<p>
									Anyone can become a volunteer staff member. We are an open network and like to welcome members from varies backgrounds,
									countries, professional areas and cultures into our organization.
									<br>
									However, before you join our organization, we would like to get to know you a little bit.
								</p>
								<p>
									<ol>
										<li>
											Please introduce yourself.
										</li>
										<li>
											What is your motivation to join Voluno?
										</li>
										<li>
											Do you have a background in development or volunteering work? If so, please describe it.
										</li>
									</ol>
								</p>
								<textarea
									name="staff_application_apply_text_intro_motivation_background"
									style="width:70%;height:15em;"
									placeholder="Please introduce yourself, your motivation and anything else relevant for Voluno."
								>'.
								'</textarea>
								<p>
									After submitting this information, we would like to personally get to know you via a phone or Skype meeting
									in order to answer questions and to discuss how and where you can participate in the best way. '.$contact_details.'
									<br>
									Also, please suggest one or more dates (date + time) when you would be available for this meeting.
								</p>
								<textarea
									name="staff_application_apply_text_contact_details_and_time_suggestions"
									style="width:70%;height:5em;"
									placeholder="Please confirm/provide your correct contact details and give one or more date and time suggestions."
								>'.
								'</textarea>
								<br>
								<div class="voluno_button voluno_submit_staff_application_apply">
									Submit application
								</div>
								<input type="hidden" value="1" name="staff_application_apply_mysql_activation">
							</form>
							';
							
						}
						#text and form (close)
						
					}
					#no application yet (close)
					
				}
				#expansion area (close)
				
				$top_positions_array[] = [
					'position' => 'Voluno Staff Member',
					'button_class' => 'staff_toplevel_button',
					'extension_area' => $expansion_area['staff'],
					'button active' => 'Deactivate',
					'button inactive' => 'Click to apply'
				];
				
			}
			#Staff (close)
			
		}
		#top positions array (close)
		
	}
	#preparation (close)
	
	echo '
	Please select one position:
	<div style="text-align:center;">';
		
		#top positions loop (open)
		for($ajw=0;$ajw<count($top_positions_array);$ajw++){
			
			#check if position is activated and modify output (open)
			if(1==1){
				
				#if position is active (open)
				if(in_array($top_positions_array[$ajw]['position'],$function_userpositions_get['simple_pure_array']['accepted'])){
					
					$top_position['bg_color'] = 'FFEAB9';
					###$top_position['button_text'] = $top_positions_array[$ajw]['button active'];
					$top_position['status'] = ['Active','You have this position.'];
					$top_position['status_color'] = '006F00';
					
				}
				#if position is active (close)
				
				#if position is pending (open)
				elseif(in_array($top_positions_array[$ajw]['position'],$function_userpositions_get['simple_pure_array']['pending'])){
					
					$top_position['bg_color'] = 'FF9B51';
					###$top_position['button_text'] = $top_positions_array[$ajw]['button inactive'];
					$top_position['status'] = ['Pending','Your application for this position is currently being processed.&#13;'. 
											   'Please be patient, you will be informed as soon as a decision has been made.'];
					$top_position['status_color'] = '8B0000';
					
				}
				#if position is pending (close)
				
				#if position is inactive (open)
				else{
					
					$top_position['bg_color'] = 'DBDBDB';
					###$top_position['button_text'] = $top_positions_array[$ajw]['button inactive'];
					$top_position['status'] = ['Inactive','You don\'t have this position and haven\'t activated or applied for it.'];
					$top_position['status_color'] = '000';
					
				}
				#if position is inactive (close)
				
			}
			#check if position is activated and modify output (close)
			
			#content (open)
			if(1==1){
				
				echo 
				'<div class="voluno_top_positions_div" style="background-color:#'.$top_position['bg_color'].';">
					
					<h1 style="display:inline-block;margin:0px;white-space:nowrap;">
						'.$top_positions_array[$ajw]['position'].'
					</h1>
					
					<br>
					
					(Status:
					<span style="color:#'.$top_position['status_color'].';font-weight:bold;" title="'.$top_position['status'][1].'">
						'.$top_position['status'][0].
					'</span>)
					
					<br>
					
					<div class="topPositions_expansionArea" style="display:none;">
						'.$top_positions_array[$ajw]['extension_area'].'
					</div>
					
				</div>';
				
			}
			#content (close)
			
		}
		#top positions loop (close)
		
	echo '
	</div>';
	
}
#content (close)

#jquery (open)
if(1==1){
	
	echo '
	<script>
		jQuery(document).ready(function(){';
			
			#top positions (open)
			if(1==1){
				
				echo '
				var voluno_applications_topdiv_expand_time = 500;
				jQuery(".voluno_top_positions_div h1").toggle(function(){
					jQuery(this).closest(".voluno_top_positions_div").data("width", jQuery(this).closest(".voluno_top_positions_div").css("width"));
					jQuery(this).closest(".voluno_top_positions_div").animate({width: "80%"},voluno_applications_topdiv_expand_time);
					jQuery(this).closest(".voluno_top_positions_div").find(".topPositions_expansionArea").delay(voluno_applications_topdiv_expand_time)
						.slideToggle(voluno_applications_topdiv_expand_time);
				},function(){
					jQuery(this).closest(".voluno_top_positions_div").find(".topPositions_expansionArea").slideToggle(voluno_applications_topdiv_expand_time);
					jQuery(this).closest(".voluno_top_positions_div").delay(voluno_applications_topdiv_expand_time).animate({width: jQuery(this)
						.closest(".voluno_top_positions_div").data("width")},voluno_applications_topdiv_expand_time);
				});
				';
				
				#volunteer (open)
				if(1==1){
					
					echo '
					jQuery(".voluno_form_positions_button").click(function(){
						jQuery(this).find(".voluno_form_positions_form").submit();
					});
					';
					
				}
				#volunteer (close)
				
				#staff (open)
				if(1==1){
					
					echo '
					jQuery(".voluno_submit_staff_application_apply").click(function(){
						jQuery(".form_staff_application_apply").submit();
					});
					jQuery(".voluno_submit_staff_application_withdraw").click(function(){
						jQuery(".form_staff_application_withdraw").submit();
					});
					jQuery(".voluno_submit_staff_application_delete").click(function(){
						jQuery(".form_staff_application_delete").submit();
					});
					';
					
				}
				#staff (close)
				
			}#top positions (open)
			
		echo
		'});
	</script>';
	
}
#jquery (close)

#style (open)
if(1==1){
	
	echo '
	<style>
		
		.voluno_top_positions_div{
			padding:10px;
			text-align:center;
			border-radius:5px;
			display:inline-block;
			margin:10px;
		}
		
		.voluno_top_positions_div h1:hover{
			cursor:pointer;
		}
		
		.voluno_top_positions_div p{
			margin:20px;
		}
		
	</style>';
	
}
#style (close)
	
?>