<?php

if(!current_user_can("manage_options")){
    echo "You do not have persmission to view this site.";
}else{
    
    
    
    
    #delete everything in the sorting, tabula rasa style
        $delete = $GLOBALS['wpdb']->query("TRUNCATE TABLE fi4l3fg_voluno_list_sorting");
    
    
    
    #task updates (open)
    if(1==1){
        echo "<h1>Task list has been updated.</h1><br>Task list levels: ";
        
        $task_list_update_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types;');
        $task_list_update_results = $GLOBALS['wpdb']->get_results($task_list_update_query);
        
        foreach($task_list_update_results as $task_list_update_row){
        
            #for level 2, 1. parents
                $task_list_parent1_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_update_row->task_type_parent);
                $task_list_parent1_row = $GLOBALS['wpdb']->get_row($task_list_parent1_query);
        
            #for level 3, 2. parents
                $task_list_parent2_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent1_row->task_type_parent);
                $task_list_parent2_row = $GLOBALS['wpdb']->get_row($task_list_parent2_query);
        
            #for level 4, 3. parents
                $task_list_parent3_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent2_row->task_type_parent);
                $task_list_parent3_row = $GLOBALS['wpdb']->get_row($task_list_parent3_query);
        
            #for level 5, 4. parents
                $task_list_parent4_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent3_row->task_type_parent);
                $task_list_parent4_row = $GLOBALS['wpdb']->get_row($task_list_parent4_query);
        
            #for level 6, 5. parents
                $task_list_parent5_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent4_row->task_type_parent);
                $task_list_parent5_row = $GLOBALS['wpdb']->get_row($task_list_parent5_query);
        
            #for level 7, 6. parents
                $task_list_parent6_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent5_row->task_type_parent);
                $task_list_parent6_row = $GLOBALS['wpdb']->get_row($task_list_parent6_query);
        
        
        
        
        
        
        
        
        
        
            if( $task_list_update_row->task_type_parent == 1){ #if it is level 1
                    echo "1";
                $GLOBALS['wpdb']->insert( 
                                'fi4l3fg_voluno_list_sorting', 
                        array(
                                'voluno_liso_item_id' => $task_list_update_row->task_type_id,
                                'voluno_liso_item_type' => "task",
                                'voluno_liso_item_level' => "1"
                            ),
                        array( 
                                '%s',
                                '%s',
                                '%s'
                            ));
            }else{ #if it's not level 1
                if($task_list_parent1_row->task_type_parent == 1){ #if it is level 2
                    echo "2";
                    $GLOBALS['wpdb']->insert( 
                                    'fi4l3fg_voluno_list_sorting', 
                            array(
                                    'voluno_liso_item_id' => $task_list_update_row->task_type_id,
                                    'voluno_liso_item_type' => "task",
                                    'voluno_liso_item_level' => "2",
                                    'voluno_liso_parent_l1' => $task_list_parent1_row->task_type_id
                                ),
                            array( 
                                    '%s',
                                    '%s',
                                    '%s',
                                    '%s'
                                ));
                }else{ #if it's not level 1 or 2
                    if($task_list_parent2_row->task_type_parent == 1){ #if it is level 3
                        echo "3";
                        $GLOBALS['wpdb']->insert( 
                                        'fi4l3fg_voluno_list_sorting', 
                                array(
                                        'voluno_liso_item_id' => $task_list_update_row->task_type_id,
                                        'voluno_liso_item_type' => "task",
                                        'voluno_liso_item_level' => "3",
                                        'voluno_liso_parent_l1' => $task_list_parent2_row->task_type_id,
                                        'voluno_liso_parent_l2' => $task_list_parent1_row->task_type_id
                                    ),
                                array( 
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%s'
                                    ));
                    }else{ #if it's not level 1, 2 or 3
                        if($task_list_parent3_row->task_type_parent == 1){ #if it is level 4
                            echo "4";
                            $GLOBALS['wpdb']->insert( 
                                            'fi4l3fg_voluno_list_sorting', 
                                    array(
                                            'voluno_liso_item_id' => $task_list_update_row->task_type_id,
                                            'voluno_liso_item_type' => "task",
                                            'voluno_liso_item_level' => "4",
                                            'voluno_liso_parent_l1' => $task_list_parent3_row->task_type_id,
                                            'voluno_liso_parent_l2' => $task_list_parent2_row->task_type_id,
                                            'voluno_liso_parent_l3' => $task_list_parent1_row->task_type_id
                                        ),
                                    array( 
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s'
                                        ));
                        }else{ #if it's not level 1, 2, 3 or 4
                            if($task_list_parent4_row->task_type_parent == 1){ #if it is level 5
                                echo "5";
                                $GLOBALS['wpdb']->insert( 
                                                'fi4l3fg_voluno_list_sorting', 
                                        array(
                                                'voluno_liso_item_id' => $task_list_update_row->task_type_id,
                                                'voluno_liso_item_type' => "task",
                                                'voluno_liso_item_level' => "5",
                                                'voluno_liso_parent_l1' => $task_list_parent4_row->task_type_id,
                                                'voluno_liso_parent_l2' => $task_list_parent3_row->task_type_id,
                                                'voluno_liso_parent_l3' => $task_list_parent2_row->task_type_id,
                                                'voluno_liso_parent_l4' => $task_list_parent1_row->task_type_id
                                            ),
                                        array( 
                                                '%s',
                                                '%s',
                                                '%s',
                                                '%s',
                                                '%s',
                                                '%s',
                                                '%s'
                                            ));
                            }else{ #if it's not level 1, 2, 3, 4 or 5
                                if($task_list_parent5_row->task_type_parent == 1){ #if it is level 6
                                    echo "6";
                                    $GLOBALS['wpdb']->insert( 
                                                    'fi4l3fg_voluno_list_sorting', 
                                            array(
                                                    'voluno_liso_item_id' => $task_list_update_row->task_type_id,
                                                    'voluno_liso_item_type' => "task",
                                                    'voluno_liso_item_level' => "6",
                                                    'voluno_liso_parent_l1' => $task_list_parent5_row->task_type_id,
                                                    'voluno_liso_parent_l2' => $task_list_parent4_row->task_type_id,
                                                    'voluno_liso_parent_l3' => $task_list_parent3_row->task_type_id,
                                                    'voluno_liso_parent_l4' => $task_list_parent2_row->task_type_id,
                                                    'voluno_liso_parent_l5' => $task_list_parent1_row->task_type_id
                                                ),
                                            array( 
                                                    '%s',
                                                    '%s',
                                                    '%s',
                                                    '%s',
                                                    '%s',
                                                    '%s',
                                                    '%s',
                                                    '%s'
                                                ));
                                }else{ #if it's not level 1, 2, 3, 4, 5 or 6
                                    if($task_list_parent6_row->task_type_parent == 1){ #if it is level 7
                                        echo "7";
                                        $GLOBALS['wpdb']->insert( 
                                                        'fi4l3fg_voluno_list_sorting', 
                                                array(
                                                        'voluno_liso_item_id' => $task_list_update_row->task_type_id,
                                                        'voluno_liso_item_type' => "task",
                                                        'voluno_liso_item_level' => "7",
                                                        'voluno_liso_parent_l1' => $task_list_parent6_row->task_type_id,
                                                        'voluno_liso_parent_l2' => $task_list_parent5_row->task_type_id,
                                                        'voluno_liso_parent_l3' => $task_list_parent4_row->task_type_id,
                                                        'voluno_liso_parent_l4' => $task_list_parent3_row->task_type_id,
                                                        'voluno_liso_parent_l5' => $task_list_parent2_row->task_type_id,
                                                        'voluno_liso_parent_l6' => $task_list_parent1_row->task_type_id
                                                    ),
                                                array( 
                                                        '%s',
                                                        '%s',
                                                        '%s',
                                                        '%s',
                                                        '%s',
                                                        '%s',
                                                        '%s',
                                                        '%s',
                                                        '%s'
                                                    ));
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        
        #ordering
            #level 1
            $task_list_ordering_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                     FROM fi4l3fg_voluno_list_sorting
                                                        LEFT JOIN fi4l3fg_voluno_lists_task_types
                                                        ON voluno_liso_item_id = task_type_id
                                                     WHERE voluno_liso_item_level = %s
                                                     AND voluno_liso_item_type = %s
                                                     ORDER BY task_type_name DESC;',
                                                     "1","task");
            $task_list_ordering_results = $GLOBALS['wpdb']->get_results($task_list_ordering_query);
            echo '<br>';
            $voluno_liso_orderby1 = 0;
            foreach($task_list_ordering_results as $task_list_ordering_row){
                $voluno_liso_orderby1 = $voluno_liso_orderby1 + 1000000000;
                $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_list_sorting',
                        array( //updated content
                                'voluno_liso_orderby' => $voluno_liso_orderby1,
                        ), 
                        array( //location of updated content
                                'voluno_liso_item_id' => $task_list_ordering_row->voluno_liso_item_id
                        ), 
                        array( //format of updated content
                                '%s'
                        ), 
                        array( //format of location of updated content
                                '%s'
                            ));
                #level 2
                $task_list_ordering_query2 = $GLOBALS['wpdb']->prepare('SELECT *
                                                         FROM fi4l3fg_voluno_list_sorting
                                                            LEFT JOIN fi4l3fg_voluno_lists_task_types
                                                            ON voluno_liso_item_id = task_type_id
                                                         WHERE voluno_liso_item_level = %s
                                                            AND voluno_liso_parent_l1 = %s
                                                         ORDER BY task_type_name ASC;',
                                                         "2",
                                                         $task_list_ordering_row->voluno_liso_item_id);
                $task_list_ordering_results2 = $GLOBALS['wpdb']->get_results($task_list_ordering_query2);
                
                $voluno_liso_orderby2 = $voluno_liso_orderby1;
                
                foreach($task_list_ordering_results2 as $task_list_ordering_row2){
                    
                    $voluno_liso_orderby2 = $voluno_liso_orderby2 + 1000000;
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_list_sorting',
                            array( //updated content
                                    'voluno_liso_orderby' => $voluno_liso_orderby2,
                            ), 
                            array( //location of updated content
                                    'voluno_liso_item_id' => $task_list_ordering_row2->voluno_liso_item_id
                            ), 
                            array( //format of updated content
                                    '%s'
                            ), 
                            array( //format of location of updated content
                                    '%s'
                                ));
                    
                    #level 3
                    $task_list_ordering_query3 = $GLOBALS['wpdb']->prepare('SELECT *
                                                             FROM fi4l3fg_voluno_list_sorting
                                                                LEFT JOIN fi4l3fg_voluno_lists_task_types
                                                                ON voluno_liso_item_id = task_type_id
                                                             WHERE voluno_liso_item_level = %s
                                                                AND voluno_liso_parent_l2 = %s
                                                             ORDER BY task_type_name ASC;',
                                                             "3",
                                                             $task_list_ordering_row2->voluno_liso_item_id);
                    $task_list_ordering_results3 = $GLOBALS['wpdb']->get_results($task_list_ordering_query3);
                    
                    $voluno_liso_orderby3 = $voluno_liso_orderby2;
                    
                    foreach($task_list_ordering_results3 as $task_list_ordering_row3){
                        $voluno_liso_orderby3 = $voluno_liso_orderby3 + 1000;
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_list_sorting',
                                array( //updated content
                                        'voluno_liso_orderby' => $voluno_liso_orderby3,
                                ), 
                                array( //location of updated content
                                        'voluno_liso_item_id' => $task_list_ordering_row3->voluno_liso_item_id
                                ), 
                                array( //format of updated content
                                        '%s'
                                ), 
                                array( //format of location of updated content
                                        '%s'
                                    ));
                        #level 4
                        $task_list_ordering_query4 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                 FROM fi4l3fg_voluno_list_sorting
                                                                    LEFT JOIN fi4l3fg_voluno_lists_task_types
                                                                    ON voluno_liso_item_id = task_type_id
                                                                 WHERE voluno_liso_item_level = %s
                                                                    AND voluno_liso_parent_l3 = %s
                                                                 ORDER BY task_type_name ASC;',
                                                                 "4",
                                                                 $task_list_ordering_row3->voluno_liso_item_id);
                        $task_list_ordering_results4 = $GLOBALS['wpdb']->get_results($task_list_ordering_query4);
                        
                        $voluno_liso_orderby4 = $voluno_liso_orderby3;
                        
                        foreach($task_list_ordering_results4 as $task_list_ordering_row4){
                            $voluno_liso_orderby4 = $voluno_liso_orderby4 + 1;
                            $GLOBALS['wpdb']->update( 
                                            'fi4l3fg_voluno_list_sorting',
                                    array( //updated content
                                            'voluno_liso_orderby' => $voluno_liso_orderby4,
                                    ), 
                                    array( //location of updated content
                                            'voluno_liso_item_id' => $task_list_ordering_row4->voluno_liso_item_id
                                    ), 
                                    array( //format of updated content
                                            '%s'
                                    ), 
                                    array( //format of location of updated content
                                            '%s'
                                        ));
                            #level 5
                            $task_list_ordering_query5 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                     FROM fi4l3fg_voluno_list_sorting
                                                                        LEFT JOIN fi4l3fg_voluno_lists_task_types
                                                                        ON voluno_liso_item_id = task_type_id
                                                                     WHERE voluno_liso_item_level = %s
                                                                        AND voluno_liso_parent_l4 = %s
                                                                     ORDER BY task_type_name ASC;',
                                                                     "5",
                                                                     $task_list_ordering_row4->voluno_liso_item_id);
                            $task_list_ordering_results5 = $GLOBALS['wpdb']->get_results($task_list_ordering_query5);
                            
                            $voluno_liso_orderby5 = $voluno_liso_orderby4;
                            
                            foreach($task_list_ordering_results5 as $task_list_ordering_row5){
                                $voluno_liso_orderby5 = $voluno_liso_orderby5 + 0.001;
                                $GLOBALS['wpdb']->update( 
                                                'fi4l3fg_voluno_list_sorting',
                                        array( //updated content
                                                'voluno_liso_orderby' => $voluno_liso_orderby5,
                                        ), 
                                        array( //location of updated content
                                                'voluno_liso_item_id' => $task_list_ordering_row5->voluno_liso_item_id
                                        ), 
                                        array( //format of updated content
                                                '%s'
                                        ), 
                                        array( //format of location of updated content
                                                '%s'
                                            ));
                            }
                        }
                    }
                }
            }
    }
    #task updates (close)

    
    #country updates (open)
    if(1==1){
        echo "<h1>Country and Regions list has been updated.</h1><br>Country list levels: ";
        
        $country_list_update_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_countries;');
        $country_list_update_results = $GLOBALS['wpdb']->get_results($country_list_update_query);
        
        foreach($country_list_update_results as $country_list_update_row){
        /*
            #for level 2, 1. parents
                $task_list_parent1_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $country_list_update_row->task_type_parent);
                $task_list_parent1_row = $GLOBALS['wpdb']->get_row($task_list_parent1_query);
        
            #for level 3, 2. parents
                $task_list_parent2_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent1_row->task_type_parent);
                $task_list_parent2_row = $GLOBALS['wpdb']->get_row($task_list_parent2_query);
        
            #for level 4, 3. parents
                $task_list_parent3_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent2_row->task_type_parent);
                $task_list_parent3_row = $GLOBALS['wpdb']->get_row($task_list_parent3_query);
        
            #for level 5, 4. parents
                $task_list_parent4_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent3_row->task_type_parent);
                $task_list_parent4_row = $GLOBALS['wpdb']->get_row($task_list_parent4_query);
        
            #for level 6, 5. parents
                $task_list_parent5_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent4_row->task_type_parent);
                $task_list_parent5_row = $GLOBALS['wpdb']->get_row($task_list_parent5_query);
        
            #for level 7, 6. parents
                $task_list_parent6_query = $GLOBALS['wpdb']->prepare('SELECT * FROM fi4l3fg_voluno_lists_task_types
                                                          WHERE task_type_id = %s;',
                                                          $task_list_parent5_row->task_type_parent);
                $task_list_parent6_row = $GLOBALS['wpdb']->get_row($task_list_parent6_query);
        
        
        
        
        
        
        
        
        */
        
            if( $country_list_update_row->list_countries_type == "world"){ #if it is level 1 (world)
                    echo "1";
                $GLOBALS['wpdb']->insert( 
                                'fi4l3fg_voluno_list_sorting', 
                        array(
                                'voluno_liso_item_name' => $country_list_update_row->list_countries_name,
                                'voluno_liso_item_type' => "country",
                                'voluno_liso_item_level' => "1 - world",
                                'voluno_liso_item_id' => $country_list_update_row->list_countries_id
                            ),
                        array( 
                                '%s',
                                '%s',
                                '%s',
                                '%s'
                            ));
            }else{ #if it's not level 1
                if($country_list_update_row->list_countries_type == "continent"){ #if it is level 2 (continent)
                    echo "2";
                    $GLOBALS['wpdb']->insert( 
                                    'fi4l3fg_voluno_list_sorting', 
                            array(
                                    'voluno_liso_item_name' => $country_list_update_row->list_countries_name,
                                    'voluno_liso_item_type' => "country",
                                    'voluno_liso_item_level' => "2 - continent",
                                    'voluno_liso_parent_l1' => "269",
                                    'voluno_liso_parent_l7' => "269",
                                    'voluno_liso_item_id' => $country_list_update_row->list_countries_id
                                ),
                            array( 
                                    '%s',
                                    '%s',
                                    '%s',
                                    '%s',
                                    '%s',
                                    '%s'
                                ));
                }else{ #if it's not level 1 or 2
                    if($country_list_update_row->list_countries_type == "region"){ #if it is level 3 (region)
                        echo "3";
                        $GLOBALS['wpdb']->insert( 
                                        'fi4l3fg_voluno_list_sorting', 
                                array(
                                        'voluno_liso_item_name' => $country_list_update_row->list_countries_name,
                                        'voluno_liso_item_type' => "country",
                                        'voluno_liso_item_level' => "3 - region",
                                        'voluno_liso_parent_l1' => "269",
                                        'voluno_liso_parent_l2' => $country_list_update_row->list_countries_continent,
                                        'voluno_liso_parent_l7' => $country_list_update_row->list_countries_continent,
                                        'voluno_liso_item_id' => $country_list_update_row->list_countries_id
                                    ),
                                array( 
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%s'
                                    ));
                    }else{ #if it's not level 1, 2 or 3
                        if($country_list_update_row->list_countries_type == "country"){ #if it is level 4 (country)
                            echo "4";
                            $GLOBALS['wpdb']->insert( 
                                            'fi4l3fg_voluno_list_sorting', 
                                    array(
                                            'voluno_liso_item_name' => $country_list_update_row->list_countries_name,
                                            'voluno_liso_item_type' => "country",
                                            'voluno_liso_item_level' => "4 - country",
                                            'voluno_liso_parent_l1' => "269",
                                            'voluno_liso_parent_l2' => $country_list_update_row->list_countries_continent,
                                            'voluno_liso_parent_l3' => $country_list_update_row->list_countries_region,
                                            'voluno_liso_parent_l7' => $country_list_update_row->list_countries_region,
                                            'voluno_liso_item_id' => $country_list_update_row->list_countries_id
                                        ),
                                    array( 
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s',
                                            '%s'
                                        ));
                        }
                    }
                }
            }
            
        }
        
        
        #ordering
            #level 1
            $countries_list_ordering_query = $GLOBALS['wpdb']->prepare('SELECT *
                                                    FROM fi4l3fg_voluno_list_sorting
                                                       LEFT JOIN fi4l3fg_voluno_lists_countries
                                                       ON voluno_liso_item_id = list_countries_name
                                                    WHERE voluno_liso_item_level = %s
                                                    AND voluno_liso_item_type = %s
                                                    ORDER BY list_countries_name ASC;',
                                                    "1 - world","country");
            $countries_list_ordering_results = $GLOBALS['wpdb']->get_results($countries_list_ordering_query);
            $voluno_liso_orderby1 = 0;
            foreach($countries_list_ordering_results as $countries_list_ordering_row){
                $voluno_liso_orderby1 = $voluno_liso_orderby1 + 1000000000;
                $GLOBALS['wpdb']->update( 
                                'fi4l3fg_voluno_list_sorting',
                        array( //updated content
                                'voluno_liso_orderby' => $voluno_liso_orderby1,
                        ), 
                        array( //location of updated content
                                'voluno_liso_item_id' => $countries_list_ordering_row->voluno_liso_item_id
                        ), 
                        array( //format of updated content
                                '%s'
                        ), 
                        array( //format of location of updated content
                                '%s'
                            ));
                #level 2
                $countries_list_ordering_query2 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                FROM fi4l3fg_voluno_list_sorting
                                                                   LEFT JOIN fi4l3fg_voluno_lists_countries
                                                                   ON voluno_liso_item_id = list_countries_name
                                                                WHERE voluno_liso_item_level = %s
                                                                AND voluno_liso_item_type = %s
                                                                AND voluno_liso_parent_l1 = %s
                                                                ORDER BY list_countries_name ASC;',
                                                                "2 - continent",
                                                                "country",
                                                                $countries_list_ordering_row->voluno_liso_item_id);
                $countries_list_ordering_results2 = $GLOBALS['wpdb']->get_results($countries_list_ordering_query2);
                
                $voluno_liso_orderby2 = $voluno_liso_orderby1;
                
                foreach($countries_list_ordering_results2 as $countries_list_ordering_row2){
                    
                    $voluno_liso_orderby2 = $voluno_liso_orderby2 + 1000000;
                    $GLOBALS['wpdb']->update( 
                                    'fi4l3fg_voluno_list_sorting',
                            array( //updated content
                                    'voluno_liso_orderby' => $voluno_liso_orderby2,
                            ), 
                            array( //location of updated content
                                    'voluno_liso_item_id' => $countries_list_ordering_row2->voluno_liso_item_id
                            ), 
                            array( //format of updated content
                                    '%s'
                            ), 
                            array( //format of location of updated content
                                    '%s'
                                ));
                    
                    #level 3
                    $countries_list_ordering_query3 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                    FROM fi4l3fg_voluno_list_sorting
                                                                       LEFT JOIN fi4l3fg_voluno_lists_countries
                                                                       ON voluno_liso_item_id = list_countries_name
                                                                    WHERE voluno_liso_item_level = %s
                                                                    AND voluno_liso_item_type = %s
                                                                    AND voluno_liso_parent_l2 = %s
                                                                    ORDER BY list_countries_name ASC;',
                                                                    "3 - region",
                                                                    "country",
                                                                    $countries_list_ordering_row2->voluno_liso_item_id);
                    $countries_list_ordering_results3 = $GLOBALS['wpdb']->get_results($countries_list_ordering_query3);
                    
                    $voluno_liso_orderby3 = $voluno_liso_orderby2;
                    
                    foreach($countries_list_ordering_results3 as $countries_list_ordering_row3){
                        $voluno_liso_orderby3 = $voluno_liso_orderby3 + 1000;
                        $GLOBALS['wpdb']->update( 
                                        'fi4l3fg_voluno_list_sorting',
                                array( //updated content
                                        'voluno_liso_orderby' => $voluno_liso_orderby3,
                                ), 
                                array( //location of updated content
                                        'voluno_liso_item_id' => $countries_list_ordering_row3->voluno_liso_item_id
                                ), 
                                array( //format of updated content
                                        '%s'
                                ), 
                                array( //format of location of updated content
                                        '%s'
                                    ));
                        #level 4
                        $countries_list_ordering_query4 = $GLOBALS['wpdb']->prepare('SELECT *
                                                                        FROM fi4l3fg_voluno_list_sorting
                                                                           LEFT JOIN fi4l3fg_voluno_lists_countries
                                                                           ON voluno_liso_item_id = list_countries_name
                                                                        WHERE voluno_liso_item_level = %s
                                                                        AND voluno_liso_item_type = %s
                                                                        AND voluno_liso_parent_l3 = %s
                                                                        ORDER BY list_countries_name ASC;',
                                                                        "4 - country",
                                                                        "country",
                                                                        $countries_list_ordering_row3->voluno_liso_item_id);
                        $countries_list_ordering_results4 = $GLOBALS['wpdb']->get_results($countries_list_ordering_query4);
                        
                        $voluno_liso_orderby4 = $voluno_liso_orderby3;
                        
                        foreach($countries_list_ordering_results4 as $countries_list_ordering_row4){
                            $voluno_liso_orderby4 = $voluno_liso_orderby4 + 1;
                            $GLOBALS['wpdb']->update( 
                                            'fi4l3fg_voluno_list_sorting',
                                    array( //updated content
                                            'voluno_liso_orderby' => $voluno_liso_orderby4,
                                    ), 
                                    array( //location of updated content
                                            'voluno_liso_item_id' => $countries_list_ordering_row4->voluno_liso_item_id
                                    ), 
                                    array( //format of updated content
                                            '%s'
                                    ), 
                                    array( //format of location of updated content
                                            '%s'
                                        ));
                        }
                    }
                }
            }
    }
    #country updates (close)
    
    

}



?>












