<?php

#type 1, meant for content (open)
if(empty($function_fixed_div__version)){
    
    #part 1 (open)
    if($function_fixed_div_part == 1){
        
        #settings (open)
        if(1==1){
            
            #padding top (open)
            if(empty($function_fixed_div_padding_text_top)){
                $function_fixed_div_padding_text_top = 10;
            }else{
                $function_fixed_div_padding_text_top = $function_fixed_div_padding_text_top + 10;
            }
            #padding top (close)
            
            #div width (open)
            if(empty($function_fixed_div_width_div)){
                $function_fixed_div_width_div = 750;
            }
            #div width (close)
            
            #height (open)
            if(1==1){
                
                if($function_fixed_div_height_div == "none" OR empty($function_fixed_div_height_div)){
                    $function_fixed_div_height_div_full = "";
                    $function_fixed_div_height_div = 50;
                }else{
                    $function_fixed_div_height_div_full = 'height: '.$function_fixed_div_height_div.'%;';
                    $function_fixed_div_height_div = 50;
                }
                
            }
            #height (close)
            
            #div name (open)
            if(empty($function_fixed_div_div_name)){
                $function_fixed_div_div_name = "voluno_".mt_rand(100000000,999999999).mt_rand(100000000,999999999);
            }
            #div name (close)
            
            #show on load (open)
            if(1==1){
                
                if(empty($function_fixed_div_show_on_load)){
                    $function_fixed_div_show_on_load = "no";
                }
                
                if($function_fixed_div_show_on_load == "no"){
                    $function_fixed_div_show_on_load_code = "display:none;";
                }else{
                    $function_fixed_div_show_on_load_code = "";
                }
                
            }
            #show on load (close)
            
            #border-radius (open)
            if(empty($function_fixed_div_border_radius)){
                $function_fixed_div_border_radius = 0;
            }
            #border-radius (close)
            
            #text align (open)
            if(empty($function_fixed_div_text_align)){
                $function_fixed_div_text_align = "left";
            }
            #text align (close)
            
            #vertical scrolling (open)
            if(empty($function_fixed_div_vertical_scrolling)){
                $function_fixed_div_vertical_scrolling = "overflow-y:auto;"; 
            }else{
                unset($function_fixed_div_vertical_scrolling);
            }
            #vertical scrolling (close)
            
            #darkened bg (open)
            if($function_fixed_div_darkened_bg != "no"){
                
                #fadeout on click (open)
                if($function_fixed_div__darkened_bg_fadeout_on_click == "yes"){
                    
                    $function_fixed_div__darkened_bg_fadeout_on_click__html['cursor'] = "cursor:pointer;";
                    $function_fixed_div__darkened_bg_fadeout_on_click__html['title'] = 'title="Click to close"';
                    
                    $function_fixed_div__darkened_bg_fadeout_on_click__script = '
                        jQuery(".'.$function_fixed_div_div_name.'_background").click(function(){
                            jQuery(".'.$function_fixed_div_div_name.'").fadeOut(300);
                        });';
                }else{
                    unset(
                        $function_fixed_div__darkened_bg_fadeout_on_click__html
                        ,$function_fixed_div__darkened_bg_fadeout_on_click__script
                    );
                }
                #fadeout on click (close)
                
                #html (open)
                if(1==1){
                    $function_fixed_div__darkened_bg__html = '
                    <div
                        class="'.$function_fixed_div_div_name.' '.$function_fixed_div_div_name.'_background"
                        '.$function_fixed_div__darkened_bg_fadeout_on_click__html['title'].'
                        style="
                            '.$function_fixed_div_show_on_load_code.'
                            '.$function_fixed_div__darkened_bg_fadeout_on_click__html['cursor'].'
                            overflow-y: auto;
                            position:fixed;
                            z-index:251;
                            top: 0%;
                            left: 0%;
                            background-color:#000;
                            width:100%;
                            height:100%;
                            opacity:0.5;
                        "
                    >
                    </div>';
                }
                #html (close)
                
                #jquery (open)
                if(1==1){
                    
                    $function_fixed_div__darkened_bg__jquery = $function_fixed_div__darkened_bg_fadeout_on_click__script;
                    
                }
                #jquery (close)
                
            }else{
                unset(
                    $function_fixed_div__darkened_bg__html
                    ,$function_fixed_div__darkened_bg__jquery
                );
            }
            #darkened bd (close)
            
            #cancel button (open)
            if(1==1){
                if($function_fixed_div_cancel_button != "no"){
                    
                    if(empty($function_fixed_div__cancel_button__css)){
                        $function_fixed_div__cancel_button__css = "margin-left:-90px;margin-top:20px;";
                    }
                    
                    #html (open)
                    if(1==1){
                        $function_fixed_div__cancel_button__html = '
                        <div
                            class="'.$function_fixed_div_div_name.'"
                            style="
                                '.$function_fixed_div_height_div_full.'
                                '.$function_fixed_div_show_on_load_code.'
                                position:fixed;
                                z-index:253;
                                top: '.((100-$function_fixed_div_height_div)/4).'%;
                                left: 50%;
                                margin-left: '.($function_fixed_div_width_div/2).'px;
                            "
                        >
                            <div
                            class="voluno_button '.$function_fixed_div_div_name.'_close"
                            style="'.$function_fixed_div__cancel_button__css.'">
                                Cancel
                            </div>
                        </div>';
                        unset($function_fixed_div__cancel_button__css);
                    }
                    #html (close)
                    
                    #jquery (open)
                    if(1==1){
                        $function_fixed_div__cancel_button__jquery = '
                        jQuery(".'.$function_fixed_div_div_name.'_close").click(function(){
                            jQuery(".'.$function_fixed_div_div_name.'").fadeOut(300);
                        });';
                    }
                    #jquery (close)
                    
                }else{
                    
                    unset(
                        $function_fixed_div__cancel_button__html
                        ,$function_fixed_div__cancel_button__jquery
                    );
                    
                }
                unset($function_fixed_div_cancel_button);
            }
            #cancel button (close)
            
        }
        #settings (close)
        
        #function content (open)
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
            
            $function_fixed_div_display = '
            <img src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
                onload=
                \'
                    jQuery(document).ready(function(){
                        '.$function_fixed_div__cancel_button__jquery.'
                        '.$function_fixed_div__darkened_bg__jquery.'
                    });
                \'
            />
            '.
            $function_fixed_div__cancel_button__html.
            $function_fixed_div__darkened_bg__html.'
            <table
                style="
                    padding:0px;
                    left: 50%;
                    overflow:hidden;
                    z-index:252;
                    '.$function_fixed_div_vertical_scrolling.'
                    position:fixed;
                    top: '.((100-$function_fixed_div_height_div)/4).'%;
                    width:'.$function_fixed_div_width_div.'px;
                    '.$function_fixed_div_height_div_full.'
                    margin-left: -'.($function_fixed_div_width_div/2).'px;
                    '.$function_fixed_div_show_on_load_code.'
                "
                class="'.$function_fixed_div_div_name.' '.$function_fixed_div_div_name.'_content"
            >
                <tr style="padding:0px;">
                    <td style="padding:0px;">
                        <div
                            style="
                                position:relative;
                                border-radius:'.$function_fixed_div_border_radius.'px;
                                border: 1px solid #000;
                                padding:10px 0px 10px 10px;
                                background-color:#fff;
                                overflow:hidden;
                            "
                        >
                            <div
                                style="
                                    margin: '.$function_fixed_div_padding_text_top.'px 0px 10px 10px;
                                    background-color:#fff;
                                    text-align:'.$function_fixed_div_text_align.';
                                    max-height:400px;
                                    padding-right:20px;
                                    '.$function_fixed_div_vertical_scrolling.'
                                "
                            >';
                            unset($function_fixed_div_vertical_scrolling);
                
            if($function_fixed_div_variable_only != "yes"){
                echo $function_fixed_div_display;
            }
        }
        #function content (close)
        
    }
    #part 1 (close)
    
    #part 2 (open)
    elseif($function_fixed_div_part == 2){
    
            $function_fixed_div_display = '
                        </div>
                    </div>
                    <div style="height:1000px;width:100;cursor:pointer;" class="popup_sidebar_notification_div_background">
                        './*this fills up the remaining space in the table. if fadeout is enables, this area would otherwise be excluded from
                           *the fadeout.*/'
                    </div>
                </td>
            </tr>
        </table>';
        
        if($function_fixed_div_variable_only != "yes"){
            echo $function_fixed_div_display;
        }
        
        unset($function_fixed_div_variable_only);
    }
    #part 2 (open)

}
#type 1, meant for content (close)

#type 2, meant for quick notices (close)
elseif($function_fixed_div__version == 2){
    
    #preparation (open)
    if(1==1){
        $function_fixed_div__input_array = $function_fixed_div;
        unset($function_fixed_div);
        
        #class name (open)
        if(empty($function_fixed_div__input_array['class_name'])){
            $function_fixed_div__class = 'function_fixed_div_default_class'.mt_rand();
        }else{
            $function_fixed_div__class = $function_fixed_div__input_array['class_name'];
        }
        #class name (close)
        
        #width (open)
        if(empty($function_fixed_div__input_array['width'])){
            $function_fixed_div__wdith = 250; 
        }else{
            $function_fixed_div__wdith = $function_fixed_div__input_array['width'];
        }
        #width (close)
        
        #text align (open)
        if(!empty($function_fixed_div['text_text_align'])){
            $function_fixed_div__text_align = 'style="text-align:'.$function_fixed_div['text_text_align'].';"';
        }
        #text align (close)
        
        $function_fixed_div__fade_duration = 300;
        
    }
    #preparation (close)
    
    #script (open)
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
        
        $function_fixed_div .= '
        <img
            src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
            style="display:none;"
            onload=\'
                jQuery(document).ready(function(){';
                    
                    #fadeIn on load (open)
                    if(1==1){
                        $function_fixed_div .= '
                        jQuery(".loading_img_middle_page").fadeOut(150);
                        jQuery(".'.$function_fixed_div__class.'").fadeIn('.$function_fixed_div__fade_duration.');
                        ';
                    }
                    #fateIn on load (close)                
                    
                    #fadeOut on load (open)
                    if(!empty($function_fixed_div__input_array['hide_after_x_milliseconds'])){
                        $function_fixed_div .= '
                        jQuery(".'.$function_fixed_div__class.'")'.
                            '.delay('.($function_fixed_div__input_array['hide_after_x_milliseconds']+$function_fixed_div__fade_duration).')'.
                            '.fadeOut('.$function_fixed_div__fade_duration.');
                        ';
                    }
                    #fadeOut on load (close)
                    
                    #hide button (open)
                    if($function_fixed_div__input_array['hide_button_text'] != 'none'){
                        $function_fixed_div .= '
                        jQuery(document).on("click",".function_fixed_div__hide_button",function(){
                            jQuery(".'.$function_fixed_div__class.'").hide();
                        });';
                    }
                    #hide button (close)
                    
                $function_fixed_div .= '
                });
            \'/
        >';
        
    }
    #script (close)
    
    #content (open)
    if(1==1){
        
        $function_fixed_div .= '
        <div class="'.$function_fixed_div__class.'" style="display:none;">';
            if($function_fixed_div__input_array['dark_bg_div'] == "yes"){
                $function_fixed_div .= '
                <div
                    class="function_fixed_div__hide_button"
                    style="
                        height:500%;
                        width:500%;
                        position:fixed;
                        top:0px;
                        left:0px;
                        background-color:#000;
                        opacity:0.7;
                        z-index:999;
                        cursor:pointer;
                    "
                >
                </div>';
            }
            
            $function_fixed_div .= '
            <div
                style="
                    width:'.$function_fixed_div__wdith.'px;
                    position:fixed;
                    padding:20px;
                    border-radius:20px;
                    border:1px solid black;
                    background-color:#fff;
                    left:50%;
                    top:30%;
                    margin-left:-'.($function_fixed_div__wdith/2).'px;
                    z-index:1000;
                "
            >
                <div style="text-align:center;">
                    <h4 style="display:inline;">
                        '.$function_fixed_div__input_array['title'].'
                    </h4>
                </div>
                <p '.$function_fixed_div__text_align.'>
                    '.$function_fixed_div__input_array['text'].'
                </p>';
                if($function_fixed_div__input_array['hide_button_text'] != 'none'){
                    $function_fixed_div .= '
                    <div style="text-align:center;">
                        <div class="voluno_button function_fixed_div__hide_button" style="display:inline-block">';
                            if(empty($function_fixed_div__input_array['hide_button_text'])){
                                $function_fixed_div .= 'Hide';
                            }else{
                                $function_fixed_div .=
                                $function_fixed_div__input_array['hide_button_text'];
                            }
                        $function_fixed_div .= '
                        </div>
                    </div>';
                }
            $function_fixed_div .= '
            </div>
        </div>';
        
    }
    #content (close)

    #unset (open)
    if(1==1){
        unset(
            $function_fixed_div__version
            ,$function_fixed_div__input_array
            ,$function_fixed_div__wdith
            ,$function_fixed_div__class
            ,$function_fixed_div__fade_duration
            ,$function_fixed_div__text_align
        );
    }
    #unset (close)

}
#type 2, meant for quick notices (close)

?>