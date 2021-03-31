<?php
	//Start session
	session_start();
	
	
	require_once('includes/connection.php');
	
	//include the functions in the include folder
	require_once('includes/functions.php');

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
		
	
	//Sanitize the POST values
	$fname = mysql_prep($_POST['fname']);
	$lname = mysql_prep($_POST['lname']);
	$login = mysql_prep($_POST['login']);
	$password = mysql_prep($_POST['password']);
	$cpassword = mysql_prep($_POST['cpassword']);
    $question_id = mysql_prep($_POST['question']);
    $answer = mysql_prep($_POST['answer']);
    
    //check whether an account with a given email exists
    $qry_select="SELECT * FROM members WHERE login='$login'";
    $result_select=mysqli_query($conn,$qry_select);
    if(mysqli_num_rows($result_select)>0){
        redirect_to("register-failed.php");
        exit();
    }
    else{
	    //Create INSERT query
	    $qry = "INSERT INTO members(firstname, lastname, login, passwd, question_id, answer) 
                VALUES('$fname','$lname','$login','".md5($_POST['password'])."','$question_id','".md5($_POST['answer'])."')";
	    $result = mysqli_query($conn,$qry);
	    
	    //Check whether the query was successful or not
	    if($result) {
		    redirect_to("register-success.php");
		    exit();
	    }else {
		    die("Something went wrong.\n Our team is working on it at the  moment.\n Please try again after some few minutes.");
	    }
    }
?>