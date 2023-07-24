<?php

include_once 'db_configuration.php';

if (isset($_POST['topic'])){

    $topic = mysqli_real_escape_string($db, $_POST['topic']);
    $question = mysqli_real_escape_string($db,$_POST['question']);
    $choice1 = mysqli_real_escape_string($db,$_POST['choice_1']);
    $choice2 = mysqli_real_escape_string($db,$_POST['choice_2']);
    $choice3 = mysqli_real_escape_string($db,$_POST['choice_3']);
    $choice4 = mysqli_real_escape_string($db,$_POST['choice_4']);
    $answer = mysqli_real_escape_string($db,$_POST['answer']);
    $imageName = basename($_FILES["fileToUpload"]["name"]);

        // check for empty file
    if(empty($_FILES['fileToUpload']['name'])) {
        header('Location: createQuestion.php?createQuestion=noFileSelected');
        exit();
    }

    $imageName = basename($_FILES["fileToUpload"]["name"]);
    // Create keyword array
    $keywords = array();

    if(isset($_POST['keyword']) && is_array($_POST['keyword'])){
        foreach($_POST['keyword'] as $selectedKeyword){
            $keyword = mysqli_real_escape_string($db, $selectedKeyword);
            $keywords[]  = $keyword;
        }
    }

    $validate = true;
    $validate = emailValidate($answer);
    
    
    if($validate){
        
        $target_dir = "Images/$topic/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
        // Check if file already exists
        if (file_exists($target_file)) {
            header('location: createQuestion.php?createQuestion=fileExistFailed');
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: createQuestion.php?createQuestion=fileTypeFailed');
            $uploadOk = 0;
        }

        if(!is_dir($target_dir)){
            mkdir($target_dir, 0777, true);
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
                $sql = "INSERT INTO questions(topic,question,choice_1,choice_2,choice_3,choice_4,answer,image_name)
                VALUES ('$topic','$question','$choice1','$choice2','$choice3','$choice4','$answer','$target_file')
                ";
                
                mysqli_query($db, $sql);
                
                $question_id = mysqli_insert_id($db);

                foreach($keywords as $keyword){
                    $keyword = mysqli_real_escape_string($db, $keyword);
                    $keywordID_Query = "SELECT id FROM keywords WHERE keyword = '$keyword'";
                    $keywordID_Query_Result = mysqli_query($db, $keywordID_Query);

                    if($keywordID_Query_Result && mysqli_num_rows($keywordID_Query_Result) > 0){
                        $keywordIDRow = mysqli_fetch_assoc($keywordID_Query_Result);
                        $keywordID = $keywordIDRow['id'];

                        // Mapping question and keyword
                        $mapKeywordQuery = "INSERT INTO question_keywords(question_id, keyword_id) VALUES ('$question_id', '$keywordID')";
                        mysqli_query($db, $mapKeywordQuery);
                    }

                }           

                header('location: questions_list.php?createQuestion=Success');
                }
            }
        }else{
            header('location: createQuestion.php?createQuestion=answerFailed'); 
        }        

    }//end if

function emailValidate($answer){
    global $choice1,$choice2,$choice3,$choice4;
    if($answer == $choice1 or $answer == $choice2 or $answer == $choice3 or $answer == $choice4){
        return true;
    }else{
        return false;
    }      
}


?>