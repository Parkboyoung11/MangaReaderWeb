<?php
	session_start();
	include('../Helper/config.php');

	if(isset($_SESSION['login'])) {
		// echo $_SESSION['login'];
		header('location:index.php');
	}

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$passwordRaw = $_POST['password'];
		$password = md5($passwordRaw);

		$sql = 'SELECT * from admin where username=:name and password=:pass limit 1';

		$result = $database->prepare($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute([':name' => $username, ':pass' => $password]);
		$eachrow = $result->fetch();
		$count = $result->rowCount();

		if($count > 0){
			$_SESSION['login'] = $username;
			// echo $username;
			// exit();
			header('location:index.php');			
		}else {
			echo '<script>alert("User or Password not correct. Try again.");</script>';
		}
	}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="../View/style-login.css">
</head>
<body>
	<div id="login">
		<form action="" method="post" enctype="multipart/form-data">
			<h2>Admin Login</h2>
			<input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])) {echo htmlentities($_POST['username']);} ?>" placeholder="Enter username..." required="required" />
			<input type="password" name="password" id="password" placeholder="Enter password..." required="required" />
			<input type="submit" name="login" id="button" value="Sign in"/>
		</form>
	</div>
</div>
</body>
</html>