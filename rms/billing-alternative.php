<?php
require_once ('auth.php');
require_once ('constants/config.php')
?>
<!DOCTYPE html>
<html>
<head>
<?php $pageTitle='Alternative Billing'; 
include 'page_title_scripts/title_style_scripts.php'
?>
</head>
<body>
	<div id="page">
		<?php include 'navheaders/user_nav_header.php'?>
		<div id="center">
			<h1>Billing Address</h1>
			<p>
				We have found out that you don't have a billing address in your
				account. Please add a billing address in the form below. It is the
				same address that will be used to deliver your food orders. Please
				note that ONLY correct street/physical addresses should be used in
				order to ensure s mooth delivery of your food orders. For more
				information <a href="contactus.php">Click Here</a> to contact us.
			</p>
			<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px">
				<form id="billingForm" name="billingForm" method="post" action="billing-exec.php?id= <?php echo $_SESSION['SESS_MEMBER_ID'];?>"
					onsubmit="return billingValidate(this)">
					<hr />
					<table width="300" border="0" align="center" cellpadding="2"
						cellspacing="0">

						<caption>
							<h3>ADD DELIVERY/BILLING ADDRESS</h3>
						</caption>
						<tr>
							<td colspan="2" style="text-align: center;"><font color="#FF0000">*
							</font>Required fields</td>
						</tr>
						<tr>
							<th>Street Address</th>
							<td><font color="#FF0000">* </font><input name="sAddress"
								type="text" class="textfield" id="sAddress" /></td>
						</tr>
						<tr>
							<th>P.O. Box No</th>
							<td><font color="#FF0000">* </font><input name="box" type="text"
								class="textfield" id="box" /></td>
						</tr>
						<tr>
							<th>City</th>
							<td><font color="#FF0000">* </font><input name="city" type="text"
								class="textfield" id="city" /></td>
						</tr>
						<tr>
							<th width="124">Mobile No</th>
							<td width="168"><font color="#FF0000">* </font><input
								name="mNumber" type="text" class="textfield" id="mNumber" /></td>
						</tr>
						<tr>
							<th>Landline No</th>
							<td>&nbsp;&nbsp;&nbsp;<input name="lNumber" type="text"
								class="textfield" id="lNumber" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Add" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
