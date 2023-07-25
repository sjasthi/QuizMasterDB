<?php 
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = 'Quiz Master > Generate Quiz';
include('header.php'); 
$page="questions_list.php";
verifyLogin($page);

// Query the database for keywords
$query = "SELECT `keyword` FROM `keywords`";
$keywords_db = mysqli_query($db, $query);
?>

<html>
    <head>
        <title>QuizMaster Quiz Generator</title>
        <style>
        select {
            width: 200px;
        }       
        input {
            text-align: center;
        }
        </style>
        <!-- Import BootStrap5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>

    <br>
    <div style="text-align:center;">
    <h3 id="title">Generate New Quiz</h3><br>
    <div class="container text-left float-right">
    <form action="display_custom_quiz.php" method="POST">
    <label>Number of questions to show:</label>
    <input required type="int" name="num_questions" maxlength="2" size="10" title="Enter a number">
    <br>
    <label>Keywords:</label>
    <?php 
    while($row = mysqli_fetch_assoc($keywords_db)) {
        echo "<div><input type='checkbox' name='keywords[]' value='" . $row['keyword'] . "'> " . $row['keyword'] . "</div>";
    }
    ?>
    <br>
    <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Generate Quiz</button>

</form>
    </div>
    </div>
    </body>
</html>
