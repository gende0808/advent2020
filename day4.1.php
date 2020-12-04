<?php
include "functions.php";
$array = explode("\n", file_get_contents("day4.txt"));
$mustContain = array("byr:", "iyr:", "eyr:", "hgt:", "hcl:", "ecl:", "pid:");

$validPassports = 0;
for($i = 0; $i < count($array); $i++){
    $singlePasswordData = "";
    for($j = $i; strlen($array[$j]) > 2; $j++) {
        $singlePasswordData.= $array[$j];
    }
    if(contains($singlePasswordData, $mustContain)){
        echo $singlePasswordData . "<br>";
        $validPassports++;
    }

    $i = $j;
}
echo $validPassports;