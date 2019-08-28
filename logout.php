<?php
session_start();
/* Log out process, unsets and destroys session variables */
// echo "session_status(): " . session_status();
$was_logged_in = false;
if (session_status() == 2) {
  // session_status() value of 2 means a session is active
  if (isset($_SESSION['role']) == true) {
    $was_logged_in = true; // session value "role" is set when the user is logged in
  }
  session_unset();
  session_destroy();
}
header('location: index.php');
?>

