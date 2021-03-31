<?php require_once('constants/config.php'); ?>
<!DOCTYPE html >
<html>
<head>
<?php $pageTitle='Login Failed';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
	<div id="page">
		<?php include 'navheaders/user_nav_header.php'?>
		<div id="center">
			<h1>Login Failed</h1>
			<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px">
				<p>&nbsp;</p>
				<div class="error">Login Failed!</div>
				<p>
					Please check your email and password. <a href="login-register.php">Click
						Here</a> to try again.
				</p>
			</div>
		</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>