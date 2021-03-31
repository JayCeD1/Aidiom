<?php
	//Start session
	session_start();

	require_once('includes/connection.php');
	
	//Include functions in the includes folder
	require_once('includes/functions.php');

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	
	//Sanitize the POST values
	$login = mysql_prep($_POST['login']);
	$password = mysql_prep($_POST['password']);
	
	//Create query
	$qry="SELECT * FROM members WHERE login='$login' AND passwd='".md5($_POST['password'])."'";
	$result=mysqli_query($conn,$qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			session_write_close();
			redirect_to("member-index.php");
			exit();
		}else {
			//Login failed
			redirect_to("login-failed.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>