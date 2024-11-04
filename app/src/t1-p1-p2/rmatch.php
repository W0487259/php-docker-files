<?php

$namesList = $_POST["tarStrings"];

$namesArray = explode(",", $namesList);

$arrLen = sizeof($namesArray);
echo $arrLen;

$randIndex = rand(0, sizeof($namesArray) - 1);
echo "<h2>The winner is... " . $namesArray[$randIndex] . "!</h2><br>";

echo "Names:<br>";
foreach ($namesArray as $name) {
    echo "+$name";
}