<?php include 'constants/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
		<script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
		<title><?php echo APP_NAME ?>:About</title>
	</head>
	<body> 
		<div>
			<div class="container">
				<ul class="list-inline">
					<li class="list-inline-item"><a href="index.php">Home</a></li>
					<li class="list-inline-item"><a href="foodzone.php">Food Zone</a></li>
					<li class="list-inline-item"><a href="specialdeals.php">Special Deals</a></li>
					<li class="list-inline-item"><a href="member-index.php">My Account</a></li>
					<li class="list-inline-item"><a href="contactus.php">Contact Us</a></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<a href="images/head-img.jpg" target="_blank">
							<img src="images/head-img.jpg" alt="no-image-available.png" style="width:100%">
							<div class="caption">
								<p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div>
				<h1>ABOUT <?php echo APP_NAME ?></h1>
				
			</div>
			<?php include 'footer.php'; ?>
		</div>
	</body>
</html>