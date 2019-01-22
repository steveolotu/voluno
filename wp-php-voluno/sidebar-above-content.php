<?php

#documentation (open)
if(0!=0){
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.12.10, Steve
		## Last format and structure check: 2016.12.10, Steve
		
		# Sidebar. Is loaded directly before the content.
		
		// This sidebar is integrated in two uncommon ways:
        // - It's included into the PHP file "single.php", see Child Theme folder.
        // - For some reason, the above method isn't working on the homepage, which is a "page" (post type). Thus, it's manually integrated into the post (via Wordpress default  post editor).
        //   Note: Just in case, the file is secured to only be loaded once ///1
		
	}
	##file info (close)
	
}
#documentation (close)

#load only once (open)
if($GLOBALS['voluno_variables']['sidebar-above-content.php']['already_loaded'] != 'yes'){ ///1
    
    $GLOBALS['voluno_variables']['sidebar-above-content.php']['already_loaded'] == 'yes';
    
    #function-developer-warnings.php (v1.0) (open)
    if(in_array('Voluno Web Developer',$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])){
        
        #documentation (open)
        if(1==1){
            
            // Displays one or more warnings for developers.
            // Displays warnings to developers only.
            // Handles all warnings for developer.
            
        }
        #documentation (close)
        
        #input (open)
        if(1==1){
            
            $function_devwarnings['selection'] = 'all';// 'all', number. Obligatory. Which warning do you want to display?
            
        }
        #input (close)
        
        include('#function-developer-warnings.php');
        
        #output (open)
        if(1==1){
            
            echo $function_devwarnings['warnings']; // Warnings.
            
        }
        #output (close)
        
    }
    #function-developer-warnings.php (v1.0) (close)
    
    #function-assistant.php (v1.0) (open)
    if(1==1){
        
        #documentation (open)
        if(1==1){
            
            // Guides the user through the Voluno website.
            // Full size in homepage, extendable popup right side on content.
            
        }
        #documentation (close)
        
        // no input
        
        include('#function-assistant.php');
        
        #output (open)
        if(1==1){
            
            echo $function_assistant['content']; // Output. Either on the right side of the page or on the page itself, it is the homepage.
            
        }
        #output (close)
        
    }
    #function-assistant.php (v1.0) (close)

}
#load only once (close)

?>