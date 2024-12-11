<?php
include("conn.php");
$id = htmlspecialchars($_GET["id"]);
$campus = htmlspecialchars($_GET["campus"]);
$building = htmlspecialchars($_GET["building"]);
$roomNumber = htmlspecialchars($_GET["roomNumber"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    Edit Room File
    Author: Evan van Oostrum
    Date: 10/30/2024

    Last edited: 12/11/2024
    Filename: edit_room.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Edit Room <?php echo $id; ?></h1>
    <form method="post" action="<?php echo htmlspecialchars("modify_room.php")?>">
        <label for="room-code">Campus:</label>
        <input type="text" name="campus" id="room-campus" value="<?php echo $campus; ?>" required>
        <br><br/>
        <label for="room-title">Building:</label>
        <input type="text" name="building" id="room-building" value="<?php echo $building; ?>" required>
        <br><br/>
        <label for="room-title">Number:</label>
        <input type="text" name="roomNumber" id="room-number" value="<?php echo $roomNumber; ?>" required>
        <br><br/>
        <input type="hidden" name="roomId" value=<?php echo $id;?>>
        <button type="submit">Add Room</button>
</form>
</body>
</html>