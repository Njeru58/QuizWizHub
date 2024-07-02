<?php
include 'db.php';

// Start the session
session_start();

// Login handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['registration_number'] = $row['registration_number'];
            // Display success using JavaScript alert
            echo "<script>alert('Login successful');</script>";
            // Redirect to dashboard after successful login
            echo "<script>window.location.href = 'dashboard.php';</script>";
            exit;
        } else {
            // Display error using JavaScript alert
            echo "<script>alert('Invalid password');</script>";
            // Redirect back to index.php after displaying alert
            echo "<script>window.location.href = 'index.php';</script>";
            exit;
        }
    } else {
        // Display error using JavaScript alert
        echo "<script>alert('User not found');</script>";
        // Redirect back to index.php after displaying alert
        echo "<script>window.location.href = 'index.php';</script>";
        exit;
    }
}

// Close database connection
$conn->close();
?>
