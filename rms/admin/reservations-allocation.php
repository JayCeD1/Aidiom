<?php
	
    require_once '../includes/connection.php';

	//Includes the functions
	require_once '../includes/functions.php';
	

	
	//Sanitize the POST values
	$ReservationID = mysql_prep($_POST['reservationid']);
	$StaffID = mysql_prep($_POST['staffid']);
	
    //define a default value for flag
    $flag_1 = 1;
 
     // update the entry
     $result = mysqli_query($conn,"UPDATE reservations_details SET StaffID='$StaffID', flag='$flag_1' WHERE ReservationID='$ReservationID'")
     or die("The reservation or staff does not exist ... \n" . mysqli_error()); 
     
     //check if query executed
     if($result) {
     // redirect back to the allocation page
     redirect_to("allocation.php");
     exit();
     }
     else
     // Gives an error
     {
     die("reservation allocation failed ..." . mysqli_error());
     }
 
?>