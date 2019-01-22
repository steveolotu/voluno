<?php

#only in production site, to prevent conflict (open)
if(get_home_url() == 'https://www.voluno.org'){

    #mysql (open)
    if(1==1){
        
        #update (open)
        if(!empty($_GET['function_developer_info_index_update'])){
            
            $index_query = $GLOBALS['wpdb']->prepare('SELECT *
                                            FROM fi4l3fg_voluno_admin_info
                                            WHERE admin_info_type = "index";');
            $index_row = $GLOBALS['wpdb']->get_row($index_query);
            
            #get new index (open)
            if(1==1){
                
                $function_developer_info['index'][0] = substr($index_row->admin_info_content,0,1); //1.
                $function_developer_info['index'][1] = substr($index_row->admin_info_content,1,1); //2.
                $function_developer_info['index'][2] = substr($index_row->admin_info_content,2,1); //3.
                
                $function_developer_info['index'][0] = ord(strtolower($function_developer_info['index'][0])) - 96;
                $function_developer_info['index'][1] = ord(strtolower($function_developer_info['index'][1])) - 96;
                $function_developer_info['index'][2] = ord(strtolower($function_developer_info['index'][2])) - 96;
                
                if(
                    $function_developer_info['index'][0] != 26
                    AND
                    $function_developer_info['index'][1] != 26
                    AND
                    $function_developer_info['index'][2] != 26
                ){
                    echo chr(96 + $function_developer_info['index'][2]);
                    
                    $function_developer_info['index']['new'] =
                        chr(96 + $function_developer_info['index'][0]).
                        chr(96 + $function_developer_info['index'][1]).
                        chr(96 + $function_developer_info['index'][2] + 1);
                }elseif(
                    $function_developer_info['index'][0] != 26
                    AND
                    $function_developer_info['index'][1] != 26
                    AND
                    $function_developer_info['index'][2] == 26
                ){
                    $function_developer_info['index']['new'] =
                        chr(96 + $function_developer_info['index'][0]).
                        chr(96 + $function_developer_info['index'][1] + 1).
                        chr(96 + $function_developer_info['index'][2] + -25);
                }elseif(
                    $function_developer_info['index'][0] != 26
                    AND
                    $function_developer_info['index'][1] == 26
                    AND
                    $function_developer_info['index'][2] == 26
                ){
                    $function_developer_info['index']['new'] =
                        chr(96 + $function_developer_info['index'][0] + 1).
                        chr(96 + $function_developer_info['index'][1] - 25).
                        chr(96 + $function_developer_info['index'][2] - 25);
                }
                
            }
            #get new index (close)
            
            #database query update (open)
            if(1==1){
                $GLOBALS['wpdb']->update( 
                            'fi4l3fg_voluno_admin_info',
                        array( //updated content
                            'admin_info_content' => $function_developer_info['index']['new'],
                        ),
                        array( //location of updated content
                            'admin_info_type' => 'index'
                        ),
                        array( //format of updated content
                            '%s'
                        ),
                        array( //format of location of updated content
                            '%s'
                        ));
            }
            #database query update (close)
            $function_developer_info['index']['new'] = '$'.$function_developer_info['index']['new'];
        }
        #update (close)
        
        #get (open)
        if(1==1){
            
            #admin info table (open)
            if(1==1){
                $index_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                FROM fi4l3fg_voluno_admin_info
                                                WHERE admin_info_type = "index";');
                $index_row = $GLOBALS['wpdb']->get_row($index_query);
            }
            #admin info table (close)
            
			#claimed pages (open)
			if(1==1){
				
				$assignments_query = $GLOBALS['wpdb']->prepare('
											SELECT *
											FROM 4df5ukbnn5p3t817_posts
												
												'./*is it an assignment? does it have the category "assignment?"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_assignment, term_taxonomy_id AS term_taxonomy_id_assignment
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_assignment
                                                    WHERE term_taxonomy_id = 438
												) AS categories_assignment
												ON ID = object_id_assignment
												
												'./*is it assigned to someone? is any assigned category a "developer"*/'
												LEFT JOIN (
													SELECT object_id AS object_id_developer, term_taxonomy_id AS term_taxonomy_id_developer
													FROM 4df5ukbnn5p3t817_term_relationships AS 4df5ukbnn5p3t817_term_relationships_developer
													WHERE term_taxonomy_id <> 438
												) AS categories_developer
												ON ID = object_id_developer
												LEFT JOIN (
													SELECT taxonomy, term_id
													FROM 4df5ukbnn5p3t817_term_taxonomy
													WHERE taxonomy = "developer"
												) AS term_taxonomy
												ON term_taxonomy_id_developer = term_id
												LEFT JOIN (
													SELECT term_id AS term_id_terms, name AS name_terms
													FROM 4df5ukbnn5p3t817_terms
												) AS terms
												ON term_id = term_id_terms
												
											WHERE post_status = "publish"
											AND post_type = "wiki-page"
											
											AND (term_taxonomy_id_assignment <> 438 OR term_taxonomy_id_assignment IS NULL) './*make sure that it is not an assignment*/'
											
											AND taxonomy = "developer" './*make sure it is assigned to a developer*/'
											
											ORDER BY post_title ASC;');
				$assignments_results = $GLOBALS['wpdb']->get_results($assignments_query);
				
			}
			#claimed pages (close)
            
        }
        #get (close)
        
    }
    #mysql (close)
    
    #style (open)
    if(1==1){
        echo '
        <style>
            .function_developer_info_left li{
                display:list-item !important;
                list-style:square !important;
                margin-left:15px;
            }
            
            .function_developer_info_left{
                white-space: nowrap; 
                overflow: hidden; 
            }
            
            .function_developer_info_left:hover {
                text-overflow: ellipsis;
                overflow: visible;
            }
            
        </style>';
    }
    #style (close)
    
    #content (open)
    if(1==1){
        
        #displayed in top sidebar (open)
        if(1==1){
            echo '
            <div
                style="
                    background-color:#fff;
                    padding:20px;
                    border-radius:20px;
                    position:absolute;
                    top:40px;
                    left:50%;
                    margin-left:-50px;
                    width:150px;
                    height:110px;
                    overflow:auto;
                    border:1px solid black;
                    text-align:center;
                    vertical-align:center;
                    z-index:1000;
                "
                class="function_developer_info_main voluno_div_with_shadow"
            >
                <strong>
                    Developer info
                </strong>
                <br>
                <a class="function_developer_info_index_div" style="cursor:pointer;">
                    Get next index
                </a>
                <div class="function_developer_info_index_new">'.
                    $function_developer_info['index']['new'].
                '</div>
            </div>';
        }
        #displayed in top sidebar (close)
        
        #displayed as left sidebar (open)
        if(1==1){
            
            #list of elements currently worked on (open)
            if(1==1){
                
                #prepare (open)
                if(1==1){
                    
                    #
                    for($ajb=0;$ajb<count($assignments_results);$ajb++){
                        
                        $claimed_wiki_pages[] = '
                        <li>
                            <a style="font-weight:bold;" href="'.get_permalink($assignments_results[$ajb]->ID).'">
                                '.$assignments_results[$ajb]->post_title.'
                            </a>
                            ('.$assignments_results[$ajb]->name_terms.')
                        </li>';
                        
                    }
                    #
                    
                }
                #prepare (close)
                
                #display (open)
                if(!empty($claimed_wiki_pages)){
                    
                    $left_top_developer_box .= '
                    <div
                        style="
                            background-color:#fff;
                            padding:10px;
                            margin:5px;
                            width:100px;
                            border:1px solid black;
                            vertical-align:center;
                        "
                        class="function_developer_info_left"
                    >
                        <p style="font-weight:bold;margin-bottom:10px;">
                            Claimed pages
                        </p>
                        <ul>
                            '.implode($claimed_wiki_pages).'
                        <ul>
                    </div>';
                    
                }
                #display (close)
                
            }
            #list of elements currently worked on (close)
            
            #wiki pages of this file (open)
            if(get_post_type() != 'wiki-page'){
                
                #prepare (open)
                if(1==1){
                    
                    #variable definitions (open)
                    if(1==1){
                        
                        /*
                        [php]
                        include('wp-content/wp-php-voluno/members-net-my-profile.php');
                        [/php]
                        */
                        
                        $filename = substr(get_the_content(),strpos(get_the_content(),'wp-php-voluno')+strlen('wp-php-voluno/'));
                        $filename = substr($filename,0,strpos($filename,'.php')+strlen('.php'));
                        
                        $wikipage['title'] = 'PHP file: '.$filename;
                        $wikipage['object'] = get_page_by_title($wikipage['title'],'OBJECT','wiki-page');
                        $wikipage['id'] = $wikipage['object']->ID;
                        
                        $current_directory = 'wp-content/wp-php-voluno/';
                        $file_list = array_values(array_diff(scandir($current_directory), array('.','..','error_log','wp-php-voluno',$filename)));
                        $filename_full = $current_directory.$filename;
                        
                        #regular php folder or child-theme folder? (open)
                        if(!file_exists($filename_full)){
                            
                            $current_directory = 'wp-content/themes/tempera-child/';
                            $file_list = array_values(array_diff(scandir($current_directory), array('.','..','error_log','tempera-child',$filename)));
                            $filename_full = $current_directory.$filename;
                            
                        }
                        #regular php folder or child-theme folder? (close)
                        
                    }
                    #variable definitions (close)
                    
                    #mysql (open)
                    if(1==1){
                        
                        $all_pages_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                            FROM 4df5ukbnn5p3t817_posts
                                                            WHERE post_status = "publish"
                                                                AND post_type IN ("post","page","members-net-page","staff-net-page","website-page","developer-page","wiki-page")
                                                            ;');
                        $all_pages_results = $GLOBALS['wpdb']->get_results($all_pages_query);
                        
                    }
                    #mysql (close)
                    
                    #including files (open)
                    for($afu=0;$afu<count($file_list);$afu++){
                        
                        $occurences_in_file
                        = substr_count(
                               file_get_contents($current_directory.'/'.$file_list[$afu]),
                               "include('".$filename."');"
                        ) + substr_count(
                               file_get_contents($current_directory.'/'.$file_list[$afu]),
                               'include("'.$filename.'");'
                        );
                        
                        if($occurences_in_file > 0){
                            $page_object = get_page_by_title("PHP file: ".$file_list[$afu],"object","wiki-page");
                            $including_files .= '
                            <p>
                                <a href="'.get_permalink($page_object->ID).'">
                                    '.$file_list[$afu].'&nbsp;('.$occurences_in_file.')
                                </a>
                            </p>';
                        }
                    }
                    #including files (open)
                    
                    #including pages (open)
                    for($ais=0;$ais<count($all_pages_results);$ais++){
                        
                        #filter out relevant posts (open)
                        if(strpos($all_pages_results[$ais]->post_content,"wp-content/wp-php-voluno/".$filename) !== false){
                            $including_files .= '
                            <p>
                                <span style="color:grey;">'.$all_pages_results[$ais]->post_type.':</span>
                                <a href="'.get_permalink($all_pages_results[$ais]->ID).'">
                                    '.$all_pages_results[$ais]->post_title.'
                                </a>
                            </p>';
                        }
                        #filter out relevant posts (open)
                        
                    }
                    #including pages (close)
                    
                    #if empty (open)
                    if(empty($including_files)){
                        
                        $including_files = "(None)";
                        
                    }
                    #if empty (close)
                    
                }
                #prepare (open)
                
                #display (open)
                if(1==1){
                    
                    $left_top_developer_box .= '
                    <div
                        style="
                            background-color:#fff;
                            padding:10px;
                            margin:5px;
                            width:100px;
                            border:1px solid black;
                            vertical-align:center;
                            overflow-y: auto;
                            max-height: 300px;
                        "
                        class="function_developer_info_left"
                    >
                        <p style="font-weight:bold;margin-bottom:10px;">
                            Wiki pages
                        </p>
                        <ul>
                            <li>
                                <b>
                                    <a href="'.get_permalink($wikipage['id']).'">
                                        '.$wikipage['title'].'
                                    </a>
                                </b>
                            </li>
                            '.$including_files.'
                        <ul>
                    </div>';
                    
                }
                #display (close)
                
            }
            #wiki pages of this file (closse)
            
            echo '
            <div
                style="
                    position:fixed;
                    top:40px;
                    left:0%;
                    z-index:1000;
                "
            >'.
                $left_top_developer_box.
            '</div>';
            
        }
        #displayed as left sidebar (close)
        
    }
    #content (close)
    
    #jQuery (open)
    if(1==1){
        
        echo '
        <script>
            jQuery(document).ready(function(){
                
                jQuery(".function_developer_info_index_div").click(function(){
                    jQuery(".function_developer_info_index_new").load("'.get_permalink().'?function_developer_info_index_update=1 .function_developer_info_index_new");
                });
                
                jQuery(".function_developer_info_left").hover(function(){
                    jQuery(this).css("width","");
                },function(){
                    jQuery(this).css("width","100px");
                });
                
            });
        </script>';
        
    }
    #jQuery (close)
    
    #unset (open)
    if(1==1){
        $function_developer_info;
    }
    #unset (close)

}
#only in production site, to prevent conflict (close)

?>