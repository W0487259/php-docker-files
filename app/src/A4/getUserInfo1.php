<?php
include("conn.php");

/**
 * Script for Retrieving User last names
 * Author: Evan van Oostrum
 * Date: 11/30/2024
 * 
 * Last edited: 11/30/2024
 * Filename: getUserInfo1.php
*/

echo "Connecting to the database server...<br/>";

$conn = new mysqli($host, $user, $pass, $name);
if(!$conn) { // Check if the connection is valid
    die("Connection failed: " + mysqli_connect_error());
}

echo "Successfully connected to the server!";

