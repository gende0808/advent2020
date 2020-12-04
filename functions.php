<?php


function print_array($array){
   echo "<pre>";
   print_r($array);
   echo "</pre>";
}
function contains($str, array $arr)
{
    $value = true;
    foreach($arr as $a) {
        if (strpos($str, $a) === false){
            $value = false;
        }
    }
    return $value;
}