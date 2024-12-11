<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    Add Room File
    Author: Evan van Oostrum
    Date: 10/30/2024

    Last edited: 11/04/2024
    Filename: add_room.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Add Room</h1>
    <form method="post" action="<?php echo htmlspecialchars("insert_room.php")?>">
        <label for="room-code">Campus:</label>
        <input type="text" name="campus" id="room-campus" required>
        <br><br/>
        <label for="room-title">Building:</label>
        <input type="text" name="building" id="room-building" required>
        <br><br/>
        <label for="room-title">Number:</label>
        <input type="text" name="roomNumber" id="room-number" required>
        <br><br/>
        <button type="submit">Add Room</button>
</form>

</body>
</html>