<?php

#info (open)
if(0!=0){
    /*
    Positions (just for easier copying and using in development)
    plenary_meeting
    board
    coordinator
    
    ADMINISTRATION
    administration_coordinator
    accountant
    hr_officer
    
    IT
    it_coordinator
    website_admin
    
    OPERATIONS
    operations_coordinator
    forum_moderator
    
    PR
    pr_coordinator
    */
    
}
#info (close)

#general preparation (open)
if(1==1){
    
    
    
}
#general preparation (close)

#mysql (open)
if(1==1){
    
    #staff positions of all users (open)
    if(1==1){
	$all_staff_positions_query = $GLOBALS['wpdb']->prepare('SELECT *
						    FROM fi4l3fg_voluno_applications
							LEFT JOIN fi4l3fg_voluno_users_extended
							    ON application_user_id = usersext_id
							LEFT JOIN (
								SELECT application_user_id AS staff_check
								FROM fi4l3fg_voluno_applications
								WHERE application_type_general = "position"
								    AND application_type_id = 7
								    AND application_status = "accepted"
							    ) AS aaa_staff_member_check
							    ON application_user_id = staff_check
						    WHERE application_type_general = "staff position"
							AND staff_check != ""
							AND application_status = "accepted"
						    ORDER BY usersext_displayName;');
	$all_staff_positions_results = $GLOBALS['wpdb']->get_results($all_staff_positions_query);
	
	$all_staff_members_query = $GLOBALS['wpdb']->prepare('SELECT *
						    FROM fi4l3fg_voluno_applications
							LEFT JOIN fi4l3fg_voluno_users_extended
							ON application_user_id = usersext_id
						    WHERE application_type_general = "position"
							AND application_type_id = 7
							AND application_status = "accepted"
						    ORDER BY usersext_displayName;');
	$all_staff_members_results = $GLOBALS['wpdb']->get_results($all_staff_members_query);
    }
    #staff positions of all users (close)
    
    #current user positions (open)
    if(1==1){
		
		#function-user-positions-get.php (v1.8) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Retrieves user position and stores them in several differnt ways, any of which can be used, depending on which version is easier for the specific use.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_userpositions_get['user id'] = 'current_user'; //obligatory. If not defined, function is deactivated! However, writing 'current_user' looks up the current user id.
				#$function_userpositions_get['display all positions for developers'] = 'yes'; // 'yes', 'yes, long' or 'no' (default).
				// Shows all positions the user has. 'yes, long' prints the entire output in a nice way.
				
			}
			#input (close)
			
			include('#function-user-positions-get.php');
			
			#output (open)
			if(1==1){
				
				# The function produces three arrays:
				#
				# Method 1: unsorted list
				#   $function_userpositions_get['unsorted list'][PROPERTY] = PROPERTY VALUE
				#        position: specific position name, in some cases additional info is added, separated by ';', e.g. 'NGO Worker;4' with 4 being NGO id
				#        position_pure: specific position name without additional information
				#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
				#        status: "accepted", "pending"
				#        application_text: optional text, depending on position
				#        application_id: mysql data entry index
				#        application_date_created
				#        application_date_modified
				#
				# Method 2: sorted list
				#   $function_userpositions_get['sorted list'][SPECIFIC POSITION NAME][PROPERTY] = PROPERTY VALUE
				#        SPECIFIC POSITION NAME = name of the specific position (mind the spelling!)
				#        position_pure: specific position name without additional information
				#        type: "top", "Volunteer", "NGO Member" or "Voluno Staff Member"
				#        status: "accepted", "pending"
				#        application_text: optional text, depending on position
				#        application_id: mysql data entry index
				#        application_date_created
				#        application_date_modified
				#
				# Method 3: Simple arrays
				#    $function_userpositions_get['simple array'][STATUS][INDEX] = SPECIFIC POSITION NAME   //STATUS = pending or accepted
				#     Example usage:
				#       array_intersect($function_userpositions_get['simple array']['accepted'],[POSITION NAME 1,POSITION NAME 2]
				#
				# Method 4: Simple pure arrays
				#    $function_userpositions_get['simple_pure_array'][STATUS][INDEX] = SPECIFIC PURE POSITION NAME   //STATUS = pending or accepted
				#
				# Method 5:
				#    $function_userpositions_get[\'output\'][\'ngo_array_unsorted\'][\'all\'][] = [
				#        full -> NGO name (user position)
				#        position -> pure position
				#        status -> "accepted" or "pending"
				#        ngo_name -> NGO name
				#        ngo_id -> NGO id
				#
				# Global variables:
				#    Function get's called in the top right sidebar for the current user, so these global variables are always available.
				#        $GLOBALS['voluno_variables']['current_user_extended'] //users_extended row of current user (wpdb-object)
				#        $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id'] = USER ID;
				#       $GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['STATUS'][] = POSITION NAME
				#    Example usage:
				#        in_array(POSITION NAME,$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_pure_array']['accepted'])
				#
				# Note:
				# The function also outputs a list of "allowed positions". E.g. the user may not take up Voluno Staff positions without becoming a staff member first.
				#       $function_userpositions_get['allowed_pure_positions']
				# Additionally, it outputs an array of staff positions:
				#       $function_userpositions_get['allowed_pure_positions_voluno_staff']
				# But this functionality is only required for the function to edit existing user positions and not intended for regular use.
				
			}
			#output (close)
			
		}
		#function-user-positions-get.php (v1.8) (close)
		
    }
    #current user positions (close)
    
    #get all existing staff positions (open)
    if(1==1){
	
	$all_existing_staff_positions_query = $GLOBALS['wpdb']->prepare('SELECT *
							    FROM fi4l3fg_voluno_lists_staff_positions
							    WHERE staff_position_status != "inactive"
							    ORDER BY staff_position_type DESC;');
	$all_existing_staff_positions_results = $GLOBALS['wpdb']->get_results($all_existing_staff_positions_query);
	
	for($aei=0;$aei<count($all_existing_staff_positions_results);$aei++){
	    
	    $mysql_name = $all_existing_staff_positions_results[$aei]->staff_position_mysql;
	    
	    $all_existing_staff_positions_array[$mysql_name]['mysql'] = $all_existing_staff_positions_results[$aei]->staff_position_mysql;
	    $all_existing_staff_positions_array[$mysql_name]['display'] = $all_existing_staff_positions_results[$aei]->staff_position_display;
	    
	    if($all_existing_staff_positions_results[$aei]->staff_position_department != "democratic"){
		$all_existing_staff_positions_array[$mysql_name]['department'] = $all_existing_staff_positions_results[$aei]->staff_position_department;
		$all_existing_staff_positions_array[$mysql_name]['type'] = $all_existing_staff_positions_results[$aei]->staff_position_type;
	    }
	}
	
    }
    #get all existing staff positions (close)
    
}
#mysql (close)

#style (open)
if(1==1){
    
    echo '
    <style>
	.no_padding_spacing, .no_padding_spacing>tbody>tr{
	    margin:0px !important;
	    padding:0px !important;
	}
	.position_box{
	    border-radius:20px;
	    padding:20px important!;
	    background-color:#FFEAB9;
	    margin:0px 10px;
	}
	.position_box:hover{
	    background-color:#FFD87D;
	}
	.position_box_selected,.position_box_selected:hover{
	    background-color:#FFA461;
	}
	.arrow_trunk{
	    margin-left:50%;
	    height:100%;
	}
	.arrow_trunk_placeholder{
	    margin-left:50%;
	}
	.arrow_peak{
	    width: 0;
	    height: 0;
	    border-style: solid;
	    border-width: 23px 15px 0 15px;
	    border-color: #8b0000 transparent transparent transparent;
	    margin-left:-11px;
	}
	
	.img_rounded_border{
	    border-radius:10px;
	    border:1px solid black;
	}
    </style>';

}
#style (close)

#jquery (open)
if(1==1){
    
    echo '
    <script>
	jQuery(document).ready(function(){';
	    
	    #department trees (open)
	    if(1==1){
		echo '
		var department_tree = "";
		jQuery(".department_tree_link").click(function(){
		    if(department_tree != jQuery(this).find("span").html()){
			department_tree = jQuery(this).find("span").html();
			
			jQuery(".position_box_selected").removeClass("position_box_selected");
			jQuery(this).parent().parent().addClass("position_box_selected");
			jQuery(".department_tree").fadeOut(300);
			jQuery(".department_tree_"+department_tree).delay(299).fadeIn(300);
		    }
		});
		';
	    }
	    #department trees (close)
	    
	    #extend content divs (open)
	    if(1==1){
		echo '
		jQuery(".content_div_extend_link").click(function(){
		    
		    jQuery(".content_div_content_hidden").fadeOut(150);
		    jQuery(".content_div_content_shown").fadeIn(150);
		    
		    if(jQuery(this).parent().find(".content_div_content_hidden").is(":hidden")){
			jQuery(this).parent().find(".content_div_content_hidden").delay(150).fadeToggle(150);
			jQuery(this).parent().find(".content_div_content_shown").delay(150).fadeToggle(150);
		    }
		    
		});
		';
	    }
	    #extend content divs (close)
	    
	echo '
	});
    </script>';
    
}
#jquery (close)

#content (open)
if(1==1){
    
    #img + title + application (open)
    if(1==1){
	
	#preparation (open)
	if(1==1){
	    
	    #function-image-processing (open)
	    if(1==1){
		#thematic only
		    $function_propic__type = "thematic";
		    $function_propic__original_img_name = "organigram.jpg";
		#all
		    $function_propic__cropping = "yes"; //yes or empty (default)
		    $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
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
	    <div style="height:220px;">
		<img src="'.$function_propic.'" class="voluno_header_picture">
		<div style="text-align:center;padding:30px;">
		    <h1 style="display:inline;">
			Organigram
		    </h1>
		</div>
		Click
		<a style="cursor:pointer;">
		    here
		</a>
		if you are interested in a position.
	    </div>';
	    
	}
	#content (close)
	
    }
    #img + title + application (close)
    
    #preparation (open)
    if(1==1){
	
	#arrays (open)
	if(1==1){
	    
	    #positions_array (open)
	    if(1==1){
		
		#individual positions_array (open)
		if(1==1){
		    
		    #NOTICE: please name the content and the bulletpoint variable [name]+"_content" and [name]+"_bulletpoints_array" respectively
		    
		    #democratic (open)
		    if(1==1){
			
			#preparation (open)
			if(1==1){
			    
			    #plenary meeting (open)
			    if(1==1){
				
				#function-image-processing (open)
				if(1==1){
				    #thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "plenary_meeting.jpg";
				    #all
					$function_propic__geometry = array(NULL,125); //optional, if e.g. only width: 300, NULL; vice versa
				    include('#function-image-processing.php');
				    # $function_propic;
				    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				$plenary_meeting_content = '
				<img
				    src="'.$function_propic.'"
				    class="img_rounded_border voluno_brighter_on_hover"
				    style="float:right;margin:0px 0px 20px 20px;"
				>
				This is the highest organ in Voluno.';
				
				$plenary_meeting_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'It can decide everything, even to dissolve the organization.
						Its main purpose is to make fundamental decisions.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Also, the Board and the Management are elected here.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'The Plenary Meeting takes place on Skype every few months.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'It\'s fully democratic: All staff members of Voluno have a vote
						and may put points on the agenda.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				);
				
			    }
			    #plenary meeting (close)
			    
			    #supervisory board (open)
			    if(1==1){
				
				#function-image-processing (open)
				if(1==1){
				    #thematic only
					$function_propic__type = "thematic";
					$function_propic__original_img_name = "board.jpg";
				    #all
					$function_propic__geometry = array(NULL,125); //optional, if e.g. only width: 300, NULL; vice versa
				    include('#function-image-processing.php');
				    # $function_propic;
				    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
				}
				#function-image-processing (close)
				
				$board_content = '
				<img
				    src="'.$function_propic.'"
				    class="img_rounded_border voluno_brighter_on_hover"
				    style="float:right;margin:0px 0px 20px 20px;"
				>
				<p>
				    The Board is the extended arm of the Plenary Meeting.
				</p>';
				    
				$board_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'It serves the purpose of supervising the Management.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'The Board may call a Plenary Meeting, veto Management decisions and even remove Management members, if required.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Also, the Board and the Management are elected here.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'The function of the Board requires an active involvement in the organization.
						Thus, only members with fixed positions
						(Coordinators and Extended Volunteers) may stand for election.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'The Board should meet at least once every two month.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #supervisory board (close)
			    
			    #Coordinator (open)
			    if(1==1){
				
				$coordinator_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'The Coordinator is tasked with making all important stategic decisions within Voluno.
						<br>
						However, whenever possible, this should happen in consensus and in dialogue with
						all interested parties within Voluno.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Specifically, this includes financial decisions, staff decisions and strategic decisions.
						In theory, all of these decisions should be made in consensus and dialogue during plenary meetings
						and only be implemented by the Coordinator.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'The Coordinator is (re-)elected during each plenary meetings.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'At each plenary meeting, the incumbent Coordinator has to justify him- or herself to all
						Voluno staff members. This includes all past decisions, future plans, expenditures, staff
						decisions, as well as all other decisions he or she made during the tenure.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'In between plenary meetings, the Coordinator has to justify him- or herself to Supervisory Board
						members.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #Coordinator (close)
			    
			}
			#preparation (close)
			
			#array (open)
			if(1==1){
			    
			    $positions_array[] = 'plenary_meeting';
			    $positions_array[] = 'board';
			    $positions_array[] = 'coordinator';
			}
			#array (close)
			
		    }
		    #democratic (close)
		    
		    #administration (open)
		    if(1==1){
			
			#preparation (open)
			if(1==1){
			    
			    #Administration Coordinator (open)
			    if(1==1){
				
				$administration_coordinator_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Like the coordinator, but more in depth and confined to this department.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Specifically: accounting, official registration, legal issues and human resources.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #Administration Coordinator (close)
			    
			    #Accountant (open)
			    if(1==1){
				
				$accountant_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Bookkeeping of Voluno finances.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'Has special menu to update our
						<a href="'.get_permalink(463).'" title="Have a look at Voluno\'s finances">
						    transparent finances'.
						'</a>.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #Accountant (close)
			    
			}
			#preparation (close)
			
			#array (open)
			if(1==1){
			    
			    $positions_array[] = 'administration_coordinator';
			    $positions_array[] = 'accountant';
			    
			}
			#array (close)
			
		    }
		    #administration (close)
		    
		    #it (open)
		    if(1==1){
			
			#preparation (open)
			if(1==1){
			    
			    #IT Coordinator (open)
			    if(1==1){
				
				$it_coordinator_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Like the coordinator, but more in depth and confined to this department.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Specifically, all technical aspects of: development and maintenance of the website,
						social media accounts, other accounts, as well as all other issues regarding
						software and hardware'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #IT Coordinator (close)
			    
			    #Website Administrator (open)
			    if(1==1){
				
				$website_admin_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Development and maintenance of the website (technical).'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'Has special menus all over the website to view and edit system components.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'Gets server and database login information and is set to Wordpress admin.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #Website Administrator (close)
			    
			}
			#preparation (close)
			
			#array (open)
			if(1==1){
			    
			    $positions_array[] = 'it_coordinator';
			    $positions_array[] = 'website_admin';
			    
			}
			#array (close)
			
		    }
		    #it (close)
		    
		    #operations (open)
		    if(1==1){
			
			#preparation (open)
			if(1==1){
			    
			    #Operations Coordinator (open)
			    if(1==1){
				
				$operations_coordinator_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Like the coordinator, but more in depth and confined to this department.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Everything related to the actual core work of Voluno: supporting development organizations.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Specifically: making sure that our services are properly provided, as well as evaluating
						and improving them and exploring new ways to support development organizations and everyone
						in our network.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #Operations Coordinator (close)
			    
			    #Forum Moderator (open)
			    if(1==1){
				
				$forum_moderator_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Enforce the Voluno Forum Cummunity Rules.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Respond and take appropriate measures when a post or discussion is reported for rule violations.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'Has
						<a href="'.get_permalink(824).'?section=forum_moderator">'.
						    'own workspace'.
						'</a>.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #Forum Moderator (close)
			    
			    #HR Officer (open)
			    if(1==1){
				
				$hr_officer_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Edit positions of staff members.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'Has special menu to edit staff positions at the bottom of this page.'
				    )
				    ,array(
					'type'=>'Formalities',
					'value'=>
						'The HR Officer only executes orders, but isn\'t legitimized to make own staff decision.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #HR Officer (close)
			    
			}
			#preparation (close)
			
			#array (open)
			if(1==1){
			    
			    $positions_array[] = 'operations_coordinator';
			    $positions_array[] = 'forum_moderator';
			    $positions_array[] = 'hr_officer';
			    
			}
			#array (close)
			
		    }
		    #operations (close)
		    
		    #pr (open)
		    if(1==1){
			
			#preparation (open)
			if(1==1){
			    
			    #Public Relations Coordinator (open)
			    if(1==1){
				
				$pr_coordinator_bulletpoints_array = array(
				    array(
					'type'=>'Functions',
					'value'=>
						'Like the coordinator, but more in depth and confined to this department.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Managing Volunos outside communication, ensuring regularity, consistency and professionalism.'
				    )
				    ,array(
					'type'=>'Functions',
					'value'=>
						'Specifically: social media,
						logo policy, press statements, advertizing and information materials, etc.'
				    )
				    ,array(
					'type'=>'Current position holder',
				    )
				    
				);
				
			    }
			    #Public Relations Coordinator (close)
			    
			}
			#preparation (close)
			
			#array (open)
			if(1==1){
			    
			    $positions_array[] = 'pr_coordinator';
			    
			}
			#array (close)
			
		    }
		    #pr (close)
		    
		}
		#individual positions array (close)
		
		#department array (open)
		for($aca=0;$aca<count($positions_array);$aca++){
		    
		    if($all_existing_staff_positions_array[$positions_array[$aca]]['type'] == "department_head"){
			
			$department_name
			    = substr($positions_array[$aca], 0, strlen($positions_array[$aca])-strlen("_coordinator"));
			
			$head_of_department_array[] = array(
			    "position_name" => $positions_array[$aca]
			    ,"department" => $department_name
			);
			
		    }
		}
		#department array (close)
		
	    }
	    #positions_array (close)
	    
	    #arrows_array (open)
	    if(1==1){
		
		$arrows_array = array(
		    array(
			'name' => 'elects_default'
			,'text' => 'elects'
			,'type' => 'solid black'
		    )
		    ,array(
			'name' => 'appoints'
			,'text' => 'appoints'
			,'type' => 'solid black'
		    )
		    ,array(
			'name' => 'supervises'
			,'text' => 'supervises'
			,'type' => 'dashed black'
		    )
		);
		
	    }
	    #arrows_array (close)
	    
	}
	#arrays (close)
	
	#loops (open)
	if(1==1){
	    
	    #positions_array (open)
	    if(1==1){
		
		for($abx=0;$abx<count($positions_array);$abx++){
		    
		    #bullet points (open)
		    if(!empty(${$positions_array[$abx].'_bulletpoints_array'})){
			
			$bulletpoints_array = ${$positions_array[$abx].'_bulletpoints_array'};
			
			#get top level bullet points list (open)
			if(1==1){
			    
			    for($acc=0;$acc<count($bulletpoints_array);$acc++){
				
				$top_level_bulletpoints_array[] = $bulletpoints_array[$acc]['type'];
				
			    }
			    
			    $top_level_bulletpoints_array = array_values(array_unique($top_level_bulletpoints_array));
			    
			}
			#get top level bullet points list (close)
			
			#loop (open)
			for($acc=0;$acc<count($top_level_bulletpoints_array);$acc++){
			    
			    if($acc==0){
				$bullet_points1 .= '
				<ul>';
			    }
			    
			    $bullet_points1 .= '
			    <li>
				<strong>
				    '.$top_level_bulletpoints_array[$acc];
			    $bullet_points2 .= ':
				</strong>
				<ul>';
				    
				    #level2 bullet points + not hidden current position holders (open)
				    for($acd=0;$acd<count($bulletpoints_array);$acd++){
					
					#people (open)
					if($bulletpoints_array[$acd]['type'] == $top_level_bulletpoints_array[$acc]
					    AND
					    $bulletpoints_array[$acd]['type'] == "Current position holder"){
					    
					    #get array of ids of users (open)
					    if(1==1){
						
						unset($ids_array);
						
						#check ids from results of all members with positions (open)
						for($acf=0;$acf<count($all_staff_positions_results);$acf++){
						    if(
							$all_staff_positions_results[$acf]->application_type_specific
							==
							$positions_array[$abx]
						    ){
							$ids_array[] = $all_staff_positions_results[$acf]->application_user_id;
						    }
						}
						#check ids from results of all members with positions (open)
						
						#get ids from results of all staff members (open)
						if($positions_array[$abx] == "plenary_meeting"){
						    for($acf=0;$acf<count($all_staff_members_results);$acf++){
							$ids_array[] = $all_staff_members_results[$acf]->application_user_id;
						    }
						}
						#get ids from results of all staff members (open)
						
					    }
					    #get array of ids of users (close)
					    
					    #plural s in case of position holders and applications (open)
					    if(count($ids_array) > 1){
						$plural_s = "s";
					    }else{
						unset($plural_s);
					    }
					    #plural s in case of position holders and applications (close)
					    
					    #position div (open)
					    if(1==1){
						
						$container_div_open = '
						<div
						    style="
							display:inline-block;
							vertical-align:top;
							margin:5px;
							padding:10px;
							width:120px;
							border-radius:10px;
							background-color:#FFE7AE;
							text-align:center;';
						
						$bullet_points2 .= '
						<div style="text-align:center;">';
						
						#if position is assigned (open)
						if(count($ids_array)>0){
						    
						    for($ace=0;$ace<count($ids_array);$ace++){
							
							#function-image-processing (open)
							if(1==1){
							    #profile picture
								$function_propic__type = "profile picture";
								$function_propic__user_id = $ids_array[$ace];
							    #all
								$function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
							    include('#function-image-processing.php');
							    # $function_propic;
							    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
							}
							#function-image-processing (close)
							
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
									
									$function_profileLink['id'] = $ids_array[$ace]; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
							
							$bullet_points2 .= '
							<a
							    href="'.$function_profileLink['link'].'"
							    title="'.$function_profileLink['link_title'].'"
							>
							    '.$container_div_open.'">
								<img src="'.$function_propic.'" class="voluno_brighter_on_hover img_rounded_border">
								<br>
								'.$function_profileLink['name'].'
							    </div>
							</a>';
							
							#position_holders not hidden (open)
							if(1==1){
							    
							    $position_holders .= 
							    '<div
								style="margin:5px;display:inline-block;"
								class="content_div_content_shown"
							    >
								<a
								    href="'.$function_profileLink['link'].'"
								    title="'.$function_profileLink['link_title'].'"
								>
								    <img
									src="'.$function_propic.'"
									style="width:50px;vertical-align:middle;"
									class="voluno_brighter_on_hover img_rounded_border"
								    >
								</a>
							    </div>';
							}
							#position_holder not hidden (close)
							
						    }
						    
						}
						#if position is assigned (close)
						
						#if position is unassinged (open)
						else{
						    
						    #function-image-processing (open)
						    if(1==1){
							#thematic only
							    $function_propic__type = "thematic";
							    $function_propic__original_img_name = "+++default-profile-picture.png";
							#all
							    $function_propic__geometry = array(100,100); //optional, if e.g. only width: 300, NULL; vice versa
							include('#function-image-processing.php');
							# $function_propic;
						    }
						    #function-image-processing (close)
						    
						    $bullet_points2 .=
							$container_div_open.'
							background-color:grey;">
							<div
							    style="
								text-align:center;
								margin-top:25px;
								position:absolute;
								color:#fff;
								width:150px;
								z-index:100;
								font-weight:bold;
								font-size:50px;
							    "
							>
							    ?
							</div>
							<img src="'.$function_propic.'" class="voluno_brighter_on_hover img_rounded_border">
							<br>
							Position open
						    </div>';
						    
						}
						#if position is unassinged (close)
						
						$bullet_points2 .= '
						</div>';
						
					    }
					    #position div (open)
					    
					}
					#people (close)
					
					#text (open)
					elseif($bulletpoints_array[$acd]['type'] == $top_level_bulletpoints_array[$acc]){
					    $bullet_points2 .= '
					    <li>
						'.$bulletpoints_array[$acd]['value'].'
					    </li>';
					}
					#text (close)
					
				    }
				    #level2 bullet points + not hidden current position holders (close)
				    
				$bullet_points2 .= '
				</ul>
			    </li>';
			    
			    if($acc + 1 == count($top_level_bulletpoints_array)){
				$bullet_points2 .= '
				</ul>';
			    }
			    
			    $bullet_points .= $bullet_points1.$plural_s.$bullet_points2;
			    unset($bullet_points1,$bullet_points2);
			    
			}
			#loop (close)
			
		    }
		    #bullet points (close)
		    
		    #department head jquery preparation (open)
		    if(1==1){
			
			unset($preliminary_class);
			if($all_existing_staff_positions_array[$positions_array[$abx]]['type'] == "department_head"){
			    $more_button = '
			    <div style="text-align:center;">
				<div class="voluno_button department_tree_link" style="display:inline-block;">
				    Department<br>details
				    <span style="display:none;">'.
					$positions_array[$abx].
				    '</span>
				</div>
			    </div>';
			}else{
			    unset($more_button);
			}
			
		    }
		    #department head jquery preparation (close)
		    
		    #content divs (open)
		    if(1==1){
			
			//$position_div_plenary_meeting
			${'position_div_'.$positions_array[$abx]} = '
			<td class="position_box">
			    <div class="content_div_extend_link" style="text-align:center;cursor:pointer;margin:10px;">
				<h5 style="display:inline;">
				    <a>
					'.$all_existing_staff_positions_array[$positions_array[$abx]]['display'].$plural_s.
					'<span class="content_div_content_shown">:</span>
				    </a>
				</h5>
			    </div>
			    <div style="margin:0px 10px 10px 10px;text-align:center;">
				'.$position_holders.'
			    </div>
			    <div class="content_div_content_hidden" style="padding:0px 20px 20px 20px;display:none;">
				'.${$positions_array[$abx].'_content'}.'
				'.$bullet_points.'
			    </div>
			    '.$more_button.'
			</td>'; 
			unset($bullet_points,$position_holders,$top_level_bulletpoints_array,$plural_s);
			
		    }
		    #content divs (close)
		    
		}
		
	    }
	    #positions_array (close)
	    
	    #arrows_array (open)
	    if(1==1){
		
		#loop (open)
		for($aby=0;$aby<count($arrows_array);$aby++){
		    
		    if($arrows_array[$aby]['type'] == "dashed black"){
			$arrow_trunk_style = "border-left:8px dotted #8b0000;";
		    }else{
			$arrow_trunk_style = "border-left:8px solid #8b0000;";
		    }
		    
		    #arrow types array (open)
		    if(1==1){
			
			$arrow_types_array = array(
			    
			    #full arrow
			    array(
				'padding' => "padding-bottom:23px;"
				,'arrow_peak' => '
				    <div class="arrow_trunk_placeholder">
					<div class="arrow_peak">
					</div>
				    </div>'
				,'description_text' => '
				    <table style="padding:0px;margin:0px;height:100%;">
					<tr style="padding:0px;margin:0px;">
					    <td style="vertical-align:middle;padding:5px 20px px 10px;">
						'.$arrows_array[$aby]['text'].'
					    </td>
					</tr>
				    </table>'
			    )
			    
			    #trunk only
			    ,array(
				'variable_name_addition' => '_trunk_only'
				,'aaa' => 'background-color:red;'
			    )
			);
			
		    }
		    #arrow types array (close)
		    
		    #full arrow (open)
		    for($acb=0;$acb<count($arrow_types_array);$acb++){
			
			//$arrow_elects_default
			${'arrow_'.$arrows_array[$aby]['name'].$arrow_types_array[$acb]['variable_name_addition']} = '
			<td class="no_padding_spacing" style="height:100%;">
			    <table style="height:100%;padding:0px;margin:0px;margin-left:-6px;'.$arrow_types_array[$acb]['aaa'].'">
				<tr style="padding:0px;margin:0px;">
				    <td style="padding:0px;margin:0px;'.$arrow_types_array[$acb]['padding'].';height:100%;">
					<div class="arrow_trunk" style="vertical-align:middle;'.$arrow_trunk_style.'">
					    <div sty="padding-left:10px;">
						'.$arrow_types_array[$acb]['description_text'].
						$arrow_types_array[$acb]['variable_name_addition'].'
					    </div>
					</div>
					'.$arrow_types_array[$acb]['arrow_peak'].'
				    </td>
				</tr>
			    </table>
			</td>';
			
		    }
		    #full arrow (close)
		    
		}
		#loop (close)
		
	    }
	    #arrows_array (close)
	    
	}
	#loops (close)
	
    }
    #preparation (close)
    
    #content (open)
    if(1==1){
	
	echo '
	<div class="organigram">
	    <table class="no_padding_spacing">
		<tr>
		    '.$position_div_plenary_meeting.'
		</tr>
	    </table>';
	    
	    #plenary -> board -> coordinator (open)
	    if(1==1){
		echo '
		<table class="no_padding_spacing">
		    <tr>
			'.$arrow_elects_default.'
			<td class="no_padding_spacing" style="width:75%;">
			    <table class="no_padding_spacing">
				<tr>
				    '.$arrow_elects_default.'
				</tr>
				<tr>
				    '.$position_div_board.'
				</tr>
				<tr>
				    '.$arrow_supervises.'
				</tr>
			    </table>
			</td>
		    </tr>
		</table>
		<table class="no_padding_spacing">
		    <tr>
			'.$position_div_coordinator.'
		    </tr>
		</table>';
	    }
	    #plenary -> board -> coordinator (close)
	    
	    #department heads (open)
	    if(1==1){
		echo '
		<table class="no_padding_spacing">
		    <tr>';
			
			for($abz=0;$abz<count($head_of_department_array);$abz++){
			    echo
			    $arrow_appoints;
			}
			
		    echo '
		    </tr>
		    <tr>';
			
			for($abz=0;$abz<count($head_of_department_array);$abz++){
			    echo '
			    <td style="width:25%;padding:0px 5px;overflow:hidden;">
				<table class="no_padding_spacing">
				    <tr>
					<td>
					    '.${'position_div_'.$head_of_department_array[$abz]['position_name']}.'
					</td>
				    </tr>
				</table>
				<div
				    style="width:100%;position:relative;display:none;"
				    class="department_tree department_tree_'.$head_of_department_array[$abz]['position_name'].'"
				>
				    <div
					style="
					    position:absolute;
					    height:3000px;
					    width:50%;
					    margin-left:-6px;
					    border-right:8px solid #8b0000;
					"
				    >
				    </div>
				</div>
			    </td>';
			}
			
		    echo '
		    </tr>
		    <tr>';
			
			for($aca=0;$aca<count($head_of_department_array);$aca++){
			    echo '
			    <td class="no_padding_spacing">
				<table
				    style="display:none;"
				    class="no_padding_spacing department_tree department_tree_'.$head_of_department_array[$aca]['position_name'].'"
				>
				    <tr>
					'.$arrow_appoints.'
				    </tr>
				</table>
			    </td>';
			}
			
		    echo '
		    </tr>
		</table>';
	    }
	    #department heads (close)
	    
	    #departments (open)
	    if(1==1){
		echo '
		<table class="no_padding_spacing">';
		    
		    for($aca=0;$aca<count($head_of_department_array);$aca++){
			
			#get all positions from the respective department (open)
			if(1==1){
			    
			    for($acg=0;$acg<count($positions_array);$acg++){
				
				if($head_of_department_array[$aca]['department']
				== $all_existing_staff_positions_array[$positions_array[$acg]]['department']
				AND
				$all_existing_staff_positions_array[$positions_array[$acg]]['type'] != "department_head"){
				    $full_tds_of_all_positions_in_this_department .=
					'<div style="margin:10px;float:left;min-width:200px;">
					    <table class="no_padding_spacing">
						<tr>
						    '.${'position_div_'.$positions_array[$acg]}.'
						</tr>
					    </table>
					</div>';
				}
				
			    }
			    
			}
			#get all positions from the respective department (close)
			
			echo '
			<tr
			    style="display:none;"
			    class="department_tree department_tree_'.$head_of_department_array[$aca]['position_name'].'"
			>
			    <td style="background-color:#FFA461;border-radius:20px;text-align:center;">
				<div style="display:inline-block;">
				    '.$full_tds_of_all_positions_in_this_department.'
				</div>
			    </td>
			</tr>';
			unset($full_tds_of_all_positions_in_this_department);
		    }
		    
		echo '
		</table>';
	    }
	    #departments (close)
	    
	echo '
	</div>';
	
    }
    #content (close)
    
    #edit positions reference (open)
    if(in_array('Voluno Coordinator',$function_userpositions_get['simple_pure_array']['accepted'])){
	
	echo '
	<div
	    style="
		border:10px double #006F00;
		background-color:#d7ffd7;
		padding:20px;
		margin:20px;
		border-radius:20px;
		text-align:center;
	    "
	>
	    <h4 style="display:inline">
		Hello Coordinator
	    </h4>
	    <br>
	    To change staff positions, click
	    <a href="'.get_permalink(824).'?section=coordinator" title="Go to Coordinator workspace">
		here'.
	    '</a>.
	</div>';
	
    }
    #edit positions reference (close)
    
}
#content (close)

?>