<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-redirect.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Redirects to another page. Prevents further loading of content.
				// This prevents hackers from stopping the redirect by disabling javascript.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_redirect['redirect_url'] = get_home_url();// url to redirect to. If none is given, homepage is used.
				
			}
			#input (close)
			
			include('#function-redirect.php');
			
			#no output
			
		}
		#function-redirect.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.12.23, Steve
		## Last format and structure check: 2016.12.23, Steve
		## Last update of all instances this function is used: 2016.12.23, Steve
		
		# Redirects to another page. Prevents further loading of content.
		# This prevents hackers from stopping the redirect by disabling javascript.
		
		// Self-explanatory
		// The file uses Javascript to redirect and then terminates all PHP execution.
		// Thus, if Javascript is deactivated, an error message is displayed but nothing else.
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_redirect['internal'] = $function_redirect;
	
}
#input + var definitions (close)

#execution (open)
if(1==1){
	
	#function-files.php (v1.0) (open)
	if(1==1){
		
		#documentation (open)
		if(1==1){
			
			// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_files['action'] = 'use'; // 'use', 'upload' or 'delete'.
			
			#use (open)
			if(1==1){
				
				$function_files['files_to_use_by_nicename'] = [
					'emptyforscript.png'
				];
				//nicenames of files to use. must be an array. only allowed for system images, to prevent name conflicts.
				
			}
			#use (close)
			
		}
		#input (close)
		
		include('#function-files.php');
		
		#output (open)
		if(1==1){
			
			#use (open)
			if(1==1){
				
				#$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'] #full url path
				
				// examples:
				// https://www.voluno.org/wp-content/voluno-files/usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
				// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
				// usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298
				
			}
			#use (close)
			
		}
		#output (close)
		
	}
	#function-files.php (v1.0) (close) 
	
	#no url given (open)
	if(empty($function_redirect['internal']['redirect_url'])){
		
		$function_redirect['internal']['redirect_url'] = get_home_url();
		
	}
	#no url given (close)
	
	echo '
	<style>
		body{
			display:none;
		}
	</style>
	
	<img
		src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
		style="display:none;"
		onload=
		\'
			window.location.replace("'.$function_redirect['internal']['redirect_url'].'");
		\'
	/>';
	
	exit("Please activate Javascript in your browser or switch to one which has Javascript activated.");
	
}
#execution (close)

?>