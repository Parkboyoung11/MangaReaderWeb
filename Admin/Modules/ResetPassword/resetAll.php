<?php 
	session_start(); 
	if(!isset($_SESSION['login'])){
		header('location:../../login.php');
	}	 
	if (isset($_POST['noreset'])) {
		header('location: index.php?choose=user&ac=list');
	}elseif (isset($_POST['yesreset'])) {
		include ('Modules/SendMail/sendmail.php') ;

		// $sqlEmail = "SELECT email from Users where userID='1002'";
		$sqlEmail = "SELECT uid, email from users where isdisable=0";
		$result = $database->query($sqlEmail);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$titleSend = "Reset Password"; 
		$emailArray = $result->fetchAll();
		SendAllMail($emailArray);
		header('location: index.php?choose=user&ac=list&resetpass=success');
	}
?>
<div style="padding: 100px; margin: auto; width: 300px; font-size:25px;">
<div style="color: blue;font-weight: bold ;text-align: center">Reset password. You sure?</div>
<div style="height:10px">&nbsp;</div>
<div style="margin: auto; width: 167px;">
<form action="" method="post" enctype="multipart/form-data">
<input type="submit" value="Yes" name="yesreset" style="width:80px; height: 30px; font-size:20px;">
<input type="submit" value="No" name="noreset" style="width:80px; height: 30px; font-size:20px;">
</form>
</div>
</div>