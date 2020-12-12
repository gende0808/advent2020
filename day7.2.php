<?php
include "functions.php";
set_time_limit(60);
$array = explode("\n", file_get_contents("day7.txt"));
$GLOBALS['rules'] = array();
$GLOBALS['TOTALCOUNT'] = 0;
foreach ($array as $line) {
    array_push($GLOBALS['rules'], preg_split("/contain |, /", str_replace([".", "bags", "bag"], "", $line)));
}
$completeArray = array("amount" => 1, "shiny gold" => 1);

array_walk_recursive($completeArray, 'letsGo');
array_walk_recursive($completeArray, 'letsGo');
array_walk_recursive($completeArray, 'letsGo');
array_walk_recursive($completeArray, 'letsGo');
array_walk_recursive($completeArray, 'letsGo');
array_walk_recursive($completeArray, 'letsGo');
array_walk_recursive($completeArray, 'letsGo');
$amount = array_walk_recursive($completeArray, 'getCount');

echo $GLOBALS['TOTALCOUNT'];

//print_array($completeArray);
function getCount($value, $key)
{
    if($value == "counert"){
        $GLOBALS['TOTALCOUNT'] += 1;
    }
}

function letsGo(&$value, $key)
{
    $amount = $value;
    foreach ($GLOBALS['rules'] as $rule) {
        if (stripos(trim($rule[0]), trim($key)) !== false) {
            for ($i = 1; $i < count($rule); $i++) {
                $bagBits = explode(" ", $rule[$i], 2);
                if (is_numeric($bagBits[0])) {
                    if (!is_array($value)) {
                        $value = array();
                    }
                    for ($j = 0; $j < trim($bagBits[0]); $j++) {
                        array_push($value, array("counert"));
                        array_push($value, array(trim($bagBits[1]) => trim($bagBits[0])));
                    }
                }
            }
        }
    }
}