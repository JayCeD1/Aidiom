<?php
    //Start session
    session_start();
   
    require_once '../includes/connection.php';
    
    //Includes the functions
    require_once '../includes/functions.php';
    
  
   
    
    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of question and Sanitize the POST value
         $question_id = mysql_prep($_POST['question']);
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM questions WHERE question_id='$question_id'")
         or die("There was a problem while deleting the question ... \n" . mysqli_error()); 
         
         // redirect back to options
         redirect_to("options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            redirect_to("options.php");
         }
?>