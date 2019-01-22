<?php


unset($function_help_word);

#random number (open)
if(1==1){
    unset($function_help_word__internal['random_num']);
    for($i = 0; $i < 10; $i++) {
        $function_help_word__internal['random_num']
            = $function_help_word__internal['random_num'].
            substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ,mt_rand( 0 ,62 ) ,1 );
    }
}
#random number (close)

#script (open)
if(1==1){
    
    #keep showing div on hover (open)
    if($function_help_word_keep_showing_div_on_hover == "yes"){
        $function_help_word__internal['keep_showing_div_on_hover'] = ',.function_help_word_class'.$function_help_word__internal['random_num'];
    }
    #keep showing div on hover (close)
    
    echo '
    <script>
        jQuery(document).ready(function(){
            jQuery(".function_help_word_link_class'.$function_help_word__internal['random_num'].
                    $function_help_word__internal['keep_showing_div_on_hover'].
            '").hover(function(){
                jQuery(".function_help_word_class'.$function_help_word__internal['random_num'].'").fadeIn(150);
            },function(){
                jQuery(".function_help_word_class'.$function_help_word__internal['random_num'].'").fadeOut(150);
            });
        });
    </script>';
}
#script (close)

#preparation (open)
if(1==1){
    if(empty($function_help_word_width)){
        $function_help_word_width = "500px";
    }elseif(is_int($function_help_word_width)){
        $function_help_word_width = $function_help_word_width."%";
    }
    
}
#preparation (close)

$function_help_word__link = '
<a class="function_help_word_link_class'.$function_help_word__internal['random_num'].'" style="cursor:help;">'.
    $function_help_word_hover_link.
'</a>';

$function_help_word__div = '
<div
    style="
        width:'.$function_help_word_width.';
        position:absolute;
        display:none;
        border-radius:25px;
        background-color:#fff;
        border:1px solid #000;
        text-align:justify;
        font-weight:normal;
        z-index:30;
        '.$function_help_word_margin.'
    "
    class="function_help_word_class'.$function_help_word__internal['random_num'].'"
>
    <div style="margin:20px;">
        '.$function_help_word_help_content.'
    </div>
</div>';

$function_help_word = $function_help_word__link.$function_help_word__div;

if($function_help_word_variable_only != "yes"){
    echo $function_help_word;
}

unset(
    $function_help_word_margin
    ,$function_help_word_width
    ,$function_help_word__internal
);
?>