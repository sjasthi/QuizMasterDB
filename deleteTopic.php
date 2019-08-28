<?php $page_title = 'Quiz Master > Delete Topic'; ?>
<?php include('header.php'); 
    $page="questions_list.php";
    /*verifyLogin($page);*/

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>

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
        echo '<form action="deleteTheTopic.php" method="POST">
    <br>
     <h2 id="title">Delete Topic</h2><br>
    <h3>Delete Question: '.$row["topic"].' </h3> <br>
    
    <div class="form-group col-md-4">
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["order"].'"  maxlength="5" readonly>
    </div>
    
    <div class="form-group col-md-8">
      <label for="name">Topic</label>
      <input type="text" class="form-control" name="topic" value="'.$row["topic"].'"  maxlength="255" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="cadence">Image Path</label>
      <input type="text" class="form-control" name="image_name" value="'.$row["image_name"].'"  maxlength="255" readonly>
    </div>
           
    <br>
    <div class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Confirm Delete topic</button>
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


