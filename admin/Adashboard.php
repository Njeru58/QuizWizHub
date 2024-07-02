<?php
// Start the session
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: ahome.php");
    exit;
}

// Get registration number and email from session
$username = $_SESSION['username'];
$email = $_SESSION['email'];


// Display dashboard content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to the Dashboard</h2>
        <p>username: <?php echo $username; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>hello there you are about to challenge your student with a test </p>
        <p>proceed with the process </p>
        <a href="Ahome.PHP" class="button">Upload questions</a>
        <ul>
            <li><a href="edit_profile.php">Edit Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
