<?php

#documentation (open)
if(0!=0){
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.12.29, Steve
		## Last format and structure check: 2000.12.29, Steve
		## Last update of all instances this function is used: 2000.12.29, Steve
		
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

#function-my-office-arm.php (v1.0) (open)
if(1==1){
    
    #documentation (open)
    if(1==1){
        
        // My Office (the area in which the user can view his or her own pages: messages, settings, profile, etc) requires a complex user's rights management,
        // since there are several pages and different roles and elements. To make it easier to keep everything up to date, this function was created.
        // Redirects if no access is granted.
        
    }
    #documentation (close)
    
    #input (open)
    if(1==1){
        
        $function_myOfficeArm['user'] = $_GET['user_id']; //pure id of user who's pages will be displayed. Default: current user. The observer is always the current user.
        //current page id is used to determine which menu item it is.
        
    }
    #input (close)
    
    include('#function-my-office-arm.php');
    
    #output (open)
    if(1==1){
        
        # echo $function_myOfficeArm['tab_menu']; // Tab menu.
        
        # $function_myOfficeArm['owner_user_id'] //id of the owner of the user profile
        # $function_myOfficeArm['owner_user_displayName'] //display name of owner of the user profile
        
        # var_dump($function_myOfficeArm['role_array']); // array of user roles
        # roles:
        # - 'owner' (the current user is the one the pages belong to)
        # - 'agent' (the current user is the agent of the owner)
        # - 'blocked' (the current user is a blocked contact of the owner)
        # - 'web_developer_or_human_resources_officer' (the current user can see everything)
        # - 'visitor' (the current user has no relationship to the current user but also has no special rights)
        
        # $function_myOfficeArm['error']['owner_doesnt_exist'];
        # $function_myOfficeArm['owner_user_status'];
        
    }
    #output (close)
    
}
#function-my-office-arm.php (v1.0) (close)

#mysql (open)
if(1==1){
    
    #update (open)
    if(1==1){
        
        #unblock contact (open)
        if(!empty($_POST['blocked_contact_id'])){
            
            $GLOBALS['wpdb']->update( 
                            'fi4l3fg_voluno_personal_settings',
                    array( //updated content
                            'pers_settings_content_varchar1000' => "",
                            'pers_settings_specific' => "active",
                            'pers_settings_date_modified' => date("Y-m-d H:i:s")
                    ),
                    array( //location of updated content
                            'pers_settings_general' => "contact",
                            'pers_settings_specific' => "blocked",
                            'pers_settings_content_varchar1000' => "user got blocked by current user",
                            
                            'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                            'pers_settings_value' => intval($_POST['blocked_contact_id'])
                    ),
                    array( //format of updated content
                            '%s','%s','%s'
                    ),
                    array( //format of location of updated content
                            '%s','%s','%s',
                            '%d','%d'
                        ));
            
            $GLOBALS['wpdb']->update( 
                            'fi4l3fg_voluno_personal_settings',
                    array( //updated content
                            'pers_settings_content_varchar1000' => "",
                            'pers_settings_specific' => "active",
                            'pers_settings_date_modified' => date("Y-m-d H:i:s")
                    ),
                    array( //location of updated content
                            'pers_settings_general' => "contact",
                            'pers_settings_specific' => "blocked",
                            'pers_settings_content_varchar1000' => "user blocked current user",
                            
                            'pers_settings_user_id' => intval($_POST['blocked_contact_id']),
                            'pers_settings_value' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                    ),
                    array( //format of updated content
                            '%s','%s','%s'
                    ),
                    array( //format of location of updated content
                            '%s','%s','%s',
                            '%d','%d'
                        ));
        }
        #unblock contact (close)
        
        #block contact (open)
        if(!empty($_POST['not_yet_blocked_contact_id'])){
            
            $GLOBALS['wpdb']->update( 
                            'fi4l3fg_voluno_personal_settings',
                    array( //updated content
                            'pers_settings_content_varchar1000' => "user got blocked by current user",
                            'pers_settings_specific' => "blocked",
                            'pers_settings_date_modified' => date("Y-m-d H:i:s")
                    ),
                    array( //location of updated content
                            'pers_settings_general' => "contact",
                            'pers_settings_specific' => "active",
                            'pers_settings_user_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                            'pers_settings_value' => intval($_POST['not_yet_blocked_contact_id'])
                    ),
                    array( //format of updated content
                            '%s','%s','%s'
                    ),
                    array( //format of location of updated content
                            '%s','%s','%d','%d'
                        ));
            
            $GLOBALS['wpdb']->update( 
                            'fi4l3fg_voluno_personal_settings',
                    array( //updated content
                            'pers_settings_content_varchar1000' => "user blocked current user",
                            'pers_settings_specific' => "blocked",
                            'pers_settings_date_modified' => date("Y-m-d H:i:s")
                    ),
                    array( //location of updated content
                            'pers_settings_general' => "contact",
                            'pers_settings_specific' => "active",
                            'pers_settings_user_id' => intval($_POST['not_yet_blocked_contact_id']),
                            'pers_settings_value' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                    ),
                    array( //format of updated content
                            '%s','%s','%s'
                    ),
                    array( //format of location of updated content
                            '%s','%s','%d','%d'
                        ));
        }
        #block contact (close)
        
        #remove contact (open)
        if(!empty($_POST['not_yet_removed_contact_id'])){
            
            #function-contact-add-remove.php (v1.0) (open)
            if(1==1){
                $function_contact_add_remove['active_user'] = $GLOBALS['voluno_variables']['current_user_extended']->usersext_id;
                $function_contact_add_remove['passive_user'] = intval($_POST['not_yet_removed_contact_id']); //only one allowed.
                $function_contact_add_remove['action'] = "remove"; //'add' or 'remove'
                #$function_contact_add_remove['type'] = "message"; //optional: message, else empty (looks up user settings regarding messages)
                include('#function-contact-add-remove.php');
            }
            #function-contact-add-remove.php (v1.0) (close)
            
        }
        #remove contact (close)
        
    }
    #update (close)
    
    #get data (open)
    if(1==1){
        
        $my_contacts_query = $GLOBALS['wpdb']->prepare(
			'SELECT *
			FROM fi4l3fg_voluno_users_extended
			ORDER BY usersext_displayName;'
		);
        $my_contacts_results = $GLOBALS['wpdb']->get_results($my_contacts_query);
        
        #function-user-relationships-and-status.php (v1.0) (open)
        if(1==1){
            
            #documentation (open)
            if(1==1){
                
                // Provides arrays of user ids which are sorted according to their user status and their relationship to the current user (if provided).
                
            }
            #documentation (close)
            
            #input (open)
            if(1==1){
				
                #$function_userRelSta['array'] = [1,2,3]; // Optional. Default is an array of all users.
                $function_userRelSta['user'] = ['user_id' => $function_myOfficeArm['owner_user_id'], 'include_user_in_output' => 'no'];
                // user_id: Optional. User id or 'current_user'. include_user_in_output
                // include_user_in_output: If user_id is given, then 'yes' or 'no' (default). Includes the selected user id in the output arrays
                #$function_userRelSta['add_users_extended_arrays'] = 'no'; //'yes','no' (default).
                
            }
            #input (close)
            
            include('#function-user-relationships-and-status.php');
            
            #output (open)
            if(1==1){
                
                # $function_userRelSta['all'] //all users registered at Voluno.
                #
                # $function_userRelSta['active'] //users which have the status "active".
                # $function_userRelSta['inactive'] //users which do not have the status "active": "draft", "paused", "locked" or "deleted"
                #     $function_userRelSta['draft']
                #     $function_userRelSta['paused']
                #     $function_userRelSta['locked']
                #     $function_userRelSta['deleted']
                #
                # $function_userRelSta['contacts'] // All not blocked contacts
                # $function_userRelSta['blocked'] // All blocked contacts
                #     not yet programmed: $function_userRelSta['blocked_by_this_user']
                #     not yet programmed: $function_userRelSta['blocked_by_other_user']
                #
                # Example:
                #   all active, not blocked users:
                #   -> array_diff($function_userRelSta['active'],$function_userRelSta['blocked'])
                #
                # If activated, for each of the above arrays ($function_userRelSta[...]), there is also one array of the form
                #    $function_userRelSta['users_extended'][...]
                # which includes the pure results from users_extended. For example:
                #    $function_userRelSta['users_extended']['active'][0]->usersext_id
                
            }
            #output (close)
            
        }
        #function-user-relationships-and-status.php (v1.0) (close)
        
        $my_contacts_results = $function_userRelSta['active'];
        
        $my_contacts_not_blocked_results = array_intersect($function_userRelSta['contacts'],$function_userRelSta['active']);
        
        $my_contacts_blocked_results = array_intersect($function_userRelSta['blocked'],$function_userRelSta['active']);
        
    }
    #get data (close)
    
}
#mysql (close)

#jQuery (open)
if(1==1){
	
    echo '
    <script>
        jQuery(document).ready(function(){';
            
            #hover active contacts (open)
            if(1==1){
                echo '
                jQuery(".contact_td").hover(function(){
                    jQuery(this).find(".contact_div").css("background-color","#FFC977");
                    jQuery(this).find(".popup_on_side").show();
                },function(){
                    jQuery(this).find(".contact_div").css("background-color","");
                    jQuery(this).find(".popup_on_side").hide();
                });';
            }
            #hover active contacts (close)
            
            #hover blocked contacts (open)
            if(1==1){
                echo '
                jQuery(".contact_div_blocked").hover(function(){
                    jQuery(this).css("background-color","#BBBBBB");
                },function(){
                    jQuery(this).css("background-color","");
                });';
            }
            #hover blocked contacts (close)
            
            #unblock contact (open)
            if(1==1){
                echo '
                jQuery(".unblock_contact_button").click(function(){
                    var contactName = jQuery(this).find(".contact_name").html()+"?";
                    var sureYouWantToUnblock = confirm("Are you sure that you want to unblock "+contactName);
                    if(sureYouWantToUnblock == true){
                        jQuery(".loading_page_image").show();
                        jQuery(".blocked_contact_id").val(jQuery(this).find(".contact_id").html());
                        jQuery(".unblock_contact").submit();
                    }
                });';
            }
            #unblock contact (close)
            
            #block contact (open)
            if(1==1){
                echo '
                jQuery(".block_contact_button").click(function(){
                    var contactName = jQuery(this).parent().parent().find(".contact_name").html()+"?";
                    var sureYouWantToBlock = confirm("Are you sure that you want to block "+contactName);
                    if(sureYouWantToBlock == true){
                        jQuery(".loading_page_image").show();
                        jQuery(".not_yet_blocked_contact_id").val(jQuery(this).find(".contact_id").html());
                        jQuery(".block_contact").submit();
                    }
                });';
            }
            #block contact (close)
            
            #remove contact (open)
            if(1==1){
                echo '
                jQuery(".remove_contact_button").click(function(){
                    var contactName = jQuery(this).parent().parent().find(".contact_name").html()+" from your contacts?";
                    var sureYouWantToRemove = confirm("Are you sure that you want to remove "+contactName);
                    if(sureYouWantToRemove == true){
                        jQuery(".loading_page_image").show();
                        jQuery(".not_yet_removed_contact_id").val(jQuery(this).find(".contact_id").html());
                        jQuery(".remove_contact").submit();
                    }
                });';
            }
            #remove contact (close)
            
        echo '
        });
    </script>';
}
#jQuery (close)

#style (open)
if(1==1){
	
    echo '
    <style>
		
        .blocked_contact{
            opacity:0.4;
            filter:grayscale(1);
            -webkit-filter:grayscale(1);
            filter:gray;
        }
		
        .popup_on_side{
            display:none;
            border-radius:20px;
            padding:10px;
            background-color:#FFC977;
            position:absolute;
            margin-left:170px;
        }
		
    </style>';
	
}
#style (close)

#visible content (open)
if(1==1){
    
    #pers pages + img + title (open)
    if(1==1){
        
        #preparation (open)
        if(1==1){
            
            #function-image-processing (open)
            if(1==1){
                #thematic only
                    $function_propic__type = "thematic";
                    $function_propic__original_img_name = "contacts.jpg";
                #all
                    $function_propic__geometry = array(300,300); //optional, if e.g. only width: 300, NULL; vice versa
                include('#function-image-processing.php');
                # $function_propic;
                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
            }
            #function-image-processing (close)
            
			#is user owner? (open)
			if(in_array('owner',$function_myOfficeArm['role_array'])){
				//yes
				
				$contacts_title = 'My Contacts';
				
				$contacts_text = '
				This contact list is intended to help you easily find and contact members which you often interact with. On default,
                anyone who sends a message to or received a message from you is added to this list, as well as anyone who adds you to his or her
                own contact list. To change these settings, edit your
                <a
					href="'.get_permalink(770).'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'"
					title="Go to my settings"
				>
                    settings'.
                '</a>.
				';
				
			}else{
				//no
				
				$contacts_title = 'Contacts of '.$function_myOfficeArm['owner_user_object']->usersext_displayName;
				
				$contacts_text = '
				This contact list is intended to help users easily find and contact members which they often interact with. On default,
                anyone who sends a message to or receives a message from '.$function_myOfficeArm['owner_user_object']->usersext_displayName.'
				is automatically added to this list, as well as anyone who adds '.$function_myOfficeArm['owner_user_object']->usersext_displayName.' to his or her
                own contact list. To change these settings, edit the
                <a
					href="'.get_permalink(770).'?user_id='.$function_myOfficeArm['owner_user_object']->usersext_ida.'"
					title="Go to the settings of '.$function_myOfficeArm['owner_user_object']->usersext_displayName.'"
				>
                    settings of '.$function_myOfficeArm['owner_user_object']->usersext_displayName.
                '</a>.
				';
				
			}
			#is user owner? (close)
			
        }
        #preparation (close)
        
        #content (open)
        if(1==1){
            
            echo
            $function_myOfficeArm['tab_menu'].'
            <img src="'.$function_propic.'" class="voluno_header_picture">
            <div style="heightk:300px;">
                <div style="text-align:center;margin:30px;">
                    <h1 style="display:inline;">
                        '.$contacts_title.'
                    </h1>
                </div>
                <p>
					'.$contacts_text.'
                </p>
            </div>';
            
        }
        #content (close)
        
    }
    #pers pages + img + title (close)
    
    #active contacts (close)
    if(1==1){
        
        #table (open)
        if(1==1){
            echo '
            <table style="width:100%;">
                <tr>';
                    $cell_counter = 0;
                    $cell_counter_total = 0;
                    
                    #loop (open)
                    for($x=0;$x<count($my_contacts_not_blocked_results);$x++){
                        
                        #preparation (open)
                        if(1==1){
							
                            #function-image-processing.php (v1.0) (open)
                            if(1==1){
                                #profile picture
                                    $function_propic__type = "profile picture";
                                    $function_propic__user_id = $my_contacts_not_blocked_results[$x];
                                #all
                                    $function_propic__geometry = array(150,150); //optional, if e.g. only width: 300, NULL; vice versa
                                include('#function-image-processing.php');
                                $profile_picture = $function_propic;
                                #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
                            }
                            #function-image-processing.php (v1.0) (close)
                            
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
									
									$function_profileLink['id'] = $my_contacts_not_blocked_results[$x]; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
									#$function_profileLink['img_div'] = 'yes'; //default: no/empty, shows picture on hover
									
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
                            
                        }
                        #preparation (close)
                        
                        #content (open)
                        if(1==1){
                            
                            #new row (open)
                            if($cell_counter == 4){
                                $cell_counter = 0;
                                echo '
                                </tr>
                                <tr>';
                            }
                            #new row (close)
                            
                            $cell_counter++;
                            $cell_counter_total++;
                            
                            #dome i think this doesn't make any sense. no idea what it's supposed to do
                            if(count($my_contacts_not_blocked_results)==$cell_counter_total){
                                $colspan_last_row = '<td></td>';
                            }
                            #dome i think this doesn't make any sense. no idea what it's supposed to do
                            
                            echo '
                            <td style="width:25%;text-align:center;padding:20px;" class="contact_td">';
                                
                                #send message (open)
                                if(1==1){
                                    echo '
                                    <div
                                        class="popup_on_side"
                                        style="margin-top:25px;"
                                    >
                                        <a
                                            href="'.get_permalink(696).
                                            '?recipient='.
                                            $my_contacts_not_blocked_results[$x]->usersext_id.'"
                                            title="Send a message to '.$my_contacts_not_blocked_results[$x]->usersext_displayName.'"
                                        >
                                            Send message
                                        </a>
                                    </div>';
                                }
                                #send message (close)
                                
                                #visit profile (open)
                                if(1==1){
                                    echo '
                                    <div
                                        class="popup_on_side"
                                        style="margin-top:65px;"
                                    >
                                        <a href="'.$function_profileLink['link'].'" title="'.$function_profileLink['link_title'].'">
                                            Visit profile
                                        </a>
                                    </div>';
                                }
                                #visit profile (close)
                                
                                #remove contact (open)
                                if(1==1){
                                    echo '
                                    <div
                                        class="popup_on_side"
                                        style="margin-top:105px;"
                                    >
                                        <a
                                            class="remove_contact_button"
                                            style="cursor:pointer;"
                                            title="Remove '.$my_contacts_not_blocked_results[$x]->usersext_displayName.' from your contacts"
                                        >
                                            Remove
                                            <div style="display:none;" class="contact_id">
                                                '.$my_contacts_not_blocked_results[$x]->usersext_id.'
                                            </div>
                                        </a>
                                    </div>';
                                }
                                #remove contact (close)
                                
                                #block (open)
                                if(1==1){
                                    echo '
                                    <div
                                        class="popup_on_side"
                                        style="margin-top:145px;"
                                    >
                                        <a
                                            class="block_contact_button"
                                            style="cursor:pointer;"
                                            title="Block '.$my_contacts_not_blocked_results[$x]->usersext_displayName.'"
                                        >
                                            Block
                                            <div style="display:none;" class="contact_id">
                                                '.$my_contacts_not_blocked_results[$x]->usersext_id.'
                                            </div>
                                        </a>
                                    </div>';
                                }
                                #block (close)
                                
                                echo '
                                <a href="'.$function_profileLink['link'].'" title="'.$function_profileLink['link_title'].'">
                                    <div style="border-radius:20px;padding:20px;" class="contact_div">
                                        <img style="border-radius:15px;" src="'.$profile_picture.'">
                                        <span style="font-weight:bold;font-size:120%;" class="contact_name">'.
                                            $my_contacts_not_blocked_results[$x]->usersext_displayName
                                        .'</span>
                                    </div>
                                </a>
                            </td>
                            '.$colspan_last_row;
                            
                        }
                        #content (close)
                        
                    }
                    #loop (close)
					
					#no contact (open)
                    if(count($my_contacts_not_blocked_results) == 0){
						
                        echo '
                        <td style="text-align:center;">
                            <p>';
								
								#is user owner? (open)
								if(in_array('owner',$function_myOfficeArm['role_array'])){
									//yes
									
									echo 'You don\'t have any contacts yet.';
									
								}else{
									//no
									
									echo $function_myOfficeArm['owner_user_object']->usersext_displayName.' doesn\'t have any contacts yet.';
									
								}
								#is user owner? (close)
								
                            echo '
							</p>
                        </td>';
						
                    }
					#no contacts (close)
                    
                echo '
                </tr>
            </table>';
        }
        #table (close)
        
        #hidden form (open)
        if(1==1){
            
            echo '
            <form action="'.get_permalink().'" method="post" name="block_contact" class="block_contact">
                <input type="hidden" name="not_yet_blocked_contact_id" class="not_yet_blocked_contact_id">
            </form>
            <form action="'.get_permalink().'" method="post" name="remove_contact" class="remove_contact">
                <input type="hidden" name="not_yet_removed_contact_id" class="not_yet_removed_contact_id">
            </form>';
            
        }
        #hidden form (close)
        
    }
    #active contacts (close)
    
    #blocked contacts (open)
    if(!empty($my_contacts_blocked_results)){
        
        #table (open)
        if(1==1){
            echo '
            <center>
                <h3>
                    Blocked contacts
                </h3>
            </center>
            <table style="width:100%;">
                <tr>';
                    $cell_counter = 0;
                    $cell_counter_total = 0;
                    for($x=0;$x<count($my_contacts_blocked_results);$x++){
                        if($cell_counter == 4){
                            $cell_counter = 0;
                            echo '
                            </tr>
                            <tr>';
                        }
                        $cell_counter++;
                        $cell_counter_total++;
                        if(count($my_contacts_blocked_results)==$cell_counter_total){
                            $colspan_last_row = '<td></td>';
                        }
                        echo '
                        <td style="width:25%;text-align:center;padding:20px;">
                            <div
                                class="unblock_contact_button"
                                style="cursor:pointer;"
                                title="Click to unblock '.$my_contacts_blocked_results[$x]->usersext_displayName.'"
                            >
                                <div
                                    style="border-radius:20px;padding:20px;margin:auto;"
                                    class="contact_div_blocked"
                                >';
                                    #function-image-processing - profile picture
                                       #profile picture
                                         $function_propic__type = "profile picture";
                                         $function_propic__user_id = $my_contacts_blocked_results[$x]->usersext_id;
                                       #all
                                         $function_propic__geometry = array(150,150);
                                       include('#function-image-processing.php');
                                    echo '
                                    <img class="blocked_contact" style="border-radius:15px;" src="'.$function_propic.'">
                                    <br>
                                    <div
                                        style="
                                            position:absolute;
                                            margin-top:-150px;
                                            margin-left:-3px;
                                            font-size:1000%;
                                            color:red;
                                            -webkit-touch-callout: none;
                                            -webkit-user-select: none;
                                            -khtml-user-select: none;
                                            -moz-user-select: none;
                                            -ms-user-select: none;
                                            user-select: none;
                                            ">
                                        &#10060;
                                    </div>
                                    <div style="font-weight:bold;font-size:120%;" class="contact_name">'.
                                        $my_contacts_blocked_results[$x]->usersext_displayName
                                    .'</div>
                                </div>
                                <div style="display:none;" class="contact_id">
                                    '.$my_contacts_blocked_results[$x]->usersext_id.'
                                </div>
                            </div>
                        </td>'.$colspan_last_row;
                    }
                echo '
                </tr>
            </table>';
        }
        #table (close)
        
        #hidden form (open)
        if(1==1){
            
            echo '
            <form action="'.get_permalink().'" method="post" name="unblock_contact" class="unblock_contact">
                <input type="hidden" name="blocked_contact_id" class="blocked_contact_id">
            </form>';
            
        }
        #hidden form (close)
    }
    #blocked contacts (close)
    
    
    echo '
    <img
        style="width:6%;top:47%;left:47%;position:fixed;display:none;z-index:1000000"
        class="loading_page_image"
        src="'.wp_upload_dir()['url'].'/pictures/loading.gif"
    >';
}
#visible content (close)

?>