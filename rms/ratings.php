<?php
    require_once('auth.php');
?>
<?php

require_once 'includes/connection.php';
require_once 'constants/config.php';
//get member id from session
$memberId=$_SESSION['SESS_MEMBER_ID']; 

//selecting all records from the food_details table. Return an error if there are no records in the table
$foods=mysqli_query($conn,"SELECT * FROM food_details")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 

//selecting all records from the ratings table. Return an error if there are no records in the table
$ratings=mysqli_query($conn,"SELECT * FROM ratings")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<?php
    //retrieving all rows from the cart_details table based on flag=0
    $flag_0 = 0;
    $items=mysqli_query($conn,"SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'")
    or die("Something is wrong ... \n" . mysqli_error()); 
    //get the number of rows
    $num_items = mysqli_num_rows($items);
?>
<?php
    //retrieving all rows from the messages table
    $messages=mysqli_query($conn,"SELECT * FROM messages")
    or die("Something is wrong ... \n" . mysqli_error()); 
    //get the number of rows
    $num_messages = mysqli_num_rows($messages);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Ratings';
include 'page_title_scripts/title_style_scripts.php'
?>
<body>
<?php include 'navheaders/user_nav_header.php'?>
<div id="center">
<h1>RATE US</h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<a href="member-index.php">Home</a> | <a href="cart.php">Cart[<?php echo $num_items;?>]</a> |  <a href="inbox.php">Inbox[<?php echo $num_messages;?>]</a> | <a href="tables.php">Tables</a> | <a href="partyhalls.php">Party-Halls</a> | <a href="ratings.php">Rate Us</a> | <a href="logout.php">Logout</a>
<p>&nbsp;</p>
<p class="fs-6">Here you can ... For more information <a href="contactus.php">Click Here</a> to contact us.
<hr>
<form name="ratingForm" id="ratingForm" method="post" action="ratings-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>" onsubmit="return ratingValidate(this)" style="text-align:center;">
    <table align="center" width="300">
        <CAPTION><h4 class="text-center text-success">RATE OUR FOODS</h4></CAPTION>
            <tr>
                <td class="fs-6">Food</td>
                <td><select name="food" id="food">
                <option value="select">- select food -
                <?php 
                //loop through food_details table rows
                while ($row=mysqli_fetch_array($foods)){
                echo "<option value=$row[food_id]>$row[food_name]"; 
                }
                ?>
                </select></td>
            <tr>
                <td class="fs-6">Scale</td>
                <td><select name="scale" id="scale">
                <option value="select">- select scale -
                <?php 
                //loop through ratings table rows
                while ($row=mysqli_fetch_array($ratings)){
                echo "<option value=$row[rate_id]>$row[rate_name]"; 
                }
                ?>
                </select></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="Submit" value="Rate" class="btn btn-secondary"/></td>
            </td>
    </table>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>