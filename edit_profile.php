<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="dashboard.php">Dashboard</a></p>
        </div>
        <div class="right-links">
            <a href="edit_profile.php">Change Profile</a>
            <a href="logout.php"><button class="btn">logout</button></a>
        </div>
    </div>
    <div class="container">
        <h2>Change Profile</h2>
        <form action="update_profile.php" method="post">
            <div>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <button type="submit">Change Profile</button>
            </div>
        </form>
    </div>
</body>
</html>
