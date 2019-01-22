<?php

#files (general overview) (open)
if(1==1){
	
	#variable definitions + get file list (open)
	if(1==1){
		
		#staging
		$main_directory = 'staging/wp-content/';
		$current_directory = $main_directory.'wp-php-voluno/';
		$file_list_php_folder = array_values(array_diff(scandir($main_directory.'wp-php-voluno/'), array('.','..','error_log','wp-php-voluno')));
		$file_list_child_theme = array_values(array_diff(scandir($main_directory.'themes/tempera-child'), array('.','..','error_log','tempera-child')));
		$file_list_all_files = array_values(array_merge($file_list_php_folder,$file_list_child_theme));
		
		#production
		$main_directory_production = 'wp-content/';
		$current_directory_production = $main_directory_production.'wp-php-voluno/';
		$file_list_php_folder_production = array_values(array_diff(scandir($main_directory_production.'wp-php-voluno/'), array('.','..','error_log','wp-php-voluno')));
		$file_list_child_theme_production = array_values(array_diff(scandir($main_directory_production.'themes/tempera-child'), array('.','..','error_log','tempera-child')));
		$file_list_all_files_production = array_values(array_merge($file_list_php_folder_production,$file_list_child_theme_production));
		
		#remove non-php files from array (open)
		for($ait=0;$ait<count($file_list_all_files);$ait++){ #staging
			if(substr($file_list_all_files[$ait],strlen($file_list_all_files[$ait])-4,4) == ".php"){
				$file_list[] = $file_list_all_files[$ait];
			}
		}
		for($ait=0;$ait<count($file_list_all_files_production);$ait++){ #production
			if(substr($file_list_all_files_production[$ait],strlen($file_list_all_files_production[$ait])-4,4) == ".php"){
				$file_list_production[] = $file_list_all_files_production[$ait];
			}
		}
		#remove non-php files from array (open)
		
	}
	#variable definitions + get file list (close)
	
    #mysql (open)
    if(1==1){
		
		#query (open)
		if(1==1){
			$posts_query = $GLOBALS['wpdb']->prepare('
										SELECT *
										FROM 4df5ukbnn5p3t817_posts
										WHERE post_type = "code-file"
											AND post_status = "publish"
										ORDER BY post_title ASC;');
			$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
			
			$wiki_query = $GLOBALS['wpdb']->prepare('
										SELECT *
										FROM 4df5ukbnn5p3t817_posts
										WHERE post_type = "wiki-page"
											AND post_status = "publish"
										ORDER BY post_title ASC;');
			$wiki_results = $GLOBALS['wpdb']->get_results($wiki_query);
			
			for($aix=0;$aix<count($wiki_results);$aix++){
				if(substr($wiki_results[$aix]->post_title,0,strlen("PHP File: ")) == "PHP file: "){
					$wiki_results_array[] = substr($wiki_results[$aix]->post_title,strlen("PHP file: "));
					$wiki_results_id_array[] = $wiki_results[$aix]->ID;
				}
			}
		}
		#query (close)
		
    }
    #mysql (close)
    
	#content (open)
	if(1==1){
		
		#compare posts and files (open)
		if(1==1){
			
			#create array from query (open)
			for($afw=0;$afw<count($posts_results);$afw++){
				
				$posts_array[] = $posts_results[$afw]->post_title;
				$posts_array_post_ids[] = $posts_results[$afw]->ID;
				
			}
			#create array from query (close)
			
			#loop (open)
			for($afw=0;$afw<count($posts_array);$afw++){
				
				#posts + files (open)
				if(in_array($posts_array[$afw],$file_list)){
					$in_posts_and_in_files[] = $posts_array[$afw];
					$in_posts_and_in_files_post_ids[] = $posts_array_post_ids[$afw];
				}
				#posts + files (close)
				
				#posts only (open)
				else{
					$in_posts_only[] = $posts_array[$afw];
					$in_posts_only_post_ids[] = $posts_array_post_ids[$afw];
				}
				#posts only (close)
				
			}
			#loop (close)
			#$in_posts_and_in_files = array("a","b");
			
			for($afw=0;$afw<count($file_list);$afw++){
				if(!in_array($file_list[$afw],$in_posts_and_in_files)){
					$in_files_only[] = $file_list[$afw];
				}
			}
			
			#$in_files_only = array_values(array_diff($file_list,$in_posts_and_in_files));
			
			
			echo "<br>file list: ".count($file_list);
			echo "<br>files only: ".count($in_files_only);
			echo "<br>posts only: ".count($in_posts_only);
			echo "<br>post ids: ".count($in_posts_only_post_ids);
			echo "<br>in_posts_and_in_files: ".count($in_posts_and_in_files);
		}
		#compare posts and files (open)
		
		#not in database or no file (open)
		if(1==1){
			
			#page only (open)
			if(1==1){
				
				#trash old (open)
				for($aij=0;$aij<count($in_posts_only_post_ids);$aij++){
					wp_trash_post($in_posts_only_post_ids[$aij]);
					
					$update_activated = "yes";
					
				}
				#trash old (close)
				
			}
			#page only  (open)
			
			#file only (open)
			if(1==1){
				
				#
				for($aij=0;$aij<count($in_files_only);$aij++){
					
					#function-sanitize-text.php (v1.0) (open) #todolist: not used, but should be used, please use it. however, it needs to be modified first
					if(1==1){
						
						$function_sanitize_text__type = file_get_contents($current_directory.'/'.$in_files_only[$aij]); //obligatory
						/*
							one line unformatted text (city, name, occupation, etc.)
							url readable text (url, user_nicename, etc.) (sanitize_title)
							email address
							plain text with line breaks (biography)
							code (php files)
						*/
						$function_sanitize_text__text = "code (php files)";
						#$function_sanitize_text__reverse = ""; //only if you want to reverse the process. e.g. remove <br> to edit in form field
						include('#function-sanitize-text.php');
						#output: $function_sanitize_text__text_sanitized;
						
					}
					#function-sanitize-text.php (v1.0) (close)
					
					// Create post object
					$my_post = array(
						'post_title'    => $in_files_only[$aij],
						'post_content'  => htmlspecialchars(file_get_contents($current_directory.'/'.$in_files_only[$aij])),
						'post_status'   => 'publish',
						'post_author'   => get_current_user_id(),
						'post_type'     => 'code-file'
					);
					
					// Insert the post into the database
					wp_insert_post($my_post);
					$update_activated = "yes";
					
				}
				#
				
			}
			#file only  (open)
			
		}
		#not in database or no file (close)
		
		#file and page exist (open)
		if(1==1){
			echo '
			<h1>
				Comparison of Staging and Production Env.
			</h1>
			<table>';
				
				#headings (open)
				if(1==1){
					
					echo '
					<tr>
						<td style="width:50%">
							Staging
						</td>
						<td style="width:30%">
							In production?
						</td>
					</tr>
					';
					
				}
				#headings (close)
					
					#loop (open)
					for($aij=0;$aij<count($in_posts_and_in_files);$aij++){
						
						$new_content = stripslashes(sanitize_post(htmlspecialchars(file_get_contents($current_directory.'/'.$in_posts_and_in_files[$aij]))));
						$old_content = get_post_field('post_content',$in_posts_and_in_files_post_ids[$aij]);
						
						$content_production = stripslashes(sanitize_post(htmlspecialchars(file_get_contents($current_directory_production.'/'.$in_posts_and_in_files[$aij]))));
						
						if($new_content != $old_content){
							$update_activated = "yes";
							$my_post = array(
								'ID'           => $in_posts_and_in_files_post_ids[$aij],
								'post_content'  => htmlspecialchars(file_get_contents($current_directory.'/'.$in_posts_and_in_files[$aij]))
							);
							wp_update_post($my_post);
						}
						
						if(1==1){
							unset($file_exists_in_production);
							if($aij % 2 == 0){
								$bg_color = "#FFF5C4";
							}else{
								$bg_color = "#fff";
							}
							echo '
							<tr style="background-color:'.$bg_color.';border-top:1px dotted grey;">
								<td>
									<a href="'.get_permalink($in_posts_and_in_files_post_ids[$aij]).'">
										'.$in_posts_and_in_files[$aij].'
									</a>
								</td>
								<td>';
									if(in_array($in_posts_and_in_files[$aij],$file_list_production)){
										$file_exists_in_production = 1;
										if(in_array($in_posts_and_in_files[$aij],$wiki_results_array)){
											echo '
											<a
												href="'.
													get_permalink(
														$wiki_results_id_array[array_search($in_posts_and_in_files[$aij],
														$wiki_results_array)]
													).'"
											>
												Visit wiki page
											</a>';
										}else{
											echo '
											<span style="color:red;">
												File exists, wiki page doesn\'t.
											</span>';
										}
									}
								echo '
								</td>
								<td>';
									if($content_production != $new_content AND $file_exists_in_production == 1){
										echo '
										<span style="color:red;">
											Different content
										</span>';
									}
								echo '
								</td>
							</tr>';
						}
					}
					#loop (close)
					
					#function-redirect.php (v1.0) (open)
					if($update_activated == "yes"){
						
						#documentation (open)
						if(1==1){
							
							// Redirects to another page. Prevents further loading of content.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_redirect['redirect_url'] = get_permalink();; // url to redirect to. If none is given, homepage is used.
							
						}
						#input (close)
						
						include('#function-redirect.php');
						
						#no output
						
					}
					#function-redirect.php (v1.0) (close)
					
				echo '
				
			</table>';
		}
		#file and page exist (open)
		
	}
	#content (close)

}
#files (general overview) (close)


#posts list (open)
if(1==2){
	
	#jquery (open)
	if(1==1){
		
		
	}
	#jquery (close)
	
	#style (open)
	if(1==1){
		
		echo '
		<style>
	
		</style>';
		
	}
	#style (close)
	
	#mysql (open)
	if(1==1){
		
		$posts_query = $GLOBALS['wpdb']->prepare('
									SELECT * 
									FROM 4df5ukbnn5p3t817_posts
									WHERE post_status = "publish"
										AND post_type = "code-file"
									ORDER BY post_title ASC;');
		$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
		
	}
	#mysql (open)
	
	#content (open)
	if(1==1){
		
		echo '
		<h2>
			Code files
		</h2>
		<ol>';
		for($aij=0;$aij<count($posts_results);$aij++){
			
			#content (open)
				echo '
				<li>
					<a href="'.get_permalink($posts_results[$aij]->ID).'">
						'.$posts_results[$aij]->post_title.'
					</a>
				</li>';
			#content (close)
			
		}
		echo '
		</ol>';
	}
	#content (close)
	
}
#posts list (close)






?>