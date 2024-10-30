<?php
include("conn.php");

/**
 * Insert Room File
 * Author: Evan van Oostrum
 * Date: 10/30/2024
 * 
 * Last edited: 10/30/2024
 * Filename: insertRoom.php
 */

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Connecting to the database server...<br/>";

    $campus = htmlspecialchars($_POST["campus"]);

}