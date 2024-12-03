<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        Movie Display using Classes
        Author: Evan van Oostrum
        Date: 12/03/2024

        Last edited: 12/03/2024
        Filename: movieDisplay.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="movieStyles.css">
</head>
<body>
    <?php
    // Includes 2D Array of key-value pair information for each movie
    include "./movie.php";

    // Loads data from an XML file
    $xml = simplexml_load_file("myFavouriteMovies.xml") or die("Error: File cannot be found.");
    
    $movies = array(); // Create array to store movie objects

    // Creates an object for each movie and adds them to the movies array
    foreach($xml->children() as $movieElm) {
        $newMovie = new Movie(
            $movieElm->title,
            $movieElm->picture,
            $movieElm->director,
            $movieElm->mainactor,
            $movieElm->imdb,
            $movieElm->year,
            $movieElm->genre
        );
        array_push($movies, $newMovie);
    }

    // Output each movie object into an HTML table
    echo "<h1>Favourite Movies</h1><table border=1>";

    // Loops through the movie elements
    $counter = 0;
    foreach($movies as $movie) {
        // Creates a new row every 3 movies
        if($counter % 3 == 0) {
            if($counter != 0) {echo "</tr>";}
            echo "<tr>";
        } 

        // Prints the data for each movie object to a cell
        echo "<td>";
        echo "<a href='" . $movie->getImdbURL() . "'>
            <img src='" . $movie->getImageURL() . "'></a>";
        echo "<h1>".$movie->getTitle() ." (".$movie->getReleaseYear() .")"."</h1>";
        echo "Director: " . $movie->getDirector() . "<br>";
        echo "Main Actor: " . $movie->getMainActor() . "<br>";
        echo "Genre: " . $movie->getGenre();
        echo "</td>";

        $counter++;
    }
    echo "</table>";

    ?>
</body>
</html>




