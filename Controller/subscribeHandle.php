<?php 
	$smid = $_GET['mid'];
	$action = $_GET['ac'];
	if (!isset($_COOKIE['userID'])) {
		header("location: ../?choose=overview&id=$smid&error=notsignin");
	}else {
		include('../Helper/config.php');
		$suid = $_COOKIE['userID'];

		if ($action == "sub") {
			$sqlSubscribe = "INSERT INTO subscribe (smid, suid) values ($smid, $suid)";
			if($database->query($sqlSubscribe)) {
				header("location: ../?choose=overview&id=$smid&noti=successSub");
			}else {
				header("location: ../?choose=overview&id=$smid&error=queryerror");
			}
		}elseif ($action == "unsub") {
			$sqlSubscribe = "DELETE from subscribe where smid=$smid and suid=$suid";
			if($database->query($sqlSubscribe)) {
				header("location: ../?choose=overview&id=$smid&noti=successUnSub");
			}else {
				header("location: ../?choose=overview&id=$smid&error=queryerror");
			}
		}else {
			header("location: ../?choose=overview&id=$smid&error=queryerror");
		}
		
	}
?>