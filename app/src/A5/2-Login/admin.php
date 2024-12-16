<?php
session_start(); 
include ("conn.php");

/**
 * Admin file for Assignment 5
 * Author: Evan van Oostrum
 * Date: 12/03/2024
 * 
 * Last edited: 12/16/2024
 * Filename: authenticate.php
*/

// Get session variables
$userId = $_SESSION['user_id'];
$sessionId = $_SESSION["session_id"];

// Connect to the database 
$conn = new mysqli($host, $user, $pass, $name);
if(!$conn) { // Check if the connection is valid
    die("Connection failed: " + mysqli_connect_error());
}

// Prepare and bind the SQL statement 
$stmt = $conn->prepare("SELECT user_id, session_id FROM login_sessions WHERE user_id = ? AND session_id = ?;"); 
$stmt->bind_param("ss", $userId, $sessionId); 

// Execute the SQL statement 
$stmt->execute(); 
$stmt->store_result();

if($stmt->num_rows > 0) { // If a matching session is found
    // Send a welcome message
    echo "<h1>Welcome to the Admin Page!</h1><br>";

    // Update the last_access_time in the login_sessions table
    $stmt = $conn->prepare("UPDATE login_sessions SET `last_access_time` = ? 
    WHERE `user_id` = ? AND `session_id` = ?"); 
    $stmt->bind_param("isi", $_SESSION["user_id"], $_SESSION["session_id"], mktime()); 
    $stmt->execute();
    
} else {
    // Redirect to login page
    header("Location: loginForm.html");
}

?>