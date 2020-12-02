<?php
$array = explode("\n", file_get_contents("day2.txt"));
$numberOfValidArrays = 0;
foreach ($array as $line) {
    $tempArray = explode(" ", $line);
    $rangeArray = explode("-", $tempArray[0]);
    $amountOfOccurrences = substr_count($tempArray[2], $tempArray[1][0]);
    if ($amountOfOccurrences >= $rangeArray[0] && $amountOfOccurrences <= $rangeArray[1]) {
        $numberOfValidArrays++;
    }
}
echo $numberOfValidArrays;
