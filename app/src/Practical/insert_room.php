<?php
include("conn.php");

/**
 * Insert Room File
 * Author: Evan van Oostrum
 * Date: 10/30/2024
 * 
 * Last edited: 11/04/2024
 * Filename: insertRoom.php
 */

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Connecting to the database server...<br/>";

    $campus = htmlspecialchars($_POST["campus"]);
    $building = htmlspecialchars($_POST["building"]);
    $roomNumber = htmlspecialchars($_POST["roomNumber"]);


    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    echo "Successfully connected to the server!";

    // Prepare SQL statement and bind (bind parameters are used to help prevent SQL injections)
    $stmt = $conn->prepare("INSERT INTO Room (Campus, Building, RoomNumber) VALUES (?, ?, ?);");
    $stmt->bind_param("sss", $campus, $building, $roomNumber);

    echo "<br>" . $campus . " - " . $building . " - " . $roomNumber . "<br>";

    $result = $stmt->execute();
    if($result) {
        echo "<h3>Success!</h3>";
    } else {
        echo "Error: Unable to insert room :(";
    }

    $conn->close();
    echo "<p><a href='./view_rooms.php'>View Rooms</a></p>";

}