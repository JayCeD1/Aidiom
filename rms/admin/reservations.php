<?php
	require_once('auth.php');
?>
<?php
require_once '../includes/connection.php';
	
//selecting all records from the reservations_details table based on table ids. Return an error if there are no records in the table
$tables=mysqli_query($conn,"SELECT members.firstname, members.lastname, reservations_details.ReservationID, reservations_details.table_id, reservations_details.Reserve_Date, reservations_details.Reserve_Time, tables.table_id, tables.table_name FROM members, reservations_details, tables WHERE members.member_id = reservations_details.member_id AND tables.table_id=reservations_details.table_id")
or die("There are no records to display ... \n" . mysqli_error()); 

//selecting all records from the reservations_details table based on partyhall ids. Return an error if there are no records in the table
$partyhalls=mysqli_query($conn,"SELECT members.firstname, members.lastname, reservations_details.ReservationID, reservations_details.partyhall_id, reservations_details.Reserve_Date, reservations_details.Reserve_Time, partyhalls.partyhall_id, partyhalls.partyhall_name FROM members, reservations_details, partyhalls WHERE members.member_id = reservations_details.member_id AND partyhalls.partyhall_id=reservations_details.partyhall_id")
or die("There are no records to display ... \n" . mysqli_error()); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $PageTitle="Reservations";
	include 'page_title_scripts/admin_title_scripts.php'
?>
</head>
<body>
<div id="page">
<div id="header">
<h1 class="fst-italic">Reservations Management </h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="messages.php">Messages</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table border="0" width="900" align="center">
<CAPTION><h3 class="fs-6">TABLES RESERVED</h3></CAPTION>
<tr>
<th>Reservation ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Table Name</th>
<th>Reserved Date</th>
<th>Reserved Time</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($tables)){
echo "<tr>";
echo "<td>" . $row['ReservationID']."</td>";
echo "<td>" . $row['firstname']."</td>";
echo "<td>" . $row['lastname']."</td>";
echo "<td>" . $row['table_name']."</td>";
echo "<td>" . $row['Reserve_Date']."</td>";
echo "<td>" . $row['Reserve_Time']."</td>";
echo '<td><a href="delete-reservation.php?id=' . $row['ReservationID'] . '" class="btn btn-danger btn-sm">Delete Reservation</a></td>';
echo "</tr>";
}
mysqli_free_result($tables);
//mysqli_close($conn);
?>
</table>
<hr>
<table border="0" width="900" align="center">
<CAPTION><h3 class="fs-6">PARTY-HALLS RESERVED</h3></CAPTION>
<tr>
<th>Reservation ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>PartyHall Name</th>
<th>Reserved Date</th>
<th>Reserved Time</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($partyhalls)){
echo "<tr>";
echo "<td>" . $row['ReservationID']."</td>";
echo "<td>" . $row['firstname']."</td>";
echo "<td>" . $row['lastname']."</td>";
echo "<td>" . $row['partyhall_name']."</td>";
echo "<td>" . $row['Reserve_Date']."</td>";
echo "<td>" . $row['Reserve_Time']."</td>";
echo '<td><a href="delete-reservation.php?id=' . $row['ReservationID'] . '" class="btn btn-danger btn-sm">Delete Reservation</a></td>';
echo "</tr>";
}
mysqli_free_result($partyhalls);
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