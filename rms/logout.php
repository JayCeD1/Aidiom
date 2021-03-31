<?php
 require_once('constants/config.php');
	//Start session
	session_start();
	 
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Logged Out';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
  <div id="page">
     <?php include 'navheaders/user_nav_header.php'?>
  <div id="center">
    <h1>Logged Out </h1>
    <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
      <p>&nbsp;</p>
      <div class="error">You have been logged out.</div>
      <p>
        <a href="login-register.php">Click Here</a> to Login again
      </p>
    </div>
  </div>
<?php include 'footer.php'?>
</div>
</body>
</html>
