<?php

#NOTE stevesteve: i only worked on months a lot, and on event_list a little. so all has to be done, and event theres still a lot of old code in event list.
#please check ... everything in here... :-)

#general preparation (open)
if(1==1){
    
    $view_selection_array = array(
	array('display_name' => 'Year', 'url_name' => 'year')
	,array('display_name' => 'Month', 'url_name' => 'month')
	,array('display_name' => 'Week', 'url_name' => 'week')
	,array('display_name' => 'Event list', 'url_name' => 'event_list')
    );
    foreach($view_selection_array as $col2){
	$view_selection_array__url_name[] = $col2['url_name']; 
    }
    
    #get and validate date (open)
    if(1==1){
	
	#get day (open)
	if($_GET['date_day'] <= 31 AND $_GET['date_day'] >= 1 AND is_numeric($_GET['date_day'])){
	    $day = $_GET['date_day'];
	}else{
	    $day = date("d");
	}
	#get day (close)
	
	#get month (open)
	if($_GET['date_month'] <= 12 AND $_GET['date_month'] >= 1 AND is_numeric($_GET['date_month'])){
	    $month = $_GET['date_month'];
	}else{
	    $month = date("m");
	}
	#get month (close)
	
	#get year (open)
	if($_GET['date_year'] <= 3000 AND $_GET['date_year'] >= 2013 AND is_numeric($_GET['date_year'])){
	    $year = $_GET['date_year'];
	}else{
	    $year = date("Y");
	}
	#get year (close)
	
	#get date_selection (open)
	if(in_array($_GET['date_selection'],$view_selection_array__url_name)){
	    $date_selection = $_GET['date_selection'];
	}else{
	    $date_selection = "day";
	}
	#get date_selection (close)
	
	#validate date (open)
	if(checkdate(intval($month),intval($day),$year)){
	    $date = $year.'-'.$month.'-'.$day;
	}else{
	    $date = date("Y-m-d");
	}
	#validate date (close)
    
    }
    #get and validate date (close)
    
}
#general preparation (close)

#style (open)
if(1==1){
    
    echo '
    <style>';
    
	#date type selection (open)
	if(1==1){
	    echo '
	    .date_selection_divs{
		width:216px;
		display:inline-block;
		background-color:#FFC977;
		color:#fff;
	    }
	    .date_selection_divs{
		border-radius:5px;
		display:inline-block;
		margin:5px;
		line-height: 50px;
		text-align:center;
		vertical-align:middle;
		font-weight:bold;
		font-size:140%;
	    }
	    .date_selection_divs:hover{
		background-color:#F86A00;
	    }
	    ';
	}
	#date type selection (close)
	
	#
	if(in_array($date_selection,array("year","month","week"))){
	    
	    echo '
	    .title_divs{
		border-radius:5px;
		display:inline-block;
		margin:5px;
		line-height: 50px;
		text-align:center;
		vertical-align:middle;
		font-weight:bold;
		font-size:140%;
	    }
	    .title_divs{
		width:293px;
		color:#fff;
		background-color:#8B0000;
	    }
	    .title_divs:hover{
		background-color:#F86A00;
	    }
	    
	    .date_unit_div, .date_unit_div_selected{
		margin:5px;
		padding:5px;
		float:left;
		border-radius:5px;
		width:111px;
		height:80px;
	    }
	    .date_unit_div{
		background-color:#FFEAB9;
	    }
	    .date_unit_div_selected{
		background-color:#FFC977;
	    }
	    .date_unit_div:hover, .date_unit_div_selected:hover{
		background-color:#FFD87D;
	    }
	    .event_name_div{
		cursor:pointer;
	    }
	    .event_hover_div{
		display:none;
		border-radius:10px;
		padding:10px;
		margin-left:-100px;
		width:250px;
		position:absolute;
		background-color:#F86A00;
	    }
	    ';
	}
	#
	
	#event_list (open)
	if(in_array($date_selection,array("event_list"))){
	    
	    echo '
	    .event_div{
		margin:5px;
		background-color:#FFEAB9;
		padding:5px;
		border-radius:5px;
	    }
	    ';
	    
	}
	#event_list (close)
	
    echo '
    </style>';

}
#style (close)

#jquery (open)
if(1==1){
    
    echo '
    <script>
	jQuery(document).ready(function(){';
	
	    if(in_array($date_selection,array("year","month","week"))){
		echo '
		jQuery(".event_name_div").hover(function(){
		    jQuery(this).parent().find(".event_hover_div").fadeIn(300);
		},function(){
		    jQuery(this).parent().find(".event_hover_div").fadeOut(300);
		});
		';
	    }
	    
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
	    
	    #function-image-processing (open)
	    if(1==1){
		#thematic only
		    $function_propic__type = "thematic";
		    $function_propic__original_img_name = "calendar.jpg";
		#all
		    $function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
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
	    <div style="overflow:hidden;">
		<img src="'.$function_propic.'" class="voluno_header_picture">
		<div style="text-align:center;">
		    <h1 style="display:inline;">
			Calendar
		    </h1>
		</div>
		this year: '.$year.'
		<br>
		this month: '.$month.'
		<br>
		this day: '.$day.'
		<br>
		date_selection: '.$date_selection.'
		<br>
	    </div>';
	    
	}
	#content (close)
	
    }
    #img + title (close)
    
    #view selection (display) (open)
    if(1==1){
	for($abq=0;$abq<count($view_selection_array);$abq++){
	    
	    if($view_selection_array[$abq]['url_name'] == $date_selection){
		$selected_month = 'style="color:#8B0000;"';
	    }else{
		unset($selected_month);
	    }
	    
	    echo '
	    <a
		href="'.
		    get_permalink().
		    '?date_selection='.$view_selection_array[$abq]['url_name'].
		    '&date_year='.$year_number.
		    '&date_month='.$month_number.
		'"
	    >
		<div class="date_selection_divs" '.$selected_month.'>
		    '.$view_selection_array[$abq]['display_name'].'
		</div>
	    </a>';
	    
	}
    }
    #view selection (display) (close)
    
    #year (open)
    if($date_selection == "year"){
	
	#title divs (open)
	for($abp=(-1);$abp<=1;$abp++){
	    
	    #preparation (open)
	    if(1==1){
		
		$month_number = date('m', strtotime($abp.' month', strtotime($date)));
		$year_number = date('Y', strtotime($abp.' month', strtotime($date)));
		$month_year_display = date('F Y', strtotime($abp.' month', strtotime($date)));
		
		if($abp == 0){
		    $selected_month = 'style="color:#FFC977;"';
		}else{
		    unset($selected_month);
		}
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<a href="'.get_permalink().'?date_selection=month&date_year='.$year_number.'&date_month='.$month_number.'">
		    <div class="title_divs" '.$selected_month.'>
			'.$month_year_display.'
		    </div>
		</a>';
		
	    }
	    #content (close)
	    
	}
	#title divs (close)
	
	#all days of month loop - content (open)
	for($abn=0;$abn<date("t");$abn++){
	    
	    #preparation (open)
	    if(1==1){
		
		$loop_day = $abn + 1;
		
		#selected (open)
		if($loop_day == intval($day)){
		    $selected = "date_unit_div_selected";
		}else{
		    $selected = "date_unit_div";
		}
		#selected (close)
		
		#query (open)
		if(1==1){
		    $events_for_this_day_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_events
								WHERE event_date BETWEEN %s AND %s;'
								,$year.'-'.$month.'-'.$loop_day.' 00:00:00'
								,$year.'-'.$month.'-'.$loop_day.' 23:59:59');
		    $events_for_this_day_results = $GLOBALS['wpdb']->get_results($events_for_this_day_query);
		}
		#query (close)
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<div class="'.$selected.'">
		    <span style="font-weight:bold;">
			'.date('d D',strtotime($year.'-'.$month.'-'.$loop_day.' 00:00:00')).'
		    </span>';
		    
		    #within each day loop (open)
		    for($abo=0;$abo<count($events_for_this_day_results);$abo++){
			
			#plenary meeting (open)
			if($events_for_this_day_results[$abo]->event_type == "plenary meeting"){
			    
			    #prepare (open)
			    if(1==1){
				
				#function-image-processing (open)
				if(1==1){
				    #thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "plenary_meeting.jpg";
					$function_propic__cropping = "yes"; //yes or empty (default)
				    #all
					$function_propic__geometry = array(100,NULL); //optional, if e.g. only width: 300, NULL; vice versa
				    include('#function-image-processing.php');
				    # $function_propic;
				    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				#function-timezone.php (open)
				if(1==1){
				    
				    $event_date = $events_for_this_day_results[$abo]->event_date;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
				    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
				    //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
				    include('#function-timezone.php');
				    #output:
				    $date_with_weekday = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time (hour min)"; 
				    include('#function-timezone.php');
				    #output:
				    $date_time = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time difference (short)";
				    include('#function-timezone.php');
				    #output:
				    $time_difference = $function_timezone;
				    
				}
				#function-timezone.php (close)
				
			    }
			    #prepare (close)
			    
			    #content (open)
			    if(1==1){
				echo '
				<div>
				    <div class="event_name_div">
					- '.$events_for_this_day_results[$abo]->event_name.'
				    </div>
				    <div class="event_hover_div">
					<div style="overflow:hidden;">
					    <img
						style="float:right;border:1px solid black;border-radius:5px;"
						class="voluno_brighter_on_hover"
						src="'.$function_propic.'"
					    >
					    <p style="font-weight:bold;">
						'.$events_for_this_day_results[$abo]->event_name.'
						<br>
						'.$date_with_weekday.', '.$date_time.'
						<br>
						('.$time_difference.')
					    </p>
					</div>
					<p>
					    '.$events_for_this_day_results[$abo]->event_description.'
					</p>
				    </div>
				</div>
				';
			    }
			    #content (close)
			    
			}
			#plenary meeting (close)
			
			#all other (open)
			else{
			    echo '
			    <div>
				<div class="event_name_div">
				    - '.$events_for_this_day_results[$abo]->event_name.'
				</div>
				<div class="event_hover_div">
				    <strong>
					'.$events_for_this_day_results[$abo]->event_name.'
					<br>
					'.$events_for_this_day_results[$abo]->event_date.'
				    </strong>
				    <p>
					'.$events_for_this_day_results[$abo]->event_description.'
				    </p>
				</div>
			    </div>
			    ';
			}
			#all other (close)
			
		    }
		    #within each day loop (close)
		    
		echo '
		</div>';
		
	    }
	    #content (close)
	    
	}
	#all days of month loop - content (close)
	
    }
    #year (close)

    #month (open)
    if($date_selection == "month"){
	
	#title divs (open)
	for($abp=(-1);$abp<=1;$abp++){
	    
	    #preparation (open)
	    if(1==1){
		
		$month_number = date('m', strtotime($abp.' month', strtotime($date)));
		$year_number = date('Y', strtotime($abp.' month', strtotime($date)));
		$month_year_display = date('F Y', strtotime($abp.' month', strtotime($date)));
		
		if($abp == 0){
		    $selected_month = 'style="color:#FFC977;"';
		}else{
		    unset($selected_month);
		}
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<a href="'.get_permalink().'?date_selection=month&date_year='.$year_number.'&date_month='.$month_number.'">
		    <div class="title_divs" '.$selected_month.'>
			'.$month_year_display.'
		    </div>
		</a>';
		
	    }
	    #content (close)
	    
	}
	#title divs (close)
	
	#all days of month loop - content (open)
	for($abn=0;$abn<date("t");$abn++){
	    
	    #preparation (open)
	    if(1==1){
		
		$loop_day = $abn + 1;
		
		#selected (open)
		if($loop_day == intval($day)){
		    $selected = "date_unit_div_selected";
		}else{
		    $selected = "date_unit_div";
		}
		#selected (close)
		
		#query (open)
		if(1==1){
		    $events_for_this_day_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_events
								WHERE event_date BETWEEN %s AND %s;'
								,$year.'-'.$month.'-'.$loop_day.' 00:00:00'
								,$year.'-'.$month.'-'.$loop_day.' 23:59:59');
		    $events_for_this_day_results = $GLOBALS['wpdb']->get_results($events_for_this_day_query);
		}
		#query (close)
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<div class="'.$selected.'">
		    <span style="font-weight:bold;">
			'.date('d D',strtotime($year.'-'.$month.'-'.$loop_day.' 00:00:00')).'
		    </span>';
		    
		    #within each day loop (open)
		    for($abo=0;$abo<count($events_for_this_day_results);$abo++){
			
			#plenary meeting (open)
			if($events_for_this_day_results[$abo]->event_type == "plenary meeting"){
			    
			    #prepare (open)
			    if(1==1){
				
				#function-image-processing (open)
				if(1==1){
				    #thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "plenary_meeting.jpg";
					$function_propic__cropping = "yes"; //yes or empty (default)
				    #all
					$function_propic__geometry = array(100,NULL); //optional, if e.g. only width: 300, NULL; vice versa
				    include('#function-image-processing.php');
				    # $function_propic;
				    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				#function-timezone.php (open)
				if(1==1){
				    
				    $event_date = $events_for_this_day_results[$abo]->event_date;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
				    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
				    //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
				    include('#function-timezone.php');
				    #output:
				    $date_with_weekday = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time (hour min)"; 
				    include('#function-timezone.php');
				    #output:
				    $date_time = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time difference (short)";
				    include('#function-timezone.php');
				    #output:
				    $time_difference = $function_timezone;
				    
				}
				#function-timezone.php (close)
				
			    }
			    #prepare (close)
			    
			    #content (open)
			    if(1==1){
				echo '
				<div>
				    <div class="event_name_div">
					- '.$events_for_this_day_results[$abo]->event_name.'
				    </div>
				    <div class="event_hover_div">
					<div style="overflow:hidden;">
					    <img
						style="float:right;border:1px solid black;border-radius:5px;"
						class="voluno_brighter_on_hover"
						src="'.$function_propic.'"
					    >
					    <p style="font-weight:bold;">
						'.$events_for_this_day_results[$abo]->event_name.'
						<br>
						'.$date_with_weekday.', '.$date_time.'
						<br>
						('.$time_difference.')
					    </p>
					</div>
					<p>
					    '.$events_for_this_day_results[$abo]->event_description.'
					</p>
				    </div>
				</div>
				';
			    }
			    #content (close)
			    
			}
			#plenary meeting (close)
			
			#all other (open)
			else{
			    echo '
			    <div>
				<div class="event_name_div">
				    - '.$events_for_this_day_results[$abo]->event_name.'
				</div>
				<div class="event_hover_div">
				    <strong>
					'.$events_for_this_day_results[$abo]->event_name.'
					<br>
					'.$events_for_this_day_results[$abo]->event_date.'
				    </strong>
				    <p>
					'.$events_for_this_day_results[$abo]->event_description.'
				    </p>
				</div>
			    </div>
			    ';
			}
			#all other (close)
			
		    }
		    #within each day loop (close)
		    
		echo '
		</div>';
		
	    }
	    #content (close)
	    
	}
	#all days of month loop - content (close)
	
    }
    #month (close)
    
    #week (open)
    if($date_selection == "week"){
	
	#title divs (open)
	for($abp=(-1);$abp<=1;$abp++){
	    
	    #preparation (open)
	    if(1==1){
		
		$month_number = date('m', strtotime($abp.' month', strtotime($date)));
		$year_number = date('Y', strtotime($abp.' month', strtotime($date)));
		$month_year_display = date('F Y', strtotime($abp.' month', strtotime($date)));
		
		if($abp == 0){
		    $selected_month = 'style="color:#FFC977;"';
		}else{
		    unset($selected_month);
		}
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<a href="'.get_permalink().'?date_selection=month&date_year='.$year_number.'&date_month='.$month_number.'">
		    <div class="title_divs" '.$selected_month.'>
			'.$month_year_display.'
		    </div>
		</a>';
		
	    }
	    #content (close)
	    
	}
	#title divs (close)
	
	#all days of month loop - content (open)
	for($abn=0;$abn<date("t");$abn++){
	    
	    #preparation (open)
	    if(1==1){
		
		$loop_day = $abn + 1;
		
		#selected (open)
		if($loop_day == intval($day)){
		    $selected = "date_unit_div_selected";
		}else{
		    $selected = "date_unit_div";
		}
		#selected (close)
		
		#query (open)
		if(1==1){
		    $events_for_this_day_query = $GLOBALS['wpdb']->prepare('SELECT *
								FROM fi4l3fg_voluno_events
								WHERE event_date BETWEEN %s AND %s;'
								,$year.'-'.$month.'-'.$loop_day.' 00:00:00'
								,$year.'-'.$month.'-'.$loop_day.' 23:59:59');
		    $events_for_this_day_results = $GLOBALS['wpdb']->get_results($events_for_this_day_query);
		}
		#query (close)
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<div class="'.$selected.'">
		    <span style="font-weight:bold;">
			'.date('d D',strtotime($year.'-'.$month.'-'.$loop_day.' 00:00:00')).'
		    </span>';
		    
		    #within each day loop (open)
		    for($abo=0;$abo<count($events_for_this_day_results);$abo++){
			
			#plenary meeting (open)
			if($events_for_this_day_results[$abo]->event_type == "plenary meeting"){
			    
			    #prepare (open)
			    if(1==1){
				
				#function-image-processing (open)
				if(1==1){
				    #thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "plenary_meeting.jpg";
					$function_propic__cropping = "yes"; //yes or empty (default)
				    #all
					$function_propic__geometry = array(100,NULL); //optional, if e.g. only width: 300, NULL; vice versa
				    include('#function-image-processing.php');
				    # $function_propic;
				    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				#function-timezone.php (open)
				if(1==1){
				    
				    $event_date = $events_for_this_day_results[$abo]->event_date;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
				    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
				    //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
				    include('#function-timezone.php');
				    #output:
				    $date_with_weekday = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time (hour min)"; 
				    include('#function-timezone.php');
				    #output:
				    $date_time = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time difference (short)";
				    include('#function-timezone.php');
				    #output:
				    $time_difference = $function_timezone;
				    
				}
				#function-timezone.php (close)
				
			    }
			    #prepare (close)
			    
			    #content (open)
			    if(1==1){
				echo '
				<div>
				    <div class="event_name_div">
					- '.$events_for_this_day_results[$abo]->event_name.'
				    </div>
				    <div class="event_hover_div">
					<div style="overflow:hidden;">
					    <img
						style="float:right;border:1px solid black;border-radius:5px;"
						class="voluno_brighter_on_hover"
						src="'.$function_propic.'"
					    >
					    <p style="font-weight:bold;">
						'.$events_for_this_day_results[$abo]->event_name.'
						<br>
						'.$date_with_weekday.', '.$date_time.'
						<br>
						('.$time_difference.')
					    </p>
					</div>
					<p>
					    '.$events_for_this_day_results[$abo]->event_description.'
					</p>
				    </div>
				</div>
				';
			    }
			    #content (close)
			    
			}
			#plenary meeting (close)
			
			#all other (open)
			else{
			    echo '
			    <div>
				<div class="event_name_div">
				    - '.$events_for_this_day_results[$abo]->event_name.'
				</div>
				<div class="event_hover_div">
				    <strong>
					'.$events_for_this_day_results[$abo]->event_name.'
					<br>
					'.$events_for_this_day_results[$abo]->event_date.'
				    </strong>
				    <p>
					'.$events_for_this_day_results[$abo]->event_description.'
				    </p>
				</div>
			    </div>
			    ';
			}
			#all other (close)
			
		    }
		    #within each day loop (close)
		    
		echo '
		</div>';
		
	    }
	    #content (close)
	    
	}
	#all days of month loop - content (close)
	
    }
    #week (close)

    #event list (open)
    if($date_selection == "event_list"){
	
	#title divs (open)
	for($abp=(-1);$abp>=1;$abp++){
	    
	    #preparation (open)
	    if(1==1){
		
		$month_number = date('m', strtotime($abp.' month', strtotime($date)));
		$year_number = date('Y', strtotime($abp.' month', strtotime($date)));
		$month_year_display = date('F Y', strtotime($abp.' month', strtotime($date)));
		
		if($abp == 0){
		    $selected_month = 'style="color:#FFC977;"';
		}else{
		    unset($selected_month);
		}
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<a href="'.get_permalink().'?date_selection=month&date_year='.$year_number.'&date_month='.$month_number.'">
		    <div class="title_divs" '.$selected_month.'>
			'.$month_year_display.'
		    </div>
		</a>';
		
	    }
	    #content (close)
	    
	}
	#title divs (close)
	
	#query (open)
	if(1==1){
	    $current_and_future_events_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_events
							WHERE event_date >= NOW() - INTERVAL 6 MONTH;');
	    $current_and_future_events_results = $GLOBALS['wpdb']->get_results($current_and_future_events_query);
	}
	#query (close)
	
	#all events (future + last 6 months) loop (open)
	for($abn=0;$abn<count($current_and_future_events_results);$abn++){
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<table class="event_div">
		    <tr>
			<td style="font-weight:bold;">
			    <h5>
				'.date('l, d M Y',strtotime($current_and_future_events_results[$abn]->event_date)).'
			    </h5>
			</td>
			<td>
			<h3 class="event_name_link">
			    '.$current_and_future_events_results[$abn]->event_name.'
			</h3>';
			
			#plenary meeting (open)
			if($current_and_future_events_results[$abn]->event_type == "plenary meeting"){
			    
			    #prepare (open)
			    if(1==1){
				
				#function-image-processing (open)
				if(1==1){
				    #thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "plenary_meeting.jpg";
					$function_propic__cropping = "yes"; //yes or empty (default)
				    #all
					$function_propic__geometry = array(100,NULL); //optional, if e.g. only width: 300, NULL; vice versa
				    include('#function-image-processing.php');
				    # $function_propic;
				    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				#function-timezone.php (open)
				if(1==1){
				    
				    $event_date = $current_and_future_events_results[$abn]->event_date;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
				    //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
				    //"date (weekday short)","time (hour min sec)","time (hour min)", "time difference (short)"
				    include('#function-timezone.php');
				    #output:
				    $date_with_weekday = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time (hour min)"; 
				    include('#function-timezone.php');
				    #output:
				    $date_time = $function_timezone;
				    
				    $function_timezone = $event_date;
				    $function_timezone_format = "time difference (short)";
				    include('#function-timezone.php');
				    #output:
				    $time_difference = $function_timezone;
				    
				}
				#function-timezone.php (close)
				
				#function-file-icons.php (v1.0) (open)
				if(1==1){
				    
				    $plenary_meeting_files_query = $GLOBALS['wpdb']->prepare('SELECT *
										    FROM fi4l3fg_voluno_files
										    WHERE vol_file_type_general = "event"
											AND vol_file_type_specific = "plenary_meeting"
											AND vol_file_type_id = %d;'
										    ,$current_and_future_events_results[$abn]->event_id);
				    $plenary_meeting_files_results = $GLOBALS['wpdb']->get_results($plenary_meeting_files_query);
				    $function_file_icons = $plenary_meeting_files_results; //array of fi4l3fg_voluno_files rows (you need to make a query)
				    #$function_file_icons_delete_option = "yes"; //default:no. deleted files are save in span with class: function_file_icons_deleted_files_ids "4,59"
				    include("#function-file-icons.php");
				    #output: $function_file_icons;
				}
				#function-file-icons.php (v1.0) (close)
				
			    }
			    #prepare (close)
			    
			    #content (open)
			    if(1==1){
				echo '
				<div>
				    <div class="event_name_div">
					- '.$current_and_future_events_results[$abn]->event_name.'
				    </div>
				    <div class="event_hover_div">
					<div style="overflow:hidden;">
					    <img
						style="float:right;border:1px solid black;border-radius:5px;"
						class="voluno_brighter_on_hover"
						src="'.$function_propic.'"
					    >
					    <p style="font-weight:bold;">
						'.$current_and_future_events_results[$abn]->event_name.'
						<br>
						'.$date_with_weekday.', '.$date_time.'
						<br>
						('.$time_difference.')
					    </p>
					</div>
					<p>
					    '.$current_and_future_events_results[$abn]->event_description.'
					</p>
				    </div>
				    <div>
					'.$function_file_icons.'
				    </div>
				</div>
				';
			    }
			    #content (close)
			    
			}
			#plenary meeting (close)
			
			#all other (open)
			else{
			    echo '
			    <div>
				<div class="event_name_div">
				    - '.$current_and_future_events_results[$abo]->event_name.'
				</div>
				<div class="event_hover_div">
				    <strong>
					'.$current_and_future_events_results[$abo]->event_name.'
					<br>
					'.$current_and_future_events_results[$abo]->event_date.'
				    </strong>
				    <p>
					'.$current_and_future_events_results[$abo]->event_description.'
				    </p>
				</div>
			    </div>
			    ';
			}
			#all other (close)
			
		echo '
		</td>
		</tr>
		</table>';
		
	    }
	    #content (close)
	    
	}
	#all events (future + last 6 months) loop (close)
	
    }
    #event list (close)
    
}
#content (close)

?>