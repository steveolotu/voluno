<?php

#notice (open)
if(get_home_url() == "https://www.voluno.org/beta"){
    
}else{
    
    echo '
    <h1 style="color:red;margin-bottom:200px;">
	Deprecated, please use
	<a  style="color:red;" href="https://www.voluno.org/beta/archives/developer-page/info">www.voluno.org/beta info</a> only!
    </h1>';
    
}
#notice (close)

#standards (open)
if(1==1){
    
    $get_data_query = $GLOBALS['wpdb']->prepare('SELECT *
				     FROM fi4l3fg_voluno_admin_info
				     WHERE admin_info_type = "standard"');
    $get_data_results = $GLOBALS['wpdb']->get_results($get_data_query);
    
    echo '
    <h1>
	Standards for this web platform
    </h1>
    <table>';
    for($x=0;$x<count($get_data_results);$x++){
	echo '
	<tr>
	    <td>
		#'.($x+1).'
		<br>
		ID: '.$get_data_results[$x]->admin_info_id.'
	    </td>
	    <td>
		'.$get_data_results[$x]->admin_info_content.'
	    </td>
	</tr>';
    }
    echo '
    </table>';
}
#standards (close)

#do me (open)
if(1==1){
    
    $get_data_query = $GLOBALS['wpdb']->prepare('SELECT *
				     FROM fi4l3fg_voluno_admin_info
				     WHERE admin_info_type = "do me"');
    $get_data_results = $GLOBALS['wpdb']->get_results($get_data_query);
    
    echo '
    <h1>
	Dome list
    </h1>
    <table>';
    for($x=0;$x<count($get_data_results);$x++){
	echo '
	<tr>
	    <td>
		# '.($x+1).'
		<br>
		ID: '.$get_data_results[$x]->admin_info_id.'
	    </td>
	    <td>
		'.$get_data_results[$x]->admin_info_content.'
	    </td>
	</tr>';
    }
    echo '
    </table>';
}
#dome (close)

#page specific dome (open)
if(1==1){
  
  $page_specific_dome_array = array(
	  //0 url
	  //1 page name
	  //2 deleted users
		  //3 blocked users
			  //4 image processing
				  //5 sanitization
					  //6 espace outputted text, line breaks, etc. (properly tested)
						  //7 spelling checks
							  //10 images bought
	array(
	  get_permalink(738),
	  'Forum',
	  "no",  "no",   "no",   "no",   "no",   "no",   "no"
	  ),
	array(
	  get_permalink(689),
	  'Voluno Members',
	  "yes",  "yes",   "yes",   "no",   "no",   "no",   "yes"
	  ),
	array(
	  get_permalink(696),
	  'My messages',
	  "no",  "no",   "no",   "no",   "no",   "no",   "no"
	  ),
	array(
	  get_permalink(686),
	  'My profile',
	  "no",  "no",   "no",   "no",   "no",   "no",   "no"
	  ),
	array(
	  get_permalink(748),
	  'My contacts',
	  "no",  "no",   "no",   "no",   "no",   "no",   "no"
	  ),
	array(
	  get_permalink(756),
	  'My positions',
	  "no",  "no",   "no",   "no",   "no",   "no",   "no"
	  ),
	array(
	  get_permalink(770),
	  'My settings',
	  "no",  "no",   "no",   "no",   "no",   "no",   "no"
	  )
	
	/*default
	array(
	  'https:...',
	  '',
	  "no",  "no",   "no",   "no",   "no",   "no",   "no",
	  ),
	*/
	
      );
  
  echo '
  <h4>
    Overview of what has been checked on the page
  </h4>
  <table>';
  
    #title row (open)
    if(1==1){
      
      $title_array = array(
		   "#",
		   "Page",
		   "deleted users",
		   "blocked users",
		   "image processing",
		   "sanitization function used",
		   "espace outputted text, line breaks, etc. (tested)",
		   "spelling checks",
		   "images bought"
		   );
      echo '
      <tr style="background-color:lightgreen;">';
	for($x=0;$x<count($title_array);$x++){
	  echo '
	  <td>
	    '.$title_array[$x].'
	  </td>';
	}
      echo '
      </tr>';
    }
    #title row (close)
    
    for($x=0;$x<count($page_specific_dome_array);$x++){
      echo '
      <tr style="border-bottom:1px dotted grey;">
	<td>
	  '.($x+1).'
	</td>
	<td>
	  <a href="'.$page_specific_dome_array[$x][0].'" title="'.$page_specific_dome_array[$x][0].'">
	    '.$page_specific_dome_array[$x][1].'
	  </a>
	</td>';
	for($y=0;$y<7;$y++){
	  echo '
	  <td>
	    '.$page_specific_dome_array[$x][$y+2].'
	  </td>';
	}
      echo '
      </tr>';
    }
  echo '
  </table>';
}
#page specific dome (close)

?>