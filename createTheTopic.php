<?php

include_once 'db_configuration.php';

if (isset($_POST['topic'])){

    $topic = mysqli_real_escape_string($db, $_POST['topic']);
    
    $validate = topicValidate($topic);
    
    
    if($validate){
        echo "here";
        $target_dir = "Images/index_images/";
        $file = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                header('location: createTopic.php?createQuestion=fileRealFailed');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            header('location: createTopic.php?createQuestion=fileExistFailed');
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            header('location: createTopic.php?createQuestion=fileSizeFailed');
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: createTopic.php?createQuestion=fileTypeFailed');
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO topics(topic,image_name)
                VALUES ('$topic','$file')
                ";

                mysqli_query($db, $sql);
                header('location: questions_list.php?createTopic=Success');
                }     
            }
        }else{
        header('location: createTopic.php?createTopic=topicFailed');
    }

}//end if

function topicValidate($topic){
    $mysqli = NEW MySQLi('localhost','root','','quiz_master');
    $resultset = $mysqli->query("SELECT topic FROM topics ORDER BY topic ASC");
    while($row = mysqli_fetch_assoc($resultset)){
        $topics[] = $row['topic'];
    }  
    for($a=0;$a<count($topics);$a++){
        if (in_array(strtolower($topic), array_map('strtolower', $topics))) {
            return false;
        }else{
            return true;
        }
    }
}
?>