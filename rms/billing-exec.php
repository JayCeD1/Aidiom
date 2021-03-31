<?php
	//Start session
	session_start();
	
	//Include database constants details
	require_once ('includes/connection.php');
	
	//Includes the functions
	require_once 'includes/functions.php';
	
	
	//Sanitize the POST values
	$StreetAddress = mysql_prep($_POST['sAddress']);
	$BoxNo = mysql_prep($_POST['box']);
	$City = mysql_prep($_POST['city']);
	$MobileNo = mysql_prep($_POST['mNumber']);
	$LandlineNo = mysql_prep($_POST['lNumber']);
	// check if the 'id' variable is set in URL

	// check if the 'id' variable is set in URL
	if (isset($_GET['id']))
	{
	// get id value
	$id = $_GET['id'];

	//Create INSERT query
	$qry = "INSERT INTO billing_details(member_id,Street_Address,P_O_Box_No,City,Mobile_No,Landline_No) VALUES('$id','$StreetAddress','$BoxNo','$City','$MobileNo','$LandlineNo')";
	mysqli_query($conn,$qry);
	
	//redirect to billing-success page
	redirect_to("billing-success.php");
	}else {
		die("Adding billing information failed! Please try again after a few minutes.");
	}
?>