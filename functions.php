<?php


function print_array($array){
   echo "<pre>";
   print_r($array);
   echo "</pre>";
}
function contains_all($str, array $arr)
{
    $value = true;
    foreach($arr as $a) {
        if (strpos($str, $a) === false){
            $value = false;
        }
    }
    return $value;
}
function contains_any($str, array $arr){
    foreach($arr as $a) {
        if (stripos($str,$a) !== false) return true;
    }
    return false;
}

