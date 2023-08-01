<?php
require 'db_configuration.php';
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve number of questions
    $num_questions = $_POST['num_questions'];

    // Retrieve selected keywords
    $selected_keywords = $_POST['keywords'];

    // Create a SQL query -- select randomly
    $keyword_condition = implode("', '", $selected_keywords); // Modified to add quotes around each keyword
    $sql = "SELECT DISTINCT q.id AS question_id, question, choice_1, choice_2, choice_3, choice_4, answer, image_name 
    FROM questions q
    JOIN question_keywords qk ON q.id = qk.question_id
    JOIN keywords k ON qk.keyword_id = k.id
    WHERE k.keyword IN ('$keyword_condition')
    ORDER BY RAND()
    LIMIT $num_questions";    

    $result = mysqli_query($db, $sql);

    // Display the quiz questions
    echo "<div style='text-align:center;'";
    echo "<h2>Quiz Questions:</h2>";
    echo "<form action='custom_quiz_submit.php' method='POST'>";

    $questionNumber  = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $question_id = $row['question_id'];
        $question = $row['question'];
        $choices = array($row['choice_1'], $row['choice_2'], $row['choice_3'], $row['choice_4']);
        $image = $row['image_name'];
        $answer = $row['answer'];

        // echo "<h3>$question</h3>";
        // foreach ($choices as $choice) {
        //     echo "<label><input type='radio' name='question_$question_id' value='$choice'> $choice</label><br>";
        // }
        // echo "<input type='hidden' name='answer_$question_id' value='$answer'>";
        // echo "<br>";
        $style = ($questionNumber == 1) ? 'block' : 'none';

        echo "<div class='questionSet' id='questionSet_$questionNumber' style='display: $style;'>";
        echo "<img src='" . $image . "' width='400' height=auto>";
        echo "<h3>$question</h3>";
        foreach ($choices as $choice) {
            echo "<label><input type='radio' name='question_$question_id' value='$choice'> $choice</label><br>";
        }
        echo "<input type='hidden' name='answer_$question_id' value='$answer'>";
        echo "</div>";
        $questionNumber++;
    }

    echo "<input type='hidden' id='num_questions' value='$num_questions'>";
    echo "<input type='hidden' id='current_question' value='1'>";
    echo "<input type='button' value='Previous' onclick='question_slide(-1)'>";
    echo "&nbsp&nbsp";
    echo "<input type='button' value='Next' onclick='question_slide(1)'>";
    echo "<br>";
    echo "<br>";
    echo "<input type='submit' value='Submit Quiz'>";
    echo "</div>";
    echo "</form>";
}
?>

<!-- Source used: https://stackoverflow.com/questions/64867940/how-to-get-quiz-questions-along-with-previous-next-buttons-to-show-up-when-submi
and https://stackoverflow.com/questions/18480319/document-getelementbyidtest-style-display-hidden-not-working-->
<script>
    function question_slide(offset) {
        const num_questions = parseInt(document.getElementById('num_questions').value);
        let current_question = parseInt(document.getElementById('current_question').value);

        const nextQuestion = current_question + offset;

        if (nextQuestion >= 1 && nextQuestion <= num_questions) {
            document.getElementById('questionSet_' + current_question).style.display = 'none';
            document.getElementById('questionSet_' + nextQuestion).style.display = 'block';

            current_question = nextQuestion;
            document.getElementById('current_question').value = current_question;

            if (current_question === 1) {
                document.getElementById('Previous').disabled = true;
            } else {
                document.getElementById('Previous').disabled = false;
            }

            if (current_question === num_questions) {
                document.getElementById('Next').style.display = 'none';
                document.getElementById('submitQuizBtn').style.display = 'block';
            } else {
                document.getElementById('Next').style.display = 'block';
                document.getElementById('submitQuizBtn').style.display = 'none';
            }
        }
    }
</script>