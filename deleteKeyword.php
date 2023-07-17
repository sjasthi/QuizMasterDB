<?php $page_title = 'Quiz Master > Delete Keyword'; ?>
<?php include('header.php'); 
    $page="keywords_list.php";
    /*verifyLogin($page);*/

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>

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
        echo '<form action="deleteTheKeyword.php" method="POST">
    <br>
     <h2 id="title">Delete Keyword</h2><br>
    <h3>Delete Keyword: '.$row["keyword"].' </h3> <br>
    
    <div class="form-group col-md-4">
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" readonly>
    </div>
    
    <div class="form-group col-md-8">
      <label for="name">Keyword</label>
      <input type="text" class="form-control" name="keyword" value="'.$row["keyword"].'"  maxlength="255" readonly>
    </div>
       
    <br>
    <div class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Confirm Delete Keyword</button>
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


