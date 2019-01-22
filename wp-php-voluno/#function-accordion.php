<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-accordion.php (v1.1) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Classical accordion function. Hides text paragraphs and shows only headings,
				// which make the whole page structure very clear and allows the user what to read first.
				// By clicking on the different headings, the user can extend the text beneath it.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				// Add one entry for every section you want to use.
				
				# (open)
				if(1==1){
					
					$function_accordion['array'][] = [
						'title' => '',
						'content' => ''
					];				
					
				}
				# (close)
				
			}
			#input (close)
			
			include('#function-accordion.php');
			
			#output (open)
			if(1==1){
				
				#echo $function_accordion['content'];
				
			}
			#output (close)
			
		}
		#function-accordion.php (v1.1) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.09.19, Steve
		## Last format and structure check: 2016.09.19, Steve
		## Last update of all instances this function is used: 2016.09.19, Steve
		
		# Classical accordion function.
		# Hides text paragraphs and shows only headings, which make the whole page structure very clear and shows the user what to read first.
		# By clicking on the different headings, the user can extend the text beneath it.
		
		// The function uses the regular function components: input ///1 and output ///2
		// The main part is a loop iterating through the input array. ///3
		// There is simple styling. ///4
		// The folding is done via jQuery. ///5
		
	}
	##file info (close)
	
}
#documentation (close)

#input (open)
if(1==1){///1
	
	$function_accordion['internal'] = $function_accordion;
	
}
#input (close)

#jquery (open)
if(empty($GLOBALS['voluno_variables']['#function-accordion.php']['only_once'])){ ///5
	
	$function_accordion['output']['content'] = '
	<script>
		jQuery(document).ready(function(){
			
			var voluno_function_accordion_section_id_selection = "";
			
			jQuery(".voluno_function_accordion_section_title").click(function(){
				
				'.//If section is extended
				'if(jQuery(this).closest(".voluno_function_accordion_section_frame").find(".voluno_function_accordion_section_status").html() == "extended"){
					
					jQuery(".voluno_function_accordion_section_content").slideUp(500);
					jQuery(".voluno_function_accordion_section_status").html("hidden");
					voluno_function_accordion_section_id_selection = "";
					
				'.//If section is not extended
				'}else if(voluno_function_accordion_section_id_selection != jQuery(this).closest(".voluno_function_accordion_section_frame").find(".voluno_function_accordion_section_id").html()){
					
					jQuery(".voluno_function_accordion_section_content").slideUp(500);
					jQuery(".voluno_function_accordion_section_status").html("hidden");
					
					jQuery(this).closest(".voluno_function_accordion_section_frame").find(".voluno_function_accordion_section_content").slideToggle(500);
					jQuery(this).closest(".voluno_function_accordion_section_frame").find(".voluno_function_accordion_section_status").html("extended");
					voluno_function_accordion_section_id_selection = jQuery(this).closest(".voluno_function_accordion_section_frame").find(".voluno_function_accordion_section_id").html();
					
				}
				
			});
			
		});
	</script>';
	
}
#jquery (close)

#style (open)
if(empty($GLOBALS['voluno_variables']['#function-accordion.php']['only_once'])){ ///4
	
	echo '
	<style>
		.voluno_function_accordion_section_frame{
			border:1px solid black;
			border-radius:30px;
			background-color:#FFEAB9;
			overflow:hidden;
			margin-bottom:10px;
		}
		.voluno_function_accordion_section_title{
			background-color:#8B0000;
			font-size:25px;
			padding:15px;
		}
		.voluno_function_accordion_section_title a{
			cursor:pointer;
			color:#fff;
		}
		.voluno_function_accordion_section_content{
			padding:20px;
		}
		.voluno_function_accordion_section_content, .voluno_function_accordion_section_id, .voluno_function_accordion_section_status{
			display:none;
		}
	</style>';
	
}
#style (close)

#content (open)
for($aib=0;$aib<count($function_accordion['internal']['array']);$aib++){ ///3
	
	$function_accordion['output']['content'] .= '
	<div class="voluno_function_accordion_section_frame">
		
		<div class="voluno_function_accordion_section_title">
			<a>
				'.$function_accordion['internal']['array'][$aib]['title'].'
			</a>
			'.#<img src="'.$function_propic.'"> #for audio, currently deactivated
		'</div>
		<div class="voluno_function_accordion_section_content">
			'.$function_accordion['internal']['array'][$aib]['content'].'
		</div>
		
		<div class="voluno_function_accordion_section_id">'.
			mt_rand().
		'</div>
		<div class="voluno_function_accordion_section_status">'.
			'hidden'.
		'</div>
		
	</div>
	';
	
}
#content (close)

#output (open)
if(1==1){///2

	$GLOBALS['voluno_variables']['#function-accordion.php']['only_once'] = 'already loaded';
	
	$function_accordion = $function_accordion['output'];
	
}
#output (close)

?>