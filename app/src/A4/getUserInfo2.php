<?php
include("conn.php");

/**
 * Script for Retrieving User full names and IDs
 * Author: Evan van Oostrum
 * Date: 11/30/2024
 * 
 * Last edited: 12/02/2024
 * Filename: getUserInfo2.php
*/

echo "Connecting to the database server...<br/>";

$conn = new mysqli($host, $user, $pass, $name);
if(!$conn) { // Check if the connection is valid
    die("Connection failed: " + mysqli_connect_error());
}

echo "Successfully connected to the server!";

// Logic goes here


// Close the connection
$conn->close();
