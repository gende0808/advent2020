<?php
$array = explode("\n",file_get_contents("day1.txt"));
for($i = 0; $i < count($array); $i++){
    for($j = $i + 1; $j < count($array); $j++){
        for($k = $j + 1; $k < count($array); $k++) {
            if((int)$array[$k] + (int)$array[$j] + (int)$array[$i] == 2020){
                echo (int)$array[$k] * (int)$array[$j] * (int)$array[$i];
            }
        }
    }
}