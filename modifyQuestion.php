
<?php $page_title = 'Modify Question'; ?>
<?php $page_title = 'Quiz Master > Modify Questions'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="questions_list.php";
    verifyLogin($page);

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>

<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM questions
            WHERE id = '$id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
        }
      }

      echo '<h2 id="title">Modify Question</h2><br>';
      echo '<form action="modifyTheQuestion.php" method="POST" enctype="multipart/form-data">
      <br>
      <h3>'.$row["topic"].' - '.$row["question"].'? </h3> <br>
      
      <div>
        <label for="id">Id</label>
        <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" style=width:400px readonly><br>
      </div>
      
      <div>
        <label for="name">Topic</label>
        <input type="text" class="form-control" name="topic" value="'.$row["topic"].'"  maxlength="255" style=width:400px required><br>
      </div>
      
      <div>
        <label for="category">Question</label>
        <input type="text" class="form-control" name="question" value="'.$row["question"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="level">Choice 1</label>
        <input type="text" class="form-control" name="choice_1" value="'.$row["choice_1"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="facilitator">Choice 2</label>
        <input type="text" class="form-control" name="choice_2" value="'.$row["choice_2"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div>
        <label for="description">Choice 3</label>
        <input type="text" class="form-control" name="choice_3" value="'.$row["choice_3"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div>
        <label for="required">Choice 4</label>
        <input type="text" class="form-control" name="choice_4" value="'.$row["choice_4"].'"  maxlength="255" style=width:400px required><br>
      </div>
      
      <div>
        <label for="optional">Answer</label>
        <input type="text" class="form-control" name="answer" value="'.$row["answer"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div class="form-group col-md-4">
        <label for="cadence">New Image Path (Not Required)</label>
        <input type="file" name="fileToUpload" id="fileToUpload" maxlength="255">
      </div>
      <input type="hidden" class="form-control" name="oldimage" value="'.$row["image_name"].'" maxlength="255" required>
      <br>
      <div class="text-left">
          <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Question</button>
      </div>
      <br> <br>
      
      </form>';
    
    }//end while
}//end if
else {
    echo "0 results";
}//end else

?>

</div>


