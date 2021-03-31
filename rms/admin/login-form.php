<?php
require_once ('constants/config.php');
?>
<!DOCTYPE html lang="en">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $pageTitle='Login Form';
	include 'page_title_scripts/admin_title_scripts.php'
?>
</head>
<body>
	<div id="page">
		<div id="header">
			<h1 class="fst-italic">Administrator Login</h1>
			<p align="center">&nbsp;</p>
		</div>
		<form id="loginForm" name="loginForm" method="post"	action="login-exec.php" onsubmit="return loginValidate(this)">
			<table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
				<tr>
					<td width="112"><b>Username</b></td>
					<td width="188"><input name="login" type="text" class="textfield form-control" id="login" required/></td>
				</tr>
				<tr>
					<td><b>Password</b></td>
					<td><input name="password" type="password" class="textfield form-control" id="password" required/></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="Submit" value="Login" class="btn btn-sm btn-secondary"/></td>
				</tr>
			</table>
		</form>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
