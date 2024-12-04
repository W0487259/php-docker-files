<?php

/**
 * User Authentication script
 * Author: Evan van Oostrum
 * Date: 12/03/2024
 * 
 * Last edited: 12/03/2024
 * Filename: authenticate.php
*/

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
        echo "You successfully logged in!";

        // Bind and fetch the results
        $stmt->bind_result($id, $usr, $pwd); 
        $stmt->fetch(); 

        // echo $id . " " . $usr . " " . $pwd;

        // Generate a session_id

        // Set session variables
        // $_SESSION['user_id'] = $id;

        


        // Redirects to admin.php
        // header("Location: admin.php");
    } else {
        // If the login fails, redirect the user back to the form
        header("Location: loginForm.html");
    }

    // Close the database connection
    $conn->close(); 
    
}

/**
 * Grocery List:
 * Create a file called authenticate.php. This program will
 * retrieve the username and password and check for a matching
 * record in the users table. DONE
 * 
 * If no match is found, redirect back to the login page. DONE
 * If a match is found, implement the following functionality:
 * = retrieve the user_id of the matching record;
 * - generate a session_id;
 * - set the user_id and session_id as session variables;
 * - send the user_id, session_id, and current time to the login_sessions table;
 * = redirect to admin.php
 * 
 * 
 * 
 * 
 */



?>