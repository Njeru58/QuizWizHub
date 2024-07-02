<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
    <div class="container">
        <h2>Student/Admin Login</h2>
        <form action="signin.php" method="post">
            <div>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <button type="button" onclick="forgotPassword()">Forgot Password</button>
            <!-- <button onclick="window.location.href = "/admin/adminlogin.php";">Admin</button> -->
            <p>you are an Admin? <a href="admin/adminlogin.php">ADMIN</a></p>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
        <p id="error-message"></p>
    </div>
</body>
</html>
