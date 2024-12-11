<?php
include("conn.php");

/**
 * Delete Room File
 * Name: Evan van Oostrum
 * Date: 10/30/2024
 * 
 * Last edited: 12/11/2024
 * Filename: delete_room.php
 */

// Check to see if URL has id like ...php?id=###
if (isset($_GET['id'])) { 
    $id = $_GET['id'];

    // Create database connection
    $conn = new mysqli($host, $user, $pass, $name);
    mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Delete record
    $stmt = $conn->prepare("DELETE FROM Room WHERE RoomId=?");
    $stmt->bind_param("i", $id);
    
    $result = $stmt->execute();
    if ($result) {
        echo "<h1>Success</h1>";
    } else {
        echo $result;
    }

    $conn->close();
    echo "Room with ID $id has been deleted.";
    echo "<p><a href='./view_rooms.php'>Back to View Rooms</a></p>";

} else {
    echo "No room ID specified for deletion.";
}