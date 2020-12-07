<?php
include "functions.php";
$array = explode("\n", file_get_contents("day7.txt"));
$sortedArray = array();
foreach ($array as $line) {
    array_push($sortedArray, preg_split("/contain |, /", str_replace([".", "bags", "bag"], "", $line)));
}

checkArray($sortedArray, ["shiny gold"]);
function checkArray($array, $searchFor, $totalBags = 0, $accounting = [1])
{
    $newSearchFor = array();
    if (count($searchFor) == 0) {
        echo "total: " . $totalBags;
        exit;
    }
    foreach ($searchFor as $item) {
        foreach ($array as $bagWithBags) {
            if (strpos(trim($bagWithBags[0]), trim($item)) !== false) {
                for ($i = 0; $i < count($bagWithBags); $i++) {
                    $bagBits = explode(" ",$bagWithBags[$i], 2);
                    if(is_numeric($bagBits[0])) {
                        array_push($newSearchFor, $bagBits[1]);
                        array_push($accounting,$bagBits[0]);
                    }
                }
            }
        }
    }

    print_array($newSearchFor);
    print_array($accounting);
    checkArray($array, $newSearchFor, $totalBags, $accounting);
}