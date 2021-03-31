<?php
    //Start session
    session_start();
    require_once('auth.php');
    require_once('includes/connection.php');
    //Includes the functions
    require_once 'includes/functions.php';
    
    if(isset($_POST['quantity']) && isset($_POST['item']))
        {
            //get quantity_id
            $quantity_id = mysql_prep($_POST['quantity']);
                
            //get member_id from session
            $member_id = $_SESSION['SESS_MEMBER_ID'];
            
            //get cart_id
            $cart_id = mysql_prep($_POST['item']);
            //$cart_id = 5;
            
            //get the quantity value based on quantity_id
            $qry_select=mysqli_query($conn,"SELECT * FROM quantities WHERE quantity_id='$quantity_id'")
            or die("The system is experiencing technical issues. Please try again after some few minutes.");
            
            //storing the quantity_value into a variable
            $row=mysqli_fetch_array($qry_select);
            $quantity_value=$row['quantity_value'];
            
            //get the price of a food based on cart_details and food_details tables
            $cdq = mysqli_query($conn,"SELECT * FROM cart_details where cart_id = '$cart_id'") or die("Error : SELECT * FROM cart_details where cart_id = $cart_id");
            $res = mysqli_fetch_array($cdq);
            $lt = $res['lt'];
            if($lt == 'food')
            $result=mysqli_query($conn,"SELECT * FROM food_details where food_id = {$res['food_id']} ") or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
            else
            $result=mysqli_query($conn,"SELECT * FROM specials where special_id = {$res['food_id']} ") or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 

            
            //storing the value of food price into a variable
            $row=mysqli_fetch_array($result);
            $food_price=$row[$lt.'_price'];
            
            //perform a simple calculation to get a total value of a food based on quantity_value and food_price
            $total = $quantity_value * $food_price;
            
            //Create UPDATE query (updates total and quantity_id in the cart based on cart_id and member_id)
            $qry_update = "UPDATE cart_details SET quantity_id='$quantity_id', total='$total' WHERE cart_id='$cart_id' AND member_id='$member_id'";
            mysqli_query($conn,$qry_update);
            
            if($qry_update){
                redirect_to("cart.php");
            }
            else{
                //Do nothing
            }
            
        }else {
            die("Something went wrong! Our technical team are working on solving the problem. Please try again after few minutes.");
        }
?>