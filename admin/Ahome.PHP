<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
        <h1>Admin Homepage</h1>
        <div id="questionForm">
            <h2>set the questions  for your students </h2> 

            <form action="submit_question.php" method="POST">
                <div>
                    <label for="hours">Hours:</label>
                    <input type="number" id="hours" name="hours" min="0" max="24" step="1" value="0">
                </div>
                <div>
                    <label for="minutes">Minutes:</label>
                    <input type="number" id="minutes" name="minutes" min="0" max="59" step="1" value="0">
                </div>
                <div>
                    <label for="seconds">Seconds:</label>
                    <input type="number" id="seconds" name="seconds" min="0" max="59" step="1" value="0">
                </div>
                <hr> <!-- Divider between time and questions -->

                <div id="questionFields">
                    <!-- Initial question fields -->
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <div class="questionField">
                        <input type="text" name="question<?php echo $i; ?>" placeholder="Question <?php echo $i; ?>" required>
                        <textarea name="options<?php echo $i; ?>" placeholder="Multiple Choice Options (Separate with semicolons)" required></textarea>
                        <input type="text" name="correct_answer<?php echo $i; ?>" placeholder="Correct Answer <?php echo $i; ?>" required>
                        <hr> <!-- Divider between questions -->
                    </div>
                    <?php } ?>
                </div>

                <button type="button" id="addQuestion">Add More Questions</button>
                <button type="button" id="removeQuestion">Remove Last Question</button>
                
                <input type="submit" value="Submit Questions">
            </form>
        </div>
        <div id="questionList">

        </div>
    </div>

    <script>
        // JavaScript to add more question fields
        document.getElementById('addQuestion').addEventListener('click', function() {
            var questionFields = document.getElementById('questionFields');
            var questionCount = questionFields.children.length;

            // Create a new set of question fields
            var newQuestionField = document.createElement('div');
            newQuestionField.classList.add('questionField');
            newQuestionField.innerHTML = `
                <input type="text" name="question${questionCount + 1}" placeholder="Question ${questionCount + 1}" required>
                <textarea name="options${questionCount + 1}" placeholder="Multiple Choice Options (Separate with semicolons)" required></textarea>
                <input type="text" name="correct_answer${questionCount + 1}" placeholder="Correct Answer ${questionCount + 1}" required>
                <hr>
            `;

            // Append the new question fields
            questionFields.appendChild(newQuestionField);
        });

        // JavaScript to remove the last question fields
        document.getElementById('removeQuestion').addEventListener('click', function() {
            var questionFields = document.getElementById('questionFields');
            var questionCount = questionFields.children.length;

            // Check if there's at least one question to remove
            if (questionCount > 1) {
                // Remove the last question fields
                questionFields.removeChild(questionFields.lastElementChild);
            }
        });
    </script>
</body>
</html>
