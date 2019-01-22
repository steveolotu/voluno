<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-background.php (v1.0) (open)
		if(1==1){
			
			##documentation (open)
			if(1==1){
				
				// Adds background images which use jQuery to adapt to the screen size.
				
			}
			##documentation (close)
			
			include('#function-background.php');
			
			#output (open)
			if(1==1){
				
				#echo $function_background['content']; // Echo this anywhere.
				
			}
			#output (close)
			
		}
		#function-background.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.09.19, Steve
		## Last format and structure check: 2016.09.19, Steve
		## Last update of all instances this function is used: 2016.09.19, Steve
		
		# Adds background images to the entire website.
		# There background image changes every day.
		# There are 15 images used.
		
		// A random number between 1 and 15 is selected. ///1
		// The random number is based on a base number, so it’s always the same if the base number is the same.
		// As base number, the day is selected. ///2
		// Thus, the number randomly changes each day.
		// Then, with this number, one of the images is loaded. ///3
		// It’s inserted into the page. ///4
		// jQuery makes the background image dynamically adjust to the sceen size without changing the ration. ///5
		
	}
	##file info (close)
	
}
#documentation (close)

#preparation (open)
if(1==1){
	
	mt_srand(ceil(time()/86400)); ///2
	
	$function_background['internal'][0] = mt_rand(1,15); ///1
	
	#function-image-processing.php (v1.0) (open)
	if(1==1){
		#thematic only
		$function_propic__type = "thematic";
		$function_propic__original_img_name = "background_website(".$function_background['internal'][0].").jpg"; ///3
		#$function_propic__cropping = "yes"; //yes or empty (default)
		#all
		$function_propic__geometry = array(500,NULL); //optional, if e.g. only width: 300, NULL; vice versa
		#$function_propic__rotate = 180; //optional, default: 0
		include('#function-image-processing.php');
		$function_background['internal']['image'] = $function_propic;
		#$function_propic__image_available <- is set to yes or no
	}
	#function-image-processing.php (v1.0) (close)
	
	list($function_background['internal'][1],$function_background['internal'][2]) = getimagesize($function_propic_abs);
	
}
#preparation (close)

#jquery (open)
if(1==1){ ///5
	
	echo '
	<script>
		jQuery(document).ready(function(){
			
			var voluno_function_background = '.($function_background['internal'][1]/$function_background['internal'][2]).';
			var voluno_function_background_r = jQuery(window).width()/jQuery(window).height();
			
			if(voluno_function_background > voluno_function_background_r){
				jQuery(".voluno_function_background").css("height","100%").css("width","").css("");
			}else{
				jQuery(".voluno_function_background").css("height","").css("width","100%");
			}
			
			jQuery(".voluno_function_background").show();
			
			jQuery(window).resize(function(){
				
				var voluno_function_background_r = jQuery(window).width()/jQuery(window).height();
				
				if(voluno_function_background > voluno_function_background_r){
					jQuery(".voluno_function_background").css("height","100%").css("width","").css("");
				}else{
					jQuery(".voluno_function_background").css("height","").css("width","100%");
				}
			});
			
		});
	</script>';
	
}
#jquery (close)

#content (open)
if(1==1){ ///4
	
	$function_background['output']['content'] .= '
	<img
		src="'.$function_background['internal']['image'].'"
		style="
			position:fixed;
			display:none;
			z-index:-10;
			left:0px;
			top:0px;
			max-width: 99999px !important;
		"
		class="voluno_function_background"
	>';
	
}
#content (close)

#output (open)
if(1==1){
	
	$function_background = $function_background['output'];
	
}
#output (close)

?>