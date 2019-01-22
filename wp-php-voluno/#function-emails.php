<?php

#prepair variables (open)
if(1==1){

    #get recipient email address (open)
    if(1==1){ //2
		
		#if email address is a number, it's the user id. get address from user id (open)
		if(is_numeric($function_admin_emails['recipient_id_or_email_address'])){
			
			$function_admin_emails_internal['user_id'] = $function_admin_emails['recipient_id_or_email_address'];
			
			$function_admin_emails_internal['recipients_query'] = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_users_extended
											WHERE usersext_id = %s;'
											,$function_admin_emails_internal['user_id']);
			$function_admin_emails_internal['recipients_row'] = $GLOBALS['wpdb']->get_row($function_admin_emails_internal['recipients_query']);
			
			$function_admin_emails_internal['recipient_email_adress'] = $function_admin_emails_internal['recipients_row']->usersext_userEmail;
			
		}else{
			$function_admin_emails_internal['recipient_email_adress'] = $function_admin_emails['recipient_id_or_email_address'];
		}
		#if email address is a number, it's the user id. get address from user id (close)
		
    }
    #get recipient email address (close)
    
    #get content + title + sender (open)
    if(1==1){//3
		
		#get email template (open)
		$function_admin_emails_internal['content_query'] = $GLOBALS['wpdb']->prepare('SELECT *
											FROM fi4l3fg_voluno_lists_emails
											WHERE email_id = %d;'
											,$function_admin_emails['email_content_id']);
		$function_admin_emails_internal['content_row'] = $GLOBALS['wpdb']->get_row($function_admin_emails_internal['content_query']);
		#get email template (close)
		
		$function_admin_emails_internal['content_final'] = $function_admin_emails_internal['content_row']->email_content;
		$function_admin_emails_internal['sender'] = $function_admin_emails_internal['content_row']->email_sender;
		$function_admin_emails_internal['title'] = $function_admin_emails_internal['content_row']->email_title;
		$function_admin_emails_internal['placeholder_code'] = 'placeholder32hf79hr334f3g0hg2h9';
		
		#replace template placeholders with actual content (open)
		for($adt=0;$adt<count($function_admin_emails['placeholders']);$adt++){
			$function_admin_emails_internal['title'] = str_replace(
			$function_admin_emails_internal['placeholder_code'].$function_admin_emails['placeholders'][$adt]['ph_name'],
			$function_admin_emails['placeholders'][$adt]['ph_value'],
			$function_admin_emails_internal['title']
			);
			$function_admin_emails_internal['content_final'] = str_replace(
			$function_admin_emails_internal['placeholder_code'].$function_admin_emails['placeholders'][$adt]['ph_name'],
			$function_admin_emails['placeholders'][$adt]['ph_value'],
			$function_admin_emails_internal['content_final']
			);
			$function_admin_emails_internal['sender'] = str_replace(
			$function_admin_emails_internal['placeholder_code'].$function_admin_emails['placeholders'][$adt]['ph_name'],
			$function_admin_emails['placeholders'][$adt]['ph_value'],
			$function_admin_emails_internal['sender']
			);
		}
		#replace template placeholders with actual content (close)
		
    }
    #get content + title + sender (close)
    
    #sanitize title (open)
    if(1==1){//4
		
		#function-sanitize-text.php (v1.0) (open)
		if(1==1){
			
			$function_sanitize_text__type = "one line unformatted text (city, name, occupation, etc.)"; //obligatory
			/*
			one line unformatted text (city, name, occupation, etc.)
			url readable text (url, user_nicename, etc.) (sanitize_title)
			email address
			plain text with line breaks (biography)
			*/
			$function_sanitize_text__text = $function_admin_emails_internal['title'];
			include('#function-sanitize-text.php');
			#output: $function_sanitize_text__text_sanitized;
			$function_admin_emails_internal['title'] = html_entity_decode($function_sanitize_text__text_sanitized, ENT_QUOTES, 'UTF-8' );
			
		}
		#function-sanitize-text.php (v1.0) (close)
		
    }
    #sanitize title (close)
    
    #content: html frame + content input + signature (open)
    if(1==1){//5
		
		#email container (open)
		if(1==1){
			
			#content open (open)
			if(1==1){
				
				$function_admin_emails_internal['content_open'] = '
				<!DOCTYPE html>
					<html>
					<head>
					<title>Voluno</title>
					<meta charset="UTF-8">
					<style>
						h1{
						color:#8B0F37;
						font-family:Arial,Helvetica,sans-serif;
						}
						table{
						border-spacing:0;
						border-collapse:collapse;
						}
						td{
						padding:0px;
						}
						body{
						background-color:#8B0000;
						text-align:center;
						padding:20px;
						}
						.content_div{
						text-align:justify;
						display:inline-block;
						background-color:#fff;
						margin:auto;
						min-width:400px;
						max-width:700px;
						border-radius:30px;
						padding:30px;
						font-size:16px;
						word-wrap: break-word;
						}
						.p{
						line-height:110%;
						margin-bottom:0.5em;
						font-family:Arial,Helvetica,sans-serif;
						font-size:16px;
						}
						.unsubscribe_div{
						color:#fff;
						padding:10px;
						font-size:75%;
						}
						.unsubscribe_div a{
						color:#fff;
						}
						a:hover{
						color:#F86A00;
						}
						'.$function_admin_emails_internal['content_row']->email_content_style.'
					</style>
					</head>
					<body>
					<div class="content_div">';
					
			}
			#content open (close)
			
			#unsubscribe menu (open)
			if(!empty($function_admin_emails_internal['content_row']->email_mysettings_mysql) AND is_numeric($function_admin_emails_internal['user_id'])){
				//only appears if: 1.) it's possible to unsubscribe from this type of email, 2.) there is a user id given
				//9
				
				#unsubscribe code (I/II): create code (open)
				if(1==1){
					
					#random number (open)
					if(1==1){
					unset($function_admin_emails_internal['unsubscribe_code_this']);
					$length = 150;
					for($i = 0; $i < $length; $i++) {
						$function_admin_emails_internal['unsubscribe_code_this']
						= $function_admin_emails_internal['unsubscribe_code_this'].
						substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
					}
					
					unset($function_admin_emails_internal['unsubscribe_code_all']);
					$length = 150;
					for($i = 0; $i < $length; $i++) {
						$function_admin_emails_internal['unsubscribe_code_all']
						= $function_admin_emails_internal['unsubscribe_code_all'].
						substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
					}
					}
					#random number (close
					
				}
				#unsubscribe code (I/II): create code (close)
				
				#unsubscribe content (open)
				if(1==1){
					$function_admin_emails_internal['unsubscribe_menu'] = '
					<div class="unsubscribe_div">
						<a
						href="'.
							get_permalink(838).
							'?code='.$function_admin_emails_internal['unsubscribe_code_this'].
						'"
						>
						Unsubscribe from this type of mail'.
						'</a>
						|
						<a
						href="'.
							get_permalink(838).
							'?code='.$function_admin_emails_internal['unsubscribe_code_all'].
						'"
						>
						Unsubscribe from all notification mails'.
						'</a>
						|
						<a
						href="'.
							get_permalink(770).
						'"
						>
						Edit subscription settings
						</a>
					</div>';
				}
				#unsubscribe content (close)
				
			}
			#unsubscribe menu (close)
			
			#content close (open)
			if(1==1){
				$function_admin_emails_internal['content_close'] = '
					</div>
					'.$function_admin_emails_internal['unsubscribe_menu'].'
					</body>
				</html>';
			}
			#content close (close)
			
		}
		#email container (close)
		
		#signature (open)
		if(1==1){
			
			unset($function_admin_emails_internal['signature']);
			
			#sender name and info (open)
			if(1==1){
				$function_admin_emails_internal['signature'] .= '
				<p>
					Your Voluno Team
				</p>
				<br>
				<br>
				<p>
					<strong>
					Voluno &ndash; The Volunteer Net Work for Development
					</strong>
				</p>
				<p>
					Voluno e.V. in Germany (currently being set up)
				</p>';
			}
			#sender name and info (close)
			
			#contact information (open)
			if(1==1){
				$function_admin_emails_internal['signature'] .= '
				<p>
					Tel.: +49-(0)176 521 303 16
				</p>
				<p>
					E-mail:
					<a href="mailto:info@voluno.org" title="Send an email to: info@voluno.org">
					  info@voluno.org
					</a>
				</p>
				<p>
					Website:
					<a href="https://www.voluno.org/" title="Visit https://www.voluno.org/">
					  www.voluno.org
					</a>
				</p>
				<p>
					Address: Heidberg 18, 22301 Hamburg, Germany
				</p>';
			}
			#contact information (close)
			
			#social media (open)
			if(1==1){
				$function_admin_emails_internal['signature'] .= '
				<p>
					Follow us on 
					<a href="https://www.facebook.com/pages/Voluno/1456801497924331?sk=timeline">
					Facebook'.
					'</a>,
					<a href="https://www.youtube.com/channel/UC2ZF__EFSyw3qJ0KDjg_P4w">
					Youtube
					</a>
					and 
					<a href="https://twitter.com/VolunoOrg">
					Twitter'.
					'</a>.
				</p>';
			}
			#social media (close)
			
			#img (open)
			if(1==1){
				$function_admin_emails_internal['signature'] .= '
				<br>
				<img 
					alt="Voluno. stay home. take action." 
					src="'.wp_upload_dir()['url'].'/mail-logo.png" 
					width=207
					height=73
				>
				<br>
				<br>';
			}
			#img (close)
			
		}
		#signature (close)
		
		$function_admin_emails_internal['content_full'] = 
			$function_admin_emails_internal['content_open'].
			$function_admin_emails_internal['content_final'].
			$function_admin_emails_internal['signature'].
			$function_admin_emails_internal['content_close'];
			
    }
    #content: html frame + content input + signature (close)
    
    #headers (open)
    if(1==1){//6
		if(empty($function_admin_emails_internal['sender'])){
			$function_admin_emails_internal['sender'] = "Voluno.org <info@voluno.org>";
		}
		
		$function_admin_emails_internal['sender_headers'] =  //line delimiter must be exactly: ."\r\n"
			'From: '.$function_admin_emails_internal['sender']."\r\n".
			'Bcc: email-backup@voluno.org'."\r\n".
			'Content-type: text/html;charset=UTF-8'."\r\n";
			'Reply-To: info@voluno.org'."\r\n";
    }
    #headers (close)
    
}
#prepare variables (close)

#check recipient mail settings (open)
if( //7
   !empty($function_admin_emails_internal['user_id'])
   AND !empty($function_admin_emails_internal['content_row']->email_mysettings_mysql)){
    
    #function-get-user-settings.php (v1.0) (open)
    if(1==1){
		$function_get_user_settings = $function_admin_emails_internal['user_id']; //user id. default is current user
		include('#function-get-user-settings.php');
		#output array (value: yes or no, keys: settings name): $function_get_user_settings
		//if no user value, use default as defined in my settings php
    }
    #function-get-user-settings.php (v1.0) (close)
    
    if(
			$function_get_user_settings[$function_admin_emails_internal['content_row']->email_mysettings_mysql] == "yes"
		AND
			$function_get_user_settings['email_general__disable_all_regular_emails'] == "no"
    ){
		$function_admin_emails_internal['user_wants_to_receive_this_mail'] = "yes";
    }
    
}
#check recipient mail settings (close)

#send email + unsubscribe code (open)
if(//8
   $function_admin_emails_internal['user_wants_to_receive_this_mail'] == "yes" //settings say yes
    OR
    empty($function_admin_emails_internal['content_row']->email_mysettings_mysql) //email is optional (may be turned off)
    OR
    is_email($function_admin_emails['recipient_id_or_email_address'])
){
    //the user wants to receive (this) mail OR this is an important, non-optional mail
    
    #test for processing of file hhh
    if(2==1){
	echo '
	<br><br><br><br>
	user id: '.$function_admin_emails_internal['user_id'].'
	<br>
	specific: '.$function_get_user_settings[$function_admin_emails_internal['content_row']->email_mysettings_mysql].'
	<br>
	mysql name: '.$function_admin_emails_internal['content_row']->email_mysettings_mysql.'
	<br>
	general: '.$function_get_user_settings['email_general__disable_all_regular_emails'].'
	<br><br><br><br>
	  <br><br><br><br><br><br>email address: '.$function_admin_emails_internal['recipient_email_adress'].
	  '<br> title: '.$function_admin_emails_internal['title'].
	  '<br> content: '.$function_admin_emails_internal['content_full'].
	  '<br> header1: '.esc_html($function_admin_emails_internal['sender_headers'][0]).
	  '<br> header2: '.$function_admin_emails_internal['sender_headers'][1].
	  '<br> headers full'.$function_admin_emails_internal['sender_headers'].
	  '<br><br><br><br><br><br><br>';
    }
    #testing
    
    $function_admin_emails_internal['wp_function_mail'] = mail(
	$function_admin_emails_internal['recipient_email_adress'],
	$function_admin_emails_internal['title'],
	$function_admin_emails_internal['content_full'],
	$function_admin_emails_internal['sender_headers']
    );
    $function_admin_emails = $function_admin_emails_internal['wp_function_mail'];
    
    #unsubscribe code (II/II): database insert (open)
    if(!empty($function_admin_emails_internal['content_row']->email_mysettings_mysql)){ //10
		
		#database query insert (open)
		if(1==1){
			
			$function_admin_emails_internal['unsubscribe_code_array'] = array(
			array(
				'code' => $function_admin_emails_internal['unsubscribe_code_this'],
				'mysql' => $function_admin_emails_internal['content_row']->email_mysettings_mysql
			),
			array(
				'code' => $function_admin_emails_internal['unsubscribe_code_all'],
				'mysql' => 'email_general__disable_all_regular_emails'
			)
			);
			
			#
			for($aea=0;$aea<2;$aea++){
			
			$GLOBALS['wpdb']->insert(
					'fi4l3fg_voluno_email_edit_subscription_codes',
				array(
					'unsubscribe_setting' => $function_admin_emails_internal['unsubscribe_code_array'][$aea]['mysql'],
					'unsubscribe_user' => $function_admin_emails_internal['user_id'],
					'unsubscribe_code' => $function_admin_emails_internal['unsubscribe_code_array'][$aea]['code'],
					
					'unsubscribe_date_modified' => date("Y-m-d H:i:s"),
					'unsubscribe_date_created' => date("Y-m-d H:i:s"),
					),
				array(
					'%s','%s','%s',
					'%s','%s'
					));
			
			}
			#
			
		}
		#database query insert (close)
		
    }
    #unsubscribe code (II/II): database insert (close)
    
}
#send email + unsubscribe code (close)

#unset (open)
if(1==1){
    unset(
	$function_admin_emails_internal
    );
}
#unset (close)
 
?>