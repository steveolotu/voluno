<?php

#documentation (open)
if(0!=0){
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.10.25, Steve
		## Last format and structure check: 2016.10.25, Steve
		
		# Displays all people associated with a respective NGO: Staff and agents.
		# Part of NGO profile.
		
		// Is the NGO ID valid? If not, redirect to list of all members and NGOs. ///1
		// Edit page title to reflect specific NGO name. ///2
		// ///1 and ///2 are both standard for all NGO profile subpages.
		// Default NGO profile heading ///3
		// Table of people. ///4
		
	}
	##file info (close)
	
}
#documentation (close)

#validation: does ngo exist? (open)
if(1==1){ ///1
	
	$ngo_id = $_GET['ngo'];
	
	$does_ngo_exist_query = $GLOBALS['wpdb']->prepare('SELECT *
		FROM fi4l3fg_voluno_development_organizations
		WHERE ngo_id = %d
			AND ngo_status = "";'
		,$ngo_id);
	$does_ngo_exist_row = $GLOBALS['wpdb']->get_row($does_ngo_exist_query);
	
	#function-redirect.php (v1.0) (open)
	if(1==1){
		
		#documentation (open)
		if(1==1){
			
			// Redirects to another page. Prevents further loading of content.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_redirect['redirect_url'] = get_permalink(689);// url to redirect to. If none is given, homepage is used.
			
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
if(1==1){ ///2
	
	echo '
	<script>
		jQuery(document).ready(function(){';
			
			#update browser title (my profile -> name) (open)
			if(1==1){
				
				echo '
				jQuery(document).attr("title", "Voluno | '.$ngo_row->ngo_name.' (People)");';
				
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
	if(1==1){ ///3
		$function_pers_pages_id = 5;
		$function_pers_pages_active_page = "People";
		include("#function-personal-pages.php");
		echo $function_pers_pages;
		#output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
	}
	#function-personal-pages.php (v1.0) (close)
	
	#title table (open)
	if(1==1){ ///3
		
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
									Staff and agents
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
								<img
									class="ngo_logo voluno_brighter_on_hover"
									src="'.$function_propic.'"
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

	#function-table.php (v1.0) (open)
	if(1==1){ ///4
		
		#documentation (open)
		if(1==1){
			
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
			// important elements, especially those maked with the comment: ' //Don't touch this.'                
		}
		#documentation (close)
		
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
					
					#function-ngo-users.php (v1.0) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Generates a multidimensional array of NGO staff members and agents of a specific NGO.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_ngoUsers['ngo id'] = 4;// Obligatory. The id of the NGO.
							#$function_ngoUsers['developer info'] = 'yes';// Information for developers on what the function will output.
							
						}
						#input (close)
						
						include('#function-ngo-users.php');
						
						#output (open)
						if(1==1){
							
							# The function outputs the following array:
							#
							# 	$function_ngoUsers['output array']
							#
							# array(5) { //for each member. If a member has more than one position, the positions are imploded into one long string.
							#	[0]=> array(4) {
							#		["user_position_nice_display"]=>  "NGO Worker"
							#		["user_position_nice_display_title"]=> "NGO Workers can use Voluno's NGO services."
							#		["user_display_name"]=> "Example User"
							#		["user_id"]=> "123"
							#	}
							#	...
							# }
							
						}
						#output (close)
						
					}
					#function-ngo-users.php (v1.0) (close)
					
					$function_table['results'] = $function_ngoUsers['output array'];
					
					
				}
				#data preparation and creation (close)
				
				#inserting the data into the data array (open)
				for($ajl=0;$ajl<count($function_table['results']);$ajl++){ // <- Please modify the total amount of rows to include in your table.
					
					// This loop iterates through each row of data.
					// If you didn't use the default query, please modify the amount of rows in the above loop.
					
					// In the following brackets, please add one line for each column that you want to add to the mysql table.
					// In the following example, user data is inserted (column names are imaginary, just to illustrate).
					
					#columns (open)
					if(1==1){
						
						$function_table['data'][$ajl]['user_display_name'] = $function_table['results'][$ajl]['user_display_name'];
						$function_table['data'][$ajl]['user_id'] = $function_table['results'][$ajl]['user_id'];
						$function_table['data'][$ajl]['user_position_nice_display'] = $function_table['results'][$ajl]['user_position_nice_display'];
						$function_table['data'][$ajl]['user_position_nice_display_title'] = $function_table['results'][$ajl]['user_position_nice_display_title'];
						
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
				
				$function_table['unique id'] = 'ngo profile people ttfuzgzj';
				// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
				
				#Options connected to the title (open)
				if(1==1){
					
					#$function_table['display title'] = 'List of all Voluno members associated with '.$does_ngo_exist_row->ngo_name;
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
							'heading'         => '#', // See 1 row above.
							'width'             => '5%' // See 2 rows above.
						),
						array(
							'heading'         => 'User',
							'width'             => '50%',
							'sorting option' => 'user_display_name'
						),
						array(
							'heading'         => 'Position',
							'width'             => '45%',
							'sorting option' => 'user_position_pure'
						)
					);
					
					//Optionally, you can choose one of the above columns to be the default sorting option.
					// If you don't want this, please delete or hide the entire array.
					$function_table['default ordering']
					= array(
						'column' => 'user_display_name', // Colum name. In the example, 'email' or 'id'.
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
				
				#2 user display name (open)
				if(1==1){
					
					#prepare (open)
					if(1==1){
						
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
								
								$function_profileLink['id'] = $function_table['data'][$abs]['user_id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
								#$function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
								
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
						
						#function-image-processing.php (v1.0) (open)
						if(1==1){
							#profile picture
								$function_propic__type = 'profile picture';
								$function_propic__user_id = $function_table['data'][$abs]['user_id'];
							#all
								$function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
								#$function_propic__rotate = 180; //optional, default: 0
							include('#function-image-processing.php');
							# $function_propic;
							#$function_propic__image_available <- is set to yes or no
						}
						#function-image-processing.php (v1.0) (close)
						
					}
					#prepare (close)
					
					#content (open)
					if(1==1){
						
						#image available? (open)
						if($function_propic__image_available == "yes"){
							
							$ngo_person_profile_image = '
							<img
								src="'.$function_propic.'"
								class="voluno_brighter_on_hover"
								style="border-radius:10%;vertical-align:middle;border:1px solid black;"
							>
							';
							
						}else{
							
							unset($ngo_person_profile_image);
							
						}
						#image available? (close)
						
						$function_table['table rows'] .= '
						<td>
							<a
								title="'.$function_profileLink['link_title'].'"
								href="'.$function_profileLink['link'].'"
							>
								'.$ngo_person_profile_image.'
								'.$function_profileLink['name'].'
							</a>
						</td>
						';
						
					}
					#content (close)
					
				}
				#2 user display name (close)
				
				#3 position pure (open)
				if(1==1){
					
					$function_table['table rows'] .= '
					<td>
						<a title="'.$function_table['data'][$abs]['user_position_nice_display_title'].'" style="cursor:help;">
							'.$function_table['data'][$abs]['user_position_nice_display'].'
						</a>
					</td>
					';
					
				}
				#3 position pure (close)
				
				$function_table['table rows'] .= $function_table['row close']; //Don't touch this.
			} //Don't touch this.
			#Cells/Columns (close)
			
		}
		#design (close)
		
		$function_table['part'] = 2; //Don't touch this.
		include('#function-table.php'); //Don't touch this.
		
		#output (open)
		if(1==1){
			
			echo $function_table['output table'];
			
		}
		#output (close)
		
	}
	#function-table.php (v1.0) (close) 
	
}
#content (close)

?>