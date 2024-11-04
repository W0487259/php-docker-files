<?php
include("conn.php");

$conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    $sql = 'SELECT * FROM Room'; //TODO make better Query then run and display output
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $rooms[] = $data;
        }
    }
    $conn->close();

// cols: ProgramId, Code, Title
$col1 = 'RoomId';
$col2 = 'Campus';
$col3 = "Building";
$col4 = "RoomNumber";
echo "<table border='1'><tr><th>" . $col1 . "</th><th>" . $col2 . "</th><th>" . $col3 . "</th><th>" . $col4 . "</th><th>Actions</th></tr>";
foreach ($rooms as $c) {
    echo "<tr><td>$c->RoomId</td><td>$c->Campus</td><td>$c->Building</td><td>$c->RoomNumber</td><td>".
    "<form action='edit_room.php' method='get'>".
    "<input type=hidden name=id value=$c->RoomId>".
    "<button class='btn btn-warning' type=submit >Edit</button>".
    "</form>".
    "<form action='delete_room.php' method='get'>".
    "<input type=hidden name=id value=$c->RoomId>".
    "<button class='btn btn-danger' type=submit >Delete</button>".
    "</form>".
    "</td></tr>";
}
echo "</table>";