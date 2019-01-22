<?php

    #main page section (open)
    if(empty($page_section)){
	
	#decision: item or task (open)
	if(1==1){
	    
	    $get_id = $_GET['id'];
	    $get_type = $_GET['type'];
	    
	    if(empty($get_type) AND empty($get_id)){
		$is_it_an_item_or_work_center_check = "work center";
	    }else{
		$is_it_an_item_or_work_center_check = "item";
	    }
	    
	}
	#decision: item or task (close)
	
	#item (open)
	if($is_it_an_item_or_work_center_check == "item"){
	    
	    #what item? (task, advice, training, etc) (open)
	    if(in_array($get_type,array("task","training","advice","internship"))){
		
		$page_section = "item ".$get_type;
		include('members-net-work-center.php');
		
	    }
	    #what item? (task, advice, training, etc) (close)
	    
	    #nothing of the selected
	    else{
		$general_error = "invalid item type";
	    }
	    #nothing of the selected
	    
	    #item errors
	    if(!empty($general_error)){
		
		#item error opening (open)
		if(1==1){
		    echo '
		    <div style="text-align:center;">
			<h1>
			    Error
			</h1>';
		}
		#item error opening (close)
		    
		    #invalid item type (open)
		    if($general_error == "invalid item type"){
			echo '
			Unexpected item type. Please check url.';
		    }
		    #invalid item type (close)
		    
		#item error closing (open)
		if(1==1){
		    #function-if-problem-persits-contact-us.php
			include('#function-if-problem-persits-contact-us.php');
		    echo '
		    <br>
		    <br>
		    '.$function_if_problem_persits_contact_us.'
		    </div>';
		}
		#item error closing (close)
		
	    }
	    #item errors
	    
	}
	#item (close)
	
	#work center (open)
	elseif($is_it_an_item_or_work_center_check == "work center"){
	    
	    #mysql (open)
	    if(1==1){
			
			#update data: selected position (open)
			if(!empty($_GET['is_positions_selected_row']) AND is_numeric($_GET['is_positions_selected_row'])){
				$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_personal_settings',
					array( //location of row to delete
					  'pers_settings_specific' => 'selected_position',
					  'pers_settings_general' => 'work center',
					  'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
					),
					array( //format of location of row to delete
					  '%s','%s','%s'
					));
				
				$GLOBALS['wpdb']->insert( 
						'fi4l3fg_voluno_personal_settings', 
					array(
						'pers_settings_specific' => 'selected_position',
						'pers_settings_general' => 'work center',
						'pers_settings_value' => $_GET['is_positions_selected_row'],
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
					),
					array( 
						'%s','%s','%d','%s'
					));
			}
			#update data: selected position (close)
			
			#get data (open)
			if(1==1){
				
				#get all of my positions and the currently selected section (open)
				if(1==1){
					
					$my_positions_query = $GLOBALS['wpdb']->prepare('SELECT * 
										FROM fi4l3fg_voluno_applications
											LEFT JOIN fi4l3fg_voluno_positions
											ON application_type_id = position_id
										WHERE application_type_general = "position"
											AND application_user_id = %s
											AND application_status = "accepted"
										GROUP BY position_name
										ORDER BY position_order;'
										,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
					$my_positions_results = $GLOBALS['wpdb']->get_results($my_positions_query);
					
					foreach($my_positions_results as $my_positions_row){
						$my_positions_id_array[] = $my_positions_row->position_id;
					}
					
				}
				#get all of my positions and the currently selected section (close)
				
				#get selected position and validate (general error if invalid) (open)
				if(1==1){
					
					#mysql query (open)
					if(1==1){
						$get_selected_work_center_section_query = $GLOBALS['wpdb']->prepare('SELECT *
										 FROM fi4l3fg_voluno_personal_settings
										 WHERE pers_settings_general = "work center"
											AND pers_settings_specific = "selected_position"
											AND pers_settings_user_id = %s;'
										 ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
						$get_selected_work_center_section_row = $GLOBALS['wpdb']->get_row($get_selected_work_center_section_query);
						$selected_work_center_section = $get_selected_work_center_section_row->pers_settings_value;
					}
					#mysql query (close)
					
					#no position yet (open)
					if(empty($my_positions_results)){
						$selected_work_center_section = "member hasn't got any position yet";
					}
					#no position yet (close)
					
					#user only has one position (open)
					elseif(count($my_positions_results) == 1){
						$selected_work_center_section = $my_positions_id_array[0];
					}
					#user only has one position (close)
					
					#no position selected yet or position invalid (open)
					elseif(empty($selected_work_center_section) OR !in_array($selected_work_center_section,$my_positions_id_array)){
						$selected_work_center_section = $my_positions_id_array[0];
					}
					#no position selected yet or position invalid (open)
					
				}
				#get selected position and validate (general error if invalid) (close)
				
			}
			#get data (close)
			
	    }
	    #mysql(open)
	    
	    #jquery (open)
	    if(1==1){
		echo '
		<script>
		    jQuery(document).ready(function(){';
		    
			#work center section selection (open)
			if(1==1){
			    echo '
			    jQuery(".position_not_selected").css("filter", "grayscale(1)");
			    jQuery(".position_not_selected").css("-webkit-filter", "grayscale(1)");
			    jQuery(".position_not_selected").css("filter", "gray");
			    jQuery(this).css("background-color","#aaa");
			    jQuery(".position_not_selected").hover(function(){
				jQuery(this).css("opacity","1");
				jQuery(this).css("filter","");
				jQuery(this).css("-webkit-filter","");
				jQuery(this).css("background-color",jQuery(this).find(".position_color").html());
			    },function(){
				jQuery(this).css("opacity","0.4");
				jQuery(this).css("filter","grayscale(1)");
				jQuery(this).css("-webkit-filter","grayscale(1)");
				jQuery(this).css("filter","gray");
				jQuery(this).css("background-color","#aaa");
			    });';
			}
			#work center section selection (close)
			
		    echo '
		    });
		</script>';
	    }
	    #jquery (close)
	    
	    #content (open)
	    if(1==1){
		
		#header (img and title) (open)
		if(1==1){
		    
		    #function-image-processing
			#thematic only
			  $function_propic__type = "thematic";
			  $function_propic__original_img_name = "work-center.jpg";
		       #all
			 $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
		       include('#function-image-processing.php');
		       
		    echo '
		    <img src="'.$function_propic.'" class="voluno_header_picture">
		    <div style="text-align:center;">
			<h1 style="display:inline;">
			    Work Center
			</h1>
		    </div>';
		}
		#header (img and title) (close)
		
		#select work center section menu (open)
		if($selected_work_center_section != "member hasn't got any position yet"){
		    
		    #if more than one, you can select (open)
		    if(count($my_positions_results)>1){
			echo '
			<br>
			Click on the tiles below to select a Work Center section:
			<br>
			<br>';
		    }
		    #if more than one, you can select (close)
		    
		    #selected styling table settings (open)
		    if(1==1){
			$select_position_tr_count = 0;
			$selected_positions_num_of_tr = 1;
			$select_position_tr_width = 139; //px
			if(count($my_positions_results) <= 4){
			    $select_position_num_per_tr = count($my_positions_results);
			}elseif(count($my_positions_results) <= 6){
			    $select_position_num_per_tr = 3;
			}else{
			    $select_position_num_per_tr = 4;
			}
		    }
		    #selected styling table settings (close)
		    
		    echo '
		    <table style="width:'.(($select_position_tr_width+10)*$select_position_num_per_tr).'px;">
			<tr>';
			
			$select_position_td_width = 100 / count($my_positions_results);
			for($x=0;$x<count($my_positions_results);$x++){
			    
				#tr mechanism (open)
				if(1==1){
				    if($select_position_tr_count == $select_position_num_per_tr){
					$select_position_tr_count = 0;
					echo '
					</tr>
					<tr>';
					$selected_positions_num_of_tr++;
				    }
				    $select_position_tr_count++;
				}
				#tr mechanism (close)
				
				#selected styling (open)
				if($selected_work_center_section == $my_positions_results[$x]->position_id){
				    $my_positions_row_color = $my_positions_results[$x]->position_color;
				    $select_position_div_class = "voluno_brighter_on_hover";
				    $select_position_div_opacity = "";
				}else{
				    $my_positions_row_color = "aaa";
				    $select_position_div_class = "position_not_selected";
				    $select_position_div_opacity = 0.4;
				}
				#selected styling (close)
				
				#td (open)
				if(1==1){
				    echo '
				    <td style="width:'.$select_position_tr_width.'px;padding:5px;">';
					if($selected_work_center_section != $my_positions_results[$x]->position_id){
					    echo '
					    <a
						href="'.get_permalink(688).'?'.
						'is_positions_selected_row='.$my_positions_results[$x]->position_id.'"
						title="Click to switch to this Work Center section"
					    >';
					}else{
					    echo '
					    <a title="Current Work Center section">';
					}
					    echo '
					    <div
						class="'.$select_position_div_class.'"
						style="
						    opacity:'.$select_position_div_opacity.';
						    border-radius:15px;
						    padding:1px;
						    background-color:#'.$my_positions_row_color.';"
					    >
						<div
						    style="text-align:center;padding-bottom:10px;"
						>
						    <table>
							<tr>
							    <td style="width:1%;">
								<br><br>
							    </td>
							    <td style="vertical-align:middle;text-align:center;">
								<h7 style="display:inline;font-weight:bold;color:#fff;">
								    '.$my_positions_results[$x]->position_name.'\' section
								</h7>
							    </td>
							    <td style="width:1%;">
							    </td>
							</tr>
						    </table>';
						    #function-image-processing
							#thematic only
							  $function_propic__type = "thematic";
							  $function_propic__original_img_name = $my_positions_results[$x]->position_img_name;
						       #all
							 $function_propic__geometry = array(($select_position_tr_width-20),NULL);
							 include('#function-image-processing.php');
						    echo '
						    <img style="border-radius:15px;" src="'.$function_propic.'">
						    <span class="position_color" style="display:none">
							#'.$my_positions_results[$x]->position_color.'
						    </span>
						</div>
					    </div>
					</a>
				    </td>';
				}
				#td (close)
				
			    }
			    echo '
			</tr>
		    </table>';
		    if($selected_positions_num_of_tr == 1){
			echo '
			<br>
			<br>
			';
		    }
		    
		}else{
		    echo '
		    <p>
			<br>
			Welcome!
			<br>
			<br>
			To use the Work Center, you need to have selected at least one position.
			<br>
			<br>
			Please click
			<a title="Visit &quot;My positions&quot; menu" href="'.get_permalink(756).'">
			    here
			</a>
			to select your first position.
		    </p>
		    ';
		}
		#select work center section menu (close)
		
		#work center section contents (open)
		if(1==1){
		    
		    #volunteer section (open)
		    if($selected_work_center_section == 1){
			
			#get subpage section (open) #modified
			if(1==1){
			    
			    #function-personal-pages.php (open) #modified
			    if(1==1){
				$function_pers_pages_id = 3;
				include("#function-personal-pages.php");
				echo $function_pers_pages;
				
				/*if($function_pers_pages_active_page == 1){
				    $page_subsection = "overview";
				}else*/if($function_pers_pages_active_page == 1){#2){
				    $page_subsection = "current";
				}elseif($function_pers_pages_active_page == 2){#3){
				    $page_subsection = "new";
				}elseif($function_pers_pages_active_page == 3){#4){
				    $page_subsection = "past";
				}
			    }
			    #function-personal-pages.php (close) #modified
			    
			}
			#get subpage section (close) #modified
			
			#get subpage section (open) #original
			if(1==2){
			    
			    #function-personal-pages.php (open)
			    if(1==1){
				$function_pers_pages_id = 3;
				include("#function-personal-pages.php");
				echo $function_pers_pages;
				
				if($function_pers_pages_active_page == 1){
				    $page_subsection = "overview";
				}elseif($function_pers_pages_active_page == 2){
				    $page_subsection = "current";
				}elseif($function_pers_pages_active_page == 3){
				    $page_subsection = "new";
				}elseif($function_pers_pages_active_page == 4){
				    $page_subsection = "past";
				}
			    }
			    #function-personal-pages.php (close)
			    
			}
			#get subpage section (close) #original
			
			#overview (open) #modified
			if($page_subsection == "overview" AND 2==1){
			    
			    #mysql (open)
			    if(1==1){
				
				$my_tasks_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_items_tasks'.
								    
								    /*ngo */'
								    LEFT JOIN (
									SELECT *
									FROM fi4l3fg_voluno_applications
									    WHERE application_type_general = "task"
									    AND application_type_specific = "task_application"
									    AND application_user_id = %s
									
									) as aaa_applications
								    ON task_id = application_type_id'.
								    
								'
								WHERE application_status IN ("pending","accepted")
								    AND task_status IN ("unassigned","in progress")
								    GROUP BY task_id;'
								
								,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
				$my_tasks_results = $GLOBALS['wpdb']->get_results($my_tasks_query);
				
			    }
			    #mysql (close)
			    
			    #style (open)
			    if(1==1){
				echo '
				<style>
				    .items_div{
					border-radius:25px;
					background-color:#FFEAB9;
					padding:20px;
					width:400px;
					margin: 20px 0px;
					display:inline-block;
				    }
				    .items_div:hover{
					background-color:#FFD87D;
				    }
				    .items_div_title{
					display:inline;
				    }
				</style>';
			    }
			    #style (close)
			    
			    #item divs (open)
			    if(1==1){
				echo '
				<div style="text-align:justify;">';
				
				#tasks (open)
				if(1==1){
				    
				    #preparation (open)
				    if(1==1){
					
					$array = array("withdrawn", "pending", "accepted", "rejected", "dismissed", "resigned");
					
					for($aaj=0;$aaj<count($my_tasks_results);$aaj++){
					    
					    for($aav=0;$aav<count($array);$aav++){
						if($my_tasks_results[$aaj]->task_status == $array[$aav]){
						    ${'my_tasks_'.$array[$aav]}[] = $my_tasks_results[$aaj];
						}
					    }
					    
					}
					
				    }
				    #preparation (close)
				    
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Tasks
					</h4>
					<table>';
					    $sum_my_current_tasks =
						count($my_tasks_drafts)
						+ count($my_tasks_unassigned)
						+ count($my_tasks_in_progress);
					    $sum_my_past_tasks =
						count($my_tasks_completed)
						+ count($my_tasks_cancelled);
					    $statistics_array = array(
						array(  'count'=>$sum_my_current_tasks,       'title'=>"My current",                 'type'=>1 ),
						array(  'count'=>count($my_tasks_pending),    'title'=>"Application pending",        'type'=>0 ),
						array(  'count'=>count($my_tasks_accepted),   'title'=>"Waiting for you to work",    'type'=>0 ),
						array(  'count'=>$sum_my_past_tasks,          'title'=>"My past",                    'type'=>1 ),
						array(  'count'=>count($my_tasks_rejected),  'title'=>"rejected",                  'type'=>0 ),
						array(  'count'=>count($my_tasks_completed),  'title'=>"Dismissed",                  'type'=>0 ),
						array(  'count'=>count($my_tasks_resigned),   'title'=>"Resigned",                  'type'=>0 )
					    );
									    #$array = array("", "", "", "", "", "")
    
					    for($aak=0;$aak<count($statistics_array);$aak++){
						
						#title (open)
						if($statistics_array[$aak]['type'] == 1){
						    echo '
						    <tr style="border-bottom:1px double black;font-weight:bold;">
							<td style="padding-top:15px">
							    '.$statistics_array[$aak]['title'].':
							</td>
							<td style="padding-top:15px">
							    '.$statistics_array[$aak]['count'].'
							</td>
						    </tr>';
						}
						#title (close)
						
						#content (open)
						else{
						    echo '
						    <tr>
							<td>
							    '.$statistics_array[$aak]['title'].':
							</td>
							<td>
							    '.$statistics_array[$aak]['count'].'
							</td>
						    </tr>';
						}
						#content (close)
						
					    }
					    
					echo '
					</table>
				    </div>';
				}
				#tasks (close)
				
				#trainings (open) #modified before it wasn't deactivated
				if(1==1){/*
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Trainings
					</h4>
				    </div>';
				}
				#trainings (close)
				
				#advice (open)
				if(1==1){
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Advice
					</h4>
				    </div>';
				}
				#advice (close)
				
				#trainings (open)
				if(1==1){
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Interns
					</h4>
				    </div>';*/
				}
				#trainings (close) #modified
				
				echo '
				<div style="width:100%;display:inline-block;"></div>
				</div>';
			    }
			    #item divs (close)
			    
			}
			#overview (close) #modified
			
			#current (open)
			if($page_subsection == "current"){
			    
			    $page_section = "work center task my-current volunteer";
			    include('members-net-work-center.php');
			    
			}
			#current (close)
			
			#new (open)
			if($page_subsection == "new"){
			    
			    $page_section = "work center task search-find";
			    include('members-net-work-center.php');
			    
			    $page_section = "work center training search-find";
			    include('members-net-work-center.php');
			    
			    $page_section = "work center internship search-find volunteer";
			    include('members-net-work-center.php');
			    
			}
			#new (close)
			
			#past (open)
			if($page_subsection == "past"){
			    
			    $page_section = "work center task my-past volunteer";
			    include('members-net-work-center.php');
			}
			#past (close)
			
		    }
		    #volunteer section (close)
		    
		    #development worker section (open)
		    elseif($selected_work_center_section == 2){
			
			#get subpage section (open)
			if(1==1){
			    
			    #function-personal-pages.php (open)
			    if(1==1){
				$function_pers_pages_id = 2;
				include("#function-personal-pages.php");
				echo $function_pers_pages;
				
				if($function_pers_pages_active_page == 1){
				    $page_subsection = "overview";
				}elseif($function_pers_pages_active_page == 2){
				    $page_subsection = "current";
				}elseif($function_pers_pages_active_page == 3){
				    $page_subsection = "new";
				}elseif($function_pers_pages_active_page == 4){
				    $page_subsection = "past";
				}
			    }
			    #function-personal-pages.php (close)
			    
			}
			#get subpage section (close)
			
			#overview (open)
			if($page_subsection == "overview"){
			    
			    #mysql (open)
			    if(1==1){
				
				$my_tasks_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_items_tasks'.
								    
								    /*ngo */'
								    LEFT JOIN (
									SELECT *
									FROM fi4l3fg_voluno_development_organizations'.
									
									/*is current user member?*/'
									LEFT JOIN fi4l3fg_voluno_development_organizations_properties
									    ON ngo_id = ngo_prop_ngo_id
									
									) as aaa_ngo
								    ON task_ngo_id = ngo_id'.
								    
								'
								WHERE ngo_prop_type_general = "position"
								    AND ngo_prop_type_specific = "worker"
								    AND ngo_prop_type_status = "accepted"
								    AND ngo_prop_type_id = %s
								    GROUP BY task_id;'
								
								,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
								,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
				$my_tasks_results = $GLOBALS['wpdb']->get_results($my_tasks_query);
				
			    }
			    #mysql (close)
			    
			    #style (open)
			    if(1==1){
				echo '
				<style>
				    .items_div{
					border-radius:25px;
					background-color:#FFEAB9;
					padding:20px;
					width:400px;
					margin: 20px 0px;
					display:inline-block;
				    }
				    .items_div:hover{
					background-color:#FFD87D;
				    }
				    .items_div_title{
					display:inline;
				    }
				</style>';
			    }
			    #style (close)
			    
			    #item divs (open)
			    if(1==1){
				echo '
				<div style="text-align:justify;">';
				
				#tasks (open)
				if(1==1){
				    
				    #preparation (open)
				    if(1==1){
					
					for($aaj=0;$aaj<count($my_tasks_results);$aaj++){
					    
					    #draft
					    if($my_tasks_results[$aaj]->task_status == "draft"){
						$my_tasks_drafts[] = $my_tasks_results[$aaj];
					    }
					    
					    #unassigned
					    if($my_tasks_results[$aaj]->task_status == "unassigned"){
						$my_tasks_unassigned[] = $my_tasks_results[$aaj];
					    }
					    
					    #in progress
					    if($my_tasks_results[$aaj]->task_status == "in progress"){
						$my_tasks_in_progress[] = $my_tasks_results[$aaj];
					    }
					    
					    #completed
					    if($my_tasks_results[$aaj]->task_status == "completed"){
						$my_tasks_completed[] = $my_tasks_results[$aaj];
					    }
					    
					    #cancelled
					    if($my_tasks_results[$aaj]->task_status == "cancelled"){
						$my_tasks_cancelled[] = $my_tasks_results[$aaj];
					    }
					    
					}
					
				    }
				    #preparation (close)
				    
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Tasks
					</h4>
					<table>';
					    $sum_my_current_tasks =
						count($my_tasks_drafts)
						+ count($my_tasks_unassigned)
						+ count($my_tasks_in_progress);
					    $sum_my_past_tasks =
						count($my_tasks_completed)
						+ count($my_tasks_cancelled);
					    $statistics_array = array(
						array(  'count'=>$sum_my_current_tasks,          'title'=>"My current",              'type'=>1 ),
						array(  'count'=>count($my_tasks_drafts),        'title'=>"Drafts",                  'type'=>0 ),
						array(  'count'=>count($my_tasks_unassigned),    'title'=>"Waiting for volunteers",  'type'=>0 ),
						array(  'count'=>count($my_tasks_in_progress),   'title'=>"In progress",             'type'=>0 ),
						array(  'count'=>$sum_my_past_tasks,             'title'=>"My past",                 'type'=>1 ),
						array(  'count'=>count($my_tasks_completed),     'title'=>"Completed",               'type'=>0 ),
						array(  'count'=>count($my_tasks_cancelled),     'title'=>"Cancelled",               'type'=>0 )
					    );
					
					    for($aak=0;$aak<count($statistics_array);$aak++){
						
						#title (open)
						if($statistics_array[$aak]['type'] == 1){
						    echo '
						    <tr style="border-bottom:1px double black;font-weight:bold;">
							<td style="padding-top:15px">
							    '.$statistics_array[$aak]['title'].':
							</td>
							<td style="padding-top:15px">
							    '.$statistics_array[$aak]['count'].'
							</td>
						    </tr>';
						}
						#title (close)
						
						#content (open)
						else{
						    echo '
						    <tr>
							<td>
							    '.$statistics_array[$aak]['title'].':
							</td>
							<td>
							    '.$statistics_array[$aak]['count'].'
							</td>
						    </tr>';
						}
						#content (close)
						
					    }
					    
					echo '
					</table>
				    </div>';
				}
				#tasks (close)
				
				#trainings (open) #modified before it wasn't deactivated
				if(1==1){/*
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Trainings
					</h4>
				    </div>';
				}
				#trainings (close)
				
				#advice (open)
				if(1==1){
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Advice
					</h4>
				    </div>';
				}
				#advice (close)
				
				#trainings (open)
				if(1==1){
				    echo '
				    <div class="items_div">
					<h4 class="items_div_title">
					    Interns
					</h4>
				    </div>';
				*/}
				#trainings (close) #modified
				
				echo '
				<div style="width:100%;display:inline-block;"></div>
				</div>';
			    }
			    #item divs (close)
			    
			}
			#overview (close)
			
			#current (open)
			if($page_subsection == "current"){
			    
			    $page_section = "work center task my-current ngo";
			    include('members-net-work-center.php');
			    
			}
			#current (close)
			
			#new (open)
			if($page_subsection == "new"){
			    
			    echo '
			    <h4><a href="'.get_permalink().'?type=task&id=1">
				Create new task
			    <h4></a>';
			    
			}
			#new (close)
			
			#past (open)
			if($page_subsection == "past"){
			    
			    $page_section = "work center task my-past ngo";
			    include('members-net-work-center.php');
			    
			}
			#past (close)
			
			
		    }
		    #development worker section (close)
		    
		    #agent section (open)
		    elseif($selected_work_center_section == 3){
			
			#clients (open)
			if(1==1){
			    
			    $agent_query = $GLOBALS['wpdb']->prepare('SELECT *
							    FROM fi4l3fg_voluno_applications
							    WHERE application_type_general = "agent"
								AND application_type_id = %s
								AND application_status = "accepted";'
							    ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
			    $agent_query_results = $GLOBALS['wpdb']->get_results($agent_query);
			    
			    #loop (open)
			    for($ahy=0;$ahy<count($agent_query_results);$ahy++){
				
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
						
						$function_profileLink['id'] = $agent_query_results[$ahy]->application_user_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
						
						$user_name_link = $function_profileLink['name_link'];
						
					}
					#output (close)
					
				}
				#function-profile-link.php (v1.0) (close)
				
				#ngos (open)
				if($agent_query_results[$ahy]->application_type_specific == "dw"){
				    $client_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
									FROM fi4l3fg_voluno_development_organizations_properties
									WHERE ngo_prop_type_general = "position"
									    AND ngo_prop_type_specific = "worker"
									    AND ngo_prop_type_status = "accepted"
									    AND ngo_prop_type_id = %s
									;'
									,$agent_query_results[$ahy]->application_user_id);
				    $client_ngos_results = $GLOBALS['wpdb']->get_results($client_ngos_query);
				    
				    unset($client_ngos);
				    for($ahz=0;$ahz<count($client_ngos_results);$ahz++){
					
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
							
							$function_profileLink['id'] = $client_ngos_results[$ahz]->ngo_prop_ngo_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
					
					$client_ngos[] = $function_profileLink['name_link'];
				    }
				    
				}
				#ngos (close)
				
				#execution (open)
				if($agent_query_results[$ahy]->application_type_specific == "volunteer"){
				    $clients_volunteers .= '
				    <li>
					'.$user_name_link.'
				    </li>';
				    
				}elseif($agent_query_results[$ahy]->application_type_specific == "dw"){
				    $clients_dw .= '
				    <li>
					'.$user_name_link.' ('.implode('; ',$client_ngos).')
				    </li>';
				}
				#execution (close)
				
			    }
			    #loop (close)
			    
			    #if empty (open)
			    if(1==1){
				
				$none = '<span style="color:grey;font-style:italic;">None</span>';
				
				if(empty($clients_volunteers)){
				    $clients_volunteers = $none;
				}
				if(empty($clients_dw)){
				    $clients_dw = $none;
				}
				
			    }
			    #if empty (close)
			    
			}
			#clients (close)
			
			#AND application_type_specific  application_user_id
			echo '
			My client volunteers:
			<ul>
			    '.$clients_volunteers.'
			</ul>
			<br>
			My client development workers
			<ul>
			    '.$clients_dw.'
			</ul>
			';
			
			/*
			list of all my volunteers and ngos
			- option to add new volunteer
			- option to add new dev. worker
			*/
			
		    }
		    #agent section (close)
		    
		    #trainer section (open)
		    elseif($selected_work_center_section == 4){
			
		    }
		    #trainer section (close)
		    
		    #advisor section (open)
		    elseif($selected_work_center_section == 5){
			
		    }
		    #advisor section (close)
		    
		    #recruiter section (open)
		    elseif($selected_work_center_section == 6){
			
		    }
		    #recruiter section (close)
		    
		    #staff section (open)
		    elseif($selected_work_center_section == 7){
			
		    }
		    #staff section (close)
		    
		}
		#work center section contents (close)
		
	    }
	    #content (close)
	    
	}
	#work center (close)
	
	unset($page_section);
    }
    #main page section (close)

    #task sections (open)
    if(1==1){
		
		#work center task my-current volunteer (open)
		if($page_section == "work center task my-current volunteer"){
			
			#function-table.php (v1.0) (open)
			if(1==1){
				
				#documentation (open)
				if(1==1){
					
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
					// important elements, especially those maked with the comment: ' //Don't touch this.'                
				}
				#documentation (close)
				
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
							
							$function_table['query'] = $GLOBALS['wpdb']->prepare('
								SELECT * FROM fi4l3fg_voluno_items_tasks_properties
								RIGHT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_items_tasks
									LEFT JOIN fi4l3fg_voluno_users_extended as aaa_author
									ON task_author_id = usersext_id
									LEFT JOIN fi4l3fg_voluno_development_organizations
									ON task_ngo_id = ngo_id
									LEFT JOIN fi4l3fg_voluno_lists_countries
									ON ngo_geographic_impact = list_countries_id
										LEFT JOIN
										(SELECT list_countries_id as list_countries_id_region,
											list_countries_name as list_countries_name_region
										FROM fi4l3fg_voluno_lists_countries) as bbb_region
										ON list_countries_region = list_countries_id_region
										LEFT JOIN
										(SELECT list_countries_id as list_countries_id_continent,
											list_countries_name as list_countries_name_continent
										FROM fi4l3fg_voluno_lists_countries) as ccc_continent
										ON list_countries_continent = list_countries_id_continent
									LEFT JOIN (
										SELECT *
										FROM fi4l3fg_voluno_applications
										WHERE
										application_type_general = "task" AND
										application_type_specific = "task_application" AND
										application_user_id = %s AND
										application_status IN ("accepted","pending")
										) as aaa_application_status
									ON task_id = application_type_id
								) as aaa_fulll
								ON taskprop_task_id = task_id
								LEFT JOIN fi4l3fg_voluno_lists_task_types
								ON taskprop_type_id = task_type_id
								LEFT JOIN fi4l3fg_voluno_development_organizations_properties
								ON ngo_id = ngo_prop_ngo_id
								WHERE task_status IN ("unassigned","in progress")
								AND application_status IN ("accepted","pending")
								GROUP BY task_id
								;'
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
								
								$function_table['data'][$ajl]['task_description'] = $function_table['results'][$ajl]->task_description;
								$function_table['data'][$ajl]['task_name'] = $function_table['results'][$ajl]->task_name;
								$function_table['data'][$ajl]['task_status'] = $function_table['results'][$ajl]->task_status;
								$function_table['data'][$ajl]['task_code'] = $function_table['results'][$ajl]->task_code;
								
								$function_table['data'][$ajl]['display_name'] = $function_table['results'][$ajl]->usersext_displayName;
								#$function_table['data'][$ajl]['task_deadline'] = $function_table['results'][$ajl]->task_deadline;
								#$function_table['data'][$ajl]['task_assignment_deadline'] = $function_table['results'][$ajl]->task_assignment_deadline;								
								$function_table['data'][$ajl]['page_user_id'] = $function_table['results'][$ajl]->page_user_id;
								
								$function_table['data'][$ajl]['ngo_name'] = $function_table['results'][$ajl]->ngo_name;
								$function_table['data'][$ajl]['ngo_profile_id'] = $function_table['results'][$ajl]->ngo_profile_id;
								$function_table['data'][$ajl]['list_countries_name'] = $function_table['results'][$ajl]->list_countries_name;
								$function_table['data'][$ajl]['list_countries_name_region'] = $function_table['results'][$ajl]->list_countries_name_region;
								
								$function_table['data'][$ajl]['list_countries_name_continent'] = $function_table['results'][$ajl]->list_countries_name_continent;
								$function_table['data'][$ajl]['list_countries_type'] = $function_table['results'][$ajl]->list_countries_type;
								$function_table['data'][$ajl]['application_status'] = $function_table['results'][$ajl]->application_status;
								$function_table['data'][$ajl]['task_type_name'] = $function_table['results'][$ajl]->task_type_name;
								
								$function_table['data'][$ajl]['task_expected_duration'] = $function_table['results'][$ajl]->task_expected_duration;
								$function_table['data'][$ajl]['task_deadline'] = $function_table['results'][$ajl]->task_deadline;
								
								$function_table['data'][$ajl]['task_author_id'] = $function_table['results'][$ajl]->task_author_id;
								$function_table['data'][$ajl]['task_ngo_id'] = $function_table['results'][$ajl]->task_ngo_id;
								$function_table['data'][$ajl]['task_project_id'] = $function_table['results'][$ajl]->task_project_id;
								$function_table['data'][$ajl]['task_id'] = $function_table['results'][$ajl]->task_id;
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
						
						$function_table['unique id'] = 'task_mycurrent_volunteer_getoivioerwbiuf';
						// Everytime you use this function, please add a unique ID (only a-z, _ and 0-9). For example, see https://passwordsgenerator.net/
						
						#Options connected to the title (open)
						if(1==1){
							
							$function_table['display title'] = 'Tasks I applied for';
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
									'heading'         => '#', // See 1 row above.
									'width'             => '5%' // See 2 rows above.
								),
								array(
									'heading'         => 'Task description',
									'width'             => '25%',
									'sorting option' => 'task_name'
								),
								array(
									'heading'         => 'Deadline',
									'width'             => '15%',
									'sorting option' => 'task_deadline'
								),
								array(
									'heading'         => 'Expected duration',
									'width'             => '10%',
									'sorting option' => 'task_expected_duration'
								),
								array(
									'heading'         => 'Category',
									'width'             => '15%',
									'sorting option' => 'task_type_name'
								),
								array(
									'heading'         => 'Author and organization',
									'width'             => '15%',
									'sorting option' => 'ngo_name'
								),
								array(
									'heading'         => 'Status',
									'width'             => '20%',
									'sorting option' => 'task_status'
								)
							);
							
							//Optionally, you can choose one of the above columns to be the default sorting option.
							// If you don't want this, please delete or hide the entire array.
							$function_table['default ordering']
							= array(
								'column' => 'task_name', // Colum name. In the example, 'email' or 'id'.
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
						
						#1 counter (open)
						if(1==1){
							
							// If you want to use a row counter, please don't touch this cell as it is.
							
							$function_table['table rows'] .= '
							<td>
								'.number_format(($abs+1),0,'.',' ').'
							</td>
							';
							
						}
						#1 counter (close)
						
						#2 email (open) //example
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								The user email is:
								<span style="color:green">
									'.$function_table['data'][$abs]['email'].'
								</span>
							</td>
							';
							
						}
						#2 email (close)
						
						#3 id (open) //example
						if(1==1){
							
							$function_table['table rows'] .= '
							<td>
								'.$function_table['data'][$abs]['id'].'
							</td>
							';
							
						}
						#3 id (close)
						
						$function_table['table rows'] .= $function_table['row close']; //Don't touch this.
					} //Don't touch this.
					#Cells/Columns (close)
					
				}
				#design (close)
				
				$function_table['part'] = 2; //Don't touch this.
				include('#function-table.php'); //Don't touch this.
				
				#output (open)
				if(1==1){
					
					#echo $function_table['output table'];
					
				}
				#output (close)
				
			}
			#function-table.php (v1.0) (close) 
			
			#script and absolute positioned divs (open) #old, please check. i don't even need this, i think. rather not use it.
			if(1==1){
			echo '
			<script>
				jQuery(document).ready(function(){
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_link").hover(function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").show();
				  },function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").hide();
				  });
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_button").click(function(){
				var mycurrent_volunteer_withdraw_application = "";
				mycurrent_volunteer_withdraw_application = 
				  confirm("Are you sure you want to withdraw your application to this task?'.
				  '\n You can reapply at any time, as long as the task is open for applications.")
				  if(mycurrent_volunteer_withdraw_application == true){
					jQuery(".loading_img_middle_page").show();
					var taskID = "cx";
					taskID = jQuery(this).parent().parent().parent().find(".task_id").html();
					jQuery(".work_center_mysql")'.
					'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '. //doesn't exist anymore!!!!
					'.members_net_work_center_mysql",{"task_mycurrent_volunteer_applicationwithdraw[]":['.
										'parseInt(taskID)'.
										']}, function() {
					jQuery(this).hide(0, function() {
						jQuery(this).show(function(){
						jQuery(".loading_img_middle_page").hide();
						});
					});
					});
					jQuery(this).parent().parent().parent().find("td").fadeOut(2000);
				  
				  jQuery(".task_id_"+parseInt(taskID)+".voluno_text_button_style").toggle();
				  }
				  });
				  
				});
			</script>';
			}
			#script and absolute positioned divs (close)
			
			#please check (dome): script and absolute positioned divs (open)
			if(1==1){
			  /*
			echo '
			<script>
				jQuery(document).ready(function(){            
				var taskName = "";
				var taskDescription = "";
				var taskDeadline = "";
				var taskID = "";
				var taskNgo = "";
				var taskCode = "";
				jQuery(".apply_link").click(function(){
					taskName = jQuery(this).parent().parent().find(".task_name").html();
					taskDescription = jQuery(this).parent().parent().find(".task_description").html();
					taskDeadline = jQuery(this).parent().parent().find(".task_deadline").html();
					taskID = jQuery(this).parent().parent().find(".task_id").html();
					taskNgo = jQuery(this).parent().parent().find(".task_ngo").html();
					taskCode = jQuery(this).parent().parent().find(".task_code").html();
					
					jQuery(".taskName").html(taskName);
					jQuery(".taskDescription").html(taskDescription);
					jQuery(".taskDeadline").html(taskDeadline);
					jQuery(".taskID").html(taskID);
					jQuery(".taskNgo").html(taskNgo);
					jQuery(".taskCode").html(taskCode);
					jQuery(".application_div").show();
				});
				
				var ClickCount = "";
				jQuery(document).click(function(){
					ClickCount++;
					if(ClickCount >= 2){
					jQuery(".application_div_successful").stop(true).hide();
					}
				});
				
				var applicationText = "";
				jQuery(".application_div_apply").click(function(){
					jQuery(".application_div").hide();
					applicationText = jQuery("#application_text").val();
					ClickCount = 0;
					jQuery(".loading_page").show();
					jQuery(".work_center_mysql")'.
					'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
					'.members_net_work_center_mysql",{"task_application_apply_array[]":['.
										'parseInt(taskID),'.
										'taskCode,'.
										'applicationText'.
										']}, function() {
					jQuery(this).hide(0, function() {
						jQuery(this).show(function(){
						jQuery(".loading_page").hide();
						jQuery(".application_div_successful").show(function(){
							jQuery(".application_div_successful").fadeOut(5500);
							jQuery(".apply_link.task_id_"+parseInt(taskID)).hide();
							jQuery(".apply_withdraw_link.task_id_"+parseInt(taskID)).show();
						});
						});
					});
					});
					
			
				});
			
				jQuery(".apply_withdraw_link").click(function(){
					taskID = jQuery(this).parent().parent().find(".task_id").html();
					withdrawApplication = confirm("Are you sure you want to cancel your application for this task?");
					if (withdrawApplication == true) {
						jQuery(".loading_page").show();
						jQuery(".work_center_mysql")'.
						'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
						'.members_net_work_center_mysql",{"task_application_withdraw_array[]":['.
											'parseInt(taskID)'.
											']}, function() {
						jQuery(this).hide(0, function() {
							jQuery(this).show(function(){
							jQuery(".loading_page").hide();
							jQuery(".apply_link.task_id_"+parseInt(taskID)).show();
							jQuery(".apply_withdraw_link.task_id_"+parseInt(taskID)).hide();
							jQuery(".application_div_withdrawn").show(function(){
								jQuery(".application_div_withdrawn").fadeOut(5500);
							});
							});
						});
						});
					}
				});
				
				});
			</script>';
			
			#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
				$function_fixed_div_div_name = "application_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 17
				$function_fixed_div_height_div = 80;
				include('#function-fixed-div.php');
				echo '
				<div style="text-align:center;">
					<strong>
					Apply for task:
					</strong>
					<br>
					<h2 style="display:inline;margin:20px;">
					<span class="taskName"">
						Apply for task:
					</span>
					</h2>
				</div>
				<br>';
				$apply_td_title_array = array("Description","Deadline","Development organization","Task ID");
				$apply_td_class_array = array("taskDescription","taskDeadline","taskNgo","taskID");
				echo '
				<table style="width:75%;margin-left:auto;margin-right:auto;">';
					for($x=0;$x<count($apply_td_title_array);$x++){
					echo '
					<tr>
						<td style="width:100px;">
						<strong>
							'.$apply_td_title_array[$x].':
						</strong>
						</td>
						<td class="'.$apply_td_class_array[$x].'" style="vertical-align:middle;">
						</td>
					</tr>';
					}
				echo '
				</table>
				<br>';
					#function-help-word.php
					$function_help_word_hover_link = "<strong>Application text</strong>";
					$function_help_word_width = 90;
					$function_help_word_help_content = '
						<p><strong>
						Application text
						</strong>
						<br>
						If you want to, you can add a text to your application. This helps the development
						organization to determine, if you are the candidate most suited for the task. For example:</p>
						<ul>
						<li>
							What motivates you to apply for this task?
						</li>
						<li>
							Why you believe that you are qualified to complete the task?
						</li>
						<li>
							How you plan to execute the task (e.g. "I can complete this in just one day, using MS Excel")?
						</li>
						<li>
							Any other interesting information.
						</li>
						</ul>';
					include('#function-help-word.php');
				echo '
				<br>
				<br>
				<form method="post">
					<textarea '.
					'name="application_text" '.
					'id="application_text" '.
					'style="width:98.5%;height:7em;resize:vertical;"'.
					'>test test test</textarea>
				</form>
				<div
					class="voluno_text_button_style application_div_apply"
					style="
					margin: 30px auto;
					background:#8B0000;
					cursor: pointer;
					width:100px;
					"
				>
					Send application
				</div>';
			#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
				
			#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_width_div = 300; //only relevant for part 1, default 750 (px)
				$function_fixed_div_border_radius = 25; //optional, default is 0
				$function_fixed_div_cancel_button = "no"; //optional, default is yes
				$function_fixed_div_div_name = "application_div_successful"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
				$function_fixed_div_text_align = "center";
				$function_fixed_div_height_div = "none";
				$function_fixed_div_darkened_bg = "no";
				include('#function-fixed-div.php');
				echo '
				<h2 style="display:inline;">
					Application submitted successfully!
				</h2>';
			#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
			
			#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_width_div = 300; //only relevant for part 1, default 750 (px)
				$function_fixed_div_border_radius = 25; //optional, default is 0
				$function_fixed_div_cancel_button = "no"; //optional, default is yes
				$function_fixed_div_div_name = "application_div_withdrawn"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
				$function_fixed_div_text_align = "center";
				$function_fixed_div_height_div = "none";
				$function_fixed_div_darkened_bg = "no";
				include('#function-fixed-div.php');
				echo '
				<h2 style="display:inline;">
					Application withdrawn successfully!
				</h2>';
			#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
			*/
			}
			#script and absolute positioned divs (close)
			
		}
		#work center task my-current volunteer (close)
		
		#work center__task__search_find (open)
		elseif($page_section == "work center task search-find"){
			
			#myqsl (open)
			if(1==1){
			
			#update data: task search mysql for table of god (open)
			if(isset($_POST['task_search_submit'])){
				$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_personal_settings',
					array( //location of row to delete
					'pers_settings_general' => "work center",
					'pers_settings_specific' => "task search preferences",
					'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
					),
					array( //format of location of row to delete
					  '%s',
					  '%s',
					  '%s'
					));
				
				#task description (open)
				if(!empty($_POST['task_search_task_description'])){
				$search_task_description_keyword_array = explode(" ",sanitize_text_field($_POST['task_search_task_description']));
				foreach($search_task_description_keyword_array as $search_task_description_keyword_array_row){
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_personal_settings',
						array(
						'pers_settings_value' => $search_task_description_keyword_array_row,
						'pers_settings_general' => "work center",
						'pers_settings_specific' => "task search preferences",
						'pers_settings_content_varchar1000' => "task description",
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
						array(
						  '%s',
						  '%s',
						  '%s',
						  '%s',
						  '%s'
						));
					echo "<br>steve: ".$search_task_description_keyword_array_row."<br>";
				}
				}
				#task description (close)
				
				#expected task_duration (open)
				if(1==1){
				$mysql_duration_array = array($_POST['task_search_task_expected_duration_bottom'],$_POST['task_search_task_expected_duration_top']);
				sort($mysql_duration_array);
				$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_personal_settings',
					array(
						'pers_settings_value' => floatval($mysql_duration_array[0]),
						'pers_settings_general' => "work center",
						'pers_settings_specific' => "task search preferences",
						'pers_settings_content_varchar1000' => "task expected duration 2 bottom",
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
					array(
						  '%s',
						  '%s',
						  '%s',
						  '%s',
						  '%s'
						));
				$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_personal_settings',
					array(
						'pers_settings_value' => floatval($mysql_duration_array[1]),
						'pers_settings_general' => "work center",
						'pers_settings_specific' => "task search preferences",
						'pers_settings_content_varchar1000' => "task expected duration 1 top",
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
					array(
						  '%s',
						  '%s',
						  '%s',
						  '%s',
						  '%s'
						));
				}
				#expected task_duration (close)
				
				#development topic (open)
				foreach($_POST['task_search_dev_topic'] as $task_search_dev_topic_row){
				$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_personal_settings',
					array(
						'pers_settings_value' => intval($task_search_dev_topic_row),
						'pers_settings_general' => "work center",
						'pers_settings_specific' => "task search preferences",
						'pers_settings_content_varchar1000' => "development topic",
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
					array(
						  '%d',
						  '%s',
						  '%s',
						  '%s',
						  '%s'
						));
				}
				#development topic (close)
				
				#task type (open)
				foreach($_POST['task_search_task_type'] as $task_search_task_type_row){
				$GLOBALS['wpdb']->insert(
						'fi4l3fg_voluno_personal_settings',
					array(
						'pers_settings_value' => intval($task_search_task_type_row),
						'pers_settings_general' => "work center",
						'pers_settings_specific' => "task search preferences",
						'pers_settings_content_varchar1000' => "task category",
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
					array(
						  '%d',
						  '%s',
						  '%s',
						  '%s',
						  '%s'
						));
				}
				#task type (close)
				
				#geographic area (open)
				if(1==1){
				$task_search_geographic_area_results = array();
				foreach($_POST['task_search_geographic_area_continent'] as $x){
					$task_search_geographic_area_results[] = $x;
				}
				foreach($_POST['task_search_geographic_area_region'] as $x){
					$task_search_geographic_area_results[] = $x;
				}
				foreach($task_search_geographic_area_results as $task_search_geographic_area_row){
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_personal_settings',
						array(
						'pers_settings_value' => intval($task_search_geographic_area_row),
						'pers_settings_general' => "work center",
						'pers_settings_specific' => "task search preferences",
						'pers_settings_content_varchar1000' => "geographic area",
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
						array(
						  '%d',
						  '%s',
						  '%s',
						  '%s',
						  '%s'
						));
				}
				foreach($_POST['task_search_geographic_area_region'] as $task_search_geographic_area_row){
					$countries_for_respective_regions_query = $GLOBALS['wpdb']->prepare('SELECT *
											   FROM fi4l3fg_voluno_list_sorting
											   WHERE voluno_liso_parent_l7 = %d
											   AND voluno_liso_item_type = "country"
											   ;'
											   ,$task_search_geographic_area_row);
					$countries_for_respective_regions_results = $GLOBALS['wpdb']->get_results($countries_for_respective_regions_query); 
					foreach($countries_for_respective_regions_results as $countries_for_respective_regions_row){
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_personal_settings',
						array(
							'pers_settings_value' => intval($countries_for_respective_regions_row->voluno_liso_item_id),
							'pers_settings_general' => "work center",
							'pers_settings_specific' => "task search preferences",
							'pers_settings_content_varchar1000' => "geographic area",
							'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
							),
						array(
							  '%d',
							  '%s',
							  '%s',
							  '%s',
							  '%s'
							));
					}
				}
				}
				#geographic area (close)
			
				#ngo (open)
				if(!empty($_POST['task_search_task_ngo']) AND !in_array(0,$_POST['task_search_task_ngo'])){
				foreach($_POST['task_search_task_ngo'] as $task_search_task_ngo_row){
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_personal_settings',
						array(
						'pers_settings_value' => intval($task_search_task_ngo_row),
						'pers_settings_general' => "work center",
						'pers_settings_specific' => "task search preferences",
						'pers_settings_content_varchar1000' => "task ngo",
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
						array(
						  '%d',
						  '%s',
						  '%s',
						  '%s',
						  '%s'
						));
				}
				}
				#ngo (close)
			}
			#update data: task search mysql for table of god (close)
			
			#get data: task search preferences get and prepare data for mysql (open)
			if(1==1){
				$task_search_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_personal_settings
								WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								AND pers_settings_general = "work center"
								AND pers_settings_specific = "task search preferences"
								ORDER BY pers_settings_content_varchar1000 DESC
								;');
				$task_search_results = $GLOBALS['wpdb']->get_results($task_search_query);
				
				for($x=0;$x<count($task_search_results);$x++){
			
				if($x==0){
					$where_user_preferences = " WHERE ";
				}elseif($task_search_results[$x-1]->pers_settings_content_varchar1000 != $task_search_results[$x]->pers_settings_content_varchar1000){
					
					$where_user_preferences = $where_user_preferences." AND ";
				}
				
				#task description (open)
				if($task_search_results[$x]->pers_settings_content_varchar1000 == "task description"){
					if($task_search_results[($x-1)]->pers_settings_content_varchar1000 != "task description"){
					$where_user_preferences = $where_user_preferences."match(task_description) against('";
					}elseif($task_search_results[$x-1]->pers_settings_content_varchar1000 == "task description"){
					$where_user_preferences = $where_user_preferences." ";
					}
					
					$where_user_preferences = $where_user_preferences.''.$task_search_results[$x]->pers_settings_value.'';
					
					if($task_search_results[($x+1)]->pers_settings_content_varchar1000 != "task description"){
					$where_user_preferences = $where_user_preferences."' IN BOOLEAN MODE)";
					}
				}
				#task description (close)
				
				#task ngo (open)
				if($task_search_results[$x]->pers_settings_content_varchar1000 == "task ngo"){
					$task_ngo_search_array[] = $task_search_results[$x]->pers_settings_value;
					if($task_search_results[($x-1)]->pers_settings_content_varchar1000 != "task ngo"){
					$where_user_preferences = $where_user_preferences." task_ngo_id IN (";
					}else{
					$where_user_preferences = $where_user_preferences.",";
					}
					$where_user_preferences = $where_user_preferences.intval($task_search_results[$x]->pers_settings_value);
					if($task_search_results[$x+1]->pers_settings_content_varchar1000 != "task ngo"){
					$where_user_preferences = $where_user_preferences.")";
					}
				}
				#task ngo (close)
				
				#task duration (open)
				if($task_search_results[$x]->pers_settings_content_varchar1000 == "task expected duration 2 bottom"){
					$where_user_preferences = $where_user_preferences." task_expected_duration BETWEEN ".$task_search_results[$x]->pers_settings_value;
					$task_expected_duration_bottom = $task_search_results[$x]->pers_settings_value;
				}elseif($task_search_results[$x]->pers_settings_content_varchar1000 == "task expected duration 1 top"){
					$where_user_preferences = $where_user_preferences.$task_search_results[$x]->pers_settings_value;
					$task_expected_duration_top = $task_search_results[$x]->pers_settings_value;
				}
				#task duration (close)
				
				#task category (open)
				if($task_search_results[$x]->pers_settings_content_varchar1000 == "task category"){
					if($task_search_results[($x-1)]->pers_settings_content_varchar1000 != "task category"){
					$where_user_preferences = $where_user_preferences." task_type_id IN (";
					}else{
					$where_user_preferences = $where_user_preferences.",";
					}
					$where_user_preferences = $where_user_preferences.intval($task_search_results[$x]->pers_settings_value);
					if($task_search_results[$x+1]->pers_settings_content_varchar1000 != "task category"){
					$where_user_preferences = $where_user_preferences.")";
					}
				}
				#task category (close)
				
				#geographic area (open)
				if($task_search_results[$x]->pers_settings_content_varchar1000 == "geographic area"){
					if($task_search_results[($x-1)]->pers_settings_content_varchar1000 != "geographic area"){
					$where_user_preferences = $where_user_preferences." ngo_geographic_impact IN (";
					}else{
					$where_user_preferences = $where_user_preferences.",";
					}
					$where_user_preferences = $where_user_preferences.intval($task_search_results[$x]->pers_settings_value);
					if($task_search_results[$x+1]->pers_settings_content_varchar1000 != "geographic area"){
					$where_user_preferences = $where_user_preferences.")";
					}
				}
				#geographic area (close)
				
				#development topic (open)
				if($task_search_results[$x]->pers_settings_content_varchar1000 == "development topic"){
					if($task_search_results[($x-1)]->pers_settings_content_varchar1000 != "development topic"){
					$where_user_preferences = $where_user_preferences." ngo_prop_type_id IN (";
					}else{
					$where_user_preferences = $where_user_preferences.",";
					}
					$where_user_preferences = $where_user_preferences.intval($task_search_results[$x]->pers_settings_value);
					if($task_search_results[$x+1]->pers_settings_content_varchar1000 != "development topic"){
					$where_user_preferences = $where_user_preferences.")";
					}
				}
				#development topic (close)
				}
				
				#dome
				if(1==2){
				if(current_user_can("manage_options")){
					echo '
					<div style="background-color:lightblue;border-radius:25px;padding:25px;border:1px solid black;">
					<b>Where command:</b>
					<br>
					<br>
					'.$where_user_preferences.'
					</div>';
				}
				}
			}
			#get data: task search preferences get and prepare data for mysql (close)
			
			}
			#myqsl (close)
			
			#content (open)
			if(1==1){
			
			#function-table-of-god (open)
			if(2==1){
				
				#data preparation (open)
				if(1==1){
				#Please choose a name for your table like "task search and find"
					$table_of_god_name = "task search and find";
					
				#Please select all possible
					
					#big mysql query (open)
					if(1==1){
					$table_of_god_query = $GLOBALS['wpdb']->prepare('
						SELECT * FROM fi4l3fg_voluno_items_tasks_properties
						RIGHT JOIN (
						SELECT *
						FROM fi4l3fg_voluno_items_tasks
							LEFT JOIN fi4l3fg_voluno_users_extended as aaa_author
							ON task_author_id = usersext_id
							LEFT JOIN fi4l3fg_voluno_development_organizations
							
							'./*ngo information*/'
							ON task_ngo_id = ngo_id
							LEFT JOIN fi4l3fg_voluno_lists_countries
							ON ngo_geographic_impact = list_countries_id
								LEFT JOIN
								(SELECT list_countries_id as list_countries_id_region,
									list_countries_name as list_countries_name_region
								FROM fi4l3fg_voluno_lists_countries) as bbb_region
								ON list_countries_region = list_countries_id_region
								LEFT JOIN
								(SELECT list_countries_id as list_countries_id_continent,
									list_countries_name as list_countries_name_continent
								FROM fi4l3fg_voluno_lists_countries) as ccc_continent
								ON list_countries_continent = list_countries_id_continent
							
							'./*application*/'
							LEFT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_applications
								WHERE
								application_type_general = "task" AND
								application_type_specific = "task_application" AND
								application_user_id = %s AND
								application_status IN ("pending","rejected","dismissed")
								)as aaa_application_status
							ON task_id = application_type_id
						WHERE task_status = "unassigned"
							AND (application_status != "rejected" OR application_status IS NULL)
							AND (application_status != "dismissed" OR application_status IS NULL)
						GROUP BY task_id
						) as aaa_fulll
						
						ON taskprop_task_id = task_id
						LEFT JOIN fi4l3fg_voluno_lists_task_types
						ON taskprop_type_id = task_type_id
						LEFT JOIN fi4l3fg_voluno_development_organizations_properties
						ON ngo_id = ngo_prop_ngo_id
						'.#'.$where_user_preferences.'
						'GROUP BY task_id;'
						,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						);
					$table_of_god_results = $GLOBALS['wpdb']->get_results($table_of_god_query);
					}
					#big mysql query (close)
					
				for($x=0;$x<count($table_of_god_results);$x++){
					
					#column matching (open)
					if(1==1){
					#strings (up to 20)
						$table_of_god_data_strings1[]   = $table_of_god_results[$x]->task_description;
						$table_of_god_data_strings2[]   = $table_of_god_results[$x]->task_name;
						$table_of_god_data_strings3[]   = $table_of_god_results[$x]->task_status;
						$table_of_god_data_strings4[]   = $table_of_god_results[$x]->task_code;
						$table_of_god_data_strings5[]   = $table_of_god_results[$x]->usersext_displayName;
						$table_of_god_data_strings6[]   = $table_of_god_results[$x]->task_deadline;
						$table_of_god_data_strings7[]   = $table_of_god_results[$x]->task_assignment_deadline;
						#$table_of_god_data_strings8[]   = $table_of_god_results[$x]->;
						$table_of_god_data_strings9[]   = $table_of_god_results[$x]->ngo_name;
						$table_of_god_data_strings10[]  = $table_of_god_results[$x]->ngo_profile_id;
						$table_of_god_data_strings11[]  = $table_of_god_results[$x]->list_countries_name;
						$table_of_god_data_strings12[]  = $table_of_god_results[$x]->list_countries_name_region;
						$table_of_god_data_strings13[]  = $table_of_god_results[$x]->list_countries_name_continent;
						$table_of_god_data_strings14[]  = $table_of_god_results[$x]->list_countries_type;
						$table_of_god_data_strings15[]  = $table_of_god_results[$x]->application_status;
						$table_of_god_data_strings16[]  = $table_of_god_results[$x]->task_type_name;
						$table_of_god_data_strings17[]  = $table_of_god_results[$x]->task_expected_duration;
						$table_of_god_data_strings18[]  = $table_of_god_results[$x]->task_deadline;
						
					#numbers (up to 10)
						$table_of_god_data_numbers1[]   = $table_of_god_results[$x]->task_author_id;
						$table_of_god_data_numbers2[]   = $table_of_god_results[$x]->task_ngo_id;
						$table_of_god_data_numbers3[]   = $table_of_god_results[$x]->task_project_id;
						$table_of_god_data_numbers4[]   = $table_of_god_results[$x]->task_id;
					}
					#column matching (close)
					
				}
				}
				#data preparation (close)
				
				#table content (open)
				if(1==1){
				
				$table_of_god_table_title = "Open Tasks"; #the title of the table in h4, together with hide option
				#$table_of_god_show_on_load = "no";
				$table_of_god_table_array = array(
					#Title of each column
					#the width of each column in the table in percent
					#mysql ordering name
						array("#",5),
						array("Task description",25,"tog_data_string2"),
						#array("Deadline",10,"tog_data_string5"),
						array("Deadline",14,"tog_data_string18"),
						array("Expected duration",10,"tog_data_string17"),
						array("Category",15,"tog_data_string16"),
						#array("Development area",15,"tog_data_string18"),
						#array("Geographic area",15,"tog_data_string11"),
						array("Author and organization",15,"tog_data_string9"),
						array("Development area",13,"tog_data_string18"),
						array("Geographic area",13,"tog_data_string11")
						#array("Application",15,"tog_data_string15")
					);
					
					#default ordering
					$table_of_god_default_order_by = "tog_data_string1"; # any of the third position ([2]) in the subarray of $table_of_god_table_array
					$table_of_god_default_order_by_direction = " ASC"; # " ASC"; or " DESC"; (space required)
					
				#For the td content, please look at: #function-table-of-god#example.php
				
				#Search row? #modified
					#$table_of_god_search_row_activate = "yes"; #"yes"; or "no" or blank or remove completely;
					#$table_of_god_search_row_title = "Search settings"; #can be deleted if no search row
				}
				#table content (close)
				
				include("#function-table-of-god.php");
			}
			#function-table-of-god (close)
			
			#absolute positioned divs (open)
			if(1==1){
				
				#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
				$function_fixed_div_div_name = "application_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 17
				$function_fixed_div_height_div = 80;
				include('#function-fixed-div.php');
					echo '
					<div style="text-align:center;">
					<strong>
						Apply for task:
					</strong>
					<br>
					<h2 style="display:inline;margin:20px;">
						<span class="taskName"">
						Apply for task:
						</span>
					</h2>
					</div>
					<br>';
					$apply_td_title_array = array("Description","Deadline","Development organization","Task ID");
					$apply_td_class_array = array("taskDescription","taskDeadline","taskNgo","taskID");
					echo '
					<table style="width:75%;margin-left:auto;margin-right:auto;">';
					for($x=0;$x<count($apply_td_title_array);$x++){
						echo '
						<tr>
						<td style="width:100px;">
							<strong>
							'.$apply_td_title_array[$x].':
							</strong>
						</td>
						<td class="'.$apply_td_class_array[$x].'" style="vertical-align:middle;">
						</td>
						</tr>';
					}
					echo '
					</table>
					<br>';
					#function-help-word.php
						$function_help_word_hover_link = "<strong>Application text</strong>";
						$function_help_word_width = 90;
						$function_help_word_help_content = '
						<p><strong>
							Application text
						</strong>
						<br>
						If you want to, you can add a text to your application. This helps the development
						organization to determine, if you are the candidate most suited for the task. For example:</p>
						<ul>
							<li>
							What motivates you to apply for this task?
							</li>
							<li>
							Why you believe that you are qualified to complete the task?
							</li>
							<li>
							How you plan to execute the task (e.g. "I can complete this in just one day, using MS Excel")?
							</li>
							<li>
							Any other interesting information.
							</li>
						</ul>';
						include('#function-help-word.php');
					echo '
					<br>
					<br>
					<form method="post">
					<textarea '.
						'name="application_text" '.
						'id="application_text" '.
						'style="width:98.5%;height:7em;resize:vertical;"'.
					'>test test test</textarea>
					</form>
					<div
					class="voluno_text_button_style application_div_apply"
					style="
						margin: 30px auto;
						background:#8B0000;
						cursor: pointer;
						width:100px;
					"
					>
					Send application
					</div>';
				#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
				
				#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_width_div = 300; //only relevant for part 1, default 750 (px)
				$function_fixed_div_border_radius = 25; //optional, default is 0
				$function_fixed_div_cancel_button = "no"; //optional, default is yes
				$function_fixed_div_div_name = "application_div_successful"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
				$function_fixed_div_text_align = "center";
				$function_fixed_div_height_div = "none";
				$function_fixed_div_darkened_bg = "no";
				include('#function-fixed-div.php');
					echo '
					<h2 style="display:inline;">
					Application submitted successfully!
					</h2>';
				#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
				
				#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_width_div = 300; //only relevant for part 1, default 750 (px)
				$function_fixed_div_border_radius = 25; //optional, default is 0
				$function_fixed_div_cancel_button = "no"; //optional, default is yes
				$function_fixed_div_div_name = "application_div_withdrawn"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
				$function_fixed_div_text_align = "center";
				$function_fixed_div_height_div = "none";
				$function_fixed_div_darkened_bg = "no";
				include('#function-fixed-div.php');
					echo '
					<h2 style="display:inline;">
					Application withdrawn successfully!
					</h2>';
				#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
			}
			#absolute positioned divs (close)
			
			}
			#content (close)
			
			#jquery (open)
			if(1==1){
			echo '
			<script>
				jQuery(document).ready(function(){';
				
				#task application (1 of 2) (open)
				if(1==1){
					echo '
					var taskName = "";
					var taskDescription = "";
					var taskDeadline = "";
					var taskID = "";
					var taskNgo = "";
					var taskCode = "";
					jQuery(".apply_link").click(function(){
					taskName = jQuery(this).parent().parent().find(".task_name").html();
					taskDescription = jQuery(this).parent().parent().find(".task_description").html();
					taskDeadline = jQuery(this).parent().parent().find(".task_deadline").html();
					taskID = jQuery(this).parent().parent().find(".task_id").html();
					taskNgo = jQuery(this).parent().parent().find(".task_ngo").html();
					taskCode = jQuery(this).parent().parent().find(".task_code").html();
					
					jQuery(".taskName").html(taskName);
					jQuery(".taskDescription").html(taskDescription);
					jQuery(".taskDeadline").html(taskDeadline);
					jQuery(".taskID").html(taskID);
					jQuery(".taskNgo").html(taskNgo);
					jQuery(".taskCode").html(taskCode);
					jQuery(".application_div").show();
					});';
				}
				#task application (1 of 2) (close)
				
				#task application (2 of 2) (open)
				if(1==1){
					echo '
					var applicationText = "";
					jQuery(".application_div_apply").click(function(){
					jQuery(".application_div").hide();
					applicationText = jQuery("#application_text").val();
					ClickCount = 0;
					jQuery(".loading_page").show();
					jQuery(".work_center_mysql")'.
					'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
					'.members_net_work_center_mysql",{"task_application_apply_array[]":['.
											'parseInt(taskID),'.
											'taskCode,'.
											'applicationText'.
											']}, function() {
						jQuery(this).hide(0, function() {
						jQuery(this).show(function(){
							jQuery(".loading_page").hide();
							jQuery(".application_div_successful").show(function(){
							jQuery(".application_div_successful").fadeOut(5500);
							jQuery(".apply_link.task_id_"+parseInt(taskID)).hide();
							jQuery(".apply_withdraw_link.task_id_"+parseInt(taskID)).show();
							});
						});
						});
					});
					});
					
					var ClickCount = "";
					jQuery(document).click(function(){
					ClickCount++;
					if(ClickCount >= 2){
						jQuery(".application_div_successful").stop(true).hide();
					}
					});';
				}
				#task application (2 of 2) (close)
				
				#withdraw task application (open)
				if(1==1){
					echo '
					jQuery(".apply_withdraw_link").click(function(){
					taskID = jQuery(this).parent().parent().find(".task_id").html();
					withdrawApplication = confirm("Are you sure you want to cancel your application for this task?");
						if (withdrawApplication == true) {
						jQuery(".loading_page").show();
						jQuery(".work_center_mysql")'.
						'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
						'.members_net_work_center_mysql",{"task_application_withdraw_array[]":['.
												'parseInt(taskID)'.
												']}, function() {
							jQuery(this).hide(0, function() {
							jQuery(this).show(function(){
								jQuery(".loading_page").hide();
								jQuery(".apply_link.task_id_"+parseInt(taskID)).show();
								jQuery(".apply_withdraw_link.task_id_"+parseInt(taskID)).hide();
								jQuery(".application_div_withdrawn").show(function(){
								jQuery(".application_div_withdrawn").fadeOut(5500);
								});
							});
							});
						});
						}
					});';
				}
				#withdraw task application (close)
				
				echo '
				});
			</script>';
			}
			#jquery (close)
			
		}
		#work center__task__search_find (close)
		
		#work center task my-past volunteer (open)
		elseif($page_section == "work center task my-past volunteer"){
			
			#function-table-of-god (open)
			if(1==1){
			
			#data preparation (open)
			if(1==1){
				#Please choose a name for your table like "task search and find"
				$table_of_god_name = "task mypast volunteer";
				#Please select all possible
				$table_of_god_query = $GLOBALS['wpdb']->prepare(
									 '
									SELECT * FROM fi4l3fg_voluno_items_tasks_properties
									RIGHT JOIN (
									SELECT *
									FROM fi4l3fg_voluno_items_tasks
										LEFT JOIN fi4l3fg_voluno_users_extended as aaa_author
										ON task_author_id = usersext_id
										LEFT JOIN fi4l3fg_voluno_development_organizations
										ON task_ngo_id = ngo_id
										LEFT JOIN fi4l3fg_voluno_lists_countries
										ON ngo_geographic_impact = list_countries_id
											LEFT JOIN
											(SELECT list_countries_id as list_countries_id_region,
												list_countries_name as list_countries_name_region
											FROM fi4l3fg_voluno_lists_countries) as bbb_region
											ON list_countries_region = list_countries_id_region
											LEFT JOIN
											(SELECT list_countries_id as list_countries_id_continent,
												list_countries_name as list_countries_name_continent
											FROM fi4l3fg_voluno_lists_countries) as ccc_continent
											ON list_countries_continent = list_countries_id_continent
										LEFT JOIN (
											SELECT *
											FROM fi4l3fg_voluno_applications
											WHERE
											application_type_general = "task" AND
											application_type_specific = "task_application" AND
											application_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.' AND
											application_status IN ("accepted")
											) as aaa_application_status
										ON task_id = application_type_id
									) as aaa_fulll
									ON taskprop_task_id = task_id
									LEFT JOIN fi4l3fg_voluno_lists_task_types
									ON taskprop_type_id = task_type_id
									LEFT JOIN fi4l3fg_voluno_development_organizations_properties
									ON ngo_id = ngo_prop_ngo_id
									WHERE task_status IN ("completed","failed","cancelled")
									  AND application_status IN ("accepted")
									GROUP BY task_id
									;'
									);
				$table_of_god_results = $GLOBALS['wpdb']->get_results($table_of_god_query);
			
				for($x=0;$x<count($table_of_god_results);$x++){
				#strings (up to 20)
					$table_of_god_data_strings1[]   = $table_of_god_results[$x]->task_description;
					$table_of_god_data_strings2[]   = $table_of_god_results[$x]->task_name;
					$table_of_god_data_strings3[]   = $table_of_god_results[$x]->task_status;
					$table_of_god_data_strings4[]   = $table_of_god_results[$x]->task_code;
					$table_of_god_data_strings5[]   = $table_of_god_results[$x]->usersext_displayName;
					$table_of_god_data_strings6[]   = $table_of_god_results[$x]->task_deadline;
					$table_of_god_data_strings7[]   = $table_of_god_results[$x]->task_assignment_deadline;
					$table_of_god_data_strings8[]   = $table_of_god_results[$x]->page_user_id;
					$table_of_god_data_strings9[]   = $table_of_god_results[$x]->ngo_name;
					$table_of_god_data_strings10[]  = $table_of_god_results[$x]->ngo_profile_id;
					$table_of_god_data_strings11[]  = $table_of_god_results[$x]->list_countries_name;
					$table_of_god_data_strings12[]  = $table_of_god_results[$x]->list_countries_name_region;
					$table_of_god_data_strings13[]  = $table_of_god_results[$x]->list_countries_name_continent;
					$table_of_god_data_strings14[]  = $table_of_god_results[$x]->list_countries_type;
					$table_of_god_data_strings15[]  = $table_of_god_results[$x]->application_status;
					$table_of_god_data_strings16[]  = $table_of_god_results[$x]->task_type_name;
					$table_of_god_data_strings17[]  = $table_of_god_results[$x]->task_expected_duration;
					$table_of_god_data_strings18[]  = $table_of_god_results[$x]->task_deadline;
					
				#numbers (up to 10)
					$table_of_god_data_numbers1[]   = $table_of_god_results[$x]->task_author_id;
					$table_of_god_data_numbers2[]   = $table_of_god_results[$x]->task_ngo_id;
					$table_of_god_data_numbers3[]   = $table_of_god_results[$x]->task_project_id;
					$table_of_god_data_numbers4[]   = $table_of_god_results[$x]->task_id;
				}
			}
			#data preparation (close)
			
			#table content
			if(1==1){
				
				$table_of_god_table_title = "Tasks I previously worked on"; #the title of the table in h4, together with hide option
				#$table_of_god_show_on_load = "no";
				$table_of_god_table_array = array(
					#Title of each column
					#the width of each column in the table in percent
					#mysql ordering name
					array("#",5),
					array("Task description",25,"tog_data_string2"),
					array("Deadline",15,"tog_data_string18"),
					array("Expected duration",10,"tog_data_string17"),
					array("Category",15,"tog_data_string16"),
					array("Author and organization",15,"tog_data_string9"),
					array("Status",20,"tog_data_string3")
					);
				
				#default ordering
					$table_of_god_default_order_by = "tog_data_string2"; # any of the third position ([2]) in the subarray of $table_of_god_table_array
					$table_of_god_default_order_by_direction = " ASC"; # " ASC"; or " DESC"; (space required)
				
			}
			#table content
			include("#function-table-of-god.php");
			}
			#function-table-of-god (close)
			
			#script (open)
			if(1==1){
			echo '
			<script>
				jQuery(document).ready(function(){
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_link").hover(function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").show();
				  },function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").hide();
				  });
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_button").click(function(){
				var mycurrent_volunteer_withdraw_application = "";
				mycurrent_volunteer_withdraw_application = 
				  confirm("Are you sure you want to withdraw your application to this task?'.
				  '\n You can reapply at any time, as long as the task is open for applications.")
				  if(mycurrent_volunteer_withdraw_application == true){
					jQuery(".loading_img_middle_page").show();
					var taskID = "cx";
					taskID = jQuery(this).parent().parent().parent().find(".task_id").html();
					jQuery(".work_center_mysql")'.
					'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
					'.members_net_work_center_mysql",{"task_mycurrent_volunteer_applicationwithdraw[]":['.
										'parseInt(taskID)'.
										']}, function() {
					jQuery(this).hide(0, function() {
						jQuery(this).show(function(){
						jQuery(".loading_img_middle_page").hide();
						});
					});
					});
					jQuery(this).parent().parent().parent().find("td").fadeOut(2000);
				  
				  jQuery(".task_id_"+parseInt(taskID)+".voluno_text_button_style").toggle();
				  }
				  });
				  
				});
			</script>';
			}
			#script (close)
			
		}
		#work center task my-past volunteer (close)
		
		
		
		#work center task my-current ngo (open)
		elseif($page_section == "work center task my-current ngo"){
			
			#function-table-of-god (open)
			if(1==1){
			
			#data preparation (open)
			if(1==1){
				#Please choose a name for your table like "task search and find"
				$table_of_god_name = "task mycurrent ngo";
				#Please select all possible
				$table_of_god_query = $GLOBALS['wpdb']->prepare('
									SELECT *
									FROM fi4l3fg_voluno_items_tasks'
									
									//author
									.' LEFT JOIN fi4l3fg_voluno_users_extended
									ON task_author_id = id'
									
									//ngo + who is worker of that ngo?
									.' LEFT JOIN (
											SELECT *
											FROM fi4l3fg_voluno_development_organizations
											LEFT JOIN fi4l3fg_voluno_development_organizations_properties
											ON ngo_id = ngo_prop_ngo_id
											WHERE ngo_prop_type_general = "position"
											AND ngo_prop_type_specific = "worker"
											) as aaa_ngo_info
									ON task_ngo_id = ngo_id'
									
									//applications and their status
									.' LEFT JOIN (
										SELECT *
										FROM fi4l3fg_voluno_applications
										WHERE
											application_type_general = "task" AND
											application_type_specific = "task_application" AND
											application_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.' AND
											application_status IN ("accepted","pending")
											) as aaa_application_status
									ON task_id = application_type_id'
									
									
									//task types -> task type names 
									.' LEFT JOIN (
											SELECT *
											FROM fi4l3fg_voluno_items_tasks_properties
											LEFT JOIN fi4l3fg_voluno_lists_task_types
											ON taskprop_type_id = task_type_id
											) AS aaa_task_type_names
									ON task_id = taskprop_task_id'
									
									//where
									.' WHERE task_status IN ("draft","unassigned","in progress")
									AND (
										ngo_prop_type_id = %s './*ngos where i'm affiliated*/'
										OR
										task_author_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
										'./*in case the ngo is not yet chosen, being the author is sufficient*/'
										)
									GROUP BY task_id;'
									,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
				$table_of_god_results = $GLOBALS['wpdb']->get_results($table_of_god_query);
				
				for($x=0;$x<count($table_of_god_results);$x++){
				#strings (up to 20)
					$table_of_god_data_strings1[]   = $table_of_god_results[$x]->task_description;
					$table_of_god_data_strings2[]   = $table_of_god_results[$x]->task_name;
					$table_of_god_data_strings3[]   = $table_of_god_results[$x]->task_status;
					$table_of_god_data_strings4[]   = $table_of_god_results[$x]->task_code;
					$table_of_god_data_strings5[]   = $table_of_god_results[$x]->usersext_displayName;
					$table_of_god_data_strings6[]   = $table_of_god_results[$x]->task_deadline;
					$table_of_god_data_strings7[]   = $table_of_god_results[$x]->task_assignment_deadline;
					$table_of_god_data_strings8[]   = $table_of_god_results[$x]->page_user_id;
					$table_of_god_data_strings9[]   = $table_of_god_results[$x]->ngo_name;
					$table_of_god_data_strings10[]  = $table_of_god_results[$x]->ngo_profile_id;
					$table_of_god_data_strings11[]  = $table_of_god_results[$x]->list_countries_name;
					$table_of_god_data_strings12[]  = $table_of_god_results[$x]->list_countries_name_region;
					$table_of_god_data_strings13[]  = $table_of_god_results[$x]->list_countries_name_continent;
					$table_of_god_data_strings14[]  = $table_of_god_results[$x]->list_countries_type;
					$table_of_god_data_strings15[]  = $table_of_god_results[$x]->application_status;
					$table_of_god_data_strings16[]  = $table_of_god_results[$x]->task_type_name;
					$table_of_god_data_strings17[]  = $table_of_god_results[$x]->task_expected_duration;
					if($table_of_god_results[$x]->task_status != "unassigned"){
					$table_of_god_data_strings18[]   = $table_of_god_results[$x]->task_deadline;
					}else{
					$table_of_god_data_strings18[]   = $table_of_god_results[$x]->task_assignment_deadline;
					}
					
				#numbers (up to 10)
					$table_of_god_data_numbers1[]   = $table_of_god_results[$x]->task_author_id;
					$table_of_god_data_numbers2[]   = $table_of_god_results[$x]->task_ngo_id;
					$table_of_god_data_numbers3[]   = $table_of_god_results[$x]->task_project_id;
					$table_of_god_data_numbers4[]   = $table_of_god_results[$x]->task_id;
				}
			}
			#data preparation (close)
			
			#table content
			if(1==1){
				
				$my_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_development_organizations_properties
								LEFT JOIN fi4l3fg_voluno_development_organizations
								ON ngo_prop_ngo_id = ngo_id
								WHERE ngo_prop_type_general = "position"
								AND ngo_prop_type_specific = "worker"
								AND ngo_prop_type_status = "accepted"
								AND ngo_prop_type_id = %s;'
								,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
				$my_ngos_results = $GLOBALS['wpdb']->get_results($my_ngos_query);
				
				if(count($my_ngos_results)>1){
				$table_of_god_table_title = "Current tasks of my organizations"; #the title of the table in h4, together with hide option
				}else{
				$table_of_god_table_title = "Current tasks of ".$my_ngos_results[0]->ngo_name;
				}
				
				$table_of_god_show_on_load = "yes";
				$table_of_god_table_array = array(
					#Title of each column
					#the width of each column in the table in percent
					#mysql ordering name
					array("#",5),
					array("Task description",25,"tog_data_string2"),
					array("Deadline",15,"tog_data_string18"),
					array("Expected duration",10,"tog_data_string17"),
					array("Category",15,"tog_data_string16"),
					array("Author and organization",15,"tog_data_string9"),
					array("Status",20,"tog_data_string3")
					);
				
				#default ordering
					$table_of_god_default_order_by = "tog_data_string1"; # any of the third position ([2]) in the subarray of $table_of_god_table_array
					$table_of_god_default_order_by_direction = " ASC"; # " ASC"; or " DESC"; (space required)
				
				#For the td content, please look at: #function-table-of-god#example.php
				
			}
			#table content
			include("#function-table-of-god.php");
			}
			#function-table-of-god (close)
			
			#script and absolute positioned divs (open)
			if(1==1){
			echo '
			<script>
				jQuery(document).ready(function(){
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_link").hover(function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").show();
				  },function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").hide();
				  });
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_button").click(function(){
				var mycurrent_volunteer_withdraw_application = "";
				mycurrent_volunteer_withdraw_application = 
				  confirm("Are you sure you want to withdraw your application to this task?'.
				  '\n You can reapply at any time, as long as the task is open for applications.")
				  if(mycurrent_volunteer_withdraw_application == true){
					jQuery(".loading_img_middle_page").show();
					var taskID = "cx";
					taskID = jQuery(this).parent().parent().parent().find(".task_id").html();
					jQuery(".work_center_mysql")'.
					'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
					'.members_net_work_center_mysql",{"task_mycurrent_volunteer_applicationwithdraw[]":['.
										'parseInt(taskID)'.
										']}, function() {
					jQuery(this).hide(0, function() {
						jQuery(this).show(function(){
						jQuery(".loading_img_middle_page").hide();
						});
					});
					});
					jQuery(this).parent().parent().parent().find("td").fadeOut(2000);
				  
				  jQuery(".task_id_"+parseInt(taskID)+".voluno_text_button_style").toggle();
				  }
				  });
				  
				});
			</script>';
			}
			#script and absolute positioned divs (close)
			
			#script and absolute positioned divs (open)
			if(1==1){/*
			echo '
			<script>
				jQuery(document).ready(function(){            
				var taskName = "";
				var taskDescription = "";
				var taskDeadline = "";
				var taskID = "";
				var taskNgo = "";
				var taskCode = "";
				jQuery(".apply_link").click(function(){
					taskName = jQuery(this).parent().parent().find(".task_name").html();
					taskDescription = jQuery(this).parent().parent().find(".task_description").html();
					taskDeadline = jQuery(this).parent().parent().find(".task_deadline").html();
					taskID = jQuery(this).parent().parent().find(".task_id").html();
					taskNgo = jQuery(this).parent().parent().find(".task_ngo").html();
					taskCode = jQuery(this).parent().parent().find(".task_code").html();
					
					jQuery(".taskName").html(taskName);
					jQuery(".taskDescription").html(taskDescription);
					jQuery(".taskDeadline").html(taskDeadline);
					jQuery(".taskID").html(taskID);
					jQuery(".taskNgo").html(taskNgo);
					jQuery(".taskCode").html(taskCode);
					jQuery(".application_div").show();
				});
				
				var ClickCount = "";
				jQuery(document).click(function(){
					ClickCount++;
					if(ClickCount >= 2){
					jQuery(".application_div_successful").stop(true).hide();
					}
				});
				
				var applicationText = "";
				jQuery(".application_div_apply").click(function(){
					jQuery(".application_div").hide();
					applicationText = jQuery("#application_text").val();
					ClickCount = 0;
					jQuery(".loading_page").show();
					jQuery(".work_center_mysql")'.
					'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
					'.members_net_work_center_mysql",{"task_application_apply_array[]":['.
										'parseInt(taskID),'.
										'taskCode,'.
										'applicationText'.
										']}, function() {
					jQuery(this).hide(0, function() {
						jQuery(this).show(function(){
						jQuery(".loading_page").hide();
						jQuery(".application_div_successful").show(function(){
							jQuery(".application_div_successful").fadeOut(5500);
							jQuery(".apply_link.task_id_"+parseInt(taskID)).hide();
							jQuery(".apply_withdraw_link.task_id_"+parseInt(taskID)).show();
						});
						});
					});
					});
					
			
				});
			
				jQuery(".apply_withdraw_link").click(function(){
					taskID = jQuery(this).parent().parent().find(".task_id").html();
					withdrawApplication = confirm("Are you sure you want to cancel your application for this task?");
					if (withdrawApplication == true) {
						jQuery(".loading_page").show();
						jQuery(".work_center_mysql")'.
						'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
						'.members_net_work_center_mysql",{"task_application_withdraw_array[]":['.
											'parseInt(taskID)'.
											']}, function() {
						jQuery(this).hide(0, function() {
							jQuery(this).show(function(){
							jQuery(".loading_page").hide();
							jQuery(".apply_link.task_id_"+parseInt(taskID)).show();
							jQuery(".apply_withdraw_link.task_id_"+parseInt(taskID)).hide();
							jQuery(".application_div_withdrawn").show(function(){
								jQuery(".application_div_withdrawn").fadeOut(5500);
							});
							});
						});
						});
					}
				});
				
				});
			</script>';
			
			#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no
				$function_fixed_div_div_name = "application_div"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 17
				$function_fixed_div_height_div = 80;
				include('#function-fixed-div.php');
				echo '
				<div style="text-align:center;">
					<strong>
					Apply for task:
					</strong>
					<br>
					<h2 style="display:inline;margin:20px;">
					<span class="taskName"">
						Apply for task:
					</span>
					</h2>
				</div>
				<br>';
				$apply_td_title_array = array("Description","Deadline","Development organization","Task ID");
				$apply_td_class_array = array("taskDescription","taskDeadline","taskNgo","taskID");
				echo '
				<table style="width:75%;margin-left:auto;margin-right:auto;">';
					for($x=0;$x<count($apply_td_title_array);$x++){
					echo '
					<tr>
						<td style="width:100px;">
						<strong>
							'.$apply_td_title_array[$x].':
						</strong>
						</td>
						<td class="'.$apply_td_class_array[$x].'" style="vertical-align:middle;">
						</td>
					</tr>';
					}
				echo '
				</table>
				<br>';
					#function-help-word.php
					$function_help_word_hover_link = "<strong>Application text</strong>";
					$function_help_word_width = 90;
					$function_help_word_help_content = '
						<p><strong>
						Application text
						</strong>
						<br>
						If you want to, you can add a text to your application. This helps the development
						organization to determine, if you are the candidate most suited for the task. For example:</p>
						<ul>
						<li>
							What motivates you to apply for this task?
						</li>
						<li>
							Why you believe that you are qualified to complete the task?
						</li>
						<li>
							How you plan to execute the task (e.g. "I can complete this in just one day, using MS Excel")?
						</li>
						<li>
							Any other interesting information.
						</li>
						</ul>';
					include('#function-help-word.php');
				echo '
				<br>
				<br>
				<form method="post">
					<textarea '.
					'name="application_text" '.
					'id="application_text" '.
					'style="width:98.5%;height:7em;resize:vertical;"'.
					'>test test test</textarea>
				</form>
				<div
					class="voluno_text_button_style application_div_apply"
					style="
					margin: 30px auto;
					background:#8B0000;
					cursor: pointer;
					width:100px;
					"
				>
					Send application
				</div>';
			#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
				
			#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_width_div = 300; //only relevant for part 1, default 750 (px)
				$function_fixed_div_border_radius = 25; //optional, default is 0
				$function_fixed_div_cancel_button = "no"; //optional, default is yes
				$function_fixed_div_div_name = "application_div_successful"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
				$function_fixed_div_text_align = "center";
				$function_fixed_div_height_div = "none";
				$function_fixed_div_darkened_bg = "no";
				include('#function-fixed-div.php');
				echo '
				<h2 style="display:inline;">
					Application submitted successfully!
				</h2>';
			#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
			
			#function-fixed-div.php
				$function_fixed_div_part = 1; //1 or 2, obligatory
				$function_fixed_div_width_div = 300; //only relevant for part 1, default 750 (px)
				$function_fixed_div_border_radius = 25; //optional, default is 0
				$function_fixed_div_cancel_button = "no"; //optional, default is yes
				$function_fixed_div_div_name = "application_div_withdrawn"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
				$function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
				$function_fixed_div_text_align = "center";
				$function_fixed_div_height_div = "none";
				$function_fixed_div_darkened_bg = "no";
				include('#function-fixed-div.php');
				echo '
				<h2 style="display:inline;">
					Application withdrawn successfully!
				</h2>';
			#function-fixed-div.php
				$function_fixed_div_part = 2; //1 or 2, both are obligatory
				include('#function-fixed-div.php');
				*/
			}
			#script and absolute positioned divs (close)
			
		}
		#work center task my-current ngo (close)
		
		#create task (open)
		elseif($page_section == "work center task create"){
			
			#mysql update (open)
			if(1==1){
			
			#update (open)
			if(isset($_POST['task_create_title'])){
				
				#prepare (open)
				if(1==1){
				$task_create_title = sanitize_text_field($_POST['task_create_title']);
				$task_create_description = sanitize_text_field($_POST['task_create_description']);
				$task_create_ngo = intval($_POST['task_create_ngo']);
				$task_create_project = intval($_POST['task_create_project']);
				$task_create_status = sanitize_text_field($_POST['task_create_status']);
				
				$task_create_deadline_day = intval($_POST['task_create_deadline_day']);
				$task_create_deadline_month = intval($_POST['task_create_deadline_month']);
				$task_create_deadline_year = intval($_POST['task_create_deadline_year']);
				$task_create_deadline = $task_create_deadline_year.'-'.
							sprintf("%02d",$task_create_deadline_month).
							'-'.
							sprintf("%02d",$task_create_deadline_day).' 00:00:00';
				$task_create_assignment_deadline_day = intval($_POST['task_create_assignment_deadline_day']);
				$task_create_assignment_deadline_month = intval($_POST['task_create_assignment_deadline_month']);
				$task_create_assignment_deadline_year = intval($_POST['task_create_assignment_deadline_year']);
				$task_create_assignment_deadline = $task_create_assignment_deadline_year.'-'.
									sprintf("%02d",$task_create_assignment_deadline_month).
									'-'.
									sprintf("%02d",$task_create_assignment_deadline_day).' 00:00:00';
				foreach($_POST['create_task_type_input'] as $create_task_type_input_row){
					$create_task_type_input[] = intval($create_task_type_input_row);
				}
				}
				#prepare (close)
				
				#write to database (open)
				if(1==1){
				
				#insert new task 
					$random_string = chr(mt_rand(97,122)).substr(md5(time()),1);
					$GLOBALS['wpdb']->insert(
							'fi4l3fg_voluno_items_tasks', 
						array(
							'task_name' => $task_create_title,
							'task_description' => $task_create_description,
							'task_ngo_id' => $task_create_ngo,
							'task_project_id' => $task_create_project,
							'task_deadline' => $task_create_deadline,
							'task_assignment_deadline' => $task_create_assignment_deadline,
							'task_status' => $task_create_status,
							'task_code' => $random_string,
							'task_author_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
						),
						array( 
							'%s',
							'%s',
							'%d',
							'%d',
							'%s',
							'%s',
							'%s',
							'%s',
							'%s'
						));
				#insert new task properties
				$highest_task_id_query = $GLOBALS['wpdb']->prepare('SELECT task_id
										 FROM fi4l3fg_voluno_items_tasks
										 ORDER BY task_id DESC
										 LIMIT 1');
				$highest_task_id_row = $GLOBALS['wpdb']->get_row($highest_task_id_query);
				$highest_task_id = $highest_task_id_row->task_id;
				foreach($create_task_type_input as $create_task_type_input_row){
					$GLOBALS['wpdb']->insert( 
							'fi4l3fg_voluno_items_tasks_properties', 
						array(
							'taskprop_task_id' => $highest_task_id,
							'taskprop_type' => "type",
							'taskprop_type_id' => $create_task_type_input_row
						),
						array( 
							'%d',
							'%s',
							'%d'
						));
				}
				}
				#write to database (close)
				
				#update confirmation for admin (open)
				if(current_user_can('manage_options')){
				echo '
				The task was successfully created!
				<table style="width:200px;">
					<tr>
					<td style="width:50px;">
						KTitle:
					</td>
					<td>
						'.$task_create_title.'
					</td>
					</tr>
					<tr>
					<td>
						KDescription:
					</td>
					<td>
						'.$task_create_description.'
					</td>
					</tr>
					<tr>
					<td>
						KStatus:
					</td>
					<td>
						'.$task_create_status.'
					</td>
					</tr>
					<tr>
					<td>
						KDeadline:
					</td>
					<td>
						'.$task_create_deadline.'
					</td>
					</tr>
					<tr>
					<td>
						KAssignment Deadline:
					</td>
					<td>
						'.$task_create_assignment_deadline.'
					</td>
					</tr>
					<tr>
					<td>
						KUser Id:
					</td>
					<td>
						'.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
					</td>
					</tr>
					<tr>
					<td>
						Project:
					</td>
					<td>
						'.$task_create_project.'
					</td>
					</tr>
					<tr>
					<td>
						KNGO:
					</td>
					<td>
						'.$task_create_ngo.'
					</td>
					</tr>
					<tr>
					<td>
						KTask type list:
					</td>
					<td>';
						foreach($_POST['create_task_type_input'] as $create_task_type_input_row){
						echo
						$create_task_type_input_row.'<br>';
						}
					echo '
					</td>
					</tr>
				</table>';
				}
				#update confirmation for admin (close)
				
			}
			#update (close)
			
			}
			#mysql update (close)
			
			#jquery (open)
			if(1==1){
			
			echo '
			<script>
				jQuery(document).ready(function(){';
				
				#expand task creation menu (open)
				if(1==1){
					echo '
					jQuery(".new_task_link").click(function(){
					jQuery(".new_task_link, .new_task_content").slideToggle();
					});';
				}
				#expand task creation menu (close)
				
				#dome (open)
				if(1==2){
					/*
					jQuery.trim(jQuery("#textfield_create_reply_content").val()) === ""
					
					jQuery("#textfield_create_reply_content").keypress(function(){
					jQuery("#error_no_message").fadeOut(1000);
					});
					
					
					*/
				}
				#dome (close)
				
				#Remove comments (open)
				if(1==1){
					echo '
					jQuery("#task_create_title").keypress(function(){
					if(jQuery(this).val() != ""){
						jQuery(".input_check_task_create_title").fadeOut(500);
					}
					});
					jQuery("#task_create_description").keypress(function(){
					if(jQuery(this).val() != ""){
						jQuery(".input_check_task_create_description").fadeOut(500);
					}
					});
					jQuery(".create_task_select_type_content").change(function(){
					jQuery(".input_check_task_create_type").fadeOut(500);
					});
					jQuery("'.
					'#task_create_deadline_day,'.
					'#task_create_deadline_month,'.
					'#task_create_deadline_year'.
					'").change(function(){
					if(
						jQuery("#task_create_deadline_day"  ).val() != "none" &&
						jQuery("#task_create_deadline_month").val() != "none" &&
						jQuery("#task_create_deadline_year" ).val() != "none"
					){
						jQuery(".input_check_task_create_deadline").fadeOut(500);
					}
					});
					jQuery("'.
					'#task_create_assignment_deadline_day,'.
					'#task_create_assignment_deadline_month,'.
					'#task_create_assignment_deadline_year'.
					'").change(function(){
					if(
						jQuery("#task_create_assignment_deadline_day"  ).val() != "none" &&
						jQuery("#task_create_assignment_deadline_month").val() != "none" &&
						jQuery("#task_create_assignment_deadline_year" ).val() != "none"
					){
						jQuery(".input_check_task_create_assignment_deadline").fadeOut(500);
					}
					});
					jQuery("#task_create_status").change(function(){
					if(jQuery(this).val() != "none"){
						jQuery(".input_check_task_create_status").fadeOut(500);
					}
					});';
				}
				#Remove comments (close)
				
				#Check and add comments (open)
				if(1==1){
					echo '
					jQuery("form[name=create_task_form]").submit(function() {
					taskCreateAllFieldsOk = 1;
					if(jQuery("#task_create_title").val() == ""){
						taskCreateAllFieldsOk++;
						jQuery(".input_check_task_create_title").fadeIn(500);
					}
					if(jQuery("#task_create_description").val() == ""){
						taskCreateAllFieldsOk++;
						jQuery(".input_check_task_create_description").fadeIn(500);
					}
					if(
						jQuery("#task_create_deadline_day").val() == "none" ||
						jQuery("#task_create_deadline_month").val() == "none" ||
						jQuery("#task_create_deadline_year").val() == "none"
					){
						taskCreateAllFieldsOk++;
						jQuery(".input_check_task_create_deadline").fadeIn(500);
					}
					if(
						jQuery("#task_create_assignment_deadline_day").val() == "none" ||
						jQuery("#task_create_assignment_deadline_month").val() == "none" ||
						jQuery("#task_create_assignment_deadline_year").val() == "none"
					){
						taskCreateAllFieldsOk++;
						jQuery(".input_check_task_create_assignment_deadline").fadeIn(500);
					}
					if(jQuery("#task_create_status").val() == "none"){
						taskCreateAllFieldsOk++;
						jQuery(".input_check_task_create_status").fadeIn(500);
					}
					
					var NumOfTaskTypesSelected = 0;
					jQuery(".create_task_select_type_content").find("input").each(function(){
						if (jQuery(this).prop("checked")==true){ 
						NumOfTaskTypesSelected++;
						}
					});
					if(NumOfTaskTypesSelected == 0){
						jQuery(".input_check_task_create_type").fadeIn(500);
						taskCreateAllFieldsOk++;
					}
					
					'./*if (taskCreateAllFieldsOk > 1 && 1 === 2) {*/'
					if (taskCreateAllFieldsOk > 1) {
						return false;
					}
					});';
				}
				#Check and add comments (close)
				
				#submit form (open)
				if(1==1){
					echo '
					jQuery(".task_create_submit").click(function(){
					jQuery(".create_task_form").submit();
					});';
				}
				#submit form (close)
				
				echo '
				});
			</script>';
			
			}
			#jquery (close)
			
			#content (open)
			if(1==1){
			
			#extension link (open)
			if(1==1){
				echo '
				<div style="text-align:center;">
				<br><br><br><br>
				<h4>
					<div class="new_task_link" style="cursor:pointer;">
					<a>Create new task (show menu)</a>
					</div>
					<div class="new_task_link" style="cursor:pointer;display:none;">
					<a>Create new task (hide menu)</a>
					</div>
				</h4>
				</div>';
			}
			#extension link (close)
			
			#function-personal-pages.php (open)
			if(1==1){
				$pers_pages_active_page = 4;
				$pers_pages_id = 1;
				include("#function-personal-pages.php");
			}
			#function-personal-pages.php (close)
			
			#form (open)
			if(1==1){
				$form_td_title_format = "width:15%;font-weight:bold;text-align:right;padding-right:15px;";
				$form_field_width = "98%";
				echo '
				<form method="post" name="create_task_form" class="create_task_form">
				<table style="margin:auto;width:80%;display:none;" class="new_task_content">';
					
					#select project (open)
					if(1==2){
					
					#mysql (open)
					if(1==1){
					/* $my_organizations_query = $GLOBALS['wpdb']->prepare('SELECT *
										 FROM fi4l3fg_voluno_development_organizations_affiliates
											LEFT JOIN fi4l3fg_voluno_development_organizations
											ON ngo_prop_ngo_id = ngo_id
										 WHERE ngo_prop_user_id = %s
											AND (ngo_prop_user_type = %s
											OR ngo_prop_user_type = %s
											OR ngo_prop_user_type = %s);',
										 $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
										 "staff",
										 "agent",
										 "project volunteer");
					$my_organizations_results = $GLOBALS['wpdb']->get_results($my_organizations_query);*/
					}
					#mysql (close)
					
					#table row (open)
					if(1==1){
						#  if(count($my_organizations_results)>1){
						echo '
						<tr>
						<td style="'.$form_td_title_format.'">';
							#function-help-word.php
							$function_help_word_hover_link = "Project:"; //1, 2 or 3, obligatory
							$function_help_word_help_content = "<strong>Is the task part of a project?</strong>";
							include('#function-help-word.php');
						echo '
						</td>
						<td>
							<select name="task_create_project">
							<option value="none">
								Task is not part of a project
							</option>';
						#                        foreach($my_organizations_results as $my_organizations_row){
						 #                           echo '
						  #                          <option>
						   #                             '.$my_organizations_row->ngo_name.'
							#                        </option>';
							 #                   }
							echo '
							</select>
						</td>
						</tr>';
						#}
					}
					#table row (close)
					
					}
					#select project (close)
					
					#select task status (open)
					if(1==1){
					echo '
					<tr>
						<td style="'.$form_td_title_format.'">';
						#function-help-word.php
							$function_help_word_hover_link = "Task status";
							$function_help_word_help_content = '
							<p><b>Is the task ready?</b><br>
							If the task is not yet ready, you can save it as draft and edit and publish it later on.</p>';
							include('#function-help-word.php');
						echo '
						</td>
						<td>
						<select name="task_create_status" id="task_create_status">
							<option selected="selected" value="none">Please select a status</option>
							<option value="unassigned">Publish</option>
							<option value="in preparation">Save draft</option>
						</select>
						<span style="color:red;margin-left:10px;display:none;" class="input_check_task_create_status">
							Please select a status.
						</span>
						</td>
					</tr>';
					}
					#select task status (close)
					
					echo '
					<tr>
					<td colspan="2" style="text-align:center;">
						<div class="voluno_button task_create_submit" style="margin:auto;width:100px;">
						Create task
						</div>
					</td>
					</tr>
				</table>
				</form>';
			}
			#form (close)
			
			}
			#content (close)
			
			#
			if(1==3){
			/* #        $order_path = "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
				$order_path = get_permalink(688)."?";
				$table_titles = array("Task description",
							  "Deadline",
							  "Country",
							  "Region",
							  "Category",
							  "Author and organization",
							  "Applicants",
							  "Apply");
				$table_title_order_links = array("task",
								 "deadline",
								 "country",
								 "region",
								 "category",
								 "author",
								 "applicants",
								 "apply");
				$table_titles_width = array(30,10,15,15,15,15);
				for($x=0;$x<6;$x++){
				echo '
				<td
					style="
					background-color:#8B0000;
					text-align:center;
					vertical-align:middle;
					font-weight:bold;
					color:white;
					width:'.$table_titles_width[$x].'%;"
					class="table_head_hover"
				>
					<a
					href="'.$order_path.'order='.$table_title_order_links[$x].'"
					title="Order by '.strtolower($table_titles[$x]).'"
					>
					<div style="color:#fff;">
						'.$table_titles[$x].'
					</div>
					</a>
				</td>
				<script>
					jQuery(document).ready(function(){
					jQuery(".table_head_hover").hover(function(){
						jQuery(this).css("background-color","#B30000");
					},function(){
						jQuery(this).css("background-color","#8B0000");
					});
					});
				</script>';
				}
				echo '
				</tr>';
				$ts_item = 0;
				for($x=$function_pagination_lower_limit-1;$x<$function_pagination_upper_limit;$x++){
				if(empty($task_search_results[$x]->task_name)){
					break;
				}
				$ts_item++;
				$ts_item_positive = $ts_item_positive * (-1);
				if($ts_item % 2 == 0){
					$ts_row_bg_color = "FFF5E0";
					$hover_row = "hover_row1";
				}else{
					$ts_row_bg_color = "";
					$hover_row = "hover_row2";
				}
				echo '
				<tr style="border-top:1px dotted grey;background-color:#'.$ts_row_bg_color.';" class="'.$hover_row.'">
					<td style="text-align:justify;">
					<a
						href="'.get_permalink($post->ID).'?id='.$task_search_results[$x]->task_id.'"
						title="Visit task page for more details"
					>
						<b>'.
						$task_search_results[$x]->task_name.'
						</b>
					</a>
					<br>';
					#function-only-first-x-symbols.php
						$function_only_first_x_symbols = $task_search_results[$x]->task_description; #content
						$function_only_first_x_symbols_num = 100; #number of symbols
						include('#function-only-first-x-symbols.php');
					echo '
					</td>
					<td>';
					$ts_deadline_var = strtotime($task_search_results[$x]->task_deadline);
					echo 
					date("d. M Y", $ts_deadline_var).'<br>'.date("g:i a", $ts_deadline_var).'<br>';
					$days_till_deadline =
						GregorianToJD(
						date("n",$ts_deadline_var),
						date("j",$ts_deadline_var),
						date("Y",$ts_deadline_var))-
						GregorianToJD(
						date("n",time()),
						date("j",time()),
						date("Y",time()));
					echo
					'('.$days_till_deadline.' days left)
					</td>
					<td>
					'.$task_search_results[$x]->list_countries_name;
					if(!empty($task_search_results[$x]->list_countries_name)){
						echo ',<br>';
					}
					echo $task_search_results[$x]->list_countries_region;
					if(!empty($task_search_results[$x]->list_countries_region)){
						echo ',<br>';
					}
					echo $task_search_results[$x]->list_countries_continent.'
					</td>
					<td>
					</td>
					<td>
					</td>
					<td style="text-align:center;">
					<a href="aaaaaaaaaaaaa/archives/user-profile/'.
						$task_search_results[$x]->page_user_id.'"
						title="Visit profile of '.$task_search_results[$x]->usersext_displayName.'"
					>
						'.$task_search_results[$x]->usersext_displayName.'
					</a>
					<br>
					for
					<br> 
					<a href="aaaaaaaaaaaa/archives/user-profile/'.
						$task_search_results[$x]->ngo_profile_id.'"
						title="Visit profile of '.$task_search_results[$x]->ngo_name.'"
					>
						'.$task_search_results[$x]->ngo_name.'
					</a>
					</td>
				</tr>';
				}
				
				echo '
				<tr>
				<td style="text-align:center;" colspan="7">
				</td>
				</tr>
			</table>
			
			<script>
				jQuery(document).ready(function(){
				jQuery(".hover_row2").hover(function(){
					jQuery(this).css("background-color","#FFC977");
				},function(){
					jQuery(this).css("background-color","");
				});
				jQuery(".hover_row1").hover(function(){
					jQuery(this).css("background-color","#FFC977");
				},function(){
					jQuery(this).css("background-color","#FFF5E0");
				});
				});
			</script>';
			*/
			
			}
			#
			
			echo '
			<br><br><br><br><br>';
			
		}
		#create task (open)
		
		#work center task my-past ngo (open)
		elseif($page_section == "work center task my-past ngo"){
			
			#function-table-of-god (open)
			if(1==21){
			
			#data preparation (open)
			if(1==1){
				#Please choose a name for your table like "task search and find"
				$table_of_god_name = "task mypast ngo";
				#Please select all possible
				$table_of_god_query = $GLOBALS['wpdb']->prepare(
									
									'SELECT *
									FROM fi4l3fg_voluno_items_tasks'.
									
									/*author*/'
									LEFT JOIN fi4l3fg_voluno_users_extended as aaa_author
									ON task_author_id = id'.
									
									/*ngo */'
									LEFT JOIN (
										SELECT *
										FROM fi4l3fg_voluno_development_organizations'.
										
										/*is current user member?*/'
										LEFT JOIN fi4l3fg_voluno_development_organizations_properties
										ON ngo_id = ngo_prop_ngo_id
										
										) as aaa_ngo
									ON task_ngo_id = ngo_id'.
									
									/*assigned volunteer*/'
									LEFT JOIN (
										SELECT *
										FROM fi4l3fg_voluno_applications
										LEFT JOIN (
											SELECT id AS volunteer_id, usersext_displayName AS volunteer_name
											FROM fi4l3fg_voluno_users_extended
											) as aaa_assigned_volunteer
										ON application_user_id = volunteer_id'/*
										WHERE
										application_type_general = "task" AND
										application_type_specific = "task_application" AND
										application_status IN ("accepted","dismissed","resigned")*/.'
										) as aaa_applications
									ON task_id = application_type_id'.
									
									 
									 /*'
									SELECT * FROM fi4l3fg_voluno_items_tasks_properties
									RIGHT JOIN (
									
									) as aaa_fulll
									ON taskprop_task_id = task_id
									LEFT JOIN fi4l3fg_voluno_lists_task_types
									ON taskprop_type_id = task_type_id
		
									*/
									'
									WHERE task_status IN ("completed","cancelled")
									AND ngo_prop_type_general = "position"
									AND ngo_prop_type_specific = "worker"
									AND ngo_prop_type_status = "accepted"
									AND ngo_prop_type_id = %s
									GROUP BY task_id;'
									
									,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
				$table_of_god_results = $GLOBALS['wpdb']->get_results($table_of_god_query);
				
				for($x=0;$x<count($table_of_god_results);$x++){
				#strings (up to 20)
					$table_of_god_data_strings1[]   = $table_of_god_results[$x]->task_description;
					$table_of_god_data_strings2[]   = $table_of_god_results[$x]->task_name;
					$table_of_god_data_strings3[]   = $table_of_god_results[$x]->task_status;
					$table_of_god_data_strings4[]   = $table_of_god_results[$x]->task_code;
					$table_of_god_data_strings5[]   = $table_of_god_results[$x]->usersext_displayName;
					$table_of_god_data_strings6[]   = $table_of_god_results[$x]->task_deadline;
					$table_of_god_data_strings7[]   = $table_of_god_results[$x]->task_assignment_deadline;
					$table_of_god_data_strings8[]   = $table_of_god_results[$x]->page_user_id;
					$table_of_god_data_strings9[]   = $table_of_god_results[$x]->ngo_name;
					$table_of_god_data_strings10[]  = $table_of_god_results[$x]->ngo_profile_id;
					$table_of_god_data_strings11[]  = $table_of_god_results[$x]->list_countries_name;
					$table_of_god_data_strings12[]  = $table_of_god_results[$x]->list_countries_name_region;
					$table_of_god_data_strings13[]  = $table_of_god_results[$x]->list_countries_name_continent;
					$table_of_god_data_strings14[]  = $table_of_god_results[$x]->list_countries_type;
					$table_of_god_data_strings15[]  = $table_of_god_results[$x]->application_status;
					$table_of_god_data_strings16[]  = $table_of_god_results[$x]->task_type_name;
					$table_of_god_data_strings17[]  = $table_of_god_results[$x]->task_expected_duration;
					$table_of_god_data_strings18[]  = $table_of_god_results[$x]->volunteer_name;
					
				#numbers (up to 10)
					$table_of_god_data_numbers1[]   = $table_of_god_results[$x]->task_author_id;
					$table_of_god_data_numbers2[]   = $table_of_god_results[$x]->task_ngo_id;
					$table_of_god_data_numbers3[]   = $table_of_god_results[$x]->task_project_id;
					$table_of_god_data_numbers4[]   = $table_of_god_results[$x]->task_id;
					$table_of_god_data_numbers5[]   = $table_of_god_results[$x]->volunteer_id;
					
				}
			}
			#data preparation (close)
			
			#table content
			if(1==1){
				
				$my_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_development_organizations_properties
								LEFT JOIN fi4l3fg_voluno_development_organizations
								ON ngo_prop_ngo_id = ngo_id
								WHERE ngo_prop_type_general = "position"
								AND ngo_prop_type_specific = "worker"
								AND ngo_prop_type_status = "accepted"
								AND ngo_prop_type_id = %s;'
								,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
				$my_ngos_results = $GLOBALS['wpdb']->get_results($my_ngos_query);
				
				if(count($my_ngos_results)>1){
				$table_of_god_table_title = "Past tasks of my organizations"; #the title of the table in h4, together with hide option
				}else{
				$table_of_god_table_title = "Past tasks of ".$my_ngos_results[0]->ngo_name;
				}
				
				$table_of_god_show_on_load = "yes";
				$table_of_god_table_array = array(
					#Title of each column
					#the width of each column in the table in percent
					#mysql ordering name
					array("#",5),
					array("Task description",30,"tog_data_string2"),
					array("Deadline",10,"tog_data_string5"),
					array("Category",10,"tog_data_string16"),
					array("Assigned volunteer",10,"tog_data_strings18"),
					array("Author and organization",15,"tog_data_string9"),
					array("Status",20,"tog_data_string3")
					);
				
				#default ordering
					$table_of_god_default_order_by = "tog_data_string2"; # any of the third position ([2]) in the subarray of $table_of_god_table_array
					$table_of_god_default_order_by_direction = " ASC"; # " ASC"; or " DESC"; (space required)
				
			}
			#table content
			include("#function-table-of-god.php");
			}
			#function-table-of-god (close)
			
			
			#script (open)
			if(1==1){
			echo '
			<script>
				jQuery(document).ready(function(){
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_link").hover(function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").show();
				  },function(){
				jQuery(this).find(".mycurrent_volunteer_withdraw_application_button").hide();
				  });
				  
				  jQuery(".mycurrent_volunteer_withdraw_application_button").click(function(){
				var mycurrent_volunteer_withdraw_application = "";
				mycurrent_volunteer_withdraw_application = 
				  confirm("Are you sure you want to withdraw your application to this task?'.
				  '\n You can reapply at any time, as long as the task is open for applications.")
				  if(mycurrent_volunteer_withdraw_application == true){
					jQuery(".loading_img_middle_page").show();
					var taskID = "cx";
					taskID = jQuery(this).parent().parent().parent().find(".task_id").html();
					jQuery(".work_center_mysql")'.
					'.load("/voluno/archives/members-net-page/work-center-mysql !!!! FORMERLY M-PLACE-mysql, HAS BEEN DELETED!!!! '.
					'.members_net_work_center_mysql",{"task_mycurrent_volunteer_applicationwithdraw[]":['.
										'parseInt(taskID)'.
										']}, function() {
					jQuery(this).hide(0, function() {
						jQuery(this).show(function(){
						jQuery(".loading_img_middle_page").hide();
						});
					});
					});
					jQuery(this).parent().parent().parent().find("td").fadeOut(2000);
				  
				  jQuery(".task_id_"+parseInt(taskID)+".voluno_text_button_style").toggle();
				  }
				  });
				  
				});
			</script>';
			}
			#script (close)
			
		}
		#work center task my-past ngo (close)
		
		
    }
    #task sections (close)
    
    #training sections (open) #modified
    if(1==1){
		
		#work center training search-find (open)
		if($page_section == "work center training search-find"){
			
			//insert table function here
			
			#
			if(1==2){
			/*
			
			
			$task_search_query = $GLOBALS['wpdb']->prepare('SELECT *
			
							 ;'#   ORDER BY '.$order1.' '.$order2.';'
								);
			$task_search_results = $GLOBALS['wpdb']->get_results($task_search_query);
			
			
			
			echo '
			<table>
				<tr>
				<td colspan="100" style="text-align:center;">
					<h4>
					Overview of all currently available trainings
					</h4>
				</td>
				</tr>
				<tr>';
			#        $order_path = "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
				$order_path = get_permalink(688)."?";
				$table_titles = array("Training description",
							  "Dates",
							  "Country",
							  "Region",
							  "Category",
							  "Author and organization",
							  "Applicants",
							  "Apply");
				$table_title_order_links = array("task",
								 "deadline",
								 "country",
								 "region",
								 "category",
								 "author",
								 "applicants",
								 "apply");
				$table_titles_width = array(30,10,15,15,15,15);
				for($x=0;$x<6;$x++){
				echo '
				<td
					style="
					background-color:#8B0000;
					text-align:center;
					vertical-align:middle;
					font-weight:bold;
					color:white;
					width:'.$table_titles_width[$x].'%;"
					class="table_head_hover"
				>
					<a
					href="'.$order_path.'order='.$table_title_order_links[$x].'"
					title="Order by '.strtolower($table_titles[$x]).'"
					>
					<div style="color:#fff;">
						'.$table_titles[$x].'
					</div>
					</a>
				</td>
				<script>
					jQuery(document).ready(function(){
					jQuery(".table_head_hover").hover(function(){
						jQuery(this).css("background-color","#B30000");
					},function(){
						jQuery(this).css("background-color","#8B0000");
					});
					});
				</script>';
				}
				echo '
				</tr>';
				$ts_item = 0;
				for($x=$function_pagination_lower_limit-1;$x<$function_pagination_upper_limit;$x++){
				if(empty($task_search_results[$x]->vol_trainings_title)){
					break;
				}
				$ts_item++;
				$ts_item_positive = $ts_item_positive * (-1);
				if($ts_item % 2 == 0){
					$ts_row_bg_color = "FFF5E0";
					$hover_row = "hover_row1";
				}else{
					$ts_row_bg_color = "";
					$hover_row = "hover_row2";
				}
				echo '
				<tr style="border-top:1px dotted grey;background-color:#'.$ts_row_bg_color.';" class="'.$hover_row.'">
					<td style="text-align:justify;">
					<a
						href="'.get_permalink($post->ID).'?id='.$task_search_results[$x]->vol_trainings_id.'"
						title="Visit task page for more details"
					>
						<b>'.
						$task_search_results[$x]->vol_trainings_title.'
						</b>
					</a>
					<br>';
					#function-only-first-x-symbols.php
						$function_only_first_x_symbols = $task_search_results[$x]->vol_trainings_description; #content
						$function_only_first_x_symbols_num = 100; #number of symbols
						include('#function-only-first-x-symbols.php');
					echo '
					</td>
					<td>';
					$ts_deadline_var = strtotime($task_search_results[$x]->task_deadline);
					echo 
					date("d. M Y", $ts_deadline_var).'<br>'.date("g:i a", $ts_deadline_var).'<br>';
					$days_till_deadline =
						GregorianToJD(
						date("n",$ts_deadline_var),
						date("j",$ts_deadline_var),
						date("Y",$ts_deadline_var))-
						GregorianToJD(
						date("n",time()),
						date("j",time()),
						date("Y",time()));
					echo
					'('.$days_till_deadline.' days left)
					</td>
					<td>
					'.$task_search_results[$x]->list_countries_name;
					if(!empty($task_search_results[$x]->list_countries_name)){
						echo ',<br>';
					}
					echo $task_search_results[$x]->list_countries_region;
					if(!empty($task_search_results[$x]->list_countries_region)){
						echo ',<br>';
					}
					echo $task_search_results[$x]->list_countries_continent.'
					</td>
					<td>
					</td>
					<td>
					</td>
					<td style="text-align:center;">
					<a href="aaaaaaaaaaaaaaaa/archives/user-profile/'.
						$task_search_results[$x]->page_user_id.'"
						title="Visit profile of '.$task_search_results[$x]->usersext_displayName.'"
					>
						'.$task_search_results[$x]->usersext_displayName.'
					</a>
					</td>
				</tr>';
				}
				
				echo '
				<tr>
				<td style="text-align:center;" colspan="7">
				</td>
				</tr>
			</table>
			
			<script>
				jQuery(document).ready(function(){
				jQuery(".hover_row2").hover(function(){
					jQuery(this).css("background-color","#FFC977");
				},function(){
					jQuery(this).css("background-color","");
				});
				jQuery(".hover_row1").hover(function(){
					jQuery(this).css("background-color","#FFC977");
				},function(){
					jQuery(this).css("background-color","#FFF5E0");
				});
				});
			</script>';
			
			*/
			}
			#
			
		}
		#work center training seach-find (close)
		
    }
    #training sections (close) #modified
    
    #advice sections (open)
    if(1==1){
		
		#work center training search-find (open)
		if($page_section == "work center training search-find"){
			
			
		}
		#work center training seach-find (close)
		
    }
    #advice sections (close)
    
    #internship sections (open) #modified
    if(1==1){
		
		#work center internship search-find volunteer (open)
		if($page_section == "work center internship search-find volunteer"){
			
			//add table function here
			
		}
		#work center internship seach-find volunteer (close)
		
    }
    #internship sections (close) #modified
    
    
    
    #item sections (open)
    if(1==1){
	
	#task (open)
	if($page_section == "item task"){
	    
	    include('members-net-work-center_items_tasks.php');
	    
	}
	#task (close)
	
	#training (open)
	if($page_section == "item training"){
	    
	    include('members-net-work-center_items_trainings.php');
	    
	}
	#training (close)
	
	#advice (open)
	if($page_section == "item advice"){
	    
	    include('members-net-work-center_items_advice.php');
	    
	}
	#advice (close)
	
	#internships (open)
	if($page_section == "item internship"){
	    
	    include('members-net-work-center_items_internships.php');
	    
	}
	#internships (close)
	
    }
    #item sections (close)

?>