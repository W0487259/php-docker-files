<?php
$activePage = 'add instructor';
$pageName = 'Add Instructor';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    Add Instructor File
    Author: Evan van Oostrum
    Date: 10/30/2024

    Last edited: 11/13/2024
    Filename: add_instructor.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Instructor Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include './sections/nav.php'; ?>
    <h1>Add Instructor</h1>
    <form method="post" action="<?php echo htmlspecialchars("insert_instructor.php")?>">
        <label for="instructor-firstName">First name:</label>
        <input type="text" name="firstName" id="instructor-firstName" required>
        <br><br/>
        <label for="instructor-lastName">Last name:</label>
        <input type="text" name="lastName" id="instructor-lastName" required>
        <br><br/>
        <button type="submit">Add Instructor</button>
</form>

</body>
</html>