<?php $page_title = 'Create a Topic'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="questions_list.php";
    verifyLogin($page);

?>

<div class="container">
    <!--Check why the topic creation failed and if Failed, display the error message-->
    <?php
    if(isset($_GET['create_topic_status'])){
        
        if($_GET["create_topic_status"] == "TOPIC_EXISTS"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - The topic you tried to create already exists, Please Try Again!</h3>';
        } else

        if($_GET["create_topic_status"] == "NOT_AN_IMAGE"){
            echo '<br><h3 align="center" class="bg-danger">ERROR - The file you specified is not an image!</h3>';
        } else

        if($_GET["create_topic_status"] == "IMAGE_IS_ALREADY_USED"){
            echo '<br><h3 align="center" class="bg-danger">ERROR - The image file name is already used for another topic!</h3>';
        } else

        if($_GET["create_topic_status"] == "FILE_IS_TOO_BIG"){
            echo '<br><h3 align="center" class="bg-danger">ERROR - The image file is too big to upload!</h3>';
        } else

        if($_GET["create_topic_status"] == "UNSUPPORTED_FILE_TYPE"){
            echo '<br><h3 align="center" class="bg-danger">ERROR - The image file type is not supported. Try jpg or gif or png!</h3>';
        }     

    }

    ?>
    <form action="createTheTopic.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 text-align="center">Create A Topic</h3> <br>
        <div align="left" class="text-left">
                <label for="safe_link">Topic Name</label>
                <input type="text"  name="topic" maxlength="50" size="45" required title="Please enter the question topic.">
        </div>

        <div align="left" class="text-left">
                <label for="safe_link">Image Name</label>
                <input type="file" name="fileToUpload" id="fileToUpload" maxlength="50" size="44" required title="Please enter the Image Name.">
        </div>

        <br>
        <div align="left" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Topic</button>
        </div>
        <br> <br>

    </form>
</div>

