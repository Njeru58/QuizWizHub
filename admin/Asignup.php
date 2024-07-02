<?php
include 'db.php'; // Include your admin database connection file

// Function to hash password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Registration handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate inputs
    if (empty($username) || empty($password) || empty($email)) {
        echo "<script>alert('Please fill in all fields');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit;
    }

    // Check if the admin already exists
    $stmt = $admin_conn->prepare("SELECT id FROM admins WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Admin with the same username or email already exists');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit;
    } else {
        // Hash password
        $hashed_password = hashPassword($password);

        // Insert admin data into the database using prepared statement
        $stmt = $admin_conn->prepare("INSERT INTO admins (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $email);

        if ($stmt->execute()) {
            echo "<script>alert('Admin registration successful');</script>";
            echo "<script>window.location.href = 'adminlogin.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error: Registration failed');</script>";
            echo "<script>window.location.href = 'register.php';</script>";
            exit;
        }
    }
}

// Close database connection
$admin_conn->close();
?>
