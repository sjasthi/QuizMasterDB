
<?php $page_title = 'Modify Keyword'; ?>
<?php include('header.php'); ?>
<div class="container">

<?php
include_once 'db_configuration.php';

if (isset($_GET['keyword'])){

    $keyword = $_GET['keyword'];
    
    $sql = "SELECT * FROM keywords 
    WHERE keyword = '$keyword'";
    if (!$result = $db->query($sql)) {
      die ('There was an error running query[' . $connection->error . ']');
  }//end if
}//end if

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

      echo '<form action="modifyTheKeyword.php" method="POST" enctype="multipart/form-data">
      <br>
      <h3>Modify Keyword: '.$row["keyword"].'? </h3> <br>
      
      <div>
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" style=width:400px readonly><br>
      </div>
      
      <div>
        <label for="name">keyword</label>
        <input type="text" class="form-control" name="keyword" value="'.$row["keyword"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <br>
      <div class="text-left">
          <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Keyword</button>
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


