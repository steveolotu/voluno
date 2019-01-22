<?php

#url readable text (url, user_nicename, etc.) (sanitize_title) (open)
if($function_sanitize_text__type == "url readable text (url, user_nicename, etc.) (sanitize_title)"){
  $function_sanitize_text__text_sanitized = sanitize_title($function_sanitize_text__text);
}
#url readable text (url, user_nicename, etc.) (sanitize_title) (close)

#one line unformatted text (city, name, occupation, etc.) (open)
if($function_sanitize_text__type == "one line unformatted text (city, name, occupation, etc.)"){
  $function_sanitize_text__text_sanitized = htmlspecialchars(stripslashes(sanitize_text_field($function_sanitize_text__text)));
}
#one line unformatted text (city, name, occupation, etc.) (close)

#email address (open)
if($function_sanitize_text__type == "email address"){
  $function_sanitize_text__text_sanitized = sanitize_email($function_sanitize_text__text);
}
#email address (close)

#plain text with line breaks (biography) (open)
if($function_sanitize_text__type == "plain text with line breaks (biography)"){

  if($function_sanitize_text__reverse == "yes"){
    
    unset($function_sanitize_text__reverse);
    $function_sanitize_text__text_sanitized = /*htmlspecialchars_decode(*/str_replace("<br>","",$function_sanitize_text__text)/*,ENT_QUOTES)*/;
    
  }else{
    
    $function_sanitize_text__text_sanitized = nl2br(esc_html(stripslashes($function_sanitize_text__text)), false);
    #$function_sanitize_text__text_sanitized = stripslashes(nl2br($function_sanitize_text__text));
    
  }
  
}
#plain text with line breaks (biography) (close)

#plain text with line breaks (biography) for email (open)
if($function_sanitize_text__type == "plain text with line breaks (biography) for email"){
    
    $function_sanitize_text__text = nl2br(esc_html(stripslashes($function_sanitize_text__text)), false);
    $function_sanitize_text__text = explode("<br>",$function_sanitize_text__text);
    
    for($ahd=0;$ahd<count($function_sanitize_text__text);$ahd++){
	$function_sanitize_text__text[$ahd] = '<p>'.$function_sanitize_text__text[$ahd].'</p>';
    }
    
    $function_sanitize_text__text_sanitized = implode(' ',$function_sanitize_text__text);
    
}
#plain text with line breaks (biography) for email (close)

#code (php files) (open)
if($function_sanitize_text__type == "code (php files)"){
    
    $function_sanitize_text__text_sanitized = nl2br(esc_textarea($function_sanitize_text__text), false);
    
}
#code (php files) (close)

#code (php files with whitespaces) (open)
if($function_sanitize_text__type == "code (php files with whitespaces)"){
    
    $function_sanitize_text__text_sanitized = str_replace('  ','5349642563206031667964ws',$function_sanitize_text__text); //save whitespaces
	$function_sanitize_text__text_sanitized = str_replace("\t",'5349642563206031667964tab',$function_sanitize_text__text_sanitized); //save tabs
	
	$function_sanitize_text__text_sanitized = nl2br(esc_textarea($function_sanitize_text__text_sanitized), false); //regular espacing
	
	$function_sanitize_text__text_sanitized = str_replace('5349642563206031667964ws','&nbsp;&nbsp;',$function_sanitize_text__text_sanitized); //bring back whitespaces
	$function_sanitize_text__text_sanitized = str_replace("5349642563206031667964tab",'&nbsp;&nbsp;&nbsp;&nbsp;',$function_sanitize_text__text_sanitized); //bring back tabs
    
#	if(empty($ddd)){
	 # echo $function_sanitize_text__text_sanitized;
#	  $ddd = 1;
#	}
	
}
#code (php files with whitespaces) (close)

unset(
    $function_sanitize_text__type,
    $function_sanitize_text__reverse,
    $function_sanitize_text__text
);

#OLD, please check and or delete
if(1==1){
    
    /*
    voluno message content
    - no idea where i used this, probably messages
    
    text field
    - update profile
    
    one line unformatted text (city, name, occupation, etc.)
    - update profile
    
    */
    
    
    #ONLY USE THESE ONES
    
    
    
    
    
    
    
    #DOME
    #check this out!
    #$message_sender_message  = implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $_POST['message'] ) ) );
    
    /* list of code of which i'm not sure whats best and when to use what
     *
     *  $function_sanitize_text__text_sanitized = nl2br($function_sanitize_text__text, false);
     *   $function_sanitize_text__text_sanitized = str_replace("</br>/","\r\n",$function_sanitize_text__text );
    
                #function-allowed-tags.php
                  include('#function-allowed-tags.php');
                  wp_kses(nl2br(),$allowedtags)
                  
                addslashes()
                  
                esc_html($value);
                $value = html_entity_decode($value);
                
                esc_textarea(wpautop($_POST[
                html_entity_decode
                
                #function-allowed-tags.php
                  include('#function-allowed-tags.php');
                  $applicationText = wp_kses(nl2br($applicationText),$allowedtags);
                
              'voluno_for_dis_update_id' => intval($_POST['new_discussion_title_id'])
              sanitize_text_field
              
              htmlentities //encode it (display "<br>" as text, not execute code)
              html_entity_decode //decode it
    */
}
#

?>