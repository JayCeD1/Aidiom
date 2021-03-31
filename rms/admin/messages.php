<?php
	require_once('auth.php');
  require_once 'constants/config.php'
?>
<?php

require_once '../includes/connection.php';
   
//selecting all records from the messages table. Return an error if there is a problem
$result=mysqli_query($conn,"SELECT * FROM messages")
or die("There are no records to display ... \n" . mysqli_error()); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle="Messages";
  include 'page_title_scripts/admin_title_scripts.php'
?>
</head>
<body>
<div id="page">
<div id="header">
<h1>Messages Management </h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="messages.php">Messages</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<form id="messageForm" name="messageForm" method="post" action="message-exec.php" onsubmit="return messageValidate(this)">
  <table width="540" border="0" cellpadding="2" cellspacing="0" align="center">
  <CAPTION><h3 class="text-center text-primary fs-6">SEND A MESSAGE</h3></CAPTION>
    <tr>
      <th width="200">Subject</th>
      <td width="168"><input type="text" name="subject" id="subject" class="textfield form-control form-control-sm" required /></td>
    </tr>
    <tr>
      <th width="200">Message Box</th>
      <td width="168"><textarea name="txtmessage" class="textfield form-control form-control-lg" rows="5" cols="60"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"><input type="submit" name="Submit" value="Send Message" class="btn btn-sm btn-success"/>
	  <input type="reset" name="Reset" value="Clear Field" class="btn btn-sm btn-danger"/></td>
    </tr>
  </table>
</form>
<hr>
<table border="0" width="1000" align="center">
<CAPTION><h3 class="fs-6 text-center text-success">SENT MESSAGES</h3></CAPTION>
<tr>
<th>Message ID</th>
<th>Date Sent</th>
<th>Time Sent</th>
<th>Message Subject</th>
<th>Message Text</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['message_id']."</td>";
echo "<td>" . $row['message_date']."</td>";
echo "<td>" . $row['message_time']."</td>";
echo "<td>" . $row['message_subject']."</td>";
echo "<td width='300' align='left'>" . $row['message_text']."</td>";
echo '<td><a href="delete-message.php?id=' . $row['message_id'] . '" class="btn btn-sm btn-danger">Remove Message</a></td>';
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($conn);
?>
</table>
<hr>
</div>
<?php
  include 'footer.php';
?>
</div>
</body>
</html>