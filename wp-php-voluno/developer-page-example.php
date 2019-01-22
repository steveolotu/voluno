<?php

#documentation (open)
if(0!=0){
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2000.01.01, Steve
		
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

#xxx (open)
if(1==1){
	
	#mysql (open)
	if(1==1){
		
		$function_example['internal']['xxx query'] = $GLOBALS['wpdb']->prepare(
			'SELECT *
			FROM xxx;'
		);
		$function_example['internal']['xxx results'] = $GLOBALS['wpdb']->get_results($function_example['internal']['xxx query']);
		
	}
	#mysql (close)
	
	#jquery (open)
	if(1==1){
		
		echo '
		<script>
			jQuery(document).ready(function(){';
				
				#xxx (open)
				if(1==2){
					
					echo '
					jQuery(".voluno_").
					});';
					
				}
				#xxx (close)
				
			echo '
			});
		</script>';
		
	}
	#jquery (close)
	
	#content (open)
	if(1==2){
		
		$function_example['output']['content'] .= '
		xxx';
		
	}
	#content (close)
	
}
#xxx (close)

?>