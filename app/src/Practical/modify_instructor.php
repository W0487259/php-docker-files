<?php
include("conn.php");

/**
 * Modify Instructor File
 * Author: Evan van Oostrum
 * Date: 12/11/2024
 * 
 * Last edited: 12/11/2024
 * Filename: modify_instructor.php
 */

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Connecting to the database server...<br/>";

    // Set parameters
    $instructorId = htmlspecialchars($_POST["instructorId"]);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    
    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    echo "Successfully connected to the server!";

    // Prepare SQL statement and bind (bind parameters are used to help prevent SQL injections)
    $stmt = $conn->prepare("UPDATE Instructor SET FirstName=?, LastName=? WHERE InstructorId=?;");
    $stmt->bind_param("ssi", $firstName, $lastName, $instructorId);

    echo "<br>".$instructorId." - ".$firstName." - ".$lastName."<br>";

    $result = $stmt->execute();
    if($result) {
        echo "<h3>Success!</h3>";
    } else {
        echo "Error: Unable to update instructor :(";
    }

    $conn->close();
    echo "<p><a href='./view_instructors.php'>View Instructors</a></p>";
}