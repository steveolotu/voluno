<?php

#currently not used (open)
if(1==2){
		
	#function-user-delete.php (v1.0) (open)
	if(1==2){
		
		#documentation (open)
		if(1==1){
			
			// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_userdelete['type'] = 'permanent';// 'permanent','preliminary' (default). Preliminary only changes the status and creates a
			// cronjob for final (permanent) deletion 30 days later. 'permanent' deletes the user right away.
			
			$function_userdelete['user'] = 181; // User id.
			
		}
		#input (close)
		
		include('#function-user-delete.php');
		
		#output (open)
		if(1==1){
			
			#echo $function_cronjobs['xxx']; // Explanation of the output variable.
			
		}
		#output (close)
		
	}
	#function-user-delete.php (v1.0) (close)
	
	#function-cronjobs.php (v1.0) (open)
	if(1==2){
		
		#documentation (open)
		if(1==1){
			
			// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_cronjobs['xxx'] = 22;// 'Option 1','Option 2' (default). Explanation of the input variable.
			
		}
		#input (close)
		
		include('#function-cronjobs.php');
		
		#output (open)
		if(1==1){
			
			#echo $function_cronjobs['xxx']; // Explanation of the output variable.
			
		}
		#output (close)
		
	}
	#function-cronjobs.php (v1.0) (close)
	
	#positions (open)
	if(1==2){
		
		#function-user-position-update.php (v1.1) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_userpositions_update['user_id'] = 'current_user'; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
				$function_userpositions_update['position_pure'] = 'Agent'; //obligatory. If not defined, function is deactivated!
					// However, writing 'current_user' looks up the current user id.
					// Valid positions:
					//      'NGO Administrator', 'NGO Worker', 'Voluno Staff Member'
				$function_userpositions_update['position_additional_information'] = 8075; // If staff position: NGO id. If specific agent, add client user id.
				$function_userpositions_update['appliation text'] = 'agent applied;aaa';
					// Optional. Is automatically sanitized into "plain text with line breaks (biography)".
					// When adding agents, add 'agent applied;' or 'client applied;' before the application text.
				$function_userpositions_update['new status'] = 'accepted'; // Obligatory. 'accepted', 'pending' or 'delete' the latter deletes the entry.
				#$function_userpositions_update['new status'] = 'accepted';
				
			}
			#input (close)
			
			include('#function-user-positions-update.php');
			
			#output (open)
			if(1==1){
				
				#$function_userpositions_update['simple array']
				# Simple one dimensional array of all accepted positions.
				# Exmaple: array_intersect($function_userpositions_update['simple array'],['Human Resources Officer','Coordinator']) //checks if user has any of the given positions
				
				#$function_userpositions_update['sorted list'][POSITION NAME][PROPERTY]
				#   example: $function_userpositions_update['sorted list']['Volunteer']['status'] == 'accepted'
				
				#$function_userpositions_update['sorted list'][INDEX][PROPERTY]
				
				# Position name is the name of the position. Careful: It must be spelled correctly!
				
				# Index is the default PHP index: 0,1,2,...,n with n being the amount of positions held by the user.
				
				# Properties are:
				#   'position' - name of the position
				#   'type' - type of the position. This can only be 'top' for main positions or 'Voluno Staff Member', 'Volunteer', 'NGO Worker'
				#   'status' - 'accepted', 'pending', 'rejected' (The latter means that the person is blocked, but that isn't used. Mostly, the application is just deleted.)
				#   'application_text' - Only available for some positions. Application text.
				#   'application_id' - Application id.
				#   'application_date_created'
				#   'application_date_modified'
				
				#$function_userpositions_update['add'] = []; // Must be array! Any position the user should get. Note: Other required positions are also changed.
				
			}
			#output (close)
			
		}
		#function-user-position-update.php (v1.1) (close)
		
		#function-user-positions-get.php (v1.1) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Text which explains what the function does and how it works. Specifics are written into comments inside the function's manual.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_userpositions_get['user id'] = 'current_user'; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
				$function_userpositions_get['display all positions for developers'] = 'yes'; // 'yes', 'yes, long' or 'no' (default). Shows all positions the user has.
				// 'yes, long' prints the entire output in a nice way.
				
			}
			#input (close)
			
			include('#function-user-positions-get.php');
			
			#output (open)
			if(1==1){
				
				// Outputs three arrays of user positions:
				// 
				// 
				// 1. A full array, with one subarray per position (unnamed = default index) "unsorted array":
				// 
				// 
				// 
				// $function_userpositions_get['unsorted list'][] = [
				//    position: specific position name (without additional information)
				//    position_pure: specific position name, including additional information
				//    type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
				//    status: "accepted", "pending"
				//    application_text: optional text, depending on position
				//    application_id: mysql data entry index
				//    application_date_created
				//    application_date_modified
				// ]; 
				// 
				// 
				// 2. A full array, with one subarray per position (named according to position name) "sorted array":
				//
				# $function_userpositions_get['sorted list'][POSITION NAME][PROPERTY]
				// 
				// $function_userpositions_get['unsorted list'][SPECIFIC POSITION NAME] = [
				//    position_pure: specific position name, including additional information
				//    type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
				//    status: "accepted", "pending"
				//    application_text: optional text, depending on position
				//    application_id: mysql data entry index
				//    application_date_created
				//    application_date_modified
				// ]; 
				//
				// Example: $function_userpositions_get['sorted list']['Volunteer']['status'] == 'accepted';
				// 
				// 
				// 3. A "simple array":
				//
				// $function_userpositions_get['simple_array'][STATUS] = specific position name 
				//
				// array(1) { ["accepted"]=> array(3) { [0]=> string(10) "Agent;1445" [1]=> string(9) "Volunteer" [2]=> string(5) "Agent" } }
				//
				// Exmaple: array_intersect($function_userpositions_get['simple array'],['Human Resources Officer','Coordinator']) //checks if user has any of the given positions
				// 
				
		
				
				#$function_userpositions_get['sorted list'][INDEX][PROPERTY]
				
				# Position name is the name of the position. Careful: It must be spelled correctly!
				
				# Index is the default PHP index: 0,1,2,...,n with n being the amount of positions held by the user.
				
				# Properties are:
				#   'position' - name of the position
				#   'type' - type of the position. This can only be 'top' for main positions or 'Voluno Staff Member', 'Volunteer', 'NGO Worker'
				#   'status' - 'accepted', 'pending', 'rejected' (The latter means that the person is blocked, but that isn't used. Mostly, the application is just deleted.)
				#   'application_text' - Only available for some positions. Application text.
				#   'application_id' - Application id.
				#   'application_date_created'
				#   'application_date_modified'
				
				#$function_userpositions_get['add'] = []; // Must be array! Any position the user should get. Note: Other required positions are also changed.
				
			}
			#output (close)
			
		}
		#function-user-positions-get.php (v1.1) (close)
	
	}
	#positions (close)
	
	#function-user-relationships-and-status.php (v1.0) (open)
	if(1==2){
		
		#documentation (open)
		if(1==1){
			
			// Provides arrays of user ids which are sorted according to their user status and their relationship to the current user (if provided).
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			#$function_userRelSta['array'] = [1,2,3]; // Optional. Default is an array of all users.
			$function_userRelSta['user'] = ['user_id' => 'current_user', 'include_user_in_output' => 'yes'];
			// user_id: Optional. User id or 'current_user'. include_user_in_output
			// include_user_in_output: If user_id is given, then 'yes' or 'no' (default). Includes the selected user id in the output arrays
			$function_userRelSta['add_users_extended_arrays'] = 'yes'; //'yes','no' (default).
			
		}
		#input (close)
		
		include('#function-user-relationships-and-status.php');
		
		#output (open)
		if(1==1){
			
			# $function_userRelSta['all'] //all users registered at Voluno.
			#
			# $function_userRelSta['active'] //users which have the status "active".
			# $function_userRelSta['inactive'] //users which do not have the status "active": "draft", "paused", "locked" or "deleted"
			# 	$function_userRelSta['draft']
			# 	$function_userRelSta['paused']
			# 	$function_userRelSta['locked']
			# 	$function_userRelSta['deleted']
			#
			# $function_userRelSta['contacts'] // All not blocked contacts
			# $function_userRelSta['blocked'] // All blocked contacts
			# 	not yet programmed: $function_userRelSta['blocked_by_this_user']
			# 	not yet programmed: $function_userRelSta['blocked_by_other_user']
			#
			# Example:
			#   all active, not blocked users:
			#   -> array_diff($function_userRelSta['active'],$function_userRelSta['blocked'])
			#
			# If activated, for each of the above arrays ($function_userRelSta[...]), there is also one array of the form
			#    $function_userRelSta['users_extended'][...]
			# which includes the pure results from users_extended. For example:
			#    $function_userRelSta['users_extended']['active'][0]->usersext_id
			
		}
		#output (close)
		
			echo '<br><br>all: '.count($function_userRelSta['all']).' ';
			var_dump($function_userRelSta['all']);
			
			echo '<br><br>active: '.count($function_userRelSta['active']).' ';
			var_dump($function_userRelSta['active']);
			
			echo '<br><br>inactive: '.count($function_userRelSta['inactive']).' ';
			var_dump($function_userRelSta['inactive']);
			
			echo '<br><br>paused: '.count($function_userRelSta['paused']).' ';
			var_dump($function_userRelSta['paused']);
			
			echo '<br><br>locked: '.count($function_userRelSta['locked']).' ';
			var_dump($function_userRelSta['locked']);
			
			echo '<br><br>deleted: '.count($function_userRelSta['deleted']).' ';
			var_dump($function_userRelSta['deleted']);
			
			echo '<br><br>contacts: '.count($function_userRelSta['contacts']).' ';
			var_dump($function_userRelSta['contacts']);
			
			echo '<br><br>blocked: '.count($function_userRelSta['blocked']).' ';
			var_dump($function_userRelSta['blocked']);
			
			echo '<br><br>';
			
			$array_diff = array_diff($function_userRelSta['all'],$function_userRelSta['contacts']);
			
			echo 'array diff: ';
			var_dump($array_diff);
			
	}
	#function-user-relationships-and-status.php (v1.0) (close)
	
	#alternative tab system (open)
	if(1==2){
		
		#style (open)
		if(1==1){
			
			echo '
			<style>
			body {font-family: "Lato", sans-serif;}
			
			ul.tab {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				border: 1px solid #ccc;
				background-color: #f1f1f1;
			}';
			
			# Float the list items side by side
			
			echo '
			ul.tab li {float: left;}
			';
			
			# Style the links inside the list items
			
			echo '
			ul.tab li a {
				display: inline-block;
				color: black;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
				transition: 0.3s;
				font-size: 17px;
			}
			';
			
			# Change background color of links on hover
			
			echo '
			ul.tab li a:hover {
				background-color: #ddd;
			}
			';
			
			#Create an active/current tablink class
			
			echo '
			ul.tab li a:focus, .active {
				background-color: #ccc;
			}
			';
			
			# Style the tab content
			echo '
			.tabcontent {
				display: none;
				padding: 6px 12px;
				border: 1px solid #ccc;
				border-top: none;
			}
			</style>';
			
		}
		#style (close)
		
		#content (open)
		if(1==1){
			
			echo '
			<p>In this example, we use JavaScript to "click" on the London link, to open the tab on page load.</p>
			
			<ul class="tab">
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, \"London\")" id="defaultOpen">London</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, \"Paris\")">Paris</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, \"Tokyo\")">Tokyo</a></li>
			</ul>
			
			<div id="London" class="tabcontent">
			  <h3>London</h3>
			  <p>London is the capital city of England.</p>
			</div>
			
			<div id="Paris" class="tabcontent">
			  <h3>Paris</h3>
			  <p>Paris is the capital of France.</p>
			</div>
			
			<div id="Tokyo" class="tabcontent">
			  <h3>Tokyo</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div>
			';
			
		}
		#content (close)
		
		#jquery (open)
		if(1==1){
			
			echo '
			<script>
			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			
			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
			</script>';
			
		}
		#jquery (close)
	
	}
	#alternative tab system (close)
	
	
	echo 'hi, this is the test page. have fun.<br><br><br>';
	
	
	#store files in db failed, i've given up on this due to discouragement of users from internet forums (open)
	if(1==2){
		
		var_dump($_POST);
		echo '<br><br>';
		var_dump($_FILES);
		
		echo '
		<form method="post" action="'.get_permalink().'" enctype="multipart/form-data">
			<input type="file" name="uploaded_file"><br>
			<input type="text" name="heyho" value="helloworld:-)"><br>
			<input type="submit" value="Upload file">
		</form>';
		
		$file_info['tmp_name'] = $_FILES['uploaded_file']['tmp_name'];
		
		echo '<br><br>';
		var_dump($file_info['tmp_name']);
		
		
		$fp      = fopen($file_info['tmp_name'], 'r');
		$content = fread($fp, filesize($file_info['tmp_name']));
		$content = addslashes($content);
		fclose($fp);
		
		#var_dump($content);
	
		
		
		
		
		
		
		
		
		
		
		##HEADERS
		
		#get mime type
		$file_info['mime'] = $_FILES['uploaded_file']['type'];
			#$mimetype = $finfo->file($full_temp_path_abs);
			#$file_path_info_final = pathinfo($full_final_path_abs);
		
		#size
		$file_info['size'] = $_FILES['uploaded_file']['size'];
		
		#name
		$file_info['name'] = $_FILES['uploaded_file']['name'];
		
		
		echo '<br><br>fileinfo: ';
		var_dump($file_info);
		echo '<br><br>';
		
		
		
		
		
		
		
		#update in fi4l3fg_voluno_users_extended (open)
		if(!empty($content)){
			
			$GLOBALS['wpdb']->update( 
				'fi4l3fg_voluno_files2',
				array( //updated content
					'vol_file_content' => $content,
					'vol_file_name' => $file_info['tmp_name'],
					'vol_file_name_original' => $file_info['name'],
					'vol_file_size' => $file_info['size'],
					'vol_file_mime' => $file_info['mime']
				), 
				array( //location of updated content
					'vol_file_id' => '1'
				), 
				array( //format of updated content
					'%s','%s','%s','%s','%s'
				), 
				array( //format of location of updated content
					'%s'
				)
			);
		}
		#update in fi4l3fg_voluno_users_extended (close)
		
		#download (open)
		if(1==1){
			
			$download['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_files2
				WHERE vol_file_id = "1";'
			);
			$download['row'] = $GLOBALS['wpdb']->get_row($download['query']);
			
			// Print headers
			header("Content-Type: ".$download['row']->vol_file_mime);
			header("Content-Length: ".$download['row']->vol_file_size);
			header("Content-Disposition: attachment; filename=\"".$download['row']->vol_file_name_original."\"");
			
			#echo "Content-Type: ".$download['row']->vol_file_mime.'<br>';
			#echo "Content-Length: ".$download['row']->vol_file_size.'<br>';
			#echo 'Content-Disposition: attachment; filename="'.$download['row']->vol_file_name_original.'"<br>';
		
			// Print data
			echo $download['row']->vol_file_content;
			#var_dump($download['row']);
			
		}
		#download (close)
		echo 'hallo';
		#
		if(1==2){
			
			$uploads_directory_raw = wp_upload_dir();
			$uploads_directory_abs = $uploads_directory_raw['path'];
			$uploads_directory_web = $uploads_directory_raw['url'];
			
			#save submitted preliminary file (open)
			if(1==2 AND isset($_POST['submit_file']) and isset($_FILES['select_file'])){
			  
				$uploadedfile = $_FILES['select_file'];
			   
				#upload image to general uploads directory (open)
				if(1==1){
				   if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
				   $movefile = wp_handle_upload( $uploadedfile, array('test_form'=>false) );
				   $preliminary_image_name = substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
				}
				#upload image to general uploads directory (close)
				
				#rename and move file to members specific folder (open)
				if(1==1){
				   
				   $preliminary_img__full_path_old =
					  $uploads_directory_abs.
					  '/'.
					  $preliminary_image_name;
					  
				   $img_path_info = pathinfo($preliminary_image_name);
				   
				   $preliminary_img__path_only_new =
					  $uploads_directory_abs.
					  '/members/'.
					  $GLOBALS['voluno_variables']['current_user_extended']->usersext_id.
					  '/profile-picture/raw/';
				   
				   $preliminary_img__full_path_new =
					  $preliminary_img__path_only_new.
					  $img_path_info['filename'].
					  '.jpg';
				
				   if(!in_array(exif_imagetype($preliminary_img__full_path_old),
					  array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP, IMAGETYPE_TIFF_II, IMAGETYPE_TIFF_MM, IMAGETYPE_JPEG2000))
				   ){
					  $image_valid_and_uploaded = "no";
				   }else{
					  #create folder, if not exists (open)
					  if (!file_exists($preliminary_img__path_only_new)) { 
					 mkdir($preliminary_img__path_only_new, 0777, true);
					  }
					  #create folder, if not exists (close)
					  
					  $image_valid_and_uploaded = "yes";
					  
					  #reduce image size to a normal size (open)
					  if(1==1){
					 $image_processing = wp_get_image_editor($preliminary_img__full_path_old);
					 if(!is_wp_error($image_processing)){ //for some strange reason, this is required.
					   $image_processing->resize('600px','600px',false);
					   $image_processing->set_quality(100);
					   $tranform_image_to_jpg_and_get_new_full_abs_path //change image format and get filename
							 = $image_processing->generate_filename(null,null,'jpg');
					   $img_data = $image_processing->save($tranform_image_to_jpg_and_get_new_full_abs_path);
					 }
					  }
					  #reduce image size to a normal size
					  
					  rename($tranform_image_to_jpg_and_get_new_full_abs_path,$preliminary_img__full_path_new);
					  unlink($preliminary_img__full_path_old);
				   }
				}
				#rename and move file to members specific folder (close)
				
				#update in fi4l3fg_voluno_users_extended (open)
				if($image_valid_and_uploaded == "yes"){
				   $GLOBALS['wpdb']->update( 
						   'fi4l3fg_voluno_users_extended',
					   array( //updated content
						   'usersext_imageNamePreliminary' => $img_path_info['filename'].'.jpg',
					   ), 
					   array( //location of updated content
						   'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
					   ), 
					   array( //format of updated content
						   '%s'
					   ), 
					   array( //format of location of updated content
						   '%s'
					   ));
				}
				#update in fi4l3fg_voluno_users_extended (close)
				
			}
			#save submitted preliminary file (close)
			
		}
		#
		
	}
	#store files in db failed, i've given up on this due to discouragement of users from internet forums (close)
	
	
		echo '
		<form method="post" action="'.get_permalink().'" enctype="multipart/form-data">
			<input type="file" name="uploaded_file"><br>
			'./*<input type="file" name="uploaded_file[]"><br>
			<input type="file" name="teeest"><br>
			<input type="text" name="heyho" value="helloworld:-)"><br>
			*/'<input type="submit" value="Upload file">
		</form>';
	

	
	#list of files (open)
	if(1==2){
		
				$uploads_directory_array = wp_upload_dir();
				$uploads_directory_abs = $uploads_directory_array['path'].'/storage_5ougou8rlaxlacroaxo1c7iaspleki';
				$uploads_directory_web = $uploads_directory_array['url'];
		
				echo '<br><br>'.$uploads_directory_abs;
				
		$files =
			array_diff(
				scandir($uploads_directory_abs),
				array('.', '..')
			);
			
		$files = array_values($files);
			
		echo '<br><br>files in total: '.count($files);
		#
		for($aml=0;$aml<count($files);$aml++){
			
			echo '
			<ul>
				<li>
					'.$files[$aml].'
				</li>
			</ul>';
			
		}
		#
	
	}
	#list of files (close)


}
#currently not used

	#function-files.php (v1.0) (open)
	if(1==2){
		
		#documentation (open)
		if(1==1){
			
			// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_files['action'] = 'use'; // 'use', 'upload' or 'delete'.
			
			#upload (open)
			if(1==1){
				
				$function_files['file_input_field_name'] = 'uploaded_file'; //E.g.: 'message_attachments'; <- from $_FILES['message_attachments'];
				// Name of specific form file input field. Can be one or more files.
				
				$function_files['categorization_array'] = [ //type general, type specific, etc. Helps to categorize the file.
					['name' => 'testing','id' => '3445'], //level 1
					['name' => 'function','id' => '55'], //level 2
					['name' => 'uploading','id' => '6'] //level 3
				];
				
				$function_files['new_file_names_array'] = [ //if empty, original files names are stored. If not empty, these file names are stored. Must be an array.
					'ichwarhier_haha'
				];
				
			}
			#upload (close)
			
			#delete (open)
			if(1==1){
				
				$function_files['vol_file_ids_to_delete_array'] = ['a','b','vol_file_id_5','vol_file_id_6'];
				//ids of files to delete. e.g. ['vol_file_id_3','vol_file_id_4']. must be an array.
				
			}
			#delete (close)
			
			#use (open)
			if(1==1){
				
				$function_files['files_to_use_by_nicename'] = [
					'00001-Domain-Name-Registration.pdf'
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
			#$function_files['output']['files_for_use'] //array: keys = nicenames, values = full paths
			
			#echo $function_files['xxx']; // Explanation of the output variable.
			
			#echo '<img src="'.$function_files['full_url_paths_for_use']['ichwarhier_haha.bmp'].'">';
			#echo 'test <a href="'.$function_files['full_url_paths_for_use']['00001-Domain-Name-Registration.pdf'].'">aaaa</a>';
			
			
		}
		#output (close)
		
	}
	#function-files.php (v1.0) (close)

#file transformer (open) (might need later, don't delete!)
if(1==2){
	
	$b['wp_upload_dir_function'] = wp_upload_dir()['path'];
	$b['storage_dir_abs'] = $b['wp_upload_dir_function'].'/storage_5ougou8rlaxlacroaxo1c7iaspleki';
	
	#$b['usage_dir_folder_name'] = '/usage_kiesouq42spiahoaxiuviukl585e0l';
	#$b['usage_dir_abs'] = $b['wp_upload_dir_function'].$b['usage_dir_folder_name'];
	#$b['usage_dir_url'] = $b['wp_upload_dir_function']['url'].$b['usage_dir_folder_name'];
	
	#get file (open)
	if(1==1){
		
		#file list (open)
		if(1==1){
			
			$files = array_values(array_diff(scandir($b['wp_upload_dir_function'].'/Neues Verzeichnis/'), array('.', '..')));
			#var_dump($files);
			
		}
		#file list (close)
		
		#query (open)
		if(1==2){
			
			$mysql['query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_finances
				WHERE receipt != "";'
			);
			$mysql['results'] = $GLOBALS['wpdb']->get_results($mysql['query']);
			
		}
		#query (close)
		
	}
	#get file (close)
	
	#
	for($a=0;$a<count($files);$a++){
		
		#
		if(!in_array($files[$a],['.','','..']) AND !empty($files[$a])){
			
			$alt = $b['wp_upload_dir_function'].'/Neues Verzeichnis/'.$files[$a];
			#$neu = $b['storage_dir_abs'].'/'.$mysql['results'][$a]->receipt; 
			
			#$neu_falscher_name = $b['storage_dir_abs'].'/'.$files[$a];
			
			$neu_falscher_name = $alt;
			
			$c['full_abs_temp_file_path'] = $neu_falscher_name;
			
			echo '
			<br><br>current path:
			<br>'.
			#$alt.
			$neu_falscher_name.
			'<br>future path:
			<br>'.$neu;
			
			#insert files into files2 database
			if(1==1){
				
				#get file info (open)
				if(1==1){
					
					#hashname (open)
					if(1==1){
						
						$c['file']['hashname'] = substr(str_shuffle(
							MD5(microtime()).MD5(microtime()).
							MD5(microtime()).MD5(microtime()).
							MD5(microtime()).MD5(microtime()).
							mt_rand()
						), 0, 50);
						
					}
					#hashname (close)
					
					#nicename (open)
					if(1==1){
						
						$c['file']['nicename'] = $files[$a];
						
					}
					#nicename (close)
					
					$c['file']['filesize'] = filesize($c['full_abs_temp_file_path']);
					$c['file']['mime'] = mime_content_type($c['full_abs_temp_file_path']);
					
				}
				#get file info (close)
				
				#insert files in database (open)
				if($c['file']['filesize'] > 1){
					
					#prelim insert to get next id (open)
					if(1==1){
						
						$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_files2',
							array(
								'vol_file_hashname' => 'preliminary insert to get next id',
								'vol_file_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'vol_file_date_modified' => date("Y-m-d H:i:s"),
								'vol_file_date_created' => date("Y-m-d H:i:s")
							),
							array(
								'%s','%s','%s','%s'
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
								'vol_file_hashname' => $c['file']['hashname'],
								'vol_file_nicename' => $c['file']['nicename'],
								
								'vol_file_size' => $c['file']['filesize'],
								'vol_file_mime' => $c['file']['mime'],
								
								'vol_file_type_name1' => 'system',
								'vol_file_type_id1' => '',
								'vol_file_type_name2' => 'images',
								'vol_file_type_id2' => '',
								'vol_file_type_name3' => 'background_images',
								'vol_file_type_id3' => '',
								
								'vol_file_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'vol_file_date_modified' => date("Y-m-d H:i:s"),
								'vol_file_date_created' => date("Y-m-d H:i:s")
							),
							array( //location of updated content
								'vol_file_ida' => $GLOBALS['wpdb']->insert_id
							),
							array( //format of updated content
								'%s','%s','%s',
								'%d','%s',
								'%s','%s','%s','%s','%s','%s',
								'%s','%s','%s'
							),
							array( //format of location of updated content
								'%d'
							)
						);
						
					}
					#final insert/update (close)
					
				}
				#insert files in database (close)
				
			}
			#insert files into files2 database
			
			#update old specific database
			if(1==2){
				
				$GLOBALS['wpdb']->update(
					'fi4l3fg_voluno_finances',
					array( //updated content
						'receipt' => 'vol_file_id_'.$GLOBALS['wpdb']->insert_id
					),
					array( //location of updated content
						'id' => $mysql['results'][$a]->id
					),
					array( //format of updated content
						'%s'
					),
					array( //format of location of updated content
						'%d'
					)
				);
				
			}
			#update old specific database
			
			$neu_richtiger_name = $b['storage_dir_abs'].'/'.$c['file']['hashname'];
			
			echo '
			<br><br>
			aaa: '.$neu_falscher_name.'
			<br>
			bbb: '.$neu_richtiger_name.'
			<br><br>';
			#move files (open)
			if($c['file']['filesize'] > 1){
				
				rename(
					$neu_falscher_name,
					$neu_richtiger_name
				);
				
			}
			#move files (close)
			
		}
		#
		
	}
	#
	
	#
	if(1==2){
	
	#input data array transformation (open)
	if(count($_FILES[$c['file_input_field_name']]['name']) == 1){
		//if there is only one input file
		
		$c['files'][0]['error'] = $_FILES[$c['file_input_field_name']]['error'];
		$c['files'][0]['name'] = $_FILES[$c['file_input_field_name']]['name'];
		$c['files'][0]['size'] = $_FILES[$c['file_input_field_name']]['size'];
		$c['files'][0]['tmp_name'] = $_FILES[$c['file_input_field_name']]['tmp_name'];
		$c['files'][0]['type'] = $_FILES[$c['file_input_field_name']]['type'];
		
	}else{
		//if there are several input files
		
		#loop (open)
		for($amn=0;$amn<count($_FILES[$c['file_input_field_name']]['name']);$amn++){
			
			$c['files'][$amn]['error'] = $_FILES[$c['file_input_field_name']]['error'][$amn];
			$c['files'][$amn]['name'] = $_FILES[$c['file_input_field_name']]['name'][$amn];
			$c['files'][$amn]['size'] = $_FILES[$c['file_input_field_name']]['size'][$amn];
			$c['files'][$amn]['tmp_name'] = $_FILES[$c['file_input_field_name']]['tmp_name'][$amn];
			$c['files'][$amn]['type'] = $_FILES[$c['file_input_field_name']]['type'][$amn];
			
		}
		#loop (close)
		
	}
	#input data array transformation (close)
	
	#insert files (open)
	for($amo=0;$amo<count($c['files']);$amo++){
		
		#upload files (open)
		if(1==1){
		    
		    #upload file to general uploads directory (open)
		    if(1==1){
				
				#activate wp file upload (open)
				if(!function_exists('wp_handle_upload')){
					
					require_once(ABSPATH.'wp-admin/includes/file.php');
					
				}
				#activate wp file upload (close)
				
				$c['wp_uploaded'] = wp_handle_upload(
					$c['files'][$amo],
					array('test_form'=>false)
				);
				
				$c['full_abs_temp_file_path'] = $c['wp_uploaded']['file']; //substr($movefile['file'], ( strrpos($movefile['file'], '/', -1) + 1 ) );
				
		    }
		    #upload file to general uploads directory (close)
		    
		    #get file info (open)
		    if(1==1){
				
				#hashname (open)
				if(1==1){
					
					$c['file']['hashname'] = substr(str_shuffle(
						MD5(microtime()).MD5(microtime()).
						MD5(microtime()).MD5(microtime()).
						MD5(microtime()).MD5(microtime()).
						mt_rand()
					), 0, 50);
					
				}
				#hashname (close)
				
				#nicename (open)
				if(empty($function_files['new_file_names_array'][$amo])){
					
					$c['file']['nicename'] = pathinfo($c['full_abs_temp_file_path'],PATHINFO_BASENAME);
					
				}else{
					
					$c['file']['nicename'] =
					$function_files['new_file_names_array'][$amo].'.'.pathinfo($c['full_abs_temp_file_path'],PATHINFO_EXTENSION);
					
				}
				#nicename (close)
				
				$c['file']['filesize'] = filesize($c['full_abs_temp_file_path']);
				$c['file']['mime'] = mime_content_type($c['full_abs_temp_file_path']);
				
		    }
		    #get file info (close)
		    
		    #check if mime type is valid (open)
		    if(1==2){
				
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
		    if(1==1 OR empty($file_upload_error)){
				
				#create folder, if not exists (open)
				#if (!file_exists($unfull_final_path_abs)) { 
				#   mkdir($unfull_final_path_abs, 0777, true);
				#}
				#create folder, if not exists (close)###
				
				#$file_path_info['extension'];###
				
				#full final path
				$c['full_abs_final_path'] = $c['storage_dir_abs'].'/'.$c['file']['hashname'];
				
				rename(
					$c['full_abs_temp_file_path'],
					$c['full_abs_final_path']
				);
				
		    }
		    #if file valid (close)
		    
		    #unlink($full_temp_path_abs);###
		    
		}
		#upload files (close)
		

		
		unset($file_upload_error);
		
		#create text for progress report (open)
		if(2==1){
		    
		    if($amm == 0){
			$task_report_files_formatted = '<p>Attached files:</p><ul>';
		    }
		    
		    $task_report_files_formatted .= '<li><p>'.$c['raw_file_data']['name'][$amm].'</p></li>';
		    
		    if($amm + 1 == count($c['raw_file_data']['name'])){
			$task_report_files_formatted .= '</ul><p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>';
		    }
		    
		}
		#create text for progress report (close)
	
			copy(
				$c['full_storage_path_abs_for_individual_file'],
				$c['full_usage_path_abs_for_individual_file']
			);
	
	}
	#insert files (close)
	
	}
	#
	
}
#file transformer (close)

echo 'hey';

#
if(1==1){
	
	$list['query'] = $GLOBALS['wpdb']->prepare(
		'SELECT *
		FROM fi4l3fg_voluno_files_properties;'
	);
	$list['results'] = $GLOBALS['wpdb']->get_results($list['query']);
	
	#
	for($a=0;$a<count($list['results']);$a++){
		
		$array[] = $list['results'][$a]->fileprop_type;
		
	}
	#
	$array = array_unique($array);
	
	echo implode('; ',$array);
	
}
#


?>