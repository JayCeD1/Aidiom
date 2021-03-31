<?php
    //Start session
    session_start();
    
    //checking constants and connecting to a database
    require_once('constants/config.php');
    
    //Includes the functions
    require_once '../includes/functions.php';
    
    //Connect to mysqli server
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    if(!$conn) {
        die('Failed to connect to server: ' . mysqli_error());
    }
    
 
    
    if(isset($_POST['Update'])){
        //define default values for flag_0 and flag_1
        $flag_0 = 0;
        $flag_1 = 1;
        
        //check whether their is an active currency
        $qry=mysqli_query($conn,"SELECT * FROM timezones WHERE flag='$flag_1'") or die("Something is wrong ... \n" . mysqli_error()); 
        if(mysqli_num_rows($qry)>0){
            $row=mysqli_fetch_assoc($qry);
            $timezone_id=$row['timezone_id'];
            // update the entry with a deactivation flag
            $result = mysqli_query($conn,"UPDATE timezones SET flag='$flag_0' WHERE timezone_id='$timezone_id'")
            or die("Something is wrong ... \n". mysqli_error());
            
                //Perform activation of another timezone
                
                    //Sanitize the POST values
                    $timezone_id = mysql_prep($_POST['timezone']);
             
                 // update the entry with an activation flag
                 $result = mysqli_query($conn,"UPDATE timezones SET flag='$flag_1' WHERE timezone_id='$timezone_id'")
                 or die("Something is wrong ... \n". mysqli_error()); 
                 
                 //check if query executed
                 if($result) {
                     // redirect back to the options page
                     redirect_to("options.php");
                     exit();
                 }
                 else
                 // Gives an error
                 {
                    die("activating a timezone failed ..." . mysqli_error());
                 }
        }
            else{
                    //Sanitize the POST values
                    $timezone_id = mysql_prep($_POST['timezone']);
             
                 // update the entry with an activation flag
                 $result = mysqli_query($conn,"UPDATE timezones SET flag='$flag_1' WHERE timezone_id='$timezone_id'")
                 or die("Something is wrong ... \n". mysqli_error()); 
                 
                 //check if query executed
                 if($result) {
                 // redirect back to the options page
                 redirect_to("options.php");
                 exit();
                 }
                 else
                 // Gives an error
                 {
                 die("activating a timezone failed ..." . mysqli_error());
                 }
            }
    }
?>