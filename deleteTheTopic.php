<?php

include_once 'db_configuration.php';

if (isset($_POST['topic'])){

    $topic = mysqli_real_escape_string($db, $_POST['topic']);
    $image_name = mysqli_real_escape_string($db, $_POST['image_name']);
    
    $sql = "DELETE FROM topics
    WHERE `topic` = '$topic'";

    // Delete image file
    if(file_exists($image_name)){
        unlink($image_name);
    }
    
    mysqli_query($db, $sql);
    header('location: topics_list.php?topicDeleted=Success');
    exit;
}
?>

