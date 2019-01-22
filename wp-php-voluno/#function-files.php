<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
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
				
				#upload + add (open)
				if(1==1){
					
					$function_files['file_author_id'] = 'current_user';// id of author of files. default: 'current_user'
					
					//if it's from form
					$function_files['file_input_field_name'] = 'uploaded_file'; //E.g.: 'message_attachments'; <- from $_FILES['message_attachments'];
					// Name of specific form file input field. Can be one or more files.
					
					//if it's from the file system
					$function_files['file_hashname'] = 'INSERT_FILE_HASHNAME_HERE';
					
					$function_files['categorization_array'] = [ //type general, type specific, etc. Helps to categorize the file.
						['name' => 'testing','id' => '3445'], //level 1
						['name' => 'function','id' => '55'], //level 2
						['name' => 'uploading','id' => '6'] //level 3
					];
					
					$function_files['mime_types_array'] = []; //array of allowed mime types. If empty, all mime types stored in fi4l3fg_voluno_file_extensions are applied.
					//for example: ['image/gif','image/jpeg','image/jpg','image/png','image/bmp','image/tiff','image/tif'];
					
					$function_files['reduce_image_size'] = ['x' => 600,'y' => 600,'quality_0_to_100' => 100]; //if image, the size can be reduced. optional.
					
					//if image, the image can be cropped. optional.
					$function_files['internal']['crop_image']['start_width'] = intval($_POST['crop_start_width']); //distance from the left
					$function_files['internal']['crop_image']['start_height'] = intval($_POST['crop_start_height']); //distance from the top
					$function_files['internal']['crop_image']['end_square'] = intval($_POST['crop_square']); //size of the image###
					
					$function_files['new_file_names_array'] = [ //if empty, original files names are stored. If not empty, these file names are stored. Must be an array.
						'INSERT_FILENAME_HERE_WITH_EXTENSION'
					];
					
				}
				#upload + add (close)
				
				#delete (open)
				if(1==1){
					
					$function_files['vol_file_ids_to_delete_array'] = ['a','b','vol_file_id_5','vol_file_id_6'];
					//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
					
				}
				#delete (close)
				
				#use (open)
				if(1==1){
					
					$function_files['files_to_use_by_nicename'] = [
						'ichwarhier_haha.bmp'
					];
					//nicenames of files to use. must be an array. only allowed for system images, to prevent name conflicts.
					
					$function_files['files_to_use_by_file_id'] = [
						'vol_file_id_232'
					];
					//nicenames of files to use. must be an array.
					
				}
				#use (close)
				
			}
			#input (close)
			
			include('#function-files.php');
			
			#output (open)
			if(1==1){
				
				#upload (open)
				if(1==1){
					
					#$function_files['error']; //error message in case the upload doesn't work. Otherwise empty.
					// - "File type not allowed: FILETYPE"
					
					#$function_files['inserted_file_ids_array']; //array of ids of inserted files. e.g. ['vol_file_id_222','vol_file_id_123']
					
				}
				#upload (close)
				
                #use (open)
                if(1==1){
					
					# $function_files['full_url_paths_for_use'] //array: keys = nicenames, values = full paths
					// <img src="'.$function_files['full_url_paths_for_use']['testimage.png'].'">
					
					#$function_files['full_url_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full url path
					#$function_files['full_url_paths_for_use_via_id']['INSERT_ID_HERE'] #full url path
					
					#$function_files['full_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #full abs path
					#$function_files['full_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #full abs path
					
					#$function_files['only_abs_paths_for_use_via_filename']['INSERT_FILENAME_HERE'] #abs path without filename
					#$function_files['only_abs_paths_for_use_via_id']['INSERT_ID_HERE'] #abs path without filename
					
					#$function_files['filename_via_id']['INSERT_ID_HERE'] #filename
					
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
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2000.01.01, Steve
		## Last update of all instances this function is used: 2000.01.01, Steve
		
		# Here, add a short summary of what the function does.
		# This shouldn't be more than max. 10 lines.
		
		// Full documentation of this file with references to actual code (documentation number) which is then written behind
		// specific lines of code, above them or being the if(1==1){ code. For example ///1
		// These references should include three dashes and then an ascending integer. ///2
		// To find the next documentation number, see wiki article of the php file.
		// Note: Of course, not everything needs to be written in here, only the big picture. Small
		// or obvious things can be written into the code itself.
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_files['internal'] = $function_files;
	
	#file_author_id (open)
	if(empty($function_files['internal']['file_author_id']) OR $function_files['internal']['file_author_id'] == 'current_user'){
		
		$function_files['internal']['file_author_id'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
		
	}
	#file_author_id (close)
	
	$function_files['internal']['wp_upload_dir_function'] = wp_upload_dir();
	$function_files['internal']['storage_dir_abs'] = $function_files['internal']['wp_upload_dir_function']['path'].'/storage_5ougou8rlaxlacroaxo1c7iaspleki';
	
	$function_files['internal']['usage_dir_folder_name'] = '/usage_kiesouq42spiahoaxiuviukl585e0l';
	$function_files['internal']['usage_dir_abs'] = $function_files['internal']['wp_upload_dir_function']['path'].$function_files['internal']['usage_dir_folder_name'];
	$function_files['internal']['usage_dir_url'] = $function_files['internal']['wp_upload_dir_function']['url'].$function_files['internal']['usage_dir_folder_name'];
	
}
#input + var definitions (close)

#upload files (open)
if($function_files['internal']['action'] == 'upload'){
	
	#input data array transformation (open)
	if(count($_FILES[$function_files['internal']['file_input_field_name']]['name']) == 1){
		//if there is only one input file
		
		$function_files['internal']['files'][0]['error'] = $_FILES[$function_files['internal']['file_input_field_name']]['error'];
		$function_files['internal']['files'][0]['name'] = $_FILES[$function_files['internal']['file_input_field_name']]['name'];
		$function_files['internal']['files'][0]['size'] = $_FILES[$function_files['internal']['file_input_field_name']]['size'];
		$function_files['internal']['files'][0]['tmp_name'] = $_FILES[$function_files['internal']['file_input_field_name']]['tmp_name'];
		$function_files['internal']['files'][0]['type'] = $_FILES[$function_files['internal']['file_input_field_name']]['type'];
		
	}elseif(count($_FILES[$function_files['internal']['file_input_field_name']]['name']) > 1){
		//if there are several input files
		
		#loop (open)
		for($amn=0;$amn<count($_FILES[$function_files['internal']['file_input_field_name']]['name']);$amn++){
			
			$function_files['internal']['files'][$amn]['error'] = $_FILES[$function_files['internal']['file_input_field_name']]['error'][$amn];
			$function_files['internal']['files'][$amn]['name'] = $_FILES[$function_files['internal']['file_input_field_name']]['name'][$amn];
			$function_files['internal']['files'][$amn]['size'] = $_FILES[$function_files['internal']['file_input_field_name']]['size'][$amn];
			$function_files['internal']['files'][$amn]['tmp_name'] = $_FILES[$function_files['internal']['file_input_field_name']]['tmp_name'][$amn];
			$function_files['internal']['files'][$amn]['type'] = $_FILES[$function_files['internal']['file_input_field_name']]['type'][$amn];
			
		}
		#loop (close)
		
	}elseif(!empty($function_files['internal']['file_hashname'])){
		
		$function_files['internal']['files'] = 'placeholder';
		
		$function_files['internal']['full_abs_original_file_path'] = $function_files['internal']['storage_dir_abs'].'/'.$function_files['internal']['file_hashname'];
		
		#get original filename (open)
		if(1==1){
			
			$function_files['internal']['get_original_filename']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_files2
				WHERE vol_file_hashname = %s;',
				$function_files['internal']['file_hashname']
			);
			$function_files['internal']['get_original_filename']['row'] = $GLOBALS['wpdb']->get_row($function_files['internal']['get_original_filename']['query']);
			
		}
		#get original filename (close)
		
		$function_files['internal']['full_abs_temp_file_path'] =
		$function_files['internal']['storage_dir_abs'].'/'.$function_files['internal']['get_original_filename']['row']->vol_file_nicename;
		
		//in case the file already exists in the filesystem, it isn't replaced but copied.
		copy(
			$function_files['internal']['full_abs_original_file_path'],
			$function_files['internal']['full_abs_temp_file_path']
		);
		
	}
	#input data array transformation (close)
	
	#insert files (open)
	for($amo=0;$amo<count($function_files['internal']['files']);$amo++){
		
		#upload files (open)
		if(1==1){
		    
		    #upload file to general uploads directory (open)
		    if(empty($function_files['internal']['file_hashname'])){
				
				#activate wp file upload (open)
				if(!function_exists('wp_handle_upload')){
					
					require_once(ABSPATH.'wp-admin/includes/file.php');
					
				}
				#activate wp file upload (close)
				
				$function_files['internal']['wp_uploaded'] = wp_handle_upload(
					$function_files['internal']['files'][$amo],
					array('test_form'=>false)
				);
				
				$function_files['internal']['full_abs_temp_file_path'] = $function_files['internal']['wp_uploaded']['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
				
		    }
		    #upload file to general uploads directory (close)
			
			### for some reason, finfo isn't working anymore. apparently, switching to vps hosting deactivated the finfo object, which is
			#default above php5.3. so it would possibly have to be reactivted, but apparently only the support may do that. "the server admin".
			#see php config in cpanel of bluehost or https://www.youtube.com/watch?v=8hHyT0Tbi9k
			
			#phpinfo();
			#$test = new finfo; //load plugin
			#$function_files['internal']['finfo_mimetype'] =
			#$function_files['internal']['finfo']->file($function_files['internal']['full_abs_temp_file_path']);
			
			#edit images (open)
			if(1==1 #in_array( ###
				#$function_files['internal']['finfo_mimetype'],
				#['image/gif','image/jpeg','image/jpg','image/png','image/bmp','image/tiff','image/tif']
			#)
			){
				
				#size (open)
				if(!empty($function_files['internal']['reduce_image_size'])){
					
					$function_files['internal']['wp_get_image_editor'] = wp_get_image_editor($function_files['internal']['full_abs_temp_file_path']);
					
					#check required by wp_function, no idea why (open)
					if(!is_wp_error($function_files['internal']['wp_get_image_editor'])){ //for some strange reason, this is required.
						
						$function_files['internal']['wp_get_image_editor']->resize(
							$function_files['internal']['reduce_image_size']['x'],
							NULL,
							false
						);
						$function_files['internal']['wp_get_image_editor']->resize(
							NULL,
							$function_files['internal']['reduce_image_size']['y'],
							false
						);
						$function_files['internal']['wp_get_image_editor']->set_quality($function_files['internal']['reduce_image_size']['quality_0_to_100']);
						$function_files['internal']['wp_get_image_editor']->save($function_files['internal']['full_abs_temp_file_path']);
						
					}
					#check required by wp_function, no idea why (close)
					
				}
				#size (close)
				
				#cropping (open)
				if(!empty($function_files['internal']['crop_image'])){
					
					$function_files['internal']['wp_get_image_editor'] = wp_get_image_editor($function_files['internal']['full_abs_temp_file_path']);
					
					#check required by wp_function, no idea why (open)
					if(!is_wp_error($function_files['internal']['wp_get_image_editor'])){ //for some strange reason, this is required.
						
						$function_files['internal']['wp_get_image_editor']->crop(
							$function_files['internal']['crop_image']['start_width'],
							$function_files['internal']['crop_image']['start_height'],
							$function_files['internal']['crop_image']['end_square'],
							$function_files['internal']['crop_image']['end_square'],
							500, 500, false
						);
						$function_files['internal']['wp_get_image_editor']->save($function_files['internal']['full_abs_temp_file_path']);
						
					}
					#check required by wp_function, no idea why (close)
					
				}
				#cropping (close)
				
			}
			#edit images (close)
			
		    #get file info (open)
		    if(1==1){
				
				#hashname (open)
				if(1==1){
					
					$function_files['internal']['file']['hashname'] = substr(str_shuffle(
						MD5(microtime()).MD5(microtime()).
						MD5(microtime()).MD5(microtime()).
						MD5(microtime()).MD5(microtime()).
						mt_rand()
					), 0, 50);
					
				}
				#hashname (close)
				
				#nicename (open)
				if(empty($function_files['new_file_names_array'][$amo])){
					
					$function_files['internal']['file']['nicename'] = pathinfo($function_files['internal']['full_abs_temp_file_path'],PATHINFO_BASENAME);
					
				}else{
					
					$function_files['internal']['file']['nicename'] =
					$function_files['new_file_names_array'][$amo];
					
				}
				#nicename (close)
				
				$function_files['internal']['file']['filesize'] = filesize($function_files['internal']['full_abs_temp_file_path']);
				$function_files['internal']['file']['mime'] = '(finfo_temporarily_disabled)';###$function_files['internal']['finfo_mimetype'];
				
		    }
		    #get file info (close)
		    
		    #check if mime type is valid (open)
		    if(1==2){ ###
			    
				#allowed file extensions (open)
				if(empty($function_files['internal']['mime_types_array'])){
					
					$function_files['internal']['mime_types']['query'] = $GLOBALS['wpdb']->prepare(
						'SELECT *
						FROM fi4l3fg_voluno_file_extensions
						WHERE vol_file_ext_mime_type = %s;'
						,$function_files['internal']['file']['mime']);
					$function_files['internal']['mime_types']['row'] = $GLOBALS['wpdb']->get_row($function_files['internal']['mime_types']['query']);
					
				}
				#allowed file extensions (close)
			    
				#if mime type is not valid (open)
				if(empty($function_files['internal']['mime_types']['row']) AND
				   !in_array($function_files['internal']['file']['mime'],$function_files['internal']['mime_types_array'])){
					
					$function_files['output']['error'] = 'File type not allowed: '.$function_files['internal']['file']['mime'];
					
				}
				#if mime type is not valid (close)
				
		    }
		    #check if mime type is valid (close)
			
			#if file is too large (open)
		    if(1==2){
			
			$filesize = filesize($full_temp_path_abs);
			
			#get size of current task files (open)
			if(1==1){
			    $task_files_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_files
								WHERE vol_file_type_general = "task"
								    AND vol_file_type_id = %d;'
								,$get_id);
			    $task_files_results = $GLOBALS['wpdb']->get_results($task_files_query);
			    
			    unset($summed_size_of_all_task_files);
			    #loop (open)
			    for($four=0;$four<count($task_files_results);$four++){
				
				$filesize_calculation = filesize($unfull_final_path_abs.'/'.$task_files_results[$four]->vol_file_name);
				$summed_size_of_all_task_files = $summed_size_of_all_task_files+$filesize_calculation;
				
			    }
			    #loop (close)
			    
			}
			#get size of current task files (open)
			
			#if task space used up (open)
			if($filesize + $summed_size_of_all_task_files > $max_task_size){ //50 MB
			    
			    $file_upload_error = "file space used up".(pow(1024,2) * 50);
			    
			}
			#if task space used up (close)
			
			#if file too big (open)
			if($filesize > pow(1024,2) * 5){ //5 MB
			    
			    $file_upload_error = "file too large".(pow(1024,2) * 5);
			    
			}
			#if file too big (close)
			
		    }
		    #if file is too large (close)
		    
		    #if file valid (open)
		    if(empty($function_files['output']['error'])){
				
				#full final path
				$function_files['internal']['full_abs_final_path'] = $function_files['internal']['storage_dir_abs'].'/'.$function_files['internal']['file']['hashname'];
				
				rename(
					$function_files['internal']['full_abs_temp_file_path'],
					$function_files['internal']['full_abs_final_path']
				);
				
		    }
		    #if file valid (close)
		    
		}
		#upload files (close)
		
		#insert files in database (open)
		if(empty($function_files['output']['error'])){
			
		    $file_path_info_final = pathinfo($full_final_path_abs);
		    
			#prelim insert to get next id (open)
			if(1==1){
				
				$GLOBALS['wpdb']->insert(
					'fi4l3fg_voluno_files2',
					array(
						'vol_file_hashname' => 'preliminary insert to get next id',
						'vol_file_user_id' => $function_files['internal']['file_author_id']
					),
					array(
						'%s','%s'
					)
				);
				
			}
			#prelim insert to get next id (close)
			
			#final insert/update (open)
			if(1==1){
				
				$GLOBALS['wpdb']->update(
				    'fi4l3fg_voluno_files2',
					array( //updated content
						'vol_file_id' => 'vol_file_id_'.$GLOBALS['wpdb']->insert_id,
						'vol_file_hashname' => $function_files['internal']['file']['hashname'],
						'vol_file_nicename' => $function_files['internal']['file']['nicename'],
						
						'vol_file_size' => $function_files['internal']['file']['filesize'],
						'vol_file_mime' => $function_files['internal']['file']['mime'],
						
						'vol_file_type_name1' => $function_files['categorization_array'][0]['name'],
						'vol_file_type_id1' => $function_files['categorization_array'][0]['id'],
						'vol_file_type_name2' => $function_files['categorization_array'][1]['name'],
						
						'vol_file_type_id2' => $function_files['categorization_array'][1]['id'],
						'vol_file_type_name3' => $function_files['categorization_array'][2]['name'],
						'vol_file_type_id3' => $function_files['categorization_array'][2]['id'],
						
						'vol_file_user_id' => $function_files['internal']['file_author_id'],
						'vol_file_date_modified' => date("Y-m-d H:i:s"),
						'vol_file_date_created' => date("Y-m-d H:i:s")
					),
					array( //location of updated content
						'vol_file_ida' => $GLOBALS['wpdb']->insert_id
					),
					array( //format of updated content
						'%s','%s','%s',
						'%d','%s',
						'%s','%s','%s',
						'%s','%s','%s',
						'%s','%s','%s'
					),
					array( //format of location of updated content
						'%d'
					)
				);
				
			}
			#final insert/update (close)
			
			$function_files['output']['inserted_file_ids_array'][] = 'vol_file_id_'.$GLOBALS['wpdb']->insert_id;
			
		}
		#insert files in database (close)
		
		#create text for progress report (open) ###
		if(2==1){
		    
		    if($amm == 0){
			$task_report_files_formatted = '<p>Attached files:</p><ul>';
		    }
		    
		    $task_report_files_formatted .= '<li><p>'.$function_files['internal']['raw_file_data']['name'][$amm].'</p></li>';
		    
		    if($amm + 1 == count($function_files['internal']['raw_file_data']['name'])){
			$task_report_files_formatted .= '</ul><p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>';
		    }
		    
		}
		#create text for progress report (close)
		
	}
	#insert files (close)
	
}
#upload files (close)

#delete files (open)
if($function_files['internal']['action'] == 'delete'){
	
	#loop (open)
	for($amp=0;$amp<count($function_files['internal']['vol_file_ids_to_delete_array']);$amp++){
		
		#get file hashname (open)
		if(!empty($function_files['internal']['vol_file_ids_to_delete_array'][$amp])){
			
			$function_files['internal']['delete']['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_files2
				WHERE vol_file_id = %s;',
				$function_files['internal']['vol_file_ids_to_delete_array'][$amp]
			);
			$function_files['internal']['delete']['row'] = $GLOBALS['wpdb']->get_row($function_files['internal']['delete']['query']);
			
		}
		#get file hashname (close)
		
		#delete in database (open)
		if(!empty($function_files['internal']['delete']['row'])){
			
			$GLOBALS['wpdb']->delete(
				'fi4l3fg_voluno_files2',
				array( //location of row to delete
					'vol_file_hashname' => $function_files['internal']['delete']['row']->vol_file_hashname
				),
				array( //format of location of row to delete
					'%s'
				)
			);
			
		}
		#delete in database (close)
		
		#delete file (open)
		if(!empty($function_files['internal']['delete']['row'])){
			
			unlink($function_files['internal']['storage_dir_abs'].'/'.$function_files['internal']['delete']['row']->vol_file_hashname);
			
		}
		#delete file (close)
		
	}
	#loop (close)
	
}
#delete files (close)

#use files (open)
if($function_files['internal']['action'] == 'use'){
	
	#loop (open)
	for($amp=0;$amp<array_sum([count($function_files['internal']['files_to_use_by_nicename']),count($function_files['internal']['files_to_use_by_file_id'])]);$amp++){
	#for($amp=0;$amp<count($function_files['internal']['files_to_use_by_nicename']);$amp++){
		
		#get file (open)
		if(1==1){
			
			#nicename (open)
			if(!empty($function_files['internal']['files_to_use_by_nicename'][$amp])){
				
				$function_files['internal']['use']['query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_files2
					WHERE vol_file_type_name1 = "system"
						AND vol_file_nicename = %s;',
					$function_files['internal']['files_to_use_by_nicename'][$amp]
				);
				$function_files['internal']['use']['row'] = $GLOBALS['wpdb']->get_row($function_files['internal']['use']['query']);
				
			}
			#nicename (close)
			
			$function_files['internal']['id_index'] = $amp - count($function_files['internal']['files_to_use_by_nicename']);
			
			#id (open)
			if(!empty($function_files['internal']['files_to_use_by_file_id'][$function_files['internal']['id_index']])){
				
				$function_files['internal']['use']['query'] = $GLOBALS['wpdb']->prepare(
					'SELECT *
					FROM fi4l3fg_voluno_files2
					WHERE vol_file_id = %s;',
					$function_files['internal']['files_to_use_by_file_id'][$function_files['internal']['id_index']]
				);
				$function_files['internal']['use']['row'] = $GLOBALS['wpdb']->get_row($function_files['internal']['use']['query']);
				
			}
			#id (close)
			
		}
		#get file (close)
		
		#paths (open)
		if(1==1){
			
			#full storage path of file
			$function_files['internal']['full_storage_path_abs_for_individual_file'] =
			$function_files['internal']['storage_dir_abs'].'/'.$function_files['internal']['use']['row']->vol_file_hashname;
			
			#dir usage paths for individual file
			$function_files['internal']['usage_dir_abs_for_individual_file'] =
			$function_files['internal']['usage_dir_abs'].'/'.
			$function_files['internal']['use']['row']->vol_file_id.'_'.substr($function_files['internal']['use']['row']->vol_file_hashname,10,10);
			$function_files['internal']['usage_dir_url_for_individual_file'] =
			$function_files['internal']['usage_dir_url'].'/'.
			$function_files['internal']['use']['row']->vol_file_id.'_'.substr($function_files['internal']['use']['row']->vol_file_hashname,10,10);
			
			#full usage path of file
			$function_files['internal']['full_usage_path_abs_for_individual_file'] =
			$function_files['internal']['usage_dir_abs_for_individual_file'].'/'.$function_files['internal']['use']['row']->vol_file_nicename;
			$function_files['internal']['full_usage_path_url_for_individual_file'] =
			$function_files['internal']['usage_dir_url_for_individual_file'].'/'.$function_files['internal']['use']['row']->vol_file_nicename;
			
		}
		#paths (close)
		
		#copy file (open)
		if(!empty($function_files['internal']['use']['row']) AND !file_exists($function_files['internal']['full_usage_path_abs_for_individual_file'])){
			
			mkdir($function_files['internal']['usage_dir_abs_for_individual_file']);
			
			copy(
				$function_files['internal']['full_storage_path_abs_for_individual_file'],
				$function_files['internal']['full_usage_path_abs_for_individual_file']
			);
			
		}
		#copy file (close)
		
		#full url path
		$function_files['output']['full_url_paths_for_use_via_filename'][$function_files['internal']['use']['row']->vol_file_nicename] =
		$function_files['internal']['full_usage_path_url_for_individual_file'];
		$function_files['output']['full_url_paths_for_use_via_id'][$function_files['internal']['use']['row']->vol_file_id] =
		$function_files['internal']['full_usage_path_url_for_individual_file'];
		
		#full abs path
		$function_files['output']['full_abs_paths_for_use_via_filename'][$function_files['internal']['use']['row']->vol_file_nicename] =
		substr(
			$function_files['internal']['full_usage_path_abs_for_individual_file'],
			strlen(wp_upload_dir()['path'].'/'),
			strlen($function_files['internal']['full_usage_path_abs_for_individual_file'])
		);
		$function_files['output']['full_abs_paths_for_use_via_id'][$function_files['internal']['use']['row']->vol_file_id] =
		substr(
			$function_files['internal']['full_usage_path_abs_for_individual_file'],
			strlen(wp_upload_dir()['path'].'/'),
			strlen($function_files['internal']['full_usage_path_abs_for_individual_file'])
		);
		
		#abs path without filename
		$function_files['output']['only_abs_paths_for_use_via_filename'][$function_files['internal']['use']['row']->vol_file_nicename] =
		substr(
			$function_files['internal']['usage_dir_abs_for_individual_file'],
			strlen(wp_upload_dir()['path'].'/'),
			strlen($function_files['internal']['usage_dir_abs_for_individual_file'])
		);
		$function_files['output']['only_abs_paths_for_use_via_id'][$function_files['internal']['use']['row']->vol_file_id] =
		substr(
			$function_files['internal']['usage_dir_abs_for_individual_file'],
			strlen(wp_upload_dir()['path'].'/'),
			strlen($function_files['internal']['usage_dir_abs_for_individual_file'])
		);
		
		#fileame
		$function_files['output']['filename_via_id'][$function_files['internal']['use']['row']->vol_file_id] =
		$function_files['internal']['use']['row']->vol_file_nicename;
		
	}
	#loop (close)
	
}
#use files (close)

#output (open)
if(1==1){
	
	$function_files = $function_files['output'];
	
}
#output (close)

?>