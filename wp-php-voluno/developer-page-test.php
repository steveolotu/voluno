<?php

echo '
<br>
Empty page for developers to test their code.
<br>';

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
				$function_userpositions_get['display all positions for developers'] = 'yes'; // 'yes', 'yes, long' or 'no' (default).
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
				#	 Example usage:
				#       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
				#
				# Method 4: Simple pure arrays
				#    $function_userpositions_get['simple_pure_array'][STATUS][INDEX] = SPECIFIC PURE POSITION NAME   //STATUS = pending or accepted
				#
				# Method 5:
				#    $function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
				#		full -> NGO name (user position)
				#		position -> pure position
				#		status -> "accepted" or "pending"
				#		ngo_name -> NGO name
				#		ngo_id -> NGO id
				#
				# Global variables:
				#    Function get's called in the top right sidebar for the current user, so these global variables are always available. 
				#		$GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
				#		$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
				#       $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['STATUS'][] = POSITION NAME
				#		$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['STATUS'][] = POSITION NAME;ADDITIONAL INFO
				#    Example usage:
				#		in_array(POSITION NAME,$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])
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

?>