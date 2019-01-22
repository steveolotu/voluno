<?php

/*
Explanation:
- mutlipage:
--- 1. the orientation section is a fixed page, available via the menu
--- 2. it contains individual orientation pages which can be loaded separately
--- 3. the pages can also be loaded by the popup guide

- read me
--- the "$orientation_array" must be synched with the "#orientation texts pieces"
*/

#orientation pages (open)
if(empty($orientation_page_section)){
    
    #content (open)
    if(1==1){
        
        #page selection (open)
        if(1==1){
            $orientation_array = array(
                        //0 - display 1-normal, 2-title, 3-space after
                            //1 - id, don't change!!! important for permalinks
                                //2 - title
                array(  3,  1,  "Initial tour"),
                array(  2,  "", "Website system"),
                array(  1,  2,  "Contacts and messages"),
                array(  1,  3,  "Forum"),
                array(  1,  4,  "Positions"),
                array(  3,  12, "Reputation and experience"),
                array(  2,  "", "Work Center"),
                array(  1,  5,  "Working on tasks (for volunteers)"),
                array(  1,  6,  "Creating tasks (for development workers)"),
                array(  1,  7,  "Coordinating tasks (for agents)"),
                array(  1,  8,  "Taking part in trainings (for volunteers)"),
                array(  1,  9,  "Offering trainings (for trainers)"),
                array(  1,  10, "Getting advice (for development workers)"),
                array(  1,  11, "Giving advice (for advisors)")
            );
            
            for($x=0;$x<count($orientation_array);$x++){
                $orientation_array_ids[] = $orientation_array[$x][1];
            }
            
            if(in_array($_GET['subsection'], $orientation_array_ids) AND $_GET['subsection'] != ""){
                $orientation_page_subsection = $_GET['subsection'];
            }else{
                $orientation_page_subsection = "overview";
            }
            
        }
        #page selection (open)
        
        #general content
        if(1==1){
            #function-image-processing
                #thematic only
                  $function_propic__type = "thematic";
                  $function_propic__original_img_name = "orientation.png";
                #all
                  $function_propic__geometry = array(300,200); //optional, if e.g. only width: 300, NULL; vice versa
                include('#function-image-processing.php');
            echo '
            <img src="'.$function_propic.'" class="voluno_header_picture">';
        }
        #general content
        
        #specific content (open)
        if(1==1){
            
            #overview (open)
            if($orientation_page_subsection == "overview"){
                
                echo '
                <div style="text-align:center;margin-bottom:30px;">
                  <h1 style="display:inline;">
                    Orientation guide
                  </h1>
                  <br>
                </div>
                <p>
                    We want to help you get the most out of your Voluno experience.
                    To achieve this, we would like to invite you to:
                </p>
                <div style="margin-left:50px;margin-top:20px;">';
                    $item_counter = 0;
                    for($x=0;$x<count($orientation_array);$x++){
                        
                        #links to specific topics (open)
                        if($orientation_array[$x][0] == 1 OR $orientation_array[$x][0] == 3){
                            $item_counter++;
                            if($item_counter < 10){
                                $preceeding_space = '<span style="visibility:hidden;">0</span>';
                            }else{
                                $preceeding_space = '';
                            }
                            echo '
                            <h5 style="display:inline;">
                                <a href="'.get_permalink().'?subsection='.$orientation_array[$x][1].'">
                                    '.$preceeding_space.$item_counter.'&nbsp;&nbsp;&nbsp; '.$orientation_array[$x][2].'
                                </a>
                            </h5>
                            <br>';
                            if($orientation_array[$x][0] == 3){
                                echo '
                                <div style="margin-top:20px;">
                                </div>';
                            } 
                        }
                        #links to specific topics (close)
                        
                        #title (open)
                        if($orientation_array[$x][0] == 2){
                            echo '
                            <h4 style="display:inline;">
                                '.$orientation_array[$x][2].'
                            </h4>
                            <br>';
                        }
                        #title (close)
                    }
                    echo '
                </div>';
                
            }
            #overview (close)
            
            #all others (open)
            else{
                
                for($help_index_z=0;$help_index_z<count($orientation_array);$help_index_z++){
                    if($orientation_array[$help_index_z][1] == $orientation_page_subsection){
                        $orientation_page_section = $orientation_array[$help_index_z][2];
                    }
                }
                echo '
                <div style="text-align:center;margin-bottom:50px;">
                    <h4 style="display:inline;">
                        <a href="'.get_permalink().'" title="Click to return to overview">
                            Orientation Guide
                        </a>
                    </h4>
                    <br>
                    <h1 style="display:inline;">
                      '.$orientation_page_section.'
                    </h1>
                </div>';
                include('members-net-help.php');
                unset($orientation_page_section);
            }
            #all others (close)
        }
        #specific content (close)
        
    }
    #content (close)

}
#orientation pages (close)

#orientation texts pieces (open)
if(!empty($orientation_page_section)){
    
        #Initial Tour (open)
        if($orientation_page_section == "Initial tour"){
            echo 'initial tour';
        }
        #Initial Tour (close)
        
        #website support system (open)
        if(1==1){
        
            #Contacts and messages (open)
            if($orientation_page_section == "Contacts and messages"){
                echo 'Contacts and messages';
            }
            #Contacts and messages (close)
            
            #Forum (open)
            if($orientation_page_section == "Forum"){
                echo 'Forum';
            }
            #Forum (close)
            
            #Positions (open)
            if($orientation_page_section == "Positions"){
                
                #script (open)
                if(1==1){
                    echo '
                    <script>
                        jQuery(document).ready(function(){
                        
                            var showDescriptionShort = "";
                            var hideDescriptionShortOnlyOnce = 1;
                            jQuery(".positions_compilation_active").click(function(){
                                hideDescriptionShortOnlyOnce = 1;
                                showDescriptionShort = jQuery(this).parent().find(".position_html_id").html();
                                if(jQuery(".position_description_short_all").is(":visible")){
                                    jQuery(".position_description_short_all:visible").fadeOut(300,function(){
                                        jQuery(".position_description_short"+parseInt(showDescriptionShort)).fadeIn();
                                    });
                                }
                            });
                            
                            jQuery(".link2").click(function(){
                                jQuery(".hidden_content").fadeToggle(300);
                            });
                            
                        });
                    </script>';
                }
                #script (close)
                
                #content (open)
                if(1==1){
                    
                    #how to get a position (open)
                    if(1==1){
                        echo '
                        <h3>
                            How to get a position?
                        </h3>
                        <ul>
                            <li>
                                <strong>
                                    Unrestricted positions:
                                </strong>
                                To attain certain positions, you simply need to activate them. This applies to:
                                <ul>
                                    <li>
                                        Volunteers
                                    </li>
                                    <li>
                                        NGO worker
                                    </li>
                                    <li>
                                        Advisors  and 
                                    </li>
                                    <li>
                                        Trainers
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <strong>
                                    Restricted positions:
                                </strong>
                                Then, there are positions which require applications. This is applies to:
                                <ul>
                                    <li>
                                        Agents
                                    </li>
                                    <li>
                                        Recruiters
                                    </li>
                                    <li>
                                        Staff members
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p>
                            While all positions in Voluno require responsibility, commitment and professionalism, unrestricted
                            positions are easier to evalute by other members. If they are unprofessional, this is reflected in their
                            profile and other members can decide whether they want to work with these members or not.
                            <br>
                            In contrast, there is no automated mechanism to filter out irresponsible members with restricted positions.
                            Thus, as a means of quality control, they have to apply for their positions.
                        </p>';
                    }
                    #how to get a position (close)
                        
                    echo '
                    Which positions are there?';
                    
                    echo '
                    <a href="'.get_permalink(756).'">
                        link to my positions
                    </a>';
                        
                    #watch a short video or (open)
                    if(1==1){
                        echo '
                        <table>
                            <tr>
                                <td style="text-align:center;">
                                    <h5 style="display:inline;">
                                        To find that out, you could either:<br>
                                        <a class="link2" style="cursor:pointer;">
                                            - watch a short video or
                                        </a>
                                    </h5>
                                </td>
                            </tr>
                            <tr style="display:none;" class="hidden_content">
                                <td style="text-align:center;">
                                    <iframe
                                        width="420"
                                        height="315"
                                        src="https://www.youtube.com/embed/h3JQm3aQkQ8?rel=0"
                                        frameborder="0"
                                        allowtransparency="true" style="background: #FFFFFF;"
                                        allowfullscreen>
                                    </iframe>
                                </td>
                            </tr>
                        </table>';
                    }
                    #watch a short video or (close)
                    
                    
                    #click through an interactive overview (open)
                    if(1==1){
                        echo '
                        <table>
                            <tr>
                                <td style="text-align:center;">
                                    <h5 style="display:inline;">
                                        <a class="link3" style="cursor:pointer;">
                                            - click through an interactive overview
                                        </a>
                                    </h5>
                                </td>
                            </tr>
                            <tr style="display:none;" class="hidden_content">
                                <td>
                                    <br>
                                    <br>';
                                    
                                    
                                    $position_compilation_path = wp_upload_dir()['url'].'/pictures/position_compilation(';
                                    $position_compilation_path2 = wp_upload_dir()['url']."/pictures/position_compilation_arrow(";
                                    $margin_top  =  array( "9",   "0",   "9", "115", "129", "203", "318");
                                    $margin_left =  array( "2", "325", "165", "165", "394", "165", "165");
                                    
                                    $margin_top2  = array(   "0",   "0",  "28", "-31", "-35","-119", "-49");
                                    $margin_left2 = array(   "0",   "0", "-56","-103",   "0","-140","-165");
                                    
                                    $is_there_arrow = array("no","no","yes","yes","yes","yes","yes");
                                    
                                    echo '
                                    <table style="width:100%">
                                        <tr>
                                            <td style="width:60%;">';
                                            
                                            /*
                                                for($x=1;$x<=7;$x++){
                                                    echo '
                                                    <div>
                                                        <span class="position_html_id" style="display:none;">
                                                            '.$x.'
                                                        </span>
                                                        <div
                                                            style="
                                                                cursor:pointer;
                                                                position:absolute;
                                                                z-index:3;
                                                                margin-top:'.$margin_top[$x-1].'px;
                                                                margin-left:'.$margin_left[$x-1].'px;"
                                                            class="positions_compilation_active"
                                                        >
                                                            <img
                                                                style=""
                                                                src="'.$position_compilation_path.$x.').png"
                                                            >
                                                        </div>';
                                                        if($is_there_arrow[$x-1] == "yes"){
                                                            echo '
                                                            <div style="position:absolute;z-index:2;">
                                                                <img
                                                                    class="positions_compilation_active_arrow"
                                                                    style="margin-top:'.($margin_top[$x-1]+$margin_top2[$x-1]).
                                                                    'px;margin-left:'.($margin_left[$x-1]+$margin_left2[$x-1]).'px;"
                                                                    src="'.$position_compilation_path2.$x.').png"
                                                                >
                                                            </div>';
                                                        }
                                                    echo '
                                                    </div>';
                                                }
                                                */
                                                
                                                echo '
                                            </td>
                                            <td>';
                                            /*
                                                
                                                The following code apparently uses an old position system. The table has been deleted and the system has been replaced by now.
                                                
                                                $positions_overview_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                                                            FROM OLD_POSITIONS_TABLE
                                                                                            ORDER BY vol_positions_order ASC;');
                                                $positions_overview_results = $GLOBALS['wpdb']->get_results($positions_overview_query);
                                                echo '
                                                <table>
                                                    <tr>
                                                        <td>';
                                                            $x = 0;
                                                            $first_position = 1;
                                                            foreach($positions_overview_results as $positions_overview_row){
                                                                $x++;
                                                                echo '
                                                                <div
                                                                    class="position_description_short'.$x.' position_description_short_all"
                                                                    style="';
                                                                        if($first_position == 1){
                                                                            $first_position = 0;
                                                                        }else{
                                                                            echo '
                                                                            display:none;';
                                                                        }
                                                                        echo '
                                                                        border-radius:25px;
                                                                        padding:1px;
                                                                        background-color:#'.$positions_overview_row->vol_positions_color.';"
                                                                >
                                                                    <div
                                                                        style="
                                                                            text-align:center;"
                                                                    >
                                                                        <h3 style="display:inline;font-weight:bold;color:#fff;">
                                                                            '.$positions_overview_row->vol_positions_name.'
                                                                        </h3>
                                                                        <img
                                                                            src="'.wp_upload_dir()['url'].'/pictures/'.
                                                                            $positions_overview_row->vol_positions_img_name.'"
                                                                        >
                                                                    </div>
                                                                    <br>
                                                                    <div
                                                                        style="
                                                                            background:#fff;
                                                                            color:#000;
                                                                            border-radius:25px;
                                                                            padding:1px;
                                                                            margin:0px 20px 20px 20px;"
                                                                    >
                                                                        <div style="margin:10px;padding:1px;">
                                                                            <div style="margin:5px;text-align:justify;">
                                                                                '.$positions_overview_row->vol_positions_description.'
                                                                                <a>
                                                                                    <b>
                                                                                        <div style="cursor:pointer;text-align:center;">
                                                                                            More
                                                                                        </div>
                                                                                    </b>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                            }
                                                        echo '
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                            */
                                            
                                            echo '
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </td>
                            </tr>
                        </table>';
                    }
                    #click through an interactive overview (close)
                    
                }
                #content (close)
                
            }
            #Positions (close)
            
            #Forum (open)
            if($orientation_page_section == "Reputation and Experience"){
                echo '
                Reputation and Experience
                dfadsfdsfds';
            }
            #Forum (close)
            
        }
        #website support system (close)
        
        #tasks (open)
        if(1==1){
        
            #Working on tasks (for volunteers) (open)
            if($orientation_page_section == "Working on tasks (for volunteers)"){
                echo 'Working on tasks (for volunteers)';
            }
            #Working on tasks (for volunteers) (close)
            
            #Creating tasks (for development workers) (open)
            if($orientation_page_section == "Creating tasks (for development workers)"){
                echo 'Creating tasks (for development workers)';
            }
            #Creating tasks (for development workers) (close)
            
            #Coordinating tasks (for agents) (open)
            if($orientation_page_section == "Coordinating tasks (for agents)"){
                echo 'Coordinating tasks (for agents)';
            }
            #Coordinating tasks (for agents) (close)
        
        }
        #tasks (close)
        
        #trainings (open)
        if(1==1){
            
            #Taking part in trainings (for volunteers) (open)
            if($orientation_page_section == "Taking part in trainings (for volunteers)"){
                echo 'Taking part in trainings (for volunteers)';
            }
            #Taking part in trainings (for volunteers) (close)
            
            #Offering trainings (for trainers) (open)
            if($orientation_page_section == "Offering trainings (for trainers)"){
                echo 'Offering trainings (for trainers)';
            }
            #Offering trainings (for trainers) (close)
        
        }
        #trainings (close)
        
        #advice (open)
        if(1==1){
            
            #Getting advice (for development workers) (open)
            if($orientation_page_section == "Getting advice (for development workers)"){
                echo 'Getting advice (for development workers)';
            }
            #Getting advice (for development workers) (close)
            
            #Giving advice (for advisors) (open)
            if($orientation_page_section == "Giving advice (for advisors)"){
                echo 'Giving advice (for advisors)';
            }
            #Giving advice (for advisors) (close)
            
        }
        #advice (close)
    
}
#orientation texts pieces (close)

?>
