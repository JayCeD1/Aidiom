<?php require_once('constants/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Registration Failed';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
<div id="page">
 <?php include 'navheaders/user_nav_header.php'?>
<div id="center">
<h1>Registration Failed</h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<p>&nbsp;</p>
<div class="error">Reservation Failed!</div>
<p>You are seeing this page because partyhall has been booked already. <a href="partyhalls.php">Click Here</a> to try again.</p>
</div>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>