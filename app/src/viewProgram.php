<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    View Program File
    Author: Evan van Oostrum
    Date: 10/21/2024

    Last edited: 10/21/2024
    Filename: viewProgram.php
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Program</title>
</head>
<body>
    <?php include './sections/header.php'; ?>
    <?php include './sections/nav.php'; ?>
    <?php include("conn.php"); ?>
    <div style="background-color:yellow; border: 3px solid yellow">
        <h2>Course Title</h2>
        <h3>PROG1000</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda nostrum eum facere porro sunt vero fuga quod incidunt corporis consequuntur aspernatur voluptates voluptate, veniam aliquam, perspiciatis ad tempora officia sed.
        Cupiditate laborum sequi aspernatur corrupti asperiores esse nihil debitis necessitatibus animi! Perferendis voluptates, quibusdam a incidunt voluptatum obcaecati ut illo eos inventore dignissimos, mollitia consectetur dolores aliquam provident quas sequi.
        Voluptate dolorem, minus perferendis rem beatae ullam deleniti doloribus. Hic voluptatum esse laudantium fuga perferendis assumenda, doloribus ex velit, a voluptatem facilis id incidunt quisquam similique, mollitia ipsum impedit. Labore!</p>
        <p>Instructor Name</P>
    </div>
    <?php
    $activePage = 'Program';
    $pageName = 'My Courses';

    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    $sql = 'SELECT * FROM Program'; //TODO make better Query then run and display output
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $programs[] = $data;
        }
    }
    $conn->close();
    // var_dump($programs);

    echo "<table border='1'>
        <tr>
            <th>ProgramId</th>
            <th>Code</th>
            <th>Title</th>
        </tr>";
    
    foreach($programs as $p) {
        echo "<tr>";
        echo "<td>$p->ProgramId</td>";
        echo "<td>$p->Code</td>";
        echo "<td>$p->Title</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

    

</body>
</html>