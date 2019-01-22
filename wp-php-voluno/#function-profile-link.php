<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
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
				
				$function_profileLink['id'] = 'PLEASE_ADD_ID_HEREEEEEEEEEEEEEEEEEEEEEEE'; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2017.01.04, Steve
		## Last update of all instances this function is used: 2017.01.04, Steve
		
		# Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
		# Provides complete link, link address, name, or link title.
		# Optionally displays image of user on hover of link.
		
		// Full documentation of this file with references to actual code (documentation number) which is then written behind
		// specific lines of code, above them or being the if(1==1){ code. For example ///1
		// These references should include three dashes and then an ascending integer. ///2
		// To find the next documentation number, see wiki article of the php file.
		// Note: Of course, not everything needs to be written in here, only the big picture. Small
		// or obvious things can be written into the code itself.
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_profileLink['internal'] = $function_profileLink;
	
}
#input + var definitions (close)

//    $GLOBALS['voluno_variables']['#function-profile-link.php']['xxx'] = 1;
//    voluno_function_example_xxx

#processes (open)
if(!empty($function_profileLink['internal']['id'])){
	
	#users (open)
	if(substr($function_profileLink['internal']['id'],0,strlen('usersext_id_')) == 'usersext_id_'){
		
		#mysql (open)
		if(1==1){
			
			$function_profileLink['internal']['query'] = $GLOBALS['wpdb']->prepare('
				SELECT *
				FROM fi4l3fg_voluno_users_extended
				WHERE usersext_id = %s;',
				$function_profileLink['internal']['id']
			);
			$function_profileLink['internal']['row'] = $GLOBALS['wpdb']->get_row($function_profileLink['internal']['query']);
			
		}
		#mysql (close)
		
		#output (open)
		if(1==1){
			
			#user status (open)
			if(1==1){
				
				#active (open)
				if($function_profileLink['internal']['row']->usersext_status == 'active'){
					
					$function_profileLink['internal']['status'] = 'active';
					
				}
				#active (close)
				
				#deleted (open)
				elseif($function_profileLink['internal']['row']->usersext_status == 'deleted'){
					
					$function_profileLink['internal']['status'] = 'deleted';
					
				}
				#deleted (close)
				
				#paused/locked/draft (open)
				elseif(in_array($function_profileLink['internal']['row']->usersext_status,array('paused','locked','draft'))){
					
					$function_profileLink['internal']['status'] = 'paused/locked/draft';
					
				}
				#paused/locked/draft (close)
				
			}
			#user status (close)
			
			#function-record.php (v1.0) (open) #modified
			if($function_profileLink['internal']['show_record'] != "no"){
				
				#$function_record['user'] = $function_profileLink['internal']['row']->usersext_id; //default: none (function is deactivated)
				#$function_profileLink['internal']['img_div'] = "yes"; //default: no/empty, shows picture on hover, only works for people
				#include('#function-record.php');
				#output saved in:
				#$function_profileLink['internal']['record']['name_full'] = ' '.$function_record['full'];
				#$function_profileLink['internal']['record']['title_full'] = '&#13;Reputation: '.$function_record['rep'].'/10'.
										#'&#13;Experience: '.$function_record['exp'];
				
			}
			#function-record.php (v1.0) (close) #modified
			
			#only link (open)
			if($function_profileLink['internal']['status'] == "active"){
				
				$function_profileLink['output']['link'] = get_permalink(686).'?user_id='.$function_profileLink['internal']['row']->usersext_ida;
				
			}else{
				
				unset($function_profileLink['output']['link']);
				#Alternative: $function_profileLink['output']['link'] = 'javascript:'; <- deactivates link
				
			}
			#only link (close)
			
			#title (open)
			if(1==1){
				
				#active (open)
				if($function_profileLink['internal']['status'] == 'active'){
					
					#
					if($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $function_profileLink['internal']['row']->usersext_id){
						
						$function_profileLink['output']['link_title'] =
						'Go to my profile'.
						$function_profileLink['internal']['record']['title_full'];
						
					}else{
						
						$function_profileLink['output']['link_title'] =
						'Go to profile of '.
						$function_profileLink['internal']['row']->usersext_displayName.
						$function_profileLink['internal']['record']['title_full'];
						
					}
					#
					
				}
				#active (close)
				
				#deleted (open)
				elseif($function_profileLink['internal']['status'] == 'deleted'){
					
					$function_profileLink['output']['link_title'] = 'This user\'s account has been deleted. Therefore, the user\'s profile is no longer available.';
					
				}
				#deleted (close)
				
				#paused/locked/draft (open)
				elseif($function_profileLink['internal']['status'] == 'paused/locked/draft'){
					
					$function_profileLink['output']['link_title'] = 'This user\'s account is currently paused. Therefore, the user\'s profile is currently not available.';
					
				}
				#paused/locked/draft (close)
				
			}
			#title (close)
			
			#name (open)
			if(1==1){
				
				#active (open)
				if($function_profileLink['internal']['status'] == 'active'){
					
					$function_profileLink['output']['name'] = $function_profileLink['internal']['row']->usersext_displayName.$function_profileLink['internal']['record']['name_full'];
					
				}
				#active (close)
				
				#deleted (open)
				elseif($function_profileLink['internal']['status'] == 'deleted'){
					
					$function_profileLink['output']['name'] = '<span style="color:grey;font-style:italic;">[Paused user]</span>';
					
				}
				#deleted (close)
				
				#paused/locked/draft (open)
				elseif($function_profileLink['internal']['status'] == 'paused/locked/draft'){
					
					$function_profileLink['output']['name'] = '<span style="color:grey;font-style:italic;">[Deleted user]</span>';
					
				}
				#paused/locked/draft (close)
				
			}
			#name (close)
			
			#name and link (open)
			if($function_profileLink['internal']['status'] == "active"){
				
				$function_profileLink['output']['name_link'] = '
				<span class="function_profile_link_container">
					<a
						href="'.get_permalink(686).'?user_id='.$function_profileLink['internal']['row']->usersext_ida.'"
						title="'.$function_profileLink['output']['link_title'].'"
						class="function_profile_link"
					>'.
						$function_profileLink['output']['name'].
					'</a>';
					
					#img div (open)
					if($function_profileLink['internal']['img_div'] == "yes"){
						
						#function-image-processing (open)
						if(1==1){
						#profile picture
							$function_propic__type = "profile picture";
							$function_propic__user_id = $function_profileLink['internal']['row']->usersext_id;
						#all
							$function_propic__geometry = array(80,80); //optional, if e.g. only width: 300, NULL; vice versa
						include('#function-image-processing.php');
						}
						#function-image-processing (close)
						
						if($function_propic__image_available == "yes"){
						$function_profileLink['output']['name_link'] .= '
						<img
							style="display:none;position:absolute;border-radius:20px;border:1px solid black;z-index:1000000;"
							class="voluno_brighter_on_hover voluno_div_with_shadow"
							src="'.$function_propic.'"
						>';
						}
						
					}
					#img div (close)
					
				$function_profileLink['output']['name_link'] .= '
				</span>';
				
				#img div jquery (open)
				if(
				   $function_profileLink['internal']['img_div'] == "yes"
					AND empty($function_profileLink['internal']['img_div_only_once'])
					AND $function_propic__image_available == "yes"
				){
					
					$function_profileLink['internal']['img_div_only_once'] = 1;
					
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
								
								$function_files['files_to_use_by_nicename'] = [
									'emptyforscript.png'
								];
								//nicenames of files to use. must be an array. only allowed for system images, to prevent name conflicts.
								
							}
							#use (close)
							
						}
						#input (close)
						
						include('#function-files.php');
						
						#output (open)
						if(1==1){
							
							#use (open)
							if(1==1){
								
								#$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'] #full url path
								
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
					
					echo '
					<img
						src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
						style="display:none;"
						onload=
						\'
							jQuery(document).ready(function() {
								
								jQuery(".function_profile_link").hover(function(){
									jQuery(this).closest(".function_profile_link_container").find("img").fadeIn(300);
								},function(){
									jQuery(this).closest(".function_profile_link_container").find("img").fadeOut(300);
								});
								
							});
						\'
					/>';
				}
				#img div jquery (close)
				
			}else{
				
				$function_profileLink['output']['name_link'] = '
				<span title="'.$function_profileLink['output']['link_title'].'">'.
					$function_profileLink['output']['name'].
				'</span>';
				
			}
			#name and link (close)
			
		}
		#output (close)
		
	}
	#users (close)
	
	#ngos (open)
	else{
		
		#mysql (open)
		if(1==1){
			
			$function_profileLink['internal']['query'] = $GLOBALS['wpdb']->prepare('
				SELECT *
				FROM fi4l3fg_voluno_development_organizations
				WHERE ngo_id = %s;',
				$function_profileLink['internal']['id']
			);
			$function_profileLink['internal']['row'] = $GLOBALS['wpdb']->get_row($function_profileLink['internal']['query']);
			
		}
		#mysql (close)
		
		#output (open)
		if(1==1){
			
			#name (open)
			if(1==1){
				
				$function_profileLink['output']['name'] = $function_profileLink['internal']['row']->ngo_name;
				
			}
			#name (close)
			
			#only link (open)
			if(1==1){
				
				$function_profileLink['output']['link'] = get_permalink(853).'?ngo='.$function_profileLink['internal']['row']->ngo_id;
				
			}
			#only link (close)
			
			#title (open)
			if(1==1){
				
				$function_profileLink['output']['link_title'] =
				'Go to profile of '.$function_profileLink['internal']['row']->ngo_name;
				
			}
			#title (close)
			
			#name and link (open)
			if(1==1){
				
				$function_profileLink['output']['name_link'] = 
				'<span class="function_profile_link_container" style="position:relative;">'.
				'<a
					href="'.$function_profileLink['output']['link'].'"
					title="'.$function_profileLink['output']['link_title'].'"
					class="function_profile_link"
				>'.
					$function_profileLink['output']['name'].
				'</a>';
				
				#img div (open)
				if($function_profileLink['internal']['img_div'] == "yes"){
					
					#function-image-processing.php (v1.0) (open)
					if(1==1){
					#ngo logo
						$function_propic__type = "ngo logo";
						$function_propic__ngo_id = $function_profileLink['internal']['row']->ngo_id;
					#all
						$function_propic__geometry = array(150,300); //optional, if e.g. only width: 300, NULL; vice versa
					include('#function-image-processing.php');
					# $function_propic;
					#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
					}
					#function-image-processing.php (v1.0) (close)
					
					if($function_propic__image_available == "yes"){
					$function_profileLink['output']['name_link'] .= 
					'<img
						style="
						display:none;
						position:absolute;
						margin-top:20px;
						margin-left:-150px;
						border:1px solid black;
						z-index:1000000;"
						class="voluno_brighter_on_hover voluno_div_with_shadow"
						src="'.$function_propic.'"
					>';
					}
					
				}
				#img div (close)
				
				$function_profileLink['output']['name_link'] .= 
				'</span>';
				
				#img div jquery (open)
				if(
					$function_profileLink['internal']['img_div'] == "yes"
					AND empty($function_profileLink['internal']['img_div_only_once'])
					AND $function_propic__image_available == "yes"
				){
					
					$function_profileLink['internal']['img_div_only_once'] = 1;
					
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
								
								$function_files['files_to_use_by_nicename'] = [
									'emptyforscript.png'
								];
								//nicenames of files to use. must be an array. only allowed for system images, to prevent name conflicts.
								
							}
							#use (close)
							
						}
						#input (close)
						
						include('#function-files.php');
						
						#output (open)
						if(1==1){
							
							#use (open)
							if(1==1){
								
								#$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'] #full url path
								
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
					
					echo '
					<img
						src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
						style="display:none;"
						onload=
						\'
							jQuery(document).ready(function() {
							jQuery(".function_profile_link").hover(function(){
								jQuery(this).closest(".function_profile_link_container").find("img").fadeIn(300);
							},function(){
								jQuery(this).closest(".function_profile_link_container").find("img").fadeOut(300);
							});
							});
						\'
					/>';
					
				}
				#img div jquery (close)
				
			}
			#name and link (close)
			
		}
		#output (close)
		
	}
	#ngos (close)
	
}
#processes (close)

#output (open)
if(1==1){
	
	$function_profileLink = $function_profileLink['output'];
	
}
#output (close)

?>