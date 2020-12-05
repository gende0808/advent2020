<?php
$array = explode("\n", file_get_contents("day5.txt"));
$highestSeatNr = 0;
foreach($array as $row){
    $binary_code = "";
    $binary_code = str_replace(["F", "L"], "0", $row);
    $binary_code = str_replace(["B","R"], "1", $binary_code);
    $seatNr = (bindec(substr($binary_code, 0,7)) * 8) + bindec(substr($binary_code, 7));
    if($seatNr > $highestSeatNr) $highestSeatNr = $seatNr;
}
echo $highestSeatNr;