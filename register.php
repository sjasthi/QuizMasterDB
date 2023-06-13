<?php
/* User register process, checks if user exists and create new user  */

// Escape email to protect against SQL injections
$first_name = $db->escape_string($_POST['firstname']);
$last_name = $db->escape_string($_POST['lastname']);
$email = $db->escape_string($_POST['email']);
$pass = $db->escape_string($_POST['password']);

//Set default new account with active->yes and role->student
$active = 'yes';
$role = 'student';
$modified_time = date('Y-m-d', strtotime('0000-00-00'));
$created_time = date('Y-m-d'); // Get current date
// Password hashing
$hash = password_hash($pass, PASSWORD_DEFAULT);
$result = $db->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $user = $result->fetch_assoc();

    $sql="INSERT INTO users (first_name, last_name, email, hash, active, role,modified_time, created_time)
            VALUES ('$first_name', '$last_name', '$email', '$hash', '$active', '$role', '$modified_time', '$created_time')";

    // Check for successfully inserted then return to index.php
    if ($db->query($sql) == true){
        $_SESSION['message'] = "Registration sucessfully!";
        header("location: index.php");
    }
    else {
        $_SESSION['message'] = "Error creating new user!";
        header("location: error.php");
    }
}
else { // User exists
    $_SESSION['message'] = "User with that email already exists!";
    header("location: error.php");
}