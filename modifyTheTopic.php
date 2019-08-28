<?php

include_once 'db_configuration.php';

if (isset($_POST['topic'])){

    $topic = mysqli_real_escape_string($db, $_POST['topic']);
    $id = mysqli_real_escape_string($db, $_POST['id']);

    $imageName = basename($_FILES["fileToUpload"]["name"]);

    if($imageName != ""){
        
        $target_file = $imageName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                header('location: createQuestion.php?createQuestion=fileRealFailed');
                $uploadOk = 0;
            }
        }
        /*
        // Check if file already exists
        if (file_exists($target_file)) {
            header('location: createQuestion.php?createQuestion=fileExistFailed');
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            header('location: createQuestion.php?createQuestion=fileSizeFailed');
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: createQuestion.php?createQuestion=fileTypeFailed');
            $uploadOk = 0;
       
        } 
        */
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo $target_file;       
                $sql = "UPDATE topics
                SET 
                    topic = '$topic',

                    image_name = '$target_file'        
                
                WHERE id = '$id'";

                mysqli_query($db, $sql);
                header('location: topics_list.php?topicUpdated=Success');
                }
            }
    }
            else{
             
            $sql = "UPDATE topics
            SET 
                topic= '$topic',            
            
            WHERE id = '$id'";

            mysqli_query($db, $sql);
            
            header('location: topics_list.php?topicUpdated=Success');
            }

        
        
}//end if
?>
