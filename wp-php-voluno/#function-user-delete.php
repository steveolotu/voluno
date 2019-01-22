<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-user-delete.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_userdelete['type'] = 'permanent';// 'permanent','preliminary' (default). Preliminary only changes the status and creates a
				$function_userdelete['user'] = '111';
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
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2000.01.01, Steve
		## Last update of all instances this function is used: 2000.01.01, Steve
		
		# Here, add a short summary of what the function does.
		# This shouldn't be more than max. 10 lines.
		
		// gggg
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_userdelete['internal'] = $function_userdelete;
	
}
#input + var definitions (close)

#preparation (open)
if(1==1){
    
    #current user (open)
    if($function_userdelete['internal']['user'] == "current user"){
		
		$function_userdelete['internal']['user'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
		
    }
    #current user (close)

}
#preparation (close)

#permanent / preliminary deletion (open)
if(1==1){
    
	#delete user permanently (open)
	if($function_userdelete['internal']['type'] == 'permanent'){
		
		#delete in wp system (open)
		if(1==1){
			
			require_once(ABSPATH.'wp-admin/includes/user.php');
			wp_delete_user($function_userdelete['internal']['user']);
			
		}
		#delete in wp system (close)
		
		#delete in voluno databases (open)
		if(1==1){
			
			#wp users extended (open)
			if(1==1){
			   
				$GLOBALS['wpdb']->delete(
					'fi4l3fg_voluno_users_extended',
					array( //location of row to delete
						'usersext_id' => $function_userdelete['internal']['user']
					),
					array( //format of location of row to delete
						'%s'
					)
				);
			   
			}
			#wp users extended (close)
			
			#wp_social_users (open)
			if(1==1){
				
				$GLOBALS['wpdb']->delete(
					'4df5ukbnn5p3t817_social_users',
					array( //location of row to delete
						'ID' => preg_replace("/[^0-9]/","",$function_userdelete['internal']['user'])
					),
					array( //format of location of row to delete
						'%s'
					)
				);
				
			}
			#wp_social_users (close)
			
			#fi4l3fg_voluno_applications (open)
			if(1==1){
				
				$GLOBALS['wpdb']->delete(
					'fi4l3fg_voluno_applications',
					array( //location of row to delete
						'application_user_id' => $function_userdelete['internal']['user']
					),
					array( //format of location of row to delete
						'%s'
					)
				);
				
			}
			#fi4l3fg_voluno_applications (close)
			
			#fi4l3fg_voluno_personal_settings (open)
			if(1==1){
				
				$GLOBALS['wpdb']->delete(
					'fi4l3fg_voluno_personal_settings',
					array( //location of row to delete
						'pers_settings_user_id' => $function_userdelete['internal']['user']
					),
					array( //format of location of row to delete
						'%s'
					)
				);
				
			}
			#fi4l3fg_voluno_personal_settings (close)
			
			### there are still a LOT of databases missing here! not all are necessary, but some are.
			
		}
		#delete in voluno databases (close)
		
		#delete files (open)
		if(1==1){
			
			$uploads_directory_raw = wp_upload_dir();
			$uploads_directory_abs = $uploads_directory_raw['path'];
			
			#delete files and folders (open)
			if(1==1){
				
				$array_of_folder_names = array(
				$uploads_directory_abs.'/members/'.$function_userdelete['internal']['user'].'/profile-picture/processed',
				$uploads_directory_abs.'/members/'.$function_userdelete['internal']['user'].'/profile-picture/raw',
				$uploads_directory_abs.'/members/'.$function_userdelete['internal']['user'].'/profile-picture',
				$uploads_directory_abs.'/members/'.$function_userdelete['internal']['user'].'/cv',
				$uploads_directory_abs.'/members/'.$function_userdelete['internal']['user'],
				$uploads_directory_abs.'/profile-pictures-original/'.'user'.$function_userdelete['internal']['user'].'image.jpg'
				);
				
				#delete all files in $array_of_folder_names (open)
				for($x=0;$x<count($array_of_folder_names);$x++){
					
					$path = $array_of_folder_names[$x];
					if (is_dir($path) === true){
						$files = array_diff(scandir($path), array('.', '..'));
						foreach($files as $file){
							unlink($path.'/'.$file);
						}
						rmdir($path);
					}elseif(is_file($path)===true){
						unlink($path);
					}
					
				}
				#delete all files in $array_of_folder_names (close)
				
			}
			#delete files and folders (close)
			
		}
		#delete files (close)
		
	}
	#delete user permanently (close)
	
	#delete user preliminarily (open)
	else{
		
		#deactivate user (open)
		if(1==1){
			
			#wp users extended (open)
			if(1==1){
				
				$GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_users_extended',
					array( //updated content
						'usersext_status' => 'deleted'
					),
					array( //location of updated content
						'usersext_id' => $function_userdelete['internal']['user']
					),
					array( //format of updated content
						'%s'
					),
					array( //format of location of updated content
						'%s'
					)
				);
				
			}
			#wp users extended (close)
			
		}
		#deactivate user (close)
		
		#set cronjob for permanent deletion (open)
		if(1==1){
			
			#function-cronjobs.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_cronjobs['section'] = 'add_new';// 'add_new','execution'. Obligatory. Select section of function.
					
					#add new section (open)
					if($function_cronjobs['section'] == 'add_new'){
						
						$function_cronjobs['new_cronjob_array']['name'] = 'delete user permanently (#function-user-delete.php)'; // Obligatory. Choose one existing name:
						// 'delete user permanently (#function-user-delete.php)'
						
						$function_cronjobs['new_cronjob_array']['identification'] = [
							'cronjob_identification_type' => 'user', // 'user', 'task', etc.
							'cronjob_identification_id' => $function_userdelete['internal']['user'] // user id, task id, etc.
						]; // Obligatory. Choose one existing name:
						// 'delete user permanently (#function-user-delete.php)'
						
						$function_cronjobs['new_cronjob_array']['execute_x_times'] = '1'; // Positive integer, default is 1.
						// How many times should it be executed? Min: 1. 0 means infinite times.
						
						$function_cronjobs['new_cronjob_array']['execute_every_x_seconds'] = 2592000; // Positive integer, default is '60' (one minute).
						// At what intervals should the action be executed? Any integer is possible:
						//        min:      60
						//       hour:    3600
						//        day:   86400
						// 7 day week:  604800
						//    10 days:  864000
						//    30 days: 2592000
						//    90 days: 7776000
						
					}
					#add new section (close)
					
				}
				#input (close)
				
				include('#function-cronjobs.php');
				
				#output (open)
				if(1==1){
					
					#echo $function_cronjobs['xxx']; // Explanation of the output variable.
					
				}
				#output (close)
				
			}
			#function-cronjobs.php (v1.0) (close)
			
		}
		#set cronjob for permanent deletion (close)
		
		#send email (open)
		if(1==1){
			
			###
			
		}
		#send email (close)
		
		#make subscriber (open)
		if(1==1){
			
			$function_userdelete['internal']['reset_wp_role'] = new WP_User($function_userdelete['internal']['user']);
			$function_userdelete['internal']['reset_wp_role']->set_role('subscriber');
			
		}
		#make subscriber (close)
		
	}
	#delete user preliminarily (close)
	
}
#permanent / preliminary deletion (close)

#output (open)
if(1==1){
	
	#$function_cronjobs = $function_cronjobs['output'];
	
	unset($function_userdelete);
	
}
#output (close)

?>