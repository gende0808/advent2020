<?php
$array = explode("\n", file_get_contents("day2.txt"));
$numberOfValidArrays = 0;
foreach ($array as $key => $line) {
    $tempArray = explode(" ", $line);
    $rangeArray = explode("-", $tempArray[0]);
    if ($tempArray[2][$rangeArray[0] - 1] == $tempArray[1][0]) {
        if ($tempArray[2][$rangeArray[1] - 1] != $tempArray[1][0]) {
            $numberOfValidArrays++;
        }
    } else {
        if ($tempArray[2][$rangeArray[1] - 1] == $tempArray[1][0]) {
            $numberOfValidArrays++;
        }
    }
}
echo $numberOfValidArrays;
