<?php
include("conn.php");

/**
 * Insert Registered User File
 * Author: Evan van Oostrum
 * Date: 11/25/2024
 * 
 * Last edited: 11/27/2024
 * Filename: insert_user.php
 */

if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Connecting to the database server...<br/>";

    // Grabs all 10 of the user inputs
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $street = htmlspecialchars($_POST["street"]);
    $city = htmlspecialchars($_POST["city"]);
    $province = htmlspecialchars($_POST["province"]);
    $postalCode = htmlspecialchars($_POST["postalCode"]);
    $country = htmlspecialchars($_POST["country"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $subscribed = $_POST["newsletter"];
    


    $conn = new mysqli($host, $user, $pass, $name);
    if(!$conn) { // Check if the connection is valid
        die("Connection failed: " + mysqli_connect_error());
    }

    echo "Successfully connected to the server!";

    // Prepare SQL statement and bind (bind parameters are used to help prevent SQL injections)
    $stmt = $conn->prepare(
        "INSERT INTO User (FirstName, LastName, Street, City, Province, 
            PostalCode, Country, Phone, Email, Newsletter) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
    );
    $stmt->bind_param("sssssssssb", $firstName, $lastName, $street,
        $city, $province, $postalCode, $country, $phone, $email, $subscribed);

    echo "<br>First name: " . $firstName . "<br>"
        . "Last name: " . $lastName . "<br>"
        . "Street: " . $street . "<br>"
        . "City: " . $city . "<br>"
        . "Province: " . $province . "<br>"
        . "Postal Code: " . $postalCode . "<br>"
        . "Country: " . $country . "<br>"
        . "Phone: " . $phone . "<br>"
        . "Email: " . $email . "<br>"
        . "Is Subscribed: " . $subscribed . "<br>"
        . "<br>";

    $result = $stmt->execute();
    if($result) {
        echo "<h3>Success!</h3>";
    } else {
        echo "Error: Unable to insert user :(";
    }

    $conn->close();
} else {
    echo "Error: You probably 'forgot' to press submit, right?";
}