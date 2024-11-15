<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        Register file for Login System Tutorial
        Author: Evan van Oostrum
        Date: 11/15/2024

        Last edited: 11/15/2024
        Filename: register.php
        Link: https://www.sitepoint.com/create-a-php-login-system/
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="username">Username:</label> 
        <input id="username" name="username" required="" type="text" />
        <label for="email">Email:</label>
        <input id="email" name="email" required="" type="email" />
        <label for="password">Password:</label>
        <input id="password" name="password" required="" type="password" />
        <input name="register" type="submit" value="Register" />
    </form>
</body>
</html>

<?php if (isset($_POST['register'])) { 

    include ("conn.php");

    //establish a DB connection to a specific database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Check for connection errors 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Prepare and bind the SQL statement 
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)"); $stmt->bind_param("sss", $username, $email, $password); 

    // Get the form data 
    $username = $_POST['username']; $email = $_POST['email']; $password = $_POST['password']; 

    // Hash the password 
    $password = password_hash($password, PASSWORD_DEFAULT); 

    // Execute the SQL statement 
    if ($stmt->execute()) { 
        echo "New account created successfully!"; 
    } else { 
        echo "Error: " . $stmt->error; 
    } 

    // Close the connection 
    $stmt->close(); 
    $conn->close(); 
}