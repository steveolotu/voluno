<?php

#documentation (open)
if(0!=0){
	
	##file info (open)
	if(1==1){
		
		## Last documentation check: 2016.09.19, Steve
		## Last format and structure check: 2016.09.19, Steve
		
		# Information about agents for page visitors, with the intention to motivate them to volunteer as agents.
		
		// Self explanatory.
		
	}
	##file info (close)
	
}
#documentation (close)

#content (open)
if(1==1){
	
	#img + title + intro text (open)
	if(1==1){
	    
		#function-image-processing (open)
		if(1==1){
			#thematic only
			$function_propic__type = "thematic";
			$function_propic__original_img_name = "voluno_img_3674.jpg";
			#all
			$function_propic__geometry = array(309,309); //optional, if e.g. only width: 300, NULL; vice versa
			include('#function-image-processing.php');
			$page_header_picture = $function_propic;
		}
		#function-image-processing (close)
		
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
                            'text' => 'Return to home',
                            'link' => get_permalink(576)
                        ]
                    ]
                ];
                // 'Option 1','Option 2' (default). Explanation of the input variable.
				
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
		
		#img + title (open)
		if(1==1){
		    
		    echo '
		    <img src="'.$page_header_picture.'" class="voluno_header_picture">
		    '.$function_breadcrums['breadcrums'].'
			<div style="text-align:center;margin:20px;">
				<h1 style="display:inline;">
					Become an agent at Voluno
				</h1>
		    </div>';
		    
		}
		#img + title (close)
		
		#intro text (open)
		if(1==1){
		    
		    echo '
		    <div style="height:170px;">
				<p>
					Do you want to stand up against dictatorships, help the environment, improve health and
					education, fight discrimination and corruption and much more, without even getting up from
					your couch? We don’t want your money – we want your time, your skills, your ideas and your
					talents. And we want to put them to use where they are needed most and when they are
					needed most. By becoming a volunteer at Voluno, you can help local development
					organizations anywhere in the world and thereby support development in the most effective,
					sustainable and comfortable way possible.
				</p>
			</div>';
		    
		}
		#intro text (close)
	    
	}
	#img + title + intro text (close)
	
	#text (open)
	if(1==1){
		
		#function-accordion.php (v1.1) (open)
		if(1==1){
			
			##documentation (open)
			if(1==1){
				
				// Classical accordion function. Hides text paragraphs and shows only headings,
				// which make the whole page structure very clear and allows the user what to read first.
				// By clicking on the different headings, the user can extend the text beneath it.
				
			}
			##documentation (close)
			
			#input (open)
			if(1==1){
				// Add one entry for every section you want to use.
				
				#What are volunteers? (open)
				if(1==1){
					
					$function_accordion['array'][] = [
						'title' => 'What are volunteers?',
						'content' => '
							<p>
								Volunteers donate their time and skills to development organization, taking over
								various different tasks. This relieves the development workers of stress
								and enables them to focus their resources on the actual development work. They can thus
								get more work done and have a larger positive impact on society.
							</p>'
					];				
					
				}
				#What are volunteers? (close)
				
				#Why support development organizations? (open)
				if(1==1){
					
					$function_accordion['array'][] = [
						'title' => 'Why support development organizations?',
						'content' => '
							<p>
								Small development organizations (NGOs) are a main driver
								of development, present in almost every community and
								taking over various functions where state institutions
								or private enterprises are unwilling or unable to provide
								service. These mainly local NGOs are commonly characterized
								by a strong commitment to bring about change, a deep
								understanding of the problem and the local community,
								but also a lack of funding. As a result, they can’t
								hire enough qualified employees needed to realize their
								full potential. This is where Voluno comes in: by
								enabling volunteers to donate their working time, NGOs
								can get skilled labor for free, work more effectively
								and increase their positive impact on society.
								<br>
								But while Voluno focuses on small, local development
								organizations in poor countries, we are open to all development
								organizations from all over the world, as long as they
								support development in poor countries.
							<p>'
					];				
					
				}
				#Why support development organizations? (close)
				
				#Examples (open)
				if(1==1){
					
					$function_accordion['array'][] = [
						'title' => 'Examples',
						'content' => '
							<ul>
								<li>
									<b>Kisembo</b> works as a lawyer in a human rights NGO in Uganda.
									Voluno can help his NGO to find volunteers who create and
									manage a website, so that his NGO can reach more people
									and find more clients.
								</li>
								<li>
									<b>Nadira</b> is a Pakistani teacher in an orphanage for children
									with mental disabilities. Voluno can help finding Johanna,
									who currently studies education in Germany. Johanna develops
									special teaching materials for the students. Furthermore,
									she asks her friends to join in. Together, they not only
									have a real impact but also gain valuable experiences for
									their future studies.
								</li>
								<li>
									<b>Segun</b> documents oil spills that cause environmental damage
									in Nigeria. Voluno can help him with his report. To
									accomplish this, the work is split into sub tasks. For
									example: doing online-research, writing, proof-reading,
									as well as formatting and design. These sub-tasks are then
									posted on Voluno’s platform and can be completed by several
									volunteers, even if they initially don’t know anything about
									the situation in Nigeria.
								</li>
							</ul>'
					];				
					
				}
				#Examples (close)
				
				#How does it work in practice? (open)
				if(1==1){
					
					$function_accordion['array'][] = [
						'title' => 'How does it work in practice?',
						'content' => '
							The process takes place in three phases:
							<h5>
								Phase 1: Registration
							</h5>
							<p>
								In Phase 1, we need information about your skills and preferences.
								To get this information, we would like to talk to you via phone or Skype.
								If you don’t have any questions, this will only take 10-20 minutes.
								To arrange this call, please provide us with your Skype name or phone
								number and one or more time suggestions.
							</p>
							<h5>
								Phase 2: Getting the right tasks
							</h5>
							<p>
								Phase 2 consists of four steps.
							</p>
							<ol>
								<li>
									<p>First, we compile a list of tasks that match your abilities and preferences.</p>
								</li>
								<li>
									<p>Then, we contact you and you choose the tasks you’re most interested in.</p>
								</li>
								<li>
									<p>After that, we try to get the tasks. This is not always possible,
									since there might be several applicants or the task might already be taken.</p>
								</li>
								<li>
									<p>Finally, we inform you if you get one or more tasks.</p>
								</li>
							</ol>
							
							<h5>
								Phase 3: The actual work
							</h5>
							<p>
								Once you’ve got one or more tasks, Phase 3 starts:
								you do the actual volunteering work. In some cases,
								the task description is fully sufficient and you can
								work on your own and send us the completed result without
								further interaction. Other cases require frequent communication.
								Of course, we’re always available for questions.
							</p>
							<br>
							<p>
								After Phase 3 has ended, the process restarts from Phase 2.
								The volunteer can flexibly decide when and how often he or she receives new tasks.
							</p>'
					];				
					
				}
				#How does it work in practice? (close)
				
				#Getting started (open)
				if(1==1){
					
					$function_accordion['array'][] = [
						'title' => 'Getting started',
						'content' => '
							<p>
								To become a volunteer at Voluno, please send us an email at '.
								antispambot("info@voluno.org").' with the title "'
								.'<span style="font-style:italic;font-weight:bold;">'.
									'I want to become a volunteer at Voluno'.
								'</span>'.
								'".
								<br>
								In this email, please provide us with the following information:
							</p>
							<ul>
								<li>
									Your phone number and/or Skype name
								</li>
								<li>
									One or two time suggestions for our conversation
								</li>
							</ul>
							<p>
								Optionally, you can already fill out the following documents and send them together with your email:
							</p>
							<ul>
								<li>
									<a href="https://www.voluno.org/staging/wp-content/voluno-files/Voluno_-_member-registration-form.doc">
										Member registration form.doc
									</a>
								</li>
								<li>
									<a href="https://www.voluno.org/staging/wp-content/voluno-files/Voluno_-_skills_and_preferences.doc">
										Skills and preferences form.doc
									</a>
								</li>
							</ul>
							<p>
								Once we receive the email, we will contact you as soon as possible, at the latest within 24 hours after receiving it.
							</p>'
					];				
					
				}
				#Getting started (close)
				
				#About Voluno (open)
				if(1==1){
					
					$function_accordion['array'][] = [
						'title' => '',
						'content' => '
							<p>
								Voluno is an initiative that aims to support sustainable and effective
								development. We are based in Hamburg, Germany. Our unsalaried team
								consists of 5 to 20 members from various backgrounds. We won price
								money from the German Ministry of Education and receive additional
								funding by private donors.
							</p>'
					];				
					
				}
				#About Voluno (close)
				
			}
			#input (close)
			
			include('#function-accordion.php');
			
			#output (open)
			if(1==1){
				
				echo $function_accordion['content'];
				
			}
			#output (close)
			
		}
		#function-accordion.php (v1.1) (close)
		
	}
	#text (close)
	
}
#content (close)

?>