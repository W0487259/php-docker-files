<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Connect to the database
require("dbInfo.php");
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check for errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$user_id = $_SESSION['id'];

$stmt = $mysqli->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

// Set the timezone to Nova Scotia
date_default_timezone_set('America/Halifax'); 
$current_date_time = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main menu</title>
</head>
<body>
    <h1>You're logged in!</h1>
</body>
</html>