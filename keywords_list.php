<?php

require 'bin/functions.php';
require 'db_configuration.php';

$query = "SELECT keywords.keywordID, keywords.keyword , COUNT(question_keywords.questionID) AS linked_questions
         FROM keywords
         LEFT JOIN question_keywords ON keywords.keywordID = question_keywords.keywordID
         GROUP BY keywords.keywordID";

$GLOBALS['data'] = mysqli_query($db, $query);
?>

<?php $page_title = 'Quiz Master > Keywords'; ?>
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
            } elseif($_GET["createKeyword"] == "Error"){
                echo '<br><h3>Error! Failed to create keyword.</h3>';
            } elseif($_GET["createKeyword"] == "KEYWORD_EXISTS"){
                echo '<br><h3>Keyword already exists!</h3>';
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

    ?>
    <!-- Page Heading -->
    <h1 class="my-4">
        <?php
        //Display Admin view if an admin is logged in.
        //This gives full access to all CRUD functions
        ?>
    </h1>
    
    <div id="customerTableView">
        <button><a class="btn btn-sm" href="createKeyword.php">Create a Keyword</a></button>
        <table class="table table-striped" id="ceremoniesTable">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Keyword</th>
                    <th>Linked Questions</th>
                    <th>Modify Keyword</th>
                    <th>Delete Keyword</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if ($data->num_rows > 0) {
                    // output data of each row
                    while($row = $data->fetch_assoc()) {

                        $keywordID = $row["keywordID"];
                        $keyword = $row["keyword"];
                        $linked_questions = $row["linked_questions"];
    
                        echo '<tr>
                                <td>'. $keywordID .' </td>            
                                <td><a href="questions_for_keyword.php?keyword='.$keywordID.'">'.$keyword.'</a></span></td>
                                <td>'. $linked_questions .' </td> 
                                <td><a class="btn btn-warning btn-sm" href="modifyKeyword.php?keyword='.$row["keyword"].'">Modify</a></td>                                  
                                <td><a class="btn btn-danger btn-sm" href="deleteKeyword.php?keyword='.$row["keyword"].'">Delete</a></td> 
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else
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


