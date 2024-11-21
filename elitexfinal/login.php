<?php
session_start();

// Check if the user is already logged in, redirect to profile.php
if (isset($_SESSION["user_email"])) {
    header("Location: user_profile.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate login credentials
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Set session variables and redirect to profile.php
        $user = $result->fetch_assoc();
        $_SESSION["user_email"] = $user["email"];
        header("Location: user_profile.php");
        exit();
    } else {
        // Invalid credentials, show error message
        $error_message = "Invalid email or password";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8)) , url("images/register.jpg");
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px;
            font-size: 16px;
        }

        h2 {
            color: white;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            border-radius: 50px;
            padding: 20px;
            background: linear-gradient(135deg,transparent,rgba(255,255,255,.1),rgba(255,255,255,0));
            backdrop-filter:blur(10px);
           -webkit-backdrop-filter: blur(10px);
            background:rgba(255,255,255,.1);
            box-shadow: 0px 20px 20px 20px black;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 250px; /* Adjust the image width as needed */
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            color: white;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
           /* width: 80%; */
           border: 2px solid #00ff34;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 50px;
        }

        input[type="submit"] {
            background-color: rgb(40, 40, 40);
            color: white;
            border: none;
            padding: 15px 50px;
            cursor: pointer;
        }

        .login-container p {
            color: white;
            font-size: 20px;
        }

        .login-container a {
            color:#00ff34;
            font-weight: bolder;
        }

        .login-container a:hover {
            text-decoration: underline;
            
           
        }

        @media screen and (max-width: 600px) {
            body {
                padding: 30px;
            }

            .login-container {
                max-width: 70%;
            }
            img {
            display: block;
            margin: 0 auto;
            max-width: 80px; /* Adjust the image width as needed */
            margin-bottom: 20px;
        }
        }
    </style>
</head>
<body>
    <!-- Your header content... -->

    <div class="login-container">
    <img src="io.png" alt="Image Description">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password" id="password" required>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <p>Don't have an account? <a href="index.html">Sign up</a></p>
</div>


    <!-- Your JavaScript code and other scripts... -->
</body>
</html>
