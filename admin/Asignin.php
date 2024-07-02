<?php
include 'db.php';

// Start the session
session_start();

// Admin login handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve admin data from the database
    $sql = "SELECT * FROM admins WHERE username='$username'";
    $result = $admin_conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            // Display success using JavaScript alert
            echo "<script>alert('Login successful');</script>";
            // Redirect to admin dashboard after successful login
            echo "<script>window.location.href = 'Adashboard.php';</script>";
            exit;
        } else {
            // Display error using JavaScript alert
            echo "<script>alert('Invalid password');</script>";
            // Redirect back to admin login page after displaying alert
            echo "<script>window.location.href = 'adminlogin.php';</script>";
            exit;
        }
    } else {
        // Display error using JavaScript alert
        echo "<script>alert('Admin not found');</script>";
        // Redirect back to admin login page after displaying alert
        echo "<script>window.location.href = 'adminlogin.php';</script>";
        exit;
    }
}

// Close database connection
$admin_conn->close();
?>
