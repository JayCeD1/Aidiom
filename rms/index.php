<?php
require_once 'includes/connection.php';

// retrieve questions from the questions table
$questions = mysqli_query($conn, "SELECT * FROM questions") or die("Something is wrong ... \n" . mysqli_error());
?>
<?php
// setting-up a remember me cookie
if (isset($_POST['Submit'])) {
    // setting up a remember me cookie
    if ($_POST['remember']) {
        $year = time() + 31536000;
        setcookie('remember_me', $_POST['login'], $year);
    } else if (! $_POST['remember']) {
        if (isset($_COOKIE['remember_me'])) {
            $past = time() - 100;
            setcookie(remember_me, gone, $past);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php $pageTitle='Home';?>
<?php include 'page_title_scripts/title_style_scripts.php'?>
</head>
<body>
	<div id="page">
		<?php include 'navheaders/user_nav_header.php'?>
		<div id="center">
			<h1>
				<center>Welcome To Aidiom Hotel Restaurant Management System!</center>
			</h1>
			<div class="fst-italic">Order your food today from the Food Zone and
				it will be delivered at your door step. Jump in to our weekly
				special deals in the Special Deals menu. Register an account with us
				to enjoy fast ordering, delivery, and convenient payment of your
				food. Start now by logging in below or registering if you don't have
				an account with us:
			</div>
			
			<?php include 'formtable/login_registerforms.php' ?>
			<hr>
		</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
