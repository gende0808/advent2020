<?php
//for the love of god don't ask me why I didn't just use the same array repeatedly and opted to make a bigger one.
// NO seriously, I realized halfway through, leave me alone.
$array = explode("\n", file_get_contents("day3.txt"));
$counter = 0;
$amountOfblocks = 1;
$mapOfHill = array();
foreach ($array as $row) {
    $counter++;
    if ($counter > 9) {
        $counter = 0;
        $amountOfblocks++;
    }
    $mapString = "";
    for ($i = 0; $i < $amountOfblocks; $i++) {
        $mapString .= $row;
    }
    $mapString = preg_replace('/\s/', '', $mapString);
    array_push($mapOfHill,  $mapString);
}
$y = 0;
$amountOfTrees = 0;
foreach ($mapOfHill as $row) {
    if ($row[$y] == "#") {
        $amountOfTrees++;
    }
    $y += 3;
}
echo $amountOfTrees;