<?php
$array = explode("\n", file_get_contents("day8.txt"));
$arrayOfIndexes = array();
$accumulator = 0;

letsGetWild($array);
function letsGetWild($array, $changeAfter = 3, $accumulator = 0, $arrayOfIndexes = array(), $changed = false)
{
    if ($changeAfter > count($array) - 1) {
    }
    if (strpos($array[$changeAfter], "jmp") !== false) {
        $array[$changeAfter] = str_replace("jmp", "nop", $array[$changeAfter]);
        $changed = true;
    }
    for ($i = 0; $i < count($array); $i++) {
        $instruction = explode(" ", $array[$i])[0];
        $amount = explode(" ", $array[$i])[1];
        //if we've been here before, time to go byebye
        if (isset($arrayOfIndexes[$i])) {
            if ($changed == true) {
                $array[$changeAfter] = str_replace("nop", "jmp", $array[$changeAfter]);
            }
            $changeAfter++;
            letsGetWild($array, $changeAfter);
        }
        if (isset($arrayOfIndexes[count($array) - 1])) {
            echo $accumulator;
            exit;
        } else {
            $arrayOfIndexes[$i] = $instruction . " " . $amount;
        }
        if ($instruction == "acc") {
            $accumulator += (int)trim($amount);
        }
        if ($instruction == "jmp") {
            $i += (int)trim($amount) - 1;
//            echo $i . $instruction . $amount."<br>";
        }
        if (isset($arrayOfIndexes[count($array) - 1])) {
            echo "found it: $accumulator";
        }
    }
}