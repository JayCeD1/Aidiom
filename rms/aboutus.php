<?php require_once('constants/config.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<?php $pageTitle='About Us';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
	<div id="page">
		<?php include 'navheaders/user_nav_header.php' ?>
		<div id="center">
			<h1>ABOUT <?php echo APP_NAME ?></h1>
			<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px">
				<p><?php echo APP_NAME ?> is a multinational restaurant food chain and delivery service with an aim of providing nutritious food to all our current and esteemed customers in Kampala. This is achieved through quality services that surpases customers' satisfaction.</p>
				<p>Along with our business philosophy, we aim to be a convenient way
					of delivering food right at your door step with no extra shipping
					cost incurred. Yes we are here to serve you and to meet your
					stomach needs.</p>
				<h3>Mission</h3>
				<p>To provide in time, affordable, quality, and nutritious food to
					all our esteemed customers.</p>
				<h3>Vision</h3>
				<p>To become the world's most respected brand in delivering quality
					food to all our customers and beat the monopoly imposed by other
					companies.</p>
			</div>
		</div>
    <?php include 'footer.php'; ?>
  </div>
</body>
</html>