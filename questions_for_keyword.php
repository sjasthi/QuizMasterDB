<?php

require 'bin/functions.php';
require 'db_configuration.php';

// Check if the keyword parameter is provided
if (isset($_GET['keyword'])) {
    $keywordID = $_GET['keyword'];


    // Query the keyword text from the keywords table
    $query = "SELECT keyword FROM keywords WHERE id = '$keywordID'";
    $keywordResult = mysqli_query($db, $query);
    $keywordRow = mysqli_fetch_assoc($keywordResult);
    $keywordText = $keywordRow['keyword'];


// Query the questions related to the keyword
$questionQuery = "SELECT q.*, k.*
                  FROM questions q
                  JOIN question_keywords qk ON q.id = qk.question_id
                  JOIN keywords k ON qk.keyword_id = k.id
                  WHERE qk.keyword_id = '$keywordID'";
} else {
    // Redirect to the keywords_list.php page if the keyword parameter is not provided
    header("Location: keywords_list.php");
    exit();
}
?>

<?php $page_title = 'Questions Related to Keyword'; ?>
<?php include('header.php'); ?>

<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
    thead input {
        width: 100%;
    }
    .thumbnailSize{
        height: 100px;
        width: 100px;
        transition:transform 0.25s ease;
    }
    .thumbnailSize:hover {
        -webkit-transform:scale(3.5);
        transform:scale(3.5);
    }
</style>

<!-- Page Content -->
<br><br>
<div class="container-fluid">
    <?php
        if(isset($_GET['createKeyword'])){
            if($_GET["createKeyword"] == "Success"){
                echo '<br><h3>Success! Your keyword has been added!</h3>';
            }
        }

        if(isset($_GET['keywordUpdated'])){
            if($_GET["keywordUpdated"] == "Success"){
                echo '<br><h3>Success! Your keyword has been modified!</h3>';
            }
        }

        if(isset($_GET['keywordDeleted'])){
            if($_GET["keywordDeleted"] == "Success"){
                echo '<br><h3>Success! Your keyword has been deleted!</h3>';
            }
        }

        if(isset($_GET['createKeyword'])){
            if($_GET["createKeyword"] == "Success"){
                echo '<br><h3>Success! Your keyword has been added!</h3>';
            }
        }
    ?>
    <!-- Page Heading -->
    <h1 class="my-4">
        <?php
        //Display Admin view if an admin is logged in.
        //This gives full access to all CRUD functions
        ?>
    </h1>
    
    <div id="customerTableView">

        <!-- <button><a class="btn btn-sm" href="createTopic.php">Create a Topic</a></button> -->
        <table class="table table-striped" id="ceremoniesTable">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic</th>
                    <th>Question</th>
                    <th>Keywords</th>
                    <th>Modify Keyword</th>
                    <th>Delete Keyword</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($questionsResult) {
                    if ($questionsResult->num_rows > 0){
                        while ($row = $questionsResult->fetch_assoc()){
                            echo '<tr>
                            <td>'.$row["id"].' </td>
                            <td>'.$row["topic"].' </span> </td>
                            <td>'.$row["question"].'</td>
                            <td>'.$row["keyword"].'</td>        
                            <td><a class="btn btn-warning btn-sm" href="modifyKeyword.php?keyword='.$row["keywordID"].'">Modify</a></td>                                  
                            <td><a class="btn btn-danger btn-sm" href="deleteKeyword.php?keyword='.$row["keywordID"].'">Delete</a></td> 
                            </tr>';
                        }// end while loop
                    } else {
                        echo '<p>No questions found related to this keyword.</p>';
                    }
                } else {
                    echo '<p>Error: Failed to retrieve questions.</p>';
                }
                ?>            
                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->
<footer class="page-footer text-center">
    <p>Created for ICS 499 Summer Project "Team Bears"</p>
</footer>

<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--Data Table-->
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>


<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        $('#tableResults').DataTable( {
            dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv' , 'pdf'
                ] }
        );

        $('#ceremoniesTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );
    } );
</script>
</body>
</html>


