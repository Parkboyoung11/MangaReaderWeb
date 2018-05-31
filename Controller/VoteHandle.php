<?php 
	include('../Helper/config.php');
	if (isset($_POST['rate']) && isset($_POST['vmid']) && isset($_COOKIE['userID'])) {
		$rate = $_POST['rate'];
		$vmid = $_POST['vmid'];
		$vuid = $_COOKIE['userID'];

		$sqlCheck = "SELECT rate from vote where vmid=$vmid and vuid=$vuid" ;
		$resultCheck = $database->query($sqlCheck);
		$resultCheck->setFetchMode(PDO::FETCH_ASSOC);
		$count = $resultCheck->rowCount();
		if ($count > 0) {
			$sqlVote = "UPDATE vote set rate=$rate where vmid=$vmid and vuid=$vuid";
		}else {
			$sqlVote = "INSERT into vote (vmid, vuid, rate) values ($vmid, $vuid, $rate)";
		}
		if($database->query($sqlVote)) {
			echo "success";
		}else {
			echo "queryError";
		}
	}else {
		echo "notsignin";
	}
?>