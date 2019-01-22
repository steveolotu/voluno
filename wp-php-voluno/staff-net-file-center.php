<?php

#access rights management (arm) (open)
if(1==1){
    
	#function-user-positions-get.php (v1.8) (open)
	if(1==1){
		
		#documentation (open)
		if(1==1){
			
			// Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_userpositions_get['user id'] = 'current_user'; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
			#$function_userpositions_get['display all positions for developers'] = 'yes'; // 'yes', 'yes, long' or 'no' (default).
			// Shows all positions the user has. 'yes, long' prints the entire output in a nice way.
			
		}
		#input (close)
		
		include('#function-user-positions-get.php');
		
		#output (open)
		if(1==1){
			
			# The function produces three arrays:
			#
			# Method 1: unsorted list
			#   $function_userpositions_get['unsorted list'][PROPERTY] = PROPERTY VALUE
			#        position: specific position name, in some cases additional info is added, separated by ';', e.g. 'NGO Worker;4' with 4 being NGO id
			#        position_pure: specific position name without additional information
			#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
			#        status: "accepted", "pending"
			#        application_text: optional text, depending on position
			#        application_id: mysql data entry index
			#        application_date_created
			#        application_date_modified
			#
			# Method 2: sorted list
			#   $function_userpositions_get['sorted list'][SPECIFIC POSITION NAME][PROPERTY] = PROPERTY VALUE
			#        SPECIFIC POSITION NAME = name of the specific position (mind the spelling!)
			#        position_pure: specific position name without additional information
			#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
			#        status: "accepted", "pending"
			#        application_text: optional text, depending on position
			#        application_id: mysql data entry index
			#        application_date_created
			#        application_date_modified
			#
			# Method 3: Simple arrays
			#    $function_userpositions_get['simple array'][STATUS][INDEX] = SPECIFIC POSITION NAME   //STATUS = pending or accepted
			#     Example usage:
			#       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
			#
			# Method 4: Simple pure arrays
			#    $function_userpositions_get['simple_pure_array'][STATUS][INDEX] = SPECIFIC PURE POSITION NAME   //STATUS = pending or accepted
			#
			# Method 5:
			#    $function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
			#        full -> NGO name (user position)
			#        position -> pure position
			#        status -> "accepted" or "pending"
			#        ngo_name -> NGO name
			#        ngo_id -> NGO id
			#
			# Global variables:
			#    Function get's called in the top right sidebar for the current user, so these global variables are always available.
			#        $GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
			#        $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
			#       $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['STATUS'][] = POSITION NAME
			#    Example usage:
			#        in_array(POSITION NAME,$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])
			#
			# Note:
			# The function also outputs a list of "allowed positions". E.g. the user may not take up Voluno Staff positions without becoming a staff member first.
			#       $function_userpositions_get['allowed_pure_positions']
			# Additionally, it outputs an array of staff positions:
			#       $function_userpositions_get['allowed_pure_positions_voluno_staff']
			# But this functionality is only required for the function to edit existing user positions and not intended for regular use.
			
		}
		#output (close)
		
	}
	#function-user-positions-get.php (v1.8) (close)
    
    #definition of specific user restrictions (open)
    if(1==1){
        
	#website admin (open)
	$arm_array[] = array(
	    'access_right' => 'website_admin'
	    ,'display_title' => 'Website Administrator'
	    ,'department' => 'it'
	    ,'allowed_positions' => array(
		'website_admin'
	    )
	);
	#website admin (close)
	
	#website admin (open)
	$arm_array[] = array(
	    'access_right' => 'coordinator'
	    ,'display_title' => 'Coordinator'
	    ,'department' => 'democratic'
	    ,'allowed_positions' => array(
		'coordinator'
	    )
	);
	#website admin (close)
	
	#hr officer (open)
	$arm_array[] = array(
	    'access_right' => 'hr_officer'
	    ,'display_title' => 'Human Resources Officer'
	    ,'department' => 'operations'
	    ,'allowed_positions' => array(
		'hr_officer'
	    )
	);
	#hr officer (close)
	
	#moderate forum posts (open)
	$arm_array[] = array(
	    'access_right' => 'forum_moderator'
	    ,'display_title' => 'Forum moderator'
	    ,'department' => 'operations'
	    ,'allowed_positions' => array(
		'forum_moderator'
	    )
	);
	#moderate forum posts (close)
	
    }
    #definition of specific user restrictions (close)
    
    #execution of specific user restrictions (open)
    if(1==1){
	for($aci=0;$aci<count($arm_array);$aci++){
	    
	    $access_right = $arm_array[$aci]['access_right'];
	    $allowed_positions = $arm_array[$aci]['allowed_positions'];
	    
	    $access_right_display_title_array[$arm_array[$aci]['access_right']] = $arm_array[$aci]['display_title'];
	    
	    for($acj=0;$acj<count($allowed_positions);$acj++){
		if(in_array($allowed_positions[$acj],$function_userpositions_get['simple_pure_array']['accepted'])){
		    ${'arm_'.$access_right} = "yes";
		}else{
		    ${'arm_'.$access_right} = "no";
		}
	    }
	    
	}
    }
    #execution of specific user restrictions (close)
    
    #page section (open)
    if(!empty($_POST['path']) OR $get_path == "ajax files"){
	$page_section = "ajax files";
    }elseif(${'arm_'.$_GET['section']} == "yes"){
	$page_section = $_GET['section'];
    }else{
	$page_section = "overview";
	$access_right_display_title_array['overview'] = 'Overview';
    }
    #page section (close)
    
}
#access rights management (arm) (close)

#variable definitions (open)
if(1==1){
    
    $main_directory = wp_upload_dir()['path'].'/Voluno staff files';
    $main_directory_url = wp_upload_dir()['path'].'/Voluno staff files';
    
}
#variable definitions (close)
    
#main (open)
if($page_section != "ajax files"){
    
    #jquery (open)
    if(1==1){
	echo '
	<script>
	    jQuery(document).ready(function(){';
		
		#ajax load file list (open)
		if(1==1){
		    echo '
		    jQuery(".folder_link").click(function(){
		    
		    var editedPostContent = jQuery(this).find(".folder_path_span").html();
		    
		    jQuery(".loading_img_middle_page").show(0);
		    
		    jQuery(".files").load("'.get_permalink().' .ajax_files",{"path":editedPostContent}, function() {
			jQuery(this).hide(0, function() {
			    jQuery(this).show(0,function(){
				jQuery(".loading_img_middle_page").hide(0);
			    });
			});
		    });
		    return false;
		    });';
		}
		#ajax load file list (close)
		
		#extend, collapse folders (open)
		if(1==1){
		    
		    echo '
		    jQuery(".extend_collapse_folder_link").click(function(){
			
			if(jQuery(this).find(".visibility").html() == "hidden"){
			    jQuery(this).find(".visibility").html("shown");
			    jQuery(this).find(".html").html("(-");
			    
			    jQuery(this).closest(".folder_list_item").find(".folder_list:first").slideToggle(150);
			    
			}else{
			    jQuery(this).find(".visibility").html("hidden");
			    jQuery(this).find(".html").html("(+");
			    
			    jQuery(this).closest(".folder_list_item").find(".folder_list:first").slideToggle(150);
			}
		    });
		    ';
		    
		}
		#extend, collapse folders (close)
		
	    echo '
	    });
	</script>';
    }
    #jquery (close)
    
    #content (open)
    if(1==1){
	
	#img + title (open)
	if(1==1){
	    
	    #preparation (open)
	    if(1==1){
			
			#function-breadcrums.php (v3.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
					
				}
				#documentation (close)
				
				#input (open)
				if($page_section == "overview"){
					
					$function_breadcrums['input_array'] = [
						'left' => [
							[
								'text' => 'Staff Intranet home',
								'link' => get_permalink(821)
							]
						]
					];
					
				}else{
					
					$function_breadcrums['input_array'] = [
						'left' => [
							[
								'text' => 'Staff Intranet home',
								'link' => get_permalink(821)
							],
							[
								'text' => 'Internal work overview',
								'link' => get_permalink()
							]
						]
					];
					// 'Option 1','Option 2' (default). Explanation of the input variable.
					
				}
				#input (close)
				
				include('#function-breadcrums.php');
				
				#output (open)
				if(1==1){
					
					#echo $function_breadcrums['breadcrums']; // Output variable.
					
				}
				#output (close)
				
			}
			#function-breadcrums.php (v3.0) (close)
			
			#function-image-processing (open)
			if(1==1){
				#thematic only
				$function_propic__type = "thematic";
				$function_propic__original_img_name = "file-center.jpg";
				$function_propic__cropping = "yes"; //yes or empty (default)
				#all
				$function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
				include('#function-image-processing.php');
				# $function_propic;
				#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
			}
			#function-image-processing (close)
			
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<div style="position:relative;height:240px;">
		    <img src="'.$function_propic.'" class="voluno_header_picture">
		    '.$function_breadcrums['breadcrums'].'
		    <div style="text-align:center;margin:30px;">
			<h1 style="display:inline;">
			    File Center
			</h1>
		    </div>
		</div>';
		
	    }
	    #content (close)
	    
	}
	#img + title (close)
	
	#table + folders (open)
	if(1==1){
	    echo '
	    <table>';
		
		#folder list (open)
		if(1==1){
		    echo'
		    <tr>
			<td style="width:220px;">
			    <div style="text-align:center;">
				<h4 style="display:inline;">
				    Folder list
				</h4>
			    </div>
			    <div style="background-color:#FFE7AE;padding:20px;border-radius:20px;">
				<a class="folder_link" style="cursor:pointer;">
				    '.basename($main_directory).'
				    <span
					style="display:none;"
					class="folder_path_span"
				    >'.
					$main_directory.
				    '</span>
				</a>';
				
				#count all files in folder (open)
				function voluno_function_count_all_files($path,$reset = "yes",$counter = 0){
				    
				    $counter++;
				    global $files_in_this_folder__total;
				    
				    $files_in_this_folder = count(array_diff(scandir($path), array('.', '..')));
				    
				    $files_in_this_folder__total = $files_in_this_folder__total + $files_in_this_folder;
				    
				    for(${'afi'.$counter}=0;${'afi'.$counter}<$files_in_this_folder;${'afi'.$counter}++){
					
					voluno_function_count_all_files(
					    glob($path.'/*', GLOB_ONLYDIR)[${'afi'.$counter}],
					    "no",
					    $counter
					);
					
				    }
				    
				    if($reset == "yes"){
					$files_in_this_folder__total_prelim = $files_in_this_folder__total;
					$files_in_this_folder__total = 0;
					return $files_in_this_folder__total_prelim;
				    }
				    
				}
				#count all files in folder (open)
				
				#count all folders in folder (open)
				function voluno_function_count_all_folders($path,$reset = "yes",$counter = 0){
				    
				    $counter++;
				    global $folders_in_this_folder__total;
				    
				    $folders_in_this_folder = count(glob($path.'/*', GLOB_ONLYDIR));
				    
				    $folders_in_this_folder__total = $folders_in_this_folder__total + $folders_in_this_folder;
				    
				    for(${'afi'.$counter}=0;${'afi'.$counter}<$folders_in_this_folder;${'afi'.$counter}++){
					
					voluno_function_count_all_folders(
					    glob($path.'/*', GLOB_ONLYDIR)[${'afi'.$counter}],
					    "no",
					    $counter
					);
					
				    }
				    
				    if($reset == "yes"){
					$folders_in_this_folder__total_prelim = $folders_in_this_folder__total;
					$folders_in_this_folder__total = 0;
					return $folders_in_this_folder__total_prelim;
				    }
				    
				}
				#count all folders in folder (close)
				
				#level 2+ (open)
				function voluno_function_folder_list($path,$depth=1) {
				    if($depth < 10){
					${"folders_array_".$depth} = glob($path.'/*', GLOB_ONLYDIR);
					
					#collapse extend link (open)
					if(!empty(${"folders_array_".$depth}) AND $depth != 1){
					    echo '
					    <a
						class="extend_collapse_folder_link"
						style="cursor:pointer;"
						title="Click to extend or collapse the folder"
					    >
						<span class="html">
						    (+'.
						'</span>'.
						voluno_function_count_all_folders($path).
						')
						<span class="visibility" style="display:none;">'.
						    'hidden'.
						'</span>
					    </a>';
					}
					#collapse extend link (close)
					
					#count contents (open)
					if(1==1){
					    
					    echo '
					    <span style="color:grey;">';
						if(voluno_function_count_all_files($path) == 1){
						    $files_plural_s = 'file';
						}else{
						    $files_plural_s = 'files';
						}
						echo voluno_function_count_all_files($path).' '.$files_plural_s.'
					    </span>';
					    
					}
					#count contents (close)
					
					#subfolders loop (close)
					for(${"afe".$depth}=0;${"afe".$depth}<count(${"folders_array_".$depth});${"afe".$depth}++){
					    
					    #open list (open)
					    if(${"afe".$depth} == 0){
						
						if($depth > 1){
						    $collapse_list_on_load = "display:none;";
						}else{
						    unset($collapse_list_on_load);
						}
						
						echo '
						<ul class="folder_list" style="'.$collapse_list_on_load.'">';
					    }
					    #open list (close)
						
						echo '
						<li class="folder_list_item" style="margin-left:0;padding-left:0;">';
						    
						    #folder name (open)
						    if(1==1){
							echo '
							<span class="folder_link">
							    <a style="cursor:pointer;" title="Click to load the folder contents into the right box">
								'.basename(${"folders_array_".$depth}[${"afe".$depth}]).'
								
							    </a>
							    <span
								style="display:none;"
								class="folder_path_span"
							    >'.
								${"folders_array_".$depth}[${"afe".$depth}].
							    '</span>
							</span>';
						    }
						    #folder name (close)
						    
						    #function (open)
						    if(1==1){
							$depth++;
							voluno_function_folder_list(
							    ${"folders_array_".($depth-1)}[${"afe".($depth-1)}],
							    $depth
							);
							$depth--;
						    }
						    #function (close)
						    
						echo '
						</li>';
						
					    #close list (open)
					    if(${"afe".$depth} + 1 == count(${"folders_array_".$depth})){
						echo '
						</ul>';
					    }
					    #close list (open)
					    
					}
					#subfolders loop (close)
					
				    }
				}
				#level 2+ (close)
				
				voluno_function_folder_list($main_directory);
				
			    echo '
			</div>
			</td>';
		}
		#folder list (close)
		
		#file list (open)
		if(1==1){
			echo '
			<td style="padding:0px 20px;" class="files">';
			    $get_path = "ajax files";
			    include('staff-net-internal-work.php');
			    unset($get_path,$page_section);
			echo '
			</td>
		    </tr>';
		}
		#folder list (close)
		
	    echo '
	    </table>';
	}
	#table + folders (open)
	
	#function-loaoding-img-mysql-area-div.php (v1.0) (open)
	if(1==1){
	    $function_loaoding_img_mysql_area_div__variable_only = "yes"; //default:empty = no
	    include('#function-loaoding-img-mysql-area-div.php');
	    #$function_loaoding_img_mysql_area_div
	    #$function_loaoding_img_mysql_area_div__img_path //path of loading img
	    #classes are: mysql_load_area AND loading_page loading_img_middle_page <- use this one
	    echo $function_loaoding_img_mysql_area_div;
	}
	#function-loaoding-img-mysql-area-div.php (v1.0) (close)
	
    }
    #content (close)
    
}
#main (close)

#ajax files (open)
if($page_section == "ajax files"){
    
	#
    if(empty($_POST['path']) OR (strlen($_POST['path']) < strlen($main_directory))){
		$current_directory = $main_directory;
    }else{
		$current_directory = $_POST['path'];
    }
	#
    
    $file_list = array_values(array_diff(scandir($current_directory), array('.', '..')));
    
    #dir name (open)
    if(1==1){
	
	$folder_name = basename($current_directory);
	
	$folder_parent = $current_directory;
	$parents_counter = 0;
	for($afg=0;$afg<=explode('/',$current_directory);$afg++){
	    
	    if(in_array(basename($folder_parent),explode("/",dirname($main_directory)))){
		break;
		echo '<br>'.$folder_parent.' - '.basename(dirname($main_directory));
	    }
	    #$folder_parents_array[]['path'] = $folder_parent;
	    
	    if($afg != 0){
		$bridge = " &rarr; ";
	    }
	    
	    $folder_parents = basename($folder_parent).$bridge.$folder_parents;
	    #$folder_parents_array[]['path'] = basename($folder_parent);
	    
	    $folder_parent = dirname($folder_parent);
	    
	}
	
    }
    #dir name (close)
    
    echo '
    <div class="ajax_files">';
		
		#title and path (open)
		if(1==1){
			echo '
			<div style="text-align:center;">
			<h4 style="display:inline;">
				File list: <strong>'.$folder_name.'</strong>
			</h4>
			</div>
			Path: '.$folder_parents.'
			<br>';
		}
		#title and path (close)
		
		#options (open)
		if(1==1){
			
			$options_array = array(
			array(
				'text' => 'Select all'
			),
			array(
				'text' => 'Unselect all'
			),
			array(
				'text' => 'Download selection'
			),
			array(
				'text' => 'Download all'
			)
			);
			
			echo '
			<div>';
			for($afk=0;$afk<count($options_array);$afk++){
				echo '
				<div class="voluno_button">
				'.$options_array[$afk]['text'].'
				</div>';
			}
			echo '
			</div>';
			
			if(1==2){
			#$files = array('readme.txt', 'test.html', 'image.gif');
			$zipname = $current_directory.'/file.zip';
			$zip = new ZipArchive;
			
			$zip->open($zipname, ZipArchive::CREATE);
			
			foreach ($file_list as $file) {
			  $zip->addFile($current_directory.'/'.$file);
			}
			$zip->close();
			
			#header('Content-Type: application/zip');
			#header('Content-disposition: attachment; filename='.$zipname);
			#header('Content-Length: ' . filesize($zipname));
			#readfile($zipname);
			
			}
			
		}
		#options (close)
		
		#file list (tog) (open)
		if(1==1){
			
			#preparation (open)
			if(1==1){
				
				#database query delete (open)
				if(1==1){
					$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_files',
						array( //location of row to delete
						'vol_file_type_general' => "voluno_staff_files",
						'vol_file_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
						array( //format of location of row to delete
						'%s','%s'
						));
				}
				#database query delete (close)
				
				#database entry (open)
				for($afh=0;$afh<count($file_list);$afh++){
					
					$filename_full = $current_directory.'/'.$file_list[$afh];
					
					#database query insert (open)
					if(1==1){
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_files',
						array(
							'vol_file_name' => $filename_full,
							'vol_file_type_general' => 'voluno_staff_files',
							
							'vol_file_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
							'vol_file_size' => filesize($filename_full),
							'vol_file_mime' => filetype($filename_full),
							
							'vol_file_date_modified' => date("Y-m-d H:i:s",filemtime($filename_full)),
							'vol_file_date_created' => date("Y-m-d H:i:s",filemtime($filename_full)),
						),
						array(
							'%s','%s',
							'%s','%s','%s',
							'%s','%s'
						));
					}
					#database query insert (close)
					
				}
				#database entry (close)
				
			}
			#preparation (close)
			
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
																		FROM fi4l3fg_voluno_files
																		
																		LEFT JOIN fi4l3fg_voluno_users_extended
																			ON vol_file_user_id = usersext_id
																		
																		WHERE vol_file_type_general = "voluno_staff_files"
																			AND vol_file_user_id = %s;'
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
								
								$function_table['data'][$ajl]['vol_file_name'] = $function_table['results'][$ajl]->vol_file_name;
								$function_table['data'][$ajl]['vol_file_date_modified'] = $function_table['results'][$ajl]->vol_file_date_modified;
								$function_table['data'][$ajl]['vol_file_date_created'] = $function_table['results'][$ajl]->vol_file_date_created;
								$function_table['data'][$ajl]['vol_file_mime'] = $function_table['results'][$ajl]->vol_file_mime;
								
								$function_table['data'][$ajl]['display_name'] = $function_table['results'][$ajl]->usersext_displayName;
								$function_table['data'][$ajl]['vol_file_id'] = $function_table['results'][$ajl]->vol_file_id;
								$function_table['data'][$ajl]['vol_file_size'] = $function_table['results'][$ajl]->vol_file_size;
								$function_table['data'][$ajl]['vol_file_user_id'] = $function_table['results'][$ajl]->vol_file_user_id;
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
						
						$function_table['unique id'] = 'voluno_staff_files_fnisagbvzrvia';
						// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
						
						#Options connected to the title (open)
						if(1==1){
							
							#$function_table['display title'] = 'Please add a title. ';
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
							
							#$function_table['hide column headings'] = 'yes';
							// Hides headings of table. 'yes' or empty (default).
							
							// The following multi-dimensional array has the following structure:
							// - heading = The heading that will be displayed above the respective column.
							// - width = Optional. With of the respective column. You can either use % or pt.
							// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
							//                    columns names that you used in the 'Raw data' section.
							//                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were 'email' and 'id'.
							$function_table['column headings'] 
							= array(
								array( // In almost all cases, the first column should be the row numbering. If you want to keep it, just leave it as it is.
									'heading'		 => '#', // See 1 row above.
									'width'			 => '5%' // See 2 rows above.
								),
								array(
									'heading'		 => 'Name',
									'width'			 => '30%',
									'sorting option' => 'vol_file_name'
								),
								array(
									'heading'		 => 'Size',
									'width'			 => '10%',
									'sorting option' => 'vol_file_size'
								),
								array(
									'heading'		 => 'Date',
									'width'			 => '15%',
									'sorting option' => 'vol_file_date_modified'
								),
								array(
									'heading'		 => 'Author',
									'width'			 => '15%',
									'sorting option' => 'display_name'
								)
							);
							
							//Optionally, you can choose one of the above columns to be the default sorting option.
							// If you don't want this, please delete or hide the entire array.
							$function_table['default ordering']
							= array(
								'column' => 'vol_file_name', // Colum name. In the example, 'email' or 'id'.
								'direction' => 'ASC' // ASC or DESC
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
								'lines' => 'no' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
								,'content' => 'There are no files in this folder.' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
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
							
							$function_table['table rows'] .= '
							<td>
								'.number_format(($abs+1),0,"."," ").'
							</td>
							';
							
						}
						#1 (close)
						
						#2 name (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								<a
									title="'.dirname($function_table['data'][$abs]['vol_file_name']).'"
									href="'.
										str_replace(
										'/home3/ghanaint/public_html/',
										'https://www.',
										$function_table['data'][$abs]['vol_file_name'])
										.
									'"
									download
								>
									'.basename($function_table['data'][$abs]['vol_file_name']).'
								</a>
							</td>
							';
						  
						}
						#2 name (close)
						
						#3 size (open)
						if(1==1){
						  
							#if($function_table['data'][$abs]['vol_file_size'] <= 1024^1){
							#$size = $function_table['data'][$abs]['vol_file_size'].' Bytes';
							#}else
							if($function_table['data'][$abs]['vol_file_size'] <= pow(1024,2)){
								$size = $function_table['data'][$abs]['vol_file_size'] * (1/1024);
								$unit = 'KB';
							}elseif($function_table['data'][$abs]['vol_file_size'] <= pow(1024,3)){
								$size = $function_table['data'][$abs]['vol_file_size'] * (1/pow(1024,2));
								$unit = 'MB';
							}elseif($function_table['data'][$abs]['vol_file_size'] <= pow(1024,4)){
								$size = $function_table['data'][$abs]['vol_file_size'] * (1/pow(1024,3));
								$unit = 'GB';
							}
							
							$function_table['table rows'] .= '
							<td>
								'.number_format($size,1).' '.$unit.'
							</td>
							';
							
						}
						#3 size (close)
						
						#4 date (open)
						if(1==1){
							
							#function-timezone.php (v1.0) (open)
							if(1==1){
								$function_timezone = $function_table['data'][$abs]['vol_file_date_modified'];
								$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
								$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
								$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
								//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
								//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
								include('#function-timezone.php');
								#output:
								
							}
							#function-timezone.php (v1.0) (close)
							
							$function_table['table rows'] .= '
							<td>
								'.$function_timezone.'
							</td>
							';
							
						}
						#4 date (close)
						
						#5 author (open)
						if(1==1){
							
							#function-profile-link.php (v1.0) (open)
							if(1==1){
								
								#documentation (open)
								if(1==1){
									
									// Links to user profile or NGO profile, see Technical feature: User profile and Conceptual component: NGO profile.
									// Provides complete link, link address, name, or link title.
									// Optionally displays image of user on hover of link.
									
								}
								#documentation (close)
								
								#input (open)
								if(1==1){
									
									$function_profileLink['id'] = $function_table['data'][$abs]['vol_file_user_id']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
									$function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
									
								}
								#input (close)
								
								include('#function-profile-link.php');
								
								#output (open)
								if(1==1){
									
									//output saved in:
									# $function_profileLink['link']
									# $function_profileLink['name_link']
									# $function_profileLink['name']
									# $function_profileLink['link_title']
									
									# $function_profileLink['status'] = 'deleted' or 'paused/suspended' or 'active'
									
								}
								#output (close)
								
							}
							#function-profile-link.php (v1.0) (close)
							
							$function_table['table rows'] .= '
							<td>
								'.$function_profileLink['name_link'].'
							</td>
							';
						}
						#5 author (close)
						
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
			
		}
		#file list (tog) (close)
		
    echo '
    </div>';
}
#ajax files (close)

?>