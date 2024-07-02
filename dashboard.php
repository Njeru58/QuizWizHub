<?php
// Start the session
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Get registration number and email from session
$registration_number = $_SESSION['registration_number'];
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
        <p>Registration Number: <?php echo $registration_number; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Hello there you are now logged in  proceed to view your todays test 
            Best wishes in your test .</p>

         <!-- directing the user to the main cats content -->
        <a href="today_test.php" class="button">Today's Test</a>
        <ul>
            <li><a href="edit_profile.php">Edit Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
