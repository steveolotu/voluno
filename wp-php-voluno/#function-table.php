<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-table.php (v1.0) (open)
		if(1==1){
			
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
						
						$function_table['query'] = $GLOBALS['wpdb']->prepare(
							'SELECT *
							FROM 4df5ukbnn5p3t817_volun_example_mysqltable
							WHERE example_col = "example_main";'
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
						
						#columns (open)
						if(1==1){
							
							$function_table['data'][$ajl]['email'] = $function_table['results'][$ajl]->user_email_address;
							$function_table['data'][$ajl]['id'] = $function_table['results'][$ajl]->user_id;
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
					
					$function_table['unique id'] = 'nezjvoa7m7gqq7f';
					// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
					
					#Options connected to the title (open)
					if(1==1){
						
						$function_table['display title'] = 'Please add a title.';
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
								'width'			 => '5%' // See 2 rows above.
							),
							array(
								'heading'		 => 'Email',
								'width'			 => '50%',
								'sorting option' => 'email'
							),
							array(
								'heading'		 => 'User ID',
								'width'			 => '45%',
								'sorting option' => 'id'
							)
						);
						
						//Optionally, you can choose one of the above columns to be the default sorting option.
						// If you don't want this, please delete or hide the entire array.
						$function_table['default ordering']
						= array(
							'column' => 'email', // Colum name. In the example, 'email' or 'id'.
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
					
					#2 email (open) //example
					if(1==1){
						
						$function_table['table rows'] .= '
						<td>
							The user email is:
							<span style="color:green">
								'.$function_table['data'][$abs]['email'].'
							</span>
						</td>
						';
						
					}
					#2 email (close)
					
					#3 id (open) //example
					if(1==1){
						
						$function_table['table rows'] .= '
						<td>
							'.$function_table['data'][$abs]['id'].'
						</td>
						';
						
					}
					#3 id (close)
					
					$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
				} //Don't touch this. 
				#Cells/Columns (close)
				
			}
			#design (close)
			
			$function_table['part'] = 2; //Don't touch this. 
			include('#function-table.php'); //Don't touch this. 
			
			#output (open)
			if(1==1){
				
				#echo $function_table['output table'];
				
			}
			#output (close)
			
		}
		#function-table.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.09.19, Steve
		## Last format and structure check: 2016.09.19, Steve
		## Last update of all instances this function is used: 2016.09.19, Steve
		
		# This function takes data which for a table and displays the data in the following way:
		# - There is a table title.
		# - Each columns has a heading.
		# - The rows have alternating background colors and all table components are automatically formatted.
		# - The table can be sorted by different columns in ascending or descending order. ///10
		# - There is a pagination menu below the table, as well as a selection of 'items per page'.
        
		// Sorry, but documenting this would take a lot of effort, so I (Steve Olotu) have skipped it. To understand this function,
		// you need to go through the code anyway. There are no shortcuts. It's really complex. Thus, in practice, I will probably be the only
		// one ever modifying this function. Below is the beginning of an old attempt of documenting this function.
		// If you really want to understand this function, please just contact me, I will be happy to explain it.
		//
        // ORDERING
        // First of all, please note that the words 'sorting' and 'ordering' are used as synonyms across this file, so please don't be confused.
        // If the user clicks on a sorting arrow,
        //     see class: voluno_fuction-table_sorting-arrow_descending' voluno_fuction-table_sorting-arrow_ascending ///1-2,
        // jQuery ///5-6 alters and submits a hidden form. ///3-4
        // If sorting is not deactivated (by hiding column titles) and there is a expected $_POST data, ///7
        // the $_POST data is sanitized and then inserted into the database. ///8
        //     The post data is:
        //         - ['voluno_function-table_sorting_column-num-input16872192071268194671']=> string(1) '3' (0-number of cols)
        //         - ['voluno_function-table_sorting_column-direction-input16872192071268194671']=> string(9) 'ascending' (or descending)
        // 
        //
        //                'fi4l3fg_voluno_personal_settings',
        //                array(
        //                    'pers_settings_value' => $function_table['internal']['mysql_sorting_direction'],
        //                    'pers_settings_general' => 'table-function settings',
        //                    'pers_settings_specific' => $function_table['unique id'],
        //                    
        //                    'pers_settings_content_text' => $function_table['internal']['mysql_sorting_direction'],
        //                    'pers_settings_content_varchar1000' => 'order by',
        //                    'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
        //                ),
        //                array(
        //                    '%d','%s','%s',
        //                    '%s','%s','%s'
        //                )
		
		// Updated:
		// 01.01.2016, Steve: I made sure that the unique id is sanitized. So a unique id like "an example-text" would be converted to "an_example_text".
		
	}
	##file info (close)
	
}
#documentation (close)

#Part 1 (open
if($function_table['part'] == 1){
    
    #variable definitions (open)
    if(1==1){
        
		unset($function_table['output table']);
		
        $function_table['internal'] = $function_table; //switching from external to internal variables
        
		#sanitization of unique id (open)
		if(1==1){
			
			$function_table['internal']['unique id'] = str_replace('-','_',sanitize_title_with_dashes($function_table['internal']['unique id']));
			
		}
		#sanitization of unique id (close)
		
		//count rows of data
		$function_table['internal']['number_of_rows'] = count($function_table['internal']['data']);
		
		//prevent empty rows7
		$function_table['internal']['data'] = array_values($function_table['internal']['data']);
		
		//create array with column names
		$function_table['internal']['columns'] = array_keys($function_table['internal']['data'][0]);
		
    }
    #variable definitions (close)
    
    #style (open)
    if($GLOBALS['voluno_variables']['#function-table.php'] != 'has already been loaded'){ //only if function is loaded for first time
        
        $function_table['output']['output table'] .= '
        <style>';
            
            #table (open)
            if(1==1){
                
                $function_table['output']['output table'] .= '
                .voluno_function-table_table{
                    table-layout: fixed;
                    width:100%;
                }
                .voluno_function-table_table a{
                    cursor:pointer;
                }';
                
            }
            #table (close)
            
            #search row (open) #todolist: search option needs to be fixed updated and enhanced
            if(1==2){
                
                $function_table['output']['output table'] .= '
                .voluno_fuction-table_search-item-title-style{
                    font-weight:bold;
                    cursor:pointer;
                }
                .voluno_fuction-table_search-row-title{
                    font-size:110%;
                    cursor:pointer;
                    font-weight:bold;
                }
                ';
                
            }
            #search row (close)
            
            #column headings (open)
            if(1==1){
                
                $function_table['output']['output table'] .= '
                .voluno_fuction-table_column-headings{
                    text-align:center;
                    vertical-align:middle;
                    font-weight:bold;
                    color:white;
                    background-color:#8B0000;
                }
                .voluno_fuction-table_column-headings:hover{
                    background-color:#B30000;
                }';
                
                #sorting arrow (open)
                if(1==1){
                    
                    $function_table['output']['output table'] .= '
                    .voluno_fuction-table_sorting-arrow_ascending{
                        width:0;
                        height:0;
                        margin:auto;
                        border-style:solid;
                        border-width: 0 5px 6px 5px;
                    }
                    .voluno_fuction-table_sorting-arrow_descending{
                        width:0;
                        height:0;
                        margin: 3px auto 0 auto;
                        border-style:solid;
                        border-width:6px 5px 0 5px;
                    }';
                    
                }
                #sorting arrow (close)
                
            }
            #column headings (close)
            
            #content rows (open)
            if(1==1){
                
                $function_table['output']['output table'] .= '
                .voluno_fuction-table_content-row{
                    border-top:1px dotted grey;
                    text-align:center;
                    
                    background-color:green;
                }
				.voluno_fuction-table_content-row td{
					vertical-align:middle;
				}
                
                .voluno_fuction-table_content-row:nth-child(even)>td{
                    background-color:#FFFFFF;
                }
                .voluno_fuction-table_content-row:nth-child(odd)>td{
                    background-color:#FFF5C4;
                }
                .voluno_fuction-table_content-row:hover:nth-child(even)>td{
                    background-color:#FFC977;
                }
                .voluno_fuction-table_content-row:hover:nth-child(odd)>td{
                    background-color:#FFC977;
                }';
                
            }
            #content rows (close)
            
        $function_table['output']['output table'] .= '
        </style>';
    }
    #style (open)
    
    #table settings + hidden forms (open)
    if(1==1){
        
		#pagination and ordering settings: mysql + preparation (open)
		if(1==1){
			
			#save settings in database (open)
			if(1==1){
				
				#order and order direction (open) ///7
				if(!empty($_POST['voluno_function-table_sorting_column-num-input'.$function_table['internal']['unique id']]) AND $function_table['internal']['hide column headings'] != 'yes'){
					
					#sanitization of $_POST data (open) ///8
					if(1==1){
						
						#column name (open)
						if(1==1){
							
							//turn $_POST of column number into into positive number
							$function_table['internal']['column name for ordering'] = abs(intval($_POST['voluno_function-table_sorting_column-num-input'.$function_table['internal']['unique id']]));
							
							#validation (open)
							if($function_table['internal']['column name for ordering'] <= count($function_table['internal']['column headings'])){
								// If valid, find and store mysql column name in variable
								
								$function_table['internal']['column name for ordering']
								= $function_table['internal']['column headings'][$function_table['internal']['column name for ordering']]['sorting option'];
								
							}else{
								
								//if invalid, delete settings (use default)
								$function_table['internal']['delete ordering settings'] = 'yes';
								
							}
							#validation (close)
							
						}
						#column name (close)
						
						#order direction (open)
						if($_POST['voluno_function-table_sorting_column-direction-input'.$function_table['internal']['unique id']] == 'DESC'){
							
							$function_table['internal']['mysql_sorting_direction'] = 'DESC';
							
						}else{
							
							$function_table['internal']['mysql_sorting_direction'] = 'ASC';
							
						}
						#order direction (close)
						
					}
					#sanitization of $_POST data (close)
					
					#update personal settings (open) ///9
					if(1==1){
						
						#delete any old sorting settings (open)
						if(1==1){
							// If old ordering settings can be found, delete them. 
							
							$GLOBALS['wpdb']->delete(
								'fi4l3fg_voluno_personal_settings',
								array(
									'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id, //user id
									'pers_settings_general' => 'table-function settings', //this function
									
									'pers_settings_specific' => $function_table['unique id'], //this specific table
									'pers_settings_content_varchar1000' => 'order settings' //this specific type of setting: ordering setting
								),
								array(
									'%s','%s',
									'%s','%s'
								)
							);
							
						}
						#delete any old sorting settings (close)
						
						#insert new sorting setting (open)
						if(1==1){
							
							$function_table['internal']['delete ordering settings'] = 'yes';
							$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_personal_settings',
								array(
									'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id, //user id
									'pers_settings_general' => 'table-function settings', //this function
									'pers_settings_specific' => $function_table['unique id'], //this specific table
									
									'pers_settings_content_varchar1000' => 'order settings', //this specific type of setting: ordering setting
									'pers_settings_value' => $function_table['internal']['column name for ordering'], //column name
									'pers_settings_content_text' => $function_table['internal']['mysql_sorting_direction'], //column direction
									
									'pers_settings_date_modified' => date('Y-m-d H:i:s'),
									'pers_settings_date_created' => date('Y-m-d H:i:s')
								),
								array(
									'%s','%s','%s',
									'%s','%s','%s',
									'%s','%s'
								)
							);
							
						}
						#insert new sorting setting (close)
						
					}
					#update personal settings (close) ///9
					
				}
				#order and order direction (close)
				
				#pagination (open)
				if(1==1){
					
					#items per page (open)
					if(!empty($_POST['voluno_fuction-table_items-per-page-input'.$function_table['internal']['unique id']])){
						
						#update fi4l3fg_voluno_personal_settings -> items_per_page
							$GLOBALS['wpdb']->delete(
										'fi4l3fg_voluno_personal_settings',
									array( //location of row to delete
										'pers_settings_general' => 'table-function settings',
										'pers_settings_specific' => $function_table['unique id'], //this is probably relevant for all tables of this type, thus name, not id
										'pers_settings_content_varchar1000' => 'items per page',
										'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
									),
									array( //format of location of row to delete
										'%s',
										'%s',
										'%s',
										'%s'
									));
							
							$GLOBALS['wpdb']->insert( 
										'fi4l3fg_voluno_personal_settings', 
									array(
										'pers_settings_general' => 'table-function settings',
										'pers_settings_specific' => $function_table['unique id'],
										'pers_settings_content_varchar1000' => 'items per page',
										
										'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
										'pers_settings_value' => intval($_POST['voluno_fuction-table_items-per-page-input'.$function_table['internal']['unique id']]),
										
										'pers_settings_date_modified' => date('Y-m-d H:i:s'),
										'pers_settings_date_created' =>date('Y-m-d H:i:s')
										),
									array( 
										'%s','%s','%s',
										'%s','%d',
										'%s','%s'
										));
						
						// Whenever the 'items per page' setting is changes, go to page one.
						$function_table['internal']['new page number'] = 1;
						
					}
					#items per page (close)
					
					#current page number (open)
					if(!empty($_POST['voluno_fuction-table_page-num-input'.$function_table['internal']['unique id']]) OR $function_table['internal']['new page number'] == 1){
						
						#if page number is set by 'items per page update', then use that. Otherwise, use $_POST (open)
						if(empty($function_table['internal']['new page number'])){
							
							$function_table['internal']['new page number'] = intval($_POST['voluno_fuction-table_page-num-input'.$function_table['internal']['unique id']]);
							
						}
						#if page number is set by 'items per page update', then use that. Otherwise, use $_POST (close)
						
						#update fi4l3fg_voluno_personal_settings -> items_per_page
							$GLOBALS['wpdb']->delete(
										'fi4l3fg_voluno_personal_settings',
									array( //location of row to delete
										'pers_settings_general' => 'table-function settings',
										'pers_settings_specific' => $function_table['internal']['unique id'], //this is probably relevant for only this table, thus id not name
										
										'pers_settings_content_varchar1000' => 'page number',
										'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
									),
									array( //format of location of row to delete
										'%s','%s',
										'%s','%s'
									));
							
							$GLOBALS['wpdb']->insert( 
										'fi4l3fg_voluno_personal_settings', 
									array(
										'pers_settings_general' => 'table-function settings',
										'pers_settings_specific' => $function_table['internal']['unique id'],
										'pers_settings_content_varchar1000' => 'page number',
										
										'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
										'pers_settings_value' => $function_table['internal']['new page number'],
										
										'pers_settings_date_modified' => date('Y-m-d H:i:s'),
										'pers_settings_date_created' =>date('Y-m-d H:i:s')
										),
									array( 
										'%s','%s','%s',
										'%s','%d',
										'%s','%s'
										));
						
					}
					#current page number (close)
					
				}
				#pagination (close)
				
			}
			#save settings in database (close)
			
			#get settings from database (open)
			if(1==1){
				
				#get individual user settings from database (open)
				if(1==1){
					
					$function_table['internal']['personal_settings_query'] = $GLOBALS['wpdb']->prepare('SELECT *
																	FROM fi4l3fg_voluno_personal_settings
																	WHERE pers_settings_user_id = %s
																		AND pers_settings_general = %s
																		AND pers_settings_specific = %s
																	;'
																	,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
																	,'table-function settings'
																	,$function_table['internal']['unique id']
					);
					$function_table['internal']['personal_settings_results'] = $GLOBALS['wpdb']->get_results($function_table['internal']['personal_settings_query']);
					
				}
				#get individual user settings from database (close)
				
				#loop to separate user settings data (open)
				foreach($function_table['internal']['personal_settings_results'] as $function_table['internal']['personal_settings_result']){
					
					#ordering information (open)
					if($function_table['internal']['personal_settings_result']->pers_settings_content_varchar1000 == 'order settings'){
						
						$function_table['internal']['user_setting']['ordering']['column name'] = $function_table['internal']['personal_settings_result']->pers_settings_value;
						$function_table['internal']['user_setting']['ordering']['direction']   = $function_table['internal']['personal_settings_result']->pers_settings_content_text;
						
					}
					#ordering information (close)
					
					#items per page (open)
					if($function_table['internal']['personal_settings_result']->pers_settings_content_varchar1000 == 'items per page'){
						$function_table['internal']['items_per_page'] = $function_table['internal']['personal_settings_result']->pers_settings_value;
					}
					#items per page (close)
					
					#page number (open)
					if($function_table['internal']['personal_settings_result']->pers_settings_content_varchar1000 == 'page number'){
						$function_table['internal']['current_page'] = $function_table['internal']['personal_settings_result']->pers_settings_value;
					}
					#page number (close)
					
				}
				#loop to separate user settings data (close)
				
			}
			#get settings from database (close)
			
			#settings preparation (open)
			if(1==1){
				
				#Ordering the array (open)
				if(1==1){
					
					#Are there individual user settings? If so, use them. (open)
					if(!empty($function_table['internal']['user_setting']['ordering'])){
						// If available, use settings from database: personal settings.
						
						$function_table['internal']['order_by_column_name'] = $function_table['internal']['user_setting']['ordering']['column name'];
						$function_table['internal']['order_by_direction'] = $function_table['internal']['user_setting']['ordering']['direction'];
						
					}
					#Are there invididual user settings? If so, use them. (close)
					
					#If not, is there a valid default setting? If so, use that. (open)
					elseif(
							in_array($function_table['internal']['default ordering']['column'],$function_table['internal']['columns']) // Validate column name
						AND
							in_array(strtoupper($function_table['internal']['default ordering']['direction']),array('DESC','ASC')) // Validate sorting direction
					){
						
						$function_table['internal']['order_by_column_name'] = $function_table['internal']['default ordering']['column'];
						$function_table['internal']['order_by_direction'] = strtoupper($function_table['internal']['default ordering']['direction']);
						
					}
					#If not, is there a valid default setting? If so, use that. (close)
					
					#If there is an order setting, order the array (open)
					if(!empty($function_table['internal']['order_by_column_name'])){
						
						#get the data of the column that should be ordered (open)
						for($abs=0;$abs<count($function_table['internal']['data']);$abs++){
							
							$function_table['internal']['column-data ordered'][]
							= $function_table['internal']['data'][$abs][$function_table['internal']['order_by_column_name']];
							
						}
						#get the data of the column that should be ordered (close)
						
						#create one sorted and one unsorted version (open)
						if(1==1){
							
							$function_table['internal']['column-data unordered'] = $function_table['internal']['column-data ordered'];
							$function_table['internal']['data unsorted'] = $function_table['internal']['data'];
							
						}
						#create one sorted and one unsorted version (close)
						
						#order the order column (open)
						if($function_table['internal']['order_by_direction'] == 'ASC'){
							
							sort($function_table['internal']['column-data ordered']); //the php function 'sort' is always ascending
							
						}elseif($function_table['internal']['order_by_direction'] == 'DESC'){
							
							rsort($function_table['internal']['column-data ordered']); //the php function 'rsort' is always descending
							
						}
						#order the order column (close)
						
						#array of old vs. new row positions (open)
						for($abs=0;$abs<count($function_table['internal']['column-data ordered']);$abs++){
							
							// Find postition of value in sorted array (e.g. Friday = 5) in unsorted array (e.g. Friday = 3). Thus, this var would be '3'.
							$function_table['internal']['position of next sorted value in unsorted array']
							= array_search($function_table['internal']['column-data ordered'][$abs],$function_table['internal']['column-data unordered']);
							
							// Create an array of correct postions for the unsorted array. E.g.: Sunday = 7, Monday = 1, Friday = 5, etc.
							$function_table['internal']['ordering positions'][] = $function_table['internal']['position of next sorted value in unsorted array'];
							
							// Delete values from unsorted array that have been used. Otherwise all rows with the same values in this column will be filled
							// with the first row that has the value in this column.
							// When e.g. sorting by first name, this code ensures that the data is stored like this:
							//     1. Tom Odinga, 2. Tom Sakri, 3. Tom Sanchez <-- same first name, different other values
							// and not like this:
							//     1. Tom Odinga, 2. Tom Odinga, 3. Tom Odinga <-- only one data row, copied and replacing other data rows with same sorting value
							unset(
								$function_table['internal']['column-data unordered'][
									$function_table['internal']['position of next sorted value in unsorted array']
								]
							);
							
							
						}
						#array of old vs. new row positions (close)
						
						#assign new position to each row of data array (open)
						for($ajq=0;$ajq<count($function_table['internal']['data']);$ajq++){
							
							$function_table['internal']['data'][$ajq] = $function_table['internal']['data unsorted'][$function_table['internal']['ordering positions'][$ajq]];
							
						}
						#assign new position to each row of data array (close)
						
					}
					#If there is an order setting, order the array (close)
					
				}
				#Ordering the array (close)
				
				#pagination preparation (open)
				if(1==1){
					
					#default values (open)
					if(1==1){
						
						#items per page (open)
						if(empty($function_table['internal']['items_per_page'])){
							
							$function_table['internal']['items_per_page'] = 10;
							
						}
						#items per page (close)
						
						#page number (open)
						if(empty($function_table['internal']['current_page'])){
							
							$function_table['internal']['current_page'] = 1;
							
						}
						#page number (close)
						
						#$amount_of_items = count($function_table['internal']['data']);
						
						#$function_table['internal']['pagination_lower_limit']
						#$function_table['internal']['pagination_upper_limit']
						
						
						
					}
					#default values (close)
					
					### please name this
					$function_table['internal']['pagination_upper_limit'] = $function_table['internal']['current_page'] * $function_table['internal']['items_per_page'];
					#start with item (close)
					
					$function_table['internal']['pagination_lower_limit'] = $function_table['internal']['pagination_upper_limit'] - $function_table['internal']['items_per_page'];
					#start with item (close)
	
					#$function_table['internal']['data full'] = $function_table['internal']['data'];
					
					#unset($function_table['internal']['data']);
					
					#remove items from array which are outside of current pagination view (open)
					#for($ajq=0;$ajq<count($function_table['internal']['data full']);$ajq++){
						
						#if($ajq<$function_table['internal']['pagination_upper_limit'] AND $ajq>=$function_table['internal']['pagination_lower_limit']){
							
							#$function_table['internal']['data'][] = $function_table['internal']['data full'][$ajq];
							
						#}
						
					#}
					#remove items from array which are outside of current pagination view (close)
					
					
					#$function_table['internal']['data']
					
	
					
				}
				#pagination preparation (close)
				
			}
			#settings preparation (close)
			
		}
		#pagination and ordering settings: mysql + preparation (close)
		
        #hide or show on load (open) ///done
        if($function_table['internal']['show on load'] == 'no' AND !empty($function_table['internal']['display title'])){
            $function_table['internal']['show on load'] = 'display:none;';
        }else{
            unset($function_table['internal']['show on load']);
        }
        #hide or show on load (close)
        
        #hidden form for settings (open) ///3
        if(1==1){
            
            $function_table['output']['output table'] .= '
            <form class="voluno_function-table_hidden-form'.$function_table['internal']['unique id'].'" method="post" action="'.add_query_arg(NULL,NULL).'">';
                
                #ordering of table (open) ///4
                if($function_table['internal']['hide column headings'] != 'yes'){
                    $function_table['output']['output table'] .= '
                    <input
                        class="voluno_function-table_sorting_column-num-input'.$function_table['internal']['unique id'].'"
                        name="voluno_function-table_sorting_column-num-input'.$function_table['internal']['unique id'].'"
                        value=""
                        type="hidden"
                    >
                    <input
                        class="voluno_function-table_sorting_column-direction-input'.$function_table['internal']['unique id'].'"
                        name="voluno_function-table_sorting_column-direction-input'.$function_table['internal']['unique id'].'"
                        value=""
                        type="hidden"
                    >';
                }
                #ordering of table (close)
                
                #pagination (open)
                if(1==1){
                    
                    $function_table['output']['output table'] .= '
                    <input
                        class="voluno_fuction-table_items-per-page-input'.$function_table['internal']['unique id'].'"
                        name="voluno_fuction-table_items-per-page-input'.$function_table['internal']['unique id'].'"
                        value=""
                        type="hidden"
                    >
                    <input
                        class="voluno_fuction-table_page-num-input'.$function_table['internal']['unique id'].'"
                        name="voluno_fuction-table_page-num-input'.$function_table['internal']['unique id'].'"
                        value=""
                        type="hidden"
                    >';
                    
                }
                #pagination (close)
                
            $function_table['output']['output table'] .= '
            </form>';
            
        }
        #hidden form for settings (close)
        
    }
    #table settings + hidden forms (close)
    
    #content area 1 (open)
    if(1==1){
        
        $function_table['output']['output table'] .= '
        <div class="voluno_function-table_table_container">
            <table class="voluno_function-table_table">';
                
                #overall table title (thead) (open)
                if(!empty($function_table['internal']['display title'])){
                    
                    #title format (open)
                    if(empty($function_table['internal']['title format'])){
                        //this will be wrapped around the table title.
                        
                        $function_table['internal']['title format'] = array('<h4>','</h4>');
                        
                    }
                    #title format (close)
                    
                    #display number of results (open)
                    if($function_table['internal']['display number of results'] == 'no'){
                        
                        unset($function_table['internal']['display number of results']);
                        
                    }else{
                        
                        $function_table['internal']['display number of results'] = ' ('.$function_table['internal']['number_of_rows'].')';
                        
                    }
                    #display number of results (close)
                    
                    $function_table['output']['output table'] .= '
                    <thead>
                        <tr>
                            <td colspan="'.count($function_table['internal']['columns']).'" style="text-align:center;">
                                '.$function_table['internal']['title format'][0].'
                                    <a style="cursor:pointer;" class="voluno_fuction-table_show-table-link'.$function_table['internal']['unique id'].'">
                                        '.$function_table['internal']['display title'].$function_table['internal']['display number of results'].'
                                    </a>
                                '.$function_table['internal']['title format'][1].'
                            </td>
                        </tr>
                    </thead>';
                }
                #overall table title (thead) (close)
                
                #search row, if activated (open)
                if($function_table['search_row_activate'] == 'yes'){
                    $function_table['output']['output table'] .= '
                    <tbody class="voluno_fuction-table_list" style="'.$function_table['internal']['show on load'].'">
                        <tr
                            style="
                                background-color:#8B0000;
                                text-align:center;
                                vertical-align:middle;
                                color:white;
                            "
                            class="voluno_fuction-table_column-headings"
                        >
                            <td colspan="'.count($function_table['internal']['column headings']).'">
                                <span class="voluno_fuction-table_search-row-link voluno_fuction-table_search-row-title">
                                    '.$function_table['internal']['search_row_title'].'
                                </span>
                            </td>
                        </tr>
                        <tr class="voluno_fuction-table_search-row" style="display:none;">
                            <td colspan="'.count($function_table['internal']['column headings']).'">';
                                $function_table['internal']['search_row_content'] = "here";
                                #include("#function-table-of-g od#".sanitize_title($function_table['unique id']).".php");
                            $function_table['output']['output table'] .= '
                            </td>
                        </tr>
                    </tbody>';
                }
                #search row, if activated (close)
                
            $function_table['output']['output table'] .= '
            </table>';
            
            #column titles + main content rows container (open)
            if(1==1){
                $function_table['output']['output table'] .= '
                <table class="voluno_function-table_table">
                    <tbody class="voluno_fuction-table_list" style="'.$function_table['internal']['show on load'].'">';
                        
                        #column title row (open)
                        if(1==1){
                            
                            $function_table['output']['output table'] .= '
                            <tr style="height:1px;overflow:hidden;">';
                                
                                #td loop (open)
                                for($ajl=0;$ajl<count($function_table['internal']['column headings']);$ajl++){
                                    
                                    #hide headings (open)
                                    if($function_table['hide column headings'] == 'yes'){
                                       
                                        $function_table['output']['output table'] .= '
                                        <td style="width:'.$function_table['internal']['column headings'][$ajl]['width'].'%;height:1px;">'.
                                        '</td>';
                                        
                                    }
                                    #hide headings (close)
                                    
                                    #show headings (open)
                                    else{
                                        
                                        $function_table['output']['output table'] .= '
                                        <td
                                            style="width:'.$function_table['internal']['column headings'][$ajl]['width'].';"
                                            class="voluno_fuction-table_column-headings"
                                        >';
                                            
                                            #preparation: oder by this column? (selected) (open)
                                            if($function_table['internal']['order_by_column_name'] == $function_table['internal']['column headings'][$ajl]['sorting option']){
                                                
                                                $function_table['internal']['column_title_color_text'] = '#FFC977';
                                                if($function_table['internal']['order_by_direction'] == 'DESC'){
                                                    $function_table['internal']['column_title_color_desc'] = '#FFC977';
                                                }else{
                                                    $function_table['internal']['column_title_color_asc'] = '#FFC977';
                                                }
                                                
                                            }else{
                                                
                                                $function_table['internal']['column_title_color_text'] = '#fff';
                                                $function_table['internal']['column_title_color_asc'] = '#fff';
                                                $function_table['internal']['column_title_color_desc'] = '#fff';
                                                
                                            }
                                            #preparation: oder by this column? (selected) (close)
                                            
                                            #content (open)
                                            if(1==1){
                                                
                                                #sorting ascending arrow (open) ///1
                                                if(!empty($function_table['internal']['column headings'][$ajl]['sorting option'])){
                                                    $function_table['output']['output table'] .= '
                                                    <a class="voluno_fuction-table_order-link'.$function_table['internal']['unique id'].'">
                                                        <div
                                                            style="border-color: transparent transparent '.$function_table['internal']['column_title_color_asc'].' transparent;";
                                                            class="voluno_fuction-table_sorting-arrow_ascending"
                                                            title="Click to sort by this column in ascending order"
                                                        >
                                                            <span class="voluno_fuction-table_order-column-direction'.$function_table['internal']['unique id'].'" style="display:none;">'.
                                                                'ASC'.
                                                            '</span>
                                                        </div>
                                                    </a>
                                                    <span class="voluno_fuction-table_order-column-num'.$function_table['internal']['unique id'].'" style="display:none;">'.
                                                        $ajl.
                                                    '</span>
                                                    <a
                                                        title="Click to sort by this column"
                                                        class="voluno_fuction-table_order-link'.$function_table['internal']['unique id'].'"
                                                    >
                                                    ';
                                                }
                                                #sorting ascending arrow (close)
                                                
                                                #heading text (open)
                                                if(1==1){
                                                    $function_table['output']['output table'] .= '
                                                    <div style="color:'.$function_table['internal']['column_title_color_text'].';">
                                                        '.$function_table['internal']['column headings'][$ajl]['heading'].'
                                                    </div>';
                                                }
                                                #heading text (close)
                                                
                                                #sorting descending arrow (open) ///2
                                                if(!empty($function_table['internal']['column headings'][$ajl]['sorting option'])){
                                                    $function_table['output']['output table'] .= '
                                                    </a>
                                                    <a class="voluno_fuction-table_order-link'.$function_table['internal']['unique id'].'">
                                                        <div
                                                            style="border-color:'.$function_table['internal']['column_title_color_desc'].' transparent transparent transparent;";
                                                            class="voluno_fuction-table_sorting-arrow_descending"
                                                            title="Click to sort by this column in descending order"
                                                        >
                                                            <span class="voluno_fuction-table_order-column-direction'.$function_table['internal']['unique id'].'" style="display:none;">'.
                                                                'DESC'.
                                                            '</span>
                                                        </div>
                                                    </a>';
                                                }
                                                #sorting descending arrow (close)
                                                
                                            }
                                            #content (close)
                                            
                                        $function_table['output']['output table'] .= '
                                        </td>';
                                        
                                    }
                                    #show headings (close)
                                    
                                }
                                #td loop (close)
                                
                            $function_table['output']['output table'] .= '
                            </tr>';
                            
                        }
                        #column title row (close)
                        
                        #content rows (open)###old
                        if(1==1){ #count($function_table['internal']['data']) != 0){
                            
                            $function_table['internal']['row_counter'] = 0; /// #todolist: is this actually used?
                            
                            #loop for each tr (open)
                            #for($abr=0;$abr<$function_table['internal']['number_of_rows'];$abr++){
                                
                                #if there are more rows per page selected than items, stop loop (open) (###old) #todolist: delete this
                                #if(empty($function_table['internal']['results final'][$abr]->tog_name)){
                                #    break;
                                #}
                                #if there are more rows per page selected than items, stop loop (close)
                                
                            #}
                            #loop for each tr (close)
                            
                            #content (open)
                            if(1==1){
                                
                                $function_table['internal']['row open'] = '
                                <tr class="voluno_fuction-table_content-row">';
                                
                                $function_table['internal']['row close'] = '
                                </tr>';
                                
                            }
                            #content (close)
                            
                        }
                        #content rows (close)
                        
                    #tbody is closed in part 2
                #table is closed in part 2
            }
            #column titles + main content rows container (close)
            
    }
    #content area 1 (close)
    
    #transformation of internal variable to external variable (open)
    if(1==1){
        
        $function_table['row open'] = $function_table['internal']['row open'];
        $function_table['row close'] = $function_table['internal']['row close'];
        
        $function_table['number_of_rows'] = $function_table['internal']['number_of_rows'];
        $function_table['data'] = $function_table['internal']['data'];
        
        $function_table['pagination_lower_limit'] = $function_table['internal']['pagination_lower_limit'];
        $function_table['pagination_upper_limit'] = $function_table['internal']['pagination_upper_limit'];
        
    }
    #transformation of internal variable to external variable (close)
    
}
#Part 1 (close)

#Part 2 (open)
if($function_table['part'] == 2){
    
    $function_table['output']['output table'] .= $function_table['table rows'];
    
    #content area 2 (open)
    if(1==1){
        
        #pagination (open)
        if(1==1){
            #table is opened in part 1
                #table is opened in part 1
                    
                    #pagination cell / row (open)
                    if(1==1){ #$function_table['internal']['number_of_rows'] > 5){ #todolist: what is this? delete it!
                        $function_table['output']['output table'] .= '
                        <tr>
                            <td
                                style="text-align:center;border-top:1px dotted grey;"
                                colspan="'.count($function_table['internal']['column headings']).'"
                            >';
                                
                                #preparation (open)
                                if(1==1){
                                    
                                    $function_table['internal']['pagination last'] = ceil($function_table['internal']['number_of_rows']/$function_table['internal']['items_per_page']);
                                    $function_table['internal']['pagination first'] = 1;
                                    $function_table['internal']['pagination next'] = $function_table['internal']['current_page']+1;
                                    $function_table['internal']['pagination previous'] = $function_table['internal']['current_page']-1;
                                    
                                    #array preparation (open)
                                    if(1==1){
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = 'thematic';
                                                $function_propic__original_img_name = 'voluno_img_3521.png';
                                                $function_propic__cropping = 'yes'; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                                $function_propic__rotate = 180; //optional, default: 0
                                            include('#function-image-processing.php');
                                            $function_table['internal']['img_previous_first'] = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = 'thematic';
                                                $function_propic__original_img_name = 'voluno_img_3532.png';
                                                $function_propic__cropping = 'yes'; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                                $function_propic__rotate = 180; //optional, default: 0
                                            include('#function-image-processing.php');
                                            $function_table['internal']['img_previous_one'] = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = 'thematic';
                                                $function_propic__original_img_name = 'voluno_img_3521.png';
                                                $function_propic__cropping = 'yes'; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                            include('#function-image-processing.php');
                                            $function_table['internal']['img_next_last'] = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = 'thematic';
                                                $function_propic__original_img_name = 'voluno_img_3532.png';
                                                $function_propic__cropping = 'yes'; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                            include('#function-image-processing.php');
                                            $function_table['internal']['img_next_one'] = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #pagination button status (open)
                                        if(1==1){
                                            if($function_table['internal']['current_page'] > $function_table['internal']['pagination first']){
                                                $function_table['internal']['status_previous'] = 'active';
                                            }else{
                                                $function_table['internal']['status_previous'] = 'inactive';
                                            }
                                            if($function_table['internal']['current_page'] < $function_table['internal']['pagination last']){
                                                $function_table['internal']['status_next'] = 'active';
                                            }else{
                                                $function_table['internal']['status_next'] = 'inactive';
                                            }
                                        }
                                        #pagination button status (close)
                                        
                                    }
                                    #array preparation (close)
                                    
                                    #array (open)
                                    if(1==1){
                                        
                                        $function_table['internal']['pagination array'] = array(
                                            #go back
                                            array(
                                                #first page
                                                array(
                                                    'text' => 'First page'
                                                    ,'image' => $function_table['internal']['img_previous_first']
                                                    ,'page_number' => $function_table['internal']['pagination first']
                                                )
                                                #one back
                                                ,array(
                                                    'text' => 'Previous page'
                                                    ,'image' => $function_table['internal']['img_previous_one']
                                                    ,'page_number' => $function_table['internal']['pagination previous']
                                                )
                                                ,'status' => $function_table['internal']['status_previous']
                                            ),
                                            #go forwad
                                            array(
                                                #one forward
                                                array(
                                                    'text' => 'Next page'
                                                    ,'image' => $function_table['internal']['img_next_one']
                                                    ,'page_number' => $function_table['internal']['pagination next']
                                                )
                                                #last page
                                                ,array(
                                                    'text' => 'Last page'
                                                    ,'image' => $function_table['internal']['img_next_last']
                                                    ,'page_number' => $function_table['internal']['pagination last']
                                                )
                                                ,'status' => $function_table['internal']['status_next']
                                            )
                                        );
                                        
                                    }
                                    #array (close)
                                    
                                    #loop (open)
                                    for($acx=0;$acx<count($function_table['internal']['pagination array']);$acx++){
                                        for($acy=0;$acy<count($function_table['internal']['pagination array'][$acx])-1;$acy++){
                                            
                                            #status (open)
                                            if($function_table['internal']['pagination array'][$acx]['status'] == 'active'){
                                                $function_table['internal']['pagination link_opening'] = '<a class="voluno_fuction-table_page-num-link'.$function_table['internal']['unique id'].'">';
                                                $function_table['internal']['pagination link_closing'] = '</a>';
                                                
                                                #page number for jquery (open)
                                                if(1==1){
                                                    $function_table['internal']['pagination page_number_for_jquery'] = '
                                                    <span
                                                        class="voluno_fuction-table_page-num'.$function_table['internal']['unique id'].'"
                                                        style="display:none;"
                                                    >'.
                                                        $function_table['internal']['pagination array'][$acx][$acy]['page_number'].
                                                    '</span>';
                                                }
                                                #page number for jquery (close)
                                                
                                                $function_table['internal']['hover_div_class'] = 'voluno_button';
                                            }else{
                                                unset(
                                                    $function_table['internal']['pagination link_opening']
                                                    ,$function_table['internal']['pagination page_number_for_jquery']
                                                    ,$function_table['internal']['pagination link_closing']
                                                );
                                                
                                                $function_table['internal']['hover_div_class'] = 'voluno_button_inactive';
                                            }
                                            #status (close)
                                            
                                            $function_table['internal']['pagination output'][$acx] .=
                                            $function_table['internal']['pagination link_opening'].'
                                                <div class="'.$function_table['internal']['hover_div_class'].'" style="margin:3px;padding:10px;vertical-align:middle;">
                                                    '.$function_table['internal']['pagination page_number_for_jquery'].'
                                                    <img src="'.$function_table['internal']['pagination array'][$acx][$acy]['image'].'">
                                                    <br>
                                                    '.$function_table['internal']['pagination array'][$acx][$acy]['text'].'
                                                </div>
                                            '.$function_table['internal']['pagination link_closing'];
                                            
                                        }
                                    }
                                    #loop (close)
                                    
                                    #thin pagination menu (open)
                                    if($function_table['internal']['thin_pagination'] == 'yes'){
                                        
                                        $function_table['internal']['thin_pagination div_open'] = '<div>';
                                        $function_table['internal']['thin_pagination div_close'] = '</div>';
                                        
                                    }else{
                                        unset(
                                            $function_table['internal']['thin_pagination div_open']
                                            ,$function_table['internal']['thin_pagination div_close']
                                        );
                                    }
                                    #thin pagination menu (close)
                                    
                                }
                                #preparation (close)
                                
                                #content (open)
                                if(1==1){
                                    
                                    $function_table['output']['output table'] .=
                                    $function_table['internal']['thin_pagination div_open'].
                                    $function_table['internal']['pagination output'][0]. //go back
                                    $function_table['internal']['thin_pagination div_close'];
                                    
                                    #page x of X section (open)
                                    if(1==1){
                                        
                                        $function_table['output']['output table'] .= '
                                        <div style="vertical-align:middle;text-align:center;display:inline-block;margin:10px;">
                                            Page '.
                                            $function_table['internal']['current_page'].
                                            ' of '.
                                            $function_table['internal']['pagination last'].'
                                            ('.$function_table['internal']['number_of_rows'];
                                            if($function_table['internal']['number_of_rows'] == 1){
                                                $function_table['output']['output table'] .= '
                                                item)';
                                            }else{
                                                $function_table['output']['output table'] .= '
                                                items)';
                                            }
                                            
                                            if(current_user_can('manage_options')){
                                                $function_table['internal']['items_per_page available_options_array'] =
                                                        array(5,10,50,100,500,1000,$function_table['internal']['number_of_rows']);
                                            }else{
                                                $function_table['internal']['items_per_page available_options_array'] =
                                                        array(5,10,50,100,500,1000);
                                            }
                                            
                                            for($ajl=0;$ajl<count($function_table['internal']['items_per_page available_options_array']);$ajl++){
                                                if($function_table['internal']['number_of_rows']<$function_table['internal']['items_per_page available_options_array'][$ajl]){
                                                    continue;
                                                }
                                                if($ajl==0){
                                                    $function_table['output']['output table'] .= '
                                                    <br>
                                                    Items per page:';
                                                }
                                                if($function_table['internal']['items_per_page'] == $function_table['internal']['items_per_page available_options_array'][$ajl]){
                                                    $function_table['internal']['items_per_page available_options_array_select_style'] = 'style="font-weight:bold;font-size:120%;"';
                                                }else{
                                                    $function_table['internal']['items_per_page available_options_array_select_style'] = '';
                                                }
                                                $function_table['output']['output table'] .= '
                                                <a
                                                    '.$function_table['internal']['items_per_page available_options_array_select_style'].'
                                                    class="voluno_fuction-table_items-per-page-link'.$function_table['internal']['unique id'].'"
                                                >'.
                                                    $function_table['internal']['items_per_page available_options_array'][$ajl].
                                                '</a>';
                                            }
                                        $function_table['output']['output table'] .= '
                                        </div>';
                                        
                                    }
                                    #page x of X section (close)
                                    
                                    $function_table['output']['output table'] .=
                                    $function_table['internal']['thin_pagination div_open'].
                                    $function_table['internal']['pagination output'][1]. //go forward
                                    $function_table['internal']['thin_pagination div_close'];
                                    
                                }
                                #content (close)
                            
                            $function_table['output']['output table'] .= '
                            </td>
                        </tr>';
                    }
                    #pagination cell / row (close)
                    
                    #if no results available (open)
                    if($function_table['internal']['number_of_rows'] == 0){
                        $function_table['output']['output table'] .= '
                        <tr>
                            <td colspan="'.count($function_table['internal']['column headings']).'" style="text-align:center;padding:30px;">';
                                
                                if($function_table['number_of_all_results'] != 0){
                                    
                                    if($function_table['number_of_all_results'] > 1){
                                        $plural = 'items were';
                                    }else{
                                        $plural = 'item was';
                                    }
                                    $function_table['output']['output table'] .= '
                                    <div style="height:1px;border-bottom:1px dashed #8B0000;text-align:center">
                                        <div
                                            style="
                                                background-color:#fff;
                                                position:relative;
                                                top:-1.5em;
                                                display:inline-block;
                                                padding:0px 10px;
                                            "
                                        >
                                            Unfortunately, there are no items which match your search criteria.
                                            <br>
                                            '.$function_table['number_of_all_results'].' '.$plural.' excluded from this search.
                                            <br>
                                            You could either wait for new items or relax your search criteria.
                                        </div>
                                    </div>';
                                }else{
                                    
                                    if(empty($function_table['internal']['no_items_available_message']['content'])){
                                        $function_table['internal']['no_items_available_message']['content'] = 'There are currently no items available.';
                                    }elseif($function_table['internal']['no_items_available_message']['content'] == 'none'){
                                        unset($function_table['internal']['no_items_available_message']['content']);
                                    }
                                    if($function_table['internal']['no_items_available_message']['lines'] != 'no'){
                                        $function_table['internal']['no_items_available_message']['lines_internal'] = 'border-bottom:1px dashed #8B0000;';
                                    }
                                    
                                    $function_table['output']['output table'] .= '
                                    <div style="height:1px;'.$function_table['internal']['no_items_available_message']['lines_internal'].'text-align:center">
                                        <div
                                            style="
                                                background-color:#fff;
                                                position:relative;
                                                top:-0.5em;
                                                display:inline-block;
                                                padding:0px 10px;
                                            "
                                        >
                                            '.$function_table['internal']['no_items_available_message']['content'].'
                                        </div>
                                    </div>';
                                }
                                
                            $function_table['output']['output table'] .= '
                            </td>
                        </tr>';
                    }
                    #if no results available (close)
                    
                $function_table['output']['output table'] .= '
                </tbody>
            </table>';
        }
        #pagination (close)
        
		$function_table['output']['output table'] .= '
		</div>';
        
    }
    #content area 2 (close)
    
    #jquery (open) ///5
    if(1==1){
        
        $function_table['output']['output table'] .= '
        <script>
            jQuery(document).ready(function(){';
                
                #order links (submit hidden form) (open) ///6
                if(1==1){
                    
                    $function_table['output']['output table'] .= '
                    jQuery(".voluno_fuction-table_order-link'.$function_table['internal']['unique id'].'").click(function(){
                        
                        var voluno_fuctiontable_var_order_col_num = "";
                        varvoluno_fuctiontable_var_order_col_dir = "";
                        
                        voluno_fuctiontable_var_order_col_num'.
                            ' = jQuery(this).parent().find(".voluno_fuction-table_order-column-num'.$function_table['internal']['unique id'].'").html();
                        voluno_fuctiontable_var_order_col_dir'.
                            ' = jQuery(this).find(".voluno_fuction-table_order-column-direction'.$function_table['internal']['unique id'].'").html();
                        
                        jQuery(".voluno_function-table_sorting_column-num-input'.$function_table['internal']['unique id'].'").val(voluno_fuctiontable_var_order_col_num);
                        jQuery(".voluno_function-table_sorting_column-direction-input'.$function_table['internal']['unique id'].'").val(voluno_fuctiontable_var_order_col_dir);
                        
                        jQuery(".voluno_function-table_hidden-form'.$function_table['internal']['unique id'].'").submit();
                        
                    });';
                    
                }
                #order links (submit hidden form) (close)
                
                #pagination links (submit hidden form) (open)
                if(1==1){
                    
                    $function_table['output']['output table'] .= '
                    jQuery(".voluno_fuction-table_items-per-page-link'.$function_table['internal']['unique id'].'").click(function(){
                        
                        var voluno_fuctiontable_items_per_page = jQuery(this).html();
                        jQuery(".voluno_fuction-table_items-per-page-input'.$function_table['internal']['unique id'].'").val(voluno_fuctiontable_items_per_page);
                        jQuery(".voluno_function-table_hidden-form'.$function_table['internal']['unique id'].'").submit();
                        
                    });
                    
                    jQuery(".voluno_fuction-table_page-num-link'.$function_table['internal']['unique id'].'").click(function(){
                        
                        var voluno_fuctiontable_page_num = jQuery(this).find(".voluno_fuction-table_page-num'.$function_table['internal']['unique id'].'").html();
                        jQuery(".voluno_fuction-table_page-num-input'.$function_table['internal']['unique id'].'").val(voluno_fuctiontable_page_num);
                        jQuery(".voluno_function-table_hidden-form'.$function_table['internal']['unique id'].'").submit();
                        
                    });
                    ';
                    
                }
                #pagination links (submit hidden form) (close)
                
                #extend table on click on title (open)
                if(1==1){
                    $function_table['output']['output table'] .= '
                    jQuery(".voluno_fuction-table_show-table-link'.$function_table['internal']['unique id'].'").click(function(){
                        jQuery(this).closest(".voluno_function-table_table_container").find(".voluno_fuction-table_list").fadeToggle(300);
                    });';
                }
                #extend table on click on title (close)
                
                #toggle search area (open)
                if($GLOBALS['voluno_variables']['#function-table.php'] == 'has already been loaded'){
                    $function_table['output']['output table'] .= '
                    jQuery(".voluno_fuction-table_search-row-link").click(function(){
                        jQuery(this).parent().parent().parent().find(".voluno_fuction-table_search-row").toggle();
                    });';
                }
                #toggle search area (close)
                
            $function_table['output']['output table'] .= '
            });
        </script>';
        
    }
    #jquery (close)
    
    #output and final operations (open)
    if(1==1){
		
        $function_table = $function_table['output'];
        
        $GLOBALS['voluno_variables']['#function-table.php'] = 'has already been loaded';
        
    }
    #output and final operations (close)
    
}
#Part 2 (close)

?>