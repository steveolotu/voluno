<?php

#jQuery (open)
if(1==1){
    
    if(empty($function_scroll_to['margin_top'])){
	$function_scroll_to['margin_top'] = 200;
    }
    
    unset($function_scroll_to_internal);
    
    $function_scroll_to_internal .= '
    <script>
        jQuery(document).ready(function(){';
	    
	    for($adw=0;$adw<count($function_scroll_to['hide_classes']);$adw++){
		$function_scroll_to_internal .= '
                jQuery(".'.$function_scroll_to['hide_classes'][$adw].'").hide();
		';
	    }
	    
	    for($adx=0;$adx<count($function_scroll_to['show_classes']);$adx++){
		$function_scroll_to_internal .=  '
                jQuery(".'.$function_scroll_to['show_classes'][$adx].'").show();
		';
	    }
	    
	    if(!empty($function_scroll_to['scroll_to_class'])){
		$function_scroll_to_internal .= '
		jQuery(window).scrollTop('.
		    'jQuery(".'.$function_scroll_to['scroll_to_class'].'").offset().top-'.$function_scroll_to['margin_top'].''.
		');';
	    }
	    
	$function_scroll_to_internal .= '
        });
    </script>
    ';
    
    $function_scroll_to = $function_scroll_to_internal;
    
}
#jQuery (close)

#unset (open)
if(1==1){
    unset(
	$function_scroll_to_internal
    );
}
#unset (close)
 
?>