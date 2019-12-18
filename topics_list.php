<?php

require 'bin/functions.php';
require 'db_configuration.php';

$query = "SELECT * FROM topics";

$GLOBALS['data'] = mysqli_query($db, $query);
// $GLOBALS['topic'] = mysqli_query($db, $query);
// $GLOBALS['image_name'] = mysqli_query($db, $query);
?>

<?php $page_title = 'Topic List'; ?>
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
        if(isset($_GET['createQuestion'])){
            if($_GET["createQuestion"] == "Success"){
                echo '<br><h3>Success! Your question has been added!</h3>';
            }
        }

        if(isset($_GET['questionUpdated'])){
            if($_GET["questionUpdated"] == "Success"){
                echo '<br><h3>Success! Your question has been modified!</h3>';
            }
        }

        if(isset($_GET['questionDeleted'])){
            if($_GET["questionDeleted"] == "Success"){
                echo '<br><h3>Success! Your question has been deleted!</h3>';
            }
        }

        if(isset($_GET['createTopic'])){
            if($_GET["createTopic"] == "Success"){
                echo '<br><h3>Success! Your topic has been added!</h3>';
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

        <button><a class="btn btn-sm" href="createTopic.php">Create a Topic</a></button>
        <table class="table table-striped" id="ceremoniesTable">
            <div class="table responsive">
                <thead>
                <tr>

                    <th>ID</th>
                    <th>Topic</th>
                    <th>Image Name</th>
                    <th>Modify Topic</th>
                    <th>Delete Topic</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if ($data->num_rows > 0) {
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["order"].' </td>            
                                <td>'.$row["topic"].' </span> </td>
                                <td><img class="thumbnailSize" src="'.'Images/index_images/'.$row["image_name"].'" alt="'.$row["image_name"].'"></td>
                                <td><a class="btn btn-warning btn-sm" href="modifyTopic.php?topic='.$row["topic"].'">Modify</a></td>                                  
                                <td><a class="btn btn-danger btn-sm" href="deleteTopic.php?topic='.$row["topic"].'">Delete</a></td> 
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
    <p>Created for ICS 325 Summer Project "Team Alligators"</p>
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
