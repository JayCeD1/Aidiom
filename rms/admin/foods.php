<?php  require_once('auth.php');?>
<?php
    
    require_once '../includes/connection.php';
  
    //retrive promotions from the specials table
    $result=mysqli_query($conn,"SELECT * FROM food_details,categories WHERE food_details.food_category=categories.category_id")
    or die("There are no records to display ... \n" . mysqli_error()); 
?>
<?php
    //retrive categories from the categories table
    $categories=mysqli_query($conn,"SELECT * FROM categories")
    or die("There are no records to display ... \n" . mysqli_error()); 
?>
<?php
    //retrive a currency from the currencies table
    //define a default value for flag_1
    $flag_1 = 1;
    $currencies=mysqli_query($conn,"SELECT * FROM currencies WHERE flag='$flag_1'")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Foods';
    include 'page_title_scripts/admin_title_scripts.php'
?>
</head>
<body>
<div id="page">
<div id="header">
<h1 class="fst-italic">Foods Management </h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="messages.php">Messages</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="760" align="center">
<CAPTION><h3 class="fs-5 text-center">ADD A NEW FOOD</h3></CAPTION>
<form name="foodsForm" id="foodsForm" action="foods-exec.php" method="post" enctype="multipart/form-data" onsubmit="return foodsValidate(this)">
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>
    <th>Photo</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" id="name" class="textfield form-control" required/></td>
    <td><textarea name="description" id="description" class="textfield form-control" rows="2" cols="15" required></textarea></td>
    <td><input type="text" name="price" id="price" class="textfield form-control" /></td>
    <td width="168"><select name="category" id="category" class="form-select form-select-sm">
    <option value="select">- select one option -
    <?php 
    //loop through categories table rows
    while ($row=mysqli_fetch_array($categories)){
    echo "<option value=$row[category_id]>$row[category_name]"; 
    }
    ?>
    </select></td>
    <td><input type="file" class="form-control form-control-sm"  name="photo" id="photo formFileSm"/></td>
    <td><input type="submit" name="Submit" value="Add" class="btn btn-sm btn-primary"/></td>
</tr>
</form>
</table>
<hr>
<table width="950" align="center">
<CAPTION><h3 class="fs-5 text-center">AVAILABLE FOODS</h3></CAPTION>
<tr>
<th>Food Photo</th>
<th>Food Name</th>
<th>Food Description</th>
<th>Food Price</th>
<th>Food Category</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
$symbol=mysqli_fetch_assoc($currencies); //gets active currency
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo '<td><img src=../images/'. $row['food_photo']. ' width="80" height="70"></td>';
echo "<td>" . $row['food_name']."</td>";
echo "<td>" . $row['food_description']."</td>";
echo "<td>" . $symbol['currency_symbol']. "" . $row['food_price']."</td>";
echo "<td>" . $row['category_name']."</td>";
echo '<td><a href="delete-food.php?id=' . $row['food_id'] . '">Remove Food</a></td>';
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