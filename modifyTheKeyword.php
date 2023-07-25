<?php

include_once 'db_configuration.php';

if (isset($_POST['keyword']) && isset($_POST['id'])){

    $keyword = mysqli_real_escape_string($db, $_POST['keyword']);
    $id = mysqli_real_escape_string($db, $_POST['id']);

    $sql = "UPDATE keywords
            SET
                keyword = '$keyword'
            WHERE
                id = '$id'";
                
    mysqli_query($db, $sql);
    header('location: keywords_list.php?keywordUpdated=Success');
}
?>

