<?php

#mysql (open)
if(1==1){
    
}
#mysql (close)

#jquery (open)
if(1==1){
    
}
#jquery (close)

#style (open)
if(1==1){
    
}
#style (close)

#content (open)
if(1==1){

    #preparation (open)
    if(1==1){
	
	#function-image-processing.php (v1.0) (open)
	if(1==1){
	    #thematic only
		$function_propic__type = "thematic";
		$function_propic__original_img_name = "staff-net-home.jpg";
	    #all
		$function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
	    include('#function-image-processing.php');
	    # $function_propic;
	    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
	}
	#function-image-processing.php (v1.0) (close)
	
    }
    #preparation (close)
    
    #content (open)
    if(1==1){
	
	echo '
	<div style="height:220px;">
	    <img class="voluno_header_picture" src="'.$function_propic.'">
	    <div style="text-align:center;">
		<h1 style="display:inline-block;padding:30px;">
		    Staff Intranet
		</h1>
	    </div>
	    Welcome to the digital headquarters of Voluno. This section is only accessbile for Voluno staff members.
	</div>';
	
	#function-picture-page.php (v1.0) (open)
	if(1==1){
	    $function_picture_page__array = array(
		array(
		    'title' => 'Internal work'
		    ,'page_id' => 824
		    ,'description' => 'Internal, department specific workspaces.'
		    #,'line_breaking_title' => 1 //only if title very long and breaks line, otherwise delete
		    ,'img_name' => 'internal-work.jpg'
		),
		array(
		    'title' => 'Calendar'
		    ,'page_id' => 823
		    ,'description' => 'Overview of all internal dates.'
		    #,'line_breaking_title' => 1 //only if title very long and breaks line, otherwise delete
		    ,'img_name' => 'calendar.jpg'
		),
		array(
		    'title' => 'Organigram'
		    ,'page_id' => 825
		    ,'description' => 'Overview of who is who and who does what.'
		    #,'line_breaking_title' => 1 //only if title very long and breaks line, otherwise delete
		    ,'img_name' => 'organigram.jpg'
		),
		array(
		    'title' => 'Current development state of this platform'
		    ,'page_id' => 839
		    ,'description' => 'This platform is under constant construction, maintenance and improvement. Here, you can see the current state.'
		    ,'line_breaking_title' => 1 //only if title very long and breaks line, otherwise delete
		    ,'img_name' => 'under_construction.jpg'
		),
	    );
	    $function_picture_page__row_design = array(2,2); // 1, 2 or 3
	    $function_picture_page__start = 1;
	    
	    include('#function-picture-page.php');
	}
	#function-picture-page.php (v1.0) (close)
	
    }
    #content (close)

}
#content (close)

?>