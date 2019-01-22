<?php

#mysql 1/2 (open)
if(1==1){

}
#mysql 1/2 (close)

#jquery (open)
if(1==1){
    
    echo '
    <script>
	jQuery(document).ready(function(){
	    
	    var count_notifications_and_update = jQuery(".top_sidebar_notification_number_class").html();
	    
	    jQuery(".top_sidebar_notification_number_class").html(count_notifications_and_update - jQuery(".unread_notifications").length);
	    
	});
    </script>';
    
}
#jquery (close)

#content (open)
if(1==1){

    #title and img (open)
    if(1==1){
	
	#preparation (open)
	if(1==1){
	    
	    #function-image-processing.php (v1.0) (open)
	    if(1==1){
		#thematic only
		    $function_propic__type = "thematic";
		    $function_propic__original_img_name = "notifications.jpg";
		#all
		    $function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
		include('#function-image-processing.php');
	    }
	    #function-image-processing.php (v1.0) (close)
	    
	}
	#preparation (close)
	
	#content (open)
	if(1==1){
	    
	    echo '
	    <img src="'.$function_propic.'" class="voluno_header_picture">
	    <div style="">
		
		<div style="text-align:center;margin:30px;">
		    <h1 style="display:inline;">
			My notifications
		    </h1>
		</div>
	    </div>';
	    
	}
	#content (close)
    }
    #title and img (close)

    #list (open)
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
						
						$function_table['query'] = $GLOBALS['wpdb']->prepare('SELECT *
																	FROM fi4l3fg_voluno_notifications
																	WHERE notif_user = %s
																	ORDER BY notif_date_modified DESC;'
																	,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
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
							
							$function_table['data'][$ajl]['notif_text'] = $function_table['results'][$ajl]->notif_text;
							$function_table['data'][$ajl]['notif_link'] = $function_table['results'][$ajl]->notif_link;
							$function_table['data'][$ajl]['notif_title'] = $function_table['results'][$ajl]->notif_title;
							
							$function_table['data'][$ajl]['notif_date_modified'] = $function_table['results'][$ajl]->notif_date_modified;
							$function_table['data'][$ajl]['notif_status'] = $function_table['results'][$ajl]->notif_status;
							$function_table['data'][$ajl]['notif_id'] = $function_table['results'][$ajl]->notif_id;
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
					
					$function_table['unique id'] = 'my_notifications_viusdfviuiufdv';
					// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
					
					#Options connected to the title (open)
					if(1==1){
						
						#$function_table['display title'] = 'Please add a title. ';
						// The title of the table which is displayed above the table. To hide title, leave empty.
						
						#$function_table['show on load'] = 'yes';
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
								'heading'		 => 'Notification',
								'width'			 => '75%',
								'sorting option' => 'notif_text'
							),
							array(
								'heading'		 => 'Time',
								'width'			 => '10%',
								'sorting option' => 'notif_date_modified'
							),
							array(
								'heading'		 => 'Status',
								'width'			 => '10%',
								'sorting option' => 'notif_status'
							)
						);
						
						//Optionally, you can choose one of the above columns to be the default sorting option.
						// If you don't want this, please delete or hide the entire array.
						$function_table['default ordering']
						= array(
							'column' => 'notif_date_modified', // Colum name. In the example, 'email' or 'id'.
							'direction' => 'DESC' // ASC or DESC
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
						
						$function_table['no_items_available_message'] = array(
						    'lines' => 'yes' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
						    ,'content' => 'You do not have any notifications yet.' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
						);
						
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
						
						#preparation (open)
						if(1==1){
							
							$notifications_id_array[] = $function_table['data'][$abs]['notif_id'];
							
							#status (open)
							if($function_table['data'][$abs]['notif_status'] == "unread"){
								
								$title = "This is the first time this notification is shown to you on this website.";
								
								$unread_notifications_bold = '
								font-weight:bold;';
								
								$span_with_id_if_unread = '
								<span class="unread_notifications">'.
								$function_table['data'][$abs]['notif_id'].
								'</span>';
								
							}elseif($function_table['data'][$abs]['notif_status'] == "seen"){
								
								$title = "You haven't clicked on this notification yet.";
								
								unset(
								$unread_notifications_bold
								,$span_with_id_if_unread
								);
								
							}elseif($function_table['data'][$abs]['notif_status'] == "read"){
								
								$title = "You have read this notification.";
								
								unset(
								$unread_notifications_bold
								,$span_with_id_if_unread
								);
								
							}
							#status (close)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td style="'.$unread_notifications_bold.'">
								'.($abs+1).'
							</td>
							';
							
						}
						#content (close)
						
					}
					#1 counter (close)
					
					#2 notification (open)
					if(1==1){
						
						#preparation (open)
						if(1==1){
							
							#function-timezone.php (v1.0) (open)
							if(1==1){
								
								$function_timezone = $function_table['data'][$abs]['notif_date_modified'];
								$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
								//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
								//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
								include('#function-timezone.php');
								#output:
								
							}
							#function-timezone.php (v1.0) (close)
							
							#status (open)
							if($function_table['data'][$abs]['notif_status'] == "unread"){
								
								$function_notifications__unread_notification['notif_id'] = '
								<span class="function_notifications__unread_notif_id" style="display:none;">'.
								$function_table['data'][$abs]['notif_id'].
								//needed for functions notifications to mark these notifs as read -> mysql mark as read
								'</span>';
								
								$function_notifications__unread_notification['style'] = '
								font-weight:bold;';
								
							}elseif($function_table['data'][$abs]['notif_status'] == "seen"){
								
								unset($function_notifications__unread_notification);
								
							}
							#status (close)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
							
							#word-wrap:break-word;
							$function_table['table rows'] .= '
							<td style="'.$unread_notifications_bold.'">
								'.$span_with_id_if_unread.'
								<p style="margin:0px 20px;">
									'.$function_table['data'][$abs]['notif_text'].'
								</p>
								<a href="'.$function_table['data'][$abs]['notif_link'].'">
									<div class="voluno_button">
										'.$function_table['data'][$abs]['notif_title'].'
									</div>
								</a>
							</td>
							';
							
						}
						#content (close)
						
					}
					#2 notification (close)
					
					#3 date (open)
					if(1==1){
						
						#preparation (open)
						if(1==1){
							
							#function-timezone.php (v1.0) (open)
							if(1==1){
								
								$function_timezone = $function_table['data'][$abs]['notif_date_modified'];
								$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
								//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
								//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
								include('#function-timezone.php');
								#output:
								
							}
							#function-timezone.php (v1.0) (close)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td style="'.$unread_notifications_bold.'">
								'.$function_timezone.'
							</td>
							';
							
						}
						#content (close)
						
					}
					#3 date (close)
					
					#4 status (open)
					if(1==1){
						
						#see first column
						
						#content (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td style="'.$unread_notifications_bold.'">
								<a title="'.$title.'" style="cursor:pointer;">
									'.ucfirst($function_table['data'][$abs]['notif_status']).'
								</a>
							</td>
							';
							
						}
						#content (close)
						
					}
					#4 status (close)
					
					$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
				} //Don't touch this. 
				#Cells/Columns (close)
				
			}
			#design (close)
			
			$function_table['part'] = 2; //Don't touch this. 
			include('#function-table.php'); //Don't touch this. 
			
			#output
			//the entire output is stored in the following variable:
			echo $function_table['output table'];
			
		}
		#function-table.php (v1.0) (close)
		
    }
    #list (close)
    
}
#content (close)

#mysql 2/2 (open)
if(1==1){
    
    #mark notifications as seen (open)
    if(1==1){
	
	for($adn=0;$adn<count($notifications_id_array);$adn++){
	    
	    #database query update (open)
	    if(1==1){
		$GLOBALS['wpdb']->update( 
				'ddddddddddddddddddddfi4l3fg_voluno_notifications',
			array( //updated content
				'notif_status' => 'seen',
			),
			array( //location of updated content
				'notif_id' => $notifications_id_array[$adn],
				'notif_user' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
				'notif_status' => "unread",
			),
			array( //format of updated content
				'%s'
			),
			array( //format of location of updated content
				'%d','%s','%s',
			    ));
	    }
	    #database query update (close)
	    
	}
	
    }
    #mark notifications as seen (close)
    
}
#mysql 2/2 (close)

?>