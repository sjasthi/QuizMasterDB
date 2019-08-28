<?php 
$page_title = "Quiz Master > " . $_GET['topic'] . " Quiz";
require 'bin/functions.php';
require 'db_configuration.php';
include('header.php');

// functions
function getNumQuestionsForThisQuiz($quiz_topic){
    global $db; // tell the function to use to global variable $db
    $sql = "select count(topic) as c from questions where topic = '$quiz_topic'";
    $results = mysqli_query($db,$sql);

    $num_questions_found = 0;
    if(mysqli_num_rows($results)>0){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        $num_questions_found = $rows[0]['c']; // get the value of c for this first row that returned from the query
    }

    //echo "Found $num_questions_found questions for the quiz on topic $quiz_topic";
    return $num_questions_found;
}

function getNumQuestionsToShow(){
    global $db; // tell the function to use to global variable $db
    $sql = "select value from preferences where name = 'NO_OF_QUESTIONS_TO_SHOW'";
    $results = mysqli_query($db,$sql);

    $value = 0;
    if(mysqli_num_rows($results)>0){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        $value = $rows[0]['value'];
    }
    return $value;
}

function getQuestion($quiz_topic, $question_num){
    global $db; // tell the function to use to global variable $db
    $sql = "select id, question from questions where topic = '$quiz_topic' ";
    $results = mysqli_query($db,$sql);

    $question = "Error";
    if ($question_num == 0)
        return $question; // return error as we cannot get the question 0-1 or -1 as it doesn't exist
    if(mysqli_num_rows($results)>0 && mysqli_num_rows($results)>=$question_num){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        $question = $rows[$question_num-1]['question'];
    }
    return $question;
}

function getAnswers($quiz_topic, $question_ID){
    global $db; // tell the function to use to global variable $db
    // use the quiz_topic and question_id to identify the correct question
    // this fixes a bug where the same question answers would be selected when multiple questions had
    // the same text/string (ie dances quiz)
    $sql = "select choice_1, choice_2, choice_3, choice_4 from questions where "
        . "topic = '$quiz_topic' and id = '$question_ID'";
    $results = mysqli_query($db,$sql);

    $answers = array();
    if(mysqli_num_rows($results)>0){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        $answers[0] = $rows[0]['choice_1'];
        $answers[1] = $rows[0]['choice_2'];
        $answers[2] = $rows[0]['choice_3'];
        $answers[3] = $rows[0]['choice_4'];
    }
    return $answers;
}

function isAnswerRight($quiz_topic, $question_num, $user_answer){
    global $db; // tell the function to use to global variable $db
    $question_ID = getQuestionID($quiz_topic, $question_num); // returns the id for this particular question
    $user_answer_ID = getIdFromQuizABCD($user_answer); // converts a,b,c,d to 1,2,3,4 or 5
    $sql = "select choice_1, choice_2, choice_3, choice_4, answer from questions where topic = '$quiz_topic' "
        . "and id = '$question_ID'";
    $results = mysqli_query($db,$sql);
    $correct_answer_ID = 0;
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        if ($rows[0]['answer'] == $rows[0]['choice_1'])
            $correct_answer_ID =  1;
        else if ($rows[0]['answer'] == $rows[0]['choice_2'])
            $correct_answer_ID =  2;
        else if ($rows[0]['answer'] == $rows[0]['choice_3'])
            $correct_answer_ID =  3;
        else if ($rows[0]['answer'] == $rows[0]['choice_4'])
            $correct_answer_ID =  4;
        else $correct_answer_ID = 5;
        

        if ($user_answer_ID == $correct_answer_ID)
            return true;
        else
            return false;
    }
    return false;
}

function areAllQuizQuestionsAnswered($quiz_topic, $num_questions_to_show){
    for ($i = 1; $i <= $num_questions_to_show; $i++){
        $question_ID = $quiz_topic . "Q" . $i;
        if (isset($_SESSION[$question_ID]) == false
                || (isset($_SESSION[$question_ID]) == true && $_SESSION[$question_ID] == '0') ){
            if ($i == $num_questions_to_show){
                return true; // all but last question is answered, allow submit button to show
            }
            return false;
        }
    }
    // iterated through all questions and each one has an answer, thus return true
    return true;
}

function checkQuiz($quiz_topic, $num_questions_to_show){
    // returns the number of questions the user got correct in this quiz
    $num_correct = 0;
    $num_incorrect = 0;
    for ($i = 1; $i <= $num_questions_to_show; $i++){
        $question_ID = $quiz_topic . "Q" . $i;
        if (isset($_SESSION[$question_ID]) 
            && isAnswerRight($quiz_topic, $i, $_SESSION[$question_ID]) == true){
            $num_correct++;
        } else{
            $num_incorrect++;
        }
    }
    return $num_correct;
}

function printoutQuizResults($quiz_topic, $num_questions_to_show){
    global $db; // tell the function to use to global variable $db
    for ($i = 1; $i <= $num_questions_to_show; $i++){
        $question_ID = getQuestionID($quiz_topic, $i);
        $question_session_ID = $quiz_topic . "Q" . $i;
        $user_answerABCD = $_SESSION[$question_session_ID];
        $user_correct = isAnswerRight($quiz_topic, $i, $user_answerABCD);
        if (isset($_SESSION[$question_ID])){
            $user_answer = $_SESSION[$question_ID];
        }
        $sql = "select question, choice_1, choice_2, choice_3, choice_4, answer, image_name from "
            . "questions where topic = '$quiz_topic' and id = '$question_ID'";
        $results = mysqli_query($db,$sql);
        $rows = null;
        if(mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_assoc($results)){
                $rows[] = $row;
            }
        }
        if ($rows == null){
            return; // an unexpected error occurred
        }
        $correct_answer = $rows[0]['answer'];
        $user_answer_ID = getIdFromQuizABCD($user_answerABCD);
        $correct_answer_ID = 5;
        if ($rows[0]['answer'] == $rows[0]['choice_1']){
            $correct_answer_ID = 1;
        }
        else if ($rows[0]['answer'] == $rows[0]['choice_2']){
            $correct_answer_ID = 2;
        }
        else if ($rows[0]['answer'] == $rows[0]['choice_3']){
            $correct_answer_ID = 3;
        }
        else if ($rows[0]['answer'] == $rows[0]['choice_4']){
            $correct_answer_ID = 4;
        }

        $user_answer = "N/A";
        if ($user_answer_ID == 1){
            $user_answer = $rows[0]['choice_1'];
        }
        else if ($user_answer_ID == 2){
            $user_answer = $rows[0]['choice_2'];
        }
        else if ($user_answer_ID == 3){
            $user_answer = $rows[0]['choice_3'];
        }
        else if ($user_answer_ID == 4){
            $user_answer = $rows[0]['choice_4'];
        }

        $question = $rows[0]['question'];
        $image_address = $rows[0]['image_name'];

        if ($user_answer == $correct_answer){
            // user got correct answer, display user answer in green
            echo "<img src='$image_address' style='max-height:250px;width:auto;'><br>";
            echo "<h4>Q$i: $question</h4>";
            echo "<div class='correct_answer'>Your answer: $user_answer</div>";
            echo "<div class='answer'>Correct answer: $correct_answer</div><br>";
        }
        else if ($user_answer != $correct_answer){
            // user got incorrect answer, display user answer in red
            echo "<img src='$image_address' style='max-height:250px;width:auto;'><br>";
            echo "<h4>Q$i: $question</h4>";
            echo "<div class='incorrect_answer'>Your answer: $user_answer</div>";
            echo "<div class='answer'>Correct answer: $correct_answer</div><br>";
        }
    }
}

function getIdFromQuizABCD($abcd_string){
    if ($abcd_string == "A")
        return 1;
    else if ($abcd_string == "B")
        return 2;
    else if ($abcd_string == "C")
        return 3;
    else if ($abcd_string == "D")
        return 4;
    else return 5;
}

function getQuestionID($quiz_topic, $current_page){
    global $db; // tell the function to use to global variable $db
    $sql = "select id from questions where topic = '$quiz_topic' order by id ASC";
    $results = mysqli_query($db,$sql);

    if ($current_page < 1)
        return 0;
    if(mysqli_num_rows($results)>0){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        $id = $rows[$current_page-1]['id'];
    }
    return $id;
}

function getImageAddress($quiz_topic, $question_ID){
    global $db; // tell the function to use to global variable $db
    $sql = "select image_name from questions where topic = '$quiz_topic' and id = '$question_ID'";
    $results = mysqli_query($db,$sql);

    $image_address = "Error";
    if(mysqli_num_rows($results)>0){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        $image_address = $rows[0]['image_name'];
    }
    return $image_address;
}

function resetUserQuizAnswers($quiz_topic, $num_questions){
    for ($i = 1; $i <= $num_questions; $i++){
        $question_ID = $quiz_topic . "Q" . $i;
        $_SESSION[$question_ID] = '0';
    }
}
?>

<html>
    <head>
        <title>QuizMaster</title>
    </head>
    <style>
        .image {
            width: 100px;
            height: 100px;
            padding: 20px 20px 20px 20px;
            transition: transform .2s;
        }
        .image:hover {
            transform: scale(1.2)
        }
        #table_1 {
            border-spacing: 300px 0px;
        }
        #table_2 {
            margin-left: auto;
            margin-right: auto;
        }
        #silc {
            width: 300;
            height: 85;
        }
        #welcome {
            text-align: center;
        }
        #directions {
            text-align: center;
        }
        #title {    
            color: black;        
            text-align: center;
        }
        #quiz_content {
            padding: 15px;
        }
        a:visited, a:link, a:active {
            text-decoration: none;
        }
        .question{
            font-weight: bold;
        }
        .correct_answer{
            color: green;
            font-weight: normal;
        }
        .incorrect_answer{
            color: red;
            font-weight: normal;
        }
        .answer{
            color: green;
            font-weight: bold;
        }
    </style>
    <body>
    <div id="quiz_content">
    <?php
        if(isset($_GET['topic']) == false){
            echo "<h4 style='color:red;'>Error: Missing/Invalid Quiz Topic</h4>";
            exit();
        }
        $quiz_topic = $_GET['topic'];
        $current_page = 1;
        if (isset($_GET['page']) == true){
            $current_page = $_GET['page'];
        }
        $next_page = $current_page+1;
        $previous_page = $current_page-1;
        $num_questions = getNumQuestionsForThisQuiz($quiz_topic);
        $num_questions_to_show = getNumQuestionsToShow();
        if ($num_questions_to_show > $num_questions){
            echo "<h4 style='color:red'>Error: Quiz has $num_questions question(s) which is under the minimum of $num_questions_to_show!</h4>";
            exit();
        }
        $question_session_ID = $quiz_topic . "Q" . $current_page;
        // calculate the number of questions to display (based on NO_OF_QUESTIONS_TO_SHOW database attribute value)
        // this value is placed at the top ie (Page 1 of 20)
        $displayed_num_questions = $num_questions_to_show < $num_questions ? $num_questions_to_show : $num_questions;

        echo "<h2 style='display:inline;'>Quiz: $quiz_topic</h2>";
        // removed as per professor's request
        // if (isset($_GET['quiz_finished']) == false)
        //     echo "<pre style='display:inline;'>               </pre><button id='resetQuizBtn'>Reset Quiz</button><br>";
        echo "<h6>Page: $current_page of $num_questions_to_show</h6>";

        if ($num_questions < $num_questions_to_show){
            echo "<h4 style='color:red;'>Error: This quiz currently has under the minimum "
                . "number of required questions ($num_questions_to_show)</h4>";
            exit();
        }


        // check if a previous page's selection needs to be updated in the user's session data
        // this is how the quiz saves the user's answered questions
        if (isset($_GET['previous_selection']) && isset($_GET['previous_page'])){
            $previous_selection = $_GET['previous_selection'];
            $previous_question_session_ID = $quiz_topic . "Q" . $_GET['previous_page'];
            $_SESSION[$previous_question_session_ID] = $previous_selection;
        }


        // reset the users previously saved answers if they come from the home page (not from a previous quiz page)
        if ($current_page == 1 && isset($_GET["previous_page"]) == false){
            // it doesn't appear as though the user has already answered this question
            // this means they are likely starting the quiz for the first time
            // so we should reset all of their answers to the questions in this quiz to '0'
            resetUserQuizAnswers($quiz_topic, $num_questions);
            echo "**Reset the user's saved answers**";
        }
        else if (isset($_GET['reset_quiz'])){
            // user has pressed button to reset the quiz manually
            resetUserQuizAnswers($quiz_topic, $num_questions);
            echo "**Reset the user's saved answers by request**";
        }


        // check if the user has finished the quiz
        if (isset($_GET['quiz_finished'])){
            // tally up correct and incorrect answers
            $num_correct = checkQuiz($quiz_topic, $num_questions_to_show);
            $num_incorrect = $num_questions_to_show - $num_correct;
            echo "<div style='text-align:center'><h3 style='color:green'>Congratulations!</h3>";
            echo "<h4>You got $num_correct out of $num_questions_to_show questions correct!</h4>";
            echo "<img id='congratsi' style='width:200px; height:200px;' src='Images/about_images/thumbsup.jpg'><br><br>";
            echo "<a href='./display_quiz.php?topic=$quiz_topic&page=1&reset_quiz=true'>Reset Quiz</a></div>";
            
            // printout the entire quiz questions and answers
            printoutQuizResults($quiz_topic, $num_questions_to_show);
            exit();
        }


        // generate quiz question
        $question = getQuestion($quiz_topic, $current_page);
        if ($question == "Error" && $current_page == 1){
            // quiz has no questions!
            echo "<h4 style='color:red'>Error: Quiz has no questions!</h4>";
            exit();
        } else if ($question == "Error"){
            // unexpected error occurred while looking up this question in the quiz
            echo "<h4 style='color:red'>Error occurred while looking up question #$current_page</h4>";
            exit();
        }
        $question_ID = getQuestionID($quiz_topic, $current_page);
        $answers = getAnswers($quiz_topic, $question_ID);
        if (count($answers) <= 1){
            echo "<h4 style='color:red'>Error occurred while looking up answers for question #$current_page</h4>";
            exit();
        }
        $image_address = getImageAddress($quiz_topic, $question_ID);


        // create html code for the image
        $a_checked = ($_SESSION[$question_session_ID]=='A') ? 'checked' : '';
        $b_checked = ($_SESSION[$question_session_ID]=='B') ? 'checked' : '';
        $c_checked = ($_SESSION[$question_session_ID]=='C') ? 'checked' : '';
        $d_checked = ($_SESSION[$question_session_ID]=='D') ? 'checked' : '';
        echo "
        <p><img id='q_image' src='$image_address' style='max-height:250px;width:auto;'></p>
        <p class='question'>Q$current_page. $question</p>
        <form>
        <input type ='radio' name='choices' id='choice_1' value='A' $a_checked>
        <label for='choice_1' id='choice_1_label'>$answers[0]</label>
        <br>
        <input type ='radio' name='choices' id='choice_2' value='B' $b_checked>
        <label for='choice_2' id='choice_2_label'>$answers[1]</label>
        <br>
        <input type ='radio' name='choices' id='choice_3' value='C' $c_checked>
        <label for='choice_3' id='choice_3_label'>$answers[2]</label>
        <br>
        <input type ='radio' name='choices' id='choice_4' value='D' $d_checked>
        <label for='choice_4' id='choice_4_label'>$answers[3]</label>
        <br>
        </form>";
    ?>

    <button id='previousBtn' title='Navigate to the previous question'>Previous</button>
    <button id='submitBtn' title='This button is only enabled when all questions are answered'>Submit</button>
    <button id='nextBtn' title='Navigate to the next question'>Next</button>

    <script>
    // assign event listeners to the three buttons so our functions are triggered when they are clicked
    var next_btn = document.getElementById("nextBtn");
    if (next_btn) {
        next_btn.addEventListener("click", nextQuestion);
    }

    var previous_btn = document.getElementById("previousBtn");
    if (previous_btn) {
        previous_btn.addEventListener("click", previousQuestion);
    }

    var submit_btn = document.getElementById("submitBtn");
    if (submit_btn) {
        submit_btn.addEventListener("click", showResults);
    }

    var reset_quiz_btn = document.getElementById("resetQuizBtn");
    if (reset_quiz_btn) {
        reset_quiz_btn.addEventListener("click", resetQuiz);
    }


    // checking if any of the buttons should be disabled (ie previous button on first page of the quiz)
    // this code will execute and disable these buttons in that case
    <?php
    if ($current_page == 1){
        echo "document.getElementById('previousBtn').disabled = true;\n";
    }
    if ($current_page == $num_questions_to_show){
        echo "document.getElementById('nextBtn').disabled = true;\n";
    }
    if (areAllQuizQuestionsAnswered($quiz_topic, $num_questions_to_show) == false){
        echo "document.getElementById('submitBtn').disabled = true;\n";
    }
    ?>


    // functions for performing operations based on which buttons are clicked
    function getSelection(){
        if (document.getElementById("choice_1").checked == true){
            return "A";
        }
        else if (document.getElementById("choice_2").checked == true){
            return "B";
        }
        else if (document.getElementById("choice_3").checked == true){
            return "C";
        }
        else if (document.getElementById("choice_4").checked == true){
            return "D";
        }
        return "0";
    }

    // responsible for redirecting user to next question page
    function nextQuestion(){
        var selection = getSelection();
        if (selection != "0"){
            var nextPage = "<?php echo "./display_quiz.php?topic=$quiz_topic&page=$next_page&previous_page=$current_page&previous_selection=" ?>";
            nextPage = nextPage + selection;
            window.location.href = nextPage;
        } else{
            window.location.href = "<?php echo "./display_quiz.php?topic=$quiz_topic&page=$next_page" ?>";
        }
    }

    // responsible for redirecting user to previous question page
    function previousQuestion(){
        var selection = getSelection();
        if (selection != "0"){
            var nextPage = "<?php echo "./display_quiz.php?topic=$quiz_topic&page=$previous_page&previous_page=$current_page&previous_selection=" ?>";
            nextPage = nextPage + selection;
            window.location.href = nextPage;
        } else{
            window.location.href = "<?php echo "./display_quiz.php?topic=$quiz_topic&page=$previous_page" ?>";
        }
    }

    // responsible for loading the quiz results
    function showResults(){
        var selection = getSelection();
        if (selection != "0"){
            var nextPage = "<?php echo "./display_quiz.php?topic=$quiz_topic&page=$current_page&quiz_finished=true&previous_page=$current_page&previous_selection=" ?>";
            nextPage = nextPage + selection;
            window.location.href = nextPage;
        } else{
            window.location.href = "<?php echo "./display_quiz.php?topic=$quiz_topic&page=$current_page&quiz_finished=true" ?>";
        }
    }

    // responsible for resetting the quiz's saved answers
    function resetQuiz(){
        // reloads the page and specifies the parameter to manually reset the quiz
        window.location.href = "<?php echo "./display_quiz.php?topic=$quiz_topic&page=1&reset_quiz=true" ?>";
    }
    </script>

    </div>
    </body>
</html>
