<?php
include 'db.php';

// Start the session
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Update profile handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'], $_POST['email'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Update user data in the database
    $sql = "UPDATE students SET password_hash=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $hashed_password, $email, $user_id);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($stmt->execute()) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    // Close prepared statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
