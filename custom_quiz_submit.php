<?php
require 'db_configuration.php';
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to track the score and number of correct answers
    $score = 0;
    $correct_answers = 0;

    // Loop through the submitted answers and compare them with the correct answers
    foreach ($_POST as $key => $value) {
        if (substr($key, 0, 9) === 'question_') {
			
			// Extract the question ID from the input name
            $question_id = substr($key, 9);
            $submitted_answer = $value;

            // Retrieve the correct answer from the database
            $sql = "SELECT answer FROM questions WHERE id = $question_id";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $correct_answer = $row['answer'];

            // Check if the submitted answer is correct
            if ($submitted_answer === $correct_answer) {
                $correct_answers++;
            }          

        }
    }

    // Calculate the score as a percentage
    $total_questions = count($_POST) / 2;
    $score = ($correct_answers / $total_questions) * 100;
}
?>

 <!-- Display to the screen  -->
<!DOCTYPE html>
<html>
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class='fs-3 text-center'>
    <h2>Quiz Score:</h2>
    <?php
        echo "<p>You answered $correct_answers out of $total_questions questions correctly.</p>";
        // Round up number
        $score = number_format($score, 2);
        echo "<p>Your score:<strong> $score% </strong></p>";
    ?>
    </div>
    
</body>
</html>