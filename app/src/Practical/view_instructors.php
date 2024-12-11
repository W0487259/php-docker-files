<?php
include("conn.php");

/**
 * View Instructors File
 * Name: Evan van Oostrum
 * Date: 10/30/2024
 * 
 * Last edited: 10/30/2024
 * Filename: view_instructors.php
 */

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

echo "<p><a href='./add_instructor.php'>Add a New Instructor</a></p>";

// cols: ProgramId, Code, Title
$col1 = 'InstructorId';
$col2 = 'FirstName';
$col3 = "LastName";
echo "<table border='1'><tr><th>" . $col1 . "</th><th>" . $col2 . "</th><th>" . $col3 . "</th><th>Actions</th></tr>";
foreach ($instructors as $c) {
    echo "<tr><td>$c->InstructorId</td><td>$c->FirstName</td><td>$c->LastName</td><td>".
    "<form action='edit_instructor.php' method='get'>".
    "<input type=hidden name=id value=$c->InstructorId>".
    "<input type=hidden name=firstName value=$c->FirstName>".
    "<input type=hidden name=lastName value=$c->LastName>".
    "<button class='btn btn-warning' type=submit >Edit</button>".
    "</form>".
    "<form action='delete_instructor.php' method='get'>".
    "<input type=hidden name=id value=$c->InstructorId>".
    "<button class='btn btn-danger' type=submit >Delete</button>".
    "</form>".
    "</td></tr>";
}
echo "</table>";