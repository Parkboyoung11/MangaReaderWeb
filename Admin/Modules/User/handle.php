<?php 
	include('../../../Helper/config.php');
	session_start();
	if(!isset($_SESSION['login'])){
		header('location:../../login.php');
	}

	$uid = $_GET['uid'];

	if($_GET['ac'] == "delete") {		
		$sqlDeleteUser = "UPDATE users set isdisable=1 where uid = $uid";
		$database->query($sqlDeleteUser);
		if (isset($_GET['searchUser'])) {
			header("location:../../?choose=user&ac=list&upage=$_SESSION[uPageNumber]&searchUser=$_GET[searchUser]");
		}else {
			header("location:../../?choose=user&ac=list&upage=$_SESSION[uPageNumber]");
		}		
	}elseif($_GET['ac'] == "reDelete") {
		$sqlDeleteUser = "UPDATE users set isdisable=0 where uid = $uid";
		$database->query($sqlDeleteUser);
		if (isset($_GET['searchUser'])) {
			header("location:../../?choose=user&ac=list&upage=$_SESSION[uPageNumber]&searchUser=$_GET[searchUser]");
		}else {
			header("location:../../?choose=user&ac=list&upage=$_SESSION[uPageNumber]");
		}
	}else {
		header("location:../../?choose=user&ac=list&upage=$_SESSION[uPageNumber]");
	}
?>
