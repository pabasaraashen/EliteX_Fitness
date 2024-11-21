<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "contact_form_db"; // Use the database name you created in phpMyAdmin

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) !== TRUE) {
        // Error
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        // Success - Redirect to the thank-you page
        header("Location: index.html");
        exit(); // Ensure that the script stops executing after the redirect
    }

    // Close the database connection
    $conn->close();
}
?>
