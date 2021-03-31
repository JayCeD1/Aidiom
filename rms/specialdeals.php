<?php
require_once 'includes/connection.php';
require_once 'constants/config.php';
	
//retrive promotions from the specials table
$result=mysqli_query($conn,"SELECT * FROM specials")
or die("There are no records to display ... \n" . mysqli_error()); 
?>
<?php
    //retrive a currency from the currencies table
    //define a default value for flag_1
    $flag_1 = 1;
    $currencies=mysqli_query($conn,"SELECT * FROM currencies WHERE flag='$flag_1'")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<html>
<head>
<?php $pageTitle='Specials';
include 'page_title_scripts/title_style_scripts.php'?>
</head>
<body>
<div id="page">
  <?php include 'navheaders/user_nav_header.php'?>
<div id="center">

  <h1>SPECIAL DEALS</h1>
  <hr>
  <p>Check out our special deals below. These are for a limited time only. Make your decision now.</p>
  <h3>Note: In order to create your order, please go to Food Zone and choose Specials under categories list.</h3>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<table width="850" align="center">
    <CAPTION><h3>SPECIAL DEALS</h3></CAPTION>
        <tr>
                <th>Promo Photo</th>
                <th>Promo Name</th>
                <th>Promo Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Promo Price</th>
        </tr>
        <?php
                $symbol=mysqli_fetch_assoc($currencies); //gets active currency
                while ($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo '<td><a href=images/'. $row['special_photo']. ' alt="click to view full image" target="_blank"><img src=images/'. $row['special_photo']. ' width="80" height="70"></a></td>';
                    echo "<td>" . $row['special_name']."</td>";
                    echo "<td width='250' align='left'>" . $row['special_description']."</td>";
                    echo "<td>" . $row['special_start_date']."</td>";
                    echo "<td>" . $row['special_end_date']."</td>";
                    echo "<td>" . $symbol['currency_symbol']. "" . $row['special_price']."</td>";
                    echo "</td>";
                    echo "</tr>";
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
