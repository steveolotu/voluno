<?php

#mysql (open)
if(1==1){
    
    $function_get_user_settings__query = $GLOBALS['wpdb']->prepare('SELECT *
							FROM fi4l3fg_voluno_personal_settings
							LEFT JOIN (
							    SELECT pers_settings_value AS pers_settings_value_user,
								pers_settings_specific AS pers_settings_specific_user
							    FROM fi4l3fg_voluno_personal_settings AS aaa
							    WHERE pers_settings_user_id = %s
								AND pers_settings_general = "my settings"
							) AS aaa_user_specific_query
							ON pers_settings_specific = pers_settings_specific_user
							WHERE pers_settings_user_id = 0
							    AND pers_settings_general = "my settings";'
							,$function_get_user_settings);
    $function_get_user_settings__results = $GLOBALS['wpdb']->get_results($function_get_user_settings__query);
    #if($function_get_user_settings == 1)
    #var_dump($function_get_user_settings__results);
    #echo '<br><br><br><br><br>';
}
#mysql (close)

#array creation (open)
if(1==1){
    unset($function_get_user_settings,$function_get_user_settings_array);

    for($ads=0;$ads<count($function_get_user_settings__results);$ads++){
	
	if(empty($function_get_user_settings__results[$ads]->pers_settings_value_user)){
	    $function_get_user_settings__value = $function_get_user_settings__results[$ads]->pers_settings_value;
	    $function_get_user_settings__type = 'user';
	}else{
	    $function_get_user_settings__value = $function_get_user_settings__results[$ads]->pers_settings_value_user;
	    $function_get_user_settings__type = 'default';
	}
	
	$function_get_user_settings[$function_get_user_settings__results[$ads]->pers_settings_specific] = $function_get_user_settings__value;
	
	$function_get_user_settings_array[$ads]['key'] = $function_get_user_settings__results[$ads]->pers_settings_specific;
	$function_get_user_settings_array[$ads]['value'] = $function_get_user_settings__value;
	$function_get_user_settings_array[$ads]['user_or_default_value'] = $function_get_user_settings__type;
	
    }

    unset($function_get_user_settings__value,$function_get_user_settings__type);
    
}
#array creation (close)

?>