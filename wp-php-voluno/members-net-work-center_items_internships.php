<?php

#readme (open)
if(1==1){
    /*
    When adding a new subsection, all "definition of specific user restrictions" must be updated to include it (else they won't show it)
    
    When a mysql update changes the internship status, the persmissions have already been defined. Thus, they need to be redifined. To do
    this, the whole page is reincluded. That's all fine, however, please make sure that all main page sections are included into the
    "unset" command, so that they are not included twice. See for instance "#reprocess arm".
    <- update: just make sure that " AND empty($reprocess_arm)" is always included at the top level.
    
    
    */
}
#readme (close)

#access rights management (arm) (open)
if(1==1){
    
    #general internship query (open)
    if(1==1){
        $internship_query = $GLOBALS['wpdb']->prepare('SELECT *
                                    FROM fi4l3fg_voluno_items_internships
				    LEFT JOIN fi4l3fg_voluno_development_organizations
					ON internship_ngo = ngo_id
                                    WHERE internship_id = %d;'
                                    ,$get_id);
        $internship_row = $GLOBALS['wpdb']->get_row($internship_query);
    }
    #general internship query (close)
    
    $internship_status = $internship_row->internship_status;
    
    #finding out user roles (open)
    if(1==1){
        
        #get all roles of user (open)
        if(1==1){
            $all_positions_of_user_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM fi4l3fg_voluno_applications
                                                            WHERE application_type_general = "position"
                                                                AND application_status = "accepted"
                                                                AND application_user_id = %d;'
                                                            ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
            $all_positions_of_user_results = $GLOBALS['wpdb']->get_results($all_positions_of_user_query);
            
            unset($all_positions_of_user_array);
            for($aat=0;$aat<count($all_positions_of_user_results);$aat++){
                $all_positions_of_user_array[] = $all_positions_of_user_results[$aat]->application_type_id;
            }
        }
        #get all roles of users (close)
        
        unset($user_role);
        
        #ngo - author - create new internship (ngo_select + edit + 1) (open)
        if("dome" == 2 AND in_array(2,$all_positions_of_user_array) AND $internship_row->internship_id == 1 AND $internship_status == "draft"){
            
            $user_role = "ngo - author - create new internship";
            
        }
        #ngo - author - create new internship (ngo_select + edit + 1) (close)
        
        #ngo - author - edit (open)
        if("dome" == 2 AND in_array(2,$all_positions_of_user_array) AND $internship_status == "draft" AND empty($user_role)){
            if($internship_row->internship_author == $GLOBALS['voluno_variables']['current_user_extended']->usersext_id AND $_GET['edit_internship'] == "1"){
                $user_role = "ngo - author - edit";
            }
        }
        #ngo - author - edit (close)
        
        #ngo - author's ngo - edit (open)
        if("dome" == 2 AND in_array(2,$all_positions_of_user_array) AND $internship_status == "draft" AND empty($user_role)){
            if($_GET['edit_internship'] == "1"){
                $user_role = "ngo - author's ngo - edit";
            }
        }
        #ngo - author's ngo - edit (close)
	
        #ngo - author or author's ngo (open)
        if(in_array(2,$all_positions_of_user_array) AND empty($user_role)){
            
            $user_part_or_ngo_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_development_organizations_properties
                                                    WHERE ngo_prop_ngo_id = %d
                                                        AND ngo_prop_type_id = %s
                                                        AND ngo_prop_type_general = "position"
                                                        AND ngo_prop_type_specific = "worker";'
                                                    ,$internship_row->ngo_id
                                                    ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
            $user_part_or_ngo_row = $GLOBALS['wpdb']->get_row($user_part_or_ngo_query);
            
            if(!empty($user_part_or_ngo_row)){
                
                if(empty($_GET['reject_application_code'])){
                    $user_role = "ngo - author or author's ngo";
                }else{
                    $user_role = "ngo - author or author's ngo: reject internship application mysql load";
                }
		
            }elseif($internship_row->internship_author == $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
		
		$user_role = "ngo - author or author's ngo";
		
	    }
        }
        #ngo - author or author's ngo (open)
        
    }
    #finding out user roles (close)
    
    #definition of specific user restrictions (open)
    if(1==1){
        
        #ngo (open)
        if(1==1){
	    
	    #full list (open)
	    if(0!=0){
		
                $access_array = array(                                                  #1
		    
                    #not fixed to a specific location in the code
                    array("edit_mode",                                                  1),
                        array("edit_mode_select_ngo",                                   1),
                        array("edit_mode_create_mode",                                  0),
                        
                    #mostly fixed to a specific location in code, (chronological order)
                    array("mysql",                                                      1),
                        array("get_data",                                               1),
                            array("assigned_volunteer",                                 0),
                    
                    array("style",                                                      1),
                    
                    array("jquery",                                                     1),
                    
                    array("content",                                                    1),
                        array("breadcrums_img_title_short_description",                 1),
                            array("breadcrums_and_img",                                 1),
                                array("img",                                            1),
                                array("breadcrums",                                     1),
                            array("title",                                              1),
                            array("short_description",                                  1),
                        
                        array("content_divs_table",                                     1),
                            array("left_side_content_divs",                             1),
                                array("progress_reports",                               0),
                                array("applications",                                   0),
                                    array("accept_and_reject",                          0),
                                array("long_description",                               1),
                                    array("long_description_general",                   1),
                                    array("long_description_specific",                  1),
                        
                        #content_divs_table
                            array("right_side_content_div",                             1),
                            
                                array("options",                                        1),
                                    array("options_for_volunteers",                     0),
                                    array("options_for_ngos",                           1),
                                    
                                        #only when creating new internships
                                        array("options_for_ngos_save_and_publish",      0),
                                        array("options_for_ngos_delete_and_go_back",    0),
					
					#edit mode
					array("options_for_ngos_edit_close",    	1),
					array("options_for_ngos_edit_save",    		1),
					array("options_for_ngos_edit_save_and_close",   1),
					array("options_for_ngos_edit_save_and_publish", 1),
					
                                        array("options_for_ngos_cancel",                0),
					array("options_for_ngos_copy",                  0),
                                        array("options_for_ngos_complete",              0),
					array("options_for_ngos_delete",                0),
					array("options_for_ngos_edit",                  0),
                                        array("options_for_ngos_publish",               0),
					array("options_for_ngos_reassign",              0),
					array("options_for_ngos_save_as_draft",         0),
                                        
                                array("basic_info",                                     1),
                                    array("assigned_volunteer",                         0),
                        #content_divs_table
                        
                        array("error",                                                  0),
                        array("error_internship_deleted",                                     0),
                    
                    );
	    }
	    #full list (close)
	    
            #ngo - author - create new internship (open)
            if("dome" == 2 AND $user_role == "ngo - author - create new internship"){
                
                $internship_status_array =
                                                                        array(
                                                                                        "draft");
                $access_array = array(                                                  #1
                                      
                    #not fixed to a specific location in the code
                    array("edit_mode",                                                  1   ),
                        array("edit_mode_select_ngo",                                   1   ),
                        array("edit_mode_create_mode",                                  1   ),
                        
                    #mostly fixed to a specific location in code, (chronological order)
                    array("mysql",                                                      1   ),
                        array("get_data",                                               1   ),
                            array("assigned_volunteer",                                 0   ),
                    
                    array("style",                                                      1   ),
                    
                    array("jquery",                                                     1   ),
                    
                    array("content",                                                    1   ),
                        array("breadcrums_img_title_short_description",                 1   ),
                            array("breadcrums_and_img",                                 1   ),
                                array("img",                                            1   ),
                                array("breadcrums",                                     1   ),
                            array("title",                                              1   ),
                            array("short_description",                                  1   ),
                        
                        array("content_divs_table",                                     1   ),
                            array("left_side_content_divs",                             1   ),
                                array("progress_reports",                               0   ),
                                array("applications",                                   0   ),
                                    array("accept_and_reject",                          0   ),
                                array("long_description",                               1   ),
                                    array("long_description_general",                   1   ),
                                    array("long_description_specific",                  1   ),
                        
                        #content_divs_table
                            array("right_side_content_div",                             1   ),
                            
                                array("options",                                        1   ),
                                    array("options_for_volunteers",                     0   ),
                                    array("options_for_ngos",                           1   ),
                                        
                                        #only when creating new internships
                                        array("options_for_ngos_save_and_publish",      1   ),
                                        array("options_for_ngos_delete_and_go_back",    1   ),
					
					#edit mode
					array("options_for_ngos_edit_close",    	0   ),
					array("options_for_ngos_edit_save",    		0   ),
					array("options_for_ngos_edit_save_and_close",   0   ),
					array("options_for_ngos_edit_save_and_publish", 1   ),
					
                                        
                                array("basic_info",                                     1   ),
                                    array("assigned_volunteer",                         0   ),
                        #content_divs_table
                        
                        array("error",                                                  0   ),
                        array("error_internship_deleted",                                     0   )
                    
                    );
                
            }
            #ngo - author - create new internship (close)
            
            #ngo - author - edit (open)
            if("dome" == 2 AND $user_role == "ngo - author - edit"){
                
                $internship_status_array =
                                                                        array(
                                                                                        "draft");
                $access_array = array(                                                  #1
		    
                    #not fixed to a specific location in the code
                    array("edit_mode",                                                  1),
                        array("edit_mode_select_ngo",                                   1),
                        array("edit_mode_create_mode",                                  0),
                        
                    #mostly fixed to a specific location in code, (chronological order)
                    array("mysql",                                                      1),
                        array("get_data",                                               1),
                            array("assigned_volunteer",                                 0),
                    
                    array("style",                                                      1),
                    
                    array("jquery",                                                     1),
                    
                    array("content",                                                    1),
                        array("breadcrums_img_title_short_description",                 1),
                            array("breadcrums_and_img",                                 1),
                                array("img",                                            1),
                                array("breadcrums",                                     1),
                            array("title",                                              1),
                            array("short_description",                                  1),
                        
                        array("content_divs_table",                                     1),
                            array("left_side_content_divs",                             1),
                                array("progress_reports",                               0),
                                array("applications",                                   0),
                                    array("accept_and_reject",                          0),
                                array("long_description",                               1),
                                    array("long_description_general",                   1),
                                    array("long_description_specific",                  1),
                        
                        #content_divs_table
                            array("right_side_content_div",                             1),
                            
                                array("options",                                        1),
                                    array("options_for_volunteers",                     0),
                                    array("options_for_ngos",                           1),
                                    
                                        #only when creating new internships
                                        array("options_for_ngos_save_and_publish",      0),
                                        array("options_for_ngos_delete_and_go_back",    0),
					
					#edit mode
					array("options_for_ngos_edit_close",    	1),
					array("options_for_ngos_edit_save",    		1),
					array("options_for_ngos_edit_save_and_close",   1),
					array("options_for_ngos_edit_save_and_publish", 1),
					
                                array("basic_info",                                     1),
                                    array("assigned_volunteer",                         0),
                        #content_divs_table
                        
                        array("error",                                                  0),
                        array("error_internship_deleted",                                     0),
                    
                    );
                
            }
            #ngo - author - edit (close)
            
            #ngo - author's ngo - edit (open)
            if("dome" == 2 AND $user_role == "ngo - author's ngo - edit"){
                
                $internship_status_array =
                                                                        array(
                                                                                        "draft");
                $access_array = array(                                                  #1
				      
                    #not fixed to a specific location in the code
                    array("edit_mode",                                                  1),
                        array("edit_mode_select_ngo",                                   0),
                        array("edit_mode_create_mode",                                  0),
                        
                    #mostly fixed to a specific location in code, (chronological order)
                    array("mysql",                                                      1),
                        array("get_data",                                               1),
                            array("assigned_volunteer",                                 0),
                    
                    array("style",                                                      1),
                    
                    array("jquery",                                                     1),
                    
                    array("content",                                                    1),
                        array("breadcrums_img_title_short_description",                 1),
                            array("breadcrums_and_img",                                 1),
                                array("img",                                            1),
                                array("breadcrums",                                     1),
                            array("title",                                              1),
                            array("short_description",                                  1),
                        
                        array("content_divs_table",                                     1),
                            array("left_side_content_divs",                             1),
                                array("progress_reports",                               0),
                                array("applications",                                   0),
                                    array("accept_and_reject",                          0),
                                array("long_description",                               1),
                                    array("long_description_general",                   1),
                                    array("long_description_specific",                  1),
                        
                        #content_divs_table
                            array("right_side_content_div",                             1),
                            
                                array("options",                                        1),
                                    array("options_for_volunteers",                     0),
                                    array("options_for_ngos",                           1),
                                    
                                        #only when creating new internships
                                        array("options_for_ngos_save_and_publish",      0),
                                        array("options_for_ngos_delete_and_go_back",    0),
					
					#edit mode
					array("options_for_ngos_edit_close",    	1),
					array("options_for_ngos_edit_save",    		1),
					array("options_for_ngos_edit_save_and_close",   1),
					array("options_for_ngos_edit_save_and_publish", 1),
                                        
                                array("basic_info",                                     1),
                                    array("assigned_volunteer",                         0),
                        #content_divs_table
                        
                        array("error",                                                  0),
                        array("error_internship_deleted",                                     0),
                    
                    );
                
            }
            #ngo - author's ngo - edit (close)
	    
            #ngo - author or author's ngo (open)
            if($user_role == "ngo - author or author's ngo"){
                
                $internship_status_array =
                                                                        array(
                                                                                        "draft",
                                                                                            "unassigned",
                                                                                                "in progress",
                                                                                                    "completed",
                                                                                                        "cancelled",
                                                                                                            "deleted");
                $access_array = array(                                                  #1  #2  #3  #4  #5  #6
				      
                    #not fixed to a specific location in the code
                        
                    #mostly fixed to a specific location in code, (chronological order)
                    array("mysql",                                                      1,  1,  1,  1,  1,  0   ),
                        array("get_data",                                               1,  1,  1,  1,  1,  0   ),
                            array("assigned_volunteer",                                 0,  0,  1,  1,  1,  0   ),
                    
                    array("style",                                                      1,  1,  1,  1,  1,  1   ),
                    
                    array("jquery",                                                     1,  1,  1,  1,  1,  0   ),
                    
                    array("content",                                                    1,  1,  1,  1,  1,  1   ),
                        array("breadcrums_img_title_short_description",                 1,  1,  1,  1,  1,  1   ),
                            array("breadcrums_and_img",                                 1,  1,  1,  1,  1,  1   ),
                                array("img",                                            1,  1,  1,  1,  1,  1   ),
                                array("breadcrums",                                     1,  1,  1,  1,  1,  1   ),
                            array("title",                                              1,  1,  1,  1,  1,  0   ),
                            array("short_description",                                  1,  1,  1,  1,  1,  0   ),
                        
                        array("content_divs_table",                                     1,  1,  1,  1,  1,  0   ),
                            array("left_side_content_divs",                             1,  1,  1,  1,  1,  0   ),
                                array("progress_reports",                               0,  0,  1,  1,  1,  0   ),
                                array("applications",                                   0,  1,  0,  0,  0,  0   ),
                                    array("accept_and_reject",                          0,  1,  0,  0,  0,  0   ),
                                array("long_description",                               1,  1,  1,  1,  1,  0   ),
                                    array("long_description_general",                   1,  1,  1,  1,  1,  0   ),
                                    array("long_description_specific",                  1,  1,  1,  1,  1,  0   ),
                        
                        #content_divs_table
                            array("right_side_content_div",                             1,  1,  1,  1,  1,  0   ),
                            
                                array("options",                                        1,  1,  1,  1,  1,  0   ),
                                    array("options_for_ngos",                           1,  1,  1,  1,  1,  0   ),
                                    
                                        array("options_for_ngos_cancel",                1,  1,  0,  0,  0,  0   ),
					array("options_for_ngos_copy",                  1,  1,  1,  1,  1,  0   ),
                                        array("options_for_ngos_complete",              0,  0,  1,  0,  0,  0   ),
					array("options_for_ngos_delete",                0,  0,  0,  0,  1,  0   ),
					array("options_for_ngos_edit",                  1,  0,  0,  0,  0,  0   ),
                                        array("options_for_ngos_publish",               1,  0,  0,  0,  0,  0   ),
					array("options_for_ngos_reassign",              0,  0,  1,  0,  0,  0   ),
					array("options_for_ngos_save_as_draft",         0,  0,  0,  0,  0,  0   ),
                                        
                                array("basic_info",                                     1,  1,  1,  1,  1,  0   ),
                                    array("assigned_volunteer",                         0,  0,  1,  1,  1,  0   ),
                    
                    );
                
            }
            #ngo - author or author's ngo (close)
            
            #ngo - author or author's ngo: reject internship application mysql load (open)
            if($user_role == "ngo - author or author's ngo: reject internship application mysql load"){
                
                $internship_status_array =
                                                                        array(
                                                                                "draft",
                                                                                    "unassigned",
                                                                                        "in progress",
                                                                                            "completed",
                                                                                                "cancelled",
                                                                                                    "deleted");
                $access_array = array(                                          #1  #2  #3  #4  #5  #6
                    
                    array("internship_section_2",                                     0,  1,  0,  0,  0,  0   )
                    
                    );
                
            }
            #ngo - author or author's ngo: reject internship application mysql load (close)
            
        }
        #ngo (close)
        
    }
    #definition of specific user restrictions (close)
    
    #execution of specific user restrictions (open)
    if(1==1){
        
        $internship_status_number = array_search($internship_status,$internship_status_array) + 1;
        
        for($eleven=0;$eleven<count($access_array);$eleven++){
            
            if($access_array[$eleven][$internship_status_number] == 1){
                ${"arm_".$access_array[$eleven][0]} = "yes";
            }else{
                ${"arm_".$access_array[$eleven][0]} = "no";
            }
            
        }
        
    }
    #execution of specific user restrictions (close)
    
}
#access rights management (arm) (close)

#mysql (open)
if($arm_mysql == "yes" AND empty($reprocess_arm)){
    
    #variable definitions (open)
    if(1==1){
        
        $internship_reports_per_page = 5;
        $get_id_old = $get_id;
        $max_internship_size = pow(1024,2) * 50;
	$max_of_allowed_internship_category_selection = 3;
        
        #upload directory folders
            $uploads_directory_array = wp_upload_dir();
            $uploads_directory_abs = $uploads_directory_array['path'];
            $uploads_directory_web = $uploads_directory_array['url'];
            
        #id of new internship (open)
        if($arm_edit_mode_create_mode == "yes"){
            $max_internship_id_query = $GLOBALS['wpdb']->prepare('SELECT internship_id
                                                FROM fi4l3fg_voluno_items_internships
                                                ORDER BY internship_id DESC
                                                LIMIT 1');
            $max_internship_id_row = $GLOBALS['wpdb']->get_row($max_internship_id_query);
            
            $get_id = $max_internship_id_row->internship_id + 1;
        }
        #id of new internship (close)
            
        #unfull final path
            $unfull_final_path_abs =
                $uploads_directory_abs.
                '/items/internships/'.
                $get_id;
                
        
    }
    #variable definitions (close)
    
    #update data (open)
    if(1==1){
        
	#check if internship dates are still valid (open)
	if(1==1){
	    
	    $time_expiration = time() + (24 * 60 * 60);
	    
	    #completion deadline (open)
	    if($time_expiration > strtotime($internship_row->internship_deadline) AND $internship_row->internship_deadline != "0000-00-00 00:00:00"){
		
		$GLOBALS['wpdb']->update( 
				'fi4l3fg_voluno_items_internships',
			array( //updated content
				'internship_ready_for_publication' => "",
				'internship_deadline' => "0000-00-00 00:00:00"
			),
			array( //location of updated content
				'internship_id' => $get_id
			),
			array( //format of updated content
				'%s','%s'
			),
			array( //format of location of updated content
				'%d'
			    ));
		
		$reprocess_arm_activated = "yes";
		
	    }
	    #completion deadline (close)
	    
	    #assignment deadline (open)
	    if($time_expiration > strtotime($internship_row->internship_application_deadline) AND $internship_row->internship_deadline != "0000-00-00 00:00:00"){
		
		$GLOBALS['wpdb']->update( 
				'fi4l3fg_voluno_items_internships',
			array( //updated content
				'internship_ready_for_publication' => "",
				'internship_application_deadline' => "0000-00-00 00:00:00"
			),
			array( //location of updated content
				'internship_id' => $get_id
			),
			array( //format of updated content
				'%s','%s'
			),
			array( //format of location of updated content
				'%d'
			    ));
		
		$reprocess_arm_activated = "yes";
		
	    }
	    #assignment deadline (close)
	    
            #reprocess arm (open)
            if(empty($error) OR $reprocess_arm_activated == "yes"){
                $reprocess_arm = 1;
		unset($reprocess_arm_activated);
                include('members-net-work-center.php');
                unset($reprocess_arm);
            }
            #reprocess arm (close)
	    
	}
	#check if internship dates are still valid (close)
	
        #internship report (open)
        if($_POST['internship_report_form_submitted'] == "yes"){
            
            #insert report (open)
            if(1==1){
                $GLOBALS['wpdb']->insert(
                                'fi4l3fg_voluno_items_internships_reports',
                        array(
                                'work_internships_rep_internship_id'      => $get_id,
                                'work_internships_rep_text'         => $_POST['internship_report_text'],
                                'work_internships_rep_author'       => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                'work_internships_rep_date_created' => date("Y-m-d H:i:s")
                            ),
                        array(
                                '%d',
                                '%s',
                                '%d',
                                '%s'
                            ));
                $internship_report_id = $GLOBALS['wpdb']->insert_id;
            }
            #insert report (close)
            
            #insert files (open)
            for($ten=0;$ten<count($_FILES['internship_report_file']['tmp_name']);$ten++){
                
                #upload files (open)
                if(1==1){
                    
                    #upload image to general uploads directory (open)
                    if(1==1){
                        unset($uploadedfile);
                        $uploadedfile['name']        =   $_FILES['internship_report_file']['name'][$ten];
                        $uploadedfile['type']        =   $_FILES['internship_report_file']['type'][$ten];
                        $uploadedfile['tmp_name']    =   $_FILES['internship_report_file']['tmp_name'][$ten];
                        $uploadedfile['error']       =   $_FILES['internship_report_file']['error'][$ten];
                        $uploadedfile['size']        =   $_FILES['internship_report_file']['size'][$ten];
                        
                        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
                        $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
                        $full_abs_temp_file_path = $movefile['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
                    }
                    #upload image to general uploads directory (close)
                    
                    #get file info and paths (open)
                    if(1==1){
                        
                        #get filename only
                            $file_path_info = pathinfo($full_abs_temp_file_path);
                            
                        #full temp path
                            $full_temp_path_abs = $full_abs_temp_file_path;
                            
                        #original filename
                            $original_filename = $file_path_info['basename'];
                            
                        #full final path
                            $full_final_path_abs =
                                $unfull_final_path_abs.
                                '/internship-Report-File_'.$get_id.'-'.$internship_report_id.'-'.($ten+1).'.'.$file_path_info['extension'];
                        
                    }
                    #get file info and paths (close)
                    
                    #check if mime type is valid (open)
                    if(1==1){
                        
                        #get mime type
                            $finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic"); //load plugin
                            $mimetype = $finfo->file($full_temp_path_abs);
                            
                        #allowed file extensions
                            $allowed_file_extensions_query = $GLOBALS['wpdb']->prepare('SELECT vol_file_ext_mime_type
                                                                            FROM fi4l3fg_voluno_file_extensions
                                                                            WHERE vol_file_ext_mime_type = %s'
                                                                            ,$mimetype);
                            $allowed_file_extensions_row = $GLOBALS['wpdb']->get_row($allowed_file_extensions_query);
                            
                        #if mime type is not valid (open)
                        if(empty($allowed_file_extensions_row)){
                            
                            $file_upload_error = "unknown mime type";
                            
                        }
                        #if mime type is not valid (close)
                        
                    }
                    #check if mime type is valid (close)
                    
                    #if file is too large (open)
                    if(1==1){
                        
                        $filesize = filesize($full_temp_path_abs);
                        
                        #get size of current internship files (open)
                        if(1==1){
                            $internship_files_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                FROM fi4l3fg_voluno_files
                                                                WHERE vol_file_type_general = "internship"
                                                                    AND vol_file_type_id = %d;'
                                                                ,$get_id);
                            $internship_files_results = $GLOBALS['wpdb']->get_results($internship_files_query);
                            
                            unset($summed_size_of_all_internship_files);
                            #loop (open)
                            for($four=0;$four<count($internship_files_results);$four++){
                                
                                $filesize_calculation = filesize($unfull_final_path_abs.'/'.$internship_files_results[$four]->vol_file_name);
                                $summed_size_of_all_internship_files = $summed_size_of_all_internship_files+$filesize_calculation;
                                
                            }
                            #loop (close)
                            
                        }
                        #get size of current internship files (open)
                        
                        #if internship space used up (open)
                        if($filesize + $summed_size_of_all_internship_files > $max_internship_size){ //50 MB
                            
                            $file_upload_error = "file space used up".(pow(1024,2) * 50);
                            
                        }
                        #if internship space used up (close)
                        
                        #if file too big (open)
                        if($filesize > pow(1024,2) * 5){ //5 MB
                            
                            $file_upload_error = "file too large".(pow(1024,2) * 5);
                            
                        }
                        #if file too big (close)
                        
                    }
                    #if file is too large (close)
                    
                    #if file valid (open)
                    if(empty($file_upload_error)){
                        
                        #create folder, if not exists (open)
                        if (!file_exists($unfull_final_path_abs)) { 
                           mkdir($unfull_final_path_abs, 0777, true);
                        }
                        #create folder, if not exists (close)
                        
                        rename($full_temp_path_abs,$full_final_path_abs);
                        
                    }
                    #if file valid (close)
                    
                    unlink($full_temp_path_abs);
                    
                }
                #upload files (close)
                
                #insert files in database (open)
                if(empty($file_upload_error)){
                    
                    $file_path_info_final = pathinfo($full_final_path_abs);
                    
                    $GLOBALS['wpdb']->insert(
                                    'fi4l3fg_voluno_files',
                            array(
                                    'vol_file_name'             => $file_path_info_final['basename'],
                                    'vol_file_name_original'    => $original_filename,
                                    'vol_file_type_general'     => "internship",
                                    'vol_file_type_id'          => $get_id,
                                    
                                    'vol_file_type_specific'    => "progress report",
                                    'vol_file_type_specific_id' => $internship_report_id,
                                    'vol_file_user_id'          => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                    
                                    'vol_file_date_created'     => date("Y-m-d H:i:s")
                                ),
                            array(
                                    '%s','%s','%s','%d',
                                    '%s','%d','%d',
                                    '%s'
                                ));
                }
                #insert files in database (close)
                
                unset($file_upload_error);
                
            }
            #insert files (close)
            
        }
        #internship report (close)
        
        #accept application (open)
        if($arm_accept_and_reject == "yes" AND !empty($_POST['accept_application_id'])){
            
            $application_acceptance_text = $_POST['application_acceptance_text'];
            $application_id = $_POST['accept_application_id'];
            
            #accepted volunteer (open)
            if(1==1){
                
                #verify application (open)
                if(1==1){
                    $application_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_applications
                                                        WHERE application_type_specific = "internship_application"
                                                            AND application_type_general = "internship"
                                                            AND application_type_id = %d
                                                            AND application_id = %d;'
                                                        ,$internship_row->internship_id
                                                        ,$application_id);
                    $application_row = $GLOBALS['wpdb']->get_row($application_query);
                    
                    if(empty($application_row)){
                       $error = "yes";
                    }
                }
                #verify application (close)
                
                #update application (open)
                if(empty($error)){
                    
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_applications',
                            array( //updated content
                                    'application_status' => 'accepted'
                            ),
                            array( //location of updated content
                                    'application_id' => $application_row->application_id
                            ),
                            array( //format of updated content
                                    '%s'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                    
                }
                #update application (close)
                
                #inform volunteer (open)
                if(empty($error)){
                    #dome -> send email
                    
                    #dome -> add notification
                }
                #inform volunteer (close)
                
            }
            #accepted volunteer (close)
            
            #rejected volunteers (open)
            if(empty($error)){
                
                #get rejected applications (open)
                if(1==1){
                    $rejected_applications_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_applications
                                                        WHERE application_type_specific = "internship_application"
                                                            AND application_type_general = "internship"
                                                            AND application_type_id = %d
                                                            AND application_status = "pending";'
                                                        ,$internship_row->internship_id);
                    $rejected_applications_results = $GLOBALS['wpdb']->get_results($rejected_applications_query);
                    
                }
                #get rejected applications (close)
                
                #update rejected application (open)
                if(1==1){
                    
                    for($aab=0;$aab<count($rejected_applications_results);$aab++){
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_applications',
                                array( //updated content
                                        'application_status' => 'rejected'
                                ),
                                array( //location of updated content
                                        'application_id' => $rejected_applications_results[$aab]->application_id
                                ),
                                array( //format of updated content
                                        '%s'
                                ),
                                array( //format of location of updated content
                                        '%d'
                                    ));
                    }
                    
                }
                #update rejected application (close)
                
                #inform volunteers (open)
                if(1==1){
                    for($aab=0;$aab<count($rejected_applications_results);$aab++){
                        
                        #dome -> send email
                        
                        #dome -> add notification
                        
                    }
                }
                #inform volunteers (close)
                
            }
            #rejected volunteers (close)
            
            #update internship status (open)
            if(empty($error)){
                
                $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_items_internships',
                        array( //updated content
                                'internship_status' => 'in progress'
                        ),
                        array( //location of updated content
                                'internship_id' => $internship_row->internship_id,
                                'internship_status' => "unassigned"
                        ),
                        array( //format of updated content
                                '%s'
                        ),
                        array( //format of location of updated content
                                '%d',
                                '%s'
                            ));
                
            }
            #update internship status (close)
            
            #reprocess arm (open)
            if(empty($error)){
                $reprocess_arm = 1;
                include('members-net-work-center.php');
                unset($reprocess_arm);
            }
            #reprocess arm (close)
            
        }
        #accept application (close)
        
        #options (open)
        if($arm_options == "yes"){ //covered in content
            
            #for volunteers (open)
            if($arm_options_for_volunteers == "yes"){
            }
            #for volunteers (close)
            
            #for ngos (open)
            if($arm_options_for_ngos == "yes"){ //covered in content
                
                #publish (open)
                if($arm_options_for_ngos_publish == "yes" AND !empty($_POST['publish_internship'])){ //covered in content
                    
                    #update internship status (open)
                    if(!empty($internship_row->internship_ready_for_publication)){
                        
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_items_internships',
                                array( //updated content
                                        'internship_status' => 'unassigned',
					'internship_date_published' => date("Y-m-d H:i:s")
                                ),
                                array( //location of updated content
                                        'internship_id' => $internship_row->internship_id
                                ),
                                array( //format of updated content
                                        '%s','%s'
                                ),
                                array( //format of location of updated content
                                        '%d'
                                    ));
                        
                    }
                    #update internship status (close)
                    
                    #reprocess arm (open)
                    if(1==1){
                        $reprocess_arm = 1;
                        include('members-net-work-center.php');
                        unset($reprocess_arm);
                    }
                    #reprocess arm (close)
                    
                }
                #publish (close)
                
                #copy (open)
                if($arm_options_for_ngos_copy == "yes" AND !empty($_POST['copy_internship'])){ //covered in content
                    
                    #create new internship (open)
                    if(1==1){
                        
                        #random numbers (open)
                        if(1==1){
                            $voluno_random_num = "";
                            $length = 50;
                            for($aad=0;$aad<6;$aad++){
                                
                                for($aac = 1; $aac < $length; $aac++) {
                                    
                                    ${'voluno_random_num'.($aac+1)} =
                                        ${'voluno_random_num'.($aac+1)}.
                                        substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
                                    
                                }
                                
                            }
                        }
                        #random numbers (close)
                        
                        $GLOBALS['wpdb']->insert(
                                        'fi4l3fg_voluno_items_internships',
                                array(
                                        'internship_name' => $internship_row->internship_name,
                                        'internship_description' => $internship_row->internship_description,
                                        'internship_description_long' => $internship_row->internship_description_long,
                                        'internship_description_undisclosed' => $internship_row->internship_description_undisclosed,
                                        
                                        'internship_deadline' => $internship_row->internship_deadline,
                                        'internship_application_deadline' => $internship_row->internship_application_deadline,
                                        'internship_expected_duration' => $internship_row->internship_expected_duration,
                                        
                                        'internship_status' => "draft",
                                        'internship_author' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                        'internship_ngo_id' => $internship_row->internship_ngo_id,
                                        
                                        'internship_code' => $voluno_random_num1,
                                        'internship_code2' => $voluno_random_num2,
                                        'internship_code3' => $voluno_random_num3,
                                        'internship_code4' => $voluno_random_num4,
                                        'internship_code5' => $voluno_random_num5,
                                        'internship_code6' => $voluno_random_num6,
					
					'internship_ready_for_publication' => $internship_row->internship_ready_for_publication,
                                        
                                        'internship_date_modified' => date("Y-m-d H:i:s"),
                                        'internship_date_created' => date("Y-m-d H:i:s")
                                    ),
                                array(
                                        '%s','%s','%s','%s',
                                        '%s','%s','%s',
                                        '%s','%d','%d',
                                        '%s','%s','%s','%s','%s','%s',
					'%s',
                                        '%s','%s'
                                    ));
                        
                        $id_of_new_internship = $GLOBALS['wpdb']->insert_id;
                        
                    }
                    #create new internship (close)
                    
                    #copy internship properties (open)
                    if(1==1){
                        
                        #get (open)
                        if(1==1){
                            
                            $internship_properties_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_items_internships_properties
                                                                    WHERE work_internships_p_internship_id = %d;'
                                                                    ,$internship_row->internship_id);
                            $internship_properties_results = $GLOBALS['wpdb']->get_results($internship_properties_query);
                            
                        }
                        #get (close)
                        
                        #insert (open)
                        for($aae=0;$aae<count($internship_properties_results);$aae++){
                            
                            $GLOBALS['wpdb']->insert(
                                            'fi4l3fg_voluno_items_internships_properties',
                                    array(
                                            'work_internships_p_internship_id' => $id_of_new_internship,
                                            'work_internships_p_type' => "type",
                                            'work_internships_p_type_id' => $internship_properties_results[$aae]->work_internships_p_type_id,
                                            'work_internships_p_date_created' => date("Y-m-d H:i:s")
                                        ),
                                    array(
                                            '%d','%s','%d','%s'
                                        ));
                            
                        }
                        #insert (close)
                        
                    }
                    #copy internship properties (close)
                    
                    #copy files (open)
                    if(1==1){
                        
                        #copy database entries (open)
                        if(1==1){
                            
                            #get (open)
                            if(1==1){
                                
                                $files_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM fi4l3fg_voluno_files
                                                            WHERE vol_file_type_general = "internship"
                                                                AND (vol_file_type_specific = "specific description"
                                                                    OR
                                                                    vol_file_type_specific = "general description"
                                                                    )
                                                                AND vol_file_type_id = %d
                                                                ORDER BY vol_file_type_specific ASC;'
                                                            ,$internship_row->internship_id);
                                $files_results = $GLOBALS['wpdb']->get_results($files_query);
                                
                            }
                            #get (close)
                            
                            #insert (open)
                            for($aae=0;$aae<count($files_results);$aae++){
                                
                                $GLOBALS['wpdb']->insert(
                                                'fi4l3fg_voluno_files',
                                        array(
                                                'vol_file_name' => $files_results[$aae]->vol_file_name,
                                                'vol_file_type_general' => $files_results[$aae]->vol_file_type_general,
                                                'vol_file_type_specific' => $files_results[$aae]->vol_file_type_specific,
                                                
                                                'vol_file_type_id' => $id_of_new_internship,
                                                'vol_file_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                                
                                                'vol_file_date_modified' => date("Y-m-d H:i:s"),
                                                'vol_file_date_created' => date("Y-m-d H:i:s")
                                            ),
                                        array(
                                                '%s','%s','%s',
                                                '%d','%d',
                                                '%s','%s'
                                            ));
                                
                            }
                            #insert (close)
                            
                        }
                        #copy database entries (close)
                        
                        #copy actual files (open)
                        if(1==1){
                            
                            #paths (open)
                            if(1==1){
                                
                                #upload directory folders
                                    $uploads_directory_array = wp_upload_dir();
                                    $uploads_directory_abs = $uploads_directory_array['path'];
                                    
                                #unfull original path
                                    $unfull_path_of_original_internship =
                                        $uploads_directory_abs.
                                        '/items/internships/'.
                                        $internship_row->internship_id;
                                    
                                #unfull new path
                                    $unfull_path_of_new_internship =
                                        $uploads_directory_abs.
                                        '/items/internships/'.
                                        $id_of_new_internship;
                                
                            }
                            #paths (close)
                            
                            mkdir($unfull_path_of_new_internship, 0777, true);
                            
                            #copy files (open)
                            for($aaf=0;$aaf<count($files_results);$aaf++){
                                
                                copy(
                                    $unfull_path_of_original_internship.'/'.$files_results[$aaf]->vol_file_name,
                                    $unfull_path_of_new_internship.'/'.$files_results[$aaf]->vol_file_name
                                );
                                
                            }
                            #copy files (close)
                            
                        }
                        #copy actual files (close)
                        
                    }
                    #copy files (close)
                    
                    #redirect to new internship (open)
                    if(1==1){
                        echo '
                        <script>
                            jQuery(document).ready(function(){
                                window.location.replace("'.get_permalink().'?type=internship&id='.$id_of_new_internship.'");
                            });
                        </script>';
                    }
                    #redirect to new internship (close)
                    
                }
                #copy (close)
                
                #cancel (open)
                if($arm_options_for_ngos_cancel == "yes" AND !empty($_POST['cancel_internship'])){ //covered in content
                    
                    #update internship status (open)
                    if(1==1){
                        
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_items_internships',
                                array( //updated content
                                        'internship_status' => 'cancelled',
					'internship_date_cancelled' => date("Y-m-d H:i:s")
                                ),
                                array( //location of updated content
                                        'internship_id' => $internship_row->internship_id
                                ),
                                array( //format of updated content
                                        '%s','%s'
                                ),
                                array( //format of location of updated content
                                        '%d'
                                    ));
                        
                    }
                    #update internship status (close)
                    
                    #inform volunteer (open)
                    if(1==1){
                        #dome
                    }
                    #inform volunteers (close)
                    
                    #reprocess arm (open)
                    if(1==1){
                        $reprocess_arm = 1;
                        include('members-net-work-center.php');
                        unset($reprocess_arm);
                    }
                    #reprocess arm (close)
                    
                }
                #cancel (close)
                
                #delete (open)
                if($arm_options_for_ngos_delete == "yes" AND !empty($_POST['delete_internship'])){ //covered in content
                    
                    #update internship status (open)
                    if(1==1){
                        
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_items_internships',
                                array( //updated content
                                        'internship_status' => 'deleted'
                                ),
                                array( //location of updated content
                                        'internship_id' => $internship_row->internship_id
                                ),
                                array( //format of updated content
                                        '%s'
                                ),
                                array( //format of location of updated content
                                        '%d'
                                    ));
                        
                    }
                    #update internship status (close)
                    
                    #reprocess arm (open)
                    if(1==1){
                        $reprocess_arm = 1;
                        include('members-net-work-center.php');
                        unset($reprocess_arm);
                    }
                    #reprocess arm (close)
                    
                    #redirect to work center (open)
                    if(1==1){
                        echo '
                        <script>
                            jQuery(document).ready(function(){
                                window.location.replace("'.get_permalink().'");
                            });
                        </script>';
                    }
                    #redirect to work center (close)
                    
                }
                #delete (close)
                
                #complete (open)
                if($arm_options_for_ngos_complete == "yes" AND !empty($_POST['complete_internship'])){ //covered in content
                    
                    #update internship status (open)
                    if(1==1){
                        
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_items_internships',
                                array( //updated content
                                        'internship_status' => 'completed'
                                ),
                                array( //location of updated content
                                        'internship_id' => $internship_row->internship_id
                                ),
                                array( //format of updated content
                                        '%s'
                                ),
                                array( //format of location of updated content
                                        '%d'
                                    ));
                        
                    }
                    #update internship status (close)
                    
                    #inform volunteer (open)
                    if(1==1){
                        #dome
                        #evaluation?
                    }
                    #inform volunteers (close)
                    
                    #reprocess arm (open)
                    if(1==1){
                        $reprocess_arm = 1;
                        include('members-net-work-center.php');
                        unset($reprocess_arm);
                    }
                    #reprocess arm (close)
                    
                }
                #complete (close)
                
            }
            #for ngos (close)
            
        }
        #options (close)
        
        #update via edit mode OR create new internship (open)
        if($arm_edit_mode == "yes" AND $_POST['activate_mysql_update_in_edit_mode'] == "yes"){
            
            #create new internship (open)
            if($arm_edit_mode_create_mode == "yes"){
                
                #database query insert (open)
                if(1==1){
                    $GLOBALS['wpdb']->insert(
                                    'fi4l3fg_voluno_items_internships',
                            array(
                                    'internship_author' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                    'internship_status' => 'draft',
                                    'internship_date_created' => date("Y-m-d H:i:s")
                                ),
                            array(
                                    '%d','%s','%s'
                                ));
                }
                #database query insert (close)
                
            }
            #create new internship (close)
            
            #title (open)
            if(1==1){
                
                $edit_title = $_POST['edit_title'];
                
                #function-sanitize-text.php (open)
                if(1==1){
                  $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                  $function_sanitize_text__text = $edit_title;
                  include('#function-sanitize-text.php');
                  $edit_title = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (close)
                
                #update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_items_internships',
                            array( //updated content
                                    'internship_name' => $edit_title
                            ),
                            array( //location of updated content
                                    'internship_id' => $get_id
                            ),
                            array( //format of updated content
                                    '%s'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #update (close)
                
            }
            #title (close)
            
            #short description (open)
            if(1==1){
                
                $edit_short_description = $_POST['edit_short_description'];
                
                #function-sanitize-text.php (open)
                if(1==1){
                  $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                  $function_sanitize_text__text = $edit_short_description;
                  include('#function-sanitize-text.php');
                  $edit_short_description = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (close)
                
                #update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_items_internships',
                            array( //updated content
                                    'internship_description' => $edit_short_description
                            ),
                            array( //location of updated content
                                    'internship_id' => $get_id
                            ),
                            array( //format of updated content
                                    '%s'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #update (close)
                
            }
            #short description (close)
            
            #internship types (open)
            if(1==1){
                
                $edit_internship_type_id_array = $_POST['edit_internship_type_id'];
                
                #$edit_internship_type_id_array = explode(",",$edit_internship_type_id_real);
                
                #database query delete (open)
                if(1==1){
                    $GLOBALS['wpdb']->delete(
                                    'fi4l3fg_voluno_items_internships_properties',
                            array( //location of row to delete
                                    'work_internships_p_internship_id' => $get_id,
                                    'work_internships_p_type' => "type"
                            ),
                            array( //format of location of row to delete
                                    '%d','%s'
                            ));
                }
                #database query delete (close)
                
                #database query insert (open)
                for($aam=0;$aam<count($edit_internship_type_id_array);$aam++){
                    
                    $value = $edit_internship_type_id_array[$aam];
                    
                    if($aam == 0){
                        
                        $all_available_internship_types_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                         FROM fi4l3fg_voluno_lists_work_internship_types');
                        $all_available_internship_types_results = $GLOBALS['wpdb']->get_results($all_available_internship_types_query);
                        
                        for($aan=0;$aan<count($all_available_internship_types_results);$aan++){
                            $all_available_internship_types[] = $all_available_internship_types_results[$aan]->internship_type_id;
                        }
                        
                    }
                    
                    if(in_array($value,$all_available_internship_types)){
                        $GLOBALS['wpdb']->insert(
                                        'fi4l3fg_voluno_items_internships_properties',
                                array(
                                        'work_internships_p_type_id' => $edit_internship_type_id_array[$aam],
                                        'work_internships_p_date_created' => date("Y-m-d H:i:s"),
                                        
                                        'work_internships_p_internship_id' => $get_id,
                                        'work_internships_p_type' => "type"
                                    ),
                                array(
                                        '%d','%s',
                                        '%d','%s'
                                ));
                    }
                }
                #database query insert (close)
                
            }
            #internship types (close)
            
            #general and specific description (open)
            if(1==1){
                
                #text (open)
                if(1==1){
                    
                    $edit_general_description = $_POST['edit_general_description'];
                    $edit_specific_description = $_POST['edit_specific_description'];
                    
                    #function-sanitize-text.php (open)
                    if(1==1){
                      $function_sanitize_text__type = "plain text with line breaks (biography)";
                      $function_sanitize_text__text = $edit_general_description;
                      include('#function-sanitize-text.php');
                      $edit_general_description = $function_sanitize_text__text_sanitized;
                      
                      $function_sanitize_text__type = "plain text with line breaks (biography)";
                      $function_sanitize_text__text = $edit_specific_description;
                      include('#function-sanitize-text.php');
                      $edit_specific_description = $function_sanitize_text__text_sanitized;
                    }
                    #function-sanitize-text.php (close)
                    
                    #update (open)
                    if(1==1){
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_items_internships',
                                array( //updated content
                                        'internship_description_long' => $edit_general_description,
                                        'internship_description_undisclosed' => $edit_specific_description
                                ),
                                array( //location of updated content
                                        'internship_id' => $get_id
                                ),
                                array( //format of updated content
                                        '%s','%s'
                                ),
                                array( //format of location of updated content
                                        '%d'
                                    ));
                    }
                    #update (close)
                    
                }
                #text (close)
                
                #add files (open)
                if(1==1){
                    
                    #loop general description (open)
                    for($aao=0;$aao<count($_FILES['edit_general_description_files']['tmp_name']);$aao++){
                        
                        #upload files (open)
                        if(1==1){
                            
                            #upload image to general uploads directory (open)
                            if(1==1){
                                unset($uploadedfile);
                                $uploadedfile['name']        =   $_FILES['edit_general_description_files']['name'][$aao];
                                $uploadedfile['type']        =   $_FILES['edit_general_description_files']['type'][$aao];
                                $uploadedfile['tmp_name']    =   $_FILES['edit_general_description_files']['tmp_name'][$aao];
                                $uploadedfile['error']       =   $_FILES['edit_general_description_files']['error'][$aao];
                                $uploadedfile['size']        =   $_FILES['edit_general_description_files']['size'][$aao];
                                
                                if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
                                $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
                                $full_abs_temp_file_path = $movefile['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
                            }
                            #upload image to general uploads directory (close)
                            
                            #get file info and paths (open)
                            if(1==1){
                                
                                #get filename only
                                    $file_path_info = pathinfo($full_abs_temp_file_path);
                                    
                                #full temp path
                                    $full_temp_path_abs = $full_abs_temp_file_path;
                                    
                                #original filename
                                    $original_filename = $file_path_info['basename'];
                                    
                                #num of existing files of this type (open)
                                if(1==1){
                                    
                                    $num_of_files_of_same_type_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                            FROM fi4l3fg_voluno_files
                                                                            WHERE vol_file_type_general = "internship"
                                                                                AND vol_file_type_id = %d
                                                                                AND vol_file_type_specific = "general description";'
                                                                            ,$get_id);
                                    $num_of_files_of_same_type_results = $GLOBALS['wpdb']->get_results($num_of_files_of_same_type_query);
                                    
                                }
                                #num of existing files of this type (close)
                                    
                                #full final path
                                    $full_final_path_abs =
                                        $unfull_final_path_abs.
                                        '/General-Description-File_'.$get_id.'-'.
                                        ( $aao + 1 + count($num_of_files_of_same_type_results) ).
                                        '.'.$file_path_info['extension'];
                                
                            }
                            #get file info and paths (close)
                            
                            #check if mime type is valid (open)
                            if(1==1){
                                
                                #get mime type
                                    $finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic"); //load plugin
                                    $mimetype = $finfo->file($full_temp_path_abs);
                                    
                                #allowed file extensions
                                    $allowed_file_extensions_query = $GLOBALS['wpdb']->prepare('SELECT vol_file_ext_mime_type
                                                                                    FROM fi4l3fg_voluno_file_extensions
                                                                                    WHERE vol_file_ext_mime_type = %s'
                                                                                    ,$mimetype);
                                    $allowed_file_extensions_row = $GLOBALS['wpdb']->get_row($allowed_file_extensions_query);
                                    
                                #if mime type is not valid (open)
                                if(empty($allowed_file_extensions_row)){
                                    
                                    $file_upload_error = "unknown mime type";
                                    
                                }
                                #if mime type is not valid (close)
                                
                            }
                            #check if mime type is valid (close)
                            
                            #if file is too large (open)
                            if(1==1){
                                
                                $filesize = filesize($full_temp_path_abs);
                                
                                #get size of current internship files (open)
                                if(1==1){
                                    $internship_files_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                        FROM fi4l3fg_voluno_files
                                                                        WHERE vol_file_type_general = "internship"
                                                                            AND vol_file_type_id = %d;'
                                                                        ,$get_id);
                                    $internship_files_results = $GLOBALS['wpdb']->get_results($internship_files_query);
                                    
                                    unset($summed_size_of_all_internship_files);
                                    #loop (open)
                                    for($four=0;$four<count($internship_files_results);$four++){
                                        
                                        $filesize_calculation = filesize($unfull_final_path_abs.'/'.$internship_files_results[$four]->vol_file_name);
                                        $summed_size_of_all_internship_files = $summed_size_of_all_internship_files+$filesize_calculation;
                                        
                                    }
                                    #loop (close)
                                    
                                }
                                #get size of current internship files (open)
                                
                                #if internship space used up (open)
                                if($filesize + $summed_size_of_all_internship_files > $max_internship_size){ //50 MB
                                    
                                    $file_upload_error = "file space used up".(pow(1024,2) * 50);
                                    
                                }
                                #if internship space used up (close)
                                
                                #if file too big (open)
                                if($filesize > pow(1024,2) * 20){ //20 MB
                                    
                                    $file_upload_error = "file too large".(pow(1024,2) * 20);
                                    
                                }
                                #if file too big (close)
                                
                            }
                            #if file is too large (close)
                            
                            #if file valid (open)
                            if(empty($file_upload_error)){
                                
                                #create folder, if not exists (open)
                                if (!file_exists($unfull_final_path_abs)) { 
                                   mkdir($unfull_final_path_abs, 0777, true);
                                }
                                #create folder, if not exists (close)
                                
                                rename($full_temp_path_abs,$full_final_path_abs);
                                
                            }
                            #if file valid (close)
                            
                            unlink($full_temp_path_abs);
                            
                        }
                        #upload files (close)
                        
                        #insert files in database (open)
                        if(empty($file_upload_error)){
                            
                            $file_path_info_final = pathinfo($full_final_path_abs);
                            
                            $GLOBALS['wpdb']->insert(
                                            'fi4l3fg_voluno_files',
                                    array(
                                            'vol_file_name'             => $file_path_info_final['basename'],
                                            'vol_file_name_original'    => $original_filename,
                                            'vol_file_type_general'     => "internship",
                                            'vol_file_type_id'          => $get_id,
                                            
                                            'vol_file_type_specific'    => "general description",
                                            'vol_file_user_id'          => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                            
                                            'vol_file_date_created'     => date("Y-m-d H:i:s")
                                        ),
                                    array(
                                            '%s','%s','%s','%d',
                                            '%s','%d',
                                            '%s'
                                        ));
                        }
                        #insert files in database (close)
                        
                        unset($file_upload_error);
                        
                    }
                    #loop general description (close)
                    
                    #loop specific description (open)
                    for($aao=0;$aao<count($_FILES['edit_specific_description_files']['tmp_name']);$aao++){
                        
                        #upload files (open)
                        if(1==1){
                            
                            #upload image to general uploads directory (open)
                            if(1==1){
                                unset($uploadedfile);
                                $uploadedfile['name']        =   $_FILES['edit_specific_description_files']['name'][$aao];
                                $uploadedfile['type']        =   $_FILES['edit_specific_description_files']['type'][$aao];
                                $uploadedfile['tmp_name']    =   $_FILES['edit_specific_description_files']['tmp_name'][$aao];
                                $uploadedfile['error']       =   $_FILES['edit_specific_description_files']['error'][$aao];
                                $uploadedfile['size']        =   $_FILES['edit_specific_description_files']['size'][$aao];
                                
                                if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
                                $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
                                $full_abs_temp_file_path = $movefile['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
                            }
                            #upload image to general uploads directory (close)
                            
                            #get file info and paths (open)
                            if(1==1){
                                
                                #get filename only
                                    $file_path_info = pathinfo($full_abs_temp_file_path);
                                    
                                #full temp path
                                    $full_temp_path_abs = $full_abs_temp_file_path;
                                    
                                #original filename
                                    $original_filename = $file_path_info['basename'];
                                    
                                #num of existing files of this type (open)
                                if(1==1){
                                    
                                    $num_of_files_of_same_type_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                            FROM fi4l3fg_voluno_files
                                                                            WHERE vol_file_type_general = "internship"
                                                                                AND vol_file_type_id = %d
                                                                                AND vol_file_type_specific = "specific description";'
                                                                            ,$get_id);
                                    $num_of_files_of_same_type_results = $GLOBALS['wpdb']->get_results($num_of_files_of_same_type_query);
                                    
                                }
                                #num of existing files of this type (close)
                                    
                                #full final path
                                    $full_final_path_abs =
                                        $unfull_final_path_abs.
                                        '/Specific-Description-File_'.$get_id.'-'.
                                        ( $aao + 1 + count($num_of_files_of_same_type_results) ).
                                        '.'.$file_path_info['extension'];
                                
                            }
                            #get file info and paths (close)
                            
                            #check if mime type is valid (open)
                            if(1==1){
                                
                                #get mime type
                                    $finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic"); //load plugin
                                    $mimetype = $finfo->file($full_temp_path_abs);
                                    
                                #allowed file extensions
                                    $allowed_file_extensions_query = $GLOBALS['wpdb']->prepare('SELECT vol_file_ext_mime_type
                                                                                    FROM fi4l3fg_voluno_file_extensions
                                                                                    WHERE vol_file_ext_mime_type = %s'
                                                                                    ,$mimetype);
                                    $allowed_file_extensions_row = $GLOBALS['wpdb']->get_row($allowed_file_extensions_query);
                                    
                                #if mime type is not valid (open)
                                if(empty($allowed_file_extensions_row)){
                                    
                                    $file_upload_error = "unknown mime type";
                                    
                                }
                                #if mime type is not valid (close)
                                
                            }
                            #check if mime type is valid (close)
                            
                            #if file is too large (open)
                            if(1==1){
                                
                                $filesize = filesize($full_temp_path_abs);
                                
                                #get size of current internship files (open)
                                if(1==1){
                                    $internship_files_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                        FROM fi4l3fg_voluno_files
                                                                        WHERE vol_file_type_general = "internship"
                                                                            AND vol_file_type_id = %d;'
                                                                        ,$get_id);
                                    $internship_files_results = $GLOBALS['wpdb']->get_results($internship_files_query);
                                    
                                    unset($summed_size_of_all_internship_files);
                                    #loop (open)
                                    for($four=0;$four<count($internship_files_results);$four++){
                                        
                                        $filesize_calculation = filesize($unfull_final_path_abs.'/'.$internship_files_results[$four]->vol_file_name);
                                        $summed_size_of_all_internship_files = $summed_size_of_all_internship_files+$filesize_calculation;
                                        
                                    }
                                    #loop (close)
                                    
                                }
                                #get size of current internship files (open)
                                
                                #if internship space used up (open)
                                if($filesize + $summed_size_of_all_internship_files > $max_internship_size){ //50 MB
                                    
                                    $file_upload_error = "file space used up".(pow(1024,2) * 50);
                                    
                                }
                                #if internship space used up (close)
                                
                                #if file too big (open)
                                if($filesize > pow(1024,2) * 20){ //20 MB
                                    
                                    $file_upload_error = "file too large".(pow(1024,2) * 20);
                                    
                                }
                                #if file too big (close)
                                
                            }
                            #if file is too large (close)
                            
                            #if file valid (open)
                            if(empty($file_upload_error)){
                                
                                #create folder, if not exists (open)
                                if (!file_exists($unfull_final_path_abs)) { 
                                   mkdir($unfull_final_path_abs, 0777, true);
                                }
                                #create folder, if not exists (close)
                                
                                rename($full_temp_path_abs,$full_final_path_abs);
                                
                            }
                            #if file valid (close)
                            
                            unlink($full_temp_path_abs);
                            
                        }
                        #upload files (close)
                        
                        #insert files in database (open)
                        if(empty($file_upload_error)){
                            
                            $file_path_info_final = pathinfo($full_final_path_abs);
                            
                            $GLOBALS['wpdb']->insert(
                                            'fi4l3fg_voluno_files',
                                    array(
                                            'vol_file_name'             => $file_path_info_final['basename'],
                                            'vol_file_name_original'    => $original_filename,
                                            'vol_file_type_general'     => "internship",
                                            'vol_file_type_id'          => $get_id,
                                            
                                            'vol_file_type_specific'    => "specific description",
                                            'vol_file_user_id'          => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                            
                                            'vol_file_date_created'     => date("Y-m-d H:i:s")
                                        ),
                                    array(
                                            '%s','%s','%s','%d',
                                            '%s','%d',
                                            '%s'
                                        ));
                        }
                        #insert files in database (close)
                        
                        unset($file_upload_error);
                        
                    }
                    #loop specific description (close)
                    
                }
                #add files (close)
                
                #delete files (open)
                if(!empty($_POST['edit_delete_files'])){
                    
                    $edit_delete_files_array = explode(",",trim($_POST['edit_delete_files'],","));
                    
                    #existing files (for validation) (open)
                    if(1==1){
                        
                        $all_files_of_this_item_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_files
                                                                    WHERE vol_file_type_general = "internship"
                                                                        AND vol_file_type_specific
                                                                            IN ("general description","specific description")
                                                                        AND vol_file_type_id = %d;'
                                                                    ,$get_id);
                        $all_files_of_this_item_results = $GLOBALS['wpdb']->get_results($all_files_of_this_item_query);
                        
                        unset($file_id_array);
                        for($aaq=0;$aaq<count($all_files_of_this_item_results);$aaq++){
                            $file_id_array[] = $all_files_of_this_item_results[$aaq]->vol_file_id;
			    
                        }
                        
                    }
                    #existing files (for validation) (close)
                    
                    for($aap=0;$aap<count($edit_delete_files_array);$aap++){
                        
                        if(in_array($edit_delete_files_array[$aap],$file_id_array)){
                            
                            #database query delete (open)
                            if(1==1){
                                $GLOBALS['wpdb']->delete(
                                            'fi4l3fg_voluno_files',
                                    array( //location of row to delete
                                            'vol_file_id' => $edit_delete_files_array[$aap]
                                    ),
                                    array( //format of location of row to delete
                                            '%d'
                                    ));
                            }
                            #database query delete (close)
                            
                            #file delete (open)
                            if(1==1){
                                
                                $array_position_of_file = array_search($edit_delete_files_array[$aap],$file_id_array);
                                
                                unlink(
                                       $unfull_final_path_abs.
                                       '/'.
                                       $all_files_of_this_item_results[$array_position_of_file]->vol_file_name
                                );
                                
                            }
                            #file delete (close)
                            
                        }
                        
                    }
                    
                }
                #delete files (close)
                
            }
            #general and specific description (close)
            
            #ngo (open)
            if($arm_edit_mode_select_ngo == "yes"){
                
                $edit_ngo = intval($_POST['edit_ngo']);
                
                #all of my ngos (open)
                if(1==1){
                    
                    $all_of_my_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM fi4l3fg_voluno_development_organizations_properties
                                                               LEFT JOIN fi4l3fg_voluno_development_organizations
                                                               ON ngo_prop_ngo_id = ngo_id
                                                            WHERE ngo_prop_type_general = "position"
                                                                AND ngo_prop_type_specific = "worker"
                                                                AND ngo_prop_type_id = %s;'
                                                            ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $all_of_my_ngos_results = $GLOBALS['wpdb']->get_results($all_of_my_ngos_query);
                    
                    unset($all_of_my_ngos_array);
                    for($aar=0;$aar<count($all_of_my_ngos_results);$aar++){
                        
                        $all_of_my_ngos_array[] = $all_of_my_ngos_results[$aar]->ngo_id;
                        
                    }
                    
                }
                #all of my ngos (close)
                
                #update (open)
                if(in_array($edit_ngo,$all_of_my_ngos_array) OR $edit_ngo == 0){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_items_internships',
                            array( //updated content
                                    'internship_ngo_id' => $edit_ngo
                            ),
                            array( //location of updated content
                                    'internship_id' => $get_id
                            ),
                            array( //format of updated content
                                    '%d'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #update (close)
                
            }
            #ngo (close)
            
            #expected duration (open)
            if(1==1){
                
                $edit_expected_duration = $_POST['edit_expected_duration'];
                
                #function-sanitize-text.php (open)
                if(1==1){
                  $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                  $function_sanitize_text__text = $edit_expected_duration;
                  include('#function-sanitize-text.php');
                  $edit_expected_duration = $function_sanitize_text__text_sanitized;
                }
                #function-sanitize-text.php (close)
                
                #update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_items_internships',
                            array( //updated content
                                    'internship_expected_duration' => $edit_expected_duration
                            ),
                            array( //location of updated content
                                    'internship_id' => $get_id
                            ),
                            array( //format of updated content
                                    '%d'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #update (close)
                
            }
            #expected duration (close)
            
            #deadlines (open)
            if(1==1){
                
                #preparation (open)
                if(1==1){
                    
		    if(!empty($_POST['edit_completion_deadline'])){
			$date = DateTime::createFromFormat('l, d. F Y', $_POST['edit_completion_deadline']);
			$edit_completion_deadline = $date->format("Y-m-d H:i:s");
		    }
		    
		    if(!empty($_POST['edit_assignment_deadline'])){
			$date = DateTime::createFromFormat('l, d. F Y', $_POST['edit_assignment_deadline']);
			$edit_assignment_deadline = $date->format("Y-m-d H:i:s");
		    }
		    
                }
                #preparation (close)
                
                #update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_items_internships',
                            array( //updated content
                                    'internship_deadline' => $edit_completion_deadline,
                                    'internship_application_deadline' => $edit_assignment_deadline
                            ),
                            array( //location of updated content
                                    'internship_id' => $get_id
                            ),
                            array( //format of updated content
                                    '%s','%s'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #update (close)
                
            }
            #deadlines (close)
            
	    #ready_for_publication_check (open)
            if(1==1){
                
		if($_POST['ready_for_publication_check'] == "ready for publication"){
		    $ready_for_publication = "ready for publication";
		}else{
		    unset($ready_for_publication);
		}
		
                #update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_items_internships',
                            array( //updated content
                                    'internship_ready_for_publication' => $ready_for_publication
                            ),
                            array( //location of updated content
                                    'internship_id' => $get_id
                            ),
                            array( //format of updated content
                                    '%s'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #update (close)
                
            }
            #ready_for_publication_check (close)
	    
            #publish internship -> internship status (open)
            if($_POST['save_only_or_save_and_close_or_publish_and_save_edit_mode'] == "save_and_publish_edit_mode"){
                
                #update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_items_internships',
                            array( //updated content
                                    'internship_status' => "unassigned",
				    'internship_date_published' => date("Y-m-d H:i:s")
                            ),
                            array( //location of updated content
                                    'internship_id' => $get_id,
                                    'internship_status' => "draft"
                            ),
                            array( //format of updated content
                                    '%s','%s'
                            ),
                            array( //format of location of updated content
                                    '%d','%s'
                                ));
                }
                #update (close)
                
		$reprocess_arm_activated = "yes";
                
            }
            #publish internship -> internship status (close)
            
	    #redirects (open)
	    if(1==1){
		
                $hide_preliminary_page_div = '
		    <div
			style="
			    background-color:#fff;
			    position:absolute;
			    text-align:center;
			    width:100%;
			    height:100%;
			    left:0px;
			    top:0px;
			    z-index:1000000000;
			"
		    >
		    </div>';
		
		#redirect to new internship (open)
		if($arm_redirect_create_internship == "yes"){
		    
		    echo
		    $hide_preliminary_page_div.'
		    <script>
			jQuery(document).ready(function(){
			    window.location.replace("'.get_permalink().'?type=internship&id='.$get_id.'");
			});
		    </script>';
		    
		}
		#redirect to new internship(close)
		
		#redirect to non-edit mode (open)
		if($_POST['save_only_or_save_and_close_or_publish_and_save_edit_mode'] == "save_and_close_edit_mode"){
		    
		    echo
		    $hide_preliminary_page_div.'
		    <script>
			jQuery(document).ready(function(){
			    window.location.replace("'.get_permalink().'?type=internship&id='.$get_id.'");
			});
		    </script>';
		    
		}
		#redirect to non-edit mode (close)
	    
	    }
	    #redirects (close)
	    
            #reprocess arm (open)
            if(empty($error) OR $reprocess_arm_activated == "yes"){
                $reprocess_arm = 1;
		unset($reprocess_arm_activated);
                include('members-net-work-center.php');
                unset($reprocess_arm);
            }
            #reprocess arm (close)
            
        }
        #update via edit mode OR create new internship (close)
        
    }
    #update data (close)
    
    #get data (open)
    if($arm_get_data == "yes"){
        
        #general internship query (open)
        if(1==1){
            #see arm
        }
        #general internship query (close)
        
        #applications [->mysql] [content] (open)
        if($arm_accept_and_reject == "yes"){ //already covered in content
            $applications_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                FROM fi4l3fg_voluno_applications
                                                    LEFT JOIN (
                                                                SELECT *
                                                                FROM fi4l3fg_voluno_users_extended
                                                                LEFT JOIN fi4l3fg_voluno_lists_countries
                                                                    ON usersext_country = list_countries_id
                                                                ) aaa_applicant_name_country
                                                        ON application_user_id = usersext_id
                                                WHERE application_type_specific = "internship_application"
                                                    AND application_type_general = "internship"
                                                    AND application_type_id = %d
                                                    AND application_status = "pending";'
                                                ,$internship_row->internship_id);
            $applications_results = $GLOBALS['wpdb']->get_results($applications_query);
        }
        #applications [->mysql] [content] (close)
        
        #assigned volunteer (open)
        if($arm_assigned_volunteer == "yes"){ //already covered in content
            
            $assigned_volunteer_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                FROM fi4l3fg_voluno_applications
                                                    LEFT JOIN (
                                                                SELECT *
                                                                FROM fi4l3fg_voluno_users_extended
                                                                LEFT JOIN fi4l3fg_voluno_lists_countries
                                                                    ON usersext_country = list_countries_id
                                                                ) aaa_applicant_name_country
                                                        ON application_user_id = usersext_id
                                                WHERE application_type_specific = "internship_application"
                                                    AND application_type_general = "internship"
                                                    AND application_type_id = %d
                                                    AND application_status = "accepted";'
                                                ,$internship_row->internship_id);
            $assigned_volunteer_row = $GLOBALS['wpdb']->get_row($assigned_volunteer_query);
            
        }
        #assigned volunteer (close)
        
        #progress reports [->mysql] [content] (open)
        if(1==1){
            $progress_reports_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                     FROM fi4l3fg_voluno_items_internships_reports
                                                        LEFT JOIN fi4l3fg_voluno_users_extended
                                                        ON work_internships_rep_author = usersext_id
                                                     WHERE work_internships_rep_internship_id = %d
                                                     ORDER BY work_internships_rep_date_created DESC;'
                                                     ,$get_id);
            $progress_reports_results = $GLOBALS['wpdb']->get_results($progress_reports_query);
            
            #loop (open)
            for($four=0;$four<count($progress_reports_results);$four++){
                
                #progress report files (open)
                if(1==1){
                    
                    $progress_reports_files_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_files
                                                                    WHERE vol_file_type_general = "internship"
                                                                        AND vol_file_type_specific = "progress report"
                                                                        AND vol_file_type_id = %d
                                                                        AND vol_file_type_specific_id = %d;'
                                                                    ,$internship_row->internship_id
                                                                    ,$progress_reports_results[$four]->work_internships_rep_id);
                    $progress_reports_files_results = $GLOBALS['wpdb']->get_results($progress_reports_files_query);
                    
                    #function-file-icons.php (open)
                    if(1==1){
                        $function_file_icons = $progress_reports_files_results; //array of fi4l3fg_voluno_files rows
                        include("#function-file-icons.php");
                        #output: $function_file_icons;
                        $file_icons_array[$four] = $function_file_icons;
                    }
                    #function-file-icons.php (close)
                    
                }
                #progress report files (close)
                
            }
            #loop (close)
            
        }
        #progress reports [->mysql] [content] (close)
        
        #long explanation (open)
        if(1==1){
            
            #not yet accepted volunteers [->preparation content] (open)
            if(1==1){ //load this in any case
                
                $files_general_description_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                FROM fi4l3fg_voluno_files
                                                                WHERE vol_file_type_general = "internship"
                                                                    AND vol_file_type_specific = "general description"
                                                                    AND vol_file_type_id = %d;'
                                                                ,$internship_row->internship_id);
                $files_general_description_results = $GLOBALS['wpdb']->get_results($files_general_description_query);
                
            }
            #not yet accepted volunteers [->preparation content] (close)
            
            #accepted volunteers [->preparation content] (open)
            if(1==1){ //load this only if accepted
                
                $files_specific_description_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                FROM fi4l3fg_voluno_files
                                                                WHERE vol_file_type_general = "internship"
                                                                    AND vol_file_type_specific = "specific description"
                                                                    AND vol_file_type_id = %d;'
                                                                ,$internship_row->internship_id);
                $files_specific_description_results = $GLOBALS['wpdb']->get_results($files_specific_description_query);
                
            }
            #accepted volunteers [->preparation content] (close)
            
        }
        #long explanation (close)
        
        #basic information (open)
        if(1==1){
            
            #internship types (open)
            if(1==1){
                
                $internship_types_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_items_internships_properties
                                                        LEFT JOIN fi4l3fg_voluno_lists_work_internship_types
                                                        ON work_internships_p_type_id = internship_type_id
                                                    WHERE work_internships_p_type = %s
                                                    AND work_internships_p_internship_id = %d
                                                    ORDER BY internship_type_name ASC;',
                                                    "type",
                                                    $internship_row->internship_id);
                $internship_types_results = $GLOBALS['wpdb']->get_results($internship_types_query);
                
            }
            #internship types (close)
            
            #total internship size (open)
            if(1==1){
                
                $internship_files_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_files
                                                    WHERE vol_file_type_general = "internship"
                                                        AND vol_file_type_id = %d;'
                                                    ,$get_id);
                $internship_files_results = $GLOBALS['wpdb']->get_results($internship_files_query);
                
                unset($summed_size_of_all_internship_files);
                
                #loop (open)
                for($four=0;$four<count($internship_files_results);$four++){
                    $filesize_calculation = filesize($unfull_final_path_abs.'/'.$internship_files_results[$four]->vol_file_name);
                    $summed_size_of_all_internship_files = $summed_size_of_all_internship_files+$filesize_calculation;
                }
                #loop (close)
                
                $percent_of_internship_space_used = $summed_size_of_all_internship_files / $max_internship_size * 100;
                
            }
            #total internship size (close)
            
            #edit (open)
            if($arm_edit_mode == "yes"){
                
                #my organizations (open)
                if(1==1){
                    $my_organizations_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM fi4l3fg_voluno_development_organizations_properties
                                                                LEFT JOIN fi4l3fg_voluno_development_organizations
                                                                    ON ngo_prop_ngo_id = ngo_id
                                                                LEFT JOIN (
                                                                            SELECT *
                                                                            FROM fi4l3fg_voluno_items_internships
                                                                            WHERE internship_id = %d
                                                                        ) AS aaa_selected
                                                                    ON ngo_id = internship_ngo_id
                                                            WHERE ngo_prop_type_general = "position"
                                                                AND ngo_prop_type_specific = "worker"
                                                                AND ngo_prop_type_id = %s
                                                            ORDER BY ngo_name ASC;'
                                                            ,$get_id
                                                            ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $my_organizations_results = $GLOBALS['wpdb']->get_results($my_organizations_query);
                }
                #my organizations (close)
                
            }
            #edit (close)
            
        }
        #basic information (close)
        
    }
    #get data (close)
    
}
#mysql (close)

#style (open)
if($arm_style == "yes" AND empty($reprocess_arm)){
    echo '
    <style>';
        
        #content divs (open)
        if(1==1){
            echo '
            .content_div{
                border-radius:20px;
                padding:20px;
                margin-bottom:20px;
                background-color:#FFEAB9;
            }
            .content_div:hover{
                background-color:#FFD87D;
            }
            
            .content_div_img{
                float:right;
                padding: 0px 0px 10px 10px;
                margin-top:-6px !important;
                margin-right:-5px !important;
            }
            
            .content_div label{
                cursor:pointer;
            }
            ';
        }
        #content divs (close)
        
        #application table (ngo) (open)
        if($arm_accept_and_reject == "yes"){
            
            echo '
            .application_table td{
                text-align:center;
                vertical-align:middle;
            }
            
            .uneven{
                background-color:#fff;
            }
            .even{
                background-color:#FFF5E0;
            }
            .even:hover, .uneven:hover{
                background-color:#FFD89D;
            }
            ';
            
        }
        #application table (ngo) (close)
        
        #edit item (open)
        if($arm_edit_mode == "yes"){
            
            echo '
            .edit_cancel, .edit_save{
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
            
            .edit_cancel:hover, .edit_save:hover{
               background-color: #D6341D !important;
            }'; 
            
        }
        #edit item (close)
        
    echo '
    </style>';
    
    $content_div_img_array = array("50","40");
}
#style (close)

#jquery (open)
if($arm_jquery == "yes" AND empty($reprocess_arm)){
    
    echo '
    <script>
        jQuery(document).ready(function(){';
        
        #content divs (open)
        if($arm_content_divs_table == "yes"){
            echo '
            jQuery(".content_div_title").click(function(){
                jQuery(this).parent().find(".content_div_content").slideToggle(300);
            });';
        }
        #content divs (close)
        
        #options (open)
        if($arm_options == "yes"){ //covered in content
            
            #options for volunteers (open)
            if($arm_options_for_volunteers == "yes"){
                echo '
                jQuery(".option_volunteer_write_report").click(function(){
                    alert("To write a report, please click on ");
                });
                
                ';
            }
            #options for volunteers (close)
            
            #options for ngos (open)
            if($arm_options_for_ngos == "yes"){ //covered in content
                
		#cancel button (create internshipss only #dome) (open)
		if($arm_options_for_ngos_delete_and_go_back != "yes"){
		    echo '
		    jQuery(".edit_cancel").click(function(){
			
		    });';
		}
		#cancel button (close)
		
		#GROUP: edit internship mode (open)
		if($arm_edit_mode == "yes"){
		    
		    #close (open)
		    if(1==1){
			echo '
			jQuery(".option_ngo_close").click(function(){
			    window.location.replace("'.get_permalink().'?type=internship&id='.$internship_row->internship_id.'");
			});';
		    }
		    #close (close)
		    
		    #save + 'save and close' + 'save and publish' (open)
		    if($arm_options_for_ngos_edit_save == "yes"
		       OR $arm_options_for_ngos_edit_save_and_close == "yes"
		       OR $arm_options_for_ngos_edit_save_and_publish == "yes"){
			
			#validation check (open)
			if(1==1){
			    
			    echo '
			    var problem = 0;
			    jQuery(".option_ngo_save, .option_ngo_save_and_close, .option_ngo_save_and_publish").click(function(){
				
				
				jQuery(".vbp_items").hide();
				
				'./*title*/'
				if(jQuery(".edit_title").val() == ""){
				    jQuery(".vbp_title").show();
				    problem = 1;
				}
				
				'./*short description*/'
				if(jQuery(".edit_short_description").val() == ""){
				    jQuery(".vbp_short_description").show();
				    problem = 1;
				}
				
				'./*category*/'
				if(jQuery(".internship_category_selection input:checked").length == 0){
				    jQuery(".vbp_category").show();
				    problem = 1;
				}
				
				'./*general description*/'
				if(jQuery(".edit_general_description").val() == ""){
				    jQuery(".vbp_general_description").show();
				    problem = 1;
				}
				
				'./*specific description*/'
				if(jQuery(".edit_specific_description").val() == ""){
				    jQuery(".vbp_specific_description").show();
				    problem = 1;
				}
				
				'./*ngo*/'
				if(jQuery(".edit_ngo").val() == ""){
				    jQuery(".vbp_ngo").show();
				    problem = 1;
				}
				
				'./*expected duration*/'
				if(jQuery(".edit_expected_duration").val() == ""){
				    jQuery(".vbp_expected_duration").show();
				    problem = 1;
				}
				
				'./*completion deadline*/'
				if(jQuery(".edit_completion_deadline").val() == ""){
				    jQuery(".vbp_completion_deadline").show();
				    problem = 1;
				}
				
				'./*assignment deadline*/'
				if(jQuery(".edit_assignment_deadline").val() == ""){
				    jQuery(".vbp_assignment_deadline").show();
				    problem = 1;
				}
				
			    });';
			    
			}
			#validation check (close)
			
			#'save and close' only (open)
			if(1==1){
			    echo '
			    jQuery(".option_ngo_save_and_close").click(function(){
				jQuery(".save_only_or_save_and_close_or_publish_and_save_edit_mode").val("save_and_close_edit_mode");
			    });';
			}
			#'save and close' only (close)
			
			#'save and publish' only (open)
			if(1==1){
			    echo '
			    jQuery(".option_ngo_save_and_publish").click(function(){
				jQuery(".confirmation_div").fadeOut(300);
				
				if(problem != 0){
				    
				    jQuery(".validation_before_publication_div").fadeIn(300);
				    
				}else{
				    
				    jQuery(".save_and_publish_internship_preliminary_div").fadeIn(300);
				    
				}
				
			    });
			    
			    './*close preliminary div in any case*/'
			    jQuery(".save_and_publish_internship_preliminary_cancel, .save_and_publish_internship_preliminary_confirm").click(function(){
				jQuery(".save_and_publish_internship_preliminary_div").fadeOut(300);
			    });
			    
			    './*confirmation click*/'
			    jQuery(".save_and_publish_internship_preliminary_confirm").click(function(){
				jQuery(".save_only_or_save_and_close_or_publish_and_save_edit_mode").val("save_and_publish_edit_mode");
			    });';
			}
			#'save and publish' only (close)
			
			echo '
			jQuery(".option_ngo_save, .option_ngo_save_and_close, .save_and_publish_internship_preliminary_confirm").click(function(){
			    jQuery(".loading_img_middle_page").show();
			    
			    './*publication ready check: passing information to mysql database*/'
			    if(problem == 0){
				jQuery(".ready_for_publication_check").val("ready for publication");
			    }
			    
			    './*general and specific description files*/'
				jQuery(".edit_delete_files").val(jQuery(".function_file_icons_deleted_files_ids").html());
			    
			    jQuery(".edit_internship_form").submit();
			});';
			
		    }
		    #save + 'save and close' + 'save and publish' (close)
		    
		}
		#GROUP: edit internship mode (close)
		
                #publish (open)
                if($arm_options_for_ngos_publish == "yes"){ //covered in content
                    
		    echo '
		    
		    jQuery(".option_ngo_publish").click(function(){
			jQuery(".confirmation_div").fadeOut(300);
			
			jQuery(".publish_internship_preliminary_div").fadeIn(300);
			
		    });
		    
		    jQuery(".publish_internship_preliminary_cancel, .publish_internship_preliminary_confirm").click(function(){
			jQuery(".publish_internship_preliminary_div").fadeOut(300);
		    });
		    
		    jQuery(".publish_internship_preliminary_confirm").click(function(){
			jQuery(".publish_internship_form").submit();
			jQuery(".loading_img_middle_page").show();
		    });';
                    
                }
                #publish (close)
                
                #copy (open)
                if($arm_options_for_ngos_copy == "yes"){ //covered in content
                    
                        echo '
                        jQuery(".option_ngo_copy").click(function(){
                            jQuery(".confirmation_div").fadeOut(300);
                            jQuery(".copy_internship_preliminary_div").fadeIn(300);
                        });
                        
                        jQuery(".copy_internship_preliminary_cancel, .copy_internship_preliminary_confirm").click(function(){
                            jQuery(".copy_internship_preliminary_div").fadeOut(300);
                        });
                        
                        jQuery(".copy_internship_preliminary_confirm").click(function(){
                            jQuery(".copy_internship_form").submit();
                            jQuery(".loading_img_middle_page").show();
                        });';
                    
                }
                #copy (close)
                
                #complete (open)
                if($arm_options_for_ngos_complete == "yes"){ //covered in content
                    
                        echo '
                        jQuery(".option_ngo_complete").click(function(){
                            jQuery(".confirmation_div").fadeOut(300);
                            jQuery(".complete_internship_preliminary_div").fadeIn(300);
                        });
                        
                        jQuery(".complete_internship_preliminary_cancel, .complete_internship_preliminary_confirm").click(function(){
                            jQuery(".complete_internship_preliminary_div").fadeOut(300);
                        });
                        
                        jQuery(".complete_internship_preliminary_confirm").click(function(){
                            jQuery(".complete_internship_form").submit();
                            jQuery(".loading_img_middle_page").show();
                        });';
                    
                }
                #complete (close)
                
                #cancel (open)
                if($arm_options_for_ngos_cancel == "yes"){ //covered in content
                    
                        echo '
                        jQuery(".option_ngo_cancel").click(function(){
                            jQuery(".confirmation_div").fadeOut(300);
                            jQuery(".cancel_internship_preliminary_div").fadeIn(300);
                        });
                        
                        jQuery(".cancel_internship_preliminary_cancel, .cancel_internship_preliminary_confirm").click(function(){
                            jQuery(".cancel_internship_preliminary_div").fadeOut(300);
                        });
                        
                        jQuery(".cancel_internship_preliminary_confirm").click(function(){
			    jQuery(".loading_img_middle_page").show();
                            jQuery(".cancel_internship_form").submit();
                        });';
                    
                }
                #cancel (close)
                
                #delete (open)
                if($arm_options_for_ngos_delete == "yes"){ //covered in content
                    
                        echo '
                        jQuery(".option_ngo_delete").click(function(){
                            jQuery(".confirmation_div").fadeOut(300);
                            jQuery(".delete_internship_preliminary_div").fadeIn(300);
                        });
                        
                        jQuery(".delete_internship_preliminary_cancel, .cancel_internship_preliminary_confirm").click(function(){
                            jQuery(".delete_internship_preliminary_div").fadeOut(300);
                        });
                        
                        jQuery(".delete_internship_preliminary_confirm").click(function(){
                            jQuery(".delete_internship_form").submit();
                            jQuery(".loading_img_middle_page").show();
                        });';
                    
                }
                #delete (close)
                
                #delete and go to work center (open)
                if($arm_options_for_ngos_delete_and_go_back == "yes"){ //covered in content
                    
                        echo '
                        jQuery(".option_ngo_delete_and_go_back").click(function(){
                            jQuery(".confirmation_div").fadeOut(300);
                            jQuery(".delete_internship_and_go_back_preliminary_div").fadeIn(300);
                        });
                        
                        jQuery(".delete_internship_and_go_back_preliminary_cancel, .delete_internship_and_go_back_preliminary_confirm").click(function(){
                            jQuery(".delete_internship_and_go_back_preliminary_div").fadeOut(300);
                        });
                        
                        jQuery(".delete_internship_and_go_back_preliminary_confirm, .edit_cancel").click(function(){
                            jQuery(".loading_img_middle_page").show();
                            window.location.replace("'.get_permalink().'");
                        });';
                    
                }
                #delete and go to work center (close)
                
            }
            #options for ngos (close)
            
        }
        #options (close)
        
        #applications (open)
        if($arm_applications == "yes"){
            
            #for ngos (open)
            if($arm_accept_and_reject == "yes"){
                
                #accept reject button hover visuals (open)
                if(1==1){
                    echo '
                    jQuery(".application_link_accept").hover(function(){
                        jQuery(".application_link_reject_preliminary").not('.
                            'jQuery(this).parent().parent().parent().find(".application_link_reject_preliminary")'.
                        ').css("background-color","#D6341D");
                    },function(){
                        jQuery(".application_link_reject_preliminary").css("background-color","");
                    });
                     ';
                }
                #accept reject button hover visuals (close)
                
                #accept (open)
                if(1==1){
                    
                    #toggle application text (ngos) (open)
                    if(1==1){
                        echo '
                        jQuery(".toggle_application_text_button").click(function(){
                            jQuery(this).parent().find(".toggle_application_text_button").slideToggle(300);
                            jQuery(this).parent().parent().parent().find(".toggle_application_text").slideToggle(300);
                        });';
                    }
                    #toggle application text (ngos) (close)
                    
                    #application acceptance div (open)
                    if(1==1){
                        
                        echo '
                        jQuery(".application_link_accept").click(function(){
                            if(jQuery(this).parent().parent().parent().find(".application_active").html() == 1){';
                                
                                #transfer data from hidden field to div (open)
                                if(1==1){
                                    echo '
                                    jQuery(".accept_application_name").html(
                                        jQuery(this).parent().parent().find(".applicant_name").html()
                                    );
                                    jQuery(".accept_application_country").html(
                                        jQuery(this).parent().parent().find(".applicant_country").html()
                                    );
                                    jQuery(".accept_application_img").html(
                                        jQuery(this).parent().parent().find(".applicant_img").html()
                                    );
                                    jQuery(".accept_application_text").html(
                                        jQuery(this).parent().parent().find(".applicant_text").html()
                                    );
                                    jQuery(".textarea_preparation2").html(
                                        jQuery(this).parent().parent().find(".applicant_textarea_preparation").html()
                                    );
                                    jQuery(".accept_application_id").val(
                                        jQuery(this).parent().parent().find(".application_id").html()
                                    );';
                                }
                                #transfer data from hidden field to div (close)
                                
                                echo '
                                jQuery(".application_acceptance_div").show();
                            }
                        });';
                        
                    }
                    #application acceptance div (close)
                    
                    #submit form (open)
                    if(1==1){
                        
                        echo '
                        jQuery(".application_acceptance_div_button").click(function(){
                            jQuery(".application_acceptance_div").hide();
                            jQuery(".loading_img_middle_page").show();
                            jQuery(".application_accept_form").submit();
                        });';
                        
                    }
                    #submit form (close)
                    
                }
                #accept (close)
                
                #reject (open)
                if(1==1){
                    
                    #reject application click (open)
                    if(1==1){
                        echo '
                        jQuery(".application_link_reject_preliminary").click(function(){
                            jQuery(this).parent().parent().parent().find(".application_link_reject_preliminary_div").fadeIn(300);
                        });
                        
                        jQuery(".application_link_reject_cancel, .application_link_reject").click(function(){
                            jQuery(this).parent().parent().parent().find(".application_link_reject_preliminary_div").fadeOut(300);
                        });
                        
                        jQuery(".application_link_reject").click(function(){
                            if(jQuery(this).parent().parent().parent().find(".application_active").html() == 1){
                                jQuery(".loading_img_middle_page").fadeIn(300);
                                
                                jQuery(".mysql_load_area").'.
                                    'load("'.get_permalink(688).'?type=internship'.
                                        '&id='.$internship_row->internship_id.
                                        '&reject_application_code="+jQuery(this).parent().parent().parent().find(".application_code").html()+" '.
                                    '.mysql_visible_area", function() {
                                        jQuery(this).hide(0,function(){
                                            jQuery(this).show(0);
                                        });
                                        jQuery(".loading_img_middle_page").fadeOut(300);
                                });
                                
                                jQuery(this).parent().parent().parent().fadeOut(1000);
                                jQuery(this).parent().parent().parent().find(".application_active").html("0");
                            }
                        });';
                    }
                    #reject application click (close)
                    
                }
                #reject (close)
                
            }
            #for ngos (close)
            
        }
        #application (close)
        
        #internship report (open)
        if($arm_progress_reports == "yes"){
            
            #submit report (open)
            if(1==1){
                
                echo '
                jQuery(".submit_internship_report").click(function(){
                    jQuery(".internship_report_form").submit();
                });
                    
                ';
                
            }
            #submit report (close)
            
            #pagination (open)
            if(count($progress_reports_results) > $internship_reports_per_page){
                
                echo '
                
                var ProgressReportPagesSum = '.ceil(count($progress_reports_results)/$internship_reports_per_page).';
                var ProgressReportPagesCounter = 1;
                
                jQuery(".internship_report_next_page").click(function(){
                    if(ProgressReportPagesCounter < ProgressReportPagesSum){
                        jQuery(".internship_report_page:visible").fadeOut(150,function(){
                            jQuery(this).next(".internship_report_page:lt('.$internship_reports_per_page.')").fadeIn(150);
                            ProgressReportPagesCounter++;
                            jQuery(".progress_report_page_count").html(ProgressReportPagesCounter);
                            if(ProgressReportPagesCounter == 2){
                                jQuery(".internship_report_previous_page").toggleClass("voluno_button_inactive voluno_button");
                            }else if(ProgressReportPagesCounter == ProgressReportPagesSum){
                                jQuery(".internship_report_next_page").toggleClass("voluno_button_inactive voluno_button");
                            }
                        });
                    }
                });
                jQuery(".internship_report_previous_page").click(function(){
                    if(ProgressReportPagesCounter > 1){
                        jQuery(".internship_report_page:visible").fadeOut(150,function(){
                            jQuery(this).prev(".internship_report_page:lt('.$internship_reports_per_page.')").fadeIn(150);
                            ProgressReportPagesCounter--;
                            jQuery(".progress_report_page_count").html(ProgressReportPagesCounter);
                            if(ProgressReportPagesCounter + 1 == ProgressReportPagesSum){
                                jQuery(".internship_report_next_page").toggleClass("voluno_button_inactive voluno_button");
                            }else if(ProgressReportPagesCounter == 1){
                                jQuery(".internship_report_previous_page").toggleClass("voluno_button_inactive voluno_button");
                            }
                        });
                    }
                });
                ';
                
            }
            #pagination (close)
            
        }
        #internship report (close)
	
	#edit mode (open)
	if($arm_edit_mode == "yes"){
	    
	    #datepicker (open)
	    if(1==1){
		
		echo '
		jQuery(".edit_completion_deadline").datepicker({
		    dateFormat: "DD, dd. MM yy",
		    showOtherMonths: true,
		    selectOtherMonths: true,
		    changeMonth: true,
		    changeYear: true,
		    minDate:+1,
		    maxDate:"+1y",
		    onClose: function( selectedDate ) {
			jQuery(".edit_assignment_deadline").datepicker("option","maxDate",selectedDate );
		    }
		});
		
		jQuery(".edit_assignment_deadline").datepicker({
		    dateFormat: "DD, dd. MM yy",
		    showOtherMonths: true,
		    selectOtherMonths: true,
		    changeMonth: true,
		    changeYear: true,
		    minDate:+1,
		    maxDate:"+1y",
		    onClose: function( selectedDate ) {
			jQuery(".edit_completion_deadline").datepicker("option","minDate",selectedDate );
		    }
		});
		
		';
		
	    }
	    #datepicker (close)
	    
	    #edit mode jquery validation (open)
	    if(1==1){
		
		$validation_max_length_array = array(
		    array(
			"name" 		=> "title",
			"value" 		=> 100,
			"text_before_value" => "You have reached the character limit of ",
			"text_after_value" 	=> ". If you want to add more information, please do so in the description fields below.",
			"text_input_class"	=> "edit_title",
			"span_or_div"	=> "div",
			"type"		=> "text field"
		    ),
		    array(
			"name" 		=> "short_description",
			"value" 		=> 500,
			"text_before_value" => "You have reached the character limit of ",
			"text_after_value" 	=> ". If you want to add more information, please do so in the detailed description fields below.",
			"text_input_class"	=> "edit_short_description",
			"span_or_div"	=> "div",
			"type"		=> "text field"
		    ),
		    array(
			"name" 		=> "general_description",
			"value" 		=> 5000,
			"text_before_value" => "You have reached the character limit of ",
			"text_after_value" 	=> ". If you want to add more information, please attach a text file.",
			"text_input_class"	=> "edit_general_description",
			"span_or_div"	=> "div",
			"type"		=> "text field"
		    ),
		    array(
			"name" 		=> "specific_description",
			"value" 		=> 5000,
			"text_before_value" => "You have reached the character limit of ",
			"text_after_value" 	=> ". If you want to add more information, please attach a text file.",
			"text_input_class"	=> "edit_specific_description",
			"span_or_div"	=> "div",
			"type"		=> "text field"
		    )
		    
		);
		
		//1 --> $validation__character_limit__title. add this to maxlength="'.$validation__character_limit__general_description.'"
		//2 --> $validation__max_characters_divspan__general_description
		
		#execution (open)
		if(1==1){
		    
		    $warning_class_name = "number_of_characters__"; //e.g. number_of_characters__title
		    
		    for($aaw=0;$aaw<count($validation_max_length_array);$aaw++){
			
			if($validation_max_length_array[$aaw]['span_or_div'] == "span"){
			    $span_or_div = "span";
			}else{
			    $span_or_div = "div";
			}
			
			//character limit span. add this variable below the textfield
			${"validation__max_characters_divspan__".$validation_max_length_array[$aaw]['name']} =
			    '<'.$span_or_div.' style="color:#F86A00;" class="'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'">
			    </'.$span_or_div.'>';
			
			#max text lenght (open)
			if($validation_max_length_array[$aaw]['type'] == "text field"){
			    
			    //maxlenght variable.
			    ${"validation__character_limit__".$validation_max_length_array[$aaw]['name']}
				= $validation_max_length_array[$aaw]['value'];
			    
			    echo '
			    jQuery(".'.$validation_max_length_array[$aaw]['text_input_class'].'").keyup(function(){
				jQuery(".'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'").fadeIn(300);
				var max = '.$validation_max_length_array[$aaw]['value'].';
				var len = jQuery(this).val().length;
				if(len >= max) {
				    jQuery(".'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'").'.
					'html("'.$validation_max_length_array[$aaw]['text_before_value'].
					    $validation_max_length_array[$aaw]['value'].
					    $validation_max_length_array[$aaw]['text_after_value'].'");
				}else{
				    var char_left = max - len;
				    jQuery(".'.$warning_class_name.$validation_max_length_array[$aaw]['name'].'")'.
					'.html(char_left + " of " + max + " characters left.");
				}
			    });';
			    
			}
			#max text lenght (close)
			
			#
			elseif($validation_max_length_array[$aaw]['type'] == "checkbox"){}
			    
			    
			    
			#}
			#
			
		    }
		    
		}
		#execution (close)
		
	    }
	    #edit mode jquery validation (close)
	
	}
	#edit mode (close)
	
        echo '
        });
    </script>';
    
}
#jquery (close)

#content (open)
if($arm_content == "yes" AND empty($reprocess_arm)){
    
    #edit form open (open)
    if($arm_edit_mode == "yes"){
	echo '
	<form
	    method="post"
	    action="'.get_permalink().'?type=internship&id='.$get_id_old.'&edit_internship=1"
	    enctype="multipart/form-data"
	    class="edit_internship_form"
	>
	    <input type="hidden" value="yes" name="activate_mysql_update_in_edit_mode">
	    <input
		type="hidden"
		value="save_only"
		name="save_only_or_save_and_close_or_publish_and_save_edit_mode"
		class="save_only_or_save_and_close_or_publish_and_save_edit_mode">
	    <input type="hidden" name="edit_delete_files" class="edit_delete_files">
	    <input type="hidden" name="ready_for_publication_check" class="ready_for_publication_check">
	';
    }
    #edit form open (close)
    
    #breadcrums, img, title, short description (open)
    if($arm_breadcrums_img_title_short_description == "yes"){
        
        #breadcrums and img (open)
        if($arm_breadcrums_and_img == "yes"){
            
            #img (open)
            if($arm_img == "yes"){
                
                #function-image-processing
                    #thematic only
                      $function_propic__type = "thematic";
                      $function_propic__original_img_name = "internships.jpg";
                   #all
                     $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
                   include('#function-image-processing.php');
                
            echo '
            <img src="'.$function_propic.'" class="voluno_header_picture">';
            }
            #img (close)
            
            #breadcrums (open)
            if($arm_breadcrums == "yes"){
                #function-breadcrums.php
                    $function_breadcrums__left[]    = "Go to Work Center";
                    $function_breadcrums__left[]    = get_permalink();
                    include('#function-breadcrums.php');
            }
            #breadcrums (close)
            
        }
        #breadcrums and img (close)
        
        #title (open)
        if($arm_title == "yes"){
            
            #preparation (open)
            if(1==1){
                
                $internship_status_for_title_array = array(    #mysql (not used, only to get a better overview)
                                                                        #for display
                                                array(   "draft",       "draft"),
                                                array(   "unassigned",  "waiting for volunteers"),
                                                array(   "in progress", "in progress"),
                                                array(   "completed",   "completed"),
                                                array(   "cancelled",   "cancelled"),
                                                array(   "deleted",     "deleted")
                                                     );
                
                $internship_status_for_title_num = array_search($internship_row->internship_status,$internship_status_for_title_array);
                
            }
            #preparation (close)
            
            echo '
            <div style="text-align:center;width:590px;">
                <h4 style="display:inline;font-weight:bold;">
                    internship ('.$internship_status_for_title_array[$internship_status_number-1][1].'):
                </h4>
                <br>';
                
                #non-edit (open)
                if($arm_edit_mode != "yes"){
                    echo '
                    <h1 style="display:inline;">';
                        if(empty($internship_row->internship_name)){
                            echo '
                            <span style="color:red;font-style:italic;">
                                Please add a title.
                            </span>';
                        }else{
                            echo
                            $internship_row->internship_name;
                        }
                    echo '
                    </h1>';
                }
                #non-edit (close)
                
                #edit (open)
                if($arm_edit_mode == "yes"){
                    
                    #preparation (open)
                    if(1==1){
                        
                        #help word (open)
                        if(1==1){
                            #function-help-word.php
                                $function_help_word_hover_link = "internship title:"; //1, 2 or 3, obligatory
                                $function_help_word_variable_only = "yes";
                                $function_help_word_help_content = '
                                    <b>What is the shortest possible description of the internship?</b>
                                    <p>
					Please describe the internship using keywords.
                                    </p>
				    <br>
                                    <ul>
                                        <li>
                                            <b>Please avoid including content related titles or shorten them</b>
                                            <p>Positive example:
                                            <ul>
                                                <li style="list-style-type:none;">
                                                    <i>&quot;Proof-read report&quot;</i>
                                                    <i>&quot;Proof-read report (agriculture + climate change)&quot;</i>
                                                </li>
                                            </ul>
                                            Negative example:
                                            <ul>
                                                <li style="list-style-type:none;">
                                                    <i>&quot;Proof-read report on the detrimental effects of climate
                                                    change on the agricultural
                                                    productivity of small scale farmers in the Delta Region&quot;</i>
                                                </li>
                                            </ul>
                                            Note: Instead, provide the title in the description (next field).</p><br>
                                        </li>
                                        <li>
                                            <b>Focus on main activities</b><br>
                                            <p>Additional sub-internships can be mentioned in the description.</p><br>
                                        </li>
                                    </ul>';
                                include('#function-help-word.php');
                        }
                        #help word (close)
                        
                    }
                    #preparation (close)
                    
                    #menu (open)
                    if(1==1){
                        echo '
                        <div class="show_this_in_edit_mode">
                            <span style="font-weight:bold;">
                                '.$function_help_word.'
                            </span>
                            <input
                                style="width:350px;"
                                type="text"
                                name="edit_title"
                                class="edit_title"
                                placeholder="Example: &quot;Create flyer&quot;"
                                value="'.$internship_row->internship_name.'"
				maxlength="'.$validation__character_limit__title.'"
                            >
			    '.$validation__max_characters_divspan__title.'
                        </div>';
                    }
                    #menu (close)
                    
                }
                #edit (close)
                
            echo '
            </div>';
        }
        #title (close)
        
        #short description (open)
        if($arm_short_description == "yes"){
            echo '
            <div style="margin:20px 0px;width:600px;">';
                
                #non-edit (open)
                if($arm_edit_mode != "yes"){
                    echo '
                    <p>';
                        if(empty($internship_row->internship_description)){
                            echo '
                            <span style="color:red;font-style:italic;font-weight:bold;">
                                Please add a short description.
                            </span>';
                        }else{
                            echo '
                            <strong>
                                Short description:
                            </strong>
                            <br>
                            '.$internship_row->internship_description;
                        }
                    echo '
                    </p>';
                }
                #non-edit (close)
                
                #edit (open)
                if($arm_edit_mode == "yes"){
                    
                    #preparation (open)
                    if(1==1){
                        
                        #help word (open)
                        if(1==1){
                            
                            #function-help-word.php
                                $function_help_word_hover_link = "Description:"; //1, 2 or 3, obligatory
                                $function_help_word_variable_only = "yes";
                                $function_help_word_help_content = '
                                    <b>What is the internship about?</b>
                                    <p>Please describe the internship in one or two sentences. Additionally, you
                                    can provide useful information about the internship.
                                    This could help volunteers to decide:</p><br>
                                    <ul>
                                        <li>
                                            <b>Whether they are truely capable of completing the internship.</b><br>
                                            Is there an additional skill required? E.g. social skills,
                                            software knowledge, etc.<br>
                                            Note: The requirements can be chosen below. This field is just
                                            for possible further requirements, not
                                            listed below.<br><br>
                                        </li>
                                        <li>
                                            <b>Whether they are truely willing to complete the internship</b><br>
                                            Inform about both the costs and benefits of working on this internship.<br>
                                            If the internship is very frustrating, volunteers should know what they
                                            are getting into. This reduces
                                            the risk that they underestimate the effort, become frustrated and
                                            and give up without completing the internship.<br>
                                            On the other hand, if the internship offers a lot to learn or deals with
                                            an interesting topic, volunteers might be more willing to work on it,
                                            even if the type of internship is not their top preference.
                                        </li>
                                    </ul>';
                                include('#function-help-word.php');
                                
                        }
                        #help word (close)
                        
                    }
                    #preparation (close)
                    
                    #menu (open)
                    if(1==1){
                        echo '
                        <div class="show_this_in_edit_mode">
                            <div style="font-weight:bold;">
                                '.$function_help_word.'
                            </div>
                            <textarea
                                style="width:580px;resize: vertical;"
                                class="edit_short_description"
                                name="edit_short_description"
				maxlength="'.$validation__character_limit__short_description.'"
                                placeholder="Please describe the internship. Example: &quot;Create a flyer that briefly'.
                                            ' introduces our organization and gives and overview of our current projects.&quot;"
                            >'.
                                $internship_row->internship_description.
                            '</textarea>
			    '.$validation__max_characters_divspan__short_description;
                            
                            
                            echo '
                            <div style="margin:20px;text-align:center;">
                                <div class="voluno_button option_ngo_close" style="display:inline;margin:10px;">
                                    Cancel
                                </div>
                                <div class="voluno_button option_ngo_save" style="display:inline;margin:10px;">
                                    Save
                                </div>
                                <div class="voluno_button option_ngo_save_and_close" style="display:inline;margin:10px;">
                                    Save and close
                                </div>
                            </div>
                            
                            
                        </div>';
                    }
                    #menu (close)
                    
                }
                #edit (close)
                
            echo '
            </div>';
            
        }
        #short description (close)
	
    }
    #breadcrums, img, title, short description (close)
    
    #content divs table 1/3 (open)
    if($arm_content_divs_table == "yes"){
        echo '
        <table>
            <tr>
                <td style="width:70%;padding-right:20px;">';
    }
    #content divs table 1/3 (open)
        
        #left side content divs (open)
        if($arm_left_side_content_divs == "yes"){
            
            #progress reports [mysql] [->content] (open)
            if($arm_progress_reports == "yes"){
                
                #preparation (open)
                if(1==1){
                    
                    #image processing (open)
                    if(1==1){
                        #function-image-processing
                            #thematic only
                              $function_propic__type = "thematic";
                              $function_propic__original_img_name = "internship_progress.png";
                           #all
                             $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
                           include('#function-image-processing.php');
                           $content_div_img = $function_propic;
                    }
                    #image processing (close)
                    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    echo '
                    <div class="content_div">';
                        
                        #title and img (open)
                        if(1==1){
                            echo '
                            <img src="'.$content_div_img.'" class="content_div_img">
                            <h5 class="content_div_title" style="display:inline;">
                                <a style="cursor:pointer;">
                                    Progress reports ('.count($progress_reports_results).')
                                </a>
                            </h5>';
                        }
                        #title and img (close)
                        
                        #text (open)
                        if(1==1){
                            echo '
                            <div class="content_div_content">';
                                
                                #div and table, open (open)
                                if(1==1){
                                    echo '
                                    <div
                                        style="
                                            border-radius:25px;
                                            padding:10px;
                                            margin-bottom:10px;
                                        "
                                    >
                                        <table>';
                                }
                                #div and table, open (close)
                                    
                                    #if no progress reports yet (open)
                                    if(empty($progress_reports_results)){
                                        echo '
                                        <tr>
                                            <td>
                                                There are no progress reports yet.
                                            </td>
                                        </tr>';
                                    }
                                    #if no progress reports yet (close)
                                    
                                    #if at least one progress report exists (open)
                                    else{
                                        
                                        #outside loop preparation (open)
                                        if(1==1){
                                            
                                            #pagination: function-image-processing (open)
                                            if(count($progress_reports_results) > $internship_reports_per_page){
                                                
                                                #thematic only
                                                    $function_propic__type = "thematic";
                                                    $function_propic__original_img_name = "voluno_img_3532.png";
                                                #all
                                                    $function_propic__geometry = array(20,15); //optional, if e.g. only width: 300, NULL; vice versa
                                                    $function_propic__rotate = 180;
                                                include('#function-image-processing.php');
                                                $function_propic_last = $function_propic;
                                                
                                                #thematic only
                                                    $function_propic__type = "thematic";
                                                    $function_propic__original_img_name = "voluno_img_3532.png";
                                                #all
                                                    $function_propic__geometry = array(20,15); //optional, if e.g. only width: 300, NULL; vice versa
                                                include('#function-image-processing.php');
                                                $function_propic_next = $function_propic;
                                                
                                            }
                                            #pagination: function-image-processing (close)
                                            
                                        }
                                        #outside loop preparation (close)
                                        
                                        #loop (open)
                                        for($four=0;$four<count($progress_reports_results);$four++){
                                            
                                            #inside loop preparation (open)
                                            if(1==1){
                                                
                                                #function_profile_link.php (open)
                                                if(1==1){
                                                    $function_profile_link = $progress_reports_results[$four]->usersext_id; //default: 1
                                                    include('#function-profile-link.php');
                                                    #output saved in:
                                                    # $function_profile_link__link
                                                    # $function_profile_link__name_link
                                                    # $function_profile_link__link_title
                                                }
                                                #function_profile_link.php (close)
                                                
                                                #function-image-processing (open)
                                                if(1==1){
                                                   #profile picture
                                                     $function_propic__type = "profile picture";
                                                     $function_propic__user_id = $progress_reports_results[$four]->usersext_id;
                                                   #all
                                                     $function_propic__geometry = array(60,60);
                                                   include('#function-image-processing.php');
                                                   $profile_picture = $function_propic;
                                                }
                                                #function-image-processing (close)
                                                
                                                #function-only-first-x-symbols.php (open)
                                                if(1==1){
                                                    $function_only_first_x_symbols = $progress_reports_results[$four]->work_internships_rep_text; #content
                                                    $function_only_first_x_symbols_num = 300; #optional, number of symbols, default is 100
                                                    include('#function-only-first-x-symbols.php');
                                                    #output: $function_only_first_x_symbols
                                                }
                                                #function-only-first-x-symbols.php (close)
                                                
                                                #reverse counter (open)
                                                if(1==1){
                                                    
                                                    if($four == 0){
                                                        $progress_report_counter = count($progress_reports_results)+1;
                                                    }
                                                    
                                                    $progress_report_counter--;
                                                    
                                                }
                                                #reverse counter (close)
                                                
                                                #function-timezone.php (open)
                                                if(1==1){
                                                    
                                                    $function_timezone = $progress_reports_results[$four]->work_internships_rep_date_created;
                                                    $function_timezone_format = "date (weekday short no_year)"; //default: datetime (weekday long hour min sec)
                                                    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                    //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                    include('#function-timezone.php');
                                                    #output:
                                                    $function_timezone_date = $function_timezone;
                                                    
                                                    $function_timezone = $progress_reports_results[$four]->work_internships_rep_date_created;
                                                    $function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
                                                    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                    //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                    include('#function-timezone.php');
                                                    $function_timezone_time = $function_timezone;
                                                    
                                                    $function_timezone_created = $function_timezone_date.',<br>'.$function_timezone_time;
                                                    
                                                    $function_timezone = $progress_reports_results[$four]->work_internships_rep_date_created;
                                                    $function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
                                                    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                    //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                    include('#function-timezone.php');
                                                    #output:
                                                    $function_timezone_dif = $function_timezone;
                                                
                                                }
                                                #function-timezone.php (close)
                                                
                                                #pagination (open)
                                                if(count($progress_reports_results) > $internship_reports_per_page){
                                                    
                                                    if($four != 0){
                                                        $internship_report_page_activity = ' style="display:none;"';
                                                    }
                                                    
                                                    #in between
                                                    if(($four + 1) % $internship_reports_per_page == 0){
                                                        $open_tbody_for_pagination = 1;
                                                        $close_tbody_for_pagination = 0;
                                                    }elseif(($four + 2) % $internship_reports_per_page == 0){
                                                        $open_tbody_for_pagination = 0;
                                                        $close_tbody_for_pagination = 1;
                                                    }else{
                                                        $open_tbody_for_pagination = 0;
                                                        $close_tbody_for_pagination = 0;
                                                    }
                                                    
                                                    #start
                                                    if($four == 0){
                                                        $open_tbody_for_pagination = 1;
                                                    }
                                                    
                                                    #ending
                                                    if($four + 1 == count($progress_reports_results)){
                                                        $close_tbody_for_pagination = 1;
                                                    }
                                                    
                                                }
                                                #pagination (close)
                                                
                                            }
                                            #inside loop preparation (close)
                                            
                                            #row (open)
                                            if(1==1){
                                                
                                                #pagination 1/2 (open)
                                                if($open_tbody_for_pagination == 1){
                                                    echo '
                                                    <tbody class="internship_report_page"'.$internship_report_page_activity.'>';
                                                }
                                                #pagination 1/2 (close)
                                                
                                                    echo '
                                                    <tr>';
                                                        
                                                        #name and image (open)
                                                        if(1==1){
                                                            echo '
                                                            <td style="width:80px;padding-bottom:20px;">
                                                                '.$function_profile_link__name_link.'
                                                                <br>
                                                                <a
                                                                    href="'.$function_profile_link__link.'"
                                                                    title="'.$function_profile_link__link_title.'"
                                                                >
                                                                    <img
                                                                        class="voluno_brighter_on_hover"
                                                                        src="'.$profile_picture.'"
                                                                        style="border-radius:10px;border:1px solid black;margin-top:10px;"
                                                                    >
                                                                </a>
                                                            </td>';
                                                        }
                                                        #name and image (close)
                                                        
                                                        #progress report text (open)
                                                        if(1==1){
                                                            echo '
                                                            <td style="text-align:justify;padding-bottom:20px;">
                                                                <p>
                                                                    '.$function_only_first_x_symbols.'
                                                                </p>
                                                                <br>
                                                                '.$file_icons_array[$four].'
                                                            </td>';
                                                        }
                                                        #progress report text (close)
                                                        
                                                        #progress report stats (open)
                                                        if(1==1){
                                                            echo '
                                                            <td style="width:90px;text-align:right;">
                                                                <div style="font-weight:bold;font-style:italic;">
                                                                    Report #
                                                                    '.$progress_report_counter.'
                                                                </div>
                                                                <br>
                                                                '.$function_timezone_date.'
                                                                <br>
                                                                '.$function_timezone_time.'
                                                                <br>
                                                                ('.$function_timezone_dif.')
                                                            </td>';
                                                        }
                                                        #progress report stats (close)
                                                        
                                                    echo '
                                                    </tr>';
                                                    
                                                #pagination 2/2 (open)
                                                if($close_tbody_for_pagination == 1){
                                                    echo '
                                                    </tbody>';
                                                }
                                                #pagination 2/2 (close)
                                                
                                            }
                                            #row (close)
                                            
                                        }
                                        #loop (close)
                                        
                                        #pagination (open)
                                        if(count($progress_reports_results) > $internship_reports_per_page){
                                            echo '
                                            <tr>
                                                <td colspan="3" style="text-align:center;">
                                                    <div
                                                        style="width:100px;padding:5px;display:inline-block;font-weight:normal;"
                                                        class="voluno_button_inactive internship_report_previous_page"
                                                    >
                                                        <img src="'.$function_propic_last.'">
                                                        <br>
                                                        Previous page
                                                    </div>
                                                    Page
                                                    <span class="progress_report_page_count">
                                                        1
                                                    </span>
                                                    of
                                                    '.ceil(count($progress_reports_results) / $internship_reports_per_page).'
                                                    <div
                                                        style="width:100px;padding:5px;display:inline-block;font-weight:normal;"
                                                        class="voluno_button internship_report_next_page"
                                                    >
                                                        <img src="'.$function_propic_next.'">
                                                        <br>
                                                        Next page
                                                    </div>
                                                </td>
                                            </tr>';
                                        }
                                        #pagination (close)
                                        
                                    }
                                    #if at least one progress report exists (close)
                                    
                                    #form to submit new report (open)
                                    if(1==1){
                                        
                                        echo '
                                        <tr style="border-top:1px dotted grey;">
                                            <td style="text-align:center;" colspan="3">
                                                <form
                                                    method="post"
                                                    action="'.add_query_arg(NULL,NULL ).'"
                                                    class="internship_report_form"
                                                    enctype="multipart/form-data"
                                                >';
                                                
                                                #form submit test (open)
                                                if(1==1){
                                                    echo '
                                                    <input name="internship_report_form_submitted" type="hidden" value="yes">';
                                                }
                                                #form submit test (close)
                                                
                                                #textarea (open)
                                                if(1==1){
                                                    echo '
                                                    <textarea
                                                        name="internship_report_text"
                                                        class="internship_report_text"
                                                        style="width:98%;margin:10px 0px;resize:vertical;background-color:#fff;"
                                                        placeholder="Did you work on this internship? Write a short report here to keep'.
                                                        ' everyone up to date."
                                                    >'.
                                                    '</textarea>';
                                                }
                                                #textarea (close)
                                                
                                                #attachments (open)
                                                if(1==1){
                                                    
                                                    echo '
                                                    <input
                                                        name="internship_report_file[]"
                                                        class="internship_report_file"
                                                        type="file"
                                                        multiple
                                                    >';
                                                    
                                                }
                                                #attachments (close)
                                                
                                                echo '
                                                </form>
                                                <div
                                                    class="voluno_button submit_internship_report"
                                                    style="width:100px;margin: 10px auto 0px auto;display:inline-box;"
                                                >
                                                    Submit report
                                                </div>
                                            </td>
                                        </tr>';
                                        
                                    }
                                    #form to submit new report (close)
                                    
                                #div and table, close (open)
                                if(1==1){
                                    echo '
                                    </table>
                                </div>';
                                }
                                #div and table, close (close)
                                
                            echo '
                            </div>';
                        }
                        #text (close)
                        
                    echo '
                    </div>';
                }
                #content (close)
            }
            #progress reports [mysql] [->content] (close)
            
            #applications [mysql] [->content]  (open)
            if($arm_applications == "yes"){
                
                #preparation (open)
                if(1==1){
                    
                    #image processing (open)
                    if(1==1){
                        #function-image-processing
                            #thematic only
                              $function_propic__type = "thematic";
                              $function_propic__original_img_name = "internships_applicants.png";
                           #all
                             $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
                           include('#function-image-processing.php');
                    }
                    #image processing (close)
                    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    echo '
                    <div class="content_div">';
                    
                    #for ngo (open)
                    if($arm_accept_and_reject == "yes"){
                        
                        #title and img (open)
                        if(1==1){
                            echo '
                            <img src="'.$function_propic.'" class="content_div_img">
                            <h5 class="content_div_title" style="display:inline;">
                                <a style="cursor:pointer;">
                                    Applications ('.count($applications_results).')
                                </a>
                            </h5>';
                        }
                        #title and img (close)
                        
                        #content for the ngo (open)
                        if(1==1){
                            echo '
                            <div class="content_div_content">';
                            
                            #if no volunteers yet (open)
                            if(empty($applications_results)){
                                echo '
                                <p>
                                    No volunteers have applied yet. Please have patience.
                                </p>';
                            }
                            #if no volunteers yet (close)
                            
                            #if at least one volunteer (open)
                            else{
                                echo '
                                <table
                                    style="
                                        border:1px solid black;
                                        margin:30px auto;
                                        width:95%;
                                        background-color:#fff;
                                    "
                                    class="application_table"
                                >';
                                    
                                    #title row (open)
                                    if(1==1){
                                        echo '
                                        <tr
                                            style="
                                                background-color:#8B0000;
                                                color:#fff;
                                                font-weight:bold;
                                            "
                                        >
                                            <td style="width:5%;">
                                                #
                                            </td>
                                            <td style="width:25%;" colspan="2">
                                                Applicant
                                            </td>
                                            <td style="width:15%;">
                                                Application text
                                            </td>
                                            <td style="width:20%;">
                                                Application date
                                            </td>
                                            <td style="width:35%;" colspan="2">
                                                Do you accept?
                                            </td>
                                        </tr>';
                                    }
                                    #title row (close)
                                    
                                    #content loop (open)
                                    for($six=0;$six<count($applications_results);$six++){
                                        
                                        #preparation (open)
                                        if(1==1){
                                            
                                            #bg color (open)
                                            if(1==1){
                                                if($six % 2 == TRUE){
                                                    $class_row_bg = "uneven";
                                                }else{
                                                    $class_row_bg = "even";
                                                }
                                            }
                                            #bg color (close)
                                            
                                            #function-image-processing (open)
                                            if(1==1){
                                               #profile picture
                                                 $function_propic__type = "profile picture";
                                                 $function_propic__user_id = $applications_results[$six]->usersext_id;
                                               #all
                                                 $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
                                               include('#function-image-processing.php');
                                               $function_propic_for_table = $function_propic;
                                               
                                               #profile picture
                                                 $function_propic__type = "profile picture";
                                                 $function_propic__user_id = $applications_results[$six]->usersext_id;
                                               #all
                                                 $function_propic__geometry = array(200,200); //optional, if e.g. only width: 300, NULL; vice versa
                                               include('#function-image-processing.php');
                                               $function_propic_for_application = $function_propic;
                                            }
                                            #function-image-processing (close)
                                            
											#function_profile_link.php (v1.0) (open)
											if(1==1){
												
												$function_profile_link = $applications_results[$six]->usersext_id; //default: 1
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
                                            
                                            #function-timezone.php (open)
                                            if(1==1){
                                                
                                                $function_timezone = $applications_results[$six]->application_date_created;
                                                $function_timezone_format = "date (weekday short no_year)"; //default: datetime (weekday long hour min sec)
                                                //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                include('#function-timezone.php');
                                                #output:
                                                $function_timezone_date = $function_timezone;
                                                
                                                $function_timezone = $applications_results[$six]->application_date_created;
                                                $function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
                                                //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                include('#function-timezone.php');
                                                $function_timezone_time = $function_timezone;
                                                
                                                $function_timezone_created = $function_timezone_date.',<br>'.$function_timezone_time;
                                                
                                                $function_timezone = $applications_results[$six]->application_date_created;
                                                $function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
                                                //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                include('#function-timezone.php');
                                                #output:
                                                $function_timezone_time_difference = $function_timezone;
                                                
                                            }
                                            #function-timezone.php (close)
                                            
                                        }
                                        #preparation (close)
                                        
                                        echo '
                                        <tbody class="'.$class_row_bg.'">';
                                            
                                            #main row (open)
                                            if(1==1){
                                            echo '
                                            <tr style="border-top:1px dotted grey;">';
                                                
                                                #counter (open)
                                                if(1==1){
                                                    echo '
                                                    <td style="text-align:center;">
                                                        '.($six+1).'
                                                    </td>';
                                                }
                                                #counter (close)
                                                
                                                #name and img (open)
                                                if(1==1){
                                                    echo '
                                                    <td>
                                                        <a
                                                            href="'.$function_profile_link__link.'"
                                                            title="'.$function_profile_link__link_title.'"
                                                        >
                                                            <img
                                                                class="voluno_brighter_on_hover"
                                                                src="'.$function_propic_for_table.'"
                                                                style="border-radius:10px;border:1px solid black;"
                                                            >
                                                        </a>
                                                    </td>
                                                    <td style="text-align:center;" class="applicant_name">
                                                        '.$function_profile_link__name_link.'
                                                    </td>';
                                                }
                                                #name and img (close)
                                                
                                                #application text toggle button (open)
                                                if(1==1){
                                                    
                                                    #if there isn't a text (open)
                                                    if(empty($applications_results[$six]->application_text)){
                                                        echo '
                                                        <td>
                                                            <span style="color:grey;">
                                                                No application text submitted.
                                                            </span>
                                                        </td>';
                                                    }
                                                    #if there isn't a text (close)
                                                    
                                                    #if there is a text (open)
                                                    else{
                                                        
                                                        //See jquery: "toggle application text"
                                                        
                                                        $width = 40;
                                                        echo '
                                                        <td style="text-align:justify;">
                                                            <div
                                                                class="voluno_button toggle_application_text_button"
                                                                style="width:'.$width.'px;margin:auto;"
                                                            >
                                                                Show
                                                            </div>
                                                            <div
                                                                class="voluno_button toggle_application_text_button"
                                                                style="width:'.$width.'px;display:none;margin:auto;"
                                                            >
                                                                Hide
                                                            </div>
                                                        </td>';
                                                        
                                                    }
                                                    #if there is a text (close)
                                                    
                                                }
                                                #application text toggle button (close)
                                                
                                                #application date (open)
                                                if(1==1){
                                                    echo '
                                                    <td style="text-align:center;">
                                                        '.$function_timezone_created.'
                                                        <br>
                                                        ('.$function_timezone_time_difference.')
                                                    </td>';
                                                }
                                                #application date (close)
                                                
                                                #acceptance or rejection (open)
                                                if(1==1){
                                                    
                                                    echo '
                                                    <td style="text-align:center;">
                                                        <div
                                                            class="voluno_button application_link_accept"
                                                            style="margin:auto;width:50px;"
                                                        >
                                                            Accept
                                                        </div>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <div
                                                            style="
                                                                border-radius:20px;
                                                                background-color:#fff;
                                                                text-align:center;
                                                                position:absolute;
                                                                padding:20px;
                                                                border:1px solid black;
                                                                margin-left:-33px;
                                                                margin-top:-58px;
                                                                width:200px;
                                                                height:80px;
                                                                display:none;
                                                            "
                                                            class="application_link_reject_preliminary_div"
                                                        >
                                                            Are you sure you want to reject this application?
                                                            <br>
                                                            <div
                                                                style="width:50px;display:inline-block;"
                                                                class="voluno_button application_link_reject_cancel"
                                                            >
                                                                Cancel
                                                            </div>
                                                            <div
                                                                style="width:60px;display:inline-block;"
                                                                class="voluno_button application_link_reject"
                                                            >
                                                                Confirm
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="voluno_button application_link_reject_preliminary"
                                                            style="margin:auto;width:50px;"
                                                        >
                                                            Reject
                                                        </div>
                                                    </td>';
                                                    
                                                }
                                                #acceptance or rejection (close)
                                                
                                                #hidden fields (open)
                                                if(1==1){
                                                    
                                                        $nl = '&#013;';
                                                        echo '
                                                        <td style="display:none;">
                                                            <span class="application_active">
                                                                1
                                                            </span>
                                                            <div class="applicant_img">
                                                                <img
                                                                    src="'.$function_propic_for_application.'"
                                                                    style="border-radius:25px;border:1px solid black;"
                                                                >
                                                            </div>
                                                            <span class="application_code">'.
                                                                $applications_results[$six]->application_code.
                                                            '</span>
                                                            <span class="application_id">'
                                                                .$applications_results[$six]->application_id.
                                                            '</span>
                                                            <span class="applicant_country">
                                                                '.$applications_results[$six]->list_countries_name.
                                                            '</span>
                                                            <div class="applicant_textarea_preparation">
                                                                <textarea '.
                                                                    'name="application_acceptance_text" '.
                                                                    'id="application_acceptance_text" '.
                                                                    'style="width:98.5%;height:15em;resize:vertical;"'.
                                                                '>'.
                                                                'Dear '.$applications_results[$six]->usersext_displayName.','.$nl.
                                                                $nl.
                                                                'thank you for applying to the internship: '.
                                                                '"'.$internship_row->internship_name.'". '.$nl.
                                                                $nl.
                                                                'I have accepted your application and would now kindly '.
                                                                'ask you to begin with your work. '.$nl.
                                                                'If you require any additional information, please don\'t '.
                                                                'hesitate to contact me at any time. '.$nl.
                                                                $nl.
                                                                'Thanks in advance for your support. This is a big help! '.$nl.
                                                                $nl.
                                                                'Best regards, '.$nl.
                                                                $nl.
                                                                $GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName.$nl.
                                                                $is_a_internship_selected_row->ngo_name.$nl.
                                                                '</textarea>
                                                            </div>
                                                            <div class="applicant_text">';
                                                                if(!empty($applications_results[$six]->application_text)){
                                                                    echo '
                                                                    <p>
                                                                        '.$applications_results[$six]->application_text.'
                                                                    </p>';
                                                                }else{
                                                                    echo '
                                                                    <p style="color:grey;font-style:italic;">
                                                                        No application text submitted.
                                                                    </p>';
                                                                }
                                                            echo '
                                                            </div>
                                                        </td>';
                                                }
                                                #hidden fields (close)
                                                
                                            echo '
                                            </tr>';
                                            }
                                            #main row (close)
                                            
                                            #application text row (open)
                                            if(!empty($applications_results[$six]->application_text)){
                                                echo '
                                                <tr
                                                    style="background-color:'.$bg_color.';padding:0px;"
                                                >
                                                    <td style="text-align:justify;padding:0px;" colspan="100">
                                                        <div
                                                            class="toggle_application_text"
                                                            style="margin:auto;width:70%;display:none;"
                                                        >
                                                            <p>
                                                                '.$applications_results[$six]->application_text.'
                                                            </p>
                                                            <br>
                                                        </div>
                                                    </td>
                                                </tr>';
                                            }
                                            #application text row (close)
                                        
                                        echo '
                                        </tbody>';
                                    }
                                    #content loop (close)
                                    
                                echo '
                                </table>';
                                    
                                #appication acceptance div (open)
                                if(1==1){
                                    
                                    #function-fixed-div.php (open)
                                    if(1==1){
                                        $function_fixed_div_part = 1; //1 or 2, obligatory
                                        $function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
                                        $function_fixed_div_div_name = "application_acceptance_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
                                        $function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
                                        $function_fixed_div_cancel_button = "yes"; //optional, default is yes
                                        $function_fixed_div_height_div = "80"; //optional, in percent, default is 50
                                        $function_fixed_div_border_radius = 25; //optional, default is 0
                                        $function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
                                        $function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
                                        $function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
                                        include('#function-fixed-div.php');
                                        $fixed_div_display_open = $function_fixed_div_display;
                                        
                                        $function_fixed_div_part = 2; //1 or 2, both are obligatory
                                        include('#function-fixed-div.php');
                                        $fixed_div_display_close = $function_fixed_div_display;
                                    }
                                    #function-fixed-div.php (close)
                                    
                                    #div (open)
                                    if(1==1){
                                        echo
                                        $fixed_div_display_open.'
                                        <div
                                            style="
                                                height:400px;
                                                overflow-y:auto;
                                                overflow-x:hidden;
                                                margin-right:-20px;
                                                padding-right:10px;
                                            "
                                        >';
                                    }
                                    #div (open)
                                        
                                        #title (open)
                                        if(1==1){
                                            
                                            echo '
                                            <div style="text-align:center;padding-top:10px;">
                                                <strong>
                                                    Accept volunteer application for internship:
                                                </strong>
                                                <br>
                                                <h2 style="display:inline;margin:20px;">
                                                    '.$internship_row->internship_name.'
                                                </h2>
                                            </div>';
                                            
                                        }
                                        #title (close)
                                        
                                        #content (open)
                                        if(1==1){
                                                
                                            echo '
                                            <table>
                                                <tr>
                                                    <td style="width:200px;padding-right:10px;">';
                                                        
                                                        #volunteer img (open)
                                                        if(1==1){
                                                            echo '
                                                            <br>
                                                            <div class="accept_application_img">
                                                            </div>';
                                                        }
                                                        #volunteer img (close)
                                                        
                                                    echo '
                                                    </td>
                                                    <td>';
                                                        
                                                        #name, country, text (open)
                                                        if(1==1){
                                                            
                                                            echo '
                                                            <span class="accept_application_name" style="font-weight:bold;">
                                                            </span>
                                                            from
                                                            <span class="accept_application_country">
                                                            </span>
                                                            wrote:
                                                            <div
                                                                class="accept_application_text"
                                                                style="vertical-align:middle;margin-top:7px;text-align:justify;"
                                                            >
                                                            </div>';
                                                            
                                                        }
                                                        #name, country, text (close)
                                                        
                                                    echo '
                                                    </td>
                                                </tr>
                                            </table>';
                                            
                                            #application acceptance text title (open)
                                            if(1==1){
                                                echo '
                                                <div style="width:100%;margin-top:20px;text-align:center;">';
                                                    #function-help-word.php
                                                        $function_help_word_hover_link =
                                                            'Please write some words to inform the volunteer:';
                                                        $function_help_word_width = 90;
                                                        $function_help_word_help_content = '
                                                            <p><strong>
                                                                Application acceptance text
                                                            </strong>
                                                            <br>
                                                            Now that you have accepted a volunteer, two things need to happen:
                                                            </p>
                                                            <ul>
                                                                <li>
                                                                    The volunteer needs to be informed that he has been selected.
                                                                </li>
                                                                <li>
                                                                    The volunteer needs to be provided with everything he needs in order
                                                                    to begin work on the internship.
                                                                </li>
                                                            </ul>
                                                            <p>
                                                            Below is an automated message. You can either leave it as it is or modify it.
                                                            
                                                            </p>
                                                            ';
                                                        include('#function-help-word.php');
                                                echo '
                                                </div>';
                                            }
                                            #application acceptance text title (open)
                                            
                                            #form (open)
                                            if(1==1){
                                                echo '
                                                <br>
                                                <form method="post" action="'.add_query_arg(NULL,NULL).'" class="application_accept_form">
                                                    <div class="textarea_preparation2">
                                                    </div>
                                                    <input type="hidden" name="accept_application_id" class="accept_application_id" value="">
                                                </form>
                                                <div
                                                    class="voluno_text_button_style application_acceptance_div_button"
                                                    style="
                                                        margin: 30px auto;
                                                        background:#8B0000;
                                                        cursor: pointer;
                                                        width:100px;
                                                    "
                                                >
                                                    Accept application
                                                </div>';
                                            }
                                            #form (close)
                                        }
                                        #content (close)
                                        
                                    #div (close)
                                    if(1==1){
                                        echo '
                                        </div>'.
                                        $fixed_div_display_close;
                                    }
                                    #div (close)
                                    
                                }
                                #appication acceptance div (close)
                                
                            }
                            #if at least one volunteer (close)
                            
                            echo '
                            </div>';
                        }
                        #content for the ngo (close)
                        
                    }
                    #for ngo (close)
                    
                    #for volunteers (open)
                    if(2==1){
                        
                        #title and img (open)
                        if(1==1){
                            echo '
                            <img src="'.$function_propic.'" class="content_div_img">
                            <h5 class="content_div_title" style="display:inline;">
                                <a style="cursor:pointer;">
                                    Applications
                                </a>
                            </h5>';
                        }
                        #title and img (close)
                        
                        #content for the ngo (open)
                        if(1==1){
                            echo '
                            <div class="content_div_content">
                                <p>
                                    No volunteers have applied yet. Please have patience.
                                </p>
                            </div>';
                        }
                        #content for the ngo (close)
                        
                    }
                    #for volunteers (close)
                    
                    echo '
                    </div>';
                }
                #content (close)
            }
            #applications [mysql] [->content]  (close)
            
            #internship type (open)
            if($arm_edit_mode == "yes" AND $arm_basic_info == "yes"){
                
                #preparation (open)
                if(1==1){
                    
                    #image processing (open)
                    if(1==1){
                        #thematic only
                            $function_propic__type = "thematic";
                            $function_propic__original_img_name = "internship_type.png";
                        #all
                            $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
                        include('#function-image-processing.php');
                        $function_propic_content_div = $function_propic;
                    }
                    #image processing (close)
                    
                    #help word (open)
                    if(1==1){
                        #function-help-word.php
                            $function_help_word_margin = "margin-left:-450px;";
                            $function_help_word_width = "margin-left:-200px";
                            $function_help_word_hover_link = '
                                <div style="font-weight:bold;margin:20px 0px 5px 0px;">
                                    internship categories:
                                </div>';
                            $function_help_word_help_content = '
                                <p style="font-weight:bold;">
                                    What activity is associated with the internship?
                                </p>
                                <p>
                                    Which category does the internship fall into?
                                    Please select one or more categories.
                                </p>
                                <p>
                                    If your category is not yet features, please don\'t
                                    hesitate to send us a mail,
                                    so that we can add it to the list.
                                </p>';
                            include('#function-help-word.php');
                    }
                    #help word (close)
                    
		    #function-div-table-selects.php (open)
		    if(1==1){
			
			$function_div_table_selects_query2 = 'SELECT *
								FROM fi4l3fg_voluno_lists_work_internship_types
								    LEFT JOIN (
									SELECT *
									FROM fi4l3fg_voluno_items_internships_properties
									WHERE work_internships_p_type = "type"
									    AND work_internships_p_internship_id = '.$get_id.'
								    ) as aaa_selected
								    ON internship_type_id = work_internships_p_type_id
								WHERE internship_type_parent_id = 274
								ORDER BY internship_type_num_of_children ASC;';
								
			$function_div_table_selects_query3 = 'SELECT *
								FROM fi4l3fg_voluno_lists_work_internship_types
								    LEFT JOIN (
									SELECT *
									FROM fi4l3fg_voluno_items_internships_properties
									WHERE work_internships_p_type = "type"
									    AND work_internships_p_internship_id = '.$get_id.'
								    ) as aaa_selected
								    ON internship_type_id = work_internships_p_type_id
								WHERE internship_type_parent_id = %d
								ORDER BY internship_type_name ASC;';
								
			$function_div_table_selects_query4 = 'SELECT *
								FROM fi4l3fg_voluno_lists_work_internship_types
								    LEFT JOIN (
									SELECT *
									FROM fi4l3fg_voluno_items_internships_properties
									WHERE work_internships_p_type = "type"
									    AND work_internships_p_internship_id = '.$get_id.'
								    ) as aaa_selected
								    ON internship_type_id = work_internships_p_type_id
								WHERE internship_type_parent_id = %d;';
								
			$function_div_table_selects_name = "internship_category_selection";//php_name instead of random id, also top class name. must be valid class name
			$function_div_table_selects_display_text_mysql = "internship_type_name"; //what you see (mysql)
			$function_div_table_selects_value_mysql = "internship_type_id"; //what php sees (mysql)
			$function_div_table_selects_input_name = "edit_internship_type_id"; //$_POST['-->this<--']
			$function_div_table_selects_selected_column_name = "work_internships_p_type_id"; //default: "pers_settings_value"
			$function_div_table_selects_all_children = "no";
			$function_div_table_selects_cols_per_row = 3; //obligatory, regarding top level
			$function_div_table_selects_max_selected_checkboxed = $max_of_allowed_internship_category_selection;
			
			include('#function-div-table-selects.php');
			
		    }
		    #function-div-table-selects.php (close)
		    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    echo '
                    <div class="content_div show_this_in_edit_mode">';
                        
                        echo '
                        <img src="'.$function_propic_content_div.'" class="content_div_img" style="padding:10px 0px 10px 10px;">
                        <h5 class="content_div_title" style="display:inline;">
                            <a style="cursor:pointer;">
                                internship categories
                            </a>
                        </h5>
                        <div class="content_div_content" style="margin:20px auto;width:70%;display:none;">
			    '.$function_div_table_selects.'
			    <div style="margin:20px 0px;width:100%;text-align:center;">
                                <div class="voluno_button option_ngo_close" style="display:inline;margin:5px;">
                                    Cancel
                                </div>
                                <div class="voluno_button option_ngo_save" style="display:inline;margin:5px;">
                                    Save
                                </div>
                                <div class="voluno_button option_ngo_save_and_close" style="display:inline;margin:5px;">
                                    Save and close
                                </div>
                            </div>
                        
                        </div>
                    </div>';
                }
                #content (close)
                
            }
            #internship type (close)
            
            #long description (open)
            if($arm_long_description == "yes"){
                
                #preparation (open)
                if(1==1){
                    
                    #image processing (open)
                    if(1==1){
                        #function-image-processing
                            #thematic only
                              $function_propic__type = "thematic";
                              $function_propic__original_img_name = "internship_description_long.png";
                           #all
                             $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
                           include('#function-image-processing.php');
                           $function_propic_content_div = $function_propic;
                    }
                    #image processing (close)
                    
                    #non-edit: general description (open)
                    if(1==1){
                        
                        #function-only-first-x-symbols.php (open)
                        if(1==1){
                            
                            $function_only_first_x_symbols = $internship_row->internship_description_long; #content
                            $function_only_first_x_symbols_num = 300; #optional, number of symbols, default is 100
                            include('#function-only-first-x-symbols.php');
                            $long = $function_only_first_x_symbols;
                            
                        }
                        #function-only-first-x-symbols.php (close)
                        
                        #function-file-icons.php (open)
                        if(1==1){
                            $function_file_icons = $files_general_description_results; //array of file ids
                            
                            #edit mode (open)
                            if($arm_edit_mode == "yes"){
                                $function_file_icons_delete_option = "yes";
                            }
                            #edit mode (close)
                            
                            include("#function-file-icons.php");
                            $general_description_files = $function_file_icons;
                            
                            #edit mode (open)
                            if($arm_edit_mode == "yes"){
                                $general_description_files_delete = $function_file_icons_delete;
                            }
                            #edit mode (close)
                            
                        }
                        #function-file-icons.php (close)
                        
                    }
                    #non-edit: general description (close)
                    
                    #non-edit: specific description (open)
                    if(1==1){
                        
                        #function-only-first-x-symbols.php (open)
                        if(1==1){
                            
                            $function_only_first_x_symbols = $internship_row->internship_description_undisclosed; #content
                            $function_only_first_x_symbols_num = 300; #optional, number of symbols, default is 100
                            include('#function-only-first-x-symbols.php');
                            $undisclosed = $function_only_first_x_symbols;
                            
                        }
                        #function-only-first-x-symbols.php (close)
                        
                        #function-file-icon.php (open)
                        if(1==1){
                            $function_file_icons = $files_specific_description_results; //array of file ids
                            
                            #edit mode (open)
                            if($arm_edit_mode == "yes"){
                                $function_file_icons_delete_option = "yes";
                            }
                            #edit mode (close)
                            
                            include("#function-file-icons.php");
                            $specific_description_files = $function_file_icons;
                            
                            #edit mode (open)
                            if($arm_edit_mode == "yes"){
                                $specific_description_files_delete = $function_file_icons_delete;
                            }
                            #edit mode (close)
                            
                        }
                        #function-file-icon.php (close)
                        
                    }
                    #non-edit: specific description (close)
                    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    echo '
                    <div class="content_div">';
                        
                        echo '
                        <img src="'.$function_propic_content_div.'" class="content_div_img" style="padding:10px 0px 10px 10px;">
                        <h5 class="content_div_title" style="display:inline;">
                            <a style="cursor:pointer;">
                                Detailed description
                            </a>
                        </h5>
                        <div class="content_div_content" style="margin:20px auto;width:70%;">';
                            
                            #general description (open)
                            if($arm_long_description_general == "yes"){
                                
                                #edit (open)
                                if($arm_edit_mode == "yes"){
                                    
                                    #preparation (open)
                                    if(1==1){
                                        
                                        #help word (open)
                                        if(1==1){
                                            
                                            #function-help-word.php
                                                $function_help_word_hover_link = "General description:"; //1, 2 or 3, obligatory
                                                $function_help_word_variable_only = "yes";
                                                $function_help_word_help_content = '
                                                    <b>Detailed internship description for not yet accepted volunteers</b>
                                                    <p>This text is visible to all volunteers at Voluno, so please don\'t provide
                                                    sensitive information here, but in the next textarea instead.
                                                    <br>
                                                    This text should help volunteers to get a clear idea on what the internship is about.
                                                    Most volunteers who read this text will already have read the short description, so
                                                    they will already be interested. Please give a detailed explanation that can help
                                                    volunteers decide:</p><br>
                                                    <ul>
                                                        <li>
                                                            <b>Whether they are truely capable of completing the internship.</b><br>
                                                            Is there an additional skill required? E.g. social skills,
                                                            software knowledge, etc.<br>
                                                            Note: The requirements can be chosen below. This field is just
                                                            for possible further requirements, not
                                                            listed below.<br><br>
                                                        </li>
                                                        <li>
                                                            <b>Whether they are truely willing to complete the internship</b><br>
                                                            Inform about both the costs and benefits of working on this internship.<br>
                                                            If the internship is very frustrating, volunteers should know what they
                                                            are getting into. This reduces
                                                            the risk that they underestimate the effort, become frustrated and
                                                            and give up without completing the internship.<br>
                                                            On the other hand, if the internship offers a lot to learn or deals with
                                                            an interesting topic, volunteers might be more willing to work on it,
                                                            even if the type of internship is not their top preference.
                                                        </li>
                                                    </ul>';
                                                include('#function-help-word.php');
                                                
                                        }
                                        #help word (close)
                                        
					#function-sanitize-text.php (open)
					if(1==1){
					  $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
					  /*
					   *one line unformatted text (city, name, occupation, etc.)
					   *email address
					   *plain text with line breaks (biography)
					  */
					  $function_sanitize_text__text = $internship_row->internship_description_long;
					  $function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
					  include('#function-sanitize-text.php');
					}
					#function-sanitize-text.php (close)
					
                                    }
                                    #preparation (close)
                                    
                                    #menu (open)
                                    if(1==1){
                                        echo '
                                        <div class="show_this_in_edit_mode">
                                            <div style="font-weight:bold;">
                                                '.$function_help_word.'
                                            </div>
                                            <textarea
                                                style="resize:vertical;width:400px;height:20em;margin:5px 0px;"
                                                class="edit_general_description"
                                                name="edit_general_description"
						maxlength="'.$validation__character_limit__general_description.'"
                                                placeholder="Please describe the internship. Example: &quot;Create a flyer that briefly'.
                                                            ' introduces our organization and gives and overview of our current projects.&quot;"
                                            >'.
                                                $function_sanitize_text__text_sanitized.
                                            '</textarea>
					    '.$validation__max_characters_divspan__general_description.'
                                            '.$general_description_files_delete.'
                                            <div style="margin-bottom:30px;text-align:center;">
                                                <input
                                                    type="file"
                                                    class="edit_general_description_files"
                                                    name="edit_general_description_files[]"
                                                    multiple="multiple"
                                                >
                                            </div>
                                        </div>';
                                    }
                                    #menu (close)
                                    
                                }
                                #edit (close)
                                
                                #non edit content (open)
                                if($arm_edit_mode != "yes"){
                                    echo '
                                    <div>
                                        <strong>
                                            General description
                                        </strong>
                                        <p>';
					if(empty($internship_row->internship_description_long)){
					    echo '
					    <span style="color:red;font-style:italic;">
						Please add a general description.
					    </span>';
					}else{
					    echo
					    $long;
					}
					echo '
                                        </p>
                                        '.$general_description_files.'
                                        <br>
                                    </div>';
                                }
                                #non edit content (close)
                                
                            }
                            #general description (close)
                            
                            #specific description (open)
                            if($arm_long_description_specific == "yes"){
                                
                                #edit (open)
                                if($arm_edit_mode == "yes"){
                                    
                                    #preparation (open)
                                    if(1==1){
					
                                        #help word (open)
                                        if(1==1){
                                            
                                            #function-help-word.php
                                                $function_help_word_hover_link = "Specific description:"; //1, 2 or 3, obligatory
                                                $function_help_word_variable_only = "yes";
                                                $function_help_word_help_content = '
                                                    <b>Detailed internship description for accepted volunteers</b>
                                                    <p>Once a volunteer is accepted for a internship, he or she are probably going to
                                                    need additional information and files before the work can start. That is
                                                    what this text is for. Please provide as much information and be as specific
                                                    as possible. The more information you provide, the less likely the volunteer
                                                    is to:
                                                    </p><br>
                                                    <ul>
                                                        <li>
                                                            Do something wrong<br>
                                                        </li>
                                                        <li>
                                                            Have to ask questions<br>
                                                        </li>
                                                    </ul>
                                                    <br>
                                                    <p>
                                                        Alternatively, you can also arrange a meeting with the volunteer after
                                                        you have accepted the volunteer. If that is what you prefer, you should
                                                        briefly note it in the "general description". When accepting the volunteer,
                                                        you should immediately make a suggestion for a meeting, to speed up the process.
                                                    </p>
                                                    ';
                                                include('#function-help-word.php');
                                        }
                                        #help word (close)
                                        
					#function-sanitize-text.php (open)
					if(1==1){
					  $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
					  /*
					   *one line unformatted text (city, name, occupation, etc.)
					   *email address
					   *plain text with line breaks (biography)
					  */
					  $function_sanitize_text__text = $internship_row->internship_description_undisclosed;
					  $function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
					  include('#function-sanitize-text.php');
					}
					#function-sanitize-text.php (close)
					
                                    }
                                    #preparation (close)
                                    
                                    #menu (open)
                                    if(1==1){
                                        echo '
                                        <div class="show_this_in_edit_mode">
                                            <div style="font-weight:bold;">
                                                '.$function_help_word.'
                                            </div>
                                            <textarea
                                                style="resize:vertical;width:400px;height:20em;margin:5px 0px;"
                                                class="edit_specific_description"
                                                name="edit_specific_description"
						maxlength="'.$validation__character_limit__specific_description.'"
                                                placeholder="Please describe the internship. Example: &quot;Create a flyer that briefly'.
                                                            ' introduces our organization and gives and overview of our current projects.&quot;"
                                            >'.
                                                $function_sanitize_text__text_sanitized.
                                            '</textarea>
					    '.$validation__max_characters_divspan__specific_description.'
                                            '.$specific_description_files_delete.'
                                            <div style="margin-bottom:30px;text-align:center;">
                                                <input
                                                    type="file"
                                                    class="edit_specific_description_files"
                                                    name="edit_specific_description_files[]"
                                                    multiple="multiple"
                                                >
                                            </div>
                                        </div>';
                                    }
                                    #menu (close)
                                    
                                }
                                #edit (close)
                                
                                #non edit content (open)
                                if($arm_edit_mode != "yes"){
                                    echo '
                                    <div>
                                        <strong>
                                            Specific description
                                        </strong>
                                        <p>';
					if(empty($internship_row->internship_description_undisclosed)){
					    echo '
					    <span style="color:red;font-style:italic;">
						Please add a specific description.
					    </span>';
					}else{
					    echo
					    $undisclosed;
					}
					echo '
                                        </p>
                                        '.$specific_description_files.'
                                    </div>';
                                }
                                #non edit content (close)
                                
                            }
                            #specific description (close)
                            
			    #edit (open)
			    if($arm_edit_mode == "yes"){
				echo '
				<div style="margin:20px 0px;width:100%;text-align:center;">
				    <div class="voluno_button option_ngo_close" style="display:inline;margin:5px;">
					Cancel
				    </div>
				    <div class="voluno_button option_ngo_save" style="display:inline;margin:5px;">
					Save
				    </div>
				    <div class="voluno_button option_ngo_save_and_close" style="display:inline;margin:5px;">
					Save and close
				    </div>
				</div>';
			    }
			    #edit (close)
                                
                        echo '
                        </div>
                    </div>';
                }
                #content (close)
                
            }
            #long description (close)
            
        }
        #left side content divs (close)
        
    #content divs table 2/3 (open)
    if($arm_content_divs_table == "yes"){
                echo '
                </td>
                <td>';
    }
    #content divs table 2/3 (open)
        
        #right side content div (open)
        if($arm_right_side_content_div == "yes"){
            
            #admin information (open)
            if(current_user_can('manage_options')){
                
                #preparation (open)
                if(1==1){
                    #image processing (open)
                    if(1==1){
                        
                        #function-image-processing
                            #thematic only
                              $function_propic__type = "thematic";
                              $function_propic__original_img_name = "admin.png";
                           #all
                             $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
                           include('#function-image-processing.php');
                           $function_propic_content_div_img = $function_propic;
                           
                    }
                    #image processing (close)
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    echo '
                    <div class="content_div">';
                        
                        #title and img (open)
                        if(1==1){
                            echo '
                            <img src="'.$function_propic_content_div_img.'" class="content_div_img">
                            <h5 style="display:inline;">
                                Admin info
                            </h5>';
                        }
                        #title and img (close)
                        
                        #text (open)
                        if(1==1){
                            
                            $margin_top = 10;
                            
                            echo '
                            <div class="content_div_content">
                                My roles: '.$user_role.'
                                <br>
                                internship status: '.$internship_status.'
                            </div>';
                        }
                        #text (close)
                        
                    echo '
                    </div>';
                }
                #content (close)
                
            }
            #admin information (close)
            
            #options (open)
            if($arm_options == "yes"){
                
                #preparation (open)
                if(1==1){
                    
                    #image processing content div (open)
                    if(1==1){
                        #function-image-processing
                            #thematic only
                              $function_propic__type = "thematic";
                              $function_propic__original_img_name = "options.png";
                           #all
                             $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
                           include('#function-image-processing.php');
                           $content_div_img = $function_propic;
                    }
                    #image processing content div (close)
                    
                    #volunteers (open)
                    if($arm_options_for_volunteers == "yes"){
                        
                        #function-image-processing (open)
                        if(1==1){
                            
                            
                            
                            #thematic only
                                $function_propic__type = "thematic";
                                $function_propic__original_img_name = "write_report_white.png";
                            #all
                                $function_propic__geometry = array($image_width,$image_width); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                            $img_write_report = $function_propic;
                            
                            #thematic only
                                $function_propic__type = "thematic";
                                $function_propic__original_img_name = "ask_question_white.png";
                            #all
                                $function_propic__geometry = array($image_width,$image_width); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                            $img_ask_question = $function_propic;
                            
                            #thematic only
                                $function_propic__type = "thematic";
                                $function_propic__original_img_name = "withdraw_white.png";
                            #all
                                $function_propic__geometry = array($image_width,$image_width); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                            $img_quit_internship = $function_propic;
                            
                        }
                        #function-image-processing (close)
                        
                        #array (open)
                        if(1==1){
                                
                                $option_menu_array[]
                                    = array(
                                        "img_source"            =>  $img_write_report,
                                        "class_name"            =>  "option_volunteer_write_report",
                                        "button_text"           =>  "Write progress report"
                                        );
                                $option_menu_array[]
                                    = array(
                                        "img_source"            =>  $img_ask_question,
                                        "class_name"            =>  "option_volunteer_ask_question",
                                        "button_text"           =>  "Ask question"
                                        );
                                $option_menu_array[]
                                    = array(
                                        "img_source"            =>  $img_quit_internship,
                                        "class_name"            =>  "option_volunteer_quit_internship",
                                        "button_text"           =>  "Resign from internship"
                                        );
                                
                        }
                        #array (close)
                        
                    }
                    #volunteers (close)
                    
                    #ngos (open)
                    if($arm_options_for_ngos == "yes"){
                        
                        #publish (open)
                        if($arm_options_for_ngos_publish == "yes"){
			    
			    #confirmation div + icon color (open)
			    if(1==1){
				
				#if internship is ready (open)
				if(!empty($internship_row->internship_ready_for_publication)){
				    
				    $icon_bg_color = "green";
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-53px;
						margin-top:-153px;
						width:180px;
						display:none;
					    "
					    class="publish_internship_preliminary_div confirmation_div"
					>
					    <p style="font-weight:bold;">
						Are you sure that you want to publish this internship?
					    </p>
					    <p>
						Once it is published, you will no longer be able
						to edit any internship information or correct typing errors.
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="width:50px;display:inline-block;"
						    class="voluno_button publish_internship_preliminary_cancel"
						>
						    Cancel
						</div>
						<div
						    style="width:60px;display:inline-block;"
						    class="voluno_button publish_internship_preliminary_confirm"
						>
						    Publish
						</div>
					    </div>
					</div>';
					
				}
				#if internship is ready (close)
				
				#if internship is not ready (open)
				else{
				    
				    $icon_bg_color = "red";
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-53px;
						margin-top:-103px;
						width:180px;
						display:none;
					    "
					    class="publish_internship_preliminary_div confirmation_div"
					>
					    <p style="font-weight:bold;">
						The internship is not ready yet
					    </p>
					    <p>
						Before publishing, please edit the internship to add more information.
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="display:inline-block;"
						    class="voluno_button publish_internship_preliminary_cancel"
						>
						    Cancel
						</div>
						<a
						    style="display:inline-block;color:#fff;"
						    class="voluno_button publish_internship_preliminary_cancel option_ngo_edit"
						    href="'.get_permalink().'?type=internship&id='.$internship_row->internship_id.'&edit_internship=1"
						>
						    Edit internship
						</a>
					    </div>
					</div>';
					
				}
				#if internship is not ready (close)
				
			    }
			    #confirmation div + icon color (close)
			    
			    #publish internship form (open)
			    if(!empty($internship_row->internship_ready_for_publication)){
				
				$confirmation_div_and_form =
				    $confirmation_div_and_form.
				    '<form
					class="publish_internship_form"
					method="post"
					action="'.get_permalink().'?type=internship&id='.$internship_row->internship_id.'"
				    >
					<input type="hidden" name="publish_internship" value="1">
				    </form>
				    ';
				
			    }
			    #publish internship form (close)
			    
			    $option_menu_array[]
				= array(
				    "img_name"              =>  "publish_white.png",
				    "class_name"            =>  "option_ngo_publish",
				    "button_text"           =>  "Publish the internship, so that volunteers can apply to it.",
				    "code_before_button"    =>  $confirmation_div_and_form,
				    "big_icon"		=>  "yes",
				    "icon_bg_color"		=>  $icon_bg_color
				    );
                            
                        }
                        #publish (close)
                        
                        #save and publish (only when creating new internship) (open)
                        if($arm_options_for_ngos_save_and_publish == "yes"){
                            
			    #confirmation div (open)
			    if(1==1){
				$confirmation_div =
				    '<div
					style="
					    border-radius:20px;
					    background-color:#fff;
					    text-align:center;
					    position:absolute;
					    padding:20px;
					    z-index:10;
					    border:1px solid black;
					    margin-left:-53px;
					    margin-top:-153px;
					    width:200px;
					    display:none;
					"
					class="publish_internship_preliminary_div confirmation_div"
				    >
					<p>
					    Are you sure that you want publish this internship?
					    <br>
					    Once it is pubslished, you will no longer be able
					    to edit any internship information, correct typing errors, etc.
					</p>
					<div style="margin-top:5px;">
					    <div
						style="width:50px;display:inline-block;"
						class="voluno_button publish_internship_preliminary_cancel"
					    >
						Cancel
					    </div>
					    <div
						style="width:60px;display:inline-block;"
						class="voluno_button publish_internship_preliminary_confirm"
					    >
						Publish
					    </div>
					</div>
				    </div>';
			    }
			    #confirmation div (close)
			    
			    $option_menu_array[]
				= array(
				    "img_name"              =>  "publish_white.png",
				    "class_name"            =>  "edit_save_publish",
				    "button_text"           =>  "Click here to publish the internship, so that volunteers can apply to it.",
				    "code_before_button"    =>  $confirmation_div,
				    "big_icon"		=>  "yes"
				    );
                            
                        }
                        #save and publish (only when creating new internship) (close)
                        
                        #edit (open)
                        if($arm_options_for_ngos_edit == "yes"){
                            
			    $option_menu_array[]
				= array(
					"img_name"              =>  "edit_white.png",
					"class_name"            =>  "option_ngo_edit",
					"button_text"           =>  "Edit internship",
					"link_button"	    =>  get_permalink().'?type=internship&id='.$internship_row->internship_id.'&edit_internship=1',
					"big_icon"		    =>  "no",
					"order_position"        =>  -1000
					);
                            
                        }
                        #edit (close)
			
                        #copy (open)
                        if($arm_options_for_ngos_copy == "yes"){
                            
			    #confirmation div (open)
			    if(1==1){
				$confirmation_div_and_form =
				    '<div
					style="
					    border-radius:20px;
					    background-color:#fff;
					    text-align:center;
					    position:absolute;
					    padding:20px;
					    z-index:10;
					    border:1px solid black;
					    margin-left:-53px;
					    margin-top:-58px;
					    width:200px;
					    display:none;
					"
					class="copy_internship_preliminary_div confirmation_div"
				    >
					<p>
					    Use this internship as template for a new internship and then go to the new internship?
					</p>
					<div style="margin-top:5px;">
					    <div
						style="width:30px;display:inline-block;"
						class="voluno_button copy_internship_preliminary_cancel"
					    >
						No
					    </div>
					    <div
						style="width:30px;display:inline-block;"
						class="voluno_button copy_internship_preliminary_confirm"
					    >
						Yes
					    </div>
					</div>
				    </div>';
			    }
			    #confirmation div (close)
			    
			    #complete internship form (open)
			    if(1==1){
				
				$confirmation_div_and_form =
				    $confirmation_div_and_form.
				    '<form
					class="copy_internship_form"
					method="post"
					action="'.get_permalink().'?type=internship&id='.$internship_row->internship_id.'"
				    >
					<input type="hidden" name="copy_internship" value="1">
				    </form>';
				
			    }
			    #complete internship form (close)
			    
			    $option_menu_array[]
				= array(
					"img_name"              =>  "copy_white.png",
					"class_name"            =>  "option_ngo_copy",
					"button_text"           =>  "Use as draft for new internship",
					"code_before_button"    =>  $confirmation_div_and_form,
					"big_icon"	        =>  "no",
					"order_position"        =>  5000
					);
                            
                        }
                        #copy (close)
                        
                        #complete (open)
                        if($arm_options_for_ngos_complete == "yes"){
                            
			    #confirmation div (open)
			    if(1==1){
				$confirmation_div_and_form =
				    '<div
					style="
					    border-radius:20px;
					    background-color:#fff;
					    text-align:center;
					    position:absolute;
					    padding:20px;
					    z-index:10;
					    border:1px solid black;
					    margin-left:-53px;
					    margin-top:-58px;
					    width:200px;
					    display:none;
					"
					class="complete_internship_preliminary_div confirmation_div"
				    >
					<p>
					    Are you sure that you want to terminate this internship?
					</p>
					<div style="margin-top:5px;">
					    <div
						style="width:30px;display:inline-block;"
						class="voluno_button complete_internship_preliminary_cancel"
					    >
						No
					    </div>
					    <div
						style="width:30px;display:inline-block;"
						class="voluno_button complete_internship_preliminary_confirm"
					    >
						Yes
					    </div>
					</div>
				    </div>';
			    }
			    #confirmation div (close)
			    
			    #complete internship form (open)
			    if(1==1){
				
				$confirmation_div_and_form =
				    $confirmation_div_and_form.
				    '<form
					class="complete_internship_form"
					method="post"
					action="'.get_permalink().'?type=internship&id='.$internship_row->internship_id.'"
				    >
					<input type="hidden" name="complete_internship" value="1">
				    </form>';
				
			    }
			    #complete internship form (close)
				
			    $option_menu_array[]
				= array(
					"img_name"              =>  "voluno_img_3521.png",
					"class_name"            =>  "option_ngo_complete",
					"button_text"           =>  'Terminate internship. Please click here if:'.
								    '&#13; - The volunteer has completed the internship.'.
								    '&#13; - The volunteer has failed to complete the internship'.
								    '&#13;   and you don\'t thing he or she is still going to.'.
								    '&#13; - You no longer need this internship to be completed.',
					"code_before_button"    =>  $confirmation_div_and_form,
					"big_icon"	        =>  "no",
					"order_position"        =>  2000
					);
                            
                        }
                        #complete (close)
                        
                        #reassign (open)
                        if($arm_options_for_ngos_reassign == "yes"){
                            
			    $option_menu_array[]
				= array(
					"img_name"              =>  "reassign_white.png",
					"class_name"            =>  "option_ngo_reassign",
					"button_text"           =>  "Remove volunteer and reopen internship for application",
					"big_icon"		    =>  "no"
					);
                            
                        }
                        #reassign (close)
                        
			#cancel (open)
			if($arm_options_for_ngos_cancel == "yes" ){#dome
			    
			    #confirmation div (open)
			    if(1==1){
				
				$confirmation_div_and_form =
				    '<div
					style="
					    border-radius:20px;
					    background-color:#fff;
					    text-align:center;
					    position:absolute;
					    padding:20px;
					    z-index:10;
					    border:1px solid black;
					    margin-left:-53px;
					    margin-top:-153px;
					    width:180px;
					    display:none;
					"
					class="cancel_internship_preliminary_div confirmation_div"
				    >
					<p style="font-weight:bold;">
					    Are you sure that you want to cancel this internship?
					</p>
					<p>
					    The internship will be marked as cancelled, but will still be
					    available if you ever change your mind.
					</p>
					<div style="margin-top:5px;">
					    <div
						style="width:50px;display:inline-block;"
						class="voluno_button cancel_internship_preliminary_cancel"
					    >
						No
					    </div>
					    <div
						style="width:60px;display:inline-block;"
						class="voluno_button cancel_internship_preliminary_confirm"
					    >
						Yes
					    </div>
					</div>
				    </div>';
				    
			    }
			    #confirmation div (close)
			    
			    #form (open)
			    if(!empty($internship_row->internship_ready_for_publication)){
				
				$confirmation_div_and_form =
				    $confirmation_div_and_form.
				    '<form
					class="cancel_internship_form"
					method="post"
					action="'.get_permalink().'?type=internship&id='.$internship_row->internship_id.'"
				    >
					<input type="hidden" name="cancel_internship" value="1">
				    </form>
				    ';
				
			    }
			    #form (close)
			    
			    $option_menu_array[]
				= array(
					"img_name"              =>  "cancel_white.png",
					"class_name"            =>  "option_ngo_cancel",
					"button_text"           =>  "Cancel internship",
					"big_icon"		    =>  "no",
					"code_before_button"    =>  $confirmation_div_and_form
					);
			    
			}
			#cancel (close)
			
			#GROUP: edit mode (open)
			if(1==1){
			    
			    #close (open)
			    if($arm_options_for_ngos_edit_close == "yes"){
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "close-white.png",
					    "class_name"            =>  "option_ngo_close",
					    "button_text"           =>  "Close edit mode without saving",
					    "big_icon"		=>  "yes",
					    "order_position"	=>  -1003
					    );
				
			    }
			    #close (close)
			    
			    #save (open)
			    if($arm_options_for_ngos_edit_save == "yes"){
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "save-white.png",
					    "class_name"            =>  "option_ngo_save",
					    "button_text"           =>  "Save internship",
					    "big_icon"		=>  "no",
					    "order_position"	=>  -1002
					    );
				
			    }
			    #save (close)
			    
			    #save and close (open)
			    if($arm_options_for_ngos_edit_save_and_close == "yes"){
				
				$option_menu_array[]
				    = array(
					    "img_name"              =>  "save_and_close-white.png",
					    "class_name"            =>  "option_ngo_save_and_close",
					    "button_text"           =>  "Save internship and close",
					    "big_icon"		=>  "yes",
					    "margin_top_px"		=>  "margin-top:7px;",
					    "order_position"	=>  -1001
					    );
				
			    }
			    #save and close (close)
			    
			    #save and publish (open)
			    if($arm_options_for_ngos_edit_save_and_publish == "yes"){
				
				#confirmation div (open)
				if(1==1){
				    $confirmation_div_and_form =
					'<div
					    style="
						border-radius:20px;
						background-color:#fff;
						text-align:center;
						position:absolute;
						padding:20px;
						z-index:10;
						border:1px solid black;
						margin-left:-53px;
						margin-top:-153px;
						width:180px;
						display:none;
					    "
					    class="save_and_publish_internship_preliminary_div confirmation_div"
					>
					    <p style="font-weight:bold;">
						Are you sure that you want publish this internship?
					    </p>
					    <p>
						Once it is published, you will no longer be able
						to edit any internship information or correct typing errors.
					    </p>
					    <div style="margin-top:5px;">
						<div
						    style="width:50px;display:inline-block;"
						    class="voluno_button save_and_publish_internship_preliminary_cancel"
						>
						    Cancel
						</div>
						<div
						    style="width:60px;display:inline-block;"
						    class="voluno_button save_and_publish_internship_preliminary_confirm"
						>
						    Publish
						</div>
					    </div>
					</div>';
				}
				#confirmation div (close)
				
				#div with check if internship is ready for publication div (open)
				if(1==1){
				    
				    #function-fixed-div.php (open)
				    if(1==1){
					$function_fixed_div_part = 1; //1 or 2, obligatory
					$function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
					$function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
					$function_fixed_div_div_name = "validation_before_publication_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
					$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
					$function_fixed_div_border_radius = 25; //optional, default is 0
					$function_fixed_div_cancel_button = "yes"; //optional, default is yes
					$function_fixed_div_height_div = "10"; //optional, in percent, default is 50
					$function_fixed_div_text_align = "center"; //optional, default is left
					$function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
					$function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
					include('#function-fixed-div.php');
					$div_open = $function_fixed_div_display;
				    #function-fixed-div.php
					$function_fixed_div_part = 2; //1 or 2, both are obligatory
					include('#function-fixed-div.php');
					$div_close = $function_fixed_div_display;
				    }
				    #function-fixed-div.php (close)
				    
				    #problems (open)
				    if(1==1){
					
					#array (open)
					if(1==1){
					    $problems_array = array(
						array(
							'title'=>"Title",
							'text'=>"Please summarize what the internship is about in less than 10 words.",
							'class'=>"title"
						    ),
						array(
							'title'=>"Short description",
							'text'=>"Please summarize what the internship is about in one or two sentences.",
							'class'=>"short_description"
						    ),
						array(
							'title'=>"internship category",
							'text'=>"Please select between 1 and ".$max_of_allowed_internship_category_selection
							." categories which the internship falls into.
							<br>
							(To do that, please extend the box \"internship categories\". It's on the left side".
							" of the screen, just above the box \"Detailed description\".)",
							'class'=>"category"
						    ),
						array(
							'title'=>"Long general description",
							'text'=>"Please provide general information on the internship for volunteers before they apply.",
							'class'=>"general_description"
						    ),
						array(
							'title'=>"Long specific description",
							'text'=>"Pease provide specific information that is only".
							    " intended for the volunteer that you selected.",
							'class'=>"specific_description"
						    ),
						array(
							'title'=>"Development organization",
							'text'=>"For which organization are you creating this internship?",
							'class'=>"ngo"
						    ),
						array(
							'title'=>"Expected duration",
							'text'=>"How much time do you think an average volunteer would need to complete the internship?",
							'class'=>"expected_duration"
						    ),
						array(
							'title'=>"Completion deadline",
							'text'=>"When does the internship need to be completed at the latest?",
							'class'=>"completion_deadline"
						    ),
						array(
							'title'=>"Assignment deadline",
							'text'=>"Until when should volunteers have applied at the latest?",
							'class'=>"assignment_deadline"
						    )
					    );
					}
					#array (close)
					
					unset($problems);
					for($aax=0;$aax<count($problems_array);$aax++){
					    $problems .= '
					    <li class="vbp_items vbp_'.$problems_array[$aax]['class'].'" style="display:none;">
						<div style="font-weight:bold;">
						    '.$problems_array[$aax]['title'].':
						</div>
						<p>
						    '.$problems_array[$aax]['text'].'
						</p>
					    </li>';
					}
					
				    }
				    #problems (close)
				    
				    $confirmation_div_and_form .=
					$div_open.'
					<h1 style="display:inline-block;">
					    Before publishing, please check...
					</h1>
					<div style="margin:20px auto;width:80%;max-height:350px;overflow-y: auto;padding:0% 10%;">
					<ul>
					    '.$problems.'
					</ul>
					</div>
					'.$div_close;
				    
				}
				#div with check if internship is ready for publication div (close)
				
				$option_menu_array[]
				    = array(
					"img_name"              =>  "publish_white.png",
					"class_name"            =>  "option_ngo_save_and_publish",
					"button_text"           =>  "Publish the internship, so that volunteers can apply to it.",
					"code_before_button"    =>  $confirmation_div_and_form,
					"big_icon"		    =>  "yes"
					);
				
			    }
			    #save and publish (close)
			    
			}
			#GROUP: edit mode (close)
			
                        #delete (open)
                        if($arm_options_for_ngos_delete == "yes"){
                            
			    #confirmation div (open)
			    if(1==1){
				$confirmation_div_and_form =
				    '<div
					style="
					    border-radius:20px;
					    background-color:#fff;
					    text-align:center;
					    position:absolute;
					    padding:20px;
					    z-index:10;
					    border:1px solid black;
					    margin-left:-70px;
					    margin-top:-70px;
					    width:200px;
					    display:none;
					"
					class="delete_internship_preliminary_div confirmation_div"
				    >
					<p>
					    Are you sure that you want to permanently delete this internship?
					</p>
					<div style="margin-top:5px;">
					    <div
						style="width:30px;display:inline-block;"
						class="voluno_button delete_internship_preliminary_cancel"
					    >
						No
					    </div>
					    <div
						style="width:30px;display:inline-block;"
						class="voluno_button delete_internship_preliminary_confirm"
					    >
						Yes
					    </div>
					</div>
				    </div>';
			    }
			    #confirmation div (close)
			    
			    #delete internship form (open)
			    if(1==1){
				
				$confirmation_div_and_form =
				    $confirmation_div_and_form.
				    '<form
					class="delete_internship_form"
					method="post"
					action="'.get_permalink().'?type=internship&id='.$internship_row->internship_id.'"
				    >
					<input type="hidden" name="delete_internship" value="1">
				    </form>';
				
			    }
			    #delete internship form (close)
			    
			    $option_menu_array[]
				= array(
					"img_name"              =>  "delete_white.png",
					"class_name"            =>  "option_ngo_delete",
					"button_text"           =>  "Permanently delete internship",
					"code_before_button"    =>  $confirmation_div_and_form,
					"big_icon"		    =>  "yes"
					);
				
                        }
                        #delete (close)
                        
                        #delete and return to work center (only when creating new internship) (open)
                        if($arm_options_for_ngos_delete_and_go_back == "yes"){
                            
			    #confirmation div (open)
			    if(1==1){
				$confirmation_div_and_form =
				    '<div
					style="
					    border-radius:20px;
					    background-color:#fff;
					    text-align:center;
					    position:absolute;
					    padding:20px;
					    z-index:10;
					    border:1px solid black;
					    margin-left:-70px;
					    margin-top:-70px;
					    width:200px;
					    display:none;
					"
					class="delete_internship_and_go_back_preliminary_div confirmation_div"
				    >
					<p>
					    Are you sure that you want to permanently delete this internship and return to the Work Center?
					</p>
					<div style="margin-top:5px;">
					    <div
						style="width:30px;display:inline-block;"
						class="voluno_button delete_internship_and_go_back_preliminary_cancel"
					    >
						No
					    </div>
					    <a href="'.get_permalink().'">
						<div
						    style="width:30px;display:inline-block;"
						    class="voluno_button delete_internship_and_go_back_preliminary_confirm"
						>
						    Yes
						</div>
					    </a>
					</div>
				    </div>';
			    }
			    #confirmation div (close)
			    
			    $option_menu_array[]
				= array(
					"img_name"              =>  "delete_white.png",
					"class_name"            =>  "option_ngo_delete_and_go_back",
					"button_text"           =>  "Permanently delete internship",
					"code_before_button"    =>  $confirmation_div_and_form,
					"big_icon"		=>  "yes"
                                            );
                            
                        }
                        #delete and return to work center (only when creating new internship) (close)
                        
                    }
                    #ngos (close)
                    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    echo '
                    <div class="content_div">';
                        
                        #title and img (open)
                        if(1==1){
                            echo '
                            <img src="'.$content_div_img.'" class="content_div_img">
                            <h5 class="content_div_title" style="display:inline;">
                                <a style="cursor:pointer;">
                                    Actions
                                </a>
                            </h5>';
                        }
                        #title and img (close)
                        
                        #content (open)
                        if(1==1){
                            echo '
                            <div class="content_div_content" style="text-align:justify;">
                                <table>
                                    <tr>';
                                        
					#ordering options (open)
					if(1==1){
					    
					    unset($ordering_array);
					    
					    for($nine=0;$nine<count($option_menu_array);$nine++){
						
						if(empty($option_menu_array[$nine]["order_position"])){
						    $option_menu_array[$nine]["order_position"] = 0 + ($nine /100);
						}
						
						$ordering_array[] = $option_menu_array[$nine]["order_position"];
						
					    }
					    
					    $ordering_array_content = $option_menu_array;
					    sort($ordering_array);
					    
					    for($nine=0;$nine<count($ordering_array);$nine++){
						
						$ordered_position = array_search($ordering_array_content[$nine]["order_position"],$ordering_array);
						
						$option_menu_array[$ordered_position] = $ordering_array_content[$nine];
						
					    }
					    
					}
					#ordering options (close)
                                        
					$image_format = 30;
					$div_format = $image_format + 20;
					$td_format = $div_format + 10;
					
                                        #loop (open)
                                        for($nine=0;$nine<count($option_menu_array);$nine++){
                                            
					    #big icon setting (open)
					    if(1==1){
						
						if($option_menu_array[$nine]["big_icon"] == "yes"){
						    $image_format_specific = $image_format + 10;
						    $padding = 5;
						}else{
						    $image_format_specific = $image_format;
						    $padding = 10;
						}
						
					    }
					    #big icon setting (close)
					    
					    #function-image-processing (open)
					    if(1==1){
						
						#thematic only
						    $function_propic__type = "thematic";
						    $function_propic__original_img_name = $option_menu_array[$nine]["img_name"];
						    $function_propic__min_geometry = "yes";
						#all
						    $function_propic__geometry = array($image_format_specific,$image_format_specific); //optional, if e.g. only width: 300, NULL; vice versa
						include('#function-image-processing.php');
						
					    }
					    #function-image-processing (close)
					    
                                            echo '
                                            <td
                                                style="
                                                    width:'.(100/count($option_menu_array)).'%;
						    padding:0px;
                                                "
                                            >
						<div
                                                    style="
                                                        margin:auto;
                                                        width:'.$div_format.'px;
							padding:0px;
                                                    "
                                                >';
						
						    #code before (open)
                                                    if(!empty($option_menu_array[$nine]["code_before_button"])){
                                                        echo
                                                        $option_menu_array[$nine]["code_before_button"];
                                                    }
						    #code before (close)
						    
						    #img and link (open)
						    if(1==1){
							echo '
							<a
							    class="
								'.$option_menu_array[$nine]["class_name"].'
								voluno_button';
								if(!empty($option_menu_array[$nine]["icon_bg_color"])){
								    echo '
								    voluno_brighter_on_hover';
								}
							    echo '
							    "
							    style="
								display:inline-block;
								margin:0px;
								border-radius:20px;
								padding:'.$padding.'px;
								text-align:center;
								vertical-align:middle;';
								if(!empty($option_menu_array[$nine]["icon_bg_color"])){
								    echo '
								    background-color:'.$option_menu_array[$nine]["icon_bg_color"];
								}
							    echo '
							    "
							    title="'.$option_menu_array[$nine]["button_text"].'"';
							    
							    #link button (open)
							    if(!empty($option_menu_array[$nine]["link_button"])){
								echo '
								href="'.$option_menu_array[$nine]["link_button"].'"';
							    }
							    #link button (close)
							    
							echo '
							>
							    <img
								style="
								    height:'.$image_format_specific.'px;
								    width:'.$image_format_specific.'px;
								    margin:0px;
								    padding:0px;
								"
								src="'.$function_propic.'"
							    >
							</a>';
						    }
						    #img and link (close)
						    
						echo '
                                                </div>
                                            </td>';
                                            
                                        }
                                        #loop (close)
                                        
                                    echo '
                                    </tr>
                                </table>
                            </div>';
                        }
                        #content (close)
                        
                    echo '
                    </div>';
                }
                #content (close)
                
            }
            #options (close)
            
            #basic information (open)
            if($arm_basic_info == "yes"){
                
                #preparation (open)
                if(1==1){
                    
                    $member_profile_pic_size = 70;
                    
                    #function-image-processing (open)
                    if(1==1){
                        
                        #thematic only
                            $function_propic__type = "thematic";
                            $function_propic__original_img_name = "internship_info.png";
                        #all
                            $function_propic__geometry = array($content_div_img_array[0],$content_div_img_array[1]); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                            $function_propic_content_div_img = $function_propic;
                           
                        #profile picture
                            $function_propic__type = "profile picture";
                            $function_propic__user_id = $internship_row->internship_author;
                        #all
                            $function_propic__geometry = array($member_profile_pic_size,$member_profile_pic_size); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                            $function_propic_author = $function_propic;
                           
                        #ngo logo
                            $function_propic__type = "ngo logo";
                            $function_propic__ngo_id = $internship_row->ngo_id;
                        #all
                            $function_propic__geometry = array(150,$member_profile_pic_size); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                            $function_propic_ngo = $function_propic;
                        
                    }
                    #function-image-processing (close)
                    
                    #links to profile (open)
                    if(1==1){
                        
						//author
						#function_profile_link.php (v1.0) (open)
						if(1==1){
							
							$function_profile_link = $internship_row->internship_author; //default: 1
							#$function_profile_link__ngo = "yes"; //default: no/empty
							#$function_profile_link_img_div = "yes"; //default: no/empty, shows picture on hover
							include('#function-profile-link.php');
							#output saved in:
							# $function_profile_link__link
							# $function_profile_link__name_link
							# $function_profile_link__name
							# $function_profile_link__link_title
							
							#$function_profile_link__status = "deleted" or "paused/suspended" or "active"
							
                            $function_profile_link__link_author = $function_profile_link__link;
                            $function_profile_link__name_link_author = $function_profile_link__name_link;
                            $function_profile_link__link_title_author = $function_profile_link__link_title;
							
						}
						#function_profile_link.php (v1.0) (close)
						
						//ngo
						#function_profile_link.php (v1.0) (open)
						if(!empty($internship_row->ngo_id) AND $internship_row->ngo_id != 0){
							
							$function_profile_link = $internship_row->ngo_id; //default: 1
							$function_profile_link__ngo = "yes"; //default: no/empty
							#$function_profile_link_img_div = "yes"; //default: no/empty, shows picture on hover
							include('#function-profile-link.php');
							#output saved in:
							# $function_profile_link__link
							# $function_profile_link__name_link
							# $function_profile_link__name
							# $function_profile_link__link_title
							
							#$function_profile_link__status = "deleted" or "paused/suspended" or "active"
							
                            $function_profile_link__link_ngo = $function_profile_link__link;
                            $function_profile_link__name_link_ngo = $function_profile_link__name_link;
                            $function_profile_link__link_title_ngo = $function_profile_link__link_title;
							
						}
						#function_profile_link.php (v1.0) (close)
                        
                    }
                    #links to profile (close)
                    
                    #function-timezone.php (open)
                    if(1==1){
                        
                        $function_timezone = $internship_row->internship_deadline;
                        $function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_1 = $function_timezone;
                        
                        $function_timezone = $internship_row->internship_deadline;
                        $function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_2 = $function_timezone;
                        $function_timezone_deadline = $function_timezone_1.", ".$function_timezone_2;
                        
                        $function_timezone = $internship_row->internship_deadline;
                        $function_timezone_wording = "left";
                        $function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_deadline2 = $function_timezone;
                        
                        
                        $function_timezone = $internship_row->internship_application_deadline;
                        $function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_1 = $function_timezone;
                        
                        $function_timezone = $internship_row->internship_application_deadline;
                        $function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_2 = $function_timezone;
                        $function_timezone_assignment_deadline = $function_timezone_1.", ".$function_timezone_2;
                        
                        $function_timezone = $internship_row->internship_application_deadline;
                        $function_timezone_wording = "left";
                        $function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_assignment_deadline2 = $function_timezone;
                        
                        
                        
                        $function_timezone = $internship_row->internship_date_created;
                        $function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_1 = $function_timezone;
                        
                        $function_timezone = $internship_row->internship_date_created;
                        $function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_2 = $function_timezone;
                        $function_timezone_created = $function_timezone_1.", ".$function_timezone_2;
                        
                        $function_timezone = $internship_row->internship_date_created;
                        $function_timezone_wording = "left";
                        $function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
                        //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                        //"date (weekday short)","time (hour min sec)","time (hour min)"
                        include('#function-timezone.php');
                        #output:
                        $function_timezone_created2 = $function_timezone;
                      
                    }
                    #function-timezone.php (close)
                    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    echo '
                    <div class="content_div">';
                        
                        #title and img (open)
                        if(1==1){
                            echo '
                            <img src="'.$function_propic_content_div_img.'" class="content_div_img">
                            <h5 class="content_div_title" style="display:inline;">
                                <a style="cursor:pointer;">
                                    Basic information
                                </a>
                            </h5>';
                        }
                        #title and img (close)
                        
                        #text (open)
                        if(1==1){
                            
                            $margin_top = 10;
                            
                            echo '
                            <div class="content_div_content">';
                                
                                #non-edit (open)
                                if($arm_edit_mode != "yes"){
                                    
                                    #author and organization (open)
                                    if(1==1){
                                        
                                        echo '
                                        <table style="margin-top:'.$margin_top.'px;">
                                            <tr>
                                                <td>';
                                                    
                                                    #author name (open)
                                                    if(1==1){
                                                        echo '
                                                        <div style="margin-bottom:10px;">
                                                            <strong>
                                                                Author:
                                                            </strong>
                                                            <br>
                                                            '.$function_profile_link__name_link_author.'
                                                        </div>';
                                                    }
                                                    #author name (close)
                                                    
                                                    #organization name (open)
                                                    if(1==1){
                                                        echo '
                                                        <div>
                                                            <strong>
                                                                Organization:
                                                            </strong>
                                                            <br>';
                                                            if(empty($internship_row->ngo_id) OR $internship_row->ngo_id == 0){
                                                                echo '
                                                                <span style="color:red;">
                                                                    Please select an organization.
                                                                </span>';
								$is_an_ngo_selected = "no";
                                                            }else{
                                                                echo 
                                                                $function_profile_link__name_link_ngo;
                                                            }
                                                            echo '
                                                        </div>';
                                                    }
                                                    #organization name (close)
                                                    
                                                echo '
                                                </td>';
                                                    
                                                #author img (open)
                                                if(1==1){
                                                    echo '
                                                    <td style="width:70px;">
                                                        <a
                                                            href="'.$function_profile_link__link_author.'"
                                                            title="'.$function_profile_link__link_title_author.'"
                                                        >
                                                            <img
                                                                class="voluno_brighter_on_hover"
                                                                src="'.$function_propic_author.'"
                                                                style="border-radius:15px;border:1px solid black;"
                                                            >
                                                        </a>
                                                    </td>';
                                                }
                                                #author img (close)
                                                    
                                            echo '
                                            </tr>
                                        </table>';
                                            
                                        #organization img (open)
                                        if($is_an_ngo_selected != "no"){
                                            echo '
                                            <div style="text-align:center;">
                                                <a
                                                    href="'.$function_profile_link__link_ngo.'"
                                                    title="'.$function_profile_link__link_title_ngo.'"
                                                >
                                                    <img
                                                        class="voluno_brighter_on_hover"
                                                        src="'.$function_propic_ngo.'"
                                                        style="padding:10px;border:1px solid black;background-color:#fff;"
                                                    >
                                                </a>
                                            </div>';
                                        }
                                        #organization img (close)
                                        
                                    }
                                    #author and organization (close)
                                        
                                    #assigned volunteer (open)
                                    if($arm_assigned_volunteer == "yes"){
                                        
                                        #preparation (open)
                                        if(1==1){
                                            
                                            #function-image-processing (open)
                                            if(1==1){
                                                
                                                #profile picture
                                                    $function_propic__type = "profile picture";
                                                    $function_propic__user_id = $assigned_volunteer_row->application_user_id;
                                                #all
                                                    $function_propic__geometry = array($member_profile_pic_size,$member_profile_pic_size); //optional, if e.g. only width: 300, NULL; vice versa
                                                    include('#function-image-processing.php');
                                                    $function_propic_volunteer = $function_propic;
                                                
                                            }
                                            #function-image-processing (close)
                                            
											#function_profile_link.php (v1.0) (open)
											if(1==1){
												
												$function_profile_link = $assigned_volunteer_row->usersext_id; //default: 1
												#$function_profile_link__ngo = "yes"; //default: no/empty
												#$function_profile_link_img_div = "yes"; //default: no/empty, shows picture on hover
												include('#function-profile-link.php');
												#output saved in:
												# $function_profile_link__link
												# $function_profile_link__name_link
												# $function_profile_link__name
												# $function_profile_link__link_title
												
												#$function_profile_link__status = "deleted" or "paused/suspended" or "active"
												
												$function_profile_link__link_volunteer = $function_profile_link__link;
												$function_profile_link__name_link_volunteer = $function_profile_link__name_link;
												$function_profile_link__link_title_volunteer = $function_profile_link__link_title;
												
											}
											#function_profile_link.php (v1.0) (close)
                                            
                                        }
                                        #preparation (close)
                                        
                                        #content (open)
                                        if(1==1){
                                            
                                            echo '
                                            <table style="margin-top:'.$margin_top.'px;">
                                                <tr>
                                                    <td>
                                                        <div style="margin-bottom:10px;">
                                                            <strong>
                                                                Assigned volunteer:
                                                            </strong>
                                                            <br>
                                                            '.$function_profile_link__name_link_volunteer.'
                                                        </div>
                                                    </td>
                                                    <td style="width:70px;">
                                                        <a
                                                            href="'.$function_profile_link__link_volunteer.'"
                                                            title="'.$function_profile_link__link_title_volunteer.'"
                                                        >
                                                            <img
                                                                class="voluno_brighter_on_hover"
                                                                src="'.$function_propic_volunteer.'"
                                                                style="border-radius:15px;border:1px solid black;"
                                                            >
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>';
                                            
                                        }
                                        #content (close)
                                        
                                    }
                                    #assigned volunteer (close)
                                        
                                    #internship type (open)
                                    if(1==1){
                                        echo '
                                        <div style="margin-top:'.$margin_top.'px;">
                                            <strong>
                                                internship categories:
                                            </strong>
                                            <br>';
					    if(empty($internship_types_results)){
						echo '
						<span style="color:red;font-style:italic;">
						    Please add at least one internship category.
						</span>';
					    }else{
						for($five=0;$five<count($internship_types_results);$five++){
						    
						    if($five>0){
							echo ';';
						    }
						    
						    echo '
						    <a
							style="cursor:help;"
							title="'.$internship_types_results[$five]->internship_type_description.'"
						    >'.
							$internship_types_results[$five]->internship_type_name.
						    '</a>';
						    
						}
					    }
                                        echo '
                                        </div>';
                                    }
                                    #internship type (close)
                                    
                                    #expected duration (open)
                                    if(1==1){
                                        echo '
                                        <div style="margin-top:'.$margin_top.'px;">
                                            <strong>
                                                Expected duration:
                                            </strong>
                                            <br>';
                                            if(empty($internship_row->internship_expected_duration)){
                                                echo '
                                                <span style="color:red;font-style:italic;">
                                                    Please give an estimate.
                                                </span>';
                                            }else{
                                                
                                                #function-minutes-into-nice-format (open)
                                                if(1==1){
                                                    $function_minutes_into_nice_format = $internship_row->internship_expected_duration;
                                                    $function_minutes_into_nice_format_long = "yes"; //default: no/empty
                                                    include('#function-minutes-into-nice-format.php');
                                                    #output: $function_minutes_into_nice_format
                                                }
                                                #function-minutes-into-nice-format (close)
                                                
                                                echo
                                                $function_minutes_into_nice_format;
                                            }
                                        echo '
                                        </div>';
                                    }
                                    #expected duration (close)
                                    
                                    #dates (open)
                                    if(1==1){
                                        echo '
                                        <div style="margin-top:'.$margin_top.'px;">
                                            <strong>
                                                internship deadline:
                                            </strong>
                                            <br>';
					    if($internship_row->internship_deadline == "0000-00-00 00:00:00"){
			                        echo '
						<span style="color:red;font-style:italic;">
						    Please specify a completion deadline.
						</span>';
					    }else{
						echo 
						$function_timezone_deadline.'
						<br>
						('.$function_timezone_deadline2.')';
					    }
					echo '
                                        </div>
                                        <div style="margin-top:'.$margin_top.'px;">
                                            <strong>
                                                Application deadline:
                                            </strong>
                                            <br>';
					    if($internship_row->internship_application_deadline == "0000-00-00 00:00:00"){
			                        echo '
						<span style="color:red;font-style:italic;">
						    Please specify an assignment deadline.
						</span>';
					    }else{
						echo 
						$function_timezone_assignment_deadline.'
						<br>
						('.$function_timezone_assignment_deadline2.')';
					    }
					echo '
                                        </div>
                                        <div style="margin-top:'.$margin_top.'px;">
                                            <strong>
                                                Creation date:
                                            </strong>
                                            <br>
                                            '.$function_timezone_created.'
                                            <br>
                                            ('.$function_timezone_created2.')
                                        </div>';
                                    }
                                    #dates (close)
                                        
                                    #file size (open)
                                    if(1==1){
                                        
                                        echo '
                                        <div
                                            style="
                                                margin-top:'.$margin_top.'px;
                                                border:1px solid black;
                                                cursor:help;
                                                height:20px;
                                                background-color:#fff;
                                                border-radius:20px;
                                                overflow:hidden;
                                            "
                                            title="Each internship can use files of up to 50 MB.&#013;If you need more space, please use'.
                                            ' other email or filesharing services such as Google Drive or Dropbox."
                                        >
                                            <div
                                                style="
                                                    text-align:center;
                                                    position:absolute;
                                                    vertical-align:middle;
                                                    height:20px;
                                                    width:230px;
                                                "
                                            >
                                                '.number_format($percent_of_internship_space_used).' % of internship space used
                                            </div>
                                            <div
                                                style="';
                                                    if($percent_of_internship_space_used < 50){
                                                        $color = "#86ED74"; //green
                                                    }elseif($percent_of_internship_space_used < 75){
                                                        $color = "#FFCC00"; //yellow
                                                    }else{
                                                        $color = "#FF3300;"; //red
                                                    }
                                                    echo '
                                                    background-color:'.$color.';
                                                    width:'.$percent_of_internship_space_used.'%;
                                                    height:20px;
                                                    border-radius:20px;
                                                "
                                            >
                                                &nbsp;
                                            </div>
                                        </div>';
                                        
                                    }
                                    #file size (close)
                                    
                                }
                                #non-edit (close)
                                
                                #edit (open)
                                if($arm_edit_mode == "yes"){
                                    
                                    echo '
                                    <div class="show_this_in_edit_mode" style="margin-top:20px;">';
                                        
                                        #organizaiton (open)
                                        if(1==1){
                                            
                                            #prepare (open)
                                            if(1==1){
                                               
                                                #function-help-word.php (open)
                                                if(1==1){
                                                    $function_help_word_hover_link = '
                                                        <div style="font-weight:bold;margin:20px 0px 5px 0px;">
                                                            Organization:
                                                        </div>';
                                                    $function_help_word_help_content =
                                                        '<p>
                                                            Please choose the development organization
                                                            which the internship is for.
                                                        </p>';
                                                    $function_help_word_width = "250px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
                                                    $function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
                                                    include('#function-help-word.php');
                                                }
                                                #function-help-word.php (close)
                                               
                                            }
                                            #prepare (close)
                                            
                                            #content (open)
                                            if(count($my_organizations_results)>1){
                                                echo '
                                                <div>
                                                    '.$function_help_word.'
                                                    <select name="edit_ngo" class="edit_ngo">
                                                        <option value="">
                                                            -Please select-
                                                        </option>';
                                                        for($aas=0;$aas<count($my_organizations_results);$aas++){
                                                            
                                                            if(empty($my_organizations_results[$aas]->internship_id)){
                                                                $selected = "";
                                                            }else{
                                                                $selected = 'selected="selected"';
                                                            }
                                                            
                                                            echo '
                                                            <option value="'.$my_organizations_results[$aas]->ngo_id.'" '.$selected.'>
                                                                '.$my_organizations_results[$aas]->ngo_name.'
                                                            </option>';
                                                        }
                                                    echo '
                                                    </select>
                                                </div>';
                                            }else{
                                                echo '
                                                <input
                                                    type="hidden"
                                                    name="edit_ngo"
                                                    class="edit_ngo"
                                                    value="'.$my_organizations_results[0]->ngo_id.'"
                                                >';
                                            }
                                            #content (close)
                                            
                                        }
                                        #organizaiton (close)
                                        
                                        #expected duration (open)
                                        if(1==1){
                                            
                                            #prepare (open)
                                            if(1==1){
                                               
                                                #function-help-word.php (open)
                                                if(1==1){
                                                    $function_help_word_hover_link = '
                                                        <div style="font-weight:bold;margin:20px 0px 5px 0px;">
                                                            Expected duration:
                                                        </div>';
                                                    $function_help_word_help_content =
                                                        '<p>
                                                            How much pure working time is an average
                                                            volunteer probably going to need to
                                                            complete this internship?
                                                        </p>';
                                                    $function_help_word_width = "250px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
                                                    $function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
                                                    include('#function-help-word.php');
                                                }
                                                #function-help-word.php (close)
                                                
                                                $expected_duration_array = array(
                                                        10,     30,
                                                        60*1,   60*2,   60*5,   60*10,
                                                        60*20,  60*50,  60*100, 60*101
                                                    );
                                                
                                            }
                                            #prepare (close)
                                            
                                            #content (open)
                                            if(1==1){
                                                echo '
                                                <div>
                                                    '.$function_help_word.'
                                                    <select name="edit_expected_duration" class="edit_expected_duration">
                                                        <option value="">
                                                            -Please select-
                                                        </option>';
                                                        for($aas=0;$aas<count($expected_duration_array);$aas++){
                                                            
                                                            if($internship_row->internship_expected_duration == $expected_duration_array[$aas]){
                                                                $selected = 'selected="selected"';
                                                            }else{
                                                                $selected = "";
                                                            }
                                                            
                                                            #function-minutes-into-nice-format (open)
                                                            if(1==1){
                                                                $function_minutes_into_nice_format = $expected_duration_array[$aas];
                                                                $function_minutes_into_nice_format_long = "yes"; //default: no/empty
                                                                include('#function-minutes-into-nice-format.php');
                                                                #output: $function_minutes_into_nice_format
                                                            }
                                                            #function-minutes-into-nice-format (close)
                                                            
                                                            echo '
                                                            <option value="'.$expected_duration_array[$aas].'" '.$selected.'>
                                                                '.$function_minutes_into_nice_format.'
                                                            </option>';
                                                        }
                                                    echo '
                                                    </select>
                                                </div>';
                                            }
                                            #content (close)
                                            
                                        }
                                        #expected duration (close)
                                        
                                        #select completion deadline (open)
                                        if(1==1){
                                            
                                            #preparation (open)
                                            if(1==1){
                                                
                                                #help word (open)
                                                if(1==1){
                                                    $function_help_word_width = "450px";
                                                    $function_help_word_margin = "margin-left:-200px;";
                                                    $function_help_word_variable_only = "yes";
                                                    $function_help_word_hover_link = '
                                                        <div style="font-weight:bold;margin:20px 0px 5px 0px;">
                                                            Completion deadline:
                                                        </div>';
                                                    $function_help_word_help_content = '
                                                        <b>Until when should the internship be completed?</b>
                                                        <p>
                                                        When setting a deadline, you should keep several thing in mind:
                                                        </p><br>
                                                        <ul>
                                                            <li>
                                                                <b>Can it be done?</b><br>
                                                                Is it possible to complete the internship in this time span?
                                                                Please note that the majority of our vcolunteers
                                                                have full-time jobs and can only work on Voluno internships
                                                                for a few hours per day.<br>
                                                                Please also keep in mind that it might take some time
                                                                to find a suitable volunteer (see next field).<br><br>
                                                            </li>
                                                            <li>
                                                                <b>What if it is not done?</b><br>
                                                                Despite of all efforts, it is possible that no volunteer is found.
                                                                If one is found, it is always possible
                                                                that the volunteer fails to comlete the internship on time. In case this
                                                                happens, you should still plan enough
                                                                buffer time to complete the internship yourself.
                                                            </li>
                                                        </ul>';
                                                    include('#function-help-word.php');
                                                }
                                                #help word (close)
                                                
                                            }
                                            #preparation (close)
                                            
                                            echo '
                                            <div style="'.$form_td_title_format.'">
                                                '.$function_help_word.'
						<input
						    type="text"
						    class="edit_completion_deadline"
						    name="edit_completion_deadline"
						    readonly="readonly"
						    style="width:90%;text-align:center;"';
						    if($internship_row->internship_deadline != "0000-00-00 00:00:00"){
							echo '
							value="'.
							    date('l, d. F Y',strtotime($internship_row->internship_deadline)).
							'"';
						    }
						echo '
						>
                                            </div>';
                                        }
                                        #select completion deadline (close)
                                        
                                        #select assignment deadline (open)
                                        if(1==1){
                                            
                                            #preparation (open)
                                            if(1==1){
                                                
                                                #help word (open)
                                                if(1==1){
                                                    $function_help_word_width = "450px";
                                                    $function_help_word_margin = "margin-left:-200px;";
                                                    $function_help_word_variable_only = "yes";
                                                    $function_help_word_hover_link = '
                                                        <div style="font-weight:bold;margin:20px 0px 5px 0px;">
                                                            Assignment deadline:
                                                        </div>';
                                                    $function_help_word_help_content = '
                                                        <p><b>Until when should the internship be assigned?</b><br>
                                                        When the deadline is only two days away, it\'s no longer realistic
                                                        to complete certain work intensive internships
                                                        in a proper and thorough way. The purpose of this deadline is to save
                                                        you and the volunteers the trouble
                                                        of dealing with internships which are de-facto no longer available.<br>
                                                        When setting the assignment deadline, you should keep two things in mind:
                                                        </p><br>
                                                        <ul>
                                                            <li>
                                                                <b>Volunteers know their capabilities better than you do</b><br>
                                                                If the internship can, in theory, be completed within one single night
                                                                and if the volunteer is willing to
                                                                work on the internship all night, then the assignment deadline should
                                                                be set accordingly.<br><br>
                                                            </li>
                                                            <li>
                                                                <b>You know the internship better than the volunteers do</b><br>
                                                                If, for instance, the internship requires frequent communication between
                                                                you and the volunteer and if you are
                                                                very busy and hard to reach, then you should account for this by
                                                                setting an early assignment deadline.
                                                            </li>
                                                        </ul>';
                                                    include('#function-help-word.php');
                                                }
                                                #help word (close)
                                                
                                            }
                                            #preparation (close)
                                            
                                            echo '
                                            <div style="'.$form_td_title_format.'">
                                                '.$function_help_word.'
						<input
						    type="text"
						    class="edit_assignment_deadline"
						    name="edit_assignment_deadline"
						    style="width:90%;text-align:center;"';
						    if($internship_row->internship_application_deadline != "0000-00-00 00:00:00"){
							echo '
							value="'.
							    date('l, d. F Y',strtotime($internship_row->internship_application_deadline)).
							'"';
						    }
						echo '
						>
                                            </div>';
                                        }
                                        #select assignment deadline (close)
                                        
                                        echo '
                                        <div style="margin-top:15px;text-align:center;">
                                            <div class="voluno_button option_ngo_close" style="margin:5px;display:inline-block;">
                                                Cancel
                                            </div>
                                            <div class="voluno_button option_ngo_save" style="margin:5px;display:inline-block;">
                                                Save
                                            </div>
                                            <br>
                                            <div class="voluno_button option_ngo_save_and_close" style="margin:5px;display:inline-block;">
                                                Save and close
                                            </div>
                                        </div>
                                        
                                    </div>';
                                }
                                #edit (close)
                                
                            echo '
                            </div>';
                        }
                        #text (close)
                        
                    echo '
                    </div>';
                }
                #content (close)
                
            }
            #basic information (close)
            
        }
        #right side content div (close)
        
    #content divs table 3/3 (open)
    if($arm_content_divs_table == "yes"){
                echo '
                </td>
            </tr>
        </table>';
    }
    #content divs table 3/3 (open)
        
    #edit form close (open)
    if($arm_edit_mode == "yes"){
	echo '
	</form>';
    }
    #edit form close (close)
    
    #error message (open)
    if($arm_error == "yes"){
        
        #internship deleted (open)
        if($arm_error_internship_deleted == "yes"){
            
            #preparation (open)
            if(1==1){
                
                #function-if-problem-persits-contact-us.php (open)
                if(1==1){
                    $function_if_problem_persits_contact_us_only_contact = "yes";
                    include('#function-if-problem-persits-contact-us.php');
                }
                #function-if-problem-persits-contact-us.php (close)
                
            }
            #preparation (close)
            
            #content (open)
            if(1==1){
                echo '
                <h1>
                    internship deleted
                </h1>
                <p>
                    <br>
                    This internship has been deleted. If you believe that there has been a mistake,
                    please '.$function_if_problem_persits_contact_us.'
                    <br>
                    <br>
                    Click here to visit the
                    <a href="'.get_permalink(688).'" title="Go to Work Center" style="font-weight:bold;">
                        Work Center'.
                    '</a>.
                </p>';
            }
            #content (close)
            
        }
        #internship deleted (open)
        
    }
    #error message (close)
    
    #loaoding img and mysql div (open)
    if(1==1){
        include('#function-loaoding-img-mysql-area-div.php');
        #no inputs, no outputs
        #classes are: mysql_load_area AND loading_page loading_img_middle_page <- use this one
    }
    #loaoding img and mysql div (close)

}
#content (close)

#old (open)
if(1==2 AND empty($reprocess_arm)){
    
    #internship visible content, according to rights [open]
    if(1==1){
        
        #access rights or not? - if not, display this (open)
        if(1==1){
            if(1==1){
                echo '
                <div style="font-weight:bold;font-size:150%;text-align:center;margin:15% 0;">
                    This internship is no longer available.
                    <br><br>
                    If you believe that this is a mistake, please ';
                    #function-if-problem-persits-contact-us.php
                        $function_if_problem_persits_contact_us_only_contact = "yes";
                        include('#function-if-problem-persits-contact-us.php');
                        echo $function_if_problem_persits_contact_us;
                    
                echo '
                </div>';
            }
        }
        #access rights or not? - if not, display this (close)
        
        #access rights or not? - if yes, display this (open)
        if($access_rights_or_not == "yes"){
            
            $inner_table_style_full_width = "";
            $inner_table_style_half_width = "";
            $colorful_div_style = "border-radius:25px;padding:0px 25px;";
            $div_image_style = "margin-top:-25px;";

            $array_items_number = count($array_items_descriptions);
    
            #apply for internships (volunteers) [open]
            if($internship_status == "unassigned" AND (in_array(3,$internship_roles) OR in_array(7,$internship_roles))){
                
                #has the user already applied? pre-submitting [open]
                if(isset($_POST['submit_application_internship']) OR isset($_POST['submit_withdraw_application_internship'])){
                    $already_applied_for_this_internship_submit_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                        FROM fi4l3fg_voluno_applications
                                                                        WHERE
                                                                            application_type_general = "internship" AND
                                                                            application_type_specific = "internship_application" AND
                                                                            application_type_id = %d AND
                                                                            application_user_id = %d AND
                                                                            application_status = "pending"
                                                                        LIMIT 1'
                                                                        ,$is_a_internship_selected_row->internship_id
                                                                        ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $already_applied_for_this_internship_submit_row = $GLOBALS['wpdb']->get_row($already_applied_for_this_internship_submit_query);
                }
                #has the user already applied? pre-submitting [close]
    
                #submit internship application and withdraw internship application to mysql db [open]
                if(isset($_POST['submit_application_internship']) AND empty($already_applied_for_this_internship_submit_row)){
                    echo '
                    <div
                        style="cursor:pointer;position:fixed;top:30%;left:0%;width:100%;z-index:301;"
                        class="internship_application_successfull"
                    >
                        <div style="margin:auto;width:700px;border-radius:25px;border:1px solid black;background-color:#fff;">
                            <div style="margin:25px;text-align:center;">
                                <h1 style="display:inline;">
                                    Application submitted successfully!
                                </h1>
                                <br>
                                <img src="'.wp_upload_dir()['url'].'/'.
                                'pictures/favicon-large-space.png" style="height:200px;">
                                <br>
                                <h1 style="display:inline;">
                                    Thank you for applying!
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div
                        style="
                            cursor:pointer;
                            position:fixed;
                            width:100%;height:100%;
                            top:0%;left:0%;
                            background-color:#000;
                            z-index:300;
                            opacity:0.6;"
                        class="internship_application_successfull"
                    >
                    </div>
                    <script>
                        jQuery(document).ready(function(){
                            jQuery(".internship_application_successfull").click(function(){
                                jQuery(".internship_application_successfull").fadeOut();
                            });
                        });
                    </script>';
                    
                    #$application_text = wp_kses(nl2br($_POST['application_text']),$deprecated_function_used_allowed_tags_please_replace);
                    $GLOBALS['wpdb']->insert(
                                    'fi4l3fg_voluno_applications',
                            array(
                                    'application_type_general' => 'internship',
                                    'application_type_specific' => 'internship_application',
                                    'application_type_id' => $is_a_internship_selected_row->internship_id,
                                    'application_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                    'application_text' => $application_text,
                                    'application_status' => 'pending',
                                    'application_code' => "a".mt_rand().mt_rand().mt_rand().mt_rand().mt_rand()
                                ),
                            array(
                                    '%s',
                                    '%s',
                                    '%d',
                                    '%d',
                                    '%s',
                                    '%s',
                                    '%s'
                                ));
                }elseif(isset($_POST['submit_withdraw_application_internship']) AND !empty($already_applied_for_this_internship_submit_row)){
                    echo '
                    <div
                        style="cursor:pointer;position:fixed;top:30%;left:0%;width:100%;z-index:301;"
                        class="internship_application_withdraw_successfull"
                    >
                        <div style="margin:auto;width:700px;border-radius:25px;border:1px solid black;background-color:#fff;">
                            <div style="margin:25px;text-align:center;">
                                <h1 style="display:inline;">
                                    Application withdrawn successfully!
                                </h1>
                                <br>
                                <img src="'.wp_upload_dir()['url'].'/pictures/favicon-large-space.png" style="height:200px;">
                                <br>
                                <h1 style="display:inline;">
                                    Thank you for having applied at all!
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div
                        style="
                            cursor:pointer;
                            position:fixed;
                            width:100%;height:100%;
                            top:0%;left:0%;
                            background-color:#000;
                            z-index:300;
                            opacity:0.6;"
                        class="internship_application_withdraw_successfull"
                    >
                    </div>
                    <script>
                        jQuery(document).ready(function(){
                            jQuery(".internship_application_withdraw_successfull").click(function(){
                                jQuery(".internship_application_withdraw_successfull").fadeOut();
                            });
                        });
                    </script>';
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_applications',
                            array( //updated content
                                    'application_status' => 'withdrawn'
                            ),
                            array( //location of updated content
                                    'application_type_general' => 'internship',
                                    'application_type_specific' => 'internship_application',
                                    'application_type_id' => $is_a_internship_selected_row->internship_id,
                                    'application_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                    'application_status' => 'pending',
                            ),
                            array( //format of updated content
                                    '%s'
                            ),
                            array( //format of location of updated content
                                    '%s',
                                    '%s',
                                    '%d',
                                    '%d',
                                    '%s'
                                ));
                }
                #submit internship application and withdraw internship application to mysql db [close]
    
                #has the user already applied? post-submitting [open]
                if(1==1){
                    $already_applied_for_this_internship_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                        FROM fi4l3fg_voluno_applications
                                                                        WHERE
                                                                            application_type_general = "internship" AND
                                                                            application_type_specific = "internship_application" AND
                                                                            application_type_id = %d AND
                                                                            application_user_id = %d AND
                                                                            (application_status = "pending" OR
                                                                            application_status = "rejected" )
                                                                        LIMIT 1'
                                                                        ,$is_a_internship_selected_row->internship_id
                                                                        ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $already_applied_for_this_internship_row = $GLOBALS['wpdb']->get_row($already_applied_for_this_internship_query);
                }
                #has the user already applied? post-submitting [close]
                
                #if user application was rejected [close]
                if($already_applied_for_this_internship_row->application_status == "rejected"){
                    echo '
                    <table style="margin:auto;width:60%">
                            <tr>
                                <td style="text-align:center;">
                                    <div style="background-color:#D6F4F5;border-radius:25px;">
                                        <div style="margin:25px;display:inline-block;">
                                            <h4 style="display:inline;">
                                                Unfortunately, your application was unsuccessful.
                                            </h4>
                                            <br>
                                            <br>
                                            <p style="text-align:justify;">
                                                If there are several well suited applicants, it\'s pure luck which
                                                application gets accepted.
                                                <br>
                                                So please don\'t take this the wrong way: Your offer to support
                                                development with your energy and time
                                                is highly appreciated!
                                                <br><br>
                                                Please apply for a different internship.
                                                <a href="'.get_permalink(688).'?is_positions_selected_row=1" title="Check the Work Center for other internships.">
                                                    How about right now?
                                                </a>
                                            </p>
                                            ';
                                            if(!empty($already_applied_for_this_internship_row->application_text)){
                                                echo '
                                                <strong>
                                                    Your application text:
                                                </strong>
                                                <div style="border:1px solid black;margin:10px 0px;background-color:#e5e5e5;">
                                                    <p style="text-align:justify;margin:5px;">
                                                        '.$already_applied_for_this_internship_row->application_text.'
                                                    </p>
                                                </div>';
                                            }
                                            echo '
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>';
                    
                    
                }
                #if user application was rejected [close]
    
                #if user has applied [open]
                elseif($already_applied_for_this_internship_row->application_status == "pending"){
                    echo '
                    <form action="'.add_query_arg(NULL,NULL ).'" method="post">
                        <table style="margin:auto;width:60%">
                            <tr>
                                <td style="text-align:center;">
                                    <div style="background-color:#FFEAB9;border-radius:25px;">
                                        <div style="margin:25px;display:inline-block;">
                                            <h4 style="display:inline;">
                                                Your application is currently being processed...
                                            </h4>
                                            <br>
                                            <p style="text-align:justify;">
                                                Your application has been sent to '.$is_a_internship_selected_row->ngo_name.'. We will inform
                                                you as soon as it has been accepted or rejected.
                                            </p>
                                            ';
                                            if(!empty($already_applied_for_this_internship_row->application_text)){
                                                echo '
                                                <strong>
                                                    Your application text:
                                                </strong>
                                                <div style="border:1px solid black;margin:10px 0px;background-color:#e5e5e5;">
                                                    <p style="text-align:justify;margin:5px;">
                                                        '.$already_applied_for_this_internship_row->application_text.'
                                                    </p>
                                                </div>';
                                            }
                                            echo '
                                            <div
                                                class="voluno_text_button_style withdraw_application_for_internship_button"
                                                style="
                                                    background:#8B0000;
                                                    cursor: pointer;
                                                    margin:10px auto;
                                                    width:100px;
                                                "
                                            >
                                                Withdraw application
                                            </div>
                                            <script>
                                                jQuery(document).ready(function(){
                                                    jQuery(".withdraw_application_for_internship_button").click(function(){
                                                        jQuery(".withdraw_application_area").toggle();
                                                    });
                                                });
                                            </script>
                                            <div class="withdraw_application_area" style="display:none;text-align:center;">
                                                <p>
                                                    Are you sure that you want to withdraw your application to this internship?
                                                </p>
                                                <br>
                                                <input
                                                    type="submit"
                                                    value="Withdraw application"
                                                    name="submit_withdraw_application_internship"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>';
                }
                #if user has applied [close]
                
                #if user has not yet applied [open]
                elseif(empty($already_applied_for_this_internship_row)){
                    echo '
                    <form action="'.add_query_arg(NULL,NULL ).'" method="post">
                        <table style="margin:auto;width:60%">
                            <tr>
                                <td style="text-align:center;">
                                    <div style="background-color:#FFEAB9;border-radius:25px;width:100%;">
                                        <div style="margin:25px auto;display:inline-block;width:90%;">
                                            <h4 style="display:inline;">
                                                Interested in this internship? Apply now!
                                            </h4>
                                            <br>
                                            <br>
                                            ';
                                            #function-help-word.php
                                                $function_help_word_question_mark_img = "";
                                                $function_help_word_hover_link = "<strong>Optional application text</strong>";
                                                $function_help_word_width = 50;
                                                $function_help_word_help_content = '
                                                    <p>
                                                    <strong>
                                                        Optional application text
                                                    </strong>
                                                    <br>
                                                    If you want to, you can add a text to your application.
                                                    This helps the development
                                                    organization to determine, if you are the candidate most suited for the internship.
                                                    For example:
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            What motivates you to apply for this internship?
                                                        </li>
                                                        <li>
                                                            Why are you qualified to complete the internship?
                                                        </li>
                                                        <li>
                                                            How do you plan to execute the internship (e.g. "I can complete this in just
                                                            one day, using MS Excel")?
                                                        </li>
                                                        <li>
                                                            Any other interesting information.
                                                        </li>
                                                    </ul>';
                                                include('#function-help-word.php');
                                            echo '
                                            <br>
                                                <textarea '.
                                                    'name="application_text" '.
                                                    'style="margin:15px 0px;width:98%;height:7em;" '.
                                                    'placeholder="If you want to, you can add additional information to'.
                                                    ' your application. However, it\'s not a requirement. In any case: Thank you for applying!"'.
                                                '>'.
                                                '</textarea>
                                            <br>
                                            <input
                                                type="submit"
                                                value="Send application"
                                                name="submit_application_internship"
                                            >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>';
                }#if user has not yet applied [close]
            }
            #apply for internships (volunteers) [close]
            
        }
        #access rights or not? - if yes, display this (close)
    
    }
    #internship visible content, according to rights [close]
}
#old (close)

#item internship section 2 - reject volunteer applications (open)
if($arm_internship_section_2 == "yes" AND empty($reprocess_arm)){
    
    #update application (open)
    if(1==1){
        $internship_id = $_GET['id'];
        $application_code = $_GET['reject_application_code'];
        
        #verify application (open)
        if(1==1){
            
            $application_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                FROM fi4l3fg_voluno_applications
                                                WHERE application_type_specific = "internship_application"
                                                    AND application_type_general = "internship"
                                                    AND application_type_id = %d
                                                    AND application_status = "pending"
                                                    AND application_code = %s;'
                                                ,$internship_id
                                                ,$application_code);
            $application_row = $GLOBALS['wpdb']->get_row($application_query);
        }
        #verify application (close)
        
        #update application (open)
        if(1==1){
            
            $GLOBALS['wpdb']->update( 
                            'fi4l3fg_voluno_applications',
                    array( //updated content
                            'application_status' => 'rejected'
                    ),
                    array( //location of updated content
                            'application_id' => $application_row->application_id
                    ),
                    array( //format of updated content
                            '%s'
                    ),
                    array( //format of location of updated content
                            '%d'
                        ));
            
        }
        #update application (close)
        
        #send email (open)
        if(1==1){
            #dome
        }
        #send email (close)
        
    }
    #update application (open)
    
    echo '
    <div class="mysql_visible_area">
    </div>';
}
#item internship section 2 - reject volunteer applications (close)

?>