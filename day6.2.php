<?php
$array = preg_split("#\n\s*\n#Uis", file_get_contents("day6.txt"));
$count = 0;
foreach ($array as $group) {
    foreach (count_chars(str_replace("\r","",$group)) as $occurrence) {
        if((substr_count($group, "\n")+1) == $occurrence){
            $count++;
        }
    }
}
echo $count;