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
         $result = mysqli_query($conn,"DELETE FROM messages WHERE message_id='$id'")
         or die("There was a problem while removing the message ... \n" . mysqli_error()); 
         
         // redirect back to the messages page
         redirect_to("messages.php");
         }
     else
     // if id isn't set, redirect back to the messages page
     {
        redirect_to("messages.php");
     }
 
?>