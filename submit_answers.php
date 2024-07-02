<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Results</title>
    <link rel="stylesheet" href="assets/css/submit.css">
</head>
<body>
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

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "@rayo7079";
    $dbname = "online_cat";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $submitted_answers = $_POST;
        $score = 0;
        $total_questions = count($submitted_answers);

        foreach ($submitted_answers as $question_id => $submitted_answer) {
            $question_id = str_replace("question_", "", $question_id);
            $sql = "SELECT correct_answer FROM question WHERE id = $question_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($submitted_answer == $row["correct_answer"]) {
                    $score++;
                }
            }
        }

        // Store test results in the database
        $sql = "INSERT INTO test_results (registration_number, email, marks_scored) VALUES ('$registration_number', '$email', $score)";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Test Completed Successfully!</h2>";
            echo "<p>Registration Number: $registration_number</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Total Marks Scored: $score / $total_questions</p>";
            echo "<a href='logout.php'>Logout</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close database connection
    $conn->close();
    ?>
</body>
</html>
