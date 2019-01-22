<?php

#validation: does ngo exist? (open)
if(1==1){
	
	$ngo_id = $_GET['ngo'];
	
	$does_ngo_exist_query = $GLOBALS['wpdb']->prepare('
		SELECT *
		FROM fi4l3fg_voluno_development_organizations
		WHERE ngo_id = %d
			AND ngo_status = "";'
		,$ngo_id);
	$does_ngo_exist_row = $GLOBALS['wpdb']->get_row($does_ngo_exist_query);
	
	#function-redirect.php (v1.0) (open)
	if(empty($does_ngo_exist_row)){
		
		#documentation (open)
		if(1==1){
			
			// Redirects to another page. Prevents further loading of content.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_redirect['redirect_url'] = get_permalink(689); // url to redirect to. If none is given, homepage is used.
			
		}
		#input (close)
		
		include('#function-redirect.php');
		
		#no output
		
	}
	#function-redirect.php (v1.0) (close)
	
	$ngo_row = $does_ngo_exist_row;
	
}
#validation: does ngo exist? (close)
    
#jquery (open)
if(1==1){
	
	echo '
	<script>
		jQuery(document).ready(function(){';
			
			#update browser title (my profile -> name) (open)
			if(1==1){
				echo '
				jQuery(document).attr("title", "Voluno | '.$ngo_row->ngo_name.' (Forum)");';
			}
			#update browser title (my profile -> name) (close)
		
		echo '
		});
	</script>';
	
}
#jquery (close)

#content (open)
if(1==1){
	
	#function-personal-pages.php (v1.0) (open)
	if(1==1){
		$function_pers_pages_id = 5;
		$function_pers_pages_active_page = "Forum";
		include("#function-personal-pages.php");
		echo $function_pers_pages;
		#output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
	}
	#function-personal-pages.php (v1.0) (close)
	
	#title table (open)
	if(1==1){
		echo '
		<table>
			<tr>
				<td style="width:70%;padding-right:20px;">';
					
					#left side of container (open)
					if(1==1){
						
						#title (open)
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
												'text' => 'View all development organizations',
												'link' => get_permalink(689)
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
							
							echo
							$function_breadcrums['breadcrums'].'
							<div style="text-align:center;margin-bottom:30px;">
								<h1 style="display:inline;">
								'.$ngo_row->ngo_name.':
								</h1>
								<br>
								<h3 style="display:inline;">
								Forum threads
								</h3>
							</div>';
							
						}
						#title (close)
						
					}
					#left side of container (close)
					
				echo '
				</td>
				<td style="text-align:center;">';
					
					#right side of container (open)
					if(1==1){
					   
						#ngo logo (open)
						if(1==1){
							
							#function-image-processing
							   #ngo logo
								$function_propic__type = "ngo logo";
								$function_propic__ngo_id = $ngo_id;
							   #all
								 $function_propic__geometry = array(289,289); //optional, if e.g. only width: 300, NULL; vice versa
							   include('#function-image-processing.php');
							echo '
							<div class="profile_edit_hover voluno_header_picture" style="margin-bottom:20px;">
								<img class="ngo_logo voluno_brighter_on_hover" src="'.$function_propic.'"
								>
							</div>';
							
						}
						#ngo logo (close)
					   
					}
					#right side of container (close)
					
				echo '
				</td>
			</tr>
		</table>';
	}
	#title table (close)
	
	#forum page integration (open)
	if(1==1){
		
		include('members-net-forum.php');
		
	}
	#forum page integration (close)

}
#content (close)

?>