<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        Display Movie XML Script
        Author: Evan van Oostrum
        Date: 11/29/2024

        Last edited: 12/03/2024
        Filename: displayMovieXML.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="movieStyles.css">
</head>
<body>
    <?php
    $xml = simplexml_load_file("myFavouriteMovies.xml") or die("Error: File cannot be found.");

    echo "<h1>Favourite Movies</h1><table border=1>";

    // Loops through the movie elements
    $counter = 0;
    foreach($xml->children() as $movie) {
        // Creates a new row every 3 movies
        if($counter % 3 == 0) {
            if($counter != 0) {echo "</tr>";}
            echo "<tr>";
        } 

        // Prints the movie information to the cell
        echo "<td>";
        echo "<a href='" . $movie->imdb . "'>
            <img src='" . $movie->picture . "'></a>";
        echo "<h1>".$movie->title." (".$movie->year.")"."</h1>";
        echo "Director: " . $movie->director . "<br>";
        echo "Main Actor: " . $movie->mainactor . "<br>";
        echo "Genre: " . $movie->genre;
        echo "</td>";

        $counter++;
    }
    echo "</table>";

    ?>
</body>
</html>