<?php

#info (open)
if(0==0){
    
    /*
    this function:
    - turns a notifications template into a real notification
    
    see https://www.volunteerne        tworkfordevelopment.org/voluno/archives/staff-net-page/internal-work?section=website_admin
    
    $function_notifications__
    placeholder1426579346509329

*/
    
}
#info (close)

#page decision (open)
if(1==2){
    
    if(get_the_ID() == 834){
        if(empty($function_notifications['function_part'])){
            $function_notifications__page_section = "sidebar-popup -> mark notifications as seen";
        }
        //making sure that it's only loaded once when loading the "mysql update read notifs"-page
    }elseif($function_notifications['function_part'] == "sidebar-top -> notifications counter"){
        $function_notifications__page_section = "sidebar-top -> notifications counter";
    }elseif($function_notifications['function_part'] == "sidebar-popup -> notifications popup"){
        $function_notifications__page_section = "sidebar-popup -> notifications popup";
    }elseif($function_notifications['function_part'] == "add notification"){
        $function_notifications__page_section = "add notification";
    }elseif($function_notifications['function_part'] == "item-page -> mark notification as read"){
        $function_notifications__page_section = "item-page -> mark notification as read";
    }
    
}
#page decision (close)

#add new notification (open)
if($function_notifications__page_section == 'add notification'){
    
    #get notification (open)
    if(1==1){
        
        $function_notifications__query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_lists_notifications
                                                        WHERE list_notif_id = %d;'
                                                        ,$function_notifications['notification_template_id']);
        $function_notifications__row = $GLOBALS['wpdb']->get_row($function_notifications__query);
        
    }
    #get notification (close)
    
    #loop (open)
    for($adl=0;$adl<count($function_notifications['users_that_receive_notification']);$adl++){
        
        #check for previous notifications (open)
        if(1==1){
            
            #$function_notifications__previous_notifs__query (open)
            if(1==1){
                $function_notifications__previous_notifs__query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                FROM fi4l3fg_voluno_notifications
                                                                WHERE notif_user = %s
                                                                    AND notif_status = "unread"
                                                                    AND notif_template = %d
                                                                    
                                                                    AND notif_type_name1 = %s
                                                                    AND notif_type_name2 = %s
                                                                    AND notif_type_name3 = %s
                                                                    
                                                                    AND notif_type_id1 = %d
                                                                    AND notif_type_id2 = %d
                                                                    AND notif_type_id3 = %d
                                                                ;'
                                                                ,$function_notifications['users_that_receive_notification'][$adl]
                                                                ,$function_notifications['notification_template_id']
                                                                
                                                                ,$function_notifications__row->list_notif_type_name1
                                                                ,$function_notifications__row->list_notif_type_name2
                                                                ,$function_notifications__row->list_notif_type_name3
                                                                
                                                                ,$function_notifications['type_id'][0]
                                                                ,$function_notifications['type_id'][1]
                                                                ,$function_notifications['type_id'][2]
                                                                );
                $function_notifications__previous_notifs__row = $GLOBALS['wpdb']->get_row($function_notifications__previous_notifs__query);
            }
            #$function_notifications__previous_notifs__query (close)
            
            if(empty($function_notifications__previous_notifs__row)){
                $function_notifications__previous_notifs = "case 1: no previous notifications";
            }else{
                
                #get previous notification placeholder count values (only count variables, like user id) (open)
                if(1==1){
                    $function_notifications__previous_notifs_properties__query
                                  = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_notifications_properties
                                                    WHERE notif_prop_notif_id = %d
                                                        AND notif_prop_placeholder_name = %s;',
                                                    $function_notifications__previous_notifs__row->notif_id,
                                                    $function_notifications['count_notifications_by_this_placeholder']
                                                  );
                    $function_notifications__previous_notifs_properties__results
                                      = $GLOBALS['wpdb']->get_results($function_notifications__previous_notifs_properties__query);
                }
                #get previous notification placeholder count values (only count variables, like user id) (close)
                
                #get the count value (e.g. user ids) of previous notifs into an array (open)
                if(1==1){
                    unset($function_notifications__previous_notifs_array);
                    echo '<br>count: '.count($function_notifications__previous_notifs_properties__results).'<br>';
                    for($adq=0;$adq<count($function_notifications__previous_notifs_properties__results);$adq++){
                        
                        $function_notifications__previous_notifs_array[]
                        = $function_notifications__previous_notifs_properties__results[$adq]->notif_prop_placeholder_value;
                        
                    }
                }
                #get the count value (e.g. user ids) of previous notifs into an array (close)
                
                #get the current count value (open)
                if(1==1){
                    for($adr=0;$adr<count($function_notifications['placeholders']);$adr++){
                        if($function_notifications['placeholders'][$adr]['name'] == $function_notifications['count_notifications_by_this_placeholder']){
                            $function_notifications__current_notif_value = $function_notifications['placeholders'][$adr]['value'];
                        }
                    }
                }
                #get the current count value (close)
                
                #determine cases (open)
                if(!in_array($function_notifications__current_notif_value,$function_notifications__previous_notifs_array)){
                    echo '<br>function_notifications__current_notif_value: '.$function_notifications__current_notif_value;
                    echo '<br>function_notifications__previous_notifs_array: ';
                    var_dump($function_notifications__previous_notifs_array);
                    echo '<br>';
                    if(count($function_notifications__previous_notifs_array) == 1){
                        $function_notifications__previous_notifs = "case 2: 1 previous notification";
                    }else{
                        $function_notifications__previous_notifs = "case 3: 2 or more previous notifications";
                    }
                    
                }
                #determine cases (close)
                
            }
            
        }
        #check for previous notifications (close)
        
        #case 1 (open)
        if($function_notifications__previous_notifs == "case 1: no previous notifications"){
            
            #add placeholders (open)
            if(1==1){
                
                $function_notifications__text = $function_notifications__row->list_notif_text1;
                
                for($adk=0;$adk<count($function_notifications['placeholders']);$adk++){
                    $function_notifications__text
                        = str_replace(
                            'placeholder1426579346509329'.$function_notifications['placeholders'][$adk]['name']
                            ,$function_notifications['placeholders'][$adk]['value'],
                            $function_notifications__text
                        );
                }
                
            }
            #add placeholders (close)
            
            #add notification (open)
            if(1==1){
                
                #database query insert - notification (open)
                if(1==1){
                    $GLOBALS['wpdb']->insert(
                                    'fi4l3fg_voluno_notifications',
                            array(
                                    'notif_text' => $function_notifications__text
                                    ,'notif_link' => $function_notifications['link']
                                    ,'notif_title' => $function_notifications['title']
                                    
                                    ,'notif_template' => $function_notifications['notification_template_id']
                                    
                                    ,'notif_type_name1' => $function_notifications__row->list_notif_type_name1
                                    ,'notif_type_name2' => $function_notifications__row->list_notif_type_name2
                                    ,'notif_type_name3' => $function_notifications__row->list_notif_type_name3
                                    ,'notif_type_id1' => $function_notifications['type_id'][0]
                                    ,'notif_type_id2' => $function_notifications['type_id'][1]
                                    ,'notif_type_id3' => $function_notifications['type_id'][2]
                                    
                                    ,'notif_user' => $function_notifications['users_that_receive_notification'][$adl]
                                    ,'notif_status' => 'unread'
                                    #,'notif_email_sent' => 
                                    
                                    ,'notif_date_modified' => date("Y-m-d H:i:s")
                                    ,'notif_date_created' => date("Y-m-d H:i:s")
                                ),
                            array(
                                    '%s','%s','%s'
                                    ,'%d'
                                    ,'%s','%s','%s'
                                    ,'%d','%d','%d'
                                    ,'%s','%s'
                                    ,'%s','%s'
                                ));
                    $function_notifications__notification_id = $GLOBALS['wpdb']->insert_id;
                }
                #database query insert - notification (close)
                
                #database query insert - properties (open)
                for($adp=0;$adp<count($function_notifications['placeholders']);$adp++){
                    $GLOBALS['wpdb']->insert(
                                    'fi4l3fg_voluno_notifications_properties',
                            array(
                                    'notif_prop_notif_id' => $function_notifications__notification_id,
                                    
                                    'notif_prop_placeholder_name' => $function_notifications['placeholders'][$adp]['name'],
                                    'notif_prop_placeholder_value' => $function_notifications['placeholders'][$adp]['value'],
                                    'notif_prop_date_modified' => date("Y-m-d H:i:s"),
                                    'notif_prop_date_created' => date("Y-m-d H:i:s"),
                                ),
                            array(
                                    '%d',
                                    '%s','%s','%s','%s',
                                ));
                    
                    #statistical placeholder variables (open)
                    if($adp + 1 == count($function_notifications['placeholders'])){
                        
                        #total_number_of_count_values (open)
                        if(1==1){
                            $GLOBALS['wpdb']->insert(
                                            'fi4l3fg_voluno_notifications_properties',
                                    array(
                                            'notif_prop_notif_id' => $function_notifications__notification_id,
                                            
                                            'notif_prop_placeholder_name' => 'total_number_of_count_values',
                                            'notif_prop_placeholder_value' => count($function_notifications__previous_notifs_array),
                                            'notif_prop_date_modified' => date("Y-m-d H:i:s"),
                                            'notif_prop_date_created' => date("Y-m-d H:i:s"),
                                        ),
                                    array(
                                            '%d',
                                            '%s','%s','%s','%s',
                                        ));
                        }
                        #total_number_of_count_values (close)
                        
                        #total_number_plus_one_of_count_values (open)
                        if(1==1){
                            $GLOBALS['wpdb']->insert(
                                            'fi4l3fg_voluno_notifications_properties',
                                    array(
                                            'notif_prop_notif_id' => $function_notifications__notification_id,
                                            
                                            'notif_prop_placeholder_name' => 'total_number_plus_one_of_count_values',
                                            'notif_prop_placeholder_value' => count($function_notifications__previous_notifs_array) + 1,
                                            'notif_prop_date_modified' => date("Y-m-d H:i:s"),
                                            'notif_prop_date_created' => date("Y-m-d H:i:s"),
                                        ),
                                    array(
                                            '%d',
                                            '%s','%s','%s','%s',
                                        ));
                        }
                        #total_number_plus_one_of_count_values (close)
                        
                    }
                    #statistical placeholder variables (close)
                    
                }
                #database query insert - properties (close)
                
            }
            #add notification (close)
            
        }
        #case 1 (close)
        
        #case 2 (open)
        if($function_notifications__previous_notifs == "case 2: 1 previous notification"){
            
            #add placeholders (open)
            if(1==1){
                
                $function_notifications__text = $function_notifications__row->list_notif_text2;
                
                #user given placeholders
                for($adk=0;$adk<count($function_notifications['placeholders']);$adk++){
                    $function_notifications__text
                        = str_replace(
                            'placeholder1426579346509329'.$function_notifications['placeholders'][$adk]['name']
                            ,$function_notifications['placeholders'][$adk]['value'],
                            $function_notifications__text
                        );
                }
                
                #get ALL previous notification placeholders (open)
                if(1==1){
                    $function_notifications__previous_notifs_properties__query
                                  = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_notifications_properties
                                                    WHERE notif_prop_notif_id = %d;',
                                                    $function_notifications__previous_notifs__row->notif_id
                                                  );
                    $function_notifications__previous_notifs_properties__results
                                      = $GLOBALS['wpdb']->get_results($function_notifications__previous_notifs_properties__query);
                }
                #get ALL previous notification placeholders (close)
                
                #mysql placeholders from previous query
                for($adk=0;$adk<count($function_notifications__previous_notifs_properties__results);$adk++){
                    $function_notifications__text
                        = str_replace(
                            'placeholder_internal1426579346509329'.
                            $function_notifications__previous_notifs_properties__results[$adk]->notif_prop_placeholder_name
                            ,$function_notifications__previous_notifs_properties__results[$adk]->notif_prop_placeholder_value,
                            $function_notifications__text
                        );
                }
                
            }
            #add placeholders (close)
            
            #add notification (open)
            if(1==1){
                
                #database query update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_notifications',
                            array( //updated content
                                    'notif_text' => $function_notifications__text
                            ),
                            array( //location of updated content
                                    'notif_id' => $function_notifications__previous_notifs__row->notif_id
                            ),
                            array( //format of updated content
                                    '%s'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #database query update (close)
                
                #database query insert - properties (open)
                for($adp=0;$adp<count($function_notifications['placeholders']);$adp++){
                    $GLOBALS['wpdb']->insert(
                                    'fi4l3fg_voluno_notifications_properties',
                            array(
                                    'notif_prop_notif_id' => $function_notifications__previous_notifs__row->notif_id,
                                    
                                    'notif_prop_placeholder_name' => $function_notifications['placeholders'][$adp]['name'],
                                    'notif_prop_placeholder_value' => $function_notifications['placeholders'][$adp]['value'],
                                    'notif_prop_date_modified' => date("Y-m-d H:i:s"),
                                    'notif_prop_date_created' => date("Y-m-d H:i:s"),
                                ),
                            array(
                                    '%d',
                                    '%s','%s','%s','%s',
                                ));
                    
                    #statistical placeholder variables (open)
                    if($adp + 1 == count($function_notifications['placeholders'])){
                        
                        #total_number_of_count_values (open)
                        if(1==1){
                            $GLOBALS['wpdb']->update(
                                            'fi4l3fg_voluno_notifications_properties',
                                    array(
                                            'notif_prop_placeholder_value' => count($function_notifications__previous_notifs_array)
                                        ),
                                    array(
                                            'notif_prop_notif_id' => $function_notifications__previous_notifs__row->notif_id,
                                            'notif_prop_placeholder_name' => 'total_number_of_count_values',
                                        ),
                                    array(
                                            '%d'
                                        ),
                                    array(
                                            '%d','%s'
                                        ));
                        }
                        #total_number_of_count_values (close)
                        
                        #total_number_plus_one_of_count_values (open)
                        if(1==1){
                            $GLOBALS['wpdb']->update(
                                            'fi4l3fg_voluno_notifications_properties',
                                    array(
                                            'notif_prop_placeholder_value' => count($function_notifications__previous_notifs_array) + 1
                                        ),
                                    array(
                                            'notif_prop_notif_id' => $function_notifications__previous_notifs__row->notif_id,
                                            'notif_prop_placeholder_name' => 'total_number_plus_one_of_count_values',
                                        ),
                                    array(
                                            '%d'
                                        ),
                                    array(
                                            '%d','%s'
                                        ));
                        }
                        #total_number_plus_one_of_count_values (close)
                        
                    }
                    #statistical placeholder variables (close)
                    
                }
                #database query insert - properties (close)
                
            }
            #add notification (close)
            
        }
        #case 2 (close)
        
        #case 3 (open)
        if($function_notifications__previous_notifs == "case 3: 2 or more previous notifications"){
            
            #add placeholders (open)
            if(1==1){
                
                $function_notifications__text = $function_notifications__row->list_notif_text3;
                
                #user given placeholders
                for($adk=0;$adk<count($function_notifications['placeholders']);$adk++){
                    $function_notifications__text
                        = str_replace(
                            'placeholder1426579346509329'.$function_notifications['placeholders'][$adk]['name']
                            ,$function_notifications['placeholders'][$adk]['value'],
                            $function_notifications__text
                        );
                }
                
                #get ALL previous notification placeholders (open)
                if(1==1){
                    $function_notifications__previous_notifs_properties__query
                                  = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_notifications_properties
                                                    WHERE notif_prop_notif_id = %d
                                                    ORDER BY notif_prop_date_created DESC;', //desc <-- replace with newest. after all, user given placeholder is also newest.
                                                    $function_notifications__previous_notifs__row->notif_id
                                                  );
                    $function_notifications__previous_notifs_properties__results
                                      = $GLOBALS['wpdb']->get_results($function_notifications__previous_notifs_properties__query);
                }
                #get ALL previous notification placeholders (close)
                
                #mysql placeholders from previous query
                for($adk=0;$adk<count($function_notifications__previous_notifs_properties__results);$adk++){
                    $function_notifications__text
                        = str_replace(
                            'placeholder_internal1426579346509329'.
                            $function_notifications__previous_notifs_properties__results[$adk]->notif_prop_placeholder_name
                            ,$function_notifications__previous_notifs_properties__results[$adk]->notif_prop_placeholder_value,
                            $function_notifications__text
                        );
                }
                
            }
            #add placeholders (close)
            
            #add notification (open)
            if(1==1){
                
                #database query update (open)
                if(1==1){
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_notifications',
                            array( //updated content
                                    'notif_text' => $function_notifications__text
                            ),
                            array( //location of updated content
                                    'notif_id' => $function_notifications__previous_notifs__row->notif_id
                            ),
                            array( //format of updated content
                                    '%s'
                            ),
                            array( //format of location of updated content
                                    '%d'
                                ));
                }
                #database query update (close)
                
                #database query insert - properties (open)
                for($adp=0;$adp<count($function_notifications['placeholders']);$adp++){
                    $GLOBALS['wpdb']->insert(
                                    'fi4l3fg_voluno_notifications_properties',
                            array(
                                    'notif_prop_notif_id' => $function_notifications__previous_notifs__row->notif_id,
                                    
                                    'notif_prop_placeholder_name' => $function_notifications['placeholders'][$adp]['name'],
                                    'notif_prop_placeholder_value' => $function_notifications['placeholders'][$adp]['value'],
                                    'notif_prop_date_modified' => date("Y-m-d H:i:s"),
                                    'notif_prop_date_created' => date("Y-m-d H:i:s"),
                                ),
                            array(
                                    '%d',
                                    '%s','%s','%s','%s',
                                ));
                    
                    #statistical placeholder variables (open)
                    if($adp + 1 == count($function_notifications['placeholders'])){
                        
                        #total_number_of_count_values (open)
                        if(1==1){
                            $GLOBALS['wpdb']->update(
                                            'fi4l3fg_voluno_notifications_properties',
                                    array(
                                            'notif_prop_placeholder_value' => count($function_notifications__previous_notifs_array)
                                        ),
                                    array(
                                            'notif_prop_notif_id' => $function_notifications__previous_notifs__row->notif_id,
                                            'notif_prop_placeholder_name' => 'total_number_of_count_values',
                                        ),
                                    array(
                                            '%d'
                                        ),
                                    array(
                                            '%d','%s'
                                        ));
                        }
                        #total_number_of_count_values (close)
                        
                        #total_number_plus_one_of_count_values (open)
                        if(1==1){
                            $GLOBALS['wpdb']->update(
                                            'fi4l3fg_voluno_notifications_properties',
                                    array(
                                            'notif_prop_placeholder_value' => count($function_notifications__previous_notifs_array) + 1
                                        ),
                                    array(
                                            'notif_prop_notif_id' => $function_notifications__previous_notifs__row->notif_id,
                                            'notif_prop_placeholder_name' => 'total_number_plus_one_of_count_values',
                                        ),
                                    array(
                                            '%d'
                                        ),
                                    array(
                                            '%d','%s'
                                        ));
                        }
                        #total_number_plus_one_of_count_values (close)
                        
                    }
                    #statistical placeholder variables (close)
                }
                #database query insert - properties (close)
                
            }
            #add notification (close)
            
        }
        #case 3 (close)
        
    }
    #loop (close)
    
    #testing (open) #dome
    if(1==2){
        echo '
        <br><br><br><br><br><br><br>
            <a
                href="'.$function_notifications['link'].'"
                title="'.$function_notifications['title'].'"
            >
                <div>
                    '.$function_notifications__text.'
                </div>
                <br>case: '.$function_notifications__previous_notifs.'
                <br>user id: '.$function_notifications['users_that_receive_notification'][0].'
                <br>template id: '.$function_notifications['notification_template_id'].'
                <br>count of count values: '.count($function_notifications__previous_notifs_array).'
                <br>list_notif_type_name1: '.$function_notifications__row->list_notif_type_name1.'
                <br>list_notif_type_name2: '.$function_notifications__row->list_notif_type_name2.'
                <br>list_notif_type_name3: '.$function_notifications__row->list_notif_type_name3.'
                
                <br>type_id0: '.$function_notifications['type_id'][0].'
                <br>type_id1: '.$function_notifications['type_id'][1].'
                <br>type_id2: '.$function_notifications['type_id'][2].'
            </a>
        <br><br><br><br><br><br><br>';
    }
    #testing (close)
    
}
#add new notification (close)

#item-page -> mark notification as read (open)
if($function_notifications__page_section == 'item-page -> mark notification as read' AND 1==2){
    
    #database query update (open)
    if(1==1){
        
        $function_notifications__mark_notif_as_read__update_query = $GLOBALS['wpdb']->update( 
                        'fi4l3fg_voluno_notifications',
                array( //updated content
                        'notif_status' => 'read'
                ),
                array( //location of updated content
                        'notif_user' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                        ,'notif_template' => $function_notifications['notif_template']
                        
                        ,'notif_type_name1' => $function_notifications['notif_type_name'][0]
                        ,'notif_type_name2' => $function_notifications['notif_type_name'][1]
                        ,'notif_type_name3' => $function_notifications['notif_type_name'][2]
                        
                        ,'notif_type_id1' => intval($function_notifications['notif_type_id'][0])
                        ,'notif_type_id2' => intval($function_notifications['notif_type_id'][1])
                        ,'notif_type_id3' => intval($function_notifications['notif_type_id'][2])
                ),
                array( //format of updated content
                        '%s'
                ),
                array( //format of location of updated content
                        '%s','%d'
                        ,'%s','%s','%s'
                        ,'%d','%d','%d'
                    ));
        
    }
    #database query update (close)
    
    #script (open)
    if($function_notifications__mark_notif_as_read__update_query > 0){
        echo '
        <script>
            jQuery(document).ready(function(){
                var function_notifications__old_notifications_number = jQuery(".top_sidebar_notification_number_class").html();
                jQuery(".top_sidebar_notification_number_class")'.
                '.html(function_notifications__old_notifications_number - '.$function_notifications__mark_notif_as_read__update_query.');
            });
        </script>';
    }
    #script (close)
    
    #content (open)
    for($ado=0;$ado<$function_notifications__mark_notif_as_read__update_query;$ado++){
        
        echo '
        <div style="display:none;" class="function_notifications__already_updated_notifications_counter">
        </div>';
        
    }
    #content (close)
    
    unset($function_notifications);
    
}
#item-page -> mark notification as read (close)

#sidebar-top -> show notifications (open)
if($function_notifications__page_section == 'sidebar-top -> notifications counter'){
    
    #script (open)
    if(empty($function_notifications__top_sidebar_only_once)){
        echo '
        <script>
            jQuery(document).ready(function(){
                var function_notifications__update_notifications_only_once = 0;
                jQuery(".top_sidebar_notification_expand_link").click(function(){
                    var function_notifications__notifs_id = [];
                    jQuery(".popup_sidebar_notification_div").fadeToggle(300);
                    
                    if(function_notifications__update_notifications_only_once == 0){
                        function_notifications__update_notifications_only_once = 1;
                        jQuery(".function_notifications__unread_notif_id").each(function(){
                            function_notifications__notifs_id.push(jQuery(this).html());
                        });
                        jQuery(".function_notifications_top_sidebar_mysql_area")'.
                        '.load("'.get_permalink(834).'?read_notifications="+function_notifications__notifs_id, function(){
                            var function_notifications__old_notifications_number = jQuery(".top_sidebar_notification_number_class").html();
                            jQuery(".top_sidebar_notification_number_class")'.
                            '.html(function_notifications__old_notifications_number'.
                            ' - jQuery(".top_sidebar_notification__number_of_seen_ids").html()'.
                            ' + jQuery(".function_notifications__already_updated_notifications_counter").length);
                        });
                    }
                });
            });
        </script>';
    }
    #script (close)
    
    #mysql (open)
    if(empty($function_notifications__top_sidebar_only_once)){
        
        $get_all_notifications_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                      FROM fi4l3fg_voluno_notifications
                                                      WHERE notif_user = %s
                                                          AND notif_status = "unread"
                                                      ORDER BY notif_date_created DESC;'
                                                      ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
        $get_all_notifications_results = $GLOBALS['wpdb']->get_results($get_all_notifications_query);
        
    }
    #mysql (close)
    
    $function_notifications__top_sidebar_only_once = 1;
    
    $function_notifications__top_sidebar_notifications_number = count($get_all_notifications_results);
    $function_notifications__top_sidebar_container_class = 'top_sidebar_notification_expand_link';
    $function_notifications__top_sidebar_notifications_number_class = 'top_sidebar_notification_number_class';
    $function_notifications__top_sidebar_notifications_title = "Click to fade in notifications";
    
}
#sidebar-top -> show notifications (close)

#sidebar-popup -> notifications popup (open)
if($function_notifications__page_section == "sidebar-popup -> notifications popup"){
    
    #preparation (open)
    if(1==1){
        
        #function-fixed-div.php (v1.0) (open)
        if(1==1){
            
            $function_fixed_div_part = 1; //1 or 2, obligatory
            $function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
            $function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
            $function_fixed_div__darkened_bg_fadeout_on_click = "yes";
            $function_fixed_div_div_name = "popup_sidebar_notification_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
            #$function_fixed_div_show_on_load = "yes"; //yes or no, default is no, only relevant for part 1
            $function_fixed_div_border_radius = 25; //optional, default is 0
            #$function_fixed_div_cancel_button = "no"; //optional, default is yes
            #$function_fixed_div__cancel_button__css = "margin-left:20px;margin-top:20px;";
            $function_fixed_div_height_div = "70"; //optional, in percent, default is 50
            $function_fixed_div_text_align = "center"; //optional, default is left
            $function_fixed_div_vertical_scrolling = "no"; //default: empty, scroll bar after inner div maxheight of 400 
            #$function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
            $function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
            include('#function-fixed-div.php');
            $open_fixed_div = $function_fixed_div_display;
        
        #function-fixed-div.php
            $function_fixed_div_part = 2; //1 or 2, both are obligatory
            include('#function-fixed-div.php');
            $close_fixed_div = $function_fixed_div_display;
        
        }    
        #function-fixed-div.php (v1.0) (close)
        
    }
    #preparation (close)
    
    #content (open)
    if(1==1){
        
        echo
        $open_fixed_div.'
            <div style="margin-top:-35px;text-align:center;" class="entry-content">
                <h2 style="display:inline-block;">
                    Notifications
                </h2>
            </div>
            <div style="max-height:300px;padding:0px;overflow:auto;">';
                
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
                                                                                AND notif_status IN ("unread","seen")
                                                                            ORDER BY notif_date_created DESC;'
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
                                    
                                    $function_table['data'][$ajl]['notif_date_created'] = $function_table['results'][$ajl]->notif_date_created;
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
                            
                            $function_table['unique id'] = 'sidebar_popup_unread_notifications_bzzneattjitayyizws';
                            // Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
                            
                            #Options connected to the title (open)
                            if(1==1){
                                
                                #$function_table['display title'] = 'Please add a title.';
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
                                
                                $function_table['hide column headings'] = 'yes';
                                // Hides headings of table. 'yes' or empty (default).
                                
                                // The following multi-dimensional array has the following structure:
                                // - heading = The heading that will be displayed above the respective column.
                                // - width = Optional. With of the respective column. You can either use % or pt.
                                // - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
                                //                    columns names that you used in the 'Raw data' section.
                                //                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were 'email' and 'id'.
                                $function_table['column headings'] 
                                = array(
                                    array(
                                        'heading'		 => '<div class="entry-content"><h4 style="display:inline;color:#fff;">Notifications</h4></div>',
                                        'width'			 => '100%',
                                        'sorting option' => 'email'
                                    )
                                );
                                
                                //Optionally, you can choose one of the above columns to be the default sorting option.
                                // If you don't want this, please delete or hide the entire array.
                                $function_table['default ordering']
                                = array(
                                    'column' => 'notif_date_created', // Colum name. In the example, 'email' or 'id'.
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
                                    ,'content' => 'You do not have any new notifications.' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
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
                                
                                #preparation (open)
                                if(1==1){
                                    
                                    #function-timezone.php (v1.0) (open)
                                    if(1==1){
                                        
                                        $function_timezone = $function_table['data'][$abs]['notif_date_created'];
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
                                    
                                    $function_table['table rows'] .= '
                                    <td>
                                        '.$function_notifications__unread_notification['notif_id'].'
                                        <a
                                            href="'.$function_table['data'][$abs]['notif_link'].'"
                                            title="'.$function_table['data'][$abs]['notif_title'].'"
                                        >
                                            <table
                                                style="
                                                color:#000;
                                                padding:10px 0px;
                                                table-layout:fixed;
                                                word-wrap:break-word;
                                                margin:-10px 0px;
                                                "
                                            >
                                                <tr style="'.$function_notifications__unread_notification['style'].'">
                                                    <td style="padding:left:20px;width:80%;">
                                                        <p>
                                                            '.$function_table['data'][$abs]['notif_text'].'
                                                        </p>
                                                    </td>
                                                    <td style="padding:auto 20px;text-align:right;">
                                                        '.$function_timezone.'
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </td>
                                    ';
                                    
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
                    include('#function-table.php'); //Don't touch this. 
                    
                    #output
                    //the entire output is stored in the following variable:
                    echo $function_table['output table'];
                    
                }
                #function-table.php (v1.0) (close)
                
            echo '
            </div>
            <div style="text-align:center;">
                <a href="'.get_permalink(835).'">
                    <div class="voluno_button">
                        See all (old) notifications
                    </div>
                </a>
            </div>
            <div class="function_notifications_top_sidebar_mysql_area" style="display:none;"></div>
        '.$close_fixed_div;
        
    }
    #content (close)
    
}
#sidebar-popup -> notifications popup (close)

#sidebar-popup -> mark notifications as seen (open)
if($function_notifications__page_section == "sidebar-popup -> mark notifications as seen"){
    
    $function_notifications__read_notifications_ids = explode(",",$_GET['read_notifications']);
    
    for($adm=0;$adm<count($function_notifications__read_notifications_ids);$adm++){
        
        #database query update (open)
        if(1==1){
            $GLOBALS['wpdb']->update( 
                            'fi4l3fg_voluno_notifications',
                    array( //updated content
                            'notif_status' => 'seen',
                    ),
                    array( //location of updated content
                            'notif_status' => 'unread'
                            ,'notif_id' => $function_notifications__read_notifications_ids[$adm]
                            ,'notif_user' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                    ),
                    array( //format of updated content
                            '%s'
                    ),
                    array( //format of location of updated content
                            '%s','%d','%s'
                        ));
        }
        #database query update (close)
        
    }
    #.'#dome top_sidebar_notification__number_of_seen_ids: '.$function_notifications__read_notifications_ids.' - '.
    echo '
    <div class="top_sidebar_notification__number_of_seen_ids">'.
        count($function_notifications__read_notifications_ids).
    '</div>';
    
}
#sidebar-popup -> mark notifications as seen (close)

/*

get ids of users

check for previous notifications

find out if they want to receive emails
send email to users



*/

unset(
    $function_notifications__page_section
    ,$function_notifications['function_part']
);

?>




