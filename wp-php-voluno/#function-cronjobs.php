<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
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
				
				$function_cronjobs['xxx'] = 22;// 'Option 1','Option 2' (default). Explanation of the input variable.
				
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
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2000.01.01, Steve
		## Last update of all instances this function is used: 2000.01.01, Steve
		
		# Here, add a short summary of what the function does.
		# This shouldn't be more than max. 10 lines.
		


		// hours: 
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
	
	$function_cronjobs['internal'] = $function_cronjobs;
	
}
#input + var definitions (close)

//    $GLOBALS['voluno_variables']['#function-cronjobs.php']['xxx'] = 1;
//    voluno_function_example_xxx

#xxx (open)
if(1==1){
	
	#add new cronjobs (open)
	if($function_cronjobs['internal']['section'] == 'add_new'){
		
		#default values (open)
		if(1==1){
			
			#execute x times (open)
			if(empty($function_cronjobs['internal']['new_cronjob_array']['execute_x_times'])){
				
				$function_cronjobs['internal']['new_cronjob_array']['execute_x_times'] = 1;
				
			}
			#execute x times (close)
			
			#execute_every_x_seconds (open)
			if(empty($function_cronjobs['internal']['new_cronjob_array']['execute_every_x_seconds'])){
				
				$function_cronjobs['internal']['new_cronjob_array']['execute_every_x_seconds'] = 60;
				
			}
			#execute_every_x_seconds (close)
			
		}
		#default values (close)
		
		#database query insert (open)
		if(!empty($function_cronjobs['internal']['new_cronjob_array']['name'])){
		   
			$GLOBALS['wpdb']->insert(
				'fi4l3fg_voluno_cronjobs',
				array(
					'cronjob_name' => $function_cronjobs['internal']['new_cronjob_array']['name'],#'delete user permanently (#function-user-delete.php)',
					
					'cronjob_identification_type' => $function_cronjobs['internal']['new_cronjob_array']['identification']['cronjob_identification_type'],
					'cronjob_identification_id' => $function_cronjobs['internal']['new_cronjob_array']['identification']['cronjob_identification_id'],
					
					'cronjob_execute_x_times' => $function_cronjobs['internal']['new_cronjob_array']['execute_x_times'],
					'cronjob_execute_every_x_seconds' => $function_cronjobs['internal']['new_cronjob_array']['execute_every_x_seconds'],
					
					'cronjob_date_modified' => date("Y-m-d H:i:s"),
					'cronjob_date_created' => date("Y-m-d H:i:s"),
				),
				array(
					'%s',
					'%s','%s',
					'%d','%s',
					'%s','%s'
				)
			);
		   
		}
		#database query insert (close)
		
	}
	#add new cronjobs (close)
	
	#cronjob executions (open)
	if($function_cronjobs['internal']['section'] == 'execution'){
		
		#get (open)
		if(1==1){
			
			$function_cronjobs['internal']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_cronjobs;'
			);
			$function_cronjobs['internal']['results'] = $GLOBALS['wpdb']->get_results($function_cronjobs['internal']['query']);
			
		}
		#get (close)
		
		#
		for($alu=0;$alu<count($function_cronjobs['internal']['results']);$alu++){
			
			#calculation (open)
			if(1==1){
				
				//how long has the update been?
				$function_cronjobs['internal']['last_modofied'] = strtotime($function_cronjobs['internal']['results'][$alu]->cronjob_date_modified);
				$function_cronjobs['internal']['seconds_since_last_modofied'] = time() - $function_cronjobs['internal']['last_modofied'];
				
				//when is the next update due?
				$function_cronjobs['internal']['setting_offset'] = $function_cronjobs['internal']['results'][$alu]->cronjob_execute_every_x_seconds;
				
			}
			#calculation (close)
			
			#update (open)
			if($function_cronjobs['internal']['seconds_since_last_modofied'] > $function_cronjobs['internal']['setting_offset']){
				
				#set next instance (open)
				if(1==1){
					
					#set repeat (open)
					if($function_cronjobs['internal']['results'][$alu]->cronjob_execute_x_time != 1){
						// if it's 0, it will repeat forever.
						
						#next repeat (open)
						if($function_cronjobs['internal']['results'][$alu]->cronjob_execute_x_time > 1){
							//reduce repetition by 1
							
							$function_cronjobs['internal']['next_repeat']
							= $function_cronjobs['internal']['results'][$alu]->cronjob_execute_x_time - 1;
							
							echo 'update_occured!reduced by 1. now its: '.
							($function_cronjobs['internal']['results'][$alu]->cronjob_execute_x_time - 1);###
							
						}else{
							//repeat forever
							
							$function_cronjobs['internal']['next_repeat'] = 0;
							
						}
						#next repeat (close)
						
						#database query update (open)
						if(1==1){
							
							$GLOBALS['wpdb']->update( 
								'fi4l3fg_voluno_cronjobs',
								array( //updated content
									'cronjob_date_modified' => date("Y-m-d H:i:s",time()),
									'cronjob_execute_x_time' => $function_cronjobs['internal']['next_repeat']
								),
								array( //location of updated content
									'cronjob_id' => $function_cronjobs['internal']['results'][$alu]->cronjob_id
								),
								array( //format of updated content
									'%s','%d'
								),
								array( //format of location of updated content
									'%d'
								)
							);
							
						}
						#database query update (close)
						
					}else{
						//last repetition instance
						
						#database query delete (open)
						if(1==1){
							
							$GLOBALS['wpdb']->delete(
								'fi4l3fg_voluno_cronjobs',
								array( //location of row to delete
									'cronjob_id' => $function_cronjobs['internal']['results'][$alu]->cronjob_id
								),
								array( //format of location of row to delete
									'%d'
								)
							);
							
						}
						#database query delete (close)
						
						echo 'update_occured! DELETED.'; ###
						
					}
					#set repeat (close)
					
				}
				#set next instance (close)
				
				#cronjobs (open)
				if(1==1){
					
					#delete user finally (open)
					if($function_cronjobs['internal']['results'][$alu]->cronjob_name == 'delete user permanently (#function-user-delete.php)'){
						
						

						
					}
					#delete user finally (close)
					
				}
				#cronjobs (close)
				
			}
			#update (close)
			echo '<br>'.$function_cronjobs['internal']['results'][$alu]->cronjob_date_modified;
			
		}
		#
		
	}
	#cronjob executions (close)
	
}
#xxx (close)

#output (open)
if(1==1){
	
	$function_cronjobs = $function_cronjobs['output'];
	
}
#output (close)

?>