<?php
//for the love of god don't ask me why I didn't just use the same array repeatedly and opted to make a bigger one.
// NO seriously, I realized halfway through, leave me alone.
$array = explode("\n", file_get_contents("day3.txt"));
$counter = 0;
$amountOfblocks = 1;
$mapOfHill = array();
foreach ($array as $row) {
    $counter++;
    if ($counter > 0) {
        $counter = 0;
        $amountOfblocks++;
    }
    $mapString = "";
    for ($i = 0; $i < $amountOfblocks; $i++) {
        $mapString .= $row;
    }
    $mapString = preg_replace('/\s/', '', $mapString);
    array_push($mapOfHill, $mapString);
}
$slope1 = 0;
$slope2 = 0;
$slope3 = 0;
$slope4 = 0;
$slope5 = 0;
$amountOfTrees1 = 0;
$amountOfTrees2 = 0;
$amountOfTrees3 = 0;
$amountOfTrees4 = 0;
$amountOfTrees5 = 0;
foreach ($mapOfHill as $key => $row) {
    if ($row[$slope1] == "#") {
        $amountOfTrees1++;
    }
    if ($row[$slope2] == "#") {
        $amountOfTrees2++;
    }
    if ($row[$slope3] == "#") {
        $amountOfTrees3++;
    }
    if ($row[$slope4] == "#") {
        $amountOfTrees4++;
    }
    if($key % 2 == 0 && $row[$slope5] == "#"){
        $amountOfTrees5++;
    }
    $slope1 += 1;
    $slope2 += 3;
    $slope3 += 5;
    $slope4 += 7;
    $slope5 += 0.5;
}
echo $amountOfTrees1 * $amountOfTrees2 * $amountOfTrees3 * $amountOfTrees4 * $amountOfTrees5;