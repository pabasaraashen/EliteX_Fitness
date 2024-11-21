<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $db_password = ""; 
    $dbname = "contact_form_db";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the user's data from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user["password"]) {
            // Password is correct, user is authenticated
            // Redirect to the homepage or dashboard
            header("Location: index.html");
            exit();
        } else {
            // Password is incorrect, set the error message
            echo '<p style="font-size: 22px;">Incorrect email or password. Please try again.</p>';
        }
    } else {
        // User does not exist, set the error message
        echo '<p style="font-size: 22px;">User with this email does not exist. Please sign up.</p>';
    }

    // Close the database connection
    $conn->close();
}
?>
