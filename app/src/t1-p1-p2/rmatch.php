<?php

$namesList = $_POST["tarStrings"];

$namesArray = explode(",", $namesList);

// shuffle() -> Randomly shuffles an array
// Would be faster when test-taking, but slower with large arrays

$arrLen = sizeof($namesArray);
echo $arrLen;

$randIndex = rand(0, sizeof($namesArray) - 1);
echo "<h2>The winner is... " . $namesArray[$randIndex] . "!</h2><br>";

echo "Names:<br>";
foreach ($namesArray as $name) {
    echo "+$name";
}