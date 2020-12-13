<?php
$array = array_map('intval', explode("\n", file_get_contents("day10.txt")));
sort($array);
$singleJolts = $threeJolts = 1;
for ($i = 0; $i < count($array) - 1; $i++) {
    $difference = $array[$i + 1] - $array[$i];
    if ($difference == 1) {
        $singleJolts++;
    }
    if ($difference == 3) {
        $threeJolts++;
    }
}
echo $singleJolts * $threeJolts;