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
         $result = mysqli_query($conn,"DELETE FROM orders_details WHERE order_id='$id'")
         or die("There was a problem while deleting the order ... \n" . mysqli_error()); 
         
         // redirect back to the orders
         redirect_to("orders.php");
     }
     else
        // if id isn't set, redirect back to the orders
     {
        redirect_to("orders.php");
     }
 
?>