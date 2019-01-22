<?php

#default x (open)
if(empty($function_only_first_x_symbols_num)){
    $function_only_first_x_symbols_num = 100;
}
#default x (close)

#abbreviation possible? yes! (open)
if(strlen($function_only_first_x_symbols)>$function_only_first_x_symbols_num){
    
    #jquery (open)
    if($function_only_first_x_symbols__more_button != "no" AND empty($function_only_first_x_symbols__jquery_only_once)){
        
        $function_only_first_x_symbols__jquery_only_once = 1;
        
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
        <img style="position:fixed;z-index:-100;"
        src="'.$function_files['full_url_paths_for_use_via_filename']['emptyforscript.png'].'"
        onload=\'
            jQuery( document ).ready(function() {
                
                jQuery(".function_only_first_x_symbols_click.function_only_first_x_symbols1").click(function(){
                    jQuery(this).parent().find(".function_only_first_x_symbols1").fadeOut(200,function(){
                        jQuery(this).parent().find(".function_only_first_x_symbols2").fadeIn(200);
                    });
                });
                
                jQuery(".function_only_first_x_symbols_click.function_only_first_x_symbols2").click(function(){
                    jQuery(this).parent().find(".function_only_first_x_symbols2").fadeOut(200,function(){
                        jQuery(this).parent().find(".function_only_first_x_symbols1").fadeIn(200);
                    });
                });
                
            });
        \'>';
    }
    #jquery (close)

    #button (open)
    if($function_only_first_x_symbols__more_button != "no"){
        $function_only_first_x_symbols__class = "function_only_first_x_symbols_text function_only_first_x_symbols1";
    }
    #button (close)
    
    #content (open)
    if(1==1){
    $function_only_first_x_symbols_text = '
    <span>
        <span
            class="'.$function_only_first_x_symbols__class.'"
        >
            '.substr($function_only_first_x_symbols, 0, $function_only_first_x_symbols_num).'...
        </span>';
        
        if($function_only_first_x_symbols__more_button != "no"){
            $function_only_first_x_symbols_text .= '
            <a
                class="function_only_first_x_symbols_click function_only_first_x_symbols1"
                style="cursor:pointer;"
                title="Click to expand"
            >
                (more)
            </a>
            
            <span
                class="function_only_first_x_symbols_text function_only_first_x_symbols2"
                style="display:none;"
            >
                '.$function_only_first_x_symbols.'
            </span>
            
            <a
                class="function_only_first_x_symbols_click function_only_first_x_symbols2"
                style="cursor:pointer;display:none;"
                title="Click to collapse"
            >
                (less)
            </a>';
        }
        
    $function_only_first_x_symbols_text .= '
    </span>';
    }
    #content (close)

}
#abbreviation possible? yes! (close)

#abbreviation possible? no! (open)
else{
    $function_only_first_x_symbols_text = $function_only_first_x_symbols; //if x is larger than amount of symbols in string
}
#abbreviation possible? no! (close)

$function_only_first_x_symbols = $function_only_first_x_symbols_text;

unset(
    $function_only_first_x_symbols__class
    ,$function_only_first_x_symbols_num
    ,$function_only_first_x_symbols_text
    ,$function_only_first_x_symbols__more_button
);

?>



