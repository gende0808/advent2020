<?php
include "functions.php";

$array = explode("\n",file_get_contents("day1.txt"));

for($i = 0; $i < count($array); $i++){
    for($j = $i; $j < count($array); $j++){
        if((int)$array[$i] + (int)$array[$j] == 2020){
            echo (int)$array[$i] * (int)$array[$j];
        }
    }
}