<?php require_once('auth.php');?>
<?php
require_once 'constants/config.php';
require_once 'includes/connection.php';

// Includes the functions
require_once 'includes/functions.php';

// define default values for flag_0
$flag_0 = 0;

// get member_id from session
$member_id = $_SESSION['SESS_MEMBER_ID'];

// selecting particular records from the food_details and cart_details tables. Return an error if there are no records in the tables
$result1 = mysqli_query($conn, "SELECT food_name,food_description,food_price,food_photo,cart_id,quantity_value,total,flag,category_name,lt FROM food_details,cart_details,categories,quantities WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details.food_id AND food_details.food_category=categories.category_id AND cart_details.quantity_id=quantities.quantity_id AND cart_details.lt ='food'") or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
$result = array();
while ($row = mysqli_fetch_assoc($result1)) {
    $result[] = $row;
}
$result2 = mysqli_query($conn, "SELECT * FROM cart_details c inner join specials s on s.special_id = c.food_id inner join quantities q on q.quantity_id = c.quantity_id WHERE c.lt = 'special' and c.member_id ='$member_id' ") or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
while ($row = mysqli_fetch_assoc($result2)) {
    $result[] = $row;
}
// var_dump($result);
// exit;
?>
<?php
if (isset($_POST['Submit'])) {
    // Function to sanitize values received from the form. Prevents SQL injection

    // get category id
    $id = mysql_prep($_POST['category']);

    // selecting all records from the food_details table based on category id. Return an error if there are no records in the table
    $result = mysqli_query($conn, "SELECT * FROM food_details WHERE food_category='$id'") or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
}
?>
<?php
// retrieving quantities from the quantities table
$quantities = mysqli_query($conn, "SELECT * FROM quantities") or die("Something is wrong ... \n" . mysqli_error());
?>
<?php
// retrieving cart ids from the cart_details table
// define a default value for flag_0
$flag_0 = 0;
$items = mysqli_query($conn, "SELECT * FROM cart_details WHERE member_id='$member_id' AND flag='$flag_0'") or die("Something is wrong ... \n" . mysqli_error());
?>
<?php
// retrive a currency from the currencies table
// define a default value for flag_1
$flag_1 = 1;
$currencies = mysqli_query($conn, "SELECT * FROM currencies WHERE flag='$flag_1'") or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<html>
<head>
<?php $pageTitle='Shopping Cart';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
	<div id="page">
	<?php include 'navheaders/user_nav_header.php'?>

		<div id="center">
			<h1>MY SHOPPING CART</h1>
			<hr>
			<h3>
				<a href="foodzone.php">Continue Shopping!</a>
			</h3>
			<form name="quantityForm" id="quantityForm" method="post"action="update-quantity.php" onsubmit="return updateQuantity(this)">
				<table width="560" align="center">
					<tr>
						<td>Item ID</td>
						<td><select name="item" id="item">
								<option value="select">- select -
                            <?php
                            // loop through cart_details table rows
                            while ($row = mysqli_fetch_array($items)) {
                                echo "<option value=$row[cart_id]>$row[cart_id]";
                            }
                            ?>
                            
						
						</select></td>
						<td>Quantity</td>
						<td><select name="quantity" id="quantity">
								<option value="select">- select -
                            <?php
                            // loop through quantities table rows
                            while ($row = mysqli_fetch_assoc($quantities)) {
                                echo "<option value=$row[quantity_id]>$row[quantity_value]";
                            }
                            ?>
                            
						
						</select></td>
						<td><input type="submit" name="Submit" value="Change Quantity" /></td>
					</tr>
				</table>
			</form>
			<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px">
				<table width="910" height="auto" style="text-align: center;">
					<tr>
						<th>Item ID</th>
						<th>Food Photo</th>
						<th>Food Name</th>
						<th>Food Description</th>
						<th>Food Category</th>
						<th>Food Price</th>
						<th>Quantity</th>
						<th>Total Cost</th>
						<th>Action(s)</th>
					</tr>

            <?php
            // loop through all table rows
            $symbol = mysqli_fetch_assoc($currencies); // gets active currency
            foreach ($result as $row) {
                $lt = $row['lt'];
                echo "<tr>";
                echo "<td>" . $row['cart_id'] . "</td>";
                echo '<td><a href=images/' . $row[$lt . '_photo'] . ' alt="click to view full image" target="_blank"><img src=images/' . $row[$lt . '_photo'] . ' width="80" height="70"></a></td>';
                echo "<td>" . $row[$lt . '_name'] . "</td>";
                echo "<td>" . $row[$lt . '_description'] . "</td>";
                echo "<td>" . ($lt == 'food' ? $row['category_name'] : 'SPECIAL DEALS') . "</td>";
                echo "<td>" . $symbol['currency_symbol'] . "" . $row[$lt . '_price'] . "</td>";
                echo "<td>" . $row['quantity_value'] . "</td>";
                echo "<td>" . $symbol['currency_symbol'] . "" . $row['total'] . "</td>";
             
                echo '<td><a href="order-exec.php?id=' . $row['cart_id'] . '">Place Order</a></td>';
                echo "</tr>";
            }
            //mysqli_free_result($symbol);
            mysqli_close($conn);
            ?>
          </table>
			</div>
		</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>