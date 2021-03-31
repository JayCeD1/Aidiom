<?php
    //Start session
    session_start();
    
    require_once '../includes/connection.php';
    
    //include the functions in the include folder
    require_once('../includes/functions.php');
    

    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of quantity and Sanitize the POST value
         $quantity_id = mysql_prep($_POST['quantity']);
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM quantities WHERE quantity_id='$quantity_id'")
         or die("There was a problem while deleting the quantity ... \n" . mysqli_error()); 
         
         // redirect back to options
         redirect_to("options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            redirect_to("options.php");
         }
?>