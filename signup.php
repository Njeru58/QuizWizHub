-- Active: 1715206504621@@127.0.0.1@3306@information_schema
<?php
include 'db.php';

// Function to hash password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Registration handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registration_number'], $_POST['password'], $_POST['email'], $_POST['School'], $_POST['year_of_study'])) {
    $registration_number = $_POST['registration_number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $school = $_POST['School'];
    $year_of_study = $_POST['year_of_study'];

    // Check if the user already exists
    $sql = "SELECT id FROM students WHERE registration_number='$registration_number' OR email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display error using JavaScript alert
        echo "<script>alert('User with the same registration number or email already exists');</script>";
        // Redirect back to index.php after displaying alert
        echo "<script>window.location.href = 'index.php';</script>";
        exit;
    } else {
        // Hash password
        $hashed_password = hashPassword($password);

        // Insert user data into the database
        $sql = "INSERT INTO students (registration_number, password_hash, email, school, year_of_study) VALUES ('$registration_number', '$hashed_password', '$email', '$school', '$year_of_study')";

        if ($conn->query($sql) === TRUE) {
            // Display success using JavaScript alert
            echo "<script>alert('Registration successful');</script>";
            // Redirect back to index.php after displaying alert
            echo "<script>window.location.href = 'index.php';</script>";
            exit;
        } else {
            // Display error using JavaScript alert
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            // Redirect back to index.php after displaying alert
            echo "<script>window.location.href = 'index.php';</script>";
            exit;
        }
    }
}

// Close database connection
$conn->close();
?>
