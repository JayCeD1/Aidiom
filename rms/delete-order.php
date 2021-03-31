<?php
	
    require_once 'includes/connection.php';
	
	require_once 'includes/functions.php';
	
 // check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($conn,"DELETE FROM orders_details WHERE order_id='$id'")
 or die("The order does not exist ... \n"); 
 
 // redirect back to the member index
 redirect_to("member-index.php");
 }
 else
 // if id isn't set, redirect back to member index
 {
 redirect_to("member-index.php");
 }
 
?>