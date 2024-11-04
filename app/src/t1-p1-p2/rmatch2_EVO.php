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
    <form method="post" action="/rmatch2.php">
        <div>
            <label for="tarNames1">Enter names separated by commas here:</label>
            <textarea name="tarNames1" id="tarNames1" name="stringsTextarea" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div>
            <label for="tarNames2">Enter names separated by commas here:</label>
            <textarea name="tarNames2" id="tarNames2" name="stringsTextarea" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Draw a Name">
    </form>
</body>
</html>