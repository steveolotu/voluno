<?php

unset($table_of_god);

#mysql + preparation (open)
if(1==1){
    
    $table_of_god_id = substr(preg_replace("/[^0-9]/","",md5($table_of_god_name)),0,10).$table_of_god_id;

    #save data (open)
    if(1==1){
        
        #table of god content data (open)
        if(1==1){
            $GLOBALS['wpdb']->delete(
                        'fi4l3fg_voluno_table_of_god',
                array( //location of row to delete
                      'tog_user' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                ),
                array( //format of location of row to delete
                      '%d'
                ));
            $table_of_god_number_of_rows = count($table_of_god_results);
            for($adu=0;$adu<$table_of_god_number_of_rows;$adu++){
                
                for($adv=1;$adv<=30;$adv++){
                    if(empty(${'table_of_god_data_strings'.$adv}[$adu])){
                        ${'table_of_god_data_strings'.$adv}[$adu] = "";
                    }
                }
                
                $GLOBALS['wpdb']->insert(
                                'fi4l3fg_voluno_table_of_god',
                        array(
                                'tog_name' => $table_of_god_name,
                                'tog_user' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                
                                'tog_data_string1'  => $table_of_god_data_strings1[$adu],
                                'tog_data_string2'  => $table_of_god_data_strings2[$adu],
                                'tog_data_string3'  => $table_of_god_data_strings3[$adu],
                                'tog_data_string4'  => $table_of_god_data_strings4[$adu],
                                'tog_data_string5'  => $table_of_god_data_strings5[$adu],
                                'tog_data_string6'  => $table_of_god_data_strings6[$adu],
                                'tog_data_string7'  => $table_of_god_data_strings7[$adu],
                                'tog_data_string8'  => $table_of_god_data_strings8[$adu],
                                'tog_data_string9'  => $table_of_god_data_strings9[$adu],
                                'tog_data_string10' => $table_of_god_data_strings10[$adu],
                                'tog_data_string11' => $table_of_god_data_strings11[$adu],
                                'tog_data_string12' => $table_of_god_data_strings12[$adu],
                                'tog_data_string13' => $table_of_god_data_strings13[$adu],
                                'tog_data_string14' => $table_of_god_data_strings14[$adu],
                                'tog_data_string15' => $table_of_god_data_strings15[$adu],
                                'tog_data_string16' => $table_of_god_data_strings16[$adu],
                                'tog_data_string17' => $table_of_god_data_strings17[$adu],
                                'tog_data_string18' => $table_of_god_data_strings18[$adu],
                                'tog_data_string19' => $table_of_god_data_strings19[$adu],
                                'tog_data_string20' => $table_of_god_data_strings20[$adu],
                                'tog_data_string21' => $table_of_god_data_strings21[$adu],
                                'tog_data_string22' => $table_of_god_data_strings22[$adu],
                                'tog_data_string23' => $table_of_god_data_strings23[$adu],
                                'tog_data_string24' => $table_of_god_data_strings24[$adu],
                                'tog_data_string25' => $table_of_god_data_strings25[$adu],
                                'tog_data_string26' => $table_of_god_data_strings26[$adu],
                                'tog_data_string27' => $table_of_god_data_strings27[$adu],
                                'tog_data_string28' => $table_of_god_data_strings28[$adu],
                                'tog_data_string29' => $table_of_god_data_strings29[$adu],
                                'tog_data_string30' => $table_of_god_data_strings30[$adu],
                                
                                'tog_data_num1' => intval($table_of_god_data_numbers1[$adu]),
                                'tog_data_num2' => intval($table_of_god_data_numbers2[$adu]),
                                'tog_data_num3' => intval($table_of_god_data_numbers3[$adu]),
                                'tog_data_num4' => intval($table_of_god_data_numbers4[$adu]),
                                'tog_data_num5' => intval($table_of_god_data_numbers5[$adu]),
                                'tog_data_num6' => intval($table_of_god_data_numbers6[$adu]),
                                'tog_data_num7' => intval($table_of_god_data_numbers7[$adu]),
                                'tog_data_num8' => intval($table_of_god_data_numbers8[$adu]),
                                'tog_data_num9' => intval($table_of_god_data_numbers9[$adu]),
                                'tog_data_num10' => intval($table_of_god_data_numbers10[$adu]),
                                'tog_data_num11' => intval($table_of_god_data_numbers11[$adu]),
                                'tog_data_num12' => intval($table_of_god_data_numbers12[$adu]),
                                'tog_data_num13' => intval($table_of_god_data_numbers13[$adu]),
                                'tog_data_num14' => intval($table_of_god_data_numbers14[$adu]),
                                'tog_data_num15' => intval($table_of_god_data_numbers15[$adu]),
                                'tog_data_num16' => intval($table_of_god_data_numbers16[$adu]),
                                'tog_data_num17' => intval($table_of_god_data_numbers17[$adu]),
                                'tog_data_num18' => intval($table_of_god_data_numbers18[$adu]),
                                'tog_data_num19' => intval($table_of_god_data_numbers19[$adu]),
                                'tog_data_num20' => intval($table_of_god_data_numbers20[$adu])
                            ),
                        array(
                                '%s','%d',
                                
                                '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s', #string 1-10
                                '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s', #string 11-20
                                '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s', #string 21-30
                                '%d','%d','%d','%d','%d','%d','%d','%d','%d','%d', #number 1-10
                                '%d','%d','%d','%d','%d','%d','%d','%d','%d','%d' #number 11-20
                            ));
            }
        }
        #table of god content data (close)
        
        #order and order direction updating (open)
        if(!empty($_POST['function_tog_order_column_num_input'.$table_of_god_id]) AND $table_of_god__hide_column_titles != "yes"){
            
            $table_of_god_mysql_column_number = intval($_POST['function_tog_order_column_num_input'.$table_of_god_id]);
            
            if($_POST['function_tog_order_column_direction_input'.$table_of_god_id] == "descending"){
                $table_of_god_mysql_order_direction = "descending";
            }else{
                $table_of_god_mysql_order_direction = "ascending";
            }
            
            $table_of_god_ordering_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM fi4l3fg_voluno_personal_settings
                                                            WHERE pers_settings_general = %s
                                                                AND pers_settings_specific = %s
                                                                AND pers_settings_user_id = %d
                                                                AND pers_settings_content_varchar1000 = %s
                                                            ;'
                                                            ,"table of god settings"
                                                            ,$table_of_god_name
                                                            ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                                                            ,"order by"
                                                            );
            $table_of_god_ordering_row = $GLOBALS['wpdb']->get_row($table_of_god_ordering_query);
            
            if(empty($table_of_god_ordering_row->pers_settings_id)){
                $GLOBALS['wpdb']->insert(
                                'fi4l3fg_voluno_personal_settings',
                        array(
                                'pers_settings_value' => $table_of_god_mysql_column_number,
                                'pers_settings_general' => "table of god settings",
                                'pers_settings_specific' => $table_of_god_name,
                                'pers_settings_content_text' => $table_of_god_mysql_order_direction,
                                'pers_settings_content_varchar1000' => "order by",
                                'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                            ),
                        array(
                                '%d',
                                '%s',
                                '%s',
                                '%s',
                                '%s',
                                '%d'
                            ));
            }else{
                $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_personal_settings',
                        array( //updated content
                                'pers_settings_value' => $table_of_god_mysql_column_number,
                                'pers_settings_content_text' => $table_of_god_mysql_order_direction
                        ),
                        array( //location of updated content
                                'pers_settings_id' => $table_of_god_ordering_row->pers_settings_id
                        ),
                        array( //format of updated content
                                '%d',
                                '%s'
                        ),
                        array( //format of location of updated content
                                '%d'
                            ));
            }
        }
        #order and order direction updating (close)
        
        #pagination (open)
        if(1==1){
            
            #items per page (open)
            if(!empty($_POST['function_tog_items_per_page_input'.$table_of_god_id])){
                
                #update fi4l3fg_voluno_personal_settings -> items_per_page
                    $GLOBALS['wpdb']->delete(
                                'fi4l3fg_voluno_personal_settings',
                            array( //location of row to delete
                                'pers_settings_general' => "table of god settings",
                                'pers_settings_specific' => $table_of_god_name, //this is probably relevant for all tables of this type, thus name, not id
                                'pers_settings_content_varchar1000' => 'items per page',
                                'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                            ),
                            array( //format of location of row to delete
                                '%s',
                                '%s',
                                '%s',
                                '%d'
                            ));
                    
                    $GLOBALS['wpdb']->insert( 
                                'fi4l3fg_voluno_personal_settings', 
                            array(
                                'pers_settings_general' => "table of god settings",
                                'pers_settings_specific' => $table_of_god_name,
                                'pers_settings_content_varchar1000' => 'items per page',
                                'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                'pers_settings_value' => intval($_POST['function_tog_items_per_page_input'.$table_of_god_id])
                                ),
                            array( 
                                '%s',
                                '%s',
                                '%s',
                                '%d',
                                '%d',
                                ));
                
            }
            #items per page (close)
            
            #current page number (open)
            if(!empty($_POST['function_tog_page_num_input'.$table_of_god_id])){
                
                #update fi4l3fg_voluno_personal_settings -> items_per_page
                    $GLOBALS['wpdb']->delete(
                                'fi4l3fg_voluno_personal_settings',
                            array( //location of row to delete
                                'pers_settings_general' => "table of god settings",
                                'pers_settings_specific' => $table_of_god_id, //this is probably relevant for only this table, thus id not name
                                'pers_settings_content_varchar1000' => 'page number',
                                'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                            ),
                            array( //format of location of row to delete
                                '%s',
                                '%s',
                                '%s',
                                '%d'
                            ));
                    
                    $GLOBALS['wpdb']->insert( 
                                'fi4l3fg_voluno_personal_settings', 
                            array(
                                'pers_settings_general' => "table of god settings",
                                'pers_settings_specific' => $table_of_god_id,
                                'pers_settings_content_varchar1000' => 'page number',
                                'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                'pers_settings_value' => intval($_POST['function_tog_page_num_input'.$table_of_god_id])
                                ),
                            array( 
                                '%s',
                                '%s',
                                '%s',
                                '%d',
                                '%d',
                                ));
                
            }
            #current page number (close)
            
        }
        #pagination (close)
        
    }
    #save data (close)
    
    #get data (open)
    if(1==1){
        
        $table_of_god_personal_settings_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_personal_settings
                                                        WHERE pers_settings_general = %s
                                                            AND pers_settings_specific IN (%s,%s)
                                                            AND pers_settings_user_id = %d
                                                        ;'
                                                        ,"table of god settings"
                                                        ,$table_of_god_name
                                                        ,$table_of_god_id
                                                        ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                                                        );
        $table_of_god_personal_settings_results = $GLOBALS['wpdb']->get_results($table_of_god_personal_settings_query);
        
        #loop to separate data (open)
        foreach($table_of_god_personal_settings_results as $table_of_god_personal_settings_row){
            
            #ordering information (open)
            if($table_of_god_personal_settings_row->pers_settings_content_varchar1000 == "order by"){
                $table_of_god_mysql_column_number = $table_of_god_personal_settings_row->pers_settings_value;
                $table_of_god_mysql_order_direction = $table_of_god_personal_settings_row->pers_settings_content_text;
            }
            #ordering information (close)
            
            #items per page (open)
            if($table_of_god_personal_settings_row->pers_settings_content_varchar1000 == "items per page"){
                $table_of_god_items_per_page = $table_of_god_personal_settings_row->pers_settings_value;
            }
            #items per page (close)
            
            #pagination information (open)
            if($table_of_god_personal_settings_row->pers_settings_content_varchar1000 == "page number"){
                $table_of_god_current_page = $table_of_god_personal_settings_row->pers_settings_value;
            }
            #pagination information (close)
            
        }
        #loop to separate data (close)
        
        #pagination preparation (open)
        if(1==1){
            
            #get user specific elements_per_page
            if(empty($table_of_god_items_per_page)){
                $table_of_god_items_per_page = 10;
            }
            
            if(empty($table_of_god_current_page)){
                $table_of_god_current_page = 1;
            }
            
            $table_of_god_pagination_upper_limit =
                        $table_of_god_current_page * $table_of_god_items_per_page;
            
            $table_of_god_pagination_lower_limit =
                        ($table_of_god_current_page * $table_of_god_items_per_page) - $table_of_god_items_per_page;
        }
        #pagination preparation (close)
        
        #ordering preparation (open)
        if(!empty($table_of_god_mysql_column_number)){
            if($table_of_god_mysql_order_direction == "descending"){
                $table_of_god_order_by_direction = " DESC";
            }else{
                $table_of_god_order_by_direction = " ASC";
            }
            $table_of_god_order_by = $table_of_god_table_array[$table_of_god_mysql_column_number][2];
        }else{
            $table_of_god_order_by = $table_of_god_default_order_by;
            $table_of_god_order_by_direction = $table_of_god_default_order_by_direction;
        }
        #ordering preparation (close)
        
        #table of god query (open)
        if(1==1){
            $table_of_god_internal_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM fi4l3fg_voluno_table_of_god
                                                            WHERE tog_name = %s
                                                                AND tog_user = %d
                                                            ORDER BY '.$table_of_god_order_by.' '.$table_of_god_order_by_direction.';'
                                                            ,$table_of_god_name
                                                            ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                                                            );
            $table_of_god_internal_results = $GLOBALS['wpdb']->get_results($table_of_god_internal_query);
        }
        #table of god query (close)
        
    }
    #get data (close)
    
}
#mysql + preparation (close)

#style (open)
if($table_of_god_style_already_set != "yes"){
    $table_of_god_style_already_set = "yes";
    $table_of_god .= '
    <style>
        .function_tog_table{
            table-layout: fixed;
            width:100%;
        }
        .function_tog_table a{
            cursor:pointer;
        }
        .table_of_god_search_item_title_style{
            font-weight:bold;
            cursor:pointer;
        }
        .table_of_god__search_row_title{
            font-size:110%;
            cursor:pointer;
            font-weight:bold;
        }
        .table_of_god__column_title_td{
            background-color:#8B0000;
            text-align:center;
            vertical-align:middle;
            font-weight:bold;
            color:white;
        }
        .table_of_god__ascending_arrow{
            width:0;
            height:0;
            margin:auto;
            border-style:solid;
            border-width: 0 5px 6px 5px;
        }
        .table_of_god__descending_arrow{
            width:0;
            height:0;
            margin: 3px auto 0 auto;
            border-style:solid;
            border-width:6px 5px 0 5px;
        }
    </style>';
}
#style (open)

#table settings + hidden forms (open)
if(1==1){
    
    if($table_of_god_show_on_load == "no" AND !empty($table_of_god_table_title)){
        $table_of_god_show_on_load = "display:none;";
    }else{
        $table_of_god_show_on_load = "";
    }
    
    $table_of_god .= '
    <form class="function_tog_hidden_form'.$table_of_god_id.'" method="post" action="'.add_query_arg(NULL,NULL).'">';
        
        #ordering of table (open)
        if($table_of_god__hide_column_titles != "yes"){
            $table_of_god .= '
            <input
                class="function_tog_order_column_num_input'.$table_of_god_id.'"
                name="function_tog_order_column_num_input'.$table_of_god_id.'"
                value=""
                type="hidden"
            >
            <input
                class="function_tog_order_column_direction_input'.$table_of_god_id.'"
                name="function_tog_order_column_direction_input'.$table_of_god_id.'"
                value=""
                type="hidden"
            >';
        }
        #ordering of table (close)
        
        #pagination (open)
        if(1==1){
            $table_of_god .= '
            <input
                class="function_tog_items_per_page_input'.$table_of_god_id.'"
                name="function_tog_items_per_page_input'.$table_of_god_id.'"
                value=""
                type="hidden"
            >
            <input
                class="function_tog_page_num_input'.$table_of_god_id.'"
                name="function_tog_page_num_input'.$table_of_god_id.'"
                value=""
                type="hidden"
            >';
        }
        #pagination (close)
        
    $table_of_god .= '
    </form>';
    
}
#table settings + hidden forms (close)

#content area (open)
if(1==1){
    $table_of_god .= '
    <div class="function_tog_table_container">
        <table class="function_tog_table">';
            
            #overall table title (thead) (open)
            if(!empty($table_of_god_table_title)){
                
                if(empty($table_of_god_table_title_format)){
                    $table_of_god_table_title_format = array('h4','h4');
                }
                
                if($table_of_god_table_title_brackets == "no"){
                    unset($table_of_god_table_title_brackets);
                }else{
                    $table_of_god_table_title_brackets = ' ('.count($table_of_god_internal_results).')';
                }
                
                $table_of_god .= '
                <thead>
                    <tr>
                        <td colspan="'.count($table_of_god_table_array).'" style="text-align:center;">
                            <'.$table_of_god_table_title_format[0].'>
                                <a style="cursor:pointer;" class="table_of_god_show_table_link'.$table_of_god_id.'">
                                    '.$table_of_god_table_title.$table_of_god_table_title_brackets.'
                                </a>
                            </'.$table_of_god_table_title_format[1].'>
                        </td>
                    </tr>
                </thead>';
            }
            #overall table title (thead) (close)
            
            #search row, if activated (open)
            if($table_of_god_search_row_activate == "yes"){
                $table_of_god .= '
                <tbody class="table_of_god_list" style="'.$table_of_god_show_on_load.'">
                    <tr
                        style="
                            background-color:#8B0000;
                            text-align:center;
                            vertical-align:middle;
                            color:white;
                        "
                        class="table_of_god_head_hover"
                    >
                        <td colspan="'.count($table_of_god_table_array).'">
                            <span class="table_of_god_search_row_link table_of_god__search_row_title">
                                '.$table_of_god_search_row_title.'
                            </span>
                        </td>
                    </tr>
                    <tr class="table_of_god_search_row" style="display:none;">
                        <td colspan="'.count($table_of_god_table_array).'">';
                            $table_of_god_search_row_content = "here";
                            include("#function-table-of-god#".sanitize_title($table_of_god_name).".php");
                        $table_of_god .= '
                        </td>
                    </tr>
                </tbody>';
            }
            #search row, if activated (close)
            
        $table_of_god .= '
        </table>';
        
        #column titles + main content rows + pagination (open)
        if(1==1){
            $table_of_god .= '
            <table class="function_tog_table">
                <tbody class="table_of_god_list" style="'.$table_of_god_show_on_load.'">';
                    
                    #column title row (open)
                    if($table_of_god__hide_column_titles == "yes"){
                        
                        #td loop (open)
                        for($x=0;$x<count($table_of_god_table_array);$x++){
                            $table_of_god .= '
                            <td
                                style="width:'.$table_of_god_table_array[$x][1].'%;height:1px;"
                            ></td>';
                        }
                        #td loop (close)
                        
                    }else{
                        
                        $table_of_god .= '
                        <tr style="height:1px;overflow:hidden;">';
                            
                            #td loop (open)
                            for($x=0;$x<count($table_of_god_table_array);$x++){
                                $table_of_god .= '
                                <td
                                    style="width:'.$table_of_god_table_array[$x][1].'%;"
                                    class="table_of_god_head_hover table_of_god__column_title_td"
                                >';
                                    
                                    #preparation: oder by this column? (selected) (open)
                                    if($table_of_god_order_by == $table_of_god_table_array[$x][2]){
                                        $table_of_god_column_title_color_text = "#FFC977";
                                        if($table_of_god_mysql_order_direction == "descending"){
                                            $table_of_god_column_title_color_desc = "#FFC977";
                                        }else{
                                            $table_of_god_column_title_color_asc = "#FFC977";
                                        }
                                    }else{
                                        $table_of_god_column_title_color_text = "#fff";
                                        $table_of_god_column_title_color_asc = "#fff";
                                        $table_of_god_column_title_color_desc = "#fff";
                                    }
                                    #preparation: oder by this column? (selected) (close)
                                    
                                    #content (open)
                                    if(1==1){
                                        
                                        #sorting ascending arrow (open)
                                        if(!empty($table_of_god_table_array[$x][2])){
                                            $table_of_god .= '
                                            <a class="function_tog_order_link'.$table_of_god_id.'">
                                                <div
                                                    style="border-color: transparent transparent '.$table_of_god_column_title_color_asc.' transparent;";
                                                    class="table_of_god__ascending_arrow"
                                                    title="Click to sort by this column in ascending order"
                                                >
                                                    <span class="function_tog_order_column_direction'.$table_of_god_id.'" style="display:none;">'.
                                                        'ascending'.
                                                    '</span>
                                                </div>
                                            </a>
                                            <span class="function_tog_order_column_num'.$table_of_god_id.'" style="display:none;">'.
                                                $x.
                                            '</span>
                                            <a
                                                title="Click to sort by this column"
                                                class="function_tog_order_link'.$table_of_god_id.'"
                                            >
                                            ';
                                        }
                                        #sorting ascending arrow (close)
                                        
                                        $table_of_god .= '
                                        <div style="color:'.$table_of_god_column_title_color_text.';">
                                            '.$table_of_god_table_array[$x][0].'
                                        </div>';
                                        
                                        #sorting descending arrow (open)
                                        if(!empty($table_of_god_table_array[$x][2])){
                                            $table_of_god .= '
                                            </a>
                                            <a class="function_tog_order_link'.$table_of_god_id.'">
                                                <div
                                                    style="border-color:'.$table_of_god_column_title_color_desc.' transparent transparent transparent;";
                                                    class="table_of_god__descending_arrow"
                                                    title="Click to sort by this column in descending order"
                                                >
                                                    <span class="function_tog_order_column_direction'.$table_of_god_id.'" style="display:none;">'.
                                                        'descending'.
                                                    '</span>
                                                </div>
                                            </a>';
                                        }
                                        #sorting descending arrow (close)
                                        
                                    }
                                    #content (close)
                                    
                                $table_of_god .= '
                                </td>';
                            }
                            #td loop (close)
                            
                        $table_of_god .= '
                        </tr>';
                        
                    }
                    #column title row (close)
                    
                    #content rows (open)
                    if(count($table_of_god_internal_results) != 0){
                        
                        $table_of_god_row_counter = 0;
                        
                        #loop for each tr (open)
                        for($abr=$table_of_god_pagination_lower_limit;$abr<$table_of_god_pagination_upper_limit;$abr++){
                            
                            #if there are more rows per page selected than items, stop loop (open)
                            if(empty($table_of_god_internal_results[$abr]->tog_name)){
                                break;
                            }
                            #if there are more rows per page selected than items, stop loop (close)
                            
                            #preparation (open)
                            if(1==1){
                                
                                $table_of_god_row_counter++;
                                if($table_of_god_row_counter % 2 == 0){
                                    $table_of_god_row_bg_color = "FFF5C4";
                                    $table_of_god_hover_row = "table_of_god_hover_row1";
                                }else{
                                    $table_of_god_row_bg_color = "FFFFFF";
                                    $table_of_god_hover_row = "table_of_god_hover_row2";
                                }
                                
                            }
                            #preparation (close)
                            
                            #content (open)
                            if(1==1){
                                
                                $table_of_god .= '
                                <tr
                                    style="
                                        border-top:1px dotted grey;
                                        background-color:#'.$table_of_god_row_bg_color.';
                                        text-align:center;
                                        vertical-align:middle;
                                    "
                                    class="'.$table_of_god_hover_row.'"
                                >
                                ';
                                    
                                    #loop for each td (open)
                                    for($abs=0;$abs<count($table_of_god_table_array);$abs++){
                                        
                                        $table_of_god_content_td_number = $abs + 1;
                                        
                                        $x = $abr; //phasing out of old togs, where i used $x as index variable
                                        
                                        include("#function-table-of-god#".sanitize_title($table_of_god_name).".php");
                                        
                                    }
                                    #loop for each td (close)
                                    
                                $table_of_god .= '
                                </tr>';
                                
                            }
                            #content (close)
                        }
                        #loop for each tr (close)
                        
                    }
                    #content rows (close)
                    
                    #pagination cell / row (open)
                    if(count($table_of_god_internal_results) > 5){
                        $table_of_god .= '
                        <tr>
                            <td
                                style="text-align:center;border-top:1px dotted grey;"
                                colspan="'.count($table_of_god_table_array).'"
                            >';
                                
                                #preparation (open)
                                if(1==1){
                                    
                                    $table_of_god_pagination_last = ceil(count($table_of_god_internal_results)/$table_of_god_items_per_page);
                                    $table_of_god_pagination_first = 1;
                                    $table_of_god_pagination_next = $table_of_god_current_page+1;
                                    $table_of_god_pagination_previous = $table_of_god_current_page-1;
                                    
                                    #array preparation (open)
                                    if(1==1){
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = "thematic";
                                                $function_propic__original_img_name = "voluno_img_3521.png";
                                                $function_propic__cropping = "yes"; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                                $function_propic__rotate = 180; //optional, default: 0
                                            include('#function-image-processing.php');
                                            $img_previous_first = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = "thematic";
                                                $function_propic__original_img_name = "voluno_img_3532.png";
                                                $function_propic__cropping = "yes"; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                                $function_propic__rotate = 180; //optional, default: 0
                                            include('#function-image-processing.php');
                                            $img_previous_one = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = "thematic";
                                                $function_propic__original_img_name = "voluno_img_3521.png";
                                                $function_propic__cropping = "yes"; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                            include('#function-image-processing.php');
                                            $img_next_last = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #function-image-processing.php (v1.0) (open)
                                        if(1==1){
                                            #thematic only
                                                $function_propic__type = "thematic";
                                                $function_propic__original_img_name = "voluno_img_3532.png";
                                                $function_propic__cropping = "yes"; //yes or empty (default)
                                            #all
                                                $function_propic__geometry = array(NULL,15); //optional, if e.g. only width: 300, NULL; vice versa
                                            include('#function-image-processing.php');
                                            $img_next_one = $function_propic;
                                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                                        }
                                        #function-image-processing.php (v1.0) (close)
                                        
                                        #pagination button status (open)
                                        if(1==1){
                                            if($table_of_god_current_page > $table_of_god_pagination_first){
                                                $status_previous = "active";
                                            }else{
                                                $status_previous = "inactive";
                                            }
                                            if($table_of_god_current_page < $table_of_god_pagination_last){
                                                $status_next = "active";
                                            }else{
                                                $status_next = "inactive";
                                            }
                                        }
                                        #pagination button status (close)
                                        
                                    }
                                    #array preparation (close)
                                    
                                    #array(open)
                                    if(1==1){
                                        
                                        $table_of_god__pagination__array = array(
                                            #go back
                                            array(
                                                #first page
                                                array(
                                                    'text' => 'First page'
                                                    ,'image' => $img_previous_first
                                                    ,'page_number' => $table_of_god_pagination_first
                                                )
                                                #one back
                                                ,array(
                                                    'text' => 'Previous page'
                                                    ,'image' => $img_previous_one
                                                    ,'page_number' => $table_of_god_pagination_previous
                                                )
                                                ,'status' => $status_previous
                                            ),
                                            #go forwad
                                            array(
                                                #one forward
                                                array(
                                                    'text' => 'Next page'
                                                    ,'image' => $img_next_one
                                                    ,'page_number' => $table_of_god_pagination_next
                                                )
                                                #last page
                                                ,array(
                                                    'text' => 'Last page'
                                                    ,'image' => $img_next_last
                                                    ,'page_number' => $table_of_god_pagination_last
                                                )
                                                ,'status' => $status_next
                                            )
                                        );
                                        
                                    }
                                    #array (close)
                                    
                                    #loop (open)
                                    for($acx=0;$acx<count($table_of_god__pagination__array);$acx++){
                                        for($acy=0;$acy<count($table_of_god__pagination__array[$acx])-1;$acy++){
                                            
                                            #status (open)
                                            if($table_of_god__pagination__array[$acx]['status'] == 'active'){
                                                $table_of_god__pagination__link_opening = '<a class="function_tog_page_num_link'.$table_of_god_id.'">';
                                                $table_of_god__pagination__link_closing = '</a>';
                                                
                                                #page number for jquery (open)
                                                if(1==1){
                                                    $table_of_god__pagination__page_number_for_jquery = '
                                                    <span
                                                        class="function_tog_page_num'.$table_of_god_id.'"
                                                        style="display:none;"
                                                    >'.
                                                        $table_of_god__pagination__array[$acx][$acy]['page_number'].
                                                    '</span>';
                                                }
                                                #page number for jquery (close)
                                                
                                                $table_of_god__hover_div_class = 'voluno_button';
                                            }else{
                                                unset(
                                                    $table_of_god__pagination__link_opening
                                                    ,$table_of_god__pagination__page_number_for_jquery
                                                    ,$table_of_god__pagination__link_closing
                                                );
                                                
                                                $table_of_god__hover_div_class = 'voluno_button_inactive';
                                            }
                                            #status (close)
                                            
                                            $table_of_god__pagination__output[$acx] .=
                                            $table_of_god__pagination__link_opening.'
                                                <div class="'.$table_of_god__hover_div_class.'" style="margin:3px;padding:10px;vertical-align:middle;">
                                                    '.$table_of_god__pagination__page_number_for_jquery.'
                                                    <img src="'.$table_of_god__pagination__array[$acx][$acy]['image'].'">
                                                    <br>
                                                    '.$table_of_god__pagination__array[$acx][$acy]['text'].'
                                                </div>
                                            '.$table_of_god__pagination__link_closing;
                                            
                                        }
                                    }
                                    #loop (close)
                                    
                                    #thin pagination menu (open)
                                    if($table_of_god__thin_pagination == "yes"){
                                        
                                        $table_of_god__thin_pagination__div_open = '<div>';
                                        $table_of_god__thin_pagination__div_close = '</div>';
                                        
                                    }else{
                                        unset(
                                            $table_of_god__thin_pagination__div_open
                                            ,$table_of_god__thin_pagination__div_close
                                        );
                                    }
                                    #thin pagination menu (close)
                                    
                                }
                                #preparation (close)
                                
                                #content (open)
                                if(1==1){
                                    
                                    $table_of_god .=
                                    $table_of_god__thin_pagination__div_open.
                                    $table_of_god__pagination__output[0]. //go back
                                    $table_of_god__thin_pagination__div_close;
                                    
                                    #page x of X section (open)
                                    if(1==1){
                                        
                                        $table_of_god .= '
                                        <div style="vertical-align:middle;text-align:center;display:inline-block;margin:10px;">
                                            Page '.
                                            $table_of_god_current_page.
                                            ' of '.
                                            $table_of_god_pagination_last.'
                                            ('.count($table_of_god_internal_results);
                                            if(count($table_of_god_internal_results) == 1){
                                                $table_of_god .= '
                                                item)';
                                            }else{
                                                $table_of_god .= '
                                                items)';
                                            }
                                            
                                            if(current_user_can("manage_options")){
                                                $table_of_god_items_per_page_available_options_array =
                                                        array(5,10,50,100,500,1000,count($table_of_god_internal_results));
                                            }else{
                                                $table_of_god_items_per_page_available_options_array =
                                                        array(5,10,50,100,500,1000);
                                            }
                                            
                                            for($x=0;$x<count($table_of_god_items_per_page_available_options_array);$x++){
                                                if(count($table_of_god_internal_results)<$table_of_god_items_per_page_available_options_array[$x]){
                                                    continue;
                                                }
                                                if($x==0){
                                                    $table_of_god .= '
                                                    <br>
                                                    Items per page:';
                                                }
                                                if($table_of_god_items_per_page == $table_of_god_items_per_page_available_options_array[$x]){
                                                    $table_of_god_items_per_page_available_options_array_select_style = 'style="font-weight:bold;font-size:120%;"';
                                                }else{
                                                    $table_of_god_items_per_page_available_options_array_select_style = '';
                                                }
                                                $table_of_god .= '
                                                <a
                                                    '.$table_of_god_items_per_page_available_options_array_select_style.'
                                                    class="function_tog_items_per_page_link'.$table_of_god_id.'"
                                                >'.
                                                    $table_of_god_items_per_page_available_options_array[$x].
                                                '</a>';
                                            }
                                        $table_of_god .= '
                                        </div>';
                                        
                                    }
                                    #page x of X section (close)
                                    
                                    $table_of_god .=
                                    $table_of_god__thin_pagination__div_open.
                                    $table_of_god__pagination__output[1]. //go forward
                                    $table_of_god__thin_pagination__div_close;
                                    
                                }
                                #content (close)
                            
                            $table_of_god .= '
                            </td>
                        </tr>';
                    }
                    #pagination cell / row (close)
                    
                    #if no results available (open)
                    if(count($table_of_god_internal_results) == 0){
                        $table_of_god .= '
                        <tr>
                            <td colspan="'.count($table_of_god_table_array).'" style="text-align:center;padding:30px;">';
                                
                                if($table_of_god__number_of_all_results != 0){
                                    
                                    if($table_of_god__number_of_all_results > 1){
                                        $plural = "items were";
                                    }else{
                                        $plural = "item was";
                                    }
                                    $table_of_god .= '
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
                                            '.$table_of_god__number_of_all_results.' '.$plural.' excluded from this search.
                                            <br>
                                            You could either wait for new items or relax your search criteria.
                                        </div>
                                    </div>';
                                }else{
                                    
                                    if(empty($table_of_god__no_items_available_message['content'])){
                                        $table_of_god__no_items_available_message['content'] = "There are currently no items available.";
                                    }elseif($table_of_god__no_items_available_message['content'] == "none"){
                                        unset($table_of_god__no_items_available_message['content']);
                                    }
                                    if($table_of_god__no_items_available_message['lines'] != "no"){
                                        $table_of_god__no_items_available_message['lines_internal'] = 'border-bottom:1px dashed #8B0000;';
                                    }
                                    
                                    $table_of_god .= '
                                    <div style="height:1px;'.$table_of_god__no_items_available_message['lines_internal'].'text-align:center">
                                        <div
                                            style="
                                                background-color:#fff;
                                                position:relative;
                                                top:-0.5em;
                                                display:inline-block;
                                                padding:0px 10px;
                                            "
                                        >
                                            '.$table_of_god__no_items_available_message['content'].'
                                        </div>
                                    </div>';
                                }
                                
                            $table_of_god .= '
                            </td>
                        </tr>';
                    }
                    #if no results available (close)
                    
                $table_of_god .= '
                </tbody>
            </table>';
        }
        #column titles + main content rows + pagination (open)
        
    $table_of_god .= '
    </div>';
}
#content area (close)

#jquery (open)
if(1==1){
    
    $table_of_god .= '
    <script>
        jQuery(document).ready(function(){';
            
            #order links (submit hidden form) (open)
            if(1==1){
                
                $table_of_god .= '
                jQuery(".function_tog_order_link'.$table_of_god_id.'").click(function(){
                    
                    var function_tog_var_order_col_num = "";
                    var function_tog_var_order_col_dir = "";
                    
                    function_tog_var_order_col_dir'.
                        ' = jQuery(this).find(".function_tog_order_column_direction'.$table_of_god_id.'").html();
                    function_tog_var_order_col_num'.
                        ' = jQuery(this).parent().find(".function_tog_order_column_num'.$table_of_god_id.'").html();
                    
                    jQuery(".function_tog_order_column_num_input'.$table_of_god_id.'").val(function_tog_var_order_col_num);
                    jQuery(".function_tog_order_column_direction_input'.$table_of_god_id.'").val(function_tog_var_order_col_dir);
                    
                    jQuery(".function_tog_hidden_form'.$table_of_god_id.'").submit();
                    
                });';
                
            }
            #order links (submit hidden form) (close)
            
            #pagination links (submit hidden form) (open)
            if(1==1){
                
                $table_of_god .= '
                jQuery(".function_tog_items_per_page_link'.$table_of_god_id.'").click(function(){
                    
                    var function_tog_items_per_page = jQuery(this).html();
                    jQuery(".function_tog_items_per_page_input'.$table_of_god_id.'").val(function_tog_items_per_page);
                    jQuery(".function_tog_hidden_form'.$table_of_god_id.'").submit();
                    
                });
                
                jQuery(".function_tog_page_num_link'.$table_of_god_id.'").click(function(){
                    
                    var function_tog_page_num = jQuery(this).find(".function_tog_page_num'.$table_of_god_id.'").html();
                    jQuery(".function_tog_page_num_input'.$table_of_god_id.'").val(function_tog_page_num);
                    jQuery(".function_tog_hidden_form'.$table_of_god_id.'").submit();
                    
                });
                ';
                
            }
            #pagination links (submit hidden form) (close)
            
            #content rows change color on hover (open)
            if(empty($table_of_god_script_already_set)){
                $table_of_god .= '
                jQuery(".table_of_god_hover_row2").hover(function(){
                    jQuery(this).css("background-color","#FFC977");
                },function(){
                    jQuery(this).css("background-color","#FFFFFF");
                });
                jQuery(".table_of_god_hover_row1").hover(function(){
                    jQuery(this).css("background-color","#FFC977");
                },function(){
                    jQuery(this).css("background-color","#FFF5C4");
                });';
            }
            #content rows change color on hover (close)
            
            #header rows change color on hover (open)
            if(empty($table_of_god_script_already_set)){
                $table_of_god .= '
                jQuery(".table_of_god_head_hover").hover(function(){
                    jQuery(this).css("background-color","#B30000");
                },function(){
                    jQuery(this).css("background-color","#8B0000");
                });';
            }
            #header rows change color on hover (close)
            
            #extend table on lick on title (open)
            if(1==1){
                $table_of_god .= '
                jQuery(".table_of_god_show_table_link'.$table_of_god_id.'").click(function(){
                    jQuery(this).closest(".function_tog_table_container").find(".table_of_god_list").fadeToggle(300);
                });';
            }
            #extend table on lick on title (close)
            
            #toggle search area (open)
            if(empty($table_of_god_script_already_set)){
                $table_of_god .= '
                jQuery(".table_of_god_search_row_link").click(function(){
                    jQuery(this).parent().parent().parent().find(".table_of_god_search_row").toggle();
                });';
            }
            #toggle search area (close)
            
        $table_of_god .= '
        });
    </script>';
    $table_of_god_script_already_set = 1;
}
#jquery (close)

#output (open)
if($table_of_god__variable_only != "yes"){
    echo $table_of_god;
}
#output (close)

#clearing area (open)
if(1==1){
    
    unset(
        $table_of_god_data_strings1
        ,$table_of_god_data_strings2
        ,$table_of_god_data_strings3
        ,$table_of_god_data_strings4
        ,$table_of_god_data_strings5
        ,$table_of_god_data_strings6
        ,$table_of_god_data_strings7
        ,$table_of_god_data_strings8
        ,$table_of_god_data_strings9
        ,$table_of_god_data_strings10
        ,$table_of_god_data_strings11
        ,$table_of_god_data_strings12
        ,$table_of_god_data_strings13
        ,$table_of_god_data_strings14
        ,$table_of_god_data_strings15
        ,$table_of_god_data_strings16
        ,$table_of_god_data_strings17
        ,$table_of_god_data_strings18
        ,$table_of_god_data_strings19
        ,$table_of_god_data_strings20
        ,$table_of_god_data_strings21
        ,$table_of_god_data_strings22
        ,$table_of_god_data_strings23
        ,$table_of_god_data_strings24
        ,$table_of_god_data_strings25
        ,$table_of_god_data_strings26
        ,$table_of_god_data_strings27
        ,$table_of_god_data_strings28
        ,$table_of_god_data_strings29
        ,$table_of_god_data_strings30
        
        ,$table_of_god_data_numbers1
        ,$table_of_god_data_numbers2
        ,$table_of_god_data_numbers3
        ,$table_of_god_data_numbers4
        ,$table_of_god_data_numbers5
        ,$table_of_god_data_numbers6
        ,$table_of_god_data_numbers7
        ,$table_of_god_data_numbers8
        ,$table_of_god_data_numbers9
        ,$table_of_god_data_numbers10
        ,$table_of_god_data_numbers11
        ,$table_of_god_data_numbers12
        ,$table_of_god_data_numbers13
        ,$table_of_god_data_numbers14
        ,$table_of_god_data_numbers15
        ,$table_of_god_data_numbers16
        ,$table_of_god_data_numbers17
        ,$table_of_god_data_numbers18
        ,$table_of_god_data_numbers19
        ,$table_of_god_data_numbers20
        
        ,$table_of_god_search_row_activate
        ,$table_of_god_id
        ,$table_of_god_table_title
        ,$table_of_god__number_of_all_results
        ,$table_of_god__thin_pagination
        
        ,$table_of_god__thin_pagination__div_open
        ,$table_of_god__pagination__output
        ,$table_of_god__thin_pagination__div_close
        
        ,$table_of_god__no_items_available_message
        ,$table_of_god__variable_only
        ,$table_of_god_table_title_format
        ,$table_of_god_table_title_brackets
    );
}
#clearing area (close)

?>