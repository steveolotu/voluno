<?php

#function-contact-add-remove.php (v1.0) (open)
if(1==2){
    $function_contact_add_remove['active_user'] = 1;
    $function_contact_add_remove['passive_user'] = 1;//only one id allowed. if more than one, make a loop.
    $function_contact_add_remove['action'] = "add"; //'add' or 'remove'
    $function_contact_add_remove['type'] = "message"; //optional in case of action = "add": message (looks up user settings regarding messages)
							//miscellaneous_general__automatically_add_member_to_my_contacts_after_internal_message
    include('#function-contact-add-remove.php');
}
#function-contact-add-remove.php (v1.0) (close)

#add (open)
if($function_contact_add_remove['action'] == "add"){
    
    #active_user (open)
    if(1==1){
		
		#check options: add to contacts if a message or text of any kind is sent or received (open)
		if($function_contact_add_remove['type'] == "message"){
			
			#function-get-user-settings.php (v1.0) (open)
			if(1==1){
			$function_get_user_settings = $function_contact_add_remove['active_user']; //user id. default is current user
			include('#function-get-user-settings.php');
			#output array (value: yes or no, keys: settings name): $function_get_user_settings //if no user value, use default as defined in my settings php
			
			#Alternatively, do a for loop with:
				#$function_get_user_settings_array[]['key']
				#$function_get_user_settings_array[]['value']
				#$function_get_user_settings_array[]['user_or_default_value']
			}
			#function-get-user-settings.php (v1.0) (close)
			
			if($function_get_user_settings['miscellaneous_general__automatically_add_member_to_my_contacts_after_internal_message'] == "no"){
			$function_contact_add_remove__internal['type_decision_active'] = "no";
			}
		}
		#check options: add to contacts if a message or text of any kind is sent or received (close)
		
		#settings check for messages (open)
		if($function_contact_add_remove__internal['type_decision_active'] != "no"){
			
			#update (open)
			if(1==1){
			
			$function_contact_add_remove__internal['update_add_query'] = $GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_personal_settings',
				array( //updated content
					'pers_settings_specific'      => 'active',
					'pers_settings_date_modified' => date("Y-m-d H:i:s")
				),
				array( //location of updated content
					'pers_settings_general'       => 'contact',
					'pers_settings_specific'      => 'removed',
					'pers_settings_value'         => $function_contact_add_remove['passive_user'],
					'pers_settings_user_id'       => $function_contact_add_remove['active_user']
					
				),
				array( //format of updated content
					'%s','%s'
				),
				array( //format of location of updated content
					'%s','%s','%s','%s'
				));
			
			}
			#update (close)
			
			#insert (open)
			if($function_contact_add_remove__internal['update_add_query'] != true){
			
			$GLOBALS['wpdb']->insert(
					'fi4l3fg_voluno_personal_settings',
				array(
					'pers_settings_general'   	  => 'contact',
					'pers_settings_specific'  	  => 'active',
					'pers_settings_value'     	  => $function_contact_add_remove['passive_user'],
					'pers_settings_user_id'   	  => $function_contact_add_remove['active_user'],
					
					'pers_settings_date_modified' => date("Y-m-d H:i:s"), 
					'pers_settings_date_created'  => date("Y-m-d H:i:s")
					),
				array(
					'%s','%s','%s','%s',
					'%s','%s'
					));
			
			}
			#insert (close)
			
		}
		#settings check for messages (close)
		
    }
    #active_user (close)
    
    #passive_user (open)
    if(1==1){
		
		#function-get-user-settings.php (v1.0) (open)
		if(1==1){
			$function_get_user_settings = $function_contact_add_remove['passive_user']; //user id. default is current user
			include('#function-get-user-settings.php');
			#output array (value: yes or no, keys: settings name): $function_get_user_settings //if no user value, use default as defined in my settings php
			
			#Alternatively, do a for loop with:
			#$function_get_user_settings_array[]['key']
			#$function_get_user_settings_array[]['value']
			#$function_get_user_settings_array[]['user_or_default_value']
		}
		#function-get-user-settings.php (v1.0) (close)
		
		#check options: add to contacts if a message or text of any kind is sent or received (open)
		if($function_contact_add_remove['type'] == "message"){
			if($function_get_user_settings['miscellaneous_general__automatically_add_member_to_my_contacts_after_internal_message'] == "no"){
			$function_contact_add_remove__internal['type_decision'] = "no";
			}
		}
		#check options: add to contacts if a message or text of any kind is sent or received (close)
		
		#member wants new contacts to be added automatically (open)
		if($function_get_user_settings['miscellaneous_general__automatically_add_member_to_my_contacts_after_i_am_added'] == "yes"
		   AND $function_contact_add_remove__internal['type_decision'] != "no"){
			
			#function-user-relationships-and-status.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// Provides arrays of user ids which are sorted according to their user status and their relationship to the current user (if provided).
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_userRelSta['array'] = $function_contact_add_remove['active_user']; // Optional. Default is an array of all users.
					$function_userRelSta['user'] = ['user_id' => $function_contact_add_remove['passive_user']];
					// user_id: Optional. User id or 'current_user'. include_user_in_output
					// include_user_in_output: If user_id is given, then 'yes' or 'no' (default). Includes the selected user id in the output arrays
					$function_userRelSta['add_users_extended_arrays'] = 'no'; //'yes','no' (default).
					
				}
				#input (close)
				
				include('#function-user-relationships-and-status.php');
				
				#output (open)
				if(1==1){
					
					# $function_userRelSta['all'] //all users registered at Voluno.
					#
					# $function_userRelSta['active'] //users which have the status "active".
					# $function_userRelSta['inactive'] //users which do not have the status "active": "draft", "paused", "locked" or "deleted"
					#     $function_userRelSta['draft']
					#     $function_userRelSta['paused']
					#     $function_userRelSta['locked']
					#     $function_userRelSta['deleted']
					#
					# $function_userRelSta['contacts'] // All not blocked contacts
					# $function_userRelSta['blocked'] // All blocked contacts
					#     not yet programmed: $function_userRelSta['blocked_by_this_user']
					#     not yet programmed: $function_userRelSta['blocked_by_other_user']
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
			
			#insert (open)
			if(in_array($function_contact_add_remove['active_user'],$function_userRelSta['active'])
			   AND
			   !in_array($function_contact_add_remove['active_user'],$function_userRelSta['contacts'])
			){
			
			//the only possible case is that there hasn't been a contact yet. otherwise (if removed), it shouldn't automatically
			//be added. Thus, only insert.
			
			$GLOBALS['wpdb']->insert(
					'fi4l3fg_voluno_personal_settings',
				array(
					'pers_settings_general'   	=> 'contact',
					'pers_settings_specific'  	=> 'active',
					'pers_settings_value'     	=> $function_contact_add_remove['active_user'],
					'pers_settings_user_id'   	=> $function_contact_add_remove['passive_user'],
					
					'pers_settings_date_modified' 	=> date("Y-m-d H:i:s"), 
					'pers_settings_date_created' 	=> date("Y-m-d H:i:s")
					),
				array(
					'%s','%s','%s','%s',
					'%s','%s'
					));
			
			}
			#insert (close)
			
		}
		#member wants new contacts to be added automatically (close)
		
    }
    #passive_user (close)

}
#add (close)

#remove (open)
if($function_contact_add_remove['action'] == "remove"){
    
    #active_user (open)
    if(1==1){
	
	#update (open)
	if(1==1){
	    
	    $GLOBALS['wpdb']->update( 
			'fi4l3fg_voluno_personal_settings',
		    array( //updated content
			'pers_settings_specific'  	  => 'removed',
			'pers_settings_date_modified' 	  => date("Y-m-d H:i:s")
		    ),
		    array( //location of updated content
			'pers_settings_general'   	  => 'contact',
			'pers_settings_specific'  	  => 'active',
			'pers_settings_value'     	  => $function_contact_add_remove['passive_user'],
			'pers_settings_user_id'   	  => $function_contact_add_remove['active_user']
			
		    ),
		    array( //format of updated content
			'%s','%s'
		    ),
		    array( //format of location of updated content
			'%s','%s','%s','%s'
		    ));
	    
	}
	#update (close)
	
    }
    #active_user (close)
    
}
#remove (close)

unset(
    $function_contact_add_remove,
    $function_contact_add_remove__internal,
    $function_get_user_settings
);

?>