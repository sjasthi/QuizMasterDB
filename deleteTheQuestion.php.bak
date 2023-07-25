<?php

include_once 'db_configuration.php';

if (isset($_POST['id'])){

    $id = mysqli_real_escape_string($db, $_POST['id']);
    $file = mysqli_real_escape_string($db, $_POST['image_name']);

    unlink($file);

    $sql = "DELETE FROM questions
            WHERE id = '$id'";

    mysqli_query($db, $sql);
    header('location: questions_list.php?questionDeleted=Success');
}//end if
?>

