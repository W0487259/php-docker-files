<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Program Form</title>
</head>

<body>
    <h1>Add Program</h1>
    <form method="post" action="insert_program.php">
        <label for="programCode">Code:</label>
        <input type="text" name="programCode" id="program-code" required>
        <br><br/>
        <label for="programTitle">Title:</label>
        <input type="text" name="programTitle" id="program-title" required>
        <br><br/>
        <button type="submit">Add Course</button>
    </form>

    
</body>
</html>