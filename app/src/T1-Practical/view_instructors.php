<?php
include("conn.php");

$conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    $sql = 'SELECT * FROM Instructor'; //TODO make better Query then run and display output
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $instructors[] = $data;
        }
    }
    $conn->close();

// cols: ProgramId, Code, Title
$col1 = 'InstructorId';
$col2 = 'FirstName';
$col3 = "LastName";
echo "<table border='1'><tr><th>" . $col1 . "</th><th>" . $col2 . "</th><th>" . $col3 . "</th><th>Actions</th></tr>";
foreach ($instructors as $c) {
    echo "<tr><td>$c->InstructorId</td><td>$c->FirstName</td><td>$c->LastName</td><td>".
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