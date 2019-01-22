<?php


#mysql (open)
if(isset($_POST['name']) AND $_POST['captcha1'] == $_POST['captcha2']){
    
    #function-sanitize-text.php
        $function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)";
        $function_sanitize_text__text = $_POST['name'];
        include('#function-sanitize-text.php');
        $message_sender_name = $function_sanitize_text__text_sanitized;

    #function-sanitize-text.php
        $function_sanitize_text__type = "email address";
        $function_sanitize_text__text = $_POST['email'];
        include('#function-sanitize-text.php');
        $message_sender_email = $function_sanitize_text__text_sanitized;

    #function-sanitize-text.php
        $function_sanitize_text__type = "plain text with line breaks (biography)";
        $function_sanitize_text__text = $_POST['message'];
        include('#function-sanitize-text.php');
        $message_sender_message = $function_sanitize_text__text_sanitized;

    if(is_email($message_sender_email) AND !empty($message_sender_name) AND !empty($message_sender_message)){
        
	#function-emails.php (v1.0) (open)
	if(1==1){
	    $function_admin_emails['recipient_id_or_email_address'] = "info@voluno.org"; //finds email address, default is steve's id (1). also accepts mail addresse
	    $function_admin_emails['email_content_id'] = 1; //please select id
	    $function_admin_emails['placeholders'] =
	    array(
		array(
		    'ph_name' => 'sender_name',
		    'ph_value' => $message_sender_name
		),
		array(
		    'ph_name' => 'sender_email',
		    'ph_value' => $message_sender_email
		),
		array(
		    'ph_name' => 'message_content',
		    'ph_value' => '<p>'.$message_sender_message.'</p>'
		),
		array(
		    'ph_name' => 'message_date_time',
		    'ph_value' => date("Y-m-d H:i:s").' (UTC)'
		)
	    );
	    include('#function-emails.php');
	    #output: $function_admin_emails == TRUE or FALSE if sent successfully
	}
	#function-emails.php (v1.0) (close)
	
        $email_was_probably_sent = $function_admin_emails;
	
    }

}
#mysql (close)

#style (open)
if(1==1){
    echo '
    <style>
    
        .contact_form input{
            width:50%;
        }
        
        .contact_form textarea{
            width:100%;
            resize:vertical;
        }
        
        .title_cell{
            width:150px;
            font-weight:bold;
            text-align:right;
            padding-right:15px !important;
        }
        
        .warnings_notifications{
            color:red;
            display:none;
        }
        
    </style>';
}
#style (close)

#content (open)
if(1==1){

    #title and image (open)
    if(1==1){
        #function-image-processing
            #thematic only
              $function_propic__type = "thematic";
              $function_propic__original_img_name = "home-(6).jpg";
           #all
             $function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
           include('#function-image-processing.php');
           
        echo '
        <img class="voluno_header_picture" src="'.$function_propic.'">
        <h1 style="display:inline;">
            Contact Us
        </h1>';
    }
    #title and image (close)
    
    #intro text (open)
    if(1==1){
        echo '
        <br>
        <br>';
		
		#function-fixed-div.php type 2 (v1.0) (open)
		if($email_was_probably_sent == TRUE){
			
			#$function_fixed_div['class_name'] = 'mysql_loaded_code'; //optional, only needed if you want to use this
			$function_fixed_div['title'] = 'Your message was successfully sent!';
			$function_fixed_div['text'] = 'Thank you for sending it. We\'ll respond as quickly as possible.';
			$function_fixed_div['text_text_align'] = "center"; //default:justify
			$function_fixed_div['dark_bg_div'] = "yes"; //default: no
			$function_fixed_div['hide_button_text'] = "Hide"; //default: Hide
			$function_fixed_div['width'] = 250; //default:250 (px)
			$function_fixed_div['hide_after_x_milliseconds'] = 5000; //default: empty, don't fade out
			
			$function_fixed_div__version = 2; //obligatory
			include('#function-fixed-div.php');
			echo $function_fixed_div;
			
			#automatically fades in itself and fadesout the load img
			
		}
		#function-fixed-div.php type 2 (v1.0) (close)
		
		echo '
		<p>
			We\'re always happy to hear from you!
			<br>
			<br>
			'.#To register as a volunteer, development worker or any other position, please click
			#<a href="'.get_permalink(426).'">here</a>.
			#<br>
			'You can reach us by filling out the form below or via:
			<br>
			<br>
		</p>
		<ul>
			<li>
				<b>E-Mail:</b> '.antispambot("info@voluno.org").'
			</li>
			<li>
				<b>Phone:</b> +49 176 - 521 303 16 (international)
				<br>
				<span style="visibility: hidden;">
					<b>Phone:</b>
				</span>
				+0176 - 521 303 16 (from within Germany)
				<br>
			</li>
		</ul>
		<br>
		You can also follow us on
		<b>
			<a href="https://www.facebook.com/pages/Voluno/1456801497924331?sk=timeline" title="Visit us on Facebook">
				Facebook</a></b>,
		<b>
			<a href="https://twitter.com/VolunoOrg" title="Visit us on Twitter">
				Twitter
			</a>
		</b>
		or
		<b>
			<a href="https://www.youtube.com/channel/UC2ZF__EFSyw3qJ0KDjg_P4w/feed" title="Follow our Youtube Channel">
				Youtube'.
		'</a>'.
	    '</b>.
        <br>
        <br>
        </p>';
    }
    #intro text (close)
    
    #form (open)
    if(1==1){
        echo '
        <form method="post" action="'.get_permalink().'" name="contact_form" class="contact_form">
            <table style="width:80%;">';
		
                #name (open)
                if(1==1){
                    echo '
                    <tr>
                        <td class="title_cell">
                            Full name:
                        </td>
                        <td class="input_cell">
                            <input type="text" name="name" class="contact_form_name">
                            <div class="warning_name warnings_notifications">
                                Please provide your name.
                            </div>
                        </td>
                    </tr>';
                }
                #name (close)
                
                #email address (open)
                if(1==1){
                    echo '
                    <tr>
                        <td class="title_cell">
                            Email:
                        </td>
                        <td class="input_cell">
                            <input type="text" name="email" class="contact_form_email">
                            <div class="warning_email1 warnings_notifications">
                                Please provide an email address.
                            </div>
                            <div class="warning_email2 warnings_notifications">
                                Invalid email format. Please check your email address.
                            </div>
                        </td>
                    </tr>';
                }
                #email address (close)
                
                #message (open)
                if(1==1){
                echo '
                <tr>
                    <td class="title_cell">
                        Message:
                    </td>
                    <td class="input_cell">
                        <textarea name="message" style="height:8em;" class="contact_form_textarea"></textarea>
                        <div class="warning_textarea warnings_notifications">
                            Please write a message.
                        </div>
                    </td>
                </tr>';
                }
                #message (close)
                
                #calculation (open)
                if(1==1){
                    echo '
                    <tr>
                        <td class="title_cell">
                            Please calculate:
                        </td>
                        <td class="input_cell">';
                            $captcha1 = mt_rand(1,50);
                            $captcha2 = mt_rand(1,50);
                            echo '
                            '.$captcha1.' + '.$captcha2.' =
                            <input type="text" maxlength="3" name="captcha1" class="captcha1" style="width:30px;">
                            <input type="hidden" name="captcha2" value="'.($captcha1+$captcha2).'" class="captcha2">
                            <span class="warning_calculation1 warnings_notifications">
                                Please solve the equation.
                            </span>
                            <span class="warning_calculation2 warnings_notifications">
                                Incorrect value. Please check your calculation.
                            </span>
                        </td>
                    </tr>';
                }
                #calculation (close)
                
                #submit (open)
                if(1==1){
                    echo '
                    <tr>
                        <td>
                        </td>
                        <td>
                            <div class="voluno_button send_message_button" style="width:50px;margin:auto;">
                                Send
                            </div>
                        </td>
                    </tr>';
                }
                #submit (close)
                
            echo '
            </table>
        </form>';
    }
    #form (close)

}
#content (close)

#jquery (open)
if(1==1){
    echo '
    <script>
        jQuery(document).ready(function(){
        
            jQuery(".send_message_button").click(function(){
                
                var generalError = 0;
                
                if(jQuery(".contact_form_name").val() == ""){
                    jQuery(".warning_name").fadeIn(300);
                    generalError = 1;
                }
                
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                
                if(jQuery(".contact_form_email").val() == ""){
                    jQuery(".warning_email1").fadeIn(300);
                    generalError = 1;
                }else if(  !regex.test( jQuery(".contact_form_email").val() )  ){
                    jQuery(".warning_email2").fadeIn(300);
                    generalError = 1;
                }
                
                if(jQuery(".contact_form_textarea").val() == ""){
                    jQuery(".warning_textarea").fadeIn(300);
                    generalError = 1;
                }
                
                if(jQuery(".captcha1").val() == ""){
                    jQuery(".warning_calculation1").fadeIn(300);
                    generalError = 1;
                }else if(jQuery(".captcha1").val() != jQuery(".captcha2").val()){
                    jQuery(".warning_calculation2").fadeIn(300);
                    generalError = 1;
                }
                
                if(generalError == 0){
                    jQuery(".contact_form").submit();
                }
                
            });
            
            jQuery(".contact_form_name, .contact_form_email, .contact_form_textarea, .captcha1").focus(function(){
                jQuery(".warnings_notifications").fadeOut(300);
            });
            
        });
    </script>';
}
#jquery (close)

?>