<?php
include("conn.php");

/**
 * Script for Retrieving User last names
 * Author: Evan van Oostrum
 * Date: 11/30/2024
 * 
 * Last edited: 12/02/2024
 * Filename: getUserInfo1.php
*/

echo "Connecting to the database server...<br>";

$conn = new mysqli($host, $user, $pass, $name);
if(!$conn) { // Check if the connection is valid
    die("Connection failed: " + mysqli_connect_error());
}

echo "Successfully connected to the server!<br>";

// Creates and executes SQL query to retrieve each user's last name
$sql = "SELECT `lastName` FROM `registered_users`;";
if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $values[] = $data;
    }
} else {
    echo "Error: The query failed :(";
}

// Close the connection
$conn->close();

// Converts the query results to a string array
$last_name_array = array_column($values, "lastName");

// Sorts the array and echoes each last name to the page
sort($last_name_array); 
foreach($last_name_array as $lastName) {
    echo $lastName . "<br>";
}

?>