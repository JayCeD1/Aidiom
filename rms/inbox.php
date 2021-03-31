<?php    require_once('auth.php');?>
<?php require_once 'includes/connection.php';?>
<?php require_once 'constants/config.php'?>
<?php

// get member id from session
$memberId = $_SESSION['SESS_MEMBER_ID'];
?>
<?php
// retrieving all rows from the cart_details table based on flag=0
$flag_0 = 0;
$items = mysqli_query($conn, "SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'") or die("Something is wrong ... \n" . mysqli_error());
// get the number of rows
$num_items = mysqli_num_rows($items);
?>
<?php
// retrieving all rows from the messages table
$messages = mysqli_query($conn, "SELECT * FROM messages") or die("Something is wrong ... \n" . mysqli_error());
// get the number of rows
$num_messages = mysqli_num_rows($messages);
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Inbox Messages';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
	<div id="page">
		<?php include 'navheaders/user_nav_header.php' ?>
		<div id="center">
			<h1>MESSAGES</h1>
			<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px">
				<a href="member-index.php">Home</a> | <a href="cart.php">Cart[<?php echo $num_items;?>]</a>
				| <a href="inbox.php">Inbox[<?php echo $num_messages;?>]</a> | <a
					href="tables.php">Tables</a> | <a href="partyhalls.php">Party-Halls</a>
				| <a href="ratings.php">Rate Us</a> | <a href="logout.php">Logout</a>
				<p>&nbsp;</p>
				<p>
					Here you can ... For more information <a href="contactus.php">Click
						Here</a> to contact us.
				</p>
				<hr>
					<table width="850" style="text-align: center;">
						<caption>
							<h4 class="text-center">INBOX</h4>
						</caption>
						<tr>
							<th>From</th>
							<th>Date Received</th>
							<th>Time Received</th>
							<th>Subject</th>
							<th>Text</th>
						</tr>

<?php
// loop through all table rows
while ($row = mysqli_fetch_array($messages)) {
    echo "<tr>";
    echo "<td>" . $row['message_from'] . "</td>";
    echo "<td>" . $row['message_date'] . "</td>";
    echo "<td>" . $row['message_time'] . "</td>";
    echo "<td>" . $row['message_subject'] . "</td>";
    echo "<td width='350' align='center'>" . $row['message_text']."</td>";
echo "</tr>";
}
mysqli_free_result($messages);
mysqli_close($conn);
?>
</table>
			</div>
		</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>