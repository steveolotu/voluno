<?php

$function_record__internal['user'] = $function_record['user'];

unset($function_record);

#prevent execution if input empty (open)
if(is_numeric($function_record__internal['user']) AND !empty($function_record__internal['user'])){
    
    #get user record (open)
    if(1==1){
	
	#query (open)
	if(1==1){
	    
	    $function_record__internal['query'] = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_records
								LEFT JOIN fi4l3fg_voluno_lists_rating_type
								    ON record_type_specific = ratingtype_class_msql_name
								WHERE record_user_id  = %s
								    AND record_type_detail = "sum"
								ORDER BY record_type_specific;'
								,$function_record__internal['user']);
	    $function_record__internal['results'] = $GLOBALS['wpdb']->get_results($function_record__internal['query']);
	    
	}
	#query (close)
	
	#refresh user record (open)
	if(1==1 OR (time() - strtotime($function_record__internal['results'][0]->record_date_created)) > 60 * 60){ #dome
	    
	    #delete old (open)
	    if(1==1){
		
		$GLOBALS['wpdb']->delete(
			    'fi4l3fg_voluno_records',
			array( //location of row to delete
			    'record_user_id' => $function_record__internal['user'],
			    'record_type_detail' => 'sum'
			),
			array( //format of location of row to delete
			    '%s','%s'
			));
		
	    }
	    #delete old (close)
	    
	    #get/prepare new (open)
	    if(1==1){
		
		#reputation (open)
		for($afo=0;$afo<count($function_record__internal['results']);$afo++){
		    
		    #query + counter (open)
		    if($afo == 0){
			
			$function_record__internal['counter'] = -1;
			
			#query (open)
			if(1==1){
			    
			    $function_record__internal['query'] = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_records
										LEFT JOIN fi4l3fg_voluno_lists_rating_type
										    ON record_type_specific = ratingtype_class_msql_name
										WHERE record_user_id  = %s
										    AND record_type_general = "reputation"
										ORDER BY record_type_specific;'
										,$function_record__internal['user']);
			    $function_record__internal['results'] = $GLOBALS['wpdb']->get_results($function_record__internal['query']);
			    
			}
			#query (close)
			
		    }
		    #query + counter (close)
		    
		    # (open)
		    if(in_array($function_record__internal['results'][$afo]->ratingtype_specific,array("user","item"))){
			
			#create array (open)
			if($function_record__internal['results'][$afo-1]->record_type_specific
			   != $function_record__internal['results'][$afo]->record_type_specific){
			    
			    //an x*y array is transformed to a x array, where one value is the name of x and one value is the average of y
			    //in the first case, a new x has to be created in the array. in the second case, the value is added.
			    
			    $function_record__internal['counter']++;
			    $function_record__internal['counter2'] = 1;
			    
			    $function_record__internal['update_array'][$function_record__internal['counter']] = array(
				'value' => $function_record__internal['results'][$afo]->record_value,
				'object' => $function_record__internal['results'][$afo]
			    );
			    
			}else{
			    
			    $function_record__internal['counter2']++;
			    
			    $function_record__internal['update_array'][$function_record__internal['counter']]['value']
			    += $function_record__internal['results'][$afo]->record_value;
			    
			    if($function_record__internal['results'][$afo]->record_type_specific
			       != $function_record__internal['results'][$afo+1]->record_type_specific){
				
				//if this is the last y value in this x category, it's divided by the amount of y, in order to get the average
				
				$function_record__internal['update_array'][$function_record__internal['counter']]['value']
				= $function_record__internal['update_array'][$function_record__internal['counter']]['value']
				/ $function_record__internal['counter2'];
			    }
			}
			#create array (close)
			
		    }
		    # (close)
		    
		}
		#reputation (close)
		
		#experience (open)
		if(1==1){
		    
		    #messages_sent (open)
		    if(1==1){
			
			$function_record__internal['query_temp'] = $GLOBALS['wpdb']->prepare('SELECT *
									    FROM fi4l3fg_voluno_message_system_messages
									    WHERE messys_mes_author = %s
										AND messys_mes_status = "";'
									    ,$function_record__internal['user']);
			$function_record__internal['results_temp'] = $GLOBALS['wpdb']->get_results($function_record__internal['query_temp']);
			
			$function_record__internal['update_array'][] = array(
			    'value' => count($function_record__internal['results_temp']),
			    'array' => array(
					    'record_type_general' => 'experience',
					    'record_type_specific' => 'messages_sent',
					    'weight' => '0.1'
					    )
			);
			
		    }
		    #messages_sent (close)
		    
		    #forum_posts (open)
		    if(1==1){
			
			$function_record__internal['query_temp'] = $GLOBALS['wpdb']->prepare('SELECT *
									    FROM fi4l3fg_voluno_forum_posts
									    WHERE voluno_for_pos_author  = %s
										AND voluno_for_pos_status = "";'
									    ,$function_record__internal['user']);
			$function_record__internal['results_temp'] = $GLOBALS['wpdb']->get_results($function_record__internal['query_temp']);
			
			$function_record__internal['update_array'][] = array(
			    'value' => count($function_record__internal['results_temp']),
			    'array' => array(
					    'record_type_general' => 'experience',
					    'record_type_specific' => 'forum_posts',
					    'weight' => '1'
					    )
			);
			
		    }
		    #forum_posts (close)
		    
		}
		#experience (close)
		
	    }
	    #get/prepare new (close)
	    
	    #update (open)
	    if(1==1){
		
		#database query insert (open)
		for($afp=0;$afp<count($function_record__internal['update_array']);$afp++){
		    
		    #reputation (open)
		    if($function_record__internal['update_array'][$afp]['object']->record_type_general == "reputation"){
			$function_record__internal['record_type_general']
			    = $function_record__internal['update_array'][$afp]['object']->record_type_general;
			$function_record__internal['record_type_specific']
			    = $function_record__internal['update_array'][$afp]['object']->record_type_specific;
		    }
		    #reputation (close)
		    
		    #experience (open)
		    else{
			
			#skip if empty (open)
			if($function_record__internal['update_array'][$afp]['value'] == 0){
			    //prevents that empty experience items are shown in profile
			    continue;
			}
			#skip if empty (close)
			
			$function_record__internal['record_type_general'] = "experience";
			$function_record__internal['record_type_general']
			    = $function_record__internal['update_array'][$afp]['array']['record_type_general'];
			$function_record__internal['record_type_specific']
			    = $function_record__internal['update_array'][$afp]['array']['record_type_specific'];
			
			$function_record__internal['total_experience']
			    = $function_record__internal['total_experience']
			    + ($function_record__internal['update_array'][$afp]['value']
			    * $function_record__internal['update_array'][$afp]['array']['weight']);
		    }
		    #experience (close)
		    
		    #database insert (open)
		    if(1==1){
			$GLOBALS['wpdb']->insert(
				    'fi4l3fg_voluno_records',
				array(
				    'record_user_id' => $function_record__internal['user'],
				    'record_type_general' => $function_record__internal['record_type_general'],
				    'record_type_specific' => $function_record__internal['record_type_specific'],
				    'record_type_detail' => 'sum',
				    
				    'record_value' => $function_record__internal['update_array'][$afp]['value'],
				    'record_status' => "",
				    'record_date_modified' => date("Y-m-d H:i:s"),
				    'record_date_created' => date("Y-m-d H:i:s")
				),
				array(
				    '%s','%s','%s','%s',
				    '%s','%s','%s','%s'
				));
		    }
		    #database insert (close)
		    
		}
		#database query insert (close)
		
		#insert total sums (open)
		if(1==1){
		    
		    $GLOBALS['wpdb']->insert(
				'fi4l3fg_voluno_records',
			    array(
				'record_user_id' => $function_record__internal['user'],
				'record_type_general' => 'experience',
				'record_type_specific' => 'total',
				'record_type_detail' => 'sum',
				
				'record_value' => round($function_record__internal['total_experience']),
				'record_status' => "",
				'record_date_modified' => date("Y-m-d H:i:s"),
				'record_date_created' => date("Y-m-d H:i:s")
			    ),
			    array(
				'%s','%s','%s','%s',
				'%s','%s','%s','%s'
			    ));
		    
		}
		#insert total sums (close)
		
	    }
	    #update (close)
	    
	    #refresh query (open)
	    if(1==1){
		
		$function_record__internal['query'] = $GLOBALS['wpdb']->prepare('SELECT *
								    FROM fi4l3fg_voluno_records
								    LEFT JOIN fi4l3fg_voluno_lists_rating_type
									ON record_type_specific = ratingtype_class_msql_name
								    WHERE record_user_id  = %s
									AND record_type_detail = "sum"
								    ORDER BY ratingtype_myprofile_order ASC;'
								    ,$function_record__internal['user']);
		$function_record__internal['results'] = $GLOBALS['wpdb']->get_results($function_record__internal['query']);
		
	    }
	    #refresh query (close)
	    
	}
	#refresh user record (close)
	
	#reputation (open)
	if(1==1){
	    
	    for($afl=0;$afl<count($function_record__internal['results']);$afl++){
		
		if($function_record__internal['results'][$afl]->record_type_general == "reputation"
		   AND
		   $function_record__internal['results'][$afl]->ratingtype_specific == "user"){
		    
		    //generates total reputation sum
		    $function_record__internal['rep']
			= $function_record__internal['rep'] + $function_record__internal['results'][$afl]->record_value;
		    $function_record__internal['rep_counter']++;
		    
		    //generates array for my profile
		    $function_record__internal['rep_array'][] = $function_record__internal['results'][$afl];
		}
		
	    }
	    
	    if(empty($function_record__internal['rep'])){
		$function_record__internal['rep'] = "?";
	    }else{
		$function_record__internal['rep'] = $function_record__internal['rep'] / $function_record__internal['rep_counter'];
	    }
	    
	}
	#reputation (close)
	
	#experience (open)
	if(1==1){
	    
	    for($afl=0;$afl<count($function_record__internal['results']);$afl++){
		
		if($function_record__internal['results'][$afl]->record_type_general == "experience"){
		    
		    if($function_record__internal['results'][$afl]->record_type_specific == "total"){
			
			$function_record__internal['exp'] = $function_record__internal['results'][$afl]->record_value;
			
			if(empty($function_record__internal['exp'])){
			    $function_record__internal['exp'] = "?";
			}
			
		    }else{
			$function_record__internal['exp_array'][] = $function_record__internal['results'][$afl];
		    }
		    
		}
		
	    }
	    
	    
	    
	}
	#experience (close)
	
    }
    #get user record (close)
    
    #output (open)
    if(1==1){
	
	if(is_numeric($function_record__internal['rep'])){
	    $function_record['rep'] = number_format($function_record__internal['rep'],1,"."," ");
	}else{
	    $function_record['rep'] = $function_record__internal['rep'];
	}
	if(is_numeric($function_record__internal['exp'])){
	    
	    if($function_record__internal['exp'] > pow(10,6)){ #million
		$function_record['exp'] = number_format($function_record__internal['exp']/pow(10,6),0,".","&nbsp;").' M';
	    }elseif($function_record__internal['exp'] > pow(10,3)){ #thousand
		$function_record['exp'] = number_format($function_record__internal['exp']/pow(10,3),0,".","&nbsp;").' K';
	    }else{ #normal
		$function_record['exp'] = number_format($function_record__internal['exp'],0,".","&nbsp;");
	    }
	}else{
	    $function_record['exp'] = $function_record__internal['exp'];
	}
	
	if($function_record__internal['rep'] == '?' AND $function_record__internal['exp'] == 0){
	    $function_record['full'] = '(New)';
	}else{
	    $function_record['full'] =
	    '('.
		$function_record['rep'].
	    '|'.
		$function_record['exp'].
	    ')';
	}
	
	$function_record['rep_array'] = $function_record__internal['rep_array'];
	$function_record['exp_array'] = $function_record__internal['exp_array'];
	
    }
    #output (close)
    
}
#prevent execution if input empty (close)

unset($function_record__internal);

?>