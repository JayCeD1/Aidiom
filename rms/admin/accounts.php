<?php
	require_once('auth.php');
?>
<?php
//checking constants and connecting to a database
require_once('constants/config.php');
//Connect to mysqli server
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	if(!$conn) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	
//selecting all records from the members table. Return an error if there are no records in the tables
$result=mysqli_query($conn,"SELECT * FROM members")
or die("There are no records to display ... \n" . mysqli_error()); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle="Members";
	include 'page_title_scripts/admin_title_scripts.php'
?>
</head>
<body>
<div id="page">
<div id="header">
<h1 class="fst-italic">Members Management </h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="messages.php">Messages</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table border="0" width="620" align="center">
<CAPTION><h2 class="fs-5 font-secondary">MEMBERS LIST</h2></CAPTION>
<tr>
<th>Member ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['member_id']."</td>";
echo "<td>" . $row['firstname']."</td>";
echo "<td>" . $row['lastname']."</td>";
echo "<td>" . $row['login']."</td>";
echo '<td><button href="delete-member.php?id=' . $row['member_id'] . '" class="btn btn-sm btn-danger">Remove Member</button></td>';
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($conn);
?>
</table>
<hr>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>