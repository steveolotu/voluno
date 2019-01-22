<?php

#version 2 (new) (open)
if($function_dts['version'] == 2){
    
    $staging_page_section = "div_table_selects";
    include('##staging-safety-mode.php');
    unset($staging_page_section);
    
}
#version 2 (new) (close)

#version 1 (old) (open)
else{
    
    #id (open)
    if(1==1){
	
	#random number (open)
	if(empty($function_div_table_selects_name)){
	    $voluno_random_num = "";
	    $length = 10;
	    for($i = 0; $i < $length; $i++) {
		$voluno_random_num = $voluno_random_num.substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
	    }
	}
	#random number (close)
	
	else{
	  $voluno_random_num = $function_div_table_selects_name;
	}
	
	$function_div_table_selects_id = $voluno_random_num;
	
    }
    #id (close)
    
    #style (open)
    if(1==1){
	$function_div_table_selects = '
	<style>
	    .function_div_table_selects_click_table'.$function_div_table_selects_id.'{
			  cursor:pointer;
			  border-radius:10px;
			  }
	    .function_div_table_selects_search_level2'.$function_div_table_selects_id.'{
			  border:2px solid grey;
			  border-radius: 10px;
			  background-color:#FFC977;
			  }
	</style>';
    }
    #style (close)
    
    #jquery (open)
    if(1==1){
	
	if($function_div_table_selects_all_children == "no"){
	    $function_div_table_selects_all_children = "no";
	    $function_div_table_selects_all_children_system = ".first()";
	
	}else{
	    $function_div_table_selects_all_children = "yes";
	    unset($function_div_table_selects_all_children_system);
	}
	
	if(empty($function_div_table_selects_selected_column_name)){
	    $function_div_table_selects_selected_column_name = 'pers_settings_value';
	}
	
	if(empty($function_div_table_selects_max_selected_checkboxed)){
	    $function_div_table_selects_max_selected_checkboxed == 3000;
	}
	
	$function_div_table_selects .= '
	<script>
	    jQuery(document).ready(function(){';
		
		#color change on hover (open)
		if(1==1){
		    $function_div_table_selects .= '
		    jQuery(".function_div_table_selects_click_table'.$function_div_table_selects_id.'").hover(function(){
			jQuery(this).parent().parent().find(".function_div_table_selects_click_table'.$function_div_table_selects_id.'")'.
			$function_div_table_selects_all_children_system.'.css("background-color","#F86A00");
		    },function(){
			jQuery(this).parent().parent().find(".function_div_table_selects_click_table'.$function_div_table_selects_id.'")'.
			$function_div_table_selects_all_children_system.'.css("background-color","");
		    });';
		}
		#color change on hover (close)
		
		#initial actions (open)
		if(1==1){
		    
		    #selected counter (open)
		    if(1==1){
			$function_div_table_selects .= '
			function functionFunctionDivTableSelects_selectCounter'.$function_div_table_selects_id.'() {
			    window.functionDivTableSelects_maxSelected'.$function_div_table_selects_id.'
			    = jQuery(".function_div_table_selects_search_level1'.$function_div_table_selects_id.' input:checked").length;
			}';
		    }
		    #selected counter (open)
		    
		    #update selected counter field (open)
		    if(1==1){
			$function_div_table_selects .= '
			
			function functionFunctionDivTableSelects_updateCounterField'.$function_div_table_selects_id.'() {
			    
			    functionFunctionDivTableSelects_selectCounter'.$function_div_table_selects_id.'();
			    
			    jQuery(".'.$function_div_table_selects_name.'_selected_counter")'.
			    '.html(functionDivTableSelects_maxSelected'.$function_div_table_selects_id.');
			    
			}
			functionFunctionDivTableSelects_updateCounterField'.$function_div_table_selects_id.'();
			';
		    }
		    #update selected counter field (close)
		    
		    #disable selection if max number selected (open)
		    if($function_div_table_selects_all_children == "no"){
			$function_div_table_selects .= '
			
			function functionFunctionDivTableSelects_blockIfMaxSelected'.$function_div_table_selects_id.'() {
			    if(functionDivTableSelects_maxSelected'.$function_div_table_selects_id.' >= '.$function_div_table_selects_max_selected_checkboxed.'){
				jQuery(".function_div_table_selects_click_table'.$function_div_table_selects_id.' input").not(":checked").attr("disabled", true);
			    }
			}
			
			functionFunctionDivTableSelects_blockIfMaxSelected'.$function_div_table_selects_id.'()
			
			';
		    }
		    #disable selection if max number selected (close)
		    
		}
		#initial actions (close)
		
		#select options without children (open)
		if($function_div_table_selects_all_children == "no"){
		    $function_div_table_selects .= '
		    
		    jQuery(".function_div_table_selects_click_table'.$function_div_table_selects_id.' input").click(function(){
			
			functionFunctionDivTableSelects_selectCounter'.$function_div_table_selects_id.'();
			';
			
			#user checked something and it's not ok (open)
			if(1==1){
			    
			    $function_div_table_selects .= '
			    if(jQuery(this).prop("checked")'.
			    ' && functionDivTableSelects_maxSelected'.$function_div_table_selects_id.' >= '.$function_div_table_selects_max_selected_checkboxed.'){
				
				functionFunctionDivTableSelects_blockIfMaxSelected'.$function_div_table_selects_id.'();
				
			    }';
			}
			#user checked something and it's not ok (close)
			
			#user checked something and it's ok (open)
			if($function_div_table_selects_all_children != "no"){
			    $function_div_table_selects .=
			    'else if(jQuery(this).prop("checked")){
			    
			    }';
			}
			#user checked something and it's ok (close)prop("checked", true);
			
			#user unchecked something (open)
			if(1==1){
			    $function_div_table_selects .=
			    'else{
			      
				jQuery(".function_div_table_selects_click_table'.$function_div_table_selects_id.' input").removeAttr("disabled");
			      
			    }';
			}
			#user unchecked something (close)
			
		    $function_div_table_selects .= '
		    
		    functionFunctionDivTableSelects_updateCounterField'.$function_div_table_selects_id.'();
		    
		    });';
		}
		#select options without children (close)
		
		#select options with children (open)
		else{
		    $function_div_table_selects .= '
		    
		    jQuery(".function_div_table_selects_click_table'.$function_div_table_selects_id.' input").click(function(){
			
			functionFunctionDivTableSelects_selectCounter'.$function_div_table_selects_id.'();
			';
			
			#user checked something (open)
			if(1==1){
			  $function_div_table_selects .=
			    'if(jQuery(this).prop("checked")){
				
				jQuery(this).parent().parent().parent().parent().parent().parent().find("input").prop("checked", true);
				
			    }';
			}
			#user checked something (close)
			
			#user unchecked something (open)
			if(1==1){
			  $function_div_table_selects .=
			  'else{
				
				jQuery(this).parent().parent().parent().parent().parent().parent().find("input").prop("checked", false);
				
			  }';
			}
			#user unchecked something (close)
			
		    $function_div_table_selects .= '
		    
		    functionFunctionDivTableSelects_updateCounterField'.$function_div_table_selects_id.'();
		    
		    });';
		}
		#select options with children (close)
		
	    $function_div_table_selects .= '
	    });
	</script>';
    }
    #script (close)
    
    #content (open)
    if(1==1){
	
	$function_div_table_selects .= '
	<span class="'.$function_div_table_selects_name.'_selected_counter" style="display:none;">
	    
	</span>';
	
	#input name (????) (open)
	if(1==1){
	    
	    if(empty($function_div_table_selects_input_name_level2)){
		$function_div_table_selects_input_name_level2 = $function_div_table_selects_input_name;
	    }
	    
	    if(empty($function_div_table_selects_input_name_level3)){
		$function_div_table_selects_input_name_level3 = $function_div_table_selects_input_name;
	    }
	    
	    if(empty($function_div_table_selects_input_name_level4)){
		$function_div_table_selects_input_name_level4 = $function_div_table_selects_input_name;
	    }
	    
	}
	#input name (????) (close)
	
	$function_div_table_selects .= '
	<table class="'.$function_div_table_selects_name.' function_div_table_selects_search_level1'.$function_div_table_selects_id.'">';
	    
	    #divs per row mechanism 1/4 (open)
	    if(1==1){
		$function_div_table_selects_level2_div_per_col = 0;
	    }
	    #divs per row mechanism 1/4 (close)
	    
	    #level 1 query for subselection (open)
	    if(1==1){
		$function_div_table_selects_level2_query = $GLOBALS['wpdb']->prepare($function_div_table_selects_query2);
		$function_div_table_selects_level2_results = $GLOBALS['wpdb']->get_results($function_div_table_selects_level2_query);
	    }
	    #level 1 query for subselection (close)
	    
	    #level 1 subselection-loop (open)
	    foreach($function_div_table_selects_level2_results as $function_div_table_selects_level2_row){
		
		#divs per row mechanism 2/4 (open)
		if(1==1){
		    
		    $function_div_table_selects_level2_div_per_col++;
		    if($function_div_table_selects_level2_div_per_col == 1){
			$function_div_table_selects .= '
			<tr>';
		    }
		    
		}
		#divs per row mechanism 2/4 (close)
		
		$function_div_table_selects .= '
		<td>
		    <div
			class="function_div_table_selects_search_level2'.$function_div_table_selects_id.'"
			stlye="padding:10px;"
		    >';
			
			#level 2 checked? (open)
			if(!empty( $function_div_table_selects_level2_row->{$function_div_table_selects_selected_column_name} )){
			    $function_div_table_selects_checked = 'checked="checked"';
			}else{
			    $function_div_table_selects_checked = "";
			}
			#level 2 checked? (close)
			
			#level 2 selection (open)
			if(1==1){
			    $function_div_table_selects .= '
			    <label>
				<table
				    style="margin:0px;font-weight:bold;"
				    class="function_div_table_selects_click_table'.$function_div_table_selects_id.'"
				>
				    <tr>
					<td style="width:10px;">
					    <input
						type="checkbox"
						'.$function_div_table_selects_checked.'
						name="'.$function_div_table_selects_input_name_level2.'[]"
						value="'.$function_div_table_selects_level2_row->$function_div_table_selects_value_mysql.'"
					    >
					</td>
					<td>
					    '.$function_div_table_selects_level2_row->$function_div_table_selects_display_text_mysql.'
					</td>
				    </tr>
				</table>
			    </label>';
			}
			#level 2 selection (close)
			
			#level 2 query for subselection (open)
			if(1==1){
			    $function_div_table_selects_level3_query = $GLOBALS['wpdb']->prepare($function_div_table_selects_query3,
									$function_div_table_selects_level2_row->$function_div_table_selects_value_mysql);
			    $function_div_table_selects_level3_results = $GLOBALS['wpdb']->get_results($function_div_table_selects_level3_query);
			}
			#level 2 query for subselection (close)
			
			#level 2 subselection-loop (open)
			foreach($function_div_table_selects_level3_results as $function_div_table_selects_level3_row){
			    
			    #level 3 container div for selection and sub-selection (open)
			    if(1==1){
				$function_div_table_selects .= '
				<div
				    style="margin-left:10px"
				    class="function_div_table_selects_search_level3'.$function_div_table_selects_id.'"
				>';
				    
				    #level 3 checked? (open)
				    if(!empty( $function_div_table_selects_level3_row->{$function_div_table_selects_selected_column_name} )){
					$function_div_table_selects_checked = 'checked="checked"';
				    }else{
					$function_div_table_selects_checked = "";
				    }
				    #level 3 checked? (close)
				    
				    #level 3 selection (open)
				    if(1==1){
					$function_div_table_selects .= '
					<label>
					    <table
						style="margin:0px;"
						class="function_div_table_selects_click_table'.$function_div_table_selects_id.'"
					    >
						<tr>
						    <td style="width:10px;">
							<input
							    '.$function_div_table_selects_checked.'
							    type="checkbox"
							    name="'.$function_div_table_selects_input_name_level3.'[]"
							    value="'.$function_div_table_selects_level3_row->$function_div_table_selects_value_mysql.'"
							>
						    </td>
						    <td>
							'.$function_div_table_selects_level3_row->$function_div_table_selects_display_text_mysql.'
						    </td>
						</tr>
					    </table>
					</label>';
				    }
				    #level 3 selection (close)
				    
				    #level 3 query for subselection (open)
				    if(1==1){
					$function_div_table_selects_level4_query = $GLOBALS['wpdb']->prepare($function_div_table_selects_query4,
								    $function_div_table_selects_level3_row->$function_div_table_selects_value_mysql);
					$function_div_table_selects_level4_results = $GLOBALS['wpdb']->get_results($function_div_table_selects_level4_query);
				    }
				    #level 3 query for subselection (close)
				    
				    #level 3 subselection-loop (open)
				    foreach($function_div_table_selects_level4_results as $function_div_table_selects_level4_row){
					
					#level 4 container div for selection and sub-selection (open)
					if(1==1){
					    $function_div_table_selects .= '
					    <div style="margin-left:10px;font-style:italic;color:grey;">';
						
						#level 4 checked? (open)
						if(!empty( $function_div_table_selects_level4_row->{$function_div_table_selects_selected_column_name} )){
						      $function_div_table_selects_checked = 'checked="checked"';
						}else{
						      $function_div_table_selects_checked = "";
						}
						#level 4 checked? (close)
						
						#level 4 selection (open)
						if(1==1){
						    $function_div_table_selects .= '
						    <label>
							<table
							    style="margin:0px;"
							    class="function_div_table_selects_click_table'.$function_div_table_selects_id.'"
							>
							    <tr>
								<td style="width:10px;">
								    <input
									'.$function_div_table_selects_checked.'
									type="checkbox"
									name="'.$function_div_table_selects_input_name_level4.'[]"
									value="'.$function_div_table_selects_level4_row->$function_div_table_selects_value_mysql.'"
								    >
								</td>
								<td>
								    '.$function_div_table_selects_level4_row->$function_div_table_selects_display_text_mysql.'
								</td>
							    </tr>
							</table>
						    </label>';
						}
						#level 4 selection (close)
						
						#no subselection on this level
						
					    $function_div_table_selects .= '
					    </div>';
					}
					#level 4 container div for selection and sub-selection (open)
					
				    }
				    #level 3 subselection-loop (close)
				    
				$function_div_table_selects .= '
				</div>';
			    }
			    #level 3 container div for selection and sub-selection (close)
			    
			}
			#level 2 subselection-loop (close)
			
		    $function_div_table_selects .= '
		    </div>
		</td>';
		
		#divs per row mechanism 3/4 (open)
		if($function_div_table_selects_level2_div_per_col == $function_div_table_selects_cols_per_row){
		    $function_div_table_selects_level2_div_per_col = 0;
		    $function_div_table_selects .= '
		    </tr>';
		}
		#divs per row mechanism 3/4 (close)
		
	    }
	    #level 1 subselection-loop (close)
	    
	    #divs per row mechanism 4/4 (open)
	    if($function_div_table_selects_level2_div_per_col != $function_div_table_selects_cols_per_row){
		$function_div_table_selects .= '
		</tr>';
	    }
	    #divs per row mechanism 4/4 (close)
	    
	$function_div_table_selects .= '
	</table>';
    }
    #content (close)
    
    #unset (open)
    if(1==1){
	unset(
	    $function_div_table_selects_input_name_level2,
	    $function_div_table_selects_input_name_level3,
	    $function_div_table_selects_input_name_level4,
	    $function_div_table_selects_all_children,
	    $function_div_table_selects_selected_column_name,
	    $function_div_table_selects_max_selected_checkboxed
	);
      
    }
    #unset (close)

}
#version 1 (old) (close)

?>