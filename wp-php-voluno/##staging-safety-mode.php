<?
    
#marketplace item task (close)
if(empty($staging_page_section)){
    
#options for all positions check and insert that into wiki article

#access rights management (arm) (open)
if(1==1){
	
    #general task query (open)
    if(1==1){
	
	#new task (open)
	if($get_id == "new"){
	    
	    #create new task (open)
	    if(1==1){
		
		#my organizations (open)
		if(1==1){
		    $my_organizations_query = $GLOBALS['wpdb']->prepare('SELECT *
							    FROM fi4l3fg_voluno_development_organizations_properties
								LEFT JOIN fi4l3fg_voluno_development_organizations
								ON ngo_prop_ngo_id = ngo_id
							    WHERE ngo_prop_type_general = "position"
								AND ngo_prop_type_specific = "worker"
								AND ngo_prop_type_status = "accepted"
								AND ngo_prop_type_id = %s
							    ORDER BY ngo_name ASC;'
							    ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
		    $my_organizations_results = $GLOBALS['wpdb']->get_results($my_organizations_query);
		    
		    if(count($my_organizations_results)==1){
			$new_task_ngo = $my_organizations_results[0]->ngo_id;
		    }
		}
		#my organizations (close)
		
		#random number (open)
		for($aeb=0;$aeb<6;$aeb++){
		    unset($voluno_random_num[$aeb]);
		    $length = 50;
		    for($i = 0; $i < $length; $i++) {
			$voluno_random_num[$aeb]
			    = $voluno_random_num[$aeb].
			    substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
		    }
		}
		#random number (close)
		
		#database query insert (open)
		if(1==1){
		    $GLOBALS['wpdb']->insert(
				    'fi4l3fg_voluno_items_tasks',
			    array(
				    'task_author_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
				    'task_status' => 'draft',
				    'task_ngo_id' => $new_task_ngo,
				    
				    'task_date_modified' => date("Y-m-d H:i:s"),
				    'task_date_created' => date("Y-m-d H:i:s"),
				    
				    'task_code' => $voluno_random_num[0],
				    'task_code2' => $voluno_random_num[1],
				    'task_code3' => $voluno_random_num[2],
				    
				    'task_code4' => $voluno_random_num[3],
				    'task_code5' => $voluno_random_num[4],
				    'task_code6' => $voluno_random_num[5]
				),
			    array(
				    '%s','%s','%s',
				    '%s','%s',
				    '%s','%s','%s',
				    '%s','%s','%s',
				));
		}
		#database query insert (close)
		
	    }
	    #create new task (close)
	    
	    #redirect to new task (open)
	    if(1==1){
			
            #function-redirect.php (v1.0) (open)
            if(1==1){
                
                #documentation (open)
                if(1==1){
                    
                    // Redirects to another page. Prevents further loading of content.
                    
                }
                #documentation (close)
                
                #input (open)
                if(1==1){
                    
                    $function_redirect['redirect_url'] = get_permalink().'?type=task&edit_task=1&id='.$GLOBALS['wpdb']->insert_id; // url to redirect to. If none is given, homepage is used.
                    
                }
                #input (close)
                
                include('#function-redirect.php');
                
                #no output
                
            }
            #function-redirect.php (v1.0) (close)
			
	    }
	    #redirect to new task(close)
	    
	}
	#new task (close)
	
	$task_query_text
	    = array(
		'SELECT *
		FROM fi4l3fg_voluno_items_tasks
		    LEFT JOIN (
			    SELECT id as author_id
			    FROM fi4l3fg_voluno_users_extended
			) as aaa_author_info
			ON task_author_id = author_id
		    LEFT JOIN fi4l3fg_voluno_development_organizations
			ON task_ngo_id = ngo_id
		WHERE task_id = %s;'
		,$get_id
	    );
	$task_query = $GLOBALS['wpdb']->prepare($task_query_text[0],$task_query_text[1]);
	$task_row = $GLOBALS['wpdb']->get_row($task_query);
	
	#validation: if not existent, redirect (open)
	if(empty($task_row)){
	    
		#function-redirect.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Redirects to another page. Prevents further loading of content.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_redirect['redirect_url'] = get_permalink(688); // url to redirect to. If none is given, homepage is used.
				
			}
			#input (close)
			
			include('#function-redirect.php');
			
			#no output
			
		}
		#function-redirect.php (v1.0) (close)
	    
	}
	#validation: if not existent, redirect (close)
	
    }
    #general task query (close)
    
    $task_status = $task_row->task_status;
    
    #finding out user roles + definition of specific user restrictions (open)
    if(1==1){
	
	#preparation (open)
	if(1==1){
	    
	    #user roles (open)
	    if(1==1){
			
			unset($user_role);
			
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
			
	    }
	    #user roles (close)
	    
	    #user restrictions (open)
	    if(1==1){
		
		unset($access_array,$task_status_array);
		
		#full list (open)
		if(0!=0){
		    
		    $task_status_array =
									    array(
											    "draft",
												"unassigned",
												    "in progress",
													"completed",
													    "cancelled",
														"deleted");
		    $access_array = array(                                                  #1  #2  #3  #4  #5  #6
			
			#not fixed to a specific location in the code
			array("edit_mode",                                                  0,  0,  0,  0,  0,  0),
			    array("edit_mode_select_ngo",                                   0,  0,  0,  0,  0,  0),
			    array("edit_mode_create_mode",                                  0,  0,  0,  0,  0,  0),
			    
			#mostly fixed to a specific location in code, (chronological order)
			array("main_page_section",                                          0,  0,  0,  0,  0,  0),
			array("mysql",                                                      0,  0,  0,  0,  0,  0),
			    array("get_data",                                               0,  0,  0,  0,  0,  0),
				array("assigned_volunteer",                                 0,  0,  0,  0,  0,  0),
			
			array("style",                                                      0,  0,  0,  0,  0,  0),
			
			array("jquery",                                                     0,  0,  0,  0,  0,  0),
			
			array("content",                                                    0,  0,  0,  0,  0,  0),
			    array("breadcrums_img_title_short_description",                 0,  0,  0,  0,  0,  0),
				array("breadcrums_and_img",                                 0,  0,  0,  0,  0,  0),
				    array("img",                                            0,  0,  0,  0,  0,  0),
				    array("breadcrums",                                     0,  0,  0,  0,  0,  0),
				array("title",                                              0,  0,  0,  0,  0,  0),
				array("short_description",                                  0,  0,  0,  0,  0,  0),
			    
			    array("content_divs_table",                                     0,  0,  0,  0,  0,  0),
				array("left_side_content_divs",                             0,  0,  0,  0,  0,  0),
				    array("ratings",                               	    0,  0,  0,  0,  0,  0),
				    array("progress_reports",                               0,  0,  0,  0,  0,  0),
					array("progress_reports_hide_on_load",        	    0,  0,  0,  0,  0,  0),
				    array("applications",                                   0,  0,  0,  0,  0,  0),
					array("accept_and_reject",                          0,  0,  0,  0,  0,  0),
					array("apply",                                      0,  0,  0,  0,  0,  0),
					array("already_applied",                            0,  0,  0,  0,  0,  0),
				    array("long_description",                               0,  0,  0,  0,  0,  0),
					array("long_description_hide_on_load",        	    0,  0,  0,  0,  0,  0),
					array("long_description_general",                   0,  0,  0,  0,  0,  0),
					array("long_description_specific",                  0,  0,  0,  0,  0,  0),
			    
			    #content_divs_table (open)
				array("right_side_content_div",                             0,  0,  0,  0,  0,  0),
				
				    array("options",                                        0,  0,  0,  0,  0,  0),
					array("options_for_volunteers",                     0,  0,  0,  0,  0,  0),
					array("options_for_ngos",                           0,  0,  0,  0,  0,  0),
					
					    #only when creating new tasks
					    array("options_for_ngos_delete_and_go_back",    0,  0,  0,  0,  0,  0),
					    
					    #edit mode
					    array("options_for_ngos_edit_close",    	    0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_edit_save",    	    0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_edit_save_and_close",   0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_edit_save_and_publish", 0,  0,  0,  0,  0,  0),
					    
					    array("options_for_ngos_cancel",                0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_copy",                  0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_complete",              0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_delete",                0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_edit",                  0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_publish",               0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_reassign",              0,  0,  0,  0,  0,  0),
					    array("options_for_ngos_save_as_draft",         0,  0,  0,  0,  0,  0),
					    
				    array("basic_info",                                     0,  0,  0,  0,  0,  0),
					array("assigned_volunteer",                         0,  0,  0,  0,  0,  0),
			    #content_divs_table (close)
			    
			    array("error",                                                  0,  0,  0,  0,  0,  0),
			    array("error_task_deleted",                                     0,  0,  0,  0,  0,  0),
			    
			#other page sections
			array("task_section_2",                                             0,  0,  0,  0,  0,  0)
			    #only unassigned + ngo - author or author's ngo: reject task application mysql load
		    );
		}
		#full list (close)
		
	    }
	    #user restrictions (close)
	    
	}
	#preparation (close)
	
	#ngo member (a,b) (open)
	if(in_array('NGO Member',$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])){
		//check if user is ngo member
	    
	    #preparation (open)
	    if(1==1){ //find out if user is affiliated with this ngo
		$user_part_or_ngo_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_development_organizations_properties
							WHERE ngo_prop_ngo_id = %s
							    AND ngo_prop_type_id = %s
							    AND ngo_prop_type_general = "position"
							    AND ngo_prop_type_specific = "worker";'
							,$task_row->ngo_id
							,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
		$user_part_or_ngo_row = $GLOBALS['wpdb']->get_row($user_part_or_ngo_query);
	    }
	    #preparation (close)
	    
	    #task owner (a1-2) (open)aaaaaaaaaaaa
	    if(empty($user_role)){
		
		#non-edit mode (a1) (open)aaaaaaaaaaa
		if($task_row->task_author_id == $GLOBALS['voluno_variables']['current_user_extended']->usersext_id AND $_GET['edit_task'] != "1"){
		    
		    $user_role = 'ngo worker - task owner - non-edit mode';
		    
		    $task_status_array =
									    array(
											    "draft",
												"unassigned",
												    "in progress",
													"completed",
													    "cancelled",
														"deleted");
		    $access_array = array(                                                  #1  #2  #3  #4  #5  #6
					  
			#not fixed to a specific location in the code
			
			#mostly fixed to a specific location in code, (chronological order)
			array("main_page_section",                                          1,  1,  1,  1,  1,  1   ),
			array("mysql",                                                      1,  1,  1,  1,  1,  0   ),
			    array("get_data",                                               1,  1,  1,  1,  1,  0   ),
				array("assigned_volunteer",                                 0,  0,  1,  1,  1,  0   ),
			
			array("style",                                                      1,  1,  1,  1,  1,  1   ),
			
			array("jquery",                                                     1,  1,  1,  1,  1,  0   ),
			
			array("content",                                                    1,  1,  1,  1,  1,  1   ),
			    array("breadcrums_img_title_short_description",                 1,  1,  1,  1,  1,  1   ),
				array("breadcrums_and_img",                                 1,  1,  1,  1,  1,  1   ),
				    array("img",                                            1,  1,  1,  1,  1,  1   ),
				    array("breadcrums",                                     1,  1,  1,  1,  1,  1   ),
				array("title",                                              1,  1,  1,  1,  1,  0   ),
				array("short_description",                                  1,  1,  1,  1,  1,  0   ),
			    
			    array("content_divs_table",                                     1,  1,  1,  1,  1,  0   ),
				array("left_side_content_divs",                             1,  1,  1,  1,  1,  0   ),
				    array("ratings",                               	    0,  0,  0,  1,  1,  1   ),
				    array("progress_reports",                               0,  0,  1,  1,  1,  0   ),
					array("progress_reports_hide_on_load",        	    0,  0,  0,  1,  0,  1   ),
				    array("applications",                                   0,  1,  0,  0,  0,  0   ),
					array("accept_and_reject",                          0,  1,  0,  0,  0,  0   ),
				    array("long_description",                               1,  1,  1,  1,  1,  0   ),
					array("long_description_hide_on_load",        	    0,  0,  1,  1,  0,  0   ),
					array("long_description_general",                   1,  1,  1,  1,  1,  0   ),
					array("long_description_specific",                  1,  1,  1,  1,  1,  0   ),
			    
			    #content_divs_table
				array("right_side_content_div",                             1,  1,  1,  1,  1,  0   ),
				
				    array("options",                                        1,  1,  1,  1,  1,  0   ),
					array("options_for_ngos",                           1,  1,  1,  1,  1,  0   ),
					
					    array("options_for_ngos_cancel",                1,  1,  0,  0,  0,  0   ),
					    array("options_for_ngos_copy",                  1,  1,  1,  1,  1,  0   ),
					    array("options_for_ngos_complete",              0,  0,  1,  0,  0,  0   ),
					    array("options_for_ngos_delete",                0,  0,  0,  0,  1,  0   ),
					    array("options_for_ngos_edit",                  1,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_publish",               1,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_reassign",              0,  0,  1,  0,  0,  0   ),
					    array("options_for_ngos_save_as_draft",         0,  0,  0,  0,  0,  0   ),
					    
				    array("basic_info",                                     1,  1,  1,  1,  1,  0   ),
					array("assigned_volunteer",                         0,  0,  1,  1,  1,  0   ),
			);
		    
		}
		#non-edit mode (a1) (close)
		
		#edit mode (a2) (open)
		elseif($task_row->task_author_id == $GLOBALS['voluno_variables']['current_user_extended']->usersext_id AND $_GET['edit_task'] == "1"
		       AND $task_status == "draft"){
		    
		    $user_role = 'ngo worker - task owner - edit mode';
		    
		    $task_status_array =
									    array(
											    "draft");
		    $access_array = array(                                                  #1
			
			#not fixed to a specific location in the code
			array("edit_mode",                                                  1),
			    array("edit_mode_select_ngo",                                   1),
			    array("edit_mode_create_mode",                                  0),
			    
			#mostly fixed to a specific location in code, (chronological order)
			array("main_page_section",                                          1),
			array("mysql",                                                      1),
			    array("get_data",                                               1),
				array("assigned_volunteer",                                 0),
			
			array("style",                                                      1),
			
			array("jquery",                                                     1),
			
			array("content",                                                    1),
			    array("breadcrums_img_title_short_description",                 1),
				array("breadcrums_and_img",                                 1),
				    array("img",                                            1),
				    array("breadcrums",                                     1),
				array("title",                                              1),
				array("short_description",                                  1),
			    
			    array("content_divs_table",                                     1),
				array("left_side_content_divs",                             1),
				    array("progress_reports",                               0),
				    array("applications",                                   0),
					array("accept_and_reject",                          0),
				    array("long_description",                               1),
					array("long_description_general",                   1),
					array("long_description_specific",                  1),
			    
			    #content_divs_table
				array("right_side_content_div",                             1),
				
				    array("options",                                        1),
					array("options_for_volunteers",                     0),
					array("options_for_ngos",                           1),
					    
					    #edit mode
					    array("options_for_ngos_edit_close",    	    1),
					    array("options_for_ngos_edit_save",		    1),
					    array("options_for_ngos_edit_save_and_close",   1),
					    array("options_for_ngos_edit_save_and_publish", 1),
					    
				    array("basic_info",                                     1),
					array("assigned_volunteer",                         0),
			    #content_divs_table
			    
			    array("error",                                                  0),
			    array("error_task_deleted",                                     0),
			
			);
		    
		}
		#edit mode (a2) (close)
		
	    }
	    #task owner (a1-2) (close)
	    
	    #co-worker (b) (open)
	    if(empty($user_role)){
		
		#check (open)
		if(!empty($user_part_or_ngo_row)){
		    
		    $user_role = 'ngo worker - co-worker';
		    
		    $task_status_array =
									    array(
											    "draft",
												"unassigned",
												    "in progress",
													"completed",
													    "cancelled",
														"deleted");
		    $access_array = array(                                                  #1  #2  #3  #4  #5  #6
					  
			#not fixed to a specific location in the code
			
			#mostly fixed to a specific location in code, (chronological order)
			array("main_page_section",                                          1,  1,  1,  1,  1,  1   ),
			array("mysql",                                                      1,  1,  1,  1,  1,  0   ),
			    array("get_data",                                               1,  1,  1,  1,  1,  0   ),
				array("assigned_volunteer",                                 0,  0,  1,  1,  1,  0   ),
			
			array("style",                                                      1,  1,  1,  1,  1,  1   ),
			
			array("jquery",                                                     1,  1,  1,  1,  1,  0   ),
			
			array("content",                                                    1,  1,  1,  1,  1,  1   ),
			    array("breadcrums_img_title_short_description",                 1,  1,  1,  1,  1,  1   ),
				array("breadcrums_and_img",                                 1,  1,  1,  1,  1,  1   ),
				    array("img",                                            1,  1,  1,  1,  1,  1   ),
				    array("breadcrums",                                     1,  1,  1,  1,  1,  1   ),
				array("title",                                              1,  1,  1,  1,  1,  0   ),
				array("short_description",                                  1,  1,  1,  1,  1,  0   ),
			    
			    array("content_divs_table",                                     1,  1,  1,  1,  1,  0   ),
				array("left_side_content_divs",                             1,  1,  1,  1,  1,  0   ),
				    array("ratings",                               	    0,  0,  0,  1,  1,  1   ),
				    array("progress_reports",                               0,  0,  1,  1,  1,  0   ),
					array("progress_reports_hide_on_load",        	    0,  0,  0,  1,  0,  1   ),
				    array("applications",                                   0,  1,  0,  0,  0,  0   ),
					array("accept_and_reject",                          0,  1,  0,  0,  0,  0   ),
				    array("long_description",                               1,  1,  1,  1,  1,  0   ),
					array("long_description_hide_on_load",        	    0,  0,  1,  1,  0,  0   ),
					array("long_description_general",                   1,  1,  1,  1,  1,  0   ),
					array("long_description_specific",                  1,  1,  1,  1,  1,  0   ),
			    
			    #content_divs_table
				array("right_side_content_div",                             1,  1,  1,  1,  1,  0   ),
				
				    array("options",                                        1,  1,  1,  1,  1,  0   ),
					array("options_for_ngos",                           1,  1,  1,  1,  1,  0   ),
					
					    array("options_for_ngos_cancel",                0,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_copy",                  1,  1,  1,  1,  1,  0   ),
					    array("options_for_ngos_complete",              0,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_delete",                0,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_edit",                  0,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_publish",               0,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_reassign",              0,  0,  0,  0,  0,  0   ),
					    array("options_for_ngos_save_as_draft",         0,  0,  0,  0,  0,  0   ),
					    
				    array("basic_info",                                     1,  1,  1,  1,  1,  0   ),
					array("assigned_volunteer",                         0,  0,  1,  1,  1,  0   ),
			);
		    
		}
		#check (close)
		
	    }
	    #co-worker (b) (close)
	    
	    #dome (open)
	    if(1==2){
	    /* #dome
	    #ngo - author - create new task (ngo_select + edit + 1) (open) #dome
	    if(($task_row->task_id == 1 OR $get_id_old == 1) AND $task_status == "draft"){
		
		$user_role = "ngo - author - create new task";
		
	    }
	    #ngo - author - create new task (ngo_select + edit + 1) (close)
	    
	    */
	    }
	    #dome (close)
	    
	}
	#ngo member (a,b) (close)
	
	#volunteer (c-f) (open)
	if(empty($user_role) AND in_array('Volunteer',$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])){
		//check if user is volunteer
	    
	    #preparation (open)
	    if(1==1){
		$volunter_application_check_query = $GLOBALS['wpdb']->prepare('SELECT *
								    FROM fi4l3fg_voluno_applications
								    WHERE application_type_general = "task"
									AND application_type_specific = "task_application"
									AND application_type_id = %s
									AND application_user_id = %s
									AND application_status IN
									("pending","accepted","rejected","dismissed","resigned");'
								    //note: may not include 'withdrawn', since, appart from the possibility
								    //of having several applications with withdrawn, the user role definition
								    //->#no relationship (f1)<- assumes that empty results for this query
								    //is equivalent to "withdrawn" or not having applied. (§§ahm)
								    ,$get_id
								    ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
		$volunter_application_check_row = $GLOBALS['wpdb']->get_row($volunter_application_check_query);
	    }
	    #preparation (close)
	    
	    
	    #before application (c) (open)
	    if(empty($user_role)){
		
		#check (open)
		if($task_status == "unassigned" AND empty($volunter_application_check_row)){
		    
		    $user_role = 'volunteer - before application';
		    
		    $task_status_array =
									    array(
											    "draft",
												"unassigned",
												    "in progress",
													"completed",
													    "cancelled",
														"deleted");
		    $access_array = array(                                                  #1  #2  #3  #4  #5  #6
			
			#not fixed to a specific location in the code
			array("edit_mode",                                                  0,  0,  0,  0,  0,  0),
			    array("edit_mode_select_ngo",                                   0,  0,  0,  0,  0,  0),
			    array("edit_mode_create_mode",                                  0,  0,  0,  0,  0,  0),
			    
			#mostly fixed to a specific location in code, (chronological order)
			array("main_page_section",                                          1,  1,  1,  1,  1,  1),
			array("mysql",                                                      0,  1,  0,  0,  0,  0),
			    array("get_data",                                               0,  1,  0,  0,  0,  0),
				array("assigned_volunteer",                                 0,  0,  0,  0,  0,  0),
			
			array("style",                                                      0,  1,  0,  0,  0,  0),
			
			array("jquery",                                                     0,  1,  0,  0,  0,  0),
			
			array("content",                                                    0,  1,  0,  0,  0,  0),
			    array("breadcrums_img_title_short_description",                 0,  1,  0,  0,  0,  0),
				array("breadcrums_and_img",                                 0,  1,  0,  0,  0,  0),
				    array("img",                                            0,  1,  0,  0,  0,  0),
				    array("breadcrums",                                     0,  1,  0,  0,  0,  0),
				array("title",                                              0,  1,  0,  0,  0,  0),
				array("short_description",                                  0,  1,  0,  0,  0,  0),
			    
			    array("content_divs_table",                                     0,  1,  0,  0,  0,  0),
				array("left_side_content_divs",                             0,  1,  0,  0,  0,  0),
				    array("progress_reports",                               0,  0,  0,  0,  0,  0),
				    array("applications",                                   0,  1,  0,  0,  0,  0),
					array("accept_and_reject",                          0,  0,  0,  0,  0,  0),
					array("apply",                                      0,  1,  0,  0,  0,  0),
				    array("long_description",                               0,  1,  0,  0,  0,  0),
					array("long_description_general",                   0,  1,  0,  0,  0,  0),
					array("long_description_specific",                  0,  0,  0,  0,  0,  0),
			    
			    #content_divs_table (open)
				array("right_side_content_div",                             0,  1,  0,  0,  0,  0),
				    
				    array("basic_info",                                     0,  1,  0,  0,  0,  0),
					array("assigned_volunteer",                         0,  0,  0,  0,  0,  0),
			    #content_divs_table (close)
			    
			    array("error",                                                  0,  0,  0,  0,  0,  0),
			    array("error_task_deleted",                                     0,  0,  0,  0,  0,  0),
			    
			#other page sections
			array("task_section_2",                                             0,  0,  0,  0,  0,  0)
			    #only unassigned + ngo - author or author's ngo: reject task application mysql load
		    );
		    
		}
		#check (close)
		
	    }
	    #before application (c) (close)
	    
	    #during application (d) (open)
	    if(empty($user_role)){
		
		#check (open)
		if($task_status == "unassigned" AND $volunter_application_check_row->application_status == "pending"){
		    
		    $user_role = 'volunteer - during application';
		    
		    $task_status_array =
									    array(
											    "draft",
												"unassigned",
												    "in progress",
													"completed",
													    "cancelled",
														"deleted");
		    $access_array = array(                                                  #1  #2  #3  #4  #5  #6
			
			#not fixed to a specific location in the code
			array("edit_mode",                                                  0,  0,  0,  0,  0,  0),
			    array("edit_mode_select_ngo",                                   0,  0,  0,  0,  0,  0),
			    array("edit_mode_create_mode",                                  0,  0,  0,  0,  0,  0),
			    
			#mostly fixed to a specific location in code, (chronological order)
			array("main_page_section",                                          1,  1,  1,  1,  1,  1),
			array("mysql",                                                      0,  1,  0,  0,  0,  0),
			    array("get_data",                                               0,  1,  0,  0,  0,  0),
				array("assigned_volunteer",                                 0,  0,  0,  0,  0,  0),
			
			array("style",                                                      0,  1,  0,  0,  0,  0),
			
			array("jquery",                                                     0,  1,  0,  0,  0,  0),
			
			array("content",                                                    0,  1,  0,  0,  0,  0),
			    array("breadcrums_img_title_short_description",                 0,  1,  0,  0,  0,  0),
				array("breadcrums_and_img",                                 0,  1,  0,  0,  0,  0),
				    array("img",                                            0,  1,  0,  0,  0,  0),
				    array("breadcrums",                                     0,  1,  0,  0,  0,  0),
				array("title",                                              0,  1,  0,  0,  0,  0),
				array("short_description",                                  0,  1,  0,  0,  0,  0),
			    
			    array("content_divs_table",                                     0,  1,  0,  0,  0,  0),
				array("left_side_content_divs",                             0,  1,  0,  0,  0,  0),
				    array("progress_reports",                               0,  0,  0,  0,  0,  0),
				    array("applications",                                   0,  1,  0,  0,  0,  0),
					array("accept_and_reject",                          0,  0,  0,  0,  0,  0),
					array("apply",                                      0,  0,  0,  0,  0,  0),
					array("already_applied",                            0,  1,  0,  0,  0,  0),
				    array("long_description",                               0,  1,  0,  0,  0,  0),
					array("long_description_general",                   0,  1,  0,  0,  0,  0),
					array("long_description_specific",                  0,  0,  0,  0,  0,  0),
			    
			    #content_divs_table (open)
				array("right_side_content_div",                             0,  1,  0,  0,  0,  0),
				    
				    array("basic_info",                                     0,  1,  0,  0,  0,  0),
					array("assigned_volunteer",                         0,  0,  0,  0,  0,  0),
			    #content_divs_table (close)
			    
			    array("error",                                                  0,  0,  0,  0,  0,  0),
			    array("error_task_deleted",                                     0,  0,  0,  0,  0,  0),
			    
			#other page sections
			array("task_section_2",                                             0,  0,  0,  0,  0,  0)
			    #only unassigned + ngo - author or author's ngo: reject task application mysql load
		    );
		    
		}
		#check (close)
		
	    }
	    #during application (d) (close)
	    
	    #after accepted application (e) (open)
	    if(empty($user_role)){
		
		#check (open)
		if($volunter_application_check_row->application_status == "accepted"){
		    
		    $user_role = 'volunteer - accepted application';
		    
		    $task_status_array =
									    array(
											    "draft",
												"unassigned",
												    "in progress",
													"completed",
													    "cancelled",
														"deleted");
		    $access_array = array(                                                  #1  #2  #3  #4  #5  #6
			
			#not fixed to a specific location in the code
			array("edit_mode",                                                  0,  0,  0,  0,  0,  0),
			    array("edit_mode_select_ngo",                                   0,  0,  0,  0,  0,  0),
			    array("edit_mode_create_mode",                                  0,  0,  0,  0,  0,  0),
			    
			#mostly fixed to a specific location in code, (chronological order)
			array("main_page_section",                                          1,  1,  1,  1,  1,  1),
			array("mysql",                                                      0,  1,  1,  1,  0,  0),
			    array("get_data",                                               0,  1,  1,  1,  0,  0),
				array("assigned_volunteer",                                 0,  0,  1,  1,  0,  0),
			
			array("style",                                                      0,  1,  1,  1,  0,  0),
			
			array("jquery",                                                     0,  1,  1,  1,  0,  0),
			
			array("content",                                                    0,  1,  1,  1,  0,  0),
			    array("breadcrums_img_title_short_description",                 0,  1,  1,  1,  0,  0),
				array("breadcrums_and_img",                                 0,  1,  1,  1,  0,  0),
				    array("img",                                            0,  1,  1,  1,  0,  0),
				    array("breadcrums",                                     0,  1,  1,  1,  0,  0),
				array("title",                                              0,  1,  1,  1,  0,  0),
				array("short_description",                                  0,  1,  1,  1,  0,  0),
			    
			    array("content_divs_table",                                     0,  1,  1,  1,  0,  0),
				array("left_side_content_divs",                             0,  1,  1,  1,  0,  0),
				    array("ratings",                               	    	0,  0,  0,  1,  1,  1),
				    array("progress_reports",                               0,  0,  1,  1,  0,  0),
				    array("applications",                                   0,  1,  0,  0,  0,  0),
					array("accept_and_reject",                          0,  0,  0,  0,  0,  0),
					array("apply",                                      0,  0,  0,  0,  0,  0),
					array("already_applied",                            0,  1,  0,  0,  0,  0),
				    array("long_description",                               0,  1,  1,  1,  0,  0),
					array("long_description_general",                   0,  1,  1,  1,  0,  0),
					array("long_description_specific",                  0,  0,  1,  1,  0,  0),
			    
			    #content_divs_table (open)
				array("right_side_content_div",                             0,  1,  1,  1,  0,  0),
				    
				    array("basic_info",                                     0,  1,  1,  1,  0,  0),
					array("assigned_volunteer",                         0,  0,  1,  1,  0,  0),
			    #content_divs_table (close)
			    
			    array("error",                                                  0,  0,  0,  0,  0,  0),
			    array("error_task_deleted",                                     0,  0,  0,  0,  0,  0),
			    
			#other page sections
			array("task_section_2",                                             0,  0,  0,  0,  0,  0)
			    #only unassigned + ngo - author or author's ngo: reject task application mysql load
		    );
		    
		}
		#check (close)
		
	    }
	    #after accepted application (e) (close)
	    
	    #no access with small notice why (f) (open)bbbbbbbbbbbbbb#dome
	    if(empty($user_role)){
		
		#no relationship (f1) (open)bbbbbbbbbbbbbbbbbbbbb#dome
		if($task_status != "unassigned" AND empty($volunter_application_check_row->application_status)){
		    //if it was withdrawn, it wouldn't be included in query (§§ahm)
		    
		    $user_role = 'volunteer - no access - not applied or withdrawn and task no longer unassigned';
		    
		}
		#no relationship (f1) (close)
		
		#rejected (f2) (open)bbbbbbbbbbbb#dome
		elseif($volunter_application_check_row->application_status == "rejected"){
		    
		    $user_role = 'volunteer - no access - rejected';
		    
		}
		#rejected (f2) (close)
		
		#resigned (f3) (open)volunteer - rejected
		elseif($volunter_application_check_row->application_status == "resigned"){
		    
		    $user_role = 'volunteer - no access - resigned';
		    
		}
		#resigned (f3) (close)
		
	    }
	    #no access with small notice why (f) (close)
	    
	}
	#volunteer (c-f) (close)
	
	#no access (z) (open)bbbbbbbbbbbbbbbbbbb#dome
	if(empty($user_role)){ //all other cases
	    
	    $user_role = 'no access, no explanation';
	    
	}
	#no access (z) (close)
	
	#mysql (open)
	if(1==1){ //here, the user role must already be defined. this serves as a validation, to ensure user may execute mysql
	    
	    #ngo worker - task owner - non-edit mode: reject task application mysql load (open)
	    if($user_role == 'ngo worker - task owner - non-edit mode' AND !empty($_GET['reject_application_code'])){
		
		unset($task_status_array,$access_array);
		
		$task_status_array =
									array(
										"draft",
										    "unassigned",
											"in progress",
											    "completed",
												"cancelled",
												    "deleted");
		$access_array = array(                                          #1  #2  #3  #4  #5  #6
		    
		    array("task_section_2",                                     0,  1,  0,  0,  0,  0)
		    
		    );
		
	    }
	    #ngo worker - task owner - non-edit mode: reject task application mysql load (close)
	    
	}
	#mysql (close)
	
    }
    #finding out user roles + definition of specific user restrictions (close)
    
    #execution of specific user restrictions (open)
    if(1==1){
	
	$task_status_number = array_search($task_status,$task_status_array) + 1;
	
	unset($arm);
	
	#loop (open)
	for($eleven=0;$eleven<count($access_array);$eleven++){
	    
	    if($access_array[$eleven][$task_status_number] == 1){
		$arm[$access_array[$eleven][0]] = "yes";
	    }else{
		$arm[$access_array[$eleven][0]] = "no";
	    }
	    
	    #echo 'value: '.$arm[$access_array[$eleven][0]].' - name:'.$access_array[$eleven][0].'<br>';
	    
	}
	#loop (close)
	
    }
    #execution of specific user restrictions (close)
    
}
#access rights management (arm) (close)

#main section (open)
if($arm['main_page_section']){
    
    #mysql (open)
    if($arm['mysql'] == "yes"){
	
	#fixed variable definitions (open)
	if(1==1){
	    
	    $task_reports_per_page = 5;
	    $get_id_old = $get_id;
	    $max_task_size = pow(1024,2) * 50;
	    $max_of_allowed_task_category_selection = 3;
	    
	    #upload directory folders
		$uploads_directory_array = wp_upload_dir();
		$uploads_directory_abs = $uploads_directory_array['path'];
		$uploads_directory_web = $uploads_directory_array['url'];
	    
	    #id of new task (open) #dome
	    if($arm['edit_mode_create_mode'] == "yes"){
		$max_task_id_query = $GLOBALS['wpdb']->prepare('SELECT task_id
						    FROM fi4l3fg_voluno_items_tasks
						    ORDER BY task_id DESC
						    LIMIT 1');
		$max_task_id_row = $GLOBALS['wpdb']->get_row($max_task_id_query);
		
		$get_id = $max_task_id_row->task_id + 1;
	    }
	    #id of new task (close)
	    
	    #unfull final path
		$unfull_final_path_abs =
		    $uploads_directory_abs.
		    '/items/tasks/'.
		    $get_id;
	    
	}
	#fixed variable definitions (close)
	
	#get (open)
	if($arm['get_data'] == "yes"){
	    
	    #general task query (open)
	    if(1==1){
		#see arm
	    }
	    #general task query (close)
	    
	    #long explanation (open)
	    if(1==1){
		
		#not yet accepted volunteers [->preparation content] (open)
		if(1==1){ //load this in any case
		    
		    $files_general_description_query = $GLOBALS['wpdb']->prepare('SELECT *
								    FROM fi4l3fg_voluno_files
								    WHERE vol_file_type_general = "task"
									AND vol_file_type_specific = "general description"
									AND vol_file_type_id = %s;'
								    ,$task_row->task_id);
		    $files_general_description_results = $GLOBALS['wpdb']->get_results($files_general_description_query);
		    
		}
		#not yet accepted volunteers [->preparation content] (close)
		
		#accepted volunteers [->preparation content] (open)
		if(1==1){ //load this only if accepted
		    
		    $files_specific_description_query = $GLOBALS['wpdb']->prepare('SELECT *
								    FROM fi4l3fg_voluno_files
								    WHERE vol_file_type_general = "task"
									AND vol_file_type_specific = "specific description"
									AND vol_file_type_id = %s;'
								    ,$task_row->task_id);
		    $files_specific_description_results = $GLOBALS['wpdb']->get_results($files_specific_description_query);
		    
		}
		#accepted volunteers [->preparation content] (close)
		
	    }
	    #long explanation (close)
	    
	    #basic information (open)
	    if(1==1){
		
		#task types (open)
		if(1==1){
		    
		    $task_types_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_items_tasks_properties
							    LEFT JOIN fi4l3fg_voluno_lists_task_types
							    ON taskprop_type_id = task_type_id
							WHERE taskprop_type = %s
							AND taskprop_task_id = %s
							ORDER BY task_type_name ASC;',
							"type",
							$task_row->task_id);
		    $task_types_results = $GLOBALS['wpdb']->get_results($task_types_query);
		    
		}
		#task types (close)
		
		#total task size (open)
		if(1==1){
		    
		    $task_files_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_files
							WHERE vol_file_type_general = "task"
							    AND vol_file_type_id = %s;'
							,$get_id);
		    $task_files_results = $GLOBALS['wpdb']->get_results($task_files_query);
		    
		    unset($summed_size_of_all_task_files);
		    
		    #loop (open)
		    for($four=0;$four<count($task_files_results);$four++){
			$filesize_calculation = filesize($unfull_final_path_abs.'/'.$task_files_results[$four]->vol_file_name);
			$summed_size_of_all_task_files = $summed_size_of_all_task_files+$filesize_calculation;
		    }
		    #loop (close)
		    
		    $percent_of_task_space_used = $summed_size_of_all_task_files / $max_task_size * 100;
		    
		}
		#total task size (close)
		
		#edit (open)
		if($arm['edit_mode'] == "yes"){
		    
		    #my organizations (open)
		    if(1==1){
			$my_organizations_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_development_organizations_properties
								    LEFT JOIN fi4l3fg_voluno_development_organizations
									ON ngo_prop_ngo_id = ngo_id
								    LEFT JOIN (
										SELECT *
										FROM fi4l3fg_voluno_items_tasks
										WHERE task_id = %s
									    ) AS aaa_selected
									ON ngo_id = task_ngo_id
								WHERE ngo_prop_type_general = "position"
								    AND ngo_prop_type_specific = "worker"
								    AND ngo_prop_type_status = "accepted"
								    AND ngo_prop_type_id = %s
								ORDER BY ngo_name ASC;'
								,$get_id
								,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
			$my_organizations_results = $GLOBALS['wpdb']->get_results($my_organizations_query);
		    }
		    #my organizations (close)
		    
		}
		#edit (close)
		
	    }
	    #basic information (close)
	    
	    #applications [->mysql] [content] (open)
	    if($arm['accept_and_reject'] == "yes"){ //already covered in content
		$applications_query = $GLOBALS['wpdb']->prepare('SELECT *
						    FROM fi4l3fg_voluno_applications
							LEFT JOIN (
								    SELECT *
								    FROM fi4l3fg_voluno_users_extended
								    LEFT JOIN fi4l3fg_voluno_lists_countries
									ON usersext_country = list_countries_id
								    ) aaa_applicant_name_country
							    ON application_user_id = usersext_id
						    WHERE application_type_specific = "task_application"
							AND application_type_general = "task"
							AND application_type_id = %s
							AND application_status = "pending";'
						    ,$task_row->task_id);
		$applications_results = $GLOBALS['wpdb']->get_results($applications_query);
	    }
	    #applications [->mysql] [content] (close)
	    
	    #assigned volunteer (open)
	    if($arm['assigned_volunteer'] == "yes"){ //already covered in content
		
	       $assigned_volunteer_query_text = 'SELECT *
						    FROM fi4l3fg_voluno_applications
							LEFT JOIN (
								    SELECT *
								    FROM fi4l3fg_voluno_users_extended
								    LEFT JOIN fi4l3fg_voluno_lists_countries
									ON usersext_country = list_countries_id
								    ) aaa_applicant_name_country
							    ON application_user_id = usersext_id
						    WHERE application_type_specific = "task_application"
							AND application_type_general = "task"
							AND application_type_id = %s
							AND application_status = "accepted";'; 
		
		$assigned_volunteer_query = $GLOBALS['wpdb']->prepare($assigned_volunteer_query_text,$task_row->task_id);
		$assigned_volunteer_row = $GLOBALS['wpdb']->get_row($assigned_volunteer_query);
		
	    }
	    #assigned volunteer (close)
	    
	    #progress reports [->mysql] [content] (open)
	    if(1==1){
		$progress_reports_query = $GLOBALS['wpdb']->prepare('SELECT *
							 FROM fi4l3fg_voluno_items_tasks_reports
							    LEFT JOIN fi4l3fg_voluno_users_extended
							    ON work_tasks_rep_author = usersext_id
							 WHERE work_tasks_rep_task_id = %s
							 ORDER BY work_tasks_rep_date_created DESC;'
							 ,$get_id);
		$progress_reports_results = $GLOBALS['wpdb']->get_results($progress_reports_query);
		
		#loop (open)
		for($four=0;$four<count($progress_reports_results);$four++){
		    
		    #progress report files (open)
		    if(1==1){
			
			$progress_reports_files_query = $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_files
									WHERE vol_file_type_general = "task"
									    AND vol_file_type_specific = "progress report"
									    AND vol_file_type_id = %s
									    AND vol_file_type_specific_id = %s;'
									,$task_row->task_id
									,$progress_reports_results[$four]->work_tasks_rep_id);
			$progress_reports_files_results = $GLOBALS['wpdb']->get_results($progress_reports_files_query);
			
			#function-file-icons.php (open)
			if(1==1){
			    $function_file_icons = $progress_reports_files_results; //array of fi4l3fg_voluno_files rows
			    include("#function-file-icons.php");
			    #output: $function_file_icons;
			    $file_icons_array[$four] = $function_file_icons;
			}
			#function-file-icons.php (close)
			
		    }
		    #progress report files (close)
		    
		}
		#loop (close)
		
	    }
	    #progress reports [->mysql] [content] (close)
	    
	}
	#get (close)
	
	#update (open)
	if(!empty($_POST)){ //use post data update only!! §§aho
	    
	    #check if task dates are still valid (open)
	    if(1==2){ #dome while it's a good idea to check this, i have no idea what i did here. if, at all, it should be role dependent!
		//this is probably why some deadlines are just set to zeros
		
		
		
		#completion deadline (open) 
		if(time() > strtotime($task_row->task_deadline) AND $task_row->task_deadline != "0000-00-00 00:00:00"){
		    
		    $GLOBALS['wpdb']->update( 
				    'fi4l3fg_voluno_items_tasks',
			    array( //updated content
				    'task_ready_for_publication' => "",
				    'task_deadline' => "0000-00-00 00:00:00"
			    ),
			    array( //location of updated content
				    'task_id' => $get_id
			    ),
			    array( //format of updated content
				    '%s','%s'
			    ),
			    array( //format of location of updated content
				    '%s'
				));
		    
		}
		#completion deadline (close)
		
		#assignment deadline (open)
		if(time() > strtotime($task_row->task_assignment_deadline) AND $task_row->task_deadline != "0000-00-00 00:00:00"){
		    
		    $GLOBALS['wpdb']->update( 
				    'fi4l3fg_voluno_items_tasks',
			    array( //updated content
				    'task_ready_for_publication' => "",
				    'task_assignment_deadline' => "0000-00-00 00:00:00"
			    ),
			    array( //location of updated content
				    'task_id' => $get_id
			    ),
			    array( //format of updated content
				    '%s','%s'
			    ),
			    array( //format of location of updated content
				    '%s'
				));
		    
		}
		#assignment deadline (close)
		
	    }
	    #check if task dates are still valid (close)
	    
	    #task report (open)
	    if($_POST['task_report_form_submitted'] == "yes"){
		
		#insert report (open)
		if(1==1){
		    
		    #function-sanitize-text.php (v1.0) (open)
		    if(1==1){
			
			$function_sanitize_text__type = 'plain text with line breaks (biography)'; //obligatory
			/*
			    one line unformatted text (city, name, occupation, etc.)
			    url readable text (url, user_nicename, etc.) (sanitize_title)
			    email address
			    plain text with line breaks (biography)
			    code (php files)
			*/
			$function_sanitize_text__text = $_POST['task_report_text'];
			#$function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
			include('#function-sanitize-text.php');
			$task_report_text = $function_sanitize_text__text_sanitized;
			
		    }
		    #function-sanitize-text.php (v1.0) (close)
		    
		    $GLOBALS['wpdb']->insert(
				    'fi4l3fg_voluno_items_tasks_reports',
			    array(
				    'work_tasks_rep_task_id'      => $get_id,
				    'work_tasks_rep_text'         => $task_report_text,
				    'work_tasks_rep_author'       => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
				    'work_tasks_rep_date_created' => date("Y-m-d H:i:s")
				),
			    array(
				    '%s',
				    '%s',
				    '%s',
				    '%s'
				));
		    $task_report_id = $GLOBALS['wpdb']->insert_id;
		}
		#insert report (close)
		
		#insert files (open)
		for($ten=0;$ten<count(array_filter($_FILES['task_report_file']['tmp_name']));$ten++){
		    
		    #upload files (open)
		    if(1==1){
			
			#upload image to general uploads directory (open)
			if(1==1){
			    unset($uploadedfile);
			    $uploadedfile['name']        =   $_FILES['task_report_file']['name'][$ten];
			    $uploadedfile['type']        =   $_FILES['task_report_file']['type'][$ten];
			    $uploadedfile['tmp_name']    =   $_FILES['task_report_file']['tmp_name'][$ten];
			    $uploadedfile['error']       =   $_FILES['task_report_file']['error'][$ten];
			    $uploadedfile['size']        =   $_FILES['task_report_file']['size'][$ten];
			    
			    if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
			    $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
			    $full_abs_temp_file_path = $movefile['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
			}
			#upload image to general uploads directory (close)
			
			#get file info and paths (open)
			if(1==1){
			    
			    #get filename only
				$file_path_info = pathinfo($full_abs_temp_file_path);
				
			    #full temp path
				$full_temp_path_abs = $full_abs_temp_file_path;
				
			    #original filename
				$original_filename = $file_path_info['basename'];
				
			    #full final path
				$full_final_path_abs =
				    $unfull_final_path_abs.
				    '/Task-Report-File_'.$get_id.'-'.$task_report_id.'-'.($ten+1).'.'.$file_path_info['extension'];
			    
			}
			#get file info and paths (close)
			
			#check if mime type is valid (open)
			if(1==1){
			    
			    #get mime type
				$finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic"); //load plugin
				$mimetype = $finfo->file($full_temp_path_abs);
				
			    #allowed file extensions
				$allowed_file_extensions_query = $GLOBALS['wpdb']->prepare('SELECT vol_file_ext_mime_type
										FROM fi4l3fg_voluno_file_extensions
										WHERE vol_file_ext_mime_type = %s'
										,$mimetype);
				$allowed_file_extensions_row = $GLOBALS['wpdb']->get_row($allowed_file_extensions_query);
				
			    #if mime type is not valid (open)
			    if(empty($allowed_file_extensions_row)){
				
				$file_upload_error = "unknown mime type";
				
			    }
			    #if mime type is not valid (close)
			    
			}
			#check if mime type is valid (close)
			
			#if file is too large (open)
			if(1==1){
			    
			    $filesize = filesize($full_temp_path_abs);
			    
			    #get size of current task files (open)
			    if(1==1){
				$task_files_query = $GLOBALS['wpdb']->prepare('SELECT *
								    FROM fi4l3fg_voluno_files
								    WHERE vol_file_type_general = "task"
									AND vol_file_type_id = %s;'
								    ,$get_id);
				$task_files_results = $GLOBALS['wpdb']->get_results($task_files_query);
				
				unset($summed_size_of_all_task_files);
				#loop (open)
				for($four=0;$four<count($task_files_results);$four++){
				    
				    $filesize_calculation = filesize($unfull_final_path_abs.'/'.$task_files_results[$four]->vol_file_name);
				    $summed_size_of_all_task_files = $summed_size_of_all_task_files+$filesize_calculation;
				    
				}
				#loop (close)
				
			    }
			    #get size of current task files (open)
			    
			    #if task space used up (open)
			    if($filesize + $summed_size_of_all_task_files > $max_task_size){ //50 MB
				
				$file_upload_error = "file space used up".(pow(1024,2) * 50);
				
			    }
			    #if task space used up (close)
			    
			    #if file too big (open)
			    if($filesize > pow(1024,2) * 5){ //5 MB
				
				$file_upload_error = "file too large".(pow(1024,2) * 5);
				
			    }
			    #if file too big (close)
			    
			}
			#if file is too large (close)
			
			#if file valid (open)
			if(empty($file_upload_error)){
			    
			    #create folder, if not exists (open)
			    if (!file_exists($unfull_final_path_abs)) { 
			       mkdir($unfull_final_path_abs, 0777, true);
			    }
			    #create folder, if not exists (close)
			    
			    rename($full_temp_path_abs,$full_final_path_abs);
			    
			}
			#if file valid (close)
			
			unlink($full_temp_path_abs);
			
		    }
		    #upload files (close)
		    
		    #insert files in database (open)
		    if(empty($file_upload_error)){
			
			$file_path_info_final = pathinfo($full_final_path_abs);
			
			$GLOBALS['wpdb']->insert(
					'fi4l3fg_voluno_files',
				array(
					'vol_file_name'             => $file_path_info_final['basename'],
					'vol_file_name_original'    => $original_filename,
					'vol_file_type_general'     => "task",
					'vol_file_type_id'          => $get_id,
					
					'vol_file_type_specific'    => "progress report",
					'vol_file_type_specific_id' => $task_report_id,
					'vol_file_user_id'          => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
					
					'vol_file_date_modified'     => date("Y-m-d H:i:s"),
					'vol_file_date_created'     => date("Y-m-d H:i:s")
				    ),
				array(
					'%s','%s','%s','%s',
					'%s','%s','%s',
					'%s','%s'
				    ));
		    }
		    #insert files in database (close)
		    
		    unset($file_upload_error);
		    
		    #create text for progress report (open)
		    if(1==1){
			
			if($ten == 0){
			    $task_report_files_formatted = '<p>Attached files:</p><ul>';
			}
			
			$task_report_files_formatted .= '<li><p>'.$_FILES['task_report_file']['name'][$ten].'</p></li>';
			
			if($ten + 1 == count($_FILES['task_report_file']['name'])){
			    $task_report_files_formatted .= '</ul><p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>';
			}
			
		    }
		    #create text for progress report (close)
		    
		}
		#insert files (close)
		
		#send email to people (open)
		if(1==1){
		    
		    //add further recipients if more than two people are supposed to work on a task
		    $array_of_users_who_receive_progress_reports
		    = array(
			$assigned_volunteer_row->application_user_id,
			$task_row->task_author_id
		    );
		    
		    if(array_search($GLOBALS['voluno_variables']['current_user_extended']->usersext_id, $array_of_users_who_receive_progress_reports) != false){
			unset(
			    $array_of_users_who_receive_progress_reports[
				array_search($GLOBALS['voluno_variables']['current_user_extended']->usersext_id, $array_of_users_who_receive_progress_reports)
			    ]
			);
			array_values($array_of_users_who_receive_progress_reports);
		    }
		    
		    #function-emails.php (v1.0) (open)
		    for($ahc=0;$ahc<count($array_of_users_who_receive_progress_reports);$ahc++){
			
			#function-sanitize-text.php (v1.0) (open)
			if(1==1){
			    
			    $function_sanitize_text__type = 'plain text with line breaks (biography) for email'; //obligatory
			    /*
				one line unformatted text (city, name, occupation, etc.)
				url readable text (url, user_nicename, etc.) (sanitize_title)
				email address
				plain text with line breaks (biography)
				code (php files)
			    */
			    $function_sanitize_text__text = $_POST['task_report_text'];
			    #$function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
			    include('#function-sanitize-text.php');
			    $task_report_text_for_email = $function_sanitize_text__text_sanitized;
			    
			}
			#function-sanitize-text.php (v1.0) (close)
			
			#function-profile-link.php (v1.0) (open)
			if(1==1){ //ngo
				
				#documentation (open)
				if(1==1){
					
					// Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
					// Provides complete link, link address, name, or link title.
					// Optionally displays image of user on hover of link.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_profileLink['id'] = $task_row->ngo_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
					
					$ngo_link = $function_profileLink['link'];
					$ngo_name = $function_profileLink['name'];
					
				}
				#output (close)
				
			}
			#function-profile-link.php (v1.0) (close)
			
			#function-profile-link.php (v1.0) (open)
			if(1==1){// author name and position
				
				#documentation (open)
				if(1==1){
					
					// Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
					// Provides complete link, link address, name, or link title.
					// Optionally displays image of user on hover of link.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_profileLink['id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
					
					$pr_author_link = $function_profileLink['link'];
					$pr_author_name_and_position = $function_profileLink['name']; //dome: consider adding the position in brackets (once I figured out which ones to use)
					
				}
				#output (close)
				
			}
			#function-profile-link.php (v1.0) (close)
			
			#function-profile-link.php (v1.0) (open)
			if(1==1){ //recipient name
				
				#documentation (open)
				if(1==1){
					
					// Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
					// Provides complete link, link address, name, or link title.
					// Optionally displays image of user on hover of link.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_profileLink['id'] = $array_of_users_who_receive_progress_reports[$ahc]; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
					
					$recipient_name = $function_profileLink['name'];
					
				}
				#output (close)
				
			}
			#function-profile-link.php (v1.0) (close)
			
			$function_admin_emails['recipient_id_or_email_address'] = $array_of_users_who_receive_progress_reports[$ahc]; //finds email address, default is steve's id (1). also accepts mail addresse
			$function_admin_emails['email_content_id'] = 12; //please select id
			$function_admin_emails['placeholders'] =
			array(
			    array(
				'ph_name' => 'recipient_name',
				'ph_value' => $recipient_name
			    ),
			    array(
				'ph_name' => 'pr_message',
				'ph_value' => $task_report_text_for_email
			    ),
			    array(
				'ph_name' => 'task_name',
				'ph_value' => $task_row->task_name
			    ),
			    array(
				'ph_name' => 'task_link',
				'ph_value' => get_permalink(688).'?type=task&id='.$task_row->task_id
			    ),
			    array(
				'ph_name' => 'pr_author_and_position',
				'ph_value' => $pr_author_name_and_position
			    ),
			    array(
				'ph_name' => 'pr_author_link',
				'ph_value' => $pr_author_link
			    ),
			    array(
				'ph_name' => 'ngo_name',
				'ph_value' => $ngo_name
			    ),
			    array(
				'ph_name' => 'ngo_link',
				'ph_value' => $ngo_link
			    ),
			    array(
				'ph_name' => 'task_report_attachments',
				'ph_value' => $task_report_files_formatted
			    )
			);
			include('#function-emails.php');
			#output: $function_admin_emails == TRUE or FALSE if sent successfully
			
		    }
		    #function-emails.php (v1.0) (close)
		    
		}
		#send email to people (close)
		
	    }
	    #task report (close)
	    
	    #applications (open)
	    if(1==1){
		
		#accept application (open)
		if($arm['accept_and_reject'] == "yes" AND !empty($_POST['accept_application_id'])){
		    
		    $application_acceptance_text = $_POST['application_acceptance_text'];
		    $application_id = $_POST['accept_application_id'];
		    
		    #function-sanitize-text.php (v1.0) (open)
		    if(1==1){
			
			$function_sanitize_text__type = 'plain text with line breaks (biography)'; //obligatory
			/*
			    one line unformatted text (city, name, occupation, etc.)
			    url readable text (url, user_nicename, etc.) (sanitize_title)
			    email address
			    plain text with line breaks (biography)
			    code (php files)
			*/
			$function_sanitize_text__text = $application_acceptance_text;
			#$function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
			include('#function-sanitize-text.php');
			$application_acceptance_text = $function_sanitize_text__text_sanitized;
			
		    }
		    #function-sanitize-text.php (v1.0) (close)
		    
		    #accepted volunteer (open)
		    if(1==1){
			
			#verify application (open)
			if(1==1){
			    $application_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_applications
								    LEFT JOIN fi4l3fg_voluno_users_extended
								    ON application_user_id = ID
								WHERE application_type_specific = "task_application"
								    AND application_type_general = "task"
								    AND application_type_id = %s
								    AND application_id = %s;'
								,$task_row->task_id
								,$application_id);
			    $application_row = $GLOBALS['wpdb']->get_row($application_query);
			    
			    if(empty($application_row)){
			       $error = "yes";
			    }
			}
			#verify application (close)
			
			#update application (open)
			if(empty($error)){
			    
			    $GLOBALS['wpdb']->update( 
					    'fi4l3fg_voluno_applications',
				    array( //updated content
					    'application_status' => 'accepted'
				    ),
				    array( //location of updated content
					    'application_id' => $application_row->application_id
				    ),
				    array( //format of updated content
					    '%s'
				    ),
				    array( //format of location of updated content
					    '%s'
					));
			    
			}
			#update application (close)
			
			#inform volunteer (open)
			if(empty($error)){
			    
			    #function-emails.php (v1.0) (open)
			    if(1==1){
					
					#profile links (open)
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
								
								$function_profileLink['id'] = $task_row->ngo_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
								$ngo_link = $function_profileLink['link'];
								$ngo_name = $function_profileLink['name'];
								
							}
							#output (close)
							
						}
						#function-profile-link.php (v1.0) (close)
						
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
								
								$function_profileLink['id'] = $task_row->task_author_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
								$task_author_link = $function_profileLink['link'];
								$task_author_name = $function_profileLink['name'];
								
							}
							#output (close)
							
						}
						#function-profile-link.php (v1.0) (close)	
						
					}
					#profile links (close)
					
					$function_admin_emails['recipient_id_or_email_address'] = $application_row->application_user_id; //finds email address, default is steve's id (1). also accepts mail addresse
					$function_admin_emails['email_content_id'] = 11; //please select id
					$function_admin_emails['placeholders'] =
					array(
						array(
						'ph_name' => 'applicant_name',
						'ph_value' => $application_row->usersext_displayName
						),
						array(
						'ph_name' => 'task_name',
						'ph_value' => $task_row->task_name
						),
						array(
						'ph_name' => 'task_link',
						'ph_value' => get_permalink(688).'?type=task&id='.$task_row->task_id
						),
						array(
						'ph_name' => 'ngo_link',
						'ph_value' => $ngo_link
						),
						array(
						'ph_name' => 'ngo_name',
						'ph_value' => $ngo_name
						),
						array(
						'ph_name' => 'task_author_name',
						'ph_value' => $task_author_name
						),
						array(
						'ph_name' => 'task_author_link',
						'ph_value' => $task_author_link
						),
						array(
						'ph_name' => 'acceptance_message',
						'ph_value' => $application_acceptance_text
						)
					);
					include('#function-emails.php');
					#output: $function_admin_emails == TRUE or FALSE if sent successfully
			    }
			    #function-emails.php (v1.0) (close)
			    
			    #dome-> add notification
			}
			#inform volunteer (close)
			
		    }
		    #accepted volunteer (close)
		    
		    #rejected volunteers (open)
		    if(empty($error)){
			
			#get rejected applications (open)
			if(1==1){
			    $rejected_applications_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_applications
								WHERE application_type_specific = "task_application"
								    AND application_type_general = "task"
								    AND application_type_id = %s
								    AND application_status = "pending";'
								,$task_row->task_id);
			    $rejected_applications_results = $GLOBALS['wpdb']->get_results($rejected_applications_query);
			    
			}
			#get rejected applications (close)
			
			#update rejected application (open)
			if(1==1){
			    
			    for($aab=0;$aab<count($rejected_applications_results);$aab++){
				$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_applications',
					array( //updated content
						'application_status' => 'rejected'
					),
					array( //location of updated content
						'application_id' => $rejected_applications_results[$aab]->application_id
					),
					array( //format of updated content
						'%s'
					),
					array( //format of location of updated content
						'%s'
					    ));
			    }
			    
			}
			#update rejected application (close)
			
			#inform volunteers (open)
			if(1==1){
			    for($aab=0;$aab<count($rejected_applications_results);$aab++){
				
				#dome -> send email
				
				#dome -> add notification
				
			    }
			}
			#inform volunteers (close)
			
		    }
		    #rejected volunteers (close)
		    
		    #update task status (open)
		    if(empty($error)){
			
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_status' => 'in progress'
				),
				array( //location of updated content
					'task_id' => $task_row->task_id,
					'task_status' => "unassigned"
				),
				array( //format of updated content
					'%s'
				),
				array( //format of location of updated content
					'%s',
					'%s'
				    ));
			
		    }
		    #update task status (close)
		    
		}
		#accept application (close)
		
		#volunteer - apply (open)
		if($arm['apply'] == "yes" AND $_POST['apply_for_task_text']){
		    
		    #function-sanitize-text.php (v1.0) (open)
		    if(1==1){
			
			$function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory
			/*
			    one line unformatted text (city, name, occupation, etc.)
			    url readable text (url, user_nicename, etc.) (sanitize_title)
			    email address
			    plain text with line breaks (biography)
			*/
			$function_sanitize_text__text = $_POST['apply_for_task_text'];
			$function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
			include('#function-sanitize-text.php');
			#output: $function_sanitize_text__text_sanitized;
			
		    }
		    #function-sanitize-text.php (v1.0) (close)
		    
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
		    
		    $GLOBALS['wpdb']->insert( 
				'fi4l3fg_voluno_applications',
			    array( //updated content
				'application_type_general' => "task",
				'application_type_specific' => "task_application",
				
				'application_type_id' => $get_id,
				'application_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
				
				'application_text' => stripslashes($function_sanitize_text__text_sanitized),
				'application_status' => 'pending',
				'application_code' => $voluno_random_num,
				
				'application_date_created' => date("Y-m-d H:i:s"),
				'application_date_modified' => date("Y-m-d H:i:s")
			    ),
			    array( //format of updated content
				'%s','%s',
				'%s','%s',
				'%s','%s','%s',
				'%s','%s'
			    ));
		    
		    #dome add email notification
		    
		}
		#volunteer - apply (close)
		
		#volunteer - withdraw application (open)
		if($arm['already_applied'] == "yes" AND $_POST['withdraw_task_application_activate']){
		    
		    $GLOBALS['wpdb']->update( 
				    'fi4l3fg_voluno_applications',
			    array( //updated content
				    'application_status' => 'withdrawn'
			    ),
			    array( //location of updated content
				    'application_id' => $volunter_application_check_row->application_id
			    ),
			    array( //format of updated content
				    '%s'
			    ),
			    array( //format of location of updated content
				    '%s'
				));
		    
		}
		#volunteer - withdraw application (close)
		
	    }
	    #applications (close)
	    
	    #options (open)
	    if($arm['options'] == "yes"){ //covered in content
		
		#for volunteers (open)
		if($arm['options_for_volunteers'] == "yes"){
		}
		#for volunteers (close)
		
		#for ngos (open)
		if($arm['options_for_ngos'] == "yes"){ //covered in content
		    
		    #publish (open)
		    if($arm['options_for_ngos_publish'] == "yes" AND !empty($_POST['publish_task'])){ //covered in content
			
			#update task status (open)
			if(!empty($task_row->task_ready_for_publication)){
			    
			    #update database (open)
			    if(1==1){
				$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_items_tasks',
					array( //updated content
						'task_status' => 'unassigned',
						'task_date_published' => date("Y-m-d H:i:s")
					),
					array( //location of updated content
						'task_id' => $task_row->task_id
					),
					array( //format of updated content
						'%s','%s'
					),
					array( //format of location of updated content
						'%s'
					    ));
				
			    }
			    #update database (close)
			    
			    #notify volunteers of task (open)
			    if(1==1){
				
				#dome
				
			    }
			    #notify volunteers of task (close)
			    
			}
			#update task status (close)
			
		    }
		    #publish (close)
		    
		    #copy (open)
		    if($arm['options_for_ngos_copy'] == "yes" AND !empty($_POST['copy_task'])){ //covered in content
			
			#create new task (open)
			if(1==1){
			    
			    #random numbers (open)
			    if(1==1){
				$voluno_random_num = "";
				$length = 50;
				for($aad=0;$aad<6;$aad++){
				    
				    for($aac = 1; $aac < $length; $aac++) {
					
					${'voluno_random_num'.($aac+1)} =
					    ${'voluno_random_num'.($aac+1)}.
					    substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
					
				    }
				    
				}
			    }
			    #random numbers (close)
			    
			    $GLOBALS['wpdb']->insert(
					    'fi4l3fg_voluno_items_tasks',
				    array(
					    'task_name' => $task_row->task_name,
					    'task_description' => $task_row->task_description,
					    'task_description_long' => $task_row->task_description_long,
					    'task_description_undisclosed' => $task_row->task_description_undisclosed,
					    
					    'task_deadline' => $task_row->task_deadline,
					    'task_assignment_deadline' => $task_row->task_assignment_deadline,
					    'task_expected_duration' => $task_row->task_expected_duration,
					    
					    'task_status' => "draft",
					    'task_author_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
					    'task_ngo_id' => $task_row->task_ngo_id,
					    
					    'task_code' => $voluno_random_num1,
					    'task_code2' => $voluno_random_num2,
					    'task_code3' => $voluno_random_num3,
					    'task_code4' => $voluno_random_num4,
					    'task_code5' => $voluno_random_num5,
					    'task_code6' => $voluno_random_num6,
					    
					    'task_ready_for_publication' => $task_row->task_ready_for_publication,
					    
					    'task_date_modified' => date("Y-m-d H:i:s"),
					    'task_date_created' => date("Y-m-d H:i:s")
					),
				    array(
					    '%s','%s','%s','%s',
					    '%s','%s','%s',
					    '%s','%s','%s',
					    '%s','%s','%s','%s','%s','%s',
					    '%s',
					    '%s','%s'
					));
			    
			    $id_of_new_task = $GLOBALS['wpdb']->insert_id;
			    
			}
			#create new task (close)
			
			#copy task properties (open)
			if(1==1){
			    
			    #get (open)
			    if(1==1){
				
				$task_properties_query = $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_items_tasks_properties
									WHERE taskprop_task_id = %s;'
									,$task_row->task_id);
				$task_properties_results = $GLOBALS['wpdb']->get_results($task_properties_query);
				
			    }
			    #get (close)
			    
			    #insert (open)
			    for($aae=0;$aae<count($task_properties_results);$aae++){
				
				$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_items_tasks_properties',
					array(
						'taskprop_task_id' => $id_of_new_task,
						'taskprop_type' => "type",
						'taskprop_type_id' => $task_properties_results[$aae]->taskprop_type_id,
						'taskprop_date_created' => date("Y-m-d H:i:s")
					    ),
					array(
						'%s','%s','%s','%s'
					    ));
				
			    }
			    #insert (close)
			    
			}
			#copy task properties (close)
			
			#copy files (open)
			if(1==1){
			    
			    #copy database entries (open)
			    if(1==1){
				
				#get (open)
				if(1==1){
				    
				    $files_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_files
								WHERE vol_file_type_general = "task"
								    AND (vol_file_type_specific = "specific description"
									OR
									vol_file_type_specific = "general description"
									)
								    AND vol_file_type_id = %s
								    ORDER BY vol_file_type_specific ASC;'
								,$task_row->task_id);
				    $files_results = $GLOBALS['wpdb']->get_results($files_query);
				    
				}
				#get (close)
				
				#insert (open)
				for($aae=0;$aae<count($files_results);$aae++){
				    
				    $GLOBALS['wpdb']->insert(
						    'fi4l3fg_voluno_files',
					    array(
						    'vol_file_name' => $files_results[$aae]->vol_file_name,
						    'vol_file_type_general' => $files_results[$aae]->vol_file_type_general,
						    'vol_file_type_specific' => $files_results[$aae]->vol_file_type_specific,
						    
						    'vol_file_type_id' => $id_of_new_task,
						    'vol_file_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
						    
						    'vol_file_date_modified' => date("Y-m-d H:i:s"),
						    'vol_file_date_created' => date("Y-m-d H:i:s")
						),
					    array(
						    '%s','%s','%s',
						    '%s','%s',
						    '%s','%s'
						));
				    
				}
				#insert (close)
				
			    }
			    #copy database entries (close)
			    
			    #copy actual files (open)
			    if(1==1){
				
				#paths (open)
				if(1==1){
				    
				    #upload directory folders
					$uploads_directory_array = wp_upload_dir();
					$uploads_directory_abs = $uploads_directory_array['path'];
					
				    #unfull original path
					$unfull_path_of_original_task =
					    $uploads_directory_abs.
					    '/items/tasks/'.
					    $task_row->task_id;
					
				    #unfull new path
					$unfull_path_of_new_task =
					    $uploads_directory_abs.
					    '/items/tasks/'.
					    $id_of_new_task;
				    
				}
				#paths (close)
				
				mkdir($unfull_path_of_new_task, 0777, true);
				
				#copy files (open)
				for($aaf=0;$aaf<count($files_results);$aaf++){
				    
				    copy(
					$unfull_path_of_original_task.'/'.$files_results[$aaf]->vol_file_name,
					$unfull_path_of_new_task.'/'.$files_results[$aaf]->vol_file_name
				    );
				    
				}
				#copy files (close)
				
			    }
			    #copy actual files (close)
			    
			}
			#copy files (close)
			
			#redirect to new task (open)
			if(1==1){
			    echo '
			    <script>
				jQuery(document).ready(function(){
				    window.location.replace("'.get_permalink().'?type=task&id='.$id_of_new_task.'");
				});
			    </script>';
			    exit("This website requires Javascript. Please turn it on, update your browser or switch to a browser that supports it.");
			}
			#redirect to new task (close)
			
		    }
		    #copy (close)
		    
		    #cancel (open)
		    if($arm['options_for_ngos_cancel'] == "yes" AND !empty($_POST['cancel_task'])){ //covered in content
			
			#update task status (open)
			if(1==1){
			    
			    $GLOBALS['wpdb']->update( 
					    'fi4l3fg_voluno_items_tasks',
				    array( //updated content
					    'task_status' => 'cancelled',
					    'task_date_cancelled' => date("Y-m-d H:i:s")
				    ),
				    array( //location of updated content
					    'task_id' => $task_row->task_id
				    ),
				    array( //format of updated content
					    '%s','%s'
				    ),
				    array( //format of location of updated content
					    '%s'
					));
			    
			}
			#update task status (close)
			
			#inform volunteer (open)
			if(1==1){
			    #dome
			}
			#inform volunteers (close)
			
		    }
		    #cancel (close)
		    
		    #delete (open)
		    if($arm['options_for_ngos_delete'] == "yes" AND !empty($_POST['delete_task']) AND $task_status == 'cancelled'){
		    //covered in content
			
			#update task status (open)
			if(1==1){
			    
			    $GLOBALS['wpdb']->update( 
					    'fi4l3fg_voluno_items_tasks',
				    array( //updated content
					    'task_status' => 'deleted'
				    ),
				    array( //location of updated content
					    'task_id' => $task_row->task_id
				    ),
				    array( //format of updated content
					    '%s'
				    ),
				    array( //format of location of updated content
					    '%s'
					));
			    
			}
			#update task status (close)
			
			#redirect to work center (open)
			if(1==1){
			    echo '
			    <script>
				jQuery(document).ready(function(){
				    window.location.replace("'.get_permalink().'");
				});
			    </script>';
			    exit("This website requires Javascript. Please turn it on, update your browser or switch to a browser that supports it.");
			}
			#redirect to work center (close)
			
		    }
		    #delete (close)
		    
		    #complete (open)
		    if($arm['options_for_ngos_complete'] == "yes" AND !empty($_POST['complete_task']) AND $task_status == 'in progress'){
		    //covered in content
			
			#update task status (open)
			if(1==1){
			    
			    $GLOBALS['wpdb']->update( 
					    'fi4l3fg_voluno_items_tasks',
				    array( //updated content
					    'task_status' => 'completed',
					    'task_date_completed' => date("Y-m-d H:i:s")
				    ),
				    array( //location of updated content
					    'task_id' => $task_row->task_id
				    ),
				    array( //format of updated content
					    '%s','%s'
				    ),
				    array( //format of location of updated content
					    '%s'
					));
			    
			}
			#update task status (close)
			
			#inform volunteer (open) #dome
			if(1==1){
			    #dome
			    #evaluation?
			}
			#inform volunteers (close)
			
			#add ratings (open)
			if(1==1){
			    
			    #supervisor (open)
			    if(1==1){
				$GLOBALS['wpdb']->insert(
					    'fi4l3fg_voluno_ratings',
					array(
					    'rating_type_general' => 'task',
					    'rating_type_general_id' => $task_row->task_id,
					    'rating_type_specific' => 'ngo',
					    
					    'rating_user_id' => $task_row->task_author_id,
					    'rating_status' => 'pending',
					    
					    'rating_date_modified' => date("Y-m-d H:i:s"),
					    'rating_date_created' => date("Y-m-d H:i:s"),
					),
					array(
					    '%s','%s','%s',
					    '%s','%s',
					    '%s','%s'
					));
				
			    }
			    #supervisor (close)
			    
			    #volunteer (open)
			    if(1==1){
				$GLOBALS['wpdb']->insert(
					    'fi4l3fg_voluno_ratings',
					array(
					    'rating_type_general' => 'task',
					    'rating_type_general_id' => $task_row->task_id,
					    'rating_type_specific' => 'volunteer',
					    
					    'rating_user_id' => $assigned_volunteer_row->application_user_id,
					    'rating_status' => 'pending',
					    
					    'rating_date_modified' => date("Y-m-d H:i:s"),
					    'rating_date_created' => date("Y-m-d H:i:s"),
					),
					array(
					    '%s','%s','%s',
					    '%s','%s',
					    '%s','%s'
					));
				
			    }
			    #volunteer (close)
			    
			    $show_ratings_popup = "yes";
			    
			}
			#add ratings (close)
			
		    }
		    #complete (close)
		    
		}
		#for ngos (close)
		
	    }
	    #options (close)
	    
	    #update via edit mode (open)
	    if($arm['edit_mode'] == "yes" AND $_POST['activate_mysql_update_in_edit_mode'] == "yes"){
		
		#title (open)
		if(1==1){
		    
		    $edit_title = $_POST['edit_title'];
		    
		    #function-sanitize-text.php (open)
		    if(1==1){
		      $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
		      $function_sanitize_text__text = $edit_title;
		      include('#function-sanitize-text.php');
		      $edit_title = $function_sanitize_text__text_sanitized;
		    }
		    #function-sanitize-text.php (close)
		    
		    #update (open)
		    if(1==1){
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_name' => $edit_title
				),
				array( //location of updated content
					'task_id' => $get_id
				),
				array( //format of updated content
					'%s'
				),
				array( //format of location of updated content
					'%s'
				    ));
		    }
		    #update (close)
		    
		}
		#title (close)
		
		#short description (open)
		if(1==1){
		    
		    $edit_short_description = $_POST['edit_short_description'];
		    
		    #function-sanitize-text.php (open)
		    if(1==1){
		      $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
		      $function_sanitize_text__text = $edit_short_description;
		      include('#function-sanitize-text.php');
		      $edit_short_description = $function_sanitize_text__text_sanitized;
		    }
		    #function-sanitize-text.php (close)
		    
		    #update (open)
		    if(1==1){
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_description' => $edit_short_description
				),
				array( //location of updated content
					'task_id' => $get_id
				),
				array( //format of updated content
					'%s'
				),
				array( //format of location of updated content
					'%s'
				    ));
		    }
		    #update (close)
		    
		}
		#short description (close)
		
		#task types (open)
		if(1==1){
		    
		    $edit_task_type_id_array = $_POST['edit_task_type_id'];
		    
		    #$edit_task_type_id_array = explode(",",$edit_task_type_id_real);
		    
		    #database query delete (open)
		    if(1==1){
			$GLOBALS['wpdb']->delete(
					'fi4l3fg_voluno_items_tasks_properties',
				array( //location of row to delete
					'taskprop_task_id' => $get_id,
					'taskprop_type' => "type"
				),
				array( //format of location of row to delete
					'%s','%s'
				));
		    }
		    #database query delete (close)
		    
		    #database query insert (open)
		    for($aam=0;$aam<count($edit_task_type_id_array);$aam++){
			
			$value = $edit_task_type_id_array[$aam];
			
			if($aam == 0){
			    
			    $all_available_task_types_query = $GLOBALS['wpdb']->prepare('SELECT *
									     FROM fi4l3fg_voluno_lists_task_types');
			    $all_available_task_types_results = $GLOBALS['wpdb']->get_results($all_available_task_types_query);
			    
			    for($aan=0;$aan<count($all_available_task_types_results);$aan++){
				$all_available_task_types[] = $all_available_task_types_results[$aan]->task_type_id;
			    }
			    
			}
			
			if(in_array($value,$all_available_task_types)){
			    $GLOBALS['wpdb']->insert(
					    'fi4l3fg_voluno_items_tasks_properties',
				    array(
					    'taskprop_type_id' => $edit_task_type_id_array[$aam],
					    'taskprop_date_created' => date("Y-m-d H:i:s"),
					    
					    'taskprop_task_id' => $get_id,
					    'taskprop_type' => "type"
					),
				    array(
					    '%s','%s',
					    '%s','%s'
				    ));
			}
		    }
		    #database query insert (close)
		    
		}
		#task types (close)
		
		#general and specific description (open)
		if(1==1){
		    
		    #text (open)
		    if(1==1){
			
			$edit_general_description = $_POST['edit_general_description'];
			$edit_specific_description = $_POST['edit_specific_description'];
			
			#function-sanitize-text.php (open)
			if(1==1){
			  $function_sanitize_text__type = "plain text with line breaks (biography)";
			  $function_sanitize_text__text = $edit_general_description;
			  include('#function-sanitize-text.php');
			  $edit_general_description = $function_sanitize_text__text_sanitized;
			  
			  $function_sanitize_text__type = "plain text with line breaks (biography)";
			  $function_sanitize_text__text = $edit_specific_description;
			  include('#function-sanitize-text.php');
			  $edit_specific_description = $function_sanitize_text__text_sanitized;
			}
			#function-sanitize-text.php (close)
			
			#update (open)
			if(1==1){
			    $GLOBALS['wpdb']->update( 
					    'fi4l3fg_voluno_items_tasks',
				    array( //updated content
					    'task_description_long' => $edit_general_description,
					    'task_description_undisclosed' => $edit_specific_description
				    ),
				    array( //location of updated content
					    'task_id' => $get_id
				    ),
				    array( //format of updated content
					    '%s','%s'
				    ),
				    array( //format of location of updated content
					    '%s'
					));
			}
			#update (close)
			
		    }
		    #text (close)
		    
		    #add files (open)
		    if(1==1){
			
			#loop general description (open)
			for($aao=0;$aao<count($_FILES['edit_general_description_files']['tmp_name']);$aao++){
			    
			    #upload files (open)
			    if(1==1){
				
				#upload image to general uploads directory (open)
				if(1==1){
				    unset($uploadedfile);
				    $uploadedfile['name']        =   $_FILES['edit_general_description_files']['name'][$aao];
				    $uploadedfile['type']        =   $_FILES['edit_general_description_files']['type'][$aao];
				    $uploadedfile['tmp_name']    =   $_FILES['edit_general_description_files']['tmp_name'][$aao];
				    $uploadedfile['error']       =   $_FILES['edit_general_description_files']['error'][$aao];
				    $uploadedfile['size']        =   $_FILES['edit_general_description_files']['size'][$aao];
				    
				    if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
				    $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
				    $full_abs_temp_file_path = $movefile['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
				}
				#upload image to general uploads directory (close)
				
				#get file info and paths (open)
				if(1==1){
				    
				    #get filename only
					$file_path_info = pathinfo($full_abs_temp_file_path);
					
				    #full temp path
					$full_temp_path_abs = $full_abs_temp_file_path;
					
				    #original filename
					$original_filename = $file_path_info['basename'];
					
				    #num of existing files of this type (open)
				    if(1==1){
					
					$num_of_files_of_same_type_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_files
										WHERE vol_file_type_general = "task"
										    AND vol_file_type_id = %s
										    AND vol_file_type_specific = "general description";'
										,$get_id);
					$num_of_files_of_same_type_results = $GLOBALS['wpdb']->get_results($num_of_files_of_same_type_query);
					
				    }
				    #num of existing files of this type (close)
					
				    #full final path
					$full_final_path_abs =
					    $unfull_final_path_abs.
					    '/General-Description-File_'.$get_id.'-'.
					    ( $aao + 1 + count($num_of_files_of_same_type_results) ).
					    '.'.$file_path_info['extension'];
				    
				}
				#get file info and paths (close)
				
				#check if mime type is valid (open)
				if(1==1){
				    
				    #get mime type
					$finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic"); //load plugin
					$mimetype = $finfo->file($full_temp_path_abs);
					
				    #allowed file extensions
					$allowed_file_extensions_query = $GLOBALS['wpdb']->prepare('SELECT vol_file_ext_mime_type
											FROM fi4l3fg_voluno_file_extensions
											WHERE vol_file_ext_mime_type = %s'
											,$mimetype);
					$allowed_file_extensions_row = $GLOBALS['wpdb']->get_row($allowed_file_extensions_query);
					
				    #if mime type is not valid (open)
				    if(empty($allowed_file_extensions_row)){
					
					$file_upload_error = "unknown mime type";
					
				    }
				    #if mime type is not valid (close)
				    
				}
				#check if mime type is valid (close)
				
				#if file is too large (open)
				if(1==1){
				    
				    $filesize = filesize($full_temp_path_abs);
				    
				    #get size of current task files (open)
				    if(1==1){
					$task_files_query = $GLOBALS['wpdb']->prepare('SELECT *
									    FROM fi4l3fg_voluno_files
									    WHERE vol_file_type_general = "task"
										AND vol_file_type_id = %s;'
									    ,$get_id);
					$task_files_results = $GLOBALS['wpdb']->get_results($task_files_query);
					
					unset($summed_size_of_all_task_files);
					#loop (open)
					for($four=0;$four<count($task_files_results);$four++){
					    
					    $filesize_calculation = filesize($unfull_final_path_abs.'/'.$task_files_results[$four]->vol_file_name);
					    $summed_size_of_all_task_files = $summed_size_of_all_task_files+$filesize_calculation;
					    
					}
					#loop (close)
					
				    }
				    #get size of current task files (open)
				    
				    #if task space used up (open)
				    if($filesize + $summed_size_of_all_task_files > $max_task_size){ //50 MB
					
					$file_upload_error = "file space used up".(pow(1024,2) * 50);
					
				    }
				    #if task space used up (close)
				    
				    #if file too big (open)
				    if($filesize > pow(1024,2) * 20){ //20 MB
					
					$file_upload_error = "file too large".(pow(1024,2) * 20);
					
				    }
				    #if file too big (close)
				    
				}
				#if file is too large (close)
				
				#if file valid (open)
				if(empty($file_upload_error)){
				    
				    #create folder, if not exists (open)
				    if (!file_exists($unfull_final_path_abs)) { 
				       mkdir($unfull_final_path_abs, 0777, true);
				    }
				    #create folder, if not exists (close)
				    
				    rename($full_temp_path_abs,$full_final_path_abs);
				    
				}
				#if file valid (close)
				
				unlink($full_temp_path_abs);
				
			    }
			    #upload files (close)
			    
			    #insert files in database (open)
			    if(empty($file_upload_error)){
				
				$file_path_info_final = pathinfo($full_final_path_abs);
				
				$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_files',
					array(
						'vol_file_name'             => $file_path_info_final['basename'],
						'vol_file_name_original'    => $original_filename,
						'vol_file_type_general'     => "task",
						'vol_file_type_id'          => $get_id,
						
						'vol_file_type_specific'    => "general description",
						'vol_file_user_id'          => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
						
						'vol_file_date_created'     => date("Y-m-d H:i:s")
					    ),
					array(
						'%s','%s','%s','%s',
						'%s','%s',
						'%s'
					    ));
			    }
			    #insert files in database (close)
			    
			    unset($file_upload_error);
			    
			}
			#loop general description (close)
			
			#loop specific description (open)
			for($aao=0;$aao<count($_FILES['edit_specific_description_files']['tmp_name']);$aao++){
			    
			    #upload files (open)
			    if(1==1){
				
				#upload image to general uploads directory (open)
				if(1==1){
				    unset($uploadedfile);
				    $uploadedfile['name']        =   $_FILES['edit_specific_description_files']['name'][$aao];
				    $uploadedfile['type']        =   $_FILES['edit_specific_description_files']['type'][$aao];
				    $uploadedfile['tmp_name']    =   $_FILES['edit_specific_description_files']['tmp_name'][$aao];
				    $uploadedfile['error']       =   $_FILES['edit_specific_description_files']['error'][$aao];
				    $uploadedfile['size']        =   $_FILES['edit_specific_description_files']['size'][$aao];
				    
				    if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
				    $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
				    $full_abs_temp_file_path = $movefile['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
				}
				#upload image to general uploads directory (close)
				
				#get file info and paths (open)
				if(1==1){
				    
				    #get filename only
					$file_path_info = pathinfo($full_abs_temp_file_path);
					
				    #full temp path
					$full_temp_path_abs = $full_abs_temp_file_path;
					
				    #original filename
					$original_filename = $file_path_info['basename'];
					
				    #num of existing files of this type (open)
				    if(1==1){
					
					$num_of_files_of_same_type_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_files
										WHERE vol_file_type_general = "task"
										    AND vol_file_type_id = %s
										    AND vol_file_type_specific = "specific description";'
										,$get_id);
					$num_of_files_of_same_type_results = $GLOBALS['wpdb']->get_results($num_of_files_of_same_type_query);
					
				    }
				    #num of existing files of this type (close)
					
				    #full final path
					$full_final_path_abs =
					    $unfull_final_path_abs.
					    '/Specific-Description-File_'.$get_id.'-'.
					    ( $aao + 1 + count($num_of_files_of_same_type_results) ).
					    '.'.$file_path_info['extension'];
				    
				}
				#get file info and paths (close)
				
				#check if mime type is valid (open)
				if(1==1){
				    
				    #get mime type
					$finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic"); //load plugin
					$mimetype = $finfo->file($full_temp_path_abs);
					
				    #allowed file extensions
					$allowed_file_extensions_query = $GLOBALS['wpdb']->prepare('SELECT vol_file_ext_mime_type
											FROM fi4l3fg_voluno_file_extensions
											WHERE vol_file_ext_mime_type = %s'
											,$mimetype);
					$allowed_file_extensions_row = $GLOBALS['wpdb']->get_row($allowed_file_extensions_query);
					
				    #if mime type is not valid (open)
				    if(empty($allowed_file_extensions_row)){
					
					$file_upload_error = "unknown mime type";
					
				    }
				    #if mime type is not valid (close)
				    
				}
				#check if mime type is valid (close)
				
				#if file is too large (open)
				if(1==1){
				    
				    $filesize = filesize($full_temp_path_abs);
				    
				    #get size of current task files (open)
				    if(1==1){
					$task_files_query = $GLOBALS['wpdb']->prepare('SELECT *
									    FROM fi4l3fg_voluno_files
									    WHERE vol_file_type_general = "task"
										AND vol_file_type_id = %s;'
									    ,$get_id);
					$task_files_results = $GLOBALS['wpdb']->get_results($task_files_query);
					
					unset($summed_size_of_all_task_files);
					#loop (open)
					for($four=0;$four<count($task_files_results);$four++){
					    
					    $filesize_calculation = filesize($unfull_final_path_abs.'/'.$task_files_results[$four]->vol_file_name);
					    $summed_size_of_all_task_files = $summed_size_of_all_task_files+$filesize_calculation;
					    
					}
					#loop (close)
					
				    }
				    #get size of current task files (open)
				    
				    #if task space used up (open)
				    if($filesize + $summed_size_of_all_task_files > $max_task_size){ //50 MB
					
					$file_upload_error = "file space used up".(pow(1024,2) * 50);
					
				    }
				    #if task space used up (close)
				    
				    #if file too big (open)
				    if($filesize > pow(1024,2) * 20){ //20 MB
					
					$file_upload_error = "file too large".(pow(1024,2) * 20);
					
				    }
				    #if file too big (close)
				    
				}
				#if file is too large (close)
				
				#if file valid (open)
				if(empty($file_upload_error)){
				    
				    #create folder, if not exists (open)
				    if (!file_exists($unfull_final_path_abs)) { 
				       mkdir($unfull_final_path_abs, 0777, true);
				    }
				    #create folder, if not exists (close)
				    
				    rename($full_temp_path_abs,$full_final_path_abs);
				    
				}
				#if file valid (close)
				
				unlink($full_temp_path_abs);
				
			    }
			    #upload files (close)
			    
			    #insert files in database (open)
			    if(empty($file_upload_error)){
				
				$file_path_info_final = pathinfo($full_final_path_abs);
				
				$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_files',
					array(
						'vol_file_name'             => $file_path_info_final['basename'],
						'vol_file_name_original'    => $original_filename,
						'vol_file_type_general'     => "task",
						'vol_file_type_id'          => $get_id,
						
						'vol_file_type_specific'    => "specific description",
						'vol_file_user_id'          => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
						
						'vol_file_date_created'     => date("Y-m-d H:i:s")
					    ),
					array(
						'%s','%s','%s','%s',
						'%s','%s',
						'%s'
					    ));
			    }
			    #insert files in database (close)
			    
			    unset($file_upload_error);
			    
			}
			#loop specific description (close)
			
		    }
		    #add files (close)
		    
		    #delete files (open)
		    if(!empty($_POST['edit_delete_files'])){
			
			$edit_delete_files_array = explode(",",trim($_POST['edit_delete_files'],","));
			
			#existing files (for validation) (open)
			if(1==1){
			    
			    $all_files_of_this_item_query = $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_files
									WHERE vol_file_type_general = "task"
									    AND vol_file_type_specific
										IN ("general description","specific description")
									    AND vol_file_type_id = %s;'
									,$get_id);
			    $all_files_of_this_item_results = $GLOBALS['wpdb']->get_results($all_files_of_this_item_query);
			    
			    unset($file_id_array);
			    for($aaq=0;$aaq<count($all_files_of_this_item_results);$aaq++){
				$file_id_array[] = $all_files_of_this_item_results[$aaq]->vol_file_id;
				
			    }
			    
			}
			#existing files (for validation) (close)
			
			for($aap=0;$aap<count($edit_delete_files_array);$aap++){
			    
			    if(in_array($edit_delete_files_array[$aap],$file_id_array)){
				
				#database query delete (open)
				if(1==1){
				    $GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_files',
					array( //location of row to delete
						'vol_file_id' => $edit_delete_files_array[$aap]
					),
					array( //format of location of row to delete
						'%s'
					));
				}
				#database query delete (close)
				
				#file delete (open)
				if(1==1){
				    
				    $array_position_of_file = array_search($edit_delete_files_array[$aap],$file_id_array);
				    
				    unlink(
					   $unfull_final_path_abs.
					   '/'.
					   $all_files_of_this_item_results[$array_position_of_file]->vol_file_name
				    );
				    
				}
				#file delete (close)
				
			    }
			    
			}
			
		    }
		    #delete files (close)
		    
		}
		#general and specific description (close)
		
		#ngo (open)
		if($arm['edit_mode_select_ngo'] == "yes"){
		    
		    $edit_ngo = intval($_POST['edit_ngo']);
		    
		    #all of my ngos (open)
		    if(1==1){
			
			$all_of_my_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_development_organizations_properties
								   LEFT JOIN fi4l3fg_voluno_development_organizations
								   ON ngo_prop_ngo_id = ngo_id
								WHERE ngo_prop_type_general = "position"
								    AND ngo_prop_type_specific = "worker"
								    AND ngo_prop_type_id = %s;'
								,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
			$all_of_my_ngos_results = $GLOBALS['wpdb']->get_results($all_of_my_ngos_query);
			
			unset($all_of_my_ngos_array);
			for($aar=0;$aar<count($all_of_my_ngos_results);$aar++){
			    
			    $all_of_my_ngos_array[] = $all_of_my_ngos_results[$aar]->ngo_id;
			    
			}
			
		    }
		    #all of my ngos (close)
		    
		    #update (open)
		    if(in_array($edit_ngo,$all_of_my_ngos_array) OR $edit_ngo == 0){
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_ngo_id' => $edit_ngo
				),
				array( //location of updated content
					'task_id' => $get_id
				),
				array( //format of updated content
					'%s'
				),
				array( //format of location of updated content
					'%s'
				    ));
		    }
		    #update (close)
		    
		}
		#ngo (close)
		
		#expected duration (open)
		if(1==1){
		    
		    $edit_expected_duration = $_POST['edit_expected_duration'];
		    
		    #function-sanitize-text.php (open)
		    if(1==1){
		      $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
		      $function_sanitize_text__text = $edit_expected_duration;
		      include('#function-sanitize-text.php');
		      $edit_expected_duration = $function_sanitize_text__text_sanitized;
		    }
		    #function-sanitize-text.php (close)
		    
		    #update (open)
		    if(1==1){
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_expected_duration' => $edit_expected_duration
				),
				array( //location of updated content
					'task_id' => $get_id
				),
				array( //format of updated content
					'%s'
				),
				array( //format of location of updated content
					'%s'
				    ));
		    }
		    #update (close)
		    
		}
		#expected duration (close)
		
		#deadlines (open)
		if(1==1){
		    
		    #preparation (open)
		    if(1==1){
			
			if(!empty($_POST['edit_completion_deadline'])){
			    $date = DateTime::createFromFormat('l, d. F Y', $_POST['edit_completion_deadline']);
			    $edit_completion_deadline = $date->format("Y-m-d H:i:s");
			}
			
			if(!empty($_POST['edit_assignment_deadline'])){
			    $date = DateTime::createFromFormat('l, d. F Y', $_POST['edit_assignment_deadline']);
			    $edit_assignment_deadline = $date->format("Y-m-d H:i:s");
			}
			
		    }
		    #preparation (close)
		    
		    #update (open)
		    if(1==1){
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_deadline' => $edit_completion_deadline,
					'task_assignment_deadline' => $edit_assignment_deadline
				),
				array( //location of updated content
					'task_id' => $get_id
				),
				array( //format of updated content
					'%s','%s'
				),
				array( //format of location of updated content
					'%s'
				    ));
		    }
		    #update (close)
		    
		}
		#deadlines (close)
		
		#ready_for_publication_check (open)
		if(1==1){
		    
		    if($_POST['ready_for_publication_check'] == "ready for publication"){
			$ready_for_publication = "ready for publication";
		    }else{
			unset($ready_for_publication);
		    }
		    
		    #update (open)
		    if(1==1){
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_ready_for_publication' => $ready_for_publication
				),
				array( //location of updated content
					'task_id' => $get_id
				),
				array( //format of updated content
					'%s'
				),
				array( //format of location of updated content
					'%s'
				    ));
		    }
		    #update (close)
		    
		}
		#ready_for_publication_check (close)
		
		#publish task -> task status (open)
		if($_POST['save_only_or_save_and_close_or_publish_and_save_edit_mode'] == "save_and_publish_edit_mode"){
		    
		    #update (open)
		    if(1==1){
			$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_items_tasks',
				array( //updated content
					'task_status' => "unassigned",
					'task_date_published' => date("Y-m-d H:i:s")
				),
				array( //location of updated content
					'task_id' => $get_id,
					'task_status' => "draft"
				),
				array( //format of updated content
					'%s','%s'
				),
				array( //format of location of updated content
					'%s','%s'
				    ));
		    }
		    #update (close)
		    
		}
		#publish task -> task status (close)
		
		#redirects (open)
		if(1==1){
		    
		    #redirect to non-edit mode (open) #dome needs checking since i changed the task creation method
		    if($_POST['save_only_or_save_and_close_or_publish_and_save_edit_mode'] == "save_and_close_edit_mode"){
				
				#function-redirect.php (v1.0) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Redirects to another page. Prevents further loading of content.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_redirect['redirect_url'] = get_permalink().'?type=task&id='.$get_id; // url to redirect to. If none is given, homepage is used.
						
					}
					#input (close)
					
					include('#function-redirect.php');
					
					#no output
					
				}
				#function-redirect.php (v1.0) (close)
				
		    }
		    #redirect to non-edit mode (close)
		    
		}
		#redirects (close)
		
	    }
	    #update via edit mode (close)
	    
	    #reprocess arm (open)
	    if(2==1){
		
		//this runs whenever there is an update.
		//what it does is: it reruns the entire file, but since the post is deleted, this time there's no update
		//after the entire file is rerun, there's no need to run the rest of this iteration, so all $arm is unset
		
		$post = $_POST; //for developer purposes only, so that I can see what's in the post array
		$_POST = array(); //must be deleted in order not to update twice.
		include('members-net-work-center.php'); //better than redirect pseudofunction, since it's quicker
		unset($arm); //prevents that, after the include, the rest of the file is processed again.
		
	    }
	    #reprocess arm (close)
	    
	}
	#update (close)
	
    }
    #mysql (close)
    
    #style (open)
    if($arm['style'] == "yes"){
	echo '
	<style>';
	    
	    #content divs (open)
	    if(1==1){
		echo '
		.content_div{
		    border-radius:20px;
		    padding:20px;
		    margin-bottom:20px;
		    background-color:#FFEAB9;
		}
		.content_div:hover{
		    background-color:#FFD87D;
		}
		
		.content_div_img{
		    float:right;
		    padding: 0px 0px 10px 10px;
		    margin-top:-6px !important;
		    margin-right:-5px !important;
		}
		
		.content_div label{
		    cursor:pointer;
		}
		';
	    }
	    #content divs (close)
	    
	    #application table (ngo) (open)
	    if($arm['accept_and_reject'] == "yes"){
		
		echo '
		.application_table td{
		    text-align:center;
		    vertical-align:middle;
		}
		
		.uneven{
		    background-color:#fff;
		}
		.even{
		    background-color:#FFF5E0;
		}
		.even:hover, .uneven:hover{
		    background-color:#FFD89D;
		}
		';
		
	    }
	    #application table (ngo) (close)
	    
	    #edit item (open)
	    if($arm['edit_mode'] == "yes"){
		
		echo '
		.edit_cancel, .edit_save{
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
		
		.edit_cancel:hover, .edit_save:hover{
		   background-color: #D6341D !important;
		}'; 
		
	    }
	    #edit item (close)
	    
	echo '
	</style>';
	
	$content_div_img_array = array("50","40");
    }
    #style (close)
    
    #jquery (open)
    if($arm['jquery'] == "yes"){
	
	echo '
	<script>
	    jQuery(document).ready(function(){';
	    
	    #content divs (open)
	    if($arm['content_divs_table'] == "yes"){
		echo '
		jQuery(".content_div_title").click(function(){
		    jQuery(this).parent().find(".content_div_content").slideToggle(300);
		});';
	    }
	    #content divs (close)
	    
	    #options (open)
	    if($arm['options'] == "yes"){ //covered in content
		
		#options for volunteers (open)
		if($arm['options_for_volunteers'] == "yes"){
		    echo '
		    jQuery(".option_volunteer_write_report").click(function(){
			alert("To write a report, please click on ");
		    });
		    
		    ';
		}
		#options for volunteers (close)
		
		#options for ngos (open)
		if($arm['options_for_ngos'] == "yes"){ //covered in content
		    
		    #cancel button (create taskss only dome) (open)
		    if($arm['options_for_ngos_delete_and_go_back'] != "yes"){
			echo '
			jQuery(".edit_cancel").click(function(){
			    
			});';
		    }
		    #cancel button (close)
		    
		    #GROUP: edit task mode (open)
		    if($arm['edit_mode'] == "yes"){
			
			#close (open)
			if(1==1){
			    echo '
			    jQuery(".option_ngo_close").click(function(){
				window.location.replace("'.get_permalink().'?type=task&id='.$task_row->task_id.'");
			    });';
			}
			#close (close)
			
			#save + 'save and close' + 'save and publish' (open)
			if($arm['options_for_ngos_edit_save'] == "yes"
			   OR $arm['options_for_ngos_edit_save_and_close'] == "yes"
			   OR $arm['options_for_ngos_edit_save_and_publish'] == "yes"){
			    
			    #validation check (open)
			    if(1==1){
				
				echo '
				var problem = 0;
				jQuery(".option_ngo_save, .option_ngo_save_and_close, .option_ngo_save_and_publish").click(function(){
				    
				    jQuery(".vbp_items").hide();
				    problem = 0;
				    './*title*/'
				    if(jQuery(".edit_title").val() == ""){
					jQuery(".vbp_title").show();
					problem = 1;
				    }
				    
				    './*short description*/'
				    if(jQuery(".edit_short_description").val() == ""){
					jQuery(".vbp_short_description").show();
					problem = 1;
				    }
				    
				    './*category*/'
				    if(jQuery(".task_category_selection input:checked").length == 0){
					jQuery(".vbp_category").show();
					problem = 1;
				    }
				    
				    './*general description*/'
				    if(jQuery(".edit_general_description").val() == ""){
					jQuery(".vbp_general_description").show();
					problem = 1;
				    }
				    
				    './*specific description*/'
				    if(jQuery(".edit_specific_description").val() == ""){
					jQuery(".vbp_specific_description").show();
					problem = 1;
				    }
				    
				    './*ngo*/'
				    if(jQuery(".edit_ngo").val() == ""){
					jQuery(".vbp_ngo").show();
					problem = 1;
				    }
				    
				    './*expected duration*/'
				    if(jQuery(".edit_expected_duration").val() == ""){
					jQuery(".vbp_expected_duration").show();
					problem = 1;
				    }
				    
				    './*completion deadline*/'
				    if(jQuery(".edit_completion_deadline").val() == ""){
					jQuery(".vbp_completion_deadline").show();
					problem = 1;
				    }
				    
				    './*assignment deadline*/'
				    if(jQuery(".edit_assignment_deadline").val() == ""){
					jQuery(".vbp_assignment_deadline").show();
					problem = 1;
				    }
				    
				});';
				
			    }
			    #validation check (close)
			    
			    #'save and close' only (open)
			    if(1==1){
				echo '
				jQuery(".option_ngo_save_and_close").click(function(){
				    jQuery(".save_only_or_save_and_close_or_publish_and_save_edit_mode").val("save_and_close_edit_mode");
				});';
			    }
			    #'save and close' only (close)
			    
			    #'save and publish' only (open)
			    if(1==1){
				echo '
				jQuery(".option_ngo_save_and_publish").click(function(){
				    jQuery(".confirmation_div").fadeOut(300);
				    
				    if(problem != 0){
					
					jQuery(".validation_before_publication_div").fadeIn(300);
					
				    }else{
					
					jQuery(".save_and_publish_task_preliminary_div").fadeIn(300);
					
				    }
				    
				});
				
				'./*close preliminary div in any case*/'
				jQuery(".save_and_publish_task_preliminary_cancel, .save_and_publish_task_preliminary_confirm").click(function(){
				    jQuery(".save_and_publish_task_preliminary_div").fadeOut(300);
				});
				
				'./*confirmation click*/'
				jQuery(".save_and_publish_task_preliminary_confirm").click(function(){
				    jQuery(".save_only_or_save_and_close_or_publish_and_save_edit_mode").val("save_and_publish_edit_mode");
				});';
			    }
			    #'save and publish' only (close)
			    
			    echo '
			    jQuery(".option_ngo_save, .option_ngo_save_and_close, .save_and_publish_task_preliminary_confirm").click(function(){
				jQuery(".loading_img_middle_page").show();
				
				'./*publication ready check: passing information to mysql database*/'
				if(problem == 0){
				    jQuery(".ready_for_publication_check").val("ready for publication");
				}
				
				'./*general and specific description files*/'
				    jQuery(".edit_delete_files").val(jQuery(".function_file_icons_deleted_files_ids").html());
				
				jQuery(".edit_task_form").submit();
			    });';
			    
			}
			#save + 'save and close' + 'save and publish' (close)
			
		    }
		    #GROUP: edit task mode (close)
		    
		    #publish (open)
		    if($arm['options_for_ngos_publish'] == "yes"){ //covered in content
			
			echo '
			
			jQuery(".option_ngo_publish").click(function(){
			    jQuery(".confirmation_div").fadeOut(300);
			    
			    jQuery(".publish_task_preliminary_div").fadeIn(300);
			    
			});
			
			jQuery(".publish_task_preliminary_cancel, .publish_task_preliminary_confirm").click(function(){
			    jQuery(".publish_task_preliminary_div").fadeOut(300);
			});
			
			jQuery(".publish_task_preliminary_confirm").click(function(){
			    jQuery(".publish_task_form").submit();
			    jQuery(".loading_img_middle_page").show();
			});';
			
		    }
		    #publish (close)
		    
		    #copy (open)
		    if($arm['options_for_ngos_copy'] == "yes"){ //covered in content
			
			    echo '
			    jQuery(".option_ngo_copy").click(function(){
				jQuery(".confirmation_div").fadeOut(300);
				jQuery(".copy_task_preliminary_div").fadeIn(300);
			    });
			    
			    jQuery(".copy_task_preliminary_cancel, .copy_task_preliminary_confirm").click(function(){
				jQuery(".copy_task_preliminary_div").fadeOut(300);
			    });
			    
			    jQuery(".copy_task_preliminary_confirm").click(function(){
				jQuery(".copy_task_form").submit();
				jQuery(".loading_img_middle_page").show();
			    });';
			
		    }
		    #copy (close)
		    
		    #complete (open)
		    if($arm['options_for_ngos_complete'] == "yes"){ //covered in content
			
			    echo '
			    jQuery(".option_ngo_complete").click(function(){
				jQuery(".confirmation_div").fadeOut(300);
				jQuery(".complete_task_preliminary_div").fadeIn(300);
			    });
			    
			    jQuery(".complete_task_preliminary_cancel, .complete_task_preliminary_confirm").click(function(){
				jQuery(".complete_task_preliminary_div").fadeOut(300);
			    });
			    
			    jQuery(".complete_task_preliminary_confirm").click(function(){
				jQuery(".complete_task_form").submit();
				jQuery(".loading_img_middle_page").show();
			    });';
			
		    }
		    #complete (close)
		    
		    #cancel (open)
		    if($arm['options_for_ngos_cancel'] == "yes"){ //covered in content
			
			    echo '
			    jQuery(".option_ngo_cancel").click(function(){
				jQuery(".confirmation_div").fadeOut(300);
				jQuery(".cancel_task_preliminary_div").fadeIn(300);
			    });
			    
			    jQuery(".cancel_task_preliminary_cancel, .cancel_task_preliminary_confirm").click(function(){
				jQuery(".cancel_task_preliminary_div").fadeOut(300);
			    });
			    
			    jQuery(".cancel_task_preliminary_confirm").click(function(){
				jQuery(".loading_img_middle_page").show();
				jQuery(".cancel_task_form").submit();
			    });';
			
		    }
		    #cancel (close)
		    
		    #delete (open)
		    if($arm['options_for_ngos_delete'] == "yes"){ //covered in content
			
			    echo '
			    jQuery(".option_ngo_delete").click(function(){
				jQuery(".confirmation_div").fadeOut(300);
				jQuery(".delete_task_preliminary_div").fadeIn(300);
			    });
			    
			    jQuery(".delete_task_preliminary_cancel, .cancel_task_preliminary_confirm").click(function(){
				jQuery(".delete_task_preliminary_div").fadeOut(300);
			    });
			    
			    jQuery(".delete_task_preliminary_confirm").click(function(){
				jQuery(".delete_task_form").submit();
				jQuery(".loading_img_middle_page").show();
			    });';
			
		    }
		    #delete (close)
		    
		    #delete and go to work center (open)
		    if($arm['options_for_ngos_delete_and_go_back'] == "yes"){ //covered in content
			
			    echo '
			    jQuery(".option_ngo_delete_and_go_back").click(function(){
				jQuery(".confirmation_div").fadeOut(300);
				jQuery(".delete_task_and_go_back_preliminary_div").fadeIn(300);
			    });
			    
			    jQuery(".delete_task_and_go_back_preliminary_cancel, .delete_task_and_go_back_preliminary_confirm").click(function(){
				jQuery(".delete_task_and_go_back_preliminary_div").fadeOut(300);
			    });
			    
			    jQuery(".delete_task_and_go_back_preliminary_confirm, .edit_cancel").click(function(){
				jQuery(".loading_img_middle_page").show();
				window.location.replace("'.get_permalink().'");
			    });';
			
		    }
		    #delete and go to work center (close)
		    
		}
		#options for ngos (close)
		
	    }
	    #options (close)
	    
	    #applications (open)
	    if(1==1){
		
		#for ngos (open)
		if($arm['accept_and_reject'] == "yes"){
		    
		    #accept reject button hover visuals (open)
		    if(1==1){
			echo '
			jQuery(".application_link_accept").hover(function(){
			    jQuery(".application_link_reject_preliminary").not('.
				'jQuery(this).parent().parent().parent().find(".application_link_reject_preliminary")'.
			    ').css("background-color","#D6341D");
			},function(){
			    jQuery(".application_link_reject_preliminary").css("background-color","");
			});
			 ';
		    }
		    #accept reject button hover visuals (close)
		    
		    #accept (open)
		    if(1==1){
			
			#toggle application text (ngos) (open)
			if(1==1){
			    echo '
			    jQuery(".toggle_application_text_button").click(function(){
				jQuery(this).parent().find(".toggle_application_text_button").slideToggle(300);
				jQuery(this).parent().parent().parent().find(".toggle_application_text").slideToggle(300);
			    });';
			}
			#toggle application text (ngos) (close)
			
			#application acceptance div (open)
			if(1==1){
			    
			    echo '
			    jQuery(".application_link_accept").click(function(){
				if(jQuery(this).parent().parent().parent().find(".application_active").html() == 1){';
				    
				    #transfer data from hidden field to div (open)
				    if(1==1){
					echo '
					jQuery(".accept_application_name").html(
					    jQuery(this).parent().parent().find(".applicant_name").html()
					);
					jQuery(".accept_application_country").html(
					    jQuery(this).parent().parent().find(".applicant_country").html()
					);
					jQuery(".accept_application_img").html(
					    jQuery(this).parent().parent().find(".applicant_img").html()
					);
					jQuery(".accept_application_text").html(
					    jQuery(this).parent().parent().find(".applicant_text").html()
					);
					jQuery(".textarea_preparation2").html(
					    jQuery(this).parent().parent().find(".applicant_textarea_preparation").html()
					);
					jQuery(".accept_application_id").val(
					    jQuery(this).parent().parent().find(".application_id").html()
					);';
				    }
				    #transfer data from hidden field to div (close)
				    
				    echo '
				    jQuery(".application_acceptance_div").show();
				}
			    });';
			    
			}
			#application acceptance div (close)
			
			#submit form (open)
			if(1==1){
			    
			    echo '
			    jQuery(".application_acceptance_div_button").click(function(){
				jQuery(".application_acceptance_div").hide();
				jQuery(".loading_img_middle_page").show();
				jQuery(".application_accept_form").submit();
			    });';
			    
			}
			#submit form (close)
			
		    }
		    #accept (close)
		    
		    #reject (open)
		    if(1==1){
			
			#reject application click (open)
			if(1==1){
			    echo '
			    jQuery(".application_link_reject_preliminary").click(function(){
				jQuery(this).parent().parent().parent().find(".application_link_reject_preliminary_div").fadeIn(300);
			    });
			    
			    jQuery(".application_link_reject_cancel, .application_link_reject").click(function(){
				jQuery(this).parent().parent().parent().find(".application_link_reject_preliminary_div").fadeOut(300);
			    });
			    
			    jQuery(".application_link_reject").click(function(){
				if(jQuery(this).parent().parent().parent().find(".application_active").html() == 1){
				    jQuery(".loading_img_middle_page").fadeIn(300);
				    
				    jQuery(".mysql_load_area").'.
					'load("'.get_permalink(688).'?type=task'.
					    '&id='.$task_row->task_id.
					    '&reject_application_code="+jQuery(this).parent().parent().parent().find(".application_code").html()+" '.
					'.mysql_visible_area", function() {
					    jQuery(this).hide(0,function(){
						jQuery(this).show(0);
					    });
					    jQuery(".loading_img_middle_page").fadeOut(300);
				    });
				    
				    jQuery(this).parent().parent().parent().fadeOut(1000);
				    jQuery(this).parent().parent().parent().find(".application_active").html("0");
				}
			    });';
			}
			#reject application click (close)
			
		    }
		    #reject (close)
		    
		}
		#for ngos (close)
		
		#volunteers (open)
		if($arm['apply'] == "yes"){
		    
		    echo '
		    jQuery(".apply_for_task_submit").click(function(){
			jQuery(".apply_for_task_text").val(jQuery(".apply_for_task_text_prelim").val());
			jQuery(".apply_for_task_form").submit();
		    });
		    ';
		    
		}
		#volunteers (close)
		
		#volunteers (open)
		if($arm['already_applied'] == "yes"){
		    
		    echo '
		    jQuery(".withdraw_task_application_submit").click(function(){
			jQuery(".withdraw_task_application_form").submit();
		    });
		    ';
		    
		}
		#volunteers (close)
		
	    }
	    #application (close)
	    
	    #task type (open)
	    if($arm['edit_mode'] == "yes"){
		
		echo '
		jQuery(".tasktype_subtitle").click(function(){
		    jQuery(this).closest(".tasktype_subsection").find(".tasktype_subcontent").toggle();
		});';
		
	    }
	    #task type (close)
	    
	    $show_ratings_popup = 'yes';#dome
	    #ratings (open)
	    if($show_ratings_popup == 'yes' AND $arm['ratings'] == "yes"){
		
		echo '
		jQuery(".please_rate_task_popup_hide").click(function(){
		    jQuery(".please_rate_task_popup").fadeOut(150);
		});
		';
		
	    }
	    #ratings (close)
	    
	    #progress_reports (open)
	    if($arm['progress_reports'] == "yes"){
		
		#submit report (open)
		if(1==1){
		    
		    echo '
		    jQuery(".submit_task_report").click(function(){
			jQuery(".task_report_form").submit();
		    });
			
		    ';
		    
		}
		#submit report (close)
		
		#pagination (open) #dome wth is this?
		if(count($progress_reports_results) > $task_reports_per_page){
		    
		    echo '
		    
		    var ProgressReportPagesSum = '.ceil(count($progress_reports_results)/$task_reports_per_page).';
		    var ProgressReportPagesCounter = 1;
		    
		    jQuery(".task_report_next_page").click(function(){
			if(ProgressReportPagesCounter < ProgressReportPagesSum){
			    jQuery(".task_report_page:visible").fadeOut(150,function(){
				jQuery(this).next(".task_report_page:lt('.$task_reports_per_page.')").fadeIn(150);
				ProgressReportPagesCounter++;
				jQuery(".progress_report_page_count").html(ProgressReportPagesCounter);
				if(ProgressReportPagesCounter == 2){
				    jQuery(".task_report_previous_page").toggleClass("voluno_button_inactive voluno_button");
				}else if(ProgressReportPagesCounter == ProgressReportPagesSum){
				    jQuery(".task_report_next_page").toggleClass("voluno_button_inactive voluno_button");
				}
			    });
			}
		    });
		    jQuery(".task_report_previous_page").click(function(){
			if(ProgressReportPagesCounter > 1){
			    jQuery(".task_report_page:visible").fadeOut(150,function(){
				jQuery(this).prev(".task_report_page:lt('.$task_reports_per_page.')").fadeIn(150);
				ProgressReportPagesCounter--;
				jQuery(".progress_report_page_count").html(ProgressReportPagesCounter);
				if(ProgressReportPagesCounter + 1 == ProgressReportPagesSum){
				    jQuery(".task_report_next_page").toggleClass("voluno_button_inactive voluno_button");
				}else if(ProgressReportPagesCounter == 1){
				    jQuery(".task_report_previous_page").toggleClass("voluno_button_inactive voluno_button");
				}
			    });
			}
		    });
		    ';
		    
		}
		#pagination (close)
		
	    }
	    #progress_reports (close)
	    
	    #edit mode (open)
	    if($arm['edit_mode'] == "yes"){
		
		#datepicker (open)
		if(1==1){
		    
		    echo '
		    jQuery(".edit_completion_deadline").datepicker({
			dateFormat: "DD, dd. MM yy",
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			minDate:+1,
			maxDate:"+1y",
			onClose: function( selectedDate ) {
			    jQuery(".edit_assignment_deadline").datepicker("option","maxDate",selectedDate );
			}
		    });
		    
		    jQuery(".edit_assignment_deadline").datepicker({
			dateFormat: "DD, dd. MM yy",
			showOtherMonths: true,
			selectOtherMonths: true,
			changeMonth: true,
			changeYear: true,
			minDate:+1,
			maxDate:"+1y",
			onClose: function( selectedDate ) {
			    jQuery(".edit_completion_deadline").datepicker("option","minDate",selectedDate );
			}
		    });
		    
		    ';
		    
		}
		#datepicker (close)
		
		#edit mode jquery validation (open)
		if(1==1){
		    
		    $validation_max_length_array = array(
			array(
			    "name" 		=> "title",
			    "value" 		=> 100,
			    "text_before_value" => "You have reached the character limit of ",
			    "text_after_value" 	=> ". If you want to add more information, please do so in the description fields below.",
			    "text_input_class"	=> "edit_title",
			    "span_or_div"	=> "div",
			    "type"		=> "text field"
			),
			array(
			    "name" 		=> "short_description",
			    "value" 		=> 500,
			    "text_before_value" => "You have reached the character limit of ",
			    "text_after_value" 	=> ". If you want to add more information, please do so in the detailed description fields below.",
			    "text_input_class"	=> "edit_short_description",
			    "span_or_div"	=> "div",
			    "type"		=> "text field"
			),
			array(
			    "name" 		=> "general_description",
			    "value" 		=> 5000,
			    "text_before_value" => "You have reached the character limit of ",
			    "text_after_value" 	=> ". If you want to add more information, please attach a text file.",
			    "text_input_class"	=> "edit_general_description",
			    "span_or_div"	=> "div",
			    "type"		=> "text field"
			),
			array(
			    "name" 		=> "specific_description",
			    "value" 		=> 5000,
			    "text_before_value" => "You have reached the character limit of ",
			    "text_after_value" 	=> ". If you want to add more information, please attach a text file.",
			    "text_input_class"	=> "edit_specific_description",
			    "span_or_div"	=> "div",
			    "type"		=> "text field"
			)
			
		    );
		    
		    //1 --> $validation__character_limit__title. add this to maxlength="'.$validation__character_limit__general_description.'"
		    //2 --> $validation__max_characters_divspan__general_description
		    
		    #execution (open)
		    if(1==1){
			
			$warning_class_name = "number_of_characters__"; //e.g. number_of_characters__title
			
			for($aaw=0;$aaw<count($validation_max_length_array);$aaw++){
			    
			    if($validation_max_length_array[$aaw]['span_or_div'] == "span"){
				$span_or_div = "span";
			    }else{
				$span_or_div = "div";
			    }
			    
			    //character limit span. add this variable below the textfield
			    ${"validation__max_characters_divspan__".$validation_max_length_array[$aaw]['name']} =
				'<'.$span_or_div.' style="color:#F86A00;" class="'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'">
				</'.$span_or_div.'>';
			    
			    #max text lenght (open)
			    if($validation_max_length_array[$aaw]['type'] == "text field"){
				
				//maxlenght variable.
				${"validation__character_limit__".$validation_max_length_array[$aaw]['name']}
				    = $validation_max_length_array[$aaw]['value'];
				
				echo '
				jQuery(".'.$validation_max_length_array[$aaw]['text_input_class'].'").keyup(function(){
				    jQuery(".'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'").fadeIn(300);
				    var max = '.$validation_max_length_array[$aaw]['value'].';
				    var len = jQuery(this).val().length;
				    if(len >= max) {
					jQuery(".'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'").'.
					    'html("'.$validation_max_length_array[$aaw]['text_before_value'].
						$validation_max_length_array[$aaw]['value'].
						$validation_max_length_array[$aaw]['text_after_value'].'");
				    }else{
					var char_left = max - len;
					jQuery(".'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'")'.
					    '.html(char_left + " of " + max + " characters left.");
				    }
				});';
				
			    }
			    #max text lenght (close)
			    
			    #
			    elseif($validation_max_length_array[$aaw]['type'] == "checkbox"){}
				
				
				
			    #}
			    #
			    
			}
			
		    }
		    #execution (close)
		    
		}
		#edit mode jquery validation (close)
	    
	    }
	    #edit mode (close)
	    
	    echo '
	    });
	</script>';
	
    }
    #jquery (close)
    
    #content (open)
    if($arm['content'] == "yes"){
	
	#forms (open)
	if(1==1){
	    
	    #withdraw application form (open)
	    if($arm['already_applied'] == "yes"){
		
		echo '
		<form class="withdraw_task_application_form" method="post" action="'.get_permalink().'?type=task&id='.$get_id.'">
		    <input type="hidden" value="1" name="withdraw_task_application_activate">
		</form>';
		
	    }
	    #withdraw application form (close)
	    
	    #application form (open)
	    if($arm['apply'] == "yes"){
		
		echo '
		<div style="display:none;">
		    <form class="apply_for_task_form" method="post" action="'.get_permalink().'?type=task&id='.$get_id.'">
			<textarea
			    class="apply_for_task_text"
			    name="apply_for_task_text"
			>'.
			'</textarea>
		    </form>
		</div>';
		
	    }
	    #application form (close)
	    
	    #edit form open (open)
	    if($arm['edit_mode'] == "yes"){
		echo '
		<form
		    method="post"
		    action="'.get_permalink().'?type=task&id='.$get_id_old.'&edit_task=1"
		    enctype="multipart/form-data"
		    class="edit_task_form"
		    autocomplete="off"
		>
		    <input type="hidden" value="yes" name="activate_mysql_update_in_edit_mode">
		    <input
			type="hidden"
			value="save_only"
			name="save_only_or_save_and_close_or_publish_and_save_edit_mode"
			class="save_only_or_save_and_close_or_publish_and_save_edit_mode">
		    <input type="hidden" name="edit_delete_files" class="edit_delete_files">
		    <input type="hidden" name="ready_for_publication_check" class="ready_for_publication_check">
		';
	    }
	    #edit form open (close)
	    
	}
	#forms (close)
	
	#breadcrums, img, title, short description (open)
	if($arm['breadcrums_img_title_short_description'] == "yes"){
	    
	    #breadcrums and img (open)
	    if($arm['breadcrums_and_img'] == "yes"){
			
			#img (open)
			if($arm['img'] == "yes"){
				
				#function-image-processing
				#thematic only
				  $function_propic__type = "thematic";
				  $function_propic__original_img_name = "tasks.jpg";
				   #all
				 $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
				   include('#function-image-processing.php');
				
				echo '
				<img src="'.$function_propic.'" class="voluno_header_picture">';
			
			}
			#img (close)
			
			#breadcrums (open)
			if($arm['breadcrums'] == "yes"){
				
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
									'text' => 'Go to Work Center',
									'link' => get_permalink()
								]
							]
						];
						// Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
						
					}
					#input (close)
					
					include('#function-breadcrums.php');
					
					#output (open)
					if(1==1){
						
						echo $function_breadcrums['breadcrums']; // Output variable.
						
					}
					#output (close)
					
				}
				#function-breadcrums.php (v3.0) (close)
				
			}
			#breadcrums (close)
			
	    }
	    #breadcrums and img (close)
	    
	    #title (open)
	    if($arm['title'] == "yes"){
		
		#preparation (open)
		if(1==1){
		    
		    $task_status_for_title_array = array(    #mysql (not used, only to get a better overview)
									    #for display
						    array(   "draft",       "draft"),
						    array(   "unassigned",  "waiting for volunteers"),
						    array(   "in progress", "in progress"),
						    array(   "completed",   "completed"),
						    array(   "cancelled",   "cancelled"),
						    array(   "deleted",     "deleted")
							 );
		    
		    $task_status_for_title_num = array_search($task_row->task_status,$task_status_for_title_array);
		    
		}
		#preparation (close)
		
		echo '
		<div style="text-align:center;width:590px;">
		    <h4 style="display:inline;font-weight:bold;">
			Task ('.$task_status_for_title_array[$task_status_number-1][1].'):
		    </h4>
		    <br>';
		    
		    #non-edit (open)
		    if($arm['edit_mode'] != "yes"){
			echo '
			<h1 style="display:inline;">';
			    if(empty($task_row->task_name)){
				echo '
				<span style="color:red;font-style:italic;">
				    Please add a title.
				</span>';
			    }else{
				echo
				$task_row->task_name;
			    }
			echo '
			</h1>';
		    }
		    #non-edit (close)
		    
		    #edit (open)
		    if($arm['edit_mode'] == "yes"){
			
			#preparation (open)
			if(1==1){
			    
			    #help word (open)
			    if(1==1){
				#function-help-word.php
				    $function_help_word_hover_link = "Task title:"; //1, 2 or 3, obligatory
				    $function_help_word_variable_only = "yes";
				    $function_help_word_help_content = '
					<b>What is the shortest possible description of the task?</b>
					<p>
					    Please describe the task using keywords.
					</p>
					<br>
					<ul>
					    <li>
						<b>Please avoid including content related titles or shorten them</b>
						<p>Positive example:
						<ul>
						    <li style="list-style-type:none;">
							<i>&quot;Proof-read report&quot;</i>
							<i>&quot;Proof-read report (agriculture + climate change)&quot;</i>
						    </li>
						</ul>
						Negative example:
						<ul>
						    <li style="list-style-type:none;">
							<i>&quot;Proof-read report on the detrimental effects of climate
							change on the agricultural
							productivity of small scale farmers in the Delta Region&quot;</i>
						    </li>
						</ul>
						Note: Instead, provide the title in the description (next field).</p><br>
					    </li>
					    <li>
						<b>Focus on main activities</b><br>
						<p>Additional sub-tasks can be mentioned in the description.</p><br>
					    </li>
					</ul>';
				    include('#function-help-word.php');
			    }
			    #help word (close)
			    
			}
			#preparation (close)
			
			#menu (open)
			if(1==1){
			    echo '
			    <div class="show_this_in_edit_mode">
				<span style="font-weight:bold;">
				    '.$function_help_word.'
				</span>
				<input
				    style="width:350px;"
				    type="text"
				    name="edit_title"
				    class="edit_title"
				    placeholder="Example: &quot;Create flyer&quot;"
				    value="'.$task_row->task_name.'"
				    maxlength="'.$validation__character_limit__title.'"
				>
				'.$validation__max_characters_divspan__title.'
			    </div>';
			}
			#menu (close)
			
		    }
		    #edit (close)
		    
		echo '
		</div>';
	    }
	    #title (close)
	    
	    #short description (open)
	    if($arm['short_description'] == "yes"){
		echo '
		<div style="margin:20px 0px;width:600px;">';
		    
		    #non-edit (open)
		    if($arm['edit_mode'] != "yes"){
			echo '
			<p>';
			    if(empty($task_row->task_description)){
				echo '
				<span style="color:red;font-style:italic;font-weight:bold;">
				    Please add a short description.
				</span>';
			    }else{
				echo '
				<strong>
				    Short description:
				</strong>
				<br>
				'.$task_row->task_description;
			    }
			echo '
			</p>';
		    }
		    #non-edit (close)
		    
		    #edit (open)
		    if($arm['edit_mode'] == "yes"){
			
			#preparation (open)
			if(1==1){
			    
			    #help word (open)
			    if(1==1){
				
				#function-help-word.php
				    $function_help_word_hover_link = "Description:"; //1, 2 or 3, obligatory
				    $function_help_word_variable_only = "yes";
				    $function_help_word_help_content = '
					<b>What is the task about?</b>
					<p>Please describe the task in one or two sentences. Additionally, you
					can provide useful information about the task.
					This could help volunteers to decide:</p><br>
					<ul>
					    <li>
						<b>Whether they are truely capable of completing the task.</b><br>
						Is there an additional skill required? E.g. social skills,
						software knowledge, etc.<br>
						Note: The requirements can be chosen below. This field is just
						for possible further requirements, not
						listed below.<br><br>
					    </li>
					    <li>
						<b>Whether they are truely willing to complete the task</b><br>
						Inform about both the costs and benefits of working on this task.<br>
						If the task is very frustrating, volunteers should know what they
						are getting into. This reduces
						the risk that they underestimate the effort, become frustrated and
						and give up without completing the task.<br>
						On the other hand, if the task offers a lot to learn or deals with
						an interesting topic, volunteers might be more willing to work on it,
						even if the type of task is not their top preference.
					    </li>
					</ul>';
				    include('#function-help-word.php');
				    
			    }
			    #help word (close)
			    
			}
			#preparation (close)
			
			#menu (open)
			if(1==1){
			    echo '
			    <div class="show_this_in_edit_mode">
				<div style="font-weight:bold;">
				    '.$function_help_word.'
				</div>
				<textarea
				    style="width:580px;resize: vertical;"
				    class="edit_short_description"
				    name="edit_short_description"
				    maxlength="'.$validation__character_limit__short_description.'"
				    placeholder="Please describe the task. Example: &quot;Create a flyer that briefly'.
						' introduces our organization and gives and overview of our current projects.&quot;"
				>'.
				    $task_row->task_description.
				'</textarea>
				'.$validation__max_characters_divspan__short_description;
				
				
				echo '
				<div style="margin:20px;text-align:center;">
				    <div class="voluno_button option_ngo_close" style="display:inline;margin:10px;">
					Cancel
				    </div>
				    <div class="voluno_button option_ngo_save" style="display:inline;margin:10px;">
					Save
				    </div>
				    <div class="voluno_button option_ngo_save_and_close" style="display:inline;margin:10px;">
					Save and close
				    </div>
				</div>
				
				
			    </div>';
			}
			#menu (close)
			
		    }
		    #edit (close)
		    
		echo '
		</div>';
		
	    }
	    #short description (close)
	    
	}
	#breadcrums, img, title, short description (close)
	
	#content divs table 1/3 (open)
	if($arm['content_divs_table'] == "yes"){
	    echo '
	    <table>
		<tr>
		    <td style="width:70%;padding-right:20px;">';
	}
	#content divs table 1/3 (close)
	    
	    #left side content divs (open)
	    if($arm['left_side_content_divs'] == "yes"){
		
		#ratings (open) #modified
		if($arm['ratings'] == "yes"){/*
		    
		    #function-fixed-div.php type 2 (v1.0) (open)
		    if($show_ratings_popup == 'yes'){
			
			$function_fixed_div['class_name'] = 'please_rate_task_popup'; //optional, only needed if you want to use this
			$function_fixed_div['title'] = 'Task completed';
			$function_fixed_div['text'] = '
			    The task has been marked as completed.
			    <br>
			    Now, please rate the performance of the assigned volunteer:
			    <div style="text-align:center;">
				'.$assigned_volunteer_row->usersext_displayName.'.
			    </div>
			    Your ratings help us provide quality services other Voluno members.
			    <div style="text-align:center;padding:5px;">
				<a href="'.get_permalink(806).'" style="color:#fff;">
				    <div class="voluno_button">
					Rate this task
				    </div>
				</a>
				<div class="voluno_button please_rate_task_popup_hide">
				    Not now
				</div>
			    </div>';
			$function_fixed_div['text_text_align'] = "center"; //default:justify
			$function_fixed_div['dark_bg_div'] = "yes"; //default: no
			$function_fixed_div['hide_button_text'] = "none"; //default: Hide, 'none' hides it
			$function_fixed_div['width'] = 300; //default:250 (px)
			#$function_fixed_div['hide_after_x_milliseconds'] = 2000; //default: empty, don't fade out
			
			$function_fixed_div__version = 2; //obligatory
			include('#function-fixed-div.php');
			echo $function_fixed_div;
			
			#automatically fades in itself and fadesout the load img
			
		    }
		    #function-fixed-div.php type 2 (v1.0) (close)		
		    
		    #preparation (open)
		    if(1==1){
			
			#image processing (open)
			if(1==1){
			    #function-image-processing
				#thematic only
				    $function_propic__type = "thematic";
				    $function_propic__original_img_name = "task_progress.png";
				#all
				    $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				$content_div_img = $function_propic;
			}
			#image processing (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div">';
			    
			    #title and img (open)
			    if(1==1){
				echo '
				<img src="'.$content_div_img.'" class="content_div_img">
				<h5 class="content_div_title" style="display:inline;">
				    <a style="cursor:pointer;">
					Please give your rating
				    </a>
				</h5>';
			    }
			    #title and img (close)
			    
			    #text (open)
			    if(1==1){
				echo '
				<div class="content_div_content">';
				    
				    $function_ratings['url'] = get_permalink().'?type=task&id='.$task_row->task_id; //default: get_permalink();
				    $function_ratings['mysql_where_and_argument']
					= 'rating_type_general = "task" AND rating_type_general_id = '.$task_row->task_id;
					//e.g.: "mysql_variable = 444 AND mysql_var2 = 3"
				    include('#function-ratings.php');
				    echo $function_ratings;
				    
				echo '
				</div>';
			    }
			    #text (close)
			    
			echo '
			</div>';
		    }
		    #content (close)*/
		}
		#ratings (close) #modified
		
		#progress reports [mysql] [->content] (open)
		if($arm['progress_reports'] == "yes"){
		    
		    #preparation (open)
		    if(1==1){
			
			#show/hide on load (open)
			if($arm['progress_reports_hide_on_load'] == "yes"){
			    $content_div_content_hide = 'display:none;';
			}else{
			    unset($content_div_content_hide);
			}
			#show/hide on load (close)
			
			#image processing (open)
			if(1==1){
			    #function-image-processing
				#thematic only
				  $function_propic__type = "thematic";
				  $function_propic__original_img_name = "task_progress.png";
			       #all
				 $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
			       include('#function-image-processing.php');
			       $content_div_img = $function_propic;
			}
			#image processing (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div" id="content_div_progress_report">';
			    
			    #title and img (open)
			    if(1==1){
				echo '
				<img src="'.$content_div_img.'" class="content_div_img">
				<h5 class="content_div_title" style="display:inline;">
				    <a style="cursor:pointer;">
					Progress reports ('.count($progress_reports_results).')
					'.
					#dome
					#<span style="color:red;">Temporarily disabled due to technical errors. Will work on this tomorrow 2.3.2016</span>
					'
				    </a>
				</h5>';
			    }
			    #title and img (close)
			    
			    #text (open)
			    if(1==1){
				echo '
				<div class="content_div_content" style="'.$content_div_content_hide.'">';
				    
				    #div and table, open (open)
				    if(1==1){
					echo '
					<div
					    style="
						border-radius:25px;
						padding:10px;
						margin-bottom:10px;
					    "
					>
					    <table>';
				    }
				    #div and table, open (close)
					
					#if no progress reports yet (open)
					if(empty($progress_reports_results)){
					    echo '
					    <tr>
						<td>
						    There are no progress reports yet.
						</td>
					    </tr>';
					}
					#if no progress reports yet (close)
					
					#if at least one progress report exists (open)
					else{
					    
					    #outside loop preparation (open)
					    if(1==1){
						
						#pagination: function-image-processing (open)
						if(count($progress_reports_results) > $task_reports_per_page){
						    
						    #thematic only
							$function_propic__type = "thematic";
							$function_propic__original_img_name = "voluno_img_3532.png";
						    #all
							$function_propic__geometry = array(20,15); //optional, if e.g. only width: 300, NULL; vice versa
							$function_propic__rotate = 180;
						    include('#function-image-processing.php');
						    $function_propic_last = $function_propic;
						    
						    #thematic only
							$function_propic__type = "thematic";
							$function_propic__original_img_name = "voluno_img_3532.png";
						    #all
							$function_propic__geometry = array(20,15); //optional, if e.g. only width: 300, NULL; vice versa
						    include('#function-image-processing.php');
						    $function_propic_next = $function_propic;
						    
						}
						#pagination: function-image-processing (close)
						
					    }
					    #outside loop preparation (close)
					    
					    #loop (open)
					    for($four=0;$four<count($progress_reports_results);$four++){
						
						#inside loop preparation (open)
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
									
									$function_profileLink['id'] = $progress_reports_results[$four]->usersext_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
						    
						    #function-image-processing (open)
						    if(1==1){
						       #profile picture
							 $function_propic__type = "profile picture";
							 $function_propic__user_id = $progress_reports_results[$four]->usersext_id;
						       #all
							 $function_propic__geometry = array(60,60);
						       include('#function-image-processing.php');
						       $profile_picture = $function_propic;
						    }
						    #function-image-processing (close)
						    
						    #function-only-first-x-symbols.php (open)
						    if(1==1){
							$function_only_first_x_symbols = $progress_reports_results[$four]->work_tasks_rep_text; #content
							$function_only_first_x_symbols_num = 300; #optional, number of symbols, default is 100
							include('#function-only-first-x-symbols.php');
							#output: $function_only_first_x_symbols
						    }
						    #function-only-first-x-symbols.php (close)
						    
						    #reverse counter (open)
						    if(1==1){
							
							if($four == 0){
							    $progress_report_counter = count($progress_reports_results)+1;
							}
							
							$progress_report_counter--;
							
						    }
						    #reverse counter (close)
						    
						    #function-timezone.php (open)
						    if(1==1){
							
							$function_timezone = $progress_reports_results[$four]->work_tasks_rep_date_created;
							$function_timezone_format = "date (weekday short no_year)"; //default: datetime (weekday long hour min sec)
							//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
							//"date (weekday short)","time (hour min sec)","time (hour min)"
							include('#function-timezone.php');
							#output:
							$function_timezone_date = $function_timezone;
							
							$function_timezone = $progress_reports_results[$four]->work_tasks_rep_date_created;
							$function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
							//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
							//"date (weekday short)","time (hour min sec)","time (hour min)"
							include('#function-timezone.php');
							$function_timezone_time = $function_timezone;
							
							$function_timezone_created = $function_timezone_date.',<br>'.$function_timezone_time;
							
							$function_timezone = $progress_reports_results[$four]->work_tasks_rep_date_created;
							$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
							//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
							//"date (weekday short)","time (hour min sec)","time (hour min)"
							include('#function-timezone.php');
							#output:
							$function_timezone_dif = $function_timezone;
						    
						    }
						    #function-timezone.php (close)
						    
						    #pagination (open)
						    if(count($progress_reports_results) > $task_reports_per_page){
							
							if($four != 0){
							    $task_report_page_activity = ' style="display:none;"';
							}
							
							#in between
							if(($four + 1) % $task_reports_per_page == 0){
							    $open_tbody_for_pagination = 1;
							    $close_tbody_for_pagination = 0;
							}elseif(($four + 2) % $task_reports_per_page == 0){
							    $open_tbody_for_pagination = 0;
							    $close_tbody_for_pagination = 1;
							}else{
							    $open_tbody_for_pagination = 0;
							    $close_tbody_for_pagination = 0;
							}
							
							#start
							if($four == 0){
							    $open_tbody_for_pagination = 1;
							}
							
							#ending
							if($four + 1 == count($progress_reports_results)){
							    $close_tbody_for_pagination = 1;
							}
							
						    }
						    #pagination (close)
						    
						}
						#inside loop preparation (close)
						
						#row (open)
						if(1==1){
						    
						    #pagination 1/2 (open)
						    if($open_tbody_for_pagination == 1){
							echo '
							<tbody class="task_report_page"'.$task_report_page_activity.'>';
						    }
						    #pagination 1/2 (close)
						    
							echo '
							<tr>';
							    
							    #name and image (open)
							    if(1==1){
								echo '
								<td style="width:80px;padding-bottom:20px;">
								    '.$function_profileLink['name_link'].'
								    <br>
								    <a
									href="'.$function_profileLink['link'].'"
									title="'.$function_profileLink['link_title'].'"
								    >
									<img
									    class="opacity_on_hover"
									    src="'.$profile_picture.'"
									    style="border-radius:10px;border:1px solid black;margin-top:10px;"
									>
								    </a>
								</td>';
							    }
							    #name and image (close)
							    
							    #progress report text (open)
							    if(1==1){
								echo '
								<td style="text-align:justify;padding-bottom:20px;">
								    <p>
									'.$function_only_first_x_symbols.'
								    </p>
								    <br>
								    '.$file_icons_array[$four].'
								</td>';
							    }
							    #progress report text (close)
							    
							    #progress report stats (open)
							    if(1==1){
								echo '
								<td style="width:90px;text-align:right;">
								    <div style="font-weight:bold;font-style:italic;">
									Report #
									'.$progress_report_counter.'
								    </div>
								    <br>
								    '.$function_timezone_date.'
								    <br>
								    '.$function_timezone_time.'
								    <br>
								    ('.$function_timezone_dif.')
								</td>';
							    }
							    #progress report stats (close)
							    
							echo '
							</tr>';
							
						    #pagination 2/2 (open)
						    if($close_tbody_for_pagination == 1){
							echo '
							</tbody>';
						    }
						    #pagination 2/2 (close)
						    
						}
						#row (close)
						
					    }
					    #loop (close)
					    
					    #pagination (open)
					    if(count($progress_reports_results) > $task_reports_per_page){
						echo '
						<tr>
						    <td colspan="3" style="text-align:center;">
							<div
							    style="width:100px;padding:5px;display:inline-block;font-weight:normal;"
							    class="voluno_button_inactive task_report_previous_page"
							>
							    <img src="'.$function_propic_last.'">
							    <br>
							    Previous page
							</div>
							Page
							<span class="progress_report_page_count">
							    1
							</span>
							of
							'.ceil(count($progress_reports_results) / $task_reports_per_page).'
							<div
							    style="width:100px;padding:5px;display:inline-block;font-weight:normal;"
							    class="voluno_button task_report_next_page"
							>
							    <img src="'.$function_propic_next.'">
							    <br>
							    Next page
							</div>
						    </td>
						</tr>';
					    }
					    #pagination (close)
					    
					}
					#if at least one progress report exists (close)
					
					#form to submit new report (open)
					if(1==1){
					    
					    echo '
					    <tr style="border-top:1px dotted grey;">
						<td style="text-align:center;" colspan="3">
						    <form
							method="post"
							action="'.add_query_arg(NULL,NULL ).'"
							class="task_report_form"
							enctype="multipart/form-data"
						    >';
						    
						    #form submit test (open)
						    if(1==1){
							echo '
							<input name="task_report_form_submitted" type="hidden" value="yes">';
						    }
						    #form submit test (close)
						    
						    #textarea (open)
						    if(1==1){
							echo '
							<textarea
							    name="task_report_text"
							    class="task_report_text"
							    style="width:98%;margin:10px 0px;resize:vertical;background-color:#fff;"
							    placeholder="Did you work on this task? Write a short report here to keep'.
							    ' everyone up to date."
							>'.
							'</textarea>';
						    }
						    #textarea (close)
						    
						    #attachments (open)
						    if(1==1){
							
							echo '
							<input
							    name="task_report_file[]"
							    class="task_report_file"
							    type="file"
							    multiple
							>';
							
						    }
						    #attachments (close)
						    
						    echo '
						    </form>
						    <div
							class="voluno_button submit_task_report"
							style="width:100px;margin: 10px auto 0px auto;display:inline-box;"
						    >
							Submit report
						    </div>
						</td>
					    </tr>';
					    
					}
					#form to submit new report (close)
					
				    #div and table, close (open)
				    if(1==1){
					echo '
					</table>
				    </div>';
				    }
				    #div and table, close (close)
				    
				echo '
				</div>';
			    }
			    #text (close)
			    
			echo '
			</div>';
		    }
		    #content (close)
		}
		#progress reports [mysql] [->content] (close)
		
		#applications [mysql] [->content]  (open)
		if($arm['applications'] == "yes"){
		    
		    #preparation (open)
		    if(1==1){
			
			#image processing (open)
			if(1==1){
			    #function-image-processing
				#thematic only
				  $function_propic__type = "thematic";
				  $function_propic__original_img_name = "tasks_applicants.png";
			       #all
				 $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
			       include('#function-image-processing.php');
			}
			#image processing (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div">';
			
			#for ngo (open)
			if($arm['accept_and_reject'] == "yes"){
			    
			    #title and img (open)
			    if(1==1){
				echo '
				<img src="'.$function_propic.'" class="content_div_img">
				<h5 class="content_div_title" style="display:inline;">
				    <a style="cursor:pointer;">
					Applications ('.count($applications_results).')
				    </a>
				</h5>';
			    }
			    #title and img (close)
			    
			    #content for the ngo (open)
			    if(1==1){
				echo '
				<div class="content_div_content">';
				
				#if no volunteers yet (open)
				if(empty($applications_results)){
				    echo '
				    <p>
					No volunteers have applied yet. Please have patience.
				    </p>';
				}
				#if no volunteers yet (close)
				
				#if at least one volunteer (open)
				else{
				    echo '
				    <table
					style="
					    border:1px solid black;
					    margin:30px auto;
					    width:95%;
					    background-color:#fff;
					"
					class="application_table"
				    >';
					
					#title row (open)
					if(1==1){
					    echo '
					    <tr
						style="
						    background-color:#8B0000;
						    color:#fff;
						    font-weight:bold;
						"
					    >
						<td style="width:5%;">
						    #
						</td>
						<td style="width:25%;" colspan="2">
						    Applicant
						</td>
						<td style="width:15%;">
						    Application text
						</td>
						<td style="width:20%;">
						    Application date
						</td>
						<td style="width:35%;" colspan="2">
						    Do you accept?
						</td>
					    </tr>';
					}
					#title row (close)
					
					#content loop (open)
					for($six=0;$six<count($applications_results);$six++){
					    
					    #preparation (open)
					    if(1==1){
						
						#bg color (open)
						if(1==1){
						    if($six % 2 == TRUE){
							$class_row_bg = "uneven";
						    }else{
							$class_row_bg = "even";
						    }
						}
						#bg color (close)
						
						#function-image-processing (open)
						if(1==1){
						   #profile picture
						     $function_propic__type = "profile picture";
						     $function_propic__user_id = $applications_results[$six]->usersext_id;
						   #all
						     $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
						   include('#function-image-processing.php');
						   $function_propic_for_table = $function_propic;
						   
						   #profile picture
						     $function_propic__type = "profile picture";
						     $function_propic__user_id = $applications_results[$six]->usersext_id;
						   #all
						     $function_propic__geometry = array(200,200); //optional, if e.g. only width: 300, NULL; vice versa
						   include('#function-image-processing.php');
						   $function_propic_for_application = $function_propic;
						}
						#function-image-processing (close)
						
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
								
								$function_profileLink['id'] = $applications_results[$six]->usersext_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
						
						#function-timezone.php (open)
						if(1==1){
						    
						    $function_timezone = $applications_results[$six]->application_date_created;
						    $function_timezone_format = "date (weekday short no_year)"; //default: datetime (weekday long hour min sec)
						    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
						    //"date (weekday short)","time (hour min sec)","time (hour min)"
						    include('#function-timezone.php');
						    #output:
						    $function_timezone_date = $function_timezone;
						    
						    $function_timezone = $applications_results[$six]->application_date_created;
						    $function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
						    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
						    //"date (weekday short)","time (hour min sec)","time (hour min)"
						    include('#function-timezone.php');
						    $function_timezone_time = $function_timezone;
						    
						    $function_timezone_created = $function_timezone_date.',<br>'.$function_timezone_time;
						    
						    $function_timezone = $applications_results[$six]->application_date_created;
						    $function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
						    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
						    //"date (weekday short)","time (hour min sec)","time (hour min)"
						    include('#function-timezone.php');
						    #output:
						    $function_timezone_time_difference = $function_timezone;
						    
						}
						#function-timezone.php (close)
						
					    }
					    #preparation (close)
					    
					    echo '
					    <tbody class="'.$class_row_bg.'">';
						
						#main row (open)
						if(1==1){
						echo '
						<tr style="border-top:1px dotted grey;">';
						    
						    #counter (open)
						    if(1==1){
							echo '
							<td style="text-align:center;">
							    '.($six+1).'
							</td>';
						    }
						    #counter (close)
						    
						    #name and img (open)
						    if(1==1){
							echo '
							<td>
							    <a
								href="'.$function_profileLink['link'].'"
								title="'.$function_profileLink['link_title'].'"
							    >
								<img
								    class="opacity_on_hover"
								    src="'.$function_propic_for_table.'"
								    style="border-radius:10px;border:1px solid black;"
								>
							    </a>
							</td>
							<td style="text-align:center;" class="applicant_name">
							    '.$function_profileLink['name_link'].'
							</td>';
						    }
						    #name and img (close)
						    
						    #application text toggle button (open)
						    if(1==1){
							
							#if there isn't a text (open)
							if(empty($applications_results[$six]->application_text)){
							    echo '
							    <td>
								<span style="color:grey;">
								    No application text submitted.
								</span>
							    </td>';
							}
							#if there isn't a text (close)
							
							#if there is a text (open)
							else{
							    
							    //See jquery: "toggle application text"
							    
							    $width = 40;
							    echo '
							    <td style="text-align:justify;">
								<div
								    class="voluno_button toggle_application_text_button"
								    style="width:'.$width.'px;margin:auto;"
								>
								    Show
								</div>
								<div
								    class="voluno_button toggle_application_text_button"
								    style="width:'.$width.'px;display:none;margin:auto;"
								>
								    Hide
								</div>
							    </td>';
							    
							}
							#if there is a text (close)
							
						    }
						    #application text toggle button (close)
						    
						    #application date (open)
						    if(1==1){
							echo '
							<td style="text-align:center;">
							    '.$function_timezone_created.'
							    <br>
							    ('.$function_timezone_time_difference.')
							</td>';
						    }
						    #application date (close)
						    
						    #acceptance or rejection (open)
						    if(1==1){
							
							echo '
							<td style="text-align:center;">
							    <div
								class="voluno_button application_link_accept"
								style="margin:auto;width:50px;"
							    >
								Accept
							    </div>
							</td>
							<td style="text-align:center;">
							    <div
								style="
								    border-radius:20px;
								    background-color:#fff;
								    text-align:center;
								    position:absolute;
								    padding:20px;
								    border:1px solid black;
								    margin-left:-33px;
								    margin-top:-58px;
								    width:200px;
								    height:80px;
								    display:none;
								"
								class="application_link_reject_preliminary_div"
							    >
								Are you sure you want to reject this application?
								<br>
								<div
								    style="width:50px;display:inline-block;"
								    class="voluno_button application_link_reject_cancel"
								>
								    Cancel
								</div>
								<div
								    style="width:60px;display:inline-block;"
								    class="voluno_button application_link_reject"
								>
								    Confirm
								</div>
							    </div>
							    <div
								class="voluno_button application_link_reject_preliminary"
								style="margin:auto;width:50px;"
							    >
								Reject
							    </div>
							</td>';
							
						    }
						    #acceptance or rejection (close)
						    
						    #hidden fields (open)
						    if(1==1){
							
							    $nl = '&#013;';
							    echo '
							    <td style="display:none;">
								<span class="application_active">
								    1
								</span>
								<div class="applicant_img">
								    <img
									src="'.$function_propic_for_application.'"
									style="border-radius:25px;border:1px solid black;"
								    >
								</div>
								<span class="application_code">'.
								    $applications_results[$six]->application_code.
								'</span>
								<span class="application_id">'
								    .$applications_results[$six]->application_id.
								'</span>
								<span class="applicant_country">
								    '.$applications_results[$six]->list_countries_name.
								'</span>
								<div class="applicant_textarea_preparation">
								    <textarea '.
									'name="application_acceptance_text" '.
									'id="application_acceptance_text" '.
									'style="width:98.5%;height:15em;resize:vertical;"'.
								    '>'.
								    'Dear '.$applications_results[$six]->usersext_displayName.','.$nl.
								    $nl.
								    'thank you for applying to this task.'.$nl.
								    $nl.
								    'I have accepted your application and would now kindly '.
								    'ask you to begin with your work. '.$nl.
								    'If you require any additional information, please don\'t '.
								    'hesitate to contact me at any time. '.$nl.
								    $nl.
								    'Thanks in advance for your support. This is a big help! '.$nl.
								    $nl.
								    'Best regards, '.$nl.
								    $nl.
								    $GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName.
								    '</textarea>
								</div>
								<div class="applicant_text">';
								    if(!empty($applications_results[$six]->application_text)){
									echo '
									<p>
									    '.$applications_results[$six]->application_text.'
									</p>';
								    }else{
									echo '
									<p style="color:grey;font-style:italic;">
									    No application text submitted.
									</p>';
								    }
								echo '
								</div>
							    </td>';
						    }
						    #hidden fields (close)
						    
						echo '
						</tr>';
						}
						#main row (close)
						
						#application text row (open)
						if(!empty($applications_results[$six]->application_text)){
						    echo '
						    <tr
							style="background-color:'.$bg_color.';padding:0px;"
						    >
							<td style="text-align:justify;padding:0px;" colspan="100">
							    <div
								class="toggle_application_text"
								style="margin:auto;width:70%;display:none;"
							    >
								<p>
								    '.$applications_results[$six]->application_text.'
								</p>
								<br>
							    </div>
							</td>
						    </tr>';
						}
						#application text row (close)
					    
					    echo '
					    </tbody>';
					}
					#content loop (close)
					
				    echo '
				    </table>';
				    
				    #appication acceptance div (open)
				    if(1==1){
					
					#function-fixed-div.php (open)
					if(1==1){
					    $function_fixed_div_part = 1; //1 or 2, obligatory
					    $function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
					    $function_fixed_div_div_name = "application_acceptance_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
					    $function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
					    $function_fixed_div_cancel_button = "yes"; //optional, default is yes
					    $function_fixed_div_height_div = "80"; //optional, in percent, default is 50
					    $function_fixed_div_border_radius = 25; //optional, default is 0
					    $function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
					    $function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
					    $function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
					    include('#function-fixed-div.php');
					    $fixed_div_display_open = $function_fixed_div_display;
					    
					    $function_fixed_div_part = 2; //1 or 2, both are obligatory
					    include('#function-fixed-div.php');
					    $fixed_div_display_close = $function_fixed_div_display;
					}
					#function-fixed-div.php (close)
					
					#div (open)
					if(1==1){
					    echo
					    $fixed_div_display_open.'
					    <div
						style="
						    height:400px;
						    overflow-y:auto;
						    overflow-x:hidden;
						    margin-right:-20px;
						    padding-right:10px;
						"
					    >';
					}
					#div (open)
					    
					    #title (open)
					    if(1==1){
						
						echo '
						<div style="text-align:center;padding-top:10px;">
						    <strong>
							Accept volunteer application for task:
						    </strong>
						    <br>
						    <h2 style="display:inline;margin:20px;">
							'.$task_row->task_name.'
						    </h2>
						</div>';
						
					    }
					    #title (close)
					    
					    #content (open)
					    if(1==1){
						    
						echo '
						<table>
						    <tr>
							<td style="width:200px;padding-right:10px;">';
							    
							    #volunteer img (open)
							    if(1==1){
								echo '
								<br>
								<div class="accept_application_img">
								</div>';
							    }
							    #volunteer img (close)
							    
							echo '
							</td>
							<td>';
							    
							    #name, country, text (open)
							    if(1==1){
								
								echo '
								<span class="accept_application_name" style="font-weight:bold;">
								</span>
								from
								<span class="accept_application_country">
								</span>
								wrote:
								<div
								    class="accept_application_text"
								    style="vertical-align:middle;margin-top:7px;text-align:justify;"
								>
								</div>';
								
							    }
							    #name, country, text (close)
							    
							echo '
							</td>
						    </tr>
						</table>';
						
						#application acceptance text title (open)
						if(1==1){
						    echo '
						    <div style="width:100%;margin-top:20px;text-align:center;">';
							#function-help-word.php
							    $function_help_word_hover_link =
								'Please write some words to inform the volunteer:';
							    $function_help_word_width = 90;
							    $function_help_word_help_content = '
								<p><strong>
								    Application acceptance text
								</strong>
								<br>
								Now that you have accepted a volunteer, two things need to happen:
								</p>
								<ul>
								    <li>
									The volunteer needs to be informed that he has been selected.
								    </li>
								    <li>
									The volunteer needs to be provided with everything he needs in order
									to begin work on the task.
								    </li>
								</ul>
								<p>
								Below is an automated message. You can either leave it as it is or modify it.
								
								</p>
								';
							    include('#function-help-word.php');
						    echo '
						    </div>';
						}
						#application acceptance text title (open)
						
						#form (open)
						if(1==1){
						    echo '
						    <br>
						    <form method="post" action="'.add_query_arg(NULL,NULL).'" class="application_accept_form">
							<div class="textarea_preparation2">
							</div>
							<input type="hidden" name="accept_application_id" class="accept_application_id" value="">
						    </form>
						    <div
							class="voluno_text_button_style application_acceptance_div_button"
							style="
							    margin: 30px auto;
							    background:#8B0000;
							    cursor: pointer;
							    width:100px;
							"
						    >
							Accept application
						    </div>';
						}
						#form (close)
					    }
					    #content (close)
					    
					#div (close)
					if(1==1){
					    echo '
					    </div>'.
					    $fixed_div_display_close;
					}
					#div (close)
					
				    }
				    #appication acceptance div (close)
				    
				}
				#if at least one volunteer (close)
				
				echo '
				</div>';
			    }
			    #content for the ngo (close)
			    
			}
			#for ngo (close)
			
			#for volunteers (open)
			if(1==1){
			    
			    #apply
			    if($arm['apply'] == "yes"){
				
				#title and img (open)
				if(1==1){
				    echo '
				    <img src="'.$function_propic.'" class="content_div_img">
				    <h5 class="content_div_title" style="display:inline;">
					<a style="cursor:pointer;">
					    Interested? Apply for this task!
					</a>
				    </h5>';
				}
				#title and img (close)
				
				#content (open)
				if(1==1){
				    
				    #prepare (open)
				    if(1==1){
					
					#function-help-word.php (v1.0) (open)
					if(1==1){
					    $function_help_word_hover_link = "application text";
					    $function_help_word_help_content = '
						<p><strong>
						    Application text
						</strong>
						<br>
						If you want to, you can add a text to your application. This helps the development
						organization to determine if you are the best candidate for the task. For example, you could write about:</p>
						<ul>
						    <li>
							What motivates you to apply for this task?
						    </li>
						    <li>
							Why you believe that you are qualified to complete the task?
						    </li>
						    <li>
							How do you plan to execute the task (e.g. "I can complete this in just one day, using MS Excel")?
						    </li>
						    <li>
							Any other interesting information.
						    </li>
						</ul>';
					    #$function_help_word_margin = "margin-left:-100px;"; //default empty, add full css line in there, including ";".
					    $function_help_word_width = "600px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
					    $function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
					    include('#function-help-word.php');
					}
					#function-help-word.php (v1.0) (close)
					
					#function-validation-limit-textinput-size.php (v1.0) (open)
					if(1==1){
					    
					    $function_textinput_limit['class'] = 'apply_for_task_text_prelim';
					    #$function_textinput_limit['if_zero'] = 'Please add a title.'; //default: none => zero is allowed
					    $function_textinput_limit['if_middle1'] = ''; //default: none
					    $function_textinput_limit['if_middle2'] = ' of '; //default: ' of ';
					    $function_textinput_limit['if_middle3'] = ' characters left.'; //default: ' characters left.';
					    $function_textinput_limit['if_max1'] = 'You have reached the character limit of '; //default: 'You have reached the character limit of '
					    $function_textinput_limit['if_max2'] = '.'; //default: '.';
					    include('#function-validation-limit-textinput-size.php');
					    #$function_textinput_limit
					    #please add maxlength="" to your text-input
					    #outputs saves string lenght to class: function_textinput_limit__len_+class name
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
				    #prepare (close)
				    
				    #content (open)
				    if(1==1){
					echo '
					<div class="content_div_content">
					    <p>
						If you want to, you can add an '.$function_help_word__link.':
					    </p>
					    '.$function_help_word__div.'
					    <textarea
						class="apply_for_task_text_prelim"
						style="
						    width:95%;
						    resize:vertical;
						    max-height:300px;
						    height:100px;
						"
						maxlength=3000
					    >'.
					    '</textarea>
					    '.$function_textinput_limit.'
					    <div style="text-align:center;">
						<div class="voluno_button apply_for_task_submit">
						    Send application
						</div>
					    </div>
					</div>';
				    }
				    #content (close)
				    
				}
				#content (close)
				
			    }
			    #apply (close)
			    
			    #apply
			    if($arm['already_applied'] == "yes"){
				
				#title and img (open)
				if(1==1){
				    echo '
				    <img src="'.$function_propic.'" class="content_div_img">
				    <h5 class="content_div_title" style="display:inline;">
					<a style="cursor:pointer;">
					    Your application
					</a>
				    </h5>';
				}
				#title and img (close)
				
				#content (open)
				if(1==1){
				    
				    #prepare (open)
				    if(1==1){
					
					#function-help-word.php (v1.0) (open)
					if(1==1){
					    $function_help_word_hover_link = "application text";
					    $function_help_word_help_content = '
						<p><strong>
						    Application text
						</strong>
						<br>
						If you want to, you can add a text to your application. This helps the development
						organization to determine if you are the best candidate for the task. For example, you could write about:</p>
						<ul>
						    <li>
							What motivates you to apply for this task?
						    </li>
						    <li>
							Why you believe that you are qualified to complete the task?
						    </li>
						    <li>
							How do you plan to execute the task (e.g. "I can complete this in just one day, using MS Excel")?
						    </li>
						    <li>
							Any other interesting information.
						    </li>
						</ul>';
					    #$function_help_word_margin = "margin-left:-100px;"; //default empty, add full css line in there, including ";".
					    $function_help_word_width = "600px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
					    $function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
					    include('#function-help-word.php');
					}
					#function-help-word.php (v1.0) (close)
					
					#function-validation-limit-textinput-size.php (v1.0) (open)
					if(1==1){
					    
					    $function_textinput_limit['class'] = 'apply_for_task_text_prelim';
					    #$function_textinput_limit['if_zero'] = 'Please add a title.'; //default: none => zero is allowed
					    $function_textinput_limit['if_middle1'] = ''; //default: none
					    $function_textinput_limit['if_middle2'] = ' of '; //default: ' of ';
					    $function_textinput_limit['if_middle3'] = ' characters left.'; //default: ' characters left.';
					    $function_textinput_limit['if_max1'] = 'You have reached the character limit of '; //default: 'You have reached the character limit of '
					    $function_textinput_limit['if_max2'] = '.'; //default: '.';
					    include('#function-validation-limit-textinput-size.php');
					    #$function_textinput_limit
					    #please add maxlength="" to your text-input
					    #outputs saves string lenght to class: function_textinput_limit__len_+class name
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
				    #prepare (close)
				    
				    #content (open)
				    if(1==1){
					echo '
					<div class="content_div_content">
					    <p>
						You have applied for this task. Please wait for the development worker
						to accept or reject your application.';
						if(!empty($volunter_application_check_row->application_text)){
						    echo '
						    <br>
						    You provided the following application text:';
						}
					    echo '
					    </p>';
					    if(!empty($volunter_application_check_row->application_text)){
						echo '
						<textarea
						    class="apply_for_task_text_prelim"
						    style="
							width:95%;
							resize:vertical;
							max-height:300px;
							height:100px;
							background-color:#dbdbdb;
						    "
						    disabled
						>'.
						    $volunter_application_check_row->application_text.
						'</textarea>';
					    }
					    echo '
					    <div style="text-align:center;">
						<div class="voluno_button withdraw_task_application_submit">
						    Withdraw application
						</div>
					    </div>
					</div>';
				    }
				    #content (close)
				    
				}
				#content (close)
				
			    }
			    #apply (close)
			    
			}
			#for volunteers (close)
			
			echo '
			</div>';
		    }
		    #content (close)
		}
		#applications [mysql] [->content]  (close)
		
		#task type (open)
		if($arm['edit_mode'] == "yes"){
		    
		    #preparation (open)
		    if(1==1){
			
			#image processing (open)
			if(1==1){
			    #thematic only
				$function_propic__type = "thematic";
				$function_propic__original_img_name = "task_type.png";
			    #all
				$function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
			    include('#function-image-processing.php');
			    $function_propic_content_div = $function_propic;
			}
			#image processing (close)
			
			#help word (open)
			if(1==1){
			    #function-help-word.php
				$function_help_word_margin = "margin-left:-450px;";
				$function_help_word_width = "margin-left:-200px";
				$function_help_word_hover_link = '
				    <div style="font-weight:bold;margin:20px 0px 5px 0px;">
					Task categories:
				    </div>';
				$function_help_word_help_content = '
				    <p style="font-weight:bold;">
					What activity is associated with the task?
				    </p>
				    <p>
					Which category does the task fall into?
					Please select one or more categories.
				    </p>
				    <p>
					If your category is not yet features, please don\'t
					hesitate to send us a mail,
					so that we can add it to the list.
				    </p>';
				include('#function-help-word.php');
			}
			#help word (close)
			
			#array preparation (open)
			if(1==1){
			    
			    #selected (open)
			    if(1==1){
				
				$selected_task_types_query = $GLOBALS['wpdb']->prepare('SELECT *
									    FROM fi4l3fg_voluno_items_tasks_properties
									    WHERE taskprop_task_id = %s
										AND taskprop_type = "type";'
									    ,$task_row->task_id);
				$selected_task_types_results = $GLOBALS['wpdb']->get_results($selected_task_types_query);
				
				for($ahr=0;$ahr<count($selected_task_types_results);$ahr++){
				    $function_dts['results_level1_checked_array'][]
				    = $selected_task_types_results[$ahr]->taskprop_type_id; //array of checked options
				}
				
			    }
			    #selected (close)
			    
			    $task_types_array
			    = array(
				array(
				    'title'   => 'Product',
				    'task_id' => 19,
				    'text'    => 'What is this task helping to produce?',
				    'max_selected' => 4,
				    'min_selected' => 1
				),
				array(
				    'title'   => 'Medium',
				    'task_id' => 8,
				    'text'    => 'Which type of content is involved?',
				    'css'     => 'display:inline-block;max-width:100px;', //default: empty = rows. otherwise, please use: display:inline-block;max-width:100px;
				    'min_selected' => 1,
				    'max_selected' => 5
				),
				array(
				    'title'   => 'Activity',
				    'task_id' => 7,
				    'text'    => 'What should the volunteer primarily do?',
				    'subloop' => 'yes',
				    'min_selected' => 1,
				    'max_selected' => 5
				),
				array(
				    'title'   => 'Software',
				    'task_id' => 6,
				    'text'    => 'Which software should be used?',
				    'type'    => 'exclusive',
				    'min_selected' => 1,
				    'max_selected' => 5
				),
				array(
				    'title'   => 'Field',
				    'task_id' => 5,
				    'text'    => 'Optionally, add an academic field. This is helpful if the volunteer must
						  know subject-specific terms and backgrounds.',
				    'max_selected' => 3,
				    'min_selected' => 0
				    
				)
			    );
			    
			}
			#array preparation (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div show_this_in_edit_mode">';
			    
			    #title and div open (open)
			    if(1==1){
				echo '
				<img src="'.$function_propic_content_div.'" class="content_div_img" style="padding:10px 0px 10px 10px;">
				<h5 class="content_div_title" style="display:inline;">
				    <a style="cursor:pointer;">
					Task categories
				    </a>
				</h5>
				<div class="content_div_content" style="margin:20px auto;width:70%;">
				';
			    }
			    #title and div open (close)
			    var_dump($_POST); #dome
			    #array execution (open)
			    if(1==1){
				
				#loop (open)
				for($ahs=0;$ahs<count($task_types_array);$ahs++){
				    
				    #function-div-table-selects.php (v2.0) (open)
				    if(1==1){
					$function_dts['version'] = 2;
					$function_dts['level1_div_css'] = $task_types_array[$ahs]['css'];
					#$function_dts_i['name'] = '';//optional unique id: a-z + _
					
					#level 1 (open)
					if(1==1){
					    
					    $function_dts['query_inputs_level1']
					    = array(
						'SELECT *
						FROM fi4l3fg_voluno_lists_task_types
						WHERE task_type_parent = %s
						ORDER BY task_type_name ASC;'
						,$task_types_array[$ahs]['task_id']
					    );//array of text plus 0-5 statements
					    
					    #selected (open)
					    if(1==1){
						
						$selected_task_types_query = $GLOBALS['wpdb']->prepare('SELECT *
											    FROM fi4l3fg_voluno_items_tasks_properties
											    WHERE taskprop_task_id = %s
												AND taskprop_type = "type";'
											    ,$task_row->task_id);
						$selected_task_types_results = $GLOBALS['wpdb']->get_results($selected_task_types_query);
						
						for($ahr=0;$ahr<count($selected_task_types_results);$ahr++){
						    $function_dts['results_level1_checked_array'][]
						    = $selected_task_types_results[$ahr]->taskprop_type_id; //array of checked options
						}
						
					    }
					    #selected (close)
					    
					    $function_dts['mysql_column_name_to_display_level1'] = "task_type_name"; //what you see
					    $function_dts['mysql_column_name_for_post_level1'] = "task_type_id"; //what php sees
					    $function_dts['post_name'] = "edit_task_type_id"; //$_POST['-->this<--743']
					    $function_dts['max_selects'] = $task_types_array[$ahs]['max_selected']; //optional
					    $function_dts['image_name_row'] = 'task_type_image';
					}
					#level 1 (close)
					
					#level 2 (open)
					if(1==1){
					    
					    $function_dts['query_inputs_level2']
					    = array(
						'SELECT *
						FROM fi4l3fg_voluno_lists_task_types
						WHERE task_type_parent = %s
						ORDER BY task_type_name ASC;'
					    );//array of text plus 0-5 statements (the parent identifier is automatically added as last element)
					    
					    #selected (open)
					    if(1==1){
						
						$selected_task_types_query = $GLOBALS['wpdb']->prepare('SELECT *
											    FROM fi4l3fg_voluno_items_tasks_properties
											    WHERE taskprop_task_id = %s
												AND taskprop_type = "type";'
											    ,$task_row->task_id);
						$selected_task_types_results = $GLOBALS['wpdb']->get_results($selected_task_types_query);
						
						for($ahr=0;$ahr<count($selected_task_types_results);$ahr++){
						    $function_dts['results_level1_checked_array'][]
						    = $selected_task_types_results[$ahr]->taskprop_type_id; //array of checked options
						}
						
					    }
					    #selected (close)
					    
					    $function_dts['mysql_column_name_to_display_level2'] = "task_type_name"; //what you see
					    $function_dts['mysql_column_name_for_post_level2'] = "task_type_id"; //what php sees
					    $function_dts['post_name'] = "edit_task_type_id"; //$_POST['-->this<--743']
					    #$function_dts['max_selects'] = $task_types_array[$ahs]['max_selected']; //optional
					    $function_dts['image_name_row'] = 'task_type_image';
					}
					#level 2 (close)
					
					include('#function-div-table-selects.php');
					#output: $function_dts['output'] <-- must be enclosed in <form> tag
					#$function_dts['selected_items_display']
					#$function_dts['selected_items_display_counter']
				    }
				    #function-div-table-selects.php (v2.0) (close)
				    
				    $tasktypes .= '
				    <div class="tasktype_subsection">
					<h5 class="tasktype_subtitle">
					    <a style="cursor:pointer;">
						'.$task_types_array[$ahs]['title'].
					    '</a>
					</h5>
					'.$task_types_array[$ahs]['text'].'
					('.$task_types_array[$ahs]['min_selected'].'-'.$task_types_array[$ahs]['max_selected'].')
					<div>
					    '.$function_dts['selected_items_display'].'
					</div>
					<div class="tasktype_subcontent" style="display:none;">
					    <div>
						'.$function_dts['output'].'
					    </div>
					</div>
				    </div>';
				    unset($function_dts,$function_dts_i);
				}
				#loop (close)
				
				echo $tasktypes;
				
			    }
			    #array execution (close)
			    
			    #buttons and close (open)
			    if(1==1){
				    echo '
				    <div style="margin:20px 0px;width:100%;text-align:center;">
					<div class="voluno_button option_ngo_close" style="display:inline;margin:5px;">
					    Cancel
					</div>
					<div class="voluno_button option_ngo_save" style="display:inline;margin:5px;">
					    Save
					</div>
					<div class="voluno_button option_ngo_save_and_close" style="display:inline;margin:5px;">
					    Save and close
					</div>
				    </div>
				</div>';
			    }
			    #buttons and close (close)
			    
			echo '
			</div>';
		    }
		    #content (close)
		    
		}
		#task type (close)
		
		#long description (open)
		if($arm['long_description'] == "yes"){
		    
		    #preparation (open)
		    if(1==1){
			
			#show/hide on load (open)progress_reports_hide_on_load
			if($arm['long_description_hide_on_load'] == "yes"){
			    $content_div_content_hide = 'display:none;';
			}else{
			    unset($content_div_content_hide);
			}
			#show/hide on load (close)
			
			#image processing (open)
			if(1==1){
			    #function-image-processing
				#thematic only
				  $function_propic__type = "thematic";
				  $function_propic__original_img_name = "task_description_long.png";
			       #all
				 $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
			       include('#function-image-processing.php');
			       $function_propic_content_div = $function_propic;
			}
			#image processing (close)
			
			#non-edit: general description (open)
			if(1==1){
			    
			    #function-only-first-x-symbols.php (open)
			    if(1==1){
				
				$function_only_first_x_symbols = $task_row->task_description_long; #content
				$function_only_first_x_symbols_num = 300; #optional, number of symbols, default is 100
				include('#function-only-first-x-symbols.php');
				$long = $function_only_first_x_symbols;
				
			    }
			    #function-only-first-x-symbols.php (close)
			    
			    #function-file-icons.php (open)
			    if(1==1){
				$function_file_icons = $files_general_description_results; //array of file ids
				
				#edit mode (open)
				if($arm['edit_mode'] == "yes"){
				    $function_file_icons_delete_option = "yes";
				}
				#edit mode (close)
				
				include("#function-file-icons.php");
				$general_description_files = $function_file_icons;
				
				#edit mode (open)
				if($arm['edit_mode'] == "yes"){
				    $general_description_files_delete = $function_file_icons_delete;
				}
				#edit mode (close)
				
			    }
			    #function-file-icons.php (close)
			    
			}
			#non-edit: general description (close)
			
			#non-edit: specific description (open)
			if(1==1){
			    
			    #function-only-first-x-symbols.php (open)
			    if(1==1){
				
				$function_only_first_x_symbols = $task_row->task_description_undisclosed; #content
				$function_only_first_x_symbols_num = 300; #optional, number of symbols, default is 100
				include('#function-only-first-x-symbols.php');
				$undisclosed = $function_only_first_x_symbols;
				
			    }
			    #function-only-first-x-symbols.php (close)
			    
			    #function-file-icon.php (open)
			    if(1==1){
				$function_file_icons = $files_specific_description_results; //array of file ids
				
				#edit mode (open)
				if($arm['edit_mode'] == "yes"){
				    $function_file_icons_delete_option = "yes";
				}
				#edit mode (close)
				
				include("#function-file-icons.php");
				$specific_description_files = $function_file_icons;
				
				#edit mode (open)
				if($arm['edit_mode'] == "yes"){
				    $specific_description_files_delete = $function_file_icons_delete;
				}
				#edit mode (close)
				
			    }
			    #function-file-icon.php (close)
			    
			}
			#non-edit: specific description (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div">';
			    
			    echo '
			    <img src="'.$function_propic_content_div.'" class="content_div_img" style="padding:10px 0px 10px 10px;">
			    <h5 class="content_div_title" style="display:inline;">
				<a style="cursor:pointer;">
				    Detailed description
				</a>
			    </h5>
			    <div class="content_div_content" style="margin:20px auto;width:70%;'.$content_div_content_hide.'">';
				
				#general description (open)
				if($arm['long_description_general'] == "yes"){
				    
				    #edit (open)
				    if($arm['edit_mode'] == "yes"){
					
					#preparation (open)
					if(1==1){
					    
					    #help word (open)
					    if(1==1){
						
						#function-help-word.php
						    $function_help_word_hover_link = "Open description:"; //1, 2 or 3, obligatory
						    $function_help_word_variable_only = "yes";
						    $function_help_word_help_content = '
							<b>Detailed task description for not yet accepted volunteers</b>
							<p>This text is visible to all volunteers at Voluno, so please don\'t provide
							sensitive information here, but in the next textarea instead.
							<br>
							This text should help volunteers to get a clear idea on what the task is about.
							Most volunteers who read this text will already have read the short description, so
							they will already be interested. Please give a detailed explanation that can help
							volunteers decide:</p><br>
							<ul>
							    <li>
								<b>Whether they are truely capable of completing the task.</b><br>
								Is there an additional skill required? E.g. social skills,
								software knowledge, etc.<br>
								Note: The requirements can be chosen below. This field is just
								for possible further requirements, not
								listed below.<br><br>
							    </li>
							    <li>
								<b>Whether they are truely willing to complete the task</b><br>
								Inform about both the costs and benefits of working on this task.<br>
								If the task is very frustrating, volunteers should know what they
								are getting into. This reduces
								the risk that they underestimate the effort, become frustrated and
								and give up without completing the task.<br>
								On the other hand, if the task offers a lot to learn or deals with
								an interesting topic, volunteers might be more willing to work on it,
								even if the type of task is not their top preference.
							    </li>
							</ul>';
						    include('#function-help-word.php');
						    
					    }
					    #help word (close)
					    
					    #function-sanitize-text.php (open)
					    if(1==1){
					      $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
					      /*
					       *one line unformatted text (city, name, occupation, etc.)
					       *email address
					       *plain text with line breaks (biography)
					      */
					      $function_sanitize_text__text = $task_row->task_description_long;
					      $function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
					      include('#function-sanitize-text.php');
					    }
					    #function-sanitize-text.php (close)
					    
					}
					#preparation (close)
					
					#menu (open)
					if(1==1){
					    echo '
					    <div class="show_this_in_edit_mode">
						<div style="font-weight:bold;">
						    '.$function_help_word.'
						</div>
						<textarea
						    style="resize:vertical;width:400px;height:20em;margin:5px 0px;"
						    class="edit_general_description"
						    name="edit_general_description"
						    maxlength="'.$validation__character_limit__general_description.'"
						    placeholder="Please describe the task. Example: &quot;Create a flyer that briefly'.
								' introduces our organization and gives and overview of our current projects.&quot;"
						>'.
						    $function_sanitize_text__text_sanitized.
						'</textarea>
						'.$validation__max_characters_divspan__general_description.'
						'.$general_description_files_delete.'
						<div style="margin-bottom:30px;text-align:center;">
						    <input
							type="file"
							class="edit_general_description_files"
							name="edit_general_description_files[]"
							multiple="multiple"
						    >
						</div>
					    </div>';
					}
					#menu (close)
					
				    }
				    #edit (close)
				    
				    #non edit content (open)
				    if($arm['edit_mode'] != "yes"){
					echo '
					<div>
					    <strong>
						Open description
					    </strong>
					    <p>';
					    if(empty($task_row->task_description_long)){
						echo '
						<span style="color:red;font-style:italic;">
						    Please add an open description.
						</span>';
					    }else{
						echo
						$long;
					    }
					    echo '
					    </p>
					    '.$general_description_files.'
					    <br>
					</div>';
				    }
				    #non edit content (close)
				    
				}
				#general description (close)
				
				#specific description (open)
				if($arm['long_description_specific'] == "yes"){
				    
				    #edit (open)
				    if($arm['edit_mode'] == "yes"){
					
					#preparation (open)
					if(1==1){
					    
					    #help word (open)
					    if(1==1){
						
						#function-help-word.php
						    $function_help_word_hover_link = "Confidential description:"; //1, 2 or 3, obligatory
						    $function_help_word_variable_only = "yes";
						    $function_help_word_help_content = '
							<b>Detailed task description for accepted volunteers</b>
							<p>Once a volunteer is accepted for a task, he or she are probably going to
							need additional information and files before the work can start. That is
							what this text is for. Please provide as much information and be as specific
							as possible. The more information you provide, the less likely the volunteer
							is to:
							</p><br>
							<ul>
							    <li>
								Do something wrong<br>
							    </li>
							    <li>
								Have to ask questions<br>
							    </li>
							</ul>
							<br>
							<p>
							    Alternatively, you can also arrange a meeting with the volunteer after
							    you have accepted the volunteer. If that is what you prefer, you should
							    briefly note it in the "open description". When accepting the volunteer,
							    you should immediately make a suggestion for a meeting, to speed up the process.
							</p>
							';
						    include('#function-help-word.php');
					    }
					    #help word (close)
					    
					    #function-sanitize-text.php (open)
					    if(1==1){
					      $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
					      /*
					       *one line unformatted text (city, name, occupation, etc.)
					       *email address
					       *plain text with line breaks (biography)
					      */
					      $function_sanitize_text__text = $task_row->task_description_undisclosed;
					      $function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
					      include('#function-sanitize-text.php');
					    }
					    #function-sanitize-text.php (close)
					    
					}
					#preparation (close)
					
					#menu (open)
					if(1==1){
					    echo '
					    <div class="show_this_in_edit_mode">
						<div style="font-weight:bold;">
						    '.$function_help_word.'
						</div>
						<textarea
						    style="resize:vertical;width:400px;height:20em;margin:5px 0px;"
						    class="edit_specific_description"
						    name="edit_specific_description"
						    maxlength="'.$validation__character_limit__specific_description.'"
						    placeholder="Please describe the task. Example: &quot;Create a flyer that briefly'.
								' introduces our organization and gives and overview of our current projects.&quot;"
						>'.
						    $function_sanitize_text__text_sanitized.
						'</textarea>
						'.$validation__max_characters_divspan__specific_description.'
						'.$specific_description_files_delete.'
						<div style="margin-bottom:30px;text-align:center;">
						    <input
							type="file"
							class="edit_specific_description_files"
							name="edit_specific_description_files[]"
							multiple="multiple"
						    >
						</div>
					    </div>';
					}
					#menu (close)
					
				    }
				    #edit (close)
				    
				    #non edit content (open)
				    if($arm['edit_mode'] != "yes"){
					echo '
					<div>
					    <strong>
						Confidential description
					    </strong>
					    <p>';
					    if(empty($task_row->task_description_undisclosed)){
						echo '
						<span style="color:red;font-style:italic;">
						    Please add a confidential description.
						</span>';
					    }else{
						echo
						$undisclosed;
					    }
					    echo '
					    </p>
					    '.$specific_description_files.'
					</div>';
				    }
				    #non edit content (close)
				    
				}
				#specific description (close)
				
				#edit (open)
				if($arm['edit_mode'] == "yes"){
				    echo '
				    <div style="margin:20px 0px;width:100%;text-align:center;">
					<div class="voluno_button option_ngo_close" style="display:inline;margin:5px;">
					    Cancel
					</div>
					<div class="voluno_button option_ngo_save" style="display:inline;margin:5px;">
					    Save
					</div>
					<div class="voluno_button option_ngo_save_and_close" style="display:inline;margin:5px;">
					    Save and close
					</div>
				    </div>';
				}
				#edit (close)
				
			    echo '
			    </div>
			</div>';
		    }
		    #content (close)
		    
		}
		#long description (close)
		
	    }
	    #left side content divs (close)
	    
	#content divs table 2/3 (open)
	if($arm['content_divs_table'] == "yes"){
		    echo '
		    </td>
		    <td>';
	}
	#content divs table 2/3 (close)
	    
	    #right side content div (open)
	    if($arm['right_side_content_div'] == "yes"){
		
		#admin information (open)
		if(current_user_can('manage_options') AND 1==1){ #dome
		    
		    #preparation (open)
		    if(1==1){
			
			#image processing (open)
			if(1==1){
			    
			    #function-image-processing
				#thematic only
				  $function_propic__type = "thematic";
				  $function_propic__original_img_name = "admin.png";
			       #all
				 $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
			       include('#function-image-processing.php');
			       $function_propic_content_div_img = $function_propic;
			       
			}
			#image processing (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div">';
			    
			    #title and img (open)
			    if(1==1){
				echo '
				<img src="'.$function_propic_content_div_img.'" class="content_div_img">
				<h5 style="display:inline;">
				    Developer info
				</h5>';
			    }
			    #title and img (close)
			    
			    #text (open)
			    if(1==1){
				
				$margin_top = 10;
				
				echo '
				<div class="content_div_content">
				    My roles: '.$user_role.'
				    <br>
				    Task status: '.$task_status.'
				</div>';
			    }
			    #text (close)
			    
			echo '
			</div>';
		    }
		    #content (close)
		    
		}
		#admin information (close)
		
		#options (open)
		if($arm['options'] == "yes"){
		    
		    #preparation (open)
		    if(1==1){
			
			#image processing content div (open)
			if(1==1){
			    #function-image-processing
				#thematic only
				  $function_propic__type = "thematic";
				  $function_propic__original_img_name = "options.png";
			       #all
				 $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
			       include('#function-image-processing.php');
			       $content_div_img = $function_propic;
			}
			#image processing content div (close)
			
			#volunteers (open)
			if($arm['options_for_volunteers'] == "yes"){
			    
			    #function-image-processing (open)
			    if(1==1){
				
				#thematic only
				    $function_propic__type = "thematic";
				    $function_propic__original_img_name = "write_report_white.png";
				#all
				    $function_propic__geometry = array($image_width,$image_width); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				$img_write_report = $function_propic;
				
				#thematic only
				    $function_propic__type = "thematic";
				    $function_propic__original_img_name = "ask_question_white.png";
				#all
				    $function_propic__geometry = array($image_width,$image_width); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				$img_ask_question = $function_propic;
				
				#thematic only
				    $function_propic__type = "thematic";
				    $function_propic__original_img_name = "withdraw_white.png";
				#all
				    $function_propic__geometry = array($image_width,$image_width); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				$img_quit_task = $function_propic;
				
			    }
			    #function-image-processing (close)
			    
			    #array (open)
			    if(1==1){
				    
				    $option_menu_array[]
					= array(
					    "img_source"            =>  $img_write_report,
					    "class_name"            =>  "option_volunteer_write_report",
					    "button_text"           =>  "Write progress report"
					    );
				    $option_menu_array[]
					= array(
					    "img_source"            =>  $img_ask_question,
					    "class_name"            =>  "option_volunteer_ask_question",
					    "button_text"           =>  "Ask question"
					    );
				    $option_menu_array[]
					= array(
					    "img_source"            =>  $img_quit_task,
					    "class_name"            =>  "option_volunteer_quit_task",
					    "button_text"           =>  "Resign from task"
					    );
				    
			    }
			    #array (close)
			    
			}
			#volunteers (close)
			
			#ngos (open)
			if($arm['options_for_ngos'] == "yes"){
			    
			    #publish (open)
			    if($arm['options_for_ngos_publish'] == "yes"){
				
				#confirmation div + icon color (open)
				if(1==1){
				    
				    #if task is ready (open)
				    if(!empty($task_row->task_ready_for_publication)){
					
					$icon_bg_color = "green";
					$confirmation_div_and_form =
					    '<div
						style="
						    border-radius:20px;
						    background-color:#fff;
						    text-align:center;
						    position:absolute;
						    padding:20px;
						    z-index:10;
						    border:1px solid black;
						    margin-left:-53px;
						    margin-top:-153px;
						    width:180px;
						    display:none;
						"
						class="publish_task_preliminary_div confirmation_div"
					    >
						<p style="font-weight:bold;">
						    Are you sure that you want to publish this task?
						</p>
						<p>
						    Once it is published, you will no longer be able
						    to edit any task information or correct typing errors.
						</p>
						<div style="margin-top:5px;">
						    <div
							style="width:50px;display:inline-block;"
							class="voluno_button publish_task_preliminary_cancel"
						    >
							Cancel
						    </div>
						    <div
							style="width:60px;display:inline-block;"
							class="voluno_button publish_task_preliminary_confirm"
						    >
							Publish
						    </div>
						</div>
					    </div>';
					    
				    }
				    #if task is ready (close)
				    
				    #if task is not ready (open)
				    else{
					
					$icon_bg_color = "red";
					$confirmation_div_and_form =
					    '<div
						style="
						    border-radius:20px;
						    background-color:#fff;
						    text-align:center;
						    position:absolute;
						    padding:20px;
						    z-index:10;
						    border:1px solid black;
						    margin-left:-53px;
						    margin-top:-103px;
						    width:180px;
						    display:none;
						"
						class="publish_task_preliminary_div confirmation_div"
					    >
						<p style="font-weight:bold;">
						    The task is not ready yet
						</p>
						<p>
						    Before publishing, please edit the task to add more information.
						</p>
						<div style="margin-top:5px;">
						    <div
							style="display:inline-block;"
							class="voluno_button publish_task_preliminary_cancel"
						    >
							Cancel
						    </div>
						    <a
							style="display:inline-block;color:#fff;"
							class="voluno_button publish_task_preliminary_cancel option_ngo_edit"
							href="'.get_permalink().'?type=task&id='.$task_row->task_id.'&edit_task=1"
						    >
							Edit task
						    </a>
						</div>
					    </div>';
					    
				    }
				    #if task is not ready (close)
				    
				}
				#confirmation div + icon color (close)
				
				#publish task form (open)
				if(!empty($task_row->task_ready_for_publication)){
				    
				    $confirmation_div_and_form =
					$confirmation_div_and_form.
					'<form
					    class="publish_task_form"
					    method="post"
					    action="'.get_permalink().'?type=task&id='.$task_row->task_id.'"
					>
					    <input type="hidden" name="publish_task" value="1">
					</form>
					';
				    
				}
				#publish task form (close)
				
				$option_menu_array[]
				    = array(
					"img_name"              =>  "publish_white.png",
					"class_name"            =>  "option_ngo_publish",
					"button_text"           =>  "Publish the task, so that volunteers can apply to it.",
					"code_before_button"    =>  $confirmation_div_and_form,
					"big_icon"		=>  "yes",
					"icon_bg_color"		=>  $icon_bg_color
					);
				
			    }
			    #publish (close)
			    
			    #edit (open)
			    if($arm['options_for_ngos_edit'] == "yes"){
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "edit_white.png",
					    "class_name"            =>  "option_ngo_edit",
					    "button_text"           =>  "Edit task",
					    "link_button"	    =>  get_permalink().'?type=task&id='.$task_row->task_id.'&edit_task=1',
					    "big_icon"		    =>  "no",
					    "order_position"        =>  -1000
					    );
				
			    }
			    #edit (close)
			    
			    #copy (open)
			    if($arm['options_for_ngos_copy'] == "yes"){
				
				#confirmation div (open)
				if(1==1){
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-53px;
						margin-top:-58px;
						width:200px;
						display:none;
					    "
					    class="copy_task_preliminary_div confirmation_div"
					>
					    <p>
						Use this task as template for a new task and then go to the new task?
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button copy_task_preliminary_cancel"
						>
						    No
						</div>
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button copy_task_preliminary_confirm"
						>
						    Yes
						</div>
					    </div>
					</div>';
				}
				#confirmation div (close)
				
				#complete task form (open)
				if(1==1){
				    
				    $confirmation_div_and_form =
					$confirmation_div_and_form.
					'<form
					    class="copy_task_form"
					    method="post"
					    action="'.get_permalink().'?type=task&id='.$task_row->task_id.'"
					>
					    <input type="hidden" name="copy_task" value="1">
					</form>';
				    
				}
				#complete task form (close)
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "copy_white.png",
					    "class_name"            =>  "option_ngo_copy",
					    "button_text"           =>  "Use as draft for new task",
					    "code_before_button"    =>  $confirmation_div_and_form,
					    "big_icon"	        =>  "no",
					    "order_position"        =>  5000
					    );
				
			    }
			    #copy (close)
			    
			    #complete (open)
			    if($arm['options_for_ngos_complete'] == "yes"){
				
				#confirmation div (open)
				if(1==1){
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-53px;
						margin-top:-58px;
						width:200px;
						display:none;
					    "
					    class="complete_task_preliminary_div confirmation_div"
					>
					    <p>
						Are you sure that you want to terminate this task?
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button complete_task_preliminary_cancel"
						>
						    No
						</div>
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button complete_task_preliminary_confirm"
						>
						    Yes
						</div>
					    </div>
					</div>';
				}
				#confirmation div (close)
				
				#complete task form (open)
				if(1==1){
				    
				    $confirmation_div_and_form =
					$confirmation_div_and_form.
					'<form
					    class="complete_task_form"
					    method="post"
					    action="'.get_permalink().'?type=task&id='.$task_row->task_id.'"
					>
					    <input type="hidden" name="complete_task" value="1">
					</form>';
				    
				}
				#complete task form (close)
				    
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "voluno_img_3521.png",
					    "class_name"            =>  "option_ngo_complete",
					    "button_text"           =>  'Terminate task. Please click here if:'.
									'&#13; - The volunteer has completed the task.'.
									'&#13; - The volunteer has failed to complete the task'.
									'&#13;   and you don\'t think he or she is still going to.'.
									'&#13; - You no longer need this task to be completed.',
					    "code_before_button"    =>  $confirmation_div_and_form,
					    "big_icon"	        =>  "no",
					    "order_position"        =>  2000
					    );
				
			    }
			    #complete (close)
			    
			    #reassign (open)
			    if($arm['options_for_ngos_reassign'] == "yes"){
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "reassign_white.png",
					    "class_name"            =>  "option_ngo_reassign",
					    "button_text"           =>  "Remove volunteer and reopen task for application",
					    "big_icon"		    =>  "no"
					    );
				
			    }
			    #reassign (close)
			    
			    #cancel (open)
			    if($arm['options_for_ngos_cancel'] == "yes" ){#dome
				
				#confirmation div (open)
				if(1==1){
				    
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-53px;
						margin-top:-153px;
						width:180px;
						display:none;
					    "
					    class="cancel_task_preliminary_div confirmation_div"
					>
					    <p style="font-weight:bold;">
						Are you sure that you want to cancel this task?
					    </p>
					    <p>
						The task will be marked as cancelled, but will still be
						available if you ever change your mind.
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="width:50px;display:inline-block;"
						    class="voluno_button cancel_task_preliminary_cancel"
						>
						    No
						</div>
						<div
						    style="width:60px;display:inline-block;"
						    class="voluno_button cancel_task_preliminary_confirm"
						>
						    Yes
						</div>
					    </div>
					</div>';
					
				}
				#confirmation div (close)
				
				#form (open)
				if(!empty($task_row->task_ready_for_publication)){
				    
				    $confirmation_div_and_form =
					$confirmation_div_and_form.
					'<form
					    class="cancel_task_form"
					    method="post"
					    action="'.get_permalink().'?type=task&id='.$task_row->task_id.'"
					>
					    <input type="hidden" name="cancel_task" value="1">
					</form>
					';
				    
				}
				#form (close)
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "cancel_white.png",
					    "class_name"            =>  "option_ngo_cancel",
					    "button_text"           =>  "Cancel task",
					    "big_icon"		    =>  "no",
					    "code_before_button"    =>  $confirmation_div_and_form
					    );
				
			    }
			    #cancel (close)
			    
			    #GROUP: edit mode (open)
			    if(1==1){
				
				#close (open)
				if($arm['options_for_ngos_edit_close'] == "yes"){
				    
				    $option_menu_array[]
					= array(
						"img_name"              =>  "close-white.png",
						"class_name"            =>  "option_ngo_close",
						"button_text"           =>  "Close edit mode without saving",
						"big_icon"		=>  "yes",
						"order_position"	=>  -1003
						);
				    
				}
				#close (close)
				
				#save (open)
				if($arm['options_for_ngos_edit_save'] == "yes"){
				    
				    $option_menu_array[]
					= array(
						"img_name"              =>  "save-white.png",
						"class_name"            =>  "option_ngo_save",
						"button_text"           =>  "Save task",
						"big_icon"		=>  "no",
						"order_position"	=>  -1002
						);
				    
				}
				#save (close)
				
				#save and close (open)
				if($arm['options_for_ngos_edit_save_and_close'] == "yes"){
				    
				    $option_menu_array[]
					= array(
						"img_name"              =>  "save_and_close-white.png",
						"class_name"            =>  "option_ngo_save_and_close",
						"button_text"           =>  "Save task and close",
						"big_icon"		=>  "yes",
						"margin_top_px"		=>  "margin-top:7px;",
						"order_position"	=>  -1001
						);
				    
				}
				#save and close (close)
				
				#save and publish (open)
				if($arm['options_for_ngos_edit_save_and_publish'] == "yes"){
				    
				    #confirmation div (open)
				    if(1==1){
					$confirmation_div_and_form =
					    '<div
						style="
						    border-radius:20px;
						    background-color:#fff;
						    text-align:center;
						    position:absolute;
						    padding:20px;
						    z-index:10;
						    border:1px solid black;
						    margin-left:-53px;
						    margin-top:-153px;
						    width:180px;
						    display:none;
						"
						class="save_and_publish_task_preliminary_div confirmation_div"
					    >
						<p style="font-weight:bold;">
						    Are you sure that you want publish this task?
						</p>
						<p>
						    Once it is published, you will no longer be able
						    to edit any task information or correct typing errors.
						</p>
						<div style="margin-top:5px;">
						    <div
							style="width:50px;display:inline-block;"
							class="voluno_button save_and_publish_task_preliminary_cancel"
						    >
							Cancel
						    </div>
						    <div
							style="width:60px;display:inline-block;"
							class="voluno_button save_and_publish_task_preliminary_confirm"
						    >
							Publish
						    </div>
						</div>
					    </div>';
				    }
				    #confirmation div (close)
				    
				    #div with check if task is ready for publication div (open)
				    if(1==1){
					
					#function-fixed-div.php (open)
					if(1==1){
					    $function_fixed_div_part = 1; //1 or 2, obligatory
					    $function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
					    $function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
					    $function_fixed_div_div_name = "validation_before_publication_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
					    $function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
					    $function_fixed_div_border_radius = 25; //optional, default is 0
					    $function_fixed_div_cancel_button = "yes"; //optional, default is yes
					    $function_fixed_div_height_div = "10"; //optional, in percent, default is 50
					    $function_fixed_div_text_align = "center"; //optional, default is left
					    $function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
					    $function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
					    include('#function-fixed-div.php');
					    $div_open = $function_fixed_div_display;
					#function-fixed-div.php
					    $function_fixed_div_part = 2; //1 or 2, both are obligatory
					    include('#function-fixed-div.php');
					    $div_close = $function_fixed_div_display;
					}
					#function-fixed-div.php (close)
					
					#problems (open)
					if(1==1){
					    
					    #array (open)
					    if(1==1){
						$problems_array = array(
						    array(
							    'title'=>"Title",
							    'text'=>"Please summarize what the task is about in less than 10 words.",
							    'class'=>"title"
							),
						    array(
							    'title'=>"Short description",
							    'text'=>"Please summarize what the task is about in one or two sentences.",
							    'class'=>"short_description"
							),
						    array(
							    'title'=>"Task category",
							    'text'=>"Please select between 1 and ".$max_of_allowed_task_category_selection
							    ." categories which the task falls into.
							    <br>
							    (To do that, please extend the box \"Task categories\". It's on the left side".
							    " of the screen, just above the box \"Detailed description\".)",
							    'class'=>"category"
							),
						    array(
							    'title'=>"Long open description",
							    'text'=>"Please provide general information on the task for volunteers before they apply.",
							    'class'=>"general_description"
							),
						    array(
							    'title'=>"Long confidential description",
							    'text'=>"Pease provide specific information that is only".
								" intended for the volunteer that you selected.",
							    'class'=>"specific_description"
							),
						    array(
							    'title'=>"Development organization",
							    'text'=>"For which organization are you creating this task?",
							    'class'=>"ngo"
							),
						    array(
							    'title'=>"Expected duration",
							    'text'=>"How much time do you think an average volunteer would need to complete the task?",
							    'class'=>"expected_duration"
							),
						    array(
							    'title'=>"Completion deadline",
							    'text'=>"When does the task need to be completed at the latest?",
							    'class'=>"completion_deadline"
							),
						    array(
							    'title'=>"Assignment deadline",
							    'text'=>"Until when should volunteers have applied at the latest?",
							    'class'=>"assignment_deadline"
							)
						);
					    }
					    #array (close)
					    
					    unset($problems);
					    for($aax=0;$aax<count($problems_array);$aax++){
						$problems .= '
						<div  class="vbp_items vbp_'.$problems_array[$aax]['class'].'" style="display:none;">
						<ul>
						<li>
						    <div style="font-weight:bold;">
							'.$problems_array[$aax]['title'].':
						    </div>
						    <p>
							'.$problems_array[$aax]['text'].'
						    </p>
						</li>
						</ul></div>';
					    }
					    
					}
					#problems (close)
					
					$confirmation_div_and_form .=
					    $div_open.'
					    <h1 style="display:inline-block;">
						Before publishing, please check...
					    </h1>
					    <div style="margin:20px auto;width:80%;max-height:350px;overflow-y: auto;padding:0% 10%;">
					    
						'.$problems.'
					    
					    </div>
					    '.$div_close;
					
				    }
				    #div with check if task is ready for publication div (close)
				    
				    $option_menu_array[]
					= array(
					    "img_name"              =>  "publish_white.png",
					    "class_name"            =>  "option_ngo_save_and_publish",
					    "button_text"           =>  "Publish the task, so that volunteers can apply to it.",
					    "code_before_button"    =>  $confirmation_div_and_form,
					    "big_icon"		=>  "yes"
					    );
				    
				}
				#save and publish (close)
				
			    }
			    #GROUP: edit mode (close)
			    
			    #delete (open)
			    if($arm['options_for_ngos_delete'] == "yes"){
				
				#confirmation div (open)
				if(1==1){
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-70px;
						margin-top:-70px;
						width:200px;
						display:none;
					    "
					    class="delete_task_preliminary_div confirmation_div"
					>
					    <p>
						Are you sure that you want to permanently delete this task?
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button delete_task_preliminary_cancel"
						>
						    No
						</div>
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button delete_task_preliminary_confirm"
						>
						    Yes
						</div>
					    </div>
					</div>';
				}
				#confirmation div (close)
				
				#delete task form (open)
				if(1==1){
				    
				    $confirmation_div_and_form =
					$confirmation_div_and_form.
					'<form
					    class="delete_task_form"
					    method="post"
					    action="'.get_permalink().'?type=task&id='.$task_row->task_id.'"
					>
					    <input type="hidden" name="delete_task" value="1">
					</form>';
				    
				}
				#delete task form (close)
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "delete_white.png",
					    "class_name"            =>  "option_ngo_delete",
					    "button_text"           =>  "Permanently delete task",
					    "code_before_button"    =>  $confirmation_div_and_form,
					    "big_icon"		    =>  "yes"
					    );
				    
			    }
			    #delete (close)
			    
			    #delete and return to work center (only when creating new task) (open)
			    if($arm['options_for_ngos_delete_and_go_back'] == "yes"){
				
				#confirmation div (open)
				if(1==1){
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-70px;
						margin-top:-70px;
						width:200px;
						display:none;
					    "
					    class="delete_task_and_go_back_preliminary_div confirmation_div"
					>
					    <p>
						Are you sure that you want to permanently delete this task and return to the Work Center?
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button delete_task_and_go_back_preliminary_cancel"
						>
						    No
						</div>
						<a href="'.get_permalink().'">
						    <div
							style="width:30px;display:inline-block;"
							class="voluno_button delete_task_and_go_back_preliminary_confirm"
						    >
							Yes
						    </div>
						</a>
					    </div>
					</div>';
				}
				#confirmation div (close)
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "delete_white.png",
					    "class_name"            =>  "option_ngo_delete_and_go_back",
					    "button_text"           =>  "Permanently delete task",
					    "code_before_button"    =>  $confirmation_div_and_form,
					    "big_icon"		=>  "yes"
						);
				
			    }
			    #delete and return to work center (only when creating new task) (close)
			    
			}
			#ngos (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div">';
			    
			    #title and img (open)
			    if(1==1){
				echo '
				<img src="'.$content_div_img.'" class="content_div_img">
				<h5 class="content_div_title" style="display:inline;">
				    <a style="cursor:pointer;">
					Actions
				    </a>
				</h5>';
			    }
			    #title and img (close)
			    
			    #content (open)
			    if(1==1){
				echo '
				<div class="content_div_content" style="text-align:justify;">
				    <table>
					<tr>';
					    
					    #ordering options (open)
					    if(1==1){
						
						unset($ordering_array);
						
						for($nine=0;$nine<count($option_menu_array);$nine++){
						    
						    if(empty($option_menu_array[$nine]["order_position"])){
							$option_menu_array[$nine]["order_position"] = 0 + ($nine /100);
						    }
						    
						    $ordering_array[] = $option_menu_array[$nine]["order_position"];
						    
						}
						
						$ordering_array_content = $option_menu_array;
						sort($ordering_array);
						
						for($nine=0;$nine<count($ordering_array);$nine++){
						    
						    $ordered_position = array_search($ordering_array_content[$nine]["order_position"],$ordering_array);
						    
						    $option_menu_array[$ordered_position] = $ordering_array_content[$nine];
						    
						}
						
					    }
					    #ordering options (close)
					    
					    $image_format = 30;
					    $div_format = $image_format + 20;
					    $td_format = $div_format + 10;
					    
					    #loop (open)
					    for($nine=0;$nine<count($option_menu_array);$nine++){
						
						#big icon setting (open)
						if(1==1){
						    
						    if($option_menu_array[$nine]["big_icon"] == "yes"){
							$image_format_specific = $image_format + 10;
							$padding = 5;
						    }else{
							$image_format_specific = $image_format;
							$padding = 10;
						    }
						    
						}
						#big icon setting (close)
						
						#function-image-processing (open)
						if(1==1){
						    
						    #thematic only
							$function_propic__type = "thematic";
							$function_propic__original_img_name = $option_menu_array[$nine]["img_name"];
							$function_propic__min_geometry = "yes";
						    #all
							$function_propic__geometry = array($image_format_specific,$image_format_specific); //optional, if e.g. only width: 300, NULL; vice versa
						    include('#function-image-processing.php');
						    
						}
						#function-image-processing (close)
						
						echo '
						<td
						    style="
							width:'.(100/count($option_menu_array)).'%;
							padding:0px;
						    "
						>
						    <div
							style="
							    margin:auto;
							    width:'.$div_format.'px;
							    padding:0px;
							"
						    >';
							
							#code before (open)
							if(!empty($option_menu_array[$nine]["code_before_button"])){
							    echo
							    $option_menu_array[$nine]["code_before_button"];
							}
							#code before (close)
							
							#img and link (open)
							if(1==1){
							    echo '
							    <a
								class="
								    '.$option_menu_array[$nine]["class_name"].'
								    voluno_button';
								    if(!empty($option_menu_array[$nine]["icon_bg_color"])){
									echo '
									opacity_on_hover';
								    }
								echo '
								"
								style="
								    display:inline-block;
								    margin:0px;
								    border-radius:20px;
								    padding:'.$padding.'px;
								    text-align:center;
								    vertical-align:middle;';
								    if(!empty($option_menu_array[$nine]["icon_bg_color"])){
									echo '
									background-color:'.$option_menu_array[$nine]["icon_bg_color"];
								    }
								echo '
								"
								title="'.$option_menu_array[$nine]["button_text"].'"';
								
								#link button (open)
								if(!empty($option_menu_array[$nine]["link_button"])){
								    echo '
								    href="'.$option_menu_array[$nine]["link_button"].'"';
								}
								#link button (close)
								
							    echo '
							    >
								<img
								    style="
									height:'.$image_format_specific.'px;
									width:'.$image_format_specific.'px;
									margin:0px;
									padding:0px;
								    "
								    src="'.$function_propic.'"
								>
							    </a>';
							}
							#img and link (close)
							
						    echo '
						    </div>
						</td>';
						
					    }
					    #loop (close)
					    
					echo '
					</tr>
				    </table>
				</div>';
			    }
			    #content (close)
			    
			echo '
			</div>';
		    }
		    #content (close)
		    
		}
		#options (close)
		
		#basic information (open)
		if($arm['basic_info'] == "yes"){
		    
		    #preparation (open)
		    if(1==1){
				
				$member_profile_pic_size = 70;
				
				#function-image-processing (open)
				if(1==1){
					
					#thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "task_info.png";
					#all
					$function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
					include('#function-image-processing.php');
					$function_propic_content_div_img = $function_propic;
					   
					#profile picture
					$function_propic__type = "profile picture";
					$function_propic__user_id = $task_row->task_author_id;
					#all
					$function_propic__geometry = array($member_profile_pic_size,$member_profile_pic_size); //optional, if e.g. only width: 300, NULL; vice versa
					include('#function-image-processing.php');
					$function_propic_author = $function_propic;
					   
					#ngo logo
					$function_propic__type = "ngo logo";
					$function_propic__ngo_id = $task_row->ngo_id;
					#all
					$function_propic__geometry = array(150,$member_profile_pic_size); //optional, if e.g. only width: 300, NULL; vice versa
					include('#function-image-processing.php');
					$function_propic_ngo = $function_propic;
					
				}
				#function-image-processing (close)
				
				#profile links (open)
				if(1==1){
					
					#author (open)
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
								
								$function_profileLink['id'] = $task_row->task_author_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
								$function_profileLink['link']_author = $function_profileLink['link'];
								$function_profileLink['name_link']_author = $function_profileLink['name_link'];
								$function_profileLink['link_title']_author = $function_profileLink['link_title'];
								
							}
							#output (close)
							
						}
						#function-profile-link.php (v1.0) (close)
						
					}
					#author (close)
					
					#ngo (open)
					if(1==1){
						
						#function-profile-link.php (v1.0) (open)
						if(!empty($task_row->ngo_id) AND $task_row->ngo_id != 0){
							
							#documentation (open)
							if(1==1){
								
								// Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
								// Provides complete link, link address, name, or link title.
								// Optionally displays image of user on hover of link.
								
							}
							#documentation (close)
							
							#input (open)
							if(1==1){
								
								$function_profileLink['id'] = $task_row->ngo_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
								$function_profileLink['link']_ngo = $function_profileLink['link'];
								$function_profileLink['name_link']_ngo = $function_profileLink['name_link'];
								$function_profileLink['link_title']_ngo = $function_profileLink['link_title'];
								
							}
							#output (close)
							
						}
						#function-profile-link.php (v1.0) (close)
						
					}
					#ngo (close)
					
				}
				#profile links (close)
				
				#function-timezone.php (open)
				if(1==1){
					
					$function_timezone = $task_row->task_deadline;
					$function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_1 = $function_timezone;
					
					$function_timezone = $task_row->task_deadline;
					$function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_2 = $function_timezone;
					$function_timezone_deadline = $function_timezone_1.", ".$function_timezone_2;
					
					$function_timezone = $task_row->task_deadline;
					$function_timezone_wording = "left";
					$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_deadline2 = $function_timezone;
					
					
					$function_timezone = $task_row->task_assignment_deadline;
					$function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_1 = $function_timezone;
					
					$function_timezone = $task_row->task_assignment_deadline;
					$function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_2 = $function_timezone;
					$function_timezone_assignment_deadline = $function_timezone_1.", ".$function_timezone_2;
					
					$function_timezone = $task_row->task_assignment_deadline;
					$function_timezone_wording = "left";
					$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_assignment_deadline2 = $function_timezone;
					
					
					
					$function_timezone = $task_row->task_date_created;
					$function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_1 = $function_timezone;
					
					$function_timezone = $task_row->task_date_created;
					$function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_2 = $function_timezone;
					$function_timezone_created = $function_timezone_1.", ".$function_timezone_2;
					
					$function_timezone = $task_row->task_date_created;
					$function_timezone_wording = "left";
					$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
					//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
					//"date (weekday short)","time (hour min sec)","time (hour min)"
					include('#function-timezone.php');
					#output:
					$function_timezone_created2 = $function_timezone;
				  
				}
				#function-timezone.php (close)
				
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			echo '
			<div class="content_div">';
			    
			    #title and img (open)
			    if(1==1){
				echo '
				<img src="'.$function_propic_content_div_img.'" class="content_div_img">
				<h5 class="content_div_title" style="display:inline;">
				    <a style="cursor:pointer;">
					Basic information
				    </a>
				</h5>';
			    }
			    #title and img (close)
			    
			    #text (open)
			    if(1==1){
				
				$margin_top = 10;
				
				echo '
				<div class="content_div_content">';
				    
				    #non-edit (open)
				    if($arm['edit_mode'] != "yes"){
					
					#author and organization (open)
					if(1==1){
					    
					    echo '
					    <table style="margin-top:'.$margin_top.'px;">
						<tr>
						    <td>';
							
							#author name (open)
							if(1==1){
							    echo '
							    <div style="margin-bottom:10px;">
								<strong>
								    Author:
								</strong>
								<br>
								'.$function_profileLink['name_link']_author.'
							    </div>';
							}
							#author name (close)
							
							#organization name (open)
							if(1==1){
							    echo '
							    <div>
								<strong>
								    Organization:
								</strong>
								<br>';
								if(empty($task_row->ngo_id) OR $task_row->ngo_id == 0){
								    echo '
								    <span style="color:red;">
									Please select an organization.
								    </span>';
								    $is_an_ngo_selected = "no";
								}else{
								    echo 
								    $function_profileLink['name_link']_ngo;
								}
								echo '
							    </div>';
							}
							#organization name (close)
							
						    echo '
						    </td>';
						    
						    #author img (open)
						    if(1==1){
							echo '
							<td style="width:70px;">
							    <a
								href="'.$function_profileLink['link']_author.'"
								title="'.$function_profileLink['link_title']_author.'"
							    >
								<img
								    class="opacity_on_hover"
								    src="'.$function_propic_author.'"
								    style="border-radius:15px;border:1px solid black;"
								>
							    </a>
							</td>';
						    }
						    #author img (close)
						    
						echo '
						</tr>
					    </table>';
					    
					    #organization img (open)
					    if($is_an_ngo_selected != "no"){
						echo '
						<div style="text-align:center;">
						    <a
							href="'.$function_profileLink['link']_ngo.'"
							title="'.$function_profileLink['link_title']_ngo.'"
						    >
							<img
							    class="opacity_on_hover"
							    src="'.$function_propic_ngo.'"
							    style="padding:10px;border:1px solid black;background-color:#fff;"
							>
						    </a>
						</div>';
					    }
					    #organization img (close)
					    
					}
					#author and organization (close)
					
					#assigned volunteer (open)
					if($arm['assigned_volunteer'] == "yes"){
					    
					    #preparation (open)
					    if(1==1){
						
						#in case there is an assigned volunteer (open)
						if(!empty($assigned_volunteer_row)){
						    
						    #function-image-processing (open)
						    if(1==1){
							
							#profile picture
							    $function_propic__type = "profile picture";
							    $function_propic__user_id = $assigned_volunteer_row->application_user_id;
							#all
							    $function_propic__geometry = array($member_profile_pic_size,$member_profile_pic_size); //optional, if e.g. only width: 300, NULL; vice versa
							    include('#function-image-processing.php');
							    $function_propic_volunteer = $function_propic;
							
						    }
						    #function-image-processing (close)
							
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
									
									$function_profileLink['id'] = $assigned_volunteer_row->usersext_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
									
									$function_profileLink['link']_volunteer = $function_profileLink['link'];
									$function_profileLink['name_link']_volunteer = '<br>'.$function_profileLink['name_link'];
									$function_profileLink['link_title']_volunteer = $function_profileLink['link_title'];
									
								}
								#output (close)
								
							}
							#function-profile-link.php (v1.0) (close)
						    
						}
						#in case there is an assigned volunteer (close)
						
						#in case there is no assigned volunteer (open)
						else{
						    $function_profileLink['name_link']_volunteer = '
						    <span style="font-style:italic;color:grey;">
							None
						    </span>';
						}
						#in case there is no assigned volunteer (close)
						
					    }
					    #preparation (close)
					    
					    #content (open)
					    if(1==1){
						
						echo '
						<table style="margin-top:'.$margin_top.'px;">
						    <tr style="padding:0px;margin:0px;">
							<td style="padding:0px;margin:0px;">
							    <div>
								<strong>
								    Assigned volunteer:
								</strong>
								'.$function_profileLink['name_link']_volunteer.'
							    </div>
							</td>';
							
							#in case there is no assigned volunteer (open)
							if(!empty($assigned_volunteer_row)){
							    echo '
							    <td style="width:70px;padding:0px;margin:0px;">
								<a
								    href="'.$function_profileLink['link']_volunteer.'"
								    title="'.$function_profileLink['link_title']_volunteer.'"
								>
								    <img
									class="opacity_on_hover"
									src="'.$function_propic_volunteer.'"
									style="border-radius:15px;border:1px solid black;"
								    >
								</a>
							    </td>';
							}
							#in case there is no assigned volunteer (close)
							
						    echo '
						    </tr>
						</table>';
						
					    }
					    #content (close)
					    
					}
					#assigned volunteer (close)
					
					#task type (open)
					if(1==1){
					    echo '
					    <div style="margin-top:'.$margin_top.'px;">
						<strong>
						    Task categories:
						</strong>
						<br>';
						if(empty($task_types_results)){
						    echo '
						    <span style="color:red;font-style:italic;">
							Please add at least one task category.
						    </span>';
						}else{
						    for($five=0;$five<count($task_types_results);$five++){
							
							if($five>0){
							    echo ';';
							}
							
							echo '
							<a
							    style="cursor:help;"
							    title="'.$task_types_results[$five]->task_type_description.'"
							>'.
							    $task_types_results[$five]->task_type_name.
							'</a>';
							
						    }
						}
					    echo '
					    </div>';
					}
					#task type (close)
					
					#expected duration (open)
					if(1==1){
					    echo '
					    <div style="margin-top:'.$margin_top.'px;">
						<strong>
						    Expected duration:
						</strong>
						<br>';
						if(empty($task_row->task_expected_duration)){
						    echo '
						    <span style="color:red;font-style:italic;">
							Please give an estimate.
						    </span>';
						}else{
						    
						    #function-minutes-into-nice-format (open)
						    if(1==1){
							$function_minutes_into_nice_format = $task_row->task_expected_duration;
							$function_minutes_into_nice_format_long = "yes"; //default: no/empty
							include('#function-minutes-into-nice-format.php');
							#output: $function_minutes_into_nice_format
						    }
						    #function-minutes-into-nice-format (close)
						    
						    echo
						    $function_minutes_into_nice_format;
						}
					    echo '
					    </div>';
					}
					#expected duration (close)
					
					#dates (open)
					if(1==1){
					    echo '
					    <div style="margin-top:'.$margin_top.'px;">
						<strong>
						    Task deadline:
						</strong>
						<br>';
						if($task_row->task_deadline == "0000-00-00 00:00:00"){
						    echo '
						    <span style="color:red;font-style:italic;">
							Please specify a completion deadline.
						    </span>';
						}else{
						    echo 
						    $function_timezone_deadline.'
						    <br>
						    ('.$function_timezone_deadline2.')';
						}
					    echo '
					    </div>
					    <div style="margin-top:'.$margin_top.'px;">
						<strong>
						    Application deadline:
						</strong>
						<br>';
						if($task_row->task_assignment_deadline == "0000-00-00 00:00:00"){
						    echo '
						    <span style="color:red;font-style:italic;">
							Please specify an assignment deadline.
						    </span>';
						}else{
						    echo 
						    $function_timezone_assignment_deadline.'
						    <br>
						    ('.$function_timezone_assignment_deadline2.')';
						}
					    echo '
					    </div>
					    <div style="margin-top:'.$margin_top.'px;">
						<strong>
						    Creation date:
						</strong>
						<br>
						'.$function_timezone_created.'
						<br>
						('.$function_timezone_created2.')
					    </div>';
					}
					#dates (close)
					
					#file size (open)
					if(1==1){
					    
					    echo '
					    <div
						style="
						    margin-top:'.$margin_top.'px;
						    border:1px solid black;
						    cursor:help;
						    height:20px;
						    background-color:#fff;
						    border-radius:20px;
						    overflow:hidden;
						"
						title="Each task can use files of up to 50 MB.&#013;If you need more space, please use'.
						' other email or filesharing services such as Google Drive or Dropbox."
					    >
						<div
						    style="
							text-align:center;
							position:absolute;
							vertical-align:middle;
							height:20px;
							width:230px;
						    "
						>
						    '.number_format($percent_of_task_space_used).' % of task space used
						</div>
						<div
						    style="';
							if($percent_of_task_space_used < 50){
							    $color = "#86ED74"; //green
							}elseif($percent_of_task_space_used < 75){
							    $color = "#FFCC00"; //yellow
							}else{
							    $color = "#FF3300;"; //red
							}
							echo '
							background-color:'.$color.';
							width:'.$percent_of_task_space_used.'%;
							height:20px;
							border-radius:20px;
						    "
						>
						    &nbsp;
						</div>
					    </div>';
					    
					}
					#file size (close)
					
				    }
				    #non-edit (close)
				    
				    #edit (open)
				    if($arm['edit_mode'] == "yes"){
					
					echo '
					<div class="show_this_in_edit_mode" style="margin-top:20px;">';
					    
					    #organizaiton (open)
					    if(1==1){
						
						#prepare (open)
						if(1==1){
						   
						    #function-help-word.php (open)
						    if(count($my_organizations_results)>1){
							$function_help_word_hover_link = '
							    <div style="font-weight:bold;margin:20px 0px 5px 0px;">
								Organization:
							    </div>';
							$function_help_word_help_content =
							    '<p>
								Please choose the development organization
								which the task is for.
							    </p>';
							$function_help_word_width = "250px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
							$function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
							include('#function-help-word.php');
						    }else{
							$function_help_word_hover_link = '
							    <div style="font-weight:bold;margin:20px 0px 5px 0px;">
								Organization:
							    </div>';
							$function_help_word_help_content =
							    '<p>
								The development organization which the task belongs to.
							    </p>';
							$function_help_word_width = "250px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
							$function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
							include('#function-help-word.php');
						    }
						    #function-help-word.php (close)
						    
						}
						#prepare (close)
						
						#content (open)
						if(1==1){
						    echo '
						    <div>
							'.$function_help_word;
							if(count($my_organizations_results)>1){
							    echo '
							    <select name="edit_ngo" class="edit_ngo">
								<option value="">
								    -Please select-
								</option>';
								for($aas=0;$aas<count($my_organizations_results);$aas++){
								    
								    if(empty($my_organizations_results[$aas]->task_id)){
									$selected = "";
								    }else{
									$selected = 'selected="selected"';
								    }
								    
								    echo '
								    <option value="'.$my_organizations_results[$aas]->ngo_id.'" '.$selected.'>
									'.$my_organizations_results[$aas]->ngo_name.'
								    </option>';
								}
							    echo '
							    </select>';
							}else{
							    echo '
							    <input
								type="hidden"
								name="edit_ngo"
								class="edit_ngo"
								value="'.$my_organizations_results[0]->ngo_id.'"
							    >
							    <input
								disabled
								style="text-align:center;"
								value="'.$my_organizations_results[0]->ngo_name.'"
							    >';
							}
						    echo '
						    </div>';
						}
						#content (close)
						
					    }
					    #organizaiton (close)
					    
					    #expected duration (open)
					    if(1==1){
						
						#prepare (open)
						if(1==1){
						   
						    #function-help-word.php (open)
						    if(1==1){
							$function_help_word_hover_link = '
							    <div style="font-weight:bold;margin:20px 0px 5px 0px;">
								Expected duration:
							    </div>';
							$function_help_word_help_content =
							    '<p>
								How much pure working time is an average
								volunteer probably going to need to
								complete this task?
							    </p>';
							$function_help_word_width = "250px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
							$function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
							include('#function-help-word.php');
						    }
						    #function-help-word.php (close)
						    
						    $expected_duration_array = array(
							    10,     30,
							    60*1,   60*2,   60*5,   60*10,
							    60*20,  60*50,  60*100, 60*101
							);
						    
						}
						#prepare (close)
						
						#content (open)
						if(1==1){
						    echo '
						    <div>
							'.$function_help_word.'
							<select name="edit_expected_duration" class="edit_expected_duration">
							    <option value="">
								-Please select-
							    </option>';
							    for($aas=0;$aas<count($expected_duration_array);$aas++){
								
								if($task_row->task_expected_duration == $expected_duration_array[$aas]){
								    $selected = 'selected="selected"';
								}else{
								    $selected = "";
								}
								
								#function-minutes-into-nice-format (open)
								if(1==1){
								    $function_minutes_into_nice_format = $expected_duration_array[$aas];
								    $function_minutes_into_nice_format_long = "yes"; //default: no/empty
								    include('#function-minutes-into-nice-format.php');
								    #output: $function_minutes_into_nice_format
								}
								#function-minutes-into-nice-format (close)
								
								echo '
								<option value="'.$expected_duration_array[$aas].'" '.$selected.'>
								    '.$function_minutes_into_nice_format.'
								</option>';
							    }
							echo '
							</select>
						    </div>';
						}
						#content (close)
						
					    }
					    #expected duration (close)
					    
					    #select completion deadline (open)
					    if(1==1){
						
						#preparation (open)
						if(1==1){
						    
						    #help word (open)
						    if(1==1){
							$function_help_word_width = "450px";
							$function_help_word_margin = "margin-left:-200px;";
							$function_help_word_variable_only = "yes";
							$function_help_word_hover_link = '
							    <div style="font-weight:bold;margin:20px 0px 5px 0px;">
								Completion deadline:
							    </div>';
							$function_help_word_help_content = '
							    <b>Until when should the task be completed?</b>
							    <p>
							    When setting a deadline, you should keep several thing in mind:
							    </p><br>
							    <ul>
								<li>
								    <b>Can it be done?</b><br>
								    Is it possible to complete the task in this time span?
								    Please note that the majority of our vcolunteers
								    have full-time jobs and can only work on Voluno tasks
								    for a few hours per day.<br>
								    Please also keep in mind that it might take some time
								    to find a suitable volunteer (see next field).<br><br>
								</li>
								<li>
								    <b>What if it is not done?</b><br>
								    Despite of all efforts, it is possible that no volunteer is found.
								    If one is found, it is always possible
								    that the volunteer fails to comlete the task on time. In case this
								    happens, you should still plan enough
								    buffer time to complete the task yourself.
								</li>
							    </ul>';
							include('#function-help-word.php');
						    }
						    #help word (close)
						    
						}
						#preparation (close)
						
						echo '
						<div style="'.$form_td_title_format.'">
						    '.$function_help_word.'
						    <input
							type="text"
							class="edit_completion_deadline"
							name="edit_completion_deadline"
							readonly="readonly"
							style="width:90%;text-align:center;"';
							if($task_row->task_deadline != "0000-00-00 00:00:00"){
							    echo '
							    value="'.
								date('l, d. F Y',strtotime($task_row->task_deadline)).
							    '"';
							}
						    echo '
						    >
						</div>';
					    }
					    #select completion deadline (close)
					    
					    #select assignment deadline (open)
					    if(1==1){
						
						#preparation (open)
						if(1==1){
						    
						    #help word (open)
						    if(1==1){
							$function_help_word_width = "450px";
							$function_help_word_margin = "margin-left:-200px;";
							$function_help_word_variable_only = "yes";
							$function_help_word_hover_link = '
							    <div style="font-weight:bold;margin:20px 0px 5px 0px;">
								Assignment deadline:
							    </div>';
							$function_help_word_help_content = '
							    <p><b>Until when should the task be assigned?</b><br>
							    When the deadline is only two days away, it\'s no longer realistic
							    to complete certain work intensive tasks
							    in a proper and thorough way. The purpose of this deadline is to save
							    you and the volunteers the trouble
							    of dealing with tasks which are de-facto no longer available.<br>
							    When setting the assignment deadline, you should keep two things in mind:
							    </p><br>
							    <ul>
								<li>
								    <b>Volunteers know their capabilities better than you do</b><br>
								    If the task can, in theory, be completed within one single night
								    and if the volunteer is willing to
								    work on the task all night, then the assignment deadline should
								    be set accordingly.<br><br>
								</li>
								<li>
								    <b>You know the task better than the volunteers do</b><br>
								    If, for instance, the task requires frequent communication between
								    you and the volunteer and if you are
								    very busy and hard to reach, then you should account for this by
								    setting an early assignment deadline.
								</li>
							    </ul>';
							include('#function-help-word.php');
						    }
						    #help word (close)
						    
						}
						#preparation (close)
						
						echo '
						<div style="'.$form_td_title_format.'">
						    '.$function_help_word.'
						    <input
							type="text"
							class="edit_assignment_deadline"
							name="edit_assignment_deadline"
							style="width:90%;text-align:center;"';
							if($task_row->task_assignment_deadline != "0000-00-00 00:00:00"){
							    echo '
							    value="'.
								date('l, d. F Y',strtotime($task_row->task_assignment_deadline)).
							    '"';
							}
						    echo '
						    >
						</div>';
					    }
					    #select assignment deadline (close)
					    
					    echo '
					    <div style="margin-top:15px;text-align:center;">
						<div class="voluno_button option_ngo_close" style="margin:5px;display:inline-block;">
						    Cancel
						</div>
						<div class="voluno_button option_ngo_save" style="margin:5px;display:inline-block;">
						    Save
						</div>
						<br>
						<div class="voluno_button option_ngo_save_and_close" style="margin:5px;display:inline-block;">
						    Save and close
						</div>
					    </div>
					    
					</div>';
				    }
				    #edit (close)
				    
				echo '
				</div>';
			    }
			    #text (close)
			    
			echo '
			</div>';
		    }
		    #content (close)
		    
		}
		#basic information (close)
		
	    }
	    #right side content div (close)
	    
	#content divs table 3/3 (open)
	if($arm['content_divs_table'] == "yes"){
		    echo '
		    </td>
		</tr>
	    </table>';
	}
	#content divs table 3/3 (close)
	
	#edit form close (open)
	if($arm['edit_mode'] == "yes"){
	    echo '
	    </form>';
	}
	#edit form close (close)
	
	#error message (open)
	if($arm['error'] == "yes"){
	    
	    #task deleted (open)
	    if($arm['error_task_deleted'] == "yes"){
		
		#preparation (open)
		if(1==1){
		    
		    #function-if-problem-persits-contact-us.php (open)
		    if(1==1){
			$function_if_problem_persits_contact_us_only_contact = "yes";
			include('#function-if-problem-persits-contact-us.php');
		    }
		    #function-if-problem-persits-contact-us.php (close)
		    
		}
		#preparation (close)
		
		#content (open)
		if(1==1){
		    echo '
		    <h1>
			Task deleted
		    </h1>
		    <p>
			<br>
			This task has been deleted. If you believe that there has been a mistake,
			please '.$function_if_problem_persits_contact_us.'
			<br>
			<br>
			Click here to visit the
			<a href="'.get_permalink(688).'" title="Go to Work Center" style="font-weight:bold;">
			    Work Center'.
			'</a>.
		    </p>';
		}
		#content (close)
		
	    }
	    #task deleted (open)
	    
	}
	#error message (close)
	
	#loaoding img and mysql div (open)
	if(1==1){
	    include('#function-loaoding-img-mysql-area-div.php');
	    #no inputs, no outputs
	    #classes are: mysql_load_area AND loading_page loading_img_middle_page <- use this one
	}
	#loaoding img and mysql div (close)
	
    }
    #content (close)
    
}
#main section (close)
    
echo '
<hr style="border:5px dotted black;margin: 50px 0px;">';

#
if(1==3){
    
    #NOTE: in this page, I changed beta simplifications INSIDE the final code. search for #modified
    
    #item task section 2 - reject volunteer applications (open)
    if($arm['task_section_2'] == "yes"){
	
	#update application (open)
	if(1==1){
	    $task_id = $_GET['id'];
	    $application_code = $_GET['reject_application_code'];
	    
	    #verify application (open)
	    if(1==1){
		
		$application_query = $GLOBALS['wpdb']->prepare('SELECT *
						    FROM fi4l3fg_voluno_applications
						    WHERE application_type_specific = "task_application"
							AND application_type_general = "task"
							AND application_type_id = %s
							AND application_status = "pending"
							AND application_code = %s;'
						    ,$task_id
						    ,$application_code);
		$application_row = $GLOBALS['wpdb']->get_row($application_query);
	    }
	    #verify application (close)
	    
	    #update application (open)
	    if(1==1){
		
		$GLOBALS['wpdb']->update( 
				'fi4l3fg_voluno_applications',
			array( //updated content
				'application_status' => 'rejected'
			),
			array( //location of updated content
				'application_id' => $application_row->application_id
			),
			array( //format of updated content
				'%s'
			),
			array( //format of location of updated content
				'%s'
			    ));
		
	    }
	    #update application (close)
	    
	    #send email (open)
	    if(1==1){
		#dome
	    }
	    #send email (close)
	    
	}
	#update application (open)
	
	echo '
	<div class="mysql_visible_area">
	</div>';
    }
    #item task section 2 - reject volunteer applications (close)
    
    #echo $user_role; #dome
    
}
#

}
#marketplace item task










#table selects (open)
elseif($staging_page_section == "div_table_selects"){
    
    #variable definition (open)
    if(1==1){
	
	$function_dts_i = $function_dts; // i stands for internal
	
	#id (open)
	if(1==1){
	    
	    #random number (open)
	    if(empty($function_dts_i['name'])){
		$function_dts_i['name'] = "a";
		$function_dts_i['name_length'] = 10;
		for($function_dts_i['name_index']=0;$function_dts_i['name_index']<$function_dts_i['name_length'];$function_dts_i['name_index']++) {
		    $function_dts_i['name'] .= substr( "abcdefghijklmnopqrstuvwxyz0123456789" ,mt_rand( 0 ,62 ) ,1 );
		}
	    }
	    #random number (close)
	    
	    #function-image-processing.php (v1.0) (open)
	    if(1==1){
		#thematic only
		    $function_propic__type = "thematic";
		    $function_propic__original_img_name = 'checkbox checked.png';
		    #$function_propic__cropping = "yes"; //yes or empty (default)
		#all
		    $function_propic__geometry = array(30,30); //optional, if e.g. only width: 300, NULL; vice versa
		include('#function-image-processing.php');
		$function_dts_i['checkbox_img'] = $function_propic;
		#$function_propic__image_available <- is set to yes or no
	    }
	    #function-image-processing.php (v1.0) (close)
	    
	    #function-image-processing.php (v1.0) (open)
	    if(1==1){
		#thematic only
		    $function_propic__type = "thematic";
		    $function_propic__original_img_name = 'close_x.png';
		    #$function_propic__cropping = "yes"; //yes or empty (default)
		#all
		    $function_propic__geometry = array(20,20); //optional, if e.g. only width: 300, NULL; vice versa
		include('#function-image-processing.php');
		$function_dts_i['img_remove_selected'] = $function_propic;
		#$function_propic__image_available <- is set to yes or no
	    }
	    #function-image-processing.php (v1.0) (close)
	    
	}
	#id (close)
	
    }
    #variable definition (close)
    
    #style (open)
    if(1==1){
	$function_dts_i['output'] .= '
	<style>
	    
	    .function_dts_content_l1'.$function_dts_i['name'].',
	    .function_dts_parent_l1'.$function_dts_i['name'].',
	    .function_dts_selected_items_display_items'.$function_dts_i['name'].'{
		margin:5px;
		padding:10px;
		border-radius:10px;
		border:1px solid black;
		'.$function_dts_i['level1_div_css'].'
	    }
	    
	    .function_dts_parent_l1_selected'.$function_dts_i['name'].'{
		font-weight:bold;
	    }
	    
	    .function_dts_content_l1'.$function_dts_i['name'].'_notselected{
		background-color:#fffddd;
	    }
	    
	    .function_dts_content_l1'.$function_dts_i['name'].'_notselected_disabled{
		background-color:#dbdbdb;
		color:grey;
		cursor:not-allowed;
	    }
	    
	    .function_dts_content_l1'.$function_dts_i['name'].'_selected, .function_dts_selected_items_display_items'.$function_dts_i['name'].'{
		background-color:#FF9B51;
	    }
	    
	    .function_dts_content_l1'.$function_dts_i['name'].':hover, .function_dts_selected_items_display_items'.$function_dts_i['name'].'{
		background-color:#F86A00;
	    }
	    
	    .function_dts_parent_l1_container'.$function_dts_i['name'].'{
		'.$function_dts_i['level1_div_css'].'
	    }
	    
	    .function_dts_l2_option_notany{
		
	    }
	    .function_dts_l2_option_any{
		color:#fff;
		font-weight:bold;
		background-color:#c40000;
	    }
	    
	</style>';
    }
    #style (close)
    
    #script (open)
    if(1==1){
	
	$function_dts_i['output'] .= '
	<script>
	    jQuery(document).ready(function(){';
		
		#functions (open)
		if(1==1){
		    
		    #deselect an option (does NOT change the input) (open)
		    if(1==1){
			$function_dts_i['output'] .= '
			function function_dts_deselect_option(thisObj){
			    thisObj.
				addClass("function_dts_content_l1'.$function_dts_i['name'].'_notselected").
				removeClass("function_dts_content_l1'.$function_dts_i['name'].'_selected");
			    thisObj.find(".function_dts_checkbox_image").hide();
			    jQuery(".function_dts__option_id_display"+thisObj.find(".function_dts__option_id_original").html()).
				closest(".function_dts_selected_items_display_items'.$function_dts_i['name'].'").hide();
			    function_dts_count_selected_options();
			}';
		    }
		    #deselect an option (does NOT change the input) (close)
		    
		    #select an option (does NOT change the input) (open)
		    if(1==1){
			$function_dts_i['output'] .= '
			function function_dts_select_option(thisObj){
			    thisObj.
				addClass("function_dts_content_l1'.$function_dts_i['name'].'_selected").
				removeClass("function_dts_content_l1'.$function_dts_i['name'].'_notselected");
			    thisObj.find(".function_dts_checkbox_image").show();
			    jQuery(".function_dts__option_id_display"+thisObj.find(".function_dts__option_id_original").html()).
				closest(".function_dts_selected_items_display_items'.$function_dts_i['name'].'").show();
			    function_dts_count_selected_options();
			}';
		    }
		    #select an option (does NOT change the input) (close)
		    
		    #disable selection if max number selected (open)
		    if(!empty($function_dts_i['max_selects'])){
			$function_dts_i['output'] .= '
			
			function function_dts__blockIfMaxSelected'.$function_dts_i['name'].'(){
			    function_dts_select_counter'.$function_dts_i['name'].'();
			    if(function_dts_content_l1'.$function_dts_i['name'].' >= '.$function_dts['max_selects'].'){
				jQuery(".function_dts_content_l1'.$function_dts_i['name'].' input").not(":checked").
				    attr("disabled", true).
				    css("cursor","");
				jQuery(".function_dts_content_l1'.$function_dts_i['name'].' input").not(":checked").
				    closest(".function_dts_content_l1'.$function_dts_i['name'].'").
				    addClass("function_dts_content_l1'.$function_dts_i['name'].'_notselected_disabled").
				    removeClass("function_dts_content_l1'.$function_dts_i['name'].'_notselected");
			    }else{
				jQuery(".function_dts_content_l1'.$function_dts_i['name'].' input").not(":checked").
				    attr("disabled", false).
				    css("cursor","pointer");
				jQuery(".function_dts_content_l1'.$function_dts_i['name'].' input").not(":checked").
				    closest(".function_dts_content_l1'.$function_dts_i['name'].'").
				    addClass("function_dts_content_l1'.$function_dts_i['name'].'_notselected").
				    removeClass("function_dts_content_l1'.$function_dts_i['name'].'_notselected_disabled");
			    }
			}
			
			function_dts__blockIfMaxSelected'.$function_dts_i['name'].'();
			
			';
		    }
		    #disable selection if max number selected (close)
		    
		    #count selected options (open) #dome where's the difference to the following one? i think one of them is deprecated
		    if(1==1){
			$function_dts_i['output'] .= '
			function function_dts_count_selected_options(){
			    jQuery(".function_dts_selected_items_display_counter'.$function_dts_i['name'].'").html(
				jQuery(".function_dts_content_l1'.$function_dts_i['name'].'_selected").length
			    );
			}';
		    }
		    #count selected options (close)
		    
		    #selected counter (open)
		    if(1==1){
			$function_dts_i['output'] .= '
			var function_dts_content_l1'.$function_dts_i['name'].' = 0;
			function function_dts_select_counter'.$function_dts_i['name'].'(){
			    function_dts_content_l1'.$function_dts_i['name'].'
			    = jQuery(".function_dts_content_l1'.$function_dts_i['name'].' input:checked").length;
			}';
		    }
		    #selected counter (close)
		    
		}
		#functions (close)
		
		#parent option expanding (open)
		if(1==1){
		    $function_dts_i['output'] .= '
		    jQuery(".function_dts_parent_l1'.$function_dts_i['name'].'").click(function(){
			if(jQuery(this).hasClass("function_dts_parent_l1_selected'.$function_dts_i['name'].'")){
			    jQuery(this).removeClass("function_dts_parent_l1_selected'.$function_dts_i['name'].'");
			    
			    jQuery(this).closest(".function_dts_parent_l1_container'.$function_dts_i['name'].'").find(".function_dts_content_l2_container").slideToggle();
			}else{
			    jQuery(".function_dts_parent_l1_selected'.$function_dts_i['name'].'")
				.removeClass("function_dts_parent_l1_selected'.$function_dts_i['name'].'");
			    jQuery(this).addClass("function_dts_parent_l1_selected'.$function_dts_i['name'].'");
			    
			    jQuery(".function_dts_parent_l1'.$function_dts_i['name'].'")
				.closest(".function_dts_parent_l1_container'.$function_dts_i['name'].'")
				.find(".function_dts_content_l2_container").slideUp();
			    jQuery(this).closest(".function_dts_parent_l1_container'.$function_dts_i['name'].'")
				.find(".function_dts_content_l2_container").slideToggle();
			}
		    });
		    ';
		}
		#parent option expanding (close)
		
		#any vs. other options: deselect respectively (open)
		if(1==1){
		    $function_dts_i['output'] .= '
		    jQuery(".function_dts_l2_option_any").click(function(){
			jQuery(this).closest(".function_dts_parent_l1_container'.$function_dts_i['name'].'")
			.find(".function_dts_l2_option_notany").each(function(){
			    function_dts_deselect_option(jQuery(this));
			    jQuery(this).find("input").prop("checked",false);
			});
		    });
		    jQuery(".function_dts_l2_option_notany").click(function(){
			jQuery(this).closest(".function_dts_parent_l1_container'.$function_dts_i['name'].'")
			.find(".function_dts_l2_option_any").each(function(){
			    function_dts_deselect_option(jQuery(this));
			    jQuery(this).find("input").prop("checked",false);
			});
		    });
		    ';
		}
		#any vs. other options: deselect respectively (close)
		
		#select or deselect checkboxes (open)
		if(1==1){
		    $function_dts_i['output'] .= '
		    jQuery(".function_dts_content_l1'.$function_dts_i['name'].'").click(function(){';
			
			if(!empty($function_dts_i['max_selects'])){
			    $function_dts_i['output'] .= '
			    function_dts__blockIfMaxSelected'.$function_dts_i['name'].'();';
			}
			
			$function_dts_i['output'] .= '
			if(jQuery(this).find("input").prop("checked")){
			    function_dts_select_option(jQuery(this));
			}else{
			    function_dts_deselect_option(jQuery(this));
			}
			
		    });';
		}
		#select or deselect checkboxes (close)
		
		#display of list above the list, the summary of the selected items (open)
		if(1==1){
		    
		    $function_dts_i['output'] .= '
		    jQuery(".function_dts_selected_items_display_items'.$function_dts_i['name'].'").hover(function(){
			jQuery(this).find(".function_dts_selected_items_display_items_img'.$function_dts_i['name'].'").show();
		    },function(){
			jQuery(this).find(".function_dts_selected_items_display_items_img'.$function_dts_i['name'].'").hide();
		    });
		    
		    jQuery(".function_dts_selected_items_display_items_img'.$function_dts_i['name'].'").click(function(){
			var function_dts_option_id_for_remove = jQuery(this).
			    closest(".function_dts_selected_items_display_items'.$function_dts_i['name'].'").
			    find(".function_dts__option_id_display").html();
			function_dts_deselect_option(
			    jQuery(".function_dts__option_id_original"+function_dts_option_id_for_remove).
				closest(".function_dts_content_l1'.$function_dts_i['name'].'")
			);
			jQuery(".function_dts__option_id_original"+function_dts_option_id_for_remove).
			    closest(".function_dts_content_l1'.$function_dts_i['name'].'")
			    .find("input").prop("checked", false);
			';
			
			if(!empty($function_dts_i['max_selects'])){
			    $function_dts_i['output'] .= '
			    function_dts__blockIfMaxSelected'.$function_dts_i['name'].'();';
			}
			
			$function_dts_i['output'] .= '
		    });
		    
		    ';
		    
		}
		#display of list above the list, the summary of the selected items (close)
		
	    $function_dts_i['output'] .= '
	    });
	</script>';
	
    }
    #script (close)
    
    #content (open)
    if(1==1){
	
	#level 1 query (open)
	if(1==1){
	    
	    #wpdb prepared (varying number of arguments) (open)
	    if(count($function_dts_i['query_inputs_level1']) == 1){
		$function_dts_i['query_level1'] = $GLOBALS['wpdb']->prepare(
							    $function_dts_i['query_inputs_level1'][0]
							);
	    }elseif(count($function_dts_i['query_inputs_level1']) == 2){ //1 statement
		$function_dts_i['query_level1'] = $GLOBALS['wpdb']->prepare(
							    $function_dts_i['query_inputs_level1'][0]
							    ,$function_dts_i['query_inputs_level1'][1]
							);
	    }elseif(count($function_dts_i['query_inputs_level1']) == 3){ //2 statements
		$function_dts_i['query_level1'] = $GLOBALS['wpdb']->prepare(
							    $function_dts_i['query_inputs_level1'][0]
							    ,$function_dts_i['query_inputs_level1'][1]
							    ,$function_dts_i['query_inputs_level1'][2]
							);
	    }elseif(count($function_dts_i['query_inputs_level1']) == 4){ //3 statements
		$function_dts_i['query_level1'] = $GLOBALS['wpdb']->prepare(
							    $function_dts_i['query_inputs_level1'][0]
							    ,$function_dts_i['query_inputs_level1'][1]
							    ,$function_dts_i['query_inputs_level1'][2]
							    ,$function_dts_i['query_inputs_level1'][3]
							);
	    }elseif(count($function_dts_i['query_inputs_level1']) == 5){ //4 statements
		$function_dts_i['query_level1'] = $GLOBALS['wpdb']->prepare(
							    $function_dts_i['query_inputs_level1'][0]
							    ,$function_dts_i['query_inputs_level1'][1]
							    ,$function_dts_i['query_inputs_level1'][2]
							    ,$function_dts_i['query_inputs_level1'][3]
							    ,$function_dts_i['query_inputs_level1'][4]
							);
	    }elseif(count($function_dts_i['query_inputs_level1']) == 6){ //5 statements
		$function_dts_i['query_level1'] = $GLOBALS['wpdb']->prepare(
							    $function_dts_i['query_inputs_level1'][0]
							    ,$function_dts_i['query_inputs_level1'][1]
							    ,$function_dts_i['query_inputs_level1'][2]
							    ,$function_dts_i['query_inputs_level1'][3]
							    ,$function_dts_i['query_inputs_level1'][4]
							    ,$function_dts_i['query_inputs_level1'][5]
							);
	    }
	    #wpdb prepared (varying number of arguments) (close)
	    
	    $function_dts_i['results_level1'] = $GLOBALS['wpdb']->get_results($function_dts_i['query_level1']);
	    
	}
	#level 1 query (close)
	
	#level 1 loop (open)
	for($ahp=0;$ahp<count($function_dts_i['results_level1']);$ahp++){
	    
	    #level 2 query (open)
	    if(1==1){
		
		#wpdb prepared (varying number of arguments) (open)
		if(count($function_dts_i['query_inputs_level2']) == 1){
		    $function_dts_i['query_level2'] = $GLOBALS['wpdb']->prepare(
								$function_dts_i['query_inputs_level2'][0]
					,$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1']
							    );
		}elseif(count($function_dts_i['query_inputs_level2']) == 2){ //1 statement
		    $function_dts_i['query_level2'] = $GLOBALS['wpdb']->prepare(
								$function_dts_i['query_inputs_level2'][0]
								,$function_dts_i['query_inputs_level2'][1]
					,$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1']
							    );
		}elseif(count($function_dts_i['query_inputs_level2']) == 3){ //2 statements
		    $function_dts_i['query_level2'] = $GLOBALS['wpdb']->prepare(
								$function_dts_i['query_inputs_level2'][0]
								,$function_dts_i['query_inputs_level2'][1]
								,$function_dts_i['query_inputs_level2'][2]
					,$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1']
							    );
		}elseif(count($function_dts_i['query_inputs_level2']) == 4){ //3 statements
		    $function_dts_i['query_level2'] = $GLOBALS['wpdb']->prepare(
								$function_dts_i['query_inputs_level2'][0]
								,$function_dts_i['query_inputs_level2'][1]
								,$function_dts_i['query_inputs_level2'][2]
								,$function_dts_i['query_inputs_level2'][3]
					,$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1']
							    );
		}elseif(count($function_dts_i['query_inputs_level2']) == 5){ //4 statements
		    $function_dts_i['query_level2'] = $GLOBALS['wpdb']->prepare(
								$function_dts_i['query_inputs_level2'][0]
								,$function_dts_i['query_inputs_level2'][1]
								,$function_dts_i['query_inputs_level2'][2]
								,$function_dts_i['query_inputs_level2'][3]
								,$function_dts_i['query_inputs_level2'][4]
					,$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1']
							    );
		}elseif(count($function_dts_i['query_inputs_level2']) == 6){ //5 statements
		    $function_dts_i['query_level2'] = $GLOBALS['wpdb']->prepare(
								$function_dts_i['query_inputs_level2'][0]
								,$function_dts_i['query_inputs_level2'][1]
								,$function_dts_i['query_inputs_level2'][2]
								,$function_dts_i['query_inputs_level2'][3]
								,$function_dts_i['query_inputs_level2'][4]
								,$function_dts_i['query_inputs_level2'][5]
					,$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1']
							    );
		}
		#wpdb prepared (varying number of arguments) (close)
		
		$function_dts_i['results_level2'] = $GLOBALS['wpdb']->get_results($function_dts_i['query_level2']);
		
	    }
	    #level 2 query (close)
	    
	    #level 2 loop (open)
	    for($ahx = -1;$ahx<count($function_dts_i['results_level2']);$ahx++){
		
		#level 2 content (open)
		if(!empty($function_dts_i['results_level2'])){
		    
		    #variable definitions (open)
		    if(1==1){
			
			if($ahx==-1){
			    $function_dts_i['level2_option_value']
			    = $function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1'];
			    
			    $function_dts_i['level2_option_display_list']
			    = 'Any item in this category';
			    
			    $function_dts_i['level2_option_display_summary']
			    = $function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_to_display_level1'].' (any)';
			    
			    $function_dts_i['level2_option_type']
			    = 'function_dts_l2_option_any';
			    
			    $function_dts_i['option_id']
			    = $function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1'];
			}else{
			    $function_dts_i['level2_option_value']
			    = $function_dts_i['results_level2'][$ahx]->$function_dts_i['mysql_column_name_for_post_level2'];
			    
			    $function_dts_i['level2_option_display_list']
			    = $function_dts_i['results_level2'][$ahx]->$function_dts_i['mysql_column_name_to_display_level2'];
			    
			    $function_dts_i['level2_option_display_summary']
			    = $function_dts_i['results_level2'][$ahx]->$function_dts_i['mysql_column_name_to_display_level2'];
			    
			    $function_dts_i['level2_option_type']
			    = 'function_dts_l2_option_notany';
			    
			    $function_dts_i['option_id']
			    = $function_dts_i['results_level2'][$ahx]->$function_dts_i['mysql_column_name_for_post_level2'];
			}
			
		    }
		    #variable definitions (close)
		    
		    $function_dts_i['level2_output'] .= 
		    '<label>'.
			'<div
			    style="margin-left:50px;display:none;"
			    class="
				function_dts_content_l1'.$function_dts_i['name'].'
				function_dts_content_l2_container
				'.$function_dts_i['div_select_class'].'
				'.$function_dts_i['level2_option_type'].'
			    "
			>';
			
			#layout within the div (open)
			if(1==1){
			    
			    #level 2 checkbox (open)
			    if(1==1){
				
				#checked? (open)
				if(in_array(
					$function_dts_i['results_level2'][$ahx]->$function_dts_i['mysql_column_name_for_post_level2']
					,$function_dts_i['results_level1_checked_array'])
				AND empty($function_dts_i['results_level2'])){
				    $function_dts_i['checked'] = 'checked="checked"';
				    $function_dts_i['div_select_class'] = 'function_dts_content_l1'.$function_dts_i['name'].'_selected';
				}else{
				    unset($function_dts_i['checked']);
				    $function_dts_i['div_select_class'] = 'function_dts_content_l1'.$function_dts_i['name'].'_notselected';
				}
				#checked? (close)
				
				#checkbox style (open)
				if(empty($function_dts_i['checked'])){
				    $function_dts_i['checkbox_img_style'] = 'display:none;';
				}else{
				    unset($function_dts_i['checkbox_img_style']);
				}
				#checkbox style (close)
				
				$function_dts_i['temp_input_button'] = '
				<div style="display:inline-block;"> './/this prevents the strange behavior that the image is
									//aligned left after deselecting and reselecting it. probably a bug in jquery?
				    '<input
					class="function_dts_input_l1'.$function_dts_i['name'].'"
					style="display:nnone;"
					type="checkbox"
					'.$function_dts_i['checked'].'
					name="'.$function_dts_i['post_name'].'[]"
					value="'.$function_dts_i['level2_option_value'].'"
				    >
				    <span
					style="display:nnone;"
					class="function_dts__option_id_original function_dts__option_id_original'.$function_dts_i['option_id'].'"
				    >'.
					$function_dts_i['option_id'].
				    '</span>
				    <img
					src="'.$function_dts_i['checkbox_img'].'"
					class="function_dts_checkbox_image"
					style="
					    position:absolute;
					    margin-top:-15px;
					    '.$function_dts_i['checkbox_img_style'].'
					"
				    >
				</div>
				';
			    }
			    #level 2 checkbox (close)
			    
			    #level 2 without image (open)
			    if(1==1){
				$function_dts_i['level2_output'] .= '
				<table>
				    <tr>
					<td>
					    '.$function_dts_i['level2_option_display_list'].'
					</td>
					<td style="width:10px;">
					    '.$function_dts_i['temp_input_button'].'
					</td>
				    </tr>
				</table>';
			    }
			    #level 2 without image (close)
			    
			}
			#layout within the div (close)
			
			$function_dts_i['level2_output'] .= '
			</div>'.
		    '</label>';
		    
		    #selected items for display: adding content for initial load (open)
		    if(1==1){
			
			#preparation (open)
			if(empty($function_dts_i['checked'])){
			    $function_dts_i['selected_items_display__show_hide'] .= 'display:none;';
			}else{
			    unset($function_dts_i['selected_items_display__show_hide']);
			    $function_dts_i['selected_items_display_counter']++;
			}
			#preparation (close)
			
			$function_dts_i['selected_items_display'] .= '
			<div
			    style="
				float:left;
				'.$function_dts_i['selected_items_display__show_hide'].'
			    "
			    class="function_dts_selected_items_display_items'.$function_dts_i['name'].'"
			>
			    <div style="float:right;display:inline-block;">
				<img
				    class="function_dts_selected_items_display_items_img'.$function_dts_i['name'].'"
				    style="
					margin-top:-15px;
					margin-left:0px;
					position:absolute;
					display:none;
					cursor:pointer;
				    "
				    src="'.$function_dts_i['img_remove_selected'].'"
				>
			    </div>
			    '.$function_dts_i['level2_option_display_summary'].'
			    <span
				class="function_dts__option_id_display function_dts__option_id_display'.$function_dts_i['option_id'].'"
				style="display:none;"
			    >'.
				$function_dts_i['option_id'].
			    '</span>
			</div>';
		    }
		    #selected items for display: adding content for initial load (close)
		    
		}
		#level 2 content (close)
		
	    }
	    #level 2 loop (close)
	    
	    #level 1 content (open)
	    if(1==1){
		
		#preparation (open)
		if(1==1){
		    
		    #checked? (open)
		    if(in_array(
			    $function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1']
			    ,$function_dts_i['results_level1_checked_array'])
		    AND empty($function_dts_i['results_level2'])){
			$function_dts_i['checked'] = 'checked="checked"';
			$function_dts_i['div_select_class'] = 'function_dts_content_l1'.$function_dts_i['name'].'_selected';
		    }else{
			unset($function_dts_i['checked']);
			$function_dts_i['div_select_class'] = 'function_dts_content_l1'.$function_dts_i['name'].'_notselected';
		    }
		    #checked? (close)
		    
		    #function-image-processing.php (v1.0) (open)
		    if(!empty($function_dts_i['results_level1'][$ahp]->$function_dts_i['image_name_row'])){
			#thematic only
			    $function_propic__type = "thematic";
			    $function_propic__original_img_name
				= $function_dts_i['results_level1'][$ahp]->$function_dts_i['image_name_row'];
			    #$function_propic__cropping = "yes"; //yes or empty (default)
			#all
			    $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
			include('#function-image-processing.php');
			# $function_propic;
			#$function_propic__image_available <- is set to yes or no
		    }
		    #function-image-processing.php (v1.0) (close)
		    
		    #is it item or just item parent? (selectable or does it expand?) (open)
		    if(empty($function_dts_i['results_level2'])){
			$function_dts_i['option_class'] = 'function_dts_content_l1'.$function_dts_i['name'];
		    }else{
			$function_dts_i['option_class'] = 'function_dts_parent_l1'.$function_dts_i['name'];
		    }
		    #is it item or just item parent? (selectable or does it expand?) (close)
		    
		}
		#preparation (close)
		
		$function_dts_i['output'] .= 
		'<div class="function_dts_parent_l1_container'.$function_dts_i['name'].'">
		    <label>'.
			'<div
			    class="'.$function_dts_i['option_class'].' '.$function_dts_i['div_select_class'].'"
			>';
			
			#layout within the div (open)
			if(1==1){
			    
			    #level 1 checkbox (open)
			    if(empty($function_dts_i['results_level2'])){
				
				#checkbox style (open)
				if(empty($function_dts_i['checked'])){
				    $function_dts_i['checkbox_img_style'] = 'display:none;';
				}else{
				    unset($function_dts_i['checkbox_img_style']);
				}
				#checkbox style (close)
				
				$function_dts_i['option_id']
				= $function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_for_post_level1'];
				
				$function_dts_i['temp_input_button'] = '
				<div style="display:inline-block;"> './/this prevents the strange behavior that the image is
									//aligned left after deselecting and reselecting it. probably a bug in jquery?
				    '<input
					class="function_dts_input_l1'.$function_dts_i['name'].'"
					style="display:nnone;"
					type="checkbox"
					'.$function_dts_i['checked'].'
					name="'.$function_dts_i['post_name'].'[]"
					value="'.$function_dts_i['option_id'].'"
				    >
				    <span
					style="display:nnone;"
					class="function_dts__option_id_original function_dts__option_id_original'.$function_dts_i['option_id'].'"
				    >'.
					$function_dts_i['option_id'].
				    '</span>
				    <img
					src="'.$function_dts_i['checkbox_img'].'"
					class="function_dts_checkbox_image"
					style="
					    position:absolute;
					    margin-top:-15px;
					    '.$function_dts_i['checkbox_img_style'].'
					"
				    >
				</div>
				';
			    }else{
				unset($function_dts_i['temp_input_button']);
			    }
			    #level 1 checkbox (close)
			    
			    #level 1 with image (open)
			    if(!empty($function_dts_i['results_level1'][$ahp]->$function_dts_i['image_name_row'])){
				$function_dts_i['output'] .= '
				<table>
				    <tr>
					<td style="width:23px;">
					    <img src="'.$function_propic.'">
					</td>
					<td>
					    '.$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_to_display_level1'].'
					</td>
				    </tr>
				    <tr style="padding:0px;">
					<td colspan="2" style="padding:0px;">
					    <div style="height:1px;text-align:right;padding-right:20px;">
						'.$function_dts_i['temp_input_button'].'
					    </div>
					</td>
				    </tr>
				</table>';
			    }
			    #level 1 with image (close)
			    
			    #level 1 without image (open)
			    else{
				$function_dts_i['output'] .= '
				<table>
				    <tr>
					<td>
					    '.$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_to_display_level1'].'
					</td>
					<td style="width:10px;">
					    '.$function_dts_i['temp_input_button'].'
					</td>
				    </tr>
				</table>';
			    }
			    #level 1 without image (close)
			    
			}
			#layout within the div (close)
			
			$function_dts_i['output'] .= '
			</div>'.
		    '</label>
		    '.$function_dts_i['level2_output'].'
		</div>';
		unset($function_dts_i['level2_output']);
		
		#selected items for display: adding content for initial load (open)
		if(empty($function_dts_i['results_level2'])){
		    
		    #preparation (open)
		    if(empty($function_dts_i['checked'])){
			$function_dts_i['selected_items_display__show_hide'] .= 'display:none;';
		    }else{
			unset($function_dts_i['selected_items_display__show_hide']);
			$function_dts_i['selected_items_display_counter']++;
		    }
		    #preparation (close)
		    
		    $function_dts_i['selected_items_display'] .= '
		    <div
			style="
			    float:left;
			    '.$function_dts_i['selected_items_display__show_hide'].'
			"
			class="function_dts_selected_items_display_items'.$function_dts_i['name'].'"
		    >
			<div style="float:right;display:inline-block;">
			    <img
				class="function_dts_selected_items_display_items_img'.$function_dts_i['name'].'"
				style="
				    margin-top:-15px;
				    margin-left:0px;
				    position:absolute;
				    display:none;
				    cursor:pointer;
				"
				src="'.$function_dts_i['img_remove_selected'].'"
			    >
			</div>
			'.$function_dts_i['results_level1'][$ahp]->$function_dts_i['mysql_column_name_to_display_level1'].'
			<span
			    class="function_dts__option_id_display function_dts__option_id_display'.$function_dts_i['option_id'].'"
			    style="display:none;"
			>'.
			    $function_dts_i['option_id'].
			'</span>
		    </div>';
		}
		#selected items for display: adding content for initial load (close)
		
	    }
	    #level 1 content (close)
	    
	}
	#level 1 loop (close)
	
    }
    #content (close)
    
    #output (open)
    if(1==1){
	
	unset($function_dts);
	
	$function_dts['selected_items_display'] =
	    '<div class="function_dts_selected_items_display'.$function_dts_i['name'].'" style="overflow:hidden;">
		'.$function_dts_i['selected_items_display'].'
	    </div>';
	
	$function_dts['selected_items_display_counter'] =
	    '<span
		class="function_dts_selected_items_display_counter'.$function_dts_i['name'].'"
	    >'.
		$function_dts_i['selected_items_display_counter'].
	    '</span>';
	
	$function_dts['output'] = $function_dts_i['output'];
	
	unset($function_dts_i);
	
    }
    #output (close)
    
}
#table selects (close)

?>