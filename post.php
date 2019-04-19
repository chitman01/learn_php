<?php

    $str_a = '1234567890';
    $count_a = strlen($str_a);
    echo $str_a."  ".$count_a."<br>";
    
    $str_split_a = str_split($str_a);

    print_r($str_split_a);

    echo implode("",$str_split_a)."<br>";



    $sub_str_a = substr($str_a,0,9);

    echo $sub_str_a;

?>