<?php
	//Start session
	session_start();
	
	//Include database constants details
	require_once('includes/connection.php');
	
	//Includes the functions
	require_once 'includes/functions.php';
	

	//Sanitize the POST values
    $partyhall_id = 0;
    $table_id = 0;
    $partyhall_flag = 0;
    $table_flag = 0;
    
    if(isset($_POST['table'])){
        $table_id = mysql_prep($_POST['table']);
        $table_flag = 1;
        $phd = $_POST['table'];
    
	    $q = "SELECT * FROM reservations_details WHERE table_id = '$phd' and date(Reserve_Date) = '".$_POST['date']."'  ";

        $res = mysqli_query($conn,$q);

	    if(mysqli_num_rows($res) > 0){
	  
	    	redirect_to("booked.php");
	    }else{
		    	$date = mysql_prep($_POST['date']);
				$time = mysql_prep($_POST['time']);
				$staff = 5;
				$flag = 0;
	     


		//check if the id is set at the link
			if (isset($_GET['id'])){

				
			    //get user id
			    $id = $_GET['id'];
			    
			    //Create INSERT query
			    $qry = "INSERT INTO reservations_details(member_id,table_id,partyhall_id,Reserve_Date,Reserve_Time,staffID,table_flag,partyhall_flag,flag) VALUES('$id','$table_id','$partyhall_id','$date','$time','$staff','$table_flag','$partyhall_flag','$flag')";
			    mysqli_query($conn,$qry); 
			    
			    //redirect to the reserve success page
			    redirect_to("reserve-success.php");

			}else {
				die("Reservation failed! Please try again after a few minutes.");
			}

	   }
    

    }else if(isset($_POST['partyhall'])){
        $partyhall_id = mysql_prep($_POST['partyhall']);
        $partyhall_flag = 1;

        $phd = $_POST['partyhall'];
    
	    $q = "SELECT * FROM reservations_details WHERE partyhall_id = '$phd' ";
        $res = mysqli_query($conn,$q);
	    if(mysqli_num_rows($res) == 1){
	  
	    	redirect_to("booked.php");
	    }else{

	    	$date = mysql_prep($_POST['date']);
			$time = mysql_prep($_POST['time']);
			$staff = 5;
			$flag = 0;
     


	//check if the id is set at the link
		if (isset($_GET['id'])){

			
		    //get user id
		    $id = $_GET['id'];
		    
		    //Create INSERT query
		    $qry = "INSERT INTO reservations_details(member_id,table_id,partyhall_id,Reserve_Date,Reserve_Time,staffID,table_flag,partyhall_flag,flag) VALUES('$id','$table_id','$partyhall_id','$date','$time','$staff','$table_flag','$partyhall_flag','$flag')";
		    mysqli_query($conn,$qry); 
		    
		    //redirect to the reserve success page
		    redirect_to("reserve-success.php");

		}else {
			die("Reservation failed! Please try again after a few minutes.");
		}

	}

}


	
    
	
?>