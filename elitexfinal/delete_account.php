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

    // Delete user account from the database
    $sql = "DELETE FROM users WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        // Account deleted successfully
        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
