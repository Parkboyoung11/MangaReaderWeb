<?php
	$searchUser = $_GET['searchUser'];
	header("location: ../../?choose=user&ac=list&searchUser=$searchUser");
?>