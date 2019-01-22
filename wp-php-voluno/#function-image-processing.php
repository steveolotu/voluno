<?php

#program arrays (open)
if(1==1){
    
    #pre-loading (open)
    if(1==1){
        
        #profile picture (open)
        if($function_propic__type == "profile picture"){
            
            $function_propic__get_image_name_query = $GLOBALS['wpdb']->prepare(
                'SELECT *
                FROM fi4l3fg_voluno_users_extended
                WHERE usersext_id = %s;',
                $function_propic__user_id
            );
            $function_propic__get_image_name_row = $GLOBALS['wpdb']->get_row($function_propic__get_image_name_query);
            
            #user active and image (open)
            if($function_propic__get_image_name_row->usersext_status == 'active' AND !empty($function_propic__get_image_name_row->usersext_imageName)){
                
                $function_propic__original_img_name = $function_propic__get_image_name_row->usersext_imageName;
                $function_propic__image_available = "yes";
                $function_propic__file_identifier = 'file_id';
                
            }
            #user active and image (close)
            
            #user active, no image (open)
            elseif($function_propic__get_image_name_row->usersext_status == 'active' AND empty($function_propic__get_image_name_row->usersext_imageName)){
                
                $function_propic__original_img_name = "+++default-profile-picture.jpg";
                $function_propic__image_available = "no";
                $function_propic__file_identifier = 'file_nicename';
                
            }
            #user active, no image (open)
            
            #user status inactive (open)
            else{
                
                $function_propic__original_img_name = "+++default-profile-picture-inactive.jpg";
                $function_propic__image_available = "no";
                $function_propic__file_identifier = 'file_nicename';
                
            }
            #user status inactive (close)
            
        }
        #profile picture (close)
        
        #thematic image (open)
        elseif($function_propic__type == "thematic"){
            
            #
            if(!empty($function_propic__cropping)){
                
                unset($function_propic__cropping);
                $function_propic__cropping_internal = true;
                
            }else{
                
                $function_propic__cropping_internal = false;
                
            }
            #
            
            $function_propic__file_identifier = 'file_nicename';
            
        }
        #thematic image (close)
        
        #ngo logo (open)
        elseif($function_propic__type == "ngo logo"){
            
            $function_propic__get_image_name_query = $GLOBALS['wpdb']->prepare(
                'SELECT ngo_logo_name
                FROM fi4l3fg_voluno_development_organizations
                WHERE ngo_id = %d;'
                ,$function_propic__ngo_id
            );
            
            $function_propic__get_image_name_row = $GLOBALS['wpdb']->get_row($function_propic__get_image_name_query);
            
            #
            if(!empty($function_propic__get_image_name_row->ngo_logo_name)){
                
                $function_propic__original_img_name = $function_propic__get_image_name_row->ngo_logo_name;
                $function_propic__image_available = "yes";
                $function_propic__file_identifier = 'file_id';
                
            }else{
                
                $function_propic__original_img_name = "+++default-ngo-logo.jpg";
                $function_propic__image_available = "no";
                $function_propic__file_identifier = 'file_nicename';
                
            }
            #
            
        }
        #ngo logo (close)
        
    }
    #pre-loading (close)
    
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
            if($function_propic__file_identifier == 'file_nicename'){
                
                $function_files['files_to_use_by_nicename'] = [
                    $function_propic__original_img_name
                ];
                //nicenames of files to use. must be an array.
                
            }elseif($function_propic__file_identifier == 'file_id'){
                
                $function_files['files_to_use_by_file_id'] = [
                    $function_propic__original_img_name
                ];
                //nicenames of files to use. must be an array.
                
            }
            #use (close)
            
        }
        #input (close)
        
        include('#function-files.php');
        
        #output (open)
        if(1==1){
            
            #use only
            # $function_files['full_url_paths_for_use'] //array: keys = nicenames, values = full paths
            // <img src="'.$function_files['full_url_paths_for_use']['testimage.png'].'">
            
            #$function_files['full_url_paths_for_use']['INSERT_FILENAME_HERE'] #full url path
            #$function_files['full_abs_paths_for_use']['INSERT_FILENAME_HERE'] #full abs path
            #$function_files['only_abs_paths_for_use']['INSERT_FILENAME_HERE'] #abs path without filename
            
            #get filename (open)
            if($function_propic__file_identifier == 'file_id'){
                
                $function_propic__original_img_name = $function_files['filename_via_id'][$function_propic__original_img_name];
                
            }
            #get filename (close)
            
        }
        #output (close)
        
    }
    #function-files.php (v1.0) (close) 
    
    #post-loading (open)
    if(1==1){
        
        #profile picture (open)
        if($function_propic__type == "profile picture"){
            
            $function_propic__program_array = array(
                $function_files['only_abs_paths_for_use_via_filename'][$function_propic__original_img_name].'/',#'profile-pictures-original/', // 0 - path of original files
                $function_files['only_abs_paths_for_use_via_filename'][$function_propic__original_img_name].'/',#"members/".$function_propic__user_id.'/profile-picture/processed/', // 1 - path of final files
                "jpg", // 2 - image format
                "100", // 3 - quality
                true // 4 - crop or not
            );
            
        }
        #profile picture (close)
        
        #thematic image (open)
        elseif($function_propic__type == "thematic"){
            
            $function_propic__program_array = array(
                $function_files['only_abs_paths_for_use_via_filename'][$function_propic__original_img_name].'/', // 0 - path of original files
                $function_files['only_abs_paths_for_use_via_filename'][$function_propic__original_img_name].'/', // 1 - path of final files
                "png", // 2 - image format
                "100", // 3 - quality
                $function_propic__cropping_internal // 4 - crop or not
            );
            
        }
        #thematic image (close)
        
        #ngo logo (open)
        elseif($function_propic__type == "ngo logo"){
            
            $function_propic__program_array = array(
                'ngo-logos-original/', // 0 - path of original files
                "ngos/".$function_propic__ngo_id.'/logo/processed/', // 1 - path of final files
                "jpg", // 2 - image format
                "100", // 3 - quality
                false // 4 - crop or not
            );
            
        }
        #ngo logo (close)
        
    }
    #post-loading (close)
    
}
#program arrays (close)

#img paths (open)
if(1==1){
    
    #image name and path (open)
    if(1==1){ //find image
        
        $function_propic__original_img_path_abs = wp_upload_dir()['path'].'/'.$function_propic__program_array[0];
        $function_propic__new_img_path_abs = wp_upload_dir()['path'].'/'.$function_propic__program_array[1];
        $function_propic__new_img_path_web = wp_upload_dir()['url'].'/'.$function_propic__program_array[1];
        
    }
    #image name and path (close)
    
    #original full path (needed to load image + get extension) (open)
    if(1==1){
        
        $function_propic__original_img_name_and_path =
        $function_propic__original_img_path_abs.
        $function_propic__original_img_name;
        
    }
    #original full path (needed to load image + get extension) (close)
    
    #new full path -> where to save + -> new full web path (open)
    if(1==1){
        
        $function_propic__original_img_pathinfo = pathinfo($function_propic__original_img_name_and_path); //required to get isolated filename
        
        //required for processing and full filename
        $function_propic__new_img_suffix = $function_propic__geometry[0].'x'.$function_propic__geometry[1];
        
        #
        if(!empty($function_propic__rotate)){ //rotation
            
            $function_propic__new_img_suffix = $function_propic__new_img_suffix.'rotate('.$function_propic__rotate.')';
            
        }
        #
        
        #
        if($function_propic__type == "thematic"){
            
            //required for full new absolute path and full web path
            $function_propic__new_img_name = 
            $function_propic__original_img_pathinfo["filename"].
            '-'.$function_propic__new_img_suffix.
            '.'.
            $function_propic__program_array[2];
            
        }elseif($function_propic__type == "profile picture"){
            
            //required for full new absolute path and full web path
            $function_propic__new_img_name =
            'profile-picture'.
            '-'.$function_propic__new_img_suffix.
            '.'.
            $function_propic__program_array[2];
            
        }elseif($function_propic__type == "ngo logo"){
            
            //required for full new absolute path and full web path
            $function_propic__new_img_name =
            'ngo-logo'.
            '-'.$function_propic__new_img_suffix.
            '.'.
            $function_propic__program_array[2];
            
        }
        #
        
        $function_propic__new_img_name_and_path_abs = //required to check if already exists
        $function_propic__new_img_path_abs.$function_propic__new_img_name;
        
    }
    #new full path -> where to save + -> new full web path (close)
    
}
#img paths (close)

#processing (open)
if(1==1){ ###!file_exists($function_propic__new_img_name_and_path_abs)
    
    $function_propic__processing = wp_get_image_editor( $function_propic__original_img_name_and_path );
    
    if(!is_wp_error($function_propic__processing)){ //for some strange reason, this is required.
        
        #min size (open)
        if(!empty($function_propic__min_geometry)){
            
            $old_size = $function_propic__processing->get_size();
            $old_width = $old_size['width'];
            $old_height = $old_size['height'];
            
            $old_size_ratio = $old_height / $old_width;
            
            #if only one side given, fill the other one too (open)
            if(1==1){
                
                #
                if($function_propic__geometry[1] == NULL){
                    
                    $function_propic__geometry[1] = $function_propic__geometry[0];
                    
                }elseif($function_propic__geometry[1] == NULL){
                  
                    $function_propic__geometry[0] = $function_propic__geometry[1];
                    
                }
                #
                
            }
            #if only one side given, fill the other one too (close)
            
            #now that both sizes are given, make sure the bigger one matters (open)
            if($function_propic__geometry[0] != NULL AND $function_propic__geometry[1] != NULL){
                
                $new_size_ratio = $function_propic__geometry[1] / $function_propic__geometry[0];
                
                #
                if($old_size_ratio < $new_size_ratio){
                    
                    $function_propic__geometry[0] = NULL;
                    
                }else{
                    
                    $function_propic__geometry[1] = NULL;
                    
                }
                #
                
            }
            #now that both sizes are given, make sure the bigger one matters (close)
            
        }
        #min size (close)
        
        #resize (open)
        if(!empty($function_propic__geometry)){
            
            $function_propic__processing->resize(
                $function_propic__geometry[0],
                $function_propic__geometry[1],
                $function_propic__program_array[4]
            );
            
        }
        #resize (close)
        
        $function_propic__processing->set_quality($function_propic__program_array[3]);
        
        #
        if(!empty($function_propic__rotate)){
            
            $function_propic__processing->rotate($function_propic__rotate);
            
        }
        #
        
        //change image format and get filename
        $function_propic__new_generated_filename__full_abs_path
        = $function_propic__processing->generate_filename(
            $function_propic__new_img_suffix,
            $function_propic__new_img_path_abs,
            $function_propic__program_array[2]
        );
        
        $img_data = $function_propic__processing->save($function_propic__new_img_name_and_path_abs);
        
    }
    
}
#processing (close)

#output (prepare for using in website) (open)
if(1==1){
    
    $function_propic__new_img_pathinfo = pathinfo($function_propic__new_img_name_and_path_abs); //required to remove abs path
    
    //get web-path, other path doesn't work in html <img> tag
    $function_propic__new_img_name_and_path_web = 
    $function_propic__new_img_path_web.
    $function_propic__new_img_pathinfo['basename'];
    
    $function_propic = $function_propic__new_img_name_and_path_web; //save in easy variable
    
    $function_propic_abs = $function_propic__new_img_name_and_path_abs;
    
}
#output (prepare for using in website) (close)

#unset (open)
if(1==1){
    
    unset(
        $function_propic__geometry,
        $function_propic__min_geometry,
        $function_propic__rotate
    );
    
}
#unset (close)

?>