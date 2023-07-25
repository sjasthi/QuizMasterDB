<?php
require 'db_configuration.php';
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve number of questions
    $num_questions = $_POST['num_questions'];

    // Retrieve selected keywords
    $selected_keywords = $_POST['keywords'];

    // Create a SQL query
    $keyword_condition = implode("', '", $selected_keywords); // Modified to add quotes around each keyword
    $sql = "SELECT DISTINCT q.id AS question_id, question, choice_1, choice_2, choice_3, choice_4, answer 
    FROM questions q
    JOIN question_keywords qk ON q.id = qk.question_id
    JOIN keywords k ON qk.keyword_id = k.id
    WHERE k.keyword IN ('$keyword_condition')
    LIMIT $num_questions";    

    $result = mysqli_query($db, $sql);

    // Display the quiz questions
    echo "<h2>Quiz Questions:</h2>";
    echo "<form action='custom_quiz_submit.php' method='POST'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $question_id = $row['question_id'];
        $question = $row['question'];
        $choices = array($row['choice_1'], $row['choice_2'], $row['choice_3'], $row['choice_4']);
        $answer = $row['answer'];

        echo "<h3>$question</h3>";
        foreach ($choices as $choice) {
            echo "<label><input type='radio' name='question_$question_id' value='$choice'> $choice</label><br>";
        }
        echo "<input type='hidden' name='answer_$question_id' value='$answer'>";
        echo "<br>";
    }
    echo "<input type='submit' value='Submit Quiz'>";
    echo "</form>";
}
?>