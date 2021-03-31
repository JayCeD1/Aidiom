<?php
    //Start session
    session_start();
    
    //Include database constants details
    require_once('../includes/connection.php');
    
    //Includes the functions
    require_once '../includes/functions.php';
  
    
    //Sanitize the POST values
    $name = mysql_prep($_POST['name']);
    
    //define a default value for flag
    $flag_0 = 0;

    //Create INSERT query
    $qry = "INSERT INTO timezones(timezone_reference,flag) VALUES('$name','$flag_0')";
    $result = @mysqli_query($conn,$qry);
    
    //Check whether the query was successful or not
    if($result) {
        redirect_to("options.php");
        exit();
    }else {
        die("Query failed " . mysqli_error());
    }
 ?>