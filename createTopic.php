<?php $page_title = 'Create a Topic'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="questions_list.php";
    verifyLogin($page);

?>

<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    if(isset($_GET['createTopic'])){
        if($_GET["createTopic"] == "topicFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - The topic you tried to create already exists, Please Try Again!</h3>';
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

