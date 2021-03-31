<?php
	//Start session
	//session_start();
	
	require_once('auth.php');
	
	require_once 'includes/connection.php';
	
	require_once 'includes/functions.php';
	
	
	
    //get member_id from session
    $member_id = $_SESSION['SESS_MEMBER_ID'];
    
    //checks whether the member has a billing address setup
    //get the billing_id from the billing_details table based on the member_id in auth.php
    $qry_select=mysqli_query($conn,"SELECT * FROM billing_details WHERE member_id='$member_id'")
    or die("The system is experiencing technical issues.\n Our team is working on it.\nPlease try again after some few minutes.");
    
    if(mysqli_num_rows($qry_select)>0 && isset($_GET['id'])){
	
	        //get cart_id
	        $id = $_GET['id'];
            
	        //define default values for flag_0 and flag_1
            $flag_0 = 0;
            $flag_1 = 1;
            
            //retrive a timezone from the timezones table
            $timezones=mysqli_query($conn,"SELECT * FROM timezones WHERE flag='$flag_1'")
            or die("Something is wrong. \n Our team is working on it at the moment.\n Please check back after some few minutes.");
            
            $row=mysqli_fetch_assoc($timezones); //gets retrieved row
            
            $active_reference = $row['timezone_reference']; //gets active timezone
            
           // date_default_timezone_set($active_reference); //sets the default timezone for use
            
            $time_stamp = date("H:i:s"); //gets the current time
            
            $delivery_date = date("Y-m-d"); //gets the current date
	        
	        //storing the billing_id into a variable
	        $row=mysqli_fetch_array($qry_select);
	        $billing_id=$row['billing_id'];

	        $staff = 4;
	        
	        //Create INSERT query
	        $qry_create = "INSERT INTO orders_details(member_id,billing_id,cart_id,delivery_date,staffID,flag,time_stamp) VALUES('$member_id','$billing_id','$id','$delivery_date','$staff','$flag_0','$time_stamp')";
	        mysqli_query($conn,$qry_create);
            
            //Create UPDATE query (updates flag value in the cart_details table)
	        $qry_update = "UPDATE cart_details SET flag='$flag_1' WHERE cart_id='$id' AND member_id='$member_id'";
            mysqli_query($conn,$qry_update);
            
	        redirect_to("member-index.php");
		    
    }else {
	        redirect_to("billing-alternative.php"); //redirects to billing-alternative.php if not setup
	    }
?>