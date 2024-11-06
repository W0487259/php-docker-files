<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Form HTML Used with permission from David -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label, textarea {
            display: block;
        }
        #winner {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Strings</h1>
    <form method="post" action="rmatch.php"> <!-- removed '/' from action to make the filepath relative -->
        <div>
            <label for="tarStrings">Enter names separated by commas here:</label>
            <textarea name="tarStrings" id="tarStrings" name="stringsTextarea" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Draw a Name">
    </form>
</body>
</html>