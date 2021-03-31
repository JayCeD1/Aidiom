<?php
    //Start session
    session_start();
    
    //includes the connection variables
   require_once '../includes/connection.php';
    
    //Includes the functions
    require_once '../includes/functions.php';
        

    
    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of currency and Sanitize the POST value
         $rate_id = mysql_prep($_POST['rating']);
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM ratings WHERE rate_id='$rate_id'")
         or die("There was a problem while deleting the rate name ... \n" . mysqli_error()); 
         
         // redirect back to options
         redirect_to("options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            redirect_to("options.php");
         }
?>