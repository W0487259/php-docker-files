<?php

/**
 * Generate Movie XML Script
 * Author: Evan van Oostrum
 * Date: 11/27/2024
 * 
 * Last edited: 11/27/2024
 * Filename: createMovieXML.php
*/

// Includes 2D Array of key-value pair information for each movie
include "./movieData.php";

// Creates an XML element object
$xml = new SimpleXMLElement("<favmovies></favmovies>");

// Selects each movie in the movies array
foreach($movies as $movie) {
    // Adds the information for each movie to the XML element
    $newMovie = $xml->addChild("movie");
    foreach($movie as $key => $value) {
        $newMovie->addChild($key, $value);
    }
}

// Echoes the XML element object to a new XML file
echo $xml->asXML("myFavouriteMovies.xml");

// Display everything in a table (todo)


/**
 * Sources: 
 * https://www.geeksforgeeks.org/how-to-use-foreach-loop-with-multidimensional-arrays-in-php/
 * https://www.youtube.com/watch?v=970v0PftFZE
 */