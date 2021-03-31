<?php
// Start session
session_start();

require_once '../includes/connection.php';

// Include functions in the includes folder
require_once ('../includes/functions.php');

// Array to store validation errors
$errmsg_arr = array();

// Validation error flag
$errflag = false;



// Sanitize the POST values
$login = mysql_prep($_POST['login']);
$password = mysql_prep($_POST['password']);

// Input Validations
if ($login == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

// If there are input validations, redirect back to the login form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    redirect_to("login-form.php");
    exit();
}

// Create query
$qry = "SELECT * FROM pizza_admin WHERE Username='$login' AND Password='$password'";
$result = mysqli_query($conn, $qry);

// Check whether the query was successful or not
if ($result) {
    if (mysqli_num_rows($result) == 1) {
        // Login Successful
        session_regenerate_id();
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_ADMIN_ID'] = $member['Admin_ID'];
        $_SESSION['SESS_ADMIN_NAME'] = $member['Username'];
        session_write_close();
        redirect_to("index.php");
        exit();
    } else {
        // Login failed
        redirect_to("login-failed.php");
        exit();
    }
} else {
    die("Query failed");
}
?>