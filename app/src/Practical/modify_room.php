<?php
include("conn.php");

/**
 * Modify Room File
 * Author: Evan van Oostrum
 * Date: 10/30/2024
 * 
 * Last edited: 12/11/2024
 * Filename: modify_room.php
 */

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Connecting to the database server...<br/>";

    // Set parameters
    $campus = htmlspecialchars($_POST["campus"]);
    $building = htmlspecialchars($_POST["building"]);
    $roomNumber = htmlspecialchars($_POST["roomNumber"]);
    if(!preg_match('/(RM)[0-9]{3}/', $roomNumber)) {
        die("Room number is invalid!");
    }
    $roomId = htmlspecialchars($_POST["roomId"]);
    
    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    echo "Successfully connected to the server!";

    // Prepare SQL statement and bind (bind parameters are used to help prevent SQL injections)
    $stmt = $conn->prepare("UPDATE Room SET Campus=?, Building=?, RoomNumber=? WHERE RoomId=?;");
    $stmt->bind_param("sssi", $campus, $building, $roomNumber, $roomId);

    echo "<br>".$roomId." - ".$campus." - ".$building." - ".$roomNumber."<br>";

    $result = $stmt->execute();
    if($result) {
        echo "<h3>Success!</h3>";
    } else {
        echo "Error: Unable to update room :(";
    }

    $conn->close();
    echo "<p><a href='./view_rooms.php'>View Rooms</a></p>";
}