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
   
//retrive categories from the categories table
$result=mysqli_query($conn,"SELECT * FROM categories")
or die("There are no records to display ... \n" . mysqli_error()); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Categories';
    include 'page_title_scripts/admin_title_scripts.php'
    ?>
</head>
<body>
<div id="page">
<div id="header">
<h1>Categories Management</h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="messages.php">Messages</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="320" align="center">
<CAPTION><h3 class="fs-6">ADD A NEW CATEGORY</h3></CAPTION>
<form name="categoryForm" id="categoryForm" action="categories-exec.php" method="post" onsubmit="return categoriesValidate(this)">
<tr>
    <th>Name</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" class="textfield form-control" required/></td>
    <td><input type="submit" class=" btn btn-sm btn-success" name="Submit" value="Add" /></td>
</tr>
</form>
</table>
<hr>
<table width="320" align="center">
<CAPTION><h3 class="fs-6">AVAILABLE CATEGORIES</h3></CAPTION>
<tr>
<th>Category Name</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['category_name']."</td>";
echo '<td><a href="delete-category.php?id=' . $row['category_id'] . '" class="btn btn-danger btn-sm">Remove Category</a></td>';
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