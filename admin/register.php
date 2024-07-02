<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="Asignup.php" method="post">
            <div>
                <label for="username">username:</label><br>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <p>Already registered? <a href="adminlogin.php">Log in</a></p>
    </div>
</body>
</html>
