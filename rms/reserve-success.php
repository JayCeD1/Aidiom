<?php require_once('constants/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Reservation Success';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
<div id="page">
 <?php include 'navheaders/user_nav_header.php'?>
<div id="center">
<h1>Reservation Successful</h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<p>&nbsp;</p>
<div class="error">Table/PartyHall Reserved Successfully</div>
<p><a href="member-index.php">Click Here</a> to go back to your account.</p>
</div>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
