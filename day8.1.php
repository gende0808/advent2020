<?php
include "functions.php";
$array = explode("\n", file_get_contents("day8.txt"));
$arrayOfIndexes = array();
$accumulator = 0;
for($i = 0; $i < count($array); $i++){
    $instruction = explode(" ",$array[$i])[0];
    $amount = explode(" ",$array[$i])[1];
    if(isset($arrayOfIndexes[$i])){
        echo $accumulator;
        print_array($arrayOfIndexes);
        exit;
    }else{
        $arrayOfIndexes[$i] = $instruction . " " . $amount;
    }
    if($instruction == "acc"){
        $accumulator += (int)$amount;
    }
    if($instruction == "jmp"){
        $i += (int)$amount - 1;
    }
}