
<?php $page_title = 'Modify Question'; ?>
<?php include('header.php'); ?>
<div class="container">

<?php
include_once 'db_configuration.php';

if (isset($_GET['topic'])){

    $topic = $_GET['topic'];
    
    $sql = "SELECT * FROM topics 
    WHERE topic = '$topic'";
    if (!$result = $db->query($sql)) {
      die ('There was an error running query[' . $connection->error . ']');
  }//end if
}//end if

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

      echo '<form action="modifyTheTopic.php" method="POST" enctype="multipart/form-data">
      <br>
      <h3>Modify Question: '.$row["topic"].' - '.$row["image_name"].'? </h3> <br>
      
      <div>
        <label for="id">Id</label>
        <input type="text" class="form-control" name="id" value="'.$row["order"].'"  maxlength="5" style=width:400px readonly><br>
      </div>
      
      <div>
        <label for="name">Topic</label>
        <input type="text" class="form-control" name="topic" value="'.$row["topic"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div class="form-group col-md-4">
        <label for="cadence">New Image Path (Not Required)</label>
        <input type="file" name="fileToUpload" id="fileToUpload" maxlength="255">
      </div>
      <input type="hidden" class="form-control" name="image" value="'.$row["image_name"].'" maxlength="255" required>
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
}//end else*/

?>

</div>


