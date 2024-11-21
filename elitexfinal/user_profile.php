<?php
session_start();

// Check if the user is signed in
if (!isset($_SESSION["user_email"])) {
    // Redirect to the login page if the user is not signed in
    header("Location: login.php");
    exit();
}

// Initialize the user_name variable with the existing value or a default value
$user_name = isset($_SESSION["user_name"]) ? $_SESSION["user_name"] : '';

// Retrieve the user's data from the database
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

$user_email = $_SESSION["user_email"];
$sql = "SELECT * FROM users WHERE email = '$user_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_id = $user["id"];
    $user_name = $user["name"];
    $user_email = $user["email"];
}

// Handle form submission for updating profile
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form fields are set
    if (isset($_POST["name"]) && isset($_POST["email"])) {
        // Sanitize the input
        $new_name = $_POST["name"];
        $new_email = $_POST["email"];

        // Update the user's profile in the database
        $sql_update = "UPDATE users SET name = '$new_name', email = '$new_email' WHERE id = $user_id";
        if ($conn->query($sql_update) === TRUE) {
            // Update the session variables with the new data
            $_SESSION["user_name"] = $new_name;
            $_SESSION["user_email"] = $new_email;

            // Refresh the page to display the updated data
            header("Location: user_profile.php");
            exit();
        } else {
            // Handle the case if the update fails
            echo "Error updating profile: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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

        .login-container, .profile-container {
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
            max-width: 200px; /* Adjust the image width as needed */
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
        input[type="password"],
        input[type="text"] {
            /* width: 80%; */
            border: 2px solid;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 50px;
        }

        input[type="submit"] {
            background-color:#00ff34;
            color: white;
            border: none;
            padding: 15px 50px;
            cursor: pointer;
        }

        .login-container p, .profile-container h3 {
            color: white;
            font-size: 20px;
        }

        .login-container a, .profile-container a.logout-btn {
            color: #00ff34;
            font-weight: bolder;
        }

        .login-container a:hover, .profile-container a.logout-btn:hover {
            text-decoration: underline;
           
        }

        /* Additional styles for user_profile.php */
        .profile-container h2 {
            color:white;
            font-size: 24px;
        }

        .profile-container h3 {
            color: white;
            font-size: 20px;
        }

        .profile-container form {
            margin-top: 20px;
         
        }

        .profile-container a {
          font-size: 20px;
          
        }

        .profile-container input[type="submit"] {
            background-color:rgb(40, 40, 40);
            margin-top: 10px;
            border-radius: 50px;
        }

        .logout-btn {
            margin-right: 20px;
        }

        .logout-btn:last-child {
            margin-right: 0; 
}


@media screen and (max-width: 768px) {
            img {
                max-width: 150px;
            }

            .profile-container h2 {
                font-size: 20px;
            }

            .profile-container h3 {
                font-size: 18px;
            }

            .logout-btn {
                font-size: 16px;
            }
        }

        @media screen and (max-width: 480px) {
            body {
                padding: 10px;
                font-size: 12px;
            }

            .profile-container {
                padding: 10px;
            }

            img {
                max-width: 120px;
            }

            .profile-container h2 {
                font-size: 18px;
            }

            .profile-container h3 {
                font-size: 16px;
            }

            .logout-btn {
                font-size: 14px;
            }
        }

    </style>
</head>
<body>

    <div class="profile-container">
        <!-- Add the image here -->
        <img src="io.png" alt="User Image" width="250">

        
        <?php
        // Check if the form has been submitted and update the form fields accordingly
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"]) && isset($_POST["email"])) {
            $user_name = $_POST["name"];
            $user_email = $_POST["email"];
        }
        ?>

    <!-- Your header content... -->

    
        <h2>Welcome  <?php echo $user_name; ?></h2>
        <h3>Email: <?php echo $user_email; ?></h3>

        <!-- Profile Update Form -->
        <!--  <h3>Update Your Profile</h3> -->
        <form action="update_profile.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="change the name" value="<?php echo $user_name; ?>" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="change the email" value="<?php echo $user_email; ?>" required>
            <input type="submit" value="Update Profile">
        </form>

        <!-- Delete Account Form -->
       <!-- <h3>Delete Your Account</h3> -->
        <form action="delete_account.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="submit" value="Delete Account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
        </form>

        <br>
        <!-- Logout Button -->
        <a href="logout.php" class="logout-btn">Logout</a>
        <a href="index.html" class="logout-btn">Back to Home</a>
    </div>

    <!-- Your JavaScript code and other scripts... -->
</body>
</html>

