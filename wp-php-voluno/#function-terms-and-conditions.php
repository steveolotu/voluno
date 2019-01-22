<?php

#function-fixed-div.php type 1 (v1.0) (open)
if(1==1){
    
    $function_fixed_div_part = 1; //1 or 2, obligatory
    $function_fixed_div_width_div = 750; //only relevant for part 1, default 750 (px)
    $function_fixed_div_darkened_bg = "yes"; //only relevant for part 1, yes or no, default no #"name"+_background <-- class name
    $function_fixed_div__darkened_bg_fadeout_on_click = "yes"; //default: no = empty
    $function_fixed_div_div_name = "terms_and_conditions"; //optional, default is "ffddn".mt_rand(100000000,999999999);, only relevant for part 1
    $function_fixed_div_show_on_load = "no"; //yes or no, default is no, only relevant for part 1
    $function_fixed_div_border_radius = 25; //optional, default is 0
    #$function_fixed_div_cancel_button = "no"; //optional, default is yes
    #$function_fixed_div__cancel_button__css = "margin-left:-90px;margin-top:20px;"; //default: voluno_button (not changable here) margin-left:-90px;margin-top:20px;
    #$function_fixed_div_height_div = "50"; //optional, in percent, default is 50
    $function_fixed_div_text_align = "center"; //optional, default is left
    #$function_fixed_div_vertical_scrolling = "no"; //default: empty, scroll bar after inner div maxheight of 400 
    $function_fixed_div_padding_text_top = "25"; //optional, default 0(px)
    #$function_fixed_div_variable_only = "yes"; //default: empty. if it's yes, output not echoed but saved in $function_fixed_div_display (twice)
    include('#function-fixed-div.php');

}    
#function-fixed-div.php type 1 (v1.0) (close)

    echo '
    <h1 style="display:inline;">
	Terms and conditions
    </h1>
    <div style="width:80%;margin:auto;overflow-y:auto;background-color:#FFEAB9;height:350px;padding-right:15px;">';
	
	#content (open)
	if(1==1){
	    echo '
	    <ol>
		<li>
		    <div style="font-weight:bold;">
			Data protection and privacy
		    </div>
		    While we try to protect our user data from online attacks and hackers, we do not
		    accept any liability for any data leaks that happen.
		</li>
		<li>
		    <div style="font-weight:bold;">
			Rights to generated content
		    </div>
		    All content created via the Voluno website or in connection with the Voluno website
		    is the property of Voluno. Voluno uses this content for two purposes:
		    <ul>
			<li>
			    <div style="font-weight:bold;">
				Directly and indirectly supporting development
			    </div>
			    We provide our clients (volunteers, development workers, trainers, etc.) with the materials
			    they need to work, according to their defined roles. By claiming exclusive rights regarding
			    all materials generated in connection with Voluno, we can prevent ourselves and our clients
			    from legal claims and thus enable a smooth workflow.
			</li>
			<li>
			    <div style="font-weight:bold;">
				Self-improvement
			    </div>
			    By analyzing our user data, we try to find ways to improve our service, e.g. by realigning
			    our recruitment strategy if certain skills are missing in our current volunteer pool.
			</li>
		    </ul>
		</li>
		<li>
		    <div style="font-weight:bold;">
			Right to exclude members
		    </div>
		    We reserve the right to exclude clients at any time without giving reasons.
		</li>
		<li>
		    <div style="font-weight:bold;">
			Ownership and trademark
		    </div>
		    Voluno and the Voluno website are property of Voluno e.V., Germany. The following names are registered
		    trademarks and may not be used by third parties without prior written permission:
		    <ul>
			<li>
			    Voluno
			</li>
			<li>
			    The Volunteer Net Work for Development
			</li>
			<li>
			    The Volunteer Network for Development
			</li>
			<li>
			    Stay home. Take action.
			</li>
		    </ul>
		</li>
		<li>
		    <div style="font-weight:bold;">
			Commercial use of user information
		    </div>
		    Voluno does NOT use user information commercially in any way. We use anonymized statistics to
		    further our cause and we transfer information to thrid parties in the course of our work, e.g. contact
		    information of a volunteer to a development organization which that volunteer works for.
		</li>
		<li>
		    <div style="font-weight:bold;">
			Responsibility for content of the plattform
		    </div>
		    Voluno does not take responsibility for any damage caused by our services, in accordance with national laws. While we
		    constantly do our best to prevent damages and protect our clients, we cannot guarantee 100% protection.
		    Thus, users of our platform agree to access our network at their own risk. This concerns:
		    <ul>
			<li>
			    <b>Viruses, Malware, Adware, etc.:</b> User submitted files and links to
			    other websites may lead to infection with malicious software. Also, hackers might infect our
			    own platform at any time without us being aware of it.
			</li>
			<li>
			    <b>Clients with bad intentions:</b> Clients may misuse Voluno to abuse, harass, stalk or spy
			    on other clients. While we strongly oppose such behavior and will take immediate steps to prevent
			    it and to ban such clients, we cannot rule out that it occurs and cannot be held responsible.
			</li>
			<li>
			    <b>Emotional scaring:</b> In accordance with the previous point, we do not accept any responsiblity
			    for mental cruelty, subjection to sexually explicit, discriminating or other morally inacceptable
			    materials that our clients may possibly be exposed to by working with Voluno.
			</li>
		    </ul>
		</li>
	    </ol>
	    ';
	}
	#content (close)
    
    echo '
    </div>';

#function-fixed-div.php type 1 (v1.0) (open)
if(1==1){

#function-fixed-div.php
    $function_fixed_div_part = 2; //1 or 2, both are obligatory
    include('#function-fixed-div.php');

}    
#function-fixed-div.php type 1 (v1.0) (close)

?>