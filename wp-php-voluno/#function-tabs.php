<?php

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-tabs.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Text which explains what the function does and how it works. Specifics are written into comments inside the function's code.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_tabs['tab_set_id'] = 1;// 'Option 1','Option 2' (default). Explanation of the input variable.
				$function_tabs['active_tab'] = 'My reviews';
				
				$function_tabs['internal']['tabs_array'][] = [
					'link' => get_permalink(686).'?user_id='.$user_id_of_user_of_this_office,
					'display' => "User Profile",
					'title' => "View user profile"
				];
				
			}
			#input (close)
			
			include('#function-tabs.php');
			
			#output (open)
			if(1==1){
				
				#echo $function_tabs['tabs']; //Outputted tab menu.
				
			}
			#output (close)
			
		}
		#function-tabs.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.01.01, Steve
		## Last format and structure check: 2000.01.01, Steve
		## Last update of all instances this function is used: 2000.01.01, Steve
		
		# Here, add a short summary of what the function does.
		# This shouldn't be more than max. 10 lines.
		
		// Full documentation of this file with references to actual code (documentation number) which is then written behind
		// specific lines of code, above them or being the if(1==1){ code. For example ///1
		// These references should include three dashes and then an ascending integer. ///2
		// To find the next documentation number, see wiki article of the php file.
		// Note: Of course, not everything needs to be written in here, only the big picture. Small
		// or obvious things can be written into the code itself.
		
	}
	##file info (close)
	
}
#documentation (close)

#input + var definitions (open)
if(1==1){ ///1
	
	$function_tabs['internal'] = $function_tabs;
	
}
#input + var definitions (close)

//    $GLOBALS['voluno_variables']['#function-tabs.php']['xxx'] = 1;
//    voluno_function_example_xxx
//    $function_tabs['internal']['xxx']

#select data (open)
if(1==1){
    
    #my office (open)
    if($function_tabs['tab_set_id'] == 1){
        
        $function_tabs['internal']['theme']  = 1;
		
		//set in function
        
    }
    #my office (close)
    
    #work center (open)
    if(1==1){
        
        #work center - ngo (open)
        if($function_tabs['tab_set_id'] == 2){
            
            $function_tabs['internal']['theme'] = 2;
            
            $function_tabs['internal']['tabs_array'] = array(
                array('display' => "Items Overview",	'title' => "View overview of all items"),
                array('display' => "Current Items",	    'title' => "View all current items"),
                array('display' => "New Item",          'title' => "Create or find new items"),
                array('display' => "Past Items",        'title' => "View cancelled or completed items")
            );
            
        }
        #work center - ngo (close)
        
        #work center - volunteer (open)
        if($function_tabs['tab_set_id'] == 3){
            
            $function_tabs['internal']['theme'] = 2; #1 = on top of page, 2 = inside page
            
            $function_tabs['internal']['tabs_array'] = array(
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
    if($function_tabs['tab_set_id'] == 4){
        
        $function_tabs['internal']['theme'] = 2; #1 = on top of page, 2 = inside page
        
        $function_tabs['internal']['tabs_array'] = array(
            array('display' => "Unsubmitted Ratings",         'title' => "View all ratings that you have given"),
            array('display' => "Submitted Ratings",           'title' => "View all ratings that you haven't given yet")
        );
        
    }
    #ratings (close)
    
    #ngo profiles (open)
    if($function_tabs['tab_set_id'] == 5){
        
        $function_tabs['internal']['theme'] = 1; #1 = on top of page, 2 = inside page
        
        $function_tabs['internal']['tabs_array'] = array(
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
    if($function_tabs['internal']['theme'] == 1){
        
        #jquery (open)
        if(1==1){
            
            $function_tabs['output']['tabs'] .= '
            <script>
				
                jQuery(document).ready(function(){
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected").hover(function(){
						jQuery(this).css("background-color","#B30000");
					},function(){
						jQuery(this).css("background-color","#8B0000");
					});
					
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left").hover(function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div").css("background-color","#B30000");
					},function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div").css("background-color","#8B0000");
					});
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div").hover(function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div"
						).css("background-color","#B30000");
					},function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div"
						).css("background-color","#8B0000");
					});
					
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right").hover(function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div").css("background-color","#B30000");
					},function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div").css("background-color","#8B0000");
					});
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div").hover(function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div"
						).css("background-color","#B30000");
					},function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div"
						).css("background-color","#8B0000");
					});
					
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_selected_div").hover(function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_selected,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
						).css("background-color","#FFC977");
					},function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_selected,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
						).css("background-color","#FFF");
					});
					
                });
            </script>';
            
        }
        #jquery (close)
        
        #style (open)
        if(1==1){
            
            $function_tabs['output']['tabs'] .= '
            <style>
				
                .function_pers_pages'.$function_tabs['tab_set_id'].'_default{
					font-weight: bold;
					text-align: center;
					border-radius:14px 14px 0px 0px;
					width:'.(100/count($function_tabs['internal']['tabs_array'])).'%;"
                }
                .function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected{
					background-color: #8B0000;
                }
                .function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected a{
					color: white;
                }
                .function_pers_pages'.$function_tabs['tab_set_id'].'_selected{
					background-color: white;
                }
                
                .function_pers_pages'.$function_tabs['tab_set_id'].'_selected a{
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
                $function_tabs['output']['tabs'] .= '
				<div
					class="voluno_function_assistant_content"
					style="display:none;height:51px;"
				>
				</div>';
				
				$function_tabs['output']['tabs'] .= '
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
                for($aay=0;$aay<=count($function_tabs['internal']['tabs_array']);$aay++){
					
					#
                    if(sanitize_title($function_tabs['internal']['tabs_array'][$aay-1]['display']) == sanitize_title($function_tabs['internal']['active_tab'])){
                        
						$function_tabs['output']['active_tabs'] = $aay;
						
                    }
					#
					
                }
                #active page (close)
                
                #loop (open)
                for($aay=0;$aay<count($function_tabs['internal']['tabs_array']);$aay++){
                    
                    #
                    if($aay == $function_tabs['output']['active_tabs']-1){
						
                        $function_per_pages_class = 'function_pers_pages'.$function_tabs['tab_set_id'].'_selected';
						
                    }else{
						
                        $function_per_pages_class = 'function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected';
						
						#
                        if($aay == $function_tabs['output']['active_tabs']-2){
							
							$function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left';
							
                        }elseif($aay == $function_tabs['internal']['active_tab']){
							
							$function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right';
							
                        }
						#
						
                    }
                    #
                    
                    $function_tabs['output']['tabs'] .= '
                    <td
                        class="function_pers_pages'.$function_tabs['tab_set_id'].'_default '.$function_per_pages_class.'"
                    >
                        <div
							style="width:100%;height:100%;vertical-align:center;text-align:center;"
							class="'.$function_per_pages_class.'_div"
                        >
							<a href="';
								
								#link (open)
								if(is_int($function_tabs['internal']['tabs_array'][$aay]['link'])){
									
									$function_tabs['output']['tabs'] .= get_permalink($function_tabs['internal']['tabs_array'][$aay]['link']);
									
								}else{
									
									$function_tabs['output']['tabs'] .= $function_tabs['internal']['tabs_array'][$aay]['link'];
									
								}
								#link (close)
								
								$function_tabs['output']['tabs'] .= '">
								<div title="'.$function_tabs['internal']['tabs_array'][$aay]['title'].'">
									'.$function_tabs['internal']['tabs_array'][$aay]['display'].'
								</div>
							</a>
                        </div>';
                        
                        #
                        if(($aay == $function_tabs['output']['active_tabs']-1) AND $aay>0){
                            
                            $function_tabs['output']['tabs'] .= '
                            <div
                                class="function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div"
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
                                class="function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
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
                        elseif($aay == $function_tabs['internal']['active_tab']){
                            
                            $function_tabs['output']['tabs'] .= '
                            <div
                                class="function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div"
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
                                class="function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
                                style="
                                margin-top:-8px;
                                margin-left:-2px;
                                position:absolute;
                                height: 14px;
                                width:14px;
                                background-color:#FFF;
                                z-index:10;
                                "
                            >
                            </div>';
                            
                        }
                        #
                        
                    $function_tabs['output']['tabs'] .= '
                    </td>';
                    
                }
                #loop (close)
                
            #table part II/II (open)
            if(1==1){
                    $function_tabs['output']['tabs'] .= '
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
    if($function_tabs['internal']['theme'] == 2){
        
        #save and get section (open)
        if(1==1){
			
			#update (open)
			if(!empty($_POST['function_pers_pages'.$function_tabs['tab_set_id'].'_section'])){
				
				#database query delete (open)
				if(1==1){
				$GLOBALS['wpdb']->delete(
						'fi4l3fg_voluno_personal_settings',
					array( //location of row to delete
						'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
						'pers_settings_general' => "function personal pages",
						'pers_settings_specific' => $function_tabs['tab_set_id']
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
						'pers_settings_specific' => $function_tabs['tab_set_id'],
						'pers_settings_value' => intval($_POST['function_pers_pages'.$function_tabs['tab_set_id'].'_section'])
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
				$function_tabs['output']['tab_determination']['query']= $GLOBALS['wpdb']->prepare('SELECT *
										FROM fi4l3fg_voluno_personal_settings
										WHERE pers_settings_user_id = %s
											AND pers_settings_general = "function personal pages"
											AND pers_settings_specific = %d;'
										,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id
										,$function_tabs['tab_set_id']);
				$function_tabs['output']['tab_determination']['row'] = $GLOBALS['wpdb']->get_row($function_tabs['output']['tab_determination']['query']);
				
				if(empty($function_tabs['output']['tab_determination']['row']->pers_settings_value)){
				$function_tabs['output']['active_tabs'] = 1;
				}else{
				$function_tabs['output']['active_tabs'] = $function_tabs['output']['tab_determination']['row']->pers_settings_value;
				}
				
			}
			#get (close)
			
        }
        #save and get section (close)
        
        #jquery (open)
        if(1==1){
			
			$function_tabs['output']['tabs'] = '
			<script>
				jQuery(document).ready(function(){
				
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected").hover(function(){
						jQuery(this).css("background-color","#B30000");
					},function(){
						jQuery(this).css("background-color","#8B0000");
					});
					
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left").hover(function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div").css("background-color","#B30000");
					},function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div").css("background-color","#8B0000");
					});
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div").hover(function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div"
						).css("background-color","#B30000");
					},function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div"
						).css("background-color","#8B0000");
					});
					
					
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right").hover(function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div").css("background-color","#B30000");
					},function(){
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div").css("background-color","#8B0000");
					});
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div").hover(function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div"
						).css("background-color","#B30000");
					},function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div"
						).css("background-color","#8B0000");
					});
					
					
					
					jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_selected_div").hover(function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_selected,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
						).css("background-color","#FFC977");
					},function(){
						jQuery(
							".function_pers_pages'.$function_tabs['tab_set_id'].'_selected,
							.function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
						).css("background-color","#FFF");
					});';
					
					#execute form via links (open)
					if(1==1){
						
						$function_tabs['output']['tabs'] .= '
						jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_link").click(function(){
							
							var function_pers_pages'.$function_tabs['tab_set_id'].'_section
							= jQuery(this).parent().find(".function_pers_pages'.$function_tabs['tab_set_id'].'_section_num").html();
							jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_section").val(function_pers_pages'.$function_tabs['tab_set_id'].'_section);
							jQuery(".function_pers_pages'.$function_tabs['tab_set_id'].'_form").submit();
							
						});';
						
					}
					#execute form via links (close)
				
				$function_tabs['output']['tabs'] .= '
				});
			</script>';
			
        }
        #jquery (close)
        
        #style (open)
        if(1==1){
			
			$function_tabs['output']['tabs'] .= '
			<style>
				.function_pers_pages'.$function_tabs['tab_set_id'].'_default{
					font-weight: bold;
					text-align: center;
					border-radius:14px 14px 0px 0px;
					width:'.(100/count($function_tabs['internal']['tabs_array'])).'%;
					cursor:pointer;
				}
				.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected{
					background-color: #8B0000;
				}
				.function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected{
					color: white;
				}
				.function_pers_pages'.$function_tabs['tab_set_id'].'_selected{
					background-color: white;
				}
				
				.function_pers_pages'.$function_tabs['tab_set_id'].'_selected{
					color: #8B0000;
				}
			</style>';
			
        }
        #style (close)
        
        #table (open)
        if(1==1){
			
			$function_tabs['output']['tabs'] .= '
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
				
				$function_tabs['output']['tabs'] .= '
				<form method="post" action="'.add_query_arg(NULL,NULL).'" class="function_pers_pages'.$function_tabs['tab_set_id'].'_form">
					<input
						type="hidden"
						class="function_pers_pages'.$function_tabs['tab_set_id'].'_section"
						name="function_pers_pages'.$function_tabs['tab_set_id'].'_section"
					>
					<table style="width: 980px;margin-left: -30px;margin-top:-28px;position:absolute;">
						<tr>';
				
			}
			#table part I/II (close)
				
				#loop (open)
				for($aay=0;$aay<count($function_tabs['internal']['tabs_array']);$aay++) {
					
				if($aay == $function_tabs['output']['active_tabs']-1) {
					$function_per_pages_class = 'function_pers_pages'.$function_tabs['tab_set_id'].'_selected';
				}else{
					$function_per_pages_class = 'function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected';
					if($aay == $function_tabs['output']['active_tabs']-2){
					$function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left';
					}elseif($aay == $function_tabs['internal']['active_tab']){
					$function_per_pages_class = $function_per_pages_class.' function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right';
					}
				}
				$function_tabs['output']['tabs'] .= '
				<td
					class="function_pers_pages'.$function_tabs['tab_set_id'].'_default '.$function_per_pages_class.'"
				>
					<div
					style="width:100%;height:100%;vertical-align:center;text-align:center;"
					class="'.$function_per_pages_class.'_div"
					>
					<div
						class="function_pers_pages'.$function_tabs['tab_set_id'].'_link"
						title="'.$function_tabs['internal']['tabs_array'][$aay]['title'].'"
					>
						'.$function_tabs['internal']['tabs_array'][$aay]['display'].'
					</div>
					<span style="display:none;" class="function_pers_pages'.$function_tabs['tab_set_id'].'_section_num">
						'.($aay+1).'
					</span>
					</div>';
					if(($aay == $function_tabs['output']['active_tabs']-1) AND $aay>0){
					$function_tabs['output']['tabs'] .= '
					<div
						class="function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_left_div"
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
						class="function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
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
					}elseif($aay == $function_tabs['internal']['active_tab']){
						
					$function_tabs['output']['tabs'] .= '
					<div
						class="function_pers_pages'.$function_tabs['tab_set_id'].'_not_selected_right_div"
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
						class="function_pers_pages'.$function_tabs['tab_set_id'].'_selected_corner"
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
				$function_tabs['output']['tabs'] .= '
				</td>';
				}
				#loop (close)
				
			#table part II/II (open)
			if(1==1){
				
						$function_tabs['output']['tabs'] .= '
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

#output (open)
if(1==1){
	
	$function_tabs = $function_tabs['output'];
	
}
#output (close)

?>