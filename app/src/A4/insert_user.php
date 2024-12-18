<?php
include("conn.php");

/**
 * Insert Registered User File
 * Author: Evan van Oostrum
 * Date: 11/25/2024
 * 
 * Last edited: 11/30/2024
 * Filename: insert_user.php
 */

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Checking user inputs...<br>";

    // Grabs all 11 of the user inputs
    $title = htmlspecialchars($_POST["title"]);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $street = htmlspecialchars($_POST["street"]);
    $city = htmlspecialchars($_POST["city"]);
    $province = htmlspecialchars($_POST["province"]);
    $postalCode = htmlspecialchars($_POST["postalCode"]);
    $country = htmlspecialchars($_POST["country"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $subscribed = isset($_POST["newsletter"]);
    
    // Checks if any field besides newsletter is empty
    // If there's a better way to do this, please tell me
    if(empty($title) || empty($firstName) || empty($lastName) || empty($street)
        || empty($city) || empty($province) || empty($postalCode)
        || empty($country) || empty($phone) || empty($email)
    ) { 
        // If yes: Echo everything and show which ones are empty
        echo "Error: One or more fields are empty.<br>";
        foreach($_POST as $key => $value)
        {
            echo "$key → ";
            if(empty($value)) {
                echo "[Missing Information]";
            } else {
                echo "$value";
            } 
            echo "<br>";
        }

    } else { 
        // If no, insert a new user and echo all users in a table
        echo "Connecting to the database server...<br/>";

        $conn = new mysqli($host, $user, $pass, $name);
        if(!$conn) { // Check if the connection is valid
            die("Connection failed: " + mysqli_connect_error());
        }

        echo "Successfully connected to the server!";

        // Prepare SQL statement and bind parameters to prevent SQL injections
        $stmt = $conn->prepare(
            "INSERT INTO registered_users (title, firstName, lastName, street, city, 
            province, postalCode, country, phone, email, subscribed) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
        );
        
        $stmt->bind_param("ssssssssssi", $title, $firstName, $lastName, $street,
            $city, $province, $postalCode, $country, $phone, $email, $subscribed);

        echo "<br>Title: $title<br>"
            . "First name: $firstName<br>"
            . "Last name: $lastName<br>"
            . "Street: $street<br>"
            . "City: $city<br>"
            . "Province: $province<br>"
            . "Postal Code: $postalCode<br>"
            . "Country: $country<br>"
            . "Phone: $phone<br>"
            . "Email: $email<br>"
            . "Is Subscribed: $subscribed<br>"
            . "<br>";
        $result = $stmt->execute();

        // If the query is successful, display all currently registered users
        if($result) {
            echo "<h3>Success!</h3>";
            
            // Create and execute query to get all information from registered_users
            $sql = 'SELECT * FROM registered_users';
            if ($result = $conn->query($sql)) {
                while ($data = $result->fetch_object()) {
                    $users[] = $data;
                }
            }

            // Display headers for every column in the table
            echo "<table border='1'><tr>
                <th>user_id</th>
                <th>title</th>
                <th>firstName</th>
                <th>lastName</th>
                <th>street</th>
                <th>city</th>
                <th>province</th>
                <th>postalCode</th>
                <th>country</th>
                <th>phone</th>
                <th>email</th>
                <th>subscribed</th>                    
            </tr>";

            // Print each user's information into a table row
            foreach($users as $usr) {
                echo "<tr>";
                echo "<td>$usr->user_id</td>";
                echo "<td>$usr->title</td>";
                echo "<td>$usr->firstName</td>";
                echo "<td>$usr->lastName</td>";
                echo "<td>$usr->street</td>";
                echo "<td>$usr->city</td>";
                echo "<td>$usr->province</td>";
                echo "<td>$usr->postalCode</td>";
                echo "<td>$usr->country</td>";
                echo "<td>$usr->phone</td>";
                echo "<td>$usr->email</td>";
                echo "<td>$usr->subscribed</td>";
                echo "</tr>";
            }

            echo "</table>";

        } else {
            echo "Error: Unable to insert user :(";
        }

        // Close the connection to the database
        $conn->close();
        
    }

} else { // Echoes an error if the user used the URL instead of POST
    echo "Error: You probably 'forgot' to press submit, right?";
}
