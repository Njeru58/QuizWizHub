<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Today's Test</title>
    <link rel="stylesheet" href="assets/css/test.css">
</head>
<body>
    <h1>Today's Test</h1>
    <div id="timer"></div>
    <form id="quizForm" action="submit_answers.php" method="post">
        <?php
        $servername = "localhost";
        $username = "root"; // Your MySQL username
        $password = "@rayo7079"; // Your MySQL password
        $dbname = "online_cat"; // Your MySQL database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, question, answers FROM question";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<p>" . $row["question"] . "</p>";
                $options = explode(";", $row["answers"]);
                foreach ($options as $option) {
                    $option = trim($option);
                    echo '<label>';
                    echo '<input type="radio" name="question_' . $row["id"] . '" value="' . $option . '"> ' . $option;
                    echo '</label><br>';
                }
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <br>
        <input type="submit" value="Submit">
    </form>

    <script>
        // Set the countdown time in seconds
        var countdownTime = 3600; // 10 minutes

        // Get the form element
        var quizForm = document.getElementById("quizForm");

        // Function to update the countdown timer
        function updateTimer() {
            var minutes = Math.floor(countdownTime / 60);
            var seconds = countdownTime % 60;
            document.getElementById("timer").innerHTML = "Time remaining: " + minutes + "m " + seconds + "s";
            if (countdownTime == 0) {
                // Submit the form when time is up
                quizForm.submit();
            } else {
                countdownTime--;
                setTimeout(updateTimer, 1000); // Update timer every second
            }
        }

        // Start the countdown timer
        updateTimer();
    </script>
</body>
</html>
