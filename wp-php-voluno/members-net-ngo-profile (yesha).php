<?php

//add_actionn('wp_ajax_nopriv_save_post','abc');

#page decision (open)
if (1 == 1) {

    #does ngo exist? (open)
    if (1 == 1) {

        $ngo_id = $_GET['development_organization'];

        global $wpdb;

        $does_ngo_exist_query = $wpdb->prepare('SELECT *
						FROM fi4l3fg_voluno_development_organizations
						WHERE ngo_id = %d
						    AND ngo_status = "";'
            , $ngo_id);
        $does_ngo_exist_row = $wpdb->get_row($does_ngo_exist_query);

        #function-redirect.php (v1.0) (open)
        if (empty($does_ngo_exist_row)) {

            $function_redirect = get_permalink(689);
            include('#function-redirect.php');
            #automatically executed

        }
        #function-redirect.php (v1.0) (close)

        $ngo_row = $does_ngo_exist_row;
        //				$country_name_query = $wpdb->prepare('SELECT list_countries_name FROM fi4l3fg_voluno_lists_countries
//								WHERE list_countries_id=%d',
//								$update_statement);
//				$country_name = $wpdb->get_row($country_name_query);
//				print_r($country_name);exit();
        //print_r($ngo_row);exit();

    }
    #does ngo exist? (close)

    $page_section = $_GET['section'];

}
#page decision (close)

#forum (open)
if ($page_section == "forum") {

    #jquery (open)
    if (1 == 1) {
        echo '
	<script>
	    jQuery(document).ready(function(){';

        #update browser title (my profile -> name) (open)
        if (1 == 1) {
            echo '
		    jQuery(document).attr("title", "Voluno | ' . $ngo_row->ngo_name . ' (Forum)");';
        }
        #update browser title (my profile -> name) (close)

        echo '
	    });
	</script>';
    }
    #jquery (close)

    #content (open)
    if (1 == 1) {

        #function-personal-pages.php (v1.0) (open)
        if (1 == 1) {
            $function_pers_pages_id = 5;
            $function_pers_pages_active_page = "Forum";
            include("#function-personal-pages.php");
            echo $function_pers_pages;
            #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
        }
        #function-personal-pages.php (v1.0) (close)

        #title table (open)
        if (1 == 1) {
            echo '
	    <table>
		<tr>
		    <td style="width:70%;padding-right:20px;">';

            #left side of container (open)
            if (1 == 1) {

                #title (open)
                if (1 == 1) {

                    #function-breadcrums.php
                    $function_breadcrums__left[] = "View all development organizations"; //optional
                    $function_breadcrums__left[] = get_permalink(689); //optional
                    include('#function-breadcrums.php');

                    echo '
				<div style="text-align:center;margin-bottom:30px;">
				    <h1 style="display:inline;">
					' . $ngo_row->ngo_name . ':
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
            if (1 == 1) {

                #ngo logo (open)
                if (1 == 1) {

                    #function-image-processing
                    #ngo logo
                    $function_propic__type = "ngo logo";
                    $function_propic__ngo_id = $ngo_id;
                    #all
                    $function_propic__geometry = array(289, 289); //optional, if e.g. only width: 300, NULL; vice versa
                    include('#function-image-processing.php');
                    echo '
				<div class="profile_edit_hover voluno_header_picture" style="margin-bottom:20px;">
				    <img class="ngo_logo voluno_brighter_on_hover" src="' . $function_propic . '"
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
        if (1 == 1) {

            include('members-net-forum.php');

        }
        #forum page integration (close)

    }
    #content (close)

}
#forum (close)

#people (open)
elseif ($page_section == "people") {

    #jquery (open)
    if (1 == 1) {
        echo '
	<script>
	    jQuery(document).ready(function(){';

        #update browser title (my profile -> name) (open)
        if (1 == 1) {
            echo '
		    jQuery(document).attr("title", "Voluno | ' . $ngo_row->ngo_name . ' (People)");';
        }
        #update browser title (my profile -> name) (close)

        echo '
	    });
	</script>';
    }
    #jquery (close)

    #content (open)
    if (1 == 1) {

        #function-personal-pages.php (v1.0) (open)
        if (1 == 1) {
            $function_pers_pages_id = 5;
            $function_pers_pages_active_page = "People";
            include("#function-personal-pages.php");
            echo $function_pers_pages;
            #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
        }
        #function-personal-pages.php (v1.0) (close)

        #title table (open)
        if (1 == 1) {
            echo '
	    <table>
		<tr>
		    <td style="width:70%;padding-right:20px;">';

            #left side of container (open)
            if (1 == 1) {

                #title (open)
                if (1 == 1) {

                    #function-breadcrums.php
                    $function_breadcrums__left[] = "View all development organizations"; //optional
                    $function_breadcrums__left[] = get_permalink(689); //optional
                    include('#function-breadcrums.php');

                    echo '
				<div style="text-align:center;margin-bottom:30px;">
				    <h1 style="display:inline;">
					' . $ngo_row->ngo_name . ':
				    </h1>
				    <br>
				    <h3 style="display:inline;">
					Staff and supporters
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
            if (1 == 1) {

                #ngo logo (open)
                if (1 == 1) {

                    #function-image-processing
                    #ngo logo
                    $function_propic__type = "ngo logo";
                    $function_propic__ngo_id = $ngo_id;
                    #all
                    $function_propic__geometry = array(289, 289); //optional, if e.g. only width: 300, NULL; vice versa
                    include('#function-image-processing.php');
                    echo '
				<div class="profile_edit_hover voluno_header_picture" style="margin-bottom:20px;">
				    <img class="ngo_logo voluno_brighter_on_hover" src="' . $function_propic . '"
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
						
						#is WordPress object $wpdb loaded yet? (open)
						if(!isset($wpdb)){
							global $wpdb;
						}
						#is WordPress object $wpdb loaded yet? (close)
						
						#volunteers (open) #todolist: this is incomplete.
						if (1 == 1) {
	
							$people_staff_query = $wpdb->prepare('
										AND ngo_prop_type_general = "position"
										AND ngo_prop_type_status = "accepted"
									;'
								, $ngo_id);
							$people_staff_results = $wpdb->get_results($people_staff_query);
							
						}
						#volunteers (close)
						
						$function_table['query'] = $wpdb->prepare('SELECT *
																	FROM fi4l3fg_voluno_users_extended
									
																	' .#staff members (I/III)
															'LEFT JOIN (
																	SELECT *
																	FROM fi4l3fg_voluno_development_organizations_properties
																	WHERE ngo_prop_ngo_id = %d
																		AND ngo_prop_type_general = "position"
																		AND ngo_prop_type_status = "accepted"
																	) AS aaa_staff_members
																	ON usersext_id = ngo_prop_type_id
									
																	' .#volunteers (I/III)
															'LEFT JOIN (
																	SELECT *
																	FROM fi4l3fg_voluno_items_tasks
																	LEFT JOIN (
																		SELECT *
																		FROM fi4l3fg_voluno_applications
																		WHERE application_type_general = "task"
																			AND application_type_specific = "task_application"
																			AND application_status = "accepted"
																		) AS aaa_applications
																		ON task_id = application_type_id
																	WHERE task_ngo_id = %d
																	) AS aaa_volunteers
																	ON usersext_id = application_user_id
									
																	WHERE status = ""
																	AND (
																		ngo_prop_ngo_id != "" ' .#staff members (II/III)
															'OR
																		application_user_id != "" ' .#volunteers (II/III)
															')
																	GROUP BY usersext_id;'
									
															, $ngo_id #staff members (III/III)
															, $ngo_id #volunteers (III/III)
																  );
						$function_table['results'] = $wpdb->get_results($function_table['query']);
						
					}
					#data preparation and creation (close)
					
					#inserting the data into the data array (open)
					for($ajl=0;$ajl<count($function_table['results']);$ajl++){ // <- Please modify the total amount of rows to include in your table.
						
						// This loop iterates through each row of data.
						// If you didn't use the default query, please modify the amount of rows in the above loop.
						
						// In the following brackets, please add one line for each column that you want to add to the mysql table.
						// In the following example, user data is inserted (column names are imaginary, just to illustrate).
						
						#role determination (open)
						if (1 == 1) {
	
							if (!empty($function_table['results'][$ajl]->application_user_id)) {
								
								#each person only once (open)
								if (1 == 1) {#dome
	
								}
								#each person only once (close)
								
								$role = "Volunteer";
							} elseif ($function_table['results'][$ajl]->ngo_prop_type_detail == "admin") {
								
								$role = "Development worker (Administrator)";
								
							} elseif ($function_table['results'][$ajl]->ngo_prop_type_specific == "worker") {
								
								$role = "Development worker";
								
							}
	
						}
						#role determination (close)
						
						#columns (open)
						if(1==1){
							
							$function_table['data'][$ajl]['display_name'] = $function_table['results'][$ajl]->usersext_displayName;
							$function_table['data'][$ajl]['application_type_general'] = $function_table['results'][$ajl]->application_type_general;
							$function_table['data'][$ajl]['application_type_specific'] = $function_table['results'][$ajl]->application_type_specific;
							
							$function_table['data'][$ajl]['ngo_prop_type_general'] = $function_table['results'][$ajl]->ngo_prop_type_general;
							$function_table['data'][$ajl]['ngo_prop_type_specific'] = $function_table['results'][$ajl]->ngo_prop_type_specific;
							$function_table['data'][$ajl]['role'] = $role;
							
							$function_table['data'][$ajl]['country_state_city'] = $function_table['results'][$ajl]->usersext_country.'__delimiter__'.
																				$function_table['results'][$ajl]->usersext_state.'__delimiter__'.
																				$function_table['results'][$ajl]->usersext_city;
	
							$function_table['data'][$ajl]['id'] = $function_table['results'][$ajl]->usersext_id;
							$function_table['data'][$ajl]['task_id'] = $function_table['results'][$ajl]->task_id;
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
					
					$function_table['unique id'] = 'ngo_profile_people_cflnukvdbfslkuv';
					// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
					
					#Options connected to the title (open)
					if(1==1){
						
						$function_table['display title'] = 'List of all Voluno members associated with '.$does_ngo_exist_row->ngo_name;
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
								'heading'		 => 'Name',
								'width'			 => '30%',
								'sorting option' => 'display_name'
							),
							array(
								'heading'		 => 'Role',
								'width'			 => '10%',
								'sorting option' => 'role'
							),
							array(
								'heading'		 => 'Location',
								'width'			 => '15%',
								'sorting option' => 'country_state_city'
							),
							array(
								'heading'		 => 'Record',
								'width'			 => '15%'
							)
						);
						
						//Optionally, you can choose one of the above columns to be the default sorting option.
						// If you don't want this, please delete or hide the entire array.
						$function_table['default ordering']
						= array(
							'column' => 'display_name', // Colum name. In the example, 'email' or 'id'.
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
					
					#1 Num (open)
					if(1==1){
						
						$function_table['table rows'] .= '
						<td>
							'.($abs+1).'
						</td>
						';
						
					}
					#1 Num (close)
					
					#2 Img + Name (open)
					if(1==1){
						
						#function-image-processing
							#profile picture
								$function_propic__type = "profile picture";
								$function_propic__user_id = $function_table['data'][$abs]['id'];
							#all
								$function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
							include('#function-image-processing.php');
						  
						#function_profile_link.php (v1.0) (open)
						if(1==1){
							
							$function_profile_link = $function_table['data'][$abs]['id']; //default: 1
							#$function_profile_link_img_div = "yes"; //default: no/empty, shows picture on hover, only works for people
							include('#function-profile-link.php');
							#output saved in:
							# $function_profile_link__link
							# $function_profile_link__name_link
							# $function_profile_link__name
							# $function_profile_link__link_title
							
						}
						#function_profile_link.php (v1.0) (close)
						
						$function_table['table rows'] .= '
						<td>
							<table>
								<tr>
									<td style="width:100px;padding-right:10px;">
										<a
											title="'.$function_profile_link__link_title.'"
											href="'.$function_profile_link__link.'"
										>
											<img src="'.$function_propic.'" style="border-radius:20px;border:1px solid black;">
										</a>
									</td>
									<td style="vertical-align:middle;text-align:justify;">
										'.$function_profile_link__name_link.'
									</td>
								</tr>
							</table>
						</td>
						';
						
					}
					#2 Img + Name(close)
					
					#3 Position (open)
					if(1==1){
						
						#todolist: please modify the entry so that individuals who have two roles (volunteer and development worker)
						#are also accounted for. Alternatively, change the system, so that workers of an organization cannot be volunteers
						#for that organization, too.
						$function_table['table rows'] .= '
						<td>
							'.$function_table['data'][$abs]['role'].'
						</td>
						';
					  
					}
					#3 Position (close)
					
					#4 Location (open)
					if(1==1){
						
						$location_array = explode("__delimiter__",$function_table['data'][$abs]['country_state_city']);
						
						$country_id = $location_array[0];
						
						$country_of_member_query = $wpdb->prepare('SELECT *
																  FROM fi4l3fg_voluno_lists_countries
																  WHERE list_countries_id = %d'
																  ,$country_id);
						$country_of_member_row = $wpdb->get_row($country_of_member_query);
						
						$function_table['table rows'] .= '
						<td>
							<span title="Country" style="font-weight:bold;">'.$country_of_member_row->list_countries_name.'</span>';
							
							if(!empty($location_array[1])){
								
								$function_table['table rows'] .= ',<br>
								<span title="State">'.$location_array[1].'</span>';
								
							}
							
							if(!empty($location_array[2])){
								
								$function_table['table rows'] .= ',<br>
								<span title="City">'.$location_array[2].'</span>';
								
							}
							
							$function_table['table rows'] .= '
						</td>
						';
						
					}
					#4 Location (close)
					
					#5 Record (open)
					if(1==1){
						
						$function_table['table rows'] .= '
						<td>
							(#todolist: add record here. or remove the whole record listing, since the record is already features in the name anyway...)
						</td>
						';
						
					}
					#5 Record (close)
					
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
    #content (close)

}
#people (close)

#projects (open)
elseif ($page_section == "projects") {

    #style (open)
    if (1 == 1) {

        echo '
	<style>
	    .content_div{
		border-radius:20px;
		padding:20px;
		background-color:#FFEAB9;
		margin:20px 0px;

	    }
	    .content_div_level2,.project_div{
		padding:10px;
		background-color:#FFEAB9;
		margin:10px 0px;
		border-radius:10px;
	    }
	    .project_div{
		display:inline-block;
		max-width:660px;
		text-align:justify;
	    }
	    .inner_project_div{
		background-color:#FFF;
		margin:20px 10px 10px 10px;
		display:inline-block;
		padding:10px;
		border-radius:5px;
	    }
	</style>';

    }
    #style (close)

    #mysql (open)
    if (1 == 1) {

        #get before update (open)
        if (1 == 1) {

            #projects (open)
            if (1 == 1) {

                $all_projects_query_text = array(
                    'SELECT *
		    FROM fi4l3fg_voluno_ngo_projects
		    WHERE project_ngo = %d;'
                , $ngo_row->ngo_id
                );
                //used in the second "mysql get". this ensures that changes to the text are always transfered to both queries.

                $all_projects_query = $wpdb->prepare($all_projects_query_text[0]
                    , $all_projects_query_text[1]);
                $all_projects_results = $wpdb->get_results($all_projects_query);

            }
            #projects (close)

        }
        #get before update (close)

        #update (open)
        if (1 == 1) {

            #standard update project info (open)
            if (1 == 1) {
                //to facilitate the work on projects, redundant information is saved in the database. specifically:
                //- if there are children and children of children
                //- if which level the project is or, put differently, whether it has a parent and wether its parent has a parent
                //to ensure that all this information is up to date and consistent, it's updated on every load for all projects of the ngo

                #each project (open)
                for ($agv = 0; $agv < count($all_projects_results); $agv++) {

                    $update_project_info['project']['row'] = $all_projects_results[$agv];

                    #find parents and determine level (open)
                    if ($update_project_info['project']['row']->project_parent == 0) { //if no parent -> level 0
                        $update_project_info['project']['level'] = 0;
                    } else {
                        for ($agw = 0; $agw < count($all_projects_results); $agw++) {
                            if ($update_project_info['project']['row']->project_parent == $all_projects_results[$agw]->project_id) { //get parent from results

                                $update_project_info['project']['parent']['row'] = $all_projects_results[$agw];

                                if ($update_project_info['project']['parent']['row']->project_parent == 0) { //if parent has no parent -> level 1
                                    $update_project_info['project']['level'] = 1;
                                } else {
                                    $update_project_info['project']['level'] = 2;
                                }

                            }
                        }
                    }
                    #find parents and determine level (close)

                    #find how many child levels (open)
                    if (1 == 1) {

                        #loop (open)
                        for ($agx = 0; $agx < count($all_projects_results); $agx++) {
                            if ($all_projects_results[$agx]->project_parent == $update_project_info['project']['row']->project_id) {
                                //if this is the case, then the project has at least one child.

                                $update_project_info['project']['child_level_1'] = $all_projects_results[$agx];

                                //now the question is if any of these children has children

                                for ($agy = 0; $agy < count($all_projects_results); $agy++) {
                                    if ($all_projects_results[$agy]->project_parent == $update_project_info['project']['child_level_1']->project_id) {
                                        //if this is the case, then there are two levels of children

                                        $update_project_info['project']['child_level_2'] = $all_projects_results[$agy];

                                    }

                                }


                            }

                        }
                        #loop (close)

                        #determine child level (open)
                        if (empty($update_project_info['project']['child_level_1'])) {

                            $update_project_info['project']['child level'] = 0;

                        } elseif (empty($update_project_info['project']['child_level_2'])) {

                            $update_project_info['project']['child level'] = 1;

                        } else {

                            $update_project_info['project']['child level'] = 2;

                        }
                        #determine child level (open)

                    }
                    #find how many child levels (close)

                    #update (open)
                    if (1 == 1) {

                        #database query update (open)
                        if (1 == 1) {
                            $wpdb->update(
                                'fi4l3fg_voluno_ngo_projects',
                                array( //updated content
                                    'project_level' => $update_project_info['project']['level'],
                                    'project_child' => $update_project_info['project']['child level'],
                                    'project_date_modified' => date("Y-m-d H:i:s")
                                ),
                                array( //location of updated content
                                    'project_id' => $update_project_info['project']['row']->project_id
                                ),
                                array( //format of updated content
                                    '%d', '%d', '%s'
                                ),
                                array( //format of location of updated content
                                    '%d'
                                ));
                        }
                        #database query update (close)

                    }
                    #update (close)
                    unset($update_project_info);
                }
                #each project (close)
            }
            #standard update project info (open)

        }
        #update (close)

        #get after update (open)
        if (1 == 1) {

            #projects (open)
            if (1 == 1) {

                $all_projects_query = $wpdb->prepare($all_projects_query_text[0]
                    , $all_projects_query_text[1]);
                $all_projects_results = $wpdb->get_results($all_projects_query);

            }
            #projects (close)

        }
        #get after update (close)

    }
    #mysql (close)

    #content (open)
    if (1 == 1) {

        #function-personal-pages.php (v1.0) (open)
        if (1 == 1) {
            $function_pers_pages_id = 5;
            $function_pers_pages_active_page = "Projects";
            include("#function-personal-pages.php");
            echo $function_pers_pages;
            #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
        }
        #function-personal-pages.php (v1.0) (close)
        echo "THIS SECTION IS STILL IN DEVELOPMENT."; #dome
        #title table (open)
        if (1 == 1) {
            echo '
	    <table>
		<tr>
		    <td style="width:70%;padding-right:20px;">';

            #left side of container (open)
            if (1 == 1) {

                #title (open)
                if (1 == 1) {

                    #function-breadcrums.php
                    $function_breadcrums__left[] = "View all development organizations"; //optional
                    $function_breadcrums__left[] = get_permalink(689); //optional
                    include('#function-breadcrums.php');

                    echo '
				<div style="text-align:center;margin-bottom:30px;">
				    <h1 style="display:inline;">
					' . $ngo_row->ngo_name . ':
				    </h1>
				    <br>
				    <h3 style="display:inline;">
					Projects
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
            if (1 == 1) {

                #ngo logo (open)
                if (1 == 1) {

                    #function-image-processing
                    #ngo logo
                    $function_propic__type = "ngo logo";
                    $function_propic__ngo_id = $ngo_id;
                    #all
                    $function_propic__geometry = array(289, 289); //optional, if e.g. only width: 300, NULL; vice versa
                    include('#function-image-processing.php');
                    echo '
				<div class="profile_edit_hover voluno_header_picture" style="margin-bottom:20px;">
				    <img class="ngo_logo voluno_brighter_on_hover" src="' . $function_propic . '"
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

        #options (open)
        if (1 == 1) {

            echo '
	    <div style="text-align:center;">
		<div class="voluno_button project_description_general_link" style="display:inline-block;">
		    <span class="text">
			Show all project descriptions
		    </span>
		    <span class="text" style="display:none">
			Hide all project descriptions
		    </span>
		</div>
		<div class="voluno_button project_tasks_general_link" style="display:inline-block;">
		    <span class="text">
			Show all project tasks
		    </span>
		    <span class="text" style="display:none">
			Hide all project tasks
		    </span>
		</div>
		<div class="voluno_button project_subprojects_general_link" style="display:inline-block;">
		    <span class="text" style="display:none">
			Show all subprojects
		    </span>
		    <span class="text">
			Hide all subprojects
		    </span>
		</div>
		<div class="voluno_button project_new_general_link" style="display:inline-block;">
		    New project
		</div>
	    </div>';

        }
        #options (close)

        #new project (open)
        if (1 == 1) {

            #preparation (open)
            if (1 == 1) {

                for ($agu = 0; $agu < count($all_projects_results); $agu++) {
                    echo "";
                }


                #preparation (open)
                if (1 == 1) {

                    #array (open)
                    if (1 == 1) {

                        #select_thread (open)
                        if (1 == 1) {

                            $select_thread = '
                            <select
                                style="text-align:center;"
                                name="add_discussion__thread"
                                class="add_discussion__thread"
                            >';

                            for ($abn = 0; $abn < count($add_discussion_thread_selection_results); $abn++) {

                                if ($thread_info_row->voluno_for_thr_id == $add_discussion_thread_selection_results[$abn]->voluno_for_thr_id) {
                                    $selected = 'selected';
                                    $selected_text = ' (current topic)';
                                    $selected_style = 'style="font-weight:bold;"';
                                } else {
                                    unset($selected, $selected_text, $selected_style);
                                }

                                $select_thread .= '
                                <option
                                    value="' . $add_discussion_thread_selection_results[$abn]->voluno_for_thr_id . '"
                                    title="' . $add_discussion_thread_selection_results[$abn]->voluno_for_thr_description . '"
                                    ' . $selected . '
                                    ' . $selected_style . '
                                >
                                    ' . $add_discussion_thread_selection_results[$abn]->voluno_for_thr_title . $selected_text . '
                                </option>';

                            }
                            $select_thread .= '
                            </select>';

                        }
                        #select_thread (close)

                        #array (open)
                        if (1 == 1) {

                            $maxlength_title = 75;
                            $maxlength_post = 1000;

                            $new_project_form_array
                                = array(
                                array(
                                    'title' => 'Name'
                                , 'input' => '<input
                                                        style="width:95%;"
                                                        type="text"
                                                        placeholder="Discussion title"
                                                        name="add_discussion__title"
                                                        class="post_reply_input"
                                                        maxlength=' . $maxlength_title . '
                                                    >'
                                , 'warning_text' => 'Please add a title to your discussion. Please use keywords.'
                                , 'max_characters' => $maxlength_title
                                , 'text_before_value' => 'You have reached the character limit of '
                                , 'text_after_value' => '. If you want to add more information, please do so in the detailed description fields below.'
                                ),
                                array(
                                    'title' => 'Description'
                                , 'input' => '<textarea
                                                        name="add_discussion__first_post"
                                                        class="post_reply_input"
                                                        placeholder="Your first post that opens the discussion." '
                                    . 'style="width:95%;resize:vertical;min-height:100px;max-height:300px;height:200px;" '
                                    . 'maxlength=' . $maxlength_post
                                    . '>'
                                    . '</textarea>'
                                , 'warning_text' => 'Please write a text to start the discussion.'
                                , 'max_characters' => $maxlength_post
                                , 'text_before_value' => "You have reached the character limit of "
                                , 'text_after_value' => "."
                                ),
                                array(
                                    'title' => 'Supervisor'
                                , 'input' => $select_thread
                                ),
                                array(
                                    'title' => 'Parent'
                                , 'input' => $select_thread
                                )
                            );

                        }
                        #array (close)

                    }
                    #array (close)

                }
                #preparation (close)

            }
            #preparation (close)

            #content (open)
            if (1 == 1) {

                echo '
		<div class="content_div project_new_div" style="display:noene;width:80%;margin:20px auto;">';

                #title (open)
                if (1 == 1) {
                    echo '
			<div style="text-align:center;">
			    <h4 style="display:inline;">
				New Project
			    </h4>
			</div>';
                }
                #title (close)

                #form (open)
                if (1 == 1) {
                    echo '
			<form method="post" action="' . get_permalink() . '?development_organization=' . $ngo_row->ngo_id . '&section=projects">
			    <table>';

                    #loop (open)
                    for ($aha = 0; $aha < count($new_project_form_array); $aha++) {

                        echo '
				    <tr>
					<td
					    style="
						width:15%;
						text-align:right;
						font-weight:bold;
						padding:12px 10px 0px 0px;
					    "
					>
					    ' . $new_project_form_array[$aha]['title'] . ':
					</td>
					<td style="">
					    ' . $new_project_form_array[$aha]['input'] . '
					    <div style="color:red;padding-top:5px;">';

                        #warnings and text info (open)
                        if (1 == 1) {

                            if (!empty($new_discussion_form_array[$aha]['max_characters'])) {

                                #hidden fields (open)
                                if (1 == 1) {
                                    echo '
							    <span class="max_char" style="display:none;">' .
                                        $new_discussion_form_array[$aha]['max_characters'] .
                                        '</span>
							    <span class="text_before_value" style="display:none;">' .
                                        $new_discussion_form_array[$aha]['text_before_value'] .
                                        '</span>
							    <span class="text_after_value" style="display:none;">' .
                                        $new_discussion_form_array[$aha]['text_after_value'] .
                                        '</span>';
                                }
                                #hidden fields (close)

                                echo '
							<span class="char_count" style="color:#F86A00;">
							</span>';
                            }

                            echo '
						    <span class="warning" style="display:none;">
							' . $new_discussion_form_array[$aha]['warning_text'] . '
						    </span>';
                        }
                        #warnings and text info (close)

                        echo '
					    </div>
					</td>
				    </tr>';

                    }
                    #loop (close)

                    echo '
			    </table>
			</form>';
                }
                #form (close)

                #cancel + submit (open)
                if (1 == 1) {
                    echo '
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <div
                                    style="display:inline-block;margin-right:50px;"
                                    class="voluno_button project_new_general_link_cancel"
                                >
                                    Cancel
                                </div>
                                <div
                                    class="voluno_button project_new_form_submit"
                                    style="display:inline-block;"
                                >
                                    Create project
                                </div>
                            </td>
                        </tr>';
                }
                #cancel + submit (close)

                echo '
		</div>';

            }
            #content (close)

        }
        #new project (close)

        #projects overview (open)
        if (1 == 1) {
            echo '
	    <div class="content_div">';

            #title (open)
            if (12 == 1) { #dome
                echo '
		    <div style="text-align:center;">
			<h4 style="display:inline;cursor:pointer;" class="content_div_title">
			    <a style="cursor:pointer;">
				Project Overview
			    </a>
			</h4>
		    </div>';
            }
            #title (close)

            #project overview (open)
            if (1 == 1) {

                #preparation (open)
                if (1 == 1) {

                    $project_id_placeholder = "9!Frue8Yev#vp_Q@";
                    $project_indent = 60;

                    #level 1 - loop (open)
                    for ($agq = 0; $agq < count($all_projects_results); $agq++) {
                        if ($all_projects_results[$agq]->project_parent == 0) {

                            #level 1 - content (open)
                            if (1 == 1) {
                                $projects_overview['level0']['counter'][] = $all_projects_results[$agq]->project_id;
                                $projects_overview['project_id_in_results_array'][] = $agq;
                                $projects_overview['project_number']['0']++;
                                unset($projects_overview['project_number'][1]);
                                unset($projects_overview['project_number'][2]);

                                #link to description (open)
                                if (!empty($all_projects_results[$agq]->project_description)) {
                                    $project_name_link = array('<a style="cursor:pointer;" class="project_name">', '</a>');
                                } else {
                                    unset($project_name_link);
                                }
                                #link to description (close)

                                $projects_overview['level1']['content'][0] = '
				    <div class="project_div">
					<div style="font-weight:bold;font-size:140%;">' . //div is closed later, in the individual project section #did0001
                                    $project_name_link[0] .
                                    $projects_overview['project_number'][0] . '. ' .
                                    $all_projects_results[$agq]->project_name .
                                    $project_name_link[1];
                                $projects_overview['level1']['content'][1] = '
					' . $project_id_placeholder .
                                    str_pad($all_projects_results[$agq]->project_id, 8, '-', STR_PAD_LEFT) . '
				    </div>';
                            }
                            #level 1 - content (close)

                            #level 2 - loop (open)
                            if (1 == 1) {
                                $projects_overview['level1']['subcontent'] .= '
				    <div style="padding-left:' . $project_indent . 'px;">';
                                for ($agr = 0; $agr < count($all_projects_results); $agr++) {
                                    if ($all_projects_results[$agr]->project_parent == $all_projects_results[$agq]->project_id) {

                                        #level 2 - content (open)
                                        if (1 == 1) {
                                            $projects_overview['level0']['counter'][] = $all_projects_results[$agr]->project_id;
                                            $projects_overview['project_id_in_results_array'][] = $agq;
                                            $projects_overview['level1']['counter']++;
                                            $projects_overview['project_number'][1]++;
                                            unset($projects_overview['project_number'][2]);

                                            #link to description (open)
                                            if (!empty($all_projects_results[$agq]->project_description)) {
                                                $project_name_link = array('<a style="cursor:pointer;" class="project_name">', '</a>');
                                            } else {
                                                unset($project_name_link);
                                            }
                                            #link to description (close)

                                            $projects_overview['level2']['content'][0] = '
						    <div class="project_div">
							<div style="font-weight:bold;font-size:130%;">' . //div is closed later, in the individual project section #did0001
                                                $project_name_link[0] .
                                                $projects_overview['project_number'][0] . '.' .
                                                $projects_overview['project_number'][1] . '. ' .
                                                $all_projects_results[$agr]->project_name .
                                                $project_name_link[1];
                                            $projects_overview['level2']['content'][1] = '
							' . $project_id_placeholder .
                                                str_pad($all_projects_results[$agr]->project_id, 8, '-', STR_PAD_LEFT) . '
						    </div>';
                                        }
                                        #level 2 - content (close)

                                        #level 3 - loop (open)
                                        if (1 == 1) {
                                            $projects_overview['level2']['subcontent'] .= '
						    <div style="padding-left:' . $project_indent . 'px;">';
                                            for ($ags = 0; $ags < count($all_projects_results); $ags++) {

                                                #level 3 - content (open)
                                                if ($all_projects_results[$ags]->project_parent == $all_projects_results[$agr]->project_id) {
                                                    $projects_overview['level0']['counter'][] = $all_projects_results[$ags]->project_id;
                                                    $projects_overview['project_id_in_results_array'][] = $agq;
                                                    $projects_overview['level1']['counter']++;
                                                    $projects_overview['level2']['counter']++;
                                                    $projects_overview['project_number'][2]++;

                                                    #link to description (open)
                                                    if (!empty($all_projects_results[$agq]->project_description)) {
                                                        $project_name_link = array('<a style="cursor:pointer;" class="project_name">', '</a>');
                                                    } else {
                                                        unset($project_name_link);
                                                    }
                                                    #link to description (close)

                                                    $projects_overview['level3']['content'][0] = '
								<div class="project_div">
								    <div style="font-weight:bold;font-size:120%;">' . //div is closed later, in the individual project section #did0001
                                                        $project_name_link[0] .
                                                        $projects_overview['project_number'][0] . '.' .
                                                        $projects_overview['project_number'][1] . '.' .
                                                        $projects_overview['project_number'][2] . '. ' .
                                                        $all_projects_results[$ags]->project_name .
                                                        $project_name_link[1];
                                                    $projects_overview['level3']['content'][1] = '
								    ' . $project_id_placeholder .
                                                        str_pad($all_projects_results[$ags]->project_id, 8, '-', STR_PAD_LEFT) . '
								</div>';
                                                }
                                                #level 3 - content (close)

                                                $projects_overview['level2']['subcontent'] .=
                                                    '<div class="project_frame_level3">' .
                                                    $projects_overview['level3']['content'][0] .
                                                    $projects_overview['level3']['counter'] .
                                                    $projects_overview['level3']['content'][1] .
                                                    '</div>';
                                                unset($projects_overview['level3']);

                                            }
                                            $projects_overview['level2']['subcontent'] .= '
						    </div>';
                                        }
                                        #level 3 - loop (close)

                                        #project counter (open)
                                        if ($projects_overview['level2']['counter'] > 0) {
                                            if ($projects_overview['level2']['counter'] == 1) {
                                                $plural_s = "subproject";
                                            } else {
                                                $plural_s = "subprojects";
                                            }
                                            $projects_overview['level2']['counter']
                                                = '
						    (' .
                                                '<a style="cursor:pointer;" class="subprojects_link_level2">' .
                                                $projects_overview['level2']['counter'] . '&nbsp;' . $plural_s .
                                                '</a>' .
                                                ')';
                                        }
                                        #project counter (close)

                                        $projects_overview['level1']['subcontent'] .=
                                            '<div class="project_frame_level2">' .
                                            $projects_overview['level2']['content'][0] .
                                            $projects_overview['level2']['counter'] .
                                            $projects_overview['level2']['content'][1] .
                                            $projects_overview['level2']['subcontent'] .
                                            '</div>';
                                        unset($projects_overview['level2']);

                                    }
                                }
                                $projects_overview['level1']['subcontent'] .= '
				    </div>';
                            }
                            #level 2 - loop (close)

                            #project counter (open)
                            if ($projects_overview['level1']['counter'] > 0) {
                                if ($projects_overview['level1']['counter'] == 1) {
                                    $plural_s = "subproject";
                                } else {
                                    $plural_s = "subprojects";
                                }
                                $projects_overview['level1']['counter']
                                    = '
				    (' .
                                    '<a style="cursor:pointer;" class="subprojects_link_level1">' .
                                    $projects_overview['level1']['counter'] . '&nbsp;' . $plural_s .
                                    '</a>' .
                                    ')';
                            }
                            #project counter (close)

                            $projects_overview['level0']['content'] .=
                                '<div class="project_frame_level1">' .
                                $projects_overview['level1']['content'][0] .
                                $projects_overview['level1']['counter'] .
                                $projects_overview['level1']['content'][1] .
                                $projects_overview['level1']['subcontent'] .
                                '</div>';
                            unset($projects_overview['level1']);

                        }
                    }
                    #level 1 - loop (close)

                }
                #preparation (close)

                #content (open)
                if (1 == 1) {

                    #individual project + adding to "project structure" (open)
                    for ($agt = 0; $agt < count($projects_overview['level0']['counter']); $agt++) {

                        #description (open)
                        if (!empty($all_projects_results[$projects_overview['project_id_in_results_array'][$agt]]->project_description)) {

                            $project_div_content[1] .= '
				<div class="inner_project_div project_description" style="display:none;">
				    <p>
					' . $all_projects_results[$projects_overview['project_id_in_results_array'][$agt]]->project_description . '
				    </p>
				</div>';

                        }
                        #description (close)

                        #tasks & link or deactivated link if empty (open)
                        if (1 == 1) {

                            #preparation (open)
                            if (1 == 1) {

                                #function-table-of-god.php (v1.0) (open)
                                if (1 == 1) {

                                    #data preparation (open)
                                    if (1 == 1) {

                                        #Please choose a name for your table like "task mycurrent volunteer"
                                        $table_of_god_name = "ngo tasks"; //used twice: in projects and profile
                                        $table_of_god_id = $agt; //this is combined with the name to form a unique id, e.g. per forum disucssion. default: empty
                                        #$table_of_god__number_of_all_results = 3; //if given, user is being asked to relax search restrictions if no results are found

                                        #Please select all possible
                                        $table_of_god_query = $wpdb->prepare('SELECT *
										    FROM fi4l3fg_voluno_items_tasks
										    WHERE task_project = %d;'
                                            , $projects_overview['level0']['counter'][$agt]);
                                        $table_of_god_results = $wpdb->get_results($table_of_god_query);

                                        #column transfer (open)
                                        for ($x = 0; $x < count($table_of_god_results); $x++) {
                                            #strings (up to 10)
                                            $table_of_god_data_strings1[] = $table_of_god_results[$x]->task_description;
                                            $table_of_god_data_strings2[] = $table_of_god_results[$x]->task_name;
                                            $table_of_god_data_strings3[] = $table_of_god_results[$x]->task_status;
                                            $table_of_god_data_strings4[] = $table_of_god_results[$x]->task_code;
                                            $table_of_god_data_strings5[] = $table_of_god_results[$x]->task_date_entered;
                                            $table_of_god_data_strings6[] = $table_of_god_results[$x]->task_deadline;
                                            $table_of_god_data_strings7[] = $table_of_god_results[$x]->task_assignment_deadline;
                                            #$table_of_god_data_strings8[] = $table_of_god_results[$x]->;
                                            #$table_of_god_data_strings9[] = $table_of_god_results[$x]->;
                                            #$table_of_god_data_strings10[] = $table_of_god_results[$x]->;
                                            #numbers (up to 10)
                                            $table_of_god_data_numbers1[] = $table_of_god_results[$x]->task_author_id;
                                            $table_of_god_data_numbers2[] = $table_of_god_results[$x]->task_ngo_id;
                                            $table_of_god_data_numbers3[] = $table_of_god_results[$x]->task_project_id;
                                            $table_of_god_data_numbers4[] = $table_of_god_results[$x]->task_id;
                                            #$table_of_god_data_numbers5[] = ;
                                            #$table_of_god_data_numbers6[] = ;
                                            #$table_of_god_data_numbers7[] = ;
                                            #$table_of_god_data_numbers8[] = ;
                                            #$table_of_god_data_numbers9[] = ;
                                            #$table_of_god_data_numbers10[] = ;
                                        }
                                        #column transfer (close)
                                    }
                                    #data preparation (close)

                                    #table content (open)
                                    if (1 == 1) {

                                        $table_of_god_table_title = "Project tasks"; #the title of the table in h4, together with hide option. to hide title, leave empty.
                                        $table_of_god_table_title_format = array('div style="font-size:120%;font-weight:bold;"', 'div'); //default: array('h4','h4') <- opening and closing tags
                                        $table_of_god_table_title_brackets = 'no'; //default:yes
                                        #$table_of_god_show_on_load = "no"; //default: yes (empty or "yes"). If there's no title, this is automatically set to yes, otherwise pointless.
                                        #$table_of_god__hide_column_titles = "yes"; //default: no = empty
                                        #$table_of_god__thin_pagination = "yes"; //default: no = empty
                                        $table_of_god__variable_only = "yes"; //default: no = empty --> saves everything in $table_of_god

                                        #table title array (open)
                                        if (1 == 1) {
                                            $table_of_god_table_array = array(
                                                #Title of each column
                                                #the width of each column in the table in percent
                                                #mysql ordering name
                                                array("#", 5),
                                                array("Task", 20, "tog_data_string2"),
                                                array("Description", 75),
                                                #array("Country",15),
                                                #array("Region",15),
                                                #array("Category",15),
                                                #array("Author and organization",15),
                                                #array("Applicants",15),
                                                #array("Apply",15)
                                            );
                                        }
                                        #table title array (close)

                                        #default ordering
                                        $table_of_god_default_order_by = "tog_data_string2"; # any of the third position ([2]) in the subarray of $table_of_god_table_array
                                        $table_of_god_default_order_by_direction = "ASC"; # " ASC"; or " DESC"; (space required)

                                        #For the td content, please look at: #function-table-of-god#example.php

                                        #if empty, show messages
                                        $table_of_god__no_items_available_message = array(
                                            'lines' => "no" //default: yes
                                        , 'content' => "none" //any text or "none", default: There are currently no items available.
                                        );

                                    }
                                    #table content (close)

                                    include("#function-table-of-god.php");

                                }
                                #function-table-of-god.php (v1.0) (close)

                            }
                            #preparation (close)

                            #execution (open)
                            if (!empty($table_of_god_results)) {

                                #plural s (open)
                                if (count($table_of_god_results) == 1) {
                                    $plural_s = "task";
                                } else {
                                    $plural_s = "tasks";
                                }
                                #plural s (close)

                                $project_div_content[0] .= '
				    (<a class="task_div_link" style="cursor:pointer;">' . count($table_of_god_results) . '&nbsp;' . $plural_s . '</a>)
				    </div>'; //closing of previously opened div #did0001
                                $project_div_content[1] .= '
				    <div class="task_div inner_project_div" style="display:none;">
					' . $table_of_god . '
				    </div>';
                            } else {
                                $project_div_content[0] .= '
				    </div>'; //closing of previously opened div #did0001';
                            }
                            #execution (close)

                        }
                        #tasks & link or deactivated link if empty (close)

                        $projects_overview['level0']
                            = str_replace(
                            $project_id_placeholder . str_pad($projects_overview['level0']['counter'][$agt], 8, '-', STR_PAD_LEFT),
                            $project_div_content[0] . $project_div_content[1],
                            $projects_overview['level0']
                        );
                        unset($project_div_content);
                    }
                    #individual project + adding to "project structure" (close)

                    echo '
			<div class="content_div_content">
			    ' . $projects_overview['level0']['content'] . '
			</div>';

                }
                #content (close)

            }
            #project overview (close)

            echo '
	    </div>';
        }
        #projects overview (close)

    }
    #content (close)

    #jquery (open)
    if (1 == 1) {

        echo '
	<script>
	    jQuery(document).ready(function(){';

        #general options (open)
        if (1 == 1) {

            #hide show project description (open)
            if (1 == 1) {
                echo '
			var project_description_general_link = "no";
			jQuery(".project_description_general_link").click(function(){
			    if(project_description_general_link == "no"){
				jQuery(".project_description").fadeIn(300);
				project_description_general_link = "yes";
			    }else{
				jQuery(".project_description").fadeOut(300);
				project_description_general_link = "no";
			    }
			    jQuery(this).find(".text").toggle(300);
			});';
            }
            #hide show project description (close)

            #hide show tasks (open)
            if (1 == 1) {
                echo '
			var project_tasks_general_link = "no";
			jQuery(".project_tasks_general_link").click(function(){
			    if(project_tasks_general_link == "no"){
			        jQuery(".task_div").fadeIn(300);
				project_tasks_general_link = "yes";
			    }else{
				jQuery(".task_div").fadeOut(300);
				project_tasks_general_link = "no";
			    }
			    jQuery(this).find(".text").toggle(300);
			});';
            }
            #hide show tasks (close)

            #hide show subprojects (open)
            if (1 == 1) {
                echo '
			var project_subprojects_general_link = "yes";
			jQuery(".project_subprojects_general_link").click(function(){
			    if(project_subprojects_general_link == "no"){
				jQuery(".project_frame_level2").fadeIn(300);
				project_subprojects_general_link = "yes";
			    }else{
				jQuery(".project_frame_level2").fadeOut(300);
				project_subprojects_general_link = "no";
			    }
			    jQuery(this).find(".text").toggle(300);
			});';
            }
            #hide show subprojects (close)

            #hide show subprojects (open)
            if (1 == 1) {
                echo '
			jQuery(".project_new_general_link, .project_new_general_link_cancel").click(function(){
			    jQuery(".project_new_div").fadeToggle(300);
			});';
            }
            #hide show subprojects (close)

        }
        #general options (close)

        #specific options (open)
        if (1 == 1) {

            #subprojects link (open)
            if (1 == 1) {
                echo '
			jQuery(".subprojects_link_level1").click(function(){
			    jQuery(this).closest(".project_frame_level1").find(".project_frame_level2").toggle(150);
			});
			jQuery(".subprojects_link_level2").click(function(){
			    jQuery(this).closest(".project_frame_level2").find(".project_frame_level3").toggle(150);
			});';
            }
            #subprojects link (close)

            #task link (open)
            if (1 == 1) {
                echo '
			jQuery(".task_div_link").click(function(){
			    jQuery(this).closest(".project_div").find(".task_div").toggle(150);
			});';
            }
            #task link (close)

            #task description link (open)
            if (1 == 1) {
                echo '
			jQuery(".project_name").click(function(){
			    jQuery(this).closest(".project_div").find(".project_description").toggle(150);
			});';
            }
            #task description link (close)

        }
        #specific options (close)

        #hover div formatting (open)
        if (1 == 1) {
            echo '
		    jQuery(".content_div").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })
		    jQuery(".project_div").hover(function(){
			jQuery(this).css("background-color","#FF9B51");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })';
        }
        #hover div formatting (close)

        #content div (open) #dome
        if (1 == 5) {
            echo '
		    jQuery(".content_div_title").click(function(){
			jQuery(this).closest(".content_div").find(".content_div_content").fadeToggle(300);
		    })';
        }
        #content div (close)

        echo '
	    });
	</script>';

    }
    #jquery (close)

}
#projects (close)

#settings (open)
elseif ($page_section == "settings") {

    #style (open)
    if (1 == 1) {///4

        echo '<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  	          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<style>
	    .content_div{
		border-radius:20px;
		padding:20px;
		background-color:#FFD87D;
		margin:20px 0px;
		text-align:center;
	    }
	    .content_div_level2{
		padding:10px;
		background-color:#FFE7AE;
		margin:10px 0px;
		border-radius:10px;
	    }
	    .content_div_content{
		display:none;
	    }
	    .settings_title_row{
	    	border-radius: 8px !important;
	    }
	   a:hover{
	   color: orange;
	   }
	   a:link{
	   color:#8b0000;
	   }
	</style>';
    }
    #style (close)

    #jquery (open)
    if (1 == 1) {///5
        ?>
	<script>
	    jQuery(document).ready(function(){
		jQuery(".content_div_title").click(function(){
		    jQuery(this).closest(".content_div").find(".content_div_content").fadeToggle(150);
		});
            jQuery("#setting_module_save").click(function(){
                jQuery("#settings_form").submit();
            });
		});


        jQuery(document).on("click",".settings_anchor",function(){
        	jQuery(this).parent().find("i").toggleClass("fa-plus-square fa-minus-square");
            if(jQuery(this).parent().find("table").css('display') == 'none'){
                jQuery(this).parent().find("table").css('display','block');
            }
            else{
                jQuery(this).parent().find("table").css('display','none');
            }
    	});
    </script>
   <?php }
    #jquery (close)

    #mysql (open)
    if (1==1) {
        //array of settings option
        $settings = array('NGO Profile Management', 'Task Access', 'Forum Access');
        //array of settings prefix
        $setting_prefix = array('NGO', 'Task', 'Forum');
        //finding the length of settings prefix array
        $setting_prefix_length = sizeof($setting_prefix);
        //array of user roles
        $user_roles = array('Voluno NGO officer', 'NGO worker (Admin)', 'NGO worker', 'Volunteer advisor', 'Volunteer agent', 'Volunteer intern', 'Volunteer recruiter', 'Volunteer trainer', 'Volunteer worker');
        //array of user roles prefix
        $user_roles_prefix = array('Voluno_NGO_officer', 'NGO_worker_(Admin)', 'NGO_worker', 'Volunteer_advisor', 'Volunteer_agent', 'Volunteer_intern', 'Volunteer_recruiter', 'Volunteer_trainer', 'Volunteer_worker');
        //finding the length of user roles prefix array
        $user_roles_prefix_length = sizeof($user_roles_prefix);

        #delete-insert rows (open)
        if (isset($_POST['setting_submit_btn'])) { ///1

            #for loop for settings_prefix(open)
            for ($ald = 1; $ald <= $setting_prefix_length; $ald++) { ///3

                #for loop for user_roles_prefix(open)
                for ($ale = 1; $ale <= $user_roles_prefix_length; $ale++) { ///3
                    $post_request = $setting_prefix[$ald - 1] . "-" . $user_roles_prefix[$ale - 1];
                    //separate out name of particular radio button into two parts by '-'
                    $name_variable = explode('-', $post_request);

                    #switch case for settings title('NGO','forum','task') (open)
                    switch ($name_variable[0]) { ///1

                        #NGO case (open)
                        case 'NGO': {
                            //delete row from voluno_development_organizations_properties for NGO profile management for specific user role
                            $wpdb->query($wpdb->prepare('DELETE
                                                 FROM fi4l3fg_voluno_development_organizations_properties
                                                       WHERE ngo_prop_type_general = "settings"
                                                            AND ngo_prop_type_specific = %s
                                                            AND ngo_prop_type_detail = %s
                                                            AND ngo_prop_ngo_id = %d;',
                                $settings[$ald - 1], $user_roles[$ale - 1], $ngo_id));
                            //insert row into voluno_development_organizations_properties for NGO profile management for specific user role
                            $wpdb->insert(
                                'fi4l3fg_voluno_development_organizations_properties',
                                array(
                                    'ngo_prop_type_general' => 'settings',
                                    'ngo_prop_ngo_id' => 4,
                                    'ngo_prop_type_specific' => 'NGO Profile Management',
                                    'ngo_prop_type_detail' => $user_roles[$ale - 1],
                                    'ngo_prop_type_id' => $_POST[$post_request],
                                    'ngo_prop_type_status' => ''),
                                array(
                                    '%s',
                                    '%d',
                                    '%s',
                                    '%s',
                                    '%s',
                                    '%s'
                                ));
                            break;
                        }
                        #NGO case (close)

                        #Task case (open)
                        case 'Task': {
                            //delete row from voluno_development_organizations_properties for task access for specific user role
                            $wpdb->query($wpdb->prepare('DELETE
                                                 FROM fi4l3fg_voluno_development_organizations_properties
                                                       WHERE ngo_prop_type_general = "settings"
                                                            AND ngo_prop_type_specific = %s
                                                            AND  ngo_prop_type_detail = %s
                                                            AND ngo_prop_ngo_id = %d;',
                                $settings[$ald - 1], $user_roles[$ale - 1], $ngo_id));
                            //insert row into voluno_development_organizations_properties for task access for specific user role
                            $wpdb->insert(
                                'fi4l3fg_voluno_development_organizations_properties',
                                array(
                                    'ngo_prop_type_general' => 'settings',
                                    'ngo_prop_ngo_id' => 4,
                                    'ngo_prop_type_specific' => 'Task Access',
                                    'ngo_prop_type_detail' => $user_roles[$ale - 1],
                                    'ngo_prop_type_id' => $_POST[$post_request],
                                    'ngo_prop_type_status' => ''),
                                array(
                                    '%s',
                                    '%d',
                                    '%s',
                                    '%s',
                                    '%s',
                                    '%s'
                                ));
                            break;
                        }
                        #Task case (close)

                        #Forum case (open)
                        case 'Forum': {
                            //delete row from voluno_development_organizations_properties for forum access for specific user role
                            $wpdb->query($wpdb->prepare('DELETE
                                                 FROM fi4l3fg_voluno_development_organizations_properties
                                                       WHERE ngo_prop_type_general = "settings"
                                                            AND ngo_prop_type_specific = %s
                                                            AND  ngo_prop_type_detail = %s
                                                            AND ngo_prop_ngo_id = %d;',
                                $settings[$ald - 1], $user_roles[$ale - 1], $ngo_id));
                            //insert row into voluno_development_organizations_properties for forum access for specific user role
                            $wpdb->insert(
                                'fi4l3fg_voluno_development_organizations_properties',
                                array(
                                    'ngo_prop_type_general' => 'settings',
                                    'ngo_prop_ngo_id' => 4,
                                    'ngo_prop_type_specific' => 'Forum Access',
                                    'ngo_prop_type_detail' => $user_roles[$ale - 1],
                                    'ngo_prop_type_id' => $_POST[$post_request],
                                    'ngo_prop_type_status' => ''),
                                array(
                                    '%s',
                                    '%d',
                                    '%s',
                                    '%s',
                                    '%s',
                                    '%s'
                                ));
                            break;
                        }
                        #Forum case (open)

                        #default case (open)
                        default:
                            echo '';
                        #default case (close)

                    }
                    #switch case for settings title('NGO','forum','task') (close)

                }
                #for loop for user_roles_prefix(close)

            }
            #for loop for settings_prefix(close)

        }
        #delete-insert rows (close)

    }
    #mysql (close)

    #content (open)
    if (1 == 1) {

        #function-personal-pages.php (v1.0) (open)
        if (1 == 1) {
            $function_pers_pages_id = 5;
            $function_pers_pages_active_page = "Settings";
            include("#function-personal-pages.php");
            echo $function_pers_pages;
            #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
        }
        #function-personal-pages.php (v1.0) (close)
        echo "THIS SECTION IS STILL IN DEVELOPMENT."; #dome
        #title table (open)
        if (1 == 1) {
            echo '
	    <table>
		<tr>
		    <td style="width:70%;padding-right:20px;">';

            #left side of container (open)
            if (1 == 1) {

                #title (open)
                if (1 == 1) {

                    echo '
				<div style="text-align:center;margin-bottom:30px;">
				    <h1 style="display:inline;">
					' . $ngo_row->ngo_name . ':
				    </h1>
				    <br>
				    <h3 style="display:inline;">
					Organizational Settings
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
            if (1 == 1) {

                #ngo logo (open)
                if (1 == 1) {

                    #function-image-processing
                    #ngo logo
                    $function_propic__type = "ngo logo";
                    $function_propic__ngo_id = $ngo_id;
                    #all
                    $function_propic__geometry = array(289, 289); //optional, if e.g. only width: 300, NULL; vice versa
                    include('#function-image-processing.php');
                    echo '
				<div class="profile_edit_hover voluno_header_picture" style="margin-bottom:20px;">
				    <img class="ngo_logo voluno_brighter_on_hover" src="' . $function_propic . '"
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

        #settings module (open)
        if (1 == 1) {
            //array of settings option
            $settings = array('NGO Profile Management', 'Task Access', 'Forum Access');
            //calculating size of settings array
            $settings_length = sizeof($settings);
            //array of settings prefix options
            $setting_prefix = array('NGO', 'Task', 'Forum');
            //array of NGO settings options
            $settings_options_ngo = array('Can view', 'Can view and edit');
            //calculating size of settings_options_ngo array
            $settings_options_length_ngo = sizeof($settings_options_ngo);
            //array of user roles
            $user_roles = array('Voluno NGO officer', 'NGO worker (Admin)', 'NGO worker', 'Volunteer advisor', 'Volunteer agent', 'Volunteer intern', 'Volunteer recruiter', 'Volunteer trainer', 'Volunteer worker');
            //calculating size of user roles array
            $user_roles_length = sizeof($user_roles);
            //array of user roles prefix
            $user_roles_prefix = array('Voluno_NGO_officer', 'NGO_worker_(Admin)', 'NGO_worker', 'Volunteer_advisor', 'Volunteer_agent', 'Volunteer_intern', 'Volunteer_recruiter', 'Volunteer_trainer', 'Volunteer_worker');
            //array of task settings options
            $settings_options_task = array('Cannot view any tasks', 'Can view public elements of open (unassigned) tasks', 'Can view public elements of all tasks', 'Can view all tasks', 'Can view and edit all tasks');
            //calculating size of settings_options_task array
            $settings_options_length_task = sizeof($settings_options_task);
            //array of forum settings options
            $settings_options_forum = array('Can view and post in public forum', ' Can view and post in public and volunteer forum', 'Can view and post in public, volunteer and staff forum', 'Can view, post and moderate in public, volunteer and staff forum');
            //calculating  size of settings_options_forum array
            $settings_options_length_forum = sizeof($settings_options_forum);

            #settings form (open)
            if (1 == 1) {
                echo '<form id="settings_form" action="' . add_query_arg(NULL, NULL) . '" method="post">';
                for ($akq = 1; $akq <= $settings_length; $akq++) { ///3
                    echo '<div class="settings_title" style="margin-left:20px;position:relative;padding:20px;background-color:#FFEAB9;text-align:center;border-radius:20px;margin:20px 0px;display:block;"><a href="#' . $settings[$akq - 1] . '" class="settings_anchor" style="cursor:pointer;text-decoration:none;">' . $settings[$akq - 1] . '</a>
							<i class="fa fa-plus-square" style="position:absolute;font-size:20px;right:8px;color:#8B0000;"></i>';

                    #ngo profile management table(open)
                    if ($akq == 1) {
                        echo '<table style="display:none;color:#8B0000;" id="' . $settings[$akq - 1] . '">
						  <tr><th colspan="3"></th>';

                        #displaying heading row for NGO (open)
                        for ($akr = 1; $akr <= $settings_options_length_ngo; $akr++) { ///2
                            echo '<th style="text-align: center;width:60%;margin-left: 90px;">' . $settings_options_ngo[$akr - 1] . '</th>';
                        }
                        #displaying heading row for NGO (close)

                        echo '</tr>';

                        #displaying row of NGO table for each user role (open)
                        for ($aku = 1; $aku <= $user_roles_length; $aku++) { ///2
                            echo '<tr><td nowrap colspan="3">' . $user_roles[$aku - 1] . '</td>';
                            //checking availability of NGO rows in database
                            $isNGOAvailavle = $wpdb->prepare('SELECT ngo_prop_type_general
                                                          FROM fi4l3fg_voluno_development_organizations_properties
                                                          WHERE ngo_prop_type_specific = %s
                                                              AND ngo_prop_ngo_id = %d;',
                                $settings[$akq - 1], $ngo_id);
                            $check = $wpdb->get_var($isNGOAvailavle);

                            #fetching values from database for NGO if any (open)
                            if ($check != null) { ///1

                                #iterate each row in database for NGO (open)
                                for ($akv = 1; $akv <= $settings_options_length_ngo; $akv++) { ///1
                                    $settings_option_query = $wpdb->prepare('SELECT count(*)
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_general = "settings"
                                                            AND ngo_prop_type_specific = %s
                                                            AND ngo_prop_type_detail = %s
                                                            AND ngo_prop_type_id = %s
                                                            AND ngo_prop_ngo_id = %d;',
                                        $settings[$akq - 1], $user_roles[$aku - 1], $settings_options_ngo[$akv - 1], $ngo_id);
                                    $var = $wpdb->get_var($settings_option_query);
                                    if ($var == '1') { ///2
                                        //if radio button already set in database then set particular radio button
                                        echo '<td style="text-align: center;width:60%;margin-left: -90px;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$aku - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$aku - 1] . '"  value="' . $settings_options_ngo[$akv - 1] . '" type="radio" style="margin-left: 0px;" checked></td>';

                                    } else { ///2
                                        //if radio button is not set then unset particular radio button
                                        echo '<td style="text-align: center;width:60%";margin-left: -90px;><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$aku - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$aku - 1] . '"  value="' . $settings_options_ngo[$akv - 1] . '" type="radio" style="margin-left: 0px;"></td>';
                                    }
                                }
                                #iterate each row in database for NGO (close)

                            }
                            #fetching values from database for NGO if any (close)

                            #by default last radio button is set (open)
                            else {
                                for ($akw = 1; $akw <= $settings_options_length_ngo; $akw++) { ///2
                                    echo '<td style="text-align: center;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$aku - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$aku - 1] . '"  value="' . $settings_options_ngo[$akw - 1] . '" type="radio" style="margin-left: 0px;" checked></td>';
                                }
                            }
                            #by default last radio button is set (close)
                            echo '</tr>';
                        }
                        #displaying row of NGO table for each user role (close)

                        echo '</table>';
                        echo '</div>';
                    }
                    #ngo profile management table (close)

                    #task access table (open)
                    if ($akq == 2) {
                        echo '<table style="display:none;" id="' . $settings[$akq - 1] . '">
								<tr><th colspan="3"></th>';

                        #displaying heading row for task access (open)
                        for ($aks = 1; $aks <= $settings_options_length_task; $aks++) { ///2
                            echo '<th style="text-align: center;">' . $settings_options_task[$aks - 1] . '</th>';
                        }
                        #displaying heading row for task access (close)

                        echo '</tr>';

                        #displaying row of task access table for each user role (open)
                        for ($akx = 1; $akx <= $user_roles_length; $akx++) { ///2
                            echo '<tr><td nowrap colspan="3">' . $user_roles[$akx - 1] . '</td>';
                            //checking availability of task access rows in database
                            $isTaskAvailavle = $wpdb->prepare('SELECT ngo_prop_type_general
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_specific = "Task Access"
                                                           AND ngo_prop_ngo_id = %d;',
                                $ngo_id);
                            $check = $wpdb->get_var($isTaskAvailavle);

                            #fetching values from database for task access if any (open)
                            if ($check != null) { ///1

                                #iterate each row in database for task access (open)
                                for ($aky = 1; $aky <= $settings_options_length_task; $aky++) { ///1
                                    //fetching values form database
                                    $settings_option_query = $wpdb->prepare('SELECT count(*)
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_general = "settings"
                                                            AND ngo_prop_type_specific = %s
                                                            AND ngo_prop_type_detail = %s
                                                            AND ngo_prop_type_id = %s
                                                            AND ngo_prop_ngo_id = %d;',
                                        $settings[$akq - 1], $user_roles[$akx - 1], $settings_options_task[$aky - 1], $ngo_id);
                                    $var = $wpdb->get_var($settings_option_query);
                                    if ($var == '1') { ///2
                                        //if radio button already set in database then set particular radio button
                                        echo '<td style="text-align: center;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$akx - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$akx - 1] . '"  value="' . $settings_options_task[$aky - 1] . '" type="radio" style="margin-left: 0px;" checked></td>';
                                    } else { ///2
                                        //if radio button is not set then unset particular radio button
                                        echo '<td style="text-align: center;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$akx - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$akx - 1] . '"  value="' . $settings_options_task[$aky - 1] . '" type="radio" style="margin-left: 0px;"></td>';
                                    }
                                }
                                #iterate each row in database for task access (close)
                            }
                            #fetching values from database for task access if any (close)

                            #by default last radio button is set (open)
                            else {
                                for ($akz = 1; $akz <= $settings_options_length_task; $akz++) { ///2
                                    echo '<td style="text-align: center;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$akx - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$akx - 1] . '"  value="' . $settings_options_task[$akz - 1] . '" type="radio" style="margin-left: 0px;" checked></td>';
                                }
                            }
                            #by default last radio button is set (close)

                            echo '</tr>';
                        }
                        #displaying row of task access table for each user role (close)

                        echo '</table>';
                        echo '</div>';
                    }
                    #task access table (close)

                    #forum access table (open)
                    if ($akq == 3) {
                        echo '<table style="display:none;" id="' . $settings[$akq - 1] . '">
								<tr><th colspan="3"></th>';

                        #displaying heading row for forum access (open)
                        for ($akt = 1; $akt <= $settings_options_length_forum; $akt++) { ///2
                            echo '<th style="text-align: center;">' . $settings_options_forum[$akt - 1] . '</th>';
                        }
                        #displaying heading row for forum access (close)

                        echo '</tr>';

                        #displaying row of forum access table for each user role (open)
                        for ($ala = 1; $ala <= $user_roles_length; $ala++) { ///2
                            echo '<tr><td nowrap colspan="3">' . $user_roles[$ala - 1] . '</td>';
                            //checking availability of forum access rows in database
                            $isForumAvailavle = $wpdb->prepare('SELECT ngo_prop_type_general
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_specific = "Forum Access"
                                                           AND ngo_prop_ngo_id = %d;',
                                $ngo_id);
                            $check = $wpdb->get_var($isForumAvailavle);

                            #fetching values from database for forum access if any (open)
                            if ($check != null) { ///1

                                #iterate each row in database for forum access (open)
                                for ($alb = 1; $alb <= $settings_options_length_forum; $alb++) { ///1
                                    $settings_option_query = $wpdb->prepare('SELECT count(*)
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_general = "settings"
                                                            AND ngo_prop_type_specific = %s
                                                            AND ngo_prop_type_detail = %s
                                                            AND ngo_prop_type_id = %s
                                                            AND ngo_prop_ngo_id = %d;',
                                        $settings[$akq - 1], $user_roles[$ala - 1], $settings_options_forum[$alb - 1], $ngo_id);
                                    $var = $wpdb->get_var($settings_option_query);
                                    if ($var == '1') { ///2
                                        //if radio button already set in database then set particular radio button
                                        echo '<td style="text-align: center;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$ala - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$ala - 1] . '"  value="' . $settings_options_forum[$alb - 1] . '" type="radio" style="margin-left: 0px;" checked></td>';
                                    } else { ///2
                                        //if radio button is not set then unset particular radio button
                                        echo '<td style="text-align: center;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$ala - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$ala - 1] . '"  value="' . $settings_options_forum[$alb - 1] . '" type="radio" style="margin-left: 0px;"></td>';
                                    }
                                }
                                #iterate each row in database for forum access (close)

                            }
                            #fetching values from database for forum access if any (close)

                            #by default last radio button is set (open)
                            else { ///2
                                for ($alc = 1; $alc <= $settings_options_length_forum; $alc++) {
                                    echo '<td style="text-align: center;"><input name="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$ala - 1] . '" id="' . $setting_prefix[$akq - 1] . '-' . $user_roles_prefix[$ala - 1] . '"  value="' . $settings_options_forum[$alc - 1] . '" type="radio" style="margin-left: 0px;" checked></td>';
                                }
                            }
                            #by default last radio button is set (close)

                            echo '</tr>';
                        }
                        #displaying row of forum access table for each user role (close)

                        echo '</table>';
                        echo '</div>';
                    }
                    #forum access table (close)

                }
                echo '<button name="setting_submit_btn" id="setting_module_save" class="col-md-offset-5 voluno_button" style="width:80px;margin-bottom: 40px;margin-left:420px;">Save</button></form>';
            }
            #settings form (close)
        }
        #settings module (close)
    }
    #content (close)

}
#settings (close)

#profile (open)
else {
    #arm (open)
    if (1 == 1) {

        #admin
        #staff member
        #agent
        #settings

    }
    #arm (close)

    #mysql
    if (1 == 1) {
        #Update Ngo Profile (open)
        if (1 == 1) {
            /*
                        one line unformatted text (city, name, occupation, etc.)
                        url readable text (url, user_nicename, etc.) (sanitize_title)
                        email address
                        plain text with line breaks (biography)
                        code (php files)
                    */
            #NGO Description's Update Query (open)
            if (isset($_POST['update_profile_description'])) {
                $update_statement = $_POST['update_profile_description'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_short_description' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Description's Update Query (close)

            #NGO Mission's Update Query (open)
            if (isset($_POST['update_profile_mission'])) {
                $update_statement = $_POST['update_profile_mission'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_mission' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_mission'];
            }
            #NGO Mission's Update Query (close)

            #NGO History's Update Query (open)
            if (isset($_POST['update_profile_history'])) {
                $update_statement = $_POST['update_profile_history'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)
                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_history' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_mission'];
            }
            #NGO History's Update Query (close)

            #NGO Impact Area's Update Query (open)
            if (isset($_POST['update_profile_impact_area'])) {
                $update_statement = $_POST['update_profile_impact_area'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_geographic_impact' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_mission'];
            }
            #NGO Impact Area's Update Query (close)

            #NGO Staff Number's Update Query (open)
            if (isset($_POST['update_profile_staff_num'])) {
                $update_statement = $_POST['update_profile_staff_num'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_staff_num' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_mission'];
            }
            #NGO Staff Number's Update Query (close)

            #NGO Development Topic's Update Query (open)
            if (isset($_POST['update_profile_development_area'])) {
                $update_statement = $_POST['update_profile_development_area'];

                $development_topics_query = $wpdb->prepare('SELECT ngo_prop_id
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_general = "development topic"
                                                            AND ngo_prop_ngo_id = %d;',
                    $ngo_id);
                $development_topics_results = $wpdb->get_results($development_topics_query);
                $length = sizeof($development_topics_results);
                for ($i = 0; $i < $length; $i++) {
                    $development_topics_id = $development_topics_results[$i]->ngo_prop_id;
                    $wpdb->update(
                        'fi4l3fg_voluno_development_organizations_properties',
                        array( //updated content
                            'ngo_prop_type_id' => $update_statement[$i]
                        ),
                        array( //location of updated content
                            'ngo_prop_id' => $development_topics_id
                        ),
                        array( //format of updated content
                            '%s'
                        ),
                        array( //format of location of updated content
                            '%d'
                        ));
                }
            }
            #NGO Development Topic's Update Query (close)

            #NGO Foundation Date's Update Query (open)
            if (isset($_POST['update_profile_date_founded_day'])) {
                $day = $_POST['update_profile_date_founded_day'];
                $month = $_POST['update_profile_date_founded_month'];
                $year = $_POST['update_profile_date_founded_year'];
                $date = $year . '-' . $month . '-' . $day;
                $date = strtotime($date);
                $date = date('Y-m-d h:i:s', $date);
                $update_statement = $date;
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_date_founded' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
            }
            #NGO Foundation Date's Update Query (open)

            #NGO Email's Update Query (open)
            if (isset($_POST['update_profile_email'])) {
                $update_statement = $_POST['update_profile_email'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "email address";
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_email' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Email's Update Query (close)

            #NGO Phone's Update Query (open)
            if (isset($_POST['update_profile_phone'])) {
                $update_statement = $_POST['update_profile_phone'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)


                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_phone' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Phone's Update Query (close)

            #NGO Youtube's Update Query (open)
            if (isset($_POST['update_profile_youtube'])) {
                $update_statement = $_POST['update_profile_youtube'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "url readable text (url, user_nicename, etc.) (sanitize_title)";
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_youtube' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Youtube's Update Query (close)

            #NGO Facebook's Update Query (open)
            if (isset($_POST['update_profile_facebook'])) {
                $update_statement = $_POST['update_profile_facebook'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "url readable text (url, user_nicename, etc.) (sanitize_title)";
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_facebook' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Facebook's Update Query (close)

            #NGO Twitter's Update Query (open)
            if (isset($_POST['update_profile_twitter'])) {
                $update_statement = $_POST['update_profile_twitter'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "url readable text (url, user_nicename, etc.) (sanitize_title)";
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_twitter' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Twitter's Update Query (close)

            #NGO Website's Update Query (open)
            if (isset($_POST['update_profile_website'])) {
                $update_statement = $_POST['update_profile_website'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "url readable text (url, user_nicename, etc.) (sanitize_title)";
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_website' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Website's Update Query (close)

            #NGO Street Name's Update Query (open)
            if (isset($_POST['update_profile_street_name'])) {
                $update_statement = $_POST['update_profile_street_name'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_street_name' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Street Name's Update Query (close)

            #NGO Street Nr's Update Query (open)
            if (isset($_POST['update_profile_street_nr'])) {
                $update_statement = $_POST['update_profile_street_nr'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_street_nr' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Street Nr's Update Query (close)

            #NGO Area Code's Update Query (open)
            if (isset($_POST['update_profile_area_code'])) {
                $update_statement = $_POST['update_profile_area_code'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_area_code' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Area Code's Update Query (close)

            #NGO City's Update Query (open)
            if (isset($_POST['update_profile_city'])) {
                $update_statement = $_POST['update_profile_city'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_city' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO City's Update Query (close)

            #NGO State's Update Query (open)
            if (isset($_POST['update_profile_state'])) {
                $update_statement = $_POST['update_profile_state'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_state' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO State's Update Query (close)

            #NGO Country's Update Query (open)
            if (isset($_POST['update_profile_country'])) {
                $update_statement = $_POST['update_profile_country'];
                #function-sanitize-text.php (v1.0) (open)
                if (1 == 1) {
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                    $function_sanitize_text__text = $update_statement;
                    include('#function-sanitize-text.php');
                    #output
                    $update_statement = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (v1.0) (close)

                $wpdb->update(
                    'fi4l3fg_voluno_development_organizations',
                    array( //updated content
                        'ngo_country' => $update_statement
                    ),
                    array( //location of updated content
                        'ngo_id' => $ngo_row->ngo_id
                    ),
                    array( //format of updated content
                        '%s'
                    ),
                    array( //format of location of updated content
                        '%d'
                    ));
                //echo $_POST['update_profile_description'];
            }
            #NGO Country's Update Query (close)
        }
        #Update Ngo Profile (close)

        #add contact
        if (!empty($_GET['add_contact']) AND $ngo_admin == "no" AND empty($profile_page_owner_blocked_row)) { //only execute if a) activated, b) it's not me and c) user is NOT yet my contact
            $wpdb->insert(
                'fi4l3fg_voluno_personal_settings',
                array(
                    'pers_settings_general' => 'contact',
                    'pers_settings_specific' => 'not blocked',
                    'pers_settings_value' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                    'pers_settings_user_id' => $profile_page_owner_row->usersext_id
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                ));
            $wpdb->insert(
                'fi4l3fg_voluno_personal_settings',
                array(
                    'pers_settings_general' => 'contact',
                    'pers_settings_specific' => 'not blocked',
                    'pers_settings_value' => $profile_page_owner_row->usersext_id,
                    'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                ));
        }
        #add contact

        #get data (open)
        if (1 == 1) {

            #ngo info (open)
            if (1 == 1) {
                $ngo_query = $wpdb->prepare('SELECT *
                        FROM fi4l3fg_voluno_development_organizations
                        LEFT JOIN ( ' .#tranform country number to country name
                    'SELECT list_countries_name as ngo_country_name, list_countries_id as ngo_country_name_id
                                  FROM fi4l3fg_voluno_lists_countries
                                  ) as aaa_ngo_country_name
                          ON ngo_country = ngo_country_name_id
                        LEFT JOIN ( ' .#tranform country number to country name
                    'SELECT list_countries_name as ngo_geographic_impact_name, list_countries_id as ngo_geographic_impact_name_id
                                  FROM fi4l3fg_voluno_lists_countries
                                  ) as bbb_ngo_geographic_impact_name
                          ON ngo_geographic_impact = ngo_geographic_impact_name_id
                        WHERE ngo_id = %d;'
                    , $does_ngo_exist_row->ngo_id);
                $ngo_row = $wpdb->get_row($ngo_query);
            }
            #ngo info

            #all affiates (open)
            if (1 == 1) {
                $all_affiliates_query = $wpdb->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        LEFT JOIN fi4l3fg_voluno_users_extended
                                                            ON ngo_prop_type_id = usersext_id
                                                        '#LEFT JOIN fi4l3fg_voluno_records_sum
                    #    ON ngo_prop_type_id = record_sum_user_id
                    . 'WHERE ngo_prop_type_general = "position"
                                                            AND ngo_prop_type_specific = "worker"
                                                            AND ngo_prop_type_status = "accepted"
                                                            AND ngo_prop_ngo_id = %d
                                                        ORDER BY ngo_prop_type_detail DESC, usersext_displayName ASC;',
                    $ngo_row->ngo_id);
                $all_affiliates_results = $wpdb->get_results($all_affiliates_query);
            }
            #all affiates (close)

            #development topics (open)
            if (1 == 1) {
                $development_topics_query = $wpdb->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_general = "development topic"
                                                            AND ngo_prop_ngo_id = %d;',
                    $ngo_row->ngo_id);
                $development_topics_results = $wpdb->get_results($development_topics_query);
            }
            #development topics (close)

            #user role (open)
            if (1 == 1) {

                foreach ($all_affiliates_results as $id_check) {
                    if ($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $id_check->usersext_id AND $id_check->ngo_prop_type_detail == "admin") {
                        $ngo_admin = "yes";
                    } elseif ($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $id_check->usersext_id) {
                        $ngo_admin = "no";
                    }
                }
            }
            #user role (close)

        }
        #get data (close)

    }
    #mysql

    #jquery (open)
    if (1 == 1) {
        echo '
	<script>
	    jQuery(document).ready(function(){';

        #update browser title (my profile -> name) (open)
        if (1 == 1) {
            echo '
		    jQuery(document).attr("title", "Voluno | ' . $ngo_row->ngo_name . ' (Profile)");';
        }
        #update browser title (my profile -> name) (close)

        #profile picture hover (open)
        if (1 == 1) {
            echo '
		    jQuery(".ngo_logo").hover(function(){
			jQuery(this).css("opacity","0.85");
		    },function(){
			jQuery(this).css("opacity","");
		    })';
        }
        #profile picture hover (close)

        #hover content div (open)
        if (1 == 1) {
            echo '
		    jQuery(".profile_content_div").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })';
        } elseif (1 == 1) {
            echo '
		    jQuery(".profile_content_div").hover(function(){
			jQuery(this).css("border","1px dashed black");
			jQuery(this).css("padding","19");
		    },function(){
			jQuery(this).css("border","");
			jQuery(this).css("padding","20");
		    })';
        }
        #hover content div (close)

        #hover function_button: add contact (only activated if its not the owner. see div below)(open)
        if ($ngo_admin == "no") {
            echo '
		    jQuery(".function_button").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
			jQuery(this).find(".function_button_popup").fadeIn(200);
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
			jQuery(this).find(".function_button_popup").fadeOut(200);
		    })';
        }
        #hover function_button: add contact (only activated if its not the owner. see div below) (close)

        #voluno button hover (open)
        if (1 == 1) {
            echo '
		    jQuery(".voluno_button").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })';
        }
        #voluno button hover (close)

        #edit profile (open)
        if ($ngo_admin == "yes") {
            echo '
		    jQuery(".profile_edit_hover").hover(function(){
			jQuery(this).find(".profile_edit_tooltip").show();
		    },function(){
			jQuery(this).find(".profile_edit_tooltip").hide();
		    });
		    jQuery(".edit_profile_text_button").click(function(){
			jQuery(".profile_page_edit").show();
			jQuery(".profile_page_editable").hide();
			jQuery(".profile_edit_tooltip").not(".profile_pic_tooltip").css("z-index","-500");
		    });
		    jQuery(".edit_profile_text_cancel").click(function(){
			jQuery(".profile_page_edit").hide();
			jQuery(".profile_page_editable").show();
			jQuery(".profile_edit_tooltip").css("z-index","500");
		    });
		    jQuery(".edit_profile_text_save").click(function(){
			jQuery(".update_profile").submit();
		    });
		    jQuery(".profile_content_div").hover(function(){
			jQuery(this).find(".edit_profile_text_button").show();
		    },function(){
			jQuery(this).find(".edit_profile_text_button").hide();
		    })';

            #if updated email address already exists in database
            if ($email_already_exists_in_database == "yes") {
                echo '
			alert("' .
                    'Unfortunately, we were unable to update your primary email address. ' .
                    'The reason for this is that the email address you provided already exists in our database.' .
                    '\n\nFor security and quality control reasons, we can only allow one account per person. ' .
                    'If you have another account and lost the passwort, please contact our support via info@voluno.org.");';
            }
            #if updated email address already exists in database

            #if updated email address already exists in database
            if ($alt_email_already_exists_in_database == "yes") {
                echo '
			alert("' .
                    'Unfortunately, we were unable to update your alternative email address. ' .
                    'The reason for this is that the email address you provided already exists in our database.' .
                    '\n\nFor security and quality control reasons, we can only allow one account per person. ' .
                    'If you have another account and lost the passwort, please contact our support via info@voluno.org.");';
            }
            #if updated email address already exists in database

            #alt email: please look at confirm email (open)
            if ($alt_email_please_confirm_via_email == "yes") {
                echo '
			alert("' .
                    'For security reasons, you need to confirm that the alternative email address you entered actually belongs to you.\n' .
                    'Please do so by visiting the link in the email we just sent you.\n\nThanks!");';
            }
            #alt email: please look at confirm email (close)

            #primary email: please look at confirm email (open)
            if ($primary_email_please_confirm_via_email == "yes") {
                echo '
			alert("' .
                    'For security reasons, you need to confirm that the primary email address you entered actually belongs to you.\n' .
                    'Please do so by visiting the link in the email we just sent you.\n\nThanks!");';
            }
            #primary email: please look at confirm email (close)

            #cv update and delete (open)
            if (1 == 1) {

                #cv delete (open)
                if (!empty($profile_page_owner_row->cv)) { //only relevant if a cv already exists

                    echo '
			    jQuery(".current_cv_file").hover(function(){
				jQuery(this).css("background-color","#FFF5E0");
				jQuery(this).css("cursor","pointer");
			    },function(){
				jQuery(this).css("background-color","#FFC977");
				jQuery(this).css("cursor","default");
			    });

			    jQuery(".current_cv_file").click(function(){
				jQuery(".delete_cv_view_current_file span").trigger("click");
			    });

			    jQuery(".delete_cv_button").click(function(){
				deleteCvAreYouSure = confirm("' .
                        'Your current CV is:\n\n' . $profile_page_owner_row->cv . '\n\nAre you sure you want to delete this file?");
				if(deleteCvAreYouSure == true){
				    jQuery(".delete_cv_hidden_form_field").val("true");
				    jQuery(".update_profile").submit();
				}
			    });
			    ';
                }
                #cv delete (close)

                #cv update (open)
                if (1 == 1) {
                    echo '
			    jQuery(".select_cv_input_hidden").change(function(){
				jQuery(".select_cv_input_shown").val(jQuery(this).val());
				jQuery(".select_cv_input_hidden_check").val("true");
			    });
			    jQuery(".select_cv_activation_area").click(function(){
				jQuery(".select_cv_input_hidden").click();
			    });
			    ';
                }
                #cv update (close)

            }
            #cv update and delete (close)

        }
        #edit profile (close)

        #cv upload error message + show cv div (open)
        if (1 == 1) {
            echo '
		    jQuery(".show_cv_div_button").click(function(){
			jQuery(".cv_div").fadeIn(300);
		    });';

            if ($is_cv_pdf_file_check == "no") {
                echo '
			alert("The file you uploaded is not a valid PDF document. Please only upload PD");';
            }

        }
        #cv upload error message + show cv div (close)

        echo '
	    });
	</script>';
    }
    #jquery (close)

    #style (open)
    if (1 == 1) {
        echo '
        <style>';

        #ngo logo (open)
        if (1 == 1) {
            echo '
                .ngo_logo{
                    padding:10px;
                    box-shadow: 0px 0px 3px grey;
                }';
        }
        #ngo logo (close)

        echo '
          .profile_content_div{
             border-radius:20px;
             padding:20px;
             margin-bottom:20px;
          }

          .profile_content_div h4{
             display:inline;
          }

          .function_button{
             cursor:pointer;
          }

          .voluno_button, .profile_edit_tooltip, .edit_profile_text_cancel, .edit_profile_text_save{
             cursor:pointer;
             background-color:#8B0000 !important;
             margin-top:5px;
             color:#fff;
             padding:10px;
             border-radius:250px;
             font-weight:bold;
             text-align: center;
             color:#fff;
             -webkit-touch-callout: none;
             -webkit-user-select: none;
             -khtml-user-select: none;
             -moz-user-select: none;
             -ms-user-select: none;
             user-select: none;
          }
          .voluno_button:hover, .profile_edit_tooltip:hover, .edit_profile_text_cancel:hover, .edit_profile_text_save:hover{
             background-color: #D6341D !important;
          }

          .content_div_title_td{
             font-weight:bold;
             text-align:right;
             padding-right:20px !important;
          }

          .content_div_content_td{
             text-align:justify;
          }';

        #edit profile (open)
        if ($ngo_admin == "yes") {
            echo '
             .profile_edit_tooltip{
                position:absolute;
                display:none;
             }

             .profile_page_edit{
                display:none;
                text-align:center;
             }
             .profile_page_editable{

             }

             .edit_profile_text_cancel{

             }
             ';
        }
        #edit profile (close)

        echo '
       </style>';
    }
    #style (close)

    #content (open)
    if (1 == 1) {

        #img processing function executions (open)
        if (1 == 1) {

            #function-image-processing.php --> edit img
            #thematic only
            $function_propic__type = "thematic";
            $function_propic__original_img_name = "edit_white.png";
            #all
            $function_propic__geometry = array(30, 30); //optional, if e.g. only width: 300, NULL; vice versa
            include('#function-image-processing.php');
            $function_propic_edit_ngo_img_path_full = $function_propic;
        }
        #img processing function executions (close)

        #preparation (open)
        if (empty($ngo_row->ngo_name_sub)) {
            $ngo_name_short_or_long = $ngo_row->ngo_name;
        } else {
            $ngo_name_short_or_long = $ngo_row->ngo_name . ' - ' . $ngo_row->ngo_name_sub;
        }
        #preparation (close)

        #function-personal-pages.php (v1.0) (open)
        if (1 == 1) {
            $function_pers_pages_id = 5;
            $function_pers_pages_active_page = "Profile";
            include("#function-personal-pages.php");
            echo $function_pers_pages;
            #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
        }
        #function-personal-pages.php (v1.0) (close)

        #open form (open)
        if ($ngo_admin == "yes") {
            echo '
            <form
                action="' . add_query_arg(NULL, NULL) . '"
                method="post"
                name="update_profile"
                class="update_profile"
                enctype="multipart/form-data"
            >';
        }
        #open form (close)

        #table (open)
        if (1 == 1) {
            echo '
                <table>
                    <tr>
                        <td style="width:70%;padding-right:20px;">';

            #left side of container (open)
            if (1 == 1) {

                #title (open)
                if (1 == 1) {

                    #function-breadcrums.php
                   $function_breadcrums__left[] = "View all development organizations"; //optional
                   $function_breadcrums__left[] = get_permalink(); //optional
                    include('#function-breadcrums.php');

                    echo '
                                    <div style="text-align:center;margin-bottom:30px;">
                                        <h1 style="display:inline;">
                                            ' . $ngo_row->ngo_name . '
                                        </h1>';
                    if (!empty($ngo_row->ngo_name_sub)) {
                        echo '
                                            <br>
                                            <h3 style="display:inline;">
                                                ' . $ngo_row->ngo_name_sub . '
                                            </h3>';
                    }
                    echo '
                                    </div>';
                }
                #title (close)

                #content div: personal information (open)
                if (1 == 1) {
                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">';

                    #edit tooltip (get image [only once] and create div) (open)
                    if ($ngo_admin == "yes") {
                        echo '
                                            <div
                                                class="profile_edit_tooltip edit_profile_text_button"
                                                style="margin:-40px 0px 0px 250px;" title="Edit profile text">';
                        echo '
                                                <img src="' . $function_propic_edit_ngo_img_path_full . '">
                                            </div>';
                    }
                    #edit tooltip (get image [only once] and create div) (open)

                    echo '
                                        <h4>
                                            Description
                                        </h4>
                                        <table>';

                    #preparation of edit fields for array (open)
                    if ($ngo_admin == "yes") {

                        #description (open)
                        if (1 == 1) {
                            $input_description =
                                '<textarea ' .
                                'name="update_profile_description" ' .
                                'placeholder="Present your organization in one ' .
                                'sentence. For example: We are ... and we are trying to ...' .
                                ' so that ... ." ' .
                                'style="width:100%;height:5em;resize:vertical;" ' .
                                '>' . $ngo_row->ngo_short_description . '</textarea>';
                        }
                        #description (close)

                        #mission (open)
                        if (1 == 1) {
                            $input_mission =
                                '<textarea ' .
                                'name="update_profile_mission" ' .
                                'placeholder="What is the aim of your organiztation? ' .
                                'What are you trying to achieve, in the near and in the far future? ' .
                                'What strategy are you using to accomplish your goals? ' .
                                'In short: Expain what your organization is today and what you ' .
                                'Plan to achieve in the future." ' .
                                'style="width:100%;height:5em;resize:vertical;" ' .
                                '>' . $ngo_row->ngo_mission . '</textarea>';
                        }
                        #mission (close)

                        #history (open)
                        if (1 == 1) {
                            $input_history =
                                '<textarea ' .
                                'name="update_profile_history" ' .
                                'placeholder="How did your organization get where it is today? ' .
                                'How were you founded? How were the first years? What did you ' .
                                'change until today and why? Which problems did you overcome ' .
                                'and which ones are still present?" ' .
                                'style="width:100%;height:5em;resize:vertical;" ' .
                                '>' . $ngo_row->ngo_history . '</textarea>';
                        }
                        #history (close)

                        #impact area (open)
                        if (1 == 1) {

                            $input_impact_area = '<select name="update_profile_impact_area">';

                            #mysql query - world (open)
                            if (1 == 1) {
                                $impact_area_world = $wpdb->prepare('SELECT *
                                                                                                FROM fi4l3fg_voluno_list_sorting
                                                                                                WHERE voluno_liso_item_type = "country"
                                                                                                    AND voluno_liso_item_level = "1 - world"');
                                $impact_area_world = $wpdb->get_results($impact_area_world);
                            }
                            #mysql query - world  (close)

                            #loop - world (open)
                            for ($q1 = 0; $q1 < count($impact_area_world); $q1++) {

                                #content - world  (open)
                                if (1 == 1) {
                                    if ($ngo_row->ngo_geographic_impact == $impact_area_world[$q1]->voluno_liso_item_id) {
                                        $selected = 'selected="selected"';
                                    } else {
                                        $selected = '';
                                    }
                                    $input_impact_area =
                                        $input_impact_area .
                                        '<option
                                                                    style="font-weight:bold;"
                                                                    ' . $selected . '
                                                                    value="' . $impact_area_world[$q1]->voluno_liso_item_id . '"
                                                                >
                                                                    Global: ' . $impact_area_world[$q1]->voluno_liso_item_name . '
                                                                </option>';
                                }
                                #content - world  (close)

                                #mysql query - continents (open)
                                if (1 == 1) {

                                    $impact_area_continents = $wpdb->prepare('SELECT *
                                                                                                    FROM fi4l3fg_voluno_list_sorting
                                                                                                    WHERE voluno_liso_item_type = "country"
                                                                                                        AND voluno_liso_parent_l7 = %d;'
                                        , $impact_area_world[$q1]->voluno_liso_item_id);
                                    $impact_area_continents = $wpdb->get_results($impact_area_continents);
                                }
                                #mysql query - continents  (close)

                                #loop - continents (open)
                                for ($q2 = 0; $q2 < count($impact_area_continents); $q2++) {

                                    #content - continents (open)
                                    if (1 == 1) {
                                        if ($ngo_row->ngo_geographic_impact ==
                                            $impact_area_continents[$q2]->voluno_liso_item_id
                                        ) {
                                            $selected = 'selected="selected"';
                                        } else {
                                            $selected = '';
                                        }
                                        $input_impact_area =
                                            $input_impact_area .
                                            '<option
                                                                        style="font-weight:bold;font-style:italic;padding-left:10px;"
                                                                        ' . $selected . '
                                                                        value="' . $impact_area_continents[$q2]->voluno_liso_item_id . '"
                                                                    >
                                                                        Continent: ' . $impact_area_continents[$q2]->voluno_liso_item_name . '
                                                                    </option>';
                                    }
                                    #content - continents (close)

                                    #mysql query - regions (open)
                                    if (1 == 1) {

                                        $impact_area_regions = $wpdb->prepare('SELECT *
                                                                                                        FROM fi4l3fg_voluno_list_sorting
                                                                                                        WHERE voluno_liso_item_type = "country"
                                                                                                            AND voluno_liso_parent_l7 = %d;'
                                            , $impact_area_continents[$q2]->voluno_liso_item_id);
                                        $impact_area_regions = $wpdb->get_results($impact_area_regions);
                                    }
                                    #mysql query - regions  (close)

                                    #loop - regions (open)
                                    for ($q3 = 0; $q3 < count($impact_area_regions); $q3++) {

                                        #content - regions (open)
                                        if (1 == 1) {
                                            if ($ngo_row->ngo_geographic_impact ==
                                                $impact_area_regions[$q3]->voluno_liso_item_id
                                            ) {
                                                $selected = 'selected="selected"';
                                            } else {
                                                $selected = '';
                                            }
                                            $input_impact_area =
                                                $input_impact_area .
                                                '<option
                                                                            style="font-weight:bold;padding-left:20px;"
                                                                            ' . $selected . '
                                                                            value="' . $impact_area_regions[$q3]->voluno_liso_item_id . '"
                                                                        >
                                                                            Region: ' . $impact_area_regions[$q3]->voluno_liso_item_name . '
                                                                        </option>';
                                        }
                                        #content - regions (close)

                                        #mysql query - countries (open)
                                        if (1 == 1) {

                                            $impact_area_countries = $wpdb->prepare('SELECT *
                                                                                                            FROM fi4l3fg_voluno_list_sorting
                                                                                                            WHERE voluno_liso_item_type = "country"
                                                                                                                AND voluno_liso_parent_l7 = %d;'
                                                , $impact_area_regions[$q3]->voluno_liso_item_id);
                                            $impact_area_countries = $wpdb->get_results($impact_area_countries);
                                        }
                                        #mysql query - countries  (close)

                                        #loop - countries (open)
                                        for ($q4 = 0; $q4 < count($impact_area_countries); $q4++) {

                                            #content - countries (open)
                                            if (1 == 1) {
                                                if ($ngo_row->ngo_geographic_impact ==
                                                    $impact_area_countries[$q4]->voluno_liso_item_id
                                                ) {
                                                    $selected = 'selected="selected"';
                                                } else {
                                                    $selected = '';
                                                }
                                                $input_impact_area =
                                                    $input_impact_area .
                                                    '<option
                                                                                style="padding-left:30px;"
                                                                                ' . $selected . '
                                                                                value="' . $impact_area_countries[$q4]->voluno_liso_item_id . '"
                                                                            >
                                                                                ' . $impact_area_countries[$q4]->voluno_liso_item_name . '
                                                                            </option>';
                                            }
                                            #content - countries (close)

                                        }
                                        #loop - countries (close)

                                    }
                                    #loop - regions (close)

                                }
                                #loop - continents (close)

                            }
                            #loop - world (close)

                            $input_impact_area = $input_impact_area . '</select>';

                        }
                        #impact area (close)

                        #staff num (open)
                        if (1 == 1) {
                            $input_staff_num =
                                '<input
                                                            type="text"
                                                            value="' . $ngo_row->ngo_staff_num . '"
                                                            name="update_profile_staff_num"
                                                        >';
                        }
                        #staff num (close)

                        #development area (open)
                        if (1 == 1) {
                            #selected (open)

                            $dev_area_array = array(
                                array($development_topics_results[0]->ngo_prop_type_id, $input_dev_array1),
                                array($development_topics_results[1]->ngo_prop_type_id, $input_dev_array2),
                                array($development_topics_results[2]->ngo_prop_type_id, $input_dev_array3),
                                array($development_topics_results[3]->ngo_prop_type_id, $input_dev_array4)
                            );

                            for ($b = 0; $b < count($dev_area_array); $b++) {
                                $dev_area_array[$b][1] = '
                                                            <div style="margin-bottom:5px;">
                                                            <select name="update_profile_development_area[]">';

                                #mysql query - level1 (open)
                                if ($b == 0) {
                                    $impact_area_level1 = $wpdb->prepare('SELECT *
                                                                                                    FROM fi4l3fg_voluno_lists_dev_topics
                                                                                                    WHERE dev_topic_parent = "0"
                                                                                                    ORDER BY dev_topic_name ASC;');
                                    $impact_area_level1 = $wpdb->get_results($impact_area_level1);
                                }
                                #mysql query - level1  (close)

                                #loop - level1 (open)
                                for ($q1 = 0; $q1 < count($impact_area_level1); $q1++) {

                                    #content - level1  (open)
                                    if (1 == 1) {
                                        if ($dev_area_array[$b][0] == $impact_area_level1[$q1]->dev_topic_id) {
                                            $selected = 'selected="selected"';
                                        } else {
                                            $selected = '';
                                        }
                                        $dev_area_array[$b][1] =
                                            $dev_area_array[$b][1] .
                                            '<option
                                                                        style="font-weight:bold;"
                                                                        ' . $selected . '
                                                                        value="' . $impact_area_level1[$q1]->dev_topic_id . '"
                                                                    >
                                                                        ' . $impact_area_level1[$q1]->dev_topic_name . '
                                                                    </option>';
                                    }
                                    #content - level1  (close)

                                    #mysql query - level2 (open)
                                    if (1 == 1) {

                                        $impact_area_level2 = $wpdb->prepare('SELECT *
                                                                                                        FROM fi4l3fg_voluno_lists_dev_topics
                                                                                                        WHERE dev_topic_parent = %d
                                                                                                        ORDER BY dev_topic_name ASC;'
                                            , $impact_area_level1[$q1]->dev_topic_id);
                                        $impact_area_level2 = $wpdb->get_results($impact_area_level2);
                                    }
                                    #mysql query - level2  (close)

                                    #loop - level2 (open)
                                    for ($q2 = 0; $q2 < count($impact_area_level2); $q2++) {

                                        #content - level2 (open)
                                        if (1 == 1) {
                                            if ($dev_area_array[$b][0] ==
                                                $impact_area_level2[$q2]->dev_topic_id
                                            ) {
                                                $selected = 'selected="selected"';
                                            } else {
                                                $selected = '';
                                            }
                                            $dev_area_array[$b][1] =
                                                $dev_area_array[$b][1] .
                                                '<option
                                                                            style="padding-left:30px;"
                                                                            ' . $selected . '
                                                                            value="' . $impact_area_level2[$q2]->dev_topic_id . '"
                                                                        >
                                                                            ' . $impact_area_level2[$q2]->dev_topic_name . '
                                                                        </option>';
                                        }
                                        #content - level2 (close)

                                        #mysql query - level3 (open)
                                        if ($b == 0) {

                                            $impact_area_level3 = $wpdb->prepare('SELECT *
                                                                                                            FROM fi4l3fg_voluno_lists_dev_topics
                                                                                                            WHERE dev_topic_parent = %d
                                                                                                            ORDER BY dev_topic_name ASC;'
                                                , $impact_area_level2[$q2]->dev_topic_id);
                                            $impact_area_level3 = $wpdb->get_results($impact_area_level3);
                                        }
                                        #mysql query - level3  (close)

                                        #loop - level3 (open)
                                        for ($q3 = 0; $q3 < count($impact_area_level3); $q3++) {

                                            #content - level3 (open)
                                            if (1 == 1) {
                                                if ($dev_area_array[$b][0] ==
                                                    $impact_area_level3[$q3]->dev_topic_id
                                                ) {
                                                    $selected = 'selected="selected"';
                                                } else {
                                                    $selected = '';
                                                }
                                                $dev_area_array[$b][1] =
                                                    $dev_area_array[$b][1] .
                                                    '<option
                                                                                style="padding-left:50px;font-style:italic;color:grey;"
                                                                                ' . $selected . '
                                                                                value="' . $impact_area_level3[$q3]->dev_topic_id . '"
                                                                            >
                                                                                ' . $impact_area_level3[$q3]->dev_topic_name . '
                                                                            </option>';
                                            }
                                            #content - level3 (close)

                                        }
                                        #loop - level3 (close)

                                    }
                                    #loop - level2 (close)

                                }
                                #loop - level1 (close)

                                $dev_area_array[$b][1] = $dev_area_array[$b][1] . '</select></div>';

                                $input_dev_area = $input_dev_area . $dev_area_array[$b][1];

                            }

                        }
                        #development area (close)

                        #date founded (open)
                        if (1 == 1) {

                            #if no founded date selected yet (open)
                            if (1 == 1) {
                                if ($ngo_row->ngo_date_founded == "0000-00-00") {
                                    $selected_nothing = 'selected="selected"';
                                } else {
                                    $selected_nothing = '';
                                }
                            }
                            #if no founded date selected yet (close)

                            #day (open)
                            if (1 == 1) {
                                $input_date_founded = '<select name="update_profile_date_founded_day">
                                                            <option value="" ' . $selected_nothing . '></option>';
                                for ($x_day = 1; $x_day <= 31; $x_day++) {
                                    if (date("j", strtotime($ngo_row->ngo_date_founded))
                                        == $x_day AND empty($selected_nothing)
                                    ) {
                                        $selected = 'selected="selected"';
                                    } else {
                                        $selected = '';
                                    }
                                    $input_date_founded =
                                        $input_date_founded . '
                                                                    <option ' . $selected . ' value="' . $x_day . '">
                                                                        ' . $x_day . '
                                                                    </option>';
                                }
                                $input_date_founded = $input_date_founded . '</select>';
                            }
                            #day (open)

                            #month (open)
                            if (1 == 1) {
                                $months_array = array('January', 'February', 'March', 'April', 'May', 'June',
                                    'July', 'August', 'September', 'October', 'November', 'December');
                                $input_date_founded = $input_date_founded . '<select name="update_profile_date_founded_month">
                                                            <option value="" ' . $selected_nothing . '></option>';
                                for ($x_month = 1; $x_month <= 12; $x_month++) {
                                    if (date("n", strtotime($ngo_row->ngo_date_founded))
                                        == $x_month AND empty($selected_nothing)
                                    ) {
                                        $selected = 'selected="selected"';
                                    } else {
                                        $selected = '';
                                    }
                                    $input_date_founded =
                                        $input_date_founded . '
                                                                    <option ' . $selected . ' value="' . $x_month . '">
                                                                        ' . $months_array[$x_month - 1] . '
                                                                    </option>';
                                }
                                $input_date_founded = $input_date_founded . '</select>';
                            }
                            #month (close)

                            #year (open)
                            if (1 == 1) {
                                $input_date_founded = $input_date_founded . '<select name="update_profile_date_founded_year">
                                                            <option value="" ' . $selected_nothing . '></option>';
                                for ($x_year = date("Y"); $x_year >= 1900; $x_year--) {
                                    if (date("Y", strtotime($ngo_row->ngo_date_founded))
                                        == $x_year AND empty($selected_nothing)
                                    ) {
                                        $selected = 'selected="selected"';
                                    } else {
                                        $selected = '';
                                    }
                                    $input_date_founded =
                                        $input_date_founded . '
                                                                    <option ' . $selected . ' value="' . $x_year . '">
                                                                        ' . $x_year . '
                                                                    </option>';
                                }
                                $input_date_founded = $input_date_founded . '</select>';
                            }
                            #year (close)

                        }
                        #date founded (close)

                    }
                    #preparation of edit fields for array (close)

                    #prepare non-edit view (open)
                    if (1 == 1) {

                        $description = '<p>' . $ngo_row->ngo_short_description . '/<p>';

                        #mission (open)
                        if (1 == 1) {
                            unset($mission);
                            if (!empty($ngo_row->ngo_mission)) {
                                #function-only-first-x-symbols.php
                                $function_only_first_x_symbols = $ngo_row->ngo_mission; #content
                                $function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
                                $function_only_first_x_symbols_variable = "yes";
                                include('#function-only-first-x-symbols.php');
                                $mission = '<p>' . $function_only_first_x_symbols . '</p>';
                            }
                        }
                        #mission (close)

                        #history (open)
                        if (1 == 1) {
                            unset($history);
                            if (!empty($ngo_row->ngo_history)) {
                                #function-only-first-x-symbols.php
                                $function_only_first_x_symbols = $ngo_row->ngo_history; #content
                                $function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
                                $function_only_first_x_symbols_variable = "yes";
                                include('#function-only-first-x-symbols.php');
                                $history = '<p>' . $function_only_first_x_symbols . '</p>';
                            }
                        }
                        #history (close)

                        #date founded (open)
                        if (1 == 1) {
                            unset($date_founded);
                            if ($ngo_row->ngo_date_founded != "0000-00-00 00:00:00") {
                                #function-timezone.php
                                $function_timezone = $ngo_row->ngo_date_founded;
                                $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
                                //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                //"date (weekday short)","time (hour min sec)","time (hour min)"
                                include('#function-timezone.php');
                                #output:
                                $date_founded = $function_timezone;
                            }
                        }
                        #date founded (close)

                        #member since (open)
                        if (1 == 1) {
                            unset($member_since);
                            if ($ngo_row->ngo_date_founded != "0000-00-00") {
                                #function-timezone.php
                                $function_timezone = $ngo_row->ngo_date_created;
                                $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
                                //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                //"date (weekday short)","time (hour min sec)","time (hour min)"
                                include('#function-timezone.php');
                                #output:
                                $member_since = $function_timezone;
                            }
                        }
                        #member since (close)

                    }
                    #prepare non-edit view (close)

                    #array (open)
                    if (1 == 1) {
                        $content_div_pers_info = array(
                            array("In one sentence", $description, $input_description),
                            array("Mission", $mission, $input_mission),
                            array("History", $history, $input_history),
                            array("Impact area", $ngo_row->ngo_geographic_impact_name, $input_impact_area),
                            array("Staff number", $ngo_row->ngo_staff_num, $input_staff_num),
                            array("Development area(s)", $development_area, $input_dev_area),
                            array("Founded", $date_founded, $input_date_founded),
                            array("Joined Voluno", $member_since, "")
                        );
                    }
                    #array (close)

                    #not edit area (open)
                    for ($index_a = 0; $index_a < count($content_div_pers_info); $index_a++) {
                        if (!empty($content_div_pers_info[$index_a][1])) {
                            echo '
                                                    <tr class="profile_page_editable">
                                                        <td class="content_div_title_td" style="width:130px;">
                                                            ' . $content_div_pers_info[$index_a][0] . ':
                                                        </td>
                                                        <td colspan="' . $colspan . '" class="content_div_content_td">';
                            if ($ngo_admin == "yes") {
                                echo
                                '<span class="profile_page_editable">';
                            }
                            echo
                            $content_div_pers_info[$index_a][1];
                            if ($ngo_admin == "yes") {
                                echo
                                '</span>';
                            }
                            echo '
                                                        </td>
                                                    </tr>';
                        }
                    }
                    #not edit area (close)

                    #edit area (open)
                    if ($ngo_admin == "yes") {
                        for ($index_a = 0; $index_a < count($content_div_pers_info); $index_a++) {
                            if (!empty($content_div_pers_info[$index_a][2])) {
                                echo '
                                                        <tr class="profile_page_edit">
                                                            <td class="content_div_title_td">
                                                                ' . $content_div_pers_info[$index_a][0] . ':
                                                            </td>
                                                            <td class="content_div_content_td">
                                                                ' . $content_div_pers_info[$index_a][2] . '
                                                            </td>
                                                        </tr>';
                            }
                        }
                        echo '
                                                <tr class="profile_page_edit">
                                                    <td colspan="2">
                                                        <table style="margin:auto;">
                                                            <tr>
                                                                <td style="text-align:center;">
                                                                    <div
                                                                        class="edit_profile_text_cancel profile_page_edit"
                                                                        style="width:60px;margin-left:auto;margin-right:10px;"
                                                                    >
                                                                        Cancel
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="_editprofile_text_save profile_page_edit"
                                                                        style="width:60px;margin-right:auto;margin-left:10px;"
                                                                    >
                                                                        Save
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>';
                    }
                    #edit area (close)

                    echo '
                                        </table>
                                    </div>';
                }
                #content div: personal information (close)

                #content div: voluno record (open) #dome
                if (2 == 1) {
                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">
                                        <h4>
                                            <a
                                                href="' . get_permalink(794) . '?subsection=12"
                                                title="Click to visit the Orientation Guide page about reputation and experience"
                                                target="_blank"
                                            >
                                                Total staff reputation and experience
                                            </a>
                                        </h4>';

                    #prepare record data (open)
                    if (1 == 1) {
                        $ts_reputation_counter = 0;
                        for ($m = 0; $m < count($all_affiliates_results); $m++) {
                            if ($all_affiliates_results[$m]->record_reputation_ratings >= 3) { //only rate where ratings exist!
                                $ts_reputation = $ts_reputation + $all_affiliates_results[$m]->record_sum_reputation;
                                $ts_quality_of_work = $ts_quality_of_work + $all_affiliates_results[$m]->record_sum_quality_of_work;
                                $ts_respect_of_deadl = $ts_respect_of_deadl + $all_affiliates_results[$m]->record_sum_respect_of_deadlines;
                                $ts_com_quantity = $ts_com_quantity + $all_affiliates_results[$m]->record_sum_communication_quantity;
                                $ts_com_quality = $ts_com_quality + $all_affiliates_results[$m]->record_sum_communiocation_quality;
                                $ts_politeness = $ts_politeness + $all_affiliates_results[$m]->record_sum_politeness;
                                $ts_reputation_counter++; //counts members in organization with ratings
                            }

                            if ($m + 1 == count($all_affiliates_results)) { //takes the average of the sums of all ratings
                                $ts_reputation = $ts_reputation / $ts_reputation_counter;
                                $ts_quality_of_work = $ts_quality_of_work / $ts_reputation_counter;
                                $ts_respect_of_deadl = $ts_respect_of_deadl / $ts_reputation_counter;
                                $ts_com_quantity = $ts_com_quantity / $ts_reputation_counter;
                                $ts_com_quality = $ts_com_quality / $ts_reputation_counter;
                                $ts_politeness = $ts_politeness / $ts_reputation_counter;
                            }

                            $ts_experience = $ts_experience + $all_affiliates_results[$m]->record_sum_experience;
                            $ts_messages_sent = $ts_messages_sent + $all_affiliates_results[$m]->record_sum_messages_sent;
                            $ts_forum_posts = $ts_forum_posts + $all_affiliates_results[$m]->record_sum_forum_posts;
                            $ts_tasks_created = $ts_tasks_created + $all_affiliates_results[$m]->record_sum_tasks_created;
                            $ts_tasks_completed = $ts_tasks_completed + $all_affiliates_results[$m]->record_sum_tasks_completed;
                            $ts_trainings_given = $ts_trainings_given + $all_affiliates_results[$m]->record_sum_trainings_given;
                        }

                        if ($ts_reputation_counter == 0) {//if there are no ratings yet
                            $ts_reputation = '<span style="color:grey;font-style:italic;">No rating yet.</span>';
                            $ts_quality_of_work = $ts_reputation;
                            $ts_respect_of_deadl = $ts_reputation;
                            $ts_com_quantity = $ts_reputation;
                            $ts_com_quality = $ts_reputation;
                            $ts_politeness = $ts_reputation;
                        } else {
                            $ts_reputation = number_format($ts_reputation, 2);
                            $ts_quality_of_work = number_format($ts_quality_of_work, 2);
                            $ts_respect_of_deadl = number_format($ts_respect_of_deadl, 2);
                            $ts_com_quantity = number_format($ts_com_quantity, 2);
                            $ts_com_quality = number_format($ts_com_quality, 2);
                            $ts_politeness = number_format($ts_politeness, 2);
                        }

                        $reputation_array = array(
                            array('Total reputation', $ts_reputation),
                            array('Quality of work', $ts_quality_of_work),
                            array('Respect of deadlines', $ts_respect_of_deadl),
                            array('Communication quantity', $ts_com_quantity),
                            array('Communication quality', $ts_com_quality),
                            array('Politeness', $ts_politeness)
                        );
                        $experience_array = array(
                            array('Total experience', intval($ts_experience)),
                            array('Messages sent', intval($ts_messages_sent)),
                            array('Forum posts', intval($ts_forum_posts)),
                            array('Tasks created', intval($ts_tasks_created)),
                            array('Tasks completed', intval($ts_tasks_completed)),
                            array('Trainings given', intval($ts_trainings_given))
                        );
                    }
                    #prepare record data (close)

                    #display table (open)
                    if (1 == 1) {

                        echo '
                                            <table>';
                        for ($index_b = 0; $index_b < max(count($reputation_array), count($experience_array)); $index_b++) {
                            #bold title and link to explanation (open)
                            if ($index_b == 0) {
                                $style = 'style="font-weight:bold;"';
                            } else {
                                $style = "";
                            }
                            #bold title and link to explanation (close)
                            $title_width = 30;
                            $rating_width = 50 - $title_width;
                            echo '
                                                    <tr ' . $style . '>
                                                        <td style="width:' . $title_width . '%;">
                                                            ' . $reputation_array[$index_b][0] . ':
                                                        </td>
                                                        <td style="width:' . $rating_width . '%;">
                                                            ' . $reputation_array[$index_b][1] . '
                                                        </td>
                                                        <td style="width:' . $title_width . '%;">
                                                            ' . $experience_array[$index_b][0] . ':
                                                        </td>
                                                        <td style="width:' . $rating_width . '%;">
                                                            ' . $experience_array[$index_b][1] . '
                                                        </td>
                                                    </tr>';
                        }
                        echo '
                                            </table>';
                    }
                    #display table (close)

                    echo '
                                    </div>';
                }
                #content div: voluno record (close)

                #content div: tasks (open)
                if (1 == 1) {

                    #preparation (open)
                    if (1 == 1) {
                        
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
										
										#is WordPress object $wpdb loaded yet? (open)
										if(!isset($wpdb)){
											global $wpdb;
										}
										#is WordPress object $wpdb loaded yet? (close)
										
										$function_table['query'] = $wpdb->prepare('SELECT *
                                                                                        FROM fi4l3fg_voluno_items_tasks
                                                                                        WHERE task_ngo_id = %d
																					AND task_status = "unassigned";'
																					,$ngo_id
																				  );
										$function_table['results'] = $wpdb->get_results($function_table['query']);
										
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
											
											$function_table['data'][$ajl]['task_description'] = $function_table['results'][$ajl]->task_description;
											$function_table['data'][$ajl]['task_name'] = $function_table['results'][$ajl]->task_name;
											$function_table['data'][$ajl]['task_status'] = $function_table['results'][$ajl]->task_status;
											
											$function_table['data'][$ajl]['task_code'] = $function_table['results'][$ajl]->task_code;
											$function_table['data'][$ajl]['task_date_entered'] = $function_table['results'][$ajl]->task_date_entered;
											$function_table['data'][$ajl]['task_deadline'] = $function_table['results'][$ajl]->task_deadline;
											$function_table['data'][$ajl]['task_assignment_deadline'] = $function_table['results'][$ajl]->task_assignment_deadline;
											
											$function_table['data'][$ajl]['task_author_id'] = $function_table['results'][$ajl]->task_author_id;
											$function_table['data'][$ajl]['task_ngo_id'] = $function_table['results'][$ajl]->task_ngo_id;
											
											$function_table['data'][$ajl]['task_project_id'] = $function_table['results'][$ajl]->task_project_id;
											$function_table['data'][$ajl]['task_id'] = $function_table['results'][$ajl]->task_id;
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
									
									$function_table['unique id'] = 'ngo_tasks_dgfongiuerguoer';
									// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
									
									#Options connected to the title (open)
									if(1==1){
										
										#$function_table['display title'] = 'Please add a title.';
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
												'heading'		 => 'Task',
												'width'			 => '20%',
												'sorting option' => 'task_name'
											),
											array(
												'heading'		 => 'Description',
												'width'			 => '75%'
											)
										);
										
										//Optionally, you can choose one of the above columns to be the default sorting option.
										// If you don't want this, please delete or hide the entire array.
										$function_table['default ordering']
										= array(
											'column' => 'task_name', // Colum name. In the example, 'email' or 'id'.
											'direction' => 'ASC' // ASC or DESC
										);
										
									}
									#Headings and sorting (close)
									
									#Pagination (open)
									if(1==1){
										
										// If the table doesn't have a lot of space, you can make the pagination 'thin'. Then, the 'first page', 'previous page', 'items per page',
										// 'next page' and 'last page' buttons will aligned vertically, instead of horizontally -> they will be slimmer.
										$function_table['thin_pagination'] = 'yes'; // 'yes' or 'no' (default)
									}
									#Pagination (close)
									
									#Display a message if no data available (open)
									if(1==1){
										
										// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
										// Here, you can modify this message.
										
										$function_table['no_items_available_message'] = array(
										    'lines' => 'yes' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
										    ,'content' => 'There are currently no open tasks available.' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
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
									
									#1 (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td>
											'.number_format(($abs+1),0,"."," ").'
										</td>
										';
										
									}
									#1 (close)
									
									#2 (open)
									if(1==1){
										
										$function_table['table rows'] .= '
										<td>
											<a
												href="'.get_permalink(688).'?type=task&id='.$function_table['data'][$abs]['task_id'].'"
												title="Go to task"
											>
												'.$function_table['data'][$abs]['task_name'].'
											</a>
										</td>
										';
										
									}
									#2 (close)
									
									#3 (open)
									if(1==1){
										
										#preparation (open)
										if(1==1){
											
											#function-only-first-x-symbols.php (v1.0) (open)
											if(1==1){
												
												$function_only_first_x_symbols = $function_table['data'][$abs]['task_description']; #content
												$function_only_first_x_symbols_num = 200; #optional, number of symbols, default is 100
												#$function_only_first_x_symbols__more_button = "no"; //default: yes, empty
												include('#function-only-first-x-symbols.php');
												#output: $function_only_first_x_symbols
												
											}
											#function-only-first-x-symbols.php (v1.0) (close)
											
										}
										#preparation (close)
										
										#content (open)
										if(1==1){
											
											$function_table['table rows'] .= '
											<td>
												<p>
													'.$function_only_first_x_symbols.'
												</p>
											</td>
											';
											
										}
										#content (close)
										
									}
									#3 (close)
									
									$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
								} //Don't touch this. 
								#Cells/Columns (close)
								
							}
							#design (close)
							
							$function_table['part'] = 2; //Don't touch this. 
							include('#function-table.php'); //Don't touch this. 
							
							#output
							//the entire output is stored in the following variable:
							
						}
						#function-table.php (v1.0) (close)
						
                    }
                    #preparation (close)

                    #content (open)
                    if (1 == 1) {
                        echo '
					<div class="profile_content_div" style="background-color:#FFEAB9;text-align:center;">
					    <h4>
						Open Tasks
					    </h4>
					    ' . $function_table['output table'] . '
					</div>';
                    }
                    #content (close)

                }
                #content div: tasks (close)

            }
            #left side of container (close)

            echo '
                        </td>
                        <td style="text-align:center;">';

            #right side of container (open)
            if (1 == 1) {

                #ngo logo (open)
                if (1 == 1) {

                    #function-image-processing
                    #ngo logo
                    $function_propic__type = "ngo logo";
                    $function_propic__ngo_id = $ngo_id;
                    #all
                    $function_propic__geometry = array(289, 289); //optional, if e.g. only width: 300, NULL; vice versa
                    include('#function-image-processing.php');
                    echo '
                                    <div class="profile_edit_hover" style="margin-bottom:20px;">
                                        <img class="ngo_logo voluno_brighter_on_hover" src="' . $function_propic . '"
                                            style="

                                            "
                                        >';
                    if ($ngo_admin == "yes") {
                        echo '
                                          <a href="' . get_permalink() . '?view_as=edit_profile_picture">
                                             <div class="profile_edit_tooltip profile_pic_tooltip" style="margin-top:-320px;margin-left:270px;" title="Edit profile picture">
                                                <img src="' . $function_propic_edit_ngo_img_path_full . '">
                                             </div>
                                          </a>';
                    }
                    echo '
                                    </div>';
                }
                #ngo logo (close)

                #message + add as contact (open) #dome
                if (2 == 3 AND $ngo_admin == "no") { //no need to see this if the user is profile page owner
                    echo '
                                   <div style="background-color:#FFEAB9;padding:10px;border-radius:25px;margin:20px 0px;">
                                      <table>
                                         <tr style="text-align:center;">
                                            <td style="width:50%">';
                    $relationship_status_query = $wpdb->prepare('SELECT *
                                                                                FROM fi4l3fg_voluno_personal_settings
                                                                                WHERE pers_settings_general = "contact"
                                                                                   AND pers_settings_general = "not blocked"
                                                                                   AND pers_settings_value = %s
                                                                                   AND pers_settings_user_id = %s;'
                        , $profile_page_owner_row->usersext_id
                        , $GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $relationship_status_row = $wpdb->get_results($relationship_status_query);
                    echo '
                                               <div class="function_button" style="border-radius:20px;padding:10px;background-color:#FFEAB9;">';
                    if (empty($relationship_status_row)) {
                        echo '
                                                  <img
                                                     style="width:80px;opacity:0.4;filter:grayscale(1);-webkit-filter:grayscale(1);filter:gray;"
                                                     src="' . wp_upload_dir()['url'] . '/pictures/contact_add.png"
                                                  >';

                        #add contact (only activated if its not the owner. see jquery) (open)
                        if (1 == 1) {
                            echo '
                                                     <div
                                                        class="function_button_popup"
                                                        style="
                                                           cursor:default;
                                                           display:none;
                                                           position:absolute;
                                                           background-color:#fff;
                                                           border:1px solid black;
                                                           width:150px;
                                                           margin-left:-40px;
                                                           border-radius:20px;
                                                           padding:20px;
                                                           "
                                                     >
                                                        <p style="font-weight:bold;text-align:center;">
                                                           Add contact?
                                                        </p>
                                                        <p style="text-align:justify;">
                                                        He or she will appear in your contacts and vice versa.
                                                        </p>
                                                        <a
							    href="' .
                                get_permalink(686) .
                                '?user_identification=' . $_GET['user_identification'] . '&add_contact=1">
							    <div class="voluno_button" style=""width:50px;">
								Add contact
							    </div>
                                                        </a>
                                                     </div>';
                        }
                        #add contact (only activated if its not the owner. see jquery) (close)

                    } else {
                        echo '
                                                  <img
                                                     style="width:80px;"
                                                     src="' . wp_upload_dir()['url'] . '/pictures/contact_added.png"
                                                  >';
                    }
                    echo '
                                               </div>
                                            </td>
                                            <td>
                                               <div class="function_button" style="border-radius:20px;padding:10px;background-color:#FFEAB9;">';
                    if (empty($relationship_status_row)) {
                        echo '
                                                  <img
                                                     style="width:80px;"
                                                     src="' . wp_upload_dir()['url'] . '/pictures/chat-message.png"
                                                  >';
                    } else {
                        echo '
                                                  <img
                                                     style="width:80px;"
                                                     src="' . wp_upload_dir()['url'] . 'pictures/chat-message.png"
                                                  >';
                    }
                    echo '
                                               </div>
                                            </td>
                                         </tr>
                                      </table>
                                   </div>';
                }
                #message + add as contact (close)

                #content div: Contact Information (open)
                if (1 == 1) {
                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">';

                    #edit tooltip (get image [only once] and create div) (open)
                    if ($ngo_admin == "yes") {
                        echo '
                                            <div
                                                class="profile_edit_tooltip edit_profile_text_button"
                                                style="margin:-40px 0px 0px 250px;" title="Edit profile text"
                                            >
                                                <img src="' . $function_propic_edit_ngo_img_path_full . '">
                                            </div>';
                    }
                    #edit tooltip (get image [only once] and create div) (open)

                    echo '
                                        <h4>
                                            Contact Information
                                        </h4>
                                        <table>';

                    #display preparation (open)
                    if (1 == 1) {
                        $facebook_link = '
                                                    <a
                                                        href="' . esc_url('https://www.facebook.com/' . $ngo_row->ngo_facebook) . '"
                                                        title="' . esc_url('https://www.facebook.com/' . $ngo_row->ngo_facebook) . '"
                                                    >
                                                        Visit Facebook page
                                                    </a>';
                        $twitter_link = '
                                                    <a
                                                        href="' . esc_url('https://twitter.com/' . $ngo_row->ngo_twitter) . '"
                                                        title="' . esc_url('https://twitter.com/' . $ngo_row->ngo_twitter) . '"
                                                    >
                                                        Visit Twitter page
                                                    </a>';
                        $website = '
                                                    <a
                                                        href="' . $ngo_row->ngo_website . '"
                                                        title="Open website of ' . $ngo_row->ngo_name . ' in new window"
                                                        target="_blank"
                                                    >
                                                        ' . $ngo_row->ngo_website . '
                                                    </a>';

                        #address (open)
                        if (1 == 1) {
                            if (!empty($ngo_row->ngo_street_name) AND !empty($ngo_row->ngo_street_nr)) {
                                $street_and_house_num = $ngo_row->ngo_street_name . ' ' . $ngo_row->ngo_street_nr;
                            } elseif (!empty($ngo_row->ngo_street_name) AND empty($ngo_row->ngo_street_nr)) {
                                $street_and_house_num = $ngo_row->ngo_street_name;
                            }
                            if (!empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)) {
                                $area_code_and_city = $ngo_row->ngo_area_code . ' ' . $ngo_row->ngo_city;
                            } elseif (!empty($ngo_row->ngo_city) AND empty($ngo_row->ngo_area_code)) {
                                $area_code_and_city = $ngo_row->ngo_city;
                            } elseif (empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)) {
                                $area_code_and_city = $ngo_row->ngo_area_code;
                            }
                            $address_array = array(
                                $street_and_house_num,
                                $area_code_and_city,
                                $ngo_row->ngo_state,
                                $ngo_row->ngo_country_name);
                            $address_array = array_filter($address_array);
                            $address = implode(",<br>", $address_array);
                        }
                        #address (close)
                    }
                    #display preparation links (close)

                    #input preparation (open)
                    if (1 == 1) {

                        $input_email =
                            '<input
                                                    type="text"
                                                    value="' . $ngo_row->ngo_email . '"
                                                    name="update_profile_email"
                                                >';

                        $input_phone =
                            '<input
                                                    type="text"
                                                    value="' . $ngo_row->ngo_phone . '"
                                                    name="update_profile_phone"
                                                >';

                        $input_youtube =
                            '<input
                                                    type="text"
                                                    value="' . $ngo_row->ngo_youtube . '"
                                                    name="update_profile_youtube"
                                                >';

                        $input_facebook =
                            '<input
                                                    type="text"
                                                    value="' . $ngo_row->ngo_facebook . '"
                                                    name="update_profile_facebook"
                                                >';

                        $input_twitter =
                            '<input
                                                    type="text"
                                                    value="' . $ngo_row->ngo_twitter . '"
                                                    name="update_profile_twitter"
                                                >';

                        $input_website =
                            '<input
                                                    type="text"
                                                    value="' . $ngo_row->ngo_website . '"
                                                    name="update_profile_website"
                                                >';

                        #address (open)
                        if (1 == 1) {
                            $input_address = '
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        style="width:110px;"
                                                                        value="' . $ngo_row->ngo_street_name . '"
                                                                        name="update_profile_street_name"
                                                                    >
                                                                    <input
                                                                        type="text"
                                                                        style="width:25px;"
                                                                        value="' . $ngo_row->ngo_street_nr . '"
                                                                        name="update_profile_street_nr"
                                                                    >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        style="width:40px;"
                                                                        value="' . $ngo_row->ngo_area_code . '"
                                                                        name="update_profile_area_code"
                                                                    >
                                                                    <input
                                                                        type="text"
                                                                        style="width:95px;"
                                                                        value="' . $ngo_row->ngo_city . '"
                                                                        name="update_profile_city"
                                                                    >
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        style="width:151px;"
                                                                        value="' . $ngo_row->ngo_state . '"
                                                                        name="update_profile_state"
                                                                    >
                                                                </td>
                                                            </tr>';
                            $input_residence_country =
                                '<tr><td><select name="update_profile_country">';
                            $input_residence_country_query = $wpdb->get_results('SELECT *
												    FROM fi4l3fg_voluno_lists_countries
												    WHERE list_countries_type = "country"
												    ORDER BY list_countries_name ASC');
                            for ($x_63420875 = 0; $x_63420875 < count($input_residence_country_query); $x_63420875++) {
                                if ($ngo_row->ngo_country == $input_residence_country_query[$x_63420875]->list_countries_id) {
                                    $selected = 'selected="selected"';
                                } else {
                                    $selected = '';
                                }
                                $input_residence_country =
                                    $input_residence_country .
                                    '<option
							    ' . $selected . '
							    value="' . $input_residence_country_query[$x_63420875]->list_countries_id . '"
							>
							    ' . $input_residence_country_query[$x_63420875]->list_countries_name . '
							</option>';
                            }
                            $input_residence_country =
                                $input_residence_country .
                                '</select></td></tr></table>';
                            $input_address = $input_address . $input_residence_country;
//                                                            <tr>
//                                                                <td>
//                                                                    <input
//                                                                        type="text"
//                                                                        style="width:151px;"
//                                                                        value="'.$ngo_row->ngo_country.'"
//                                                                        name="update_profile_country"
//                                                                    >
//                                                                    <select style="width:151px;" name="update_profile_country">
//                                                                    	<option>
//                                                                    	</option>
//                                                                    </select>
//                                                                </td>
//                                                            </tr>
                        }
                        #address (close)

                    }
                    #input preparation (close)

                    #table arrays for contact info (open)
                    if (1 == 1) {
                        $content_div_contact_info = array(
                            array("Email", $ngo_row->ngo_email, $input_email, 1),
                            array("Phone", $ngo_row->ngo_phone, $input_phone, 1),
                            array("Youtube", $ngo_row->ngo_youtube, $input_youtube, 1),
                            array("Facebook", $facebook_link, $input_facebook, $ngo_row->facebook),
                            array("Twitter", $twitter_link, $input_twitter, $ngo_row->twitter),
                            array("Website", $website, $input_website, 1),
                            array("Address", $address, $input_address, 1)


                        );
                    }
                    #table arrays for contact info (close)

                    #display, not edit area (open)
                    for ($index_a = 0; $index_a < count($content_div_contact_info); $index_a++) {
                        if (
                            (!empty($content_div_contact_info[$index_a][1])
                                AND
                                $content_div_contact_info[$index_a][3] == 1)
                            OR
                            ($content_div_contact_info[$index_a][3] != 1
                                AND
                                !empty($content_div_contact_info[$index_a][3]))
                        ) {
                            echo '
                                                    <tr class="profile_page_editable">
                                                        <td style="font-weight:bold;text-align:right;padding-right:20px;">
                                                            ' . $content_div_contact_info[$index_a][0] . ':
                                                        </td>
                                                        <td>
                                                            ' . $content_div_contact_info[$index_a][1] . '
                                                        </td>
                                                    </tr>';
                        }
                    }
                    #display, not edit area (close)

                    #edit area (open)
                    if ($ngo_admin == "yes") {
                        for ($index_a = 0; $index_a < count($content_div_contact_info); $index_a++) {
                            echo '
                                                    <tr class="profile_page_edit">
                                                        <td class="content_div_title_td">
                                                            ' . $content_div_contact_info[$index_a][0] . ':
                                                        </td>
                                                        <td class="content_div_content_td">
                                                            ' . $content_div_contact_info[$index_a][2] . '
                                                        </td>
                                                    </tr>';
                        }
                        echo '
                                                <tr class="profile_page_edit">
                                                    <td colspan="2">
                                                        <table style="margin:auto;">
                                                            <tr>
                                                                <td style="text-align:center;">
                                                                    <div
                                                                        class="edit_profile_text_cancel profile_page_edit"
                                                                        style="width:60px;margin-left:auto;margin-right:10px;"
                                                                    >
                                                                        Cancel
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="edit_profile_text_save profile_page_edit"
                                                                        style="width:60px;margin-right:auto;margin-left:10px;"
                                                                    >
                                                                        Save
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>';
                    }
                    #edit area (close)

                    echo '
                                        </table>
                                    </div>';
                }
                #content div: Contact Information (close)

                #content div: staff (open)
                if (1 == 1) {
                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">';

                    #edit tooltip (get image [only once] and create div) (open)
                    if ($ngo_admin == "yes") {
                        echo '
                                           <div
                                              class="profile_edit_tooltip edit_profile_text_button"
                                              style="margin:-40px 0px 0px 250px;" title="Edit profile text">';
                        echo '
                                              <img src="' . $function_propic_edit_ngo_img_path_full . '">
                                           </div>';
                    }
                    #edit tooltip (get image [only once] and create div) (open)

                    #display preparation (open)
                    if (1 == 1) {
                        $facebook_link = '
                                                <a
                                                    href="' . esc_url('https://www.facebook.com/' . $ngo_row->ngo_facebook) . '"
                                                    title="' . esc_url('https://www.facebook.com/' . $ngo_row->ngo_facebook) . '"
                                                >
                                                    Visit Facebook page
                                                </a>';
                        $twitter_link = '
                                                <a
                                                    href="' . esc_url('https://twitter.com/' . $ngo_row->ngo_twitter) . '"
                                                    title="' . esc_url('https://twitter.com/' . $ngo_row->ngo_twitter) . '"
                                                >
                                                    Visit Twitter page
                                                </a>';
                        $website = '
                                                <a href="' . $ngo_row->ngo_website . '" title="Click to visit website of ' . $ngo_row->ngo_name . '">
                                                    ' . $ngo_row->ngo_website . '
                                                </a>';

                        #address (open)
                        if (1 == 1) {
                            if (!empty($ngo_row->ngo_street_name) AND !empty($ngo_row->ngo_street_nr)) {
                                $street_and_house_num = $ngo_row->ngo_street_name . ' ' . $ngo_row->ngo_street_nr;
                            } elseif (!empty($ngo_row->ngo_street_name) AND empty($ngo_row->ngo_street_nr)) {
                                $street_and_house_num = $ngo_row->ngo_street_name;
                            }
                            if (!empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)) {
                                $area_code_and_city = $ngo_row->ngo_city . ' ' . $ngo_row->ngo_area_code;
                            } elseif (!empty($ngo_row->ngo_city) AND empty($ngo_row->ngo_area_code)) {
                                $area_code_and_city = $ngo_row->ngo_city;
                            } elseif (empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)) {
                                $area_code_and_city = $ngo_row->ngo_area_code;
                            }
                            $address_array = array(
                                $street_and_house_num,
                                $area_code_and_city,
                                $ngo_row->ngo_state,
                                $ngo_row->ngo_country_name);
                            for ($o = 0; $o < count($address_array); $o++) {
                                $address = $address . $address_array[$o];
                                if ($o + 1 < count($address_array)) {
                                    $address = $address . ',<br>';
                                }
                            }
                        }
                        #address (close)
                    }
                    #display preparation links (close)

                    #display (open)
                    if (1 == 1) {
                        echo '
                                            <h4 style="display:inline;">
                                                Staff
                                            </h4>
					    <br>
					    To join this organization, please write an email to
					    info@voluno.org or send us a message via our
					    <a href="' . get_permalink(638) . '">contact form</a>. We need your name (as it is in
					    this website) and the name of the organization.<br>
					    <span style="color:grey;">
						(This is only a temporary solution.
						Soon, a simple and quick application button will be added.)
					    </span>
                                            <table>';
                        $image_width = 80;
                        for ($w = 0; $w < count($all_affiliates_results); $w++) {

                            #loop preparation (open)
                            if (1 == 1) {

                                #function_profile_link.php (v1.0) (open)
                                if (1 == 1) {
                                    $function_profile_link = $all_affiliates_results[$w]->usersext_id; //default: 1
                                    #$function_profile_link__ngo = "yes"; //default: no/empty
                                    #$function_profile_link_img_div = "yes"; //default: no/empty, shows picture on hover
                                    include('#function-profile-link.php');
                                    #output saved in:
                                    # $function_profile_link__link
                                    # $function_profile_link__name_link
                                    # $function_profile_link__name
                                    # $function_profile_link__link_title

                                    #$function_profile_link__status = "deleted" or "paused/suspended" or "active"
                                }
                                #function_profile_link.php (v1.0) (close)

                                #function-image-processing
                                #profile picture
                                $function_propic__type = "profile picture";
                                $function_propic__user_id = $all_affiliates_results[$w]->usersext_id;
                                #all
                                $function_propic__geometry = array($image_width, $image_width); //optional, if e.g. only width: 300, NULL; vice versa
                                include('#function-image-processing.php');

                                if ($all_affiliates_results[$w]->ngo_prop_type_detail == "admin") {
                                    $administrator = "<br>(Administrator)";
                                } else {
                                    unset($administrator);
                                }
                            }
                            #loop preparation (close)

                            #loop content (open)
                            if (1 == 1) {
                                echo '
                                                    <tr>
                                                        <td style="width:' . $image_width . 'px;padding-right:10px;">
                                                            <a
                                                              title="' . $function_profile_link__link_title . '"
                                                              href="' . $function_profile_link__link . '"
                                                            >
                                                                <img
                                                                    src="' . $function_propic . '"
                                                                    style="border-radius:10px;border:1px solid black;"
                                                                    class="voluno_brighter_on_hover"
                                                                >
                                                            </a>
                                                        </td>
                                                        <td style="vertical-align:middle;">
                                                            ' . $function_profile_link__name_link . '
                                                            ' . $administrator . '
                                                        </td>
                                                    </tr>';
                            }
                            #loop content (close)
                        }
                        echo '
                                            </table>';
                    }
                    #display (close)
                    /*
                                        #display, not edit area (open)
                                        for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
                                           if(
                                                 (!empty($content_div_contact_info[$index_a][1])
                                                 AND
                                                 $content_div_contact_info[$index_a][3] == 1)
                                              OR
                                                 ($content_div_contact_info[$index_a][3] != 1
                                                 AND
                                                 !empty($content_div_contact_info[$index_a][3]))
                                              ){
                                              echo '
                                              <tr class="profile_page_editable">
                                                 <td style="font-weight:bold;text-align:right;padding-right:20px;">
                                                    '.$content_div_contact_info[$index_a][0].':
                                                 </td>
                                                 <td>
                                                    '.$content_div_contact_info[$index_a][1].'
                                                 </td>
                                              </tr>';
                                           }
                                        }
                                        #display, not edit area (close)

                                        #edit area (open)
                                        if($ngo_admin == "yes"){
                                           for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
                                              echo '
                                              <tr class="profile_page_edit">
                                                 <td class="content_div_title_td">
                                                    '.$content_div_contact_info[$index_a][0].':
                                                 </td>
                                                 <td class="content_div_content_td">
                                                    '.$content_div_contact_info[$index_a][2].'
                                                 </td>
                                              </tr>';
                                           }
                                           echo '
                                           <tr class="profile_page_edit">
                                              <td colspan="2">
                                                 <table style="margin:auto;">
                                                    <tr>
                                                       <td style="text-align:center;">
                                                          <div
                                                             class="edit_profile_text_cancel profile_page_edit"
                                                             style="width:60px;margin-left:auto;margin-right:10px;"
                                                          >
                                                             Cancel
                                                          </div>
                                                       </td>
                                                       <td>
                                                          <div
                                                             class="edit_profile_text_save profile_page_edit"
                                                             style="width:60px;margin-right:auto;margin-left:10px;"
                                                          >
                                                             Save
                                                          </div>
                                                       </td>
                                                    </tr>
                                                 </table>
                                              </td>
                                           </tr>';
                                        }
                                        #edit area (close)
                                        */
                    echo '
                                    </div>';
                }
                #content div: staff (close)

            }
            #right side of container (close)

            echo '
                        </td>
                    </tr>
                </table>';
        }
        #table (close)

        #close form (open)
        if ($ngo_admin == "yes") {
            echo '
            </form>';
        }
        #close form (close)

    }
    #content (close)

}
#profile (close)

?>