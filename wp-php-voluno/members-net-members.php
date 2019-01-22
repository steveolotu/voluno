<?php

#mysql (open)
if(1==1){
    
    #update (open)
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
				#$function_ngoadd['ngo admin user id'] = ; // Default: current user id. User who will become admin of the NGO.
				#todolist: this feature doesn't work yet since it needs to be in the post and we need a function which prevents post data manipulation.
				
				include('#function-ngo-add.php');
				
				#output
				# $function_ngoadd['form']
				
			}
			#input (close)
			
		}
		#function-ngo-add.php (v1.0) (close)
        
        #new ngo (open)
        if(!empty($_POST['new_ngo_name'])){
            
            $new_ngo_name = $_POST['new_ngo_name'];
            
            #function-sanitize-text.php (v1.0) (open)
            if(1==1){
                
                $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                
                # one line unformatted text (city, name, occupation, etc.)
                # url readable text (url, user_nicename, etc.) (sanitize_title)
				# email address
                # plain text with line breaks (biography)
                
                $function_sanitize_text__text = $new_ngo_name;
                include('#function-sanitize-text.php');
                $new_ngo_name = $function_sanitize_text__text_sanitized;
                
            }
            #function-sanitize-text.php (v1.0) (close)
            
            #check if ngo already exists (open)
            if(1==1){
                $check_if_ngo_already_exists_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_development_organizations
                                                                    WHERE ngo_name = %s;',
                                                                    $new_ngo_name);
                $check_if_ngo_already_exists_row = $GLOBALS['wpdb']->get_row($check_if_ngo_already_exists_query);
                
                if(empty($check_if_ngo_already_exists_row)){
                    $ngo_name_is_available = "yes";
                }else{
                    $ngo_name_is_available = "no";
                }
                
            }
            #check if ngo already exists (open)
            
            #database query insert (open)
            if($ngo_name_is_available == "yes"){
                $GLOBALS['wpdb']->insert(
                            'fi4l3fg_voluno_development_organizations',
                        array(
                            'ngo_name' => $new_ngo_name,
                            
                            'ngo_date_modified' => date("Y-m-d H:i:s"),
                            'ngo_date_created' => date("Y-m-d H:i:s")
                        ),
                        array(
                            '%s',
                            '%s','%s'
                        ));
                
                $id_of_new_ngo = $GLOBALS['wpdb']->insert_id;
                
                $GLOBALS['wpdb']->insert(
                            'fi4l3fg_voluno_development_organizations_properties',
                        array(
                            'ngo_prop_ngo_id' => $id_of_new_ngo,
                            'ngo_prop_type_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                            
                            'ngo_prop_type_general' => "position",
                            'ngo_prop_type_specific' => "worker",
                            'ngo_prop_type_detail' => "admin",
                            'ngo_prop_type_status' => "accepted",
                            
                            'ngo_prop_date_modified' => date("Y-m-d H:i:s"),
                            'ngo_prop_date_created' => date("Y-m-d H:i:s")
                        ),
                        array(
                            '%s','%s',
                            '%s','%s','%s','%s',
                            '%s','%s'
                        ));
                
            }
            #database query insert (close)
            
			#function-redirect.php (v1.0) (open)
			if($ngo_name_is_available == "yes"){ //redirect to new ngo
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_redirect['redirect_url'] = get_permalink()."?development_organization=".$id_of_new_ngo; // url to redirect to. If none is given, homepage is used.
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close)
			
			#function-redirect.php (v1.0) (open)
			if($ngo_name_is_available == "no"){ //redirect to new ngo
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_redirect['redirect_url'] = get_permalink()."?development_organization=".$check_if_ngo_already_exists_row->ngo_id; // url to redirect to. If none is given, homepage is used.
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close)
            
        }
        #new ngo (close)
        
    }
    #update (close)
    
    #get data (open)
    if(1==1){
        
        #all users (open)
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
					
					#$function_userRelSta['array'] = [1,2,3]; // Optional. Default is an array of all users.
					$function_userRelSta['user'] = ['user_id' => 'current_user', 'include_user_in_output' => 'yes'];
					// user_id: Optional. User id or 'current_user'. include_user_in_output
					// include_user_in_output: If user_id is given, then 'yes' or 'no' (default). Includes the selected user id in the output arrays
					$function_userRelSta['add_users_extended_arrays'] = 'yes'; //'yes','no' (default).
					
				}
				#input (close)
				
				include('#function-user-relationships-and-status.php');
				
				#output (open)
				if(1==1){
					
					# $function_userRelSta['all'] //all users registered at Voluno.
					#
					# $function_userRelSta['active'] //users which have the status "active".
					# $function_userRelSta['inactive'] //users which do not have the status "active": "draft", "paused", "locked" or "deleted"
					# 	$function_userRelSta['draft']
					# 	$function_userRelSta['paused']
					# 	$function_userRelSta['locked']
					# 	$function_userRelSta['deleted']
					#
					# $function_userRelSta['contacts'] // All not blocked contacts
					# $function_userRelSta['blocked'] // All blocked contacts
					# 	not yet programmed: $function_userRelSta['blocked_by_this_user']
					# 	not yet programmed: $function_userRelSta['blocked_by_other_user']
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
			
			$all_visible_members_results = $function_userRelSta['active'];
			
			#add users_extended properties (open)
			for($amg=0;$amg<count($function_userRelSta['users_extended']['all']);$amg++){
				
				#only selection (open)
				if(in_array($function_userRelSta['users_extended']['all'][$amg]->usersext_id,$all_visible_members_results)){
					
					$all_visible_members_results_new[] = $function_userRelSta['users_extended']['all'][$amg];
					
				}
				#only selection (close)
				
				#rename (open)
				if($amg+1==count($function_userRelSta['users_extended']['all'])){
					
					$all_visible_members_results = $all_visible_members_results_new;
					
				}
				#rename (close)
				
			}
			#add users_extended properties (close)
			
            #filter out blocked users and those who don't want to be found (open)
            for($aeu=0;$aeu<count($all_visible_members_results);$aeu++){
                
				#function-get-user-settings.php (v1.0) (open)
				if(1==1){
					
					$function_get_user_settings = $all_visible_members_results[$aeu]->usersext_id; //user id. default is current user
					include('#function-get-user-settings.php');
					#output array (value: yes or no, keys: settings name): $function_get_user_settings //if no user value, use default as defined in my settings php
					
					#Alternatively, do a for loop with:
						#$function_get_user_settings_array[]['key']
						#$function_get_user_settings_array[]['value']
						#$function_get_user_settings_array[]['user_or_default_value']
						
				}
				#function-get-user-settings.php (v1.0) (close)
				
				#not blocked and want to be found (open)
				if($function_get_user_settings['show in voluno members page'] == "yes"
				   AND !in_array($all_visible_members_results[$aeu]->usersext_id,$function_userRelSta['blocked'])
				){
					
					$all_visible_members_results_new[] = $all_visible_members_results[$aeu];
					
				}
				#not blocked and want to be found (close)
				
				#rename (open)
				if($aeu+1==count($all_visible_members_results)){
					
					$all_visible_members_results = $all_visible_members_results_new;
					
				}
				#rename (close)
                
            }
            #filter out blocked users and those who don't want to be found (close)
			
        }
        #all users (close)
        
        #all ngos (open)
        if(1==1){
            
            $all_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                FROM fi4l3fg_voluno_development_organizations
                                                
                                                '.#impact area
                                                'LEFT JOIN (
                                                    SELECT list_countries_name AS impact_area_name, list_countries_id AS impact_area_id
                                                    FROM fi4l3fg_voluno_lists_countries
                                                    ) AS aaa_impact_area
                                                    ON ngo_geographic_impact = impact_area_id
                                                
                                                '.#country
                                                'LEFT JOIN (
                                                    SELECT list_countries_name AS country_name, list_countries_id AS country_id
                                                    FROM fi4l3fg_voluno_lists_countries
                                                    ) AS aaa_country
                                                    ON ngo_country = country_id
                                                
                                                WHERE ngo_status != "deleted"
                                                ORDER BY ngo_name ASC;'
                                                );
            $all_ngos_results = $GLOBALS['wpdb']->get_results($all_ngos_query);
            
        }
        #all ngos (close)
        
    }
    #get data (close)
    
}
#mysql (close)

#jquery (open)
if(1==1){
	
    echo '
    <script>
        jQuery(document).ready(function(){';
            
            echo '
            jQuery(".add_new_organization_menu_link").click(function(){
                jQuery(".add_new_organization_menu").fadeToggle(300);
            });';
            
            echo '
            jQuery(".voluno_addngo_checkForNgo").change(function(){
                if(jQuery(".voluno_addngo_checkForNgo").val() != ""){
                    jQuery(".voluno_addngo_checkForNgoAction_ngo_name").html(jQuery(".voluno_addngo_checkForNgo").children(":selected").text());
                    jQuery(".voluno_addngo_checkForNgoAction").fadeIn(300);
                    jQuery(".voluno_addngo_visitNgoProfileAndApplyToJoin").prop("href", "'.get_permalink(853).'?development_organization="+jQuery(".voluno_addngo_checkForNgo").val())
                }else{
                    jQuery(".voluno_addngo_checkForNgoAction").fadeOut(300);
                }
            });';
            
            echo '
            jQuery(".new_ngo_submit").click(function(){
                if(jQuery(".function_textinput_limit__len_new_ngo_name").html() > 1){;
                    jQuery(".voluno_addngo_newNgoForm").submit();
                }else{
                    jQuery(".function_textinput_limit_div_new_ngo_name").html("Please provide the name of your organization.");
                }
            });';
            
        echo '
        });
    </script>';
	
}
#jquery (close)

#style (open)
if(1==1){
    echo '
    <style>
        .content_div{
            background-color:#FFEAB9;
            padding:20px;
            border-radius:20px;
            text-align:center;
        }
        .content_div:hover{
            background-color:#FFD87D;
        }
    </style>';
}
#style (close)

#content (open)
if(1==1){
    
    #image + title + text (open)
    if(1==1){
        
        #prepare (open)
        if(1==1){
            
            #user ids for picture (open)
            if(1==1){
                
                #get user ids (and filter those out without profile pics) (open)
                for($x=0;$x<count($all_visible_members_results);$x++){
                    
					if(!empty($all_visible_members_results[$x]->usersext_imageName)){
                        
                        $member_ids_for_image_array[] = $all_visible_members_results[$x]->usersext_id;
                        
                    }else{
                        $member_ids_for_image_empty_array[] = $all_visible_members_results[$x]->usersext_id;
                    }
                }
                #get user ids (and filter those out without profile pics) (close)
                
                shuffle($member_ids_for_image_array);
                $member_ids_for_image_array = array_merge($member_ids_for_image_array,$member_ids_for_image_empty_array);
            }
            #user ids for picture (close)
            
			#function-user-positions-get.php (v1.8) (open)
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
            
            #dome - the following isn't used yet. i might do something to show the current settings on this page.
            #function-get-user-settings.php (v1.0) (open)
            if(2==1){
                #$function_get_user_settings = ; //user id. default is current user
                include('#function-get-user-settings.php');
                #output array (value: yes or no, keys: settings name): $function_get_user_settings
                //if no user value, use default as defined in my settings php
            }
            #function-get-user-settings.php (v1.0) (close)
            
        }
        #prepare (close)
        
        #content (open)
        if(1==1){
            
            echo '
            <div style="height:210px;position:relative;text-align:right;">';
                
                #img (open)
                if(1==1){
                    echo '
                    <div class="voluno_header_picture" title="Some of our members">
                        <table
                            style="
                                padding:0px;
                                border:0px;
                                border-collapse:collapse;
                                border-spacing:0px;
                                line-height:0px;
                            "
                        >';
                            $member_ids_for_image_counter = 0;
                            for($aed=0;$aed<4;$aed++){
                                echo '
                                <tr style="padding:0px;line-height:0px;">
                                    <td style="padding:0px;border:0px;border-collapse:collapse;border-spacing:0px;line-height:0px;">';
                                        for($aee=0;$aee<6;$aee++){
                                            
                                            #function-image-processing
                                               #profile picture
                                                 $function_propic__type = "profile picture";
                                                 $function_propic__user_id = $member_ids_for_image_array[$member_ids_for_image_counter];
                                               #all
                                                 $function_propic__geometry = array(45,45); //optional, if e.g. only width: 300, NULL; vice versa
                                               include('#function-image-processing.php');
                                               
                                            echo 
                                            '<img src="'.$function_propic.'" style="margin:0px;">';
                                            $member_ids_for_image_counter++;
                                        }
                                    echo 
                                    '<td/>
                                </tr>';
                            }
                        echo '
                        </table>
                    </div>';
                }
                #img (close)
                
                #add/join ngo button (open)
                if(1==1){#in_array('NGO Member',$function_userpositions_get['simple_pure_array']['accepted'])){ //only relevant for ngo workers
                    
                    echo '
                    <div
                        class="voluno_button add_new_organization_menu_link"
                        style="position:absolute;margin-top:167px;margin-left:-200px;"
                    >
                        Add or join an
                        organization
                    </div>';
                    
                }
                #add/join ngo button (close)
                
                #text (open)
                if(1==1){
                    echo '
                    <div style="text-align:center;">
                        <div style="padding:30px;">
                            <h1 style="display:inline">
                                Voluno members
                            </h1>
                        </div>
                        <p>
                            This page provides an overview of all people and all organizations registered at Voluno.'.
							#If you don\'t want to your personal profile to be listed, you
                            #can change your personal visibility settings <a href="'.get_permalink(770).'" title="Go to my settings">here</a>.
                            '
                        </p>
                    </div>';
                }
                #text (close)
                
            echo '
            </div>';
            
        }
        #content (close)
        
    }
    #image + title + text (close)
    
    #add new ngo (open)
    if(1==1){#in_array('NGO Member',$function_userpositions_get['simple_pure_array']['accepted'])){
        
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
				#$function_ngoadd['ngo admin user id'] = ; // Default: current user id. User who will become admin of the NGO.
				#todolist: this feature doesn't work yet since it needs to be in the post and we need a function which prevents post data manipulation.
				
				include('#function-ngo-add.php');
				
				#output
				# $function_ngoadd['form']
				
			}
			#input (close)
			
		}
		#function-ngo-add.php (v1.0) (close)
        
        echo '
        <div class="content_div add_new_organization_menu" style="margin:30px auto;width:60%;display:none;">
            '.$function_ngoadd['form'].'
        </div>';
        
    }
    #add new ngo (close)
    
    #all ngos (open)
    if(1==1){
        
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
				// important elements, especially those maked with the comment: ' //Don't touch this. ' ;-)
				
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
						
						$function_table['results'] = $all_ngos_results;
						
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
							
							$function_table['data'][$ajl]['ngo_name'] = $function_table['results'][$ajl]->ngo_name;
							$function_table['data'][$ajl]['ngo_name_sub'] = $function_table['results'][$ajl]->ngo_name_sub;
							$function_table['data'][$ajl]['ngo_logo_name'] = $function_table['results'][$ajl]->ngo_logo_name;
                            
							$function_table['data'][$ajl]['ngo_short_description'] = $function_table['results'][$ajl]->ngo_short_description;
							$function_table['data'][$ajl]['impact_area_name'] = $function_table['results'][$ajl]->impact_area_name;
							$function_table['data'][$ajl]['country_name'] = $function_table['results'][$ajl]->country_name;
                            
							$function_table['data'][$ajl]['ngo_date_founded'] = $function_table['results'][$ajl]->ngo_date_founded;
							$function_table['data'][$ajl]['ngo_date_created'] = $function_table['results'][$ajl]->ngo_date_created;
							$function_table['data'][$ajl]['ngo_id'] = $function_table['results'][$ajl]->ngo_id;
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
					
					$function_table['unique id'] = 'all_members_ngos_fvskdbvhkdfj';
					// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
					
					#Options connected to the title (open)
					if(1==1){
						
						$function_table['display title'] = 'All development organizations supported by Voluno';
						// The title of the table which is displayed above the table. To hide title, leave empty.
						
						#$function_table['show on load'] = 'yes';
						// 'no' or 'yes' (default). If there's no title, this is automatically set to yes, since there is nothing to show.
						
						#$function_table['title format'] = array('<h1>','</h1>');
						// Opening and closing css tags for the title. Default: array('<h4>','</h4>')
						
						#$function_table['display number of results'] = 'no';
						// Displays the full amount of content rows in brackets behind the table title. 'no' or empty (default).
						
					}
					#Options connected to the title (close)
					
					#Headings and sorting (open)
					if(1==1){
						
						#$function_table['hide column headings'] = 'yes';
						// Hides headings of table. 'yes' or empty (default).
						
						// The following multi-dimensional array has the following structure:
						// - heading = The heading that will be displayed above the respective column.
						// - width = Optional. With of the respective column. You can either use % or pt.
						// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
						//                    columns names that you used in the 'Raw data' section.
						//                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were 'email' and 'id'.
						$function_table['column headings'] 
						= array(
							array( // In almost all cases, the first column should be the row numbering. If you want to keep it, just leave it as it is.
								'heading'		 => '#', // See 1 row above.
								'width'			 => '5%' // See 2 rows above.
							),
							array(
								'heading'		 => 'Name',
								'width'			 => '30%',
								'sorting option' => 'ngo_name'
							),
							array(
								'heading'		 => 'Short description',
								'width'			 => '30%',
								'sorting option' => 'ngo_short_description'
							),
							array(
								'heading'		 => 'Impact area',
								'width'			 => '10%',
								'sorting option' => 'impact_area_name'
							),
							array(
								'heading'		 => 'Joined Voluno',
								'width'			 => '10%',
								'sorting option' => 'ngo_date_created'
							)
						);
						
						//Optionally, you can choose one of the above columns to be the default sorting option.
						// If you don't want this, please delete or hide the entire array.
						$function_table['default ordering']
						= array(
							'column' => 'ngo_name', // Colum name. In the example, 'email' or 'id'.
							'direction' => 'ASC' // ASC or DESC
						);
						
					}
					#Headings and sorting (close)
					
					#Pagination (open)
					if(1==1){
						
						// If the table doesn't have a lot of space, you can make the pagination 'thin'. Then, the 'first page', 'previous page', 'items per page',
						// 'next page' and 'last page' buttons will aligned vertically, instead of horizontally -> they will be slimmer.
						#$function_table['thin_pagination'] = 'yes'; // 'yes' or 'no' (default)
					}
					#Pagination (close)
					
					#Display a message if no data available (open)
					if(1==1){
						
						// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
						// Here, you can modify this message.
						
						#$function_table['no_items_available_message'] = array(
						#    'lines' => 'no' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
						#    ,'content' => 'none' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
						#);
						
					}
					#Display a message if no data available (close)
					
				}
				#Table options (close)
				
			}
			#Input: Raw data + Table options (close)
			
			$function_table['part'] = 1; //Don't touch this. 
			include('#function-table.php'); //Don't touch this. 
			
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
					// the amount of column headings you added in 'Table options'.
					// Please be sure not to change anything else.
					
				}
				#documentation (close)
				
				#Cells/Columns (open)
				for($abs=$function_table['pagination_lower_limit'];$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));$abs++){ //Don't touch this.
					$function_table['table rows'] .= $function_table['row open']; //Don't touch this.
					
					//#1 template (open) <- column number, short description of column
					if(1==1){ //Don't touch this.
						
						// Write the content here. To use the table data, use the variable:
						// $function_table['data'][$abs]['column name'] and replace 'column name' with the name of the respective column, as entered in the section 'raw data'.
						// In the given example, the column names were 'email' or 'id'.
						
					}
					//#1 template (close) <- column number (add +1 for each new column you add), short description of column
					
                    #1 counter (open)
                    if(1==1){
                        
                        $function_table['table rows'] .= '
                        <td>
                            '.($abs+1).'
                        </td>
                        ';
                        
                    }
                    #1 counter (close)
                    
                    #2 Img + Name(open)
                    if(1==1){
                        
                        #preparation (open)
                        if(1==1){
                            
                            #function-image-processing.php (v1.0) (open)
                            if(1==1){
                                #ngo logo
                                    $function_propic__type = "ngo logo";
                                    $function_propic__ngo_id = $function_table['data'][$abs]['ngo_id'];
                                #all
                                    $function_propic__geometry = array(150,90); //optional, if e.g. only width: 300, NULL; vice versa
                                include('#function-image-processing.php');
                                
                                if($function_propic__image_available == "yes"){
                                  $ngo_image =
                                  '<img src="'.
                                    $function_propic.
                                  '" style="background-color:#fff;padding:10px;border:1px solid black;">';
                                }else{
                                  unset($ngo_image);
                                }
                                
                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                            }
                            #function-image-processing.php (v1.0) (close)
                            
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
									
									$function_profileLink['id'] = $function_table['data'][$abs]['ngo_id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
                            
                        }
                        #preparation (close)
                        
                        #content (open)
                        if(1==1){
                            
                            $function_table['table rows'] .= '
                            <td>
                                <a
                                    title="'.$function_profileLink['link_title'].'"
                                    href="'.$function_profileLink['link'].'"
                                >
                                    <p style="text-align:center;">
                                        '.$function_profileLink['name'].'
                                    </p>
                                    '.$ngo_image.'
                                </a>
                            </td>
                            ';
                            
                        }
                        #content (close)
                        
                    }
                    #2 Img + Name (close)
                    
                    #3 Short description (open)
                    if(1==1){
                        
                        #preparation (open)
                        if(1==1){
                            
                            #function-only-first-x-symbols.php (v1.0) (open)
                            if(1==1){
                                $function_only_first_x_symbols = $function_table['data'][$abs]['ngo_short_description']; #content
                                $function_only_first_x_symbols_num = 150; #optional, number of symbols, default is 100
                                #$function_only_first_x_symbols__more_button = "no"; //default: yes, empty
                                include('#function-only-first-x-symbols.php');
                                #output: $function_only_first_x_symbols
                            }
                            #function-only-first-x-symbols.php (v1.0) (close)
                            
                        }
                        #preparation (close)
                        
                        #content (open)
                        if(1==1){
                            
                            $function_table['table rows'] .= '
                            <td>
                                <div style="max-height:120px;overflow-y:auto;">
                                    <p>
                                        '.$function_only_first_x_symbols.'
                                    <p>
                                </div>
                            </td>
                            ';
                            
                        }
                        #content (close)
                        
                    }
                    #3 Short description (close)
                    
                    #4 Impact area & main office country (open)
                    if(1==1){
                        
                        #preparation (open)
                        if(1==1){
                            
                            #impact (open)
                            if(!empty($function_table['data'][$abs]['impact_area_name'])){
                                $impact_area = '
                                <b>
                                    '.$function_table['data'][$abs]['impact_area_name'].'
                                </b>';
                            }else{
                                unset($impact_area);
                            }
                            #impact (close)
                            
                            #office (open)
                            if(!empty($function_table['data'][$abs]['country_name'])){
                                $main_office = '
                                (Main office:
                                '.$function_table['data'][$abs]['country_name'].')';
                            }else{
                                unset($main_office);
                            }
                            #office (close)
                            
                            #bridge (open)
                            if(!empty($function_table['data'][$abs]['impact_area_name']) AND !empty($function_table['data'][$abs]['country_name'])){
                                $bridge = '
                                <br>
                                <br>';
                            }else{
                                unset($bridge);
                            }
                            #bridge (close)
                            
                        }
                        #preparation (close)
                        
                        #content (open)
                        if(1==1){
                            
                            $function_table['table rows'] .= '
                            <td>
                                '.$impact_area.
                                $bridge.
                                $main_office.'
                            </td>
                            ';
                            
                        }
                        #content (close)
                        
                    }
                    #4 Impact area & main office country (close)
                    
                    #5 joined Voluno & founded (open)
                    if(1==1){
                        
                        #preparation (open)
                        if(1==1){
                            
                            #joined (open)
                            if($function_table['data'][$abs]['ngo_date_created'] == "0000-00-00 00:00:00"){
                                
                                unset($joined);
                                
                            }else{
                                
                                #function-timezone.php (v1.0) (open)
                                if(1==1){
                                    $function_timezone = $function_table['data'][$abs]['ngo_date_created'];
                                    #$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
                                    #$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
                                    $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
                                    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                    //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
                                    include('#function-timezone.php');
                                    
                                }
                                #function-timezone.php (v1.0) (close)
                                
                                $joined = $function_timezone;
                                
                            }
                            #joined (close)
                            
                            #founded (open)
                            if($function_table['data'][$abs]['ngo_date_founded'] == "0000-00-00 00:00:00"){
                                
                                unset($founded);
                                
                            }else{
                                
                                #function-timezone.php (v1.0) (open)
                                if(1==1){
                                    $function_timezone = $function_table['data'][$abs]['ngo_date_founded'];
                                    #$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
                                    #$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
                                    $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
                                    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                    //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
                                    include('#function-timezone.php');
                                    
                                }
                                #function-timezone.php (v1.0) (close)
                                
                                $founded = '
                                (founded: '.$function_timezone.')';
                                
                            }
                            #founded (close)
                          
                        }
                        #preparation (close)
                        
                        #content (open)
                        if(1==1){
                            
                            $function_table['table rows'] .= '
                            <td>
                                <b>
                                    '.$joined.'
                                </b>
                                '.$bridge.'
                                '.$founded.'
                            </td>';
                            
                        }
                        #content (close)
                        
                    }
                    #5 joined Voluno & founded (close)
					
					$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
				} //Don't touch this. 
				#Cells/Columns (close)
				
			}
			#design (close)
			
			$function_table['part'] = 2; //Don't touch this. 
			include('#function-table.php'); //Don't touch this. 
			
			#output
			//the entire output is stored in the following variable:
			echo $function_table['output table'];
			
		}
		#function-table.php (v1.0) (close)
        
    }
    #all ngos (close)
    
    #all members (open)
    if(1==1){
        
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
				// important elements, especially those maked with the comment: ' //Don't touch this. ' ;-)
				
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
						
						$function_table['results'] = $all_visible_members_results;
						
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
							$function_table['data'][$ajl]['image_name'] = $function_table['results'][$ajl]->usersext_imageName;
							$function_table['data'][$ajl]['user_registered'] = $function_table['results'][$ajl]->usersext_userRegistered;
                            
							$function_table['data'][$ajl]['country_state_city'] = $function_table['results'][$ajl]->usersext_country.'__delimiter__'.
                                                                                  $function_table['results'][$ajl]->usersext_state.'__delimiter__'.
                                                                                  $function_table['results'][$ajl]->usersext_city;
                            
							$function_table['data'][$ajl]['occupation'] = $function_table['results'][$ajl]->usersext_occupation;
							$function_table['data'][$ajl]['birth_date'] = $function_table['results'][$ajl]->usersext_birthDate;
							$function_table['data'][$ajl]['usersext_positions_sorted'] = $function_table['results'][$ajl]->usersext_positions_sorted;
                            
							$function_table['data'][$ajl]['id'] = $function_table['results'][$ajl]->usersext_id;
							$function_table['data'][$ajl]['record_sum_reputation'] = $function_table['results'][$ajl]->record_sum_reputation;
							$function_table['data'][$ajl]['record_sum_experience'] = $function_table['results'][$ajl]->record_sum_experience;
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
					
					$function_table['unique id'] = 'all_members_users_fdgirqbizre';
					// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
					
					#Options connected to the title (open)
					if(1==1){
						
						$function_table['display title'] = 'All Voluno members (who want to be found)';
						// The title of the table which is displayed above the table. To hide title, leave empty.
						
						#$function_table['show on load'] = 'yes';
						// 'no' or 'yes' (default). If there's no title, this is automatically set to yes, since there is nothing to show.
						
						#$function_table['title format'] = array('<h1>','</h1>');
						// Opening and closing css tags for the title. Default: array('<h4>','</h4>')
						
						#$function_table['display number of results'] = 'no';
						// Displays the full amount of content rows in brackets behind the table title. 'no' or empty (default).
						
					}
					#Options connected to the title (close)
					
					#Headings and sorting (open)
					if(1==1){
						
						#$function_table['hide column headings'] = 'yes';
						// Hides headings of table. 'yes' or empty (default).
						
						// The following multi-dimensional array has the following structure:
						// - heading = The heading that will be displayed above the respective column.
						// - width = Optional. With of the respective column. You can either use % or pt.
						// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
						//                    columns names that you used in the 'Raw data' section.
						//                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were 'email' and 'id'.
						$function_table['column headings'] 
						= array(
							array( // In almost all cases, the first column should be the row numbering. If you want to keep it, just leave it as it is.
								'heading'		 => '#', // See 1 row above.
								'width'			 => '5%' // See 2 rows above.
							),
							array(
								'heading'		 => 'User',
								'width'			 => '30%',
								'sorting option' => 'display_name'
							),
							array(
								'heading'		 => 'Position(s)',
								'width'			 => '30%',
								'sorting option' => 'usersext_positions_sorted'
							),
							array(
								'heading'		 => 'Location',
								'width'			 => '10%',
								'sorting option' => 'country_state_city'
							),
							array(
								'heading'		 => 'Member since',
								'width'			 => '15%',
								'sorting option' => 'user_registered'
							)
						);
						
						//Optionally, you can choose one of the above columns to be the default sorting option.
						// If you don't want this, please delete or hide the entire array.
						$function_table['default ordering']
						= array(
							'column' => 'display_name', // Colum name. In the example, 'email' or 'id'.
							'direction' => 'ASC' // ASC or DESC
						);
						
					}
					#Headings and sorting (close)
					
					#Pagination (open)
					if(1==1){
						
						// If the table doesn't have a lot of space, you can make the pagination 'thin'. Then, the 'first page', 'previous page', 'items per page',
						// 'next page' and 'last page' buttons will aligned vertically, instead of horizontally -> they will be slimmer.
						#$function_table['thin_pagination'] = 'yes'; // 'yes' or 'no' (default)
					}
					#Pagination (close)
					
					#Display a message if no data available (open)
					if(1==1){
						
						// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
						// Here, you can modify this message.
						
						#$function_table['no_items_available_message'] = array(
						#    'lines' => 'no' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
						#    ,'content' => 'none' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
						#);
						
					}
					#Display a message if no data available (close)
					
				}
				#Table options (close)
				
			}
			#Input: Raw data + Table options (close)
			
			$function_table['part'] = 1; //Don't touch this. 
			include('#function-table.php'); //Don't touch this. 
			
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
					// the amount of column headings you added in 'Table options'.
					// Please be sure not to change anything else.
					
				}
				#documentation (close)
				
				#Cells/Columns (open)
				for($abs=$function_table['pagination_lower_limit'];$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));$abs++){ //Don't touch this.
					$function_table['table rows'] .= $function_table['row open']; //Don't touch this.
					
					//#1 template (open) <- column number, short description of column
					if(1==1){ //Don't touch this.
						
						// Write the content here. To use the table data, use the variable:
						// $function_table['data'][$abs]['column name'] and replace 'column name' with the name of the respective column, as entered in the section 'raw data'.
						// In the given example, the column names were 'email' or 'id'.
						
					}
					//#1 template (close) <- column number (add +1 for each new column you add), short description of column
					
                    #1 Num (open)
                    if(1==1){
                        
                        $function_table['table rows'] .= '
                        <td>
                            '.($abs+1).'
                        </td>
                        ';
                        
                    }
                    #1 Num (close)
                    
                    #2 Img + Name (open)
                    if(1==1){
                        
                        #function-image-processing
                            #profile picture
                                $function_propic__type = "profile picture";
                                $function_propic__user_id = $function_table['data'][$abs]['id'];
                            #all
                                $function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                        
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
                        
                        $function_table['table rows'] .= '
                        <td>
                          <table>
                            <tr>
                              <td style="width:100px;padding-right:10px;">
                                <a
                                  title="'.$function_profileLink['link_title'].'"
                                  href="'.$function_profileLink['link'].'"
                                >
                                  <img src="'.$function_propic.'" style="border-radius:20px;border:1px solid black;">
                                </a>
                              </td>
                              <td style="vertical-align:middle;text-align:left;">
                                '.$function_profileLink['name_link'].'
                              </td>
                            </tr>
                          </table>
                        </td>
                        ';
                        
                    }
                    #2 Img + Name(close)
                    
                    #3 Position (open)
                    if(1==1){
                        
                        $function_table['table rows'] .= '
                        <td>
                            '.preg_replace('/[0-9]+/', '', $function_table['data'][$abs]['usersext_positions_sorted']).'
                        </td>
                        ';
                        
                    }
                    #3 Position (close)
                    
                    #4 Location (open)
                    if(1==1){
                        
                        $location_array = explode("__delimiter__",$function_table['data'][$abs]['country_state_city']);
                        
                        $country_id = $location_array[0];
                        
                        $country_of_member_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                  FROM fi4l3fg_voluno_lists_countries
                                                                  WHERE list_countries_id = %d'
                                                                  ,$country_id);
                        $country_of_member_row = $GLOBALS['wpdb']->get_row($country_of_member_query);
                        
                        $function_table['table rows'] .= '
                        <td>
                            <span title="Country" style="font-weight:bold;">'.
                                $country_of_member_row->list_countries_name.
                            '</span>';
                            
                            if(!empty($location_array[1])){
                                $function_table['table rows'] .= ',<br>
                                <span title="State">'.$location_array[1].'</span>';
                            }
                            
                            if(!empty($location_array[2])){
                                $function_table['table rows'] .= ',<br>
                                <span title="City">'.$location_array[2].'</span>';
                            }
                            
                        $function_table['table rows'] .= '
                        </td>
                        ';
                        
                    }
                    #4 Location (close)
                    
                    #5 Member since (open)
                    if(1==1){
                        
                        #function-timezone.php
                        $function_timezone = $function_table['data'][$abs]['user_registered'];
                        $function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        
                        $function_table['table rows'] .= '
                        <td>
                          
                          '.$function_timezone.'
                        </td>
                        ';
                        
                    }
                    #5 Member since (close)
					
					$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
				} //Don't touch this. 
				#Cells/Columns (close)
				
			}
			#design (close)
			
			$function_table['part'] = 2; //Don't touch this. 
			include('#function-table.php'); //Don't touch this. 
			
			#output
			//the entire output is stored in the following variable:
			echo $function_table['output table'];
			
		}
		#function-table.php (v1.0) (close)
        
    }
    #all members (close)
    
}
#content (close)

?>
