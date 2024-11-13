<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    View Program File
    Author: Evan van Oostrum
    Date: 11/13/2024

    Last edited: 11/13/2024
    Filename: view_program.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Program</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include './sections/nav.php'; ?>
    <?php
    include("conn.php");
    $conn = new mysqli($host, $user, $pass, $name);

    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    $programId = 1;

    // Create an SQL query
    $sql = $conn->prepare("SELECT * FROM `Program` WHERE `ProgramId` = ?"); 
    $stmt->bind_param("i", $programId);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result) {
        // print_r($programs);
        var_dump($result->fetch_all(MYSQLI_ASSOC));
        foreach ($result as $key => $value) {
        echo "<p>" . $key->ProgramId . "</p>";
        echo "<p>" . $key->Code . "</p>";
        echo "<p>" . $key->Title . "</p>";
        }
    } else {
        print("Error: Program ID does not exist.");
    }

    // Close the connection
    $conn->close();

    ?>
</body>
</html>