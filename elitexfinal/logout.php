<?php
session_start();

// Check if the user is signed in
if (isset($_SESSION["user_email"])) {
    // If the user is signed in, destroy the session and log them out
    session_destroy();
}

// Redirect the user to the login page after logout
header("Location: login.php");
exit();
?>
