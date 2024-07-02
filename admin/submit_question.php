<!DOCTYPE html>
<html>
<head>
    <title>Add Questions</title>
</head>
<body>

<?php
include 'db.php';

// mysqldump -u root -p online_cat > mydatabase_backup.sql

// Loop through each question
for ($i = 1; $i <= 5; $i++) { // Adjust the loop limit as needed
    // Check if the array keys are set
    if(isset($_POST['question' . $i]) && isset($_POST['options' . $i]) && isset($_POST['correct_answer' . $i])) {
        // Get form data for the current question
        $question = $_POST['question' . $i];
        $options = $_POST['options' . $i];
        $correct_answer = $_POST['correct_answer' . $i];
        $hours = $_POST['hours'];
        $minutes = $_POST['minutes'];
        $seconds = $_POST['seconds'];

        // Calculate total duration in seconds
        $total_duration = $hours * 3600 + $minutes * 60 + $seconds;

        // Insert the data into the database
        $sql = "INSERT INTO question (question, answers, correct_answer, duration) VALUES ('$question', '$options', '$correct_answer', '$total_duration')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            break; // If an error occurs, stop processing further questions
        }
    }
}

echo "All questions added successfully";

// Close database connection
$conn->close();
?>

<!-- Add the "View Result" button -->
<br>
<a href="view_results.php"><button>View Results</button></a>

</body>
</html>
