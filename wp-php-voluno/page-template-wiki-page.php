<?php

#warning if page is not production site (open)
if(site_url() != 'https://www.voluno.org'){
    
    echo '
    <div style="color:red;">
        <h1 style="color:red;">
            You\'re not on the production site
        </h1>
        <p>
            This wiki is regularly replaced by the production site wiki.
            <br>
            Thus, please
            <ul>
                <li>
                    either only edit the production wiki,
                </li>
                <li>
                    edit both simultaneously or
                </li>
                <li>
                    copy everything you edited to your computer (e.g. into a Word-Document),
                    so that it can easily be inserted into the production site, once you\'re ready
                </li>
            </ul>
        <p>
            Please only claim pages on the production site (to signal that you\'re working on them).
        </p>
        <p>
            Click <a href="https://www.voluno.org/archives/wiki-page/962">here</a> to visit the production site wiki (you need to login to view it).
        </p>
    </div>
    ';
}
#warning if page is not production site (close)

#mysql (open)
if(1==1){
    
    global $wpdb;
    
    #get (open)
    if(1==1){
        
        $wiki_post_query = $wpdb->prepare('
                                        SELECT *
                                        FROM 4df5ukbnn5p3t817_posts
                                        WHERE post_type = "wiki-page"
                                            AND post_status = "publish"
                                        ORDER BY post_title ASC;
                                        ');
        $wiki_post_query_results = $wpdb->get_results($wiki_post_query);
        
    }
    #get (close)
    
}
#mysql (close)

#style (open)
if(1==1){
    
    echo '
    <style>
        .table_of_contents{
            background-color: #f9f9f9;
            border: 1px solid #aaa;
            font-size: 95%;
            padding: 5px;
            display: inline-block;
        }
        .table_of_contents a{
            cursor:pointer;
        }
        .table_of_contents ol{
            list-style-type:none;
            counter-reset: item; 
        }
        .table_of_contents li:before{
            content: counters(item, ".") " "; counter-increment: item
        }
        
        .voluno-wiki-right-box{
            float:right;
            background-color: #f9f9f9;
            border: 1px solid #aaa;
            font-size: 95%;
            padding: 5px;
            display: inline-block;
            margin:0px 0px 10px 10px;
        }
        
        .voluno_wiki_category_page_links{
            background-color: #f9f9f9;
            border: 1px solid #aaa;
            font-size: 95%;
            padding: 5px;
            display: inline-block;
            margin-top:10px;
        }
        
    </style>';

}
#style (close)

#content (open)
if(1==1){
    
    #prepare (open)
    if(1==1){
        
        #table of contents (open)
        if(1==1){
            
            $heading_code_array = array('<h1','<h2','<h3','<h4','<h5','<h6');#,'<H1>','<H2>','<H3>','<H4>','<H5>','<H6>');
            $heading_code_array_close = array('</h1','</h2','</h3','</h4','</h5','</h6');#,'</H1>','</H2>','</H3>','</H4>','</H5>','</H6>');
            
            #replace all headings, so they are easier to deal with (open)
            for($aid=0;$aid<count($heading_code_array);$aid++){
                $headings_count = $headings_count + substr_count(get_the_content(),$heading_code_array[$aid]);
            }
            #replace all headings, so they are easier to deal with (close)
            
            #filter out headings (open)
            for($aie=0;$aie<count($heading_code_array);$aie++){
                $start_position = 0;
                for($aif=0;$aif<$headings_count;$aif++){
                    
                    $heading['start']   = strpos(get_the_content(),$heading_code_array[$aie],$start_position);
                    $heading['end']     = strpos(get_the_content(),$heading_code_array_close[$aie],$start_position);
                    $headingd[] = $heading['start'];#dome
                    
                    if($heading['start'] !== FALSE){
                        
                        $start_position = $heading['end'] + strlen($heading_code_array_close[$aie]);
                        
                        $headings_array[] = array(
                            'start' => $heading['start'],
                            'end' => $heading['end'],
                            'level' => $aie+1,
                            'text' => strip_tags(substr(get_the_content(),$heading['start'],$heading['end']-$heading['start']))
                        );
                        
                    }
                    
                }
            }
            #filter out headings (close)
            
            #sort mutlidimensional array (open)
            usort($headings_array, function($a, $b) {
                return $a['start'] - $b['start'];
            });
            #sort mutlidimensional array (close)
            
            #adjust levels to start with level 1 (open)
            if(1==1){
                
                for($aih=0;$aih<count($headings_array);$aih++){
                    $top_level[] = $headings_array[$aih]['level'];
                }
                
                $top_level = min($top_level);
                
                for($aih=0;$aih<count($headings_array);$aih++){
                    $headings_array[$aih]['level'] = $headings_array[$aih]['level'] - $top_level + 1;
                }
            }
            #adjust levels to start with level 1 (open)
            
            #populate table of contents (open)
            for($aic=0;$aic<count($headings_array);$aic++){
                
                #open or close of list (open)
                if(1==1){
                    
                    #open element (open)
                    if($aic==0){ #first element
                        for($aig=0;$aig<$headings_array[$aic]['level'];$aig++){
                            $table_of_contents_list .='
                            <ol>
                            <li>';
                        }
                    }elseif($headings_array[$aic-1]['level'] == $headings_array[$aic]['level']){ #previous was same
                        $table_of_contents_list .='
                        </li>
                        <li>';
                    }elseif($headings_array[$aic-1]['level'] > $headings_array[$aic]['level']){ #previous was child
                        for($aig=0;$aig<$headings_array[$aic-1]['level']-$headings_array[$aic]['level'];$aig++){
                            $table_of_contents_list .=' 
                                    </li>
                                </ol>';
                        }
                        $table_of_contents_list .=' 
                        </li>
                        <li>';
                    }else{                                       #previous was parent
                        for($aig=0;$aig < $headings_array[$aic]['level'] - $headings_array[$aic-1]['level'] ;$aig++){
                            $table_of_contents_list .='
                            <ol>
                                <li>';
                        }
                    }
                    #open element (close)
                    
                    $voluno_wiki_heading_index++;
                    $table_of_contents_list .= '
                    <div style="display:inline-block;margin-left:5px;">
                        <a href="#voluno_wiki_heading_'.$voluno_wiki_heading_index.'">
                            '.$headings_array[$aic]['text'].'
                        </a>
                    </div>';
                    
                    #close element (open)
                    if($aic + 1 == count($headings_array)){
                        for($aig=0;$aig<$headings_array[$aic]['level'];$aig++){
                            
                            $table_of_contents_list .= '
                            </li>
                            </ol>';
                            
                        }
                    }
                    #close element (close)
                    
                }
                #open or close of list (close)
                
            }
            #populate table of contents (close)
            
            
            
            $table_of_contents =
            '<div style="margin:10px;" class="table_of_contents_container">
                <div class="table_of_contents">
                    <div style="width:100%;text-align:center;">
                        <b>Contents</b> (<a class="hide_show_table_of_contents">hide</a><a class="hide_show_table_of_contents" style="display:none;">show</a>)
                    </div>
                    <div class="table_of_contents_list">
                        '.$table_of_contents_list.'
                    </div>
                </div>
            </div>';
            
        }
        #table of contents (close)
        
        #trackbacks (open)
        if(1==1){
            
            for($aii=0;$aii<count($wiki_post_query_results);$aii++){
                
                if(strpos($wiki_post_query_results[$aii]->post_content, '<a href="https://www.voluno.org/archives/wiki-page/'.$post->post_name.'"') !== false){
                    $trackback_array[] = $aii;
                }
                
            }
            
            if(!empty($trackback_array)){
                
                $trackback .= '
                <div class="voluno-wiki-right-box">
                    <div style="text-align:center;">
                        <b>Pages linking here:</b>
                    </div>';
                
                for($aii=0;$aii<count($wiki_post_query_results);$aii++){
                    
                    $trackback .= '
                    <div>
                        <a href="'.get_permalink($wiki_post_query_results[$trackback_array[$aii]]->ID).'">
                            '.$wiki_post_query_results[$trackback_array[$aii]]->post_title.'
                        </a>
                    </div>';
                    
                }
                
                $trackback .= '
                </div>';
                
            }
            
        }
        #trackbacks (close)
        
        #category page links (open)
        if(1==1){
            
            $categorie_pages_array = array (
                array(
                    'prefix' => 'Conceptual component:',
                    'link_display' => 'Conceptual components',
                    'postid' => 966
                ),
                array(
                    'prefix' => 'MySQL table:',
                    'link_display' => 'MySQL tables',
                    'postid' => 994
                ),
                array(
                    'prefix' => 'PHP file:',
                    'link_display' => 'PHP files',
                    'postid' => 1410
                ),
                array(
                    'prefix' => 'Technical feature:',
                    'link_display' => 'Technical features',
                    'postid' => 1263
                ),
                array(
                    'prefix' => 'WordPress plugin:',
                    'link_display' => 'WordPress plugins',
                    'postid' => 1191
                ),
                array(
                    'prefix' => 'Developer assignment',
                    'link_display' => 'Developer assignments',
                    'postid' => 4422
                )
            );
            #var_dump($wiki_post_query_results);
            for($aim=0;$aim<count($categorie_pages_array);$aim++){
                if(substr_count(get_the_title(),$categorie_pages_array[$aim]['prefix'].' ') != 0){
                    
                    $category_page_links[] = '
                    <a href="'.get_permalink($categorie_pages_array[$aim]['postid']).'">
                        '.$categorie_pages_array[$aim]['link_display'].'
                    </a>';
                    
                }
            }
            
            if(!empty($category_page_links)){
                
                if(count($category_page_links) == 1){
                    $plural_s = "Categories";
                }else{
                    $plural_s = "Category";
                }
                
                $category_page_links = '
                <div class="voluno_wiki_category_page_links">
                    '.$plural_s.': '.implode(", ",$category_page_links).'
                </div>';
            }
            
        }
        #category page links (close)
        
        #developer assignments (open)
        if(substr(get_the_title(),0,strlen("Developer assignment ")) == "Developer assignment "){
            
            #mysql (open)
            if(1==1){
                
                $posts_query = $wpdb->prepare('
                                            SELECT * 
                                            FROM 4df5ukbnn5p3t817_posts
                                            WHERE post_type = "wiki-page"
                                                AND post_status = "publish"
                                            ORDER BY post_modified DESC;');
                $posts_results = $wpdb->get_results($posts_query);
                
            }
            #mysql (close)
            
            #loop (open)
            for($aij=0;$aij<count($posts_results);$aij++){
                
                unset($id_position);
                
                #get all todolist entries in the page (open)
                for($aiy=0;$aiy<substr_count($posts_results[$aij]->post_content,'#todolist');$aiy++){
                    
                    $string_position = strpos($posts_results[$aij]->post_content,'#todolist',$id_position);
                    $id_position = $string_position + strlen('#todolist: ');
                    
                    $hashtag_array[] = substr($posts_results[$aij]->post_content,$id_position,5);
                    $post_id_array[] = $posts_results[$aij]->ID;
                    
                }
                #get all todolist entries in the page (close)
                
            }
            #loop (close)
            
            #loop (open)
            for($aiy=0;$aiy<count($hashtag_array);$aiy++){
                if(substr(get_the_title(),strlen("Developer assignment "),5) == $hashtag_array[$aiy]){
                    if(empty($developer_assignments)){
                        $developer_assignments = "To do list entries linking here:";
                    }
                    $developer_assignments .=  
                    '<div
                        style="
                            background-color:#FFD87D;
                            border:1px solid grey;
                            border-radius:10px;
                            padding:10px;
                            margin:5px;
                        "
                    >
                        <a style="font-weight:bold;" href="'.get_permalink($post_id_array[$aiy]).'">
                            '.get_the_title($post_id_array[$aiy]).'
                        </a>
                    </div>';
                }
            }
            #loop (open)
            
        }
        #developer assignments (close)
        
    }
    #prepare (close)
    
    #execution (open)
    if(1==1){
        
        #title (open)
        if(1==1){
            echo
            '<h1>'.
                get_the_title().
            '</h1>';
        }
        #title (close)
        
        #content (open)
        if(1==1){
            
            echo $trackback;
            
            if(count($headings_array)>1){
                echo $table_of_contents;
            }
            
            echo '
            <div class="wiki_content">'.
                $developer_assignments;
                the_content(); #need to use the_content(), not get_the_content(), otherwise the plugin php my admin doesn't work anymore
                echo
                $category_page_links.'
            </div>';
            
            echo '<div style="width:100%;text-align:right;margin-bottom:-10px;">';
            edit_post_link('Edit');
            echo '</div>';
            
        }
        #content (close)
        
    }
    #execution (close)
    
}
#content (close)

#jquery(open)
if(count($headings_array)>1){
    
    echo '
    <script>
        jQuery(document).ready(function(){';
            
            #place table of contents before the first heading (open)
            if(1==1){
                echo '
                var table_of_contents = jQuery(".table_of_contents_container").html();
                var wiki_content = jQuery(".wiki_content").html();
                jQuery(".table_of_contents_container, .wiki_content").html(" ");
                var myArray = [];
                if(wiki_content.indexOf("<h1>") > 0){
                    myArray.push(wiki_content.indexOf("<h1>"));
                }
                if(wiki_content.indexOf("<h2>") > 0){
                    myArray.push(wiki_content.indexOf("<h2>"));
                }
                if(wiki_content.indexOf("<h3>") > 0){
                    myArray.push(wiki_content.indexOf("<h3>"));
                }
                if(wiki_content.indexOf("<h4>") > 0){
                    myArray.push(wiki_content.indexOf("<h4>"));
                }
                if(wiki_content.indexOf("<h5>") > 0){
                    myArray.push(wiki_content.indexOf("<h5>"));
                }
                if(wiki_content.indexOf("<h6>") > 0){
                    myArray.push(wiki_content.indexOf("<h6>"));
                }
                if(myArray.length == 0){
                    myArray.push(0);
                }
                var minValueInArray = Math.min.apply(Math, myArray);
                jQuery(".wiki_content").html(
                    wiki_content.substring(0,minValueInArray)+
                    "<div style=\"margin:10px;\">"+
                        table_of_contents+
                    "</div>"+
                    wiki_content.substring(minValueInArray)
                );';
            }
            #place table of contents before the first heading (close)
            
            #show hide button for table of contents (open)
            if(1==1){
                echo '
                jQuery(".hide_show_table_of_contents").click(function(){
                    jQuery(".table_of_contents_list").slideToggle(500);
                    jQuery(".hide_show_table_of_contents").toggle();
                });';
            }
            #show hide button for table of contents (close)
            
            #add id's to headings (open)
            if(1==1){
                echo '
                var heading_iteration = 0;
                jQuery(".wiki_content h1, .wiki_content h2, .wiki_content h3, .wiki_content h4, .wiki_content h5, .wiki_content h6").each(function(){
                    heading_iteration++;
                    jQuery(this).attr("id", "voluno_wiki_heading_"+heading_iteration);
                });';
            }
            #add id's to headings (close)
            
        echo '
        });
    </script>';
    
}
#jquery(close)    

?>