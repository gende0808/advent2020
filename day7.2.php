<?php
include "functions.php";
$array = explode("\n", file_get_contents("day7.txt"));
$sortedArray = array();
foreach ($array as $line) {
    array_push($sortedArray, preg_split("/contain |, /", str_replace([".", "bags", "bag"], "", $line)));
}

checkArray($sortedArray, ["shiny gold"]);
function checkArray($array, $searchFor, $totalBags = 0)
{
    $newSearchFor = array();
    if (count($searchFor) == 0) {
        echo "total: " . $totalBags;
        exit;
    }
    foreach ($searchFor as $item) {
        foreach ($array as $bagWithBags) {
            if (strpos(trim($bagWithBags[0]), trim($item)) !== false) {
                $count = 0;
                for ($i = 1; $i < count($bagWithBags); $i++) {
                    if (is_numeric($bagWithBags[0])){
                        if(is_numeric($searchFor[0])){
                            $count += $searchFor[0] * ;
                        } else{
                            $count++;
                        }
                    }
                }
            }
        }
    }
//    print_array($newSearchFor);
    checkArray($array, $newSearchFor, $totalBags);
}