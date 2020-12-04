<?php
include "functions.php";
$array = explode("\n", file_get_contents("day4.txt"));
$mustContain = array("byr:", "iyr:", "eyr:", "hgt:", "hcl:", "ecl:", "pid:");
$eyeColor = array("amb", "blu", "brn", "gry", "grn", "hzl", "oth");
$hairColor = array("0", "1", "");
$validPassports = 0;
for ($i = 0; $i < count($array); $i++) {
    $singlePasswordData = "";
    for ($j = $i; strlen($array[$j]) > 2; $j++) {
        $singlePasswordData .= $array[$j];
    }
    if (contains_all($singlePasswordData, $mustContain)) {
        $passwordDataArray = preg_split("/[\s\n]/", $singlePasswordData);
        $passwordValid = true;
        foreach ($passwordDataArray as $dataPoint) {
            $a = explode(":", $dataPoint);
            if ($a[0] == "byr") {
                if ($a[1] < 1920 || $a[1] > 2002) {

                    $passwordValid = false;
                }
            }
            if ($a[0] == "pid" && strlen($a[1]) != 9) {
                $passwordValid = false;
            }
            if ($a[0] == "eyr") {
                if ($a[1] < 2020 || $a[1] > 2030) {
                    $passwordValid = false;
                }
            }
            if ($a[0] == "ecl" && !contains_any($a[1], $eyeColor)) {
                $passwordValid = false;
            }
            if ($a[0] == "hgt") {
                if (substr($a[1], -2) == "cm") {
                    $height = substr($a[1], 0, -2);
                    if ($height < 150 || $height > 193) {
                        $passwordValid = false;
                    }
                } else {
                    if (substr($a[1], -2) == "in") {
                        $height = substr($a[1], 0, -2);
                        if ($height < 59 || $height > 76) {
                            $passwordValid = false;
                        }
                    } else {
                        $passwordValid = false;
                    }
                }

            }
            if ($a[0] == "iyr") {
                if ($a[1] < 2010 || $a[1] > 2020) {
                    $passwordValid = false;
                }
            }
            if ($a[0] == "hcl") {
                if ($a[1][0] != "#" || strlen($a[1]) != 7) {
                    $passwordValid = false;
                } else {
                    if (!ctype_xdigit(substr($a[1], 1))) {
                        $passwordValid = false;
                    }
                }
            }
        }
        if ($passwordValid) {
            $validPassports++;
        }
    }
    $i = $j;
}
echo $validPassports;