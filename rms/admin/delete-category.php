<?php
    //Start session
    session_start();
    
    //Includes the connection global variables
    require_once '../includes/connection.php';
    
    //checking constants and connecting to a database
    require_once('constants/config.php');
    
    //include the functions in the include folder
    require_once('../includes/functions.php');
    
   
 
    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of category and Sanitize the POST values
         $category_id = mysql_prep($_POST['category']);
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM categories WHERE category_id='$category_id'")
         or die("There was a problem while deleting the category ... \n" . mysqli_error()); 
         
         // redirect back to options
         redirect_to("options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            redirect_to("options.php");
         }
     
 
     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];
         
         // delete the entry
         $result = mysqli_query($conn,"DELETE FROM categories WHERE category_id='$id'")
         or die("There was a problem while deleting the category ... \n" . mysqli_error()); 
         
         // redirect back to the categories
         redirect_to("categories.php");
     }
     else
        // if id isn't set, redirect back to the categories
     {
        redirect_to("Location: categories.php");
     }
 
?>