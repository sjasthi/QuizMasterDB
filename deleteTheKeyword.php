<?php

include_once 'db_configuration.php';

if (isset($_POST['keyword'])){

    $keyword = mysqli_real_escape_string($db, $_POST['keyword']);

    $sql = "DELETE FROM keywords
            WHERE keyword = '$keyword'";

    mysqli_query($db, $sql);
    header('location: keywords_list.php?keywordDeleted=Success');
}//end if
?>

