<?php
include("conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Connecting to the database server...<br/>";

    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);


    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    echo "Successfully connected to the server!";

    // Prepare SQL statement and bind (bind parameters are used to help prevent SQL injections)
    $stmt = $conn->prepare("INSERT INTO Instructor (FirstName, LastName) VALUES (?, ?);");
    $stmt->bind_param("ss", $firstName, $lastName);

    echo "<br>" . $firstName . " - " . $lastName . "<br>";

    $result = $stmt->execute();
    if($result) {
        echo "<h3>Success!</h3>";
    } else {
        echo "Error: Unable to insert instructor :(";
    }

    $conn->close();
    echo "<p><a href='./view_instructors.php'>View Instructors</a></p>";

}