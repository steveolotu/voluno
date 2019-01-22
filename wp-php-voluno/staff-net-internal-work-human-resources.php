<?php

#documentation (open)
if(0!=0){
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.09.19, Steve
		## Last format and structure check: 2016.09.19, Steve
		
		# Allows the management of Voluno user to the Coordinator and Human Ressources Officer (changing user roles).
		
		// First, the access rights are checked. ///1
		// Then the content is displayed.
		// There is a section for all users ///2,
		// one for users without access rights ///3
		// and one for user with access rights. ///4
		// At the end, the content (which was stored in variables) is displayed. This is dynamic and depends on the access rights. ///5
		//
		// The actual content (which is protected by access rights) consists of two parts.
		// 1. Control panel for applications of positions which need to be approved, e.g. staff member., ///6
		// 2. Overview of all users and their technical data/ their positions. ///7
		
	}
	##file info (close)
	
}
#documentation (close)

#does the user have access? (open)
if(1==1){ ///1
	
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
#does the user have access? (close)

#content for everyone (open)
if(1==1){ ///2
	
	#heading (open)
	if(1==1){
		
		echo '
		<h1>
			HR Management
		</h1>';
		
	}
	#heading (close)
	
	#page info (open)
	if(1==1){
		
		$general_information = '
		<p>
			This page is only accessible to the positions: <b>Human Resources Officer, Coordinator</b>
			<br>It has the following purposes:
		</p>
		<ul>
			<li>
				Provide overview of all Voluno users (and technical data, to make sure everything is ok with the registration)
			</li>
			<li>
				Add or remove users
			</li>
			<li>
				Change <u>top user roles</u> manually (top user roles are: "Voluno Staff Member", "Volunteer", "NGO Worker")
			</li>
			<li>
				Accept or decline "Voluno Staff Member" applications (registered members who want to become staff members)
			</li>
			<li>
				Change specific "NGO Worker" and "Volunteer" sub-positions
			</li>
			<li>
				Change specific staff positions (only the coordinator can do this)
			</li>
		</ul>
		<br>';
		
	}
	#page info (close)
	
}
#content for everyone (close)

#user does not have access (open)
if(!array_intersect($function_userpositions_get['simple array']['accepted'],['Voluno Human Resources Officer','Voluno Coordinator'])){ ///3
	
	echo '
	<p style="color:red;">
		You are not Human Resources Officer or Coordinator and thus don\'t have access to this page.
	</p>
	';
	
}
#user does not have access (close)

#user has access (open)
else{
	
	#position applications (open)
	if(1==1){ ///6
		
		#mysql (open)
		if(1==1){
			
			#get 1 (open)
			if(1==1){
				
				$query = 'SELECT *
					FROM fi4l3fg_voluno_applications
					WHERE application_type_general = "position"
						AND application_status = "pending";';
						
				$position_applications['query'] = $GLOBALS['wpdb']->prepare($query);
				$position_applications['results'] = $GLOBALS['wpdb']->get_results($position_applications['query']);
				
			}
			#get 1 (close)
			
			#update (open)
			if(!empty($_POST['application_id'])){
				
				#validate post data (open)
				for($ajz=0;$ajz<count($position_applications);$ajz++){
					
					if($position_applications['results'][$ajz]->application_id == $_POST['application_id']){
						
						$application_update['user id'] = $position_applications['results'][$ajz]->application_user_id;
						$application_update['application id'] = $position_applications['results'][$ajz]->application_id;
						$application_update['application decision'] = $_POST['application_decision'];
						$application_update['application post data is valid'] = 'yes';
						
					}
					
				}
				#validate post data (close)
				
				echo 'application_update[application post data is valid]: '.$application_update['application post data is valid'].'<br>';
				var_dump($application_update);
				#accept or reject application (open)
				if($application_update['application post data is valid'] == 'yes'){
					
					#accept (open)
					if($application_update['application decision'] == 'accept'){
						
						#database query update (open)
						if(1==1){
							
							$GLOBALS['wpdb']->update( 
								'fi4l3fg_voluno_applications',
								array( //updated content
									'application_status' => 'accepted',
									'application_date_modified' => date("Y-m-d H:i:s"),
									'application_official' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
								),
								array( //location of updated content
									'application_id' => $application_update['application id'],
									'application_status' => 'pending'
								),
								array( //format of updated content
									'%s','%s','%s'
								),
								array( //format of location of updated content
									'%d','%s'
								)
							);
							
						}
						#database query update (close)
						
					}
					#accept (close)
					
					#reject (open)
					else{
						
						#database query delete (open)
						if(1==1){
							
							$GLOBALS['wpdb']->delete(
								'fi4l3fg_voluno_applications',
								array( //location of row to delete
									'application_id' => $application_update['application id'],
									'application_status' => 'pending'
								),
								array( //format of location of row to delete
									'%d','%s'
								)
							);
						}
						#database query delete (close)
						
					}
					#reject (close)
					
				}
				#accept or reject application (close)
				
				#applications (open)
				if($application_update['application post data is valid'] == 'yes'){
					
					#send message (open)
					if(1==1){
						
						#function-add-new-message.php (v1.0) (open)
						if(strlen($_POST['application_text_message']) > 3){
							
							#conversation id – add all conversation partners to the array, gets ordered
								$function_add_new_message__partner_id_array = '154';
								#$function_add_new_message__messsage_author_id = '154'; //yesha //default (empty): current user (id loaded automatically)
								#$function_add_new_message__max_recipients = 10; //default:10, max number or recipients. number or “unlimited”
							#message data – all will be sanitized
								#$function_add_new_message__message_sanitization = “”; //sanitization code or “none”, default (empty): “plain text with line breaks (biography)”
								$function_add_new_message__message_content = $_POST['application_text_message'];
								#$function_add_new_message__attachments = ; //default: empty, array of attachment filenames
							include('#function-add-new-message.php');
							
							#output:
								#$function_add_new_message['conversation_id']
								echo 'message id: '.$function_add_new_message['message_id'];
							
						}
						#function-add-new-message.php (v1.0) (close)
						
					}
					#send message (close)
					
				}
				#applications (close)
				
			}
			#update (close)
			
			#get 2 (open)
			if(1==1){
				
				$position_applications['query'] = $GLOBALS['wpdb']->prepare($query);
				$position_applications['results'] = $GLOBALS['wpdb']->get_results($position_applications['query']);
				
			}
			#get 2 (close)
			
		}
		#mysql (close)
		
		#content (open)
		if(1==1){
			
			#loop through applications (open)
			for($ajy=0;$ajy<count($position_applications['results']);$ajy++){
				
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
							
							$function_profileLink['id'] = $position_applications['results'][$ajy]->application_user_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
					
					#function-timezone.php (v1.0) (open)
					if(1==1){
						$function_timezone = $position_applications['results'][$ajy]->application_date_created;
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
					
				}
				#preparation (close)
				
				$applications .= '
				<div style="border:1px solid black;margin:10px;padding:10px;border-radius:5px;">';
					
					#application info (open)
					if(1==1){
						
						$applications .= '
						<p>
							<b>User:</b> '.$function_profileLink['name_link'].'
						</p>
						<p>
							<b>Position:</b> '.$position_applications['results'][$ajy]->application_type_id.'
						</p>
						<p>
							<b>Date:</b> '.$function_timezone.'
						</p>
						<p>
							<b>Application text:</b>
							<div style="padding:10px;margin:10px;background-color:white;border-radius:5px;display:inline-block;">
								'.$position_applications['results'][$ajy]->application_text.'
							</div>
						</p>
						<br>
						<p>
							If you accept or reject this application, the following text will be sent to the applicant as a message.
							Please edit the text and an explanation for the rejection or inform the user what he or she can do with the new position.
						</p>';
						
					}
					#application info (close)
					
					#accept or reject menu (open)
					if(1==1){
						
						$applications .= '
						<table>
							<tr style="text-align:center;">
								<td style="width:50%;">';
									
									#accept application (open)
									if(1==1){
										
										$applications .= '
										<form method="post">
											<input type="hidden" value="'.$position_applications['results'][$ajy]->application_id.'" name="application_id">
											<input type="hidden" value="accept" name="application_decision">
											<textarea style="width:100%;height:20em;" name="application_text_message">'.
												'Dear '.$function_profileLink['name'].',&#013;&#013;'.
												'I\'ve just accepted you\'re application for the position of '.$position_applications['results'][$ajy]->application_type_id.'.&#013;&#013;'.
												'Best regards,'.
												'&#013;&#013;'.
												$GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName.'&#013;'.
												'Voluno Human Resources Officer'.
											'</textarea>
											<input type="submit" value="Accept">
										</form>';
										
									}
									#accpet application (close)
								
								$applications .= '
								</td>
								<td>';
									
									#reject application (open)
									if(1==1){
										
										$applications .= '
										<form method="post">
											<input type="hidden" value="'.$position_applications['results'][$ajy]->application_id.'" name="application_id">
											<input type="hidden" value="reject" name="application_decision">
											<textarea style="width:100%;height:20em;" name="application_text_message">'.
												'Dear '.$function_profileLink['name'].',&#013;&#013;'.
												'I\'m sorry to inform you that your application for the position of '.
												$position_applications['results'][$ajy]->application_type_id.' has been rejected. '.
												'The reason for this rejection is PLEASE INSERT EXPLANATION HERE.'.
												'&#013;&#013;'.
												'I hope that you can understand our decision. If you have further questions, please don\'t hesitate to contact me.'.
												'&#013;&#013;'.
												'Best regards,'.
												'&#013;&#013;'.
												$GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName.'&#013;'.
												'Voluno Human Resources Officer'.
											'</textarea>
											<input type="submit" value="Reject">
										</form>';
										
									}
									#reject application (close)
								
								$applications .= '
								</td>
							</tr>
						</table>';
						
					}
					#accept or reject menu (close)
					
				$applications .= '
				</div>';
				
			}
			#loop through applications (close)
			
			#no applications (open)
			if(empty($applications)){
				
				$applications = 'There are currently no open applications.';
				
			}
			#no applications (close)
			
		}
		#content (close)
	}
	#position applications (close)
	
	#create and delete user (open)
	if(1==1){
		
		#mysql (open)
		if(1==1){
			
			#update (open)
			if(1==1){
				
				#delete user (open)
				if(!empty($_POST['delete_user__user'])){
					
					$delete_user = $_POST['delete_user__user'];
					$current_user_id = $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'];
					
					#function-user-delete.php (v1.0) (open)
					if(!in_array($delete_user,["none",$current_user_id])){
						
						$function_user_delete['user'] = $delete_user; //user id OR “current user”. obligatory, or exit();
						#$function_user_delete['type'] = "permanent"; // 'preliminary' (default), 'permanent'. In the former case, the deletion is
						//postponed by 30 days and the user is merely "deactivated".
						include('#function-user-delete.php');
						
					}
					#function-user-delete.php (v1.0) (close)
					
				}
				#delete user (close)
				
				#add user (open)
				if(!empty($_POST['add_user__first_name'])){
					
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
								'user_pass' => $_POST['add_user__password'],
								'is_pass_hashed?' => 'no', //'yes', 'no' (default). If no, a preliminary password is used to register and then replaced by hashed password.
								'user_email' => $_POST['add_user__email'],
								'first_name' => $_POST['add_user__first_name'],
								'last_name' => $_POST['add_user__last_name'],
								'country' => $_POST['add_user__country'] // country ID
							];
							$function_useradd['redirect to ngo profile'] = 'no'; //optional, 'yes' (default) or 'no'
							
						}
						#input (close)
						
						include('#function-user-add.php');
						#no output
						
					}
					#function-user-add.php (v1.0) (close)
					
				}
				#add user (close)
				
			}
			#update (close)
			
			#get (open)
			if(1==1){
				
				$delete_create_user_query = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_users_extended
					ORDER BY usersext_displayName;'
				);
				$delete_create_user_results = $GLOBALS['wpdb']->get_results($delete_create_user_query);
				
			}
			#get (close)
			
		}
		#mysql (close)
		
		#jquery (open)
		if(1==1){
			
			$delete_create_user .= '
			<script>
				jQuery(document).ready(function(){';
					
					#delete user (open)
					if(1==1){
						
						$delete_create_user .=  '
						jQuery(".delete_user__submit_prelim").click(function(){
							var deleteUserConfirmation = confirm("Really delete this user?");
							if(deleteUserConfirmation == true){
							jQuery(".delete_user__form").submit();
							}
						})';
						
					}
					#delete user (close)
					
					#add user (open)
					if(1==1){
						
						$delete_create_user .=  '
						jQuery(".add_user__submit").click(function(){
							jQuery(".add_user__form").submit();
						})';
						
					}
					#add user (close)
					
				$delete_create_user .=  '
				});
			</script>';
		}
		#jquery (close)
		
		#content (open)
		if(1==1){
			
			#delete (open)
			if(1==1){
				
				#users loop (open)
				for($als=0;$als<count($delete_create_user_results);$als++){
					
					#default (open)
					if($als == 0){
						
						$delete_create_user_select .= '
						<option value="none">
							Please select user to delete
						</option>
						';
						
					}
					#default (close)
					
					$delete_create_user_select .= '
					<option value="'.$delete_create_user_results[$als]->usersext_id.'">
						'.$delete_create_user_results[$als]->usersext_displayName.'
						-
						'.$delete_create_user_results[$als]->usersext_id.'
					</option>
					';
					
				}
				#users loop (close)
				
				$delete_create_user .= '
				<form action="'.get_permalink().'" method="post" class="delete_user__form">
					<b>
						Delete user:
					</b>
					<br>
					<select name="delete_form_user_id">
						'.$delete_create_user_select.'
					</select>
					<div class="voluno_button delete_user__submit_prelim">
						Delete user
					</div>
				</form>';
				
			}
			#delete (close)
			
			#add new (open)
			if(1==1){
				
				#countries (open)
				if(1==1){
					
					$countries['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_lists_countries
						WHERE list_countries_type = "country"
						ORDER BY list_countries_name ASC;'
					);
					
					$countries['results'] = $GLOBALS['wpdb']->get_results($countries['query']);
					
					#loop (open)
					for($alt=0;$alt<count($countries['results']);$alt++){
						
						$countries['select_options'] .= '
						<option value="'.$countries['results'][$alt]->list_countries_id.'">
							'.$countries['results'][$alt]->list_countries_name.'
						</option>';
						
					}
					#loop (close)
					
				}
				#countries (close)
				
				$delete_create_user .= '
				<form action="'.get_permalink().'" method="post" class="add_user__form">
					<b>
						Add user:
					</b>
					<table>
						<tr>
							<td style="font-weight:bold;">
								Name
							</td>
							<td>
								<input type="text" placeholder="First name" name="add_user__first_name">
								<input type="text" placeholder="Last name" name="add_user__last_name">
							</td>
						</tr>
						<tr>
							<td>
								Email
							</td>
							<td>
								<input type="text" placeholder="Email" name="add_user__email">
							</td>
						</tr>
						<tr>
							<td>
								Password
							</td>
							<td>
								<input type="text" placeholder="User password" name="add_user__password">
							</td>
						</tr>
						<tr>
							<td>
								Country
							</td>
							<td>
								<select name="add_user__country">
									<option selected disabled>
										- Please select -
									</option>
									'.$countries['select_options'].'
								</select>
							</td>
						</tr>
					</table>
					<div class="voluno_button add_user__submit">
						Add user
					</div>
				</form>';
				
			}
			#add new (close)
			
		}
		#content (close)
	}
	#create and delete user (close)
	
	#Overview of all users + edit users (open)
	if(1==1){ ///7
		
		#jquery (open)
		if(1==1){
			
			$overview .= '
			<script>
				jQuery(document).ready(function(){';
					
					#more info for user button (open)
					if(1==1){
						
						$overview .=  '
						jQuery(".voluno_more_info_user_button").click(function(){
							jQuery(this).closest(".voluno_more_info_user_container").find(".voluno_more_info_user_area").toggle();
						})';
						
					}
					#more info for user button (close)
					
				$overview .=  '
				});
			</script>';
		}
		#jquery (close)
		
		#mysql (open)
		if(1==1){
			
			#get (open)
			if(1==1){
				
				$all_members['query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_users_extended
					
					'.//merge with wp users
					'FULL JOIN
						(
						SELECT user_email AS wp_user_email,
						user_login AS wp_user_login,
						ID AS wp_ID
						FROM 4df5ukbnn5p3t817_users
						) AS aaa_wp_users
					ON usersext_userEmail = wp_user_email
					
					'.//*merge with wp_social_users to check if registered via facebook
					'LEFT JOIN
						(
						SELECT ID AS wp_social_users_id
						FROM 4df5ukbnn5p3t817_social_users
						) AS aaa_wp_social_users
					ON usersext_ida = wp_social_users_id;'
				);
				$all_members['results'] = $GLOBALS['wpdb']->get_results($all_members['query']);
				
			}
			#get (close)
			
			#update (open)
			if(1==1){
				
				#assign new (open)
				if(1==3 AND !empty($_POST['assign_position__position'])){ #stevesteve
					
					$assign_position__position = $_POST['assign_position__position'];
					$assign_position__member = $_POST['assign_position__member'];
					
					for($ael=0;$ael<max(count($all_staff_positions_results),count($all_staff_members_results));$ael++){
					$all_staff_positions_array[] = $all_staff_positions_results[$ael]->staff_position_mysql;
					$all_staff_members_array[] = $all_staff_members_results[$ael]->usersext_id;
					}
					
					#check if posted values are valid and then execute (open)
					if(in_array($assign_position__position,$all_staff_positions_array)
					AND in_array($assign_position__member,$all_staff_members_array)){
					
					#check if position already assigned to that member (open)
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
								
								$function_userpositions_get['user id'] = $assign_position__member; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
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
								#     Example usage:
								#       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
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
								#        $GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
								#        $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
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
						#function-user-positions-get.php (v1.8) (close)
						
						#if user already has position, prevent further execution by refreshing (open)
						if(in_array($assign_position__position,$function_userpositions_get['simple_pure_array']['accepted'])){
							
							#function-redirect.php (v1.0) (open)
							if(1==1){
								
								#documentation (open)
								if(1==1){
									
									// Redirects to another page. Prevents further loading of content.
									
								}
								#documentation (close)
								
								#input (open)
								if(1==1){
									
									$function_redirect['redirect_url'] = get_permalink().'?section=hr_officer'; // url to redirect to. If none is given, homepage is used.
									
								}
								#input (close)
								
								include('#function-redirect.php');
								
								#no output
								
							}
							#function-redirect.php (v1.0) (close)
							
						}
						#if user already has position, prevent further execution by refreshing (close)
						
					}
					#check if position already assigned to that member (close)
					
					#if application exists, update (open)
					if(in_array($assign_position__member,$function_userpositions_get['simple_pure_array']['pending'])){
						
						#database query update (open)
						if(1==1){
							
							$GLOBALS['wpdb']->update( 
								'fi4l3fg_voluno_applications',
								array( //updated content
									'application_status' => "accepted",
									'application_official' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
									'application_date_modified' => date("Y-m-d H:i:s"),
								),
								array( //location of updated content
									'application_type_general' => 'staff position',
									'application_type_specific' => $assign_position__position,
									
									'application_user_id' => $assign_position__member,
									'application_status' => "pending",
								),
								array( //format of updated content
									'%s','%s','%s',
								),
								array( //format of location of updated content
									'%s','%s',
									'%s','%s',
								)
							);
							
						}
						#database query update (close)
						
					}
					#if application exists, update (close)
					
					#if no application exists, insert (open)
					else{
						
						#random number (open)
						if(1==1){
						unset($voluno_random_num);
						$length = 50;
						for($i = 0; $i < $length; $i++) {
							$voluno_random_num
							= $voluno_random_num.
							substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
						}
						}
						#random number (close)
						
						#database query insert (open)
						if(1==1){
						
						$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_applications',
							array(
								'application_type_general' => 'staff position',
								'application_type_specific' => $assign_position__position,
								'application_type_id' => '',
								
								'application_user_id' => $assign_position__member,
								'application_text' => '',
								'application_status' => "accepted",
								
								'application_code' => $voluno_random_num,
								'application_official' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'application_date_created' => date("Y-m-d H:i:s"),
								'application_date_modified' => date("Y-m-d H:i:s"),
							),
							array(
								'%s','%s','%s',
								'%s','%s','%s',
								'%s','%s','%s','%s',
							));
						}
						#database query insert (close)
						
					}
					#if no application exists, insert (close)
					
					#edit wp role if necessary (open)
					if($assign_position__position == "website_admin"){
						
						$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_users_extended
											WHERE usersext_id = %s;'
											,$assign_position__member);
						$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
						
						$wp_user_role_object = new WP_User($get_wp_user_id_row->usersext_id);
						$wp_user_role_object->set_role('administrator');
					}
					#edit wp role if necessary (close)
					
					}
					#check if posted values are valid and then execute (open)
					
					$initiate_redirect_function_to_refresh = "yes";
					
				}
				#assign new (close)
				
				#function-redirect.php (v1.0) (open)
				if($initiate_redirect_function_to_refresh == "yes"){
					
					#documentation (open)
					if(1==1){
						
						// Redirects to another page. Prevents further loading of content.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_redirect['redirect_url'] = get_permalink().'?section=hr_officer'; // url to redirect to. If none is given, homepage is used.
						
					}
					#input (close)
					
					include('#function-redirect.php');
					
					#no output
					
				}
				#function-redirect.php (v1.0) (close)
				
				#delete user (open)
				if(1==2 AND !empty($_POST['delete_user__user'])){
					
					#database query update (open)
					if(1==1){
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
						'application_status' => "dismissed",
						'application_official' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
						'application_date_modified' => date("Y-m-d H:i:s"),
						),
						array( //location of updated content
						'application_type_general' => 'staff position',
						'application_type_specific' => $unassign_position__position,
						
						'application_user_id' => $unassign_position__member,
						'application_status' => "accepted",
						),
						array( //format of updated content
						'%s','%s','%s',
						),
						array( //format of location of updated content
						'%s','%s',
						'%s','%s',
						));
					}
					#database query update (close)
					
					#edit wp role if necessary (open)
					if($unassign_position__position == "website_admin" AND $unassign_position__member != $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
					
					$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_users_extended
										WHERE usersext_id = %s;'
										,$unassign_position__member);
					$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
					
					$wp_user_role_object = new WP_User($get_wp_user_id_row->usersext_id);
					$wp_user_role_object->set_role('subscriber');
					}
					#edit wp role if necessary (close)
					
					$initiate_redirect_function_to_refresh = "yes";
					
				}
				#delete user (close)
				
			}
			#update (close)
			
		}
		#mysql (close)
		
		#content (open)
		if(1==1){
			
			#title + img (open)
			if(1==1){
				
				if(!empty($_POST['delete_user__user_name'])){
					$text = '
					<div style="color:red;font-weight:bold;">
					User '.$_POST['delete_user__user_name'].' ('.$_POST['delete_user__user'].') deleted.
					</div>';
				}
				$text .= 'There are currently '.count($all_not_deleted_members_results).' non-deleted members registered.';
				
				echo
				str_replace("54250961325934265656347",$text,$title_and_image);
				
			}
			#title + img (close)
			
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
					// important elements, especially those maked with the comment: " //Don't touch this. " ;-)
					
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
							
							$function_table['results'] = $all_members['results'];
							
						}
						#data preparation and creation (close)
						
						#inserting the data into the data array (open)
						for($ajl=0;$ajl<count($function_table['results']);$ajl++){ // <- Please modify the total amount of rows to include in your table.
							
							// This loop iterates through each row of data.
							// If you didn't use the default query, please modify the amount of rows in the above loop.
							
							// In the following brackets, please add one line for each column that you want to add to the mysql table.
							// In the following example, user data is inserted (column names are imaginary, just to illustrate).
							
							#columns (open)
							if(1==1){
								
								$function_table['data'][$ajl]['display_name'] = $function_table['results'][$ajl]->usersext_displayName;
								$function_table['data'][$ajl]['staff_position_mysql'] = $function_table['results'][$ajl]->staff_position_mysql;
								$function_table['data'][$ajl]['staff_position_department'][] = $function_table['results'][$ajl]->staff_position_department;
								$function_table['data'][$ajl]['user_email'] = $function_table['results'][$ajl]->usersext_userEmail;
								$function_table['data'][$ajl]['usersext_userEmail'] = $function_table['results'][$ajl]->usersext_userEmail;
								$function_table['data'][$ajl]['wp_user_email'] = $function_table['results'][$ajl]->wp_user_email;
								$function_table['data'][$ajl]['wp_user_login'] = $function_table['results'][$ajl]->wp_user_login;
								$function_table['data'][$ajl]['usersext_positions_sorted'] = $function_table['results'][$ajl]->usersext_positions_sorted;
								$function_table['data'][$ajl]['id'] = $function_table['results'][$ajl]->usersext_id;
								$function_table['data'][$ajl]['wp_social_users_id'] = $function_table['results'][$ajl]->wp_social_users_id;
								$function_table['data'][$ajl]['usersext_status'] = $function_table['results'][$ajl]->usersext_status;
								// To add new lines, just copy the above. Each line requires an individual column name (last bracket) and a value.
								
								// Keep the column names in mind, these will be used later on a lot.
								
							}
							#columns (close)
							
						}
						#inserting the data into the data array (close)
						
					}
					#Raw data (close)
					
					#Table options (open)
					if(1==1){
						
						$function_table['unique id'] = "hr_member_control_vrweiovbriuvbweriobv";
						// Everytime you use this function, please add a random and unique ID (only a-z and 0-9). For example, see https://passwordsgenerator.net/
						
						#Options connected to the title (open)
						if(1==1){
							
							#$function_table['display title'] = "Please add a title. AAAAAAAAAAAAAAAAAAAAAAA";
							// The title of the table which is displayed above the table. To hide title, leave empty.
							
							#$function_table['show on load'] = "yes";
							// "yes" or empty (default). If there's no title, this is automatically set to yes, since there is nothing to show.
							
							#$function_table['title format'] = array('<h1>','</h1>');
							// Opening and closing css tags for the title. Default: array('<h4>','</h4>')
							
							#$function_table['display number of results'] = 'no';
							// Displays the full amount of content rows in brackets behind the table title. "no" or empty (default).
							
						}
						#Options connected to the title (close)
						
						#Headings and sorting (open)
						if(1==1){
							
							#$function_table['hide column headings'] = "yes";
							// Hides headings of table. "yes" or empty (default).
							
							// The following multi-dimensional array has the following structure:
							// - heading = The heading that will be displayed above the respective column.
							// - width = Optional. With of the respective column. You can either use % or pt.
							// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
							//                    columns names that you used in the "Raw data" section.
							//                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were "email" and "id".
							$function_table['column headings'] 
							= array(
								array( // In almost all cases, the first column should be the row numbering. If you want to keep it, just leave it as it is.
									'heading'		 => '#', // See 1 row above.
									'width'			 => '3%' // See 2 rows above.
								),
								array(
									'heading'		 => 'Name, ID/ FB-Link, Email/login',
									'width'			 => '60%',
									'sorting option' => 'display_name'
								),
								array(
									'heading'		 => 'Options',
									'width'			 => '15%'
								)
							);
							
							//Optionally, you can choose one of the above columns to be the default sorting option.
							// If you don't want this, please delete or hide the entire array.
							$function_table['default ordering']
							= array(
								'column' => 'display_name', // Colum name. In the example, "email" or "id".
								'direction' => 'ASC' // ASC or DESC
							);
							
						}
						#Headings and sorting (close)
						
						#Pagination (open)
						if(1==1){
							
							// If the table doesn't have a lot of space, you can make the pagination "thin". Then, the "first page", "previous page", "items per page",
							// "next page" and "last page" buttons will aligned vertically, instead of horizontally -> they will be slimmer.
							#$function_table['thin_pagination'] = "yes"; // "yes" or "no" (default)
						}
						#Pagination (close)
						
						#Display a message if no data available (open)
						if(1==1){
							
							// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
							// Here, you can modify this message.
							
							#$function_table['no_items_available_message'] = array(
							#    'lines' => "no" // Should a line be displayed left and right of the messsage? Not important, just looks nice. "no" or "yes" (default).
							#    ,'content' => "none" // Any text (will be displayed) or "none" (no text will be displayed). Default: "There are currently no items available."
							#);
							
						}
						#Display a message if no data available (close)
						
					}
					#Table options (close)
					
				}
				#Input: Raw data + Table options (close)
				
				$function_table['part'] = 1; //Don't touch this. 
				include("#function-table.php"); //Don't touch this. 
				
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
						// the amount of column headings you added in "Table options".
						// Please be sure not to change anything else.
						
					}
					#documentation (close)
					
					#Cells/Columns (open)
					for($abs=$function_table['pagination_lower_limit'];$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));$abs++){ //Don't touch this.
						$function_table['table rows'] .= $function_table['row open']; //Don't touch this.
						
						#1 counter (open)
						if(1==1){
							
							// If you want to use a row counter, please don't touch this cell as it is.
							
							$function_table['table rows'] .= '
							<td>
								'.number_format(($abs+1),0,"."," ").'
							</td>
							';
							
						}
						#1 counter (close)
						
						#2 Name, Id, Email, positions (open)
						if(1==1){
							
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
                                        
                                        $function_profileLink['id'] = $function_table['data'][$abs]['id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
								#id (open)
								if(1==1){
									
									#facebook check (open)
									if(empty($function_table['data'][$abs]['wp_social_users_id'])){
										
										$registration_type = '<span style="color:lightgrey;">unlinked</span>';
										
									}else{
										
										$registration_type = '<span style="color:#3b5998;font-weight:bold;">Facebook</span>';
										
									}
									#facebook check (close)
									
								}
								#id (close)
								
								#email (open)
								if(1==1){
									
									$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
														FROM fi4l3fg_voluno_users_extended
														WHERE usersext_id = %s;'
														,$function_table['data'][$abs]['id']);
									$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
									$user = new WP_User($get_wp_user_id_row->usersext_id);
									$user_roles = $user->roles;
									
									unset($login_like_email_check);
									
									#case 1: all logins are identical to email (open)
									if($function_table['data'][$abs]['user_email'] == $function_table['data'][$abs]['usersext_userEmail']
									   AND
									   $function_table['data'][$abs]['user_email'] == $function_table['data'][$abs]['wp_user_login']
									){
										
										$login_like_email_check['text'] = '
										<span style="color:lightgrey;">
											Login identical in both
										</span>';
										
									}
									#case 1: all logins are identical to email (close)
									
									#case 2: at least one login is different from email address (open)
									else{
										
										$login_like_email_check['title'] = '
										<div
											style="color:red;font-weight:bold;cursor:help;"
											title="Must be identical in both databases, since this is how they are joined for this query."
										>
											Email:
										</div>';
										
										$login_like_email_check['text'] = '
										<div style="color:red;">
											<br>
											<strong>
											Login
											</strong>
											<br>
											ext:
											'.$function_table['data'][$abs]['usersext_userEmail'].'
											<br>
											wp:
											'.$function_table['data'][$abs]['wp_user_login'].'
										</div>';
										
									}
									#case 2: at least one login is different from email address (close)
									
								}
								#email (close)
								
								#positions (open)
								if(1==1){
									
									#wp role (open)
									if(1==1){
										
										$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
															FROM fi4l3fg_voluno_users_extended
															WHERE usersext_id = %s;'
															,$function_table['data'][$abs]['id']);
										$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
										$user = new WP_User($get_wp_user_id_row->usersext_ida);
										$user_roles = $user->roles;
										
										$wp_role_formatted = '
										<div style="font-weight:bold;color:blue;cursor:help;" title="Wordpress role">
											['.$user_roles[0].']
										</div>';
										
									}
									#wp role (close)
									
									#function-user-positions-get.php (v1.7) (open)
									if(1==1){
										
										#documentation (open)
										if(1==1){
											
											// Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
											
										}
										#documentation (close)
										
										#input (open)
										if(1==1){
											
											$function_userpositions_get['user id'] = $function_table['data'][$abs]['id']; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
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
									
									unset($regular_positions_formatted);
									
									#postion loop (open)
									for($alr=0;$alr<count($function_userpositions_get['simple array']['accepted']);$alr++){
										
										$regular_positions_formatted[] = '
										<li>'.
											$function_userpositions_get['simple array']['accepted'][$alr].
										'</li>';
										
									}
									#position loop (close)
									
								}
								#positions (close)
								
							}
							#preparation (close)
							
							#content (open)
							if(1==1){
								
								$function_table['table rows'] .= '
								<td class="voluno_more_info_user_container">
									'.$function_profileLink['name_link'].' ('.$function_table['data'][$abs]['id'].')
									<div class="voluno_button voluno_more_info_user_button">
										More info
									</div>
									<table class="voluno_more_info_user_area" style="display:none;">
										<tr>
											<td>
												<b>
													IDs:
												</b>
												<br>
												'.$function_table['data'][$abs]['id'].'
												<div title="Registration type: Did the user register via Facebook or regular?" style="cursor:help;">
													'.$registration_type.'
												</div>
											</td>
											<td>
												<b>
													Email:
												</b>
												<br>
												'.$login_like_email_check['title'].'
												'.$function_table['data'][$abs]['user_email'].'
												<br>
												'.$login_like_email_check['text'].'
											</td>
											<td>
												'.$wp_role_formatted.'
												<ul>'.
													implode($regular_positions_formatted).
												'</ul>
											</td>
										</tr>
									</table>
								</td>';
								
							}
							#content (close)
							
						}
						#2 Name, Id, Email, positions (close)
						
						#3 Edit menu (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>To edit, click more info.';
								
								#delete user (open)
								if(1==2 AND $function_table['data'][$abs]['id'] != $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
									
									$function_table['table rows'] .= '
									<div class="voluno_button delete_user__submit_prelim">
										Delete user
										<form
										method="post"
										action="'.get_permalink().'?section=hr_officer"
										class="delete_user__form"
										>
										<input
											type="hidden"
											value="'.$function_table['data'][$abs]['id'].'"
											name="delete_user__user"
										>
										<input
											type="hidden"
											value="'.$function_table['data'][$abs]['display_name'].'"
											name="delete_user__user_name"
										>
										</form>
									</div>';
									
								}
								#delete user (close)
								
								#status (open)
								if(1==1){
									
									#select options (open)
									if(1==1){
										
										#status (open)
										if(1==1){
											
											$user_status_array = [
												'active',
												'draft',
												'paused',
												'locked',
												'deleted'
											];
											
											unset($user_status_select_options);
											
											#loop (open)
											for($amj=0;$amj<count($user_status_array);$amj++){
												
												#
												if($function_table['data'][$abs]['usersext_status'] == $user_status_array[$amj]){
													
													$user_status_select_options_selected = 'selected="selected"';
													
												}else{
													
													unset($user_status_select_options_selected);
													
												}
												#
												
												$user_status_select_options .= '
												<option value="'.$user_status_array[$amj].'" '.$user_status_select_options_selected.'>
													'.$user_status_array[$amj].'
												</option>';
												
											}
											#loop (close)
											
										}
										#status (close)
										
										#current positions (open)
										if(1==1){
											
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
									
									$function_table['table rows'] .= '
									<div class="user_options">
										<form
											method="post"
											action="'.get_permalink().'"
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
											
											<div>
												Add position:
												<select name="user_options_addPosition">
													'.$user_status_select_options.'
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
											
											<input type="submit" value="Submit">
										</form>
									</div>';
									
								}
								#status (close)
								
							$function_table['table rows'] .= '
							</td>
							';
							
						}
						#3 Edit menu (close)
						
						$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
					} //Don't touch this. 
					#Cells/Columns (close)
					
				}
				#design (close)
				
				$function_table['part'] = 2; //Don't touch this. 
				include("#function-table.php"); //Don't touch this. 
				
				#output
				//the entire output is stored in the following variable:
				$overview .=  $function_table['output table'];
				
			}
			#function-table.php (v1.0) (close)
			
		}
		#content (close)
		
	}
	#Overview of all users + edit users (close)
	
	#everything about one specific user (open)
	if(1==1){
		
		#mysql (open)
		if(1==1){
			
			#get (open)
			if(1==1){
				
				$all_not_deleted_members_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_users_extended
										
										'.//merge with wp users
										'FULL JOIN
											(
											SELECT user_email AS wp_user_email,
											user_login AS wp_user_login,
											ID AS wp_ID
											FROM 4df5ukbnn5p3t817_users
											) AS aaa_wp_users
										ON usersext_userEmail = wp_user_email
										
										'.//*merge with wp_social_users to check if registered via facebook
										'LEFT JOIN
											(
											SELECT ID AS wp_social_users_id
											FROM 4df5ukbnn5p3t817_social_users
											) AS aaa_wp_social_users
										ON usersext_ida = wp_social_users_id
										;');
				$all_not_deleted_members_results = $GLOBALS['wpdb']->get_results($all_not_deleted_members_query);
				
			}
			#get (close)
			
			#update (open)
			if(1==1){
				
				#assign new (open)
				if(1==3 AND !empty($_POST['assign_position__position'])){ #stevesteve ### #todolist: due to a change in the user position system,
					//this is no longer safe. please ensure that only access is granted when it is intended!!! $_POST manipulation seems possible and must be prevented.
					
					$assign_position__position = $_POST['assign_position__position'];
					$assign_position__member = $_POST['assign_position__member'];
					
					for($ael=0;$ael<max(count($all_staff_positions_results),count($all_staff_members_results));$ael++){
					$all_staff_positions_array[] = $all_staff_positions_results[$ael]->staff_position_mysql;
					$all_staff_members_array[] = $all_staff_members_results[$ael]->usersext_id;
					}
					
					#check if posted values are valid and then execute (open)
					if(in_array($assign_position__position,$all_staff_positions_array)
					AND in_array($assign_position__member,$all_staff_members_array)){
					
					#check if position already assigned to that member (open)
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
								
								$function_userpositions_get['user id'] = $assign_position__member; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
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
								#     Example usage:
								#       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
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
								#        $GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
								#        $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
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
						#function-user-positions-get.php (v1.8) (close)
						
						#if user already has position, prevent further execution by refreshing (open)
						if(in_array($assign_position__position,$function_userpositions_get['simple_pure_array']['accepted'])){
							
							#function-redirect.php (v1.0) (open)
							if(1==1){
								
								#documentation (open)
								if(1==1){
									
									// Redirects to another page. Prevents further loading of content.
									
								}
								#documentation (close)
								
								#input (open)
								if(1==1){
									
									$function_redirect['redirect_url'] = get_permalink().'?section=hr_officer'; // url to redirect to. If none is given, homepage is used.
									
								}
								#input (close)
								
								include('#function-redirect.php');
								
								#no output
								
							}
							#function-redirect.php (v1.0) (close)
							
						}
						#if user already has position, prevent further execution by refreshing (close)
						
					}
					#check if position already assigned to that member (close)
					
					#if application exists, update (open)
					if(in_array($assign_position__member,$function_userpositions_get['simple_pure_array']['pending'])){
						
						#database query update (open)
						if(1==1){
							
							$GLOBALS['wpdb']->update( 
								'fi4l3fg_voluno_applications',
								array( //updated content
									'application_status' => "accepted",
									'application_official' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
									'application_date_modified' => date("Y-m-d H:i:s"),
								),
								array( //location of updated content
									'application_type_general' => 'staff position',
									'application_type_specific' => $assign_position__position,
									
									'application_user_id' => $assign_position__member,
									'application_status' => "pending",
								),
								array( //format of updated content
									'%s','%s','%s',
								),
								array( //format of location of updated content
									'%s','%s',
									'%s','%s',
								)
							);
							
						}
						#database query update (close)
						
					}
					#if application exists, update (close)
					
					#if no application exists, insert (open)
					else{
						
						#random number (open)
						if(1==1){
						unset($voluno_random_num);
						$length = 50;
						for($i = 0; $i < $length; $i++) {
							$voluno_random_num
							= $voluno_random_num.
							substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
						}
						}
						#random number (close)
						
						#database query insert (open)
						if(1==1){
						
						$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_applications',
							array(
								'application_type_general' => 'staff position',
								'application_type_specific' => $assign_position__position,
								'application_type_id' => '',
								
								'application_user_id' => $assign_position__member,
								'application_text' => '',
								'application_status' => "accepted",
								
								'application_code' => $voluno_random_num,
								'application_official' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'application_date_created' => date("Y-m-d H:i:s"),
								'application_date_modified' => date("Y-m-d H:i:s"),
							),
							array(
								'%s','%s','%s',
								'%s','%s','%s',
								'%s','%s','%s','%s',
							));
						}
						#database query insert (close)
						
					}
					#if no application exists, insert (close)
					
					#edit wp role if necessary (open)
					if($assign_position__position == "website_admin"){
						
						$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_users_extended
											WHERE usersext_id = %s;'
											,$assign_position__member);
						$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
						
						$wp_user_role_object = new WP_User($get_wp_user_id_row->usersext_id);
						$wp_user_role_object->set_role('administrator');
					}
					#edit wp role if necessary (close)
					
					}
					#check if posted values are valid and then execute (open)
					
					$initiate_redirect_function_to_refresh = "yes";
					
				}
				#assign new (close)
				
				#function-redirect.php (v1.0) (open)
				if($initiate_redirect_function_to_refresh == "yes"){
					
					#documentation (open)
					if(1==1){
						
						// Redirects to another page. Prevents further loading of content.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_redirect['redirect_url'] = get_permalink().'?section=hr_officer'; // url to redirect to. If none is given, homepage is used.
						
					}
					#input (close)
					
					include('#function-redirect.php');
					
					#no output
					
				}
				#function-redirect.php (v1.0) (close)
				
				#delete user (open)
				if(1==2 AND !empty($_POST['delete_user__user'])){
					
					#database query update (open)
					if(1==1){
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
						array( //updated content
						'application_status' => "dismissed",
						'application_official' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
						'application_date_modified' => date("Y-m-d H:i:s"),
						),
						array( //location of updated content
						'application_type_general' => 'staff position',
						'application_type_specific' => $unassign_position__position,
						
						'application_user_id' => $unassign_position__member,
						'application_status' => "accepted",
						),
						array( //format of updated content
						'%s','%s','%s',
						),
						array( //format of location of updated content
						'%s','%s',
						'%s','%s',
						));
					}
					#database query update (close)
					
					#edit wp role if necessary (open)
					if($unassign_position__position == "website_admin" AND $unassign_position__member != $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
					
					$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_users_extended
										WHERE usersext_id = %s;'
										,$unassign_position__member);
					$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
					
					$wp_user_role_object = new WP_User($get_wp_user_id_row->usersext_id);
					$wp_user_role_object->set_role('subscriber');
					}
					#edit wp role if necessary (close)
					
					$initiate_redirect_function_to_refresh = "yes";
					
				}
				#delete user (close)
				
			}
			#update (close)
			
		}
		#mysql (close)
		
		#content (open)
		if(1==1){
			
			#view and edit staff positions div (open)
			if(1==1){
				
				$overview .=  '
				<div class="content_div">
					<div class="content_div_title">
					<h4 style="display:inline;">
						<a>
							All Voluno members
						</a>
					</h4>
					</div>
					<div class="content_div_content">
					<div style="text-align:center;">changed my mind, did this in a new function, interrupted work, would take too long, will do it later.';
						
						
					$overview .=  '
					</div>
					</div>
				</div>';
				
			}
			#view and edit staff positions div (close)
			
		}
		#content (close)
		
	}
	#everything about one specific user (close)
	
}
#user has access (open)

#final content (open)
if(1==1){ ///5

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
			
			#general information (open)
			if(1==1){
				
				$function_accordion['array'][] = [
					'title' => 'General page information',
					'content' => $general_information
				];				
				
			}
			#general information (close)
			
			#Applications (open)
			if(!empty($applications)){
				
				$function_accordion['array'][] = [
					'title' => 'Applications ('.count($position_applications['results']).')',
					'content' => $applications
				];				
				
			}
			#Applications (close)
			
			#Member overview (open)
			if(!empty($overview)){
				
				$function_accordion['array'][] = [
					'title' => 'Member overview',
					'content' => $overview
				];				
				
			}
			#Member overview (close)
			
			#Member overview (open)
			if(!empty($delete_create_user)){
				
				$function_accordion['array'][] = [
					'title' => 'Create or delete user',
					'content' => $delete_create_user
				];				
				
			}
			#Member overview (close)
			
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
#final content (close)

?>