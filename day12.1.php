<?php
$array = explode("\n", file_get_contents("day12.txt"));
$shipDirection = "E";
$y = 0;
$x = 0;
foreach ($array as $command) {
    $letter = trim(substr($command, 0, 1));
    $amount = (int)substr($command, 1);
    if ($letter == "F") {
        $letter = $shipDirection;
    }
    switch ($letter) {
        case "L":
        case "R":
            $shipDirection = getDirection($shipDirection, $letter, $amount);
            break;
        case "N":
            $y += $amount;
            break;
        case "W":
            $x -= $amount;
            break;
        case "S":
            $y -= $amount;
            break;
        case "E":
            $x += $amount;
            break;
    }
}
echo $x."<br>";
echo $y;

function getDirection($shipDirection, $leftOrRight, $degrees)
{
    $directionDegrees = array("N" => 0, "E" => 90, "S" => 180, "W" => 270);
    if ($leftOrRight == "L") {
        $newDegrees = $directionDegrees[$shipDirection] - $degrees;
    } else {
        $newDegrees = $directionDegrees[$shipDirection] + $degrees;
    }
    if ($newDegrees < 0) {
        $newDegrees = 360 + $newDegrees;
    }
    if ($newDegrees > 270) {
        $newDegrees = $newDegrees - 360;
    }
    return array_search($newDegrees, $directionDegrees);
}
