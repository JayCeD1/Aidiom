<?php require_once 'includes/connection.php'; ?>
<?php require_once('includes/functions.php'); ?>
<?php

//selecting all records from the food_details table. Return an error if there are no records in the table
$result = mysqli_query($conn, "SELECT * FROM food_details,categories WHERE food_details.food_category=categories.category_id ")
  or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
//retrive categories from the categories table
$categories = mysqli_query($conn, "SELECT * FROM categories")
  or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
//retrive a currency from the currencies table
//define a default value for flag_1
$flag_1 = 1;
$currencies = mysqli_query($conn, "SELECT * FROM currencies WHERE flag='$flag_1'")
  or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
?>
<?php
if (isset($_POST['Submit'])) {

  //get category id
  $id = mysql_prep($_POST['category']);

  //selecting all records from the food_details and categories tables based on category id. Return an error if there are no records in the table
  if ($id > 0) {
    $result = mysqli_query($conn, "SELECT * FROM food_details,categories WHERE food_category='$id' AND food_details.food_category=categories.category_id ")
      or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
  } elseif ($id == 0) {
    $result = mysqli_query($conn, "SELECT * FROM specials WHERE '" . date('Y-m-d') . "' BETWEEN date(special_start_date) and date(special_end_date) ")
      or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
  <?php $pageTitle='Foods';
  include 'page_title_scripts/title_style_scripts.php'
  ?>
</head>

<body>
  <div id="page">
    <?php include 'navheaders/user_nav_header.php' ?>

    <div id="center">
      <h1>CHOOSE YOUR FOOD</h1>
      <hr>
      <h3>Note: limit the food zone by selecting a category below:</h3>
      <form name="categoryForm" id="categoryForm" method="post" action="foodzone.php" onsubmit="return categoriesValidate(this)">
        <table width="360" align="center">
          <tr>
            <td>Category</td>
            <td width="168">
              <select name="category" id="category">
                  <option value="select"><span class="">select category</span>
                    <?php
                    //loop through categories table rows
                    while ($row = mysqli_fetch_array($categories)) { ?>
                  <option value="<?php echo $id == $row['category_id'] ? "selected" : ""; ?>">
                    <?php echo $row['category_name']; ?>
                  </option>
                <?php  } ?>

                <option value="0" <?php echo isset($id) &&  $id == 0 ? "selected" : ""; ?>>
                  Special Deals
                </option>
                </select>
              </td>
            <td><button type="submit" name="Submit" class="" >Show Foods</button></td>
          </tr>
        </table>
      </form>
      <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
        <table width="860" height="auto" style="text-align:center;">
          <tr>
            <th>Food Photo</th>
            <th>Food Name</th>
            <th>Food Description</th>
            <th>Food Category</th>
            <th>Food Price</th>
            <th>Action(s)</th>
          </tr>
          <?php $count = mysqli_num_rows($result);
             if (isset($_POST['Submit']) && $count < 1) { echo "<html><script language='JavaScript'>
              alert('There are no foods under the selected category at the moment. Please check back later.')</script></html>";} 
              else {
            //loop through all table rows
            //$counter = 3;
            $symbol = mysqli_fetch_assoc($currencies); //gets active currency
            if (isset($id) && $id == 0)
              $lt = "special";
            else
              $lt = "food";
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo '<td><a href=images/' . $row[$lt . '_photo'] . ' alt="click to view full image" target="_blank"><img src=images/' . $row[$lt . '_photo'] . ' width="80" height="70"></a></td>';
              echo "<td>" . $row[$lt . '_name'] . "</td>";
              echo "<td>" . $row[$lt . '_description'] . "</td>";
              echo "<td>" . ($lt == 'food' ? $row['category_name'] : 'SPECIAL DEALS') . "</td>";
              echo "<td>" . $symbol['currency_symbol'] . "" . $row[$lt . '_price'] . "</td>";
              echo '<td><a href="cart-exec.php?id=' . $row[$lt . '_id'] . '&lt=' . $lt . '">Add To Cart</a></td>';
              echo "</td>";
              echo "</tr>";
            }
          }
          mysqli_free_result($result);
          mysqli_close($conn);
          ?>
        </table>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>