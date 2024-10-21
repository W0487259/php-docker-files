<?php
$activePage = 'courses';
$pageName = 'My Courses';
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include './sections/header.php'; ?>
    <?php include './sections/nav.php'; ?>
    <div style="background-color:yellow; border: 3px solid yellow">
        <h2>Course Title</h2>
        <h3>PROG1000</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda nostrum eum facere porro sunt vero fuga quod incidunt corporis consequuntur aspernatur voluptates voluptate, veniam aliquam, perspiciatis ad tempora officia sed.
        Cupiditate laborum sequi aspernatur corrupti asperiores esse nihil debitis necessitatibus animi! Perferendis voluptates, quibusdam a incidunt voluptatum obcaecati ut illo eos inventore dignissimos, mollitia consectetur dolores aliquam provident quas sequi.
        Voluptate dolorem, minus perferendis rem beatae ullam deleniti doloribus. Hic voluptatum esse laudantium fuga perferendis assumenda, doloribus ex velit, a voluptatem facilis id incidunt quisquam similique, mollitia ipsum impedit. Labore!</p>
        <p>Instructor Name</P>
    </div>
    <?php
    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    $sql = 'SELECT * FROM course_info'; //TODO make better Query then run and display output
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $courses[] = $data;
        }
        
    }
    $conn->close();
    
    foreach ($courses as $c) {
        echo "<h1 class='course-title'>".$c->Title."</h1>";
        echo "<h3>".$c->CourseCode."</h3>";
        echo $c->Description."<br>";
        echo "<p class='course-teacher'>".$c->Instructor."</p>";
        echo "<br>";
    }

    ?>

    <?php
    include './sections/footer.php'
    ?>
</body>
</html>