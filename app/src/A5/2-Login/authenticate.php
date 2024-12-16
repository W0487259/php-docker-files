<?php

/**
 * User Authentication script
 * Author: Evan van Oostrum
 * Date: 12/03/2024
 * 
 * Last edited: 12/16/2024
 * Filename: authenticate.php
*/
session_start(); 
if (isset($_POST['login'])) { 
    include ("conn.php");
    
    // Connect to the database 
    $conn = new mysqli($host, $user, $pass, $name);

    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    // Get the form data 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    // Prepare and bind the SQL statement 
    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE username = ? AND password = ?"); 
    $stmt->bind_param("ss", $username, $password); 

    // Execute the SQL statement 
    $stmt->execute(); 
    $stmt->store_result();
    
    if($stmt->num_rows > 0) {
        // Logic goes here
        // echo "You successfully logged in!<br>";

        // Bind and fetch the results
        $stmt->bind_result($id, $usr, $pwd); 
        $stmt->fetch(); 

        // Generate a session_id
        $session_id = session_id();
        $_SESSION["session_id"] = $session_id;

        // Set session variables
        $_SESSION['user_id'] = $id;
        $_SESSION['last_access_time'] = mktime();

        // Send data to the login_sessions table
        $stmt = $conn->prepare("INSERT INTO login_sessions(user_id, session_id, last_access_time) 
            VALUES (?, ?, ?);"); 
        $stmt->bind_param("isi", $_SESSION['user_id'], $_SESSION["session_id"], $_SESSION['last_access_time']); 
        $stmt->execute();

        // If the sql query is successful
        if($stmt) {
            // Redirects to admin.php
            header("Location: admin.php");
        } else {
            echo "Error: Login session failed.";
        }
        
    } else {
        // If the login fails, redirect the user back to the form
        header("Location: loginForm.html");
    }

    // Close the database connection
    $conn->close(); 
    
}

?>