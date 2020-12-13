<?php
$array = explode("\n", file_get_contents("day9.txt"));
$preamble = 25;
for ($i = $preamble; $i < count($array); $i++) {
    $return = false;
    for ($j = $i - $preamble; $j < $i; $j++) {
        for ($h = $j + 1; $h < $i; $h++) {
            if ((int)$array[$j] + (int)$array[$h] == (int)$array[$i]) {
                $return = true;
            }
        }
    }
    if (!$return) {
        echo $array[$i] . "<br>";
    }
}