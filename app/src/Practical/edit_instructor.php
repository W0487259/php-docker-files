<?php
include("conn.php");
$id = htmlspecialchars($_GET["id"]);
$firstName = htmlspecialchars($_GET["firstName"]);
$lastName = htmlspecialchars($_GET["lastName"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    Edit Instructor File
    Author: Evan van Oostrum
    Date: 12/11/2024

    Last edited: 12/11/2024
    Filename: edit_instructor.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Edit Instructor <?php echo $id; ?></h1>
    <form method="post" action="<?php echo htmlspecialchars("modify_instructor.php")?>">
        <label for="room-code">First Name:</label>
        <input type="text" name="firstName" id="instructor-firstName" value="<?php echo $firstName; ?>" required>
        <br><br/>
        <label for="room-title">Last Name:</label>
        <input type="text" name="lastName" id="instructor-lastName" value="<?php echo $lastName; ?>" required>
        <br><br/>
        <input type="hidden" name="instructorId" value=<?php echo $id;?>></input>
        <button type="submit">Save Instructor</button>
</form>
</body>
</html>