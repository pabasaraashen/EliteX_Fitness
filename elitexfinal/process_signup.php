<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $nic_number = $_POST["nic_number"];
    $password = $_POST["password"];
    //$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

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

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, nic_number, password) VALUES ('$name', '$email', '$nic_number', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        // Redirect to the thank you page or homepage or dashboard
        header("Location: thank_you_page.html"); // Replace with the desired page
        exit();
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>