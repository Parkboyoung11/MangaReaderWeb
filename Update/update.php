<?php
	if (!isset($_COOKIE['userSignIn']) || !isset($_COOKIE['userID'])) {
		header('location : ../');
	}
	if (isset($_POST['update'])) {
		include('../Helper/config.php');
		$username = $_COOKIE['userSignIn'];
		$uid = $_COOKIE['userID'];
		$fullName = $_POST['fullNameChange'];
		$gender = $_POST['gender'];
		$passwordChangeRaw = $_POST['passwordChange'];
		$password = md5($passwordChangeRaw);
		$avatar = $_POST['avatarChange'];
		$avatarLink = "Image/Avatar/$username.png";

		if ($fullName == '') {
			if ($passwordChangeRaw == '') {
				if ($avatar == '') {
					$sqlUpdate = "UPDATE users set gender=$gender where uid=$uid";
				}else {
					$sqlUpdate = "UPDATE users set gender=$gender, avatar='$avatarLink' where uid=$uid";
				}
			}else {
				$sqlUpdate = "UPDATE users set gender=$gender, avatar='$avatarLink', password='$password' where uid=$uid";
			}
		}else {
			if ($passwordChangeRaw == '') {
				if ($avatar == '') {
					$sqlUpdate = "UPDATE users set gender=$gender, fullname='$fullName' where uid=$uid";
				}else {
					$sqlUpdate = "UPDATE users set gender=$gender, fullname='$fullName', avatar='$avatarLink' where uid=$uid";
				}
			}else {
				$sqlUpdate = "UPDATE users set gender=$gender, fullname='$fullName', avatar='$avatarLink', password='$password' where uid=$uid";
			}
		}

		// $sqlUpdate = "UPDATE manga set name='$name', release=$release, genre='$genre', status=$status, numberofchapter=$nChapters, summary='$summary', author='$author', coverimage='$coverImage', mangareaderinfolink='$dataLink' where id='$_GET[id]'";
		$database->query($sqlUpdate);
		header('location:../?choose=profile');
	}
?>