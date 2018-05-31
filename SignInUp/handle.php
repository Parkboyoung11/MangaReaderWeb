<?php  
	if (isset($_COOKIE['userSignIn'])) {
	    header('location : ../');
	}
	include('../Helper/config.php');
	include('../SendMail/sendmail.php');
	if (isset($_POST['signin'])) {
		$username = $_POST['username'];
		$passwordRaw = $_POST['password'];
		$password = md5($passwordRaw);

		$sql = 'SELECT username, uid from users where (username=:name or email=:email) and password=:pass and isdisable!=1 limit 1';

		$result = $database->prepare($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute([':name' => $username, ':email' => $username, ':pass' => $password]);
		$eachrow = $result->fetch();
		$count = $result->rowCount();

		if($count > 0){
			setcookie("userSignIn", $eachrow['username'], time() + 400000000, "/","", 0);
   			setcookie("userID", $eachrow['uid'], time() + 400000000, "/", "",  0);

			header('location:../index.php');			
		}else {
			header("location: signin.php?error=$username");
		}
	} elseif (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$passwordRaw = $_POST['password'];
		$email = $_POST['email'];
		$password = md5($passwordRaw);

		$sqlCheck = 'SELECT username from users where username=:name limit 1';
		$resultCheck = $database->prepare($sqlCheck);
		$resultCheck->setFetchMode(PDO::FETCH_ASSOC);
		$resultCheck->execute([':name' => $username]);
		$count = $resultCheck->rowCount();
		if ($count > 0) {
			header("location: signup.php?error=username&email=$email");
			exit();
		}

		$sqlCheck = 'SELECT username from users where email=:email limit 1';
		$resultCheck = $database->prepare($sqlCheck);
		$resultCheck->setFetchMode(PDO::FETCH_ASSOC);
		$resultCheck->execute([':email' => $email]);
		$count = $resultCheck->rowCount();
		if ($count > 0) {
			header("location: signup.php?error=email&username=$username");
			exit();
		}


		$sql = 'INSERT into users (email, username, password, isdisable) values (:email, :name, :pass, 0)';
		$insert = $database->prepare($sql);
		$result = $insert->execute([':email' => $email, ':name' => $username, ':pass' => $password]);

		if ($result === FALSE) {
			header("location: signup.php?error=query");
		}else {
			// test cookie
			setcookie("userSignIn", $username, time() + 400000000, "/","", 0);
   			setcookie("userID", $uID, time() + 400000000, "/", "",  0);
   			//end test cookie

			header('location:../index.php');
		}
	} elseif (isset($_POST['resetPass'])){
	    $email = $_POST['email'];
	    $sqlFindEmail = "SELECT uid from users where email='$email' and isdisable = 0 limit 1";
	    $resultCheck = $database->query($sqlFindEmail);
	    $resultFetch = $resultCheck->fetch();
	    $uid = $resultFetch['uid'];
	    $count = $resultCheck->rowCount();

	    if ($count > 0) {    	
	    	$token = md5(mt_rand(100000, 999999));  
	    	$expire = 3600;
	    	$tokentime = strtotime(date('Y-m-d H:i:s')) + $expire;
	    	$sqlUpdateToken = "UPDATE users set token='$token', tokentime=$tokentime where email='$email'";
	    	$database->query($sqlUpdateToken);
	    	$titleSend = "Forgot Password";
	    	$contentSend = "Please access this <a href=\"http://192.168.33.10/MyProject/MangaReaderWebPostgres/SignInUp/setnewpassword.php?uid=$uid&token=$token\">link</a> to set your new password! <br> <br> P/S: If you do not use this link within 1 hours, it will expire. Thanks";
	    	SendMail($email, $titleSend, $contentSend);
	    	header("location: forgotdone.php");
	    	exit();
	    }else {
	    	header("location: forgotpass.php?result=noemail");
	    	exit();
	    }
	} elseif (isset($_POST['changePass'])) {
		$uid = $_POST['uidChange'];
		$token = $_POST['tokenChange'];
		$password = $_POST['password'];
		$passwordConfirm = $_POST['confirmPass'];
		if ($password != $passwordConfirm) {
			header("location: setnewpassword.php?uid=$uid&token=$token&error=notmatch");
			exit();
		}

		$encodePass = md5($password);
		$sqlUpdatePass = "UPDATE users set password='$encodePass', tokentime=0 where uid=$uid";
		if($database->query($sqlUpdatePass) === FALSE) {
			header("location: setnewpassword.php?uid=$uid&token=$token&error=dberror");
			exit();
		}else {
			header("location: signin.php");
			exit();
		}
	}
?>