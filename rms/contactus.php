<?php require_once('constants/config.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php $pageTitle='Contacts';
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
	<div id="page">
		<?php include 'navheaders/user_nav_header.php'?>
		<div id="center">

			<h1>Contact Us</h1>

			<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px">
				<table width="500" height="50">
					<tr>
						<td rowspan="11">
							<div class="mapouter">
								<div class="gmap_canvas">
									<iframe width="600" height="500" id="gmap_canvas"
										src="https://maps.google.com/maps?q=Kyambogo%20university&t=k&z=13&ie=UTF8&iwloc=&output=embed"
										frameborder="0" scrolling="no" marginheight="0"
										marginwidth="0">
									</iframe>
									<br>
									<style>
										.mapouter {
											position: relative;
											text-align: right;
											height: 500px;
											width: 600px;
										}
									</style>
									<a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
									<style>
										.gmap_canvas {
											overflow: hidden;
											background: none !important;
											height: 500px;
											width: 600px;
										}
									</style>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td rowspan="11"></td>
					</tr>
					<tr>
						<td><?php echo APP_NAME ?> Restaurant</td>
					</tr>
					<tr>
						<td>P.O. Box: 1</td>
					</tr>
					<tr>
						<td>Kyambogo</td>
					</tr>
					<tr>
						<td>Banda</td>
					</tr>
					<tr>
						<td>Kampala</td>
					</tr>
					<tr>
						<td>Landline: +111111</td>
					</tr>
					<tr>
						<td>Mobile: +1234/+4567/+8908</td>
					</tr>
					<tr>
						<td>Email: sales@aidiom.com</td>
					</tr>
				</table>
			</div>
		</div>
<?php include 'footer.php'; ?>
</div>

</body>
</html>
