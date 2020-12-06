<?php
$array = preg_split("#\n\s*\n#Uis",file_get_contents("day6.txt"));
$count = 0;
foreach($array as $group){
    $count += count(array_unique((str_split(preg_replace("/[^A-Za-z0-9]/","",$group)))));
}
echo $count;