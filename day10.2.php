<?php
//manually added 0 and 183 to txt file to account for start point and end point
include "functions.php";
$array = array_map('intval', explode("\n", file_get_contents("day10.txt")));
sort($array);
print_array($array);
$twoOnes = $threeOnes = $fourOnes = 0;

for ($i = 0; $i < count($array) - 1; $i++) {
    $amountOfOnes = 0;
    if ($array[$i + 1] - $array[$i] == 1) {
        $amountOfOnes++;
        $i++;
        if ($array[$i + 1] - $array[$i] == 1) {
            $amountOfOnes++;
            $i++;
            if ($array[$i + 1] - $array[$i] == 1) {
                $amountOfOnes++;
                $i++;
                if ($array[$i + 1] - $array[$i] == 1) {
                    $amountOfOnes++;
                    $i++;
                }
            }
        }
    }
    if($amountOfOnes == 2){
        $twoOnes++;
    }
    if($amountOfOnes == 3){
        $threeOnes++;
    }
    if($amountOfOnes == 4){
        $fourOnes++;
    }
}
echo pow(7,$fourOnes) * pow(4,$threeOnes) * pow(2, $twoOnes);