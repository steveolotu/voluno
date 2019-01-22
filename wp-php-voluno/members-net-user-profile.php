<?php

/*

page views:
- public view: what visitors see
- view as public: option to see how it looks for public
- normal: view and option to edit
	- edit_profile_picture
	- change email address

*/

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
        # $function_myOfficeArm['owner_user_object'] //table row, can be accessed like this:via ...->usersext_displayName
		
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

#page section selection (open)
if(get_the_ID() != 852){
    
	#is it me? (open)
	if($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $function_myOfficeArm['owner_user_id']){
		
	   $profile_page_owner = "yes";
		
	}
	#is it me? (close)
   
	#page view permissions (open)
	if(array_intersect($function_myOfficeArm['role_array'],['visitor'])){
		//visitor rights
		
		$profile_page_view = "public view";
		
		$profile_editing_right = 'no';
		
	}elseif(array_intersect($function_myOfficeArm['role_array'],['owner','agent','web_developer_or_human_resources_officer'])){
		//edit rights
		
		$profile_editing_right = 'yes';
		
		#different edit sections (open)
		if($_GET['view_as'] == "public"){
			
			$profile_page_view = "view as public";
			
		}elseif($_GET['view_as'] == "edit_profile_picture"){
			
			$profile_page_view = "edit_profile_picture";
			
		}else{
			
			$profile_page_view = "normal";
			
		}
		#different edit sections (close)
		
	}
	#page view permissions (close)
	
	###
	if(array_intersect($function_myOfficeArm['role_array'],['owner','agent','web_developer_or_human_resources_officer']) and 0!=0){
		echo '
		<div style="border:5px solid green;">
			admin info:
			<br>';
			var_dump($function_myOfficeArm['role_array']);
			echo $profile_page_view;
		echo '
		</div>';
	}
	###
	
}
#page section selection (close) 

#confirm email address change (open)
if(get_the_ID() == 852){
    
    #validation (open)
    if(1==1){
		
		#function-redirect.php (v1.0) (open)
		if(empty($_GET['email_confirmation_code'])){
			
			#documentation (open)
			if(1==1){
				
				// Redirects to another page. Prevents further loading of content.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_redirect['redirect_url'] = get_home_url(); // url to redirect to. If none is given, homepage is used.
				
			}
			#input (close)
			
			include('#function-redirect.php');
			
			#no output
			
		}
		#function-redirect.php (v1.0) (close)
		
		$does_code_exist_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_personal_settings
							WHERE pers_settings_content_text = %s
								AND pers_settings_general = "my profile"
								AND pers_settings_specific = "update email address"'
							,$_GET['email_confirmation_code']);
		$does_code_exist_row = $GLOBALS['wpdb']->get_row($does_code_exist_query);
		
		if(
			!empty($does_code_exist_row) #does it exist? (open)
			AND
			time() - strtotime($does_code_exist_row->pers_settings_date_modified) < (1 * 60 * 60 * 24 * 3) #has it expired? (open)
		){
			
			#has it not yet been used? (open)
			if(empty($does_code_exist_row->pers_settings_value)){ //not used at all
			
			#update personal settings (open)
			if(1==1){
				
				$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_personal_settings',
					array( //updated content
					'pers_settings_value' => 'used (2/1)'
					),
					array( //location of updated content
					'pers_settings_id' => $does_code_exist_row->pers_settings_id
					),
					array( //format of updated content
					'%s'
					),
					array( //format of location of updated content
					'%d'
					));
				
			}
			#update personal settings (close)
			
			#update email address (open)
			if(1==1){
				
				#wp_users (open)
				if(1==1){
				
				$GLOBALS['wpdb']->update( 
						'4df5ukbnn5p3t817_users',
					array( //updated content
						'user_login' => $does_code_exist_row->pers_settings_content_varchar1000,
						'user_email' => $does_code_exist_row->pers_settings_content_varchar1000
					),
					array( //location of updated content
						'ID' => preg_replace("/[^0-9]/","",$does_code_exist_row->pers_settings_user_id)
					),
					array( //format of updated content
						'%s','%s'
					),
					array( //format of location of updated content
						'%s'
					));
				
				}
				#wp_users (close)
				
				#fi4l3fg_voluno_users_extended (open)
				if(1==1){
				
				$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_users_extended',
					array( //updated content
						'usersext_userEmail' => $does_code_exist_row->pers_settings_content_varchar1000
					),
					array( //location of updated content
						'usersext_id' => $does_code_exist_row->pers_settings_user_id
					),
					array( //format of updated content
						'%s'
					),
					array( //format of location of updated content
						'%s'
					));
				}
				#fi4l3fg_voluno_users_extended (close)
				
			}
			#update email address (close)
			
			#logout (open)
			if(1==1){
				
				echo '
				<script>
				jQuery(document).ready(function(){
					window.location.replace("';
					if(4==9){
						echo
						wp_logout_url(get_permalink().'?email_confirmation_code='.$_GET['email_confirmation_code']);
					}else{
						echo
						get_permalink().'?email_confirmation_code='.$_GET['email_confirmation_code'];
					}
					echo
					'");
				});
				</script>';
				
			}
			#logout (close)
			
			$show_content = "no";
			
			}elseif($does_code_exist_row->pers_settings_value == "used (2/1)"){ //used, now show result once 
			
			#update personal settings (open)
			if(1==1){
				
				$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_personal_settings',
					array( //updated content
					'pers_settings_value' => 'used (2/2)'
					),
					array( //location of updated content
					'pers_settings_id' => $does_code_exist_row->pers_settings_id
					),
					array( //format of updated content
					'%s'
					),
					array( //format of location of updated content
					'%d'
					));
				
			}
			#update personal settings (close)
			
			$show_content = "success";
			
			}else{
			
			if(is_user_logged_in()
				AND
				time() - strtotime($does_code_exist_row->pers_settings_date_modified) < (1 * 60 * 60 * 24 * 5)
			){
				
				if($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $does_code_exist_row->pers_settings_user_id){
				
				$show_content = "success_already_used";
				
				}
				
			}
			
			}
			#has it not yet been used?
			
		}
		#is it still valid? does it exist? (close)
		
    }
    #validation (close)
    
    #content (open)
    if($show_content != "no"){
	
	#title + img (open)
	if(1==1){
	    
	    #function-image-processing (open)
	    if(1==1){
		#thematic only
		    $function_propic__type = "thematic";
		    $function_propic__original_img_name = "registration.jpg";
		    $function_propic__cropping = "yes"; //yes or empty (default)
		#all
		    $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
		include('#function-image-processing.php');
		# $function_propic;
		#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
	    }
	    #function-image-processing (close)
	    
	    $title_plus_imge[0] = '
	    <img class="voluno_header_picture" src="'.$function_propic.'">
	    
	    <div style="margin:30px;text-align:center;">
		<h1 style="display:inline;">';	    
		
	    $title_plus_imge[1] = '
		</h1>
	    </div>
	    ';
	    
	}
	#title + img (close)
	
	#success (open)
	if($show_content == 'success'){
	    echo
	    $title_plus_imge[0].'
	    Email address updated
	    '.$title_plus_imge[1].'
	    <p>
		<br>
		Thank you for confirming your email address! It was successfully updated to:
		<div style="font-weight:bold;margin:20px auto;text-align:center;">
		  '.$does_code_exist_row->pers_settings_content_varchar1000.'
		</div>
		<br>';
		
		if(is_user_logged_in()){
		    echo '
		    For security reasons, you have been logged out.';
		    $again = 'again';
		}
		
		echo '
		Please log in '.$again.' with this new email address.
		<br>
		<br>
	    </p>';
	}
	#success (close)
	
	#success_already_used (open)
	elseif($show_content == 'success_already_used'){
	    echo
	    $title_plus_imge[0].'
	    Email address updated
	    '.$title_plus_imge[1].'
	    <p>
		<br>
		Thank you for confirming your email address. It was successfully updated to:
		<div style="font-weight:bold;margin:20px auto;text-align:center;">
		  '.$does_code_exist_row->pers_settings_content_varchar1000.'
		</div>
		<br>
		<br>
	    </p>';
	}
	#success_already_used (close)
	
	#error (open)
	else{
	    echo
	    $title_plus_imge[0].'
	    Email address NOT updated
	    '.$title_plus_imge[1].'
	    <p>
		The email address could not be confirmed. This can have several reasons:
		<br><br>
		<ul>
		    <li>
			<strong>
			    The code has already been used.
			</strong>
			<br>
			In this case, please login with your new email address.
			<br><br>
		    </li>
		    <li>
			<strong>
			    The code is incorrect.
			</strong>
			<br>
			Please make sure you copied it correctly. Some email clients add line breaks or spaces to the url. Please remove them.
			<br><br>
		    </li>
		    <li>
			<strong>
			    The code has expired.
			</strong>
			<br>
			For security reasons, email change confirmation codes expire after 72 hours. If this is the case,
			please repeat the procedure.';
			if(is_user_logged_in()){
			    echo '
			    <br>(Click <a href="'.get_permalink().'" style="font-weight:bold;">here</a> to visit your profile.)';
			}
		    echo '
		    </li>
		</ul>
		<br>
		<br>';
		#function-if-problem-persits-contact-us.php
		    include('#function-if-problem-persits-contact-us.php');
		echo
		$function_if_problem_persits_contact_us.'
	    </p>';
	}
	#error (close)
	
    }
    #content (close)
    
}
#confirm email address change (close)

#normal profile view (open)
elseif(in_array($profile_page_view,array("public view","view as public","edit","normal"))){
	
    #arm (open)###
    if(1==1){
		
		###
		if(in_array($function_myOfficeArm['owner_user_object']->usersext_id,$function_userRelSta['active'])){
			$arm_option_add_contact = "yes";
			
			#
			if(
				!empty($_POST['add_contact'])
			AND
				$profile_page_owner != "yes"
			AND
				in_array($function_myOfficeArm['owner_user_object']->usersext_id,$function_userRelSta['active'])
			){
				
				$arm_option_add_contact_execute = "yes";
				
			}
			#
			
		}else{
			$arm_option_remove_contact = "yes";
			
			#
			if(
				!empty($_POST['remove_contact'])
			AND
				$profile_page_owner != "yes"
			AND
				in_array($function_myOfficeArm['owner_user_object']->usersext_id,$function_userRelSta['active'])
			){
				
				$arm_option_remove_contact_execute = "yes";
				
			}
			#
			
		}
		#
		
    }
    #arm (close)
    
    #mysql (open)###
    if(1==1){
		
		#update (open)
		if(1==1){
			
			#update my profile (open)
			if(!empty($_POST) AND $profile_editing_right == "yes"){
				
				#statement (open)
				if(1==1){
					$update_statement = $_POST['update_profile_statement'];
					#function-sanitize-text.php
					   $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
					   $function_sanitize_text__text = $update_statement;
					   include('#function-sanitize-text.php');
					   $update_statement = $function_sanitize_text__text_sanitized;
						
					$GLOBALS['wpdb']->update(
						   'fi4l3fg_voluno_users_extended',
						array( //updated content
						   'usersext_statement' => $update_statement
						),
						array( //location of updated content
						   'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
						),
						array( //format of updated content
						   '%s'
						),
						array( //format of location of updated content
						   '%s'
						));
				}
				#statement (close)
				
				#personal info (open)
				if(1==1){
					
					#gender (open)
					if(1==1){
						
						$update_gender = $_POST['update_profile_gender'];
						
						#
						if($update_gender != "Male" AND $update_gender != "Female"){
							$update_gender = "";
						}
						#
						
						$GLOBALS['wpdb']->update(
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_gender' => $update_gender
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								'%s'
							),
							array( //format of location of updated content
								'%s'
							)
						);
						
					}
					#gender (close)
					
					#residence (open)
					if(1==1){
						
						$update_profile_street = $_POST['update_profile_street'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_profile_street;
							include('#function-sanitize-text.php');
							$update_profile_street = $function_sanitize_text__text_sanitized;
						
						$update_area_code = $_POST['update_profile_area_code'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_area_code;
							include('#function-sanitize-text.php');
							$update_area_code = $function_sanitize_text__text_sanitized;
						
						$update_profile_state = $_POST['update_profile_state'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_profile_state;
							include('#function-sanitize-text.php');
							$update_profile_state = $function_sanitize_text__text_sanitized;
						
						$update_city = $_POST['update_profile_city'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_city;
							include('#function-sanitize-text.php');
							$update_city = $function_sanitize_text__text_sanitized;
						
						$update_country = $_POST['update_profile_country'];
						$update_country = intval($update_country);
						
						$GLOBALS['wpdb']->update(
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_street' => $update_profile_street,
								'usersext_areaCode' => $update_area_code,
								'usersext_city' => $update_city,
								
								'usersext_state' => $update_profile_state,
								'usersext_country' => $update_country
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								'%s','%s','%s', 
								'%s', '%d'
							),
							array( //format of location of updated content
								'%s'
							)
						);
						
					}
					#residence (close)
					
					#age / date of birth (open)
					if(1==1){
						
						#
						if(empty($_POST['update_profile_age_day'])){
							
							$date = "0000-00-00";
							
						}else{
							
							$date = date("Y-m-d",strtotime($_POST['update_profile_age_day']));
							
						}
						#
						
						$GLOBALS['wpdb']->update(
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_birthDate' => $date
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								'%s'
							),
							array( //format of location of updated content
								'%s'
							)
						);
						
					}
					#age / date of birth (close)
					
					#occupation (open)
					if(1==1){
					$update_occupation = $_POST['update_profile_occupation'];
					#function-sanitize-text.php
						$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
						$function_sanitize_text__text = $update_occupation;
						include('#function-sanitize-text.php');
						$update_occupation = $function_sanitize_text__text_sanitized;
		
					$GLOBALS['wpdb']->update(
							   'fi4l3fg_voluno_users_extended',
						array( //updated content
							   'usersext_occupation' => $update_occupation
						),
						array( //location of updated content
							   'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
						),
						array( //format of updated content
							   '%s'
						),
						array( //format of location of updated content
							   '%s'
							));
					}
					#occupation (close)
					
					#resume (open)
					if(1==1){
						
						#delete resume (open)
						if($_POST['delete_resume_hidden_form_field'] == "true"){
							
							#delete old resume (open)
							if(1==1){
								
								#check if old resume exists (open)
								if(1==1){
									
									$delete_old_resume['query'] = $GLOBALS['wpdb']->prepare(
										'SELECT *
										FROM fi4l3fg_voluno_files2
										WHERE vol_file_type_id1 = %s
											AND vol_file_type_name3 = "user_profile_resume";'
										,$function_myOfficeArm['owner_user_id']
									);
									$delete_old_resume['results'] = $GLOBALS['wpdb']->get_results($delete_old_resume['query']);
									
									#array creation for deletion on update (open)
									for($amt=0;$amt<count($delete_old_resume['results']);$amt++){
										
										$array_of_old_resumes_file_ids[] = $delete_old_resume['results'][$amt]->vol_file_id;
										
									}
									#array creation for deletion on update (close)
									
								}
								#check if old resume exists (close)
								
								#function-files.php (v1.0) (open)
								if(1==1){
									
									#documentation (open)
									if(1==1){
										
										// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
										
									}
									#documentation (close)
									
									#input (open)
									if(1==1){
										
										#$function_files['file_author_id'] = $function_myOfficeArm['owner_user_id'];// id of author of files. default: 'current_user'
										
										$function_files['action'] = 'delete'; // 'use', 'upload' or 'delete'.
										
										#delete (open)
										if(1==1){
											
											$function_files['vol_file_ids_to_delete_array'] = $array_of_old_resumes_file_ids;
											//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
											
										}
										#delete (close)
										
									}
									#input (close)
									
									include('#function-files.php');
									
								}
								#function-files.php (v1.0) (close) 
								
							}
							#delete old resume (close)
							
							#update users_extended (open)
							if(1==1){
								
								$GLOBALS['wpdb']->update(
									'fi4l3fg_voluno_users_extended',
									array( //updated content
										'usersext_resume' => ''
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
								
							}
							#update users_extended (close)
							
						}
						#delete resume (close)
						
						#insert/replace new resume (open)
						if(!empty($_POST['update_profile_resume_check'])){
							
							#delete old resume (open)
							if(1==1){
								
								#check if old resume exists (open)
								if(1==1){
									
									$delete_old_resume_for_new_one['query'] = $GLOBALS['wpdb']->prepare(
										'SELECT *
										FROM fi4l3fg_voluno_files2
										WHERE vol_file_type_id1 = %s
											AND vol_file_type_name3 = "user_profile_resume";'
										,$function_myOfficeArm['owner_user_id']
									);
									$delete_old_resume_for_new_one['results'] = $GLOBALS['wpdb']->get_results($delete_old_resume_for_new_one['query']);
									
									#array creation for deletion on update (open)
									for($amt=0;$amt<count($delete_old_resume_for_new_one['results']);$amt++){
										
										$array_of_old_resumes_to_be_replaced_file_ids[] = $delete_old_resume_for_new_one['results'][$amt]->vol_file_id;
										
									}
									#array creation for deletion on update (close)
									
								}
								#check if old resume exists (close)
								
								#function-files.php (v1.0) (open)
								if(1==1){
									
									#documentation (open)
									if(1==1){
										
										// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
										
									}
									#documentation (close)
									
									#input (open)
									if(1==1){
										
										#$function_files['file_author_id'] = $function_myOfficeArm['owner_user_id'];// id of author of files. default: 'current_user'
										
										$function_files['action'] = 'delete'; // 'use', 'upload' or 'delete'.
										
										#delete (open)
										if(1==1){
											
											$function_files['vol_file_ids_to_delete_array'] = $array_of_old_resumes_to_be_replaced_file_ids;
											//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
											
										}
										#delete (close)
										
									}
									#input (close)
									
									include('#function-files.php');
									
								}
								#function-files.php (v1.0) (close) 
								
							}
							#delete old resume (close)
							
							//add new resume
							#function-files.php (v1.0) (open)
							if(1==1){
								
								#documentation (open)
								if(1==1){
									
									// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
									
								}
								#documentation (close)
								
								#input (open)
								if(1==1){
									
									#$function_files['file_author_id'] = $function_myOfficeArm['owner_user_id'];// id of author of files. default: 'current_user'
									
									$function_files['action'] = 'upload'; // 'use', 'upload' or 'delete'.
									
									#upload + add (open)
									if(1==1){
										
										//if it's from form
										$function_files['file_input_field_name'] = 'update_profile_resume'; //E.g.: 'message_attachments'; <- from $_FILES['message_attachments'];
										// Name of specific form file input field. Can be one or more files.
										
										$function_files['categorization_array'] = [ //type general, type specific, etc. Helps to categorize the file.
											['name' => 'user_data','id' => $function_myOfficeArm['owner_user_id']], //level 1
											['name' => 'resume','id' => ''], //level 2
											['name' => 'user_profile_resume','id' => ''] //level 3
										];
										
										$function_files['mime_types_array'] = ['application/pdf']; //array of allowed mime types. If empty, all mime types stored in fi4l3fg_voluno_file_extensions are applied.
										//for example: ['image/gif','image/jpeg','image/jpg','image/png','image/bmp','image/tiff','image/tif'];
										
										$function_files['new_file_names_array'] = [ //if empty, original files names are stored. If not empty, these file names are stored. Must be an array.
											sanitize_file_name('Voluno-resume-'.$function_myOfficeArm['owner_user_object']->usersext_displayName.'.pdf')
										];
										
									}
									#upload + add (close)
									
								}
								#input (close)
								
								include('#function-files.php');
								
								#output (open)
								if(1==1){
									
									#upload (open)
									if(1==1){
										
										#$function_files['error']; //error message in case the upload doesn't work. Otherwise empty.
										// - "File type not allowed: FILETYPE"
										
										#$function_files['inserted_file_ids_array']; //array of ids of inserted files. e.g. ['vol_file_id_222','vol_file_id_123']
										
										$resume_is_not_pdf = $function_files['error'];
										
									}
									#upload (close)
									
								}
								#output (close)
								
							}
							#function-files.php (v1.0) (close) 
							
							#update users_extended (open)
							if(1==1){
								
								$GLOBALS['wpdb']->update(
									'fi4l3fg_voluno_users_extended',
									array( //updated content
										'usersext_resume' => $function_files['inserted_file_ids_array'][0]
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
								
							}
							#update users_extended (close)
							
						}
						#insert/replace new resume (close)
						
					}
					#resume (close)
					
					#biography (open)
					if(1==1){
					$update_bio = $_POST['update_profile_biography'];
					#function-sanitize-text.php
						$function_sanitize_text__type = "plain text with line breaks (biography)";
						$function_sanitize_text__text = $update_bio;
						include('#function-sanitize-text.php');
						$update_bio = $function_sanitize_text__text_sanitized;
		
					$GLOBALS['wpdb']->update(
							   'fi4l3fg_voluno_users_extended',
						array( //updated content
							   'usersext_biography' => $update_bio
						),
						array( //location of updated content
							   'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
						),
						array( //format of updated content
							   '%s'
						),
						array( //format of location of updated content
							   '%s'
							));
					}
					#biography (close)
					
				}
				#personal info (close)
				
				#contact info (open)
				if(1==1){
					
					#email adress (open)
					if(1==1){
						
						$new_email = sanitize_email($_POST['update_profile_email']);
						
						#
						if(is_email($new_email) AND $function_myOfficeArm['owner_user_object']->usersext_userEmail != $new_email){
							
							#check if email address already exists and display div if yes (open)
							if(1==1){
								
								$check_if_email_address_already_exists_query = $GLOBALS['wpdb']->prepare('SELECT *
																FROM fi4l3fg_voluno_users_extended
																WHERE usersext_userEmail = %s'
																,$new_email);
								$check_if_email_address_already_exists_row = $GLOBALS['wpdb']->get_row($check_if_email_address_already_exists_query);
								
								#function-fixed-div.php type 2 (v1.0) (open)
								if(!empty($check_if_email_address_already_exists_row)){
									
									$update_email_error = "email address already exists";
									
									#$function_fixed_div['class_name'] => 'mysql_loaded_code'; //optional, only needed if you want to use this
									$function_fixed_div['title'] = 'Email address already exists in database';
									$function_fixed_div['text'] = 'The email address could not be updated, since another member already uses the new
													address you provided.
													<br>
													<br>
													Do you have a second account at Voluno? If so, please close one account.
													For security reasons, we only accept one account per person. It\'s also
													in your interest, since it becomes easier to gain a strong reputation
													and many experience points when using only one account.
													<br>
													<br>
													If you suspect that someone else might use your email address
													without your consent, please contact us immediately.';
									#$function_fixed_div['text_text_align'] = "center"; //default:justify
									$function_fixed_div['dark_bg_div'] = "yes"; //default: no
									$function_fixed_div['hide_button_text'] = "Ok"; //default: Hide
									$function_fixed_div['width'] = 500; //default:250 (px)
									#$function_fixed_div['hide_after_x_milliseconds'] = 2000; //default: empty, don't fade out
									
									$function_fixed_div__version = 2; //obligatory
									include('#function-fixed-div.php');
									echo $function_fixed_div;
									
									#automatically fades in itself and fadesout the load img
									
								}
								#function-fixed-div.php type 2 (v1.0) (close)
								
							}
							#check if email address already exists and display div if yes (close)
							
							#preliminarily change database, waiting for mail confirmation (open)
							if(empty($update_email_error)){
								
								#database query delete (open)
								if(1==1){
									
									$GLOBALS['wpdb']->delete(
										'fi4l3fg_voluno_personal_settings',
										array( //location of row to delete
											'pers_settings_user_id'   => $function_myOfficeArm['owner_user_object']->usersext_id,
											'pers_settings_general'   => "my profile",
											'pers_settings_specific'  => "update email address"
										),
										array( //format of location of row to delete
											'%s','%s','%s',
										)
									);
									
								}
								#database query delete (close)
								
								#random number (v1.0) (open)
								if(1==1){
									unset($voluno_random_num);
									$length = 70;
									for($i = 0; $i < $length; $i++) {
									$voluno_random_num
										= $voluno_random_num.
										substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
									}
								}
								#random number (v1.0) (close)
								
								#database query insert (open)
								if(1==1){
									
									$GLOBALS['wpdb']->insert(
										'fi4l3fg_voluno_personal_settings',
										array(
											'pers_settings_user_id'              => $function_myOfficeArm['owner_user_object']->usersext_id,
											'pers_settings_general'              => "my profile",
											'pers_settings_specific'             => "update email address",
											'pers_settings_content_varchar1000'  => $new_email,
											'pers_settings_content_text'         => $voluno_random_num,
											
											'pers_settings_date_modified' => date("Y-m-d H:i:s"),
											'pers_settings_date_created' => date("Y-m-d H:i:s")
										),
										array(
											'%s','%s','%s','%s',
											'%s','%s'
										)
									);
									
								}
								#database query insert (close)
								
							}
							#preliminarily change database, waiting for mail confirmation (close)
							
							#send email to confirm email change (open)
							if(empty($update_email_error)){
								
								#function-emails.php (v1.0) (open)
								if(1==1){
									$function_admin_emails['recipient_id_or_email_address'] = $new_email; //finds email address, default is steve's id (1). also accepts mail addresse
									$function_admin_emails['email_content_id'] = 4; //please select id
									$function_admin_emails['placeholders'] =
									array(
									array(
										'ph_name' => 'user_display_name',
										'ph_value' => $function_myOfficeArm['owner_user_object']->usersext_displayName
									),
									array(
										'ph_name' => 'confirmation_link',
										'ph_value' => get_permalink(852).'?email_confirmation_code='.$voluno_random_num
									)
									);
									include('#function-emails.php');
									#output: $function_admin_emails == TRUE or FALSE if sent successfully
									
									#function-fixed-div.php type 2 (v1.0) (open)
									if(1==1){
									
									#$function_fixed_div['class_name'] => 'mysql_loaded_code'; //optional, only needed if you want to use this
									$function_fixed_div['title'] = 'Email address change confirmation';
									$function_fixed_div['text'] = 'We sent an email to your new email address.
													Please confirm ownership by clicking on the link in that email.';
									#$function_fixed_div['text_text_align'] = "center"; //default:justify
									$function_fixed_div['dark_bg_div'] = "yes"; //default: no
									$function_fixed_div['hide_button_text'] = "Ok"; //default: Hide
									$function_fixed_div['width'] = 250; //default:250 (px)
									#$function_fixed_div['hide_after_x_milliseconds'] = 2000; //default: empty, don't fade out
									
									$function_fixed_div__version = 2; //obligatory
									include('#function-fixed-div.php');
									echo $function_fixed_div;
									
									#automatically fades in itself and fadesout the load img
									
									}
									#function-fixed-div.php type 2 (v1.0) (close)
									
								}
								#function-emails.php (v1.0) (close)
								
							}
							#send email to confirm email change (close)
							
						}
						#
						
					}
					#email adress (close)
					
					#password (open)
					if(isset($_POST['update_profile_password1'])){
						
						$new_password1 = $_POST['update_profile_password1'];
						$new_password2 = $_POST['update_profile_password2'];
						
						#$old_password = $_POST['update_profile_password_old'];
						
						#
						if($new_password1 == $new_password2 AND strlen($new_password1) >= 8){
							
							$userdata =
							array(
								'ID' => $function_myOfficeArm['owner_user_object']->usersext_id,
								'user_pass' => $new_password1
							);
							
							#perfect copy of function wp_update_user, except for sending the email at the end (open)
							if(1==1){
								
								if ( $userdata instanceof stdClass ) {
									$userdata = get_object_vars( $userdata );
								} elseif ( $userdata instanceof WP_User ) {
									$userdata = $userdata->to_array();
								}
								
								$ID = isset( $userdata['ID'] ) ? (int) $userdata['ID'] : 0;
								if ( ! $ID ) {
									return new WP_Error( 'invalid_user_id', __( 'Invalid user ID.' ) );
								}
								
								// First, get all of the original fields
								$user_obj = get_userdata( $ID );
								if ( ! $user_obj ) {
									return new WP_Error( 'invalid_user_id', __( 'Invalid user ID.' ) );
								}
								
								$user = $user_obj->to_array();
								
								// Add additional custom fields
								foreach ( _get_additional_user_keys( $user_obj ) as $key ) {
									$user[ $key ] = get_user_meta( $ID, $key, true );
								}
								
								// Escape data pulled from DB.
								$user = add_magic_quotes( $user );
								
								#
								if ( ! empty( $userdata['user_pass'] ) && $userdata['user_pass'] !== $user_obj->user_pass ) {
									// If password is changing, hash it now
									$plaintext_pass = $userdata['user_pass'];
									$userdata['user_pass'] = wp_hash_password( $userdata['user_pass'] );
			 
								
								 #* Filter whether to send the password change email.
								 #
								 # @since 4.3.0
								 #
								 # @see wp_insert_user() For `$user` and `$userdata` fields.
								 #
								 # @param bool  $send     Whether to send the email.
								 # @param array $user     The original user array.
								 # @param array $userdata The updated user array.
								 #
								 
									$send_password_change_email = apply_filters( 'send_password_change_email', true, $user, $userdata );
								}
								#
								
								#
								if ( isset( $userdata['user_email'] ) && $user['user_email'] !== $userdata['user_email'] ) {
									
								 # Filter whether to send the email change email.
								 #
								 # @since 4.3.0
								 #
								 # @see wp_insert_user() For `$user` and `$userdata` fields.
								 #
								 # @param bool  $send     Whether to send the email.
								 # @param array $user     The original user array.
								 # @param array $userdata The updated user array.
								 
									$send_email_change_email = apply_filters( 'send_email_change_email', true, $user, $userdata );
								}
								#
								
								#wp_cache_delete( $user['user_email'], 'useremail' );
								
								// Merge old and new fields with new fields overwriting old ones.
								$userdata = array_merge( $user, $userdata );
								$user_id = wp_insert_user( $userdata );
								
							}
							#perfect copy of function wp_update_user, except for sending the email at the end (close)
							
							#function-emails.php (v1.0) (open)
							if(1==1){
								$function_admin_emails['recipient_id_or_email_address'] = $function_myOfficeArm['owner_user_object']->usersext_id; //finds email address, default is steve's id (1). also accepts mail addresse
								$function_admin_emails['email_content_id'] = 5; //please select id
								$function_admin_emails['placeholders'] =
								array(
									array(
									'ph_name' => 'display_name',
									'ph_value' => $function_myOfficeArm['owner_user_object']->usersext_displayName
									)
								);
								include('#function-emails.php');
								#output: $function_admin_emails == TRUE or FALSE if sent successfully
							}
							#function-emails.php (v1.0) (close)
							
							echo '
							<form class="update_password_form" method="post" action="'.wp_logout_url(get_home_url()).'">
								<input name="login_email" value="'.$function_myOfficeArm['owner_user_object']->usersext_userEmail.'" type="hidden">
								<input name="user_password" value="'.$new_password1.'" type="hidden">
							</form>
							<script>
								jQuery(".update_password_form").submit();
							</script>';
							
							#$refresh_page = "yes";
							#$refresh_page_address = wp_logout_url(get_home_url());
							#https://www.volunteernetw                   orkfordevelopment.org/voluno/wp-login.php?action=logout&redirect_to=http%3A%2F%2Fwww.volunteernetworkford                          evelopment.org%2Fvoluno&_wpnonce=24c6ed5830
						}
						#
						
					}
					#password (close)
					
					#phone (open)
					if(1==1){
						
						$update_profile_phone = $_POST['update_profile_phone'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_profile_phone;
							include('#function-sanitize-text.php');
							$update_profile_phone = $function_sanitize_text__text_sanitized;
							
						$GLOBALS['wpdb']->update(
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_phone' => $update_profile_phone
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								'%s'
							),
							array( //format of location of updated content
								'%s'
							)
						);
					}
					#phone (close)
					
					#skype (open)
					if(1==1){
						
						$update_profile_skype = $_POST['update_profile_skype'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_profile_skype;
							include('#function-sanitize-text.php');
							$update_profile_skype = $function_sanitize_text__text_sanitized;
							
						$GLOBALS['wpdb']->update(
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_skype' => $update_profile_skype
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								'%s'
							),
							array( //format of location of updated content
								'%s'
							)
						);
						
					}
					#skype (close)
					
					#whatsapp (open)
					if(1==1){
						
						$update_profile_whatsapp = $_POST['update_profile_whatsapp'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_profile_whatsapp;
							include('#function-sanitize-text.php');
							$update_profile_whatsapp = $function_sanitize_text__text_sanitized;
							
						$GLOBALS['wpdb']->update(
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_whatsapp' => $update_profile_whatsapp
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								'%s'
							),
							array( //format of location of updated content
								'%s'
							)
						);
						
					}
					#whatsapp (close)
					
					#facebook (open)
					if(1==1){
						
						$update_profile_facebook = $_POST['update_profile_facebook'];
					#function-sanitize-text.php
						$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
						$function_sanitize_text__text = $update_profile_facebook;
						include('#function-sanitize-text.php');
						$update_profile_facebook = $function_sanitize_text__text_sanitized;
		
					   #remove preceeding link (open)
					   if(1==1){
						$remove_facebook_link_array = array(
							'https://www.facebook.com/',
							'http://www.facebook.com/',
							'www.facebook.com/',
							'https://facebook.com/',
							'http://facebook.com/',
							'facebook.com/'
						);
							
						for($aep=0;$aep<count($remove_facebook_link_array);$aep++){
							$update_profile_facebook = str_replace($remove_facebook_link_array[$aep],'',$update_profile_facebook);
						}
					   }
					   #remove preceeding link (close)
						
						$GLOBALS['wpdb']->update(
							'fi4l3fg_voluno_users_extended',
							array( //updated content
								'usersext_facebook' => $update_profile_facebook
							),
							array( //location of updated content
								'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
							   '%s'
							),
							array( //format of location of updated content
							   '%s'
							)
						);
						
					}
					#facebook (close)
					
					#twitter (open)
					if(1==1){
						
						$update_profile_twitter = $_POST['update_profile_twitter'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_profile_twitter;
							include('#function-sanitize-text.php');
							$update_profile_twitter = $function_sanitize_text__text_sanitized;
							
							#remove preceeding link (open)
							if(1==1){
							$remove_twitter_link_array = array(
								'https://www.twitter.com/',
								'http://www.twitter.com/',
								'www.twitter.com/',
								'https://twitter.com/',
								'http://twitter.com/',
								'twitter.com/'
							);
			
							for($aep=0;$aep<count($remove_twitter_link_array);$aep++){
								$update_profile_twitter = str_replace($remove_twitter_link_array[$aep],'',$update_profile_twitter);
							}
							}
							#remove preceeding link (close)
			
						$GLOBALS['wpdb']->update(
								   'fi4l3fg_voluno_users_extended',
							array( //updated content
								   'usersext_twitter' => $update_profile_twitter
							),
							array( //location of updated content
								   'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								   '%s'
							),
							array( //format of location of updated content
								   '%s'
								));
					}
					#twitter (close)
					
					#website (open)
					if(1==1){
						
						$update_profile_website = $_POST['update_profile_website'];
						#function-sanitize-text.php
							$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
							$function_sanitize_text__text = $update_profile_website;
							include('#function-sanitize-text.php');
							$update_profile_website = $function_sanitize_text__text_sanitized;
			
						$GLOBALS['wpdb']->update(
								   'fi4l3fg_voluno_users_extended',
							array( //updated content
								   'usersext_website' => $update_profile_website
							),
							array( //location of updated content
								   'usersext_id' => $function_myOfficeArm['owner_user_object']->usersext_id
							),
							array( //format of updated content
								   '%s'
							),
							array( //format of location of updated content
								   '%s'
								)
							);
						
					}
					#website (close)
					
				}
				#contact info (close)
				
			}
			#update my profile (close)
			
			#add contact (open)
			if($arm_option_add_contact_execute == "yes"){ //only execute if a) activated, b) it's not me and c) user is NOT yet my contact
				
				#function-contact-add-remove.php (v1.0) (open)
				if(1==1){
					$function_contact_add_remove['active_user'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
					$function_contact_add_remove['passive_user'] = $function_myOfficeArm['owner_user_object']->usersext_id; //only one allowed.
					$function_contact_add_remove['action'] = "add"; //'add' or 'remove'
					#$function_contact_add_remove['type'] = "message"; //optional: message, else empty (looks up user settings regarding messages)
					include('#function-contact-add-remove.php');
				}
				#function-contact-add-remove.php (v1.0) (close)
				
				$refresh_page = "yes";
				
			}
			#add contact (close)
			
			#remove contact (open)
			if($arm_option_remove_contact_execute == "yes"){ //only execute if a) activated, b) it's not me and c) user is NOT yet my contact
				
				#function-contact-add-remove.php (v1.0) (open)
				if(1==1){
					$function_contact_add_remove['active_user'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
					$function_contact_add_remove['passive_user'] = $function_myOfficeArm['owner_user_object']->usersext_id; //only one allowed.
					$function_contact_add_remove['action'] = "remove"; //'add' or 'remove'
					#$function_contact_add_remove['type'] = "message"; //optional: message, else empty (looks up user settings regarding messages)
					include('#function-contact-add-remove.php');
				}
				#function-contact-add-remove.php (v1.0) (close)
				
				$refresh_page = "yes";
				
			}
			#remove contact (close)
			
			#function-redirect.php (v1.0) (open)
			if($refresh_page == "yes"){
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					#
					if(empty($refresh_page_address)){
						$function_redirect['redirect_url'] = get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_id;
					}else{
						$function_redirect['redirect_url'] = $refresh_page_address;
					}
					#
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close)
			
		}
		#update (close)
		
		#get data (open)
		if(1==1){
		   
			$profile_page_owner_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_users_extended
								  LEFT JOIN fi4l3fg_voluno_lists_countries as aaa_country_name
									 ON usersext_country = list_countries_id
								WHERE usersext_id = %s;'
								,$function_myOfficeArm['owner_user_object']->usersext_id);
			$function_myOfficeArm['owner_user_object'] = $GLOBALS['wpdb']->get_row($profile_page_owner_query);
		   
		}
		#get data (close)
		
    }
    #mysql (close)
	
    #jquery (open)
    if(1==1){
		
		echo '
		<script>
			jQuery(document).ready(function(){';
			
			#update browser title (my profile -> name) (open)
			if(array_intersect($function_myOfficeArm['role_array'],['owner'])){
				
				echo '
				jQuery(document).attr("title", "My profile - Voluno");';
				
			}else{
				
				echo '
				jQuery(document).attr("title", "'.$function_myOfficeArm['owner_user_object']->usersext_displayName.' - Voluno");';
				
			}
			#update browser title (my profile -> name) (close)
			
			#hover function_button (open)
			if($profile_editing_right == "no"){
				
				echo '
				jQuery(".function_button").hover(function(){
					jQuery(this).css("background-color","#FFD87D");
					jQuery(this).find(".function_button_popup").fadeIn(200);
				},function(){
					jQuery(this).css("background-color","#FFEAB9");
					jQuery(this).find(".function_button_popup").fadeOut(200);
				})';
				
			}
			#hover function_button (close)
			
			#add or remove contact (open)
			if(1==1){
				
				#add contact (open)
				if($arm_option_add_contact == "yes"){
					
					echo '
					jQuery(".add_contact_submit").click(function(){
						jQuery(".add_contact_form").submit();
					});
					';
					
				}
				#add contact (close)
				
				#remove contact (open)
				if($arm_option_remove_contact == "yes"){
					
					echo '
					jQuery(".remove_contact_submit").click(function(){
						jQuery(".remove_contact_form").submit();
					});
					';
					
				}
				#remove contact (close)
				
			}
			#add or remove contact (close)
			
			#edit profile (open)
			if($profile_editing_right == "yes"){
				
				#datepicker (open)
				if(1==1){
					
					echo '
					jQuery(".update_profile_age_day").datepicker({
						dateFormat: "DD, dd. MM yy",
						showOtherMonths: true,
						selectOtherMonths: true,
						changeMonth: true,
						changeYear: true,
						minDate:"-120y",
						maxDate:"-12y",
					});
					
					jQuery(".update_profile_age_day_clear_date").click(function(){
						jQuery(".update_profile_age_day").datepicker("setDate", null);
					});
					';
					
					#birth date (open)
					if($function_myOfficeArm['owner_user_object']->usersext_birthDate == "0000-00-00"){
						echo '
						jQuery(".update_profile_age_day").datepicker("setDate", null);
						';
					}
					#birth date (close)
					
				}
				#datepicker (close)
				
				#tooltip hover (open)
				if(1==1){
					
					#profile picture (open)
					if(1==1){
						
						echo '
						jQuery(".profile_edit_hover").hover(function(){
							jQuery(this).find(".profile_edit_tooltip").show();
						},function(){
							jQuery(this).find(".profile_edit_tooltip").hide();
						});';
						
					}
					#profile picture (close)
					
					#text (open)
					if(1==1){
						
						echo '
						jQuery(".profile_content_div").hover(function(){
							jQuery(".edit_profile_text_button").show();
						},function(){
							jQuery(".edit_profile_text_button").hide();
						})';
						
					}
					#text (close)
					
				}
				#tooltip hover (close)
				
				#activate and deactive edit mode (open)
				if(1==1){
					
					echo '
					jQuery(".edit_profile_text_button").click(function(){
						jQuery(".profile_page_edit").show();
						jQuery(".profile_page_editable").hide();
						jQuery(".profile_edit_tooltip").not(".profile_pic_tooltip").css("z-index","-500");
					});
					jQuery(".edit_profile_text_cancel").click(function(){
						jQuery(".profile_page_edit").hide();
						jQuery(".profile_page_editable").show();
						jQuery(".profile_edit_tooltip").css("z-index","500");
					});';
					
				}
				#activate and deactive edit mode (close)
				
				#change password (open)
				if(1==1){
					
					#empty password fields (open)
					if(1==1){
						
						echo '
						setTimeout(function(){
							jQuery(".password_input1, .password_input2").val("");
							jQuery(".password_input1").trigger("change");
						},200);
						';
						
					}
					#empty password fields (close)
					
					echo '
					jQuery(".password_input1").on("change keyup",function(){
						jQuery(".test").html(jQuery(".password_input1").val().length);
						if(jQuery(".password_input1").val().length == 0){
						jQuery(".password_input2").fadeOut(150);
						jQuery(".password2_info").html(" ");
						
						}else if(jQuery(".password_input1").val().length < 8){
						jQuery(".password2_info").html("Please use at least 8 characters.").css("color","red");
						
						}else{
						jQuery(".password_input2").fadeIn(150);
						jQuery(".password_input2").trigger("change");
						
						}
					});
					jQuery(".password_input2").on("keyup change",function(){
						
						if(jQuery(".password_input2").val().length == 0){
						jQuery(".password2_info").html("Please type your new password into both fields.").css("color","#F86A00");
						}else{
						if(jQuery(".password_input1").val() != jQuery(".password_input2").val()){
							jQuery(".password2_info").html("The passwords don\'t match.").css("color","red");
						}else{
							jQuery(".password2_info").html("The passwords match. To change the password, click save.").css("color","#006F00");
						}
						}
					});
					';
					
				}
				#change password (close)
				
				#primary email: please look at confirm email (open)
				if($primary_email_please_confirm_via_email == "yes"){
					
					echo '
					alert("'.
						'For security reasons, you need to confirm that the primary email address you entered actually belongs to you.\n'.
						'Please do so by visiting the link in the email we just sent you.\n\nThanks!'.
					'");';
					
				}
				#primary email: please look at confirm email (close)
				
				#resume update and delete (open)
				if(1==1){
				   
					#resume delete (open)
					if(!empty($function_myOfficeArm['owner_user_object']->usersext_resume)){ //only relevant if a resume already exists
					   
						echo '
						jQuery(".current_resume_file").hover(function(){
							jQuery(this).css("background-color","#FFF5E0");
							jQuery(this).css("cursor","pointer");
						},function(){
							jQuery(this).css("background-color","#FFC977");
							jQuery(this).css("cursor","default");
						});
						
						jQuery(".current_resume_file").click(function(){
							jQuery(".delete_resume_view_current_file span").trigger("click");
						});
						
						jQuery(".delete_resume_button").click(function(){
							deleteCvAreYouSure = confirm("Are you sure you want to delete your current resume?");
							if(deleteCvAreYouSure == true){
								jQuery(".delete_resume_hidden_form_field").val("true");
								submit_update_profile();
							}
						});
						';
						
					}
					#resume delete (close)
					
					#resume update (open)
					if(1==1){
						
						echo '
						jQuery(".select_resume_input_hidden").change(function(){
							jQuery(".select_resume_input_shown").val(jQuery(this).val());
							jQuery(".select_resume_input_hidden_check").val("true");
						});
						jQuery(".select_resume_activation_area").click(function(){
							jQuery(".select_resume_input_hidden").click();
						});
						';
						
					}
					#resume update (close)
				   
				}
				#resume update and delete (close)
			   
			}
			#edit profile (close)
			
			#resume upload error message + show resume div (open)
			if(1==1){
				
				echo '
				jQuery(".show_resume_div_button").click(function(){
					jQuery(".resume_div").fadeIn(300);
				});';
				
				#
				if($resume_is_not_pdf == "no"){
					
					echo '
					alert("The file you uploaded is not a valid PDF document. Please only upload PDF files.");';
					
				}
				#
			   
			}
			#resume upload error message + show resume div (close)
			
			#submit form (open)
			if(1==1){
				
				echo '
				jQuery(".edit_profile_text_save").click(function(){
					submit_update_profile();
				});
				
				function submit_update_profile(){
					
					var password1length = jQuery(".password_input1").val().length;
					var password1 = jQuery(".password_input1").val();
					var password2 = jQuery(".password_input2").val();
					
					if(password1length != 0 && password1 != password2){
						
						alert("Your new passwords don\'t match. Please retype them.\nAlternatively, please just delete them.");
						
					}else if(password1length != 0 && password1length < 8){
						
						alert("Your new password is too short. Please use at least 8 characters.\nAlternatively, please just delete it.");
						
					}else{
						
						if(password1length != 0){
						alert("Since you updated your password, you will be logged out, for security reasons.'.
							'\nThis is a normal procedure. Please just login again.");
						}
						jQuery(".update_profile").submit();
						
					}
					
				}';
				
			}
			#submit form (close)
			
			echo '
			});
		</script>';
		
    }
    #jquery (close)
    
    #style (open)
    if(1==1){
		
		echo '
		<style>
			
			.profile_content_div{
				border-radius:20px;
				padding:20px;
				margin-bottom:20px;
				background-color:#FFEAB9
			}
			
			.profile_content_div:hover{
				border-radius:20px;
				padding:20px;
				margin-bottom:20px;
				background-color:#FFD87D;
			}
			
			
			.profile_content_div h4{
				display:inline;
			}
			
			.function_button{
				cursor:pointer;
			}
			
			.voluno_button, .profile_edit_tooltip, .edit_profile_text_cancel, .edit_profile_text_save{
				cursor:pointer;
				background-color:#8B0000 !important;
				margin-top:5px;
				color:#fff;
				padding:10px;
				border-radius:250px;
				font-weight:bold;
				text-align: center;
				color:#fff;
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			.voluno_button:hover, .profile_edit_tooltip:hover, .edit_profile_text_cancel:hover, .edit_profile_text_save:hover{
				background-color: #D6341D !important;
			} 
			
			.content_div_title_td{
				font-weight:bold;
				text-align:right;
				padding-right:20px !important;
			}
			
			.content_div_content_td{
				text-align:justify;
			}';
			
			#edit profile (open)
			if($profile_editing_right == "yes"){
				
				echo '
				.profile_edit_tooltip{
					position:absolute;
					display:none;
				}
				
				.profile_page_edit{
					display:none;
					text-align:center;
				}
				
				.profile_page_editable{
			   
				}
				
				.edit_profile_text_cancel{
			   
				}
				
				';
				
			}
			#edit profile (close)
		   
		echo '
		</style>';
		
    }
    #style (close)
    
    #content (open) ###
    if(1==1){
       
		#img processing function executions (open)
		if(1==1){
			
			#function-image-processing.php --> open brackets
			#thematic only
				$function_propic__type = "thematic";
				$function_propic__original_img_name = "quote.png";
			#all
				$function_propic__geometry = array(10,10); //optional, if e.g. only width: 300, NULL; vice versa
			include('#function-image-processing.php');
			$function_propic1 = $function_propic;
			
			#function-image-processing.php --> close brackets
			#thematic only
				$function_propic__type = "thematic";
				$function_propic__original_img_name = "quote.png";
			#all
				$function_propic__geometry = array(10,10); //optional, if e.g. only width: 300, NULL; vice versa
				$function_propic__rotate = 180; //optional, default: 0
			include('#function-image-processing.php');
			$function_propic2 = $function_propic;
			
			#function-image-processing.php --> edit img
			#thematic only
				$function_propic__type = "thematic";
				$function_propic__original_img_name = "edit_white.png";
			#all
				$function_propic__geometry = array(30,30); //optional, if e.g. only width: 300, NULL; vice versa
			include('#function-image-processing.php');
			
			$function_propic_edit_profile_img_path_full = $function_propic;
			
		}
		#img processing function executions (close)
       
		#form opening (open)
		if($profile_editing_right == "yes"){
			
			echo '
			<form
				action="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'"
				method="post"
				name="update_profile"
				class="update_profile"
				enctype="multipart/form-data"
				autocomplete="off"
			>';
			
		}
		#form opening (close)
       
		echo '
		<table>
			<tr>
			<td style="width:70%;padding-right:20px;">';
				
				#left side of container (open)
				if(1==1){
					
					#title (open)
					if(1==1){
						
						echo '
						<div style="text-align:center;margin-bottom:30px;">
							<h1 style="display:inline;">
								Profile of '.$function_myOfficeArm['owner_user_object']->usersext_displayName.'
							</h1>
						</div>';
						
					}
					#title (close)
					
					#pers statement (open)
					if(!empty($function_myOfficeArm['owner_user_object']->usersext_statement) OR $profile_editing_right == "yes"){
						
						#preparation (open)
						if(1==1){
							
							#edit elements (open)
							if($profile_editing_right == "yes"){
								
								$user_statement['cancel_button'] = '
								<span class="edit_profile_text_cancel profile_page_edit">Cancel</span>';
								
								$user_statement['edit_form_field'] = '
								<textarea '.
									'style="width:300px;height:1em;resize:vertical;" '.
									'maxlength="150" '.
									'name="update_profile_statement" '.
									'class="profile_page_edit"
								>'.
									$function_myOfficeArm['owner_user_object']->usersext_statement.
								'</textarea>';
								
								$user_statement['save_button'] = '
								<span class="edit_profile_text_save profile_page_edit">Save</span>';
								
							}
							#edit elements (close)
							
							#user statement or placeholder (open)
							if(empty($function_myOfficeArm['owner_user_object']->usersext_statement)){
								
								$user_statement['actual_user_statement'] = '
								<span style="color:grey;font-style:italic;">
									(No personal statement added.)
								</span>';
								
							}else{
								
								$user_statement['actual_user_statement'] = 
								$function_myOfficeArm['owner_user_object']->usersext_statement;
								
							}
							#user statement or placeholder (close)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
							
							echo '
							<div style="text-align:center;margin-bottom:25px;" class="profile_edit_hover">
								'.$user_statement['cancel_button'].'
								<img src="'.$function_propic1.'" style="margin:-20px 5px 0px 0px;">
								<span class="profile_page_editable">
									'.$user_statement['actual_user_statement'].'
								</span>
								'.$user_statement['edit_form_field'].'
								<img src="'.$function_propic2.'" style="margin:15px 0px 0px 5px;" class="easy_to_position_img">
								'.$user_statement['save_button'].'
							</div>';
							
						}
						#content (close)
						
					}
					#pers statement (close)
					
					#content div: personal information (open)
					if(1==1){
						
						#preparation (open)
						if(1==1){
							
							#edit rights (open)
							if($profile_editing_right == 'yes'){
								
								#edit tooltip (get image [only once] and create div) (open)
								if(1==1){
									
									$personal_information['edit_tooltip'] = '
									<div
										class="profile_edit_tooltip edit_profile_text_button"
										style="margin:-40px 0px 0px 520px;" title="Edit profile text"
									>
										<img src="'.$function_propic_edit_profile_img_path_full.'">
									</div>';
									
								}
								#edit tooltip (get image [only once] and create div) (open)
								
								#preparation of edit fields for array (open)
								if(1==1){
									
									#gender (open)
									if(1==1){
										
										#prepare (open)
										if(1==1){
											
											$gender_array = array("Female", "Male", "");
											
											#loop (open)
											for($x_gender=0;$x_gender<count($gender_array);$x_gender++){
												
												#selected (open)
												if($function_myOfficeArm['owner_user_object']->usersext_gender == $gender_array[$x_gender]){
													
													$selected = 'selected="selected"';
													
												}else{
													
													$selected = '';
													
												}
												#selected (close)
												
												$input_gender =
												$input_gender.'
												<option '.$selected.' value="'.$gender_array[$x_gender].'">
													'.$gender_array[$x_gender].'
												</option>';
												
											}
											#loop (close)
											
										}
										#prepare (close)
										
										$input_gender =
										'<select name="update_profile_gender">
											'.$input_gender.'
										</select>';
										
									}
									#gender (close)
									
									#place of residence (open)
									if(1==1){
										
										#prepare (open)
										if(1==1){
											
											#query (open)
											if(1==1){
												
												$input_residence_country_query = $GLOBALS['wpdb']->prepare(
													'SELECT *
													FROM fi4l3fg_voluno_lists_countries
													WHERE list_countries_type = "country"
													ORDER BY list_countries_name ASC;'
												);
												$input_residence_country_results = $GLOBALS['wpdb']->get_results($input_residence_country_query);
												
											}
											#query (close)
											
											#loop (open)
											for($amr=0;$amr<count($input_residence_country_results);$amr++){
												
												#selected (open)
												if($function_myOfficeArm['owner_user_object']->usersext_country == $input_residence_country_results[$amr]->list_countries_id){
													
													$selected = 'selected="selected"';
													
												}else{
													
													unset($selected);
													
												}
												#selected (close)
												
												$input_residence_country['options'] .= '
												<option
													'.$selected.'
													value="'.$input_residence_country_results[$amr]->list_countries_id.'"
												>
													'.$input_residence_country_results[$amr]->list_countries_name.'
												</option>';
												
											}
											#loop (close)
											
										}
										#prepare (close)
										
										$input_residence_street = 
										'<input type="text" value="'.$function_myOfficeArm['owner_user_object']->usersext_street.'" name="update_profile_street">';
										
										$input_residence_area_code = 
										'<input type="text" value="'.$function_myOfficeArm['owner_user_object']->usersext_areaCode.'" name="update_profile_area_code">';
										
										$input_residence_city =
										'<input type="text" value="'.$function_myOfficeArm['owner_user_object']->usersext_city.'" name="update_profile_city">';
										
										$input_residence_state = 
										'<input type="text" value="'.$function_myOfficeArm['owner_user_object']->usersext_state.'" name="update_profile_state">';
										
										$input_residence_country =
										'<select name="update_profile_country">
											'.$input_residence_country['options'].'
										</select>';
										
									}
									#place of residence (close)
									
									#age (open)
									if(1==1){
										
										#prepare (open)
										if(1==1){
											
											#selected (open)
											if($function_myOfficeArm['owner_user_object']->usersext_birthDate == "0000-00-00"){
												
												$selected_nothing = 'selected="selected"';
												
											}else{
												
												unset($selected_nothing);
												
											}
											#selected (close)
											
											#actual value (open)
											if($function_myOfficeArm['owner_user_object']->usersext_birthDate != "0000-00-00 00:00:00"){
												
												$input_age['input_form_value'] = 
												date('l, d. F Y',strtotime($function_myOfficeArm['owner_user_object']->usersext_birthDate));
												
											}
											#actual value (close)
											
										}
										#prepare (close)
										
										$input_age =
										'<input
											type="text"
											class="update_profile_age_day"
											name="update_profile_age_day"
											readonly="readonly"
											style="width:60%;text-align:center;"
											value="'.$input_age['input_form_value'].'"
										>
										<div class="voluno_button update_profile_age_day_clear_date">
											Clear date
										</div>';
										
									}
									#age (close)
									
									#occupation (open)
									if(1==1){
										
										$input_occupation =
										'<input
											type="text"
											value="'.$function_myOfficeArm['owner_user_object']->usersext_occupation.'"
											name="update_profile_occupation"
										>';
										
									}
									#occupation (close)
									
									#resume (open)
									if(1==1){
										
										#edit menu: show and delete current resume (open)
										if(!empty($function_myOfficeArm['owner_user_object']->usersext_resume)){
											
											#function-files.php (v1.0) (open)
											if(1==1){
												
												#documentation (open)
												if(1==1){
													
													// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
													
												}
												#documentation (close)
												
												#input (open)
												if(1==1){
													
													$function_files['action'] = 'use'; // 'use', 'upload' or 'delete'.
													
													#use (open)
													if(1==1){
														
														$function_files['files_to_use_by_file_id'] = [
															$function_myOfficeArm['owner_user_object']->usersext_resume
														];
														//nicenames of files to use. must be an array.
														
													}
													#use (close)
													
												}
												#input (close)
												
												include('#function-files.php');
												
												#output (open)
												if(1==1){
													
													#use (open)
													if(1==1){
														
														# $function_files['full_url_paths_for_use'] //array: keys = nicenames, values = full paths
														// <img src="'.$function_files['full_url_paths_for_use']['testimage.png'].'">
														
														#$function_files['full_url_paths_for_use_via_filename'][$function_myOfficeArm['owner_user_object']->usersext_resume] #full url path
														#$function_files['full_url_paths_for_use_via_id'][$function_myOfficeArm['owner_user_object']->usersext_resume] #full url path
														$resume_path =$function_files['full_url_paths_for_use_via_id'][$function_myOfficeArm['owner_user_object']->usersext_resume];
														
														#$function_files['full_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full abs path
														#$function_files['full_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #full abs path
														
														#$function_files['only_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #abs path without filename
														#$function_files['only_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #abs path without filename
														
														#$function_files['filename_via_id']['INSERT_ID_HERE'] #filename
														$resume_file_nicename = $function_files['filename_via_id'][$function_myOfficeArm['owner_user_object']->usersext_resume];
														
														// examples:
														// https://www.voluno.org/wp-content/voluno-files/usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
														// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
														// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298
														
													}
													#use (close)
													
												}
												#output (close)
												
											}
											#function-files.php (v1.0) (close)
											
											#function-image-processing
												#thematic only
												$function_propic__type = "thematic";
												$function_propic__original_img_name = "file_extension_pdf.png";
												#all
												$function_propic__geometry = array(40,NULL); //optional, if e.g. only width: 300, NULL; vice versa
												include('#function-image-processing.php');
											
											$input_resume = '
											<input type="file" class="select_file" style="display:none;" name="update_profile_resume">
											<input type="hidden" style="display:none;" name="update_profile_resume_check">';
											### wrong path in here
											$input_resume = $input_resume.'
											<table>
												<tr>
													<td style="width:90px;padding:0px;">
														<a
															class="delete_resume_view_current_file"
															href="'.$resume_path.'"
														><span></span></a>
														<div
															style="padding:5px;border:1px solid black;background-color:#FFC977;border-radius:20px;"
															title="Click to download current resume"
															class="current_resume_file"
														>
															<table>
																<tr>
																	<td>
																		<img src="'.$function_propic.'">
																	</td>
																	<td>
																		'.$resume_file_nicename.'
																	</td>
																</tr>
															</table>
														</div>
													</td>
													<td style="font-weight:bold;vertical-align:middle;width:70px;padding:0px;">
														<div class="voluno_button delete_resume_button" style="width:80px;margin:auto;">
															Delete current resume
														</div>
														<input
															type="hidden"
															name="delete_resume_hidden_form_field"
															value="false"
															class="delete_resume_hidden_form_field"
														>
													</td>
												</tr>
											</table>';
											
										}
										#edit menu: show and delete current resume (open)
										
										#edit menu: upload (new) resume (open)
										if(1==1){
											
											$input_resume = $input_resume.'
											<table>
												<tr>
													<td colspan="2">
														Please only upload ';
														
														#function-help-word.php
															$function_help_word_hover_link = "PDF files";
															$function_help_word_help_content =
															'You can easily convert your resume to PDF format via
															<a href="https://www.ilovepdf.com/" title="www.ilovepdf.com" target="_blank">
																www.ilovepdf.com</a>.
															<br>
															<br>
															To view PDF files, you could use
															<a href="https://get.adobe.com/reader/" title="Download the latest Adobe Reader" target="_blank">
															Adobe Reader</a>.';
															$function_help_word_width = "300px";
															$function_help_word_keep_showing_div_on_hover = "yes";
															$function_help_word_variable_only = "yes";
															include('#function-help-word.php');
															
														$input_resume .= 
														$function_help_word.'
													</td>
												</tr>
												<tr>
													<td style="width:80px;">    
														<div class="voluno_button select_resume_activation_area" style="width:50px;margin:auto;">
															Select file
														</div>
													</td>
													<td style="vertical-align:middle;">
														<div
															class="select_resume_activation_area"
															style="position:absolute;opacity:0;background-color:#000;width:207px;height:25px;"
														>
														</div>
														<input
															class="select_resume_input_shown"
															placeholder="No file selected"
															disabled="disabled"
															style="width:200px;text-align:center;"
														>
														<input style="display:none" class="select_resume_input_hidden" name="update_profile_resume" type="file">
														<input class="select_resume_input_hidden_check" name="update_profile_resume_check" type="hidden">
													</td>
												</tr>
											</table>
											';
											
										}
										#edit menu: upload (new) resume (open)
										
									}
									#resume (close)
									
									#positions (open)
									if(1==1){
										
										$input_user_positions = '
										To edit positions, please click
										<a
											href="'.get_permalink(756).'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'"
											target="_blank"
											title="Go to &quot;My positions&quot;"
										>
											here'.
										'</a>.';
										
									}
									#positions (close)
									
									#biography (open)
									if(1==1){
										
										#function-sanitize-text.php
										$function_sanitize_text__type = "plain text with line breaks (biography)";
										$function_sanitize_text__text = $function_myOfficeArm['owner_user_object']->usersext_biography;
										$function_sanitize_text__reverse = "yes";
										include('#function-sanitize-text.php');
										$biography = $function_sanitize_text__text_sanitized;
										
										$input_bio =
										'<textarea 
											name="update_profile_biography"
											placeholder="Which events and experiences in your'.
													' life are most relevant for your work with Voluno?"
											style="width:100%;height:10em;resize:vertical;max-height:300px;"
										>'.
											$function_sanitize_text__text_sanitized.
										'</textarea>';
									}
									#biography (close)
									
								}
								#preparation of edit fields for array (close)
								
							}
							#edit rights (close)
							
							#actual value or placeholder (open)
							if(1==1){
								
								#place of residence (open)
								if(!empty($function_myOfficeArm['owner_user_object']->usersext_city) AND !empty($function_myOfficeArm['owner_user_object']->usersext_country)){ #both available
									
									$place_of_residence = $function_myOfficeArm['owner_user_object']->usersext_city.", ".$function_myOfficeArm['owner_user_object']->list_countries_name;
									
								}elseif(!empty($function_myOfficeArm['owner_user_object']->usersext_city) AND empty($function_myOfficeArm['owner_user_object']->usersext_country)){ #only city
									
									$place_of_residence = $function_myOfficeArm['owner_user_object']->usersext_city;
									
								}elseif(empty($function_myOfficeArm['owner_user_object']->usersext_city) AND !empty($function_myOfficeArm['owner_user_object']->usersext_country)){ #only country
									
									$place_of_residence = $function_myOfficeArm['owner_user_object']->list_countries_name;
									
								}else{ #none
									
									$place_of_residence = "";
									
								}
								#place of residence (close)
								
							}
							#actual value or placeholder (close)
							
							#prepare non-edit view (open)###
							if(1==1){
								
								#age / birth date (open)
								if(1==1){
									
									if($function_myOfficeArm['owner_user_object']->usersext_birthDate != "0000-00-00"){
									$birt_date = strtotime($function_myOfficeArm['owner_user_object']->usersext_birthDate);
									$birt_date =
										'<a
										style="cursor:help;"
										title="Date of birth: '.date("j",$birt_date).'. '.date("M",$birt_date).' '.date("Y",$birt_date).'"
										>
										'.(date("Y")-date("Y",$birt_date)).'
										</a>';
									}else{
									$birt_date = "";
									}
								}
								#age / birth date (close)
								
								#member since (open)
								if(1==1){
									$member_since = strtotime($function_myOfficeArm['owner_user_object']->usersext_userRegistered);
									$member_since = date("j",$member_since).'. '.date("M",$member_since).' '.date("Y",$member_since);
								}
								#member since (close)
								
								#last online (open)
								if($function_myOfficeArm['owner_user_object']->usersext_lastLogin != "0000-00-00 00:00:00"){
									
									#function-timezone.php
									$function_timezone = $function_myOfficeArm['owner_user_object']->usersext_lastLogin;
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)"
									include('#function-timezone.php');
									$last_online = $function_timezone;
									
								}
								#last online (close)
								
								#positions (open) ### #todolist: repair
								if(1==2){
								   
									#get all positions (open)
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
												
												$function_userpositions_get['user id'] = $function_myOfficeArm['owner_user_object']->usersext_id; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
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
										
										
										#$positions_all_query = $GLOBALS['wpdb']->prepare('SELECT *
										#					FROM fi4l3fg_voluno_positions
										#					ORDER BY position_order;');
										#$positions_all_results = $GLOBALS['wpdb']->get_results($positions_all_query);
										#
										#for($aex=0;$aex<count($positions_all_results);$aex++){
										#	if(in_array($positions_all_results[$aex]->position_id,
										#		$VOLUNO_DEPRECATED_function_get_user_position__regular_user_positions_array)
										#	){
										#	$positions_results[] = $positions_all_results[$aex];
										#	}
										#}
										
									}
									#get all positions (close)
									
									#$user_positions = '<table style="background-color:red;">';
									
									#loop (create array) (open)
									for($one=0;$one<count($positions_results);$one++){
									
									#specific position table contents (open)
									if(1==1){
										
										$this_position = $positions_results[$one]->position_name_sing;
										
										#ngo (open)
										if($positions_results[$one]->position_id == "2"){
										   
										#all user organizations (open)
										if(1==1){
											$my_pos_my_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
															FROM fi4l3fg_voluno_development_organizations_properties
															LEFT JOIN fi4l3fg_voluno_development_organizations
																ON ngo_prop_ngo_id = ngo_id
															WHERE ngo_prop_type_general = "position"
																AND ngo_prop_type_specific = "worker"
																AND ngo_prop_type_status = "accepted"
																AND ngo_prop_type_id = %s;'
															,$function_myOfficeArm['owner_user_object']->usersext_id);
											$my_pos_my_ngos_results = $GLOBALS['wpdb']->get_results($my_pos_my_ngos_query);
										   
										}
										#all user organizations (close)
										
										#loop (open)
										for($two=0;$two<count($my_pos_my_ngos_results);$two++){
											
											#prepare (open)
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
														
														$function_profileLink['id'] = $my_pos_my_ngos_results[$two]->ngo_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
												
											}
											#prepare (close)
											
											#content (open)
											if(1==1){
											
											if($two == 0){
												$this_position_content = " (";
											}
											
											$this_ngo = $function_profileLink['name_link'];
											
											#nice list (open)
											if($two == 0){
												$this_position_content .= $this_ngo;
											}elseif($two + 2 < count($my_pos_my_ngos_results) ){
												$this_position_content .= ', '.$this_ngo;
											}elseif($two + 1 < count($my_pos_my_ngos_results) ){
												$this_position_content .= ' and '.$this_ngo;
											}
											#nice list (close)
											
											if($two + 1 == count($my_pos_my_ngos_results)){
												$this_position_content .= ")";
											}
											
											}
											#content (close)
											
										}
										#loop (close)
										   
										}
										#ngo (close)
										
										#staff (open)
										elseif($positions_results[$one]->position_id == "7"){
										
										sort($VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array);
										
										#loop (open)
										for($afa=0;$afa<count($VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array);$afa++){
											
											if($afa == 0){
											$this_position_content = " (";
											}
											
											#ensure that It Coordinator is written as IT Coordinator (open)
											if(1==1){
											
											$capitalize_short_words =
											explode("_",$VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array[$afa]);
											
											if(strlen($capitalize_short_words[0]) <= 3){
												$capitalize_short_words[0] = strtoupper($capitalize_short_words[0]);
											}
											
											$VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array[$afa] =
											implode("_",$capitalize_short_words);
											}
											#ensure that It Coordinator is written as IT Coordinator (close)
											
											$this_position_content .=
											ucwords(
												str_replace(
												"_",
												" ",
												$VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array[$afa]
												)
											);
											
											if($afa + 1 == count($VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array)){
											$this_position_content .= ")";
											}
											
											#nice list (open)
											if($afa + 2 < count($VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array) ){
											$this_position_content .= ', ';
											}elseif($afa + 1 < count($VOLUNO_DEPRECATED_function_get_user_position__staff_accepted_array) ){
											$this_position_content .= ' and ';
											}
											#nice list (close)
											
										}
										#loop (close)
										
										}
										#staff (close)
										
										#all other (open)
										else{
										
										unset($this_position_content);
										
										}
										#all other (close)
										
									}
									#specific position table contents (close)
									
									$user_positions_array_merge[$one] =
										strtolower($this_position).'5445'.
										$this_position.'5445'.
										$this_position_content;
									#echo $user_positions_array_merge[$one];
									}
									#loop (create array) (close)
									
									#sort($user_positions_array_merge);
									
									#loop (merge array) (open)
									for($one=0;$one<count($positions_results);$one++){
									
									$user_positions_array_merge[$one] = explode('5445',$user_positions_array_merge[$one]);
									
									#
									if($one == 0){
										#$user_positions = "<p>";
									}
									#
									
									$indent = strlen(ucfirst($user_positions_array_merge[$one][1])) * 7.5;
									
									#only display list if more than one element (open)
									if(count($positions_results) == 1){
										$user_positions .= 
										#substr($user_positions_array[$one]['position'], 0, 5).
										'<p>
											'.ucfirst($user_positions_array_merge[$one][1]).
											$user_positions_array_merge[$one][2].'
										</p>';
									}else{
										$user_positions .= 
										#substr($user_positions_array[$one]['position'], 0, 5).
										'<ul>
										<li><p style="text-indent:-'.$indent.'px;padding-left:'.$indent.'px;">
											'.ucfirst($user_positions_array_merge[$one][1]).
											$user_positions_array_merge[$one][2].'
										</p>
										</li></ul>';
									}
									#only display list if more than one element (close)
									
									#nice list (open)
									#if($one + 2 < count($positions_results) ){
									#    $user_positions .= ', ';
									#}elseif($one + 1 < count($positions_results) ){
									#    $user_positions .= ' and ';
									#}
									#nice list (close)
									
									#
									if($one +1 == count($positions_results)){
										#$user_positions .= "</p>";
									}
									#
									
									}
									#loop  (close)
									
								}
								#positions (close)
								
								#resume (open)
								if(!empty($function_myOfficeArm['owner_user_object']->usersext_resume)){
									
									#function-files.php (v1.0) (open)
									if(1==1){
										
										#documentation (open)
										if(1==1){
											
											// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
											
										}
										#documentation (close)
										
										#input (open)
										if(1==1){
											
											$function_files['action'] = 'use'; // 'use', 'upload' or 'delete'.
											
											#use (open)
											if(1==1){
												
												$function_files['files_to_use_by_file_id'] = [
													$function_myOfficeArm['owner_user_object']->usersext_resume
												];
												//nicenames of files to use. must be an array.
												
											}
											#use (close)
											
										}
										#input (close)
										
										include('#function-files.php');
										
										#output (open)
										if(1==1){
											
											#use (open)
											if(1==1){
												
												# $function_files['full_url_paths_for_use'] //array: keys = nicenames, values = full paths
												// <img src="'.$function_files['full_url_paths_for_use']['testimage.png'].'">
												
												#$function_files['full_url_paths_for_use_via_filename'][$function_myOfficeArm['owner_user_object']->usersext_resume] #full url path
												#$function_files['full_url_paths_for_use_via_id']['INSERT_ID_HERE'] #full url path
												
												#$function_files['full_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full abs path
												#$function_files['full_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #full abs path
												
												#$function_files['only_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #abs path without filename
												#$function_files['only_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #abs path without filename
												
												#$function_files['filename_via_id']['INSERT_ID_HERE'] #filename
												
												// examples:
												// https://www.voluno.org/wp-content/voluno-files/usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
												// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
												// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298
												
												$full_path_resume = $function_files['full_url_paths_for_use_via_id'][$function_myOfficeArm['owner_user_object']->usersext_resume];
												
											}
											#use (close)
											
										}
										#output (close)
										
									}
									#function-files.php (v1.0) (close)
									
									$resume = '
									<a
										title="View resume"
										style="cursor:pointer;"
										class="show_resume_div_button"
									>
										View resume
									</a>';
									
									#function-fixed-div.php
									$function_fixed_div_part = 1; //1 or 2, obligatory
									$function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
									$function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
									$function_fixed_div_div_name = "resume_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
									$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
									$function_fixed_div_border_radius = 25; //optional, default is 0
									$function_fixed_div_cancel_button = "yes"; //optional, default is yes
									$function_fixed_div_height_div = "80"; //optional, in percent, default is 50
									$function_fixed_div_text_align = "center"; //optional, default is left
									$function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
									$function_fixed_div_variable_only = "yes";
									include('#function-fixed-div.php');
									   
									$resume .= $function_fixed_div_display;
									
									$resume .= 
									'<div style="text-align:center;">
										<h3>
										'.$function_myOfficeArm['owner_user_object']->usersext_displayName.' - Resume
										</h3>
									</div>
									<embed
										src="'.$full_path_resume.'"
										width="1000%" height="800"
										type="application/pdf"
										style="border:1px solid black;"
									>';
									
									#function-fixed-div.php
									$function_fixed_div_part = 2; //1 or 2, both are obligatory
									include('#function-fixed-div.php');
									$resume = $resume.$function_fixed_div_display;
									
								}
								#resume (close)
								
							}
							#prepare non-edit view (close)
							
							#array of personal info display elements (open)
							if(1==1){
								
								$content_div_pers_info = [
									["Gender",             1, $function_myOfficeArm['owner_user_object']->usersext_gender,     $input_gender],
									["Place of residence", 1, $place_of_residence,                 ],
									["Street and number",  1, "",                                  $input_residence_street],
									["Area code",          1, "",                                  $input_residence_area_code],
									["City",               1, "",                                  $input_residence_city],
									["State",              1, "",                                  $input_residence_state],
									["Country",            1, "",                                  $input_residence_country],
									["Age",                1, $birt_date,                          $input_age],
									["Occupation",         1, $function_myOfficeArm['owner_user_object']->usersext_occupation, $input_occupation],
									["Member since",       1, $member_since                        ],
									["Last online",        1, $last_online                         ],
									["Resume",                 1, $resume,                                 $input_resume],
									["Voluno positions",   2, $user_positions,                     $input_user_positions],
									["Biography",          2, $function_myOfficeArm['owner_user_object']->usersext_biography,  $input_bio]
								];
								
							}
							#array of personal info display elements (close)
							
						}
						#preparation (close)
						
						echo '
						<div class="profile_content_div">
							'.$personal_information['edit_tooltip'].'
							<h4>
								Personal information
							</h4>
							<table>';
								
								#not edit area (open) ### ok, but badly structured
								if(1==1){
									
									#
									$filled_td_counter = 0;
									for($ams=0;$ams<count($content_div_pers_info);$ams++){
										
										#
										if(!empty($content_div_pers_info[$ams][2])){
											
											$filled_td_counter++;
											
											#number of cols (open)
											if($ams == 0){
												
												echo '
												<tr class="profile_page_editable">';
												
											}elseif($filled_td_counter % 2 != 0 OR $content_div_pers_info[$ams][1] == 2){
												
												echo '
												</tr>
												<tr class="profile_page_editable">';
												
											}
											#number of cols (close)
											
											$colwidth['value'] = 26;
											
											#colspan + width settings (open)
											if($content_div_pers_info[$ams][1] == 2){
												$colspan = 3; //must be 3, since there are 4 cols. so col 2 must be expanded by 3
												$colwidth['right'] = ($colwidth['value'] * 2) + (50-$colwidth['value']);
											}else{
												$colspan = 1;
												$colwidth['right'] = $colwidth['value'];
											}
											#colspan + width settings (close)
											
											#content (open)
											if(1==1){
												echo '
												<td
												class="content_div_title_td"
												style="width:'.(50-$colwidth['value']).'%;"
												>
												<p style="text-align:right;">
													'.$content_div_pers_info[$ams][0].
												':</p>
												</td>
												<td
												colspan="'.$colspan.'"
												style="width:'.$colwidth['right'].'%;"
												class="content_div_content_td"
												>';
												
												#
												if($profile_editing_right == "yes"){
													
													echo
													'<span class="profile_page_editable">';
													
												}
												#
												
												echo 
												'<p>'.
													$content_div_pers_info[$ams][2].
												'</p>';
												
												#
												if($profile_editing_right == "yes"){
													echo
													'</span>';
												}
												#
												
												echo '
												</td>';
											}
											#content (close)
											
											#close last row (open)
											if($ams == count($content_div_pers_info)-1){
												
												echo '
												</tr>';
												
											}
											#close last row (close)
											
										}
										#
										
									}
									#
									
								}
								#not edit area (close)
								
								#edit area (open)
								if($profile_editing_right == "yes"){
									
									#
									for($index_a=0;$index_a<count($content_div_pers_info);$index_a++){
										
										#
										if(!empty($content_div_pers_info[$index_a][3])){
											
											echo '
											<tr class="profile_page_edit">
												<td class="content_div_title_td" style="padding-top:10px;">
												'.$content_div_pers_info[$index_a][0].':
												</td>
												<td class="content_div_content_td">
												'.$content_div_pers_info[$index_a][3].'
												</td>
											</tr>';
											
										}
										#
										
									}
									#
									
									echo '
									<tr class="profile_page_edit">
										<td colspan="2">
										<table style="margin:auto;">
											<tr>
											<td style="text-align:center;">
												<div
												class="edit_profile_text_cancel profile_page_edit"
												style="width:60px;margin-left:auto;margin-right:10px;"
												>
												Cancel
												</div>
											</td>
											<td>
												<div
												class="edit_profile_text_save profile_page_edit"
												style="width:60px;margin-right:auto;margin-left:10px;"
												>
												Save
												</div>
											</td>
											</tr>
										</table>
										</td>
									</tr>';
									
								}
								#edit area (close)
								
							echo '
							</table>
						</div>';
						
					}
					#content div: personal information (close)
					
					#content div: voluno record (open) #modified
					if(1==2){
						
						#function-record.php (v1.0) (open)
						if(1==1){
						
						$function_record['user'] = $function_myOfficeArm['owner_user_object']->usersext_id; //default: none (function is deactivated)
						include('#function-record.php');
						
						}
						#function-record.php (v1.0) (close)
						
						#content (open)
						if(!empty($function_record['rep_array']) OR $function_record['exp'] != 0 ){
						echo '
						<div class="profile_content_div">';
							
							#title row (open)
							if(1==1){
							echo '
							<h4>';
								if(!empty($function_record['rep_array']) AND $function_record['exp'] != 0 ){
								echo 'Voluno reputation and experience';
								}elseif(!empty($function_record['rep_array']) AND $function_record['exp'] == 0 ){
								echo 'Voluno reputation';
								}elseif(empty($function_record['rep_array']) AND $function_record['exp'] != 0 ){
								echo 'Voluno experience';
								}
							echo '
							</h4>';
							}
							#title row (close)
							
							#display table (open)
							if(1==1){
							echo '
							<table>';
								
								#reputation (open)
								if(1==1){
								
								if(!empty($function_record['rep_array'])){
									
									#title row (open)
									if(1==1){
									echo '
									<tr style="font-weight:bold;">
										<td colspan=4 style="vertical-align:middle;">
										<div
											style="
											display:inline-block;
											height:20px;
											vertical-align:middle;
											"
										>
											Reputation:
										</div>';
										
										echo '
										<div
											style="
											background-color:white;
											width:100px;
											border:1px solid black;
											height:20px;
											position:relative;
											display:inline-block;
											vertical-align:middle;
											"
											title="'.$function_record['rep_array'][$afm]->record_value.'"
										>';
											
											#displayed value (open)
											if(1==1){
											echo '
											<div
												style="
												width:100%;
												vertical-align:middle;
												text-align:center;
												position:absolute;
												text-shadow: 3px 0px 5px white,
														-3px 0px 5px white,
														0px 3px 5px white,
														0px -3px 5px white;
												"
											>
												'.$function_record['rep'].'/10
											</div>';
											}
											#displayed value (close)
											
											#color bar (open)
											if(1==1){
											
											#preparation (open)
											if(1==1){
												$G = round((255 * $function_record['rep']) / 10);
												$R = round((255 * (10 - $function_record['rep'])) / 10);
												
												$color = 'rgb('.$R.','.$G.',0)';
												
												if($function_record['rep'] == 0){
												$color = "white";
												}
											}
											#preparation (close)
											
											#content (open)
											if(1==1){
												echo '
												<div
												style="
													background-color:'.$color.';
													height:20px;
													width:'.($function_record['rep']*10).'%;
												"
												>
												</div>';
											}
											#content (close)
											
											}
											#color bar (close)
											
										echo '
										</div>';
										
										echo '
										</td>
									</tr>';
									}
									#title row (close)
									
									for($afm=0;$afm<count($function_record['rep_array']);$afm++){
									
									#tr open (open)
									if($afq > 2 OR $afm == 0){
										$afq = 1;
										echo '
										<tr>';
									}
									#tr open (close)
										
										#preparation (open)
										if(1==1){
										
										#color bar (open)
										if(1==1){
											$G = round((255 * $function_record['rep_array'][$afm]->record_value) / 10);
											$R = round((255 * (10 - $function_record['rep_array'][$afm]->record_value)) / 10);
											
											$color = 'rgb('.$R.','.$G.',0)';
											
											if($function_record['rep_array'][$afm]->record_value == 0){
											$color = "white";
											$value = "0";
											}else{
											$value = $function_record['rep_array'][$afm]->record_value;
											}
										}
										#color bar (close)
										
										}
										#preparation (close)
										
										#content (open)
										if(1==1){
										echo '
										<td style="text-align:right;vertical-align:middle;">
											<a
											style="cursor:help;"
											title="'.
												$function_record['rep_array'][$afm]->ratingtype_myprofile_title_attr.
											'"
											>
											'.$function_record['rep_array'][$afm]->ratingtype_name.':
											</a>
										</td>
										<td style="width:100px;">
											<div
											style="
												background-color:white;
												width:100%;
												border:1px solid black;
												height:20px;
												position:relative;
											"
											title="'.
												number_format(
												$function_record['rep_array'][$afm]->record_value
												,1
												,"."
												," "
												).
											'/10"
											>';
											
											#bar (open)
											if(1==1){
												echo '
												<div
												style="
													background-color:'.$color.';
													height:20px;
													width:'.($function_record['rep_array'][$afm]->record_value*10).'%;
												"
												>
												</div>';
											}
											#bar (close)
											
											echo '
											</div>
										</td>';
										}
										#content (close)
										
									#tr close (open)
									if(1==1){
										if($afq == 2){
										echo '
										</tr>';
										}
										$afq++;
									}
									#tr close (close)
									
									}
								}
								}
								#reputation (close)
								
								#experience (open)
								if(1==1){
								
								if($function_record['exp'] != 0){
									echo '
									<tr style="font-weight:bold;">
									<td colspan=4>
										Experience: '.$function_record['exp'].'
									</td>
									</tr>';
									for($afm=0;$afm<count($function_record['exp_array']);$afm++){
									
									#tr open (open)
									if($afq > 2 OR $afm == 0){
										$afq = 1;
										echo '
										<tr>';
									}
									#tr open (close)
										
										if($afq == 1){
										unset($padding);
										}else{
										$padding = "padding-left:70px;";
										}
										echo '
										<td
										style="
											'.$padding.'
											text-align:right;
											vertical-align:middle;
											width:160px;
										"
										>
										<a
											style="cursor:help;"
											title="'.
											$function_record['exp_array'][$afm]->ratingtype_myprofile_title_attr.
											'"
										>
											'.$function_record['exp_array'][$afm]->ratingtype_name.':
										</a>
										</td>
										<td>
										'.number_format(
											$function_record['exp_array'][$afm]->record_value
											,0
											,"."
											," "
										).'
										</td>';
										
									#tr close (open)
									if(1==1){
										if($afq == 2){
										echo '
										</tr>';
										}
										$afq++;
									}
									#tr close (close)
									
									}
								}
								}
								#experience (close)
								
							echo '
							</table>';
							}
							#display table (close)
						  
						  echo '
						  </div>';
						}
						#content (close)
						
					}
					#content div: voluno record (close) #modified
					
				}
				#left side of container (close)
				
			echo '
			</td>
			<td style="text-align:center;">';
				
				#right side of container (open)
				if(1==1){
					
					#profile picture (open)
					if(1==1){
						
						#prepare (open)
						if(1==1){
							
							#function-image-processing.php (v1.0) (open)
							if(1==1){
							#profile picture
								$function_propic__type = "profile picture";
								$function_propic__user_id = $function_myOfficeArm['owner_user_object']->usersext_id;
							#all
								$function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
							include('#function-image-processing.php');
							# $function_propic;
							#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
							}
							#function-image-processing.php (v1.0) (close)
							
							#edit icon (open)
							if($profile_editing_right == "yes"){
								
								$profile_picture['edit_icon'] = '
								<a href="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'&view_as=edit_profile_picture">
								<div
									class="profile_edit_tooltip profile_pic_tooltip"
									style="margin-top:-320px;margin-left:270px;"
									title="Edit profile picture"
								>
									<img src="'.$function_propic_edit_profile_img_path_full.'">
								</div>
								</a>';
								
							}
							#edit icon (close)
							
						}
						#prepare (close)
						
						echo '
						<div class="profile_edit_hover" style="margin-bottom:20px;">
							<img
								style="border-radius:25px;"
								class="voluno_brighter_on_hover profile_picture"
								src="'.$function_propic.'"
							>
							'.$profile_picture['edit_icon'].'
						</div>';
						
					}
					#profile picture (close)
					
					#options (open)
					if(in_array('owner',$function_myOfficeArm['role_array'])){ //no need to see this if the user is profile page owner
						
						#preparation (open)
						if(1==1){
							
							#function-image-processing.php (v1.0) (open)
							if(1==1){
								#thematic only
								$function_propic__type = "thematic";
								$function_propic__original_img_name = "chat-message.png";
								#all
								$function_propic__geometry = array(80,NULL); //optional, if e.g. only width: 300, NULL; vice versa
								include('#function-image-processing.php');
								$message_img = $function_propic;
								#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
							}
							#function-image-processing.php (v1.0) (close)
							
							#function-image-processing.php (v1.0) (open)
							if(1==1){
								#thematic only
								$function_propic__type = "thematic";
								$function_propic__original_img_name = "contact_add.png";
								#all
								$function_propic__geometry = array(80,NULL); //optional, if e.g. only width: 300, NULL; vice versa
								include('#function-image-processing.php');
								$add_contact['image'] = $function_propic;
								#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
							}
							#function-image-processing.php (v1.0) (close)
							
							#function-image-processing.php (v1.0) (open)
							if(1==1){
								#thematic only
								$function_propic__type = "thematic";
								$function_propic__original_img_name = "contact_added.png";
								#all
								$function_propic__geometry = array(80,NULL); //optional, if e.g. only width: 300, NULL; vice versa
								include('#function-image-processing.php');
								$remove_contact['image'] = $function_propic;
								#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
							}
							#function-image-processing.php (v1.0) (close)
							
							#add contact popup div (open)
							if(1==1){
								
								$add_contact['popup_div'] = '
								<div
									class="function_button_popup"
									style="
										cursor:default;
										display:none;
										position:absolute;
										background-color:#fff;
										border:1px solid black;
										width:150px;
										margin-left:-40px;
										border-radius:20px;
										padding:20px;
									"
								>
									<p style="font-weight:bold;text-align:center;">
										Add contact?
									</p>
									<p style="text-align:justify;">
										He or she will appear in your contacts and vice versa.
									</p>
									<div class="voluno_button add_contact_submit" style=""width:50px;">
										Add contact
										<form
										class="add_contact_form"
										method="post"
										action="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_id.'"
										>
										<input type="hidden" value="1" name="add_contact">
										</form>
									</div>
								</div>';
								
							}
							#add contact popup div (close)
							
							#remove contact popup div (open)
							if(1==1){
								
								$remove_contat['popup_div'] = '
								<div
									class="function_button_popup"
									style="
										cursor:default;
										display:none;
										position:absolute;
										background-color:#fff;
										border:1px solid black;
										width:150px;
										margin-left:-40px;
										border-radius:20px;
										padding:20px;
									"
								>
									<p style="font-weight:bold;text-align:center;">
										Remove contact?
									</p>
									<p style="text-align:justify;">
										The member will be removed from your contacts. However, you will not be removed
										from the members contacts, so the member will not know that you removed
										him or her.
									</p>
									<div class="voluno_button remove_contact_submit" style=""width:50px;">
										Remove contact
										<form
											class="remove_contact_form"
											method="post"
											action="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_id.'"
										>
										<input type="hidden" value="1" name="remove_contact">
										</form>
									</div>
								</div>';
								
							}
							#remove contact popup div (close)
							
							#add/remove contact (open)
							if($arm_option_add_contact == "yes"){
								
								$add_contat['no_idea_what_this_is'] = '
								<img src="'.$add_contact['image'].'">
								'.$add_contact['popup_div'];
								
							}elseif($arm_option_remove_contact == "yes"){
								
								$remove_contat['no_idea_what_this_is'] = '
								<img src="'.$remove_contact['image'].'">
								'.$remove_contat['popup_div'];
								
							}
							#add/remove contact (close)
							
							#add or remove contact (open)
							if(1==1){
								
								$add_or_remove_contact = '
								<td style="width:50%">
									<div
										class="function_button"
										style="border-radius:20px;padding:10px;background-color:#FFEAB9;"
									>
										'.$add_contat['no_idea_what_this_is'].
										$remove_contat['no_idea_what_this_is'].'
									</div>
								</td>';
							}
							#add or remove contact (open)
							
							#send message (open)
							if(1==1){
								
								$send_message = '
								<td>
									<a href="'.get_permalink(696).'?conversation_with='.$function_myOfficeArm['owner_user_object']->usersext_id.'">
									<div
										class="function_button"
										style="border-radius:20px;padding:10px;background-color:#FFEAB9;"
										title="Send message to '.$function_myOfficeArm['owner_user_object']->usersext_displayName.'"
									>
										<img
										style="width:80px;"
										src="'.$message_img.'"
										>
									</div>
									</a>
								</td>';
								
							}
							#send message (close)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
							
							echo '
							<div style="background-color:#FFEAB9;padding:10px;border-radius:25px;margin:20px 0px;">
								<table>
									<tr style="text-align:center;">
										'.$add_or_remove_contact.
										$send_message.'
									</tr>
								</table>
							</div>';
							
						}
						#content (close)
						
					}
					#options (close)
					
					#content div: personal information (open)
					if(1==1){
						
						echo '
						<div class="profile_content_div">';
							
							#edit tooltip (get image [only once] and create div) (open)
							if($profile_editing_right == "yes"){
							   echo '
							   <div
								  class="profile_edit_tooltip edit_profile_text_button"
								  style="margin:-40px 0px 0px 250px;" title="Edit profile text">';
								  echo '
								  <img src="'.$function_propic_edit_profile_img_path_full.'">
							   </div>';
							}
							#edit tooltip (get image [only once] and create div) (open)
							
							echo '
							<h4>
							   Contact information
							</h4>
							<table>';
								
								#social media + website links (open)
								if(1==1){
								$facebook_link = '
									<a
									href="'.esc_url('https://www.facebook.com/'.$function_myOfficeArm['owner_user_object']->usersext_facebook).'"
									title="Open '.$function_myOfficeArm['owner_user_object']->usersext_displayName.'\'s Facebook profile in new tab"
									target="_blank"
									>
									'.esc_url('https://www.facebook.com/'.$function_myOfficeArm['owner_user_object']->usersext_facebook).'
									</a>';
								$twitter_link = '
									<a
									href="'.esc_url('https://twitter.com/'.$function_myOfficeArm['owner_user_object']->usersext_twitter).'"
									title="Open '.$function_myOfficeArm['owner_user_object']->usersext_displayName.'\'s Twitter page in new tab"
									target="_blank"
									>
									'.esc_url('https://twitter.com/'.$function_myOfficeArm['owner_user_object']->usersext_twitter).'
									</a>';
								$website_link = '
									<a
									href="'.esc_url($function_myOfficeArm['owner_user_object']->usersext_website).'"
									title="Open '.$function_myOfficeArm['owner_user_object']->usersext_displayName.'\'s website in new tab"
									target="_blank"
									onclick="return confirm(\'You are about to leave the website of'.
									' Voluno and follow an external link.\nVoluno cannot control,'.
									' ensure the safety or be held responsible for the content of external websites.'.
									'\n\nContinue?\')"
									>
									'.esc_url($function_myOfficeArm['owner_user_object']->usersext_website).'
									</a>';
								}
								#social media + website links (close)
							  
								#input preparation (open)
								if(1==1){
								
								$input_email =
									'<input
									type="text"
									value="'.$function_myOfficeArm['owner_user_object']->usersext_userEmail.'"
									name="update_profile_email"
									>';
								
								#$input_password_old =
								#	'<input
								#	type="password"
								#	value=""
								#	name="update_profile_password_old"
								#	autocomplete="off"
								#	>';
								
								$input_password_new =
									'<input
									type="password"
									value=""
									name="update_profile_password1"
									autocomplete="off"
									class="password_input1"
									>
									<input
									type="password"
									value=""
									name="update_profile_password2"
									autocomplete="off"
									class="password_input2"
									style="display:none;"
									>
									<div class="password2_info">
									</div>';
								   
								$input_phone =
									'<input
									type="text"
									value="'.$function_myOfficeArm['owner_user_object']->usersext_phone.'"
									name="update_profile_phone"
									>';
									
								$input_skype =
									'<input
									type="text"
									value="'.$function_myOfficeArm['owner_user_object']->usersext_skype.'"
									name="update_profile_skype"
									>';
									
								$input_whatsapp =
									'<input
									type="text"
									value="'.$function_myOfficeArm['owner_user_object']->usersext_whatsapp.'"
									name="update_profile_whatsapp"
									>';
									
								$input_facebook =
									'<input
									type="text"
									value="'.$function_myOfficeArm['owner_user_object']->usersext_facebook.'"
									name="update_profile_facebook"
									>';
									
								$input_twitter =
									'<input
									type="text"
									value="'.$function_myOfficeArm['owner_user_object']->usersext_twitter.'"
									name="update_profile_twitter"
									>';
									
								$input_website =
									'<input
									type="text"
									value="'.$function_myOfficeArm['owner_user_object']->usersext_website.'"
									name="update_profile_website"
									>';
								
								}
								#input preparation (close)
							  
								#table arrays for contact info (open)
								if(1==1){
								$content_div_contact_info = array(
									array(
									"Email",
									$function_myOfficeArm['owner_user_object']->usersext_userEmail,
									$input_email
									,1
									),
									#array(
									#"Current&nbsp; password",
									#"",
									#$input_password_old,
									#1
									#),
									array(
									"Change&nbsp; password",
									"",
									$input_password_new,
									1
									),
									array(
									"Phone",
									$function_myOfficeArm['owner_user_object']->usersext_phone,
									$input_phone,
									1
									),
									array(
									"Skype",
									$function_myOfficeArm['owner_user_object']->usersext_skype,
									$input_skype,
									1
									),
									array(
									"Whatsapp",
									$function_myOfficeArm['owner_user_object']->usersext_whatsapp,
									$input_whatsapp,
									1
									),
									array(
									"Facebook",
									$facebook_link,
									$input_facebook,
									$function_myOfficeArm['owner_user_object']->usersext_facebook
									),
									array(
									"Twitter",
									$twitter_link,
									$input_twitter,
									$function_myOfficeArm['owner_user_object']->usersext_twitter
									),
									array(
									"Website",
									$website_link,
									$input_website,
									$function_myOfficeArm['owner_user_object']->usersext_website
									)
								);
								}
								#table arrays for contact info (close)
							  
								#display, not edit area (open)
								for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
								if(
									(!empty($content_div_contact_info[$index_a][1])
									AND
									$content_div_contact_info[$index_a][3] == 1)
									OR
									($content_div_contact_info[$index_a][3] != 1
									AND
									!empty($content_div_contact_info[$index_a][3]))
									){
									echo '
									<tr class="profile_page_editable">
									<td style="font-weight:bold;text-align:right;padding-right:20px;">
										'.$content_div_contact_info[$index_a][0].':
									</td>
									<td>
										'.$content_div_contact_info[$index_a][1].'
									</td>
									</tr>';
								}
								}
								#display, not edit area (close)
							  
								#edit area (open)
								if($profile_editing_right == "yes"){
								for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
									echo '
									<tr class="profile_page_edit">
									<td class="content_div_title_td">
										'.$content_div_contact_info[$index_a][0].':
									</td>
									<td class="content_div_content_td">
										'.$content_div_contact_info[$index_a][2].'
									</td>
									</tr>';
								}
								echo '
								<tr class="profile_page_edit">
									<td colspan="2">
									<table style="margin:auto;">
										<tr>
										<td style="text-align:center;">
											<div
											class="edit_profile_text_cancel profile_page_edit"
											style="width:60px;margin-left:auto;margin-right:10px;"
											>
											Cancel
											</div>
										</td>
										<td>
											<div
											class="edit_profile_text_save profile_page_edit"
											style="width:60px;margin-right:auto;margin-left:10px;"
											>
											Save
											</div>
										</td>
										</tr>
									</table>
									</td>
								</tr>';
								}
								#edit area (close)
							  
							echo '
							</table>
						</div>';
					}
					#content div: personal information (close)
				   
				}
				#right side of container (close)
				
			echo '
			</td>
			</tr>
		</table>';
       
		#form closing (open)
		if($profile_editing_right == "yes"){
			
			echo '
			</form>';
			
		}
		#form closing (close)
       
    }
    #content (close)
    
}
#normal profile view (close)

#edit profile picture view (open)
elseif($profile_page_view == "edit_profile_picture"){
	
	#mysql (open)
	if(1==1){
		
		#check if preliminary file exists (open)
		if(1==1){
			
			$perliminary_image_query['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_files2
				WHERE vol_file_user_id = %s
					AND vol_file_type_name3 = "user_profilepicture_uncropped";'
				,$function_myOfficeArm['owner_user_id']
			);
			$perliminary_image_query['row'] = $GLOBALS['wpdb']->get_row($perliminary_image_query['query']); //check if any exists and display any
			
			#check if more than one exists, which normally shoulnd't be the case (open)
			if(1==1){
				
				$perliminary_image_query['results'] = $GLOBALS['wpdb']->get_results($perliminary_image_query['query']); //just to be on the save side, on
				// update all previous ones are deleted
				
				#array creation for deletion on update (open)
				for($amt=0;$amt<count($perliminary_image_query['results']);$amt++){
					
					$array_of_preliminary_profile_picture_file_ids[] = $perliminary_image_query['results'][$amt]->vol_file_id;
					
				}
				#array creation for deletion on update (close)
				
			}
			#check if more than one exists, which normally shoulnd't be the case (close)
			
		}
		#check if preliminary file exists (close)
		
		#save submitted preliminary file (open)
		if(isset($_POST['submit_file']) and isset($_FILES['select_file'])){
			
			//delete old
			#function-files.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_files['action'] = 'delete'; // 'use', 'upload' or 'delete'.
					
					#delete (open)
					if(1==1){
						
						$function_files['vol_file_ids_to_delete_array'] = $array_of_preliminary_profile_picture_file_ids;
						//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
						
					}
					#delete (close)
					
				}
				#input (close)
				
				include('#function-files.php');
				
			}
			#function-files.php (v1.0) (close)
			
			//add new
			#function-files.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_files['action'] = 'upload'; // 'use', 'upload' or 'delete'.
					
					$function_files['file_author_id'] = $function_myOfficeArm['owner_user_id'];
					
					#upload (open)
					if(1==1){
						
						$function_files['file_input_field_name'] = 'select_file'; //E.g.: 'message_attachments'; <- from $_FILES['message_attachments'];
						// Name of specific form file input field. Can be one or more files.
						
						$function_files['categorization_array'] = [ //type general, type specific, etc. Helps to categorize the file.
							['name' => 'user_data','id' => $function_myOfficeArm['owner_user_id']], //level 1
							['name' => 'profile_pictures','id' => ''], //level 2
							['name' => 'user_profilepicture_uncropped','id' => ''] //level 3
						];
						
						$function_files['reduce_image_size'] = ['x' => 600,'y' => 600,'quality_0_to_100' => 100]; 
						
						$function_files['new_file_names_array'] = [ //if empty, original files names are stored. If not empty, these file names are stored. Must be an array.
							'user_profile_picure.jpg'
						];
						
						$function_files['mime_types_array'] = ['image/gif','image/jpeg','image/jpg','image/png','image/bmp','image/tiff','image/tif'];
						
					}
					#upload (close)
					
				}
				#input (close)
				
				include('#function-files.php');
				
				#output (open)
				if(1==1){
					
					#use only
					# $function_files['full_url_paths_for_use'] //array: keys = nicenames, values = full paths
					// <img src="'.$function_files['full_url_paths_for_use']['testimage.png'].'">
					
					#$function_files['full_url_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full url path
					#$function_files['full_url_paths_for_use_via_id']['INSERT_ID_HERE'] #full url path
					
					#$function_files['full_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full abs path
					#$function_files['full_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #full abs path
					
					#$function_files['only_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #abs path without filename
					#$function_files['only_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #abs path without filename
					
					#$function_files['filename_via_id']['INSERT_ID_HERE'] #filename
					
					// examples:
					// https://www.voluno.org/wp-content/voluno-files/usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
					// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
					// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298
					
				}
				#output (close)
				
			}
			#function-files.php (v1.0) (close)
			
			#check if preliminary file exists (after update) (open)
			if(1==1){
				
				$perliminary_image_query['row'] = $GLOBALS['wpdb']->get_row($perliminary_image_query['query']); //check if any exists and display any
				
			}
			#check if preliminary file exists (after update) (close)
			
		}
		#save submitted preliminary file (close)
		
		#save final (open)
		if(isset($_POST['crop_start_width'])){
			
			//delete old
			#function-files.php (v1.0) (open)
			if(1==1){
				
				#check if old file exists (open)
				if(1==1){
					
					$old_profile_picture_delete['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_files2
						WHERE vol_file_user_id = %s
							AND vol_file_type_name3 = "user_profilepicture_cropped";'
						,$function_myOfficeArm['owner_user_id']
					);
					$old_profile_picture_delete['results'] = $GLOBALS['wpdb']->get_results($old_profile_picture_delete['query']);
					
					#array creation for deletion on update (open)
					for($amt=0;$amt<count($old_profile_picture_delete['results']);$amt++){
						
						$array_of_old_profile_picture_file_ids[] = $old_profile_picture_delete['results'][$amt]->vol_file_id;
						
					}
					#array creation for deletion on update (close)
					
				}
				#check if old file exists (close)
				
				#documentation (open)
				if(1==1){
					
					// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_files['action'] = 'delete'; // 'use', 'upload' or 'delete'.
					
					#delete (open)
					if(1==1){
						
						$function_files['vol_file_ids_to_delete_array'] = $array_of_old_profile_picture_file_ids;
						//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
						
					}
					#delete (close)
					
				}
				#input (close)
				
				include('#function-files.php');
				
			}
			#function-files.php (v1.0) (close)
			
			//add new
			#function-files.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_files['action'] = 'upload'; // 'use', 'upload' or 'delete'.
					
					$function_files['file_author_id'] = $function_myOfficeArm['owner_user_id'];
					
					#upload + add (open)
					if(1==1){
						
						//if it's from the file system
						$function_files['file_hashname'] = $perliminary_image_query['row']->vol_file_hashname;
						
						$function_files['categorization_array'] = [ //type general, type specific, etc. Helps to categorize the file.
							['name' => 'user_data','id' => $function_myOfficeArm['owner_user_id']], //level 1
							['name' => 'profile_pictures','id' => ''], //level 2
							['name' => 'user_profilepicture_cropped','id' => ''] //level 3
						];
						
						#$function_files['mime_types_array'] =
						#['IMAGETYPE_GIF', 'IMAGETYPE_JPEG', 'IMAGETYPE_PNG', 'IMAGETYPE_BMP', 'IMAGETYPE_TIFF_II', 'IMAGETYPE_TIFF_MM', 'IMAGETYPE_JPEG2000'];
						//array of allowed mime types. If empty, all mime types stored in fi4l3fg_voluno_file_extensions are applied.
						//for example: ['IMAGETYPE_GIF', 'IMAGETYPE_JPEG', 'IMAGETYPE_PNG', 'IMAGETYPE_BMP', 'IMAGETYPE_TIFF_II', 'IMAGETYPE_TIFF_MM', 'IMAGETYPE_JPEG2000']
						
						//if image, the image can be cropped. optional.
						$function_files['crop_image']['start_width'] = intval($_POST['crop_start_width']); //distance from the left
						$function_files['crop_image']['start_height'] = intval($_POST['crop_start_height']); //distance from the top
						$function_files['crop_image']['end_square'] = intval($_POST['crop_square']); //size of the image
						
						#$function_files['new_file_names_array'] = [ //if empty, original files names are stored. If not empty, these file names are stored. Must be an array.
						#	'ichwarhier_haha'
						#];
						
					}
					#upload + add (close)
					
					#delete (open)
					if(1==1){
						
						$function_files['vol_file_ids_to_delete_array'] = ['a','b','vol_file_id_5','vol_file_id_6'];
						//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
						
					}
					#delete (close)
					
					#use (open)
					if(1==1){
						
						$function_files['files_to_use_by_nicename'] = [
							'ichwarhier_haha.bmp'
						];
						//nicenames of files to use. must be an array. only allowed for system images, to prevent name conflicts.
						
						$function_files['files_to_use_by_file_id'] = [
							'vol_file_id_232'
						];
						//nicenames of files to use. must be an array.
						
					}
					#use (close)
					
				}
				#input (close)
				
				include('#function-files.php');
				
				#output (open)
				if(1==1){
					
					#upload (open)
					if(1==1){
						
						#$function_files['error']; //error message in case the upload doesn't work. Otherwise empty.
						// - "File type not allowed: FILETYPE"
						
					}
					#upload (close)
					
					#use (open)
					if(1==1){
						
						# $function_files['full_url_paths_for_use'] //array: keys = nicenames, values = full paths
						// <img src="'.$function_files['full_url_paths_for_use']['testimage.png'].'">
						
						#$function_files['full_url_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full url path
						#$function_files['full_url_paths_for_use_via_id']['INSERT_ID_HERE'] #full url path
						
						#$function_files['full_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full abs path
						#$function_files['full_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #full abs path
						
						#$function_files['only_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #abs path without filename
						#$function_files['only_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #abs path without filename
						
						#$function_files['filename_via_id']['INSERT_ID_HERE'] #filename
						
						// examples:
						// https://www.voluno.org/wp-content/voluno-files/usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
						// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
						// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298
						
					}
					#use (close)
					
				}
				#output (close)
				
			}
			#function-files.php (v1.0) (close)
			
			#update in fi4l3fg_voluno_users_extended (open)
			if(1==1){
				
				$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_users_extended',
					array( //updated content
						'usersext_imageName' => $function_files['inserted_file_ids_array'][0]
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
				
			}
			#update in fi4l3fg_voluno_users_extended (close)
			
			#refresh profile owner info (open)
			if(1==1){
			   
				#function-redirect.php (v1.0) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Redirects to another page. Prevents further loading of content.
						// This prevents hackers from stopping the redirect by disabling javascript.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_redirect['redirect_url'] =
						get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'&view_as=edit_profile_picture';
						// url to redirect to. If none is given, homepage is used.
						
					}
					#input (close)
					
					include('#function-redirect.php');
					
					#no output
					
				}
				#function-redirect.php (v1.0) (close) 
			  
			}
			#refresh profile owner info (close)
			
		}
		#save final (close)
		
		#delete image (open)
		if(isset($_POST['delete_image'])){
			
			//delete old file
			#function-files.php (v1.0) (open)
			if(1==1){
				
				#check if old file exists (open)
				if(1==1){
					
					$old_profile_picture_delete['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_files2
						WHERE vol_file_user_id = %s
							AND vol_file_type_name3 = "user_profilepicture_cropped";'
						,$function_myOfficeArm['owner_user_id']
					);
					$old_profile_picture_delete['results'] = $GLOBALS['wpdb']->get_results($old_profile_picture_delete['query']);
					
					#array creation for deletion on update (open)
					for($amt=0;$amt<count($old_profile_picture_delete['results']);$amt++){
						
						$array_of_old_profile_picture_file_ids[] = $old_profile_picture_delete['results'][$amt]->vol_file_id;
						
					}
					#array creation for deletion on update (close)
					
				}
				#check if old file exists (close)
				
				#documentation (open)
				if(1==1){
					
					// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_files['action'] = 'delete'; // 'use', 'upload' or 'delete'.
					
					#delete (open)
					if(1==1){
						
						$function_files['vol_file_ids_to_delete_array'] = $array_of_old_profile_picture_file_ids;
						//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
						
					}
					#delete (close)
					
				}
				#input (close)
				
				include('#function-files.php');
				
			}
			#function-files.php (v1.0) (close)
			
			#delete in user database (open)
			if(1==1){
				
				$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_users_extended',
					array( //updated content
						'usersext_imageName' => ''
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
				
			}
			#delete in user database (close)
			
		}
		#delete image (close)
		
	}
	#mysql (close)
	
	#content (open)
	if(1==1){
		
		#page selection (open)
		if(1==1){
			
			#step (open)
			if(!empty($perliminary_image_query['row'])){ //step 2: file uploaded, now you can crop it
				
				$change_profile_picture_page = 'step 2: image uploaded, now user can crop';
				
			}elseif(empty($function_files['error']) AND !empty($_POST['crop_start_width'])){ //step 3: file saved successfully after editing. confirmation.
				
				$change_profile_picture_page = 'step 3: cropped image saved successfully';
				
			}else{ //step 1: nothing happened, ready to upload 
				
				$change_profile_picture_page = 'step 1: nothing has happened yet, user can upload image';
				
			}
			#step (close)
			
			#old image exists (open)
			if(empty($function_myOfficeArm['owner_user_object']->usersext_imageName)){
				
				$is_there_a_profile_picture_yet = "no";
				
			}else{
				
				$is_there_a_profile_picture_yet = "yes";
				
			}
			#old image exists (close)
			
		}
		#page selection (close)
		
		#function-breadcrums.php (v3.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_breadcrums['input_array'] = [
					'left' => [
						[
                            'text' => 'Return to my profile',
                            'link' => get_permalink(686).'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida
						]
					]
				];
				// Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
				
			}
			#input (close)
			
			include('#function-breadcrums.php');
			
			#output (open)
			if(1==1){
				
				echo $function_breadcrums['breadcrums']; // Output variable
				
			}
			#output (close)
			
		}
		#function-breadcrums.php (v3.0) (close) 
	   
		#upload title and instructions, step 1 and 2 (open)
		if(1==1){
			
			echo '
			<div style="width:100%;text-align:center;">
			   <h1>
				  Edit profile picture
			   </h1>
			   <br>
			</div>';
			
			#instructions (open)
			if($change_profile_picture_page == 'step 2: image uploaded, now user can crop'){ #picture has been uploaded
				
				echo '
				<div style="width:100%;">
					<br>
					<br>
					<p style="text-align:justify;">
					The upload was successful! Now please complete the process by cropping (cutting) the image into a square shape.
					<br>
					You can do so by dragging and moving the dark shadows in the image below. When you\'re done, please click on
					\'Crop image\'.
					</p>
					<br>
				</div>';
				
			}
			#instructions (close)
			
		}
		#upload title and instructions, step 1 and 2 (close)
		
		#crop image: step 2 (open)
		if($change_profile_picture_page == 'step 2: image uploaded, now user can crop'){
			
			#preparations (open)
			if(1==1){
				
				#function-files.php (v1.0) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_files['action'] = 'use'; // 'use', 'upload' or 'delete'.
						
						#use (open)
						if(1==1){
							
							$function_files['files_to_use_by_file_id'] = [
								$perliminary_image_query['row']->vol_file_id
							];
							//nicenames of files to use. must be an array.
							
						}
						#use (close)
						
					}
					#input (close)
					
					include('#function-files.php');
					
					#output (open)
					if(1==1){
						
						#upload (open)
						if(1==1){
							
							#$function_files['error']; //error message in case the upload doesn't work. Otherwise empty.
							// - "File type not allowed: FILETYPE"
							
							#$function_files['inserted_file_ids_array']; //array of ids of inserted files. e.g. ['vol_file_id_222','vol_file_id_123']
							
						}
						#upload (close)
						
						#use (open)
						if(1==1){
							
							# $function_files['full_url_paths_for_use'] //array: keys = nicenames, values = full paths
							// <img src="'.$function_files['full_url_paths_for_use']['testimage.png'].'">
							
							#$function_files['full_url_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full url path
							#$function_files['full_url_paths_for_use_via_id']['INSERT_ID_HERE'] #full url path
							
							#$function_files['full_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full abs path
							#$function_files['full_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #full abs path
							
							#$function_files['only_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #abs path without filename
							#$function_files['only_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #abs path without filename
							
							#$function_files['filename_via_id']['INSERT_ID_HERE'] #filename
							
							// examples:
							// https://www.voluno.org/wp-content/voluno-files/usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
							// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
							// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298
							
						}
						#use (close)
						
					}
					#output (close)
					
				}
				#function-files.php (v1.0) (close) 
				
				$width  = getimagesize($function_files['full_url_paths_for_use_via_id'][$perliminary_image_query['row']->vol_file_id])[0];
				$height = getimagesize($function_files['full_url_paths_for_use_via_id'][$perliminary_image_query['row']->vol_file_id])[1];
				
				#default square position calculation (open)
				if($width > $height){
					
					$square = round($height * 0.8);
					$rest_height = $height * 0.5 - $square * 0.5;
					$rest_width = $width * 0.5 - $square * 0.5;
					
				}else{
					
					$square = round($width * 0.8);
					$rest_height = $height * 0.5 - $square * 0.5;
					$rest_width = $width * 0.5 - $square * 0.5;
					
				}
				#default square position calculation (close)
				
			}
			#preparations (open)
			
			#content (open)
			if(1==1){
			   
				echo '
				<table>
					<tr>
						<td>
							<table class="cd_frame" style="height:'.$height.'px !important;width:'.$width.'px;">
								<tr style="padding:0px;">
									<td class="crop_divs    td_crop_left        td_crop_top"></td>
									<td class="crop_divs    td_crop_center      td_crop_top"><div class="sub_div"></div></td>
									<td class="crop_divs    td_crop_right       td_crop_top"></td>
								</tr>
								<tr>
									<td class="crop_divs    td_crop_left        td_crop_middle"><div class="sub_div"></div></td>
									<td class="crop_divs    td_crop_center      td_crop_middle"><div class="sub_div"></div></td>
									<td class="crop_divs    td_crop_right       td_crop_middle"><div class="sub_div"></div></td>
								</tr>
								<tr>
									<td class="crop_divs    td_crop_left        td_crop_bottom"></td>
									<td class="crop_divs    td_crop_center      td_crop_bottom"><div class="sub_div"></div></td>
									<td class="crop_divs    td_crop_right       td_crop_bottom"></td>
								</tr>
							</table>
							<img
								class="crop_image"
								src="'.$function_files['full_url_paths_for_use_via_id'][$perliminary_image_query['row']->vol_file_id].'"
							>
						</td>
					</tr>
					<tr>
						<td>
							<div class="voluno_button crop_image_button" style="width:100px;margin:auto;">
								Crop image
							</div>
							<form
								method="post"
								action="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'&view_as=edit_profile_picture"
								class="submit_cropped_image"
							>
								<input type="hidden" value="" name="crop_start_width" class="crop_start_width">
								<input type="hidden" value="" name="crop_start_height" class="crop_start_height">
								<input type="hidden" value="" name="crop_square" class="crop_square">
							</form>
							<div class="widthRow1 hidden_class">/</div>
							<div class="widthRow2 hidden_class">/</div>
							<div class="heightCol1 hidden_class">/</div>
							<div class="heightCol2 hidden_class">/</div>
						</td>
					</tr>
				</table>';
				
			}
			#content (open)
			
			#jquery (open)
			if(1==1){
				
				echo '
				<script>
					jQuery(document).ready(function(){';
				  
					#variable preparation (open)
					if(1==1){
						
						echo '
						var totalWidth  = '.$width.';
						var totalHeight = '.$height.'; 
						var widthRow1 = '.$rest_width.';
						var widthRow2 = '.($rest_width + $square).';
						var heightCol1 = '.$rest_height.';
						var heightCol2 = '.($rest_height + $square).';
						var squareWidthHeight = '.$square.';
			  
						var mousedown_border_left = "";
						var positionTopLeft  = "";
						var positionRight    = "";
						var positionBottom   = "";
						
						var valueLeft     = "";
						var valueTop      = "";
						var valueRight    = "";
						var valueBottom   = "";
						var rightLeftBlock = 0;
						
						var parentOffset = "";
						var relX = "";
						var relY = "";
						
						var width_center_mouse = "";
						var height_center_mouse = "";
						';
						
					}
					#variable preparation (close)
					
					#cursor (open)
					if(1==1){
						
						echo '
						jQuery(".cd_frame").mouseup(function(){
							jQuery(this).css("cursor","default");
						});
						
						jQuery(".td_crop_left > .sub_div, .td_crop_right > .sub_div").mousedown(function(){
							jQuery(".cd_frame").css("cursor","col-resize");
						});
						jQuery(".td_crop_top > .sub_div, .td_crop_bottom > .sub_div").mousedown(function(){
							jQuery(".cd_frame").css("cursor","row-resize");
						});
						jQuery(".td_crop_center.td_crop_middle > .sub_div").mousedown(function(){
							jQuery(".cd_frame").css("cursor","move");
						});
						';
						
					}
					#cursor (close)
					
					#submit cropped image (open)
					if(1==1){
						
						echo '
						jQuery(".crop_image_button").click(function(){
							jQuery(".submit_cropped_image").submit();
						});';
						
					}
					#submit cropped image (close)
				  
					#moving around and changing table positions and so on (open)
					if(1==1){
						
						echo '
						jQuery(".cd_frame").mousemove(function(e){';
							
							#find mouse and div coordinates (open)
							if(1==1){
								
								echo '
								if(totalWidth >= squareWidthHeight + widthRow1 && totalHeight >= squareWidthHeight + heightCol1){
									
									var parentOffset = jQuery(this).offset(); 
									var relX = e.pageX - parentOffset.left;
									var relY = e.pageY - parentOffset.top;
									jQuery(".x_coordinates").html(relX);
									jQuery(".y_coordinates").html(relY);
									
									var positionTopLeft  = jQuery(".td_crop_center.td_crop_middle").position();
									var positionRight    = jQuery(".td_crop_right").position();
									var positionBottom   = jQuery(".td_crop_bottom").position();
									
									var valueLeft     = Math.round(positionTopLeft.left);
									var valueTop      = Math.round(positionTopLeft.top);
									var valueRight    = Math.round(positionRight.left);
									var valueBottom   = Math.round(positionBottom.top);
									
									jQuery(".widthRow1").html(widthRow1);
									jQuery(".widthRow2").html(widthRow2);
									jQuery(".heightCol1").html(heightCol1);
									jQuery(".heightCol2").html(heightCol2);
									
									jQuery(".crop_start_width").val(widthRow1);
									jQuery(".crop_start_height").val(heightCol1);
									jQuery(".crop_square").val(squareWidthHeight);
									
								}else{
									
									if(rightLeftBlock == 5){
										var parentOffset = jQuery(".cd_frame").offset();
										if(parseInt(jQuery(".widthRow1").html()) < e.pageX - parentOffset.left){
											var relX = e.pageX - parentOffset.left;
										}
									}
									if(rightLeftBlock == 10){
										var parentOffset = jQuery(".cd_frame").offset();
										if(parseInt(jQuery(".widthRow2").html()) > e.pageX - parentOffset.left){
											var relX = e.pageX - parentOffset.left;
										}
									}
								   
								}
								;';
								
							}
							#find mouse and div coordinates (close)
							
							#move around (open)
							if(1==1){
								
								echo '
								jQuery(".td_crop_center.td_crop_middle").mousedown(function(e){
									
									mousedown_move = 1;
									
									width_center_mouse = relX - widthRow1;
									height_center_mouse = relY - heightCol1;
									
								});
								if(mousedown_move == 1){
									
									if(
										width_center_mouse < relX &&
										height_center_mouse < relY &&
										squareWidthHeight - width_center_mouse < totalWidth - relX &&
										squareWidthHeight - height_center_mouse < totalHeight - relY
									){
										
										widthRow1 = relX - width_center_mouse;
										widthRow2 = relX - width_center_mouse + squareWidthHeight;
										jQuery(".td_crop_left").width( widthRow1 + "px" );
										jQuery(".td_crop_right").width( totalWidth - widthRow2 + "px");
										
										heightCol1 = relY - height_center_mouse;
										heightCol2 = relY - height_center_mouse + squareWidthHeight;
										jQuery(".td_crop_top").height( heightCol1 + "px" );
										jQuery(".td_crop_bottom").height( totalHeight - heightCol2 + "px");
										
									}else if(
										
										width_center_mouse < relX &&
										squareWidthHeight - width_center_mouse < totalWidth - relX
										
									){
										
										widthRow1 = relX - width_center_mouse;
										widthRow2 = relX - width_center_mouse + squareWidthHeight;
										jQuery(".td_crop_left").width( widthRow1 + "px" );
										jQuery(".td_crop_right").width( totalWidth - widthRow2 + "px");
										
									}else if(
										
										height_center_mouse < relY &&
										squareWidthHeight - height_center_mouse < totalHeight - relY
										
									){
										
										heightCol1 = relY - height_center_mouse;
										heightCol2 = relY - height_center_mouse + squareWidthHeight;
										jQuery(".td_crop_top").height( heightCol1 + "px" );
										jQuery(".td_crop_bottom").height( totalHeight - heightCol2 + "px");
										
									}
									
								}';
								
							}
							#move around (open)
							
							#border action (open)
							if(1==1){
								
								#left border (open)
								if(1==1){
									
									echo '
									jQuery(".td_crop_left").mousedown(function(e){
										
										mousedown_border_left = 1;
										
									});
									
									jQuery(".crop_divs").mouseup(function(e){
										
										mousedown_move = 0;
										mousedown_border_right = 0;
										mousedown_border_left = 0;
										mousedown_border_top = 0;
										mousedown_border_bottom = 0;
										width_center_mouse = 0;
										height_center_mouse = 0;
										
									});
									
									if(mousedown_border_left == 1){
										
										rightLeftBlock = 5;
										jQuery(".td_crop_left").width( relX + "px" );
										jQuery(".td_crop_center").width( widthRow2 - relX + "px");
										jQuery(".td_crop_right").width( totalWidth - widthRow2 + "px");
										widthRow1 = relX;
										squareWidthHeight = widthRow2 - relX;
										
										jQuery(".td_crop_middle").height( squareWidthHeight + "px");
										jQuery(".td_crop_bottom").height( totalHeight - heightCol1 - squareWidthHeight + "px");
										heightCol2 = heightCol1 + squareWidthHeight;
										
									}';
									
								}
								#left border (close)
								
								#top border (open)
								if(1==1){
									
									echo '
									jQuery(".td_crop_top").mousedown(function(e){
										mousedown_border_top = 1;
										jQuery(".cd_frtame").css("cursor","row-resize");
									});
									
									if(mousedown_border_top == 1){
										
										jQuery(".td_crop_top").height( relY + "px" );
										jQuery(".td_crop_middle").height( heightCol2 - relY + "px");
										jQuery(".td_crop_bottom").height( totalHeight - heightCol2 + "px");
										heightCol1 = relY;
										squareWidthHeight = heightCol2 - relY;
										
										jQuery(".td_crop_center").width( squareWidthHeight + "px");
										jQuery(".td_crop_right").width( totalWidth - widthRow1 - squareWidthHeight + "px");
										widthRow2 = widthRow1 + squareWidthHeight;
										
									}';
									
								}
								#top border (close)
								
								#bottom border (open)
								if(1==1){
									
									echo '
									jQuery(".td_crop_bottom").mousedown(function(e){
										
										mousedown_border_bottom = 1;
										jQuery(".cd_ftrame").css("cursor","row-resize");
										
									});
									
									if(mousedown_border_bottom == 1){
										
										jQuery(".td_crop_top").height( heightCol1 + "px");
										jQuery(".td_crop_middle").height( relY - heightCol1 + "px");
										jQuery(".td_crop_bottom").height( totalHeight - relY + "px");
										heightCol2 = relY;
										squareWidthHeight = relY - heightCol1;
										
										jQuery(".td_crop_center").width( squareWidthHeight + "px");
										jQuery(".td_crop_right").width( totalWidth - widthRow1 - squareWidthHeight + "px");
										widthRow2 = widthRow1 + squareWidthHeight;
										
									}';
									
								}
								#bottom border (close)
								
								#right border (open)
								if(1==1){
									
									echo '
									jQuery(".td_crop_right").mousedown(function(e){
										
										mousedown_border_right = 1;
										jQuery(".cd_fratme").css("cursor","col-resize");
										
									});
									
									if(mousedown_border_right == 1){
										
										rightLeftBlock = 10;
										jQuery(".td_crop_left").width( widthRow1 + "px");
										jQuery(".td_crop_center").width( relX - widthRow1 + "px");
										jQuery(".td_crop_right").width( totalWidth - relX + "px" );
										widthRow2 = relX;
										squareWidthHeight = relX - widthRow1;
										
										jQuery(".td_crop_middle").height( squareWidthHeight + "px");
										jQuery(".td_crop_bottom").height( totalHeight - heightCol1 - squareWidthHeight + "px");
										heightCol2 = heightCol1 + squareWidthHeight;
										
									}';
									
								}
								#right border (close)
								
							}
							#border action (close)
							
						echo '
						});
						';
						
					}
					#moving around and changing table positions and so on (close)
				  
				   echo '
				   });
				</script>';
				
			}
			#jquery (close)
			
			#style (open)
			if(1==1){
				
				echo '
				<style>
					
					.hidden_class{
						display:none;
					}
					
					.cd_frame{
						position:absolute;
						border-width:0px,
						border-collapse:collapse;
						overflow:hidden;
					}
					
					table .cd_frame tr td {
						padding:0px !important;
					}
					
					.crop_divs{
						overflow:hidden;
					}
					
					.td_crop_left{
						width:'.$rest_width.'px;
					}
					.td_crop_center{
						width:'.$square.'px;
					}
					.td_crop_right{
						width:'.$rest_width.'px;
					}
					
					.td_crop_top{
						height:'.$rest_height.'px;
					}
					.td_crop_middle{
						height:'.$square.'px;
					}
					.td_crop_bottom{
						height:'.$rest_height.'px;
					}
					
					.td_crop_bottom.td_crop_center,.td_crop_top.td_crop_center{
						cursor:s-resize;
					}
					.td_crop_right.td_crop_middle,.td_crop_left.td_crop_middle{
						cursor:e-resize;
					}
					.td_crop_middle.td_crop_center{
						cursor:all-scroll;
					}
					
					.td_crop_top,.td_crop_bottom,.td_crop_left,.td_crop_right{
						background-color:#000;
						opacity:0.8;
					}
					
					.sub_div{
						width:100%;
						height:100%;
					}
					
				</style>';
				
			}
			#style (close)
			
		}
		#crop image: step 2 (open)
		
		echo '
		<table style="margin:auto;margin-top:30px;width:80%;">
			<tr>';
				
				#current picture (open)
				if($is_there_a_profile_picture_yet == "yes"){
					
					echo '
					<td style="width:25%;text-align:center;padding-right:70px;">
						<h5 style="display:inline;">
							Current profile picture
						</h5>
						<br><br>';
						
						#function-image-processing - profile picture
						#profile picture
							$function_propic__type = "profile picture";
							$function_propic__user_id = $function_myOfficeArm['owner_user_object']->usersext_id;
						#all
							$function_propic__geometry = array(200,200); //optional, if e.g. only width: 300, NULL; vice versa
						include('#function-image-processing.php');
						
						echo'
						<div class="current_profile_picture">
							<img style="border-radius:25px;" class="profile_picture" src="'.$function_propic.'">
						</div>
						<div
							class="voluno_button delete_image"
							style="background-color:#8B0000;font-weight:bold;border:0px;width:70px;margin: 20px auto 0px auto;"
						>
							Delete image
						</div>
						<form
							action="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'&view_as=edit_profile_picture"
							method="post"
							class="delete_image_form"
							name="delete_image_form"
						>
							<input type="hidden" name="delete_image" value="delete_image">
						</form>
					</td>';
					
				}
				#current picture (close)
				
				#upload image (open)
				if(1==1){
					
					#prepare (open)
					if(1==1){
						
						#instructions 2 (open)
						if($change_profile_picture_page == 'step 1: nothing has happened yet, user can upload image'
						   AND $is_there_a_profile_picture_yet == "no"){
							
							$instructions = '
							Please upload a profile picture.';
							
						}elseif($change_profile_picture_page == 'step 1: nothing has happened yet, user can upload image'
								AND $is_there_a_profile_picture_yet == "yes"){
							
							$instructions = '
							Please upload a new profile picture.';
							
						}elseif($change_profile_picture_page == 'step 2: image uploaded, now user can crop'){
							
							$instructions = '
							Alternatively, you can upload a new image.';
							
						}elseif($change_profile_picture_page == 'step 3: cropped image saved successfully'){
							
							$instructions = '
							Want to upload a different image?';
							
						}
						#instructions 2 (close)
						
						#warning (open)
						if(!empty($function_files['error'])){
						   
						   $warning = '
						   <tr>
								<td colspan="3" style="color:red;">
								   Please only upload image files of the type .jpg, .jpeg, .png, .gif, .bmp or .tiff.
								</tr>
						   </tr>';
						   
						}
						#warning (close)
						
					}
					#prepare (close)
					
					echo '
					<td>
						<h5 style="display:inline;">
							Upload new image
						</h5>
						<br>
						<br>
						'.$instructions.'
						<br>
						<br>
						We would like to encourage you to use portrait pictures.
						<br>
						Ideally, the image resolution should be at least 500 x 500 pixels.
						<br>
						<form method="post"
							action="'.get_permalink().'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'&view_as=edit_profile_picture"
							enctype="multipart/form-data"
						>';
							
							#table (open)
							if(1==1){
								
								echo '
								<table>
									<tr style="text-align:center;">
										<td style="width:80px;">
											<div class="voluno_button selected_file_area">
												Select image
											</div>
											<input type="file" class="select_file" style="display:none;" name="select_file">
										</td>
										<td style="vertical-align:middle;width:210px;">
											<div
												class="selected_file_area"
												style="
													position:absolute;
													opacity:0;
													background-color:#000;
													width:207px;
													height:25px;
												"
											>
											</div>
											<input class="selected_file" placeholder="No file selected" disabled="disabled" style="width:200px;text-align:center;">
										</td>
										<td>
											<div
											   class="voluno_button submit_file_area"
											   style="background-color:#8B0000;font-weight:bold;border:0px;width:70px;"
											>
											   Upload image
											</div>
											<input type="submit" class="submit_file" style="display:none;" name="submit_file">
										</td>
									</tr>
									'.$warning.'
								</table>';
								
							}
							#table (close)
							
						echo '
						</form>
					</td>';
					
				}
				#upload image (close)
				
			echo '
			</tr>
		</table>
		';
		
	}
	#content (close)
	
	#jquery (open)
	if(1==1){
		
		echo '
		<script>
			jQuery(document).ready(function(){';
				
				#update profile picture in top sidebar after cropping (open)
				if(1==1){
					
					echo '
					if(jQuery(".current_profile_picture").html() != ""){
						jQuery(".profile_picture_in_top_sidebar").html(jQuery(".current_profile_picture").html());
					}else{
						jQuery(".profile_picture_in_top_sidebar").html(jQuery(".current_profile_picture_default").html());
					}
					jQuery(".profile_picture_in_top_sidebar").children("img").width("90px");
					jQuery(".profile_picture_in_top_sidebar").children("img").height("90px");
					jQuery(".profile_picture_in_top_sidebar").children("img").css("border-radius","10px");
					';
					
				}
				#update profile picture in top sidebar after cropping (close)
				
				#profile picture hover (open)
				if(1==1){
					
					echo '
					jQuery(".profile_picture").hover(function(){
						jQuery(this).css("opacity","0.85");
					},function(){
						jQuery(this).css("opacity","");
					})';
					
				}
				#profile picture hover (close)
				
				#upload form (open)
				if(1==1){
					
					echo'
					jQuery(".select_file").change(function(){
						jQuery(".selected_file").val(jQuery(this).val());
					});
					jQuery(".selected_file_area").click(function(){
						jQuery(".select_file").click();
					});
					jQuery(".submit_file_area").click(function(){
						if( jQuery(".selected_file").val() != ""){
							jQuery(".submit_file").click();
						}else{
							alert("No image selected. Please select an image by pressing on \"Select image\".");
						}
					});';
					
				}
				#upload form (close)
				
				#delete image (open)
				if(1==1){
					
					echo'
					jQuery(".delete_image").click(function(){
						var sureYouWantToDeleteImage = confirm("Are you sure you want to delete your current profile picture?");
						if(sureYouWantToDeleteImage == true){
							jQuery(".delete_image_form").submit();
						}
					});';
					
				}
				#delete image (close)
				
			echo '
			});
	   </script>';
	   
	}
	#jquery (close)
	
	#style (open)
	if(1==1){
		
		echo '
		<style>';
			
			#voluno button (open) ###this is already defined elsewhere, i think
			if(1==1){
				
				echo '
				.voluno_button{
					cursor:pointer;
					background-color:#8B0000 !important;
					margin-top:5px;
					color:#fff;
					padding:10px;
					border-radius:250px;
					font-weight:bold;
					text-align: center;
					color:#fff;
					-webkit-touch-callout: none;
					-webkit-user-select: none;
					-khtml-user-select: none;
					-moz-user-select: none;
					-ms-user-select: none;
					user-select: none;
				}
				.voluno_button:hover{
					background-color: #D6341D !important;
				}';
				
			}
			#voluno button (close)
		
		echo '
		</style>';
		
	}
	#style (close)
	
}
#edit profile picture view (close)

?>