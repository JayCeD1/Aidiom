<?php
    //Start session
    session_start();
    
   require_once '../includes/connection.php';
    
    //Includes the functions 
    require_once '../includes/functions.php';
    
 
    
    //setup a directory where images will be saved 
    $target = "../images/"; 
    $target = $target . basename( $_FILES['photo']['name']); 
    
    //Sanitize the POST values
    $name = mysql_prep($_POST['name']);
    $description = mysql_prep($_POST['description']);
    $price = mysql_prep($_POST['price']);
    $category = mysql_prep($_POST['category']);
    $photo = mysql_prep($_FILES['photo']['name']);

    //Create INSERT query
    $qry = "INSERT INTO food_details(food_name, food_description, food_price, food_photo, food_category) 
            VALUES('$name','$description','$price','$photo','$category')";
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
        redirect_to("foods.php");
        exit();
    }else {
        die("Query failed " . mysqli_error());
    } 
 ?>