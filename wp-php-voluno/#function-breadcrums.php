<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
        
		#function-breadcrums.php (v3.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_breadcrums['input_array'] = [
                    'left' => [
                        [
                            'text' => 'View all tasks in the marketplace',
                            'link' => get_permalink()
                        ],
                        [
                            'text' => 'View all tasks in the marketplace',
                            'link' => get_permalink()
                        ]
                    ]
                    ,'right'=> [
                        [
                            'text' => 'View all tasks in the marketplace',
                            'link' => get_permalink()
                        ],
                        [
                            'text' => 'View all tasks in the marketplace',
                            'link' => get_permalink()
                        ]
                    ]
                ];
                // Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
				
			}
			#input (close)
			
			include('#function-breadcrums.php');
			
			#output (open)
			if(1==1){
				
				#echo $function_breadcrums['breadcrums']; // Output variable.
				
			}
			#output (close)
			
		}
		#function-breadcrums.php (v3.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.12.14, Steve
		## Last format and structure check: 2016.12.14, Steve
		## Last update of all instances this function is used: 2016.12.14, Steve
		
		# Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
		
		// Input and define variables. ///1
		// Loop through each level of the respective breadcrum: <- level 1 <- level 2 <- level ///2
		// Create final content. ///3
        // Create output variable. ///4
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_breadcrums['internal'] = $function_breadcrums;
	
    $function_breadcrums['internal']['text_size'] = '80%';
    $function_breadcrums['internal']['max_characters'] = 40;
    
}
#input + var definitions (close)

#loops (open)
if(1==1){ ///2
    
    #left (open)
    for($abk=0;$abk<count($function_breadcrums['internal']['input_array']['left']);$abk++){
        
        #function-only-first-x-symbols.php (open)
        if(1==1){
            
            $function_only_first_x_symbols = $function_breadcrums['internal']['input_array']['left'][$abk]['text']; #content
            $function_only_first_x_symbols_num = $function_breadcrums__max_characters; #optional, number of symbols, default is 100
            $function_only_first_x_symbols__more_button = "no"; //default: yes, empty
            include('#function-only-first-x-symbols.php');
            #output: $function_only_first_x_symbols
            
        }
        #function-only-first-x-symbols.php (close)
        
        $function_breadcrums['internal']['output_array']['left']['text'] .= '
        <span style="font-size:'.$function_breadcrums__text_size.';">
            <a
                href="'.$function_breadcrums['internal']['input_array']['left'][$abk]['link'].'"
                title="'.preg_replace('/(\s)+/',' ',$function_breadcrums['internal']['input_array']['left'][$abk]['text']).'"
            >
                &#8592 '.$function_only_first_x_symbols.'
            </a>
        </span>';
        
    }
    #left (close)
    
    #right (open)
    for($abk=0;$abk<count($function_breadcrums['internal']['input_array']['right']);$abk++){
        
        #function-only-first-x-symbols.php (open)
        if(1==1){
            $function_only_first_x_symbols = $function_breadcrums['internal']['input_array']['right'][$abk]['text']; #content
            $function_only_first_x_symbols_num = $function_breadcrums__max_characters; #optional, number of symbols, default is 100
            $function_only_first_x_symbols__more_button = "no"; //default: yes
            include('#function-only-first-x-symbols.php');
            #output: $function_only_first_x_symbols
        }
        #function-only-first-x-symbols.php (close)
        
        $function_breadcrums['internal']['output_array']['right']['text'] .= '
        <span style="font-size:'.$function_breadcrums__text_size.';">
            <a
                href="'.$function_breadcrums['internal']['input_array']['right'][$abk]['link'].'"
                title="'.preg_replace('/(\s)+/',' ',$function_breadcrums['internal']['input_array']['right'][$abk]['text']).'"
            >
                '.$function_only_first_x_symbols.' &#8594
            </a>
        </span>';
        
    }
    #right (close)
    
}
#loops (close)

#content (open)
if(1==1){ ///3
    
    $function_breadcrums['output']['breadcrums'] = '
    <table style="position:absolute;width:920px;">
        <tr>
            <td style="width:50%;">
                '.$function_breadcrums['internal']['output_array']['left']['text'].'
            </td>
            <td style="width:50%;text-align:right;">
                '.$function_breadcrums['internal']['output_array']['right']['text'].'
            </td>
        </tr>
    </table>
    <div style="height:30px;visibility:hidden;">.
    </div>';
    
}
#content (close)

#output (open)
if(1==1){ ///4
	
	$function_breadcrums = $function_breadcrums['output'];
	
}
#output (close)

?>