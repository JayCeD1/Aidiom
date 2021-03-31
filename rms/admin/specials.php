<?php require_once('auth.php');
require_once 'constants/config.php' ?>
<?php require_once('../includes/connection.php'); ?>
<?php
//retrieve promotions from the specials table
$result = mysqli_query($conn, "SELECT * FROM specials")
	or die("There are no records to display ... \n" . mysqli_error());
?>
<?php
//retrive a currency from the currencies table
//define a default value for flag_1
$flag_1 = 1;
$currencies = mysqli_query($conn, "SELECT * FROM currencies WHERE flag='$flag_1'")
	or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php $pageTitle = "Specials";
	include 'page_title_scripts/admin_title_scripts.php'
	?>
</head>

<body>
	<div id="page">
		<div id="header">
			<h1>Specials Management</h1>
			<a href="index.php">Home</a> | <a href="categories.php">Categories</a>
			| <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a>
			| <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a>
			| <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a>
			| <a href="messages.php">Messages</a> | <a href="options.php">Options</a>
			| <a href="logout.php">Logout</a>
		</div>
		<div id="container">
			<table width="850" align="center">
				<caption>
					<h3 class="fs-6 text-center">MANAGE PROMOTIONS</h3>
				</caption>
				<form name="specialsForm" id="specialsForm" action="specials-exec.php" method="post" enctype="multipart/form-data" onsubmit="return specialsValidate(this)">
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Photo</th>
						<th>Action</th>
					</tr>
					<tr>
						<td><input type="text" name="name" id="name" class="textfield form-control" required /></td>
						<td><textarea name="description" id="description" class="textfield form-control" rows="2" cols="15"required></textarea></td>
						<td><input type="text" name="price" id="price" class="textfield form-control " required/></td>
						<td><input type="date" name="start_date" id="start_date" class="textfield form-control form-control-sm" /></td>
						<td><input type="date" name="end_date" id="end_date" class="textfield form-control form-control-sm" /></td>
						<td><input type="file" name="photo"class="form-control form-control-sm" id="photo formFileSm" /></td>
						<td><input type="submit" name="Submit" value="Add" class="btn btn-sm btn-success"/></td>
					</tr>
				</form>
			</table>
			</hr>
			<table width="950" align="center">
				<caption>
					<h3 class="fs-6 text-center">PROMOTIONS LIST</h3>
				</caption>
				<tr>
					<th>Promo Photo</th>
					<th>Promo Name</th>
					<th>Promo Description</th>
					<th>Promo Price</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Action(s)</th>
				</tr>

				<?php
				// loop through all table rows
				$symbol = mysqli_fetch_assoc($currencies); // gets active currency
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo '<td><img src=../images/' . $row['special_photo'] . ' width="80" height="70" class="rounded float-end mr-4"></td>';
					echo "<td>" . $row['special_name'] . "</td>";
					echo "<td width='180' align='left'>" . $row['special_description'] . "</td>";
					echo "<td>" . $symbol['currency_symbol'] . "" . $row['special_price'] . "</td>";
					echo "<td>" . $row['special_start_date'] . "</td>";
					echo "<td>" . $row['special_end_date'] . "</td>";
					echo '<td><a href="delete-special.php?id=' . $row['special_id'] . '" class="btn btn-sm btn-danger">Remove Promo</a></td>';
					echo "</tr>";
				}
				mysqli_free_result($result);
				mysqli_close($conn);
				?>
			</table>
			</hr>

		</div>
		<?php include 'footer.php'; ?>
	</div>
</body>

</html>