<?php

#validation: does ngo exist? (open)
if(1==1){
	
	$ngo_id = $_GET['ngo'];
	
	$does_ngo_exist_query = $GLOBALS['wpdb']->prepare('SELECT *
		FROM fi4l3fg_voluno_development_organizations
		WHERE ngo_id = %d
			AND ngo_status = "";'
		,$ngo_id);
	$does_ngo_exist_row = $GLOBALS['wpdb']->get_row($does_ngo_exist_query);
	
	#function-redirect.php (v1.0) (open)
	if(empty($does_ngo_exist_row)){
		
		#documentation (open)
		if(1==1){
			
			// Redirects to another page. Prevents further loading of content.
			
		}
		#documentation (close)
		
		#input (open)
		if(1==1){
			
			$function_redirect['redirect_url'] = get_permalink(689); // url to redirect to. If none is given, homepage is used.
			
		}
		#input (close)
		
		include('#function-redirect.php');
		
		#no output
		
	}
	#function-redirect.php (v1.0) (close)
	
	$ngo_row = $does_ngo_exist_row;
	
}
#validation: does ngo exist? (close)

#profile (open)
if(1==1){
    
    #arm (open)
    if(1==1){
        
        #admin
        #staff member
        #agent
        #settings
        
    }
    #arm (close)
    
    #mysql
    if(1==1){
       
        #update my profile (open)
        if(isset($_POST['update_profile_gender']) AND $ngo_admin == "yes"){
           
           #statement (open)
           if(1==1){
              $update_statement = $_POST['update_profile_statement'];
              #function-sanitize-text.php
                 $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                 $function_sanitize_text__text = $update_statement;
                 include('#function-sanitize-text.php');
                 $update_statement = $function_sanitize_text__text_sanitized;
                 
              $GLOBALS['wpdb']->update( 
                             'fi4l3fg_voluno_users_extended',
                      array( //updated content
                             'statement' => $update_statement
                      ),
                      array( //location of updated content
                             'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                      ),
                      array( //format of updated content
                             '%s'
                      ),
                      array( //format of location of updated content
                             '%s'
                          ));
           }
           #statement (close)
           
           #personal info (open)
           if(1==1){
              
              #gender (open)
              if(1==1){
                 $update_gender = $_POST['update_profile_gender'];
                 if($update_gender != "Male" AND $update_gender != "Female"){
                    $update_gender = "";
                 }
                 
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'gender' => $update_gender
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #gender (close)
              
              #residence (open)
              if(1==1){
                 
                 $update_profile_street = $_POST['update_profile_street'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_street;
                    include('#function-sanitize-text.php');
                    $update_profile_street = $function_sanitize_text__text_sanitized;
                 
                 $update_area_code = $_POST['update_profile_area_code'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_area_code;
                    include('#function-sanitize-text.php');
                    $update_area_code = $function_sanitize_text__text_sanitized;
                 
                 $update_profile_state = $_POST['update_profile_state'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_state;
                    include('#function-sanitize-text.php');
                    $update_profile_state = $function_sanitize_text__text_sanitized;
                 
                 $update_city = $_POST['update_profile_city'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_city;
                    include('#function-sanitize-text.php');
                    $update_city = $function_sanitize_text__text_sanitized;
                    
                 $update_country = $_POST['update_profile_country'];
                 $update_country = intval($update_country);
                 
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'usersext_street' => $update_profile_street,
                                'usersext_areaCode' => $update_area_code,
                                'usersext_city' => $update_city,
                                'usersext_state' => $update_profile_state,
                                'usersext_country' => $update_country
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s', #street
                                '%s', #area code
                                '%s', #city
                                '%s', #state
                                '%d' #country
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #residence (close)
              
              #age / date of birth (open)
              if(1==1){
                 $update_age_day = $_POST['update_profile_age_day'];
                 $update_age_month = $_POST['update_profile_age_month'];
                 $update_age_year = $_POST['update_profile_age_year'];
                 if($update_age_day < 10 AND $update_age_month < 10){
                    $update_age = intval($update_age_year).'-0'.intval($update_age_month).'-0'.intval($update_age_day);
                 }elseif($update_age_day >= 10 AND $update_age_month < 10){
                    $update_age = intval($update_age_year).'-0'.intval($update_age_month).'-'.intval($update_age_day);
                 }elseif($update_age_day < 10 AND $update_age_month >= 10){
                    $update_age = intval($update_age_year).'-'.intval($update_age_month).'-0'.intval($update_age_day);
                 }else{
                    $update_age = intval($update_age_year).'-'.intval($update_age_month).'-'.intval($update_age_day);
                 }
                 
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'birth_date' => $update_age
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #age / date of birth (close)
              
              #occupation (open)
              if(1==1){
                 $update_occupation = $_POST['update_profile_occupation'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_occupation;
                    include('#function-sanitize-text.php');
                    $update_occupation = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'occupation' => $update_occupation
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #occupation (close)
              
              #cv (open)
              if(1==1){
                 
                 #delete cv (open)
                 if($_POST['delete_cv_hidden_form_field'] == "true"){
                 
                    #delete cv folder contents (open)
                    if(1==1){
                       
                       $uploads_directory_raw = wp_upload_dir();
                       $uploads_directory_abs = $uploads_directory_raw['path'];
                       
                       $array_of_folder_names = array(
                           $uploads_directory_abs.'/members/'.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'/cv'
                       );
                       
                       for($x=0;$x<count($array_of_folder_names);$x++){
                           $path = $array_of_folder_names[$x];
                           if (is_dir($path) === true){
                               $files = array_diff(scandir($path), array('.', '..'));
                               foreach($files as $file){
                                   unlink($path.'/'.$file);
                               }
                               rmdir($path);
                           }elseif(is_file($path)===true){
                               unlink($path);
                           }
                       }
                       
                    }
                    #delete cv folder contents (close)
                    
                    #update fi4l3fg_voluno_users_extended (open)
                    if(1==1){
                       
                       $GLOBALS['wpdb']->update( 
                                       'fi4l3fg_voluno_users_extended',
                               array( //updated content
                                       'cv' => ""
                               ), 
                               array( //location of updated content
                                       'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                               ), 
                               array( //format of updated content
                                       '%s'
                               ), 
                               array( //format of location of updated content
                                       '%s'
                                   ));
                    
                    }
                    #update fi4l3fg_voluno_users_extended (close)
                 
                 }
                 #delete cv (close)
                 
                 #insert/replace new cv (open)
                 if(!empty($_POST['update_profile_cv_check'])){
                    
                    #check if file is pdf (open)
                    if(1==1){
                    
                       $finfo = new finfo(FILEINFO_MIME_TYPE,"/usr/share/misc/magic");
                       $fileMimeType = $finfo->file($_FILES["update_profile_cv"]["tmp_name"]);
                       
                       if($fileMimeType == "application/pdf"){
                          $is_cv_pdf_file_check = "yes";
                       }else{
                          $is_cv_pdf_file_check = "no";
                       }
                       
                    }
                    #check if file is pdf (close)
                    
                    #if file is pdf (open)
                    if($is_cv_pdf_file_check == "yes"){
                       
                       #upload file to general uploads directory (open)
                       if(1==1){
                          
                          $uploads_directory_raw = wp_upload_dir();
                          $uploads_directory_abs = $uploads_directory_raw['path'];
                          $uploads_directory_web = $uploads_directory_raw['url'];
                          
                          $update_cv = $_FILES['update_profile_cv'];
                          
                          if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
                          $cv_full_preliminary_abs_path = wp_handle_upload( $update_cv, array('test_form'=>false) );
                       }
                       #upload file to general uploads directory (close)
                       
                       #delete cv folder contents (open)
                       if(1==1){
                          
                          $array_of_folder_names = array(
                              $uploads_directory_abs.'/members/'.$GLOBALS['voluno_variables']['current_user_extended']->usersext_id.'/cv'
                          );
                          
                          for($x=0;$x<count($array_of_folder_names);$x++){
                              $path = $array_of_folder_names[$x];
                              if (is_dir($path) === true){
                                  $files = array_diff(scandir($path), array('.', '..'));
                                  foreach($files as $file){
                                      unlink($path.'/'.$file);
                                  }
                                  rmdir($path);
                              }elseif(is_file($path)===true){
                                  unlink($path);
                              }
                          }
                          
                       }
                       #delete cv folder contents (close)
                       
                       #move file to user specific directory and safe filename (open)
                       if(1==1){
                          
                          $cv_half_final_abs_path =
                             $uploads_directory_abs.
                             '/members/'.
                             $GLOBALS['voluno_variables']['current_user_extended']->usersext_id.
                             '/cv';
                             
                          $cv_full_final_abs_path =
                             $cv_half_final_abs_path.
                             '/cv.pdf';
                             
                          if(!file_exists($cv_half_final_abs_path)){
                             mkdir($cv_half_final_abs_path, 0777, true);
                          }
                          
                          rename($cv_full_preliminary_abs_path['file'],$cv_full_final_abs_path);
                          
                       }
                       #move file to user specific directory and safe filename (close)
                       
                       #update fi4l3fg_voluno_users_extended (open)
                       if(1==1){
                       
                          $cv_filename = pathinfo($cv_full_preliminary_abs_path['file']);
                          
                          $GLOBALS['wpdb']->update( 
                                          'fi4l3fg_voluno_users_extended',
                                  array( //updated content
                                          'cv' => $cv_filename[basename]
                                  ), 
                                  array( //location of updated content
                                          'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                                  ), 
                                  array( //format of updated content
                                          '%s'
                                  ), 
                                  array( //format of location of updated content
                                          '%s'
                                      ));
                       
                       }
                       #update fi4l3fg_voluno_users_extended (close)
                       
                    }
                    #if file is pdf (open)
                    
                    #if file is not pdf (open)
                    else{
                       
                       #see jquery alert message
                       
                    }
                    #if file is not pdf (open)
                    
                 }
                 #insert/replace new cv (close)
                 
              }
              #cv (close)
              
              #biography (open)
              if(1==1){
                 $update_bio = $_POST['update_profile_biography'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "plain text with line breaks (biography)";
                    $function_sanitize_text__text = $update_bio;
                    include('#function-sanitize-text.php');
                    $update_bio = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'biography' => $update_bio
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #biography (close)
              
           }
           #personal info (close)
           
           #contact info (open)
           if(1==1){
              
              #email adress (open)
              if(1==1){
                 $update_profile_email = $_POST['update_profile_email'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_email;
                    include('#function-sanitize-text.php');
                    $update_profile_email = $function_sanitize_text__text_sanitized;
                    
                 $update_profile_email_check_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_users_extended
                                                                    WHERE user_email = %s
                                                                       AND id != %s
                                                                    ;'
                                                                    ,$update_profile_email
                                                                    ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                 $update_profile_email_check_query = $GLOBALS['wpdb']->get_row($update_profile_email_check_query);
                 if(empty($update_profile_email_check_query) AND $update_profile_email != $GLOBALS['voluno_variables']['current_user_extended']->usersext_userEmail){
                    $primary_email_please_confirm_via_email = "yes";
                    
                    #database query delete
                        $GLOBALS['wpdb']->delete(
                                     'fi4l3fg_voluno_personal_settings',
                                array( //location of row to delete
                                     'pers_settings_user_id'   => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                     'pers_settings_general'   => "my profile",
                                     'pers_settings_specific'  => "update_email_primary"
                                ),
                                array( //format of location of row to delete
                                     '%s',
                                     '%s',
                                     '%s'
                                ));
                       
                    $voluno_random_num = "";
                    $length = 70;
                    for($i = 1; $i < $length; $i++) {
                        $voluno_random_num = $voluno_random_num.substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
                    }
                       
                    #database query insert
                        $GLOBALS['wpdb']->insert(
                                        'fi4l3fg_voluno_personal_settings',
                                array(
                                     'pers_settings_user_id'              => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                                     'pers_settings_general'              => "my profile",
                                     'pers_settings_specific'             => "update_email_primary",
                                     'pers_settings_content_varchar1000'  => $update_profile_email,
                                     'pers_settings_content_text'         => $voluno_random_num
                                    ),
                                array(
                                     '%s',
                                     '%s',
                                     '%s',
                                     '%s',
                                     '%s'
                                    ));
                    
                    
                    $email_content__edit_email_address =
                       '<p>
                          The user '.$GLOBALS['voluno_variables']['current_user_extended']->usersext_displayName.
                          ' just entered this email address in his or her Voluno account.
                          <br>
                          <br>
                          If this was you, please confirm the change by clicking
                          <a
                          href="'.get_permalink(790).'&redirect=1&code='.$voluno_random_num.'"
                          >here</a>
                          or, alternatively, copying
                          and pasting the following link into your browser:
                          <br>
                          <br>
                          '.get_permalink(790).'&redirect=1&code='.$voluno_random_num.'<br>
                          <br>
                          If this was not you, please simply ignore this email.
                          <br>
                          <br>
                          Thank you and best regards,
                       </p>';
                      
                 }elseif($update_profile_email != $GLOBALS['voluno_variables']['current_user_extended']->usersext_userEmail){
                    $email_already_exists_in_database = "yes";
                 }
                 
              }
              #email adress (close)
              
              #phone (open)
              if(1==1){
                 $update_profile_phone = $_POST['update_profile_phone'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_phone;
                    include('#function-sanitize-text.php');
                    $update_profile_phone = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'phone' => $update_profile_phone
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #phone (close)
              
              #skype (open)
              if(1==1){
                 $update_profile_skype = $_POST['update_profile_skype'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_skype;
                    include('#function-sanitize-text.php');
                    $update_profile_skype = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'skype' => $update_profile_skype
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #skype (close)
              
              #whatsapp (open)
              if(1==1){
                 $update_profile_whatsapp = $_POST['update_profile_whatsapp'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_whatsapp;
                    include('#function-sanitize-text.php');
                    $update_profile_whatsapp = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'whatsapp' => $update_profile_whatsapp
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #whatsapp (close)
              
              #facebook (open)
              if(1==1){
                 $update_profile_facebook = $_POST['update_profile_facebook'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_facebook;
                    include('#function-sanitize-text.php');
                    $update_profile_facebook = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'facebook' => $update_profile_facebook
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #facebook (close)
              
              #twitter (open)
              if(1==1){
                 $update_profile_twitter = $_POST['update_profile_twitter'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_twitter;
                    include('#function-sanitize-text.php');
                    $update_profile_twitter = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'twitter' => $update_profile_twitter
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #twitter (close)
              
              #website (open)
              if(1==1){
                 $update_profile_website = $_POST['update_profile_website'];
                 #function-sanitize-text.php
                    $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
                    $function_sanitize_text__text = $update_profile_website;
                    include('#function-sanitize-text.php');
                    $update_profile_website = $function_sanitize_text__text_sanitized;
                    
                 $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_users_extended',
                         array( //updated content
                                'website' => $update_profile_website
                         ),
                         array( //location of updated content
                                'usersext_id' => $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                         ),
                         array( //format of updated content
                                '%s'
                         ),
                         array( //format of location of updated content
                                '%s'
                             ));
              }
              #website (close)
              
           }
           #contact info (close)
           
        }
        #update my profile (close)
       
        #add contact
        if(!empty($_GET['add_contact']) AND $ngo_admin == "no" AND empty($profile_page_owner_blocked_row)){ //only execute if a) activated, b) it's not me and c) user is NOT yet my contact
           $GLOBALS['wpdb']->insert(
                           'fi4l3fg_voluno_personal_settings',
                   array(
                           'pers_settings_general'   =>    'contact',
                           'pers_settings_specific'  =>    'not blocked',
                           'pers_settings_value'     =>    $GLOBALS['voluno_variables']['current_user_extended']->usersext_id,
                           'pers_settings_user_id'   =>    $profile_page_owner_row->usersext_id
                       ),
                   array(
                           '%s',
                           '%s',
                           '%s',
                           '%s'
                       ));
           $GLOBALS['wpdb']->insert(
                           'fi4l3fg_voluno_personal_settings',
                   array(
                           'pers_settings_general'   =>    'contact',
                           'pers_settings_specific'  =>    'not blocked',
                           'pers_settings_value'     =>    $profile_page_owner_row->usersext_id,
                           'pers_settings_user_id'   =>    $GLOBALS['voluno_variables']['current_user_extended']->usersext_id
                       ),
                   array(
                           '%s',
                           '%s',
                           '%s',
                           '%s'
                       ));
        }
        #add contact
       
        #get data (open)
        if(1==1){
            
            #ngo info (open)
            if(1==1){
                $ngo_query = $GLOBALS['wpdb']->prepare('SELECT *
                        FROM fi4l3fg_voluno_development_organizations
                        LEFT JOIN ( '.#tranform country number to country name
                                  'SELECT list_countries_name as ngo_country_name, list_countries_id as ngo_country_name_id
                                  FROM fi4l3fg_voluno_lists_countries
                                  ) as aaa_ngo_country_name
                          ON ngo_country = ngo_country_name_id
                        LEFT JOIN ( '.#tranform country number to country name
                                  'SELECT list_countries_name as ngo_geographic_impact_name, list_countries_id as ngo_geographic_impact_name_id
                                  FROM fi4l3fg_voluno_lists_countries
                                  ) as bbb_ngo_geographic_impact_name
                          ON ngo_geographic_impact = ngo_geographic_impact_name_id
                        WHERE ngo_id = %d;'
                        ,$does_ngo_exist_row->ngo_id);
                $ngo_row = $GLOBALS['wpdb']->get_row($ngo_query);
            }
            #ngo info
            
            #all affiates (open)
            if(1==1){
                $all_affiliates_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        LEFT JOIN fi4l3fg_voluno_users_extended
                                                            ON ngo_prop_type_id = usersext_id
                                                        '#LEFT JOIN fi4l3fg_voluno_records_sum
                                                        #    ON ngo_prop_type_id = record_sum_user_id
                                                        .'WHERE ngo_prop_type_general = "position"
                                                            AND ngo_prop_type_specific = "worker"
                                                            AND ngo_prop_type_status = "accepted"
                                                            AND ngo_prop_ngo_id = %d
                                                        ORDER BY ngo_prop_type_detail DESC, usersext_displayName ASC;',
                                                        $ngo_row->ngo_id);
                $all_affiliates_results = $GLOBALS['wpdb']->get_results($all_affiliates_query);
            }
            #all affiates (close)
            
            #development topics (open)
            if(1==1){
                $development_topics_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                        FROM fi4l3fg_voluno_development_organizations_properties
                                                        WHERE ngo_prop_type_general = "development topic"
                                                            AND ngo_prop_ngo_id = %d;',
                                                        $ngo_row->ngo_id);
                $development_topics_results = $GLOBALS['wpdb']->get_results($development_topics_query);
            }
            #development topics (close)
            
            #user role (open)
            if(1==1){
                
                foreach($all_affiliates_results as $id_check){
                    if($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $id_check->usersext_id AND $id_check->ngo_prop_type_detail == "admin"){
                        $ngo_admin = "yes";
                    }elseif($GLOBALS['voluno_variables']['current_user_extended']->usersext_id == $id_check->usersext_id){
                        $ngo_admin = "no";
                    }
                }
            }
            #user role (close)
            
        }
        #get data (close)
       
    }
    #mysql
   
    #jquery (open)
    if(1==1){
	echo '
	<script>
	    jQuery(document).ready(function(){';
		
		#update browser title (my profile -> name) (open)
		if(1==1){
		    echo '
		    jQuery(document).attr("title", "Voluno | '.$ngo_row->ngo_name.' (Profile)");';
		}
		#update browser title (my profile -> name) (close)
		
		#profile picture hover (open)
		if(1==1){
		    echo '
		    jQuery(".ngo_logo").hover(function(){
			jQuery(this).css("opacity","0.85");
		    },function(){
			jQuery(this).css("opacity","");
		    })';
		}
		#profile picture hover (close)
		
		#hover content div (open)
		if(1==1){
		    echo '
		    jQuery(".profile_content_div").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })';
		}elseif(1==1){
		    echo '
		    jQuery(".profile_content_div").hover(function(){
			jQuery(this).css("border","1px dashed black");
			jQuery(this).css("padding","19");
		    },function(){
			jQuery(this).css("border","");
			jQuery(this).css("padding","20");
		    })';
		}
		#hover content div (close)
		
		#hover function_button: add contact (only activated if its not the owner. see div below)(open)
		if($ngo_admin == "no"){
		    echo '
		    jQuery(".function_button").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
			jQuery(this).find(".function_button_popup").fadeIn(200);
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
			jQuery(this).find(".function_button_popup").fadeOut(200);
		    })';
		}
		#hover function_button: add contact (only activated if its not the owner. see div below) (close)
		
		#voluno button hover (open)
		if(1==1){
		    echo '
		    jQuery(".voluno_button").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })';
		}
		#voluno button hover (close)
		
		#edit profile (open)
		if($ngo_admin == "yes"){
		    echo '
		    jQuery(".profile_edit_hover").hover(function(){
			jQuery(this).find(".profile_edit_tooltip").show();
		    },function(){
			jQuery(this).find(".profile_edit_tooltip").hide();
		    });
		    jQuery(".edit_profile_text_button").click(function(){
			jQuery(".profile_page_edit").show();
			jQuery(".profile_page_editable").hide();
			jQuery(".profile_edit_tooltip").not(".profile_pic_tooltip").css("z-index","-500");
		    });
		    jQuery(".edit_profile_text_cancel").click(function(){
			jQuery(".profile_page_edit").hide();
			jQuery(".profile_page_editable").show();
			jQuery(".profile_edit_tooltip").css("z-index","500");
		    });
		    jQuery(".edit_profile_text_save").click(function(){
			jQuery(".update_profile").submit();
		    });
		    jQuery(".profile_content_div").hover(function(){
			jQuery(this).find(".edit_profile_text_button").show();
		    },function(){
			jQuery(this).find(".edit_profile_text_button").hide();
		    })';
		    
		    #if updated email address already exists in database
		    if($email_already_exists_in_database == "yes"){
			echo '
			alert("'.
			    'Unfortunately, we were unable to update your primary email address. '.
			    'The reason for this is that the email address you provided already exists in our database.'.
			    '\n\nFor security and quality control reasons, we can only allow one account per person. '.
			    'If you have another account and lost the passwort, please contact our support via info@voluno.org.");';
		    }
		    #if updated email address already exists in database
		    
		    #if updated email address already exists in database
		    if($alt_email_already_exists_in_database == "yes"){
			echo '
			alert("'.
			    'Unfortunately, we were unable to update your alternative email address. '.
			    'The reason for this is that the email address you provided already exists in our database.'.
			    '\n\nFor security and quality control reasons, we can only allow one account per person. '.
			    'If you have another account and lost the passwort, please contact our support via info@voluno.org.");';
		    }
		    #if updated email address already exists in database
		    
		    #alt email: please look at confirm email (open)
		    if($alt_email_please_confirm_via_email == "yes"){
			echo '
			alert("'.
			    'For security reasons, you need to confirm that the alternative email address you entered actually belongs to you.\n'.
			    'Please do so by visiting the link in the email we just sent you.\n\nThanks!");';
		    }
		    #alt email: please look at confirm email (close)
		    
		    #primary email: please look at confirm email (open)
		    if($primary_email_please_confirm_via_email == "yes"){
			echo '
			alert("'.
			    'For security reasons, you need to confirm that the primary email address you entered actually belongs to you.\n'.
			    'Please do so by visiting the link in the email we just sent you.\n\nThanks!");';
		    }
		    #primary email: please look at confirm email (close)
		    
		    #cv update and delete (open)
		    if(1==1){
			
			#cv delete (open)
			if(!empty($profile_page_owner_row->cv)){ //only relevant if a cv already exists
			    
			    echo '
			    jQuery(".current_cv_file").hover(function(){
				jQuery(this).css("background-color","#FFF5E0");
				jQuery(this).css("cursor","pointer");
			    },function(){
				jQuery(this).css("background-color","#FFC977");
				jQuery(this).css("cursor","default");
			    });
			    
			    jQuery(".current_cv_file").click(function(){
				jQuery(".delete_cv_view_current_file span").trigger("click");
			    });
			    
			    jQuery(".delete_cv_button").click(function(){
				deleteCvAreYouSure = confirm("'.
				'Your current CV is:\n\n'.$profile_page_owner_row->cv.'\n\nAre you sure you want to delete this file?");
				if(deleteCvAreYouSure == true){
				    jQuery(".delete_cv_hidden_form_field").val("true");
				    jQuery(".update_profile").submit();
				}
			    });
			    ';
			}
			#cv delete (close)
			
			#cv update (open)
			if(1==1){
			    echo '
			    jQuery(".select_cv_input_hidden").change(function(){
				jQuery(".select_cv_input_shown").val(jQuery(this).val());
				jQuery(".select_cv_input_hidden_check").val("true");
			    });
			    jQuery(".select_cv_activation_area").click(function(){
				jQuery(".select_cv_input_hidden").click();
			    });
			    ';
			}
			#cv update (close)
			
		    }
		    #cv update and delete (close)
		    
		}
		#edit profile (close)
		
		#cv upload error message + show cv div (open)
		if(1==1){
		    echo '
		    jQuery(".show_cv_div_button").click(function(){
			jQuery(".cv_div").fadeIn(300);
		    });';
		    
		    if($is_cv_pdf_file_check == "no"){
			echo '
			alert("The file you uploaded is not a valid PDF document. Please only upload PD");';
		    }
		    
		}
		#cv upload error message + show cv div (close)
		
	    echo '
	    });
	</script>';
    }
    #jquery (close)
   
    #style (open)
    if(1==1){
        echo '
        <style>';
            
            #ngo logo (open)
            if(1==1){
                echo '
                .ngo_logo{
                    padding:10px;
                    box-shadow: 0px 0px 3px grey;
                }';
            }
            #ngo logo (close)
            
          echo '
          .profile_content_div{
             border-radius:20px;
             padding:20px;
             margin-bottom:20px;
          }
          
          .profile_content_div h4{
             display:inline;
          }
          
          .function_button{
             cursor:pointer;
          }
          
          .voluno_button, .profile_edit_tooltip, .edit_profile_text_cancel, .edit_profile_text_save{
             cursor:pointer;
             background-color:#8B0000 !important;
             margin-top:5px;
             color:#fff;
             padding:10px;
             border-radius:250px;
             font-weight:bold;
             text-align: center;
             color:#fff;
             -webkit-touch-callout: none;
             -webkit-user-select: none;
             -khtml-user-select: none;
             -moz-user-select: none;
             -ms-user-select: none;
             user-select: none;
          }
          .voluno_button:hover, .profile_edit_tooltip:hover, .edit_profile_text_cancel:hover, .edit_profile_text_save:hover{
             background-color: #D6341D !important;
          } 
          
          .content_div_title_td{
             font-weight:bold;
             text-align:right;
             padding-right:20px !important;
          }
          
          .content_div_content_td{
             text-align:justify;
          }';
          
          #edit profile (open)
          if($ngo_admin == "yes"){
             echo '
             .profile_edit_tooltip{
                position:absolute;
                display:none;
             }
             
             .profile_page_edit{
                display:none;
                text-align:center;
             }
             .profile_page_editable{
                
             }
             
             .edit_profile_text_cancel{
                
             }
             ';
          }
          #edit profile (close)
          
       echo '
       </style>';
    }
    #style (close)
   
    #content (open)
    if(1==1){
       
        #img processing function executions (open)
        if(1==1){
              
            #function-image-processing.php --> edit img
                #thematic only
                    $function_propic__type = "thematic";
                    $function_propic__original_img_name = "edit_white.png";
                #all
                    $function_propic__geometry = array(30,30); //optional, if e.g. only width: 300, NULL; vice versa
                include('#function-image-processing.php');
                $function_propic_edit_ngo_img_path_full = $function_propic;
        }
        #img processing function executions (close)
        
        #preparation (open)
        if(empty($ngo_row->ngo_name_sub)){
            $ngo_name_short_or_long = $ngo_row->ngo_name;
        }else{
            $ngo_name_short_or_long = $ngo_row->ngo_name.' - '.$ngo_row->ngo_name_sub;
        }
        #preparation (close)
        
        #function-personal-pages.php (v1.0) (open)
        if(1==1){
            $function_pers_pages_id = 5;
            $function_pers_pages_active_page = "Profile";
            include('#function-personal-pages.php');
            echo $function_pers_pages;
            #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
        }
        #function-personal-pages.php (v1.0) (close)
        
        #open form (open)
        if($ngo_admin == "yes"){
            echo '
            <form
                action="'.add_query_arg(NULL,NULL).'"
                method="post"
                name="update_profile"
                class="update_profile"
                enctype="multipart/form-data"
            >';
        }
        #open form (close)
            
            #table (open)
            if(1==1){
                echo '
                <table>
                    <tr>
                        <td style="width:70%;padding-right:20px;">';
                            
                            #left side of container (open)
                            if(1==1){
                                
                                #title (open)
                                if(1==1){
                                    
									#function-breadcrums.php (v3.0) (open)
									if(1==1){
										
										#documentation (open)
										if(1==1){
											
											// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
											
										}
										#documentation (close)
										
										#input (open)
										if(1==1){
											
											$function_breadcrums['input_array'] = [
												'left' => [
													[
														'text' => 'View all development organizations',
														'link' => get_permalink()
													]
												]
											];
											// Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
											
										}
										#input (close)
										
										include('#function-breadcrums.php');
										
										#output (open)
										if(1==1){
											
											#echo $function_breadcrums['breadcrums']; // Output variable.
											
										}
										#output (close)
										
									}
									#function-breadcrums.php (v3.0) (close)
									
                                    echo
									$function_breadcrums['breadcrums'].'
                                    <div style="text-align:center;margin-bottom:30px;">
                                        <h1 style="display:inline;">
                                            '.$ngo_row->ngo_name.'
                                        </h1>';
                                        if(!empty($ngo_row->ngo_name_sub)){
                                            echo '
                                            <br>
                                            <h3 style="display:inline;">
                                                '.$ngo_row->ngo_name_sub.'
                                            </h3>';
                                        }
                                    echo '
                                    </div>';
                                }
                                #title (close)
                                
                                #content div: personal information (open)
                                if(1==1){
                                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">';
                                    
                                        #edit tooltip (get image [only once] and create div) (open)
                                        if($ngo_admin == "yes"){
                                            echo '
                                            <div
                                                class="profile_edit_tooltip edit_profile_text_button"
                                                style="margin:-40px 0px 0px 520px;" title="Edit profile text">';
                                                echo '
                                                <img src="'.$function_propic_edit_ngo_img_path_full.'">
                                            </div>';
                                        }
                                        #edit tooltip (get image [only once] and create div) (open)
                                      
                                        echo '
                                        <h4>
                                            Description
                                        </h4>
                                        <table>';
                                         
                                            #preparation of edit fields for array (open)
                                            if($ngo_admin == "yes"){
                                               
                                                #description (open)
                                                if(1==1){
                                                    $input_description =
                                                        '<textarea '.
                                                            'name="update_profile_description" '.
                                                            'placeholder="Present your organization in one '.
                                                                        'sentence. For example: We are ... and we are trying to ...'.
                                                                        ' so that ... ." '.
                                                            'style="width:100%;height:5em;resize:vertical;" '.
                                                        '>'.$ngo_row->ngo_short_description.'</textarea>';
                                                }
                                                #description (close)
                                                
                                                #mission (open)
                                                if(1==1){
                                                    $input_mission =
                                                        '<textarea '.
                                                            'name="update_profile_mission" '.
                                                            'placeholder="What is the aim of your organiztation? '.
                                                                        'What are you trying to achieve, in the near and in the far future? '.
                                                                        'What strategy are you using to accomplish your goals? '.
                                                                        'In short: Expain what your organization is today and what you '.
                                                                        'Plan to achieve in the future." '.
                                                            'style="width:100%;height:5em;resize:vertical;" '.
                                                        '>'.$ngo_row->ngo_mission.'</textarea>';
                                                }
                                                #mission (close)
                                                
                                                #history (open)
                                                if(1==1){
                                                    $input_history =
                                                        '<textarea '.
                                                            'name="update_profile_history" '.
                                                            'placeholder="How did your organization get where it is today? '.
                                                                        'How were you founded? How were the first years? What did you '.
                                                                        'change until today and why? Which problems did you overcome '.
                                                                        'and which ones are still present?" '.
                                                            'style="width:100%;height:5em;resize:vertical;" '.
                                                        '>'.$ngo_row->ngo_history.'</textarea>';
                                                }
                                                #history (close)
                                                
                                                #impact area (open)
                                                if(1==1){
                                                    
                                                    $input_impact_area = '<select name="update_profile_impact_area">';
                                                    
                                                    #mysql query - world (open)
                                                    if(1==1){
                                                        $impact_area_world = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                                FROM fi4l3fg_voluno_list_sorting
                                                                                                WHERE voluno_liso_item_type = "country"
                                                                                                    AND voluno_liso_item_level = "1 - world"');
                                                        $impact_area_world = $GLOBALS['wpdb']->get_results($impact_area_world);
                                                    }
                                                    #mysql query - world  (close)
                                                    
                                                    #loop - world (open)
                                                    for($q1=0;$q1<count($impact_area_world);$q1++){
                                                        
                                                        #content - world  (open)
                                                        if(1==1){
                                                            if($ngo_row->ngo_geographic_impact == $impact_area_world[$q1]->voluno_liso_item_id){
                                                                $selected = 'selected="selected"';
                                                            }else{
                                                                $selected = '';
                                                            }
                                                            $input_impact_area =
                                                                $input_impact_area.
                                                                '<option
                                                                    style="font-weight:bold;"
                                                                    '.$selected.'
                                                                    value="'.$impact_area_world[$q1]->voluno_liso_item_id.'"
                                                                >
                                                                    Global: '.$impact_area_world[$q1]->voluno_liso_item_name.'
                                                                </option>';
                                                        }
                                                        #content - world  (close)
                                                            
                                                        #mysql query - continents (open)
                                                        if(1==1){
                                                            
                                                            $impact_area_continents = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                                    FROM fi4l3fg_voluno_list_sorting
                                                                                                    WHERE voluno_liso_item_type = "country"
                                                                                                        AND voluno_liso_parent_l7 = %d;'
                                                                                                    ,$impact_area_world[$q1]->voluno_liso_item_id);
                                                            $impact_area_continents = $GLOBALS['wpdb']->get_results($impact_area_continents);
                                                        }
                                                        #mysql query - continents  (close)
                                                        
                                                        #loop - continents (open)
                                                        for($q2=0;$q2<count($impact_area_continents);$q2++){
                                                            
                                                            #content - continents (open)
                                                            if(1==1){
                                                                if($ngo_row->ngo_geographic_impact ==
                                                                   $impact_area_continents[$q2]->voluno_liso_item_id){
                                                                    $selected = 'selected="selected"';
                                                                }else{
                                                                    $selected = '';
                                                                }
                                                                $input_impact_area =
                                                                    $input_impact_area.
                                                                    '<option
                                                                        style="font-weight:bold;font-style:italic;padding-left:10px;"
                                                                        '.$selected.'
                                                                        value="'.$impact_area_continents[$q2]->voluno_liso_item_id.'"
                                                                    >
                                                                        Continent: '.$impact_area_continents[$q2]->voluno_liso_item_name.'
                                                                    </option>';
                                                            }
                                                            #content - continents (close)
                                                            
                                                            #mysql query - regions (open)
                                                            if(1==1){
                                                                
                                                                $impact_area_regions = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                                        FROM fi4l3fg_voluno_list_sorting
                                                                                                        WHERE voluno_liso_item_type = "country"
                                                                                                            AND voluno_liso_parent_l7 = %d;'
                                                                                                        ,$impact_area_continents[$q2]->voluno_liso_item_id);
                                                                $impact_area_regions = $GLOBALS['wpdb']->get_results($impact_area_regions);
                                                            }
                                                            #mysql query - regions  (close)
                                                            
                                                            #loop - regions (open)
                                                            for($q3=0;$q3<count($impact_area_regions);$q3++){
                                                                
                                                                #content - regions (open)
                                                                if(1==1){
                                                                    if($ngo_row->ngo_geographic_impact ==
                                                                       $impact_area_regions[$q3]->voluno_liso_item_id){
                                                                        $selected = 'selected="selected"';
                                                                    }else{
                                                                        $selected = '';
                                                                    }
                                                                    $input_impact_area =
                                                                        $input_impact_area.
                                                                        '<option
                                                                            style="font-weight:bold;padding-left:20px;"
                                                                            '.$selected.'
                                                                            value="'.$impact_area_regions[$q3]->voluno_liso_item_id.'"
                                                                        >
                                                                            Region: '.$impact_area_regions[$q3]->voluno_liso_item_name.'
                                                                        </option>';
                                                                }
                                                                #content - regions (close)
                                                                
                                                                #mysql query - countries (open)
                                                                if(1==1){
                                                                    
                                                                    $impact_area_countries = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                                            FROM fi4l3fg_voluno_list_sorting
                                                                                                            WHERE voluno_liso_item_type = "country"
                                                                                                                AND voluno_liso_parent_l7 = %d;'
                                                                                                            ,$impact_area_regions[$q3]->voluno_liso_item_id);
                                                                    $impact_area_countries = $GLOBALS['wpdb']->get_results($impact_area_countries);
                                                                }
                                                                #mysql query - countries  (close)
                                                                
                                                                #loop - countries (open)
                                                                for($q4=0;$q4<count($impact_area_countries);$q4++){
                                                                    
                                                                    #content - countries (open)
                                                                    if(1==1){
                                                                        if($ngo_row->ngo_geographic_impact ==
                                                                           $impact_area_countries[$q4]->voluno_liso_item_id){
                                                                            $selected = 'selected="selected"';
                                                                        }else{
                                                                            $selected = '';
                                                                        }
                                                                        $input_impact_area =
                                                                            $input_impact_area.
                                                                            '<option
                                                                                style="padding-left:30px;"
                                                                                '.$selected.'
                                                                                value="'.$impact_area_countries[$q4]->voluno_liso_item_id.'"
                                                                            >
                                                                                '.$impact_area_countries[$q4]->voluno_liso_item_name.'
                                                                            </option>';
                                                                    }
                                                                    #content - countries (close)
                                                                    
                                                                }
                                                                #loop - countries (close)
                                                                
                                                            }
                                                            #loop - regions (close)
                                                            
                                                        }
                                                        #loop - continents (close)
                                                        
                                                    }
                                                    #loop - world (close)
                                                    
                                                    $input_impact_area = $input_impact_area.'</select>';
                                                    
                                                }
                                                #impact area (close)
                                                
                                                #staff num (open)
                                                if(1==1){
                                                    $input_staff_num = 
                                                        '<input
                                                            type="text"
                                                            value="'.$ngo_row->ngo_staff_num.'"
                                                            name="update_profile_staff_num"
                                                        >';
                                                }
                                                #staff num (close)
                                                
                                                #development area (open)
                                                if(1==1){
                                                    #selected (open)
                                                    
                                                    $dev_area_array = array(
                                                            array(      $development_topics_results[0]->ngo_prop_type_id,   $input_dev_array1),
                                                            array(      $development_topics_results[1]->ngo_prop_type_id,   $input_dev_array2),
                                                            array(      $development_topics_results[2]->ngo_prop_type_id,   $input_dev_array3),
                                                            array(      $development_topics_results[3]->ngo_prop_type_id,   $input_dev_array4)
                                                        );
                                                    
                                                    for($b=0;$b<count($dev_area_array);$b++){
                                                        $dev_area_array[$b][1] = '
                                                            <div style="margin-bottom:5px;">
                                                            <select name="update_profile_development_area[]">';
                                                        
                                                        #mysql query - level1 (open)
                                                        if($b==0){
                                                            $impact_area_level1 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                                    FROM fi4l3fg_voluno_lists_dev_topics
                                                                                                    WHERE dev_topic_parent = "0"
                                                                                                    ORDER BY dev_topic_name ASC;');
                                                            $impact_area_level1 = $GLOBALS['wpdb']->get_results($impact_area_level1);
                                                        }
                                                        #mysql query - level1  (close)
                                                        
                                                        #loop - level1 (open)
                                                        for($q1=0;$q1<count($impact_area_level1);$q1++){
                                                            
                                                            #content - level1  (open)
                                                            if(1==1){
                                                                if($dev_area_array[$b][0] == $impact_area_level1[$q1]->dev_topic_id){
                                                                    $selected = 'selected="selected"';
                                                                }else{
                                                                    $selected = '';
                                                                }
                                                                $dev_area_array[$b][1] =
                                                                    $dev_area_array[$b][1].
                                                                    '<option
                                                                        style="font-weight:bold;"
                                                                        '.$selected.'
                                                                        value="'.$impact_area_level1[$q1]->dev_topic_id.'"
                                                                    >
                                                                        '.$impact_area_level1[$q1]->dev_topic_name.'
                                                                    </option>';
                                                            }
                                                            #content - level1  (close)
                                                                
                                                            #mysql query - level2 (open)
                                                            if(1==1){
                                                                
                                                                $impact_area_level2 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                                        FROM fi4l3fg_voluno_lists_dev_topics
                                                                                                        WHERE dev_topic_parent = %d
                                                                                                        ORDER BY dev_topic_name ASC;'
                                                                                                        ,$impact_area_level1[$q1]->dev_topic_id);
                                                                $impact_area_level2 = $GLOBALS['wpdb']->get_results($impact_area_level2);
                                                            }
                                                            #mysql query - level2  (close)
                                                            
                                                            #loop - level2 (open)
                                                            for($q2=0;$q2<count($impact_area_level2);$q2++){
                                                                
                                                                #content - level2 (open)
                                                                if(1==1){
                                                                    if($dev_area_array[$b][0] ==
                                                                       $impact_area_level2[$q2]->dev_topic_id){
                                                                        $selected = 'selected="selected"';
                                                                    }else{
                                                                        $selected = '';
                                                                    }
                                                                    $dev_area_array[$b][1] =
                                                                        $dev_area_array[$b][1].
                                                                        '<option
                                                                            style="padding-left:30px;"
                                                                            '.$selected.'
                                                                            value="'.$impact_area_level2[$q2]->dev_topic_id.'"
                                                                        >
                                                                            '.$impact_area_level2[$q2]->dev_topic_name.'
                                                                        </option>';
                                                                }
                                                                #content - level2 (close)
                                                                
                                                                #mysql query - level3 (open)
                                                                if($b==0){
                                                                    
                                                                    $impact_area_level3 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                                            FROM fi4l3fg_voluno_lists_dev_topics
                                                                                                            WHERE dev_topic_parent = %d
                                                                                                            ORDER BY dev_topic_name ASC;'
                                                                                                            ,$impact_area_level2[$q2]->dev_topic_id);
                                                                    $impact_area_level3 = $GLOBALS['wpdb']->get_results($impact_area_level3);
                                                                }
                                                                #mysql query - level3  (close)
                                                                
                                                                #loop - level3 (open)
                                                                for($q3=0;$q3<count($impact_area_level3);$q3++){
                                                                    
                                                                    #content - level3 (open)
                                                                    if(1==1){
                                                                        if($dev_area_array[$b][0] ==
                                                                           $impact_area_level3[$q3]->dev_topic_id){
                                                                            $selected = 'selected="selected"';
                                                                        }else{
                                                                            $selected = '';
                                                                        }
                                                                        $dev_area_array[$b][1] =
                                                                            $dev_area_array[$b][1].
                                                                            '<option
                                                                                style="padding-left:50px;font-style:italic;color:grey;"
                                                                                '.$selected.'
                                                                                value="'.$impact_area_level3[$q3]->dev_topic_id.'"
                                                                            >
                                                                                '.$impact_area_level3[$q3]->dev_topic_name.'
                                                                            </option>';
                                                                    }
                                                                    #content - level3 (close)
                                                                    
                                                                }
                                                                #loop - level3 (close)
                                                                
                                                            }
                                                            #loop - level2 (close)
                                                            
                                                        }
                                                        #loop - level1 (close)
                                                    
                                                    $dev_area_array[$b][1] = $dev_area_array[$b][1].'</select></div>';
                                                    
                                                    $input_dev_area = $input_dev_area.$dev_area_array[$b][1];
                                                    
                                                    }
                                                    
                                                }
                                                #development area (close)
                                                
                                                #date founded (open)
                                                if(1==1){
                                                   
                                                    #if no founded date selected yet (open)
                                                    if(1==1){
                                                        if($ngo_row->ngo_date_founded == "0000-00-00"){
                                                           $selected_nothing = 'selected="selected"';
                                                        }else{
                                                           $selected_nothing = '';
                                                        }
                                                    }
                                                    #if no founded date selected yet (close)
                                                    
                                                    #day (open)
                                                    if(1==1){
                                                        $input_date_founded = '<select name="update_profile_date_founded_day">
                                                            <option value="" '.$selected_nothing.'></option>';
                                                            for($x_day=1;$x_day<=31;$x_day++){
                                                                if(date("j",strtotime($ngo_row->ngo_date_founded))
                                                                   == $x_day AND empty($selected_nothing)){
                                                                    $selected = 'selected="selected"';
                                                                }else{
                                                                    $selected = '';
                                                                }
                                                                $input_date_founded =
                                                                    $input_date_founded.'
                                                                    <option '.$selected.' value="'.$x_day.'">
                                                                        '.$x_day.'
                                                                    </option>';
                                                            }
                                                        $input_date_founded = $input_date_founded.'</select>';
                                                    }
                                                    #day (open)
                                                    
                                                    #month (open)
                                                    if(1==1){
                                                        $months_array = array('January','February','March','April','May','June',
                                                                      'July','August','September','October','November','December');
                                                        $input_date_founded = $input_date_founded.'<select name="update_profile_date_founded_month">
                                                            <option value="" '.$selected_nothing.'></option>';
                                                            for($x_month=1;$x_month<=12;$x_month++){
                                                                if(date("n",strtotime($ngo_row->ngo_date_founded))
                                                                   == $x_month AND empty($selected_nothing)){
                                                                    $selected = 'selected="selected"';
                                                                }else{
                                                                    $selected = '';
                                                                }
                                                                $input_date_founded =
                                                                    $input_date_founded.'
                                                                    <option '.$selected.' value="'.$x_month.'">
                                                                        '.$months_array[$x_month-1].'
                                                                    </option>';
                                                            }
                                                        $input_date_founded = $input_date_founded.'</select>';
                                                    }
                                                    #month (close)
                                                        
                                                    #year (open)
                                                    if(1==1){
                                                        $input_date_founded = $input_date_founded.'<select name="update_profile_date_founded_year">
                                                            <option value="" '.$selected_nothing.'></option>';
                                                            for($x_year=date("Y");$x_year>=1900;$x_year--){
                                                                if(date("Y",strtotime($ngo_row->ngo_date_founded))
                                                                   == $x_year AND empty($selected_nothing)){
                                                                    $selected = 'selected="selected"';
                                                                }else{
                                                                    $selected = '';
                                                                }
                                                                $input_date_founded =
                                                                    $input_date_founded.'
                                                                    <option '.$selected.' value="'.$x_year.'">
                                                                        '.$x_year.'
                                                                    </option>';
                                                            }
                                                        $input_date_founded = $input_date_founded.'</select>';
                                                    }
                                                    #year (close)
                                                    
                                                }
                                                #date founded (close)
                                               
                                            }
                                            #preparation of edit fields for array (close)
                                         
                                            #prepare non-edit view (open)
                                            if(1==1){
                                               
                                                $description = '<p>'.$ngo_row->ngo_short_description.'/<p>';
                                                
                                                #mission (open)
                                                if(1==1){
                                                    unset($mission);
                                                    if(!empty($ngo_row->ngo_mission)){
                                                        #function-only-first-x-symbols.php
                                                            $function_only_first_x_symbols = $ngo_row->ngo_mission; #content
                                                            $function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
                                                            $function_only_first_x_symbols_variable = "yes";
                                                            include('#function-only-first-x-symbols.php');
                                                        $mission = '<p>'.$function_only_first_x_symbols.'</p>';
                                                    }
                                                }
                                                #mission (close)
                                                
                                                #history (open)
                                                if(1==1){
                                                    unset($history);
                                                    if(!empty($ngo_row->ngo_history)){
                                                        #function-only-first-x-symbols.php
                                                            $function_only_first_x_symbols = $ngo_row->ngo_history; #content
                                                            $function_only_first_x_symbols_num = 100; #optional, number of symbols, default is 100
                                                            $function_only_first_x_symbols_variable = "yes";
                                                            include('#function-only-first-x-symbols.php');
                                                        $history = '<p>'.$function_only_first_x_symbols.'</p>';
                                                    }
                                                }
                                                #history (close)
                                                
                                                #date founded (open)
                                                if(1==1){
                                                    unset($date_founded);
                                                    if($ngo_row->ngo_date_founded != "0000-00-00 00:00:00"){
                                                        #function-timezone.php
                                                          $function_timezone = $ngo_row->ngo_date_founded;
                                                          $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
                                                          //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                          //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                          include('#function-timezone.php');
                                                          #output:
                                                        $date_founded = $function_timezone;
                                                    }
                                                }
                                                #date founded (close)
                                               
                                                #member since (open)
                                                if(1==1){
                                                    unset($member_since);
                                                    if($ngo_row->ngo_date_founded != "0000-00-00"){
                                                        #function-timezone.php
                                                          $function_timezone = $ngo_row->ngo_date_created;
                                                          $function_timezone_format = "date (short)"; //default: datetime (weekday long hour min sec)
                                                          //"datetime (weekday long hour min sec)","date (long)","date (short)","date (weekday long)",
                                                          //"date (weekday short)","time (hour min sec)","time (hour min)"
                                                          include('#function-timezone.php');
                                                          #output:
                                                        $member_since = $function_timezone;
                                                    }
                                                }
                                                #member since (close)
                                               
                                            }
                                            #prepare non-edit view (close)
                                         
                                            #array (open)
                                            if(1==1){
                                               $content_div_pers_info = array(
                                                  array("In one sentence",        $description,                         $input_description),
                                                  array("Mission",                $mission,                             $input_mission),
                                                  array("History",                $history,                             $input_history),
                                                  array("Impact area",            $ngo_row->ngo_geographic_impact_name, $input_impact_area),
                                                  array("Staff number",           $ngo_row->ngo_staff_num,              $input_staff_num),
                                                  array("Development area(s)",    $development_area,                    $input_dev_area),
                                                  array("Founded",                $date_founded,                        $input_date_founded),
                                                  array("Joined Voluno",          $member_since,                        "")
                                               );
                                            }
                                            #array (close)
                                            
                                            #not edit area (open)
                                            for($index_a=0;$index_a<count($content_div_pers_info);$index_a++){
                                                if(!empty($content_div_pers_info[$index_a][1])){
                                                    echo '
                                                    <tr class="profile_page_editable">
                                                        <td class="content_div_title_td" style="width:130px;">
                                                            '.$content_div_pers_info[$index_a][0].':
                                                        </td>
                                                        <td colspan="'.$colspan.'" class="content_div_content_td">';
                                                            if($ngo_admin == "yes"){
                                                                echo
                                                                '<span class="profile_page_editable">';
                                                            }
                                                                echo 
                                                                $content_div_pers_info[$index_a][1];
                                                            if($ngo_admin == "yes"){
                                                                echo
                                                                '</span>';
                                                            }
                                                        echo '
                                                        </td>
                                                    </tr>';
                                                }
                                            }
                                            #not edit area (close)
                                            
                                            #edit area (open)
                                            if($ngo_admin == "yes"){
                                                for($index_a=0;$index_a<count($content_div_pers_info);$index_a++){
                                                    if(!empty($content_div_pers_info[$index_a][2])){
                                                        echo '
                                                        <tr class="profile_page_edit">
                                                            <td class="content_div_title_td">
                                                                '.$content_div_pers_info[$index_a][0].':
                                                            </td>
                                                            <td class="content_div_content_td">
                                                                '.$content_div_pers_info[$index_a][2].'
                                                            </td>
                                                        </tr>';
                                                    }
                                                }
                                                echo '
                                                <tr class="profile_page_edit">
                                                    <td colspan="2">
                                                        <table style="margin:auto;">
                                                            <tr>
                                                                <td style="text-align:center;">
                                                                    <div
                                                                        class="edit_profile_text_cancel profile_page_edit"
                                                                        style="width:60px;margin-left:auto;margin-right:10px;"
                                                                    >
                                                                        Cancel
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="edit_profile_text_save profile_page_edit"
                                                                        style="width:60px;margin-right:auto;margin-left:10px;"
                                                                    >
                                                                        Save
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>';
                                            }
                                            #edit area (close)
                                         
                                        echo '
                                        </table>
                                    </div>';
                                }
                                #content div: personal information (close)
                                
                                #content div: voluno record (open) #dome
                                if(2==1){
                                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">
                                        <h4>
                                            <a
                                                href="'.get_permalink(794).'?subsection=12"
                                                title="Click to visit the Orientation Guide page about reputation and experience"
                                                target="_blank"
                                            >
                                                Total staff reputation and experience
                                            </a>
                                        </h4>';
					
                                        #prepare record data (open)
                                        if(1==1){
                                            $ts_reputation_counter = 0;
                                            for($m=0;$m<count($all_affiliates_results);$m++){
                                                if($all_affiliates_results[$m]->record_reputation_ratings >= 3){ //only rate where ratings exist!
                                                $ts_reputation       = $ts_reputation       + $all_affiliates_results[$m]->record_sum_reputation;
                                                $ts_quality_of_work  = $ts_quality_of_work  + $all_affiliates_results[$m]->record_sum_quality_of_work;
                                                $ts_respect_of_deadl = $ts_respect_of_deadl + $all_affiliates_results[$m]->record_sum_respect_of_deadlines;
                                                $ts_com_quantity     = $ts_com_quantity     + $all_affiliates_results[$m]->record_sum_communication_quantity;
                                                $ts_com_quality      = $ts_com_quality      + $all_affiliates_results[$m]->record_sum_communiocation_quality;
                                                $ts_politeness       = $ts_politeness       + $all_affiliates_results[$m]->record_sum_politeness;
                                                $ts_reputation_counter++; //counts members in organization with ratings
                                                }
                                                
                                                if($m + 1 == count($all_affiliates_results)){ //takes the average of the sums of all ratings
                                                    $ts_reputation       = $ts_reputation       / $ts_reputation_counter;
                                                    $ts_quality_of_work  = $ts_quality_of_work  / $ts_reputation_counter;
                                                    $ts_respect_of_deadl = $ts_respect_of_deadl / $ts_reputation_counter;
                                                    $ts_com_quantity     = $ts_com_quantity     / $ts_reputation_counter;
                                                    $ts_com_quality      = $ts_com_quality      / $ts_reputation_counter;
                                                    $ts_politeness       = $ts_politeness       / $ts_reputation_counter;
                                                }
                                                
                                                $ts_experience       = $ts_experience       + $all_affiliates_results[$m]->record_sum_experience;
                                                $ts_messages_sent    = $ts_messages_sent    + $all_affiliates_results[$m]->record_sum_messages_sent;
                                                $ts_forum_posts      = $ts_forum_posts      + $all_affiliates_results[$m]->record_sum_forum_posts;
                                                $ts_tasks_created    = $ts_tasks_created    + $all_affiliates_results[$m]->record_sum_tasks_created;
                                                $ts_tasks_completed  = $ts_tasks_completed  + $all_affiliates_results[$m]->record_sum_tasks_completed;
                                                $ts_trainings_given  = $ts_trainings_given  + $all_affiliates_results[$m]->record_sum_trainings_given;
                                            }
                                            
                                            if($ts_reputation_counter == 0){//if there are no ratings yet
                                                $ts_reputation       = '<span style="color:grey;font-style:italic;">No rating yet.</span>';
                                                $ts_quality_of_work  = $ts_reputation;
                                                $ts_respect_of_deadl = $ts_reputation;
                                                $ts_com_quantity     = $ts_reputation;
                                                $ts_com_quality      = $ts_reputation;
                                                $ts_politeness       = $ts_reputation;
                                            }else{
                                                $ts_reputation = number_format($ts_reputation,2);
                                                $ts_quality_of_work = number_format($ts_quality_of_work,2);
                                                $ts_respect_of_deadl = number_format($ts_respect_of_deadl,2);
                                                $ts_com_quantity = number_format($ts_com_quantity,2);
                                                $ts_com_quality = number_format($ts_com_quality,2);
                                                $ts_politeness = number_format($ts_politeness,2);
                                            }
                                            
                                            $reputation_array = array(
                                                array(  'Total reputation',       $ts_reputation),
                                                array(  'Quality of work',        $ts_quality_of_work),
                                                array(  'Respect of deadlines',   $ts_respect_of_deadl),
                                                array(  'Communication quantity', $ts_com_quantity),
                                                array(  'Communication quality',  $ts_com_quality),
                                                array(  'Politeness',             $ts_politeness)
                                            );
                                            $experience_array = array(
                                                array(  'Total experience',       intval($ts_experience)),
                                                array(  'Messages sent',          intval($ts_messages_sent)),
                                                array(  'Forum posts',            intval($ts_forum_posts)),
                                                array(  'Tasks created',          intval($ts_tasks_created)),
                                                array(  'Tasks completed',        intval($ts_tasks_completed)),
                                                array(  'Trainings given',        intval($ts_trainings_given))
                                            );
                                        }
                                        #prepare record data (close)
                                        
                                        #display table (open)
                                        if(1==1){
                                            
                                            echo '
                                            <table>';
                                                for($index_b=0;$index_b<max(count($reputation_array),count($experience_array));$index_b++){
                                                    #bold title and link to explanation (open)
                                                    if($index_b == 0){
                                                        $style = 'style="font-weight:bold;"';
                                                    }else{
                                                        $style = "";
                                                    }
                                                    #bold title and link to explanation (close)
                                                    $title_width = 30;
                                                    $rating_width = 50-$title_width;
                                                    echo '
                                                    <tr '.$style.'>
                                                        <td style="width:'.$title_width.'%;">
                                                            '.$reputation_array[$index_b][0].':
                                                        </td>
                                                        <td style="width:'.$rating_width.'%;">
                                                            '.$reputation_array[$index_b][1].'
                                                        </td>
                                                        <td style="width:'.$title_width.'%;">
                                                            '.$experience_array[$index_b][0].':
                                                        </td>
                                                        <td style="width:'.$rating_width.'%;">
                                                            '.$experience_array[$index_b][1].'
                                                        </td>
                                                    </tr>';
                                                }
                                            echo '
                                            </table>';
                                        }
                                        #display table (close)
                                        
                                    echo '
                                    </div>';
                                }
                                #content div: voluno record (close)
                                
                                #content div: tasks (open)
                                if(1==1){
				    
				    #preparation (open)
				    if(1==1){
					
                                        #function-table-of-god.php (v1.0) (open)
                                        if(1==1){
                                            
                                            #data preparation (open)
                                            if(1==1){
                                                
                                                #Please choose a name for your table like "task mycurrent volunteer"
                                                    $table_of_god_name = "ngo tasks"; //used twice: in projects and profile
                                                    $table_of_god_id = ""; //this is combined with the name to form a unique id, e.g. per forum disucssion. default: empty
                                                    #$table_of_god__number_of_all_results = 3; //if given, user is being asked to relax search restrictions if no results are found 
                                                    
                                                #Please select all possible
                                                    $table_of_god_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                        FROM fi4l3fg_voluno_items_tasks
                                                                                        WHERE task_ngo_id = %d
											    AND task_status = "unassigned";'
                                                                                        ,$ngo_id);
                                                    $table_of_god_results = $GLOBALS['wpdb']->get_results($table_of_god_query);
                                                    
                                                #column transfer (open)
                                                for($x=0;$x<count($table_of_god_results);$x++){
                                                    #strings (up to 10)
                                                        $table_of_god_data_strings1[] = $table_of_god_results[$x]->task_description;
                                                        $table_of_god_data_strings2[] = $table_of_god_results[$x]->task_name;
                                                        $table_of_god_data_strings3[] = $table_of_god_results[$x]->task_status;
                                                        $table_of_god_data_strings4[] = $table_of_god_results[$x]->task_code;
                                                        $table_of_god_data_strings5[] = $table_of_god_results[$x]->task_date_entered;
                                                        $table_of_god_data_strings6[] = $table_of_god_results[$x]->task_deadline;
                                                        $table_of_god_data_strings7[] = $table_of_god_results[$x]->task_assignment_deadline;
                                                        #$table_of_god_data_strings8[] = $table_of_god_results[$x]->;
                                                        #$table_of_god_data_strings9[] = $table_of_god_results[$x]->;
                                                        #$table_of_god_data_strings10[] = $table_of_god_results[$x]->;
                                                    #numbers (up to 10)
                                                        $table_of_god_data_numbers1[] = $table_of_god_results[$x]->task_author_id;
                                                        $table_of_god_data_numbers2[] = $table_of_god_results[$x]->task_ngo_id;
                                                        $table_of_god_data_numbers3[] = $table_of_god_results[$x]->task_project_id;
                                                        $table_of_god_data_numbers4[] = $table_of_god_results[$x]->task_id;
                                                        #$table_of_god_data_numbers5[] = ;
                                                        #$table_of_god_data_numbers6[] = ;
                                                        #$table_of_god_data_numbers7[] = ;
                                                        #$table_of_god_data_numbers8[] = ;
                                                        #$table_of_god_data_numbers9[] = ;
                                                        #$table_of_god_data_numbers10[] = ;
                                                }
                                                #column transfer (close)
                                            }
                                            #data preparation (close)
                                            
                                            #table content (open)
                                            if(1==1){
                                                
                                                #$table_of_god_table_title = "Overview of all currently available trainings"; #the title of the table in h4, together with hide option. to hide title, leave empty.
                                                #$table_of_god_show_on_load = "no"; //default: yes (empty or "yes"). If there's no title, this is automatically set to yes, otherwise pointless.
                                                #$table_of_god__hide_column_titles = "yes"; //default: no = empty
                                                #$table_of_god__thin_pagination = "yes"; //default: no = empty
                                                $table_of_god__variable_only = "yes"; //default: no = empty --> saves everything in $table_of_god
						
                                                #table title array (open)
                                                if(1==1){
                                                $table_of_god_table_array = array(
                                                        #Title of each column
                                                        #the width of each column in the table in percent
                                                        #mysql ordering name     
                                                            array("#",5),
                                                            array("Task",20,"tog_data_string2"),
                                                            array("Description",75),
                                                            #array("Country",15),
                                                            #array("Region",15),
                                                            #array("Category",15),
                                                            #array("Author and organization",15),
                                                            #array("Applicants",15),
                                                            #array("Apply",15)
                                                        );
                                                }
                                                #table title array (close)
                                                
                                                #default ordering
                                                    $table_of_god_default_order_by = "tog_data_string2"; # any of the third position ([2]) in the subarray of $table_of_god_table_array
                                                    $table_of_god_default_order_by_direction = "ASC"; # " ASC"; or " DESC"; (space required)
                                                    
                                                #For the td content, please look at: #function-table-of-god#example.php
                                                
                                                #if empty, show messages
                                                    $table_of_god__no_items_available_message = array(
                                                        'lines' => 'yes' //default: yes
                                                        ,'content' => "There are currently no open tasks available."
                                                    );
                                                
                                            }
                                            #table content (close)
                                            
                                            include("#function-table-of-god.php");
                                        }
                                        #function-table-of-god.php (v1.0) (close)
					
				    }
				    #preparation (close)
				    
				    #content (open)
				    if(1==1){
					echo '
					<div class="profile_content_div" style="background-color:#FFEAB9;text-align:center;">
					    <h4>
						Open Tasks
					    </h4>
					    '.$table_of_god.'
					</div>';
				    }
				    #content (close)
				    
                                }
                                #content div: tasks (close)
                                
                            }
                            #left side of container (close)
                            
                        echo '
                        </td>
                        <td style="text-align:center;">';
                            
                            #right side of container (open)
                            if(1==1){
                               
                                #ngo logo (open)
                                if(1==1){
                                
                                    #function-image-processing
                                       #ngo logo
                                        $function_propic__type = "ngo logo";
                                        $function_propic__ngo_id = $ngo_id;
                                       #all
                                         $function_propic__geometry = array(289,289); //optional, if e.g. only width: 300, NULL; vice versa
                                       include('#function-image-processing.php');
                                    echo '
                                    <div class="profile_edit_hover" style="margin-bottom:20px;">
                                        <img class="ngo_logo voluno_brighter_on_hover" src="'.$function_propic.'"
                                            style="
                                                
                                            "
                                        >';
                                       if($ngo_admin == "yes"){
                                          echo '
                                          <a href="'.get_permalink().'?view_as=edit_profile_picture">
                                             <div class="profile_edit_tooltip profile_pic_tooltip" style="margin-top:-320px;margin-left:270px;" title="Edit profile picture">
                                                <img src="'.$function_propic_edit_ngo_img_path_full.'">
                                             </div>
                                          </a>';
                                       }
                                       echo '
                                    </div>';
                                }
                                #ngo logo (close)
                               
                                #message + add as contact (open) #dome
                                if(2==3 AND $ngo_admin == "no"){ //no need to see this if the user is profile page owner
                                   echo '
                                   <div style="background-color:#FFEAB9;padding:10px;border-radius:25px;margin:20px 0px;">
                                      <table>
                                         <tr style="text-align:center;">
                                            <td style="width:50%">';
                                               $relationship_status_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                FROM fi4l3fg_voluno_personal_settings
                                                                                WHERE pers_settings_general = "contact"
                                                                                   AND pers_settings_general = "not blocked"
                                                                                   AND pers_settings_value = %s
                                                                                   AND pers_settings_user_id = %s;'
                                                                                ,$profile_page_owner_row->usersext_id
                                                                                ,$GLOBALS['voluno_variables']['current_user_extended']->usersext_id);
                                               $relationship_status_row = $GLOBALS['wpdb']->get_results($relationship_status_query);
                                               echo '
                                               <div class="function_button" style="border-radius:20px;padding:10px;background-color:#FFEAB9;">';
                                               if(empty($relationship_status_row)){
                                                  echo '
                                                  <img
                                                     style="width:80px;opacity:0.4;filter:grayscale(1);-webkit-filter:grayscale(1);filter:gray;"
                                                     src="'.wp_upload_dir()['url'].'/pictures/contact_add.png"
                                                  >';
                                                  
                                                  #add contact (only activated if its not the owner. see jquery) (open)
                                                  if(1==1){
                                                     echo '
                                                     <div
                                                        class="function_button_popup"
                                                        style="
                                                           cursor:default;
                                                           display:none;
                                                           position:absolute;
                                                           background-color:#fff;
                                                           border:1px solid black;
                                                           width:150px;
                                                           margin-left:-40px;
                                                           border-radius:20px;
                                                           padding:20px;
                                                           "
                                                     >
                                                        <p style="font-weight:bold;text-align:center;">
                                                           Add contact?
                                                        </p>
                                                        <p style="text-align:justify;">
                                                        He or she will appear in your contacts and vice versa.
                                                        </p>
                                                        <a
							    href="'.
								get_permalink(686).
								'?user_identification='.$_GET['user_identification'].'&add_contact=1">
							    <div class="voluno_button" style=""width:50px;">
								Add contact
							    </div>
                                                        </a>
                                                     </div>';
                                                  }
                                                  #add contact (only activated if its not the owner. see jquery) (close)
                                                  
                                               }else{
                                                  echo '
                                                  <img
                                                     style="width:80px;"
                                                     src="'.wp_upload_dir()['url'].'/pictures/contact_added.png"
                                                  >';
                                               }
                                               echo '
                                               </div>
                                            </td>
                                            <td>
                                               <div class="function_button" style="border-radius:20px;padding:10px;background-color:#FFEAB9;">';
                                               if(empty($relationship_status_row)){
                                                  echo '
                                                  <img
                                                     style="width:80px;"
                                                     src="'.wp_upload_dir()['url'].'/pictures/chat-message.png"
                                                  >';
                                               }else{
                                                  echo '
                                                  <img
                                                     style="width:80px;"
                                                     src="'.wp_upload_dir()['url'].'pictures/chat-message.png"
                                                  >';
                                               }
                                               echo '
                                               </div>
                                            </td>
                                         </tr>
                                      </table>
                                   </div>';
                                }
                                #message + add as contact (close)
                               
                                #content div: Contact Information (open)
                                if(1==1){
                                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">';
                                        
                                        #edit tooltip (get image [only once] and create div) (open)
                                        if($ngo_admin == "yes"){
                                            echo '
                                            <div
                                                class="profile_edit_tooltip edit_profile_text_button"
                                                style="margin:-40px 0px 0px 250px;" title="Edit profile text"
                                            >
                                                <img src="'.$function_propic_edit_ngo_img_path_full.'">
                                            </div>';
                                        }
                                        #edit tooltip (get image [only once] and create div) (open)
                                        
                                        echo '
                                        <h4>
                                            Contact Information
                                        </h4>
                                        <table>';
                                            
                                            #display preparation (open)
                                            if(1==1){
                                                $facebook_link = '
                                                    <a
                                                        href="'.esc_url('https://www.facebook.com/'.$ngo_row->ngo_facebook).'"
                                                        title="'.esc_url('https://www.facebook.com/'.$ngo_row->ngo_facebook).'"
                                                    >
                                                        Visit Facebook page
                                                    </a>';
                                                $twitter_link = '
                                                    <a
                                                        href="'.esc_url('https://twitter.com/'.$ngo_row->ngo_twitter).'"
                                                        title="'.esc_url('https://twitter.com/'.$ngo_row->ngo_twitter).'"
                                                    >
                                                        Visit Twitter page
                                                    </a>';
                                                $website = '
                                                    <a
                                                        href="'.$ngo_row->ngo_website.'"
                                                        title="Open website of '.$ngo_row->ngo_name.' in new window"
                                                        target="_blank"
                                                    >
                                                        '.$ngo_row->ngo_website.'
                                                    </a>';
                                                
                                                #address (open)
                                                if(1==1){
                                                    if(!empty($ngo_row->ngo_street_name) AND !empty($ngo_row->ngo_street_nr)){
                                                        $street_and_house_num = $ngo_row->ngo_street_name.' '.$ngo_row->ngo_street_nr;
                                                    }elseif(!empty($ngo_row->ngo_street_name) AND empty($ngo_row->ngo_street_nr)){
                                                        $street_and_house_num = $ngo_row->ngo_street_name;
                                                    }
                                                    if(!empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)){
                                                        $area_code_and_city = $ngo_row->ngo_area_code.' '.$ngo_row->ngo_city;
                                                    }elseif(!empty($ngo_row->ngo_city) AND empty($ngo_row->ngo_area_code)){
                                                        $area_code_and_city = $ngo_row->ngo_city;
                                                    }elseif(empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)){
                                                        $area_code_and_city = $ngo_row->ngo_area_code;
                                                    }
                                                    $address_array = array(
                                                                           $street_and_house_num,
                                                                           $area_code_and_city,
                                                                           $ngo_row->ngo_state,
                                                                           $ngo_row->ngo_country_name);
                                                    $address_array = array_filter($address_array);
                                                    $address = implode(",<br>",$address_array);
                                                }
                                                #address (close)
                                            }
                                            #display preparation links (close)
                                            
                                            #input preparation (open)
                                            if(1==1){
                                               
                                                $input_email =
                                                '<input
                                                    type="text"
                                                    value="'.$ngo_row->user_email.'"
                                                    name="update_profile_email"
                                                >';
                                                
                                                $input_phone =
                                                '<input
                                                    type="text"
                                                    value="'.$ngo_row->phone.'"
                                                    name="update_profile_phone"
                                                >';
                                                
                                                $input_youtube =
                                                '<input
                                                    type="text"
                                                    value="'.$ngo_row->youtube.'"
                                                    name="update_profile_youtube"
                                                >';
                                                
                                                $input_facebook =
                                                '<input
                                                    type="text"
                                                    value="'.$ngo_row->facebook.'"
                                                    name="update_profile_facebook"
                                                >';
                                                
                                                $input_twitter =
                                                '<input
                                                    type="text"
                                                    value="'.$ngo_row->twitter.'"
                                                    name="update_profile_twitter"
                                                >';
                                                
                                                $input_website =
                                                '<input
                                                    type="text"
                                                    value="'.$ngo_row->website.'"
                                                    name="update_profile_website"
                                                >';
                                                
                                                #address (open)
                                                if(1==1){
                                                    $input_address = '
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        style="width:110px;"
                                                                        value="'.$ngo_row->ngo_street_name.'"
                                                                        name="update_profile_street_name"
                                                                    >
                                                                    <input
                                                                        type="text"
                                                                        style="width:25px;"
                                                                        value="'.$ngo_row->ngo_street_nr.'"
                                                                        name="update_profile_street_nr"
                                                                    >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        style="width:40px;"
                                                                        value="'.$ngo_row->ngo_area_code.'"
                                                                        name="update_profile_area_code"
                                                                    >
                                                                    <input
                                                                        type="text"
                                                                        style="width:95px;"
                                                                        value="'.$ngo_row->ngo_city.'"
                                                                        name="update_profile_city"
                                                                    >
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        style="width:151px;"
                                                                        value="'.$ngo_row->ngo_state.'"
                                                                        name="update_profile_state"
                                                                    >
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        style="width:151px;"
                                                                        value="'.$ngo_row->ngo_country.'"
                                                                        name="update_profile_country"
                                                                    >
                                                                </td>
                                                            </tr>
                                                        </table>';
                                                }
                                                #address (close)
                                               
                                            }
                                            #input preparation (close)
                                            
                                            #table arrays for contact info (open)
                                            if(1==1){
                                                $content_div_contact_info = array(
                                                    array(   "Email",     $ngo_row->ngo_email,   $input_email      ,1),
                                                    array(   "Phone",     $ngo_row->ngo_phone,   $input_phone      ,1),
                                                    array(   "Youtube",   $ngo_row->ngo_youtube, $input_youtube    ,1),
                                                    array(   "Facebook",  $facebook_link,        $input_facebook   ,$ngo_row->facebook),
                                                    array(   "Twitter",   $twitter_link,         $input_twitter    ,$ngo_row->twitter),
                                                    array(   "Website",   $website,              $input_website    ,1),
                                                    array(   "Address",   $address,              $input_address    ,1)
                                                  
                                                  
                                               );
                                            }
                                            #table arrays for contact info (close)
                                            
                                            #display, not edit area (open)
                                            for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
                                                if(
                                                        (!empty($content_div_contact_info[$index_a][1])
                                                        AND
                                                        $content_div_contact_info[$index_a][3] == 1)
                                                    OR
                                                        ($content_div_contact_info[$index_a][3] != 1
                                                        AND
                                                        !empty($content_div_contact_info[$index_a][3]))
                                                ){
                                                    echo '
                                                    <tr class="profile_page_editable">
                                                        <td style="font-weight:bold;text-align:right;padding-right:20px;">
                                                            '.$content_div_contact_info[$index_a][0].':
                                                        </td>
                                                        <td>
                                                            '.$content_div_contact_info[$index_a][1].'
                                                        </td>
                                                    </tr>';
                                                }
                                            }
                                            #display, not edit area (close)
                                            
                                            #edit area (open)
                                            if($ngo_admin == "yes"){
                                                for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
                                                    echo '
                                                    <tr class="profile_page_edit">
                                                        <td class="content_div_title_td">
                                                            '.$content_div_contact_info[$index_a][0].':
                                                        </td>
                                                        <td class="content_div_content_td">
                                                            '.$content_div_contact_info[$index_a][2].'
                                                        </td>
                                                    </tr>';
                                                }
                                                echo '
                                                <tr class="profile_page_edit">
                                                    <td colspan="2">
                                                        <table style="margin:auto;">
                                                            <tr>
                                                                <td style="text-align:center;">
                                                                    <div
                                                                        class="edit_profile_text_cancel profile_page_edit"
                                                                        style="width:60px;margin-left:auto;margin-right:10px;"
                                                                    >
                                                                        Cancel
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="edit_profile_text_save profile_page_edit"
                                                                        style="width:60px;margin-right:auto;margin-left:10px;"
                                                                    >
                                                                        Save
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>';
                                            }
                                            #edit area (close)
                                            
                                            echo '
                                        </table>
                                    </div>';
                                }
                                #content div: Contact Information (close)
                               
                                #content div: staff (open)
                                if(1==1){
                                    echo '
                                    <div class="profile_content_div" style="background-color:#FFEAB9;">';
                                     
                                        #edit tooltip (get image [only once] and create div) (open)
                                        if($ngo_admin == "yes"){
                                           echo '
                                           <div
                                              class="profile_edit_tooltip edit_profile_text_button"
                                              style="margin:-40px 0px 0px 250px;" title="Edit profile text">';
                                              echo '
                                              <img src="'.$function_propic_edit_ngo_img_path_full.'">
                                           </div>';
                                        }
                                        #edit tooltip (get image [only once] and create div) (open)
                                     
                                        #display preparation (open)
                                        if(1==1){
                                            $facebook_link = '
                                                <a
                                                    href="'.esc_url('https://www.facebook.com/'.$ngo_row->ngo_facebook).'"
                                                    title="'.esc_url('https://www.facebook.com/'.$ngo_row->ngo_facebook).'"
                                                >
                                                    Visit Facebook page
                                                </a>';
                                            $twitter_link = '
                                                <a
                                                    href="'.esc_url('https://twitter.com/'.$ngo_row->ngo_twitter).'"
                                                    title="'.esc_url('https://twitter.com/'.$ngo_row->ngo_twitter).'"
                                                >
                                                    Visit Twitter page
                                                </a>';
                                            $website = '
                                                <a href="'.$ngo_row->ngo_website.'" title="Click to visit website of '.$ngo_row->ngo_name.'">
                                                    '.$ngo_row->ngo_website.'
                                                </a>';
                                            
                                            #address (open)
                                            if(1==1){
                                                if(!empty($ngo_row->ngo_street_name) AND !empty($ngo_row->ngo_street_nr)){
                                                    $street_and_house_num = $ngo_row->ngo_street_name.' '.$ngo_row->ngo_street_nr;
                                                }elseif(!empty($ngo_row->ngo_street_name) AND empty($ngo_row->ngo_street_nr)){
                                                    $street_and_house_num = $ngo_row->ngo_street_name;
                                                }
                                                if(!empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)){
                                                    $area_code_and_city = $ngo_row->ngo_city.' '.$ngo_row->ngo_area_code;
                                                }elseif(!empty($ngo_row->ngo_city) AND empty($ngo_row->ngo_area_code)){
                                                    $area_code_and_city = $ngo_row->ngo_city;
                                                }elseif(empty($ngo_row->ngo_city) AND !empty($ngo_row->ngo_area_code)){
                                                    $area_code_and_city = $ngo_row->ngo_area_code;
                                                }
                                                $address_array = array(
                                                                       $street_and_house_num,
                                                                       $area_code_and_city,
                                                                       $ngo_row->ngo_state,
                                                                       $ngo_row->ngo_country_name);
                                                for($o=0;$o<count($address_array);$o++){
                                                    $address = $address.$address_array[$o];
                                                    if($o+1<count($address_array)){
                                                        $address = $address.',<br>';
                                                    }
                                                }
                                            }
                                            #address (close)
                                        }
                                        #display preparation links (close)
                                        
                                        #display (open)
                                        if(1==1){
                                            echo '
                                            <h4 style="display:inline;">
                                                Staff
                                            </h4>
					    <br>
					    To join this organization, please write an email to
					    info@voluno.org or send us a message via our
					    <a href="'.get_permalink(638).'">contact form</a>. We need your name (as it is in
					    this website) and the name of the organization.<br>
					    <span style="color:grey;">
						(This is only a temporary solution.
						Soon, a simple and quick application button will be added.)
					    </span>
                                            <table>';
                                            $image_width = 80;
                                            for($w=0;$w<count($all_affiliates_results);$w++){
                                                
                                                #loop preparation (open)
                                                if(1==1){
                                                    
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
															
															$function_profileLink['id'] = $all_affiliates_results[$w]->usersext_id; //user or ngo id. if it has the form "usersext_id_XXX]", then a user profile is shown, otherwise an ngo profile.
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
													
                                                    #function-image-processing
                                                       #profile picture
                                                         $function_propic__type = "profile picture";
                                                         $function_propic__user_id = $all_affiliates_results[$w]->usersext_id;
                                                       #all
                                                         $function_propic__geometry = array($image_width,$image_width); //optional, if e.g. only width: 300, NULL; vice versa
                                                       include('#function-image-processing.php');
                                                       
                                                    
                                                    if($all_affiliates_results[$w]->ngo_prop_type_detail == "admin"){
                                                        $administrator = "<br>(Administrator)";
                                                    }else{
                                                        unset($administrator);
                                                    }
                                                }
                                                #loop preparation (close)
                                                
                                                #loop content (open)
                                                if(1==1){
                                                    echo '
                                                    <tr>
                                                        <td style="width:'.$image_width.'px;padding-right:10px;">
                                                            <a
                                                              title="'.$function_profileLink['link_title'].'"
                                                              href="'.$function_profileLink['link'].'"
                                                            >
                                                                <img
                                                                    src="'.$function_propic.'"
                                                                    style="border-radius:10px;border:1px solid black;"
                                                                    class="voluno_brighter_on_hover"
                                                                >
                                                            </a>
                                                        </td>
                                                        <td style="vertical-align:middle;">
                                                            '.$function_profileLink['name_link'].'
                                                            '.$administrator.'
                                                        </td>
                                                    </tr>';
                                                }
                                                #loop content (close)
                                            }
                                            echo '
                                            </table>';
                                        }
                                        #display (close)
                                        /*
                                        #display, not edit area (open)
                                        for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
                                           if(
                                                 (!empty($content_div_contact_info[$index_a][1])
                                                 AND
                                                 $content_div_contact_info[$index_a][3] == 1)
                                              OR
                                                 ($content_div_contact_info[$index_a][3] != 1
                                                 AND
                                                 !empty($content_div_contact_info[$index_a][3]))
                                              ){
                                              echo '
                                              <tr class="profile_page_editable">
                                                 <td style="font-weight:bold;text-align:right;padding-right:20px;">
                                                    '.$content_div_contact_info[$index_a][0].':
                                                 </td>
                                                 <td>
                                                    '.$content_div_contact_info[$index_a][1].'
                                                 </td>
                                              </tr>';
                                           }
                                        }
                                        #display, not edit area (close)
                                        
                                        #edit area (open)
                                        if($ngo_admin == "yes"){
                                           for($index_a=0;$index_a<count($content_div_contact_info);$index_a++){
                                              echo '
                                              <tr class="profile_page_edit">
                                                 <td class="content_div_title_td">
                                                    '.$content_div_contact_info[$index_a][0].':
                                                 </td>
                                                 <td class="content_div_content_td">
                                                    '.$content_div_contact_info[$index_a][2].'
                                                 </td>
                                              </tr>';
                                           }
                                           echo '
                                           <tr class="profile_page_edit">
                                              <td colspan="2">
                                                 <table style="margin:auto;">
                                                    <tr>
                                                       <td style="text-align:center;">
                                                          <div
                                                             class="edit_profile_text_cancel profile_page_edit"
                                                             style="width:60px;margin-left:auto;margin-right:10px;"
                                                          >
                                                             Cancel
                                                          </div>
                                                       </td>
                                                       <td>
                                                          <div
                                                             class="edit_profile_text_save profile_page_edit"
                                                             style="width:60px;margin-right:auto;margin-left:10px;"
                                                          >
                                                             Save
                                                          </div>
                                                       </td>
                                                    </tr>
                                                 </table>
                                              </td>
                                           </tr>';
                                        }
                                        #edit area (close)
                                        */
                                    echo '
                                    </div>';
                                }
                                #content div: staff (close)
                               
                            }
                            #right side of container (close)
                            
                        echo '
                        </td>
                    </tr>
                </table>';
            }
            #table (close)
            
        #close form (open)
        if($ngo_admin == "yes"){
            echo '
            </form>';
        }
        #close form (close)
        
    }
    #content (close)
    
}
#profile (close)

#projects (open)
if($page_section == "projects"){
    
    #style (open)
    if(1==1){
	
	echo '
	<style>
	    .content_div{
		border-radius:20px;
		padding:20px;
		background-color:#FFEAB9;
		margin:20px 0px;
		
	    }
	    .content_div_level2,.project_div{
		padding:10px;
		background-color:#FFEAB9;
		margin:10px 0px;
		border-radius:10px;
	    }
	    .project_div{
		display:inline-block;
		max-width:660px;
		text-align:justify;
	    }
	    .inner_project_div{
		background-color:#FFF;
		margin:20px 10px 10px 10px;
		display:inline-block;
		padding:10px;
		border-radius:5px;
	    }
	</style>';
	
    }
    #style (close)
    
    #mysql (open)
    if(1==1){
	
	#get before update (open)
	if(1==1){
	    
	    #projects (open)
	    if(1==1){
		
		$all_projects_query_text = array(
		    'SELECT *
		    FROM fi4l3fg_voluno_ngo_projects
		    WHERE project_ngo = %d;'
		    ,$ngo_row->ngo_id
		);
		//used in the second "mysql get". this ensures that changes to the text are always transfered to both queries.
		
		$all_projects_query = $GLOBALS['wpdb']->prepare($all_projects_query_text[0]
						    ,$all_projects_query_text[1]);
		$all_projects_results = $GLOBALS['wpdb']->get_results($all_projects_query);
		
	    }
	    #projects (close)
	    
	}
	#get before update (close)
	
	#update (open)
	if(1==1){
	    
	    #standard update project info (open)
	    if(1==1){
		//to facilitate the work on projects, redundant information is saved in the database. specifically:
		//- if there are children and children of children
		//- if which level the project is or, put differently, whether it has a parent and wether its parent has a parent
		//to ensure that all this information is up to date and consistent, it's updated on every load for all projects of the ngo
		
		#each project (open)
		for($agv=0;$agv<count($all_projects_results);$agv++){
		    
		    $update_project_info['project']['row'] = $all_projects_results[$agv];
		    
		    #find parents and determine level (open)
		    if($update_project_info['project']['row']->project_parent == 0){ //if no parent -> level 0
			$update_project_info['project']['level'] = 0;
		    }else{
			for($agw=0;$agw<count($all_projects_results);$agw++){
			    if($update_project_info['project']['row']->project_parent == $all_projects_results[$agw]->project_id){ //get parent from results
				
				$update_project_info['project']['parent']['row'] = $all_projects_results[$agw];
				
				if($update_project_info['project']['parent']['row']->project_parent == 0){ //if parent has no parent -> level 1
				    $update_project_info['project']['level'] = 1;
				}else{
				    $update_project_info['project']['level'] = 2;
				}
				
			    }
			}
		    }
		    #find parents and determine level (close)
		    
		    #find how many child levels (open)
		    if(1==1){
			
			#loop (open)
			for($agx=0;$agx<count($all_projects_results);$agx++){
			    if($all_projects_results[$agx]->project_parent == $update_project_info['project']['row']->project_id){
				//if this is the case, then the project has at least one child.
				
				$update_project_info['project']['child_level_1'] = $all_projects_results[$agx];
				
				//now the question is if any of these children has children 
				
				for($agy=0;$agy<count($all_projects_results);$agy++){
				    if($all_projects_results[$agy]->project_parent == $update_project_info['project']['child_level_1']->project_id){
					//if this is the case, then there are two levels of children
					
					$update_project_info['project']['child_level_2'] = $all_projects_results[$agy];
					
				    }
				    
				}
				
				
			    }
			    
			}
			#loop (close)
			
			#determine child level (open)
			if(empty($update_project_info['project']['child_level_1'])){
			    
			    $update_project_info['project']['child level'] = 0;
			    
			}elseif(empty($update_project_info['project']['child_level_2'])){
			    
			    $update_project_info['project']['child level'] = 1;
			    
			}else{
			    
			    $update_project_info['project']['child level'] = 2;
			    
			}
			#determine child level (open)
			
		    }
		    #find how many child levels (close)
		    
		    #update (open)
		    if(1==1){
			
			#database query update (open)
			if(1==1){
			    $GLOBALS['wpdb']->update( 
					'fi4l3fg_voluno_ngo_projects',
				    array( //updated content
					'project_level' => $update_project_info['project']['level'],
					'project_child' => $update_project_info['project']['child level'],
					'project_date_modified' => date("Y-m-d H:i:s")
				    ),
				    array( //location of updated content
					'project_id' => $update_project_info['project']['row']->project_id
				    ),
				    array( //format of updated content
					'%d','%d','%s'
				    ),
				    array( //format of location of updated content
					'%d'
				    ));
			}
			#database query update (close)
			
		    }
		    #update (close)
		    unset($update_project_info);
		}
		#each project (close)
	    }
	    #standard update project info (open)
	    
	}
	#update (close)
	
	#get after update (open)
	if(1==1){
	    
	    #projects (open)
	    if(1==1){
		
		$all_projects_query = $GLOBALS['wpdb']->prepare($all_projects_query_text[0]
						    ,$all_projects_query_text[1]);
		$all_projects_results = $GLOBALS['wpdb']->get_results($all_projects_query);
		
	    }
	    #projects (close)
	    
	}
	#get after update (close)
	
    }
    #mysql (close)
    
    #content (open)
    if(1==1){
	
	#function-personal-pages.php (v1.0) (open)
	if(1==1){
	    $function_pers_pages_id = 5;
	    $function_pers_pages_active_page = "Projects";
	    include("#function-personal-pages.php");
	    echo $function_pers_pages;
	    #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
	}
	#function-personal-pages.php (v1.0) (close)
	echo "THIS SECTION IS STILL IN DEVELOPMENT."; #dome
	#title table (open)
	if(1==1){
	    echo '
	    <table>
		<tr>
		    <td style="width:70%;padding-right:20px;">';
			
			#left side of container (open)
			if(1==1){
			    
			    #title (open)
			    if(1==1){
					
					#function-breadcrums.php (v3.0) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_breadcrums['input_array'] = [
								'left' => [
									[
										'text' => 'View all development organizations',
										'link' => get_permalink(689)
									]
								]
							];
							// Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
							
						}
						#input (close)
						
						include('#function-breadcrums.php');
						
						#output (open)
						if(1==1){
							
							#echo $function_breadcrums['breadcrums']; // Output variable.
							
						}
						#output (close)
						
					}
					#function-breadcrums.php (v3.0) (close)
					
					echo
					$function_breadcrums['breadcrums'].'
					<div style="text-align:center;margin-bottom:30px;">
						<h1 style="display:inline;">
						'.$ngo_row->ngo_name.':
						</h1>
						<br>
						<h3 style="display:inline;">
						Projects
						</h3>
					</div>';
					
			    }
			    #title (close)
			    
			}
			#left side of container (close)
			
		    echo '
		    </td>
		    <td style="text-align:center;">';
			
			#right side of container (open)
			if(1==1){
			   
			    #ngo logo (open)
			    if(1==1){
			    
				#function-image-processing
				   #ngo logo
				    $function_propic__type = "ngo logo";
				    $function_propic__ngo_id = $ngo_id;
				   #all
				     $function_propic__geometry = array(289,289); //optional, if e.g. only width: 300, NULL; vice versa
				   include('#function-image-processing.php');
				echo '
				<div class="profile_edit_hover voluno_header_picture" style="margin-bottom:20px;">
				    <img class="ngo_logo voluno_brighter_on_hover" src="'.$function_propic.'"
				    >
				</div>';
			    }
			    #ngo logo (close)
			   
			}
			#right side of container (close)
			
		    echo '
		    </td>
		</tr>
	    </table>';
	}
	#title table (close)
	
	#options (open)
	if(1==1){
	    
	    echo '
	    <div style="text-align:center;">
		<div class="voluno_button project_description_general_link" style="display:inline-block;">
		    <span class="text">
			Show all project descriptions
		    </span>
		    <span class="text" style="display:none">
			Hide all project descriptions
		    </span>
		</div>
		<div class="voluno_button project_tasks_general_link" style="display:inline-block;">
		    <span class="text">
			Show all project tasks
		    </span>
		    <span class="text" style="display:none">
			Hide all project tasks
		    </span>
		</div>
		<div class="voluno_button project_subprojects_general_link" style="display:inline-block;">
		    <span class="text" style="display:none">
			Show all subprojects
		    </span>
		    <span class="text">
			Hide all subprojects
		    </span>
		</div>
		<div class="voluno_button project_new_general_link" style="display:inline-block;">
		    New project
		</div>
	    </div>';
	    
	}
	#options (close)
	
	#new project (open)
	if(1==1){
	    
	    #preparation (open)
	    if(1==1){
		
		for($agu=0;$agu<count($all_projects_results);$agu++){
		    echo "";
		}
		
		
                #preparation (open)
                if(1==1){
                    
                    #array (open)
                    if(1==1){
                        
                        #select_thread (open)
                        if(1==1){
                            
                            $select_thread = '
                            <select
                                style="text-align:center;"
                                name="add_discussion__thread"
                                class="add_discussion__thread"
                            >';
                            
                            for($abn=0;$abn<count($add_discussion_thread_selection_results);$abn++){
                                
                                if($thread_info_row->voluno_for_thr_id == $add_discussion_thread_selection_results[$abn]->voluno_for_thr_id){
                                    $selected = 'selected';
                                    $selected_text = ' (current topic)';
                                    $selected_style = 'style="font-weight:bold;"';
                                }else{
                                    unset($selected,$selected_text,$selected_style);
                                }
                                
                                $select_thread .= '
                                <option
                                    value="'.$add_discussion_thread_selection_results[$abn]->voluno_for_thr_id.'"
                                    title="'.$add_discussion_thread_selection_results[$abn]->voluno_for_thr_description.'"
                                    '.$selected.'
                                    '.$selected_style.'
                                >
                                    '.$add_discussion_thread_selection_results[$abn]->voluno_for_thr_title.$selected_text.'
                                </option>';
                                
                            }
                            $select_thread .= '
                            </select>';
                            
                        }
                        #select_thread (close)
                        
                        #array (open)
                        if(1==1){
                            
                            $maxlength_title = 75;
                            $maxlength_post = 1000;
                            
                            $new_project_form_array
                                = array(
                                    array(
                                        'title' => 'Name'
                                        ,'input' => '<input
                                                        style="width:95%;"
                                                        type="text"
                                                        placeholder="Discussion title"
                                                        name="add_discussion__title"
                                                        class="post_reply_input"
                                                        maxlength='.$maxlength_title.'
                                                    >'
                                        ,'warning_text' => 'Please add a title to your discussion. Please use keywords.'
                                        ,'max_characters' => $maxlength_title
                                        ,'text_before_value' => 'You have reached the character limit of '
                                        ,'text_after_value' => '. If you want to add more information, please do so in the detailed description fields below.'
                                    ),
                                    array(
                                        'title' => 'Description'
                                        ,'input' => '<textarea
                                                        name="add_discussion__first_post"
                                                        class="post_reply_input"
                                                        placeholder="Your first post that opens the discussion." '
                                                        .'style="width:95%;resize:vertical;min-height:100px;max-height:300px;height:200px;" '
                                                        .'maxlength='.$maxlength_post
                                                    .'>'
                                                    .'</textarea>'
                                        ,'warning_text' => 'Please write a text to start the discussion.'
                                        ,'max_characters' => $maxlength_post
                                        ,'text_before_value' => "You have reached the character limit of "
                                        ,'text_after_value' => "."
                                    ),
                                    array(
                                        'title' => 'Supervisor'
                                        ,'input' => $select_thread 
                                    ),
                                    array(
                                        'title' => 'Parent'
                                        ,'input' => $select_thread 
                                    )
                                );
                            
                        }
                        #array (close)
                        
                    }
                    #array (close)
                    
                }
                #preparation (close)
		
	    }
	    #preparation (close)
	    
	    #content (open)
	    if(1==1){
		
		echo '
		<div class="content_div project_new_div" style="display:noene;width:80%;margin:20px auto;">';
		    
		    #title (open)
		    if(1==1){
			echo '
			<div style="text-align:center;">
			    <h4 style="display:inline;">
				New Project
			    </h4>
			</div>';
		    }
		    #title (close)
		    
		    #form (open)
		    if(1==1){
			echo '
			<form method="post" action="'.get_permalink().'?development_organization='.$ngo_row->ngo_id.'&section=projects">
			    <table>';
				
				#loop (open)
				for($aha=0;$aha<count($new_project_form_array);$aha++){
				    
				    echo '
				    <tr>
					<td
					    style="
						width:15%;
						text-align:right;
						font-weight:bold;
						padding:12px 10px 0px 0px;
					    "
					>
					    '.$new_project_form_array[$aha]['title'].':
					</td>
					<td style="">
					    '.$new_project_form_array[$aha]['input'].'
					    <div style="color:red;padding-top:5px;">';
						
						#warnings and text info (open)
						if(1==1){
						    
						    if(!empty($new_discussion_form_array[$aha]['max_characters'])){
							
							#hidden fields (open)
							if(1==1){
							    echo '
							    <span class="max_char" style="display:none;">'.
								$new_discussion_form_array[$aha]['max_characters'].
							    '</span>
							    <span class="text_before_value" style="display:none;">'.
								$new_discussion_form_array[$aha]['text_before_value'].
							    '</span>
							    <span class="text_after_value" style="display:none;">'.
								$new_discussion_form_array[$aha]['text_after_value'].
							    '</span>';
							}
							#hidden fields (close)
							
							echo '
							<span class="char_count" style="color:#F86A00;">
							</span>';
						    }
						    
						    echo '
						    <span class="warning" style="display:none;">
							'.$new_discussion_form_array[$aha]['warning_text'].'
						    </span>';
						}
						#warnings and text info (close)
						
					    echo '
					    </div>
					</td>
				    </tr>';
				    
				}
				#loop (close)
				
			    echo '
			    </table>
			</form>';
		    }
		    #form (close)
		    
                    #cancel + submit (open)
                    if(1==1){
                        echo '
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <div
                                    style="display:inline-block;margin-right:50px;"
                                    class="voluno_button project_new_general_link_cancel"
                                >
                                    Cancel
                                </div>
                                <div
                                    class="voluno_button project_new_form_submit"
                                    style="display:inline-block;"
                                >
                                    Create project
                                </div>
                            </td>
                        </tr>';
                    }
                    #cancel + submit (close)
		    
		echo '
		</div>';
		
	    }
	    #content (close)
	    
	}
	#new project (close)
	
	#projects overview (open)
	if(1==1){
	    echo '
	    <div class="content_div">';
		
		#title (open)
		if(12==1){ #dome
		    echo '
		    <div style="text-align:center;">
			<h4 style="display:inline;cursor:pointer;" class="content_div_title">
			    <a style="cursor:pointer;">
				Project Overview
			    </a>
			</h4>
		    </div>';
		}
		#title (close)
		
		#project overview (open)
		if(1==1){
		    
		    #preparation (open)
		    if(1==1){
			
			$project_id_placeholder = "9!Frue8Yev#vp_Q@";
			$project_indent = 60;
			
			#level 1 - loop (open)
			for($agq=0;$agq<count($all_projects_results);$agq++){
			    if($all_projects_results[$agq]->project_parent == 0){
				
				#level 1 - content (open)
				if(1==1){
				    $projects_overview['level0']['counter'][] = $all_projects_results[$agq]->project_id;
				    $projects_overview['project_id_in_results_array'][] = $agq;
				    $projects_overview['project_number']['0']++;
				    unset($projects_overview['project_number'][1]);
				    unset($projects_overview['project_number'][2]);
				    
				    #link to description (open)
				    if(!empty($all_projects_results[$agq]->project_description)){
					$project_name_link = array('<a style="cursor:pointer;" class="project_name">','</a>');
				    }else{
					unset($project_name_link);
				    }
				    #link to description (close)
				    
				    $projects_overview['level1']['content'][0] = '
				    <div class="project_div">
					<div style="font-weight:bold;font-size:140%;">'. //div is closed later, in the individual project section #did0001
					    $project_name_link[0].
						$projects_overview['project_number'][0].'. '.
						$all_projects_results[$agq]->project_name.
					    $project_name_link[1];
				    $projects_overview['level1']['content'][1] = '
					'.$project_id_placeholder.
					str_pad($all_projects_results[$agq]->project_id,8,'-',STR_PAD_LEFT).'
				    </div>';
				}
				#level 1 - content (close)
				
				#level 2 - loop (open)
				if(1==1){
				    $projects_overview['level1']['subcontent'] .= '
				    <div style="padding-left:'.$project_indent.'px;">';
					for($agr=0;$agr<count($all_projects_results);$agr++){
					    if($all_projects_results[$agr]->project_parent == $all_projects_results[$agq]->project_id){
						
						#level 2 - content (open)
						if(1==1){
						    $projects_overview['level0']['counter'][] = $all_projects_results[$agr]->project_id;
						    $projects_overview['project_id_in_results_array'][] = $agq;
						    $projects_overview['level1']['counter']++;
						    $projects_overview['project_number'][1]++;
						    unset($projects_overview['project_number'][2]);
						    
						    #link to description (open)
						    if(!empty($all_projects_results[$agq]->project_description)){
							$project_name_link = array('<a style="cursor:pointer;" class="project_name">','</a>');
						    }else{
							unset($project_name_link);
						    }
						    #link to description (close)
						    
						    $projects_overview['level2']['content'][0] = '
						    <div class="project_div">
							<div style="font-weight:bold;font-size:130%;">'. //div is closed later, in the individual project section #did0001
							    $project_name_link[0].
								$projects_overview['project_number'][0].'.'.
								$projects_overview['project_number'][1].'. '.
								$all_projects_results[$agr]->project_name.
							    $project_name_link[1];
						    $projects_overview['level2']['content'][1] = '
							'.$project_id_placeholder.
							str_pad($all_projects_results[$agr]->project_id,8,'-',STR_PAD_LEFT).'
						    </div>';
						}
						#level 2 - content (close)
						
						#level 3 - loop (open)
						if(1==1){
						    $projects_overview['level2']['subcontent'] .= '
						    <div style="padding-left:'.$project_indent.'px;">';
							for($ags=0;$ags<count($all_projects_results);$ags++){
							    
							    #level 3 - content (open)
							    if($all_projects_results[$ags]->project_parent == $all_projects_results[$agr]->project_id){
								$projects_overview['level0']['counter'][] = $all_projects_results[$ags]->project_id;
								$projects_overview['project_id_in_results_array'][] = $agq;
								$projects_overview['level1']['counter']++;
								$projects_overview['level2']['counter']++;
								$projects_overview['project_number'][2]++;
								
								#link to description (open)
								if(!empty($all_projects_results[$agq]->project_description)){
								    $project_name_link = array('<a style="cursor:pointer;" class="project_name">','</a>');
								}else{
								    unset($project_name_link);
								}
								#link to description (close)
								
								$projects_overview['level3']['content'][0] = '
								<div class="project_div">
								    <div style="font-weight:bold;font-size:120%;">'. //div is closed later, in the individual project section #did0001
									$project_name_link[0].
									    $projects_overview['project_number'][0].'.'.
									    $projects_overview['project_number'][1].'.'.
									    $projects_overview['project_number'][2].'. '.
									    $all_projects_results[$ags]->project_name.
									$project_name_link[1];
								$projects_overview['level3']['content'][1] = '
								    '.$project_id_placeholder.
								    str_pad($all_projects_results[$ags]->project_id,8,'-',STR_PAD_LEFT).'
								</div>';
							    }
							    #level 3 - content (close)
							    
							    $projects_overview['level2']['subcontent'] .=
							    '<div class="project_frame_level3">'.
							    $projects_overview['level3']['content'][0].
							    $projects_overview['level3']['counter'].
							    $projects_overview['level3']['content'][1].
							    '</div>';
							    unset($projects_overview['level3']);
							    
							}
						    $projects_overview['level2']['subcontent'] .= '
						    </div>';
						}
						#level 3 - loop (close)
						
						#project counter (open)
						if($projects_overview['level2']['counter'] > 0){
						    if($projects_overview['level2']['counter'] == 1){
							$plural_s = "subproject";
						    }else{
							$plural_s = "subprojects";
						    }
						    $projects_overview['level2']['counter']
						    = '
						    ('.
							'<a style="cursor:pointer;" class="subprojects_link_level2">'.
							    $projects_overview['level2']['counter'].'&nbsp;'.$plural_s.
							'</a>'.
						    ')';
						}
						#project counter (close)
						
						$projects_overview['level1']['subcontent'] .=
						'<div class="project_frame_level2">'.
						$projects_overview['level2']['content'][0].
						$projects_overview['level2']['counter'].
						$projects_overview['level2']['content'][1].
						$projects_overview['level2']['subcontent'].
						'</div>';
						unset($projects_overview['level2']);
						
					    }
					}
				    $projects_overview['level1']['subcontent'] .= '
				    </div>';
				}
				#level 2 - loop (close)
				
				#project counter (open)
				if($projects_overview['level1']['counter'] > 0){
				    if($projects_overview['level1']['counter'] == 1){
					$plural_s = "subproject";
				    }else{
					$plural_s = "subprojects";
				    }
				    $projects_overview['level1']['counter']
				    = '
				    ('.
					'<a style="cursor:pointer;" class="subprojects_link_level1">'.
					    $projects_overview['level1']['counter'].'&nbsp;'.$plural_s.
					'</a>'.
				    ')';
				}
				#project counter (close)
				
				$projects_overview['level0']['content'] .=
				'<div class="project_frame_level1">'.
				$projects_overview['level1']['content'][0].
				$projects_overview['level1']['counter'].
				$projects_overview['level1']['content'][1].
				$projects_overview['level1']['subcontent'].
				'</div>';
				unset($projects_overview['level1']);
				
			    }
			}
			#level 1 - loop (close)
			
		    }
		    #preparation (close)
		    
		    #content (open)
		    if(1==1){
			
			#individual project + adding to "project structure" (open)
			for($agt=0;$agt<count($projects_overview['level0']['counter']);$agt++){
			    
			    #description (open)
			    if(!empty($all_projects_results[$projects_overview['project_id_in_results_array'][$agt]]->project_description)){
				
				$project_div_content[1] .= '
				<div class="inner_project_div project_description" style="display:none;">
				    <p>
					'.$all_projects_results[$projects_overview['project_id_in_results_array'][$agt]]->project_description.'
				    </p>
				</div>';
				
			    }
			    #description (close)
			    
			    #tasks & link or deactivated link if empty (open)
			    if(1==1){
				
				#preparation (open)
				if(1==1){
				    
				    #function-table-of-god.php (v1.0) (open)
				    if(1==1){
					
					#data preparation (open)
					if(1==1){
					    
					    #Please choose a name for your table like "task mycurrent volunteer"
						$table_of_god_name = "ngo tasks"; //used twice: in projects and profile
						$table_of_god_id = $agt; //this is combined with the name to form a unique id, e.g. per forum disucssion. default: empty
						#$table_of_god__number_of_all_results = 3; //if given, user is being asked to relax search restrictions if no results are found 
						
					    #Please select all possible
						$table_of_god_query = $GLOBALS['wpdb']->prepare('SELECT *
										    FROM fi4l3fg_voluno_items_tasks
										    WHERE task_project = %d;'
										    ,$projects_overview['level0']['counter'][$agt]);
						$table_of_god_results = $GLOBALS['wpdb']->get_results($table_of_god_query);
						
					    #column transfer (open)
					    for($x=0;$x<count($table_of_god_results);$x++){
						#strings (up to 10)
						    $table_of_god_data_strings1[] = $table_of_god_results[$x]->task_description;
						    $table_of_god_data_strings2[] = $table_of_god_results[$x]->task_name;
						    $table_of_god_data_strings3[] = $table_of_god_results[$x]->task_status;
						    $table_of_god_data_strings4[] = $table_of_god_results[$x]->task_code;
						    $table_of_god_data_strings5[] = $table_of_god_results[$x]->task_date_entered;
						    $table_of_god_data_strings6[] = $table_of_god_results[$x]->task_deadline;
						    $table_of_god_data_strings7[] = $table_of_god_results[$x]->task_assignment_deadline;
						    #$table_of_god_data_strings8[] = $table_of_god_results[$x]->;
						    #$table_of_god_data_strings9[] = $table_of_god_results[$x]->;
						    #$table_of_god_data_strings10[] = $table_of_god_results[$x]->;
						#numbers (up to 10)
						    $table_of_god_data_numbers1[] = $table_of_god_results[$x]->task_author_id;
						    $table_of_god_data_numbers2[] = $table_of_god_results[$x]->task_ngo_id;
						    $table_of_god_data_numbers3[] = $table_of_god_results[$x]->task_project_id;
						    $table_of_god_data_numbers4[] = $table_of_god_results[$x]->task_id;
						    #$table_of_god_data_numbers5[] = ;
						    #$table_of_god_data_numbers6[] = ;
						    #$table_of_god_data_numbers7[] = ;
						    #$table_of_god_data_numbers8[] = ;
						    #$table_of_god_data_numbers9[] = ;
						    #$table_of_god_data_numbers10[] = ;
					    }
					    #column transfer (close)
					}
					#data preparation (close)
					
					#table content (open)
					if(1==1){
					    
					    $table_of_god_table_title = "Project tasks"; #the title of the table in h4, together with hide option. to hide title, leave empty.
					    $table_of_god_table_title_format = array('div style="font-size:120%;font-weight:bold;"','div'); //default: array('h4','h4') <- opening and closing tags
					    $table_of_god_table_title_brackets = 'no'; //default:yes
					    #$table_of_god_show_on_load = "no"; //default: yes (empty or "yes"). If there's no title, this is automatically set to yes, otherwise pointless.
					    #$table_of_god__hide_column_titles = "yes"; //default: no = empty
					    #$table_of_god__thin_pagination = "yes"; //default: no = empty
					    $table_of_god__variable_only = "yes"; //default: no = empty --> saves everything in $table_of_god
					    
					    #table title array (open)
					    if(1==1){
					    $table_of_god_table_array = array(
						    #Title of each column
						    #the width of each column in the table in percent
						    #mysql ordering name     
							array("#",5),
							array("Task",20,"tog_data_string2"),
							array("Description",75),
							#array("Country",15),
							#array("Region",15),
							#array("Category",15),
							#array("Author and organization",15),
							#array("Applicants",15),
							#array("Apply",15)
						    );
					    }
					    #table title array (close)
					    
					    #default ordering
						$table_of_god_default_order_by = "tog_data_string2"; # any of the third position ([2]) in the subarray of $table_of_god_table_array
						$table_of_god_default_order_by_direction = "ASC"; # " ASC"; or " DESC"; (space required)
						
					    #For the td content, please look at: #function-table-of-god#example.php
					    
					    #if empty, show messages
						$table_of_god__no_items_available_message = array(
						    'lines' => "no" //default: yes
						    ,'content' => "none" //any text or "none", default: There are currently no items available.
						);
						
					}
					#table content (close)
					
					include("#function-table-of-god.php");
					
				    }
				    #function-table-of-god.php (v1.0) (close)
				    
				}
				#preparation (close)
				
				#execution (open)
				if(!empty($table_of_god_results)){
				    
				    #plural s (open)
				    if(count($table_of_god_results) == 1){
					$plural_s = "task";
				    }else{
					$plural_s = "tasks";
				    }
				    #plural s (close)
				    
				    $project_div_content[0] .= '
				    (<a class="task_div_link" style="cursor:pointer;">'.count($table_of_god_results).'&nbsp;'.$plural_s.'</a>)
				    </div>'; //closing of previously opened div #did0001
				    $project_div_content[1] .= '
				    <div class="task_div inner_project_div" style="display:none;">
					'.$table_of_god.'
				    </div>';
				}else{
				    $project_div_content[0] .= '
				    </div>'; //closing of previously opened div #did0001';
				}
				#execution (close)
				
			    }
			    #tasks & link or deactivated link if empty (close)
			    
			    $projects_overview['level0']
				= str_replace(
				    $project_id_placeholder.str_pad($projects_overview['level0']['counter'][$agt], 8, '-', STR_PAD_LEFT),
				    $project_div_content[0].$project_div_content[1],
				    $projects_overview['level0']
				);
			    unset($project_div_content);
			}
			#individual project + adding to "project structure" (close)
			
			echo '
			<div class="content_div_content">
			    '.$projects_overview['level0']['content'].'
			</div>';
			
		    }
		    #content (close)
		    
		}
		#project overview (close)
		
	    echo '
	    </div>';
	}
	#projects overview (close)
	
    }
    #content (close)
    
    #jquery (open)
    if(1==1){
	
	echo '
	<script>
	    jQuery(document).ready(function(){';
		
		#general options (open)
		if(1==1){
		    
		    #hide show project description (open)
		    if(1==1){
			echo '
			var project_description_general_link = "no";
			jQuery(".project_description_general_link").click(function(){
			    if(project_description_general_link == "no"){
				jQuery(".project_description").fadeIn(300);
				project_description_general_link = "yes";
			    }else{
				jQuery(".project_description").fadeOut(300);
				project_description_general_link = "no";
			    }
			    jQuery(this).find(".text").toggle(300);
			});';
		    }
		    #hide show project description (close)
		    
		    #hide show tasks (open)
		    if(1==1){
			echo '
			var project_tasks_general_link = "no";
			jQuery(".project_tasks_general_link").click(function(){
			    if(project_tasks_general_link == "no"){
			        jQuery(".task_div").fadeIn(300);
				project_tasks_general_link = "yes";
			    }else{
				jQuery(".task_div").fadeOut(300);
				project_tasks_general_link = "no";
			    }
			    jQuery(this).find(".text").toggle(300);
			});';
		    }
		    #hide show tasks (close)
		    
		    #hide show subprojects (open)
		    if(1==1){
			echo '
			var project_subprojects_general_link = "yes";
			jQuery(".project_subprojects_general_link").click(function(){
			    if(project_subprojects_general_link == "no"){
				jQuery(".project_frame_level2").fadeIn(300);
				project_subprojects_general_link = "yes";
			    }else{
				jQuery(".project_frame_level2").fadeOut(300);
				project_subprojects_general_link = "no";
			    }
			    jQuery(this).find(".text").toggle(300);
			});';
		    }
		    #hide show subprojects (close)
		    
		    #hide show subprojects (open)
		    if(1==1){
			echo '
			jQuery(".project_new_general_link, .project_new_general_link_cancel").click(function(){
			    jQuery(".project_new_div").fadeToggle(300);
			});';
		    }
		    #hide show subprojects (close)
		    
		}
		#general options (close)
		
		#specific options (open)
		if(1==1){
		    
		    #subprojects link (open)
		    if(1==1){
			echo '
			jQuery(".subprojects_link_level1").click(function(){
			    jQuery(this).closest(".project_frame_level1").find(".project_frame_level2").toggle(150);
			});
			jQuery(".subprojects_link_level2").click(function(){
			    jQuery(this).closest(".project_frame_level2").find(".project_frame_level3").toggle(150);
			});';
		    }
		    #subprojects link (close)
		    
		    #task link (open)
		    if(1==1){
			echo '
			jQuery(".task_div_link").click(function(){
			    jQuery(this).closest(".project_div").find(".task_div").toggle(150);
			});';
		    }
		    #task link (close)
		    
		    #task description link (open)
		    if(1==1){
			echo '
			jQuery(".project_name").click(function(){
			    jQuery(this).closest(".project_div").find(".project_description").toggle(150);
			});';
		    }
		    #task description link (close)
		    
		}
		#specific options (close)
		
		#hover div formatting (open)
		if(1==1){
		    echo '
		    jQuery(".content_div").hover(function(){
			jQuery(this).css("background-color","#FFD87D");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })
		    jQuery(".project_div").hover(function(){
			jQuery(this).css("background-color","#FF9B51");
		    },function(){
			jQuery(this).css("background-color","#FFEAB9");
		    })';
		}
		#hover div formatting (close)
		
		#content div (open) #dome
		if(1==5){
		    echo '
		    jQuery(".content_div_title").click(function(){
			jQuery(this).closest(".content_div").find(".content_div_content").fadeToggle(300);
		    })';
		}
		#content div (close)
		
	    echo '
	    });
	</script>';
	
    }
    #jquery (close)
    
}
#projects (close)

#settings (open)
if($page_section == "settings"){
    
    #style (open)
    if(1==1){
	
	echo '
	<style>
	    .content_div{
		border-radius:20px;
		padding:20px;
		background-color:#FFD87D;
		margin:20px 0px;
		text-align:center;
	    }
	    .content_div_level2{
		padding:10px;
		background-color:#FFE7AE;
		margin:10px 0px;
		border-radius:10px;
	    }
	    .content_div_content{
		display:none;
	    }
	    .content_div_title{
		
	    }
	</style>';
	
    }
    #style (close)
    
    #jquery (open)
    if(1==1){
	echo '
	<script>
	    jQuery(document).ready(function(){
		
		jQuery(".content_div_title").click(function(){
		    jQuery(this).closest(".content_div").find(".content_div_content").fadeToggle(150);
		});
		
	    });
	</script>';
    }
    #jquery (close)
    
    #content (open)
    if(1==1){
	
	#function-personal-pages.php (v1.0) (open)
	if(1==1){
	    $function_pers_pages_id = 5;
	    $function_pers_pages_active_page = "Settings";
	    include("#function-personal-pages.php");
	    echo $function_pers_pages;
	    #output: $function_pers_pages_active_page <-- active page in mysql system of theme 2 (mid page) page 1 = 1 (not 0)
	}
	#function-personal-pages.php (v1.0) (close)
	echo "THIS SECTION IS STILL IN DEVELOPMENT."; #dome
	#title table (open)
	if(1==1){
	    echo '
	    <table>
		<tr>
		    <td style="width:70%;padding-right:20px;">';
			
			#left side of container (open)
			if(1==1){
			    
			    #title (open)
			    if(1==1){
					
					#function-breadcrums.php (v3.0) (open)
					if(1==1){
						
						#documentation (open)
						if(1==1){
							
							// Creates breadcrums (links at the top left and right side of the page). These breadcrums help the user to navigate the website.
							
						}
						#documentation (close)
						
						#input (open)
						if(1==1){
							
							$function_breadcrums['input_array'] = [
								'left' => [
									[
										'text' => 'View all development organizations',
										'link' => get_permalink(689)
									]
								]
							];
							// Input array. The array structure must be kept, but you can use as many or few arrays as you wish. Please make sure it looks good on the final site.
							
						}
						#input (close)
						
						include('#function-breadcrums.php');
						
						#output (open)
						if(1==1){
							
							#echo $function_breadcrums['breadcrums']; // Output variable.
							
						}
						#output (close)
						
					}
					#function-breadcrums.php (v3.0) (close)
					
					echo
					$function_breadcrums['breadcrums'].'
					<div style="text-align:center;margin-bottom:30px;">
						<h1 style="display:inline;">
						'.$ngo_row->ngo_name.':
						</h1>
						<br>
						<h3 style="display:inline;">
						Organizational Settings
						</h3>
					</div>';
				
			    }
			    #title (close)
			    
			}
			#left side of container (close)
			
		    echo '
		    </td>
		    <td style="text-align:center;">';
			
			#right side of container (open)
			if(1==1){
			   
			    #ngo logo (open)
			    if(1==1){
			    
				#function-image-processing
				   #ngo logo
				    $function_propic__type = "ngo logo";
				    $function_propic__ngo_id = $ngo_id;
				   #all
				     $function_propic__geometry = array(289,289); //optional, if e.g. only width: 300, NULL; vice versa
				   include('#function-image-processing.php');
				echo '
				<div class="profile_edit_hover voluno_header_picture" style="margin-bottom:20px;">
				    <img class="ngo_logo voluno_brighter_on_hover" src="'.$function_propic.'"
				    >
				</div>';
			    }
			    #ngo logo (close)
			   
			}
			#right side of container (close)
			
		    echo '
		    </td>
		</tr>
	    </table>';
	}
	#title table (close)
	
	#ngo settings array (open)
	if(1==1){
	    
	    #admins (open)
	    if(1==1){
		$ngo_settings_array[]
		    = array(
			'position_name' => 'Administrators',
			'settings' => array(
			    array(
				'display' => 'All administrators can edit settings and member permissions, as well as accept and remove members'
			    ),
			)
		    );
	    }
	    #admins (close)
	    
	    #regular members (open)
	    if(1==1){
		$ngo_settings_array[]
		    = array(
			'position_name' => 'Regular members',
			'settings' => array(
			    array(
				'display' => 'Project management',
				'mysql_name' => 'project_management',
				'type' => 'radio',
				'names' => array(
				    'Only view projects',
				    'Create projects and edit own projects',
				    'Create projects and edit all projects'
				),
				'values' => array(
				    'view_only',
				    'create_edit_own',
				    'create_edit_all'
				)
			    ),
			    array(
				'display' => 'Task management',
				'mysql_name' => 'task_management',
				'type' => 'radio',
				'names' => array(
				    'Only view tasks',
				    'Create new tasks and edit own tasks',
				    'Create new tasks and edit all tasks'
				),
				'values' => array(
				    'view_only',
				    'create_edit_own',
				    'create_edit_all'
				)
			    )
			)
		    );
	    }
	    #regular members (close)
	    
	    #agents (open)
	    if(1==1){
		$ngo_settings_array[]
		    = array(
			'position_name' => 'Agents'
		    );
	    }
	    #agents (close)
	    
	    #active volunteers (open)
	    if(1==1){
		$ngo_settings_array[]
		    = array(
			'position_name' => 'Active Volunteers'
		    );
	    }
	    #active volunteers (close)
	    
	    #previous volunteers (open)
	    if(1==1){
		$ngo_settings_array[]
		    = array(
			'position_name' => 'Previous Volunteers'
		    );
	    }
	    #previous volunteers (close)
	    
	    #non-members (open)
	    if(1==1){
		$ngo_settings_array[]
		    = array(
			'position_name' => 'Non-members',
			'settings' => array(
			    array(
				'display' => 'Can only see public projects, public tasks and content of the public forum'
			    ),
			)
		    );
	    }
	    #non-members (close)
	    
	}
	#ngo settings array (close)
	
	#permissions (open)
	if(1==1){
	    echo '
	    <div class="content_div">
		<form>
		<h4 style="display:inline;">
		    <a style="cursor:pointer;" class="content_div_title">
			Permissions
		    </a>
		</h4>
		<div class="content_div_content">
		    Here, you can edit the default settings which apply to all new members.';
		    
		    
		    #positions loop (open)
		    for($agm=0;$agm<count($ngo_settings_array);$agm++){
			echo '
			<div class="content_div_level2">
			    <div>
				<h5 style="display:inline;">
				    '.$ngo_settings_array[$agm]['position_name'].'
				</h5>
			    </div>';
			    
			    #settings per position (open)
			    for($agn=0;$agn<count($ngo_settings_array[$agm]['settings']);$agn++){
				
				echo '
				<table style="width:49%;display:inline-block;">
				    <tr>
					<td>
					    <span style="font-weight:bold;">
						'.$ngo_settings_array[$agm]['settings'][$agn]['display'].'
					    </span>';
					    
					    #radio (open)
					    if($ngo_settings_array[$agm]['settings'][$agn]['type'] == "radio"){
						echo '
						<table>';
						    
						    #individual options (open)
						    for($agp=0;$agp<count($ngo_settings_array[$agm]['settings'][$agn]['names']);$agp++){
							echo '
							<tr>
							    <td style="width:10px;">
								<input
								    type="radio"
								    style="cursor:pointer;"
								    name="'.$ngo_settings_array[$agm]['settings'][$agn]['mysql_name'].'"
								    id="id_'.$ngo_settings_array[$agm]['settings'][$agn]['mysql_name'].'_'.$agp.'"
								>
							    </td>
							    <td>
								<label
								    for="id_'.$ngo_settings_array[$agm]['settings'][$agn]['mysql_name'].'_'.$agp.'"
								    style="cursor:pointer;"
								>
								    '.$ngo_settings_array[$agm]['settings'][$agn]['names'][$agp].'
								</label>
							    </td>
							</tr>';
						    }
						    #individual options (close)
						    
						echo '
						</table>';
					    }
					    #radio (close)
					    
					    #fixed (open)
					    if(empty($ngo_settings_array[$agm]['settings'][$agn]['names'])){
						echo '
						<span style="color:grey;">
						    (fixed)
						</span>';
					    }
					    #fixed (close)
					    
					echo '
					</td>
				    </tr>
				</table>';
				
			    }
			    #settings per position (close)
			    
			echo '
			</div>';
		    }
		    #positions loop (close)
		    
		echo '
		</div>
		</form>
	    </div>';
	}
	#permissions (close)
	
	#delete ngo (open)
	if(1==1){
	    
	    echo '
	    <div class="content_div">
		<h4 style="display:inline;">
		    <a style="cursor:pointer;" class="content_div_title">
			Account
		    </a>
		</h4>
		<div class="content_div_content">
		    <div style="color:red;font-weight:bold;font-size:120%;padding:20px;">
			Delete organization
		    </div>
		    <div
			style="
			    padding:20px;
			    border-radius:20px;
			    border:1px solid black;
			    position:absolute;
			"
			class="delete_ngo"
		    >
			
		    </div>
		</div>
	    </div>';
	    
	}
	#delete ngo (open)
	
    }
    #content (close)
    
}
#settings (close)

?>