<?php
$activePage = 'add program';
$pageName = 'Add Program';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    Add Program File
    Author: Evan van Oostrum
    Date: 10/21/2024

    Last edited: 10/30/2024
    Filename: addProgram.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Program Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include './sections/nav.php'; ?>
    <h1>Add Program</h1>
    <form method="post" action="<?php echo htmlspecialchars("insert_program.php")?>">
        <label for="program-code">Code:</label>
        <input type="text" name="programCode" id="program-code" required size='4' minlength='4' maxlength='4' >
        <br><br/>
        <label for="program-title">Title:</label>
        <input type="text" name="programTitle" id="program-title" required>
        <br><br/>
        <button type="submit">Add Program</button>
</form>

</body>
<script>
    const progCode = document.getElementById("program-code");
    progCode.addEventListener("focusout", function(evt){
        console.log("Key was pressed: " + evt.target.value);
        evt.target.value = evt.target.value.toUpperCase();
        checkCode(evt.target.value);
    });

    function checkCode(val) {
        if(/[A-Z]{4}/.test(val)) {
            console.log("Looks good!");
            progCode.classList.remove("is-invalid");
        } else {
            console.log("Wrong length!");
            progCode.classList.add("is-invalid");
        }
    }
</script>
</html>