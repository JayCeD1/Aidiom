<?php
    //Start session
    session_start();
   
    require_once '../includes/connection.php';
    
    //Includes the functions
    require_once '../includes/functions.php';
    
    //Sanitize the POST values
    $name = mysql_prep($_POST['name']);

    //Create INSERT query
    $qry = "INSERT INTO tables(table_name) VALUES('$name')";
    $result = @mysqli_query($conn,$qry);
    
    //Check whether the query was successful or not
    if($result) {
        redirect_to("options.php");
        exit();
    }else {
        die("Query failed " . mysqli_error());
    }
 ?>