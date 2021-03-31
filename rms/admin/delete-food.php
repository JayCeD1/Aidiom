<?php
    //Start session
    session_start();
    
    require_once '../includes/connection.php';
   
    require_once '../includes/functions.php';
    
 
     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM food_details WHERE food_id='$id'")
         or die("There was a problem while removing the food ... \n" . mysqli_error()); 
         
         // redirect back to the foods page
         redirect_to(" foods.php");
         }
     else
     // if id isn't set, redirect back to the foods page
     {
        redirect_to("foods.php");
     }
 
?>