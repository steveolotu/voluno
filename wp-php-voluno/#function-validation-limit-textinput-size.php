<?php


$function_textinput_limit__internal = $function_textinput_limit;
unset($function_textinput_limit);
$function_textinput_limit__div_class = 'function_textinput_limit_div_'.$function_textinput_limit__internal['class'];


#defaults (open)
if(1==1){
    
    $function_textinput_limit__default_array = array(
        array(
            'key' => 'if_middle1'
            ,'text' => ''
        )
        ,array(
            'key' => 'if_middle2'
            ,'text' => ' of '
        )
        ,array(
            'key' => 'if_middle3'
            ,'text' => ' characters left.'
        )
        ,array(
            'key' => 'if_max1'
            ,'text' => 'You have reached the character limit of '
        )
        ,array(
            'key' => 'if_max2'
            ,'text' => '.'
        )
    );
    
    for($acm=0;$acm<count($function_textinput_limit__default_array);$acm++){
        
        if(empty($function_textinput_limit__internal[$function_textinput_limit__default_array[$acm]['key']])){
            $function_textinput_limit__internal[$function_textinput_limit__default_array[$acm]['key']]
                = $function_textinput_limit__default_array[$acm]['text'];
        }
        
    }
}
#defaults (close)



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
    
    $function_textinput_limit .= '
    <img
        style="display:none;"
        src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
        onload=
        \'
            jQuery(document).ready(function() {
                ';
                
                #define variables on load (open)
                if(1==1){
                    
                    $function_textinput_limit .= '
                    var function_textinput_limit__len_'.$function_textinput_limit__internal['class'].
                        ' = jQuery(".'.$function_textinput_limit__internal['class'].'").val().length;
                        
                    jQuery(".function_textinput_limit__len_'.$function_textinput_limit__internal['class'].'")'.
                        '.html(function_textinput_limit__len_'.$function_textinput_limit__internal['class'].');
                        
                    var function_textinput_limit__max_'.$function_textinput_limit__internal['class'].
                        ' = jQuery(".'.$function_textinput_limit__internal['class'].'").attr("maxLength");
                    ';
                    
                }
                #define variables on load (close)
                
                #on eventhandlers (open)
                if(1==1){
                    
                    $function_textinput_limit .= '
                    jQuery(".'.$function_textinput_limit__internal['class'].'").on("keyup keypress focus blur change", function(e){
                        
                        jQuery(".'.$function_textinput_limit__div_class.'").fadeIn(300);
                        
                        function_textinput_limit__len_'.$function_textinput_limit__internal['class'].
                            ' = jQuery(".'.$function_textinput_limit__internal['class'].'").val().length;
                            
                        jQuery(".function_textinput_limit__len_'.$function_textinput_limit__internal['class'].'")'.
                            '.html(function_textinput_limit__len_'.$function_textinput_limit__internal['class'].');
                    ';
                        
                        #if length = max (open)
                        if(1==1){
                            
                            $function_textinput_limit .= '
                            if(function_textinput_limit__len_'.$function_textinput_limit__internal['class'].
                                ' >= function_textinput_limit__max_'.$function_textinput_limit__internal['class'].') {
                                    
                                    jQuery(".'.$function_textinput_limit__div_class.'")'.
                                    '.html("'.$function_textinput_limit__internal['if_max1'].
                                            '"+function_textinput_limit__max_'.$function_textinput_limit__internal['class'].'+"'.
                                            $function_textinput_limit__internal['if_max2'].'").css("color","#F86A00");
                            ';
                            
                        }
                        #if length = max (close)
                        
                        #if length = 0 (open)
                        if(!empty($function_textinput_limit__internal['if_zero'])){
                            
                                $function_textinput_limit .= '
                                }else if(function_textinput_limit__len_'.$function_textinput_limit__internal['class'].' == 0){
                                
                                jQuery(".'.$function_textinput_limit__div_class.'")'.
                                    '.html("'.$function_textinput_limit__internal['if_zero'].'")'.
                                    '.css("color","red");
                                ';
                                
                        }
                        #if length = 0 (close)
                        
                        #if 0 < length < max (open)
                        if(1==1){
                            
                            $function_textinput_limit .= '
                            }else{
                                jQuery(".'.$function_textinput_limit__div_class.'")'.
                                '.html("'.$function_textinput_limit__internal['if_middle1'].
                                        '"+(function_textinput_limit__max_'.$function_textinput_limit__internal['class'].
                                        '-'.
                                        'function_textinput_limit__len_'.$function_textinput_limit__internal['class'].')+"'.
                                        $function_textinput_limit__internal['if_middle2'].
                                        '"+function_textinput_limit__max_'.$function_textinput_limit__internal['class'].'+"'.
                                        $function_textinput_limit__internal['if_middle3'].'").css("color","#F86A00");
                            }
                            ';
                            
                        }
                        #if 0 < length < max (close)
                    
                    $function_textinput_limit .= '
                    });
                    ';
                    
                }
                #on eventhandlers (close)
                
            $function_textinput_limit .= '
            });
        \'
    />';
}
#script (close)

#warning_div (open)
if(1==1){
    
    $function_textinput_limit .= '
    <div style="color:#F86A00;" class="'.$function_textinput_limit__div_class.'">
    </div>
    <div style="display:none;" class="function_textinput_limit__len_'.$function_textinput_limit__internal['class'].'"></div>
    ';
    
}
#warning_div (close)

#unset (open)
if(1==1){
    unset(
        $function_textinput_limit_internal
        ,$function_textinput_limit__div_class
        ,$function_textinput_limit__default_array
    );
}
#unset (close)

?>