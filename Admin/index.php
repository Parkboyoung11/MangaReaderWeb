<?php 
	session_start();
	if(isset($_POST['logout'])){
	    unset($_SESSION['login']);
	    unset($_SESSION['mPageNumber']);
	    unset($_SESSION['uPageNumber']);
	    // header('location : login.php');
	}

	if(!isset($_SESSION['login'])){
		header('location:login.php');
		// echo "1234";
		// exit();
		// echo "<script>location.href=login.php;</script>";
	}
?>
<!DOCTYPE html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Manager</title>
	<link type="text/css" rel="stylesheet" href="../View/admin.css">
</head>
<body style="background: url(../Image/background1.png) no-repeat top center fixed; background-size: cover; opacity: 1; ">
	<div class="wrapper">
		<?php
			include('../Helper/config.php');
			include('Modules/header.php');
			include('Modules/menu.php');
			include('Modules/content.php');
		?>
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="js/delete.js"></script>
		<script type="text/javascript" src="js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
		<script type="text/javascript" src="js/tinymce/js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</div>
</body>
</html>
<?php
	if (isset($_GET['resetpass']) and ($_GET['resetpass'] == 'success')) {
		echo "<script>alert('Reset Password Succeeded !');</script>";
	}
?>

