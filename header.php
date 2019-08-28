<?php

session_start();
if(!isset($page_title)) { $page_title = 'Quiz Master'; }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo htmlspecialchars($page_title);?></title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/publishersdb.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <style>#header{color: darkgoldenrod;}</style>
</head>
<body onload="displayAdminFields('admin1')">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <a href="index.php" title="SILC Quiz Master"><img id="silc" src="Images/index_images/silc_home.jpg"></a> 
            
            <!-- Login / Logout Nav menu item
               Checks if there is a valid session and if so displays "logout"
               If there isn's a valid session display login. -->

            <!-- End Login / Logout Nav menu item -->
        </ul>
        <!--<form class="form-inline my-2 my-lg-0" action="index.php" method="POST">
            <input class="form-control mr-sm-2" type="search" type="text" name="search" placeholder="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="submit-search">Search</button>
        </form>-->
        <ul class="navbar-nav mr-right">
        <li class="nav-item">
            <?php
            if (isset($_SESSION['role'])){
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="questions_list.php">Questions List<span class="sr-only">(current)</span></a>';
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="topics_list.php">Topics List<span class="sr-only">(current)</span></a>';
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="preferences.php">Preferences<span class="sr-only">(current)</span></a></li>';
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="about.php">About<span class="sr-only">(current)</span></a></li>';
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="help.php">Help<span class="sr-only">(current)</span></a></li>';
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="logout.php">Logout<span class="sr-only">(current)</span></a></li>';
            } else {
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="about.php">About<span class="sr-only">(current)</span></a></li>';
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="help.php">Help<span class="sr-only">(current)</span></a></li>';
                echo '<li class="nav-item active"><a class="nav-link" id="header" href="loginForm.php">Login<span class="sr-only">(current)</span></a></li>';
            }
            ?>
        </li>
        </ul>
    </div>
</nav>
