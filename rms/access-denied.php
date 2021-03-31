<?php require_once('constants/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Access Denied';
include 'page_title_scripts/title_style_scripts.php' 
?> 
</head>
<body>
<div id="page">
<?php include 'navheaders/user_nav_header.php' ?>
<div id="center">
  <h1>Access Denied</h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<div class="error">Access Denied!</div>
  <p>You don't have access to this page. <a href="login-register.php">Click Here</a> to login first or register for free. The registration won't take long:-)</p>
  </div>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>