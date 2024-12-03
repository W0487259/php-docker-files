<?php

/**
 * Display Movie XML Script
 * Author: Evan van Oostrum
 * Date: 11/29/2024
 * 
 * Last edited: 12/02/2024
 * Filename: displayMovieXML.php
*/

$xml = simplexml_load_file("myFavouriteMovies.xml")
    or die("Error: File cannot be found.");

// echo $xml->movie[0]->title;

foreach($xml->children() as $movies) {
    echo $movies->title . "<br>";
    // echo  "<img src='" . $movies->picture . "'><br>";
    echo "this_is_an_image_link" . "<br>";
    echo $movies->director . "<br>";
    echo $movies->mainactor . "<br>";
    echo $movies->imdb . "<br>";
    echo $movies->year . "<br>";
    echo $movies->genre . "<br>";
}


/**
 * Sources:
 * https://www.w3schools.com/php/php_xml_simplexml_read.asp
*/

?>