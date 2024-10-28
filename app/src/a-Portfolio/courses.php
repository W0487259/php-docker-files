<?php
$activePage = 'courses';
$pageName = 'My Courses';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName;?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include './sections/header.php' ?>
    <?php include './sections/nav.php' ?>
    <?php
    include ("conn.php");

    // Database name
    $name = 'courses';

    // Establish a connection to the DB
    $conn = new mysqli($host, $user, $pass, $name);

    // Check if the connection is valid
    if(!$conn) {
        die("Connection failed: " + mysqli_connect_error());
    }

    // Select query
    $sql = 'SELECT * from `course_info`;';

    // Checks if the query is valid
    if($result = $conn->query($sql)) {
        while($data = $result->fetch_object()) {
            $courses[] = $data;
        }
    }
    mysqli_close($conn); // Closes the connection to the database

    // var_dump($courses);
    foreach($courses as $course) {
        echo "<br/>";
        echo $course->CourseCode . " <br> " . $course->Title . " <br/> " . $course->Instructor
        . " <br> " . $course->RoomNumber;
        echo "<br/>";
    }
    ?>
    <?php include './sections/footer.php' ?>
</body>

</html>