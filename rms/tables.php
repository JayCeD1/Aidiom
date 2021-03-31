<?php
    require_once('auth.php');
?>
<?php
require_once 'includes/connection.php';
require_once 'constants/config.php';

//get member id from session
$memberId=$_SESSION['SESS_MEMBER_ID'];
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
<?php
    //retrieve tables from the tables table
    $tables=mysqli_query($conn,"SELECT * FROM tables")
    or die("Something is wrong ... \n" . mysqli_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Tables';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
<div id="page">
  <?php include 'navheaders/user_nav_header.php'?>
<div id="center">
<h1>RESERVE TABLE(S)</h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<a href="member-index.php">Home</a> | <a href="cart.php">Cart[<?php echo $num_items;?>]</a> |  <a href="inbox.php">Inbox[<?php echo $num_messages;?>]</a> | <a href="tables.php">Tables</a> | <a href="partyhalls.php">Party-Halls</a> | <a href="ratings.php">Rate Us</a> | <a href="logout.php">Logout</a>
<p>&nbsp;</p>
<p>Here you can ... For more information <a href="contactus.php">Click Here</a> to contact us.
<hr>
<form name="tableForm" id="tableForm" method="post" action="reserve-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>" onsubmit="return tableValidate(this)">
    <table align="center" width="300">
        <CAPTION><h2>RESERVE A TABLE</h2></CAPTION>
        <tr>
            <td><b>Table Name/Number:</b></td>
            <td><select name="table" id="table">
            <option value="select">- select table -</option>
            <?php 
            //loop through tables table rows
            while ($row=mysqli_fetch_array($tables)){
            echo "<option value=$row[table_id]>$row[table_name]</option>"; 
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td><b>Date:</b></td><td><input type="date" name="date" id="date" /></td></tr>
        <tr>
            <td><b>Time:</b></td><td><input type="time" name="time" id="time" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Reserve"></td>
        </tr>
    </table>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>