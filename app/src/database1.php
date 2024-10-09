<?php
include ("dbInfo.php");

// Database name
$name = 'courses';

// Establish a connection to the DB
$conn = new mysqli($host, $user, $pass, $name);

// Check if the connection is valid
if(!$conn) {
    die("Connection failed: " + mysqli_connect_error());
}

// Select query
$sql = 'SELECT * FROM Course';

if($result = $conn->query($sql)) {
    while($data = $result->fetch_object()) {
        $courses[] = $data;
    }
}
// var_dump($course);

foreach($courses as $course) {
    echo "<br/>";
    echo $course->CourseCode . " " . $course->CourseNum 
        . " <br/> " . $course->Title;
    echo "<br/>";
}

// Closes the connection to the database
mysqli_close($conn);

?>