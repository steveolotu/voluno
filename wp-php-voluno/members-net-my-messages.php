<?php

#page decision (open)
if(1==1){
    
    #Search for new contacts (open)
    if(!empty($_GET['search_content'])){
        
        $page_section = "search for new contacts";
        
    }
    #Search for new contacts (close)
    
    #Main part (open)
    elseif(empty($messages_system_page_part)){
        
        $page_section = "main part";
        
    }
    #Main part (close)
    
    #Specific conversation (open)
    elseif($messages_system_page_part == "specific conversation" OR !empty($_POST['conIdPost'])){
        
        $page_section = "specific conversation";
        
    }
    #Specific conversation (close)
    
    #Conversation partners (open)
    elseif($messages_system_page_part == "conversation partners"){
        
        $page_section = "conversation partners";
        
    }
    #Conversation partners (close)
    
}
#page decision (close)

#main part (open)
if($page_section == "main part"){
    
    #function-my-office-arm.php (v1.0) (open)
    if(1==1){
        
        #documentation (open)
        if(1==1){
            
            // My Office (the area in which the user can view his or her own pages: messages, settings, profile, etc) requires a complex user's rights management,
            // since there are several pages and different roles and elements. To make it easier to keep everything up to date, this function was created.
            // Redirects if no access is granted.
            
        }
        #documentation (close)
        
        #input (open)
        if(1==1){
            
            $function_myOfficeArm['user'] = $_GET['user_id']; //pure id of user who's pages will be displayed. Default: current user. The observer is always the current user.
            //current page id is used to determine which menu item it is.
            
        }
        #input (close)
        
        include('#function-my-office-arm.php');
        
        #output (open)
        if(1==1){
            
            echo $function_myOfficeArm['tab_menu']; // Tab menu.
            
            # $function_myOfficeArm['owner_user_id'] //id of the owner of the user profile
            # $function_myOfficeArm['owner_user_displayName'] //display name of owner of the user profile
            
            # var_dump($function_myOfficeArm['role_array']); // array of user roles
            # roles:
            # - 'owner' (the current user is the one the pages belong to)
            # - 'agent' (the current user is the agent of the owner)
            # - 'blocked' (the current user is a blocked contact of the owner)
            # - 'web_developer_or_human_resources_officer' (the current user can see everything)
            # - 'visitor' (the current user has no relationship to the current user but also has no special rights)
            
            # $function_myOfficeArm['error']['owner_doesnt_exist'];
            # $function_myOfficeArm['owner_user_status'];
            
        }
        #output (close)
        
    }
    #function-my-office-arm.php (v1.0) (close)
    
    #general preparation (open)
    if(1==1){
        
        #function-user-positions-get.php (v1.8) (open)
        if(1==1){
            
            #documentation (open)
            if(1==1){
                
                // Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
                
            }
            #documentation (close)
            
            #input (open)
            if(1==1){
                
                $function_userpositions_get['user id'] = 'current_user'; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
                #$function_userpositions_get['display all positions for developers'] = 'yes'; // 'yes', 'yes, long' or 'no' (default).
                // Shows all positions the user has. 'yes, long' prints the entire output in a nice way.
                
            }
            #input (close)
            
            include('#function-user-positions-get.php');
            
            #output (open)
            if(1==1){
                
                # The function produces three arrays:
                #
                # Method 1: unsorted list
                #   $function_userpositions_get['unsorted list'][PROPERTY] = PROPERTY VALUE
                #        position: specific position name, in some cases additional info is added, separated by ';', e.g. 'NGO Worker;4' with 4 being NGO id
                #        position_pure: specific position name without additional information
                #        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
                #        status: "accepted", "pending"
                #        application_text: optional text, depending on position
                #        application_id: mysql data entry index
                #        application_date_created
                #        application_date_modified
                #
                # Method 2: sorted list
                #   $function_userpositions_get['sorted list'][SPECIFIC POSITION NAME][PROPERTY] = PROPERTY VALUE
                #        SPECIFIC POSITION NAME = name of the specific position (mind the spelling!)
                #        position_pure: specific position name without additional information
                #        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
                #        status: "accepted", "pending"
                #        application_text: optional text, depending on position
                #        application_id: mysql data entry index
                #        application_date_created
                #        application_date_modified
                #
                # Method 3: Simple arrays
                #    $function_userpositions_get['simple array'][STATUS][INDEX] = SPECIFIC POSITION NAME   //STATUS = pending or accepted
                #     Example usage:
                #       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
                #
                # Method 4: Simple pure arrays
                #    $function_userpositions_get['simple_pure_array'][STATUS][INDEX] = SPECIFIC PURE POSITION NAME   //STATUS = pending or accepted
                #
                # Method 5:
                #    $function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
                #        full -> NGO name (user position)
                #        position -> pure position
                #        status -> "accepted" or "pending"
                #        ngo_name -> NGO name
                #        ngo_id -> NGO id
                #
                # Global variables:
                #    Function get's called in the top right sidebar for the current user, so these global variables are always available.
                #        $GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
                #        $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
                #       $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['STATUS'][] = POSITION NAME
                #    Example usage:
                #        in_array(POSITION NAME,$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])
                #
                # Note:
                # The function also outputs a list of "allowed positions". E.g. the user may not take up Voluno Staff positions without becoming a staff member first.
                #       $function_userpositions_get['allowed_pure_positions']
                # Additionally, it outputs an array of staff positions:
                #       $function_userpositions_get['allowed_pure_positions_voluno_staff']
                # But this functionality is only required for the function to edit existing user positions and not intended for regular use.
                
            }
            #output (close)
            
        }
        #function-user-positions-get.php (v1.8) (close)
        
        $max_size = pow(1024,2) * 10; //10 MB
        
    }
    #general preparation (close)
    
    #mysql (open)
    if(1==1){
        
        #update (open)
        if(1==1){
            
            #send new message (open)
            if(!empty($_POST['new_message_recipients'])){
                
                #get attachment names to include in email (open)
                if(1==1){
                    
                    unset($attachments_for_email);
                    
                    for($aen=0;$aen<count($_FILES['message_attachments_input']['tmp_name']);$aen++){
                        
                        #function-sanitize-text.php (v1.0) (open)
                        if(1==1){
                            
                            $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
                            
                            // one line unformatted text (city, name, occupation, etc.)
                            // url readable text (url, user_nicename, etc.) (sanitize_title)
                            // email address
                            // plain text with line breaks (biography)
                            
                            $function_sanitize_text__text = $_FILES['message_attachments_input']['name'][$aen];
                            include('#function-sanitize-text.php');
                            #output: $function_sanitize_text__text_sanitized;
                            
                        }
                        #function-sanitize-text.php (v1.0) (close)
                        
                        $attachments_for_email[] = $function_sanitize_text__text_sanitized;
                        
                    }
                    
                    //the count($_FILES['message_attachments_input']['tmp_name']) is always >0. the following prevents sending of empty attachments
                    if($_FILES['message_attachments_input']['tmp_name'][0] == ""){
                        
                        unset($attachments_for_email);
                        
                    }
                    
                }
                #get attachment names to include in email (open)
                
                #function-add-new-message.php (v1.0) (open)
                if(1==1){
                    #conversation id - add all conversation partners to the array, gets ordered
                        $function_add_new_message__partner_id_array = $_POST['new_message_recipients'];
                        #$function_add_new_message__messsage_author_id = ; //default (empty): current user (id loaded automatically)
                        #$function_add_new_message__max_recipients = 10; //default:10, max number or recipients. number or "unlimited"
                    #message data - all will be sanitized
                        #$function_add_new_message__message_sanitization = ""; //sanitization code or "none", default (empty): "plain text with line breaks (biography)"
                        $function_add_new_message__message_content = $_POST['new_message_content'];
                        $function_add_new_message__attachments = $attachments_for_email; //default: empty
                        
                    include('#function-add-new-message.php');
                }
                #function-add-new-message.php (v1.0) (close)
                
                #add attachment (open)
                for($aen=0;$aen<count($_FILES['message_attachments_input']['tmp_name']);$aen++){
                    
                    #upload files (open)
                    if(1==1){
                        
                        #upload image to general uploads directory (open)
                        if(1==1){
                            unset($uploadedfile);
                            $uploadedfile['name']        =   $_FILES['message_attachments_input']['name'][$aen];
                            $uploadedfile['type']        =   $_FILES['message_attachments_input']['type'][$aen];
                            $uploadedfile['tmp_name']    =   $_FILES['message_attachments_input']['tmp_name'][$aen];
                            $uploadedfile['error']       =   $_FILES['message_attachments_input']['error'][$aen];
                            $uploadedfile['size']        =   $_FILES['message_attachments_input']['size'][$aen];
                            
                            if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
                            $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
                            $full_abs_temp_file_path = $movefile['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
                        }
                        #upload image to general uploads directory (close)
                        
                        #get file info and paths (open)
                        if(1==1){
                            
                            #upload directory folders
                                $uploads_directory_array = wp_upload_dir();
                                $uploads_directory_abs = $uploads_directory_array['path'];
                                $uploads_directory_web = $uploads_directory_array['url'];
                            
                            #unfull final path
                                $unfull_final_path_abs =
                                    $uploads_directory_abs.
                                    '/message_attachments/'.
                                    $function_add_new_message['conversation_id'];
                            
                            #get filename only
                                $file_path_info = pathinfo($full_abs_temp_file_path);
                                
                            #full temp path
                                $full_temp_path_abs = $full_abs_temp_file_path;
                                
                            #original filename
                                $original_filename = $file_path_info['basename'];
                                
                            #full final path
                                $full_final_path_abs =
                                    $unfull_final_path_abs.
                                    '/Conversation-'.$function_add_new_message['conversation_id'].
                                    '_Message-'.$function_add_new_message['message_id'].
                                    '_Attachment-'.($aen+1).
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
                            
                            #get size of current task files (open)
                            if(1==1){
                                $all_files_size_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_files
                                                                    WHERE vol_file_type_general = "message"
                                                                        AND vol_file_type_specific = "attachment"
                                                                        AND vol_file_type_id = %d
                                                                        AND vol_file_type_specific_id = %d;'
                                                                    ,$function_add_new_message['conversation_id']
                                                                    ,$function_add_new_message['message_id']);
                                $all_files_size_results = $GLOBALS['wpdb']->get_results($all_files_size_query);
                                
                                unset($summed_size_of_all_files);
                                #loop (open)
                                for($four=0;$four<count($all_files_size_results);$four++){
                                    
                                    $filesize_calculation = filesize($unfull_final_path_abs.'/'.$all_files_size_results[$four]->vol_file_name);
                                    $summed_size_of_all_files = $summed_size_of_all_files + $filesize_calculation;
                                    
                                }
                                #loop (close)
                                
                            }
                            #get size of current task files (open)
                            
                            #if file too big (open)
                            if($filesize > $max_size){
                                
                                $file_upload_error = 'File too large (max: '.$max_size.')';
                                
                            }
                            #if file too big (close)
                            
                            #if task space used up (open)
                            if($filesize + $summed_size_of_all_files > $max_size){
                                
                                $file_upload_error = 'File space used up (max: '.$max_size.')';
                                
                            }
                            #if task space used up (close)
                            
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
                                        'vol_file_type_general'     => "message",
                                        'vol_file_type_id'          => $function_add_new_message['conversation_id'],
                                        
                                        'vol_file_type_specific'    => "attachment",
                                        'vol_file_type_specific_id' => $function_add_new_message['message_id'],
                                        'vol_file_user_id'          => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                        
                                        'vol_file_date_modified'    => date("Y-m-d H:i:s"),
                                        'vol_file_date_created'     => date("Y-m-d H:i:s")
                                    ),
                                array(
                                        '%s','%s','%s','%d',
                                        '%s','%d','%s',
                                        '%s','%s'
                                    ));
                    }
                    #insert files in database (close)
                    
                    unset($file_upload_error);
                    
                }
                #add attachment (close)
                
            }
            #send new message (close)
            
            #function-scroll-to.php (v1.0) (open) #todolist: this function might be broken, too
            if(1==2){
                
                $function_scroll_to['scroll_to_class'] = 'function_scroll_to_conversation_content';
                $function_scroll_to['margin_top'] = 0; //optional, default: 200
                #$function_scroll_to['hide_classes'] = array(
                    
                #);
                #$function_scroll_to['show_classes'] = array(
                #    'function_scroll_to_xxxxxxxxxxxxxx'
                #);
                #include('#function-scroll-to.php');
                echo '-> outputs "array": '.$function_scroll_to;
                
            }
            #function-scroll-to.php (v1.0) (close)
            
        }
        #update (close)
        
        #get data (open)
        if(1==1){
            
            #conversations (open)
            if(1==1){
                $get_all_conversations_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                FROM fi4l3fg_voluno_message_system_conversations
                                                    
                                                    LEFT JOIN fi4l3fg_voluno_message_system_partners
                                                    ON messys_con_id = messys_par_conversation
                                                    
                                                    LEFT JOIN fi4l3fg_voluno_message_system_messages
                                                    ON messys_con_last_message = messys_mes_id
                                                    
                                                WHERE messys_par_user = %s
                                                ORDER BY messys_con_date_modified DESC
                                                ;',
                                                $GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                $get_all_conversations_results = $GLOBALS['wpdb']->get_results($get_all_conversations_query);
                
                #conversation id (open)
                if(1==1){
                    
                    #no conversation in database -> new member (open)
                    if(empty($get_all_conversations_results)){
                        $no_conversations_yet = "yes";
                    }
                    #no conversation in database -> new member (close)
                    
                    #message was just sent -> go to that conversation (open)
                    elseif(!empty($function_add_new_message__conversation_id)){
                        $initial_specific_conversation = $function_add_new_message__conversation_id;
                    }
                    #message was just sent -> go to that conversation (open)
                    
                    #conversation selected via url -> go to that conversation (open)
                    elseif(!empty($_GET['conversation_id'])){
                        $initial_specific_conversation = $_GET['conversation_id'];
                    }
                    #conversation selected via url -> go to that conversation (close)
                    
                    #no conversation selected -> open most recent conversation (open)
                    else{
                        $initial_specific_conversation = $get_all_conversations_results[0]->messys_con_id;
                    }
                    #no conversation selected -> open most recent conversation (open)
                    
                }
                #conversation id (close)
                
            }
            #conversations (close)
            
        }
        #get data (open)
        
    }
    #mysql (close)
    
    #jquery (open)
    if(1==1){
        echo '
        <script>
            jQuery(document).ready(function(){';
                
                #on click load new conversation AND change background colors accordingly (open)
                if(1==1){
                    echo '
                    jQuery(".conversation_row").click(function(){
                        jQuery(".loading_specific_conversation, .specific_converstation_area").toggle();
                        var conversationID = jQuery(this).find(".identifier_of_conversation").html();
                        jQuery(".specific_converstation_area")'.
                        '.load("'.get_permalink().'?conversation_id="+conversationID+" '.
                        '.messages_specific_conversation",{"conIdPost":conversationID},function(){
                            jQuery(this).hide(function(){
                                jQuery(".loading_specific_conversation").hide();
                                jQuery(this).show();
                            });
                        });
                        jQuery(".con_row_level3").not(".unread").css("background-color","");
                        jQuery(this).find(".con_row_level3").css("background-color","#FA974D");
                        jQuery(this).find(".con_row_level3").removeClass("unread");
                    });';
                }
                #on click load new conversation AND change background colors accordingly (open)
                
                #mark those conversations that have the class "unread" as red (open)
                if(1==1){
                    echo '
                    jQuery(".conversation_row").click(function(){
                        jQuery(this).removeClass("conversation_row_unread");
                        jQuery(".currently_selected_conversation").removeClass("currently_selected_conversation");
                        jQuery(this).addClass("currently_selected_conversation");
                    });';
                }
                #mark those conversations that have the class "unread" as red (close)
                
            echo '
            });
        </script>';
    }
    #jquery (close)
    
    #style (open)
    if(1==1){
        
        echo '
        <style>
            
            .conversation_row{
                cursor:pointer;
            }
            
            .conversation_row_unread{
                background-color:#F86A00;
            }
            .currently_selected_conversation td{
                background-color:#8B0000;
                color:#fff;
            }
            
            .ndo_padding_display_block_all_children *,.no_padding_display_bldock_all_children{
                padding:0px;
                display:inline-block;
                margin:0px;
                line-height:0px;
                border:0px;
                border-collapse: collapse;
            }';
            
            //for conversations, see tog conversations
            echo '
            .ellipsis{
                text-overflow:ellipsis;
                white-space:nowrap;
                overflow:hidden;
            }
            .no_padding_no_margin{
                padding:0px;
                margin:0px;
            }';
            
            //individual conversation -> select recipients -> search all members
            echo '
            .search_items{
                background-color:#FFEAB9;
                margin:5px;
                padding:10px;
                cursor:pointer;
                border-radius:10px;
            }
            .search_items:hover{
                background-color:#FFD87D;
            }
        </style>';
        
    }
    #style (close)
    
    #content (open)
    if(1==1){
        
        #title and pers pages (open)
        if(1==1){
            
            #preparation (open)
            if(1==1){
                
                #function-image-processing.php (v1.0) (open)
                if(1==1){
                    #thematic only
                        $function_propic__type = "thematic";
                        $function_propic__original_img_name = "messages.jpg";
                    #all
                        $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
                    include('#function-image-processing.php');
                    # $function_propic;
                    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                }
                #function-image-processing.php (v1.0) (close)
                
            }
            #preparation (close)
            
            #content (open)
            if(1==1){
                
                echo '
                <div style="overflow:hidden;">
                    <img src="'.$function_propic.'" class="voluno_header_picture">
                    <div style="text-align:center;margin:30px;">
                        <h1 style="display:inline;">
                            My messages
                        </h1>
                    </div>
                </div>';
                
            }
            #content (close)
            
        }
        #title and pers pages (close)
        
        echo '
        <table style="width:100%;">
            <tr>
                <td style="width:35%;border-right:1px dotted #efefef;">';
                    
                    #conversations: visible content (open)
                    if(1==1){
                        echo '
                        <div style="height:527px;overflow-y:auto;overflow-x:hidden;">';
                            
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
                                    // important elements, especially those maked with the comment: " //Don't touch this. " ;-)
                                    
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
                                            
                                            $function_table['results'] = $get_all_conversations_results;
                                            
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
                                                
                                                $function_table['data'][$ajl]['messys_par_user'] = $function_table['results'][$ajl]->messys_par_user;
                                                $function_table['data'][$ajl]['messys_con_id'] = $function_table['results'][$ajl]->messys_con_id;
                                                $function_table['data'][$ajl]['messys_par_read'] = $function_table['results'][$ajl]->messys_par_read;
                                                $function_table['data'][$ajl]['messys_mes_content'] = $function_table['results'][$ajl]->messys_mes_content;
                                                $function_table['data'][$ajl]['messys_con_date_modified'] = $function_table['results'][$ajl]->messys_con_date_modified;
                                                
                                                
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
                                        
                                        $function_table['unique id'] = "message_system_conversations_gfosughiruevbiebvi";
                                        // Everytime you use this function, please add a random and unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
                                        
                                        #Options connected to the title (open)
                                        if(1==1){
                                            
                                            #$function_table['display title'] = "Please add a title. AAAA";
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
                                            
                                            $function_table['hide column headings'] = "yes";
                                            // Hides headings of table. "yes" or empty (default).
                                            
                                            // The following multi-dimensional array has the following structure:
                                            // - heading = The heading that will be displayed above the respective column.
                                            // - width = Optional. With of the respective column. You can either use % or pt.
                                            // - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
                                            //                    columns names that you used in the "Raw data" section.
                                            //                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were "email" and "id".
                                            $function_table['column headings'] 
                                            = array(
                                                array(
                                                    'heading'		 => 'none',
                                                    #'width'			 => '100%',
                                                    'sorting option' => 'messys_con_date_modified'
                                                )
                                            );
                                            
                                            //Optionally, you can choose one of the above columns to be the default sorting option.
                                            // If you don't want this, please delete or hide the entire array.
                                            $function_table['default ordering']
                                            = array(
                                                'column' => 'messys_con_date_modified', // Colum name. In the example, "email" or "id".
                                                'direction' => 'DESC' // ASC or DESC
                                            );
                                            
                                        }
                                        #Headings and sorting (close)
                                        
                                        #Pagination (open)
                                        if(1==1){
                                            
                                            // If the table doesn't have a lot of space, you can make the pagination "thin". Then, the "first page", "previous page", "items per page",
                                            // "next page" and "last page" buttons will aligned vertically, instead of horizontally -> they will be slimmer.
                                            $function_table['thin_pagination'] = "yes"; // "yes" or "no" (default)
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
                                        
                                        #1 (open)
                                        if(1==1){
                                            
                                            #preparation (open)
                                            if(1==1){
                                                
                                                #mysql (open)
                                                if(1==1){
                                                    
                                                    $conversation_details_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                        FROM fi4l3fg_voluno_message_system_partners
                                                                            
                                                                            './/required to get last message id
                                                                            'LEFT JOIN fi4l3fg_voluno_message_system_conversations
                                                                            ON messys_par_conversation = messys_con_id
                                                                            
                                                                            './/use last message id to get last message content
                                                                            'LEFT JOIN fi4l3fg_voluno_message_system_messages
                                                                            ON messys_con_last_message = messys_mes_id
                                                                            
                                                                            './/get user names from user ids
                                                                            'LEFT JOIN fi4l3fg_voluno_users_extended
                                                                            ON messys_par_user = usersext_id
                                                                            
                                                                        WHERE messys_con_id = %d
                                                                            AND messys_par_user != %s
                                                                        ;',
                                                                        $function_table['data'][$abs]['messys_con_id']
                                                                        ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                                                    $conversation_details_results = $GLOBALS['wpdb']->get_results($conversation_details_query);
                                                    
                                                }
                                                #mysql (close)
                                                
                                                #nice conversation title (open)
                                                if(1==1){
                                                    
                                                    $nice_conversation_title = 
                                                    'Conversation between ';
                                                    
                                                    #loop (open)
                                                    for($acu=0;$acu<count($conversation_details_results);$acu++){
                                                        
                                                        if(count($conversation_details_results) <= 4){
                                                            
                                                            $nice_conversation_title .= $conversation_details_results[$acu]->usersext_displayName;
                                                            
                                                            if($acu + 1 != count($conversation_details_results)){
                                                                $nice_conversation_title .= ', ';
                                                            }
                                                            
                                                        }elseif($acu < 3){
                                                            
                                                            $nice_conversation_title .= $conversation_details_results[$acu]->usersext_displayName;
                                                            
                                                            if($acu + 1 != count($conversation_details_results)){
                                                                $nice_conversation_title .= ', ';
                                                            }
                                                            
                                                        }else{
                                                            
                                                            $nice_conversation_title .= (count($conversation_details_results)-$acu).' others';
                                                            break;
                                                            
                                                        }
                                                        
                                                    }
                                                    #loop (close)
                                                    
                                                    $nice_conversation_title .=
                                                    ' and you';
                                                    
                                                }
                                                #nice conversation title (close)
                                                
                                                #name list (open)
                                                if(1==1){
                                                    
                                                    unset($partner_name_list);
                                                    
                                                    #loop (open)
                                                    for($acu=0;$acu<count($conversation_details_results);$acu++){
                                                        
                                                        if($conversation_details_results[$acu]->usersext_status == 'active'){
                                                            
                                                            $partner_name_list .=
                                                            $conversation_details_results[$acu]->usersext_displayName;
                                                            
                                                        }else{
                                                            
                                                            $partner_name_list .=
                                                            '<span style="color:grey;">'.
                                                                $conversation_details_results[$acu]->usersext_displayName.
                                                            '</span>';
                                                            
                                                        }
                                                        
                                                        if($acu + 2 < count($conversation_details_results)){
                                                            
                                                            $partner_name_list .= ', ';
                                                            
                                                        }elseif($acu + 1 < count($conversation_details_results)){
                                                            
                                                            $partner_name_list .= ' and';
                                                        }
                                                        
                                                    }
                                                    #loop (close)
                                                    
                                                }
                                                #name list (close)
                                                
                                                #partner images (open)
                                                if(1==1){
                                                    
                                                    #1 (open)
                                                    if(count($conversation_details_results) == 1){
                                                        
                                                        #function-image-processing.php (v1.0) (open)
                                                        if(1==1){
                                                            #profile picture
                                                            $function_propic__type = "profile picture";
                                                            $function_propic__user_id = $conversation_details_results[0]->usersext_id;
                                                            #all
                                                            $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
                                                            include('#function-image-processing.php');
                                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                                        }
                                                        #function-image-processing.php (v1.0) (close)
                                                        
                                                        $conversation_img = '
                                                        <img src="'.$function_propic.'">';
                                                        
                                                    }
                                                    #1 (close)
                                                    
                                                    #2 (open)
                                                    elseif(count($conversation_details_results) == 2){
                                                        
                                                        #preparation (open)
                                                        if(1==1){
                                                            
                                                            #function-image-processing.php (v1.0) (open)
                                                            if(1==1){
                                                                #profile picture
                                                                    $function_propic__type = "profile picture";
                                                                    $function_propic__user_id = $conversation_details_results[0]->usersext_id;
                                                                #all
                                                                    $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
                                                                include('#function-image-processing.php');
                                                                $img_1 = $function_propic;
                                                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                                                
                                                                #profile picture
                                                                    $function_propic__type = "profile picture";
                                                                    $function_propic__user_id = $conversation_details_results[1]->usersext_id;
                                                                #all
                                                                    $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
                                                                include('#function-image-processing.php');
                                                                $img_2 = $function_propic;
                                                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                                            }
                                                            #function-image-processing.php (v1.0) (close)
                                                            
                                                        }
                                                        #preparation (close)
                                                        
                                                        #content (open)
                                                        if(1==1){
                                                            
                                                            $conversation_img = '
                                                            <div
                                                            class="no_padding_display_block_all_children"
                                                            style="
                                                                position:relative;
                                                                width:25px;
                                                                height:50px;
                                                                padding:0px;
                                                                overflow:hidden;
                                                                display:inline-block;
                                                                float:left;
                                                            "
                                                            >
                                                            <div style="margin-left:-12.5px;position:absolute;width:100px;">
                                                                <img src="'.$img_1.'">
                                                            </div>
                                                            </div>
                                                            <div
                                                            style="
                                                                position:relative;
                                                                width:25px;
                                                                height:50px;
                                                                padding:0px;
                                                                overflow:hidden;
                                                                display:inline-block;
                                                                float:left;
                                                            "
                                                            >
                                                            <div style="margin-left:-12.5px;position:absolute;width:100px;">
                                                                <img src="'.$img_2.'">
                                                            </div>
                                                            </div>
                                                            ';
                                                            
                                                        }
                                                        #content (close)
                                                        
                                                    }
                                                    #2 (close)
                                                    
                                                    #3+ (open)
                                                    else{
                                                        
                                                        #preparation (open)
                                                        if(1==1){
                                                            
                                                            #function-image-processing.php (v1.0) (open)
                                                            if(1==1){
                                                                
                                                                #profile picture
                                                                    $function_propic__type = "profile picture";
                                                                    $function_propic__user_id = $conversation_details_results[0]->usersext_id;
                                                                #all
                                                                    $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
                                                                include('#function-image-processing.php');
                                                                $img_1 = $function_propic;
                                                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                                                
                                                                #profile picture
                                                                    $function_propic__type = "profile picture";
                                                                    $function_propic__user_id = $conversation_details_results[1]->usersext_id;
                                                                #all
                                                                    $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
                                                                include('#function-image-processing.php');
                                                                $img_2 = $function_propic;
                                                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                                                
                                                                #profile picture
                                                                    $function_propic__type = "profile picture";
                                                                    $function_propic__user_id = $conversation_details_results[2]->usersext_id;
                                                                #all
                                                                    $function_propic__geometry = array(50,50); //optional, if e.g. only width: 300, NULL; vice versa
                                                                include('#function-image-processing.php');
                                                                $img_3 = $function_propic;
                                                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                                                
                                                            }
                                                            #function-image-processing.php (v1.0) (close)
                                                            
                                                        }
                                                        #preparation (close)
                                                        
                                                        #content (open)
                                                        if(1==1){
                                                            
                                                            $conversation_img = '
                                                            <div
                                                            class="no_padding_display_block_all_children"
                                                            style="
                                                                position:relative;
                                                                width:25px;
                                                                height:50px;
                                                                overflow:hidden;
                                                                float:left;
                                                            "
                                                            >
                                                            <div style="margin-left:-12.5px;position:absolute;width:100px;">
                                                                <img src="'.$img_1.'">
                                                            </div>
                                                            </div>
                                                            <div style="position:relative;float:left;">
                                                            <img src="'.$img_2.'" style="width:25px;position:absolute;margin-top:25px;">
                                                            <img src="'.$img_3.'" style="width:25px;">
                                                            </div>
                                                            ';
                                                            
                                                        }
                                                        #content (close)
                                                        
                                                    }
                                                    #3+ (close)
                                                   # for($acv=0;$acv<count($conversation_details_results);$acv++){
                                                    
                                                }
                                                #partner images (close)
                                                
                                                #function-timezone.php (v1.0) (open)
                                                if(1==1){
                                                  $function_timezone = $function_table['data'][$abs]['messys_con_date_modified'];
                                                  $function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
                                                  //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                  //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
                                                  include('#function-timezone.php');
                                                  
                                                }
                                                #function-timezone.php (v1.0) (close)
                                                
                                                #mark currently selected conversation (open)
                                                if($function_table['data'][$abs]['messys_con_id'] == $initial_specific_conversation){
                                                    
                                                    $class_of_currently_selected_conversation = "currently_selected_conversation";
                                                    
                                                }else{
                                                    
                                                    unset($class_of_currently_selected_conversation);
                                                    
                                                    #mark unread conversations (open)
                                                    if($function_table['data'][$abs]['messys_par_read'] != "yes"){
                                                        
                                                        $unread_conversation_class = 'conversation_row_unread';
                                                        
                                                    }else{
                                                        
                                                        unset($unread_conversation_class);
                                                        
                                                    }
                                                    #mark unread conversations (close)
                                                    
                                                }
                                                #mark currently selected conversation (close)
                                                
                                            }
                                            #preparation (close)
                                            
                                            #content (open)
                                            if(1==1){
                                                
                                                $function_table['table rows'] .= '
                                                <td
                                                    title="'.$nice_conversation_title.'"
                                                    class="conversation_row '.$unread_conversation_class.' '.$class_of_currently_selected_conversation.'"
                                                >
                                                    <span style="display:none;" class="identifier_of_conversation">'
                                                        .$function_table['data'][$abs]['messys_con_id'].
                                                    '</span>
                                                    <table style="margin:-7px 0px -9px 0px;padding:0px;">
                                                        <tr style="height:20px;" class="no_padding_no_margin">';
                                                            
                                                            #img (open)
                                                            if(1==1){
                                                                
                                                                $function_table['table rows'] .= '
                                                                <td class="no_padding_no_margin">
                                                                    <div style="border:1px solid black;width:50px;height:50px;" class="no_padding_no_margin">
                                                                        '.$conversation_img.'
                                                                    </div>
                                                                </td>';
                                                                
                                                            }
                                                            #img (close)
                                                            
                                                            $function_table['table rows'] .= '
                                                            <td style="vertical-align:middle;" class="no_padding_no_margin">';
                                                                
                                                                #name list (open)
                                                                if(1==1){
                                                                    
                                                                    $function_table['table rows'] .= '
                                                                    <div
                                                                        style="width:140px;font-weight:bold;display:inline-block;float:left;"
                                                                        class="ellipsis"
                                                                    >
                                                                        '.$partner_name_list.'
                                                                    </div>';
                                                                    
                                                                }
                                                                #name list (close)
                                                                
                                                                #time (open)
                                                                if(1==1){
                                                                    
                                                                    $function_table['table rows'] .= '
                                                                    <div
                                                                        style="text-align:right;font-weight:bold;float:right;display:inline-block;"
                                                                        class="no_padding_no_margin"
                                                                    >
                                                                        '.$function_timezone.'
                                                                    </div>';
                                                                    
                                                                }
                                                                #time (close)
                                                                
                                                                #message content (open)
                                                                if(1==1){
                                                                    
                                                                    $function_table['table rows'] .= '
                                                                    <div style="width:240px;padding-top:4px;margin:0px;" class="ellipsis">
                                                                    '.sanitize_text_field($function_table['data'][$abs]['messys_mes_content']).'
                                                                    </div>';
                                                                }
                                                                #message content (close)
                                                                
                                                            $function_table['table rows'] .= '
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>';
                                                
                                            }
                                            #content (close)
                                            
                                        }
                                        #1 (close)
                                        
                                        $function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
                                    } //Don't touch this. 
                                    #Cells/Columns (close)
                                    
                                }
                                #design (close)
                                
                                $function_table['part'] = 2; //Don't touch this. 
                                include("#function-table.php"); //Don't touch this. 
                                
                                #output
                                //the entire output is stored in the following variable:
                                echo $function_table['output table'];
                                
                            }
                            #function-table.php (v1.0) (close)
                            
                        echo '
                        </div>';
                    }
                    #conversations: visible content (open)
                    
                echo '
                </td>
                <td>';
                    
                    #specific conversation (open)
                    if(1==1){
                        
                        #preparation (open)
                        if(1==1){
                            
                            #function-image-processing.php (v1.0) (open)
                            if(1==1){
                                #thematic only
                                    $function_propic__type = "thematic";
                                    $function_propic__original_img_name = "loading.gif";
                                    $function_propic__cropping = "yes"; //yes or empty (default)
                                #all
                                    $function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
                                include('#function-image-processing.php');
                                # $function_propic;
                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                            }
                            #function-image-processing.php (v1.0) (close)
                            
                        }
                        #preparation (close)
                        
                        #content (open)
                        if(1==1){
                            
                            echo '
                            <div class="specific_converstation_area">';
                                
                                $messages_system_page_part = "specific conversation";
                                include("members-net-my-messages.php");
                                
                            echo '
                            </div>';
                            
                            #loading img (open)
                            if(1==1){
                                echo '
                                <div
                                    style="
                                        vertical-align:middle;
                                        height:527px;
                                        text-align:center;
                                        display:none;
                                    "
                                    class="loading_specific_conversation"
                                >
                                    <img
                                        src="'.wp_upload_dir()['url'].'/pictures/loading.gif"
                                        style="width:60px;margin-top:100px;"
                                        alt="Loading..."
                                    >
                                </div>';
                            }
                            #loading img (close)
                            
                        }
                        #content (close)
                        
                    }
                    #specific conversation (close)
                    
                echo '
                </td>
            </tr>
        </table>';
        
        #admin panel (to send messages form anyone to anyone) (for mysql see top) (open)
        if(1==2 AND in_array('Voluno Web Developer',$function_userpositions_get['simple_pure_array']['accepted'])){
            
            
            echo '
            <script>
                jQuery(document).ready(function(){
                    jQuery(".admin_panel_button").click(function(){
                        jQuery("#admin_panel").toggle();
                    });
                });
            </script>
            
            
            <a style="cursor:pointer;" class="admin_panel_button">
                [Admin Panel]
            </a>
            
            <div style="background-color:lightblue;display:none;" id="admin_panel">';
                
                $lorem_ipsum =
                "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt".
                "ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo".
                "dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit";
                
                echo '
                <br>
                send new message
                <br>
                
                <form method="post" action="'.get_permalink(782).'">
                    Sender
                    <select name="admin_test_new_message_sender">';
                        $all_users_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_users_extended;');
                        $all_users_results = $GLOBALS['wpdb']->get_results($all_users_query);
                        foreach($all_users_results as $all_users_row){
                            echo '
                            <option value="'.$all_users_row->usersext_id.'">'.$all_users_row->usersext_displayName.'</option>
                            ';
                        }
                    echo '
                    </select>
                    <br>
                    Recipient
                    <select name="admin_test_new_message_recipient">';
                        foreach($all_users_results as $all_users_row){
                            echo '
                            <option value="'.$all_users_row->usersext_id.'">'.$all_users_row->usersext_displayName.'</option>
                            ';
                        }
                    echo '
                    </select>
                    <br>
                    Content
                    <textarea name="admin_test_new_message_content" style="width:100%;">'.$lorem_ipsum.'</textarea>
                    <input type="hidden" name="admin_message_code" value="c84hfc8wh84gvghojvcFKasj4f2Fa4f4wfaf2hh25hrwsvd45t5z67j7u12609500832Wv3v">
                    <br>
                    <input type="submit" value="send" name="admin_test_new_message_submit">
                </form>
                
            </div>';
        }
        #admin panel (to send messages form anyone to anyone) (for mysql see top) (close)
        
        }
    #content (close)
    
}
#main part (close)

#part: specific conversation (right side of container) (open)
elseif($page_section == "specific conversation"){
    echo '
    <div class="messages_specific_conversation">';
        
        #preparation (open)
        if($no_conversations_yet != "yes"){
            
            if(empty($_GET['conversation_id']) OR !empty($function_add_new_message__conversation_id)){
                $conversation_id = $initial_specific_conversation;
            }else{
                $conversation_id = $_GET['conversation_id'];
            }
            
        }
        #preparation (close)
        
        #mysql (open)
        if(1==1){
            
            #access rights check (open)
            if($no_conversations_yet != "yes"){
                
                $is_user_part_of_conversation_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_message_system_partners
                                                                    WHERE messys_par_conversation = %d
                                                                    AND messys_par_user = %s;',
                                                                    $conversation_id,
                                                                    $GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                $is_user_part_of_conversation_row = $GLOBALS['wpdb']->get_row($is_user_part_of_conversation_query);
                
                #function-redirect.php (v1.0) (open)
                if(empty($is_user_part_of_conversation_row)){
                    
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
                
            }
            #access rights check (close)
            
            #update (open)
            if(empty($_GET['conversation_with'])){
                
                #mark this conversation as read (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_message_system_partners',
                        array( //updated content
                                'messys_par_read' => "yes"
                        ), 
                        array( //location of updated content
                                'messys_par_conversation' => $conversation_id,
                                'messys_par_user' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                        ), 
                        array( //format of updated content
                                '%s'
                        ), 
                        array( //format of location of updated content
                                '%d',
                                '%s'
                            ));
                }
                #mark this conversation as read (close)
                
                #dome update read conversation number in mysql (to update already loaded top sidebar, see jquery below) (open)
                if(2==1){
                    $update_read_number_in_top_sidebar_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_messages_conversations
                                                    WHERE vol_mess_con_unread = %s
                                                            AND vol_mess_con_user = %s;',
                                                    "yes",$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $update_read_number_in_top_sidebar_results = $GLOBALS['wpdb']->get_results($update_read_number_in_top_sidebar_query);
                }
                #update read conversation number in mysql (to update already loaded top sidebar, see jquery below) (close)
                
            }
            #update (close)
            
            #get (open)
            if(1==1){
                
                #get messages of this conversation (open)
                if($no_conversations_yet != "yes" AND empty($_GET['conversation_with'])){
                    
                    $specific_conversation_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_message_system_messages
                                                                        LEFT JOIN fi4l3fg_voluno_users_extended
                                                                        ON messys_mes_author = usersext_id
                                                                    WHERE messys_mes_conversation = %d
                                                                    ORDER BY messys_mes_date_created DESC;',
                                                                    $conversation_id);
                    $specific_conversation_results = $GLOBALS['wpdb']->get_results($specific_conversation_query);
                    
                }
                #get messages of this conversation (close)
                
                #get conversation partners of this conversation (open)
                if($no_conversations_yet != "yes" AND empty($_GET['conversation_with'])){
                    
                    $conversation_partners_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                FROM fi4l3fg_voluno_message_system_partners
                                                    LEFT JOIN fi4l3fg_voluno_users_extended
                                                    ON messys_par_user = usersext_id
                                                WHERE messys_par_conversation = %s
                                                AND messys_par_user != %s;',
                                                $conversation_id,
                                                $GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $conversation_details_results = $GLOBALS['wpdb']->get_results($conversation_partners_query);
                    
                }
                #get conversation partners of this conversation (close)
                
                #get all contacts (open)
                if(1==1){
                    
                    $all_contacts_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_personal_settings
                                                            LEFT JOIN fi4l3fg_voluno_users_extended
                                                            ON pers_settings_value = usersext_id
                                                        WHERE pers_settings_user_id = %s
                                                            AND pers_settings_general = "contact"
                                                            AND pers_settings_specific = "active"
                                                            AND status = ""
                                                        ORDER BY usersext_displayName;',
                                                        $GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                    $all_contacts_results = $GLOBALS['wpdb']->get_results($all_contacts_query);
                }
                #get all contacts (close)
                
            }
            #get (close)
            
        }
        #mysql (close)
        
        #jquery #dome (open)
        if(1==1){
            
            #function-files.php (v1.0) (open)
            if(1==1){
                
                #documentation (open)
                if(1==1){
                    
                    // Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
                    
                }
                #documentation (close)
                
                #input (open)
                if(1==1){
                    
                    $function_files['action'] = 'use'; // 'use', 'upload' or 'delete'.
                    
                    #use (open)
                    if(1==1){
                        
                        $function_files['files_to_use_by_nicename'] = [
                            'emptyforscript.png'
                        ];
                        //nicenames of files to use. must be an array. only allowed for system images, to prevent name conflicts.
                        
                    }
                    #use (close)
                    
                }
                #input (close)
                
                include('#function-files.php');
                
                #output (open)
                if(1==1){
                    
                    #use (open)
                    if(1==1){
                        
                        #$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'] #full url path
                        
                        // examples:
                        // https://www.voluno.org/wp-content/voluno-files/usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
                        // usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298/background_website(1).jpg
                        // usage_kiesouq42spiahoaxiuviukl585e0l/vol_file_id_298
                        
                    }
                    #use (close)
                    
                }
                #output (close)
                
            }
            #function-files.php (v1.0) (close)
            
            echo '
            <img
                src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
                width="1" height="1"
                style="position:absolute;z-index:-3;"
                onload=
                \'
                    jQuery(document).ready(function(){';
                    
                        #form validation message (open)
                        if(1==1){
                            echo '
                            jQuery(".new_message_submit").click(function() {
                                
                                if (jQuery.trim(jQuery(".new_message_content").val()) === "" && jQuery(".message_attachments_input").val() == "") {
                                    jQuery(".error_no_message").fadeIn(500);
                                }else if(jQuery(".new_message_recipients").val() == ""){
                                    jQuery(".error_no_message_no_recipients_selected").fadeIn(500);
                                }else{
                                    jQuery(".new_message_form").submit();
                                }
                            });
                            jQuery(".new_message_content").keypress(function(){
                                jQuery(".error_no_message").fadeOut(300);
                            });
                            ';
                        }
                        #form validation message (open)
                        
                        #fancy jquery things that happen when you click on "change (recipient)" (open)
                        if(1==1){
                            echo '
                            jQuery(".change_recipients_link,.close_select_recipients_menu").click(function(){
                                jQuery(".select_recipients_menu").fadeToggle(300);
                                jQuery(".error_no_message_no_recipients_selected").fadeOut(300);
                            });
                            
                            jQuery(".select_from_contacts_button,.select_from_contacts_menu_cancel").click(function(){
                                jQuery(".select_from_contacts_menu").slideToggle(300).css("display","inline-block");
                                jQuery(".search_all_members_button").slideToggle(300);
                            });
                            jQuery(".select_from_contacts_menu_select").click(function(){
                                if(jQuery(".select_from_contacts_menu_input option:selected").length != 0){
                                    jQuery(".select_recipients_menu").fadeOut(300);
                                    
                                    var new_recipients_list = "";
                                    jQuery(".select_from_contacts_menu_input option:selected").slice(0,-2).each(function(){
                                        new_recipients_list = new_recipients_list+jQuery(this).text()+", ";
                                    });
                                    if(jQuery(".select_from_contacts_menu_input option:selected").length > 1){
                                        new_recipients_list = new_recipients_list+'.
                                                            'jQuery(".select_from_contacts_menu_input option:selected:last").prev().text()+'.
                                                            '" and ";
                                    }
                                    new_recipients_list = new_recipients_list+'.
                                                        'jQuery(".select_from_contacts_menu_input option:selected:last").text();
                                    jQuery(".recipients_list").html(new_recipients_list);
                                    jQuery(".new_message_recipients").val(jQuery(".select_from_contacts_menu_input").val());
                                }
                            });
                            
                            
                            jQuery(".search_all_members_button,.search_form_menu_cancel").click(function(){
                                jQuery(".search_form_menu").slideToggle(300).css("display","inline-block");
                                jQuery(".select_from_contacts_button").slideToggle(300);
                            });
                            
                            jQuery(".search_form_menu_search").click(function(){
                                jQuery(".search_results").fadeOut(300);
                                jQuery(".loading_img_search").fadeIn(300);
                                var search_content = jQuery(".search_form_menu_input").val();
                                jQuery(".search_results")'.
                                '.load("'.get_permalink().'?search_content="+encodeURIComponent(search_content)+" '.
                                '.search_execution_area",function(){
                                    jQuery(this).hide(function(){
                                        jQuery(".loading_specific_conversation").hide();
                                        jQuery(this).show();
                                        jQuery(".search_results").fadeIn(300);
                                        jQuery(".loading_img_search").fadeOut(150);
                                    });
                                });
                            })
                            
                            jQuery("body").on("click",".search_items",function(){
                                jQuery(".recipients_list").html(jQuery(this).find(".new_contact_display_name").html());
                                jQuery(".new_message_recipients").val(jQuery(this).find(".new_contact_id").html());
                                jQuery(".select_recipients_menu").fadeOut(300);
                            });
                            ';
                            
                        }
                        #fancy jquery things that happen when you click on "change (recipient)" (close)
                        
                        #update read conversation number in top sidebar (already loaded, see msql above) #dome (open)
                        if($is_user_part_of_conversation_row->messys_par_read != "yes"
                           AND
                           empty($_POST['new_message_recipients'])
                           AND
                           $no_conversations_yet != "yes"){
                            
                            echo '
                            var reduce_number_of_unread_messages_by_one = jQuery(".top_sidebar_message_number_class").html() - 1;
                            jQuery(".top_sidebar_message_number_class").html(reduce_number_of_unread_messages_by_one);
                            ';
                            
                        }
                        #update read conversation number in top sidebar (already loaded, see msql above) (close)
                        
                        #file uploads (open)
                        if(1==1){
                            
                            echo '
                            jQuery(".add_attachment_button").click(function(){
                                jQuery(".add_attachment_menu").slideToggle(300);
                            });
                            
                            jQuery(".message_attachments_input").change(function(){
                                jQuery(".error_no_message").fadeOut(300);
                                var filenames = "";
                                var files = jQuery(this)[0].files;
                                var totalFilesize = 0;
                                var totalFilesizeWarning = "";
                                var totalFilesizeColor = "";
                                jQuery(".attachments_warning_size").fadeOut(300);
                                for (var i = 0; i < files.length; i++){
                                    totalFilesize = totalFilesize + files[i].size;
                                    if(totalFilesize > '.$max_size.'){
                                        jQuery(".attachments_warning_size").fadeIn(300);
                                        totalFilesizeColor = " style=\"color:red;\"";
                                    }
                                    if(files[i].size >= 1024 * 1024){
                                        var filesize = (Math.round(files[i].size/1024/1024*10)/10)+"&nbsp;MB";
                                    }else{
                                        var filesize = (Math.round(files[i].size/1024*10)/10)+"&nbsp;KB";
                                    }
                                    filenames = filenames+"<li"+totalFilesizeColor+">"+files[i].name+" ("+filesize+")</li>";
                                }
                                jQuery(".clear_attachments, .message_attachments_input_filenames").slideDown(300);
                                jQuery(".message_attachments_input_filenames").html("<ul>"+totalFilesizeWarning+filenames+"</ul>");
                                ';
                                
                                #clear file input (open)
                                if(1==1){
                                    echo '
                                    if(totalFilesize > '.$max_size.'){
                                        var message_content = jQuery(".new_message_content").val();
                                        var message_recipients = jQuery(".new_message_recipients").val();
                                        
                                        jQuery(".new_message_form").trigger("reset");
                                        
                                        jQuery(".new_message_content").val(message_content);
                                        jQuery(".new_message_recipients").val(message_recipients);
                                    }
                                    ';
                                }
                                #clear file input (close)
                                
                            echo '
                            });';
                            
                            #clear file upload box (open)
                            if(1==1){
                                
                                echo '
                                jQuery(".clear_attachments").click(function(){
                                    var message_content = jQuery(".new_message_content").val();
                                    var message_recipients = jQuery(".new_message_recipients").val();
                                    
                                    jQuery(".new_message_form").trigger("reset");
                                    jQuery(".clear_attachments, .message_attachments_input_filenames").slideUp(300,function(){
                                        jQuery(".message_attachments_input_filenames").empty();
                                    });
                                    
                                    jQuery(".attachments_warning_size").fadeOut(300);
                                    jQuery(".new_message_content").val(message_content);
                                    jQuery(".new_message_recipients").val(message_recipients);
                                });
                                ';
                                
                            }
                            #clear file upload box (close)
                            
                        }
                        #file uploads (close)
                        
                    echo '
                    });
                \'
            />';
        }
        #jquery (close)
        
        #content (open)
        if(1==1){
            
            #new message (open)
            if(1==1){
                
                #preparation (open)
                if(1==1){
                    
                    #make a nice name list of conversation partners (open)
                    if(1==1){
                        
                        #select recipient via url (open)
                        if(!empty($_GET['conversation_with'])){
                            
                            #get recipients name (open)
                            if(1==1){
                                
                                $recipients_name_and_id_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                FROM fi4l3fg_voluno_users_extended
                                                                                WHERE usersext_id = %s'
                                                                                ,$_GET['conversation_with']);
                                $recipients_name_and_id_row = $GLOBALS['wpdb']->get_row($recipients_name_and_id_query);
                            }
                            #get recipients name (close)
                            
                            #if user doesn't exists (open)
                            if(empty($recipients_name_and_id_row)){
                                
                                #function-redirect.php (v1.0) (open)
                                if(1==1){
                                    
                                    #documentation (open)
                                    if(1==1){
                                        
                                        // Redirects to another page. Prevents further loading of content.
                                        
                                    }
                                    #documentation (close)
                                    
                                    #input (open)
                                    if(1==1){
                                        
                                        $function_redirect['redirect_url'] = get_permalink(); // url to redirect to. If none is given, homepage is used.
                                        
                                    }
                                    #input (close)
                                    
                                    include('#function-redirect.php');
                                    
                                    #no output
                                    
                                }
                                #function-redirect.php (v1.0) (close)
                                
                            }
                            #if user doesn't  exists (close)
                            
                            $placeholder = 'Write a message to '.$recipients_name_and_id_row->usersext_displayName.'.';
                            $to_colon_recipients_list = $recipients_name_and_id_row->usersext_displayName;
                            $conversation_partners_ids_list = $recipients_name_and_id_row->usersext_id;
                            
                        }
                        #select recipient via url (close)
                        
                        #new conversation (open)
                        elseif($no_conversations_yet == "yes"){
                            $placeholder = 'Write your first message.';
                            $to_colon_recipients_list = 'Please add a recipient.';
                            unset($conversation_partners_ids_list);
                        }
                        #new conversation (close)
                        
                        #regular conversation (open)
                        else{
                            for($x=0;$x<count($conversation_details_results);$x++){
                                if($x+1 == count($conversation_details_results)){
                                    
                                    $conversation_partners .= $conversation_details_results[$x]->usersext_displayName;
                                    
                                }elseif($x+2 == count($conversation_details_results)){
                                    
                                    $conversation_partners .= $conversation_details_results[$x]->usersext_displayName." and ";
                                    
                                }else{
                                    
                                    $conversation_partners .= $conversation_details_results[$x]->usersext_displayName.", ";
                                    
                                }
                                $conversation_partners_ids_array[] = $conversation_details_results[$x]->usersext_id;
                                $conversation_partners_ids_list .= $conversation_details_results[$x]->usersext_id.",";
                            }
                            $conversation_partners_ids_list = rtrim($conversation_partners_ids_list,",");
                            
                            $placeholder = 'Write a message to '.$conversation_partners.'.';
                            $to_colon_recipients_list = $conversation_partners;
                        }
                        #regular conversation (close)
                        
                    }
                    #make a nice name list of conversation partners (close)
                    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    
                    #textarea for new message + send button + conversations partners (open)
                    if(1==1){
                        echo '
                        <div class="function_scroll_to_conversation_content">
                            <form
                                class="new_message_form"
                                method="post"
                                action="'.get_permalink().'?conversation_id='.$conversation_id.'"
                                autocomplete="off"
                                enctype="multipart/form-data"
                            >';
                                
                                #textarea (open)
                                if(1==1){
                                    
                                    echo '
                                    <div>
                                        <textarea
                                            name="new_message_content"
                                            class="new_message_content"
                                            style="width:98%;min-height:100px;height:150px;max-height:400px;resize:vertical;"
                                            placeholder="'.$placeholder.'"
                                            maxlength="20000"
                                        ></textarea>
                                    </div>';
                                    
                                    #warning (open)
                                    if(1==1){
                                        
                                        echo '
                                        <div>
                                            <span style="display:none;color:red;" class="error_no_message_no_recipients_selected">
                                                Please select a recipient.
                                            </span>
                                            <span style="display:none;color:red;" class="error_no_message">
                                                You haven\'t written a message yet.
                                            </span>
                                        </div>';
                                        
                                    }
                                    #warning (close)
                                    
                                }
                                #textarea (close)
                                
                                #options (open)
                                if(1==1){
                                    echo '
                                    <div style="overflow:hidden;">';
                                        
                                        #recipients (open)
                                        if(1==1){
                                            
                                            echo '
                                            <div
                                                style="
                                                    display:inline-block;
                                                    float:left;
                                                    width:370px;
                                                    position:relative;
                                                "
                                            >
                                                <input
                                                    type="hidden"
                                                    value="'.$conversation_partners_ids_list.'"
                                                    class="new_message_recipients"
                                                    name="new_message_recipients"
                                                >
                                                <p>
                                                    To:
                                                    <span class="recipients_list" style="font-weight:bold;">'.$to_colon_recipients_list.'</span>
                                                    <a class="change_recipients_link" style="cursor:pointer;">
                                                        (Change)
                                                    </a>
                                                </p>';
                                                
                                                #select recipients menu (open)
                                                if(1==1){
                                                    
                                                    #function-fixed-div.php (v1.0) (open)
                                                    if(1==1){
                                                        
                                                        $function_fixed_div_part = 1; //1 or 2, obligatory
                                                        $function_fixed_div_width_div = 230; //only relevant for part 1, default 750 (px)
                                                        $function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
                                                        $function_fixed_div__darkened_bg_fadeout_on_click = "yes"; //default: no = empty
                                                        $function_fixed_div_div_name = "select_recipients_menu"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
                                                        $function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
                                                        $function_fixed_div_border_radius = 25; //optional, default is 0
                                                        $function_fixed_div_cancel_button = "no"; //optional, default is yes
                                                        $function_fixed_div_height_div = "50"; //optional, in percent, default is 50
                                                        $function_fixed_div_text_align = "center"; //optional, default is left
                                                        $function_fixed_div_vertical_scrolling = "no"; //default: empty, scroll bar after inner div maxheight of 400 
                                                        $function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
                                                        $function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
                                                        include('#function-fixed-div.php');
                                                    echo $function_fixed_div_display;
                                                    }    
                                                    #function-fixed-div.php (v1.0) (close)
                                                        
                                                        echo '
                                                        <div style="height:500px;position:relative;">
                                                            <div
                                                                style="position:absolute;margin-top:-35px;margin-left:-50px;"
                                                                class="voluno_button close_select_recipients_menu"
                                                            >
                                                                Close
                                                            </div>';
                                                        
                                                        #choose from where to select menu (open)
                                                        if(1==1){
                                                            echo '
                                                            <div
                                                                class="choose_from_where_to_select_menu"
                                                                style="float:left;display:inline-block;width:230px;"
                                                            >
                                                                <div
                                                                    class="voluno_button select_from_contacts_button"
                                                                    style="margin:10px;display:block;width:190px;"
                                                                >
                                                                    Select from contacts
                                                                </div>
                                                                <div
                                                                    class="voluno_button search_all_members_button"
                                                                    style="margin:10px;"
                                                                >
                                                                    Search all Voluno members
                                                                </div>
                                                            </div>
                                                            ';
                                                        }
                                                        #choose from where to select menu (close)
                                                        
                                                        #select from contacts menu (open)
                                                        if(1==1){
                                                            echo '
                                                            <div class="select_from_contacts_menu" style="display:none;">';
                                                                
                                                                #select menu (open)
                                                                if(1==1){
                                                                    echo '
                                                                    '.count($all_contacts_results).'<select
                                                                        multiple
                                                                        class="select_from_contacts_menu_input"
                                                                        style="height:250px;"
                                                                    >';
                                                                        
                                                                        for($acz=0;$acz<count($all_contacts_results);$acz++){
                                                                            
                                                                            #selected (open)
                                                                            if(in_array($all_contacts_results[$acz]->usersext_id,$conversation_partners_ids_array)){
                                                                                $selected = "selected";
                                                                            }else{
                                                                                unset($selected);
                                                                            }
                                                                            #selected (close)
                                                                            
                                                                            echo '
                                                                            <option
                                                                                value="'.$all_contacts_results[$acz]->usersext_id.'"
                                                                                '.$selected.'
                                                                            >'.
                                                                                $all_contacts_results[$acz]->usersext_displayName.
                                                                            '</option>';
                                                                            
                                                                        }
                                                                        
                                                                    echo '
                                                                    </select>';
                                                                }
                                                                #select menu (close)
                                                                
                                                                echo '
                                                                <div style="text-align:centelr;">
                                                                    <div class="voluno_button select_from_contacts_menu_cancel">
                                                                        Cancel
                                                                    </div>
                                                                    <div class="voluno_button select_from_contacts_menu_select">
                                                                        Select
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                        }
                                                        #select from contacts menu (close)
                                                        
                                                        #search form (open)
                                                        if(1==1){
                                                            
                                                            #function-loaoding-img-mysql-area-div.php (v1.0) (open)
                                                            if(1==1){
                                                                $function_loaoding_img_mysql_area_div__variable_only = "yes"; //default:empty = no
                                                                include('#function-loaoding-img-mysql-area-div.php');
                                                                #$function_loaoding_img_mysql_area_div
                                                                #$function_loaoding_img_mysql_area_div__img_path //path of loading img
                                                                #classes are: mysql_load_area AND loading_page loading_img_middle_page <- use this one
                                                            }
                                                            #function-loaoding-img-mysql-area-div.php (v1.0) (close)
                                                            
                                                            echo '
                                                            <div class="search_form_menu" style="display:none;text-align:center;position:relative;">
                                                                <input
                                                                    type="text"
                                                                    class="search_form_menu_input"
                                                                    style="width:100%;"
                                                                    placeholder="Please type the members name"
                                                                >
                                                                <div>
                                                                    <div class="voluno_button search_form_menu_search">
                                                                        Search
                                                                    </div>
                                                                    <div class="voluno_button search_form_menu_cancel">
                                                                        Cancel
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    style="
                                                                        width:100%;
                                                                        position:absolute;
                                                                        padding-top:100px;
                                                                        text-align:center;
                                                                        display:none;
                                                                    "
                                                                    class="loading_img_search"
                                                                >
                                                                    <img
                                                                        style="width:70px;"
                                                                        src="'.$function_loaoding_img_mysql_area_div__img_path.'"
                                                                    >
                                                                </div>
                                                                <div class="search_results">
                                                                </div>
                                                            </div>';
                                                            
                                                        }
                                                        #search form (close)
                                                        
                                                        echo '
                                                        </div>';
                                                        
                                                    #function-fixed-div.php (v1.0) (open)
                                                    if(1==1){
                                                        
                                                        #function-fixed-div.php
                                                            $function_fixed_div_part = 2; //1 or 2, both are obligatory
                                                            include('#function-fixed-div.php');
                                                            echo $function_fixed_div_display;
                                                            
                                                    }    
                                                    #function-fixed-div.php (v1.0) (close)
                                                    
                                                }
                                                #select recipients menu (close)
                                                
                                            echo '
                                            </div>';
                                            
                                        }
                                        #recipients (close)
                                        
                                        #send (open)
                                        if(1==1){
                                            
                                            echo '
                                            <div class="new_message_submit voluno_button" style="margin-left:30px;float:right;">
                                                Send message
                                            </div>';
                                            
                                        }
                                        #send (close)
                                        
                                        #attachments (open)
                                        if(1==1){
                                            
                                            #preparation (open)
                                            if(1==1){
                                                
                                                $size = 26;
                                                
                                                #function-image-processing.php (v1.0) (open)
                                                if(1==1){
                                                    #thematic only
                                                        $function_propic__type = "thematic";
                                                        $function_propic__original_img_name = "attachment-white.png";
                                                    #all
                                                        $function_propic__geometry = array($size,$size); //optional, if e.g. only width: 300, NULL; vice versa
                                                    include('#function-image-processing.php');
                                                    # $function_propic;
                                                    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                                }
                                                #function-image-processing.php (v1.0) (close)
                                                
                                            }
                                            #preparation (close)
                                            
                                            #content (open)
                                            if(1==1){
                                                
                                                echo '
                                                <div
                                                    style="
                                                        display:inline-block;
                                                        float:right;
                                                        width:'.$size.'px;
                                                        height:'.$size.'px;
                                                        padding:5px;
                                                    "
                                                    class="voluno_button add_attachment_button"
                                                >
                                                    <img src="'.$function_propic.'">
                                                </div>';
                                                
                                            }
                                            #content (close)
                                            
                                        }
                                        #attachments (close)
                                        
                                    echo '
                                    </div>';
                                    
                                    #attachment menu (open)
                                    if(1==1){
                                        
                                        #content (open)
                                        if(1==1){
                                            
                                            echo '
                                            <div
                                                style="
                                                    border-radius:20px;
                                                    background-color:#FFEAB9;
                                                    padding:20px;
                                                    margin-top:10px;
                                                    display:none;
                                                "
                                                class="add_attachment_menu"
                                            >
                                                Please select your files:
                                                <input
                                                    type="file"
                                                    class="message_attachments_input"
                                                    name="message_attachments_input[]"
                                                    multiple
                                                >
                                                <div class="attachments_warning_size" style="display:none;">
                                                    <p style="color:red;font-weight:bold;">
                                                        The attachments have not been added
                                                        to your message, since they exceed the limit of '.($max_size/1024/1024).'&nbspMB.
                                                        Please consider selecting fewer files, compressing them or using
                                                        other transfer methods (like email or
                                                        <a
                                                            href="https://www.dropbox.com/"
                                                            title="Go to dropbox.com"
                                                            target="_blank"
                                                        >
                                                            Dropbox
                                                        </a>
                                                        ).
                                                    </p>
                                                </div>
                                                <div class="message_attachments_input_filenames">
                                                </div>
                                                <div class="clear_attachments voluno_button" style="display:none;">Remove attachments</div>
                                            </div>';
                                            
                                        }
                                        #content (close)
                                        
                                    }
                                    #attachment menu (close)
                                    
                                }
                                #options (close)
                                
                            echo '
                            </form>
                        </div>';
                    }
                    #textarea for new message + send button + conversations partners (close)
                    
                }
                #content (close)
                
            }
            #new message (close)
            
            #message rows (open)
            if($no_conversations_yet != "yes"){
                echo '
                <div style="width:100%;overflow-y:auto;max-height:300px;border-top:1px dotted #efefef;margin-top:10px;">';
                    
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
                            // important elements, especially those maked with the comment: " //Don't touch this. " ;-)
                            
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
                                    
                                    $function_table['results'] = $specific_conversation_results;
                                    
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
                                        
                                        $function_table['data'][$ajl]['messys_mes_date_created'] = $function_table['results'][$ajl]->messys_mes_date_created;
                                        $function_table['data'][$ajl]['messys_mes_author'] = $function_table['results'][$ajl]->messys_mes_author;
                                        $function_table['data'][$ajl]['messys_mes_id'] = $function_table['results'][$ajl]->messys_mes_id;
                                        $function_table['data'][$ajl]['messys_mes_content'] = $function_table['results'][$ajl]->messys_mes_content;
                                        
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
                                
                                $function_table['unique id'] = "message_system_messages_gndsfiviurbuzvebr";
                                // Everytime you use this function, please add a random and unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
                                
                                #Options connected to the title (open)
                                if(1==1){
                                    
                                    #$function_table['display title'] = "Please add a title.";
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
                                    
                                    $function_table['hide column headings'] = "yes";
                                    // Hides headings of table. "yes" or empty (default).
                                    
                                    // The following multi-dimensional array has the following structure:
                                    // - heading = The heading that will be displayed above the respective column.
                                    // - width = Optional. With of the respective column. You can either use % or pt.
                                    // - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
                                    //                    columns names that you used in the "Raw data" section.
                                    //                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were "email" and "id".
                                    $function_table['column headings'] 
                                    = array(
                                        array(
                                            'heading'		 => 'Message content',
                                            'width'			 => '100%',
                                            'sorting option' => 'messys_mes_date_created'
                                        )
                                    );
                                    
                                    //Optionally, you can choose one of the above columns to be the default sorting option.
                                    // If you don't want this, please delete or hide the entire array.
                                    $function_table['default ordering']
                                    = array(
                                        'column' => 'messys_mes_date_created', // Colum name. In the example, "email" or "id".
                                        'direction' => 'DESC' // ASC or DESC
                                    );
                                    
                                }
                                #Headings and sorting (close)
                                
                                #Pagination (open)
                                if(1==1){
                                    
                                    // If the table doesn't have a lot of space, you can make the pagination "thin". Then, the "first page", "previous page", "items per page",
                                    // "next page" and "last page" buttons will aligned vertically, instead of horizontally -> they will be slimmer.
                                    $function_table['thin_pagination'] = "yes"; // "yes" or "no" (default)
                                }
                                #Pagination (close)
                                
                                #Display a message if no data available (open)
                                if(1==1){
                                    
                                    // Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
                                    // Here, you can modify this message.
                                    
                                    #$function_table['no_items_available_message'] = array(
                                    #    'lines' => "no" // Should a line be displayed left and right of the messsage? Not important, just looks nice. "no" or "yes" (default).
                                    #    ,'content' => "none" // Any text (will be displayed) or "none" (no text will be displayed). Default: "There are currently no items available."
                                    #);
                                    
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
                                
                                #1 (open)
                                if(1==1){
                                    
                                    #preparation (open)
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
                                                
                                                $function_profileLink['id'] = $function_table['data'][$abs]['messys_mes_author']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
                                        
                                        #function-timezone.php (v1.0) (open)
                                        if(1==1){
                                            $function_timezone = $function_table['data'][$abs]['messys_mes_date_created'];
                                            $function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
                                            //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                            //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
                                            include('#function-timezone.php');
                                            #output:
                                            $date = $function_timezone;
                                            
                                            $function_timezone = $function_table['data'][$abs]['messys_mes_date_created'];
                                            $function_timezone_format = "time (hour min)";
                                            include('#function-timezone.php');
                                            #output:
                                            $time = $function_timezone;
                                        }
                                        #function-timezone.php (v1.0) (close)
                                        
                                        #function-file-icons.php (v1.0) (open)
                                        if(1==1){
                                            $attachments_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM fi4l3fg_voluno_files
                                                            WHERE vol_file_type_general = "message"
                                                                AND vol_file_type_specific = "attachment"
                                                                AND vol_file_type_id = %d
                                                                AND vol_file_type_specific_id = %d;'
                                                                ,$conversation_id
                                                                ,$function_table['data'][$abs]['messys_mes_id']);
                                            $attachments_results = $GLOBALS['wpdb']->get_results($attachments_query);
                                            $function_file_icons = $attachments_results; //array of fi4l3fg_voluno_files rows
                                            #$function_file_icons_delete_option = "yes"; //default:no. deleted files are save in span with class: function_file_icons_deleted_files_ids "4,59"
                                            include("#function-file-icons.php");
                                            #output: $function_file_icons;
                                        }
                                        #function-file-icons.php (v1.0) (close)
                                        
                                    }
                                    #preparation (close)
                                    
                                    #content (open)
                                    if(1==1){
                                        
                                        $function_table['table rows'] .= '
                                        <td>
                                            <table>
                                                <tr>
                                                    <td style="font-weight:bold;">
                                                    '.$function_profileLink['name_link'].'
                                                    </td>
                                                    <td style="text-align:right;">
                                                    '.$date.', '.$time.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="text-align:justify;">
                                                    <p>
                                                        '.$function_table['data'][$abs]['messys_mes_content'].'
                                                    </p>
                                                    '.$function_file_icons.'
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>';
                                        
                                    }
                                    #content (close)
                                    
                                }
                                #1 (close)
                                
                                $function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
                            } //Don't touch this. 
                            #Cells/Columns (close)
                            
                        }
                        #design (close)
                        
                        $function_table['part'] = 2; //Don't touch this. 
                        include("#function-table.php"); //Don't touch this. 
                        
                        #output
                        //the entire output is stored in the following variable:
                        echo $function_table['output table'];
                        
                    }
                    #function-table.php (v1.0) (close)
                    
                echo '
                </div>';
                
            }
            #message rows (close)
            
        }
        #content (close)
        
    echo '
    </div>';    
}
#part: specific conversation (right side of container) (close)

#part: select conversation partners (this gets loaded when you change conversation partners... to save resources) (open)
elseif($page_section == "conversation partners"){ #<-- see wordpress post page, i defined $messages_system_page_part there
    echo '
    <div id="voluno_content">
        <select name="conversation_partners[]" multiple>';
            
            $all_contacts_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                 FROM fi4l3fg_voluno_personal_settings
                                                    LEFT JOIN fi4l3fg_voluno_users_extended
                                                    ON pers_settings_value = usersext_id
                                                 WHERE pers_settings_general = %s
                                                 AND pers_settings_specific = %s
                                                 AND pers_settings_user_id = %s
                                                 ORDER BY usersext_displayName
                                                 ;',
                                                 "contact",
                                                 "not blocked",
                                                 $GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
            $all_contacts_results = $GLOBALS['wpdb']->get_results($all_contacts_query);
            foreach($all_contacts_results as $all_contacts_row){
                echo '
                <option value="'.$all_contacts_row->pers_settings_value.'">'.$all_contacts_row->usersext_displayName.'</option>
                ';
            }
        echo '
        </select>
    </div>';
}
#part: select conversation partners (this gets loaded when you change conversation partners... to save resources) (open)

#search for new contacts (open)
elseif($page_section == "search for new contacts"){
    
    $search_terms = rawurldecode($_GET['search_content']);
    $search_terms_array = preg_split('/\s+/', $search_terms);
    
    for($ada=0;$ada<count($search_terms_array);$ada++){
        
        $search_for_new_contacts_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_users_extended
                                                        WHERE usersext_displayName LIKE "%%%s%%"
                                                            AND status = ""
                                                        LIMIT 100;'
                                                        ,$search_terms_array[$ada]);
        $search_for_new_contacts_results = $GLOBALS['wpdb']->get_results($search_for_new_contacts_query);
        
        for($adb=0;$adb<count($search_for_new_contacts_results);$adb++){
        
        $search_for_new_contacts_array_id[] = $search_for_new_contacts_results[$adb]->usersext_id;
        $search_for_new_contacts_array_display_name[] = $search_for_new_contacts_results[$adb]->usersext_displayName;
        }
        
    }

    $search_for_new_contacts_array_id = array_unique($search_for_new_contacts_array_id);
    $search_for_new_contacts_array_display_name = array_unique($search_for_new_contacts_array_display_name);
    
    echo '
    <div class="search_execution_area" style="background-color:#fff;height:280px;overflow:auto;vertical-align:middle;">';
        
        #if at least one member was found (open)
        if(!empty($search_for_new_contacts_array_display_name)){
            
            #loop (open)
            for($ada=0;$ada<count($search_for_new_contacts_array_display_name);$ada++){
                
                #preparation (open)
                if(1==1){
                    
                    #function-image-processing.php (v1.0) (open)
                    if(1==1){
                        #profile picture
                            $function_propic__type = "profile picture";
                            $function_propic__user_id = $search_for_new_contacts_array_id[$ada];
                        #all
                            $function_propic__geometry = array(50,NULL); //optional, if e.g. only width: 300, NULL; vice versa
                        include('#function-image-processing.php');
                        # $function_propic;
                        #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                    }
                    #function-image-processing.php (v1.0) (close)
                    
                }
                #preparation (close)
                
                #content (open)
                if(1==1){
                    
                    echo '
                    <table class="search_items">
                            <tr>
                                <td style="width:50px;">
                                    <img
                                        src="'.$function_propic.'"
                                        style="vertical-align:middle;border:1px solid black;border-radius:10px;"
                                        class="voluno_brighter_on_hover"
                                    >
                                </td>
                                <td style="vertical-align:middle;">
                                    <p class="new_contact_display_name">
                                        '.$search_for_new_contacts_array_display_name[$ada].'
                                    </p>
                                    <span class="new_contact_id" style="display:none;">'.
                                        $search_for_new_contacts_array_id[$ada].
                                    '</span>
                                </td>
                            </tr>
                    </table>';
                    
                }
                #content (close)
                
            }
            #loop (close)
            
        }
        #if at least one member was found (close)
        
        #if no members were found (open)
        else{
            
            echo '
            <div style="padding:30px;margin-top:20px;">
                <p>
                    There are no members that match your search terms.
                </p>
            </div>';
            
        }
        #if no members were found (close)
        
    echo '
    </div>';
    
}
#search for new contacts (close)

?>
















