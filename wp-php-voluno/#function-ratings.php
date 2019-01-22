<?php

### this function is unsafe, enters post data into database unsanazited

/*
include('#function-ratings.php');
#output: echo $function_ratings;
*/

#item and question definitions (open)
if(1==1){
    
    $function_ratings_int = $function_ratings;
    unset($function_ratings);
    
    #full page or just one rating in an items page (open)
    if(get_the_ID() == 806){
		$function_ratings_int['version'] = "full page";
    }
    #full page or just one rating in an items page (close)
    
    #page url (open)
    if($function_ratings_int['version'] == "full page" OR empty($function_ratings_int['url'])){
		$function_ratings_int['url'] = get_permalink();
    }
    #page url (close)
    
    #initial ratings query (open)
    if(1==1){
		
		if(!empty($function_ratings_int['mysql_where_and_argument'])){
			$function_ratings_int['mysql_where_and_argument']
			= 'AND '.$function_ratings_int['mysql_where_and_argument'];
		}
		
		$function_ratings_int['query_text'] = '
			SELECT *
			FROM fi4l3fg_voluno_ratings
			WHERE rating_user_id = %s
				'.$function_ratings_int['mysql_where_and_argument'].'
			ORDER BY rating_date_created DESC;
			';
		$function_ratings_int['query'] = $GLOBALS['wpdb']->prepare($function_ratings_int['query_text'],$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
		$function_ratings_int['results'] = $GLOBALS['wpdb']->get_results($function_ratings_int['query']);
		
    }
    #initial ratings query (close)
    
}
#item and question definitions (close)

#mysql (open)
if(1==1){
    
    #get (open)
    if(1==1){
		
		#ratings (open)
		if(1==1){
			
			$function_ratings_int['query'] = $GLOBALS['wpdb']->prepare($function_ratings_int['query_text'],$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
			$function_ratings_int['results'] = $GLOBALS['wpdb']->get_results($function_ratings_int['query']);
			
		}
		#ratings (close)
		
    }
    #get (close)
    
    #update (open)
    if(!empty($_POST['function_ratings__rating_id'])){
		
		#get all ratings where update is allowed (open)
		if(1==1){
			for($agj=0;$agj<count($function_ratings_int['results']);$agj++){
				if($function_ratings_int['results'][$agj]->rating_status == "pending"){
					$function_ratings_int['pending_ratings_array_for_update'][] = $function_ratings_int['results'][$agj]->rating_id;
				}
			}
		}
		#get all ratings where update is allowed (close)
		
		#validation check (open)
		if(in_array($_POST['function_ratings__rating_id'],$function_ratings_int['pending_ratings_array_for_update'])){
			
			#update rating status (open)
			if(1==1){
				
				#database query update (open)
				if(1==1){
					$GLOBALS['wpdb']->update( 
						'fi4l3fg_voluno_ratings',
						array( //updated content
						'rating_status' => 'completed'
						),
						array( //location of updated content
						'rating_id' => $_POST['function_ratings__rating_id'],
						'rating_status' => 'pending',
						'rating_date_modified' => date("Y-m-d H:i:s")
						),
						array( //format of updated content
						'%d'
						),
						array( //format of location of updated content
						'%d','%s','%s'
						));
				}
				#database query update (close)
				
			}
			#update rating status (close)
			
			#save in records (open)
			if(1==1){
				
				#get valid mysql names and values (open)
				if(1==1){
					$function_ratings_int['update_input_values_validation_array_1-5'] = array(1,2,3,4,5);
					
					$function_ratings_int['update_input_name_validation_query'] = $GLOBALS['wpdb']->prepare('SELECT *
														FROM fi4l3fg_voluno_lists_rating_type');
					$function_ratings_int['update_input_name_validation_results']
					= $GLOBALS['wpdb']->get_results($function_ratings_int['update_input_name_validation_query']);
					
					for($agl=0;$agl<count($function_ratings_int['update_input_name_validation_results']);$agl++){
					$function_ratings_int['update_input_mysql_names_validation_array']
						[$function_ratings_int['update_input_name_validation_results'][$agl]->ratingtype_specific]
						[]
						= $function_ratings_int['update_input_name_validation_results'][$agl]->ratingtype_class_msql_name;
					}
				}
				#get valid mysql names and values (close)
				
				#loop (open)
				for($agk=0;$agk<count($_POST['function_ratings__rating_item_value']);$agk++){
					
					#validation of values (open)
					if(in_array(
						$_POST['function_ratings__rating_item_value'][$agk],
						$function_ratings_int['update_input_values_validation_array_1-5']
					)){
						
						#user personal record ratings (open)
						if(in_array($_POST['function_ratings__rating_item_name'][$agk],
						$function_ratings_int['update_input_mysql_names_validation_array']['user'])){
							
							$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_records',
								array(
								'record_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'record_type_general' => 'reputation',
								###
								'record_type_specific' => $_POST['function_ratings__rating_item_name'][$agk],
								'record_value' => $_POST['function_ratings__rating_item_value'][$agk]*2,
								
								'record_source_rating' => $_POST['function_ratings__rating_id'],
								'record_date_modified' => date("Y-m-d H:i:s"),
								'record_date_created' => date("Y-m-d H:i:s")
								),
								array(
								'%s','%s',
								'%s','%d',
								'%d','%s','%s'
								));
							
						}
						#user personal record ratings (open)
						
						#user item skills record ratings (duration) (open)
						if(in_array($_POST['function_ratings__rating_item_name'][$agk],
						$function_ratings_int['update_input_mysql_names_validation_array']['item'])){
							
							if($_POST['function_ratings__rating_item_name'][$agk] != 'task_duration'){
							$GLOBALS['wpdb']->insert(
									'fi4l3fg_voluno_records',
								array(
									'record_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
									'record_type_general' => 'item_skills',
									
									'record_type_specific' => $_POST['function_ratings__rating_item_name'][$agk],
									'record_value' => ($_POST['function_ratings__rating_item_value'][$agk]*2),
									
									'record_source_rating' => $_POST['function_ratings__rating_id'],
									'record_date_modified' => date("Y-m-d H:i:s"),
									'record_date_created' => date("Y-m-d H:i:s")
								),
								array(
									'%s','%s',
									'%s','%d',
									'%d','%s','%s'
								));
							}
							
						}
						#user item skills record ratings (open)
						
						#ngo record ratings (open)
						if(in_array($_POST['function_ratings__rating_item_name'][$agk],
						$function_ratings_int['update_input_mysql_names_validation_array']['ngo'])){
							
							#get ngo id (open)
							if(1==1){
								
								$function_ratings_int['update_input_ngo_id_query1'] = $GLOBALS['wpdb']->prepare('SELECT *
																	FROM fi4l3fg_voluno_ratings
																	WHERE rating_id = %d'
																	,$_POST['function_ratings__rating_id']);
								$function_ratings_int['update_input_ngo_id_query_row1']
									= $GLOBALS['wpdb']->get_row($function_ratings_int['update_input_ngo_id_query1']);
								
								if($function_ratings_int['update_input_ngo_id_query_row1']->rating_type_general == "task"){
									
									$function_ratings_int['update_input_ngo_id_query2']
									= $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_items_tasks
											WHERE task_id = %d'
											,$function_ratings_int['update_input_ngo_id_query_row1']->rating_type_general_id);
									$function_ratings_int['update_input_ngo_id_query_row2']
									= $GLOBALS['wpdb']->get_row($function_ratings_int['update_input_ngo_id_query2']);
									
							}
							#dome: do the same for each item
							
							}
							#get ngo id (close)
							
							#db insert (open)
							if(1==1){
								$GLOBALS['wpdb']->insert(
										'fi4l3fg_voluno_records',
									array(
										'record_user_id' => $function_ratings_int['update_input_ngo_id_query_row2']->task_ngo_id,
										'record_type_general' => 'ngo_reputation',
										
										'record_type_specific' => $_POST['function_ratings__rating_item_name'][$agk],
										'record_value' => $_POST['function_ratings__rating_item_value'][$agk]*2,
										
										'record_source_rating' => $_POST['function_ratings__rating_id'],
										'record_date_modified' => date("Y-m-d H:i:s"),
										'record_date_created' => date("Y-m-d H:i:s")
									),
									array(
										'%s','%s',
										'%s','%d',
										'%d','%s','%s'
									));
							}
							#db insert (close)
							
						}
						#ngo record ratings (open)
						
					}
					#validation of values (close)
					
					#validation of values (duration only) (open)
					if($_POST['function_ratings__rating_item_value'][$agk]>=0 AND $_POST['function_ratings__rating_item_value'][$agk]<=7000){
						
						#user item skills record ratings (open)
						if($_POST['function_ratings__rating_item_name'][$agk] == 'task_duration'){
							
							$GLOBALS['wpdb']->insert(
								'fi4l3fg_voluno_records',
								array(
								'record_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
								'record_type_general' => 'item_skills',
								
								'record_type_specific' => $_POST['function_ratings__rating_item_name'][$agk],
								'record_value' => $_POST['function_ratings__rating_item_value'][$agk],
								
								'record_source_rating' => $_POST['function_ratings__rating_id'],
								'record_date_modified' => date("Y-m-d H:i:s"),
								'record_date_created' => date("Y-m-d H:i:s")
								),
								array(
								'%s','%s',
								'%s','%d',
								'%d','%s','%s'
								));
							
						}
						#user item skills record ratings (open)
						
					}
					#validation of values (duration only) (close)
					
				}
				#loop (close)
				
			}
			#save in records (close)
			
		}
		#validation check (close)
		
    }
    #update (close)
    
}
#mysql (close)

#style (open)
if(1==1){
	$function_ratings .= '
	<style>
		.function_ratings_div{
			border-radius:20px;
			padding:20px;
			background-color:#FFEAB9;
			margin:20px auto;
			width:90%;
			text-align:center;
		}
		.function_ratings_div:hover{
			background-color:#FFC977;
		}
		.function_ratings_div_div{
			border-radius:20px;
			padding:20px;
			margin:20px auto;
			background-color:#FFF2D5;
			width:90%;
		}
		.function_ratings_div_content{
			display:none;
		}
		.function_ratings_div_div:hover{
			background-color:#FFE7AE;
		}
		.function_ratings_div_div_img{
			border-radius:20px;
			border:1px solid black;"
		}
		.function_ratings_div_div_img_ngo{
			padding:10px;
			border:1px solid black;"
		}
		.function_ratings_div_div table tr td:first-child{
			width:70px;
			padding-right:10px;
		}
	</style>';
}
#style (close)

#jquery (open)
if(1==1){
    
    $function_ratings .= '
    <script>
		jQuery(document).ready(function(){';
			
			#extend rating div (open)
			if(1==1){
				
				$function_ratings .= '
				jQuery(".function_ratings_div_content").first().show(300);
				jQuery(".function_ratings_div_title").click(function(){
					jQuery(this).parent().parent().find(".function_ratings_div_content").slideToggle(300);
				});
				';
				
			}
			#extend rating div (close)
			
			#star rating system (open)
			if(1==1){
				
				#when clicking on a star
				$function_ratings .= '
				jQuery(".star_rating_container .yellow_star").click(function(){
					jQuery(this).closest(".star_rating_container").find("div").css("opacity","1");
					jQuery(this).closest(".star_rating_container").find(".star_rating_counter").val(jQuery(this).prevAll().length);
					jQuery(this).nextAll().css("opacity","0");
					jQuery(this).css("opacity","1");
					jQuery(this).prevAll().css("opacity","1");
					jQuery(this).closest(".star_rating_container").find(".star_rating_select").val(jQuery(this).prevAll().length);
				});';
				
				#when selecting a star rating from the select menu
				$function_ratings .= '
				jQuery(document).on("change",".star_rating_select",function(){
					jQuery(this).parent().find("div").css("opacity","1");
					var stars = jQuery(this).val();
					jQuery(this).parent().find(".star_rating_counter").val(stars);
					jQuery(this).parent().parent().find(".star_rating_container .yellow_star").css("opacity","0");
					jQuery(this).parent().parent().find(".star_rating_container .yellow_star:lt("+(parseInt(stars)+1)+")").css("opacity","1");
					
					if(jQuery(this).val() == "none"){
					jQuery(this).closest(".star_rating_container").find("div").css("opacity","0");
					jQuery(this).closest(".star_rating_container").find(".grey_stars").css("opacity","1");
					}
					
			});
			';#star_rating_select
			
			}
			#star rating system (close)
			
			#submit form (open)
			if(1==1){
				
				$function_ratings .= '
				jQuery(".function_ratings_submit_rating").click(function(){
					jQuery(this).closest(".function_ratings_submit_form").submit();
				});
				';
				
			}
			#submit form (close)
			
		$function_ratings .= '
		});
    </script>';
    
}
#jquery (close)

#general preparation and definitions (open)
if(1==1){
    
    #general varibale definitions (open)
    if(1==1){
		
		if($function_ratings_int['version'] == "full page"){
			$function_ratings_int['img_size'] = 150; //question block images
			$function_ratings_int['star_size'] = 40; //stars in question explanations
		}else{
			$function_ratings_int['img_size'] = 70; //question block images
			$function_ratings_int['star_size'] = 22; //stars in question explanations
		}
		
    }
    #general variable definitions (close)
    
    #function-image-processing (open)
    if(1==1){
		
		#thematic only
			$function_propic__type = "thematic";
			$function_propic__original_img_name = "star-yellow.png";
		#all
			$function_propic__geometry = array($function_ratings_int['star_size'],$function_ratings_int['star_size']); //optional, if e.g. only width: 300, NULL; vice versa
			#$function_propic__rotate = 180; //optional, default: 0
		include('#function-image-processing.php');
		$function_ratings_int['yellow_star'] = '<img src="'.$function_propic.'">';
		$function_ratings_int['yellow_star_row'] = $function_ratings_int['yellow_star'].$function_ratings_int['yellow_star'].$function_ratings_int['yellow_star'].$function_ratings_int['yellow_star'].$function_ratings_int['yellow_star'];
		
		#thematic only
			$function_propic__type = "thematic";
			$function_propic__original_img_name = "star-grey.png";
		#all
			$function_propic__geometry = array($function_ratings_int['star_size'],$function_ratings_int['star_size']); //optional, if e.g. only width: 300, NULL; vice versa
			#$function_propic__rotate = 180; //optional, default: 0
		include('#function-image-processing.php');
		$function_ratings_int['grey_star'] = '<img src="'.$function_propic.'">';
		$function_ratings_int['grey_star_row'] = $function_ratings_int['grey_star'].$function_ratings_int['grey_star'].$function_ratings_int['grey_star'].$function_ratings_int['grey_star'].$function_ratings_int['grey_star'];
    }
    #function-image-processing (close)
    
}
#general preparation and definitions (close)

#content (open)
if(1==1){
    
    #personal-pages, img, title (open)
    if(1==1){
		
		#function-personal-pages.php (open)
		if($function_ratings_int['version'] == "full page"){
			$function_pers_pages_id = 1;
			$function_pers_pages_active_page = "My ratings";
			include("#function-personal-pages.php");
			$function_ratings .= $function_pers_pages;
		}
		#function-personal-pages.php (close)
		
		#img + title + text (open)
		if($function_ratings_int['version'] == "full page"){
			
			#function-image-processing (open)
			if(1==1){
			#thematic only
				$function_propic__type = "thematic";
				$function_propic__original_img_name = "rating.jpg";
			#all
				$function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
			include('#function-image-processing.php');
			}
			#function-image-processing (close)
			
			$function_ratings .= '
			<div style="height:230px;">
			<img
				src="'.$function_propic.'"
				class="voluno_header_picture voluno_brighter_on_hover"
			>
			<div style="text-align:center;margin:40px 0px;">
				<h1 style="display:inline;">
				My ratings
				</h1>
			</div>
			<p>
				#dome Silent sir say desire fat him letter. Whatever settling goodness too and
				honoured she building answered her. Strongly thoughts remember mr to do
				consider debating. Spirits musical behaved on we he farther letters.
				Repulsive he he as deficient newspaper dashwoods we.
			</p>
			</div>';
			
		}
		#img + title + text(close)
		
		#function-personal-pages.php (open)
		if(1==1){
			if($function_ratings_int['version'] == "full page"){
				$function_pers_pages_id = 4;
				include("#function-personal-pages.php");
				$function_ratings .= $function_pers_pages;
			}
			
			if($function_pers_pages_active_page == 1 OR $function_ratings_int['version'] != "full page"){
				$function_ratings_int['status_array'] = array("pending");
				$function_ratings_int['status'] = "unsubmitted";
			}else{
				$function_ratings_int['status_array'] = array("completed","expired");
				$function_ratings_int['status'] = "submitted";
			}
		}
		#function-personal-pages.php (close)
		
    }
    #personal-pages, img, title (close)
    
    #item list (open)
    for($aah=0;$aah<min(count($function_ratings_int['results']),100);$aah++){
		
		#check item status (open)
		if(in_array($function_ratings_int['results'][$aah]->rating_status,$function_ratings_int['status_array'])){
			
			#tasks (open)
			if($function_ratings_int['results'][$aah]->rating_type_general == "task"){
				
				#mysql (open)
				if(1==1){
					
					$function_ratings_int['task_query'] = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_items_tasks
								WHERE task_id = %d;'
								,$function_ratings_int['results'][$aah]->rating_type_general_id);
					$function_ratings_int['task_row'] = $GLOBALS['wpdb']->get_row($function_ratings_int['task_query']);
					
				}
				#mysql (close)
				
				#level 2: question group (open)
				if(1==1){
					
					#item (open)
					if(1==1){
						
						#function-image-processing (open)
						if(empty($function_ratings_int['task_img_only_once'])){
							$function_ratings_int['task_img_only_once'] = 1;
							#thematic only
							  $function_propic__type = "thematic";
							  $function_propic__cropping = "yes";
							  $function_propic__original_img_name = "tasks.jpg";
						   #all
							 $function_propic__geometry = array($function_ratings_int['img_size'],$function_ratings_int['img_size']); //optional, if e.g. only width: 300, NULL; vice versa
						   include('#function-image-processing.php');
						   $function_ratings_int['task_img'] = $function_propic;
						}
						#function-image-processing (close)
						
					}
					#item (close)
					
					#author (open)
					if(1==1){
						
						#function-image-processing (open)
						if(1==1){
							#profile picture
							$function_propic__type = "profile picture";
							$function_propic__user_id = $function_ratings_int['task_row']->task_author_id;
							#all
							$function_propic__geometry = array($function_ratings_int['img_size'],$function_ratings_int['img_size']); //optional, if e.g. only width: 300, NULL; vice versa
							include('#function-image-processing.php');
							$function_ratings_int['author_img'] = $function_propic;
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
								
								$function_profileLink['id'] = $function_ratings_int['task_row']->task_author_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
								$function_ratings_int['author__link'] = $function_profileLink['link'];
								$function_ratings_int['author__name_link'] = $function_profileLink['name_link'];
								$function_ratings_int['author__link_title'] = $function_profileLink['link_title'];
								
							}
							#output (close)
							
						}
						#function-profile-link.php (v1.0) (close)
						
					}
					#author (close)
					
					#ngo (open)
					if(1==1){
						
						#function-image-processing (open)
						if(1==1){
							#ngo logo
							$function_propic__type = "ngo logo";
							$function_propic__ngo_id = $function_ratings_int['task_row']->task_ngo_id;
							#all
							$function_propic__geometry = array($function_ratings_int['img_size'],$function_ratings_int['img_size']); //optional, if e.g. only width: 300, NULL; vice versa
							include('#function-image-processing.php');
							$function_ratings_int['ngo_img'] = $function_propic;
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
								
								$function_profileLink['id'] = $function_ratings_int['task_row']->task_ngo_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
								
								$function_ratings_int['ngo__link'] = $function_profileLink['link'];
								$function_ratings_int['ngo__name_link'] = $function_profileLink['name_link'];
								$function_ratings_int['ngo__link_title'] = $function_profileLink['link_title'];
								
							}
							#output (close)
							
						}
						#function-profile-link.php (v1.0) (close)
						
					}
					#ngo (close)
					
				}
				#level 2: question group (close)
				
				#level 1: overall rating div content (open)
				if(1==1){
					
					#title (open)
					if(1==1){
						
						$function_ratings_int['item_specific_pretitle'] = 'Task';
						$function_ratings_int['item_specific_title'] = $function_ratings_int['task_row']->task_name;
						
					}
					#title (close)
					
					#content (open)
					if(1==1){
						unset($function_ratings_int['div_content_array']);
						$function_ratings_int['div_content_array']
						= array(
							
							array(
								'title' => 'Rate the task itself',
								'img_src' => $function_ratings_int['task_img'],
								'questions' => 'item',
								'class' => 'function_ratings_div_div_img',
								'img_link' => get_permalink(688).'?type=task&id='.$function_ratings_int['results'][$aah]->rating_type_general_id,
								'img_link_title' => "View task page"
								),
							
							array(
								'title' => 'Rate the task author:<br>'.$function_ratings_int['author__name_link'],
								'img_src' => $function_ratings_int['author_img'],
								'questions' => 'user',
								'class' => 'function_ratings_div_div_img',
								'img_link' => $function_ratings_int['author__link'],
								'img_link_title' => $function_ratings_int['author__link_title']
								),
							
							array(
								'title' => 'Rate the development organization:<br>'.$function_ratings_int['ngo__name_link'],
								'img_src' => $function_ratings_int['ngo_img'],
								'questions' => 'ngo',
								'class' => 'function_ratings_div_div_img_ngo',
								'img_link' => $function_ratings_int['ngo__link'],
								'img_link_title' => $function_ratings_int['ngo__link_title']
								)
								
						);
					}
					#content (close)
					
				}
				#level 1: overall rating div content (close)
				
			}
			#tasks (close)
			
			#general content (open)
			if(1==1){
				
				#item div open (open)
				if($function_ratings_int['version'] == "full page"){
					//show the div for each item only in the ratings page, since otherwise there's only one item and it's already
					//in a div
					$function_ratings .= '
					<div class="function_ratings_div">';
				}
				#item div open (close)
					
					$function_ratings .= '
					<form action="'.$function_ratings_int['url'].'" method="post" class="function_ratings_submit_form" autocomplete="off">
					<input type="hidden" name="function_ratings__rating_id" value="'.$function_ratings_int['results'][$aah]->rating_id.'">';
					
					#title (open)
					if($function_ratings_int['version'] == "full page"){
						
						$function_ratings .= '
						<h3 style="display:inline;">
						'.$function_ratings_int['item_specific_pretitle'].':
						<a class="function_ratings_div_title" style="cursor:pointer;">
							"'.$function_ratings_int['item_specific_title'].'"
						</a>
						</h3>';
						
					}
					#title (close)
					
					$function_ratings .= '
					<div class="function_ratings_div_content" style="text-align:center;">';
						
						#loop (open)
						for($aba=0;$aba<count($function_ratings_int['div_content_array']);$aba++){
							
							#processing of individual questions to question groups (open)
							if(1==1){
								
								unset($function_ratings_int['questions_processed']);
								$function_ratings_int['questions_subgroup_array'] = $function_ratings_int['div_content_array'][$aba]['questions'];
								$function_ratings_int['questions_array_query'] = $GLOBALS['wpdb']->prepare('SELECT *
												FROM fi4l3fg_voluno_lists_rating_type
												WHERE ratingtype_specific = %s
												ORDER BY ratingtype_order ASC;'
												,$function_ratings_int['questions_subgroup_array']);
								
								$function_ratings_int['questions_subgroup_array'] = $GLOBALS['wpdb']->get_results($function_ratings_int['questions_array_query']);
								
								#loop (open)
								for($aaz=0;$aaz<count($function_ratings_int['questions_subgroup_array']);$aaz++){
									
									#general preparation (open)
									if(1==1){
										
										#function-help-word.php (open)
										if(1==1){
											
											$function_ratings_int['question_explanation'] = $function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_question_explanation;
											$function_ratings_int['question_explanation'] = str_replace('yellow_star_row',$function_ratings_int['yellow_star_row'],$function_ratings_int['question_explanation']);
											$function_ratings_int['question_explanation'] = str_replace('grey_star_row',$function_ratings_int['grey_star_row'],$function_ratings_int['question_explanation']);
											
											$function_help_word_hover_link = '(more details)';
											$function_help_word_help_content = '<p>'.$function_ratings_int['question_explanation'].'</p>';
											$function_help_word_margin = "margin-left:-100px;"; //default empty, add full css line in there, including ";".
											$function_help_word_width = "800px"; //optional, 500px is default, if only number it is transfomed to %, to phase out.
											$function_help_word_variable_only = "yes"; //default no or empty, if yes the output is saved in variable: $function_help_word
											include('#function-help-word.php');
										}
										#function-help-word.php (close)
										
										#margin between questions (open)
										if($aaz == 0){
											$function_ratings_int['margin_between_questions'] = 0;
										}else{
											$function_ratings_int['margin_between_questions'] = 60;
										}
										#margin between questions (close)
										
									}
									#general preparation (close)
									
									#general content (open)
									if(1==1){
										$function_ratings_int['questions_processed'] .= '
										<div>
										<div style="margin-top:'.$function_ratings_int['margin_between_questions'].'px;">
											<strong>
											'.$function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_name.':
											</strong>
											'.$function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_question.'
											<br>
											'.$function_help_word.'
										</div>';
										
										#star rating (open)
										if($function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_question_type == "star rating"){
											
											#preparation (open)
											if(1==1){
												
												#function-image-processing (open)
												if(1==1){
													
													#thematic only
													$function_propic__type = "thematic";
													$function_propic__original_img_name = "star-yellow.png";
													#all
													$function_propic__geometry = array($function_ratings_int['star_size'],$function_ratings_int['star_size']); //optional, if e.g. only width: 300, NULL; vice versa
													#$function_propic__rotate = 180; //optional, default: 0
													include('#function-image-processing.php');
													$function_ratings_int['yellow_star'] = $function_propic;
													
													#thematic only
													$function_propic__type = "thematic";
													$function_propic__original_img_name = "star-grey.png";
													#all
													$function_propic__geometry = array($function_ratings_int['star_size'],$function_ratings_int['star_size']); //optional, if e.g. only width: 300, NULL; vice versa
													#$function_propic__rotate = 180; //optional, default: 0
													include('#function-image-processing.php');
													$function_ratings_int['grey_star'] = $function_propic;
													
													#thematic only
													$function_propic__type = "thematic";
													$function_propic__original_img_name = "star-white.png";
													#all
													$function_propic__geometry = array($function_ratings_int['star_size'],$function_ratings_int['star_size']); //optional, if e.g. only width: 300, NULL; vice versa
													#$function_propic__rotate = 180; //optional, default: 0
													include('#function-image-processing.php');
													$function_ratings_int['white_star'] = $function_propic;
													
													#thematic only
													$function_propic__type = "thematic";
													$function_propic__original_img_name = "star-invisible.png";
													#all
													$function_propic__geometry = array($function_ratings_int['star_size'],$function_ratings_int['star_size']); //optional, if e.g. only width: 300, NULL; vice versa
													#$function_propic__rotate = 180; //optional, default: 0
													include('#function-image-processing.php');
													$function_ratings_int['empty_star'] = $function_propic;
													
												}
												#function-image-processing (close)
												
											}
											#perparation (close)
											
											$function_ratings_int['questions_processed'] .= '
											<div
											class="star_rating_container"
											style="
												cursor:pointer;
												vertical-align:middle;
												margin:0px;
												padding:0px;
											"
											>';
											
											$function_ratings_int['star_rating_text_array'] = array_reverse(explode(";",$function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_question_type_details));
											
											#star fields (open)
											if(1==1){
												
												#yellow (open)
												if(1==1){
												$function_ratings_int['questions_processed'] .= '
												<div style="position:absolute;z-index:3;opacity:0;">
													<img
													src="'.$function_ratings_int['empty_star'].'"
													style="width:10px;height:'.$function_ratings_int['star_size'].'px;"
													class="yellow_star"
													title="0 Stars - '.$function_ratings_int['star_rating_text_array'][0].'"
													>';
													for($agi=0;$agi<5;$agi++){
													
													#plural_s (close)
													if($agi == 1){
														unset($function_ratings_int['plural_s']);
													}else{
														$function_ratings_int['plural_s'] = "s";
													}
													#plural_s (open)
													
													$function_ratings_int['questions_processed'] .= 
													'<img
														src="'.$function_ratings_int['yellow_star'].'"
														class="yellow_star"
														title="'.($agi+1).' Star'.$function_ratings_int['plural_s'].
														' - '.$function_ratings_int['star_rating_text_array'][$agi+1].'"
													>';
													}
													$function_ratings_int['questions_processed'] .= '
												</div>';
												}
												#yellow (close)
												
												#white (open)
												if(1==1){
												$function_ratings_int['questions_processed'] .= '
												<div style="position:absolute;opacity:0;z-index:2;">
													<img
													src="'.$function_ratings_int['empty_star'].'"
													style="width:10px;height:'.$function_ratings_int['star_size'].'px;"
													>';
													for($agi=0;$agi<5;$agi++){
													$function_ratings_int['questions_processed'] .= 
													'<img
														src="'.$function_ratings_int['white_star'].'"
														class="white_star"
													>';
													}
													$function_ratings_int['questions_processed'] .= '
												</div>';
												}
												#white (close)
												
												#grey (open)
												if(1==1){
												$function_ratings_int['questions_processed'] .= '
												<div
													style="position:absolute;"
													class="grey_stars"
												>
													<img
													src="'.$function_ratings_int['empty_star'].'"
													style="width:10px;height:'.$function_ratings_int['star_size'].'px;"
													>';
													for($agi=0;$agi<5;$agi++){
													$function_ratings_int['questions_processed'] .= 
													'<img src="'.$function_ratings_int['grey_star'].'">';
													}
													$function_ratings_int['questions_processed'] .= '
												</div>';
												}
												#grey (close)
												
												#grey (hidden) (open)
												if(1==1){
												$function_ratings_int['questions_processed'] .= '
												<div
													style="
													display:inline-block;
													visibility:hidden;
													margin:0px '.$function_ratings_int['star_size'].'px 0px 0px;
													padding:0px;
													"
												>
													<img src="'.$function_ratings_int['empty_star'].'" style="width:10px;height:'.$function_ratings_int['star_size'].'px;">';
													for($agi=0;$agi<5;$agi++){
													$function_ratings_int['questions_processed'] .= 
													'<img src="'.$function_ratings_int['grey_star'].'">';
													}
													$function_ratings_int['questions_processed'] .= '
												</div>';
												}
												#grey (hidden) (close)
												
											}
											#star fields (close)
											
											#form fields (open)
											if(1==1){
												
												$function_ratings_int['classname'] = $function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_class_msql_name;
												
												$function_ratings_int['questions_processed'] .= '
												<input
												type="hidden"
												class="'.$function_ratings_int['classname'].'_class"
												name="function_ratings__rating_item_name[]"
												value="'.$function_ratings_int['classname'].'"
												>
												<select
												class="star_rating_select"
												name="function_ratings__rating_item_value[]"
												>
												<option selected value="none">
													- Please select -
												</option>';
												
												#each star (open)
												for($agi=5;$agi>=0;$agi--){
													
													#$function_ratings_int['plural_s'] (open)
													if($agi == 1){
													$function_ratings_int['plural_s'] = '&thinsp;&nbsp;';
													}else{
													$function_ratings_int['plural_s'] = "s";
													}
													#$function_ratings_int['plural_s'] (close)
													
													$function_ratings_int['questions_processed'] .= '
													<option value="'.$agi.'">
													'.$agi.' Star'.$function_ratings_int['plural_s'].' - '.$function_ratings_int['star_rating_text_array'][$agi].'
													</option>';
												}
												#each star (close)
												
												$function_ratings_int['questions_processed'] .= '
												</select>';
											}
											#form fields (close)
											
											$function_ratings_int['questions_processed'] .= '
											</div>';
											
										}
										#star rating (close)
										
										#duration (open)
										if($function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_question_type == "duration"){
											
											$function_ratings_int['questions_processed'] .= '
											<div
											class="star_rating_container"
											style="cursor:pointer;vertical-align:middle;"
											>';
											
											$function_ratings_duration_array
											= explode(
												";",
												$function_ratings_int['questions_subgroup_array']
												[$aaz]->ratingtype_question_type_details
											);
											
											#star fields (open) stevesteve
											if(21==1){
												$function_ratings_int['questions_processed'] .= '
												<div style="position:absolute;z-index:3;opacity:0;">
												<img
													src="'.$function_ratings_int['empty_star'].'"
													style="width:10px;height:'.$function_ratings_int['star_size'].'px;"
													class="yellow_star"
													title="0 Stars - '.$function_ratings_int['star_rating_text_array'][0].'"
												>';
												for($agi=0;$agi<5;$agi++){
													if($agi == 1){
													unset($function_ratings_int['plural_s']);
													}else{
													$function_ratings_int['plural_s'] = "s";
													}
													$function_ratings_int['questions_processed'] .= 
													'<img
													src="'.$function_ratings_int['yellow_star'].'"
													class="yellow_star"
													title="'.($agi+1).' Star'.$function_ratings_int['plural_s'].
														' - '.$function_ratings_int['star_rating_text_array'][$agi+1].'"
													>';
												}
												$function_ratings_int['questions_processed'] .= '
												</div>
												<div style="position:absolute;opacity:0;">
												<img
													src="'.$function_ratings_int['empty_star'].'"
													style="width:10px;height:'.$function_ratings_int['star_size'].'px;"
												>';
												for($agi=0;$agi<5;$agi++){
													$function_ratings_int['questions_processed'] .= 
													'<img
													src="'.$function_ratings_int['white_star'].'"
													class="white_star"
													>';
												}
												$function_ratings_int['questions_processed'] .= '
												</div>
												<div style="display:inline-block;vertical-align:middle;margin-right:'.$function_ratings_int['star_size'].'px;">
												<img src="'.$function_ratings_int['empty_star'].'" style="width:10px;height:'.$function_ratings_int['star_size'].'px;">';
												for($agi=0;$agi<5;$agi++){
													$function_ratings_int['questions_processed'] .= 
													'<img src="'.$function_ratings_int['grey_star'].'">';
												}
												$function_ratings_int['questions_processed'] .= '
												</div>';
											}
											#star fields (close)
											
											#form fields (open)
											if(1==1){
												
												$function_ratings_int['classname']
												= $function_ratings_int['questions_subgroup_array'][$aaz]->ratingtype_class_msql_name;
												
												$function_ratings_int['questions_processed'] .= '
												<input
												type="hidden"
												class="'.$function_ratings_int['classname'].'_class"
												name="function_ratings__rating_item_name[]"
												value="'.$function_ratings_int['classname'].'"
												>
												<div style="text-align:center;">
												<select
													class="star_rating_select"
													name="function_ratings__rating_item_value[]"
												>
													<option selected value="none">
													- Please select -
													</option>';
													
													#select options loop (open)
													for($abb=0;$abb<count($function_ratings_duration_array);$abb++){
														
														#function-minutes-into-nice-format (open)
														if(1==1){
															$function_minutes_into_nice_format
															= $function_ratings_duration_array[$abb];
															$function_minutes_into_nice_format_long = "yes"; //default: no/empty
															include('#function-minutes-into-nice-format.php');
															#output: $function_minutes_into_nice_format
														}
														#function-minutes-into-nice-format (close)
														
														$function_ratings_int['questions_processed'] .= '
														<option value="'.$function_ratings_duration_array[$abb].'">
															'.$function_minutes_into_nice_format.'
														</option>';
													}
													#select options loop (close)
													
												$function_ratings_int['questions_processed'] .= '
												</select>
												</div>';
											}
											#form fields (close)
											
											$function_ratings_int['questions_processed'] .= '
											</div>';
											
										}
										#duration (close)
										
										$function_ratings_int['questions_processed'] .= '
										</div>';
									}
									#general content (close)
									
								}
								#loop (close)
								
							}
							#processing of individual questions to question groups (close)
							
							#link (open)
							if(!empty($function_ratings_int['div_content_array'][$aba]['img_link'])){
								$function_ratings_int['img_link_open'] = '
								<a
									href="'.$function_ratings_int['div_content_array'][$aba]['img_link'].'"
									title="'.$function_ratings_int['div_content_array'][$aba]['img_link_title'].'"
								>';
								$function_ratings_int['img_link_close'] = '</a>';
							}else{
								unset($function_ratings_int['img_link_open']);
								unset($function_ratings_int['img_link_close']);
							}
							#link (close)
							
							$function_ratings .= '
							<div class="function_ratings_div_div">
								<table>
								<tr>
									<td style="font-weight:bold;text-align:center;">
									'.$function_ratings_int['img_link_open'].'
										<img
										src="'.$function_ratings_int['div_content_array'][$aba]['img_src'].'"
										class="'.$function_ratings_int['div_content_array'][$aba]['class'].' voluno_brighter_on_hover"
										>
									'.$function_ratings_int['img_link_close'].'
									<br><br>
									'.$function_ratings_int['div_content_array'][$aba]['title'].'
									</td>
									<td style="padding-left:20px;">
									'.$function_ratings_int['questions_processed'].'
									</td>
								</tr>
								</table>
							</div>';
							
						}
						#loop (open)
						
						$function_ratings .= '
						<div class="voluno_button function_ratings_submit_rating" style="display:inline-block;">
						Submit rating for this item
						</div>
					</div>
					</form>';
					
				#item div close (open)
				if($function_ratings_int['version'] == "full page"){ //see above explanation where the div opens
					$function_ratings .= '
					</div>';
				}
				#item div close (close)
				
			}
			#general content (close)
			
		}
		#check item status (close)
		
    }
    #item list (close)
    
    #if no items available (open)
    if(1==1){
		
		if($function_ratings_int['status'] == "unsubmitted"){
			$function_ratings_int['empty_check_query_text'] = 'SELECT *
								FROM fi4l3fg_voluno_ratings
								WHERE rating_user_id = %s
									AND rating_status IN ("pending")
								ORDER BY rating_date_created DESC;';
		}elseif($function_ratings_int['status'] == "submitted"){
			$function_ratings_int['empty_check_query_text'] = 'SELECT *
								FROM fi4l3fg_voluno_ratings
								WHERE rating_user_id = %s
									AND rating_status IN ("completed")
								ORDER BY rating_date_created DESC;';
		}
		
		$function_ratings_empty_check_query = $GLOBALS['wpdb']->prepare($function_ratings_int['empty_check_query_text'],$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
		$function_ratings_int['empty_check_results'] = $GLOBALS['wpdb']->get_results($function_ratings_empty_check_query);
		
		#
		if(empty($function_ratings_int['empty_check_results'])){
			$function_ratings .= '
			<div style="margin:50px auto;text-align:center;">';
				
				#unsubmitted (open)
				if($function_ratings_int['status'] == "unsubmitted"){
					$function_ratings .= '
					<h4 style="display:inline;">
					You currently don\'t have any items open for rating.
					</h4>
					<br>
					<div style="margin:20px auto;width:30%;">
					<p>
						We will notify you, as soon as there are items to rate.
						<br>
						In the meantime, we are always happy to get your feedback
						via
						<strong>
						<a href="mailto:'.antispambot("info@voluno.org").'?Subject=Feedback">'.
							antispambot("info@voluno.org").
						'</a>
						</strong>'.
						' or via our '.
						'<b>
						<a href="'.get_permalink(638).'">'.
							'contact form'.
						'</a>'.
						'</b>.
					</p>
					</div>';
				}
				#unsubmitted (close)
				
				#submitted (open)
				else{
					$function_ratings .= '
					<h4 style="display:inline;">
					You haven\'t rated any items yet.
					</h4>';
				}
				#submitted (close)
				
				$function_ratings .= '
				</h4>
			</div>';
		}
		#
		
    }
    #if no items available (close)
    
    if($function_ratings_int['version'] == "full page"){
		echo $function_ratings;
    }
    
}
#content (close)

unset($function_ratings_int);

?>