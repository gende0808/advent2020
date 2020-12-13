<?php
$array = explode("\n", file_get_contents("day9.txt"));
$findNumber = 2089807806;
for ($i = 0; $i < count($array); $i++) {
    $sum = (int)$array[$i];
    $arrayOfNumbers = array();
    for ($j = $i + 1; $j < count($array); $j++) {
        $sum += (int)$array[$j];
        array_push($arrayOfNumbers, (int)$array[$j]);
        if ($sum == $findNumber) {
            echo max($arrayOfNumbers) + min($arrayOfNumbers);
            exit;
        }
    }
}