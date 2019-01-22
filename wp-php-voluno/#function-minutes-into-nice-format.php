<?php
if(!empty($function_minutes_into_nice_format)){
    
    if($function_minutes_into_nice_format_long = "yes"){
	$function_minutes_into_nice_format_unit = array("hours","hour","minutes","minute");
    }else{
	$function_minutes_into_nice_format_unit = array("hours","hour","min.","min.");
    }
    
    #over 100 hours
    if($function_minutes_into_nice_format > 60*100){
	$function_minutes_into_nice_format = "over 100 ".$function_minutes_into_nice_format_unit[0];
    }
    
    #hours
    elseif($function_minutes_into_nice_format >= 60*2){
	$function_minutes_into_nice_format = number_format($function_minutes_into_nice_format / 60) .' '.$function_minutes_into_nice_format_unit[0];
    }
    
    #hour
    elseif($function_minutes_into_nice_format >= 60*1){
	$function_minutes_into_nice_format = number_format($function_minutes_into_nice_format / 60) .' '.$function_minutes_into_nice_format_unit[1];
    }
    
    #minutes
    elseif($function_minutes_into_nice_format >= 2){
	$function_minutes_into_nice_format = number_format($function_minutes_into_nice_format) .' '.$function_minutes_into_nice_format_unit[2];
    }
    
    #minute
    else{
	$function_minutes_into_nice_format = number_format( $function_minutes_into_nice_format) .' '.$function_minutes_into_nice_format_unit[3];
    }
    
}else{
    unset($function_minutes_into_nice_format);
}

unset($function_minutes_into_nice_format_long);

?>