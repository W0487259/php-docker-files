<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'root';

//database user password
$pass = 'super_secret123?';

// database name
$mydatabase = 'courses';
// check the mysql connection status

$conn = new mysqli($host, $user, $pass, $mydatabase);

// select query
// $sql = 'SELECT * FROM users';

$sql = 'SELECT CourseCode, Instructor, Room FROM Course';

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->username . " " . $user->password;
    echo "<br>";
}
?>