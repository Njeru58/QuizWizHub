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
        <form action="signup.php" method="post">
            <div>
                <label for="registration_number">Registration Number:</label><br>
                <input type="text" id="registration_number" name="registration_number" required>
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
                <label for="School">School:</label><br>
                <select id="School" name="School" required>
                    <option value="School1">School of Agriculture and Food Science(SAFS)</option>
                    <option value="School2">School of Business and Economics(SBE)</option>
                    <option value="School3">School of Computing and Informatics (SCI)</option>
                    <option value="School4">School of Engineering and Architecture (SEA)</option>
                    <option value="School5">School of Education (SEd)</option>
                    <option value="School6">School of Health Sciences (SHS)</option>
                    <option value="School7">School of Nursing (SoN)</option>
                    <option value="School8">School of Pure and Applied Sciences (SPAS)</option> 
                </select>
            </div>
            <div>
                <label for="year_of_study">Year of Study:</label><br>
                <input type="number" id="year_of_study" name="year_of_study" min="1" max="4" required>
            </div>
            <div>
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <p>Already registered? <a href="index.php">Log in</a></p>
    </div>
</body>
</html>
