<?php

#page decision (open)
if(1==1){ ///1
    
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
    
    #is there a get? (open)
    if(!empty($_GET['discussion'])){
	$there_is_a_get = array("discussion",intval($_GET['discussion']));
    }elseif(!empty($_GET['thread'])){
	$there_is_a_get = array("thread",intval($_GET['thread']));
    }
    #is there a get? (close)
    
    #if there is a get, is it valid? (open)
    if(!empty($there_is_a_get)){
	
	#check access to discussion (open)
	if($there_is_a_get[0] == "discussion"){
	    
	    $is_discussion_valid_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_forum_discussions
							WHERE voluno_for_dis_id = %d
							    AND voluno_for_dis_status = "";'
							,$there_is_a_get[1]);
	    $is_discussion_valid_row = $GLOBALS['wpdb']->get_row($is_discussion_valid_query);
	    
	    if(!empty($is_discussion_valid_row)){
		$page_section = "forum individual discussion (posts)";
	    }
	    
	}
	#check access to discussion (close)
	
	#check access to thread (open)
	elseif($there_is_a_get[0] == "thread"){
	    
	    $is_thread_valid_query = $GLOBALS['wpdb']->prepare('SELECT *
						    FROM fi4l3fg_voluno_forum_threads
						    WHERE voluno_for_thr_id = %d
							AND voluno_for_thr_status = "";'
						    ,$there_is_a_get[1]);
	    $is_thread_valid_row = $GLOBALS['wpdb']->get_row($is_thread_valid_query);
	    
	    if(!empty($is_thread_valid_row)){
		$page_section = "forum individual thread (discussions)";
	    }
	    
	}
	#check access to thread (close)
	
    }
    #if there is a get, is it valid? (close)
    
    #alternatively forum overview (open)
    if(empty($page_section)){
	
	$page_section = "forum overview (threads)";
	
    }
    #alternatively forum overview (close)
    
    #ajax (open)
    if(1==1){
	
	#reporting forum posts mysql page (open)
	if(!empty($_GET['reported_post']) AND $page_section == "forum individual discussion (posts)"){
	    
	    $page_section = "report a forum post mysql page";
	    
	}
	#reporting forum posts mysql page (close)
	
	#save edit of a forum post or delete it (open)
	if(!empty($_GET['edit_post_action']) AND $page_section == "forum individual discussion (posts)"){
	    
	    if($_GET['edit_post_action'] == "save_post"){
		$page_section = "save edit of a forum post";
	    }elseif($_GET['edit_post_action'] == "delete_post"){
		$page_section = "delete a forum post";
	    }
	    
	}
	#save edit of a forum post or delete it (close)
	
    }
    #ajax (close)
    
    #ngo profile discussions (open)
    if(get_the_ID() == 853){
	$page_section = "forum individual thread (discussions)";
    }
    #ngo profile discussions (close)
    
}
#page decision (close)

#forum overview (threads) (open)
if($page_section == "forum overview (threads)"){ ///2
    
    #jquery (open)
    if(1==1){ ///7
		
		echo '
		<script>
			jQuery(document).ready(function(){';
				
				#community rules text (open)
				if(1==1){
					echo '
					jQuery(".community_rules_link").click(function(){
					jQuery(".community_rules_text_div").fadeIn(300);
					});';
				}
				#community rules text (close)
				
			echo '
			});
		</script>';
		
    }
    #jquery (close)
    
    #style (open)
    if(1==1){ ///8
		
		echo '
		<style>
			.fade_out_on_hover:hover{
				opacity:0;
			}
		</style>';
		
    }
    #style (close)
    
    #content (open)
    if(1==1){
		
		#img + title + intro text (open)
		if(1==1){
			
			#preparation (open)
			if(1==1){
				
				#function-image-processing (open)
				if(1==1){
					#thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "forum.jpg";
					#all
					$function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
					include('#function-image-processing.php');
					$page_header_picture = $function_propic;
				}
				#function-image-processing (close)
				
				#function-fixed-div.php (open)
				if(1==1){ ///9
					$function_fixed_div_part = 1; //1 or 2, obligatory
					$function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
					$function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
					$function_fixed_div_div_name = "community_rules_text_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
					$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
					$function_fixed_div_border_radius = 25; //optional, default is 0
					$function_fixed_div_height_div = 50; //optional, in percent, default is 50
					$function_fixed_div_text_align = "center"; //optional, default is left
					$function_fixed_div_padding_text_top = "40"; //optional, default 0(px)
					$function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
					include('#function-fixed-div.php');
					$open_div = $function_fixed_div_display;
					
				#function-fixed-div.php
					$function_fixed_div_part = 2; //1 or 2, both are obligatory
					include('#function-fixed-div.php');
					$close_div = $function_fixed_div_display;
				}
				#function-fixed-div.php (close)
				
				#community rules array (open)
				if(1==1){ ///10
					
					#function-image-processing (open)
					if(1==1){
						#thematic only
							$function_propic__type = "thematic";
							$function_propic__original_img_name = "flag.png";
						#all
							$function_propic__geometry = array(16,16); //optional, if e.g. only width: 300, NULL; vice versa
						include('#function-image-processing.php');
						$flag = $function_propic;
						#thematic only
							$function_propic__type = "thematic";
							$function_propic__original_img_name = "flag-on.png";
						#all
							$function_propic__geometry = array(16,16); //optional, if e.g. only width: 300, NULL; vice versa
						include('#function-image-processing.php');
						$flag_on = $function_propic;
						
						$flag_img = 
						'<span style="position:relative;">
							<img
							src="'.$flag.'"
							class="fade_out_on_hover"
							style="position:absolute;cursor:help;"
							title="This &quot;Report to moderator&quot; icon is located at the right of each forum post.">
							<img src="'.$flag_on.'">
						</span>';
					}
					#function-image-processing (close)
					
					#community rules array (open)
					if(1==1){
						$community_rules_array_items = array(
							array(
								'title' => 'General rules'
								,'text' => 'Please do not do any of the following:'
								,'item_list' => array(
								'Flame or insult other members'
								,'Abuse or encourage abuse of the Reporting System'
								,'Post personally sensitive information (private address, bank account number, etc.)'
								,'Derail a thread\'s topic'
								,'Post links to phishing or advertizing sites'
								,'Post spam or re-post closed, modified, deleted content'
								,'Repetitively post in the incorrect forum'
								)
							)
							,array(
								'title' => 'Off-limit discussions/replies'
								,'text' => 'Please never post any of the following content:'
								,'item_list' => array(
								'Pornography, inappropriate or offensive content, including discrimination, abusive language, etc.'
								,'Illegal content, such as stolen documents, discussion or planning of criminal activities,
									copyrighted materials, etc.'
								,'Attempts to hack into restricted areas of this website, exploit security loopholes or hijack the website.
									If you should find such loopholes, kinldy inform Voluno staff about them, but don\'t publish them,
									unless you can be absolutely certain that they have been resolved. Our aim is not to cover up
									potential security breaches, but to prevent more damage from happening.'
								,'Threats of violence or harassment, even as a joke'
								,'Soliciting, begging, auctioning, raffling, selling, advertising, referrals'
								)
							)
							,array(
								'title' => 'Reporting'
								,'text' => 'Should you observe a fellow community member breaking these rules, please report
									the post by clicking the report icon ('.$flag_img.') located at the very right of every post.'
							)
							,array(
								'title' => 'Consequences for offenders'
								,'text' => 'Moderators will evaluate the offence(s) and take appropriate steps, according to their discretion.'
								,'item_list' => array(
								'In general, first time offenders of minor offences will be warned.'
								,'Repeat offenders will be banned from the Voluno forum community.
								This can also include a ban from all other Voluno services.'
								)
							)
						);
					}
					#community rules array (close)
					
				}
				#community rules array (close)
				
			}
			#preparation (close)
			
			#content (open)
			if(1==1){
				
				#img + title (open)
				if(1==1){
					
					echo '
					<img src="'.$page_header_picture.'" class="voluno_header_picture">
					<div style="text-align:center;margin:20px;">
					<h1 style="display:inline;">
						Voluno Forum
					</h1>
					</div>';
					
				}
				#img + title (close)
				
				#intro text (open)
				if(1==1){ ///11
					
					echo '
					<p>
						Welcome to our forum. A main pillar of Voluno is that we are a network, connecting our members
						for the benefit of development, but also for the benefit of everyone involved.
						<br>
						This forum is one of the ways that Voluno members can get intouch, ask questions, post information,
						exchange ideas and engage in discussions. Our aim is to create a lively community, bringing together
						strangers of different cultural backgrounds and in different
						geographic locations and making them friends and partners for development.
						<br>
						All members are welcome to participate, as long as the
						<a class="community_rules_link" style="cursor:pointer;font-weight:bold;">
							community rules
						</a>
						are respected.
					</p>';
					
					#community rules text (open)
					if(1==1){
						
						echo
						$open_div.'
						<div style="padding:0px 20px 50px 20px;">
							<h1 style="display:inline;">
							Voluno community rules
							</h1>';
							
							#community rules loop (open)
							for($acn=0;$acn<count($community_rules_array_items);$acn++){
								
								echo '
								<h3>
									'.($acn+1).'. '.$community_rules_array_items[$acn]['title'].'
								</h3>
								<p>
									'.$community_rules_array_items[$acn]['text'].'
								</p>
								<ul>';
									for($aco=0;$aco<count($community_rules_array_items[$acn]['item_list']);$aco++){
									echo '
									<li>
										<p>
										'.$community_rules_array_items[$acn]['item_list'][$aco].'
										</p>
									</li>';
									}
								echo '
								</ul>';
								
							}
							#community rules loop (close)
							
						echo '
						</div>
						'.$close_div;
						
					}
					#community rules text (close)
					
				}
				#intro text (close)
				
			}
			#content (close)
			
		}
		#img + title + intro text (close)
		
		#table of threads (open)
		if(1==1){ ///5
			
			$query_text = 'SELECT *
					FROM fi4l3fg_voluno_forum_threads
					WHERE voluno_for_thr_type = ""
					ORDER BY voluno_for_thr_order ASC;';
			
			#update number of discussions and posts (open)
			if(1==1){
				
				$all_threads_for_counter_query = $GLOBALS['wpdb']->prepare($query_text);
				$all_threads_for_counter_results = $GLOBALS['wpdb']->get_results($all_threads_for_counter_query);
				
				#go through all threads (open)
				for($abi=0;$abi<count($all_threads_for_counter_results);$abi++){
					
					unset($discussion_counter,$post_counter,$last_post);
					
					#find discussions for each thread (open)
					if(1==1){
						$all_dis_for_this_thread_query = $GLOBALS['wpdb']->prepare('SELECT *
												FROM fi4l3fg_voluno_forum_discussions
												WHERE voluno_for_dis_thread = %d
												AND voluno_for_dis_status = "";'
												,$all_threads_for_counter_results[$abi]->voluno_for_thr_id);
						$all_dis_for_this_thread_results = $GLOBALS['wpdb']->get_results($all_dis_for_this_thread_query);
						$discussion_counter = count($all_dis_for_this_thread_results);
					}
					#find discussions for each thread (close)
					
					#find posts for each discussion (open)
					for($abj=0;$abj<count($all_dis_for_this_thread_results);$abj++){
						
						$all_posts_for_this_dis_query = $GLOBALS['wpdb']->prepare('SELECT *
												FROM fi4l3fg_voluno_forum_posts
												WHERE voluno_for_pos_discussion = %d
												AND voluno_for_pos_status = ""
												ORDER BY voluno_for_pos_date_created DESC;'
												,$all_dis_for_this_thread_results[$abj]->voluno_for_dis_id);
						$all_posts_for_this_dis_results = $GLOBALS['wpdb']->get_results($all_posts_for_this_dis_query);
						
						$post_counter = $post_counter + count($all_posts_for_this_dis_results);
						
						if($last_post['date'] < $all_posts_for_this_dis_results[$abj]->voluno_for_pos_date_created){
						$last_post
							= array(
							'date' => $all_posts_for_this_dis_results[$abj]->voluno_for_pos_date_created
							,'post_id' => $all_posts_for_this_dis_results[$abj]->voluno_for_pos_id
							);
						}
						
					}
					#find posts for each discussion (close)
					
					#update specific thread (open)
					if(1==1){
						
						#database query update (open)
						if(1==1){
						$GLOBALS['wpdb']->update( 
								'fi4l3fg_voluno_forum_threads',
							array( //updated content
								'voluno_for_thr_num_of_dis' => $discussion_counter,
								'voluno_for_thr_num_of_post' => $post_counter,
								'voluno_for_thr_last_post' => $last_post['post_id'],
								'voluno_for_thr_last_post_date' => $last_post['date']
							),
							array( //location of updated content
								'voluno_for_thr_id' => $all_threads_for_counter_results[$abi]->voluno_for_thr_id
							),
							array( //format of updated content
								'%d','%d','%d','%s'
							),
							array( //format of location of updated content
								'%d'
								));
						}
						#database query update (close)
						
					}
					#update specific thread (close)
					
				}
				#go through all threads (close)
				
			}
			#update number of discussions and posts (close)
			
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
							
							$function_table['query'] = $GLOBALS['wpdb']->prepare($query_text);
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
								
								$function_table['data'][$ajl]['voluno_for_thr_title'] = $function_table['results'][$ajl]->voluno_for_thr_title;
								$function_table['data'][$ajl]['voluno_for_thr_description'] = $function_table['results'][$ajl]->voluno_for_thr_description;
								$function_table['data'][$ajl]['voluno_for_thr_last_post_date'] = $function_table['results'][$ajl]->voluno_for_thr_last_post_date;
								
								$function_table['data'][$ajl]['voluno_for_thr_id'] = $function_table['results'][$ajl]->voluno_for_thr_id;
								$function_table['data'][$ajl]['voluno_for_thr_num_of_dis'] = $function_table['results'][$ajl]->voluno_for_thr_num_of_dis;
								$function_table['data'][$ajl]['voluno_for_thr_num_of_post'] = $function_table['results'][$ajl]->voluno_for_thr_num_of_post;
								
								$function_table['data'][$ajl]['voluno_for_thr_last_post'] = $function_table['results'][$ajl]->voluno_for_thr_last_post;
								$function_table['data'][$ajl]['voluno_for_thr_order'] = $function_table['results'][$ajl]->voluno_for_thr_order;
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
						
						$function_table['unique id'] = 'forum_threads_general_topics_fbvifhizr';
						// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
						
						#Options connected to the title (open)
						if(1==1){
							
							$function_table['display title'] = 'General forum topics';
							// The title of the table which is displayed above the table. To hide title, leave empty.
							
							$function_table['show on load'] = 'no';
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
									'heading'		 => 'Topics',
									'width'			 => '45%',
									'sorting option' => 'voluno_for_thr_title'
								),
								array(
									'heading'		 => 'Amount of discussions',
									'width'			 => '10%',
									'sorting option' => 'voluno_for_thr_num_of_dis'
								),
								array(
									'heading'		 => 'Amount of posts',
									'width'			 => '20%',
									'sorting option' => 'voluno_for_thr_num_of_post'
								),
								array(
									'heading'		 => 'Last post',
									'width'			 => '20%',
									'sorting option' => 'voluno_for_thr_last_post_date'
								)
							);
							
							//Optionally, you can choose one of the above columns to be the default sorting option.
							// If you don't want this, please delete or hide the entire array.
							$function_table['default ordering']
							= array(
								'column' => 'voluno_for_thr_order', // Colum name. In the example, 'email' or 'id'.
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
							
							#$function_table['no_items_available_message'] = array(
							#    'lines' => 'no' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
							#    ,'content' => 'none' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
							#);
							
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
						
						#1 Counter (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.number_format(($abs+1),0,"."," ").'
							</td>
							';
						  
						}
						#1 Counter (close)
						
						#2 Topic (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td style="text-align:justify;">
								<b>
									<a
										title="Go to topic"
										href="'.get_permalink().'?thread='.$function_table['data'][$abs]['voluno_for_thr_id'].'"
									>
										'.$function_table['data'][$abs]['voluno_for_thr_title'].'
									</a>
								</b>
								<br>'.
								$function_table['data'][$abs]['voluno_for_thr_description'];
								
								#
								if(in_array('Voluno Moderator',$function_userpositions_get['simple_pure_array']['accepted'])){
									
									$function_table['table rows'] .= '
									<span style="color:grey;"> ('.$function_table['data'][$abs]['voluno_for_thr_order'].')</span>';
									
								}
								#
								
							$function_table['table rows'] .= '
							</td>
							';
						  
						}
						#2 Topic (close)
						
						#3 Discussions (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.number_format($function_table['data'][$abs]['voluno_for_thr_num_of_dis'],0,"."," ").'
							</td>
							';
						  
						}
						#3 Discussions (close)
						
						#4 Posts (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.number_format($function_table['data'][$abs]['voluno_for_thr_num_of_post'],0,"."," ").'
							</td>
							';
							
						}
						#4 Posts (close)
						
						#5 Last post (open)
						if(1==1){
							
							#is there a last post? (open)
							if($function_table['data'][$abs]['voluno_for_thr_last_post'] != 0){
								
								$is_there_a_last_post = "yes";
								
							}else{
								
								unset($is_there_a_last_post);
								
							}
							#is there a last post? (close)
							
							#preparation (open)
							if($is_there_a_last_post == "yes"){
								
								#query (open)
								if(1==1){
									
									$post_query = $GLOBALS['wpdb']->prepare('SELECT *
													FROM fi4l3fg_voluno_forum_posts
													WHERE voluno_for_pos_id = %d;'
													,$function_table['data'][$abs]['voluno_for_thr_last_post']);
									$post_row = $GLOBALS['wpdb']->get_row($post_query);
									
								}
								#query (close)
								
								#function-timezone.php (open)
								if(1==1){
									
									$post_date = $function_table['data'][$abs]['voluno_for_thr_last_post_date'];
									
									$function_timezone = $post_date;
									$function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									#output:
									$date = $function_timezone;
								  
									$function_timezone = $post_date;
									$function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									#output:
									$time = $function_timezone;
									
									$function_timezone = $post_date;
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									#output:
									$difference = $function_timezone;
								  
								}
								#function-timezone.php (close)
								
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
                                        
                                        $function_profileLink['id'] = $post_row->voluno_for_pos_author; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
							}
							#preparation (close)
							
							#content (open)
							if(1==1){
								
								$function_table['table rows'] .= '
								<td>';
									
									#
									if($is_there_a_last_post == "yes"){
										
										$function_table['table rows'] .= 
										$function_profileLink['name_link'].'
										<br>
										<a
											title="Go to most recent post"
											href="'.get_permalink().'?discussion='.$post_row->voluno_for_pos_discussion.'"
										>
											'.$date.', '.$time.'
											<br>
											('.$difference.')
										</a>';
										
									}
									#
									
								$function_table['table rows'] .= '
								</td>';
								
							}
							#content (close)
						
						}
						#5 Last post (close)
						
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
		#table of threads (close)
		
		#table of public forums of development organization (open)
		if(1==1){ ///6
			
			$query_text = 'SELECT *
					FROM fi4l3fg_voluno_forum_threads
					LEFT JOIN fi4l3fg_voluno_development_organizations
						ON voluno_for_thr_type_id = ngo_id
					WHERE voluno_for_thr_type = "ngo_public"
					ORDER BY voluno_for_thr_order ASC, ngo_name ASC;';
			
			#update number of discussions and posts (open)
			if(1==1){
				
				$all_threads_for_counter_query = $GLOBALS['wpdb']->prepare($query_text);
				$all_threads_for_counter_results = $GLOBALS['wpdb']->get_results($all_threads_for_counter_query);
				
				#go through all threads (open)
				for($abi=0;$abi<count($all_threads_for_counter_results);$abi++){
				
				unset($discussion_counter,$post_counter,$last_post);
				
				#find discussions for each thread (open)
				if(1==1){
					$all_dis_for_this_thread_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_forum_discussions
											WHERE voluno_for_dis_thread = %d
											AND voluno_for_dis_status = "";'
											,$all_threads_for_counter_results[$abi]->voluno_for_thr_id);
					$all_dis_for_this_thread_results = $GLOBALS['wpdb']->get_results($all_dis_for_this_thread_query);
					$discussion_counter = count($all_dis_for_this_thread_results);
				}
				#find discussions for each thread (close)
				
				#find posts for each discussion (open)
				for($abj=0;$abj<count($all_dis_for_this_thread_results);$abj++){
					
					$all_posts_for_this_dis_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_forum_posts
											WHERE voluno_for_pos_discussion = %d
											AND voluno_for_pos_status = ""
											ORDER BY voluno_for_pos_date_created DESC;'
											,$all_dis_for_this_thread_results[$abj]->voluno_for_dis_id);
					$all_posts_for_this_dis_results = $GLOBALS['wpdb']->get_results($all_posts_for_this_dis_query);
					
					$post_counter = $post_counter + count($all_posts_for_this_dis_results);
					
					if($last_post['date'] < $all_posts_for_this_dis_results[$abj]->voluno_for_pos_date_created){
					$last_post
						= array(
						'date' => $all_posts_for_this_dis_results[$abj]->voluno_for_pos_date_created
						,'post_id' => $all_posts_for_this_dis_results[$abj]->voluno_for_pos_id
						);
					}
					
				}
				#find posts for each discussion (close)
				
				#update specific thread (open)
				if(1==1){
					
					#database query update (open)
					if(1==1){
					$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_forum_threads',
						array( //updated content
							'voluno_for_thr_num_of_dis' => $discussion_counter,
							'voluno_for_thr_num_of_post' => $post_counter,
							'voluno_for_thr_last_post' => $last_post['post_id'],
							'voluno_for_thr_last_post_date' => $last_post['date']
						),
						array( //location of updated content
							'voluno_for_thr_id' => $all_threads_for_counter_results[$abi]->voluno_for_thr_id
						),
						array( //format of updated content
							'%d','%d','%d','%s'
						),
						array( //format of location of updated content
							'%d'
							));
					}
					#database query update (close)
					
				}
				#update specific thread (close)
				
				}
				#go through all threads (close)
				
			}
			#update number of discussions and posts (close)
			
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
							
							$function_table['query'] = $GLOBALS['wpdb']->prepare($query_text);
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
								
								$function_table['data'][$ajl]['voluno_for_thr_title'] = $function_table['results'][$ajl]->voluno_for_thr_title;
								$function_table['data'][$ajl]['voluno_for_thr_description'] = $function_table['results'][$ajl]->voluno_for_thr_description;
								$function_table['data'][$ajl]['voluno_for_thr_last_post_date'] = $function_table['results'][$ajl]->voluno_for_thr_last_post_date;
								
								$function_table['data'][$ajl]['voluno_for_thr_id'] = $function_table['results'][$ajl]->voluno_for_thr_id;
								$function_table['data'][$ajl]['voluno_for_thr_num_of_dis'] = $function_table['results'][$ajl]->voluno_for_thr_num_of_dis;
								$function_table['data'][$ajl]['voluno_for_thr_num_of_post'] = $function_table['results'][$ajl]->voluno_for_thr_num_of_post;
								
								$function_table['data'][$ajl]['voluno_for_thr_last_post'] = $function_table['results'][$ajl]->voluno_for_thr_last_post;
								$function_table['data'][$ajl]['voluno_for_thr_order'] = $function_table['results'][$ajl]->voluno_for_thr_order;
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
						
						$function_table['unique id'] = 'forum_threads_ngo_public_micbdicnownivw';
						// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
						
						#Options connected to the title (open)
						if(1==1){
							
							$function_table['display title'] = 'Public threads of development organizations';
							// The title of the table which is displayed above the table. To hide title, leave empty.
							
							$function_table['show on load'] = 'no';
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
									'heading'		 => 'Topics',
									'width'			 => '45%',
									'sorting option' => 'voluno_for_thr_title'
								),
								array(
									'heading'		 => 'Amount of discussions',
									'width'			 => '10%',
									'sorting option' => 'voluno_for_thr_num_of_dis'
								),
								array(
									'heading'		 => 'Amount of posts',
									'width'			 => '20%',
									'sorting option' => 'voluno_for_thr_num_of_post'
								),
								array(
									'heading'		 => 'Last post',
									'width'			 => '20%',
									'sorting option' => 'voluno_for_thr_last_post_date'
								)
							);
							
							//Optionally, you can choose one of the above columns to be the default sorting option.
							// If you don't want this, please delete or hide the entire array.
							$function_table['default ordering']
							= array(
								'column' => 'voluno_for_thr_order', // Colum name. In the example, 'email' or 'id'.
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
							
							#$function_table['no_items_available_message'] = array(
							#    'lines' => 'no' // Should a line be displayed left and right of the messsage? Not important, just looks nice. 'no' or 'yes' (default).
							#    ,'content' => 'none' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
							#);
							
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
						
						#1 Counter (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.number_format(($abs+1),0,"."," ").'
							</td>
							';
							
						}
						#1 Counter (close)
						
						#2 Topic (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td style="text-align:justify;">
								<b>
									<a
										title="Go to topic"
										href="'.get_permalink().'?thread='.$function_table['data'][$abs]['voluno_for_thr_id'].'"
									>
										'.$function_table['data'][$abs]['voluno_for_thr_title'].'
									</a>
								</b>
								<br>'.
								$function_table['data'][$abs]['voluno_for_thr_description'];
								
								#
								if(in_array('Voluno Moderator',$function_userpositions_get['simple_pure_array']['accepted'])){
									
									$function_table['table rows'] .= '
									<span style="color:grey;"> ('.$function_table['data'][$abs]['voluno_for_thr_order'].')</span>';
									
								}
								#
								
							$function_table['table rows'] .= '
							</td>
							';
							
						}
						#2 Topic (close)
						
						#3 Discussions (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.number_format($function_table['data'][$abs]['voluno_for_thr_num_of_dis'],0,"."," ").'
							</td>
							';
							
						}
						#3 Discussions (close)
						
						#4 Posts (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.number_format($function_table['data'][$abs]['voluno_for_thr_num_of_post'],0,"."," ").'
							</td>
							';
							
						}
						#4 Posts (close)
						
						#5 Last post (open)
						if(1==1){
							
							#is there a last post? (open)
							if($function_table['data'][$abs]['voluno_for_thr_last_post'] != 0){
								
								$is_there_a_last_post = "yes";
								
							}else{
								
								unset($is_there_a_last_post);
								
							}
							#is there a last post? (close)
							
							#preparation (open)
							if($is_there_a_last_post == "yes"){
								
								#query (open)
								if(1==1){
									
									$post_query = $GLOBALS['wpdb']->prepare('SELECT *
													FROM fi4l3fg_voluno_forum_posts
													WHERE voluno_for_pos_id = %d;'
													,$function_table['data'][$abs]['voluno_for_thr_last_post']);
									$post_row = $GLOBALS['wpdb']->get_row($post_query);
									
								}
								#query (close)
								
								#function-timezone.php (open)
								if(1==1){
									
									$post_date = $function_table['data'][$abs]['voluno_for_thr_last_post_date'];
									
									$function_timezone = $post_date;
									$function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									#output:
									$date = $function_timezone;
								  
									$function_timezone = $post_date;
									$function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									#output:
									$time = $function_timezone;
									
									$function_timezone = $post_date;
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									#output:
									$difference = $function_timezone;
								  
								}
								#function-timezone.php (close)
								
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
                                        
                                        $function_profileLink['id'] = $post_row->voluno_for_pos_author; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
							}
							#preparation (close)
							
							#content (open)
							if(1==1){
								
								$function_table['table rows'] .= '
								<td>';
									
									if($is_there_a_last_post == "yes"){
										
										$function_table['table rows'] .= 
										$function_profileLink['name_link'].'
										<br>
										<a
											title="Go to most recent post"
											href="'.get_permalink().'?discussion='.$post_row->voluno_for_pos_discussion.'"
										>
											'.$date.', '.$time.'
											<br>
											('.$difference.')
										</a>';
										
									}
									
								$function_table['table rows'] .= '
								</td>';
								
							}
							#content (close)
						
						}
						#5 Last post (close)
						
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
		#table of public forums of development organization (close)
		
    }
    #content (close)
    
}
#forum overview (threads) (close)

#forum individual thread (discussions) (open)
if($page_section == "forum individual thread (discussions)"){ ///3
    
    #arm (open)
    if(1==1){ ///12
		#is this the forum or is it the ngo profile? (open)
		if(get_the_ID() == 853){
			$arm_forum['get_thread_info__ngo_profile'] = "yes";
			$arm_forum['tog_title_ngo_profile'] = "yes";
		}else{
			$arm_forum['forum_image'] = "yes";
			$arm_forum['forum_regular_image_title_text'] = "yes";
			$arm_forum['tog_title_regular'] = "yes";
		}
		#is this the forum or is it the ngo profile? (close)
    }
    #arm (close)
    
    #mysql (open)
    if(1==1){
		
		#update (open)
		if(1==1){
			
			#add new discussion (open)
			if(!empty($_POST['add_discussion__first_post'])){ ///21
				
				$add_discussion__first_post = stripslashes($_POST['add_discussion__first_post']);
				$add_discussion__thread = stripslashes($_POST['add_discussion__thread']);
				$add_discussion__title = stripslashes($_POST['add_discussion__title']);
				
				#sanitize + verify information (open)
				if(1==1){
					
					#function-sanitize-text.php (open)
					if(1==1){
						
						$function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
						/*
						 *one line unformatted text (city, name, occupation, etc.)
						 *url readable text (url, user_nicename, etc.) (sanitize_title)
						 *email address
						 *plain text with line breaks (biography)
						*/
						$function_sanitize_text__text = $add_discussion__first_post;
						include('#function-sanitize-text.php');
						$add_discussion__first_post = $function_sanitize_text__text_sanitized;
						
						$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
						$function_sanitize_text__text = $add_discussion__title;
						include('#function-sanitize-text.php');
						$add_discussion__title = $function_sanitize_text__text_sanitized;
						
						$add_discussion__thread = intval($add_discussion__thread);
						
					}
					#function-sanitize-text.php (close)
					
					#does thread exist and does user have rights to start discussion there? (open)
					if(1==1){
						$thread_verification_query = $GLOBALS['wpdb']->prepare('SELECT *
												FROM fi4l3fg_voluno_forum_threads
												WHERE voluno_for_thr_id = %d;'
												,$add_discussion__thread);
						$thread_verification_row = $GLOBALS['wpdb']->get_row($thread_verification_query);
						
						if(empty($thread_verification_row)){
							$verification_failed = "yes";
						}
					}
					#does thread exist and does user have rights to start discussion there? (close)
					
				}
				#sanitize + verify information (close)
				
				#insert into database (open)
				if($verification_failed != "yes"){
					
					#create discussion (open)
					if(1==1){
						
						$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_forum_discussions',
							array(
								'voluno_for_dis_title' => $add_discussion__title,
								'voluno_for_dis_author' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'voluno_for_dis_thread' => $add_discussion__thread,
								
								'voluno_for_dis_num_of_posts' => 1,
								'voluno_for_dis_date_modified' => date("Y-m-d H:i:s"),
								'voluno_for_dis_date_created' => date("Y-m-d H:i:s")
								),
							array(
								'%s','%s','%d',
								'%d','%s','%s'
								));
						
						$new_discussion = $GLOBALS['wpdb']->insert_id;
						
					}
					#create discussion (close)
					
					#create post (open)
					if(1==1){
						
						$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_forum_posts',
							array(
								'voluno_for_pos_content' => $add_discussion__first_post,
								'voluno_for_pos_author' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'voluno_for_pos_discussion' => $new_discussion,
								
								'voluno_for_pos_date_modified' => date("Y-m-d H:i:s"),
								'voluno_for_pos_date_created' => date("Y-m-d H:i:s"),
								),
							array(
								'%s','%s','%d',
								'%s','%s'
								));
						
					}
					#create post (close)
					
				}
				#insert into database (close)
				
				#add notification and email (open)
				if($verification_failed != "yes"){
					
					#get array of users who will be informed (open)
					if(1==1){
						
						$user_who_have_subscribed_to_thread_query
							= $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_personal_settings
									LEFT JOIN fi4l3fg_voluno_users_extended
									ON pers_settings_user_id = usersext_id
									WHERE pers_settings_general = "forum subscriptions"
									AND pers_settings_user_id != %s
									AND pers_settings_specific = "thread"
									AND pers_settings_value = %d;'
									,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
									,$is_thread_valid_row->voluno_for_thr_id);
							
						$user_who_have_subscribed_to_thread_results
							= $GLOBALS['wpdb']->get_results($user_who_have_subscribed_to_thread_query);
					}
					#get array of users who will be informed (close)
					
					#get thread name (open)
					if(1==1){
						
						$get_thread_title_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_forum_threads
											WHERE voluno_for_thr_id = %d;'
											,$add_discussion__thread);
						$get_thread_title_row = $GLOBALS['wpdb']->get_row($get_thread_title_query);
						
					}
					#get thread name (close)
					
					#loop (open)
					for($adz=0;$adz<count($user_who_have_subscribed_to_thread_results);$adz++){
						
						#send email (open)
						if(1==1){
							
							#function-emails.php (v1.0) (open)
							if(1==1){
								$function_admin_emails['recipient_id_or_email_address']
									= $user_who_have_subscribed_to_thread_results[$adz]->usersext_id;#$function_add_new_message__partner_id_array_valid[$ady];
									//finds email address, default is steve's id (1). also accepts mail addresse
								$function_admin_emails['email_content_id'] = 8; //please select id
								$function_admin_emails['placeholders'] =
								array(
									array(
									'ph_name' => 'discussion_title',
									'ph_value' => $add_discussion__title
									),
									array(
									'ph_name' => 'subscriber_name',
									'ph_value' => $user_who_have_subscribed_to_thread_results[$adz]->usersext_displayName
									),
									array(
									'ph_name' => 'author_name',
									'ph_value' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName
									),
									array(
									'ph_name' => 'thread_name',
									'ph_value' => $get_thread_title_row->voluno_for_thr_title
									),
									array(
									'ph_name' => 'post_content',
									'ph_value' => $add_discussion__first_post
									),
									array(
									'ph_name' => 'discussion_url',
									'ph_value' => get_permalink(738).'?discussion='.$new_discussion
									)
								);
								include('#function-emails.php');
							}
							#function-emails.php (v1.0) (close)
							
						}
						#send email (close)
						
					}
					#loop (close)
					
				}
				#add notification and email (open)
				
				#redirect to new discussion (open)
				if($verification_failed != "yes"){
					
					#function-redirect.php (v1.0) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Redirects to another page. Prevents further loading of content.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_redirect['redirect_url'] = get_permalink().'?discussion='.$new_discussion; // url to redirect to. If none is given, homepage is used.
							
						}
						#input (close)
						
						include('#function-redirect.php');
						
						#no output
						
					}
					#function-redirect.php (v1.0) (close)
					
				}
				#redirect to new discussion (close)
				
			}
			#add new discussion (close)
			
			#subscriptions (open) ///32
			if(in_array($_POST['subscribe_thread_hidden_field'],array("subscribe","unsubscribe"))){
				
				#
				if($_POST['subscribe_thread_hidden_field'] == "subscribe"){
					$subscription_status_for_update = "subscribed";
				}elseif($_POST['subscribe_thread_hidden_field'] == "unsubscribe"){
					$subscription_status_for_update = "unsubscribed";
				}
				#
				
				#database query delete (open)
				if(1==1){
					$GLOBALS['wpdb']->delete(
							'fi4l3fg_voluno_personal_settings',
						array( //location of row to delete
							'pers_settings_general' => 'forum subscriptions'
							,'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
							,'pers_settings_specific' => 'thread'
							,'pers_settings_value' => $is_thread_valid_row->voluno_for_thr_id
						),
						array( //format of location of row to delete
							'%s'
							,'%s'
							,'%s'
							,'%d'
						));
				}
				#database query delete (close)
				
				#database query insert (open)
				if($subscription_status_for_update == "subscribed"){ //only subscribe or not subscribe, but not "unsubscribe" status allowed
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_personal_settings',
						array(
							'pers_settings_general' => 'forum subscriptions'
							,'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
							,'pers_settings_specific' => 'thread'
							,'pers_settings_value' => $is_thread_valid_row->voluno_for_thr_id
							,'pers_settings_content_varchar1000' => $subscription_status_for_update
						),
						array(
							'%s'
							,'%s'
							,'%s'
							,'%d'
							,'%s'
						));
				}
				#database query insert (close)
				
			}
			#subscriptions (close)
			
		}
		#update (close)
		
		#get (open)
		if(1==1){
			
			#get thread info (open)
			if(1==1){ ///14
				
				#ngo profile (open)
				if($arm_forum['get_thread_info__ngo_profile'] == "yes"){
					
					$is_thread_valid_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_forum_threads
										WHERE voluno_for_thr_type = "ngo_public"
										AND voluno_for_thr_type_id = %d
										AND voluno_for_thr_status = "";'
										,$ngo_id);
					$is_thread_valid_row = $GLOBALS['wpdb']->get_row($is_thread_valid_query);
					
				}
				#ngo profile (close)
				
				#regular forum (open)
				if(1==1){
					$thread_info_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_forum_threads
										WHERE voluno_for_thr_id = %d;'
										,$is_thread_valid_row->voluno_for_thr_id);
					$thread_info_row = $GLOBALS['wpdb']->get_row($thread_info_query);
				}
				#regular forum (close)
				
			}
			#get thread info (close)
			
			#all threads where user can start a new discussion (open)
			if(1==1){ ///22
				
				$add_discussion_thread_selection_query = $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_forum_threads
									WHERE voluno_for_thr_status = ""
									ORDER BY voluno_for_thr_title ASC;');
				$add_discussion_thread_selection_results = $GLOBALS['wpdb']->get_results($add_discussion_thread_selection_query);
				
			}
			#all threads where user can start a new discussion (close)
			
			#subscription settings (open)
			if(1==1){//31
				
				#query (open)
				if(1==1){
					$subscription_settings_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_personal_settings
											WHERE pers_settings_user_id = %s
											AND pers_settings_general = "forum subscriptions"
											AND pers_settings_specific = "thread"
											AND pers_settings_value = %d;'
											,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
											,$thread_info_row->voluno_for_thr_id);
					$subscription_settings_row = $GLOBALS['wpdb']->get_row($subscription_settings_query);
				}
				#query (close)
				
				#get values (open)
				if(1==1){
					
					if($subscription_settings_row->pers_settings_content_varchar1000 == "subscribed"){
					$subscription_status['thread'] = 'subscribed';
					}
					
				}
				#get values (close)
				
			}
			#subscription settings (close)
			
		}
		#get (close)
		
    }
    #mysql (close)
    
    #jquery (open)
    if(1==1){
		
		echo '
		<script>
			jQuery(document).ready(function(){';
			
			#new discussion form (open)
			if(1==1){
				echo '
				jQuery(".start_new_discussion_button").click(function(){
				jQuery(".start_new_discussion_div").slideToggle(300);
				});
				jQuery(".start_new_discussion_div").hover(function(){
				jQuery(this).css("background-color","#FFD87D");
				},function(){
				jQuery(this).css("background-color","#FFEAB9");
				});
				';
				
				#validation + submit (open)
				if(1==1){
					
					echo '
					jQuery(".post_reply_input").keyup(function(){
						jQuery(this).parent().find(".warning").fadeOut(300);
						jQuery(this).parent().find(".char_count").fadeIn(300);
						var max = jQuery(this).parent().find(".max_char").html();
						var len = jQuery(this).val().length;
						
						var var_before = jQuery(this).parent().find(".text_before_value").html();
						var var_after = jQuery(this).parent().find(".text_after_value").html();
						
						if(len >= max) {
						jQuery(this).parent().find(".char_count").html(var_before+max+var_after);
						}else{
						var char_left = max - len;
						jQuery(this).parent().find(".char_count").html(char_left + " of " + max + " characters left.");
						}
					});
					
					jQuery(".start_new_discussion_form_submit").click(function(){
						var error = 0;
						jQuery(".post_reply_input").each(function(){
						if(jQuery(this).val().length == 0){
							error = 1;
							jQuery(this).parent().find(".warning").fadeIn(300);
							jQuery(".char_count").fadeOut(300);
						}
						});
						if(error == 0){
						jQuery(".start_new_discussion_form").submit();
						}
					});
					';
					
				}
				#validation + submit (close)
				
			}
			#new discussion form (close)
			
			#subscriptions (open)
			if(1==1){
				echo '
				jQuery(".subscribe_thread_button").click(function(){
				jQuery(".subscribe_thread_form").submit();
				});
				';
			}
			#subscriptions (close)
			
			echo '
			});
		</script>';
		
    }
    #jquery (close)
    
    #content (open)
    if(1==1){
		
		#img + title + intro text (open)
		if(1==1){
			
			#preparation (open)
			if(1==1){
				
				#function-image-processing (open)
				if(1==1){
					#thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "forum.jpg";
					#all
					$function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
					include('#function-image-processing.php');
					# $function_propic;
					#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				#function-breadcrums.php (v3.0) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_breadcrums['input_array'] = [
							'left' => [
								[
									'text' => 'Go to Forum overview',
									'link' => get_permalink()
								]
							]
						];
						// Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
						
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
				
			}
			#preparation (close)
			
			#content (open)
			if(1==1){
				
				#img + title + text(open)
				if($arm_forum['forum_regular_image_title_text'] == "yes"){
					
					echo '
					<img src="'.$function_propic.'" class="voluno_header_picture">
					'.$function_breadcrums['breadcrums'].'
					<div style="position:relative;height:170px;width:590px;">
					<div style="text-align:center;margin:30px;">
						<h1 style="display:inline;">
						'.$thread_info_row->voluno_for_thr_title.'
						</h1>
					</div>
					<div style="position:absolute;bottom:0px;">
						<p>
						'.$thread_info_row->voluno_for_thr_description.'
						</p>
					</div>
					</div>';
					
				}
				#img + title + text (close)
				
			}
			#content (close)
			
		}
		#img + title + intro text (close)
		
		#subscribe discussion (open)
		if(1==1){ ///30
			
			#preparation (open)
			if(1==1){
				
				if($subscription_status['thread'] == "subscribed"){
					$subscription_button_text = "Unsubscribe from thread";
					$subscription_button_title = 'You have subscribed to all discussions in this thread.'.
									'&#13;Click to unsubscribe from this thread.';
					$subscription_button_value = "unsubscribe";
				}else{
					$subscription_button_text = "Subscribe to thread";
					$subscription_button_title = 'Click to subscribe to all discussions in this thread, except'.
									'&#13;for those ones that you specifically unsubscribed from.';
					$subscription_button_value = "subscribe";
				}
				
			}
			#preparation (close)
			
			#content (open)
			if(1==1){
				
				echo '
				<div style="position:absolute;margin-top:20px;">
					<div class="voluno_button subscribe_thread_button" title="'.$subscription_button_title.'">
					'.$subscription_button_text.'
					<form
						class="subscribe_thread_form"
						method="post"
						action="'.get_permalink(738).'?thread='.$thread_info_row->voluno_for_thr_id.'"
					>
						<input
						type="hidden"
						value="'.$subscription_button_value.'"
						class="subscribe_thread_hidden_field"
						name="subscribe_thread_hidden_field"
						>
					</form>
					</div>
				</div>';
				
			}
			#content (close)
			
		}
		#subscribe discussion (close)
		
		#new discussion (open)
		if(1==1){ ///20
			
			#button (open)
			if(1==1){
				
				echo '
				<div style="position:absolute;width:200px;margin-left:720px;margin-top:20px;text-align:right;">
					<div class="voluno_button start_new_discussion_button">
					Start new discussion
					</div>
				</div>';
				
			}
			#button (close)
			
			#form div (open)
			if(1==1){
				
				#preparation (open)
				if(1==1){
					
					#array (open)
					if(1==1){
						
						#select_thread (open)
						if(1==1){
							
							$select_thread = '
							<select
							style="text-align:center;"
							name="add_discussion__thread"
							class="add_discussion__thread"
							>';
							
							for($abn=0;$abn<count($add_discussion_thread_selection_results);$abn++){
							
							if($thread_info_row->voluno_for_thr_id == $add_discussion_thread_selection_results[$abn]->voluno_for_thr_id){
								$selected = 'selected';
								$selected_text = ' (current topic)';
								$selected_style = 'style="font-weight:bold;"';
							}else{
								unset($selected,$selected_text,$selected_style);
							}
							
							$select_thread .= '
							<option
								value="'.$add_discussion_thread_selection_results[$abn]->voluno_for_thr_id.'"
								title="'.$add_discussion_thread_selection_results[$abn]->voluno_for_thr_description.'"
								'.$selected.'
								'.$selected_style.'
							>
								'.$add_discussion_thread_selection_results[$abn]->voluno_for_thr_title.$selected_text.'
							</option>';
							
							}
							$select_thread .= '
							</select>';
							
						}
						#select_thread (close)
						
						#form field array (open)
						if(1==1){
							
							$maxlength_title = 75;
							$maxlength_post = 5000;
							
							$new_discussion_form_array
							= array(
								array(
								'title' => 'Title'
								,'input' => '<input
										style="width:95%;"
										type="text"
										placeholder="Discussion title"
										name="add_discussion__title"
										class="post_reply_input"
										maxlength='.$maxlength_title.'
										>'
								,'warning_text' => 'Please add a title to your discussion. Please use keywords.'
								,'max_characters' => $maxlength_title
								,'text_before_value' => 'You have reached the character limit of '
								,'text_after_value' => '. If you want to add more information, please do so in the detailed description fields below.'
								),
								array(
								'title' => 'Opening post'
								,'input' => '<textarea
										name="add_discussion__first_post"
										class="post_reply_input"
										placeholder="Your first post that opens the discussion." '
										.'style="width:95%;resize:vertical;min-height:100px;max-height:300px;height:200px;" '
										.'maxlength='.$maxlength_post
										.'>'
										.'</textarea>'
								,'warning_text' => 'Please write a text to start the discussion.'
								,'max_characters' => $maxlength_post
								,'text_before_value' => "You have reached the character limit of "
								,'text_after_value' => "."
								),
								array(
								'title' => 'General forum topic'
								,'input' => $select_thread 
								)
							);
							
						}
						#form field array (close)
						
					}
					#array (close)
					
				}
				#preparation (close)
				
				#div open + form open + title (open)
				if(1==1){
					
					echo '
					<br>
					<br>
					<div
					style="
						display:none;
						margin:40px auto;
						width:80%;
						text-align:center;
						background-color:#FFEAB9;
						border-radius:20px;
						padding:20px;
					"
					class="start_new_discussion_div"
					>
					<form
						method="post"
						action="'.get_permalink(738).'?thread='.$thread_info_row->voluno_for_thr_id.'"
						class="start_new_discussion_form"
					>
						<h3 style="display:inline;">
						Start new discussion
						</h3>
						<br>
						<table style="width:100%;">';
				}
				#div open + form open + title (close)
					
					#loop (open)
					for($abl=0;$abl<count($new_discussion_form_array);$abl++){
					
					echo '
					<tr>
						<td
						style="
							width:15%;
							text-align:right;
							font-weight:bold;
							padding:12px 10px 0px 0px;
						"
						>
						'.$new_discussion_form_array[$abl]['title'].':
						</td>
						<td style="">
						'.$new_discussion_form_array[$abl]['input'].'
						<div style="color:red;padding-top:5px;">';
							
							#warnings and text info (open)
							if(1==1){
							
							if(!empty($new_discussion_form_array[$abl]['max_characters'])){
								
								#hidden fields (open)
								if(1==1){
								echo '
								<span class="max_char" style="display:none;">'.
									$new_discussion_form_array[$abl]['max_characters'].
								'</span>
								<span class="text_before_value" style="display:none;">'.
									$new_discussion_form_array[$abl]['text_before_value'].
								'</span>
								<span class="text_after_value" style="display:none;">'.
									$new_discussion_form_array[$abl]['text_after_value'].
								'</span>';
								}
								#hidden fields (close)
								
								echo '
								<span class="char_count" style="color:#F86A00;">
								</span>';
							}
							
							echo '
							<span class="warning" style="display:none;">
								'.$new_discussion_form_array[$abl]['warning_text'].'
							</span>';
							}
							#warnings and text info (close)
							
						echo '
						</div>
						</td>
					</tr>';
					
					}
					#loop (close)
					
					#cancel + submit (open)
					if(1==1){
					echo '
					<tr>
						<td colspan="2" style="text-align:center;">
						<div
							style="display:inline-block;margin-right:50px;"
							class="voluno_button start_new_discussion_button"
						>
							Cancel
						</div>
						<div
							class="voluno_button start_new_discussion_form_submit"
							style="display:inline-block;"
						>
							Create discussion
						</div>
						</td>
					</tr>';
					}
					#cancel + submit (close)
					
				#div close + form close (open)
				if(1==1){
					
						echo '
						</table>
					</form>
					</div>';
					
				}
				#div close + form close (close)
				
			}
			#form div (close)
			
		}
		#new discussion (close)
		
		#table of discussions (open)
		if(1==1){ ///13
			
			$query_text = 'SELECT *
					FROM fi4l3fg_voluno_forum_discussions
					LEFT JOIN fi4l3fg_voluno_users_extended
						ON voluno_for_dis_author = usersext_id
					WHERE voluno_for_dis_thread =
						'.$thread_info_row->voluno_for_thr_id. //this is safe
						' AND voluno_for_dis_status = ""
					ORDER BY voluno_for_dis_last_post_date ASC;';
			
			#update number of discussions and posts (open)
			if(1==1){
				
				$all_dis_for_counter_query = $GLOBALS['wpdb']->prepare($query_text);
				$all_dis_for_counter_results = $GLOBALS['wpdb']->get_results($all_dis_for_counter_query);
				
				#go through all discussions (open)
				for($abi=0;$abi<count($all_dis_for_counter_results);$abi++){
				
				unset($post_counter,$last_post);
				
				$all_posts_for_this_dis_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_forum_posts
										WHERE voluno_for_pos_discussion = %d
											AND voluno_for_pos_status = ""
										ORDER BY voluno_for_pos_date_created DESC;'
										,$all_dis_for_counter_results[$abi]->voluno_for_dis_id);
				$all_posts_for_this_dis_results = $GLOBALS['wpdb']->get_results($all_posts_for_this_dis_query);
				
				$post_counter = count($all_posts_for_this_dis_results);
				
				$last_post
					= array(
					'date' => $all_posts_for_this_dis_results[0]->voluno_for_pos_date_created
					,'post_id' => $all_posts_for_this_dis_results[0]->voluno_for_pos_id
					);
				
				#update specific discussion (open)
				if(1==1){
					
					#database query update (open)
					if(1==1){
					$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_forum_discussions',
						array( //updated content
							'voluno_for_dis_num_of_posts' => $post_counter,
							'voluno_for_dis_last_post' => $last_post['post_id'],
							'voluno_for_dis_last_post_date' => $last_post['date']
						),
						array( //location of updated content
							'voluno_for_dis_id' => $all_dis_for_counter_results[$abi]->voluno_for_dis_id
						),
						array( //format of updated content
							'%d','%d','%s'
						),
						array( //format of location of updated content
							'%d'
							));
					}
					#database query update (close)
					
				}
				#update specific discussion (close)
				
				}
				#go through all discussions (close)
				
			}
			#update number of discussions and posts (close)
			
			#table title (open)
			if($arm_forum['tog_title_regular'] == "yes"){
				
				$table_title = "Specific discussions on this thread"; #the title of the table in h4, together with hide option
				
			}elseif($arm_forum['tog_title_ngo_profile'] = "yes"){
				
				$table_title = 'Public '.$ngo_row->ngo_name.' thread'; #the title of the table in h4, together with hide option
				
			}
			#table title (close)
			
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
							
							$function_table['query'] = $GLOBALS['wpdb']->prepare($query_text);
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
								
								$function_table['data'][$ajl]['voluno_for_dis_title'] = $function_table['results'][$ajl]->voluno_for_dis_title;
								$function_table['data'][$ajl]['voluno_for_dis_last_post_date'] = $function_table['results'][$ajl]->voluno_for_dis_last_post_date;
								$function_table['data'][$ajl]['display_name'] = $function_table['results'][$ajl]->usersext_displayName;
								
								$function_table['data'][$ajl]['voluno_for_dis_id'] = $function_table['results'][$ajl]->voluno_for_dis_id;
								$function_table['data'][$ajl]['voluno_for_dis_last_post'] = $function_table['results'][$ajl]->voluno_for_dis_last_post;
								
								$function_table['data'][$ajl]['voluno_for_dis_num_of_posts'] = $function_table['results'][$ajl]->voluno_for_dis_num_of_posts;
								$function_table['data'][$ajl]['voluno_for_dis_author'] = $function_table['results'][$ajl]->voluno_for_dis_author;
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
						
						$function_table['unique id'] = 'forum_thread_discussions_'.$thread_info_row->voluno_for_thr_id.'_fdiuvhrvf';
						// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
						
						#Options connected to the title (open)
						if(1==1){
							
							$function_table['display title'] = $table_title;
							// The title of the table which is displayed above the table. To hide title, leave empty.
							
							#$function_table['show on load'] = 'no';
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
									'heading'		 => 'Discussion',
									'width'			 => '30%',
									'sorting option' => 'voluno_for_dis_title'
								),
								array(
									'heading'		 => 'Author',
									'width'			 => '25%',
									'sorting option' => 'display_name'
								),
								array(
									'heading'		 => 'Amount of posts',
									'width'			 => '15%',
									'sorting option' => 'voluno_for_dis_num_of_posts'
								),
								array(
									'heading'		 => 'Last post',
									'width'			 => '25%',
									'sorting option' => 'voluno_for_dis_last_post_date'
								)
							);
							
							//Optionally, you can choose one of the above columns to be the default sorting option.
							// If you don't want this, please delete or hide the entire array.
							$function_table['default ordering']
							= array(
								'column' => 'voluno_for_dis_last_post_date', // Colum name. In the example, 'email' or 'id'.
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
							    ,'content' => 'There aren\'t any discussions in this thread yet.' // Any text (will be displayed) or 'none' (no text will be displayed). Default: 'There are currently no items available.'
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
						
						#1 Counter (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.($abs+1).'
							</td>
							';
							
						}
						#1 Counter (close)
						
						#2 Discussion (open)
						if(1==1){
							
							#preparation (open)
							if(1==1){
								
								$last_post_content_query = $GLOBALS['wpdb']->prepare('SELECT *
													  FROM fi4l3fg_voluno_forum_posts
													  WHERE voluno_for_pos_id = %d;'
													  ,$function_table['data'][$abs]['voluno_for_dis_last_post']);
								$last_post_content_row = $GLOBALS['wpdb']->get_row($last_post_content_query);
								
								#function-sanitize-text.php (open)
								if(1==1){
									
									$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory, currently: email (=the text)
									/*
									 *one line unformatted text (city, name, occupation, etc.)
									 *url readable text (url, user_nicename, etc.) (sanitize_title)
									 *email address
									 *plain text with line breaks (biography)
									*/
									$function_sanitize_text__text = $last_post_content_row->voluno_for_pos_content;
									include('#function-sanitize-text.php');
									#output: $function_sanitize_text__text_sanitized;
									
								}
								#function-sanitize-text.php (close)
								
							}
							#preparation (close)
							
							#content (open)
							if(1==1){
								
								$function_table['table rows'] .= '
								<td style="text-align:justify;">
									<b>
										<a
											title="Go to topic"
											href="'.get_permalink(738).'?discussion='.$function_table['data'][$abs]['voluno_for_dis_id'].'"
										>
											'.$function_table['data'][$abs]['voluno_for_dis_title'].'
										</a>
									</b>
								</td>
								';  
								
							}
							#content (close)
							
						}
						#2 Discussion (close)
						
						#3 Author (open)
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
									
									$function_profileLink['id'] = $function_table['data'][$abs]['voluno_for_dis_author']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
						#3 Author (close)
						
						#4 Posts (open)
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.number_format($function_table['data'][$abs]['voluno_for_dis_num_of_posts'],0,"."," ").'
							</td>
							';
							
						}
						#4 Posts (close)
						
						#5 Last post (open)
						if(1==1){
							
							$post_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_forum_posts
											WHERE voluno_for_pos_id = %d;'
											,$function_table['data'][$abs]['voluno_for_dis_last_post']);
							$post_row = $GLOBALS['wpdb']->get_row($post_query);
							
							#function-timezone.php (open)
							if(1==1){
								
								$post_date = $function_table['data'][$abs]['voluno_for_dis_last_post_date'];
								
								$function_timezone = $post_date;
								$function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
								//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
								//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
								include('#function-timezone.php');
								#output:
								$date = $function_timezone;
								
								$function_timezone = $post_date;
								$function_timezone_format = "time (hour min)"; //default: datetime (weekday long hour min sec)
								//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
								//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
								include('#function-timezone.php');
								#output:
								$time = $function_timezone;
								
								$function_timezone = $post_date;
								$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
								//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
								//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
								include('#function-timezone.php');
								#output:
								$difference = $function_timezone;
							  
							}
							#function-timezone.php (close)
							
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
									
									$function_profileLink['id'] = $post_row->voluno_for_pos_author; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								<br>
								<a
									title="Go to most recent post"
									href="'.get_permalink(738).'?discussion='.$post_row->voluno_for_pos_discussion.'"
								>
									'.$date.', '.$time.'
									<br>
									('.$difference.')
								</a>
							</td>
							';
							
						}
						#5 Last post (close)
						
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
		#table of discussions (close)
		
    }
    #content (close)    
    
}
#forum individual thread (discussions) (close)

#forum individual discussion (posts) (open)
if($page_section == "forum individual discussion (posts)"){ ///4
    
    #general preparation (open)
    if(1==1){
		
		#loaoding img and mysql div (open)
		if(1==1){
			include('#function-loaoding-img-mysql-area-div.php');
			#no inputs, no outputs
			#classes are: mysql_load_area AND loading_page loading_img_middle_page <- use this one
		}
		#loaoding img and mysql div (close)
		
		#outside-loop user rights (open)
		if(1==1){
			
			#moderator? (open)
			if(in_array('Voluno Moderator',$function_userpositions_get['simple_pure_array']['accepted'])){
				$user_is_moderator = "yes";
			}
			#moderator? (close)
			
			#discussion author? (open)
			if($is_discussion_valid_row->voluno_for_dis_author == $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
				$user_is_discussion_author = "yes";
			}
			#discussion author? (close)
			
		}
		#outside-loop user rights (close)
		
    }
    #general preparation (close)
    
    #mysql (open)
    if($special_mode != "yes"){
		
		#update (open)
		if(1==1){
			
			#post reply (open)
			if(!empty($_POST['post_reply_input'])){
				
				$post_reply_input = stripslashes($_POST['post_reply_input']);
				
				#sanitize + verify information (open)
				if(1==1){
					
					#function-sanitize-text.php (open)
					if(1==1){
						
						$function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
						/*
						 *one line unformatted text (city, name, occupation, etc.)
						 *url readable text (url, user_nicename, etc.) (sanitize_title)
						 *email address
						 *plain text with line breaks (biography)
						*/
						$function_sanitize_text__text = $post_reply_input;
						include('#function-sanitize-text.php');
						$post_reply_input = $function_sanitize_text__text_sanitized;
						
					}
					#function-sanitize-text.php (close)
					
				}
				#sanitize + verify information (close)
				
				#insert into database (open)
				if(1==1){
					
					#create post (open)
					if(1==1){
						
						$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_forum_posts',
							array(
								'voluno_for_pos_content' => $post_reply_input,
								'voluno_for_pos_author' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'voluno_for_pos_discussion' => $is_discussion_valid_row->voluno_for_dis_id,
								
								'voluno_for_pos_date_modified' => date("Y-m-d H:i:s"),
								'voluno_for_pos_date_created' => date("Y-m-d H:i:s")
								),
							array(
								'%s','%s','%d',
								'%s','%s'
								));
						
					}
					#create post (close)
					
				}
				#insert into database (close)
				
				#add notification and email (open)
				if(1==1){
					
					#function-notifications.php (v2.0) (open)
					if(1==1){
						
						#add notification
						$function_notifications = array(
							'function_part' => "add notification", //obligatory
							'notification_template_id' => 1, //obligatory
							'link' => get_permalink(738).'?discussion='.$is_discussion_valid_row->voluno_for_dis_id, //optional
							'type_id' => array(2), //for identification when to mark this unread. e.g. discussion id //optional, depends on template
							'title' => 'Go to discussion', //optional
							'placeholders' => array( //optional, number may vary. note that the order matters within each notification for 2.+3. notification!
							array(
								'name' => 'author_display_name',
								'value' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName,
							),
							array(
								'name' => 'author_id',
								'value' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
							),
							array(
								'name' => 'discussion_name',
								'value' => $is_discussion_valid_row->voluno_for_dis_title,
							)
							),
							'count_notifications_by_this_placeholder' => 'author_id', //when there are two forum posts by the same author, it counts as 1
														//must be identical with a placeholder name
							'users_that_receive_notification' => array(1),
						);
						include('#function-notifications.php');
						
					}
					#function-notifications.php (v2.0) (close)
					
					#get array of users who will be informed (open)
					if(1==1){
						
						$user_who_have_subscribed_to_discussion_query
							= $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_personal_settings
									LEFT JOIN fi4l3fg_voluno_users_extended
									ON pers_settings_user_id = usersext_id
									WHERE pers_settings_general = "forum subscriptions"
									AND pers_settings_user_id != %s
									AND (
										(
										pers_settings_specific = "discussion"
										AND pers_settings_value = %d
										AND pers_settings_content_varchar1000 = "subscribed"
										)
										OR
										(
										pers_settings_specific = "thread"
										AND pers_settings_value = %d
										)
										)
										;'
									,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
									,$is_discussion_valid_row->voluno_for_dis_id
									,$is_discussion_valid_row->voluno_for_dis_thread);
							
						$user_who_have_subscribed_to_discussion_results
							= $GLOBALS['wpdb']->get_results($user_who_have_subscribed_to_discussion_query);
						
					}
					#get array of users who will be informed (close)
					
					#loop (open)
					for($adz=0;$adz<count($user_who_have_subscribed_to_discussion_results);$adz++){
						
						unset($unsubscribed_from_this_discussion);
						
						#each user only once (open)
						if(1==1){
							
							if($adz == 0){
							unset($each_user_only_once);
							}
							
							if(in_array($user_who_have_subscribed_to_discussion_results[$adz]->pers_settings_user_id,$each_user_only_once)){
							continue;
							}
							
							$each_user_only_once[] = $user_who_have_subscribed_to_discussion_results[$adz]->pers_settings_user_id;
							
						}
						#each user only once (close)
						
						#check if user subscribed to thread but unsubscribed from discussion (open)
						if($user_who_have_subscribed_to_discussion_results[$adz]->pers_settings_specific == "thread"){
							
							$unsubscribed_discussion_check_query
							= $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_personal_settings
									WHERE pers_settings_general = "forum subscriptions"
										AND pers_settings_user_id != %s
										AND pers_settings_specific = "discussion"
										AND pers_settings_value = %d
										AND pers_settings_content_varchar1000 = "unsubscribed"
										;'
									,$user_who_have_subscribed_to_discussion_results[$adz]->pers_settings_user_id
									,$is_discussion_valid_row->voluno_for_dis_id);
							$unsubscribed_discussion_check_row = $GLOBALS['wpdb']->get_row($unsubscribed_discussion_check_query);
							
							if(!empty($unsubscribed_discussion_check_row)){
							$unsubscribed_from_this_discussion = "yes";
							}
							
						}
						#check if user subscribed to thread but unsubscribed from discussion (close)
						
						#send email (open)
						if($unsubscribed_from_this_discussion != "yes"){
							
							#function-emails.php (v1.0) (open)
							if(1==1){
								$function_admin_emails['recipient_id_or_email_address']
									= $user_who_have_subscribed_to_discussion_results[$adz]->usersext_id;#$function_add_new_message__partner_id_array_valid[$ady];
									//finds email address, default is steve's id (1). also accepts mail addresse
								$function_admin_emails['email_content_id'] = 9; //please select id
								$function_admin_emails['placeholders'] =
								array(
									array(
									'ph_name' => 'discussion_title',
									'ph_value' => $is_discussion_valid_row->voluno_for_dis_title
									),
									array(
									'ph_name' => 'subscriber_name',
									'ph_value' => $user_who_have_subscribed_to_discussion_results[$adz]->usersext_displayName
									),
									array(
									'ph_name' => 'author_name',
									'ph_value' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName
									),
									array(
									'ph_name' => 'post_content',
									'ph_value' => $post_reply_input
									),
									array(
									'ph_name' => 'discussion_url',
									'ph_value' => get_permalink(738).'?discussion='.$is_discussion_valid_row->voluno_for_dis_id
									)
								);
								include('#function-emails.php');
							}
							#function-emails.php (v1.0) (close)
							
						}
						#send email (close)
						
					}
					#loop (close)
					
				}
				#add notification and email (open)
				
			}
			#post reply (close)
			
			#edit title (open)
			if(($user_is_moderator == "yes" OR $user_is_discussion_author == "yes") AND !empty($_POST['edit_title_input'])){
				
				$new_post_title = $_POST['edit_title_input'];
				
				#sanitize + verify information (open)
				if(1==1){
					
					#function-sanitize-text.php (open)
					if(1==1){
						
						$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory, currently: email (=the text)
						/*
						 *one line unformatted text (city, name, occupation, etc.)
						 *url readable text (url, user_nicename, etc.) (sanitize_title)
						 *email address
						 *plain text with line breaks (biography)
						*/
						$function_sanitize_text__text = $new_post_title;
						include('#function-sanitize-text.php');
						$new_post_title = $function_sanitize_text__text_sanitized;
						
					}
					#function-sanitize-text.php (close)
					
				}
				#sanitize + verify information (close)
				
				#database query update (open)
				if(!empty($new_post_title)){
					
					$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_forum_discussions',
						array( //updated content
							'voluno_for_dis_title' => $new_post_title
						),
						array( //location of updated content
							'voluno_for_dis_id' => $is_discussion_valid_row->voluno_for_dis_id
						),
						array( //format of updated content
							'%s'
						),
						array( //format of location of updated content
							'%d'
						));
				}
				#database query update (close)
				
			}
			#edit title (close)
			
			#delete discussion (open)
			if(($user_is_moderator == "yes" OR $user_is_discussion_author == "yes") AND $_GET['delete_discussion'] == 1){
				
				#database query update (open)
				if(1==1){
					
					$GLOBALS['wpdb']->update( 
							'fi4l3fg_voluno_forum_discussions',
						array( //updated content
							'voluno_for_dis_status' => 'deleted'
						),
						array( //location of updated content
							'voluno_for_dis_id' => $is_discussion_valid_row->voluno_for_dis_id
						),
						array( //format of updated content
							'%s'
						),
						array( //format of location of updated content
							'%d'
						));
				}
				#database query update (close)
				
				#redirect to new discussion (open)
				if($verification_failed != "yes"){
					
					#function-redirect.php (v1.0) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Redirects to another page. Prevents further loading of content.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_redirect['redirect_url'] = get_permalink().'?thread='.$is_discussion_valid_row->voluno_for_dis_thread; // url to redirect to. If none is given, homepage is used.
							
						}
						#input (close)
						
						include('#function-redirect.php');
						
						#no output
						
					}
					#function-redirect.php (v1.0) (close)
					
				}
				#redirect to new discussion (close)
				
			}
			#delete discussion (close)
			
			#subscriptions (open)
			if(in_array($_POST['subscribe_discussion_hidden_field'],array("subscribe","unsubscribe"))){
				
				#
				if($_POST['subscribe_discussion_hidden_field'] == "subscribe"){
					$subscription_status_for_update = "subscribed";
				}elseif($_POST['subscribe_discussion_hidden_field'] == "unsubscribe"){
					$subscription_status_for_update = "unsubscribed";
				}
				#
				
				#database query delete (open)
				if(1==1){
					$GLOBALS['wpdb']->delete(
							'fi4l3fg_voluno_personal_settings',
						array( //location of row to delete
							'pers_settings_general' => 'forum subscriptions'
							,'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
							,'pers_settings_specific' => 'discussion'
							,'pers_settings_value' => $is_discussion_valid_row->voluno_for_dis_id
						),
						array( //format of location of row to delete
							'%s'
							,'%s'
							,'%s'
							,'%d'
						));
				}
				#database query delete (close)
				
				#database query insert (open)
				if(1==1){
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_personal_settings',
						array(
							'pers_settings_general' => 'forum subscriptions'
							,'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
							,'pers_settings_specific' => 'discussion'
							,'pers_settings_value' => $is_discussion_valid_row->voluno_for_dis_id
							,'pers_settings_content_varchar1000' => $subscription_status_for_update
						),
						array(
							'%s'
							,'%s'
							,'%s'
							,'%d'
							,'%s'
						));
				}
				#database query insert (close)
				
			}
			#subscriptions (close)
			
			#function-notifications.php (v2.0) (open)
			if(1==1){
				
				#mark notifications as read
				$function_notifications['function_part'] = "item-page -> mark notification as read";
				$function_notifications['notif_template'] = 1; //template notification id, integer
				$function_notifications['notif_type_name'] = array("discussion"); //array, up to 3 elements
				$function_notifications['notif_type_id'] = array($is_discussion_valid_row->voluno_for_dis_id); //array, up to 3 elements, dynamic, to identify the current item, etc.
				include('#function-notifications.php');
				
			}
			#function-notifications.php (v2.0) (close)
			
		}
		#update (close)
		
		#get (open)
		if(1==1){
			
			#discussion info (open)
			if(1==1){
				$discussion_info_query = $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_forum_discussions
										LEFT JOIN fi4l3fg_voluno_forum_threads
										ON voluno_for_dis_thread = voluno_for_thr_id
										WHERE voluno_for_dis_id = %d;'
										,$there_is_a_get[1]);
				$discussion_info_row = $GLOBALS['wpdb']->get_row($discussion_info_query);
			}
			#discussion info (close)
			
			#subscription settings (open)
			if(1==1){
				
				#query (open)
				if(1==1){
					$subscription_settings_query = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_personal_settings
											WHERE pers_settings_user_id = %s
											AND pers_settings_general = "forum subscriptions";'
											,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
					$subscription_settings_results = $GLOBALS['wpdb']->get_results($subscription_settings_query);
				}
				#query (close)
				
				#get values (open)
				if(1==1){
					
					#loop (open)
					for($adj=0;$adj<count($subscription_settings_results);$adj++){
						
						#discussion subscribed or unsubscribed?
						if($subscription_settings_results[$adj]->pers_settings_specific == "discussion"
						   AND
						   $subscription_settings_results[$adj]->pers_settings_value == $discussion_info_row->voluno_for_dis_id
						){
							if($subscription_settings_results[$adj]->pers_settings_content_varchar1000 == "subscribed"){
							$subscription_status['discussion'] = 'subscribed';
							}elseif($subscription_settings_results[$adj]->pers_settings_content_varchar1000 == "unsubscribed"){
							$subscription_status['discussion'] = 'unsubscribed';
							}
						}
						#discussion subscribed or unsubscribed?
						
						#thread subscribed?
						if($subscription_settings_results[$adj]->pers_settings_specific == "thread"
						   AND
						   $subscription_settings_results[$adj]->pers_settings_value == $discussion_info_row->voluno_for_dis_thread
						){
							if($subscription_settings_results[$adj]->pers_settings_content_varchar1000 == "subscribed"){
							$subscription_status['thread'] = 'subscribed';
							}
						}
						#thread subscribed?
						
					}
					#loop (close)
					
				}
				#get values (close)
				
			}
			#subscription settings (close)
			
		}
		#get (close)
		
    }
    #mysql (close)
    
    #jquery (open)
    if($special_mode != "yes"){
		
		echo '
		<script>
			jQuery(document).ready(function(){';
			
			#new post form (open)
			if(1==1){
				echo '
				jQuery(".post_reply_button").click(function(){
				jQuery(".post_reply_div").slideToggle(300);
				});
				jQuery(".post_reply_div").hover(function(){
				jQuery(this).css("background-color","#FFD87D");
				},function(){
				jQuery(this).css("background-color","#FFEAB9");
				});
				';
				
				#validation + submit (open)
				if(1==1){
					
					$maxlength_post = 5000;
					
					echo '
					jQuery(".post_reply_input").keyup(function(){
						jQuery(this).parent().find(".warning").fadeOut(300);
						jQuery(this).parent().find(".char_count").fadeIn(300);
						var max = '.$maxlength_post.';
						var len = jQuery(this).val().length;
						
						if(len >= max) {
						jQuery(this).parent().find(".char_count").html("You have reached the character limit of "+max+".");
						}else{
						var char_left = max - len;
						jQuery(this).parent().find(".char_count").html(char_left + " of " + max + " characters left.");
						}
					});
					
					jQuery(".post_reply_form_submit").click(function(){
						var error = 0;
						if(jQuery(".post_reply_input").val().length == 0){
						error = 1;
						jQuery(this).parent().find(".warning").fadeIn(300);
						jQuery(".char_count").fadeOut(300);
						}
						if(error == 0){
						jQuery(".post_reply_form").submit();
						}
					});
					';
					
				}
				#validation + submit (close)
				
			}
			#new post form (close)
			
			#edit_discussion_title (open)
			if($user_is_moderator == "yes" OR $user_is_discussion_author == "yes"){
				echo '
				jQuery(".edit_discussion_title,.edit_title_cancel").click(function(){
				jQuery(".edit_discussion_title_div,.discussion_title").slideToggle(300);
				});
				
				jQuery(".edit_title_save").click(function(){
				if(jQuery(".function_textinput_limit__len_edit_title_input").html() > 0){;
					jQuery(".edit_title_form").submit();
				}
				});
				';
			}
			#edit_discussion_title (close)
			
			#delete discussion (open)
			if($user_is_moderator == "yes" OR $user_is_discussion_author == "yes"){
				echo '
				var deleteTitleConfirmDivFade = "";
				jQuery(".delete_discussion").click(function(){
				jQuery(".delete_discussion_confirm_div").fadeIn(300);
				});
				
				jQuery(".delete_discussion_cancel").click(function(){
				jQuery(".delete_discussion_confirm_div").fadeOut(300);
				return false;
				})
				jQuery(".delete_discussion_confirm_div").mouseleave(function(){
				jQuery(".delete_discussion_confirm_div").fadeOut(300);
				});
				';
			}
			#delete discussion (close)
			
			#subscriptions (open)
			if(1==1){
				echo '
				jQuery(".subscribe_discussion_button").click(function(){
				jQuery(".subscribe_discussion_form").submit();
				});
				';
			}
			#subscriptions (close)
			
			echo '
			});
		</script>';
		
    }
    #jquery (close)
    
    #content (open)
    if($special_mode != "yes"){
		
		#img + title + intro text (open)
		if(1==1){
			
			#preparation (open)
			if(1==1){
				
				#function-image-processing (open)
				if(1==1){
					#thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "forum.jpg";
					#all
					$function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
					include('#function-image-processing.php');
					# $function_propic;
					#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				#function-breadcrums.php (v3.0) (open)
				if(1==1){
					
					#documentation (open)
					if(1==1){
						
						// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
						
					}
					#documentation (close)
					
					#input (open)
					if(1==1){
						
						$function_breadcrums['input_array'] = [
							'left' => [
								[
									'text' => 'Go to Forum overview',
									'link' => get_permalink()
								],
								[
									'text' => 'Forum topic: '.$discussion_info_row->voluno_for_thr_title,
									'link' => get_permalink().'?thread='.$discussion_info_row->voluno_for_thr_id
								]
							]
						];
						// Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
						
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
				
				#size of title (open)
				if(1==1){
					
					$length_of_discussion_title = strlen($discussion_info_row->voluno_for_dis_title);
					
					if($length_of_discussion_title <= 32){
					$title_size = "h1";
					}elseif($length_of_discussion_title <= 63){
					$title_size = "h3";
					}elseif($length_of_discussion_title <= 78){
					$title_size = "h4";
					}else{
					$title_size = "h5";
					}
					
				}
				#size of title (close)
				
				#function-validation-limit-textinput-size.php (open)
				if(1==1){
					
					$function_textinput_limit['class'] = 'edit_title_input';
					$function_textinput_limit['if_middle1'] = ''; //default: none
					$function_textinput_limit['if_middle2'] = ' of '; //default: ' of ';
					$function_textinput_limit['if_middle3'] = ' characters left.'; //default: ' characters left.';
					$function_textinput_limit['if_max1'] = 'You have reached the character limit of '; //default: 'You have reached the character limit of '
					$function_textinput_limit['if_max2'] = '.'; //default: '.';
					include('#function-validation-limit-textinput-size.php');
					#please add maxlength="" to your text-input
				}
				#function-validation-limit-textinput-size.php (close)
				
			}
			#preparation (close)
			
			#content (open)
			if(1==1){
				
				#img + title + text(open)
				if(1==1){
					
					echo '
					<img src="'.$function_propic.'" class="voluno_header_picture">
					'.$function_breadcrums['breadcrums'].'
					<div style="position:relative;height:170px;width:590px;">
					<div style="text-align:center;margin:30px;">
						<div class="discussion_title">
						<'.$title_size.' style="display:inline;">
							'.$discussion_info_row->voluno_for_dis_title.'
						</'.$title_size.'>
						</div>';
						
						#edit title form (open)
						if($user_is_moderator == "yes" OR $user_is_discussion_author == "yes"){
							echo '
							<div class="edit_discussion_title_div" style="display:none;">
								<form
								class="edit_title_form"
								method="post"
								action="'.get_permalink().'?discussion='.$discussion_info_row->voluno_for_dis_id.'"
								>
								<input
									type="text"
									autocomplete="off"
									name="edit_title_input"
									class="edit_title_input"
									style="width:100%;text-align:center;"
									placeholder="Discussion title"
									maxlength="100"
									value="'.$discussion_info_row->voluno_for_dis_title.'"
								>
								'.$function_textinput_limit.'
								</form>
								<div style="text-align:center;">
								<div class="voluno_button edit_title_cancel" style="margin-right:40px;">
									Cancel
								</div>
								<div class="voluno_button edit_title_save">
									Save
								</div>
								</div>
							</div>';
						}
						#edit title form (close)
						
					echo '
					</div>
					</div>';
					
				}
				#img + title + text (close)
				
			}
			#content (close)
			
		}
		#img + title + intro text (close)
		
		#action buttons (open)
		if(1==1){
			
			#button (open)
			if(1==1){
				
				echo '
				<div style="position:absolute;width:574px;margin-top:-36px;text-align:right;">';
					
					#edit title (open)
					if($user_is_moderator == "yes" OR $user_is_discussion_author == "yes"){
						echo '
						<div class="voluno_button edit_discussion_title">
							Edit title
						</div>';
					}
					#edit title (close)
					
					#delete discussion (open)
					if($user_is_moderator == "yes" OR $user_is_discussion_author == "yes"){
						echo '
						<div class="voluno_button delete_discussion">
							Delete discussion
							<div
							style="
								background-color:#fff;
								padding:20px;
								border:1px solid black;
								border-radius:20px;
								position:absolute;
								display:none;
								margin-left:-28px;
								margin-top:-134px;
								color:#000;
								font-weight:normal;
							"
							class="delete_discussion_confirm_div"
							>
							<p style="text-align:center;font-weight:bold;">
								Delete discussion
							</p>
							<p>
								Maybe other Voluno members might benefit from reading and enaging in this discussion.
								Are you sure you want to delete it?
							</p>
							<div class="voluno_button delete_discussion_cancel" style="margin-right:50px;">
								Cancel
							</div>
							<a href="'.get_permalink().'?discussion='.$discussion_info_row->voluno_for_dis_id.'&delete_discussion=1">
								<div class="voluno_button delete_discussion_confirm">
								Delete
								</div>
							</a>
							</div>
						</div>';
					}
					#delete discussion (open)
					
					#subscribe discussion (open)
					if(1==1){
						
						#preparation (open)
						if(1==1){
							
							#dis: subscribed (open)
							if($subscription_status['discussion'] == "subscribed"){
								if($subscription_status['thread'] == "subscribed"){
									$subscription_button_text = "Unsubscribe from discussion";
									$subscription_button_title = 'You have subscribed to all discussions in this thread'.
													'&#13;and to this discussion in particular.'.
													'&#13;Click to unsubscribe from this discussion.';
									$subscription_button_value = "unsubscribe";
								}else{
									$subscription_button_text = 'Unsubscribe from discussion';
									$subscription_button_title = 'Click to unsubscribe from this discussion';
									$subscription_button_value = 'unsubscribe';
								}
							}
							#dis: subscribed (close)
							
							#dis: unsubscribed (open)
							elseif($subscription_status['discussion'] == "unsubscribed"){
								if($subscription_status['thread'] == "subscribed"){
									$subscription_button_text = "Subscribe to discussion";
									$subscription_button_title = 'You have subscribed to all discussions in this thread.'.
													'&#13;but unsubscribed from this particular discussion.'.
													'&#13;Click to re-subscribe to this discussion.';
									$subscription_button_value = "subscribe";
								}else{
									$subscription_button_text = 'Subscribe to discussion';
									$subscription_button_title = 'You have previously unsubscribed from this discussion.'.
												'&#13;Click to re-subscribe to this discussion';
									$subscription_button_value = 'subscribe';
								}
							}
							#dis: unsubscribed (close)
							
							#dis: not set (open)
							else{
								if($subscription_status['thread'] == "subscribed"){
									$subscription_button_text = "Unsubscribe from discussion";
									$subscription_button_title = 'You have subscribed to all discussions in this thread.'.
													'&#13;Click to unsubscribe from this particular discussion.';
									$subscription_button_value = "unsubscribe";
								}else{
									$subscription_button_text = "Subscribe to discussion";
									$subscription_button_title = "Click to subscribe to this discussion";
									$subscription_button_value = "subscribe";
								}
							}
							#dis: not set (open)
							
						}
						#preparation (close)
						
						#content (open)
						if(1==1){
							
							echo '
							<div class="voluno_button subscribe_discussion_button" title="'.$subscription_button_title.'">
							'.$subscription_button_text.'
							<form
								class="subscribe_discussion_form"
								method="post"
								action="'.get_permalink().'?discussion='.$discussion_info_row->voluno_for_dis_id.'"
							>
								<input
								type="hidden"
								value="'.$subscription_button_value.'"
								class="subscribe_discussion_hidden_field"
								name="subscribe_discussion_hidden_field"
								>
							</form>
							</div>';
							
						}
						#content (close)
						
					}
					#subscribe discussion (close)
					
					#post reply (open)
					if(1==1){
						echo '
						<div class="voluno_button post_reply_button">
							Post reply
						</div>';
					}
					#post reply (close)
					
				echo '
				</div>';
				
			}
			#button (close)
			
			#form div (open)
			if(1==1){
				
				#div open + form open + title (open)
				if(1==1){
					
					echo '
					<br>
					<br>
					<div
					style="
						display:none;
						margin:40px auto;
						width:80%;
						text-align:center;
						background-color:#FFEAB9;
						border-radius:20px;
						padding:20px;
					"
					class="post_reply_div"
					>
					<form
						method="post"
						action="'.get_permalink().'?discussion='.$discussion_info_row->voluno_for_dis_id.'"
						class="post_reply_form"
					>
						<h3 style="display:inline;">
						Your message
						</h3>
						<br>
						<table style="width:100%;">';
						
				}
				#div open + form open + title (close)
					
					#message (open)
					if(1==1){
						
						echo '
						<tr>
							<td>
							<textarea
								name="post_reply_input"
								class="post_reply_input"
								placeholder="Type your reply here."
								style="width:95%;resize:vertical;min-height:100px;max-height:300px;height:200px;"
								maxlength='.$maxlength_post.'
							>'
							.'</textarea>
							<div style="color:red;padding-top:5px;">';
								
								#warnings and text info (open)
								if(1==1){
									
									echo '
									<span class="char_count" style="color:#F86A00;">
									</span>';
									
									echo '
									<span class="warning" style="display:none;">
										Please write a text to start the discussion
									</span>';
								}
								#warnings and text info (close)
								
							echo '
							</div>
							</td>
						</tr>';
						
					}
					#message (close)
					
					#cancel + submit (open)
					if(1==1){
						echo '
						<tr>
							<td colspan="2" style="text-align:center;">
							<div
								style="display:inline-block;margin-right:50px;"
								class="voluno_button post_reply_button"
							>
								Cancel
							</div>
							<div
								class="voluno_button post_reply_form_submit"
								style="display:inline-block;"
							>
								Send reply
							</div>
							</td>
						</tr>';
					}
					#cancel + submit (close)
					
				#div close + form close (open)
				if(1==1){
					
						echo '
						</table>
					</form>
					</div>';
					
				}
				#div close + form close (close)
				
			}
			#form div (close)
			
		}
		#action buttons (close)
		
		#table of posts (open)
		if(1==1){
			
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
					// important elements, especially those maked with the comment: " //Don't touch this. " ;-)
					
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
							
							$query_text = 'SELECT *
									FROM fi4l3fg_voluno_forum_posts
									LEFT JOIN fi4l3fg_voluno_users_extended
										ON voluno_for_pos_author = usersext_id
									WHERE voluno_for_pos_discussion =
										'.$discussion_info_row->voluno_for_dis_id. //this variable is safe, thus including it into query is ok
										' AND voluno_for_pos_status = ""
									ORDER BY voluno_for_pos_date_created ASC;';
							
							$function_table['query'] = $GLOBALS['wpdb']->prepare($query_text);
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
								
								$function_table['data'][$ajl]['voluno_for_pos_content'] = $function_table['results'][$ajl]->voluno_for_pos_content;
								$function_table['data'][$ajl]['display_name'] = $function_table['results'][$ajl]->usersext_displayName;
								$function_table['data'][$ajl]['voluno_for_pos_date_created'] = $function_table['results'][$ajl]->voluno_for_pos_date_created;
								$function_table['data'][$ajl]['voluno_for_pos_id'] = $function_table['results'][$ajl]->voluno_for_pos_id;
								$function_table['data'][$ajl]['voluno_for_pos_author'] = $function_table['results'][$ajl]->voluno_for_pos_author;
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
						
						$function_table['unique id'] = 'forum_thread_discussion posts_fgigidsfigdf_'.$discussion_info_row->voluno_for_dis_id;
						// Everytime you use this function, please add a random and unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
						
						#Options connected to the title (open)
						if(1==1){
							
							#$function_table['display title'] = "Please add a title.";
							// The title of the table which is displayed above the table. To hide title, leave empty.
							
							#$function_table['show on load'] = "yes";
							// "yes" or empty (default). If there's no title, this is automatically set to yes, since there is nothing to show.
							
							#$function_table['title format'] = array('<h1>','</h1>');
							// Opening and closing css tags for the title. Default: array('<h4>','</h4>')
							
							#$function_table['display number of results'] = 'no';
							// Displays the full amount of content rows in brackets behind the table title. "no" or empty (default).
							
						}
						#Options connected to the title (close)
						
						#Headings and sorting (open)
						if(1==1){
							
							#$function_table['hide column headings'] = "yes";
							// Hides headings of table. "yes" or empty (default).
							
							// The following multi-dimensional array has the following structure:
							// - heading = The heading that will be displayed above the respective column.
							// - width = Optional. With of the respective column. You can either use % or pt.
							// - sorting option = Optional. If given, the user can sort the table according to this column. You can choose from any of the
							//                    columns names that you used in the "Raw data" section.
							//                    See here: #$function_table['data'][$ajl]['THIS TEXT']. In the example, the column names were "email" and "id".
							$function_table['column headings'] 
							= array(
								array(
									'heading'		 => 'Author',
									'width'			 => '25%',
									'sorting option' => 'display_name'
								),
								array(
									'heading'		 => 'Text',
									'width'			 => '65%',
								),
								array(
									'heading'		 => 'Number',
									'width'			 => '10%',
									'sorting option' => 'voluno_for_pos_date_created'
								),
							);
							
							//Optionally, you can choose one of the above columns to be the default sorting option.
							// If you don't want this, please delete or hide the entire array.
							$function_table['default ordering']
							= array(
								'column' => 'voluno_for_pos_date_created', // Colum name. In the example, "email" or "id".
								'direction' => 'DESC' // ASC or DESC
							);
							
						}
						#Headings and sorting (close)
						
						#Pagination (open)
						if(1==1){
							
							// If the table doesn't have a lot of space, you can make the pagination "thin". Then, the "first page", "previous page", "items per page",
							// "next page" and "last page" buttons will aligned vertically, instead of horizontally -> they will be slimmer.
							#$function_table['thin_pagination'] = "yes"; // "yes" or "no" (default)
						}
						#Pagination (close)
						
						#Display a message if no data available (open)
						if(1==1){
							
							// Sometimes, the results are listed dynamically. If no results are found, the user get's an error message.
							// Here, you can modify this message.
							
							#$function_table['no_items_available_message'] = array(
							#    'lines' => "no" // Should a line be displayed left and right of the messsage? Not important, just looks nice. "no" or "yes" (default).
							#    ,'content' => "none" // Any text (will be displayed) or "none" (no text will be displayed). Default: "There are currently no items available."
							#);
							
						}
						#Display a message if no data available (close)
						
					}
					#Table options (close)
					
				}
				#Input: Raw data + Table options (close)
				
				$function_table['part'] = 1; //Don't touch this. 
				include("#function-table.php"); //Don't touch this. 
				
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
						// the amount of column headings you added in "Table options".
						// Please be sure not to change anything else.
						
					}
					#documentation (close)
					
					#Cells/Columns (open)
					for($abs=$function_table['pagination_lower_limit'];$abs<min($function_table['pagination_upper_limit'],count($function_table['data']));$abs++){ //Don't touch this.
						$function_table['table rows'] .= $function_table['row open']; //Don't touch this.
						
						//#1 template (open) <- column number, short description of column
						if(1==1){ //Don't touch this.
							
							// Write the content here. To use the table data, use the variable:
							// $function_table['data'][$abs]['column name'] and replace "column name" with the name of the respective column, as entered in the section "raw data".
							// In the given example, the column names were "email" or "id".
							
						}
						//#1 template (close) <- column number (add +1 for each new column you add), short description of column
						
						$padding_top_bottom = 20;
						
						#1 Author + column independent (open)
						if(1==1){
							
							#general things, independent of this column (open)
							if(1==1){
								
								#inside-loop user rights (opne)
								if(1==1){
									
									#is user author? (open)
									if($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $function_table['data'][$abs]['voluno_for_pos_author']){
									$user_is_post_author = "yes";
									}else{
									unset($user_is_post_author);
									}
									#is user author? (close)
									
									#editing? (open)
									if($user_is_moderator == "yes" OR $user_is_post_author == "yes"){
									$user_may_edit_post = "yes";
									}else{
									unset($user_may_edit_post);
									}
									#editing? (close)
									
								}
								#inside-loop user rights (close)
								
								#jquery (open)
								if(empty($only_once_tog_posts_script)){
									$only_once_tog_posts_script = 1;
									$function_table['table rows'] .= '
									<script>
									jQuery(document).ready(function(){';
										
										#reporting (open)
										if(1==1){
										
										#hover (open)
										if(1==1){
											$function_table['table rows'] .= '
											jQuery(".report_div").hover(function(){
											jQuery(this).find(".report_img").fadeOut(150);
											},function(){
											jQuery(this).find(".report_img").fadeIn(150);
											});';
										}
										#hover (close)
										
										#confirm and fading and such (open)
										if(1==1){
											$function_table['table rows'] .= '
											jQuery(".report_div").click(function(){
											jQuery(".report_div_confirm_div").fadeOut(300);
											jQuery(this).parent().find(".report_div_confirm_div").fadeIn(300);
											});
											jQuery(".report_div_cancel,.report_div_confirm").click(function(){
											jQuery(".report_div_confirm_div").fadeOut(300);
											});';
										}
										#confirm and fading and such (close)
										
										#loading ajax (open)
										if(1==1){
											$function_table['table rows'] .= '
											jQuery(".report_div_confirm").click(function(){
											jQuery(".loading_img_middle_page").fadeIn(150);
											jQuery(".mysql_load_area").load("'.
												get_permalink().
												'?discussion='.$discussion_info_row->voluno_for_dis_id.
												'&reported_post="+jQuery(this).find("span").html()+" '.
											'.mysql_loaded_code", function() {
												jQuery(this).hide(0, function() {
												jQuery(this).show(0);
												});
											});
											});
											';
										}
										#loading ajax (close)
										
										}
										#reporting (close)
										
										#editing (open)
										if(1==1){
										
										#slideToggle textbox (open)
										if(1==1){
											$function_table['table rows'] .= '
											jQuery(".non_edit_post_text").css("cursor","pointer");
											jQuery(".edit_post,.non_edit_post_text").click(function(){
											if(jQuery(this).parent().parent().find(".edit_post_text_form").is(":hidden")){
												jQuery(".edit_post_text_form").slideUp(300);
												jQuery(".non_edit_post_text").slideDown(300);
												jQuery(this).parent().parent().find(".edit_post_text_form,.non_edit_post_text").slideToggle(300);
											}else{
												jQuery(this).parent().parent().find(".edit_post_text_form,.non_edit_post_text").slideToggle(300);
											}
											});';
										}
										#slideToggle textbox (close)
										
										#cancel (open)
										if(1==1){
											
											$function_table['table rows'] .= '
											jQuery(".edit_post_cancel").click(function(){
											jQuery(".edit_post_text_form").slideUp(300);
											jQuery(".non_edit_post_text").slideDown(300);
											});
											';
											
										}
										#cancel (close)
										
										#save + validation(open)
										if(1==1){
											
											#sanitize input (open)
											if(1==1){
											$function_table['table rows'] .= '
											var entityMap = {
												"&": "&amp;",
												"<": "&lt;",
												">": "&gt;",
												\'"\': \'&quot;\',
												"\'": \'&#39;\',
												"/": \'&#x2F;\'
											};
											
											function escapeHtml(string) {
												return String(string).replace(/[&<>"\'\/]/g, function(s){
												return entityMap[s];
												});
											}';
											}
											#sanitize input (close)
											
											$function_table['table rows'] .= '
											var editPostActionSave = "";
											
											jQuery(".edit_post_save").click(function(){
											editPostActionSave = "save_post";
											});
											
											var after_post_edit = " of '.$maxlength_post.' characters left.";
											var limit_post_edit = "You have reached the character limit of '.$maxlength_post.'.";
											var not_empty_post_edit = \'Please add text. To delete your post, please click "Delete post" below this box.\';
											var current_input_lenght_post_edit = 1;
											
											jQuery(".post_edit_input").keyup(function(){
											jQuery(this).closest("tr").find(".edit_post_validation").fadeIn(300);
											current_input_lenght_post_edit = jQuery(this).closest("tr").find(".post_edit_input").val().length;
											
											if(current_input_lenght_post_edit == 0){
												jQuery(this).closest("tr").find(".edit_post_validation").html(not_empty_post_edit);
											}else if(current_input_lenght_post_edit == '.$maxlength_post.'){
												jQuery(this).closest("tr").find(".edit_post_validation").html(limit_post_edit);
											}else{
												jQuery(this).closest("tr").find(".edit_post_validation")'.
												'.html(('.$maxlength_post.'-current_input_lenght_post_edit)+after_post_edit);
											}
											
											});
											
											jQuery(".edit_post_save").click(function(){
											if(current_input_lenght_post_edit > 0){
												
												var editPostId = jQuery(this).parent().find(".post_id").html();
												
												var new_post_text = jQuery(this).closest("tr").find(".post_edit_input").val();
												jQuery(this).closest("tr").find(".non_edit_post_text").html(escapeHtml(new_post_text));
												
												jQuery(".loading_img_middle_page").fadeIn(150);
												jQuery(".mysql_load_area").load("'.
												get_permalink().
												'?discussion='.$discussion_info_row->voluno_for_dis_id.
												'&edit_post_action="+editPostActionSave+"'.
												'&edit_post_id="+editPostId+" '.
												'.mysql_loaded_code",{"new_post_text":new_post_text}, function() {
												jQuery(this).hide(0, function() {
													jQuery(this).show(function(){
													jQuery(".edit_post_text_form").slideUp(300);
													jQuery(".non_edit_post_text").slideDown(300);
													});
												});
												});
											}
											});
											
											';
											
										}
										#save + validation (close)
										
										#delete (open)
										if(1==1){
											
											$function_table['table rows'] .= '
											var editPostActionDelete = "";
											
											jQuery(".edit_post_delete").click(function(){
											jQuery(this).parent().parent().find(".edit_post_delete_confirmation_div").fadeIn(300);
											});
											jQuery(".edit_post_delete_confirmation_div").mouseleave(function(){
											jQuery(this).fadeOut(300);
											});
											jQuery(".edit_post_delete_cancel").click(function(){
											jQuery(this).parent().parent().parent().find(".edit_post_delete_confirmation_div").fadeOut(300);
											});
											jQuery(".edit_post_delete_confirm").click(function(){
											editPostActionDelete = "delete_post";
											});
											
											jQuery(".edit_post_delete_confirm").click(function(){
											jQuery(this).closest("tr").fadeOut(2000);
											var editPostId = jQuery(this).parent().find(".post_id").html();
											jQuery(".loading_img_middle_page").fadeIn(150);
											jQuery(".mysql_load_area").load("'.
												get_permalink().
												'?discussion='.$discussion_info_row->voluno_for_dis_id.
												'&edit_post_action="+editPostActionDelete+"'.
												'&edit_post_id="+editPostId+" '.
											'.mysql_loaded_code", function() {
												jQuery(this).hide(0, function() {
												jQuery(this).show();
												});
											});
											});
											';
										}
										#delete (close)
										
										}
										#editing (close)
										
										#mark reported post to help moderator (I/III) (open)
										if($user_is_moderator == "yes"){
										
										//i want to add a class to the tr, but css doesn't allow selecting parents and the tr is in the table of god function
										$function_table['table rows'] .= '
										jQuery(".voluno_this_post_was_reported").parent().addClass("mark_reported_post_red_to_help_moderator_find_it");';
										}
										#mark reported post to help moderator (I/III) (close)
										
									$function_table['table rows'] .= '
									});
									</script>';
								}
								#jquery (open)
								
								#style (open)
								if(empty($only_once_tog_posts_style)){
									$only_once_tog_posts_style = 1;
									$function_table['table rows'] .= '
									<style>
									.report_div_confirm_div{
										position:absolute;
										border:1px solid black;
										border-radius:20px;
										padding:20px;
										background-color:#fff;
										text-align:justify;
										width:150px;
										display:none;
										margin-top:-100px;
										margin-left:10px;
									}';
									
									#mark reported post to help moderator (II/III) (close)
									if($user_is_moderator == "yes"){
										$function_table['table rows'] .= '
										.mark_reported_post_red_to_help_moderator_find_it{
										background-color:red !important;
										}';
									}
									#mark reported post to help moderator (II/III) (close)
									
									$function_table['table rows'] .= '
									</style>';
								}
								#style (close)
								
							}
							#general things, independent of this column (close)
							
							#regarding this column (open)
							if(1==1){
								
								#preparation (open)
								if(1==1){
									
									$img_width = 70;
									
									#function-image-processing (open)
									if(1==1){
									#profile picture
										$function_propic__type = "profile picture";
										$function_propic__user_id = $function_table['data'][$abs]['voluno_for_pos_author'];
									#all
										$function_propic__geometry = array($img_width,NULL); //optional, if e.g. only width: 300, NULL; vice versa
									include('#function-image-processing.php');
									# $function_propic;
									#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
									}
									#function-image-processing (close)
									
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
											
											$function_profileLink['id'] = $function_table['data'][$abs]['voluno_for_pos_author']; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
											#$function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
											
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
									
									#mark reported post to help moderator (III/III) (close)
									if($user_is_moderator == "yes"){
									
									if($function_table['data'][$abs]['voluno_for_pos_id'] == $_GET['reported_post_id']){
										$class_to_help_moderator_find_reported_post = "voluno_this_post_was_reported";
									}else{
										unset($class_to_help_moderator_find_reported_post);
									}
									
									}
									#mark reported post to help moderator (III/III) (close)
									
								}
								#preparation (close)
								
								#content (open)
								if(1==1){
									
									$function_table['table rows'] .= '
									<td
									class="'.$class_to_help_moderator_find_reported_post.'"
									style="
										text-align:left;
										vertical-align:top;
										padding:'.$padding_top_bottom.'px 30px '.$padding_top_bottom.'px 5px;
										font-weight:bold;
									"
									>';
									if($function_profileLink['status'] == "active"){
										$function_table['table rows'] .= '
										<a href="'.$function_profileLink['link'].'">';
									}
										$function_table['table rows'] .= '
										<table title="'.$function_profileLink['link_title'].'">
										<tr>
											<td style="width:'.$img_width.'px;">
											<img
												class="voluno_brighter_on_hover"
												style="border-radius:10px;border:1px solid black;vertical-align:top;"
												src="'.$function_propic.'"
											>
											</td>
											<td>
											'.$function_profileLink['name'].'
											</td>
										</tr>
										</table>';
									if($function_profileLink['status'] == "active"){
										$function_table['table rows'] .= '
										</a>';
									}
									$function_table['table rows'] .= '
									</td>
									';
									
								}
								#content (close)
								
							}
							#regarding this column (close)
							
						}
						#1 Author + column independent (close)
						
						#2 Posts (open)
						if(1==1){
							
							#content (open)
							if(1==1){
								
								$function_table['table rows'] .= '
								<td
									style="
									text-align:justify;
									padding:'.$padding_top_bottom.'px 5px '.$padding_top_bottom.'px 5px;
									vertical-align:top;
									"
								>';
									
									#user may edit (open)
									if($user_may_edit_post == "yes"){
										
										#function-sanitize-text.php (open)
										if(1==1){
											
											$function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
											/*
											 *one line unformatted text (city, name, occupation, etc.)
											 *url readable text (url, user_nicename, etc.) (sanitize_title)
											 *email address
											 *plain text with line breaks (biography)
											*/
											$function_sanitize_text__text = $function_table['data'][$abs]['voluno_for_pos_content'];
											$function_sanitize_text__reverse = "yes"; //only if you want to reverse the process. e.g. remove <br> to edit in form field
											include('#function-sanitize-text.php');
											#output: $function_sanitize_text__text_sanitized;
											
										}
										#function-sanitize-text.php (close)
										
										$function_table['table rows'] .= '
										<p class="non_edit_post_text" title="Click to edit post">
											'.$function_table['data'][$abs]['voluno_for_pos_content'].'
										</p>
										<form method="post" action="'.get_permalink().'?" class="edit_post_text_form" style="display:none;">
											<textarea
											name="post_edit_input"
											class="post_edit_input"
											placeholder="Please insert your post text here."
											style="width:95%;resize:vertical;min-height:100px;max-height:300px;height:200px;"
											maxlength='.$maxlength_post.'
											>'.
											$function_sanitize_text__text_sanitized.
											'</textarea>
											<div style="display:nooone;color:#F86A00;" class="edit_post_validation"></div>';
											
											#buttons (open)
											if(1==1){
											$function_table['table rows'] .= '
											<input type="hidden" value="" class="post_edit_save_or_delete" name="post_edit_save_or_delete">
											<div style="text-align:center;">';
												$edit_post_button_div_beginning
												= '<div style="display:inline-block;margin:20px 20px 0px 20px;" class="voluno_button ';
												$function_table['table rows'] .= 
												$edit_post_button_div_beginning.'edit_post_cancel">
												Cancel
												</div>
												'.$edit_post_button_div_beginning.'edit_post_save">
												Save post
												</div>
												'.$edit_post_button_div_beginning.'edit_post_delete">
												Delete post
												</div>
												<div
												style="
													position:absolute;
													display:none;
													background-color:#fff;
													border:1px solid black;
													border-radius:20px;
													padding:20px;
													text-align:center;
													width:200px;
													margin-top:-80px;
													margin-left:350px;
												"
												class="edit_post_delete_confirmation_div"
												>
												Really delete this post?
												<div>
													<div class="voluno_button edit_post_delete_cancel" style="display:inline-block;">
													No, cancel
													</div>
													<div class="voluno_button edit_post_delete_confirm" style="display:inline-block;">
													Yes, delete
													<span style="display:none;" class="post_id">'.$function_table['data'][$abs]['voluno_for_pos_id'].'</span>
													</div>
												</div>
												</div>
											</div>';
											}
											#buttons (close)
											
										$function_table['table rows'] .= '
										</form>';
									}
									#user may edit (close)
									
									#user may not edit (open)
									else{
										$function_table['table rows'] .= '
										<p>
											'.$function_table['data'][$abs]['voluno_for_pos_content'].'
										</p>';
									}
									#user may not edit (close)
									
								$function_table['table rows'] .= '
								</td>
								';  
								
							}
							#content (close)
							
						}
						#2 Posts (close)
						
						#3 Post number (open)
						if(1==1){
							
							#preparation (open)
							if(1==1){
								
								#get post number (open)
								if(1==1){
									
									if(empty($all_dates_for_post_number)){
										
										for($abt=0;$abt<count($function_table['data']);$abt++){
											
											$all_dates_for_post_number[] = $function_table['data'][$abt]['voluno_for_pos_date_created'];
											
										}
										sort($all_dates_for_post_number);
										
									}
									
									$post_number = array_search($function_table['data'][$abs]['voluno_for_pos_date_created'],$all_dates_for_post_number) + 1;
									
								}
								#get post number (close)
								
								#function-timezone.php (open)
								if(1==1){
									
									$function_timezone = $function_table['data'][$abs]['voluno_for_pos_date_created'];
									$function_timezone_format = "time difference (short)"; //default: datetime (weekday long hour min sec)
									//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
									//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
									include('#function-timezone.php');
									#output:
									$difference = $function_timezone;
									
								}
								#function-timezone.php (close)
								
								#function-image-processing (open)
								if($user_is_post_author != "yes" AND empty($only_once_flag_images)){
									$only_once_flag_images = 1;
									
									$report_img_size = 15;
									#thematic only
									$function_propic__type = "thematic";
									$function_propic__original_img_name = "flag.png";
									$function_propic__cropping = "yes"; //yes or empty (default)
									#all
									$function_propic__geometry = array($report_img_size,$report_img_size); //optional, if e.g. only width: 300, NULL; vice versa
									include('#function-image-processing.php');
									$report_img = $function_propic;
									
									#thematic only
									$function_propic__type = "thematic";
									$function_propic__original_img_name = "flag-on.png";
									$function_propic__cropping = "yes"; //yes or empty (default)
									#all
									$function_propic__geometry = array($report_img_size,$report_img_size); //optional, if e.g. only width: 300, NULL; vice versa
									include('#function-image-processing.php');
									$report_img_hover = $function_propic;
									#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
								}
								#function-image-processing (close)
								
								#function-image-processing (open)
								if(($user_may_edit_post == "yes") AND empty($only_once_edit_images)){
									$only_once_edit_images = 1;
									
									#thematic only
									$function_propic__type = "thematic";
									$function_propic__original_img_name = "edit_white.png";
									$function_propic__cropping = "yes"; //yes or empty (default)
									#all
									$function_propic__geometry = array(30,NULL); //optional, if e.g. only width: 300, NULL; vice versa
									include('#function-image-processing.php');
									$edit_img = $function_propic;
									#$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
								}
								#function-image-processing (close)
								
							}
							#preparation (close)
							
							#content (open)
							if(1==1){
							
							$function_table['table rows'] .= '
							<td style="padding:'.$padding_top_bottom.'px 20px '.$padding_top_bottom.'px 5px;text-align:right;vertical-align:top;">
								<div>
								<strong>
									#'.number_format($post_number,0,"."," ").'
								</strong>';
								
								#report (open)
								if($user_is_post_author != "yes"){
									$function_table['table rows'] .= '
									<div
									style="display:inline-block;cursor:pointer;"
									class="report_div"
									title="Click to draw a moderators attention&#13; to this post to check for forum violations."
									>
									<img
										src="'.$report_img.'"
										style="position:absolute;"
										class="report_img"
										
									>
									<img src="'.$report_img_hover.'">
									</div>
									<div class="report_div_confirm_div">
									<p>
										Report this post to a moderator?
									</p>
									<div>
										<div class="report_div_cancel voluno_button" style="display:inline-block;">
										Cancel
										</div>
										<div class="report_div_confirm voluno_button" style="display:inline-block;">
										Report
										<span style="display:none;">'.$function_table['data'][$abs]['voluno_for_pos_id'].'</span>
										</div>
									</div>
									</div>
									';
								}
								#report (close)
								
								$function_table['table rows'] .= '
								</div>
								<div style="font-size:80%;">
								<div class="post_age_div_shown">
									'.$difference.'
								</div>
								</div>';
								
								#edit post button (open)
								if($user_may_edit_post == "yes"){
								$function_table['table rows'] .= '
								<div
									style="display:inline-block;padding:5px;"
									class="voluno_button edit_post"
									title="Edit post"
								>
									<img src="'.$edit_img.'">
								</div>';
								}
								#edit post button (close)
								
								#post id (open)
								if($user_is_moderator == "yes"){
								$function_table['table rows'] .= '
								<div
									style="
									color:#006F00;
									font-size:90%;
									inline-block;
									background-color:#fff;
									border:1px solid black;
									border-radius:5px;
									text-align:center;
									margin:5px;
									"
								>
									Post ID:
									<br>
									'.$function_table['data'][$abs]['voluno_for_pos_id'].'
								</div>';
								}
								#post id (close)
								
								$function_table['table rows'] .= '
							</td>
							';
							
							}
							#content (close)
							
						}
						#3 Post number (close)
						
						$function_table['table rows'] .= $function_table['row close']; //Don't touch this. 
					} //Don't touch this. 
					#Cells/Columns (close)
					
				}
				#design (close)
				
				$function_table['part'] = 2; //Don't touch this. 
				include("#function-table.php"); //Don't touch this. 
				
				#output
				//the entire output is stored in the following variable:
				echo $function_table['output table'];
				
			}
			#function-table.php (v1.0) (close)
			
		}
		#table of posts (close)
		
    }
    #content (close)    
    
}
#forum individual discussion (posts) (close)

#page_section: mysql updates (open)
if(1==1){
    
    #report a forum post (open)
    if($page_section == "report a forum post mysql page"){
	
	#validate post id (open)
	if(1==1){
	    $validate_post_id_query = $GLOBALS['wpdb']->prepare('SELECT *
						    FROM fi4l3fg_voluno_forum_posts
						    WHERE voluno_for_pos_id = %d
							AND voluno_for_pos_discussion = %d;'
						    ,$_GET['reported_post']
						    ,$is_discussion_valid_row->voluno_for_dis_id);
	    $validate_post_id_row = $GLOBALS['wpdb']->get_row($validate_post_id_query);
	    
	    $reporting_only_once_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_staff_reporting
							WHERE report_item_id = %d
							    AND report_item_type = "forum post";'
							,$_GET['reported_post']);
	    $reporting_only_once_row = $GLOBALS['wpdb']->get_row($reporting_only_once_query);
	    
	    if(!empty($validate_post_id_row) AND $validate_post_id_row->voluno_for_pos_author != $GLOBALS['voluno_variables']['current_user_extended']->usersext_id){
		$error = "no";
	    }
	    
	}
	#validate post id (close)
	
	#database query insert (open)
	if($error == "no" AND empty($reporting_only_once_row)){
	    
	    $GLOBALS['wpdb']->insert(
			    'fi4l3fg_voluno_staff_reporting',
		    array(
			    'report_item_type' => 'forum post'
			    ,'report_item_id' => $validate_post_id_row->voluno_for_pos_id
			    ,'report_item_author' => $validate_post_id_row->voluno_for_pos_author
			    
			    ,'report_complainer' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
			    ,'report_status' => "pending (unclaimed)"
			    
			    ,'report_date_modified' => date("Y-m-d H:i:s")
			    ,'report_date_created' => date("Y-m-d H:i:s")
			),
		    array(
			    '%s','%d','%s'
			    ,'%s','%s'
			    ,'%s','%s'
			));
	    
	}
	#database query insert (close)
	
	#notification of success (open)
	if($error == "no"){
	    
	    if(empty($reporting_only_once_row)){
		$text_array = array(
		    'title' => 'Report submitted'
		    ,'text' => 'Thank you for informing us. A moderator will soon have a look at this post.'
		);
	    }else{
		$text_array = array(
		    'title' => 'Post already reported'
		    ,'text' => 'Please have patience. A moderator will soon have a look at this post.'
		);
	    }
	    
	    #function-fixed-div.php (v2) (open)
	    if(1==1){
		
		$function_fixed_div['text'] = $text_array['text'];
		$function_fixed_div['title'] = $text_array['title'];
		$function_fixed_div['dark_bg_div'] = "yes"; //default: no
		
		$function_fixed_div__version = 2; //obligatory
		include('#function-fixed-div.php');
		#output: $function_fixed_div
		
	    }
	    #function-fixed-div.php (v2) (close)
	    
	    echo '
	    <div class="mysql_loaded_code">
		'.$function_fixed_div.'
	    </div>';
	    
	}
	#notification of success (close)
	
    }
    #report a forum post (close)
    
    #delete a forum post (open)
    if($page_section == "delete a forum post"){
	
	#validate post id (open)
	if(1==1){
	    
	    #is user moderator? (open)
	    if(in_array('Voluno Moderator',$function_userpositions_get['simple_pure_array']['accepted'])){
			
			$validate_post_id_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_forum_posts
								WHERE voluno_for_pos_id = %d;'
								,$_GET['edit_post_id']);
			$validate_post_id_row = $GLOBALS['wpdb']->get_row($validate_post_id_query);
			
	    }
	    #is user moderator? (close)
	    
	    #is user author? (open)
	    else{
		$validate_post_id_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_forum_posts
							WHERE voluno_for_pos_id = %d
							    AND voluno_for_pos_author = %s;'
							,$_GET['edit_post_id']
							,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
		$validate_post_id_row = $GLOBALS['wpdb']->get_row($validate_post_id_query);
	    }
	    #is user author? (close)
	    
	    if(!empty($validate_post_id_row)){
		$post_deletion_is_valid = "yes";
		
		#check if this is the only post in the discussion. if so, delete discussion too (open)
		if(1==1){
		    
		    $num_of_posts_in_this_discussion_query = $GLOBALS['wpdb']->prepare('SELECT *
							    FROM fi4l3fg_voluno_forum_posts
							    WHERE voluno_for_pos_discussion = %d
								AND voluno_for_pos_status = "";'
							    ,$validate_post_id_row->voluno_for_pos_discussion);
		    $num_of_posts_in_this_discussion_results = $GLOBALS['wpdb']->get_results($num_of_posts_in_this_discussion_query);
		    
		    if(count($num_of_posts_in_this_discussion_results) == 1){
			$it_was_the_last_post_in_discussion_so_delete_discussion_too = "yes";
		    }
		    
		}
		#check if this is the only post in the discussion. if so, delete discussion too (close)
		
	    }
	    
	}
	#validate post id (close)
	
	#database mysql update (open)
	if($post_deletion_is_valid == "yes"){
	    
	    #delete post (open)
	    if(1==1){
		$GLOBALS['wpdb']->update( 
				'fi4l3fg_voluno_forum_posts',
			array( //updated content
				'voluno_for_pos_status' => 'deleted'
			),
			array( //location of updated content
				'voluno_for_pos_id' => $validate_post_id_row->voluno_for_pos_id
			),
			array( //format of updated content
				'%s'
			),
			array( //format of location of updated content
				'%d'
			    ));
	    }
	    #delete post (close)
	    
	    #delete discussion (open)
	    if($it_was_the_last_post_in_discussion_so_delete_discussion_too == "yes"){
			
			$GLOBALS['wpdb']->update( 
				'fi4l3fg_voluno_forum_discussions',
				array( //updated content
					'voluno_for_dis_status' => 'deleted'
				),
				array( //location of updated content
					'voluno_for_dis_id' => $validate_post_id_row->voluno_for_pos_discussion
				),
				array( //format of updated content
					'%s'
				),
				array( //format of location of updated content
					'%d'
			    )
			);
			
			#function-redirect.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
					// Redirects to another page. Prevents further loading of content.
					
				}
				#documentation (close)
				
				#input (open)
				if(1==1){
					
					$function_redirect['redirect_url'] = get_permalink().'?thread='.$is_discussion_valid_row->voluno_for_dis_thread; // url to redirect to. If none is given, homepage is used.
					
				}
				#input (close)
				
				include('#function-redirect.php');
				
				#no output
				
			}
			#function-redirect.php (v1.0) (close)
			
	    }
	    #delete discussion (close)
	    
	}
	#database mysql update (close)
	
	#notification of success (open)
	if($post_deletion_is_valid == "yes"){
	    
	    #function-fixed-div.php (v2) (open)
	    if(1==1){
		
		#$function_fixed_div['title'] = 'Post deleted successfully.';
		$function_fixed_div['text'] = 'Post deleted successfully.';
		$function_fixed_div['dark_bg_div'] = "yes"; //default: no
		$function_fixed_div['width'] = 165; //default:250 (px)
		$function_fixed_div['text_text_align'] = "center"; //default:justify
		$function_fixed_div['hide_after_x_milliseconds'] = 2500; //default: empty, don't fade out
		
		$function_fixed_div__version = 2; //obligatory
		include('#function-fixed-div.php');
		#output: $function_fixed_div
		
	    }
	    #function-fixed-div.php (v2) (close)
	    
	    echo '
	    <div class="mysql_loaded_code">
		'.$function_fixed_div.'
	    </div>';
	    
	}
	#notification of success (close)
	
    }
    #delete a forum post (close)
    
    #save edit of a forum post (open)
    if($page_section == "save edit of a forum post"){
	
	#validate post id (open)
	if(1==1){
	    
	    #is user moderator? (open)
	    if(in_array('Voluno Moderator',$function_userpositions_get['simple_pure_array']['accepted'])){
			
			$validate_post_id_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_forum_posts
								WHERE voluno_for_pos_id = %d;'
								,$_GET['edit_post_id']);
			$validate_post_id_row = $GLOBALS['wpdb']->get_row($validate_post_id_query);
			
	    }
	    #is user moderator? (close)
	    
	    #is user author? (open)
	    else{
		$validate_post_id_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_forum_posts
							WHERE voluno_for_pos_id = %d
							    AND voluno_for_pos_author = %s;'
							,$_GET['edit_post_id']
							,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
		$validate_post_id_row = $GLOBALS['wpdb']->get_row($validate_post_id_query);
	    }
	    #is user author? (close)
	    
	    if(!empty($validate_post_id_row)){
		$post_saving_is_valid = "yes";
	    }
	    
	}
	#validate post id (close)
	
	#sanitizing (open)
	if(1==1){
	    
	    #function-sanitize-text.php (open)
	    if(1==1){
		
		$function_sanitize_text__type = "plain text with line breaks (biography)"; //obligatory, currently: email (=the text)
		/*
		 *one line unformatted text (city, name, occupation, etc.)
		 *url readable text (url, user_nicename, etc.) (sanitize_title)
		 *email address
		 *plain text with line breaks (biography)
		*/
		$function_sanitize_text__text = $_POST['new_post_text'];
		include('#function-sanitize-text.php');
		#output: $function_sanitize_text__text_sanitized;
		
	    }
	    #function-sanitize-text.php (close)
	    
	}
	#sanitizing (close)
	
	#mysql (open)
	if($post_saving_is_valid == "yes"){
	    
	    #database mysql update (open)
	    if(1==1){
		
		$GLOBALS['wpdb']->update( 
				'fi4l3fg_voluno_forum_posts',
			array( //updated content
				'voluno_for_pos_status' => 'updated'
				#,'voluno_for_pos_update_id' => $validate_post_id_row->voluno_for_pos_id
				    #i think this can be deleted, but i changed it long after created it and i'm not 100% sure if deletion is save
			),
			array( //location of updated content
				'voluno_for_pos_id' => $validate_post_id_row->voluno_for_pos_id
			),
			array( //format of updated content
				'%s'
				#,'%d'
			),
			array( //format of location of updated content
				'%d'
			    ));
	    }
	    #database mysql update (close)
	    
	    #database query insert (open)
	    if(1==1){
		
		$GLOBALS['wpdb']->insert(
				'fi4l3fg_voluno_forum_posts',
			array(
				'voluno_for_pos_content' => $function_sanitize_text__text_sanitized
				,'voluno_for_pos_author' => $validate_post_id_row->voluno_for_pos_author
				
				,'voluno_for_pos_discussion' => $validate_post_id_row->voluno_for_pos_discussion
				,'voluno_for_pos_update_id' => $validate_post_id_row->voluno_for_pos_id
				,'voluno_for_pos_date_created' => $validate_post_id_row->voluno_for_pos_date_created
			    ),
			array(
				'%s','%s'
				,'%d','%d','%s'
			    ));
		
	    }
	    #database query insert (close)
	    
	}
	#mysql (close)
	
	#notification of success (open)
	if($post_saving_is_valid == "yes"){
	    
	    #function-fixed-div.php (v2) (open)
	    if(1==1){
		
		#$function_fixed_div['title'] = 'Post deleted successfully.';
		$function_fixed_div['text'] = 'Post updated successfully.';
		$function_fixed_div['dark_bg_div'] = "yes"; //default: no
		$function_fixed_div['width'] = 175; //default:250 (px)
		$function_fixed_div['text_text_align'] = "center"; //default:justify
		$function_fixed_div['hide_after_x_milliseconds'] = 2000; //default: empty, don't fade out
		
		$function_fixed_div__version = 2; //obligatory
		include('#function-fixed-div.php');
		#output: $function_fixed_div
		
	    }
	    #function-fixed-div.php (v2) (close)
	    
	    echo '
	    <div class="mysql_loaded_code">
		'.$function_fixed_div.'
	    </div>';
	    
	}
	#notification of success (close)
	
    }
    #save edit of a forum post (close)
    
}
#page_section: mysql updates (close)

?>