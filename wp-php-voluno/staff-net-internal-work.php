<?php

#access rights management (arm) (open)
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
    
    #definition of specific user restrictions (open)
    if(1==1){
        
	#website admin (open)
	$arm_array[] = array(
	    'access_right' => 'website_admin'
	    ,'display_title' => 'Website Administrator'
	    ,'department' => 'it'
	    ,'allowed_positions' => array(
		'website_admin'
	    )
	);
	#website admin (close)
	
	#website admin (open)
	$arm_array[] = array(
	    'access_right' => 'coordinator'
	    ,'display_title' => 'Coordinator'
	    ,'department' => 'democratic'
	    ,'allowed_positions' => array(
		'coordinator'
	    )
	);
	#website admin (close)
	
	#hr officer (open)
	$arm_array[] = array(
	    'access_right' => 'hr_officer'
	    ,'display_title' => 'Human Resources Officer'
	    ,'department' => 'operations'
	    ,'allowed_positions' => array(
		'hr_officer'
	    )
	);
	#hr officer (close)
	
	#moderate forum posts (open)
	$arm_array[] = array(
	    'access_right' => 'forum_moderator'
	    ,'display_title' => 'Forum moderator'
	    ,'department' => 'operations'
	    ,'allowed_positions' => array(
		'forum_moderator'
	    )
	);
	#moderate forum posts (close)
	
    }
    #definition of specific user restrictions (close)
    
    #execution of specific user restrictions (open)
    if(1==1){
	for($aci=0;$aci<count($arm_array);$aci++){
	    
	    $access_right = $arm_array[$aci]['access_right'];
	    $allowed_positions = $arm_array[$aci]['allowed_positions'];
	    
	    $access_right_display_title_array[$arm_array[$aci]['access_right']] = $arm_array[$aci]['display_title'];
	    
	    for($acj=0;$acj<count($allowed_positions);$acj++){
		if(in_array($allowed_positions[$acj],$function_userpositions_get['simple_pure_array']['accepted'])){
		    ${'arm_'.$access_right} = "yes";
		}else{
		    ${'arm_'.$access_right} = "no";
		}
	    }
	    
	}
    }
    #execution of specific user restrictions (close)
    
    #page section (open)
    if(!empty($_POST['path']) OR $get_path == "ajax files"){
	$page_section = "ajax files";
    }elseif(${'arm_'.$_GET['section']} == "yes"){
	$page_section = $_GET['section'];
    }else{
	$page_section = "overview";
	$access_right_display_title_array['overview'] = 'Overview';
    }
    #page section (close)
    
}
#access rights management (arm) (close)

#content for all sections (open)
if(1==1){
    
    #jquery (open)
    if(1==1){
	
	echo '
	<script>
	    jQuery(document).ready(function(){';
		
		echo '
		jQuery(".content_div_title").click(function(){
		    jQuery(this).closest(".content_div").find(".content_div_content").fadeToggle(300);
		})
		';
		
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
		border-radius:25px;
		padding:25px;
		margin:20px 0px;
	    }
	    .content_div:hover{
		background-color:#FFD87D;
	    }
	    .content_div_title{
		text-align:center;
		cursor:pointer;
	    }
	    .content_div_content{
		display:nonestevesteve;
	    }
	</style>';
	
    }
    #style (close)
    
    #img + title (open)
    if(1==1){
	
	#preparation (open)
	if(1==1){
	    
		#function-breadcrums.php (v3.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
				
			}
			#documentation (close)
			
			#input (open)
			if($page_section == "overview"){
				
				$function_breadcrums['input_array'] = [
                    'left' => [
                        [
                            'text' => 'Staff Intranet home',
                            'link' => get_permalink(821)
                        ]
                    ]
                ];
				
			}else{
				
				$function_breadcrums['input_array'] = [
                    'left' => [
                        [
                            'text' => 'Staff Intranet home',
                            'link' => get_permalink(821)
                        ],
						[
							'text' => 'Internal work overview',
							'link' => get_permalink()
						]
                    ]
                ];
                // 'Option 1','Option 2' (default). Explanation of the input variable.
				
			}
			#input (close)
			
			include('#function-breadcrums.php');
			
			#output (open)
			if(1==1){
				
				#echo $function_breadcrums['breadcrums']; // Output variable.
				
			}
			#output (close)
			
		}
		#function-breadcrums.php (v3.0) (close)
	    
	    #function-image-processing (open)
	    if(1==1){
		#thematic only
		    $function_propic__type = "thematic";
		    $function_propic__original_img_name = "internal-work.jpg";
		#all
		    $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
		include('#function-image-processing.php');
		# $function_propic;
		#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
	    }
	    #function-image-processing (close)
	    
	    #title additions (open)
	    if(1==1){
		
		if($page_section != "overview"){
		    $title_additions = " workspace";
		}
		
	    }
	    #title additions (close)
	    
	}
	#preparation (close)
	
	#content (open)
	if(1==1){
	    
	    $title_and_image = '
	    <div style="position:relative;height:240px;">
		<img src="'.$function_propic.'" class="voluno_header_picture">
		'.$function_breadcrums['breadcrums'].'
		<div style="text-align:center;margin:30px;">
		    <h1 style="display:inline;">
			Internal work:
		    </h1>
		    <br>
		    <h3 style="display:inline;">
			'.$access_right_display_title_array[$page_section].$title_additions.'
		    </h3>
		</div>
		<div style="position:absolute;bottom:10px;">
		    54250961325934265656347
		</div>
	    </div>';
	    
	}
	#content (close)
	
    }
    #img + title (close)
    
}
#content for all sections (close)

#overview (open)
if($page_section == "overview"){
    
    #mysql (open)
    if(1==1){
	
    }
    #mysql (close)
    
    #jquery (open)
    if(1==1){
	
    }
    #jquery (close)
    
    #style (open)
    if(1==1){
	
    }
    #style (close)
    
    #content (open)
    if(1==1){
	
	#preparation(open)
	if(1==1){
	    
	    #array (open)
	    if(1==1){
		$departments_array = array(
		    array(
			'display' => 'Democratic positions'
			,'url_name' => 'democratic'
		    )
		    ,array(
			'display' => 'Administration'
			,'url_name' => 'administration'
		    )
		    ,array(
			'display' => 'IT'
			,'url_name' => 'it'
		    )
		    ,array(
			'display' => 'Operations'
			,'url_name' => 'operations'
		    )
		    ,array(
			'display' => 'Public Relations'
			,'url_name' => 'pr'
		    )
		);
	    }
	    #array (open)
	    
	}
	#preparation (close)
	
	#content (open)
	if(1==1){
	    
	    echo
	    str_replace("54250961325934265656347","Please select a workspace:",$title_and_image);
	    
	    #content creation loop (open)
	    for($abu=0;$abu<count($departments_array);$abu++){
		
		#content (open)
		if(1==1){
		    $individual_department .= '
		    <div
			style="
			    border-radius:20px;
			    padding:20px;
			    background-color:#FFEAB9;
			    border:1px solid black;
			    float:left;
			    width:40%;
			    margin:10px;
			"
		    >
			<div style="text-align:center;">
			    <h4 style="display:inline;">
				'.$departments_array[$abu]['display'].'
			    </h4>
			</div>
			<br>
			Workspaces:
			<ul>';
			    $department_workspaces_to_which_the_user_has_access = 0;
			    for($ack=0;$ack<count($arm_array);$ack++){
				if($arm_array[$ack]['department'] == $departments_array[$abu]['url_name']){
				   $individual_department .= '
				    <li>
					<a href="'.get_permalink().'?section='.$arm_array[$ack]['access_right'].'">
					    '.$arm_array[$ack]['display_title'].'
					</a>
				    </li>';
				    $department_workspaces_to_which_the_user_has_access++;
				}
			    }
			$individual_department .= '
			</ul>
		    </div>';
		}
		#content (close)
		
		#
		if($department_workspaces_to_which_the_user_has_access != 0){
		    $all_departments .= $individual_department;
		}
		unset($individual_department);
		#
		
	    }
	    #content creation loop (close)
	    
	    echo
	    $all_departments;
	    
	}
	#content (close)
	
    }
    #content (close)
    
}
#overview (close)

#democratic institutions (open)
if(1==1){
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
    #coordinator (open)
    if($page_section == "coordinator"){
	
	#jquery (open)
	if(1==1){
	    echo '
	    <script>
		jQuery(document).ready(function(){';
		    
		    #edit positions (open)
		    if(1==1){
			
			echo '
			jQuery(".assign_position__submit").click(function(){
			    jQuery(".assign_position__form").submit();
			})
			
			jQuery(".unassign_position__submit").click(function(){
			    var confirmation = confirm("Sure?");
			    if(confirmation == true){
				jQuery(this).find(".unassign_position__form").submit();
			    }
			});
			';
			
		    }
		    #edit positions (close)
		    
		echo '
		});
	    </script>';
	}
	#jquery (close)
	
	#mysql (open)
	if(1==1){
	    
	    #get (open)
	    if(1==1){
		$all_staff_positions_query = $GLOBALS['wpdb']->prepare('SELECT *
							    FROM fi4l3fg_voluno_lists_staff_positions
							    WHERE staff_position_status = ""
							    ORDER BY staff_position_dep_order ASC,
								staff_position_type DESC,
								staff_position_display ASC;');
		$all_staff_positions_results = $GLOBALS['wpdb']->get_results($all_staff_positions_query);
		
		$all_staff_members_query = $GLOBALS['wpdb']->prepare('SELECT *
							    FROM fi4l3fg_voluno_users_extended
							    LEFT JOIN fi4l3fg_voluno_applications
								ON usersext_id = application_user_id
							    WHERE application_status = "accepted"
								AND application_type_general = "position"
								AND application_type_id = "7"
							    ORDER BY usersext_displayName;');
		$all_staff_members_results = $GLOBALS['wpdb']->get_results($all_staff_members_query);
	    }
	    #get (close)
	    
	    #update (open)
	    if(1==1){
			
			#assign new (open)
			if(!empty($_POST['assign_position__position'])){
				
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
					if(in_array($assign_position__position,$function_userpositions_get['simple_pure_array']['accepted'])){ ###check if this is still secure, since user system changed.
						
						#function-redirect.php (v1.0) (open)
						if(1==1){
							
							#documentation (open)
							if(1==1){
								
								// Redirects to another page. Prevents further loading of content.
								
							}
							#documentation (close)
							
							#input (open)
							if(1==1){
								
								$function_redirect['redirect_url'] = get_permalink().'?section=coordinator';// url to redirect to. If none is given, homepage is used.
								
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
						));
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
			
			#remove (open)
			if(!empty($_POST['unassign_position__position'])){
				
				$unassign_position__member = $_POST['unassign_position__user'];
				$unassign_position__position = $_POST['unassign_position__position'];
				
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
			#remove (close)
			
			#function-redirect.php (v1.0) (open)
			if($initiate_redirect_function_to_refresh == "yes"){
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_redirect['redirect_url'] = get_permalink().'?section=coordinator'; // url to redirect to. If none is given, homepage is used.
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close)
			
	    }
	    #update (close)
	    
	}
	#mysql (close)
	
	#content (open)
	if(1==1){
	    
	    #title + img (open)
	    if(1==1){
		
		echo
		str_replace("54250961325934265656347",$text,$title_and_image);
	    }
	    #title + img (close)
	    
	    #edit staff positions div (open)
	    if(1==1){
			
			echo '
			<div class="content_div">
				<div class="content_div_title">
				<h4 style="display:inline;">
					<a>
					Edit positions
					</a>
				</h4>
				</div>
				<div class="content_div_content">
					<div style="text-align:center;">';
						
						#assign position (open)
						if(1==1){
						echo '
						<form
							method="post"
							class="assign_position__form"
							action="'.get_permalink().'?section=coordinator"
						>
							Assign the position of';
							
							#positions (open)
							if(1==1){
							
							echo '
							<select
								name="assign_position__position"
							>
								<option disabled selected>
								- - - Please select - - -
								</option>';
								for($aek=0;$aek<count($all_staff_positions_results);$aek++){
								
								#department (open)
								if($all_staff_positions_results[$aek]->staff_position_department
								   != $all_staff_positions_results[$aek-1]->staff_position_department){
									echo '
									<option style="font-weight:bold;padding-top:10px;" disabled>
									'.$all_staff_positions_results[$aek]->staff_position_department.'
									</option>';
								}
								#department (close)
								
								#coordinator style (open)
								if($all_staff_positions_results[$aek]->staff_position_type == "department_head"){
									$style = "font-weight:bold;font-style:italic;";
								}else{
									unset($style);
								}
								#coordinator style (close)
								
								#admin update (open)
								if($all_staff_positions_results[$aek]->staff_position_mysql == "website_admin"){
									$admin_update = " (make wp_admin)";
								}else{
									unset($admin_update);
								}
								#admin update (close)
								
								echo '
								<option
									value="'.$all_staff_positions_results[$aek]->staff_position_mysql.'"
									style="padding-left:20px;'.$style.'"
								>
									'.$all_staff_positions_results[$aek]->staff_position_display.$admin_update.'
								</option>';
								}
							echo '
							</select>';
							
							}
							#positions (close)
							
							echo '
							to';
							
							#staff members (open)
							if(1==1){
							
							echo '
							<select
								name="assign_position__member"
							>
								<option
								disabled selected
								>
								- - - Please select - - -
								</option>';
								for($aej=0;$aej<count($all_staff_members_results);$aej++){
								echo '
								<option
									value="'.$all_staff_members_results[$aej]->usersext_id.'"
								>
									'.$all_staff_members_results[$aej]->usersext_displayName.' (ID '.$all_staff_members_results[$aej]->usersext_id.')
								</option>';
								}
							echo '
							</select>';
							
							}
							#staff members (open)
							
							echo '
							<div class="voluno_button assign_position__submit">
							Assign
							</div>
						</form>';
						}
						#assign position (close)
						
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
										
										$function_table['query'] = $GLOBALS['wpdb']->prepare('SELECT *
																					FROM fi4l3fg_voluno_applications
																					
																					LEFT JOIN fi4l3fg_voluno_lists_staff_positions
																					ON application_type_specific = staff_position_mysql
																					
																					WHERE application_type_general = "staff position"
																						AND application_status IN ("accepted","pending")
																						AND staff_position_status = ""
																						
																					ORDER BY staff_position_dep_order ASC,
																						staff_position_type DESC,
																						staff_position_display ASC;'
																					);
										$function_table['results'] = $GLOBALS['wpdb']->get_results($function_table['query']);
										
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
											
											$function_table['data'][$ajl]['staff_position_display'] = $function_table['results'][$ajl]->staff_position_display;
											$function_table['data'][$ajl]['staff_position_mysql'] = $function_table['results'][$ajl]->staff_position_mysql;
											$function_table['data'][$ajl]['staff_position_department'] = $function_table['results'][$ajl]->staff_position_department;
											$function_table['data'][$ajl]['application_user_id'] = $function_table['results'][$ajl]->application_user_id;
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
									
									$function_table['unique id'] = 'edit_staff_positions_bdsvbalhfbvjh';
									// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
									
									#Options connected to the title (open)
									if(1==1){
										
										$function_table['display title'] = 'Currently assigned staff positions';
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
												'heading'		 => 'Department',
												'width'			 => '20%',
												'sorting option' => 'staff_position_department'
											),
											array(
												'heading'		 => 'Position',
												'width'			 => '20%',
												'sorting option' => 'staff_position_display'
											),
											array(
												'heading'		 => 'Office holder',
												'width'			 => '30%'
											),
											array(
												'heading'		 => 'Remove',
												'width'			 => '15%'
											)
										);
										
										//Optionally, you can choose one of the above columns to be the default sorting option.
										// If you don't want this, please delete or hide the entire array.
										$function_table['default ordering']
										= array(
											'column' => 'staff_position_display', // Colum name. In the example, 'email' or 'id'.
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
									
									#1 (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td>
											'.number_format(($x+1),0,"."," ").'
										</td>
										';
										
									}
									#1 (close)
									
									#2 Department (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td>
											'.$function_table['data'][$abs]['staff_position_department'].'
										</td>
										';
									  
									}
									#2 Department (close)
									
									#3 Position (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td>
											'.$function_table['data'][$abs]['staff_position_display'].'
											<br>
											<span
												style="color:grey;"
											>
												'.$function_table['data'][$abs]['staff_position_mysql'].'
											</span>
										  </td>
										';
									  
									}
									#3 Position (close)
									
									#4 Incumbents (open)
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
												
												$function_profileLink['id'] = $function_table['data'][$abs]['application_user_id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
										
										$function_table['table rows'] .= '
										<td>
											'.$function_profileLink['name_link'].' (ID '.$function_table['data'][$abs]['application_user_id'];
											
											$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
																FROM fi4l3fg_voluno_users_extended
																WHERE usersext_id = %s;'
																,$function_table['data'][$abs]['application_user_id']);
											$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
											
											$user = new WP_User($get_wp_user_id_row->usersext_id);
											$user_roles = $user->roles;
											if($user_roles[0] == "administrator"){
												$function_table['table rows'] .= ',
												Admin';
											}
											$function_table['table rows'] .= ')
										</td>
										';
										
									}
									#4 Incumbents (close)
									
									#5 (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td>
											<div class="voluno_button unassign_position__submit">
												Remove
												<form
													method="post"
													action="'.get_permalink().'?section=coordinator"
													class="unassign_position__form"
												>
													<input
														type="hidden"
														value="'.$function_table['data'][$abs]['application_user_id'].'"
														name="unassign_position__user"
													>
													<input
														type="hidden"
														value="'.$function_table['data'][$abs]['staff_position_mysql'].'"
														name="unassign_position__position"
													>
												</form>
											</div>
										</td>
										';
										
									}
									#5 (close)
									
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
						
					echo '
					</div>
				</div>
			</div>';
			
	    }
	    #edit staff positions div (close)
	    
	}
	#content (close)
	
    }
    #coordinator (close)
    
}
#democratic institutions (close)

#administration department (open)
if(1==1){
    
    #hr_officer (open)
    if($page_section == "hr_officer"){
		
		#jquery (open)
		if(1==1){
			
			echo '
			<script>
				jQuery(document).ready(function(){';
					
					#delete user (open)
					if(1==1){
						
						echo '
						jQuery(".delete_user__submit_prelim").click(function(){
							var deleteUserConfirmation = confirm("Really delete this user?");
							if(deleteUserConfirmation == true){
							jQuery(this).find(".delete_user__form").submit();
							}
						})';
						
					}
					#delete user (close)
					
				echo '
			});
			</script>';
		}
		#jquery (close)
		
		#mysql (open)
		if(1==1){
			
			#get (open)
			if(1==1){
				
				$all_not_deleted_members_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_users_extended
										
										'./*merge with wp users*/'
										FULL JOIN
											(
											SELECT user_email AS wp_user_email,
											user_login AS wp_user_login,
											ID AS wp_ID
											FROM 4df5ukbnn5p3t817_users
											) AS aaa_wp_users
										ON usersext_userEmail = wp_user_email
										
										'./*merge with wp_social_users to check if registered via facebook*/'
										LEFT JOIN
											(
											SELECT ID AS wp_social_users_id
											FROM 4df5ukbnn5p3t817_social_users
											) AS aaa_wp_social_users
										ON usersext_ida = wp_social_users_id
										
										WHERE usersext_status != "deleted"
										;');
				$all_not_deleted_members_results = $GLOBALS['wpdb']->get_results($all_not_deleted_members_query);
				
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
						if(in_array($assign_position__position,$function_userpositions_get['simple_pure_array']['accepted'])){ ###check if this is still secure, since user system changed.
							
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
							));
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
				
				#delete user (open)
				if(!empty($_POST['delete_user__user'])){
					
					$delete_user = $_POST['delete_user__user'];
					
					#function-user-delete.php (v1.0) (open)
					if($delete_user != $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
					$function_user_delete['user'] = $delete_user; //user id OR "current user". obligatory, or exit();
					include('#function-user-delete.php');
					}
					#function-user-delete.php (v1.0) (close)
					
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
				
			}
			#update (close)
			
		}
		#mysql (close)
		
		#content (open)
		if(1==1){
			
			#title + img (open)
			if(1==1){
				
				#
				if(!empty($_POST['delete_user__user_name'])){
					$text = '
					<div style="color:red;font-weight:bold;">
					User '.$_POST['delete_user__user_name'].' ('.$_POST['delete_user__user'].') deleted.
					</div>';
				}
				#
				$text .= 'There are currently '.count($all_not_deleted_members_results).' non-deleted members registered.';
				
				echo
				str_replace("54250961325934265656347",$text,$title_and_image);
				
			}
			#title + img (close)
			
			#edit staff positions div (open)
			if(1==1){
				
				echo '
				<div class="content_div">
					<div class="content_div_title">
					<h4 style="display:inline;">
						<a>
						All Voluno members
						</a>
					</h4>
					</div>
					<div class="content_div_content">
					<div style="text-align:center;">';
						
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
										
										$function_table['results'] = $all_not_deleted_members_results;
										
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
											$function_table['data'][$ajl]['wp_id'] = $function_table['results'][$ajl]->wp_id;
											$function_table['data'][$ajl]['usersext_id'] = $function_table['results'][$ajl]->usersext_id;
											$function_table['data'][$ajl]['wp_social_users_id'] = $function_table['results'][$ajl]->wp_social_users_id;
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
												'heading'		 => 'Name',
												'width'			 => '20%',
												'sorting option' => 'display_name'
											),
											array(
												'heading'		 => 'ID/ FB-Link',
												'width'			 => '7%',
												'sorting option' => 'id'
											),
											array(
												'heading'		 => 'Email/login',
												'width'			 => '20%',
												'sorting option' => 'wp_social_users_id'
											),
											array(
												'heading'		 => 'Positions',
												'width'			 => '10%',
												'sorting option' => 'usersext_positions_sorted'
											),
											array(
												'heading'		 => 'Status',
												'width'			 => '15%'
											)
										);
										
										/*
									array("#",3),
									array("Name",20,"tog_data_string1"),
									array("ID/ FB-Link",7,"tog_data_num1"),
									array("Email/login",20,"tog_data_string4"),
									array("Positions",10,"tog_data_string8"),
									array("Status",15)
										*/
										
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
									
									//#1 template (open) <- column number, short description of column
									if(1==1){ //Don't touch this.
										
										// Write the content here. To use the table data, use the variable:
										// $function_table['data'][$abs]['column name'] and replace "column name" with the name of the respective column, as entered in the section "raw data".
										// In the given example, the column names were "email" or "id".
										
									}
									//#1 template (close) <- column number (add +1 for each new column you add), short description of column
									
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
									
									#2 Incumbents (open)
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
										
										$function_table['table rows'] .= '
										<td>
											'.$function_profileLink['name_link'].'
										</td>
										';
										
									}
									#2 Incumbents (close)
									
									#3 ID (open)
									if(1==1){
										
										#preparation (open)
										if(1==1){
											
											if(empty($function_table['data'][$abs]['wp_social_users_id'])){
												
												$registration_type = '<span style="color:lightgrey;">unlinked</span>';
												
											}else{
												
												$registration_type = '<span style="color:#3b5998;font-weight:bold;">Facebook</span>';
												
											}
											
											if($function_table['data'][$abs]['usersext_id'] == $function_table['data'][$abs]['wp_id']){
												
												$usersext_id = 
												'<span
													style="cursor:help;color:green;"
													title="ID in wp_users matches the respective entry in fi4l3fg_voluno_users_extended. This is good."
												>'.
													$function_table['data'][$abs]['wp_id'].
												'</span>';
												
											}else{
												
												$usersext_id = 
												'<span
													style="color:red;font-weight:bold;cursor:help;"
													title="ID in wp_users DOES NOT match the respective entry in fi4l3fg_voluno_users_extended. This is bad."
												>'.
													$function_table['data'][$abs]['wp_id'].
												'</span>';
												
											}
											
										}
										#preparation (close)
										
										#content (open)
										if(1==1){
										
										$function_table['table rows'] .= '
										<td>
											'.$function_table['data'][$abs]['id'].', (wp:'.$usersext_id.')
											<div title="Registration type: Did the user register via Facebook or regular?" style="cursor:help;">
												'.$registration_type.'
											</div>
										</td>';
										
										}
										#content (close)
										
									}
									#3 ID (close)
									
									#4 Email / login (open)
									if(1==1){
										
										#preparation (open)
										if(1==1){
											
											$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
																FROM fi4l3fg_voluno_users_extended
																WHERE usersext_id = %s;'
																,$function_table['data'][$abs]['id']);
											$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
											$user = new WP_User($get_wp_user_id_row->usersext_id);
											$user_roles = $user->roles;
											
										}
										#preparation (close)
										
										#content (open)
										if(1==1){
											
											$function_table['table rows'] .= '
											<td>';
												
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
												
												$function_table['table rows'] .= 
												$login_like_email_check['title'].'
												'.$function_table['data'][$abs]['user_email'].'
												<br>
												'.$login_like_email_check['text'].'
											</td>';
											
										}
										#content (close)
										
									}
									#4 Email / login (close)
									
									#5 Position (open)
									if(1==1){
										
										#preparation (open)
										if(1==1){
											
											$get_wp_user_id_query = $GLOBALS['wpdb']->prepare('SELECT *
																FROM fi4l3fg_voluno_users_extended
																WHERE usersext_id = %s;'
																,$function_table['data'][$abs]['id']);
											$get_wp_user_id_row = $GLOBALS['wpdb']->get_row($get_wp_user_id_query);
											$user = new WP_User($get_wp_user_id_row->usersext_id);
											$user_roles = $user->roles;
											
											if($user_roles[0] == "subscriber"){
												
												$user_role_formatted = '
												<div style="color:lightgrey;cursor:help;" title="Wordpress role">
												['.$user_roles[0].']
												</div>';
												
											}else{
												
												$user_role_formatted = '
												<div style="font-weight:bold;color:blue;cursor:help;" title="Wordpress role">
												['.$user_roles[0].']
												</div>';
												
											}
											
											#function-user-positions-get.php (v1.8) (open)
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
											
											#
											if(1==1){
												
												unset($staff_positions);
												for($aem=0;$aem<count($function_userpositions_get['unsorted list']);$aem++){
													
													#seperate out staff positions (open)
													if($function_userpositions_get['unsorted list'][$aem]['type'] == 'Voluno Staff Member'){
														
														$staff_positions .= $function_userpositions_get['unsorted list'][$aem]['position'].$delimiter;
														
													}
													#seperate out staff positions (close)
													
												}
												
											}
											#
											
										}
										#preparation (close)
										
										#content (open)
										if(1==1){
											
											$function_table['table rows'] .= '
											<td>
												'.substr($function_table['data'][$abs]['usersext_positions_sorted'],1).'
												'.$user_role_formatted.'
												<strong>
													'.$staff_positions.'
												</strong>
											</td>
											';
											
										}
										#content (close)
										
									}
									#5 Position (close)
									
									#6 Edit menu (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td>';
											
											#delete user (open)
											if($function_table['data'][$abs]['id'] != $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
												
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
											
											#suspend user (open)
											if(1==0){ #dome haven't figured out if and how to do this yet
												
												$function_table['table rows'] .= '
												<div class="voluno_button delete_user__submit_prelim">
													Delete user
													<form
													method="post"
													action="'.get_permalink().'?section=hr_officer"
													class="unassign_position__form"
													>
													<input
														type="hidden"
														value="'.$function_table['data'][$abs]['id'].'"
														name="unassign_position__user"
													>
													<input
														type="hidden"
														value="'.$function_table['data'][$abs]['staff_position_mysql'].'"
														name="unassign_position__position"
													>
													</form>
												</div>';
												
											}
											#suspend user (close)
											
										$function_table['table rows'] .= '
										</td>
										';
										
									}
									#6 Edit menu (close)
									
									$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
								} //Don't touch this. 
								#Cells/Columns (close)
								
							}
							#design (close)
							
							$function_table['part'] = 2; //Don't touch this. 
							include("#function-table.php"); //Don't touch this. 
							
							#output
							//the entire output is stored in the following variable:
							echo $function_table['output table'];
							
						}
						#function-table.php (v1.0) (close)
						
					echo '
					</div>
					</div>
				</div>';
				
			}
			#edit staff positions div (close)
			
		}
		#content (close)
		
    }
    #hr_officer (close)
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
}
#administration department (close)

#it department (open)
if(1==1){
    
    #Website admin (open)
    if($page_section == "website_admin"){
		
		#content (open)
		if(1==1){
			
			#title + img (open)
			if(1==1){
			
			echo
			str_replace("54250961325934265656347",$text,$title_and_image);
			}
			#title + img (close)
			
			#jquery (open)
			if(1==1){
			echo '
			<script>
				jQuery(document).ready(function(){';
				
				#notifications list (open)
				if(1==1){
					
					echo '
					jQuery(".notification_not_edit, .notification_text_edit_cancel_button").click(function(){
					jQuery(this).closest("tr").find(".notification_not_edit,.notification_edit").slideToggle(300);
					});
					
					jQuery(".notification_text_edit_save_button").click(function(){
					jQuery(".notification_name_edit").val(
						jQuery(this).closest("tr").find(".notification_name_edit_prelim").val()
					);
					jQuery(".notification_text_edit").val(
						jQuery(this).closest("tr").find(".notification_text_edit_prelim").val()
					);
					jQuery(".notification_type_general_edit").val(
						jQuery(this).closest("tr").find(".notification_type_general_edit_prelim").val()
					);
					jQuery(".notification_type_specific_edit").val(
						jQuery(this).closest("tr").find(".notification_type_specific_edit_prelim").val()
					);
					jQuery(".notification_comment_edit").val(
						jQuery(this).closest("tr").find(".notification_comment_edit_prelim").val()
					);
					
					
					
					jQuery(".notification_id").val(jQuery(this).closest("tr").find(".notification_id_prelim").html());
					jQuery(".notification_text_textarea_edit_form").submit();
					})
					';
					
				}
				#notifications list (close)
				
				#emails (open)
				if(1==1){
					echo '
					jQuery(".email_button_edit").click(function(){
					jQuery(".email_edit").hide();
					jQuery(".email_not_edit").show();
					jQuery(this).closest("tr").find(".email_edit,.email_not_edit").toggle();
					});
					
					jQuery(".email_button_cancel").click(function(){
					jQuery(".email_edit").hide();
					jQuery(".email_not_edit").show();
					});
					
					jQuery(".email_button_delete").click(function(){
					jQuery(".email_delete_activate").val("yes");
					});
					
					jQuery(".email_button_save,.email_button_delete").click(function(){
					
					jQuery(".email_id").val('.
						'jQuery(this).closest("tr").find(".email_id_prelim").html()'.
					');
					jQuery(".email_name_for_admin").val('.
						'jQuery(this).closest("tr").find(".email_name_for_admin_prelim").val()'.
					');
					jQuery(".email_mysettings_mysql").val('.
						'jQuery(this).closest("tr").find(".email_mysettings_mysql_prelim").val()'.
					');
					
					jQuery(".email_title").val('.
						'jQuery(this).closest("tr").find(".email_title_prelim").val()'.
					');
					jQuery(".email_content").val('.
						'jQuery(this).closest("tr").find(".email_content_prelim").val()'.
					');
					jQuery(".email_content_style").val('.
						'jQuery(this).closest("tr").find(".email_content_style_prelim").val()'.
					');
					jQuery(".email_sender").val('.
						'jQuery(this).closest("tr").find(".email_sender_prelim").val()'.
					');
					
					jQuery(".email_edit_form").submit();
					});
					
					jQuery(".add_new_email_template").click(function(){
					jQuery(".add_new_email_template_form").submit();
					});
					
					';
				}
				#emails (close)
				
				echo '
				});
			</script>';
			}
			#jquery (close)
			
			#notifications list (open)
			if(1==1){
			
			#preparation (open)
			if(1==1){
				
				#mysql (open)
				if(1==1){
				
				if(!empty($_POST['notification_text_edit'])){
					
					#database query update (open)
					if(1==1){
					$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_lists_notifications',
						array( //updated content
							'list_notif_name' => stripslashes($_POST['notification_name_edit']),
							'list_notif_text' => stripslashes($_POST['notification_text_edit']),
							'list_notif_type_general' => stripslashes($_POST['notification_type_general_edit']),
							'list_notif_type_specific' => stripslashes($_POST['notification_type_specific_edit']),
							'list_notif_comment' => stripslashes($_POST['notification_comment_edit']),
						),
						array( //location of updated content
							'list_notif_id' => $_POST['notification_id']
						),
						array( //format of updated content
							'%s'
						),
						array( //format of location of updated content
							'%d'
							));
					}
					#database query update (close)
					
				}
				
				}
				#mysql (close)
				
				#form (open)
				if(1==1){
				echo '
				<div style="display:none;">
					<form
					method="post"
					action="'.get_permalink().'?section=website_admin"
					class="notification_text_textarea_edit_form"
					>
					<input type="text" class="notification_name_edit" name="notification_name_edit">
					<textarea class="notification_text_edit" name="notification_text_edit">
					</textarea>
					<input type="text" class="notification_type_general_edit" name="notification_type_general_edit">
					<input type="text" class="notification_type_specific_edit" name="notification_type_specific_edit">
					<textarea class="notification_comment_edit" name="notification_comment_edit">
					</textarea>
					<input type="text" class="notification_id" name="notification_id">
					</form>
				</div>';
				}
				#form (close)
				
			}
			#preparation (close)
			
			#content (open)
			if(1==1){
				
				echo '
				<div class="content_div">
				<div class="content_div_title">
					<h4 style="display:inline;">
					<a>
						Notifications
					</a>
					</h4>
				</div>
				<div class="content_div_content">';
					
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
									
									$function_table['query'] = $GLOBALS['wpdb']->prepare('SELECT *
																				FROM fi4l3fg_voluno_lists_notifications
																				WHERE list_notif_status = ""
																				;'
																		);
									$function_table['results'] = $GLOBALS['wpdb']->get_results($function_table['query']);
									
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
										
										$function_table['data'][$ajl]['list_notif_name'] = $function_table['results'][$ajl]->list_notif_name;
										$function_table['data'][$ajl]['list_notif_text'] = $function_table['results'][$ajl]->list_notif_text;
										$function_table['data'][$ajl]['list_notif_type_general'] = $function_table['results'][$ajl]->list_notif_type_general;
										$function_table['data'][$ajl]['list_notif_type_specific'] = $function_table['results'][$ajl]->list_notif_type_specific;
										$function_table['data'][$ajl]['list_notif_comment'] = $function_table['results'][$ajl]->list_notif_comment;
										$function_table['data'][$ajl]['list_notif_id'] = $function_table['results'][$ajl]->list_notif_id;
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
								
								$function_table['unique id'] = 'list_notifications_gfdugiudsfbg';
								// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
								
								#Options connected to the title (open)
								if(1==1){
									
									#$function_table['display title'] = 'Please add a title. AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
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
											'width'			 => '2%' // See 2 rows above.
										),
										array(
											'heading'		 => 'Name',
											'width'			 => '15%',
											'sorting option' => 'list_notif_name'
										),
										array(
											'heading'		 => 'Text',
											'width'			 => '48%',
											'sorting option' => 'list_notif_text'
										),
										array(
											'heading'		 => 'Category',
											'width'			 => '15%'
										),
										array(
											'heading'		 => 'Mysql ID',
											'width'			 => '5%'
										),
										array(
											'heading'		 => 'Comment',
											'width'			 => '15%'
										)
									);
									
									//Optionally, you can choose one of the above columns to be the default sorting option.
									// If you don't want this, please delete or hide the entire array.
									$function_table['default ordering']
									= array(
										'column' => 'list_notif_name', // Colum name. In the example, 'email' or 'id'.
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
								if(1==1){#
								  
									$function_table['table rows'] .= '
									<td>
										'.number_format(($x+1),0,"."," ").'
									</td>
									';
									
								}
								#1 counter (close)
								
								#2 name (open)
								if(1==1){#2){
									
									$function_table['table rows'] .= '
									<td>
										<div class="notification_not_edit" style="cursor:pointer;" title="Click to edit">
											<p>
												'.$function_table['data'][$abs]['list_notif_name'].'
											</p>
										</div>
										<div class="notification_edit" style="text-align:center;display:none;">
											<input
												type="text"
												class="notification_name_edit_prelim"
												style="width:100%;"
												value="'.$function_table['data'][$abs]['list_notif_name'].'"
											>
										</div>
									</td>
									';
									
								}
								#2 name (close)
								
								#3 text (open)
								if(1==1){#3){
									
									#prepare (open) stevesteve
									if(1==1){
										
										if(empty($only_once_jquery_notifications)){
											
											$only_once_jquery_notifications = 1;
											
										}
										
									}
									#prepare (close)
									
									#content (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td style="padding-left:20px;padding-right:20px;">
											<div class="notification_not_edit" style="cursor:pointer;" title="Click to edit">
												<p>
													'.$function_table['data'][$abs]['list_notif_text'].'
												</p>
											</div>
											<div class="notification_edit" style="text-align:center;display:none;">
												<textarea
													style="width:95%;height:200px;resize: none;"
													class="notification_text_edit_prelim"
												>'.
													$function_table['data'][$abs]['list_notif_text'].
												'</textarea>
												<div class="voluno_button notification_text_edit_cancel_button" style="margin-right:30px;">
													Cancel
												</div>
												<div class="voluno_button notification_text_edit_save_button">
													Save -> only this notification
												</div>
											</div>
										</td>
										';
										
									}
									#content (close)
									
								}
								#3 text (close)
								
								#4 category (open)
								if(1==1){#4){
									
									$function_table['table rows'] .= '
									<td>
										<div class="notification_not_edit" style="cursor:pointer;" title="Click to edit">
											<p>
												'.$function_table['data'][$abs]['list_notif_type_general'].'
											</p>
											<br>
											<p>
												'.$function_table['data'][$abs]['list_notif_type_specific'].'
											</p>
										</div>
										<div class="notification_edit" style="text-align:center;display:none;">
											General:
											<input
												type="text"
												class="notification_type_general_edit_prelim"
												value="'.$function_table['data'][$abs]['list_notif_type_general'].'"
												style="width:100%;"
											>
												Specific:
											<input
												type="text"
												class="notification_type_specific_edit_prelim"
												value="'.$function_table['data'][$abs]['list_notif_type_specific'].'"
												style="width:100%;"
											>
										</div>
									</td>
									';
									
								}
								#4 category (close)
								
								#5 mysql id (open)
								if(1==1){#5){
									
									$function_table['table rows'] .= '
									<td>
										<span class="notification_id_prelim">'.
											$function_table['data'][$abs]['list_notif_type_id'].
										'</span>
									</td>
									';
									
								}
								#5 mysql id (close)
								
								#6 comment (open)
								if(1==1){#6){
									
									$function_table['table rows'] .= '
									<td>
										<div class="notification_not_edit" style="cursor:pointer;" title="Click to edit">
											<p>
												'.$function_table['data'][$abs]['list_notif_type_comment'].'
											</p>
										</div>
										<div class="notification_edit" style="text-align:center;display:none;">
											<textarea
												style="width:95%;height:200px;resize: none;"
												class="notification_comment_edit_prelim"
											>'.
												$function_table['data'][$abs]['list_notif_type_comment'].
											'</textarea>
										</div>
									</td>
									';
									
								}
								#6 comment (close)
								
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
					
				echo '
				</div>
				</div>';
				
			}
			#content (close)
			
			}
			#notifications list (close)
			
			#admin emails list (open)
			if(1==1){
			
			#preparation (open)
			if(1==1){
				
				#mysql (open)
				if(1==1){
				
				#edit email (open)
				if(!empty($_POST['email_id'])){
					
					#function-scroll-to.php (v1.0) (open)
					if(1==1){
					
					$function_scroll_to['scroll_to_class'] = 'function_scroll_to__scroll__email_row'.$_POST['email_id'];
					$function_scroll_to['margin_top'] = 0; //optional, default: 200
					#$function_scroll_to['hide_classes'] = array(
					#    
					#);
					$function_scroll_to['show_classes'] = array(
						'function_scroll_to__show__edit_email'
					);
					include('#function-scroll-to.php');
					echo $function_scroll_to;
					
					}
					#function-scroll-to.php (v1.0) (close)
					
					#email delete preparation (open)
					if($_POST['email_delete_activate'] == "yes"){
					$email_status = "deleted";
					}else{
					$email_status = "";
					}
					#email delete preparation (close)
					
					#database query update (open)
					if(1==1){
					$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_lists_emails',
						array( //updated content
							'email_name_for_admin' => $_POST['email_name_for_admin'],
							'email_mysettings_mysql' => $_POST['email_mysettings_mysql'],
							'email_status' => $email_status,
							
							'email_title' => stripslashes($_POST['email_title']),
							'email_content' => stripslashes($_POST['email_content']),
							'email_content_style' => stripslashes($_POST['email_content_style']),
							'email_sender' => $_POST['email_sender'],
						),
						array( //location of updated content
							'email_id' => $_POST['email_id']
						),
						array( //format of updated content
							'%s','%s','%s',
							'%s','%s','%s','%s',
						),
						array( //format of location of updated content
							'%d'
							));
					}
					#database query update (close)
					
				}
				#edit email (close)
				
				#create new email (open)
				if(!empty($_POST['add_new_email_template_activate'])){
					
					#database query insert (open)
					if(1==1){
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_lists_emails',
						array(
							'email_name_for_admin' => '!NEW EMAIL TEMPLATE, PLEASE RENAME',
							'email_content' => '<p></p>',
							'email_date_created' => date("Y-m-d H:i:s")
							),
						array(
							'%s','%s','%s'
							));
					}
					#database query insert (close)
					
				}
				#create new email (close)
				
				}
				#mysql (close)
				
				#form (open)
				if(1==1){
				echo '
				<div style="display:none;">
					<form
					method="post"
					action="'.get_permalink().'?section=website_admin"
					class="email_edit_form"
					>';
					
					#system email content (open)
					if(1==1){
						echo '
						<input
						type="hidden"
						class="email_id"
						name="email_id"
						>
						<input
						type="hidden"
						class="email_name_for_admin"
						name="email_name_for_admin"
						>
						<input
						type="hidden"
						class="email_mysettings_mysql"
						name="email_mysettings_mysql"
						>
						<input
						type="hidden"
						class="email_delete_activate"
						name="email_delete_activate"
						value="no"
						>';
					}
					#system email content (close)
					
					#visible email content (open)
					if(1==1){
						echo '
						<input
						type="hidden"
						class="email_title"
						name="email_title"
						>
						<input
						type="hidden"
						class="email_content"
						name="email_content"
						>
						<input
						type="hidden"
						class="email_content_style"
						name="email_content_style"
						>
						<input
						type="hidden"
						class="email_sender"
						name="email_sender"
						>';
					}
					#visible email content (close)
					
					echo '
					</form>
				</div>';
				}
				#form (close)
				
			}
			#preparation (close)
			
			#content (open)
			if(1==1){
				
				echo '
				<div class="content_div">
				<div class="content_div_title">
					<h4 style="display:inline;">
					<a>
						Admin emails
					</a>
					</h4>
				</div>
				<div class="content_div_content function_scroll_to__show__edit_email">
					<div style="text-align:center;">
					<div class="voluno_button add_new_email_template">
						Add new
						<form
						class="add_new_email_template_form"
						method="post"
						action="'.get_permalink().'?section=website_admin"
						>
						<input
							type="hidden"
							name="add_new_email_template_activate"
							value="1"
						>
						</form>
					</div>
					</div>';
					echo esc_html('
						  placeholder: placeholder32hf79hr334f3g0hg2h9
						always use <p> for outside AND inside of table
						&nbsp; = space
						frame and signature automatically added
						');
					
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
									
									$function_table['query'] = $GLOBALS['wpdb']->prepare('SELECT *
																		FROM fi4l3fg_voluno_lists_emails
																		WHERE email_status != "deleted"
																		ORDER BY email_name_for_admin ASC;'
																		);
									$function_table['results'] = $GLOBALS['wpdb']->get_results($function_table['query']);
									
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
										
										$function_table['data'][$ajl]['email_name_for_admin'] = $function_table['results'][$ajl]->email_name_for_admin;
										$function_table['data'][$ajl]['email_content'] = $function_table['results'][$ajl]->email_content;
										$function_table['data'][$ajl]['email_sender'] = $function_table['results'][$ajl]->email_sender;
										$function_table['data'][$ajl]['email_title'] = $function_table['results'][$ajl]->email_title;
										$function_table['data'][$ajl]['email_original_text_location'] = $function_table['results'][$ajl]->email_original_text_location;
										$function_table['data'][$ajl]['email_date_created'] = $function_table['results'][$ajl]->email_date_created;
										$function_table['data'][$ajl]['email_content_style'] = $function_table['results'][$ajl]->email_content_style;
										$function_table['data'][$ajl]['email_mysettings_mysql'] = $function_table['results'][$ajl]->email_mysettings_mysql;
										$function_table['data'][$ajl]['email_id'] = $function_table['results'][$ajl]->email_id;
										
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
								
								$function_table['unique id'] = "list_emails_gndshgurenvcuerbiu";
								// Everytime you use this function, please add a random and unique ID (only a-z and 0-9). For example, see https://passwordsgenerator.net/
								
								#Options connected to the title (open)
								if(1==1){
									
									$function_table['display title'] = "All automated email messages";
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
											'heading'		 => '# & ID', // See 1 row above.
											'width'			 => '10%' // See 2 rows above.
										),
										array(
											'heading'		 => 'Mail name',
											'width'			 => '30%',
											'sorting option' => 'email_name_for_admin'
										),
										array(
											'heading'		 => 'Mail title and content',
											'width'			 => '60%',
											'sorting option' => 'email_title'
										)
									);
									
									//Optionally, you can choose one of the above columns to be the default sorting option.
									// If you don't want this, please delete or hide the entire array.
									$function_table['default ordering']
									= array(
										'column' => 'email_name_for_admin', // Colum name. In the example, "email" or "id".
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
									#	'lines' => "no" // Should a line be displayed left and right of the messsage? Not important, just looks nice. "no" or "yes" (default).
									#	,'content' => "none" // Any text (will be displayed) or "none" (no text will be displayed). Default: "There are currently no items available."
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
								
								//#1 template (open) <- column number, short description of column
								if(1==1){ //Don't touch this.
									
									// Write the content here. To use the table data, use the variable:
									// $function_table['data'][$abs]['column name'] and replace "column name" with the name of the respective column, as entered in the section "raw data".
									// In the given example, the column names were "email" or "id".
									
								}
								//#1 template (close) <- column number (add +1 for each new column you add), short description of column
								
								#1 counter (open)
								if(1==1){
									
									// If you want to use a row counter, please don't touch this cell as it is.
									
									$function_table['table rows'] .= '
									<td class="function_scroll_to__scroll__email_row'.$function_table['data'][$abs]['email_id'].'">
										<div style="color:grey;">
											#'.number_format(($abs+1),0,"."," ").'
										</div>
										<div>
											ID
											<span class="email_id_prelim">'.
												$function_table['data'][$abs]['email_id'].
											'</span>
										</div>
									</td>';
									
								}
								#1 counter (close)
								
								#2 name (open)
								if(1==1){
									
									$function_table['table rows'] .= '
									<td>
										<div class="email_not_edit">
											<p>
												'.$function_table['data'][$abs]['email_name_for_admin'].'
											</p>
											<div class="voluno_button email_button_edit">
												Edit
											</div>
										</div>
										<div class="email_edit" style="text-align:center;display:none;">
											
											Admin Name:
											<textarea
												type="text"
												class="email_name_for_admin_prelim"
												style="width:100%;resize:vertical;"
												value=""
											>'.
												$function_table['data'][$abs]['email_name_for_admin'].
											'</textarea>
											
											Mysettings Mysql Name:
											<textarea
												type="text"
												class="email_mysettings_mysql_prelim"
												style="width:100%;resize:vertical;"
											>'.
												$function_table['data'][$abs]['email_mysettings_mysql'].
											'</textarea>
											
											Sender:
											<textarea
												type="text"
												class="email_sender_prelim"
												style="width:100%;resize:vertical;"
											>'.
												$function_table['data'][$abs]['email_sender'].
											'</textarea>
											
											<div class="voluno_button email_button_cancel" style="margin-right:30px;">
												Cancel
											</div>
											<div class="voluno_button email_button_save">
												Save -> only this email
											</div>
											<div class="voluno_button email_button_delete">
												Delete
											</div>
											
										</div>
									</td>';
									
								}
								#2 name (close)
								
								#3 text + title (open)
								if(1==1){
									
									$function_table['table rows'] .= '
									<td style="padding-left:20px;padding-right:20px;">
										<div class="email_not_edit">
											'.$function_table['data'][$abs]['email_title'].'
											<div
												style="
													text-align:justify;
													max-height:100px;
													resize:vertical;
													overflow-y:auto;
													border:1px solid black;
													background-color:#f7f7f7;
												"
											>
												'.nl2br(esc_html($function_table['data'][$abs]['email_content'])).'
											</div>
										</div>
										<div class="email_edit" style="text-align:center;display:none;">
											
											Title:
											<textarea
												style="width:95%;height:50px;resize:vertical;"
												class="email_title_prelim"
											>'.
												$function_table['data'][$abs]['email_title'].
											'</textarea>
											
											Content:
											<textarea
												style="width:95%;height:200px;resize:vertical;"
												class="email_content_prelim"
											>'.
												$function_table['data'][$abs]['email_content'].
											'</textarea>
											
											Style:
											<textarea
												type="text"
												class="email_content_style_prelim"
												style="width:100%;height:200px;resize:vertical;"
											>'.
												$function_table['data'][$abs]['email_mysettings_mysql'].
											'</textarea>
											
										</div>
									</td>';
								}
								#3 text + title (close)
								
								$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
							} //Don't touch this. 
							#Cells/Columns (close)
							
						}
						#design (close)
						
						$function_table['part'] = 2; //Don't touch this. 
						include("#function-table.php"); //Don't touch this. 
						
						#output
						//the entire output is stored in the following variable:
						echo $function_table['output table'];
						
					}
					#function-table.php (v1.0) (close)
					
				echo '
				</div>
				</div>';
				
			}
			#content (close)
			
			}
			#admin emails list (close)
			
		}
		#content (close)
		
    }
    #Website admin (close)
    
}
#it department (close)

#operations department (open)
if(1==1){
    
    #Forum moderator (open)
    if($page_section == "forum_moderator"){
	
	#mysql (open)
	if(1==1){
	    
	    #update (open)
	    if(1==1){
			
			#claiming (open)
			if(1==1){
				
				#validation (open)
				if(1==1){
				
				$id_of_item_to_be_claimed = intval($_GET['forum_post_to_be_claimed']);
				
				$validation_query = $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_staff_reporting
									WHERE report_item_type = "forum post"
									AND report_status = "pending (unclaimed)"
									AND report_id = %d;'
									,$id_of_item_to_be_claimed);
				$validation_row = $GLOBALS['wpdb']->get_row($validation_query);
				
				}
				#validation (close)
				
				#updating in database (open)
				if(!empty($validation_row)){
				
				#database query update (open)
				if(1==1){
					echo "haaalo".$validation_row->report_id;
					$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_staff_reporting',
						array( //updated content
							'report_officer' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
							,'report_status' => "under investigation"
							,'report_date_claimed' => date("Y-m-d H:i:s")
						),
						array( //location of updated content
							'report_id' => $validation_row->report_id
						),
						array( //format of updated content
							'%s'
							,'%s'
							,'%s'
						),
						array( //format of location of updated content
							'%d'
						));
				}
				#database query update (close)
				
				}
				#updating in database (open)
				
			}
			#claiming (close)
			
			#reported forum posts, current (open)
			if(1==1){
				
				$reported_forum_posts_current_query = $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_staff_reporting
										
										'/*forum posts*/.'
										LEFT JOIN fi4l3fg_voluno_forum_posts
										ON report_item_id = voluno_for_pos_id
										
										'/*report_complainer*/.'
										LEFT JOIN (
										SELECT id AS complainer_id, usersext_displayName AS complainer_display_name
										FROM fi4l3fg_voluno_users_extended) as aaa_complainer
										ON report_complainer = complainer_id
										
										'/*reported_user*/.'
										LEFT JOIN (
										SELECT id AS reported_id, usersext_displayName AS reported_display_name
										FROM fi4l3fg_voluno_users_extended) as aaa_reported
										ON report_item_author = reported_id
										
										'/*staff_official*/.'
										LEFT JOIN (
										SELECT id AS staff_official_id, usersext_displayName AS staff_official_display_name
										FROM fi4l3fg_voluno_users_extended) as aaa_staff_official
										ON report_item_author = staff_official_id
										
									WHERE report_item_type = "forum post"
										AND report_status IN ("pending (unclaimed)","under investigation");');
				$reported_forum_posts_current_results = $GLOBALS['wpdb']->get_results($reported_forum_posts_current_query);
				
			}
			#reported forum posts, current (close)
			
	    }
	    #update (close)
	    
	    #get (open)
	    if(1==1){
		
		#reported forum posts, current (open)
		if(1==1){
		    
		    $reported_forum_posts_current_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_staff_reporting
								    
								    '/*forum posts*/.'
								    LEFT JOIN fi4l3fg_voluno_forum_posts
								    ON report_item_id = voluno_for_pos_id
								    
								    '/*report_complainer*/.'
								    LEFT JOIN (
									SELECT id AS complainer_id, usersext_displayName AS complainer_display_name
									FROM fi4l3fg_voluno_users_extended) as aaa_complainer
								    ON report_complainer = complainer_id
								    
								    '/*reported_user*/.'
								    LEFT JOIN (
									SELECT id AS reported_id, usersext_displayName AS reported_display_name
									FROM fi4l3fg_voluno_users_extended) as aaa_reported
								    ON report_item_author = reported_id
								    
								    '/*staff_official*/.'
								    LEFT JOIN (
									SELECT id AS staff_official_id, usersext_displayName AS staff_official_display_name
									FROM fi4l3fg_voluno_users_extended) as aaa_staff_official
								    ON report_item_author = staff_official_id
								    
								WHERE report_item_type = "forum post"
								    AND report_status IN ("pending (unclaimed)","under investigation");');
		    $reported_forum_posts_current_results = $GLOBALS['wpdb']->get_results($reported_forum_posts_current_query);
		    
		}
		#reported forum posts, current (close)
		
		#reported forum posts, past (open)
		if(1==1){
		    
		    $reported_forum_posts_past_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_staff_reporting
								    
								    '/*forum posts*/.'
								    LEFT JOIN fi4l3fg_voluno_forum_posts
								    ON report_item_id = voluno_for_pos_id
								    
								    '/*report_complainer*/.'
								    LEFT JOIN (
									SELECT id AS complainer_id, usersext_displayName AS complainer_display_name
									FROM fi4l3fg_voluno_users_extended) as aaa_complainer
								    ON report_complainer = complainer_id
								    
								    '/*reported_user*/.'
								    LEFT JOIN (
									SELECT id AS reported_id, usersext_displayName AS reported_display_name
									FROM fi4l3fg_voluno_users_extended) as aaa_reported
								    ON report_item_author = reported_id
								    
								    '/*staff_official*/.'
								    LEFT JOIN (
									SELECT id AS staff_official_id, usersext_displayName AS staff_official_display_name
									FROM fi4l3fg_voluno_users_extended) as aaa_staff_official
								    ON report_item_author = staff_official_id
								    
								WHERE report_item_type = "forum post"
								    AND report_status IN ("cancelled","resolved";');
		    $reported_forum_posts_past_results = $GLOBALS['wpdb']->get_results($reported_forum_posts_past_query);
		    
		}
		#reported forum posts, past (close)
		
	    }
	    #get (close)
	    
	}
	#mysql (close)
	
	#content (open)
	if(1==1){
	    
	    #title + img (open)
	    if(1==1){
		
		if(count($reported_forum_posts_current_results) == 0){
		    $text = "There are currently no active reported forum posts.";
		}else{
		    
		    $pending = 0;
		    $under_investigation = 0;
		    for($acl=0;$acl<count($reported_forum_posts_current_results);$acl++){
			if($reported_forum_posts_current_results[$acl]->report_status == "pending (unclaimed)"){
			    $pending++;
			}elseif($reported_forum_posts_current_results[$acl]->report_status == "under investigation"){
			    $under_investigation++;
			}
		    }
		    
		    $text = '
		    Current forum reportings:
		    <ul>
			<li>
			    '.$pending.' pending
			</li>
			<li>
			    '.$under_investigation.' under investigation
			</li>
		    </ul>';
		}
		
		echo
		str_replace("54250961325934265656347",$text,$title_and_image);
	    }
	    #title + img (close)
	    
	    #table array (open)
	    if(1==1){
			
			$reported_posts_queries_array = array(
				array(
				'results_array' => $reported_forum_posts_current_results
				,'show_on_load' => "yes"
				,'title' => "Forum post reportings which need to processed"
				,'unique_id' => "current"
				)
				,array(
				'results_array' => $reported_forum_posts_past_results
				,'show_on_load' => "no"
				,'title' => "Forum post reportings (already taken care of)"
				,'unique_id' => "past"
				)
			);
			
	    }
	    #table array (close)
	    
		#function-table.php (v1.0) (open)
		for($abw=0;$abw<count($reported_posts_queries_array);$abw++){
			
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
						
						$function_table['results'] = $reported_posts_queries_array[$abw]['results_array'];
						
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
							
							$function_table['data'][$ajl]['report_item_type'] = $function_table['results'][$ajl]->report_item_type;
							$function_table['data'][$ajl]['report_text'] = $function_table['results'][$ajl]->report_text;
							$function_table['data'][$ajl]['report_status'] = $function_table['results'][$ajl]->report_status;
							$function_table['data'][$ajl]['report_officer_statement'] = $function_table['results'][$ajl]->report_officer_statement;
							$function_table['data'][$ajl]['report_date_modified'] = $function_table['results'][$ajl]->report_date_modified;
							$function_table['data'][$ajl]['report_date_created'] = $function_table['results'][$ajl]->report_date_created;
							$function_table['data'][$ajl]['complainer_display_name'] = $function_table['results'][$ajl]->complainer_display_name;
							$function_table['data'][$ajl]['reported_display_name'] = $function_table['results'][$ajl]->reported_display_name;
							$function_table['data'][$ajl]['staff_official_display_name'] = $function_table['results'][$ajl]->staff_official_display_name;
							$function_table['data'][$ajl]['voluno_for_pos_content'] = $function_table['results'][$ajl]->voluno_for_pos_content;
							$function_table['data'][$ajl]['report_id'] = $function_table['results'][$ajl]->report_id;
							$function_table['data'][$ajl]['report_item_id'] = $function_table['results'][$ajl]->report_item_id;
							$function_table['data'][$ajl]['report_item_author'] = $function_table['results'][$ajl]->report_item_author;
							$function_table['data'][$ajl]['report_complainer'] = $function_table['results'][$ajl]->report_complainer;
							$function_table['data'][$ajl]['report_officer'] = $function_table['results'][$ajl]->report_officer;
							$function_table['data'][$ajl]['voluno_for_pos_discussion'] = $function_table['results'][$ajl]->voluno_for_pos_discussion;
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
					
					$function_table['unique id'] = 'staff_reported_forum_posts_vrwnibvzwb'.$reported_posts_queries_array[$abw]['unique_id'];
					// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
					
					#Options connected to the title (open)
					if(1==1){
						
						$function_table['display title'] = $reported_posts_queries_array[$abw]['title'];
						// The title of the table which is displayed above the table. To hide title, leave empty.
						
						$function_table['show on load'] = $reported_posts_queries_array[$abw]['show_on_load'];
						// 'yes' or empty (default). If there's no title, this is automatically set to yes, since there is nothing to show.
						
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
								'heading'		 => 'Complainer',
								'width'			 => '30%',
								'sorting option' => 'complainer_display_name'
							),
							array(
								'heading'		 => 'Date of reporting',
								'width'			 => '10%',
								'sorting option' => 'report_date_created'
							),
							array(
								'heading'		 => 'Post author & info',
								'width'			 => '30%',
								'sorting option' => 'reported_display_name'
							),
							array(
								'heading'		 => 'Status',
								'width'			 => '5%',
								'sorting option' => 'report_date_modified'
							),
							array(
								'heading'		 => 'Official & final statement',
								'width'			 => '15%',
								'sorting option' => 'staff_official_display_name'
							)
						);
						
						//Optionally, you can choose one of the above columns to be the default sorting option.
						// If you don't want this, please delete or hide the entire array.
						$function_table['default ordering']
						= array(
							'column' => 'report_date_created', // Colum name. In the example, 'email' or 'id'.
							'direction' => 'DESC' // ASC or DESC
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
					if(1==1){#1){
						
						$function_table['table rows'] .= '
						<td>
						#'.($x+1).'
						<br>
						<br>
						Comp. ID: '.$function_table['data'][$abs]['report_id'].'
						<br>
						<br>
						Post ID: '.$function_table['data'][$abs]['report_item_id'].'
						</td>';
					
					}
					#1 counter (close)
					
					#2 complaint (open)
					if(1==1){#2){
						
						#preparation (open)
						if(1==1){
							
							#style (close)
							if(empty($only_once_style_variable)){
								$only_once_style_variable = 1;
								
								$function_table['table rows'] .= '
								<style>
								.grey_textbox{
									background-color:#f2f2f2;
									border:1px solid black;
									border-radius:5px;
									padding:10px;
									margin:10px;
									text-align:justify;
								}
								</style>';
								
							}
							#style
							
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
									
									$function_profileLink['id'] = $function_table['data'][$abs]['report_complainer']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								$function_propic__user_id = $function_table['data'][$abs]['report_complainer'];
								#all
								$function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
								include('#function-image-processing.php');
								# $function_propic;
								#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
							}
							#function-image-processing (close)
							
							#function-only-first-x-symbols.php (open)
							if(!empty(´string2)){
								$function_only_first_x_symbols = $function_table['data'][$abs]['report_text']; #content
								$function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
								include('#function-only-first-x-symbols.php');
								#output: $function_only_first_x_symbols
							}
							#function-only-first-x-symbols.php (close)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								<a href="'.$function_profileLink['link'].'" title="'.$function_profileLink['link_title'].'">
									<img src="'.$function_propic.'" class="voluno_brighter_on_hover" style="border:1px solid black;border-radius:10px;">
									<br>
									'.$function_profileLink['name'].'
								</a>';
								
								if(!empty($function_table['data'][$abs]['report_text'])){
									$function_table['table rows'] .= '
									<br>
									<br>
									<strong>
										Complaint:
									</strong>
									<div class="grey_textbox">
										'.$function_only_first_x_symbols.'
									</div>';
								}
								
							$function_table['table rows'] .= '
							</td>
							';
							
						}
						#content (close)
						
					}
					#2 complaint (close)
					
					#3 report date (open)
					if(1==1){#3){
						
						#preparation (open)
						if(1==1){
						
						#function-timezone.php (open)
						if(1==1){
						  $function_timezone = $function_table['data'][$abs]['report_date_created'];
						  $function_timezone_hover_div = "yes"; //default: empty = no
						  $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
						  //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
						  //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
						  include('#function-timezone.php');
						  #output:
						  
						}
						#function-timezone.php (close)
						
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
						
						$function_table['table rows'] .= '
						<td>
							'.$function_timezone.'
						</td>
						';
						
						}
						#content (close)
					
					}
					#3 report date (close)
					
					#4 reported user (open)
					if(1==1){#4){
					
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
								
								$function_profileLink['id'] = $function_table['data'][$abs]['report_item_author']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
							$function_propic__user_id = $function_table['data'][$abs]['report_item_author'];
							#all
							$function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
							include('#function-image-processing.php');
							# $function_propic;
							#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
						}
						#function-image-processing (close)
						
						#function-only-first-x-symbols.php (open)
						if(1==1){
							$function_only_first_x_symbols = $function_table['data'][$abs]['voluno_for_pos_content']; #content
							$function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
							include('#function-only-first-x-symbols.php');
							#output: $function_only_first_x_symbols
						}
						#function-only-first-x-symbols.php (close)
						
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
						
						$function_table['table rows'] .= '
						<td>
							<table>
							<tr>
								<td>
								<a href="'.$function_profileLink['link'].'" title="'.$function_profileLink['link_title'].'">
									<img src="'.$function_propic.'" class="voluno_brighter_on_hover" style="border:1px solid black;border-radius:10px;">
									<br>
									'.$function_profileLink['name'].'
								</a>
								</td>
								<td>
								<strong>
									<a
									title="Go to discussion"
									href="'.
										get_permalink(738).
										'?discussion='.$function_table['data'][$abs]['voluno_for_pos_discussion'].
										'&reported_post_id='.$function_table['data'][$abs]['report_item_id'].
									'"
									>
									Post content:
									</a>
								</strong>
								<div class="grey_textbox">
									'.$function_only_first_x_symbols.'
								</div>
								</td>
							</tr>
							</table>
						</td>
						';
						
						}
						#content (close)
					
					}
					#4 reported user (close)
					
					#5 status (open)
					if(1==1){#5){
					  $function_table['table rows'] .= '
					  <td>
						'.$function_table['data'][$abs]['report_status'].'
					  </td>
					  ';
					}
					#5 status (close)
					
					#6 official (open)
					if(1==1){#6){
					
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
									
									$function_profileLink['id'] = $function_table['data'][$abs]['report_officer']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								$function_propic__user_id = $function_table['data'][$abs]['report_officer'];
								#all
								$function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
								include('#function-image-processing.php');
								# $function_propic;
								#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
							}
							#function-image-processing (close)
							
							#function-only-first-x-symbols.php (open)
							if(!empty($function_table['data'][$abs]['report_officer_statement'])){
								$function_only_first_x_symbols = $function_table['data'][$abs]['report_officer_statement']; #content
								$function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
								include('#function-only-first-x-symbols.php');
								#output: $function_only_first_x_symbols
							}
							#function-only-first-x-symbols.php (close)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
						
						$function_table['table rows'] .= '
						<td>';
							
							#show officer info (open)
							if($function_table['data'][$abs]['report_officer'] != 0){
								
								$function_table['table rows'] .= '
								<a href="'.$function_profileLink['link'].'" title="'.$function_profileLink['link_title'].'">
									<img src="'.$function_propic.'" class="voluno_brighter_on_hover" style="border:1px solid black;border-radius:10px;">
									<br>
									'.$function_profileLink['name'].'
								</a>';
								
								if(!empty($function_table['data'][$abs]['report_officer_statement'])){
									$function_table['table rows'] .= '
									<br>
									<br>
									<strong>
									Officer statement:
									</strong>
									<div class="grey_textbox">
									'.$function_only_first_x_symbols.'
									</div>';
								}
								
							}
							#show officer info (close)
							
							#claim button (open)
							else{
							$function_table['table rows'] .= '
							<a
								href="'.
								get_permalink().
								'?section=forum_moderator&forum_post_to_be_claimed='.$function_table['data'][$abs]['report_id'].
								'"
							>
								<div class="voluno_button">
								Claim
								</div>
							</a>';
							}
							#claim button (close)
							
						$function_table['table rows'] .= '
						</td>
						';
						
						}
						#content (close)
					
					}
					#6 official (close)
					
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
	#content (close)
	
    }
    #Forum moderator (close)
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
}
#operations department (close)

#public relations department (open)
if(1==1){
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
    # (open)
    if(1==1){
	
    }
    # (close)
    
}
#public relations department (close)

?>