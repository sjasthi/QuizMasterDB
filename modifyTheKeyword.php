<?php

include_once 'db_configuration.php';

if (isset($_POST['keyword'])){

    $keyword = mysqli_real_escape_string($db, $_POST['keyword']);
    $keywordID = mysqli_real_escape_string($db, $_POST['id']);

    $sql = "UPDATE keywords
            SET
                keyword = '$keyword'
            WHERE
                keywordID = '$keywordID'";
                
    mysqli_query($db, $sql);
    header('location: keywords_list.php?keywordUpdated=Success');
}
?>
