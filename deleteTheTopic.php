<?php

include_once 'db_configuration.php';

if (isset($_POST['topic'])){

    $topic = mysqli_real_escape_string($db, $_POST['topic']);
    $image_name = mysqli_real_escape_string($db, $_POST['image_name']);
 
    $sql = "SELECT * FROM `questions` where topic= '$topic' ";



    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if

  
  if ($result->num_rows > 0) {
    echo '<script language="javascript">';
    echo 'alert("Can not delete this topic because it associated with one or more questions");';
    echo ' history.go(-2); </script>';

    }
    else {
        $sql = "DELETE FROM topics
        WHERE topic = '$topic'";
            $sql2 ="SELECT * From topics where topic = '$topic'";
            $GLOBALS['topic'] = mysqli_query($db, $sql2);
            $GLOBALS['image_name'] = mysqli_query($db, $sql2);
        
            $file=$row["image_name"];
           
            unlink($image_name);

mysqli_query($db, $sql);
header('location: topics_list.php?topicDeleted=Success');

    }
 
}//end if
?>

