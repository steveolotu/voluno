<?php

if(!empty($function_timezone) AND !in_array($function_timezone,array(0,"0","0000-00-00 00:00:00","0000-00-00"))){
  
  #add user specific timezone offset (open)
  if(1==1){
  
    $function_timezone_internal['unix_timestamp']
      = strtotime($function_timezone) + ($GLOBALS['voluno_variables']['current_user_extended']->usersext_timezone_offset * 60 * 60);
    
  }
  #add user specific timezone offset (open)
  
  #apply output format (open)
  if(1==1){
    
    #datetime (weekday long hour min sec) (open)
    if($function_timezone_format == "datetime (weekday long hour min sec)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("l, d. F Y, H:i:s",$function_timezone_internal['unix_timestamp']);
      
    }
    #datetime (weekday long hour min sec) (close)
    
    #date (long) (open)
    if($function_timezone_format == "date (long)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("d. F Y",$function_timezone_internal['unix_timestamp']);
      
    }
    #date (long) (close)
    
    #date (short) (open)
    if($function_timezone_format == "date (short)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("d. M Y",$function_timezone_internal['unix_timestamp']);
      
    }
    #date (short) (close)
    
    #date (weekday long) (open)
    if($function_timezone_format == "date (weekday long)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("l, d. F Y",$function_timezone_internal['unix_timestamp']);
      
    }
    #date (weekday long) (close)
    
    #date (weekday short) (open)
    if($function_timezone_format == "date (weekday short)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("D, d. M Y",$function_timezone_internal['unix_timestamp']);
      
    }
    #date (weekday short) (close)
    
    #date (weekday short no_year) (open)
    if($function_timezone_format == "date (weekday short no_year)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("D, d. M",$function_timezone_internal['unix_timestamp']);
      
    }
    #date (weekday short no_year) (close)
    
    #time (hour min sec) (open)
    if($function_timezone_format == "time (hour min sec)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("H:i:s",$function_timezone_internal['unix_timestamp']);
      
    }
    #time (hour min sec) (close)
    
    #time (hour min) (open)
    if($function_timezone_format == "time (hour min)"){
      
      $function_timezone_internal['unix_timestamp_formatted'] = date("H:i",$function_timezone_internal['unix_timestamp']);
      
    }
    #time (hour min) (close)
    
    #time difference (short) (open)
    if($function_timezone_format == "time difference (short)"){
      
      if(!empty($function_timezone_reference)){
        $function_timezone_internal['reference_in_unix_timestamp'] = strtotime($function_timezone_reference) + ($GLOBALS['voluno_variables']['current_user_extended']->usersext_timezone_offset * 60 * 60);
      }else{
        $function_timezone_internal['reference_in_unix_timestamp'] = strtotime("now") + ($GLOBALS['voluno_variables']['current_user_extended']->usersext_timezone_offset * 60 * 60);
      }
      
      $function_timezone_internal['difference_in_unix_timestamp'] = $function_timezone_internal['unix_timestamp'] - $function_timezone_internal['reference_in_unix_timestamp'];
      
      #past (open)
      if($function_timezone_internal['difference_in_unix_timestamp'] <= 0){
        
        $function_timezone_internal['difference_in_unix_timestamp'] = $function_timezone_internal['difference_in_unix_timestamp'] * (-1); 
        
        if($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60 * 24 * 2){ //days
          
          $function_timezone_internal['unix_timestamp_formatted']
            = number_format($function_timezone_internal['difference_in_unix_timestamp'] / (60 * 60 * 24))." days ago";
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60 * 24){ //day
          
          $function_timezone_internal['unix_timestamp_formatted']
            = number_format($function_timezone_internal['difference_in_unix_timestamp'] / (60 * 60 * 24))." day ago";
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60 * 2){ //hours
          
          $function_timezone_internal['unix_timestamp_formatted']
            = number_format($function_timezone_internal['difference_in_unix_timestamp'] / (60 * 60))." hours ago";
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60){ //hour
          
          $function_timezone_internal['unix_timestamp_formatted']
            = number_format($function_timezone_internal['difference_in_unix_timestamp'] / (60 * 60))." hour ago";
            
        #}elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 2){ //minutes
        
        #  $function_timezone_internal['unix_timestamp_formatted']
          #= ($function_timezone_internal['difference_in_unix_timestamp'] / 60)." min. ago";
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60){ //minute
          
          $function_timezone_internal['unix_timestamp_formatted']
            = number_format($function_timezone_internal['difference_in_unix_timestamp'] / 60)." min. ago";
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 1){ //seconds
          
          $function_timezone_internal['unix_timestamp_formatted']
            = number_format($function_timezone_internal['difference_in_unix_timestamp'] ) ." sec. ago";
            
        }else{ //second
          
          $function_timezone_internal['unix_timestamp_formatted'] = "just now";
          
        }
        
      }
      #past (close)
      
      #future (open)
      else{
        
        if($function_timezone_wording == "left"){
          $before = "";
          $after = " left"; 
        }else{
          $before = "in ";
          $after = "";
        }
        
        if($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60 * 24 * 2){ //days
          
          $function_timezone_internal['unix_timestamp_formatted']
            = $before.number_format($function_timezone_internal['difference_in_unix_timestamp']  / (60 * 60 * 24)).' days'.$after;
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60 * 24){ //day
          
          $function_timezone_internal['unix_timestamp_formatted']
            = $before.number_format($function_timezone_internal['difference_in_unix_timestamp'] / (60 * 60 * 24)).' day'.$after;
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60 * 2){ //hours
          
          $function_timezone_internal['unix_timestamp_formatted']
            = $before.number_format($function_timezone_internal['difference_in_unix_timestamp'] / (60 * 60)).' hours'.$after;
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 60){ //hour
          
          $function_timezone_internal['unix_timestamp_formatted']
            = $before.number_format($function_timezone_internal['difference_in_unix_timestamp'] / (60 * 60)).' hour'.$after;
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60 * 2){ //minutes
          
          $function_timezone_internal['unix_timestamp_formatted']
            = $before.number_format($function_timezone_internal['difference_in_unix_timestamp'] / 60).' min.'.$after;
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 60){ //minute
          
          $function_timezone_internal['unix_timestamp_formatted']
            = $before.number_format($function_timezone_internal['difference_in_unix_timestamp'] / 60).' min.'.$after;
            
        }elseif($function_timezone_internal['difference_in_unix_timestamp'] >= 1){ //seconds
          
          $function_timezone_internal['unix_timestamp_formatted']
            = $before.number_format($function_timezone_internal['difference_in_unix_timestamp']).' sec.'.$after;
            
        }else{  //second = just now
          $function_timezone_internal['unix_timestamp_formatted']
            = 'just now';
        }
        
      }
      #future (close)
      
      
    }
    #time difference (short) (close)
    
  $function_timezone = 
    '<span title="'.date("l, d. F Y, H:i:s",$function_timezone_internal['unix_timestamp']).'">'.
      $function_timezone_internal['unix_timestamp_formatted'].
    '</span>';
  }
  #apply output format (close)

}else{
  unset($function_timezone);
}

unset($function_timezone_format,$function_timezone_internal);

?>
