<?php 
$page_title = "Quiz Master > Custom Quiz";
require 'bin/functions.php';
require 'db_configuration.php';
include('header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitQuiz'])) {
    // Process the submitted answers
    $score = 0;
    $total_questions = $_POST['num_questions'];
    $correct_answers = unserialize(htmlspecialchars_decode($_POST['correct_answers']));

    foreach ($correct_answers as $question_id => $correct_answer) {
        if (isset($_POST['question-'.$question_id])) {
            $user_answer = $_POST['question-'.$question_id];
            error_log("User answer: $user_answer");
            error_log("Correct answer: $correct_answer");
            if ((string) $user_answer === (string) $correct_answer) {
                $score++;
            }            
        }
    }
    

    echo "Your score: $score out of $total_questions";
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve number of questions
    $num_questions = $_POST['num_questions'];

    // Retrieve selected keywords
    $selected_keywords = $_POST['keywords'];

    // Create a SQL query
    $keyword_condition = implode("', '", $selected_keywords);
    $sql = "SELECT DISTINCT q.id AS question_id, question, choice_1, choice_2, choice_3, choice_4, answer 
    FROM questions q
    JOIN question_keywords qk ON q.id = qk.question_id
    JOIN keywords k ON qk.keyword_id = k.id
    WHERE k.keyword IN ('$keyword_condition')
    LIMIT $num_questions";    

    // Execute the SQL query
    $result = mysqli_query($db, $sql);
    if (!$result) {
        die('Invalid query: ' . mysqli_error($db));
    }

    // Store the correct answers in an array
    $correct_answers = array();

    // Generate the quiz form
    echo '<form method="POST">';
    while($row = mysqli_fetch_assoc($result)) {
        $correct_answers[$row['question_id']] = $row['answer'];

        echo '<div>';
        echo '<h3>' . $row['question'] . '</h3>';
        echo '<input type="radio" name="question-' . $row['question_id'] . '" value="1"> ' . $row['choice_1'] . '<br>';
        echo '<input type="radio" name="question-' . $row['question_id'] . '" value="2"> ' . $row['choice_2'] . '<br>';
        echo '<input type="radio" name="question-' . $row['question_id'] . '" value="3"> ' . $row['choice_3'] . '<br>';
        echo '<input type="radio" name="question-' . $row['question_id'] . '" value="4"> ' . $row['choice_4'];
        echo '</div><br>';
    }
    echo '<input type="hidden" name="num_questions" value="'.$num_questions.'">';
    echo '<input type="hidden" name="correct_answers" value="'.htmlentities(serialize($correct_answers)).'">';
    echo '<button type="submit" name="submitQuiz">Submit Quiz</button>'; 
    echo '</form>';
}
?>

