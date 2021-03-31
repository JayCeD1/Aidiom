<?php
	//Start session
	session_start();
	
	//Include database constants details
	require_once('includes/connection.php');
	
	//Includes the functions
	require_once 'includes/functions.php';

	//checks whether submit is set
	if(isset($_POST['Submit']))
	{
	    $member_id = $_SESSION['SESS_MEMBER_ID']; //gets member id from session
        $food_id = mysql_prep($_POST['food']); //gets food id and sanitizes post value
        $scale_id = mysql_prep($_POST['scale']); //gets scale id and sanitizes post value
        
        //check whether there is duplication in the polls_details table
        $check = mysqli_query($conn,"SELECT * FROM polls_details WHERE member_id='$member_id' AND food_id='$food_id'") or die("Something is wrong.\n Our team is working on it at the moment.\n Please try again after some few minutes.");
        
        if(mysqli_num_rows($check)>0){
            redirect_to("ratings-failed.php");
        }
        else{
	        //Create INSERT query
	        $qry = "INSERT INTO polls_details(member_id,food_id,rate_id) VALUES('$member_id','$food_id','$scale_id')";
	        mysqli_query($conn,$qry);
	        
            if($qry){
	            redirect_to("ratings-success.php");
            }
            else{
                die("Rating failed! Please try again after some few minutes.");
            }
        }

	}else {
		die("Rating failed! Please try again after some few minutes.");
	}
?>