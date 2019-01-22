<?php

#content (open) #modified
if(1==1){
    
    #pers. pages + title + img (open)
    if(1==1){
	
	#function-personal-pages.php (open)
	if(1==1){
	    $function_pers_pages_id = 1;
	    $function_pers_pages_active_page = "Overview";
	    include("#function-personal-pages.php");
	    echo $function_pers_pages;
	    #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
	}
	#function-personal-pages.php (close)
	
	#function-image-processing (open)
	if(1==1){
	    #thematic only
		$function_propic__type = "thematic";
		$function_propic__original_img_name = "my_office.jpg";
	    #all
		$function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
	    include('#function-image-processing.php');
	    # $function_propic;
	    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
	}
	#function-image-processing (close)
	
	echo '
	<img src="'.$function_propic.'" class="	voluno_header_picture">
	<div style="text-align:center;margin:30px;">
	    <h1 style="display:inline;">
		My office
	    </h1>
	</div>
	<p>
	    Here, you can see and modify most of your personal settings and preferences.
	</p>
	';
    }
    #pers. pages + title + img (open)
    
    #function-picture-page.php (open) #modified
    if(1==1){
	$function_picture_page__array = array(
	    array(
		    'title' => $function_pers_pages_array[1]['display']
		    ,'page_id' => $function_pers_pages_array[1]['link']
		    ,'description' => $function_pers_pages_array[1]['title'].'.'
		    ,'img_name' => 'messages.jpg'
		),
	    array(
		    'title' => $function_pers_pages_array[2]['display']
		    ,'page_id' => $function_pers_pages_array[2]['link']
		    ,'description' => $function_pers_pages_array[2]['title'].'.'
		    ,'img_name' => 'profile.jpg'
		),
	    array(
		    'title' => $function_pers_pages_array[3]['display']
		    ,'page_id' => $function_pers_pages_array[3]['link']
		    ,'description' => $function_pers_pages_array[3]['title'].'.'
		    ,'img_name' => 'contacts.jpg'
		),
	    array(
		    'title' => $function_pers_pages_array[4]['display']
		    ,'page_id' => $function_pers_pages_array[4]['link']
		    ,'description' => $function_pers_pages_array[4]['title'].'.'
		    ,'img_name' => 'positions.jpg'
		),
	    array(
		    'title' => $function_pers_pages_array[5]['display']
		    ,'page_id' => $function_pers_pages_array[5]['link']
		    ,'description' => $function_pers_pages_array[5]['title'].'.'
		    ,'img_name' => 'settings.jpg'
		)
	);
	$function_picture_page__row_design = array(3,2); // 1, 2 or 3
	$function_picture_page__image_name_type = "home_members_net";
	$function_picture_page__start = 1;
	include('#function-picture-page.php');
    }
    #function-picture-page.php (close) #modified
    
}
#content (close) #modified

?>