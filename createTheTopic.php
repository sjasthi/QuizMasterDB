<?php

require 'bin/functions.php';
require 'db_configuration.php';

// if you want to see the var_dump
// comment the lines starting with "exit(header(location ...."))
// these lines are redirecting the control to other page. 
echo '<pre>';
var_dump($_FILES);
echo '</pre>';

/**
 *  check whether the topic to be created already exists in the database
 */
function topic_exists_in_db($topic, $db)
{
    $sql = "SELECT topic FROM topics WHERE topic= '$topic';";
    echo $sql;
    $result = mysqli_query($db, $sql);
    
    $count = mysqli_num_rows($result);

    echo "number of items found ";
    echo $count;

    $topic_exists = ($count==1) ? true : false;
      
    return $topic_exists;
}



if (isset($_POST['topic'])) {

    //escape any special characters in the input string
    $topic = mysqli_real_escape_string($db, $_POST['topic']);

    // check whether the topic already exists in the DB
    $topic_exists = topic_exists_in_db($topic, $db);
    echo "junk";
    echo $topic_exists;

    // if the topic exists, return to the list with an error message
    if ($topic_exists == true) {
        exit(header('location: createTopic.php?createTopic=TOPIC_EXISTS'));
    }


    // if the topic doesn't exist, then we are good to create it
    // validating the image being submitted
    $original_file= $_FILES["fileToUpload"]["name"];
    $tmp_file = $_FILES["fileToUpload"]["tmp_name"];
    $target_dir = "Images/index_images/";
    $file = basename($original_file);
    $target_file = $target_dir.$file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    echo $file;
    echo $target_file;

    // it is ok to upload; start with this assumption
    $status_code = "OK";

    // Check if image file is a actual image or fake image
    $image = getimagesize($tmp_file) ? true : false;
    if ($image == false) {
        $status_code = "NOT_AN_IMAGE";
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $status_code = "IMAGE_IS_ALREADY_USED";
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $status_code = "FILE_IS_TOO_BIG";
    }
    // check for the file type (jpg, png, jpeg and gif are allowed) 
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $status_code = "UNSUPPORTED_FILE_TYPE";
    }

    // Check if $uploadOk is set to 0 by an error
    if (strcmp($status_code, "OK") == 0) {
        $file_moved = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        if ($file_moved == true) {
            $sql = "INSERT INTO topics (topic,image_name) VALUES ('$topic','$file')";
            mysqli_query($db, $sql);
            exit(header('location: topics_list.php?create_topic_status=SUCCESS'));
        }
    } 

    // otherwise, pass the status code on why create failed
    exit(header('location: createTopic.php?.php?create_topic_status='.$status_code));

} //end if

?>