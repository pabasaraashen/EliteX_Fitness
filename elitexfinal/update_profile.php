<?php
session_start();

// Check if the user is signed in
if (!isset($_SESSION["user_email"])) {
    // Redirect to the login page if the user is not signed in
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $db_password = ""; // Change this to your actual database password
    $dbname = "contact_form_db"; // Replace with your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update data in the database
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        // Data updated successfully
        // Redirect back to the profile page
        header("Location: user_profile.php");
        exit();
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
