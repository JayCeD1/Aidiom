<?php
    //Start session
    session_start();
    
    //Includes the connection to database
    require_once '..includes/connection.php';
    
    //Includes the functions
    require_once '../includes/functions.php';
    
   
    if(isset($_POST['Update'])){
        //define default values for flag_0 and flag_1
        $flag_0 = 0;
        $flag_1 = 1;
        
        //check whether their is an active currency
        $qry=mysqli_query($conn,"SELECT * FROM currencies WHERE flag='$flag_1'") or die("Something is wrong ... \n" . mysqli_error()); 
        if(mysqli_num_rows($qry)>0){
            $row=mysqli_fetch_assoc($qry);
            $currency_id=$row['currency_id'];
            // update the entry with a deactivation flag
            $result = mysqli_query($conn,"UPDATE currencies SET flag='$flag_0' WHERE currency_id='$currency_id'")
            or die("Something is wrong ... \n". mysqli_error());
            
                //Perform activation of another currency
                
                    //Sanitize the POST values
                    $currency_id = mysql_prep($_POST['currency']);
             
                 // update the entry with an activation flag
                 $result = mysqli_query($conn,"UPDATE currencies SET flag='$flag_1' WHERE currency_id='$currency_id'")
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
                 die("activating a currency failed ..." . mysqli_error());
                 }
        }
            else{
                    //Sanitize the POST values
                    $currency_id = mysql_prep($_POST['currency']);
             
                 // update the entry with an activation flag
                 $result = mysqli_query($conn,"UPDATE currencies SET flag='$flag_1' WHERE currency_id='$currency_id'")
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
                    die("activating a currency failed ..." . mysqli_error());
                 }
            }
    }
?>