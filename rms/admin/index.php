<?php
require_once('auth.php');
?>
<?php

require_once '../includes/connection.php';

// Include functions in the includes folder
require_once('../includes/functions.php');

// define default value for flag
$flag_1 = 1;

// defining global variables
$qry = "";
$excellent_qry = "";
$good_qry = "";
$average_qry = "";
$bad_qry = "";
$worse_qry = "";

// count the number of records in the members, orders_details, and reservations_details tables
$members = mysqli_query($conn, "SELECT * FROM members") or die("There are no records to count ... \n" . mysqli_error());

$orders_placed = mysqli_query($conn, "SELECT * FROM orders_details") or die("There are no records to count ... \n" . mysqli_error());

$orders_processed = mysqli_query($conn, "SELECT * FROM orders_details WHERE flag='$flag_1'") or die("There are no records to count ... \n" . mysqli_error());

$tables_reserved = mysqli_query($conn, "SELECT * FROM reservations_details WHERE table_flag='$flag_1'") or die("There are no records to count ... \n" . mysqli_error());

$partyhalls_reserved = mysqli_query($conn, "SELECT * FROM reservations_details WHERE partyhall_flag='$flag_1'") or die("There are no records to count ... \n" . mysqli_error());

$tables_allocated = mysqli_query($conn, "SELECT * FROM reservations_details WHERE flag='$flag_1' AND table_flag='$flag_1'") or die("There are no records to count ... \n" . mysqli_error());

$partyhalls_allocated = mysqli_query($conn, "SELECT * FROM reservations_details WHERE flag='$flag_1' AND partyhall_flag='$flag_1'") or die("There are no records to count ... \n" . mysqli_error());

// get food names and ids from food_details table
$foods = mysqli_query($conn, "SELECT * FROM food_details") or die("Something is wrong ... \n" . mysqli_error());
?>
<?php
if (isset($_POST['Submit'])) {

    // get category id
    $id = mysql_prep($_POST['food']);

    // get ratings ids
    $ratings = mysqli_query($conn, "SELECT * FROM ratings") or die("Something is wrong ... \n" . mysqli_error());
    $row_1 = mysqli_fetch_array($ratings);
    $row_2 = mysqli_fetch_array($ratings);
    $row_3 = mysqli_fetch_array($ratings);
    $row_4 = mysqli_fetch_array($ratings);
    $row_5 = mysqli_fetch_array($ratings);
    if ($row_1) {
        $excellent = $row_1['rate_id'];
    }
    if ($row_2) {
        $good = $row_2['rate_id'];
    }
    if ($row_3) {
        $average = $row_3['rate_id'];
    }
    if ($row_4) {
        $bad = $row_4['rate_id'];
    }
    if ($row_5) {
        $worse = $row_5['rate_id'];
    }

    /*
     * selecting all records from the food_details and polls_details tables based on food id.
     * Return an error if there are no records in the table
     */
    $qry = mysqli_query($conn, "SELECT * FROM food_details, polls_details WHERE polls_details.food_id='$id' 
                                AND food_details.food_id='$id'") or die("Something is wrong ... \n" . mysqli_error());

    $excellent_qry = mysqli_query($conn, "SELECT * FROM food_details, polls_details WHERE polls_details.food_id='$id' 
                                        AND food_details.food_id='$id' AND polls_details.rate_id='$excellent'") or die("Something is wrong ... \n" . mysqli_error());

    $good_qry = mysqli_query($conn, "SELECT * FROM food_details, polls_details WHERE polls_details.food_id='$id' 
                                        AND food_details.food_id='$id' AND polls_details.rate_id='$good'") or die("Something is wrong ... \n" . mysqli_error());

    $average_qry = mysqli_query($conn, "SELECT * FROM food_details, polls_details WHERE polls_details.food_id='$id' 
                                        AND food_details.food_id='$id' AND polls_details.rate_id='$average'") or die("Something is wrong ... \n" . mysqli_error());

    $bad_qry = mysqli_query($conn, "SELECT * FROM food_details, polls_details WHERE polls_details.food_id='$id' 
                                    AND food_details.food_id='$id' AND polls_details.rate_id='$bad'") or die("Something is wrong ... \n" . mysqli_error());

    $worse_qry = mysqli_query($conn, "SELECT * FROM food_details, polls_details WHERE polls_details.food_id='$id' 
                                    AND food_details.food_id='$id' AND polls_details.rate_id='$worse'") or die("Something is wrong ... \n" . mysqli_error());

    $no_rate_qry = mysqli_query($conn, "SELECT * FROM food_details WHERE food_id='$id'") or die("Something is wrong ... \n" . mysqli_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php $pageTitle = 'Admin Index';
    include 'page_title_scripts/admin_title_scripts.php'
    ?>
</head>

<body>
    <div id="page">
        <div id="header">
            <h1 class="fst-italic">Administrator Control Panel</h1>
            <a href="profile.php">Profile</a> | <a href="categories.php">Categories</a>
            | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a>
            | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a>
            | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a>
            | <a href="messages.php">Messages</a> | <a href="options.php">Options</a>
            | <a href="logout.php">Logout</a>
        </div>
        <div id="container">
            <table width="1000" align="center" style="text-align: center">
                <caption>
                    <h3 class="fs-6 text-center">CURRENT STATUS</h3>
                </caption>
                <tr>
                    <th>Members Registered</th>
                    <th>Orders Placed</th>
                    <th>Orders Processed</th>
                    <th>Orders Pending</th>
                    <th>Table(s) Reserved</th>
                    <th>Table(s) Allocated</th>
                    <th>Table(s) Pending</th>
                    <th>PartyHall(s) Reserved</th>
                    <th>PartyHall(s) Allocated</th>
                    <th>PartyHall(s) Pending</th>
                </tr>

                <?php
                $result1 = mysqli_num_rows($members);
                $result2 = mysqli_num_rows($orders_placed);
                $result3 = mysqli_num_rows($orders_processed);
                $result4 = $result2 - $result3; // gets pending order(s)
                $result5 = mysqli_num_rows($tables_reserved);
                $result6 = mysqli_num_rows($tables_allocated);
                $result7 = $result5 - $result6; // gets pending table(s)
                $result8 = mysqli_num_rows($partyhalls_reserved);
                $result9 = mysqli_num_rows($partyhalls_allocated);
                $result10 = $result8 - $result9; // gets pending partyhall(s)
                echo "<tr align=>";
                echo "<td>" . $result1 . "</td>";
                echo "<td>" . $result2 . "</td>";
                echo "<td>" . $result3 . "</td>";
                echo "<td>" . $result4 . "</td>";
                echo "<td>" . $result5 . "</td>";
                echo "<td>" . $result6 . "</td>";
                echo "<td>" . $result7 . "</td>";
                echo "<td>" . $result8 . "</td>";
                echo "<td>" . $result9 . "</td>";
                echo "<td>" . $result10 . "</td>";
                echo "</tr>";
                ?>
            </table>
            <hr />
            <form name="foodStatusForm" id="foodStatusForm" method="post" action="index.php" onsubmit="return statusValidate(this)">
                <table width="360" align="center">
                    <caption>
                        <h3 class="fs-5 text-center">CUSTOMERS' RATINGS (100%)</h3>
                    </caption>
                    <tr>
                        <td class="fs-6 fst-italic">Food</td>
                        <td width="168">
                        
                            <select name="food" id="food" class="form-select form-select-sm" aria-label="Default select example">
                                <option value="select" class="fst-italic">- select food -
                                    <?php
                                    // loop through food_details table rows
                                    while ($row = mysqli_fetch_array($foods)) {
                                        echo "<option value=$row[food_id]>$row[food_name]";
                                    }
                                    ?>

                            </select>
                        </td>
                        <td><input type="submit" name="Submit" value="Show Ratings" class="btn btn-secondary" /></td>
                    </tr>
                </table>
            </form>
            <table width="900" align="center">
                <tr>
                    <th></th>
                    <th class="text-success">Excellent</th>
                    <th class="text-primary">Good</th>
                    <th class="text-info">Average</th>
                    <th class="text-warning">Bad</th>
                    <th class="text-danger">Worse</th>
                </tr>

                <?php
                if (isset($_POST['Submit'])) {
                    // actual values
                    $excellent_value = mysqli_num_rows($excellent_qry);
                    $good_value = mysqli_num_rows($good_qry);
                    $average_value = mysqli_num_rows($average_qry);
                    $bad_value = mysqli_num_rows($bad_qry);
                    $worse_value = mysqli_num_rows($worse_qry);
                    // percentile rates
                    $total_value = mysqli_num_rows($qry);
                    if ($total_value != 0) {
                        $excellent_rate = $excellent_value / $total_value * 100;
                        $good_rate = $good_value / $total_value * 100;
                        $average_rate = $average_value / $total_value * 100;
                        $bad_rate = $bad_value / $total_value * 100;
                        $worse_rate = $worse_value / $total_value * 100;
                    } else {
                        $excellent_rate = 0;
                        $good_rate = 0;
                        $average_rate = 0;
                        $bad_rate = 0;
                        $worse_rate = 0;
                    }
                    // get food name
                    if (mysqli_num_rows($qry) > 0) {
                        $row = mysqli_fetch_array($qry);
                        $food_name = $row['food_name'];
                    } else {
                        $row = mysqli_fetch_array($no_rate_qry);
                        $food_name = $row['food_name'];
                    }
                    echo "<tr>";
                    echo "<th>" . $food_name . "</th>";
                    echo "<td>" . $excellent_value . "(" . $excellent_rate . "%)" . "</td>";
                    echo "<td>" . $good_value . "(" . $good_rate . "%)" . "</td>";
                    echo "<td>" . $average_value . "(" . $average_rate . "%)" . "</td>";
                    echo "<td>" . $bad_value . "(" . $bad_rate . "%)" . "</td>";
                    echo "<td>" . $worse_value . "(" . $worse_rate . "%)" . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <hr />

        </div>
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>