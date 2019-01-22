<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-ngo-add.php (v1.0) (open)
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
				
				$function_ngoadd['section'] = 'mysql update';  //'mysql update' or 'form'. If not given, function is deactivated.
				
				# Only relevant for 'mysql update' section:
					#$function_ngoadd['ngo admin user id'] = ; // Default: current user id. User who will become admin of the NGO.
						#todolist: this feature doesn't work yet since it needs to be in the
						#post and we need a function which prevents post data manipulation.
						# Currently, it's always the current user.
					$function_ngoadd['redirect to ngo profile'] = 'no'; //optional, 'yes' (default) or 'no'
				
				# Only relevant for 'form' section:
					$function_ngoadd['p_style'] = ''; //Optional, default: empty. Example: text-align:center;
				
				include('#function-ngo-add.php');
				
				#output
				# $function_ngoadd['form']; // Only if the section is 'form'.
				
			}
			#input (close)
			
		}
		#function-ngo-add.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.10.29, Steve
		## Last format and structure check: 2016.10.29, Steve
		## Last update of all instances this function is used: 2016.10.29, Steve
		
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
	
	$function_ngoadd['internal'] = $function_ngoadd;
	
}
#input (close)

#section: mysql update (open)
if($function_ngoadd['internal']['section'] == 'mysql update'){ ///2
	
	#new ngo (open)
	if(!empty($_POST['voluno_ngoadd_newNgoName'])){
		
		$function_ngoadd['internal']['new ngo name'] = $_POST['voluno_ngoadd_newNgoName'];
		
		#function-sanitize-text.php (v1.0) (open)
		if(1==1){ ///3
			
			$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
			/*
				one line unformatted text (city, name, occupation, etc.)
				url readable text (url, user_nicename, etc.) (sanitize_title)
				email address
				plain text with line breaks (biography)
			*/
			$function_sanitize_text__text = $function_ngoadd['internal']['new ngo name'];
			include('#function-sanitize-text.php');
			$function_ngoadd['internal']['new ngo name'] = $function_sanitize_text__text_sanitized;
			
		}
		#function-sanitize-text.php (v1.0) (close)
		
		#validation - check if ngo already exists (open)
		if(1==1){ ///3
			
			$function_ngoadd['internal']['check if ngo already exists query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_development_organizations
				WHERE ngo_name = %s;',
				$function_ngoadd['internal']['new ngo name']
			);
			$function_ngoadd['internal']['check if ngo already exists row']
			= $GLOBALS['wpdb']->get_row($function_ngoadd['internal']['check if ngo already exists query']);
			
			#check (open)
			if(empty($function_ngoadd['internal']['check if ngo already exists row'])){
				
				$function_ngoadd['internal']['ngo name is still available'] = "yes";
				
			}else{
				
				$function_ngoadd['internal']['ngo name is still available'] = "no";
				
			}
			#check (close)
			
		}
		#validation - check if ngo already exists (open)
		
		#validation execution (open)
		if($function_ngoadd['internal']['ngo name is still available'] == "yes"){
			
			#database updates (open)
			if(1==1){ ///4
				
				#add ngo (open)
				if(1==1){
					
					$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_development_organizations',
						array(
							'ngo_name' => $function_ngoadd['internal']['new ngo name'],
							
							'ngo_date_modified' => date("Y-m-d H:i:s"),
							'ngo_date_created' => date("Y-m-d H:i:s")
						),
						array(
							'%s',
							'%s','%s'
						)
					);
					
					$function_ngoadd['internal']['id of new ngo'] = $GLOBALS['wpdb']->insert_id;
					
				}
				#add ngo (close)
				
				#add ngo admin (open)
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
							
							$function_userpositions_update['user_id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id; //obligatory. Integer or 'current_user' to use current user.
							
							// To set up the function correctly, please look up the 'Technical feature: User positions'.
								$function_userpositions_update['position_pure'] = 'NGO Administrator';
								$function_userpositions_update['position_additional_information'] = $function_ngoadd['internal']['id of new ngo'];
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
				#add ngo admin (close)
			}
			#database updates (close)
			
			#function-redirect.php (v1.0) (open)
			if($function_ngoadd['internal']['redirect to ngo profile'] != 'no'){ //redirect to new ngo ///5
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_redirect['redirect_url'] = get_permalink(853).'?ngo='.$function_ngoadd['internal']['id of new ngo']; // url to redirect to. If none is given, homepage is used.
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close)
			
		}
		#validation execution (close)
		
	}
	#new ngo (close)
	
	//unset everything
	unset($function_ngoadd);
	
}
#section: mysql update (close)

#section: form (open)
elseif($function_ngoadd['internal']['section'] == 'form'){ //10
	
	#mysql (open)
	if(1==1){ ///11
		
		$function_ngoadd['internal']['all ngos query'] = $GLOBALS['wpdb']->prepare(
			'SELECT *
			FROM fi4l3fg_voluno_development_organizations
			WHERE ngo_status != "deleted"
			ORDER BY ngo_name ASC;'
		);
		$function_ngoadd['internal']['all ngos results'] = $GLOBALS['wpdb']->get_results($function_ngoadd['internal']['all ngos query']);
		
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
				# Method 4: Simple pure arrays
				#    $function_userpositions_get['simple_pure_array'][STATUS][INDEX] = SPECIFIC PURE POSITION NAME   //STATUS = pending or accepted
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
		
		#already member of an ngo (open)
		if(in_array('NGO Member',$function_userpositions_get['simple_pure_array']['accepted'])){
			
			$function_ngoadd['internal']['already_member_of_an_ngo'] = 'yes';
			
		}
		#already member of an ngo (close)
		
	}
	#mysql (close)
	
	#style (open)
	if($function_ngoadd['internal']['already_member_of_an_ngo'] == 'yes' AND empty($GLOBALS['voluno_variables']['#function-example.php']['already loaded style once'])){
		
		$GLOBALS['voluno_variables']['#function-example.php']['already loaded style once'] = 1;
		
		echo '
		<style>
			
			.voluno_function_ngoadd_addorjoinnewngo{
				display:none;
			}
			
		</style>';
		
	}
	#style (close)
	
	#jquery (open)
	if(1==1){ ///12
		
		echo '
		<script>
			jQuery(document).ready(function(){';
				
				// Show link to NGO profile
				echo '
				jQuery(".voluno_ngoadd_checkForNgo").change(function(){
					if(jQuery(".voluno_ngoadd_checkForNgo").val() != ""){
						jQuery(".voluno_ngoadd_checkForNgoAction_ngo_name").html(jQuery(".voluno_ngoadd_checkForNgo").children(":selected").text());
						jQuery(".voluno_ngoadd_checkForNgoAction").fadeIn(300);
						jQuery(".voluno_ngoadd_visitNgoProfileAndApplyToJoin").prop("href", "'.get_permalink(853).'?ngo="+jQuery(".voluno_ngoadd_checkForNgo").val())
					}else{
						jQuery(".voluno_ngoadd_checkForNgoAction").fadeOut(300);
					}
				});';
				
				// Validate new NGO name and submit form
				echo '
				jQuery(".voluno_ngoadd_newNgoSubmit").click(function(){
					if(jQuery(".function_textinput_limit__len_voluno_ngoadd_newNgoName").html() > 3){;
						jQuery(".voluno_ngoadd_newNgoForm").submit();
					}else{
						jQuery(".function_textinput_limit_div_voluno_ngoadd_newNgoName").html("Please provide the name of your organization.");
					}
				});';
				
				#already a member and add more (open)
				if(1==1){
					
					echo '
					jQuery(".voluno_function_ngoadd_alreadymemberandwantsmore").click(function(){
						jQuery(".voluno_function_ngoadd_addorjoinnewngo").fadeToggle();
					});';
					
				}
				#already a member and add more (close)
				
			echo '
			});
		</script>';
		
	}
	#jquery (close)
	
	#content: form (open)
	if(1==1){ ///13
		
		$function_ngoadd['output']['form'] .=
		'<form autocomplete="off" class="voluno_ngoadd_newNgoForm" method="post" action="'.get_permalink().'">';
			
			#ngos the user is part of (open)
			if(1==1){
				
				#preparation (open)
				if(1==1){
					
					#heading (open)
					if(count($function_userpositions_get['output']['ngo_array_unsorted']['all']) > 1){
						
						$function_ngoadd['internal']['current Development Organization_s'] = 'organizations';
						
					}else{
						
						$function_ngoadd['internal']['current Development Organization_s'] = 'organization';
						
					}
					#heading (close)
					
					#$function_userpositions_get['output']['ngo_array_unsorted']['accepted'] ###
					
					#list of current NGOs (open)
					for($all=0;$all<count($function_userpositions_get['ngo_array_unsorted']['all']);$all++){
						
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
								
								$function_profileLink['id'] = $function_userpositions_get['ngo_array_unsorted']['all'][$all]['ngo_id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
						
						#NGO Member',$function_userpositions_get['simple_pure_array']['accepted']
						
						$function_userpositions_get['input']['current_ngos']
						.=
						'<ul style="margin-left:30%;"><li>'.
							$function_profileLink['name_link'].
							' ('.
							$function_userpositions_get['ngo_array_unsorted']['all'][$all]['position'].
							')
						</li>
						</ul>';
						
					}
					#list of current NGOs (close)
					
				}
				#preparation (close)
				
				#execution (open)
				if($function_ngoadd['internal']['already_member_of_an_ngo'] == 'yes'){
					
					$function_ngoadd['output']['form'] .= '
					<div style="margin:20px 0px 10px 0px;">
						<h4 style="display:inline;">
							Your current development '.$function_ngoadd['internal']['current Development Organization_s'].'
						</h4>
					</div>
					<p style="margin:10px 0px;'.$function_ngoadd['internal']['p_style'].'">
						You\'re currently part of the following organizations:
						<br>
						'.$function_userpositions_get['input']['current_ngos'].'
						<br>
						<a class="voluno_function_ngoadd_alreadymemberandwantsmore" style="cursor:pointer;">
							Do you want join another organization or register a new one?
						</a>
					</p>';
					
				}
				#execution (close)
				
			}
			#ngos the user is part of (close)
			
			#seach for ngo (open)
			if(1==1){
				
				$function_ngoadd['output']['form'] .= '
				<div class="voluno_function_ngoadd_addorjoinnewngo">
					<div style="margin:20px 0px 10px 0px;">
						<h4 style="display:inline;">
							Search for your organizations
						</h4>
					</div>';
					
					#select existing (open)
					if(1==1){
						
						$function_ngoadd['output']['form'] .= '
						<p style="margin:10px 0px;'.$function_ngoadd['internal']['p_style'].'">
							Please ensure that your organization isn\'t already registered.
							<br>
							Here is a list of all '.count($function_ngoadd['internal']['all ngos results']).' development organizations currently registered with Voluno:
						</p>
						
						<select style="text-align:center;" class="voluno_ngoadd_checkForNgo">
							<option
								value=""
								selected
							>
								- - - Please select - - -
							</option>';
							for($aec=0;$aec<count($function_ngoadd['internal']['all ngos results']);$aec++){
								$function_ngoadd['output']['form'] .= '
								<option
									value="'.$function_ngoadd['internal']['all ngos results'][$aec]->ngo_id.'"
								>
									'.$function_ngoadd['internal']['all ngos results'][$aec]->ngo_name.'
								</option>';
							}
						$function_ngoadd['output']['form'] .= '
						</select>';
						
					}
					#select existing (close)
					
					$function_ngoadd['output']['form'] .= '
					<div class="voluno_ngoadd_checkForNgoAction" style="display:none;margin:10px 0px;">
						<p style="'.$function_ngoadd['internal']['p_style'].'">
							If you found your organization, please visit its profile and apply to join.
						</p>
						<a class="voluno_ngoadd_visitNgoProfileAndApplyToJoin" href="">
							<div class="voluno_button">
								Visit profile of
								<span class="voluno_ngoadd_checkForNgoAction_ngo_name">
								</span>
							</div>
						</a>
					</div>
				</div>';
				
			}
			#search for ngo (close)
			
			#add ngo (open)
			if(1==1){
				
				#preparation (open)
				if(1==1){
					
					#function-validation-limit-textinput-size.php (v1.0) (open)
					if(1==1){
						
						$function_textinput_limit['class'] = 'voluno_ngoadd_newNgoName';
						#$function_textinput_limit['if_zero'] = ''; //default: none => zero is allowed
						$function_textinput_limit['if_middle1'] = ''; //default: none
						$function_textinput_limit['if_middle2'] = ' of '; //default: ' of ';
						$function_textinput_limit['if_middle3'] = ' characters left.'; //default: ' characters left.';
						$function_textinput_limit['if_max1'] = 'You have reached the character limit of '; //default: 'You have reached the character limit of '
						$function_textinput_limit['if_max2'] = '. Maybe consider using an abbreviation.<br>Please do not add slogans.'; //default: '.';
						include('#function-validation-limit-textinput-size.php');
						#$function_textinput_limit
						#please add maxlength="" to your text-input
						#outputs saves string lenght to class: function_textinput_limit__len_voluno_ngoadd_newNgoName
						/*Maybe useful code for you:
							jQuery(".edit_title_save").click(function(){
								if(jQuery(".function_textinput_limit__len_edit_title_input").html() > 0){;
									jQuery(".edit_title_form").submit();
								}
							});
						*/
					}
					#function-validation-limit-textinput-size.php (v1.0) (close)
					
				}
				#preparation (close)
				
				#content (open)
				if(1==1){
					
					$function_ngoadd['output']['form'] .= '
					<div class="voluno_function_ngoadd_addorjoinnewngo">
						<div style="margin:20px 0px 10px 0px;">
							<h4 style="display:inline-block;">
								Register new organization
							</h4>
						</div>
						<p style="margin:10px 0px;'.$function_ngoadd['internal']['p_style'].'">
							If it\'s not registered yet, please register it now.
							<br>
							What is your organizations name?
						</p>
						
						<input
							type="text"
							class="voluno_ngoadd_newNgoName"
							name="voluno_ngoadd_newNgoName"
							style="width:200px;text-align:center;"
							maxlength="50"
							placeholder="NGO Name"
						>
						
						'.$function_textinput_limit.'
						<div class="voluno_button voluno_ngoadd_newNgoSubmit">
							Add new organization
						</div>
					</div>';
					
				}
				#content (close)
				
			}
			#add ngo (close)
			
		$function_ngoadd['output']['form'] .= '
		</form>';
		
	}
	#content: form (close)
	
	#output (open)
	if(1==1){ ///14
		
		$function_ngoadd = $function_ngoadd['output'];
		
		$GLOBALS['voluno_variables']['#function-example.php']['already loaded once'] = 1;
		
	}
	#output (close)
	
}
#section: form (close)

?>