<?php

#NOTE: currently, it's ALWAYS staging version

#staging or production phase - staging (open)
if(1==1){
    
    #search section (open)
    if($table_of_god_search_row_content == "here"){
	$table_of_god_search_row_content = "";
	
	#script (open)
	if(1==1){
	  $table_of_god .= '
	  <script>
	      jQuery(document).ready(function(){
		  jQuery(".table_of_god_search_extend_link").click(function(){
		      jQuery(this).parent().parent().parent().parent().find(".table_of_god_search_content").slideUp(500);
		      if(jQuery(this).parent().parent().find(".table_of_god_search_content").is(":hidden")){
			jQuery(this).parent().parent().find(".table_of_god_search_content").slideDown(500);
		      }
		  });
	      });
	  </script>';
	}
	#script (close)
      
	$table_of_god .= '
	<form method="post" action="'.add_query_arg(NULL,NULL ).'">
	  <table style="width:80%;margin:auto;text-align:center;">';
	  
	    #task description (open) [not working]
	    if(1==1){
	/*    <tr>
	      <td>
		<a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		  Task description
		</a>';
		 #function-help-word.php
		  $function_help_word_question_mark_img = "yes";
		  $function_help_word_help_content = '
		    <p><b>Use keywords</b><br>
		    Are you looking for special keywords which are not searchable via one of the other search options?
		    If so, you can use a keyword search. Note that keywords strongly limit the number of results.
		    </p>';
		  include('#function-help-word.php');
		  $user_keywords_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_personal_settings
							WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
							    AND pers_settings_general = "work center"
							    AND pers_settings_specific = "task search preferences"
							    AND pers_settings_content_varchar1000 = "task description"
							ORDER BY pers_settings_id ASC;');
		  $user_keywords_results = $GLOBALS['wpdb']->get_results($user_keywords_query);
		  $keywords_list = "";
		  foreach($user_keywords_results as $user_keywords_row){
		    if($keywords_list != ""){
		      $keywords_list = $keywords_list." ";
		    }
		    $keywords_list = $keywords_list.$user_keywords_row->pers_settings_value;
		  }
		$table_of_god .= '
		<div class="table_of_god_search_content" style="display:none;">
		  <input
		    type="text"
		    name="task_search_task_description"
		    placeholder="Search via keywords"
		    value="'.$keywords_list.'"
		    style="width:100%;text-align:center;"
		  >
		</div>
	      </td>
	    </tr>*/;
	    }
	    #task description (close) [not working]
	    
	    #deadline (close)
	    if(1==1){
	      $table_of_god .= '
	      <tr>
		<td>
		  <a class="table_of_god_search_item_title_style" title="Click to expand">
		    Task deadline:
		  </a>
		  <br>
		  <select>';
		    $array = array(1,2,3);
		    for($x=0;$x<count($array);$x++){
		      $table_of_god .= '
		      <option>
			'.$array[$x].'
		      </option>';
		    }
		  $table_of_god .= '
		  </select>
		</td>
	      </tr>';
	    }
	    #deadline (close)
	    
	    #duration (open)
	    if(1==1){
	      $table_of_god .= '
	      <tr>
		<td>
		  <a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		    Expected duration
		  </a>';
		   #function-help-word.php
		    $function_help_word_question_mark_img = "yes";
		    $function_help_word_help_content = '
		      <p><b>How much time do you have?</b><br>
		      Here, you can specify the amount of time that you want to donate for individual tasks.
		      Keep in mind that it is inherently difficult to estimate the amount of time tasks will take
		      since the amount of time required depends on various unknown determinants like luck, your
		      ability, concentration and knowledge, etc.
		      Thus, this estimate is not a fixed value, but rather a rough estimation. If you only have three hours of time,
		      you should not look for three-hour-tasks, but rather look for 1-hour-tasks, just to be on the save side.
		      </p>';
		    include('#function-help-word.php');
		  $table_of_god .= '
		  <div class="table_of_god_search_content" style="display:none;margin:10px;">
		    Find tasks that approximately take between';
		    $duration_array_values = array((1/6),0.5,1,2,3,5,10,20,50,100,1000);
		    $duration_array_titles = array(
						   "&ensp;10 minutes"
						   ,"&ensp;30 minutes"
						   ,"&ensp;&ensp;1 hour"
						   ,"&ensp;&ensp;2 hours"
						   ,"&ensp;&ensp;3 hours"
						   ,"&ensp;&ensp;5 hours"
						   ,"&ensp;10 hours"
						   ,"&ensp;20 hours"
						   ,"&ensp;50 hours"
						   ,"100 hours",
						   "over 100 hours");
		    if(empty($task_expected_duration_bottom)){
		      $task_expected_duration_bottom = $duration_array_values[0];
		      $task_expected_duration_top = end($duration_array_values);
		    }
		    $table_of_god .= '
		    <select name="task_search_task_expected_duration_bottom">';
		      for($x=0;$x<count($duration_array_values);$x++){
			if($task_expected_duration_bottom == $duration_array_values[$x]){
			  $selected = 'selected="selected"';
			}else{
			  $selected = "";
			}
			$table_of_god .= '
			<option value="'.$duration_array_values[$x].'" '.$selected.'>
			  '.$duration_array_titles[$x].'
			</option>';
		      }
		    $table_of_god .= '
		    </select>
		    and
		    <select name="task_search_task_expected_duration_top">';
		      for($x=0;$x<count($duration_array_values);$x++){
			if($task_expected_duration_top == $duration_array_values[$x]){
			  $selected = 'selected="selected"';
			}else{
			  $selected = "";
			}
			$table_of_god .= '
			<option value="'.$duration_array_values[$x].'" '.$selected.'>
			  '.$duration_array_titles[$x].'
			</option>';
		      }
		    $table_of_god .= '
		    </select>
		    to complete.
		  </div>
		</td>
	      </tr>';
	    }
	    #duration (close)
	    
	    #development topic (open)
	    if(1==1){
	      $table_of_god .= '
	      <tr>
		<td>
		  <a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		    Development topic
		  </a>';
		   #function-help-word.php
		    $function_help_word_question_mark_img = "yes";
		    $function_help_word_help_content = '
		      <p><b>What is the main area of the respective development organization?</b><br>
		      This option enables you to select topics that interest you most. Note that many organizations are active
		      in several different. However, here, only the main areas are covered.
		      </p>';
		    include('#function-help-word.php');
		  $table_of_god .= '
		  <div class="table_of_god_search_content" style="display:none;margin:10px;">';
		    #function-div-table-selects.php
		      $function_div_table_selects_query2 = 'SELECT *
							       FROM fi4l3fg_voluno_lists_dev_topics
								LEFT JOIN (
								  SELECT *
								  FROM fi4l3fg_voluno_personal_settings
								  WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								      AND pers_settings_general = "work center"
								      AND pers_settings_specific = "task search preferences"
								      AND pers_settings_content_varchar1000 = "development topic"
								  ) AS aaa_personal_settings
								ON dev_topic_id = pers_settings_value
							       WHERE dev_topic_parent = 0
							       ORDER BY dev_topic_order ASC;';
		      $function_div_table_selects_query3 = 'SELECT *
							       FROM fi4l3fg_voluno_lists_dev_topics
								LEFT JOIN (
								  SELECT *
								  FROM fi4l3fg_voluno_personal_settings
								  WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								      AND pers_settings_general = "work center"
								      AND pers_settings_specific = "task search preferences"
								      AND pers_settings_content_varchar1000 = "development topic"
								  ) AS aaa_personal_settings
								ON dev_topic_id = pers_settings_value
							       WHERE dev_topic_parent = %d
							       ORDER BY dev_topic_name ASC;';
		      $function_div_table_selects_display_text_mysql = "dev_topic_name"; //what you see
		      $function_div_table_selects_value_mysql = "dev_topic_id"; //what php sees
		      $function_div_table_selects_input_name = "task_search_dev_topic"; //$_POST['-->this<--']
		      $function_div_table_selects_cols_per_row = 3; //obligatory, regarding top level
		      include('#function-div-table-selects.php');
		  $table_of_god .= '
		  </div>
		</td>
	      </tr>';
	    }
	    #development topic (close)
	      
	    #geographic area (open)
	    if(1==1){
	      $table_of_god .= '
	      <tr>
		<td>
		  <a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		    Geopraphic area
		  </a>';
		   #function-help-word.php
		    $function_help_word_question_mark_img = "yes";
		    $function_help_word_help_content = '
		      <p><b>Which geographic area does the development organization impact?</b><br>
		      In which geographic area is the development organization active? Note that this
		      Is not necessarily the location of the headquarters of the organization. For example,
		      an organization can have its main office in India but have projects in Bangladesh.
		      If the organization only has projects in Bangladesh, then Bangladesh is the impact area.
		      If the organization has projects in Bangladesh and India, the impact area is Southern Asia.
		      </p>';
		    include('#function-help-word.php');
		    $table_of_god .= '
		    <div class="table_of_god_search_content" style="display:none;">';
		      #function-div-table-selects.php
			$function_div_table_selects_query2 = 'SELECT *
								 FROM fi4l3fg_voluno_list_sorting
								   LEFT JOIN (
								     SELECT *
								     FROM fi4l3fg_voluno_personal_settings
								     WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
									 AND pers_settings_general = "work center"
									 AND pers_settings_specific = "task search preferences"
									 AND pers_settings_content_varchar1000 = "geographic area"
								     ) AS aaa_personal_settings
								   ON voluno_liso_item_id = pers_settings_value
								 WHERE voluno_liso_parent_l7 = 269
								  AND voluno_liso_item_type = "country"
								 ORDER BY voluno_liso_item_name ASC;';
			$function_div_table_selects_query3 = 'SELECT *
							      FROM fi4l3fg_voluno_list_sorting
								LEFT JOIN (
								  SELECT *
								  FROM fi4l3fg_voluno_personal_settings
								  WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								      AND pers_settings_general = "work center"
								      AND pers_settings_specific = "task search preferences"
								      AND pers_settings_content_varchar1000 = "geographic area"
								  ) AS aaa_personal_settings
								ON voluno_liso_item_id = pers_settings_value
							      WHERE voluno_liso_parent_l7 = %d
								AND voluno_liso_item_type = "country"
							      ORDER BY voluno_liso_item_name ASC;';
			/*$function_div_table_selects_query4 = 'SELECT *
							      FROM fi4l3fg_voluno_list_sorting
								LEFT JOIN (
								  SELECT *
								  FROM fi4l3fg_voluno_personal_settings
								  WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								      AND pers_settings_general = "work center"
								      AND pers_settings_specific = "task search preferences"
								      AND pers_settings_content_varchar1000 = "geographic area"
								  ) AS aaa_personal_settings
								ON voluno_liso_item_id = pers_settings_value
							      WHERE voluno_liso_parent_l7 = %d
								AND voluno_liso_item_type = "country"
							      ORDER BY voluno_liso_item_name ASC;';*/
			$function_div_table_selects_display_text_mysql = "voluno_liso_item_name"; //what you see
			$function_div_table_selects_value_mysql = "voluno_liso_item_id"; //what php sees
			$function_div_table_selects_input_name_level2 = "task_search_geographic_area_continent"; //$_POST['-->this<--']
			$function_div_table_selects_input_name_level3 = "task_search_geographic_area_region"; //$_POST['-->this<--']
			#$function_div_table_selects_input_name = "task_search_geographic_area"; //$_POST['-->this<--']
			$function_div_table_selects_cols_per_row = 5;
			include('#function-div-table-selects.php');
		  $table_of_god .= '
		  </div>
		</td>
	      </tr>';
	    }
	    #geographic area (close)
	    
	    #task category (open)
	    if(1==1){
	      $table_of_god .= '
	      <tr>
		<td>
		  <a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		    Task category
		  </a>';
		   #function-help-word.php
		    $function_help_word_question_mark_img = "yes";
		    $function_help_word_help_content = '
		      <p><b>What activity is associated with the task?</b><br>
		      Which category does the task fall into? Please select one or more categories.
		      If your category is not yet features, please don\'t hesitate to send us a mail,
		      so that we can add it to the list.
		      </p>';
		    include('#function-help-word.php');
		    $table_of_god .= '
		    <div class="table_of_god_search_content" style="display:none;">';
		      #function-div-table-selects.php
			$function_div_table_selects_query2 = 'SELECT *
								 FROM fi4l3fg_voluno_lists_task_types
								   LEFT JOIN (
								     SELECT *
								     FROM fi4l3fg_voluno_personal_settings
								     WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
									 AND pers_settings_general = "work center"
									 AND pers_settings_specific = "task search preferences"
									 AND pers_settings_content_varchar1000 = "task category"
								     ) AS aaa_personal_settings
								   ON task_type_id = pers_settings_value
								 WHERE task_type_parent = 274
								 ORDER BY task_type_num_of_children ASC;';
			$function_div_table_selects_query3 = 'SELECT *
							      FROM fi4l3fg_voluno_lists_task_types
								LEFT JOIN (
								  SELECT *
								  FROM fi4l3fg_voluno_personal_settings
								  WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								      AND pers_settings_general = "work center"
								      AND pers_settings_specific = "task search preferences"
								      AND pers_settings_content_varchar1000 = "task category"
								  ) AS aaa_personal_settings
								ON task_type_id = pers_settings_value
							      WHERE task_type_parent = %d
							      ORDER BY task_type_name ASC;';
			$function_div_table_selects_query4 = 'SELECT *
							      FROM fi4l3fg_voluno_lists_task_types
								LEFT JOIN (
								  SELECT *
								  FROM fi4l3fg_voluno_personal_settings
								  WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								      AND pers_settings_general = "work center"
								      AND pers_settings_specific = "task search preferences"
								      AND pers_settings_content_varchar1000 = "task category"
								  ) AS aaa_personal_settings
								ON task_type_id = pers_settings_value
							      WHERE task_type_parent = %d
							      ORDER BY task_type_name ASC;';
			$function_div_table_selects_display_text_mysql = "task_type_name"; //what you see
			$function_div_table_selects_value_mysql = "task_type_id"; //what php sees
			$function_div_table_selects_input_name = "task_search_task_type"; //$_POST['-->this<--']
			$function_div_table_selects_cols_per_row = 4;
			include('#function-div-table-selects.php');
		  $table_of_god .= '
		  </div>
		</td>
	      </tr>';
	    }
	    #task category (close)
	    
	    #ngo (open)
	    if(1==1){
	      $table_of_god .= '
	      <tr>
		<td>
		  <a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		    Development organizations
		  </a>';
		  #function-help-word.php
		   $function_help_word_question_mark_img = "yes";
		   $function_help_word_help_content = '
		     <p><b>Select individual development organizations</b><br>
		     Here, you can select all tasks from individual development organizations. To select more than one organization,
		     keep the "Ctrl" / "Strg" key pressed while right clicking with your mouse.
		     </p>';
		   include('#function-help-word.php');
		  $table_of_god .= '
		  <div class="table_of_god_search_content" style="display:none;margin:10px;">
		    <select name="task_search_task_ngo[]" multiple>';
		      $search_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
							  FROM fi4l3fg_voluno_development_organizations
							  ORDER BY ngo_name ASC
							  ');
							  
							  /*
								 LEFT JOIN (
								   SELECT *
								   FROM fi4l3fg_voluno_personal_settings
								   WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								       AND pers_settings_general = "work center"
								       AND pers_settings_specific = "task search preferences"
								       AND pers_settings_content_varchar1000 = "task category"
								   ) AS aaa_personal_settings
								 ON task_type_id = pers_settings_value
							       WHERE task_type_parent = 274
							       ORDER BY task_type_num_of_children ASC;');*/
		      $search_ngos_results = $GLOBALS['wpdb']->get_results($search_ngos_query);
			$table_of_god .= '
			<option value="0">- All -</option>';                                    
		      for($x=0;$x<count($search_ngos_results);$x++){
			if(in_array($search_ngos_results[$x]->ngo_id,$task_ngo_search_array)){
			  $selected = 'selected="selected"';
			}else{
			  $selected = '';
			}
			$table_of_god .= '
			<option value="'.$search_ngos_results[$x]->ngo_id.'" '.$selected.'>
			  '.$search_ngos_results[$x]->ngo_name.'
			</option>';
		      }
		    $table_of_god .= '
		    </select>
		  </div>
		</td>
	      </tr>';
	    }
	    #ngo (close)
	    
	    $table_of_god .= '
	    <tr>
	      <td>
		<input type="submit" value="Edit search preferences" name="task_search_submit">
	      </td>
	    </tr>
	  </table>
	</form>
	';
    }
    #search section (close)
    
    #1,2,4-6 (open)
    elseif(in_array($table_of_god_content_td_number,array(1,2,4,5,6))){
	include('#function-table-of-god#task-mycurrent-ngo.php');
    }
    #1,2,4-6 (close)
    
    #3 deadline (open)
    elseif($table_of_god_content_td_number == 3){
	
	#if task status (string3) != unassigned, then tog_data_string18 is task completion deadline, else it's assignment deadline
	
	#function-timezone.php (open)
	if(!empty($table_of_god_internal_results[$x]->tog_data_string18)){
	    
	    $function_timezone = $table_of_god_internal_results[$x]->tog_data_string18;
	    $function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
	    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
	    //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
	    include('#function-timezone.php');
	    $date = $function_timezone;
	    
	    $function_timezone = $table_of_god_internal_results[$x]->tog_data_string18;
	    $function_timezone_format = "time (hour min)";
	    include('#function-timezone.php');
	    $time = $function_timezone;
	    
	    $function_timezone = $table_of_god_internal_results[$x]->tog_data_string18;
	    $function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
	    $function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
	    $function_timezone_format = "time difference (short)";
	    include('#function-timezone.php');
	    $time_left = $function_timezone;
	    
	}
	#function-timezone.php (close)
	
	#content (open)
	if(1==1){
	    $table_of_god .= '
	    <td>';
		
		#if data available (open)
		if(!in_array($table_of_god_internal_results[$x]->tog_data_string18,array("","0000-00-00 00:00:00"))){
		    
		    $table_of_god .=
		    $date.'
		    <br>
		    '.$time.'
		    <br>
		    ('.$time_left.')';
		    
		}
		#if data available (close)
		
	    $table_of_god .= '
	    </td>';
	}
	#content (close)
	
    }
    #3 deadline (close)
    
    #7 development topic (open)
    elseif($table_of_god_content_td_number == 7){
      $table_of_god .= '
      <td style="text-align:center;vertical-align:middle;">';
	  $dev_topics_query = $GLOBALS['wpdb']->prepare('SELECT *
					      FROM fi4l3fg_voluno_development_organizations_properties
						  LEFT JOIN fi4l3fg_voluno_lists_dev_topics
						  ON ngo_prop_type_id = dev_topic_id
					      WHERE ngo_prop_type_general = %s
					      AND ngo_prop_ngo_id = %d
					      ORDER BY dev_topic_name ASC;',
					      "development topic",
					      $table_of_god_internal_results[$x]->tog_data_num2
					      );
	  $dev_topics_results = $GLOBALS['wpdb']->get_results($dev_topics_query);
	  for($z=0;$z<count($dev_topics_results);$z++){
	      if($z != 0){
		  $table_of_god .= '; ';
	      }
	      $table_of_god .= '
	      <a style="cursor:help;" title="'.$dev_topics_results[$z]->dev_topic_description.'">'.
		$dev_topics_results[$z]->dev_topic_name
	      .'</a>';
	  }
      $table_of_god .= '
      </td>
      ';
    }
    #7 development topic (close)
    
    #8 geographic area (open)
    elseif($table_of_god_content_td_number == 8){
	$table_of_god .= '
	<td style="text-align:center;vertical-align:middle;">';
	    if($table_of_god_internal_results[$x]->tog_data_string14 == "country"){
		$table_of_god .=
		$table_of_god_internal_results[$x]->tog_data_string11.
		'<br>('
		.$table_of_god_internal_results[$x]->tog_data_string12.
		', '
		.$table_of_god_internal_results[$x]->tog_data_string13.')';
	    }elseif($table_of_god_internal_results[$x]->tog_data_string14 == "region"){
		$table_of_god .=
		$table_of_god_internal_results[$x]->tog_data_string11.
		'<br>('
		.$table_of_god_internal_results[$x]->tog_data_string13.')';
	    }elseif($table_of_god_internal_results[$x]->tog_data_string14 == "continent"){
		$table_of_god .=
		$table_of_god_internal_results[$x]->tog_data_string11;
	    }elseif($table_of_god_internal_results[$x]->tog_data_string14 == "world"){
		$table_of_god .=
		$table_of_god_internal_results[$x]->tog_data_string11;
	    }
	$table_of_god .= '
	</td>
	';
    }
    #8 geographic area (open)
    
}
#staging or production phase - staging (close)

#staging or production phase - staging (open)
else{
    
    /*
    1. Please save as:
      #function-table-of-god#YOUR TABLE OF GOD MYSQL NAME WITH DASHES.php ($table_of_god_name, e.g. task search and find)
      
    2. Please enter the content
    
    3. Please update the function input to include the correct filename.
    */
    
    #search section (open)
    if($table_of_god_search_row_content == "here"){
      $table_of_god_search_row_content = "";
      
      #script (open)
      if(1==1){
	$table_of_god .= '
	<script>
	    jQuery(document).ready(function(){
		jQuery(".table_of_god_search_extend_link").click(function(){
		    jQuery(this).parent().parent().parent().parent().find(".table_of_god_search_content").slideUp(500);
		    if(jQuery(this).parent().parent().find(".table_of_god_search_content").is(":hidden")){
		      jQuery(this).parent().parent().find(".table_of_god_search_content").slideDown(500);
		    }
		});
	    });
	</script>';
      }
      #script (close)
    
      $table_of_god .= '
      <form method="post" action="'.add_query_arg(NULL,NULL ).'">
	<table style="width:80%;margin:auto;text-align:center;">';
	
	  #task description (open) [not working]
	  if(1==1){
      /*    <tr>
	    <td>
	      <a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		Task description
	      </a>';
	       #function-help-word.php
		$function_help_word_question_mark_img = "yes";
		$function_help_word_help_content = '
		  <p><b>Use keywords</b><br>
		  Are you looking for special keywords which are not searchable via one of the other search options?
		  If so, you can use a keyword search. Note that keywords strongly limit the number of results.
		  </p>';
		include('#function-help-word.php');
		$user_keywords_query = $GLOBALS['wpdb']->prepare('SELECT *
						      FROM fi4l3fg_voluno_personal_settings
						      WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
							  AND pers_settings_general = "work center"
							  AND pers_settings_specific = "task search preferences"
							  AND pers_settings_content_varchar1000 = "task description"
						      ORDER BY pers_settings_id ASC;');
		$user_keywords_results = $GLOBALS['wpdb']->get_results($user_keywords_query);
		$keywords_list = "";
		foreach($user_keywords_results as $user_keywords_row){
		  if($keywords_list != ""){
		    $keywords_list = $keywords_list." ";
		  }
		  $keywords_list = $keywords_list.$user_keywords_row->pers_settings_value;
		}
	      $table_of_god .= '
	      <div class="table_of_god_search_content" style="display:none;">
		<input
		  type="text"
		  name="task_search_task_description"
		  placeholder="Search via keywords"
		  value="'.$keywords_list.'"
		  style="width:100%;text-align:center;"
		>
	      </div>
	    </td>
	  </tr>*/;
	  }
	  #task description (close) [not working]
	  
	  #deadline (close)
	  if(1==1){
	    $table_of_god .= '
	    <tr>
	      <td>
		<a class="table_of_god_search_item_title_style" title="Click to expand">
		  Task deadline:
		</a>
		<br>
		<select>';
		  $array = array(1,2,3);
		  for($x=0;$x<count($array);$x++){
		    $table_of_god .= '
		    <option>
		      '.$array[$x].'
		    </option>';
		  }
		$table_of_god .= '
		</select>
	      </td>
	    </tr>';
	  }
	  #deadline (close)
	  
	  #duration (open)
	  if(1==1){
	    $table_of_god .= '
	    <tr>
	      <td>
		<a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		  Expected duration
		</a>';
		 #function-help-word.php
		  $function_help_word_question_mark_img = "yes";
		  $function_help_word_help_content = '
		    <p><b>How much time do you have?</b><br>
		    Here, you can specify the amount of time that you want to donate for individual tasks.
		    Keep in mind that it is inherently difficult to estimate the amount of time tasks will take
		    since the amount of time required depends on various unknown determinants like luck, your
		    ability, concentration and knowledge, etc.
		    Thus, this estimate is not a fixed value, but rather a rough estimation. If you only have three hours of time,
		    you should not look for three-hour-tasks, but rather look for 1-hour-tasks, just to be on the save side.
		    </p>';
		  include('#function-help-word.php');
		$table_of_god .= '
		<div class="table_of_god_search_content" style="display:none;margin:10px;">
		  Find tasks that approximately take between';
		  $duration_array_values = array((1/6),0.5,1,2,3,5,10,20,50,100,1000);
		  $duration_array_titles = array(
						 "&ensp;10 minutes"
						 ,"&ensp;30 minutes"
						 ,"&ensp;&ensp;1 hour"
						 ,"&ensp;&ensp;2 hours"
						 ,"&ensp;&ensp;3 hours"
						 ,"&ensp;&ensp;5 hours"
						 ,"&ensp;10 hours"
						 ,"&ensp;20 hours"
						 ,"&ensp;50 hours"
						 ,"100 hours",
						 "over 100 hours");
		  if(empty($task_expected_duration_bottom)){
		    $task_expected_duration_bottom = $duration_array_values[0];
		    $task_expected_duration_top = end($duration_array_values);
		  }
		  $table_of_god .= '
		  <select name="task_search_task_expected_duration_bottom">';
		    for($x=0;$x<count($duration_array_values);$x++){
		      if($task_expected_duration_bottom == $duration_array_values[$x]){
			$selected = 'selected="selected"';
		      }else{
			$selected = "";
		      }
		      $table_of_god .= '
		      <option value="'.$duration_array_values[$x].'" '.$selected.'>
			'.$duration_array_titles[$x].'
		      </option>';
		    }
		  $table_of_god .= '
		  </select>
		  and
		  <select name="task_search_task_expected_duration_top">';
		    for($x=0;$x<count($duration_array_values);$x++){
		      if($task_expected_duration_top == $duration_array_values[$x]){
			$selected = 'selected="selected"';
		      }else{
			$selected = "";
		      }
		      $table_of_god .= '
		      <option value="'.$duration_array_values[$x].'" '.$selected.'>
			'.$duration_array_titles[$x].'
		      </option>';
		    }
		  $table_of_god .= '
		  </select>
		  to complete.
		</div>
	      </td>
	    </tr>';
	  }
	  #duration (close)
	  
	  #development topic (open)
	  if(1==1){
	    $table_of_god .= '
	    <tr>
	      <td>
		<a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		  Development topic
		</a>';
		 #function-help-word.php
		  $function_help_word_question_mark_img = "yes";
		  $function_help_word_help_content = '
		    <p><b>What is the main area of the respective development organization?</b><br>
		    This option enables you to select topics that interest you most. Note that many organizations are active
		    in several different. However, here, only the main areas are covered.
		    </p>';
		  include('#function-help-word.php');
		$table_of_god .= '
		<div class="table_of_god_search_content" style="display:none;margin:10px;">';
		  #function-div-table-selects.php
		    $function_div_table_selects_query2 = 'SELECT *
							     FROM fi4l3fg_voluno_lists_dev_topics
							      LEFT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_personal_settings
								WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								    AND pers_settings_general = "work center"
								    AND pers_settings_specific = "task search preferences"
								    AND pers_settings_content_varchar1000 = "development topic"
								) AS aaa_personal_settings
							      ON dev_topic_id = pers_settings_value
							     WHERE dev_topic_parent = 0
							     ORDER BY dev_topic_order ASC;';
		    $function_div_table_selects_query3 = 'SELECT *
							     FROM fi4l3fg_voluno_lists_dev_topics
							      LEFT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_personal_settings
								WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								    AND pers_settings_general = "work center"
								    AND pers_settings_specific = "task search preferences"
								    AND pers_settings_content_varchar1000 = "development topic"
								) AS aaa_personal_settings
							      ON dev_topic_id = pers_settings_value
							     WHERE dev_topic_parent = %d
							     ORDER BY dev_topic_name ASC;';
		    $function_div_table_selects_display_text_mysql = "dev_topic_name"; //what you see
		    $function_div_table_selects_value_mysql = "dev_topic_id"; //what php sees
		    $function_div_table_selects_input_name = "task_search_dev_topic"; //$_POST['-->this<--']
		    $function_div_table_selects_cols_per_row = 3; //obligatory, regarding top level
		    include('#function-div-table-selects.php');
		$table_of_god .= '
		</div>
	      </td>
	    </tr>';
	  }
	  #development topic (close)
	    
	  #geographic area (open)
	  if(1==1){
	    $table_of_god .= '
	    <tr>
	      <td>
		<a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		  Geopraphic area
		</a>';
		 #function-help-word.php
		  $function_help_word_question_mark_img = "yes";
		  $function_help_word_help_content = '
		    <p><b>Which geographic area does the development organization impact?</b><br>
		    In which geographic area is the development organization active? Note that this
		    Is not necessarily the location of the headquarters of the organization. For example,
		    an organization can have its main office in India but have projects in Bangladesh.
		    If the organization only has projects in Bangladesh, then Bangladesh is the impact area.
		    If the organization has projects in Bangladesh and India, the impact area is Southern Asia.
		    </p>';
		  include('#function-help-word.php');
		  $table_of_god .= '
		  <div class="table_of_god_search_content" style="display:none;">';
		    #function-div-table-selects.php
		      $function_div_table_selects_query2 = 'SELECT *
							       FROM fi4l3fg_voluno_list_sorting
								 LEFT JOIN (
								   SELECT *
								   FROM fi4l3fg_voluno_personal_settings
								   WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								       AND pers_settings_general = "work center"
								       AND pers_settings_specific = "task search preferences"
								       AND pers_settings_content_varchar1000 = "geographic area"
								   ) AS aaa_personal_settings
								 ON voluno_liso_item_id = pers_settings_value
							       WHERE voluno_liso_parent_l7 = 269
								AND voluno_liso_item_type = "country"
							       ORDER BY voluno_liso_item_name ASC;';
		      $function_div_table_selects_query3 = 'SELECT *
							    FROM fi4l3fg_voluno_list_sorting
							      LEFT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_personal_settings
								WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								    AND pers_settings_general = "work center"
								    AND pers_settings_specific = "task search preferences"
								    AND pers_settings_content_varchar1000 = "geographic area"
								) AS aaa_personal_settings
							      ON voluno_liso_item_id = pers_settings_value
							    WHERE voluno_liso_parent_l7 = %d
							      AND voluno_liso_item_type = "country"
							    ORDER BY voluno_liso_item_name ASC;';
		      /*$function_div_table_selects_query4 = 'SELECT *
							    FROM fi4l3fg_voluno_list_sorting
							      LEFT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_personal_settings
								WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								    AND pers_settings_general = "work center"
								    AND pers_settings_specific = "task search preferences"
								    AND pers_settings_content_varchar1000 = "geographic area"
								) AS aaa_personal_settings
							      ON voluno_liso_item_id = pers_settings_value
							    WHERE voluno_liso_parent_l7 = %d
							      AND voluno_liso_item_type = "country"
							    ORDER BY voluno_liso_item_name ASC;';*/
		      $function_div_table_selects_display_text_mysql = "voluno_liso_item_name"; //what you see
		      $function_div_table_selects_value_mysql = "voluno_liso_item_id"; //what php sees
		      $function_div_table_selects_input_name_level2 = "task_search_geographic_area_continent"; //$_POST['-->this<--']
		      $function_div_table_selects_input_name_level3 = "task_search_geographic_area_region"; //$_POST['-->this<--']
		      #$function_div_table_selects_input_name = "task_search_geographic_area"; //$_POST['-->this<--']
		      $function_div_table_selects_cols_per_row = 5;
		      include('#function-div-table-selects.php');
		$table_of_god .= '
		</div>
	      </td>
	    </tr>';
	  }
	  #geographic area (close)
	  
	  #task category (open)
	  if(1==1){
	    $table_of_god .= '
	    <tr>
	      <td>
		<a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		  Task category
		</a>';
		 #function-help-word.php
		  $function_help_word_question_mark_img = "yes";
		  $function_help_word_help_content = '
		    <p><b>What activity is associated with the task?</b><br>
		    Which category does the task fall into? Please select one or more categories.
		    If your category is not yet features, please don\'t hesitate to send us a mail,
		    so that we can add it to the list.
		    </p>';
		  include('#function-help-word.php');
		  $table_of_god .= '
		  <div class="table_of_god_search_content" style="display:none;">';
		    #function-div-table-selects.php
		      $function_div_table_selects_query2 = 'SELECT *
							       FROM fi4l3fg_voluno_lists_task_types
								 LEFT JOIN (
								   SELECT *
								   FROM fi4l3fg_voluno_personal_settings
								   WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								       AND pers_settings_general = "work center"
								       AND pers_settings_specific = "task search preferences"
								       AND pers_settings_content_varchar1000 = "task category"
								   ) AS aaa_personal_settings
								 ON task_type_id = pers_settings_value
							       WHERE task_type_parent = 274
							       ORDER BY task_type_num_of_children ASC;';
		      $function_div_table_selects_query3 = 'SELECT *
							    FROM fi4l3fg_voluno_lists_task_types
							      LEFT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_personal_settings
								WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								    AND pers_settings_general = "work center"
								    AND pers_settings_specific = "task search preferences"
								    AND pers_settings_content_varchar1000 = "task category"
								) AS aaa_personal_settings
							      ON task_type_id = pers_settings_value
							    WHERE task_type_parent = %d
							    ORDER BY task_type_name ASC;';
		      $function_div_table_selects_query4 = 'SELECT *
							    FROM fi4l3fg_voluno_lists_task_types
							      LEFT JOIN (
								SELECT *
								FROM fi4l3fg_voluno_personal_settings
								WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								    AND pers_settings_general = "work center"
								    AND pers_settings_specific = "task search preferences"
								    AND pers_settings_content_varchar1000 = "task category"
								) AS aaa_personal_settings
							      ON task_type_id = pers_settings_value
							    WHERE task_type_parent = %d
							    ORDER BY task_type_name ASC;';
		      $function_div_table_selects_display_text_mysql = "task_type_name"; //what you see
		      $function_div_table_selects_value_mysql = "task_type_id"; //what php sees
		      $function_div_table_selects_input_name = "task_search_task_type"; //$_POST['-->this<--']
		      $function_div_table_selects_cols_per_row = 4;
		      include('#function-div-table-selects.php');
		$table_of_god .= '
		</div>
	      </td>
	    </tr>';
	  }
	  #task category (close)
	  
	  #ngo (open)
	  if(1==1){
	    $table_of_god .= '
	    <tr>
	      <td>
		<a class="table_of_god_search_item_title_style table_of_god_search_extend_link" title="Click to expand">
		  Development organizations
		</a>';
		#function-help-word.php
		 $function_help_word_question_mark_img = "yes";
		 $function_help_word_help_content = '
		   <p><b>Select individual development organizations</b><br>
		   Here, you can select all tasks from individual development organizations. To select more than one organization,
		   keep the "Ctrl" / "Strg" key pressed while right clicking with your mouse.
		   </p>';
		 include('#function-help-word.php');
		$table_of_god .= '
		<div class="table_of_god_search_content" style="display:none;margin:10px;">
		  <select name="task_search_task_ngo[]" multiple>';
		    $search_ngos_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_development_organizations
							ORDER BY ngo_name ASC
							');
							
							/*
							       LEFT JOIN (
								 SELECT *
								 FROM fi4l3fg_voluno_personal_settings
								 WHERE pers_settings_user_id = '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'
								     AND pers_settings_general = "work center"
								     AND pers_settings_specific = "task search preferences"
								     AND pers_settings_content_varchar1000 = "task category"
								 ) AS aaa_personal_settings
							       ON task_type_id = pers_settings_value
							     WHERE task_type_parent = 274
							     ORDER BY task_type_num_of_children ASC;');*/
		    $search_ngos_results = $GLOBALS['wpdb']->get_results($search_ngos_query);
		      $table_of_god .= '
		      <option value="0">- All -</option>';                                    
		    for($x=0;$x<count($search_ngos_results);$x++){
		      if(in_array($search_ngos_results[$x]->ngo_id,$task_ngo_search_array)){
			$selected = 'selected="selected"';
		      }else{
			$selected = '';
		      }
		      $table_of_god .= '
		      <option value="'.$search_ngos_results[$x]->ngo_id.'" '.$selected.'>
			'.$search_ngos_results[$x]->ngo_name.'
		      </option>';
		    }
		  $table_of_god .= '
		  </select>
		</div>
	      </td>
	    </tr>';
	  }
	  #ngo (close)
	  
	  $table_of_god .= '
	  <tr>
	    <td>
	      <input type="submit" value="Edit search preferences" name="task_search_submit">
	    </td>
	  </tr>
	</table>
      </form>
      ';
    }
    #search section (close)
    
    
    
    
    #td content section (open)
    
    #counter (open)
    elseif($table_of_god_content_td_number == 1){
      $table_of_god .= '
      <td>
	'.($x+1).'
      </td>
      ';
    }
    #counter (close)
    
    #task name (open)
    elseif($table_of_god_content_td_number == 2){
      
      #function-only-first-x-symbols.php (open)
      if(1==1){
	  $function_only_first_x_symbols = $table_of_god_internal_results[$x]->tog_data_string1; #content
	  $function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
	  include('#function-only-first-x-symbols.php');
	  #output: $function_only_first_x_symbols
      }
      #function-only-first-x-symbols.php (close)
      
      $table_of_god .= '
      <td style="text-align:justify;word-wrap:break-word;">
	  <a
	      href="'.get_permalink($post->ID).'?type=task&id='.$table_of_god_internal_results[$x]->tog_data_num4.'"
	      title="Visit task page for more details"
	  >
	      <b class="task_name">'.
		  $table_of_god_internal_results[$x]->tog_data_string2.'
	      </b>
	  </a>
	  <br>
	    '.$function_only_first_x_symbols.'
	  <span style="display:none" class="task_id">
	      '.$table_of_god_internal_results[$x]->tog_data_num4.'
	  </span>
      </td>';  
    }
    #task name (close)
    
    #deadline (open)
    elseif($table_of_god_content_td_number == 3){
      
      #function-timezone.php (open)
      if(1==1){
	
	$function_timezone = $table_of_god_internal_results[$x]->tog_data_string6;
	$function_timezone_format = "date (weekday short)"; //default: datetime (weekday long hour min sec)
	//"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
	//"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
	include('#function-timezone.php');
	$date = $function_timezone;
	
	$function_timezone = $table_of_god_internal_results[$x]->tog_data_string6;
	$function_timezone_format = "time (hour min)";
	include('#function-timezone.php');
	$time = $function_timezone;
	
	$function_timezone = $table_of_god_internal_results[$x]->tog_data_string6;
	$function_timezone_reference = ""; //reference time, default:empty, only relevant for time difference
	$function_timezone_wording = "left"; //default: "in x days", left: "x days left", only relevant for time difference
	$function_timezone_format = "time difference (short)";
	include('#function-timezone.php');
	$time_left = $function_timezone;
	
      }
      #function-timezone.php (close)
      
      #content (open)
      if(1==1){
	$table_of_god .= '
	<td>
	  '.$date.'
	  <br>
	  '.$time.'
	  <br>
	  ('.$time_left.')
	</td>';
      }
      #content (close)
      
    }
    #deadline (close)
    
    #expected duration (open)
    elseif($table_of_god_content_td_number == 4){
      #function-minutes-into-nice-format (open)
      if(1==1){
	  $function_minutes_into_nice_format = $table_of_god_internal_results[$x]->tog_data_string17;
	  $function_minutes_into_nice_format_long = "yes"; //default: no/empty
	  include('#function-minutes-into-nice-format.php');
	  #output: $function_minutes_into_nice_format
      }
      #function-minutes-into-nice-format (close)
      
      $table_of_god .= '
      <td>
	'.$function_minutes_into_nice_format.'
      </td>
      ';
    }
    #expected duration (close)
    
    #category (open)
    elseif($table_of_god_content_td_number == 5){
      
      $task_types_query = $GLOBALS['wpdb']->prepare('SELECT *
					  FROM fi4l3fg_voluno_items_tasks_properties
					      LEFT JOIN fi4l3fg_voluno_lists_task_types
					      ON taskprop_type_id = task_type_id
					  WHERE taskprop_type = %s
					  AND taskprop_task_id = %d
					  ORDER BY task_type_name ASC;',
					  "type",
					  $table_of_god_internal_results[$x]->tog_data_num4);
      $task_types_results = $GLOBALS['wpdb']->get_results($task_types_query);
      
      $table_of_god .= '
      <td style="text-align:center;vertical-align:middle;">';
	  for($z=0;$z<count($task_types_results);$z++){
	    if($z>0){
	      $table_of_god .= ';';
	    }
	    $table_of_god .= '
	    <a style="cursor:help;" title="'.$task_types_results[$z]->task_type_description.'">'.
	    $task_types_results[$z]->task_type_name.
	    '</a>';
	  }
      $table_of_god .= '
      </td>
      ';
    }
    #category (close)
    
    #development topic (open)
    elseif($table_of_god_content_td_number == 6){
      $table_of_god .= '
      <td style="text-align:center;vertical-align:middle;">';
	  $dev_topics_query = $GLOBALS['wpdb']->prepare('SELECT *
					      FROM fi4l3fg_voluno_development_organizations_properties
						  LEFT JOIN fi4l3fg_voluno_lists_dev_topics
						  ON ngo_prop_type_id = dev_topic_id
					      WHERE ngo_prop_type_general = %s
					      AND ngo_prop_ngo_id = %d
					      ORDER BY dev_topic_name ASC;',
					      "development topic",
					      $table_of_god_internal_results[$x]->tog_data_num2
					      );
	  $dev_topics_results = $GLOBALS['wpdb']->get_results($dev_topics_query);
	  for($z=0;$z<count($dev_topics_results);$z++){
	      if($z != 0){
		  $table_of_god .= '; ';
	      }
	      $table_of_god .= '
	      <a style="cursor:help;" title="'.$dev_topics_results[$z]->dev_topic_description.'">'.
		$dev_topics_results[$z]->dev_topic_name
	      .'</a>';
	  }
      $table_of_god .= '
      </td>
      ';
    }
    #development topic (close)
    
    #geographic area (open)
    elseif($table_of_god_content_td_number == 7){
      $table_of_god .= '
      <td style="text-align:center;vertical-align:middle;">';
	  if($table_of_god_internal_results[$x]->tog_data_string14 == "country"){
	      $table_of_god .=
	      $table_of_god_internal_results[$x]->tog_data_string11.
	      '<br>('
	      .$table_of_god_internal_results[$x]->tog_data_string12.
	      ', '
	      .$table_of_god_internal_results[$x]->tog_data_string13.')';
	  }elseif($table_of_god_internal_results[$x]->tog_data_string14 == "region"){
	      $table_of_god .=
	      $table_of_god_internal_results[$x]->tog_data_string11.
	      '<br>('
	      .$table_of_god_internal_results[$x]->tog_data_string13.')';
	  }elseif($table_of_god_internal_results[$x]->tog_data_string14 == "continent"){
	      $table_of_god .=
	      $table_of_god_internal_results[$x]->tog_data_string11;
	  }
      $table_of_god .= '
      </td>
      ';
    }
    #geographic area (open)
    
    #author and org (open)
    elseif($table_of_god_content_td_number == 8){
      
      #function_profile_link.php (open)
      if(1==1){
	  $function_profile_link = $table_of_god_internal_results[$x]->tog_data_num1; //default: 1
	  $function_profile_link_img_div = "yes"; //default: no/empty, shows picture on hover, only works for people
	  include('#function-profile-link.php');
	  #output saved in:
	  # $function_profile_link__link
	  $author_name_link = $function_profile_link__name_link;
	  # $function_profile_link__link_title
	  
	  $function_profile_link = $table_of_god_internal_results[$x]->tog_data_num2; //default: 1
	  $function_profile_link__ngo = "yes"; //default: no/empty
	  include('#function-profile-link.php');
	  #output saved in:
	  # $function_profile_link__link
	  $author_ngo_name_link = $function_profile_link__name_link;
	  # $function_profile_link__link_title
      }
      #function_profile_link.php (close)
      
      $table_of_god .= '
      <td style="text-align:center;vertical-align:middle;">
	  '.$author_name_link.'
	  <br>
	  for
	  <br>
	  '.$author_ngo_name_link.'
	  <span style="display:none;" class="task_ngo">
	      '.$table_of_god_internal_results[$x]->tog_data_string9.'
	  </span>
	  <span style="display:none;" class="task_code">
	      '.$table_of_god_internal_results[$x]->tog_data_string4.'
	  </span>
      </td>
      ';
    }
    #author and org (close)
    
    elseif($table_of_god_content_td_number == 9){
      $table_of_god .= '
      <td style="text-align:center;vertical-align:middle;">';
	  if($table_of_god_internal_results[$x]->tog_data_string15 == "pending"){
	      $task_saf_hide_apply_button = "display:none;";
	      $task_saf_hide_withdraw_button = "";
	  }else{
	      $task_saf_hide_apply_button = "";
	      $task_saf_hide_withdraw_button = "display:none;";
	  }
	  $table_of_god .= '
	  <div
	      class="
		  voluno_text_button_style
		  apply_link
		  task_id_'.$table_of_god_internal_results[$x]->tog_data_num4.'
		  "
	      style="
		  background:#8B0000;
		  cursor: pointer;
		  margin-left:auto;
		  margin-right:auto;
		  '.$task_saf_hide_apply_button.'
	      "
	  >
	      Apply
	  </div>
	  <div
	      class="
		  voluno_text_button_style
		  apply_withdraw_link
		  task_id_'.$table_of_god_internal_results[$x]->tog_data_num4.'
		  "
	      style="
		  background:#8B0000;
		  cursor: pointer;
		  width:68px;
		  margin-left:auto;
		  margin-right:auto;
		  '.$task_saf_hide_withdraw_button.'
	      "
	  >
	      Withdraw
	      <br>
	      application
	  </div>
      </td>
      ';
    }
    #td content section (open)
    
}
#staging or production phase - staging (close)

?>