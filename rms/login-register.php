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
<!DOCTYPE html >
<html lang="en">
<head>
<?php $pageTitle='Login';
include 'page_title_scripts/title_style_scripts.php'
?>
<body>
	<div id="page">
	<?php include 'navheaders/user_nav_header.php' ?>		
	</div>
		<div id="center">
			<h1>Login/Register</h1>

			<?php include 'formtable/login_registerforms.php' ?>
			<hr>
		
		</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
