<?php

$namesList1 = $_POST["tarNames1"];
$namesList2 = $_POST["tarNames2"];

$namesArray1 = explode(",", $namesList1);
$namesArray2 = explode(",", $namesList2);

$arrSize1 = sizeof($namesArray1);
$arrSize2 = sizeof($namesArray2);
if($arrSize1 != $arrSize2) {
    die("Error: Lists must be the same length.");
}

$allNames = array_merge($namesArray1, $namesArray2);


$randIndex = rand(0, sizeof($allNames) - 1);
echo "<h2>The winner is... " . $allNames[$randIndex] . "!</h2><br>";

echo "Names:<br>";
for($i = 0; $i < sizeof($allNames); $i++) {
    echo ($i+1) . ". " . $allNames[$i] . "<br>";
}