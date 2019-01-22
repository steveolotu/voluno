<?php

#author and conversation: get / sanitize and create conversation code (open)
if(1==1){
    
    #function-sanitize-text.php (v1.0) (open)
    if($function_add_new_message__message_sanitization != "none"){
        
        if(empty($function_add_new_message__message_sanitization)){
            $function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
        }else{
            $function_sanitize_text__type = $function_add_new_message__message_sanitization;
        }
        /*
         *one line unformatted text (city, name, occupation, etc.)
         *url readable text (url, user_nicename, etc.) (sanitize_title)
         *email address
         *plain text with line breaks (biography)
        */
        $function_sanitize_text__text = $function_add_new_message__message_content;
        include('#function-sanitize-text.php');
        $function_add_new_message__message_content = $function_sanitize_text__text_sanitized;
        
    }
    #function-sanitize-text.php (v1.0) (close)
    
    #author (open)
    if(empty($function_add_new_message__messsage_author)){
        
        $function_add_new_message__messsage_author = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
        
    }else{
        
        $function_add_new_message__messsage_author = intval($function_add_new_message__messsage_author);
        
    }
    #author (close)
    
    #prepare and sanitize array (open)
    if(1==1){
        
        #turn whatever it is into an array (open)
        if(1==1){
            
            $function_add_new_message__partner_id_array = explode(",",$function_add_new_message__partner_id_array);
            
            $function_add_new_message__partner_id_array[] = $function_add_new_message__messsage_author;
            
        }
        #turn whatever it is into an array (close)
        
        #make sure all values are valid + limit recipients (open)
        if(1==1){
            
            #remove all deleted or paused users (open)
            if(1==1){
                
                #get all valid users (open)
                if(empty($function_add_new_message__all_valid_users_results_array)){
                    
                    $function_add_new_message__valid_users_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                    FROM fi4l3fg_voluno_users_extended
                                                                                    WHERE status = "";');
                    $function_add_new_message__valid_users_results = $GLOBALS['wpdb']->get_results($function_add_new_message__valid_users_query);
                    
                    for($afk=0;$afk<count($function_add_new_message__valid_users_results);$afk++){
                        
                        $function_add_new_message__all_valid_users_results_array[] = $function_add_new_message__valid_users_results[$afk]->usersext_id;
                        
                    }
                }
                #get all valid users (close)
                
                $function_add_new_message__partner_id_array_temp = $function_add_new_message__partner_id_array;
                unset($function_add_new_message__partner_id_array);
                
                for($afk=0;$afk<count($function_add_new_message__partner_id_array_temp);$afk++){
                    if(in_array($function_add_new_message__partner_id_array_temp[$afk],$function_add_new_message__all_valid_users_results_array)){
                        $function_add_new_message__partner_id_array[] = $function_add_new_message__partner_id_array_temp[$afk];
                    }
                }
                
            }
            #remove all deleted or paused users (close)
            
            $function_add_new_message__partner_id_array = array_values(array_unique($function_add_new_message__partner_id_array));
            
            if(empty($function_add_new_message__max_recipients)){
                $function_add_new_message__max_recipients = 10;
            }
            
            unset($function_add_new_message__partner_id_array_valid);
            for($adf=0;$adf<count($function_add_new_message__partner_id_array);$adf++){
                
                if($function_add_new_message__partner_id_array[$adf] > 0
                    AND
                    is_numeric($function_add_new_message__partner_id_array[$adf])
                    AND ($adf <= $function_add_new_message__max_recipients
                        OR
                        $function_add_new_message__max_recipients == "unlimited"
                    )
                ){
                    
                    $function_add_new_message__partner_id_array_valid[] = $function_add_new_message__partner_id_array[$adf];
                    
                }
                
            }
            
        }
        #make sure all values are valid + limit recipients (close)
        
        #create string -> partner_id_string (open)
        if(1==1){
            
            sort($function_add_new_message__partner_id_array_valid);
            
            $function_add_new_message__conversation_code = implode(",",$function_add_new_message__partner_id_array_valid);
            
        }
        #create string -> partner_id_string (close)
        
    }
    #prepare and sanitize array (close)
    
}
#author and conversation: get / sanitize and create conversation code (close)

#create new conversation or find current (open)
if(1==1){

    #does conversation exist? (open)
    if(1==1){
        
        $does_conversation_exist_query = $GLOBALS['wpdb']->prepare('SELECT *
                                        FROM fi4l3fg_voluno_message_system_conversations
                                        WHERE messys_con_code = %s;',
                                        $function_add_new_message__conversation_code);
        $does_conversation_exist_row = $GLOBALS['wpdb']->get_row($does_conversation_exist_query);
        
    }
    #does conversation exist? (close)
    
    #else: add new conversation (open)
    if(empty($does_conversation_exist_row)){
        
        #user can't start a new conversation if other users have blocked him (open) stevesteve
        if(2==1){
        foreach($function_add_new_message__partner_id_array as $function_add_new_message__partner_id_value){
            $have_other_conversation_partners_blocked_user_query = $GLOBALS['wpdb']->prepare(
                            'SELECT *
                            FROM fi4l3fg_voluno_personal_settings
                            WHERE pers_settings_general = "contact"
                                AND pers_settings_general = "blocked"
                                AND (
                                            (pers_settings_value = %s AND pers_settings_user_id = %s)
                                        OR
                                            (pers_settings_value = %s AND pers_settings_user_id = %s)
                                    )
                            ;'
                            ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                            ,$function_add_new_message__partner_id_value
                            ,$function_add_new_message__partner_id_value
                            ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
            $have_other_conversation_partners_blocked_user_query_row
                = $GLOBALS['wpdb']->get_row($have_other_conversation_partners_blocked_user_query);
            if(!empty($have_other_conversation_partners_blocked_user_query_row)){
                $function_add_new_message__user_allowed_to_start_this_conversation = "no";
            }
        }
        }
        #user can't start a new conversation if other users have blocked him (close)
        
        #add conversation (open)
        if(1==1){
            
            $GLOBALS['wpdb']->insert(
                    'fi4l3fg_voluno_message_system_conversations', 
            array(
                    'messys_con_last_author' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                    ,'messys_con_code' => $function_add_new_message__conversation_code
                    ,'messys_con_date_modified' => date("Y-m-d H:i:s")
                    ,'messys_con_date_created' => date("Y-m-d H:i:s")
                ),
            array(
                    '%s'
                    ,'%s'
                    ,'%s'
                    ,'%s'
                ));
            
        }
        #add conversation (close)
        
    }
    #else: add new conversation (close)
    
    #conversation id (open)
    if(empty($does_conversation_exist_row)){
        
        $function_add_new_message__conversation_id = $GLOBALS['wpdb']->insert_id;
        
    }else{
        
        $function_add_new_message__conversation_id = $does_conversation_exist_row->messys_con_id;
        
    }
    #conversation id (close)
    
}
#create new conversation or find current (close)

#add new message (open)
if(1==1){
    
    $GLOBALS['wpdb']->insert(
                    'fi4l3fg_voluno_message_system_messages',
            array(
                    'messys_mes_content' => $function_add_new_message__message_content
                    ,'messys_mes_author' => $function_add_new_message__messsage_author
                    ,'messys_mes_conversation' => $function_add_new_message__conversation_id
                    
                    ,'messys_mes_date_modified' => date("Y-m-d H:i:s")
                    ,'messys_mes_date_created' => date("Y-m-d H:i:s")
                ),
            array(
                    '%s','%s','%d'
                    ,'%s','%s','%s'
                ));
    
    $function_add_new_message__internal['message_id'] = $GLOBALS['wpdb']->insert_id;
    
}
#add new message (close)

#update conversation (open)
if(1==1){
    $GLOBALS['wpdb']->update(
                'fi4l3fg_voluno_message_system_conversations',
        array( //updated content
                'messys_con_last_message' => $function_add_new_message__internal['message_id'],
                'messys_con_date_modified' => date("Y-m-d H:i:s"),
                'messys_con_date_created' => date("Y-m-d H:i:s")
        ), 
        array( //location of updated content
                'messys_con_id' => $function_add_new_message__conversation_id,
        ), 
        array( //format of updated content
                '%d','%s','%s'
        ), 
        array( //format of location of updated content
                '%d'
            ));
}
#update conversation (open)

#update / insert partners (open)
for($ade=0;$ade<count($function_add_new_message__partner_id_array_valid);$ade++){
    
    #insert (open)
    if(empty($does_conversation_exist_row)){
        
        $GLOBALS['wpdb']->insert(
                        'fi4l3fg_voluno_message_system_partners',
                array(
                        'messys_par_user' => $function_add_new_message__partner_id_array_valid[$ade]
                        ,'messys_par_read' => ""
                        
                        ,'messys_par_conversation' => $function_add_new_message__conversation_id
                        ,'messys_par_date_modified' => date("Y-m-d H:i:s")
                        ,'messys_par_date_created' => date("Y-m-d H:i:s")
                    ),
                array(
                        '%s','%s'
                        ,'%d','%s','%s'
                    ));
        
    }
    #insert (close)
    
    #update (open)
    else{
        
        $GLOBALS['wpdb']->update(
                    'fi4l3fg_voluno_message_system_partners',
            array( //updated content
                    'messys_par_read' => ""
                    ,'messys_par_date_modified' => date("Y-m-d H:i:s")
            ), 
            array( //location of updated content
                    'messys_par_user' => $function_add_new_message__partner_id_array_valid[$ade]
                    ,'messys_par_conversation' => $function_add_new_message__conversation_id
            ), 
            array( //format of updated content
                    '%s','%s'
            ), 
            array( //format of location of updated content
                    '%s','%d'
                ));
        
    }
    #update (close)
    
}
#update / insert partners (open)

#send email (open)
if(1==1){
    
    #author name query (open)
    if(1==1){
        $function_add_new_message__internal['message_author_display_name_query']
            = $GLOBALS['wpdb']->prepare('SELECT *
                            FROM fi4l3fg_voluno_users_extended
                            WHERE usersext_id = %s;'
                            ,$function_add_new_message__messsage_author);
            
        $function_add_new_message__internal['message_author_display_name_row']
            = $GLOBALS['wpdb']->get_row($function_add_new_message__internal['message_author_display_name_query']);
    }
    #author name query (close)
    
    #loop (open)
    for($ady=0;$ady<count($function_add_new_message__partner_id_array_valid);$ady++){
        
        #exclude author (open)
        if($function_add_new_message__partner_id_array_valid[$ady] != $function_add_new_message__messsage_author){
            
            #message partner name query (open)
            if(1==1){
                $function_add_new_message__internal['message_partner_display_name_query']
                    = $GLOBALS['wpdb']->prepare('SELECT *
                                    FROM fi4l3fg_voluno_users_extended
                                    WHERE usersext_id = %s
                                        AND status != "deleted";'
                                    ,$function_add_new_message__partner_id_array_valid[$ady]);
                $function_add_new_message__internal['message_partner_display_name_row']
                    = $GLOBALS['wpdb']->get_row($function_add_new_message__internal['message_partner_display_name_query']);
            }
            #message partner name query (close)
            
            #get attachment names to include in email (open)
            if(1==1){
                
                unset($function_add_new_message__attachments_final);
                
                for($aeo=0;$aeo<count($function_add_new_message__attachments);$aeo++){
                    
                    if($aeo == 0){
                        if(count($function_add_new_message__attachments) == 1){
                            $function_add_new_message__attachments_final = '
                            <p>
                            - - - - - - - - - -
                            </p>
                            <p style="font-weight:bold;">
                            '.count($function_add_new_message__attachments).' attachment:
                            </p>
                            <ul>';
                        }else{
                            $function_add_new_message__attachments_final = '
                            <p>
                            - - - - - - - - - -
                            </p>
                            <p style="font-weight:bold;">
                            '.count($function_add_new_message__attachments).' attachments:
                            </p>
                            <ul>';
                        }
                    }
                    
                    $function_add_new_message__attachments_final .= '<li>'.$function_add_new_message__attachments[$aeo].'</li>';
                    
                    if($aeo + 1 == count($function_add_new_message__attachments)){
                        $function_add_new_message__attachments_final .= '</ul>
                        <p>To view attachments, please login.</p>';
                    }
                }
                
                if(empty($function_add_new_message__attachments_final)){
                    $function_add_new_message__attachments_final = " ";
                }
                
            }
            #get attachment names to include in email (open)
            
            #function-emails.php (v1.0) (open)
            if(1==1){
                $function_admin_emails['recipient_id_or_email_address'] = $function_add_new_message__partner_id_array_valid[$ady];
                    //finds email address, default is steve's id (1). also accepts mail addresse
                $function_admin_emails['email_content_id'] = 2; //please select id
                $function_admin_emails['placeholders'] =
                array(
                    array(
                        'ph_name' => 'sender_name',
                        'ph_value' => $function_add_new_message__internal['message_author_display_name_row']->usersext_displayName
                    ),
                    array(
                        'ph_name' => 'recipient_name',
                        'ph_value' => $function_add_new_message__internal['message_partner_display_name_row']->usersext_displayName
                    ),
                    array(
                        'ph_name' => 'message_content',
                        'ph_value' => $function_add_new_message__message_content
                    ),
                    array(
                        'ph_name' => 'message_attachments',
                        'ph_value' => $function_add_new_message__attachments_final
                    ),
                    array(
                        'ph_name' => 'conversation_url',
                        'ph_value' => get_permalink(696).'?conversation_id='.$_GET['conversation_id']
                    )
                    
                );
                include('#function-emails.php');
            }
            #function-emails.php (v1.0) (close)
            
        }
        #exclude author (close)
        
    }
    #loop (close)
    
}
#send email (close)

#add conversation partners as contacts (open)
for($aew=0;$aew<count($function_add_new_message__partner_id_array_valid);$aew++){
    
    #function-contact-add-remove.php (v1.0) (open)
    if(1==1){
        $function_contact_add_remove['active_user'] = $function_add_new_message__messsage_author;
        $function_contact_add_remove['passive_user'] = $function_add_new_message__partner_id_array_valid[$aew]; //only one allowed.
        $function_contact_add_remove['action'] = "add"; //'add' or 'remove'
        $function_contact_add_remove['type'] = "message"; //optional: message, else empty (looks up user settings regarding messages)
        include('#function-contact-add-remove.php');
    }
    #function-contact-add-remove.php (v1.0) (close)
    
}
#add conversation partners as contacts (close)

#output (open)
if(1==1){
    $function_add_new_message['conversation_id'] = $function_add_new_message__conversation_id;
    $function_add_new_message['message_id'] = $function_add_new_message__internal['message_id'];
}
#output (close)

#unset (open)
if(1==1){
    
    unset(
        
        $function_add_new_message__internal,
        
        //old stevesteve
        $function_add_new_message__user_allowed_to_start_this_conversation
        ,$function_add_new_message__partner_id_array
        ,$function_add_new_message__conversation_id_name
        ,$function_add_new_message__admin_message_code
        
        
        
        
        ,$function_add_new_message__max_recipients
    );
    
}
#unset (close)

?>