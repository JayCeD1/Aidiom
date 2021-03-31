<?php
    //Start session
    session_start();
    
    require_once('../includes/connection.php');
    
    //Includes the functions
    require_once '../includes/functions.php';
     
    
    
    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of table and Sanitize the POST value
         $table_id = mysql_prep($_POST['table']);
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM tables WHERE table_id='$table_id'")
         or die("There was a problem while deleting the table ... \n" . mysqli_error()); 
         
         // redirect back to options
         redirect_to("options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            redirect_to("options.php");
         }
?>