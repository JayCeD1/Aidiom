<?php
	//checking constants and connecting to a database
	require_once('includes/connection.php');
	
	//Includes the functions
	require_once 'includes/functions.php';

	//Sanitize the POST values
	$OldPassword = mysql_prep($_POST['opassword']);
	$NewPassword = mysql_prep($_POST['npassword']);
	$ConfirmNewPassword = mysql_prep($_POST['cpassword']);
	
     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];
       
         // update the entry
         $result = mysqli_query($conn,"UPDATE members SET passwd='".md5($_POST['npassword'])."' WHERE member_id='$id' 
                                        AND passwd='".md5($_POST['opassword'])."'")
         or die("Password changing failed! Please try again after a few minutes"); 
         
         if($result){
             // redirect back to the member profile
             redirect_to("member-profile.php");
         }
         else{
            redirect_to("reset-failed.php"); // failed to update password
         }
     }
     else
     // if id isn't set, give an error
     {
        die("Password changing failed! Please try again after a few minutes");
     } 
?>