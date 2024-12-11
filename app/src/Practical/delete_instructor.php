<?php
include("conn.php");

/**
 * Delete Instructor File
 * Name: Evan van Oostrum
 * Date: 12/11/2024
 * 
 * Last edited: 12/11/2024
 * Filename: delete_instructor.php
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
    $stmt = $conn->prepare("DELETE FROM Instructor WHERE InstructorId=?");
    $stmt->bind_param("i", $id);
    
    $result = $stmt->execute();
    if ($result) {
        echo "<h1>Success</h1>";
    } else {
        echo $result;
    }

    $conn->close();
    echo "Instructor with ID $id has been deleted.";
    echo "<p><a href='./view_instructors.php'>Back to View Instructors</a></p>";

} else {
    echo "No instructor ID specified for deletion.";
}