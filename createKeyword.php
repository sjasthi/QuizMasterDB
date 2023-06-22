<?php $page_title = 'Quiz Master > Create Keyword'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="keywords_list.php";
    verifyLogin($page);

?>
<link href="css/form.css" rel="stylesheet">
<style>#title {text-align: center; color: darkgoldenrod;}</style>

<div class="container">
    <!--Check why the keyword creation failed and if Failed, display the error message-->
    <?php
    if(isset($_GET['create_keyword_status'])){
        
        if($_GET["create_keyword_status"] == "KEYWORD_EXISTS"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - The keyword you tried to create already exists, Please Try Again!</h3>';
        }
    }

    ?>
    <form action="createTheKeyword.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 id="title">Create A Keyword</h3> <br>
        <table>
        <tr>
            <td style="width:100px">Keyword:</td>
            <td><input type="text"  name="keyword" maxlength="100" size="50" required title="Please enter a keyword."></td>
        </tr>
        </table>

        <br><br>
        <div align="center" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Keyword</button>
        </div>
        <br> <br>
    </form>
</div>

