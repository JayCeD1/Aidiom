<?php
    //Start session
    session_start();
    
    //Include database constants details
    require_once('constants/config.php');
    
    //Include the functions
    require_once '../includes/functions.php';
    
    //Connect to mysqli server
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    if(!$conn) {
        die('Failed to connect to server: ' . mysqli_error());
    }
    
    //Sanitize the POST values
    $name = mysql_prep($_POST['name']);

    //Create INSERT query
    $qry = "INSERT INTO categories(category_name) VALUES('$name')";
    $result = @mysqli_query($conn,$qry);
    
    //Check whether the query was successful or not
    if($result) {
        header("location: options.php");
        exit();
    }else {
        die("Query failed " . mysqli_error());
    }
 ?>