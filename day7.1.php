<?php
include "functions.php";
$array = explode("\n", file_get_contents("day7.txt"));
$sortedArray = array();
foreach ($array as $line) {
    array_push($sortedArray, preg_split("/contain |, /", str_replace([".","bags","bag"],"",$line)));
}
checkArray($sortedArray, ["shiny gold"]);

function checkArray($array, $searchFor, $alreadyChecked = array())
{
    $newSearchFor = array();
    if (count($searchFor) == 0) {
        echo count(array_unique($alreadyChecked));
        exit;
    }
    foreach ($searchFor as $item) {
        foreach ($array as $bag) {
            for ($i = 1; $i < count($bag); $i++) {
                if (strpos(trim($bag[$i]), trim($item)) !== false && !in_array($bag[$i],$alreadyChecked)) {
                    array_push($newSearchFor, trim($bag[0]));
                    array_push($alreadyChecked, trim($bag[0]));
                }
            }
        }
    }
    $newSearchFor = array_unique($newSearchFor);
    checkArray($array, $newSearchFor, $alreadyChecked);
}