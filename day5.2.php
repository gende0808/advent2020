<?php
$array = explode("\n", file_get_contents("day5.txt"));
$seatArray = array();
foreach($array as $row){
    $binary_code = "";
    $binary_code = str_replace(["F", "L"], "0", $row);
    $binary_code = str_replace(["B","R"], "1", $binary_code);
    $rowNr = bindec(substr($binary_code, 0,7));
    $seatNr = bindec(substr($binary_code, 7));
    $seatArray[$rowNr][$seatNr] = "X";
}
ksort($seatArray);
foreach($seatArray as $key => $value){
    ksort($value);
    echo "<div class='rowCount'>$key</div>";
    echo "<div class='container'>";
    for($i = 0; $i <= 7; $i++){
        if(array_key_exists($i, $value)){
            echo "<div class='taken'>$i</div>";
        }
        else{
            echo "<div class='number'>$i</div>";
        }
    }
    echo "</div>";
}
?>
<style>
    .rowCount{
        background-color: #317680;
        height: 20px;
        width: 30px;
        float: left;
        margin-right: 10px;
        text-align: center;
    }
    .number{
        background-color: green;
        height: 20px;
        width: 20px;
        float: left;
        text-align: center;
    }
    .taken{
        background-color: #ff3b5b;
        height: 20px;
        width: 20px;
        float: left;
        text-align: center;
    }
    .container{
        height: 20px;
    }
</style>
<?
