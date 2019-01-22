<?php

#processing (open)
if(1==1){
    
    #preparation (open)
    if(1==1){
        
        $function_file_icons_size = 50;
        $function_file_icons_results = $function_file_icons;
        unset($function_file_icons);
        
	unset($function_file_icons_delete);
	
    }
    #preparation (close)
    
    #jQuery (open)
    if(empty($function_file_icons_only_once)){
        
        $function_file_icons_only_once = 1;
        
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
            style="display:none;"
            onload=
            \'
              jQuery(document).ready(function() {
	      
                  jQuery(".function_file_icons_div").hover(function(){
                      jQuery(this).css("background-color","#FF9B51");
                  },function(){
                      jQuery(this).css("background-color","");
                  });';
		  
		    #delete option? (open)
		    if($function_file_icons_delete_option == "yes"){
			echo '
			jQuery(".function_file_icons_delete_button").click(function(){
			  jQuery(this).parent().find(".function_file_icons_delete_div").fadeIn(300);
			});
			
			jQuery(".function_file_icons_delete_div_cancel").click(function(){
			  jQuery(".function_file_icons_delete_div").fadeOut(300);
			});
			
			var function_file_icons_deleted_files_ids = "";
			
			jQuery(".function_file_icons_delete_div_confirm").click(function(){
			  jQuery(this).parent().parent().parent().parent().find(".function_file_icons_deleted_symbol").fadeIn(300);
			  jQuery(this).parent().parent().parent().find(".function_file_icons_delete_button").fadeOut(300);
			  jQuery(".function_file_icons_delete_div").fadeOut(300);
			  function_file_icons_deleted_files_ids = '.
			      'function_file_icons_deleted_files_ids+jQuery(this).find(".function_file_icons_delete_div_id").html()+",";
			  jQuery(".function_file_icons_deleted_files_ids").html(function_file_icons_deleted_files_ids.slice(0,-1));
			});';
		    }
		    #delete option? (close)
		
	      echo '
              });
            \'
        />';
        
    }
    #jQuery (close)
    
    #loop (open)
    for($function_file_icons_i=0;$function_file_icons_i<count($function_file_icons_results);$function_file_icons_i++){
        
        #get mime type (open)
        if(1==1){
            
            if($function_file_icons_results[$function_file_icons_i]->vol_file_type_general == "task"){
                $function_file_icons__full_file_path_abs =
		    wp_upload_dir()['path'].
		    '/items/tasks/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_type_id.
		    '/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_name;
		    
                $function_file_icons__full_file_path_web =
		    wp_upload_dir()['url'].
		    '/items/tasks/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_type_id.
		    '/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_name;
                
            }elseif($function_file_icons_results[$function_file_icons_i]->vol_file_type_general == "message"){
                $function_file_icons__full_file_path_abs =
		    wp_upload_dir()['path'].
		    '/message_attachments/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_type_id. //conversation id
		    '/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_name;
		    
                $function_file_icons__full_file_path_web =
		    wp_upload_dir()['path'].
		    '/message_attachments/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_type_id. //conversation id
		    '/'.
		    $function_file_icons_results[$function_file_icons_i]->vol_file_name;
	    }
          
            $function_file_icons__finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic"); //load plugin
            $function_file_icons__fileMimeType =
                $function_file_icons__finfo->file($function_file_icons__full_file_path_abs);
                
        }
        #get mime type (close)
        
        #get file size (open)
        if(1==1){
            
            $function_file_icons__size_bytes = filesize($function_file_icons__full_file_path_abs);
            
            #bytes (open)
            if($function_file_icons__size_bytes < 1024){
              $function_file_icons__size = number_format($function_file_icons__size_bytes,2)." B";
            }
            #bytes (close)
            
            #kilo bytes (open)
            elseif($function_file_icons__size_bytes < 1024^2){
              $function_file_icons__size = number_format($function_file_icons__size_bytes / (1024^1),2)." KB";
            }
            #kilo bytes (close)
            
            #mega bytes (open)
            elseif($function_file_icons__size_bytes < 1024^3){
              $function_file_icons__size = number_format($function_file_icons__size_bytes / (1024^2),2)." MB";
            }
            #mega bytes (close)
            
            #giga bytes (open)
            elseif($function_file_icons__size_bytes < 1024^4){
              $function_file_icons__size = number_format($function_file_icons__size_bytes / (1024^3),2)." GB";
            }
            #giga bytes (close)
            
            #tera bytes (open)
            elseif($function_file_icons__size_bytes < 1024^5){
              $function_file_icons__size = number_format($function_file_icons__size_bytes / (1024^4),2)." TB";
            }
            #tera bytes (close)
            
            
            
            
            
        }
        #get file size (close)
        
        #get file extension img (open)
        if(1==1){
            
            
            $function_file_icons_get_icon_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                FROM fi4l3fg_voluno_file_extensions
                                                                WHERE vol_file_ext_mime_type = %s;',
                                                                $function_file_icons__fileMimeType);
            $function_file_icons_get_icon_row = $GLOBALS['wpdb']->get_row($function_file_icons_get_icon_query);
            
            #function-image-processing (open)
            if(1==1){
                #thematic only
                  $function_propic__type = "thematic";
                  if(empty($function_file_icons_get_icon_row->vol_file_ext_img_name)){
                    $function_propic__original_img_name = "file_extension_unknown.png";
                  }else{
                    $function_propic__original_img_name = $function_file_icons_get_icon_row->vol_file_ext_img_name;
                  }
               #all
                 $function_propic__geometry = array($function_file_icons_size,$function_file_icons_size); //optional, if e.g. only width: 300, NULL; vice versa
               include('#function-image-processing.php');
            }
            #function-image-processing (close)
            
        }
        #get file extension img (close)
        
        #displayed file name (open)
        if(1==1){
            
	    if(empty($function_file_icons_results[$function_file_icons_i]->vol_file_name_original)){
		$function_file_icons_display_filename = $function_file_icons_results[$function_file_icons_i]->vol_file_name;
	    }else{
		$function_file_icons_display_filename = $function_file_icons_results[$function_file_icons_i]->vol_file_name_original;
	    }
	    
            if(strlen($function_file_icons_display_filename) > 20){
              $function_file_icons__file_name =
                  substr($function_file_icons_display_filename,0,10).
                  ' ...'.
                  substr($function_file_icons_display_filename,-3);
            }else{
              $function_file_icons__file_name = $function_file_icons_display_filename;
            }
            
        }
        #displayed file name (close)
        
        #output (open)
        if(1==1){
	    
	    $function_file_icons_preliminary = '
		<div
		    style="
			width:170px;
			height:'.($function_file_icons_size+10).'px;
			z-index:1;
			margin:5px 0px 0px 5px;
			display:inline-block;
		    "
		>
		    <div
			class="function_file_icons_deleted_symbol"
			style="
			    position:absolute;
			    display:none;
			    font-size:400%;
			    -webkit-touch-callout: none;
			    -webkit-user-select: none;
			    -khtml-user-select: none;
			    -moz-user-select: none;
			    -ms-user-select: none;
			    user-select: none;
			    ">
			&#10060;
		    </div>
		    <a href="'.$function_file_icons__full_file_path_web.'" download
			    class="function_file_icons_div"
			    title="Click to download:&#013;'.$function_file_icons_display_filename.'"
			    style="
				padding-left:5px;
				border-radius:20px;
				border:1px solid black;
				height:100%;
				width:100%;
				vertical-align:middle;
				text-align:center;
				display:block;
				color:#000 !important;
			    "
			>
			    <table>
				<tr>
				    <td style="width:'.$function_file_icons_size.'px;">
					<img src="'.$function_propic.'">
				    </td>
				    <td
					style="';
				
	    $function_file_icons .= $function_file_icons_preliminary;
	    $function_file_icons_delete .= $function_file_icons_preliminary;
	    
	    $function_file_icons .= 'vertical-align:middle;';
	    $function_file_icons_delete .= 'vertical-align:top;';
				
	    $function_file_icons_preliminary = '
					"
				    >
					'.$function_file_icons__file_name.'
					<br>
					'.$function_file_icons__size.'
				    </td>
				</tr>
			    </table>
		    </a>';
	    
	    $function_file_icons .= $function_file_icons_preliminary;
	    $function_file_icons_delete .= $function_file_icons_preliminary;
	    
	    #delete option (open)
	    if($function_file_icons_delete_option == "yes"){
		
	    $function_file_icons_delete .= '
		    <div>
			<div
			    class="voluno_button function_file_icons_delete_button"
			    style="
				padding:2px;
				width:60px;
				margin:-22px 0px 0px 60px;
			    "
			    title="Click to delete this file"
			>
			    Delete
			</div>
			<div
			    class="function_file_icons_delete_div"
			    style="
				background-color:#fff;
				border:1px solid black;
				border-radius:20px;
				width:90px;
				padding:10px;
				position:absolute;
				margin:-60px 0px 0px 65px;;
				display:none;
			    "
			>
			    Are you sure?
			    <br>
			    <div style="margin:10px 0px 5px 0px;text-align:center;">
				<div
				    class="voluno_button function_file_icons_delete_div_cancel"
				    style="display:inline;margin-right:5px;padding:5px;"
				>
				    No
				</div>
				<div
				    class="voluno_button function_file_icons_delete_div_confirm"
				    style="display:inline;padding:5px;"
				>
				    Yes
				    <span style="display:none;" class="function_file_icons_delete_div_id">'.
					$function_file_icons_results[$function_file_icons_i]->vol_file_id.
				    '</span>
				</div>
			    </div>
			</div>
		    </div>';
	    }
	    #delete option (close)
		    
	    $function_file_icons_preliminary = '
		</div>';
		
	    $function_file_icons .= $function_file_icons_preliminary;
	    $function_file_icons_delete .= $function_file_icons_preliminary;
		
        }
        #output (close)
        
        
    }
    #loop (close)
    
    $function_file_icons = '
	<div style="text-align:left;">
	    '.$function_file_icons.'
	</div>';
	
    $function_file_icons_delete = '
	<div style="text-align:left;">
	    '.$function_file_icons_delete.'
	</div>
	<span style="display:none;" class="function_file_icons_deleted_files_ids"></span>';
	
}
#processing (close)

?>