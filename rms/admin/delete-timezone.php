<?php
    //Start session
    session_start();
    
    require_once('../includes/connection.php');
    
    //Includes the functions
    require_once '../includes/functions.php';
    
    
    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of timezone and Sanitize the POST value
         $timezone_id = mysql_prep($_POST['timezone']);
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM timezones WHERE timezone_id='$timezone_id'")
         or die("There was a problem while deleting the timezone ... \n" . mysqli_error()); 
         
         // redirect back to options
         redirect_to("options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            redirect_to("options.php");
         }
?>