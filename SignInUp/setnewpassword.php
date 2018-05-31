<?php 
	if (isset($_COOKIE['userSignIn'])) {
	    exit();
	}
	if (isset($_GET['error'])) {
		if ($_GET['error'] == 'notmatch') {
			echo "<script>alert('Password doesn\'t match the confirmation');</script>";
		} elseif ($_GET['error'] == 'dberror') {
			echo "<script>alert('Error while change password. Please try again!');</script>";
		}		
	}

	include('../Helper/config.php');
	$uid = $_GET['uid'];
	$token = $_GET['token'];
	$sqlCheck = "SELECT username, tokentime from users where uid=$uid and token='$token'";
	$resultCheck = $database->query($sqlCheck);
	$resultCheck->setFetchMode(PDO::FETCH_ASSOC);
	$count = $resultCheck->rowCount();
	if ($count == 0) {
		exit();
	}else {
		$row = $resultCheck->fetch();
		$username = $row['username'];
		$tokentime = $row['tokentime'];
		$curtime = strtotime(date('Y-m-d H:i:s'));
		if ($curtime > $tokentime) {
			exit();
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change your password ・ Furry Comic - フッリーコミック</title>
  <link type="text/css" rel="stylesheet" href="../View/signinup.css">
  <link rel="icon" href="../Image/iconPage.gif" type="image/gif" >
</head>
<body class="">
  <div class="header-body">
    <a href="../"><img src="../Image/iconPage.gif" alt="Sorry, can't load image :(">
    </a>
  </div>
  <div class="signInLabel">
    <p style="text-align: center; color: gray;">Change password for<?php 
        	echo "<br>@$username";
        ?>    	
    </p>
  </div>
  <div class="main">
    <div class="mainContentForgot" style="height: 195px;">
      <form action="handle.php" method="post" enctype="multipart/form-data">
        <label class="userNameLabel" style="line-height: 140%;">Password</label>
        <input type="password" pattern="[a-zA-Z0-9]{1,}" style="margin-top: 5px; margin-bottom: 20px;" name="password" id="username" placeholder="Enter your new password..." required="required" />
        <label class="userNameLabel" style="line-height: 140%;">Confirm password</label>
        <input type="password" pattern="[a-zA-Z0-9]{1,}" style="margin-top: 5px; margin-bottom: 20px;" name="confirmPass" id="username" placeholder="Confirm your new password..." required="required" />
        <input type="text" name="uidChange" style="display: none" value="<?php echo $uid ?>">
        <input type="text" name="tokenChange" style="display: none" value="<?php echo $token ?>">
        <input type="submit" style="font-size: 15px; margin-top: 0" name="changePass" id="signButton" value="Change password"/>
      </form>
    </div>
  </div>
</body>
</html>