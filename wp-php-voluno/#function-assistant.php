<?php

if(in_array(get_current_user_id(),[5355,8084])){ ### #todolist

#documentation (open)
if(0!=0){
	
	##manual (open)
	if(1==1){
		
		#function-assistant.php (v1.0) (open)
		if(1==1){
			
			#documentation (open)
			if(1==1){
				
				// Guides the user through the Voluno website.
				
			}
			#documentation (close)
			
			// no input
			
			include('#function-assistant.php');
			
			#output (open)
			if(1==1){
				
				#echo $function_assistant['output']; // Output. Either on the right side of the page or on the page itself, it is the homepage.
				
			}
			#output (close)
			
		}
		#function-assistant.php (v1.0) (close)
		
	}
	##manual (close)
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2000.09.17, Steve
		## Last format and structure check: 2000.09.17, Steve
		## Last update of all instances this function is used: 2000.09.17, Steve
		
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

// If there is an input, always transform it like this.
// From then on, only define variables in the form:
//    $function_assistant['internal']['xxx']
// To output a variable, see below.

#input + var definitions (open)
if(1==1){ ///1
	
	$function_assistant['internal'] = $function_assistant;
	
}
#input + var definitions (close)

//    $GLOBALS['voluno_variables']['#function-assistant.php']['xxx'] = 1;
//    voluno_function_example_xxx

#content (open)
if(1==1){
	
	#mysql + array creation (open)
	if(1==1){
		
		#query (open)
		if(1==1){
			
			$function_assistant['internal']['general_query'] = $GLOBALS['wpdb']->prepare(
				'SELECT *
				FROM fi4l3fg_voluno_assistant
				WHERE assist_user =%s;',
				$GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['user_id']
			);
			$function_assistant['internal']['general_results'] = $GLOBALS['wpdb']->get_results($function_assistant['internal']['general_query']);
			
		}
		#query (close)
		
		#array creation loop (open)
		for($ami=0;$ami<count($function_assistant['internal']['general_results']);$ami++){
			
			$function_assistant['internal']['general_array'][$function_assistant['internal']['general_results'][$ami]->assist_type_id]
			= $function_assistant['internal']['general_results'][$ami]->assist_content;
			
		}
		#array creation loop (close)
		
	}
	#mysql + array creation (close)
	
	#jquery (open)
	if(1==1){
		
		echo '
		<script>
			jQuery(document).ready(function(){';
				
				#xxx (open)
				if(1==2){
					
					echo '
					jQuery(".voluno_").
					});';
					
				}
				#xxx (close)
				
			echo '
			});
		</script>';
		
	}
	#jquery (close)
	
	#content (open)
	if(1==1){
		
		#
		if(1==2){
		for($aln=0;$aln<count($function_assistant['internal']['xxx results']);$aln++){
			
			$function_assistant['internal']['messages array'] =
			[
				$function_assistant['internal']['xxx results'][$aln]->assist_name => $function_assistant['internal']['xxx results'][$aln]->assist_content
				#[
				#	'content' -> $function_assistant['internal']['xxx results'][$aln]->assist_content
				#]
			];
			
		}
		}
		#
		
		#preparation of element creation (open)
		if(1==1){
			

			
		}
		#preparation of element creation (close)
		
		#element creation and checking (open)
		if(1==1){
			
			#Welcome message #1 (open)
			if($function_assistant['internal']['general_array']['welcome_message'] != 'deactivated'){
				
				#prepare (open)
				if(1==1){
					
					#function-image-processing.php (v1.0) (open)
					if(1==1){
						
						#thematic only
							$function_propic__type = 'thematic';
							$function_propic__original_img_name = 'task_group.png';
							#$function_propic__cropping = “yes”; //yes or empty (default)
						#all
							$function_propic__geometry = array(120,NULL); //optional, if e.g. only width: 300, NULL; vice versa
							#$function_propic__rotate = 180; //optional, default: 0
						include('#function-image-processing.php');
						$function_assistant['internal']['type_1']['image_welcome'] = $function_propic;
						#$function_propic__image_available <- is set to yes or no
						
					}
					#function-image-processing.php (v1.0) (close)
					
				}
				#prepare (close)
				
				#content (open)
				if(1==1){
					
					$function_assistant['internal']['elements_array'][] = '
					<h4 style="display:inline;">
						Welcome to Voluno!
					</h4>
					<div style="overflow:hidden;">
						<img src="'.$function_assistant['internal']['type_1']['image_welcome'].'" style="float:right;margin-left:20px;" class="voluno_brighter_on_hover">
						<p>
							We\'re excited to welcome you to the Voluno family! Whether you want to help development as a volunteer,
							need help for your development organization, want to learn more about Voluno or just wanted to take a look around:
							We\'re glad that you have taken the time.
						</p>
					</div>';
					
				}
				#content (close)
				
			}
			#Welcome message #1 (close)
			
			#contact #4 (open)
			if($function_assistant['internal']['general_array']['welcome_message'] != 'deactivated'){
				
				#prepare (open)
				if(1==1){
					
					#function-image-processing.php (v1.0) (open)
					if(1==1){
						
						#thematic only
							$function_propic__type = 'thematic';
							$function_propic__original_img_name = 'chat-message.png';
							#$function_propic__cropping = “yes”; //yes or empty (default)
						#all
							$function_propic__geometry = array(80,NULL); //optional, if e.g. only width: 300, NULL; vice versa
							#$function_propic__rotate = 180; //optional, default: 0
						include('#function-image-processing.php');
						$function_assistant['internal']['type_1']['image_communication'] = $function_propic;
						#$function_propic__image_available <- is set to yes or no
						
					}
					#function-image-processing.php (v1.0) (close)
					
				}
				#prepare (close)
				
				#content (open)
				if(1==1){
					
					$function_assistant['internal']['elements_array'][] = '
					<h4>
						We\'re happy to answer all of your questions
					</h4>
					<table>
						<tr>
							<td style="width:100px;">
								<img src="'.$function_assistant['internal']['type_1']['image_communication'].'" class="voluno_brighter_on_hover">
							</td>
							<td>
								<p>
									If you need assistance or have questions, please don\'t hesitate to ask:
								</p>
								<ul>
									<li>
										You can ask open questions in our
										<a href="'.get_permalink(738).'">community forums</a>,
									</li>
									<li>
										<a href="'.get_permalink(689).'">find and contact specific NGOs and volunteers</a> or
									</li>
									<li>
										contact us directly via '.antispambot("info@voluno.org").' or via our <a href="'.get_permalink(638).'">contact form</a>.
									</li>
								</ul>
							</td>
						</tr>
					</table>';
					
				}
				#content (close)
				
			}
			#contact #4 (close)
			
			#agents and assistent #5 (open)
			if($function_assistant['internal']['general_array']['welcome_message'] != 'deactivated'){
				
				#prepare (open)
				if(1==1){
					
					#function-image-processing.php (v1.0) (open)
					if(1==1){
						
						#thematic only
							$function_propic__type = 'thematic';
							$function_propic__original_img_name = 'voluno_img_3872.png';
						#all
							$function_propic__geometry = array(500,NULL); //optional, if e.g. only width: 300, NULL; vice versa
						include('#function-image-processing.php');
						$function_assistant['internal']['type_1']['image_agents'] = $function_propic;
						#$function_propic__image_available <- is set to yes or no
						
					}
					#function-image-processing.php (v1.0) (close)
					
				}
				#prepare (close)
				
				#content (open)
				if(1==1){
					
					$function_assistant['internal']['elements_array'][] = '
					<h4>
						Great service = more development
					</h4>
					<p>
						Our mission is to facilitate development work via the best possible service. To do this, we follow two main strategies:
					</p>
					<ul>
						<li>
							<div>
								<img src="'.$function_assistant['internal']['type_1']['image_agents'].'" style="float:right;margin-left:20px;" class="voluno_brighter_on_hover">
								To facilitate the administrative work when using Voluno (setting up the account, finding partners, coordinating work, etc.)
								we recruit, train and provide a platform for volunteer agents to help our new and longtime members. Would you like to have a personal
								agent contact you and help you with the administrative work in Voluno? The agent would take care of as much administrative work, as possible,
								so that you can focus all of your energy on development work. If you\'d like that, please <a title="not working yet ###">apply here</a>.
								You will be contacted as soon as an agent is available.
							</div>
						</li>
						<li>
							We intent to constantly improve and expand out services, so that our members can benefit as much as
							possible and in as many different ways as possible, taking into account the different individual needs and potentials of our members.
						</li>
					</ul>';
					
				}
				#content (close)
				
			}
			#agents and assistent #5 (close)
			
			#Fill out profile #2 (open)
			if(1==1){
				
				#prepare (open)
				if(1==1){
					
					#profile component cecks (open)
					if(1==1){
						
						#profile picture (open)
						if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_imageName)){
							
							$function_assistant['internal']['type_2']['profile_complete']++;
							
						}else{
							
							$function_assistant['internal']['type_2']['profile_incomplete']++;
							
						}
						#profile picture (close)
						
						#country (open)
						if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_country)){
							
							$function_assistant['internal']['type_2']['profile_complete']++;
							
						}else{
							
							$function_assistant['internal']['type_2']['profile_incomplete']++;
							
						}
						#country (close)
						
						#address (open)
						if(1==1){
							
							#components (open)
							if(1==1){
								
								#city (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_city)){
									
									$function_assistant['internal']['type_2']['address']++;
									
								}
								#city (open)
								
								#state (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_state)){
									
									$function_assistant['internal']['type_2']['address']++;
									
								}
								#state (open)
								
								#areaCode (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_areaCode)){
									
									$function_assistant['internal']['type_2']['address']++;
									
								}
								#areaCode (open)
								
							}
							#components (close)
							
							#check if at least 2 (open)
							if($function_assistant['internal']['type_2']['address'] >= 1){
								
								$function_assistant['internal']['type_2']['profile_complete']++;
								
							}else{
								
								$function_assistant['internal']['type_2']['profile_incomplete']++;
								
							}
							#check if at least 2 (close)
							
						}
						#address (close)
						
						#contact info (open)
						if(1==1){
							
							#components (open)
							if(1==1){
								
								#phone (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_phone)){
									
									$function_assistant['internal']['type_2']['contact_info']++;
									
								}
								#phone (open)
								
								#skype (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_skype)){
									
									$function_assistant['internal']['type_2']['contact_info']++;
									
								}
								#skype (open)
								
								#facebook (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_facebook)){
									
									$function_assistant['internal']['type_2']['contact_info']++;
									
								}
								#facebook (open)
								
								#twitter (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_twitter)){
									
									$function_assistant['internal']['type_2']['contact_info']++;
									
								}
								#twitter (open)
								
								#whatsapp (open)
								if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_whatsapp)){
									
									$function_assistant['internal']['type_2']['contact_info']++;
									
								}
								#whatsapp (open)
								
							}
							#components (close)
							
							#check if at least 2 (open)
							if($function_assistant['internal']['type_2']['contact_info'] >= 2){
								
								$function_assistant['internal']['type_2']['profile_complete']++;
								$function_assistant['internal']['type_2']['profile_complete']++;
								
							}else{
								
								$function_assistant['internal']['type_2']['profile_incomplete']++;
								$function_assistant['internal']['type_2']['profile_incomplete']++;
								
							}
							#check if at least 2 (close)
							
						}
						#contact info (close)
						
						#gender (open)
						if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_gender)){
							
							$function_assistant['internal']['type_2']['profile_complete']++;
							
						}else{
							
							$function_assistant['internal']['type_2']['profile_incomplete']++;
							
						}
						#gender (close)
						
						#occupation (open)
						if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_occupation)){
							
							$function_assistant['internal']['type_2']['profile_complete']++;
							
						}else{
							
							$function_assistant['internal']['type_2']['profile_incomplete']++;
							
						}
						#occupation (close)
						
						#resume (open)
						if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_resume)){
							
							$function_assistant['internal']['type_2']['profile_complete']++;
							
						}else{
							
							$function_assistant['internal']['type_2']['profile_incomplete']++;
							
						}
						#resume (close)
						
						#statement (open)
						if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_statement)){
							
							$function_assistant['internal']['type_2']['profile_complete']++;
							
						}else{
							
							$function_assistant['internal']['type_2']['profile_incomplete']++;
							
						}
						#statement (close)
						
						#bio (open)
						if(!empty($GLOBALS['voluno_variables']['current_user_extended']->usersext_biography)){
							
							$function_assistant['internal']['type_2']['profile_complete']++;
							
						}else{
							
							$function_assistant['internal']['type_2']['profile_incomplete']++;
							
						}
						#bio (close)
						
					}
					#profile component cecks (close)
					
					$function_assistant['internal']['type_2']['profile_percentage']
					= $function_assistant['internal']['type_2']['profile_complete'] /
					($function_assistant['internal']['type_2']['profile_complete'] + $function_assistant['internal']['type_2']['profile_incomplete']) * 100;
					
					#progress bar (open)
					if(1==1){
						
						$function_assistant['internal']['type_2']['profile_progress_G']
						= round((255 * $function_assistant['internal']['type_2']['profile_percentage']) / 100);
						
						$function_assistant['internal']['type_2']['profile_progress_R']
						= round((255 * (100 - $function_assistant['internal']['type_2']['profile_percentage'])) / 100);
						
						$function_assistant['internal']['type_2']['profile_progress_color']
						= 'rgb('.$function_assistant['internal']['type_2']['profile_progress_R'].','.$function_assistant['internal']['type_2']['profile_progress_G'].',0)';
						
						#if value = zero (open)
						if($function_assistant['internal']['type_2']['profile_percentage'] == 0){
							
							$function_assistant['internal']['type_2']['profile_progress_color'] = "white";
							
						}
						#if value = zero (close)
						
						$function_assistant['internal']['type_2']['profile_progress'] = '
						<div
							style="background-color:white;width:100%;border:1px solid black;height:20px;position:relative;"
							title="'.$function_assistant['internal']['type_2']['profile_percentage'].'"
						>
						
						<div style="width:100%;text-align:center;position:absolute;">
							'.$function_assistant['internal']['type_2']['profile_percentage'].'%
						</div>
						
						<div
							style="
								background-color:'.$function_assistant['internal']['type_2']['profile_progress_color'].';
								height:20px;
								width:'.$function_assistant['internal']['type_2']['profile_percentage'].'%;
							"
						>
						</div>
						
						</div>
						';
						
					}
					#progress bar (close)
					
					#function-image-processing.php (v1.0) (open)
					if(1==1){
						
						#thematic only
							$function_propic__type = 'thematic';
							$function_propic__original_img_name = 'profile.jpg';
							#$function_propic__cropping = “yes”; //yes or empty (default)
						#all
							$function_propic__geometry = array(190,NULL); //optional, if e.g. only width: 300, NULL; vice versa
							#$function_propic__rotate = 180; //optional, default: 0
						include('#function-image-processing.php');
						# $function_propic;
						#$function_propic__image_available <- is set to yes or no
						
					}
					#function-image-processing.php (v1.0) (close)
					
				}
				#prepare (close)
				
				#output (open)
				if($function_assistant['internal']['type_2']['profile_percentage'] < 60){ //hide message if 60% of profile is completed
					
					$function_assistant['internal']['elements_array'][] = '
					
					<img src="'.$function_propic.'" style="float:right;margin-left:20px;" class="voluno_brighter_on_hover">
					
					<h4 style="display:inline;">
						Complete your profile
					</h4>
					
					<p style="margin:5px 0px 10px 0px;">
						Please fill out your personal profile and present yourself to the Voluno community.
						In order for other members to work with you, they need to know who they are dealing with. By adding more information to your
						personal profile, you can create transparency, trust and a personal connection.
					</p>
					
					Currently, you have filled out
					<div style="display:inline-block;width:200px;vertical-align:middle;margin:10px;">
						'.$function_assistant['internal']['type_2']['profile_progress'].'
					</div>
					of your profile. Please fill out at least 60%.
					<div style="text-align:center;margin-top:0px 3px;">
						<a href="'.get_permalink(686).'">
							<div class="voluno_button">
								Go to my profile
							</div>
						</a>
					</div>';
					
				}
				#output (close)
				
			}
			#Fill out profile #2 (close)
			
			#Select a position #3 (open)
			if(
				empty($GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['accepted'])
				OR
				empty($GLOBALS['voluno_variables']['#function-user-positions-get.php']['current_user']['simple_array']['pending'])
			){
				
				#prepare (open)
				if(1==1){
					
					#function-image-processing.php (v1.0) (open)
					if(1==1){
						
						#thematic only
							$function_propic__type = 'thematic';
							$function_propic__original_img_name = 'positions.jpg';
							#$function_propic__cropping = “yes”; //yes or empty (default)
						#all
							$function_propic__geometry = array(190,NULL); //optional, if e.g. only width: 300, NULL; vice versa
							#$function_propic__rotate = 180; //optional, default: 0
						include('#function-image-processing.php');
						# $function_propic;
						#$function_propic__image_available <- is set to yes or no
						
					}
					#function-image-processing.php (v1.0) (close)
					
				}
				#prepare (close)
				
				#output (open)
				if(1==1){ //hide message if 60% of profile is completed
					
					$function_assistant['internal']['elements_array'][] = '
					
					<div style="overflow:hidden;">
						<img src="'.$function_propic.'" style="border-radius:10%;border:1px solid black;float:right;margin-left:20px;" class="voluno_brighter_on_hover">
						
						<h4 style="display:inline;">
							How would you like to use Voluno?
						</h4>
						
						<p style="margin:5px 0px 10px 0px;">
							Before you can use our core services and really get to work, you need to attain at least one position, first.
							There are several different positions and we are currently working to add
							more. To get your first position, please click here:
						</p>
						<div style="text-align:center;margin-top:-25px;">
							<a href="'.get_permalink(756).'">
								<div class="voluno_button">
									My Positions
								</div>
							</a>
						</div>
					</div>';
					#To get your first position, please click <a href="'.get_permalink(756).'">here</a>.  new #8fb6c9 old #c1c1c1
				}
				#output (close)
				
			}
			#select a position #3 (close)
			
		}
		#element creation and checking (close)
		
		#output preparation (open)
		if(1==1){
			
			#loop of elements (open)
			for($aln=0;$aln<count($function_assistant['internal']['elements_array']);$aln++){
				
				$function_assistant['output']['content'] .= '
				<div style="margin:5px;padding:10px;border-bottom:1px dotted grey;">
					'.$function_assistant['internal']['elements_array'][$aln].'
				</div>';
				
			}
			#loop of elements (close)
			
			#output container (open)
			if(1==1){
				
				$function_assistant['output']['content'] =
				$function_assistant['output']['content'].'
				<div
					style="
						position:absolute;
						width: 980px;
						margin-left: -30px;
					"
				>
					<div
						style="
							height:45px;
							background: red;
							background: -moz-linear-gradient(bottom, #ffffff 0%, #000 100%);
							background: -webkit-gradient(linear, left bottom, left top, color-stop(0%,#ffffff), color-stop(100%,#000));
							background: -webkit-linear-gradient(bottom, #ffffff 0%,#000 100%);
							background: -o-linear-gradient(bottom, #ffffff 0%,#000 100%);
							background: -ms-linear-gradient(bottom, #ffffff 0%,#000 100%);
							background: linear-gradient(to top, #ffffff 0%,#000 100%);
							filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#ffffff", endColorstr="#000",GradientType=0 );
						"
					>
						&nbsp;
					</div>
					<div style="background-color:#fff;z-index:1000000;margin-top:-45px;height:20px;border-radius:0px 0px 20px 20px;">
						&nbsp;
					</div>
				</div>
				<div style="height:25px;">
				</div>';
				
				#home page (open)
				if(get_the_ID() == 576){
					
					$function_assistant['output']['content'] = '
					<div>
						'.$function_assistant['output']['content'].'
					</div>';
					
				}
				#home page (close)
				
				#all pages except home page (open)
				else{
					
					$function_assistant['output']['content'] = '
					<div
						class="voluno_function_assistant_content"
						style="display:none;"
					>
						'.$function_assistant['output']['content'].'
					</div>
					<div
						class="voluno_function_assistant_popup"
						style="
							position:fixed;
							top:1px;left:1px;
							border-radius:0px 20px 20px 0px;
							background-color:#fff;
							padding:20px;
							cursor:pointer;
						"
						title="'.
							'Click to extend the automatic assistant window.&#013;You have '.
							count($function_assistant['internal']['elements_array']).
							' '.
							plural_singular_counter('tip','tips',count($function_assistant['internal']['elements_array'])).
						'"
					>
						'.count($function_assistant['internal']['elements_array']).'
						'.plural_singular_counter('tip','tips',count($function_assistant['internal']['elements_array'])).'
					</div>';
					
					echo '
					<script>
						jQuery(document).ready(function(){
							
							
							function functionAssistant_moveButton(){
								var voluno_function_assistant_y = jQuery("#forbottom").position();
								var voluno_function_assistant_x = jQuery("#forbottom").outerWidth(true);
								jQuery(".voluno_function_assistant_popup")
								.css("top",voluno_function_assistant_y.top+15+"px")
								.css("left",voluno_function_assistant_y.left+voluno_function_assistant_x+"px");
							}
							functionAssistant_moveButton();
							
							jQuery(window).resize(function(){
								functionAssistant_moveButton();
							});
							
							jQuery(".voluno_function_assistant_popup").click(function(){
								jQuery(".voluno_function_assistant_content").slideToggle(300);
							});
							
						});
					</script>';
					
				}
				#all pages except home page (close)
				
			}
			#output container (close)
			
		}
		#output preparation (close)
		
	}
	#content (close)
	
}
#content (close)

// To output variables, replace
//    $function_assistant
// with
//    $function_assistant['output']
// thereby clearing all internal or output variables.

#output (open)
if(1==1){
	
	$function_assistant = $function_assistant['output'];
	
}
#output (close)

}
#
###

?>