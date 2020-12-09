<?php
include "functions.php";
$array = explode("\n", file_get_contents("day7.txt"));
$sortedArray = array();
foreach ($array as $line) {
    array_push($sortedArray, preg_split("/contain |, /", str_replace([".", "bags", "bag"], "", $line)));
}

checkArray($sortedArray, ["shiny gold" => 1]);
function checkArray($array, $searchFor, $totalBags = 0, $multiplier = 0)
{
    $newSearchFor = array();
    if (count($searchFor) == 0) {
        echo "total: " . $totalBags;
        exit;
    }
    foreach ($searchFor as $item => $amount) {
        foreach ($array as $bagWithBags) {
            if (strpos(trim($bagWithBags[0]), trim($item)) !== false) {
                for ($i = 1; $i < count($bagWithBags); $i++) {
                    $bagBits = explode(" ", $bagWithBags[$i], 2);
                    if (is_numeric($bagBits[0])) {
                        $newSearchFor[trim($bagBits[1])] = $bagBits[0];
                        $totalBags = $totalBags * $bagBits[0] + $totalBags;
                    }
                }
             }
        }
    }
    print_array($searchFor);
    checkArray($array, $newSearchFor,$totalBags, $multiplier);
}