<?php

/**
 * Movie class file
 * Author: Evan van Oostrum
 * Date: 12/03/2024
 * 
 * Last edited: 12/03/2024
 * Filename: movie.php
*/

class Movie {
    // ******* Instance variables *******
    private $title;         // Title
    private $imageLink;     // Link to poster on Wikipedia
    private $director;      // Full name of director
    private $mainactor;     // Full name of a starring actor in the movie
    private $imdb;          // Link to IMDB page
    private $releaseYear;   // Year of release
    private $genre;         // Film genre

    // ******* Getters *******
    function getTitle() { return $this->title; }
    function getImageURL() { return $this->imageLink; }
    function getDirector() { return $this->director; }
    function getMainActor() { return $this->mainactor; }
    function getImdbURL() { return $this->imdb; }
    function getReleaseYear() { return $this->releaseYear; }
    function getGenre() { return $this->genre; }

    // ******* Setters *******
    function setTitle($temp) { $this->title = $temp; }
    function setImageURL($temp) { $this->imageLink = $temp; }
    function setImdbURL($temp) { $this->imdb = $temp; }

    // ******* Constructor *******
    function Movie($t, $image, $dir, $ma, $imdbLink, $year, $gen) {
        $this->title = $t;
        $this->imageLink = $image;
        $this->director = $dir;
        $this->mainactor = $ma;
        $this->imdb = $imdbLink;
        $this->releaseYear = $year;
        $this->genre = $gen;
    }
}