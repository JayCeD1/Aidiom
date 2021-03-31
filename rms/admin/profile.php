<?php
	require_once('auth.php');
  require_once 'constants/config.php'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle="Profile";
  include 'page_title_scripts/admin_title_scripts.php'
  ?>
</head>
<body>
<div id="page">
<div id="header">
<h1 class="fst-italic">Profile </h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="reservations.php">Reservations</a> | <a href="specials.php">Specials</a> | <a href="allocation.php">Staff</a> | <a href="messages.php">Messages</a> | <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table align="center">
<tr>
<form id="updateForm" name="updateForm" method="post" action="update-exec.php?id=<?php echo $_SESSION['SESS_ADMIN_ID'];?>" onsubmit="return updateValidate(this)">
<td>
  <table width="350" border="0" cellpadding="2" cellspacing="0">
  <CAPTION><h3 class="fs-6">CHANGE ADMIN PASSWORD</h3></CAPTION>
	<tr>
		<td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Required fields</td>
	</tr>
    <tr>
      <th width="124">Current Password</th>
      <td width="168"><font color="#FF0000">* </font><input name="opassword" type="password" class="textfield form-control" id="opassword" /></td>
    </tr>
    <tr>
      <th>New Password</th>
      <td><font color="#FF0000">* </font><input name="npassword" type="password" class="textfield form-control" id="npassword" /></td>
    </tr>
    <tr>
      <th>Confirm New Password </th>
      <td><font color="#FF0000">* </font><input name="cpassword" type="password" class="textfield form-control" id="cpassword" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Change" class="btn btn-sm btn-secondary" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form id="staffForm" name="staffForm" method="post" action="staff-exec.php" onsubmit="return staffValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
  <CAPTION><h3 class="fs-6">ADD NEW STAFF</h3></CAPTION>
	<tr>
		<td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Required fields</td>
	</tr>
    <tr>
      <th>First Name </th>
      <td><font color="#FF0000">* </font><input name="fName" type="text" class="textfield form-control" id="fName" /></td>
    </tr>
	<tr>
      <th>Last Name </th>
      <td><font color="#FF0000">* </font><input name="lName" type="text" class="textfield form-control" id="lName" /></td>
    </tr>
	 <tr>
      <th>Street Address </th>
      <td><font color="#FF0000">* </font><input name="sAddress" type="text" class="textfield form-control" id="sAddress" /></td>
    </tr>
    <tr>
      <th>Mobile/Tel </th>
      <td><span class="text-danger">* </span><input name="mobile" type="text" class="textfield form-control" id="mobile" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Add" class="btn btn-sm btn-success" /></td>
    </tr>
  </table>
</td>
</form>
</tr>
</table>
<p>&nbsp;</p>
<hr>
</div>
<?php
  include 'footer.php';
?>
</div>
</body>
</html>
