<?php
    require_once '../includes/connection.php';
	
	//Includes the functions
	require_once '../includes/functions.php';

	
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
         $result = mysqli_query($conn,"UPDATE pizza_admin SET Password='$NewPassword' WHERE Admin_ID='$id' AND Password='$OldPassword'")
         or die("The admin does not exist ... \n". mysqli_error()); 
         
         // redirect back to the member profile
         redirect_to("profile.php");
     }
     else
     // if id isn't set, give an error
     {
        die("Password changing failed ..." . mysqli_error());
     }
 
?>