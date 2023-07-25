<?php

require 'bin/functions.php';
require 'db_configuration.php';

/**
 *  check whether the keyword to be created already exists in the database
 */
function keyword_exists_in_db($keyword, $db)
{
    $sql = "SELECT keyword FROM keywords WHERE keyword= '$keyword';";
    echo $sql;
    $result = mysqli_query($db, $sql);
    
    $count = mysqli_num_rows($result);

    echo "number of items found ";
    echo $count;

    $keyword_exists = ($count==1) ? true : false;
      
    return $keyword_exists;
}

if (isset($_POST['keyword'])) {

    //escape any special characters in the input string
    $keyword = strtolower(mysqli_real_escape_string($db, $_POST['keyword']));

    // check whether the keyword already exists in the DB
    $keyword_exists = keyword_exists_in_db($keyword, $db);
    echo "junk";
    echo $keyword_exists;

    // if the keyword exists, return to the list with an error message
    if ($keyword_exists == true) {
        exit(header('location: keywords_list.php?createKeyword=KEYWORD_EXISTS'));
    } else {
        // Make the first character of keyword capitalized
        $keyword = ucfirst($keyword);
        $sql = "INSERT INTO keywords (keyword) VALUES ('$keyword')";
        mysqli_query($db, $sql);

        exit(header('location: keywords_list.php?createKeyword=Success'));
    }

    // otherwise, pass the status code on why create failed

    exit(header('location: keywords_list.php?.php?createKeyword=Error'));
} //end if

?>