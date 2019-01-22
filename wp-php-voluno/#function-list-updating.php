<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		##function-list-updating (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Guides the user through the Voluno website.
				
			}
			#documentation (close)
			
			include('#function-list-updating.php');
			
		}
		##function-list-updating (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.09.17, Steve
		## Last format and structure check: 2000.09.17, Steve
		## Last update of all instances this function is used: 2000.09.17, Steve
		
		# Here, add a short summary of what the function does.
		# This shouldn't be more than max. 10 lines.
		
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

// If there is an input, always transform it like this.
// From then on, only define variables in the form:
//    $function_listUpdating['internal']['xxx']
// To output a variable, see below.

#input + var definitions (open)
if(1==2){ ///1
	
	$function_listUpdating['internal'] = $function_listUpdating;
	
}
#input + var definitions (close)

//    $GLOBALS['voluno_variables']['#function-assistant.php']['xxx'] = 1;
//    voluno_function_example_xxx

#content (open)
if(1==1){
	
	#mysql + array creation (open)
	if(1==1){
		
		#query (open)
		if(1==1){
			
			$function_listUpdating['internal']['general_query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_lists_item_categories;'
			);
			$function_listUpdating['internal']['general_results'] = $GLOBALS['wpdb']->get_results($function_listUpdating['internal']['general_query']);
			
		}
		#query (close)
		
		#loop 1 (open)
		for($amz=0;$amz<count($function_listUpdating['internal']['general_results']);$amz++){
			if($function_listUpdating['internal']['general_results'][$amz]->itemcat_parent == 'list_item_cat_1'){
				
				#update (open)
				if(1==1){
					
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_lists_item_categories',
						array( //updated content
							'itemcat_topParent' => $function_listUpdating['internal']['general_results'][$amz]->itemcat_parent,
						),
						array( //location of updated content
							'itemcat_id' => $function_listUpdating['internal']['general_results'][$amz]->itemcat_id
						),
						array( //format of updated content
							'%s'
						),
						array( //format of location of updated content
							'%s'
						)
					);
					
				}
				#update (close)
				
				#loop 2 (open)
				for($ana=0;$ana<count($function_listUpdating['internal']['general_results']);$ana++){
					if($function_listUpdating['internal']['general_results'][$ana]->itemcat_parent == $function_listUpdating['internal']['general_results'][$amz]->itemcat_id){
						
						#update (open)
						if(1==1){
							
							$GLOBALS['wpdb']->update( 
								'fi4l3fg_voluno_lists_item_categories',
								array( //updated content
									'itemcat_topParent' => $function_listUpdating['internal']['general_results'][$amz]->itemcat_id,
								),
								array( //location of updated content
									'itemcat_id' => $function_listUpdating['internal']['general_results'][$ana]->itemcat_id
								),
								array( //format of updated content
									'%s'
								),
								array( //format of location of updated content
									'%s'
								)
							);
							
						}
						#update (close)
						
						#loop 3 (open)
						for($anb=0;$anb<count($function_listUpdating['internal']['general_results']);$anb++){
							if($function_listUpdating['internal']['general_results'][$anb]->itemcat_parent == $function_listUpdating['internal']['general_results'][$ana]->itemcat_id){
								
								#update (open)
								if(1==1){
									
									$GLOBALS['wpdb']->update( 
										'fi4l3fg_voluno_lists_item_categories',
										array( //updated content
											'itemcat_topParent' => $function_listUpdating['internal']['general_results'][$amz]->itemcat_id,
										),
										array( //location of updated content
											'itemcat_id' => $function_listUpdating['internal']['general_results'][$anb]->itemcat_id
										),
										array( //format of updated content
											'%s'
										),
										array( //format of location of updated content
											'%s'
										)
									);
									
								}
								#update (close)
								
								#loop 4 (open)
								for($anc=0;$anc<count($function_listUpdating['internal']['general_results']);$anc++){
									if($function_listUpdating['internal']['general_results'][$anc]->itemcat_parent == $function_listUpdating['internal']['general_results'][$anb]->itemcat_id){
										
										#update (open)
										if(1==1){
											
											$GLOBALS['wpdb']->update( 
												'fi4l3fg_voluno_lists_item_categories',
												array( //updated content
													'itemcat_topParent' => $function_listUpdating['internal']['general_results'][$amz]->itemcat_id,
												),
												array( //location of updated content
													'itemcat_id' => $function_listUpdating['internal']['general_results'][$anc]->itemcat_id
												),
												array( //format of updated content
													'%s'
												),
												array( //format of location of updated content
													'%s'
												)
											);
											
										}
										#update (close)
										
									}
								}
								#loop 4 (close)
								
							}
						}
						#loop 3 (close)
						
					}
				}
				#loop 2 (close)
				
			}
		}
		#loop 1 (close)
		
	}
	#mysql + array creation (close)
	
}
#content (close)

#output (open)
if(1==2){
	
	$function_listUpdating = $function_listUpdating['output'];
	
}
#output (close)

?>