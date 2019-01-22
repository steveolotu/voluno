<?php

// This function is responsible for most a lot of things in the wiki (automated lists, tables, etc.).

#colors (open)
if(get_the_ID() == 1389){
	
	#function-table.php (v1.0) (open)
	if(1==1){
		
		#documentation (open)
		if(0!=0){
			/*
			
			
			
			*/
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			#documentation (open)
			if(0==1){
				//Each table requires two types of data
				//
				//- mysql data: Data which is stored in the database.
				// You can sort rows according to this data. The entries differ for each row.
				//  Example: "Store first name in column one."
				//
				//- design: What should happen to the data in each column? How should it be displayed?
				//  This data is different for each column, but identical for each row
				//  (unless you specify it otherwise with if conditions).
				//  Example: "Display the first name bold, add a line break and display the respective year of birth in
				//  brackets in the next line within the same row."
				//
				//- table options: There is a wide array of options for each table.
			}
			#documentation (close)
			
			#mysql data (open)
			if(1==1){
				
				#data preparation and creation (open)
				if(1==1){
					//To include data, you need to get data first.
					//If you want to get the data directly via a mysql query, simply do the query below.
					//Alternatively, you can just delete the query below and add your data preparation via php instead.
					
					$function_table['query'] = $GLOBALS['wpdb']->prepare('SELECT *
														FROM fi4l3fg_voluno_admin_info
														WHERE admin_info_type = "color";'
														);
					$function_table['results'] = $GLOBALS['wpdb']->get_results($function_table['query']);
					
					$dev_color_array = explode(";",$function_table['results'][$ajl]->admin_info_content);
					
				}
				#data preparation and creation (close)
				
				#inserting the data into the data array (open)
				for($ajl=0;$ajl<count($function_table['results']);$ajl++){
					// The above loop loops through each row of data. The loop below iterates though each column of data.
					// If you didn't use the default query, please modify the amount of rows in the above for loop.
					// In the following brackets, please add one row for each column that you want to add to the mysql table.
					// In the following example, user data is inserted (column names are imaginary, just to illustrate).
					
					#columns (open)
					if(1==1){
						
						$dev_color_array = explode(";",$function_table['results'][$ajl]->admin_info_content);###
						
						$function_table['data'][$ajl]['colors'] = $dev_color_array[0];
						$function_table['data'][$ajl]['comments'] = $dev_color_array[1];
						#$function_table['data'][$ajl]['email'] = $function_table['results'][$ajl]->user_email_address;
						#$function_table['data'][$ajl]['id'] = $function_table['results'][$ajl]->user_id;
						//to add new lines, just copy the above. Each line requires an individual column name (second bracket) and a value.
						
					}
					#column (close)
					
				}
				#inserting the data into the data array (close)
				
			}
			#mysql data (close)
			
			#table options (open)
			if(1==1){
				
				$function_table['unique id'] = "it_wiki_colors_flrngfndflg";// Everytime you use this function, please add a unique ID (only a-z and 0-9). For example, see https://passwordsgenerator.net/
				
				//Options connected to the title
				$function_table['display title'] = "Overview of all currently available trainings"; //the title of the table in h4, together with hide option. to hide title, leave empty.
				#$function_table['show on load'] = ""; //"yes" or empty (default). If there's no title, this is automatically set to yes, otherwise pointless.
				#$function_table['title format'] = array('<h1>','</h1>'); //default: array('<h4>','</h4>') <- opening and closing tags
				#$function_table['display number of results'] = 'no'; //"no" or empty (default). Displays the full amount of content rows in brackets behind the table title.
				
				#headings and sorting (open)
				if(1==1){
					
					#$function_table['hide column headings'] = "yes"; // "yes" or empty (default). Hides headings of table.
					$function_table['column headings'] 
					= array(
						// heading = The heading that will be displayed above the respective column.
						// width = Optional. With of the respective column.
						// sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
						//                  columns names given in the above double loop. See here: #$function_table['data'][]['THIS TEXT'], e.g. "user_id" or "user_email"
						array( //in almost all cases, the first column should be the row numbering.
							'heading'		 => '#',
							'width'			 => '5%'
						),
						array(
							'heading'		 => 'Colored area',
							'width'			 => '10%',
							'sorting option' => 'colors'
						),
						array(
							'heading'		 => 'Color Info',
							'width'			 => '30%',
							'sorting option' => 'colors'
						),
						array(
							'heading'		 => 'Comments',
							'width'			 => '30%',
							'sorting option' => 'comments'
						)
					);
					$function_table['default ordering']
					= array(
						'column' => 'colors', //OptionaYou can choose from any of the above "sorting option"s, if you added any.
						'direction' => 'ASC' //ASC or DESC
					);
					
				}
				#headings and sorting (close)
				
				//Pagination
				#$function_table['thin_pagination'] = "yes"; //default: no = empty
				
				//###
				#todolist: disabled. $function_table['number_of_all_results'] = 3; //if given, user is being asked to relax search restrictions if no results are found 
				
			}
			#table options (close)
			
		}
		#input (close)
		
		$function_table['part'] = 1;
		include("#function-table.php");
		
		#design (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// In this section, the actual core content of the table need to be created.
				// You only need to create one row, it will then be looped to fill the whole table.
				// Thus, by populating one cell, you automatically create the entire column.
				// Please use the template inside the following loop to created cells/columns.
				// You can add or delete as many columns as you want.
				// However, please don't change anything else.
				
			}
			#documentation (close)
			
			#Cells/Columns (open)
			for(
				$abs=$function_table['pagination_lower_limit'];
				$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));
				$abs++
			){ //Don't touch this. 
				$function_table['table rows'] .= $function_table['row open']; //Don't touch this. 
				
				//#1 template (open) <- column number, short description of column
				if(1==1){
					
					// Write the content here. To use the table data, use the variable:
					// $function_table['data'][$abs]['column name'] and replace "column name" with the name of the respective column, as entered above.
					// For example, "color" or "name".
					
				}
				//#1 template (close) <- column number, short description of column
				
				#1 counter (open)
				if(1==1){
					
					$function_table['table rows'] .= '
					<td>
						'.number_format(($abs+1),0,"."," ").'
					</td>
					';
					
				}
				#1 counter (close)
				
				#2 colored area (open)
				if(1==1){
					
					#
					if($abs == $function_table['pagination_lower_limit']){
						
						function hex2rgb($hex) {
						   $hex = str_replace("#", "", $hex);
						
						   if(strlen($hex) == 3) {
							  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
							  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
							  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
						   } else {
							  $r = hexdec(substr($hex,0,2));
							  $g = hexdec(substr($hex,2,2));
							  $b = hexdec(substr($hex,4,2));
						   }
						   $rgb = $r.','.$g.','.$b;
						   //return implode(",", $rgb); // returns the rgb values separated by commas
						   return $rgb; // returns an array with the rgb values
						}
						
					}
					#
					
					$function_table['table rows'] .= '
					<td
					style="
						border:solid 1px black;
						background-color:#'.$function_table['data'][$abs]['colors'].';
					"
					>
					</td>
					';
					
				}
				#2 colored area (close)
				
				#3 color name (open)
				if(1==1){
					
					$function_table['table rows'] .= '
					<td
						style="
							text-align:center;
						"
					>
						'.$function_table['data'][$abs]['colors'].'
						<br>
						'.hex2rgb($function_table['data'][$abs]['colors']).'
					</td>
					';
					
				}
				#3 color name (close)
				
				#4 explanation (open)
				if(1==1){
					
					#function-only-first-x-symbols.php (v1.0) (open)
					if(1==1){
						$function_only_first_x_symbols = str_replace(" ","&nbsp;",$function_table['data'][$abs]['comments']); #content
						$function_only_first_x_symbols_num = 200; #optional, number of symbols, default is 100
						#$function_only_first_x_symbols__more_button = "no"; //default: yes, empty
						include('#function-only-first-x-symbols.php');
						#output: $function_only_first_x_symbols
					}
					#function-only-first-x-symbols.php (v1.0) (close)
					
					$function_table['table rows'] .= '
					<td style="text-align:justify;">
						'.$function_only_first_x_symbols.'
					</td>
					';
				}
				#4 explanation (close)
				
				$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
			} //Don't touch this. 
			#Cells/Columns (close)
			
		}
		#design (close)
		
		$function_table['part'] = 2;
		include("#function-table.php");
		
		#output
		echo $function_table['output table'];
		
	}
	#function-table.php (v1.0) (close)
	
}
#colors (close)

#conceptual components list (open)
if(get_the_ID() == 966){
	
	#mysql (open)
	if(1==1){
		
		$conceptual_components_query = $GLOBALS['wpdb']->prepare('
													SELECT *
													FROM 4df5ukbnn5p3t817_term_relationships
														
														LEFT JOIN (
															SELECT * 
															FROM 4df5ukbnn5p3t817_posts
															WHERE post_type = "wiki-page"
														) AS posts
														ON object_id = ID 
														
													WHERE term_taxonomy_id = 408
													AND post_status = "publish"
													ORDER BY post_title ASC;');
		$conceptual_components_results = $GLOBALS['wpdb']->get_results($conceptual_components_query);
		
	}
	#mysql (open)
	
	#content (open)
	if(1==1){
		
		$subcomponents_of_core_services_array = array(
			"Advice",
			"Agency",
			"Internships",
			"Tasks",
			"Trainings"
		);
		
		echo '
		<ol>';
		for($aij=0;$aij<count($conceptual_components_results);$aij++){
			
			$short_name = substr($conceptual_components_results[$aij]->post_title,strlen("Conceptual component: "));
			
			#content (open)
			if(!in_array($short_name,$subcomponents_of_core_services_array)){
				echo '
				<li>
					<a href="'.get_permalink($conceptual_components_results[$aij]->ID).'">
						'.$short_name.'
					</a>';
				
				#services components (open)
				if($short_name == "Core Voluno Services"){
					echo '
					<ul>';
					for($aiu=0;$aiu<count($conceptual_components_results);$aiu++){
						$short_name = substr(
							$conceptual_components_results[$aiu]->post_title,
							strlen("Conceptual component: ")
						);
						if(in_array($short_name,$subcomponents_of_core_services_array)){
							echo '
							<li>
								<a href="'.get_permalink($conceptual_components_results[$aiu]->ID).'">
									'.$short_name.'
								</a>
							</li>';
						}
					}
					echo '
					</ul>';
				}
				#services components (close)
				
				echo '
				</li>';
			}
			#content (close)
			
		}
		echo '
		</ol>';
	}
	#content (close)
	
}
#conceptual components list (close)

#developer assignments (open)
if(get_the_id() == 4422){
	
	$revisions_query_text = '
	SELECT *
	FROM 4df5ukbnn5p3t817_posts
	WHERE post_parent = %d
	ORDER BY post_date DESC
	LIMIT 1';
	
	#Todolist entries which are not yet assignments - Part 1 (open)
	if(1==1){
		
		#mysql (open)
		if(1==1){
			
			$posts_query = $GLOBALS['wpdb']->prepare('
										SELECT * 
										FROM 4df5ukbnn5p3t817_posts
										WHERE post_type = "wiki-page"
											AND post_status = "publish"
										ORDER BY post_modified DESC;');
			$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
			
		}
		#mysql (close)
		
		#loop (open)
		for($aij=0;$aij<count($posts_results);$aij++){
			
			unset($id_position);
			
			#get all todolist entries in the page (open)
			for($aiy=0;$aiy<substr_count($posts_results[$aij]->post_content,'#todolist');$aiy++){
				
				$string_position = strpos($posts_results[$aij]->post_content,'#todolist',$id_position);
				$id_position = $string_position + strlen('#todolist: ');
				
				$hashtag_array[] = substr($posts_results[$aij]->post_content,$id_position,5);
				$post_id_array[] = $posts_results[$aij]->ID;
				
			}
			#get all todolist entries in the page (close)
			
		}
		#loop (close)
		
	}
	#Todolist entries which are not yet assignments - Part 1 (close)
	
	#assigned, unassigned, complete assignments (open)
	if(1==1){
		
		#mysql (open)
		if(1==1){
			
			#assigned (open)
			if(in_array($section,array('assigned_assignments',"todolist_entries_without_assignments"))){
				
				$assignments_query = $GLOBALS['wpdb']->prepare('
											SELECT *
											FROM 4df5ukbnn5p3t817_posts
												
												'./*is it an assignment? does it have the category "assignment?"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_assignment, term_taxonomy_id AS term_taxonomy_id_assignment
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_assignment
												) AS categories_assignment
												ON ID = object_id_assignment
												
												'./*is it assigned to someone? is any assigned category a "developer"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_developer, term_taxonomy_id AS term_taxonomy_id_developer
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_developer
													WHERE term_taxonomy_id <> 438
												) AS categories_developer
												ON ID = object_id_developer
												LEFT JOIN (
													SELECT taxonomy, term_id
													FROM 4df5ukbnn5p3t817_term_taxonomy
													WHERE taxonomy = "developer"
												) AS term_taxonomy
												ON term_taxonomy_id_developer = term_id
												LEFT JOIN (
													SELECT term_id AS term_id_terms, name AS name_terms
													FROM 4df5ukbnn5p3t817_terms
												) AS terms
												ON term_id = term_id_terms
												
											WHERE post_status = "publish"
											AND post_type = "wiki-page"
											
											AND term_taxonomy_id_assignment = 438 './*make sure that it is an assignment*/'
											AND term_taxonomy_id_assignment
											
											AND taxonomy = "developer" './*make sure it is assigned to a developer*/'
											
											ORDER BY post_title ASC;');
				$assignments_results = $GLOBALS['wpdb']->get_results($assignments_query);
				
			}
			#assigned (close)
			
			#unassigned (open)
			if(in_array($section,array('unassigned_assignments',"todolist_entries_without_assignments"))){
				
				$assignments_query = $GLOBALS['wpdb']->prepare('
											SELECT *
											FROM 4df5ukbnn5p3t817_posts
												
												'./*is it an assignment? does it have the category "assignment?"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_assignment, term_taxonomy_id AS term_taxonomy_id_assignment
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_assignment
												) AS categories_assignment
												ON ID = object_id_assignment
												
												'./*is it assigned to someone? is any assigned category a "developer"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_developer, term_taxonomy_id AS term_taxonomy_id_developer
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_developer
													WHERE term_taxonomy_id <> 438
												) AS categories_developer
												ON ID = object_id_developer
												LEFT JOIN (
													SELECT taxonomy, term_id
													FROM 4df5ukbnn5p3t817_term_taxonomy
													WHERE taxonomy = "developer"
												) AS term_taxonomy
												ON term_taxonomy_id_developer = term_id
												LEFT JOIN (
													SELECT term_id AS term_id_terms, name AS name_terms
													FROM 4df5ukbnn5p3t817_terms
												) AS terms
												ON term_id = term_id_terms
												
											WHERE post_status = "publish"
											AND post_type = "wiki-page"
											
											AND term_taxonomy_id_assignment = 438 './*make sure that it is an assignment*/'
											
											AND (taxonomy NOT IN ("developer") OR taxonomy is NULL) './*make sure it is not assigned to a developer*/'
											
											ORDER BY post_title ASC;');
				$assignments_results = $GLOBALS['wpdb']->get_results($assignments_query);
				
			}
			#unassigned (close)
			
			#completed (open)
			if(in_array($section,array('completed_assignments',"todolist_entries_without_assignments"))){
				
				$assignments_query = $GLOBALS['wpdb']->prepare('
											SELECT *
											FROM 4df5ukbnn5p3t817_posts
												
												'./*is it an assignment? does it have the category "assignment?"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_assignment, term_taxonomy_id AS term_taxonomy_id_assignment
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_assignment
												) AS categories_assignment
												ON ID = object_id_assignment
												
												'./*is it assigned to someone? is any assigned category a "developer"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_developer, term_taxonomy_id AS term_taxonomy_id_developer
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_developer
													WHERE term_taxonomy_id <> 438
												) AS categories_developer
												ON ID = object_id_developer
												LEFT JOIN (
													SELECT taxonomy, term_id
													FROM 4df5ukbnn5p3t817_term_taxonomy
													WHERE taxonomy = "developer"
												) AS term_taxonomy
												ON term_taxonomy_id_developer = term_id
												LEFT JOIN (
													SELECT term_id AS term_id_terms, name AS name_terms
													FROM 4df5ukbnn5p3t817_terms
												) AS terms
												ON term_id = term_id_terms
												
											WHERE post_status = "publish"
											AND post_type = "wiki-page"
											
											AND term_taxonomy_id_assignment = 438 './*make sure that it is an assignment*/'
											
											ORDER BY post_title ASC;');
				$assignments_results = $GLOBALS['wpdb']->get_results($assignments_query);
				
			}
			#completed (close)
			
		}
		#mysql (close)
		
		#content (open)
		if(1==1){
			
			#loop (open)
			for($aij=0;$aij<count($assignments_results);$aij++){
				
				#prepare (open)
				if(1==1){
					
					#function-sanitize-text.php (v1.0) (open)
					if(1==1){
						
						$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
						/*
							one line unformatted text (city, name, occupation, etc.)
							url readable text (url, user_nicename, etc.) (sanitize_title)
							email address
							plain text with line breaks (biography)
							code (php files)
						*/
						
						$function_sanitize_text__text = $assignments_results[$aij]->post_content;
						#$function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
						include('#function-sanitize-text.php');
						#output: $function_sanitize_text__text_sanitized;
						
					}
					#function-sanitize-text.php (v1.0) (close)
					
					#function-timezone.php (v1.0) (open)
					if(1==1){
						$function_timezone = $assignments_results[$aij]->post_modified;
						#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
						#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
						$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
						//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
						//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
						include('#function-timezone.php');
					}
					#function-timezone.php (v1.0) (close)
					
					#revisions (open)
					if(1==1){
						
						$revisions_query = $GLOBALS['wpdb']->prepare($revisions_query_text,$assignments_results[$aij]->ID);
						$revisions_results = $GLOBALS['wpdb']->get_results($revisions_query);
						
						#function-profile-link.php (v1.0) (open)
						if(1==1){
							
							#documentation (open)
							if(1==1){
								
								// Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
								// Provides complete link, link address, name, or link title.
								// Optionally displays image of user on hover of link.
								
							}
							#documentation (close)
							
							#input (open)
							if(1==1){
								
								$function_profileLink['id'] = 'usersext_id_'.$revisions_results[0]->post_author; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
								$function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
								
							}
							#input (close)
							
							include('#function-profile-link.php');
							
							#output (open)
							if(1==1){
								
								//output saved in:
								# $function_profileLink['link']
								# $function_profileLink['name_link']
								# $function_profileLink['name']
								# $function_profileLink['link_title']
								
								# $function_profileLink['status'] = 'deleted' or 'paused/suspended' or 'active'
								
							}
							#output (close)
							
						}
						#function-profile-link.php (v1.0) (close)
						
					}
					#revisions (close)
					
					$assignment_id = substr($assignments_results[$aij]->post_title,strlen("Developer assignment "),5);
					unset($hashtag_links);
					
					#todo links (open)
					if(1==1){
						for($aiz=0;$aiz<count($hashtag_array);$aiz++){
							if($hashtag_array[$aiz] == $assignment_id){
								
								$hashtag_links .= '
								<li>
									<a href="'.get_permalink($post_id_array[$aiz]).'">
										'.get_the_title($post_id_array[$aiz]).'
									</a>
								</li>';
							}
						}
						if(!empty($hashtag_links)){
							$hashtag_links = '
							<ul>
								'.$hashtag_links.'
							</ul>';
						}
					}
					#todo links (close)
					
					#additional information (open)
					if(1==1){
						
						$additional_information_query = $GLOBALS['wpdb']->prepare('
																		SELECT *
																		FROM 4df5ukbnn5p3t817_postmeta
																		WHERE post_id = %d;'
																		,$assignments_results[$aij]->ID
																	  );
						$additional_information_results = $GLOBALS['wpdb']->get_results($additional_information_query);
						
						unset($additional_information);
						
						$skill_array = array(
							2 => "basic skills (1 month)",
							3 => "moderate skills (6 months)",
							4 => "good skills (1 year)",
							6 => "expert skills (2 years+)"
						);
						
						for($aja=0;$aja<count($additional_information_results);$aja++){
							if(in_array($additional_information_results[$aja]->meta_key,array("wpcf-expected-time-required-to-complete-assignment","wpcf-priority","wpcf-overall-skill-level"))){
								
								if($additional_information_results[$aja]->meta_key == "wpcf-overall-skill-level"){
									$value_additional_info = $skill_array[$additional_information_results[$aja]->meta_value];
								}elseif($additional_information_results[$aja]->meta_key == "wpcf-expected-time-required-to-complete-assignment"){
									if($additional_information_results[$aja]->meta_value == 1){
										$value_additional_info = $additional_information_results[$aja]->meta_value." hour";
									}else{
										$value_additional_info = $additional_information_results[$aja]->meta_value." hours";
									}
								}else{
									$value_additional_info = $additional_information_results[$aja]->meta_value;
								}
								
								$additional_information[$additional_information_results[$aja]->meta_key] = $value_additional_info;
								
							}
						}
						
					}
					#additional information (close)
					
				}
				#prepare (close)
				
				#content (open)
				if($section != 'todolist_entries_without_assignments'){
					
					#filter completed from uncompleted (open)
					if(
							(
								in_array($section,array('assigned_assignments','unassigned_assignments'))
							AND 
								substr($assignments_results[$aij]->post_title,strlen($assignments_results[$aij]->post_title)-strlen("(completed)")) != "(completed)"
							)
						OR
							(
								in_array($section,array('completed_assignments'))
									AND 
								substr($assignments_results[$aij]->post_title,strlen($assignments_results[$aij]->post_title)-strlen("(completed)")) == "(completed)"
							)
					){
						
						#if "unassigned assignments", only show unassigned assingments (open)
						if(!($section == 'unassigned_assignments' AND !empty($assignments_results[$aij]->object_id_developer))){
							$content_assignments_temp = 
							'<div
								style="
									background-color:#FFD87D;
									border:1px solid grey;
									border-radius:10px;
									padding:10px;
									margin:5px;
									cursor:pointer;
								"
								class="assignment_container"
							>';
								
								$content_assignments_temp .= '
								<div style="float:right;padding-left:5px;margin-top:-10px;text-align:right;" class="assignment_info_short">
									<span style="color:green;">
										'.$additional_information["wpcf-expected-time-required-to-complete-assignment"].
									'</span>,
									<span style="color:darkred;">
										priority: '.$additional_information["wpcf-priority"].
									'</span>,
									<br>
									<span style="color:blue">
										'.$additional_information["wpcf-overall-skill-level"].'
									</span>
								</div>';
								
								$content_assignments_temp .= '
								<a style="font-weight:bold;" href="'.get_permalink($assignments_results[$aij]->ID).'" class="assignment_link">
									'.substr($assignments_results[$aij]->post_title,strlen("Developer assignment ")).'
								</a>';
								if($section != 'unassigned_assignments'){
									$content_assignments_temp .= '
									('.$assignments_results[$aij]->name_terms.')';
								}
								
								$content_assignments_temp .= '
								<div style="padding-left:10px;display:none" class="assignment_info_long">
									<table>
										<tr>
											<td style="width:33%">
												Edited '.$function_timezone.' by '.$function_profileLink['name_link'].'
												<br>
												<a href="'.get_edit_post_link($assignments_results[$aij]->ID).'">
													Edit
												</a>
											</td>
											<td style="width:33%">
												Linked to:
												<br>
												'.$hashtag_links.'
											</td>
										</tr>
									</table>
									<p>
									'.$function_sanitize_text__text_sanitized.'
									</p>
								</div>';
								
							$content_assignments_temp .= '
							</div>';
							$content_assignments[] = $content_assignments_temp;
							
							$sum_of_hour = $sum_of_hour+intval($additional_information["wpcf-expected-time-required-to-complete-assignment"]);
						}
						#if "unassigned assignments", only show unassigned assingments (close)
					}
					#filter completed from uncompleted (close)
					
				}else{
					$array_of_assignments[] = $assignment_id;
				}
				#content (close)
				
				$array_of_assignments_int[] = intval($assignment_id);
				
			}
			#loop (close)
			
			if($section != 'todolist_entries_without_assignments'){
				echo '
				Count: '.count($content_assignments).'
				<div class="voluno_button assignments_show_all">Extend all</div>
				<div class="voluno_button assignments_hide_all">Collapse all</div>
				<span class="553264875438"></span>,
				total expected duration: '.$sum_of_hour.' hours = '.round($sum_of_hour/8,1).' days = '.round(($sum_of_hour/8)/5,1).' weeks = '.round($sum_of_hour/8/30,1).' months
				'.implode($content_assignments);
				
				unset($sum_of_hour);
			}
			
		}
		#content (close)
		
		#jquery (open)
		if($section == 'todolist_entries_without_assignments'){
			
			echo '
			<script>
				jQuery(document).ready(function(){
					jQuery(".assignment_container").click(function(){
						jQuery(this).find(".assignment_info_long").slideToggle();
					});
					jQuery(".assignments_show_all").click(function(){
						jQuery(".assignment_info_long").slideDown();
					});
					jQuery(".assignments_hide_all").click(function(){
						jQuery(".assignment_info_long").slideUp();
					});
					jQuery(".553264875438").html("(next assignment id: '.(max($array_of_assignments_int)+1).')'.'");
				});
			</script>
			';
			
		}
		#jquery (close)
		
	}
	#assigned, unassigned, complete assignments (close)
	
	#Todolist entries which are not yet assignments - Part 2 (open)
	if($section == 'todolist_entries_without_assignments'){
		
		#content (open)
		if(1==1){
			
			#loop (open)
			for($aiy=0;$aiy<count($hashtag_array);$aiy++){
				if(!in_array($hashtag_array[$aiy],$array_of_assignments)){ //ensures that only non-matched todolist-entries are listed here
					$todolist_count++;
					$todolist[] =  
					'<div
						style="
							background-color:#FFD87D;
							border:1px solid grey;
							border-radius:10px;
							padding:10px;
							margin:5px;
						"
					>'.$hashtag_array[$aiy].'
						<a style="font-weight:bold;" href="'.get_permalink($post_id_array[$aiy]).'">
							'.get_the_title($post_id_array[$aiy]).'
						</a>
						(<a href="'.get_edit_post_link($post_id_array[$aiy]).'">'.
							'Edit'.
						'</a>)
					</div>';
				}
			}
			#loop (open)
			
			echo "Count: ".preg_replace("/[^0-9]/","",$todolist_count).implode($todolist);
		}
		#content (close)
		
	}
	#Todolist entries which are not yet assignments - Part 2 (close)
	
}
#developer assignments (close)

#files
if(1==1){
	
	#general overview lists (open)
	if(get_the_ID() == 1410){
		
		#variable definitions + get file list (open)
		if(1==1){
			
			$file_list_php_folder = array_values(array_diff(scandir('wp-content/wp-php-voluno/'), array('.','..','error_log','wp-php-voluno')));
			
			$file_list_child_theme = array_values(array_diff(scandir('wp-content/themes/tempera-child'), array('.','..','error_log','tempera-child')));
			
			$file_list_all_files = array_values(array_merge($file_list_php_folder,$file_list_child_theme));
			
			unset($file_list);
			
			#remove non-php files from array (open)
			for($ait=0;$ait<count($file_list_all_files);$ait++){
				if(substr($file_list_all_files[$ait],strlen($file_list_all_files[$ait])-4,4) == ".php"){
					$file_list[] = $file_list_all_files[$ait];
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
											FROM 4df5ukbnn5p3t817_term_relationships
												
												LEFT JOIN (
													SELECT * 
													FROM 4df5ukbnn5p3t817_posts
													WHERE post_type = "wiki-page"
												) AS posts
												ON object_id = ID 
												
											WHERE term_taxonomy_id = 410
												AND post_status = "publish"
											ORDER BY post_title ASC;');
				$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
			}
			#query (close)
			
		}
		#mysql (close)
		
		#jquery (open)
		if(1==1){
			
			echo '
			<script>
				jQuery(document).ready(function(){
					
					jQuery(".voluno_manual_link").click(function(){
						jQuery(this).closest("td").find(".voluno_manual").toggle(150);
					});
					
				});
			</script>';
			
		}
		#jquery (close)
		
		#content (open)
		if(1==1){
			
			#prepare (open)
			if(1==1){
				
				#compare posts and files (open)
				if(1==1){
					
					#create array from query (open)
					for($afw=0;$afw<count($posts_results);$afw++){
						
						$posts_array[] = substr($posts_results[$afw]->post_title,strlen("PHP file: "));
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
					
					$in_files_only = array_values(array_diff($file_list,$in_posts_and_in_files));
					
				}
				#compare posts and files (open)
				
				#function-table.php (v1.0) (open)
				if(1==1){
					
					#Documentation (open)
					if(0!=0){
						
						// This function creates automatically formatted and sortable tables with pagination features and various other options.
						
						// Each table requires three types of data:
						//
						// - Raw data: Each row and each column requires data. Basically, you need to enter an arry for each column.
						//   You can then easily access this data across the entire table and do something with it.
						//   You can also sort rows according to this data.
						//
						// - Table options: There is a wide array of options for each table.
						//
						// - Table design: Finally, you What should happen to the data in each column? How should it be displayed?
						//   This data is different for each column, but identical for each row
						//   (unless you specify it otherwise with if conditions).
						//
						// Example:
						//   Raw data: You can store the first name in column one. The column can be sorted according to the first name.
						//   Table design: You can display the first name bold, add a line break and display the respective year of birth in
						//   brackets in the next line within the same row.
						
						// Note: For technical reasons, this function has two different input areas and two execution areas. Please make sure not to change
						// important elements, especially those maked with the comment: ' //Don't touch this. ' ;-)
						
					}
					#Documentation (close)
					
					#Input: Raw data + Table options (open)
					if(1==1){
						
						#Raw data (open)
						if(1==1){
							
							#data preparation and creation (open)
							if(1==1){
								
								// To include data, you need to get raw data first. You can do that here by modifying the query below.
								// Alternatively, you can get the raw data in any other way in here. Just do whatever you want in this bracket.
								// If you prefer getting and preparing the raw data outside of this Voluno function, you can also just delete this
								// entire bracket altogether.
								
								$file_types = [
									'prefixes' => [
										"#function-",
										"website-",
										"developer-page-",
										"staff-net-",
										"members-net-"
									],
									'names' => [
										'1,Voluno functions',
										'2,Website page files',
										'2,Developer page files',
										'2,Staff net files',
										'2,Members net files'
									]
								];
								
							}
							#data preparation and creation (close)
							
							#inserting the data into the data array (open)
							for($ajl=0;$ajl<count($in_posts_and_in_files);$ajl++){ // <- Please modify the total amount of rows to include in your table.
								
								// This loop iterates through each row of data.
								// If you didn't use the default query, please modify the amount of rows in the above loop.
								
								// In the following brackets, please add one line for each column that you want to add to the mysql table.
								// In the following example, user data is inserted (column names are imaginary, just to illustrate).
								
								#find out file type (open)
								if(1==1){
									
									unset($file_type);
									
									#loop prefixes (open)
									for($aij=0;$aij<count($file_types['prefixes']);$aij++){
										//check if file has a prefix
										
										$file_type_test = $file_types['prefixes'][$aij];
										
										if(substr($in_posts_and_in_files[$ajl],0,strlen($file_type_test)) == $file_type_test){
											
											$file_type = $file_types['names'][$aij];
											
										}
										
									}
									#loop prefixes (close)
									
									#is it a child theme file? (open)
									if(in_array($in_posts_and_in_files[$ajl],$file_list_child_theme)){
										
										$file_type = '3,Child theme files';
										
									}
									#is it a child theme file? (close)
									
									#other (open)
									if(empty($file_type)){
										
										$file_type = "4,Other";
										
									}
									#other (close)
									
									$file_type = explode(',',$file_type);
									
								}
								#find out file type (close)
								
								#file content (open)
								if(1==1){
									
									#variable definitions (open)
									if(1==1){
										
										$current_directory = 'wp-content/wp-php-voluno/';
										$filename = $in_posts_and_in_files[$ajl];
										$filename_full = $current_directory.$filename;
										
										#regular php folder or child-theme folder? (open)
										if(!file_exists($filename_full)){
											
											$current_directory = 'wp-content/themes/tempera-child/';
											$filename_full = $current_directory.$filename;
											
										}
										#regular php folder or child-theme folder? (close)
										
									}
									#variable definitions (close)
									
									#function-sanitize-text.php (v1.0) (open)
									if(1==1){
										
										$function_sanitize_text__type = "code (php files with whitespaces)"; //obligatory
										/*
										one line unformatted text (city, name, occupation, etc.)
										url readable text (url, user_nicename, etc.) (sanitize_title)
										email address
										plain text with line breaks (biography)
										*/
										$function_sanitize_text__text = file_get_contents($filename_full);
										include('#function-sanitize-text.php');
										#output: $function_sanitize_text__text_sanitized;
										
										$file_content_array = explode("<br>",$function_sanitize_text__text_sanitized);
										
									}
									#function-sanitize-text.php (v1.0) (close)
									
									#function-sanitize-text.php (v1.0) (open)
									if(1==1){
										
										$function_sanitize_text__type = "code (php files)"; //obligatory
										/*
										one line unformatted text (city, name, occupation, etc.)
										url readable text (url, user_nicename, etc.) (sanitize_title)
										email address
										plain text with line breaks (biography)
										*/
										$function_sanitize_text__text = file_get_contents($filename_full);
										include('#function-sanitize-text.php');
										#output: $function_sanitize_text__text_sanitized;
										
										$file_content_array_without_whitespaces = explode("<br>",$function_sanitize_text__text_sanitized);
										
									}
									#function-sanitize-text.php (v1.0) (close)
									
									unset($last_complete_developer_check,$manual,$file_info_for_table);
									
									#find file info (open)
									for($akd=0;$akd<count($file_content_array);$akd++){
										
										$array_of_special_lines = [
											0 => '#'.'# Last documentation check: ',
											1 => '#'.'# Last format and structure check: ',
											2 => '#'.'# Last update of all instances this function is used: ',
											'manual open' => '#'.'#manual (open)',
											'manual close' => '#'.'#manual (close)'
										];
										
										#finding the specific line (open)
										for($ake=0;$ake<4;$ake++){
											
											#finding the specific line (open)
											if(strpos($file_content_array[$akd],$array_of_special_lines[$ake])){
												
												$file_info_for_table[$ake] = substr(trim($file_content_array_without_whitespaces[$akd]),strlen($array_of_special_lines[$ake]));
												
											}
											#finding the specific line (close)
											
										}
										#file info loop (close)
										
										#manual (open)
										if(1==1){
											
											#get documentation content (open)
											if(1==1){
												
												#start (open)
												if(strpos($file_content_array[$akd-3],$array_of_special_lines['manual open'])){
													
													$manual['start'] = $akd;
													
												}
												#start (close)
												
												#content (open)
												if(!empty($manual['start']) AND empty($manual['end'])){
													
													$manual['content'][] = substr($file_content_array[$akd],strlen('&nbsp;')*8+1);
													
												}
												#content (close)
												
												#end (open)
												if(strpos($file_content_array[$akd+3],$array_of_special_lines['manual close'])){
													
													$manual['end'] = $akd;
													
												}
												#end (close)
												
											}
											#get documentation content (close)
											
											
										}
										#manual (close)
										
									}
									#find file info (close)
									
								}
								#file content (close)
								
								#columns (open)
								if(1==1){
									
									$function_table['data'][$ajl]['post_id'] = $in_posts_and_in_files_post_ids[$ajl];
									$function_table['data'][$ajl]['file name'] = $in_posts_and_in_files[$ajl];
									$function_table['data'][$ajl]['file type'] = $file_type[1];
									$function_table['data'][$ajl]['file type order'] = $file_type[0].$in_posts_and_in_files[$ajl];
									
									$function_table['data'][$ajl]['last modified'] = filemtime($filename_full);
									$function_table['data'][$ajl]['manual'] = implode('<br>',$manual['content']);
									
									$table_input = $file_info_for_table[0];
									#check if value is empty (open)
									if(!empty($table_input)){
										$function_table['data'][$ajl]['file_info last_documentation'] = $table_input;
										$function_table['data'][$ajl]['file_info last_documentation order'] = strtotime(
																												str_replace('.','-',
																													substr($table_input,0,strlen('0000.00.00'))
																												).' 00:00:00'
																											);
									}
									#check if value is empty (close)
									
									$table_input = $file_info_for_table[1];
									#check if value is empty (open)
									if(!empty($table_input)){
										$function_table['data'][$ajl]['file_info format_structure'] = $table_input;
										$function_table['data'][$ajl]['file_info format_structure order'] = strtotime(
																												str_replace('.','-',
																													substr($table_input,0,strlen('0000.00.00'))
																												).' 00:00:00'
																											);
									}
									#check if value is empty (close)
									
									$table_input = $file_info_for_table[2];
									#check if value is empty (open)
									if(!empty($table_input)){
										$function_table['data'][$ajl]['file_info version_update'] = $table_input;
										$function_table['data'][$ajl]['file_info version_update order'] = strtotime(
																												str_replace('.','-',
																													substr($table_input,0,strlen('0000.00.00'))
																												).' 00:00:00'
																											);
									}
									#check if value is empty (close)
									
									unset($file_info_for_table,$table_input);
									
									// To add new lines, just copy the above. Each line requires an individual column name (last bracket) and a value.
									
									// Keep the column names in mind, these will be used later on a lot.
									
								}
								#columns (close)
								
							}
							#inserting the data into the data array (close)
							
						}
						#Raw data (close)
						
						#Table options (open)
						if(1==1){
							
							$function_table['unique id'] = 'function_wiki_file_list_feibfgiebigbefwigas';
							// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
							
							#Options connected to the title (open)
							if(1==1){
								
								$function_table['display title'] = 'List of PHP files';
								// The title of the table which is displayed above the table. To hide title, leave empty.
								
								#$function_table['show on load'] = 'no';
								// 'no' or 'yes' (default). If there's no title, this is automatically set to yes, since there is nothing to show.
								
								#$function_table['title format'] = array('<h1>','</h1>');
								// Opening and closing css tags for the title. Default: array('<h4>','</h4>')
								
								#$function_table['display number of results'] = 'no';
								// Displays the full amount of content rows in brackets behind the table title. 'no' or empty (default).
								
							}
							#Options connected to the title (close)
							
							#Headings and sorting (open)
							if(1==1){
								
								#$function_table['hide column headings'] = 'yes';
								// Hides headings of table. 'yes' or empty (default).
								
								// The following multi-dimensional array has the following structure:
								// - heading = The heading that will be displayed above the respective column.
								// - width = Optional. With of the respective column. You can either use % or pt.
								// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
								//                    columns names that you used in the 'Raw data' section.
								//                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were 'email' and 'id'.
								$function_table['column headings'] 
								= array(
									array( // In almost all cases, the first column should be the row numbering. If you want to keep it, just leave it as it is.
										'heading'		 => '#', // See 1 row above.
										'width'			 => '4%' // See 2 rows above.
									),
									array(
										'heading'		 => 'Type',
										'width'			 => '15%',
										'sorting option' => 'file type'
									),
									array(
										'heading'		 => 'File name',
										'width'			 => '32%',
										'sorting option' => 'file name'
									),
									array(
										'heading'		 => 'Documentation',
										'width'			 => '14%',
										'sorting option' => 'file_info last_documentation order'
									),
									array(
										'heading'		 => 'Structural check',
										'width'			 => '14%',
										'sorting option' => 'file_info format_structure order'
									),
									array(
										'heading'		 => 'Version check',
										'width'			 => '14%',
										'sorting option' => 'file_info version_update order'
									),
									array(
										'heading'		 => 'Last modified',
										'width'			 => '14%',
										'sorting option' => 'last modified'
									)
								);
								
								//Optionally, you can choose one of the above columns to be the default sorting option.
								// If you don't want this, please delete or hide the entire array.
								$function_table['default ordering']
								= array(
									'column' => 'file type order', // Colum name. In the example, 'email' or 'id'.
									'direction' => 'ASC' // ASC or DESC
								);
								
							}
							#Headings and sorting (close)
							
							#Pagination (open)
							if(1==1){
								
								// If the table doesn't have a lot of space, you can make the pagination 'thin'. Then, the 'first page', 'previous page', 'items per page',
								// 'next page' and 'last page' buttons will aligned vertically, instead of horizontally -> they will be slimmer.
								#$function_table['thin_pagination'] = 'yes'; // 'yes' or 'no' (default)
							}
							#Pagination (close)
							
							#Display a message if no data available (open)
							if(1==1){
								
								// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
								// Here, you can modify this message.
								
								#$function_table['no_items_available_message'] = array(
								#    'lines' => 'no' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
								#    ,'content' => 'none' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
								#);
								
							}
							#Display a message if no data available (close)
							
						}
						#Table options (close)
						
					}
					#Input: Raw data + Table options (close)
					
					$function_table['part'] = 1; //Don't touch this. 
					include('#function-table.php'); //Don't touch this. 
					
					#design (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// In this section, the actual content of the table needs to be created.
							// You already created the raw data, now you need to decide what to do with it / how to display it.
							
							// You only need to create one row, it will then be looped to fill the whole table.
							// Thus, by populating one cell, you automatically create the entire respective column.
							
							// Please use the template inside the following loop to created cells/columns.
							// You can add or delete as many columns as you want. However, the amount of cells you add should match
							// the amount of column headings you added in 'Table options'.
							// Please be sure not to change anything else.
							
						}
						#documentation (close)
						
						#Cells/Columns (open)
						for($abs=$function_table['pagination_lower_limit'];$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));$abs++){ //Don't touch this.
							$function_table['table rows'] .= $function_table['row open']; //Don't touch this.
							
							//#1 template (open) <- column number, short description of column
							if(1==1){ //Don't touch this.
								
								// Write the content here. To use the table data, use the variable:
								// $function_table['data'][$abs]['column name'] and replace 'column name' with the name of the respective column, as entered in the section 'raw data'.
								// In the given example, the column names were 'email' or 'id'.
								
							}
							//#1 template (close) <- column number (add +1 for each new column you add), short description of column
							
							#1 counter (open)
							if(1==1){
								
								// If you want to use a row counter, please don't touch this cell as it is.
								
								$function_table['table rows'] .= '
								<td>
									'.number_format(($abs+1),0,'.',' ').'
								</td>
								';
								
							}
							#1 counter (close)
							
							#2 file type (open)
							if(1==1){
								
								$function_table['table rows'] .= '
								<td style="text-align:left;">
									'.$function_table['data'][$abs]['file type'].'
								</td>
								';
								
							}
							#2 file type (close)
							
							#3 name (open)
							if(1==1){
								
								$function_table['table rows'] .= '
								<td style="text-align:left;">
									'.$function_table['data'][$abs]['file name'].'
									<a href="'.get_permalink($function_table['data'][$abs]['post_id']).'">
										(link)
									</a>';
									
									#manual (open)
									if(!empty($function_table['data'][$abs]['manual'])){
										
										$function_table['table rows'] .= '
										<a class="voluno_manual_link">
										(manual)
										</a>
										<div
											class="voluno_manual"
											style="
												position:absolute;
												background-color:#fff;
												border:1px solid black;
												padding:10px;
												border-radius:10px;
												width:50%;
												left:25%;
												display:none;
												font-size:70%;
											"
										>
											'.$function_table['data'][$abs]['manual'].'
										</div>';
										
									}
									#manual (close)
									
								$function_table['table rows'] .= '
								</td>
								';
								
							}
							#3 name (close)
							
							#4 Documentation (open)
							if(1==1){
								
								$var_name = 'file_info last_documentation';
								
								$var = $function_table['data'][$abs][$var_name];
								
								$var = explode(', ',$var);
								
								#function-timezone.php (v1.0) (open)
								if(1==1){
									
									$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs][$var_name.' order']);
									#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
									#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									
									$date = $function_timezone;
									
								}
								#function-timezone.php (v1.0) (close)
								
								$function_table['table rows'] .= '
								<td>';
									
									#show content only if there is something to show (open)
									if(!empty($function_table['data'][$abs][$var_name])){
										
										$function_table['table rows'] .= '
										'.$date.'
										<div style="color:grey;">
											'.$var[1].'
										</div>';
										
									}
									#show content only if there is something to show (close)
									
								$function_table['table rows'] .= '
								</td>
								';
								
							}
							#4 Documentation (close)
							
							#5 Structural check (open)
							if(1==1){
								
								$var_name = 'file_info format_structure';
								
								$var = $function_table['data'][$abs][$var_name];
								
								$var = explode(', ',$var);
								
								#function-timezone.php (v1.0) (open)
								if(1==1){
									
									$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs][$var_name.' order']);
									#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
									#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									
									$date = $function_timezone;
									
								}
								#function-timezone.php (v1.0) (close)
								
								$function_table['table rows'] .= '
								<td>';
									
									#show content only if there is something to show (open)
									if(!empty($function_table['data'][$abs][$var_name])){
										
										$function_table['table rows'] .= '
										'.$date.'
										<div style="color:grey;">
											'.$var[1].'
										</div>';
										
									}
									#show content only if there is something to show (close)
									
								$function_table['table rows'] .= '
								</td>
								';
								
							}
							#5 Structural check (close)
							
							#6 Version check (open)
							if(1==1){
								
								$var_name = 'file_info version_update';
								
								$var = $function_table['data'][$abs][$var_name];
								
								$var = explode(', ',$var);
								
								#function-timezone.php (v1.0) (open)
								if(1==1){
									
									$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs][$var_name.' order']);
									#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
									#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									
									$date = $function_timezone;
									
								}
								#function-timezone.php (v1.0) (close)
								
								$function_table['table rows'] .= '
								<td>';
									
									#show content only if there is something to show (open)
									if(!empty($function_table['data'][$abs][$var_name])){
										
										$function_table['table rows'] .= '
										'.$date.'
										<div style="color:grey;">
											'.$var[1].'
										</div>';
										
									}
									#show content only if there is something to show (close)
									
								$function_table['table rows'] .= '
								</td>
								';
								
							}
							#6 Version check (close)
							
							#7 last modified (open)
							if(1==1){
								
								#function-timezone.php (v1.0) (open)
								if(1==1){
									$function_timezone = date("Y-m-d H:i:s",$function_table['data'][$abs]['last modified']);
									#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
									#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
								}
								#function-timezone.php (v1.0) (close)
								
								$function_table['table rows'] .= '
								<td>
									'.$function_timezone.'
								</td>
								';
								
							}
							#7 last modified (close)
							
							$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
						} //Don't touch this. 
						#Cells/Columns (close)
						
					}
					#design (close)
					
					$function_table['part'] = 2; //Don't touch this. 
					include('#function-table.php'); //Don't touch this. 
					
					#output
					//the entire output is stored in the following variable:
					#echo $function_table['output table'];
					
				}
				#function-table.php (v1.0) (close)
				
			}
			#prepare (close)
			
			#file and page exist (open)
			if(1==1){
				
				echo $function_table['output table'];
				
			}
			#file and page exist (open)
			
		}
		#content (close)
		
	}
	#general overview lists (close)
	
	#automated information for individual files (open)
	if(strpos(get_the_title(),"PHP file: ") !== false){
		
		#variable definitions (open)
		if(1==1){
			
			$filename = substr(get_the_title(),strlen("PHP file: "));
			
			$current_directory = 'wp-content/wp-php-voluno/';
			$file_list = array_values(array_diff(scandir($current_directory), array('.','..','error_log','wp-php-voluno',$filename)));
			$filename_full = $current_directory.$filename;
			
			#regular php folder or child-theme folder? (open)
			if(!file_exists($filename_full)){
				$current_directory = 'wp-content/themes/tempera-child/';
				$file_list = array_values(array_diff(scandir($current_directory), array('.','..','error_log','tempera-child',$filename)));
				$filename_full = $current_directory.$filename;
			}
			#regular php folder or child-theme folder? (close)
			
		}
		#variable definitions (close)
		
		#mysql (open)
		if(1==1){
			
			$all_pages_query = $GLOBALS['wpdb']->prepare('SELECT *
												FROM 4df5ukbnn5p3t817_posts
												WHERE post_status = "publish"
													AND post_type IN ("post","page","members-net-page","staff-net-page","website-page","developer-page","wiki-page")
												;');
			$all_pages_results = $GLOBALS['wpdb']->get_results($all_pages_query);
			
		}
		#mysql (close)
		
		#style (open)
		if(1==1){
			
			echo '
			<style>
				.content_div{
					padding:20px;
					background-color:#FFEAB9;
					text-align:center;
					border-radius:20px;
					margin:20px 0px;
				}
				.content_div_title{
					cursor:pointer;
				}
				.content_div_content{
					display:none;
				}
			</style>';
			
		}
		#style (close)
		
		#jQuery (open)
		if(1==1){
			
			echo '
			<script>
				jQuery(document).ready(function(){
				
				jQuery(".content_div_title").click(function(){
					jQuery(this).closest(".content_div").find(".content_div_content").toggle();
				});
				
				});
			</script>';
			
		}
		#jQuery (close)
		
		#content (open)
		if(1==1){
			
			#summary + detailed documentation + update info (open)
			if(1==1){
				
				#preparation (open)
				if(1==1){
					
					#function-sanitize-text.php (v1.0) (open)
					if(1==1){
						
						$function_sanitize_text__type = "code (php files)"; //obligatory
						
						#one line unformatted text (city, name, occupation, etc.)
						#url readable text (url, user_nicename, etc.) (sanitize_title)
						#email address
						#plain text with line breaks (biography)
						
						$function_sanitize_text__text = file_get_contents($filename_full);
						include('#function-sanitize-text.php');
						#output: $function_sanitize_text__text_sanitized;
						
						$file_content_array1 = str_replace(array("\r\n","\r","\n"),"",$function_sanitize_text__text_sanitized);
						$file_content_array = explode("<br>",$file_content_array1);
						
					}
					#function-sanitize-text.php (v1.0) (close)
					
					#get largest documentation number (open)
					if(1==1){
						
						$array_of_file_contents = explode(" ",file_get_contents($filename_full));
						
						#loop through all lines of code of the file (open)
						for($ajs=0;$ajs<count($array_of_file_contents);$ajs++){
							
							$comment_initiation_string = "///";
							
							#find documentation numbers (open)
							if(substr($array_of_file_contents[$ajs],0,strlen($comment_initiation_string)) == $comment_initiation_string){
								
								$array_of_documentation_numbers[] = intval(substr($array_of_file_contents[$ajs],strlen($comment_initiation_string)));
								
							}
							#find documentation numbers (close)
							
						}
						#loop through all lines of code of the file (close)
						
						$largest_documentation_number = 'The next documentation number should be: ///'.(max($array_of_documentation_numbers)+1);
						
					}
					#get largest documentation number (open)
					
				}
				#preparation (close)
				
				#content (open)
				if(1==1){
					
					#loop (open)
					for($afw=0;$afw<count($file_content_array);$afw++){
						
						#keep whitespaces (open)
						if(1==1){
							
							$row['replace space and tabs, no #']
							= str_replace(
								"#",
								"",
								str_replace(
									" ",
									"&nbsp;",
									str_replace(
										"\t",
										'&nbsp;&nbsp;&nbsp;&nbsp;',
										$file_content_array[$afw]
									)
								)
							);
							$row['original']
							= $file_content_array[$afw];
							
						}
						#keep whitespaces (close)
						
						#get description (open)
						if(1==1){
							
							#start (open)
							if(strpos($file_content_array[$afw-3],'##file info (open)')){
								
								$description['start'] = $afw;
								
							}
							#start (close)
							
							#update info (open)
							if(
								!empty($description['start']) AND empty($description['end'])
								AND
								substr(trim($file_content_array[$afw]),0,3) == '## '
							){
								
								$description['update_info'][] = '<li>'.substr(trim($file_content_array[$afw]),2).'</li>';
								
							}
							#update info (close)
							
							#summary (open)
							if(
								!empty($description['start']) AND empty($description['end'])
								AND
								substr(trim($file_content_array[$afw]),0,2) == '# '
							){
								
								$description['summary'][] = '<p>'.substr(trim($file_content_array[$afw]),2).'</p>';
								
							}
							#summary (close)
							
							#detailed documentation (open)
							if(
								!empty($description['start']) AND empty($description['end'])
								AND
								substr(trim($file_content_array[$afw]),0,3) == '// '
							){
								
								$description['detailed_documentation'][] = '<li>'.substr(trim($file_content_array[$afw]),2).'</li>';
								
							}
							#detailed documentation (close)
							
							#end (open)
							if(strpos($file_content_array[$afw+3],'##file info (close)')){
								
								$description['end'] = $afw;
								
							}
							#end (close)
							
						}
						#get description (close)
						
					}
					#loop (close)
					
					#prepare data for output (open)
					if(1==1){
						
						$description['update_info'] = '
						<div class="content_div">
							<h4 style="display:inline;">
							<a class="content_div_title">
								Update info
							</a>
							</h4>
							<div class="content_div_content">
								<ul>
									'.implode($description['update_info']).'
								</ul>
							</div>
						</div>
						';
						
						$description['summary'] = 
						implode($description['summary']);
						
						$description['detailed_documentation'] = '
						<div class="content_div">
							<h4 style="display:inline;">
							<a class="content_div_title">
								Detailed documentation
							</a>
							</h4>
							<div class="content_div_content">
								<ul>
									'.$largest_documentation_number.'
									<br>
									<br>
									'.implode($description['detailed_documentation']).'
								</ul>
							</div>
						</div>
						';
						
					}
					#prepare data for output (close)
					
				}
				#content (close)
				
			}
			#summary + detailed documentation + update info (close)
			
			#download file (and manual) (open)
			if(substr(get_the_title(),0,strlen('PHP file: #function-')) == 'PHP file: #function-'){
				
				$download_manual ='
				<div class="content_div">
					<h4 style="display:inline;">
					<a class="content_div_title">
						Manual
					</a>
					</h4>
					<div class="content_div_content">
						<p>
							Voluno function:
							<br>
							This file is a Voluno function and is intended for reapeated use.
							To use it, please view the manual. You can get the manual:
						</p>
						<ul>
							<li>
								By downloading the PHP file with an FTP client. The manual is the very first entry.
							</li>
							<li>
								By going to the overview page of PHP files. There, you can just click on the link "manual" and get the manual for each Voluno function.
							</li>
						</ul>
					</div>
				</div>';
				
				#function-sanitize-text.php (v1.0) (open)
				if(1==1){
					
					$function_sanitize_text__type = "code (php files)"; //obligatory
					/*
					one line unformatted text (city, name, occupation, etc.)
					url readable text (url, user_nicename, etc.) (sanitize_title)
					email address
					plain text with line breaks (biography)
					*/
					$function_sanitize_text__text = file_get_contents($filename_full);
					include('#function-sanitize-text.php');
					#output: $function_sanitize_text__text_sanitized;
					
					$file_content_array_without_whitespaces = explode("<br>",$function_sanitize_text__text_sanitized);
					
				}
				#function-sanitize-text.php (v1.0) (close)
				
				#find file info (open)
				for($akd=0;$akd<count($file_content_array1);$akd++){
					
					$array_of_special_lines = [
						0 => '#'.'# Last documentation check: ',
						1 => '#'.'# Last format and structure check: ',
						2 => '#'.'# Last update of all instances this function is used: ',
						'manual open' => '#'.'#manual (open)',
						'manual close' => '#'.'#manual (close)'
					];
					
					#finding the specific line (open)
					for($ake=0;$ake<4;$ake++){
						
						#finding the specific line (open)
						if(strpos($file_content_array1[$akd],$array_of_special_lines[$ake])){
							
							$file_info_for_table[$ake] = substr(trim($file_content_array_without_whitespaces[$akd]),strlen($array_of_special_lines[$ake]));
							
						}
						#finding the specific line (close)
						
					}
					#finding the specific line (close)
					
					#manual (open)
					if(1==1){
						
						#get documentation content (open)
						if(1==1){
							
							#start (open)
							if(strpos($file_content_array1[$akd-3],$array_of_special_lines['manual open'])){
								
								$manual['start'] = $akd;
								
							}
							#start (close)
							
							#content (open)
							if(!empty($manual['start']) AND empty($manual['end'])){
								
								$manual['content'][] = substr($file_content_array1[$akd],strlen('&nbsp;')*8+1);
								
							}
							#content (close)
							
							#end (open)
							if(strpos($file_content_array1[$akd+3],$array_of_special_lines['manual close'])){
								
								$manual['end'] = $akd;
								
							}
							#end (close)
							
						}
						#get documentation content (close)
						
						$manual_final = implode('<br>',$manual['content']);
						
					}
					#manual (close)
					
				}
				#find file info (close)
				
			}
			#download file (and manual) (close)
			
			#included + including files (open)
			if(1==1){
				
				#preparation (open)
				if(1==1){
					
					#included files (open)
					if(1==1){
						for($afu=0;$afu<count($file_list);$afu++){
							
							$occurences_in_file = substr_count(
								   file_get_contents($filename_full),
								   "include('".$file_list[$afu]."');"
							) + substr_count(
								   file_get_contents($filename_full),
								   'include("'.$file_list[$afu].'");'
							);
							
							if($occurences_in_file > 0){
								$page_object = get_page_by_title("PHP file: ".$file_list[$afu],"object","wiki-page");
								$included_files .=
								'<p>
									<a href="'.get_permalink($page_object->ID).'">
										'.$file_list[$afu].'&nbsp;('.$occurences_in_file.')
									</a>
								</p>';
							}
							
						}
						if(empty($included_files)){
							$included_files = "(none)";
							
						}
					}
					#included files (open)
					
					#including files and pages (open)
					if(1==1){
						
						#including files (open)
						for($afu=0;$afu<count($file_list);$afu++){
							
							$occurences_in_file
							= substr_count(
								   file_get_contents($current_directory.'/'.$file_list[$afu]),
								   "include('".$filename."');"
							) + substr_count(
								   file_get_contents($current_directory.'/'.$file_list[$afu]),
								   'include("'.$filename.'");'
							);
							
							if($occurences_in_file > 0){
								$page_object = get_page_by_title("PHP file: ".$file_list[$afu],"object","wiki-page");
								$including_files .= '
								<p>
									<a href="'.get_permalink($page_object->ID).'">
										'.$file_list[$afu].'&nbsp;('.$occurences_in_file.')
									</a>
								</p>';
							}
						}
						#including files (open)
						
						#including pages (open)
						for($ais=0;$ais<count($all_pages_results);$ais++){
							
							#filter out relevant posts (open)
							if(strpos($all_pages_results[$ais]->post_content,"wp-content/wp-php-voluno/".substr(get_the_title(),strlen("PHP file: "))) !== false){
								$including_files .= '
								<p>
									<span style="color:grey;">'.$all_pages_results[$ais]->post_type.':</span>
									<a href="'.get_permalink($all_pages_results[$ais]->ID).'">
										'.$all_pages_results[$ais]->post_title.'
									</a>
								</p>';
							}
							#filter out relevant posts (open)
							
						}
						#including pages (close)
						
						if(empty($including_files)){
							$including_files = "(None)";
							
						}
					}
					#including files and pages (open)
					
				}
				#preparation (close)
				
				#content (open)
				if(1==1){
					
					$including_and_included_files = '
					<div class="content_div">
						<h4 style="display:inline;">
							<a class="content_div_title">
								Included and including files
							</a>
						</h4>
						<br>
						<table class="content_div_content">
							<tr>
								<td colspan="2">
									Note: This table only lists links from and to files in the same folder! There are two folders: php-files and child theme.
								</td>
							</tr>
							<tr style="background-color:#8B0000;text-align:center;font-weight:bold;color:#fff;">
								<td style="width:50%;">
									This file is used in:
								</td>
								<td>
									This file uses:
								</td>
							</tr>
							<tr>
								<td style="width:50%;padding:15px;">
									'.$including_files.'
								</td>
								<td style="padding:15px;">
									'.$included_files.'
								</td>
							</tr>
						</table>
					</div>';
					
				}
				#content (close)
				
			}
			#included + including files (open)
			
			#file structure (open)
			if(1==1){
				
				#preparation (open)
				if(1==1){
					
					#function-sanitize-text.php (v1.0) (open)
					if(1==1){
						
						$function_sanitize_text__type = "code (php files)"; //obligatory
						/*
						one line unformatted text (city, name, occupation, etc.)
						url readable text (url, user_nicename, etc.) (sanitize_title)
						email address
						plain text with line breaks (biography)
						*/
						$function_sanitize_text__text = file_get_contents($filename_full);
						include('#function-sanitize-text.php');
						#output: $function_sanitize_text__text_sanitized;
						
						$file_content_array = str_replace(array("\r\n","\r","\n"),"",$function_sanitize_text__text_sanitized);
						$file_content_array = explode("<br>",$file_content_array);
						
					}
					#function-sanitize-text.php (v1.0) (close)
					
				}
				#preparation (close)
				
				#content (open)
				if(1==1){
					
					$file_structure = '
					<div class="content_div">
						<h4 style="display:inline;">
						<a class="content_div_title">
							File structure
						</a>
						</h4>
						<table class="content_div_content">';
							
							#loop (open)
							for($afw=0;$afw<count($file_content_array);$afw++){
								
								$row['replace space and tabs, no #']
								= str_replace(
									"#",
									"",
									str_replace(
										" ",
										"&nbsp;",
										str_replace(
											"\t",
											'&nbsp;&nbsp;&nbsp;',
											$file_content_array[$afw]
										)
									)
								);
								$row['original']
								= $file_content_array[$afw];
								
								#level 1 (open)
								if(1==1){
									if(
										strpos($row['original'], '(open)') !== false
									AND
										substr($row['original'],0,1) == "#"
									){
									$file_structure .= '
									<tr>
										<td style="width:15px;color:grey;">
										'.($afw+1).'
										</td>
										<td style="font-weight:bold;">
										'.explode('(open)',$row['replace space and tabs, no #'])[0].'
										</td>
									</tr>';
									}
								}
								#level 1 (open)
								
								#level 2 (open)
								if(1==1){
									if(
										strpos($row['original'], '(open)') !== false
									AND
										substr($row['original'],0,5) == "    #"
									){
									$file_structure .= '
									<tr>
										<td style="width:15px;color:grey;">
										'.($afw+1).'
										</td>
										<td>
										'.explode('(open)',$row['replace space and tabs, no #'])[0].'
										</td>
									</tr>';
									}
								}
								#level 2 (open)
								
							}
							#loop (close)
							
						$file_structure .= '
						</table>
					</div>';
					
				}
				#content (close)
				
			}
			#file structure (close)
			
			#file contents (open)
			if(1==1){
				
				#preparation (open)
				if(1==2){ // no longer needed, since already use above
					
					#function-sanitize-text.php (v1.0) (open)
					if(1==1){
						
						$function_sanitize_text__type = "code (php files)"; //obligatory
						/*
						one line unformatted text (city, name, occupation, etc.)
						url readable text (url, user_nicename, etc.) (sanitize_title)
						email address
						plain text with line breaks (biography)
						*/
						$function_sanitize_text__text = file_get_contents($filename_full);
						include('#function-sanitize-text.php');
						#output: $function_sanitize_text__text_sanitized;
						
						$file_content_array = explode("<br>",$function_sanitize_text__text_sanitized);
						
					}
					#function-sanitize-text.php (v1.0) (close)
					
				}
				#preparation (close)
				
				#content (open)
				if(1==1){
					
					$file_contents = '
					<div class="content_div">
						<h4 style="display:inline;">
						<a class="content_div_title">
							File contents
						</a>
						</h4>
						<table class="content_div_content">';
						for($afw=0;$afw<count($file_content_array);$afw++){
						$file_contents .= '
						<tr>
							<td style="width:15px;color:grey;">
							'.($afw+1).'
							</td>
							<td>
							'.str_replace("  ","&nbsp;",$file_content_array[$afw]).'
							</td>
						</tr>';
						}
						$file_contents .= '
						</table>
					</div>';
					
				}
				#content (close)
				
			}
			#file contents (close)
			
			echo
			$description['summary'].
			$description['detailed_documentation'].
			$download_manual.
			$manual_final.
			$including_and_included_files.
			$description['update_info'].
			$file_structure.
			$file_contents;
			
		}
		#content (close)
		
	}
	#automated information for individual files (close)
	
}
#files

#plugins (open)
if(1==1){
	
	#plugins list (open)
	if(get_the_ID() == 1191){
		
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
		
		#content (open)
		if(1==1){
			
			// Check if get_plugins() function exists. This is required on the front end of the
			// site, since it is in a file that is normally only loaded in the admin.
			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			
			$wp_plugins = array_values(get_plugins());
			
			echo '
			<ol>';
			for($aij=0;$aij<count($wp_plugins);$aij++){
				
				#prepare (open)
				if(1==1){
					$plugin = array_values($wp_plugins[$aij]);
					$match_existing_wikipages_query = $GLOBALS['wpdb']->prepare('
															SELECT *
															FROM 4df5ukbnn5p3t817_term_relationships
																
																LEFT JOIN (
																	SELECT * 
																	FROM 4df5ukbnn5p3t817_posts
																	WHERE post_type = "wiki-page"
																) AS posts
																ON object_id = ID 
																
															WHERE term_taxonomy_id = 412
															AND post_name = %s',
															'wordpress-plugin-'.sanitize_title($plugin[0]));
					$match_existing_wikipages_results = $GLOBALS['wpdb']->get_results($match_existing_wikipages_query);
					#var_dump($match_existing_wikipages_results);
				}
				#prepare (close)
				
				#content (open)
				if(1==1){
					echo '
					<li>';
						
						
						
						#case 1: db and page exist (open)
						if(!empty($match_existing_wikipages_results)){
							echo '
							<a href="'.get_permalink($match_existing_wikipages_results[0]->ID).'">
								'.$plugin[0].'
							</a>';
						}
						#case 1: db and page exist (close)
						
						#case 2: only db exists (open)
						else{
							echo
							$plugin[0].
							'<span style="color:grey;">
							(Page doesn\'t exist yet. <a href="'.get_site_url().'/wp-admin/post-new.php?post_type=wiki-page">Create it</a>.)
							</span>';
						}
						#case 2: only db exists (close)
						
					echo '
					</li>';
				}
				#content (close)
				
			}
			echo '
			</ol>';
		}
		#content (close)
		
		unset($function_wiki);
		
	}
	#plugins list (close)
	
	#individual plugin (open)
	if(strpos(get_the_title(),"WordPress plugin: ") !== false){
		
		#content (open)
		if(1==1){
			
			// Check if get_plugins() function exists. This is required on the front end of the
			// site, since it is in a file that is normally only loaded in the admin.
			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			
			$wp_plugins = array_values(get_plugins());
			
			#loop all plugins (open)
			for($aij=0;$aij<count($wp_plugins);$aij++){
				
				#filter out individual plugin (open)
				if(substr(get_the_title(),strlen("WordPress plugin: ")) == $wp_plugins[$aij]['Name']){
					
					#prepare (open)
					if(1==1){
						
						$plugin = array_values($wp_plugins[$aij]);
						$plugin_data_array = array('Name','Description','PluginURI','Version','Author');
						
					}
					#prepare (close)
					
					echo '
					<ul>';
						
						#plugin data loop (open)
						for($air=0;$air<count($plugin_data_array);$air++){
							
							if($plugin_data_array[$air] == "PluginURI"){
								echo '
								<li>
									<b>'.$plugin_data_array[$air].':</b>
									<a href="'.$wp_plugins[$aij][$plugin_data_array[$air]].'">'.$wp_plugins[$aij][$plugin_data_array[$air]].'</a>
								</li>';
							}else{
								echo '
								<li>
									<b>'.$plugin_data_array[$air].':</b> '.$wp_plugins[$aij][$plugin_data_array[$air]].'
								</li>';
							}
							
						}
						#plugin data loop (close)
						
					echo '
					</ul>';
					
				}
				#filter out individual plugin (close)
				
			}
			#loop all plugins (close)
			
		}
		#content (close)
		
		unset($function_wiki);
		
	}
	#individual plugin (close)

}
#plugins (close)

#posts (open)
if(1==1){
	
	#post types (open)
	if(get_the_ID() == 1328){
		
		#content (open)
		if(1==1){
			
			$post_types = array_values(get_post_types( '', 'names' ));
			
			echo '
			<ol>';
			for($aij=0;$aij<count($post_types);$aij++){
				
				#prepare (open)
				if(2==1){
					#$plugin = array_values($wp_plugins[$aij]);
					$match_existing_wikipages_query = $GLOBALS['wpdb']->prepare('
															SELECT *
															FROM 4df5ukbnn5p3t817_term_relationships
																
																LEFT JOIN (
																	SELECT * 
																	FROM 4df5ukbnn5p3t817_posts
																	WHERE post_type = "wiki-page"
																) AS posts
																ON object_id = ID 
																
															WHERE term_taxonomy_id = 412
															AND post_name = %s',
															'wordpress-plugin-'.sanitize_title($plugin[0]));
					$match_existing_wikipages_results = $GLOBALS['wpdb']->get_results($match_existing_wikipages_query);
					#var_dump($match_existing_wikipages_results);
				}
				#prepare (close)
				
				#content (open)
				if(1==1){
					echo '
					<li>
						'.$post_types[$aij].'
					</li>';
				}
				#content (close)
				
			}
			echo '
			</ol>';
		}
		#content (close)
		
	}
	#post types (close)
	
	#post lists (open)
	if(get_the_ID() == 1374){
		
		#mysql (open)
		if(1==1){
			
			$posts_query = $GLOBALS['wpdb']->prepare('
										SELECT * 
										FROM 4df5ukbnn5p3t817_posts
										WHERE post_status = "publish"
										ORDER BY post_title ASC;');
			$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
			
		}
		#mysql (open)
		
		#content (open)
		if(1==1){
			
			$post_types_array = array(
				array(
					'slug' => 'members-net-page',
					'name' => 'Members net pages'
				),
				array(
					'slug' => 'staff-net-page',
					'name' => 'Staff net pages'
				),
				array(
					'slug' => 'website-page',
					'name' => 'Website pages'
				),
				array(
					'slug' => 'developer-page',
					'name' => 'Developer pages'
				),
				array(
					'slug' => 'wiki-page',
					'name' => 'Wiki pages'
				)
			);
			
			for($ain=0;$ain<count($post_types_array);$ain++){
				
				if($post_types_array[$ain]['slug'] == $page_section){
				
					echo '
					<ol>';
					for($aij=0;$aij<count($posts_results);$aij++){
						
						#content (open)
						if($post_types_array[$ain]['slug'] == $posts_results[$aij]->post_type){
							echo '
							<li>
								<a href="'.get_permalink($posts_results[$aij]->ID).'">
									'.$posts_results[$aij]->post_title.'
								</a>
							</li>';
						}
						#content (close)
						
					}
					echo '
					</ol>';
					
				}
			}
		}
		#content (close)
		
	}
	#post lists (close)

}
#post (close)

#mysql tables (open)
if(1==1){
	
	#mysql tables (general overview) (open)
	if(get_the_ID() == 994){
		
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
			
			$table_name_query = $GLOBALS['wpdb']->prepare(
												'SELECT table_name, column_name
												FROM INFORMATION_SCHEMA.COLUMNS
												WHERE table_schema = "'.DB_NAME.'"
												GROUP BY table_name
												ORDER BY table_name, ordinal_position
												'
												);
			$table_name_results = $GLOBALS['wpdb']->get_results($table_name_query);
			
		}
		#mysql (open)
		
		#content (open)
		if(1==1){
			
			echo '
			<ol>';
				
				#loop (open)
				for($aij=0;$aij<count($table_name_results);$aij++){
					
					#prepare (open)
					if(1==1){
						
						$match_existing_wikipages_query = $GLOBALS['wpdb']->prepare('
																SELECT *
																FROM 4df5ukbnn5p3t817_term_relationships
																	
																	LEFT JOIN (
																		SELECT * 
																		FROM 4df5ukbnn5p3t817_posts
																		WHERE post_type = "wiki-page"
																	) AS posts
																	ON object_id = ID 
																	
																WHERE term_taxonomy_id = 409
																AND post_name = %s',
																'mysql-table-'.substr($table_name_results[$aij]->table_name,strlen("4df5ukbnn5p3t817_")));
						$match_existing_wikipages_results = $GLOBALS['wpdb']->get_results($match_existing_wikipages_query);
						#var_dump($match_existing_wikipages_results);
					}
					#prepare (close)
					
					#content (open)
					if(1==1){
						echo '
						<li>';
							
							#case 1: wordpress table (open)
							if(strpos($table_name_results[$aij]->table_name,"voluno_") === false){
								
								#case a: db and page exist (open)
								if(!empty($match_existing_wikipages_results)){
									echo '
									<span style="color:grey;">
										WordPress Table:
									</span>
									<a href="'.get_permalink($match_existing_wikipages_results[0]->ID).'">
										'.substr($table_name_results[$aij]->table_name,strlen("4df5ukbnn5p3t817_")).'
									</a>';
								}
								#case a: db and page exist (close)
								
								#case b: only db exists (open)
								else{
									echo '
									<span style="color:grey;">
										WordPress Table:
										'.substr($table_name_results[$aij]->table_name,strlen("4df5ukbnn5p3t817_")).'
										(<a href="'.get_site_url().'/wp-admin/post-new.php?post_type=wiki-page">Create page</a>.)
									</span>';
								}
								#case b: only db exists (close)
								
							}
							#case 1: wordpress table (close)
							
							#case 2: voluno table (open)
							else{
								
								#case a: db and page exist (open)
								if(!empty($match_existing_wikipages_results)){
									
									#data info (open)
									if(1==1){
										
										$table_integration_info_query = $GLOBALS['wpdb']->prepare(
											'SELECT *
											FROM fi4l3fg_voluno_admin_info
											WHERE admin_info_type = "mysql_table_info"
												AND admin_info_content = "'.$table_name_results[$aij]->table_name.'";'
											);
										$table_integration_info_results = $GLOBALS['wpdb']->get_results($table_integration_info_query);
										
										unset($table_info_user_id);
										
										#loop for all table info elements (open)
										for($alz=0;$alz<count($table_integration_info_results);$alz++){
											
											#element: user id (open)
											if($table_integration_info_results[$alz]->admin_info_type_general == "element: user id"){
												
												$table_info_user_id_array =
												explode(
													';',
													substr(
														$table_integration_info_results[$alz]->admin_info_type_specific,
														strlen('integrated in (seperate elements via semicolon + space):')
													)
												);
												
												#integrated in #function-developer-warnings (open)
												if(in_array(' #function-developer-warnings.php',$table_info_user_id_array)){
													
													$table_info_user_id .= '
													<span style="color:green">
														Integrated into "Developer Warnings Function";
													</span>';
													
												}else{
													
													$table_info_user_id .= '
													<span style="color:red">
														Not integrated into "Developer Warnings Function";
													</span>';
													
												}
												#integrated in #function-developer-warnings (close)
												
												#integrated in #function-user-delete.php (open)
												if(in_array(' #function-user-delete.php',$table_info_user_id_array)){
													
													$table_info_user_id .= '
													<span style="color:green">
														Integrated into "User Delete Function";
													</span>';
													
												}else{
													
													$table_info_user_id .= '
													<span style="color:red">
														Not integrated into "User Delete Function";
													</span>';
													
												}
												#integrated in #function-user-delete.php (close)
												
												$table_info_user_id = '
												<div style="padding-left:30px;">
													User info:
													'.$table_info_user_id.'
												</div>';
												
											}
											#element: user id (close)
											
										}
										#loop for all table info elements (close)
										
									}
									#data info (close)
									
									echo '
									<a href="'.get_permalink($match_existing_wikipages_results[0]->ID).'">
										'.substr($table_name_results[$aij]->table_name,strlen("4df5ukbnn5p3t817_")).'
									</a>'.
									$table_info_user_id;
									
								}
								#case a: db and page exist (close)
								
								#case b: only db exists (open)
								else{
									echo
									substr($table_name_results[$aij]->table_name,strlen("4df5ukbnn5p3t817_")).
									'<span style="color:grey;">
									(Page doesn\'t exist yet. <a href="'.get_site_url().'/wp-admin/post-new.php?post_type=wiki-page">Create it</a>.)
									</span>';
								}
								#case b: only db exists (close)
								
							}
							#case 2: voluno table (close)
							
						echo '
						</li>';
					}
					#content (close)
					
				}
				#loop (close)
				
			echo '
			</ol>
			';
			
		}
		#content (close)
		
	}
	#mysql tables (general overview) (close)
	
	#mysql table - including files (open)
	if(strpos(get_the_title(),"MySQL table: ") !== false AND $function_wiki_page_section == "including_files"){
		
		#variable definitions (open)
		if(1==1){
			
			$current_directory = 'wp-content/wp-php-voluno/';
			$file_list = array_values(array_diff(scandir($current_directory), array('.','..','error_log','wp-php-voluno')));
			$filename = "4df5ukbnn5p3t817_".substr(get_the_title(),strlen("MySQL table: "));
			
		}
		#variable definitions (close)
		
		#jQuery (open)
		if(1==1){
			
			echo '
			<script>
				jQuery(document).ready(function(){
				
				jQuery(".content_div_title").click(function(){
					jQuery(this).closest(".content_div").find(".content_div_content").toggle();
				});
				
				});
			</script>';
			
		}
		#jQuery (close)
		
		#style (open)
		if(1==1){
			echo '
			<style>
				.content_div{
					padding:20px;
					background-color:#FFEAB9;
					text-align:center;
					border-radius:20px;
					margin:20px 0px;
				}
				.content_div_title{
					cursor:pointer;
				}
				.content_div_content{
					display:none;
				}
			</style>';
		}
		#style (close)
		
		#content (open)
		if(1==1){
			
			#preparation (open)
			if(1==1){
				
				#including files and pages (open)
				if(1==1){
					
					#including files (open)
					for($afu=0;$afu<count($file_list);$afu++){
						
						$occurences_in_file
						= substr_count(
							   file_get_contents($current_directory.'/'.$file_list[$afu]),
							   $filename
						);
						
						if($occurences_in_file > 0){
							$page_object = get_page_by_title("PHP file: ".$file_list[$afu],"object","wiki-page");
							$including_files .= '
							<li>
								<a href="'.get_permalink($page_object->ID).'">
									'.$file_list[$afu].'&nbsp;('.$occurences_in_file.')
								</a>
							</li>';
						}
					}
					#including files (open)
					
				}
				#including files and pages (open)
				
			}
			#preparation (close)
			
			#content (open)
			if(1==1){
				
				if(empty($including_files)){
					echo '
					<span style="color:grey;font-style:italic;">(None)</span>';
				}else{
					echo '
					Files in the folder wp-php-voluno using this table:
					<ol>
						'.$including_files.'
					</ol>';
				}
				
			}
			#content (close)
			
		}
		#content (open)
		
	}
	#mysql table - including files (close)
	
	#mysql table - structure and contents (open)
	if(strpos(get_the_title(),"MySQL table: ") !== false AND !isset($function_wiki_page_section)){
		
		#structure (open)
		if(1==1){
			
			#style (open)
			if(1==1){
				echo '
				<style>
					.mysql_table_-_structure td{
						text-align:center;
					}
				</style>';
			}
			#style (close)
			
			#mysql (open)
			if(1==1){
				
				$table_cols_query = $GLOBALS['wpdb']->prepare(
													'SHOW FULL COLUMNS
													FROM 4df5ukbnn5p3t817_'.substr(get_the_title(),strlen("MySQL table: ")).';'
													);
				$table_cols_results = $GLOBALS['wpdb']->get_results($table_cols_query);
				
			}
			#mysql (close)
			
			#content (open)
			if(1==1){
				
				echo '
				<div style="padding:10px;text-align:center;">'.
					'4df5ukbnn5p3t817_'.substr(get_the_title(),strlen("MySQL table: ")).
				'</div>
				<table style="border:1px;" class="mysql_table_-_structure">';
					
					#col titles (open)
					if(1==1){
						echo '
						<tr style="color:#fff;background-color:#8B0000;">
							<td>
								Name
							</td>
							<td>
								Typ
							</td>
							'.#<td>
							   # Kollation
							#</td>
							'<td>
								Null
							</td>
							<td>
								Default
							</td>
							<td>
								Extra
							</td>
							<td>
								Comment
							</td>
						</tr>';
					}
					#col titles (close)
					
					#database cols (open)
					for($aik=0;$aik<count($table_cols_results);$aik++){
						
						if($aik % 2 == TRUE){
							$row_bg_color = 'fff';
						}else{
							$row_bg_color = 'FFF5C4';
						}
						
						echo '
						<tr style="background-color:#'.$row_bg_color.';">
							<td>
							'.$table_cols_results[$aik]->Field.'
							</td>
							<td>
							'.$table_cols_results[$aik]->Type.'
							</td>
							'.#<td>
							  #  '.$table_cols_results[$i_table_cols]->Collation.'
							#</td>
							'<td>
							'.$table_cols_results[$aik]->Null.'
							</td>
							<td>
							'.$table_cols_results[$aik]->Default.'
							</td>
							<td>
							'.$table_cols_results[$aik]->Extra.'
							</td>
							<td>
							'.$table_cols_results[$aik]->Comment.'
							</td>
						</tr>';
					}
					#database cols (close)
					
				echo '
				</table>';
				
			}
			#content (close)
			
			#echo '<br><br>'.$table_name_results[$i_table_name]->table_name;
			
		}
		#structure (close)
		
		#content (open)
		if(1==1){ #todolist
			
			$mysql_table_name = '4df5ukbnn5p3t817_'.substr(get_the_title(),strlen("MySQL table: "));
			
			#style (open)
			if(1==1){
				echo '
				<style>
					.mysql_table_-_structure td{
						text-align:center;
					}
				</style>';
			}
			#style (close)
			
			#content (open)
			if(1==1){
				
				#function-table.php (v1.0) (open)
				if(1==1){
					
					#Documentation (open)
					if(0!=0){
						
						// This function creates automatically formatted and sortable tables with pagination features and various other options.
						
						// Each table requires three types of data:
						//
						// - Raw data: Each row and each column requires data. Basically, you need to enter an arry for each column.
						//   You can then easily access this data across the entire table and do something with it.
						//   You can also sort rows according to this data.
						//
						// - Table options: There is a wide array of options for each table.
						//
						// - Table design: Finally, you What should happen to the data in each column? How should it be displayed?
						//   This data is different for each column, but identical for each row
						//   (unless you specify it otherwise with if conditions).
						//
						// Example:
						//   Raw data: You can store the first name in column one. The column can be sorted according to the first name.
						//   Table design: You can display the first name bold, add a line break and display the respective year of birth in
						//   brackets in the next line within the same row.
						
						// Note: For technical reasons, this function has two different input areas and two execution areas. Please make sure not to change
						// important elements, especially those maked with the comment: "//Don't touch this."
						
					}
					#Documentation (close)
					
					#Input: Raw data + Table options (open)
					if(1==1){
						
						#Raw data (open)
						if(1==1){
							
							#data preparation and creation (open)
							if(1==1){
								
								// To include data, you need to get raw data first. You can do that here by modifying the query below.
								// Alternatively, you can get the raw data in any other way in here. Just do whatever you want in this bracket.
								// If you prefer getting and preparing the raw data outside of this Voluno function, you can also just delete this
								// entire bracket altogether.
								
								//get the column names
								$columns['query'] = $GLOBALS['wpdb']->prepare(
																		'SHOW FULL COLUMNS
																		FROM '.$mysql_table_name.';'
																	);
								$columns['results'] = $GLOBALS['wpdb']->get_results($columns['query']);
								
								//get data
								$function_table['query'] = $GLOBALS['wpdb']->prepare('SELECT *
																   FROM '.$mysql_table_name.';'
																	);
								$function_table['results'] = $GLOBALS['wpdb']->get_results($function_table['query']);
								
							}
							#data preparation and creation (close)
							
							#inserting the data into the data array (open)
							for($ajl=0;$ajl<count($function_table['results']);$ajl++){ // <- Please modify the total amount of rows to include in your table.
								
								// This loop iterates through each row of data.
								// If you didn't use the default query, please modify the amount of rows in the above loop.
								
								// In the following brackets, please add one line for each column that you want to add to the mysql table.
								// In the following example, user data is inserted (column names are imaginary, just to illustrate).
								#echo "<br>ngo: ".$ajl;
								#columns (open)
								for($aji=0;$aji<count($columns['results']);$aji++){
									
									#array of columns (open)
									if($ajl == 0){
										
										$array_of_col_names[] = $columns['results'][$aji]->Field;
										
									}
									#array of columns (close)
									
									$function_table['data'][$ajl][$columns['results'][$aji]->Field] = $function_table['results'][$ajl]->{$columns['results'][$aji]->Field};
									// To add new lines, just copy the above. Each line requires an individual column name (last bracket) and a value.
									
									// Keep the column names in mind, these will be used later on a lot.
									
								}
								#columns (close)
								
							}
							#inserting the data into the data array (close)
							
						}
						#Raw data (close)
						
						#Table options (open)
						if(1==1){
							
							$function_table['unique id'] = "it_wiki_mysql_tables_".$mysql_table_name;
							// Everytime you use this function, please add a random and unique ID (only a-z and 0-9). For example, see https://passwordsgenerator.net/
							
							#Options connected to the title (open)
							if(1==1){
								
								$function_table['display title'] = $mysql_table_name;
								// The title of the table which is displayed above the table. To hide title, leave empty.
								
								#$function_table['show on load'] = "yes";
								// "yes" or empty (default). If there's no title, this is automatically set to yes, since there is nothing to show.
								
								#$function_table['title format'] = array('<h1>','</h1>');
								// Opening and closing css tags for the title. Default: array('<h4>','</h4>')
								
								#$function_table['display number of results'] = 'no';
								// Displays the full amount of content rows in brackets behind the table title. "no" or empty (default).
								
							}
							#Options connected to the title (close)
							
							#Headings and sorting (open)
							if(1==1){
								
								#$function_table['hide column headings'] = "yes";
								// Hides headings of table. "yes" or empty (default).
								
								// The following multi-dimensional array has the following structure:
								// - heading = The heading that will be displayed above the respective column.
								// - width = Optional. With of the respective column. You can either use % or pt.
								// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
								//                    columns names that you used in the "Raw data" section.
								//                    See here: #$function_table['data'][]['THIS TEXT']. In the example, the column names were "email" and "id".
								$function_table['column headings'] 
								= array(
									array( // In almost all cases, the first column should be the row numbering. If you want to keep it, just leave it as it is.
										'heading'		 => '#', // See 1 row above.
										'width'			 => 100/(count($array_of_col_names)+1).'%' // See 2 rows above.
									));
								
								#
								for($ajt=0;$ajt<count($array_of_col_names);$ajt++){
									
									$function_table['column headings'][] =
									array(
										'heading'		 => $array_of_col_names[$ajt],
										'width'			 => 100/(count($array_of_col_names)+1).'%',
										'sorting option' => $array_of_col_names[$ajt]
									);
									
								}
								#
								
								//Optionally, you can choose one of the above columns to be the default sorting option.
								// If you don't want this, please delete or hide the entire array.
								#$function_table['default ordering']
								#= array(
								#	'column' => 'email', // Colum name. In the example, "email" or "id".
								#	'direction' => 'ASC' // ASC or DESC
								#);
								
							}
							#Headings and sorting (close)
							
							#Pagination (open)
							if(1==1){
								
								// If the table doesn't have a lot of space, you can make the pagination "thin". Then, the "first page", "previous page", "items per page",
								// "next page" and "last page" buttons will aligned vertically, instead of horizontally -> they will be slimmer.
								#$function_table['thin_pagination'] = "yes"; // "yes" or "no" (default)
							}
							#Pagination (close)
							
							#Display a message if no data available (open)
							if(1==1){
								
								// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
								// Here, you can modify this message.
								
								$function_table['no_items_available_message'] = array(
									'lines' => "no" // Should a line be displayed left and right of the messsage? Not important, just looks nice. "no" or "yes" (default).
									,'content' => "none" // Any text (will be displayed) or "none" (no text will be displayed). Default: "There are currently no items available."
								);
								
							}
							#Display a message if no data available (close)
							
						}
						#Table options (close)
						
					}
					#Input: Raw data + Table options (close)
					
					$function_table['part'] = 1; //Don't touch this. 
					include("#function-table.php"); //Don't touch this. 
					
					#design (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// In this section, the actual content of the table needs to be created.
							// You already created the raw data, now you need to decide what to do with it / how to display it.
							
							// You only need to create one row, it will then be looped to fill the whole table.
							// Thus, by populating one cell, you automatically create the entire respective column.
							
							// Please use the template inside the following loop to created cells/columns.
							// You can add or delete as many columns as you want. However, the amount of cells you add should match
							// the amount of column headings you added in "Table options".
							// Please be sure not to change anything else.
							
						}
						#documentation (close)
						
						#Cells/Columns (open)
						for($abs=$function_table['pagination_lower_limit'];$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));$abs++){ //Don't touch this.
							$function_table['table rows'] .= $function_table['row open']; //Don't touch this.
							
							//#1 template (open) <- column number, short description of column
							if(1==1){ //Don't touch this.
								
								// Write the content here. To use the table data, use the variable:
								// $function_table['data'][$abs]['column name'] and replace "column name" with the name of the respective column, as entered in the section "raw data".
								// In the given example, the column names were "email" or "id".
								
							}
							//#1 template (close) <- column number (add +1 for each new column you add), short description of column
							
							#1 counter (open)
							if(1==1){
								
								// If you want to use a row counter, please don't touch this cell as it is.
								
								$function_table['table rows'] .= '
								<td>
									'.number_format(($abs+1),0,"."," ").'
								</td>
								';
								
							}
							#1 counter (close)
							
							#2-x all table columns (open)
							for($ajv=0;$ajv<count($array_of_col_names);$ajv++){
								
								#preparation (open)
								if(1==1){
									
									#function-sanitize-text.php (v1.0) (open)
									if(1==1){
										
										$function_sanitize_text__type = 'code (php files)'; //obligatory
										/*
											one line unformatted text (city, name, occupation, etc.)
											url readable text (url, user_nicename, etc.) (sanitize_title)
											email address
											plain text with line breaks (biography)
											code (php files)
										*/
										$function_sanitize_text__text = $function_table['data'][$abs][$array_of_col_names[$ajv]];
										#$function_sanitize_text__reverse = “yes”; //only if you want to reverse the process. e.g. remove <br> to edit in form field
										include('#function-sanitize-text.php');
										#output: $function_sanitize_text__text_sanitized;
										
									}
									#function-sanitize-text.php (v1.0) (close)
									
									#function-only-first-x-symbols.php (v1.0) (open)
									if(1==1){
										$function_only_first_x_symbols = $function_sanitize_text__text_sanitized;
										$function_only_first_x_symbols_num = 50; #optional, number of symbols, default is 100
										#$function_only_first_x_symbols__more_button = “no”; //default: yes, empty
										include('#function-only-first-x-symbols.php');
										#output: $function_only_first_x_symbols
									}
									#function-only-first-x-symbols.php (v1.0) (close)
									
								}
								#preparation (close)
								
								#content (open)
								if(1==1){
									
									$function_table['table rows'] .= '
									<td title="'.$function_sanitize_text__text_sanitized.'">
										'.$function_only_first_x_symbols.'
									</td>
									';
									
								}
								#content (close)

								
							}
							#2-x all table columns (close)
							
							
							$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
						} //Don't touch this. 
						#Cells/Columns (close)
						
					}
					#design (close)
					
					$function_table['part'] = 2; //Don't touch this. 
					include("#function-table.php"); //Don't touch this. 
					
					#output
					//the entire output is stored in the following variable:
					#$function_table['output table'];
					
				}
				#function-table.php (v1.0) (close)
				
				echo '
				<div style="width: 100%;overflow-y: auto;">
					<div style="width:'.(count($array_of_col_names)*150).'px;">
						'.$function_table['output table'].'
					</div>
				</div>
				';
				
			}
			#content (close)
			
		}
		#content (close)
		
	}
	#mysql table - structure and contents (close)

}
#mysql tables (close)

#technical features (general overview) (open)
if(get_the_ID() == 1263){
	
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
		
		$technical_features_query = $GLOBALS['wpdb']->prepare('
													SELECT *
													FROM 4df5ukbnn5p3t817_term_relationships
														
														LEFT JOIN (
															SELECT * 
															FROM 4df5ukbnn5p3t817_posts
															WHERE post_type = "wiki-page"
														) AS posts
														ON object_id = ID 
														
													WHERE term_taxonomy_id = 413
													AND post_status = "publish"
													ORDER BY post_title ASC;');
		$technical_features_results = $GLOBALS['wpdb']->get_results($technical_features_query);
		
	}
	#mysql (open)
	
	#content (open)
	if(1==1){
		echo '
		<ol>';
		for($aij=0;$aij<count($technical_features_results);$aij++){
			
			#content (open)
			if(1==1){
				echo '
				<li>
					<a href="'.get_permalink($technical_features_results[$aij]->ID).'">
						'.substr($technical_features_results[$aij]->post_title,strlen("Technical feature: ")).'
					</a>
				</li>';
			}
			#content (close)
			
		}
		echo '
		</ol>';
	}
	#content (close)
	
}
#technical features (general overview) (close)

#warnings list (open)
if(get_the_ID() == 1976){
	
	#mysql (open)
	if(1==1){
		
		$posts_query = $GLOBALS['wpdb']->prepare('
									SELECT * 
									FROM 4df5ukbnn5p3t817_posts
									
									LEFT JOIN (
										SELECT *
										FROM 4df5ukbnn5p3t817_term_relationships
										WHERE term_taxonomy_id = 415) AS categories
										ON ID = object_id
									
									WHERE post_type = "wiki-page"
										AND post_status = "publish"
									ORDER BY post_title ASC;');
		$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
		
		$posts_complete_query = $GLOBALS['wpdb']->prepare('
									SELECT * 
									FROM 4df5ukbnn5p3t817_posts
									
									LEFT JOIN (
										SELECT *
										FROM 4df5ukbnn5p3t817_term_relationships
										WHERE term_taxonomy_id = 415) AS categories
										ON ID = object_id
									
									WHERE post_type = "wiki-page"
										AND post_status = "publish"
										AND term_taxonomy_id = 415
									ORDER BY post_title ASC;');
		$posts_complete_results = $GLOBALS['wpdb']->get_results($posts_complete_query);
		
	}
	#mysql (open)
	
	#jQuery (open)
	if($page_section != "incomplete"){
		echo '
		<script>
			jQuery(document).ready(function(){
				jQuery(".complete_button").click(function(){
					jQuery(".complete_button, .complete_list").toggle();
				});
			});
		</script>
		';
	}
	#jQuery (clise)
	
	#content (open)
	if(1==1){
		
		#prepare (open)
		if(1==1){
			
			for($aij=0;$aij<count($posts_results);$aij++){
				
				#only incomplete (open)
				if($posts_results[$aij]->term_taxonomy_id != 415){
					$not_complete .= '
					<li>
						<a href="'.get_permalink($posts_results[$aij]->ID).'">
							'.$posts_results[$aij]->post_title.'
						</a>
					</li>';
				}
				#only incomplete (close)
				
				#only complete (open)
				else{
					$complete .= '
					<li>
						<a href="'.get_permalink($posts_results[$aij]->ID).'">
							'.$posts_results[$aij]->post_title.'
						</a>
					</li>';
				}
				#only complete (close)
				
			}
			
		}
		#prepare (close)
		
		#incomplete (open)
		if($page_section == "incomplete"){
			echo '
			<p>
				'.count($posts_complete_results).' of '.count($posts_results).
				' wiki pages are complete ('.round((count($posts_complete_results)/count($posts_results)*100),4).' %, '.
				(count($posts_results)-count($posts_complete_results)).' are remaining).
				<br>
				Once wiki page complete is worth '.round((1/count($posts_results)*100),4).' % 
			</p>
			<ol>
				'.$not_complete.'
			</ol>';
		}
		#incomplete (close)
		
		#complete (open)
		else{
			echo '
			<div class="complete_buttons_menu">
				<div class="voluno_button complete_button">
					Show
				</div>
				<div class="voluno_button complete_button" style="display:none;">
					Hide
				</div>
			</div>
			<ol class="complete_list" style="display:none;">
				'.$complete.'
			</ol>';
		}
		#complete (close)
		
	}
	#content (close)
	
	unset($page_section);
	
}
#warnings list (close)

#wiki home (open)
if(get_the_ID() == 962){
	
	#jquery (open)
	if(1==1){
		
		echo '
		<div class="4616814681849784381"></div> './*needed for jQuery, see below*/'
		<script>
			jQuery(document).ready(function(){
				
				var var_function_content_right = jQuery(".wiki-home-function-content-right").html(); './*put function content into variable and delete*/'
				jQuery(".wiki-home-function-content-right").html(" ");
				
				var var_function_content_left_bottom = jQuery(".wiki-home-function-content-left-bottom").html(); './*put function content into variable and delete*/'
				jQuery(".wiki-home-function-content-left-bottom").html(" ");
				
				var var_function_container = jQuery(".wiki-home-function-container").html(); './*put function container into variable and delete*/'
				jQuery(".wiki-home-function-container").html(" ");
				
				var wiki_content = jQuery(".wiki_content").html();
				var end_of_wiki_content = wiki_content.indexOf("<div class=\"4616814681849784381\"></div>");
				
				jQuery(".wiki_content").html("<div class=\"wiki_content_new\">"+wiki_content.substring(0,end_of_wiki_content)+"</div>");
				
				var var_wiki_content = jQuery(".wiki_content_new").html();  './*put regular content into variable and replace with function container*/'
				jQuery(".wiki_content_new").html(var_function_container);
				
				jQuery(".wiki-content-td").html(var_wiki_content+var_function_content_left_bottom); './*fill up function container with function content and regular content*/'
				jQuery(".function-content-td").html(var_function_content_right);
				
			});
		</script>';
		
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
									WHERE post_type = "wiki-page"
										AND post_status = "publish"
									ORDER BY post_modified DESC
									LIMIT 15;');
		$posts_results = $GLOBALS['wpdb']->get_results($posts_query);
		
		$posts_bytitle_query = $GLOBALS['wpdb']->prepare('
									SELECT * 
									FROM 4df5ukbnn5p3t817_posts
									WHERE post_type = "wiki-page"
										AND post_status = "publish"
									ORDER BY post_title ASC;');
		$posts_bytitle_results = $GLOBALS['wpdb']->get_results($posts_bytitle_query);
		
		$revisions_query_text = '
		SELECT *
		FROM 4df5ukbnn5p3t817_posts
		WHERE post_parent = %d
		ORDER BY post_date DESC
		LIMIT 1';
		
	}
	#mysql (open)
	
	#content (open)
	if(1==1){
		
		#container (open)
		if(1==1){
			echo '
			<div class="wiki-home-function-container">
				<table>
					<tr>
						<td style="width:50%;padding-right:20x;">
							<div class="wiki-content-td">
							</div>
						</td>
						<td>
							<div class="function-content-td">
							</div>
						</td>
					</tr>
				</table>
			</div>';
		}
		#container (close)
		
		#last modified - wiki-home-function-content-right (open)
		if(1==1){
			echo '
			<div class="wiki-home-function-content-right">
				<div style="border-left:1px solid black;padding:20px 0px 0px 20px;">
					<b>Last modified wiki pages:</b>
					';
					#loop (open)
					for($aij=0;$aij<count($posts_results);$aij++){
						
						#prepare (open)
						if(1==1){
							
							#function-timezone.php (v1.0) (open)
							if(1==1){
								$function_timezone = $posts_results[$aij]->post_modified;
								#$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
								#$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
								$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
								//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
								//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
								include('#function-timezone.php');
							}
							#function-timezone.php (v1.0) (close)
							
							#revisions (open)
							if(1==1){
								
								$revisions_query = $GLOBALS['wpdb']->prepare($revisions_query_text,$posts_results[$aij]->ID);
								$revisions_results = $GLOBALS['wpdb']->get_results($revisions_query);
								
                                #function-profile-link.php (v1.0) (open)
                                if(1==1){
                                    
                                    #documentation (open)
                                    if(1==1){
                                        
                                        // Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
                                        // Provides complete link, link address, name, or link title.
                                        // Optionally displays image of user on hover of link.
                                        
                                    }
                                    #documentation (close)
                                    
                                    #input (open)
                                    if(1==1){
                                        
                                        $function_profileLink['id'] = 'usersext_id_'.$revisions_results[0]->post_author; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
                                        $function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
                                        
                                    }
                                    #input (close)
                                    
                                    include('#function-profile-link.php');
                                    
                                    #output (open)
                                    if(1==1){
                                        
                                        //output saved in:
                                        # $function_profileLink['link']
                                        # $function_profileLink['name_link']
                                        # $function_profileLink['name']
                                        # $function_profileLink['link_title']
                                        
                                        # $function_profileLink['status'] = 'deleted' or 'paused/suspended' or 'active'
                                        
                                    }
                                    #output (close)
                                    
                                }
                                #function-profile-link.php (v1.0) (close)
								
							}
							#revisions (close)
							
						}
						#prepare (close)
						
						echo '
						<div style="background-color:#FFD87D;border:1px solid grey;border-radius:10px;padding:10px;margin:20px 0px;">
							<a style="font-weight:bold;" href="'.get_permalink($posts_results[$aij]->ID).'">
								'.$posts_results[$aij]->post_title.'
							</a>
							
							<div style="padding-left:10px;">
								Edited on '.$function_timezone.' by '.$function_profileLink['name_link'].'
							</div>
						</div>';
					}
					#loop (close)
				echo '
				</div>
			</div>';
		}
		#last modified - wiki-home-function-content-right (close)
		
		#hashtags - wiki-home-function-content-left-bottom (open)
		if(1==1){
			echo '
			<div class="wiki-home-function-content-left-bottom">
				<div style="padding:20px 20px 0px 0px;border-top:1px solid black;margin-top:20px;">
					<b>Wiki pages with tags:</b>';
					
					$hashtags_array = array(
						'todolist',
						'towikilist',
						'discussion',
						'deactivated',
						'futureplans',
						'deprecated'
					);
					
					#loop (open)
					for($aio=0;$aio<count($hashtags_array);$aio++){
						
						echo '
						<div style="font-style:italic;font-weight:bold;text-align:center;">
							#'.$hashtags_array[$aio].'
						</div>';
						
						#loop (open)
						for($aij=0;$aij<count($posts_bytitle_results);$aij++){
							
							$hashtag_check = strpos($posts_bytitle_results[$aij]->post_content,'#'.$hashtags_array[$aio]);
							
							if($hashtag_check !== false){
								
								echo 
								'<div
									style="
										background-color:#FFD87D;
										border:1px solid grey;
										border-radius:10px;
										padding:10px;
										margin:5px;
									"
								>
									<a style="font-weight:bold;" href="'.get_permalink($posts_bytitle_results[$aij]->ID).'">
										'.$posts_bytitle_results[$aij]->post_title.'
									</a>
								</div>';
								
							}
							
						}
						#loopprepare (close)
						
					}
					#loop (close)
				echo '
				</div>
			</div>
			';
		}
		#hashtags - wiki-home-function-content-left-bottom (close)
		
	}
	#content (close)
	
}
#wiki home (close)

?>