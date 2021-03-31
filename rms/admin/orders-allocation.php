<?php

    require_once '../includes/connection.php';
	
	//Include the functions 
	require_once '../includes/functions.php';
	

    //define default value for flag
    $flag_1 = 1;
	
	//Sanitize the POST values
	$OrderID = mysql_prep($_POST['orderid']);
	$StaffID = mysql_prep($_POST['staffid']);
	
 
     // update the entry
     $result = mysqli_query($conn,"UPDATE orders_details SET StaffID='$StaffID', flag='$flag_1' WHERE order_id='$OrderID'")
     or die("The order or staff does not exist ... \n" . mysqli_error()); 
     
     //check if query executed
     if($result) {
     // redirect back to the allocation page
     redirect_to("allocation.php");
     exit();
     }
     else
     // Gives an error
     {
     die("order allocation failed ..." . mysqli_error());
     }
 
?>