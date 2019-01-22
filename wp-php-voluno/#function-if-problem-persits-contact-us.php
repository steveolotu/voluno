
<?php
//$function_if_problem_persits_contact_us

#$function_if_problem_persits_contact_us_only_contact = "yes"; 

if($function_if_problem_persits_contact_us_only_contact != "yes") {
    $function_if_problem_persits_contact_us_persists_part = "If the problem persists, please ";
} else {
    $function_if_problem_persits_contact_us_persists_part = "";
}

$function_if_problem_persits_contact_us =
    $function_if_problem_persits_contact_us_persists_part.
    'contact us via
    <b>
	<a href="mailto:'.antispambot("info@voluno.org").'?Subject=I%20did%20not%20get%20the%20registration%20mail%">'.
            antispambot("info@voluno.org").
        '</a>'.
    '</b>
    or via our 
    <b>
	<a href="'.get_permalink(638).'">
            contact form'.
	'</a>'.
    '</b>.';
?>