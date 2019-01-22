<?php

$function_loaoding_img_mysql_area_div__img_path =
wp_upload_dir()['url'].'/pictures/loading.gif';

$function_loaoding_img_mysql_area_div = '
<div class="mysql_load_area">
</div>
<img
    style="width:6%;top:47%;left:47%;position:fixed;display:none;z-index:1000000"
    class="loading_page loading_img_middle_page"
    src="'.$function_loaoding_img_mysql_area_div__img_path.'"
>';    
    
if(empty($function_loaoding_img_mysql_area_div__variable_only)){
    echo $function_loaoding_img_mysql_area_div;
}

unset($function_loaoding_img_mysql_area_div__variable_only);

?>