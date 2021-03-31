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
     $result = mysqli_query($conn,"DELETE FROM staff WHERE StaffID='$id'")
     or die("The staff does not exist ... \n"); 
     
     // redirect back to the allocation page
     redirect_to("allocation.php");
     }
     else
     // if id isn't set, redirect back to allocation page
     {
     redirect_to("allocation.php");
     }
 
?>