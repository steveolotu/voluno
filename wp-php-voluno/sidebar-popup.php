<?php

#page decision (open)
if(1==1){
    
    if(!empty($_GET['update_timezone'])){
        $sidebar_popup_page_section = 'update timezone';
    }else{
      $sidebar_popup_page_section = 'main';
    }
    
    if(is_user_logged_in()){
        $logged_in = "yes";
    }
    
}
#page decision (close)

#logged in users (open)
if($logged_in == "yes"){
    
    #general preparation (open)
    if($sidebar_popup_page_section == 'main'){
        
        #developer info (open)
        if(in_array('Voluno Web Developer',$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])){
            
            #function-developer-info.php
            if(1==1){
                
                include('#function-developer-info.php');
                
            }
            #function-developer-info.php
            
        }
        #developer info (close)
        
        #update "last user login" (open)
        if(1==1){
            
            $GLOBALS['wpdb']->update( 
                'fi4l3fg_voluno_users_extended',
                array( //updated content
                    'usersext_lastLogin' => date('Y-m-d H:i:s'),
                ),
                array( //location of updated content
                    'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                ),
                array( //format of updated content
                    '%s'
                ),
                array( //format of location of updated content
                    '%s'
                )
            );
            
        }
        #update "last user login" (close)
        
    }
    #general preparation (close)
    
    #function-notifications.php (v2.0) (open)
    if($sidebar_popup_page_section == 'main'){
        
        #sidebar-popup -> notifications popup
        //when clicking on the top sidebar, this popup appears. it's located in sidebar popup, in order to be displayed on the whole page
            $function_notifications['function_part'] = "sidebar-popup -> notifications popup";
            include('#function-notifications.php');
        
    }
    #function-notifications.php (v2.0) (close)
    
    #orientation guide (open)
    if($sidebar_popup_page_section == 'main'){
        
        #read me (close)
        if(0!=0){
            
            #How to add a new help popup:
            #1.- write the damn thing in members-net-orientation-guide
            #2.- add it to the: $orientation_guide_identificaton_array
            
        }
        #read me (open)
        #$orientation_guide_identificaton_url_ending = "welcome message";
        #general mysql: determine what to show (open)
        if(is_user_logged_in()){
          
        }
        #general mysql: determine what to show (close)
        
        #general jquery (open)
        if(!empty($orientation_guide_identificaton_url_ending)){
            echo '
            <script>
                jQuery(document).ready(function(){
                    
                    function resizeSidebarPopup(){
                        var volunoSidebarPopup_FullHeight = jQuery(window).height();
                        if(volunoSidebarPopup_FullHeight < 400){
                            jQuery(".sidebar_popup__content").css("height",(volunoSidebarPopup_FullHeight-75)+"px");
                            jQuery(".sidebar_popup__content").css("margin-top","0px");
                        }else{
                            jQuery(".sidebar_popup__content").css("height",(volunoSidebarPopup_FullHeight - 250)+"px");
                            jQuery(".sidebar_popup__content").css("margin-top","100px");
                        }
                    }
                    
                    jQuery(window).resize(resizeSidebarPopup);
                    resizeSidebarPopup();
                    
                    jQuery(".sidebar_popup_close_button").click(function(){
                        jQuery(".sidebar_popup").fadeOut(300);
                    });
                    
                });
            </script>';
        }
        #general jquery (close)
        
        #general style (open)
        if(!empty($orientation_guide_identificaton_url_ending)){
            echo '
            <style>
                .sidebar_popup li{
                    display:list-item !important;
                    list-style:square !important;
                }
                
                .sidebar_popup a{
                    font-weight:bold;
                }
            </style>';
        }
        #general style (close)
        
        #content (open)
        if(!empty($orientation_guide_identificaton_url_ending)){
            
            #open div + cancel button (open)
            if(1==1){
            echo 
            '
            <div class="sidebar_popup">
            <div
                style="
                    position:fixed;
                    width:100%;
                    left:0px;
                    top:0px;
                    height:100%;
                    z-index:1001;
                "
            >
                <div
                    class="sidebar_popup__content entry-content"
                    style="
                        width:930px;
                        margin-right:auto;
                        margin-left:auto;
                        background-color:#fff;
                        border-radius:25px;
                        padding:25px;
                    "
                >
                <div
                    class="voluno_button sidebar_popup_close_button"
                    style="
                        position:absolute;
                        width:50px;
                        z-index:1010;
                    "
                >
                    Close
                </div>
                <div style="overflow:auto;width:100%;height:100%;padding-top:5px;padding-right:25px;">';
            }
            #open div + cancel button (close)
                
                #1 Welcome (open)
                if($orientation_guide_identificaton_url_ending == "welcome message"){
                    
                    #mysql (open)
                    if(1==1){
                        echo '
                        ';
                    }
                    #mysql (close)
                    
                    #jquery (open)
                    if(1==1){
                        echo '
                        <script>
                            jQuery(document).ready(function(){
                                
                            });
                        </script>';
                    }
                    #jquery (close)
                    
                    #content (open)
                    if(1==1){
                        
                        #function-image-processing.php (v1.0) (open)
                        if(1==1){
                            #thematic only
                                $function_propic__type = "thematic";
                                $function_propic__original_img_name = "registration.jpg";
                                $function_propic__cropping = "yes"; //yes or empty (default)
                            #all
                                $function_propic__geometry = array(300,NULL); //optional, if e.g. only width: 300, NULL; vice versa
                            include('#function-image-processing.php');
                            # $function_propic;
                            #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                        }
                        #function-image-processing.php (v1.0) (close)
                        
                        echo '
                        <img src="'.$function_propic.'" class="voluno_header_picture">
                        <div style="text-align:center;">
                            <h1>
                                Welcome to Voluno!
                            </h1>
                        </div>
                        <p style="text-size:200%;margin-top:30px;">
                            With this Orientation Guide, we want to help you get the most out of your Voluno experience.
                            <br>
                            <br>
                            <ul>
                                <li>
                                    First, we would like to take you on a
                                    <a href="'.get_permalink(794).'?subsection=1" title="Take tour now">short introduction tour</a>,
                                    to show you how to use this platform in an optimal way.
                                </li>
                                <li>
                                    Then, as you start to work with Voluno and get into different sections of this platform,
                                    we will display specific tipps and tutorials to help you explore.
                                </li>
                            </ul>
                            <br>
                            If you are not interested, you can turn this Orientation Guide off (and on again) at anytime in the
                            <a href="'.get_permalink(770).'" title="Visit &quot;My Settings&quot; Page">"My Settings"</a> Page. 
                            <br>
                            <br>
                            A collection of all tipps and tutorials is available in the
                            <a href="'.get_permalink(794).'" title="Visit Orientation Guide Section">Orientation Guide Section</a> via the top menu.
                            <table style="margin-top:10px;">
                                <tr>
                                    <td style="width:50%;">
                                        <a href="'.get_permalink(794).'?subsection=1">
                                        <div class="voluno_button" style="width:100px;margin-left:auto;margin-right:15px;">
                                            Take tour now
                                        </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="voluno_button sidebar_popup_close_button" style="width:130px;margin-left:15px;">
                                            Close this window
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </p>
                        ';
                    }
                    #content (close)
                    
                }
                #1 Welcome (open)
                
                #general image and cancel button (open)
                else{
                    
                    #function-image-processing.php (v1.0) (open)
                    if(1==1){
                        #thematic only
                            $function_propic__type = "thematic";
                            $function_propic__original_img_name = "compass_c.png";
                            $function_propic__cropping = "yes"; //yes or empty (default)
                        #all
                            $function_propic__geometry = array(200,NULL); //optional, if e.g. only width: 300, NULL; vice versa
                        include('#function-image-processing.php');
                    }
                    #function-image-processing.php (v1.0) (close)
                    
                    echo '
                    <img src="'.$function_propic.'" class="voluno_header_picture">
                    <div style="text-align:center;">
                        <h1>
                            '.$orientation_guide_identificaton_title.'
                        </h1>
                    </div>
                    <p style="text-size:200%;margin-top:30px;">';
                }
                #general image and cancel button (close)
                
                #2 my-positions (open)
                if($orientation_guide_identificaton_url_ending == "my-positions"){
                    
                    #mysql (open)
                    if(1==1){
                        echo '
                        ';
                    }
                    #mysql (close)
                    
                    #jquery (open)
                    if(1==1){
                        echo '
                        <script>
                            jQuery(document).ready(function(){
                              
                            });
                        </script>';
                    }
                    #jquery (close)
                    
                    #content (open)
                    if(1==1){
                        $orientation_page_section = "Positions";
                        include('members-net-help.php');
                    }
                    #content (close)
                    
                }
                #2 my-positions (close)
                
                #  (open)
                if(1==1){
                    
                    #mysql (open)
                    if(1==1){
                        echo '
                        ';
                    }
                    #mysql (close)
                    
                    #jquery (open)
                    if(1==1){
                        echo '
                        <script>
                            jQuery(document).ready(function(){
                              
                            });
                        </script>';
                    }
                    #jquery (close)
                    
                    #content (open)
                    if(1==1){
                        
                    }
                    #content (close)
                    
                }
                #  (close)
                
                
            #close div + background div (open)
            if(1==1){
                echo '
                    </div>
                    </div>
                </div>
                <div
                    style="
                        background-color:black;
                        position:fixed;
                        width:100%;
                        left:0px;
                        top:0px;
                        height:100%;
                        z-index:1000;
                        opacity:0.7;
                    "
                >
                </div>
                </div>';
            }
            #close div + background div (close)
            
        }
        #content (close)
        
    }
    #orientation guide (close)
    
    #update timezone offset (open)
    if($sidebar_popup_page_section == 'main'){
        
        if(get_the_id() == 576){ //if this is homepage
            
            echo '
            <div class="sidebar_popup_update_timezone"></div>
            <script>
                jQuery(document).ready(function(){
                    
                    var sidebar_popup_update_timezone = new Date()
                    var sidebar_popup_update_timezone = (sidebar_popup_update_timezone.getTimezoneOffset() / 60 * -1);
                    
                    jQuery(".sidebar_popup_update_timezone").load("'.get_permalink(576).
                    '?update_timezone="+sidebar_popup_update_timezone+" .sidebar_popup_update_timezone_import", function() {
                    });
                    
                });
            </script>';
        }
        
    }
    #update timezone offset (close)
    
    #update timezone (open)
    if($sidebar_popup_page_section == "update timezone"){
        
        echo '
        <div class="sidebar_popup_update_timezone_import"></div>';
        
        #database query update (open)
        if(1==1){
            
            $GLOBALS['wpdb']->update( 
                'fi4l3fg_voluno_users_extended',
                array( //updated content
                    'usersext_timezone_offset' => $_GET['update_timezone'],
                ),
                array( //location of updated content
                    'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                ),
                array( //format of updated content
                    '%s'
                ),
                array( //format of location of updated content
                    '%s'
                )
            );
            
        }
        #database query update (close)
        
    }
    #update timezone (close)
    
}
#logged in users (close)

#function-background.php (v1.0) (open)
if(1==1){
    
    #documentation (open)
    if(1==1){
        
        // Adds background images which use jQuery to adapt to the screen size.
        
    }
    #documentation (close)
    
    include('#function-background.php');
    
    #output (open)
    if(1==1){
        
        echo $function_background['content']; // Echo this anywhere.
        
    }
    #output (close)
    
}
#function-background.php (v1.0) (close) 

#update footer (open)
if(1==1){
    
    #jQuery (open)
    if(1==1){
        
        echo '
        <script>
            jQuery(document).ready(function(){
                jQuery("#site-copyright").html("© 2014-'.date("Y").' Voluno e.V. Germany | '.
                '<a href=\"'.get_permalink(882).'\">Legal notice</a> | <a href=\"'.get_permalink(638).'\">Contact Us</a>");
            });
        </script>';
        
    }
    #jQuery (close)

}
#update footer (close)

?>