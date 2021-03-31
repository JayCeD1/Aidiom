<?php 

//Function to sanitize values received from the form. Prevents SQL injection
function mysql_prep($value) {
    global $conn;

      $value=mysqli_real_escape_string($conn,$value);
      return $value;
   }
   
   function redirect_to($location=NULL) {
       if ($location !=NULL){
           header("Location:$location");
           exit;;}
   }
?>