<?php 
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = 'Quiz Master > Preferences';
include('header.php'); 
    $page="questions_list.php";
    verifyLogin($page);

$sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_TOPICS_PER_ROW'";
$sql2 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_QUESTIONS_TO_SHOW'";

$results = mysqli_query($db,$sql1);
$results2 = mysqli_query($db,$sql2);

if(mysqli_num_rows($results)>0){
    while($row = mysqli_fetch_assoc($results)){
        $column[] = $row;
    }
}
$rows = $column[0]['value'];

if(mysqli_num_rows($results2)>0){
    while($row = mysqli_fetch_assoc($results2)){
        $question[] = $row;
    }
}
$questions = $question[0]['value'];
?>
<style>#title {text-align: center;color: darkgoldenrod;}</style>
<html>
    <head>
        <title>QuizMaster Quiz</title>
        <style>
        input {
            text-align: center;
        }
        </style>
    </head>
    <body>
    <br>
    <h3 id="title">Update Preferences</h3><br>
    </body>
    <div class="container">
        <!--Check the CeremonyCreated and if Failed, display the error message-->
        
        <form action="modifyThePreferences.php" method="POST">
        <table style="width:500px">
        <tr>
            <th style="width:200px"></th>
            <th>Current Value</th> 
            <th>Update Value</th>
        </tr>
        <tr>
            <td style="width:200px">Number of Topics Per Row:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $rows; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_rows" maxlength="2" size="10" title="Enter a number"></td>
        </tr>
        <tr>
            <td style="width200px">Number of questions to show:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $questions; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_questions" maxlength="2" size="10" title="Enter a number"></td>
        </tr>
        </table><br>
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Preferences</button>
        </form>
    </div>
    </body>
</html>

