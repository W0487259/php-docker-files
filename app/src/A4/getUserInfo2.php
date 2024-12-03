<?php
include("conn.php");

/**
 * Script for Retrieving User full names and IDs
 * Author: Evan van Oostrum
 * Date: 11/30/2024
 * 
 * Last edited: 12/03/2024
 * Filename: getUserInfo2.php
*/

echo "Connecting to the database server...<br/>";

$conn = new mysqli($host, $user, $pass, $name);
if(!$conn) { // Check if the connection is valid
    die("Connection failed: " + mysqli_connect_error());
}

echo "Successfully connected to the server!<br>";

$all_users = array(); // Create array to store user information

// Creates and executes SQL query to retrieve each user's id, first and last name
$sql = "SELECT `user_id`, `firstName`, `lastName` FROM `registered_users`;";
if ($result = $conn->query($sql)) {
    while ($user_array = $result->fetch_row()) {
        array_push($all_users, $user_array);
    }
} else {
    echo "Error: The query failed :(";
}

// Creates the table header
echo "<table border=1>
    <tr><th>ID</th>
    <th>First name</th>
    <th>Last name</th>
</tr>";

// Prints each user's ID, first name and last name in a row
for($r = 0; $r < sizeof($all_users); $r++) {
    echo "<tr><td>" . $all_users[$r][0]
        . "</td><td>" . $all_users[$r][1] 
        . "</td><td>" . $all_users[$r][2] 
        . "</td></tr>";
}

echo "</table>";

// Close the connection
$conn->close();

?>