<?php
    //Start session
    session_start();
    
    //Includes the connection global variables
    require_once '../includes/connection.php';
    
    //include the functions in the include folder
    require_once('../includes/functions.php');
    
    

    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of currency and Sanitize the POST value
         $currency_id = mysql_prep($_POST['currency']);
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM currencies WHERE currency_id='$currency_id'")
         or die("There was a problem while deleting the currency ... \n" . mysqli_error()); 
         
         // redirect back to options
         redirect_to("options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            redirect_to("options.php");
         }
?>