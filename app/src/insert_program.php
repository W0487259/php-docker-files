<?php
include("conn.php");

/**
 * Insert Program File
 * Author: Evan van Oostrum
 * Date: 10/21/2024
 * 
 * Last edited: 10/30/2024
 * Filename: insertProgram.php
 */

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Connecting to the database server...<br/>";

    // Set parameters
    $programCode = htmlspecialchars($_POST["programCode"]);
    if(!preg_match('/[A-Z]{4}/', $programCode)) {
        die("Program code is invalid!");
    }
    $programTitle = htmlspecialchars($_POST["programTitle"]);
    

    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    echo "Successfully connected to the server!";

    // Prepare SQL statement and bind (bind parameters are used to help prevent SQL injections)
    $stmt = $conn->prepare("INSERT INTO Program (Code, Title) VALUES (?, ?);");
    $stmt->bind_param("ss", $programCode, $programTitle);

    echo "<br>" . $programCode . " - " . $programTitle . "<br>";

    $result = $stmt->execute();
    if($result) {
        echo "<h3>Success!</h3>";
    } else {
        echo "Error: Unable to insert program :(";
    }

    $conn->close();
    echo "<p><a href='./viewProgram.php'>View Programs</a></p>";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


}



?>