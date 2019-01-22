<?php

#mysql (open)
if(1==1){
    
    #get pre-update (open)
    if(1==1){
		
		#tags (open)
		if(1==1){
			
			$task_type_query_text = 'SELECT *
						FROM fi4l3fg_voluno_lists_task_types
						WHERE task_type_level = %d
						AND task_type_parent = %d';
			$task_type_query = $GLOBALS['wpdb']->prepare($task_type_query_text,1,0);
			$task_type_results = $GLOBALS['wpdb']->get_results($task_type_query);
			
			$task_type_unsorted_query_text = 'SELECT *
						FROM fi4l3fg_voluno_lists_task_types
						WHERE task_type_level = 0';
			$task_type_unsorted_query = $GLOBALS['wpdb']->prepare($task_type_unsorted_query_text);
			$task_type_unsorted_results = $GLOBALS['wpdb']->get_results($task_type_unsorted_query);
			
		}
		#tags (close)
		
    }
    #get pre-update (close)
    
    #update (open)
    if(1==1){
	
    }
    #update (close)
    
    #get post-update (open)
    if(1==1){
	
    }
    #get post-update (close)
    
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
    
    #task types (open)
    if(1==1){
	echo '
	<h2 style="display:inline;">
	    Tags
	</h2>';
	
	#level 1 - loop (open)
	for($ahd=0;$ahd<count($task_type_results);$ahd++){
	    
	    #level 1 - prepare (open)
	    if(1==1){
		$task_type_level2_query = $GLOBALS['wpdb']->prepare($task_type_query_text,
							2,
							$task_type_results[$ahd]->task_type_id);
		$task_type_level2_results = $GLOBALS['wpdb']->get_results($task_type_level2_query);
	    }
	    #level 1 - prepare (close)
	    
	    #level 1 - content (open)
	    if(1==1){
		echo '
		<div>
		    <strong>
			'.$task_type_results[$ahd]->task_type_name.' - '.$task_type_results[$ahd]->task_type_id.'
		    </strong>
		</div>';
	    }
	    #level 1 - content (close)
	    
	    #level 2 - loop (open)
	    for($ahe=0;$ahe<count($task_type_level2_results);$ahe++){
		
		#level 2 - prepare (open)
		if(1==1){
		    $task_type_level3_query = $GLOBALS['wpdb']->prepare($task_type_query_text,
							    3,
							    $task_type_level2_results[$ahe]->task_type_id);
		    $task_type_level3_results = $GLOBALS['wpdb']->get_results($task_type_level3_query);
		}
		#level 2 - prepare (close)
		
		#level 2 - content (open)
		if(1==1){
		    echo '
		    <div style="padding-left:30px;">
			'.$task_type_level2_results[$ahe]->task_type_name.' - '.$task_type_level2_results[$ahe]->task_type_id.'
		    </div>';
		}
		#level 2 - content (close)
		
		#level 3 - loop (open)
		for($ahg=0;$ahg<count($task_type_level3_results);$ahg++){
		    
		    #level 3 - content (open)
		    if(1==1){
			echo '
			<div style="padding-left:60px;font-style:italic;">
			    '.$task_type_level3_results[$ahg]->task_type_name.' - '.$task_type_level3_results[$ahg]->task_type_id.'
			</div>';
		    }
		    #level 3 - content (close)
		    
		}
		#level 3 - loop (close)
		
	    }
	    #level 2 - loop (close)
	    
	}
	#level 1 - loop (close)
	
	#unsorted (open)
	for($ahh=0;$ahh<count($task_type_unsorted_results);$ahh++){
	    
	    if($ahh == 0){
		echo '
		<h3>
		    Unsorted tags
		</h3>';
	    }
	    
	    echo '
	    <div>
		'.$task_type_unsorted_results[$ahh]->task_type_name.' - '.$task_type_unsorted_results[$ahh]->task_type_id.'
	    </div>';
	    
	}
	#unsorted (close)
	
    }
    #task types (close)
    
}
#content (close)

?>