<?php 
	if(isset($_GET['choose'])){
 		$choose=$_GET['choose'];
 	}else{
 		$choose='';
 	}

 	if ($choose == "search") {
 		include('Modules/Content/Search.php');
 	}elseif ($choose == "overview") {
 		include('Modules/Content/OverView.php');
 	}elseif ($choose == "profile") {
 		include('Modules/Content/UserProfile.php');
 	}elseif ($choose == "subscribe") {
 		include('Modules/Content/Subscribe.php');
 	}else {
 		include('Modules/Content/HomePage.php');
 	}
?>