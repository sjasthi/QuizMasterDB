<?php $page_title = 'Quiz Master > Create Question'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="questions_list.php";
    verifyLogin($page);

?>
<?php 
    $mysqli = NEW MySQLi('localhost','root','','quiz_master');
    $resultset = $mysqli->query("SELECT DISTINCT topic FROM topics ORDER BY topic ASC");   
?>
<link href="css/form.css" rel="stylesheet">
<style>#title {text-align: center; color: darkgoldenrod;}</style>
<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
        }
    }
  
    ?>
    <form action="createTheQuestion.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 id="title">Create A Question</h3> <br>
        
        <table>
            <tr>
                <td style="width:100px">Question:</td>
                <td><select name="topic">
                    <?php 
                    while($rows = $resultset->fetch_assoc()){
                        $topic=$rows['topic']; 
                    echo"<option Value='$topic'>$topic</option>";}?>
                    </select></td>
            </tr>
            <tr>
                <td style="width:100px">Question:</td>
                <td><input type="text"  name="question" maxlength="100" size="50" required title="Please enter a question."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 1:</td>
                <td><input type="text"  name="choice_1" maxlength="50" size="50" required title="Please enter answer 1."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 2:</td>
                <td><input type="text"  name="choice_2" maxlength="50" size="50" required title="Please enter answer 2."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 3:</td>
                <td><input type="text"  name="choice_3" maxlength="50" size="50" required title="Please enter answer 3."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 4:</td>
                <td><input type="text"  name="choice_4" maxlength="50" size="50" required title="Please enter answer 4."></td>
            </tr>
            <tr>
                <td style="width:100px">Answer:</td>
                <td><input type="text"  name="answer" maxlength="50" size="50" required title="Please enter the answer."></td>
            </tr>
            <tr>
                <td style="width:100px">Image:</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload" maxlength="50" size="50" title="Please enter the Image Name."></td>
            </tr>
        </table>

        <br><br>
        <div align="center" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Question</button>
        </div>
        <br> <br>

    </form>
</div>

