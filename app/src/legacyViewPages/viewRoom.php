<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    View Room File
    Author: Evan van Oostrum
    Date: 11/04/2024

    Last edited: 11/04/2024
    Filename: viewRoom.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Program</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include("conn.php"); ?>

    <?php
    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    $sql = 'SELECT * FROM Room'; 
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $rooms[] = $data;
        }
    }
    $conn->close();

    echo "<table border='1'>
        <tr>
            <th>RoomId</th>
            <th>Campus</th>
            <th>Building</th>
            <th>RoomNumber</th>
        </tr>";
    
    foreach($rooms as $p) {
        echo "<tr>";
        echo "<td>$p->RoomId</td>";
        echo "<td>$p->Campus</td>";
        echo "<td>$p->Building</td>";
        echo "<td>$p->RoomNumber</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

</body>
</html>