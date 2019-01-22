<?php

#mysql (open)
if(1==1){
    
    #get (open)
    if(1==1){
		
		#country list (open)
		if(1==1){
			
			$country_list_query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_lists_countries
							WHERE list_countries_type = "country"
							ORDER BY list_countries_name ASC');
			$country_list_results = $GLOBALS['wpdb']->get_results($country_list_query);
			
		}
		#country list (close)
		
    }
    #get (close)
    
    #update (open)
    if(!empty($_POST['first_name'])){
		
		$wp_user_data = wp_get_current_user();###
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$country_id = intval($_POST['country']);
		
		#function-sanitize-text.php (open)
		if(1==1){
			
			$function_sanitize_text__type = "url readable text (url, user_nicename, etc.) (sanitize_title)";
			$function_sanitize_text__text = $first_name;
			include('#function-sanitize-text.php');
			$first_name_url = $function_sanitize_text__text_sanitized;
			
			$function_sanitize_text__type = "url readable text (url, user_nicename, etc.) (sanitize_title)";
			$function_sanitize_text__text = $last_name;
			include('#function-sanitize-text.php');
			$last_name_url = $function_sanitize_text__text_sanitized;
			
			$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
			$function_sanitize_text__text = $first_name;
			include('#function-sanitize-text.php');
			$first_name = $function_sanitize_text__text_sanitized;
			
			$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
			$function_sanitize_text__text = $last_name;
			include('#function-sanitize-text.php');
			$last_name = $function_sanitize_text__text_sanitized;
			
			for($abe=0;$abe<count($country_list_results);$abe++){
			if($country_list_results[$abe]->list_countries_id == $country_id){
				$country = $country_list_results[$abe]->list_countries_id;
			}
			}
			
		}
		#function-sanitize-text.php (close)
		
		#enter data (open)
		if(!empty($first_name_url) AND !empty($last_name_url) AND !empty($country)){
			
			$email = $wp_user_data->user_email;
			$first_name = ucwords(strtolower($first_name));
			$last_name = ucwords(strtolower($last_name));
			$display_name = ucwords(strtolower($first_name.' '.$last_name));
			
			#update wp_users (open)
			if(1==1){
				
				#update wp_users facebook login_name (open)
				if(1==1){
					
					#database query update (open)
					if(1==1){
					$GLOBALS['wpdb']->update( 
							'4df5ukbnn5p3t817_users',
						array( //updated content
							'user_login' => $email,
						),
						array( //location of updated content
							'ID' => $wp_user_data->ID
						),
						array( //format of updated content
							'%s'
						),
						array( //format of location of updated content
							'%d'
						));
					}
					#database query update (close)
					
				}
				#update wp_users facebook login_name (close)
				
				wp_update_user( array( 'ID' => $wp_user_data->ID, 'user_nicename' => $first_name_url.'-'.$last_name_url ));
				wp_update_user( array( 'ID' => $wp_user_data->ID, 'display_name' => $display_name ));
				
			}
			#update wp_users (close)
			
			#database query insert (open)
			if(1==1){
			$GLOBALS['wpdb']->insert(
					'fi4l3fg_voluno_users_extended',
				array(
					'usersext_userEmail' => $email,
					'usersext_displayName' => $display_name,
					'usersext_userRegistered' => date("Y-m-d H:i:s"),
					'usersext_lastLogin' => date("Y-m-d H:i:s"),
					
					'usersext_firstName' => $first_name,
					'usersext_lastName' => $last_name,
					'usersext_country' => $country,
					
					'usersext_id' => 'usersext_id_'.$wp_user_data->ID,
					'usersext_ida' => $wp_user_data->ID
					),
				array(
					'%s','%s','%s','%s',
					'%s','%s','%d',
					'%s','%d'
					));
			}
			#database query insert (close)
			
		}
		#enter data (close)
		
		#function-redirect.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Redirects to another page. Prevents further loading of content.
				
			}
			#documentation (close)
			
			#input (open)
			if(1==1){
				
				$function_redirect['redirect_url'] = get_home_url(); // url to redirect to. If none is given, homepage is used.
				
			}
			#input (close)
			
			include('#function-redirect.php');
			
			#no output
			
		}
		#function-redirect.php (v1.0) (close)
		
    }
    #update (close)
    
}
#mysql (close)

#jquery (open)
if(1==1){
    
    echo '
    <script>
	jQuery(document).ready(function(){
	    
	    jQuery(".terms_and_conditions_button").click(function(){
		jQuery(".terms_and_conditions").fadeIn(300);
	    });
	    
	    jQuery("input, select").focus(function(){
		jQuery(this).parent().parent().find(".warnings").fadeOut(300);
	    });
	    
	    jQuery(".save_and_continue_button").click(function(){
		
		var errors = 0;
		
		if(jQuery(".first_name").val() == "" || jQuery(".last_name").val() == ""){
		    errors = 1;
		    jQuery(".name_warning").fadeIn(300);
		}
		
		if(jQuery(".country").val() == ""){
		    errors = 1;
		    jQuery(".country_warning").fadeIn(300);
		}
		
		if(!jQuery(".conditions_agree").is(":checked")) {
		    jQuery(".conditions_warning").fadeIn(300);
		    errors = 1;
		}
		
		if(errors == 0){
		    jQuery(".facebook_registration_form").submit();
		}
	    });
	    
	});
    </script>';
    
}
#jquery (close)

#content (open)
if(1==1){

    #title + img (open)
    if(1==1){
	
	
	#function-image-processing (open)
	if(1==1){
	    #thematic only
		$function_propic__type = "thematic";
		$function_propic__original_img_name = "registration.jpg";
		$function_propic__cropping = "yes"; //yes or empty (default)
	    #all
		$function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
	    include('#function-image-processing.php');
	    # $function_propic;
	    #$function_propic__image_available <- is set to yes or no, currently only works with profile pictures
	}
	#function-image-processing (close)
	
	echo '
	<img class="voluno_header_picture" src="'.$function_propic.'">
	
	<div style="margin-bottom:30px;text-align:center;">
	    <h1 style="display:inline;">
		Welcome at Voluno!
	    </h1>
	</div>
	';
	
    }
    #title + img (close)
    
    #text and form (open)
    if(1==1){
	
	#preparation (open)
	if(1==1){
	    
	    #country input (open)
	    if(1==1){
		
		$country_input = '
		<select name="country" class="country">
		    
		    <option value="">
			- Please select -
		    </option>';
		    
		    for($abd=0;$abd<count($country_list_results);$abd++){
			
			$country_input .= '
			<option value="'.$country_list_results[$abd]->list_countries_id.'">
			    '.$country_list_results[$abd]->list_countries_name.'
			</option>';
			
		    }
		    
		$country_input .= '
		</select>';
		
	    }
	    #country input (close)
	    
	    #function-terms-and-conditions.php
	    if(1==1){
		include('#function-terms-and-conditions.php');
		#uses function-fixed-div.php, div name: terms_and_conditions
	    }
	    #function-terms-and-conditions.php
	    
	    #form array (open)
	    if(1==1){
		
		$form_array = array(
		    
		    array(
			'title' => 'First and last name:',
			'subtitle' => 'Please keep it short',
			'input' => '<input
					style="width:20%;text-align:center;"
					type="text"
					name="first_name"
					class="first_name"
					placeholder="First name"
				    >
				    <input
					style="width:20%;text-align:center;"
					type="text"
					name="last_name"
					class="last_name"
					placeholder="Last name"
				    >',
			'warning' => 'Please provide your first and last name.',
			'warning_class' => 'name_warning'
		    ),
		    
		    array(
			'title' => 'Country of residence:',
			'input' => $country_input,
			'warning' => 'Please select a country.',
			'warning_class' => 'country_warning'
		    ),
		    
		    array(
			'title' => 'Do you agree with our <a class="terms_and_conditions_button" style="cursor:pointer;">terms and conditions</a>?',
			'input' => '
			    <label style="cursor:pointer;">
				<input type="radio" name="conditions" value="agree" class="conditions_agree">
				I agree
			    </label>
			    <br>
			    <br>
			    <label style="cursor:pointer;">
				<input type="radio" name="conditions" value="disagree" checked>
				I don\'t agree
			    </label>',
			'warning' => 'You may only continue if you agree to our terms and conditions.',
			'warning_class' => 'conditions_warning'
		    )
		    
		);
		
	    }
	    #form array (close)
	    
	}
	#preparation (close)
	
	#content (open)
	if(1==1){
	    
	    echo '
	    <p>
		Please provide additional information:
	    </p>
	    <form method="post" action="'.get_permalink().'" class="facebook_registration_form">
		<table style="width:60%">';
		    for($abc=0;$abc<count($form_array);$abc++){
			echo '
			<tr>
			    <td style="padding:20px 20px 10px 20px;" colspan="2">
				<p>
				    <strong>
					'.$form_array[$abc]['title'].'
				    </strong>';
				    if(!empty($form_array[$abc]['subtitle'])){
					echo '
					<br>
					('.$form_array[$abc]['subtitle'].')';
				    }
				echo '
				</p>
			    </td>
			</tr>
			<tr>
			    <td style="padding:0px 20px 0px 50px;" colspan="2">
				'.$form_array[$abc]['input'].'
				<div style="display:none;color:red;" class="'.$form_array[$abc]['warning_class'].' warnings">
				    '.$form_array[$abc]['warning'].'
				</div>
			    </td>
			</tr>';
		    }
		    echo '
		    <tr style="text-align:center;">
			<td style="width:50%;padding:30px;">
			    <a href="'.wp_logout_url( home_url() ).'">
				<span class="voluno_button">
				    Cancel and logout
				</span>
			    </a>
			</td>
			<td style="padding:30px;">
			    <span class="voluno_button save_and_continue_button">
				Save and continue
			    </span>
			</td>
		    </tr>
		</table>
	    </form>';
	    
	}
	#content (close)
	
    }
    #text and form (close)
    
}
#content (close)

?>