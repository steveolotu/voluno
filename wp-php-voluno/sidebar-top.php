<?php

#check permissions (open)
if(empty($load_top_sidebar_number)){
    
    $top_sidebar_post_type = get_post_type();
    
    #prevent access to members net page if user not logged in (open)
    if($top_sidebar_post_type == "members-net-page"){
		
		#function-redirect.php (v1.0) (open)
		if(!is_user_logged_in()){
			
			#documentation (open)
			if(1==1){
				
				// Redirects to another page. Prevents further loading of content.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_redirect['redirect_url'] = site_url(); // url to redirect to. If none is given, homepage is used.
				
			}
			#input (close)
			
			include('#function-redirect.php');
			
			#no output
			
		}
		#function-redirect.php (v1.0) (close)
		
    }
    #prevent access to members net page if user not logged in (close)
    
    #prevent access to non-staff (open)
    if($top_sidebar_post_type == "staff-net-page"){
		
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
		
		#function-redirect.php (v1.0) (open)
		if(!is_user_logged_in() OR !in_array('Voluno Staff Member',$function_userpositions_get['simple_pure_array']['accepted'])){
			
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
		
    }
    #prevent access to non-staff (close)
    
}
#check permissions (close)

#loading twice (open)
if(empty($load_top_sidebar_number)){
    
    $load_top_sidebar_number = 1;
    include("sidebar-top.php");
    
    $load_top_sidebar_number = 2;
    include("sidebar-top.php");
    
}
#loading twice (close)

#user logged in (open)
elseif(is_user_logged_in() AND !$_SERVER['HTTP_X_REQUESTED_WITH']){ //the later prevents this from being loaded in ajax request.
	//double loading of jquery causes rapid blinking notifications
	
    #only needs to be loaded once (open)
    if($load_top_sidebar_number == 1){
		
		#hide top sidebar (open)
		if(!current_user_can('manage_options') AND get_post_type() != "operations-wiki-page"){
			
			echo '
			<script>
				jQuery(document).ready(function(){
					jQuery("#wpadminbar").html("").css("height","0px");
					jQuery("body").css("margin-top","-33px");
				});
			</script>';
			
		}
		#hide top sidebar (close)
		
		#hide search bar in menu (open)
		if(1==1){
			
			echo '
			<script>
				jQuery(document).ready(function(){
					jQuery(".menu-main-search").remove();
				});
			</script>';
			
		}
		#hide search bar in menu (close)
		
		#function-user-positions-get.php (v1.6) (open)
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
				# Method 5:
				#    $function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
				#        full -> NGO name (user position)
				#        position -> pure position
				#        status -> "accepted" or "pending"
				#        ngo_name -> NGO name
				#        ngo_id -> NGO id
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
		#function-user-positions-get.php (v1.6) (close) 
		
		#facebook registration check (open)
		if(1==1){
			
			if(empty($GLOBALS['voluno_variables']['current_user_extended'])){
					
					$wp_social_users_query = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM 4df5ukbnn5p3t817_social_users
						WHERE ID = %d;',
						intval(preg_replace("/[^0-9]/","",$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id']))
					);
					$wp_social_users_row = $GLOBALS['wpdb']->get_row($wp_social_users_query);
					
					if(!empty($wp_social_users)){
						
						$wp_social_users = "new Facebook registration";
						
					}else{
						
						$wp_social_users = "error, this should not even be possible";
						
					}
					
			}
			
			#
			if(get_permalink() == get_permalink(809) AND empty($wp_social_users)){
				
				$redirect_to = get_home_url(); //old user, trying to access facebook registration page. redirect to homepage.
				
			}elseif(get_permalink() != get_permalink(809) AND !empty($wp_social_users)){
				
				$redirect_to = get_permalink(809); //new facebook user, trying to access any other than the facebook registration page.
				
			//redirect to register.
			}elseif(get_permalink() == get_permalink(809) AND !empty($wp_social_users)){
				
				$hide_top_sidebar = "yes";
				
			//a new registration from facebook. has to register. is already on the right page. no top sidebar shown.
			}
			
			#function-redirect.php (v1.0) (open)
			if(!empty($redirect_to)){
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_redirect['redirect_url'] = $redirect_to; // url to redirect to. If none is given, homepage is used.
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close)
			
		}
		#facebook registration check (close)
		
		#profile picture (open)
		if($hide_top_sidebar != "yes"){
			
			#function-image-processing - profile picture
			#profile picture
				$function_propic__type = "profile picture";
				$function_propic__user_id = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
			#all
				$function_propic__geometry = array(90,90); //optional, if e.g. only width: 300, NULL; vice versa
			include('#function-image-processing.php');
			$profile_img = $function_propic;
			
		}
		#profile picture (close)
		
		#function-profile-link.php (v1.0) (open)
		if($hide_top_sidebar != "yes"){
			
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
		
		#script (open)
		if($hide_top_sidebar != "yes"){
			
			echo '
			<script>
				jQuery(document).ready(function(){';
					
					#my office menu (open)
					if(1==1){
						
						echo '
						jQuery(".my_office_menu_hover").hover(function(){
							jQuery(".my_office_menu").fadeIn(150);
						},function(){
							jQuery(".my_office_menu").fadeOut(150);
						});
						jQuery(".my_office_menu a").hover(function(){
							jQuery(this).find("div").css("color","");
						},function(){
							jQuery(this).find("div").css("color","#fff");
						});';
						
					}
					#my office menu (close)
					
					#nice links on hover (open)
					if(1==1){
						
						echo '
						jQuery(".dark_hover_link").hover(function(){
							jQuery(this).css("color","#B50000");
						},function(){
							jQuery(this).css("color","");
						});';
						
					}
					#nice links on hover (close)
					
					#blink if new item (open)
					if(1==1){
						
						echo '
						function blink(){
							jQuery(".new_item_number").each(function(){
								if(jQuery(this).html() != 0){
									jQuery(this).closest(".new_item_blink").fadeToggle(300, function(){
										jQuery(this).closest(".new_item_blink").fadeToggle(300, function(){
										});
									});
								}
							})
						}
						setInterval(blink, 2000);
						';
						
					}
					#blink if new item (close)
					
				echo '
				});
			</script>';
		}
		#script (close)
		
		#messages and notifications (open)
		if(1==1){
			
			#function-image-processing (open)
			if(1==1){
			  
				$news_size = "30px";
				
				#thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "alarm-white.png";
				#all
					$function_propic__geometry = array($news_size,$news_size); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				$alarm_img = $function_propic;
				
				#thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "message-white.png";
				#all
					$function_propic__geometry = array($news_size,$news_size); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				$message_img = $function_propic;
				
			}
			#function-image-processing (close)
			
			#messages (open)
			if(1==1){
				
				$get_all_unread_messages_query = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_message_system_partners
					WHERE messys_par_user = %s
					  AND messys_par_read != "yes"
					ORDER BY messys_par_date_modified ASC;',
					$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
				);
				$get_all_unread_messages_query = $GLOBALS['wpdb']->get_results($get_all_unread_messages_query);
				$unread_messages = count($get_all_unread_messages_query);
				
				if(empty($get_all_unread_messages_query)){
					$messages_link = get_permalink(696);
				}else{
					$messages_link = get_permalink(696).'?conversation_id='.$get_all_unread_messages_query[0]->messys_par_conversation;
				}
				
			}
			#messages (close)
			
			#function-notifications.php (v2.0) (open)
			if(1==1){
				
				#sidebar-top -> notifications count
				//gets number of notifications in top sidebar and takes of what happens when user clicks on the link
					$function_notifications['function_part'] = "sidebar-top -> notifications counter";
					include('#function-notifications.php');
					#output:
					#$function_notifications__top_sidebar_notifications_number
					#$function_notifications__top_sidebar_notifications_title
					#$function_notifications__top_sidebar_notifications_number_class
					#$function_notifications__top_sidebar_container_class
				
			}
			#function-notifications.php (v2.0) (close)
			
			#array (open)
			if(1==1){
				
				$top_sidebar_icons_array = array(
					#array(
					#'img_src' => $alarm_img
					#,'number' => $function_notifications__top_sidebar_notifications_number
					#,'title_attr' => $function_notifications__top_sidebar_notifications_title
					#,'class' => $function_notifications__top_sidebar_notifications_number_class
					#,'container_class' => $function_notifications__top_sidebar_container_class
					#),
					array(
					'img_src' => $message_img
					,'number' => $unread_messages
					,'title_attr' => 'Go to your messages'
					,'link' => $messages_link
					,'class' => 'top_sidebar_message_number_class'
					)
				);
				
			}
			#array (close)
			
			#loop (open)
			for($abh=0;$abh<count($top_sidebar_icons_array);$abh++){
				
				if(!empty($top_sidebar_icons_array[$abh]['link'])){
					$top_sidebar_icons_link['open'] = '<a href="'.$top_sidebar_icons_array[$abh]['link'].'">';
					$top_sidebar_icons_link['close'] = '</a>';
				}else{
					unset($top_sidebar_icons_link);
				}
				
				$top_sidebar_icons_array_content .= '
				<td style="text-align:center;">
					'.$top_sidebar_icons_link['open'].'
					<div
						class="voluno_button new_item_blink '.$top_sidebar_icons_array[$abh]['container_class'].'"
						style="height:30px;margin:auto;display:inline-block;"
						title="'.$top_sidebar_icons_array[$abh]['title_attr'].'"
					>
						<img src="'.$top_sidebar_icons_array[$abh]['img_src'].'" style="vertical-align:middle;">
						<span class="new_item_number '.$top_sidebar_icons_array[$abh]['class'].'">'.
						$top_sidebar_icons_array[$abh]['number'].
						'</span>
					</div>
					'.$top_sidebar_icons_link['close'].'
				</td>
				';
			
			}
			#loop (close)
			
		}
		#messages and notifications (close)
		
    }
    #only needs to be loaded once (close)
    
    #visible content (open)
    if($hide_top_sidebar != "yes"){
		
		echo '
		<table
			class="voluno_top_sidebar"
			style="';
				
				#
				if ($load_top_sidebar_number == 1) {
					echo '
					opacity: .5; filter:Alpha(Opacity=50);
					background-color: #ffffff;';
				}
				#
				
				echo '
				font-weight: bold;
				border-collapse: separate;
				border-spacing: 5px;
				position: absolute;
				right: 0;
				top: 0;
				border-radius: 0.6em 0.6em 0.6em 0.6em;
				width: 320px;
			"
		>
			<tr>
				<td style="text-align:center;padding:10px;">
					<div style="padding-left:10px;margin:auto;">
					Hello '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName.'
					</div>
					<table style="margin:5px;width:100%;">
					<tr>
						'.$top_sidebar_icons_array_content.'
					</tr>
					</table>
					<a href="'.wp_logout_url(get_home_url()).'">
					<div style="width:50px;margin:auto;" class="voluno_button">
						Logout
					</div>
					</a>
				</td>
				<td style="width:92px;text-align:center;padding:10px;">';
					
					#image and my office (open)
					if(1==1){
					  
						#img (open)
						if(1==1){
							echo '
							<a
							href="'.$function_profileLink['link'].'"
							title="'.$function_profileLink['link_title'].'"
							class="profile_picture_in_top_sidebar"
							style="
								display:block;
								background-color:#fff;
								border-radius:10px;
								border:1px solid black;
								width:90px;
								height:90px;
								overflow:hidden;
							  margin:auto;
							"
							>
							<img
								class="voluno_brighter_on_hover"
								src="'.$profile_img.'"
							>
							</a>';
						}
						#img (close)
						
						echo '
						<div class="my_office_menu_hover">
							<a
							href="'.get_permalink(814).'"
							title="Go to my office"
							class="dark_hover_link"
							>
							My Office
							</a>';
							
							#my office div (open)
							if(1==1){
								
								echo '
								<div
									class="my_office_menu"
									style="
										display:none;
										position:absolute;
										margin-top:-130px;
										right:105px;
										height:138px;
										width:110px;
									"
								>
									<div style="position:absolute;left:0px;bottom:0px;">
										<div
											class="voluno_div_with_shadow"
											style="
											text-align:left;
											background-color:#8B0000;
											border-radius:10px;
											padding:5px;
											"
										>
											<a href="'.get_permalink(696).'">
												<div style="color:#fff;">
													My Messages
												</div>
											</a>
											<a href="'.get_permalink(686).'">
												<div style="color:#fff;">
													My Profile
												</div>
											</a>
											<a href="'.get_permalink(748).'">
												<div style="color:#fff;">
													My Contacts
												</div>
											</a>
											<a href="'.get_permalink(756).'">
												<div style="color:#fff;">
													My Positions
												</div>
											</a>'.
											#
											#<a href="'.get_permalink(806).'">
											#<div style="color:#fff;">
											#	My Ratings
											#</div>
											#</a>
											'<a href="'.get_permalink(770).'">
												<div style="color:#fff;">
													My Settings
												</div>
											</a>
										</div>
										<div
											style="
											width:0; 
											height:0;
											margin-top:-26px;
											margin-right:-8px;
											float:right;
											border-top:9px solid transparent;
											border-bottom:9px solid transparent; 
											border-left:9px solid #8B0000; 
											"
										>
										</div>
									</div>
								</div>';
								
							}
							#my office div (close)
							
						echo '
						</div>';
					}
					#image and my office (close)
					
				echo '
				</td>
			</tr>
		</table>';
		
    }
    #visible content (close)
	
}
#user logged in (close)

#user logged out (open)
else{
    
	#temporarily hide login and menu for pure facebook operations phase (open)
	if($_GET['hidden_login_code_for_developers'] == "cc3v75v48gh2799g3ghhfw4483zlg3g"){
		
		#only once (open)
		if(empty($only_load_top_sidebar_once)){
		$only_load_top_sidebar_once = 1;
			
			#function-image-processing (open)
			if(1==1){
				#thematic only
				$function_propic__type = "thematic";
				$function_propic__original_img_name = "facebook.jpg";
				#all
				$function_propic__geometry = array(50,NULL); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				# $function_propic;
				#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
			}
			#function-image-processing (close)
			
			#jQuery (open)
			if(1==1){
				
				echo '
				<script>
				jQuery(document).ready(function(){
					
					jQuery(".register_button").click(function(){
					window.location.replace("'.get_permalink(426).'");
					});
					
					jQuery(".login_button").click(function(){
					jQuery(".login_form").submit();
					});
					
				});
				</script>';
				
			}
			#jQuery (close)
			
			#stlye (open)
			if(1==1){
				
				echo '
				<style>
				.sidebar_top_button{
					marigin:20px 10px;
					display:inline-block;
				}
				</style>';
				
			}
			#style (close)
			
		}
		#only once (close)
		
		echo '
		<div
		style="
			position:absolute;
			right:0;
			top:0;
			border-radius:20px;
			padding:20px;
			width:410px;';
			
			#
			if($load_top_sidebar_number == 1){
				
				echo '
				opacity: .5; filter:Alpha(Opacity=50);
				background-color: #ffffff;';
				
			}
			#
			
		echo'
		"
		>
		<div style="margin-top:-10px;">
			Currently, our login area is still under development, so we\'re not yet using it.
		</div>
		<table style="width:100%;">
		<tr>
		<td>';
			
			#email and password rows (open)
			if(1==1){
			echo '
			<form action="'.get_permalink().'" method="post" class="login_form">
				<table style="font-weight:bold;">';
				
				#top sidebar array (open)
				if(1==1){
					$top_sidebar_array = array(
					array(
						'title' => 'Email'
						,'input' => '<input
							  name="login_email"
							  placeholder="your@email.com"
							  style="width:97%;"
							  value="'.sanitize_email($_GET['email']).'"
							  type="text"
							>'
					),
					array(
						'title' => 'Password'
						,'input' => '<input name="login_password" style="width:97%;" type="password">'
						,'after_input' => '
								<label>
								  <div style="margin:3px 0px;cursor:pointer;">
									Stay logged in?
									<input type="checkbox" name="login_remember" value="yes"
								  </div>
								</label>
								<br>
								<a href="'.get_permalink(698).'">
								  Forgot password?
								</a>'
					)
					);
				}
				#top sidebar array (close)
				
				for($abg=0;$abg<count($top_sidebar_array);$abg++){
					echo '
					<tr>
					<td style="width:50px;text-align:right;">
						'.$top_sidebar_array[$abg]['title'].':
					</td>
					<td style="padding:0px 10px 0px 10px;">
						'.$top_sidebar_array[$abg]['input'].'
					</td>';
					if(!empty($top_sidebar_array[$abg]['after_input'])){
						echo '
						<tr>
						<td>
						</td>
						<td style="padding:0px 10px 0px 10px;text-align:center;">
							'.$top_sidebar_array[$abg]['after_input'].'
						</td>
						</tr>';
					}
					echo '
					</tr>';
				}
				echo '
				</table>
			</form>';
			}
			#email and password rows (open)
			
		echo '
		</td>
		<td style="text-align:center;vertical-align:middle;width:150px;">';
			
			#login, register, facebook (open)
			if(1==1){
			echo '
			<div class="voluno_button sidebar_top_button login_button">
				Login
			</div>
			<div class="voluno_button sidebar_top_button register_button" style="display:nsone;">
				Register
			</div>
			<a
				href="'.get_home_url().'/wp-login.php?loginFacebook=1&redirect='.get_home_url().'"
				onclick="window.location = \''.get_home_url().'/wp-login.php?loginFacebook=1&redirect='.
				'\'+window.location.href; return false;"
			>
				<div class="voluno_button sidebar_top_button" style="background-color:#3b5998;color:#fff;">
				Login'.# or register
				'<br>
				with Facebook
				</div>
			</a>
			';
			}
			#login, register, facebook (close)
			
		echo '
		</td>
		</tr>
		</table>';
		echo '
		</div>';
		
	}
	#
	else{
		
		#jQuery (open)
		if(1==1){
			
			echo '
			<script>
			jQuery(document).ready(function(){
				
				jQuery("#access").html(" ");
				
			});
			</script>';
			
		}
		#jQuery (close)
		
	}
	#temporarily hide login and menu for pure facebook operations phase (close)
	
}
#user logged out (close)

?>