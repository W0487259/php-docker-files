<?php

/**
 * Display Movie XML Script
 * Author: Evan van Oostrum
 * Date: 11/29/2024
 * 
 * Last edited: 11/29/2024
 * Filename: displayMovieXML.php
*/

$xml = simplexml_load_file("myFavouriteMovies.xml");
print_r($xml);



/**
 * Sources:
 * https://www.w3schools.com/php/php_xml_simplexml_read.asp
*/

?>