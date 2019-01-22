<?php

#main (open)
if(empty($function_picture_page__section)){
    
    #style (open)
    if(1==1){
        echo '
        <style>
            .function_picture_page_td_class{
                text-align:justify;
                width:290px;
            }
            .function_picture_page_td_class_center{
                text-align:center;
                padding:10px !important;
            }
            .function_picture_page_td_class img:hover{
                opacity:0.8;
            }
        </style>';
    }
    #style (close)

    #decision area (open)
    if(1==1){
        
        $function_picture_page__content_element_count = $function_picture_page__start-1;
        $function_picture_page__section = "content";
        
        echo '
        <div style="margin-left:-6px;">
        <table stlye="width:100%;">';
            for($function_picture_page__x=0;$function_picture_page__x<count($function_picture_page__row_design);$function_picture_page__x++){
                echo '
                <tr>';
                    if($function_picture_page__row_design[$function_picture_page__x] == 3){
                        include('#function-picture-page.php');
                        include('#function-picture-page.php');
                        include('#function-picture-page.php');
                    }elseif($function_picture_page__row_design[$function_picture_page__x] == 2){
                        echo '
                        <td colspan="3">
                            <table>
                                <tr>
                                    <td></td>';
                                    include('#function-picture-page.php');
                                    echo '<td></td>';
                                    include('#function-picture-page.php');
                                    echo '<td></td>
                                </tr>
                            </table>
                        </td>';
                    }elseif($function_picture_page__row_design[$function_picture_page__x] == 1){
                        echo '<td></td>';
                        include('#function-picture-page.php');
                        echo '<td></td>';
                    }
                echo '
                </tr>';
            }
        echo '
        </table>
        </div>';
        unset($function_picture_page__section);
    }
    #decision area (close)
    
}
#main (close)

#content (open)
elseif($function_picture_page__section == "content"){
    
    #center row design (open)
    if($function_picture_page__row_design[$function_picture_page__x] == 3){
        $function_picture_page_td_class_padding = "function_picture_page_td_class_center";
    }else{
        $function_picture_page_td_class_padding = "";
    }
    #center row design (close)
    
    #two-line title height (open)
    if(empty($function_picture_page__array[$function_picture_page__content_element_count]['line_breaking_title'])){
        $function_picture_page__row_heght_css = "<br>";
    }else{
        $function_picture_page__row_heght_css = "";
    }
    #two-line title height (close)
    
    #permalink or full url (open)
    if(is_int($function_picture_page__array[$function_picture_page__content_element_count]['page_id'])){
        $function_picture_page__link_address
            = get_permalink($function_picture_page__array[$function_picture_page__content_element_count]['page_id']);
    }else{
        $function_picture_page__link_address
            = $function_picture_page__array[$function_picture_page__content_element_count]['page_id'];
    }
    #permalink or full url (close)
    
    #function-image-processing.php (open)
    if(1==1){
	#thematic only
	    $function_propic__type = "thematic";
	    if(empty($function_picture_page__array[$function_picture_page__content_element_count]['img_name'])){
		$function_propic__original_img_name
		    = $function_picture_page__image_name_type.'-('.($function_picture_page__content_element_count+1).').jpg';
	    }else{
		$function_propic__original_img_name
		    = $function_picture_page__array[$function_picture_page__content_element_count]['img_name'];
	    }
	    $function_propic__cropping = "yes"; //yes or empty (default)
       #all
	    $function_propic__geometry = array(290,205); //optional, if e.g. only width: 300, NULL; vice versa
       include('#function-image-processing.php');
    }
    #function-image-processing.php (close)
    
    echo '
    <td class="function_picture_page_td_class '.$function_picture_page_td_class_padding.'">
        <div style="height:80px;text-align:center;">
            <h4 style="display:inline;">'.$function_picture_page__row_heght_css;
                
                if(!empty($function_picture_page__array[$function_picture_page__content_element_count]['page_id'])){
                    $function_picture_page__link = "yes";
                }else{
                    $function_picture_page__link = "no";
                }
                
                if($function_picture_page__link == "yes"){
                    echo '
                    <a href="'.$function_picture_page__link_address.'">';
                }
                
                echo
                $function_picture_page__array[$function_picture_page__content_element_count]['title'];
                
                if($function_picture_page__link == "yes"){
                    echo
                    '</a>';
                }
                
                echo
            '</h4>
        </div>';
        if($function_picture_page__link == "yes"){
            echo '
            <a href="'.$function_picture_page__link_address.'">';
        }
	    
            echo '
            <img src="'.$function_propic.'" style="border-radius:20px;">';
        if($function_picture_page__link == "yes"){
            echo '
            </a>';
        }
        echo
        '<p>'.
            $function_picture_page__array[$function_picture_page__content_element_count]['description'].
        '</p>'.
    '</td>';
    $function_picture_page__content_element_count++;
}
#content (close)

?>