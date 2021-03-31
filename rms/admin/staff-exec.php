<?php
	//Start session
	session_start();
	
	//Include database constants details
	require_once('constants/config.php');
	
	//Includes the functions
	require_once '../includes/functions.php';
	
	//Connect to mysqli server
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	if(!$conn) {
		die('Failed to connect to server: ' . mysqli_error());
	}

	
	//Sanitize the POST values
	$FirstName = mysql_prep($_POST['fName']);
	$LastName = mysql_prep($_POST['lName']);
	$StreetAddress = mysql_prep($_POST['sAddress']);
	$MobileNo = mysql_prep($_POST['mobile']);
	

	//Create INSERT query
	$qry = "INSERT INTO staff(firstname,lastname,Street_Address,Mobile_Tel) VALUES('$FirstName','$LastName','$StreetAddress','$MobileNo')";
	$result = @mysqli_query($conn,$qry);
	
	//Check whether the query was successful or not
	if($result) {
		redirect_to('allocation.php');
		echo "<html><script language='JavaScript'>alert('Staff information added successifully.')</script></html>";
		exit();
	}else {
		die("Adding staff information failed ... " . mysqli_error());
	}
?>