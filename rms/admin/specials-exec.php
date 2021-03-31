<?php
    //Start session
    session_start();
    
    //Include database constants details
    require_once('../includes/connection.php');
    
    //Includes the functions
    require_once '../includes/functions.php';
   
    //setup a directory where images will be saved 
    $target = "../images/"; 
    $target = $target . basename( $_FILES['photo']['name']); 
    
    //Sanitize the POST values
    $name = mysql_prep($_POST['name']);
    $description = mysql_prep($_POST['description']);
    $price = mysql_prep($_POST['price']);
    $start_date = mysql_prep($_POST['start_date']);
    $end_date = mysql_prep($_POST['end_date']);
    $photo = mysql_prep($_FILES['photo']['name']);

    //Create INSERT query
    $qry = "INSERT INTO specials(special_name, special_description, special_price, special_start_date, special_end_date, special_photo) VALUES('$name','$description','$price','$start_date','$end_date','$photo')";
    $result = @mysqli_query($conn,$qry);
    
    //Check whether the query was successful or not
    if($result) {
            //Writes the photo to the server 
         $moved = move_uploaded_file($_FILES['photo']['tmp_name'], $target);
         
         if($moved) 
         {      
             //everything is okay
             echo "The photo ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory"; 
         } else {  
             //Gives an error if its not okay 
             echo "Sorry, there was a problem uploading your photo. "  . $_FILES["photo"]["error"]; 
         }
        redirect_to("specials.php");
        exit();
    }else {
        die("Query failed " . mysqli_error());
    } 
 ?>