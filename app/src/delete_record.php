<?php
include("conn.php");

/**
 * Insert Room File
 * Name: Evan van Oostrum (Author: David K.)
 * Date: 10/30/2024
 * 
 * Last edited: 11/04/2024
 * Filename: delete_record.php
 */

// Check to see if URL has id like ...php?id=###
if (isset($_GET['id'])) { 
    $id = $_GET['id'];

    // Create database connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name); 
    mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // delete record
    $stmt = $conn->prepare("DELETE FROM Program WHERE ProgramId=?");
    $stmt->bind_param("i", $id);
    
    $result = $stmt->execute();
    if ($result) {
        echo "<h1>Success</h1>";
    } else {
        echo $result;
    }

    $conn->close();
    echo "Record with ID $id has been deleted.";
    echo "<p><a href='./addPrograms.php'>Back to Add Programs</a></p>";

} else {
    echo "No record ID specified for deletion.";
}