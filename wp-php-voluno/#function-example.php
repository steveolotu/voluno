<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-example.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_example['xxx'] = // 'Option 1','Option 2' (default). Explanation of the input variable.
				
			}
			#input (close)
			
			include('#function-example.php');
			
			#output (open)
			if(1==1){
				
				#echo $function_example['xxx']; // Explanation of the output variable.
				
			}
			#output (close)
			
		}
		#function-example.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2000.01.01, Steve
		## Last update of all instances this function is used: 2000.01.01, Steve
		
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
//    $function_example['internal']['xxx']
// To output a variable, see below.

#input + var definitions (open)
if(1==1){ ///1
	
	$function_example['internal'] = $function_example;
	
}
#input + var definitions (close)

// Next, do whatever the function does.
// In this example function, xxx is used as a placeholder.

// If you need to, you can define global variables, but only in this form:
//    $GLOBALS['voluno_variables']['#function-example.php']['xxx'] = 1;

// Name classes and javascript variables in the following way:
//    voluno_function_example_xxx

#xxx (open)
if(1==1){
	
	#mysql (open)
	if(1==2){
		
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

// To output variables, replace
//    $function_example
// with
//    $function_example['output']
// thereby clearing all internal or output variables.

#output (open)
if(1==1){
	
	$function_example = $function_example['output'];
	
}
#output (close)

?>