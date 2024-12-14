<?php
session_start(); 

/**
 * Admin file for Assignment 5
 * Author: Evan van Oostrum
 * Date: 12/03/2024
 * 
 * Last edited: 12/03/2024
 * Filename: authenticate.php
*/


echo "Hello! You must've logged in somehow to get here!<br>";
echo "You should check login_sessions to make sure this did something.";


// Get session variables
$userId = $_SESSION['user_id'];
$sessionId = $_SESSION["session_id"];

// print_r($_SESSION);

// check database for a matching record with both of these values

// if yes: Do the following:
// Send a welcome message
// Update login time in the db

// if no: Redirect to login page
// header("Location: loginForm.html");

?>