<?php

#select data (open)
if(1==1){
    
    #my office (open)
    if($function_pers_pages_id == 1){
        
        $function_pers_pages_theme = 1;
		
		#user is owner (open)
		if($user_id_of_user_of_this_office == $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id']){
			echo "aaa";###
            $function_pers_pages_array[] = [
				'link' => get_permalink(814).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "Overview",
				'title' => "My office overview"
			];
            $function_pers_pages_array[] = [
				'link' => get_permalink(696).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Messages",
				'title' => "View all of your messages"
			];
            $function_pers_pages_array[] = [
				'link' => get_permalink(686).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Profile",
				'title' => "View and edit your profile"
			];
			$function_pers_pages_array[] = [
				'link' => get_permalink(748).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Contacts",
				'title' => "View all of your contacts"
			];
            $function_pers_pages_array[] = [
				'link' => get_permalink(756).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Positions",
				'title' => "View your current positions"
			];
            /*$function_pers_pages_array[] = [
				'link' => get_permalink(806).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Ratings",
				'title' => "Give us your feedback"
			];*/
            $function_pers_pages_array[] = [
				'link' => get_permalink(770).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Settings",
				'title' => "Adjust your personal settings" ];
			
		}
		#user is owner (close)
		
        #other (open)
		elseif( // If user is agent (1) or hr-person (2) or webside-developer (3)
			array_intersect(
				$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['accepted'],
				['Agent;'.$user_id_of_user_of_this_office,'Voluno Human Resources Officer', 'Voluno Web Developer']
			)
		){
            
            /*$function_pers_pages_array[] = [
				'link' => get_permalink(814).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "Overview",
				'title' => "My office overview"
			];*/
            /*$function_pers_pages_array[] = [
				'link' => get_permalink(696).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Messages",
				'title' => "View all of your messages"
			];*/
            $function_pers_pages_array[] = [
				'link' => get_permalink(686).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "User Profile",
				'title' => "View user profile"
			];
			/*$function_pers_pages_array[] = [
				'link' => get_permalink(748).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Contacts",
				'title' => "View all of your contacts"
			];*/
            $function_pers_pages_array[] = [
				'link' => get_permalink(756).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "User Positions",
				'title' => "View positions of the user"
			];
            /*$function_pers_pages_array[] = [
				'link' => get_permalink(806).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "My Ratings",
				'title' => "Give us your feedback"
			];*/
            $function_pers_pages_array[] = [
				'link' => get_permalink(770).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "User Settings",
				'title' => "Adjust the user's personal settings" ];
            $function_pers_pages_array[] = [
				'link' => get_permalink(5079).'?user_id='.$user_id_of_user_of_this_office,
				'display' => "Agent Workspace",
				'title' => "Information and options for agents"
			];
            
        }
        #other (close)
        
    }
    #my office (close)
    
    #work center (open)
    if(1==1){
        
        #work center - ngo (open)
        if($function_pers_pages_id == 2){
            
            $function_pers_pages_theme = 2;
            
            $function_pers_pages_array = array(
                array('display' => "Items Overview",	'title' => "View overview of all items"),
                array('display' => "Current Items",	    'title' => "View all current items"),
                array('display' => "New Item",          'title' => "Create or find new items"),
                array('display' => "Past Items",        'title' => "View cancelled or completed items")
            );
            
        }
        #work center - ngo (close)
        
        #work center - volunteer (open)
        if($function_pers_pages_id == 3){
            
            $function_pers_pages_theme = 2; #1 = on top of page, 2 = inside page
            
            $function_pers_pages_array = array(
                #array('display' => "Items Overview",    'title' => "View overview of all items"),
                array('display' => "Current Items",     'title' => "View all current items"),
                array('display' => "New Item",      	'title' => "Create or find new items"),
                array('display' => "Past Items",        'title' => "View cancelled or completed items")
                );
            
        }
        #work center - volunteer (close)
        
    }
    #work center (close)
    
    #ratings (open)
    if($function_pers_pages_id == 4){
        
        $function_pers_pages_theme = 2; #1 = on top of page, 2 = inside page
        
        $function_pers_pages_array = array(
            array('display' => "Unsubmitted Ratings",         'title' => "View all ratings that you have given"),
            array('display' => "Submitted Ratings",           'title' => "View all ratings that you haven't given yet")
        );
        
    }
    #ratings (close)
    
    #ngo profiles (open)
    if($function_pers_pages_id == 5){
        
        $function_pers_pages_theme = 1; #1 = on top of page, 2 = inside page
        
        $function_pers_pages_array = array(
            array(
                'link' => get_permalink(853).'?ngo='.$does_ngo_exist_row->ngo_id,
                'display' => "Profile",
                'title' => ""
            ),
            #array(
            #    'link' => get_permalink(),
            #    'display' => "Slideshow",
            #    'title' => ""
            #),
            array(
                'link' => get_permalink(4975).'?ngo='.$does_ngo_exist_row->ngo_id,
                'display' => "Forum",
                'title' => ""
            ),
            array(
                'link' => get_permalink(4976).'?ngo='.$does_ngo_exist_row->ngo_id,
                'display' => "People",
                'title' => ""
            #),
            #array(
            #    'link' => get_permalink(),
            #    'display' => "Calendar",
            #    'title' => ""
            #),
            #array(
            #    'link' => get_permalink(),
            #    'display' => "Files",
            #    'title' => ""
            #),
            #array(
            #    'link' => get_permalink(),
            #    'display' => "Tasks",
            #    'title' => ""
            #),
            #array(
            #    'link' => get_permalink().'?development_organization='.$does_ngo_exist_row->ngo_id.'&section=projects',
            #    'display' => "Projects",
            #    'title' => ""
            #),
            #array(
            #    'link' => get_permalink().'?development_organization='.$does_ngo_exist_row->ngo_id.'&section=settings',
            #    'display' => "Settings",
            #    'title' => ""
            )
        );
        
    }
    #ngo profiles (close)
    
}
#select data (close)

#themes (open)
if(1==1){
    
    #theme 1 (open)
    if($function_pers_pages_theme == 1){
        
        #jquery (open)
        if(1==1){
            
            $function_pers_pages .= '
            <script>
                jQuery(document).ready(function(){
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected").hover(function(){
                    jQuery(this).css("background-color","#B30000");
                },function(){
                    jQuery(this).css("background-color","#8B0000");
                });
                
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#8B0000");
                });
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left,.function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left,.function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#8B0000");
                });
                
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#8B0000");
                });
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right,.function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right,.function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#8B0000");
                });
                
                
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_selected_div").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_selected, .function_pers_pages'.$function_pers_pages_id.'_selected_corner").css("background-color","#FFC977");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_selected, .function_pers_pages'.$function_pers_pages_id.'_selected_corner").css("background-color","#FFF");
                });
                });
            </script>';
            
        }
        #jquery (close)
        
        #style (open)
        if(1==1){
            
            $function_pers_pages .= '
            <style>
				
                .function_pers_pages'.$function_pers_pages_id.'_default{
					font-weight: bold;
					text-align: center;
					border-radius:14px 14px 0px 0px;
					width:'.(100/count($function_pers_pages_array)).'%;"
                }
                .function_pers_pages'.$function_pers_pages_id.'_not_selected{
					background-color: #8B0000;
                }
                .function_pers_pages'.$function_pers_pages_id.'_not_selected a{
					color: white;
                }
                .function_pers_pages'.$function_pers_pages_id.'_selected{
					background-color: white;
                }
                
                .function_pers_pages'.$function_pers_pages_id.'_selected a{
					color: #8B0000;
                }
				
            </style>';
            
        }
        #style (close)
        
        #table (open)
        if(1==1){
            
            #table part I/II (open)
            if(1==1){
                
				//this ensures that there is no conflict between this function and #function-assistant.php when displaying something on top of the page
                $function_pers_pages .= '
				<div
					class="voluno_function_assistant_content"
					style="display:none;height:51px;"
				>
				</div>';
				
				$function_pers_pages .= '
                <table
					style="
						width: 980px;
						margin: -41px -30px;
						position: absolute;
					"
                >
					<tr>';
                
            }
            #table part I/II (close)
                
                #active page (open)
                for($aay=0;$aay<=count($function_pers_pages_array);$aay++){
					
					#
                    if(sanitize_title($function_pers_pages_array[$aay-1]['display']) == sanitize_title($function_pers_pages_active_page)){
                        
						$function_pers_pages_active_page = $aay;
						
                    }
					#
					
                }
                #active page (close)
                
                #loop (open)
                for($aay=0;$aay<count($function_pers_pages_array);$aay++){
                    
                    #
                    if($aay == $function_pers_pages_active_page-1){
						
                        $function_per_pages_class = 'function_pers_pages'.$function_pers_pages_id.'_selected';
						
                    }else{
						
                        $function_per_pages_class = 'function_pers_pages'.$function_pers_pages_id.'_not_selected';
						
						#
                        if($aay == $function_pers_pages_active_page-2){
							
							$function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_pers_pages_id.'_not_selected_left';
							
                        }elseif($aay == $function_pers_pages_active_page){
							
							$function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_pers_pages_id.'_not_selected_right';
							
                        }
						#
						
                    }
                    #
                    
                    $function_pers_pages .= '
                    <td
                        class="function_pers_pages'.$function_pers_pages_id.'_default '.$function_per_pages_class.'"
                    >
                        <div
							style="width:100%;height:100%;vertical-align:center;text-align:center;"
							class="'.$function_per_pages_class.'_div"
                        >
							<a href="';
								
								#link (open)
								if(is_int($function_pers_pages_array[$aay]['link'])){
									
									$function_pers_pages .= get_permalink($function_pers_pages_array[$aay]['link']);
									
								}else{
									
									$function_pers_pages .= $function_pers_pages_array[$aay]['link'];
									
								}
								#link (close)
								
								$function_pers_pages .= '">
								<div title="'.$function_pers_pages_array[$aay]['title'].'">
									'.$function_pers_pages_array[$aay]['display'].'
								</div>
							</a>
                        </div>';
                        
                        #
                        if(($aay == $function_pers_pages_active_page-1) AND $aay>0){
                            
                            $function_pers_pages .= '
                            <div
                                class="function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div"
                                style="
                                margin-top:-22px;
                                margin-left:-16px;
                                position:absolute;
                                height:28px;
                                width:14px;
                                border-radius:0px 14px 14px 0px;
                                background-color:#8B0000;
                                z-index:11;
                                "
                            ></div>
                            <div
                                class="function_pers_pages'.$function_pers_pages_id.'_selected_corner"
                                style="
                                margin-top:-8px;
                                margin-left:-16px;
                                position:absolute;
                                height: 14px;
                                width:16px;
                                background-color:#FFF;
                                z-index:10;
                                "
                            >
                            </div>';
                            
                        }
                        #
                        
                        #
                        elseif($aay == $function_pers_pages_active_page){
                            
                            $function_pers_pages .= '
                            <div
                                class="function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div"
                                style="
                                margin-top:-22px;
                                margin-left:-2px;
                                position:absolute;
                                height:28px;
                                width:14px;
                                border-radius:14px 0px 0px 14px;
                                background-color:#8B0000;
                                z-index:11;
                                "
                            >
                            </div>
                            <div
                                class="function_pers_pages'.$function_pers_pages_id.'_selected_corner"
                                style="
                                margin-top:-8px;
                                margin-left:-3px;
                                position:absolute;
                                height: 14px;
                                width:15px;
                                background-color:#FFF;
                                z-index:10;
                                "
                            >
                            </div>';
                            
                        }
                        #
                        
                    $function_pers_pages .= '
                    </td>';
                    
                }
                #loop (close)
                
            #table part II/II (open)
            if(1==1){
                    $function_pers_pages .= '
                    </tr>
                </table>
                <br>';
            }
            #table part II/II (close)
            
        }
        #table (close)
        
    }
    #theme 1 (close)
    
    #theme 2 (open)
    if($function_pers_pages_theme == 2){
        
        #save and get section (open)
        if(1==1){
        
        #update (open)
        if(!empty($_POST['function_pers_pages'.$function_pers_pages_id.'_section'])){
            
            #database query delete (open)
            if(1==1){
            $GLOBALS['wpdb']->delete(
                    'fi4l3fg_voluno_personal_settings',
                array( //location of row to delete
                    'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                    'pers_settings_general' => "function personal pages",
                    'pers_settings_specific' => $function_pers_pages_id
                ),
                array( //format of location of row to delete
                    '%s','%s','%d'
                ));
            }
            #database query delete (close)
            
            #database query insert (open)
            if(1==1){
            $GLOBALS['wpdb']->insert(
                    'fi4l3fg_voluno_personal_settings',
                array(
                    'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                    'pers_settings_general' => "function personal pages",
                    'pers_settings_specific' => $function_pers_pages_id,
                    'pers_settings_value' => intval($_POST['function_pers_pages'.$function_pers_pages_id.'_section'])
                    ),
                array(
                    '%s','%s','%d','%d'
                    ));
            }
            #database query insert (close)
            
        }
        #update (close)
        
        #get (open)
        if(1==1){
            $function_pers_pages_page_determination_query = $GLOBALS['wpdb']->prepare('SELECT *
                                    FROM fi4l3fg_voluno_personal_settings
                                    WHERE pers_settings_user_id = %s
                                        AND pers_settings_general = "function personal pages"
                                        AND pers_settings_specific = %d;'
                                    ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                                    ,$function_pers_pages_id);
            $function_pers_pages_page_determination_row = $GLOBALS['wpdb']->get_row($function_pers_pages_page_determination_query);
            
            if(empty($function_pers_pages_page_determination_row->pers_settings_value)){
            $function_pers_pages_active_page = 1;
            }else{
            $function_pers_pages_active_page = $function_pers_pages_page_determination_row->pers_settings_value;
            }
            
        }
        #get (close)
        
        }
        #save and get section (close)
        
        #jquery (open)
        if(1==1){
        $function_pers_pages = '
        <script>
            jQuery(document).ready(function(){
            
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected").hover(function(){
                    jQuery(this).css("background-color","#B30000");
                },function(){
                    jQuery(this).css("background-color","#8B0000");
                });
                
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#8B0000");
                });
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left,.function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_left,.function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div").css("background-color","#8B0000");
                });
                
                
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#8B0000");
                });
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right,.function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#B30000");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_not_selected_right,.function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div").css("background-color","#8B0000");
                });
                
                
                
                jQuery(".function_pers_pages'.$function_pers_pages_id.'_selected_div").hover(function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_selected, .function_pers_pages'.$function_pers_pages_id.'_selected_corner").css("background-color","#FFC977");
                },function(){
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_selected, .function_pers_pages'.$function_pers_pages_id.'_selected_corner").css("background-color","#FFF");
                });';
                
                #execute form via links (open)
                if(1==1){
                    
                    $function_pers_pages .= '
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_link").click(function(){
                    var function_pers_pages'.$function_pers_pages_id.'_section = jQuery(this).parent().find(".function_pers_pages'.$function_pers_pages_id.'_section_num").html();
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_section").val(function_pers_pages'.$function_pers_pages_id.'_section);
                    jQuery(".function_pers_pages'.$function_pers_pages_id.'_form").submit();
                    });';
                    
                }
                #execute form via links (close)
            
            $function_pers_pages .= '
            });
        </script>';
        }
        #jquery (close)
        
        #style (open)
        if(1==1){
        $function_pers_pages .= '
        <style>
            .function_pers_pages'.$function_pers_pages_id.'_default{
            font-weight: bold;
            text-align: center;
            border-radius:14px 14px 0px 0px;
            width:'.(100/count($function_pers_pages_array)).'%;
            cursor:pointer;
            }
            .function_pers_pages'.$function_pers_pages_id.'_not_selected{
            background-color: #8B0000;
            }
            .function_pers_pages'.$function_pers_pages_id.'_not_selected{
            color: white;
            }
            .function_pers_pages'.$function_pers_pages_id.'_selected{
            background-color: white;
            }
            
            .function_pers_pages'.$function_pers_pages_id.'_selected{
            color: #8B0000;
            }
        </style>';
        }
        #style (close)
        
        #table (open)
        if(1==1){
        
        $function_pers_pages .= '
        <div
            style="
                width: 980px;
                height:45px;
                margin-left: -30px;
                background: #ffffff;
                background: -moz-linear-gradient(top, #ffffff 0%, #000 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#000));
                background: -webkit-linear-gradient(top, #ffffff 0%,#000 100%);
                background: -o-linear-gradient(top, #ffffff 0%,#000 100%);
                background: -ms-linear-gradient(top, #ffffff 0%,#000 100%);
                background: linear-gradient(to bottom, #ffffff 0%,#000 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#ffffff", endColorstr="#000",GradientType=0 );
            "
        >&nbsp;
        </div>';
        
        #table part I/II (open)
        if(1==1){
            $function_pers_pages .= '
            <form method="post" action="'.add_query_arg(NULL,NULL).'" class="function_pers_pages'.$function_pers_pages_id.'_form">
            <input
                type="hidden"
                class="function_pers_pages'.$function_pers_pages_id.'_section"
                name="function_pers_pages'.$function_pers_pages_id.'_section"
            >
            <table style="width: 980px;margin-left: -30px;margin-top:-28px;position:absolute;">
            <tr>';
        }
        #table part I/II (close)
            
            #loop (open)
            for($aay=0;$aay<count($function_pers_pages_array);$aay++) {
            if($aay == $function_pers_pages_active_page-1) {
                $function_per_pages_class = 'function_pers_pages'.$function_pers_pages_id.'_selected';
            }else{
                $function_per_pages_class = 'function_pers_pages'.$function_pers_pages_id.'_not_selected';
                if($aay == $function_pers_pages_active_page-2){
                $function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_pers_pages_id.'_not_selected_left';
                }elseif($aay == $function_pers_pages_active_page){
                $function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_pers_pages_id.'_not_selected_right';
                }
            }
            $function_pers_pages .= '
            <td
                class="function_pers_pages'.$function_pers_pages_id.'_default '.$function_per_pages_class.'"
            >
                <div
                style="width:100%;height:100%;vertical-align:center;text-align:center;"
                class="'.$function_per_pages_class.'_div"
                >
                <div
                    class="function_pers_pages'.$function_pers_pages_id.'_link"
                    title="'.$function_pers_pages_array[$aay]['title'].'"
                >
                    '.$function_pers_pages_array[$aay]['display'].'
                </div>
                <span style="display:none;" class="function_pers_pages'.$function_pers_pages_id.'_section_num">
                    '.($aay+1).'
                </span>
                </div>';
                if(($aay == $function_pers_pages_active_page-1) AND $aay>0){
                $function_pers_pages .= '
                <div
                    class="function_pers_pages'.$function_pers_pages_id.'_not_selected_left_div"
                    style="
                    margin-top:-22px;
                    margin-left:-16px;
                    position:absolute;
                    height:28px;
                    width:14px;
                    border-radius:0px 14px 14px 0px;
                    background-color:#8B0000;
                    z-index:11;
                    "
                ></div>
                <div
                    class="function_pers_pages'.$function_pers_pages_id.'_selected_corner"
                    style="
                    margin-top:-8px;
                    margin-left:-16px;
                    position:absolute;
                    height: 14px;
                    width:16px;
                    background-color:#FFF;
                    z-index:10;
                    "
                >
                </div>';
                }elseif($aay == $function_pers_pages_active_page){
                $function_pers_pages .= '
                <div
                    class="function_pers_pages'.$function_pers_pages_id.'_not_selected_right_div"
                    style="
                    margin-top:-22px;
                    margin-left:-2px;
                    position:absolute;
                    height:28px;
                    width:14px;
                    border-radius:14px 0px 0px 14px;
                    background-color:#8B0000;
                    z-index:11;
                    "
                >
                </div>
                <div
                    class="function_pers_pages'.$function_pers_pages_id.'_selected_corner"
                    style="
                    margin-top:-8px;
                    margin-left:-3px;
                    position:absolute;
                    height: 14px;
                    width:15px;
                    background-color:#FFF;
                    z-index:10;
                    "
                >
                </div>';
                }
            $function_pers_pages .= '
            </td>';
            }
            #loop (close)
            
        #table part II/II (open)
        if(1==1){
            $function_pers_pages .= '
            </tr>
        </table>
        </form>
        <br>';
        }
        #table part II/II (close)
        
        }
        #table (close)
        
    }
    #theme 2 (close)

}
#themes (close)

unset($function_pers_pages__internal);

?>